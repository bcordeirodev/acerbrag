<?php
/**
 * This file sets a class to work with file system operations.
 * @version 0.3
 * @package IO
 */

/**
 * This class is used to handle operations with files. With it you can
 * create, remove, write and read files.
 * @author Diego Andrade
 * @package IO
 * @since Optimuz 0.1
 * @version 0.3
 * @uses Core
 * @uses Lang
 */
class File extends Object
{
	/**
	 * File does not exist.
	 */
	const NOT_EXISTS				= 205;

	/**
	 * File's status error.
	 */
	const STATS_ERROR				= 206;

	/**
	 * The file is locked.
	 */
	const FILE_LOCKED				= 207;

	/**
	 * The file could not be created.
	 */
	const CANNOT_CREATE				= 208;

	/**
	 * The given offset is greater then the file size.
	 */
	const INVALID_OFFSET			= 209;

 	/**
	 * Properties of the file's path.
	 * @var FilePath
	 */
 	protected $path					= null;

	/**
	 * Formatted file size.
	 * @var string
	 */
	protected $size					= null;

	/**
	 * File size in bytes.
	 * @var int
	 */
	protected $byteSize				= null;

	/**
	 * File extension.
	 * @var string
	 */
	protected $extension			= null;

	/**
	 * File MIME type.
	 * @var string
	 */
	protected $type					= null;

	/**
	 * Last modified time of the file.
	 * @var int
	 */
	protected $modifiedTime			= null;

	/**
	 * Last accessed time of the file.
	 * @var string
	 */
	protected $accessTime			= null;

	/**
	 * A file handler used with some file functions, such as fopen() e fclose().
	 * @var resource
	 */
	protected $handle				= null;

	/**
	 * Whether the file is locked to read/write.
	 * @var bool
	 */
	protected $locked				= null;

	/**
	 * File mode used to open the handler.
	 * @var string
	 */
	protected $mode					= null;

	/**
	 * Flag used to indicate the file mode (binary or text) on read/write
	 * operations.
	 * @var string
	 */
	protected $specialMode			= null;

	/**
	 * Creates a new class instance.
	 *
	 * This class is used to handle operations with files. With it you can
	 * create, remove, write and read files.
	 *
	 * If the file in $filePath does not exist, an IOError will be thrown.
	 * @param string $filePath Full file path.
	 * @param bool $binary (optimal) True if the file is binary, or false if the
	 * file is plain text. Default is false.
	 */
	public function __construct($filePath, $binary = false)
	{
		$this->path = new FilePath($filePath);
		$this->locked = false;
		$this->specialMode = $binary ? 'b' : 't';
	}

	/**
	 * Free any used resource before destructing the object.
	 */
	public function __destruct()
	{
		$this->close();
	}

	/**
	 * Checks if the file in $path exists.
	 * @param string $path Full file path.
	 * @return bool
	 * @static
	 */
	public static function exists($path)
	{
		return file_exists($path);
	}

	/**
	 * Creates a new file located in $path.
	 *
	 * If the file already exists, it is not overwritten but the File object is
	 * still returned.
	 *
	 * Throws an IOError if the file cannot be created.
	 * @param string $path Full file path.
	 * @param bool $binary (optimal) True if the file is binary, or false if the
	 * file is plain text. Default is false.
	 * @return File
	 * @static
	 */
	public static function create($path, $binary = false)
	{
		if(!self::exists($path))
		{
			if(!touch($path))
				throw new IOError(Language::getInstance('IO')->getSentence('error.file.cannotCreate', $path), self::CANNOT_CREATE);
		}

		return new self($path, $binary);
	}

	/**
	 * Opens the file located in $path and returns a File object to handle it.
	 * @param string $path Full file path.
	 * @param bool $binary (optimal) True if the file is binary, or false if the
	 * file is plain text. Default is false.
	 * @return File Returns a <code>File</code> object or null if the file can't
	 * be opened.
	 * @static
	 */
	public static function open($path, $binary = false)
	{
		$file = null;

		if(self::exists($path))
				$file = new self($path, $binary);

		return $file;
	}

	/**
	 * Removes a file located in $path.
	 *
	 * Returns true on success or false on errors.
	 * @param File|FilePath|string $path It can be a string representing a full
	 * file path, or a File object.
	 * @return bool
	 * @static
	 */
	public static function remove($path)
	{
		if($path instanceof File)
			$path = $path->getPath()->getFullPath();
		elseif($path instanceof FilePath)
			$path = $path->getFullPath();
		else
			$path = Enviroment::normalizePath($path);

		return unlink($path);
	}

	/**
	 * Searhs for files in the given pattern.
	 * @param string $pattern Pattern of a path where to find the files. The
	 * same rules for the <code>glob()</code> funcion apply here.
	 * @return ArrayList Returns a list of <code>File</code> objects. If no
	 * files are found, an empty list is returned.
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
				if(is_file($path))
					$list->add(new File($path));
			}
		}

		return $list;
	}

	/**
	 * Returns the file name.
	 * @return string
	 */
	public function getName()
	{
		return $this->path->getName();
	}

	/**
	 * Returns the file's directory path.
	 * @return string
	 */
	public function getDirPath()
	{
		return $this->path->getDirPath();
	}

	/**
	 * Returns the file's directory instance.
	 * @return Dir
	 */
	public function getDir()
	{
		return Dir::open($this->path->getDirPath());
	}

	/**
	 * Returns the FilePath instance.
	 * @return FilePath
	 */
	public function getPath()
	{
		return $this->path;
	}

	/**
	 * Returns the file size formatted.
	 * @return string
	 */
	public function getSize()
	{
		if(is_null($this->size))
			$this->getFileInfo();

		return $this->size;
	}

	/**
	 * Returns the file size in bytes.
	 * @return int
	 */
	public function getByteSize()
	{
		if(is_null($this->byteSize))
			$this->getFileInfo();

		return $this->byteSize;
	}

	/**
	 * Returns the file extension.
	 * @return string
	 */
	public function getExtension()
	{
		return $this->path->getExtension();
	}

	/**
	 * Returns the file MIME type.
	 * @return string
	 * @todo Check if Fileinfo is available and use it.
	 */
	public function getType()
	{
		if(is_null($this->type))
			$this->type = $this->getMimeType(); //$this->type = mime_content_type($filePath);

		return $this->type;
	}

	/**
	 * Returns the last modified time of the file.
	 * @return int
	 */
	public function getModifiedTime()
	{
		if(is_null($this->modifiedTime))
			$this->getFileInfo();

		return $this->modifiedTime;
	}

	/**
	 * Returns the last accessed time of the file.
	 * @return string
	 */
	public function getAccessTime()
	{
		if(is_null($this->accessTime))
			$this->getFileInfo();

		return $this->accessTime;
	}

	/**
	 * Reads and returns the file content as string.
	 *
	 * Throws an IOError if the offset is greater then the file size.
	 * @param int $offset (optimal) Initial index from where the file must be
	 * read. Default is 0.
	 * @param int $maxLen (optimal) Maximum byte length that can be read from
	 * file.
	 * @return string
	 * @todo Improve read for concurrence with a+ as file mode.
	 */
	public function read($offset = 0, $maxLen = null)
	{
		$this->getHandle('r');
		$content = '';

		if(feof($this->handle))
			rewind($this->handle);

		if($offset > 0)
		{
			if(!($offset > $this->getByteSize()))
				fseek($this->handle, $offset);
			else
				throw new IOError(Language::getInstance('IO')->getSentence('error.file.invalidOffset', $offset, $this->byteSize), self::INVALID_OFFSET);
		}

		if(is_null($maxLen))
		{
			$blockSize = 8096;

			while(!feof($this->handle))
				$content .= fread($this->handle, $blockSize);
		}
		else
		{
			$content = fread($this->handle, $maxLen);
		}

		return $content;
		//return file_get_contents($this->path->getFullPath(), FILE_TEXT);
	}

	/**
	 * Reads a line from the file.
	 *
	 * The read will stop when the maximum length is reached (if given), the
	 * line ends or on EOF.
	 * @param int $maxLen (optimal) Maximum byte length that can be read from
	 * file.
	 * @return string Returns the line read, or <code>false</code> on EOF and on
	 * errors.
	 */
	public function readLine($maxLen = null)
	{
		$this->getHandle('r');
		$line = empty($maxLen) ? fgets($this->handle) : fgets($this->handle, $maxLen);

		return $line;
	}

	/**
	 * Reads the file and returns its contents in an array. Each line of the
	 * file will be a position in the array.
	 *
	 * This method accepts the same parameters of the PHP file() function.
	 * @param int $flags (optimal) Any of the following flags (more than one
	 * can be used with the bitwise operator "|"): FILE_USE_INCLUDE_PATH,
	 * FILE_TEXT, FILE_BINARY.
	 * @param resource $context (optimal) A valid resource created with the
	 * stream_context_create().
	 * @return array
	 */
	public function readToArray($flags = null, $context = null)
	{
		$flags = $flags | FILE_IGNORE_NEW_LINES;
		return file($this->path->getFullPath(), $flags, $context);
	}

	/**
	 * Reads the file and returns its contents as an array of CSV data.
	 *
	 * This method also accepts the same parameters of the PHP file() function.
	 *
	 * Warning: Be careful when reading large files, because this method reads
	 * the entire file into memory. If you want to be memory efficient, read
	 * each line at a time with the method <code>File->readCSVLine()</code>.
	 * @param array $headers (optional) An array which values are used as
	 * headers for the data rows.
	 * @param bool $returnObject (optional) Whether to return the rows of the
	 * data array as object instead of array. If this is true and $headers is
	 * not set, the fields of the rows will be named field_N where N is the
	 * field index starting from zero. Default is true.
	 * @param string $separator (optional) Character used as column separator.
	 * Default is ','.
	 * @param int $flags (optimal) Any of the following flags (more than one
	 * can be used with the bitwise operator "|"): FILE_USE_INCLUDE_PATH,
	 * FILE_TEXT, FILE_BINARY.
	 * @param resource $context (optimal) A valid resource created with the
	 * stream_context_create().
	 * @return ArrayList
	 */
	public function readCSVData($headers = null, $returnObject = true, $separator = ',', $flags = null, $context = null)
	{
		$lines = $this->readToArray($flags, $context);
		$data = array();

		foreach($lines as $line)
		{
			$fields = explode($separator, $line);
			$dataRow = array();

			foreach($fields as $index => $field)
			{
				$parsedValue = preg_replace('#^"|"$#', '', $field);
				$parsedValue = str_replace('""', '"', $parsedValue);

				if(is_array($headers))
				{
					if(isset($headers[$index]))
						$dataRow[$headers[$index]] = $parsedValue;
				}
				else
				{
					if($returnObject)
						$dataRow["field_{$index}"] = $parsedValue;
					else
						$dataRow[] = $parsedValue;
				}
			}

			$data[] = $returnObject ? (object)$dataRow : $dataRow;
		}

		return new ArrayList($data);
	}

	/**
	 * Reads a line from the file and parses it as a CSV data.
	 *
	 * The read will stop when the line ends or on EOF.
	 * @param array $headers (optional) An array which values are used as
	 * headers for the data.
	 * @param boolean $returnObject (optional) Whether to return the data as
	 * object instead of array. If this is <code>true</code> and
	 * <code>$headers</code> is not set, the fields will be named
	 * <code>field_N</code> where N is the field index starting from zero.
	 * Default is <code>true</code>.
	 * @param string $separator (optional) Character used as field separator.
	 * @param string $enclosure (optional) Character used as delimiter for
	 * texts.
	 * @param string $escape (optional) Character used to escape.
	 * @return mixed Returns the parsed data, or <code>false</code> on EOF and
	 * on errors.
	 */
	public function readCSVLine($headers = null, $returnObject = true, $separator = ',', $enclosure = '"', $escape = "\\")
	{
		$this->getHandle('r');
		$line = fgetcsv($this->handle, 0, $separator, $enclosure, $escape);

		if(is_array($line))
		{
			if(is_array($headers) && !empty($headers))
			{
				if(count($line) > count($headers))
					$line = array_slice($line, 0, count($headers));

				$line = array_combine($headers, $line);
			}
			else
			{
				if($returnObject)
				{
					$keys = array();

					foreach($line as $key => $value)
						$keys[] = "field_{$key}";

					$line = array_combine($keys, $line);
					unset($keys, $value);
				}
			}

			if($returnObject)
				$line = (object)$line;
		}

		return $line;
	}

	/**
	 * Writes a string into a file.
	 * @param mixed $content Can be a string, an array or a
	 * valid resource. If it is an array, is the same as calling
	 * File::write(implode('', $array)).
	 * @param int $flags (optimal) Any of the following flags (more than one
	 * can be used with the bitwise operator "|"): FILE_USE_INCLUDE_PATH,
	 * FILE_TEXT, FILE_BINARY, FILE_APPEND, LOCK_EX.
	 * @param resource $context (optimal) A valid resource created with
	 * stream_context_create().
	 */
	public function write($content, $flags = 0, $context = null)
	{
		if(!empty($flags) || !empty($context))
			file_put_contents($this->path->getFullPath(), $content, $flags, $context);
		else
			fwrite($this->getHandle('w'), $content);

		$this->getFileInfo();
	}

	/**
	 * Adds content to the end of the file.
	 * @param mixed $content Can be a string or an array. If it is an array, is
	 * the same as calling File::append(implode('', $content)).
	 */
	public function append($content)
	{
		if(is_array($content))
			$content = implode('', $content);

		fwrite($this->getHandle('a'), $content);
		$this->getFileInfo();
	}

	/**
	 * Adds content followed by a new line character (\n) to the end of the
	 * file.
	 * @param mixed $content Can be a string or an array. If it is an array, is
	 * the same as calling File::appendLine(implode("\n", $content)).
	 */
	public function appendLine($content)
	{
		if(is_array($content))
			$content = implode("\n", $content);

		$this->append("{$content}\n");
	}

	/**
	 * Adds a line in the CSV format into the file. The fields of the array are
	 * separated by the specified separator.
	 * @param array $array An array with data that will be imploded and insert
	 * into the file as a new line. Each field is properly escaped to match the
	 * CSV requirements.
	 * @param string $separator (optional) Character used as column separator.
	 * Default is ','.
	 */
	public function appendCSVLine($array, $separator = ',')
	{
		foreach($array as $key => $value)
		{
			if($value !== '')
			{
				$value = str_replace('"', '""', $value);

				if(preg_match("#\s#", $value))
					$value = '"' . $value . '"';

				if(preg_match('#' . Enviroment::EOL . '#', $value))
					$value = preg_replace('#\s{2,}#', ' ', str_replace(Enviroment::EOL, ' ', $value));

				$array[$key] = $value;
			}
		}

		$this->appendLine(implode($separator, $array));
	}

	/**
	 * Returns the file MIME type.
	 * @return string
	 */
	protected function getMimeType()
	{
		$lines = file(Enviroment::getPath('config') . 'mime.types');
		$ext = null;
		$type = null;

		foreach($lines as $line)
		{
			if($line{0} == '#')
				continue;

			$matches = explode('|', $line);
			$ext = trim(isset($matches[1]) ? $matches[1] : end((explode('/', $matches[0]))));

			if(strpos($ext, ' ') === false ? $ext == $this->path->getExtension() : in_array($this->path->getExtension(), (explode(' ', $ext))))
			{
				$type = $matches[0];
				break;
			}
		}

		return $type;
	}

	/**
	 * Copies the file to the specified path.
	 * @param string $path Full path to where the file must be copied.
	 * @return File On success returns a File object representing the copied
	 * file. And on error returns false.
	 */
	public function copyTo($path)
	{
		$copyPath = Enviroment::normalizePath($path);
		return copy($this->path->getFullPath(), $copyPath) ? File::open($copyPath) : false;
	}

	/**
	 * Moves the file to the specified path.
	 * @param string $path Full path to where the file must be moved.
	 * @return bool Returns true on success or false on errors.
	 */
	public function moveTo($path)
	{
		$path = Enviroment::normalizePath($path);
		$this->freeHandler();

		if(($success = rename($this->path->getFullPath(), $path)))
			$this->path = new FilePath($path);

		return $success;
	}

	/**
	 * Changes the file name. The extension is not changed.
	 * @param string $newName The new name for the file without the extension.
	 * @param boolean $changeExtension Whether to also rename the extension. If
	 * is true, then $newName must to have the extension on it. If it is true
	 * and $newName does not have the extension part, then the extension is not
	 * renamed. Default is false.
	 * @return bool Returns true on success or false on errors.
	 */
	public function rename($newName, $changeExtension = false)
	{
		$basePath = $this->path->getDirPath();
		$oldExt = $this->path->getExtension();
		$newExt = $changeExtension && Text::find('.', $newName) ? Text::split('.', $newName)->getLast() : $oldExt;
		$newPath = "{$basePath}{$newName}.{$newExt}";
		$this->freeHandler();

		if(($success = rename("{$basePath}{$this->path->getName()}", $newPath)))
			$this->path = new FilePath($newPath);

		return $success;
	}

	/**
	 * Sets the permissions for the file.
	 * @param int $mode The mode octal representation, like 0777. Note that the
	 * mode must to be prefixed with a 0 (zero).
	 * @return bool Returns true on success, or false on error.
	 */
	public function changePermissions($mode)
	{
		return chmod($this->path->getFullPath(), $mode);
	}

	/**
	 * Changes the files's owner.
	 * @param string|int $user Name or number of the new owner.
	 * @return bool Returns true on success, or false on error.
	 */
	public function changeOwner($user)
	{
		return chown($this->path->getFullPath(), $user);
	}

	/**
	 * Changes the files group.
	 * @param string|int $group A group name or group number.
	 * @return bool Returns true on success, or false on error.
	 */
	public function changeGroup($group)
	{
		return chgrp($this->path->getFullPath(), $group);
	}

	/**
	 * Gets a handle for the file.
	 *
	 * If there is an opened handle, this one will be close a new one will be
	 * opened.
	 *
	 * Returns a valid resource.
	 * @param string $mode Possible values are: 'a' for append, 'w' for write or
	 * 'r' for read.
	 * @return resource
	 */
	protected function getHandle($mode)
	{
		if($this->mode != $mode)
		{
			if(is_resource($this->handle))
			{
				if(!$this->locked || ((($mode == 'w') || ($mode == 'a')) && (($this->mode == 'w') || ($this->mode == 'a'))))
					fclose($this->handle);
				else
					throw new IOError(Language::getInstance('IO')->getSentence('error.file.fileLocked'), self::FILE_LOCKED);
			}

			$this->handle = fopen($this->path->getFullPath(), $mode . $this->specialMode);
			$this->mode = $mode;

			if($this->locked)
				$this->lock(($this->mode == 'w') || ($this->mode == 'a'));
		}

		return $this->handle;
	}

	/**
	 * Locks the file.
	 *
	 * Return true on success or false on error.
	 * @param $exclusive (optimal) If is true, the file will be locked to write
	 * (exclusive lock). Otherwise it will be locked to read (shared lock).
	 * Default is false.
	 * @return bool
	 */
	public function lock($exclusive = false)
	{
		if($exclusive)
		{
			$mode = $this->mode == 'a' ? 'a' : 'w';
			$lock = LOCK_EX;
		}
		else
		{
			$mode = 'r';
			$lock = LOCK_SH;
		}

		$this->locked = flock($this->getHandle($mode), $lock);
		return $this->locked;
	}

	/**
	 * Unlocks the file.
	 *
	 * The file must be locked to be unlocked.
	 *
	 * Returns true on success or false on errors or if the file is no locked.
	 * @return bool
	 */
	public function unlock()
	{
		$success = false;

		if(is_resource($this->handle))
			$this->locked = !($success = flock($this->handle, LOCK_UN));

		return $success;
	}

	/**
	 * Checks whether the file is locked for read/write.
	 *
	 * Returns true if the file is locked, or false otherwise.
	 * @return bool
	 * @see File::$locked
	 */
	public function isLocked()
	{
		return $this->locked;
	}

	/**
	 * Closes the file freeing any resource used.
	 *
	 * Returns true on success or false on errors.
	 * @return bool
	 */
	public function close()
	{
		$success = false;

		if(is_resource($this->handle))
		{
			if($this->locked)
				$this->unlock();

			$success = $this->freeHandler();
		}
		else
		{
			$success = true;
		}

		return $success;
	}

	/**
	 * Returns whether the current position of the internal handler is at the
	 * end of the file.
	 * @return boolean Returns true if is the end-of-file, or false otherwise.
	 */
	public function isEndOfFile()
	{
		return is_resource($this->handle) && feof($this->handle);
	}

	/**
	 * Frees the memory used by the internal file handler. The handler is closed
	 * and set to null. The mode is also set to null.
	 * @return boolean True on success of false on failure.
	 */
	protected function freeHandler()
	{
		if(is_resource($this->handle))
		{
			$success = fclose($this->handle);
			$this->handle = null;
			$this->mode = null;
		}
		else
		{
			$success = true;
		}

		return $success;
	}

	/**
	 * Clears the filesystem's cache about this file. This is needed to get
	 * fresh information about the file on some operations.
	 */
	public function clearCache()
	{
		$this->path->clearCache();
	}

	/**
	 * Returns the file name.
	 * @return string
	 */
	public function __toString()
	{
		return $this->path->getName();
	}

	/**
	 * Collects information about the file size and access and modification
	 * time.
	 */
	protected function getFileInfo()
	{
		$this->clearCache();
		$stats = stat($this->path->getFullPath());

		if($stats !== false)
		{
			$this->byteSize = (int)$stats['size'];
			$this->modifiedTime = (int)$stats['mtime'];
			$this->accessTime = (int)$stats['atime'];
			$this->size = Formatter::memory($this->byteSize);
		}
		else
		{
			throw new IOError(Language::getInstance('IO')->getSentence('error.file.cannotReadStats', $this->path->getFullPath()), self::STATS_ERROR);
		}
	}
}
?>