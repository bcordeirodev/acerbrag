<?php


/**
 * Base class that represents a row from the 'podcast' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BasePodcast extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'PodcastPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        PodcastPeer
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
	 * The value for the instituicao_id field.
	 * @var        int
	 */
	protected $instituicao_id;

	/**
	 * The value for the criador_id field.
	 * @var        int
	 */
	protected $criador_id;

	/**
	 * The value for the titulo field.
	 * @var        string
	 */
	protected $titulo;

	/**
	 * The value for the descricao field.
	 * @var        string
	 */
	protected $descricao;

	/**
	 * The value for the data_cadastro field.
	 * @var        string
	 */
	protected $data_cadastro;

	/**
	 * The value for the ativo field.
	 * Note: this column has a database default value of: true
	 * @var        boolean
	 */
	protected $ativo;

	/**
	 * @var        Usuario
	 */
	protected $aUsuario;

	/**
	 * @var        array PodcastIgreja[] Collection to store aggregation of PodcastIgreja objects.
	 */
	protected $collPodcastIgrejas;

	/**
	 * @var        array Igreja[] Collection to store aggregation of Igreja objects.
	 */
	protected $collIgrejas;

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
	protected $igrejasScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $podcastIgrejasScheduledForDeletion = null;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->ativo = true;
	}

	/**
	 * Initializes internal state of BasePodcast object.
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
	 * Get the [instituicao_id] column value.
	 * 
	 * @return     int
	 */
	public function getInstituicaoId()
	{
		return $this->instituicao_id;
	}

	/**
	 * Get the [criador_id] column value.
	 * 
	 * @return     int
	 */
	public function getCriadorId()
	{
		return $this->criador_id;
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
	 * Get the [descricao] column value.
	 * 
	 * @return     string
	 */
	public function getDescricao()
	{
		return $this->descricao;
	}

	/**
	 * Get the [optionally formatted] temporal [data_cadastro] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataCadastro($format = '%x')
	{
		if ($this->data_cadastro === null) {
			return null;
		}


		if ($this->data_cadastro === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_cadastro);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_cadastro, true), $x);
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
	 * @return     Podcast The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PodcastPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [instituicao_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Podcast The current object (for fluent API support)
	 */
	public function setInstituicaoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->instituicao_id !== $v) {
			$this->instituicao_id = $v;
			$this->modifiedColumns[] = PodcastPeer::INSTITUICAO_ID;
		}

		return $this;
	} // setInstituicaoId()

	/**
	 * Set the value of [criador_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Podcast The current object (for fluent API support)
	 */
	public function setCriadorId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->criador_id !== $v) {
			$this->criador_id = $v;
			$this->modifiedColumns[] = PodcastPeer::CRIADOR_ID;
		}

		if ($this->aUsuario !== null && $this->aUsuario->getId() !== $v) {
			$this->aUsuario = null;
		}

		return $this;
	} // setCriadorId()

	/**
	 * Set the value of [titulo] column.
	 * 
	 * @param      string $v new value
	 * @return     Podcast The current object (for fluent API support)
	 */
	public function setTitulo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->titulo !== $v) {
			$this->titulo = $v;
			$this->modifiedColumns[] = PodcastPeer::TITULO;
		}

		return $this;
	} // setTitulo()

	/**
	 * Set the value of [descricao] column.
	 * 
	 * @param      string $v new value
	 * @return     Podcast The current object (for fluent API support)
	 */
	public function setDescricao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descricao !== $v) {
			$this->descricao = $v;
			$this->modifiedColumns[] = PodcastPeer::DESCRICAO;
		}

		return $this;
	} // setDescricao()

	/**
	 * Sets the value of [data_cadastro] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Podcast The current object (for fluent API support)
	 */
	public function setDataCadastro($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_cadastro !== null || $dt !== null) {
			$currentDateAsString = ($this->data_cadastro !== null && $tmpDt = new DateTime($this->data_cadastro)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_cadastro = $newDateAsString;
				$this->modifiedColumns[] = PodcastPeer::DATA_CADASTRO;
			}
		} // if either are not null

		return $this;
	} // setDataCadastro()

	/**
	 * Sets the value of the [ativo] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Podcast The current object (for fluent API support)
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
			$this->modifiedColumns[] = PodcastPeer::ATIVO;
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
			if ($this->ativo !== true) {
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
			$this->instituicao_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->criador_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->titulo = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->descricao = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->data_cadastro = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->ativo = ($row[$startcol + 6] !== null) ? (boolean) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 7; // 7 = PodcastPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Podcast object", $e);
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

		if ($this->aUsuario !== null && $this->criador_id !== $this->aUsuario->getId()) {
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
			$con = Propel::getConnection(PodcastPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = PodcastPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aUsuario = null;
			$this->collPodcastIgrejas = null;

			$this->collIgrejas = null;
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
			$con = Propel::getConnection(PodcastPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = PodcastQuery::create()
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
			$con = Propel::getConnection(PodcastPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				PodcastPeer::addInstanceToPool($this);
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

			if ($this->igrejasScheduledForDeletion !== null) {
				if (!$this->igrejasScheduledForDeletion->isEmpty()) {
					PodcastIgrejaQuery::create()
						->filterByPrimaryKeys($this->igrejasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->igrejasScheduledForDeletion = null;
				}

				foreach ($this->getIgrejas() as $igreja) {
					if ($igreja->isModified()) {
						$igreja->save($con);
					}
				}
			}

			if ($this->podcastIgrejasScheduledForDeletion !== null) {
				if (!$this->podcastIgrejasScheduledForDeletion->isEmpty()) {
					PodcastIgrejaQuery::create()
						->filterByPrimaryKeys($this->podcastIgrejasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->podcastIgrejasScheduledForDeletion = null;
				}
			}

			if ($this->collPodcastIgrejas !== null) {
				foreach ($this->collPodcastIgrejas as $referrerFK) {
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

		$this->modifiedColumns[] = PodcastPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . PodcastPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(PodcastPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(PodcastPeer::INSTITUICAO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`INSTITUICAO_ID`';
		}
		if ($this->isColumnModified(PodcastPeer::CRIADOR_ID)) {
			$modifiedColumns[':p' . $index++]  = '`CRIADOR_ID`';
		}
		if ($this->isColumnModified(PodcastPeer::TITULO)) {
			$modifiedColumns[':p' . $index++]  = '`TITULO`';
		}
		if ($this->isColumnModified(PodcastPeer::DESCRICAO)) {
			$modifiedColumns[':p' . $index++]  = '`DESCRICAO`';
		}
		if ($this->isColumnModified(PodcastPeer::DATA_CADASTRO)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_CADASTRO`';
		}
		if ($this->isColumnModified(PodcastPeer::ATIVO)) {
			$modifiedColumns[':p' . $index++]  = '`ATIVO`';
		}

		$sql = sprintf(
			'INSERT INTO `podcast` (%s) VALUES (%s)',
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
					case '`INSTITUICAO_ID`':						
						$stmt->bindValue($identifier, $this->instituicao_id, PDO::PARAM_INT);
						break;
					case '`CRIADOR_ID`':						
						$stmt->bindValue($identifier, $this->criador_id, PDO::PARAM_INT);
						break;
					case '`TITULO`':						
						$stmt->bindValue($identifier, $this->titulo, PDO::PARAM_STR);
						break;
					case '`DESCRICAO`':						
						$stmt->bindValue($identifier, $this->descricao, PDO::PARAM_STR);
						break;
					case '`DATA_CADASTRO`':						
						$stmt->bindValue($identifier, $this->data_cadastro, PDO::PARAM_STR);
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
		$pos = PodcastPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getInstituicaoId();
				break;
			case 2:
				return $this->getCriadorId();
				break;
			case 3:
				return $this->getTitulo();
				break;
			case 4:
				return $this->getDescricao();
				break;
			case 5:
				return $this->getDataCadastro();
				break;
			case 6:
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
		if (isset($alreadyDumpedObjects['Podcast'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Podcast'][$this->getPrimaryKey()] = true;
		$keys = PodcastPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getInstituicaoId(),
			$keys[2] => $this->getCriadorId(),
			$keys[3] => $this->getTitulo(),
			$keys[4] => $this->getDescricao(),
			$keys[5] => $this->getDataCadastro(),
			$keys[6] => $this->getAtivo(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aUsuario) {
				$result['Usuario'] = $this->aUsuario->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collPodcastIgrejas) {
				$result['PodcastIgrejas'] = $this->collPodcastIgrejas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = PodcastPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setInstituicaoId($value);
				break;
			case 2:
				$this->setCriadorId($value);
				break;
			case 3:
				$this->setTitulo($value);
				break;
			case 4:
				$this->setDescricao($value);
				break;
			case 5:
				$this->setDataCadastro($value);
				break;
			case 6:
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
		$keys = PodcastPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setInstituicaoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCriadorId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTitulo($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescricao($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDataCadastro($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAtivo($arr[$keys[6]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(PodcastPeer::DATABASE_NAME);

		if ($this->isColumnModified(PodcastPeer::ID)) $criteria->add(PodcastPeer::ID, $this->id);
		if ($this->isColumnModified(PodcastPeer::INSTITUICAO_ID)) $criteria->add(PodcastPeer::INSTITUICAO_ID, $this->instituicao_id);
		if ($this->isColumnModified(PodcastPeer::CRIADOR_ID)) $criteria->add(PodcastPeer::CRIADOR_ID, $this->criador_id);
		if ($this->isColumnModified(PodcastPeer::TITULO)) $criteria->add(PodcastPeer::TITULO, $this->titulo);
		if ($this->isColumnModified(PodcastPeer::DESCRICAO)) $criteria->add(PodcastPeer::DESCRICAO, $this->descricao);
		if ($this->isColumnModified(PodcastPeer::DATA_CADASTRO)) $criteria->add(PodcastPeer::DATA_CADASTRO, $this->data_cadastro);
		if ($this->isColumnModified(PodcastPeer::ATIVO)) $criteria->add(PodcastPeer::ATIVO, $this->ativo);

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
		$criteria = new Criteria(PodcastPeer::DATABASE_NAME);
		$criteria->add(PodcastPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Podcast (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setInstituicaoId($this->getInstituicaoId());
		$copyObj->setCriadorId($this->getCriadorId());
		$copyObj->setTitulo($this->getTitulo());
		$copyObj->setDescricao($this->getDescricao());
		$copyObj->setDataCadastro($this->getDataCadastro());
		$copyObj->setAtivo($this->getAtivo());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getPodcastIgrejas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPodcastIgreja($relObj->copy($deepCopy));
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
	 * @return     Podcast Clone of current object.
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
	 * @return     PodcastPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PodcastPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     Podcast The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUsuario(Usuario $v = null)
	{
		if ($v === null) {
			$this->setCriadorId(NULL);
		} else {
			$this->setCriadorId($v->getId());
		}

		$this->aUsuario = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Usuario object, it will not be re-added.
		if ($v !== null) {
			$v->addPodcast($this);
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
		if ($this->aUsuario === null && ($this->criador_id !== null)) {
			$this->aUsuario = UsuarioQuery::create()->findPk($this->criador_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aUsuario->addPodcasts($this);
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
		if ('PodcastIgreja' == $relationName) {
			return $this->initPodcastIgrejas();
		}
	}

	/**
	 * Clears out the collPodcastIgrejas collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPodcastIgrejas()
	 */
	public function clearPodcastIgrejas()
	{
		$this->collPodcastIgrejas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPodcastIgrejas collection.
	 *
	 * By default this just sets the collPodcastIgrejas collection to an empty array (like clearcollPodcastIgrejas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initPodcastIgrejas($overrideExisting = true)
	{
		if (null !== $this->collPodcastIgrejas && !$overrideExisting) {
			return;
		}
		$this->collPodcastIgrejas = new PropelObjectCollection();
		$this->collPodcastIgrejas->setModel('PodcastIgreja');
	}

	/**
	 * Gets an array of PodcastIgreja objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Podcast is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array PodcastIgreja[] List of PodcastIgreja objects
	 * @throws     PropelException
	 */
	public function getPodcastIgrejas($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPodcastIgrejas || null !== $criteria) {
			if ($this->isNew() && null === $this->collPodcastIgrejas) {
				// return empty collection
				$this->initPodcastIgrejas();
			} else {
				$collPodcastIgrejas = PodcastIgrejaQuery::create(null, $criteria)
					->filterByPodcast($this)
					->find($con);
				if (null !== $criteria) {
					return $collPodcastIgrejas;
				}
				$this->collPodcastIgrejas = $collPodcastIgrejas;
			}
		}
		return $this->collPodcastIgrejas;
	}

	/**
	 * Sets a collection of PodcastIgreja objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $podcastIgrejas A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setPodcastIgrejas(PropelCollection $podcastIgrejas, PropelPDO $con = null)
	{
		$this->podcastIgrejasScheduledForDeletion = $this->getPodcastIgrejas(new Criteria(), $con)->diff($podcastIgrejas);

		foreach ($podcastIgrejas as $podcastIgreja) {
			// Fix issue with collection modified by reference
			if ($podcastIgreja->isNew()) {
				$podcastIgreja->setPodcast($this);
			}
			$this->addPodcastIgreja($podcastIgreja);
		}

		$this->collPodcastIgrejas = $podcastIgrejas;
	}

	/**
	 * Returns the number of related PodcastIgreja objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related PodcastIgreja objects.
	 * @throws     PropelException
	 */
	public function countPodcastIgrejas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPodcastIgrejas || null !== $criteria) {
			if ($this->isNew() && null === $this->collPodcastIgrejas) {
				return 0;
			} else {
				$query = PodcastIgrejaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPodcast($this)
					->count($con);
			}
		} else {
			return count($this->collPodcastIgrejas);
		}
	}

	/**
	 * Method called to associate a PodcastIgreja object to this object
	 * through the PodcastIgreja foreign key attribute.
	 *
	 * @param      PodcastIgreja $l PodcastIgreja
	 * @return     Podcast The current object (for fluent API support)
	 */
	public function addPodcastIgreja(PodcastIgreja $l)
	{
		if ($this->collPodcastIgrejas === null) {
			$this->initPodcastIgrejas();
		}
		if (!$this->collPodcastIgrejas->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddPodcastIgreja($l);
		}

		return $this;
	}

	/**
	 * @param	PodcastIgreja $podcastIgreja The podcastIgreja object to add.
	 */
	protected function doAddPodcastIgreja($podcastIgreja)
	{
		$this->collPodcastIgrejas[]= $podcastIgreja;
		$podcastIgreja->setPodcast($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Podcast is new, it will return
	 * an empty collection; or if this Podcast has previously
	 * been saved, it will retrieve related PodcastIgrejas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Podcast.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array PodcastIgreja[] List of PodcastIgreja objects
	 */
	public function getPodcastIgrejasJoinIgreja($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = PodcastIgrejaQuery::create(null, $criteria);
		$query->joinWith('Igreja', $join_behavior);

		return $this->getPodcastIgrejas($query, $con);
	}

	/**
	 * Clears out the collIgrejas collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addIgrejas()
	 */
	public function clearIgrejas()
	{
		$this->collIgrejas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collIgrejas collection.
	 *
	 * By default this just sets the collIgrejas collection to an empty collection (like clearIgrejas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initIgrejas()
	{
		$this->collIgrejas = new PropelObjectCollection();
		$this->collIgrejas->setModel('Igreja');
	}

	/**
	 * Gets a collection of Igreja objects related by a many-to-many relationship
	 * to the current object by way of the podcast_igreja cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Podcast is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Igreja[] List of Igreja objects
	 */
	public function getIgrejas($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collIgrejas || null !== $criteria) {
			if ($this->isNew() && null === $this->collIgrejas) {
				// return empty collection
				$this->initIgrejas();
			} else {
				$collIgrejas = IgrejaQuery::create(null, $criteria)
					->filterByPodcast($this)
					->find($con);
				if (null !== $criteria) {
					return $collIgrejas;
				}
				$this->collIgrejas = $collIgrejas;
			}
		}
		return $this->collIgrejas;
	}

	/**
	 * Sets a collection of Igreja objects related by a many-to-many relationship
	 * to the current object by way of the podcast_igreja cross-reference table.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $igrejas A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setIgrejas(PropelCollection $igrejas, PropelPDO $con = null)
	{
		$podcastIgrejas = PodcastIgrejaQuery::create()
			->filterByIgreja($igrejas)
			->filterByPodcast($this)
			->find($con);

		$this->igrejasScheduledForDeletion = $this->getPodcastIgrejas()->diff($podcastIgrejas);
		$this->collPodcastIgrejas = $podcastIgrejas;

		foreach ($igrejas as $igreja) {
			// Fix issue with collection modified by reference
			if ($igreja->isNew()) {
				$this->doAddIgreja($igreja);
			} else {
				$this->addIgreja($igreja);
			}
		}

		$this->collIgrejas = $igrejas;
	}

	/**
	 * Gets the number of Igreja objects related by a many-to-many relationship
	 * to the current object by way of the podcast_igreja cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Igreja objects
	 */
	public function countIgrejas($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collIgrejas || null !== $criteria) {
			if ($this->isNew() && null === $this->collIgrejas) {
				return 0;
			} else {
				$query = IgrejaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPodcast($this)
					->count($con);
			}
		} else {
			return count($this->collIgrejas);
		}
	}

	/**
	 * Associate a Igreja object to this object
	 * through the podcast_igreja cross reference table.
	 *
	 * @param      Igreja $igreja The PodcastIgreja object to relate
	 * @return     void
	 */
	public function addIgreja(Igreja $igreja)
	{
		if ($this->collIgrejas === null) {
			$this->initIgrejas();
		}
		if (!$this->collIgrejas->contains($igreja)) { // only add it if the **same** object is not already associated
			$this->doAddIgreja($igreja);

			$this->collIgrejas[]= $igreja;
		}
	}

	/**
	 * @param	Igreja $igreja The igreja object to add.
	 */
	protected function doAddIgreja($igreja)
	{
		$podcastIgreja = new PodcastIgreja();
		$podcastIgreja->setIgreja($igreja);
		$this->addPodcastIgreja($podcastIgreja);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->instituicao_id = null;
		$this->criador_id = null;
		$this->titulo = null;
		$this->descricao = null;
		$this->data_cadastro = null;
		$this->ativo = null;
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
			if ($this->collPodcastIgrejas) {
				foreach ($this->collPodcastIgrejas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collIgrejas) {
				foreach ($this->collIgrejas as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collPodcastIgrejas instanceof PropelCollection) {
			$this->collPodcastIgrejas->clearIterator();
		}
		$this->collPodcastIgrejas = null;
		if ($this->collIgrejas instanceof PropelCollection) {
			$this->collIgrejas->clearIterator();
		}
		$this->collIgrejas = null;
		$this->aUsuario = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(PodcastPeer::DEFAULT_STRING_FORMAT);
	}

} // BasePodcast
