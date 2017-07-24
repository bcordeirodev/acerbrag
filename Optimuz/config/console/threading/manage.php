<?php
/**
 * This script is used to manage threading operations.
 * @version 0.2
 * @since Optimuz 0.3
 * @author Diego Andrade
 */

/**
 * Includes the main file with some needed tools.
 */
require_once 'utils/utils.php';

/**
 * Kills a thread with the given PID.
 * @global string $threadsDirPath Path to the threads' pool directory.
 * @param string $pid Thread PID.
 */
function killThread($pid)
{
	global $threadsDirPath;
	$filePath = "{$threadsDirPath}{$pid}";

	if(file_exists($filePath))
	{
		$lines = file($filePath);
		$lines[1] = 5;
		file_put_contents($filePath, implode("\n", $lines));
		$success = true;
		echo "Thread {$pid} killed!\n";
	}
	else
	{
		$success = false;
		echo "Thread {$pid} not found!\n";
	}

	return $success;
}

$threadsDirPath = realpath('../../temp/threads/') . '/pool/';
$pool = null;

if(function_exists('eaccelerator_get'))
{
	$pool = eaccelerator_get('threadWorkerPool');
}
else
{
	if(is_dir($threadsDirPath))
		$pool = getDirContent($threadsDirPath);
}

if(!empty($pool['files']))
{
	switch($argv[1])
	{
		case 'show':
			$i = 0;

			foreach($pool['files'] as $thread)
				echo (++$i) . ". {$thread['name']}\n";

			echo "\nTotal of running threads: {$i}";
			break;
		case 'kill-thread':
			$index = (int)$argv[2];
			$found = false;
			$i = 0;

			foreach($pool['files'] as $thread)
			{
				if(++$i == $index)
				{
					killThread($thread['name']);
					$found = true;
					break;
				}
			}

			if(!$found)
				echo "No thread found with index {$index}";
			break;
		case 'kill-threads':
			$i = 0;

			foreach($pool['files'] as $thread)
			{
				if(killThread($thread['name']))
					++$i;
			}

			echo "\nDone! {$i} thread(s) killed";
			break;
		default:
			echo 'Invalid option!';
			break;
	}
}
else
{
	echo 'No threads available';
}
?>