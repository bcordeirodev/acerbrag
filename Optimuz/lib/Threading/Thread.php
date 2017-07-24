<?php
/**
 * This file is used to handle threads.
 * @version 0.5
 * @package Threading
 */

/**
 * Class used to create a new thread.
 *
 * This implementation uses HTTP requests and responses to create a thread-like
 * functionality. So to create a new thread you need to send a HTTP request to
 * a PHP script that will start the thread with this class.
 * @author Diego Andrade
 * @package Threading
 * @since Optimuz 0.3
 * @version 0.5
 * @static
 * @uses Threading
 * @uses Lang
 * @uses Core.Enviroment
 * @uses Core.Log
 * @uses Core.Load
 * @uses Core.Configuration
 * @uses IO
 */
class Thread
{
	/**
	 * There was an error when attempting to start the thread.
	 */
	const START_ERROR				= 3000;

	/**
	 * The thread waited to long to be started.
	 */
	const TIMEOUT_ERROR				= 3001;

	/**
	 * Default timeout for new threads (5s).
	 */
	const TIMEOUT					= 5;

	/**
	 * Type of the command used to create the thread.
	 * @var string
	 */
	private static $type	= null;

	/**
	 * Starts the thread giving it an action to execute. This action can be
	 * either an object and a method or just a function.
	 *
	 * When the thread is started it is added to the pool. The pool is managed
	 * by the ThreadPool class.
	 *
	 * If the thread is already started it will throw a ThreadError.
	 *
	 * Returns the ThreadWorker object for the thread on success, or a null
	 * value on errors.
	 * @param mixed $action An action can be a function name, a static method in
	 * the form of <code>Class::method</code> or an array of object and method.
	 * In the case it is an array, the first item is an object or a class name,
	 * and the second is the method name. The method must to be static.
	 * @param int $interval (optimal) The interval on which the file associated
	 * with the thread will run. If this interval is greater the zero, then the
	 * associated file will run after the interval in a loop. If this interval
	 * is zero or not setted, the file will run once and stop.
	 *
	 * This interval is measured in seconds.
	 *
	 * Throws an ThreadError if the limit configured in threading.limit has been
	 * reached.
	 * @param array $params (optimal) Array of parameters to pass to the
	 * thread. Values can be string or number. Booleans are passed as string.
	 * @return ThreadWorker
	 * @static
	 */
	public static function create($action, $interval = 0, array $params = array())
	{
		$limit = (int)LocalConfiguration::get('threading.limit');

		if($limit > 0 ? count((ThreadWorkerPool::getThreadIds())) < $limit : true)
		{
			if(is_null(self::$type))
				self::$type = Enviroment::isWindows() ? 'Com' : 'Unix';

			if(LocalConfiguration::get('threading.log.enable'))
				Log::add(Language::getInstance('Threading')->getSentence('msg.creatingThread'), Log::NORMAL, null, 'global');

			try
			{
				if(is_callable($action))
				{
					$paramsStr = '';

					if(!empty($params))
					{
						foreach($params as $value)
						{
							if(is_int($value))
								$paramsStr .= "{$value} ";
							elseif(is_string($value))
								$paramsStr .= '"' . addslashes($value) . '" ';
							elseif(is_bool($value))
								$paramsStr .= '"' . $value . '" ';
						}
					}

					// action
					if(is_array($action))
						$action = (is_object($action[0]) ? get_class($action[0]) : $action[0]) . '::' . $action[1];

					// include file
					$includedFiles = var_export(Load::getLoadedFiles(), true);
					$id = md5(uniqid(microtime() . mt_srand() . sha1($paramsStr) . mt_srand(), true));
					$includesPath = Enviroment::getPath('temp') . "threads/{$id}.includes";
					$includesFile = File::create($includesPath);
					$includesFile->write("<?php\nreturn {$includedFiles};\n");
					$includesFile->close();

					// create the thread
					$interval = !is_numeric($interval) || ($interval < 0) ? 0 : $interval;
					$methodName = 'create' . self::$type;
					$worker = self::$methodName($action, $includesPath, $interval, $paramsStr, $id);
				}
				else
				{
					throw new ThreadError(Language::getInstance('Threading')->getSentence('error.fileNotFound'), File::NOT_EXISTS);
				}
			}
			catch(Error $ex)
			{
				throw new ThreadError('[ERROR] ' . $ex->getMessage() . "\n" . $ex->getTraceAsString(), $ex->getCode());
			}
			catch(com_exception $ex)
			{
				throw new ThreadError('[COM_EXCEPTION] ' . $ex->getMessage() . "\n" . $ex->getTraceAsString(), $ex->getCode());
			}
			catch(Exception $ex)
			{
				throw new ThreadError('[EXCEPTION] ' . $ex->getMessage() . "\n" . $ex->getTraceAsString(), $ex->getCode());
			}

			return $worker;
		}
		else
		{
			throw new ThreadError(Language::getInstance('Threading')->getSentence('error.limitError', $limit), self::START_ERROR);
		}
	}

	/**
	 * Creates the thread using a COM component. It uses the WScript.Shell to
	 * execute the thread. Valid only for Windows OS.
	 * @param $action Name of the action to run. The action can be a
	 * function or a static method.
	 * @param string $includesPath Path to the file with the list of files to
	 * include when the $targetFile is executed.
	 * @param int $interval Interval of execution in seconds.
	 * @param string $paramsStr Parameters to pass to the thread. Parameters
	 * must to be separated by space.
	 * @param string $id The thread ID.
	 * @return ThreadWorker
	 * @static
	 * @see Thread::create()
	 */
	protected static function createCom($action, $includesPath, $interval, $paramsStr, $id)
	{
		$worker = null;

		// create the thread
		$coreFile =  Enviroment::getPath('packages') . 'Threading/runThreadScript.php';
		$appName = Application::getCurrent()->getName();
		$resource = new COM('WScript.Shell');
		$conf = self::getPHPIniPath();
		$program = $resource->Exec("php -c \"{$conf}\" \"{$coreFile}\" \"{$action}\" \"{$id}\" {$interval} {$appName} {$paramsStr}");

		if($program->ExitCode == 0)
		{
			// return the worker of the new thread
			$worker = new ThreadWorker($id);
			$worker->setInterval($interval);
			$worker->setPid($program->ProcessID);
			$worker->save();
			self::waitStart($worker);

			if(ThreadWorkerPool::checkProcessStatus($worker->getPid()) != ThreadWorker::RUNNING)
			{
				$worker->stop();
				$errorFilePath = Enviroment::getPath('temp') . "threads/{$id}.err";

				if(File::exists($errorFilePath))
				{
					$errorFile = File::open($errorFilePath);
					$error = $errorFile->read();
					$errorFile->close();
					File::remove($errorFilePath);
				}
				else
				{
					$error = Language::getInstance('Threading')->getSentence('error.unexpectedEndError', $action);
				}

				throw new ThreadError($error, self::START_ERROR);
			}
		}
		else
		{
			if(File::exists($includesPath))
				File::remove($includesPath);

			throw new ThreadError(Language::getInstance('Threading')->getSentence('error.startError') . ' [' . $program->ExitCode . '] ' . $program->StdErr->ReadAll(), self::START_ERROR);
		}

		return $worker;
	}

	/**
	 * Creates the thread using the <code>proc_*</code> functions. It uses the
	 * command line to execute the thread without calling cron. Valid only for
	 * Unix OS.
	 * @param string $action Name of the action to run. The action can be a
	 * function or a static method.
	 * @param string $includesPath Path to the file with the list of files to
	 * include when the $targetFile is executed.
	 * @param int $interval Interval of execution in seconds.
	 * @param string $paramsStr Parameters to pass to the thread. Parameters
	 * must to be separated by space.
	 * @param string $id The thread ID.
	 * @return ThreadWorker
	 * @static
	 * @see Thread::create()
	 */
	protected static function createUnix($action, $includesPath, $interval, $paramsStr, $id)
	{
		$worker = null;

		// create the thread
		$coreFile =  Enviroment::getPath('packages') . 'Threading/runThreadScript.php';
		$appName = Application::getCurrent()->getName();

		$desc = array(
			0 => array('pipe', 'r'), // we use to write data
			1 => array('pipe', 'w'), // we use to read data
			2 => array('pipe', 'w') // errors' log
		);
		$conf = self::getPHPIniPath();
		$process = proc_open("exec php -c \"{$conf}\" \"{$coreFile}\" \"{$action}\" \"{$id}\" {$interval} {$appName} {$paramsStr} &", $desc, $pipes);

		if(is_resource($process))
		{
			$status = proc_get_status($process);

			if($status['running'])
			{
				$pid = self::findUnixPid($action, $id);
//				$pid = $status['pid'];

				if(!empty($pid))
				{
					// return the worker of the new thread
					$worker = new ThreadWorker($id);
					$worker->setInterval($interval);
					$worker->setPid($pid);
					$worker->save();
//					$worker->setStatus(ThreadWorker::RUNNING); // this must to come after save()
					self::waitStart($worker);
				}
				else
				{
					$errorFilePath = Enviroment::getPath('temp') . "threads/{$id}.err";

					if(File::exists($errorFilePath))
					{
						$errorFile = File::open($errorFilePath);
						$error = $errorFile->read();
						$errorFile->close();
						File::remove($errorFilePath);
					}
					else
					{
						$error = Language::getInstance('Threading')->getSentence('error.unexpectedEndError', $action);
					}

					if(File::exists($includesPath))
						File::remove($includesPath);

					throw new ThreadError($error, self::START_ERROR);
				}
			}
			else
			{
				$error = stream_get_contents($pipes[2]);
				fclose($pipes[2]);

				if(File::exists($includesPath))
					File::remove($includesPath);

				throw new ThreadError(Language::getInstance('Threading')->getSentence('error.processError', $status['exitcode'], $error), self::START_ERROR);
			}
		}
		else
		{
			if(File::exists($includesPath))
				File::remove($includesPath);

			throw new ThreadError(Language::getInstance('Threading')->getSentence('error.startError'), self::START_ERROR);
		}

		return $worker;
	}

	/**
	 * Waits the thread to start before. This is done to give a chance to the
	 * thread start and update its status, so
	 * <code>ThreadWorker::isRunning()</code> returns true.
	 *
	 * The current timeout is fixed on 5s.
	 * @param ThreadWorker $worker The worker to check.
	 * @static
	 */
	protected static function waitStart(ThreadWorker $worker)
	{
		$timeout = time() + self::TIMEOUT;

		do
		{
			$status = ThreadWorkerPool::checkProcessStatus($worker->getPid());
			$worker->setStatus($status);

			if($status != ThreadWorker::RUNNING)
			{
				self::sleep(.1);
				$now = time();
			}
			else
			{
				break;
			}
		}
		while($now <= $timeout);
	}

	/**
	 * Tries to find the PID of the newly created thread.
	 *
	 * This method can try more then once to find the PID, so it can delay the
	 * script execution a bit. This is done to ensure that the PID cannot be
	 * found (in the case it really cannot be found, to avoid false positives).
	 * @param string $action The action string passed to the thread to
	 * execution.
	 * @param string $id The thread ID.
	 * @return mixed Returns the a string representing the PID, or null if the
	 * PID cannot be found (the process didn't start).
	 * @static
	 */
	protected static function findUnixPid($action, $id)
	{
		// this is a more secure way to get the right PID, because
		// proc_get_status() returns wrong PID
		$search = '[' . $action{0} . ']' . Text::substring($action, 1);
		$pid = null;
		$timeout = time() + self::TIMEOUT;

		do
		{
			$now = null;
			$output = null;
			exec("ps ax o pid,args | grep {$search}", $output);

			if(is_array($output) && !empty($output))
			{
				foreach($output as $line)
				{
					if(preg_match("#^\s*(\d+) php .+{$id}#m", $line, $match))
					{
						$pid = $match[1];
						break 2;
					}
				}
			}
			else
			{
				self::sleep(.1);
			}

			if(is_null($now))
				$now = time();
		}
		while($now <= $timeout);

		return $pid;
	}

	/**
	 * Returns the path for the php.ini file loaded by the current thread.
	 * @return string Path for php.ini file. Returns an empty string if the file
	 * cannot be determined.
	 * @static
	 */
	protected static function getPHPIniPath()
	{
		$conf = php_ini_loaded_file();

		if($conf !== false)
			$conf = Text::replace('\\', '/', $conf);
		else
			$conf = '';

		return $conf;
	}

	/**
	 * Delays execution of the current script for a given time.
	 * @param mixed $delay Number of seconds to delay execution. Can be
	 * expressed as integer or decimal.
	 * @static
	 */
	public static function sleep($delay)
	{
		usleep($delay * 1000000);
	}
}
?>
