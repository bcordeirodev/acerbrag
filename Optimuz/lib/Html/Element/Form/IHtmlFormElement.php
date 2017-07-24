<?php
/**
 * This file belongs to HTML package, that defines a simple way to build HTML
 * elements and components.
 * @version 0.1
 * @package Html
 * @subpackage Element
 */

/**
 * This interface provides commom methods for form elements such as, input,
 * textarea and select.
 * @author Diego Andrade
 * @package Html
 * @subpackage Element
 * @since Optimuz 0.4
 * @version 0.2
 */
interface IHtmlFormElement
{
	/**
	 * Sets the form element's name attribute.
	 * @param string $name Form element's name.
	 */
	public function setName($name);

	/**
	 * Returns the form element's name attribute.
	 * @return string
	 */
	public function getName();

	/**
	 * Sets the form element's value.
	 * @param string $value Form element's value.
	 */
	public function setValue($value);

	/**
	 * Returns the form element's value.
	 * @return string
	 */
	public function getValue();

	/**
	 * Sets whether the form element is disabled (disabled attribute).
	 * @param bool $disabled If is true then the element will be disabled.
	 * Otherwise it will be enabled.
	 */
	public function setDisabled($disabled);

	/**
	 * Returns whether the element is disabled.
	 * @return bool
	 */
	public function isDisabled();

	/**
	 * Returns whether the element has some value.
	 * @return bool
	 */
	public function hasValue();
}
?>