<?php
/**
 * This script is used to manage code accelerators. The supported accelerators
 * are eAccelerator and APC.
 * @version 0.1
 * @since Optimuz 0.3
 * @author Diego Andrade
 */

/**
 * Includes the main file with some needed tools.
 */
require_once 'utils/utils.php';

if(extension_loaded('eAccelerator'))
	require_once 'cache/eAccelerator.php';
elseif(extension_loaded('APC'))
	require_once 'cache/apc.php';
else
	die("No cache extension is loaded. The cache cannot be managed.\n");

switch($argv[1])
{
	case 'clear':
		Accelerator::clearCache();
		echo 'Cache cleared!';
		break;
	case 'show-files':
		Accelerator::showCachedFiles();
		break;
	case 'show-data':
		Accelerator::showCachedData();
		break;
	default:
		echo 'Invalid option!';
		break;
}
?>