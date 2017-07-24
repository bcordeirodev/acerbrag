<?php
/**
 * This file belongs to the form validation package and sets a class for this
 * package.
 * @version 0.5
 * @package Validation
 */

/**
 * This class is used in the validation process. It stores the settings needed
 * to check each item in the form, and all validation rules are added using this
 * class.
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
 * <li>password - the input value must contain some required classes of
 * characters.</li>
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
 *
 * You can specify at any time new conditions using the rule "custom". This rule
 * receives a regular expression that must match the input value. If it does not
 * match, the input is invalid.
 * @author Diego Andrade
 * @package Validation
 * @since Optimuz 0.1
 * @version 0.5
 * @todo Add the "group" rule.
 */
class InputRule extends Object
{
	/**
	 * Input name (must be the same of the input name attribute in the form).
	 * @var string
	 * @see InputRule::setName()
	 * @see InputRule::getName()
	 */
	private $name						= null;

	/**
	 * Input alias. This name will be presented to the user in case of errors.
	 * @var string
	 * @see InputRule::setLabel()
	 * @see InputRule::getLabel()
	 */
	private $label						= null;

	/**
	 * Required value that the field must to have to be valid.
	 *
	 * Only used in comparsions's rules.
	 * @var mixed
	 * @see InputRule::setRequiredValue()
	 * @see InputRule::getRequiredValue()
	 */
	private $reqValue					= null;

	/**
	 * Value that the input must not have to be valid.
	 *
	 * Only used in comparsions's rules.
	 * @var mixed
	 * @see InputRule::setDifferentValue()
	 * @see InputRule::getDifferentValue()
	 */
	private $diffValue					= null;

	/**
	 * Name of additional input used to validate this one.
	 * @var string
	 * @see InputRule::setSecond()
	 * @see InputRule::getSecond()
	 */
	private $second						= null;

	/**
	 * Input values when this input has many choices (like a radio button list).
	 * @var array
	 * @see InputRule::setItems()
	 * @see InputRule::getItems()
	 */
	private $items						= null;

	/**
	 * Informs whether the input should have HTML code. If is false, the input
	 * will be validated against HTML injection. Default is false.
	 * @var bool false
	 * @see InputRule::setHasHtml()
	 * @see InputRule::getHasHtml()
	 */
	private $hasHtml					= null;

	/**
	 * Informs if the input value is URL enconded. Default is false.
	 * @var bool false
	 * @see InputRule::setIsUrlEncoded()
	 * @see InputRule::getIsUrlEncoded()
	 */
	private $isUrlEncoded				= null;

	/**
	 * Maximum number of characters that this input can have in its value.
	 * @var int
	 * @see InputRule::setMinLength()
	 * @see InputRule::getMinLength()
	 */
	private $minValue					= null;

	/**
	 * Minimum number of characters this input can have in its value.
	 * @var int
	 * @see InputRule::setMaxLength()
	 * @see InputRule::getMaxLength()
	 */
	private $maxValue					= null;

	/**
	 * Total number of characters this input can have in its value.
	 * @var int
	 * @see InputRule::setFixedLength()
	 * @see InputRule::getFixedLength()
	 */
	private $fixedValue					= null;

	/**
	 * Whether the value should be checked strictly. This depends on the rule.
	 * @var bool
	 * @see InputRule::setStrict()
	 * @see InputRule::isStrict()
	 */
	private $strict						= null;

	/**
	 * Allowed types (extensions) of files. This is used with the rule "file".
	 * @var array
	 * @see InputRule::setTypes()
	 * @see InputRule::getTypes()
	 */
	private $types						= null;

	/**
	 * Maximum allowed size of files. This is used with the rule "file".
	 * @var string
	 * @see InputRule::setSize()
	 * @see InputRule::getSize()
	 */
	private $size						= null;

	/**
	 * Whether the field should be required. Works as an alternative of the rule
	 * "required" for the rule "upload".
	 * @var bool
	 * @see InputRule::isRequired()
	 */
	private $required					= null;

	/**
	 * Array with validation rules.
	 * @var array
	 * @see InputRule::addRule()
	 * @see InputRule::getRules()
	 * @see Validator::validate()
	 */
	private $rules						= null;
	
	/**
	 * Array of allowed classes of characters for the password rule.
	 * 
	 * The classes can be: letters, numbers, symbols. The allowed symbols are:
	 * -_@!?#$%&*()+,.[]{}\<>;:/=
	 * @var array
	 * @see InputRule::setAccept()
	 * @see InputRule::getAccept()
	 */
	private $accept						= null;
	
	/**
	 * Whether to allow sequences (e.g. 12345, 9876543, abcde, onmlkj etc).
	 * @var bool
	 * @see InputRule::setAllowSequences()
	 * @see InputRule::getAllowSequences()
	 */
	private $allowSequences		= null;
	
	/**
	 * The maximum length of a sequence required to allow.
	 * @var int
	 * @see InputRule::setSequencesMaxLength()
	 * @see InputRule::getSequencesMaxLength()
	 */
	private $sequencesMaxLength	= null;
	
	/**
	 * Creates a new class instance.
	 *
	 * This class is used in the validation process. It stores the settings
	 * needed to check each item in the form, and all validation rules are added
	 * using this class.
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
	 * <li>password - the input value must contain some required classes of
	 * characters.</li>
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
	 *
	 * You can specify at any time new conditions using the rule "custom". This
	 * rule receives a regular expression that must match the input value. If it
	 * does not match, the input is invalid.
	 * @see InputRule::$rules
	 * @see InputRule::addRule()
	 * @see InputRule::getRules()
	 * @see Validator::validate()
	 */
	public function __construct()
	{
		$this->rules = array();
		$this->hasHtml = false;
		$this->isUrlEncoded = false;
	}
	
	/**
	 * Adds a new rule for validation.
	 * @param string $rule Rule name.
	 * @see InputRule::$rules
	 * @see InputRule::getRules()
	 * @see Validator::validate()
	 */
	public function addRule($rule)
	{
		if(!is_object($rule))
			$rule = new Rule($rule);

		$this->rules[] = $rule;
	}

	/**
	 * Returns the rules array.
	 * @return array
	 * @see InputRule::$rules
	 * @see InputRule::addRule()
	 * @see Validator::validate()
	 */
	public function getRules()
	{
		return $this->rules;
	}

	/**
	 * Checks whether the rule was added.
	 * @return bool
	 * @see InputRule::$rules
	 * @see InputRule::addRule()
	 */
	public function hasRule($rule)
	{
		return in_array($rule, $this->rules);
	}

	/**
	 * Sets the input name.
	 * @param string $name Input name.
	 * @see InputRule::$name
	 * @see InputRule::getName()
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * Returns the input name.
	 * @return string
	 * @see InputRule::$name
	 * @see InputRule::setName()
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Sets the input label (alias).
	 * @param string $label Input label.
	 * @see InputRule::$label
	 * @see InputRule::getLabel()
	 */
	public function setLabel($label)
	{
		$this->label = $label;
	}

	/**
	 * Returns the input label (alias).
	 * @return string
	 * @see InputRule::$label
	 * @see InputRule::setLabel()
	 */
	public function getLabel()
	{
		return $this->label;
	}

	/**
	 * Sets the required value for the input.
	 *
	 * The input value must to match this value to be valid.
	 * @param string $value Required value.
	 * @see InputRule::$reqValue
	 * @see InputRule::getRequiredValue()
	 */
	public function setRequiredValue($value)
	{
		if(strpos($value, ',') !== false)
			$value = explode(',', $value);

		$this->reqValue = $value;
	}

	/**
	 * Returns the required value for the input.
	 * @return string
	 * @see InputRule::$reqValue
	 * @see InputRule::getRequiredValue()
	 */
	public function getRequiredValue()
	{
		return $this->reqValue;
	}

	/**
	 * Sets the value that the input must not have to be valid.
	 * @param string $value Different value.
	 * @see InputRule::$diffValue
	 * @see InputRule::getDifferentValue()
	 */
	public function setDifferentValue($value)
	{
		if(strpos($value, ',') !== false)
			$value = explode(',', $value);
		
		$this->diffValue = $value;
	}

	/**
	 * Returns the value that the input must not have to be valid.
	 * @return string
	 * @see InputRule::$diffValue
	 * @see InputRule::setDifferentValue()
	 */
	public function getDifferentValue()
	{
		return $this->diffValue;
	}

	/**
	 * Sets the additional input used to validate this one.
	 *
	 * This is used in comparsion rules.
	 * @param string $second Additional input name.
	 * @see InputRule::$second
	 * @see InputRule::getSecond()
	 */
	public function setSecond($second)
	{
		$this->second = $second;
	}

	/**
	 * Returns the additional input name.
	 * @return string
	 * @see InputRule::$second
	 * @see InputRule::setSecond()
	 */
	public function getSecond()
	{
		return $this->second;
	}

	/**
	 * Sets items of an input.
	 * @param array $items Input items.
	 * @see InputRule::$items
	 * @see InputRule::getItems()
	 */
	public function setItems($items)
	{
		$this->items = $items;
	}

	/**
	 * Returns the input items.
	 * @return array
	 * @see InputRule::$items
	 * @see InputRule::setItems()
	 */
	public function getItems()
	{
		return $this->items;
	}

	/**
	 * Sets whether the input should accept HTML code.
	 * @param bool $hasHtml If is true the input will accept HTML code.
	 * Otherwise, HTML code will be treated as HTML injection.
	 * @see InputRule::$hasHtml
	 * @see InputRule::getHasHtml()
	 */
	public function setHasHtml($hasHtml)
	{
		$this->hasHtml = $hasHtml;
	}

	/**
	 * Returns whether the input should accept HTML code.
	 * @return bool
	 * @see InputRule::$hasHtml
	 * @see InputRule::setHasHtml()
	 */
	public function getHasHtml()
	{
		return $this->hasHtml;
	}

	/**
	 * Sets whether the input value is URL encoded.
	 * @param bool $isUrlEncoded If true the input value will be URL decoded
	 * before is parsed by the validator.
	 * @see InputRule::$isUrlEncoded
	 * @see InputRule::getIsUrlEncoded()
	 */
	public function setIsUrlEncoded($isUrlEncoded)
	{
		$this->isUrlEncoded = $isUrlEncoded;
	}

	/**
	 * Returns whether the inut value is URL encoded.
	 * @return bool
	 * @see InputRule::$isUrlEncoded
	 * @see InputRule::setIsUrlEncoded()
	 */
	public function getIsUrlEncoded()
	{
		return $this->isUrlEncoded;
	}

	/**
	 * Sets the input value minimum length.
	 * @param int $min Minimum length.
	 * @see InputRule::$minValue
	 * @see InputRule::getMinLength()
	 */
	public function setMinLength($min)
	{
		$this->minValue = $min;
	}

	/**
	 * Returns the input value minimum length.
	 * @return int
	 * @see InputRule::$minValue
	 * @see InputRule::setMinLength()
	 */
	public function getMinLength()
	{
		return $this->minValue;
	}

	/**
	 * Sets the input value maximum length.
	 * @param int $max
	 * @see InputRule::$maxValue
	 * @see InputRule::getMaxLength()
	 */
	public function setMaxLength($max)
	{
		$this->maxValue = $max;
	}

	/**
	 * Returns the input value maximum length.
	 * @return int
	 * @see InputRule::$maxValue
	 * @see InputRule::setMaxLength()
	 */
	public function getMaxLength()
	{
		return $this->maxValue;
	}

	/**
	 * Sets the input value length.
	 * @param int $length Input value length.
	 * @see InputRule::$fixedValue
	 * @see InputRule::getFixedLength()
	 */
	public function setFixedLength($length)
	{
		$this->fixedValue = $length;
	}

	/**
	 * Returns the input value length.
	 * @return int
	 * @see InputRule::$fixedValue
	 * @see InputRule::setFixedLength()
	 */
	public function getFixedLength()
	{
		return $this->fixedValue;
	}

	/**
	 * Sets whether the value should be strictly checked. This depends on the
	 * rule.
	 * @param int $strict True for strict check, or false for normal check.
	 * @see InputRule::$strict
	 * @see InputRule::isStrict()
	 */
	public function setStrict($strict)
	{
		$this->strict = $strict;
	}

	/**
	 * Returns whether the value should be strictly checked. This depends on the
	 * rule.
	 * @return bool
	 * @see InputRule::$strict
	 * @see InputRule::setStrict()
	 */
	public function isStrict()
	{
		return $this->strict;
	}

	/**
	 * Sets the allowed file types.
	 * @param string $types File types separated by comma.
	 * @see InputRule::$types
	 * @see InputRule::getTypes()
	 */
	public function setTypes($types)
	{
		$this->types = explode(',', $types);
	}

	/**
	 * Returns the allowed file types.
	 * @return array
	 * @see InputRule::$types
	 * @see InputRule::setTypes()
	 */
	public function getTypes()
	{
		return $this->types;
	}

	/**
	 * Sets the maximum allowed file size.
	 * @param string $size String representation of the file size. 
	 * Examples: 300K, 2M, 5G.
	 * @see InputRule::$size
	 * @see InputRule::getSize()
	 */
	public function setSize($size)
	{
		$this->size = $size;
	}

	/**
	 * Returns the maximum allowed file size.
	 * @return string
	 * @see InputRule::$size
	 * @see InputRule::setSize()
	 */
	public function getSize()
	{
		return $this->size;
	}

	/**
	 * Sets or returns whether the field should be required.
	 * @param bool $required (optimal) If is given will set whether the field
	 * should be required. Otherwise a boolean will be returned.
	 * @return bool
	 * @see InputRule::$required
	 */
	public function isRequired($required = null)
	{
		if(is_bool($required))
			$this->required = $required;
		else
			return $this->required;
	}
	
	/**
	 * Sets the allowed classes of characters for the password rule.
	 * @param array $accept Array of allowed classes of characters. Possible
	 * values are: letters, numbers and symbols. The allowed symbols are:
	 * -_@!?#$%&*()+,.[]{}\<>;:/=
	 * @see InputRule::$accept
	 * @see InputRule::getAccept()
	 */
	public function setAccept(array $accept)
	{
		$this->accept = $accept;
	}
	
	/**
	 * Returns an array of allowed classes of characters for the password rule.
	 * @return array
	 * @see InputRule::$accept
	 * @see InputRule::setAccept()
	 */
	public function getAccept()
	{
		return $this->accept;
	}
	
	/**
	 * Sets if sequences are allowed (e.g. 123456, 98765, abcde, onmlkj etc).
	 * @param bool $allowSequences True to allow, false to deny.
	 * @see InputRule::$allowSequences
	 * @see InputRule::getAllowSequences()
	 */
	public function setAllowSequences($allowSequences)
	{
		$this->allowSequences = $allowSequences;
	}
	
	/**
	 * Returns if sequences are allowed (e.g. 123456, 98765, abcde, onmlkj etc).
	 * @return bool True allows sequences, false deny them.
	 * @see InputRule::$allowSequences
	 * @see InputRule::setAllowSequences()
	 */
	public function getAllowSequences()
	{
		return $this->allowSequences;
	}
	
	/**
	 * Sets the maximum length of a valid sequence. A sequence with more
	 * numbers/letters then the specified here, is maked as invalid.
	 * @param int $length Maximum length of a valid sequence.
	 * @see InputRule::$sequencesMaxLength
	 * @see InputRule::getSequencesMaxLength()
	 */
	public function setSequencesMaxLength($length)
	{
		$this->sequencesMaxLength = (int)$length;
	}
	
	/**
	 * Returns the maximum length of a valid sequence.
	 * @return int Maximum length of a valid sequence.
	 * @see InputRule::$sequencesMaxLength
	 * @see InputRule::setSequencesMaxLength()
	 */
	public function getSequencesMaxLength()
	{
		return $this->sequencesMaxLength;
	}
}
?>