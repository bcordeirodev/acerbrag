<?php


/**
 * Base class that represents a row from the 'tabulacao' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseTabulacao extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'TabulacaoPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        TabulacaoPeer
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
	 * The value for the tabulacao_id field.
	 * @var        int
	 */
	protected $tabulacao_id;

	/**
	 * The value for the nome field.
	 * @var        string
	 */
	protected $nome;

	/**
	 * The value for the ativo field.
	 * @var        boolean
	 */
	protected $ativo;

	/**
	 * @var        Tabulacao
	 */
	protected $aTabulacaoRelatedByTabulacaoId;

	/**
	 * @var        array Contato[] Collection to store aggregation of Contato objects.
	 */
	protected $collContatos;

	/**
	 * @var        array Tabulacao[] Collection to store aggregation of Tabulacao objects.
	 */
	protected $collTabulacaosRelatedById;

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
	protected $contatosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $tabulacaosRelatedByIdScheduledForDeletion = null;

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
	 * Get the [tabulacao_id] column value.
	 * 
	 * @return     int
	 */
	public function getTabulacaoId()
	{
		return $this->tabulacao_id;
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
	 * Get the [ativo] column value.
	 * 
	 * @return     boolean
	 */
	public function getAtivo()
	{
		return $this->ativo;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Tabulacao The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = TabulacaoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [tabulacao_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Tabulacao The current object (for fluent API support)
	 */
	public function setTabulacaoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->tabulacao_id !== $v) {
			$this->tabulacao_id = $v;
			$this->modifiedColumns[] = TabulacaoPeer::TABULACAO_ID;
		}

		if ($this->aTabulacaoRelatedByTabulacaoId !== null && $this->aTabulacaoRelatedByTabulacaoId->getId() !== $v) {
			$this->aTabulacaoRelatedByTabulacaoId = null;
		}

		return $this;
	} // setTabulacaoId()

	/**
	 * Set the value of [nome] column.
	 * 
	 * @param      string $v new value
	 * @return     Tabulacao The current object (for fluent API support)
	 */
	public function setNome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome !== $v) {
			$this->nome = $v;
			$this->modifiedColumns[] = TabulacaoPeer::NOME;
		}

		return $this;
	} // setNome()

	/**
	 * Sets the value of the [ativo] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Tabulacao The current object (for fluent API support)
	 */
	public function setAtivo($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->ativo !== $v) {
			$this->ativo = $v;
			$this->modifiedColumns[] = TabulacaoPeer::ATIVO;
		}

		return $this;
	} // setAtivo()

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
			$this->tabulacao_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->nome = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->ativo = ($row[$startcol + 3] !== null) ? (boolean) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 4; // 4 = TabulacaoPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Tabulacao object", $e);
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

		if ($this->aTabulacaoRelatedByTabulacaoId !== null && $this->tabulacao_id !== $this->aTabulacaoRelatedByTabulacaoId->getId()) {
			$this->aTabulacaoRelatedByTabulacaoId = null;
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
			$con = Propel::getConnection(TabulacaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = TabulacaoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aTabulacaoRelatedByTabulacaoId = null;
			$this->collContatos = null;

			$this->collTabulacaosRelatedById = null;

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
			$con = Propel::getConnection(TabulacaoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = TabulacaoQuery::create()
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
			$con = Propel::getConnection(TabulacaoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				TabulacaoPeer::addInstanceToPool($this);
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

			if ($this->aTabulacaoRelatedByTabulacaoId !== null) {
				if ($this->aTabulacaoRelatedByTabulacaoId->isModified() || $this->aTabulacaoRelatedByTabulacaoId->isNew()) {
					$affectedRows += $this->aTabulacaoRelatedByTabulacaoId->save($con);
				}
				$this->setTabulacaoRelatedByTabulacaoId($this->aTabulacaoRelatedByTabulacaoId);
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

			if ($this->contatosScheduledForDeletion !== null) {
				if (!$this->contatosScheduledForDeletion->isEmpty()) {
					ContatoQuery::create()
						->filterByPrimaryKeys($this->contatosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->contatosScheduledForDeletion = null;
				}
			}

			if ($this->collContatos !== null) {
				foreach ($this->collContatos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->tabulacaosRelatedByIdScheduledForDeletion !== null) {
				if (!$this->tabulacaosRelatedByIdScheduledForDeletion->isEmpty()) {
					TabulacaoQuery::create()
						->filterByPrimaryKeys($this->tabulacaosRelatedByIdScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->tabulacaosRelatedByIdScheduledForDeletion = null;
				}
			}

			if ($this->collTabulacaosRelatedById !== null) {
				foreach ($this->collTabulacaosRelatedById as $referrerFK) {
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

		$this->modifiedColumns[] = TabulacaoPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . TabulacaoPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(TabulacaoPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(TabulacaoPeer::TABULACAO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`TABULACAO_ID`';
		}
		if ($this->isColumnModified(TabulacaoPeer::NOME)) {
			$modifiedColumns[':p' . $index++]  = '`NOME`';
		}
		if ($this->isColumnModified(TabulacaoPeer::ATIVO)) {
			$modifiedColumns[':p' . $index++]  = '`ATIVO`';
		}

		$sql = sprintf(
			'INSERT INTO `tabulacao` (%s) VALUES (%s)',
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
					case '`TABULACAO_ID`':
						$stmt->bindValue($identifier, $this->tabulacao_id, PDO::PARAM_INT);
						break;
					case '`NOME`':
						$stmt->bindValue($identifier, $this->nome, PDO::PARAM_STR);
						break;
					case '`ATIVO`':
						$stmt->bindValue($identifier, (int) $this->ativo, PDO::PARAM_INT);
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
		$pos = TabulacaoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getTabulacaoId();
				break;
			case 2:
				return $this->getNome();
				break;
			case 3:
				return $this->getAtivo();
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
		if (isset($alreadyDumpedObjects['Tabulacao'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Tabulacao'][$this->getPrimaryKey()] = true;
		$keys = TabulacaoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTabulacaoId(),
			$keys[2] => $this->getNome(),
			$keys[3] => $this->getAtivo(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aTabulacaoRelatedByTabulacaoId) {
				$result['TabulacaoRelatedByTabulacaoId'] = $this->aTabulacaoRelatedByTabulacaoId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collContatos) {
				$result['Contatos'] = $this->collContatos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collTabulacaosRelatedById) {
				$result['TabulacaosRelatedById'] = $this->collTabulacaosRelatedById->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = TabulacaoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setTabulacaoId($value);
				break;
			case 2:
				$this->setNome($value);
				break;
			case 3:
				$this->setAtivo($value);
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
		$keys = TabulacaoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTabulacaoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNome($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAtivo($arr[$keys[3]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(TabulacaoPeer::DATABASE_NAME);

		if ($this->isColumnModified(TabulacaoPeer::ID)) $criteria->add(TabulacaoPeer::ID, $this->id);
		if ($this->isColumnModified(TabulacaoPeer::TABULACAO_ID)) $criteria->add(TabulacaoPeer::TABULACAO_ID, $this->tabulacao_id);
		if ($this->isColumnModified(TabulacaoPeer::NOME)) $criteria->add(TabulacaoPeer::NOME, $this->nome);
		if ($this->isColumnModified(TabulacaoPeer::ATIVO)) $criteria->add(TabulacaoPeer::ATIVO, $this->ativo);

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
		$criteria = new Criteria(TabulacaoPeer::DATABASE_NAME);
		$criteria->add(TabulacaoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Tabulacao (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setTabulacaoId($this->getTabulacaoId());
		$copyObj->setNome($this->getNome());
		$copyObj->setAtivo($this->getAtivo());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getContatos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addContato($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getTabulacaosRelatedById() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addTabulacaoRelatedById($relObj->copy($deepCopy));
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
	 * @return     Tabulacao Clone of current object.
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
	 * @return     TabulacaoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new TabulacaoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Tabulacao object.
	 *
	 * @param      Tabulacao $v
	 * @return     Tabulacao The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setTabulacaoRelatedByTabulacaoId(Tabulacao $v = null)
	{
		if ($v === null) {
			$this->setTabulacaoId(NULL);
		} else {
			$this->setTabulacaoId($v->getId());
		}

		$this->aTabulacaoRelatedByTabulacaoId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Tabulacao object, it will not be re-added.
		if ($v !== null) {
			$v->addTabulacaoRelatedById($this);
		}

		return $this;
	}


	/**
	 * Get the associated Tabulacao object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Tabulacao The associated Tabulacao object.
	 * @throws     PropelException
	 */
	public function getTabulacaoRelatedByTabulacaoId(PropelPDO $con = null)
	{
		if ($this->aTabulacaoRelatedByTabulacaoId === null && ($this->tabulacao_id !== null)) {
			$this->aTabulacaoRelatedByTabulacaoId = TabulacaoQuery::create()->findPk($this->tabulacao_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aTabulacaoRelatedByTabulacaoId->addTabulacaosRelatedById($this);
			 */
		}
		return $this->aTabulacaoRelatedByTabulacaoId;
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
		if ('Contato' == $relationName) {
			return $this->initContatos();
		}
		if ('TabulacaoRelatedById' == $relationName) {
			return $this->initTabulacaosRelatedById();
		}
	}

	/**
	 * Clears out the collContatos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addContatos()
	 */
	public function clearContatos()
	{
		$this->collContatos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collContatos collection.
	 *
	 * By default this just sets the collContatos collection to an empty array (like clearcollContatos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initContatos($overrideExisting = true)
	{
		if (null !== $this->collContatos && !$overrideExisting) {
			return;
		}
		$this->collContatos = new PropelObjectCollection();
		$this->collContatos->setModel('Contato');
	}

	/**
	 * Gets an array of Contato objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Tabulacao is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Contato[] List of Contato objects
	 * @throws     PropelException
	 */
	public function getContatos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collContatos || null !== $criteria) {
			if ($this->isNew() && null === $this->collContatos) {
				// return empty collection
				$this->initContatos();
			} else {
				$collContatos = ContatoQuery::create(null, $criteria)
					->filterByTabulacao($this)
					->find($con);
				if (null !== $criteria) {
					return $collContatos;
				}
				$this->collContatos = $collContatos;
			}
		}
		return $this->collContatos;
	}

	/**
	 * Sets a collection of Contato objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $contatos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setContatos(PropelCollection $contatos, PropelPDO $con = null)
	{
		$this->contatosScheduledForDeletion = $this->getContatos(new Criteria(), $con)->diff($contatos);

		foreach ($contatos as $contato) {
			// Fix issue with collection modified by reference
			if ($contato->isNew()) {
				$contato->setTabulacao($this);
			}
			$this->addContato($contato);
		}

		$this->collContatos = $contatos;
	}

	/**
	 * Returns the number of related Contato objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Contato objects.
	 * @throws     PropelException
	 */
	public function countContatos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collContatos || null !== $criteria) {
			if ($this->isNew() && null === $this->collContatos) {
				return 0;
			} else {
				$query = ContatoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByTabulacao($this)
					->count($con);
			}
		} else {
			return count($this->collContatos);
		}
	}

	/**
	 * Method called to associate a Contato object to this object
	 * through the Contato foreign key attribute.
	 *
	 * @param      Contato $l Contato
	 * @return     Tabulacao The current object (for fluent API support)
	 */
	public function addContato(Contato $l)
	{
		if ($this->collContatos === null) {
			$this->initContatos();
		}
		if (!$this->collContatos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddContato($l);
		}

		return $this;
	}

	/**
	 * @param	Contato $contato The contato object to add.
	 */
	protected function doAddContato($contato)
	{
		$this->collContatos[]= $contato;
		$contato->setTabulacao($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Tabulacao is new, it will return
	 * an empty collection; or if this Tabulacao has previously
	 * been saved, it will retrieve related Contatos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Tabulacao.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Contato[] List of Contato objects
	 */
	public function getContatosJoinComunicado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ContatoQuery::create(null, $criteria);
		$query->joinWith('Comunicado', $join_behavior);

		return $this->getContatos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Tabulacao is new, it will return
	 * an empty collection; or if this Tabulacao has previously
	 * been saved, it will retrieve related Contatos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Tabulacao.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Contato[] List of Contato objects
	 */
	public function getContatosJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ContatoQuery::create(null, $criteria);
		$query->joinWith('Usuario', $join_behavior);

		return $this->getContatos($query, $con);
	}

	/**
	 * Clears out the collTabulacaosRelatedById collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addTabulacaosRelatedById()
	 */
	public function clearTabulacaosRelatedById()
	{
		$this->collTabulacaosRelatedById = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collTabulacaosRelatedById collection.
	 *
	 * By default this just sets the collTabulacaosRelatedById collection to an empty array (like clearcollTabulacaosRelatedById());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initTabulacaosRelatedById($overrideExisting = true)
	{
		if (null !== $this->collTabulacaosRelatedById && !$overrideExisting) {
			return;
		}
		$this->collTabulacaosRelatedById = new PropelObjectCollection();
		$this->collTabulacaosRelatedById->setModel('Tabulacao');
	}

	/**
	 * Gets an array of Tabulacao objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Tabulacao is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Tabulacao[] List of Tabulacao objects
	 * @throws     PropelException
	 */
	public function getTabulacaosRelatedById($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collTabulacaosRelatedById || null !== $criteria) {
			if ($this->isNew() && null === $this->collTabulacaosRelatedById) {
				// return empty collection
				$this->initTabulacaosRelatedById();
			} else {
				$collTabulacaosRelatedById = TabulacaoQuery::create(null, $criteria)
					->filterByTabulacaoRelatedByTabulacaoId($this)
					->find($con);
				if (null !== $criteria) {
					return $collTabulacaosRelatedById;
				}
				$this->collTabulacaosRelatedById = $collTabulacaosRelatedById;
			}
		}
		return $this->collTabulacaosRelatedById;
	}

	/**
	 * Sets a collection of TabulacaoRelatedById objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $tabulacaosRelatedById A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setTabulacaosRelatedById(PropelCollection $tabulacaosRelatedById, PropelPDO $con = null)
	{
		$this->tabulacaosRelatedByIdScheduledForDeletion = $this->getTabulacaosRelatedById(new Criteria(), $con)->diff($tabulacaosRelatedById);

		foreach ($tabulacaosRelatedById as $tabulacaoRelatedById) {
			// Fix issue with collection modified by reference
			if ($tabulacaoRelatedById->isNew()) {
				$tabulacaoRelatedById->setTabulacaoRelatedByTabulacaoId($this);
			}
			$this->addTabulacaoRelatedById($tabulacaoRelatedById);
		}

		$this->collTabulacaosRelatedById = $tabulacaosRelatedById;
	}

	/**
	 * Returns the number of related Tabulacao objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Tabulacao objects.
	 * @throws     PropelException
	 */
	public function countTabulacaosRelatedById(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collTabulacaosRelatedById || null !== $criteria) {
			if ($this->isNew() && null === $this->collTabulacaosRelatedById) {
				return 0;
			} else {
				$query = TabulacaoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByTabulacaoRelatedByTabulacaoId($this)
					->count($con);
			}
		} else {
			return count($this->collTabulacaosRelatedById);
		}
	}

	/**
	 * Method called to associate a Tabulacao object to this object
	 * through the Tabulacao foreign key attribute.
	 *
	 * @param      Tabulacao $l Tabulacao
	 * @return     Tabulacao The current object (for fluent API support)
	 */
	public function addTabulacaoRelatedById(Tabulacao $l)
	{
		if ($this->collTabulacaosRelatedById === null) {
			$this->initTabulacaosRelatedById();
		}
		if (!$this->collTabulacaosRelatedById->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddTabulacaoRelatedById($l);
		}

		return $this;
	}

	/**
	 * @param	TabulacaoRelatedById $tabulacaoRelatedById The tabulacaoRelatedById object to add.
	 */
	protected function doAddTabulacaoRelatedById($tabulacaoRelatedById)
	{
		$this->collTabulacaosRelatedById[]= $tabulacaoRelatedById;
		$tabulacaoRelatedById->setTabulacaoRelatedByTabulacaoId($this);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->tabulacao_id = null;
		$this->nome = null;
		$this->ativo = null;
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
			if ($this->collContatos) {
				foreach ($this->collContatos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collTabulacaosRelatedById) {
				foreach ($this->collTabulacaosRelatedById as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collContatos instanceof PropelCollection) {
			$this->collContatos->clearIterator();
		}
		$this->collContatos = null;
		if ($this->collTabulacaosRelatedById instanceof PropelCollection) {
			$this->collTabulacaosRelatedById->clearIterator();
		}
		$this->collTabulacaosRelatedById = null;
		$this->aTabulacaoRelatedByTabulacaoId = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(TabulacaoPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseTabulacao