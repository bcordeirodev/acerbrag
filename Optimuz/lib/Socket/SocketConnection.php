<?php
/**
 * This file defines a way to work with socket connections, encapsulating all
 * needed funcions in one object.
 * @version 0.2
 * @package Socket
 */

/**
 * This class is used to open and manipulate socket connections.
 * @author Diego Andrade
 * @package Socket
 * @since Optimuz 0.3
 * @version 0.3.2
 * @uses Core
 * @uses Lang
 */
class SocketConnection extends Object
{
	/**
	 * Could not connect to the server.
	 */
	const CONNECTION_FAILED			= 2500;

	/**
	 * The connection is closed.
	 */
	const CONNECTION_CLOSED			= 2501;

	/**
	 * An error occured during a write operation.
	 */
	const WRITE_ERROR				= 2502;

	/**
	 * An error occured during a read operation.
	 */
	const READ_ERROR				= 2503;

	/**
	 * The protocol used to open the connection is invalid.
	 */
	const INVALID_PROTOCOL			= 2504;

	/**
	 * Could not read and parse the response readers.
	 */
	const READ_HEADERS_ERROR		= 2505;

	/**
	 * The connection expired.
	 */
	const CONNECTION_TIMEOUT		= 2506;

	/**
	 * Buffer size.
	 */
	const BUFFER_SIZE				= 1024;

	/**
	 * Host IP address.
	 *
	 * The IP is setted when the SocketConnection::setHost() method is called.
	 * It cannot be setted directly.
	 * @var string
	 */
	protected $ip					= null;

	/**
	 * Protocol of the connection.
	 * @var string
	 */
	protected $protocol				= null;

	/**
	 * Host address.
	 * @var string
	 */
	protected $host					= null;

	/**
	 * Host port number.
	 * @var int
	 */
	protected $port					= null;

	/**
	 * Timeout in seconds. Default is 60.
	 * @var int
	 */
	protected $timeout				= null;

	/**
	 * Pointer used to read and write to the connection.
	 * @var resource
	 */
	protected $conn					= null;

	/**
	 * Used to check if the connection is opened.
	 * @var bool
	 */
	protected $opened				= null;

	/**
	 * Used to store the results of read operations.
	 * @var string
	 */
	protected $buffer				= null;

	/**
	 * Last response received from the remote server.
	 * @var string
	 */
	protected $rawContent			= null;

	/**
	 * Creates a new socket connection instance.
	 * @param string $host (optional) Host address.
	 * @param int $port (optional) Host port number.
	 * @param string $timeout (optional) Connection timeout in seconds. Default
	 * is 60.
	 * @param string $protocol (optional) Connection protocol.
	 * @todo Implement persistent connection.
	 */
	public function __construct($host = null, $port = null, $timeout = 60, $protocol = null)
	{
		if($host)
			$this->setHost($host);

		if($port)
			$this->setPort($port);

		if($protocol)
			$this->setProtocol($protocol);

		$this->setTimeout($timeout);
		$this->opened = false;
		$this->buffer = '';
	}

	/**
	 * Free any used resource before destructing the object.
	 */
	public function __destruct()
	{
		if($this->isOpened())
			$this->close();
	}

	/**
	 * Sets the server protocol.
	 * @param string $protocol DNS or IP address.
	 * @see SocketConnection::$protocol
	 * @see SocketConnection::getProtocol()
	 */
	public function setProtocol($protocol)
	{
		$this->protocol = empty($protocol) ? '' : "{$protocol}://";
	}

	/**
	 * Returns the server protocol.
	 * @return string Protocol with <code>://</code>, eg, <code>ssl://</code>.
	 * @see SocketConnection::$protocol
	 * @see SocketConnection::setProtocol()
	 */
	public function getProtocol()
	{
		return $this->protocol;
	}

	/**
	 * Sets the server host name.
	 *
	 * If the host name is a DNS record, the IP address will be automaticaly
	 * recovered and stored.
	 * @param string $host DNS or IP address.
	 * @see SocketConnection::$host
	 * @see SocketConnection::$ip
	 * @see SocketConnection::getHost()
	 */
	public function setHost($host)
	{
		$this->host = $host;
		$this->ip = preg_match('/^(\w+:\/\/)?\d+\.\d+\.\d+\.\d+\/?$/', $this->host) ? preg_replace('/^\D+|\/$/', '', $this->host) : gethostbyname($this->host);
	}

	/**
	 * Returns the server host name.
	 * @return string
	 * @see SocketConnection::$host
	 * @see SocketConnection::setHost()
	 */
	public function getHost()
	{
		return $this->host;
	}

	/**
	 * Returns the server IP address.
	 * @return string
	 * @see SocketConnection::$host
	 * @see SocketConnection::$ip
	 * @see SocketConnection::setHost()
	 */
	public function getIp()
	{
		return $this->ip;
	}

	/**
	 * Sets the server port number.
	 * @param int $port Port number.
	 * @see SocketConnection::$port
	 * @see SocketConnection::getPort()
	 */
	public function setPort($port)
	{
		$this->port = $port;
	}

	/**
	 * Returns the server port number.
	 * @return int
	 * @see SocketConnection::$port
	 * @see SocketConnection::setPort()
	 */
	public function getPort()
	{
		return $this->port;
	}

	/**
	 * Sets the connection timeout.
	 * @param int $timeout Timeout in seconds.
	 * @see SocketConnection::$timeout
	 * @see SocketConnection::getTimeout()
	 */
	public function setTimeout($timeout)
	{
		$this->timeout = $timeout;
	}

	/**
	 * Returns the connection timeout in seconds.
	 * @return int
	 * @see SocketConnection::$timeout
	 * @see SocketConnection::setTimeout()
	 */
	public function getTimeout()
	{
		return $this->timeout;
	}

	/**
	 * Returns the raw content of the last response received.
	 * @return string Returns the raw content or null if there was no response
	 * yet.
	 */
	public function getRawContent()
	{
		return $this->rawContent;
	}

	/**
	 * Opens the connection.
	 *
	 * If an error occurs, it will be thrown as a <code>SocketError</code>.
	 * @return boolean Returns true if the connection is openned, or false
	 * otherwise.
	 * @throws SocketError
	 */
	public function open()
	{
		$success = false;
		$errorCode = null;
		$errorMessage = null;

		if(function_exists('stream_socket_client'))
		{
			try
			{
				$this->conn = stream_socket_client("{$this->protocol}{$this->ip}:{$this->port}", $errorCode, $errorMessage, $this->timeout);
			}
			catch(Exception $ex){}
		}
		else
		{
			try
			{
				$this->conn = fsockopen($this->protocol . $this->ip, $this->port, $errorCode, $errorMessage, $this->timeout);
			}
			catch(Exception $ex){}
		}

		if(is_resource($this->conn))
		{
			stream_set_timeout($this->conn, $this->timeout);
			$success = $this->opened = true;
		}
		else
		{
			throw new SocketError(Language::getInstance('Socket')->getSentence('error.openError', $this->host, $this->port, $errorMessage), $errorCode);
		}

		return $success;
	}

	/**
	 * Reads data from the connection.
	 *
	 * The connection will not be closed at the end of the stream. You MUST
	 * close it manualy.
	 *
	 * If this method is called when the connection is closed, an error will be
	 * thrown.
	 * @param int $length (optimal) If specified, data will be truncated at
	 * $length bytes. Otherwise, all available data will be read.
	 * @return string
	 * @see SocketConnection::write()
	 * @see SocketConnection::clearBuffer()
	 * @throws SocketError
	 */
	public function read($length = null)
	{
		if($this->isOpened())
		{
			$response = '';
			$buffer = null;
			$totalRead = 0;
			$continue = true;
			$hasBuffer = ($bufferLength = strlen($this->buffer)) > 0;
			$contentLength = null;
			$headersLength = null;

			if($length > 0)
			{
				if($hasBuffer)
				{
					if(($continue = $length > $bufferLength))
					{
						$length -= $bufferLength;
						$response = $this->buffer;
						$this->buffer = '';
					}
					else
					{
						$response = substr($this->buffer, 0, $length);
						$this->buffer = substr($this->buffer, $length);
					}
				}
			}
			else
			{
				if($hasBuffer)
				{
					$response = $this->buffer;
					$this->buffer = '';
				}
			}

			if($continue)
			{
				stream_set_timeout($this->conn, $this->timeout);
				$initialOffset = ftell($this->conn);

				while(true)
				{
					$buffer = fgetc($this->conn);

					if($buffer === false)
					{
						throw new SocketError(Language::getInstance('Socket')->getSentence('error.connectionEOF', $this->host, $totalRead, $initialOffset), self::CONNECTION_TIMEOUT);
					}
					else
					{
						$response .= $buffer;
						$totalRead = ftell($this->conn) - $initialOffset;
					}

					if($totalRead >= 4 && substr($response, -4) == "\r\n\r\n")
					{
						$headers = $response;
						$headersLength = $totalRead;
						$isConnectionClose = preg_match('#Connection:\s*close#i', $headers);
						$isChunked = preg_match('#Transfer-Encoding:\s*chunked#i', $headers);
						$isGzip = preg_match('#Content-Encoding:\s*gzip#i', $headers);

						if(preg_match('#Content-Length:\s*(\d+)#i', $headers, $matches))
						{
							$contentLength = (int)$matches[1];
							unset($matches);
						}

						unset($headers);
						break;
					}
				}

				if($headersLength > 0)
				{
					$contentRead = 0;

					do
					{
						if(!$isChunked)
						{
							$continue = false;
							$bufferSize = self::BUFFER_SIZE;
							$contentToRead = $contentLength - $contentRead;

							if($contentLength > 0)
							{
								if($bufferSize > $contentToRead)
									$bufferSize = $contentToRead;

								if($this->isAvailable())
								{
									if($bufferSize > 0)
									{
										$buffer = fread($this->conn, $bufferSize);

										if($buffer !== false)
										{
											$response .= $buffer;
											$totalRead = ftell($this->conn) - $initialOffset;
											$contentRead = $totalRead - $headersLength;

											if($isConnectionClose)
											{
												$continue = !feof($this->conn);
											}
											else
											{
												if(is_int($contentLength))
													$continue = $contentRead < $contentLength;
												else
													$continue = true; //TODO check whether this may timeout
											}
										} // error on reading
									}
								}
							}
						}
						else
						{
							$chunkData = '';
							$chunkSize = null;

							do
							{
								$chunkData .= fgetc($this->conn);
							}
							while($this->isAvailable() && (strpos($chunkData, "\r\n") === false));

							if(strpos($chunkData, ' ') !== false)
								$chunkSize = reset((explode(' ', $chunkData, 2)));
							else
								$chunkSize = $chunkData;

							$chunkSize = (int)base_convert($chunkSize, 16, 10);

							if($chunkSize == 0)
							{
								fread($this->conn, 2);
								$totalRead = ftell($this->conn) - $initialOffset;
								$contentRead = strlen($response);
								$continue = false;
							}
							else
							{
								$chunkData = '';
								$chunkDataSize = 0;

								while($this->isAvailable() && ($chunkDataSize < ($chunkSize + 2)))
								{
									$chunkData .= fread($this->conn, $chunkSize - $chunkDataSize + 2);
									$chunkDataSize = strlen($chunkData);
								}

								$response .= substr($chunkData, 0, -2);
								$continue = true;
							}
						}
					}
					while($continue);

					if($isGzip)
					{
						try
						{
							$str = gzinflate(substr($response, 10));
							$response = $str;
						}
						catch(Error $ex)
						{
							if($ex->getCode() != 2) // data error (uncompressed string)
								throw $ex;
						}
					}

					$this->rawContent = $response;

					if($length && ($totalRead > $length))
					{
						$response = substr($response, 0, $length);
						$this->buffer = substr($response, $length);
					}
				}
				else
				{
					throw new SocketError(Language::getInstance('Socket')->getSentence('error.couldNotGetHeaders', $response), self::READ_HEADERS_ERROR);
				}
			}

			return $response;
		}
		else
		{
			throw new SocketError(Language::getInstance('Socket')->getSentence('error.connectionClosed'), self::CONNECTION_CLOSED);
		}
	}

	/**
	 * Checks whether the connection is available for reading from, that is, if
	 * it is open and has not timed out.
	 * @return boolean Returns true if the connection is open, or false
	 * otherwise. Throws an error if the connection timed out.
	 * @throws SocketError
	 */
	public function isAvailable()
	{
		$connectionDetails = stream_get_meta_data($this->conn);
		$isAvailable = true;

		if($connectionDetails['eof'])
			$isAvailable = false;

		if($connectionDetails['timed_out'])
			throw new SocketError(Language::getInstance('Socket')->getSentence('error.timeout'), self::READ_ERROR);

		return $isAvailable;
	}

	/**
	 * Writes data to the connection.
	 *
	 * This method clears the buffer.
	 *
	 * If this method is called when the connection is closed, an error will be
	 * thrown.
	 * @param string $data Data to be written.
	 * @param int $bufferSize (optimal) Chunk size to split the data before
	 * sending. Default is 1024.
	 * @return boolean True on success or false on errors.
	 * @see SocketConnection::read()
	 * @see SocketConnection::clearBuffer()
	 * @throws SocketError
	 */
	public function write($data, $bufferSize = self::BUFFER_SIZE)
	{
		if($this->isOpened())
		{
			$this->clearBuffer();
			$dataLength = strlen($data);
			$totalSent = 0;
			$sent = 0;
			$retry = 0;

			if($dataLength < $bufferSize)
				$bufferSize = $dataLength;

			while($totalSent < $dataLength)
			{
				$buffer = substr($data, $totalSent, $bufferSize);
				$sent = fwrite($this->conn, $buffer);
				$failed = false;

				if($sent > 0)
					$totalSent += $sent;
				elseif($sent === false)
					$failed = true;
				elseif(($sent === 0) && (++$retry == 3))
					$failed = true;

				if($failed)
					throw new SocketError(Language::getInstance('Socket')->getSentence('error.writeError', $totalSent), self::WRITE_ERROR);
			}

			return $totalSent > 0;
		}
		else
		{
			throw new SocketError(Language::getInstance('Socket')->getSentence('error.connectionClosed'), self::CONNECTION_CLOSED);
		}
	}

	/**
	 * Clears the buffer.
	 * @see SocketConnection::read()
	 * @see SocketConnection::write()
	 */
	public function clearBuffer()
	{
		$this->buffer = '';
	}

	/**
	 * Closes the connection.
	 * @see SocketConnection::open()
	 * @see SocketConnection::isOpened()
	 * @throws SocketError
	 */
	public function close()
	{
		if(is_resource($this->conn))
		{
			$this->clearBuffer();
			$this->opened = false;
			fclose($this->conn);
			$this->conn = null;
		}
		else
		{
			throw new SocketError(Language::getInstance('Socket')->getSentence('error.connectionClosed'), self::CONNECTION_CLOSED);
		}
	}

	/**
	 * Blocks the connection.
	 *
	 * See the PHP documentation of stream_set_blocking() for more details.
	 *
	 * If this method is called when the connection is closed, an error will be
	 * thrown.
	 * @return boolean True on success or false on errors.
	 * @see SocketConnection::unblock()
	 * @throws SocketError
	 */
	public function block()
	{
		if($this->isOpened())
			return stream_set_blocking($this->conn, 1);
		else
			throw new SocketError(Language::getInstance('Socket')->getSentence('error.connectionClosed'), self::CONNECTION_CLOSED);
	}

	/**
	 * Unblocks the connection.
	 *
	 * See the PHP documentation of stream_set_blocking() for more details.
	 *
	 * If this method is called when the connection is closed, an error will be
	 * thrown.
	 * @return boolean True on success or false on errors.
	 * @see SocketConnection::block()
	 * @throws SocketError
	 */
	public function unblock()
	{
		if($this->isOpened())
			return stream_set_blocking($this->conn, 0);
		else
			throw new SocketError(Language::getInstance('Socket')->getSentence('error.connectionClosed'), self::CONNECTION_CLOSED);
	}

	/**
	 * Checks if the connection is opened.
	 * @return bool
	 * @see SocketConnection::open()
	 * @see SocketConnection::$conn
	 */
	public function isOpened()
	{
		return $this->opened && is_resource($this->conn) && !feof($this->conn);
	}

	/**
	 * Enable or disable the encryption on the current connection. The
	 * encryption method can be choosen by giving it with the $cryptoType param.
	 * @param boolean $enable True to enable or false to disable.
	 * @param int $cryptoType The encryption method that will be used. Must be
	 * one of the STREAM_CRYPTO_METHOD_* constants.
	 * @return boolean Return true on success or false on errors.
	 */
	public function enableEncryption($enable, $cryptoType)
	{
		return stream_socket_enable_crypto($this->conn, $enable, $cryptoType);
	}
}
?>