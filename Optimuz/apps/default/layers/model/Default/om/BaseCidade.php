<?php


/**
 * Base class that represents a row from the 'cidade' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseCidade extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'CidadePeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        CidadePeer
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
	 * The value for the uf_id field.
	 * @var        int
	 */
	protected $uf_id;

	/**
	 * The value for the nome field.
	 * @var        string
	 */
	protected $nome;

	/**
	 * The value for the slug field.
	 * @var        string
	 */
	protected $slug;

	/**
	 * The value for the longitude field.
	 * @var        string
	 */
	protected $longitude;

	/**
	 * The value for the latitude field.
	 * @var        string
	 */
	protected $latitude;

	/**
	 * @var        Uf
	 */
	protected $aUf;

	/**
	 * @var        array Endereco[] Collection to store aggregation of Endereco objects.
	 */
	protected $collEnderecos;

	/**
	 * @var        array Membro[] Collection to store aggregation of Membro objects.
	 */
	protected $collMembros;

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
	protected $enderecosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $membrosScheduledForDeletion = null;

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
	 * Get the [uf_id] column value.
	 * 
	 * @return     int
	 */
	public function getUfId()
	{
		return $this->uf_id;
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
	 * Get the [slug] column value.
	 * 
	 * @return     string
	 */
	public function getSlug()
	{
		return $this->slug;
	}

	/**
	 * Get the [longitude] column value.
	 * 
	 * @return     string
	 */
	public function getLongitude()
	{
		return $this->longitude;
	}

	/**
	 * Get the [latitude] column value.
	 * 
	 * @return     string
	 */
	public function getLatitude()
	{
		return $this->latitude;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Cidade The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CidadePeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [uf_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Cidade The current object (for fluent API support)
	 */
	public function setUfId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->uf_id !== $v) {
			$this->uf_id = $v;
			$this->modifiedColumns[] = CidadePeer::UF_ID;
		}

		if ($this->aUf !== null && $this->aUf->getId() !== $v) {
			$this->aUf = null;
		}

		return $this;
	} // setUfId()

	/**
	 * Set the value of [nome] column.
	 * 
	 * @param      string $v new value
	 * @return     Cidade The current object (for fluent API support)
	 */
	public function setNome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome !== $v) {
			$this->nome = $v;
			$this->modifiedColumns[] = CidadePeer::NOME;
		}

		return $this;
	} // setNome()

	/**
	 * Set the value of [slug] column.
	 * 
	 * @param      string $v new value
	 * @return     Cidade The current object (for fluent API support)
	 */
	public function setSlug($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = CidadePeer::SLUG;
		}

		return $this;
	} // setSlug()

	/**
	 * Set the value of [longitude] column.
	 * 
	 * @param      string $v new value
	 * @return     Cidade The current object (for fluent API support)
	 */
	public function setLongitude($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->longitude !== $v) {
			$this->longitude = $v;
			$this->modifiedColumns[] = CidadePeer::LONGITUDE;
		}

		return $this;
	} // setLongitude()

	/**
	 * Set the value of [latitude] column.
	 * 
	 * @param      string $v new value
	 * @return     Cidade The current object (for fluent API support)
	 */
	public function setLatitude($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->latitude !== $v) {
			$this->latitude = $v;
			$this->modifiedColumns[] = CidadePeer::LATITUDE;
		}

		return $this;
	} // setLatitude()

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
			$this->uf_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->nome = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->slug = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->longitude = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->latitude = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 6; // 6 = CidadePeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Cidade object", $e);
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

		if ($this->aUf !== null && $this->uf_id !== $this->aUf->getId()) {
			$this->aUf = null;
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
			$con = Propel::getConnection(CidadePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = CidadePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aUf = null;
			$this->collEnderecos = null;

			$this->collMembros = null;

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
			$con = Propel::getConnection(CidadePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = CidadeQuery::create()
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
			$con = Propel::getConnection(CidadePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				CidadePeer::addInstanceToPool($this);
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

			if ($this->aUf !== null) {
				if ($this->aUf->isModified() || $this->aUf->isNew()) {
					$affectedRows += $this->aUf->save($con);
				}
				$this->setUf($this->aUf);
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

			if ($this->enderecosScheduledForDeletion !== null) {
				if (!$this->enderecosScheduledForDeletion->isEmpty()) {
					EnderecoQuery::create()
						->filterByPrimaryKeys($this->enderecosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->enderecosScheduledForDeletion = null;
				}
			}

			if ($this->collEnderecos !== null) {
				foreach ($this->collEnderecos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->membrosScheduledForDeletion !== null) {
				if (!$this->membrosScheduledForDeletion->isEmpty()) {
					MembroQuery::create()
						->filterByPrimaryKeys($this->membrosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->membrosScheduledForDeletion = null;
				}
			}

			if ($this->collMembros !== null) {
				foreach ($this->collMembros as $referrerFK) {
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

		$this->modifiedColumns[] = CidadePeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . CidadePeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(CidadePeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(CidadePeer::UF_ID)) {
			$modifiedColumns[':p' . $index++]  = '`UF_ID`';
		}
		if ($this->isColumnModified(CidadePeer::NOME)) {
			$modifiedColumns[':p' . $index++]  = '`NOME`';
		}
		if ($this->isColumnModified(CidadePeer::SLUG)) {
			$modifiedColumns[':p' . $index++]  = '`SLUG`';
		}
		if ($this->isColumnModified(CidadePeer::LONGITUDE)) {
			$modifiedColumns[':p' . $index++]  = '`LONGITUDE`';
		}
		if ($this->isColumnModified(CidadePeer::LATITUDE)) {
			$modifiedColumns[':p' . $index++]  = '`LATITUDE`';
		}

		$sql = sprintf(
			'INSERT INTO `cidade` (%s) VALUES (%s)',
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
					case '`UF_ID`':						
						$stmt->bindValue($identifier, $this->uf_id, PDO::PARAM_INT);
						break;
					case '`NOME`':						
						$stmt->bindValue($identifier, $this->nome, PDO::PARAM_STR);
						break;
					case '`SLUG`':						
						$stmt->bindValue($identifier, $this->slug, PDO::PARAM_STR);
						break;
					case '`LONGITUDE`':						
						$stmt->bindValue($identifier, $this->longitude, PDO::PARAM_STR);
						break;
					case '`LATITUDE`':						
						$stmt->bindValue($identifier, $this->latitude, PDO::PARAM_STR);
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
		$pos = CidadePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getUfId();
				break;
			case 2:
				return $this->getNome();
				break;
			case 3:
				return $this->getSlug();
				break;
			case 4:
				return $this->getLongitude();
				break;
			case 5:
				return $this->getLatitude();
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
		if (isset($alreadyDumpedObjects['Cidade'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Cidade'][$this->getPrimaryKey()] = true;
		$keys = CidadePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUfId(),
			$keys[2] => $this->getNome(),
			$keys[3] => $this->getSlug(),
			$keys[4] => $this->getLongitude(),
			$keys[5] => $this->getLatitude(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aUf) {
				$result['Uf'] = $this->aUf->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collEnderecos) {
				$result['Enderecos'] = $this->collEnderecos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collMembros) {
				$result['Membros'] = $this->collMembros->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = CidadePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setUfId($value);
				break;
			case 2:
				$this->setNome($value);
				break;
			case 3:
				$this->setSlug($value);
				break;
			case 4:
				$this->setLongitude($value);
				break;
			case 5:
				$this->setLatitude($value);
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
		$keys = CidadePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUfId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNome($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSlug($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setLongitude($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setLatitude($arr[$keys[5]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(CidadePeer::DATABASE_NAME);

		if ($this->isColumnModified(CidadePeer::ID)) $criteria->add(CidadePeer::ID, $this->id);
		if ($this->isColumnModified(CidadePeer::UF_ID)) $criteria->add(CidadePeer::UF_ID, $this->uf_id);
		if ($this->isColumnModified(CidadePeer::NOME)) $criteria->add(CidadePeer::NOME, $this->nome);
		if ($this->isColumnModified(CidadePeer::SLUG)) $criteria->add(CidadePeer::SLUG, $this->slug);
		if ($this->isColumnModified(CidadePeer::LONGITUDE)) $criteria->add(CidadePeer::LONGITUDE, $this->longitude);
		if ($this->isColumnModified(CidadePeer::LATITUDE)) $criteria->add(CidadePeer::LATITUDE, $this->latitude);

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
		$criteria = new Criteria(CidadePeer::DATABASE_NAME);
		$criteria->add(CidadePeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Cidade (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setUfId($this->getUfId());
		$copyObj->setNome($this->getNome());
		$copyObj->setSlug($this->getSlug());
		$copyObj->setLongitude($this->getLongitude());
		$copyObj->setLatitude($this->getLatitude());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getEnderecos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addEndereco($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getMembros() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addMembro($relObj->copy($deepCopy));
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
	 * @return     Cidade Clone of current object.
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
	 * @return     CidadePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CidadePeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Uf object.
	 *
	 * @param      Uf $v
	 * @return     Cidade The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUf(Uf $v = null)
	{
		if ($v === null) {
			$this->setUfId(NULL);
		} else {
			$this->setUfId($v->getId());
		}

		$this->aUf = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Uf object, it will not be re-added.
		if ($v !== null) {
			$v->addCidade($this);
		}

		return $this;
	}


	/**
	 * Get the associated Uf object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Uf The associated Uf object.
	 * @throws     PropelException
	 */
	public function getUf(PropelPDO $con = null)
	{
		if ($this->aUf === null && ($this->uf_id !== null)) {
			$this->aUf = UfQuery::create()->findPk($this->uf_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aUf->addCidades($this);
			 */
		}
		return $this->aUf;
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
		if ('Endereco' == $relationName) {
			return $this->initEnderecos();
		}
		if ('Membro' == $relationName) {
			return $this->initMembros();
		}
	}

	/**
	 * Clears out the collEnderecos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addEnderecos()
	 */
	public function clearEnderecos()
	{
		$this->collEnderecos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collEnderecos collection.
	 *
	 * By default this just sets the collEnderecos collection to an empty array (like clearcollEnderecos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initEnderecos($overrideExisting = true)
	{
		if (null !== $this->collEnderecos && !$overrideExisting) {
			return;
		}
		$this->collEnderecos = new PropelObjectCollection();
		$this->collEnderecos->setModel('Endereco');
	}

	/**
	 * Gets an array of Endereco objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Cidade is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Endereco[] List of Endereco objects
	 * @throws     PropelException
	 */
	public function getEnderecos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collEnderecos || null !== $criteria) {
			if ($this->isNew() && null === $this->collEnderecos) {
				// return empty collection
				$this->initEnderecos();
			} else {
				$collEnderecos = EnderecoQuery::create(null, $criteria)
					->filterByCidade($this)
					->find($con);
				if (null !== $criteria) {
					return $collEnderecos;
				}
				$this->collEnderecos = $collEnderecos;
			}
		}
		return $this->collEnderecos;
	}

	/**
	 * Sets a collection of Endereco objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $enderecos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setEnderecos(PropelCollection $enderecos, PropelPDO $con = null)
	{
		$this->enderecosScheduledForDeletion = $this->getEnderecos(new Criteria(), $con)->diff($enderecos);

		foreach ($enderecos as $endereco) {
			// Fix issue with collection modified by reference
			if ($endereco->isNew()) {
				$endereco->setCidade($this);
			}
			$this->addEndereco($endereco);
		}

		$this->collEnderecos = $enderecos;
	}

	/**
	 * Returns the number of related Endereco objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Endereco objects.
	 * @throws     PropelException
	 */
	public function countEnderecos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collEnderecos || null !== $criteria) {
			if ($this->isNew() && null === $this->collEnderecos) {
				return 0;
			} else {
				$query = EnderecoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCidade($this)
					->count($con);
			}
		} else {
			return count($this->collEnderecos);
		}
	}

	/**
	 * Method called to associate a Endereco object to this object
	 * through the Endereco foreign key attribute.
	 *
	 * @param      Endereco $l Endereco
	 * @return     Cidade The current object (for fluent API support)
	 */
	public function addEndereco(Endereco $l)
	{
		if ($this->collEnderecos === null) {
			$this->initEnderecos();
		}
		if (!$this->collEnderecos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddEndereco($l);
		}

		return $this;
	}

	/**
	 * @param	Endereco $endereco The endereco object to add.
	 */
	protected function doAddEndereco($endereco)
	{
		$this->collEnderecos[]= $endereco;
		$endereco->setCidade($this);
	}

	/**
	 * Clears out the collMembros collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addMembros()
	 */
	public function clearMembros()
	{
		$this->collMembros = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collMembros collection.
	 *
	 * By default this just sets the collMembros collection to an empty array (like clearcollMembros());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initMembros($overrideExisting = true)
	{
		if (null !== $this->collMembros && !$overrideExisting) {
			return;
		}
		$this->collMembros = new PropelObjectCollection();
		$this->collMembros->setModel('Membro');
	}

	/**
	 * Gets an array of Membro objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Cidade is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Membro[] List of Membro objects
	 * @throws     PropelException
	 */
	public function getMembros($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collMembros || null !== $criteria) {
			if ($this->isNew() && null === $this->collMembros) {
				// return empty collection
				$this->initMembros();
			} else {
				$collMembros = MembroQuery::create(null, $criteria)
					->filterByCidade($this)
					->find($con);
				if (null !== $criteria) {
					return $collMembros;
				}
				$this->collMembros = $collMembros;
			}
		}
		return $this->collMembros;
	}

	/**
	 * Sets a collection of Membro objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $membros A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setMembros(PropelCollection $membros, PropelPDO $con = null)
	{
		$this->membrosScheduledForDeletion = $this->getMembros(new Criteria(), $con)->diff($membros);

		foreach ($membros as $membro) {
			// Fix issue with collection modified by reference
			if ($membro->isNew()) {
				$membro->setCidade($this);
			}
			$this->addMembro($membro);
		}

		$this->collMembros = $membros;
	}

	/**
	 * Returns the number of related Membro objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Membro objects.
	 * @throws     PropelException
	 */
	public function countMembros(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collMembros || null !== $criteria) {
			if ($this->isNew() && null === $this->collMembros) {
				return 0;
			} else {
				$query = MembroQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCidade($this)
					->count($con);
			}
		} else {
			return count($this->collMembros);
		}
	}

	/**
	 * Method called to associate a Membro object to this object
	 * through the Membro foreign key attribute.
	 *
	 * @param      Membro $l Membro
	 * @return     Cidade The current object (for fluent API support)
	 */
	public function addMembro(Membro $l)
	{
		if ($this->collMembros === null) {
			$this->initMembros();
		}
		if (!$this->collMembros->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddMembro($l);
		}

		return $this;
	}

	/**
	 * @param	Membro $membro The membro object to add.
	 */
	protected function doAddMembro($membro)
	{
		$this->collMembros[]= $membro;
		$membro->setCidade($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cidade is new, it will return
	 * an empty collection; or if this Cidade has previously
	 * been saved, it will retrieve related Membros from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cidade.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Membro[] List of Membro objects
	 */
	public function getMembrosJoinEndereco($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = MembroQuery::create(null, $criteria);
		$query->joinWith('Endereco', $join_behavior);

		return $this->getMembros($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cidade is new, it will return
	 * an empty collection; or if this Cidade has previously
	 * been saved, it will retrieve related Membros from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cidade.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Membro[] List of Membro objects
	 */
	public function getMembrosJoinIgrejaRelatedByFilialId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = MembroQuery::create(null, $criteria);
		$query->joinWith('IgrejaRelatedByFilialId', $join_behavior);

		return $this->getMembros($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cidade is new, it will return
	 * an empty collection; or if this Cidade has previously
	 * been saved, it will retrieve related Membros from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cidade.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Membro[] List of Membro objects
	 */
	public function getMembrosJoinIgrejaRelatedByInstituicaoId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = MembroQuery::create(null, $criteria);
		$query->joinWith('IgrejaRelatedByInstituicaoId', $join_behavior);

		return $this->getMembros($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cidade is new, it will return
	 * an empty collection; or if this Cidade has previously
	 * been saved, it will retrieve related Membros from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cidade.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Membro[] List of Membro objects
	 */
	public function getMembrosJoinUsuarioRelatedByCriadorId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = MembroQuery::create(null, $criteria);
		$query->joinWith('UsuarioRelatedByCriadorId', $join_behavior);

		return $this->getMembros($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cidade is new, it will return
	 * an empty collection; or if this Cidade has previously
	 * been saved, it will retrieve related Membros from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cidade.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Membro[] List of Membro objects
	 */
	public function getMembrosJoinUsuarioRelatedByMembroUsuarioId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = MembroQuery::create(null, $criteria);
		$query->joinWith('UsuarioRelatedByMembroUsuarioId', $join_behavior);

		return $this->getMembros($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cidade is new, it will return
	 * an empty collection; or if this Cidade has previously
	 * been saved, it will retrieve related Membros from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cidade.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Membro[] List of Membro objects
	 */
	public function getMembrosJoinUsuarioRelatedByUsuarioAprovadorId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = MembroQuery::create(null, $criteria);
		$query->joinWith('UsuarioRelatedByUsuarioAprovadorId', $join_behavior);

		return $this->getMembros($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->uf_id = null;
		$this->nome = null;
		$this->slug = null;
		$this->longitude = null;
		$this->latitude = null;
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
			if ($this->collEnderecos) {
				foreach ($this->collEnderecos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collMembros) {
				foreach ($this->collMembros as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collEnderecos instanceof PropelCollection) {
			$this->collEnderecos->clearIterator();
		}
		$this->collEnderecos = null;
		if ($this->collMembros instanceof PropelCollection) {
			$this->collMembros->clearIterator();
		}
		$this->collMembros = null;
		$this->aUf = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(CidadePeer::DEFAULT_STRING_FORMAT);
	}

} // BaseCidade
