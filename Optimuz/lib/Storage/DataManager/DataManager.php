<?php
/**
 * This file sets a class to work with datasources.
 * @version 0.1
 * @package Storage.Data
 */

/**
 * This class is used to store datasources.
 * @author Diego Andrade
 * @package Storage.Data
 * @since Optimuz 0.4
 * @version 0.1.1
 * @uses Html.Element.HtmlElement
 */
class DataManager
{
	/**
	 * The provided datasource does not exist.
	 */
	const MISSING_DATASOURCE				= 0;

	/**
	 * Internal array that holds all datasources.
	 * @var array
	 * @static
	 */
	protected static $datasources			= array();

	/**
	 * Internal array that holds all datasources.
	 * @var array
	 * @static
	 */
	protected static $elements				= array();

	/**
	 * Adds a datasource to the manager.
	 *
	 * If a datasource with the same name already exists it is overwritten.
	 *
	 * If there is some HtmlElement binding to the datasource, the datasource
	 * will be added to the element.
	 * @param string $name Name on which the datasource is referenced.
	 * @param mixed $dataSource The datasource can be an array or an object.
	 * @static
	 */
	public static function set($name, $dataSource)
	{
		self::$datasources[$name] = $dataSource;

		if(isset(self::$elements[$name]))
			self::setElementSource($name, $dataSource);
	}

	/**
	 * Returns a datasource with the given name.
	 *
	 * If the datasource does not exist a null value is returned.
	 * @param string $dataSourceName Datasource name.
	 * @return mixed
	 * @static
	 */
	public static function get($dataSourceName)
	{
		return self::exists($dataSourceName) ? self::$datasources[$dataSourceName] : null;
	}

	/**
	 * Checks whether a datasource with the given name exists.
	 * @param string $dataSourceName Datasource name.
	 * @return bool
	 * @static
	 */
	public static function exists($dataSourceName)
	{
		return isset(self::$datasources[$dataSourceName]);
	}

	/**
	 * Removes a datasource with the given name.
	 * @param string $dataSourceName Datasource name.
	 * @static
	 */
	public static function remove($dataSourceName)
	{
		if(self::exists($dataSourceName))
			unset(self::$datasources[$dataSourceName]);
	}

	/**
	 * Removes all datasources from the manager.
	 * @static
	 */
	public static function clear()
	{
		self::$datasources = array();
	}

	/**
	 * Saves the element to an internal array. When a datasource with the given
	 * name is added to the DataManager, it is automaticaly added to the saved
	 * element.
	 * @param string $dataSourceName Name on which the datasource is referenced.
	 * @param HtmlElement $element Element that will receive the datasource.
	 * @static
	 */
	public static function bindElement($dataSourceName, HtmlElement $element)
	{
		self::$elements[$dataSourceName] = $element;
	}

	/**
	 * Adds the datasource to the stored element.
	 * @param string $name Name on which the datasource is referenced.
	 * @param mixed $dataSource The datasource that will be added to the
	 * element.
	 * @static
	 */
	protected static function setElementSource($name, $dataSource)
	{
		$element = self::$elements[$name];
		$element->setSource($dataSource);
		$element->bindSource();
		unset(self::$elements[$name]);
	}
}
?>