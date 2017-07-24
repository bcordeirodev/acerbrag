<?php


/**
 * Base class that represents a row from the 'agenda_igreja' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseAgendaIgreja extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'AgendaIgrejaPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        AgendaIgrejaPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the agenda_id field.
	 * @var        int
	 */
	protected $agenda_id;

	/**
	 * The value for the igreja_id field.
	 * @var        int
	 */
	protected $igreja_id;

	/**
	 * @var        Agenda
	 */
	protected $aAgenda;

	/**
	 * @var        Igreja
	 */
	protected $aIgreja;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Get the [agenda_id] column value.
	 * 
	 * @return     int
	 */
	public function getAgendaId()
	{
		return $this->agenda_id;
	}

	/**
	 * Get the [igreja_id] column value.
	 * 
	 * @return     int
	 */
	public function getIgrejaId()
	{
		return $this->igreja_id;
	}

	/**
	 * Set the value of [agenda_id] column.
	 * 
	 * @param      int $v new value
	 * @return     AgendaIgreja The current object (for fluent API support)
	 */
	public function setAgendaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->agenda_id !== $v) {
			$this->agenda_id = $v;
			$this->modifiedColumns[] = AgendaIgrejaPeer::AGENDA_ID;
		}

		if ($this->aAgenda !== null && $this->aAgenda->getId() !== $v) {
			$this->aAgenda = null;
		}

		return $this;
	} // setAgendaId()

	/**
	 * Set the value of [igreja_id] column.
	 * 
	 * @param      int $v new value
	 * @return     AgendaIgreja The current object (for fluent API support)
	 */
	public function setIgrejaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->igreja_id !== $v) {
			$this->igreja_id = $v;
			$this->modifiedColumns[] = AgendaIgrejaPeer::IGREJA_ID;
		}

		if ($this->aIgreja !== null && $this->aIgreja->getId() !== $v) {
			$this->aIgreja = null;
		}

		return $this;
	} // setIgrejaId()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->agenda_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->igreja_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 2; // 2 = AgendaIgrejaPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating AgendaIgreja object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aAgenda !== null && $this->agenda_id !== $this->aAgenda->getId()) {
			$this->aAgenda = null;
		}
		if ($this->aIgreja !== null && $this->igreja_id !== $this->aIgreja->getId()) {
			$this->aIgreja = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AgendaIgrejaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = AgendaIgrejaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aAgenda = null;
			$this->aIgreja = null;
		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AgendaIgrejaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = AgendaIgrejaQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			if ($ret) {
				$deleteQuery->delete($con);
				$this->postDelete($con);
				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AgendaIgrejaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				AgendaIgrejaPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aAgenda !== null) {
				if ($this->aAgenda->isModified() || $this->aAgenda->isNew()) {
					$affectedRows += $this->aAgenda->save($con);
				}
				$this->setAgenda($this->aAgenda);
			}

			if ($this->aIgreja !== null) {
				if ($this->aIgreja->isModified() || $this->aIgreja->isNew()) {
					$affectedRows += $this->aIgreja->save($con);
				}
				$this->setIgreja($this->aIgreja);
			}

			if ($this->isNew() || $this->isModified()) {
				// persist changes
				if ($this->isNew()) {
					$this->doInsert($con);
				} else {
					$this->doUpdate($con);
				}
				$affectedRows += 1;
				$this->resetModified();
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Insert the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @throws     PropelException
	 * @see        doSave()
	 */
	protected function doInsert(PropelPDO $con)
	{
		$modifiedColumns = array();
		$index = 0;


		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(AgendaIgrejaPeer::AGENDA_ID)) {
			$modifiedColumns[':p' . $index++]  = '`AGENDA_ID`';
		}
		if ($this->isColumnModified(AgendaIgrejaPeer::IGREJA_ID)) {
			$modifiedColumns[':p' . $index++]  = '`IGREJA_ID`';
		}

		$sql = sprintf(
			'INSERT INTO `agenda_igreja` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`AGENDA_ID`':						
						$stmt->bindValue($identifier, $this->agenda_id, PDO::PARAM_INT);
						break;
					case '`IGREJA_ID`':						
						$stmt->bindValue($identifier, $this->igreja_id, PDO::PARAM_INT);
						break;
				}
			}
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
		}

		$this->setNew(false);
	}

	/**
	 * Update the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @see        doSave()
	 */
	protected function doUpdate(PropelPDO $con)
	{
		$selectCriteria = $this->buildPkeyCriteria();
		$valuesCriteria = $this->buildCriteria();
		BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AgendaIgrejaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getAgendaId();
				break;
			case 1:
				return $this->getIgrejaId();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
	{
		if (isset($alreadyDumpedObjects['AgendaIgreja'][serialize($this->getPrimaryKey())])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['AgendaIgreja'][serialize($this->getPrimaryKey())] = true;
		$keys = AgendaIgrejaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getAgendaId(),
			$keys[1] => $this->getIgrejaId(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aAgenda) {
				$result['Agenda'] = $this->aAgenda->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aIgreja) {
				$result['Igreja'] = $this->aIgreja->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AgendaIgrejaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setAgendaId($value);
				break;
			case 1:
				$this->setIgrejaId($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AgendaIgrejaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setAgendaId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIgrejaId($arr[$keys[1]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(AgendaIgrejaPeer::DATABASE_NAME);

		if ($this->isColumnModified(AgendaIgrejaPeer::AGENDA_ID)) $criteria->add(AgendaIgrejaPeer::AGENDA_ID, $this->agenda_id);
		if ($this->isColumnModified(AgendaIgrejaPeer::IGREJA_ID)) $criteria->add(AgendaIgrejaPeer::IGREJA_ID, $this->igreja_id);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AgendaIgrejaPeer::DATABASE_NAME);
		$criteria->add(AgendaIgrejaPeer::AGENDA_ID, $this->agenda_id);
		$criteria->add(AgendaIgrejaPeer::IGREJA_ID, $this->igreja_id);

		return $criteria;
	}

	/**
	 * Returns the composite primary key for this object.
	 * The array elements will be in same order as specified in XML.
	 * @return     array
	 */
	public function getPrimaryKey()
	{
		$pks = array();
		$pks[0] = $this->getAgendaId();
		$pks[1] = $this->getIgrejaId();

		return $pks;
	}

	/**
	 * Set the [composite] primary key.
	 *
	 * @param      array $keys The elements of the composite key (order must match the order in XML file).
	 * @return     void
	 */
	public function setPrimaryKey($keys)
	{
		$this->setAgendaId($keys[0]);
		$this->setIgrejaId($keys[1]);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return (null === $this->getAgendaId()) && (null === $this->getIgrejaId());
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of AgendaIgreja (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setAgendaId($this->getAgendaId());
		$copyObj->setIgrejaId($this->getIgrejaId());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			//unflag object copy
			$this->startCopy = false;
		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
		}
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     AgendaIgreja Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     AgendaIgrejaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AgendaIgrejaPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Agenda object.
	 *
	 * @param      Agenda $v
	 * @return     AgendaIgreja The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setAgenda(Agenda $v = null)
	{
		if ($v === null) {
			$this->setAgendaId(NULL);
		} else {
			$this->setAgendaId($v->getId());
		}

		$this->aAgenda = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Agenda object, it will not be re-added.
		if ($v !== null) {
			$v->addAgendaIgreja($this);
		}

		return $this;
	}


	/**
	 * Get the associated Agenda object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Agenda The associated Agenda object.
	 * @throws     PropelException
	 */
	public function getAgenda(PropelPDO $con = null)
	{
		if ($this->aAgenda === null && ($this->agenda_id !== null)) {
			$this->aAgenda = AgendaQuery::create()->findPk($this->agenda_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aAgenda->addAgendaIgrejas($this);
			 */
		}
		return $this->aAgenda;
	}

	/**
	 * Declares an association between this object and a Igreja object.
	 *
	 * @param      Igreja $v
	 * @return     AgendaIgreja The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setIgreja(Igreja $v = null)
	{
		if ($v === null) {
			$this->setIgrejaId(NULL);
		} else {
			$this->setIgrejaId($v->getId());
		}

		$this->aIgreja = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Igreja object, it will not be re-added.
		if ($v !== null) {
			$v->addAgendaIgreja($this);
		}

		return $this;
	}


	/**
	 * Get the associated Igreja object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Igreja The associated Igreja object.
	 * @throws     PropelException
	 */
	public function getIgreja(PropelPDO $con = null)
	{
		if ($this->aIgreja === null && ($this->igreja_id !== null)) {
			$this->aIgreja = IgrejaQuery::create()->findPk($this->igreja_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aIgreja->addAgendaIgrejas($this);
			 */
		}
		return $this->aIgreja;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->agenda_id = null;
		$this->igreja_id = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all references to other model objects or collections of model objects.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect
	 * objects with circular references (even in PHP 5.3). This is currently necessary
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

		$this->aAgenda = null;
		$this->aIgreja = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(AgendaIgrejaPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseAgendaIgreja
