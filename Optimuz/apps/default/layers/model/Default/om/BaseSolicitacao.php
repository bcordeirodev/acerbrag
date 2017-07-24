<?php


/**
 * Base class that represents a row from the 'solicitacao' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseSolicitacao extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'SolicitacaoPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SolicitacaoPeer
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
	 * The value for the cliente_id field.
	 * @var        int
	 */
	protected $cliente_id;

	/**
	 * The value for the area_advocacia_id field.
	 * @var        int
	 */
	protected $area_advocacia_id;

	/**
	 * The value for the advogado_id field.
	 * @var        int
	 */
	protected $advogado_id;

	/**
	 * The value for the descricao field.
	 * @var        string
	 */
	protected $descricao;

	/**
	 * The value for the data_criacao field.
	 * @var        string
	 */
	protected $data_criacao;

	/**
	 * The value for the data_atendimento field.
	 * @var        string
	 */
	protected $data_atendimento;

	/**
	 * The value for the longitude field.
	 * @var        double
	 */
	protected $longitude;

	/**
	 * The value for the latitude field.
	 * @var        double
	 */
	protected $latitude;

	/**
	 * The value for the raio field.
	 * Note: this column has a database default value of: 20
	 * @var        int
	 */
	protected $raio;

	/**
	 * The value for the atendida field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $atendida;

	/**
	 * The value for the ativa field.
	 * Note: this column has a database default value of: true
	 * @var        boolean
	 */
	protected $ativa;

	/**
	 * @var        Advogado
	 */
	protected $aAdvogado;

	/**
	 * @var        AreaAdvocacia
	 */
	protected $aAreaAdvocacia;

	/**
	 * @var        Cliente
	 */
	protected $aCliente;

	/**
	 * @var        array Caso[] Collection to store aggregation of Caso objects.
	 */
	protected $collCasos;

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
	protected $casosScheduledForDeletion = null;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->raio = 20;
		$this->atendida = false;
		$this->ativa = true;
	}

	/**
	 * Initializes internal state of BaseSolicitacao object.
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
	 * Get the [cliente_id] column value.
	 * 
	 * @return     int
	 */
	public function getClienteId()
	{
		return $this->cliente_id;
	}

	/**
	 * Get the [area_advocacia_id] column value.
	 * 
	 * @return     int
	 */
	public function getAreaAdvocaciaId()
	{
		return $this->area_advocacia_id;
	}

	/**
	 * Get the [advogado_id] column value.
	 * 
	 * @return     int
	 */
	public function getAdvogadoId()
	{
		return $this->advogado_id;
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
	 * Get the [optionally formatted] temporal [data_criacao] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataCriacao($format = 'Y-m-d H:i:s')
	{
		if ($this->data_criacao === null) {
			return null;
		}


		if ($this->data_criacao === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_criacao);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_criacao, true), $x);
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
	 * Get the [optionally formatted] temporal [data_atendimento] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataAtendimento($format = 'Y-m-d H:i:s')
	{
		if ($this->data_atendimento === null) {
			return null;
		}


		if ($this->data_atendimento === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_atendimento);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_atendimento, true), $x);
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
	 * Get the [longitude] column value.
	 * 
	 * @return     double
	 */
	public function getLongitude()
	{
		return $this->longitude;
	}

	/**
	 * Get the [latitude] column value.
	 * 
	 * @return     double
	 */
	public function getLatitude()
	{
		return $this->latitude;
	}

	/**
	 * Get the [raio] column value.
	 * 
	 * @return     int
	 */
	public function getRaio()
	{
		return $this->raio;
	}

	/**
	 * Get the [atendida] column value.
	 * 
	 * @return     boolean
	 */
	public function getAtendida()
	{
		return $this->atendida;
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
	 * @return     Solicitacao The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SolicitacaoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [cliente_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Solicitacao The current object (for fluent API support)
	 */
	public function setClienteId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cliente_id !== $v) {
			$this->cliente_id = $v;
			$this->modifiedColumns[] = SolicitacaoPeer::CLIENTE_ID;
		}

		if ($this->aCliente !== null && $this->aCliente->getId() !== $v) {
			$this->aCliente = null;
		}

		return $this;
	} // setClienteId()

	/**
	 * Set the value of [area_advocacia_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Solicitacao The current object (for fluent API support)
	 */
	public function setAreaAdvocaciaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->area_advocacia_id !== $v) {
			$this->area_advocacia_id = $v;
			$this->modifiedColumns[] = SolicitacaoPeer::AREA_ADVOCACIA_ID;
		}

		if ($this->aAreaAdvocacia !== null && $this->aAreaAdvocacia->getId() !== $v) {
			$this->aAreaAdvocacia = null;
		}

		return $this;
	} // setAreaAdvocaciaId()

	/**
	 * Set the value of [advogado_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Solicitacao The current object (for fluent API support)
	 */
	public function setAdvogadoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->advogado_id !== $v) {
			$this->advogado_id = $v;
			$this->modifiedColumns[] = SolicitacaoPeer::ADVOGADO_ID;
		}

		if ($this->aAdvogado !== null && $this->aAdvogado->getId() !== $v) {
			$this->aAdvogado = null;
		}

		return $this;
	} // setAdvogadoId()

	/**
	 * Set the value of [descricao] column.
	 * 
	 * @param      string $v new value
	 * @return     Solicitacao The current object (for fluent API support)
	 */
	public function setDescricao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descricao !== $v) {
			$this->descricao = $v;
			$this->modifiedColumns[] = SolicitacaoPeer::DESCRICAO;
		}

		return $this;
	} // setDescricao()

	/**
	 * Sets the value of [data_criacao] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Solicitacao The current object (for fluent API support)
	 */
	public function setDataCriacao($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_criacao !== null || $dt !== null) {
			$currentDateAsString = ($this->data_criacao !== null && $tmpDt = new DateTime($this->data_criacao)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_criacao = $newDateAsString;
				$this->modifiedColumns[] = SolicitacaoPeer::DATA_CRIACAO;
			}
		} // if either are not null

		return $this;
	} // setDataCriacao()

	/**
	 * Sets the value of [data_atendimento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Solicitacao The current object (for fluent API support)
	 */
	public function setDataAtendimento($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_atendimento !== null || $dt !== null) {
			$currentDateAsString = ($this->data_atendimento !== null && $tmpDt = new DateTime($this->data_atendimento)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_atendimento = $newDateAsString;
				$this->modifiedColumns[] = SolicitacaoPeer::DATA_ATENDIMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataAtendimento()

	/**
	 * Set the value of [longitude] column.
	 * 
	 * @param      double $v new value
	 * @return     Solicitacao The current object (for fluent API support)
	 */
	public function setLongitude($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->longitude !== $v) {
			$this->longitude = $v;
			$this->modifiedColumns[] = SolicitacaoPeer::LONGITUDE;
		}

		return $this;
	} // setLongitude()

	/**
	 * Set the value of [latitude] column.
	 * 
	 * @param      double $v new value
	 * @return     Solicitacao The current object (for fluent API support)
	 */
	public function setLatitude($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->latitude !== $v) {
			$this->latitude = $v;
			$this->modifiedColumns[] = SolicitacaoPeer::LATITUDE;
		}

		return $this;
	} // setLatitude()

	/**
	 * Set the value of [raio] column.
	 * 
	 * @param      int $v new value
	 * @return     Solicitacao The current object (for fluent API support)
	 */
	public function setRaio($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->raio !== $v) {
			$this->raio = $v;
			$this->modifiedColumns[] = SolicitacaoPeer::RAIO;
		}

		return $this;
	} // setRaio()

	/**
	 * Sets the value of the [atendida] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Solicitacao The current object (for fluent API support)
	 */
	public function setAtendida($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->atendida !== $v) {
			$this->atendida = $v;
			$this->modifiedColumns[] = SolicitacaoPeer::ATENDIDA;
		}

		return $this;
	} // setAtendida()

	/**
	 * Sets the value of the [ativa] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Solicitacao The current object (for fluent API support)
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
			$this->modifiedColumns[] = SolicitacaoPeer::ATIVA;
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
			if ($this->raio !== 20) {
				return false;
			}

			if ($this->atendida !== false) {
				return false;
			}

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
			$this->cliente_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->area_advocacia_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->advogado_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->descricao = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->data_criacao = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->data_atendimento = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->longitude = ($row[$startcol + 7] !== null) ? (double) $row[$startcol + 7] : null;
			$this->latitude = ($row[$startcol + 8] !== null) ? (double) $row[$startcol + 8] : null;
			$this->raio = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->atendida = ($row[$startcol + 10] !== null) ? (boolean) $row[$startcol + 10] : null;
			$this->ativa = ($row[$startcol + 11] !== null) ? (boolean) $row[$startcol + 11] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 12; // 12 = SolicitacaoPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Solicitacao object", $e);
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

		if ($this->aCliente !== null && $this->cliente_id !== $this->aCliente->getId()) {
			$this->aCliente = null;
		}
		if ($this->aAreaAdvocacia !== null && $this->area_advocacia_id !== $this->aAreaAdvocacia->getId()) {
			$this->aAreaAdvocacia = null;
		}
		if ($this->aAdvogado !== null && $this->advogado_id !== $this->aAdvogado->getId()) {
			$this->aAdvogado = null;
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
			$con = Propel::getConnection(SolicitacaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SolicitacaoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aAdvogado = null;
			$this->aAreaAdvocacia = null;
			$this->aCliente = null;
			$this->collCasos = null;

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
			$con = Propel::getConnection(SolicitacaoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = SolicitacaoQuery::create()
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
			$con = Propel::getConnection(SolicitacaoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				SolicitacaoPeer::addInstanceToPool($this);
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

			if ($this->aAdvogado !== null) {
				if ($this->aAdvogado->isModified() || $this->aAdvogado->isNew()) {
					$affectedRows += $this->aAdvogado->save($con);
				}
				$this->setAdvogado($this->aAdvogado);
			}

			if ($this->aAreaAdvocacia !== null) {
				if ($this->aAreaAdvocacia->isModified() || $this->aAreaAdvocacia->isNew()) {
					$affectedRows += $this->aAreaAdvocacia->save($con);
				}
				$this->setAreaAdvocacia($this->aAreaAdvocacia);
			}

			if ($this->aCliente !== null) {
				if ($this->aCliente->isModified() || $this->aCliente->isNew()) {
					$affectedRows += $this->aCliente->save($con);
				}
				$this->setCliente($this->aCliente);
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

		$this->modifiedColumns[] = SolicitacaoPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . SolicitacaoPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(SolicitacaoPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(SolicitacaoPeer::CLIENTE_ID)) {
			$modifiedColumns[':p' . $index++]  = '`CLIENTE_ID`';
		}
		if ($this->isColumnModified(SolicitacaoPeer::AREA_ADVOCACIA_ID)) {
			$modifiedColumns[':p' . $index++]  = '`AREA_ADVOCACIA_ID`';
		}
		if ($this->isColumnModified(SolicitacaoPeer::ADVOGADO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ADVOGADO_ID`';
		}
		if ($this->isColumnModified(SolicitacaoPeer::DESCRICAO)) {
			$modifiedColumns[':p' . $index++]  = '`DESCRICAO`';
		}
		if ($this->isColumnModified(SolicitacaoPeer::DATA_CRIACAO)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_CRIACAO`';
		}
		if ($this->isColumnModified(SolicitacaoPeer::DATA_ATENDIMENTO)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_ATENDIMENTO`';
		}
		if ($this->isColumnModified(SolicitacaoPeer::LONGITUDE)) {
			$modifiedColumns[':p' . $index++]  = '`LONGITUDE`';
		}
		if ($this->isColumnModified(SolicitacaoPeer::LATITUDE)) {
			$modifiedColumns[':p' . $index++]  = '`LATITUDE`';
		}
		if ($this->isColumnModified(SolicitacaoPeer::RAIO)) {
			$modifiedColumns[':p' . $index++]  = '`RAIO`';
		}
		if ($this->isColumnModified(SolicitacaoPeer::ATENDIDA)) {
			$modifiedColumns[':p' . $index++]  = '`ATENDIDA`';
		}
		if ($this->isColumnModified(SolicitacaoPeer::ATIVA)) {
			$modifiedColumns[':p' . $index++]  = '`ATIVA`';
		}

		$sql = sprintf(
			'INSERT INTO `solicitacao` (%s) VALUES (%s)',
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
					case '`CLIENTE_ID`':						
						$stmt->bindValue($identifier, $this->cliente_id, PDO::PARAM_INT);
						break;
					case '`AREA_ADVOCACIA_ID`':						
						$stmt->bindValue($identifier, $this->area_advocacia_id, PDO::PARAM_INT);
						break;
					case '`ADVOGADO_ID`':						
						$stmt->bindValue($identifier, $this->advogado_id, PDO::PARAM_INT);
						break;
					case '`DESCRICAO`':						
						$stmt->bindValue($identifier, $this->descricao, PDO::PARAM_STR);
						break;
					case '`DATA_CRIACAO`':						
						$stmt->bindValue($identifier, $this->data_criacao, PDO::PARAM_STR);
						break;
					case '`DATA_ATENDIMENTO`':						
						$stmt->bindValue($identifier, $this->data_atendimento, PDO::PARAM_STR);
						break;
					case '`LONGITUDE`':						
						$stmt->bindValue($identifier, $this->longitude, PDO::PARAM_STR);
						break;
					case '`LATITUDE`':						
						$stmt->bindValue($identifier, $this->latitude, PDO::PARAM_STR);
						break;
					case '`RAIO`':						
						$stmt->bindValue($identifier, $this->raio, PDO::PARAM_INT);
						break;
					case '`ATENDIDA`':
						$stmt->bindValue($identifier, (int) $this->atendida, PDO::PARAM_INT);
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
		$pos = SolicitacaoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getClienteId();
				break;
			case 2:
				return $this->getAreaAdvocaciaId();
				break;
			case 3:
				return $this->getAdvogadoId();
				break;
			case 4:
				return $this->getDescricao();
				break;
			case 5:
				return $this->getDataCriacao();
				break;
			case 6:
				return $this->getDataAtendimento();
				break;
			case 7:
				return $this->getLongitude();
				break;
			case 8:
				return $this->getLatitude();
				break;
			case 9:
				return $this->getRaio();
				break;
			case 10:
				return $this->getAtendida();
				break;
			case 11:
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
		if (isset($alreadyDumpedObjects['Solicitacao'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Solicitacao'][$this->getPrimaryKey()] = true;
		$keys = SolicitacaoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getClienteId(),
			$keys[2] => $this->getAreaAdvocaciaId(),
			$keys[3] => $this->getAdvogadoId(),
			$keys[4] => $this->getDescricao(),
			$keys[5] => $this->getDataCriacao(),
			$keys[6] => $this->getDataAtendimento(),
			$keys[7] => $this->getLongitude(),
			$keys[8] => $this->getLatitude(),
			$keys[9] => $this->getRaio(),
			$keys[10] => $this->getAtendida(),
			$keys[11] => $this->getAtiva(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aAdvogado) {
				$result['Advogado'] = $this->aAdvogado->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aAreaAdvocacia) {
				$result['AreaAdvocacia'] = $this->aAreaAdvocacia->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aCliente) {
				$result['Cliente'] = $this->aCliente->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collCasos) {
				$result['Casos'] = $this->collCasos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = SolicitacaoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setClienteId($value);
				break;
			case 2:
				$this->setAreaAdvocaciaId($value);
				break;
			case 3:
				$this->setAdvogadoId($value);
				break;
			case 4:
				$this->setDescricao($value);
				break;
			case 5:
				$this->setDataCriacao($value);
				break;
			case 6:
				$this->setDataAtendimento($value);
				break;
			case 7:
				$this->setLongitude($value);
				break;
			case 8:
				$this->setLatitude($value);
				break;
			case 9:
				$this->setRaio($value);
				break;
			case 10:
				$this->setAtendida($value);
				break;
			case 11:
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
		$keys = SolicitacaoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setClienteId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAreaAdvocaciaId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAdvogadoId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescricao($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDataCriacao($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDataAtendimento($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setLongitude($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setLatitude($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setRaio($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAtendida($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setAtiva($arr[$keys[11]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SolicitacaoPeer::DATABASE_NAME);

		if ($this->isColumnModified(SolicitacaoPeer::ID)) $criteria->add(SolicitacaoPeer::ID, $this->id);
		if ($this->isColumnModified(SolicitacaoPeer::CLIENTE_ID)) $criteria->add(SolicitacaoPeer::CLIENTE_ID, $this->cliente_id);
		if ($this->isColumnModified(SolicitacaoPeer::AREA_ADVOCACIA_ID)) $criteria->add(SolicitacaoPeer::AREA_ADVOCACIA_ID, $this->area_advocacia_id);
		if ($this->isColumnModified(SolicitacaoPeer::ADVOGADO_ID)) $criteria->add(SolicitacaoPeer::ADVOGADO_ID, $this->advogado_id);
		if ($this->isColumnModified(SolicitacaoPeer::DESCRICAO)) $criteria->add(SolicitacaoPeer::DESCRICAO, $this->descricao);
		if ($this->isColumnModified(SolicitacaoPeer::DATA_CRIACAO)) $criteria->add(SolicitacaoPeer::DATA_CRIACAO, $this->data_criacao);
		if ($this->isColumnModified(SolicitacaoPeer::DATA_ATENDIMENTO)) $criteria->add(SolicitacaoPeer::DATA_ATENDIMENTO, $this->data_atendimento);
		if ($this->isColumnModified(SolicitacaoPeer::LONGITUDE)) $criteria->add(SolicitacaoPeer::LONGITUDE, $this->longitude);
		if ($this->isColumnModified(SolicitacaoPeer::LATITUDE)) $criteria->add(SolicitacaoPeer::LATITUDE, $this->latitude);
		if ($this->isColumnModified(SolicitacaoPeer::RAIO)) $criteria->add(SolicitacaoPeer::RAIO, $this->raio);
		if ($this->isColumnModified(SolicitacaoPeer::ATENDIDA)) $criteria->add(SolicitacaoPeer::ATENDIDA, $this->atendida);
		if ($this->isColumnModified(SolicitacaoPeer::ATIVA)) $criteria->add(SolicitacaoPeer::ATIVA, $this->ativa);

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
		$criteria = new Criteria(SolicitacaoPeer::DATABASE_NAME);
		$criteria->add(SolicitacaoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Solicitacao (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setClienteId($this->getClienteId());
		$copyObj->setAreaAdvocaciaId($this->getAreaAdvocaciaId());
		$copyObj->setAdvogadoId($this->getAdvogadoId());
		$copyObj->setDescricao($this->getDescricao());
		$copyObj->setDataCriacao($this->getDataCriacao());
		$copyObj->setDataAtendimento($this->getDataAtendimento());
		$copyObj->setLongitude($this->getLongitude());
		$copyObj->setLatitude($this->getLatitude());
		$copyObj->setRaio($this->getRaio());
		$copyObj->setAtendida($this->getAtendida());
		$copyObj->setAtiva($this->getAtiva());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getCasos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCaso($relObj->copy($deepCopy));
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
	 * @return     Solicitacao Clone of current object.
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
	 * @return     SolicitacaoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SolicitacaoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Advogado object.
	 *
	 * @param      Advogado $v
	 * @return     Solicitacao The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setAdvogado(Advogado $v = null)
	{
		if ($v === null) {
			$this->setAdvogadoId(NULL);
		} else {
			$this->setAdvogadoId($v->getId());
		}

		$this->aAdvogado = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Advogado object, it will not be re-added.
		if ($v !== null) {
			$v->addSolicitacao($this);
		}

		return $this;
	}


	/**
	 * Get the associated Advogado object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Advogado The associated Advogado object.
	 * @throws     PropelException
	 */
	public function getAdvogado(PropelPDO $con = null)
	{
		if ($this->aAdvogado === null && ($this->advogado_id !== null)) {
			$this->aAdvogado = AdvogadoQuery::create()->findPk($this->advogado_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aAdvogado->addSolicitacaos($this);
			 */
		}
		return $this->aAdvogado;
	}

	/**
	 * Declares an association between this object and a AreaAdvocacia object.
	 *
	 * @param      AreaAdvocacia $v
	 * @return     Solicitacao The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setAreaAdvocacia(AreaAdvocacia $v = null)
	{
		if ($v === null) {
			$this->setAreaAdvocaciaId(NULL);
		} else {
			$this->setAreaAdvocaciaId($v->getId());
		}

		$this->aAreaAdvocacia = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the AreaAdvocacia object, it will not be re-added.
		if ($v !== null) {
			$v->addSolicitacao($this);
		}

		return $this;
	}


	/**
	 * Get the associated AreaAdvocacia object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     AreaAdvocacia The associated AreaAdvocacia object.
	 * @throws     PropelException
	 */
	public function getAreaAdvocacia(PropelPDO $con = null)
	{
		if ($this->aAreaAdvocacia === null && ($this->area_advocacia_id !== null)) {
			$this->aAreaAdvocacia = AreaAdvocaciaQuery::create()->findPk($this->area_advocacia_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aAreaAdvocacia->addSolicitacaos($this);
			 */
		}
		return $this->aAreaAdvocacia;
	}

	/**
	 * Declares an association between this object and a Cliente object.
	 *
	 * @param      Cliente $v
	 * @return     Solicitacao The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCliente(Cliente $v = null)
	{
		if ($v === null) {
			$this->setClienteId(NULL);
		} else {
			$this->setClienteId($v->getId());
		}

		$this->aCliente = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Cliente object, it will not be re-added.
		if ($v !== null) {
			$v->addSolicitacao($this);
		}

		return $this;
	}


	/**
	 * Get the associated Cliente object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Cliente The associated Cliente object.
	 * @throws     PropelException
	 */
	public function getCliente(PropelPDO $con = null)
	{
		if ($this->aCliente === null && ($this->cliente_id !== null)) {
			$this->aCliente = ClienteQuery::create()->findPk($this->cliente_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aCliente->addSolicitacaos($this);
			 */
		}
		return $this->aCliente;
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
		if ('Caso' == $relationName) {
			return $this->initCasos();
		}
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
	 * If this Solicitacao is new, it will return
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
					->filterBySolicitacao($this)
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
				$caso->setSolicitacao($this);
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
					->filterBySolicitacao($this)
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
	 * @return     Solicitacao The current object (for fluent API support)
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
		$caso->setSolicitacao($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Solicitacao is new, it will return
	 * an empty collection; or if this Solicitacao has previously
	 * been saved, it will retrieve related Casos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Solicitacao.
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
	 * Otherwise if this Solicitacao is new, it will return
	 * an empty collection; or if this Solicitacao has previously
	 * been saved, it will retrieve related Casos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Solicitacao.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Caso[] List of Caso objects
	 */
	public function getCasosJoinAreaAdvocacia($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CasoQuery::create(null, $criteria);
		$query->joinWith('AreaAdvocacia', $join_behavior);

		return $this->getCasos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Solicitacao is new, it will return
	 * an empty collection; or if this Solicitacao has previously
	 * been saved, it will retrieve related Casos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Solicitacao.
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
	 * Otherwise if this Solicitacao is new, it will return
	 * an empty collection; or if this Solicitacao has previously
	 * been saved, it will retrieve related Casos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Solicitacao.
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
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->cliente_id = null;
		$this->area_advocacia_id = null;
		$this->advogado_id = null;
		$this->descricao = null;
		$this->data_criacao = null;
		$this->data_atendimento = null;
		$this->longitude = null;
		$this->latitude = null;
		$this->raio = null;
		$this->atendida = null;
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
			if ($this->collCasos) {
				foreach ($this->collCasos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collCasos instanceof PropelCollection) {
			$this->collCasos->clearIterator();
		}
		$this->collCasos = null;
		$this->aAdvogado = null;
		$this->aAreaAdvocacia = null;
		$this->aCliente = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(SolicitacaoPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseSolicitacao
