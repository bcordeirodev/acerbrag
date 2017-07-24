<?php
/**
 * This file sets a class to work with site navigation.
 * @version 0.2
 * @package Navigation
 */

/**
 * This class provides information about the application navigation. With this
 * we can built a menu like "Home > Category > Subcategory > You are here".
 * @author Diego Andrade
 * @package Navigation
 * @since Optimuz 0.2
 * @version 0.3
 * @static
 * @uses Lang
 * @uses Core
 * @uses ArrayList
 * @uses Strings
 */
class SiteNavigationComponent extends HtmlComponent implements INavigationComponent
{
	/**
	 * The class was not initialized.
	 */
	const NOT_INITIALIZED					= 1900;

	/**
	 * This array has the links related to the requested URL.
	 * @var ArrayList
	 */
	protected $map							= null;

	/**
	 * Whether to include separators between items.
	 * @var bool true
	 */
	protected $includeItemSeparator			= true;

	/**
	 * Whether to include the application's base URL into the item's URL.
	 * @param bool true
	 */
	protected $includeAppBaseUrl		= true;

	/**
	 * Creates a new instance of the class.
	 */
	public function __construct()
	{
		parent::__construct('div');
	}

	/**
	 * Sets the links related to the requested URL.
	 *
	 * This method tries to load the site navigation XML file to parse the
	 * current URL. If the file cannot be loaded a eHtmlError will be thrown.
	 *
	 * After loading the XML file, the class will try to map the requested
	 * controller in the URL to a controller in the XML file. If the controller
	 * is matched, the links will be available to build the menu.
	 * @param string $url Requested URL.
	 * @param string $mapFile Name of XML file which contains the controlers'
	 * mapping. This file must to be located at
	 * /Optimuz/APPLICATION_NAME/config/. The file must to be
	 * given without the extension. Default is 'siteNavigation'.
	 */
	public function setLinks($url, $mapFile = 'siteNavigation')
	{
		$path = Application::getCurrent()->getPath('config') . "settings/{$mapFile}.xml";
		$this->map = new ArrayList();

		if(File::exists($path))
		{
			$doc = new Xml();

			if($doc->load($path))
			{
				$root = $doc->getElementsByTagName('navigation')->item(0);
				$this->includeAppBaseUrl = $root->getAttribute('includeAppBaseUrl') == 'true';
				$baseUrl = Application::getCurrent()->getBaseUrl();
				$url = Text::remove($baseUrl, $url);
				$parts = explode('/', Text::substring($url, 1));

				// get home link
				$xpath = "//link[@isHome='true']";
				$link = $doc->get($xpath);

				if($link->length > 0)
				{
					$link = $link->item(0);
					$this->map['home'] = (object)array(
						'label' => $link->getAttribute('label'),
						'title' => $link->getAttribute('title'),
						'url' => 'home',
						'isLink' => true,
						'isHome' => true,
						'includeHome' => $link->getAttribute('includeHome') == 'true'
					);
				}

				// get remaining links
				if(!preg_match('#^home(?:/index)?$#', $url))
				{
					$xpath = isset($parts[0]) ? "//link[@url='{$parts[0]}' or @url='/{$parts[0]}']" : "//link[@url='']";
					$link = $doc->get($xpath);

					if($link->length > 0)
					{
						$link = $link->item(0);
						$this->map[$parts[0]] = (object)array(
							'label' => $link->getAttribute('label'),
							'title' => $link->getAttribute('title'),
							'url' => $link->getAttribute('url'),
							'isLink' => true,
							'isHome' => false
						);
						$this->getChildren($link, $parts);
					}
				}

				// build the DOM tree
				$this->map->getLast()->isLink = false;
				$this->proccessLinks();
			}
			else
			{
				throw new HtmlError(Language::getInstance('Menu')->getSentence('error.loadError', $mapFile), Xml::LOAD_ERROR);
			}
		}
		else
		{
			throw new HtmlError(Language::getInstance('Menu')->getSentence('error.missingFile', $mapFile), File::NOT_EXISTS);
		}
	}

	/**
	 * Looks up the current element ($parent) to find children to build the
	 * navigation map.
	 * @param DOMElement $parent Current element of the XML configuration file.
	 * @param array $parts Informations about the requested URL.
	 * @return bool
	 */
	protected function getChildren($parent, $parts)
	{
		$success = false;

		if($parent->hasChildNodes())
		{
			$success = true;
			$children = $parent->childNodes;

			$i = 0;
			$total = count($parts);

			while(++$i < $total)
			{
				$part = $parts[$i];

				foreach($children as $child)
				{
					if($child->nodeType == 1 ? $child->getAttribute('url') == $part : false) // also could be CamelCase::toLowerCase($part)
					{
						$this->map[$part] = (object)array(
							'label' => $child->getAttribute('label'),
							'title' => $child->getAttribute('title'),
							'url' => $child->getAttribute('url'),
							'isLink' => true,
							'isHome' => false
						);

						$this->getChildren($child, $parts);
						break;
					}
				}
			}
		}

		return $success;
	}

	/**
	 * Adds a link to the navigation map.
	 *
	 * The class must be initialized by the SiteNavigation::setLinks() method,
	 * otherwise a HtmlError will be thrown.
	 * @param string $urlPart URL part.
	 * @param string $label The text displayed as link's text.
	 * @param string $title (optimal) Link title.
	 * @param string $url (optimal) Link URL.
	 * @param bool $isLink (optimal) Whether to render as link or just a text.
	 * Set to true to render as link. Default is false (render as text).
	 */
	public function addLink($urlPart, $label, $title = '', $url = null, $isLink = false)
	{
		if(ArrayList::isValid($this->map))
		{
			$this->map->getLast()->isLink = true;
			$this->map[$urlPart] = (object)array('label' => $label, 'title' => $title, 'url' => $url, 'isLink' => $isLink, 'isHome' => false);
		}
		else
		{
			throw new HtmlError(Language::getInstance('Menu')->getSentence('error.notInitialized'), self::NOT_INITIALIZED);
		}
	}

	/**
	 * Returns the map array related to the requested URL.
	 *
	 * If the class is not initialized a null value is returned.
	 * @return ArrayList
	 */
	public function getMapLinks()
	{
		return $this->map;
	}

	/**
	 * Proccess the mapped links creating the respective DOM tree. This DOM tree
	 * is appended as child of the SiteNavigationComponent.
	 *
	 * The DOM tree is like the following:
	 *
	 * <code>
	 * &lt;ul&gt;
	 * &lt;li class="home"&gt;
	 * &lt;a href="/" title=""&gt;Home&lt;/a&gt;
	 * &lt;/li&gt;
	 * &lt;li class="separator"&gt;&lt;/li&gt;
	 * &lt;li&gt;
	 * &lt;a href="/some/category" title="Some cagetory"&gt;Category&lt;/a&gt;
	 * &lt;/li&gt;
	 * &lt;li class="separator"&gt;&lt;/li&gt;
	 * &lt;li&gt;
	 * &lt;span title="Page title"&gt;Page name&lt;/span&gt;
	 * &lt;/li&gt;
	 * &lt;/ul&gt;
	 * </code>
	 */
	public function proccessLinks()
	{
		if(!$this->map->isEmpty())
		{
			if($this->hasChildNodes())
				$this->clear();

			$url = $this->includeAppBaseUrl ? Application::getCurrent()->getBaseUrl() : '';
			$this->appendChild(HtmlElement::create('ul'));

			foreach($this->map as $urlPart => $obj)
			{
				if($obj->isHome ? !$obj->includeHome : false)
				{
					$homeUrl = "$url/" . (isset($obj->url) && !empty($obj->url) ? $obj->url : $urlPart);
					$this->proccessLink($homeUrl, $obj);
				}
				else
				{
					$appendUrl = (isset($obj->url) && !empty($obj->url) ? $obj->url : $urlPart);
					$url .= !empty($appendUrl) && ($appendUrl{0} == '/') ? $appendUrl : "/$appendUrl";
					$this->proccessLink($url, $obj);
				}
			}
		}
	}

	/**
	 * Proccess a single item to decide what to append: a link or just a text.
	 * @param string $url The item's URL.
	 * @param object $linkObject The item object.
	 */
	protected function proccessLink($url, $linkObject)
	{
		$list = $this->firstChild;
		$label = Language::getInstance('Menu')->getSentence($linkObject->label);
		$title = Language::getInstance('Menu')->getSentence($linkObject->title);

		if($this->includeItemSeparator && !($list->hasChildNodes() && ($list->childNodes->length == 1) && ($list->firstChild->nodeName == '#text')))
		{
			$itemSeparator = HtmlElement::create('li');
			$itemSeparator->setAttribute('class', 'separator');
			$list->appendChild($itemSeparator);
		}

		$item = HtmlElement::create('li');
		$itemContent = null;

		if($linkObject->isLink)
		{
			$itemContent = new HtmlLink('a', $label);
			$itemContent->setUrl($url);
		}
		else
		{
			$itemContent = HtmlElement::create('span', $label);
		}

		$itemContent->setAttribute('title', $title);
		$item->appendChild($itemContent);
		$list->appendChild($item);
	}

	/**
	 * Sets whether separators must to be included between items.
	 * @param type $includeItemSeparator True to include separators or false
	 * otherwise.
	 */
	public function setIncludeSeparators($includeItemSeparator)
	{
		$this->includeItemSeparator = $includeItemSeparator;
	}

	/**
	 * Checks whether separators must to be included between items.
	 * @return bool
	 */
	public function isIncludeSeparators()
	{
		return $this->includeItemSeparator;
	}

	/**
	 * Sets whether to include the application's base URL into the item's URL.
	 * @param bool $includeAppBaseUrl If is true, the base URL of the
	 * application is included into the item's URL.
	 */
	public function setIncludeAppBaseUrl($includeAppBaseUrl)
	{
		$this->includeAppBaseUrl = $includeAppBaseUrl;
	}

	/**
	 * Returns whether to include the application's base URL into the item's
	 * URL.
	 * @return bool
	 */
	public function getIncludeAppBaseUrl()
	{
		return $this->includeAppBaseUrl;
	}
}
?>