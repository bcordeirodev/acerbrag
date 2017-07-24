<?php
/**
 * This file defines a good way to read and edit the application configuration.
 * @version 0.1
 * @package Configuration
 */

/**
 * This class is used to store and recover the settings of the Configuration
 * class.
 * @author Diego Andrade
 * @package Configuration
 * @since Optimuz 0.3
 * @version 0.3
 * @final
 * @static
 * @uses Storage.Cache
 */
final class ConfigurationCache extends Cacheable
{
	/**
	 * Global configuration.
	 */
	const TYPE_GLOBAL			= 1;

	/**
	 * Local configuration.
	 */
	const TYPE_LOCAL			= 2;

	/**
	 * Type of configuration (global and local).
	 * @var int
	 */
	private $type				= null;

	/**
	 * Creates a new class instance.
	 *
	 * All settings stored in the Configuration class can be cached with this
	 * class.
	 * @param string $name The configuration's name that we want to
	 * recover/save.
	 * @param int $type The type of the configuration
	 * (ConfigurationCache::TYPE_GLOBAL or ConfigurationCache::TYPE_LOCAL).
	 */
	public function __construct($name, $type)
	{
		$this->name = $name;
		$this->type = $type;
		$this->update = true;
		CacheManager::add($this);
	}

	/**
	 * Restores all settings stored in the application configuration.
	 */
	public function restore()
	{
		$settings = require_once $this->getFilePath();

		if($this->type == self::TYPE_GLOBAL)
		{
			GlobalConfiguration::setSettings(new ArrayList($settings));
			$this->data = &GlobalConfiguration::getSettings()->toArray();
		}
		else
		{
			LocalConfiguration::setSettings(new ArrayList($settings));
			$this->data = &LocalConfiguration::getSettings()->toArray();
		}
	}
}
?>