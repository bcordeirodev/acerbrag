<?php
/**
 * This file is used to handle errors.
 * @version 0.5.1
 * @package Error
 */

/**
 * Class used to handle errors.
 *
 * It writes the error to the application log, and sends it for the e-mail
 * setted in the report.email.repor setting.
 * @author Diego Andrade
 * @package Error
 * @since Optimuz 0.1
 * @version 0.5.1
 * @uses Core.Enviroment
 * @uses Log
 * @uses Strings.Text
 * @uses Configuration
 * @uses Application
 * @uses Lang
 * @uses Email
 */
class Report
{
	/**
	 * Invalid message
	 */
	const INVALID_MESSAGE				= 1000;

	/**
	 * This is an array of current error objects.
	 *
	 * Every time that the Report::sendError() is called, the error object
	 * passed to it is pushed into this array. When the method finishes this
	 * array is cleaned.
	 * @var array
	 */
	protected static $currentErrors		= array();

	/**
	 * This is an array of error objects already processed by this class.
	 *
	 * When the method finishes this array is cleaned.
	 * @var array
	 */
	protected static $errorsSent		= array();

	/**
	 * Adds the error to the log and sends it by e-mail.
	 * @param object $error Any error object that extends the Error or Exception
	 * class.
	 * @return bool Returns true on success or false on errors.
	 * @static
	 */
	public static function sendError(Exception $error)
	{
		$success = false;
		$message = '';

		if(empty(self::$currentErrors))
		{
			// add the erro to the stack
			self::$currentErrors[] = $error;

			// error page variables
			$postData = var_export($_POST, true);
			$getData = var_export($_GET, true);
			$sessionData = var_export((isset($_SESSION) ? $_SESSION : array()), true);

			// language objects
			$errorLang = Language::getInstance('Error');
			$logLang = Language::getInstance('Log');

			try{
				$errorDescription = '';

				foreach(self::$currentErrors as $i => $error)
				{
					$errorType = get_class($error);
					$errorLine = "{$logLang->getSentence('log.line')} {$error->getLine()}";
					$errorFile = "{$logLang->getSentence('log.file')} {$error->getFile()}";
					$errorDescription .= "(# {$i}) {$error} ({$errorLine}, {$errorFile})\n";
					self::$errorsSent[] = $error;
				}

				$errorTrace = str_replace('#', '<br />#', htmlentities($error->getTraceAsString(), ENT_COMPAT, Text::detectEncoding($error->getTraceAsString()))); // last stack trace

				ob_start();
				require Enviroment::getPath('apps') . 'system' . Enviroment::DIR_SEP . 'layers' . Enviroment::DIR_SEP . 'view' . Enviroment::DIR_SEP . 'email' . Enviroment::DIR_SEP . 'Error.php';
				$message = ob_get_contents();
				@ob_end_clean();

				Log::add(Text::plain("{$errorDescription}\n\nPOST:\n{$postData}\n\nGET:\n{$getData}\n\nSESSION:\n{$sessionData}\n\nTrace:\n{$errorTrace}"), Log::ERROR);

				// send e-mail
				if(LocalConfiguration::get('report.enable') && LocalConfiguration::get('report.report'))
				{
					$firstError = reset(self::$currentErrors);
					$errorUid = $firstError instanceof Error ? "[{$firstError->getUid()}]" : '';
					$errorSubject = '';

					if(Enviroment::isWebEnviroment())
						$errorSubject = $_SERVER['HTTP_HOST'];
					elseif(ThreadWorkerPool::getCurrentThread())
						$errorSubject = 'thread ' . ThreadWorkerPool::getCurrentThread()->getId();
					else
						$errorSubject = 'script';

					$mail = new Mail();
					$mail->setFrom(LocalConfiguration::get('report.error'));
					$mail->addTo(LocalConfiguration::get('report.report'));
					$mail->setSubject($errorLang->getSentence('email.messageSubject', $errorSubject, $errorUid));
					$mail->setMessage($message);

					$success = $mail->send();
				}
				else
				{
					$success = true;
				}

				if(!$success)
					Log::add($mail->getError(), Log::ERROR);
			}
			catch(Exception $ex){
				self::$currentErrors[] = $ex;
				$errorDescription = '';
				$success = false;

				foreach(self::$currentErrors as $i => $error)
				{
					if(!in_array($error, self::$errorsSent))
					{
						$errorType = get_class($error);
						$errorLine = "{$logLang->getSentence('log.line')} {$error->getLine()}";
						$errorFile = "{$logLang->getSentence('log.file')} {$error->getFile()}";
						$errorDescription .= "(# {$i}) {$error} ({$errorLine}, {$errorFile})\n";
					}
				}

				$errorTrace = $error->getTraceAsString(); // last stack trace
				Log::add(Text::plain("{$errorDescription}\n\nPOST:\n{$postData}\n\nGET:\n{$getData}\n\nSESSION:\n{$sessionData}\n\nTrace:\n{$errorTrace}"), Log::ERROR, Log::MESSAGE_COMPLETE);
			}

			self::$currentErrors = array();
			self::$errorsSent = array();
		}
		else
		{
			self::$currentErrors[] = $error;
			$success = true;
		}

		return $success;
	}
}
?>
