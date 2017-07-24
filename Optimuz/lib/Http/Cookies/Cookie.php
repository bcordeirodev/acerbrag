<?php
/**
 * This file sets a class to work with cookies.
 * @version 0.2
 * @package Http
 * @subpackage Cookies
 */

/**
 * This class is used to handle HTTP cookies. With it we are able to create,
 * modify and delete any HTTP cookie.
 * @author Diego Andrade
 * @package Http
 * @subpackage Cookies
 * @since Optimuz 0.3
 * @version 0.3
 * @uses Strings
 * @uses IO
 * @uses Core.Enviroment
 * @uses Language
 * @uses DateTime
 * @uses Application
 */
class Cookie
{
	/**
	 * Error while trying to parse the expiration time.
	 */
	const EXPIRES_PARSE_ERROR		= 1608;

	/**
	 * The passed expiration time is not a valid type.
	 */
	const EXPIRES_INVALID_TYPE		= 1609;

	/**
	 * Cookie name.
	 * @var string
	 * @see Cookie::setName()
	 * @see Cookie::getName()
	 */
	protected $name					= null;

	/**
	 * Cookie value.
	 * @var mixed
	 * @see Cookie::setValue()
	 * @see Cookie::getValue()
	 */
	protected $value				= null;

	/**
	 * Time of life of the cookie. After this time the cookie will expires.
	 * Default is zero.
	 * @var int 0
	 * @see Cookie::setExpires()
	 * @see Cookie::getExpires()
	 */
	protected $expires				= null;

	/**
	 * Cookie path on server. The cookie will be available only in this path.
	 * The default path is "/", which is the entire domain.
	 * @var string /
	 * @see Cookie::setPath()
	 * @see Cookie::getPath()
	 */
	protected $path					= null;

	/**
	 * Domain on which the cookie is valid. For the cookie to be valid to
	 * subdomains, this must be configured with a dot in the beginning. Example:
	 * if we have the domain "example.com" and we want the cookie to be valid
	 * for all subdomains, we must set the domain as ".example.com".
	 * @var string
	 * @see Cookie::setDomain()
	 * @see Cookie::getDomain()
	 */
	protected $domain				= null;

	/**
	 * Defines if the cookie will be transmited only in secure connections
	 * (HTTPS). The default is false.
	 * @var bool false
	 * @see Cookie::setPath()
	 * @see Cookie::getPath()
	 */
	protected $secure				= null;

	/**
	 * ID used to identify the file that contains the cookie meta information.
	 * @var string
	 */
	private $id						= null;

	/**
	 * Defines whether the cookie should be available only under the HTTP
	 * protocol. Like this, the cookie will not be available for script
	 * languages like Javascript. Not all browsers support this. Default is
	 * false.
	 * @var bool false
	 * @see Cookie::setOnlyHttp()
	 * @see Cookie::getOnlyHttp()
	 */
	protected $onlyHttp				= null;

	/**
	 * Cookie value encoded.
	 * @var string
	 * @see Cookie::$value
	 */
	protected $encodedValue			= null;

	/**
	 * Defines whether the cookie was already sent.
	 * @var bool
	 * @see Cookie::isSent()
	 */
	protected $cookieSent			= null;

	/**
	 * Creates a new class instance.
	 *
	 * All cookie parameters are initialized with default values, which are
	 * empty strings, zero and falses (the value depends on the parameter type).
	 *
	 * The new cookie is added to the CookiesManager's list.
	 * @param string $name (optimal) Cookie name.
	 * @param mixed $value (optimal) Cookie value.
	 * @param mixed $expires (optimal) Cookie expiration time.
	 *
	 * If this parameter is an integer, it will be added to the current
	 * timestamp (returned by time()) to get the expiration time.
	 *
	 * If this parameter is an string, two things can occur: if the string is
	 * the representation of a number, it will be converted to an integer and
	 * added to the current timestamp; otherwise it will be assumed that it is
	 * a date representation, and will be parsed with the Date class. The
	 * resulting timestamp will be used as the expiration time.
	 *
	 * If this parameter is an object, it must be a Date object or a TimeSpan
	 * object. If it is a Date object, its timestamp will be used as expiration
	 * time. Otherwise, the seconds of the TimeSpan object will be added to the
	 * current timestamp to get the expiration time.
	 *
	 * If this parameter is not one of the previous types, an error will be
	 * thrown.
	 */
	public function __construct($name = null, $value = null, $expires = null)
	{
		$this->name = !is_null($name) ? $name : '';
		$this->value = !is_null($value) ? $value : '';
		$this->path = '/';
		$this->domain = '';
		$this->secure = false;
		$this->onlyHttp = false;
		$this->id = uniqid(time());
		$this->cookieSent = false;

		if(!is_null($expires))
			$this->setExpires($expires);
		else
			$this->expires = 0;

		CookiesManager::addCookie($this);
	}

	/**
	 * This is a factory method used to create a new Cookie instance.
	 *
	 * If a cookie with the given name already exists, it will be returned and
	 * the parameters $value and $expires will be ignored.
	 * @param string $name (optimal) Cookie name.
	 * @param mixed $value (optimal) Cookie value.
	 * @param mixed $expires (optimal) Cookie expiration time.
	 *
	 * If this parameter is an integer, it will be added to the current
	 * timestamp (returned by time()) to get the expiration time.
	 *
	 * If this parameter is an string, two things can occur: if the string is
	 * the representation of a number, it will be converted to an integer and
	 * added to the current timestamp; otherwise it will be assumed that it is
	 * a date representation, and will be parsed with the Date class. The
	 * resulting timestamp will be used as the expiration time.
	 *
	 * If this parameter is an object, it must be a Date object or a TimeSpan
	 * object. If it is a Date object, its timestamp will be used as expiration
	 * time. Otherwise, the seconds of the TimeSpan object will be added to the
	 * current timestamp to get the expiration time.
	 *
	 * If this parameter is not one of the previous types, an error will be
	 * thrown.
	 * @return Cookie
	 * @static
	 * @see Cookie
	 * @see Cookie::restore()
	 */
	public static function create($name = null, $value = null, $expires = null)
	{
		return !self::exists($name) ? new self($name, $value, $expires) : self::restore($name);
	}

	/**
	 * Returns a previous stored cookie.
	 *
	 * If there is no cookie with the given name, a null value is returned.
	 * @param string $name Cookie name.
	 * @return Cookie
	 * @static
	 */
	public static function restore($name)
	{
		$cookieObj = null;

		if(self::exists($name))
		{
			$cookieObj = new self;
			$cookieObj->name = $name;
			$value = base64_decode($_COOKIE[$name]);
			$cookieId = $cookieObj->id;

			if(Text::find(':|:', $value))
			{
				$value = Text::split(':|:', $value);
				$cookieId = $value[0];
				$value = $value[1];
			}

			$cookiePath = (Application::getCurrent() ? Application::getCurrent()->getPath('temp') : Enviroment::getPath('temp')) . "{$cookieId}.cookie";
			$params = File::exists($cookiePath) ? Text::split(':|:', File::open($cookiePath)->read()) : array();

			if(!empty($params[0]))
			{
				$cookieObj->id = $cookieId;

				switch($params[0])
				{
					case 'bool':
						$cookieObj->value = $value == '1';
						break;
					case 'object':
					case 'array':
						$cookieObj->value = unserialize($value);
						break;
					default:
						$cookieObj->value = $value;
						break;
				}

				$cookieObj->expires = (int)$params[1];
				$cookieObj->path = $params[2];
				$cookieObj->domain = $params[3];
				$cookieObj->secure = (int)$params[4] === 1;
				$cookieObj->onlyHttp = (int)$params[5] === 1;
			}
			else
			{
				$cookieObj->value = $value;
				$cookieObj->expires = null;
			}
		}

		return $cookieObj;
	}

	/**
	 * Returns the value of a stored cookie.
	 *
	 * If the cookie does not exist, a null value will be returned.
	 * @param string $name Cookie name.
	 * @return mixed
	 * @static
	 */
	public static function get($name)
	{
		$value = null;

		if(self::exists($name))
		{
			$value = base64_decode($_COOKIE[$name], true);

			if($value !== false)
			{
				if(Text::find(':|:', $value))
					$value = Text::split(':|:', $value)->getLast();
			}
			else
			{
				$value = $_COOKIE[$name];
			}
		}

		return $value;
	}

	/**
	 * Checks whether the cookie with specified name exists.
	 * @param string $name Cookie name.
	 * @return bool
	 * @static
	 */
	public static function exists($name)
	{
		return is_array($_COOKIE) && isset($_COOKIE[$name]);
	}

	/**
	 * Saves the cookie.
	 *
	 * If the cookie value is a boolean, it will be automaticaly translated to
	 * a string ("true" of "false"). And if the value is an object, it will be
	 * serialized. Other values will be stored as they are.
	 * @param bool $saveToFile (optional) Whether the cookie's meta information
	 * should be saved to a temporary file. Default is false.
	 */
	public function save($saveToFile = false)
	{
		$value = null;
		$type = null;

		switch(gettype($this->value))
		{
			case 'bool':
				$value = $this->value ? 'true' : 'false';
				$type = 'bool';
				break;
			case 'object':
				$value = serialize($this->value);
				$type = 'object';
				break;
			case 'array':
				$value = serialize($this->value);
				$type = 'array';
				break;
			default:
				$value = $this->value;
				$type = 'default';
				break;
		}

		$this->encodedValue = base64_encode("{$this->id}:|:{$value}");

		// save the cookie for the client
		$this->sendHeader();

		// set the cookie available for the current request
		$_COOKIE[$this->name] = $value;

		// save the cookie meta information in a temporary file, to recover later
		if($saveToFile)
		{
			$cookiePath = $this->getMetaFilePath();
			$secure = $this->secure ? 1 : 0;
			$onlyHttp = $this->onlyHttp ? 1 : 0;
			File::create($cookiePath)->write("{$type}:|:{$this->expires}:|:{$this->path}:|:{$this->domain}:|:{$secure}:|:{$onlyHttp}");
		}
	}

	/**
	 * Removes the cookie if it already exists.
	 */
	public function remove()
	{
		if(self::exists($this->name))
		{
			$this->value = false;
			$this->encodedValue = null;
			$this->sendHeader();

			$cookiePath = $this->getMetaFilePath();

			if(File::exists($cookiePath))
				File::remove($cookiePath);
		}
	}

	/**
	 * Returns whether the cookie is a session cookie, that is, if the cookie
	 * expiration time is set to zero. If so, the cookie will expires when
	 * the session finishes (when the browser is closed).
	 * @return bool
	 */
	public function isSessionCookie()
	{
		return $this->expires === 0;
	}

	/**
	 * Sets the cookie name.
	 * @param string $name Cookie name.
	 * @see Cookie::$name
	 * @see Cookie::getName()
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * Returns the cookie name.
	 * @return string
	 * @see Cookie::$name
	 * @see Cookie::setName()
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Sets the cookie value.
	 * @param mixed $value Cookie value.
	 * @see Cookie::$value
	 * @see Cookie::getValue()
	 */
	public function setValue($value)
	{
		$this->value = $value;
	}

	/**
	 * Returns the cookie value.
	 * @return mixed
	 * @see Cookie::$value
	 * @see Cookie::setValue()
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * Sets the cookie expiration time.
	 * @param mixed $expires Cookie expiration time.
	 *
	 * If this parameter is an integer, it will be added to the current
	 * timestamp (returned by time()) to get the expiration time.
	 *
	 * If this parameter is an string, two things can occur: if the string is
	 * the representation of a number, it will be converted to an integer and
	 * added to the current timestamp; otherwise it will be assumed that it is
	 * a date representation, and will be parsed with the Date class. The
	 * resulting timestamp will be used as the expiration time.
	 *
	 * If this parameter is an object, it must be a Date object or a TimeSpan
	 * object. If it is a Date object, its timestamp will be used as expiration
	 * time. Otherwise, the seconds of the TimeSpan object will be added to the
	 * current timestamp to get the expiration time.
	 *
	 * If this parameter is not one of the previous types, an error will be
	 * thrown.
	 * @see Cookie::$expires
	 * @see Cookie::getExpires()
	 */
	public function setExpires($expires)
	{
		$type = gettype($expires);

		switch($type)
		{
			case 'integer':
			case 'double':
				$this->expires = time() + $expires;
				break;
			case 'string':
				if(is_numeric($expires))
				{
					$this->expires = time() + (int)$expires;
				}
				else
				{
					try{
						$this->expires = Date::parse($expires)->getTimestamp();
					}
					catch(Exception $error){
						throw new CookieError(Language::getInstance('Cookie')->getSentence('error.parseDate', $error->__toString()), self::EXPIRES_PARSE_ERROR);
					}
				}
				break;
			case 'object':
				if($expires instanceof Date)
					$this->expires = $expires->getTimestamp();
				elseif($expires instanceof TimeSpan)
					$this->expires = time() + $expires->getSeconds();
				else
					throw new CookieError(Language::getInstance('Cookie')->getSentence('error.invalidType', $type), self::EXPIRES_INVALID_TYPE);
				break;
			default:
				throw new CookieError(Language::getInstance('Cookie')->getSentence('error.invalidType', $type), self::EXPIRES_INVALID_TYPE);
				break;
		}
	}

	/**
	 * Returns the cookie expiration time in a Date object.
	 * @return Date
	 * @see Cookie::$expires
	 * @see Cookie::setExpires()
	 */
	public function getExpires()
	{
		return $this->isSessionCookie() ? 0 : Date::parse($this->expires);
	}

	/**
	 * Sets the cookie path on the server.
	 * @param string $path Cookie path on the server.
	 * @see Cookie::$path
	 * @see Cookie::getPath()
	 */
	public function setPath($path)
	{
		$this->path = $path;
	}

	/**
	 * Returns the cookie path on the server.
	 * @return string
	 * @see Cookie::$path
	 * @see Cookie::setPath()
	 */
	public function getPath()
	{
		return $this->path;
	}

	/**
	 * Sets domain on which the cookie is valid.
	 * @param string $domain Domain on wich the cookie is valid.
	 * Example: www.example.com
	 * @see Cookie::$domain
	 * @see Cookie::getDomain()
	 */
	public function setDomain($domain)
	{
		$this->domain = $domain;
	}

	/**
	 * Returns domain on which the cookie is valid.
	 * @return string
	 * @see Cookie::$domain
	 * @see Cookie::setDomain()
	 */
	public function getDomain()
	{
		return $this->domain;
	}

	/**
	 * Sets whether the cookie should be available only in secure connections.
	 * @param bool $secure If true, the cookie will be available only in secure
	 * connections (like HTTPS). Default is false.
	 * @see Cookie::$secure
	 * @see Cookie::getSecure()
	 */
	public function setSecure($secure)
	{
		$this->secure = $secure;
	}

	/**
	 * Returns whether the cookie is available only in secure connections.
	 * @return bool
	 * @see Cookie::$secure
	 * @see Cookie::setSecure()
	 */
	public function getSecure()
	{
		return $this->secure;
	}

	/**
	 * Sets whether the cookie should be available only under the HTTP protocol.
	 * @param bool $onlyHttp If true, the cookie will be available only under
	 * the HTTP protocol, so script languages like Javascript do not have
	 * access. Default is false.
	 * @see Cookie::$onlyHttp
	 * @see Cookie::getOnlyHttp()
	 */
	public function setOnlyHttp($onlyHttp)
	{
		$this->onlyHttp = $onlyHttp;
	}

	/**
	 * Returns whether the cookie is available only under the HTTP protocol.
	 * @return bool
	 * @see Cookie::$onlyHttp
	 * @see Cookie::setOnlyHttp()
	 */
	public function getOnlyHttp()
	{
		return $this->onlyHttp;
	}

	/**
	 * Return the value of the Set-Cookie header for this cookie.
	 * @return string
     * @todo Fix date when the time expressed in Cookie::$expires is not GMT.
	 */
	public function getHeader()
	{
		$cookieHeader = '';
		$name = urlencode($this->name);
		$value = null;
		$expires = '';

		if($this->value !== false)
		{
			$value = $this->encodedValue;

			if($this->expires > 0)
			{
				$date = Date::parse($this->expires)->getGMT(Date::COOKIE);
				$expires = "; expires={$date}";
			}
		}
		else
		{
			$value = 'deleted';
			$date = Date::get();
			$date->addDay(-365);
			$expires = "; expires={$date->getGMT(Date::COOKIE)}";
		}

		$path = $this->path;
		$domain = !empty($this->domain) ? "; domain={$this->domain}" : '';
		$cookieHeader = "{$name}={$value}{$expires}; path={$path}{$domain}";

		return $cookieHeader;
	}

	/**
	 * Sets or returns information saying whether the cookie was already sent.
	 *
	 * If the parameter bool is passed, the information will be updated. If it
	 * is omited, a boolean will be returned to say if the cookie was sent or
	 * not.
	 * @param bool $bool True if the cookie was sent, false otherwise.
	 * @return bool
	 */
	public function isSent($bool = null)
	{
		if(is_bool($bool))
		{
			if(!$this->cookieSent)
				$this->cookieSent = $bool;
		}
		else
		{
			return $this->cookieSent;
		}
	}

	/**
	 * Returns the path of the file that contains the meta information of the
	 * cookie.
	 * @return string
	 */
	private function getMetaFilePath()
	{
		return (Application::getCurrent() ? Application::getCurrent()->getPath('temp') : Enviroment::getPath('temp')) . "{$this->id}.cookie";
	}

	/**
	 * Sends the cookie header.
	 */
	private function sendHeader()
	{
		if($this->secure ? Enviroment::getRequest()->getSecureConnection() : true)
		{
			header("Set-Cookie: {$this->getHeader()}", false);
			$this->cookieSent = true;
			CookiesManager::sent($this->name);
		}
	}
}
?>