<?php
/**
 * This file belongs to the Ajax package and sets an element class that is used
 * to build responses to Ajax requests.
 * @version 0.1
 * @package Ajax
 */

/**
 * This class creates the action element <exec> in the response.
 * @author Diego Andrade
 * @package Ajax
 * @since Optimuz 0.3
 * @version 0.2
 */
class AjaxActionElement extends AjaxElement
{
	/**
	 * Creates a new class instance.
	 * @param string $content (optimal) JS code.
	 */
	public function __construct($content = null)
	{
		parent::__construct('exec', $content);
	}
}
?>