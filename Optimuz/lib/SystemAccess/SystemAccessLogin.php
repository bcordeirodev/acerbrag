<?php
/**
 * This file is used to handle system accesses.
 * @version 0.1
 * @package SystemAccess
 */

/**
 * Class used to control users logins in the system. Each login is related to a
 * role, defined in the class SystemAccessRole.
 * @author Diego Andrade
 * @package SystemAccess
 * @since Optimuz 0.3
 * @version 0.3
 * @uses Collection
 * @uses Session
 * @uses Strings
 * @uses Http.Cookies
 */
class SystemAccessLogin
{

	/**
	 * The specified role is invalid.
	 */
	const INVALID_ROLE					= 2803;

	/**
	 * User name.
	 * @var string
	 */
	protected $name						= null;

	/**
	 * Role related to this login.
	 * @var SystemAccessRole
	 * @see SystemAccessLogin::getRole()
	 */
	protected $role						= null;

	/**
	 * Permissions related to this login.
	 * @var ArrayList
	 * @see SystemAccessLogin::addPermission()
	 * @see SystemAccessLogin::getPermission()
	 * @see SystemAccessLogin::getPermissions()
	 */
	protected $permissions				= null;

	/**
	 * Array of values that can be stored in session.
	 * @var ArrayList
	 * @see SystemAccessLogin::setValue()
	 * @see SystemAccessLogin::getValue()
	 * @see SystemAccessLogin::hasValue()
	 * @see SystemAccessLogin::removeValue()
	 */
	protected $data						= null;

	/**
	 * Whether to persist the login or not.
	 *
	 * If this is setted and if the user closes the broser window without
	 * logout, when he comes back his login will still be active, so he does not
	 * need to login again.
	 * @var SystemAccessPersistence
	 */
	protected $persistence				= null;

	/**
	 * Instance of the primary SystemAccessLogin session. To avoid errors,
	 * before creating a new session with SystemAccessLogin::save(), close any
	 * existing session calling SystemAccessLogin::close().
	 * @var SystemAccessLogin
	 * @see SystemAccessLogin::save()
	 * @see SystemAccessLogin::close()
	 * @see SystemAccessLogin::restore()
	 * @static
	 */
	protected static $session			= null;

	/**
	 * Creates a new SystemAccessLogin instance to handle the user's login.
	 * @param string $name User name.
	 */
	public function __construct($name)
	{
		$this->name = $name;
		$this->data = new ArrayList();
		$this->permissions = new ArrayList();
	}

	/**
	 * Sets the role related to the login.
	 * @param SystemAccessRole|int|string $role A SystemAccessRole object, the
	 * index or the name of a valid role defined by the application's roles.xml.
	 * @see SystemAccessLogin::$role
	 * @see SystemAccessLogin::getRole()
	 */
	public function setRole($role)
	{
		$roleObj = null;

		if(is_object($role))
			$roleObj = $role;
		elseif(is_integer($role) || is_string($role))
			$roleObj = SystemAccessManager::getConfiguration()->getRole($role);

		if($roleObj instanceof SystemAccessRole)
			$this->role = $roleObj;
		else
			throw new SystemAccessError(Language::getInstance('SystemAccess')->getSentence('error.invalidRole', $role), self::INVALID_ROLE);
	}

	/**
	 * Returns the role object related to the login.
	 * @return SystemAccessRole
	 * @see SystemAccessLogin::$role
	 * @see SystemAccessLogin::setRole()
	 */
	public function getRole()
	{
		return $this->role;
	}

	/**
	 * Adds a new permission for the current login.
	 * @param SystemAccessPermission $permission Permission object.
	 */
	public function addPermission(SystemAccessPermission $permission)
	{
		$this->permissions->addKey($permission->getId(), $permission);
	}

	/**
	 * Returns a permission. If the permission does not exist, a null value will
	 * be returned.
	 * @param mixed $permission Permission ID or the permission name.
	 * @return SystemAccessPermission
	 */
	public function getPermission($permission)
	{
		$permissionObj = null;

		if(is_numeric($permission))
		{
			foreach($this->permissions as $obj)
			{
				if($obj->getId() == $permission)
				{
					$permissionObj = $obj;
					break;
				}
			}
		}
		elseif(is_string($permission))
		{
			foreach($this->permissions as $obj)
			{
				if($obj->getName() == $permission)
				{
					$permissionObj = $obj;
					break;
				}
			}
		}

		return $permissionObj;
	}

	/**
	 * Returns all permissions of the current login.
	 * @return ArrayList
	 */
	public function getPermissions()
	{
		return $this->permissions;
	}

	/**
	 * Adds a value to be stored with the login.
	 * @param string $name Name of the value.
	 * @param mixed $value Value itself.
	 * @see SystemAccessLogin::$data
	 * @see SystemAccessLogin::getValue()
	 * @see SystemAccessLogin::hasValue()
	 * @see SystemAccessLogin::removeValue()
	 */
	public function setValue($name, $value)
	{
		$this->data[$name] = $value;
	}

	/**
	 * Returns a value from the login.
	 *
	 * If the value was not setted, a null is returned.
	 * @return mixed
	 * @see SystemAccessLogin::$data
	 * @see SystemAccessLogin::setValue()
	 * @see SystemAccessLogin::hasValue()
	 * @see SystemAccessLogin::removeValue()
	 */
	public function getValue($name)
	{
		return isset($this->data[$name]) ? $this->data[$name] : null;
	}

	/**
	 * Checks whether a value is set in the login.
	 * @return boolean Returns true if the value exists, or false otherwise.
	 * @see SystemAccessLogin::$data
	 * @see SystemAccessLogin::setValue()
	 * @see SystemAccessLogin::getValue()
	 * @see SystemAccessLogin::removeValue()
	 */
	public function hasValue($name)
	{
		return isset($this->data[$name]);
	}

	/**
	 * Removes a value from the login.
	 * @see SystemAccessLogin::$data
	 * @see SystemAccessLogin::setValue()
	 * @see SystemAccessLogin::getValue()
	 * @see SystemAccessLogin::hasValue()
	 */
	public function removeValue($name)
	{
		if($this->hasValue($name))
			unset($this->data[$name]);
	}

	/**
	 * Sets whether a persistence object to persist the user login. This way,
	 * the login will remain active if the user leave the application without
	 * logout.
	 * @param SystemAccessPersistence $persistence Persistence object. If a null
	 * value is given, the persistence will be disabled.
	 * @see SystemAccessLogin::$persistence
	 * @see SystemAccessLogin::getPersistence()
	 */
	public function setPersistence(SystemAccessPersistence $persistence)
	{
		$this->persistence = $persistence;
	}

	/**
	 * Returns the persistence object for the user login.
	 * @return SystemAccessPersistence
	 * @see SystemAccessLogin::$persistence
	 * @see SystemAccessLogin::setPersistence()
	 */
	public function getPersistence()
	{
		return $this->persistence;
	}

	/**
	 * Saves the login object to session.
	 *
	 * The object is first serialized and then saved to the session. This can
	 * be done how many times is needed, to save the login information.
	 * @see SystemAccessLogin::$loginName
	 * @see SystemAccessLogin::hasSession()
	 * @see SystemAccessLogin::restore()
	 */
	public function save()
	{
		Session::set(self::getLoginName(), serialize($this));
		self::$session = $this;

		// persist the login
		if(isset($this->persistence))
			$this->persistence->save();
	}

	/**
	 * Closes the user session.
	 */
	public function close()
	{
		// destroy the persistent data
		if(isset($this->persistence))
			$this->persistence->destroy();

		Session::remove(self::getLoginName());
		self::$session = null;
	}

	/**
	 * Restores the login object from session.
	 *
	 * The object is returned unserialized, but if it was not saved yet, a null
	 * value will be returned.
	 * @return SystemAccessLogin
	 * @static
	 * @see SystemAccessLogin::$loginName
	 * @see SystemAccessLogin::hasSession()
	 * @see SystemAccessLogin::save()
	 */
	public static function restore()
	{
		if(self::hasSession())
		{
			if(is_null(self::$session))
				self::$session = unserialize(Session::get(self::getLoginName()));
		}

		return self::$session;
	}

	/**
	 * Returns whether there is a login saved in the current session. Only one
	 * login can be saved per session at a time.
	 * @return bool
	 * @static
	 * @see SystemAccessLogin::$loginName
	 * @see SystemAccessLogin::save()
	 * @see SystemAccessLogin::restore()
	 */
	public static function hasSession()
	{
		return Session::exists(self::getLoginName());
	}

	/**
	 * Returns the name used to save the login to the session. It uses the
	 * application name to compose the login name.
	 * @return string
	 * @static
	 */
	public static function getLoginName()
	{
		return 'SystemAccessLogin_' . Application::getCurrent()->getName();
	}

	/**
	 * Returns the current login object. This is an alias for
	 * SystemAccessManager::getLogin().
	 * @return string
	 * @static
	 * @see SystemAccessManager::getLogin()
	 */
	public static function getCurrent()
	{
		return SystemAccessManager::getLogin();
	}

	/**
	 * Checks whether the logged user is an admin. This can be set
	 * programaticaly or in the application's roles.xml.
	 * @return bool
	 */
	public static function isAdmin()
	{
		return self::getCurrent()->getRole()->getIsAdmin();
	}
}
?>