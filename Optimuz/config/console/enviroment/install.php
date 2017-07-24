<?php
/**
 * 
 * @package Optimuz
 * @author Diego Andrade
 * @version 0.1
 * @since 0.4
 */

/**
 * Sets the permissions for the given path. Default permission is 0777 (full 
 * control).
 * @param string $path Location to change permission.
 */
function setPermission($path)
{
	$msg = '';

	if(@chmod($path, 0777))
	{
		$msg = "$path - success";
	}
	else
	{
		$error = error_get_last();
		$msg = "$path - error ({$error['message']})";
	}

	echo "$msg\n";
}

/**
 * Operational system type.
 */
define('OS', php_uname('s'));

$isWin = stripos(OS, 'win') === 0;
$isLinux = stripos(OS, 'linux') === 0;

/**
 * Directory separator.
 */
$sep = DIRECTORY_SEPARATOR;

/**
 * Optimuz root directory.
 */
$optimuzRoot = reset(explode('Optimuz', getcwd())) . "Optimuz$sep";

/**
 * List of directories that need special permissions.
 */
$specialDirs = array(
	'cache',
	'config',
	'log',
	'session',
	'temp',
	'upload',
);

/**
 * Changes permissions for special directories.
 */
echo "Setting permissions for special directories...\n\n";

foreach($specialDirs as $dir)
	setPermission("{$optimuzRoot}{$dir}{$sep}");

/**
 * Changes permissions for special directories for each application.
 */
unset($specialDirs['config'], $specialDirs['upload']);

$dirHandle = @opendir("{$optimuzRoot}apps{$sep}");

if(is_resource($dirHandle))
{
	while(($currentApp = readdir($dirHandle)) !== false)
	{
		if(($currentApp != '.') && ($currentApp != '..') && ($currentApp != 'shared'))
		{
			foreach($specialDirs as $dir)
			{
				$dirPath = "{$optimuzRoot}apps{$sep}{$currentApp}{$sep}{$dir}{$sep}";

				if(is_dir($dirPath))
					setPermission($dirPath);
			}
		}
	}

	echo "\nDone!\n";
}
else
{
	echo "\nCould not open the applications directory\n";
	$error = error_get_last();
	echo "{$error['message']}\n";
}

/**
 * Generates the files' map.
 */
echo "\nGenerating map of files...\n\n";
require_once 'mapping/mapFiles.php';

echo "\nDone!\n";

/**
 * Final message.
 */
echo "\nAll done!\n";
?>
