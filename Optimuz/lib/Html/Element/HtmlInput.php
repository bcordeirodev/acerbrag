<?php
/**
 * This file sets a custom element using the Html.Component.HtmlElement.
 * @version 0.1
 * @package Html
 * @subpackage Element
 */

/**
 * This element represents an input element.
 * @author Diego Andrade
 * @package Html
 * @subpackage Element
 * @since Optimuz 0.4
 * @version 0.1
 */
class HtmlInput extends HtmlElement implements IHtmlFormElement
{
	/**
	 * Creates a new input element.
	 * @param mixed $type Input's type (type attribute).
	 * @param mixed $name (optimal) Input's name (name attribute).
	 * @param mixed $value (optimal) Input's value (value attribute).
	 */
	public function __construct($type, $name = null, $value = null)
	{
		parent::__construct('input');
		$this->setAttribute('type', $type);

		if(isset($name))
			$this->setAttribute('name', $name);

		if(isset($value))
			$this->setAttribute('value', $value);
	}

	/**
	 * Sets the input's type attribute.
	 * @param string $type Input's type.
	 */
	public function setType($type)
	{
		$this->setAttribute('type', $type);
	}

	/**
	 * Returns the input's type attribute.
	 * @return string
	 */
	public function getType()
	{
		return $this->getAttribute('type');
	}

	/**
	 * Sets the input's name attribute.
	 * @param string $name Input's name.
	 */
	public function setName($name)
	{
		$this->setAttribute('name', $name);
	}

	/**
	 * Returns the input's name attribute.
	 * @return string
	 */
	public function getName()
	{
		return $this->getAttribute('name');
	}

	/**
	 * Sets the input's value attribute.
	 * @param string $value Input's value.
	 */
	public function setValue($value)
	{
		$this->setAttribute('value', $value);
	}

	/**
	 * Returns the input's value attribute.
	 * @return string
	 */
	public function getValue()
	{
		return Text::plain(urldecode($this->getAttribute('value')));
	}

	/**
	 * Sets whether the form element is disabled (disabled attribute).
	 * @param bool $disabled If is true then the element will be disabled.
	 * Otherwise it will be enabled.
	 */
	public function setDisabled($disabled)
	{
		if($disabled)
		{
			if(!$this->hasAttribute('disabled'))
				$this->setAttribute('disabled', 'disabled');
		}
		else
		{
			if($this->hasAttribute('disabled'))
				$this->removeAttribute('disabled');
		}
	}

	/**
	 * Returns whether the element is disabled.
	 * @return bool
	 */
	public function isDisabled()
	{
		return $this->hasAttribute('disabled');
	}

	/**
	 * Returns whether the element has some value.
	 * @return bool
	 */
	public function hasValue()
	{
		$value = $this->getValue();
		return is_string($value) && ($value !== '');
	}
}
?>