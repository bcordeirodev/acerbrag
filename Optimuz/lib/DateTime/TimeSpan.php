<?php
/**
 * This file sets a class to work with dates.
 * @version 0.2
 * @package DateTime
 */

/**
 * This class represents a period, that can be expressed from miliseconds to
 * years. It is used in calculations between dates.
 * @author Diego Andrade
 * @package DateTime
 * @since Optimuz 0.2
 * @version 0.1
 * @uses Core
 * @uses DateTime
 */
class TimeSpan extends Object
{
	/**
	 * Number of days in the object.
	 * @var int
	 * @see TimeSpan::setDays()
	 * @see TimeSpan::getDays()
	 */
	private $days						= null;

	/**
	 * Number of hours in the object.
	 * @var int
	 * @see TimeSpan::setHours()
	 * @see TimeSpan::getHours()
	 */
	private $hours						= null;

	/**
	 * Number of minutes in the object.
	 * @var int
	 * @see TimeSpan::setMinutes()
	 * @see TimeSpan::getMinutes()
	 */
	private $minutes					= null;

	/**
	 * Number of seconds in the object.
	 * @var int
	 * @see TimeSpan::setSeconds()
	 * @see TimeSpan::getSeconds()
	 */
	private $seconds					= null;

	/**
	 * Number of milliseconds in the object.
	 * @var int
	 * @see TimeSpan::setMilliseconds()
	 * @see TimeSpan::getMilliseconds()
	 */
	private $milliseconds				= null;

	/**
	 * A new instance is created with time setted to zero.
	 */
	public function __construct()
	{
		$this->milliseconds = 0;
	}

	/**
	 * Updates the object based on the its milliseconds.
	 */
	private function setValues()
	{
		if(function_exists('bcdiv'))
		{
			$this->seconds = (float)bcdiv($this->milliseconds, 1000, 2);
			$this->minutes = (float)bcdiv($this->milliseconds, 60000, 2);
			$this->hours = (float)bcdiv($this->milliseconds, 3600000, 2);
			$this->days = (float)bcdiv($this->milliseconds, 86400000, 2);
		}
		else
		{
			$this->seconds = round(($this->milliseconds / 1000), 2);
			$this->minutes = round(($this->milliseconds / 60000), 2);
			$this->hours = round(($this->milliseconds / 3600000), 2);
			$this->days = round(($this->milliseconds / 86400000), 2);
		}
	}

	/**
	 * Adds $n days to the object.
	 * @param int $n Number of days.
	 * @see TimeSpan::$days
	 * @see TimeSpan::getDays()
	 */
	public function addDays($n)
	{
		$this->milliseconds += $n * 86400000;
		$this->setValues();
	}

	/**
	 * Returns the number of days in the object.
	 * @param bool $round (optimal) If true, the number is always rounded to a
	 * lower number, if it is a float. Default is false.
	 * @return int
	 * @see TimeSpan::$days
	 * @see TimeSpan::setDays()
	 */
	public function getDays($round = false)
	{
		return $round ? floor($this->days) : $this->days;
	}

	/**
	 * Adds $n hours to the object.
	 * @param int $n Number of hours.
	 * @see TimeSpan::$hours
	 * @see TimeSpan::getHours()
	 */
	public function addHours($n)
	{
		$this->milliseconds += $n * 3600000;
		$this->setValues();
	}

	/**
	 * Returns the number of hours in the object.
	 * @param bool $round (optimal) If true, the number is always rounded to a
	 * lower number, if it is a float. Default is false.
	 * @return int
	 * @see TimeSpan::$hours
	 * @see TimeSpan::setHours()
	 */
	public function getHours($round = false)
	{
		return $round ? floor($this->hours) : $this->hours;
	}

	/**
	 * Adds $n minutes to the object.
	 * @param int $n Number of minutes.
	 * @see TimeSpan::$minutes
	 * @see TimeSpan::getMinutes()
	 */
	public function addMinutes($n)
	{
		$this->milliseconds += $n * 60000;
		$this->setValues();
	}

	/**
	 * Returns the number of minutes in the object.
	 * @param bool $round (optimal) If true, the number is always rounded to a
	 * lower number, if it is a float. Default is false.
	 * @return int
	 * @see TimeSpan::$minutes
	 * @see TimeSpan::setMinutes()
	 */
	public function getMinutes($round = false)
	{
		return $round ? floor($this->minutes) : $this->minutes;
	}

	/**
	 * Adds $n seconds to the object.
	 * @param int $n Number of seconds.
	 * @see TimeSpan::$seconds
	 * @see TimeSpan::getSeconds()
	 */
	public function addSeconds($n)
	{
		$this->milliseconds += $n * 1000;
		$this->setValues();
	}

	/**
	 * Returns the number of seconds in the object.
	 * @return int
	 * @see TimeSpan::$seconds
	 * @see TimeSpan::setSeconds()
	 */
	public function getSeconds()
	{
		return $this->seconds;
	}

	/**
	 * Adds $n milliseconds to the object.
	 * @param int $n Number of milliseconds.
	 * @see TimeSpan::$milliseconds
	 * @see TimeSpan::getMilliseconds()
	 */
	public function addMilliseconds($n)
	{
		$this->milliseconds += $n;
		$this->setValues();
	}

	/**
	 * Returns the number of milliseconds in the object.
	 * @return int
	 * @see TimeSpan::$milliseconds
	 * @see TimeSpan::setMilliseconds()
	 */
	public function getMilliseconds()
	{
		return $this->milliseconds;
	}

	/**
	 * Returns a time representation of the milliseconds in the object.
	 * @param bool $fullTime (optimal) If is true than the days will be counted
	 * too. Default is false.
	 * @return string
	 */
	public function toTime($fullTime = false)
	{
		$d = '';

		if($fullTime)
		{
			$d = $this->milliseconds / 86400000;
			$h = ($d - (int)$d) * 24;
			$d = (int)$d . 'd ';

			if(($d > 0) && ($d < 10))
				$d = "0{$d}";
		}
		else
		{
			$h = $this->milliseconds / 3600000;
		}

		$m = ($h - (int)$h) * 60;
		$s = ($m - (int)$m) * 60;

		$h = (int)$h;
		$m = (int)$m;
		$s = (int)$s;

		if($h < 10)
			$h = "0{$h}";

		if($m < 10)
			$m = "0{$m}";

		if($s < 10)
			$s = "0{$s}";

		return "{$d}{$h}:{$m}:{$s}";
	}

	/**
	 * Returns the number of milliseconds in the object as a string.
	 * @see TimeSpan::$milliseconds
	 * @see TimeSpan::setMilliseconds()
	 * @see TimeSpan::getMilliseconds()
	 * @return string
	 */
	public function __toString()
	{
		return (string)$this->milliseconds;
	}
}
?>