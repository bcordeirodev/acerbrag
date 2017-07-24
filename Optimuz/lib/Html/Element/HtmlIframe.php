<?php
/**
 * This file sets a custom element using the Html.Component.HtmlElement.
 * @version 0.1
 * @package Html
 * @subpackage Element
 */

/**
 * This element represents an <iframe> element.
 * @author Diego Andrade
 * @package Html
 * @subpackage Element
 * @since Optimuz 0.4
 * @version 0.1
 * @uses Html
 * @uses Core.Enviroment
 */
class HtmlIframe extends HtmlElement
{
	/**
	 * Creates a new iframe element.
	 * @param string $url (optimal) Iframe's URL (src attribute).
	 */
	public function __construct($url = '')
	{
		parent::__construct('iframe');

		if(isset($url))
			$this->setUrl($url);
	}

	/**
	 * Initializes the initial setting of the element.
	 */
	protected function initialize()
	{
		parent::initialize();
		$this->setUrl($this->getAttribute('src'));
	}

	/**
	 * Sets the iframe's URL (href attribute).
	 * @param string $url Iframe's URL.
	 */
	public function setUrl($url)
	{
		$this->setAttribute('src', Enviroment::resolveUrl($url));
	}
}
?>