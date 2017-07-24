<?php
/**
 * This file belongs to the Ajax package and sets the main Ajax class.
 * @version 0.2
 * @package Ajax
 */

/**
 * This class is used to build and send the response of an Ajax request.
 * @author Diego Andrade
 * @package Ajax
 * @since Optimuz 0.1
 * @version 0.3.1
 * @uses Configuration
 * @uses Lang.Language
 * @uses Html.Element.HtmlElement
 */
class AjaxResponse
{
	/**
	 * Empty response.
	 */
	const EMPTY_RESPONSE				= 400;

	/**
	 * Invalid element.
	 */
	const INVALID_ELEMENT				= 401;

	/**
	 * Defined response type is not the same as the provided element.
	 */
	const RESPONSE_TYPE_MISMATCH		= 402;

	/**
	 * Response type is XML.
	 */
	const TYPE_XML						= 'xml';

	/**
	 * Response type is HTML.
	 */
	const TYPE_HTML						= 'html';

	/**
	 * Response type is text.
	 */
	const TYPE_TEXT						= 'text';

	/**
	 * Response type is JSON.
	 */
	const TYPE_JSON						= 'json';

	/**
	 * Response charset.
	 * @var string
	 * @see AjaxResponse::setCharset()
	 * @see AjaxResponse::getCharset()
	 */
	private $charset					= null;

	/**
	 * The response type can be: xml, json, text.
	 * @var string xml
	 * @see AjaxResponse::setResponseType()
	 * @see AjaxResponse::getResponseType()
	 */
	private $responseType				= null;

	/**
	 * The root element that holds all elements that will be used to build the
	 * response.
	 * @var AjaxRootElement
	 * @see AjaxResponse::add()
	 * @see AjaxResponse::remove()
	 */
	private $rootElement				= null;

	/**
	 * AjaxJSON object.
	 * @var AjaxJSON
	 */
	private $json						= null;

	/**
	 * Text response.
	 * @var string
	 */
	private $text						= null;

	/**
	 * Response status code.
	 * @var int
	 */
	private $statusCode					= null;
	
	/**
	 * Unique instance.
	 * @var AjaxResponse
	 * @static
	 */
	private static $instance			= null;

	/**
	 * The constructor is private and cannot be called outside the class.
	 *
	 * When the instance is created, only the AjaxResponse::$responseType and
	 * AjaxResponse::$charset are defined.
	 * @param string $responseType (optimal) Response type. Default is
	 * AjaxResponse::XML.
	 */
	private function __construct($responseType = self::TYPE_XML)
	{
		$this->responseType = $responseType;
		$this->charset = LocalConfiguration::get('page.charset');
		$this->rootElement = new AjaxRootElement();
		$this->text = '';
		$this->statusCode = 200;
	}

	/**
	 * Creates and returns the AjaxResponse instance.
	 *
	 * If there is a instance created, it is returned. So we always have only
	 * one AjaxResponse object per request.
	 * @param string $responseType (optimal) Response type. Default is
	 * AjaxResponse::XML.
	 * @return AjaxResponse
	 * @static
	 */
	public static function create($responseType = self::TYPE_XML)
	{
		if(is_null(self::$instance))
			self::$instance = new self($responseType);

		return self::$instance;
	}

	/**
	 * Adds an element to the response.
	 *
	 * The element can be an AjaxElement, an AjaxJSON or a string. If it is any
	 * other then these, an AjaxError will be thrown.
	 * 
	 * An AjaxError also will be thrown if the element type is different from
	 * the current response type. For example: the current
	 * AjaxReponse::$responseType is setted to AjaxResponse::TYPE_XML but you
	 * try to add an AjaxJSON objet. This will throw an AjaxError. So before you
	 * add any response element, you must to ensure that the right response type
	 * is setted.
	 * @param AjaxElement|HtmlElement|AjaxJSON|string $element A response
	 * element.
	 * @see AjaxResponse::$responsetype
	 * @see AjaxResponse::setResponsetype()
	 * @see AjaxResponse::getResponsetype()
	 */
	public function add($element)
	{
		if(is_string($element))
		{
			if($this->responseType == self::TYPE_TEXT)
				$this->text = $element;
			else
				throw new AjaxError(Language::getCurrent()->getSentence('error.ajax.responseTypeMismatch', gettype($element), $this->responseType), self::RESPONSE_TYPE_MISMATCH);
		}
		elseif(is_object($element))
		{
			if(($element instanceof AjaxJSON) || ($element instanceof stdClass))
			{
				if($this->responseType == self::TYPE_JSON)
				{
					if($element instanceof stdClass)
						$element = new AjaxJSON($element);
					
					$this->json = $element;
				}
				else
				{
					throw new AjaxError(Language::getCurrent()->getSentence('error.ajax.responseTypeMismatch', gettype($element), $this->responseType), self::RESPONSE_TYPE_MISMATCH);
				}
			}
			elseif($element instanceof HtmlElement)
			{
				if(($this->responseType == self::TYPE_XML) || ($this->responseType == self::TYPE_HTML))
					$this->rootElement->appendChild($element);
				else
					throw new AjaxError(Language::getCurrent()->getSentence('error.ajax.responseTypeMismatch', gettype($element), $this->responseType), self::RESPONSE_TYPE_MISMATCH);
			}
			else
			{
				throw new AjaxError(Language::getCurrent()->getSentence('error.ajax.invalidElement', get_class($element)), self::INVALID_ELEMENT);
			}
		}
		else
		{
			throw new AjaxError(Language::getCurrent()->getSentence('error.ajax.invalidElement', get_class($element)), self::INVALID_ELEMENT);
		}
	}

	/**
	 * Removes an element from the response.
	 *
	 * This method can only be called to remove elements from a XML response. To
	 * clear JSON or Text response, use the AjaxResponse::clear() method.
	 * @param AjaxElement|int $element Can be an AjaxElement object already
	 * added to the response array, or a numeric index of a certain position to
	 * remove.
	 * @see AjaxResponse::clear()
	 */
	public function remove($element)
	{
		$this->rootElement->removeChild($element);
	}

	/**
	 * Clears the response when it is setted to JSON or Text.
	 *
	 * To remove XML elements from a XML response, use the
	 * AjaxResponse::remove() method.
	 *
	 * You must to have setted the AjaxResponse::$responseType to the right
	 * value before calling this method.
	 * @see AjaxResponse::remove()
	 */
	public function clear()
	{
		switch($this->responseType)
		{
			case self::TYPE_JSON:
				$this->json = null;
				break;
			case self::TYPE_TEXT:
				$this->text = '';
				break;
		}
	}

	/**
	 * Sends the response content to the client.
	 *
	 * After the content is sent, the script execution is stopped.
	 */
	public function send()
	{
		$response = '';
		$responseType = '';

		switch($this->responseType)
		{
			case self::TYPE_XML:
				$responseType = 'text/xml';

				if($this->rootElement->hasChildNodes())
					$response = "<?xml version='1.0' encoding='{$this->charset}'?" . ">\n{$this->rootElement->getHtml()}";
				break;
			case self::TYPE_HTML:
				$responseType = 'text/html';

				if($this->rootElement->hasChildNodes())
					$response = $this->rootElement->getHtml();
				break;
			case self::TYPE_JSON:
				$responseType = 'application/json';

				if(!empty($this->json))
					$response = $this->json->serialize();
				break;
			case self::TYPE_TEXT:
				$responseType = 'text/plain';

				if(!empty($this->text))
					$response = $this->text;
				break;
		}

		if(!empty($response))
		{
			header("Content-Type: {$responseType}; charset={$this->charset}", true, $this->statusCode);
			header('Content-Length: ' . Text::length($response));
			echo $response;
		}
		else
		{
			throw new AjaxError(Language::getCurrent()->getSentence('error.ajax.emptyResponse'), self::EMPTY_RESPONSE);
		}
	}

	/**
	 * Sets the response charset.
	 * @param string $charset New response charset.
	 * @see AjaxResponse::$charset
	 * @see AjaxResponse::getCharset()
	 */
	public function setCharset($charset)
	{
		$this->charset = $charset;
	}

	/**
	 * Returns the response charset.
	 * @see AjaxResponse::$charset
	 * @see AjaxResponse::setCharset()
	 */
	public function getCharset()
	{
		return $this->charset;
	}

	/**
	 * Sets the response type.
	 * @param string $type A type that can be AjaxResponse::XML,
	 * AjaxResponse::TEXT or AjaxResponse::JSON.
	 * @see AjaxResponse::$responseType
	 * @see AjaxResponse::getResponseType()
	 */
	public function setResponseType($type)
	{
		$this->responseType = $type;
	}

	/**
	 * Returns the response type.
	 * @return string
	 * @see AjaxResponse::$responseType
	 * @see AjaxResponse::setResponseType()
	 */
	public function getResponseType()
	{
		return $this->responseType;
	}

	/**
	 * Sets the response status code.
	 *
	 * The default status code is 200.
	 * @param int $statusCode Any valid HTTP status code.
	 * @see AjaxResponse::$statusCode
	 * @see AjaxResponse::getStatusCode()
	 */
	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;
	}

	/**
	 * Returns the response status code.
	 * @return int
	 * @see AjaxResponse::$responseType
	 * @see AjaxResponse::setResponseType()
	 */
	public function getStatusCode()
	{
		return $this->statusCode;
	}
}
?>