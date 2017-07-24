<?php
/**
 * This file defines a good way to read and edit the application configuration.
 * @version 0.3
 * @package Configuration
 */

/**
 * This class manages the configurations setted in the application
 * configurations file. Configurations file can be a XML or a Properties text
 * file.
 * @author Diego Andrade
 * @package Configuration
 * @since Optimuz 0.4
 * @version 0.3
 * @final
 * @static
 * @uses Core
 * @uses IO
 * @uses Lang
 */
final class LocalConfiguration extends Configuration
{
	/**
	 * Configuration ID.
	 * @var string
	 * @static
	 */
	private static $configId			= null;

	/**
	 * Loads the configurations from the configuration file, indicated by the 
	 * $configType. The configuration file can be a XML file or a
	 * Properties text file.
	 * @param string $configType Defines the type of the file configuration
	 * that will be loaded. Default is Configuration::TEXT_CONFIG.
	 * @static
	 */
	public static function load($configType = self::TEXT_CONFIG)
	{
		self::$configId = get_class();
		$path = Application::getCurrent()->getPath('config') . 'settings' . Enviroment::DIR_SEP . "local.{$configType}";
		self::loadSettings($path, $configType, self::$configId);
	}

	/**
	 * This method is used to restore a previously cached data.
	 * @static
	 * @see Configuration::$attributes
	 */
	public static function restore()
	{
		self::$configId = get_class();
		self::$attributes[self::$configId] = require_once Enviroment::getPath('cache') . 'Configuration.inc';
	}

	/**
	 * Sets a value in the current configuration. Even settings not defined in
	 * the configuration file, can be added through this method.
	 *
	 * Changes made with this method are script only, and the configuration
	 * file will not be changed.
	 * @param string $name Setting name.
	 * @param string|int|bool $value Setting value.
	 * @static
	 * @see LocalConfiguration::get()
	 * @see LocalConfiguration::exists()
	 * @see LocalConfiguration::hasValue()
	 */
	public static function set($name, $value)
	{
		parent::internalSet($name, $value, self::$configId);
	}

	/**
	 * Returns a setting or null if not exists.
	 *
	 * If the local setting is null, then the global setting is returned (note
	 * that the global settings still can be null). This way, local settings
	 * take priority over global settings.
	 * @param string $name Setting name.
	 * @return string|int|bool|null
	 * @static
	 * @see LocalConfiguration::get()
	 */
	public static function get($name)
	{
		$value = parent::internalGet($name, self::$configId);

		if(is_null($value))
			$value = GlobalConfiguration::get($name);

		return $value;
	}

	/**
	 * Checks if the setting with the given name exists, even if it has no
	 * value.
	 * @return bool
	 * @static
	 * @see LocalConfiguration::get()
	 * @see LocalConfiguration::set()
	 * @see LocalConfiguration::hasValue()
	 */
	public static function exists($name)
	{
		return parent::internalExists($name, self::$configId);
	}

	/**
	 * Checks if the setting with the given name has some value.
	 * @return bool
	 * @static
	 * @see LocalConfiguration::get()
	 * @see LocalConfiguration::set()
	 * @see LocalConfiguration::exists()
	 */
	public static function hasValue($name)
	{
		return parent::interalHasValue($name, self::$configId);
	}

	/**
	 * Sets a new set of settings for the global configuration. The new settings
	 * will overwrite the old one.
	 * @param ArrayList $settings
	 * @static
	 * @see Configuration::$attributes
	 * @see LocalConfiguration::getSettings()
	 */
	public static function setSettings(ArrayList $settings)
	{
		parent::internalSetSettings($settings, self::$configId);
	}

	/**
	 * Returns an ArrayListIterator to iterate through the stored settings.
	 *
	 * The settings are returned by reference.
	 * @return ArrayList
	 * @static
	 * @see Configuration::$attributes
	 * @see LocalConfiguration::getSettings()
	 */
	public static function &getSettings()
	{
		return parent::internalGetSettings(self::$configId);
	}

	/**
	 * Returns a bool indicating whether the settings were loaded.
	 * @return bool
	 */
	public static function isLoaded()
	{
		return parent::internalIsLoaded(self::$configId);
	}
}
?>