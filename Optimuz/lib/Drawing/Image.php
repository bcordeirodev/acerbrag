<?php
/**
 * This file sets a class to work with images.
 * @version 0.1
 * @package Drawing
 */

/**
 * Class used to get images' information.
 * @author Diego Andrade
 * @package Drawing
 * @since Optimuz 0.5
 * @version 0.1
 * @uses Core
 * @uses Lang
 */
class Image
{
	/**
	 * Could not raise the script memory.
	 */
	const RAISE_MEMORY_FAILURE		= 704;

	/**
	 * Could not create the image object.
	 */
	const CREATE_IMAGE_OBJECT_ERROR	= 705;

	/**
	 * The image type is not supported.
	 */
	const UNSUPPORTED_TYPE			= 706;

	/**
	 * Could not create the BMP image object.
	 */
	const CREATE_BMP_IMAGE_FAILURE	= 707;

	/**
	 *  RGB color space.
	 */
	const RGB						= 'RGB';

	/**
	 *  RGB color space.
	 */
	const CMYK						= 'CMYK';

	/**
	 *  GIF image.
	 */
	const GIF						= 'GIF';

	/**
	 * JPEG image.
	 */
	const JPEG						= 'JPEG';

	/**
	 * PNG image.
	 */
	const PNG						= 'PNG';

	/**
	 * SWF image.
	 */
	const SWF						= 'SWF';

	/**
	 * PSD image.
	 */
	const PSD						= 'PSD';

	/**
	 * BMP image.
	 */
	const BMP						= 'BMP';

	/**
	 * TIFF image.
	 */
	const TIFF						= 'TIFF';

	/**
	 * JPC image.
	 */
	const JPC						= 'JPC';

	/**
	 * JP2 image.
	 */
	const JP2						= 'JP2';

	/**
	 * JPX image.
	 */
	const JPX						= 'JPX';

	/**
	 * JB2 image.
	 */
	const JB2						= 'JB2';

	/**
	 * SWC image.
	 */
	const SWC						= 'SWC';

	/**
	 * IFF image.
	 */
	const IFF						= 'IFF';

	/**
	 * WBMP image.
	 */
	const WBMP						= 'WBMP';

	/**
	 * XBM image.
	 */
	const XBM						= 'XBM';

	/**
	 * Original image directory path.
	 * @var string
	 */
	protected $dirPath				= null;

	/**
	 * Image name.
	 * @var string
	 */
	protected $imageName			= null;

	/**
	 * Image extension.
	 *
	 * This is read only.
	 * @var string
	 */
	protected $extension			= null;

	/**
	 * Image size (in bytes).
	 * @var int
	 */
	protected $size					= null;

	/**
	 * Image type.
	 * @var string
	 */
	protected $type					= null;

	/**
	 * Image MIME type.
	 * @var string
	 */
	protected $mimeType				= null;

	/**
	 * Image width.
	 * @var int
	 */
	protected $width				= null;

	/**
	 * Image height.
	 * @var int
	 */
	protected $height				= null;

	/**
	 * Image bits depth.
	 * @var int
	 */
	protected $bits					= null;

	/**
	 * Image channels.
	 * @var int
	 */
	protected $channels				= null;

	/**
	 * Image orientation.
	 * @var int
	 */
	protected $orientation			= null;

	/**
	 * Maximum memory allocated for the script (in bytes).
	 * @var int
	 */
	protected $memoryLimitSize		= null;

	/**
	 * Creates a new class instance to handle an image.
	 * @param string $path (optimal) Path of an existing image.
	 */
	public function __construct($path = null)
	{
		if(is_string($path))
			$this->setPath($path);
		elseif(is_object($path) && ($path instanceof FilePath))
			$this->setPath("$path");

		$this->memoryLimitSize = Enviroment::getMemoryLimit();
	}

	/**
	 * Returns the image name.
	 * @return string
	 * @see Image::$name
	 * @see Image::setName()
	 */
	public function getName()
	{
		return $this->imageName;
	}

	/**
	 * Returns the image extension.
	 * @return string
	 * @see Image::$extension
	 */
	public function getExtension()
	{
		return $this->extension;
	}

	/**
	 * Sets the image path.
	 * @param string $path Image path.
	 * @see Image::$path
	 * @see Image::getPath()
	 * @see Image::getDirectoryPath()
	 */
	public function setPath($path)
	{
		$path = new FilePath($path);
		$this->extension = $path->getExtension();
		$this->imageName = $path->getName(false);
		$this->dirPath = $path->getDirPath();
		$this->size = (int)filesize($this->getPath());
		$info = $this->getImageInfo();
		$this->width = $info->getWidth();
		$this->height = $info->getHeight();
		$this->type = $info->getType();
		$this->mimeType = $info->getMimeType();
		$this->bits = $info->getBitsDepth();
		$this->channels = $info->getChannels();
		$this->orientation = $info->getOrientation();

		if(($this->orientation == 90) || ($this->orientation == -90))
		{
			$width = $this->width;
			$this->width = $this->height;
			$this->height = $width;
		}
	}

	/**
	 * Returns the image complete path.
	 * @return string Image path.
	 */
	public function getPath()
	{
		return "{$this->dirPath}{$this->imageName}.{$this->extension}";
	}

	/**
	 * Returns the original image path.
	 * @return string
	 * @see Image::$path
	 * @see Image::setPath()
	 */
	public function getDirectoryPath()
	{
		return $this->dirPath;
	}

	/**
	 * Returns an object with the original image dimensions. The returned object
	 * has two properties: width and height.
	 * @return object
	 */
	public function getDimensions()
	{
		return (object)array('width' => $this->width, 'height' => $this->height);
	}

	/**
	 * Returns the image height.
	 * @return int Image height.
	 */
	public function getHeight()
	{
		return $this->height;
	}

	/**
	 * Returns the image width.
	 * @return int Image width.
	 */
	public function getWidth()
	{
		return $this->width;
	}

	/**
	 * Returns the image size.
	 * @param boolean $format (optional) Whether to format the size to present
	 * it in MB. If is false, the size is presented in bytes. Default is true.
	 * @return int Image size in bytes.
	 * @return string Image size in MB.
	 */
	public function getSize($format = true)
	{
		return $format ? Formatter::memory($this->size) : $this->size;
	}

	/**
	 * Returns the image type.
	 * @return string One of the Image class constants.
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Returns the image MIME type.
	 * @return string Image MIME type.
	 */
	public function getMimeType()
	{
		return $this->mimeType;
	}

	/**
	 * Returns the image bits depth.
	 * @return string Image bits depth.
	 */
	public function getBitsDepth()
	{
		return $this->bits;
	}

	/**
	 * Returns the image channels.
	 * @return string Image channels: RGB ou CMYK.
	 */
	public function getChannels()
	{
		return $this->channels == 3 ? Image::RGB : Image::CMYK;
	}

	/**
	 * Returns the image orientation.
	 * @return int Image orientation.
	 */
	public function getOrientation()
	{
		return $this->orientation;
	}

	/**
	 * Return an array with some information about the image. Throws an
	 * ImageError exception if the information cannot be retrieved.
	 * @return ImageInfo An object holding the images' information.
	 * @throws ImageError
	 */
	protected function getImageInfo()
	{
		return new ImageInfo($this->getPath());
	}

	/**
	 * Dynamicly reallocate the memory to prevent script errors.
	 * @throws ImageError
	 */
	protected function raiseMemoryLimit()
	{
		try{
			$info = $this->getImageInfo();
			$fudgeFactor = 1.2;
			$imgSize = $info->getWidth() * $info->getHeight() * $info->getBitsDepth() * $fudgeFactor;
			Enviroment::raiseMemoryLimit($imgSize);
		}
		catch(ImageError $ex){
			throw new ImageError(Language::getCurrent()->getSentence('error.image.raiseMemoryFailure', "[[{$ex->getCode()}] {$ex->getMessage()}]"), self::RAISE_MEMORY_FAILURE);
		}
	}

	/**
	 * Restore the memory limit to the default value.
	 */
	protected function restoreMemoryLimit()
	{
		Enviroment::setMemoryLimit($this->memoryLimitSize);
	}

	/**
	 * Add a watermark to the image.
	 * @param WaterMark $waterMark Watermark to add to the image.
	 */
	public function setWaterMark(WaterMark $waterMark)
	{
		$this->raiseMemoryLimit();
		$imageObject = null;
		$logoObject = null;

		try
		{
			$imageObject = self::createImageObject($this);
			$logoObject = self::createImageObject($waterMark);
		}
		catch(Error $ex)
		{
			throw new ImageError(Language::getCurrent()->getSentence('error.image.createImageObjectError', "[[{$ex->getCode()}] {$ex->getMessage()}]"), self::CREATE_IMAGE_OBJECT_ERROR);
		}

		$x = null;
		$y = null;
		$logoPosition = $waterMark->getPosition();
		$logoOffset = $waterMark->getOffset();

		switch($logoPosition->x)
		{
			case WaterMark::LEFT:
				$x = $logoPosition->x + $logoOffset;
				break;
			case WaterMark::RIGHT:
				$x = $this->width - $waterMark->getWidth() - $logoOffset;
				break;
			case WaterMark::CENTER:
				$x = ($this->width / 2) - ($waterMark->getWidth() / 2);
				break;
		}

		switch($logoPosition->y)
		{
			case WaterMark::TOP:
				$y = $logoPosition->y + $logoOffset;
				break;
			case WaterMark::BOTTOM:
				$y = $this->height - $waterMark->getHeight() - $logoOffset;
				break;
			case WaterMark::CENTER:
				$y = ($this->height / 2) - ($waterMark->getHeight() / 2);
				break;
		}

		$imageTrueColor = imagecreatetruecolor($this->width, $this->height); // new image container
		imagecopy($imageTrueColor, $imageObject, 0, 0, 0, 0, $this->width, $this->height); // copy background
		imagecopy($imageTrueColor, $logoObject, $x, $y, 0, 0, $waterMark->getWidth(), $waterMark->getHeight()); // copy logo
		imagecopymerge($imageObject, $imageTrueColor, 0, 0, 0, 0, $this->width, $this->height, ($waterMark->getOpacity() * 100)); // merge new image

		switch($this->type)
		{
			case self::JPEG:
				imagejpeg($imageObject, $this->getPath());
				break;
			case self::GIF:
				imagegif($imageObject, $this->getPath());
				break;
			case self::PNG:
				imagepng($imageObject, $this->getPath());
				break;
			default:
				break;
		}

		imagedestroy($imageObject);
		imagedestroy($logoObject);
		imagedestroy($imageTrueColor);
	}

	/**
	 * Converts the image into the given format.
	 * @param string $targetType Target type for the new image. Supported
	 * types are:
	 * <ul>
	 * <li><code>Image::JPEG</code></li>
	 * <li><code>Image::PNG</code></li>
	 * <li><code>Image::GIF</code></li>
	 * </ul>
	 * Unsupported types will throw an <code>ImageError</code> exception.
	 * @return Image Returns an <code>Image</code> object representing the
	 * converted image.
	 * @throws ImageError Thrown when an unsupported type is given.
	 * @todo Implement conversion to BMP.
	 */
	public function convert($targetType)
	{
		$this->raiseMemoryLimit();
		$imageObject = null;
		$targetPath = $this->dirPath . $this->imageName;

		try
		{
			$imageObject = self::createImageObject($this);
		}
		catch(Error $ex)
		{
			throw new ImageError(Language::getCurrent()->getSentence('error.image.createImageObjectError', "[[{$ex->getCode()}] {$ex->getMessage()}]"), self::CREATE_IMAGE_OBJECT_ERROR);
		}

		$imageTrueColor = imagecreatetruecolor($this->width, $this->height); // new image container
		imagecopy($imageTrueColor, $imageObject, 0, 0, 0, 0, $this->width, $this->height);

		switch($targetType)
		{
			case self::JPEG:
				$targetPath .= '.jpg';
				imagejpeg($imageObject, $targetPath);
				break;
			case self::GIF:
				$targetPath .= '.gif';
				imagegif($imageObject, $targetPath);
				break;
			case self::PNG:
				$targetPath .= '.png';
				imagepng($imageObject, $targetPath);
				break;
//			case self::BMP:
//				$targetPath .= '.bmp';
//				image2wbmp($imageObject, $targetPath);
//				break;
			case self::WBMP:
				$targetPath .= '.wbmp';
				image2wbmp($imageObject, $targetPath);
				break;
			case self::XBM:
				$targetPath .= '.xbm';
				imagexbm($imageObject, $targetPath);
				break;
			default:
				throw new ImageError(Language::getCurrent()->getSentence('error.image.unsupportedTypeError', $targetType), self::UNSUPPORTED_TYPE);
				break;
		}

		imagedestroy($imageObject);
		imagedestroy($imageTrueColor);

		return new Image($targetPath);
	}

	/**
	 * Create a resource link to be used to manipulate the image. Supported
	 * images are JPEG, GIF and PNG.
	 * @param Image $image Image object.
	 * @return resource A resource used to manipulate the image.
	 * @throws ImageError Thrown when an unsupported type is given.
	 * @static
	 */
	protected static function createImageObject(Image $image)
	{
		$imageObject = null;

		switch($image->type)
		{
			case self::JPEG:
				$imageObject = imagecreatefromjpeg($image->getPath());
				break;
			case self::GIF:
				$imageObject = imagecreatefromgif($image->getPath());
				break;
			case self::PNG:
				$imageObject = imagecreatefrompng($image->getPath());
				break;
			case self::BMP:
				$imageObject = self::createFromBmp($image->getPath());

				if($imageObject === false)
					throw new ImageError(Language::getCurrent()->getSentence('error.image.createBmpError'), self::CREATE_BMP_IMAGE_FAILURE);
				break;
			case self::WBMP:
				$imageObject = imagecreatefromwbmp($image->getPath());
				break;
			case self::XBM:
				$imageObject = imagecreatefromxbm($image->getPath());
				break;
			default:
				throw new ImageError(Language::getCurrent()->getSentence('error.image.unsupportedTypeError', $image->type), self::UNSUPPORTED_TYPE);
				break;
		}

		return $imageObject;
	}

	/**
	 * Creates a new BMP file from the given path.
	 * @param string $filename File path.
	 * @return mixed Returns the image resource identifier on success, or false
	 * on errors.
	 * @static
	 * @author DHKold
	 * @link http://php.net/manual/en/function.imagecreate.php#53879
	 * 
	 */
	protected static function createFromBmp($filename)
	{
		if(!$f1 = fopen($filename, "rb"))
			return FALSE;

		$FILE = unpack("vfile_type/Vfile_size/Vreserved/Vbitmap_offset", fread($f1, 14));

		if($FILE['file_type'] != 19778)
			return FALSE;

		$BMP = unpack('Vheader_size/Vwidth/Vheight/vplanes/vbits_per_pixel' .
			'/Vcompression/Vsize_bitmap/Vhoriz_resolution' .
			'/Vvert_resolution/Vcolors_used/Vcolors_important', fread($f1, 40));

		$BMP['colors'] = pow(2, $BMP['bits_per_pixel']);

		if($BMP['size_bitmap'] == 0)
			$BMP['size_bitmap'] = $FILE['file_size'] - $FILE['bitmap_offset'];

		$BMP['bytes_per_pixel'] = $BMP['bits_per_pixel'] / 8;
		$BMP['bytes_per_pixel2'] = ceil($BMP['bytes_per_pixel']);
		$BMP['decal'] = ($BMP['width'] * $BMP['bytes_per_pixel'] / 4);
		$BMP['decal'] -= floor($BMP['width'] * $BMP['bytes_per_pixel'] / 4);
		$BMP['decal'] = 4 - (4 * $BMP['decal']);

		if($BMP['decal'] == 4)
			$BMP['decal'] = 0;

		$PALETTE = array();

		if($BMP['colors'] < 16777216)
		{
			$PALETTE = unpack('V' . $BMP['colors'], fread($f1, $BMP['colors'] * 4));
		}

		$IMG = fread($f1, $BMP['size_bitmap']);
		$VIDE = chr(0);

		$res = imagecreatetruecolor($BMP['width'], $BMP['height']);
		$P = 0;
		$Y = $BMP['height'] - 1;

		while($Y >= 0)
		{
			$X = 0;

			while($X < $BMP['width'])
			{
				if($BMP['bits_per_pixel'] == 24)
				{
					$COLOR = unpack("V", substr($IMG, $P, 3) . $VIDE);
				}
				elseif($BMP['bits_per_pixel'] == 16)
				{
					$COLOR = unpack("n", substr($IMG, $P, 2));
					$COLOR[1] = $PALETTE[$COLOR[1] + 1];
				}
				elseif($BMP['bits_per_pixel'] == 8)
				{
					$COLOR = unpack("n", $VIDE . substr($IMG, $P, 1));
					$COLOR[1] = $PALETTE[$COLOR[1] + 1];
				}
				elseif($BMP['bits_per_pixel'] == 4)
				{
					$COLOR = unpack("n", $VIDE . substr($IMG, floor($P), 1));

					if(($P * 2) % 2 == 0)
						$COLOR[1] = ($COLOR[1] >> 4);
					else
						$COLOR[1] = ($COLOR[1] & 0x0F);

					$COLOR[1] = $PALETTE[$COLOR[1] + 1];
				}
				elseif($BMP['bits_per_pixel'] == 1)
				{
					$COLOR = unpack("n", $VIDE . substr($IMG, floor($P), 1));

					if(($P * 8) % 8 == 0)
						$COLOR[1] = $COLOR[1] >> 7;
					elseif(($P * 8) % 8 == 1)
						$COLOR[1] = ($COLOR[1] & 0x40) >> 6;
					elseif(($P * 8) % 8 == 2)
						$COLOR[1] = ($COLOR[1] & 0x20) >> 5;
					elseif(($P * 8) % 8 == 3)
						$COLOR[1] = ($COLOR[1] & 0x10) >> 4;
					elseif(($P * 8) % 8 == 4)
						$COLOR[1] = ($COLOR[1] & 0x8) >> 3;
					elseif(($P * 8) % 8 == 5)
						$COLOR[1] = ($COLOR[1] & 0x4) >> 2;
					elseif(($P * 8) % 8 == 6)
						$COLOR[1] = ($COLOR[1] & 0x2) >> 1;
					elseif(($P * 8) % 8 == 7)
						$COLOR[1] = ($COLOR[1] & 0x1);

					$COLOR[1] = $PALETTE[$COLOR[1] + 1];
				}
				else
				{
					return FALSE;
				}

				imagesetpixel($res, $X, $Y, $COLOR[1]);
				$X++;
				$P += $BMP['bytes_per_pixel'];
			}

			$Y--;
			$P+=$BMP['decal'];
		}

		fclose($f1);

		return $res;
	}
}
?>