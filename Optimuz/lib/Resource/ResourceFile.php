<?php
/**
 * This file is used to handle resource files such as CSS and Javascript files.
 * @version 0.1
 * @package Resource
 */

/**
 * 
 * @author Diego Andrade
 * @package Resouce
 * @since Optimuz 0.3
 * @version 0.1
 * @uses Core
 * @uses Strings
 * @uses Collection
 */
class ResourceFile extends Object
{
	/**
	 * Invalid resource type.
	 */
	const INVALID_TYPE				= 2700;

	/**
	 * Resource file path.
	 * @var string
	 * @see ResourceFile::setFilePath()
	 * @see ResourceFile::getFilePath()
	 */
	protected $filePath				= null;

	/**
	 * Specifies whether to cache the resource.
	 * @var bool
	 * @see ResourceFile::setCache()
	 * @see ResourceFile::getCache()
	 */
	protected $cache				= null;

	/**
	 * Specifies whether to minify the resource.
	 * @var bool
	 * @see ResourceFile::setMinify()
	 * @see ResourceFile::getMinify()
	 */
	protected $minify				= null;

	/**
	 * Specifies whether to compress the resource.
	 * @var bool
	 * @see ResourceFile::setCompress()
	 * @see ResourceFile::getCompress()
	 */
	protected $compress				= null;

	/**
	 * Specifies whether to merge the resource.
	 * @var bool
	 * @see ResourceFile::setMerge()
	 * @see ResourceFile::getMerge()
	 */
	protected $merge				= null;

	/**
	 * Resource type (file extension).
	 * @var string
	 * @see ResourceFile::getType()
	 */
	protected $type					= null;

	/**
	 * Resource name (file name without extension).
	 * @var string
	 * @see ResourceFile::getName()
	 */
	protected $name					= null;

	/**
	 * Specifies if the resource path is a URL.
	 * @var bool
	 * @see ResourceFile::isHttp()
	 */
	protected $isHttpResource		= null;

	/**
	 * Content processed of the resource file.
	 * @var string
	 * @see ResourceFile::setContent()
	 * @see ResourceFile::getContent()
	 */
	protected $content				= null;
	
	/**
	 * Creates a new class instance.
	 *
	 * All values defaults to the application configuration. So you don't need
	 * to specify each one of them, unless you want a different setting for a
	 * particular file.
	 *
	 * @param string $filePath (optimal) Resource file path.
	 * @param string $type (optimal) Resource's type.
	 */
	public function  __construct($filePath = null, $type = null)
	{
		$this->setFilePath($filePath, $type);
		$this->cache = LocalConfiguration::get('performance.cache.enable');
		$this->minify = LocalConfiguration::get('performance.minify.enable');
		$this->compress = LocalConfiguration::get('performance.compress.enable');
		$this->merge = LocalConfiguration::get('performance.mergeFiles.enable');
	}

	/**
	 * Sets the resource file path.
	 * @param string $filePath Resource file path.
	 * @param string $type (optimal) Resource's type.
	 * @see ResourceFile::$filePath
	 * @see ResourceFile::getFilePath()
	 */
	public function setFilePath($filePath, $type = null)
	{
		$this->filePath = $filePath;
		$this->type = !is_null($type) ? $type : Text::split('.', $filePath)->getLast();
		$this->name = Text::remove(".{$this->type}", Text::split('/', $filePath)->getLast());
		$this->isHttpResource = Text::find('://', $filePath);
	}

	/**
	 * Returns the resource file path.
	 * @return string
	 * @see ResourceFile::$filePath
	 * @see ResourceFile::setFilePath()
	 */
	public function getFilePath()
	{
		return $this->filePath;
	}

	/**
	 * Sets the content of the resource file.
	 * @param string $content Content in a string.
	 * @see ResourceFile::$content
	 * @see ResourceFile::getContent()
	 */
	public function setContent($content)
	{
		$this->content = $content;
	}

	/**
	 * Returns the content of the resource file.
	 * @return string
	 * @see ResourceFile::$content
	 * @see ResourceFile::setContent()
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * Sets whether the resource file should be cached.
	 * @param bool $cache If is true the resource file will be cached.
	 * @see ResourceFile::$cache
	 * @see ResourceFile::getCache()
	 */
	public function setCache($cache)
	{
		$this->cache = $cache;
	}

	/**
	 * Returns whether the resource file should be cached.
	 * @return bool
	 * @see ResourceFile::$cache
	 * @see ResourceFile::setCache()
	 */
	public function getCache()
	{
		return $this->cache;
	}

	/**
	 * Sets whether the resource file should be minified. Only CSS and
	 * Javascript files can be minified.
	 * @param bool $minify If is true the resource file will be minified.
	 * @see ResourceFile::$minify
	 * @see ResourceFile::getMinify()
	 */
	public function setMinify($minify)
	{
		$this->minify = $minify;
	}

	/**
	 * Returns whether the resource file should be minified.
	 * @return bool
	 * @see ResourceFile::$minify
	 * @see ResourceFile::setMinify()
	 */
	public function getMinify()
	{
		return $this->minify;
	}

	/**
	 * Sets whether the resource file should be compressed.
	 * @param bool $compress If is true the resource file will be compressed.
	 * @see ResourceFile::$compress
	 * @see ResourceFile::getCompress()
	 */
	public function setCompress($compress)
	{
		$this->compress = $compress;
	}

	/**
	 * Returns whether the resource file should be compressed.
	 * @return bool
	 * @see ResourceFile::$compress
	 * @see ResourceFile::setCompress()
	 */
	public function getCompress()
	{
		return $this->compress;
	}

	/**
	 * Sets whether the resource file should be merged with other resources of
	 * the same type.
	 * @param bool $merge If is true the resource file will be merged with other
	 * resources of the same type.
	 * @see ResourceFile::$merge
	 * @see ResourceFile::getMerge()
	 */
	public function setMerge($merge)
	{
		$this->merge = $merge;
	}

	/**
	 * Returns whether the resource file should be merged with other resources
	 * of the same type.
	 * @return bool
	 * @see ResourceFile::$merge
	 * @see ResourceFile::setMerge()
	 */
	public function getMerge()
	{
		return $this->merge;
	}

	/**
	 * Returns resource type (file extension).
	 *
	 * The resource type is setted when the file path is setted.
	 * @return string
	 * @see ResourceFile::$type
	 * @see ResourceFile::setFilePath()
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Returns resource name (file name without extension).
	 *
	 * The resource name is setted when the file path is setted.
	 * @return string
	 * @see ResourceFile::$name
	 * @see ResourceFile::setFilePath()
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Checks if the resource path is a URL (HTTP file).
	 *
	 * This information is setted together with the file path.
	 * @return bool
	 * @see ResourceFile::$name
	 * @see ResourceFile::setFilePath()
	 */
	public function isHttp()
	{
		return $this->isHttpResource;
	}
}
?>