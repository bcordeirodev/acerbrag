<?php
/**
 * This file sets a class to work with objects like arrays.
 * @package Collection
 * @version 0.1
 */

/**
 * This class implements the Iterator interface to provide array operations
 * inside an object. Classes that inherit this class can be acessed as arrays.
 *
 * <code>
 * <?php
 * // simple iteration test with an array
 * $arr = new ArrayListIterator(array('Value one', 'Value two', 'Value three'));
 *
 * foreach($arr as $key => $value)
 *     echo "{$key}: {$value}<br />";
 * ?>
 * </code>
 * @author Diego Andrade
 * @package Collection
 * @version 0.2.1
 * @since Optimuz 0.3
 */
class ArrayListIterator implements Iterator
{
	/**
	 * Array that holds all values.
	 * @var mixed
	 */
	protected $array			= null;

	/**
	 * Creates a new iterator.
	 *
	 * This class implements the Iterator interface to provide array operations
	 * inside an object. Classes that inherit this class can be acessed as
	 * arrays.
	 * @param mixed $data Array or object that will be used in iterations
	 * operations. This is passed by reference, so any change in the original
	 * array will be applied here too.
	 */
	public function __construct(&$data)
	{
		if(is_object($data) && ($data instanceof ArrayList))
		{
			$array = $data->toArray();
			$data = &$array;
		}

		$this->array = &$data;
	}

	/**
	 * Sets the array index to the first position (zero) and returns its value.
	 * @return mixed
	 */
	public function rewind()
	{
		return reset($this->array);
	}

	/**
	 * Returns the current value from the array.
	 *
	 * If the current index is invalid, a false value is returned.
	 * @return mixed
	 */
	public function current()
	{
		return current($this->array);
	}

	/**
	 * Returns the current index of the array.
	 * @return int|string
	 */
	public function key()
	{
		return key($this->array);
	}

	/**
	 * Sets the index to the next value in the array and returns its value.
	 * @return mixed
	 */
	public function next()
	{
		return next($this->array);
	}

	/**
	 * Sets the index to the previous value in the array and returns its value.
	 * @return mixed
	 */
	public function previous()
	{
		return prev($this->array);
	}

	/**
	 * Checks if the current index in the array is valid, that is, if the
	 * current index exists.
	 * @return bool
	 */
	public function valid()
	{
		return $this->current() !== false;
	}

	/**
	 * Returns the internal array of the object.
	 * @return array
	 */
	public function getArray()
	{
		return $this->array;
	}

	/**
	 * Returns the total number of values in the array.
	 * @return int
	 */
	public function count()
	{
		return count($this->array);
	}

	/**
	 * Checks if the array is empty.
	 * @return bool
	 */
	public function isEmpty()
	{
		return $this->count() === 0;
	}

	/**
	 * Sets the array index to the last position and returns its value.
	 * @return mixed
	 */
	public function end()
	{
		return end($this->array);
	}

	/**
	 * Recovers an object from a given state.
	 * @param array $state Object properties.
	 * @return ArrayListIterator Returns a new instance from the class.
	 */
	public static function __set_state(array $state)
	{
		$data = array();
		$instance = new self($data);

		foreach($state as $key => $value)
			$instance->{$key} = $value;

		return $instance;
	}
}
?>