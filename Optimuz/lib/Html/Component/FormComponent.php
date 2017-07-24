<?php
/**
 * This file belongs to HTML package, that defines a simple way to build HTML
 * elements and components.
 * @version 0.1
 * @package Component
 * @subpackage Form
 */

/**
 * This class is used to build HTML forms.
 *
 * This class uses the CSS file system/css/form.css.
 * @author Diego Andrade
 * @package Component
 * @subpackage Form
 * @since Optimuz 0.4
 * @version 0.2.1
 * @uses Strings.Text
 * @uses Validation.Validator
 * @uses Html
 * @uses Core.Serial
 * @uses Lang
 * @uses Core.Enviroment
 */
class FormComponent extends HtmlComponent
{
	/**
	 * The hash submitted is invalid.
	 */
	const INVALID_HASH						= 2109;

	/**
	 * The hash's session ID was not found.
	 */
	const INVALID_HASH_SESSION_ID			= 2110;

	/**
	 * The hash has expired and is not valid anymore.
	 */
	const EXPIRED_HASH						= 2111;

	/**
	 * GET method.
	 */
	const METHOD_GET						= 'get';

	/**
	 * POST method.
	 */
	const METHOD_POST						= 'post';

	/**
	 * The form is used to post data.
	 */
	const DATA_POST							= 'application/x-www-form-urlencoded';

	/**
	 * The form is used to upload files.
	 */
	const DATA_UPLOAD						= 'multipart/form-data';

	/**
	 * Validator object used to validate the form's data.
	 * @var Validator
	 */
	protected $validator					= null;

	/**
	 * Name of the input hidden used to verify the form's integrity.
	 * @var string
	 */
	protected $formLockerName				= null;

	/**
	 * DIV element used to hold the inputs hidden.
	 * @var HtmlElement
	 */
	protected $hiddenContainer				= null;

	/**
	 * Hidden input used to store the hash string.
	 * @var InputHidden
	 */
	protected $inputHash					= null;

	/**
	 * Hash's lifetime in seconds. The default is 300 (5 minutes).
	 * @var int
	 */
	protected $hashExpirationTime			= null;

	/**
	 * Form's ID.
	 * @var string
	 */
	protected $id							= null;

	/**
	 * Whether to include the required CSS. This can be done once.
	 * @var bool
	 */
	private static $includeCss				= true;

	/**
	 * HTML to format error messages. If this is not set, the error format from
	 * the InputField is used.
	 * @var string
	 */
	protected $htmlErrorFormat				= null;

	/**
	 * Creates a new form element.
	 * @param mixed $action (optimal) Form's action (action attribute).
	 * @param mixed $method (optimal) Form's method (method attribute).
	 * @param mixed $includeCss (optimal) Whether to automaticaly include the
	 * CSS to format the form. Default is true.
	 */
	public function __construct($action = '', $method = self::METHOD_GET, $includeCss = true)
	{
		self::$includeCss = $includeCss;
		parent::__construct('form');
		$this->setAction($action);
		$this->setMethod($method);
	}

	/**
	 * Initializes the initial setting of the element.
	 */
	protected function initialize()
	{
		parent::initialize();
		$this->hashExpirationTime = 300;
		$this->notInSession = array('hiddenContainer', 'inputHash');

		$action = $this->getAttribute('action');

		if(Text::index('~', $action) === 0)
		{
			$this->setAction($action);
			$this->setMethod($this->getAttribute('method'));
		}

		if($this->getAttribute('object-include-css') == 'false')
			self::$includeCss = false;

		if(!$this->hasChildNodes())
			$this->appendChild(new HtmlElement('ul')); // first child must be a list

		$this->clearErrors();
		$this->updateInputs();

		if(self::$includeCss)
		{
			CurrentHttpRequest::getController()->getView()->addResource('system/css/form.css');
			self::$includeCss = false;
		}
	}

	/**
	 * Sets the element's ID.
	 *
	 * This ID is not rendered in the final HTML. It is used only to reference
	 * the object in the view.
	 * @param string $id New element's ID.
	 * @param bool $idAttribute (optimal) If is true the ID will be used as the
	 * id attribute and rendered in the HTML. Otherwise it will be used only to
	 * reference the object in the view. Default is false.
	 */
	public function setId($id, $idAttribute = false)
	{
		parent::setId($id, $idAttribute);
		$this->updateSessionHash();
	}

	/**
	 * Sets the form's URL (action attribute).
	 * @param string $url Form's URL.
	 */
	public function setAction($url)
	{
		$this->setAttribute('action', Enviroment::resolveUrl($url));
	}

	/**
	 * Retuns the form's URL (action attribute).
	 * @return string
	 */
	public function getAction()
	{
		return $this->getAttribute('action');
	}

	/**
	 * Sets the form's method (method attribute).
	 * @param string $method Form's method (get or post).
	 */
	public function setMethod($method)
	{
		$this->setAttribute('method', $method);

		if(Text::toLower($method) == self::METHOD_POST)
		{
			if(!$this->hasAttribute('enctype') || ($this->getAttribute('enctype') == 'text/plain'))
				$this->setDataType(self::DATA_POST);
		}
		elseif($this->hasAttribute('enctype'))
		{
			$this->removeAttribute('enctype');
		}
	}

	/**
	 * Retuns the form's method (method attribute).
	 * @return string
	 */
	public function getMethod()
	{
		return $this->getAttribute('method');
	}

	/**
	 * Sets the forms data type (enctype attribute).
	 * @param string $type Data type, FormComponent::DATA_POST or
	 * FormComponent::DATA_UPLOAD.
	 * @see FormComponent::DATA_POST
	 * @see FormComponent::DATA_UPLOAD
	 */
	public function setDataType($type)
	{
		$this->setAttribute('enctype', $type);
	}

	/**
	 * Returns the forms data type (enctype attribute).
	 * @return string
	 * @see FormComponent::setDataType()
	 */
	public function getDataType($type)
	{
		return $this->getAttribute('enctype');
	}

	/**
	 * Adds an input element.
	 * @param HtmlElement $input Input element.
	 */
	public function addInput(IHtmlFormElement $input, HtmlElement $label = null)
	{
		$e = new HtmlElement('li');
		$this->firstChild->appendChild($e);

		if(isset($label))
			$e->appendChild($label);

		$e->appendChild($input);
		$value = null;

		if($this->getMethod() == self::METHOD_POST)
		{
			if(isset($_POST) && isset($_POST[$input->getAttribute('name')]))
				$value = $_POST[$input->getAttribute('name')];
		}
		else
		{
			if(isset($_GET) && isset($_GET[$input->getAttribute('name')]))
				$value = $_GET[$input->getAttribute('name')];
		}

		if($value)
			$input->setValue($value);
	}

	/**
	 * Returns an array with the current form elements. These elements don't
	 * include the input hidden used to store the form's hash.
	 *
	 * The result is got using the HtmlElement::xpath() method. All inputs,
	 * selects and textareas are selected.
	 * @return array
	 */
	public function getInputs()
	{
		$inputs = $this->xpath('.//input[not(@state-form-hidden-input)] | .//input[@state-form-hidden-input!="true"] | .//select | .//textarea');
		$results = array();
		$newInput = null;
		$name = null;

		foreach($inputs as $input)
		{
			$name = $input->getAttribute('name');

			switch($input->nodeName)
			{
				case 'input':
					switch($input->getAttribute('type'))
					{
						case 'password':
							$newInput = $input->toType('InputPassword');
							break;
						case 'hidden':
							$newInput = $input->toType('InputHidden');
							break;
						case 'checkbox':
							$newInput = $input->toType('InputCheckbox');
							break;
						case 'radio':
							$newInput = $input->toType('InputRadio');
							break;
						default:
							$newInput = $input->toType('InputText');
							break;
					}
					break;
				case 'select':
					$newInput = $input->toType('HtmlSelect');
					break;
				case 'textarea':
					$newInput = $input->toType('InputTextarea');
					break;
			}

			if($name)
				$results[$name] = $newInput;
			else
				$results[] = $newInput;
		}

		return $results;
	}

	/**
	 * Loads a validaton file to validate the form's data.
	 * @param string $validationFileName Name of validation file, without the
	 * extension (.xml).
	 * @see Validator::loadPolicy()
	 */
	public function setValidationPolicy($validationFileName)
	{
		$this->validator = new Validator();
		$this->validator->loadPolicy($validationFileName);
	}

	/**
	 * Adds the submit and reset buttons.
	 */
	public function addButtons()
	{
		if(!isset($this->hiddenContainer))
			$this->setHiddenContainer();

		$this->hiddenContainer->appendChild(new HtmlButton('reset', 'Reset'));
		$this->hiddenContainer->appendChild(new HtmlButton('submit', 'Submit'));
	}

	/**
	 * Retuns a bool indicating whether the form can be validated.
	 *
	 * The form is ready to be validated when it has data. If the form's method
	 * is POST then is expected that the it has POST data ($_POST array is set
	 * and is not empty). The same for the GET method.
	 * @return bool
	 */
	public function canValidate()
	{
		return ($this->getAttribute('method') == 'post' ? (isset($_POST) && !empty($_POST)) : (isset($_GET) && !empty($_GET))) && isset($this->validator);
	}

	/**
	 * Validates the form.
	 *
	 * The form uses a Validator object to validate its data.
	 *
	 * If the form is successfuly validated, a true is returned. Otherwise a
	 * false is returned.
	 * @return bool
	 */
	public function validate()
	{
		$success = false;
		$validSession = false;
		$hashError = null;
		$hashCode = null;

		if($this->id)
		{
			$sessionId = "Form_{$this->id}";

			if(Session::exists($sessionId))
			{
				$sessionData = Session::get($sessionId);
				$now = time();

				if($now < $sessionData['time'])
				{
                    // need to use filter_input() here because the hash will not
                    // be in the policy file, so we cannot call
                    // $this->validator->getInputValue()
                    $postHash = filter_input(($this->getMethod() == self::METHOD_GET ? INPUT_GET : INPUT_POST), $sessionData['hashId'], FILTER_SANITIZE_STRING);
                    $validSession = $sessionData['hash'] == $postHash;

					if(!$validSession)
					{
						$hashError = Language::getInstance('Html')->getSentence('component.form.invalidHash', $sessionData['hash'], $postHash);
						$hashCode = self::INVALID_HASH;
					}
				}
				else
				{
					$hashError = Language::getInstance('Html')->getSentence('component.form.expiredHash', Date::GMT($sessionData['time']), Date::GMT($now));
					$hashCode = self::EXPIRED_HASH;
				}
			}
			else
			{
				$hashError = Language::getInstance('Html')->getSentence('component.form.invalidHashSessionId');
				$hashCode = self::INVALID_HASH_SESSION_ID;
			}
		}
		else
		{
			$validSession = true;
		}

		// no matter if the validation on the hash was successfuly done, the old
		// hash is removed and a new one is set.
		$this->regenerateSessionHash();

		if($validSession)
		{
			if(!($success = $this->validator->validate()))
				$this->showValidationResult($this->validator->getResult());
		}
		else
		{
			throw new HtmlError($hashError, $hashCode);
		}

		return $success;
	}

	/**
	 * Shows all error messages from the validation and also updates the input
	 * fields.
	 *
	 * Each error message is appended right after its respective input field.
	 * @param ValidationResult $result An object holding the validation
	 * result.
	 */
	public function showValidationResult(ValidationResult $result)
	{
		$errors = $result->getErrors();

		foreach($this->getInputs() as $htmlInput)
		{
			if($htmlInput->hasAttribute('name'))
			{
				if(isset($errors[$htmlInput->getAttribute('name')]))
				{
					$error = $errors[$htmlInput->getAttribute('name')];

					if(!empty($this->htmlErrorFormat))
						$error->setHtmlErrorFormat($this->htmlErrorFormat);

					$htmlInput->parentNode->loadHtml($error->getHtmlErrorMessage());
				}
			}
		}

		$data = array();

		foreach($result->getInputs() as $input)
			$data[$input->getName()] = $input->getValue();

		$this->updateInputs($data);
	}

	/**
	 * Sets a HTML template for error messages. This must to be called before
	 * the FormComponent::showValidationResult() method.
	 * @param string $html Any valid HTML to format an error message. This
	 * string will be passed to sprintf(), so it must to have the placeholder %s
	 * that will be replaced with the error string.
	 */
	public function setHtmlErrorFormat($html)
	{
		$this->htmlErrorFormat = $html;
	}

	/**
	 * Returns the Validator object used to validate the form's data.
	 *
	 * Returns null if there is no Validator attached to the form.
	 * @return Validator
	 */
	public function getValidator()
	{
		return $this->validator;
	}

	/**
	 * Updates the inputs' values using data from the request.
	 *
	 * If the form uses the POST method, the data used to update the input's
	 * will come from the $_POST array. In the other hand if the form uses the
	 * GET method, the data used will come from the $_GET array.
	 * @param array $data (optional) Array with data to update the form inputs.
	 * If is not given, data from the request (POST or GET) is used.
	 */
	public function updateInputs($data = null)
	{
		if($data == null)
		{
			if($this->getMethod() == self::METHOD_POST)
			{
				if(isset($_POST))
					$data = $_POST;
			}
			else
			{
				if(isset($_GET))
					$data = $_GET;
			}
		}

		if(isset($this->validator))
			$this->validator->setSource($data);

		if(!empty($data))
		{
			$inputs = $this->getInputs();

			foreach($inputs as $input)
			{
				if(isset($data[$input->getAttribute('name')]))
					$value = $data[$input->getAttribute('name')];
				else
					$value = '';

				switch(get_class($input))
				{
					case 'InputCheckbox':
					case 'InputRadio':
						$input->setChecked($value == $input->getValue());
						break;
					default:
						if($input instanceof IHtmlFormElement)
							$input->setValue($value);
						else
							$input->setAttribute('value', $value);
						break;
				}
			}
		}
	}

	/**
	 * Resets the form's elements to their default values.
	 */
	public function reset()
	{
		$inputs = $this->getInputs();

		foreach($inputs as $input)
		{
			$type = $input->getAttribute('type');

			if(
				$input->nodeName == 'input' ?
					($type != 'button') && ($type != 'reset') && ($type != 'submit') && ($type != 'image') :
					true
			)
			{
				switch(get_class($input))
				{
					case 'InputCheckbox':
					case 'InputRadio':
						$input->setChecked(false);
						break;
					default:
						if($input instanceof IHtmlFormElement)
							$input->setValue('');
						else
							$input->setAttribute('value', '');
						break;
				}
			}
		}
	}

	/**
	 * Removes all errors from the form.
	 */
	public function clearErrors()
	{
		if(isset($this->validator))
			$this->validator->clearErrors();

		$errors = $this->xpath('.//span[@class="error"]');

		foreach($errors as $error)
			$error->parentNode->removeChild($error);
	}

	/**
	 * Updates the session hash for the form.
	 *
	 * If there is no hash in the session, a new one is created. Otherwise, the
	 * hash is recovered from the session and set in the form.
	 */
	public function updateSessionHash()
	{
		$sessionId = "Form_{$this->id}";

		if(!Session::exists($sessionId))
		{
			$serial = new Serial();
			$time = time() + $this->hashExpirationTime;
			$addr = $_SERVER['REMOTE_ADDR'];
			$hash = sha1($time . $addr);
			$this->formLockerName = $serial->generate($time);

			Session::set($sessionId, array(
				'hashId' => $this->formLockerName,
				'hash' => $hash,
				'time' => $time
			));
		}
		else
		{
			$sessionData = Session::get($sessionId);
			$time = $sessionData['time'];
			$hash = $sessionData['hash'];
			$this->formLockerName = $sessionData['hashId'];
		}

		if(!isset($this->hiddenContainer))
			$this->setHiddenContainer();

		if(!isset($this->inputHash))
			$this->setInputHash();

		$this->inputHash->setAttribute('name', $this->formLockerName);
		$this->inputHash->setAttribute('value', $hash);
	}

	/**
	 * Removes the session hash.
	 *
	 * The hash is removed from the session and from the form.
	 */
	public function removeSessionHash()
	{
		Session::remove("Form_{$this->id}");

		if(!isset($this->inputHash->parentNode))
			$this->hiddenContainer->appendChild($this->inputHash);

		$this->inputHash->parentNode->removeChild($this->inputHash);
		$this->inputHash = null;
	}

	/**
	 * Generates a new session hash for the form.
	 *
	 * This method is a shortcut for calling FormComponent::removeSessionHash()
	 * and FormComponent::updateSessionHash().
	 * @see FormComponent::removeSessionHash()
	 * @see FormComponent::updateSessionHash()
	 */
	public function regenerateSessionHash()
	{
		$this->removeSessionHash();
		$this->updateSessionHash();
	}

	/**
	 * Sets the hash's lifetime.
	 * @param int $seconds Time in seconds.
	 */
	public function setHashExpirationTime($seconds)
	{
		$this->hashExpirationTime = (int)$seconds;
	}

	/**
	 * Returns the hash's lifetime in seconds.
	 * @return int
	 */
	public function getHashExpirationTime()
	{
		return $this->hashExpirationTime;
	}

	/**
	 * Recovers the form state using inline data.
	 */
	public function recoverState()
	{
		$this->notInSession = array('hiddenContainer', 'inputHash');
		parent::recoverState();

		if(!isset($this->hiddenContainer))
			$this->setHiddenContainer();

		if(!isset($this->inputHash))
			$this->setInputHash();

		$this->updateInputs();
	}

	/**
	 * Sets the hidden container.
	 */
	protected function setHiddenContainer()
	{
		$result = $this->xpath('.//div[@state-form-hidden-container]');

		if(!$result->isEmpty())
		{
			$this->hiddenContainer = $result->item(0);
		}
		else
		{
			$this->hiddenContainer = HtmlElement::create('div');
			$this->hiddenContainer->setAttribute('state-form-hidden-container', 'true');
			$this->appendChild($this->hiddenContainer);
		}
	}

	/**
	 * Sets the hidden input used to hold the security hash.
	 */
	protected function setInputHash()
	{
		$result = $this->xpath('.//input[@state-form-hidden-input]');

		if(!$result->isEmpty())
		{
			$this->inputHash = $result->item(0);
		}
		else
		{
			$this->inputHash = HtmlElement::create('input')->toType('InputHidden');
			$this->inputHash->setAttribute('state-form-hidden-input', 'true');
			$this->hiddenContainer->appendChild($this->inputHash);
		}
	}
}
?>