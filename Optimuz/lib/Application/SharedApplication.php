<?php
/**
 * This file sets some commom properties for the shared application.
 * @version 0.1
 * @package Application
 */

/**
 * This class contains commom properties for the shared application.
 *
 * The shared application is an application available for all others
 * applications in the project. However, this application does not have all
 * directories that others applications may have. The directories not present
 * in this application are:
 * <ul>
 * <li>config</li>
 * <li>control</li>
 * <li>model</li>
 * <li>view</li>
 * <li>log</li>
 * <li>temp</li>
 * </ul>
 * @author Diego Andrade
 * @package Application
 * @since Optimuz 0.4
 * @version 0.1
 */
class SharedApplication extends Application
{
	/**
	 * Only one instance of this class can exist at a time.
	 */
	const FORBIDDEN_INSTANCE			= 3202;

	/**
	 * The global instance of the shared application.
	 * 
	 * Only one instance may exist and it is stored here. To get this instance
	 * call the method SharedApplication::getInstance().
	 * @var SharedApplication
	 * @see SharedApplication::getInstance()
	 * @static
	 */
	protected static $instance			= null;

	/**
	 * Creates an instance of the shared application.
	 *
	 * This constructor should not be called directly. Instead, you should call
	 * the factory method SharedApplication::getInstance().
	 *
	 * If this constructor is called more then once, it will throw an
	 * ApplicationError.
	 *
	 * @see SharedApplication::getInstance()
	 */
	public function __construct()
	{
		if(is_null(self::$instance))
		{
			parent::__construct('shared');
			unset(
				$this->paths['config'],
				$this->paths['log'],
				$this->paths['temp']
			);
		}
		else
		{
			throw new ApplicationError(Language::getInstance('Application')->getSentence('error.forbiddenInstance'), self::FORBIDDEN_INSTANCE);
		}
	}

	/**
	 * Returns the global instance of the shared application.
	 *
	 * This class uses the Singleton design pattern, so only one instance may
	 * exist and it is retrived with this method.
	 * @return SharedApplication
	 * @static
	 */
	public static function getInstance()
	{
		if(is_null(self::$instance))
			self::$instance = new self();

		return self::$instance;
	}
}
?>