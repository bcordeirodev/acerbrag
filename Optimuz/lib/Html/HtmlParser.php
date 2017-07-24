<?php
/**
 * This file sets a class to work with HTML elements.
 * @version 0.3
 * @package Html
 */

/**
 * This class parses HTML strings to recover elements references and update
 * stuffs.
 * @author Diego Andrade
 * @package Html
 * @since Optimuz 0.4
 * @version 0.3
 * @uses Strings.Text
 * @uses Configuration.LocalConfiguration
 * @uses Storage.DataManager
 * @uses Core.Enviroment
 * @uses Controller
 * @uses View
 */
class HtmlParser
{
	/**
	 * HTML string parsed by this class.
	 * @var string
	 */
	protected $html						= null;

	/**
	 * Creates a new isntance of the parser.
	 */
	public function __construct()
	{
	}

	/**
	 * Returns the parsed HTML. It there is no HTML parsed yet, a null value is
	 * returned.
	 * @return string
	 */
	public function getHtml()
	{
		return $this->html;
	}

	/**
	 * Parses the HtmlDocument provided.
	 *
	 * Returns the resulting HTML string.
	 * @param HtmlDocument $doc Document to use to parse the HTML
	 * string.
	 * @param string $html (Optimal) HTML string to be parsed. If it is not
	 * given, the content of the HtmlDocument will be parsed.
	 * @param bool $initializeElements (Optimal) Whether to initialize elements.
	 * Only elements with object-* properties are initialized. Default is true.
	 * @return string
	 */
	public function parse($doc, $html = null, $initializeElements = true)
	{
		$hasHtml = is_string($html);
		$isUTF8 = $hasHtml && (Text::detectEncoding($html) == Text::UTF8);

		if($hasHtml)
		{
			if(!$isUTF8)
				$html = Text::toUtf8($html);

			$doc->loadContent($html);
		}

		if($initializeElements && ($rootElement = $doc->getElementsByTagName('html')->item(0)))
			$this->processHtmlElement($rootElement);

		if(LocalConfiguration::get('page.markup') == HtmlDocument::MARKUP_XHTML)
		{
			$docHtml = $doc->saveXML($doc->documentElement, LIBXML_NOEMPTYTAG);

			if($hasHtml)
				$this->html = Text::replace('#<html[^>]+>.+?</html>#is', $docHtml, $html);
			else
				$this->html = $docHtml;
		}
		else
		{
			$this->html = $doc->saveHTML();
		}

		// now we remove proprietary attributes
		$html = Text::remove(HtmlState::REGEX_PROPRIETARY_ATTRIBUTES, $this->html);

		if($hasHtml && !$isUTF8)
			$html = Text::toAscii($this->html);

		return $html;
	}

	/**
	 * Executes custom actions on the given element.
	 * 
	 * These actions are set with object-* properties. The default custom 
	 * properties are:
	 * 
	 * <ul>
	 * <li><b>object-id</b>: sets the internal ID of the element.</li>
	 * <li><b>object-type</b>: all elements retrieved from the DOM are of the 
	 * HtmlElement type by default. This property set a custom type for the 
	 * element. So if you write something like 
	 * 
	 * <code><form object-type="FormComponent"></form></code>
	 * 
	 * the form will be converted into the FormComponent class, so its 
	 * specialized methods will be available for use.</li>
	 * <li><b>object-clear</b>: removes all children from the given element.</li>
	 * <li><b>object-oncreate</b>: sets a handler for the oncreate event. The 
	 * syntax is <code>handler::methodName</code>, where handler can be 
	 * <b>controller</b> or <b>view</b>.
	 * 
	 * If it is controller, then the method that will catch the event must be on
	 * the controller of the current HTTP request (in this case is safe to put 
	 * that method on the <code>DefaultPageController</code>). But if the 
	 * handler is view, the method must be on the <code>DefaultPageView</code> 
	 * class.
	 * 
	 * The second part, methodName, is the name of the method that will be 
	 * executed on this event. This method will receive the element that fired 
	 * it (the element will be converted into the type pointed in object-type).
	 * 
	 * The oncreate event is fired as soon as the element is found on the DOM 
	 * tree, i.e., when the view is being loaded inside the 
	 * <code>HtmlDocument</code> object.</li>
	 * <li><b>object-datasource</b>: sets the name of the data source used by 
	 * some elements, as the <code>HtmlSelect</code> and the 
	 * <code>HtmlTable</code>. This is the same as 
	 * calling <code>$element->setSource($datasource)</code>.
	 * 
	 * The data source must to be created and registered by the 
	 * <code>DataManager::set()</code> method before the view is loaded.</li>
	 * </ul>
	 * 
	 * In addition to the predefined object properties described above, you can
	 * use any object property with the same notation. For example, let's say
	 * you have a custom HTML element class named <code>MyHtmlElement</code>, 
	 * and this class has a property named <code>myProperty</code>. You could 
	 * write the following:
	 * 
	 * <code><div object-type="MyHtmlElement" object-my-property="some value"></div></code>
	 * 
	 * This div would be converted into the <code>MyHtmlElement</code> class, 
	 * and the method <code>setMyProperty($value)</code> would be called passing 
	 * the given value. This happens on the 
	 * <code>HtmlElement::initializeProperties()</code> call. All custom 
	 * properties are proccessed there. But pay attention: you must have a 
	 * public setter for the property that you want to use like this.
	 * @param HtmlElement $rootElement The root element where to look for 
	 * elements with object-* properties (e.g. the <code>body</code> element).
	 */
	protected function processHtmlElement(HtmlElement $rootElement)
	{
		$objects = $rootElement->xpath(".//*[attribute::*[starts-with(local-name(), 'object-')]][not(@object-proccessed)]");

		if(!$objects->isEmpty())
		{
			foreach($objects as $object)
			{
//				if(Text::find('/html', $object->getNodePath()) && !$object->isRecovered())
//				{
					$objectId = $object->hasAttribute('object-id') ? $object->getAttribute('object-id') : null;
					$objectType = $object->hasAttribute('object-type') ? $object->getAttribute('object-type') : null;
					$needConvertion = isset($objectType) && !$object->isSameType($objectType);

					// if the type is provided the object is converted to it
					if($needConvertion)
						$object = $object->toType($objectType);

					if(isset($objectId))
						$object->setId($objectId, false);

					if($object->hasAttribute('object-oncreate'))
						$this->setEventHandler('create', $object->getAttribute('object-oncreate'), $object, $object, true);

					if($object->hasAttribute('object-clear') && (Text::toLower($object->getAttribute('object-clear')) == 'true'))
						$object->clear();

					if($object->hasAttribute('object-datasource'))
					{
						$dataSourceName = $object->getAttribute('object-datasource');

						if(DataManager::exists($dataSourceName))
						{
							$object->setSource(DataManager::get($dataSourceName));
							$object->bindSource();
						}
						else
						{
							DataManager::bindElement($dataSourceName, $object);
						}
					}

					$object->setAttribute('object-proccessed', 'true');
					
					if(!$needConvertion)
					{
						$object->initializeProperties();
					}
					else
					{
						$this->processHtmlElement($rootElement);
						break;
					}

//					if($object->hasChildNodes())
//						$this->processHtmlElement($object);
//				}
			}
		}
	}

	/**
	 * Registers a handler for an event and optimally triggers it.
	 * @param string $eventName Event name.
	 * @param string $eventListener Event listener to be called. The string must
	 * be as the following: OBJECT::EVENT_HANDLER, where OBJECT can be 'view' or
	 * 'controller'. If it is view so the handler must be a public method of
	 * this view, otherwise it must be a public method of the associated
	 * controller. Any other value will throw an error.
	 * @param HtmlElement $element The element where the event will be fired on.
	 * @param array $data The data passed to the handler.
	 * @param bool $trigger Whether to trigger the event.
	 * @todo Complete this method.
	 */
	public function setEventHandler($eventName, $eventListener, $element, $data, $trigger)
	{
		$listenerParams = explode('::', $eventListener);
		$listener = array();
		$controller = Enviroment::getRequest()->getController();

		switch($listenerParams[0])
		{
			case 'view':
				$listener[] = $controller->getView();
				break;
			case 'controller':
				$listener[] = $controller;
				break;
			default:
				throw new HtmlError($msg, $code); // add error description
				break;
		}

		$listener[] = $listenerParams[1];
		$element->addListener($eventName, $listener);

		if($trigger)
			$element->trigger($eventName, array($data));
	}
}
?>
