<?php
/**
 * This file sets a class to work with HTTP requests.
 * @version 0.3
 * @package Http
 */

/**
 * This class is used to handle HTTP responses.
 * @author Diego Andrade
 * @package Http
 * @since Optimuz 0.2
 * @version 0.4
 * @uses Core
 */
class HttpResponse extends HttpTransport
{
	/**
	 * Response content.
	 * @var string
	 */
	protected $content			= null;

	/**
	 * Response status header.
	 * @var string
	 */
	protected $status			= null;

	/**
	 * Response status code.
	 * @var int
	 */
	protected $statusCode		= null;

	/**
	 * HTTP request object.
	 * @var HttpRequest
	 * @see HttpRequest
	 */
	protected $request			= null;

	/**
	 * Creates a new class instance.
	 *
	 * The constructor receive a string containing an entire HTTP response, with
	 * headers and body, and then parses this string to fill the object
	 * properties.
	 * @param string $content String representing the raw response
	 * received after a request made with the class HttpRequest.
	 * @param HttpRequest $request (optimal) Request object used to take this
	 * response.
	 * @see HttpRequest
	 */
	public function __construct($content, HttpRequest $request = null)
	{
		parent::__construct();

		if(!is_null($request))
			$this->request = $request;

		if(!is_null($content))
		{
			$this->rawContent = $content;
			$tmp = explode(Enviroment::WINDOWS_EOL . Enviroment::WINDOWS_EOL, $content, 2);

			if(isset($tmp[1]))
				$this->content = $tmp[1];

			$this->rawHeaders = $tmp[0];
			$headers = explode(Enviroment::EOL, $tmp[0]);
			$total = count($headers);
			$i = -1;

			while(++$i < $total)
			{
				$value = $headers[$i];

				if($i > 0)
				{
					$header = explode(':', $value, 2);

					if(!isset($this->headers[$header[0]]))
					{
						$this->headers[$header[0]] = trim($header[1]);
					}
					else
					{
						if(is_array($this->headers[$header[0]]))
							$this->headers[$header[0]][] = trim($header[1]);
						else
							$this->headers[$header[0]] = array($this->headers[$header[0]], trim($header[1]));
					}

					if(strtolower($header[0]) == 'content-type')
						$this->contentType = $header[1];

					if(is_null($this->ua) && (strtolower($header[0]) == 'user-agent'))
						$this->ua = $header[1];
				}
				else
				{
					$header = explode(' ', $value, 3);

					if(isset($header[1]))
					{
						$this->statusCode = (int)$header[1];
						$this->status = "{$header[1]} {$header[2]}";
					}
				}
			}

			if(isset($this->headers['Set-Cookie']))
			{
				$cookies = $this->headers['Set-Cookie'];
				$responseCookies = array();

				if(!is_array($cookies))
					$cookies = array($cookies);

				if($this->request->hasHeader('Cookie'))
					$responseCookies[] = $this->request->getHeader('Cookie');

				foreach($cookies as $cookie)
					$responseCookies[] = Text::split(';', $cookie)->getFirst();

				$responseCookies = array_unique($responseCookies);
				$this->request->setHeader('Cookie', implode('; ', $responseCookies));
			}
		}
	}

	/**
	 * Free any used resource before destructing the object.
	 */
	public function __destruct()
	{
		$this->request = null;
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
	 * Returns the response status header.
	 * @return string
	 */
	public function getStatus()
	{
		return $this->status;
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
	 * Sets the request object used to get this response.
	 * @param HttpRequest $request Request object.
	 * @see HttpRequest
	 */
	public function setRequest(HttpRequest $request)
	{
		$this->request = $request;
	}

	/**
	 * Returns the request object used to get this response.
	 * @return HttpRequest
	 */
	public function getRequest()
	{
		return $this->request;
	}

	/**
	 * Returns a bool indicating if this response was cached.
	 * @return boolean
	 */
	public function isCached()
	{
		return $this->statusCode == 304;
	}

	/**
	 * Indicates whether the response was a success, that is, its status code is
	 * a 10x or 20x. A cached response (304) is also seen as success.
	 * @return boolean
	 */
	public function isSuccess()
	{
		return ($this->statusCode < 300) || $this->isCached();
	}

	/**
	 * Indicates whether the response is a redirection (301, 302, 303 or 307).
	 * @return boolean
	 */
	public function isRedirection()
	{
		return in_array($this->statusCode, array(301, 302, 303, 307));
	}

	/**
	 * Returns the content of the response object.
	 * @return string
	 */
	public function __toString()
	{
		return $this->content ? $this->content : '';
	}
}
?>