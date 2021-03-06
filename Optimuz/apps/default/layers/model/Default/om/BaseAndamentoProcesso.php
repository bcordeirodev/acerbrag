<?php


/**
 * Base class that represents a row from the 'andamento_processo' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseAndamentoProcesso extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'AndamentoProcessoPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        AndamentoProcessoPeer
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
	 * The value for the processo_id field.
	 * @var        int
	 */
	protected $processo_id;

	/**
	 * The value for the numero field.
	 * @var        string
	 */
	protected $numero;

	/**
	 * The value for the titulo field.
	 * @var        string
	 */
	protected $titulo;

	/**
	 * The value for the complemento field.
	 * @var        string
	 */
	protected $complemento;

	/**
	 * The value for the data_andamento field.
	 * @var        string
	 */
	protected $data_andamento;

	/**
	 * The value for the data_push field.
	 * @var        string
	 */
	protected $data_push;

	/**
	 * @var        Processo
	 */
	protected $aProcesso;

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
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [processo_id] column value.
	 * 
	 * @return     int
	 */
	public function getProcessoId()
	{
		return $this->processo_id;
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
	 * Get the [titulo] column value.
	 * 
	 * @return     string
	 */
	public function getTitulo()
	{
		return $this->titulo;
	}

	/**
	 * Get the [complemento] column value.
	 * 
	 * @return     string
	 */
	public function getComplemento()
	{
		return $this->complemento;
	}

	/**
	 * Get the [optionally formatted] temporal [data_andamento] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataAndamento($format = 'Y-m-d H:i:s')
	{
		if ($this->data_andamento === null) {
			return null;
		}


		if ($this->data_andamento === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_andamento);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_andamento, true), $x);
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
	 * Get the [optionally formatted] temporal [data_push] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataPush($format = 'Y-m-d H:i:s')
	{
		if ($this->data_push === null) {
			return null;
		}


		if ($this->data_push === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_push);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_push, true), $x);
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
	 * @return     AndamentoProcesso The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AndamentoProcessoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [processo_id] column.
	 * 
	 * @param      int $v new value
	 * @return     AndamentoProcesso The current object (for fluent API support)
	 */
	public function setProcessoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->processo_id !== $v) {
			$this->processo_id = $v;
			$this->modifiedColumns[] = AndamentoProcessoPeer::PROCESSO_ID;
		}

		if ($this->aProcesso !== null && $this->aProcesso->getId() !== $v) {
			$this->aProcesso = null;
		}

		return $this;
	} // setProcessoId()

	/**
	 * Set the value of [numero] column.
	 * 
	 * @param      string $v new value
	 * @return     AndamentoProcesso The current object (for fluent API support)
	 */
	public function setNumero($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->numero !== $v) {
			$this->numero = $v;
			$this->modifiedColumns[] = AndamentoProcessoPeer::NUMERO;
		}

		return $this;
	} // setNumero()

	/**
	 * Set the value of [titulo] column.
	 * 
	 * @param      string $v new value
	 * @return     AndamentoProcesso The current object (for fluent API support)
	 */
	public function setTitulo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->titulo !== $v) {
			$this->titulo = $v;
			$this->modifiedColumns[] = AndamentoProcessoPeer::TITULO;
		}

		return $this;
	} // setTitulo()

	/**
	 * Set the value of [complemento] column.
	 * 
	 * @param      string $v new value
	 * @return     AndamentoProcesso The current object (for fluent API support)
	 */
	public function setComplemento($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->complemento !== $v) {
			$this->complemento = $v;
			$this->modifiedColumns[] = AndamentoProcessoPeer::COMPLEMENTO;
		}

		return $this;
	} // setComplemento()

	/**
	 * Sets the value of [data_andamento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     AndamentoProcesso The current object (for fluent API support)
	 */
	public function setDataAndamento($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_andamento !== null || $dt !== null) {
			$currentDateAsString = ($this->data_andamento !== null && $tmpDt = new DateTime($this->data_andamento)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_andamento = $newDateAsString;
				$this->modifiedColumns[] = AndamentoProcessoPeer::DATA_ANDAMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataAndamento()

	/**
	 * Sets the value of [data_push] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     AndamentoProcesso The current object (for fluent API support)
	 */
	public function setDataPush($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_push !== null || $dt !== null) {
			$currentDateAsString = ($this->data_push !== null && $tmpDt = new DateTime($this->data_push)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_push = $newDateAsString;
				$this->modifiedColumns[] = AndamentoProcessoPeer::DATA_PUSH;
			}
		} // if either are not null

		return $this;
	} // setDataPush()

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
			$this->processo_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->numero = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->titulo = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->complemento = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->data_andamento = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->data_push = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 7; // 7 = AndamentoProcessoPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating AndamentoProcesso object", $e);
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

		if ($this->aProcesso !== null && $this->processo_id !== $this->aProcesso->getId()) {
			$this->aProcesso = null;
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
			$con = Propel::getConnection(AndamentoProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = AndamentoProcessoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aProcesso = null;
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
			$con = Propel::getConnection(AndamentoProcessoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = AndamentoProcessoQuery::create()
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
			$con = Propel::getConnection(AndamentoProcessoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				AndamentoProcessoPeer::addInstanceToPool($this);
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

			if ($this->aProcesso !== null) {
				if ($this->aProcesso->isModified() || $this->aProcesso->isNew()) {
					$affectedRows += $this->aProcesso->save($con);
				}
				$this->setProcesso($this->aProcesso);
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

		$this->modifiedColumns[] = AndamentoProcessoPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . AndamentoProcessoPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(AndamentoProcessoPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(AndamentoProcessoPeer::PROCESSO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`PROCESSO_ID`';
		}
		if ($this->isColumnModified(AndamentoProcessoPeer::NUMERO)) {
			$modifiedColumns[':p' . $index++]  = '`NUMERO`';
		}
		if ($this->isColumnModified(AndamentoProcessoPeer::TITULO)) {
			$modifiedColumns[':p' . $index++]  = '`TITULO`';
		}
		if ($this->isColumnModified(AndamentoProcessoPeer::COMPLEMENTO)) {
			$modifiedColumns[':p' . $index++]  = '`COMPLEMENTO`';
		}
		if ($this->isColumnModified(AndamentoProcessoPeer::DATA_ANDAMENTO)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_ANDAMENTO`';
		}
		if ($this->isColumnModified(AndamentoProcessoPeer::DATA_PUSH)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_PUSH`';
		}

		$sql = sprintf(
			'INSERT INTO `andamento_processo` (%s) VALUES (%s)',
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
					case '`PROCESSO_ID`':						
						$stmt->bindValue($identifier, $this->processo_id, PDO::PARAM_INT);
						break;
					case '`NUMERO`':						
						$stmt->bindValue($identifier, $this->numero, PDO::PARAM_STR);
						break;
					case '`TITULO`':						
						$stmt->bindValue($identifier, $this->titulo, PDO::PARAM_STR);
						break;
					case '`COMPLEMENTO`':						
						$stmt->bindValue($identifier, $this->complemento, PDO::PARAM_STR);
						break;
					case '`DATA_ANDAMENTO`':						
						$stmt->bindValue($identifier, $this->data_andamento, PDO::PARAM_STR);
						break;
					case '`DATA_PUSH`':						
						$stmt->bindValue($identifier, $this->data_push, PDO::PARAM_STR);
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
		$pos = AndamentoProcessoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getProcessoId();
				break;
			case 2:
				return $this->getNumero();
				break;
			case 3:
				return $this->getTitulo();
				break;
			case 4:
				return $this->getComplemento();
				break;
			case 5:
				return $this->getDataAndamento();
				break;
			case 6:
				return $this->getDataPush();
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
		if (isset($alreadyDumpedObjects['AndamentoProcesso'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['AndamentoProcesso'][$this->getPrimaryKey()] = true;
		$keys = AndamentoProcessoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getProcessoId(),
			$keys[2] => $this->getNumero(),
			$keys[3] => $this->getTitulo(),
			$keys[4] => $this->getComplemento(),
			$keys[5] => $this->getDataAndamento(),
			$keys[6] => $this->getDataPush(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aProcesso) {
				$result['Processo'] = $this->aProcesso->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
		$pos = AndamentoProcessoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setProcessoId($value);
				break;
			case 2:
				$this->setNumero($value);
				break;
			case 3:
				$this->setTitulo($value);
				break;
			case 4:
				$this->setComplemento($value);
				break;
			case 5:
				$this->setDataAndamento($value);
				break;
			case 6:
				$this->setDataPush($value);
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
		$keys = AndamentoProcessoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setProcessoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNumero($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTitulo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setComplemento($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDataAndamento($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDataPush($arr[$keys[6]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(AndamentoProcessoPeer::DATABASE_NAME);

		if ($this->isColumnModified(AndamentoProcessoPeer::ID)) $criteria->add(AndamentoProcessoPeer::ID, $this->id);
		if ($this->isColumnModified(AndamentoProcessoPeer::PROCESSO_ID)) $criteria->add(AndamentoProcessoPeer::PROCESSO_ID, $this->processo_id);
		if ($this->isColumnModified(AndamentoProcessoPeer::NUMERO)) $criteria->add(AndamentoProcessoPeer::NUMERO, $this->numero);
		if ($this->isColumnModified(AndamentoProcessoPeer::TITULO)) $criteria->add(AndamentoProcessoPeer::TITULO, $this->titulo);
		if ($this->isColumnModified(AndamentoProcessoPeer::COMPLEMENTO)) $criteria->add(AndamentoProcessoPeer::COMPLEMENTO, $this->complemento);
		if ($this->isColumnModified(AndamentoProcessoPeer::DATA_ANDAMENTO)) $criteria->add(AndamentoProcessoPeer::DATA_ANDAMENTO, $this->data_andamento);
		if ($this->isColumnModified(AndamentoProcessoPeer::DATA_PUSH)) $criteria->add(AndamentoProcessoPeer::DATA_PUSH, $this->data_push);

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
		$criteria = new Criteria(AndamentoProcessoPeer::DATABASE_NAME);
		$criteria->add(AndamentoProcessoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of AndamentoProcesso (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setProcessoId($this->getProcessoId());
		$copyObj->setNumero($this->getNumero());
		$copyObj->setTitulo($this->getTitulo());
		$copyObj->setComplemento($this->getComplemento());
		$copyObj->setDataAndamento($this->getDataAndamento());
		$copyObj->setDataPush($this->getDataPush());

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
	 * @return     AndamentoProcesso Clone of current object.
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
	 * @return     AndamentoProcessoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AndamentoProcessoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Processo object.
	 *
	 * @param      Processo $v
	 * @return     AndamentoProcesso The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setProcesso(Processo $v = null)
	{
		if ($v === null) {
			$this->setProcessoId(NULL);
		} else {
			$this->setProcessoId($v->getId());
		}

		$this->aProcesso = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Processo object, it will not be re-added.
		if ($v !== null) {
			$v->addAndamentoProcesso($this);
		}

		return $this;
	}


	/**
	 * Get the associated Processo object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Processo The associated Processo object.
	 * @throws     PropelException
	 */
	public function getProcesso(PropelPDO $con = null)
	{
		if ($this->aProcesso === null && ($this->processo_id !== null)) {
			$this->aProcesso = ProcessoQuery::create()->findPk($this->processo_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aProcesso->addAndamentoProcessos($this);
			 */
		}
		return $this->aProcesso;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->processo_id = null;
		$this->numero = null;
		$this->titulo = null;
		$this->complemento = null;
		$this->data_andamento = null;
		$this->data_push = null;
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

		$this->aProcesso = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(AndamentoProcessoPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseAndamentoProcesso
