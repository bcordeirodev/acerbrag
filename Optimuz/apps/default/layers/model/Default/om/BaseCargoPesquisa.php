<?php


/**
 * Base class that represents a row from the 'cargo_pesquisa' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseCargoPesquisa extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'CargoPesquisaPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        CargoPesquisaPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the cargo_id field.
	 * @var        int
	 */
	protected $cargo_id;

	/**
	 * The value for the pesquisa_id field.
	 * @var        int
	 */
	protected $pesquisa_id;

	/**
	 * @var        Cargo
	 */
	protected $aCargo;

	/**
	 * @var        Pesquisa
	 */
	protected $aPesquisa;

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
	 * Get the [cargo_id] column value.
	 * 
	 * @return     int
	 */
	public function getCargoId()
	{
		return $this->cargo_id;
	}

	/**
	 * Get the [pesquisa_id] column value.
	 * 
	 * @return     int
	 */
	public function getPesquisaId()
	{
		return $this->pesquisa_id;
	}

	/**
	 * Set the value of [cargo_id] column.
	 * 
	 * @param      int $v new value
	 * @return     CargoPesquisa The current object (for fluent API support)
	 */
	public function setCargoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cargo_id !== $v) {
			$this->cargo_id = $v;
			$this->modifiedColumns[] = CargoPesquisaPeer::CARGO_ID;
		}

		if ($this->aCargo !== null && $this->aCargo->getId() !== $v) {
			$this->aCargo = null;
		}

		return $this;
	} // setCargoId()

	/**
	 * Set the value of [pesquisa_id] column.
	 * 
	 * @param      int $v new value
	 * @return     CargoPesquisa The current object (for fluent API support)
	 */
	public function setPesquisaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->pesquisa_id !== $v) {
			$this->pesquisa_id = $v;
			$this->modifiedColumns[] = CargoPesquisaPeer::PESQUISA_ID;
		}

		if ($this->aPesquisa !== null && $this->aPesquisa->getId() !== $v) {
			$this->aPesquisa = null;
		}

		return $this;
	} // setPesquisaId()

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

			$this->cargo_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->pesquisa_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 2; // 2 = CargoPesquisaPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating CargoPesquisa object", $e);
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

		if ($this->aCargo !== null && $this->cargo_id !== $this->aCargo->getId()) {
			$this->aCargo = null;
		}
		if ($this->aPesquisa !== null && $this->pesquisa_id !== $this->aPesquisa->getId()) {
			$this->aPesquisa = null;
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
			$con = Propel::getConnection(CargoPesquisaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = CargoPesquisaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aCargo = null;
			$this->aPesquisa = null;
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
			$con = Propel::getConnection(CargoPesquisaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = CargoPesquisaQuery::create()
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
			$con = Propel::getConnection(CargoPesquisaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				CargoPesquisaPeer::addInstanceToPool($this);
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

			if ($this->aCargo !== null) {
				if ($this->aCargo->isModified() || $this->aCargo->isNew()) {
					$affectedRows += $this->aCargo->save($con);
				}
				$this->setCargo($this->aCargo);
			}

			if ($this->aPesquisa !== null) {
				if ($this->aPesquisa->isModified() || $this->aPesquisa->isNew()) {
					$affectedRows += $this->aPesquisa->save($con);
				}
				$this->setPesquisa($this->aPesquisa);
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
		if ($this->isColumnModified(CargoPesquisaPeer::CARGO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`CARGO_ID`';
		}
		if ($this->isColumnModified(CargoPesquisaPeer::PESQUISA_ID)) {
			$modifiedColumns[':p' . $index++]  = '`PESQUISA_ID`';
		}

		$sql = sprintf(
			'INSERT INTO `cargo_pesquisa` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`CARGO_ID`':						
						$stmt->bindValue($identifier, $this->cargo_id, PDO::PARAM_INT);
						break;
					case '`PESQUISA_ID`':						
						$stmt->bindValue($identifier, $this->pesquisa_id, PDO::PARAM_INT);
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
		$pos = CargoPesquisaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCargoId();
				break;
			case 1:
				return $this->getPesquisaId();
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
		if (isset($alreadyDumpedObjects['CargoPesquisa'][serialize($this->getPrimaryKey())])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['CargoPesquisa'][serialize($this->getPrimaryKey())] = true;
		$keys = CargoPesquisaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getCargoId(),
			$keys[1] => $this->getPesquisaId(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aCargo) {
				$result['Cargo'] = $this->aCargo->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aPesquisa) {
				$result['Pesquisa'] = $this->aPesquisa->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
		$pos = CargoPesquisaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCargoId($value);
				break;
			case 1:
				$this->setPesquisaId($value);
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
		$keys = CargoPesquisaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setCargoId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPesquisaId($arr[$keys[1]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(CargoPesquisaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CargoPesquisaPeer::CARGO_ID)) $criteria->add(CargoPesquisaPeer::CARGO_ID, $this->cargo_id);
		if ($this->isColumnModified(CargoPesquisaPeer::PESQUISA_ID)) $criteria->add(CargoPesquisaPeer::PESQUISA_ID, $this->pesquisa_id);

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
		$criteria = new Criteria(CargoPesquisaPeer::DATABASE_NAME);
		$criteria->add(CargoPesquisaPeer::CARGO_ID, $this->cargo_id);
		$criteria->add(CargoPesquisaPeer::PESQUISA_ID, $this->pesquisa_id);

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
		$pks[0] = $this->getCargoId();
		$pks[1] = $this->getPesquisaId();

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
		$this->setCargoId($keys[0]);
		$this->setPesquisaId($keys[1]);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return (null === $this->getCargoId()) && (null === $this->getPesquisaId());
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of CargoPesquisa (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setCargoId($this->getCargoId());
		$copyObj->setPesquisaId($this->getPesquisaId());

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
	 * @return     CargoPesquisa Clone of current object.
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
	 * @return     CargoPesquisaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CargoPesquisaPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Cargo object.
	 *
	 * @param      Cargo $v
	 * @return     CargoPesquisa The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCargo(Cargo $v = null)
	{
		if ($v === null) {
			$this->setCargoId(NULL);
		} else {
			$this->setCargoId($v->getId());
		}

		$this->aCargo = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Cargo object, it will not be re-added.
		if ($v !== null) {
			$v->addCargoPesquisa($this);
		}

		return $this;
	}


	/**
	 * Get the associated Cargo object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Cargo The associated Cargo object.
	 * @throws     PropelException
	 */
	public function getCargo(PropelPDO $con = null)
	{
		if ($this->aCargo === null && ($this->cargo_id !== null)) {
			$this->aCargo = CargoQuery::create()->findPk($this->cargo_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aCargo->addCargoPesquisas($this);
			 */
		}
		return $this->aCargo;
	}

	/**
	 * Declares an association between this object and a Pesquisa object.
	 *
	 * @param      Pesquisa $v
	 * @return     CargoPesquisa The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPesquisa(Pesquisa $v = null)
	{
		if ($v === null) {
			$this->setPesquisaId(NULL);
		} else {
			$this->setPesquisaId($v->getId());
		}

		$this->aPesquisa = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Pesquisa object, it will not be re-added.
		if ($v !== null) {
			$v->addCargoPesquisa($this);
		}

		return $this;
	}


	/**
	 * Get the associated Pesquisa object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Pesquisa The associated Pesquisa object.
	 * @throws     PropelException
	 */
	public function getPesquisa(PropelPDO $con = null)
	{
		if ($this->aPesquisa === null && ($this->pesquisa_id !== null)) {
			$this->aPesquisa = PesquisaQuery::create()->findPk($this->pesquisa_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aPesquisa->addCargoPesquisas($this);
			 */
		}
		return $this->aPesquisa;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->cargo_id = null;
		$this->pesquisa_id = null;
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

		$this->aCargo = null;
		$this->aPesquisa = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(CargoPesquisaPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseCargoPesquisa
