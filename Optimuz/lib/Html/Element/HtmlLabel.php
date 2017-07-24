<?php
/**
 * This file sets a custom element using the Html.Component.HtmlElement.
 * @version 0.1
 * @package Html
 * @subpackage Element
 */

/**
 * This element represents a <label>.
 * @author Diego Andrade
 * @package Html
 * @subpackage Element
 * @since Optimuz 0.4
 * @version 0.1
 */
class HtmlLabel extends HtmlElement
{
	/**
	 * Creates a new label element.
	 * @param string $text (optimal) Label's text.
	 * @param mixed $for (optimal) This parameter must be an input's ID or a
	 * HtmlElement object.
	 *
	 * If it is a string, it must be an ID of some form input. However, if it is
	 * a HtmlElement it must have the ID attribute specified. If it doesn't
	 * have, a new ID attribute will be set for the HtmlElement and used by the
	 * for attribute of this label.
	 * @see HtmlLabel::setFor()
	 * @see HtmlLabel::getFor()
	 */
	public function __construct($text = null, $for = null)
	{
		parent::__construct('label');

		if(isset($text))
			$this->appendChild(new HtmlText($text));

		if(isset($for))
			$this->setFor($for);
	}

	/**
	 * Sets the label's for attribute.
	 * @param string $for This parameter must be an input's ID or a HtmlElement
	 * object.
	 *
	 * If it is a string, it must be an ID of some form input. However, if it is
	 * a HtmlElement it must have the ID attribute specified. If it doesn't
	 * have, a new ID attribute will be set for the HtmlElement and used by the
	 * for attribute of this label.
	 */
	public function setFor($for)
	{
		if(is_string($for))
		{
			$this->setAttribute('for', $for);
		}
		elseif(is_object($for) && ($for instanceof HtmlElement))
		{
			if(!$for->hasAttribute('id'))
			{
				static $inputId = 0;
				$for->setAttribute('id', 'input_' . $inputId++);
			}

			$this->setAttribute('for', $for->getAttribute('id'));
		}
	}

	/**
	 * Returns the input's for attribute.
	 * @return string
	 */
	public function getFor()
	{
		return $this->getAttribute('for');
	}
}
?>