<?php
/**
 * This file sets a custom element using the Html.Component.HtmlElement.
 * @version 0.1
 * @package Html
 * @subpackage Element
 */

/**
 * This element represents a link <a> element.
 * @author Diego Andrade
 * @package Html
 * @subpackage Element
 * @since Optimuz 0.4
 * @version 0.1.2
 * @uses Html
 * @uses Core.Enviroment
 */
class HtmlLink extends HtmlElement
{
	/**
	 * Creates a new link element.
	 * @param string $url (optimal) Link's URL (href attribute).
	 * @param string $text (optimal) Text displayed.
	 * @param string $title (optimal) Link's title (title attribute).
	 */
	public function __construct($url = '', $text = '', $title = '')
	{
		parent::__construct('a');

		if(isset($url))
			$this->setUrl($url);

		$this->setAttribute('title', $title);
		$this->appendChild(new HtmlText($text));
	}

	/**
	 * Initializes the initial setting of the element.
	 */
	protected function initialize()
	{
		parent::initialize();
		$this->setUrl($this->getAttribute('href'));
	}

	/**
	 * Sets the link's URL (href attribute).
	 * @param string $url Link's URL.
	 */
	public function setUrl($url)
	{
		$this->setAttribute('href', Enviroment::resolveUrl($url));
	}
}
?>