<?php
/**
 * This file sets a class to work with objects like arrays.
 * @package Collection
 * @version 0.2
 */

/**
 * This class implements the ArrayAccess interface to provide array operations
 * inside an object. Classes that inherit this class can be acessed as arrays.
 * This class also extends the ArrayListIteratorAggregate class, so it can be
 * used in loop statements.
 *
 * <code>
 * <?php
 * $array = new ArrayList();
 * $array[0] = 'Test strign';
 * $array['object'] = new TestClass();
 *
 * print_r($array);
 * ?>
 * </code>
 *
 * This class do not uses the Language class to prevent cross reference
 * problems. This class is used by other packages and need to be load before
 * everyone. So it cannot depends on other packages.
 * @author Diego Andrade
 * @package Collection
 * @version 0.2.1
 * @since Optimuz 0.3
 */
class ArrayList extends ArrayListIteratorAggregate implements ArrayAccess
{
	/**
	 * Sorts the array in ascendent order.
	 */
	const SORT_ASC				= 1;

	/**
	 * Sorts the array in descendent order.
	 */
	const SORT_DESC				= 2;

	/**
	 * The array is locked.
	 */
	const ARRAY_LOCKED			= 2600;

	/**
	 * The type of the value does not match with the required type.
	 */
	const INVALID_TYPE			= 2601;

	/**
	 * Array that holds all values.
	 * @var array
	 */
	protected $array			= null;

	/**
	 * Disable (block) write operations in the array.
	 *
	 * When this is true, new values cannot be added to the array and old values
	 * cannot be removed. If you try to add or remove values from a locked
	 * ArrayList, an CollectionError will be thrown.
	 * @var bool false
	 * @see ArrayList::lock()
	 * @see ArrayList::unlock()
	 * @see ArrayList::isLocked()
	 */
	protected $locked			= null;

	/**
	 * Name of the allowed type for values in the array.
	 *
	 * If this is not empty, only values of this type can be added to the
	 * internal array. Otherwise, values of any types can be added.
	 * @var string
	 * @see ArrayList::setType()
	 * @see ArrayList::checkType()
	 */
	protected $strictType		= null;

	/**
	 * Creates a new class instance.
	 *
	 * If the $data parameter is given, the internal array will be populated.
	 * Otherwise the internal array will be empty.
	 * @param array $data (optimal) If this parameter is given, all data from
	 * this array will be copied for the internal array. This is a shorthand way
	 * to populate the class.
	 */
	public function __construct(array $data = null)
	{
		if(is_array($data))
			$this->array = $data;
		else
			$this->array = array();

		$this->locked = false;
		$this->iterator = new ArrayListIterator($this->array);
	}

	/**
	 * Sets the allowed type for values in the internal array.
	 *
	 * If $type is null, the array will accept values of any type.
	 *
	 * Values added before the call of this method are not affected. So if you
	 * want to restrict all values of an array, you must call this method before
	 * any value is added.
	 * @param mixed $type Can be a class or the name of a type (like string,
	 * int, bool, etc).
	 * @see ArrayList::$strictType
	 * @see ArrayList::checkType()
	 */
	public function setType($type)
	{
		$typeName = null;

		if(is_object($type))
			$typeName = get_class($type);
		elseif(is_string($type))
			$typeName = $type;

		if($typeName)
			$this->strictType = $typeName;
	}

	/**
	 * This is a Factory method that creates and returns a new ArrayList object
	 * fulfiled with the given parameters.
	 *
	 * The internal array created by this method is ALWAYS indexed. You cannot
	 * create associative arrays with this method.
	 * @param mixed $param,... (optimal) If parameters are given to this method,
	 * they will be used to populate the new ArrayList. You can give as many
	 * parameters as you want to this method.
	 * @static
	 */
	public static function create()
	{
		$array = func_num_args() > 0 ? func_get_args() : null;
		return new self($array);
	}

	/**
	 * Adds a new value in the array.
	 *
	 * This operation is used by the ArrayAccess.
	 * @param int|string $index The index of the value in the array.
	 * @param mixed $value The value to be added.
	 */
	public function offsetSet($index, $value)
	{
		if(!$this->locked)
		{
			if(!is_null($this->strictType) ? $this->checkType($value) : true)
				$this->array[$index] = $value;
			else
				throw new CollectionError('The type of the value does not match with the required type for the array', self::INVALID_TYPE);
		}
		else
		{
			throw new CollectionError('Array is locked and cannot be modified', self::ARRAY_LOCKED);
		}
	}

	/**
	 * Checks if there is a value in the array with the given index.
	 *
	 * This operation is used by the ArrayAccess.
	 * @param int|string $index Index of a value in the array.
	 * @return bool
	 */
	public function offsetExists($index)
	{
		return isset($this->array[$index]);
	}

	/**
	 * Removes a value from the array.
	 *
	 * This operation is used by the ArrayAccess.
	 * @param int|string $index Index of a value in the array.
	 */
	public function offsetUnset($index)
	{
		if(!$this->locked)
			unset($this->array[$index]);
		else
			throw new CollectionError('Array is locked and cannot be modified', self::ARRAY_LOCKED);
	}

	/**
	 * Returns a value from the array.
	 *
	 * This operation is used by the ArrayAccess.
	 * @param int|string $index If the index exists the value is returned.
	 * Otherwise, a null value is returned.
	 * @return mixed
	 */
	public function offsetGet($index)
	{
		$value = null;

		if($this->offsetExists($index))
			$value = $this->array[$index];

		return $value;
	}

	/**
	 * Adds a value to the array. The new value will have an index key
	 * (0-based).
	 * @param mixed $value Value to be added.
	 */
	public function add($value)
	{
		if(!$this->locked)
		{
			if(!is_null($this->strictType) ? $this->checkType($value) : true)
				$this->array[] = $value;
			else
				throw new CollectionError('The type of the value does not match with the required type for the array', self::INVALID_TYPE);
		}
		else
		{
			throw new CollectionError('Array is locked and cannot be modified', self::ARRAY_LOCKED);
		}
	}

	/**
	 * Adds a value to the array using a named key.
	 * @param string $key Key name.
	 * @param mixed $value Value to be added.
	 */
	public function addKey($key, $value)
	{
		if(!$this->locked)
		{
			if(!is_null($this->strictType) ? $this->checkType($value) : true)
				$this->array[$key] = $value;
			else
				throw new CollectionError('The type of the value does not match with the required type for the array', self::INVALID_TYPE);
		}
		else
		{
			throw new CollectionError('Array is locked and cannot be modified', self::ARRAY_LOCKED);
		}
	}

	/**
	 * Removes a value from the array.
	 * @param mixed $value Value to be removed.
	 */
	public function remove($value)
	{
		if(!$this->locked)
		{
			$index = array_search($value, $this->array);

			if($this->offsetExists($index))
				$this->offsetUnset($index);
		}
		else
		{
			throw new CollectionError('Array is locked and cannot be modified', self::ARRAY_LOCKED);
		}
	}

	/**
	 * Removes the last value from the array and returns it.
	 * @return mixed
	 */
	public function removeLast()
	{
		if(!$this->locked)
		{
			$value = array_pop($this->array);
			return $value;
		}
		else
		{
			throw new CollectionError('Array is locked and cannot be modified', self::ARRAY_LOCKED);
		}
	}

	/**
	 * Removes the first value from the array and returns it.
	 * @return mixed
	 */
	public function removeFirst()
	{
		if(!$this->locked)
		{
			$value = array_shift($this->array);
			return $value;
		}
		else
		{
			throw new CollectionError('Array is locked and cannot be modified', self::ARRAY_LOCKED);
		}
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
	 * Returns the first value in the array.
	 * @return mixed
	 */
	public function getFirst()
	{
		return $this->iterator->rewind();
	}

	/**
	 * Returns the last value in the array.
	 * @return mixed
	 */
	public function getLast()
	{
		return $this->iterator->end();
	}

	/**
	 * Returns the next value in the array.
	 *
	 * If the value is invalid, a null value will be returned. Otherwise the
	 * next value will be returned and the array index will be changed.
	 * @return mixed
	 */
	public function getNext()
	{
		$value = $this->iterator->next();

		if(!$value)
			$value = null;

		return $value;
	}

	/**
	 * Returns the previous value in the array.
	 *
	 * If the value is invalid, a null value will be returned. Otherwise the
	 * previous value will be returned and the array index will be changed.
	 * @return mixed
	 */
	public function getPrevious()
	{
		$value = $this->iterator->previous();

		if(!$value)
			$value = null;

		return $value;
	}

	/**
	 * Returns the total number of values in the array.
	 * @return int
	 */
	public function count()
	{
		return $this->iterator->count();
	}

	/**
	 * Clears the array setting it to a new array. All values in the current
	 * array are removed. The index is set to -1.
	 * @return ArrayList Returns the object itself.
	 */
	public function clear()
	{
		if(!$this->locked)
			$this->array = array();
		else
			throw new CollectionError('Array is locked and cannot be modified', self::ARRAY_LOCKED);

		return $this;
	}

	/**
	 * Sorts the array.
	 *
	 * @param int $order (optimal) Can be ArrayList::SORT_ASC or
	 * ArrayList::SORT_DESC. Default is ArrayList::SORT_ASC.
	 * @param int $flags (optimal) Flags used to sort the array. These flags are
	 * the same used in the PHP sort() function.
	 * @param bool $naturalOrder (optimal) If the $order is ArrayList::SORT_ASC
	 * this parameter specifies whether to use natural order algorithm to sort
	 * the array. Default is true.
	 * @see ArrayList::SORT_ASC
	 * @see ArrayList::SORT_DESC
	 * @return ArrayList Returns the object itself.
	 */
	public function sort($order = self::SORT_ASC, $flags = null, $naturalOrder = true)
	{
		if($order == self::SORT_ASC)
		{
			if($naturalOrder)
				natsort($this->array);
			else
				sort($this->array, $flags);
		}
		else
		{
			rsort($this->array, $flags);
		}

		return $this;
	}

	/**
	 * Executes a function for all elements in the array. The internal array is
	 * modified.
	 *
	 * Example of usage:
	 *
	 * <code>
	 * <?php
	 * $array = new ArrayList();
	 * $array->add('One value');
	 * $array->add('Two value');
	 * $array->add('Three value');
	 * $array['four'] = 'Four value';
	 *
	 * // call function
	 * print_r($array->map('strtoupper'));
	 *
	 * // call a temp function and pass optimal parameter
	 * print_r(
	 *     $array->map(
	 *         create_function(
	 *             '$val, $opt',
	 *             'return "val: {$val}, opt: {$opt}";'
	 *         ),
	 *         'other value'
	 *     )
	 * );
	 * ?>
	 * </code>
	 * @param string $fn Function name that will be executed for each element in
	 * the array.
	 *
	 * This function receives as the first parameter the value
	 * of each element in the internal array. As second parameter it receives
	 * the parameters of the $args parameter.
	 *
	 * If $args is an array, its elements will be passed to $fn. In this case,
	 * $args must have the same size of the internal array. But if $args is
	 * another kind of value, this value will be passed to all elements in the
	 * internal array.
	 * @param mixed $args (optimal) Optimal parameters to pass to the function
	 * $fn. This parameter can be an array or any other value. If it is an
	 * array, this array will be iterated at the same time as the internal
	 * array, so they must have the same size.
	 * @return ArrayList Returns the object itself with the internal array
	 * modified.
	 */
	public function map($fn, $args = null)
	{
		$array = is_array($args) ?
			array_map($fn, $this->array, $args)
			: (
				!is_null($args) ?
					array_map($fn, $this->array, (array_pad(array(), $this->count(), $args)))
					: array_map($fn, $this->array)
			);

		$this->array = $array;
		return $this;
	}

	/**
	 * Merges the parameters with the internal array.
	 * @param mixed $array,... Any value to be added to the internal array. If
	 * is another array, its elements will be added to the internal array.
	 * @return ArrayList Returns the object itself.
	 */
	public function merge()
	{
		if(func_num_args() > 0)
		{
			$arrays = func_get_args();

			foreach($arrays as $array)
			{
				if($array instanceof ArrayList)
					$array = $array->toArray();
				elseif(!is_array($array))
					$array = (array)$array;

				if(!is_null($this->strictType))
				{
					foreach($array as $value)
					{
						if(!$this->checkType($value))
							throw new CollectionError('The type of the value does not match with the required type for the array', self::INVALID_TYPE);
					}
				}

				$this->array = array_merge($this->array, $array);
			}
		}

		return $this;
	}

	/**
	 * Adds a number of values to match the new size.
	 * @param mixed $value Any value to be used to fulfil the array.
	 * @param int $size The new size of the array.
	 *
	 * If the size is positive the array will pad to right. If is negative, the
	 * array will pad to left.
	 *
	 * If this size is positive and lower than the current array size, nothing
	 * is done.
	 * @see ArrayList::increase()
	 * @return ArrayList Returns the object itself.
	 */
	public function pad($value, $size)
	{
		if(!is_null($this->strictType) ? $this->checkType($value) : true)
			$this->array = array_pad($this->array, $size, $value);
		else
			throw new CollectionError('The type of the value does not match with the required type for the array', self::INVALID_TYPE);

		return $this;
	}

	/**
	 * Returns a new ArrayList object containing a slice of the internal array.
	 * @param mixed $offset The index of the first element in the slice.
	 * @param int $length (optimal) Number of elements that the slice will have.
	 * If this parameter is not given, all remaining elements will be returned
	 * in the slice.
	 * @param bool $preserveKeys (optimal) By default the new slice will have
	 * its keys reindexed
	 * @return ArrayList
	 */
	public function slice($offset, $length = null, $preserveKeys = false)
	{
		return new self(array_slice($this->array, $offset, $length, $preserveKeys));
	}

	/**
	 * Increases the array size with $n new values. This is similar to the
	 * ArrayList::pad(), but instead of specifying the new array size, you
	 * specify only how much new values to put in the array.
	 * @param mixed $value Any value to be used to fulfil the array.
	 * @param int $n The number of new elements in the array.
	 * @see ArrayList::pad()
	 * @return ArrayList Returns the object itself.
	 */
	public function increase($value, $n)
	{
		if(!is_null($this->strictType) ? $this->checkType($value) : true)
			$this->array = array_pad($this->array, $this->count() + $n, $value);
		else
			throw new CollectionError('The type of the value does not match with the required type for the array', self::INVALID_TYPE);

		return $this;
	}

	/**
	 * Decreases the array size removing $n values.
	 * @param int $n The number of elements to remove off from the array.
	 *
	 * If this is positive, the values will be removed from the end of the
	 * array. If it is negative, values will be removed from the beginning.
	 * @see ArrayList::increase()
	 * @see ArrayList::pad()
	 * @return ArrayList Returns the object itself.
	 */
	public function decrease($n)
	{
		$this->array = $n > 0 ?
			array_slice($this->array, 0, -$n) // remove from end
			: array_slice($this->array, ($n * -1)); // remove from beginning
		return $this;
	}

	/**
	 * Filters elements in the array.
	 * @todo Implement ArrayList::filter().
	 */
	public function filter()
	{

	}

	/**
	 * Checks if a value exists in the array.
	 * @param mixed $value Value to lookup in the array.
	 * @return bool
	 */
	public function find($value)
	{
		return in_array($value, $this->array);
	}

	/**
	 * Checks if a value exists in the array and return its index.
	 * @param mixed $value Value to lookup in the array.
	 * @return bool Returns the index of the value found, or false if the value
	 * is not found.
	 */
	public function findIndex($value)
	{
		return array_search($value, $this->array, !empty($this->strictType));
	}

	/**
	 * Returns all elements of the array in a string concatenated with $glue.
	 * @param string $glue (optimal) String used to join the elements of the
	 * array. Default is an empty string.
	 * @return string
	 */
	public function join($glue = '')
	{
		return implode($glue, $this->array);
	}

	/**
	 * Reindexes an array. This will cause all keys of the array to be numeric.
	 * The same as calling array_values() on the internal array.
	 * @return ArrayList Returns the object itself.
	 */
	public function reindex()
	{
		$this->array = array_values($this->array);
		return $this;
	}

	/**
	 * Returns an array from the ArrayList object. The array is returned by
	 * reference.
	 * @return array
	 */
	public function &toArray()
	{
		return $this->array;
	}

	/**
	 * Locks the array to prevent new values to be added or removed.
	 * @see ArrayList::$locked
	 * @see ArrayList::unlock()
	 * @see ArrayList::isLocked()
	 */
	public function lock()
	{
		$this->locked = true;
	}

	/**
	 * Unlocks the array to allow new values to be added or removed.
	 * @see ArrayList::$locked
	 * @see ArrayList::lock()
	 * @see ArrayList::isLocked()
	 */
	public function unlock()
	{
		$this->locked = false;
	}

	/**
	 * Checks if the array is locked.
	 * @return bool
	 * @see ArrayList::$locked
	 * @see ArrayList::lock()
	 * @see ArrayList::unlock()
	 */
	public function isLocked()
	{
		return $this->locked;
	}

	/**
	 * Checks if the type of $value match with the type specified in
	 * ArrayList::$strictType.
	 * @param mixed $value Any value.
	 * @see ArrayList::$strictType
	 * @see ArrayList::setType()
	 * @return bool
	 */
	protected function checkType($value)
	{
		return is_object($value) ? ($value instanceof $this->strictType) : gettype($value) === $this->strictType;
	}

	/**
	 * Checks if $array is an instance of ArrayList.
	 * @param mixed $array Value to check if is an instance of ArrayList.
	 * @return bool
	 */
	public static function isValid($array)
	{
		return is_object($array) && ($array instanceof self);
	}
}
?>