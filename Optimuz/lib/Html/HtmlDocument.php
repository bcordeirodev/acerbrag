<?php
/**
 * This file belongs to HTML package, that defines a simple way to build HTML
 * elements and components.
 * @version 0.2
 * @package Html
 * @subpackage Element
 */

/**
 * This class is extends the DOMDocument class to provide additional methods
 * for creating HTML elements in a easy way. It adds some static methods used
 * to manage the conversation between controllers and views.
 * @author Diego Andrade
 * @package Html
 * @subpackage Element
 * @since Optimuz 0.4
 * @version 0.7
 * @uses Html.Element.HtmlElement
 * @uses Lang
 * @uses Configuration.LocalConfiguration
 */
class HtmlDocument extends DOMDocument
{
	/**
	 * Markup used is HTML.
	 */
	const MARKUP_HTML					= 'html';

	/**
	 * Markup used is XHTML.
	 */
	const MARKUP_XHTML					= 'xhtml';

	/**
	 * An invalid markup was set.
	 */
	const INVALID_MARKUP				= 2104;

	/**
	 * Whether the document was recovered from cache.
	 * @var bool
	 */
	protected $cached					= null;

	/**
	 * Commom DOMDocument instance used to store all HtmlElements created during
	 * the script runtime. This is need to avoid erros when adding or modifying
	 * elements. This document is not used to anything else.
	 * @var DOMDocument
	 * @static
	 */
	protected static $doc				= null;

	/**
	 * Markup used to render the elemnts. Can be HtmlDocument::MARKUP_XHTML or
	 * HtmlDocument::MARKUP_HTML. Default is HtmlDocument::MARKUP_XHTML.
	 * @var string
	 * @static
	 * @see HtmlDocument::MARKUP_HTML
	 * @see HtmlDocument::MARKUP_XHTML
	 * @see HtmlDocument::setMarkup()
	 * @see HtmlDocument::getMarkup()
	 */
	protected static $markup			= self::MARKUP_XHTML;

	/**
	 * Creates a new HtmlDocument instance with the given settings.
	 * @param string $version Document version defined in XML.
	 * @param string $encoding Document encoding.
	 */
	public function __construct($version = '', $encoding = '')
	{
		if(empty($encoding))
			$encoding = LocalConfiguration::get('page.charset');

		parent::__construct($version, $encoding);
		$this->registerNodeClass('DOMElement', 'HtmlElement');
		$this->registerNodeClass('DOMText', 'HtmlText');
		$this->cached = false;
		$this->formatOutput = !LocalConfiguration::get('performance.minify.enable');
	}

	/**
	 * This is a factory method to create a new HtmlDocument object.
	 * @param string $version (optimal) Document's verion. Default is 1.0.
	 * @param string $encoding (optimal) Document's encoding, such as ISO-8859-1
	 * or UTF-8.
	 * @return HtmlDocument
	 * @static
	 */
	public static function createHtmlDocument($version = '1.0', $encoding = null)
	{
		return new self($version, $encoding);
	}

	/**
	 * Sets the markup used to render the elements.
	 *
	 * If an invalid markup is given an HtmlError is thrown.
	 * @param string $markup One of the constants: HtmlDocument::MARKUP_HTML or
	 * HtmlDocument::MARKUP_XHTML.
	 * @static
	 * @see HtmlDocument::MARKUP_HTML
	 * @see HtmlDocument::MARKUP_XHTML
	 * @see HtmlDocument::$markup
	 * @see HtmlDocument::getMarkup()
	 */
	public static function setMarkup($markup)
	{
		if(($markup == HtmlDocument::MARKUP_HTML) || ($markup == HtmlDocument::MARKUP_XHTML))
			self::$markup = $markup;
		else
			throw new HtmlError(Language::getInstance('html')->getSentence('invalid.markup'));
	}

	/**
	 * Returns the markup used to render the elements.
	 * @return string
	 * @static
	 * @see HtmlDocument::MARKUP_HTML
	 * @see HtmlDocument::MARKUP_XHTML
	 * @see HtmlDocument::$markup
	 * @see HtmlDocument::setMarkup()
	 */
	public static function getMarkup()
	{
		return self::$markup;
	}

	/**
	 * Adds the element as child of the global DOMDocumentFragment.
	 *
	 * This is done to avoid errors and modifying the element.
	 * @param HtmlState $element HtmlElement object.
	 * @return HtmlElement
	 * @static
	 */
	public static function setHtmlElementParent(HtmlState $element)
	{
		$doc = self::getCommomDocument();
		$element = $doc->importNode($element, true);
		return $element;
	}

	/**
	 * Returns the global HtmlDocument instance.
	 * @return HtmlDocument
	 */
	public static function getCommomDocument()
	{
		if(is_null(self::$doc))
			self::$doc = new self();

		return self::$doc;
	}

	/**
	 * Executes a XPath query on the document and returns its result.
	 *
	 * Always returns a DOMNodeList object.
	 * @param string $path A XPath string.
	 * @param string $htmlElementClass (optional) Name of the class used as type
	 * of the returned elements.
	 * @return HtmlElementList
	 */
	public function xpath($path, $htmlElementClass = null)
	{
		if($htmlElementClass)
			$this->registerNodeClass('DOMElement', $htmlElementClass);

		$xpath = new DOMXPath($this);
		$results = $xpath->query($path);
		$this->registerNodeClass('DOMElement', 'HtmlElement');
		return new HtmlElementList($results);
	}

	/**
	 * Sets whether the document is cached.
	 * @param bool $isCached True if the document is cached, false otherwise.
	 */
	public function setIsCached($isCached)
	{
		$this->cached = $isCached;
	}

	/**
	 * Checks whether the document is cached.
	 * @return bool
	 */
	public function isCached()
	{
		return $this->cached;
	}

	/**
	 * Returns an HtmlElement with the given ID. This is a shorthand for
	 * HtmlDocument::getCommomDocument()->getElementById().
	 *
	 * If no element is found a null value is returned.
	 * @param string $id The element ID.
	 * @return HtmlElement|null
	 * @static
	 */
	public static function getById($id)
	{
		//return self::getCommomDocument()->getElementById($id);
		$result = self::getCommomDocument()->xpath('//*[@id="' . $id . '"]');
		return !$result->isEmpty() ? $result->item(0) : null;
	}

	/**
	 * Returns a DOMNodeList object with all elements with the given tag. This
	 * is a shorthand for
	 * HtmlDocument::getCommomDocument()->getElementsByTagName().
	 * @param string $tag The element tag.
	 * @return HtmlElementList
	 * @static
	 */
	public static function getByTag($tag)
	{
		return new HtmlElementList(self::getCommomDocument()->getElementsByTagName($tag));
	}

	/**
	 * Returns a DOMNodeList object with all elements with the given name
	 * attribute.
	 *
	 * The search is done using the global document
	 * (HtmlDocument::getCommomDocument()).
	 * @param string $name The value of the name attribute.
	 * @return HtmlElementList
	 * @static
	 */
	public static function getByName($name)
	{
		return self::getCommomDocument()->xpath('//*[@name="' . $name . '"]');
	}

	/**
	 * Returns a DOMNodeList object with all elements that have the given CSS
	 * class.
	 *
	 * The search is done using the global document
	 * (HtmlDocument::getCommomDocument()).
	 * @param string $class A CSS class.
	 * @return HtmlElementList
	 * @static
	 */
	public static function getByClass($class)
	{
		return self::getCommomDocument()->xpath('//*[@class*="' . $class . '"]');
	}

	/**
	 * Searchs the document for elements that match the given CSS expression.
	 * @param string $cssExpression A valid CSS expression (can contain custom
	 * selectors from HtmlTranslator).
	 * @param string $htmlElementClass (optional) Name of the class used as type
	 * of the returned elements.
	 * @return HtmlElementList
	 * @uses HtmlTranslator
	 * @static
	 */
	public static function find($cssExpression, $htmlElementClass = null)
	{
		return self::getCommomDocument()->xpath(HtmlTranslator::cssToXpath($cssExpression), $htmlElementClass);
	}

	/**
	 * Loads HTML into the document. This method uses the method
	 * DOMDocument::loadHTML() and can load HTML5 content.
	 *
	 * Returns true on success or false on errors.
	 * @param string $html HTML content.
	 * @return bool
	 * @todo Find a better way to load HTML5 content, since the libxml
	 * functions used here are available only after PHP 5.1
	 */
	public function loadContent($html)
	{
		if(function_exists('libxml_use_internal_errors'))
			libxml_use_internal_errors(true);

		//$success = $this->loadHTML(Text::remove('#[\r\t\n]#m', $html));
		$success = $this->loadHTML(mb_convert_encoding($html, Text::HTML));

		if(function_exists('libxml_clear_errors'))
			libxml_clear_errors();

		return $success;
	}

	/**
	 * Loads HTML from a file into the document. This method uses the method
	 * DOMDocument::loadHTMLFile() and can load HTML5 content.
	 *
	 * Returns true on success or false on errors.
	 * @param string $filePath Path to the HTML file.
	 * @return bool
	 * @todo Find a better way to load HTML5 content, since the libxml
	 * functions used here are available only after PHP 5.1
	 */
	public function loadFileContent($filePath)
	{
		if(function_exists('libxml_use_internal_errors'))
			libxml_use_internal_errors(true);

		//$success = $this->loadHTML(Text::remove('#[\r\t\n]#m', $html));
		$success = $this->loadHTMLFile($filePath);

		if(function_exists('libxml_clear_errors'))
			libxml_clear_errors();

		return $success;
	}
}
?>