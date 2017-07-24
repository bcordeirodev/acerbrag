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
 * @version 0.3
 * @abstract
 * @uses IO.File
 * @uses Configuration.LocalConfiguration
 * @uses Lang.Language
 * @uses Core.Enviroment
 * @uses Error.Report
 */
abstract class Cacheable
{
	/**
	 * The name of the cache was not specified.
	 */
	const NAME_MISSING			= 1701;

	/**
	 * Data that will be cached.
	 *
	 * Must be an array or an ArrayList instance with data that can be cached
	 * and restored.
	 * @var mixed
	 */
	protected $data				= null;

	/**
	 * Name used to indentify the cache.
	 * @var string
	 */
	protected $name				= null;

	/**
	 * Whether to force the current data to be cached again.
	 * @var bool false
	 */
	protected $update			= false;

	/**
	 * Adds the data to be cached.
	 * @param mixed $data Any data to be cached.
	 * @param string $name (optimal) The name used to identify the cache. If it
	 * is not given, the Cacheable::$name will be used as the cache name.
	 */
	public function cache(&$data, $name = null)
	{
		$this->data = &$data;

		if(is_string($name))
			$this->name = $name;
		elseif(is_null($this->name))
			throw new CacheError(Language::getInstance('Cache')->getSentence('error.nameMissing'), self::NAME_MISSING);
	}

	/**
	 * This method is used to restore a previously cached data. It must be
	 * implemented in the subclass.
	 *
	 * The data is only restored if the setting "performance.cache.enable" is
	 * true.
	 * @abstract
	 */
	abstract public function restore();

	/**
	 * Returns the data that will be saved on cache.
	 * @return mixed
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	 * Checks if there is data to be cached.
	 * @return bool
	 */
	public function hasData()
	{
		return !empty($this->data);
	}

	/**
	 * Returns the name that will be used to identify the cached data.
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Checks if the current data is already cached.
	 * @return bool
	 */
	public function isCached()
	{
		return File::exists($this->getFilePath());
	}

	/**
	 * Whether to forces the current data to be cached even if it is already
	 * cached.
	 * @param bool $update If is true the data will be cached again. Otherwise
	 * current data will not be cached, even if it was modified.
	 */
	public function forceUpdate($update)
	{
		$this->update = $update;
	}

	/**
	 * Checks whether the current data must be cached even if it is already
	 * cached.
	 * @return bool
	 */
	public function isForceUpdate()
	{
		return $this->update;
	}

	/**
	 * Checks if there is some cache with $cachename.
	 * @param string $cacheName Identifier name of a cached resource.
	 * @return bool
	 * @static
	 */
	public static function hasCache($cacheName)
	{
		$basePath = self::getBasePath();
		return File::exists("{$basePath}{$cacheName}.inc");
	}

	/**
	 * Removes the current data from cache (if it is cached).
	 */
	public function remove()
	{
		File::remove($this->getFilePath());
	}

	/**
	 * Saves the current data to a cache file. The cache file can be stored in
	 * two places: the application's cache /Optimuz/apps/APPLICATION_NAME/cache,
	 * or the global cache /Optimuz/cache/.
	 *
	 * The data is only cached if the setting "performance.cache.enable" is
	 * true.
	 */
	public function save()
	{
		if(LocalConfiguration::get('performance.cache.enable'))
		{
			$file = File::create($this->getFilePath());
			$cacheContent = "<?php\nreturn ";

			try
			{
				$cacheContent .= var_export($this->data, true);
			}
			catch(Exception $error)
			{
				Report::sendError(new Error($error->getMessage(), $error->getCode()));
			}

			$cacheContent .= ";\n?>";
			$file->write($cacheContent);
			$file->close();
		}
	}

	/**
	 * Retuns the base path for the cache file.
	 * @return string
	 * @static
	 */
	protected static function getBasePath()
	{
		$app = Application::getCurrent();
		return $app ? $app->getPath('cache') : Enviroment::getPath('cache');
	}

	/**
	 * Returns the path of the chace file.
	 * @return string
	 */
	protected function getFilePath()
	{
		$basePath = self::getBasePath();
		return "{$basePath}{$this->name}.inc";
	}
}
?>