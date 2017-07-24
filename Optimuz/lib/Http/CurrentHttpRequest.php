<?php
/**
 * This file sets a class to work with HTTP requests.
 * @version 0.2
 * @package Http
 */

/**
 * This class is used to hold all information about the curent HTTP request,
 * made by the UA.
 *
 * This class is Singleton, so only one instance of this class can exist at
 * a time.
 * @author Diego Andrade
 * @package Http
 * @since Optimuz 0.3
 * @version 0.4
 * @uses Core
 * @uses Strings
 * @uses Collection
 * @uses Lang
 */
class CurrentHttpRequest extends HttpTransport
{
	/**
	 * More than one instance is being created.
	 */
	const INSTANCE_VIOLATION		= 1608;

	/**
	 * Parameters sent by GET.
	 * @var array
	 */
	protected $getParams			= null;

	/**
	 * Parameters sent by POST.
	 * @var array
	 */
	protected $postParams			= null;

	/**
	 * Parameters present in the URL in the form of name:value.
	 * @var array
	 */
	protected $urlParams			= null;

	/**
	 * GET query string.
	 * @var string
	 */
	protected $queryString			= null;

	/**
	 * Specifies whether the request is Ajax based or not.
	 *
	 * Ajax based requests must have the HTTP header X-Ajax-Request setted to 1.
	 * @var bool
	 * @see HttpScriptRequest::isAjaxRequest()
	 */
	protected $isAjax				= null;

	/**
	 * Collection of files received in the current request.
	 * @var array
	 */
	protected $files				= null;

	/**
	 * Global instance of HttpScriptRequest. Only one is allowed per script
	 * request.
	 * @var CurrentHttpRequest
	 * @static
	 */
	private static $instance		= null;

	/**
	 * Reference of the controller selected in the current request.
	 * @var DefaultController
	 */
	protected static $controller	= null;

	/**
	 * Creates a new class instance.
	 *
	 * This class is used to hold all information about the curent HTTP request,
	 * made by the UA.
	 *
	 * This class is Singleton, so only one instance of this class can exist at
	 * a time.
	 */
	public function __construct()
	{
		if(is_null(self::$instance))
		{
			parent::__construct();
			self::$instance = $this;
			$this->headers = array();
			$this->getParams = array();
			$this->postParams = array();
			$this->urlParams = array();

			if(is_array($_SERVER) and !empty($_SERVER))
			{
				$this->rawHeaders = '';

				foreach($_SERVER as $name => $value)
				{
					if(stripos($name, 'http_') === 0)
					{
						$tmp = new ArrayList((explode('_', Text::remove('http_', Text::toLower($name)))));
						$tmp->map('CamelCase::toUpper');
						$name = $tmp->join('-');
						$this->headers[$name] = $value;
						$this->rawHeaders .= "{$name}: {$value}" . Enviroment::EOL;
					}

					$this->rawHeaders .= Enviroment::EOL;
				}

				if(isset($_SERVER['REQUEST_URI']))
				{
					$protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'http/') >= 0 ? 'http' : (stripos($_SERVER['SERVER_PROTOCOL'], 'https/') >= 0 ? 'https' : '');
					$host = $_SERVER['HTTP_HOST'];
					$url = "{$protocol}://{$host}{$_SERVER['REQUEST_URI']}";
					$this->setUrl($url);
				}

				if(isset($_SERVER['REQUEST_METHOD']))
					$this->method = $_SERVER['REQUEST_METHOD'];

				if(isset($_SERVER['QUERY_STRING']))
					$this->queryString = $_SERVER['QUERY_STRING'];

				if(isset($_SERVER['SERVER_PROTOCOL']))
				{
					$tmp = Text::split('/', $_SERVER['SERVER_PROTOCOL']);
					$this->secureConnection = Text::toUpper($tmp->getFirst()) === 'HTTPS';
					$this->protocolVersion = floatval($tmp->getLast());
				}

				$this->isAjax = $this->hasHeader('X-Ajax-Request') || ($this->hasHeader('X-Requested-With') && preg_match('/^(xmlhttprequest|ajax)$/', Text::toLower($this->getHeader('X-Requested-With'))));
			}

			if(is_array($_GET))
				$this->getParams = &$_GET;

			if(is_array($_POST))
				$this->postParams = &$_POST;
		}
		else
		{
			throw new HttpError(Language::getInstance('Http')->getSentence('error.instanceViolation'), self::INSTANCE_VIOLATION);
		}
	}

	/**
	 * Returns the global instance of HttpScriptRequest.
	 *
	 * This class is a Singleton because only one can exists per requests.
	 * @return CurrentHttpRequest
	 * @static
	 */
	public static function getInstance()
	{
		if(is_null(self::$instance))
			new self;

		return self::$instance;
	}

	/**
	 * Sets the controller selected in the current request.
	 * @param mixed $controller Can be a DefaultController or a
	 * DefaultResourceController.
	 * @static
	 */
	public static function setController($controller)
	{
		self::$controller = $controller;
	}

	/**
	 * Returns the controller selected in the current request.
	 * @return DefaultController
	 * @static
	 */
	public static function getController()
	{
		return self::$controller;
	}

	/**
	 * Checks if the current HTTP request is an Ajax based request.
	 *
	 * This is done by looking for the X-Ajax-Request header. It must be setted
	 * to 1, like "X-Ajax-Request: 1".
	 * @return bool
	 * @see HttpScriptRequest::$isAjax
	 */
	public function isAjaxRequest()
	{
		return $this->isAjax;
	}

	/**
	 * Returns the query string of the current HTTP request.
	 *
	 * If it is not available, a null value is returned.
	 * @return string
	 */
	public function getQueryString()
	{
		return $this->queryString;
	}

	/**
	 * Returns a parameter sent by GET in the current HTTP request.
	 *
	 * Returns null if the parameter does not exist.
	 * @param string $name Parameter name.
	 * @return string
	 */
	public function getGetParam($name)
	{
		return $this->hasGetParam($name) ? (is_array($this->getParams[$name]) ? array_map(array('Text', 'plain'), $this->getParams[$name]) : Text::plain($this->getParams[$name])) : null;
	}

	/**
	 * Checks if a parameter was sent by GET.
	 * @param string $name Parameter name.
	 * @return bool
	 */
	public function hasGetParam($name)
	{
		return isset($this->getParams[$name]);
	}

	/**
	 * Returns a parameter sent by POST in the current HTTP request.
	 *
	 * Returns null if the parameter does not exist.
	 * @param string $name Parameter name.
	 * @return string
	 */
	public function getPostParam($name)
	{
		return $this->hasPostParam($name) ? (is_array($this->postParams[$name]) ? array_map(array('Text', 'plain'), $this->postParams[$name]) : Text::plain($this->postParams[$name])) : null;
	}

	/**
	 * Checks if a parameter was sent by POST.
	 * @param string $name Parameter name.
	 * @return bool
	 */
	public function hasPostParam($name)
	{
		return isset($this->postParams[$name]);
	}

	/**
	 * Returns a parameter present in the URL.
	 *
	 * URL parameters must be in the form of name:value.
	 *
	 * Returns null if the parameter does not exist.
	 * @param string $name Parameter name.
	 * @return string
	 */
	public function getUrlParam($name)
	{
		return $this->hasUrlParam($name) ? (is_array($this->urlParams[$name]) ? array_map(array('Text', 'plain'), $this->urlParams[$name]) : Text::plain($this->urlParams[$name])) : null;
	}

	/**
	 * Checks if a parameter is present in URL.
	 * @param string $name Parameter name.
	 * @return bool
	 */
	public function hasUrlParam($name)
	{
		return isset($this->urlParams[$name]);
	}

	/**
	 * Sets the current request URL.
	 * @param string $url URL of the current request.
	 * @see HttpTransport::$url
	 * @see HttpTransport::getUrl()
	 */
	public function setUrl($url)
	{
		parent::setUrl($url);
		preg_match_all('#([^/:]+:[^/]+)/?#', $this->url, $parts);

		if(isset($parts) && isset($parts[1]))
		{
			foreach($parts[1] as $part)
			{
				$tmp = explode(':', $part);
				$this->urlParams[$tmp[0]] = $tmp[1];
			}
		}
	}

	/**
	 * Returns an array with the files received in the current HTTP request.
	 *
	 * Each file in the collection is an object with the following properties:
	 *
	 * <ul>
	 * <li><code>input</code>: name of the form input</li>
	 * <li><code>name</code>: file name</li>
	 * <li><code>type</code>: file type</li>
	 * <li><code>tmp_name</code>: file temporary name</li>
	 * <li><code>error</code>: error code (if any)</li>
	 * <li><code>size</code>: file size</li>
	 * </ul>
	 * @return array Collection of files uploaded. An empty array is returned if
	 * there is no file.
	 */
	public function getFiles()
	{
		if(is_null($this->files))
		{
			$this->files = array();

			if(isset($_FILES) && !empty($_FILES))
			{
				$aFiles = array();

				foreach($_FILES as $inputName => $values)
				{
					if(is_array($values['name']))
					{
						foreach($values['name'] as $i => $name)
						{
							$aFiles[] = (object)array(
								'input' => $inputName,
								'name' => $name,
								'type' => $values['type'][$i],
								'tmp_name' => $values['tmp_name'][$i],
								'error' => $values['error'][$i],
								'size' => $values['size'][$i],
							);
						}
					}
					else
					{
						$aFiles[] = (object)array(
							'input' => $inputName,
							'name' => $values['name'],
							'type' => $values['type'],
							'tmp_name' => $values['tmp_name'],
							'error' => $values['error'],
							'size' => $values['size'],
						);
					}
				}

				$this->files = $aFiles;
				unset($aFiles);
			}
		}

		return $this->files;
	}
}
?>