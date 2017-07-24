<?php
/**
 * This file sets a class to work with file uploads.
 * @version 0.1
 * @package Upload
 */

/**
 * This class is used to represent an uploaded file. It only defines the
 * atributes of the file that will be handled by the UploadManager class.
 * @author Diego Andrade
 * @package Upload
 * @since Optimuz 0.3
 * @version 0.1
 * @uses Strings
 * @uses IO
 */
class FileUpload
{
	/**
	 * The file index is missing.
	 */
	const MISSING_INDEX				= 910;

	/**
	 * The save path is invalid.
	 */
	const INVALID_SAVE_PATH			= 911;

	/**
	 * File name.
	 * @var string
	 */
	protected $name					= null;

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
	 * File size (in bytes).
	 * @var int
	 */
	protected $size					= null;

	/**
	 * File temp name.
	 * @var string
	 */
	protected $tempName				= null;

	/**
	 * File content.
	 * @var string
	 */
	protected $content				= null;

	/**
	 * Whether the file was saved or not.
	 * @var bool
	 * @see FileUpload::save()
	 * @see FileUpload::isSaved()
	 */
	protected $saved				= null;

	/**
	 * FileUpload's errors messages.
	 * @var array
	 */
	protected $uploadErrors			= null;

	/**
	 * Creates a new class instance.
	 *
	 * This class is used to represent an uploaded file. It only defines the
	 * atributes of the file that will be handled by the UploadManager class.
	 * @param string $name Input name of the file sent to upload. This
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
	 * &lt;li&gt;&lt;input type="file" name="image" /&gt;
	 * &lt;li&gt;&lt;input type="file" name="image" /&gt;
	 * &lt;li&gt;&lt;input type="file" name="image" /&gt;
	 * &lt;li&gt;&lt;input type="file" name="image" /&gt;
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
	public function __construct($name, $index = null)
	{
		$this->saved = false;

		if(isset($_FILES[$name]))
		{
			$file = $_FILES[$name];

			if(is_array($file['name']))
			{
				if(isset($file['name'][$index]))
				{
					$file = array(
						'name'		=> $file['name'][$index],
						'type'		=> $file['type'][$index],
						'size'		=> $file['size'][$index],
						'tmp_name'	=> $file['tmp_name'][$index],
						'error'		=> $file['error'][$index]
					);
				}
				else
				{
					throw new UploadError(Language::getInstance('Upload')->getSentence('upload.error.missingIndex', $name), self::MISSING_INDEX);
				}
			}

			$this->name = $file['name'];
			$this->tempName = $file['tmp_name'];
			$this->extension = Text::split('.', $file['name'])->getLast();
			$this->type = $file['type'];
			$this->size = (int)$file['size'];
			$this->error = $file['error'];

			$this->uploadErrors = array(
				Language::getInstance('Upload')->getSentence('upload.error.noErrors'),
				Language::getInstance('Upload')->getSentence('upload.error.maxUploadSize'),
				Language::getInstance('Upload')->getSentence('upload.error.maxFileSize'),
				Language::getInstance('Upload')->getSentence('upload.error.missingPartOfFile'),
				Language::getInstance('Upload')->getSentence('upload.error.noFileFound'),
				Language::getInstance('Upload')->getSentence('upload.error.noTempFolder')
			);
		}
		else
		{
			throw new UploadError(Language::getInstance('Upload')->getSentence('upload.error.invalidInput', $name), UploadManager::INVALID_INPUT);
		}
	}

	/**
	 * Sets the file name.
	 *
	 * If more then one file is saved with the same name, they will be renamed
	 * to "name_fileNumber".
	 * @param string $name File name.
	 * @see FileUpload::$name
	 * @see FileUpload::getName()
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * Returns the file name.
	 * @return string
	 * @see FileUpload::$name
	 * @see FileUpload::setName()
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Returns the file extension.
	 * @return string
	 * @see FileUpload::$extension
	 */
	public function getExtension()
	{
		return $this->extension;
	}

	/**
	 * Returns the file MIME type as received from the client.
	 * @return string
	 * @see FileUpload::$type
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Returns the file size (in bytes).
	 * @return int
	 * @see FileUpload::$size
	 */
	public function getSize()
	{
		return $this->extension;
	}

	/**
	 * Returns the file temp name.
	 * @return string
	 * @see FileUpload::$tempName
	 */
	public function getTempName()
	{
		return $this->tempName;
	}

	/**
	 * Returns the file error (if any).
	 *
	 * If no error is available a null value will be returned.
	 * @return string
	 * @see FileUpload::$error
	 */
	public function getError()
	{
		return $this->error;
	}

	/**
	 * Returns the file content.
	 * @return string
	 */
	public function read()
	{
		if(is_null($this->content))
			$this->content = File::open($this->tempName)->read();

		return $this->content;
	}

	/**
	 * Removes the file from the temporary folder.
	 */
	public function remove()
	{
		File::remove($this->tempName);
	}

	/**
	 * Moves the file from the temporary folder to another folder definitive
	 * folder.
	 *
	 * Returns true on success or false or error.
	 * @param string $savePath Path where the file should be saved.
	 * @return bool
	 * @see FileUpload::$saved
	 * @see FileUpload::isSaved()
	 */
	public function save($savePath)
	{
		if(Dir::exists($savePath))
		{
			if($this->size < 0)
				throw new UploadError(Language::getInstance('Upload')->getSentence('upload.error.invalidFileSize'), UploadManager::INVALID_FILE_SIZE);

			if(isset($this->error) && $this->error != 0)
				throw new UploadError("{$name}: {$this->uploadErrors[$this->error]}", UploadManager::FILE_ERROR);

			if(!isset($this->name))
				throw new UploadError(Language::getInstance('Upload')->getSentence('upload.error.noName'), UploadManager::NO_FILE_NAME);

			$char = Text::substring($savePath, -1);

			if(($char != '/') && ($char != '\\'))
				$savePath .= Enviroment::DIR_SEP;

			$savePath .= $this->name;

			// check if there is a file in the path with the same name; if so, it will be removed.
			if(File::exists($savePath))
				File::remove($savePath);

			if(move_uploaded_file($this->tempName, $savePath))
			{
				$this->saved = true;
			}
			else
			{
				throw new UploadError(Language::getInstance('Upload')->getSentence('upload.error.cannotSaveFile'), UploadManager::UPLOAD_ERROR);
			}
		}
		else
		{
			throw new UploadError(Language::getInstance('Upload')->getSentence('upload.error.invalidSavePath'), self::INVALID_SAVE_PATH);
		}

		return $this->saved;
	}

	/**
	 * Returns whether the file was saved or not.
	 * @return bool
	 * @see FileUpload::$saved
	 * @see FileUpload::save()
	 */
	public function isSaved()
	{
		return $this->saved;
	}

	/**
	 * Checks whether the input is an uploaded file.
	 * @param string $name Input name of the file.
	 * @return bool
	 * @static
	 */
	public static function exists($name)
	{
		return isset($_FILES) && is_array($_FILES) && isset($_FILES[$name]) && is_uploaded_file($_FILES[$name]['tmp_name']);
	}

	/**
	 * Factory method that returns a new instance of the FileUpload class for
	 * the given file.
	 * @param string $name Input name of the file.
	 * @return FileUpload
	 * @static
	 */
	public static function getFile($name)
	{
		return new self($name);
	}
}
?>