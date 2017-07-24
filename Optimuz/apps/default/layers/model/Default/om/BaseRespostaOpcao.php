<?php


/**
 * Base class that represents a row from the 'resposta_opcao' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseRespostaOpcao extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'RespostaOpcaoPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        RespostaOpcaoPeer
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
	 * The value for the pergunta_id field.
	 * @var        int
	 */
	protected $pergunta_id;

	/**
	 * The value for the texto field.
	 * @var        string
	 */
	protected $texto;

	/**
	 * @var        Pergunta
	 */
	protected $aPergunta;

	/**
	 * @var        array Resposta[] Collection to store aggregation of Resposta objects.
	 */
	protected $collRespostas;

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
	protected $respostasScheduledForDeletion = null;

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
	 * Get the [pergunta_id] column value.
	 * 
	 * @return     int
	 */
	public function getPerguntaId()
	{
		return $this->pergunta_id;
	}

	/**
	 * Get the [texto] column value.
	 * 
	 * @return     string
	 */
	public function getTexto()
	{
		return $this->texto;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     RespostaOpcao The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RespostaOpcaoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [pergunta_id] column.
	 * 
	 * @param      int $v new value
	 * @return     RespostaOpcao The current object (for fluent API support)
	 */
	public function setPerguntaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->pergunta_id !== $v) {
			$this->pergunta_id = $v;
			$this->modifiedColumns[] = RespostaOpcaoPeer::PERGUNTA_ID;
		}

		if ($this->aPergunta !== null && $this->aPergunta->getId() !== $v) {
			$this->aPergunta = null;
		}

		return $this;
	} // setPerguntaId()

	/**
	 * Set the value of [texto] column.
	 * 
	 * @param      string $v new value
	 * @return     RespostaOpcao The current object (for fluent API support)
	 */
	public function setTexto($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->texto !== $v) {
			$this->texto = $v;
			$this->modifiedColumns[] = RespostaOpcaoPeer::TEXTO;
		}

		return $this;
	} // setTexto()

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
			$this->pergunta_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->texto = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 3; // 3 = RespostaOpcaoPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating RespostaOpcao object", $e);
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

		if ($this->aPergunta !== null && $this->pergunta_id !== $this->aPergunta->getId()) {
			$this->aPergunta = null;
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
			$con = Propel::getConnection(RespostaOpcaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = RespostaOpcaoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aPergunta = null;
			$this->collRespostas = null;

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
			$con = Propel::getConnection(RespostaOpcaoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = RespostaOpcaoQuery::create()
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
			$con = Propel::getConnection(RespostaOpcaoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				RespostaOpcaoPeer::addInstanceToPool($this);
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

			if ($this->aPergunta !== null) {
				if ($this->aPergunta->isModified() || $this->aPergunta->isNew()) {
					$affectedRows += $this->aPergunta->save($con);
				}
				$this->setPergunta($this->aPergunta);
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

			if ($this->respostasScheduledForDeletion !== null) {
				if (!$this->respostasScheduledForDeletion->isEmpty()) {
					RespostaQuery::create()
						->filterByPrimaryKeys($this->respostasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->respostasScheduledForDeletion = null;
				}
			}

			if ($this->collRespostas !== null) {
				foreach ($this->collRespostas as $referrerFK) {
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

		$this->modifiedColumns[] = RespostaOpcaoPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . RespostaOpcaoPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(RespostaOpcaoPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(RespostaOpcaoPeer::PERGUNTA_ID)) {
			$modifiedColumns[':p' . $index++]  = '`PERGUNTA_ID`';
		}
		if ($this->isColumnModified(RespostaOpcaoPeer::TEXTO)) {
			$modifiedColumns[':p' . $index++]  = '`TEXTO`';
		}

		$sql = sprintf(
			'INSERT INTO `resposta_opcao` (%s) VALUES (%s)',
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
					case '`PERGUNTA_ID`':
						$stmt->bindValue($identifier, $this->pergunta_id, PDO::PARAM_INT);
						break;
					case '`TEXTO`':
						$stmt->bindValue($identifier, $this->texto, PDO::PARAM_STR);
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
		$pos = RespostaOpcaoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getPerguntaId();
				break;
			case 2:
				return $this->getTexto();
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
		if (isset($alreadyDumpedObjects['RespostaOpcao'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['RespostaOpcao'][$this->getPrimaryKey()] = true;
		$keys = RespostaOpcaoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPerguntaId(),
			$keys[2] => $this->getTexto(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aPergunta) {
				$result['Pergunta'] = $this->aPergunta->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collRespostas) {
				$result['Respostas'] = $this->collRespostas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = RespostaOpcaoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setPerguntaId($value);
				break;
			case 2:
				$this->setTexto($value);
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
		$keys = RespostaOpcaoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPerguntaId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTexto($arr[$keys[2]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(RespostaOpcaoPeer::DATABASE_NAME);

		if ($this->isColumnModified(RespostaOpcaoPeer::ID)) $criteria->add(RespostaOpcaoPeer::ID, $this->id);
		if ($this->isColumnModified(RespostaOpcaoPeer::PERGUNTA_ID)) $criteria->add(RespostaOpcaoPeer::PERGUNTA_ID, $this->pergunta_id);
		if ($this->isColumnModified(RespostaOpcaoPeer::TEXTO)) $criteria->add(RespostaOpcaoPeer::TEXTO, $this->texto);

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
		$criteria = new Criteria(RespostaOpcaoPeer::DATABASE_NAME);
		$criteria->add(RespostaOpcaoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of RespostaOpcao (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setPerguntaId($this->getPerguntaId());
		$copyObj->setTexto($this->getTexto());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getRespostas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addResposta($relObj->copy($deepCopy));
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
	 * @return     RespostaOpcao Clone of current object.
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
	 * @return     RespostaOpcaoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new RespostaOpcaoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Pergunta object.
	 *
	 * @param      Pergunta $v
	 * @return     RespostaOpcao The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPergunta(Pergunta $v = null)
	{
		if ($v === null) {
			$this->setPerguntaId(NULL);
		} else {
			$this->setPerguntaId($v->getId());
		}

		$this->aPergunta = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Pergunta object, it will not be re-added.
		if ($v !== null) {
			$v->addRespostaOpcao($this);
		}

		return $this;
	}


	/**
	 * Get the associated Pergunta object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Pergunta The associated Pergunta object.
	 * @throws     PropelException
	 */
	public function getPergunta(PropelPDO $con = null)
	{
		if ($this->aPergunta === null && ($this->pergunta_id !== null)) {
			$this->aPergunta = PerguntaQuery::create()->findPk($this->pergunta_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aPergunta->addRespostaOpcaos($this);
			 */
		}
		return $this->aPergunta;
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
		if ('Resposta' == $relationName) {
			return $this->initRespostas();
		}
	}

	/**
	 * Clears out the collRespostas collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addRespostas()
	 */
	public function clearRespostas()
	{
		$this->collRespostas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collRespostas collection.
	 *
	 * By default this just sets the collRespostas collection to an empty array (like clearcollRespostas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initRespostas($overrideExisting = true)
	{
		if (null !== $this->collRespostas && !$overrideExisting) {
			return;
		}
		$this->collRespostas = new PropelObjectCollection();
		$this->collRespostas->setModel('Resposta');
	}

	/**
	 * Gets an array of Resposta objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this RespostaOpcao is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Resposta[] List of Resposta objects
	 * @throws     PropelException
	 */
	public function getRespostas($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collRespostas || null !== $criteria) {
			if ($this->isNew() && null === $this->collRespostas) {
				// return empty collection
				$this->initRespostas();
			} else {
				$collRespostas = RespostaQuery::create(null, $criteria)
					->filterByRespostaOpcao($this)
					->find($con);
				if (null !== $criteria) {
					return $collRespostas;
				}
				$this->collRespostas = $collRespostas;
			}
		}
		return $this->collRespostas;
	}

	/**
	 * Sets a collection of Resposta objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $respostas A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setRespostas(PropelCollection $respostas, PropelPDO $con = null)
	{
		$this->respostasScheduledForDeletion = $this->getRespostas(new Criteria(), $con)->diff($respostas);

		foreach ($respostas as $resposta) {
			// Fix issue with collection modified by reference
			if ($resposta->isNew()) {
				$resposta->setRespostaOpcao($this);
			}
			$this->addResposta($resposta);
		}

		$this->collRespostas = $respostas;
	}

	/**
	 * Returns the number of related Resposta objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Resposta objects.
	 * @throws     PropelException
	 */
	public function countRespostas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collRespostas || null !== $criteria) {
			if ($this->isNew() && null === $this->collRespostas) {
				return 0;
			} else {
				$query = RespostaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByRespostaOpcao($this)
					->count($con);
			}
		} else {
			return count($this->collRespostas);
		}
	}

	/**
	 * Method called to associate a Resposta object to this object
	 * through the Resposta foreign key attribute.
	 *
	 * @param      Resposta $l Resposta
	 * @return     RespostaOpcao The current object (for fluent API support)
	 */
	public function addResposta(Resposta $l)
	{
		if ($this->collRespostas === null) {
			$this->initRespostas();
		}
		if (!$this->collRespostas->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddResposta($l);
		}

		return $this;
	}

	/**
	 * @param	Resposta $resposta The resposta object to add.
	 */
	protected function doAddResposta($resposta)
	{
		$this->collRespostas[]= $resposta;
		$resposta->setRespostaOpcao($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this RespostaOpcao is new, it will return
	 * an empty collection; or if this RespostaOpcao has previously
	 * been saved, it will retrieve related Respostas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in RespostaOpcao.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Resposta[] List of Resposta objects
	 */
	public function getRespostasJoinFormulario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = RespostaQuery::create(null, $criteria);
		$query->joinWith('Formulario', $join_behavior);

		return $this->getRespostas($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this RespostaOpcao is new, it will return
	 * an empty collection; or if this RespostaOpcao has previously
	 * been saved, it will retrieve related Respostas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in RespostaOpcao.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Resposta[] List of Resposta objects
	 */
	public function getRespostasJoinPergunta($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = RespostaQuery::create(null, $criteria);
		$query->joinWith('Pergunta', $join_behavior);

		return $this->getRespostas($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->pergunta_id = null;
		$this->texto = null;
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
			if ($this->collRespostas) {
				foreach ($this->collRespostas as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collRespostas instanceof PropelCollection) {
			$this->collRespostas->clearIterator();
		}
		$this->collRespostas = null;
		$this->aPergunta = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(RespostaOpcaoPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseRespostaOpcao
