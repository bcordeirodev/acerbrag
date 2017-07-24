<?php


/**
 * Base class that represents a row from the 'contato' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseContato extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ContatoPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ContatoPeer
	 */
	protected static $peer;

	/**
	 * The flag var to prevent infinit loop in deep copy
	 * @var       boolean
	 */
	protected $startCopy = false;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the numero field.
	 * @var        string
	 */
	protected $numero;

	/**
	 * @var        array AdvogadoContato[] Collection to store aggregation of AdvogadoContato objects.
	 */
	protected $collAdvogadoContatos;

	/**
	 * @var        array ClienteContato[] Collection to store aggregation of ClienteContato objects.
	 */
	protected $collClienteContatos;

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
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $advogadoContatosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $clienteContatosScheduledForDeletion = null;

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [numero] column value.
	 * 
	 * @return     string
	 */
	public function getNumero()
	{
		return $this->numero;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Contato The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ContatoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [numero] column.
	 * 
	 * @param      string $v new value
	 * @return     Contato The current object (for fluent API support)
	 */
	public function setNumero($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->numero !== $v) {
			$this->numero = $v;
			$this->modifiedColumns[] = ContatoPeer::NUMERO;
		}

		return $this;
	} // setNumero()

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

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->numero = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 2; // 2 = ContatoPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Contato object", $e);
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
			$con = Propel::getConnection(ContatoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ContatoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collAdvogadoContatos = null;

			$this->collClienteContatos = null;

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
			$con = Propel::getConnection(ContatoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = ContatoQuery::create()
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
			$con = Propel::getConnection(ContatoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ContatoPeer::addInstanceToPool($this);
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

			if ($this->advogadoContatosScheduledForDeletion !== null) {
				if (!$this->advogadoContatosScheduledForDeletion->isEmpty()) {
					AdvogadoContatoQuery::create()
						->filterByPrimaryKeys($this->advogadoContatosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->advogadoContatosScheduledForDeletion = null;
				}
			}

			if ($this->collAdvogadoContatos !== null) {
				foreach ($this->collAdvogadoContatos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->clienteContatosScheduledForDeletion !== null) {
				if (!$this->clienteContatosScheduledForDeletion->isEmpty()) {
					ClienteContatoQuery::create()
						->filterByPrimaryKeys($this->clienteContatosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->clienteContatosScheduledForDeletion = null;
				}
			}

			if ($this->collClienteContatos !== null) {
				foreach ($this->collClienteContatos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
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

		$this->modifiedColumns[] = ContatoPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . ContatoPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(ContatoPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(ContatoPeer::NUMERO)) {
			$modifiedColumns[':p' . $index++]  = '`NUMERO`';
		}

		$sql = sprintf(
			'INSERT INTO `contato` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`ID`':
						$stmt->bindValue($identifier, $this->id, PDO::PARAM_INT);
						break;
					case '`NUMERO`':
						$stmt->bindValue($identifier, $this->numero, PDO::PARAM_STR);
						break;
				}
			}
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
		}

		try {
			$pk = $con->lastInsertId();
		} catch (Exception $e) {
			throw new PropelException('Unable to get autoincrement id.', $e);
		}
		$this->setId($pk);

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
		$pos = ContatoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getId();
				break;
			case 1:
				return $this->getNumero();
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
		if (isset($alreadyDumpedObjects['Contato'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Contato'][$this->getPrimaryKey()] = true;
		$keys = ContatoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNumero(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->collAdvogadoContatos) {
				$result['AdvogadoContatos'] = $this->collAdvogadoContatos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collClienteContatos) {
				$result['ClienteContatos'] = $this->collClienteContatos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = ContatoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setId($value);
				break;
			case 1:
				$this->setNumero($value);
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
		$keys = ContatoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNumero($arr[$keys[1]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ContatoPeer::DATABASE_NAME);

		if ($this->isColumnModified(ContatoPeer::ID)) $criteria->add(ContatoPeer::ID, $this->id);
		if ($this->isColumnModified(ContatoPeer::NUMERO)) $criteria->add(ContatoPeer::NUMERO, $this->numero);

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
		$criteria = new Criteria(ContatoPeer::DATABASE_NAME);
		$criteria->add(ContatoPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Contato (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setNumero($this->getNumero());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getAdvogadoContatos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAdvogadoContato($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getClienteContatos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addClienteContato($relObj->copy($deepCopy));
				}
			}

			//unflag object copy
			$this->startCopy = false;
		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
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
	 * @return     Contato Clone of current object.
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
	 * @return     ContatoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ContatoPeer();
		}
		return self::$peer;
	}


	/**
	 * Initializes a collection based on the name of a relation.
	 * Avoids crafting an 'init[$relationName]s' method name
	 * that wouldn't work when StandardEnglishPluralizer is used.
	 *
	 * @param      string $relationName The name of the relation to initialize
	 * @return     void
	 */
	public function initRelation($relationName)
	{
		if ('AdvogadoContato' == $relationName) {
			return $this->initAdvogadoContatos();
		}
		if ('ClienteContato' == $relationName) {
			return $this->initClienteContatos();
		}
	}

	/**
	 * Clears out the collAdvogadoContatos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAdvogadoContatos()
	 */
	public function clearAdvogadoContatos()
	{
		$this->collAdvogadoContatos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAdvogadoContatos collection.
	 *
	 * By default this just sets the collAdvogadoContatos collection to an empty array (like clearcollAdvogadoContatos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initAdvogadoContatos($overrideExisting = true)
	{
		if (null !== $this->collAdvogadoContatos && !$overrideExisting) {
			return;
		}
		$this->collAdvogadoContatos = new PropelObjectCollection();
		$this->collAdvogadoContatos->setModel('AdvogadoContato');
	}

	/**
	 * Gets an array of AdvogadoContato objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Contato is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AdvogadoContato[] List of AdvogadoContato objects
	 * @throws     PropelException
	 */
	public function getAdvogadoContatos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAdvogadoContatos || null !== $criteria) {
			if ($this->isNew() && null === $this->collAdvogadoContatos) {
				// return empty collection
				$this->initAdvogadoContatos();
			} else {
				$collAdvogadoContatos = AdvogadoContatoQuery::create(null, $criteria)
					->filterByContato($this)
					->find($con);
				if (null !== $criteria) {
					return $collAdvogadoContatos;
				}
				$this->collAdvogadoContatos = $collAdvogadoContatos;
			}
		}
		return $this->collAdvogadoContatos;
	}

	/**
	 * Sets a collection of AdvogadoContato objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $advogadoContatos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setAdvogadoContatos(PropelCollection $advogadoContatos, PropelPDO $con = null)
	{
		$this->advogadoContatosScheduledForDeletion = $this->getAdvogadoContatos(new Criteria(), $con)->diff($advogadoContatos);

		foreach ($advogadoContatos as $advogadoContato) {
			// Fix issue with collection modified by reference
			if ($advogadoContato->isNew()) {
				$advogadoContato->setContato($this);
			}
			$this->addAdvogadoContato($advogadoContato);
		}

		$this->collAdvogadoContatos = $advogadoContatos;
	}

	/**
	 * Returns the number of related AdvogadoContato objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AdvogadoContato objects.
	 * @throws     PropelException
	 */
	public function countAdvogadoContatos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAdvogadoContatos || null !== $criteria) {
			if ($this->isNew() && null === $this->collAdvogadoContatos) {
				return 0;
			} else {
				$query = AdvogadoContatoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByContato($this)
					->count($con);
			}
		} else {
			return count($this->collAdvogadoContatos);
		}
	}

	/**
	 * Method called to associate a AdvogadoContato object to this object
	 * through the AdvogadoContato foreign key attribute.
	 *
	 * @param      AdvogadoContato $l AdvogadoContato
	 * @return     Contato The current object (for fluent API support)
	 */
	public function addAdvogadoContato(AdvogadoContato $l)
	{
		if ($this->collAdvogadoContatos === null) {
			$this->initAdvogadoContatos();
		}
		if (!$this->collAdvogadoContatos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddAdvogadoContato($l);
		}

		return $this;
	}

	/**
	 * @param	AdvogadoContato $advogadoContato The advogadoContato object to add.
	 */
	protected function doAddAdvogadoContato($advogadoContato)
	{
		$this->collAdvogadoContatos[]= $advogadoContato;
		$advogadoContato->setContato($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Contato is new, it will return
	 * an empty collection; or if this Contato has previously
	 * been saved, it will retrieve related AdvogadoContatos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Contato.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array AdvogadoContato[] List of AdvogadoContato objects
	 */
	public function getAdvogadoContatosJoinAdvogado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AdvogadoContatoQuery::create(null, $criteria);
		$query->joinWith('Advogado', $join_behavior);

		return $this->getAdvogadoContatos($query, $con);
	}

	/**
	 * Clears out the collClienteContatos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addClienteContatos()
	 */
	public function clearClienteContatos()
	{
		$this->collClienteContatos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collClienteContatos collection.
	 *
	 * By default this just sets the collClienteContatos collection to an empty array (like clearcollClienteContatos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initClienteContatos($overrideExisting = true)
	{
		if (null !== $this->collClienteContatos && !$overrideExisting) {
			return;
		}
		$this->collClienteContatos = new PropelObjectCollection();
		$this->collClienteContatos->setModel('ClienteContato');
	}

	/**
	 * Gets an array of ClienteContato objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Contato is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ClienteContato[] List of ClienteContato objects
	 * @throws     PropelException
	 */
	public function getClienteContatos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collClienteContatos || null !== $criteria) {
			if ($this->isNew() && null === $this->collClienteContatos) {
				// return empty collection
				$this->initClienteContatos();
			} else {
				$collClienteContatos = ClienteContatoQuery::create(null, $criteria)
					->filterByContato($this)
					->find($con);
				if (null !== $criteria) {
					return $collClienteContatos;
				}
				$this->collClienteContatos = $collClienteContatos;
			}
		}
		return $this->collClienteContatos;
	}

	/**
	 * Sets a collection of ClienteContato objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $clienteContatos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setClienteContatos(PropelCollection $clienteContatos, PropelPDO $con = null)
	{
		$this->clienteContatosScheduledForDeletion = $this->getClienteContatos(new Criteria(), $con)->diff($clienteContatos);

		foreach ($clienteContatos as $clienteContato) {
			// Fix issue with collection modified by reference
			if ($clienteContato->isNew()) {
				$clienteContato->setContato($this);
			}
			$this->addClienteContato($clienteContato);
		}

		$this->collClienteContatos = $clienteContatos;
	}

	/**
	 * Returns the number of related ClienteContato objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ClienteContato objects.
	 * @throws     PropelException
	 */
	public function countClienteContatos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collClienteContatos || null !== $criteria) {
			if ($this->isNew() && null === $this->collClienteContatos) {
				return 0;
			} else {
				$query = ClienteContatoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByContato($this)
					->count($con);
			}
		} else {
			return count($this->collClienteContatos);
		}
	}

	/**
	 * Method called to associate a ClienteContato object to this object
	 * through the ClienteContato foreign key attribute.
	 *
	 * @param      ClienteContato $l ClienteContato
	 * @return     Contato The current object (for fluent API support)
	 */
	public function addClienteContato(ClienteContato $l)
	{
		if ($this->collClienteContatos === null) {
			$this->initClienteContatos();
		}
		if (!$this->collClienteContatos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddClienteContato($l);
		}

		return $this;
	}

	/**
	 * @param	ClienteContato $clienteContato The clienteContato object to add.
	 */
	protected function doAddClienteContato($clienteContato)
	{
		$this->collClienteContatos[]= $clienteContato;
		$clienteContato->setContato($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Contato is new, it will return
	 * an empty collection; or if this Contato has previously
	 * been saved, it will retrieve related ClienteContatos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Contato.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ClienteContato[] List of ClienteContato objects
	 */
	public function getClienteContatosJoinCliente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ClienteContatoQuery::create(null, $criteria);
		$query->joinWith('Cliente', $join_behavior);

		return $this->getClienteContatos($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->numero = null;
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
			if ($this->collAdvogadoContatos) {
				foreach ($this->collAdvogadoContatos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collClienteContatos) {
				foreach ($this->collClienteContatos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collAdvogadoContatos instanceof PropelCollection) {
			$this->collAdvogadoContatos->clearIterator();
		}
		$this->collAdvogadoContatos = null;
		if ($this->collClienteContatos instanceof PropelCollection) {
			$this->collClienteContatos->clearIterator();
		}
		$this->collClienteContatos = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(ContatoPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseContato
