<?php
/**
 * This file belongs to the Ajax package and sets an element class that is used
 * to build responses to Ajax requests.
 * @version 0.1
 * @package Ajax
 */

/**
 * This class creates the replace element <replace> in the response.
 * @author Diego Andrade
 * @package Ajax
 * @since Optimuz 0.3
 * @version 0.2
 */
class AjaxReplaceElement extends AjaxHtmlElement
{
	/**
	 * Creates a new class instance.
	 * @param string $content (optimal) HTML content.
	 * @param string $target (optimal) CSSS expression.
	 */
	public function __construct($content = null, $target = null)
	{
		parent::__construct('replace', $content, $target);
	}
}
?>