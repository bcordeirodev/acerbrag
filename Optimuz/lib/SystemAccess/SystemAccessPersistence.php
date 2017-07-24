<?php
/**
 * This file is used to handle system accesses.
 * @version 0.1
 * @package SystemAccess
 */

/**
 * Class used to set the data and time used to persist the user login.
 * @author Diego Andrade
 * @package SystemAccess
 * @since Optimuz 0.3
 * @version 0.2
 */
class SystemAccessPersistence
{
	/**
	 * Information used to recover the user login. Usually this is the user ID
	 * on database.
	 * @var mixed
	 */
	protected $data				= null;

	/**
	 * Time that the login can persist.
	 * @var mixed
	 */
	protected $time				= null;

	/**
	 * Empty constructor, only creates a new class instance.
	 */
	public function __construct()
	{
	}

	/**
	 * Sets the information used to recover the user login. Usually this is the
	 * user ID on database.
	 * @param mixed $data Information used to identify the user and recover his
	 * session.
	 * @see SystemAccessPersistence::$data
	 * @see SystemAccessPersistence::getData()
	 */
	public function setData($data)
	{
		$this->data = $data;
	}

	/**
	 * Returns the information used to recover the user login. Usually this is
	 * the user ID on database.
	 * @return mixed
	 * @see SystemAccessPersistence::$data
	 * @see SystemAccessPersistence::setData()
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	 * Sets the time that the login can persist.
	 * @param mixed $time Time when the persistence of the login will finish. It
	 * can be an integer (timestamp), a string representing a date, a Date
	 * object or a TimeSpan object.
	 * @see SystemAccessPersistence::$time
	 * @see SystemAccessPersistence::getTime()
	 */
	public function setTime($time)
	{
		$this->time = $time;
	}

	/**
	 * Returns the time that the login can persist.
	 * @return mixed
	 * @see SystemAccessPersistence::$time
	 * @see SystemAccessPersistence::setTime()
	 */
	public function getTime()
	{
		return $this->time;
	}

	/**
	 * Returns the cookie name used by the persistence object. It uses the
	 * application name to compose this name.
	 * @return string
	 * @static
	 */
	public static function getPersistenceName()
	{
		return Text::slug('persist_' . Application::getCurrent()->getName() . '_' . CurrentHttpRequest::getInstance()->getHost(), true, '_');
	}

	/**
	 * Saves the persistent data.
	 */
	public function save()
	{
		$cookieName = self::getPersistenceName();

		if(!Cookie::exists($cookieName))
		{
			$hash = sha1(uniqid(microtime(), true));
//			setcookie($cookieName, $hash, $this->time->getTimestamp(), '/');
			$cookie = Cookie::create($cookieName, $hash, $this->time);
			$cookie->setPath('/');
//			$cookie->setDomain(CurrentHttpRequest::getInstance()->getHost());
			$cookie->save();

			$hashFilePath = Application::getCurrent()->getPath('temp') . "$hash.persist";
			$hashFile = File::create($hashFilePath);
			$hashFile->write("{$this->data},{$this->time}");
			$hashFile->close();
		}
	}

	/**
	 * Destroys the persistent data.
	 */
	public function destroy()
	{
		$cookieName = self::getPersistenceName();

		if(Cookie::exists($cookieName))
		{
			$cookie = Cookie::restore($cookieName);

			if(!empty($cookie))
			{
				$hash = $cookie->getValue();
				$cookie->remove();
			}

			$hashFilePath = Application::getCurrent()->getPath('temp') . "{$hash}.persist";

			if(File::exists($hashFilePath))
				File::remove($hashFilePath);
		}
	}

	/**
	 * Returns whether there is a persistence data on which a login can be
	 * restored.
	 * @return bool
	 */
	public static function canRecover()
	{
		return Cookie::exists(self::getPersistenceName());
	}

	/**
	 * Recovers the persistence object used to persist the login. The restored
	 * object has the data used to identify the user.
	 *
	 * If there is no data available to recover, a null value is returned.
	 * @return SystemAccessPersistence
	 */
	public static function recover()
	{
		$persistence = null;
		$hash = Cookie::get(self::getPersistenceName());
		$hashFilePath = Application::getCurrent()->getPath('temp') . "$hash.persist";

		if(File::exists($hashFilePath))
		{
			$data = explode(',', File::open($hashFilePath)->read());
			$persistence = new self();
			$persistence->setData($data[0]);
			$persistence->setTime($data[1]);
		}

		return $persistence;
	}
}
?>