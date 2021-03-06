<?php


/**
 * Base class that represents a row from the 'permissao' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BasePermissao extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'PermissaoPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        PermissaoPeer
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
	 * The value for the slug field.
	 * @var        string
	 */
	protected $slug;

	/**
	 * The value for the descricao field.
	 * @var        string
	 */
	protected $descricao;

	/**
	 * The value for the nivel field.
	 * @var        string
	 */
	protected $nivel;

	/**
	 * @var        array PerfilPermissao[] Collection to store aggregation of PerfilPermissao objects.
	 */
	protected $collPerfilPermissaos;

	/**
	 * @var        array Perfil[] Collection to store aggregation of Perfil objects.
	 */
	protected $collPerfils;

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
	protected $perfilsScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $perfilPermissaosScheduledForDeletion = null;

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
	 * Get the [slug] column value.
	 * 
	 * @return     string
	 */
	public function getSlug()
	{
		return $this->slug;
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
	 * Get the [nivel] column value.
	 * 
	 * @return     string
	 */
	public function getNivel()
	{
		return $this->nivel;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Permissao The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PermissaoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [nome] column.
	 * 
	 * @param      string $v new value
	 * @return     Permissao The current object (for fluent API support)
	 */
	public function setNome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome !== $v) {
			$this->nome = $v;
			$this->modifiedColumns[] = PermissaoPeer::NOME;
		}

		return $this;
	} // setNome()

	/**
	 * Set the value of [slug] column.
	 * 
	 * @param      string $v new value
	 * @return     Permissao The current object (for fluent API support)
	 */
	public function setSlug($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->slug !== $v) {
			$this->slug = $v;
			$this->modifiedColumns[] = PermissaoPeer::SLUG;
		}

		return $this;
	} // setSlug()

	/**
	 * Set the value of [descricao] column.
	 * 
	 * @param      string $v new value
	 * @return     Permissao The current object (for fluent API support)
	 */
	public function setDescricao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descricao !== $v) {
			$this->descricao = $v;
			$this->modifiedColumns[] = PermissaoPeer::DESCRICAO;
		}

		return $this;
	} // setDescricao()

	/**
	 * Set the value of [nivel] column.
	 * 
	 * @param      string $v new value
	 * @return     Permissao The current object (for fluent API support)
	 */
	public function setNivel($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nivel !== $v) {
			$this->nivel = $v;
			$this->modifiedColumns[] = PermissaoPeer::NIVEL;
		}

		return $this;
	} // setNivel()

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
			$this->slug = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->descricao = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->nivel = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 5; // 5 = PermissaoPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Permissao object", $e);
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
			$con = Propel::getConnection(PermissaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = PermissaoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collPerfilPermissaos = null;

			$this->collPerfils = null;
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
			$con = Propel::getConnection(PermissaoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = PermissaoQuery::create()
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
			$con = Propel::getConnection(PermissaoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				PermissaoPeer::addInstanceToPool($this);
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

			if ($this->perfilsScheduledForDeletion !== null) {
				if (!$this->perfilsScheduledForDeletion->isEmpty()) {
					PerfilPermissaoQuery::create()
						->filterByPrimaryKeys($this->perfilsScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->perfilsScheduledForDeletion = null;
				}

				foreach ($this->getPerfils() as $perfil) {
					if ($perfil->isModified()) {
						$perfil->save($con);
					}
				}
			}

			if ($this->perfilPermissaosScheduledForDeletion !== null) {
				if (!$this->perfilPermissaosScheduledForDeletion->isEmpty()) {
					PerfilPermissaoQuery::create()
						->filterByPrimaryKeys($this->perfilPermissaosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->perfilPermissaosScheduledForDeletion = null;
				}
			}

			if ($this->collPerfilPermissaos !== null) {
				foreach ($this->collPerfilPermissaos as $referrerFK) {
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

		$this->modifiedColumns[] = PermissaoPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . PermissaoPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(PermissaoPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(PermissaoPeer::NOME)) {
			$modifiedColumns[':p' . $index++]  = '`NOME`';
		}
		if ($this->isColumnModified(PermissaoPeer::SLUG)) {
			$modifiedColumns[':p' . $index++]  = '`SLUG`';
		}
		if ($this->isColumnModified(PermissaoPeer::DESCRICAO)) {
			$modifiedColumns[':p' . $index++]  = '`DESCRICAO`';
		}
		if ($this->isColumnModified(PermissaoPeer::NIVEL)) {
			$modifiedColumns[':p' . $index++]  = '`NIVEL`';
		}

		$sql = sprintf(
			'INSERT INTO `permissao` (%s) VALUES (%s)',
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
					case '`SLUG`':						
						$stmt->bindValue($identifier, $this->slug, PDO::PARAM_STR);
						break;
					case '`DESCRICAO`':						
						$stmt->bindValue($identifier, $this->descricao, PDO::PARAM_STR);
						break;
					case '`NIVEL`':						
						$stmt->bindValue($identifier, $this->nivel, PDO::PARAM_STR);
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
		$pos = PermissaoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
			case 2:
				return $this->getSlug();
				break;
			case 3:
				return $this->getDescricao();
				break;
			case 4:
				return $this->getNivel();
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
		if (isset($alreadyDumpedObjects['Permissao'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Permissao'][$this->getPrimaryKey()] = true;
		$keys = PermissaoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNome(),
			$keys[2] => $this->getSlug(),
			$keys[3] => $this->getDescricao(),
			$keys[4] => $this->getNivel(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->collPerfilPermissaos) {
				$result['PerfilPermissaos'] = $this->collPerfilPermissaos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = PermissaoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
			case 2:
				$this->setSlug($value);
				break;
			case 3:
				$this->setDescricao($value);
				break;
			case 4:
				$this->setNivel($value);
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
		$keys = PermissaoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNome($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSlug($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDescricao($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNivel($arr[$keys[4]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(PermissaoPeer::DATABASE_NAME);

		if ($this->isColumnModified(PermissaoPeer::ID)) $criteria->add(PermissaoPeer::ID, $this->id);
		if ($this->isColumnModified(PermissaoPeer::NOME)) $criteria->add(PermissaoPeer::NOME, $this->nome);
		if ($this->isColumnModified(PermissaoPeer::SLUG)) $criteria->add(PermissaoPeer::SLUG, $this->slug);
		if ($this->isColumnModified(PermissaoPeer::DESCRICAO)) $criteria->add(PermissaoPeer::DESCRICAO, $this->descricao);
		if ($this->isColumnModified(PermissaoPeer::NIVEL)) $criteria->add(PermissaoPeer::NIVEL, $this->nivel);

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
		$criteria = new Criteria(PermissaoPeer::DATABASE_NAME);
		$criteria->add(PermissaoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Permissao (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setNome($this->getNome());
		$copyObj->setSlug($this->getSlug());
		$copyObj->setDescricao($this->getDescricao());
		$copyObj->setNivel($this->getNivel());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getPerfilPermissaos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPerfilPermissao($relObj->copy($deepCopy));
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
	 * @return     Permissao Clone of current object.
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
	 * @return     PermissaoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PermissaoPeer();
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
		if ('PerfilPermissao' == $relationName) {
			return $this->initPerfilPermissaos();
		}
	}

	/**
	 * Clears out the collPerfilPermissaos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPerfilPermissaos()
	 */
	public function clearPerfilPermissaos()
	{
		$this->collPerfilPermissaos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPerfilPermissaos collection.
	 *
	 * By default this just sets the collPerfilPermissaos collection to an empty array (like clearcollPerfilPermissaos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initPerfilPermissaos($overrideExisting = true)
	{
		if (null !== $this->collPerfilPermissaos && !$overrideExisting) {
			return;
		}
		$this->collPerfilPermissaos = new PropelObjectCollection();
		$this->collPerfilPermissaos->setModel('PerfilPermissao');
	}

	/**
	 * Gets an array of PerfilPermissao objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Permissao is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array PerfilPermissao[] List of PerfilPermissao objects
	 * @throws     PropelException
	 */
	public function getPerfilPermissaos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPerfilPermissaos || null !== $criteria) {
			if ($this->isNew() && null === $this->collPerfilPermissaos) {
				// return empty collection
				$this->initPerfilPermissaos();
			} else {
				$collPerfilPermissaos = PerfilPermissaoQuery::create(null, $criteria)
					->filterByPermissao($this)
					->find($con);
				if (null !== $criteria) {
					return $collPerfilPermissaos;
				}
				$this->collPerfilPermissaos = $collPerfilPermissaos;
			}
		}
		return $this->collPerfilPermissaos;
	}

	/**
	 * Sets a collection of PerfilPermissao objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $perfilPermissaos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setPerfilPermissaos(PropelCollection $perfilPermissaos, PropelPDO $con = null)
	{
		$this->perfilPermissaosScheduledForDeletion = $this->getPerfilPermissaos(new Criteria(), $con)->diff($perfilPermissaos);

		foreach ($perfilPermissaos as $perfilPermissao) {
			// Fix issue with collection modified by reference
			if ($perfilPermissao->isNew()) {
				$perfilPermissao->setPermissao($this);
			}
			$this->addPerfilPermissao($perfilPermissao);
		}

		$this->collPerfilPermissaos = $perfilPermissaos;
	}

	/**
	 * Returns the number of related PerfilPermissao objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related PerfilPermissao objects.
	 * @throws     PropelException
	 */
	public function countPerfilPermissaos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPerfilPermissaos || null !== $criteria) {
			if ($this->isNew() && null === $this->collPerfilPermissaos) {
				return 0;
			} else {
				$query = PerfilPermissaoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPermissao($this)
					->count($con);
			}
		} else {
			return count($this->collPerfilPermissaos);
		}
	}

	/**
	 * Method called to associate a PerfilPermissao object to this object
	 * through the PerfilPermissao foreign key attribute.
	 *
	 * @param      PerfilPermissao $l PerfilPermissao
	 * @return     Permissao The current object (for fluent API support)
	 */
	public function addPerfilPermissao(PerfilPermissao $l)
	{
		if ($this->collPerfilPermissaos === null) {
			$this->initPerfilPermissaos();
		}
		if (!$this->collPerfilPermissaos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddPerfilPermissao($l);
		}

		return $this;
	}

	/**
	 * @param	PerfilPermissao $perfilPermissao The perfilPermissao object to add.
	 */
	protected function doAddPerfilPermissao($perfilPermissao)
	{
		$this->collPerfilPermissaos[]= $perfilPermissao;
		$perfilPermissao->setPermissao($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Permissao is new, it will return
	 * an empty collection; or if this Permissao has previously
	 * been saved, it will retrieve related PerfilPermissaos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Permissao.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array PerfilPermissao[] List of PerfilPermissao objects
	 */
	public function getPerfilPermissaosJoinPerfil($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = PerfilPermissaoQuery::create(null, $criteria);
		$query->joinWith('Perfil', $join_behavior);

		return $this->getPerfilPermissaos($query, $con);
	}

	/**
	 * Clears out the collPerfils collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPerfils()
	 */
	public function clearPerfils()
	{
		$this->collPerfils = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPerfils collection.
	 *
	 * By default this just sets the collPerfils collection to an empty collection (like clearPerfils());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initPerfils()
	{
		$this->collPerfils = new PropelObjectCollection();
		$this->collPerfils->setModel('Perfil');
	}

	/**
	 * Gets a collection of Perfil objects related by a many-to-many relationship
	 * to the current object by way of the perfil_permissao cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Permissao is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Perfil[] List of Perfil objects
	 */
	public function getPerfils($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPerfils || null !== $criteria) {
			if ($this->isNew() && null === $this->collPerfils) {
				// return empty collection
				$this->initPerfils();
			} else {
				$collPerfils = PerfilQuery::create(null, $criteria)
					->filterByPermissao($this)
					->find($con);
				if (null !== $criteria) {
					return $collPerfils;
				}
				$this->collPerfils = $collPerfils;
			}
		}
		return $this->collPerfils;
	}

	/**
	 * Sets a collection of Perfil objects related by a many-to-many relationship
	 * to the current object by way of the perfil_permissao cross-reference table.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $perfils A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setPerfils(PropelCollection $perfils, PropelPDO $con = null)
	{
		$perfilPermissaos = PerfilPermissaoQuery::create()
			->filterByPerfil($perfils)
			->filterByPermissao($this)
			->find($con);

		$this->perfilsScheduledForDeletion = $this->getPerfilPermissaos()->diff($perfilPermissaos);
		$this->collPerfilPermissaos = $perfilPermissaos;

		foreach ($perfils as $perfil) {
			// Fix issue with collection modified by reference
			if ($perfil->isNew()) {
				$this->doAddPerfil($perfil);
			} else {
				$this->addPerfil($perfil);
			}
		}

		$this->collPerfils = $perfils;
	}

	/**
	 * Gets the number of Perfil objects related by a many-to-many relationship
	 * to the current object by way of the perfil_permissao cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Perfil objects
	 */
	public function countPerfils($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPerfils || null !== $criteria) {
			if ($this->isNew() && null === $this->collPerfils) {
				return 0;
			} else {
				$query = PerfilQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPermissao($this)
					->count($con);
			}
		} else {
			return count($this->collPerfils);
		}
	}

	/**
	 * Associate a Perfil object to this object
	 * through the perfil_permissao cross reference table.
	 *
	 * @param      Perfil $perfil The PerfilPermissao object to relate
	 * @return     void
	 */
	public function addPerfil(Perfil $perfil)
	{
		if ($this->collPerfils === null) {
			$this->initPerfils();
		}
		if (!$this->collPerfils->contains($perfil)) { // only add it if the **same** object is not already associated
			$this->doAddPerfil($perfil);

			$this->collPerfils[]= $perfil;
		}
	}

	/**
	 * @param	Perfil $perfil The perfil object to add.
	 */
	protected function doAddPerfil($perfil)
	{
		$perfilPermissao = new PerfilPermissao();
		$perfilPermissao->setPerfil($perfil);
		$this->addPerfilPermissao($perfilPermissao);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->nome = null;
		$this->slug = null;
		$this->descricao = null;
		$this->nivel = null;
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
			if ($this->collPerfilPermissaos) {
				foreach ($this->collPerfilPermissaos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPerfils) {
				foreach ($this->collPerfils as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collPerfilPermissaos instanceof PropelCollection) {
			$this->collPerfilPermissaos->clearIterator();
		}
		$this->collPerfilPermissaos = null;
		if ($this->collPerfils instanceof PropelCollection) {
			$this->collPerfils->clearIterator();
		}
		$this->collPerfils = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(PermissaoPeer::DEFAULT_STRING_FORMAT);
	}

} // BasePermissao
