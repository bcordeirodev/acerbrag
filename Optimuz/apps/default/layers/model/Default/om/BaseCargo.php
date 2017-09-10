<?php


/**
 * Base class that represents a row from the 'cargo' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseCargo extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'CargoPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        CargoPeer
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
	 * The value for the nome field.
	 * @var        string
	 */
	protected $nome;

	/**
	 * @var        array CargoPesquisa[] Collection to store aggregation of CargoPesquisa objects.
	 */
	protected $collCargoPesquisas;

	/**
	 * @var        array Usuario[] Collection to store aggregation of Usuario objects.
	 */
	protected $collUsuarios;

	/**
	 * @var        array Pesquisa[] Collection to store aggregation of Pesquisa objects.
	 */
	protected $collPesquisas;

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
	protected $pesquisasScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $cargoPesquisasScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $usuariosScheduledForDeletion = null;

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
	 * @return     Cargo The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CargoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [nome] column.
	 * 
	 * @param      string $v new value
	 * @return     Cargo The current object (for fluent API support)
	 */
	public function setNome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome !== $v) {
			$this->nome = $v;
			$this->modifiedColumns[] = CargoPeer::NOME;
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
			$this->nome = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 2; // 2 = CargoPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Cargo object", $e);
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
			$con = Propel::getConnection(CargoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = CargoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collCargoPesquisas = null;

			$this->collUsuarios = null;

			$this->collPesquisas = null;
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
			$con = Propel::getConnection(CargoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = CargoQuery::create()
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
			$con = Propel::getConnection(CargoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				CargoPeer::addInstanceToPool($this);
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

			if ($this->pesquisasScheduledForDeletion !== null) {
				if (!$this->pesquisasScheduledForDeletion->isEmpty()) {
					CargoPesquisaQuery::create()
						->filterByPrimaryKeys($this->pesquisasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->pesquisasScheduledForDeletion = null;
				}

				foreach ($this->getPesquisas() as $pesquisa) {
					if ($pesquisa->isModified()) {
						$pesquisa->save($con);
					}
				}
			}

			if ($this->cargoPesquisasScheduledForDeletion !== null) {
				if (!$this->cargoPesquisasScheduledForDeletion->isEmpty()) {
					CargoPesquisaQuery::create()
						->filterByPrimaryKeys($this->cargoPesquisasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->cargoPesquisasScheduledForDeletion = null;
				}
			}

			if ($this->collCargoPesquisas !== null) {
				foreach ($this->collCargoPesquisas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->usuariosScheduledForDeletion !== null) {
				if (!$this->usuariosScheduledForDeletion->isEmpty()) {
					UsuarioQuery::create()
						->filterByPrimaryKeys($this->usuariosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->usuariosScheduledForDeletion = null;
				}
			}

			if ($this->collUsuarios !== null) {
				foreach ($this->collUsuarios as $referrerFK) {
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

		$this->modifiedColumns[] = CargoPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . CargoPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(CargoPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(CargoPeer::NOME)) {
			$modifiedColumns[':p' . $index++]  = '`NOME`';
		}

		$sql = sprintf(
			'INSERT INTO `cargo` (%s) VALUES (%s)',
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
		$pos = CargoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		if (isset($alreadyDumpedObjects['Cargo'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Cargo'][$this->getPrimaryKey()] = true;
		$keys = CargoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNome(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->collCargoPesquisas) {
				$result['CargoPesquisas'] = $this->collCargoPesquisas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collUsuarios) {
				$result['Usuarios'] = $this->collUsuarios->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = CargoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = CargoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNome($arr[$keys[1]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(CargoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CargoPeer::ID)) $criteria->add(CargoPeer::ID, $this->id);
		if ($this->isColumnModified(CargoPeer::NOME)) $criteria->add(CargoPeer::NOME, $this->nome);

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
		$criteria = new Criteria(CargoPeer::DATABASE_NAME);
		$criteria->add(CargoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Cargo (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setNome($this->getNome());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getCargoPesquisas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCargoPesquisa($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getUsuarios() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUsuario($relObj->copy($deepCopy));
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
	 * @return     Cargo Clone of current object.
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
	 * @return     CargoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CargoPeer();
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
		if ('CargoPesquisa' == $relationName) {
			return $this->initCargoPesquisas();
		}
		if ('Usuario' == $relationName) {
			return $this->initUsuarios();
		}
	}

	/**
	 * Clears out the collCargoPesquisas collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCargoPesquisas()
	 */
	public function clearCargoPesquisas()
	{
		$this->collCargoPesquisas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCargoPesquisas collection.
	 *
	 * By default this just sets the collCargoPesquisas collection to an empty array (like clearcollCargoPesquisas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initCargoPesquisas($overrideExisting = true)
	{
		if (null !== $this->collCargoPesquisas && !$overrideExisting) {
			return;
		}
		$this->collCargoPesquisas = new PropelObjectCollection();
		$this->collCargoPesquisas->setModel('CargoPesquisa');
	}

	/**
	 * Gets an array of CargoPesquisa objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Cargo is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array CargoPesquisa[] List of CargoPesquisa objects
	 * @throws     PropelException
	 */
	public function getCargoPesquisas($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCargoPesquisas || null !== $criteria) {
			if ($this->isNew() && null === $this->collCargoPesquisas) {
				// return empty collection
				$this->initCargoPesquisas();
			} else {
				$collCargoPesquisas = CargoPesquisaQuery::create(null, $criteria)
					->filterByCargo($this)
					->find($con);
				if (null !== $criteria) {
					return $collCargoPesquisas;
				}
				$this->collCargoPesquisas = $collCargoPesquisas;
			}
		}
		return $this->collCargoPesquisas;
	}

	/**
	 * Sets a collection of CargoPesquisa objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $cargoPesquisas A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setCargoPesquisas(PropelCollection $cargoPesquisas, PropelPDO $con = null)
	{
		$this->cargoPesquisasScheduledForDeletion = $this->getCargoPesquisas(new Criteria(), $con)->diff($cargoPesquisas);

		foreach ($cargoPesquisas as $cargoPesquisa) {
			// Fix issue with collection modified by reference
			if ($cargoPesquisa->isNew()) {
				$cargoPesquisa->setCargo($this);
			}
			$this->addCargoPesquisa($cargoPesquisa);
		}

		$this->collCargoPesquisas = $cargoPesquisas;
	}

	/**
	 * Returns the number of related CargoPesquisa objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CargoPesquisa objects.
	 * @throws     PropelException
	 */
	public function countCargoPesquisas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCargoPesquisas || null !== $criteria) {
			if ($this->isNew() && null === $this->collCargoPesquisas) {
				return 0;
			} else {
				$query = CargoPesquisaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCargo($this)
					->count($con);
			}
		} else {
			return count($this->collCargoPesquisas);
		}
	}

	/**
	 * Method called to associate a CargoPesquisa object to this object
	 * through the CargoPesquisa foreign key attribute.
	 *
	 * @param      CargoPesquisa $l CargoPesquisa
	 * @return     Cargo The current object (for fluent API support)
	 */
	public function addCargoPesquisa(CargoPesquisa $l)
	{
		if ($this->collCargoPesquisas === null) {
			$this->initCargoPesquisas();
		}
		if (!$this->collCargoPesquisas->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddCargoPesquisa($l);
		}

		return $this;
	}

	/**
	 * @param	CargoPesquisa $cargoPesquisa The cargoPesquisa object to add.
	 */
	protected function doAddCargoPesquisa($cargoPesquisa)
	{
		$this->collCargoPesquisas[]= $cargoPesquisa;
		$cargoPesquisa->setCargo($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cargo is new, it will return
	 * an empty collection; or if this Cargo has previously
	 * been saved, it will retrieve related CargoPesquisas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cargo.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array CargoPesquisa[] List of CargoPesquisa objects
	 */
	public function getCargoPesquisasJoinPesquisa($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CargoPesquisaQuery::create(null, $criteria);
		$query->joinWith('Pesquisa', $join_behavior);

		return $this->getCargoPesquisas($query, $con);
	}

	/**
	 * Clears out the collUsuarios collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUsuarios()
	 */
	public function clearUsuarios()
	{
		$this->collUsuarios = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUsuarios collection.
	 *
	 * By default this just sets the collUsuarios collection to an empty array (like clearcollUsuarios());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initUsuarios($overrideExisting = true)
	{
		if (null !== $this->collUsuarios && !$overrideExisting) {
			return;
		}
		$this->collUsuarios = new PropelObjectCollection();
		$this->collUsuarios->setModel('Usuario');
	}

	/**
	 * Gets an array of Usuario objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Cargo is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Usuario[] List of Usuario objects
	 * @throws     PropelException
	 */
	public function getUsuarios($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collUsuarios || null !== $criteria) {
			if ($this->isNew() && null === $this->collUsuarios) {
				// return empty collection
				$this->initUsuarios();
			} else {
				$collUsuarios = UsuarioQuery::create(null, $criteria)
					->filterByCargo($this)
					->find($con);
				if (null !== $criteria) {
					return $collUsuarios;
				}
				$this->collUsuarios = $collUsuarios;
			}
		}
		return $this->collUsuarios;
	}

	/**
	 * Sets a collection of Usuario objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $usuarios A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setUsuarios(PropelCollection $usuarios, PropelPDO $con = null)
	{
		$this->usuariosScheduledForDeletion = $this->getUsuarios(new Criteria(), $con)->diff($usuarios);

		foreach ($usuarios as $usuario) {
			// Fix issue with collection modified by reference
			if ($usuario->isNew()) {
				$usuario->setCargo($this);
			}
			$this->addUsuario($usuario);
		}

		$this->collUsuarios = $usuarios;
	}

	/**
	 * Returns the number of related Usuario objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Usuario objects.
	 * @throws     PropelException
	 */
	public function countUsuarios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collUsuarios || null !== $criteria) {
			if ($this->isNew() && null === $this->collUsuarios) {
				return 0;
			} else {
				$query = UsuarioQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCargo($this)
					->count($con);
			}
		} else {
			return count($this->collUsuarios);
		}
	}

	/**
	 * Method called to associate a Usuario object to this object
	 * through the Usuario foreign key attribute.
	 *
	 * @param      Usuario $l Usuario
	 * @return     Cargo The current object (for fluent API support)
	 */
	public function addUsuario(Usuario $l)
	{
		if ($this->collUsuarios === null) {
			$this->initUsuarios();
		}
		if (!$this->collUsuarios->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddUsuario($l);
		}

		return $this;
	}

	/**
	 * @param	Usuario $usuario The usuario object to add.
	 */
	protected function doAddUsuario($usuario)
	{
		$this->collUsuarios[]= $usuario;
		$usuario->setCargo($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cargo is new, it will return
	 * an empty collection; or if this Cargo has previously
	 * been saved, it will retrieve related Usuarios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cargo.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Usuario[] List of Usuario objects
	 */
	public function getUsuariosJoinPerfil($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UsuarioQuery::create(null, $criteria);
		$query->joinWith('Perfil', $join_behavior);

		return $this->getUsuarios($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cargo is new, it will return
	 * an empty collection; or if this Cargo has previously
	 * been saved, it will retrieve related Usuarios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cargo.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Usuario[] List of Usuario objects
	 */
	public function getUsuariosJoinDepartamento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UsuarioQuery::create(null, $criteria);
		$query->joinWith('Departamento', $join_behavior);

		return $this->getUsuarios($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cargo is new, it will return
	 * an empty collection; or if this Cargo has previously
	 * been saved, it will retrieve related Usuarios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cargo.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Usuario[] List of Usuario objects
	 */
	public function getUsuariosJoinEndereco($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UsuarioQuery::create(null, $criteria);
		$query->joinWith('Endereco', $join_behavior);

		return $this->getUsuarios($query, $con);
	}

	/**
	 * Clears out the collPesquisas collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPesquisas()
	 */
	public function clearPesquisas()
	{
		$this->collPesquisas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPesquisas collection.
	 *
	 * By default this just sets the collPesquisas collection to an empty collection (like clearPesquisas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initPesquisas()
	{
		$this->collPesquisas = new PropelObjectCollection();
		$this->collPesquisas->setModel('Pesquisa');
	}

	/**
	 * Gets a collection of Pesquisa objects related by a many-to-many relationship
	 * to the current object by way of the cargo_pesquisa cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Cargo is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Pesquisa[] List of Pesquisa objects
	 */
	public function getPesquisas($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPesquisas || null !== $criteria) {
			if ($this->isNew() && null === $this->collPesquisas) {
				// return empty collection
				$this->initPesquisas();
			} else {
				$collPesquisas = PesquisaQuery::create(null, $criteria)
					->filterByCargo($this)
					->find($con);
				if (null !== $criteria) {
					return $collPesquisas;
				}
				$this->collPesquisas = $collPesquisas;
			}
		}
		return $this->collPesquisas;
	}

	/**
	 * Sets a collection of Pesquisa objects related by a many-to-many relationship
	 * to the current object by way of the cargo_pesquisa cross-reference table.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $pesquisas A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setPesquisas(PropelCollection $pesquisas, PropelPDO $con = null)
	{
		$cargoPesquisas = CargoPesquisaQuery::create()
			->filterByPesquisa($pesquisas)
			->filterByCargo($this)
			->find($con);

		$this->pesquisasScheduledForDeletion = $this->getCargoPesquisas()->diff($cargoPesquisas);
		$this->collCargoPesquisas = $cargoPesquisas;

		foreach ($pesquisas as $pesquisa) {
			// Fix issue with collection modified by reference
			if ($pesquisa->isNew()) {
				$this->doAddPesquisa($pesquisa);
			} else {
				$this->addPesquisa($pesquisa);
			}
		}

		$this->collPesquisas = $pesquisas;
	}

	/**
	 * Gets the number of Pesquisa objects related by a many-to-many relationship
	 * to the current object by way of the cargo_pesquisa cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Pesquisa objects
	 */
	public function countPesquisas($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPesquisas || null !== $criteria) {
			if ($this->isNew() && null === $this->collPesquisas) {
				return 0;
			} else {
				$query = PesquisaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCargo($this)
					->count($con);
			}
		} else {
			return count($this->collPesquisas);
		}
	}

	/**
	 * Associate a Pesquisa object to this object
	 * through the cargo_pesquisa cross reference table.
	 *
	 * @param      Pesquisa $pesquisa The CargoPesquisa object to relate
	 * @return     void
	 */
	public function addPesquisa(Pesquisa $pesquisa)
	{
		if ($this->collPesquisas === null) {
			$this->initPesquisas();
		}
		if (!$this->collPesquisas->contains($pesquisa)) { // only add it if the **same** object is not already associated
			$this->doAddPesquisa($pesquisa);

			$this->collPesquisas[]= $pesquisa;
		}
	}

	/**
	 * @param	Pesquisa $pesquisa The pesquisa object to add.
	 */
	protected function doAddPesquisa($pesquisa)
	{
		$cargoPesquisa = new CargoPesquisa();
		$cargoPesquisa->setPesquisa($pesquisa);
		$this->addCargoPesquisa($cargoPesquisa);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
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
			if ($this->collCargoPesquisas) {
				foreach ($this->collCargoPesquisas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collUsuarios) {
				foreach ($this->collUsuarios as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPesquisas) {
				foreach ($this->collPesquisas as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collCargoPesquisas instanceof PropelCollection) {
			$this->collCargoPesquisas->clearIterator();
		}
		$this->collCargoPesquisas = null;
		if ($this->collUsuarios instanceof PropelCollection) {
			$this->collUsuarios->clearIterator();
		}
		$this->collUsuarios = null;
		if ($this->collPesquisas instanceof PropelCollection) {
			$this->collPesquisas->clearIterator();
		}
		$this->collPesquisas = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(CargoPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseCargo
