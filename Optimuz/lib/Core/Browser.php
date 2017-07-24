<?php
/**
 * This file sets a class to work with UA (User-Agent).
 * 
 * An UA is usually a web browser, but may to be any software that access the
 * application.
 *
 * Every time a class refers to UA, it is referring to User-Agent.
 * @version 0.4
 * @package Core
 */

/**
 * This class tries to indentify the UA that made the request. The currently
 * supported UA's are:
 * <ul>
 * <li>Microsoft Internet Explorer</li>
 * <li>Mozilla Firefox</li>
 * <li>Apple Safari</li>
 * <li>Google Chrome</li>
 * <li>Opera</li>
 * <li>Google bot</li>
 * <li>Yahoo! bot</li>
 * <li>Bing bot</li>
 * </ul>
 * This class also indentifies the operanting system of the UA (if available).
 *
 * The supported OS are:
 * <ul>
 * <li>Windows</li>
 * <li>Linux</li>
 * <li>Mac</li>
 * <li>Android</li>
 * <li>iOS</li>
 * <li>WebOS</li>
 * <li>Bada</li>
 * </ul>
 * @author Diego Andrade
 * @package Core
 * @since Optimuz 0.1
 * @version 0.4
 */
class Browser
{
	/**
	 * Microsoft Internet Explorer.
	 */
	const MSIE					= 'msie';

	/**
	 * Mozilla Firefox.
	 */
	const FIREFOX				= 'firefox';

	/**
	 * Opera.
	 */
	const OPERA					= 'opera';

	/**
	 * Apple Safari.
	 */
	const SAFARI				= 'safari';

	/**
	 * Google Chrome.
	 */
	const CHROME				= 'chrome';

	/**
	 * Googlebot.
	 */
	const GOOGLEBOT				= 'gooblebot';

	/**
	 * Yahoo! bot.
	 */
	const YAHOOBOT				= 'yahoo';

	/**
	 * Bing bot.
	 */
	const BINGBOT				= 'bingbot';

	/**
	 * Unknown browser. The value is a null.
	 */
	const UNKNOWN				= null;
	
	/**
	 * Browser name.
	 * @var string
	 * @see Browser::getName()
	 */
    private $name				= null;

	/**
	 * Browser version.
	 * @var string
	 */
	private $version			= null;

	/**
	 * Is gecko browser.
	 * @var bool
	 */
	private $gecko				= null;

	/**
	 * Is webkit browser.
	 * @var bool
	 */
	private $webkit				= null;

	/**
	 * Is a mobile browser.
	 * @var bool
	 */
	private $mobile				= null;

	/**
	 * Is a bot.
	 * @var bool
	 */
	private $bot				= null;

	/**
	 * UA operating system.
	 *
	 * The supported OS are:
	 * <ul>
	 * <li>Windows</li>
	 * <li>Linux</li>
	 * <li>Mac</li>
	 * <li>Android</li>
	 * <li>iOS</li>
	 * <li>WebOS</li>
	 * <li>Bada</li>
	 * </ul>
	 * @var string
	 */
	private $os					= null;

	/**
	 * UA original string.
	 * @var string
	 */
	private $ua					= null;

	/**
	 * Global instance.
	 * @var Browser
	 * @static
	 */
	private static $instance	= null;

	/**
	 * Private empty constructor.
	 */
	private function  __construct()
	{
	}

	/**
	 * This is a factory method, that detects the UA acording to the
	 * HTTP_USER_AGENT request header.
	 * 
	 * If the HTTP_USER_AGENT is not present, and the $ua parameter is not 
	 * specified, a null value will be returned.
	 *
	 * If the UA string is given, but the UA is not supported, its name will be
	 * setted to null. In this case the Browser::isUnknown() method will return
	 * true.
	 * @param string $ua (optimal) An UA string.
	 * @static
	 * @return Browser
	 */
	public static function detect($ua = null)
	{
		$browser = new self;
		
		if(is_null($ua) ? isset($_SERVER['HTTP_USER_AGENT']) && is_null(self::$instance) : true)
		{
			$browser->ua = strtolower(isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : $ua);
			preg_match('/msie|opera|firefox|safari|chrome|googlebot|yahoo|bingbot/', $browser->ua, $name);
			$name = isset($name[0]) ? $name[0] : null;
			preg_match("/(?:version|{$name})(?:\s|\/)?(\d+(?:\.\d+)*)/", $browser->ua, $version);
			preg_match('/windows|linux|mac|symbian|android|ios|webos|bada/', $browser->ua, $os);

			$browser->name = $name;
			$browser->version = isset($version[1]) ? $version[1] : null;
			$browser->gecko = preg_match('/gecko\/\d+/', $browser->ua) === 1;
			$browser->webkit = preg_match('/webkit/', $browser->ua) === 1;
			$browser->mobile = preg_match('/mobile|midp/', $browser->ua) === 1;
			$browser->bot = preg_match('/googlebot|yahoo|bingbot/', $browser->ua) === 1;
			$browser->os = isset($os[0]) ? $os[0] : null;
			self::$instance = $browser;
		}
		else
		{
			if(!is_null(self::$instance))
				$browser = self::$instance;
		}

		return $browser;
	}

	/**
	 * Returns the browser name retrived from the UA string.
	 * @return string
	 * @see Browser::$name
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Returns the browser version retrived from the UA string.
	 * @return string
	 * @see Browser::$version
	 */
	public function getVersion()
	{
		return $this->version;
	}

	/**
	 * Returns the browser OS retrived from the UA string.
	 *
	 * The supported OS are:
	 * <ul>
	 * <li>Windows</li>
	 * <li>Linux</li>
	 * <li>Mac</li>
	 * <li>Android</li>
	 * <li>iOS</li>
	 * <li>WebOS</li>
	 * <li>Bada</li>
	 * </ul>
	 *
	 * The OS name is returned in lower case.
	 * @return string
	 * @see Browser::$os
	 */
	public function getOS()
	{
		return $this->os;
	}

	/**
	 * Returns the parsed UA string.
	 * @return string
	 * @see Browser::$ua
	 */
	public function getUAString()
	{
		return $this->ua;
	}

	/**
	 * Checks whether the UA is a gecko browser.
	 * @return bool
	 * @see Browser::$gecko
	 */
	public function isGecko()
	{
		return $this->gecko;
	}

	/**
	 * Checks whether the UA is a webkit browser.
	 * @return bool
	 * @see Browser::$webkit
	 */
	public function isWebkit()
	{
		return $this->webkit;
	}

	/**
	 * Checks whether the UA is a mobile browser.
	 * @return bool
	 * @see Browser::$mobile
	 */
	public function isMobile()
	{
		return $this->mobile;
	}

	/**
	 * Checks whether the UA is the Microsoft Internet Explorer browser.
	 * @return bool
	 * @see Browser::MSIE
	 */
	public function isMSIE()
	{
		return $this->name == self::MSIE;
	}

	/**
	 * Checks whether the UA is the Mozilla Firefox browser.
	 * @return bool
	 * @see Browser::FIREFOX
	 */
	public function isFirefox()
	{
		return $this->name == self::FIREFOX;
	}

	/**
	 * Checks whether the UA is the Opera browser.
	 * @return bool
	 * @see Browser::OPERA
	 */
	public function isOpera()
	{
		return $this->name == self::OPERA;
	}

	/**
	 * Checks whether the UA is the Apple Safari browser.
	 * @return bool
	 * @see Browser::SAFARI
	 */
	public function isSafari()
	{
		return $this->name == self::SAFARI;
	}

	/**
	 * Checks whether the UA is the Google Chrome browser.
	 * @return bool
	 * @see Browser::CHROME
	 */
	public function isChrome()
	{
		return $this->name == self::CHROME;
	}

	/**
	 * Checks whether the UA is the Googlebot.
	 * @return bool
	 * @see Browser::GOOGLEBOT
	 */
	public function isGooglebot()
	{
		return $this->name == self::GOOGLEBOT;
	}

	/**
	 * Checks whether the UA is the Yahoo! bot.
	 * @return bool
	 * @see Browser::YAHOOBOT
	 */
	public function isYahoobot()
	{
		return $this->name == self::YAHOOBOT;
	}

	/**
	 * Checks whether the UA is the Microsoft Bing bot.
	 * @return bool
	 * @see Browser::BINGBOT
	 */
	public function isBingbot()
	{
		return $this->name == self::BINGBOT;
	}

	/**
	 * Checks whether the UA is a bot.
	 * @return bool
	 */
	public function isBot()
	{
		return $this->bot;
	}

	/**
	 * Checks whether the UA is an unsupported browser.
	 * @return bool
	 * @see Browser::UNKNOWN
	 * @see Browser::detect()
	 */
	public function isUnknown()
	{
		return $this->name === self::UNKNOWN;
	}
}
?>