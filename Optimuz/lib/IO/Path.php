<?php
/**
 * This file sets a class to work with file system operations.
 * @version 0.1
 * @package IO
 */

/**
 * This class is used to handle system paths. It encapsulates all properties
 * relative to system paths.
 * @author Diego Andrade
 * @package IO
 * @since Optimuz 0.4
 * @version 0.1
 * @uses Core
 * @uses Lang
 */
class Path
{
	/**
	 * Path does not exist.
	 */
	const NOT_EXISTS				= 210;

 	/**
	 * File/directory name.
	 * @var string
	 */
 	protected $name					= null;

	/**
	 * Full path.
	 * @var string
	 */
	protected $fullPath				= null;

	/**
	 * Normalizes $path and provides additional methods to retrive information.
	 *
	 * If the $path does not exist, an IOError will be thrown.
	 * @param string $path Full path to a file or directory.
	 */
	public function __construct($path)
	{
		$this->fullPath = Enviroment::normalizePath($path);
		$this->name = end((explode(Enviroment::getDirectorySeparator(), $this->fullPath)));
	}
	
	/**
	 * Returns the file/directory name.
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Returns the full path.
	 * @return string
	 */
	public function getFullPath()
	{
		return $this->fullPath;
	}

	/**
	 * Clears the filesystem's cache for this filename. This is needed to get
	 * fresh information about the path on some operations.
	 */
	public function clearCache()
	{
		clearstatcache(true, $this->fullPath);
	}

	/**
	 * Returns the full path.
	 * @return string
	 */
	public function __toString()
	{
		return $this->fullPath;
	}
}
?>