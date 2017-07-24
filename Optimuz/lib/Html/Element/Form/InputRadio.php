<?php
/**
 * This file belongs to HTML package, that defines a simple way to build HTML
 * elements and components.
 * @version 0.1
 * @package Component
 * @subpackage Form
 */

/**
 * This class is used to build HTML radio inputs of form elements.
 * @author Diego Andrade
 * @package Component
 * @subpackage Form
 * @since Optimuz 0.4
 * @version 0.2
 */
class InputRadio extends HtmlInput
{
	/**
	 * Creates a new radio input element.
	 * @param string $name (optimal) Input's name (name attribute).
	 * @param mixed $value (optimal) Input's value (value attribute).
	 */
	public function __construct($name = null, $value = null)
	{
		parent::__construct('radio', $name, $value);
	}
	
	/**
	 * Checks or unchecks the input.
	 * @param bool $checked If true the input will be checked, i.e., the checked
	 * attribute will be set. If false and the input has the checked attribute,
	 * this will be removed.
	 */
	public function setChecked($checked)
	{
		if($checked)
			$this->setAttribute('checked', 'checked');
		else
			$this->removeAttribute('checked');
	}

	/**
	 * Returns a bool indicating whether the input is checked.
	 * @return bool
	 */
	public function isChecked()
	{
		return $this->hasAttribute('checked');
	}

	/**
	 * Recovers the input state using inline data.
	 */
	public function recoverState()
	{
		parent::recoverState();
		$this->setType('radio');
	}
}
?>