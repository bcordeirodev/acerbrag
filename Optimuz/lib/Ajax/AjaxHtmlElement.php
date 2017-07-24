<?php
/**
 * This file belongs to the Ajax package and sets an element class that is used
 * to build responses to Ajax requests.
 * @version 0.1
 * @package Ajax
 */

/**
 * This class creates the HTML element <html> in the response.
 * @author Diego Andrade
 * @package Ajax
 * @since Optimuz 0.3
 * @version 0.2
 */
class AjaxHtmlElement extends AjaxElement
{
	/**
	 * Creates a new class instance.
	 * @param string $name Element's node name.
	 * @param string $content (optimal) HTML content.
	 * @param string $target (optimal) CSS expression.
	 */
	public function __construct($name, $content = null, $target = null)
	{
		parent::__construct($name, $content);

		if($target)
			$this->setTarget($target);
	}

	/**
	 * Sets the target attribute for this response element.
	 * @param string $target This is a CSS expression that will be used to
	 * select a DOM element in the client-side. This selected element will have
	 * its content replaced with the content of this AjaxHtmlElement.
	 */
	public function setTarget($target)
	{
		$this->setAttribute('target', $target);
	}

	/**
	 * Returns the target attribute of this response element.
	 * @return string
	 */
	public function getTarget()
	{
		return $this->getAttribute('target');
	}
}
?>