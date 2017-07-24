<?php
/**
 * This file sets a custom element using the Html.Component.HtmlElement.
 * @version 0.1
 * @package Html
 * @subpackage Element
 */

/**
 * This element represents an <img> element.
 * @author Diego Andrade
 * @package Html
 * @subpackage Element
 * @since Optimuz 0.4
 * @version 0.1
 * @uses Html
 * @uses Core.Enviroment
 */
class HtmlImage extends HtmlElement
{
	/**
	 * Creates a new image element.
	 * @param string $url (optimal) Link's URL (href attribute).
	 */
	public function __construct($url = '')
	{
		parent::__construct('img');

		if(isset($url))
			$this->setSrc($url);
	}

	/**
	 * Initializes the initial setting of the element.
	 */
	protected function initialize()
	{
		parent::initialize();
		$this->setSrc($this->getAttribute('src'));
	}

	/**
	 * Sets the image's URL (src attribute).
	 * @param string $url Image's URL.
	 */
	public function setSrc($url)
	{
		$this->setAttribute('src', Enviroment::resolveUrl($url));
	}
	
	/**
	 * Sets the image's alternative text (alt attribute).
	 * @param string $alt Image's alternative text.
	 */
	public function setAlt($alt)
	{
		$this->setAttribute('alt', $alt);
	}
	
	/**
	 * Sets the image's title (title attribute).
	 * @param string $title Image's title.
	 */
	public function setTitle($title)
	{
		$this->setAttribute('title', $title);
	}
}
?>