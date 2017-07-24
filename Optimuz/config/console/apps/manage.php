<?php
/**
 * This script is used to manage applications.
 *
 * With this script the user can create, import, export and remove applications.
 * @version 0.1
 * @since Optimuz 0.4
 * @author Diego Andrade
 */

/**
 * Includes the main file with some needed tools.
 */
require_once 'utils/utils.php';

/**
 * Directory separator.
 * @var string
 */
$sep = DIRECTORY_SEPARATOR;

/**
 * The root directory where the applications must be placed (/Optimuz/apps/).
 * @var string
 */
$appsRootPath = realpath('../../apps/') . $sep;

/**
 * Checks whether an application with the given name exists.
 * @param string $name Application name.
 * @param bool $checkNotExists If is true, the function will check if the
 * application does NOT exist. Otherwise the function will check if the
 * application DOES exist. In any case when the validation returns false, the
 * script is stopped and a message is displayed. Otherwise a true value is
 * returned.
 * @return bool
 */
function checkApplication($name, $checkNotExists = true)
{
	global $appsRootPath;
	global $sep;
	$appPath = $appsRootPath . $name . $sep;

	if($checkNotExists)
	{
		if(!is_dir($appPath))
			die("The application '{$name}' does not exist! Check if you typed the right name and try again.");
	}
	else
	{
		if(is_dir($appPath))
			die("The application '{$name}' already exist!");
	}

	return true;
}

/**
 * Copies an entire directory tree with all files.
 *
 * Returns true on success or false on errors.
 * @param string $source Source directory.
 * @param string $target Target directory.
 * @return bool
 */
function copyDirectory($source, $target)
{
	global $sep;
	$success = false;

	if($source && $target)
	{
		if(substr($source, -1) != $sep)
			$source .= $sep;

		if(substr($target, -1) != $sep)
			$target .= $sep;

		if(!is_dir($target) ? @mkdir($target) : true)
		{
			$targetName = dirname($target);

			if(preg_match("/^(?:log|temp|session)$/", $targetName))
				chmod($target, 0777);

			$sourceDir = dir($source);

			while(($entry = $sourceDir->read()) !== false)
			{
				if(($entry != '.') && ($entry != '..'))
				{
					if(is_dir($source . $entry . $sep))
						$success = copyDirectory($source . $entry, $target . $entry);
					elseif(is_file($source . $entry))
						$success = copy($source . $entry, $target . $entry);

					if(!$success)
					{
						echo "\n\nCould not copy {$source}{$entry}\n\n";
						break;
					}
				}
				else
				{
					$success = true;
				}
			}
		}
	}

	return $success;
}

/**
 * Removes recursively a directory.
 * @param string $path Directory path.
 * @return bool
 */
function removeDirectory($path)
{
	global $sep;
	$success = false;

	if($path)
	{
		if(substr($path, -1) != $sep)
			$path .= $sep;

		if(is_dir($path))
		{
			$dir = opendir($path);

			while(($entry = readdir($dir)) !== false)
			{
				if(($entry != '.') && ($entry != '..'))
				{
					if(is_file($path . $entry))
						$success = unlink($path . $entry);
					elseif(is_dir($path . $entry . $sep))
						$success = removeDirectory($path . $entry);

					if(!$success)
					{
						echo "\n\nCould not remove {$path}{$entry}\n\n";
						break;
					}
				}
				else
				{
					$success = true;
				}
			}

			closedir($dir);

			if($success)
				$success = rmdir($path);
		}
	}

	return $success;
}

if(isset($argv[2]))
{
	$appName = addslashes(strip_tags($argv[2]));

	if(!preg_match('/^(?:shared|webConsole|error)$/', $appName))
	{
		$appPath = $appsRootPath . $appName . $sep;

		switch($argv[1])
		{
			case 'create':
				if(checkApplication($appName, false))
				{
					if(copyDirectory(realpath("apps{$sep}template{$sep}default{$sep}"), $appPath))
					{
						echo "The application '{$appName}' was created!";
					}
					else
					{
						echo "The application '{$appName}' could not be created!\n";
						echo "Check to see if the directory {$appsRootPath} is writable.";
					}
				}
				break;
			case 'import':
				die('Not implemented');
				echo "The application '{$appName}' was imported!";
				break;
			case 'export':
				die('Not implemented');
				echo "The application '{$appName}' was exported!";
				break;
			case 'remove':
				if(checkApplication($appName))
				{
					if(removeDirectory($appPath))
						echo "The application '{$appName}' was removed!";
					else
						echo "The application '{$appName}' could not be removed!";
				}
				break;
			default:
				echo 'Invalid option!';
				break;
		}
	}
	else
	{
		echo 'You cannot change this application!';
	}
}
else
{
	echo 'The application name was not provided!';
}
?>
