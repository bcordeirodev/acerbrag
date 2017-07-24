<?php
/**
 * This file belongs to HTML package, that defines a simple way to build HTML
 * elements and components.
 * @version 0.5
 * @package Html
 * @subpackage Element
 */

/**
 * This class is used to persist the HtmlElement to the session.
 * @author Diego Andrade
 * @package Html
 * @subpackage Element
 * @since Optimuz 0.4
 * @version 0.2
 * @uses Html.Element.HtmlDocument
 * @uses Configuration.LocalConfiguration
 * @uses Session
 * @uses Http.CurrentHttpRequest
 */
class HtmlState extends DOMElement
{
	/**
	 * The method/property is invalid.
	 */
	const INVALID_MEMBER				= 2109;

	/**
	 * This regex identifies proprietary attributes like state-* and object-*.
	 */
	const REGEX_PROPRIETARY_ATTRIBUTES	= '#\s+(?:state|object)-[-\w]+\s*=\s*("|\').*?\1#is';

	/**
	 * Array of HtmlState objects restored from session.
	 * @var array
	 * @static
	 */
	protected static $recovered			= array();

	/**
	 * Whether the element is already configured. The configuration is done once
	 * in the construct method.
	 * @var bool
	 */
	protected $initialized				= null;

	/**
	 * Array of properties that must not be saved into the session.
	 * @var array
	 */
	protected $notInSession				= null;

	/**
	 * Creates a new instance of the class.
	 *
	 * The HtmlState::$saveState is set to false when this constructor is
	 * called.
	 * @param string $name Element name (tag name).
	 * @param string $value (optimal) Element value.
	 * @param string $namespace (optimal) Element namespace.
	 */
	public function __construct($name, $value = '', $namespace = null)
	{
		parent::__construct($name, $value, $namespace);

		if(!isset($this->ownerDocument))
			HtmlDocument::getCommomDocument()->appendChild($this);

		$this->initialize();
	}

	/**
	 * Initializes the initial setting of the element.
	 */
	protected function initialize()
	{
		if(!$this->initialized)
		{
			$this->initialized = true;
			$this->notInSession = array();
		}
	}

	/**
	 * Checks whether an HtmlState with the given $elementId is saved into the
	 * current session.
	 * @param string $elementId HtmlState ID.
	 * @return bool
	 * @static
	 */
	public static function exists($elementId)
	{
		return !HtmlDocument::getCommomDocument()->xpath('.//*[@object-id="' . $elementId . '"]')->isEmpty();
	}
	
	/**
	 * Returns the class name of this object, e.g. HtmlElement.
	 * @return string Class name of the object.
	 */
	public function getClassName()
	{
		return get_class($this);
	}
	
	/**
	 * Checks whether the element is of the given type.
	 * @param string $typo Target type to check.
	 * @return boolean Returns true if the element is of the same type, of false
	 * otherwise.
	 */
	public function isSameType($typo)
	{
		return $this->getClassName() == $typo;
	}

	/**
	 * Checks whether this HtmlState element is saved into the current session.
	 * @return bool
	 */
	public function isSaved()
	{
		return $this->hasAttribute('state-classname');
	}

	/**
	 * Checks whether this HtmlState element is recorved from the current
	 * session.
	 * @return bool
	 */
	public function isRecovered()
	{
		return $this->hasAttribute('state-recovered');
	}

	/**
	 * Checks whether this HtmlState element can be recorved from the current
	 * session.
	 *
	 * The element can be recovered only if it was saved previously.
	 * @return bool
	 */
	public function canRecover()
	{
		return $this->hasAttribute('state-classname') && $this->hasAttribute('object-id');
	}

	/**
	 * Sets whether the HtmlState is to be saved to the session.
	 * @param bool $saveState If this is true, the object will be saved.
	 * Otherwise it will not be saved.
	 */
	public function setSaveState($saveState)
	{
		if($saveState)
			$this->setAttribute('state-save', 'true');
		else
			$this->removeAttribute('state-save');
	}

	/**
	 * Returns whether the HtmlState will be saved into the sesssion.
	 * @return bool
	 */
	public function isSaveState()
	{
		return $this->hasAttribute('state-save');
	}

	/**
	 * Saves the HtmlState to the session.
	 *
	 * The key used to identify this object in the session is its ID
	 * (HtmlElement::$id).
	 * @see HtmlElement::$id
	 */
	public function save()
	{
		if(LocalConfiguration::get('htmlElements.session.saveState.enable'))
		{
			// remove object-* properties
			if(!$this->hasAttribute('state-classname'))
			{
				$attributes = array();
				$i = -1;

				while(($node = ($this->attributes->item(++$i))))
				{
					$name = $node->nodeName;

					if(Text::find('object-', $name))
					{
						if(($name != 'object-type') && ($name != 'object-id') && ($name != 'object-oncreate'))
							$attributes[] = $name;
					}
				}

				for($i = 0; $i < count($attributes); $i++)
					$this->removeAttribute($attributes[$i]);
			}

			// add state attributes
			foreach($this as $name => $value)
			{
				if((is_array($this->notInSession)) && !in_array($name, $this->notInSession))
					$this->setAttribute('state-' . CamelCase::toDashes($name), base64_encode(serialize($value)));
			}

			$this->setAttribute('state-classname', $this->getClassName());
			$this->removeAttribute('state-recovered');
			$this->removeAttribute('state-convertid');
		}
	}

	/**
	 * Returns a HtmlState saved in the session.
	 *
	 * If there is no element saved or if there is no element saved with the
	 * given ID, a null value is returned.
	 * @param string $elementId HtmlState's ID.
	 * @return HtmlElement|null
	 */
	public static function recover($elementId)
	{
		$element = null;

		if(!isset(self::$recovered[$elementId]))
		{
			$doc = HtmlDocument::getCommomDocument();
			$result = $doc->xpath('.//*[@object-id="' . $elementId . '"]');

			if(!$result->isEmpty())
			{
				$element = $result->item(0);
				$className = $element->getObjectClassName();

				if(!empty($className) && !$element->isSameType($className))
					$element = $element->toType($className);
				elseif(!$element->isRecovered())
					$element->recoverState();

				self::$recovered[$elementId] = $element;
			}
		}
		else
		{
			$element = self::$recovered[$elementId];
		}

		return $element;
	}

	/**
	 * Sets the custom properties of the object.
	 */
	public function recoverState()
	{
		foreach($this->attributes as $name => $value)
		{
			if(Text::find('state-', $name))
			{
				if(preg_match('/state-(?:classname|save)/', $name) != 1)
				{
					$property = CamelCase::toLower(Text::remove('state-', $name));

					if(property_exists($this, $property))
					{
						if(!isset($this->$property))
						{
							$this->$property = unserialize(base64_decode($value->value));
						}
					}
				}
			}
		}

		$this->setAttribute('state-recovered', (int)$this->getAttribute('state-recovered') + 1);
	}

	/**
	 * Returns the element's class name saved into the session. If the element
	 * is not saved into the session a null value is returned.
	 * @return string|null
	 */
	public function getObjectClassName()
	{
		return $this->hasAttribute('state-classname') ? $this->getAttribute('state-classname') : null;
	}
}
?>