<?php
/**
 * This file belongs to HTML package, that defines a simple way to build HTML
 * elements and components.
 * @version 0.1
 * @package Component
 * @subpackage Form
 */

/**
 * This class is used to build HTML text inputs of form elements.
 * @author Diego Andrade
 * @package Component
 * @subpackage Form
 * @since Optimuz 0.4
 * @version 0.1
 */
class InputText extends HtmlInput
{
	/**
	 * Creates a new text input element.
	 * @param string $name (optimal) Input's name (name attribute).
	 * @param mixed $value (optimal) Input's value (value attribute).
	 */
	public function __construct($name = null, $value = null)
	{
		parent::__construct('text', $name, $value);
	}
}
?>