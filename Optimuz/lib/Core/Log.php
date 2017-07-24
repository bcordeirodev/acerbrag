<?php
/**
 * This file defines the class used to handle the application log.
 * @version 0.6
 * @package Core
 */

/**
 * Class used to handle the application log.
 * @author Diego Andrade
 * @package Core
 * @since Optimuz 0.1
 * @version 0.7
 * @static
 * @uses Configuration
 * @uses Lang
 * @uses IO
 * @uses Application
 * @uses Error
 */
class Log
{
	/**
	 * Success message.
	 */
	const SUCCESS				= 1201;

	/**
	 * Normal message, general use.
	 */
	const NORMAL				= 1202;

	/**
	 * Informative message.
	 */
	const INFO					= 1203;

	/**
	 * Warning message.
	 */
	const WARNING				= 1204;

	/**
	 * Erro message.
	 */
	const ERROR					= 1205;

	/**
	 * Debug message.
	 */
	const DEBUG					= 1206;

	/**
	 * Log messages in a short format.
	 */
	const MESSAGE_SHORT			= 'short';

	/**
	 * Log messages in the complete format.
	 */
	const MESSAGE_COMPLETE		= 'complete';

	/**
	 * Line separator.
	 */
	const LINE_SEPARATOR		= "\n------------------------------------------------------------------------------------------------------------------";

	/**
	 * This array is used only to print the constants names.
	 * @var array
	 */
	private static $messageTypes = array(
		Log::SUCCESS => 'SUCCESS',
		Log::NORMAL => 'NORMAL',
		Log::INFO => 'INFO',
		Log::WARNING => 'WARNING',
		Log::ERROR => 'ERROR',
		Log::DEBUG => 'DEBUG'
	);

	/**
	 * Adds a message to the application log.
	 * @param mixed $message Message to be added. Can be any value. In the case
	 * it is an object or array, it will be properly converted into a string to
	 * represent its structure.
	 * @param int $level (optional) Message level. Can be one of the constants:
	 * <ul>
	 * <li><code>Log::SUCCESS</code></li>
	 * <li><code>Log::NORMAL</code></li>
	 * <li><code>Log::INFO</code></li>
	 * <li><code>Log::WARNING</code></li>
	 * <li><code>Log::ERROR</code></li>
	 * <li><code>Log::DEBUG</code></li>
	 * </ul>
	 * Default is Log::NORMAL.
	 * @param sting $type (optional) It can be either
	 * <code>Log::MESSAGE_SHORT</code> or <code>Log::MESSAGE_COMPLETE</code>.
	 * @param string $applicationName (optional) Application name. If this
	 * parameter is set then the message will be added to the log of the given
	 * application. If it is the keyword <code>global</code>, the message will
	 * be added to the global log. And if it is omitted, the message will be
	 * added to the current application.
	 */
	public static function add($message, $level = self::NORMAL, $type = null, $applicationName = null)
	{
		if(self::isWritable($applicationName))
		{
			$lang = Language::getCurrent();
			$currentError = Error::getScriptError();
			$msg = '';
			$dirLogPath = self::getCurrentDirPath($applicationName);
			$fileName = date('d') . '.txt';

			// creates the file if it doesn't exist
			// the file name is the current date plus the .txt extension
			if(!File::exists($dirLogPath . $fileName))
			{
				$f = File::create($dirLogPath . $fileName);
				$f->changePermissions(0666);
			}
			else
			{
				$f = new File($dirLogPath . $fileName);
			}

			$formatType = isset($type) ? $type : LocalConfiguration::get('log.format.type');

			if(!Enviroment::isWebEnviroment())
				$formatType = self::MESSAGE_SHORT;

			if(empty($level))
				$level = self::NORMAL;

			if(is_object($message) || is_array($message))
				$message = print_r($message, true);

			switch($formatType)
			{
				case self::MESSAGE_SHORT:
					$msg = sprintf(
						'%s [%s]: %s',
						date('H:i:s'),
						self::$messageTypes[$level],
						$message
					);
					break;
				case self::MESSAGE_COMPLETE:
					$msg = sprintf(
						"%s [%s]: %s\n\nURI: %s\nHost: %s\n%s: %s:%s\nBrowser: %s",
						date('H:i:s'),
						self::$messageTypes[$level],
						$message,
						(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : ''),
						(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ''),
						$lang->getSentence('log.requestAddr'),
						(isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : ''),
						(isset($_SERVER['REMOTE_PORT']) ? $_SERVER['REMOTE_PORT'] : ''),
						(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '')
					);
					break;
				default:
					throw new Error($lang->getSentence('log.invalidFormat'), Configuration::MISSING_CONFIGURATION);
					break;
			}

			$msg .= self::LINE_SEPARATOR;

			$f->appendLine($msg);
			$f->close();

			if(Error::getScriptError())
			{
				if($currentError !== Error::getScriptError())
				{
					$errorMsg = Error::getScriptError();
					throw new Error($errorMsg, Error::GENERAL_ERROR);
				}
			}
		}
	}

	/**
	 * Check whether the log directory has permission to write to files.
	 *
	 * Note that the current directory change every month, since its path is
	 * based on the current date.
	 * @param string $applicationName (optional) Application name. Can be the
	 * name of an applicatoin, null (to get the current application) or the
	 * keyword <code>global</code> to force the global log.
	 * @return boolean Return true if the log directory is writable, or false
	 * otherwise.
	 */
	public static function isWritable($applicationName = null)
	{
		$isWritable = false;
		$tempFile = self::getCurrentDirPath($applicationName) . 'log' . microtime();

		if(touch($tempFile))
		{
			unlink($tempFile);
			$isWritable = true;
		}

		return $isWritable;
	}

	/**
	 * Return the log directory for the current date. Note that the current
	 * directory change every month, since its path is based on the current
	 * date.
	 * @param string $applicationName (optional) Application name. Can be the
	 * name of an applicatoin, null (to get the current application) or the
	 * keyword <code>global</code> to force the global log.
	 * @return string Returns the path of the log directory.
	 */
	public static function getCurrentDirPath($applicationName = null)
	{
		$dirLogPath = null;
		$dirPath = date('Y') . Enviroment::DIR_SEP . date('m') . Enviroment::DIR_SEP;
		$applicationName = self::resolveApplication($applicationName);

		if(is_string($applicationName) && ($applicationName != 'global'))
		{
			$app = new Application($applicationName);
			$dirLogPath = $app->getPath('log') . $dirPath;
			$app->__destruct();
		}
		else
		{
			$dirLogPath = Enviroment::getPath('log') . $dirPath;
		}

		// creates the subfolder if it doesn't exist
		if(!Dir::exists($dirLogPath))
			Dir::create($dirLogPath)->__destruct();

		return $dirLogPath;
	}

	/**
	 * Returns the correct application to which log is gonna be used.
	 * @param mixed $applicationName An application name, <code>null</code> or
	 * the keyword <code>global</code>. In the case of <code>null</code>, the
	 * current application (if any) will be selected. If no application is
	 * running, the global log will be selected.
	 * @return string Returns the name of the selected application, or the
	 * keyword <code>global</code> to indicate the global log.
	 * @static
	 */
	protected static function resolveApplication($applicationName)
	{
		return empty($applicationName) ? (Application::getCurrent() ? Application::getCurrent()->getName() : 'global') : $applicationName;
	}
}
?>