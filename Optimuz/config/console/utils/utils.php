<?php
/**
 * This script only sets some basic tools.
 * @version 0.1
 * @since Optimuz 0.3
 * @author Diego Andrade
 */

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
	echo "There was an error: [{$errorNumber}] {$errorMessage}";
}

/**
 * Function used to handle script exceptions. It sends the exception description
 * to the script output.
 * @param Exception $ex Exception object.
 */
function handleException(Exception $ex)
{
	echo "There was an error: {$ex}";
}

/**
 * Reads and returns the contents of a directory.
 * @param string $dirPath Directory path.
 * @param string $sep (optional) Directory separator. Default is '/'.
 * @return array
 */
function getDirContent($dirPath, $sep = '/')
{
	$contents = array(
		'dirs' => array(),
		'files' => array()
	);
	$rootDir = dir($dirPath);

	while(($entry = $rootDir->read()) !== false)
	{
		if(!preg_match('/^\.{1,2}$/', $entry))
		{
			$isDir = is_dir($dirPath . $entry);
			$array = $isDir ? 'dirs' : 'files';
			$contents[$array][] = array(
				'name' => $entry,
				'path' => "{$dirPath}{$entry}" . ($isDir ? $sep : '')
			);
		}
	}

	$rootDir->close();
	return $contents;
}

set_error_handler('handleError');
set_exception_handler('handleException');
?>
