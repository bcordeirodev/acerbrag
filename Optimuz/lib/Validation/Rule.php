<?php
/**
 * This file belongs to the form validation package and sets a class for this
 * package.
 * @version 0.1
 * @package Validation
 */

/**
 * This class is used in the validation process. It represents a single rule.
 *
 * The available rules are:
 *
 * <ul>
 * <li>required - the input value is required.</li>
 * <li>alpha - the input accepts only letters and underscores (_).</li>
 * <li>text - the input accepts only letters, numbers and the symbols underscore
 * (_) and dash (-).</li>
 * <li>number - the input accepts only numbers (without ponctuation).</li>
 * <li>bool - the input accepts only boolean values (true, false, 1, 0, yes, no)
 * .</li>
 * <li>email - the input value must be a valid e-mail (only syntax is checked).
 * </li>
 * <li>url - the input value must be a valid URL.</li>
 * <li>date - the input value must be a valid date.</li>
 * <li>comparePasswords - two input values are compared to see if they are
 * exactly the same.</li>
 * <li>compareRequireds - only checks the input value if anonther input has
 * a desired value.</li>
 * <li>compareDates - checks if two dates are valid (if the date of first input
 * comes before the date of second input).</li>
 * <li>length - checks whether the input value length is inside the limits.</li>
 * <li>match - checks whether the input value matchs the desired value.</li>
 * <li>cnpj - checks whether the input value is a valid CNPJ code (can check
 * the format and calculate the number). This code is used by the Brazilian
 * government.</li>
 * <li>cnpj - checks whether the input value is a valid CPF code (can check the
 * format and calculate the number). This code is used by the Brazilian
 * government.</li>
 * <li>discard - no validation is applied.</li>
 * </ul>
 * @author Diego Andrade
 * @package Validation
 * @since Optimuz 0.4
 * @version 0.1
 */
class Rule
{
	/**
	 * Rule name.
	 * @var string
	 * @see Rule::setName()
	 * @see Rule::getName()
	 */
	private $name				= null;

	/**
	 * Error message that is displayed if the validator fails on this rule.
	 * @var string
	 * @see Rule::setErrorMessage()
	 * @see Rule::getErrorMessage()
	 */
	private $errorMessage		= null;

	/**
	 * Regex used as condition of this rule. This is used by custom rules.
	 * @var string
	 * @see Rule::setRegex()
	 * @see Rule::getRegex()
	 */
	private $regex				= null;

	/**
	 * Creates a new class instance.
	 *
	 * This class is used in the validation process. It represents a single
	 * rule.
	 *
	 * The available rules are:
	 *
	 * <ul>
	 * <li>required - the input value is required.</li>
	 * <li>alpha - the input accepts only letters and underscores (_).</li>
	 * <li>text - the input accepts only letters, numbers and the symbols
	 * underscore (_) and dash (-).</li>
	 * <li>number - the input accepts only numbers (without ponctuation).</li>
	 * <li>bool - the input accepts only boolean values (true, false, 1, 0, yes,
	 * no).</li>
	 * <li>email - the input value must be a valid e-mail (only syntax is
	 * checked).</li>
	 * <li>url - the input value must be a valid URL.</li>
	 * <li>date - the input value must be a valid date.</li>
	 * <li>comparePasswords - two input values are compared to see if they are
	 * exactly the same.</li>
	 * <li>compareRequireds - only checks the input value if anonther input has
	 * a desired value.</li>
	 * <li>compareDates - checks if two dates are value (if the date of first
	 * input comes before the date of second input).</li>
	 * <li>length - checks whether the input value length is inside the limits.
	 * </li>
	 * <li>match - checks whether the input value matchs the desired value.</li>
	 * <li>discard - no validation is applied.</li>
	 * </ul>
	 * @param string $name (optional) Rule name.
	 * @param string $errorMessage (optional) Error message displayed if the
	 * validation fails on this rule.
	 * @param string $regex (optional) Custom regex.
	 * @see InputRule::addRule()
	 * @see InputRule::getRules()
	 * @see Validator::validate()
	 */
	public function __construct($name = null, $errorMessage = null, $regex = null)
	{
		if($name)
			$this->name = $name;

		if($errorMessage)
			$this->errorMessage = $errorMessage;

		if($regex)
			$this->regex = $regex;
	}
	
	/**
	 * Sets the rule name.
	 * @param string $name Rule name.
	 * @see Rule::$name
	 * @see Rule::getName()
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * Returns the rule name.
	 * @return string
	 * @see Rule::$name
	 * @see Rule::setName()
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Sets the rule's error message.
	 * @param string $errorMessage Error message.
	 * @see Rule::$errorMessage
	 * @see Rule::getErrorMessage()
	 * @see Rule::hasErrorMessage()
	 */
	public function setErrorMessage($errorMessage)
	{
		$this->errorMessage = $errorMessage;
	}

	/**
	 * Returns the rule's error message.
	 * @return string
	 * @see Rule::$errorMessage
	 * @see Rule::setErrorMessage()
	 * @see Rule::hasErrorMessage()
	 */
	public function getErrorMessage()
	{
		return $this->errorMessage;
	}

	/**
	 * Returns the rule's error message.
	 * @return boolean
	 * @see Rule::$errorMessage
	 * @see Rule::setErrorMessage()
	 * @see Rule::getErrorMessage()
	 */
	public function hasErrorMessage()
	{
		return !empty($this->errorMessage);
	}

	/**
	 * Sets the rule's regex. The regex must to be surrounded by any valid
	 * regex delimiter, like a "/".
	 * @param string $regex Custom regex.
	 * @see Rule::$regex
	 * @see Rule::getRegex()
	 */
	public function setRegex($regex)
	{
		$this->regex = $regex;
	}

	/**
	 * Returns the rule's regex.
	 * @return string
	 * @see Rule::$regex
	 * @see Rule::setRegex()
	 */
	public function getRegex()
	{
		return $this->regex;
	}

	/**
	 * Returns the rule name.
	 * @return string
	 * @see Rule::$name
	 */
	public function __toString()
	{
		return $this->name;
	}
}
?>