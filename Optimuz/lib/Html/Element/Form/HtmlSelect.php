<?php
/**
 * This file sets a custom element using the Html.Component.HtmlComponent.
 * @version 0.1
 * @package Html
 * @subpackage Element
 */

/**
 * This element represents a select (combobox) element.
 * @author Diego Andrade
 * @package Html
 * @subpackage Element
 * @since Optimuz 0.4
 * @version 0.2
 * @uses Html
 * @uses Lang
 * @uses Strings.CamelCase
 * @uses Collection.ArrayList
 * @todo Implements support for optgroup when setting a source.
 */
class HtmlSelect extends HtmlElement implements IHtmlFormElement
{
	/**
	 * The given source is invalid (not an array or object).
	 */
	const INVALID_SOURCE			= 2100;

	/**
	 * The HtmlSelect::$sourceMemberName is missing.
	 */
	const MISSING_MEMBER_NAME		= 2101;

	/**
	 * The HtmlSelect::$sourceMemberValue is missing.
	 */
	const MISSING_MEMBER_VALUE		= 2102;

	/**
	 * The HtmlSelect::$sourceMemberText is missing.
	 */
	const MISSING_MEMBER_TEXT		= 2103;

	/**
	 * The HtmlSelect::$sourceMemberValue does not exist in the data source.
	 */
	const INVALID_MEMBER_VALUE		= 2105;

	/**
	 * Data source used to populate the element.
	 * @var mixed
	 * @see HtmlSelect::setSource()
	 * @see HtmlSelect::$sourceMemberValue
	 * @see HtmlSelect::$sourceMemberName
	 * @see HtmlSelect::$sourceMemberText
	 */
	protected $source				= null;

	/**
	 * Object's property used as the value attribute in the option elements.
	 *
	 * Is only used if the HtmlSelect::$source is an array of objects.
	 * @var string
	 * @see HtmlSelect::$source
	 * @see HtmlSelect::setSource()
	 * @see HtmlSelect::setSourceMemberValue()
	 */
	protected $sourceMemberValue	= null;

	/**
	 * Object's property used as the text displayed in the option elements.
	 *
	 * Is only used if the HtmlSelect::$source is an array of objects.
	 * @var string
	 * @see HtmlSelect::$source
	 * @see HtmlSelect::setSource()
	 * @see HtmlSelect::setSourceMemberText()
	 */
	protected $sourceMemberText		= null;

	/**
	 * Creates a new select element.
	 * @param mixed $source (optimal) Data source used to populate the
	 * element. It must be an array or an object.
	 *
	 * If it is an array it can be a single dimensional array, where the
	 * keys will be the values of the option elements and the array's values
	 * will be the option elements names. But if the array contains objects, so
	 * you must specify the HtmlSelect::$sourceMemberValue property, i.e.,
	 * the property's name that will be used as the option's value. In this case
	 * you also can set the properties HtmlSelect::$sourceMemberName and
	 * HtmlSelect::$sourceMemberText
	 *
	 * If it is an object all its properties will be iterated to populate the
	 * element. So its properties must be public and/or the object must
	 * implement the interface Iterator.
	 * @see HtmlSelect::setSource()
	 * @see HtmlSelect::bindSource()
	 * @see HtmlSelect::setSourceMemberValue()
	 * @see HtmlSelect::setSourceMemberName()
	 * @see HtmlSelect::setSourceMemberText()
	 */
	public function __construct($source = null)
	{
		parent::__construct('select');

		if($source)
			$this->setSource($source, false);
	}

	/**
	 * Sets the data source used to populate the element.
	 *
	 * After setting the source, you must call the method
	 * HtmlSelect::bindSource() to populate the element and have its child nodes
	 * available for manipulation.
	 * @param mixed $source (optimal) Data source used to populate the
	 * element. It must be an array or an object.
	 *
	 * If it is an array it can be a single dimensional array, where the
	 * keys will be the values of the option elements and the array's values
	 * will be the option elements names. But if the array contains objects, so
	 * you must specify the HtmlSelect::$sourceMemberValue property, i.e.,
	 * the property's name that will be used as the option's value. In this case
	 * you also can set the properties HtmlSelect::$sourceMemberName and
	 * HtmlSelect::$sourceMemberText
	 *
	 * If it is an object all its properties will be iterated to populate the
	 * element. So its properties must be public and/or the object must
	 * implement the interface Iterator.
	 * @see HtmlSelect::bindSource()
	 */
	public function setSource($source)
	{
		$this->source = $source;
	}

	/**
	 * Returns the source used to populate the element. The source is an array
	 * or an object or null, if not set.
	 * @return mixed
	 * @see HtmlSelect::setSource()
	 * @see HtmlSelect::bindSource()
	 * @see HtmlSelect::$source
	 */
	public function getSource()
	{
		return $this->source;
	}

	/**
	 * Populates the element with the data from the predefined source.
	 *
	 * If the source is not valid or one of the required source members was not
	 * specified, a HtmlError will be thrown.
	 * @param bool $removeChildren (optimal) If is true and the elment has
	 * children these children will be removed. Otherwise the new children will
	 * be appended after the current children. Default is true.
	 * @see HtmlSelect::setSource()
	 * @see HtmlSelect::getSource()
	 */
	public function bindSource($removeChildren = true)
	{
		if(is_array($this->source) || is_object($this->source))
		{
			if($removeChildren && $this->hasChildNodes())
			{
				foreach($this->childNodes as $child)
					$this->removeChild($child);
			}

			foreach($this->source as $i => $data)
			{
				$value = null;
				$text = null;

				if(is_object($data))
				{
					if(isset($this->sourceMemberValue))
					{
						$memberValue = $this->sourceMemberValue;
						$methodName = 'get' . CamelCase::toUpper($memberValue);

						if(method_exists($data, $methodName))
							$value = $data->$methodName();
						elseif(method_exists($data, $memberValue))
							$value = $data->$memberValue();
						elseif(property_exists($data, $memberValue))
							$value = $data->$memberValue;
						elseif(isset($data[$memberValue])) // objects with magic methods
							$value = $data[$memberValue];
						else
							throw new HtmlError(Language::getInstance('Html')->getSentence('error.invalidMemberValue'), self::INVALID_MEMBER_VALUE);
					}
					else
					{
						$value = $i;
						//throw new HtmlError($this->lang->getSentence('error.missingMemberValue'), self::MISSING_MEMBER_VALUE);
					}

					if(isset($this->sourceMemberText))
					{
						$memberText = $this->sourceMemberText;
						$methodName = 'get' . CamelCase::toUpper($memberText);

						if(method_exists($data, $methodName))
							$text = $data->$methodName();
						elseif(method_exists($data, $memberText))
							$text = $data->$memberText();
						elseif(property_exists($data, $memberText))
							$text = $data->$memberText;
						elseif(isset($data[$memberText])) // objects with magic methods
							$text = $data[$memberText];
					}
					else
					{
						$text = $value;
					}
				}
				elseif(is_array($data))
				{
					if(isset($this->sourceMemberValue))
					{
						if(isset($data[$this->sourceMemberValue]))
							$value = $data[$this->sourceMemberValue];
						else
							throw new HtmlError(Language::getInstance('Html')->getSentence('error.invalidMemberValue'), self::INVALID_MEMBER_VALUE);
					}
					else
					{
						$value = $i;
						//throw new HtmlError($this->lang->getSentence('error.missingMemberValue'), self::MISSING_MEMBER_VALUE);
					}

					if(isset($this->sourceMemberText))
					{
						if(isset($data[$this->sourceMemberText]))
							$text = $data[$this->sourceMemberText];
					}
					else
					{
						$text = $value;
					}
				}
				else
				{
					$value = $i;
					$text = $data;
				}

				$this->addOption($value, $text);
			}
		}
		else
		{
			throw new HtmlError(Language::getInstance('Html')->getSentence('error.invalidSource'), self::INVALID_SOURCE);
		}
	}

	/**
	 * Sets the name of the object's member used as value in the option
	 * elements.
	 * @param mixed $memberName Name of an object's member (public property or
	 * method).
	 * @see HtmlSelect::$sourceMemberValue
	 */
	public function setSourceMemberValue($memberName)
	{
		$this->sourceMemberValue = $memberName;
	}

	/**
	 * Sets the name of the object's member used as text in the option
	 * elements.
	 * @param mixed $memberName Name of an object's member (public property or
	 * method).
	 * @see HtmlSelect::$sourceMemberText
	 */
	public function setSourceMemberText($memberName)
	{
		$this->sourceMemberText = $memberName;
	}

	/**
	 * Adds an option elmenent and returns it.
	 * @param string $value The 'value' attribute.
	 * @param string $text (optimal) The text to display as the option text. If
	 * this parameter is not given then the $value will be used. And if the
	 * $value is not given too, then the name will be used.
	 * @param bool $selected (optimal) If is true the option will be marked as
	 * selected. Default is false.
	 * @return HtmlElement
	 */
	public function addOption($value, $text = null, $selected = false)
	{
		$option = new HtmlElement('option');
		$this->appendChild($option);

		$option->setAttribute('value', (string)$value);
		$option->appendChild(new HtmlText(isset($text) ? $text : $value));

		if($selected)
			$this->setSelected($option);

		return $option;
	}

	/**
	 * Removes the specified option.
	 *
	 * If no option is specified, all options will be removed.
	 * @param int|DOMElement $option (optimal) If it is an integer, this must
	 * be the index of the option to remove. Otherwise this paramter must be
	 * the option object itself.
	 */
	public function removeOption($option = null)
	{
		if($this->hasChildNodes())
		{
			if(isset($option))
			{
				if(is_numeric($option))
				{
					if(($child = $this->childNodes->item($option)))
						$this->removeChild($child);
				}
				elseif(is_object($option) && ($option instanceof DOMElement) && $option->parentNode)
				{
					if($option->parentNode->isSameNode($this))
						$this->removeChild($option);
					elseif($option->parentNode->parentNode && $option->parentNode->parentNode->isSameNode($this))
						$option->parentNode->removeChild($option);
				}
			}
			else
			{
				while($this->firstChild)
					$this->removeChild($this->firstChild);
			}
		}
	}

	/**
	 * Removes the option at the specified $index.
	 *
	 * Note that the index starts from zero.
	 * @param int $index Option's index.
	 */
	public function removeAtIndex($index)
	{
		if($this->hasChildNodes() && ($child = $this->childNodes->item($index)))
			$this->removeChild($child);
	}

	/**
	 * Sets the given option as selected.
	 *
	 * Returns the selected option.
	 * @param int|DOMElement $option If it is an integer, this must be the
	 * index of the option to set as selected. Otherwise this paramter must be
	 * the option object itself.
	 * @return HtmlElement
	 */
	public function setSelected($option)
	{
		if(is_numeric($option))
		{
			if($this->hasChildNodes() && ($child = $this->childNodes->item($option)) && ($child->nodeType == XML_ELEMENT_NODE))
			{
				$child->setAttribute('selected', 'selected');
				$option = $child;
			}
		}
		elseif(is_object($option) && $option instanceof DOMElement)
		{
			$option->setAttribute('selected', 'selected');
		}

		return $option;
	}

	/**
	 * Returns an array with the selected options. The array is returned with
	 * the indexes preserved.
	 *
	 * If none is selected, an empty array is returned.
	 * @return ArrayList
	 */
	public function getSelected()
	{
		$selectedArray = new ArrayList();

		if($this->hasChildNodes())
		{
			foreach($this->childNodes as $i => $option)
			{
				if(($option->nodeType == XML_ELEMENT_NODE) && $option->hasAttribute('selected'))
					$selectedArray[$i] = $option;
			}
		}

		return $selectedArray;
	}

	/**
	 * Returns the index of the selected option. If more then one option is
	 * selected, only the first is returned.
	 * @return int Zero-base index of the selected option.
	 */
	public function getSelectedIndex()
	{
		$selectedIndex = -1;

		if($this->hasChildNodes())
		{
			$i = -1;

			foreach($this->childNodes as $option)
			{
				if($option->nodeType == XML_ELEMENT_NODE)
				{
					$i++;

					if($option->hasAttribute('selected'))
					{
						$selectedIndex = $i;
						break;
					}
				}
			}
		}

		if($selectedIndex == -1)
			$selectedIndex = 0;

		return $selectedIndex;
	}

	/**
	 * Sets the selected option by its value.
	 * @param mixed $value Option value.
	 */
	public function setValue($value)
	{
		if($this->hasChildNodes())
		{
			foreach($this->childNodes as $option)
			{
				if($option->nodeType == XML_ELEMENT_NODE)
				{
					if($option->hasAttribute('value') && ($option->getAttribute('value') == $value))
						$option->setAttribute('selected', 'selected');
					elseif($option->hasAttribute('selected') && !$this->hasAttribute('multiple'))
						$option->removeAttribute('selected');
				}
			}
		}
	}

	/**
	 * Returns the current value.
	 *
	 * If no option is selected, the value of the first option is returned.
	 * @return string|null
	 */
	public function getValue()
	{
		$value = null;

		if(($selected = $this->getSelected()->getFirst()))
			$value = Text::plain(urldecode($selected->hasAttribute('value') ? $selected->getAttribute('value') : $selected->firstChild->nodeValue));
		elseif($this->hasChildNodes())
			$value = Text::plain(urldecode($this->firstChild->hasAttribute('value') ? $this->firstChild->getAttribute('value') : $this->firstChild->firstChild->nodeValue));

		return $value;
	}

	/**
	 * Sets the select's name attribute.
	 * @param string $name Select's name.
	 */
	public function setName($name)
	{
		$this->setAttribute('name', $name);
	}

	/**
	 * Returns the select's name attribute.
	 * @return string
	 */
	public function getName()
	{
		return $this->getAttribute('name');
	}

	/**
	 * Sets whether the form element is disabled (disabled attribute).
	 * @param bool $disabled If is true then the element will be disabled.
	 * Otherwise it will be enabled.
	 */
	public function setDisabled($disabled)
	{
		if($disabled)
		{
			if(!$this->hasAttribute('disabled'))
				$this->setAttribute('disabled', 'disabled');
		}
		else
		{
			if($this->hasAttribute('disabled'))
				$this->removeAttribute('disabled');
		}
	}

	/**
	 * Returns whether the element is disabled.
	 * @return bool
	 */
	public function isDisabled()
	{
		return $this->hasAttribute('disabled');
	}

	/**
	 * Returns whether the element has some value.
	 * @return bool
	 */
	public function hasValue()
	{
		$value = $this->getValue();
		return is_string($value) && ($value !== '');
	}
}
?>