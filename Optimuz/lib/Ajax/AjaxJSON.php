<?php
/**
 * This file belongs to the Ajax package and sets an element class that is used
 * to build responses to Ajax requests.
 * @version 0.2.1
 * @package Ajax
 */

/**
 * This class is handles data that will be sent in an Ajax response with type
 * setted to JSON.
 * @author Diego Andrade
 * @package Ajax
 * @since Optimuz 0.3
 * @version 0.2.1
 */
class AjaxJSON
{
	/**
	 * Associative array that stores all properties of the JSON object.
	 * @var mixed
	 */
	private $properties			= null;
	
	/**
	 * Creates a new class instance.
	 * @param mixed $properties (optimal) Associative array, object or any other
	 * valid value. If this parameter is not given, an object will be created
	 * to hold the JSON properties.
	 */
	public function __construct($properties = null)
	{
		if(is_null($properties))
			$properties = self::createObject();
		
		$this->properties = $properties;
	}

	/**
	 * Factory method that only returns a new object of the stdClass (standard
	 * class of PHP). This object can be used later as the JSON object.
	 * @return stdClass
	 * @static
	 */
	public static function createObject()
	{
		return new stdClass();
	}

	/**
	 * Adds a property to the object.
	 * @param string $property Property name.
	 * @param mixed $value Property value.
	 */
	public function add($property, $value)
	{
		if(is_array($this->properties))
			$this->properties[$property] = $value;
		elseif(is_object($this->properties))
			$this->properties->$property = $value;
	}

	/**
	 * Returns a property from the object.
	 *
	 * If the property doesn't exist, a null will be returned.
	 * @param string $property Property name.
	 * @return mixed
	 */
	public function get($property)
	{
		$value = null;

		if(is_array($this->properties))
		{
			if(isset($this->properties[$property]))
				$value = $this->properties[$property];
		}
		elseif(is_object($this->properties))
		{
			if(isset($this->properties->$property))
				$value = $this->properties->$property;
		}

		return $value;
	}

	/**
	 * Removes a property from the object.
	 * @param string $property Property name.
	 */
	public function remove($property)
	{
		if($this->has($property))
		{
			if(is_array($this->properties))
				unset($this->properties[$property]);
			elseif(is_object($this->properties))
				unset($this->properties->$property);
		}
	}

	/**
	 * Checks if a property exist in the object.
	 * @param string $property Property name.
	 */
	public function has($property)
	{
		return is_array($this->properties) ? isset($this->properties[$property]) : (is_object($this->properties) ? isset($this->properties->$property) : false);
	}

	/**
	 * Builds the JSON string representation and returns it.
	 *
	 * If there are no properties added, an empty string will be returned.
	 * @return string
	 */
	public function serialize()
	{
		return $this->getProperties($this->properties);
	}

	/**
	 * Returns a string representation for Javascript of an array or an object.
	 * @param mixed $obj Base array or object.
	 * @return string
	 */
	protected function getProperties($obj)
	{
		return json_encode($obj);
	}
}
?>