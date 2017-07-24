<?php
/**
 * This file sets a class to work with images.
 * @version 0.7
 * @package Drawing
 */

/**
 * Class used to manipulate thumbnails with resize and crop operations.
 *
 * Supported image types are: JPEG, GIF and PNG.
 * @author Diego Andrade
 * @package Drawing
 * @since Optimuz 0.1
 * @version 0.7
 * @uses IO
 * @uses Lang
 * @uses Core.Enviroment
 */
class Thumb extends Image
{
	/**
	 * Invalid image dimensions (width and height).
	 */
	const INVALID_DIMENSIONS		= 700;

	/**
	 * The image could not be created.
	 */
	const IMAGE_NOT_CREATED			= 701;

	/**
	 * The image size is too large.
	 */
	const MAX_SIZE_OVERLOAD			= 702;

	/**
	 * Forces the new width and calculates the new height based upon the new
	 * width.
	 */
	const MATCH_WIDTH				= 1;

	/**
	 * Forces the new height and calculates the new width based upon the new
	 * height.
	 */
	const MATCH_HEIGHT				= 2;

	/**
	 * Resource object of the original image.
	 * @var object
	 */
	protected $originalImageObject	= null;

	/**
	 * Resource object used to handle the image.
	 * @var object
	 */
	protected $imageObject			= null;

	/**
	 * Specifies whether the image will always be resized, even if the new
	 * dimensions are bigger then the original.
	 *
	 * Default is false.
	 * @var bool
	 */
	protected $alwaysResize			= null;

	/**
	 * Original image width.
	 * @var int
	 */
	protected $originalWidth		= null;

	/**
	 * Original image height.
	 * @var int
	 */
	protected $originalHeight		= null;

	/**
	 * New name for the thumbnail.
	 * @var string
	 */
	protected $newName				= null;

	/**
	 * Creates a new class instance to handle an image.
	 * @param string $path (optimal) Path of an existing image.
	 */
	public function __construct($path = null)
	{
		parent::__construct($path);
		$this->alwaysResize = false;
	}

	/**
	 * Destroys the internal objects to free up memory.
	 */
	public function __destruct()
	{
		$this->destroy();
	}

	/**
	 * Sets a new name for the image.
	 * @param string $name New name.
	 * @see Thumb::$name
	 * @see Thumb::getName()
	 */
	public function setName($name)
	{
//		File::open($this->getPath())->copyTo("{$this->dirPath}$name");
		$this->newName = Text::remove("/\.{$this->extension}$/", $name);
	}

	/**
	 * Sets the original image path from where the thumbnail will be created.
	 * @param string $path Image path.
	 * @see Image::$path
	 * @see Image::getPath()
	 * @see Image::getDirectoryPath()
	 */
	public function setPath($path)
	{
		parent::setPath($path);
		$this->originalHeight = $this->height;
		$this->originalWidth = $this->width;
		$this->destroy();
	}

	/**
	 * Sets wheter the image should be resized, even if the new dimensions are
	 * bigger then the original.
	 * @param bool $alwaysResize If is true, the image will always be resized;
	 * if false, it will be resized only if new dimensions are smaller then the
	 * originals.
	 * @see Thumb::$alwaysResize
	 * @see Thumb::getAlwaysResize()
	 */
	public function setAlwaysResize($alwaysResize)
	{
		$this->alwaysResize = $alwaysResize;
	}

	/**
	 * Returns a boolean indicating if the image should be resized, even if the
	 * new dimensions are bigger then the originals.
	 * @return bool
	 * @see Thumb::$alwaysResize
	 * @see Thumb::setAlwaysResize()
	 */
	public function getAlwaysResize()
	{
		return $this->alwaysResize;
	}

	/**
	 * Resizes the image to the specified dimensions.
	 *
	 * The dimensions can be expressed as pixels (only numbers like 10) or
	 * percentages (like 10%). The percentages are relative to the current
	 * dimensions of the image.
	 * @param int $width New thumbnail width.
	 * @param int $height New thumbnail height.
	 * @param boolean $autoCrop (optional) Whether to automaticaly crop the
	 * image to fit the new dimensions. The image is only cropped if the height
	 * or width of the generated thumbnail is bigger then the height and width
	 * specified. Default is false.
	 * @param boolean $centerOnCrop (optional) If auto crop is turned on, then
	 * the default behaviour is to center the cropped area. You can change this
	 * by passing a false for this parameter, so the image is cropped from the
	 * top left corner. Default is true.
	 * @param int $match (optional) This parameter forces the new image to have
	 * its new dimensions calculated based upon the width or height. If this
	 * parameter is not given, the new dimensions are calculated based on the
	 * ratio of the original image. If you give <code>Thumb::MATCH_WIDTH</code>,
	 * the new width will be equal to <code>$width</code> and the new height
	 * will be based on it. If you give <code>Thumb::MATCH_HEIGHT</code>, the
	 * new height will be equal to <code>$height</code> and the new width will
	 * be based on it. The default is null, i.e., based on the original image
	 * ratio.
	 * @return boolean True if the thumbnail is successfully resized, false
	 * otherwise.
	 * @throws ImageError
	 */
	public function resize($width, $height, $autoCrop = false, $centerOnCrop = true, $match = null)
	{
		$success = false;
		$this->setImageObjects();
		$originalImage = $this->imageObject;

		if(is_resource($originalImage))
		{
			$dimensions = $this->getDimensions();
			$oldWidth = $dimensions->width;		// original width
			$oldHeight = $dimensions->height;	// original height
			$oldRatio = $oldHeight * 100 / $oldWidth / 100;

			$newWidth = 0;
			$newHeight = 0;

			$width = $this->getRealPosition($width, $oldWidth);
			$height = $this->getRealPosition($height, $oldHeight);
			$ratio = $height * 100 / $width / 100;

			// image has new dimensions
			if(($width > 0) || ($height > 0))
			{
				// new dimensions are bigger then the originals
				if(!$this->alwaysResize)
				{
					if($width > $oldWidth)
						$width = $oldWidth;

					if($height > $oldHeight)
						$height = $oldHeight;
				}

				$calc = null;

				if(!is_int($match))
				{
					if($ratio == 1)
						$calc = 's';
					elseif($ratio > 1)
						$calc = 'h';
					else
						$calc =	'w';
				}
				else
				{
					$calc = $match == self::MATCH_HEIGHT ? 'h' : 'w';
				}

				// square
				if($calc == 's')
				{
					if($oldRatio == 1)
					{
						$newWidth = $width;
						$newHeight = $height;
					}
					elseif($oldRatio > 1)
					{
						$newWidth = $width;
						$ratio = $width * 100 / $oldWidth / 100;
						$newHeight = ceil($oldHeight * $ratio);
					}
					else
					{
						$newHeight = $height;
						$ratio = $height * 100 / $oldHeight / 100;
						$newWidth = ceil($oldWidth * $ratio);
					}
				}
				// height bigger (portrait)
				elseif($calc == 'h')
				{
					$newHeight = $height;
					$newWidth = ceil($height * $oldRatio);
				}
				// width bigger (landscape)
				else
				{
					$newWidth = $width;
					$newHeight = ceil($width * $oldRatio);
				}
			}
			// image does not have new dimensions
			else
			{
				// image original dimensions
				if(($oldWidth > 0) && ($oldHeight > 0))
				{
					$newWidth = $oldWidth;
					$newHeight = $oldHeight;
				}
				// invalid dimensions
				else
				{
					throw new ImageError(Language::getCurrent()->getSentence('error.image.invalidDimensions'), self::INVALID_DIMENSIONS);
				}
			}

			$this->imageObject = imagecreatetruecolor($newWidth, $newHeight);

			if(($this->type == self::GIF) || ($this->type == self::PNG))
			{
				imagecolortransparent($this->imageObject, imagecolorallocatealpha($this->imageObject, 0, 0, 0, 127));

				if($this->type == self::GIF)
				{
					imagealphablending($this->imageObject, true);
				}
				else
				{
					imagealphablending($this->imageObject, false);
					imagesavealpha($this->imageObject, true);
				}
			}

			imagecopyresampled($this->imageObject, $originalImage, 0, 0, 0, 0, $newWidth, $newHeight, $oldWidth, $oldHeight);
			$completePath = $this->getNewPath();

			switch($this->type)
			{
				case self::JPEG:
					imagejpeg($this->imageObject, $completePath);
					break;
				case self::GIF:
					imagegif($this->imageObject, $completePath);
					break;
				case self::PNG:
					imagepng($this->imageObject, $completePath);
					break;
				default:
					break;
			}

			$this->resetNewName();
			$this->width = $newWidth;
			$this->height = $newHeight;
			$success = true;

			if($originalImage != $this->originalImageObject)
				imagedestroy($originalImage);

			if($autoCrop)
			{
				$cropTop = 0;
				$cropRight = 0;
				$cropBottom = 0;
				$cropLeft = 0;
				$doCrop = false;

				if(($width > 0) && ($newWidth > $width))
				{
					$cropRight = ceil($newWidth - $width);
					$isOdd = $cropRight % 2 != 0;
					$doCrop = true;

					if($centerOnCrop)
					{
						$cropRight /= 2;
						$cropLeft = $cropRight;

						if($isOdd)
						{
							$cropLeft = floor($cropLeft);
							$cropRight = floor($cropRight) + 1;
						}
					}
				}

				if(($height > 0) && ($newHeight > $height))
				{
					$cropBottom = ceil($newHeight - $height);
					$isOdd = $cropBottom % 2 != 0;
					$doCrop = true;

					if($centerOnCrop)
					{
						$cropBottom /= 2;
						$cropTop = $cropBottom;

						if($isOdd)
						{
							$cropBottom = floor($cropBottom);
							$cropTop = floor($cropTop) + 1;
						}
					}
				}

				if($doCrop)
					$success = $this->crop($cropTop, $cropRight, $cropBottom, $cropLeft);
			}
		}
		else
		{
			throw new ImageError(Language::getCurrent()->getSentence('error.image.cannotCreate', $this->extension, $this->getPath()), self::IMAGE_NOT_CREATED);
		}

		return $success;
	}

	/**
	 * Crops the image using the selected coordinates.
	 *
	 * The coordinates can be expressed as pixels (only numbers like 10) or
	 * percentages (like 10%).
	 * @param int $top Offset of top border.
	 * @param int $right Offset of right border.
	 * @param int $bottom Offset of bottom border.
	 * @param int $left Offset of left border.
	 * @return boolean True if the image is successfully cropped, false
	 * otherwise.
	 * @throws ImageError
	 */
	public function crop($top, $right, $bottom, $left)
	{
		$success = false;
		$this->setImageObjects();
		$originalImage = $this->imageObject;

		if(is_resource($originalImage))
		{
			$dimensions = $this->getDimensions();
			$realTop = $this->getRealPosition($top, $dimensions->height);
			$realRight = $this->getRealPosition($right, $dimensions->width);
			$realBottom = $this->getRealPosition($bottom, $dimensions->height);
			$realLeft = $this->getRealPosition($left, $dimensions->width);
			$cropWidth = $dimensions->width - $realRight - $realLeft;
			$cropHeight = $dimensions->height - $realBottom - $realTop;

			if(($cropWidth < $dimensions->width) || ($cropHeight < $dimensions->height))
			{
				$completePath = $this->getNewPath();
				$cropX = $realLeft;
				$cropY = $realTop;
				$this->imageObject = imagecreatetruecolor($cropWidth, $cropHeight);
				imagecopy($this->imageObject, $originalImage, 0, 0, $cropX, $cropY, $cropWidth, $cropHeight);

				switch($this->type)
				{
					case self::JPEG:
						imagejpeg($this->imageObject, $completePath);
						break;
					case self::GIF:
						imagegif($this->imageObject, $completePath);
						break;
					case self::PNG:
						imagepng($this->imageObject, $completePath);
						break;
					default:
						break;
				}

				if($originalImage != $this->originalImageObject)
					imagedestroy($originalImage);

				$this->resetNewName();
				$this->width = $cropWidth;
				$this->height = $cropHeight;
				$success = true;
			}
			else
			{
				$success = false;
			}
		}
		else
		{
			throw new ImageError(Language::getCurrent()->getSentence('error.image.cannotCreate', $this->extension, $this->getPath()), self::IMAGE_NOT_CREATED);
		}

		return $success;
	}

	/**
	 * Return the complete path where to save the thumbnail.
	 * @return string The complete path to where the thumbnail is gonna be
	 * saved.
	 */
	protected function getNewPath()
	{
		return "{$this->dirPath}" . (!empty($this->newName) ? $this->newName : $this->imageName) . ".{$this->extension}";
	}

	/**
	 * Update the thumbnail internal names.
	 */
	protected function resetNewName()
	{
		if(!empty($this->newName))
		{
			$this->imageName = $this->newName;
			$this->newName = null;
		}
	}

	/**
	 * Free up memory destroying the internal image objects.
	 */
	public function destroy()
	{
		if(is_resource($this->originalImageObject))
		{
			imagedestroy($this->originalImageObject);
			$this->originalImageObject = null;
		}

		if(is_resource($this->imageObject))
		{
			imagedestroy($this->imageObject);
			$this->imageObject = null;
		}

		if($this->memoryLimitSize > 0)
			$this->restoreMemoryLimit();
	}

	/**
	 * Returns the position of a point in pixels.
	 * @param string|int $pos A string representing a percentage or a number
	 * (integer or float).
	 * @param int $ref The reference used to calculate the real number when $pos
	 * is a percentage.
	 * @return int The real position or null if it cannot be calculated.
	 */
	protected function getRealPosition($pos, $ref)
	{
		$realPos = null;

		if(is_string($pos))
		{
			if(preg_match("#^\d+\%$#", $pos))
				$realPos = intval($pos) / 100 * $ref;
			elseif(is_numeric($pos))
				$realPos = intval($pos);
		}
		elseif(is_numeric($pos))
		{
			$realPos = intval($pos);
		}

		return $realPos;
	}

	/**
	 * Sets the internal image objects to handle all resize and crop operations.
	 * @throws ImageError
	 */
	protected function setImageObjects()
	{
		if(!is_resource($this->imageObject))
		{
			$completePath = $this->getPath();

			if($this->size < Enviroment::getMemoryLimit(false))
			{
				try
				{
					switch($this->type)
					{
						case self::JPEG:
							$this->raiseMemoryLimit();
							$this->imageObject = imagecreatefromjpeg($completePath);

							$this->raiseMemoryLimit();
							$this->originalImageObject = imagecreatefromjpeg($completePath);
							break;
						case self::GIF:
							$this->raiseMemoryLimit();
							$this->imageObject = imagecreatefromgif($completePath);

							$this->raiseMemoryLimit();
							$this->originalImageObject = imagecreatefromgif($completePath);
							break;
						case self::PNG:
							$this->raiseMemoryLimit();
							$this->imageObject = imagecreatefrompng($completePath);

							$this->raiseMemoryLimit();
							$this->originalImageObject = imagecreatefrompng($completePath);
							break;
					}

					$this->imageObject = $this->fixOrientation($this->imageObject);
					$this->originalImageObject = $this->fixOrientation($this->originalImageObject);
				}
				catch(Error $ex)
				{
					$this->destroy();
					throw new ImageError(Language::getCurrent()->getSentence('error.image.createImageObjectError', "[[{$ex->getCode()}] {$ex->getMessage()}]"), Image::CREATE_IMAGE_OBJECT_ERROR);
				}
			}
			else
			{
				throw new ImageError(Language::getCurrent()->getSentence('error.image.tooLarge', $this->size), self::MAX_SIZE_OVERLOAD);
			}
		}
	}

	/**
	 * Restores the current image object to its original version.
	 */
	public function restore()
	{
		if(is_resource($this->imageObject) && is_resource($this->originalImageObject))
		{
			imagedestroy($this->imageObject);
			$this->imageObject = $this->originalImageObject;
			$this->width = $this->originalWidth;
			$this->height = $this->originalHeight;
		}
	}

	/**
	 * Fixes orientation in cases where the image is rotated (usually photos of
	 * digital cameras).
	 * @param resource $imageObject Resource of an image file.
	 * @return resource Resource of the fixed image.
	 */
	protected function fixOrientation($imageObject)
	{
		$resultObject = $imageObject;

		if($this->orientation != 0)
		{
			if(is_resource($imageObject) && ($resultObject = imagerotate($imageObject, $this->orientation, 0)))
				imagedestroy($imageObject);
		}

		return $resultObject;
	}
}
?>