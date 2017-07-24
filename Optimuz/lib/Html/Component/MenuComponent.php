<?php
/**
 * This file sets a custom component using the Html.Component.HtmlComponent.
 * @version 0.1
 * @package Html
 * @subpackage Component
 */

/**
 * Returns the HTML of a menu. This menu is built using a XML file located at
 * /Optimuz/config.
 * @author Diego Andrade
 * @package Html
 * @subpackage Component
 * @since Optimuz 0.3
 * @version 0.4
 * @uses Core.Enviroment
 * @uses Core.Xml
 * @uses Language
 * @uses Error
 * @uses Strings
 * @uses Configuration
 * @uses IO
 */
class MenuComponent extends HtmlComponent implements INavigationComponent
{
	/**
	 * Whether to include the application's base URL into the item's URL.
	 * @param bool true
	 */
	protected $includeAppBaseUrl		= true;

	/**
	 * The menu structure is built when the constructor is called.
	 * @param string $css (optimal) Path to menu's CSS file. This path is
	 * realtive to the CSS directory.
	 */
	public function __construct($css = null)
	{
		parent::__construct('div');

		if($css)
			Enviroment::getRequest()->getController()->getView()->addResource($css);
	}

	/**
	 * Initializes the initial setting of the element.
	 */
	protected function initialize()
	{
		parent::initialize();
		$this->setAttribute('class', 'menu');
	}

	/**
	 * Loads the menu's configuration file and builds the menu.
	 *
	 * This component can use language files to construct menus in many
	 * languages. To do so, you must create the a language file named Menu.lang
	 * in the application's lang directory
	 * (/Optimuz/apps/APPLICATION_NAME/lang/LANG_CODE/Menu.lang). An example of
	 * an english language file for this component is
	 * /Optimuz/apps/default/lang/en/Menu.lang.
	 * @param string $file The name of the XML file located at
	 * /Optimuz/apps/APPLICATION_NAME/config/, where
	 * APPLICATION_NAME is the name of the current application. You must give
	 * only the file name without the extension (.xml). Default is
	 * 'siteNavigation'.
	 */
	public function load($file = 'siteNavigation')
	{
		// basic structure
		$div = new HtmlElement('div');
		$this->appendChild($div);

		$list = new HtmlElement('ul');
		$div->appendChild($list);

		$xml = new Xml();

		try
		{
			if($xml->load(Application::getCurrent()->getPath('config') . "settings/{$file}.xml"))
			{
				$root = $xml->getElementsByTagName('navigation')->item(0);
				$this->includeAppBaseUrl = $root->getAttribute('includeAppBaseUrl') == 'true';
				$currentRole = SystemAccessLogin::hasSession() ? SystemAccessLogin::getCurrent()->getRole()->getName() : null;

				foreach($root->childNodes as $child)
				{
					if($child->nodeType == 1)
					{
						if(($item = $this->buildItem($child, false, null, $currentRole)))
							$list->appendChild($item);
					}
				}
			}
			else
			{
				$error = new Error(Language::getInstance('Menu')->getSentence('error.loadXML'), Xml::LOAD_ERROR);
				Report::sendError($error);
			}
		}
		catch(Exception $ex)
		{
			$error = new Error(Language::getInstance('Menu')->getSentence('error.parseXML', $ex->getMessage()), $ex->getCode());
			Report::sendError($error);
		}
	}

	/**
	 * Creates and returns a menu item.
	 *
	 * Only items marked with the mainMenu attribute set to true will be
	 * displayed in the menu. If this attribute is set to false or is not
	 * present, the item will not be displayed and a null value will be
	 * returned here.
	 * @param DOMElement $node An element with the needed attributes to build
	 * the item. This element comes from the XML menu file.
	 * @param bool $isSubMenu (optimal) Specifies if the current item is a
	 * subitem in the menu. Default is false.
	 * @param string $parentUrl (optimal) The URL of the parent item. Has effect
	 * only when the $isSubMenu parameter is set to true.
	 * @param string $userRole User role.
	 * @param bool $hasAccess Whether the user has access or not.
	 * @return null|HtmlElement
	 */
	protected function buildItem(DOMElement $node, $isSubMenu = false, $parentUrl = null, $userRole = null, $hasAccess = true)
	{
		$item = null;

		if($node->getAttribute('mainMenu') == 'true')
		{
			if(!empty($userRole))
			{
				$nodeAccess = $this->validateAccess($node, $userRole);

				if($hasAccess && !$nodeAccess) // controller has permisstion but method does not
					$hasAccess = false;
				elseif(!$hasAccess && $nodeAccess) // controller does not have permisstion method does
					$hasAccess = true;
				else
					$hasAccess = $nodeAccess;
			}

			// get the URL of $node
			$url = $this->getItemUrl($node, $isSubMenu, $parentUrl);

			// menu item
			if($hasAccess)
			{
				$item = HtmlElement::create('li');

				$link = new HtmlLink;
				$link->setAttribute('title', Language::getInstance('Menu')->getSentence($node->getAttribute('title')));
				$link->appendChild(new HtmlText(Language::getInstance('Menu')->getSentence($node->getAttribute('label'))));
				$item->appendChild($link);

				$link->setUrl($url);
			}

			// submenu
			if($node->hasChildNodes())
			{
				$emptyList = true;
				$list = HtmlElement::create('ul');

				foreach($node->childNodes as $child)
				{
					if($child->nodeType == 1)
					{
						if(($subItem = $this->buildItem($child, true, $url, $userRole, $hasAccess)))
						{
							$list->appendChild($subItem);
							$emptyList = false;
						}
					}
				}

				if(!$emptyList)
					$item->appendChild($list);
			}

			if($isSubMenu)
			{
				$span = HtmlElement::create('span');
				$item->appendChild($span);
			}
		}

		return $item;
	}

	/**
	 * Returns the HTML string of the menu.
	 * @return string
	 */
	public function getHtml()
	{
		$html = '';

		if(LocalConfiguration::get('performance.cache.enable'))
		{
			$path = Enviroment::getPath('cache') . 'menu.' . LocalConfiguration::get('page.language') . '.cache';

			if(File::exists($path))
			{
				$f = File::open($path);
				$html = $f->read();
				$f->close();
			}
			else
			{
				$html = parent::getHtml();
				$f = File::create($path);
				$f->write($html);
				$f->close();
			}
		}
		else
		{
			$html = parent::getHtml();
		}

		return $html;
	}

	/**
	 * Checks whether the item is allowed to the given role and permissions.
	 * @param DOMElement $item Item to check access.
	 * @param string $role User role.
	 * @return bool
	 * @todo If $item has no attribute systemAccessController, use its attribute
	 * url instead.
	 */
	protected function validateAccess(DOMElement $item, $role)
	{
		$hasAccess = false;

		if(!is_null($role))
		{
			// if set in the siteNavigation.xml, validate permissions
			if(($systemAccessPermissions = $item->getAttribute('systemAccessPermissions')))
			{
				if(Text::find('|', $systemAccessPermissions))
				{
					$groupPermissions = Text::split('#\s*\|\s*#', $systemAccessPermissions);

					foreach($groupPermissions as $permissions)
					{
						if(($hasAccess = SystemAccessManager::validatePermission(Text::split('#\s*,\s*#', $permissions))))
							break;
					}
				}
				else
				{
					$permissions = Text::split('#\s*,\s*#', $systemAccessPermissions);
					$hasAccess = SystemAccessManager::validatePermission($permissions);
				}
			}
			else
			{
				// otherwise validate permissions of the associated controller
				// (if any)
				if(($systemAccessController = $item->getAttribute('systemAccessController')))
				{
					$conf = SystemAccessManager::getConfiguration();
					$userRole = $conf->getRole($role);
					$itemAccess = $conf->getAccess($systemAccessController);

					// validate the given role
					$hasAccess = SystemAccessManager::validateRole($itemAccess['role'], $userRole->getId(), $conf->getValidationType());

					// validate the permissions of the given controller
					if(!$itemAccess['permissions']->isEmpty())
						$hasAccess = SystemAccessManager::validatePermission($itemAccess['permissions']);
				}
				else
				{
					$hasAccess = true;
				}
			}
		}
		else
		{
			$hasAccess = true;
		}

		return $hasAccess;
	}

	/**
	 * Returns the URL of an item.
	 * @param DOMElement $node The item to get the URL from.
	 * @param bool $isSubMenu Whether the item is in a submenu.
	 * @param string $parentUrl If $node is part of a submenu, this is its
	 * parent's URL.
	 * @return string
	 */
	protected function getItemUrl(DOMElement $node, $isSubMenu, $parentUrl)
	{
		$url = Enviroment::resolveUrl($node->getAttribute('url'));

		if(Text::index('javascript:', $url) === 0)
		{
			$url = '';
		}
		elseif(!Text::find('://', $url))
		{
			if($isSubMenu)
			{
				if($url{0} != '/')
					$url = "{$parentUrl}/{$url}";
			}
			else
			{
				$baseUrl = Application::getCurrent()->getBaseUrl();

				if(!empty($baseUrl) && ($baseUrl != '/') && $this->includeAppBaseUrl)
					$url = "{$baseUrl}/{$url}";
				else
					$url = "/{$url}";
			}
		}

		return Enviroment::normalizePath($url);
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