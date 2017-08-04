<?php


/**
 * Base class that represents a row from the 'resposta_forum' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseRespostaForum extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'RespostaForumPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        RespostaForumPeer
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
	 * The value for the forum_id field.
	 * @var        int
	 */
	protected $forum_id;

	/**
	 * The value for the usuario_id field.
	 * @var        int
	 */
	protected $usuario_id;

	/**
	 * The value for the data_resposta field.
	 * @var        string
	 */
	protected $data_resposta;

	/**
	 * The value for the descricao field.
	 * @var        string
	 */
	protected $descricao;

	/**
	 * @var        Forum
	 */
	protected $aForum;

	/**
	 * @var        Usuario
	 */
	protected $aUsuario;

	/**
	 * @var        array AvaliacaoRespostaForum[] Collection to store aggregation of AvaliacaoRespostaForum objects.
	 */
	protected $collAvaliacaoRespostaForums;

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
	protected $avaliacaoRespostaForumsScheduledForDeletion = null;

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
	 * Get the [forum_id] column value.
	 * 
	 * @return     int
	 */
	public function getForumId()
	{
		return $this->forum_id;
	}

	/**
	 * Get the [usuario_id] column value.
	 * 
	 * @return     int
	 */
	public function getUsuarioId()
	{
		return $this->usuario_id;
	}

	/**
	 * Get the [optionally formatted] temporal [data_resposta] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataResposta($format = 'Y-m-d H:i:s')
	{
		if ($this->data_resposta === null) {
			return null;
		}


		if ($this->data_resposta === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_resposta);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_resposta, true), $x);
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
	 * Get the [descricao] column value.
	 * 
	 * @return     string
	 */
	public function getDescricao()
	{
		return $this->descricao;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     RespostaForum The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RespostaForumPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [forum_id] column.
	 * 
	 * @param      int $v new value
	 * @return     RespostaForum The current object (for fluent API support)
	 */
	public function setForumId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->forum_id !== $v) {
			$this->forum_id = $v;
			$this->modifiedColumns[] = RespostaForumPeer::FORUM_ID;
		}

		if ($this->aForum !== null && $this->aForum->getId() !== $v) {
			$this->aForum = null;
		}

		return $this;
	} // setForumId()

	/**
	 * Set the value of [usuario_id] column.
	 * 
	 * @param      int $v new value
	 * @return     RespostaForum The current object (for fluent API support)
	 */
	public function setUsuarioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->usuario_id !== $v) {
			$this->usuario_id = $v;
			$this->modifiedColumns[] = RespostaForumPeer::USUARIO_ID;
		}

		if ($this->aUsuario !== null && $this->aUsuario->getId() !== $v) {
			$this->aUsuario = null;
		}

		return $this;
	} // setUsuarioId()

	/**
	 * Sets the value of [data_resposta] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     RespostaForum The current object (for fluent API support)
	 */
	public function setDataResposta($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_resposta !== null || $dt !== null) {
			$currentDateAsString = ($this->data_resposta !== null && $tmpDt = new DateTime($this->data_resposta)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_resposta = $newDateAsString;
				$this->modifiedColumns[] = RespostaForumPeer::DATA_RESPOSTA;
			}
		} // if either are not null

		return $this;
	} // setDataResposta()

	/**
	 * Set the value of [descricao] column.
	 * 
	 * @param      string $v new value
	 * @return     RespostaForum The current object (for fluent API support)
	 */
	public function setDescricao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descricao !== $v) {
			$this->descricao = $v;
			$this->modifiedColumns[] = RespostaForumPeer::DESCRICAO;
		}

		return $this;
	} // setDescricao()

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
			$this->forum_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->usuario_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->data_resposta = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->descricao = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 5; // 5 = RespostaForumPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating RespostaForum object", $e);
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

		if ($this->aForum !== null && $this->forum_id !== $this->aForum->getId()) {
			$this->aForum = null;
		}
		if ($this->aUsuario !== null && $this->usuario_id !== $this->aUsuario->getId()) {
			$this->aUsuario = null;
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
			$con = Propel::getConnection(RespostaForumPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = RespostaForumPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aForum = null;
			$this->aUsuario = null;
			$this->collAvaliacaoRespostaForums = null;

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
			$con = Propel::getConnection(RespostaForumPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = RespostaForumQuery::create()
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
			$con = Propel::getConnection(RespostaForumPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				RespostaForumPeer::addInstanceToPool($this);
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

			if ($this->aForum !== null) {
				if ($this->aForum->isModified() || $this->aForum->isNew()) {
					$affectedRows += $this->aForum->save($con);
				}
				$this->setForum($this->aForum);
			}

			if ($this->aUsuario !== null) {
				if ($this->aUsuario->isModified() || $this->aUsuario->isNew()) {
					$affectedRows += $this->aUsuario->save($con);
				}
				$this->setUsuario($this->aUsuario);
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

			if ($this->avaliacaoRespostaForumsScheduledForDeletion !== null) {
				if (!$this->avaliacaoRespostaForumsScheduledForDeletion->isEmpty()) {
					AvaliacaoRespostaForumQuery::create()
						->filterByPrimaryKeys($this->avaliacaoRespostaForumsScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->avaliacaoRespostaForumsScheduledForDeletion = null;
				}
			}

			if ($this->collAvaliacaoRespostaForums !== null) {
				foreach ($this->collAvaliacaoRespostaForums as $referrerFK) {
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

		$this->modifiedColumns[] = RespostaForumPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . RespostaForumPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(RespostaForumPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(RespostaForumPeer::FORUM_ID)) {
			$modifiedColumns[':p' . $index++]  = '`FORUM_ID`';
		}
		if ($this->isColumnModified(RespostaForumPeer::USUARIO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`USUARIO_ID`';
		}
		if ($this->isColumnModified(RespostaForumPeer::DATA_RESPOSTA)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_RESPOSTA`';
		}
		if ($this->isColumnModified(RespostaForumPeer::DESCRICAO)) {
			$modifiedColumns[':p' . $index++]  = '`DESCRICAO`';
		}

		$sql = sprintf(
			'INSERT INTO `resposta_forum` (%s) VALUES (%s)',
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
					case '`FORUM_ID`':						
						$stmt->bindValue($identifier, $this->forum_id, PDO::PARAM_INT);
						break;
					case '`USUARIO_ID`':						
						$stmt->bindValue($identifier, $this->usuario_id, PDO::PARAM_INT);
						break;
					case '`DATA_RESPOSTA`':						
						$stmt->bindValue($identifier, $this->data_resposta, PDO::PARAM_STR);
						break;
					case '`DESCRICAO`':						
						$stmt->bindValue($identifier, $this->descricao, PDO::PARAM_STR);
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
		$pos = RespostaForumPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getForumId();
				break;
			case 2:
				return $this->getUsuarioId();
				break;
			case 3:
				return $this->getDataResposta();
				break;
			case 4:
				return $this->getDescricao();
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
		if (isset($alreadyDumpedObjects['RespostaForum'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['RespostaForum'][$this->getPrimaryKey()] = true;
		$keys = RespostaForumPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getForumId(),
			$keys[2] => $this->getUsuarioId(),
			$keys[3] => $this->getDataResposta(),
			$keys[4] => $this->getDescricao(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aForum) {
				$result['Forum'] = $this->aForum->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aUsuario) {
				$result['Usuario'] = $this->aUsuario->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collAvaliacaoRespostaForums) {
				$result['AvaliacaoRespostaForums'] = $this->collAvaliacaoRespostaForums->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = RespostaForumPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setForumId($value);
				break;
			case 2:
				$this->setUsuarioId($value);
				break;
			case 3:
				$this->setDataResposta($value);
				break;
			case 4:
				$this->setDescricao($value);
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
		$keys = RespostaForumPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setForumId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUsuarioId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDataResposta($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescricao($arr[$keys[4]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(RespostaForumPeer::DATABASE_NAME);

		if ($this->isColumnModified(RespostaForumPeer::ID)) $criteria->add(RespostaForumPeer::ID, $this->id);
		if ($this->isColumnModified(RespostaForumPeer::FORUM_ID)) $criteria->add(RespostaForumPeer::FORUM_ID, $this->forum_id);
		if ($this->isColumnModified(RespostaForumPeer::USUARIO_ID)) $criteria->add(RespostaForumPeer::USUARIO_ID, $this->usuario_id);
		if ($this->isColumnModified(RespostaForumPeer::DATA_RESPOSTA)) $criteria->add(RespostaForumPeer::DATA_RESPOSTA, $this->data_resposta);
		if ($this->isColumnModified(RespostaForumPeer::DESCRICAO)) $criteria->add(RespostaForumPeer::DESCRICAO, $this->descricao);

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
		$criteria = new Criteria(RespostaForumPeer::DATABASE_NAME);
		$criteria->add(RespostaForumPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of RespostaForum (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setForumId($this->getForumId());
		$copyObj->setUsuarioId($this->getUsuarioId());
		$copyObj->setDataResposta($this->getDataResposta());
		$copyObj->setDescricao($this->getDescricao());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getAvaliacaoRespostaForums() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAvaliacaoRespostaForum($relObj->copy($deepCopy));
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
	 * @return     RespostaForum Clone of current object.
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
	 * @return     RespostaForumPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new RespostaForumPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Forum object.
	 *
	 * @param      Forum $v
	 * @return     RespostaForum The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setForum(Forum $v = null)
	{
		if ($v === null) {
			$this->setForumId(NULL);
		} else {
			$this->setForumId($v->getId());
		}

		$this->aForum = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Forum object, it will not be re-added.
		if ($v !== null) {
			$v->addRespostaForum($this);
		}

		return $this;
	}


	/**
	 * Get the associated Forum object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Forum The associated Forum object.
	 * @throws     PropelException
	 */
	public function getForum(PropelPDO $con = null)
	{
		if ($this->aForum === null && ($this->forum_id !== null)) {
			$this->aForum = ForumQuery::create()->findPk($this->forum_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aForum->addRespostaForums($this);
			 */
		}
		return $this->aForum;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     RespostaForum The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUsuario(Usuario $v = null)
	{
		if ($v === null) {
			$this->setUsuarioId(NULL);
		} else {
			$this->setUsuarioId($v->getId());
		}

		$this->aUsuario = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Usuario object, it will not be re-added.
		if ($v !== null) {
			$v->addRespostaForum($this);
		}

		return $this;
	}


	/**
	 * Get the associated Usuario object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Usuario The associated Usuario object.
	 * @throws     PropelException
	 */
	public function getUsuario(PropelPDO $con = null)
	{
		if ($this->aUsuario === null && ($this->usuario_id !== null)) {
			$this->aUsuario = UsuarioQuery::create()->findPk($this->usuario_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aUsuario->addRespostaForums($this);
			 */
		}
		return $this->aUsuario;
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
		if ('AvaliacaoRespostaForum' == $relationName) {
			return $this->initAvaliacaoRespostaForums();
		}
	}

	/**
	 * Clears out the collAvaliacaoRespostaForums collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAvaliacaoRespostaForums()
	 */
	public function clearAvaliacaoRespostaForums()
	{
		$this->collAvaliacaoRespostaForums = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAvaliacaoRespostaForums collection.
	 *
	 * By default this just sets the collAvaliacaoRespostaForums collection to an empty array (like clearcollAvaliacaoRespostaForums());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initAvaliacaoRespostaForums($overrideExisting = true)
	{
		if (null !== $this->collAvaliacaoRespostaForums && !$overrideExisting) {
			return;
		}
		$this->collAvaliacaoRespostaForums = new PropelObjectCollection();
		$this->collAvaliacaoRespostaForums->setModel('AvaliacaoRespostaForum');
	}

	/**
	 * Gets an array of AvaliacaoRespostaForum objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this RespostaForum is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AvaliacaoRespostaForum[] List of AvaliacaoRespostaForum objects
	 * @throws     PropelException
	 */
	public function getAvaliacaoRespostaForums($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAvaliacaoRespostaForums || null !== $criteria) {
			if ($this->isNew() && null === $this->collAvaliacaoRespostaForums) {
				// return empty collection
				$this->initAvaliacaoRespostaForums();
			} else {
				$collAvaliacaoRespostaForums = AvaliacaoRespostaForumQuery::create(null, $criteria)
					->filterByRespostaForum($this)
					->find($con);
				if (null !== $criteria) {
					return $collAvaliacaoRespostaForums;
				}
				$this->collAvaliacaoRespostaForums = $collAvaliacaoRespostaForums;
			}
		}
		return $this->collAvaliacaoRespostaForums;
	}

	/**
	 * Sets a collection of AvaliacaoRespostaForum objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $avaliacaoRespostaForums A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setAvaliacaoRespostaForums(PropelCollection $avaliacaoRespostaForums, PropelPDO $con = null)
	{
		$this->avaliacaoRespostaForumsScheduledForDeletion = $this->getAvaliacaoRespostaForums(new Criteria(), $con)->diff($avaliacaoRespostaForums);

		foreach ($avaliacaoRespostaForums as $avaliacaoRespostaForum) {
			// Fix issue with collection modified by reference
			if ($avaliacaoRespostaForum->isNew()) {
				$avaliacaoRespostaForum->setRespostaForum($this);
			}
			$this->addAvaliacaoRespostaForum($avaliacaoRespostaForum);
		}

		$this->collAvaliacaoRespostaForums = $avaliacaoRespostaForums;
	}

	/**
	 * Returns the number of related AvaliacaoRespostaForum objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AvaliacaoRespostaForum objects.
	 * @throws     PropelException
	 */
	public function countAvaliacaoRespostaForums(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAvaliacaoRespostaForums || null !== $criteria) {
			if ($this->isNew() && null === $this->collAvaliacaoRespostaForums) {
				return 0;
			} else {
				$query = AvaliacaoRespostaForumQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByRespostaForum($this)
					->count($con);
			}
		} else {
			return count($this->collAvaliacaoRespostaForums);
		}
	}

	/**
	 * Method called to associate a AvaliacaoRespostaForum object to this object
	 * through the AvaliacaoRespostaForum foreign key attribute.
	 *
	 * @param      AvaliacaoRespostaForum $l AvaliacaoRespostaForum
	 * @return     RespostaForum The current object (for fluent API support)
	 */
	public function addAvaliacaoRespostaForum(AvaliacaoRespostaForum $l)
	{
		if ($this->collAvaliacaoRespostaForums === null) {
			$this->initAvaliacaoRespostaForums();
		}
		if (!$this->collAvaliacaoRespostaForums->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddAvaliacaoRespostaForum($l);
		}

		return $this;
	}

	/**
	 * @param	AvaliacaoRespostaForum $avaliacaoRespostaForum The avaliacaoRespostaForum object to add.
	 */
	protected function doAddAvaliacaoRespostaForum($avaliacaoRespostaForum)
	{
		$this->collAvaliacaoRespostaForums[]= $avaliacaoRespostaForum;
		$avaliacaoRespostaForum->setRespostaForum($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this RespostaForum is new, it will return
	 * an empty collection; or if this RespostaForum has previously
	 * been saved, it will retrieve related AvaliacaoRespostaForums from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in RespostaForum.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array AvaliacaoRespostaForum[] List of AvaliacaoRespostaForum objects
	 */
	public function getAvaliacaoRespostaForumsJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AvaliacaoRespostaForumQuery::create(null, $criteria);
		$query->joinWith('Usuario', $join_behavior);

		return $this->getAvaliacaoRespostaForums($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->forum_id = null;
		$this->usuario_id = null;
		$this->data_resposta = null;
		$this->descricao = null;
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
			if ($this->collAvaliacaoRespostaForums) {
				foreach ($this->collAvaliacaoRespostaForums as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collAvaliacaoRespostaForums instanceof PropelCollection) {
			$this->collAvaliacaoRespostaForums->clearIterator();
		}
		$this->collAvaliacaoRespostaForums = null;
		$this->aForum = null;
		$this->aUsuario = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(RespostaForumPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseRespostaForum
