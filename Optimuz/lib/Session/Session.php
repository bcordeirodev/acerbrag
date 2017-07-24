<?php
/**
 * This file is used to handle sessions.
 * @version 0.4
 * @package Session
 */

/**
 * Class used to handle sessions.
 * @author Diego Andrade
 * @package Session
 * @since Optimuz 0.1
 * @version 0.4
 * @uses Core.Enviroment
 * @uses Core.Serial
 * @uses Configuration
 * @uses Event
 * @uses Application
 * @uses Collection.ArrayList
 * @uses Strings.Text
 */
class Session
{
	/**
	 * Name of the session file.
	 * @var string
	 */
	protected $sessFile					= null;

	/**
	 * Session ID.
	 * @var string
	 */
	protected $id						= null;

	/**
	 * Session name.
	 * @var string
	 */
	protected $name						= null;

	/**
	 * Session cookie parameters.
	 * @var array
	 * @static
	 */
	protected static $cookieParams		= null;

	/**
	 * Whether the session is started.
	 * @var bool false
	 * @see Session::start()
	 */
	protected $started					= false;

	/**
	 * Whether the session is enabled.
	 * @var bool false
	 * @see Session::start()
	 */
	protected $enabled					= false;

	/**
	 * Prefix used for variables stored in session. If this is used, all
	 * variables will be named like "prefix_variableName".
	 * @var string
	 * @static
	 * @see Session::setPrefix()
	 * @see Session::getPrefix()
	 * @see Session::removePrefix()
	 * @see Session::getPrefixName()
	 */
	protected static $prefix			= null;

	/**
	 * This object is used to store the current session settings. It can to be
	 * accessed only by calling the method Session::getActive().
	 * @var Session
	 * @static
	 * @see Session::getActive()
	 */
	private static $instance			= null;

	/**
	 * Time before is considered as invalid.
	 * @var int
	 * @see Session::setTimeout()
	 * @see Session::getTimeout()
	 */
	private $timeout				= null;

	/**
	 * Time of the last access.
	 * @var int
	 * @see Session::updateTimeout()
	 * @see Session::getLastAccessTime()
	 */
	private $lastAccessTime			= null;
	
	/**
	 * The class constructor is protected, which provide us the ability to have
	 * only one instance per request.
	 *
	 * To get the session object you must to call the method
	 * Session::getActive().
	 * @see Session::getActive()
	 */
	protected function __construct()
	{
		// session
		self::$cookieParams = array();
		$this->config();

		// events cache
		if(LocalConfiguration::get('performance.cache.enable'))
		{
			$id = $this->getId();
			$cache = new SessionCache($id);

			if(SessionCache::hasCache("Session{$id}"))
				$this->listeners->merge($cache->restore());

			$cache->cache($this->listeners);
		}
	}

	/**
	 * Returns the session object.
	 *
	 * If it was not created yet, it is created and returned.
	 * @return Session
	 * @static
	 * @see Session::$instance
	 * @see Session::start()
	 * @see Session::persist()
	 */
	public static function getActive()
	{
		if(is_null(self::$instance))
			self::$instance = new self();
		
		return self::$instance;
	}

	/**
	 * Sets the prefix used to name session variables.
	 * @param string $prefix Any string.
	 * @static
	 * @see Session::$prefix
	 * @see Session::getPrefix()
	 * @see Session::removePrefix()
	 */
	public static function setPrefix($prefix)
	{
		self::$prefix = $prefix;
	}

	/**
	 * Returns the prefix used to name session variables.
	 * @return string
	 * @static
	 * @see Session::$prefix
	 * @see Session::setPrefix()
	 * @see Session::removePrefix()
	 */
	public static function getPrefix()
	{
		return self::$prefix;
	}

	/**
	 * Removes the prefix used to name session variables.
	 *
	 * New variables will not use the prefix anymore, but older variables will
	 * not change theirs names. So calling this method after setting variables
	 * will cause you to lose them.
	 * @static
	 * @see Session::$prefix
	 * @see Session::setPrefix()
	 * @see Session::getPrefix()
	 */
	public static function removePrefix()
	{
		self::$prefix = null;
	}

	/**
	 * Returns $key prefixed with Session::$prefix. If prefix is not defined the
	 * $key will be returned unmodified.
	 * @param string $key
	 * @return string
	 * @static
	 * @see Session::$prefix
	 * @see Session::setPrefix()
	 * @see Session::getPrefix()
	 * @see Session::removePrefix()
	 */
	protected static function getPrefixName($key)
	{
		return (is_string(self::$prefix) ? self::$prefix . '_' : '') . $key;
	}

	/**
	 * Stores a value in the session.
	 * @param string $key Value name.
	 * @param mixed $value Value to be stored.
	 * @static
	 * @see Session::get()
	 * @see Session::remove()
	 * @see Session::exists()
	 */
	public static function set($key, $value)
	{
		self::getActive()->enable();
		$key = self::getPrefixName($key);
		$_SESSION[$key] = $value;
		self::getActive()->disable();
	}

	/**
	 * Returns a value from session.
	 *
	 * If the value doesn't exist, a null value will be returned.
	 * @param string $key Value name.
	 * @return mixed
	 * @static
	 * @see Session::set()
	 * @see Session::remove()
	 * @see Session::exists()
	 */
	public static function get($key)
	{
		$data = null;
		$key = self::getPrefixName($key);
		
		if(self::exists($key))
			$data = $_SESSION[$key];
		
		return $data;
	}

	/**
	 * Removes a value from session.
	 * @param string $key Value name.
	 * @static
	 * @see Session::set()
	 * @see Session::get()
	 * @see Session::exists()
	 * @see Session::clear()
	 */
	public static function remove($key)
	{
		self::getActive()->enable();
		$key = self::getPrefixName($key);

		if(self::exists($key))
			unset($_SESSION[$key]);
		
		self::getActive()->disable();
	}

	/**
	 * Removes all values from session.
	 * @param bool $fullClear Whether to clear the entire session, not just the
	 * session of the current application. Default is false.
	 * @static
	 * @see Session::set()
	 * @see Session::get()
	 * @see Session::remove()
	 * @see Session::exists()
	 */
	public static function clear($fullClear = false)
	{
		self::getActive()->enable();
		
		if($fullClear || !is_string(self::$prefix))
		{
			$_SESSION = array();
		}
		else
		{
			foreach($_SESSION as $key => $value)
			{
				if(strpos($key, (self::$prefix . '_')) === 0)
					unset($_SESSION[$key]);
			}
		}
		
		self::getActive()->disable();
	}

	/**
	 * Checks if the value if name $key exists in the session.
	 * @param string $key Value name.
	 * @return bool
	 * @static
	 * @see Session::set()
	 * @see Session::get()
	 * @see Session::remove()
	 */
	public static function exists($key)
	{
		$key = self::getPrefixName($key);
		return (isset($_SESSION) && isset($_SESSION[$key]));
	}

	/**
	 * Tries to recover a previous started session.
	 * @return bool If there is an started session returns true, otherwise
	 * returns false.
	 * @static
	 * @see Session::getActive()
	 * @see Session::start()
	 */
	public static function persist()
	{
		$success = false;
		$sess = self::getActive();

		if(($name = $sess->getCustomName()))
			session_name($name);
		
		if(isset($_COOKIE[$sess->name]))
		{
			$success = true;
			$sess->started = $success;
			
			if(!isset($_SESSION) || !is_array($_SESSION))
				$sess->enable();
			
			$sess->config();

			if(($sess->timeout > 0) && isset($_SESSION[$sess->getTimeoutName()]))
			{
				$lastAccess = $_SESSION[$sess->getTimeoutName()];
				$elapsed = time() - $lastAccess;

				if($elapsed > $sess->timeout)
				{
					$success = false;
					$sess->close();
				}
				elseif(LocalConfiguration::get('session.timeout.autoUpdate'))
				{
					$sess->updateTimeout();
				}
			}
			
			$sess->disable();
		}
		
		return $success;
	}

	/**
	 * Checks if the session is empty, in other words, if it was not started or
	 * if it was started but has no value stored.
	 * @return bool
	 * @static
	 * @see Session::persist()
	 * @see Session::start()
	 * @see Session::isStarted()
	 */
	public static function isEmpty()
	{
		return !isset($_SESSION) ? true : empty($_SESSION);
	}

	/**
	 * Checks if the session was started for the current request.
	 * @return bool
	 * @static
	 * @see Session::persist()
	 * @see Session::start()
	 * @see Session::isEmpty()
	 */
	public static function isStarted()
	{
		$sess = self::getActive();
		return $sess->started;
	}

	/**
	 * Returns an ArrayList with the variables of the session.
	 * @return ArrayList
	 * @static
	 */
	public static function export()
	{
		return new ArrayList(isset($_SESSION) ? $_SESSION : array());
	}

	/**
	 * Tries to start a new session.
	 *
	 * If the session is already started, the method Session::persist() will be
	 * called to recover the session.
	 * @return bool If the session can be started/recovered, a true is returned;
	 * otherwise it will return false.
	 * @see Session::persist()
	 * @see Session::getActive()
	 * @see Session::isStarted()
	 * @see Session::isEmpty()
	 * @see Session::close()
	 */
	public function start()
	{
		$success = false;
		
		// starts a new session
		if(!isset($_SESSION) || !is_array($_SESSION))
		{
			if(($name = $this->getCustomName()))
				session_name($name);

			session_start();
			$success = $this->started = $this->enabled = true;
		}
		else
		{
			$success = $this->started = Session::persist();
			$this->enable();
		}
		
		$this->config();
		$this->updateTimeout();
		$this->disable();
		
		return $success;
	}

	/**
	 * Closes the current session, removing all data stored in it. This is a
	 * safe way to destroy the session with all its data.
	 * @param bool $deleteSessionFile (optimal) If this parameter is true, the
	 * session file will be removed. Otherwise, the session will be closed but
	 * its file will remain in the session folder. Default is true.
	 * @see Session::start()
	 */
	public function close($deleteSessionFile = true)
	{
		if(!$this->started)
			$this->start();

		$this->enable();

		// events cache
		if(LocalConfiguration::get('performance.cache.enable'))
		{
			try
			{
				$cache = new SessionCache($this->getId());
				$cache->remove();
			}
			catch(Exception $ex){}
		}
		
		// remove the session cookie
		if(isset($_COOKIE[$this->name]))
			setcookie($this->name, '', (time() - 42000), self::$cookieParams['path']);
		
		if(isset($_SESSION))
		{
			// remove all session data
			if(is_array($_SESSION))
				$_SESSION = array();
			
			// destroy the session
			session_destroy();
		}
		
		// remove the session file
		if($deleteSessionFile && file_exists($this->sessFile))
			unlink($this->sessFile);
		
		$this->started = false;
		$this->enabled = false;
	}

	/**
	 * Restarts the session. The session is closed and started again.
	 * @see Session::close()
	 * @see Session::start()
	 */
	public function restart()
	{
		$this->close();
		$this->start();
	}
	
	/**
	 * Enables the session for writing.
	 * @return boolean Returns true if the session is enabled, and false
	 * otherwise.
	 */
	protected function enable()
	{
		if(!$this->enabled && $this->started)
		{
			$this->enabled = true;
			session_start();
		}
		
		return $this->enabled;
	}
	
	/**
	 * Disables the session for writing. The session remains availabe for
	 * reading.
	 * @return boolean Returns true if the session is disabled, and false
	 * otherwise.
	 */
	protected function disable()
	{
		if($this->enabled && $this->started)
		{
			$this->enabled = false;
			session_write_close();
		}
		
		return $this->enabled;
	}

	/**
	 * This method looks for old sessions for removal.
	 * 
	 * The concept of an old session depends on the session timeout. When the
	 * different from the current timestamp and the last modified time of a
	 * session file is greater then the session timeout, the session is marked
	 * as old. From this point it can be removed. This is good to prevent dozen
	 * of files occuping space in the session directory, besides other problems.
	 * @static
	 */
	public static function collectGarbage()
	{
		$sessionDir = Dir::open(Application::getCurrent()->getPath('session'));
		$timeout = (int)LocalConfiguration::get('session.timeout.time') * 60;
		$now = time();
		
		foreach($sessionDir->getFiles() as $file)
		{
			if(($now - $file->getModifiedTime()) > $timeout)
				File::remove($file);
		}
	}


	/**
	 * Sets the cache limiter for the session. This changes the HTTP headers
	 * sent in the response. Accepted values are the same of the
	 * session_cache_limiter() function.
	 *
	 * This method must to be called before the session is started.
	 * @param string $limiter A cache limiter identifier: none, nocache, public,
	 * private, private_no_expire.
	 * @see Session::getCacheLimiter()
	 */
	public function setCacheLimiter($limiter)
	{
		self::getActive()->enable();
		session_cache_limiter($limiter);
		self::getActive()->disable();
	}

	/**
	 * Returns the current session chache limiter.
	 * @return string
	 * @see Session::setCacheLimiter()
	 */
	public function getCacheLimiter()
	{
		self::getActive()->enable();
		$value = session_cache_limiter();
		self::getActive()->disable();
		
		return $value;
	}

	/**
	 * Sets a new session ID.
	 *
	 * This method must to be called before the session is started.
	 * @param string $id New session ID.
	 * @see Session::getId()
	 * @see Session::$started
	 * @see Session::$id
	 */
	public function setId($id)
	{
		session_id($id);
		$_COOKIE[$this->name] = $id;
	}

	/**
	 * Returns the current session ID.
	 * @return string
	 * @see Session::setId()
	 * @see Session::$started
	 * @see Session::$id
	 */
	public function getId()
	{
		return $this->started ? $this->id : session_id();
	}

	/**
	 * Sets a new name for the session.
	 *
	 * This method must to be called before the session is started.
	 * @param string $name New session name.
	 * @see Session::getName()
	 * @see Session::$name
	 */
	public function setName($name)
	{
		session_name($name);
		$this->name = $name;
	}

	/**
	 * Returns the current session name.
	 * @return string
	 * @see Session::setName()
	 * @see Session::$name
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Sets the session timeout.
	 *
	 * The timeout can be setted with seconds, minutes and/or hours.
	 *
	 * Examples:
	 *
	 * <code>
	 * <?php
	 * $sess = Session::getActive();
	 * $sess->setTimeout(300); // 5 minutes
	 * $sess->start();
	 * ?>
	 * </code>
	 *
	 * <code>
	 * <?php
	 * $sess = Session::getActive();
	 * $sess->setTimeout(0, 15); // 15 minutes
	 * $sess->start();
	 * ?>
	 * </code>
	 *
	 * <code>
	 * <?php
	 * $sess = Session::getActive();
	 * $sess->setTimeout(0, 30, 2); // 2 hours and 30 minutes
	 * $sess->start();
	 * ?>
	 * </code>
	 * @param int $secs Seconds.
	 * @param int $mins (optimal) Minutes. Default is 0.
	 * @param int $hours (optimal) Hours. Default is 0.
	 */
	public function setTimeout($secs, $mins = 0, $hours = 0)
	{
		$time = ($hours * 3600) + ($mins * 60) + $secs;
		$this->timeout = $time;
	}

	/**
	 * Returns the session lifetime in minutes.
	 * @return int
	 */
	public function getTimeout()
	{
		return $this->timeout / 60;
	}

	/**
	 * Updates the session timeout.
	 */
	protected function updateTimeout()
	{
		$name = $this->getTimeoutName();

		if(isset($_SESSION[$name]))
			$this->lastAccessTime = $_SESSION[$name];
		
		$_SESSION[$name] = time();
	}

	/**
	 * Returns the name of the session variable used to calculate the session
	 * time file.
	 * @return string
	 */
	protected function getTimeoutName()
	{
		return "{$this->getCustomName()}_time";
	}

	/**
	 * Returns the timestamp of the session's last access time.
	 * @return int
	 */
	public function getLastAccessTime()
	{
		return $this->lastAccessTime;
	}

	/**
	 * Sets the session save path.
	 *
	 * This method must to be called before the session is started, and the
	 * scope of this change is only the running script. In other words, if you
	 * want to change the session save path using this method, you must call it
	 * in every request, always before you start/recover the session.
	 *
	 * If you want to definitly change the session save path, you may do it in
	 * the application configuration file.
	 * @param string $path New save path.
	 * @see Session::getPath()
	 * @see Session::getFilePath()
	 */
	public function setPath($path)
	{
		if(substr($path, -1) == Enviroment::DIR_SEP)
			$path = substr($path, 0, -1);
		
		session_save_path($path);
	}

	/**
	 * Returns the session save path.
	 * @return string
	 * @see Session::setPath()
	 * @see Session::getFilePath()
	 */
	public function getPath()
	{
		return session_save_path();
	}

	/**
	 * Returns the path of the file of the current session.
	 * @return string
	 */
	public function getFilePath()
	{
		if(!$this->started)
			$this->sessFile = $this->getPath() . 'sess_' . $this->getId();
		
		return $this->sessFile;
	}

	/**
	 * Sets values for the session cookie.
	 *
	 * The possible values are:
	 * <ul>
	 * <li>lifetime</li>
	 * <li>path</li>
	 * <li>domain</li>
	 * <li>secure</li>
	 * </ul>
	 * @param string $key Parameter name.
	 * @param string|int $value Parameter value.
	 * @see Session::getCookieParam()
	 * @static
	 */
	public static function setCookieParam($key, $value)
	{
		$params = self::getCookieParam();
		
		if(isset($params[$key]))
		{
			$time		= $key == 'lifetime' ? $value : $params['lifetime'];
			$path		= $key == 'path' ? $value : $params['path'];
			$domain		= $key == 'domain' ? $value : $params['domain'];
			$secure		= $key == 'secure' ? $value : $params['secure'];
			
			session_set_cookie_params($time, $path, $domain, $secure);
			self::$cookieParams[$key] = $value;
		}
	}

	/**
	 * Returns a specific value from the session cookie.
	 * @param string $key (optimal) Parameter name. If it is not specified, an
	 * array with all parameters is returned.
	 * @return string|int|array
	 * @see Session::setCookieParam()
	 * @static
	 */
	public static function getCookieParam($key = null)
	{
		$data = null;
		$params = session_get_cookie_params();
		
		if($key !== null)
		{
			if(isset($params[$key]))
				$data = $params[$key];
		}
		else
		{
			$data = $params;
		}
		
		return $data;
	}

	/**
	 * Sets the main session properties.
	 *
	 * This method is called every time a new session is started.
	 */
	protected function config()
	{
		$this->setTimeout(0, LocalConfiguration::get('session.timeout.time'));
		self::setCookieParam('lifetime', 0);
		$this->setPath(Application::getCurrent()->hasPath('session') ? Application::getCurrent()->getPath('session') : Enviroment::getPath('session'));
		$this->id							= session_id();
		$this->name							= $this->getCustomName();
		self::$cookieParams['lifetime']		= self::getCookieParam('lifetime');
		self::$cookieParams['path']			= self::getCookieParam('path');
		self::$cookieParams['domain']		= self::getCookieParam('domain');
		self::$cookieParams['secure']		= self::getCookieParam('secure');
		$this->sessFile						= $this->getPath() . Enviroment::DIR_SEP . 'sess_' . $this->id;
	}

	/**
	 * Returns a custom name based on the local settings.
	 * @return string|null
	 */
	protected function getCustomName()
	{
		$name = null;

		if(LocalConfiguration::get('session.cookie.name'))
			$name = LocalConfiguration::get('session.cookie.name');
		elseif(LocalConfiguration::get('session.savePath'))
			$name = Text::slug(Application::getCurrent()->getName());

		if($name && LocalConfiguration::get('session.cookie.encrypt'))
			$name = Serial::create(5, 2)->generate($name);

		return $name;
	}
}
?>