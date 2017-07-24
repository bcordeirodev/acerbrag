<?php
/**
 * This file sets some commom properties for the application.
 * @version 0.3
 * @package Application
 */

/**
 * This class contains commom properties for the application.
 * @author Diego Andrade
 * @package Application
 * @since Optimuz 0.4
 * @version 0.7.2
 * @uses Core.Enviroment
 * @uses IO
 * @uses Lang
 * @uses Configuration.LocalConfiguration
 */
class Application extends EventDispatcher
{
	/**
	 * The application is invalid (does not exist).
	 */
	const INVALID_APPLICATION				= 3200;

	/**
	 * The application's path is invalid (already exist).
	 */
	const INVALID_PATH						= 3201;

	/**
	 * The application is disabled and cannot be accessed.
	 */
	const ACCESS_DENIED						= 3202;

	/**
	 * Application's name.
	 * @var string
	 */
	protected $name							= null;

	/**
	 * Application's title.
	 * @var string
	 */
	protected $title						= null;

	/**
	 * Application's version.
	 * @var string
	 */
	protected $version						= null;

	/**
	 * Whether the application is enabled, i.e., is accessable for users.
	 * @var bool
	 */
	protected $enable						= null;

	/**
	 * Application's paths.
	 * @var array
	 */
	protected $paths						= null;

	/**
	 * Application's configuration object.
	 * @var LocalConfiguration
	 */
	protected $config						= null;

	/**
	 * Application's base URL.
	 * @var string
	 */
	protected $baseUrl						= null;

	/**
	 * Current route.
	 * @var array
	 */
	protected $route						= null;

	/**
	 * Current application.
	 * @var Application
	 */
	protected static $currentApplication	= null;

	/**
	 * Creates an instance of an application.
	 *
	 * Throws an ApplicationError with no application with the given name
	 * exists.
	 * @param string $name A valid application's name.
	 */
	public function __construct($name)
	{
		$this->initializeEvents();
		$this->name = $name;
		$sep = Enviroment::getDirectorySeparator();
		$rootPath = Enviroment::getPath('apps') . $name . $sep;

		if(Dir::exists($rootPath))
		{
			$this->paths = array(
				'root'			=> $rootPath,
				'cache'			=> "{$rootPath}cache{$sep}",
				'components'	=> "{$rootPath}components{$sep}",
				'config'		=> "{$rootPath}config{$sep}",
				'lang'			=> "{$rootPath}lang{$sep}",
				'layers'		=> "{$rootPath}layers{$sep}",
				'control'		=> "{$rootPath}layers{$sep}control{$sep}",
				'model'			=> "{$rootPath}layers{$sep}model{$sep}",
				'view'			=> "{$rootPath}layers{$sep}view{$sep}",
				'templates'		=> "{$rootPath}layers{$sep}view{$sep}template{$sep}",
				'resources'		=> "{$rootPath}layers{$sep}view{$sep}resource{$sep}",
				'log'			=> "{$rootPath}log{$sep}",
				'scripts'		=> "{$rootPath}scripts{$sep}",
				'temp'			=> "{$rootPath}temp{$sep}",
				'threads'		=> "{$rootPath}threads{$sep}",
				'validation'	=> "{$rootPath}validation{$sep}"
			);
		}
		else
		{
			throw new ApplicationError(Language::getInstance('Application', null, Language::LOCATION_GLOBAL)->getSentence('error.invalidApplication', $name), self::INVALID_APPLICATION);
		}
	}

	/**
	 * Free memory used by resources.
	 */
	public function __destruct()
	{
		$this->config = null;
		$this->paths = null;
		$this->route = null;
		$this->events = null;
		$this->listeners = null;
	}

	/**
	 * Initializes the events of the controller.
	 *
	 * The available events are:
	 * <ul>
	 * <li><code>exit</code></li>
	 * <li><code>crash</code></li>
	 * </ul>
	 */
	protected function initializeEvents()
	{
		parent::initializeEvents();
		$this->events->add('exit');
		$this->events->add('crash');
	}

	/**
	 * Initializes the main application for the current request.
	 *
	 * This method loads the router and set the target application. All needed
	 * configuration on the way is also done.
	 * @param string $frameworkDir Framework's base directory.
	 * @throws Error
	 * @static
	 */
	public static function initialize($frameworkDir)
	{
		// check which controller must be loaded
		$application = null;
		$controller = null;
		$className = null;
		$method = 'index';
		$params = null;
		$clientRequest = Enviroment::getRequest();
		$data = '';

		if($clientRequest->hasGetParam('url') || (strpos($_SERVER['PHP_SELF'], '/index.php/') !== false))
		{
			if($clientRequest->hasGetParam('url'))
			{
				$data = $clientRequest->getGetParam('url');
				unset($_GET['url']);
			}
			else
			{
				$data = Text::plain(end((explode('index.php', $_SERVER['PHP_SELF']))));
			}
		}
		else
		{
			$data = '/';
		}

		// route request to a mapped application
		$map = Router::bindUrl($data);
		$application = $map['application'];
		$controller = $map['controller'];
		$className = $map['className'];
		$method = $map['method'];
		$params = $map['params'];

		// try to load the specified controller
		try
		{
			// starts the buffer
			Buffer::start();

			// check whether the requested application exists
			$applicationBootstrapPath = "{$frameworkDir}apps/{$application}/config/bootstrap/local.php";

			if(is_file($applicationBootstrapPath))
			{
				/** Auto initialization of the local configuration. */
				require_once $applicationBootstrapPath;

				// check whether the application is enabled
				if(self::getCurrent()->isEnabled())
					self::getCurrent()->run($controller, $method, $params, $className, $map);
				else
					throw new Error(Language::getCurrent()->getSentence('error.cannotAccessApplication', $application), self::ACCESS_DENIED);
			}
			else
			{
				throw new Error(Language::getCurrent()->getSentence('error.applicationNotExists', $application), self::INVALID_APPLICATION);
			}
		}
		catch(Error $err)
		{
			$c = CurrentHttpRequest::getController();

			if(empty($c))
				$c = new DefaultPageController;

			switch($err->getCode())
			{
				case DefaultController::SYSTEM_ACCESS_DENIED:
					$method = Object::hasMethod($c, 'accessDenied') ? 'accessDenied' : 'pageNotFound';
					break;
				case File::NOT_EXISTS:
				case self::INVALID_APPLICATION:
				case DefaultController::METHOD_NOT_EXISTS:
				case DefaultController::ACCESS_DENIED:
					$method = 'pageNotFound';
					break;
				default:
					$method = 'error';
					break;
			}

			//TODO fix this
			if($err->getCode() != DefaultController::SYSTEM_ACCESS_DENIED)
			{
				// send the error by email and log it to the application's log
				if(Report::sendError($err))
					$emailInfo = Language::getCurrent()->getSentence('email.msg1');
				else
					$emailInfo = Language::getCurrent()->getSentence('email.msg2');
			}
			else
			{
				$emailInfo = '';
			}

			// call the error page
			if(Object::hasMethod($c, $method))
			{
				CurrentHttpRequest::setController($c);
				$c->$method($err, $emailInfo);
			}
			else
			{
				//TODO implement defaultExceptionHandler
				Error::handleException($err);
			}
		}
	}

	/**
	 * Runs the application, that is, calls the controller and the method routed
	 * from the request. Access validation is done before granting access to the
	 * controller.
	 * @param string $controller Controller name.
	 * @param string $method Method name (must to be public, not static and not
	 * begin with underscore).
	 * @param array $params Parameters to pass to the method.
	 * @param string $className Controller's class name.
	 * @param array $map Router map, built with <code>Router::bindUrl()</code>.
	 * @throws Error
	 */
	public function run($controller, $method, $params, $className, $map)
	{
		// register objects to be cached
		$this->addListener('exit', array('CacheManager', 'save'));
//		$this->addListener('exit', array('Cache', 'save'));

		// sets the applicaton's base URL and current route
		$this->setBaseUrl($map['applicationBaseUrl']);
		$this->setRoute($map);

		// initializes the system access management here to prevent
		// erros if the controller is not found
		if(LocalConfiguration::get('systemAccess.enable'))
			SystemAccessManager::initialize();

		// check whether the controller is a page controller
		if(Load::isPageController($controller))
		{
			// system access
			$hasAccess = true;

			if(LocalConfiguration::get('systemAccess.enable'))
			{
				if(!($hasAccess = SystemAccessManager::validateAccess(Text::remove('Controller', $controller), $method)) && !SystemAccessLogin::hasSession())
					Session::set('goToUrl', CurrentHttpRequest::getInstance()->getUrl());
			}

			if($hasAccess)
			{
				$c = new $className;

				// check whether the method exists
				if(method_exists($c, $method))
				{
					if($method != 'index' ? stripos($method, '_') !== 0 : true)
					{
						if(is_array($params))
							$c->$method(new ArrayList($params));
						else
							$c->$method();
					}
					else
					{
						throw new Error(Language::getCurrent()->getSentence('error.cannotAccessMethod', $controller, $method), DefaultController::ACCESS_DENIED);
					}
				}
				else
				{
					throw new Error(Language::getCurrent()->getSentence('error.methodNotExists', $method), DefaultController::METHOD_NOT_EXISTS);
				}
			}
			else
			{
				throw new Error(Language::getCurrent()->getSentence('error.systemAccessDenied'), DefaultController::SYSTEM_ACCESS_DENIED);
			}
		}
		else
		{
			throw new Error(Language::getCurrent()->getSentence('error.cannotAccessController', $controller), File::NOT_EXISTS);
		}

		$this->trigger('exit');
	}

	/**
	 * Factory method. Returns an instance of the application with the given
	 * name.
	 * @param string $name Application's name.
	 * @return Application
	 * @static
	 */
	public static function getByName($name)
	{
		return new self($name);
	}

	/**
	 * Returns the application name.
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Returns an application's path.
	 *
	 * The valid paths are:
	 * <ul>
	 * <li>root</li>
	 * <li>cache</li>
	 * <li>components</li>
	 * <li>config</li>
	 * <li>lang</li>
	 * <li>layers</li>
	 * <li>control</li>
	 * <li>model</li>
	 * <li>view</li>
	 * <li>log</li>
	 * <li>scripts</li>
	 * <li>temp</li>
	 * <li>templates</li>
	 * <li>resources</li>
	 * <li>threads</li>
	 * <li>validation</li>
	 * </ul>
	 *
	 * If an invalid path is given, a null value is returned.
	 * @param string $pathName Path name.
	 * @return string
	 */
	public function getPath($pathName)
	{
		$path = null;

		if(isset($this->paths[$pathName]))
			$path = $this->paths[$pathName];

		return $path;
	}

	/**
	 * Adds a new path to the application.
	 *
	 * This method does not create the directory in the application's directory
	 * for you. You must to create the directory yourself and then reference it
	 * throught this method.
	 *
	 * It the path name already exists as one of the defaults paths an
	 * ApplicationError is thrown.
	 * @param string $name The path's name.
	 * @param string $path The path itself.
	 */
	public function setPath($name, $path)
	{
		if(!isset($this->paths[$name]))
		{
			$rootPath = Enviroment::getPath('apps') . $this->name . Enviroment::DIR_SEP;
			$this->paths[$name] = $rootPath . $path;
		}
		else
		{
			throw new ApplicationError(Language::getInstance('Application', null, Language::LOCATION_GLOBAL)->getSentence('error.invalidApplicationPath', $name, $this->name), self::INVALID_PATH);
		}
	}

	/**
	 * Checks whether a path with $name exists in the application.
	 *
	 * Returns true if there is a path with the given name, or false otherwise.
	 * @param string $name Path name.
	 * @return bool
	 */
	public function hasPath($name)
	{
		return isset($this->paths[$name]);
	}

	/**
	 * Reloads some setteings from the local configuration.
	 *
	 * The settings updated are: Application::$title, Application::$version and
	 * Application::$enable.
	 * @see Application::$title
	 * @see Application::$version
	 * @see Application::$enable
	 */
	public function update()
	{
		$this->title = LocalConfiguration::get('app.title');
		$this->version = LocalConfiguration::get('app.version');
		$this->enable = LocalConfiguration::get('app.enable');
	}

	/**
	 * Returns the application's title.
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Returns the application's version.
	 * @return string
	 */
	public function getVersion()
	{
		return $this->version;
	}

	/**
	 * Returns whether the application is enabled, i.e., accessable for users.
	 * @return bool
	 */
	public function isEnabled()
	{
		return $this->enable;
	}

	/**
	 * Sets the application's base URL.
	 * @param string $baseUrl Absolute URL without host name.
	 */
	public function setBaseUrl($baseUrl)
	{
		$host = Enviroment::getPath('host');
		$basePath = Enviroment::getPath('baseUrl');

		if(!GlobalConfiguration::get('urlRewrite.useServerMod.enable'))
			$basePath .= 'index.php/';

		if($basePath{0} == '/')
			$basePath = Text::substring($basePath, 1);

		if($baseUrl{0} == '/')
			$baseUrl = Text::substring($baseUrl, 1);

		$this->baseUrl = "{$host}{$basePath}{$baseUrl}";
	}

	/**
	 * Returns the application's base URL.
	 * @return string
	 */
	public function getBaseUrl()
	{
		return $this->baseUrl;
	}

	/**
	 * Checks whether an application is valid, i.e., it exists.
	 *
	 * Returns true if the application exists, or false otherwise.
	 * @param string $name Application's name to check.
	 * @return bool
	 * @static
	 */
	public static function isValid($name)
	{
		return Dir::exists(Enviroment::getPath('apps') . $name);
	}

	/**
	 * Sets the current application.
	 * @param string $name Application's name.
	 */
	public static function setCurrent($name)
	{
		self::$currentApplication = new self($name);
	}

	/**
	 * Returns the current application.
	 * @return Application
	 */
	public static function getCurrent()
	{
		return self::$currentApplication;
	}

	/**
	 * Sets the current route of the application.
	 * @param array $route Current route.
	 */
	public function setRoute(array $route)
	{
		$this->route = $route;
	}

	/**
	 * Returns the current route.
	 * @return array
	 */
	public function getRoute()
	{
		return $this->route;
	}
}
?>