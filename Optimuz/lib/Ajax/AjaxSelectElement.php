<?php
/**
 * This file belongs to the Ajax package and sets an element class that is used
 * to build responses to Ajax requests.
 * @version 0.1
 * @package Ajax
 */

/**
 * This class creates the select element <select> in the response.
 * @author Diego Andrade
 * @package Ajax
 * @since Optimuz 0.3
 * @version 0.3
 */
class AjaxSelectElement extends AjaxHtmlElement
{
	/**
	 * The element cannot be added to the AjaxSelectElement instance.
	 */
	const INVALID_ELEMENT_TYPE					= 403;

	/**
	 * Creates a new class instance.
	 *
	 * You have to add the <option> elements using the DOM methods inherited by
	 * this class.
	 * @param array|DOMNodeList $options (optimal) Collection of <option>
	 * elements to inset into the <select> element.
	 * 
	 * The <option> elements of this collection will be cloned and inserted into
	 * the <select> element.
	 * @param string $target (optimal) CSS expression indicating the path of the
	 * element that will be populated with the contents of this element.
	 */
	public function __construct($options = null, $target = null)
	{
		parent::__construct('select', null, $target);

		if(!is_null($options))
		{
			foreach($options as $option)
			{
				if(is_object($option))
				{
					if($option instanceof HtmlElement)
					{
						if($option->nodeType == XML_ELEMENT_NODE)
						{
							$clone = $option->cloneNode(true);
							$this->appendChild($clone);
						}
					}
					else
					{
						throw new AjaxError(Language::getCurrent()->getSentence('error.ajax.invalidElementType', get_class($element)), self::INVALID_ELEMENT_TYPE);
					}
				}
				elseif(is_scalar($option))
				{
					$obj = HtmlElement::create('option', $option);
					$this->appendChild($obj);
				}
			}
		}
	}
}
?>