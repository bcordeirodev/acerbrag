<?php
/**
 * This file sets a class to work with HTTP requests.
 * @version 0.3
 * @package Http
 */

/**
 * This class is used to set a proxy for HTTP requests. All information needed
 * to login into the proxy are stored here.
 * @author Diego Andrade
 * @package Http
 * @since Optimuz 0.3
 * @version 0.1
 */
class HttpProxyAuthentication extends Object
{
	/**
	 * Proxy host name.
	 * @var string
	 */
	protected $host				= null;

	/**
	 * Proxy port number.
	 * @var int
	 */
	protected $port				= null;

	/**
	 * Proxy user name.
	 * @var string
	 */
	protected $user				= null;

	/**
	 * User password.
	 * @var string
	 */
	protected $pwd				= null;
	
	/**
	 * Creates a new class instance.
	 * @param string $host (optimal) Proxy host.
	 * @param int $port (optimal) Proxy port.
	 * @param string $user (optimal) Proxy user.
	 * @param string $pwd (optimal) User password.
	 */
	public function __construct($host = null, $port = null, $user = null, $pwd = null)
	{
		$this->host = $host;
		$this->port = $port;
		$this->user = $user;
		$this->pwd = $pwd;
	}

	/**
	 * Sets the proxy host name.
	 * @param string $host Host name.
	 * @see HttpProxyAuthentication::$host
	 * @see HttpProxyAuthentication::getHost()
	 */
	public function setHost($host)
	{
		$this->host = $host;
	}

	/**
	 * Returns the proxy host name.
	 * @return string
	 * @see HttpProxyAuthentication::$host
	 * @see HttpProxyAuthentication::setHost()
	 */
	public function getHost()
	{
		return $this->host;
	}

	/**
	 * Sets the proxy port number.
	 * @param int $port Proxy port number.
	 * @see HttpProxyAuthentication::$port
	 * @see HttpProxyAuthentication::getPort()
	 */
	public function setPort($port)
	{
		$this->port = $port;
	}

	/**
	 * Returns the proxy port number.
	 * @return int
	 * @see HttpProxyAuthentication::$port
	 * @see HttpProxyAuthentication::setPort()
	 */
	public function getPort()
	{
		return $this->port;
	}

	/**
	 * Sets the proxy user.
	 * @param string $user Proxy user.
	 * @see HttpProxyAuthentication::$user
	 * @see HttpProxyAuthentication::getUser()
	 */
	public function setUser($user)
	{
		$this->user = $user;
	}

	/**
	 * Returns the proxy user.
	 * @return string
	 * @see HttpProxyAuthentication::$user
	 * @see HttpProxyAuthentication::setUser()
	 */
	public function getUser()
	{
		return $this->user;
	}

	/**
	 * Sets the user password.
	 * @param string $pwd User password.
	 * @see HttpProxyAuthentication::$pwd
	 * @see HttpProxyAuthentication::getPassword()
	 */
	public function setPassword($pwd)
	{
		$this->pwd = $pwd;
	}

	/**
	 * Returns the user password.
	 * @return string
	 * @see HttpProxyAuthentication::$pwd
	 * @see HttpProxyAuthentication::setPassword()
	 */
	public function getPassword()
	{
		return $this->pwd;
	}
}
?>