<?php
/**
 * This script only sets some basic tools.
 * @package Threading
 * @version 0.4
 * @since Optimuz 0.3
 * @author Diego Andrade
 * @autoload false
 */

/**
 * Adds a message to the log.
 * @param string $msg Message from thread.
 */
function threadLog($msg)
{
	if(!preg_match('#Declaration of \w+Configuration#', $msg))
	{
		if(isset($GLOBALS['application']) && !empty($GLOBALS['application']))
			$logPath = "{$GLOBALS['rootPath']}apps/{$GLOBALS['application']}/log/" . date('Y/m/d') . '.txt';
		else
			$logPath = "{$GLOBALS['rootPath']}log/" . date('Y/m/d') . '.txt';

		$msg = sprintf(
			"%s: %s%s",
			date('H:i:s'),
			$msg,
			"\n------------------------------------------------------------------------------------------------------------------\n"
		);
		file_put_contents($logPath, $msg, FILE_APPEND);
	}
}

/**
 * Function used to handle script errors. It sends the error description to the
 * script output.
 * @param int $errorNumber Error number.
 * @param string $errorMessage Error description.
 * @param string $errorFile File where the error occurred.
 * @param int $errorLine Error line.
 */
function handleError($errorNumber, $errorMessage, $errorFile, $errorLine)
{
	$msg = "There was an error: [{$errorNumber}] {$errorMessage} on file {$errorFile} on line {$errorLine}";
	threadLog($msg);
}

/**
 * Function used to handle script exceptions. It sends the exception description
 * to the script output.
 * @param Exception $ex Exception object.
 */
function handleException(Exception $ex)
{
	$msg = "There was an error: [{$ex->getCode()}] {$ex->getMessage()} on file {$ex->getFile()} on line {$ex->getLine()}\n{$ex->getTraceAsString()}";
	threadLog($msg);
}

/**
 * Function executed when the script is shutting down.
 */
function finishScript()
{
	$pidPath = "{$GLOBALS['rootPath']}temp/threads/pool/{$GLOBALS['threadID']}.pid";
	$includesPath = "{$GLOBALS['rootPath']}temp/threads/{$GLOBALS['threadID']}.includes";

	if(is_file($pidPath))
		unlink($pidPath);

	if(is_file($includesPath))
		unlink($includesPath);
}

set_error_handler('handleError');
set_exception_handler('handleException');
register_shutdown_function('finishScript');
set_time_limit(0);
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);

$rootPath = reset((explode('Optimuz', $argv[0]))) . 'Optimuz/';

if($argc < 5)
{
	$errMsg = "The number of arguments is invalid. {$argc} arguments received: " . var_export($argv, true);

	if(isset($argv[2]))
		file_put_contents("{$rootPath}/temp/threads/{$argv[2]}.err", $errMsg);

	exit(1);
}

$tempPath = "{$rootPath}temp/threads/";
$actionString = $argv[1];
$threadID = $argv[2];
$tempIncludeFilesPath = "{$tempPath}{$threadID}.includes";
$pidPath = "{$tempPath}pool/{$threadID}.pid";
$interval = $argv[3];
$application = $argv[4];
$params = array_slice($argv, 5);
$includeFiles = null;

/**
 * includes the loader class
 */
require_once "{$rootPath}lib/Core/Enviroment.php";
require_once "{$rootPath}lib/Core/Load.php";

Enviroment::initializePathsConfiguration();

/**
 * includes the bootstrap files
 */
require_once "{$rootPath}config/bootstrap/global.php";
require_once "{$rootPath}apps/{$application}/config/bootstrap/local.php";

/**
 * Overwrites the default configuration for the enviroment.
 */
Enviroment::setWebEnviroment(false);

// restores included files
if(File::exists($tempIncludeFilesPath))
	$includeFiles = require_once $tempIncludeFilesPath;

if(is_array($includeFiles))
{
	foreach($includeFiles as $file)
	{
		if(is_array($file))
			require_once $file['file'];
	}

	unset($includeFiles, $file);
}

LocalConfiguration::set('log.format.type', Log::MESSAGE_SHORT);

// starts the worker
if(LocalConfiguration::get('threading.log.enable'))
	Log::add(Language::getInstance('Threading')->getSentence('msg.startingWorker', $threadID), Log::NORMAL, null, 'global');

$startTime = time();
$timeout = 30;

do
{
	$now = time();

	if($now <= ($startTime + $timeout))
		Thread::sleep(.1);
	else
		throw new ThreadError(Language::getInstance('Threading')->getSentence('error.timeoutError', $threadID, $actionString), Thread::TIMEOUT_ERROR);
}
while(!File::exists($pidPath));

$action = Text::find('::', $actionString) ? Text::split('::', $actionString)->toArray() : $actionString;
$worker = ThreadWorkerPool::get($threadID);

if($worker)
{
	ThreadWorkerPool::setCurrentThread($worker);
	$worker->start($action, $params);
}