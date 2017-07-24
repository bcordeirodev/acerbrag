<?php
/**
 * This file sets a class to work with objects like arrays.
 * @package Collection
 * @version 0.1
 */

/**
 * This class implements the IteratorAggregate interface to provide array
 * operations access to a iterator object.
 *
 * The class returns an ArrayListIterator object.
 *
 * <code>
 * <?php
 * // simple iteration test with an array
 * $arr = new ArrayListIteratorAggregate(
 *     array(
 *         'Value one',
 *         'Value two',
 *         'Value three'
 *     )
 * );
 *
 * foreach($arr as $key => $value)
 *     echo "{$key}: {$value}<br />";
 * ?>
 * </code>
 * @author Diego Andrade
 * @package Collection
 * @version 0.1.1
 * @since Optimuz 0.3
 */
class ArrayListIteratorAggregate implements IteratorAggregate
{
	/**
	 * Iterator used in iteration operations.
	 * @var ArrayListIterator
	 */
	protected $iterator			= null;

	/**
	 * Creates a new class instance.
	 *
	 * This class implements the IteratorAggregate interface to provide array
	 * operations access to a iterator object.
	 *
	 * The class returns an ArrayListIterator object.
	 * @param mixed $data Array or object that will be used in iterations
	 * operations. This is passed by reference, so any change in the original
	 * array will be applied here too.
	 */
	public function __construct(&$data)
	{
		$this->iterator = new ArrayListIterator($data);
	}

	/**
	 * Free memory used by resources.
	 */
//	public function __destruct()
//	{
//		$this->iterator = null;
//	}

	/**
	 * Returns an iterator for iterations operations.
	 * @return ArrayListIterator
	 */
	public function getIterator()
	{
		return $this->iterator;
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