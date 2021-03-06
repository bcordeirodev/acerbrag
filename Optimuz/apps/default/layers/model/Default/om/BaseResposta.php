<?php


/**
 * Base class that represents a row from the 'resposta' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseResposta extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'RespostaPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        RespostaPeer
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
	 * The value for the coleta_pesquisa_id field.
	 * @var        int
	 */
	protected $coleta_pesquisa_id;

	/**
	 * The value for the pergunta_id field.
	 * @var        int
	 */
	protected $pergunta_id;

	/**
	 * The value for the alternativa_id field.
	 * @var        int
	 */
	protected $alternativa_id;

	/**
	 * The value for the texto field.
	 * @var        string
	 */
	protected $texto;

	/**
	 * @var        ColetaPesquisa
	 */
	protected $aColetaPesquisa;

	/**
	 * @var        Alternativa
	 */
	protected $aAlternativa;

	/**
	 * @var        Pergunta
	 */
	protected $aPergunta;

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
	 * Get the [coleta_pesquisa_id] column value.
	 * 
	 * @return     int
	 */
	public function getColetaPesquisaId()
	{
		return $this->coleta_pesquisa_id;
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
	 * Get the [alternativa_id] column value.
	 * 
	 * @return     int
	 */
	public function getAlternativaId()
	{
		return $this->alternativa_id;
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
	 * @return     Resposta The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RespostaPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [coleta_pesquisa_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Resposta The current object (for fluent API support)
	 */
	public function setColetaPesquisaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->coleta_pesquisa_id !== $v) {
			$this->coleta_pesquisa_id = $v;
			$this->modifiedColumns[] = RespostaPeer::COLETA_PESQUISA_ID;
		}

		if ($this->aColetaPesquisa !== null && $this->aColetaPesquisa->getId() !== $v) {
			$this->aColetaPesquisa = null;
		}

		return $this;
	} // setColetaPesquisaId()

	/**
	 * Set the value of [pergunta_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Resposta The current object (for fluent API support)
	 */
	public function setPerguntaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->pergunta_id !== $v) {
			$this->pergunta_id = $v;
			$this->modifiedColumns[] = RespostaPeer::PERGUNTA_ID;
		}

		if ($this->aPergunta !== null && $this->aPergunta->getId() !== $v) {
			$this->aPergunta = null;
		}

		return $this;
	} // setPerguntaId()

	/**
	 * Set the value of [alternativa_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Resposta The current object (for fluent API support)
	 */
	public function setAlternativaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->alternativa_id !== $v) {
			$this->alternativa_id = $v;
			$this->modifiedColumns[] = RespostaPeer::ALTERNATIVA_ID;
		}

		if ($this->aAlternativa !== null && $this->aAlternativa->getId() !== $v) {
			$this->aAlternativa = null;
		}

		return $this;
	} // setAlternativaId()

	/**
	 * Set the value of [texto] column.
	 * 
	 * @param      string $v new value
	 * @return     Resposta The current object (for fluent API support)
	 */
	public function setTexto($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->texto !== $v) {
			$this->texto = $v;
			$this->modifiedColumns[] = RespostaPeer::TEXTO;
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
			$this->coleta_pesquisa_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->pergunta_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->alternativa_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->texto = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 5; // 5 = RespostaPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Resposta object", $e);
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

		if ($this->aColetaPesquisa !== null && $this->coleta_pesquisa_id !== $this->aColetaPesquisa->getId()) {
			$this->aColetaPesquisa = null;
		}
		if ($this->aPergunta !== null && $this->pergunta_id !== $this->aPergunta->getId()) {
			$this->aPergunta = null;
		}
		if ($this->aAlternativa !== null && $this->alternativa_id !== $this->aAlternativa->getId()) {
			$this->aAlternativa = null;
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
			$con = Propel::getConnection(RespostaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = RespostaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aColetaPesquisa = null;
			$this->aAlternativa = null;
			$this->aPergunta = null;
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
			$con = Propel::getConnection(RespostaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = RespostaQuery::create()
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
			$con = Propel::getConnection(RespostaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				RespostaPeer::addInstanceToPool($this);
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

			if ($this->aColetaPesquisa !== null) {
				if ($this->aColetaPesquisa->isModified() || $this->aColetaPesquisa->isNew()) {
					$affectedRows += $this->aColetaPesquisa->save($con);
				}
				$this->setColetaPesquisa($this->aColetaPesquisa);
			}

			if ($this->aAlternativa !== null) {
				if ($this->aAlternativa->isModified() || $this->aAlternativa->isNew()) {
					$affectedRows += $this->aAlternativa->save($con);
				}
				$this->setAlternativa($this->aAlternativa);
			}

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

		$this->modifiedColumns[] = RespostaPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . RespostaPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(RespostaPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(RespostaPeer::COLETA_PESQUISA_ID)) {
			$modifiedColumns[':p' . $index++]  = '`COLETA_PESQUISA_ID`';
		}
		if ($this->isColumnModified(RespostaPeer::PERGUNTA_ID)) {
			$modifiedColumns[':p' . $index++]  = '`PERGUNTA_ID`';
		}
		if ($this->isColumnModified(RespostaPeer::ALTERNATIVA_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ALTERNATIVA_ID`';
		}
		if ($this->isColumnModified(RespostaPeer::TEXTO)) {
			$modifiedColumns[':p' . $index++]  = '`TEXTO`';
		}

		$sql = sprintf(
			'INSERT INTO `resposta` (%s) VALUES (%s)',
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
					case '`COLETA_PESQUISA_ID`':						
						$stmt->bindValue($identifier, $this->coleta_pesquisa_id, PDO::PARAM_INT);
						break;
					case '`PERGUNTA_ID`':						
						$stmt->bindValue($identifier, $this->pergunta_id, PDO::PARAM_INT);
						break;
					case '`ALTERNATIVA_ID`':						
						$stmt->bindValue($identifier, $this->alternativa_id, PDO::PARAM_INT);
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
		$pos = RespostaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getColetaPesquisaId();
				break;
			case 2:
				return $this->getPerguntaId();
				break;
			case 3:
				return $this->getAlternativaId();
				break;
			case 4:
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
		if (isset($alreadyDumpedObjects['Resposta'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Resposta'][$this->getPrimaryKey()] = true;
		$keys = RespostaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getColetaPesquisaId(),
			$keys[2] => $this->getPerguntaId(),
			$keys[3] => $this->getAlternativaId(),
			$keys[4] => $this->getTexto(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aColetaPesquisa) {
				$result['ColetaPesquisa'] = $this->aColetaPesquisa->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aAlternativa) {
				$result['Alternativa'] = $this->aAlternativa->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aPergunta) {
				$result['Pergunta'] = $this->aPergunta->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
		$pos = RespostaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setColetaPesquisaId($value);
				break;
			case 2:
				$this->setPerguntaId($value);
				break;
			case 3:
				$this->setAlternativaId($value);
				break;
			case 4:
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
		$keys = RespostaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setColetaPesquisaId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPerguntaId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAlternativaId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTexto($arr[$keys[4]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(RespostaPeer::DATABASE_NAME);

		if ($this->isColumnModified(RespostaPeer::ID)) $criteria->add(RespostaPeer::ID, $this->id);
		if ($this->isColumnModified(RespostaPeer::COLETA_PESQUISA_ID)) $criteria->add(RespostaPeer::COLETA_PESQUISA_ID, $this->coleta_pesquisa_id);
		if ($this->isColumnModified(RespostaPeer::PERGUNTA_ID)) $criteria->add(RespostaPeer::PERGUNTA_ID, $this->pergunta_id);
		if ($this->isColumnModified(RespostaPeer::ALTERNATIVA_ID)) $criteria->add(RespostaPeer::ALTERNATIVA_ID, $this->alternativa_id);
		if ($this->isColumnModified(RespostaPeer::TEXTO)) $criteria->add(RespostaPeer::TEXTO, $this->texto);

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
		$criteria = new Criteria(RespostaPeer::DATABASE_NAME);
		$criteria->add(RespostaPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Resposta (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setColetaPesquisaId($this->getColetaPesquisaId());
		$copyObj->setPerguntaId($this->getPerguntaId());
		$copyObj->setAlternativaId($this->getAlternativaId());
		$copyObj->setTexto($this->getTexto());

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
	 * @return     Resposta Clone of current object.
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
	 * @return     RespostaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new RespostaPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a ColetaPesquisa object.
	 *
	 * @param      ColetaPesquisa $v
	 * @return     Resposta The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setColetaPesquisa(ColetaPesquisa $v = null)
	{
		if ($v === null) {
			$this->setColetaPesquisaId(NULL);
		} else {
			$this->setColetaPesquisaId($v->getId());
		}

		$this->aColetaPesquisa = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the ColetaPesquisa object, it will not be re-added.
		if ($v !== null) {
			$v->addResposta($this);
		}

		return $this;
	}


	/**
	 * Get the associated ColetaPesquisa object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     ColetaPesquisa The associated ColetaPesquisa object.
	 * @throws     PropelException
	 */
	public function getColetaPesquisa(PropelPDO $con = null)
	{
		if ($this->aColetaPesquisa === null && ($this->coleta_pesquisa_id !== null)) {
			$this->aColetaPesquisa = ColetaPesquisaQuery::create()->findPk($this->coleta_pesquisa_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aColetaPesquisa->addRespostas($this);
			 */
		}
		return $this->aColetaPesquisa;
	}

	/**
	 * Declares an association between this object and a Alternativa object.
	 *
	 * @param      Alternativa $v
	 * @return     Resposta The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setAlternativa(Alternativa $v = null)
	{
		if ($v === null) {
			$this->setAlternativaId(NULL);
		} else {
			$this->setAlternativaId($v->getId());
		}

		$this->aAlternativa = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Alternativa object, it will not be re-added.
		if ($v !== null) {
			$v->addResposta($this);
		}

		return $this;
	}


	/**
	 * Get the associated Alternativa object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Alternativa The associated Alternativa object.
	 * @throws     PropelException
	 */
	public function getAlternativa(PropelPDO $con = null)
	{
		if ($this->aAlternativa === null && ($this->alternativa_id !== null)) {
			$this->aAlternativa = AlternativaQuery::create()->findPk($this->alternativa_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aAlternativa->addRespostas($this);
			 */
		}
		return $this->aAlternativa;
	}

	/**
	 * Declares an association between this object and a Pergunta object.
	 *
	 * @param      Pergunta $v
	 * @return     Resposta The current object (for fluent API support)
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
			$v->addResposta($this);
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
				$this->aPergunta->addRespostas($this);
			 */
		}
		return $this->aPergunta;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->coleta_pesquisa_id = null;
		$this->pergunta_id = null;
		$this->alternativa_id = null;
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
		} // if ($deep)

		$this->aColetaPesquisa = null;
		$this->aAlternativa = null;
		$this->aPergunta = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(RespostaPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseResposta
