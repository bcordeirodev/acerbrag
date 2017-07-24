<?php


/**
 * Base class that represents a row from the 'publico_alvo' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BasePublicoAlvo extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'PublicoAlvoPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        PublicoAlvoPeer
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
	 * The value for the pesquisa_id field.
	 * @var        int
	 */
	protected $pesquisa_id;

	/**
	 * The value for the idade_inicial field.
	 * @var        int
	 */
	protected $idade_inicial;

	/**
	 * The value for the idade_final field.
	 * @var        int
	 */
	protected $idade_final;

	/**
	 * The value for the quantidade_masculino field.
	 * @var        int
	 */
	protected $quantidade_masculino;

	/**
	 * The value for the quantidade_feminino field.
	 * @var        int
	 */
	protected $quantidade_feminino;

	/**
	 * The value for the quatidade_total field.
	 * @var        int
	 */
	protected $quatidade_total;

	/**
	 * @var        Pesquisa
	 */
	protected $aPesquisa;

	/**
	 * @var        array MetaPublicoAlvo[] Collection to store aggregation of MetaPublicoAlvo objects.
	 */
	protected $collMetaPublicoAlvos;

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
	protected $metaPublicoAlvosScheduledForDeletion = null;

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
	 * Get the [pesquisa_id] column value.
	 * 
	 * @return     int
	 */
	public function getPesquisaId()
	{
		return $this->pesquisa_id;
	}

	/**
	 * Get the [idade_inicial] column value.
	 * 
	 * @return     int
	 */
	public function getIdadeInicial()
	{
		return $this->idade_inicial;
	}

	/**
	 * Get the [idade_final] column value.
	 * 
	 * @return     int
	 */
	public function getIdadeFinal()
	{
		return $this->idade_final;
	}

	/**
	 * Get the [quantidade_masculino] column value.
	 * 
	 * @return     int
	 */
	public function getQuantidadeMasculino()
	{
		return $this->quantidade_masculino;
	}

	/**
	 * Get the [quantidade_feminino] column value.
	 * 
	 * @return     int
	 */
	public function getQuantidadeFeminino()
	{
		return $this->quantidade_feminino;
	}

	/**
	 * Get the [quatidade_total] column value.
	 * 
	 * @return     int
	 */
	public function getQuatidadeTotal()
	{
		return $this->quatidade_total;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     PublicoAlvo The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PublicoAlvoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [pesquisa_id] column.
	 * 
	 * @param      int $v new value
	 * @return     PublicoAlvo The current object (for fluent API support)
	 */
	public function setPesquisaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->pesquisa_id !== $v) {
			$this->pesquisa_id = $v;
			$this->modifiedColumns[] = PublicoAlvoPeer::PESQUISA_ID;
		}

		if ($this->aPesquisa !== null && $this->aPesquisa->getId() !== $v) {
			$this->aPesquisa = null;
		}

		return $this;
	} // setPesquisaId()

	/**
	 * Set the value of [idade_inicial] column.
	 * 
	 * @param      int $v new value
	 * @return     PublicoAlvo The current object (for fluent API support)
	 */
	public function setIdadeInicial($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->idade_inicial !== $v) {
			$this->idade_inicial = $v;
			$this->modifiedColumns[] = PublicoAlvoPeer::IDADE_INICIAL;
		}

		return $this;
	} // setIdadeInicial()

	/**
	 * Set the value of [idade_final] column.
	 * 
	 * @param      int $v new value
	 * @return     PublicoAlvo The current object (for fluent API support)
	 */
	public function setIdadeFinal($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->idade_final !== $v) {
			$this->idade_final = $v;
			$this->modifiedColumns[] = PublicoAlvoPeer::IDADE_FINAL;
		}

		return $this;
	} // setIdadeFinal()

	/**
	 * Set the value of [quantidade_masculino] column.
	 * 
	 * @param      int $v new value
	 * @return     PublicoAlvo The current object (for fluent API support)
	 */
	public function setQuantidadeMasculino($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->quantidade_masculino !== $v) {
			$this->quantidade_masculino = $v;
			$this->modifiedColumns[] = PublicoAlvoPeer::QUANTIDADE_MASCULINO;
		}

		return $this;
	} // setQuantidadeMasculino()

	/**
	 * Set the value of [quantidade_feminino] column.
	 * 
	 * @param      int $v new value
	 * @return     PublicoAlvo The current object (for fluent API support)
	 */
	public function setQuantidadeFeminino($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->quantidade_feminino !== $v) {
			$this->quantidade_feminino = $v;
			$this->modifiedColumns[] = PublicoAlvoPeer::QUANTIDADE_FEMININO;
		}

		return $this;
	} // setQuantidadeFeminino()

	/**
	 * Set the value of [quatidade_total] column.
	 * 
	 * @param      int $v new value
	 * @return     PublicoAlvo The current object (for fluent API support)
	 */
	public function setQuatidadeTotal($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->quatidade_total !== $v) {
			$this->quatidade_total = $v;
			$this->modifiedColumns[] = PublicoAlvoPeer::QUATIDADE_TOTAL;
		}

		return $this;
	} // setQuatidadeTotal()

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
			$this->pesquisa_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->idade_inicial = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->idade_final = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->quantidade_masculino = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->quantidade_feminino = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->quatidade_total = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 7; // 7 = PublicoAlvoPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating PublicoAlvo object", $e);
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
			$con = Propel::getConnection(PublicoAlvoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = PublicoAlvoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aPesquisa = null;
			$this->collMetaPublicoAlvos = null;

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
			$con = Propel::getConnection(PublicoAlvoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = PublicoAlvoQuery::create()
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
			$con = Propel::getConnection(PublicoAlvoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				PublicoAlvoPeer::addInstanceToPool($this);
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

			if ($this->metaPublicoAlvosScheduledForDeletion !== null) {
				if (!$this->metaPublicoAlvosScheduledForDeletion->isEmpty()) {
					MetaPublicoAlvoQuery::create()
						->filterByPrimaryKeys($this->metaPublicoAlvosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->metaPublicoAlvosScheduledForDeletion = null;
				}
			}

			if ($this->collMetaPublicoAlvos !== null) {
				foreach ($this->collMetaPublicoAlvos as $referrerFK) {
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

		$this->modifiedColumns[] = PublicoAlvoPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . PublicoAlvoPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(PublicoAlvoPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(PublicoAlvoPeer::PESQUISA_ID)) {
			$modifiedColumns[':p' . $index++]  = '`PESQUISA_ID`';
		}
		if ($this->isColumnModified(PublicoAlvoPeer::IDADE_INICIAL)) {
			$modifiedColumns[':p' . $index++]  = '`IDADE_INICIAL`';
		}
		if ($this->isColumnModified(PublicoAlvoPeer::IDADE_FINAL)) {
			$modifiedColumns[':p' . $index++]  = '`IDADE_FINAL`';
		}
		if ($this->isColumnModified(PublicoAlvoPeer::QUANTIDADE_MASCULINO)) {
			$modifiedColumns[':p' . $index++]  = '`QUANTIDADE_MASCULINO`';
		}
		if ($this->isColumnModified(PublicoAlvoPeer::QUANTIDADE_FEMININO)) {
			$modifiedColumns[':p' . $index++]  = '`QUANTIDADE_FEMININO`';
		}
		if ($this->isColumnModified(PublicoAlvoPeer::QUATIDADE_TOTAL)) {
			$modifiedColumns[':p' . $index++]  = '`QUATIDADE_TOTAL`';
		}

		$sql = sprintf(
			'INSERT INTO `publico_alvo` (%s) VALUES (%s)',
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
					case '`PESQUISA_ID`':
						$stmt->bindValue($identifier, $this->pesquisa_id, PDO::PARAM_INT);
						break;
					case '`IDADE_INICIAL`':
						$stmt->bindValue($identifier, $this->idade_inicial, PDO::PARAM_INT);
						break;
					case '`IDADE_FINAL`':
						$stmt->bindValue($identifier, $this->idade_final, PDO::PARAM_INT);
						break;
					case '`QUANTIDADE_MASCULINO`':
						$stmt->bindValue($identifier, $this->quantidade_masculino, PDO::PARAM_INT);
						break;
					case '`QUANTIDADE_FEMININO`':
						$stmt->bindValue($identifier, $this->quantidade_feminino, PDO::PARAM_INT);
						break;
					case '`QUATIDADE_TOTAL`':
						$stmt->bindValue($identifier, $this->quatidade_total, PDO::PARAM_INT);
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
		$pos = PublicoAlvoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getPesquisaId();
				break;
			case 2:
				return $this->getIdadeInicial();
				break;
			case 3:
				return $this->getIdadeFinal();
				break;
			case 4:
				return $this->getQuantidadeMasculino();
				break;
			case 5:
				return $this->getQuantidadeFeminino();
				break;
			case 6:
				return $this->getQuatidadeTotal();
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
		if (isset($alreadyDumpedObjects['PublicoAlvo'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['PublicoAlvo'][$this->getPrimaryKey()] = true;
		$keys = PublicoAlvoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPesquisaId(),
			$keys[2] => $this->getIdadeInicial(),
			$keys[3] => $this->getIdadeFinal(),
			$keys[4] => $this->getQuantidadeMasculino(),
			$keys[5] => $this->getQuantidadeFeminino(),
			$keys[6] => $this->getQuatidadeTotal(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aPesquisa) {
				$result['Pesquisa'] = $this->aPesquisa->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collMetaPublicoAlvos) {
				$result['MetaPublicoAlvos'] = $this->collMetaPublicoAlvos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = PublicoAlvoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setPesquisaId($value);
				break;
			case 2:
				$this->setIdadeInicial($value);
				break;
			case 3:
				$this->setIdadeFinal($value);
				break;
			case 4:
				$this->setQuantidadeMasculino($value);
				break;
			case 5:
				$this->setQuantidadeFeminino($value);
				break;
			case 6:
				$this->setQuatidadeTotal($value);
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
		$keys = PublicoAlvoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPesquisaId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdadeInicial($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdadeFinal($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setQuantidadeMasculino($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setQuantidadeFeminino($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setQuatidadeTotal($arr[$keys[6]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(PublicoAlvoPeer::DATABASE_NAME);

		if ($this->isColumnModified(PublicoAlvoPeer::ID)) $criteria->add(PublicoAlvoPeer::ID, $this->id);
		if ($this->isColumnModified(PublicoAlvoPeer::PESQUISA_ID)) $criteria->add(PublicoAlvoPeer::PESQUISA_ID, $this->pesquisa_id);
		if ($this->isColumnModified(PublicoAlvoPeer::IDADE_INICIAL)) $criteria->add(PublicoAlvoPeer::IDADE_INICIAL, $this->idade_inicial);
		if ($this->isColumnModified(PublicoAlvoPeer::IDADE_FINAL)) $criteria->add(PublicoAlvoPeer::IDADE_FINAL, $this->idade_final);
		if ($this->isColumnModified(PublicoAlvoPeer::QUANTIDADE_MASCULINO)) $criteria->add(PublicoAlvoPeer::QUANTIDADE_MASCULINO, $this->quantidade_masculino);
		if ($this->isColumnModified(PublicoAlvoPeer::QUANTIDADE_FEMININO)) $criteria->add(PublicoAlvoPeer::QUANTIDADE_FEMININO, $this->quantidade_feminino);
		if ($this->isColumnModified(PublicoAlvoPeer::QUATIDADE_TOTAL)) $criteria->add(PublicoAlvoPeer::QUATIDADE_TOTAL, $this->quatidade_total);

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
		$criteria = new Criteria(PublicoAlvoPeer::DATABASE_NAME);
		$criteria->add(PublicoAlvoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of PublicoAlvo (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setPesquisaId($this->getPesquisaId());
		$copyObj->setIdadeInicial($this->getIdadeInicial());
		$copyObj->setIdadeFinal($this->getIdadeFinal());
		$copyObj->setQuantidadeMasculino($this->getQuantidadeMasculino());
		$copyObj->setQuantidadeFeminino($this->getQuantidadeFeminino());
		$copyObj->setQuatidadeTotal($this->getQuatidadeTotal());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getMetaPublicoAlvos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addMetaPublicoAlvo($relObj->copy($deepCopy));
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
	 * @return     PublicoAlvo Clone of current object.
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
	 * @return     PublicoAlvoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PublicoAlvoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Pesquisa object.
	 *
	 * @param      Pesquisa $v
	 * @return     PublicoAlvo The current object (for fluent API support)
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
			$v->addPublicoAlvo($this);
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
				$this->aPesquisa->addPublicoAlvos($this);
			 */
		}
		return $this->aPesquisa;
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
		if ('MetaPublicoAlvo' == $relationName) {
			return $this->initMetaPublicoAlvos();
		}
	}

	/**
	 * Clears out the collMetaPublicoAlvos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addMetaPublicoAlvos()
	 */
	public function clearMetaPublicoAlvos()
	{
		$this->collMetaPublicoAlvos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collMetaPublicoAlvos collection.
	 *
	 * By default this just sets the collMetaPublicoAlvos collection to an empty array (like clearcollMetaPublicoAlvos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initMetaPublicoAlvos($overrideExisting = true)
	{
		if (null !== $this->collMetaPublicoAlvos && !$overrideExisting) {
			return;
		}
		$this->collMetaPublicoAlvos = new PropelObjectCollection();
		$this->collMetaPublicoAlvos->setModel('MetaPublicoAlvo');
	}

	/**
	 * Gets an array of MetaPublicoAlvo objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this PublicoAlvo is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array MetaPublicoAlvo[] List of MetaPublicoAlvo objects
	 * @throws     PropelException
	 */
	public function getMetaPublicoAlvos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collMetaPublicoAlvos || null !== $criteria) {
			if ($this->isNew() && null === $this->collMetaPublicoAlvos) {
				// return empty collection
				$this->initMetaPublicoAlvos();
			} else {
				$collMetaPublicoAlvos = MetaPublicoAlvoQuery::create(null, $criteria)
					->filterByPublicoAlvo($this)
					->find($con);
				if (null !== $criteria) {
					return $collMetaPublicoAlvos;
				}
				$this->collMetaPublicoAlvos = $collMetaPublicoAlvos;
			}
		}
		return $this->collMetaPublicoAlvos;
	}

	/**
	 * Sets a collection of MetaPublicoAlvo objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $metaPublicoAlvos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setMetaPublicoAlvos(PropelCollection $metaPublicoAlvos, PropelPDO $con = null)
	{
		$this->metaPublicoAlvosScheduledForDeletion = $this->getMetaPublicoAlvos(new Criteria(), $con)->diff($metaPublicoAlvos);

		foreach ($metaPublicoAlvos as $metaPublicoAlvo) {
			// Fix issue with collection modified by reference
			if ($metaPublicoAlvo->isNew()) {
				$metaPublicoAlvo->setPublicoAlvo($this);
			}
			$this->addMetaPublicoAlvo($metaPublicoAlvo);
		}

		$this->collMetaPublicoAlvos = $metaPublicoAlvos;
	}

	/**
	 * Returns the number of related MetaPublicoAlvo objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related MetaPublicoAlvo objects.
	 * @throws     PropelException
	 */
	public function countMetaPublicoAlvos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collMetaPublicoAlvos || null !== $criteria) {
			if ($this->isNew() && null === $this->collMetaPublicoAlvos) {
				return 0;
			} else {
				$query = MetaPublicoAlvoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPublicoAlvo($this)
					->count($con);
			}
		} else {
			return count($this->collMetaPublicoAlvos);
		}
	}

	/**
	 * Method called to associate a MetaPublicoAlvo object to this object
	 * through the MetaPublicoAlvo foreign key attribute.
	 *
	 * @param      MetaPublicoAlvo $l MetaPublicoAlvo
	 * @return     PublicoAlvo The current object (for fluent API support)
	 */
	public function addMetaPublicoAlvo(MetaPublicoAlvo $l)
	{
		if ($this->collMetaPublicoAlvos === null) {
			$this->initMetaPublicoAlvos();
		}
		if (!$this->collMetaPublicoAlvos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddMetaPublicoAlvo($l);
		}

		return $this;
	}

	/**
	 * @param	MetaPublicoAlvo $metaPublicoAlvo The metaPublicoAlvo object to add.
	 */
	protected function doAddMetaPublicoAlvo($metaPublicoAlvo)
	{
		$this->collMetaPublicoAlvos[]= $metaPublicoAlvo;
		$metaPublicoAlvo->setPublicoAlvo($this);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->pesquisa_id = null;
		$this->idade_inicial = null;
		$this->idade_final = null;
		$this->quantidade_masculino = null;
		$this->quantidade_feminino = null;
		$this->quatidade_total = null;
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
			if ($this->collMetaPublicoAlvos) {
				foreach ($this->collMetaPublicoAlvos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collMetaPublicoAlvos instanceof PropelCollection) {
			$this->collMetaPublicoAlvos->clearIterator();
		}
		$this->collMetaPublicoAlvos = null;
		$this->aPesquisa = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(PublicoAlvoPeer::DEFAULT_STRING_FORMAT);
	}

} // BasePublicoAlvo
