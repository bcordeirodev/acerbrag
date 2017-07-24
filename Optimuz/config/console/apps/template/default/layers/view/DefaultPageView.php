<?php
/**
 * This file contains only a view.
 * @version 0.1
 * @package View
 */

/**
 * Default view for all pages.
 * @author Diego Andrade
 * @package View
 * @since Optimuz 0.3
 * @version 0.1
 */
class DefaultPageView extends DefaultView
{
	/**
	 * Creates a new view instance.
	 * @param DefaultController $controller (optimal) Controller related to this
	 * view.
	 */
	public function __construct(DefaultController $controller = null)
	{
		/** super class initialization */
		parent::__construct($controller);

		$this->setMetaTag('robots', 'follow');
		$this->setMetaTag('rating', 'general');
		$this->setMetaTag('imagetoolbar', 'no', true);
	}
}
?>