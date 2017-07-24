<?php
/**
 * This file is used to handle threads.
 * @version 0.1
 * @package Threading
 */

/**
 * Class used to manage available threads. It uses the file system to write text
 * files so it can track the threads' statuses and save/recover information.
 * @author Diego Andrade
 * @package Threading
 * @since Optimuz 0.3
 * @version 0.1.1
 * @static
 * @uses Threading
 * @uses Core.Load
 * @uses IO
 * @uses Lang
 * @uses Core.Enviroment
 */
class ThreadWorkerPool
{
	/**
	 * Path of the directory where the thread files will be stored.
	 * @var string
	 * @static
	 */
	protected static $poolPath			= null;
	
	/**
	 * Instance of current thread.
	 * @var ThreadWorker
	 * @static
	 */
	protected static $currentThread		= null;

	/**
	 * Initializes the thread pool.
	 * @static
	 */
	public static function initialize()
	{
		self::$poolPath = Enviroment::getPath('temp') . 'threads/pool/';

		if(!Dir::exists(self::$poolPath))
			Dir::create(self::$poolPath);
	}

	/**
	 * Returns a thread worker from the thread pool.
	 *
	 * If the given ID is invalid a null value will be returned.
	 * @param string $id The thread ID.
	 * @return ThreadWorker
	 * @static
	 */
	public static function get($id)
	{
		// auto initializes the thread pool
		if(!self::isInitialized())
			self::initialize();

		$worker = null;

		if(self::exists($id))
		{
			$worker = new ThreadWorker($id);
			$worker->update();
		}

		return $worker;
	}

	/**
	 * Checks whether a worker for the thread with the given ID exists.
	 * @param string $id The thread ID.
	 * @static
	 * @return bool
	 */
	public static function exists($id)
	{
		// auto initializes the thread pool
		if(!self::isInitialized())
			self::initialize();

		return File::exists(self::$poolPath . $id . '.pid');
	}

	/**
	 * Returns an indexed array with the PIDs of the available threads.
	 * @return array
	 */
	public static function getThreadIds()
	{
		// auto initializes the thread pool
		if(!self::isInitialized())
			self::initialize();

		$d = Dir::open(self::$poolPath);
		$ids = array();

		foreach($d->getFiles() as $f)
			$ids[] = Text::split('.', $f->getName())->getFirst();

		return $ids;
	}

	/**
	 * Checks whether the pool is inialized.
	 * @return bool
	 */
	public static function isInitialized()
	{
		return is_string(self::$poolPath);
	}
	
	/**
	 * Sets the current thread worker.
	 * @param ThreadWorker $thread A running thread.
	 */
	public static function setCurrentThread(ThreadWorker $thread)
	{
		self::$currentThread = $thread;
	}
	
	/**
	 * Returns the current thread worker.
	 * @return ThreadWorker The current running thread. If no thread was started
	 * by a ThreadWorker instance, a null value is returned.
	 */
	public static function getCurrentThread()
	{
		return self::$currentThread;
	}
	
	/**
	 * Checks whether a thread is still running on the OS.
	 * @param int $pid Thread PID.
	 * @return int Returns <code>ThreadWorker::RUNNING</code> if the thread is 
	 * running, or <code>ThreadWorker::STOPPED</code> otherwise.
	 * @static
	 */
	public static function checkProcessStatus($pid)
	{
		$status = ThreadWorker::STOPPED;
		
		if(Enviroment::isWindows())
		{
			exec("tasklist /FI \"PID eq {$pid}\" /NH", $output);
			$output = implode("\n", $output);
			
			if(!empty($output))
			{
				if(preg_match("#php\.exe\s+{$pid}\s+#m", $output))
					$status = ThreadWorker::RUNNING;
			}
		}
		else
		{
			exec("ps p {$pid} o pid --no-heading", $output);
			
			if(is_array($output) && !empty($output))
			{
				if(intval(trim($output[0])) == $pid)
					$status = ThreadWorker::RUNNING;
			}
		}
		
		return $status;
	}
}
?>