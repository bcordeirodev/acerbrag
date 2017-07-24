<?php
/**
 * This file defines a class to send e-mails directly to SMTP servers,
 * supporting SMTP authentication, ESMTP and others features.
 * @version 0.1
 * @package Email
 */

/**
 * This class authenticates in SMTP servers to send e-mails.
 * @author Diego Andrade
 * @package Email
 * @since Optimuz 0.3
 * @version 0.2
 * @uses Core
 * @uses Lang
 * @uses Socket
 * @uses Strings.Text
 * @todo Implement methods for specific commands, like: SmtpServer::turn(),
 * SmtpServer::rcpt() and so on.
 */
class SmtpServer extends Object
{
	/**
	 * Could not connect to the SMTP server.
	 */
	const CONNECTION_FAILED		= 2400;

	/**
	 * The connection to the SMTP server is closed.
	 */
	const CONNECTION_CLOSED		= 2401;

	/**
	 * Couldn't start a TLS transaction.
	 */
	const UNABLE_START_TLS		= 2402;

	/**
	 * Couldn't enable TLS encryption.
	 */
	const UNABLE_ENABLE_TLS		= 2403;

	/**
	 * Use SSL on connection with the SMTP server.
	 */
	const SECURITY_SSL			= 'ssl';

	/**
	 * Use TSL on connection with the SMTP server.
	 */
	const SECURITY_TLS			= 'tls';

	/**
	 * Host address.
	 * @var string
	 */
	private $host				= null;

	/**
	 * Host port number.
	 * @var int
	 */
	private $port				= null;

	/**
	 * User name.
	 * @var string
	 */
	private $user				= null;

	/**
	 * Password.
	 * @var string
	 */
	private $pwd				= null;

	/**
	 * Timeout in seconds. Default is 30.
	 * @var int
	 */
	private $timeout			= null;

	/**
	 * Socket connection used to exchange data with the SMTP server.
	 * @var SmtpConnection
	 */
	private $connection			= null;

	/**
	 * Array with all responses received from SMTP server in the last
	 * connection.
	 * @var array
	 */
	private $messages			= null;

	/**
	 * SMTP response codes.
	 * @var array
	 * @static
	 */
	private static $codes		= array(
		'NO_RESPONSE'				=> 0,   // Response not received
		'STATUS_HELP'				=> 211, // System status/help
		'HELP'						=> 214, // Help message
		'SERVER_READY'				=> 220, // Server ready
		'QUIT'						=> 221, // Ending conversation
		'SUCCESSFUL_AUTH'			=> 235, // Authentication successful
		'OK'						=> 250, // Action completed
		'FORWARDING'				=> 251, // User not local, but message will be forwarded to correct host
		'LOGIN_INFO'				=> 334, // Waiting for login info (username or password)
		'DATA_READY'				=> 354, // Ready for DATA
		'SHUTDOWN'					=> 421, // Server will shut down
		'MAILBOX_BUSY'				=> 450, // Mailbox is busy
		'SERVER_ERROR'				=> 451, // Action not completed, some error in mail server
		'SERVER_OUT_STORAGE'		=> 452, // Action not completed, the mail server ran out of system storage
		'COMMAND_SYNTAX_ERROR'		=> 500, // Command with syntax error
		'PARAM_SYNTAX_ERROR'		=> 501, // Parameters with syntax error
		'COMMAND_NOT_IMPLEMENTED'	=> 502, // Command not implemented by server
		'COMMAND_OUT_SEQUENCE'		=> 503, // Command out of sequence
		'PARAM_NOT_IMPLEMENTED'		=> 504, // Parameter not implemented by server
		'CANNOT_ACCESS_MAILBOX'		=> 550, // Mailbox cannot be found or cannot be accessed
		'NOT_FORWARDING'			=> 551, // User not local, try to send again to the right path
		'MAILBOX_FULL'				=> 552, // Mailbox is full
		'MAILBOX_INCORRECT'			=> 553, // Mailbox syntactically incorrect
		'MAILBOX_UNKNOWN_ERROR'		=> 554  // Mailbox failed with unknown error
	);

	/**
	 * Index of the last command sent to the SMTP server.
	 * @var int
	 */
	private $lastCommandIndex	= null;

	/**
	 * Defines if the SMTP server supports the ESMTP commands.
	 * @var bool
	 */
	private $acceptESMTP		= null;

	/**
	 * Name of the local host.
	 * @var string
	 */
	private $localHost			= null;

	/**
	 * Encryption to use on the connection with the SMTP server.
	 * @var string
	 */
	private $security			= null;

	/**
	 * Creates a new SMTP server instance.
	 * @param string $host (optimal) Host address.
	 * @param int $port (optimal) Host port number.
	 * @param string $user (optimal) User name used to authenticate.
	 * @param string $pwd (optimal) User password.
	 */
	public function __construct($host = null, $port = null, $user = null, $pwd = null)
	{
		$this->host = $host;
		$this->port = $port;
		$this->user = $user;
		$this->pwd = $pwd;
		$this->timeout = LocalConfiguration::get('smtp.timeout');
		$this->acceptESMTP = false;
		$this->localHost = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';

		if(!Load::isLoaded('SmtpConnection'))
			Load::package('Socket');
	}

	/**
	 * Sets the server host name.
	 * @param string $host DNS or IP address.
	 * @see SmtpServer::$host
	 * @see SmtpServer::getHost()
	 */
	public function setHost($host)
	{
		$this->host = $host;
	}

	/**
	 * Returns the server host name.
	 * @return string
	 * @see SmtpServer::$host
	 * @see SmtpServer::setHost()
	 */
	public function getHost()
	{
		return $this->host;
	}

	/**
	 * Sets the server port number.
	 * @param int $port Port number.
	 * @see SmtpServer::$port
	 * @see SmtpServer::getPort()
	 */
	public function setPort($port)
	{
		$this->port = $port;
	}

	/**
	 * Returns the server port number.
	 * @return int
	 * @see SmtpServer::$port
	 * @see SmtpServer::setPort()
	 */
	public function getPort()
	{
		return $this->port;
	}

	/**
	 * Sets the server user name.
	 * @param string $user User name.
	 * @see SmtpServer::$user
	 * @see SmtpServer::getUser()
	 */
	public function setUser($user)
	{
		$this->user = $user;
	}

	/**
	 * Returns the server user name.
	 * @return string
	 * @see SmtpServer::$user
	 * @see SmtpServer::setUser()
	 */
	public function getUser()
	{
		return $this->user;
	}

	/**
	 * Sets the user password.
	 * @param string $pwd Password.
	 * @see SmtpServer::$pwd
	 * @see SmtpServer::getPassword()
	 */
	public function setPassword($pwd)
	{
		$this->pwd = $pwd;
	}

	/**
	 * Returns the user password.
	 * @return string
	 * @see SmtpServer::$pwd
	 * @see SmtpServer::setPassword()
	 */
	public function getPassword()
	{
		return $this->pwd;
	}

	/**
	 * Sets the connection timeout.
	 * @param int $timeout Timeout in seconds.
	 * @see SmtpServer::$timeout
	 * @see SmtpServer::getTimeout()
	 */
	public function setTimeout($timeout)
	{
		$this->timeout = $timeout;
	}

	/**
	 * Returns the connection timeout in seconds.
	 * @return int
	 * @see SmtpServer::$timeout
	 * @see SmtpServer::setTimeout()
	 */
	public function getTimeout()
	{
		return $this->timeout;
	}

	/**
	 * Sets the connection object.
	 * @param SmtpConnection $connection Timeout in seconds.
	 * @see SmtpServer::$connection
	 * @see SmtpServer::getConnection()
	 */
	public function setConnection($connection)
	{
		$this->connection = $connection;
	}

	/**
	 * Returns the connection object.
	 * @return SmtpConnection
	 * @see SmtpServer::$connection
	 * @see SmtpServer::setConnection()
	 */
	public function getConnection()
	{
		return $this->connection;
	}

	/**
	 * Sets the local host name.
	 * @param string $host Host name.
	 * @see SmtpServer::$localHost
	 * @see SmtpServer::getLocalHost()
	 */
	public function setLocalHost($host)
	{
		$this->localHost = $host;
	}

	/**
	 * Returns the local host name.
	 * @return string
	 * @see SmtpServer::$localHost
	 * @see SmtpServer::setLocalHost()
	 */
	public function getLocalHost()
	{
		return $this->localHost;
	}

	/**
	 * Sets the encryption to use on the connection with the SMTP server.
	 * @param string $security One of the constants: SmtpServer::SECURITY_SSL or
	 * SmtpServer::SECURITY_TLS.
	 */
	public function setSecurity($security)
	{
		$this->security = $security;
	}

	/**
	 * Returns the encryption to use on the connection with the SMTP server.
	 * @return string One of the constants: SmtpServer::SECURITY_SSL or
	 * SmtpServer::SECURITY_TLS.
	 */
	public function getSecurity()
	{
		return $this->security;
	}

	/**
	 * Opens the connection to the SMTP server.
	 * @return bool True on success or false on errors.
	 * @throws EmailError
	 */
	public function openConnection()
	{
		$success = false;
		$this->messages = array();
		$this->lastCommandIndex = -1;
		$this->acceptESMTP = false;

		if(is_null($this->connection))
		{
			switch($this->security)
			{
				case self::SECURITY_SSL:
					$schema = 'ssl';
					break;
				case self::SECURITY_TLS:
				default:
					$schema = '';
					break;
			}

			$this->connection = new SmtpConnection($this->host, $this->port, $this->timeout, $schema);
		}

		if(!$this->connection->isOpened() ? !$this->connection->open() : false)
		{
			throw new EmailError(Language::getCurrent()->getSentence('error.smtp.connectionFailed') . ': ' . $this->connection->getError()->getMessage(), self::CONNECTION_FAILED);
		}
		else
		{
			$this->messages[++$this->lastCommandIndex] = array('command' => 'OPEN_CONNECTION', 'response' => null);
			$this->messages[$this->lastCommandIndex]['response'] = $this->getLastResponse();

			if($this->isCommandSuccess())
			{
				if($this->command("EHLO {$this->localHost}"))
				{
					$success = true;
					$this->acceptESMTP = true;
				}
				else
				{
					$success = $this->command("HELO {$this->localHost}");
				}

				if($success && ($this->security == self::SECURITY_TLS))
				{
					if($this->command('STARTTLS'))
					{
						if($this->connection->enableEncryption(true, STREAM_CRYPTO_METHOD_TLS_CLIENT))
						{
							if($this->acceptESMTP)
								$success = $this->command("EHLO {$this->localHost}");
							else
								$success = $this->command("HELO {$this->localHost}");
						}
						else
						{
							$success = false;
							throw new EmailError(Language::getCurrent()->getSentence('error.smtp.enableTlsFailed'), self::UNABLE_ENABLE_TLS);
						}
					}
					else
					{
						$success = false;
						throw new EmailError(Language::getCurrent()->getSentence('error.smtp.startTlsFailed') . ": {$this->getLastResponse()}", self::UNABLE_START_TLS);
					}
				}
			}
			else
			{
				throw new EmailError(Language::getCurrent()->getSentence('error.smtp.connectionFailed') . ": {$this->getLastResponse()}", self::CONNECTION_FAILED);
			}
		}

		return $success;
	}

	/**
	 * Tries to authenticate in the SMTP server.
	 * @return bool
	 * @throws EmailError
	 */
	public function authenticate()
	{
		$success = false;
		$errMsg = Language::getCurrent()->getSentence('error.smtp.connectionFailed');

		if($this->connection->isOpened())
		{
			if($this->command("AUTH LOGIN"))
			{
				if($this->command(base64_encode($this->user)))
				{
					if($this->command(base64_encode($this->pwd)))
						$success = true;
					else
						throw new EmailError("[4] {$errMsg}: {$this->getLastResponse()}", self::CONNECTION_FAILED);
				}
				else
				{
					throw new EmailError("[3] {$errMsg}: {$this->getLastResponse()}", self::CONNECTION_FAILED);
				}
			}
			else
			{
				throw new EmailError("[2] {$errMsg}: {$this->getLastResponse()}", self::CONNECTION_FAILED);
			}
		}
		else
		{
			throw new EmailError("[1] {$errMsg}: {$this->getLastResponse()}", self::CONNECTION_CLOSED);
		}

		return $success;
	}

	/**
	 * Sends a command to the SMTP server and returns a bool indicating the
	 * success or failure.
	 *
	 * The End-Of-Line (EOL) characeters are automaticaly appended at the end of
	 * the command, so you don't need to write "DATA\r\n", only "DATA".
	 *
	 * After the command is sent, the methods SmtpServer::getLastResponse() and
	 * SmtpServer::isCommandSuccess() are automaticaly called, so you don't need
	 * to call them separately.
	 *
	 * If an error occurs, it is stored in the SmtpServer::$error.
	 * @param string $command A raw SMTP command.
	 * @return bool Returns true on success. On errors an exception is thrown.
	 * @throws EmailError
	 */
	public function command($command)
	{
		$success = false;

		$this->messages[++$this->lastCommandIndex] = array('command' => $command, 'response' => null);
		$this->connection->write($command . Enviroment::WINDOWS_EOL);
		$response = $this->getLastResponse();

		if($this->isCommandSuccess())
			$success = true;
		else
			throw new EmailError(Language::getCurrent()->getSentence('error.smtp.connectionFailed') . ": {$response}", self::CONNECTION_FAILED);

		return $success;
	}

	/**
	 * Reads and returns the response for the last command sent to the server.
	 * @return string
	 * @todo Add verification against response codes 251 and 551.
	 */
	public function getLastResponse()
	{
		$response = null;

		if(is_null($this->messages[$this->lastCommandIndex]['response']))
		{
			$response = $this->connection->read();
			$this->messages[$this->lastCommandIndex]['response'] = $response;
		}
		else
		{
			$response = $this->messages[$this->lastCommandIndex]['response'];
		}

		return $response;
	}

	/**
	 * Checks if the response of the last command sent is a good response, ie,
	 * the command was executed with success on server.
	 * @return bool
	 */
	public function isCommandSuccess()
	{
		$code = Text::substring($this->getLastResponseCode(), 0, 3);
		$success = false;

		switch($code)
		{
			case self::$codes['SERVER_READY']:
			case self::$codes['OK']:
			case self::$codes['STATUS_HELP']:
			case self::$codes['HELP']:
			case self::$codes['DATA_READY']:
			case self::$codes['QUIT']:
			case self::$codes['LOGIN_INFO']:
			case self::$codes['SUCCESSFUL_AUTH']:
				$success = true;
				break;
		}

		return $success;
	}

	/**
	 * Returns the code from a server response.
	 * @param string $response (optimal) A response received from the server. If
	 * null, the last one will be used.
	 * @return int Returns the response code or zero if there is no response
	 * yet.
	 */
	public function getLastResponseCode($response = null)
	{
		if(is_null($response))
			$response = $this->getLastResponse();

		return $response ? (int)substr($response, 0, 3) : 0;
	}

	/**
	 * Closes the current connection.
	 */
	public function closeConnection()
	{
		if($this->connection->isOpened())
			$this->connection->close();
	}

	/**
	 * Returns an array with all messages exchanged with the SMTP server in the
	 * last opened connection.
	 * @return array
	 */
	public function getMessages()
	{
		return $this->messages;
	}

	/**
	 * Returns a bool indicating if the connected SMTP server has support to
	 * ESMTP.
	 *
	 * This verification is done in the SmtpServer::openConnection() method.
	 * @return bool
	 * @see SmtpServer::openConnection()
	 * @see SmtpServer::$acceptESMTP
	 */
	public function isEsmtp()
	{
		return $this->acceptESMTP;
	}
}
?>