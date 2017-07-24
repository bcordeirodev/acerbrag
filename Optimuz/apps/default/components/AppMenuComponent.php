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
 * @package webConsole.components
 */
class AppMenuComponent extends MenuComponent
{
	/**
	 * Loads the menu's configuration file and builds the menu.
	 *
	 * This component can use language files to construct menus in many
	 * languages. To do so, you must create the a language file named Menu.lang
	 * in the application's lang directory
	 * (/Optimuz/apps/APPLICATION_NAME/lang/LANG_CODE/Menu.lang). An example of
	 * an english language file for this component is
	 * /Optimuz/apps/default/lang/en/Menu.lang.
	 *
	 * This method will retrieve the current lenguage setting from session to
	 * build the menu items.
	 * @param string $file The name of the XML file located at
	 * /Optimuz/apps/APPLICATION_NAME/config/, where
	 * APPLICATION_NAME is the name of the current application. You must give
	 * only the file name without the extension (.xml). Default is
	 * 'siteNavigation'.
	 */
	public function load($file = null)
	{
		$xml = new Xml();

		try
		{
			if($xml->load(Application::getCurrent()->getPath('config') . 'settings/' . $file))
			{
				$root = $xml->getElementsByTagName('navigation')->item(0);
				$this->includeAppBaseUrl = $root->getAttribute('includeAppBaseUrl') == 'true';
				$currentRole = SystemAccessLogin::hasSession() ? SystemAccessLogin::getCurrent()->getRole()->getName() : null;

				foreach($root->childNodes as $child)
				{
					if($child->nodeType == 1)
					{
						if(($item = $this->buildItem($child, false, null, $currentRole)))
							$this->appendChild($item);
					}
				}
			}
			else
			{
				$error = new Error($this->lang->getSentence('error.loadXML'), Xml::LOAD_ERROR);
				Report::sendError($error);
			}
		}
		catch(Exception $ex)
		{
			$error = new Error($this->lang->getSentence('error.parseXML', $ex->getMessage()), $ex->getCode());
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
				/*
				<li class="start active">
					<a href="~/" object-type="HtmlLink">
						<i class="fa fa-user"></i> <span class="title">Usuários</span> <span class="arrow"></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="~/usuario">Ver todos</a>
						</li>
						<li>
							<a href="~/usuario/adicionar">Novo</a>
						</li>
					</ul>
				</li>
				*/

				$item = HtmlElement::create('li');

				$link = new HtmlLink($url);

				if($node->hasAttribute('icon'))
					$link->append("<i class='{$node->getAttribute('icon')}'></i> ");

				$link->append("<span class='title'>" . Text::toHtml($node->getAttribute('label')) . "</span>");
				$item->appendChild($link);

//				if($node->getAttribute("displayCount") == "true")
//				{
//					$count = PessoaQuery::create()
//						->filterBySituacaoFiliacaoId(5)
//						->filterByAtivo(false)
//						->count();
//					$link->append("<span class='badge badge-important pull-right m-r-30'>{$count}</span>");
//				}

				// submenu
				if($node->hasChildNodes())
				{
					$emptyList = true;
					$subMenu = HtmlElement::create('ul');
					$subMenu->addCssClass('sub-menu');

					foreach($node->childNodes as $child)
					{
						if($child->nodeType == 1)
						{
							if(($subItem = $this->buildItem($child, true, $url, $userRole, $hasAccess)))
							{
								$subMenu->appendChild($subItem);
								$emptyList = false;
							}
						}
					}

					if(!$emptyList)
						$item->appendChild($subMenu);

					$link->append(' <span class="arrow"></span>');
				}
			}
		}

		return $item;
	}
}
?>