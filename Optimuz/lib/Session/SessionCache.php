<?php
/**
 * This file is used to handle sessions.
 * @version 0.1
 * @package Session
 */

/**
 * This class is used to store and recover the settings of the Session class.
 * @author Diego Andrade
 * @package Session
 * @since Optimuz 0.3
 * @version 0.1
 * @final
 * @static
 * @uses Storage.Cache
 */
final class SessionCache extends Cacheable
{
	/**
	 * Creates a new class instance.
	 *
	 * Settings related to events of the Session class can be cached with this
	 * class.
	 * @param string $id Session ID.
	 */
	public function __construct($id)
	{
		$this->name = "Session{$id}";
		CacheManager::add($this);
	}

	/**
	 * Returns an array of listeners added to the session.
	 * @return array
	 */
	public function restore()
	{
		return require_once $this->getFilePath();
	}
}
?>