<?php
/**
 * This is the application cache system handler.
 *
 * The application cache is a XML file which name is the host name plus
 * the extension .cache. For example, if the application host is
 * www.example.com, the cache file will be named www.example.com.cache. So we
 * can have caches of many host inside the same application without conflict.
 * The cache files are stored in the /Optimuz/cache/ directory.
 *
 * Any value can be cached and there is no expiration date for the stored files.
 * However, the cache can be cleared at any time.
 *
 * Any file can be saved on the cache diretory, not only the application cache
 * ones.
 * @version 0.3
 * @package Storage.Cache
 */

/**
 * This class handles the application cache files through simple methods. The
 * application cache files are that named like hostname.cache. Others files in
 * the cache directory are not handled by this class, although they can remain
 * there.
 * @author Diego Andrade
 * @package Storage.Cache
 * @since Optimuz 0.1
 * @version 0.4
 * @static
 * @uses Core
 * @uses IO
 * @uses Lang
 */
class Cache
{
	/**
	 * General error (not specified).
	 */
	const ERROR						= 1700;


	/**
	 * Application's cache.
	 */
	const CACHE_APPLICATION			= 1;

	/**
	 * Global chace.
	 */
	const CACHE_GLOBAL				= 2;

	/**
	 * Global chace.
	 */
	const CACHE_BOTH				= 3;

	/**
	 * Data that will be cached.
	 *
	 * Must be an array with data that can be cached and restored.
	 * @var array
	 */
	private static $data			= null;

	/**
	 * Remove all files in the cache directory.
	 *
	 * Returns true on success and false on error.
	 * @param int $cache Which application to clear. Default is
	 * Cache::CACHE_APPLICATION.
	 * @param bool $clearAll (optimal) Defines if all files in the cache
	 * directory must to be removed, including the application cache files
	 * (hostname.cache). If true, all application cache (from all hosts) will be
	 * removed too. Default is false.
	 * @return bool
	 * @static
	 * @see Cache::set()
	 * @see Cache::get()
	 * @see Cache::remove()
	 * @see Cache::exists()
	 */
	public static function clear($cache = self::CACHE_APPLICATION, $clearAll = true)
	{
		$success = false;

		try
		{
			$cachePath = null;

			switch($cache)
			{
				case self::CACHE_APPLICATION:
					$cachePath = Application::getCurrent()->getPath('cache');
					break;
				case self::CACHE_GLOBAL:
					$cachePath = Enviroment::getPath('cache');
					break;
				case self::CACHE_BOTH:
					self::clear(self::CACHE_APPLICATION, $clearAll);
					self::clear(self::CACHE_GLOBAL, $clearAll);
					$success = true;
					break;
			}

			if(is_dir($cachePath))
			{
				self::clearCacheDir(Dir::open($cachePath), $clearAll);
				$success = true;
			}
		}
		catch(Error $err)
		{
			Report::sendError($err);
		}

		return $success;
	}

	/**
	 * Removes all files from the given cache directory.
	 * @param Dir $cacheDir Cache directory where files must be removed from.
	 * @param bool $clearAll (optimal) Defines if all files in the cache
	 * directory must to be removed, including the application cache files
	 * (hostname.cache). If true, all application cache (from all hosts) will be
	 * removed too. Default is false.
	 */
	private static function clearCacheDir($cacheDir, $clearAll)
	{
		$files = $cacheDir->getFiles();

		foreach($files as $file)
		{
			if($clearAll ? true : $file->getExtension() != 'cache')
				File::remove($file->getPath());
		}
	}

	/**
	 * Stores a value in the application cache.
	 *
	 * If a value with the name $name already exists in the cache, it is
	 * replaced.
	 *
	 * To remove a value from the cache, just set the $value to null or call the
	 * method Cache::remove() that will do the same thing for you.
	 *
	 * If the application cache file does not exist yet, it is created.
	 * Otherwise the value is only appended to the current cache file.
	 * @param string $name An identifier name to recover the value later.
	 * @param mixed $value Value to be stored.
	 * @static
	 * @see Cache::get()
	 * @see Cache::remove()
	 * @see Cache::exists()
	 * @see Cache::clear()
	 */
	public static function set($name, $value)
	{
		self::restore();

		if(!is_null($value))
		{
			self::$data[$name] = $value;
		}
		else
		{
			if(isset(self::$data[$name]))
				unset(self::$data[$name]);
		}
	}

	/**
	 * Returns a stored value from cache.
	 *
	 * If there is no stored value with $name, a null will be returned.
	 * @param string $name Identifier of the cached value.
	 * @return mixed
	 * @static
	 * @see Cache::set()
	 * @see Cache::remove()
	 * @see Cache::exists()
	 * @see Cache::clear()
	 */
	public static function get($name)
	{
		self::restore();
		$value = null;

		if(isset(self::$data[$name]))
			$value = self::$data[$name];

		return $value;
	}

	/**
	 * Removes a stored value from cache.
	 *
	 * This is the same as calling Cache::set($name, null).
	 * @param string $name Identifier of the cached value.
	 * @static
	 * @see Cache::set()
	 * @see Cache::get()
	 * @see Cache::clear()
	 */
	public static function remove($name)
	{
		self::set($name, null);
	}

	/**
	 * Checks if a value with the given name exists in the cache.
	 * @param string $name Identifier of the cached value.
	 * @return bool
	 * @static
	 * @see Cache::set()
	 * @see Cache::get()
	 * @see Cache::remove()
	 * @see Cache::clear()
	 */
	public static function exists($name)
	{
		self::restore();
		return isset(self::$data[$name]);
	}

	/**
	 * Returns the internal array with all cached values.
	 * @return array
	 * @static
	 */
	public static function toArray()
	{
		return self::$data;
	}

	/**
	 * Checks if there is no data cached.
	 *
	 * Returns true if the cache is empty or false otherwise.
	 * @return bool
	 * @static
	 */
	public static function isEmpty()
	{
		return count(self::$data) == 0;
	}

	/**
	 * Saves the current data to a cache file. The cache file is stored in the
	 * directory /Optimuz/cache/.
	 *
	 * All data will be serialized and then save to the file. So you can cache
	 * values of any available type in PHP.
	 * @see Cache::restore()
	 */
	public static function save()
	{
		$cachePath = self::getCacheFilePath();
		$cacheFile = File::create($cachePath);
		$cacheContent = "<?php return '" . addslashes(serialize(self::$data)) . "';\n";
		$cacheFile->write($cacheContent);
		$cacheFile->close();
	}

	/**
	 * Restores the cache data to the internal array.
	 *
	 * All data will be unserialized before stored in the internal array. So you
	 * will recover the values and their original types without the need to
	 * convert them.
	 * @see Cache::save()
	 */
	private static function restore()
	{
		if(!isset(self::$data))
		{
			$cachePath = self::getCacheFilePath();

			if(File::exists($cachePath))
				//self::$data = require_once $cachePath;
				self::$data = unserialize(stripslashes(require_once $cachePath));
			else
				self::$data = array();

			Application::getCurrent()->addListener('exit', array('Cache', 'save'));
//			register_shutdown_function('Cache::save');
		}
	}

	/**
	 * Returns the cache file path. If there is an application running, the
	 * app's directory cache is used. Otherwise, the global cache is used.
	 * @return string
	 * @static
	 */
	private static function getCacheFilePath()
	{
		$cachePath = null;

		if(Application::getCurrent())
			$cachePath = Application::getCurrent()->getPath('cache') . Application::getCurrent()->getName() . '.cache';
		else
			$cachePath = Enviroment::getPath('cache') . 'global.cache';

		return $cachePath;
	}
}
?>