<?php
/**
 * This file sets some commom properties for the application enviroment.
 * @version 0.4
 * @package Core
 */

/**
 * This class contains commom properties for the application.
 * @author Diego Andrade
 * @package Core
 * @since Optimuz 0.3
 * @version 0.9
 * @final
 * @static
 * @uses Configuration
 * @uses Http
 * @uses Application
 * @uses Strings.Text
 */
final class Enviroment
{
	/**
	 * Directory separator used by the system.
	 */
	const DIR_SEP						= DIRECTORY_SEPARATOR;

	/**
	 * End of line on the current OS.
	 */
	const EOL							= PHP_EOL;

	/**
	 * End of line on Windows OS (CRLF).
	 */
	const WINDOWS_EOL					= "\r\n";

	/**
	 * End of line on Unix OS (LF).
	 */
	const UNIX_EOL						= "\n";

	/**
	 * Operational system on which PHP was built.
	 *
	 * This may be different from the OS where the application is running. To
	 * check the OS where the application is running use the method
	 * Enviroment::getOS().
	 * @see Enviroment::getOS()
	 */
	const OS							= PHP_OS;

	/**
	 * Global instance of HttpScriptResponse. Only one is allowed per script
	 * request.
	 * @var CurrentHttpRequest
	 * @static
	 */
	private static $request				= null;

	/**
	 * Global instance of HttpScriptResponse. Only one is allowed per script
	 * request.
	 * @var CurrentHttpResponse
	 * @static
	 */
	private static $response				= null;

	/**
	 * Profile of the host where the application is running.
	 * @var string
	 * @static
	 */
	private static $hostProfile			= null;

	/**
	 * Ture if the current enviroment is web or false otherwise.
	 * @var bool
	 * @static
	 * @see Enviroment::setWebEnviroment()
	 * @see Enviroment::isWebEnviroment()
	 */
	private static $webEnviroment		= null;

	/**
	 * This array stores all paths used in the application.
	 * @var array
	 * @static
	 * @see Enviroment::getPath()
	 */
	private static $paths				= array();

	/**
	 * Application paths that can be added to the PHP include path.
	 * @var array
	 * @static
	 * @see Enviroment::setPath()
	 * @see Enviroment::addPaths()
	 */
	private static $includePaths			= array();

	/**
	 * Returns the name of the operational system on which the application is
	 * running.
	 * @return string
	 * @see Enviroment::OS
	 * @static
	 */
	public static function getOS()
	{
		return php_uname('s');
	}

	/**
	 * Checks if the OS on which application is running is a Linux distribution.
	 * @return bool
	 * @see Enviroment::getOS()
	 * @static
	 */
	public static function isLinux()
	{
		return stripos(self::getOS(), 'linux') !== false;
	}

	/**
	 * Checks if the OS on which application is running is a Windows.
	 * @return bool
	 * @see Enviroment::getOS()
	 * @static
	 */
	public static function isWindows()
	{
		return stripos(self::getOS(), 'win') === 0;
	}

	/**
	 * Returns the global instance of HttpScriptRequest.
	 * @return CurrentHttpRequest
	 * @static
	 */
	public static function getRequest()
	{
		if(is_null(self::$request))
			self::$request = CurrentHttpRequest::getInstance();

		return self::$request;
	}

	/**
	 * Returns the global instance of HttpScriptResponse.
	 * @return CurrentHttpResponse
	 * @static
	 */
	public static function getResponse()
	{
		if(is_null(self::$response))
			self::$response = CurrentHttpResponse::getInstance();

		return self::$response;
	}

	/**
	 * Returns the name of the current application profile.
	 * @return string
	 * @static
	 */
	public static function getCurrentProfile()
	{
		if(is_null(self::$hostProfile))
		{
			foreach(GlobalConfiguration::getSettings() as $name => $value)
			{
				if((stripos($name, 'servers.') === 0) && $value == $_SERVER['HTTP_HOST'])
				{
					self::$hostProfile = end((explode('.', $name, 2)));
					break;
				}
			}
		}

		return self::$hostProfile;
	}

	/**
	 * Sets whether the current enviroment is web.
	 * @param bool $isWeb True if the current enviroment is web, false
	 * otherwise.
	 * @see Enviroment::$webEnviroment
	 * @see Enviroment::isWebEnviroment()
	 */
	public static function setWebEnviroment($isWeb)
	{
		self::$webEnviroment = $isWeb;
	}

	/**
	 * Checks whether the current enviroment is web.
	 * @return bool
	 * @see Enviroment::$webEnviroment
	 * @see Enviroment::setWebEnviroment()
	 */
	public static function isWebEnviroment()
	{
		return self::$webEnviroment;
	}

	/**
	 * Initializes the paths' settings.
	 * @param string $customDocRoot (optimal) Path to document root. If not
	 * given, the value of $_SERVER['DOCUMENT_ROOT'] will be used.
	 * @static
	 */
	public static function initializePathsConfiguration($customDocRoot = null)
	{
		$sep = self::DIR_SEP;

		//
		// Application paths declaration
		//
		// main paths
		$docRoot = preg_replace('/\\\|\//', $sep, (isset($customDocRoot) ? $customDocRoot : reset((explode('Optimuz', __FILE__)))));
		self::setPath('baseUrl',		reset((explode('index.php', $_SERVER['PHP_SELF']))), false);
		self::setPath('host',			(isset($_SERVER['HTTP_HOST']) ? self::getSchema() . '://' . $_SERVER['HTTP_HOST'] . '/' : null), false);
		self::setPath('publicDir',	$docRoot . ($docRoot{strlen($docRoot) - 1} !== $sep ? $sep : ''), false);
		self::setPath('root',			implode($sep, (array_slice((explode($sep, self::getPath('publicDir'))), 0, -2))) . $sep, false);

		// framework directories
		self::setPath('framework',	is_dir(self::getPath('publicDir') . 'Optimuz' . $sep) ? (self::getPath('publicDir') . 'Optimuz' . $sep) : (self::getPath('root') . 'Optimuz' . $sep), false);
		self::setPath('config',		self::getPath('framework') . 'config' . $sep, false);
		self::setPath('lang',			self::getPath('framework') . 'lang' . $sep, false);
		self::setPath('upload',		self::getPath('framework') . 'upload' . $sep, false);
		self::setPath('log',			self::getPath('framework') . 'log' . $sep, false);
		self::setPath('temp',			self::getPath('framework') . 'temp' . $sep, false);
		self::setPath('cache',		self::getPath('framework') . 'cache' . $sep, false);
		self::setPath('packages',		self::getPath('framework') . 'lib' . $sep, false);
		self::setPath('session',		self::getPath('framework') . 'session' . $sep, false);
		self::setPath('apps',			self::getPath('framework') . 'apps' . $sep, false);
		self::setPath('vendor',		self::getPath('framework') . 'vendor' . $sep);
		self::setPath('tests',		self::getPath('framework') . 'tests' . $sep, false);
		self::setPath('threads',		self::getPath('framework') . 'threads' . $sep, false);
		self::setPath('orm',			self::getPath('framework') . 'orm' . $sep, false);
	}

	/**
	 * Add the application paths to the PHP include path.
	 * @see Enviroment::setPath()
	 * @see Enviroment::getPath()
	 * @see Enviroment::$includePaths
	 */
	public static function addPaths()
	{
		$sep = stripos(php_uname('s'), 'win') === 0 ? ';' : ':';

		foreach(self::$includePaths as $value)
			set_include_path(get_include_path() . $sep . $value);
	}

	/**
	 * Sets a new path in the framework.
	 *
	 * If the path already exists it will be replaced.
	 * @param string $name The path will be available with this name, and may be
	 * called with the Enviroment::getPath() method.
	 * @param string $path The complete path.
	 * @param bool $includePath (optimal) If true, the new path will be added to
	 * the PHP include path when the Enviroment::addPaths() method is called.
	 * Default is true.
	 * @see Enviroment::getPath()
	 * @see Enviroment::addPaths()
	 * @see Enviroment::$includePaths
	 */
	public static function setPath($name, $path, $includePath = true)
	{
		self::$paths[$name] = $path;

		if($includePath)
			self::$includePaths[$name] = $path;
	}

	/**
	 * Returns a framework's path. If the path doesn't exist, a null is
	 * returned.
	 *
	 * The current paths are:
	 * <ul>
	 * <li>baseUrl - application base URL. Default is '/'.</li>
	 * <li>host - the host name of where the application is running.
	 * Example: http://localhost/.</li>
	 * <li>publicDir - physical path to the application public directory (www,
	 * httpdocs, public_html, etc).</li>
	 * <li>root - physical path to the application root directory.</li>
	 * <li>framework - physical path to the Optimuz directory. This is the root
	 * directory of the framework.</li>
	 * <li>config - physical path to the Optimuz configuration directory.</li>
	 * <li>lang - physical path to the languages files. Files in this foler must
	 * to have the extension .lang and follow the syntax of a regular Properties
	 * file. </li>
	 * <li>upload - physical path to the uploaded files directory.</li>
	 * <li>log - physical path to the application log.</li>
	 * <li>temp - physical path to the application temporary directory. Use this
	 * directory for temporary files.</li>
	 * <li>cache - physical path to the cache directory. Use this directory to
	 * store files that may persist between user sessions, or to share
	 * information among all the application users.</li>
	 * <li>packages - physical path to the framework's library.</li>
	 * <li>session - physical path to the session directory. All application
	 * sessions are stored here.</li>
	 * <li>apps - physical path to the applications' directory. This is the
	 * place for applications, that are mapped using routers.</li>
	 * <li>vendor (*) - physical path to the vendor directory. This directory holds
	 * scripts and projects of other vendors.</li>
	 * <li>tests - physical path to the tests directory. This directory can be
	 * used for unit tests.</li>
	 * <li>threads - physical path to the threads directory. This directory is
	 * used to manage background threads.</li>
	 * <li>orm - physical path to the ORM directory. This directory holds the
	 * classes used to access databases.</li>
	 * </ul>
	 * Paths signed with (*) are included in the include path.
	 * @param string $pathName A valid application path.
	 * @return string
	 * @static
	 * @see Enviroment::setPath()
	 * @see Enviroment::addPaths()
	 */
	public static function getPath($pathName)
	{
		$path = null;

		if(isset(self::$paths[$pathName]))
			$path = self::$paths[$pathName];

		return $path;
	}

	/**
	 * Returns the schema based on the current request.
	 * @return string Returns either http or https.
	 * @static
	 */
	public static function getSchema()
	{
		return isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on') ? 'https' : 'http';
	}

	/**
	 * Returns the current application, or null if none are defined.
	 * @return Application
	 */
	public static function getApplication()
	{
		return Application::getCurrent();
	}

	/**
	 * Returns the shared application of the project.
	 * @return SharedApplication
	 */
	public static function getSharedApplication()
	{
		return SharedApplication::getInstance();
	}

	/**
	 * Returns the system application of the project.
	 * @return SystemApplication
	 */
	public static function getSystemApplication()
	{
		return SystemApplication::getInstance();
	}

	/**
	 * Replaces the tilde character by the application's base URL.
	 *
	 * If there is no tilde at the beginning of the URL or the application's
	 * base URL is not set, nothing is done and the original URL is returned.
	 *
	 * For example: if the URL "~/controller/method/param" is given and the
	 * application's base URL is "/my/custom/app", then the resulting URL will
	 * be "/my/custom/app/controller/method/param".
	 * @static
	 * @param string $url URL to resolve.
	 * @return string
	 */
	public static function resolveUrl($url)
	{
		if((Text::index('~', $url) === 0) && ($baseUrl = Application::getCurrent()->getBaseUrl()))
			$url = Text::replace('#^~/?#', $baseUrl, $url);

		return $url;
	}

	/**
	 * Normalizes the path by fixing the directory separator.
	 *
	 * This method does not resolve applications' paths. Fot this, use the
	 * Enviroment::resolveUrl().
	 *
	 * For example: the path "/some//path\to\file" will become
	 * "/some/path/to/file".
	 * @static
	 * @param string $path Path to normalize.
	 * @param string $customDirSep (optional) If is given, this will be used as
	 * the directory separator.
	 * @return string
	 */
	public static function normalizePath($path, $customDirSep = null)
	{
		$sep = !empty($customDirSep) ? $customDirSep : self::getDirectorySeparator();
		$normalizedPath = Text::replace('#\\\+#', $sep, $path);
		$normalizedPath = Text::replace('#([^:])/{2,}#', '$1' . $sep, $normalizedPath);
		return $normalizedPath;
	}

	/**
	 * Return the directory separator to use in string paths. This separator is
	 * set in the global configuration file at filesystem.dir.separator. If this
	 * setting is set to "auto", then the separator is retrieved from the file
	 * system ("\" for Windows systems or "/" for Unix systems).
	 * @return string
	 * @see GlobalConfiguration
	 */
	public static function getDirectorySeparator()
	{
		$dirSep = GlobalConfiguration::get('filesystem.dir.separator');
		return empty($dirSep) || ($dirSep == 'auto') ? Enviroment::DIR_SEP : $dirSep;
	}

	/**
	 * Sets a new memory limit for the running script.
	 * @param int|string $limit The new limit can be a number of bytes as an
	 * integer, or a string in the format 0UN, where zero is the number and UN
	 * is the unit (KB, MB and so on).
	 * @return boolean Return true on success or false on errors.
	 * @static
	 */
	public static function setMemoryLimit($limit)
	{
		if(is_string($limit))
			$limit = preg_replace ('#[Bb]$#', '', $limit);

		return ini_set('memory_limit', $limit) !== false;
	}

	/**
	 * Returns the memory limit for the running script.
	 * @param bool $format (optimal) If true than the resulting number will be
	 * formatted to be represented in MB, otherwise the number will be returned
	 * in bytes. Default is true.
	 * @return int
	 * @return float
	 * @return string
	 * @static
	 */
	public static function getMemoryLimit($format = true)
	{
		$limit = ini_get('memory_limit');

		if(is_string($limit))
		{
			$limit = strtoupper($limit);

			if(preg_match('/(\d+(?:[\.,]\d+)?)\s?[KMGT]/', $limit))
			{
				if(!$format)
					$limit = self::getByteSize($limit);
				else
					$limit .= 'B';
			}
			elseif(is_numeric($limit))
			{
				if($format)
					$limit = number_format(($limit / 1024 / 1024), 4, ',', '.') . 'MB';
				else
					$limit = (float)$limit;
			}
		}

		return $limit;
	}

	/**
	 * Dynamically set a new memory limit based on the given memory amount and
	 * the current memory used.
	 *
	 * This method calculate whether there is available memory to allocate the
	 * new memory block. If there's no memory left, then a new limit is set.
	 * @param int|string $memoryBlock This is an amount of memory to allocate.
	 * It can be a number of bytes as an  integer, or a string in the format
	 * 0UN, where zero is the number and UN is the unit (KB, MB and so on).
	 * @return boolean Return true if a new limit is set or false otherwise.
	 * @static
	 */
	public static function raiseMemoryLimit($memoryBlock)
	{
		$updatedLimit = false;
		$usedMemory = self::getUsedMemory(false);
		$currentLimit = self::getMemoryLimit(false);
		$memoryBlock = self::getByteSize($memoryBlock);
		$newLimit = $usedMemory + $memoryBlock;

		if($newLimit > $currentLimit)
			$updatedLimit = self::setMemoryLimit($newLimit);

		return $updatedLimit;
	}

	/**
	 * Returns the amount of memory used by the script.
	 * @param bool $format (optimal) If true than the resulting number will be
	 * formatted to be represented in MB, otherwise the number will be returned
	 * in bytes. Default is true.
	 * @return int
	 * @return string
	 */
	public static function getUsedMemory($format = true)
	{
		$memoryUsed = memory_get_usage();
		return $format ? number_format(($memoryUsed / 1024 / 1024), 4, ',', '.') . 'MB' : $memoryUsed;
	}

	/**
	 * Returns the byte size.
	 *
	 * If $size is not a string or an integer, this method returns a null value.
	 * @param string $size Size expressed as KB, MB etc.
	 * @return int
	 * @return float
	 * @static
	 */
	public static function getByteSize($size)
	{
		$byteSize = null;

		if(is_string($size))
		{
			if(preg_match('/(\d+(?:[\.,]\d+)?)\s?([KMGT])B?/', strtoupper($size), $match))
			{
				$sizes = array(
					'K'		=> 1024,
					'M'		=> 1048576,
					'G'		=> 1073741824,
					'T'		=> 1099511627776
				);

				$number = $match[1];
				$unit = $match[2];

				if(isset($sizes[$unit]))
					$byteSize = (float)$number * $sizes[$unit];
			}
			elseif(is_numeric($size))
			{
				$byteSize = (float)$size;
			}
		}
		elseif(is_int($size) || is_float($size) || is_real($size))
		{
			$byteSize = $size;
		}

		return $byteSize;
	}

	/**
	 * Just disable the script timeout.
	 * @static
	 */
	public static function disableTimeout()
	{
		set_time_limit(0);
	}
}
?>
