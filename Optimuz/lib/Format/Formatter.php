<?php
/**
 * String formatting.
 * @version 0.4
 * @package Format
 */

/**
 * This class is used to format numbers in any needed format. The class
 * expects two things: the format pattern, and the string (number) that will
 * be formatted.
 *
 * The format pattern is a string with numbers and symbols. The numbers will
 * be replaced with the real values, and the symbols will represent the
 * format. An example of format pattern is "000.000.000-00". In this pattern
 * all zeros will be replaced with real values.
 *
 * The string that will be formatted must have only numbers. Anything else
 * will be discarded.
 *
 * This formatting is not like the one with sprintf. The formatting of this
 * class uses regular expressions to match a certain pattern.
 *
 * See below some examples of usage:
 *
 * <code>
 * <?php
 * $formatter = new Formatter('00.00.00');
 * echo $formatter->format('158965'); // 15.89.65
 *
 * // the same object can be used again with a different value
 * echo $formatter->format('782314'); // 78.23.14
 *
 * // and if you want to change the format pattern you can
 * $formatter->setPattern('0/00-000.0000');
 * echo $formatter->format(3521468970); // 3/52-146.8970
 *
 * // you can also use give the pattern and value at once and print all in
 * // one line
 * echo new Formatter('00 0000-0000', '6122335566'); // 61 2233-5566
 * ?>
 * </code>
 * @author Diego Andrade
 * @package Format
 * @since Optimuz 0.1
 * @version 0.4
 * @uses Lang
 */
class Formatter extends Object
{
	/**
	 * Invalid string length.
	 */
	const INVALID_STRING_LENGTH			= 1500;

	/**
	 * No string specified for to format.
	 */
	const NO_STRING						= 1501;

	/**
	 * String to be formatted.
	 * @var string
	 * @see Formatter::setString()
	 * @see Formatter::getString()
	 */
	protected $string					= null;

	/**
	 * Base string used as a format.
	 * @var string
	 * @see Formatter::setPattern()
	 * @see Formatter::getPattern()
	 */
	protected $pattern					= null;

	/**
	 * Creates a new class instance.
	 *
	 * This class is used to format numbers in any needed format. The class
	 * expects two things: the format pattern, and the string (number) that will
	 * be formatted.
	 *
	 * The format pattern is a string with numbers and symbols. The numbers will
	 * be replaced with the real values, and the symbols will represent the
	 * format. An example of format pattern is "000.000.000-00". In this pattern
	 * all zeros will be replaced with real values.
	 *
	 * The string that will be formatted must have only numbers. Anything else
	 * will be discarded.
	 *
	 * This formatting is not like the one with sprintf. The formatting of this
	 * class uses regular expressions to match a certain pattern.
	 *
	 * See below some examples of usage:
	 *
	 * <code>
	 * <?php
	 * $formatter = new Formatter('00.00.00');
	 * echo $formatter->format('158965'); // 15.89.65
	 *
	 * // the same object can be used again with a different value
	 * echo $formatter->format('782314'); // 78.23.14
	 *
	 * // and if you want to change the format pattern you can
	 * $formatter->setPattern('0/00-000.0000');
	 * echo $formatter->format(3521468970); // 3/52-146.8970
	 *
	 * // you can also use give the pattern and value at once and print all in
	 * // one line
	 * echo new Formatter('00 0000-0000', '6122335566'); // 61 2233-5566
	 * ?>
	 * </code>
	 * @param string $pattern (optimal) Format pattern, like "000.000-00".
	 * @param string $string (optimal) String representing a number (or a
	 * number itself) for to format.
	 * @see Formatter::setPattern()
	 * @see Formatter::getPattern()
	 * @see Formatter::format()
	 */
	public function __construct($pattern = null, $string = null)
	{
		$this->pattern = $pattern;
		$this->string = $string;
	}

	/**
	 * Sets a string to be formatted.
	 * @param string $string String to be formatted.
	 * @see Formatter::$string
	 * @see Formatter::getString()
	 */
	public function setString($string)
	{
		$this->string = (string)$string;
	}

	/**
	 * Returns the string to be formatted.
	 * @see Formatter::$string
	 * @see Formatter::setString()
	 */
	public function getString()
	{
		return $this->string;
	}

	/**
	 * Sets a base format.
	 * @param string $pattern Format pattern.
	 * @see Formatter::$pattern
	 * @see Formatter::getPattern()
	 */
	public function setPattern($pattern)
	{
		$this->pattern = (string)$pattern;
	}

	/**
	 * Returns the format pattern.
	 * @see Formatter::$pattern
	 * @see Formatter::setPattern()
	 */
	public function getPattern()
	{
		return $this->pattern;
	}

	/**
	 * Returns the string formatted with the specified format.
	 *
	 * If the parameter $str is not given and Formatter::$string is null, a
	 * FormatError will be thrown.
	 * @param string $str (optimal) String to be formatted.
	 * @return string
	 */
	public function format($str = null)
	{
		$formattedStr = '';
		$originalStr = !is_null($str) ? (string)$str : $this->string;

		if(is_string($originalStr))
		{
			if(!empty($originalStr))
			{
				$originalStr = preg_replace('/\D+/', '', $originalStr);
				$chunks = preg_split('/\D/', $this->pattern);
				$matchResults = preg_match_all('/\D/', $this->pattern, $symbols);

				if(($chunks !== false) && ($matchResults > 0) && is_array($symbols))
				{
					$symbols = $symbols[0];
					$total = count($chunks);
					$i = -1;
					$offset = 0;

					while(++$i < $total)
					{
						$len = strlen($chunks[$i]);
						$formattedStr .= substr($originalStr, $offset, $len);
						$formattedStr .= isset($symbols[$i]) ? $symbols[$i] : '';
						$offset += $len;
					}
				}
				else
				{
					$formattedStr = $originalStr;
				}
			}
		}
		else
		{
			throw new FormatError(Language::getCurrent()->getSentence('error.formatter.noString'), self::NO_STRING);
		}

		return $formattedStr;
	}

	/**
	 * Returns the formatted string.
	 *
	 * If any error occurs, the error string will be returned.
	 * @return string
	 */
	public function  __toString()
	{
		$str = null;

		try{
			$str = $this->format($this->string);
		}
		catch(Error $error){
			$str = $error->__toString();
		}

		return $str;
	}

	/**
	 * Changes the date format.
	 *
	 * If $date is in the format dd/mm/yyyy it will be changed to yyyy/mm/dd.
	 * And if $date is in the format yyyy/mm/dd, it will be changed to
	 * dd/mm/yyyy.
	 * @param string $date Any date.
	 * @param string $sep (optimal) Separator to be used in the new date.
	 * Default is "-" (dash).
	 * @return string
	 * @static
	 */
	public static function date($date, $sep = '-')
	{
		$parts = array();
		preg_match('/(\d+)\D(\d+)\D(\d+)/', $date, $parts);
		return "{$parts[3]}{$sep}{$parts[2]}{$sep}{$parts[1]}";
	}

	/**
	 * Formats a number like currency.
	 *
	 * This method uses currency defined in the configuration setting
	 * format.currency. So if you want to change the default currency to match
	 * yours, you must change it in the application configuration file.
	 * @param int|float|string $money Number to be formatted like money.
	 * @param bool $currency (optimal) Whether to use the currency symbol before
	 * the number. The symbol can be changed in the configuration
	 * 'format.currency'. Default is true.
	 * @return string
	 * @static
	 */
	public static function money($money, $currency = true)
	{
		return ($currency ? LocalConfiguration::get('format.currency') . ' ' : '') . number_format($money, 2, ',', '.');
	}

	/**
	 * Formats a number as a memory size.
	 * @param int|float|string $size Number to be formatted like money.
	 * @param int $decimals (optional) Number of decimal points. Default is 4.
	 * @return string
	 * @static
	 */
	public static function memory($size, $decimals = 4)
	{
		$size = (float)$size;
		$formattedSize = '';
		
		if($size <= 0)
			$formattedSize = '0 bytes';

		// byte size
		elseif($size < 1024)
			$formattedSize = number_format($size, 1) . ' bytes';

		// kilobyte size
		elseif(($size >= 1024) && ($size < 1048576))
			$formattedSize = number_format($size / 1024, $decimals, ',', '.') . ' KB';

		// megabyte size
		elseif(($size >= 1048576) && ($size < 1073741824))
			$formattedSize = number_format($size / 1024 / 1024, $decimals, ',', '.') . ' MB';

		// gigabytes size
		elseif(($size >= 1073741824) && ($size < 1099511627776))
			$formattedSize = number_format($size / 1024 / 1024 / 1024, $decimals, ',', '.') . ' GB';

		// terabyte size
		else
			$formattedSize = number_format($size / 1024 / 1024 / 1024 / 1024, $decimals, ',', '.') . ' TB';
		
		return $formattedSize;
	}
}
?>