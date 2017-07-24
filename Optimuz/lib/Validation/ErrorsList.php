<?php
/**
 * This file belongs to the form validation package and sets a class for this
 * package.
 * @version 0.1
 * @package Validation
 */

/**
 * This is a list of inputs with errors.
 * 
 * This class extends the InputsList class to provide access methods to inputs
 * created with the InputField class.
 * @author Diego Andrade
 * @package Validation
 * @since Optimuz 0.3
 * @version 0.1
 */
class ErrorsList extends InputsList
{
	/**
	 * Returns the HTML error message of an input. If this input does not exist,
	 * an empty string will be returned.
	 * @param string $name Input name.
	 * @return string
	 */
	public function getError($name)
	{
		return $this->offsetExists($name) ? $this->offsetGet($name)->getHtmlErrorMessage() : '';
	}
}
?>