<?php
/**
 * This file sets a class to work with file system operations.
 * @version 0.4
 * @package IO
 */

/**
 * This class is used to handle operations with directories. With it you can
 * create, remove, write and read directories.
 * @author Diego Andrade
 * @package IO
 * @since Optimuz 0.1
 * @version 0.4.1
 * @uses Lang
 */
class Dir
{
	/**
	 * Directory cannot be opened.
	 */
	const CANNOT_OPEN				= 200;

	/**
	 * Directory does not exist.
	 */
	const NOT_EXISTS				= 201;

	/**
	 * Directory already exists.
	 */
	const EXISTS					= 202;

	/**
	 * Directory cannot be created.
	 */
	const CANNOT_CREATE				= 203;

	/**
	 * Directory cannot be removed.
	 */
	const CANNOT_REMOVE				= 204;

	/**
	 * Path of root directory. The root directory is that one initialy opened
	 * by the class.
	 * @var DirPath
	 */
	protected $initialPath			= null;

	/**
	 * Path to current directory.
	 * @var DirPath
	 */
	protected $currentPath			= null;

	/**
	 * Collection of files of the current directory.
	 * @var FilesListIterator
	 */
	protected $files				= null;

	/**
	 * Collection of subdirectories of the current directory.
	 * @var DirsListIterator
	 */
	protected $directories			= null;

	/**
	 * Specifies whether the cache must be used. Default is false.
	 * @var bool false
	 */
	protected $useCache				= null;

	/**
	 * Specifies whether the contents of a directory must be sorted
	 * automaticaly. Default is true.
	 * @var bool true
	 */
	protected $autoSort				= null;

	/**
	 * Global collection of Dir objects created during script execution.
	 * @var ArrayList
	 * @static
	 */
	protected static $openedDirs	= null;

	/**
	 * Creates a new class instance.
	 *
	 * This class is used to handle operations with directories. With it you can
	 * create, remove, write and read directories.
	 * @param string $path (optimal) Path of a directory to open.
	 */
	public function __construct($path = null)
	{
		if(is_null(self::$openedDirs))
			self::$openedDirs = new ArrayList();

		self::$openedDirs->add($this);
		$this->useCache = false;
		$this->autoSort = true;

		if(is_string($path))
			$this->setPath($path);
	}

	/**
	 * Free resources.
	 */
	public function __destruct()
	{
		self::$openedDirs->remove($this);
		$this->files = null;
		$this->directories = null;
	}

	/**
	 * Checks if the directory of $path exists.
	 * @param string $path Directory path.
	 * @return bool
	 * @static
	 */
	public static function exists($path)
	{
		return is_dir($path);
	}

	/**
	 * Returns a Dir object representing the given path.
	 *
	 * If the path does not exist, a null value will be returned.
	 * @param string $path Directory path.
	 * @return Dir
	 * @static
	 */
	public static function open($path)
	{
		$dir = null;

		if(self::exists($path))
			$dir = new self($path);

		return $dir;
	}

	/**
	 * Creates a new directory specified by $path and returns a Dir object
	 * representing it.
	 *
	 * This method creates the entire tree, if parent directory does not exist.
	 * @param string $path Directory path.
	 * @param int $mode (optional) Creation mode. Default is 0777.
	 * @return Dir
	 * @static
	 */
	public static function create($path, $mode = 0777)
	{
		$path = Enviroment::normalizePath($path);

		if(!self::exists($path))
			mkdir($path, $mode, true);

		return new self($path);
	}

	/**
	 * Searhs for directories in the given pattern.
	 * @param string $pattern Pattern of a path where to find the directories.
	 * The same rules for the <code>glob()</code> funcion apply here.
	 * @return ArrayList Returns a list of <code>Dir</code> objects. If no
	 * directories are found, an empty list is returned.
	 * @static
	 */
	public static function search($pattern)
	{
		$result = glob($pattern);
		$list = new ArrayList;

		if(!empty($result))
		{
			foreach($result as $path)
			{
				if(is_dir($path))
					$list->add(new Dir($path));
			}
		}

		return $list;
	}

	/**
	 * Removes the the current directory.
	 *
	 * If any error occurs an IOError will be thrown.
	 * @return bool Returns true on success or false if the directory cannot be
	 * removed.
	 * @throws IOError
	 */
	public function remove()
	{
		$success = false;

		// remove subdirectories
		if(!$this->getDirectories()->getIterator()->isEmpty())
		{
			foreach($this->directories as $dir)
				$dir->remove();
		}

		// remove files
		if(!$this->getFiles()->getIterator()->isEmpty())
		{
			foreach($this->files as $file)
				File::remove($file);
		}

		rmdir($this->initialPath->getFullPath());

		$success = true;
		return $success;
	}

	/**
	 * Copies the current directory and all its contents to the given path.
	 *
	 * If the destination path already exists than nothing is done.
	 *
	 * Returns the copied directory.
	 * @param string $destinationPath Destination path.
	 * @return Dir
	 */
	public function copyTo($destinationPath)
	{
		$copy = self::create($destinationPath);
		$destinationPath = $copy->getPath();

		if(!$this->getDirectories()->getIterator()->isEmpty())
		{
			foreach($this->directories as $dir)
				$dir->copyTo($destinationPath->getFullPath() . $dir->getName());
		}

		if(!$this->getFiles()->getIterator()->isEmpty())
		{
			foreach($this->files as $file)
				$file->copyTo($destinationPath->getFullPath() . $file->getName());
		}

		return $copy;
	}

	/**
	 * Moves the current directory and all its contents to the given path.
	 *
	 * If the destination path already exists than nothing is done.
	 *
	 * Returns the moved directory.
	 * @param string $destinationPath Destination path.
	 * @return Dir
	 */
	public function moveTo($destinationPath)
	{
		$newDir = self::create($destinationPath);
		$destinationPath = $newDir->getPath();

		if(!$this->getDirectories()->getIterator()->isEmpty())
		{
			foreach($this->directories as $dir)
				$dir->moveTo($destinationPath->getFullPath() . $dir->getName());
		}

		if(!$this->getFiles()->getIterator()->isEmpty())
		{
			foreach($this->files as $file)
				$file->moveTo($destinationPath->getFullPath() . $file->getName());
		}

		$this->remove();

		return $newDir;
	}

	/**
	 * Sets a new path to the initial directory.
	 * @param string $path Directory path.
	 */
	public function setPath($path)
	{
		$this->initialPath = new DirPath($path);
		$this->setCurrentPath($this->initialPath);
	}

	/**
	 * Returns the DirPath object of the initial path opened by this object.
	 * @return DirPath
	 */
	public function getPath()
	{
		return $this->initialPath;
	}

	/**
	 * Returns the relative path from the current path to the initial path.
	 * @return string
	 */
	public function getRelativePath()
	{
		$baseName = $this->initialPath->getName();
		$parts = explode($baseName, $this->currentPath->getName());
		$relPath = str_replace(Enviroment::getDirectorySeparator(), '/', $parts[1]);

		if(!preg_match('#^/#', $relPath))
			$relPath = '/' . $relPath;

		return $relPath;
	}

	/**
	 * Returns the name of the current directory.
	 * @return string
	 */
	public function getName()
	{
		return $this->currentPath->getName();
	}

	/**
	 * Sets if the cache of file system functions should be used.
	 * @param bool $useCache True to use the cache, or false to never use it.
	 */
	public function setUseCache($useCache)
	{
		$this->useCache = $useCache;
	}

	/**
	 * Returns a boolean indicating whether to use the cache of file system
	 * functions.
	 * @return bool
	 */
	public function getUseCache()
	{
		return $this->useCache;
	}

	/**
	 * Sets whether the arrays Dir::$dirs and Dir::$files should be sorted after
	 * they are updated.
	 * @param bool $autoSort True or false.
	 */
	public function setAutoSort($autoSort)
	{
		$this->autoSort = $autoSort;
	}

	/**
	 * Returns a boolean indicating whether the arrays Dir::$directories and
	 * Dir::$files should be sorted after they are updated.
	 * @return bool
	 */
	public function getAutoSort()
	{
		return $this->autoSort;
	}

	/**
	 * Returns a FilesList object with all files of the current directory.
	 * @param bool $skipCache (optimal) By default the search to get the files
	 * for the current directory is done only once, and the result is cached for
	 * the next requests. If this paramater is set to true then this search
	 * will be done every time, skiping the cache. The default is false.
	 * @return FilesListIterator
	 * @see Dir::getContents()
	 */
	public function getFiles($skipCache = false)
	{
		if(is_null($this->files) || $skipCache)
			$this->files = new FilesListIterator(($this->getContents('files')));

		return $this->files;
	}

	/**
	 * Returns a DirsList object with all subdirectories of the current
	 * directory.
	 * @param bool $skipCache (optimal) By default the search to get the
	 * directories for the current directory is done only once, and the result
	 * is cached for the next requests. If this paramater is set to true then
	 * this search will be done every time, skiping the cache. The default is
	 * false.
	 * @return DirsListIterator
	 * @see Dir::getContents()
	 */
	public function getDirectories($skipCache = false)
	{
		if(is_null($this->directories) || $skipCache)
			$this->directories = new DirsListIterator(($this->getContents('directories')));

		return $this->directories;
	}

	/**
	 * Checks whether the current directory has files.
	 * @return Bool
	 * @see Dir::getFiles()
	 */
	public function hasFiles()
	{
		return !$this->getFiles()->getIterator()->isEmpty();
	}

	/**
	 * Checks whether the current directory has subdirectories.
	 * @return Bool
	 * @see Dir::getDirectories()
	 */
	public function hasDirectories()
	{
		return !$this->getDirectories()->getIterator()->isEmpty();
	}

	/**
	 * Returns an ArrayListIteratorAggregate object with all files and
	 * subdirectories inside the current directory.
	 * @param string $type Type of content to return: directories or files.
	 * @return ArrayList
	 * @see Dir::getFiles()
	 * @see Dir::getDirectories()
	 */
	protected function getContents($type)
	{
		if(!$this->useCache)
			clearstatcache();

		$contents = new ArrayList();

		if(($dir = opendir($this->currentPath->getFullPath())))
		{
			while(($content = readdir($dir)) !== false)
			{
				if(($content != '.') && ($content != '..'))
				{
					if($type == 'directories')
					{
						if(is_dir($this->currentPath->getFullPath() . $content))
							$contents->add(new self($this->currentPath->getFullPath() . $content));
					}
					else
					{
						if(is_file($this->currentPath->getFullPath() . $content))
							$contents->add(new File($this->currentPath->getFullPath() . $content));
					}
				}
			}
		}
		else
		{
			throw new IOError(Language::getInstance('IO')->getSentence('error.dir.cannotOpen', $this->currentPath->getFullPath()), self::CANNOT_OPEN);
		}

		if($this->autoSort)
			$contents->sort();

		return $contents;
	}

	/**
	 * Changes the current directory and returns the object updated with the new
	 * path.
	 * @param string $path Path of new directory to read. If path is a single
	 * dot ".", the directory will not be changed. If path are two dots ".." the
	 * parent directory of the current directory will be returned. And if path
	 * is a completly different path, the current path will be changed to it.
	 * @return Dir
	 */
	public function enter($path)
	{
		switch($path)
		{
			case '..':
				$this->setCurrentPath($this->currentPath->getParentPath());
				break;
			case '.':
				// same directory, do nothing
				break;
			default:
				$this->setCurrentPath($this->currentPath->getFullPath(true) . $path);
				break;
		}

		return $this;
	}

	/**
	 * Access the parent directory. The same as calling Dir::enter('..').
	 * @return Dir
	 * @see Dir::enter()
	 */
	public function parent()
	{
		return $this->enter('..');
	}

	/**
	 * Changes the current directory to the initial (root) directory.
	 * @return Dir
	 */
	public function reset()
	{
		$this->setCurrentPath($this->initialPath);
		return $this;
	}

	/**
	 * Returns the DirPath object of the current directory.
	 * @return DirPath
	 */
	public function getCurrentPath()
	{
		return $this->currentPath;
	}

	/**
	 * Returns the name of the current directory.
	 * @return string
	 */
	public function __toString()
	{
		return $this->currentPath->getName();
	}

	/**
	 * Sets the current directory path.
	 * @param DirPath|string $path Path of the new directory, either a string or
	 * a DirPath object.
	 */
	protected function setCurrentPath($path)
	{
		$this->currentPath = is_object($path) && ($path instanceof DirPath) ? $path : new DirPath($path);
		$this->files = null;
		$this->directories = null;
	}
}
?>