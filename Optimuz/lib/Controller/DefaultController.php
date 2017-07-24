<?php
/**
 * This file contains only a controller.
 * @version 0.5
 * @package Controller
 */

/**
 * Default controller for all controllers in the application.
 * @author Diego Andrade
 * @package Controller
 * @since Optimuz 0.1
 * @version 0.6
 * @uses Core.Load
 * @uses Core.Enviroment
 * @uses Lang
 * @uses View
 * @uses Http.CurrentHttpRequest
 * @uses Http.CurrentHttpResponse
 * @uses Application
 * @uses Html
 * @uses Strings.Text
 */
class DefaultController extends EventDispatcher
{
	/**
	 * View not specified.
	 */
	const NO_VIEW					= 801;

	/**
	 * The called method does not exist.
	 */
	const METHOD_NOT_EXISTS			= 802;

	/**
	 * The resource cannot be accessed by URL.
	 */
	const ACCESS_DENIED				= 803;

	/**
	 * The method was not implemented in the sub class.
	 */
	const METHOD_NOT_IMPLEMENTED	= 804;

	/**
	 * The specified view could not be loaded.
	 */
	const INVALID_VIEW				= 805;

	/**
	 * The user doesn't have the required privilegies to access the desired
	 * resource.
	 */
	const SYSTEM_ACCESS_DENIED		= 806;

	/**
	 * Corresponding view for this controller.
	 * @var DefaultView
	 * @see DefaultController::setView()
	 * @see DefaultController::getView()
	 */
	protected $view					= null;

	/**
	 * Reference to the HttpScriptRequest global object.
	 * @var CurrentHttpRequest
	 * @see DefaultController::getRequest()
	 */
	protected $request				= null;

	/**
	 * Reference to the HttpScriptResponse global object.
	 * @var CurrentHttpResponse
	 * @see DefaultController::getResponse()
	 */
	protected $response				= null;

	/**
	 * Session object.
	 * @var DefaultSessionController
	 */
	protected $session				= null;

	/**
	 * Application object. This is the application that this controller belongs.
	 * @var Application
	 */
	protected $application			= null;

	/**
	 * Language object.
	 * @var Language
	 */
	protected $lang					= null;

	/**
	 * Markup used to write the template and view. It is defined it the
	 * global/local configuration under the section page.markup.
	 * @var string
	 */
	protected $markup				= null;

	/**
	 * Initializes the controller default properties, and sets the default
	 * view.
	 */
	public function __construct()
	{
		$this->initializeEvents();

		// set request and response objects
		$this->request = CurrentHttpRequest::getInstance();
		$this->response = CurrentHttpResponse::getInstance();

		// set the controller in the current request
		if(!$this->request->getController())
			$this->request->setController($this);

		// set the application object
		$this->application = Application::getCurrent();

		// updates the global HtmlDocument based on a HTML document saved
		// previously
		$htmlPersist = new HtmlPersistentDocument($this->request->getUrl());

		if($htmlPersist->restore())
		{
			$doc = HtmlDocument::getCommomDocument();
			$doc->loadContent($htmlPersist->getParser()->getHtml());
			$doc->setIsCached(true);

			// triggers the onLoad event for every registered element
			$objects = $doc->xpath('.//*[@object-onload]');

			if(!$objects->isEmpty())
			{
				foreach($objects as $object)
				{
					if($object->canRecover())
						$object = HtmlState::recover($object->getAttribute('object-id'));
					else
						$object->recoverState();

					$object->trigger('load', array($object));
				}
			}
		}

		$this->markup = LocalConfiguration::get('page.markup');

		// view setting
		if(is_null($this->view))
			$this->setView('DefaultPage');

		$this->view->setTitle(LocalConfiguration::get('page.title'));

		// template setting
		$this->view->setTemplate($this->markup);

		try
		{
			$sessionController = "{$this->getControllerName()}SessionController";
			Load::controller("Session.{$sessionController}", false);
			$this->session = new $sessionController($this->getControllerName());
		}
		catch(Exception $error)
		{
			if($error->getCode() !== File::NOT_EXISTS)
			{
				Report::sendError($error);
				$this->error();
			}
			else
			{
				$this->session = new DefaultSessionController($this->getControllerName());
			}
		}
	}

	/**
	 * This is the default method. It acts exactly like an index file inside a
	 * web directory. If no method is specified, this one will be called.
	 *
	 * This method must be overloaded in the sub classes, and any parameters
	 * must be specified too.
	 *
	 * If this method is not overloaded an Error will be thrown.
	 * @uses Error
	 */
	public function index()
	{
		throw new Error(Language::getCurrent()->getSentence('error.methodNotImplemented'), self::METHOD_NOT_IMPLEMENTED);
	}

	/**
	 * Sets the corresponding view.
	 * @param string $view The view that will be presented to the user.
	 * @see DefaultController::$view
	 * @see DefaultController::getView()
	 */
	public function setView($view)
	{
		if(Load::view($view))
		{
			$view .= 'View';
			$this->view = new $view($this);
		}
		else
		{
			throw new ControllerError(Language::getInstance('Controller')->getSentence('error.invalidView', $view), self::INVALID_VIEW);
		}
	}

	/**
	 * Returns the corresponding view.
	 * @return DefaultView
	 * @see DefaultController::$view
	 * @see DefaultController::setView()
	 */
	public function getView()
	{
		return $this->view;
	}

	/**
	 * Calls the view. When this is done, the response is sent to the UA and
	 * the script execution is ended.
	 *
	 * If any error occours, a false will be returned.
	 *
	 * If this method is called without a view been specified early, a
	 * ControllerError will be thrown.
	 * @param array $params Parameters to be passed to the view.
	 * @return bool
	 * @throws ControllerError
	 * @see DefaultController::$view
	 * @see DefaultController::setView()
	 * @see DefaultController::getView()
	 */
	public function callView(array $params = null)
	{
		if($this->view instanceof DefaultView)
			return $this->view->render($params);
		else
			throw new ControllerError(Language::getCurrent()->getSentence('error.noView'), self::NO_VIEW);
	}

	/**
	 * Returns the controller name without the "Controller" part.
	 * @return string
	 * @final
	 */
	final public function getControllerName()
	{
		return str_replace('Controller', '', get_class($this));
	}

	/**
	 * Returns the HttpScriptRequest global instance.
	 * @return CurrentHttpRequest
	 * @final
	 */
	final public function getRequest()
	{
		return $this->request;
	}

	/**
	 * Returns the HttpScriptResponse global instance.
	 * @return CurrentHttpResponse
	 * @final
	 */
	final public function getResponse()
	{
		return $this->response;
	}

	/**
	 * Returns the session controller object.
	 * @return DefaultSessionController
	 */
	public function getSession()
	{
		return $this->session;
	}

	/**
	 * Returns the application object.
	 * @return Application
	 */
	public function getApplication()
	{
		return $this->application;
	}

	/**
	 * This method is used to handle errors and to show an error page.
	 * @param Error $error (optimal) Error object.
	 * @param mixed $info (optimal) Aditional information that will be passed
	 * to the view.
	 */
	public function error(Error $error = null, $info = null)
	{
		$this->view->setTemplate($this->markup);
		$this->view->setHtmlPage(DefaultView::SYSTEM_ERROR);
		$this->response->setStatusCode(500);

		// error page variables
		if(is_null($error))
			$error = Error::getLast();

		$this->callErrorPage($error, $info);
	}

	/**
	 * Displays a warning page, about an error not so important.
	 */
	public function warning()
	{
		$this->view->setTemplate($this->markup);
		$this->view->setHtmlPage(DefaultView::SYSTEM_WARNING);

        try{
			$this->callView();
		}
		catch(Error $err){
			Report::sendError($err);
			$this->callErrorPage($err);
		}
	}

	/**
	 * This method is used to handle errors and to show an error page.
	 * @param Error $error (optimal) Error object.
	 * @param mixed $info (optimal) Aditional information that will be passed
	 * to the view.
	 */
	protected function callErrorPage(Error $error = null, $info = null)
	{
		$params = array();

		if(!is_null($error))
		{
			$errorDescription = Text::toHtml($error);
			$errorLine = Text::toHtml($error->getLine());
			$errorFile = $error->getFile();
			$errorTrace = $error->getHtmlStack();

			$params = array(
				'errorDescription' => $errorDescription,
				'errorLine' => $errorLine,
				'errorFile' => $errorFile,
				'errorTrace' => $errorTrace
			);
		}

		if(!is_null($info))
			$params['additionalInfo'] = $info;

		$this->callView($params);
	}

	/**
	 * This method is called to handle controllers not found.
	 * @param Error $error Error object.
	 * @param mixed $info Additional information that will be passed to the
	 * view.
	 */
	public function pageNotFound(Error $error = null, $info = null)
	{
		$this->view->setTemplate($this->markup);
		$this->view->setHtmlPage(DefaultView::SYSTEM_PAGE_NOT_FOUND);
		$this->response->setStatusCode(404);
		$this->callErrorPage($error, $info);
	}

	/**
	 * This method is called to handle errors of access denied.
	 * @param Error $error Error object.
	 * @param mixed $info Additional information that will be passed to the
	 * view.
	 */
	public function accessDenied(Error $error = null, $info = null)
	{
		$this->view->setTemplate($this->markup);
		$this->view->setHtmlPage(DefaultView::SYSTEM_ACCESS_DENIED);
		//$this->response->setStatusCode(404);
		$this->callErrorPage($error, $info);
	}

	/**
	 * Returns the Language object related to this controller.
	 * @return Language
	 */
	public function getLang()
	{
		return $this->lang;
	}
}
?>