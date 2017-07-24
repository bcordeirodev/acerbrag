<?php


/**
 * Base class that represents a row from the 'pessoa' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BasePessoa extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'PessoaPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        PessoaPeer
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
	 * The value for the endereco_id field.
	 * @var        int
	 */
	protected $endereco_id;

	/**
	 * The value for the ativo field.
	 * @var        boolean
	 */
	protected $ativo;

	/**
	 * The value for the nome field.
	 * @var        string
	 */
	protected $nome;

	/**
	 * The value for the cpf field.
	 * @var        string
	 */
	protected $cpf;

	/**
	 * The value for the celular field.
	 * @var        string
	 */
	protected $celular;

	/**
	 * The value for the telefone field.
	 * @var        string
	 */
	protected $telefone;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * @var        Endereco
	 */
	protected $aEndereco;

	/**
	 * @var        array Comunicado[] Collection to store aggregation of Comunicado objects.
	 */
	protected $collComunicadosRelatedBySeguradoId;

	/**
	 * @var        array Comunicado[] Collection to store aggregation of Comunicado objects.
	 */
	protected $collComunicadosRelatedByComunicanteId;

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
	protected $comunicadosRelatedBySeguradoIdScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $comunicadosRelatedByComunicanteIdScheduledForDeletion = null;

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
	 * Get the [endereco_id] column value.
	 * 
	 * @return     int
	 */
	public function getEnderecoId()
	{
		return $this->endereco_id;
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
	 * Get the [nome] column value.
	 * 
	 * @return     string
	 */
	public function getNome()
	{
		return $this->nome;
	}

	/**
	 * Get the [cpf] column value.
	 * 
	 * @return     string
	 */
	public function getCpf()
	{
		return $this->cpf;
	}

	/**
	 * Get the [celular] column value.
	 * 
	 * @return     string
	 */
	public function getCelular()
	{
		return $this->celular;
	}

	/**
	 * Get the [telefone] column value.
	 * 
	 * @return     string
	 */
	public function getTelefone()
	{
		return $this->telefone;
	}

	/**
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Pessoa The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PessoaPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [endereco_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Pessoa The current object (for fluent API support)
	 */
	public function setEnderecoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->endereco_id !== $v) {
			$this->endereco_id = $v;
			$this->modifiedColumns[] = PessoaPeer::ENDERECO_ID;
		}

		if ($this->aEndereco !== null && $this->aEndereco->getId() !== $v) {
			$this->aEndereco = null;
		}

		return $this;
	} // setEnderecoId()

	/**
	 * Sets the value of the [ativo] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Pessoa The current object (for fluent API support)
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
			$this->modifiedColumns[] = PessoaPeer::ATIVO;
		}

		return $this;
	} // setAtivo()

	/**
	 * Set the value of [nome] column.
	 * 
	 * @param      string $v new value
	 * @return     Pessoa The current object (for fluent API support)
	 */
	public function setNome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome !== $v) {
			$this->nome = $v;
			$this->modifiedColumns[] = PessoaPeer::NOME;
		}

		return $this;
	} // setNome()

	/**
	 * Set the value of [cpf] column.
	 * 
	 * @param      string $v new value
	 * @return     Pessoa The current object (for fluent API support)
	 */
	public function setCpf($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cpf !== $v) {
			$this->cpf = $v;
			$this->modifiedColumns[] = PessoaPeer::CPF;
		}

		return $this;
	} // setCpf()

	/**
	 * Set the value of [celular] column.
	 * 
	 * @param      string $v new value
	 * @return     Pessoa The current object (for fluent API support)
	 */
	public function setCelular($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->celular !== $v) {
			$this->celular = $v;
			$this->modifiedColumns[] = PessoaPeer::CELULAR;
		}

		return $this;
	} // setCelular()

	/**
	 * Set the value of [telefone] column.
	 * 
	 * @param      string $v new value
	 * @return     Pessoa The current object (for fluent API support)
	 */
	public function setTelefone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->telefone !== $v) {
			$this->telefone = $v;
			$this->modifiedColumns[] = PessoaPeer::TELEFONE;
		}

		return $this;
	} // setTelefone()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     Pessoa The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = PessoaPeer::EMAIL;
		}

		return $this;
	} // setEmail()

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
			$this->endereco_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->ativo = ($row[$startcol + 2] !== null) ? (boolean) $row[$startcol + 2] : null;
			$this->nome = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->cpf = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->celular = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->telefone = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->email = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 8; // 8 = PessoaPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Pessoa object", $e);
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

		if ($this->aEndereco !== null && $this->endereco_id !== $this->aEndereco->getId()) {
			$this->aEndereco = null;
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
			$con = Propel::getConnection(PessoaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = PessoaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aEndereco = null;
			$this->collComunicadosRelatedBySeguradoId = null;

			$this->collComunicadosRelatedByComunicanteId = null;

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
			$con = Propel::getConnection(PessoaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = PessoaQuery::create()
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
			$con = Propel::getConnection(PessoaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				PessoaPeer::addInstanceToPool($this);
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

			if ($this->aEndereco !== null) {
				if ($this->aEndereco->isModified() || $this->aEndereco->isNew()) {
					$affectedRows += $this->aEndereco->save($con);
				}
				$this->setEndereco($this->aEndereco);
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

			if ($this->comunicadosRelatedBySeguradoIdScheduledForDeletion !== null) {
				if (!$this->comunicadosRelatedBySeguradoIdScheduledForDeletion->isEmpty()) {
					ComunicadoQuery::create()
						->filterByPrimaryKeys($this->comunicadosRelatedBySeguradoIdScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->comunicadosRelatedBySeguradoIdScheduledForDeletion = null;
				}
			}

			if ($this->collComunicadosRelatedBySeguradoId !== null) {
				foreach ($this->collComunicadosRelatedBySeguradoId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->comunicadosRelatedByComunicanteIdScheduledForDeletion !== null) {
				if (!$this->comunicadosRelatedByComunicanteIdScheduledForDeletion->isEmpty()) {
					ComunicadoQuery::create()
						->filterByPrimaryKeys($this->comunicadosRelatedByComunicanteIdScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->comunicadosRelatedByComunicanteIdScheduledForDeletion = null;
				}
			}

			if ($this->collComunicadosRelatedByComunicanteId !== null) {
				foreach ($this->collComunicadosRelatedByComunicanteId as $referrerFK) {
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

		$this->modifiedColumns[] = PessoaPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . PessoaPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(PessoaPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(PessoaPeer::ENDERECO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ENDERECO_ID`';
		}
		if ($this->isColumnModified(PessoaPeer::ATIVO)) {
			$modifiedColumns[':p' . $index++]  = '`ATIVO`';
		}
		if ($this->isColumnModified(PessoaPeer::NOME)) {
			$modifiedColumns[':p' . $index++]  = '`NOME`';
		}
		if ($this->isColumnModified(PessoaPeer::CPF)) {
			$modifiedColumns[':p' . $index++]  = '`CPF`';
		}
		if ($this->isColumnModified(PessoaPeer::CELULAR)) {
			$modifiedColumns[':p' . $index++]  = '`CELULAR`';
		}
		if ($this->isColumnModified(PessoaPeer::TELEFONE)) {
			$modifiedColumns[':p' . $index++]  = '`TELEFONE`';
		}
		if ($this->isColumnModified(PessoaPeer::EMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`EMAIL`';
		}

		$sql = sprintf(
			'INSERT INTO `pessoa` (%s) VALUES (%s)',
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
					case '`ENDERECO_ID`':
						$stmt->bindValue($identifier, $this->endereco_id, PDO::PARAM_INT);
						break;
					case '`ATIVO`':
						$stmt->bindValue($identifier, (int) $this->ativo, PDO::PARAM_INT);
						break;
					case '`NOME`':
						$stmt->bindValue($identifier, $this->nome, PDO::PARAM_STR);
						break;
					case '`CPF`':
						$stmt->bindValue($identifier, $this->cpf, PDO::PARAM_STR);
						break;
					case '`CELULAR`':
						$stmt->bindValue($identifier, $this->celular, PDO::PARAM_STR);
						break;
					case '`TELEFONE`':
						$stmt->bindValue($identifier, $this->telefone, PDO::PARAM_STR);
						break;
					case '`EMAIL`':
						$stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
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
		$pos = PessoaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getEnderecoId();
				break;
			case 2:
				return $this->getAtivo();
				break;
			case 3:
				return $this->getNome();
				break;
			case 4:
				return $this->getCpf();
				break;
			case 5:
				return $this->getCelular();
				break;
			case 6:
				return $this->getTelefone();
				break;
			case 7:
				return $this->getEmail();
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
		if (isset($alreadyDumpedObjects['Pessoa'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Pessoa'][$this->getPrimaryKey()] = true;
		$keys = PessoaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getEnderecoId(),
			$keys[2] => $this->getAtivo(),
			$keys[3] => $this->getNome(),
			$keys[4] => $this->getCpf(),
			$keys[5] => $this->getCelular(),
			$keys[6] => $this->getTelefone(),
			$keys[7] => $this->getEmail(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aEndereco) {
				$result['Endereco'] = $this->aEndereco->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collComunicadosRelatedBySeguradoId) {
				$result['ComunicadosRelatedBySeguradoId'] = $this->collComunicadosRelatedBySeguradoId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collComunicadosRelatedByComunicanteId) {
				$result['ComunicadosRelatedByComunicanteId'] = $this->collComunicadosRelatedByComunicanteId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = PessoaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setEnderecoId($value);
				break;
			case 2:
				$this->setAtivo($value);
				break;
			case 3:
				$this->setNome($value);
				break;
			case 4:
				$this->setCpf($value);
				break;
			case 5:
				$this->setCelular($value);
				break;
			case 6:
				$this->setTelefone($value);
				break;
			case 7:
				$this->setEmail($value);
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
		$keys = PessoaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setEnderecoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAtivo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNome($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCpf($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCelular($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTelefone($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEmail($arr[$keys[7]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(PessoaPeer::DATABASE_NAME);

		if ($this->isColumnModified(PessoaPeer::ID)) $criteria->add(PessoaPeer::ID, $this->id);
		if ($this->isColumnModified(PessoaPeer::ENDERECO_ID)) $criteria->add(PessoaPeer::ENDERECO_ID, $this->endereco_id);
		if ($this->isColumnModified(PessoaPeer::ATIVO)) $criteria->add(PessoaPeer::ATIVO, $this->ativo);
		if ($this->isColumnModified(PessoaPeer::NOME)) $criteria->add(PessoaPeer::NOME, $this->nome);
		if ($this->isColumnModified(PessoaPeer::CPF)) $criteria->add(PessoaPeer::CPF, $this->cpf);
		if ($this->isColumnModified(PessoaPeer::CELULAR)) $criteria->add(PessoaPeer::CELULAR, $this->celular);
		if ($this->isColumnModified(PessoaPeer::TELEFONE)) $criteria->add(PessoaPeer::TELEFONE, $this->telefone);
		if ($this->isColumnModified(PessoaPeer::EMAIL)) $criteria->add(PessoaPeer::EMAIL, $this->email);

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
		$criteria = new Criteria(PessoaPeer::DATABASE_NAME);
		$criteria->add(PessoaPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Pessoa (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setEnderecoId($this->getEnderecoId());
		$copyObj->setAtivo($this->getAtivo());
		$copyObj->setNome($this->getNome());
		$copyObj->setCpf($this->getCpf());
		$copyObj->setCelular($this->getCelular());
		$copyObj->setTelefone($this->getTelefone());
		$copyObj->setEmail($this->getEmail());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getComunicadosRelatedBySeguradoId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addComunicadoRelatedBySeguradoId($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getComunicadosRelatedByComunicanteId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addComunicadoRelatedByComunicanteId($relObj->copy($deepCopy));
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
	 * @return     Pessoa Clone of current object.
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
	 * @return     PessoaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PessoaPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Endereco object.
	 *
	 * @param      Endereco $v
	 * @return     Pessoa The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setEndereco(Endereco $v = null)
	{
		if ($v === null) {
			$this->setEnderecoId(NULL);
		} else {
			$this->setEnderecoId($v->getId());
		}

		$this->aEndereco = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Endereco object, it will not be re-added.
		if ($v !== null) {
			$v->addPessoa($this);
		}

		return $this;
	}


	/**
	 * Get the associated Endereco object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Endereco The associated Endereco object.
	 * @throws     PropelException
	 */
	public function getEndereco(PropelPDO $con = null)
	{
		if ($this->aEndereco === null && ($this->endereco_id !== null)) {
			$this->aEndereco = EnderecoQuery::create()->findPk($this->endereco_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aEndereco->addPessoas($this);
			 */
		}
		return $this->aEndereco;
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
		if ('ComunicadoRelatedBySeguradoId' == $relationName) {
			return $this->initComunicadosRelatedBySeguradoId();
		}
		if ('ComunicadoRelatedByComunicanteId' == $relationName) {
			return $this->initComunicadosRelatedByComunicanteId();
		}
	}

	/**
	 * Clears out the collComunicadosRelatedBySeguradoId collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addComunicadosRelatedBySeguradoId()
	 */
	public function clearComunicadosRelatedBySeguradoId()
	{
		$this->collComunicadosRelatedBySeguradoId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collComunicadosRelatedBySeguradoId collection.
	 *
	 * By default this just sets the collComunicadosRelatedBySeguradoId collection to an empty array (like clearcollComunicadosRelatedBySeguradoId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initComunicadosRelatedBySeguradoId($overrideExisting = true)
	{
		if (null !== $this->collComunicadosRelatedBySeguradoId && !$overrideExisting) {
			return;
		}
		$this->collComunicadosRelatedBySeguradoId = new PropelObjectCollection();
		$this->collComunicadosRelatedBySeguradoId->setModel('Comunicado');
	}

	/**
	 * Gets an array of Comunicado objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Pessoa is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Comunicado[] List of Comunicado objects
	 * @throws     PropelException
	 */
	public function getComunicadosRelatedBySeguradoId($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collComunicadosRelatedBySeguradoId || null !== $criteria) {
			if ($this->isNew() && null === $this->collComunicadosRelatedBySeguradoId) {
				// return empty collection
				$this->initComunicadosRelatedBySeguradoId();
			} else {
				$collComunicadosRelatedBySeguradoId = ComunicadoQuery::create(null, $criteria)
					->filterByPessoaRelatedBySeguradoId($this)
					->find($con);
				if (null !== $criteria) {
					return $collComunicadosRelatedBySeguradoId;
				}
				$this->collComunicadosRelatedBySeguradoId = $collComunicadosRelatedBySeguradoId;
			}
		}
		return $this->collComunicadosRelatedBySeguradoId;
	}

	/**
	 * Sets a collection of ComunicadoRelatedBySeguradoId objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $comunicadosRelatedBySeguradoId A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setComunicadosRelatedBySeguradoId(PropelCollection $comunicadosRelatedBySeguradoId, PropelPDO $con = null)
	{
		$this->comunicadosRelatedBySeguradoIdScheduledForDeletion = $this->getComunicadosRelatedBySeguradoId(new Criteria(), $con)->diff($comunicadosRelatedBySeguradoId);

		foreach ($comunicadosRelatedBySeguradoId as $comunicadoRelatedBySeguradoId) {
			// Fix issue with collection modified by reference
			if ($comunicadoRelatedBySeguradoId->isNew()) {
				$comunicadoRelatedBySeguradoId->setPessoaRelatedBySeguradoId($this);
			}
			$this->addComunicadoRelatedBySeguradoId($comunicadoRelatedBySeguradoId);
		}

		$this->collComunicadosRelatedBySeguradoId = $comunicadosRelatedBySeguradoId;
	}

	/**
	 * Returns the number of related Comunicado objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Comunicado objects.
	 * @throws     PropelException
	 */
	public function countComunicadosRelatedBySeguradoId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collComunicadosRelatedBySeguradoId || null !== $criteria) {
			if ($this->isNew() && null === $this->collComunicadosRelatedBySeguradoId) {
				return 0;
			} else {
				$query = ComunicadoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPessoaRelatedBySeguradoId($this)
					->count($con);
			}
		} else {
			return count($this->collComunicadosRelatedBySeguradoId);
		}
	}

	/**
	 * Method called to associate a Comunicado object to this object
	 * through the Comunicado foreign key attribute.
	 *
	 * @param      Comunicado $l Comunicado
	 * @return     Pessoa The current object (for fluent API support)
	 */
	public function addComunicadoRelatedBySeguradoId(Comunicado $l)
	{
		if ($this->collComunicadosRelatedBySeguradoId === null) {
			$this->initComunicadosRelatedBySeguradoId();
		}
		if (!$this->collComunicadosRelatedBySeguradoId->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddComunicadoRelatedBySeguradoId($l);
		}

		return $this;
	}

	/**
	 * @param	ComunicadoRelatedBySeguradoId $comunicadoRelatedBySeguradoId The comunicadoRelatedBySeguradoId object to add.
	 */
	protected function doAddComunicadoRelatedBySeguradoId($comunicadoRelatedBySeguradoId)
	{
		$this->collComunicadosRelatedBySeguradoId[]= $comunicadoRelatedBySeguradoId;
		$comunicadoRelatedBySeguradoId->setPessoaRelatedBySeguradoId($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pessoa is new, it will return
	 * an empty collection; or if this Pessoa has previously
	 * been saved, it will retrieve related ComunicadosRelatedBySeguradoId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pessoa.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Comunicado[] List of Comunicado objects
	 */
	public function getComunicadosRelatedBySeguradoIdJoinParentesco($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ComunicadoQuery::create(null, $criteria);
		$query->joinWith('Parentesco', $join_behavior);

		return $this->getComunicadosRelatedBySeguradoId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pessoa is new, it will return
	 * an empty collection; or if this Pessoa has previously
	 * been saved, it will retrieve related ComunicadosRelatedBySeguradoId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pessoa.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Comunicado[] List of Comunicado objects
	 */
	public function getComunicadosRelatedBySeguradoIdJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ComunicadoQuery::create(null, $criteria);
		$query->joinWith('Usuario', $join_behavior);

		return $this->getComunicadosRelatedBySeguradoId($query, $con);
	}

	/**
	 * Clears out the collComunicadosRelatedByComunicanteId collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addComunicadosRelatedByComunicanteId()
	 */
	public function clearComunicadosRelatedByComunicanteId()
	{
		$this->collComunicadosRelatedByComunicanteId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collComunicadosRelatedByComunicanteId collection.
	 *
	 * By default this just sets the collComunicadosRelatedByComunicanteId collection to an empty array (like clearcollComunicadosRelatedByComunicanteId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initComunicadosRelatedByComunicanteId($overrideExisting = true)
	{
		if (null !== $this->collComunicadosRelatedByComunicanteId && !$overrideExisting) {
			return;
		}
		$this->collComunicadosRelatedByComunicanteId = new PropelObjectCollection();
		$this->collComunicadosRelatedByComunicanteId->setModel('Comunicado');
	}

	/**
	 * Gets an array of Comunicado objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Pessoa is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Comunicado[] List of Comunicado objects
	 * @throws     PropelException
	 */
	public function getComunicadosRelatedByComunicanteId($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collComunicadosRelatedByComunicanteId || null !== $criteria) {
			if ($this->isNew() && null === $this->collComunicadosRelatedByComunicanteId) {
				// return empty collection
				$this->initComunicadosRelatedByComunicanteId();
			} else {
				$collComunicadosRelatedByComunicanteId = ComunicadoQuery::create(null, $criteria)
					->filterByPessoaRelatedByComunicanteId($this)
					->find($con);
				if (null !== $criteria) {
					return $collComunicadosRelatedByComunicanteId;
				}
				$this->collComunicadosRelatedByComunicanteId = $collComunicadosRelatedByComunicanteId;
			}
		}
		return $this->collComunicadosRelatedByComunicanteId;
	}

	/**
	 * Sets a collection of ComunicadoRelatedByComunicanteId objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $comunicadosRelatedByComunicanteId A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setComunicadosRelatedByComunicanteId(PropelCollection $comunicadosRelatedByComunicanteId, PropelPDO $con = null)
	{
		$this->comunicadosRelatedByComunicanteIdScheduledForDeletion = $this->getComunicadosRelatedByComunicanteId(new Criteria(), $con)->diff($comunicadosRelatedByComunicanteId);

		foreach ($comunicadosRelatedByComunicanteId as $comunicadoRelatedByComunicanteId) {
			// Fix issue with collection modified by reference
			if ($comunicadoRelatedByComunicanteId->isNew()) {
				$comunicadoRelatedByComunicanteId->setPessoaRelatedByComunicanteId($this);
			}
			$this->addComunicadoRelatedByComunicanteId($comunicadoRelatedByComunicanteId);
		}

		$this->collComunicadosRelatedByComunicanteId = $comunicadosRelatedByComunicanteId;
	}

	/**
	 * Returns the number of related Comunicado objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Comunicado objects.
	 * @throws     PropelException
	 */
	public function countComunicadosRelatedByComunicanteId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collComunicadosRelatedByComunicanteId || null !== $criteria) {
			if ($this->isNew() && null === $this->collComunicadosRelatedByComunicanteId) {
				return 0;
			} else {
				$query = ComunicadoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPessoaRelatedByComunicanteId($this)
					->count($con);
			}
		} else {
			return count($this->collComunicadosRelatedByComunicanteId);
		}
	}

	/**
	 * Method called to associate a Comunicado object to this object
	 * through the Comunicado foreign key attribute.
	 *
	 * @param      Comunicado $l Comunicado
	 * @return     Pessoa The current object (for fluent API support)
	 */
	public function addComunicadoRelatedByComunicanteId(Comunicado $l)
	{
		if ($this->collComunicadosRelatedByComunicanteId === null) {
			$this->initComunicadosRelatedByComunicanteId();
		}
		if (!$this->collComunicadosRelatedByComunicanteId->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddComunicadoRelatedByComunicanteId($l);
		}

		return $this;
	}

	/**
	 * @param	ComunicadoRelatedByComunicanteId $comunicadoRelatedByComunicanteId The comunicadoRelatedByComunicanteId object to add.
	 */
	protected function doAddComunicadoRelatedByComunicanteId($comunicadoRelatedByComunicanteId)
	{
		$this->collComunicadosRelatedByComunicanteId[]= $comunicadoRelatedByComunicanteId;
		$comunicadoRelatedByComunicanteId->setPessoaRelatedByComunicanteId($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pessoa is new, it will return
	 * an empty collection; or if this Pessoa has previously
	 * been saved, it will retrieve related ComunicadosRelatedByComunicanteId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pessoa.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Comunicado[] List of Comunicado objects
	 */
	public function getComunicadosRelatedByComunicanteIdJoinParentesco($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ComunicadoQuery::create(null, $criteria);
		$query->joinWith('Parentesco', $join_behavior);

		return $this->getComunicadosRelatedByComunicanteId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pessoa is new, it will return
	 * an empty collection; or if this Pessoa has previously
	 * been saved, it will retrieve related ComunicadosRelatedByComunicanteId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pessoa.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Comunicado[] List of Comunicado objects
	 */
	public function getComunicadosRelatedByComunicanteIdJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ComunicadoQuery::create(null, $criteria);
		$query->joinWith('Usuario', $join_behavior);

		return $this->getComunicadosRelatedByComunicanteId($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->endereco_id = null;
		$this->ativo = null;
		$this->nome = null;
		$this->cpf = null;
		$this->celular = null;
		$this->telefone = null;
		$this->email = null;
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
			if ($this->collComunicadosRelatedBySeguradoId) {
				foreach ($this->collComunicadosRelatedBySeguradoId as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collComunicadosRelatedByComunicanteId) {
				foreach ($this->collComunicadosRelatedByComunicanteId as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collComunicadosRelatedBySeguradoId instanceof PropelCollection) {
			$this->collComunicadosRelatedBySeguradoId->clearIterator();
		}
		$this->collComunicadosRelatedBySeguradoId = null;
		if ($this->collComunicadosRelatedByComunicanteId instanceof PropelCollection) {
			$this->collComunicadosRelatedByComunicanteId->clearIterator();
		}
		$this->collComunicadosRelatedByComunicanteId = null;
		$this->aEndereco = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(PessoaPeer::DEFAULT_STRING_FORMAT);
	}

} // BasePessoa
