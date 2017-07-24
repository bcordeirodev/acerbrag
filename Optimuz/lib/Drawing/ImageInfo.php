<?php
/**
 * This file sets a class to work with images.
 * @version 0.1
 * @package Drawing
 */

/**
 * This simple class stores images' information, such as size, width, height,
 * bits and channels.
 * @author Diego Andrade
 * @package Drawing
 * @since Optimuz 0.5
 * @version 0.1
 * @uses Format
 */
class ImageInfo
{
	/**
	 * Could not retrieve the image's information.
	 */
	const OPEN_INFO_ERROR			= 703;

	/**
	 * Image type.
	 * @var string
	 */
	protected $type					= null;

	/**
	 * Image size.
	 * @var size
	 */
	protected $size					= null;

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
	 * Creates a new class instance to handle an image.
	 * @param string $path Path of an existing image.
	 */
	public function __construct($path)
	{
		$tempInfo = getimagesize($path);
		Log::add($tempInfo, Log::DEBUG);

		if($tempInfo)
		{
			if($tempInfo['mime'] == 'image/png')
			{
				if(!($pngInfo = $this->getPngImageInfo($path)))
					throw new ImageError(Language::getCurrent()->getSentence('error.image.infoError'), self::OPEN_INFO_ERROR);

				$this->width	= $pngInfo['width'];
				$this->height	= $pngInfo['height'];
				$this->bits		= $pngInfo['bits'];
				$this->channels	= $pngInfo['channels'];
			}
			else
			{
				$this->width	= $tempInfo[0];
				$this->height	= $tempInfo[1];
				$this->bits		= $tempInfo['bits'];
				$this->channels	= isset($tempInfo['channels']) ? $tempInfo['channels'] : null;
			}

			$imgTypes = array(
				'',
				'GIF', 'JPEG', 'PNG', 'SWF', 'PSD', 'BMP', 'TIFF', 'TIFF',
				'JPC', 'JP2', 'JPX', 'JB2', 'SWC', 'IFF', 'WBMP', 'XBM'
			);

			$this->type = $imgTypes[$tempInfo[2]];
			$this->size = (int)filesize($path);
			$this->mimeType = $tempInfo['mime'];
			$this->orientation = 0;

			if($this->type == $imgTypes[2])
			{
				if(preg_match('#\x12\x01\x03\x00\x01\x00\x00\x00(.)\x00\x00\x00#', file_get_contents($path), $matches))
				{
					$orientation = ord($matches[1]);
					$orientations = array(
						8 => 90,
						3 => 180,
						6 => -90,
					);

					if(!empty($orientation) && isset($orientations[$orientation]))
						$this->orientation = $orientations[$orientation];
				}
			}
		}
		else
		{
			throw new ImageError(Language::getCurrent()->getSentence('error.image.infoError'), self::OPEN_INFO_ERROR);
		}
	}

	/**
	 * Get image-information from PNG file.
	 *
	 * PHP's getimagesize does not support additional image information
	 * from PNG files like channels or bits.
	 *
	 * get_png_imageinfo() can be used to obtain this information
	 * from PNG files.
	 *
	 * @author Tom Klingenberg <lastflood.net>
	 * @license Apache 2.0
	 * @version 0.1.0
	 * @link http://www.libpng.org/pub/png/spec/iso/index-object.html#11IHDR
	 *
	 * @param string $file File path.
	 * @return array|bool image information, FALSE on error
	 * @todo Improve error detection. Throw exceptions instead of returning
	 * false.
	 */
	protected function getPngImageInfo($file)
	{
		if(empty($file))
			return false;

		$contents = file_get_contents($file, false, null, 0, 29);
		$info = unpack('A8sig/Nchunksize/A4chunktype/Nwidth/Nheight/Cbit-depth/Ccolor/Ccompression/Cfilter/Cinterface', $contents);

		Log::add($info, Log::DEBUG);

		if(empty($info))
			return false;

		Log::add(bin2hex($info['sig']));

		if(!Text::match('#89504e470d0a1a(?:0a)?#', bin2hex($info['sig'])))
			return false; // no PNG signature.

		if($info['chunksize'] !== 13)
			return false; // wrong length for IHDR chunk.

		if($info['chunktype'] !== 'IHDR')
			return false; // a non-IHDR chunk singals invalid data.

		$color = $info['color'];
		$type = array(
			0 => 'Greyscale',
			2 => 'Truecolour',
			3 => 'Indexed-colour',
			4 => 'Greyscale with alpha',
			6 => 'Truecolour with alpha'
		);

		if(empty($type[$color]))
			return false; // invalid color value

		$info['color-type'] = $type[$color];

		$samples = ((($color%4)%3)?3:1)+($color>3);

		$info['channels'] = $samples;
		$info['bits'] = $info['bit-depth'];

		return $info;
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
		return empty($this->channels) || $this->channels == 3 ? Image::RGB : Image::CMYK;
	}

	/**
	 * Returns the image orientation.
	 * @return int Image orientation.
	 */
	public function getOrientation()
	{
		return $this->orientation;
	}
}
?>