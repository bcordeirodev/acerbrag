<?php
/**
 * This file sets the magic function __autoload for loading classes, interfaces
 * and other files as they are required.
 * @version 0.2
 * @package Core
 * @since Optimuz 0.3
 */

/**
 * This is a PHP magic function. It can load any mapped PHP file in the
 * framework. For this, it just calls the method Load::autoload() given the
 * $className as argument. All work is done by the Load class.
 * @param string $className Name of a class, interface or function to load.
 * @version 0.2
 * @package Core
 * @author Diego Andrade
 * @uses Core.Load
 */
function __autoload($className)
{
	Load::autoload($className);
}
?>