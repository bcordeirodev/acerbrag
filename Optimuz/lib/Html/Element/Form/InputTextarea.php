<?php
/**
 * This file belongs to HTML package, that defines a simple way to build HTML
 * elements and components.
 * @version 0.1
 * @package Component
 * @subpackage Form
 */

/**
 * This class is used to build HTML textareas of form elements.
 * @author Diego Andrade
 * @package Component
 * @subpackage Form
 * @since Optimuz 0.4
 * @version 0.1
 */
class InputTextarea extends HtmlElement implements IHtmlFormElement
{
	/**
	 * Creates a new textarea element.
	 * @param string $name (optimal) Textarea's name (name attribute).
	 * @param mixed $value (optimal) Textarea's value (value attribute).
	 */
	public function __construct($name = null, $value = null)
	{
		parent::__construct('textarea');

		if(isset($name))
			$this->setAttribute('name', $name);

		if(isset($value))
			$this->setValue($value);
	}

	/**
	 * Sets the cols attribute.
	 * @param int $number Number of collumns.
	 */
	public function setCols($number)
	{
		$this->setAttribute('cols', $number);
	}

	/**
	 * Returns the cols attribute.
	 * @return int
	 */
	public function getCols()
	{
		return (int)$this->getAttribute('cols');
	}

	/**
	 * Sets the rows attribute.
	 * @param int $number Number of rows.
	 */
	public function setRows($number)
	{
		$this->setAttribute('rows', $number);
	}

	/**
	 * Returns the rows attribute.
	 * @return int
	 */
	public function getRows()
	{
		return (int)$this->getAttribute('rows');
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
	 * Sets the textarea's value.
	 * @param string $value Textarea's value.
	 */
	public function setValue($value)
	{
		if($this->hasChildNodes())
		{
			while($this->firstChild)
				$this->removeChild($this->firstChild);
		}

		$this->appendChild(new HtmlText($value));
	}

	/**
	 * Returns the textarea's value.
	 * @return string
	 */
	public function getValue()
	{
		$value = '';

		if($this->hasChildNodes())
		{
			foreach($this->childNodes as $child)
				$value .= $child->nodeValue;
		}

		return Text::plain(urldecode($value));
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