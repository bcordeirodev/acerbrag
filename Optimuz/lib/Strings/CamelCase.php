<?php
/**
 * This file is used to handle strings.
 * @version 0.2
 * @package Strings
 */

/**
 * Class used to handle CamelCase strings.
 * @author Diego Andrade
 * @package Strings
 * @since Optimuz 0.3
 * @version 0.2
 */
class CamelCase
{
	/**
	 * Returns a string in the UpperCamelCase style.
	 * 
	 * The string will be splitted using the non-letter and non-number
	 * characters. In the resulting array each substring will be captalized. And
	 * to finish the array will be joined. See example bellow:
	 * 
	 * <code>
	 * echo CamelCase::toDashes('original-string-to-be-converted');<br>
	 * // OriginalStringToBeConverted
	 * </code>
	 * @param string $str Input string.
	 * @return string
	 */
	public static function toUpper($str)
	{
		$camelCaseStr = '';
		$tmpArr = preg_split('/[^a-zA-Z0-9]/', $str);

		if(!empty($tmpArr))
			$camelCaseStr = implode('', array_map(create_function('$str', 'return Text::captalize($str);'), $tmpArr));
		else
			$camelCaseStr = Text::captalize($str);

		return $camelCaseStr;
	}

	/**
	 * Returns a string in the lowerCamelCase style.
	 * 
	 * The string will be splitted using the non-letter and non-number
	 * characters. The first substring of the resulting array will be set to 
	 * lowercase and the following substrings will be captalized. After that the
	 * array will be joined and returned. See the example bellow:
	 * 
	 * <code>
	 * echo CamelCase::toDashes('original-string-to-be-converted');<br>
	 * // originalStringToBeConverted
	 * </code>
	 * @param string $str Input string.
	 * @return string
	 */
	public static function toLower($str)
	{
		$camelCaseStr = '';
		$tmpArr = preg_split('/[^a-zA-Z0-9]/', $str);

		if(!empty($tmpArr))
			$camelCaseStr = strtolower($tmpArr[0]) . implode('', array_map(create_function('$str', 'return Text::captalize($str);'), array_slice($tmpArr, 1)));
		else
			$camelCaseStr = strtolower($str);

		return $camelCaseStr;
	}

	/**
	 * Returns a CamelCase string with the upper case letters replaced by
	 * dashes and their lower case versions.
	 *
	 * <code>
	 * echo CamelCase::toDashes('OriginalStringToBeConverted');<br>
	 * // original-string-to-be-converted
	 * </code>
	 *
	 * Only CamelCase strings are converted. Normal strings keeps unchanged.
	 * @param string $str Input string.
	 * @return string
	 */
	public static function toDashes($str)
	{
		return Text::toLower(Text::replace('/\B([A-Z])/', '-$1', $str));
	}
}
?>