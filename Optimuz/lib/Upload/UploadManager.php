<?php
/**
 * This file sets a class to work with file uploads.
 * @version 0.2
 * @package Upload
 */

/**
 * This class is used to handle file uploads.
 * @author Diego Andrade
 * @package Upload
 * @since Optimuz 0.1
 * @version 0.3
 * @uses Lang
 * @uses IO
 */
class UploadManager extends Object
{
	/**
	 * The input does not exist in the form.
	 */
	const INVALID_INPUT					= 900;

	/**
	 * The POST size exceeds the limit.
	 */
	const MAX_POST_SIZE_OVERLOAD		= 901;

	/**
	 * There are no files to save.
	 */
	const NO_FILES						= 902;

	/**
	 * No file found.
	 */
	const FILE_NOT_FOUND				= 903;

	/**
	 * File error.
	 */
	const FILE_ERROR					= 904;

	/**
	 * UploadManager error.
	 */
	const UPLOAD_ERROR					= 905;

	/**
	 * File without name.
	 */
	const NO_FILE_NAME					= 906;

	/**
	 * The file size exceeds the limit.
	 */
	const MAX_FILE_SIZE_OVERLOAD		= 907;

	/**
	 * The file size is invalid.
	 */
	const INVALID_FILE_SIZE				= 908;

	/**
	 * The file type is invalid.
	 */
	const INVALID_FILE_TYPE				= 909;

	/**
	 * This array holds all files sent to upload.
	 * @var array
	 * @see UploadManager::getFile()
	 * @see UploadManager::getFiles()
	 */
	protected $files					= null;

	/**
	 * Size limit for POST. The same as the post_max_size PHP setting.
	 * @var int
	 * @see UploadManager::setMaxPostSize()
	 * @see UploadManager::getMaxPostSize()
	 */
	protected $maxPostSize				= null;

	/**
	 * Size limit in bytes for a file. The same as the upload_max_filesize PHP
	 * setting.
	 * @var int
	 * @see UploadManager::setMaxFileSize()
	 * @see UploadManager::getMaxFileSize()
	 */
	protected $maxFileSize				= null;

	/**
	 * Allowed file types to save.
	 * @var array
	 * @see UploadManager::setAllowedExtensions()
	 * @see UploadManager::getAllowedExtensions()
	 */
	protected $allowedExtensions		= null;

	/**
	 * Regular expression with invalid characters for the file name.
	 * @var string
	 */
	protected $unvalidChars				= null;

	/**
	 * UploadManager's errors messages.
	 * @var array
	 */
	protected $uploadErrors				= null;

	/**
	 * Array of save files.
	 * @var array
	 * @see UploadManager::getUploadedFile()
	 * @see UploadManager::getUploadedFiles()
	 */
	protected $uploadedFiles			= null;

	/**
	 * This property sets if files with invalid characters in the name must be
	 * automaticaly renamed.
	 *
	 * This setting is used only when UploadManager::$newNmae is not set.
	 * @var bool true
	 */
	protected $autoRename				= null;

	/**
	 * Name to use when the uploaded files are saved.
	 * @var string
	 */
	protected $newName					= null;

	/**
	 * Path where the files will be saved.
	 * @var string
	 */
	protected $savePath					= null;

	/**
	 * Creates a new class instance.
	 *
	 * If the constructor method is called without parameters, all files sent to
	 * upload will be handled. Otherwise, only the file specified with $name and
	 * $index (if there are more then one file with the same name) will be
	 * handled. If the specified file does not exist, an UploadError will be
	 * thrown.
	 * @param string $name (optimal) Input name of the file sent to upload. This
	 * corresponds to the name attribute of the input in the form.
	 * @param int $index (optimal) If PHP receives many inputs with the same
	 * name (which is possible and not wrong) it creates an indexed array. In
	 * this case you must specify what file of that array you want, by giving
	 * the index.
	 *
	 * Below is an example of an upload array:
	 *
	 * <code>
	 * &lt;form action="" method="post" enctype="multipart/form-data"&gt;
	 * &lt;ul&gt;
	 * &lt;li&gt;&lt;input type="file" name="image[]" /&gt;
	 * &lt;li&gt;&lt;input type="file" name="image[]" /&gt;
	 * &lt;li&gt;&lt;input type="file" name="image[]" /&gt;
	 * &lt;li&gt;&lt;input type="file" name="image[]" /&gt;
	 * &lt;/ul&gt;
	 * &lt;p&gt;&lt;input type="submit" value="Send" /&gt;&lt;/p&gt;
	 * &lt;/form&gt;
	 * </code>
	 *
	 * From the above code, PHP will create an array called "image" which will
	 * hold the four files sent, and you must specify which file you want to
	 * handle.
	 *
	 * This index is zero based.
	 */
	public function __construct()
	{
		$this->files				= CurrentHttpRequest::getInstance()->getFiles();
		$this->maxPostSize			= $this->getByteSize(ini_get('post_max_size'));
		$this->maxFileSize			= $this->getByteSize(ini_get('upload_max_filesize'));
		$this->allowedExtensions	= array();
		$this->unvalidChars			= '/[^.A-Z0-9_!@#$%^&()+={}\[\]\',~`-]|\.+$/i';
		$this->uploadedFiles		= array();
		$this->autoRename			= true;
	}

	/**
	 * Sets the size limit for POST data.
	 *
	 * This overwrites the PHP default value, but only for the script execution.
	 *
	 * The shorthand notation used in the php.ini file can be used here too (K
	 * for Kilobytes, M for Megabytes and G for Gigabytes). Even this notation
	 * is used, the value stored is a number representing the total bytes.
	 * @param int|string $size Maximum site allowed. Can be expressed as an
	 * integer (number of bytes) or as a string (shorthand notation).
	 * @see UploadManager::$maxPostSize
	 * @see UploadManager::getMaxPostSize()
	 */
	public function setMaxPostSize($size)
	{
		$this->maxPostSize = $this->getByteSize($size);
	}

	/**
	 * Returns the size limit in bytes for POST data.
	 * @return int
	 * @see UploadManager::$maxPostSize
	 * @see UploadManager::setMaxPostSize()
	 */
	public function getMaxPostSize()
	{
		return $this->maxPostSize;
	}

	/**
	 * Sets the size limit for files.
	 *
	 * This overwrites the PHP default value, but only for the script execution.
	 *
	 * The shorthand notation used in the php.ini file can be used here too (K
	 * for Kilobytes, M for Megabytes and G for Gigabytes). Even this notation
	 * is used, the value stored is a number representing the total bytes.
	 * @param int|string $size Maximum site allowed. Can be expressed as an
	 * integer (number of bytes) or as a string (shorthand notation).
	 * @see UploadManager::$maxFileSize
	 * @see UploadManager::getMaxFileSize()
	 */
	public function setMaxFileSize($size)
	{
		$this->maxFileSize = $this->getByteSize($size);
	}

	/**
	 * Returns the size limit in bytes for files.
	 * @return int
	 * @see UploadManager::$maxFileSize
	 * @see UploadManager::setMaxFileSize()
	 */
	public function getMaxFileSize()
	{
		return $this->maxFileSize;
	}

	/**
	 * Sets the file types allowed to upload.
	 *
	 * Each type must be expressed as the file extension and must be passed as a
	 * different parameter to the method. You can specify as meny types as you
	 * want.
	 *
	 * See an example:
	 *
	 * <code>
	 * <?php
	 * // will handle all sent files
	 * $up = new UploadManager();
	 *
	 * // only these files are allowed
	 * $up->setAllowedExtensions('txt', 'zip', 'jpg');
	 *
	 * // or
	 * $up->setAllowedExtensions(array('txt', 'zip', 'jpg'));
	 * ?>
	 * </code>
	 * @param array $types Array with file types that can be handled.
	 * @param string $type,... File types that can be handled.
	 * @see UploadManager::$allowedExtensions
	 * @see UploadManager::getAllowedExtensions()
	 */
	public function setAllowedExtensions()
	{
		$numArgs = func_num_args();
		$args = func_get_args();

		if($numArgs == 1 && is_array($args[0]))
			$this->allowedExtensions = $args[0];
		elseif($numArgs > 0)
			$this->allowedExtensions = $args;
	}

	/**
	 * Returns an array with the allowed file types to handle.
	 * @return array
	 * @see UploadManager::$allowedExtensions
	 * @see UploadManager::setAllowedExtensions()
	 */
	public function getAllowedExtensions()
	{
		return $this->allowedExtensions;
	}

	/**
	 * Sets if files with invalid characters in the name must be automaticaly
	 * renamed. This only take effect if UploadManager::$newName is not set.
	 *
	 * The class considers as invalid characters anything different from letters
	 * (a-Z), numbers, underscores (_), dashes (-) and dots (.).
	 * @param bool $autoRename If true, invalid characters in the file
	 * name will be replaced with an underscore (_) when the file is saved;
	 * otherwise invalid characters are not changed.
	 * @see UploadManager::$autoRename
	 * @see UploadManager::getAutoRename()
	 */
	public function setAutoRename($autoRename)
	{
		$this->autoRename = $autoRename;
	}

	/**
	 * Returns whether invalid characters in the file name should be replaced.
	 * @return bool
	 * @see UploadManager::$autoRename
	 * @see UploadManager::setAutoRename()
	 */
	public function getAutoRename()
	{
		return $this->autoRename;
	}

	/**
	 * Sets the path where uploaded files must be saved.
	 * @param string $path Path to save files.
	 * @see UploadManager::$savePath
	 * @see UploadManager::getSavePath()
	 */
	public function setSavePath($path)
	{
		$this->savePath = $path;
	}

	/**
	 * Returns the path where uploaded files must be saved.
	 * @return string
	 * @see UploadManager::$savePath
	 * @see UploadManager::setSavePath()
	 */
	public function getSavePath()
	{
		return $this->savePath;
	}

	/**
	 * Sets a new name to save files.
	 *
	 * If more then one file is saved with the same name, they will be renamed
	 * to "newName_fileNumber".
	 * @param string $name New name for files.
	 * @see UploadManager::$newName
	 * @see UploadManager::getNewName()
	 * @see UploadManager::save()
	 */
	public function setNewName($name)
	{
		$this->newName = $name;
	}

	/**
	 * Returns the new name for files.
	 * @return string
	 * @see UploadManager::$newName
	 * @see UploadManager::setNewName()
	 * @see UploadManager::save()
	 */
	public function getNewName()
	{
		return $this->newName;
	}

	/**
	 * Returns an array with the saved files.
	 * @return array
	 * @see UploadManager::$uploadedFiles
	 * @see UploadManager::getUploadedFile()
	 */
	public function getUploadedFiles()
	{
		return $this->uploadedFiles;
	}

	/**
	 * Returns all files saved with the method UploadManager::save().
	 *
	 * The file object has the following properties:
	 *
	 * <ul>
	 * <li><code>input</code>: name of the form input</li>
	 * <li><code>name</code>: file name</li>
	 * <li><code>type</code>: file type</li>
	 * <li><code>tmp_name</code>: file temporary name</li>
	 * <li><code>error</code>: error code (if any)</li>
	 * <li><code>size</code>: file size</li>
	 * <li><code>new_name</code>: file new name</li>
	 * </ul>
	 * @param string $inputName Name of the input field.
	 * @return mixed If only one file was saved with the given input name, an
	 * object is returned. If more then one wast saved, an array is returned. If
	 * no files with the given name were saved yet, a null is returned.
	 * @see UploadManager::$uploadedFiles
	 * @see UploadManager::getUploadedFiles()
	 */
	public function getUploadedFile($inputName)
	{
		foreach($this->uploadedFiles as $file)
		{
			if($file->input == $inputName)
				$files[] = $file;
		}

		if(count($files) == 1)
			$files = $files[0];
		elseif(empty($files))
			$files = null;

		return $files;
	}

	/**
	 * Returns an array of objects representing the files received to upload.
	 * @return array
	 * @see UploadManager::$files
	 * @see UploadManager::getFile()
	 */
	public function getFiles()
	{
		return $this->files;
	}

	/**
	 * Returns all files sent to upload referred by an input name.
	 *
	 * The file object has the following properties:
	 *
	 * <ul>
	 * <li><code>input</code>: name of the form input</li>
	 * <li><code>name</code>: file name</li>
	 * <li><code>type</code>: file type</li>
	 * <li><code>tmp_name</code>: file temporary name</li>
	 * <li><code>error</code>: error code (if any)</li>
	 * <li><code>size</code>: file size</li>
	 * </ul>
	 * @param string $inputName Name of the input field.
	 * @return mixed If only one file was sent with the given input name, an
	 * object is returned. If more then one wast sent, an array is returned. If
	 * no files with the given name were sent, a null is returned.
	 * @see UploadManager::$files
	 * @see UploadManager::getFiles()
	 */
	public function getFile($inputName)
	{
		$files = array();

		foreach($this->files as $file)
		{
			if($file->input == $inputName)
				$files[] = $file;
		}

		if(count($files) == 1)
			$files = $files[0];
		elseif(empty($files))
			$files = null;

		return $files;
	}

	/**
	 * Saves a file received.
	 *
	 * Throws an UploadError in the case of error.
	 * @param object $file File to save. It must to be an object recovered with
	 * UploadManager::getFile() or UploadManager::getFiles().
	 * @param string $path (optional) If this parameter is given, the file will
	 * be save in this path (and UploadManager::$savePath will be changed to
	 * this). Otherwise it will be saved in the path specified in
	 * UploadManager::$savePath.
	 * @throws UploadError
	 * @see UploadManager::setSavePath()
	 * @see UploadManager::checkFile()
	 * @see UploadManager::save()
	 * @see UploadManager::doSaveFile()
	 */
	public function saveFile($file, $path = null)
	{
		if(is_object($file))
		{
			if((int)$_SERVER['CONTENT_LENGTH'] <= $this->maxPostSize)
			{
				if($path != null)
					$this->savePath = $path;

				$this->checkFile($file);
				$this->doSaveFile($file);
			}
			else
			{
				throw new UploadError(Language::getInstance('Upload')->getSentence('upload.error.maxPostSize'), self::MAX_POST_SIZE_OVERLOAD);
			}
		}
		else
		{
			throw new UploadError(Language::getInstance('Upload')->getSentence('upload.error.noFilesToSave'), self::NO_FILES);
		}
	}

	/**
	 * Saves all files received.
	 *
	 * Throws an UploadError in the case of error.
	 * @param string $path (optional) If this parameter is given, the files will
	 * be save in this path (and UploadManager::$savePath will be changed to
	 * this). Otherwise they will be saved in the path specified in
	 * UploadManager::$savePath.
	 * @throws UploadError
	 * @see UploadManager::setSavePath()
	 * @see UploadManager::checkFile()
	 * @see UploadManager::saveFile()
	 * @see UploadManager::doSaveFile()
	 */
	public function save($path = null)
	{
		// check if the array is not empty
		if(!empty($this->files))
		{
			if((int)$_SERVER['CONTENT_LENGTH'] <= $this->maxPostSize)
			{
				if($path != null)
					$this->savePath = $path;

				// loop each file
				foreach($this->files as $file)
				{
					// validate the file
					// an UploadError is thrown here if the validation fails
					$this->checkFile($file);
					$this->doSaveFile($file);
				}
			}
			else
			{
				throw new UploadError(Language::getInstance('Upload')->getSentence('upload.error.maxPostSize'), self::MAX_POST_SIZE_OVERLOAD);
			}
		}
		else
		{
			throw new UploadError(Language::getInstance('Upload')->getSentence('upload.error.noFilesToSave'), self::NO_FILES);
		}
	}

	/**
	 * Saves the file in the defined path.
	 *
	 * Throws an UploadError in the case of errors.
	 * @param object $file Object representing the file to save.
	 * @throws UploadError
	 * @see UploadManager::save()
	 * @see UploadManager::saveFile()
	 */
	protected function doSaveFile($file)
	{
		$newName = null;
		$fileSize = filesize($file->tmp_name);

		// check the file size
		if(!$fileSize || ($fileSize > $this->maxFileSize))
		{
			throw new UploadError(Language::getInstance('Upload')->getSentence('upload.error.fileSize', $file->name), self::MAX_FILE_SIZE_OVERLOAD);
		}
		else
		{
			if($fileSize <= 0)
			{
				throw new UploadError(Language::getInstance('Upload')->getSentence('upload.error.invalidFileSize', $file->name), self::INVALID_FILE_SIZE);
			}
			else
			{
				$newName = isset($this->newName) ? $this->newName : ($this->autoRename ? preg_replace($this->unvalidChars, '_', basename($file->name)) : basename($file->name));

				// check the new file name
				if(strlen($newName) === 0)
				{
					throw new UploadError(Language::getInstance('Upload')->getSentence('upload.error.invalidFileName', $file->name), self::NO_FILE_NAME);
				}
				else
				{
					// check if the path is valid
					if(Dir::exists($this->savePath))
					{
						// check if there is a file in the path with the same name; if so, it will be removed.
						if(File::exists($this->savePath . $newName))
							File::remove($this->savePath . $newName);

						// check the file extension
						$pathInfo = pathinfo($file->name);
						$ext = strtolower($pathInfo['extension']);

						if(!empty($this->allowedExtensions) ? !in_array($ext, $this->allowedExtensions) : false)
						{
							throw new UploadError(Language::getInstance('Upload')->getSentence('upload.error.invalidFileType', $file->name, implode(', ', $this->allowedExtensions)), self::INVALID_FILE_TYPE);
						}
						else
						{
							if(!move_uploaded_file($file->tmp_name, $this->savePath . $newName))
							{
								throw new UploadError(Language::getInstance('Upload')->getSentence('upload.error.cannotSaveFile', $file->name), self::UPLOAD_ERROR);
							}
							else
							{
								$fileProperties = (object)array(
									'input'			=> $file->input,
									'name'			=> $file->name,
									'type'			=> $file->type,
									'size'			=> $file->size,
									'error'			=> $file->error,
									'new_name'		=> $newName
								);

								$this->uploadedFiles[] = $fileProperties;
							}
						}
					}
					else
					{
						throw new UploadError(Language::getInstance('Upload')->getSentence('upload.error.invalidSavePath', $file->name), Dir::NOT_EXISTS);
					}
				}
			}
		}
	}

	/**
	 * Checks a file before saves it to ensure it's safe.
	 *
	 * Throws an UploadError in the case of error.
	 * @param object $file A file object.
	 * @throws UploadError
	 * @see UploadManager::save()
	 */
	protected function checkFile($file)
	{
		if(!$file)
		{
			throw new UploadError(Language::getInstance('Upload')->getSentence('upload.error.fileNotFound', $file), self::FILE_NOT_FOUND);
		}
		else if(isset($file->error) && $file->error != 0)
		{
			throw new UploadError("{$file}: {$this->uploadErrors[$file->error]}", self::FILE_ERROR);
		}
		else if(!isset($file->tmp_name) || !is_uploaded_file($file->tmp_name))
		{
			throw new UploadError(Language::getInstance('Upload')->getSentence('upload.error.uploadError', $file), self::UPLOAD_ERROR);
		}
		else if(!isset($file->name))
		{
			throw new UploadError(Language::getInstance('Upload')->getSentence('upload.error.noName', $file), self::NO_FILE_NAME);
		}
	}

	/**
	 * Returns the file size in bytes.
	 * @param string $size Size in the shorthand notation, like "20M", "500K" or
	 * "2G".
	 * @return int
	 */
	protected function getByteSize($size)
	{
		$unit = strtoupper(substr($size, -1));
		return ($unit == 'M' ? 1048576 : ($unit == 'K' ? 1024 : ($unit == 'G' ? 1073741824 : 1))) * (int)$size;
	}
}
?>