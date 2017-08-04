<?php


/**
 * Base class that represents a row from the 'solicitacao_resgate' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseSolicitacaoResgate extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'SolicitacaoResgatePeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SolicitacaoResgatePeer
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
	 * The value for the solicitante_id field.
	 * @var        int
	 */
	protected $solicitante_id;

	/**
	 * The value for the aprovador_id field.
	 * @var        int
	 */
	protected $aprovador_id;

	/**
	 * The value for the premio_id field.
	 * @var        int
	 */
	protected $premio_id;

	/**
	 * The value for the data_solicitacao field.
	 * @var        string
	 */
	protected $data_solicitacao;

	/**
	 * The value for the aprovada field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $aprovada;

	/**
	 * @var        Usuario
	 */
	protected $aUsuarioRelatedByAprovadorId;

	/**
	 * @var        Premio
	 */
	protected $aPremio;

	/**
	 * @var        Usuario
	 */
	protected $aUsuarioRelatedBySolicitanteId;

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
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->aprovada = false;
	}

	/**
	 * Initializes internal state of BaseSolicitacaoResgate object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

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
	 * Get the [solicitante_id] column value.
	 * 
	 * @return     int
	 */
	public function getSolicitanteId()
	{
		return $this->solicitante_id;
	}

	/**
	 * Get the [aprovador_id] column value.
	 * 
	 * @return     int
	 */
	public function getAprovadorId()
	{
		return $this->aprovador_id;
	}

	/**
	 * Get the [premio_id] column value.
	 * 
	 * @return     int
	 */
	public function getPremioId()
	{
		return $this->premio_id;
	}

	/**
	 * Get the [data_solicitacao] column value.
	 * 
	 * @return     string
	 */
	public function getDataSolicitacao()
	{
		return $this->data_solicitacao;
	}

	/**
	 * Get the [aprovada] column value.
	 * 
	 * @return     boolean
	 */
	public function getAprovada()
	{
		return $this->aprovada;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     SolicitacaoResgate The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SolicitacaoResgatePeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [solicitante_id] column.
	 * 
	 * @param      int $v new value
	 * @return     SolicitacaoResgate The current object (for fluent API support)
	 */
	public function setSolicitanteId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->solicitante_id !== $v) {
			$this->solicitante_id = $v;
			$this->modifiedColumns[] = SolicitacaoResgatePeer::SOLICITANTE_ID;
		}

		if ($this->aUsuarioRelatedBySolicitanteId !== null && $this->aUsuarioRelatedBySolicitanteId->getId() !== $v) {
			$this->aUsuarioRelatedBySolicitanteId = null;
		}

		return $this;
	} // setSolicitanteId()

	/**
	 * Set the value of [aprovador_id] column.
	 * 
	 * @param      int $v new value
	 * @return     SolicitacaoResgate The current object (for fluent API support)
	 */
	public function setAprovadorId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->aprovador_id !== $v) {
			$this->aprovador_id = $v;
			$this->modifiedColumns[] = SolicitacaoResgatePeer::APROVADOR_ID;
		}

		if ($this->aUsuarioRelatedByAprovadorId !== null && $this->aUsuarioRelatedByAprovadorId->getId() !== $v) {
			$this->aUsuarioRelatedByAprovadorId = null;
		}

		return $this;
	} // setAprovadorId()

	/**
	 * Set the value of [premio_id] column.
	 * 
	 * @param      int $v new value
	 * @return     SolicitacaoResgate The current object (for fluent API support)
	 */
	public function setPremioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->premio_id !== $v) {
			$this->premio_id = $v;
			$this->modifiedColumns[] = SolicitacaoResgatePeer::PREMIO_ID;
		}

		if ($this->aPremio !== null && $this->aPremio->getId() !== $v) {
			$this->aPremio = null;
		}

		return $this;
	} // setPremioId()

	/**
	 * Set the value of [data_solicitacao] column.
	 * 
	 * @param      string $v new value
	 * @return     SolicitacaoResgate The current object (for fluent API support)
	 */
	public function setDataSolicitacao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->data_solicitacao !== $v) {
			$this->data_solicitacao = $v;
			$this->modifiedColumns[] = SolicitacaoResgatePeer::DATA_SOLICITACAO;
		}

		return $this;
	} // setDataSolicitacao()

	/**
	 * Sets the value of the [aprovada] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     SolicitacaoResgate The current object (for fluent API support)
	 */
	public function setAprovada($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->aprovada !== $v) {
			$this->aprovada = $v;
			$this->modifiedColumns[] = SolicitacaoResgatePeer::APROVADA;
		}

		return $this;
	} // setAprovada()

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
			if ($this->aprovada !== false) {
				return false;
			}

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
			$this->solicitante_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->aprovador_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->premio_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->data_solicitacao = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->aprovada = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 6; // 6 = SolicitacaoResgatePeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating SolicitacaoResgate object", $e);
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

		if ($this->aUsuarioRelatedBySolicitanteId !== null && $this->solicitante_id !== $this->aUsuarioRelatedBySolicitanteId->getId()) {
			$this->aUsuarioRelatedBySolicitanteId = null;
		}
		if ($this->aUsuarioRelatedByAprovadorId !== null && $this->aprovador_id !== $this->aUsuarioRelatedByAprovadorId->getId()) {
			$this->aUsuarioRelatedByAprovadorId = null;
		}
		if ($this->aPremio !== null && $this->premio_id !== $this->aPremio->getId()) {
			$this->aPremio = null;
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
			$con = Propel::getConnection(SolicitacaoResgatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SolicitacaoResgatePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aUsuarioRelatedByAprovadorId = null;
			$this->aPremio = null;
			$this->aUsuarioRelatedBySolicitanteId = null;
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
			$con = Propel::getConnection(SolicitacaoResgatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = SolicitacaoResgateQuery::create()
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
			$con = Propel::getConnection(SolicitacaoResgatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				SolicitacaoResgatePeer::addInstanceToPool($this);
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

			if ($this->aUsuarioRelatedByAprovadorId !== null) {
				if ($this->aUsuarioRelatedByAprovadorId->isModified() || $this->aUsuarioRelatedByAprovadorId->isNew()) {
					$affectedRows += $this->aUsuarioRelatedByAprovadorId->save($con);
				}
				$this->setUsuarioRelatedByAprovadorId($this->aUsuarioRelatedByAprovadorId);
			}

			if ($this->aPremio !== null) {
				if ($this->aPremio->isModified() || $this->aPremio->isNew()) {
					$affectedRows += $this->aPremio->save($con);
				}
				$this->setPremio($this->aPremio);
			}

			if ($this->aUsuarioRelatedBySolicitanteId !== null) {
				if ($this->aUsuarioRelatedBySolicitanteId->isModified() || $this->aUsuarioRelatedBySolicitanteId->isNew()) {
					$affectedRows += $this->aUsuarioRelatedBySolicitanteId->save($con);
				}
				$this->setUsuarioRelatedBySolicitanteId($this->aUsuarioRelatedBySolicitanteId);
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

		$this->modifiedColumns[] = SolicitacaoResgatePeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . SolicitacaoResgatePeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(SolicitacaoResgatePeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(SolicitacaoResgatePeer::SOLICITANTE_ID)) {
			$modifiedColumns[':p' . $index++]  = '`SOLICITANTE_ID`';
		}
		if ($this->isColumnModified(SolicitacaoResgatePeer::APROVADOR_ID)) {
			$modifiedColumns[':p' . $index++]  = '`APROVADOR_ID`';
		}
		if ($this->isColumnModified(SolicitacaoResgatePeer::PREMIO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`PREMIO_ID`';
		}
		if ($this->isColumnModified(SolicitacaoResgatePeer::DATA_SOLICITACAO)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_SOLICITACAO`';
		}
		if ($this->isColumnModified(SolicitacaoResgatePeer::APROVADA)) {
			$modifiedColumns[':p' . $index++]  = '`APROVADA`';
		}

		$sql = sprintf(
			'INSERT INTO `solicitacao_resgate` (%s) VALUES (%s)',
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
					case '`SOLICITANTE_ID`':						
						$stmt->bindValue($identifier, $this->solicitante_id, PDO::PARAM_INT);
						break;
					case '`APROVADOR_ID`':						
						$stmt->bindValue($identifier, $this->aprovador_id, PDO::PARAM_INT);
						break;
					case '`PREMIO_ID`':						
						$stmt->bindValue($identifier, $this->premio_id, PDO::PARAM_INT);
						break;
					case '`DATA_SOLICITACAO`':						
						$stmt->bindValue($identifier, $this->data_solicitacao, PDO::PARAM_STR);
						break;
					case '`APROVADA`':
						$stmt->bindValue($identifier, (int) $this->aprovada, PDO::PARAM_INT);
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
		$pos = SolicitacaoResgatePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getSolicitanteId();
				break;
			case 2:
				return $this->getAprovadorId();
				break;
			case 3:
				return $this->getPremioId();
				break;
			case 4:
				return $this->getDataSolicitacao();
				break;
			case 5:
				return $this->getAprovada();
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
		if (isset($alreadyDumpedObjects['SolicitacaoResgate'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['SolicitacaoResgate'][$this->getPrimaryKey()] = true;
		$keys = SolicitacaoResgatePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getSolicitanteId(),
			$keys[2] => $this->getAprovadorId(),
			$keys[3] => $this->getPremioId(),
			$keys[4] => $this->getDataSolicitacao(),
			$keys[5] => $this->getAprovada(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aUsuarioRelatedByAprovadorId) {
				$result['UsuarioRelatedByAprovadorId'] = $this->aUsuarioRelatedByAprovadorId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aPremio) {
				$result['Premio'] = $this->aPremio->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aUsuarioRelatedBySolicitanteId) {
				$result['UsuarioRelatedBySolicitanteId'] = $this->aUsuarioRelatedBySolicitanteId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
		$pos = SolicitacaoResgatePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setSolicitanteId($value);
				break;
			case 2:
				$this->setAprovadorId($value);
				break;
			case 3:
				$this->setPremioId($value);
				break;
			case 4:
				$this->setDataSolicitacao($value);
				break;
			case 5:
				$this->setAprovada($value);
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
		$keys = SolicitacaoResgatePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSolicitanteId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAprovadorId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPremioId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDataSolicitacao($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAprovada($arr[$keys[5]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SolicitacaoResgatePeer::DATABASE_NAME);

		if ($this->isColumnModified(SolicitacaoResgatePeer::ID)) $criteria->add(SolicitacaoResgatePeer::ID, $this->id);
		if ($this->isColumnModified(SolicitacaoResgatePeer::SOLICITANTE_ID)) $criteria->add(SolicitacaoResgatePeer::SOLICITANTE_ID, $this->solicitante_id);
		if ($this->isColumnModified(SolicitacaoResgatePeer::APROVADOR_ID)) $criteria->add(SolicitacaoResgatePeer::APROVADOR_ID, $this->aprovador_id);
		if ($this->isColumnModified(SolicitacaoResgatePeer::PREMIO_ID)) $criteria->add(SolicitacaoResgatePeer::PREMIO_ID, $this->premio_id);
		if ($this->isColumnModified(SolicitacaoResgatePeer::DATA_SOLICITACAO)) $criteria->add(SolicitacaoResgatePeer::DATA_SOLICITACAO, $this->data_solicitacao);
		if ($this->isColumnModified(SolicitacaoResgatePeer::APROVADA)) $criteria->add(SolicitacaoResgatePeer::APROVADA, $this->aprovada);

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
		$criteria = new Criteria(SolicitacaoResgatePeer::DATABASE_NAME);
		$criteria->add(SolicitacaoResgatePeer::ID, $this->id);

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
	 * @param      object $copyObj An object of SolicitacaoResgate (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setSolicitanteId($this->getSolicitanteId());
		$copyObj->setAprovadorId($this->getAprovadorId());
		$copyObj->setPremioId($this->getPremioId());
		$copyObj->setDataSolicitacao($this->getDataSolicitacao());
		$copyObj->setAprovada($this->getAprovada());

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
	 * @return     SolicitacaoResgate Clone of current object.
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
	 * @return     SolicitacaoResgatePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SolicitacaoResgatePeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     SolicitacaoResgate The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUsuarioRelatedByAprovadorId(Usuario $v = null)
	{
		if ($v === null) {
			$this->setAprovadorId(NULL);
		} else {
			$this->setAprovadorId($v->getId());
		}

		$this->aUsuarioRelatedByAprovadorId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Usuario object, it will not be re-added.
		if ($v !== null) {
			$v->addSolicitacaoResgateRelatedByAprovadorId($this);
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
	public function getUsuarioRelatedByAprovadorId(PropelPDO $con = null)
	{
		if ($this->aUsuarioRelatedByAprovadorId === null && ($this->aprovador_id !== null)) {
			$this->aUsuarioRelatedByAprovadorId = UsuarioQuery::create()->findPk($this->aprovador_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aUsuarioRelatedByAprovadorId->addSolicitacaoResgatesRelatedByAprovadorId($this);
			 */
		}
		return $this->aUsuarioRelatedByAprovadorId;
	}

	/**
	 * Declares an association between this object and a Premio object.
	 *
	 * @param      Premio $v
	 * @return     SolicitacaoResgate The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPremio(Premio $v = null)
	{
		if ($v === null) {
			$this->setPremioId(NULL);
		} else {
			$this->setPremioId($v->getId());
		}

		$this->aPremio = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Premio object, it will not be re-added.
		if ($v !== null) {
			$v->addSolicitacaoResgate($this);
		}

		return $this;
	}


	/**
	 * Get the associated Premio object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Premio The associated Premio object.
	 * @throws     PropelException
	 */
	public function getPremio(PropelPDO $con = null)
	{
		if ($this->aPremio === null && ($this->premio_id !== null)) {
			$this->aPremio = PremioQuery::create()->findPk($this->premio_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aPremio->addSolicitacaoResgates($this);
			 */
		}
		return $this->aPremio;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     SolicitacaoResgate The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUsuarioRelatedBySolicitanteId(Usuario $v = null)
	{
		if ($v === null) {
			$this->setSolicitanteId(NULL);
		} else {
			$this->setSolicitanteId($v->getId());
		}

		$this->aUsuarioRelatedBySolicitanteId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Usuario object, it will not be re-added.
		if ($v !== null) {
			$v->addSolicitacaoResgateRelatedBySolicitanteId($this);
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
	public function getUsuarioRelatedBySolicitanteId(PropelPDO $con = null)
	{
		if ($this->aUsuarioRelatedBySolicitanteId === null && ($this->solicitante_id !== null)) {
			$this->aUsuarioRelatedBySolicitanteId = UsuarioQuery::create()->findPk($this->solicitante_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aUsuarioRelatedBySolicitanteId->addSolicitacaoResgatesRelatedBySolicitanteId($this);
			 */
		}
		return $this->aUsuarioRelatedBySolicitanteId;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->solicitante_id = null;
		$this->aprovador_id = null;
		$this->premio_id = null;
		$this->data_solicitacao = null;
		$this->aprovada = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
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

		$this->aUsuarioRelatedByAprovadorId = null;
		$this->aPremio = null;
		$this->aUsuarioRelatedBySolicitanteId = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(SolicitacaoResgatePeer::DEFAULT_STRING_FORMAT);
	}

} // BaseSolicitacaoResgate
