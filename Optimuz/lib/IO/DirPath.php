<?php
/**
 * This file sets a class to work with file system operations.
 * @version 0.1
 * @package IO
 */

/**
 * This class is used to handle directory' paths. It encapsulates all properties
 * relative to system paths.
 * @author Diego Andrade
 * @package IO
 * @since Optimuz 0.4
 * @version 0.1
 * @uses Core
 * @uses Lang
 */
class DirPath extends Path
{
	/**
	 * Path of the parent directory.
	 * @var string
	 */
	protected $parentPath				= null;

	/**
	 * Normalizes $dirPath and provides additional methods to retrive
	 * information, such as name.
	 *
	 * If the file in $dirPath does not exist, an IOError will be thrown.
	 * @param string $dirPath Full directory path.
	 */
	public function __construct($dirPath)
	{
		$dirPath = Text::remove('#[\\/]+$#', $dirPath);
		parent::__construct($dirPath);

		if(is_dir($dirPath))
		{
			$this->parentPath = dirname($this->fullPath);
		}
		else
		{
			throw new IOError(Language::getInstance('IO')->getSentence('error.dir.notExists', $dirPath), self::NOT_EXISTS);
		}
	}

	/**
	 * Returns the full path of the directory.
	 * @param boolean $trailingSlash (optional) Whether to include a trailing
	 * slash to the path. If is true, the separator is get from
	 * Enviroment::getDirectorySeparator(). Default is false.
	 * @return string
	 */
	public function getFullPath($trailingSlash = true)
	{
		return parent::getFullPath() . ($trailingSlash ? Enviroment::getDirectorySeparator() : '');
	}

	/**
	 * Returns the path of the parent directory.
	 * @param boolean $trailingSlash (optional) Whether to include a trailing
	 * slash to the path. If is true, the separator is get from
	 * Enviroment::getDirectorySeparator(). Default is false.
	 * @return string
	 */
	public function getParentPath($trailingSlash = true)
	{
		return $this->parentPath . ($trailingSlash ? Enviroment::getDirectorySeparator() : '');
	}
}
?>