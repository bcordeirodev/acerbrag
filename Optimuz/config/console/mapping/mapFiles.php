<?php
/**
 * This script is used to generate a map file of the classes of the framework.
 * @version 0.4
 * @since Optimuz 0.3
 * @author Diego Andrade
 */

/**
 * Includes the main file with some needed tools.
 */
require_once 'utils/utils.php';

/**
 * Directory separator. For compability between systems we use a forward slash.
 * @var string
 */
$sep = '/';

/**
 * Generates a map of packages and files.
 *
 * Retuns an array with the mapped content.
 * @param array $packages Array with directories and files to be mapped.
 * @param bool $recursive (optional) Whether to also map subdirectories. Default
 * is true.
 * @param string $sep (optional) Directory separator. Default is '/'.
 * @return array
 */
function mapFiles(array $packages, $recursive = true, $sep = '/')
{
	$map = array(
		'files' => array(),
		'packages' => array()
	);

	if($recursive)
	{
		foreach($packages['dirs'] as $dir)
		{
			$package = $dir['name'];

			if($package != '.svn')
			{
				$map['packages'][$package] = array(
					'files' => array()
				);
				$subPackage = getDirContent($dir['path'], $sep);

				foreach($subPackage['files'] as $i => $file)
				{
					if(($fileMap = mapFile($file)))
					{
						$fileName = basename($file['name'], '.php');
						$map['files'][$fileName] = $fileMap;
						$map['packages'][$package]['files'][] = $fileName;
					}
				}

				if(!empty($subPackage['dirs']))
				{
					$subMap = mapFiles($subPackage, $recursive, $sep);
					$map['files'] = array_merge($map['files'], $subMap['files']);
					$map['packages'] = array_merge($map['packages'], $subMap['packages']);
				}
			}
		}
	}

	foreach($packages['files'] as $file)
	{
		if(($fileMap = mapFile($file)))
		{
			$fileName = basename($file['name'], '.php');
			$map['files'][$fileName] = $fileMap;
			$map['packages'][basename(dirname($file['path']))]['files'][] = $fileName;
		}
	}

	return $map;
}

/**
 * Reads the file and resturns a map of it.
 * @param array $file File to map.
 * @return array
 */
function mapFile(array $file)
{
	$fileMap = null;

	if(basename($file['name']) != 'empty')
	{
		$fileContent = file_get_contents($file['path']);

		if(stripos($fileContent, '@autoload false') === false)
		{
			$fileMap = array(
				'file' => str_replace(ROOT_PATH, '', $file['path']),
				'uses' => null,
				'extends' => null
			);

			// get dependencies
			preg_match_all('/@uses ([\w._0-9]+)/im', $fileContent, $usings);

			if(isset($usings[1]) && !empty($usings[1]))
			{
				$fileMap['uses'] = array();

				foreach($usings[1] as $use)
				{
					if(strpos($use, '.') !== false)
						$use = end((explode('.', $use)));

					$fileMap['uses'][] = $use;
				}
			}

			// get parent classes
			$name = basename($file['path'], '.php');
			// this pattern retuns a string like ' extends className implements interfaceName',
			// then additional work is done to retrieve the parents of the class
			$pattern = '/^(?:[a-zA-Z ]+)?(?:class|interface)\s+' . $name . '((?:extends|implements)?.*)$/im';
			preg_match($pattern, $fileContent, $parents);

			if(isset($parents[1]) && !empty($parents[1]))
			{
				$parents[1] = str_replace('{', '', $parents[1]);
				$parents = explode(' ', str_replace(',', '', trim($parents[1])));
				$parents = array_values((array_filter($parents, create_function('$word', 'return !empty($word) && (preg_match("/extends|implements/", $word) !== 1);'))));

				if(!empty($parents))
					$fileMap['extends'] = $parents;
			}
		}
	}

	return $fileMap;
}

/**
 * Return the current directory with the right directory separator.
 * @param string $sep Directory separator to use in the returned path.
 * @return string Path of the current directory, i.e., the directory of the 
 * running script.
 */
function getCurrentWorkingDirectory($sep)
{
	return str_replace(DIRECTORY_SEPARATOR, $sep, getcwd());
}

// initialize the variables
$initTime = microtime(true);
define('ROOT_PATH', str_replace("{$sep}config{$sep}console", '', getCurrentWorkingDirectory($sep)) . $sep);
$apps = getDirContent(ROOT_PATH . "apps{$sep}", $sep);
$map = array();
$totalFiles = 0;
$totalPackages = 0;
$pathsToLoad = array(
	array('name' => 'lib', 'path' => 'lib', 'recursive' => true)
);

// include the directories of the apps
foreach($apps['dirs'] as $dir)
{
	$pathsToLoad[] = array('name' => $dir['name'], 'path' => "apps{$sep}{$dir['name']}{$sep}components", 'recursive' => true);
	$pathsToLoad[] = array('name' => $dir['name'], 'path' => "apps{$sep}{$dir['name']}{$sep}layers{$sep}control", 'recursive' => true);
	$pathsToLoad[] = array('name' => $dir['name'], 'path' => "apps{$sep}{$dir['name']}{$sep}layers{$sep}model", 'recursive' => true);
	$pathsToLoad[] = array('name' => $dir['name'], 'path' => "apps{$sep}{$dir['name']}{$sep}layers{$sep}view", 'recursive' => false);
	//$pathsToLoad[] = array('name' => $dir['name'], 'path' => "apps{$sep}{$dir['name']}{$sep}scripts", 'recursive' => true); // vendor scripts should be loaded manualy
}

// loop through all directories to build the map
foreach($pathsToLoad as $path)
{
	if(is_dir(ROOT_PATH . $path['path']))
	{
		echo "Mapping '" . ROOT_PATH . $path['path'] . "'...\n";
		$packages = getDirContent(ROOT_PATH . $path['path'] . $sep, $sep);
		$tmpMap = mapFiles($packages, $path['recursive'], $sep);

		if(!isset($map[$path['name']]))
		{
			$map[$path['name']] = array(
				'files' => array(),
				'packages' => array()
			);
		}

		$map[$path['name']]['files'] = array_merge($map[$path['name']]['files'], $tmpMap['files']);
		$map[$path['name']]['packages'] = array_merge($map[$path['name']]['packages'], $tmpMap['packages']);

		$totalFiles += ($tFiles = count($tmpMap['files']));
		$totalPackages += ($tPackages = count($tmpMap['packages']));
		echo "Mapped {$tFiles} files and {$tPackages} packages\n\n";
	}
}

// save the map to a file
$mapPath = getCurrentWorkingDirectory($sep) . "{$sep}..{$sep}filesMap.php";
$mapFile = file_put_contents($mapPath, "<?php\nreturn " . var_export($map, true) . ";\n?>");
chmod($mapPath, 0777);

$endTime = microtime(true);
$elapsedTime = round($endTime - $initTime, 2);

// print the results
echo "\nMapping finished in {$elapsedTime} seconds!\n";
echo "{$totalFiles} files mapped\n";
echo "{$totalPackages} packages mapped\n";
?>
