<?php


/**
 * Base class that represents a row from the 'pg' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BasePg extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'PgPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        PgPeer
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
	 * The value for the usuario_id field.
	 * @var        int
	 */
	protected $usuario_id;

	/**
	 * The value for the igreja_responsavel_id field.
	 * @var        int
	 */
	protected $igreja_responsavel_id;

	/**
	 * The value for the endereco_id field.
	 * @var        int
	 */
	protected $endereco_id;

	/**
	 * The value for the instituicao_id field.
	 * @var        int
	 */
	protected $instituicao_id;

	/**
	 * The value for the titulo field.
	 * @var        string
	 */
	protected $titulo;

	/**
	 * The value for the hora field.
	 * @var        string
	 */
	protected $hora;

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
	 * The value for the ativa field.
	 * Note: this column has a database default value of: true
	 * @var        boolean
	 */
	protected $ativa;

	/**
	 * @var        Endereco
	 */
	protected $aEndereco;

	/**
	 * @var        Igreja
	 */
	protected $aIgreja;

	/**
	 * @var        Usuario
	 */
	protected $aUsuario;

	/**
	 * @var        array PgUsuario[] Collection to store aggregation of PgUsuario objects.
	 */
	protected $collPgUsuarios;

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
	protected $pgUsuariosScheduledForDeletion = null;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->ativa = true;
	}

	/**
	 * Initializes internal state of BasePg object.
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
	 * Get the [usuario_id] column value.
	 * 
	 * @return     int
	 */
	public function getUsuarioId()
	{
		return $this->usuario_id;
	}

	/**
	 * Get the [igreja_responsavel_id] column value.
	 * 
	 * @return     int
	 */
	public function getIgrejaResponsavelId()
	{
		return $this->igreja_responsavel_id;
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
	 * Get the [instituicao_id] column value.
	 * 
	 * @return     int
	 */
	public function getInstituicaoId()
	{
		return $this->instituicao_id;
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
	 * Get the [hora] column value.
	 * 
	 * @return     string
	 */
	public function getHora()
	{
		return $this->hora;
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
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataCadastro($format = 'Y-m-d H:i:s')
	{
		if ($this->data_cadastro === null) {
			return null;
		}


		if ($this->data_cadastro === '0000-00-00 00:00:00') {
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
	 * Get the [ativa] column value.
	 * 
	 * @return     boolean
	 */
	public function getAtiva()
	{
		return $this->ativa;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Pg The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PgPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [usuario_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Pg The current object (for fluent API support)
	 */
	public function setUsuarioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->usuario_id !== $v) {
			$this->usuario_id = $v;
			$this->modifiedColumns[] = PgPeer::USUARIO_ID;
		}

		if ($this->aUsuario !== null && $this->aUsuario->getId() !== $v) {
			$this->aUsuario = null;
		}

		return $this;
	} // setUsuarioId()

	/**
	 * Set the value of [igreja_responsavel_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Pg The current object (for fluent API support)
	 */
	public function setIgrejaResponsavelId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->igreja_responsavel_id !== $v) {
			$this->igreja_responsavel_id = $v;
			$this->modifiedColumns[] = PgPeer::IGREJA_RESPONSAVEL_ID;
		}

		if ($this->aIgreja !== null && $this->aIgreja->getId() !== $v) {
			$this->aIgreja = null;
		}

		return $this;
	} // setIgrejaResponsavelId()

	/**
	 * Set the value of [endereco_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Pg The current object (for fluent API support)
	 */
	public function setEnderecoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->endereco_id !== $v) {
			$this->endereco_id = $v;
			$this->modifiedColumns[] = PgPeer::ENDERECO_ID;
		}

		if ($this->aEndereco !== null && $this->aEndereco->getId() !== $v) {
			$this->aEndereco = null;
		}

		return $this;
	} // setEnderecoId()

	/**
	 * Set the value of [instituicao_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Pg The current object (for fluent API support)
	 */
	public function setInstituicaoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->instituicao_id !== $v) {
			$this->instituicao_id = $v;
			$this->modifiedColumns[] = PgPeer::INSTITUICAO_ID;
		}

		return $this;
	} // setInstituicaoId()

	/**
	 * Set the value of [titulo] column.
	 * 
	 * @param      string $v new value
	 * @return     Pg The current object (for fluent API support)
	 */
	public function setTitulo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->titulo !== $v) {
			$this->titulo = $v;
			$this->modifiedColumns[] = PgPeer::TITULO;
		}

		return $this;
	} // setTitulo()

	/**
	 * Set the value of [hora] column.
	 * 
	 * @param      string $v new value
	 * @return     Pg The current object (for fluent API support)
	 */
	public function setHora($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->hora !== $v) {
			$this->hora = $v;
			$this->modifiedColumns[] = PgPeer::HORA;
		}

		return $this;
	} // setHora()

	/**
	 * Set the value of [descricao] column.
	 * 
	 * @param      string $v new value
	 * @return     Pg The current object (for fluent API support)
	 */
	public function setDescricao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descricao !== $v) {
			$this->descricao = $v;
			$this->modifiedColumns[] = PgPeer::DESCRICAO;
		}

		return $this;
	} // setDescricao()

	/**
	 * Sets the value of [data_cadastro] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Pg The current object (for fluent API support)
	 */
	public function setDataCadastro($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_cadastro !== null || $dt !== null) {
			$currentDateAsString = ($this->data_cadastro !== null && $tmpDt = new DateTime($this->data_cadastro)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_cadastro = $newDateAsString;
				$this->modifiedColumns[] = PgPeer::DATA_CADASTRO;
			}
		} // if either are not null

		return $this;
	} // setDataCadastro()

	/**
	 * Sets the value of the [ativa] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Pg The current object (for fluent API support)
	 */
	public function setAtiva($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->ativa !== $v) {
			$this->ativa = $v;
			$this->modifiedColumns[] = PgPeer::ATIVA;
		}

		return $this;
	} // setAtiva()

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
			if ($this->ativa !== true) {
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
			$this->usuario_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->igreja_responsavel_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->endereco_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->instituicao_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->titulo = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->hora = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->descricao = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->data_cadastro = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->ativa = ($row[$startcol + 9] !== null) ? (boolean) $row[$startcol + 9] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 10; // 10 = PgPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Pg object", $e);
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

		if ($this->aUsuario !== null && $this->usuario_id !== $this->aUsuario->getId()) {
			$this->aUsuario = null;
		}
		if ($this->aIgreja !== null && $this->igreja_responsavel_id !== $this->aIgreja->getId()) {
			$this->aIgreja = null;
		}
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
			$con = Propel::getConnection(PgPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = PgPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aEndereco = null;
			$this->aIgreja = null;
			$this->aUsuario = null;
			$this->collPgUsuarios = null;

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
			$con = Propel::getConnection(PgPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = PgQuery::create()
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
			$con = Propel::getConnection(PgPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				PgPeer::addInstanceToPool($this);
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

			if ($this->aIgreja !== null) {
				if ($this->aIgreja->isModified() || $this->aIgreja->isNew()) {
					$affectedRows += $this->aIgreja->save($con);
				}
				$this->setIgreja($this->aIgreja);
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

			if ($this->pgUsuariosScheduledForDeletion !== null) {
				if (!$this->pgUsuariosScheduledForDeletion->isEmpty()) {
					PgUsuarioQuery::create()
						->filterByPrimaryKeys($this->pgUsuariosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->pgUsuariosScheduledForDeletion = null;
				}
			}

			if ($this->collPgUsuarios !== null) {
				foreach ($this->collPgUsuarios as $referrerFK) {
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

		$this->modifiedColumns[] = PgPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . PgPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(PgPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(PgPeer::USUARIO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`USUARIO_ID`';
		}
		if ($this->isColumnModified(PgPeer::IGREJA_RESPONSAVEL_ID)) {
			$modifiedColumns[':p' . $index++]  = '`IGREJA_RESPONSAVEL_ID`';
		}
		if ($this->isColumnModified(PgPeer::ENDERECO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ENDERECO_ID`';
		}
		if ($this->isColumnModified(PgPeer::INSTITUICAO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`INSTITUICAO_ID`';
		}
		if ($this->isColumnModified(PgPeer::TITULO)) {
			$modifiedColumns[':p' . $index++]  = '`TITULO`';
		}
		if ($this->isColumnModified(PgPeer::HORA)) {
			$modifiedColumns[':p' . $index++]  = '`HORA`';
		}
		if ($this->isColumnModified(PgPeer::DESCRICAO)) {
			$modifiedColumns[':p' . $index++]  = '`DESCRICAO`';
		}
		if ($this->isColumnModified(PgPeer::DATA_CADASTRO)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_CADASTRO`';
		}
		if ($this->isColumnModified(PgPeer::ATIVA)) {
			$modifiedColumns[':p' . $index++]  = '`ATIVA`';
		}

		$sql = sprintf(
			'INSERT INTO `pg` (%s) VALUES (%s)',
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
					case '`USUARIO_ID`':						
						$stmt->bindValue($identifier, $this->usuario_id, PDO::PARAM_INT);
						break;
					case '`IGREJA_RESPONSAVEL_ID`':						
						$stmt->bindValue($identifier, $this->igreja_responsavel_id, PDO::PARAM_INT);
						break;
					case '`ENDERECO_ID`':						
						$stmt->bindValue($identifier, $this->endereco_id, PDO::PARAM_INT);
						break;
					case '`INSTITUICAO_ID`':						
						$stmt->bindValue($identifier, $this->instituicao_id, PDO::PARAM_INT);
						break;
					case '`TITULO`':						
						$stmt->bindValue($identifier, $this->titulo, PDO::PARAM_STR);
						break;
					case '`HORA`':						
						$stmt->bindValue($identifier, $this->hora, PDO::PARAM_STR);
						break;
					case '`DESCRICAO`':						
						$stmt->bindValue($identifier, $this->descricao, PDO::PARAM_STR);
						break;
					case '`DATA_CADASTRO`':						
						$stmt->bindValue($identifier, $this->data_cadastro, PDO::PARAM_STR);
						break;
					case '`ATIVA`':
						$stmt->bindValue($identifier, (int) $this->ativa, PDO::PARAM_INT);
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
		$pos = PgPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getUsuarioId();
				break;
			case 2:
				return $this->getIgrejaResponsavelId();
				break;
			case 3:
				return $this->getEnderecoId();
				break;
			case 4:
				return $this->getInstituicaoId();
				break;
			case 5:
				return $this->getTitulo();
				break;
			case 6:
				return $this->getHora();
				break;
			case 7:
				return $this->getDescricao();
				break;
			case 8:
				return $this->getDataCadastro();
				break;
			case 9:
				return $this->getAtiva();
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
		if (isset($alreadyDumpedObjects['Pg'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Pg'][$this->getPrimaryKey()] = true;
		$keys = PgPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUsuarioId(),
			$keys[2] => $this->getIgrejaResponsavelId(),
			$keys[3] => $this->getEnderecoId(),
			$keys[4] => $this->getInstituicaoId(),
			$keys[5] => $this->getTitulo(),
			$keys[6] => $this->getHora(),
			$keys[7] => $this->getDescricao(),
			$keys[8] => $this->getDataCadastro(),
			$keys[9] => $this->getAtiva(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aEndereco) {
				$result['Endereco'] = $this->aEndereco->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aIgreja) {
				$result['Igreja'] = $this->aIgreja->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aUsuario) {
				$result['Usuario'] = $this->aUsuario->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collPgUsuarios) {
				$result['PgUsuarios'] = $this->collPgUsuarios->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = PgPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setUsuarioId($value);
				break;
			case 2:
				$this->setIgrejaResponsavelId($value);
				break;
			case 3:
				$this->setEnderecoId($value);
				break;
			case 4:
				$this->setInstituicaoId($value);
				break;
			case 5:
				$this->setTitulo($value);
				break;
			case 6:
				$this->setHora($value);
				break;
			case 7:
				$this->setDescricao($value);
				break;
			case 8:
				$this->setDataCadastro($value);
				break;
			case 9:
				$this->setAtiva($value);
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
		$keys = PgPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUsuarioId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIgrejaResponsavelId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEnderecoId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setInstituicaoId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTitulo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setHora($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDescricao($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDataCadastro($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAtiva($arr[$keys[9]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(PgPeer::DATABASE_NAME);

		if ($this->isColumnModified(PgPeer::ID)) $criteria->add(PgPeer::ID, $this->id);
		if ($this->isColumnModified(PgPeer::USUARIO_ID)) $criteria->add(PgPeer::USUARIO_ID, $this->usuario_id);
		if ($this->isColumnModified(PgPeer::IGREJA_RESPONSAVEL_ID)) $criteria->add(PgPeer::IGREJA_RESPONSAVEL_ID, $this->igreja_responsavel_id);
		if ($this->isColumnModified(PgPeer::ENDERECO_ID)) $criteria->add(PgPeer::ENDERECO_ID, $this->endereco_id);
		if ($this->isColumnModified(PgPeer::INSTITUICAO_ID)) $criteria->add(PgPeer::INSTITUICAO_ID, $this->instituicao_id);
		if ($this->isColumnModified(PgPeer::TITULO)) $criteria->add(PgPeer::TITULO, $this->titulo);
		if ($this->isColumnModified(PgPeer::HORA)) $criteria->add(PgPeer::HORA, $this->hora);
		if ($this->isColumnModified(PgPeer::DESCRICAO)) $criteria->add(PgPeer::DESCRICAO, $this->descricao);
		if ($this->isColumnModified(PgPeer::DATA_CADASTRO)) $criteria->add(PgPeer::DATA_CADASTRO, $this->data_cadastro);
		if ($this->isColumnModified(PgPeer::ATIVA)) $criteria->add(PgPeer::ATIVA, $this->ativa);

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
		$criteria = new Criteria(PgPeer::DATABASE_NAME);
		$criteria->add(PgPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Pg (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setUsuarioId($this->getUsuarioId());
		$copyObj->setIgrejaResponsavelId($this->getIgrejaResponsavelId());
		$copyObj->setEnderecoId($this->getEnderecoId());
		$copyObj->setInstituicaoId($this->getInstituicaoId());
		$copyObj->setTitulo($this->getTitulo());
		$copyObj->setHora($this->getHora());
		$copyObj->setDescricao($this->getDescricao());
		$copyObj->setDataCadastro($this->getDataCadastro());
		$copyObj->setAtiva($this->getAtiva());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getPgUsuarios() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPgUsuario($relObj->copy($deepCopy));
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
	 * @return     Pg Clone of current object.
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
	 * @return     PgPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PgPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Endereco object.
	 *
	 * @param      Endereco $v
	 * @return     Pg The current object (for fluent API support)
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
			$v->addPg($this);
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
				$this->aEndereco->addPgs($this);
			 */
		}
		return $this->aEndereco;
	}

	/**
	 * Declares an association between this object and a Igreja object.
	 *
	 * @param      Igreja $v
	 * @return     Pg The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setIgreja(Igreja $v = null)
	{
		if ($v === null) {
			$this->setIgrejaResponsavelId(NULL);
		} else {
			$this->setIgrejaResponsavelId($v->getId());
		}

		$this->aIgreja = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Igreja object, it will not be re-added.
		if ($v !== null) {
			$v->addPg($this);
		}

		return $this;
	}


	/**
	 * Get the associated Igreja object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Igreja The associated Igreja object.
	 * @throws     PropelException
	 */
	public function getIgreja(PropelPDO $con = null)
	{
		if ($this->aIgreja === null && ($this->igreja_responsavel_id !== null)) {
			$this->aIgreja = IgrejaQuery::create()->findPk($this->igreja_responsavel_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aIgreja->addPgs($this);
			 */
		}
		return $this->aIgreja;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     Pg The current object (for fluent API support)
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
			$v->addPg($this);
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
				$this->aUsuario->addPgs($this);
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
		if ('PgUsuario' == $relationName) {
			return $this->initPgUsuarios();
		}
	}

	/**
	 * Clears out the collPgUsuarios collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPgUsuarios()
	 */
	public function clearPgUsuarios()
	{
		$this->collPgUsuarios = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPgUsuarios collection.
	 *
	 * By default this just sets the collPgUsuarios collection to an empty array (like clearcollPgUsuarios());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initPgUsuarios($overrideExisting = true)
	{
		if (null !== $this->collPgUsuarios && !$overrideExisting) {
			return;
		}
		$this->collPgUsuarios = new PropelObjectCollection();
		$this->collPgUsuarios->setModel('PgUsuario');
	}

	/**
	 * Gets an array of PgUsuario objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Pg is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array PgUsuario[] List of PgUsuario objects
	 * @throws     PropelException
	 */
	public function getPgUsuarios($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPgUsuarios || null !== $criteria) {
			if ($this->isNew() && null === $this->collPgUsuarios) {
				// return empty collection
				$this->initPgUsuarios();
			} else {
				$collPgUsuarios = PgUsuarioQuery::create(null, $criteria)
					->filterByPg($this)
					->find($con);
				if (null !== $criteria) {
					return $collPgUsuarios;
				}
				$this->collPgUsuarios = $collPgUsuarios;
			}
		}
		return $this->collPgUsuarios;
	}

	/**
	 * Sets a collection of PgUsuario objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $pgUsuarios A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setPgUsuarios(PropelCollection $pgUsuarios, PropelPDO $con = null)
	{
		$this->pgUsuariosScheduledForDeletion = $this->getPgUsuarios(new Criteria(), $con)->diff($pgUsuarios);

		foreach ($pgUsuarios as $pgUsuario) {
			// Fix issue with collection modified by reference
			if ($pgUsuario->isNew()) {
				$pgUsuario->setPg($this);
			}
			$this->addPgUsuario($pgUsuario);
		}

		$this->collPgUsuarios = $pgUsuarios;
	}

	/**
	 * Returns the number of related PgUsuario objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related PgUsuario objects.
	 * @throws     PropelException
	 */
	public function countPgUsuarios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPgUsuarios || null !== $criteria) {
			if ($this->isNew() && null === $this->collPgUsuarios) {
				return 0;
			} else {
				$query = PgUsuarioQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPg($this)
					->count($con);
			}
		} else {
			return count($this->collPgUsuarios);
		}
	}

	/**
	 * Method called to associate a PgUsuario object to this object
	 * through the PgUsuario foreign key attribute.
	 *
	 * @param      PgUsuario $l PgUsuario
	 * @return     Pg The current object (for fluent API support)
	 */
	public function addPgUsuario(PgUsuario $l)
	{
		if ($this->collPgUsuarios === null) {
			$this->initPgUsuarios();
		}
		if (!$this->collPgUsuarios->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddPgUsuario($l);
		}

		return $this;
	}

	/**
	 * @param	PgUsuario $pgUsuario The pgUsuario object to add.
	 */
	protected function doAddPgUsuario($pgUsuario)
	{
		$this->collPgUsuarios[]= $pgUsuario;
		$pgUsuario->setPg($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pg is new, it will return
	 * an empty collection; or if this Pg has previously
	 * been saved, it will retrieve related PgUsuarios from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pg.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array PgUsuario[] List of PgUsuario objects
	 */
	public function getPgUsuariosJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = PgUsuarioQuery::create(null, $criteria);
		$query->joinWith('Usuario', $join_behavior);

		return $this->getPgUsuarios($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->usuario_id = null;
		$this->igreja_responsavel_id = null;
		$this->endereco_id = null;
		$this->instituicao_id = null;
		$this->titulo = null;
		$this->hora = null;
		$this->descricao = null;
		$this->data_cadastro = null;
		$this->ativa = null;
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
			if ($this->collPgUsuarios) {
				foreach ($this->collPgUsuarios as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collPgUsuarios instanceof PropelCollection) {
			$this->collPgUsuarios->clearIterator();
		}
		$this->collPgUsuarios = null;
		$this->aEndereco = null;
		$this->aIgreja = null;
		$this->aUsuario = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(PgPeer::DEFAULT_STRING_FORMAT);
	}

} // BasePg
