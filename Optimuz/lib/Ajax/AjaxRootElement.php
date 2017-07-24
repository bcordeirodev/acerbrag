<?php
/**
 * This file belongs to the Ajax package and sets an element class that is used
 * to build responses to Ajax requests.
 * @version 0.1
 * @package Ajax
 */

/**
 * This class is the main element in a default XML response.
 *
 * All others XML elements are inside this one.
 * @author Diego Andrade
 * @package Ajax
 * @since Optimuz 0.3
 * @version 0.2
 */
class AjaxRootElement extends AjaxElement
{
	/**
	 * Creates a new class instance.
	 */
	public function __construct()
	{
		parent::__construct('serverResponse');
	}
}
?>