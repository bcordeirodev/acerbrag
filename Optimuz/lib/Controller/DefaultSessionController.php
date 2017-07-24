<?php
/**
 * This file contains a controller to handle sessions.
 * @version 0.2
 * @package control
 * @subpackage session
 */

/**
 * Base controller used to handle sessions related to specific page controllers.
 * @author Diego Andrade
 * @package control
 * @subpackage session
 * @since Optimuz 0.3
 * @uses Lang
 * @uses Session
 */
class DefaultSessionController
{
	/**
	 * The name of the controller is invalid.
	 */
	const INVALID_CONTROLLER_NAME	= 807;

	/**
	 * Controller name.
	 * @var string
	 */
	protected $controllerName		= null;

	/**
	 * Initializes the session controller for the controller specified by the
	 * $controllerName parameter.
	 *
	 * This method only sets the page controller name as a prefix, so it can
	 * handle properly all actions.
	 * @param string $controllerName Name of the page controller on which this
	 * controller (session controller) will handle session actions.
	 */
	public function __construct($controllerName)
	{
		if(is_string($controllerName))
			$this->controllerName = $controllerName;
		else
			throw new ControllerError(Language::getInstance('Controller')->getSentence('error.invalidName'), self::INVALID_CONTROLLER_NAME);
	}

	/**
	 * Sets a variable related to the controller in the session.
	 * @param string $key Variable name.
	 * @param mixed $value Variable value.
	 * @see DefaultSessionController::get()
	 * @see DefaultSessionController::remove()
	 * @see DefaultSessionController::exists()
	 * @see DefaultSessionController::clear()
	 */
	public function set($key, $value)
	{
		$data = Session::get($this->controllerName);

		if(!is_array($data))
			$data = array();

		$data[$key] = $value;
		Session::set($this->controllerName, $data);
	}

	/**
	 * Returns a variable related to the controller from session.
	 * @param string $key Variable name.
	 * @return mixed
	 * @see DefaultSessionController::set()
	 * @see DefaultSessionController::remove()
	 * @see DefaultSessionController::exists()
	 * @see DefaultSessionController::clear()
	 */
	public function get($key)
	{
		$data = Session::get($this->controllerName);
		$value = null;

		if($data && isset($data[$key]))
			$value = $data[$key];

		return $value;
	}

	/**
	 * Removes a variable related to the controller from session.
	 * @param string $key Variable name.
	 * @see DefaultSessionController::set()
	 * @see DefaultSessionController::get()
	 * @see DefaultSessionController::exists()
	 * @see DefaultSessionController::clear()
	 */
	public function remove($key)
	{
		$data = Session::get($this->controllerName);

		if($data && isset($data[$key]))
		{
			unset($data[$key]);
			Session::set($this->controllerName, $data);
		}
	}

	/**
	 * Checks if a variable related to the controller exists in the session.
	 * @param string $key Variable name.
	 * @return bool
	 * @see DefaultSessionController::set()
	 * @see DefaultSessionController::get()
	 * @see DefaultSessionController::clear()
	 * @see DefaultSessionController::remove()
	 */
	public function exists($key)
	{
		$data = Session::get($this->controllerName);
		return $data && isset($data[$key]);
	}

	/**
	 * Closes the session of the controller.
	 * @see DefaultSessionController::set()
	 * @see DefaultSessionController::get()
	 * @see DefaultSessionController::exists()
	 * @see DefaultSessionController::remove()
	 */
	public function close()
	{
		Session::remove($this->controllerName);
	}

	/**
	 * Removes all variables from the session of the controller.
	 * @see DefaultSessionController::set()
	 * @see DefaultSessionController::get()
	 * @see DefaultSessionController::exists()
	 * @see DefaultSessionController::remove()
	 */
	public function clear()
	{
		Session::set($this->controllerName, array());
	}
}
?>