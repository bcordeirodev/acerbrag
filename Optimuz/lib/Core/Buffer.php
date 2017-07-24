<?php
/**
 * This file sets a class to work with the PHP output buffer.
 * @version 0.1
 * @package Core
 */

/**
 * This class is used to manipulate the output buffer.
 * @author Diego Andrade
 * @package Core
 * @since Optimuz 0.4
 * @version 0.1.1
 * @static
 */
class Buffer
{
	/**
	 * The buffer is started.
	 */
	const BUFFER_STATED						= 1;

	/**
	 * The buffer is stopped.
	 */
	const BUFFER_STOPPED					= 2;

	/**
	 * The buffer's contents returned after the buffer was closed.
	 * @var string
	 * @static
	 */
	protected static $contents				= null;

	/**
	 * The buffer's state.
	 * @var int
	 * @static
	 */
	protected static $state					= self::BUFFER_STOPPED;

	/**
	 * Starts the buffer.
	 * @static
	 */
	public static function start()
	{
		if(!self::isStarted())
		{
			self::$state = self::BUFFER_STATED;
			ob_start();
		}
	}

	/**
	 * Stops the buffer and additionaly returns its contents.
	 * @param bool $getContents (optimal) If true the buffer's contents will be
	 * returned. Otherwise, the buffer will just be stopped and the contents 
	 * lost. Default is true.
	 * @return string The contents of the buffer (if any). If $getContents is 
	 * false, nothing is returned.
	 * @static
	 */
	public static function stop($getContents = true)
	{
		if(self::isStarted())
		{
			self::$state = self::BUFFER_STOPPED;
			self::$contents = $getContents ? ob_get_contents() : null;
			ob_end_clean();

			if($getContents)
				return self::$contents;
		}
	}

	/**
	 * Returns the buffer's contents.
	 *
	 * If the buffer is not started, a null value will be returned.
	 *
	 * While the buffer is started, everytime this method is called the contents
	 * returned will be retrieved directly from the buffer.
	 * @return string|null
	 * @static
	 */
	public static function getContents()
	{
		if(self::isStarted())
			self::$contents = ob_get_contents();

		return self::$contents;
	}

	/**
	 * Cleans the buffer, but don't close it.
	 * @param bool $stop (optimal) If is true the buffer is also stopped.
	 * Otherwise it is only cleaned. Default is false.
	 * @static
	 */
	public static function clean($stop = false)
	{
		if(self::isStarted())
		{
			try{
				if($stop)
					self::stop();
				else
					ob_clean();
			}
			catch(Exception $ex){}
		}
	}

	/**
	 * Sends the buffer's contents to the PHP outup.
	 * @param bool $stop (optimal) If is true the buffer is also stopped.
	 * Otherwise it is only flushed. Default is true.
	 * @static
	 */
	public static function flush($stop = true)
	{
		if(self::isStarted())
		{
			echo ob_get_contents(); // same as ob_flush()

			if($stop)
				self::stop();
		}
	}

	/**
	 * Returns a bool indicating whether the buffer is started.
	 * @return bool
	 * @static
	 */
	public static function isStarted()
	{
		return self::$state == self::BUFFER_STATED;
	}
}
?>