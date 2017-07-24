<?php
/**
 * This script receives the requests of resources, such as CSS and JS files.
 *
 * @package Optimuz
 * @author Diego Andrade
 * @version 0.2
 * @since 0.4
 */

// error handlers
function sendErrorMessage($error)
{
	header('Content-Type: text/html', true, 500);
	echo $error;
	exit;
}

function handleScriptError($errorNumber, $errorMessage, $errorFile, $errorLine)
{
	sendErrorMessage("[$errorNumber] $errorMessage ($errorLine, $errorFile)");
}

function handleException(Exception $exception)
{
	sendErrorMessage("[{$exception->getCode()}] {$exception->getMessage()} ({$exception->getLine()}, {$exception->getFile()})");
}

function handleFatalError()
{
	$lastError = error_get_last();

	if($lastError && isset($errorTypes[$lastError['type']]))
	{
		$errorTypes = array(
			1		=> "E_ERROR",
			2		=> "E_WARNING",
			4		=> "E_PARSE",
			8		=> "E_NOTICE",
			16		=> "E_CORE_ERROR",
			32		=> "E_CORE_WARNING",
			64		=> "E_COMPILE_ERROR",
			128		=> "E_COMPILE_WARNING",
			256		=> "E_USER_ERROR",
			512		=> "E_USER_WARNING",
			1024	=> "E_USER_NOTICE",
			2048	=> "E_STRICT",
			4096	=> "E_RECOVERABLE_ERROR",
			8192	=> "E_DEPRECATED",
			16384	=> "E_USER_DEPRECATED",
			30719	=> "E_ALL"
		);
		
		switch($errorTypes[$lastError['type']])
		{
			case 'E_ERROR':
			case 'E_PARSE':
			case 'E_CORE_ERROR':
			case 'E_CORE_WARNING':
			case 'E_COMPILE_ERROR':
			case 'E_COMPILE_WARNING':
			case 'E_STRICT':
				handleScriptError($lastError['type'], $lastError['message'], $lastError['file'], $lastError['line']);
				break;
		}
	}
}

set_error_handler('handleScriptError');
set_exception_handler('handleException');
register_shutdown_function('handleFatalError');

// get the resource URL
if(isset($_GET['url']))
{
	$resourceUrl = strip_tags($_GET['url']);
}
elseif(strpos($_SERVER['PHP_SELF'], '/resources.php/') !== false)
{
	$resourceUrl = end((explode('/resources.php/', $_SERVER['PHP_SELF'])));
}
else
{
	// deny the access if the no resource is given
	header('x', true, 403);
	exit;
}

// extract the resource extension
$ext = strtolower(end((explode('.', $resourceUrl))));

// set the resource mime-type
switch($ext)
{
	case 'js':
		$mime = 'application/javascript';
		break;
	case 'jpg':
	case 'jpe':
	case 'jpeg':
		$mime = "image/jpeg";
		break;
	case 'png':
	case 'gif':
	case 'giff':
	case 'bmp':
	case 'svg':
		$mime = "image/$ext";
		break;
	case 'htc':
		$mime = "text/x-component";
		break;
	case 'swf':
		$mime = "application/x-shockwave-flash";
		break;
	case 'mp3':
	case 'mp4':
	case 'wav':
		$mime = "audio/$ext";
		break;
	case 'avi':
	case 'fla':
	case 'mp2':
	case '3gp':
	case 'mov':
		$mime = "video/$ext";
		break;
	case 'ttf':
	case 'otf':
		$mime = "application/octet-stream";
		break;
	case 'woff':
		$mime = "application/x-font-$ext";
		break;
	case 'eot':
		$mime = "application/vnd.ms-fontobject";
		break;
	default:
		$mime = "text/$ext";
		break;
}

// make an array from the resource URL
$parts = explode('/', $resourceUrl);

// get the application where the resource is located
$application = array_shift($parts);

// build the resource path
$resourcePath = implode('/', $parts);

// and finaly build the full resource path
$fullPath = "./Optimuz/apps/$application/layers/view/resource/$resourcePath";

// set the right mime-type
header("Content-Type: $mime");

// checks whether the file exists
if(is_file($fullPath))
{
	// include the resource file
	readfile($fullPath);
}
else
{
	// if the file does not exist, send a File Not Found error status
	header('x', true, 404);
}
?>