<?php


/**
 * Base class that represents a row from the 'uf' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseUf extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'UfPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        UfPeer
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
	 * The value for the sigla field.
	 * @var        string
	 */
	protected $sigla;

	/**
	 * The value for the nome field.
	 * @var        string
	 */
	protected $nome;

	/**
	 * @var        array Cidade[] Collection to store aggregation of Cidade objects.
	 */
	protected $collCidades;

	/**
	 * @var        array EnderecoCorreio[] Collection to store aggregation of EnderecoCorreio objects.
	 */
	protected $collEnderecoCorreios;

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
	protected $cidadesScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $enderecoCorreiosScheduledForDeletion = null;

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
	 * Get the [sigla] column value.
	 * 
	 * @return     string
	 */
	public function getSigla()
	{
		return $this->sigla;
	}

	/**
	 * Get the [nome] column value.
	 * 
	 * @return     string
	 */
	public function getNome()
	{
		return $this->nome;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Uf The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = UfPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [sigla] column.
	 * 
	 * @param      string $v new value
	 * @return     Uf The current object (for fluent API support)
	 */
	public function setSigla($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->sigla !== $v) {
			$this->sigla = $v;
			$this->modifiedColumns[] = UfPeer::SIGLA;
		}

		return $this;
	} // setSigla()

	/**
	 * Set the value of [nome] column.
	 * 
	 * @param      string $v new value
	 * @return     Uf The current object (for fluent API support)
	 */
	public function setNome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome !== $v) {
			$this->nome = $v;
			$this->modifiedColumns[] = UfPeer::NOME;
		}

		return $this;
	} // setNome()

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
			$this->sigla = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->nome = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 3; // 3 = UfPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Uf object", $e);
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
			$con = Propel::getConnection(UfPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = UfPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collCidades = null;

			$this->collEnderecoCorreios = null;

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
			$con = Propel::getConnection(UfPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = UfQuery::create()
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
			$con = Propel::getConnection(UfPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				UfPeer::addInstanceToPool($this);
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

			if ($this->cidadesScheduledForDeletion !== null) {
				if (!$this->cidadesScheduledForDeletion->isEmpty()) {
					CidadeQuery::create()
						->filterByPrimaryKeys($this->cidadesScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->cidadesScheduledForDeletion = null;
				}
			}

			if ($this->collCidades !== null) {
				foreach ($this->collCidades as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->enderecoCorreiosScheduledForDeletion !== null) {
				if (!$this->enderecoCorreiosScheduledForDeletion->isEmpty()) {
					EnderecoCorreioQuery::create()
						->filterByPrimaryKeys($this->enderecoCorreiosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->enderecoCorreiosScheduledForDeletion = null;
				}
			}

			if ($this->collEnderecoCorreios !== null) {
				foreach ($this->collEnderecoCorreios as $referrerFK) {
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

		$this->modifiedColumns[] = UfPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . UfPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(UfPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(UfPeer::SIGLA)) {
			$modifiedColumns[':p' . $index++]  = '`SIGLA`';
		}
		if ($this->isColumnModified(UfPeer::NOME)) {
			$modifiedColumns[':p' . $index++]  = '`NOME`';
		}

		$sql = sprintf(
			'INSERT INTO `uf` (%s) VALUES (%s)',
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
					case '`SIGLA`':						
						$stmt->bindValue($identifier, $this->sigla, PDO::PARAM_STR);
						break;
					case '`NOME`':						
						$stmt->bindValue($identifier, $this->nome, PDO::PARAM_STR);
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
		$pos = UfPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getSigla();
				break;
			case 2:
				return $this->getNome();
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
		if (isset($alreadyDumpedObjects['Uf'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Uf'][$this->getPrimaryKey()] = true;
		$keys = UfPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getSigla(),
			$keys[2] => $this->getNome(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->collCidades) {
				$result['Cidades'] = $this->collCidades->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collEnderecoCorreios) {
				$result['EnderecoCorreios'] = $this->collEnderecoCorreios->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = UfPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setSigla($value);
				break;
			case 2:
				$this->setNome($value);
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
		$keys = UfPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSigla($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNome($arr[$keys[2]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(UfPeer::DATABASE_NAME);

		if ($this->isColumnModified(UfPeer::ID)) $criteria->add(UfPeer::ID, $this->id);
		if ($this->isColumnModified(UfPeer::SIGLA)) $criteria->add(UfPeer::SIGLA, $this->sigla);
		if ($this->isColumnModified(UfPeer::NOME)) $criteria->add(UfPeer::NOME, $this->nome);

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
		$criteria = new Criteria(UfPeer::DATABASE_NAME);
		$criteria->add(UfPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Uf (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setSigla($this->getSigla());
		$copyObj->setNome($this->getNome());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getCidades() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCidade($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getEnderecoCorreios() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addEnderecoCorreio($relObj->copy($deepCopy));
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
	 * @return     Uf Clone of current object.
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
	 * @return     UfPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new UfPeer();
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
		if ('Cidade' == $relationName) {
			return $this->initCidades();
		}
		if ('EnderecoCorreio' == $relationName) {
			return $this->initEnderecoCorreios();
		}
	}

	/**
	 * Clears out the collCidades collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCidades()
	 */
	public function clearCidades()
	{
		$this->collCidades = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCidades collection.
	 *
	 * By default this just sets the collCidades collection to an empty array (like clearcollCidades());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initCidades($overrideExisting = true)
	{
		if (null !== $this->collCidades && !$overrideExisting) {
			return;
		}
		$this->collCidades = new PropelObjectCollection();
		$this->collCidades->setModel('Cidade');
	}

	/**
	 * Gets an array of Cidade objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Uf is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Cidade[] List of Cidade objects
	 * @throws     PropelException
	 */
	public function getCidades($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCidades || null !== $criteria) {
			if ($this->isNew() && null === $this->collCidades) {
				// return empty collection
				$this->initCidades();
			} else {
				$collCidades = CidadeQuery::create(null, $criteria)
					->filterByUf($this)
					->find($con);
				if (null !== $criteria) {
					return $collCidades;
				}
				$this->collCidades = $collCidades;
			}
		}
		return $this->collCidades;
	}

	/**
	 * Sets a collection of Cidade objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $cidades A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setCidades(PropelCollection $cidades, PropelPDO $con = null)
	{
		$this->cidadesScheduledForDeletion = $this->getCidades(new Criteria(), $con)->diff($cidades);

		foreach ($cidades as $cidade) {
			// Fix issue with collection modified by reference
			if ($cidade->isNew()) {
				$cidade->setUf($this);
			}
			$this->addCidade($cidade);
		}

		$this->collCidades = $cidades;
	}

	/**
	 * Returns the number of related Cidade objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Cidade objects.
	 * @throws     PropelException
	 */
	public function countCidades(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCidades || null !== $criteria) {
			if ($this->isNew() && null === $this->collCidades) {
				return 0;
			} else {
				$query = CidadeQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUf($this)
					->count($con);
			}
		} else {
			return count($this->collCidades);
		}
	}

	/**
	 * Method called to associate a Cidade object to this object
	 * through the Cidade foreign key attribute.
	 *
	 * @param      Cidade $l Cidade
	 * @return     Uf The current object (for fluent API support)
	 */
	public function addCidade(Cidade $l)
	{
		if ($this->collCidades === null) {
			$this->initCidades();
		}
		if (!$this->collCidades->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddCidade($l);
		}

		return $this;
	}

	/**
	 * @param	Cidade $cidade The cidade object to add.
	 */
	protected function doAddCidade($cidade)
	{
		$this->collCidades[]= $cidade;
		$cidade->setUf($this);
	}

	/**
	 * Clears out the collEnderecoCorreios collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addEnderecoCorreios()
	 */
	public function clearEnderecoCorreios()
	{
		$this->collEnderecoCorreios = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collEnderecoCorreios collection.
	 *
	 * By default this just sets the collEnderecoCorreios collection to an empty array (like clearcollEnderecoCorreios());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initEnderecoCorreios($overrideExisting = true)
	{
		if (null !== $this->collEnderecoCorreios && !$overrideExisting) {
			return;
		}
		$this->collEnderecoCorreios = new PropelObjectCollection();
		$this->collEnderecoCorreios->setModel('EnderecoCorreio');
	}

	/**
	 * Gets an array of EnderecoCorreio objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Uf is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array EnderecoCorreio[] List of EnderecoCorreio objects
	 * @throws     PropelException
	 */
	public function getEnderecoCorreios($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collEnderecoCorreios || null !== $criteria) {
			if ($this->isNew() && null === $this->collEnderecoCorreios) {
				// return empty collection
				$this->initEnderecoCorreios();
			} else {
				$collEnderecoCorreios = EnderecoCorreioQuery::create(null, $criteria)
					->filterByUf($this)
					->find($con);
				if (null !== $criteria) {
					return $collEnderecoCorreios;
				}
				$this->collEnderecoCorreios = $collEnderecoCorreios;
			}
		}
		return $this->collEnderecoCorreios;
	}

	/**
	 * Sets a collection of EnderecoCorreio objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $enderecoCorreios A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setEnderecoCorreios(PropelCollection $enderecoCorreios, PropelPDO $con = null)
	{
		$this->enderecoCorreiosScheduledForDeletion = $this->getEnderecoCorreios(new Criteria(), $con)->diff($enderecoCorreios);

		foreach ($enderecoCorreios as $enderecoCorreio) {
			// Fix issue with collection modified by reference
			if ($enderecoCorreio->isNew()) {
				$enderecoCorreio->setUf($this);
			}
			$this->addEnderecoCorreio($enderecoCorreio);
		}

		$this->collEnderecoCorreios = $enderecoCorreios;
	}

	/**
	 * Returns the number of related EnderecoCorreio objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related EnderecoCorreio objects.
	 * @throws     PropelException
	 */
	public function countEnderecoCorreios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collEnderecoCorreios || null !== $criteria) {
			if ($this->isNew() && null === $this->collEnderecoCorreios) {
				return 0;
			} else {
				$query = EnderecoCorreioQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUf($this)
					->count($con);
			}
		} else {
			return count($this->collEnderecoCorreios);
		}
	}

	/**
	 * Method called to associate a EnderecoCorreio object to this object
	 * through the EnderecoCorreio foreign key attribute.
	 *
	 * @param      EnderecoCorreio $l EnderecoCorreio
	 * @return     Uf The current object (for fluent API support)
	 */
	public function addEnderecoCorreio(EnderecoCorreio $l)
	{
		if ($this->collEnderecoCorreios === null) {
			$this->initEnderecoCorreios();
		}
		if (!$this->collEnderecoCorreios->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddEnderecoCorreio($l);
		}

		return $this;
	}

	/**
	 * @param	EnderecoCorreio $enderecoCorreio The enderecoCorreio object to add.
	 */
	protected function doAddEnderecoCorreio($enderecoCorreio)
	{
		$this->collEnderecoCorreios[]= $enderecoCorreio;
		$enderecoCorreio->setUf($this);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->sigla = null;
		$this->nome = null;
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
			if ($this->collCidades) {
				foreach ($this->collCidades as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collEnderecoCorreios) {
				foreach ($this->collEnderecoCorreios as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collCidades instanceof PropelCollection) {
			$this->collCidades->clearIterator();
		}
		$this->collCidades = null;
		if ($this->collEnderecoCorreios instanceof PropelCollection) {
			$this->collEnderecoCorreios->clearIterator();
		}
		$this->collEnderecoCorreios = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(UfPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseUf
