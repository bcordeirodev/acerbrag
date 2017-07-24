<?php
/**
 * This script is used to manage cache using eAccelerator.
 * @version 0.1
 * @since Optimuz 0.3
 * @author Diego Andrade
 */

/**
 * Class based on the eAccelerator code accelerator.
 * @static
 * @version 0.1
 * @since Optimuz 0.3
 * @author Diego Andrade
 */
final class Accelerator
{
	/**
	 * Removes all unused scripts and data from the cache.
	 * @static
	 */
	public static function clearCache()
	{
		eaccelerator_clear();
	}

	/**
	 * Displays a list of cached files.
	 * @static
	 */
	public static function showCachedFiles()
	{
		$files = eaccelerator_cached_scripts();

		if(is_array($files))
		{
			foreach($files as $i => $file)
				echo "{$i}. {$file}\n";
		}
		else
		{
			echo 'No files cached';
		}
	}

	/**
	 * Displays a list of cached data.
	 * @static
	 * @todo Implements Accelerator::showCachedData().
	 */
	public static function showCachedData()
	{
		die('Not implemented');
		$data = eaccelerator_list_keys();

		if(is_array($data))
		{
			foreach($data as $i => $name)
				echo "{$i}. {$name}\n";
		}
		else
		{
			echo 'No data cached';
		}
	}
}
?>