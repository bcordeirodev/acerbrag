<?php
/**
 * This file belongs to HTML package, that defines a simple way to build HTML
 * elements and components.
 * @version 0.5
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
 * @since Optimuz 0.4
 * @version 0.1
 */
class HtmlEvent extends HtmlState
{
	/**
	 * The type of the specified handler is invalid. It must be a string or an
	 * array.
	 */
	const INVALID_HANDLER_TYPE			= 2900;

	/**
	 * The type of the specified handler is invalid. It must be a string or an
	 * array.
	 */
	const EVENT_NOT_FOUND				= 2901;

	/**
	 * Array of events.
	 * @var ArrayList
	 */
	protected $events					= null;

	/**
	 * Array of listeners of the event.
	 * @var ArrayList
	 * @see DefaultEvent::addListener()
	 */
	protected $listeners				= null;

	/**
	 * Creates a new instance of the class.
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
		$this->events = new ArrayList();
		$this->listeners = new ArrayList();
	}

	/**
	 * Adds a listener (handler0 to the event.
	 *
	 * If the event does not exist or the handler is not a string or an array,
	 * an error will be thrown.
	 * @param string $eventName Name of the event to listen.
	 * @param string|array $listener Can be a string (the name of the function)
	 * or an array (which holds an object as first parameter and the method name
	 * as second parameter).
	 * @see DefaultEvent::$events
	 * @see DefaultEvent::$listeners
	 * @see DefaultEvent::trigger()
	 */
	public function addListener($eventName, $listener)
	{
		$this->initialize();

		if($this->events->find($eventName))
		{
			if(is_string($listener) || is_array($listener))
			{
				if(!$this->listeners[$eventName])
					$this->listeners[$eventName] = new ArrayList();

				$this->listeners[$eventName]->add($listener);
			}
			else
			{
				throw new EventError(Language::getInstance('Event')->getSentence('error.invalidHandlerType', gettype($listener)), self::INVALID_HANDLER_TYPE);
			}
		}
		else
		{
			throw new EventError(Language::getInstance('Event')->getSentence('error.eventNotFound', $eventName), self::EVENT_NOT_FOUND);
		}
	}

	/**
	 * Removes an event listener.
	 * @param string $eventName Name of the event to listen.
	 * @param string|array $listener Can be a string (the name of the function)
	 * or an array (which holds an object as first parameter and the method name
	 * as second parameter).
	 */
	public function removeListener($eventName, $listener)
	{
		if($this->listeners->find($eventName))
			$this->listeners[$eventName]->remove($listener);
	}

	/**
	 * Triggers an event. All registered handler for the event will be called in
	 * the same order they were added.
	 *
	 * If the event does not exist an error will be thrown.
	 * @param string $eventName Event to trigger.
	 * @param array $data (optimal) Data to be passed to the event handler.
	 */
	public function trigger($eventName, array $data = null)
	{
		if($this->events->find($eventName))
		{
			$listeners = $this->listeners[$eventName];

			if($listeners)
			{
				foreach($listeners as $listener)
					Caller::call($listener, $data);
			}
		}
		else
		{
			throw new EventError(Language::getInstance('Event')->getSentence('error.eventNotFound', $eventName), self::EVENT_NOT_FOUND);
		}
	}
}
?>