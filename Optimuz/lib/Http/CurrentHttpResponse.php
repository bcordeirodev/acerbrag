<?php
/**
 * This file sets a class to work with HTTP requests.
 * @version 0.1
 * @package Http
 */

/**
 * This class is used to send back to the UA a HTTP response.
 *
 * This class is Singleton, so only one instance of this class can exist at
 * a time.
 * @author Diego Andrade
 * @package Http
 * @since Optimuz 0.3
 * @version 0.2
 * @uses Core
 */
class CurrentHttpResponse extends HttpTransport
{
	/**
	 * More than one instance is being created.
	 */
	const INSTANCE_VIOLATION	= 1605;

	/**
	 * The specified file to send is invalid.
	 */
	const INVALID_FILE			= 1606;

	/**
	 * The specified time for cache is invalid.
	 */
	const INVALID_CACHE_TIME	= 1607;

	/**
	 * Response content.
	 * @var string
	 */
	protected $content			= null;

	/**
	 * Response status code.
	 * @var int
	 */
	protected $statusCode		= null;

	/**
	 * File or path to a file, to send with the response.
	 * @var File|string
	 */
	protected $file				= null;

	/**
	 * Forces the download of the setted file by adding some headers to the
	 * response.
	 * @var bool
	 */
	protected $forceDownload	= null;

	/**
	 * Global instance of HttpScriptResponse. Only one is allowed per script
	 * request.
	 * @var CurrentHttpResponse
	 * @static
	 */
	private static $instance	= null;

	/**
	 * Creates a new class instance.
	 *
	 * This class is used to send back to the UA a HTTP response.
	 *
	 * This class is Singleton, so only one instance of this class can exist at
	 * a time.
	 * @param string $content (optimal) String representing the body response
	 * that will be sent to UA.
	 */
	public function __construct($content = null)
	{
		if(is_null(self::$instance))
		{
			parent::__construct();
			$this->headers = array();
			$this->forceDownload = true;
			self::$instance = $this;

			if(!is_null($content))
				$this->content = $content;
		}
		else
		{
			throw new HttpError(Language::getCurrent()->getSentence('error.http.instanceViolation'), self::INSTANCE_VIOLATION);
		}
	}

	/**
	 * Returns the global instance of HttpScriptResponse.
	 *
	 * This class is a Singleton because only one can exists per requests.
	 * @return CurrentHttpResponse
	 * @static
	 */
	public static function getInstance()
	{
		if(is_null(self::$instance))
			new self;

		return self::$instance;
	}

	/**
	 * Redirects the current request to another URL.
	 *
	 * The script is stopped after calling this method.
	 * @param string $url URL to redirect to.
	 * @param int $code HTTP redirection code. Default is 302.
	 * @static
	 */
	public static function redirect($url, $code = 302)
	{
		header('Location: ' . Enviroment::resolveUrl($url), true, $code);

		// send all remaining cookies after the "Location" header
		$cookies = CookiesManager::getReadyCookies();
		
		if(isset($cookies) && !$cookies->isEmpty())
		{
			foreach($cookies as $cookie)
				$cookie->save();
		}

		exit(0);
	}

	/**
	 * Sets a file to be sent with the response.
	 *
	 * Only one can be added per response. If more than one file is setted, that
	 * last will replace the first.
	 * @param File|string $file It can be a File object or a path to a file.
	 * @param bool $download (optimal) If is true, headers to force a download
	 * window in the UA will be added. Default is true.
	 */
	public function setFile($file, $download = true)
	{
		$this->file = $file;
		$this->forceDownload = $download;
	}

	/**
	 * Returns the file setted to be sent with the response.
	 *
	 * If no file is setted, a null value is returned.
	 * @return File|string
	 */
	public function getFile()
	{
		return $this->file;
	}

	/**
	 * Returns whether the download of the file must be forced.
	 * @return bool
	 */
	public function getForceDownload()
	{
		return $this->forceDownload;
	}

	/**
	 * Sends the response to the UA that made the current request.
	 *
	 * After this method is called, the script execution will be stopped.
	 * @param string $content (optimal) Content to send back to UA.
	 */
	public function send($content = null)
	{
		$file = null;

		if(!is_null($content))
			$this->content = $content;
		
		// response compression
		if(LocalConfiguration::get('performance.compress.enable'))
		{
			if(Compressor::canEncodeResponse())
				$this->content = Compressor::encodeResponse($this->content);
		}

		// file
		if(!is_null($this->file))
		{
			if(Text::isValidString($this->file) && File::exists($this->file))
				$file = File::open($this->file, true);
			else
				$file = Object::isType($this->file, 'File') ? $this->file : false;
			
			if($file)
			{
				// cache headers
				//$this->setHeader('Pragma', 'public');
				//$this->setHeader('Expires', '0');
				//$this->setHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0');
				//$this->setHeader('Cache-Control', 'private');
				
				if($this->forceDownload)
				{
					// required if is IE, otherwise Content-disposition is ignored
					if(ini_get('zlib.output_compression'))
						ini_set('zlib.output_compression', 'Off');

					$this->setHeader('Content-Disposition', "attachment; filename={$file->getName()};");
					$this->setHeader('Content-Transfer-Encoding', 'binary');
				}

				if(!$this->getContentType())
					$this->setContentType($file->getType());
				
				$this->setHeader('Content-Length', $file->getByteSize());
			}
			else
			{
				throw new HttpError(Language::getCurrent()->getSentence('error.http.invalidDownload'), self::INVALID_FILE);
			}
		}

		// set Content-type header
		if(!$this->getContentType())
			$this->setContentType('text/html; charset=' . LocalConfiguration::get('page.charset'));

		// set headers
		foreach($this->headers as $name => $value)
			header("{$name}: {$value}", true);

		// set status code
		if(is_numeric($this->statusCode))
			header("HTTP/{$this->protocolVersion} {$this->statusCode} {$this->statusMessages[$this->statusCode]}", true);

		// send contents
		if($file)
		{
			if(!ini_get('safe_mode'))
				set_time_limit(0);

			$contentLength = $file->getByteSize();
			Enviroment::raiseMemoryLimit($contentLength);

			$i = -1;
			$chunkSize = 1024;
			$limit = ceil($contentLength / $chunkSize);
			$offset = 0;

			while(++$i < $limit)
			{
				$offset = $i * $chunkSize;
				$content = $file->read($offset, $chunkSize);

				if($content !== '')
					echo $content;
			}
		}
		else
		{
			echo $this->content;
		}
	}

	/**
	 * Sets the response content.
	 * @param string $content Response content.
	 */
	public function setContent($content)
	{
		$this->content = $content;
	}

	/**
	 * Returns the response content.
	 * @return string
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * Sets the response status code.
	 * @param int $code Status code.
	 */
	public function setStatusCode($code)
	{
		$this->statusCode = $code;
	}

	/**
	 * Returns the response status code.
	 * @return int
	 */
	public function getStatusCode()
	{
		return $this->statusCode;
	}

	/**
	 * Sets cache information for the response.
	 * @param mixed $time Expiration time for the cache. It can be expressed in
	 * three ways:
	 * <ul>
	 * <li>an integer - in this case it must be the number of seconds in which
	 * the cache must expires. This number will be added to the current
	 * timestamp to obtain the expiration time.</li>
	 * <li>a string - in this case it must be a date and time representing the
	 * time when the cache must expires.</li>
	 * <li>a Date object - in this case it must be a Date object holding a valid
	 * date for the cache expiration.</li>
	 * </ul>
	 * If the value is null, the cache will be removed.
	 */
	public function setCache($time)
	{
		$date = null;

		if(is_int($time))
		{
			$date = Date::get();
			$date->addSecond($time);
		}
		elseif(Text::isValidString($time))
		{
			$date = Date::parse($time);
		}
		elseif(Object::isType($time, 'Date'))
		{
			$date = $time;
		}

		if(!is_null($date))
		{
			if(!is_null($time))
			{
				$now = Date::get();
				$diff = $date->getTimestamp() - $now->getTimestamp();

				if($diff < 0)
					$diff = 0;

				$this->setHeader('Expires', $date->getGMT());
				$this->setHeader('Cache-Control', "private, max-age={$diff}");
			}
			else
			{
				if($this->hasHeader('Expires'))
				{
					$this->setHeader('Expires', null);
					header('Expires:'); // remove the header if it was sent already
				}

				if($this->hasHeader('Cache-Control'))
				{
					$this->setHeader('Cache-Control', null);
					header('Cache-Control:'); // remove the header if it was sent already
				}
			}
		}
		else
		{
			throw new HttpError(Language::getCurrent()->getSentence('error.http.invalidCacheTime', $time), self::INVALID_CACHE_TIME);
		}
	}

	/**
	 * Returns the content of the response object.
	 * @return string
	 */
	public function __toString()
	{
		return $this->content ? $this->rawHeaders . Enviroment::EOL . Enviroment::EOL . $this->content : '';
	}
}
?>