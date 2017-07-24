<?php
/**
 * This file is used to handle system accesses.
 * @version 0.4
 * @package SystemAccess
 */

/**
 * Class used to manage all global tasks about the system accesses. It
 * initializes all configuration and set the roles for the users.
 * @author Diego Andrade
 * @package SystemAccess
 * @since Optimuz 0.3
 * @version 0.4
 * @static
 * @uses IO
 * @uses Core
 * @uses Lang
 * @uses Session
 * @uses Strings.Text
 */
class SystemAccessManager
{
	/**
	 * There was some error while trying to load the roles file.
	 */
	const LOAD_ROLES_ERROR						= 2800;

	/**
	 * There was some error while trying to load the site navigation file.
	 */
	const LOAD_SITE_NAVIGATION_ERROR			= 2801;

	/**
	 * The specified validation type is invalid.
	 */
	const INVALID_VALIDATION_TYPE_ERROR			= 2802;

	/**
	 * The specified handler is invalid.
	 */
	const INVALID_HANDLER_ERROR					= 2803;

	/**
	 * There was some error while trying to load the configuration from the
	 * database.
	 */
	const LOAD_DATABASE_ERROR					= 2804;

	/**
	 * Some settings are missing for the database models.
	 */
	const MISSING_MODEL_ERROR					= 2805;

	/**
	 * There was some error while trying to load the permissions file.
	 */
	const LOAD_PERMISSIONS_ERROR				= 2806;

	/**
	 * The custom validator is invalid (does not exist or does not have the
	 * required method).
	 */
	const INVALID_CUSTOM_VALIDATOR				= 2807;

	/**
	 * Global object used to store the settings about the access to the system.
	 * @var SystemAccessConfiguration
	 * @static
	 */
	protected static $configuration				= null;

	/**
	 * Defines whether the roles are loaded.
	 * @var bool
	 * @static
	 */
	protected static $rolesLoaded				= false;

	/**
	 * Defines whether the permissions are loaded.
	 * @var bool
	 * @static
	 */
	protected static $permissionsLoaded			= false;

	/**
	 * Defines whether the map is loaded.
	 * @var bool
	 * @static
	 */
	protected static $mapLoaded					= false;

	/**
	 * Initializes the configuration for the following validations about roles
	 * and access permitions.
	 * @static
	 */
	public static function initialize()
	{
		if(self::hasMap())
		{
			if(!self::isMapLoaded())
				self::loadMap();
		}

		if(LocalConfiguration::get('systemAccess.handler') == 'files')
		{
			if(self::hasRoles())
			{
				if(!self::isRolesLoaded())
					self::loadRoles();
			}

			if(self::hasPermissions())
			{
				if(!self::isPermissionsLoaded())
					self::loadPermissions();
			}
		}
		elseif(LocalConfiguration::get('systemAccess.handler') == 'database')
		{
			self::loadDatabaseRules();
		}
		else
		{
			throw new SystemAccessError(Language::getInstance('SystemAccess')->getSentence('error.invalidHandler'), self::INVALID_HANDLER_ERROR);
		}

		if(Session::getActive()->isStarted())
			self::getLogin();
	}

	/**
	 * Returns the global SystemAccessConfiguration object.
	 *
	 * If it was not created yet, it is created and returned.
	 * @return SystemAccessConfiguration
	 * @static
	 * @see SystemAccessConfiguration::$instance
	 */
	public static function getConfiguration()
	{
		if(self::$configuration === null)
			self::$configuration = new SystemAccessConfiguration();

		return self::$configuration;
	}

	/**
	 * Loads the access' map used to check access permissitions for users.
	 *
	 * The map defined in a XML file called SystemAccessRoles.xml, located
	 * at /Optimuz/apps/APPLICATION_NAME/config/systemAccess/.
	 * @static
	 */
	public static function loadMap()
	{
		$config = self::getConfiguration();

		if(!$config->hasCache('SystemAccessConfiguration'))
		{
			$rolesPath = Application::getCurrent()->getPath('config') . 'systemAccess/map.xml';
			$xml = new Xml();

			if($xml->load($rolesPath))
			{
				$map = $xml->getElementsByTagName('map')->item(0);
				$config->setDefaultAccess($map->getAttribute('hasAccessByDefault') == 'true');
				$config->setValidationType($map->getAttribute('validationType'));
				$controllers = $xml->getElementsByTagName('controller');

				foreach($controllers as $controller)
				{
					$config->addAccess($controller->getAttribute('name'), $controller->getAttribute('role'), $controller->getAttribute('permissions'));

					if($controller->hasChildNodes())
					{
						foreach($controller->childNodes as $method)
						{
							if($method->nodeType == 1)
								$config->addAccess("{$controller->getAttribute('name')}.{$method->getAttribute('name')}", $method->getAttribute('role'), $method->getAttribute('permissions'));
						}
					}
				}

				self::$mapLoaded = true;
			}
			else
			{
				throw new SystemAccessError(Language::getInstance('SystemAccess')->getSentence('error.loadRolesError'), self::LOAD_ROLES_ERROR);
			}
		}
		else
		{
			$config->restore();
			self::$mapLoaded = true;
		}
	}

	/**
	 * Loads the roles used to check access permissitions for users.
	 *
	 * The roles are defined in a XML file called roles.xml, located
	 * at /Optimuz/apps/APPLICATION_NAME/config/systemAccess/.
	 * @static
	 */
	public static function loadRoles()
	{
		$config = self::getConfiguration();

		if(!$config->hasCache('SystemAccessConfiguration'))
		{
			$rolesPath = Application::getCurrent()->getPath('config') . 'systemAccess/roles.xml';
			$xml = new Xml();

			if($xml->load($rolesPath))
			{
				$roles = $xml->getElementsByTagName('role');

				// add anonymous role
				$config->addRole(new SystemAccessRole(0, 'Anonymous', 'Anonymous'));

				foreach($roles as $role)
					$config->addRole(new SystemAccessRole($role->getAttribute('id'), $role->getAttribute('name'), $role->getAttribute('label'), $role->getAttribute('isAdmin') == 'true'));

				self::$rolesLoaded = true;
			}
			else
			{
				throw new SystemAccessError(Language::getInstance('SystemAccess')->getSentence('error.loadRolesError'), self::LOAD_ROLES_ERROR);
			}
		}
		else
		{
			$config->restore();
			self::$rolesLoaded = true;
		}
	}

	/**
	 * Loads the permissions used to check access for users.
	 *
	 * The roles are defined in a XML file called permissions.xml, located
	 * at /Optimuz/apps/APPLICATION_NAME/config/systemAccess/.
	 * @static
	 */
	public static function loadPermissions()
	{
		$config = self::getConfiguration();

		if(!$config->hasCache('SystemAccessConfiguration'))
		{
			$permissionsPath = Application::getCurrent()->getPath('config') . 'systemAccess/permissions.xml';
			$xml = new Xml();

			if($xml->load($permissionsPath))
			{
				$permissions = $xml->getElementsByTagName('permission');

				foreach($permissions as $permission)
					$config->addPermission(new SystemAccessPermission($permission->getAttribute('id'), $permission->getAttribute('name')));

				self::$permissionsLoaded = true;
			}
			else
			{
				throw new SystemAccessError(Language::getInstance('SystemAccess')->getSentence('error.loadPermissionsError'), self::LOAD_PERMISSIONS_ERROR);
			}
		}
		else
		{
			$config->restore();
			self::$permissionsLoaded = true;
		}
	}

	/**
	 * Loads the roles and permissions used to check access permissitions for
	 * users, based on data stored in a database.
	 * @static
	 */
	public static function loadDatabaseRules()
	{
		$config = self::getConfiguration();
		$roleTable = LocalConfiguration::get('systemAccess.database.role.tableName');
		$permissionTable = LocalConfiguration::get('systemAccess.database.permission.tableName');

		if(!empty($roleTable) && !empty($permissionTable))
		{
			if(LocalConfiguration::get('orm.propel.enable'))
			{
				// load roles
				$roleModel = CamelCase::toUpper($roleTable) . 'Query';
				$rolesQuery = new $roleModel;
				$roles = $rolesQuery->find();

				$roleIdMethod = 'get' . CamelCase::toUpper(LocalConfiguration::get('systemAccess.database.role.primaryKey'));
				$roleNameMethod = 'get' . CamelCase::toUpper(LocalConfiguration::get('systemAccess.database.role.labelName'));

				$config->addRole(new SystemAccessRole(0, 'Anonymous', 'Anonymous'));

				foreach($roles as $role)
					$config->addRole(new SystemAccessRole($role->$roleIdMethod(), Text::slug($role->$roleNameMethod()), $role->$roleNameMethod(), false));

				// load permissions
				$permissionModel = CamelCase::toUpper($permissionTable) . 'Query';
				$permissionQuery = new $permissionModel;
				$permissions = $permissionQuery->find();

				$permissionIdMethod = 'get' . CamelCase::toUpper(LocalConfiguration::get('systemAccess.database.permission.primaryKey'));
				$permissionNameMethod = 'get' . CamelCase::toUpper(LocalConfiguration::get('systemAccess.database.permission.labelName'));

				foreach($permissions as $permission)
					$config->addPermission(new SystemAccessPermission($permission->$permissionIdMethod(), $permission->$permissionNameMethod()));
			}
			elseif(LocalConfiguration::get('orm.notorm.enable'))
			{
				// TODO implement NotORM to get roles and permissions
			}
			else
			{
				throw new SystemAccessError(Language::getInstance('SystemAccess')->getSentence('error.loadDatabase'), self::LOAD_DATABASE_ERROR);
			}
		}
		else
		{
			throw new SystemAccessError(Language::getInstance('SystemAccess')->getSentence('error.missingModel'), self::MISSING_MODEL_ERROR);
		}

		self::$mapLoaded = true;
		self::$rolesLoaded = true;
		self::$permissionsLoaded = true;
	}

	/**
	 * Checks whether the files that defines the roles exists.
	 * @return bool
	 * @static
	 */
	public static function hasRoles()
	{
		return File::exists(Application::getCurrent()->getPath('config') . 'systemAccess/roles.xml');
	}

	/**
	 * Checks whether the files that defines the access' map exists.
	 * @return bool
	 * @static
	 */
	public static function hasMap()
	{
		return File::exists(Application::getCurrent()->getPath('config') . 'systemAccess/map.xml');
	}

	/**
	 * Checks whether the files that defines the permissions exists.
	 * @return bool
	 * @static
	 */
	public static function hasPermissions()
	{
		return File::exists(Application::getCurrent()->getPath('config') . 'systemAccess/permissions.xml');
	}

	/**
	 * Checks whether the roles were loaded in the SystemAccessConfiguration
	 * class.
	 * @return bool
	 * @static
	 */
	public static function isRolesLoaded()
	{
		return self::$rolesLoaded;
	}

	/**
	 * Checks whether the permissions were loaded in the
	 * SystemAccessConfiguration class.
	 * @return bool
	 * @static
	 */
	public static function isPermissionsLoaded()
	{
		return self::$permissionsLoaded;
	}

	/**
	 * Checks whether the map is loaded in the SystemAccessConfiguration class.
	 * @return bool
	 * @static
	 */
	public static function isMapLoaded()
	{
		return self::$mapLoaded;
	}

	/**
	 * Checks whether the user has access permitions to a system resource
	 * (controller).
	 *
	 * The validation is done using the three XML files at the path
	 * /Optimuz/apps/APPLICATION_NAME/config/systemAccess/. The file roles.xml
	 * has the roles definitions; the file permissions.xml has the permissions
	 * definitions; and the file map.xml has the mapping of controllers and
	 * methods. If a controller or method is not listed in the map.xml, the
	 * default behavior (to allow access or not) is defined by the attribute
	 * hasAccessByDefault of the map element. By default the behavior is to
	 * grant access to controllers and methods not listed in the map.xml file.
	 *
	 * In an order of importance, permissions are more important then roles, and
	 * methods are more important then controllers.
	 *
	 * See the files roles.xml, permissions.xml and map.xml for more details.
	 * @param string $controller Controller name.
	 * @param string $method Method name.
	 * @return bool
	 * @static
	 */
	public static function validateAccess($controller, $method)
	{
		$hasAccess = false;

		if(self::$mapLoaded && self::$rolesLoaded && self::$permissionsLoaded)
		{
			$config = self::getConfiguration();
			$defaultAccess = $config->getDefaultAccess();

			if(!$config->getAccessMap()->isEmpty())
			{
				$controllerAccess = $config->getAccess($controller);
				$methodAccess = $config->getAccess("{$controller}.{$method}");
				$validationType = $config->getValidationType();

				// role validation
				if($controllerAccess['role'])
				{
					$requiredRole = $controllerAccess['role'];
					$loginRole = self::getLogin() ? self::getLogin()->getRole() : null;

					if($methodAccess['role'])
						$requiredRole = $methodAccess['role'];

					$roleId = $loginRole ? $loginRole->getId() : 0;
					$hasAccess = self::validateRole($requiredRole, $roleId, $validationType);
				}
				else
				{
					$hasAccess = $controller != '*' ? self::validateAccess('*', $method) : $defaultAccess;
				}

				// permissions validation
				if(!$controllerAccess['permissions']->isEmpty())
					$hasAccess = self::validatePermission($controllerAccess['permissions']);

				if(!$methodAccess['permissions']->isEmpty())
					$hasAccess = self::validatePermission($methodAccess['permissions']);
			}
			else
			{
				$hasAccess = $defaultAccess;
			}

			if(LocalConfiguration::hasValue('systemAccess.customValidator'))
				$hasAccess = self::callCustomValidator($controller, $method, $hasAccess);
		}
		elseif(LocalConfiguration::hasValue('systemAccess.customValidator'))
		{
			$hasAccess = self::callCustomValidator($controller, $method, $hasAccess);
		}
		else
		{
			throw new SystemAccessError(Language::getInstance('SystemAccess')->getSentence('error.loadSiteNavigationError'), self::LOAD_SITE_NAVIGATION_ERROR);
		}

		return $hasAccess;
	}

	/**
	 * Calls the custom validator and returns its value.
	 *
	 * The custom validator is used to add an extra validation before the access
	 * to a defined controller/method is granted. This validator must to be a
	 * class with a static method with the following signature:
	 *
	 * <code>validateAccess($controllerName, $methodName, $hasAccess)</code>
	 *
	 * It must return a boolean, and this boolean will grant or deny the access
	 * to the user.
	 *
	 * If the class does not exist or does not have the required method, a
	 * SystemAccessError will be thrown.
	 * @param string $controller Controller name.
	 * @param string $method Method name.
	 * @param bool $hasAccess Current value indicating whether the access is
	 * granted.
	 * @return bool Returns true to indicated that the access must be granted,
	 * or false to deny it.
	 * @throws SystemAccessError
	 * @static
	 */
	private static function callCustomValidator($controller, $method, $hasAccess)
	{
		$validator = LocalConfiguration::get('systemAccess.customValidator');

		if(Object::hasMethod($validator, 'validateAccess'))
			$hasAccess = Caller::call(array($validator, 'validateAccess'), array($controller, $method, $hasAccess));
		else
			throw new SystemAccessError(Language::getInstance('SystemAccess')->getSentence('error.invalidCustomValidator'), self::INVALID_CUSTOM_VALIDATOR);

		return $hasAccess;
	}

	/**
	 * Checks the required access against the current role access.
	 *
	 * Returns true if the role has the needed access right, or false otherwise.
	 * @param string $requiredRole Name of the required role.
	 * @param int $roleId ID of the current role (role of the user
	 * authenticated).
	 * @param string $validationType Validation type to be used. Can be
	 * "default" or "match".
	 * @return bool
	 */
	public static function validateRole($requiredRole, $roleId, $validationType)
	{
		$hasAccess = false;

		if($requiredRole == 'Anonymous')
		{
			$hasAccess = true;
		}
		elseif($requiredRole == '*')
		{
			$hasAccess = $roleId > 0;
		}
		else
		{
			if(strpos($requiredRole, ',') > 0)
			{
				$requiredRoles = explode(',', $requiredRole);

				foreach($requiredRoles as $role)
				{
					$requiredRoleId = self::$configuration->getRole(Text::remove('!', $role))->getId();

					if(($hasAccess = self::validateRoleId($requiredRoleId, $roleId, $validationType, $role{0} == '!')))
						break;
				}
			}
			else
			{
				$requiredRoleId = self::$configuration->getRole(Text::remove('!', $requiredRole))->getId();
				$hasAccess = self::validateRoleId($requiredRoleId, $roleId, $validationType, $requiredRole{0} == '!');
			}
		}

		return $hasAccess;
	}

	/**
	 * Checks if the role ID match the required role ID.
	 * @param int $requiredRoleId
	 * @param int $roleId
	 * @param string $validationType
	 * @param bool $negated
	 * @return bool
	 */
	protected static function validateRoleId($requiredRoleId, $roleId, $validationType, $negated)
	{
		$hasAccess = false;

		switch($validationType)
		{
			case 'default':
				$hasAccess = ($roleId >= $requiredRoleId) && !$negated;
				break;
			case 'match':
				$hasAccess = ($roleId === $requiredRoleId) && !$negated;
				break;
			default:
				throw new SystemAccessError(Language::getInstance('SystemAccess')->getSentence('error.invalidValidationType'), self::INVALID_VALIDATION_TYPE_ERROR);
				break;
		}

		return $hasAccess;
	}

	/**
	 * Validates a set of required permissions against the permissions of the
	 * current login.
	 * @param ArrayList $requiredPermissions Permissions required to allow
	 * access.
	 * @return bool True if the current login has the required permissions, or
	 * false otherwise.
	 */
	public static function validatePermission(ArrayList $requiredPermissions)
	{
		$hasAccess = false;

		if($requiredPermissions[0] == '*')
		{
			$hasAccess = SystemAccessLogin::hasSession();
		}
		else
		{
			if(ArrayList::isValid($requiredPermissions[0]))
			{
				foreach($requiredPermissions as $groupPermission)
				{
					if(($hasAccess = self::validatePermission($groupPermission)))
						break;
				}
			}
			else
			{
				$hasAccessCount = 0;
				$loginPermissions = self::getLogin() ? self::getLogin()->getPermissions() : new ArrayList();

				foreach($requiredPermissions as $requiredPermission)
				{
					if($requiredPermission{0} != '!')
					{
						foreach($loginPermissions as $loginPermission)
						{
							if($loginPermission->getName() === $requiredPermission)
								$hasAccessCount++;
						}
					}
					else
					{
						$requiredPermission = Text::remove('!', $requiredPermission);
						$found = false;

						foreach($loginPermissions as $loginPermission)
						{
							if($loginPermission->getName() === $requiredPermission)
							{
								$found = true;
								break;
							}
						}

						if(!$found)
							$hasAccessCount++;
					}
				}

				$hasAccess = $hasAccessCount == $requiredPermissions->count();
			}
		}

		return $hasAccess;
	}

	/**
	 * Returns the login object of the user. If the user is not logged in, a
	 * null value will be returned.
	 * @return SystemAccessLogin
	 */
	public static function getLogin()
	{
		return SystemAccessLogin::restore();
	}
}
?>