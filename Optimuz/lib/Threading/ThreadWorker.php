<?php
/**
 * This file is used to handle threads.
 * @version 0.2
 * @package Threading
 */

/**
 * Class used to create a new thread.
 *
 * This implementation uses the file system to create a thread-like
 * functionality.
 * @author Diego Andrade
 * @package Threading
 * @since Optimuz 0.3
 * @version 0.3
 * @uses Threading
 * @uses DateTime.TimeSpan
 * @uses Lang
 * @uses Core.Object
 * @uses Core.LocalConfiguration
 * @uses Core.Log
 * @uses Core.Enviroment
 */
class ThreadWorker extends EventDispatcher
{
	/**
	 * The thread cannot be started.
	 */
	const CANNOT_START				= 3001;

	/**
	 * The thread is not started.
	 */
	const NOT_STARTED				= 3002;

	/**
	 * The thread was just created. Not started yet.
	 */
	const CREATED					= 1;

	/**
	 * The thread is running. The method Thread::start() was called.
	 */
	const RUNNING					= 2;

	/**
	 * The thread is paused. The method Thread::pause() was called.
	 */
	const PAUSED					= 3;

	/**
	 * The thread is stopped. The method Thread::stop() was called and the
	 * thread is already killed.
	 */
	const STOPPED					= 4;

	/**
	 * The thread is still running, but is waiting to be stopped. The method
	 * Thread::stop() was called.
	 */
	const WAITING_KILL				= 5;

	/**
	 * Thread internal ID.
	 * @var string
	 */
	protected $threadId				= null;

	/**
	 * Thread process ID on the OS.
	 * @var int
	 */
	protected $threadPid			= null;

	/**
	 * Thread status ID.
	 * @var int
	 */
	protected $threadStatus			= null;

	/**
	 * The interval on which the file associated with the thread will run.
	 * If this interval is greater the zero, then the associated file will
	 * run after the interval in a loop. If this interval is zero or not setted,
	 * the file will run once and stop.
	 *
	 * This interval is measured in seconds.
	 * @var int
	 */
	protected $threadInterval		= null;

	/**
	 * Creates a new instance of the class.
	 * @param string $id ID of a running thread.
	 * Default is zero.
	 */
	public function __construct($id)
	{
		$this->threadId = $id;
		$this->threadStatus = self::CREATED;
		$this->initializeEvents();
	}

	/**
	 * Initializes the events of the thread.
	 *
	 * The available events are:
	 * <ul>
	 * <li><code>start</code></li>
	 * <li><code>complete</code></li>
	 * <li><code>crash</code></li>
	 * </ul>
	 */
	protected function initializeEvents()
	{
		parent::initializeEvents();
		$this->events->add('start');
		$this->events->add('complete');
		$this->events->add('crash');
	}

	/**
	 * Starts the thread giving it an action to execute.
	 * @param string $action Action to execute. See
	 * <code>Thread::create()</code> for more details.
	 * @param array $params (optimal) Array of parameters to pass to the action
	 * that will be executed.
	 */
	public function start($action, array $params = array())
	{
		if($this->threadStatus == self::CREATED)
		{
			$steps = 0;
			$this->threadStatus = self::RUNNING;
			$this->save();
			$this->trigger('start');

			if(is_int($this->threadInterval) && ($this->threadInterval > 0))
			{
				while($this->executeAction($action, $params))
				{
					$steps++;
					sleep($this->threadInterval);
				}
			}
			else
			{
				$steps++;
				$this->executeAction($action, $params);
			}

			$this->threadStatus = self::STOPPED;
			$this->remove();
			$this->trigger('complete');

			if(LocalConfiguration::get('threading.log.enable'))
				Log::add(Language::getInstance('Threading')->getSentence('msg.exitingWorker', $this->threadId, $steps), Log::NORMAL, null, 'global');
		}
		else
		{
			throw new ThreadError(Language::getInstance('Threading')->getSentence('error.cannotStart', $this->threadStatus), self::CANNOT_START);
		}
	}

	/**
	 * Executes the file associated with this thread and returns a boolean.
	 *
	 * Returns true on success of false on errors or if the thread is not
	 * available anymore.
	 * @param string $action Action to execute. See
	 * <code>Thread::create()</code> for more details.
	 * @param array $params Array of parameters.
	 * @return bool
	 */
	protected function executeAction($action, array $params)
	{
		if(LocalConfiguration::get('threading.log.enable'))
			Log::add(Language::getInstance('Threading')->getSentence('msg.executingAction', $this->threadId), Log::NORMAL, null, 'global');

		$result = false;
		$this->update();

		switch($this->threadStatus)
		{
			case self::RUNNING:
				try
				{
					$result = Caller::call($action, array($params));
				}
				catch(Error $error)
				{
					Report::sendError(new ThreadError($error));
					$result = true;
				}

				if(!is_bool($result))
					$result = true;
				break;
			case self::PAUSED:
				$result = true;
				break;
			default:
				break;
		}

		if(LocalConfiguration::get('threading.log.enable'))
			Log::add(Language::getInstance('Threading')->getSentence('msg.executedAction', $this->threadId, $this->threadStatus, $result, Enviroment::getUsedMemory(), Enviroment::getMemoryLimit()), Log::NORMAL, null, 'global');

		return $result;
	}

	/**
	 * Pauses the thread.
	 *
	 * The thread is still alive but the associated file will not be
	 * executed until the thread is resumed.
	 */
	public function pause()
	{
		if(LocalConfiguration::get('threading.log.enable'))
			Log::add(Language::getInstance('Threading')->getSentence('msg.pausingWorker', $this->threadId), Log::NORMAL, null, 'global');

		$this->threadStatus = self::PAUSED;
		$this->save();
	}

	/**
	 * Resumes the thread.
	 *
	 * The associated file will be executed again.
	 */
	public function resume()
	{
		if(LocalConfiguration::get('threading.log.enable'))
			Log::add(Language::getInstance('Threading')->getSentence('msg.resumingWorker', $this->threadId), Log::NORMAL, null, 'global');

		$this->threadStatus = self::RUNNING;
		$this->save();
	}

	/**
	 * Stops the thread.
	 *
	 * A signal will be sent to the thread so it can be stopped on the next run.
	 * It is also removed from the pool.
	 */
	public function stop()
	{
		if(LocalConfiguration::get('threading.log.enable'))
			Log::add(Language::getInstance('Threading')->getSentence('msg.stoppingWorker', $this->threadId), Log::NORMAL, null, 'global');

		if(($this->threadStatus == self::RUNNING) || ($this->threadStatus == self::PAUSED))
		{
			$this->threadStatus = self::WAITING_KILL;
			$this->save();
		}
		else
		{
			$this->threadStatus = self::STOPPED;
			$this->remove();
		}
	}

	/**
	 * Kills the thread.
	 *
	 * The thread will be killed and removed from the pool.
	 */
	public function kill()
	{
		if(Enviroment::isWindows())
		{
			exec("taskkill /F /T /PID {$this->threadPid}", $output, $exitCode);
		}
		else
		{
//			exec("kill -9 {$this->threadPid}", $output, $exitCode);
			if(posix_kill($this->threadPid, 9))
				$exitCode = 0;
			else
				$exitCode = -1;
		}

		if($exitCode === 0)
			$this->remove();

		if(LocalConfiguration::get('threading.log.enable'))
			Log::add(Language::getInstance('Threading')->getSentence('msg.killingWorker', $this->threadId, $this->threadPid, $exitCode), Log::NORMAL, null, 'global');
	}

	/**
	 * Sets the thread PID (proccess identifier).
	 * @param int $pid PID.
	 */
	public function setPid($pid)
	{
		$this->threadPid = (int)$pid;
	}

	/**
	 * Returns the thread PID (OS proccess identifier).
	 * @return int
	 */
	public function getPid()
	{
		return $this->threadPid;
	}

	/**
	 * Returns the thread ID.
	 * @return int
	 */
	public function getId()
	{
		return $this->threadId;
	}

	/**
	 * Sets the thread status.
	 * @param int $status The status can be one of the constants:
	 * <code>ThreadWorker::CREATED</code>, <code>ThreadWorker::RUNNING</code>,
	 * <code>ThreadWorker::PAUSED</code>, <code>ThreadWorker::STOPPED</code> or
	 * <code>ThreadWorker::WAITING_KILL</code>.
	 */
	public function setStatus($status)
	{
		$this->threadStatus = $status;
	}

	/**
	 * Returns the thread status.
	 * @return int
	 */
	public function getStatus()
	{
		return $this->threadStatus;
	}

	/**
	 * Sets the thread execution interval.
	 * @param TimeSpan|int $seconds Interval of execution. It can be a timestamp
	 * or a TimeSpan object.
	 */
	public function setInterval($seconds)
	{
		$this->threadInterval = is_object($seconds) && ($seconds instanceof TimeSpan) ? $seconds->getSeconds() : (int)$seconds;
	}

	/**
	 * Returns the thread execution interval.
	 * @return int Returns the interval in seconds.
	 */
	public function getInterval()
	{
		return $this->threadInterval;
	}

	/**
	 * Returns whether the thread is still running.
	 * @return bool Returns true if the thread is running, or false otherwise.
	 */
	public function isRunning()
	{
		return $this->threadStatus == self::RUNNING;
	}

	/**
	 * Saves the thread information.
	 */
	public function save()
	{
		if(function_exists('eaccelerator_put'))
		{
			eaccelerator_put("thread{$this->threadId}", array($this->threadPid, $this->threadInterval, $this->threadStatus));
		}
		else
		{
			$basePath = Enviroment::getPath('temp') . 'threads/pool/';

			if(!Dir::exists($basePath))
				Dir::create($basePath);

			$f = File::create($basePath . $this->threadId . '.pid');
			$f->lock(true);
			$f->write("{$this->threadPid},{$this->threadInterval},{$this->threadStatus}");
			$f->unlock();
			$f->close();
		}
	}

	/**
	 * Updates the thread information from the cache (memory or file).
	 */
	public function update()
	{
		$meta = array(null, null, null);

		if(function_exists('eaccelerator_get'))
		{
			$meta = eaccelerator_get("thread{$this->threadId}");
		}
		else
		{
			$filePath = Enviroment::getPath('temp') . 'threads/pool/' . $this->threadId . '.pid';

			if(File::exists($filePath))
			{
				$f = File::open($filePath);
				$meta = Text::split(',', $f->read());
				$f->close();
			}
		}

		$this->threadPid = (int)$meta[0];
		$this->threadInterval = (int)$meta[1];
		$this->threadStatus = ThreadWorkerPool::checkProcessStatus($this->threadPid) == self::RUNNING ? (int)$meta[2] : self::STOPPED;
	}

	/**
	 * Removes the files associated with the thread.
	 */
	protected function remove()
	{
		if(File::exists(Enviroment::getPath('temp') . 'threads/pool/' . $this->threadId . '.pid'))
			File::remove(Enviroment::getPath('temp') . 'threads/pool/' . $this->threadId . '.pid');

		if(File::exists(Enviroment::getPath('temp') . 'threads/' . $this->threadId . '.includes'))
			File::remove(Enviroment::getPath('temp') . 'threads/' . $this->threadId . '.includes');
	}

	/**
	 * Magic method used to return a populated object of this class.
	 * @param array $properties Associative array with properties to populate
	 * the new object.
	 * @return object
	 */
	public static function __set_state(array $properties)
	{
		$obj = new self($properties['threadId']);

		foreach($properties as $key => $value)
			$obj->$key = $value;

		return $obj;
	}
}
?>