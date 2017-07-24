<?php
/**
 * This file sets a custom element using the Html.Component.HtmlElement.
 * @version 0.1
 * @package Html
 * @subpackage Element
 */

/**
 * This element represents a button element.
 * @author Diego Andrade
 * @package Html
 * @subpackage Element
 * @since Optimuz 0.4
 * @version 0.1
 */
class HtmlButton extends HtmlElement
{
	/**
	 * Submit button.
	 */
	const SUBMIT			= 'submit';

	/**
	 * Reset button.
	 */
	const RESET				= 'reset';

	/**
	 * Normal button.
	 */
	const BUTTON			= 'button';

	/**
	 * Creates a new button element.
	 * @param mixed $type Button's type (type attribute).
	 * @param mixed $value (optimal) Button's value (value attribute).
	 */
	public function __construct($type, $value = null)
	{
		parent::__construct('button');
		$this->setAttribute('type', $type);

		if(isset($value))
			$this->appendChild(new HtmlText($value));
	}

	/**
	 * Sets the button's type attribute.
	 * @param string $type button's type.
	 */
	public function setType($type)
	{
		$this->setAttribute('type', $type);
	}

	/**
	 * Returns the button's type attribute.
	 * @return string
	 */
	public function getType()
	{
		return $this->getAttribute('type');
	}

	/**
	 * Sets the button's name attribute.
	 * @param string $name Button's name.
	 */
	public function setName($name)
	{
		$this->setAttribute('name', $name);
	}

	/**
	 * Returns the button's name attribute.
	 * @return string
	 */
	public function getName()
	{
		return $this->getAttribute('name');
	}

	/**
	 * Sets the button's value attribute.
	 * @param string $value Button's value.
	 */
	public function setValue($value)
	{
		if(!($value instanceof HtmlText))
			$value = new HtmlText($value);

		$this->appendChild($value);
	}

	/**
	 * Returns the button's value attribute.
	 * @return string
	 */
	public function getValue()
	{
		return $this->firstChild ? $this->firstChild->nodeValue : '';
	}
}
?>