<?php
/**
 * This file sets a class to work with dates.
 * @version 0.1
 * @package DateTime
 */

/**
 * Class used to handle dates.
 *
 * The date/time formats depends on the formats setted in the application
 * configuration. See the settings on dateTime section for details.
 * @author Diego Andrade
 * @package DateTime
 * @since Optimuz 0.1
 * @version 0.1
 * @uses Core
 * @uses DateTime
 * @uses Lang
 */
class Date extends Object
{
	/**
	 * The expression used to represent the date is invalid.
	 */
	const INVALID_DATE_EXPRESSION		= 1800;

	/**
	 * The expression used to represent the date could not be parsed.
	 */
	const DATE_PARSE_ERROR				= 1801;

	/**
	 * Date format acordingly to the RFC 1123.
	 */
	const RFC1123						= DATE_RFC1123; // "D, d M Y H:i:s O"

	/**
	 * Date format used by cookies.
	 */
	const COOKIE						= "D, d-M-Y H:i:s \G\M\T";

	/**
	 * UNIX Timestamp UNIX of date.
	 * @var int
	 */
	private $timestamp					= null;

	/**
	 * Corresponding day of current date.
	 * @var string
	 */
	private $day						= null;

	/**
	 * Corresponding month of current date.
	 * @var string
	 */
	private $month						= null;

	/**
	 * Corresponding year of current date.
	 * @var string
	 */
	private $year						= null;

	/**
	 * Corresponding hour of current date.
	 * @var string
	 */
	private $hour						= null;

	/**
	 * Corresponding minute of current date.
	 * @var string
	 */
	private $minute						= null;

	/**
	 * Corresponding second of current date.
	 * @var string
	 */
	private $second						= null;

	/**
	 * Current date format.
	 * @var string
	 */
	private $dateFormat					= null;

	/**
	 * Current time format.
	 * @var string
	 */
	private $timeFormat					= null;

	/**
	 * The constructor does nothing.
	 */
	private function __construct()
	{
	}

	/**
	 * Returns the current date.
	 * @static
	 * @param string $format (optimal) Date format. If not specified, the format
	 * setted in dateTime.date.format will be used.
	 * @return string
	 */
	public static function today($format = null)
	{
		return date(is_string($format) ? $format : GlobalConfiguration::get('dateTime.date.format'));
	}

	/**
	 * Returns the current time.
	 * @static
	 * @param string $format (optimal) Time format. If not specified, the format
	 * setted in dateTime.time.format will be used.
	 * @return string
	 */
	public static function time($format = null)
	{
		return date(is_string($format) ? $format : GlobalConfiguration::get('dateTime.time.format'));
	}

	/**
	 * Returns the current date and time, separated by a space.
	 * @static
	 * @return string
	 */
	public static function now()
	{
		return self::today() . ' ' . self::time();
	}

	/**
	 * Returns the current date and time, formatted acordingly to the RFC 1123.
	 * @static
	 * @param int $time (optimal) Timestamp in seconds.
	 * @return string
	 */
	public static function GMT($time = null)
	{
		return is_null($time) ? date(self::RFC1123) : date(self::RFC1123, $time);
	}

	/**
	 * Returns the current day with two digits.
	 * @static
	 * @return string
	 */
	public static function day()
	{
		return date('d');
	}

	/**
	 * Returns the current month with two digits.
	 * @static
	 * @return string
	 */
	public static function month()
	{
		return date('m');
	}

	/**
	 * Returns the current year with four digits.
	 * @static
	 * @return string
	 */
	public static function year()
	{
		return date('Y');
	}

	/**
	 * Returns the current hour with two digits.
	 * @static
	 * @return string
	 */
	public static function hour()
	{
		return date('H');
	}

	/**
	 * Returns the minute of the current hour with two digits.
	 * @static
	 * @return string
	 */
	public static function minute()
	{
		return date('i');
	}

	/**
	 * Returns the second of the minute of the current hour with two digits.
	 * @static
	 * @return string
	 */
	public static function second()
	{
		return date('s');
	}

	/**
	 * Returns the current timestamp.
	 * @param boolean $micro (optional) If true returns the timestamp in
	 * microseconds. Otherwise, returns the timestamp in seconds. Default is
	 * false.
	 * @static
	 * @return int
	 */
	public static function timestamp($micro = false)
	{
		return $micro ? microtime(true) : time();
	}

	/**
	 * Checks if $firstDate is a date that comes before $lastDate, or if they
	 * are the same date.
	 * @static
	 * @param mixed $firstDate First date.
	 * @param mixed $lastDate Last date.
	 * @return bool If $firstDate comes before $lastDate a true is returned,
	 * otherwise a false is returned.
	 */
	public static function validRange($firstDate, $lastDate)
	{
		$_d1 = self::getDateObject($firstDate);
		$_d2 = self::getDateObject($lastDate);

		return $_d1->getTimestamp() <= $_d2->getTimestamp();
	}

	/**
	 * Returns a TimeSpan object with the difference between the two dates.
	 * @param mixed $firstDate First date.
	 * @param mixed $lastDate Last date.
	 * @return TimeSpan
	 * @static
	 */
	public static function diff($firstDate, $lastDate)
	{
		$_d1 = self::getDateObject($firstDate);
		$_d2 = self::getDateObject($lastDate);
		$span = new TimeSpan();
		$span->addSeconds($_d2->getTimestamp() - $_d1->getTimestamp());

		return $span;
	}

	/**
	 * This method is called only internaly, and is responsable for create new
	 * Date objects.
	 * @param string|int|Date $dateExpr Date expression, that can be a string,
	 * an UNIX timestamp, or another Date object.
	 * @return Date
	 * @static
	 * @see Date::parse()
	 */
	private static function getDateObject($dateExpr)
	{
		$d = null;
		$timestamp = 0;

		if(is_string($dateExpr))
		{
			if(preg_match('/^\d+\D\d+\D\d+/', $dateExpr))
				$dateExpr = preg_replace('/[^\d\s:]/', '-', $dateExpr);

			$timestamp = strtotime($dateExpr);

			if(($timestamp === false) || ($timestamp === -1))
				throw new DateTimeError(Language::getCurrent()->getSentence('error.dateTime.parseError', $dateExpr), self::DATE_PARSE_ERROR);
		}
		elseif(is_numeric($dateExpr))
		{
			$timestamp = $dateExpr;
		}
		elseif(is_object($dateExpr))
		{
			if($dateExpr instanceof self)
				$d = $dateExpr;
			else
				throw new DateTimeError(Language::getCurrent()->getSentence('error.dateTime.invalidObject', $dateExpr), self::INVALID_DATE_EXPRESSION);
		}
		else
		{
			throw new DateTimeError(Language::getCurrent()->getSentence('error.dateTime.unsupportedDateExpression', $dateExpr), self::INVALID_DATE_EXPRESSION);
		}

		if(($timestamp >= 0) && is_null($d))
		{
			$timestamp += GlobalConfiguration::get('dateTime.timezone.offset') * 3600;
			$d = new self();
			$d->timestamp = $timestamp;
			$d->setValues();
		}

		return $d;
	}

	/**
	 * Returns a new Date object representing the parsed date.
	 *
	 * If the date can't be parsed, an error DateTimeError will be thrown.
	 * @param string|int|Date $date Date expression, that can be a string,
	 * an UNIX timestamp, or another Date object.
	 * @return Date
	 * @static
	 * @see Date::getDateObject()
	 */
	public static function parse($date)
	{
		return self::getDateObject($date);
	}

	/**
	 * Returns a Date object representing the current date and time.
	 * @return Date
	 * @static
	 */
	public static function get()
	{
		$d = new self();
		$d->timestamp = time() + (GlobalConfiguration::get('dateTime.timezone.offset') * 3600);
		$d->setValues();

		return $d;
	}

	/**
	 * Updates the object properties acordingly to its the timestamp.
	 */
	private function setValues()
	{
		$this->day = date('d', $this->timestamp);
		$this->month = date('m', $this->timestamp);
		$this->year = date('Y', $this->timestamp);
		$this->hour = date('H', $this->timestamp);
		$this->minute = date('i', $this->timestamp);
		$this->second = date('s', $this->timestamp);
		$this->dateFormat = GlobalConfiguration::get('dateTime.date.format');
		$this->timeFormat = GlobalConfiguration::get('dateTime.time.format');
	}

	/**
	 * Sets the date format.
	 * @param string $dateFormat New date format.
	 */
	public function setDateFormat($dateFormat)
	{
		$this->dateFormat = $dateFormat;
	}

	/**
	 * Sets the time format.
	 * @param string $timeFormat New time format.
	 */
	public function setTimeFormat($timeFormat)
	{
		$this->timeFormat = $timeFormat;
	}

	/**
	 * Returns the current date object formatted.
	 * @param string $format (optional) Date format. If not given, the format
	 * set by <code>Date::setDateFormat()</code> is ussed.
	 * @return string
	 */
	public function getDate($format = null)
	{
		return date(!empty($format) ? $format : $this->dateFormat, $this->timestamp);
	}

	/**
	 * Returns the object time formatted with the format setted for the object.
	 * @param string $format (optional) Time format. If not given, the format
	 * set by <code>Date::setTimeFormat()</code> is ussed.
	 * @return string
	 */
	public function getTime($format = null)
	{
		return date(!empty($format) ? $format : $this->timeFormat, $this->timestamp);
	}

	/**
	 * Returns the current date and time, stored in the object, separated by a
	 * space.
	 * @return string
	 */
	public function getDateTime()
	{
		return $this->getDate() . ' ' . $this->getTime();
	}

	/**
	 * Returns the current timestamp, stored in the object.
	 * @return int
	 */
	public function getTimestamp()
	{
		return $this->timestamp;
	}

	/**
	 * Returns the current timestamp, stored in the object, formatted acondingly
	 * with the RFC 1123.
	 * @param string $format A date format defined by a RFC. Default is
	 * Date::RFC1123.
	 * @return string
	 * @see Date::RFC1123
	 * @see Date::COOKIE
	 */
	public function getGMT($format = self::RFC1123)
	{
		return date($format, $this->timestamp);
	}

	/**
	 * Adds $n days to the object date.
	 * @param int $n Number of days.
	 */
	public function addDay($n)
	{
		$this->timestamp += $n * 86400;
		$this->setValues();
	}

	/**
	 * Returns the object day with two digits.
	 * @return string
	 */
	public function getDay()
	{
		return $this->day;
	}

	/**
	 * Returns the object month with two digits.
	 * @return string
	 */
	public function getMonth()
	{
		return $this->month;
	}

	/**
	 * Returns the object year with four digits.
	 * @return string
	 */
	public function getYear()
	{
		return $this->year;
	}

	/**
	 * Adds $n hours to the object date.
	 * @param int $n Number of hours.
	 */
	public function addHour($n)
	{
		$this->timestamp += $n * 3600;
		$this->setValues();
	}

	/**
	 * Returns the object hour with two digits.
	 * @return string
	 */
	public function getHour()
	{
		return $this->hour;
	}

	/**
	 * Adds $n minutes to the object date.
	 * @param int $n Number of minutes.
	 */
	public function addMinute($n)
	{
		$this->timestamp += $n * 60;
		$this->setValues();
	}

	/**
	 * Returns the object minutes with two digits.
	 * @return string
	 */
	public function getMinute()
	{
		return $this->minute;
	}

	/**
	 * Adds $n seconds to the object date.
	 * @param int $n Number of seconds.
	 */
	public function addSecond($n)
	{
		$this->timestamp += $n;
		$this->setValues();
	}

	/**
	 * Returns the object seconds with two digits.
	 * @return string
	 */
	public function getSecond()
	{
		return $this->second;
	}

	/**
	 * The same as calling Date::getDateTime()
	 * @return string
	 * @see Date::getDateTime()
	 */
	public function __toString()
	{
		return $this->getDateTime();
	}
}
?>