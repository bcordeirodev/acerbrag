<?php
/**
 * This file is used to define a class that handle events.
 * @version 0.1
 * @package Event
 */

/**
 * Class used to handle custom events.
 * @author Diego Andrade
 * @package Event
 * @since Optimuz 0.3
 * @version 0.1.7
 */
class EventDispatcher extends Object
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
	 * @see EventDispatcher::addListener()
	 * @see EventDispatcher::removeListener()
	 * @see EventDispatcher::removeAllListeners()
	 * @see EventDispatcher::isListening()
	 * @see EventDispatcher::trigger()
	 */
	protected $events					= null;

	/**
	 * Array of listeners of the event.
	 * @var ArrayList
	 * @see EventDispatcher::addListener()
	 * @see EventDispatcher::removeListener()
	 * @see EventDispatcher::removeAllListeners()
	 * @see EventDispatcher::isListening()
	 * @see EventDispatcher::trigger()
	 */
	protected $listeners				= null;

	/**
	 * Initializes the default values of the class.
	 */
	protected function initializeEvents()
	{
		$this->events = new ArrayList();
		$this->listeners = new ArrayList();
	}

	/**
	 * Adds a listener (handler) to an event.
	 *
	 * If the event does not exist or the handler is not valid, an error will be
	 * thrown.
	 * @param string $eventName Name of the event to listen.
	 * @param mixed $listener Can be a string (the name of the function),
	 * an array (which holds an object or a class name as first parameter and
	 * the method name as second parameter) or a Closure object (an anonymous
	 * function).
	 * @see EventDispatcher::$events
	 * @see EventDispatcher::$listeners
	 * @see EventDispatcher::removeListener()
	 * @see EventDispatcher::removeAllListeners()
	 * @see EventDispatcher::isListening()
	 * @see EventDispatcher::trigger()
	 */
	public function addListener($eventName, $listener)
	{
		if($this->events->find($eventName))
		{
			if(is_string($listener) || is_array($listener) || is_callable($listener))
			{
				if(!$this->listeners->offsetExists($eventName))
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
	 * @param string $eventName Name of the event ro remove the listen.
	 * @param mixed $listener Can be a string (the name of the function),
	 * an array (which holds an object or a class name as first parameter and
	 * the method name as second parameter) or a Closure object (an anonymous
	 * function).
	 * @see EventDispatcher::$events
	 * @see EventDispatcher::$listeners
	 * @see EventDispatcher::addListener()
	 * @see EventDispatcher::removeAllListeners()
	 * @see EventDispatcher::isListening()
	 * @see EventDispatcher::trigger()
	 */
	public function removeListener($eventName, $listener)
	{
		if($this->listeners->offsetExists($eventName))
			$this->listeners[$eventName]->remove($listener);
	}

	/**
	 * Removes all listeners from a given event.
	 * @param string $eventName Name of the event on which all listeners will be
	 * removed.
	 * @see EventDispatcher::$events
	 * @see EventDispatcher::$listeners
	 * @see EventDispatcher::addListener()
	 * @see EventDispatcher::removeListener()
	 * @see EventDispatcher::isListening()
	 * @see EventDispatcher::trigger()
	 */
	public function removeAllListeners($eventName)
	{
		if($this->listeners->offsetExists($eventName))
			$this->listeners[$eventName]->clear();
	}

	/**
	 * Checks whether the given event is being listened by someone.
	 * @param string $eventName Event name.
	 * @return boolean Returns true if the event is registered and is being
	 * listened, of false otherwise.
	 * @see EventDispatcher::$listeners
	 * @see EventDispatcher::addListener()
	 * @see EventDispatcher::removeListener()
	 * @see EventDispatcher::removeAllListeners()
	 * @see EventDispatcher::trigger()
	 */
	public function isListening($eventName)
	{
		return $this->listeners->offsetExists($eventName) ? !$this->listeners[$eventName]->isEmpty() : false;
	}

	/**
	 * Triggers an event. All registered handlers for the event will be called
	 * in the same order they were added.
	 *
	 * If the event does not exist an error will be thrown.
	 * @param string $eventName Event to trigger.
	 * @param array $params (optional) List of parameters to be passed to the
	 * event handler.
	 * @throws EventError
	 * @see EventDispatcher::$events
	 * @see EventDispatcher::$listeners
	 * @see EventDispatcher::addListener()
	 * @see EventDispatcher::removeListener()
	 * @see EventDispatcher::removeAllListeners()
	 * @see EventDispatcher::isListening()
	 */
	public function trigger($eventName, array $params = null)
	{
		if($this->events->find($eventName))
		{
			$listeners = $this->listeners[$eventName];

			if($listeners)
			{
				foreach($listeners as $listener)
					Caller::call($listener, $params);
			}
		}
		else
		{
			throw new EventError(Language::getInstance('Event')->getSentence('error.eventNotFound', $eventName), self::EVENT_NOT_FOUND);
		}
	}
}
?>