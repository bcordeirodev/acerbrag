<?php
/**
 * This file belongs to HTML package, that defines a simple way to build HTML
 * elements and components.
 * @version 1.0
 * @package Html
 * @subpackage Element
 */

/**
 * This is the base class for all (X)HTML elements and components in the
 * framework.
 *
 * It defines a very simple way to create elements that will be rendered by some
 * client.
 *
 * This class provides only basic tools for (X)HTML elements handling. If you
 * want to build complex structures, consider using the PHP DOM package.
 * @author Diego Andrade
 * @package Html
 * @subpackage Element
 * @since Optimuz 0.1
 * @version 1.1
 * @uses Html.Element.HtmlDocument
 * @uses Html.HtmlTranslator
 * @uses Strings.Text
 * @uses Core.Enviroment
 * @uses Core.Object
 * @uses Lang
 * @uses Configuration.LocalConfiguration
 * @todo Automatically convert elements to their specific classes.
 */
class HtmlElement extends HtmlEvent
{
	/**
	 * Could not parse the HTML string.
	 */
	const HTML_PARSE_ERROR				= 2110;

	/**
	 * Instance ID. This ID is used only to reference the object in the view. It
	 * is not displayed in the resulting HTML.
	 *
	 * This is not the HTML id attribute. To set the id attribute use the method
	 * HtmlElement::setAttribute().
	 * @var string
	 */
	protected $id						= null;

	/**
	 * Whether to format getHtml string. Default is false.
	 * @var bool
	 * @see HtmlElement::getHtml()
	 * @see HtmlElement::setFormatOutput()
	 * @see HtmlElement::getFormatOutput()
	 */
	protected $formatOutput				= null;

	/**
	 * Array of converted elements.
	 * @var array
	 * @static
	 */
	protected static $converted			= array();

	/**
	 * Array of elements to hide.
	 * @var array
	 * @static
	 * @see HtmlElement::$hide
	 */
	protected static $hiddenElements	= array();

	/**
	 * Creates a new instance of the class.
	 *
	 * Objects of this class can be referenced in the view through the ID
	 * property.
	 *
	 * To reference an object in the view use the pattern ${html:ELEMENT_ID}
	 * where ELEMENT_ID is the ID you defined for the object through the method
	 * HtmlElement::setId().
	 * @param string $name Element name (tag name).
	 * @param string $value (optimal) Element value.
	 * @param string $namespace (optimal) Element namespace.
	 */
	public function __construct($name, $value = '', $namespace = null)
	{
		parent::__construct($name, $value, $namespace);
	}

	/**
	 * Initializes the initial setting of the element.
	 */
	protected function initialize()
	{
		parent::initialize();
		$this->formatOutput = false;
		$this->hidden = false;
		$this->events->add('create');
	}

	/**
	 * This is a factory method to create a new HtmlElmenent object.
	 * @param string $name Element name (tag name).
	 * @param string $value (optimal) Element value.
	 * @param string $namespace (optimal) Element namespace.
	 * @return HtmlElement
	 * @static
	 */
	public static function create($name, $value = '', $namespace = null)
	{
		$doc = HtmlDocument::getCommomDocument();

		if(Text::detectEncoding($name) != Text::UTF8)
			$name = Text::toUtf8($name);

		if(Text::detectEncoding($value) != Text::UTF8)
			$value = Text::toUtf8($value);

		if(isset($namespace) && Text::detectEncoding($namespace) != Text::UTF8)
			$namespace = Text::toUtf8($namespace);

		return isset($namespace) ? $doc->createElementNS($name, $namespace, $value) : $doc->createElement($name, $value);
	}

	/**
	 * Sets the element's ID.
	 *
	 * This ID is not rendered in the final HTML. It is used only to reference
	 * the object in the view.
	 * @param string $id New element's ID.
	 * @param bool $idAttribute (optimal) If is true the ID will be used as the
	 * id attribute and rendered in the HTML. Otherwise it will be used only to
	 * reference the object in the view. Default is false.
	 * @return HtmlElement Returns the current object.
	 */
	public function setId($id, $idAttribute = false)
	{
		$this->id = $id;
		$this->setAttribute('state-save', 'true');

		if($idAttribute)
			$this->setAttribute('id', $id);

		return $this;
	}

	/**
	 * Returns the element's ID.
	 * @return string
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Sets whether the getHtml string must be formatted.
	 * @param bool $format True to format, false to do nothing.
	 * @return HtmlElement Returns the current object.
	 * @see HtmlElement::getHtml()
	 * @see HtmlElement::getFormatOutput()
	 */
	public function setFormatOutput($format)
	{
		$this->formatOutput = $format;
		return $this;
	}

	/**
	 * Returns whether the getHtml string must be formatted.
	 * @return bool
	 * @see HtmlElement::getHtml()
	 * @see HtmlElement::setFormatOutput()
	 */
	public function getFormatOutput()
	{
		return $this->formatOutput;
	}

	/**
	 * Returns the complete outer HTML of the element, with state properties.
	 * @param bool $innerHtml (optional) If is true only the inner HTML is
	 * returned. Default is false.
	 * @return string
	 */
	protected function getCompleteHtml($innerHtml = false)
	{
		$doc = HtmlDocument::createHtmlDocument();

		if($innerHtml)
		{
			foreach($this->childNodes as $child)
				$doc->appendChild($doc->importNode($child, true));
		}
		else
		{
			$doc->appendChild($doc->importNode($this, true));
		}

		$doc->formatOutput = $this->formatOutput;
		//return HtmlDocument::getMarkup() == HtmlDocument::MARKUP_HTML ? $doc->saveHTML() : end((explode("\n", $doc->saveXML(), 2)));
		return Text::replace('#<(br|img|meta|link|base|input|hr|iframe|param)([^>]+)>#mi', '<$1$2 />', $doc->saveHTML());
	}

	/**
	 * Returns the inner HTML of the element, without state properties.
	 * @return string
	 */
	public function getInnerHtml()
	{
		$html = $this->getCompleteHtml(true);
		return Text::remove(HtmlState::REGEX_PROPRIETARY_ATTRIBUTES, $html);
	}

	/**
	 * Returns the complete outer HTML of the element, without state properties.
	 * @return string
	 */
	public function getHtml()
	{
		$html = $this->getCompleteHtml();
		return Text::remove(HtmlState::REGEX_PROPRIETARY_ATTRIBUTES, $html);
	}

	/**
	 * Returns the complete outer HTML of the element. This is the same as
	 * calling HtmlElement::getHtml().
	 * @return string
	 * @see HtmlElement::getHtml()
	 */
	public function __toString()
	{
		return $this->getHtml();
	}

	/**
	 * Executes a XPath query on the element and returns its result.
	 *
	 * Always returns a DOMNodeList object.
	 * @param string $path A XPath string.
	 * @param string $htmlElementClass (optimal) Name of the class used as type
	 * of the returned elements.
	 * @return HtmlElementList
	 */
	public function xpath($path, $htmlElementClass = null)
	{
		$doc = null;
		$hasDoc = isset($this->ownerDocument);

		if(!$hasDoc)
		{
			$doc = new HtmlDocument();
			$doc->appendChild($doc->importNode($this, true));
		}
		else
		{
			$doc = $this->ownerDocument;
		}

		if($htmlElementClass)
			$doc->registerNodeClass('DOMElement', $htmlElementClass);

		if($path{0} != '.')
			$path = ".$path";

		$xpath = new DOMXPath($doc);
		$results = $xpath->query($path, $this);

		if(!$hasDoc)
			$doc->removeChild($this);

		$doc->registerNodeClass('DOMElement', 'HtmlElement');
		return new HtmlElementList($results);
	}

	/**
	 * Converts the current element to another type and returns it.
	 *
	 * The element of the new type replaces the old one into the DOM tree.
	 * @param string $typo New element type.
	 * @return mixed
	 */
	public function toType($typo)
	{
		$element = $this;
		$convert = true;

		if(!$this->isSameType($typo))
		{
			if($this->hasAttribute('state-convertid'))
				$convert = !isset(self::$converted[$this->getAttribute('state-convertid')]);

			if($convert)
			{
				$this->ownerDocument->registerNodeClass('DOMElement', $typo);
				$clone = $this->cloneNode(true);
				$this->ownerDocument->registerNodeClass('DOMElement', 'HtmlElement');
				$clone->initializeProperties();
				$clone->recoverState();
				$p = $this->parentNode;

				if(isset($p) && ($p->nodeType == XML_ELEMENT_NODE))
					$p->replaceChild($clone, $this);

				$element = $clone;
				$convertId = uniqid(time());
				$element->setAttribute('state-convertid', $convertId);
				self::$converted[$convertId] = $element;
			}
			else
			{
				$element = self::$converted[$this->getAttribute('state-convertid')];
			}
		}

		return $element;
	}

	/**
	 * Returns whether the element was converted using the HtmlElement::toType()
	 * method.
	 * @return bool
	 */
	public function isConverted()
	{
		return $this->hasAttribute('state-convertid');
	}

	/**
	 * Returns the array of converted elements.
	 * @return array
	 * @static
	 */
	public static function getConvertedElements()
	{
		return self::$converted;
	}

	/**
	 * Initializes the especial attributes (object-*).
	 * @return HtmlElement Returns the current object.
	 */
	public function initializeProperties()
	{
		if(!empty($this->attributes))
		{
			$attributes = $this->attributes;

			foreach($attributes as $name => $value)
			{
				if(Text::find('object-', $name))
				{
					$value = $value->nodeValue;
					$methodName = 'set' . CamelCase::toUpper(Text::split('-', $name, 2)->getLast());

					if(method_exists($this, $methodName) && ($methodName != 'setId') && ($methodName != 'setType'))
						$this->$methodName($value);
				}
			}
		}

		return $this;
	}

	/**
	 * Sets the custom properties of object.
	 * @return HtmlElement Returns the current object.
	 */
	public function recoverState()
	{
		if(!$this->isRecovered())
		{
			parent::recoverState();

			if(!$this->initialized)
				$this->initialize();
		}

		return $this;
	}

	/**
	 * Loads HTML content into the element.
	 *
	 * It uses the encoding from page.charset to properly encode the string.
	 *
	 * Previous content is NOT removed.
	 * @param string $html HTML to load.
	 * @return HtmlElement Returns the current object.
	 * @deprecated since version 0.4b Use HtmlElement::append() instead.
	 */
	public function loadHtml($html)
	{
		$this->append($html);
		return $this;
	}

	/**
	 * Append HTML content into the element.
	 *
	 * In the case it is a string, the method uses the encoding from
	 * page.charset to properly encode it.
	 *
	 * Previous content is NOT removed.
	 * @param mixed $html HTML string, HtmlElement object or HtmlElementList
	 * object.
	 * @return HtmlElement Returns the current object.
	 */
	public function append($html)
	{
		$elements = $this->htmlToObject($html);

		if(Object::isType($elements, 'HtmlElementList'))
		{
			foreach($elements as $element)
				$this->appendChild($element);
		}
		else
		{
			$this->appendChild($elements);
		}

		return $this;
	}

	/**
	 * Prepend HTML content into the element.
	 *
	 * In the case it is a string, the method uses the encoding from
	 * page.charset to properly encode it.
	 *
	 * Previous content is NOT removed.
	 * @param mixed $html HTML string, HtmlElement object or HtmlElementList
	 * object.
	 * @return HtmlElement Returns the current object.
	 */
	public function prepend($html)
	{
		$firstChild = $this->firstChild;

		if(empty($firstChild))
		{
			$this->append($html);
		}
		else
		{
			$elements = $this->htmlToObject($html);

			if(Object::isType($elements, 'HtmlElementList'))
			{
				foreach($elements as $element)
					$firstChild->parentNode->insertBefore($element, $firstChild);
			}
			else
			{
				$firstChild->parentNode->insertBefore($elements, $firstChild);
			}
		}

		return $this;
	}

	/**
	 * Append HTML content into the element removing the previous content.
	 * @param string $html HTML to append.
	 * @return HtmlElement Returns the current object.
	 */
	public function html($html)
	{
		$this->clear();
		$this->append($html);
		return $this;
	}

	/**
	 * Append HTML content from a file into the element.
	 *
	 * Previous content is NOT removed.
	 * @param string $path Path to the HTML file to load.
	 * @return HtmlElement Returns the current object.
	 */
	public function loadHtmlFile($path)
	{
		if(File::exists($path))
		{
			$html = File::open($path)->read();
			$this->append($html);
		}
		else
		{
			throw new HtmlError(Language::getInstance('Html')->getSentence('element.html.loadError'), File::NOT_EXISTS);
		}

		return $this;
	}

	/**
	 * Removes all child nodes.
	 * @return HtmlElement Returns the current object.
	 */
	public function clear()
	{
		if($this->hasChildNodes())
		{
			while(!!$this->firstChild)
				$this->removeChild($this->firstChild);
		}

		return $this;
	}

	/**
	 * Hides the element (removes it from the document). This way it is not
	 * rendered with the final document HTML.
	 * @return HtmlElement Returns the current object.
	 */
	public function hide()
	{
		if($this->parentNode)
		{
			$id = uniqid(time(), true);
			$this->setAttribute('state-hidden-id', $id);
			self::$hiddenElements[$id] = (object)array(
				'parent' => $this->parentNode,
				'element' => $this
			);
			$this->parentNode->removeChild($this);
		}

		return $this;
	}

	/**
	 * Shows the element (includes it into the document).
	 *
	 * The element is only appended if it was previously hidden.
	 * @return HtmlElement Returns the current object.
	 */
	public function show()
	{
		if($this->hasAttribute('state-hidden-id'))
		{
			$id = $this->getAttribute('state-hidden-id');

			if(isset(self::$hiddenElements[$id]))
			{
				$parent = self::$hiddenElements[$id]->parent;
				$parent->appendChild($this);
				unset(self::$hiddenElements[$id]);
				$this->removeAttribute('state-hidden-id');
			}
		}

		return $this;
	}

	/**
	 * Returns the array of hidden elements.
	 * @return array
	 * @static
	 */
	public static function getHiddenElements()
	{
		return self::$hiddenElements;
	}

	/**
	 * Removes the element from the DOM tree.
	 * @return HtmlElement Returns the removed element.
	 */
	public function remove()
	{
		return $this->parentNode->removeChild($this);
	}

	/**
	 * Replaces the element with a new one.
	 * @param mixed $html HTML string, HtmlElement object or HtmlElementList
	 * object.
	 * @return mixed Returns the replaced element. If the replaced element
	 * resolves to more then one element, then an <code>HtmlElementList</code>
	 * objet is returned.
	 */
	public function replaceBy($html)
	{
		$elements = $this->htmlToObject($html);

		if(Object::isType($elements, 'HtmlElementList'))
		{
			foreach($elements as $element)
				$this->parentNode->replaceChild($element, $this);
		}
		else
		{
			$this->parentNode->replaceChild($elements, $this);
		}

		return $elements;
	}

	/**
	 * Inserts the new element before the current.
	 * @param mixed $html HTML string, HtmlElement object or HtmlElementList
	 * object.
	 * @return HtmlElement Returns the current object.
	 */
	public function before($html)
	{
		$elements = $this->htmlToObject($html);

		if(Object::isType($elements, 'HtmlElementList'))
		{
			foreach($elements as $element)
				$this->parentNode->insertBefore($element, $this);
		}
		else
		{
			$this->parentNode->insertBefore($elements, $this);
		}

		return $this;
	}

	/**
	 * Inserts the new element after the current.
	 * @param mixed $html HTML string, HtmlElement object or HtmlElementList
	 * object.
	 * @return HtmlElement Returns the current object.
	 */
	public function after($html)
	{
		$elements = $this->htmlToObject($html);

		if(Object::isType($elements, 'HtmlElementList'))
		{
			$last = $this;

			foreach($elements as $element)
				$last = $last->nextSibling ? $last->parentNode->insertBefore($element, $last->nextSibling) : $last->parentNode->appendChild($element);
		}
		else
		{
			$this->nextSibling ? $this->parentNode->insertBefore($elements, $this->nextSibling) : $this->parentNode->appendChild($elements);
		}

		return $this;
	}

	/**
	 * Add a new class into the current list of CSS classes. If the class is
	 * already present nothing is changed.
	 * @param string $className A CSS class name.
	 * @return HtmlElement Returns the current object.
	 */
	public function addCssClass($className)
	{
		$currentClass = $this->getAttribute('class');
		$newClass = '';

		if(!empty($currentClass))
		{
			if(!preg_match("#\b{$className}\b#i", $currentClass))
				$newClass = "$currentClass $className";
			else
				$newClass = $currentClass;
		}
		else
		{
			$newClass = $className;
		}

		$this->setAttribute('class', $newClass);
		return $this;
	}

	/**
	 * Remove a class from the current list of CSS classes. If the class is
	 * not present nothing is changed.
	 * @param string $className A CSS class name.
	 * @return HtmlElement Returns the current object.
	 */
	public function removeCssClass($className)
	{
		$currentClass = $this->getAttribute('class');

		if(!empty($currentClass))
		{
			$newClass = preg_replace("#\b{$className}\b#i", '', $currentClass);
			$this->setAttribute('class', preg_replace("#\s{2,}#", ' ', $newClass));
		}

		return $this;
	}

	/**
	 * Remove a class from the current list of CSS classes. If the class is
	 * not present nothing is changed.
	 * @param string $className A CSS class name.
	 * @retrun boolean True if the class is present, false otherwise.
	 */
	public function hasCssClass($className)
	{
		return preg_match("#\b{$className}\b#i", $this->getAttribute('class')) === 1;
	}

	/**
	 * Add the CSS class if it is not present in the current list of CSS
	 * classes. Otherwise, remove it.
	 * @param string $className A CSS class name.
	 * @return HtmlElement Returns the current object.
	 */
	public function toggleCssClass($className)
	{
		if($this->hasCssClass($className))
			$this->removeCssClass($className);
		else
			$this->addCssClass($className);

		return $this;
	}

	/**
	 * Returns a list of all previous elements. Only the Element nodes are
	 * returned by this function. Text nodes and other types are ignored.
	 *
	 * If there is no previous siblings, an empty list is returned.
	 * @return HtmlElementList List of the previous elements.
	 */
	public function getPreviousSiblings()
	{
		$current = $this;
		$siblings = array();

		while(($current = $current->previousSibling))
		{
			if($current->nodeType == 1)
				$siblings[] = $current;
		}

		return new HtmlElementList($siblings);
	}

	/**
	 * Returns a list of all next elements. Only the Element nodes are
	 * returned by this function. Text nodes and other types are ignored.
	 *
	 * If there is no next siblings, an empty list is returned.
	 * @return HtmlElementList List of the next elements.
	 */
	public function getNextSiblings()
	{
		$current = $this;
		$siblings = array();

		while(($current = $current->nextSibling))
		{
			if($current->nodeType == 1)
				$siblings[] = $current;
		}

		return new HtmlElementList($siblings);
	}

	/**
	 * Returns a list of all sibling elements. Only the Element nodes are
	 * returned by this function. Text nodes and other types are ignored.
	 *
	 * If there is no siblings, an empty list is returned.
	 * @return HtmlElementList List of sibling elements.
	 */
	public function getSiblings()
	{
		$prev = $this->getPreviousSiblings()->getIterator()->getArray();
		$next = $this->getNextSiblings()->getIterator()->getArray();

		return new HtmlElementList(array_merge($prev, $next));
	}

	/**
	 * Searchs the current element for elements that match the given CSS
	 * expression.
	 * @param string $cssExpression A valid CSS expression (can contain custom
	 * selectors from HtmlTranslator).
	 * @param string $htmlElementClass (optional) Name of the class used as type
	 * of the returned elements.
	 * @return HtmlElementList
	 * @uses HtmlTranslator
	 */
	public function find($cssExpression, $htmlElementClass = null)
	{
		return $this->xpath(HtmlTranslator::cssToXpath($cssExpression), $htmlElementClass);
	}

	/**
	 * Converts the given HTML into a HtmlElement or a HtmlElementList instance.
	 *
	 * Throws a HtmlError exception if any error occurs.
	 * @param mixed $html HTML string. If is given a HtmlElement object or a
	 * HtmlElementList object, no conversion will be made and the given object
	 * itself will be returned.
	 * @return mixed Returns an instance of the HtmlElement or HtmlElementList
	 * depending on the given HTML.
	 * @throws HtmlError
	 */
	protected function htmlToObject($html)
	{
		$doc = HtmlDocument::createHtmlDocument();
		$object = null;

		try
		{
			if(
				Object::isType($html, 'HtmlElement') || Object::isType($html, 'HtmlElementList') || Object::isType($html, 'HtmlText')
				|| Object::isType($html, 'DOMElement') || Object::isType($html, 'DOMNodeList') || Object::isType($html, 'DOMText')
			)
			{
				$object = $html;
			}
			else
			{
				if(!empty($html))
				{
					$hasHtmlTag = Text::find('<html', $html);

					if(!$hasHtmlTag)
					{
						$encoding = LocalConfiguration::get('page.charset');
						$html = "<?xml encoding='{$encoding}'?><html><head><meta http-equiv='Content-Type: text/html; charset={$encoding}'><title>Sample</title></head><body>{$html}</body></html>";
					}

					if($doc->loadContent($html))
					{
						if(!$hasHtmlTag)
						{
							$body = $doc->documentElement->lastChild;
							$list = array();

							foreach($body->childNodes as $node)
								$list[] = $this->ownerDocument->importNode($node, true);

							$object = count($list) > 1 ? new HtmlElementList($list) : $list[0];
						}
						else
						{
							$object = $this->ownerDocument->importNode($doc->documentElement, true);
						}
					}
					else
					{
						throw new HtmlError(Language::getInstance('Html')->getSentence('element.html.parseError'), self::HTML_PARSE_ERROR);
					}
				}
				else
				{
					$object = new HtmlText;
				}
			}
		}
		catch(Error $err)
		{
			throw new HtmlError($err, self::HTML_PARSE_ERROR);
		}

		return $object;
	}
}
?>