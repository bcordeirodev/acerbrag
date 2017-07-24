<?php
/**
 * This file belongs to the Storage package.
 * @version 0.1
 * @package Storage.Cache
 */

/**
 * This class is used to manage caches of packages and objects.
 * @author Diego Andrade
 * @package Storage.Cache
 * @since Optimuz 0.3
 * @version 0.1.1
 * @static
 */
class CacheManager
{
	/**
	 * This array stores all objects that will be cached.
	 * @var array
	 * @static
	 * @see CacheManager::add()
	 */
	protected static $cacheArray			= array();

	/**
	 * Adds an object to be cached in the end of the script.
	 * @param Cacheable $cache An object that extends the Cacheable class.
	 * @static
	 * @see CacheManager::$cacheArray
	 * @see CacheManager::remove()
	 */
	public static function add(Cacheable $cache)
	{
		self::$cacheArray[] = $cache;
	}

	/**
	 * Removes an object that was previously added by CacheManager::add().
	 * @param Cacheable $cache Object to remove.
	 * @static
	 * @see CacheManager::$cacheArray
	 * @see CacheManager::add()
	 */
	public static function remove(Cacheable $cache)
	{
		$index = array_search($cache, self::$cacheArray);

		if($index !== false)
			unset(self::$cacheArray[$index]);
	}

	/**
	 * Saves all stored objects to cache files. These files are saved in the
	 * directory /Optimuz/cache/.
	 * @static
	 * @see CacheManager::add()
	 * @see CacheManager::$cacheArray
	 */
	public static function save()
	{
		if(!empty(self::$cacheArray))
		{
			foreach(self::$cacheArray as $cache)
			{
				if((!$cache->isCached() ? true : $cache->isForceUpdate()) && $cache->hasData())
					$cache->save();
			}
		}
	}
}
?>