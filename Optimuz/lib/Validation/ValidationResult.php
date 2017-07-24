<?php
/**
 * This file belongs to the form validation package and sets a class for this
 * package.
 * @version 0.1
 * @package Validation
 */

/**
 * This class holds the results of a validation process, performed by the
 * Validator class.
 * 
 * This class uses the class InputField to return information about the fields
 * that were checked.
 * @author Diego Andrade
 * @package Validation
 * @since Optimuz 0.3
 * @version 0.1
 * @uses Collection
 */
class ValidationResult
{
	/**
	 * Inputs used in the validation process.
	 * @var InputsList
	 */
	protected $inputs					= null;

	/**
	 * Errors found during the validation process.
	 * @var ErrorsList
	 */
	protected $errors					= null;

	/**
	 * Creates a new class instance.
	 *
	 * This class holds the results of a validation process, performed by the
	 * Validator class.
	 *
	 * This class uses the class InputField to return information about the
	 * fields that were checked.
	 */
	public function __construct()
	{
		$this->inputs = new InputsList();
		$this->errors = new ErrorsList();
	}

	/**
	 * Sets the inputs of the validation.
	 * 
	 * The method will also look for errors and fill the
	 * ValidationResult::$errors InputsList.
	 * @param InputsList $inputs Inputs used in the validation process.
	 */
	public function setInputs(InputsList $inputs)
	{
		$this->inputs = $inputs;

		foreach($this->inputs as $inputName => $input)
		{
			if($input->hasError())
				$this->errors[$inputName] = $input;
		}
	}

	/**
	 * Returns the inputs of the validation.
	 * @return InputsList
	 */
	public function getInputs()
	{
		return $this->inputs;
	}

	/**
	 * Returns the inputs of the validation that have errors.
	 * @return ErrorsList
	 */
	public function getErrors()
	{
		return $this->errors;
	}

	/**
	 * Checks if there are inputs in the current result.
	 * @return bool
	 */
	public function hasInputs()
	{
		return !$this->inputs->isEmpty();
	}

	/**
	 * Checks if there are errors in the current result.
	 * @return bool
	 */
	public function hasErrors()
	{
		return !$this->errors->isEmpty();
	}
}
?>