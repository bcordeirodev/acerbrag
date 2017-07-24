<?php
/**
 * This script receives the requests for non-existing URL and tries to map
 * theese requests to controllers. If the controller exists and is public, it
 * is called. Otherwise, the default controller will be called with its default
 * method.
 *
 * This script works exactly as a router, mapping requests to controllers and
 * methods. For that, the package Router is used and need to be configured. If
 * no default route is found, the request will be mapped to the default
 * controller as said above.
 * @package Optimuz
 * @uses Core
 * @uses Application
 * @uses Router
 * @uses SiteNavigation
 * @uses Lang
 * @uses IO
 * @uses Controller
 * @uses Http
 * @author Diego Andrade
 * @version 0.6.1
 * @since 0.1
 */

if(isset($_SERVER) && $_SERVER['REQUEST_URI'] == '/favicon.ico')
{
	header('x', true, 404);
	exit;
}

/**
 * Root directory of the framework. It can be located on the public directory
 * (the site directory) or on level above.
 */
$frameworkDir = getcwd() . '/' . ((is_dir('Optimuz') ? '' : '../') . 'Optimuz/');

/**
 * Map of files.
 *
 * The first thing to do is to test if this file exists. If it doesn't, we need
 * to install the enviroment using the OCLC tool.
 */
$filesMap = "{$frameworkDir}config/filesMap.php";

if(is_file($filesMap))
{
	/** Includes the enviroment class. */
	require_once "{$frameworkDir}lib/Core/Enviroment.php";

	/** Includes the loader class. */
	require_once "{$frameworkDir}lib/Core/Load.php";

	/** Auto initialization of the global configuration. */
	require_once "{$frameworkDir}config/bootstrap/global.php";

	/** Initializes the main application. */
	Application::initialize($frameworkDir);
}
else
{
	require "{$frameworkDir}apps/system/layers/view/page/Install.php";
}
?>