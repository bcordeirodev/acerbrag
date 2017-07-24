<?php
/**
 * This file sets a class to work with images.
 * @version 0.1
 * @package Drawing
 */

/**
 * Class used to manipulate watermarks with resize and crop operations.
 * @author Diego Andrade
 * @package Drawing
 * @since Optimuz 0.4
 * @version 0.1
 * @uses IO
 * @uses Lang
 * @uses Core.Enviroment
 */
class WaterMark extends Image
{
	/**
	 * Place the watermark on top.
	 */
	const TOP			= 0;
	
	/**
	 * Place the watermark on right.
	 */
	const RIGHT			= 1;
	
	/**
	 * Place the watermark on bottom.
	 */
	const BOTTOM		= 1;
	
	/**
	 * Place the watermark on left.
	 */
	const LEFT			= 0;
	
	/**
	 * Place the watermark on center.
	 */
	const CENTER		= 0.5;
	
	/**
	 * Offset from image margins.
	 * @var int 0
	 */
	protected $offset	= null;
	
	/**
	 * Horizontal position of the watermark.
	 * @var int
	 */
	protected $posX		= null;
	
	/**
	 * Vertical position of the watermark.
	 * @var int
	 */
	protected $posY		= null;
	
	/**
	 * Opacity of the watermark. This goes from 0 to 1, where 0 is completly
	 * transparent and 1 is completly opaque.
	 * @var float
	 */
	protected $opacity	= null;

	/**
	 * Creates a new class instance to handle an image.
	 * @param string $path Path of an existing image.
	 * @param int $x (optimal) Horizontal position of the watermark.
	 * @param int $y (optimal) Vertical position of the watermark.
	 */
	public function __construct($path, $x = self::BOTTOM, $y = self::RIGHT)
	{
		parent::__construct($path);
		$this->opacity = 0.7;
		$this->offset = 5;
		
		if(is_int($x) && is_int($y))
			$this->setPosition($x, $y);
	}

	/**
	 * Set the position of the watermark on the image.
	 * @param int $x Horizontal position of the watermark on the image. Values
	 * can be: WaterMark::LEFT, WaterMark::RIGHT or WaterMark::CENTER.
	 * @param int $y Vertical position of the watermark on the image. Values
	 * can be: WaterMark::TOP, WaterMark::BOTTOM or WaterMark::CENTER.
	 */
	public function setPosition($x, $y)
	{
		$this->posX = $x;
		$this->posY = $y;
	}

	/**
	 * Return the position of the watermark on the image.
	 * @return object The returned object has only two properties: x and y, and
	 * their values correspond to the constants of this class.
	 */
	public function getPosition()
	{
		return (object)array('x' => $this->posX, 'y' => $this->posY);
	}

	/**
	 * Set the watermark offset from the image borders. This offset is both 
	 * horizontal and vertical.
	 * @param int $offset The distance from the image borders to put the 
	 * watermark.
	 */
	public function setOffset($offset)
	{
		$this->offset = (int)$offset;
	}

	/**
	 * Return the watermark offset from the image borders. This offset is both 
	 * horizontal and vertical.
	 * @return int The distance from the image borders to put the watermark.
	 */
	public function getOffset()
	{
		return $this->offset;
	}

	/**
	 * Set the watermark opacity.
	 * @param float $opacity This goes from 0 to 1, where 0 is completly
	 * transparent and 1 is completly opaque.
	 */
	public function setOpacity($opacity)
	{
		$this->opacity = (float)$opacity;
	}

	/**
	 * Return the watermark opacity.
	 * @return float This goes from 0 to 1, where 0 is completly
	 * transparent and 1 is completly opaque.
	 */
	public function getOpacity()
	{
		return $this->opacity;
	}
}
?>