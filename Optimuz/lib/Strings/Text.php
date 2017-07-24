<?php
/**
 * This file is used to handle strings.
 * @version 0.5.1
 * @package Strings
 */

/**
 * Class used to handle string.
 * @author Diego Andrade
 * @package Strings
 * @since Optimuz 0.1
 * @version 0.7
 * @uses Core
 * @uses ArrayList
 */
class Text
{
	/**
	 * UTF-8 encoding.
	 * @var string
	 */
	const UTF8			= 'utf-8';
	
	/**
	 * ASCII encoding.
	 * @var string
	 */
	const ASCII			= 'iso-8859-1';
	
	/**
	 * HTML encoding.
	 * @var string
	 */
	const HTML			= 'HTML-ENTITIES';
	
	/**
	 * Returns a plain string, without HTML tags.
	 * @param string $str Input string.
	 * @return string Plain string.
	 * @static
	 */
	public static function plain($str)
	{
		return html_entity_decode(strip_tags(trim($str)), ENT_QUOTES, self::detectEncoding($str));
	}

	/**
	 * Quotes string with slashes.
	 * @param string $str Input string.
	 * @return string
	 * @static
	 */
	public static function escape($str)
	{
		return addslashes($str);
	}

	/**
	 * Un-quotes a quoted string.
	 * @param string $str Input string.
	 * @return string
	 * @static
	 */
	public static function unescape($str)
	{
		return stripslashes($str);
	}

	/**
	 * Replaces special characters with numeric HTML entities.
	 * @param string $text Input string.
	 * @param bool $encodeQuotes (optimal) If this parameter is true, quotes
	 * also will be replaced with their correspondent entities. Default is
	 * false.
	 * @return string
	 * @static
	 */
	public static function toHtml($text, $encodeQuotes = false)
	{
		$quoteStyle = $encodeQuotes ? ENT_QUOTES : ENT_COMPAT;
		return self::unescape(htmlentities($text, $quoteStyle, self::detectEncoding($text)));
	}
	
	/**
	 * Returns the given string converted with the given encoding.
	 * @param string $str Input string.
	 * @param string $encoding New encoding. The supported encodings are the
	 * constants of this class: Text:UTF8, Text::ASCII and Text::HTML.
	 * @return string
	 * @static
	 */
	public static function convert($str, $encoding)
	{
		return mb_convert_encoding($str, $encoding, 'auto');
	}
	
	/**
	 * Returns $str encoded with UTF-8.
	 * @param string $str Input string.
	 * @return string UTF-8 string.
	 * @static
	 */
	public static function toUtf8($str)
	{
		return self::convert($str, self::UTF8);
	}
	
	/**
	 * Returns $str encoded with ASCII (ISO-8859-1).
	 * @param string $str Input string.
	 * @return string ASCII string.
	 * @static
	 */
	public static function toAscii($str)
	{
		return self::convert($str, self::ASCII);
	}

	/**
	 * Detect character enconding.
	 * @param string $str Input string.
	 * @return string Character enconding name like ISO-8859-1, UTF-8, etc.
	 * @static
	 * @todo Create a separate class to work with encodings.
	 */
	public static function detectEncoding($str)
	{
		return strtolower(mb_detect_encoding($str, array('utf-8', 'iso-8859-1', 'ascii', 'jis', 'utf-7'), true));
	}

	/**
	 * Returns a new string with all special characters replaced by their
	 * correspondent regular characters or by a custom character.
	 *
	 * This will replace, for example, any especial 'a' (like ã,â,á) to 'a'.
	 *
	 * <code>
	 * <?php
	 * echo Text::slug('String with special characters like "não"!');
	 * // will print 'string-with-especial-characters-like-nao'
	 * ?>
	 * </code>
	 *
	 * Any space, which include new lines/line feeds, carrerige returns, tabs
	 * and others, will be replaced with a dash (-).
	 *
	 * All chararecters different from letters, numbers and spaces will be
	 * removed from the string.
	 *
	 * This method uses UTF-8 to properly match the characters. If $text is
	 * an ASCII string, the resulting string is converted back to ASCII.
	 * @param string $text Input string.
	 * @param bool $replaceDots (optional) Whether to replace dots on the 
	 * string. Default is true.
	 * @param string $newChar (optional) Character to use in replacement to the 
	 * special characters found. All special characters are replaced by this.
	 * @return string
	 * @static
	 * @todo Create a separated class to work with slug text.
	 */
	public static function slug($text, $replaceDots = true, $newChar = null)
	{
		static $charMap = array();

		if(empty($charMap))
		{
			$codesMap = array(
				'224,225,226,227,228'		=> 'a',
				'192,193,194,195,196'		=> 'A',
				'232,233,234,235'			=> 'e',
				'200,201,202,203'			=> 'E',
				'236,237,238,239'			=> 'i',
				'204,205,206,207'			=> 'I',
				'242,243,244,245,246'		=> 'o',
				'210,211,212,213,214'		=> 'O',
				'249,250,251,252'			=> 'u',
				'217,218,219,220'			=> 'U',
				'231'						=> 'c',
				'199'						=> 'C',
				'253,255'					=> 'y',
				'221'						=> 'Y'
			);

			foreach($codesMap as $key => $value)
			{
				$newKey = '/[';
				$codes = explode(',', $key);

				foreach($codes as $code)
					$newKey .= chr($code);

				$newKey .= ']/u';
				$charMap[utf8_encode($newKey)] = $value;
			}

			$charMap['/\s+/u'] = '-';
		}

		$finalCharMap = $charMap;
		$finalCharMap['/[^\w\s\-' . ($replaceDots ? '' : '\.') . ']/u'] = '';
		$isUTF8 = self::detectEncoding($text) == self::UTF8;

		if(!$isUTF8)
			$text = utf8_encode($text);

		$replaceValues = !is_null($newChar) ? $newChar : array_values($finalCharMap);
		$slugText = self::toLower(preg_replace(array_keys($finalCharMap), $replaceValues, $text));

		if(!$isUTF8)
			$slugText = utf8_decode($slugText);

		return $slugText;
	}

	/**
	 * Removes all matches from a string and returns the resulting string.
	 * @param string $stringToRemove String to search and remove. Can be a
	 * regular expression or a simple text.
	 * @param string $originalString Subject string.
	 * @return string
	 * @static
	 */
	public static function remove($stringToRemove, $originalString)
	{
		return self::isRegex($stringToRemove) ? preg_replace($stringToRemove, '', $originalString) : str_replace($stringToRemove, '', $originalString);
	}

	/**
	 * Returns a single character from a string.
	 * @param int $index Position in the string to return. If the position is
	 * lower than 0 or bigger than the sting length, an empty string will be
	 * returned.
	 * @param string $originalString Subject string.
	 * @return string
	 * @static
	 */
	public static function charAt($index, $originalString)
	{
		return ($index < strlen($originalString)) && ($index >= 0) ? $originalString{$index} : '';
	}

	/**
	 * Returns the length of a string.
	 * @param string $string Subject string.
	 * @return int
	 * @static
	 */
	public static function length($string)
	{
		return strlen($string);
	}

	/**
	 * Matches a pattern against and returns the resulting string.
	 *
	 * The same rules for <code>preg_match()</code> can be applied here. For
	 * more details see the documentation of this function.
	 * @param string $pattern Pattern string.
	 * @param string $originalString Subject string.
	 * @param int $flags (optimal) Any flag accepted by 
	 * <code>preg_match()</code> function.
	 * @param int $offset (optimal) Specifies the index from where the search
	 * will begin. Default is zero.
	 * @return mixed If something is found, an array with the results is 
	 * returned. Otherwise a null value is returned.
	 * @static
	 */
	public static function match($pattern, $originalString, $flags = 0, $offset = 0)
	{
		$result = null;

		if(preg_match($pattern, $originalString, $matches, $flags, $offset))
			$result = $matches;

		return $result;
	}

	/**
	 * Matches a pattern against and returns the resulting string.
	 *
	 * The same rules for <code>preg_match_all()</code> can be applied here. For
	 * more details see the documentation of this function.
	 * @param string $pattern Pattern string.
	 * @param string $originalString Subject string.
	 * @param int $flags (optimal) Any flag accepted by 
	 * <code>preg_match_all()</code> function.
	 * @param int $offset (optimal) Specifies the index from where the search
	 * will begin. Default is zero.
	 * @return mixed If something is found, an <code>ArrayList</code> with the 
	 * results is returned. Otherwise a null value is returned.
	 * @static
	 */
	public static function matchAll($pattern, $originalString, $flags = 0, $offset = 0)
	{
		$result = null;

		if(preg_match_all($pattern, $originalString, $matches, $flags, $offset))
			$result = new ArrayList($matches);

		return $result;
	}

	/**
	 * Replaces all matches from a string and returns the resulting string.
	 *
	 * The same rules for str_replace() and preg_replace() can be applied here.
	 * For more details see the documentation of these functions.
	 * @param string|array $stringToSearch String to search and replace. Can be
	 * a regular expression or a simple text.
	 * @param string|array $replacement String used to replace the matches.
	 * @param string|array $originalString Subject string.
	 * @param int $count (optimal) If this variable is passed, it will hold the
	 * number matched and replaced needles.
	 * @return string|array
	 * @static
	 */
	public static function replace($stringToSearch, $replacement, $originalString, &$count = null)
	{
		return self::isRegex($stringToSearch) ? preg_replace($stringToSearch, $replacement, $originalString, PHP_INT_MAX, $count) : str_replace($stringToSearch, $replacement, $originalString, $count);
	}

	/**
	 * Splits a string based on a delimiter and returns an ArrayList with the
	 * results.
	 * @param string $delimiter String used as a delimiter. If the string is
	 * surrounded with slashes, it will be parsed as a regular expression. See
	 * the following examples:
	 *
	 * <code>
	 * <?php
	 * // normal text math
	 * $arrayList = Text::split(' ', 'Text separated by spaces');
	 *
	 * // regular expression text math
	 * $arrayList = Text::split('/\s/', 'Text separated by spaces');
	 * ?>
	 * </code>
	 * @param string $originalString Subject string. Can be a regular expression
	 * or a simple text.
	 * @param int $limit (optimal) Limit of elements that the ArrayList can
	 * have. If omited the ArrayList will have no limit.
	 * @param int $flags (optimal) The same flags acepted by the preg_split()
	 * function.
	 * @return ArrayList
	 * @static
	 */
	public static function split($delimiter, $originalString, $limit = null, $flags = null)
	{
		$parts = self::isRegex($delimiter) ? preg_split($delimiter, $originalString, $limit, $flags) : (is_null($limit) ? explode($delimiter, $originalString) : explode($delimiter, $originalString, $limit));
		return new ArrayList($parts);
	}

	/**
	 * Returns a substring of another string.
	 *
	 * The same rules for the substr() function can be applied to this method.
	 * @param string $originalString Subject string.
	 * @param int $start Index of where to start the new string.
	 * @param int $length (optimal) The amount of characters to return after the
	 * $start index. If this parameter is omited, all following characters will
	 * be returned.
	 * @return string
	 * @static
	 */
	public static function substring($originalString, $start, $length = null)
	{
		return !is_null($length) ? substr($originalString, $start, $length) : substr($originalString, $start);
	}

	/**
	 * Returns the first index of a substring in another string.
	 *
	 * If the substring is not found, the value -1 will be returned.
	 * @param string $search Substring that will be searched.
	 * @param string $originalString Subject string.
	 * @param int $ignoreCase (optimal) If this is true, the search will be
	 * case-insensitive, or case-sensitive otherwise. Default is true.
	 * @param int $offset (optimal) The position (index) from where the search
	 * must begin. If is not passed, the search will start from the beginning of
	 * the string (index 0).
	 * @return int
	 * @see Text::find()
	 * @static
	 */
	public static function index($search, $originalString, $ignoreCase = true, $offset = null)
	{
		$index = $ignoreCase ? stripos($originalString, $search, $offset) : strpos($originalString, $search, $offset);
		return $index !== false ? $index : -1;
	}

	/**
	 * Returns a bool indicating whether a substring was found in another
	 * string.
	 * @param string $search Substring that will be searched.
	 * @param string $originalString Subject string.
	 * @param int $ignoreCase (optimal) If this is true, the search will be
	 * case-insensitive, or case-sensitive otherwise. Default is true.
	 * @param int $offset (optimal) The position (index) from where the search
	 * must begin. If is not passed, the search will start from the beginning of
	 * the string (index 0).
	 * @return bool
	 * @see Text::index()
	 * @static
	 */
	public static function find($search, $originalString, $ignoreCase = true, $offset = null)
	{
		return ($ignoreCase ? stripos($originalString, $search, $offset) : strpos($originalString, $search, $offset)) !== false;
	}

	/**
	 * Checks whether $pattern is a regular expression pattern, that is, if its
	 * length is bigger than 2 and if it is surrounded with any of the
	 * following delimiters: /, (), {}, [], |, #. Also, the following
	 * modifiers are recognized: i, m, s, x, e, A, D, S, U, X, J, u.
	 *
	 * The $pattern can be a string or an array of strings. In the case it is an
	 * array, all values must be regular expressions to return true.
	 * @param mixed $pattern String or array of strings.
	 * @return bool
	 * @static
	 */
	private static function isRegex($pattern)
	{
		$bool = false;
		$regexTest = '#^(?:[/\({[|\#])(.+)(?:[]/\)}|\#])(?:[imsxeADSUXJu]*)$#';

		if(is_string($pattern))
			$bool = (self::length($pattern) > 2) && preg_match($regexTest, $pattern);
		elseif(is_array($pattern) && !empty($pattern))
			$bool = (self::length($pattern[0]) > 2) && preg_match($regexTest, $pattern[0]);

		return $bool;
	}

	/**
	 * Checks if $str is a string and is not empty.
	 * @param mixed $str Any value to check if is a valid string.
	 * @return bool
	 * @static
	 */
	public static function isValidString($str)
	{
		return is_string($str) && !empty($str);
	}

	/**
	 * Returns a new string with the first character in upper case.
	 * @param string $str Input string.
	 * @return string
	 * @static
	 */
	public static function captalize($str)
	{
		return ucfirst($str);
	}

	/**
	 * Returns the entire string in lower case.
	 * @param string $str Input string.
	 * @return string
	 * @static
	 */
	public static function toLower($str)
	{
		return function_exists('mb_strtolower') ? mb_strtolower($str, self::detectEncoding($str)) : strtolower($str);
	}

	/**
	 * Returns the entire string in upper case.
	 * @param string $str Input string.
	 * @return string
	 * @static
	 */
	public static function toUpper($str)
	{
		return function_exists('mb_strtoupper') ? mb_strtoupper($str, self::detectEncoding($str)) : strtoupper($str);
	}
}
?>