<?php
/**
 * This file sets some commom properties for the system application.
 * @version 0.1
 * @package Application
 */

/**
 * This class contains commom properties for the system application.
 *
 * The system application is an application used internally. It is not available
 * for external access. As the shared application, this one does not have all
 * directories that others applications may have. The directories present in
 * this application are:
 * <ul>
 * <li>lang</li>
 * <li>layers</li>
 * <li>view</li>
 * </ul>
 * @author Diego Andrade
 * @package Application
 * @since Optimuz 0.4
 * @version 0.1
 */
class SystemApplication extends Application
{
	/**
	 * Only one instance of this class can exist at a time.
	 */
	const FORBIDDEN_INSTANCE			= 3202;

	/**
	 * The global instance of the system application.
	 * 
	 * Only one instance may exist and it is stored here. To get this instance
	 * call the method SystemApplication::getInstance().
	 * @var SystemApplication
	 * @see SystemApplication::getInstance()
	 * @static
	 */
	protected static $instance			= null;

	/**
	 * Creates an instance of the system application.
	 *
	 * This constructor should not be called directly. Instead, you should call
	 * the factory method SystemApplication::getInstance().
	 *
	 * If this constructor is called more then once, it will throw an
	 * ApplicationError.
	 *
	 * @see SystemApplication::getInstance()
	 */
	public function __construct()
	{
		if(is_null(self::$instance))
		{
			parent::__construct('system');
			unset(
				$this->paths['cache'],
				$this->paths['components'],
				$this->paths['config'],
				$this->paths['control'],
				$this->paths['model'],
				$this->paths['resources'],
				$this->paths['log'],
				$this->paths['scripts'],
				$this->paths['temp'],
				$this->paths['threads'],
				$this->paths['validation']
			);
		}
		else
		{
			throw new ApplicationError(Language::getInstance('Application')->getSentence('error.forbiddenInstance'), self::FORBIDDEN_INSTANCE);
		}
	}

	/**
	 * Returns the global instance of the system application.
	 *
	 * This class uses the Singleton design pattern, so only one instance may
	 * exist and it is retrived with this method.
	 * @return SystemApplication
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