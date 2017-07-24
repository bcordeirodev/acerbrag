<?php
/**
 * This file defines only the base class.
 * @version 0.4
 * @package Core
 */

/**
 * Base class for other classess.
 * @author Diego Andrade
 * @package Core
 * @since Optimuz 0.1
 * @version 0.6
 */
class Object
{
	/**
	 * Error object that contains the last generated error.
	 * @var Error
	 */
	protected $error					= null;

	/**
	 * Class name.
	 * @var string
	 */
	private $className					= null;

	/**
	 * Returns the error object.
	 * @return Error
	 * @final
	 */
	final public function getError()
	{
		return $this->error;
	}

	/**
	 * Returns the object class name.
	 * @return string
	 * @final
	 */
	final public function getClassName()
	{
		if(is_null($this->className))
			$this->className = get_class($this);

		return $this->className;
	}

	/**
	 * Checks if $object is a descendent of this class.
	 * @param mixed $object Any object.
	 * @final
	 */
	final public function isParentOf($object)
	{
		return is_object($object) && is_subclass_of($object, $this->getClassName());
	}

	/**
	 * Checks if $object is an instance of this class, or a descendent of it.
	 * @param mixed $object Any object.
	 * @final
	 */
	final public function isSameType($object)
	{
		return is_object($object) && ($object instanceof $this);
	}

	/**
	 * Checks if the object $classObj has the method $methodName.
	 * @param mixed $classObj Object instance or class name.
	 * @param string $methodName Method name of the object.
	 * @return bool
	 * @final
	 * @static
	 */
	final public static function hasMethod($classObj, $methodName)
	{
		return (is_object($classObj) || is_string($classObj)) && method_exists($classObj, $methodName);
	}

	/**
	 * Checks if the object $classObj is a subclass of $parentName.
	 * @param mixed $classObj Any object.
	 * @param string $parentName Class name that may be parent of the object.
	 * @return bool
	 * @final
	 * @static
	 */
	final public static function hasParent($classObj, $parentName)
	{
		return is_subclass_of($classObj, $parentName);
	}

	/**
	 * Checks if the object $classObj is of $type.
	 * @param mixed $classObj Any object.
	 * @param mixed $type Class name or an object of the target type.
	 * @return bool
	 * @final
	 * @static
	 */
	final public static function isType($classObj, $type)
	{
		return is_object($classObj) && ($classObj instanceof $type);
	}

	/**
	 * Converts the given object to another type and returns it.
	 *
	 * The object returned is just a copy of the current one.
	 * @param object $obj Current object.
	 * @param string $typo Type of the new object.
	 * @return mixed
	 * @final
	 * @static
	 */
	final public static function toType($obj, $typo)
	{
		$newObj = null;
		$sObj = serialize($obj);

		// O:11:"HtmlElement":2:{s:5:"*id";N;s:15:"*formatOutput";N;}
		$sArray = explode(':', $sObj);
		$sArray[1] = strlen($typo);
		$sArray[2] = '"' . $typo . '"';
		$newObj = unserialize(implode(':', $sArray));

		return $newObj;
	}
}
?>
