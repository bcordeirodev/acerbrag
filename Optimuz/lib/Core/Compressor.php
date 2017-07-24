<?php
/**
 * This file defines a way to easily work with compression. Two compression
 * methods are used here: GZIP and DEFLATE. The default method and all its
 * properties are setted in the application configuration.
 * @version 0.3
 * @package Core
 */

/**
 * This class can compress and uncompress strings using either GZIP or DEFLATE
 * methods.
 *
 * The compression method used is defined in the application configuration,
 * in the performance.compress.method setting.
 * @author Diego Andrade
 * @package Core
 * @since Optimuz 0.1
 * @version 0.3
 * @static
 */
class Compressor
{
	/**
	 * GZIP compression.
	 * @var int
	 */
	const GZIP								= 'gzip';
	
	/**
	 * DEFLATE compression.
	 * @var int
	 */
	const DEFLATE							= 'deflate';
	
	/**
	 * Default compression method name.
	 * @var string
	 * @static
	 */
	private static $defaultMethod			= null;
	
	/**
	 * Default compression level.
	 * @var string
	 * @static
	 */
	private static $defaultLevel			= null;
	
	/**
	 * Checks if the Accept-Encoding header is present in the current main
	 * request, and if the selected method is supported by the UA.
	 * @return bool
	 * @static
	 * @see Compressor::$defaultMethod
	 * @see Compressor::encodeResponse()
	 * @see Compressor::setMethod()
	 * @see Compressor::getMethod()
	 */
	public static function canEncodeResponse()
	{
		return (isset($_SERVER['HTTP_ACCEPT_ENCODING']) ? in_array(self::$defaultMethod, explode(',', str_replace(' ', '', strtolower($_SERVER['HTTP_ACCEPT_ENCODING'])))) : false) && (isset($_SERVER['HTTP_USER_AGENT']) ? preg_match('/mobile|midp/', strtolower($_SERVER['HTTP_USER_AGENT'])) != 1 : true);
	}
	
	/**
	 * This method is the same as the Compressor::encode(), but it also sets
	 * the Content-Encoding header to inform that the response is compressed.
	 *
	 * If $method is not specified, the default method will be used.
	 *
	 * Returns the compressed string.
	 * @param string $str Content to be compressed.
	 * @param int $level (optimal) Compression level, 0 (no compression) to 9
	 * (maximum compression). Default is 5 (setted in the application
	 * configuration).
	 * @param string $method (optimal) Compression method.
	 * @return string
	 * @see Compressor::$defaultMethod
	 * @see Compressor::canEncodeResponse()
	 * @see Compressor::setMethod()
	 * @see Compressor::getMethod()
	 * @see Compressor::setLevel()
	 * @see Compressor::getLevel()
	 */
	public static function encodeResponse($str, $level = null, $method = null)
	{
		if(!$method)
			$method = self::$defaultMethod;

		header("Content-Encoding: {$method}");
		return self::encode($str, $level, $method);
	}
	
	/**
	 * Compresses a string using one of the available methods (GZIP or DEFLATE).
	 * If the method is not specified, the default one will be used.
	 *
	 * Returns the compressed string.
	 * @param string $str Content to be compressed.
	 * @param int $level (optimal) Compression level, 0 (no compression) to 9
	 * (maximum compression). Default is 5 (setted in the application
	 * configuration).
	 * @param string $method (optimal) Compression method.
	 * @return string
	 * @static
	 * @see Compressor::$defaultMethod
	 * @see Compressor::decode()
	 * @see Compressor::setMethod()
	 * @see Compressor::getMethod()
	 * @see Compressor::setLevel()
	 * @see Compressor::getLevel()
	 */
	public static function encode($str, $level = null, $method = null)
	{
		if(!$level)
			$level = self::$defaultLevel;

		if(!$method)
			$method = self::$defaultMethod;
		
		return $method == self::GZIP ? gzencode($str, $level) : gzdeflate($str, $level);
	}
	
	/**
	 * Decompresses a string using one of the available methods (GZIP or
	 * DEFLATE).
	 *
	 * If the decompression method is no specified, the default one will be
	 * used.
	 *
	 * Returns the decompressed string.
	 * @param string $str Content to be decompressed.
	 * @param string $method (optimal) Decompression method.
	 * @return string
	 * @static
	 * @see Compressor::$defaultMethod
	 * @see Compressor::encode()
	 * @see Compressor::setMethod()
	 * @see Compressor::getMethod()
	 */
	public static function decode($str, $method = null)
	{
		if(!$method)
			$method = self::$defaultMethod;

		return $method == self::GZIP ? gzdecode($str) : gzinflate($str);
	}
	
	/**
	 * Compresses a string using one of the available methods (GZIP or DEFLATE)
	 * and saves the resulting string in the file specified in $savePath.
	 *
	 * If the method is not specified, the default one will be used.
	 *
	 * Returns true on success, or false on error.
	 *
	 * See the example:
	 *
	 * <code>
	 * <?php
	 * $result = Compression::save('/path/to/file', 'Some text');
	 *
	 * if($result === true)
	 *     // do something
	 * else
	 *     echo $result->getMessage(); // we got an error, so show it
	 * ?>
	 * </code>
	 * @param string $savePath Path to save the file.
	 * @param string $str Content to be compressed.
	 * @param int $level (optimal) Compression level, 0 (no compression) to 9
	 * (maximum compression). Default is 5 (setted in the application
	 * configuration).
	 * @param string $method (optimal) Compression method.
	 * @return bool Returns true on success, or false on error.
	 * @static
	 * @see Compressor::$defaultMethod
	 * @see Compressor::encode()
	 * @see Compressor::setMethod()
	 * @see Compressor::getMethod()
	 * @see Compressor::setLevel()
	 * @see Compressor::getLevel()
	 */
	public static function save($savePath, $str, $level = null, $method = null)
	{
		if(!$method)
			$method = self::$defaultMethod;
		
		$success = false;
		$compressedContent = self::encode($str, $level, $method);
		$success = file_put_contents($savePath, $compressedContent);
		
		return $success;
	}
	
	/**
	 * Sets the default compression method.
	 * @param string $method Can to be Compress::GZIP or Compress::DEFLATE.
	 * @static
	 * @see Compressor::$defaultMethod
	 * @see Compressor::getMethod()
	 */
	public static function setMethod($method)
	{
		self::$defaultMethod = $method;
	}
	
	/**
	 * Returns the default compression method.
	 * @return string
	 * @static
	 * @see Compressor::$defaultMethod
	 * @see Compressor::setMethod()
	 */
	public static function getMethod()
	{
		return self::$defaultMethod;
	}
	
	/**
	 * Sets the default compression level.
	 * @param int $level Can to be a value from 0 (no compression) to 9
	 * (maximum compression).
	 * @static
	 * @see Compressor::$defaultLevel
	 * @see Compressor::getLevel()
	 */
	public static function setLevel($level)
	{
		self::$defaultLevel = $level;
	}
	
	/**
	 * Returns the default compression level.
	 * @return int
	 * @static
	 * @see Compressor::$defaultLevel
	 * @see Compressor::setLevel()
	 */
	public static function getLevel()
	{
		return self::$defaultLevel;
	}
}
?>