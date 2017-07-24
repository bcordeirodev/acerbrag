<?php
/**
 * This file sets a class to work with profiling.
 * @version 0.1
 * @package Debug
 */

/**
 * Class used to profile actions inside PHP code. This is useful to measure
 * performance of certain pieces of code.
 *
 * Uses the Singleton design pattern.
 * @author Diego Andrade
 * @package Debug
 * @since Optimuz 0.3
 * @version 0.1
 * @uses DateTime
 * @uses Core
 */
class Profiler extends Object
{
	/**
	 * Key does not exists in array.
	 */
	const KEY_NOT_EXISTS			= 300;

	/**
	 * Two non named jobs at the same time.
	 */
	const DOUBLE_NON_NAMED_JOBS		= 301;

	/**
	 * Job cannot be stopped.
	 */
	const CANNOT_STOP				= 302;

	/**
	 * Job cannot be restarted.
	 */
	const CANNOT_RESTART_JOB		= 303;

	/**
	 * Profiler started.
	 */
	const STARTED					= 1;

	/**
	 * Profiler stopped.
	 */
	const STOPPED					= 0;

	/**
	 * Object used as a global object to profile the global execution of the
	 * script.
	 * @var Profiler
	 * @static
	 */
	private static $instance		= null;

	/**
	 * This array stores the all timestamps added to the profiler.
	 * @var array
	 */
	private $times					= null;

	/**
	 * This array stores the all timestamps added to the profiler by the
	 * Profiler::tick() method.
	 * @var array
	 */
	private $ticks					= null;

	/**
	 * Current status.
	 * @var int
	 */
	private $status					= null;

	/**
	 * Current job name.
	 * @var string
	 */
	private $currentJobName			= null;

	/**
	 * Method called when new instance is created.
	 */
	public function __construct()
	{
		$this->times = array();
		$this->ticks = array();
		$this->status = self::STOPPED;
	}

	/**
	 * Returns the global instance of this class. This instance can be used
	 * to profile global execution.
	 *
	 * The instance is created the first time this method is called and remains
	 * until the end of the script execution.
	 * @return Profiler
	 * @static
	 */
	public static function getInstance()
	{
		if(is_null(self::$instance))
			self::$instance = new self();

		return self::$instance;
	}

	/**
	 * Starts a new job and assign a name to it. Many jobs can run at the same
	 * time, but only if they are named. If no name is specified, the profiler
	 * will assume the name as being the number of items in the Profiler::$times
	 * array, i.e., the name will be an index.
	 *
	 * When a job is started without a name, it must be finished before other
	 * job can be started. If two non named jobs are started, an exception will
	 * be thrown.
	 *
	 * @param string $name (optimal) An alias to the entry. If given, the array
	 * returned by the Profiler::getResults() method will be an associative
	 * array wich the keys are the alias given in this method. Otherwise, the
	 * array will be an indexed array. Default is null, wich will generate an
	 * indexed array (and will block the profiler to starts concurrent jobs).
	 * @see Profiler::tick()
	 * @see Profiler::stop()
	 */
	public function start($name = null)
	{
		$isStringName = is_string($name);

		if($isStringName || ($this->status == self::STOPPED))
		{
			if($isStringName ? !isset($this->times[$name]) : true)
			{
				$this->status = self::STARTED;
				$arr = array('started' => Date::timestamp(true), 'finished' => null, 'elapsed' => null);
				$this->currentJobName = $isStringName ? $name : count($this->times);

				$this->times[$this->currentJobName] = $arr;
			}
			else
			{
				throw new DebugError("The job '{$name}' is already started", self::CANNOT_RESTART_JOB);
			}
		}
		else
		{
			if($this->status == self::STARTED)
				throw new DebugError("Can't start two non named jobs at the same time", self::DOUBLE_NON_NAMED_JOBS);
		}
	}

	/**
	 * Stops a job and returns an array with the results. The array has three
	 * keys: started, finished and elapsed.
	 *
	 * If no name is specified, the profiler will try to stop the current
	 * indexed job, what will make possible to start a new indexed job. But if
	 * a name is specified, the profiler will try to stop the job with that
	 * name.
	 *
	 * If there's no job with the given name, an exception will be thrown.
	 * @param string $name (optimal) The name of a started job.
	 * @return array
	 * @see Profiler::start()
	 * @see Profiler::getResults()
	 */
	public function stop($name = null)
	{
		$this->status = self::STOPPED;
		$arr = null;

		if(is_null($name))
			$name = $this->currentJobName;

		if(isset($this->times[$name]))
		{
			if(is_null($this->times[$name]['finished']))
			{
				$this->currentJobName = null;
				$this->times[$name]['finished'] = Date::timestamp(true);
				$this->times[$name]['elapsed'] = $this->times[$name]['finished'] - $this->times[$name]['started'];
				$arr = $this->times[$name];
			}
			else
			{
				throw new DebugError('Invalid key name', self::CANNOT_STOP);
			}
		}
		else
		{
			throw new DebugError('Invalid key name', self::KEY_NOT_EXISTS);
		}

		return $arr;
	}

	/**
	 * Adds a new time entry to the tick array.
	 * @param string $name (optimal) An alias to the entry. If given, the array
	 * returned by the Profiler::getTickResults() method will be an associative
	 * array wich the keys are the alias given in this method. Otherwise, the
	 * array will be an indexed array. Default is null, wich will generate an
	 * indexed array.
	 * @see Profiler::getTickResults()
	 */
	public function tick($name = null)
	{
		$ts = Date::timestamp(true);

		if(is_string($name))
			$this->ticks[$name] = $ts;
		else
			$this->ticks[count($this->ticks)] = $ts;
	}

	/**
	 * Returns the current status of the profiler object.
	 * @return int
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * Returns the times array.
	 * @return array
	 */
	public function getTimes()
	{
		return $this->times;
	}

	/**
	 * Returns the ticks array.
	 * @return array
	 */
	public function getTicks()
	{
		return $this->ticks;
	}

	/**
	 * Returns an array with the elapsed times between each entry in the
	 * Profiler::$times array and a special value named total_elapsed, which is
	 * the elapsed time between the first entry start time and the last entry
	 * finish time.
	 * @return array
	 */
	public function getResults()
	{
		$results = array();

		if(count($this->times) > 0)
		{
			$times = array_values($this->times);

			foreach($this->times as $key => $arr)
			{
				if(is_string($key))
					$results[$key] = $arr['elapsed'];
				else
					$results[] = $arr['elapsed'];
			}

			$first = reset($this->times);
			$last = end($this->times);
			$results['total_elapsed'] = $last['started'] - $first['finished'];
		}

		return $results;
	}

	/**
	 * Returns an array with the elapsed times between each entry in the
	 * Profiler::$ticks array.
	 * @return array
	 */
	public function getTickResults()
	{
		$results = array();

		if(count($this->ticks) > 0)
		{
			$i = -1;
			$ticks = array_values($this->ticks);
			$elapsedTime = null;

			foreach($this->ticks as $key => $value)
			{
				if(++$i > 0)
					$elapsedTime = $ticks[$i] - $ticks[$i - 1];
				else
					$elapsedTime = 0;

				if(is_string($key))
					$results[$key] = $elapsedTime;
				else
					$results[] = $elapsedTime;
			}
		}

		return $results;
	}
}
?>