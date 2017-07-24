<?php
/**
 * This file contains filters for HTML, SQL and Javascript code. This way, we
 * can prevent commom attacks.
 * @version 0.1.1
 * @package Core
 */

/**
 * Class used to filter injection codes like HTML, SQL and Javascript.
 * @author Diego Andrade
 * @package Core
 * @since Optimuz 0.1
 * @version 0.1.1
 * @static
 */
class Injection
{
	/**
	 * Prevents against HTML injection removing all HTML from the string.
	 * @param string $str Input string.
	 * @return string String without HTML code.
	 * @static
	 */
	public static function removeHtml($str)
	{
		return preg_replace('/[<>\\\'"()]+/', '', Text::plain($str));
	}

	/**
	 * Prevents against SQL injection removing all SQL from the string.
	 * @param string $str Input string.
	 * @return string String without SQL code.
	 * @static
	 * @todo To implement the method Injection::removeSql().
	 */
	public static function removeSql($str)
	{
	}
	
	/**
	 * Prevents against Javascript injection removing all Javascript from the string.
	 * @param string $str Input string.
	 * @return string String without Javascript code.
	 * @static
	 * @todo To implement the method Injection::removeJs().
	 */
	public static function removeJs($str)
	{
	}
}
?>