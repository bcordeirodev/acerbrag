<?php
/**
 * This file belongs to the form validation package and sets a class for this
 * package.
 * @version 0.2
 * @package Validation
 */

/**
 * This class stores information about an input in the form. So the Validator
 * class uses this class to represent each item that will be validated.
 * Validation errors also are stored in this class.
 * @author Diego Andrade
 * @package Validation
 * @since Optimuz 0.1
 * @version 0.2
 */
class InputField
{
	/**
	 * Input name (must be the same of the input name attribute in the form).
	 * @var string
	 * @see InputField::setName()
	 * @see InputField::getName()
	 */
	protected $name							= null;

	/**
	 * Input alias. This name will be presented to the user in case of errors.
	 * @var string
	 * @see InputField::setLabel()
	 * @see InputField::getLabel()
	 */
	protected $label						= null;
	
	/**
	 * Input value.
	 * @var string
	 * @see InputField::setValue()
	 * @see InputField::getValue()
	 */
	protected $value						= null;
	
	/**
	 * Error message after a validation.
	 * @var string
	 * @see InputField::setErrorMessage()
	 * @see InputField::getErrorMessage()
	 */
	protected $errorMessage					= null;
	
	/**
	 * HTML used to format the error message.
	 * @var string
	 */
	protected $html							= null;
	
	/**
	 * Creates a new InputField instance.
	 *
	 * This class stores information about an input in the form. So the Validator
	 * class uses this class to represent each item that will be validated.
	 * Validation errors also are stored in this class.
	 */
	public function __construct()
	{
		$this->html = "<span class='error'><img src='" . Enviroment::resolveUrl('~/') . "resource/system/imgs/input-error.png' alt='' title='' xml:lang='pt-BR' lang='pt-BR' /><span>%s</span></span>";
	}
	
	/**
	 * Sets the input name.
	 * @param string $name Input name (the same name as in the form).
	 * @see InputField::$name
	 * @see InputField::getName()
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * Returns the input name.
	 * @return string
	 * @see InputField::$name
	 * @see InputField::setName()
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Sets the input label (alias).
	 * @param string $label Input alias.
	 * @see InputField::$label
	 * @see InputField::getLabel()
	 */
	public function setLabel($label)
	{
		$this->label = $label;
	}

	/**
	 * Returns the input label (alias).
	 * @return string
	 * @see InputField::$label
	 * @see InputField::setLabel()
	 */
	public function getLabel()
	{
		return $this->label;
	}

	/**
	 * Sets the input value.
	 * @param string $value Input value.
	 * @see InputField::$value
	 * @see InputField::getValue()
	 */
	public function setValue($value)
	{
		$this->value = $value;
	}

	/**
	 * Returns the input value.
	 * @return string
	 * @see InputField::$value
	 * @see InputField::setValue()
	 */
	public function getValue()
	{
		return $this->value;
	}
	
	/**
	 * Sets a error message for the input.
	 * @param string $errorMessage Error message.
	 * @see InputField::$errorMessage
	 * @see InputField::getErrorMessage()
	 */
	public function setErrorMessage($errorMessage)
	{
		$this->errorMessage = $errorMessage;
	}

	/**
	 * Returns the input error message.
	 * @return string
	 * @see InputField::$errorMessage
	 * @see InputField::setErrorMessage()
	 * @see InputField::getHtmlErrorMessage()
	 */
	public function getErrorMessage()
	{
		return $this->errorMessage;
	}

	/**
	 * Returns the input error message formated with HTML of InputField::$html.
	 * @return string
	 * @see InputField::$errorMessage
	 * @see InputField::$html
	 * @see InputField::setErrorMessage()
	 * @see InputField::setHtmlErrorFormat()
	 * @see InputField::getErrorMessage()
	 */
	public function getHtmlErrorMessage()
	{
		return !empty($this->html) ? sprintf($this->html, $this->errorMessage) : $this->errorMessage;
	}

	/**
	 * Checks if the input has any error setted.
	 * @return bool
	 */
	public function hasError()
	{
		return !empty($this->errorMessage);
	}
	
	/**
	 * Sets the HTML string used to format errors messages.
	 * @var string $html
	 */
	public function setHtmlErrorFormat($html)
	{
		$this->html = $html;
	}
	
	/**
	 * Returns the input value, or an empty string if the input has no value.
	 * @return string
	 */
	public function __toString()
	{
		return $this->value ? $this->value : '';
	}
}
?>