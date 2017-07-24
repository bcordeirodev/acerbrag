<?php


/**
 * Base class that represents a row from the 'area_advocacia' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseAreaAdvocacia extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'AreaAdvocaciaPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        AreaAdvocaciaPeer
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
	 * @var        array AdvogadoAreaAdvocacia[] Collection to store aggregation of AdvogadoAreaAdvocacia objects.
	 */
	protected $collAdvogadoAreaAdvocacias;

	/**
	 * @var        array Caso[] Collection to store aggregation of Caso objects.
	 */
	protected $collCasos;

	/**
	 * @var        array Contrato[] Collection to store aggregation of Contrato objects.
	 */
	protected $collContratos;

	/**
	 * @var        array Processo[] Collection to store aggregation of Processo objects.
	 */
	protected $collProcessos;

	/**
	 * @var        array Solicitacao[] Collection to store aggregation of Solicitacao objects.
	 */
	protected $collSolicitacaos;

	/**
	 * @var        array TagAreaAdvocacia[] Collection to store aggregation of TagAreaAdvocacia objects.
	 */
	protected $collTagAreaAdvocacias;

	/**
	 * @var        array Advogado[] Collection to store aggregation of Advogado objects.
	 */
	protected $collAdvogados;

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
	protected $advogadosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $advogadoAreaAdvocaciasScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $casosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $contratosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $processosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $solicitacaosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $tagAreaAdvocaciasScheduledForDeletion = null;

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
	 * @return     AreaAdvocacia The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AreaAdvocaciaPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [nome] column.
	 * 
	 * @param      string $v new value
	 * @return     AreaAdvocacia The current object (for fluent API support)
	 */
	public function setNome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome !== $v) {
			$this->nome = $v;
			$this->modifiedColumns[] = AreaAdvocaciaPeer::NOME;
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

			return $startcol + 2; // 2 = AreaAdvocaciaPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating AreaAdvocacia object", $e);
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
			$con = Propel::getConnection(AreaAdvocaciaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = AreaAdvocaciaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collAdvogadoAreaAdvocacias = null;

			$this->collCasos = null;

			$this->collContratos = null;

			$this->collProcessos = null;

			$this->collSolicitacaos = null;

			$this->collTagAreaAdvocacias = null;

			$this->collAdvogados = null;
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
			$con = Propel::getConnection(AreaAdvocaciaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = AreaAdvocaciaQuery::create()
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
			$con = Propel::getConnection(AreaAdvocaciaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				AreaAdvocaciaPeer::addInstanceToPool($this);
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

			if ($this->advogadosScheduledForDeletion !== null) {
				if (!$this->advogadosScheduledForDeletion->isEmpty()) {
					AdvogadoAreaAdvocaciaQuery::create()
						->filterByPrimaryKeys($this->advogadosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->advogadosScheduledForDeletion = null;
				}

				foreach ($this->getAdvogados() as $advogado) {
					if ($advogado->isModified()) {
						$advogado->save($con);
					}
				}
			}

			if ($this->advogadoAreaAdvocaciasScheduledForDeletion !== null) {
				if (!$this->advogadoAreaAdvocaciasScheduledForDeletion->isEmpty()) {
					AdvogadoAreaAdvocaciaQuery::create()
						->filterByPrimaryKeys($this->advogadoAreaAdvocaciasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->advogadoAreaAdvocaciasScheduledForDeletion = null;
				}
			}

			if ($this->collAdvogadoAreaAdvocacias !== null) {
				foreach ($this->collAdvogadoAreaAdvocacias as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->casosScheduledForDeletion !== null) {
				if (!$this->casosScheduledForDeletion->isEmpty()) {
					CasoQuery::create()
						->filterByPrimaryKeys($this->casosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->casosScheduledForDeletion = null;
				}
			}

			if ($this->collCasos !== null) {
				foreach ($this->collCasos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->contratosScheduledForDeletion !== null) {
				if (!$this->contratosScheduledForDeletion->isEmpty()) {
					ContratoQuery::create()
						->filterByPrimaryKeys($this->contratosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->contratosScheduledForDeletion = null;
				}
			}

			if ($this->collContratos !== null) {
				foreach ($this->collContratos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->processosScheduledForDeletion !== null) {
				if (!$this->processosScheduledForDeletion->isEmpty()) {
					ProcessoQuery::create()
						->filterByPrimaryKeys($this->processosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->processosScheduledForDeletion = null;
				}
			}

			if ($this->collProcessos !== null) {
				foreach ($this->collProcessos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->solicitacaosScheduledForDeletion !== null) {
				if (!$this->solicitacaosScheduledForDeletion->isEmpty()) {
					SolicitacaoQuery::create()
						->filterByPrimaryKeys($this->solicitacaosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->solicitacaosScheduledForDeletion = null;
				}
			}

			if ($this->collSolicitacaos !== null) {
				foreach ($this->collSolicitacaos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->tagAreaAdvocaciasScheduledForDeletion !== null) {
				if (!$this->tagAreaAdvocaciasScheduledForDeletion->isEmpty()) {
					TagAreaAdvocaciaQuery::create()
						->filterByPrimaryKeys($this->tagAreaAdvocaciasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->tagAreaAdvocaciasScheduledForDeletion = null;
				}
			}

			if ($this->collTagAreaAdvocacias !== null) {
				foreach ($this->collTagAreaAdvocacias as $referrerFK) {
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

		$this->modifiedColumns[] = AreaAdvocaciaPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . AreaAdvocaciaPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(AreaAdvocaciaPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(AreaAdvocaciaPeer::NOME)) {
			$modifiedColumns[':p' . $index++]  = '`NOME`';
		}

		$sql = sprintf(
			'INSERT INTO `area_advocacia` (%s) VALUES (%s)',
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
		$pos = AreaAdvocaciaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		if (isset($alreadyDumpedObjects['AreaAdvocacia'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['AreaAdvocacia'][$this->getPrimaryKey()] = true;
		$keys = AreaAdvocaciaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNome(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->collAdvogadoAreaAdvocacias) {
				$result['AdvogadoAreaAdvocacias'] = $this->collAdvogadoAreaAdvocacias->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collCasos) {
				$result['Casos'] = $this->collCasos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collContratos) {
				$result['Contratos'] = $this->collContratos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collProcessos) {
				$result['Processos'] = $this->collProcessos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collSolicitacaos) {
				$result['Solicitacaos'] = $this->collSolicitacaos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collTagAreaAdvocacias) {
				$result['TagAreaAdvocacias'] = $this->collTagAreaAdvocacias->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = AreaAdvocaciaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = AreaAdvocaciaPeer::getFieldNames($keyType);

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
		$criteria = new Criteria(AreaAdvocaciaPeer::DATABASE_NAME);

		if ($this->isColumnModified(AreaAdvocaciaPeer::ID)) $criteria->add(AreaAdvocaciaPeer::ID, $this->id);
		if ($this->isColumnModified(AreaAdvocaciaPeer::NOME)) $criteria->add(AreaAdvocaciaPeer::NOME, $this->nome);

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
		$criteria = new Criteria(AreaAdvocaciaPeer::DATABASE_NAME);
		$criteria->add(AreaAdvocaciaPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of AreaAdvocacia (or compatible) type.
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

			foreach ($this->getAdvogadoAreaAdvocacias() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAdvogadoAreaAdvocacia($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCasos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCaso($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getContratos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addContrato($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getProcessos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProcesso($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSolicitacaos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSolicitacao($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getTagAreaAdvocacias() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addTagAreaAdvocacia($relObj->copy($deepCopy));
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
	 * @return     AreaAdvocacia Clone of current object.
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
	 * @return     AreaAdvocaciaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AreaAdvocaciaPeer();
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
		if ('AdvogadoAreaAdvocacia' == $relationName) {
			return $this->initAdvogadoAreaAdvocacias();
		}
		if ('Caso' == $relationName) {
			return $this->initCasos();
		}
		if ('Contrato' == $relationName) {
			return $this->initContratos();
		}
		if ('Processo' == $relationName) {
			return $this->initProcessos();
		}
		if ('Solicitacao' == $relationName) {
			return $this->initSolicitacaos();
		}
		if ('TagAreaAdvocacia' == $relationName) {
			return $this->initTagAreaAdvocacias();
		}
	}

	/**
	 * Clears out the collAdvogadoAreaAdvocacias collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAdvogadoAreaAdvocacias()
	 */
	public function clearAdvogadoAreaAdvocacias()
	{
		$this->collAdvogadoAreaAdvocacias = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAdvogadoAreaAdvocacias collection.
	 *
	 * By default this just sets the collAdvogadoAreaAdvocacias collection to an empty array (like clearcollAdvogadoAreaAdvocacias());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initAdvogadoAreaAdvocacias($overrideExisting = true)
	{
		if (null !== $this->collAdvogadoAreaAdvocacias && !$overrideExisting) {
			return;
		}
		$this->collAdvogadoAreaAdvocacias = new PropelObjectCollection();
		$this->collAdvogadoAreaAdvocacias->setModel('AdvogadoAreaAdvocacia');
	}

	/**
	 * Gets an array of AdvogadoAreaAdvocacia objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this AreaAdvocacia is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AdvogadoAreaAdvocacia[] List of AdvogadoAreaAdvocacia objects
	 * @throws     PropelException
	 */
	public function getAdvogadoAreaAdvocacias($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAdvogadoAreaAdvocacias || null !== $criteria) {
			if ($this->isNew() && null === $this->collAdvogadoAreaAdvocacias) {
				// return empty collection
				$this->initAdvogadoAreaAdvocacias();
			} else {
				$collAdvogadoAreaAdvocacias = AdvogadoAreaAdvocaciaQuery::create(null, $criteria)
					->filterByAreaAdvocacia($this)
					->find($con);
				if (null !== $criteria) {
					return $collAdvogadoAreaAdvocacias;
				}
				$this->collAdvogadoAreaAdvocacias = $collAdvogadoAreaAdvocacias;
			}
		}
		return $this->collAdvogadoAreaAdvocacias;
	}

	/**
	 * Sets a collection of AdvogadoAreaAdvocacia objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $advogadoAreaAdvocacias A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setAdvogadoAreaAdvocacias(PropelCollection $advogadoAreaAdvocacias, PropelPDO $con = null)
	{
		$this->advogadoAreaAdvocaciasScheduledForDeletion = $this->getAdvogadoAreaAdvocacias(new Criteria(), $con)->diff($advogadoAreaAdvocacias);

		foreach ($advogadoAreaAdvocacias as $advogadoAreaAdvocacia) {
			// Fix issue with collection modified by reference
			if ($advogadoAreaAdvocacia->isNew()) {
				$advogadoAreaAdvocacia->setAreaAdvocacia($this);
			}
			$this->addAdvogadoAreaAdvocacia($advogadoAreaAdvocacia);
		}

		$this->collAdvogadoAreaAdvocacias = $advogadoAreaAdvocacias;
	}

	/**
	 * Returns the number of related AdvogadoAreaAdvocacia objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AdvogadoAreaAdvocacia objects.
	 * @throws     PropelException
	 */
	public function countAdvogadoAreaAdvocacias(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAdvogadoAreaAdvocacias || null !== $criteria) {
			if ($this->isNew() && null === $this->collAdvogadoAreaAdvocacias) {
				return 0;
			} else {
				$query = AdvogadoAreaAdvocaciaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAreaAdvocacia($this)
					->count($con);
			}
		} else {
			return count($this->collAdvogadoAreaAdvocacias);
		}
	}

	/**
	 * Method called to associate a AdvogadoAreaAdvocacia object to this object
	 * through the AdvogadoAreaAdvocacia foreign key attribute.
	 *
	 * @param      AdvogadoAreaAdvocacia $l AdvogadoAreaAdvocacia
	 * @return     AreaAdvocacia The current object (for fluent API support)
	 */
	public function addAdvogadoAreaAdvocacia(AdvogadoAreaAdvocacia $l)
	{
		if ($this->collAdvogadoAreaAdvocacias === null) {
			$this->initAdvogadoAreaAdvocacias();
		}
		if (!$this->collAdvogadoAreaAdvocacias->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddAdvogadoAreaAdvocacia($l);
		}

		return $this;
	}

	/**
	 * @param	AdvogadoAreaAdvocacia $advogadoAreaAdvocacia The advogadoAreaAdvocacia object to add.
	 */
	protected function doAddAdvogadoAreaAdvocacia($advogadoAreaAdvocacia)
	{
		$this->collAdvogadoAreaAdvocacias[]= $advogadoAreaAdvocacia;
		$advogadoAreaAdvocacia->setAreaAdvocacia($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AreaAdvocacia is new, it will return
	 * an empty collection; or if this AreaAdvocacia has previously
	 * been saved, it will retrieve related AdvogadoAreaAdvocacias from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AreaAdvocacia.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array AdvogadoAreaAdvocacia[] List of AdvogadoAreaAdvocacia objects
	 */
	public function getAdvogadoAreaAdvocaciasJoinAdvogado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AdvogadoAreaAdvocaciaQuery::create(null, $criteria);
		$query->joinWith('Advogado', $join_behavior);

		return $this->getAdvogadoAreaAdvocacias($query, $con);
	}

	/**
	 * Clears out the collCasos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCasos()
	 */
	public function clearCasos()
	{
		$this->collCasos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCasos collection.
	 *
	 * By default this just sets the collCasos collection to an empty array (like clearcollCasos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initCasos($overrideExisting = true)
	{
		if (null !== $this->collCasos && !$overrideExisting) {
			return;
		}
		$this->collCasos = new PropelObjectCollection();
		$this->collCasos->setModel('Caso');
	}

	/**
	 * Gets an array of Caso objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this AreaAdvocacia is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Caso[] List of Caso objects
	 * @throws     PropelException
	 */
	public function getCasos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCasos || null !== $criteria) {
			if ($this->isNew() && null === $this->collCasos) {
				// return empty collection
				$this->initCasos();
			} else {
				$collCasos = CasoQuery::create(null, $criteria)
					->filterByAreaAdvocacia($this)
					->find($con);
				if (null !== $criteria) {
					return $collCasos;
				}
				$this->collCasos = $collCasos;
			}
		}
		return $this->collCasos;
	}

	/**
	 * Sets a collection of Caso objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $casos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setCasos(PropelCollection $casos, PropelPDO $con = null)
	{
		$this->casosScheduledForDeletion = $this->getCasos(new Criteria(), $con)->diff($casos);

		foreach ($casos as $caso) {
			// Fix issue with collection modified by reference
			if ($caso->isNew()) {
				$caso->setAreaAdvocacia($this);
			}
			$this->addCaso($caso);
		}

		$this->collCasos = $casos;
	}

	/**
	 * Returns the number of related Caso objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Caso objects.
	 * @throws     PropelException
	 */
	public function countCasos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCasos || null !== $criteria) {
			if ($this->isNew() && null === $this->collCasos) {
				return 0;
			} else {
				$query = CasoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAreaAdvocacia($this)
					->count($con);
			}
		} else {
			return count($this->collCasos);
		}
	}

	/**
	 * Method called to associate a Caso object to this object
	 * through the Caso foreign key attribute.
	 *
	 * @param      Caso $l Caso
	 * @return     AreaAdvocacia The current object (for fluent API support)
	 */
	public function addCaso(Caso $l)
	{
		if ($this->collCasos === null) {
			$this->initCasos();
		}
		if (!$this->collCasos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddCaso($l);
		}

		return $this;
	}

	/**
	 * @param	Caso $caso The caso object to add.
	 */
	protected function doAddCaso($caso)
	{
		$this->collCasos[]= $caso;
		$caso->setAreaAdvocacia($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AreaAdvocacia is new, it will return
	 * an empty collection; or if this AreaAdvocacia has previously
	 * been saved, it will retrieve related Casos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AreaAdvocacia.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Caso[] List of Caso objects
	 */
	public function getCasosJoinAdvogado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CasoQuery::create(null, $criteria);
		$query->joinWith('Advogado', $join_behavior);

		return $this->getCasos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AreaAdvocacia is new, it will return
	 * an empty collection; or if this AreaAdvocacia has previously
	 * been saved, it will retrieve related Casos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AreaAdvocacia.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Caso[] List of Caso objects
	 */
	public function getCasosJoinCliente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CasoQuery::create(null, $criteria);
		$query->joinWith('Cliente', $join_behavior);

		return $this->getCasos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AreaAdvocacia is new, it will return
	 * an empty collection; or if this AreaAdvocacia has previously
	 * been saved, it will retrieve related Casos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AreaAdvocacia.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Caso[] List of Caso objects
	 */
	public function getCasosJoinContrato($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CasoQuery::create(null, $criteria);
		$query->joinWith('Contrato', $join_behavior);

		return $this->getCasos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AreaAdvocacia is new, it will return
	 * an empty collection; or if this AreaAdvocacia has previously
	 * been saved, it will retrieve related Casos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AreaAdvocacia.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Caso[] List of Caso objects
	 */
	public function getCasosJoinSolicitacao($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CasoQuery::create(null, $criteria);
		$query->joinWith('Solicitacao', $join_behavior);

		return $this->getCasos($query, $con);
	}

	/**
	 * Clears out the collContratos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addContratos()
	 */
	public function clearContratos()
	{
		$this->collContratos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collContratos collection.
	 *
	 * By default this just sets the collContratos collection to an empty array (like clearcollContratos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initContratos($overrideExisting = true)
	{
		if (null !== $this->collContratos && !$overrideExisting) {
			return;
		}
		$this->collContratos = new PropelObjectCollection();
		$this->collContratos->setModel('Contrato');
	}

	/**
	 * Gets an array of Contrato objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this AreaAdvocacia is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Contrato[] List of Contrato objects
	 * @throws     PropelException
	 */
	public function getContratos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collContratos || null !== $criteria) {
			if ($this->isNew() && null === $this->collContratos) {
				// return empty collection
				$this->initContratos();
			} else {
				$collContratos = ContratoQuery::create(null, $criteria)
					->filterByAreaAdvocacia($this)
					->find($con);
				if (null !== $criteria) {
					return $collContratos;
				}
				$this->collContratos = $collContratos;
			}
		}
		return $this->collContratos;
	}

	/**
	 * Sets a collection of Contrato objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $contratos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setContratos(PropelCollection $contratos, PropelPDO $con = null)
	{
		$this->contratosScheduledForDeletion = $this->getContratos(new Criteria(), $con)->diff($contratos);

		foreach ($contratos as $contrato) {
			// Fix issue with collection modified by reference
			if ($contrato->isNew()) {
				$contrato->setAreaAdvocacia($this);
			}
			$this->addContrato($contrato);
		}

		$this->collContratos = $contratos;
	}

	/**
	 * Returns the number of related Contrato objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Contrato objects.
	 * @throws     PropelException
	 */
	public function countContratos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collContratos || null !== $criteria) {
			if ($this->isNew() && null === $this->collContratos) {
				return 0;
			} else {
				$query = ContratoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAreaAdvocacia($this)
					->count($con);
			}
		} else {
			return count($this->collContratos);
		}
	}

	/**
	 * Method called to associate a Contrato object to this object
	 * through the Contrato foreign key attribute.
	 *
	 * @param      Contrato $l Contrato
	 * @return     AreaAdvocacia The current object (for fluent API support)
	 */
	public function addContrato(Contrato $l)
	{
		if ($this->collContratos === null) {
			$this->initContratos();
		}
		if (!$this->collContratos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddContrato($l);
		}

		return $this;
	}

	/**
	 * @param	Contrato $contrato The contrato object to add.
	 */
	protected function doAddContrato($contrato)
	{
		$this->collContratos[]= $contrato;
		$contrato->setAreaAdvocacia($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AreaAdvocacia is new, it will return
	 * an empty collection; or if this AreaAdvocacia has previously
	 * been saved, it will retrieve related Contratos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AreaAdvocacia.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Contrato[] List of Contrato objects
	 */
	public function getContratosJoinAdvogado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ContratoQuery::create(null, $criteria);
		$query->joinWith('Advogado', $join_behavior);

		return $this->getContratos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AreaAdvocacia is new, it will return
	 * an empty collection; or if this AreaAdvocacia has previously
	 * been saved, it will retrieve related Contratos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AreaAdvocacia.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Contrato[] List of Contrato objects
	 */
	public function getContratosJoinCliente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ContratoQuery::create(null, $criteria);
		$query->joinWith('Cliente', $join_behavior);

		return $this->getContratos($query, $con);
	}

	/**
	 * Clears out the collProcessos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addProcessos()
	 */
	public function clearProcessos()
	{
		$this->collProcessos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collProcessos collection.
	 *
	 * By default this just sets the collProcessos collection to an empty array (like clearcollProcessos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initProcessos($overrideExisting = true)
	{
		if (null !== $this->collProcessos && !$overrideExisting) {
			return;
		}
		$this->collProcessos = new PropelObjectCollection();
		$this->collProcessos->setModel('Processo');
	}

	/**
	 * Gets an array of Processo objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this AreaAdvocacia is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Processo[] List of Processo objects
	 * @throws     PropelException
	 */
	public function getProcessos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collProcessos || null !== $criteria) {
			if ($this->isNew() && null === $this->collProcessos) {
				// return empty collection
				$this->initProcessos();
			} else {
				$collProcessos = ProcessoQuery::create(null, $criteria)
					->filterByAreaAdvocacia($this)
					->find($con);
				if (null !== $criteria) {
					return $collProcessos;
				}
				$this->collProcessos = $collProcessos;
			}
		}
		return $this->collProcessos;
	}

	/**
	 * Sets a collection of Processo objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $processos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setProcessos(PropelCollection $processos, PropelPDO $con = null)
	{
		$this->processosScheduledForDeletion = $this->getProcessos(new Criteria(), $con)->diff($processos);

		foreach ($processos as $processo) {
			// Fix issue with collection modified by reference
			if ($processo->isNew()) {
				$processo->setAreaAdvocacia($this);
			}
			$this->addProcesso($processo);
		}

		$this->collProcessos = $processos;
	}

	/**
	 * Returns the number of related Processo objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Processo objects.
	 * @throws     PropelException
	 */
	public function countProcessos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collProcessos || null !== $criteria) {
			if ($this->isNew() && null === $this->collProcessos) {
				return 0;
			} else {
				$query = ProcessoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAreaAdvocacia($this)
					->count($con);
			}
		} else {
			return count($this->collProcessos);
		}
	}

	/**
	 * Method called to associate a Processo object to this object
	 * through the Processo foreign key attribute.
	 *
	 * @param      Processo $l Processo
	 * @return     AreaAdvocacia The current object (for fluent API support)
	 */
	public function addProcesso(Processo $l)
	{
		if ($this->collProcessos === null) {
			$this->initProcessos();
		}
		if (!$this->collProcessos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddProcesso($l);
		}

		return $this;
	}

	/**
	 * @param	Processo $processo The processo object to add.
	 */
	protected function doAddProcesso($processo)
	{
		$this->collProcessos[]= $processo;
		$processo->setAreaAdvocacia($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AreaAdvocacia is new, it will return
	 * an empty collection; or if this AreaAdvocacia has previously
	 * been saved, it will retrieve related Processos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AreaAdvocacia.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Processo[] List of Processo objects
	 */
	public function getProcessosJoinAdvogado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ProcessoQuery::create(null, $criteria);
		$query->joinWith('Advogado', $join_behavior);

		return $this->getProcessos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AreaAdvocacia is new, it will return
	 * an empty collection; or if this AreaAdvocacia has previously
	 * been saved, it will retrieve related Processos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AreaAdvocacia.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Processo[] List of Processo objects
	 */
	public function getProcessosJoinContrato($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ProcessoQuery::create(null, $criteria);
		$query->joinWith('Contrato', $join_behavior);

		return $this->getProcessos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AreaAdvocacia is new, it will return
	 * an empty collection; or if this AreaAdvocacia has previously
	 * been saved, it will retrieve related Processos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AreaAdvocacia.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Processo[] List of Processo objects
	 */
	public function getProcessosJoinFaseProcesso($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ProcessoQuery::create(null, $criteria);
		$query->joinWith('FaseProcesso', $join_behavior);

		return $this->getProcessos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AreaAdvocacia is new, it will return
	 * an empty collection; or if this AreaAdvocacia has previously
	 * been saved, it will retrieve related Processos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AreaAdvocacia.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Processo[] List of Processo objects
	 */
	public function getProcessosJoinTribunal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ProcessoQuery::create(null, $criteria);
		$query->joinWith('Tribunal', $join_behavior);

		return $this->getProcessos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AreaAdvocacia is new, it will return
	 * an empty collection; or if this AreaAdvocacia has previously
	 * been saved, it will retrieve related Processos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AreaAdvocacia.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Processo[] List of Processo objects
	 */
	public function getProcessosJoinUf($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ProcessoQuery::create(null, $criteria);
		$query->joinWith('Uf', $join_behavior);

		return $this->getProcessos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AreaAdvocacia is new, it will return
	 * an empty collection; or if this AreaAdvocacia has previously
	 * been saved, it will retrieve related Processos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AreaAdvocacia.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Processo[] List of Processo objects
	 */
	public function getProcessosJoinCliente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ProcessoQuery::create(null, $criteria);
		$query->joinWith('Cliente', $join_behavior);

		return $this->getProcessos($query, $con);
	}

	/**
	 * Clears out the collSolicitacaos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSolicitacaos()
	 */
	public function clearSolicitacaos()
	{
		$this->collSolicitacaos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSolicitacaos collection.
	 *
	 * By default this just sets the collSolicitacaos collection to an empty array (like clearcollSolicitacaos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initSolicitacaos($overrideExisting = true)
	{
		if (null !== $this->collSolicitacaos && !$overrideExisting) {
			return;
		}
		$this->collSolicitacaos = new PropelObjectCollection();
		$this->collSolicitacaos->setModel('Solicitacao');
	}

	/**
	 * Gets an array of Solicitacao objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this AreaAdvocacia is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Solicitacao[] List of Solicitacao objects
	 * @throws     PropelException
	 */
	public function getSolicitacaos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSolicitacaos || null !== $criteria) {
			if ($this->isNew() && null === $this->collSolicitacaos) {
				// return empty collection
				$this->initSolicitacaos();
			} else {
				$collSolicitacaos = SolicitacaoQuery::create(null, $criteria)
					->filterByAreaAdvocacia($this)
					->find($con);
				if (null !== $criteria) {
					return $collSolicitacaos;
				}
				$this->collSolicitacaos = $collSolicitacaos;
			}
		}
		return $this->collSolicitacaos;
	}

	/**
	 * Sets a collection of Solicitacao objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $solicitacaos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setSolicitacaos(PropelCollection $solicitacaos, PropelPDO $con = null)
	{
		$this->solicitacaosScheduledForDeletion = $this->getSolicitacaos(new Criteria(), $con)->diff($solicitacaos);

		foreach ($solicitacaos as $solicitacao) {
			// Fix issue with collection modified by reference
			if ($solicitacao->isNew()) {
				$solicitacao->setAreaAdvocacia($this);
			}
			$this->addSolicitacao($solicitacao);
		}

		$this->collSolicitacaos = $solicitacaos;
	}

	/**
	 * Returns the number of related Solicitacao objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Solicitacao objects.
	 * @throws     PropelException
	 */
	public function countSolicitacaos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSolicitacaos || null !== $criteria) {
			if ($this->isNew() && null === $this->collSolicitacaos) {
				return 0;
			} else {
				$query = SolicitacaoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAreaAdvocacia($this)
					->count($con);
			}
		} else {
			return count($this->collSolicitacaos);
		}
	}

	/**
	 * Method called to associate a Solicitacao object to this object
	 * through the Solicitacao foreign key attribute.
	 *
	 * @param      Solicitacao $l Solicitacao
	 * @return     AreaAdvocacia The current object (for fluent API support)
	 */
	public function addSolicitacao(Solicitacao $l)
	{
		if ($this->collSolicitacaos === null) {
			$this->initSolicitacaos();
		}
		if (!$this->collSolicitacaos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddSolicitacao($l);
		}

		return $this;
	}

	/**
	 * @param	Solicitacao $solicitacao The solicitacao object to add.
	 */
	protected function doAddSolicitacao($solicitacao)
	{
		$this->collSolicitacaos[]= $solicitacao;
		$solicitacao->setAreaAdvocacia($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AreaAdvocacia is new, it will return
	 * an empty collection; or if this AreaAdvocacia has previously
	 * been saved, it will retrieve related Solicitacaos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AreaAdvocacia.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Solicitacao[] List of Solicitacao objects
	 */
	public function getSolicitacaosJoinAdvogado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SolicitacaoQuery::create(null, $criteria);
		$query->joinWith('Advogado', $join_behavior);

		return $this->getSolicitacaos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this AreaAdvocacia is new, it will return
	 * an empty collection; or if this AreaAdvocacia has previously
	 * been saved, it will retrieve related Solicitacaos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in AreaAdvocacia.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Solicitacao[] List of Solicitacao objects
	 */
	public function getSolicitacaosJoinCliente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SolicitacaoQuery::create(null, $criteria);
		$query->joinWith('Cliente', $join_behavior);

		return $this->getSolicitacaos($query, $con);
	}

	/**
	 * Clears out the collTagAreaAdvocacias collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addTagAreaAdvocacias()
	 */
	public function clearTagAreaAdvocacias()
	{
		$this->collTagAreaAdvocacias = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collTagAreaAdvocacias collection.
	 *
	 * By default this just sets the collTagAreaAdvocacias collection to an empty array (like clearcollTagAreaAdvocacias());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initTagAreaAdvocacias($overrideExisting = true)
	{
		if (null !== $this->collTagAreaAdvocacias && !$overrideExisting) {
			return;
		}
		$this->collTagAreaAdvocacias = new PropelObjectCollection();
		$this->collTagAreaAdvocacias->setModel('TagAreaAdvocacia');
	}

	/**
	 * Gets an array of TagAreaAdvocacia objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this AreaAdvocacia is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array TagAreaAdvocacia[] List of TagAreaAdvocacia objects
	 * @throws     PropelException
	 */
	public function getTagAreaAdvocacias($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collTagAreaAdvocacias || null !== $criteria) {
			if ($this->isNew() && null === $this->collTagAreaAdvocacias) {
				// return empty collection
				$this->initTagAreaAdvocacias();
			} else {
				$collTagAreaAdvocacias = TagAreaAdvocaciaQuery::create(null, $criteria)
					->filterByAreaAdvocacia($this)
					->find($con);
				if (null !== $criteria) {
					return $collTagAreaAdvocacias;
				}
				$this->collTagAreaAdvocacias = $collTagAreaAdvocacias;
			}
		}
		return $this->collTagAreaAdvocacias;
	}

	/**
	 * Sets a collection of TagAreaAdvocacia objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $tagAreaAdvocacias A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setTagAreaAdvocacias(PropelCollection $tagAreaAdvocacias, PropelPDO $con = null)
	{
		$this->tagAreaAdvocaciasScheduledForDeletion = $this->getTagAreaAdvocacias(new Criteria(), $con)->diff($tagAreaAdvocacias);

		foreach ($tagAreaAdvocacias as $tagAreaAdvocacia) {
			// Fix issue with collection modified by reference
			if ($tagAreaAdvocacia->isNew()) {
				$tagAreaAdvocacia->setAreaAdvocacia($this);
			}
			$this->addTagAreaAdvocacia($tagAreaAdvocacia);
		}

		$this->collTagAreaAdvocacias = $tagAreaAdvocacias;
	}

	/**
	 * Returns the number of related TagAreaAdvocacia objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related TagAreaAdvocacia objects.
	 * @throws     PropelException
	 */
	public function countTagAreaAdvocacias(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collTagAreaAdvocacias || null !== $criteria) {
			if ($this->isNew() && null === $this->collTagAreaAdvocacias) {
				return 0;
			} else {
				$query = TagAreaAdvocaciaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAreaAdvocacia($this)
					->count($con);
			}
		} else {
			return count($this->collTagAreaAdvocacias);
		}
	}

	/**
	 * Method called to associate a TagAreaAdvocacia object to this object
	 * through the TagAreaAdvocacia foreign key attribute.
	 *
	 * @param      TagAreaAdvocacia $l TagAreaAdvocacia
	 * @return     AreaAdvocacia The current object (for fluent API support)
	 */
	public function addTagAreaAdvocacia(TagAreaAdvocacia $l)
	{
		if ($this->collTagAreaAdvocacias === null) {
			$this->initTagAreaAdvocacias();
		}
		if (!$this->collTagAreaAdvocacias->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddTagAreaAdvocacia($l);
		}

		return $this;
	}

	/**
	 * @param	TagAreaAdvocacia $tagAreaAdvocacia The tagAreaAdvocacia object to add.
	 */
	protected function doAddTagAreaAdvocacia($tagAreaAdvocacia)
	{
		$this->collTagAreaAdvocacias[]= $tagAreaAdvocacia;
		$tagAreaAdvocacia->setAreaAdvocacia($this);
	}

	/**
	 * Clears out the collAdvogados collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAdvogados()
	 */
	public function clearAdvogados()
	{
		$this->collAdvogados = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAdvogados collection.
	 *
	 * By default this just sets the collAdvogados collection to an empty collection (like clearAdvogados());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAdvogados()
	{
		$this->collAdvogados = new PropelObjectCollection();
		$this->collAdvogados->setModel('Advogado');
	}

	/**
	 * Gets a collection of Advogado objects related by a many-to-many relationship
	 * to the current object by way of the advogado_area_advocacia cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this AreaAdvocacia is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Advogado[] List of Advogado objects
	 */
	public function getAdvogados($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAdvogados || null !== $criteria) {
			if ($this->isNew() && null === $this->collAdvogados) {
				// return empty collection
				$this->initAdvogados();
			} else {
				$collAdvogados = AdvogadoQuery::create(null, $criteria)
					->filterByAreaAdvocacia($this)
					->find($con);
				if (null !== $criteria) {
					return $collAdvogados;
				}
				$this->collAdvogados = $collAdvogados;
			}
		}
		return $this->collAdvogados;
	}

	/**
	 * Sets a collection of Advogado objects related by a many-to-many relationship
	 * to the current object by way of the advogado_area_advocacia cross-reference table.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $advogados A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setAdvogados(PropelCollection $advogados, PropelPDO $con = null)
	{
		$advogadoAreaAdvocacias = AdvogadoAreaAdvocaciaQuery::create()
			->filterByAdvogado($advogados)
			->filterByAreaAdvocacia($this)
			->find($con);

		$this->advogadosScheduledForDeletion = $this->getAdvogadoAreaAdvocacias()->diff($advogadoAreaAdvocacias);
		$this->collAdvogadoAreaAdvocacias = $advogadoAreaAdvocacias;

		foreach ($advogados as $advogado) {
			// Fix issue with collection modified by reference
			if ($advogado->isNew()) {
				$this->doAddAdvogado($advogado);
			} else {
				$this->addAdvogado($advogado);
			}
		}

		$this->collAdvogados = $advogados;
	}

	/**
	 * Gets the number of Advogado objects related by a many-to-many relationship
	 * to the current object by way of the advogado_area_advocacia cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Advogado objects
	 */
	public function countAdvogados($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAdvogados || null !== $criteria) {
			if ($this->isNew() && null === $this->collAdvogados) {
				return 0;
			} else {
				$query = AdvogadoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAreaAdvocacia($this)
					->count($con);
			}
		} else {
			return count($this->collAdvogados);
		}
	}

	/**
	 * Associate a Advogado object to this object
	 * through the advogado_area_advocacia cross reference table.
	 *
	 * @param      Advogado $advogado The AdvogadoAreaAdvocacia object to relate
	 * @return     void
	 */
	public function addAdvogado(Advogado $advogado)
	{
		if ($this->collAdvogados === null) {
			$this->initAdvogados();
		}
		if (!$this->collAdvogados->contains($advogado)) { // only add it if the **same** object is not already associated
			$this->doAddAdvogado($advogado);

			$this->collAdvogados[]= $advogado;
		}
	}

	/**
	 * @param	Advogado $advogado The advogado object to add.
	 */
	protected function doAddAdvogado($advogado)
	{
		$advogadoAreaAdvocacia = new AdvogadoAreaAdvocacia();
		$advogadoAreaAdvocacia->setAdvogado($advogado);
		$this->addAdvogadoAreaAdvocacia($advogadoAreaAdvocacia);
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
			if ($this->collAdvogadoAreaAdvocacias) {
				foreach ($this->collAdvogadoAreaAdvocacias as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCasos) {
				foreach ($this->collCasos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collContratos) {
				foreach ($this->collContratos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collProcessos) {
				foreach ($this->collProcessos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSolicitacaos) {
				foreach ($this->collSolicitacaos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collTagAreaAdvocacias) {
				foreach ($this->collTagAreaAdvocacias as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAdvogados) {
				foreach ($this->collAdvogados as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collAdvogadoAreaAdvocacias instanceof PropelCollection) {
			$this->collAdvogadoAreaAdvocacias->clearIterator();
		}
		$this->collAdvogadoAreaAdvocacias = null;
		if ($this->collCasos instanceof PropelCollection) {
			$this->collCasos->clearIterator();
		}
		$this->collCasos = null;
		if ($this->collContratos instanceof PropelCollection) {
			$this->collContratos->clearIterator();
		}
		$this->collContratos = null;
		if ($this->collProcessos instanceof PropelCollection) {
			$this->collProcessos->clearIterator();
		}
		$this->collProcessos = null;
		if ($this->collSolicitacaos instanceof PropelCollection) {
			$this->collSolicitacaos->clearIterator();
		}
		$this->collSolicitacaos = null;
		if ($this->collTagAreaAdvocacias instanceof PropelCollection) {
			$this->collTagAreaAdvocacias->clearIterator();
		}
		$this->collTagAreaAdvocacias = null;
		if ($this->collAdvogados instanceof PropelCollection) {
			$this->collAdvogados->clearIterator();
		}
		$this->collAdvogados = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(AreaAdvocaciaPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseAreaAdvocacia
