<?php
/**
 * This file defines a good way to read and edit the application configuration.
 * @version 0.4
 * @package Configuration
 */

/**
 * This class manages the configurations setted in the application
 * configurations file. Configurations file can be a XML or a Properties text
 * file.
 * @author Diego Andrade
 * @package Configuration
 * @since Optimuz 0.1
 * @version 0.5
 * @abstract
 * @static
 * @uses Core
 * @uses IO
 * @uses Lang
 */
class Configuration
{
	/**
	 * Configuration file could not be loaded.
	 */
	const NOT_lOADED							= 1301;

	/**
	 * Some configuration property is missing.
	 */
	const MISSING_CONFIGURATION					= 1302;

	/**
	 * XML configuration style.
	 */
	const XML_CONFIG							= 'xml';

	/**
	 * Properties text file configuration style.
	 */
	const TEXT_CONFIG							= 'properties';

	/**
	 * This array stores the configurations of the selected configuration file.
	 * @var ArrayList
	 * @static
	 */
	protected static $attributes					= array();

	/**
	 * Indicates whether the settings were loaded with success.
	 * @var bool false
	 */
	protected static $loaded						= array();

	/**
	 * Loads the configurations from the configuration file, indicated by the
	 * $configType. The configuration file can be a XML file or a
	 * Properties text file.
	 * @param string $configType Defines the type of the file configuration
	 * that will be loaded. Default is Configuration::TEXT_CONFIG.
	 * @static
	 * @abstract
	 */
	public static function load($configType = self::TEXT_CONFIG)
	{
	}

	/**
	 * This method is used to restore a previously cached data.
	 * @see Configuration::$attributes
	 * @static
	 * @abstract
	 */
	public static function restore()
	{
	}

	/**
	 * Returns a bool indicating whether the settings were loaded.
	 * @param string $configId ID of the configuration.
	 * @return bool
	 */
	protected static function internalIsLoaded($configId)
	{
		return self::$loaded[$configId];
	}

	/**
	 * Loads the configuration file.
	 * @param string $path Path to the settings file.
	 * @param string $configType Defines the type of the file configuration
	 * that will be loaded. Default is Configuration::TEXT_CONFIG.
	 * @param string $configId ID of the configuration.
	 */
	protected static function loadSettings($path, $configType, $configId)
	{
		self::$attributes[$configId] = new ArrayList();

		if(File::exists($path))
		{
			if($configType == self::TEXT_CONFIG)
			{
				$settings = File::open($path);
				self::getTextConfig($settings->readToArray(), $configId);
			}
			else
			{
				$settings = new Xml();

				if($settings->load($path))
				{
					$root = $settings->getElementsByTagName('settings')->item(0);
					$app = $root->getElementsByTagName('app')->item(0);

					if($app)
					{
						if($app->hasAttribute('name'))
							self::$attributes[$configId]['app.name'] = $app->getAttribute('name');

						if($app->hasAttribute('version'))
							self::$attributes[$configId]['app.version'] = $app->getAttribute('version');

						if($app->hasAttribute('enable'))
							self::$attributes[$configId]['app.enable'] = $app->getAttribute('enable') === 'true';
					}

					self::getXmlConfig($root, $configId);
					self::$loaded[$configId] = true;
				}
				else
				{
					throw new Error(Language::getCurrent()->getSentence('error.config.loadError', $path), self::NOT_lOADED);
				}
			}
		}
		else
		{
			throw new Error(Language::getCurrent()->getSentence('error.config.notExists', $path), File::NOT_EXISTS);
		}
	}

	/**
	 * Reads the XML document and stores its settings in the
	 * Configuration::$attributes array.
	 * @param DOMElement $node XML element to be read.
	 * @param string $configId ID of the configuration.
	 * @param string $parentName Parents concatened name of current element.
	 * @static
	 * @see Configuration::$attributes
	 * @see Configuration::load()
	 */
	protected static function getXmlConfig(DOMElement $node, $configId, $parentName = false)
	{
		$name = null;
		$value = null;

		if($parentName !== false)
		{
			if(!isset(self::$attributes[$configId][$parentName]))
				self::$attributes[$configId][$parentName] = new ArrayList();
		}

		if($node->hasChildNodes())
		{
			foreach($node->childNodes as $child)
			{
				switch($child->nodeType)
				{
					case XML_ELEMENT_NODE:
						$name = ($parentName !== false ? $parentName . '.' : '') . $child->nodeName;

						if($child->nodeName == 'list')
						{
							$array = new ArrayList();

							if($child->hasChildNodes())
							{
								$entries = $child->getElementsByTagName('entry');

								foreach($entries as $entry)
									$array->add(self::castValue($entry->nodeValue));
							}

							self::$attributes[$configId][$parentName]->addKey($child->nodeName, $array);
							self::$attributes[$configId][$name] = $array;
						}
						else
						{
							if(($parentName !== false))
							{
								$array = new ArrayList();
								self::$attributes[$configId][$parentName]->addKey($child->nodeName, $array);
								self::$attributes[$configId][$name] = $array;
							}

							self::getXmlConfig($child, $configId, $name);
						}
						break;
					case XML_TEXT_NODE:
						$name = $parentName;
						$value = self::castValue($child->nodeValue);
						self::$attributes[$configId][$name] = $value;
						self::setValueOnParentSet($configId, $name, $value);
						break;
					default:
						break;
				}
			}
		}
		elseif(!$node->hasAttributes())
		{
			$name = $parentName !== false ? $parentName : $node->nodeName;
			self::$attributes[$configId][$name] = null;
			self::setValueOnParentSet($configId, $name, null);
		}

		if($node->hasAttributes())
		{
			foreach($node->attributes as $attrName => $attrNode)
			{
				if($attrName != 'value')
				{
					$name = "{$parentName}.{$attrName}";
					$value = $attrNode->value;
					$keyName = $attrName;
				}
				elseif(!$node->hasAttribute('name'))
				{
					$name = $parentName;
					$value = $attrNode->value;
					$keyName = false;
				}
				else
				{
					$name = false;
				}

				if($name)
				{
					$value = self::castValue($value);
					self::$attributes[$configId][$name] = $value;

					if($keyName !== false)
						self::$attributes[$configId][$parentName]->addKey($keyName, $value);
					else
						self::setValueOnParentSet($configId, $name, $value);
				}
			}
		}
	}

	/**
	 * Sets the value of a setting on its parent set.
	 * @param string $configId ID of the configuration.
	 * @param string $name Complete name of the setting as "name.of.setting".
	 * @param mixed $value Value of the setting.
	 */
	protected static function setValueOnParentSet($configId, $name, $value)
	{
		$nameParts = Text::split('.', $name);
		$keyName = $nameParts->removeLast();
		self::$attributes[$configId][$nameParts->join('.')][$keyName] = $value;
	}

	/**
	 * Reads the array of the Properties text file and stores its settings in
	 * the Configuration::$attributes array.
	 * @param array $lines Array containing the lines from the Properties file.
	 * @param string $configId ID of the configuration.
	 * @static
	 * @see Configuration::$attributes
	 * @see Configuration::load()
	 */
	protected static function getTextConfig(array $lines, $configId)
	{
		foreach($lines as $line)
		{
			$line = trim($line);

			if(!!$line)
			{
				if($line{0} !== '#')
				{
					$parts = explode('=', $line, 2);
					$name = trim($parts[0]);
					$value = isset($parts[1]) ? trim($parts[1]) : '';
					self::$attributes[$configId][$name] = self::castValue($value);
				}
			}
		}
	}

	/**
	 * Sets a value in the current configuration. Even settings not defined in
	 * the configuration file, can be added through this method.
	 *
	 * Changes made with this method are script only, and the configuration
	 * file will not be changed.
	 * @param string $name Setting name.
	 * @param string|int|bool $value Setting value.
	 * @param string $configId ID of the configuration.
	 * @static
	 * @see Configuration::internalGet()
	 * @see Configuration::internalExists()
	 * @see Configuration::internalHasValue()
	 */
	protected static function internalSet($name, $value, $configId)
	{
		self::$attributes[$configId][$name] = $value;
	}

	/**
	 * Returns a setting or null if not exists.
	 * @param string $name Setting name.
	 * @param string $configId ID of the configuration.
	 * @return string|int|bool|null
	 * @static
	 * @see Configuration::internalSet()
	 * @see Configuration::internalExists()
	 * @see Configuration::internalHasValue()
	 */
	protected static function internalGet($name, $configId)
	{
		return isset(self::$attributes[$configId][$name]) ? self::$attributes[$configId][$name] : null;
	}

	/**
	 * Checks if the setting with the given name exists, even if it has no
	 * value.
	 * @param string $name Setting name.
	 * @param string $configId ID of the configuration.
	 * @return bool
	 * @static
	 * @see Configuration::internalGet()
	 * @see Configuration::internalSet()
	 * @see Configuration::internalHasValue()
	 */
	protected static function internalExists($name, $configId)
	{
		return isset(self::$attributes[$configId][$name]);
	}

	/**
	 * Checks if the setting with the given name has some value.
	 * @param string $name Setting name.
	 * @param string $configId ID of the configuration.
	 * @return bool
	 * @static
	 * @see Configuration::internalGet()
	 * @see Configuration::internalSet()
	 * @see Configuration::internalExists()
	 */
	protected static function interalHasValue($name, $configId)
	{
		return isset(self::$attributes[$configId][$name]) ? (self::$attributes[$configId][$name] !== '') && !is_null(self::$attributes[$configId][$name]) : false;
	}

	/**
	 * Sets a new set of settings for the global configuration. The new settings
	 * will overwrite the old one.
	 * @param ArrayList $settings
	 * @param string $configId ID of the configuration.
	 * @static
	 * @see Configuration::$attributes
	 * @see Configuration::internalGetSettings()
	 */
	protected static function internalSetSettings(ArrayList $settings, $configId)
	{
		self::$attributes[$configId] = $settings;
	}

	/**
	 * Returns an ArrayListIterator to iterate through the stored settings.
	 *
	 * The settings are returned by reference.
	 * @param string $configId ID of the configuration.
	 * @return ArrayList
	 * @static
	 * @see Configuration::$attributes
	 * @see Configuration::internalGetSettings()
	 */
	protected static function &internalGetSettings($configId)
	{
		return self::$attributes[$configId];
	}

	/**
	 * Returns $variable in the right type.
	 * @param string $value Value to cast to the right type.
	 *
	 * If $value is a string representation of an interger or a float, it will
	 * be converted to that type. If it is a string representation of a boolean,
	 * it will be converted to that type. Any other value will be left as a
	 * string.
	 * @return mixed
	 * @static
	 */
	protected static function castValue($value)
	{
		if(($value === 'true') || ($value === 'false'))
			$value = $value === 'true';
		elseif(is_int($value))
			$value = (int)$value;
		elseif(is_float($value))
			$value = (float)$value;

		return $value;
	}
}
?>
