<?php
/**
 * This file sets a custom component using the Html.Component.HtmlComponent.
 * @version 0.1
 * @package Html
 * @subpackage Component
 */

/**
 * This interface provides commom functionality for components that handle any
 * kind of navigation.
 * @author Diego Andrade
 * @package Html
 * @subpackage Component
 * @since Optimuz 0.3
 * @version 0.1
 */
interface INavigationComponent
{
	/**
	 * Sets whether to include the application's base URL into the item's URL.
	 * @param bool $includeAppBaseUrl If is true, the base URL of the
	 * application is included into the item's URL.
	 */
	public function setIncludeAppBaseUrl($includeAppBaseUrl);

	/**
	 * Returns whether to include the application's base URL into the item's
	 * URL.
	 * @return bool
	 */
	public function getIncludeAppBaseUrl();
}
?>