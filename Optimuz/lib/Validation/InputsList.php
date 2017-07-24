<?php
/**
 * This file belongs to the form validation package and sets a class for this
 * package.
 * @version 0.1
 * @package Validation
 */

/**
 * This is a list of inputs.
 * 
 * This class extends the ArrayList class to provide access methods to inputs
 * created with the InputField class.
 * @author Diego Andrade
 * @package Validation
 * @since Optimuz 0.3
 * @version 0.1
 */
class InputsList extends ArrayList
{
	/**
	 * Creates a new class instance.
	 *
	 * This class extends the ArrayList class to provide access methods to
	 * inputs created with the InputField class.
	 * @param array $inputs Array of inputs.
	 */
	public function __construct(array $inputs = null)
	{
		parent::__construct($inputs);
		$this->strictType = 'InputField';
	}

	/**
	 * Alias for ArrayList::offsetExists(). Checks if an input with the passed
	 * name exists in the list.
	 * @param string $name Input name.
	 * @return bool
	 */
	public function exists($name)
	{
		return $this->offsetExists($name);
	}
}
?>