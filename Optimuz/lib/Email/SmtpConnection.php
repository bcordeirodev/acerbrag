<?php
/**
 * This file defines a way to work with socket connections, encapsulating all
 * needed funcions in one object.
 * @version 0.1
 * @package Email
 */

/**
 * This class is used to open and manipulate socket connections for SMTP
 * communication.
 * @author Diego Andrade
 * @package Email
 * @since Optimuz 0.4
 * @version 0.1.1
 * @uses Core
 * @uses Lang
 * @uses Socket
 */
class SmtpConnection extends SocketConnection
{
	/**
	 * Reads data from the connection. It does almost the same of
	 * <code>SocketConnection::read()</code>, the only difference being the
	 * method used to check if there's data on the stream to read.
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

				do
				{
					$continue = false;
					$buffer = fgets($this->conn, self::BUFFER_SIZE);
					$connectionDetails = stream_get_meta_data($this->conn);

					if($buffer === false)
					{
						break;
					}
					else
					{
						$response .= $buffer;
						$totalRead += strlen($buffer);
						$continue = $connectionDetails['unread_bytes'] > 0;
					}

					if($connectionDetails['eof'])
						break;

					if($connectionDetails['timed_out'])
						throw new SocketError(Language::getInstance('Socket')->getSentence('error.timeout'), self::READ_ERROR);
				}
				while(!feof($this->conn) && $continue);

				if($length && ($totalRead > $length))
				{
					$response = substr($response, 0, $length);
					$this->buffer = substr($response, $length);
				}
			}

			return $response;
		}
		else
		{
			throw new SocketError(Language::getInstance('Socket')->getSentence('error.connectionClosed'), self::CONNECTION_CLOSED);
		}
	}
}
?>