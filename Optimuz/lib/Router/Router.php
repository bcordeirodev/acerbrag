<?php
/**
 * This file defines a way to work with routers.
 * @version 0.2
 * @package Socket
 */

/**
 * This class is used to map HTTP requests to controllers.
 * @author Diego Andrade
 * @package Router
 * @since Optimuz 0.3
 * @version 0.2
 * @static
 * @uses Core.Enviroment
 * @uses Lang
 * @uses Strings
 * @uses Configuration
 * @uses Storage.Cache
 */
class Router
{
	/**
	 * The map file is missing.
	 */
	const MISSING_MAP_FILE				= 2300;

	/**
	 * There was an error while trying to load the map file.
	 */
	const MAP_FILE_LOAD_ERROR			= 2301;

	/**
	 * The map file is empty.
	 */
	const EMPTY_MAP_FILE				= 2302;

	/**
	 * The map file does not have a default application setting.
	 */
	const MISSING_DEFAULT_APPLICATION	= 2303;

	/**
	 * URL mapping array. This stores the routes from URL do controllers. Each
	 * key of the array is a URL, its value is another array with the controller
	 * specifications.
	 * @var array
	 * @static
	 */
	private static $routes					= null;

	/**
	 * Default application called if no application matches.
	 * @var string
	 */
	private static $defaultApplication		= null;

	/**
	 * Default controller called if no controller matches.
	 * @var string
	 */
	private static $defaultController		= null;

	/**
	 * Default method called if no method matches.
	 * @var string
	 */
	private static $defaultMethod			= null;

	/**
	 * Whether to hide the application part on the final URL.
	 * @var boolean
	 */
	private static $hideApplicationOnURL	= null;

	/**
	 * Loads and parses a route map file. This file must have the extension .xml
	 * and must be stored in the /Optimuz/config/routes directory.
	 * @param string $mapName Mapping file name (without extension).
	 * @static
	 */
	public static function loadRouteMap($mapName)
	{
		if(is_null(self::$routes))
			self::$routes = array();

		$path = Enviroment::getPath('config') . 'routes' . Enviroment::DIR_SEP . "{$mapName}.xml";

		if(File::exists($path))
		{
			$xml = new Xml();

			if($xml->load($path))
			{
				self::$defaultApplication = $xml->documentElement->getAttribute('defaultApplication');
				self::$defaultController = $xml->documentElement->getAttribute('defaultController');
				self::$defaultMethod = $xml->documentElement->getAttribute('defaultMethod');
				self::$hideApplicationOnURL = $xml->documentElement->getAttribute('hideApplicationOnURL') == 'true';

				if(!isset(self::$defaultApplication) || empty(self::$defaultApplication))
					throw new RouterError(Language::getCurrent()->getSentence('router.error.missingDefaultApplication', $mapName), self::MISSING_DEFAULT_APPLICATION);

				$routes = $xml->getElementsByTagName('route');

				if($routes->length > 0)
				{
					foreach($routes as $route)
					{
						$url = $route->getElementsByTagName('url')->item(0)->getAttribute('path');
						$map = array(
							'application' => null,
							'controller' => null,
							'method' => null,
							'defaultController' => null,
							'defaultMethod' => null,
							'redirectApplication' => false
						);
						$application = $route->getElementsByTagName('application');

						if($application->length == 1)
						{
							$application = $application->item(0);
							$map['application'] = $application->getAttribute('name') ? $application->getAttribute('name') : self::$defaultApplication;
							$map['defaultController'] = $application->getAttribute('defaultController') ? $application->getAttribute('defaultController') : self::$defaultController;
							$map['defaultMethod'] = $application->getAttribute('defaultMethod') ? $application->getAttribute('defaultMethod') : self::$defaultMethod;
							$controller = $application->getElementsByTagName('controller');

							if($route->hasAttribute('redirectApplication'))
								$map['redirectApplication'] = $route->getAttribute('redirectApplication') == 'true';

							if($controller->length == 1)
							{
								$controller = $controller->item(0);
								$map['controller'] = $controller->getAttribute('name');

								if($controller->getAttribute('method'))
									$map['method'] = $controller->getAttribute('method');
							}
						}

						self::addRoute($url, $map);
					}
				}
				else
				{
					throw new RouterError(Language::getCurrent()->getSentence('router.error.emptyFile', $mapName), self::EMPTY_MAP_FILE);
				}
			}
			else
			{
				throw new RouterError(Language::getCurrent()->getSentence('router.error.notLoaded', $mapName), self::MAP_FILE_LOAD_ERROR);
			}
		}
		else
		{
			throw new RouterError(Language::getCurrent()->getSentence('router.error.notFound', $mapName), self::MISSING_MAP_FILE);
		}
	}

	/**
	 * Adds a route from a URL to a specific controller.
	 * @param string $url URL that will be mapped.
	 * @param array $map Array containing the mapping parameters.
	 * @static
	 */
	public static function addRoute($url, array $map)
	{
		self::$routes[$url] = $map;
	}

	/**
	 * Binds the requested URL to its respective controller or to a default
	 * controller.
	 * @param string $requestUrl Requested URL.
	 * @return array Associative array with keys: application, controller,
	 * className, method, params and url.
	 * @static
	 */
	public static function bindUrl($requestUrl)
	{
		$cacheEnabled = LocalConfiguration::get('performance.cache.enable');

		if($cacheEnabled ? !Cache::exists($requestUrl) : true)
		{
			$found = false;
			$map = array(
				'application' => self::$defaultApplication,
				'controller' => self::$defaultController . 'Controller',
				'className' => self::$defaultController . 'Controller',
				'method' => self::$defaultMethod,
				'params' => null,
				'url' => '',
				'applicationBaseUrl' => '',
			);

			if($requestUrl)
			{
				if($requestUrl{0} !== '/')
					$requestUrl = "/{$requestUrl}";

				// remove "/" from the beginning and from the end of the URL and
				// split it by the remaining "/"
				$requestUrlParts = explode('/', preg_replace('#^/|/$#', '', $requestUrl));
				$urlParams = array();

				foreach(self::$routes as $routeUrl => $route)
				{
					$urlApplication = null;
					$urlController = null;
					$urlMethod = null;
					$urlParams = null;
					$baseUrl = null;

					// remove "/" from the beginning and from the end of the URL
					// and split it by the remaining "/"
					$routeUrlParts = explode('/', preg_replace('#^/|/$#', '', $routeUrl));

					if(strcasecmp($requestUrl, $routeUrl) === 0)
					{
						$urlApplication = $route['application'];
						$urlController = $route['controller'];
						$urlMethod = CamelCase::toDashes($route['method']);
						$baseUrl = $urlApplication;
					}
					else
					{
						$applicationIndex = array_search(':application:', $routeUrlParts);
						$controllerIndex = array_search(':controller:', $routeUrlParts);
						$methodIndex = array_search(':method:', $routeUrlParts);
						$paramsIndex = array_search('*', $routeUrlParts);

						// if :application: is found in the route we need to
						// search it in the current URL. Otherwise we use the
						// application defined in the route.
						if($applicationIndex !== false)
						{
							if(isset($requestUrlParts[$applicationIndex]))
							{
								$baseUrl = implode('/', array_slice($routeUrlParts, 0, $applicationIndex));
								$baseRequestUrl = array_slice($requestUrlParts, 0, $applicationIndex);

								//foreach($baseRequestUrl as $key => $value)
								//	$baseRequestUrl[$key] = CamelCase::toLower($value);

								if($baseUrl == implode('/', $baseRequestUrl))
								{
//									$urlApplication = CamelCase::toLower($requestUrlParts[$applicationIndex]);
									$urlApplication = $requestUrlParts[$applicationIndex];

									// if $applicationIndex is zero then $baseUrl
									// can be an empty string, in this case we
									// set $baseUrl to "/APPLICATION_NAME".
									if(empty($baseUrl))
										$baseUrl = "/{$urlApplication}";
								}
							}
						}
						else
						{
							if(strpos($routeUrl, '*') > 0)
							{
								$baseUrl = preg_replace('#/(?:\:(?:controller|method)\:|\*)#', '', $routeUrl);

								if(!empty($requestUrl) && !empty($baseUrl) && ($baseUrl != '/'))
								{
									if(strpos($requestUrl, $baseUrl) === 0)
									{
										$urlApplication = $route['application'];

										if(!$route['redirectApplication'])
											$baseUrl = $urlApplication;
									}
								}
							}
						}

						// if the application was not found we skip to the next
						// route.
						if(!$urlApplication || !Application::isValid($urlApplication))
							continue;

						// if :controller: is found in the route we need to
						// search it in the current URL. Otherwise we use the
						// controller defined in the route.
						if($controllerIndex !== false)
						{
							// if the controller's index is found in the URL
							// we get it.
							if(isset($requestUrlParts[$controllerIndex]))
							{
								$urlController = $requestUrlParts[$controllerIndex];
							}
							else
							{
								// default controller
								$urlController = $route['defaultController'];
							}
						}
						else
						{
							$urlController = $route['controller'];
						}

						// if :method: is found in the route we need to
						// search it in the current URL. Otherwise we use the
						// method defined in the route.
						if($methodIndex !== false)
						{
							// if the method's index is found in the URL
							// we get it.
							if(isset($requestUrlParts[$methodIndex]))
							{
								$urlMethod = $requestUrlParts[$methodIndex];
							}
							else
							{
								// default method
								$urlMethod = CamelCase::toDashes($route['defaultMethod']);
							}
						}
						else
						{
							$urlMethod = CamelCase::toDashes($route['method']);
						}

						// to finish we get parameters
						if($paramsIndex !== false)
						{
							$urlParams = array_slice($requestUrlParts, $paramsIndex);
						}
						else
						{
							if(($methodIndex !== false) && ($urlMethod != end($requestUrlParts)))
								continue;
						}
					}

					$found = true;
					$controllerNameParts = Text::split('.', $urlController);
					$className = CamelCase::toUpper($controllerNameParts->removeLast()) . 'Controller';
					$controllerNameParts->add($className);
					$controllerName = $controllerNameParts->join('.');

					$map['application'] = $urlApplication;
					$map['controller'] = $controllerName;
					$map['className'] = $className;
					$map['method'] = CamelCase::toLower($urlMethod);
					$map['params'] = self::getNamedParameters($urlParams);
					$map['url'] = $requestUrl;
					$map['applicationBaseUrl'] = $baseUrl;
					break;
				}

				if(!$found)
				{
					// if the request does not match any route and the
					// Router::$defaultApplication is defined, we try to route
					// the request one more time using the default application
					static $seachInDefaultApplication = true;

					if(!empty($map['application']) && $seachInDefaultApplication)
					{
						$seachInDefaultApplication = false;
						return self::bindUrl("/{$map['application']}$requestUrl");
					}
					else
					{
						$map['method'] = 'pageNotFound';
					}
				}
			}
			else
			{
				$map['method'] = 'warning';
			}

			if(empty($map['applicationBaseUrl']))
				$map['applicationBaseUrl'] = '/';

			if(self::$hideApplicationOnURL)
			{
				$map['url'] = Enviroment::normalizePath(Text::replace('#^/?' . self::$defaultApplication . '#', '/', $map['url']));
				$map['applicationBaseUrl'] = Enviroment::normalizePath(Text::replace('#^/?' . self::$defaultApplication . '#', '/', $map['applicationBaseUrl']));
			}

			if(!preg_match('#/$#', $map['applicationBaseUrl']))
				$map['applicationBaseUrl'] .= '/';

			if($cacheEnabled)
				Cache::set($requestUrl, $map);
		}
		else
		{
			$map = Cache::get($requestUrl);
		}

		return $map;
	}

	/**
	 * Returns an array with parameters. These parameters can be indexed or
	 * named.
	 *
	 * If the input array is empty or is null, a null value will be returned.
	 * @param array $params Input array of parameters.
	 * @return array
	 * @static
	 */
	private static function getNamedParameters($params)
	{
		$result = null;

		if(is_array($params) && !empty($params))
		{
			$result = array();

			foreach($params as $param)
			{
				if(strpos($param, ':') !== false)
				{
					$parts = explode(':', $param);
					$result[$parts[0]] = $parts[1];
				}
				else
				{
					$result[] = $param;
				}
			}
		}

		return $result;
	}
}
?>