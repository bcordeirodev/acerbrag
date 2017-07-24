<?php
/**
 * This file is used to handle system accesses.
 * @version 0.1
 * @package SystemAccess
 */

/**
 * Class used to store the settings used to define a permission.
 * @author Diego Andrade
 * @package SystemAccess
 * @since Optimuz 0.4
 * @version 0.1
 * @uses Strings.Text
 */
class SystemAccessPermission
{
	/**
	 * ID of the permission.
	 * @var int
	 * @see SystemAccessPermission::setId()
	 * @see SystemAccessPermission::getId()
	 */
	protected $id						= null;

	/**
	 * Name of the permission.
	 * @var string
	 * @see SystemAccessPermission::setName()
	 * @see SystemAccessPermission::getName()
	 */
	protected $name						= null;

	/**
	 * Indicates whether the permission must to be negated, i.e., must not be 
	 * present to be valid.
	 * @var boolean
	 * @see SystemAccessPermission::setName()
	 * @see SystemAccessPermission::getName()
	 */
	protected $negate					= null;
	
	/**
	 * Creates a new class instance.
	 *
	 * Class used to store the settings used to define the permissions.
	 * @param int $id (optimal) ID of the permission.
	 * @param string $name (optimal) Name of the permission used to identify it 
	 * in the application. This name is that used in the SiteNavigation.xml.
	 * @param bool $negate (optimal) Whether this is permission is negated. 
	 * Default is false.
	 * @see SystemAccessPermission::setId()
	 * @see SystemAccessPermission::setName()
	 * @see SystemAccessPermission::setNegate()
	 */
	public function __construct($id = null, $name = null, $negate = false)
	{
		if(!empty($id))
			$this->setId($id);
		
		if(!empty($name))
			$this->setName($name);
		
		$this->negate = $negate;
	}

	/**
	 * Sets the ID of the permission.
	 * @param int $id ID of the permission.
	 * @see SystemAccessPermission::$id
	 * @see SystemAccessPermission::getId()
	 */
	public function setId($id)
	{
		$this->id = (int)$id;
	}

	/**
	 * Gets the ID of the permission.
	 * @return int
	 * @see SystemAccessPermission::$id
	 * @see SystemAccessPermission::setId()
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Sets the name of the permission.
	 * @param string $name Name of the permission used to identify it in the
	 * application. This name is that used in the SiteNavigation.xml.
	 * @see SystemAccessPermission::$name
	 * @see SystemAccessPermission::getName()
	 */
	public function setName($name)
	{
		$this->name = Text::slug($name);
	}

	/**
	 * Gets the name of the permission.
	 * @return string
	 * @see SystemAccessPermission::$name
	 * @see SystemAccessPermission::setName()
	 */
	public function getName()
	{
		return $this->name;
	}
	
	/**
	 * Sets whether the permission is negated.
	 * @param boolean $negate True if the permission is negated, false otherwise.
	 * @see SystemAccessPermission::$negate
	 * @see SystemAccessPermission::getName()
	 */
	public function setNegate($negate)
	{
		$this->negate = $negate;
	}
	
	/**
	 * Returns whether the permission is negated.
	 * @return boolean
	 * @see SystemAccessPermission::$negate
	 * @see SystemAccessPermission::setName()
	 */
	public function getNegate()
	{
		return $this->negate;
	}
}
?>