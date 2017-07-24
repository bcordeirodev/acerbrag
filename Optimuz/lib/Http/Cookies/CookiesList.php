<?php
/**
 * This file sets a class to work with cookies.
 * @version 0.1
 * @package Http
 * @subpackage Cookies
 */

/**
 * This is a list of cookies.
 * 
 * This class extends the ArrayList class to provide access methods to cookies
 * created with the Cookie class.
 * @author Diego Andrade
 * @package Http
 * @subpackage Cookies
 * @since Optimuz 0.3
 * @version 0.1
 */
class CookiesList extends ArrayList
{
	/**
	 * Creates a new class instance.
	 *
	 * This class extends the ArrayList class to provide access methods to
	 * inputs created with the Cookie class.
	 * @param array $cookies Array of cookies.
	 */
	public function __construct(array $cookies = null)
	{
		parent::__construct($cookies);
		$this->strictType = 'Cookie';
	}
}
?>