<?php
/**
 * This file sets a custom component using the Html.Component.HtmlComponent.
 * @version 0.2
 * @package Html
 * @subpackage Component
 */

/**
 * Shows a summary with errors message. This erors can come from a form
 * validation (errors are instances of the InputField class) or can be any error
 * object (Error class).
 * @author Diego Andrade
 * @package Html
 * @subpackage Component
 * @since Optimuz 0.2
 * @version 0.3
 * @uses Lang
 * @uses Error.Error
 * @uses Validation.InputField
 */
class ErrorSummaryComponent extends HtmlComponent
{
	/**
	 * The array 'errors' is invalid.
	 */
	const INVALID_ARRAY_ERRORS				= 2200;

	/**
	 * Errors that will be presented.
	 * @var array
	 */
	protected $errors						= null;

	/**
	 * Single error to be presented.
	 * @var string
	 */
	protected $singleError					= null;

	/**
	 * Counter used to count how many summary instances are created.
	 * @var int
	 * @static
	 */
	protected static $counter				= 0;

	/**
	 * Creates a new class instance.
	 *
	 * By default, this component does not saves its state to the session. If
	 * you want to do so you need to turn on this behaviour by calling
	 * ErrorsComponent::setSaveState().
	 * @param array $errors (optimal) Array with error objects. This objects can
	 * be an InputField object or any Error object.
	 */
	public function __construct(array $errors = null)
	{
		parent::__construct('div');

		if($errors)
			$this->errors = $errors;
	}

	/**
	 * Sets the errors array. This replace any previous value.
	 * @param array $errors Errors array.
	 */
	public function setErrors(array $errors)
	{
		$this->errors = $errors;
		parent::clear();
		$this->getHtml();
	}

	/**
	 * Returns the errors array.
	 * @return array
	 */
	public function getErrors()
	{
		return $this->errors;
	}

	/**
	 * Returns the component HTML with the given error.
	 * @param string $error Error message.
	 * @return string
	 */
	public function setSingleError($error)
	{
		$this->singleError = $error;
		parent::clear();
		$this->getHtml();
	}

	/**
	 * Returns the single error message.
	 * @return string
	 */
	public function getSingleError()
	{
		return $this->singleError;
	}

	/**
	 * Removes all errors.
	 */
	public function clear()
	{
		$this->errors = null;
		$this->singleError = null;
		parent::clear();
	}

	/**
	 * Builds the base structure of the summary and returns the base DIV
	 * element.
	 */
	private function buildBase()
	{
		if(!$this->hasChildNodes())
		{
			$this->setAttribute('class', 'errorsSummary');
			$this->setAttribute('id', 'errorSummary' . (self::$counter++));

			$parent = HtmlElement::create('div');
			$parent->setAttribute('class', 'summary-content');
			$this->appendChild($parent);

			$title = HtmlElement::create('h2');
			$parent->appendChild($title);

			$link = HtmlElement::create('a', Language::getInstance('Html')->getSentence('component.errorSummary.title'))->toType('HtmlLink');
			$link->setAttribute('title', Language::getInstance('Html')->getSentence('component.errorSummary.linkTitleAttribute1'));
			$link->setAttribute('href', 'javascript:void(0);');
			$link->setAttribute('class', 'display');
			$title->appendChild($link);
		}
	}

	/**
	 * Returns the component HTML with a list of errors.
	 *
	 * If there are no errors added, en empty string will be returned.
	 * @return string
	 */
	public function getHtml()
	{
		$html = '';

		if(!empty($this->errors))
		{
			$this->buildBase();

			$list = HtmlElement::create('ul');
			$this->firstChild->appendChild($list);

			foreach($this->errors as $field)
			{
				$item = HtmlElement::create('li');

				if($field instanceof InputField)
				{
					if($field->hasError())
					{
						$link = HtmlElement::create('a');
						$link->setAttribute('href', "#{$field->getName()}");
						$link->setAttribute('title', Language::getInstance('Html')->getSentence('component.errorSummary.linkTitleAttribute2'));
						$item->appendChild($link);

						$link->appendChild(HtmlElement::create('strong', $field->getLabel()));
						$link->appendChild(new HtmlText($field->getErrorMessage()));
					}
				}
				elseif($field instanceof Error)
				{
					$item->appendChild(new HtmlText($field->getMessage()));
				}
				else
				{
					$item->appendChild(new HtmlText(Language::getInstance('Html')->getSentence('component.errorSummary.invalidErrorObject')));
				}

				$list->appendChild($item);
			}

			$html = parent::getHtml();
		}
		elseif(isset($this->singleError))
		{
			$this->buildBase();
			$this->firstChild->appendChild(HtmlElement::create('p', $this->singleError));
			$html = parent::getHtml();
		}

		return $html;
	}
}
?>