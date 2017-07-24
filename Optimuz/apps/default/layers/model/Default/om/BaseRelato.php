<?php


/**
 * Base class that represents a row from the 'relato' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseRelato extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'RelatoPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        RelatoPeer
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
	 * The value for the descricao field.
	 * @var        string
	 */
	protected $descricao;

	/**
	 * The value for the data_criacao field.
	 * @var        string
	 */
	protected $data_criacao;

	/**
	 * @var        array CasoRelato[] Collection to store aggregation of CasoRelato objects.
	 */
	protected $collCasoRelatos;

	/**
	 * @var        array ProcessoRelato[] Collection to store aggregation of ProcessoRelato objects.
	 */
	protected $collProcessoRelatos;

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
	protected $casoRelatosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $processoRelatosScheduledForDeletion = null;

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
	 * Get the [descricao] column value.
	 * 
	 * @return     string
	 */
	public function getDescricao()
	{
		return $this->descricao;
	}

	/**
	 * Get the [optionally formatted] temporal [data_criacao] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataCriacao($format = 'Y-m-d H:i:s')
	{
		if ($this->data_criacao === null) {
			return null;
		}


		if ($this->data_criacao === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_criacao);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_criacao, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Relato The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RelatoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [descricao] column.
	 * 
	 * @param      string $v new value
	 * @return     Relato The current object (for fluent API support)
	 */
	public function setDescricao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descricao !== $v) {
			$this->descricao = $v;
			$this->modifiedColumns[] = RelatoPeer::DESCRICAO;
		}

		return $this;
	} // setDescricao()

	/**
	 * Sets the value of [data_criacao] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Relato The current object (for fluent API support)
	 */
	public function setDataCriacao($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_criacao !== null || $dt !== null) {
			$currentDateAsString = ($this->data_criacao !== null && $tmpDt = new DateTime($this->data_criacao)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_criacao = $newDateAsString;
				$this->modifiedColumns[] = RelatoPeer::DATA_CRIACAO;
			}
		} // if either are not null

		return $this;
	} // setDataCriacao()

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
			$this->descricao = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->data_criacao = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 3; // 3 = RelatoPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Relato object", $e);
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
			$con = Propel::getConnection(RelatoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = RelatoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collCasoRelatos = null;

			$this->collProcessoRelatos = null;

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
			$con = Propel::getConnection(RelatoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = RelatoQuery::create()
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
			$con = Propel::getConnection(RelatoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				RelatoPeer::addInstanceToPool($this);
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

			if ($this->casoRelatosScheduledForDeletion !== null) {
				if (!$this->casoRelatosScheduledForDeletion->isEmpty()) {
					CasoRelatoQuery::create()
						->filterByPrimaryKeys($this->casoRelatosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->casoRelatosScheduledForDeletion = null;
				}
			}

			if ($this->collCasoRelatos !== null) {
				foreach ($this->collCasoRelatos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->processoRelatosScheduledForDeletion !== null) {
				if (!$this->processoRelatosScheduledForDeletion->isEmpty()) {
					ProcessoRelatoQuery::create()
						->filterByPrimaryKeys($this->processoRelatosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->processoRelatosScheduledForDeletion = null;
				}
			}

			if ($this->collProcessoRelatos !== null) {
				foreach ($this->collProcessoRelatos as $referrerFK) {
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

		$this->modifiedColumns[] = RelatoPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . RelatoPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(RelatoPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(RelatoPeer::DESCRICAO)) {
			$modifiedColumns[':p' . $index++]  = '`DESCRICAO`';
		}
		if ($this->isColumnModified(RelatoPeer::DATA_CRIACAO)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_CRIACAO`';
		}

		$sql = sprintf(
			'INSERT INTO `relato` (%s) VALUES (%s)',
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
					case '`DESCRICAO`':
						$stmt->bindValue($identifier, $this->descricao, PDO::PARAM_STR);
						break;
					case '`DATA_CRIACAO`':
						$stmt->bindValue($identifier, $this->data_criacao, PDO::PARAM_STR);
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
		$pos = RelatoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDescricao();
				break;
			case 2:
				return $this->getDataCriacao();
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
		if (isset($alreadyDumpedObjects['Relato'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Relato'][$this->getPrimaryKey()] = true;
		$keys = RelatoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getDescricao(),
			$keys[2] => $this->getDataCriacao(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->collCasoRelatos) {
				$result['CasoRelatos'] = $this->collCasoRelatos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collProcessoRelatos) {
				$result['ProcessoRelatos'] = $this->collProcessoRelatos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = RelatoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDescricao($value);
				break;
			case 2:
				$this->setDataCriacao($value);
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
		$keys = RelatoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDescricao($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDataCriacao($arr[$keys[2]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(RelatoPeer::DATABASE_NAME);

		if ($this->isColumnModified(RelatoPeer::ID)) $criteria->add(RelatoPeer::ID, $this->id);
		if ($this->isColumnModified(RelatoPeer::DESCRICAO)) $criteria->add(RelatoPeer::DESCRICAO, $this->descricao);
		if ($this->isColumnModified(RelatoPeer::DATA_CRIACAO)) $criteria->add(RelatoPeer::DATA_CRIACAO, $this->data_criacao);

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
		$criteria = new Criteria(RelatoPeer::DATABASE_NAME);
		$criteria->add(RelatoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Relato (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setDescricao($this->getDescricao());
		$copyObj->setDataCriacao($this->getDataCriacao());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getCasoRelatos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCasoRelato($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getProcessoRelatos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProcessoRelato($relObj->copy($deepCopy));
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
	 * @return     Relato Clone of current object.
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
	 * @return     RelatoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new RelatoPeer();
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
		if ('CasoRelato' == $relationName) {
			return $this->initCasoRelatos();
		}
		if ('ProcessoRelato' == $relationName) {
			return $this->initProcessoRelatos();
		}
	}

	/**
	 * Clears out the collCasoRelatos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCasoRelatos()
	 */
	public function clearCasoRelatos()
	{
		$this->collCasoRelatos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCasoRelatos collection.
	 *
	 * By default this just sets the collCasoRelatos collection to an empty array (like clearcollCasoRelatos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initCasoRelatos($overrideExisting = true)
	{
		if (null !== $this->collCasoRelatos && !$overrideExisting) {
			return;
		}
		$this->collCasoRelatos = new PropelObjectCollection();
		$this->collCasoRelatos->setModel('CasoRelato');
	}

	/**
	 * Gets an array of CasoRelato objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Relato is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array CasoRelato[] List of CasoRelato objects
	 * @throws     PropelException
	 */
	public function getCasoRelatos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCasoRelatos || null !== $criteria) {
			if ($this->isNew() && null === $this->collCasoRelatos) {
				// return empty collection
				$this->initCasoRelatos();
			} else {
				$collCasoRelatos = CasoRelatoQuery::create(null, $criteria)
					->filterByRelato($this)
					->find($con);
				if (null !== $criteria) {
					return $collCasoRelatos;
				}
				$this->collCasoRelatos = $collCasoRelatos;
			}
		}
		return $this->collCasoRelatos;
	}

	/**
	 * Sets a collection of CasoRelato objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $casoRelatos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setCasoRelatos(PropelCollection $casoRelatos, PropelPDO $con = null)
	{
		$this->casoRelatosScheduledForDeletion = $this->getCasoRelatos(new Criteria(), $con)->diff($casoRelatos);

		foreach ($casoRelatos as $casoRelato) {
			// Fix issue with collection modified by reference
			if ($casoRelato->isNew()) {
				$casoRelato->setRelato($this);
			}
			$this->addCasoRelato($casoRelato);
		}

		$this->collCasoRelatos = $casoRelatos;
	}

	/**
	 * Returns the number of related CasoRelato objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CasoRelato objects.
	 * @throws     PropelException
	 */
	public function countCasoRelatos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCasoRelatos || null !== $criteria) {
			if ($this->isNew() && null === $this->collCasoRelatos) {
				return 0;
			} else {
				$query = CasoRelatoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByRelato($this)
					->count($con);
			}
		} else {
			return count($this->collCasoRelatos);
		}
	}

	/**
	 * Method called to associate a CasoRelato object to this object
	 * through the CasoRelato foreign key attribute.
	 *
	 * @param      CasoRelato $l CasoRelato
	 * @return     Relato The current object (for fluent API support)
	 */
	public function addCasoRelato(CasoRelato $l)
	{
		if ($this->collCasoRelatos === null) {
			$this->initCasoRelatos();
		}
		if (!$this->collCasoRelatos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddCasoRelato($l);
		}

		return $this;
	}

	/**
	 * @param	CasoRelato $casoRelato The casoRelato object to add.
	 */
	protected function doAddCasoRelato($casoRelato)
	{
		$this->collCasoRelatos[]= $casoRelato;
		$casoRelato->setRelato($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Relato is new, it will return
	 * an empty collection; or if this Relato has previously
	 * been saved, it will retrieve related CasoRelatos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Relato.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array CasoRelato[] List of CasoRelato objects
	 */
	public function getCasoRelatosJoinCaso($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CasoRelatoQuery::create(null, $criteria);
		$query->joinWith('Caso', $join_behavior);

		return $this->getCasoRelatos($query, $con);
	}

	/**
	 * Clears out the collProcessoRelatos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProcessoRelatos()
	 */
	public function clearProcessoRelatos()
	{
		$this->collProcessoRelatos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProcessoRelatos collection.
	 *
	 * By default this just sets the collProcessoRelatos collection to an empty array (like clearcollProcessoRelatos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initProcessoRelatos($overrideExisting = true)
	{
		if (null !== $this->collProcessoRelatos && !$overrideExisting) {
			return;
		}
		$this->collProcessoRelatos = new PropelObjectCollection();
		$this->collProcessoRelatos->setModel('ProcessoRelato');
	}

	/**
	 * Gets an array of ProcessoRelato objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Relato is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ProcessoRelato[] List of ProcessoRelato objects
	 * @throws     PropelException
	 */
	public function getProcessoRelatos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collProcessoRelatos || null !== $criteria) {
			if ($this->isNew() && null === $this->collProcessoRelatos) {
				// return empty collection
				$this->initProcessoRelatos();
			} else {
				$collProcessoRelatos = ProcessoRelatoQuery::create(null, $criteria)
					->filterByRelato($this)
					->find($con);
				if (null !== $criteria) {
					return $collProcessoRelatos;
				}
				$this->collProcessoRelatos = $collProcessoRelatos;
			}
		}
		return $this->collProcessoRelatos;
	}

	/**
	 * Sets a collection of ProcessoRelato objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $processoRelatos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setProcessoRelatos(PropelCollection $processoRelatos, PropelPDO $con = null)
	{
		$this->processoRelatosScheduledForDeletion = $this->getProcessoRelatos(new Criteria(), $con)->diff($processoRelatos);

		foreach ($processoRelatos as $processoRelato) {
			// Fix issue with collection modified by reference
			if ($processoRelato->isNew()) {
				$processoRelato->setRelato($this);
			}
			$this->addProcessoRelato($processoRelato);
		}

		$this->collProcessoRelatos = $processoRelatos;
	}

	/**
	 * Returns the number of related ProcessoRelato objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ProcessoRelato objects.
	 * @throws     PropelException
	 */
	public function countProcessoRelatos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collProcessoRelatos || null !== $criteria) {
			if ($this->isNew() && null === $this->collProcessoRelatos) {
				return 0;
			} else {
				$query = ProcessoRelatoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByRelato($this)
					->count($con);
			}
		} else {
			return count($this->collProcessoRelatos);
		}
	}

	/**
	 * Method called to associate a ProcessoRelato object to this object
	 * through the ProcessoRelato foreign key attribute.
	 *
	 * @param      ProcessoRelato $l ProcessoRelato
	 * @return     Relato The current object (for fluent API support)
	 */
	public function addProcessoRelato(ProcessoRelato $l)
	{
		if ($this->collProcessoRelatos === null) {
			$this->initProcessoRelatos();
		}
		if (!$this->collProcessoRelatos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddProcessoRelato($l);
		}

		return $this;
	}

	/**
	 * @param	ProcessoRelato $processoRelato The processoRelato object to add.
	 */
	protected function doAddProcessoRelato($processoRelato)
	{
		$this->collProcessoRelatos[]= $processoRelato;
		$processoRelato->setRelato($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Relato is new, it will return
	 * an empty collection; or if this Relato has previously
	 * been saved, it will retrieve related ProcessoRelatos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Relato.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ProcessoRelato[] List of ProcessoRelato objects
	 */
	public function getProcessoRelatosJoinProcesso($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ProcessoRelatoQuery::create(null, $criteria);
		$query->joinWith('Processo', $join_behavior);

		return $this->getProcessoRelatos($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->descricao = null;
		$this->data_criacao = null;
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
			if ($this->collCasoRelatos) {
				foreach ($this->collCasoRelatos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collProcessoRelatos) {
				foreach ($this->collProcessoRelatos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collCasoRelatos instanceof PropelCollection) {
			$this->collCasoRelatos->clearIterator();
		}
		$this->collCasoRelatos = null;
		if ($this->collProcessoRelatos instanceof PropelCollection) {
			$this->collProcessoRelatos->clearIterator();
		}
		$this->collProcessoRelatos = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(RelatoPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseRelato
