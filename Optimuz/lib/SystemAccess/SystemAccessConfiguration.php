<?php
/**
 * This file is used to handle system accesses.
 * @version 0.2
 * @package SystemAccess
 */

/**
 * Class used to store the settings used to define the roles.
 * @author Diego Andrade
 * @package SystemAccess
 * @since Optimuz 0.3
 * @version 0.2
 * @uses Collection
 * @uses Storage.Cache
 * @uses Strings.Text
 */
class SystemAccessConfiguration extends Cacheable
{
	/**
	 * Stores the settings about the roles.
	 * @var ArrayList
	 */
	protected $roles				= null;

	/**
	 * Stores the settings about the permissions.
	 * @var ArrayList
	 */
	protected $permissions			= null;

	/**
	 * Stores the settings about the access' map.
	 * @var ArrayList
	 */
	protected $map					= null;

	/**
	 * Whether requests to controllers not listed in the map file should be
	 * allowed.
	 * @var bool
	 */
	protected $defaultAccess		= null;

	/**
	 * The validation method used to check whether a user has permissions to
	 * access a system resource.
	 * @var string
	 */
	protected $validationType		= null;

	/**
	 * The class constructor is private, which provide us the ability to have
	 * only one instance per request.
	 *
	 * To get the global SystemAccessConfiguration object you must to call the
	 * method SystemAccessConfiguration::getConfiguration().
	 * @see SystemAccessConfiguration::getConfiguration()
	 */
	public function __construct()
	{
		CacheManager::add($this);
		$this->roles = new ArrayList();
		$this->permissions = new ArrayList();
		$this->map = new ArrayList();
	}

	/**
	 * Adds a new role to the configuration. This role can be used later to
	 * validate an user access.
	 *
	 * The new role is stored using a SystemAccessRole object, in the internal
	 * array SystemAccessConfiguration::$roles.
	 * @param SystemAccessRole $role Role object.
	 */
	public function addRole(SystemAccessRole $role)
	{
		$this->roles->addKey($role->getId(), $role);
	}

	/**
	 * Returns a role. If the role does not exist, a null value will be
	 * returned.
	 * @param mixed $role Permission ID or the permission name.
	 * @return SystemAccessRole
	 */
	public function getRole($role)
	{
		$roleObj = null;

		if(is_numeric($role))
		{
//			if(isset($this->roles[$role]))
//				$roleObj = $this->roles[$role];
			foreach($this->roles as $obj)
			{
				if($obj->getId() == $role)
				{
					$roleObj = $obj;
					break;
				}
			}
		}
		elseif(is_string($role))
		{
			$role = Text::slug($role);

			foreach($this->roles as $obj)
			{
				if($obj->getName() == $role)
				{
					$roleObj = $obj;
					break;
				}
			}
		}

		return $roleObj;
	}

	/**
	 * Return the roles added.
	 * @return ArrayList
	 */
	public function getRoles()
	{
		return $this->roles;
	}

	/**
	 * Adds a new permission to the configuration. This permission can be used
	 * later to validate an user access.
	 *
	 * The new permission is stored using a SystemAccessPermission object, in
	 * the internal array SystemAccessConfiguration::$permissions.
	 * @param SystemAccessPermission $permission Permission object.
	 */
	public function addPermission(SystemAccessPermission $permission)
	{
		$this->permissions->addKey($permission->getId(), $permission);
	}

	/**
	 * Returns a permission. If the permission does not exist, a null value will
	 * be returned.
	 * @param mixed $permission If it is an integer it is used as the index of
	 * the permission to return. If it is a string it is used as the name of the
	 * permission to return.
	 * @return SystemaAccessPermission
	 */
	public function getPermission($permission)
	{
		$permissionObj = null;

		if(is_numeric($permission))
		{
			if(isset($this->permissions[$permission]))
				$permissionObj = $this->permissions[$permission];
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
	 * Returns the permissions added.
	 * @return ArrayList
	 */
	public function getPermissions()
	{
		return $this->permissions;
	}

	/**
	 * Adds a new access route containing the role and the permissions.
	 *
	 * The new role is stored using a SystemAccessRole object, in the internal
	 * array SystemAccessConfiguration::$roles. And the permissions are stored
	 * using the SystemAccessPermission object, in the internal array
	 * SystemAccessConfiguration::$permissions.
	 * @param string $id The name of controller or method that has a special
	 * access directive.
	 * @param string $roleName The role's name associated to the object.
	 * @param string $permissions The name of permissions associated to the
	 * object.
	 */
	public function addAccess($id, $roleName, $permissions)
	{
		$permissionsList = new ArrayList;

		if(!empty($permissions))
		{
			if(Text::find('|', $permissions))
			{
				$orPermissions = Text::split('#\s*\|\s*#', $permissions)->map('trim');

				foreach($orPermissions as $permission)
					$permissionsList->add(Text::split('#\s*,\s*#', $permission)->map('trim'));
			}
			else
			{
				$permissionsList = Text::split('#\s*,\s*#', $permissions)->map('trim');
			}
		}

		$access = array(
			'role' => $roleName,
			'permissions' => $permissionsList
		);

		$this->map->addKey($id, $access);
	}

	/**
	 * Returns the role's name and the permissions associated to a controller or
	 * method.
	 * @param string $id This is the name of a controller or method that is
	 * associated to a role. E.g.: <code>controller.method</code>.
	 * @return array Associative array with two keys:
	 * <ul>
	 * <li>role: name of role required to grant access</li>
	 * <li>permissions: <code>ArrayList</code> of required permissions</li>
	 * </ul>
	 * If no access can be found for the given $id, the role name will be
	 * <code>null</code> and the permissions an empty <code>ArrayList</code>.
	 */
	public function getAccess($id)
	{
		if(isset($this->map[$id]))
		{
			$access = $this->map[$id];
		}
		else
		{
			$access = array(
				'role' => null,
				'permissions' => new ArrayList(),
			);
		}

		return $access;
	}

	/**
	 * Return the access' map.
	 * @return ArrayList
	 */
	public function getAccessMap()
	{
		return $this->map;
	}

	/**
	 * Sets whether requests to controllers not listed in the map file should be
	 * allowed.
	 * @param bool $defaultAccess True to allow unlisted controllers or false to
	 * deny.
	 */
	public function setDefaultAccess($defaultAccess)
	{
		$this->defaultAccess = $defaultAccess;
	}

	/**
	 * Returns whether requests to controllers not listed in the map file should
	 * be allowed.
	 * @return bool
	 */
	public function getDefaultAccess()
	{
		return $this->defaultAccess;
	}

	/**
	 * Sets the validation method used to check whether a user has permissions
	 * to access a system resource.
	 * @param string $validationType The validation type can be: default or
	 * match. See the map.xml for more details.
	 */
	public function setValidationType($validationType)
	{
		$this->validationType = $validationType;
	}

	/**
	 * Returns The validation method used to check whether a user has
	 * permissions to access a system resource.
	 * @return string
	 */
	public function getValidationType()
	{
		return $this->validationType;
	}

	/**
	 * Saves the current data to a cache file. The cache file can be stored in
	 * two places: the application's cache /Optimuz/apps/APPLICATION_NAME/cache,
	 * or the global cache /Optimuz/cache/.
	 *
	 * The data is only cached if the setting "performance.cache.enable" is
	 * true.
	 */
	public function save()
	{
		$this->name = 'SystemAccessConfiguration';
		$this->data = array(
			'roles' => array(),
			'permissions' => array(),
		);

		foreach($this->roles->toArray() as $role)
			$this->data['roles'][] = serialize($role);

		foreach($this->permissions->toArray() as $permission)
			$this->data['permissions'][] = serialize($permission);

		parent::save();
	}

	/**
	 * Restores the roles stored in the cache.
	 */
	public function restore()
	{
		$data = require_once $this->getFilePath();

		foreach($data['roles'] as $role)
		{
			$roleObj = unserialize($role);
			$this->addRole($roleObj);
		}

		foreach($data['permissions'] as $permission)
		{
			$permissionObj = unserialize($permission);
			$this->addPermission($permissionObj);
		}
	}
}
?>