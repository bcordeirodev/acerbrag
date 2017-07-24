<?php
/**
 * This file sets a class to work with cookies.
 * @version 0.1
 * @package Http
 * @subpackage Cookies
 */

/**
 * This static class manges all cookies created with the Cookie class.
 * @author Diego Andrade
 * @package Http
 * @subpackage Cookies
 * @since Optimuz 0.3
 * @version 0.1
 * @static
 */
class CookiesManager
{
	/**
	 * List of all stored cookies.
	 * @var CookiesList
	 * @see CookiesManager::addCookie()
	 * @see CookiesManager::getCookie()
	 * @see CookiesManager::getCookies()
	 * @see CookiesManager::getSentCookies()
	 * @see CookiesManager::getReadyCookies()
	 * @static
	 */
	protected static $cookies			= null;

	/**
	 * List of all sent cookies.
	 * @var CookiesList
	 * @see CookiesManager::getCookies()
	 * @see CookiesManager::getReadyCookies()
	 * @static
	 */
	protected static $cookiesSent		= null;

	/**
	 * List of all cookies ready to be sent.
	 * @var CookiesList
	 * @see CookiesManager::getCookies()
	 * @see CookiesManager::getSentCookies()
	 * @static
	 */
	protected static $cookiesReady		= null;

	/**
	 * Adds a cookie to the list.
	 *
	 * The cookie can later be recovered by its name with the method
	 * CookiesManager::getCookie().
	 * @param Cookie $cookie
	 * @see CookiesManager::getCookie()
	 * @see CookiesManager::getCookies()
	 * @see CookiesManager::getSentCookie()
	 * @see CookiesManager::getReadyCookie()
	 * @static
	 */
	public static function addCookie(Cookie $cookie)
	{
		if(is_null(self::$cookies))
		{
			self::$cookies = new CookiesList();
			self::$cookiesSent = new CookiesList();
			self::$cookiesReady = new CookiesList();
		}

		$name = $cookie->getName();
		self::$cookies->addKey($name, $cookie);
		self::$cookiesReady->addKey($name, $cookie);
	}

	/**
	 * Returns a cookie.
	 *
	 * If the cookie does not exist, a null value is returned.
	 * @return Cookie
	 * @see CookiesManager::addCookie()
	 * @see CookiesManager::getCookies()
	 * @see CookiesManager::getSentCookie()
	 * @see CookiesManager::getReadyCookie()
	 * @static
	 */
	public static function getCookie($name)
	{
		return self::$cookies[$name];
	}

	/**
	 * Return all stored cookies.
	 * @return CookiesList
	 * @see CookiesManager::addCookie()
	 * @see CookiesManager::getCookie()
	 * @see CookiesManager::getSentCookie()
	 * @see CookiesManager::getReadyCookie()
	 * @static
	 */
	public static function getCookies()
	{
		return self::$cookies;
	}

	/**
	 * Return all sent cookies.
	 * @return CookiesList
	 * @see CookiesManager::getCookies()
	 * @see CookiesManager::getReadyCookie()
	 * @static
	 */
	public static function getSentCookies()
	{
		return self::$cookiesSent;
	}

	/**
	 * Return all cookies ready to be sent.
	 * @return CookiesList
	 * @see CookiesManager::addCookie()
	 * @see CookiesManager::getCookies()
	 * @see CookiesManager::getSentCookie()
	 * @static
	 */
	public static function getReadyCookies()
	{
		return self::$cookiesReady;
	}

	/**
	 * Moves a cookie with the passed name from the list of cookies ready to be
	 * sent to the list of cookies sent.
	 * @param string $cookieName The name of a cookie currently in the list of
	 * cookies ready to be sent.
	 * @static
	 */
	public static function sent($cookieName)
	{
		if(isset(self::$cookiesReady[$cookieName]))
		{
			self::$cookiesSent[$cookieName] = self::$cookiesReady[$cookieName];
			unset(self::$cookiesReady[$cookieName]);
		}
	}
}
?>