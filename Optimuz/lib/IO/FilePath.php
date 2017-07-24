<?php
/**
 * This file sets a class to work with file system operations.
 * @version 0.1
 * @package IO
 */

/**
 * This class is used to handle files' paths. It encapsulates all properties
 * relative to system paths.
 * @author Diego Andrade
 * @package IO
 * @since Optimuz 0.4
 * @version 0.1
 * @uses Core
 * @uses Lang
 */
class FilePath extends Path
{
	/**
	 * Path of the file's directory.
	 * @var string
	 */
	protected $dirPath				= null;

	/**
	 * File extension.
	 * @var string
	 */
	protected $extension			= null;

	/**
	 * Normalizes $filePath and provides additional methods to retrive
	 * information, such as extension, name and parent directory.
	 *
	 * If the file in $filePath does not exist, an IOError will be thrown.
	 * @param string $filePath Full file path.
	 */
	public function __construct($filePath)
	{
		parent::__construct($filePath);

		if(is_file($filePath))
		{
			$this->dirPath = dirname($this->fullPath);
			$this->extension = end((explode('.', $this->name)));
		}
		else
		{
			throw new IOError(Language::getInstance('IO')->getSentence('error.file.notExists', $filePath), self::NOT_EXISTS);
		}
	}

	/**
	 * Returns the file's directory path.
	 * @param boolean $trailingSlash (optional) Whether to include a trailing
	 * slash to the path. If is true, the separator is get from
	 * Enviroment::getDirectorySeparator(). Default is false.
	 * @return string
	 */
	public function getDirPath($trailingSlash = true)
	{
		return $this->dirPath . ($trailingSlash ? Enviroment::getDirectorySeparator() : '');
	}

	/**
	 * Returns the file extension.
	 * @return string
	 */
	public function getExtension()
	{
		return $this->extension;
	}

	/**
	 * Returns the file name.
	 * @param boolean $includeExtension (optional) Whether to include the file
	 * extension. If is true the returned name will be somthing like "file.ext",
	 * or just "file" if is false. Default is true.
	 * @return string
	 */
	public function getName($includeExtension = true)
	{
		return $includeExtension ? $this->name : preg_replace('#\.\w+$#', '', $this->name);
	}
}
?>