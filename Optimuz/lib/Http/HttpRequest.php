<?php
/**
 * This file sets a class to work with HTTP requests.
 * @version 0.3.4
 * @package Http
 */

/**
 * This class is used to make HTTP requests.
 * @author Diego Andrade
 * @package Http
 * @since Optimuz 0.2
 * @version 0.3.4
 * @uses Core
 * @uses Socket
 * @uses Lang
 */
class HttpRequest extends HttpTransport
{
	/**
	 * Invalid method.
	 */
	const INVALID_METHOD		= 1600;

	/**
	 * Missing URL.
	 */
	const MISSING_URL			= 1601;

	/**
	 * Missing URL protocol.
	 */
	const MISSING_PROTOCOL		= 1602;

	/**
	 * Error on HTTP request.
	 */
	const REQUEST_ERROR			= 1603;

	/**
	 * Proxy login error.
	 */
	const PROXY_LOGIN_ERROR		= 1604;

	/**
	 * There was an error on redirecting an HTTP request.
	 */
	const REDIRECTION_ERROR		= 1612;

	/**
	 * Connection used to send the requests.
	 * @var SocketConnection
	 */
	protected $connection		= null;

	/**
	 * HTTP response object.
	 * @var HttpResponse
	 * @see HttpResponse
	 */
	protected $response			= null;

	/**
	 * Collection of HTTP response objects.
	 * @var ArrayList
	 * @see HttpResponse
	 */
	protected $responses		= null;

	/**
	 * Sets if the request should be cached. Default is false.
	 * @var bool false
	 */
	protected $cache			= null;

	/**
	 * Information for proxy authentication.
	 * @var HttpProxyAuthentication
	 * @see HttpProxyAuthentication
	 */
	protected $proxyAuth		= null;

	/**
	 * HTTP protocol version. Default is 1.1.
	 * @var string 1.1
	 */
	protected $protocolVersion	= null;

	/**
	 * List of files that will be sent with the request.
	 * @var ArrayList
	 * @see HttpRequest::addFile()
	 */
	protected $files			= null;

	/**
	 * Argument separator used to build the HTTP query list.
	 * @var string &
	 */
	protected $argSeparator		= null;

	/**
	 * Timeout in seconds. Default is 60.
	 * @var int
	 */
	protected $timeout			= null;

	/**
	 * Indicates whether HTTP redirects should be followed.
	 * @var boolean
	 */
	protected $followRedirects	= null;

	/**
	 * Creates a new class instance.
	 * @param string $url (optimal) URL to request.
	 * @param string $method (optimal) Request method. Default is
	 * HttpTransport::GET.
	 */
	public function __construct($url = null, $method = self::GET)
	{
		parent::__construct();

		if(!empty($url))
			$this->setUrl($url);

		$this->method = $method;
		$this->cache = false;
		$this->protocolVersion = 1.1;
		$this->files = new ArrayList();
		$this->files->setType('File');
		$this->argSeparator = '&';
		$this->timeout = 60;
		$this->followRedirects = true;
		$this->responses = new ArrayList;
		$this->responses->setType('HttpResponse');

		if(!Load::isLoaded('Socket'))
			Load::package('Socket');
	}

	/**
	 * Free any used resource before destructing the object.
	 */
	public function __destruct()
	{
		$this->closeConnection();
		$this->proxyAuth = null;
		$this->clearResponses();
		$this->responses = null;
	}

	/**
	 * Calls the destructor method to free any used resource.
	 */
	public function destroy()
	{
		$this->__destruct();
	}

	/**
	 * Sets the connection timeout.
	 * @param int $timeout Timeout in seconds.
	 * @see HttpRequest::$timeout
	 * @see HttpRequest::getTimeout()
	 */
	public function setTimeout($timeout)
	{
		$this->timeout = $timeout;
	}

	/**
	 * Returns the connection timeout in seconds.
	 * @return int
	 * @see HttpRequest::$timeout
	 * @see HttpRequest::setTimeout()
	 */
	public function getTimeout()
	{
		return $this->timeout;
	}

	/**
	 * Adds a new request parameter.
	 * @param string $name Parameter name.
	 * @param mixed $value Parameter value.
	 * @see HttpRequest::setParams()
	 * @see HttpRequest::getParam()
	 * @see HttpRequest::getParams()
	 * @see HttpRequest::clearParams()
	 */
	public function addParam($name, $value)
	{
		$this->params[$name] = $value;
	}

	/**
	 * Sets the request parameters.
	 *
	 * Calling this method will overwite any value already setted to the request
	 * parameters.
	 * @param array|string $params If is a string, it will be enclosed in a new
	 * array. If it is an array, it must to be an associative array.
	 * @see HttpRequest::addParam()
	 * @see HttpRequest::getParam()
	 * @see HttpRequest::getParams()
	 * @see HttpRequest::clearParams()
	 */
	public function setParams($params)
	{
		if(is_array($params))
			$this->params = $params;
		else
			$this->params = array((string)$params);
	}

	/**
	 * Returns the value of a request parameter. If the parameter does not
	 * exist, a null value will be returned.
	 * @return mixed
	 * @see HttpRequest::addParam()
	 * @see HttpRequest::setParams()
	 * @see HttpRequest::getParams()
	 * @see HttpRequest::clearParams()
	 */
	public function getParam($name)
	{
		return isset($this->params[$name]) ? $this->params[$name] : null;
	}

	/**
	 * Returns an array with all request parameters.
	 * @return array
	 * @see HttpRequest::addParam()
	 * @see HttpRequest::getParam()
	 * @see HttpRequest::setParams()
	 * @see HttpRequest::clearParams()
	 */
	public function getParams()
	{
		return $this->params;
	}

	/**
	 * Removes all parameters previously set.
	 * @see HttpRequest::addParam()
	 * @see HttpRequest::getParam()
	 * @see HttpRequest::setParams()
	 * @see HttpRequest::getParams()
	 */
	public function clearParams()
	{
		$this->params = array();
	}

	/**
	 * Converts the params array into a query string.
	 * @return string Returns a query string properly encoded. An empty string
	 * is returned if the params array is empty.
	 */
	protected function prepareParams()
	{
		$size = count($this->params);
		$params = '';

		if($size > 1)
		{
			$params = http_build_query($this->params, null, $this->argSeparator);
		}
		elseif($size == 1)
		{
			$keys = array_keys($this->params);

			if($keys[0] === 0)
				$params = $this->params[0];
			else
				$params = http_build_query($this->params, null, $this->argSeparator);
		}

		return $params;
	}

	/**
	 * Sets whether HTTP redirects should be followed.
	 * @param boolean $followRedirects True to follow, false to not follow.
	 * @see HttpRequest::$followRedirects
	 * @see HttpRequest::getFollowRedirects()
	 */
	public function setFollowRedirects($followRedirects)
	{
		$this->followRedirects = $followRedirects;
	}

	/**
	 * Returns whether HTTP redirects should be followed.
	 * @return boolean Returns true if redirects should be followed, or false
	 * otherwise.
	 * @see HttpRequest::$followRedirects
	 * @see HttpRequest::setFollowRedirects()
	 */
	public function getFollowRedirects()
	{
		return $this->followRedirects;
	}

	/**
	 * Sends the request and waits for the response.
	 *
	 * If you call this method without specifying an URL, an HttpError will be
	 * thrown.
	 *
	 * The request is sent using a socket connection created with the
	 * SocketConnection class.
	 * @return bool Returns true on success or false on errors.
	 * @todo Implement authentication methods: Basic, Digest, Kerberos,
	 * Negotiate, NTLM.
	 * @todo Implement persistent connection for "keep-alive" connections.
	 */
	public function send()
	{
		static $isRedirection = false;
		$success = false;

		if(!$isRedirection)
			$this->clearResponses();
		else
			$isRedirection = false;

		if(is_string($this->url) && ($this->url !== ''))
		{
			if(!empty($this->protocol))
			{
				$proxyResponse = '';
				$params = $this->prepareParams();
				$postData = '';
				$hasFiles = !$this->files->isEmpty();

				if($this->method == self::GET)
				{
					$sep = strpos($this->url, '?') === false ? '?' : '&amp;';

					if($params)
						$this->url .= $sep . $params;
				}

				$schema = $this->protocol == 'https' ? 'ssl' : '';
				$host = $this->host . (!in_array($this->port, array(80, 443)) ? ":{$this->port}" : '');
				$post = "{$this->method} ";

				if($this->proxyAuth)
				{
					$path = "{$this->protocol}://{$host}{$this->url}";
					$post .= "{$path} HTTP/{$this->protocolVersion}" . Enviroment::WINDOWS_EOL;
					$post .= "Host: {$this->proxyAuth->getHost()}" . Enviroment::WINDOWS_EOL; //TODO check proxy connection
				}
				else
				{
					$path = $this->url;
					$post .= "{$path} HTTP/{$this->protocolVersion}" . Enviroment::WINDOWS_EOL;
					$post .= "Host: {$host}" . Enviroment::WINDOWS_EOL;
				}

				// cache
				if(!$this->cache)
				{
					$this->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate');
					$this->setHeader('Pragma', 'no-cache');
				}

				// user agent
				if($this->ua)
					$this->setHeader('User-Agent', $this->ua);

				// headers
				$encType = '';

				if(count($this->headers) > 0)
				{
					if($this->hasHeader('Content-Type'))
					{
						$encType = $this->getContentType();
						$this->setHeader('Content-Type', null);
					}

					foreach($this->headers as $name => $value)
						$post .= "{$name}: {$value}" . Enviroment::WINDOWS_EOL;
				}

				$this->rawHeaders = $post;

				// content/files
				if($this->method == self::POST)
				{
					if($hasFiles)
					{
						$boundary = '------' . md5('optimuz-' . time());
						$encType = "multipart/form-data; boundary=\"{$boundary}\"";
						$postLen = 0;

						foreach($this->params as $name => $value)
						{
							$value = urlencode($value);
							$input = "--{$boundary}" . Enviroment::WINDOWS_EOL
										. "Content-Disposition: form-data; name=\"{$name}\"" . Enviroment::WINDOWS_EOL . Enviroment::WINDOWS_EOL
										. $value . Enviroment::WINDOWS_EOL;

							$postLen += strlen($input);
							$postData .= $input;
						}

						foreach($this->files as $file)
						{
							$fileName = $file->getName();
							$name = explode('.', $fileName);
							array_pop($name);
							$name = implode('.', $name);
							$type = $file->getType();
							$data = $file->read();

							if(!$type)
								$type = 'application/octet-stream';

							$upload = "--{$boundary}" . Enviroment::WINDOWS_EOL
										. "Content-Disposition: form-data; name=\"{$name}\"; filename=\"{$fileName}\"" . Enviroment::WINDOWS_EOL
										. "Content-Type: {$type}" . Enviroment::WINDOWS_EOL . Enviroment::WINDOWS_EOL;
							$postLen += $file->getByteSize() + strlen($upload) + 1;
							$upload .= $data . Enviroment::WINDOWS_EOL;
							$postData .= $upload;
						}

						$endBoundary = "--{$boundary}--" . Enviroment::WINDOWS_EOL;
						$postData .= $endBoundary;
						$postLen += strlen($endBoundary);
					}
					else
					{
						if(empty($encType))
							$encType = 'application/x-www-form-urlencoded';

						$postData = $params;
						$postLen = strlen($postData);
					}

					$post .= "Content-Type: {$encType}" . Enviroment::WINDOWS_EOL;
					$post .= "Content-Length: {$postLen}" . Enviroment::WINDOWS_EOL;
				}

				$post .= Enviroment::WINDOWS_EOL;
				$post .= $postData;
				$this->rawContent = $post;

				// send
				try
				{
					$continue = false;
					$this->connection = null;

					if(is_null($this->connection))
					{
						// proxy
						if($this->proxyAuth)
						{
							$proxy = $this->proxyAuth;
							$this->connection = new SocketConnection($proxy->getHost(), $proxy->getPort(), $this->timeout, $schema);

							if($this->connection->open())
							{
								if($this->connection->write($post))
								{
									$proxyResponse = new HttpResponse($this->connection->read(), $this);

									if(preg_match('/^20./', $proxyResponse->getStatusCode()))
									{
										$continue = true;
									}
									elseif(preg_match('/^40[17]/', $proxyResponse->getStatusCode()))
									{
										$authType = $proxyResponse->getStatusCode() == 401 ? $proxyResponse->getHeader('WWW-Authenticate') : $proxyResponse->getHeader('Proxy-Authenticate');
										$selectedAuthType = null;

										if(is_array($authType))
										{
											$selectedAuthType = $authType[0];
										}
										else
										{
											$selectedAuthType = $authType;
										}

										switch(Text::toLower($selectedAuthType))
										{
											case self::AUTH_BASIC:

												break;
											case self::AUTH_DIGEST:

												break;
											case self::AUTH_KERBEROS:
											case self::AUTH_NEGOTIATE:
											case self::AUTH_NTLM:
												throw new HttpError(Language::getInstance('Http')->getSentence('error.proxyAuthNotImplemented'), self::AUTH_NOT_IMPLEMENTED);
												break;
											default:
												throw new HttpError(Language::getInstance('Http')->getSentence('error.invalidProxyAuthMethod'), self::AUTH_INVALID);
												break;
										}
									}
									else
									{
										throw new HttpError(Language::getInstance('Http')->getSentence('error.invalidProxyAuthResponse', $proxyResponse->getStatus()), self::REQUEST_ERROR);
									}
								}
								else
								{
									throw new HttpError($this->connection->getError()->__toString(), self::REQUEST_ERROR);
								}
							}
							else
							{
								throw new HttpError($this->connection->getError()->__toString(), self::REQUEST_ERROR);
							}
						}
						else
						{
							$this->connection = new SocketConnection($this->host, $this->port, $this->timeout, $schema);

							if($this->connection->open())
								$continue = true;
							else
								throw new HttpError($this->connection->getError()->__toString(), self::REQUEST_ERROR);
						}
					}
					else
					{
						$continue = true;
					}

					if($continue)
					{
						if($proxyResponse ? !$proxyResponse->isSuccess() : true)
						{
							if($this->connection->write($post))
							{
								$this->response = new HttpResponse($this->connection->read(), $this);
								$this->responses->add($this->response);

								if($this->response->isSuccess())
								{
									$success = true;
								}
								elseif($this->response->isRedirection())
								{
									if($this->followRedirects)
									{
										if($this->response->hasHeader('Location'))
										{
											$redirectUrl = $this->response->getHeader('Location');

											if(!filter_var($redirectUrl, FILTER_VALIDATE_URL))
											{
												$dirSep = $redirectUrl[0] == '/' ? '' : '/';
												$redirectUrl = "{$this->protocol}://{$host}{$dirSep}{$redirectUrl}";

												if(!filter_var($redirectUrl, FILTER_VALIDATE_URL))
													throw new HttpError(Language::getInstance('Http')->getSentence('error.invalidRedirectionUrl', $redirectUrl), self::REDIRECTION_ERROR);
											}

											$isRedirection = true;
											$this->setUrl($redirectUrl);
//											$this->closeConnection();
											$success = $this->send();
										}
										else
										{
											throw new HttpError(Language::getInstance('Http')->getSentence('error.invalidRedirection', $this->url, $this->response->getStatus()), self::REDIRECTION_ERROR);
										}
									}
									else
									{
										$success = true;
									}
								}

								$this->clearParams();
							}
							else
							{
								throw new HttpError($this->connection->getError()->__toString(), self::REQUEST_ERROR);
							}
						}
						else
						{
							$this->response = $proxyResponse;
							$success = true;
						}
					}

//					$isRequestConnectionClose = Text::toLower($this->getConnectionType()) != 'keep-alive';
//					$isResponseConnectionClose = $this->response ? Text::toLower($this->response->getConnectionType()) != 'keep-alive' : true;

//					if($this->connection->isOpened())
//					{
//						$this->connection->close();
//						$this->connection = null;
//					}
//					$this->closeConnection();
				}
				catch(Error $error)
				{
					throw new HttpError($error, self::REQUEST_ERROR);
				}
			}
			else
			{
				throw new HttpError(Language::getInstance('Http')->getSentence('error.missingProtocol'), self::MISSING_PROTOCOL);
			}
		}
		else
		{
			throw new HttpError(Language::getInstance('Http')->getSentence('error.missingUrl'), self::MISSING_URL);
		}

		return $success;
	}

	/**
	 * Returns the last response object.
	 *
	 * If the request was not made yet, a null value will be returned.
	 * @return HttpResponse
	 * @see HttpResponse
	 * @see HttpRequest::getResponses()
	 * @see HttpRequest::$responses
	 */
	public function getResponse()
	{
		return $this->response;
	}

	/**
	 * Returns the response objects as an ArrayList.
	 *
	 * More then one response may exist if there was redirection. The order
	 * object in the collection represents the first response received, and the
	 * last object the last response received.
	 *
	 * If the request was not made yet, the list will be empty.
	 * @return ArrayList
	 * @see HttpResponse
	 * @see HttpRequest::$responses
	 */
	public function getResponses()
	{
		return $this->responses;
	}

	/**
	 * Removes all response objects from previous requests.
	 */
	public function clearResponses()
	{
		if($this->response)
			$this->response->__destruct();

		$this->response = null;

		if($this->responses)
		{
			foreach($this->responses as $response)
				$response->__destruct();

			$this->responses->clear();
		}
	}

	/**
	 * Returns the connection used to send requests.
	 * @return SocketConnection Returns an instance of the SocketConnection
	 * class, or null if no request was made yet.
	 */
	public function getConnection()
	{
		return $this->connection;
	}

	/**
	 * Closes the connection in the case it is still openned.
	 */
	protected function closeConnection()
	{
		if(is_object($this->connection))
			$this->connection = null;
	}

	/**
	 * Sets whether the request should be cached.
	 * @param bool $cache If is false, cache headers will be setted to prevent
	 * cache in this request.
	 * @see HttpRequest::getCache()
	 * @see HttpRequest::send()
	 */
	public function setCache($cache)
	{
		$this->cache = $cache;
	}

	/**
	 * Returns whether the request should be cached.
	 * @return bool
	 * @see HttpRequest::setCache()
	 */
	public function getCache()
	{
		return $this->cache;
	}

	/**
	 * Sets a proxy for the request.
	 * @param HttpProxyAuthentication $proxy Object with the proxy
	 * authentication information.
	 * @see HttpRequest::$proxyAuth
	 * @see HttpRequest::getProxy()
	 * @see HttpProxyAuthentication
	 */
	public function setProxy(HttpProxyAuthentication $proxy)
	{
		$this->proxyAuth = $proxy;
	}

	/**
	 * Returns the proxy setted for the request.
	 * @return HttpProxyAuthentication
	 * @see HttpRequest::$proxyAuth
	 * @see HttpRequest::setProxy()
	 * @see HttpProxyAuthentication
	 */
	public function getProxy()
	{
		return $this->proxyAuth;
	}

	/**
	 * Sets the HTTP protocol version used in the request.
	 * @param string $version HTTP protocol version.
	 * @see HttpRequest::$protocolVersion
	 * @see HttpRequest::getProtocolVersion()
	 */
	public function setProtocolVersion($version)
	{
		$this->protocolVersion = $version;
	}

	/**
	 * Returns the HTTP protocol version used in the request.
	 * @return string
	 * @see HttpRequest::$protocolVersion
	 * @see HttpRequest::setProtocolVersion()
	 */
	public function getProtocolVersion()
	{
		return $this->protocolVersion;
	}

	/**
	 * Adds a file to be sent with the request.
	 * @param string|File $file File object or path to a file that will be
	 * added.
	 */
	public function addFile($file)
	{
		if(is_string($file))
		{
			if(File::exists($file))
				$file = File::open($file);
			else
				throw new HttpError(Language::getInstance('Http')->getSentence('error.fileNotFound', $file), File::NOT_EXISTS);
		}

		if(is_object($file) && ($file instanceof File))
			$this->files->add($file);
	}

	/**
	 * Sets the argument separator for the HTTP arguments.
	 * @param type $argSeparator Usually & or &amp;. The default is &.
	 */
	public function setArgSeparator($argSeparator)
	{
		$this->argSeparator = $argSeparator;
	}
}
?>