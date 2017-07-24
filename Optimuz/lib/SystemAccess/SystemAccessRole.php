<?php
/**
 * This file is used to handle system accesses.
 * @version 0.2
 * @package SystemAccess
 */

/**
 * Class used to store the settings used to define a role.
 * @author Diego Andrade
 * @package SystemAccess
 * @since Optimuz 0.3
 * @version 0.2
 * @uses Strings.Text
 */
class SystemAccessRole
{
	/**
	 * ID of the role.
	 * @var int
	 * @see SystemAccessRole::setId()
	 * @see SystemAccessRole::getId()
	 */
	protected $id						= null;

	/**
	 * Name of the role.
	 * @var string
	 * @see SystemAccessRole::setName()
	 * @see SystemAccessRole::getName()
	 */
	protected $name						= null;

	/**
	 * Label of the role.
	 * @var string
	 * @see SystemAccessRole::setLabel()
	 * @see SystemAccessRole::getLabel()
	 */
	protected $label					= null;

	/**
	 * Indicates whether the role is an admin's role.
	 * @var bool
	 * @see SystemAccessRole::setIsAdmin()
	 * @see SystemAccessRole::getIsAdmin()
	 */
	protected $isAdmin					= null;
	
	/**
	 * Indicates whether the role must to be negated, i.e., must not be present
	 * to be valid.
	 * @var boolean
	 * @see SystemAccessRole::setName()
	 * @see SystemAccessRole::getName()
	 */
	protected $negate					= null;

	/**
	 * Creates a new class instance.
	 *
	 * Class used to store the settings used to define the roles.
	 * @param int $id (optimal) ID of the role.
	 * @param string $name (optimal) Name of the role used to identify it in the
	 * application. This name is that used in the SiteNavigation.xml.
	 * @param string $label (optimal) The name that is displayed to the user. If
	 * this is not given, the $name will be used.
	 * @param bool $isAdmin (optimal) Whether this is an admin's role. Default
	 * is false.
	 * @param bool $negate (optimal) Whether this is role is negated. Default is
	 * false.
	 * @see SystemAccessRole::setId()
	 * @see SystemAccessRole::setName()
	 * @see SystemAccessRole::setLabel()
	 * @see SystemAccessRole::setNegate()
	 */
	public function __construct($id = null, $name = null, $label = null, $isAdmin = false, $negate = false)
	{
		$this->setId($id);
		$this->setName($name);
		$this->label = $label;
		$this->isAdmin = $isAdmin;
		$this->negate = $negate;
	}

	/**
	 * Sets the ID of the role.
	 * @param int $id ID of the role.
	 * @see SystemAccessRole::$id
	 * @see SystemAccessRole::getId()
	 */
	public function setId($id)
	{
		$this->id = (int)$id;
	}

	/**
	 * Gets the ID of the role.
	 * @return int
	 * @see SystemAccessRole::$id
	 * @see SystemAccessRole::setId()
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Sets the name of the role.
	 * @param string $name Name of the role used to identify it in the
	 * application. This name is that used in the SiteNavigation.xml.
	 * @see SystemAccessRole::$name
	 * @see SystemAccessRole::getName()
	 */
	public function setName($name)
	{
		$this->name = Text::slug($name);
	}

	/**
	 * Gets the name of the role.
	 * @return string
	 * @see SystemAccessRole::$name
	 * @see SystemAccessRole::setName()
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Sets the label of the role.
	 * @param string $label The name that is displayed to the user. If
	 * this is not given, the $name will be used.
	 * @see SystemAccessRole::$label
	 * @see SystemAccessRole::getLabel()
	 */
	public function setLabel($label)
	{
		$this->label = $label;
	}

	/**
	 * Gets the label of the role.
	 * @return string
	 * @see SystemAccessRole::$label
	 * @see SystemAccessRole::setLabel()
	 */
	public function getLabel()
	{
		return $this->label;
	}

	/**
	 * Sets whether this is an admin's role.
	 * @param bool $isAdmin True if the role is for admins, false otherwise.
	 * @see SystemAccessRole::$isAdmin
	 * @see SystemAccessRole::getIsAdmin()
	 */
	public function setIsAdmin($isAdmin)
	{
		$this->isAdmin = $isAdmin;
	}

	/**
	 * Gets whether the role is for admins.
	 * @return bool
	 * @see SystemAccessRole::$isAdmin
	 * @see SystemAccessRole::setIsAdmin()
	 */
	public function getIsAdmin()
	{
		return $this->isAdmin;
	}
	
	/**
	 * Sets whether the role is negated.
	 * @param boolean $negate True if the role is negated, false otherwise.
	 * @see SystemAccessRole::$negate
	 * @see SystemAccessRole::getName()
	 */
	public function setNegate($negate)
	{
		$this->negate = $negate;
	}
	
	/**
	 * Returns whether the role is negated.
	 * @return boolean
	 * @see SystemAccessRole::$negate
	 * @see SystemAccessRole::setName()
	 */
	public function getNegate()
	{
		return $this->negate;
	}
}
?>