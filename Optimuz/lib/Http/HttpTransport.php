<?php
/**
 * This file sets a class to work with HTTP requests.
 * @version 0.2.1
 * @package Http
 */

/**
 * This is a base class for the class of request and response. It only defines
 * commom properties and methods.
 * @author Diego Andrade
 * @package Http
 * @since Optimuz 0.2
 * @version 0.2.1
 * @uses Core
 * @uses Lang
 * @abstract
 */
abstract class HttpTransport extends Object
{
	/**
	 * POST request method.
	 */
	const POST							= 'POST';

	/**
	 * GET request method.
	 */
	const GET							= 'GET';

	/**
	 * PUT request method.
	 */
	const PUT							= 'PUT';

	/**
	 * HEAD request method.
	 */
	const HEAD							= 'HEAD';

	/**
	 * OPTIONS request method.
	 */
	const OPTIONS						= 'OPTIONS';

	/**
	 * Basic authentication.
	 */
	const AUTH_BASIC					= 'basic';

	/**
	 * Negotiate authentication.
	 */
	const AUTH_NEGOTIATE				= 'negotiate';

	/**
	 * NTLM authentication.
	 */
	const AUTH_NTLM						= 'ntlm';

	/**
	 * Digest authentication.
	 */
	const AUTH_DIGEST					= 'digest';

	/**
	 * Kerberos authentication.
	 */
	const AUTH_KERBEROS					= 'kerberos';

	/**
	 * Invalid authentication.
	 */
	const AUTH_INVALID					= 1609;

	/**
	 * Invalid authentication.
	 */
	const AUTH_NOT_IMPLEMENTED			= 1610;

	/**
	 * The provided URL is invalid.
	 */
	const INVALID_URL					= 1611;

	/**
	 * URL to request.
	 * @var string
	 * @see HttpTransport::setUrl()
	 * @see HttpTransport::getUrl()
	 */
	protected $url						= null;

	/**
	 * Host name.
	 * @var string
	 * @see HttpTransport::getHost()
	 */
	protected $host						= null;

	/**
	 * Port number. Defult is 80.
	 * @var int 80
	 * @see HttpTransport::setPort()
	 * @see HttpTransport::getPort()
	 */
	protected $port						= null;

	/**
	 * Request method. Default is HttpTransport::GET.
	 * @var string HttpTransport::GET
	 * @see HttpTransport::GET
	 * @see HttpTransport::POST
	 * @see HttpTransport::PUT
	 * @see HttpTransport::HEAD
	 * @see HttpTransport::OPTIONS
	 * @see HttpTransport::setMethod()
	 * @see HttpTransport::getMethod()
	 */
	protected $method					= null;

	/**
	 * HTTP headers.
	 * @var array
	 * @see HttpTransport::setHeader()
	 * @see HttpTransport::getHeader()
	 * @see HttpTransport::getHeaders()
	 * @see HttpTransport::hasHeader()
	 */
	protected $headers					= null;

	/**
	 * Parameters sent in requests.
	 * @var array
	 */
	protected $params					= null;

	/**
	 * User Agent used in the request. Default is PHP Optimuz.
	 * @var string PHP Optimuz
	 */
	protected $ua						= null;

	/**
	 * Complete request/response headers as string.
	 * @var string
	 */
	protected $rawHeaders				= null;

	/**
	 * Complete request/response content (headers and body) as string.
	 * @var string
	 */
	protected $rawContent				= null;

	/**
	 * Defines whether the connection is secure (over SSL like HTTPS).
	 * @var bool
	 */
	protected $secureConnection			= null;

	/**
	 * Protocol used. Default is HTTP.
	 * @var string http
	 * @see HttpTransport::getProtocol()
	 */
	protected $protocol					= null;

	/**
	 * Version of the protocol. Default is 1.1 (for the HTTP protocol).
	 * @var float 1.1
	 */
	protected $protocolVersion			= null;

	/**
	 * List of HTTP statuses.
	 * @var array
	 */
	protected $statusMessages			= array(
		100 => 'Continue',
		101 => 'Switching Protocols',
		200 => 'OK',
		201 => 'Created',
		202 => 'Accepted',
		203 => 'Non-Authoritative Information',
		204 => 'No Content',
		205 => 'Reset Content',
		206 => 'Partial Content',
		300 => 'Multiple Choices',
		301 => 'Moved Permanently',
		302 => 'Found',
		303 => 'See Other',
		304 => 'Not Modified',
		305 => 'Use Proxy',
		306 => 'No Longer Used',
		307 => 'Temporary Redirect',
		400 => 'Bad Request',
		401 => 'Not Authorised',
		402 => 'Payment Required',
		403 => 'Forbidden',
		404 => 'Not Found',
		405 => 'Method Not Allowed',
		406 => 'Not Acceptable',
		407 => 'Proxy Authentication Required',
		408 => 'Request Timeout',
		409 => 'Conflict',
		410 => 'Gone',
		411 => 'Length Required',
		412 => 'Precondition Failed',
		413 => 'Request Entity Too Large',
		414 => 'Request URI Too Long',
		415 => 'Unsupported Media Type',
		416 => 'Requested Range Not Satisfiable',
		417 => 'Expectation Failed',
		500 => 'Internal Server Error',
		501 => 'Not Implemented',
		502 => 'Bad Gateway',
		503 => 'Service Unavailable',
		504 => 'Gateway Timeout',
		505 => 'HTTP Version Not Supported'
	);

	/**
	 * Creates a new class instance and sets some defaults.
	 */
	public function __construct()
	{
		$this->method = self::GET;
		$this->ua = 'PHP Optimuz';
		$this->port = 80;
		$this->params = array();
		$this->protocol = 'http';
		$this->protocolVersion = 1.1;
		$this->headers = array(
			'Accept' => '*/*'
		);
	}

	/**
	 * Sets the request URL.
	 *
	 * If the URL is invalid, a HttpError exception is thrown.
	 * @param string $url URL to request.
	 * @see HttpTransport::$url
	 * @see HttpTransport::getUrl()
	 * @throws HttpError
	 */
	public function setUrl($url)
	{
		if(preg_match('#^[\w+-]+://(?:[^\.]+(?:\..+)+|localhost(?:/.*)?)#', $url))
		{
			$protocolParts = explode('://', $url);
			$urlParts = explode('/', $protocolParts[1], 2);
			$this->protocol = strtolower($protocolParts[0]);
			$this->port = strpos($urlParts[0], ':') !== false ? (int)end((explode(':', $urlParts[0]))) : ($this->protocol == 'https' ? 443 : 80);
			$this->host = str_replace(":{$this->port}", '', $urlParts[0]);
			$this->url = isset($urlParts[1]) && $urlParts[1] !== '' ? "/{$urlParts[1]}" : '/';
		}
		else
		{
			throw new HttpError(Language::getInstance('Http')->getSentence('error.invalidUrl', $url), self::INVALID_URL);
		}
	}

	/**
	 * Returns the URL to request.
	 * @return string
 	 * @see HttpTransport::$url
 	 * @see HttpTransport::setUrl()
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * Returns the host name.
	 * @return string
 	 * @see HttpTransport::$host
	 */
	public function getHost()
	{
		return $this->host;
	}

	/**
	 * Sets the request port number.
	 * @param int $port Port number.
	 * @see HttpTransport::$port
	 * @see HttpTransport::getPort()
	 */
	public function setPort($port)
	{
		$this->port = $port;
	}

	/**
	 * Returns the request port number.
	 * @return int
	 * @see HttpTransport::$port
	 * @see HttpTransport::setPort()
	 */
	public function getPort()
	{
		return $this->port;
	}

	/**
	 * Sets the request method.
	 *
	 * If an unsupported method is specified, an HttpError will be thrown.
	 * @param string $method GET, POST or PUT.
	 * @see HttpTransport::GET
	 * @see HttpTransport::POST
	 * @see HttpTransport::PUT
	 * @see HttpTransport::HEAD
	 * @see HttpTransport::OPTIONS
	 * @see HttpTransport::$method
	 * @see HttpTransport::getMethod()
	 */
	public function setMethod($method)
	{
		$method = strtoupper($method);

		if(($method == self::GET) || ($method == self::POST) || ($method == self::PUT) || ($method == self::HEAD) || ($method == self::OPTIONS))
			$this->method = $method;
		else
			throw new HttpError(Language::getInstance('Http')->getSentence('error.invalidMethod', $method), self::INVALID_METHOD);
	}

	/**
	 * Returns the request method.
	 * @return string
	 * @see HttpTransport::GET
	 * @see HttpTransport::POST
	 * @see HttpTransport::PUT
	 * @see HttpTransport::HEAD
	 * @see HttpTransport::OPTIONS
	 * @see HttpTransport::$method
	 * @see HttpTransport::setMethod()
	 */
	public function getMethod()
	{
		return $this->method;
	}

	/**
	 * Sets a HTTP header.
	 *
	 * If the value is null and the header already exists, it will be removed.
	 * @param string $name Header name.
	 * @param string $value Header value.
	 * @see HttpTransport::$headers
	 * @see HttpTransport::getHeader()
	 * @see HttpTransport::getHeaders()
	 * @see HttpTransport::hasHeader()
	 */
	public function setHeader($name, $value)
	{
		if(!is_null($value))
			$this->headers[$name] = $value;
		elseif(isset($this->headers[$name]))
			unset($this->headers[$name]);
	}

	/**
	 * Returns a HTTP header value.
	 *
	 * If the header does not exist, a null value will be returned.
	 * @param string $name Header name.
	 * @return string|array
	 * @see HttpTransport::$headers
	 * @see HttpTransport::setHeader()
	 * @see HttpTransport::getHeaders()
	 * @see HttpTransport::hasHeader()
	 */
	public function getHeader($name)
	{
		return isset($this->headers[$name]) ? $this->headers[$name] : null;
	}

	/**
	 * Returns all HTTP headers.
	 * @return array
	 * @see HttpTransport::$headers
	 * @see HttpTransport::setHeader()
	 * @see HttpTransport::getHeader()
	 * @see HttpTransport::hasHeader()
	 */
	public function getHeaders()
	{
		return $this->headers;
	}

	/**
	 * Checks if the specified header was setted.
	 * @param string $name Header name.
	 * @return bool
	 * @see HttpTransport::$headers
	 * @see HttpTransport::setHeader()
	 * @see HttpTransport::getHeader()
	 * @see HttpTransport::getHeaders()
	 */
	public function hasHeader($name)
	{
		return isset($this->headers[$name]);
	}

	/**
	 * Sets the content type (Content-Type header). Default is text/plain.
	 * @param string $contentType Content type.
	 * @see HttpTransport::getContentType()
	 */
	public function setContentType($contentType)
	{
		$this->headers['Content-Type'] = $contentType;
	}

	/**
	 * Returns the content type (Content-Type) or null if it has no value.
	 * @return string
	 * @see HttpTransport::setContentType()
	 */
	public function getContentType()
	{
		return isset($this->headers['Content-Type']) ? $this->headers['Content-Type'] : null;
	}

	/**
	 * Sets the connection type (Connection header).
	 * @param string $connectionType Connection type.
	 * @see HttpTransport::getConnectionType()
	 */
	public function setConnectionType($connectionType)
	{
		$this->headers['Connection'] = $connectionType;
	}

	/**
	 * Returns the connection type (Connection header) or null if it has no
	 * value.
	 * @return string
	 * @see HttpTransport::setConnectionType()
	 */
	public function getConnectionType()
	{
		return isset($this->headers['Connection']) ? $this->headers['Connection'] : null;
	}

	/**
	 * Return all headers as string.
	 * @return string
	 */
	public function getRawHeaders()
	{
		if(!Text::isValidString($this->rawHeaders) && !empty($this->headers))
		{
			$this->rawHeaders = '';

			foreach($this->headers as $name => $content)
				$this->rawHeaders .= "{$name}: {$content}" . Enviroment::EOL;
		}

		return $this->rawHeaders;
	}

	/**
	 * Return all headers and body content as string.
	 * @return string
	 */
	public function getRawContent()
	{
		return $this->rawContent;
	}

	/**
	 * Sets the user agent (UA) for the request.
	 * @param string $ua String of a User Agent.
	 * @see HttpTransport::$ua
	 * @see HttpTransport::getUserAgent()
	 */
	public function setUserAgent($ua)
	{
		$this->ua = $ua;
	}

	/**
	 * Returns the user agent (UA) for the request.
	 * @return string
	 * @see HttpTransport::$ua
	 * @see HttpTransport::setUserAgent()
	 */
	public function getUserAgent()
	{
		return $this->ua;
	}

	/**
	 * Sets version of the HTTP protocol.
	 * @param float $version Version of the HTTP protocol.
	 * @see HttpTransport::$protocolVersion
	 * @see HttpTransport::getProtocolVersion()
	 */
	public function setProtocolVersion($version)
	{
		$this->protocolVersion = $version;
	}

	/**
	 * Returns version of the HTTP protocol.
	 * @return float
	 * @see HttpTransport::$protocolVersion
	 * @see HttpTransport::setProtocolVersion()
	 */
	public function getProtocolVersion()
	{
		return $this->protocolVersion;
	}

	/**
	 * Returns protocol used.
	 * @return string
	 * @see HttpTransport::$protocol
	 */
	public function getProtocol()
	{
		return $this->protocol;
	}

	/**
	 * Sets whether the connection is secure (over SSL like HTTPS).
	 * @param bool $secureConnection True if the connection is secure, false
	 * otherwise.
	 * @see HttpTransport::$secureConnection
	 * @see HttpTransport::getSecureConnection()
	 */
	public function setSecureConnection($secureConnection)
	{
		$this->secureConnection = $secureConnection;
	}

	/**
	 * Returns whether the connection is secure (over SSL like HTTPS).
	 * @return bool
	 * @see HttpTransport::$secureConnection
	 * @see HttpTransport::setSecureConnection()
	 */
	public function getSecureConnection()
	{
		return $this->secureConnection;
	}
}
?>