<?php
/**
 * This file belongs to the Ajax package and sets an element class that is used
 * to build responses to Ajax requests.
 * @version 0.1
 * @package Ajax
 */

/**
 * This class is the base element for all Ajax elements.
 * @author Diego Andrade
 * @package Ajax
 * @since Optimuz 0.3
 * @version 0.2
 */
class AjaxElement extends HtmlElement
{
	/**
	 * Creates a new class instance.
	 * @param string $name Element's node name.
	 * @param HtmlElement|TextElement|string $conttent (optimal) Element
	 * content.
	 */
	public function __construct($name, $content = null)
	{
		parent::__construct($name, $content);
	}

	/**
	 * Returns the string in a CDATA container.
	 * @param string $content Content to enclose.
	 * @return string
	 * @see AjaxElement::removeCdata()
	 */
	public function addCdata($content)
	{
		return "<![CDATA[{$content}]]>";
	}

	/**
	 * Returns the string without the CDATA container.
	 * @param string $content Content to strip CDATA container.
	 * @return string
	 * @see AjaxElement::addCdata()
	 */
	public function removeCdata($content)
	{
		preg_match('/<!\[CDATA\[([^]]+)\]\]>/', $content, $matches);
		$result = $matches && isset($matches[1]) ? $matches[1] : $content;
		return $result;
	}
}
?>