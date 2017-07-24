<?php
/**
 * This file belongs to the Ajax package and sets an element class that is used
 * to build responses to Ajax requests.
 * @version 0.1
 * @package Ajax
 */

/**
 * This class creates the success element <success> in the response.
 * @author Diego Andrade
 * @package Ajax
 * @since Optimuz 0.3
 * @version 0.2
 */
class AjaxSuccessElement extends AjaxElement
{
	/**
	 * Creates a new class instance.
	 */
	public function __construct()
	{
		parent::__construct('success');
	}
}
?>