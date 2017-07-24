<?php
/**
 * This file belongs to the View package.
 * @version 0.7.1
 * @package View
 */

/**
 * This is the base class for all views.
 *
 * Views are classes that load HTML pages and send these pages to UA. A view
 * also can use a template.
 * @author Diego Andrade
 * @package View
 * @since Optimuz 0.1
 * @version 0.7.1
 * @uses Collection.ArrayList
 * @uses Configuration.LocalConfiguration
 * @uses Core.Enviroment
 * @uses Core.Browser
 * @uses Strings.Text
 * @uses Lang
 * @uses IO.File
 * @uses Resource
 * @uses Html
 * @uses Http.CurrentHttpResponse
 */
class DefaultView extends EventDispatcher
{
	/**
	 * File path as not specified.
	 */
	const EMPTY_FILE_NAME			= 2000;

	/**
	 * The resource file does not have a valid type.
	 */
	const INVALID_RESOURCE			= 2001;

	/**
	 * The HTML page was not setted.
	 */
	const NO_PAGE					= 2002;

	/**
	 * The template was not setted.
	 */
	const NO_TEMPLATE				= 2003;

	/**
	 * The page used when a "Page not found" error is thrown.
	 */
	const SYSTEM_PAGE_NOT_FOUND		= 1;

	/**
	 * The page used when an "Access Denied" error is thrown.
	 */
	const SYSTEM_ACCESS_DENIED		= 2;

	/**
	 * The page used when a general error is thrown.
	 */
	const SYSTEM_ERROR				= 3;

	/**
	 * The page used when a general warning is thrown.
	 */
	const SYSTEM_WARNING			= 4;

	/**
	 * Page language (English, Portuguese, etc).
	 * @var string
	 * @see DefaultView::setLang()
	 * @see DefaultView::getLang()
	 */
	protected $pageLanguage			= null;

	/**
	 * Page charset (UTF-8, ISO-8859-1, etc).
	 * @var string
	 * @see DefaultView::setCharset()
	 * @see DefaultView::getCharset()
	 */
	protected $charset				= null;

	/**
	 * Page title.
	 * @var string
	 * @see DefaultView::setTitle()
	 * @see DefaultView::getTitle()
	 */
	protected $title				= null;

	/**
	 * Page meta description.
	 * @var string
	 * @see DefaultView::setDescription()
	 * @see DefaultView::getDescription()
	 */
	protected $description			= null;

	/**
	 * Page meta keywords.
	 * @var string
	 * @see DefaultView::setKeywords()
	 * @see DefaultView::getKeywords()
	 */
	protected $keywords				= null;

	/**
	 * Additional meta tags.
	 * @var ArrayList
	 * @see DefaultView::setMetaTag()
	 * @see DefaultView::getMetaTag()
	 * @see DefaultView::getMetaTags()
	 * @see DefaultView::removeMetaTag()
	 * @see DefaultView::hasMetaTag()
	 */
	protected $metaTags				= null;

	/**
	 * Loader of resource files.
	 * @var ResourceLoader
	 * @see DefaultView::addResource()
	 */
	protected $resourceLoader		= null;

	/**
	 * Controller related to the view.
	 * @var DefaultController
	 * @see DefaultView::setController()
	 * @see DefaultView::getController()
	 */
	protected $controller			= null;

	/**
	 * HTML file used by the view object.
	 *
	 * This file can stay in subfolders inside the view folder
	 * (/Optimuz/layers/view), and the subfolder (package) must be specified in
	 * this variable too. See the following example:
	 *
	 * <code>
	 * <?php
	 * // the HTML file is in /Optimuz/layers/view/Test.php
	 * $this->page = 'Test';
	 *
	 * // the HTML file is in /Optimuz/layers/view/Tests/New/Test.php
	 * $this->page = 'Tests.New.Test';
	 * ?>
	 * </code>
	 * @var string
	 * @see DefaultView::setHtmlPage()
	 * @see DefaultView::getHtmlPage()
	 */
	protected $page					= null;

	/**
	 * Template used to enclose the view content.
	 *
	 * Follows the same rules as the DefaultView::$page.
	 * @var string
	 * @see DefaultView::$page
	 * @see DefaultView::setTemplate()
	 * @see DefaultView::getTemplate()
	 */
	protected $template				= null;

	/**
	 * Defines whether to auto load additional CSS files. Default is true.
	 * @var bool true
	 * @see DefaultView::addResource()
	 * @see DefaultView::setAutoLoadCss()
	 * @see DefaultView::getAutoLoadCss()
	 */
	protected $autoLoadCss			= null;

	/**
	 * Whether the view was parsed.
	 * @var bool false
	 */
	protected $pageInitialized		= null;

	/**
	 * A parser object used to parse the view.
	 * @var HtmlParser
	 */
	protected $parser				= null;

	/**
	 * Reference of the global HtmlDocument.
	 * @var HtmlDocument
	 */
	protected $document				= null;

	/**
	 * Data passed from the controller to the view.
	 * @var ArrayList
	 */
	protected $data					= null;

	/**
	 * Creates a new class instance.
	 *
	 * This is the base class for all views.
	 *
	 * Views are classes that load HTML pages and send these pages to UA. A view
	 * also can use a template.
	 * @param DefaultController $controller (optimal) Controller related to this
	 * view.
	 */
	public function __construct(DefaultController $controller = null)
	{
		$this->initializeEvents();
		$this->resourceLoader = new ResourceLoader();
		$this->resourceLoader->setStorageEngine(LocalConfiguration::get('resources.storage.engine'));
		$this->metaTags = new ArrayList();
		$this->controller = $controller;
		$this->document = HtmlDocument::getCommomDocument();
		$this->autoLoadCss = true;
		$this->pageInitialized = false;
		$this->parser = new HtmlParser();
		$this->data = new ArrayList();

		if(!is_null($this->controller))
		{
			$controllerName = $this->controller->getControllerName();
			$this->setHtmlPage($controllerName);
		}

		$this->charset = LocalConfiguration::get('page.charset');
		$this->description = LocalConfiguration::get('page.description');
		$this->keywords = LocalConfiguration::get('page.keywords');
		$this->title = LocalConfiguration::get('page.title');
	}

	/**
	 * Initializes the events of the view.
	 *
	 * The available events are:
	 * <ul>
	 * <li><code>beforeRender</code></li>
	 * <li><code>render</code></li>
	 * </ul>
	 */
	protected function initializeEvents()
	{
		parent::initializeEvents();
		$this->events->add('beforeRender');
		$this->events->add('render');
	}

	/**
	 * Sets whether to auto load additional CSS files.
	 * @param bool $autoLoad True or false.
	 */
	public function setAutoLoadCss($autoLoad)
	{
		$this->autoLoadCss = $autoLoad;
	}

	/**
	 * Returns whether to auto load additional CSS files.
	 * @return bool
	 */
	public function getAutoLoadCss()
	{
		return $this->autoLoadCss;
	}

	/**
	 * Sets the page language.
	 * @param string $lang Language (English, Portuguese, etc).
	 * @see DefaultView::$pageLanguage
	 * @see DefaultView::getLang()
	 */
	public function setLang($lang)
	{
		$this->pageLanguage = $lang;

		if($this->pageInitialized)
			$this->setMetaTag('language', $this->pageLanguage);
	}

	/**
	 * Returns the page language.
	 * @return string
	 * @see DefaultView::$pageLanguage
	 * @see DefaultView::setLang()
	 */
	public function getLang()
	{
		return $this->pageLanguage;
	}

	/**
	 * Sets the page charset.
	 * @param string $charset Page charset (UTF-8, ISO-8859-1, etc).
	 * @see DefaultView::$charset
	 * @see DefaultView::getCharset()
	 */
	public function setCharset($charset)
	{
		$this->charset = $charset;
	}

	/**
	 * Returns the page charset.
	 * @return string
	 * @see DefaultView::$charset
	 * @see DefaultView::setCharset()
	 */
	public function getCharset()
	{
		return $this->charset;
	}

	/**
	 * Sets the page meta description.
	 * @param string $description Page meta description, rather until 160
	 * characters.
	 * @see DefaultView::$description
	 * @see DefaultView::getDescription()
	 */
	public function setDescription($description)
	{
		$this->description = $description;

		if($this->pageInitialized)
			$this->setMetaTag('description', $this->description);
	}

	/**
	 * Returns the page meta description.
	 * @return string
	 * @see DefaultView::$description
	 * @see DefaultView::setDescription()
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Sets the page meta keywords.
	 * @param string $keywords Page meta keywords.
	 * @see DefaultView::$keywords
	 * @see DefaultView::getKeywords()
	 */
	public function setKeywords($keywords)
	{
		$this->keywords = $keywords;

		if($this->pageInitialized)
			$this->setMetaTag('keywords', $this->keywords);
	}

	/**
	 * Returns the page keywords.
	 * @return string
	 * @see DefaultView::$keywords
	 * @see DefaultView::setKeywords()
	 */
	public function getKeywords()
	{
		return $this->keywords;
	}

	/**
	 * Sets the page title in the HTML head.
	 * @param string $title Page title.
	 * @see DefaultView::$title
	 * @see DefaultView::getTile()
	 */
	public function setTitle($title)
	{
		$this->title = $title;

		if($this->pageInitialized)
		{
			$titleElement = $this->document->getElementsByTagName('title')->item(0);
			$titleElement->clear();
			$titleElement->loadHtml($title);
		}
	}

	/**
	 * Returns the page title.
	 * @return string
	 * @see DefaultView::$title
	 * @see DefaultView::setTitle()
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Sets the controller related to this view.
	 * @param DefaultController $controller A descendent controller from
	 * DefaultController.
	 * @see DefaultView::$controller
	 * @see DefaultView::getController()
	 * @see DefaultController
	 */
	public function setController($controller)
	{
		$this->controller = $controller;
	}

	/**
	 * Returns the controller related to this view.
	 * @return DefaultController
	 * @see DefaultView::$controller
	 * @see DefaultView::setController()
	 * @see DefaultController
	 */
	public function getController()
	{
		return $this->controller;
	}

	/**
	 * Returns the global HtmlDocument instance.
	 * @return HtmlDocument
	 * @see HtmlDocument
	 */
	public function getDocument()
	{
		return $this->document;
	}

	/**
	 * Sets the HTML page used by this view.
	 * @param string $page HTML page name.
	 * @see DefaultView::$page
	 * @see DefaultView::getHtmlPage()
	 */
	public function setHtmlPage($page)
	{
		$this->page = (string)$page;
		$this->pageInitialized = false;
	}

	/**
	 * Returns the HTML page name used by this view.
	 * @return string
	 * @see DefaultView::$page
	 * @see DefaultView::setPage()
	 */
	public function getHtmlPage()
	{
		return $this->page;
	}

	/**
	 * Sets the template used by this view.
	 * @param string $template Template name.
	 * @see DefaultView::$template
	 * @see DefaultView::getTemplate()
	 */
	public function setTemplate($template)
	{
		$this->template = $template;
		$this->pageInitialized = false;
	}

	/**
	 * Returns the template used by this view.
	 * @return string
	 * @see DefaultView::$template
	 * @see DefaultView::setTemplate()
	 */
	public function getTemplate()
	{
		return $this->template;
	}

	/**
	 * Adds a meta information to the view.
	 *
	 * The meta tags Content-Type, description, keywords and language cannot be
	 * changend with this method. To change these values, use the related
	 * methods of this class.
	 * @param string $name Name of meta tag.
	 * @param string $value Meta tag content.
	 * @param bool $http (optimal) If true, the tag will be added as a
	 * http-equiv information. Default is false.
	 * @see DefaultView::$metaTags
	 * @see DefaultView::getMetaTag()
	 * @see DefaultView::getMetaTags()
	 * @see DefaultView::removeMetaTag()
	 * @see DefaultView::hasMetaTag()
	 */
	public function setMetaTag($name, $value, $http = false)
	{
		$this->metaTags[$name] = array('value' => $value, 'http' => $http);

		if($this->pageInitialized)
		{
			$meta = new HtmlElement('meta');
			$meta->setAttribute($http ? 'http-equiv' : 'name', $name);
			$meta->setAttribute('content', $value);
			$this->document->getElementsByTagName('head')->item(0)->appendChild($meta);
		}
	}

	/**
	 * Returns the content of an added meta tag.
	 * @param string $name Meta tag name.
	 * @return string Returns the meta tag content, or null if it does not
	 * exist.
	 * @see DefaultView::$metaTags
	 * @see DefaultView::setMetaTag()
	 * @see DefaultView::getMetaTags()
	 * @see DefaultView::removeMetaTag()
	 * @see DefaultView::hasMetaTag()
	 */
	public function getMetaTag($name)
	{
		return $this->metaTags->offsetExists($name) ? $this->metaTags[$name] : null;
	}

	/**
	 * Returns an iterator for the meta tags array.
	 * @return ArrayListIterator
	 * @see DefaultView::$metaTags
	 * @see DefaultView::setMetaTag()
	 * @see DefaultView::getMetaTag()
	 * @see DefaultView::removeMetaTag()
	 * @see DefaultView::hasMetaTag()
	 */
	public function getMetaTags()
	{
		return new ArrayListIterator($this->metaTags);
	}

	/**
	 * Removes an added meta tag.
	 * @param string $name Meta tag name.
	 * @see DefaultView::$metaTags
	 * @see DefaultView::setMetaTag()
	 * @see DefaultView::getMetaTag()
	 * @see DefaultView::getMetaTags()
	 * @see DefaultView::hasMetaTag()
	 */
	public function removeMetaTag($name)
	{
		if($this->metaTags->offsetExists($name))
			$this->metaTags->offsetUnset($name);

		if($this->pageInitialized)
		{
			$meta = $this->document->xpath('.//meta[@name="' . $name . '" or @http-equiv="' . $name . '" or @property="' . $name . '"]');

			if($meta->length == 1)
				$meta->item(0)->remove();
		}
	}

	/**
	 * Checks if the meta tag exists.
	 * @param string $name Meta tag name.
	 * @see DefaultView::$metaTags
	 * @see DefaultView::setMetaTag()
	 * @see DefaultView::getMetaTag()
	 * @see DefaultView::getMetaTags()
	 * @see DefaultView::removeMetaTag()
	 */
	public function hasMetaTag($name)
	{
		return $this->metaTags->offsetExists($name);
	}

	/**
	 * Includes a file.
	 * @param string $path File path.
	 * @param array $params (optimal) Parameters to send to the file. See the
	 * DefaultView::render() documentation for more details.
	 * @see DefaultView::getPage()
	 * @see DefaultView::render()
	 */
	protected function includePage($path, $params = null)
	{
		if(is_array($params))
		{
			extract($params, EXTR_PREFIX_INVALID, 'param');
			unset($params);
		}

		require $path;
	}

	/**
	 * Parses the view content and load it into the global HtmlDocument.
	 * @param array $params (optimal) Parameters to send to the page. See the
	 * DefaultView::render() documentation for more details.
	 * @return bool
	 * @throw ViewError
	 */
	public function initializePage(array $params = null)
	{
		$success = false;

		if(!$this->pageInitialized)
		{
			$html = null;
			$doc = HtmlDocument::getCommomDocument();

			if(!$doc->isCached())
			{
				if(Text::isValidString($this->page))
				{
					$viewRealName = Text::replace('.', Enviroment::getDirectorySeparator(), $this->page);

					switch($this->page)
					{
						case self::SYSTEM_PAGE_NOT_FOUND:
							$viewPath = Enviroment::getSystemApplication()->getPath('view') . 'page' . Enviroment::getDirectorySeparator() . "PageNotFound.php";
							break;
						case self::SYSTEM_ACCESS_DENIED:
							$viewPath = Enviroment::getSystemApplication()->getPath('view') . 'page' . Enviroment::getDirectorySeparator() . "AccessDenied.php";
							break;
						case self::SYSTEM_ERROR:
						case self::SYSTEM_WARNING:
							$viewPath = Enviroment::getSystemApplication()->getPath('view') . 'page' . Enviroment::getDirectorySeparator() . "Error.php";
							break;
						default:
							$viewPath = Application::getCurrent()->getPath('view') . 'page' . Enviroment::getDirectorySeparator() . "{$viewRealName}.php";
							break;
					}

					if(!($viewExists = File::exists($viewPath)))
						$viewPath = Enviroment::getSharedApplication()->getPath('view') . 'page' . Enviroment::getDirectorySeparator() . "{$viewRealName}.php";

					if($viewExists || File::exists($viewPath))
					{
						$templatePath = false;
						$metaTags = '';

						if(Text::isValidString($this->template))
						{
							$templateRealName = Text::find('.', $this->template) ? Text::replace('.', Enviroment::getDirectorySeparator(), $this->template) : $this->template;
							$templateDirPath = Application::getCurrent()->getPath('templates') . $templateRealName . '.php';
							$sharedTemplateDirPath = SharedApplication::getInstance()->getPath('templates') . $templateRealName . '.php';

							if(File::exists($templateDirPath))
								$templatePath = $templateDirPath;
							elseif(File::exists($sharedTemplateDirPath))
								$templatePath = $sharedTemplateDirPath;
						}

						if(!Buffer::isStarted())
							Buffer::start();

						// header
						$title = Text::toHtml($this->title);
						$charset = $this->charset;
						$doctype = LocalConfiguration::get('page.doctype');

						// meta tags
						$this->setMetaTag('Content-Type', "text/html; charset={$this->charset}", true);

						if(!empty($this->description))
							$this->setMetaTag('description', $this->description);

						if(!empty($this->keywords))
							$this->setMetaTag('keywords', $this->keywords);

						if(!empty($this->pageLanguage))
							$this->setMetaTag('language', $this->pageLanguage);

						$closeTag = Text::toLower(LocalConfiguration::get('page.markup')) === 'xhtml' ? ' />' : '>';

						foreach($this->metaTags as $name => $meta)
							$metaTags .= '<meta ' . ($meta['http'] ? 'http-equiv' : 'name') . "='{$name}' content='{$meta['value']}'{$closeTag}\n";

						// resources
						$resources = null;
						$stylesheets = '';
						$scripts = '';

						if(LocalConfiguration::hasValue('resources.controller'))
						{
							//TODO Improve cache of resources
							$cachedResources = $this->resourceLoader->getStoredFiles();

							foreach($cachedResources as $type => $paths)
							{
								foreach($paths as $path)
								{
									switch($type)
									{
										case 'css':
											$stylesheets .= "<link href='{$path}' type='text/css' rel='stylesheet' media='screen,handheld'{$closeTag}\n";
											break;
										case 'js':
											$scripts .= "<script type='text/javascript' src='{$path}' charset='{$charset}'></script>\n";
											break;
										default:
											// not supported resource type
											break;
									}
								}
							}
						}
						else
						{
							if(LocalConfiguration::get('performance.mergeFiles.enable'))
								$resources = $this->resourceLoader->getMergedResources();
							else
								$resources = $this->resourceLoader->getResources();

							foreach($resources as $resource)
							{
								$type = $resource->getType();
								$path = $resource->getFilePath();

								switch($type)
								{
									case 'css':
										$stylesheets .= "<link href='{$path}' type='text/css' rel='stylesheet' media='screen,handheld'{$closeTag}\n";
										break;
									case 'js':
										$scripts .= "<script type='text/javascript' src='{$path}' charset='{$charset}'></script>\n";
										break;
									default:
										// not supported resource type
										break;
								}
							}
						}

						// content
						try{
							$this->includePage($viewPath, $params);
						}
						catch(Exception $error){
							// prevent double content
							if(Buffer::isStarted())
								Buffer::clean(true);

							throw $error;
						}

						$html = Buffer::getContents();
						Buffer::clean();

						// template
						if($templatePath)
						{
							$this->includePage(
								$templatePath,
								array_merge(
									$params ? $params : array(),
									array(
										'page' => (object)array(
											'metaTags' => $metaTags,
											'title' => $title,
											'doctype' => $doctype,
											'charset' => $charset,
											'view' => $html,
											'stylesheets' => $stylesheets,
											'scripts' => $scripts
										)
									)
								)
							);
							$html = Buffer::getContents();
							Buffer::clean();
						}

						$success = is_string($html) && !empty($html);
					}
					else
					{
						throw new ViewError(Language::getCurrent()->getSentence('error.view.htmlPageNotFound', $this->page, $viewPath), File::NOT_EXISTS);
					}
				}
				else
				{
					throw new ViewError(Language::getCurrent()->getSentence('error.view.noHtmlPage'), self::NO_PAGE);
				}
			}
			else
			{
				$success = true;
			}

			$this->pageInitialized = true;
			$this->parser = new HtmlParser();
			$this->parser->parse($doc, $html);
		}
		else
		{
			$success = true;
		}

		return $success;
	}

	/**
	 * Gets the content from the HTML page.
	 * @param array $params (optimal) Parameters to send to the file. See the
	 * DefaultView::render() documentation for more details.
	 * @return string|bool If success, the page content will be returned.
	 * Otherwise a false will be returned.
	 * @see DefaultView::$page
	 * @see DefaultView::setHtmlPage()
	 * @see DefaultView::getHtmlPage()
	 * @see DefaultView::setTemplate()
	 * @see DefaultView::includePage()
	 */
	public function getPage(array $params = null)
	{
		$html = null;

		if(($success = $this->initializePage($params)))
		{
			$doc = HtmlDocument::getCommomDocument();
			$html = $this->parser->parse($doc, null, false);

			// view data
			if(!$this->data->isEmpty())
				$html = Text::replace('</body>', '<script>var optimuz = ' . json_encode($this->data->toArray()) . ';</script></body>', $html);

			if(!$doc->formatOutput)
			{
				$html = Text::remove('/[\n\r]/m', $html);
				$html = Text::replace('/\s{2,}|\t+/m', ' ', $html);
			}
		}

		return $success ? $html : false;
	}

	/**
	 * Gets the view content and sends it to the UA.
	 * @param array $params (optimal) Parameters to send to the HTML page.
	 *
	 * This must be an array, and in the HTML page each element of this array
	 * will be a variable. See the following example:
	 *
	 * <code>
	 * <?php
	 * // here we have the original array
	 * $view->getPage(array('myVar' => 'Some variable', 50, 'bool' => false));
	 *
	 * // and in the HTML page we can use the variables
	 * echo $myVar; // Some variable
	 * echo $param_1; // 50
	 * echo $bool; // false
	 * ?>
	 * </code>
	 *
	 * Note that the second element of the array is called $param_1, because it
	 * is a indexed element. Any invalid variable name (like indexes) will be
	 * prefixed with the name "param_".
	 * @return bool If success, the script will be stopped here. Otherwise a
	 * false will be returned and the error will be available in
	 * DefaultView::$error.
	 * @see DefaultView::getPage()
	 * @see DefaultView::includePage()
	 * @see Object::getError()
	 */
	public function render(array $params = null)
	{
		$this->trigger('beforeRender');
		$pageContents = $this->getPage($params);
		$success = $pageContents !== false;

		// saves the current document and all initialized elements into the
		// current session
		if(LocalConfiguration::get('htmlElements.session.saveState.enable'))
		{
			$hiddenElements = HtmlElement::getHiddenElements();
			$saveElements = HtmlDocument::getCommomDocument()->xpath('.//*[@state-save]');

			// restore hidden elements
			if(count($hiddenElements) > 0)
			{
				foreach($hiddenElements as $obj)
					$obj->element->show();
			}

			// save modified elements
			if(count($saveElements) > 0)
			{
				foreach($saveElements as $element)
				{
					if($element->isSaveState())
						$element->save();
				}
			}

			// parses the document again to include the updated elements
			$this->parser->parse(HtmlDocument::getCommomDocument(), null, false);

			// saves the document
			$htmlPersist = new HtmlPersistentDocument(CurrentHttpRequest::getInstance()->getUrl(), $this->parser);
			$htmlPersist->save();
		}

		if($success)
			CurrentHttpResponse::getInstance()->send($pageContents);

		$this->trigger('render');
		return $success;
	}

	/**
	 * Adds a resource into the view.
	 *
	 * All resource files must be stored in the application. The base path must
	 * to be /Optimuz/APPLICATION_NAME/layers/view/resources/. So if you have a
	 * CSS file it must be in
	 * /Optimuz/APPLICATION_NAME/layers/view/resources/css/ to be loaded
	 * correctly.
	 *
	 * Resources paths are expressed as the following: /APPLICATION_NAME/path.
	 * You always need to specify the application from where you want to load a
	 * resource, and of course, the resource path. You can also use the shortcut
	 * "~" to load resources from the current application.
	 *
	 * The following example shows how to load resources from the application
	 * "myApp".
	 *
	 * <code>
	 * <?php
	 * // adding a CSS file from
	 * // /Optimuz/myApp/layers/view/resources/css/
	 * $view->addResource('myApp/css/styles.css');
	 *
	 * // the same sample but using the "~" shortcut
	 * // /Optimuz/myApp/layers/view/resources/css/
	 * $view->addResource('~/css/styles.css');
	 *
	 * // adding a JS file from
	 * // /Optimuz/myApp/layers/view/resources/js/some/dir
	 * $view->addResource('myApp/js/some/dir/script.js');
	 *
	 * // using the ResourceFile class
	 * $resource = new ResourceFile('myApp/js/some/dir/script.js');
	 * $view->addResource($resource);
	 *
	 * // adding a CSS file from another application
	 * // /Optimuz/otherApp/layers/view/resources/css/
	 * $view->addResource('otherApp/css/styles.css');
	 * ?>
	 * </code>
	 *
	 * If $resource is invalid (not a string and not a ResourceFile object), a
	 * ViewError is thrown.
	 * @param string|ResourceFile $resource File path or a ResourceFile object.
	 * @param string $type (optinal) Resource's type.
	 * @param boolean $merge (optional) Whether the resource should be merge
	 * with others of the same type. This options has only effect if the setting
	 * <code>performance.mergeFiles.enable</code> is enabled. Default is null
	 * (no change is done).
	 * @see DefaultView::$autoLoadCss
	 * @see DefaultView::setAutoLoadCss()
	 * @see DefaultView::getAutoLoadCss()
	 */
	public function addResource($resource, $type = null, $merge = null)
	{
		if(!empty($resource))
		{
			if(Text::isValidString($resource))
			{
				if(!Text::find('://', $resource))
				{
					$baseUrl = Enviroment::getPath('baseUrl');
					$prefix = GlobalConfiguration::get('urlRewrite.useServerMod.enable') ? 'resource' : 'resources.php';
					$resource = Text::replace('~', Application::getCurrent()->getName(), $resource);
					$resource = new ResourceFile("{$baseUrl}{$prefix}/{$resource}", $type);
				}
				else
				{
					$resource = new ResourceFile($resource, $type);
				}
			}

			if($resource instanceof ResourceFile)
			{
				if($this->pageInitialized)
				{
					switch($resource->getType())
					{
						case 'css':
							$resourceElement = HtmlElement::create('link');
							$resourceElement->setAttribute('href', $resource->getFilePath());
							$resourceElement->setAttribute('type', 'text/css');
							$resourceElement->setAttribute('rel', 'Stylesheet');
							$resourceElement->setAttribute('media', 'all');
							HtmlDocument::getCommomDocument()->documentElement->firstChild->appendChild($resourceElement);
							break;
						case 'js':
							$resourceElement = HtmlElement::create('script');
							$resourceElement->setAttribute('src', $resource->getFilePath());
							$resourceElement->setAttribute('type', 'text/javascript');
							HtmlDocument::getCommomDocument()->documentElement->lastChild->appendChild($resourceElement);
							break;
					}
				}
				else
				{
					if(is_bool($merge))
						$resource->setMerge($merge);

					$this->resourceLoader->addResource($resource);
				}
			}
			else
			{
				throw new ViewError(Language::getCurrent()->getSentence('error.view.invalidResourceType', gettype($resource)), ResourceFile::INVALID_TYPE);
			}
		}
		else
		{
			throw new ViewError(Language::getCurrent()->getSentence('error.view.invalidFileName'), self::EMPTY_FILE_NAME);
		}
	}

	/**
	 * Adds resources from an array into the view.
	 *
	 * See DefaultView::addResource() for details.
	 * @param array $resources Array of resources to add.
	 * @see DefaultView::addResource()
	 */
	public function addResources(array $resources)
	{
		foreach($resources as $resource)
			$this->addResource($resource);
	}

	/**
	 * Returns whether the page is initialized. This happens when the method
	 * DefaultView::initializedPage() is called.
	 * @return boolean
	 * @see DefaultView::initializedPage()
	 */
	public function isPageInitialized()
	{
		return $this->pageInitialized;
	}

	/**
	 * Adds data to the view. The data will be rendered as a JSON object when
	 * the views is called.
	 * @param string $name Key name of the data.
	 * @param mixed $value Data value. Usually a string or number, but if is an
	 * object it must to be serializable.
	 */
	public function addData($name, $value)
	{
		$this->data->addKey($name, $value);
	}

	/**
	 * Removes data from the view.
	 * @param string $name Key name of the data.
	 */
	public function removeData($name)
	{
		if($this->data->offsetExists($name))
			$this->data->offsetUnset($name);
	}
}
?>