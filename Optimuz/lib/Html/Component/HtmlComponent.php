<?php
/**
 * This file belongs to HTML package, that defines a simple way to build HTML
 * elements and components.
 * @version 0.2
 * @package Html
 * @subpackage Component
 */

/**
 * This class is used to build HTML components.
 *
 * Components are HTML structures a little more complex than single elements. A
 * component is nothing more then a HTML tree. So a component for a table for
 * example, already have elements as header, footer and body defined and you
 * only need to add rows.
 *
 * This class inherits the HtmlElement class, so every component is an element.
 * @author Diego Andrade
 * @package Html
 * @subpackage Component
 * @since Optimuz 0.1
 * @version 0.2
 */
class HtmlComponent extends HtmlElement
{
}
?>