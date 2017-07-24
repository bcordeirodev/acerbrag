<?php


/**
 * Base class that represents a row from the 'caso' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseCaso extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'CasoPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        CasoPeer
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
	 * The value for the advogado_id field.
	 * @var        int
	 */
	protected $advogado_id;

	/**
	 * The value for the area_advocacia_id field.
	 * @var        int
	 */
	protected $area_advocacia_id;

	/**
	 * The value for the uf_id field.
	 * @var        int
	 */
	protected $uf_id;

	/**
	 * The value for the contrato_id field.
	 * @var        int
	 */
	protected $contrato_id;

	/**
	 * The value for the cliente_id field.
	 * @var        int
	 */
	protected $cliente_id;

	/**
	 * The value for the solicitacao_id field.
	 * @var        int
	 */
	protected $solicitacao_id;

	/**
	 * The value for the nome_caso field.
	 * @var        string
	 */
	protected $nome_caso;

	/**
	 * The value for the objetivo_final field.
	 * @var        string
	 */
	protected $objetivo_final;

	/**
	 * The value for the descricao field.
	 * @var        string
	 */
	protected $descricao;

	/**
	 * The value for the data_abertura field.
	 * @var        string
	 */
	protected $data_abertura;

	/**
	 * The value for the data_fechamento field.
	 * @var        string
	 */
	protected $data_fechamento;

	/**
	 * The value for the ativo field.
	 * Note: this column has a database default value of: true
	 * @var        boolean
	 */
	protected $ativo;

	/**
	 * The value for the situacao_cliente field.
	 * @var        string
	 */
	protected $situacao_cliente;

	/**
	 * The value for the analise_risco field.
	 * @var        string
	 */
	protected $analise_risco;

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
	 * @var        Contrato
	 */
	protected $aContrato;

	/**
	 * @var        Solicitacao
	 */
	protected $aSolicitacao;

	/**
	 * @var        array AnotacaoCaso[] Collection to store aggregation of AnotacaoCaso objects.
	 */
	protected $collAnotacaoCasos;

	/**
	 * @var        array CasoProcesso[] Collection to store aggregation of CasoProcesso objects.
	 */
	protected $collCasoProcessos;

	/**
	 * @var        array Processo[] Collection to store aggregation of Processo objects.
	 */
	protected $collProcessos;

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
	protected $processosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $anotacaoCasosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $casoProcessosScheduledForDeletion = null;

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
	 * Initializes internal state of BaseCaso object.
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
	 * Get the [advogado_id] column value.
	 * 
	 * @return     int
	 */
	public function getAdvogadoId()
	{
		return $this->advogado_id;
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
	 * Get the [uf_id] column value.
	 * 
	 * @return     int
	 */
	public function getUfId()
	{
		return $this->uf_id;
	}

	/**
	 * Get the [contrato_id] column value.
	 * 
	 * @return     int
	 */
	public function getContratoId()
	{
		return $this->contrato_id;
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
	 * Get the [solicitacao_id] column value.
	 * 
	 * @return     int
	 */
	public function getSolicitacaoId()
	{
		return $this->solicitacao_id;
	}

	/**
	 * Get the [nome_caso] column value.
	 * 
	 * @return     string
	 */
	public function getNomeCaso()
	{
		return $this->nome_caso;
	}

	/**
	 * Get the [objetivo_final] column value.
	 * 
	 * @return     string
	 */
	public function getObjetivoFinal()
	{
		return $this->objetivo_final;
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
	 * Get the [optionally formatted] temporal [data_abertura] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataAbertura($format = 'Y-m-d H:i:s')
	{
		if ($this->data_abertura === null) {
			return null;
		}


		if ($this->data_abertura === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_abertura);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_abertura, true), $x);
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
	 * Get the [optionally formatted] temporal [data_fechamento] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataFechamento($format = 'Y-m-d H:i:s')
	{
		if ($this->data_fechamento === null) {
			return null;
		}


		if ($this->data_fechamento === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_fechamento);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_fechamento, true), $x);
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
	 * Get the [situacao_cliente] column value.
	 * 
	 * @return     string
	 */
	public function getSituacaoCliente()
	{
		return $this->situacao_cliente;
	}

	/**
	 * Get the [analise_risco] column value.
	 * 
	 * @return     string
	 */
	public function getAnaliseRisco()
	{
		return $this->analise_risco;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Caso The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CasoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [advogado_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Caso The current object (for fluent API support)
	 */
	public function setAdvogadoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->advogado_id !== $v) {
			$this->advogado_id = $v;
			$this->modifiedColumns[] = CasoPeer::ADVOGADO_ID;
		}

		if ($this->aAdvogado !== null && $this->aAdvogado->getId() !== $v) {
			$this->aAdvogado = null;
		}

		return $this;
	} // setAdvogadoId()

	/**
	 * Set the value of [area_advocacia_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Caso The current object (for fluent API support)
	 */
	public function setAreaAdvocaciaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->area_advocacia_id !== $v) {
			$this->area_advocacia_id = $v;
			$this->modifiedColumns[] = CasoPeer::AREA_ADVOCACIA_ID;
		}

		if ($this->aAreaAdvocacia !== null && $this->aAreaAdvocacia->getId() !== $v) {
			$this->aAreaAdvocacia = null;
		}

		return $this;
	} // setAreaAdvocaciaId()

	/**
	 * Set the value of [uf_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Caso The current object (for fluent API support)
	 */
	public function setUfId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->uf_id !== $v) {
			$this->uf_id = $v;
			$this->modifiedColumns[] = CasoPeer::UF_ID;
		}

		return $this;
	} // setUfId()

	/**
	 * Set the value of [contrato_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Caso The current object (for fluent API support)
	 */
	public function setContratoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->contrato_id !== $v) {
			$this->contrato_id = $v;
			$this->modifiedColumns[] = CasoPeer::CONTRATO_ID;
		}

		if ($this->aContrato !== null && $this->aContrato->getId() !== $v) {
			$this->aContrato = null;
		}

		return $this;
	} // setContratoId()

	/**
	 * Set the value of [cliente_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Caso The current object (for fluent API support)
	 */
	public function setClienteId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cliente_id !== $v) {
			$this->cliente_id = $v;
			$this->modifiedColumns[] = CasoPeer::CLIENTE_ID;
		}

		if ($this->aCliente !== null && $this->aCliente->getId() !== $v) {
			$this->aCliente = null;
		}

		return $this;
	} // setClienteId()

	/**
	 * Set the value of [solicitacao_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Caso The current object (for fluent API support)
	 */
	public function setSolicitacaoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->solicitacao_id !== $v) {
			$this->solicitacao_id = $v;
			$this->modifiedColumns[] = CasoPeer::SOLICITACAO_ID;
		}

		if ($this->aSolicitacao !== null && $this->aSolicitacao->getId() !== $v) {
			$this->aSolicitacao = null;
		}

		return $this;
	} // setSolicitacaoId()

	/**
	 * Set the value of [nome_caso] column.
	 * 
	 * @param      string $v new value
	 * @return     Caso The current object (for fluent API support)
	 */
	public function setNomeCaso($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome_caso !== $v) {
			$this->nome_caso = $v;
			$this->modifiedColumns[] = CasoPeer::NOME_CASO;
		}

		return $this;
	} // setNomeCaso()

	/**
	 * Set the value of [objetivo_final] column.
	 * 
	 * @param      string $v new value
	 * @return     Caso The current object (for fluent API support)
	 */
	public function setObjetivoFinal($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->objetivo_final !== $v) {
			$this->objetivo_final = $v;
			$this->modifiedColumns[] = CasoPeer::OBJETIVO_FINAL;
		}

		return $this;
	} // setObjetivoFinal()

	/**
	 * Set the value of [descricao] column.
	 * 
	 * @param      string $v new value
	 * @return     Caso The current object (for fluent API support)
	 */
	public function setDescricao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descricao !== $v) {
			$this->descricao = $v;
			$this->modifiedColumns[] = CasoPeer::DESCRICAO;
		}

		return $this;
	} // setDescricao()

	/**
	 * Sets the value of [data_abertura] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Caso The current object (for fluent API support)
	 */
	public function setDataAbertura($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_abertura !== null || $dt !== null) {
			$currentDateAsString = ($this->data_abertura !== null && $tmpDt = new DateTime($this->data_abertura)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_abertura = $newDateAsString;
				$this->modifiedColumns[] = CasoPeer::DATA_ABERTURA;
			}
		} // if either are not null

		return $this;
	} // setDataAbertura()

	/**
	 * Sets the value of [data_fechamento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Caso The current object (for fluent API support)
	 */
	public function setDataFechamento($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_fechamento !== null || $dt !== null) {
			$currentDateAsString = ($this->data_fechamento !== null && $tmpDt = new DateTime($this->data_fechamento)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_fechamento = $newDateAsString;
				$this->modifiedColumns[] = CasoPeer::DATA_FECHAMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataFechamento()

	/**
	 * Sets the value of the [ativo] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Caso The current object (for fluent API support)
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
			$this->modifiedColumns[] = CasoPeer::ATIVO;
		}

		return $this;
	} // setAtivo()

	/**
	 * Set the value of [situacao_cliente] column.
	 * 
	 * @param      string $v new value
	 * @return     Caso The current object (for fluent API support)
	 */
	public function setSituacaoCliente($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->situacao_cliente !== $v) {
			$this->situacao_cliente = $v;
			$this->modifiedColumns[] = CasoPeer::SITUACAO_CLIENTE;
		}

		return $this;
	} // setSituacaoCliente()

	/**
	 * Set the value of [analise_risco] column.
	 * 
	 * @param      string $v new value
	 * @return     Caso The current object (for fluent API support)
	 */
	public function setAnaliseRisco($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->analise_risco !== $v) {
			$this->analise_risco = $v;
			$this->modifiedColumns[] = CasoPeer::ANALISE_RISCO;
		}

		return $this;
	} // setAnaliseRisco()

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
			$this->advogado_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->area_advocacia_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->uf_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->contrato_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->cliente_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->solicitacao_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->nome_caso = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->objetivo_final = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->descricao = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->data_abertura = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->data_fechamento = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->ativo = ($row[$startcol + 12] !== null) ? (boolean) $row[$startcol + 12] : null;
			$this->situacao_cliente = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->analise_risco = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 15; // 15 = CasoPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Caso object", $e);
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

		if ($this->aAdvogado !== null && $this->advogado_id !== $this->aAdvogado->getId()) {
			$this->aAdvogado = null;
		}
		if ($this->aAreaAdvocacia !== null && $this->area_advocacia_id !== $this->aAreaAdvocacia->getId()) {
			$this->aAreaAdvocacia = null;
		}
		if ($this->aContrato !== null && $this->contrato_id !== $this->aContrato->getId()) {
			$this->aContrato = null;
		}
		if ($this->aCliente !== null && $this->cliente_id !== $this->aCliente->getId()) {
			$this->aCliente = null;
		}
		if ($this->aSolicitacao !== null && $this->solicitacao_id !== $this->aSolicitacao->getId()) {
			$this->aSolicitacao = null;
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
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = CasoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
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
			$this->aContrato = null;
			$this->aSolicitacao = null;
			$this->collAnotacaoCasos = null;

			$this->collCasoProcessos = null;

			$this->collProcessos = null;
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
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = CasoQuery::create()
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
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				CasoPeer::addInstanceToPool($this);
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

			if ($this->aContrato !== null) {
				if ($this->aContrato->isModified() || $this->aContrato->isNew()) {
					$affectedRows += $this->aContrato->save($con);
				}
				$this->setContrato($this->aContrato);
			}

			if ($this->aSolicitacao !== null) {
				if ($this->aSolicitacao->isModified() || $this->aSolicitacao->isNew()) {
					$affectedRows += $this->aSolicitacao->save($con);
				}
				$this->setSolicitacao($this->aSolicitacao);
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

			if ($this->processosScheduledForDeletion !== null) {
				if (!$this->processosScheduledForDeletion->isEmpty()) {
					CasoProcessoQuery::create()
						->filterByPrimaryKeys($this->processosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->processosScheduledForDeletion = null;
				}

				foreach ($this->getProcessos() as $processo) {
					if ($processo->isModified()) {
						$processo->save($con);
					}
				}
			}

			if ($this->anotacaoCasosScheduledForDeletion !== null) {
				if (!$this->anotacaoCasosScheduledForDeletion->isEmpty()) {
					AnotacaoCasoQuery::create()
						->filterByPrimaryKeys($this->anotacaoCasosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->anotacaoCasosScheduledForDeletion = null;
				}
			}

			if ($this->collAnotacaoCasos !== null) {
				foreach ($this->collAnotacaoCasos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->casoProcessosScheduledForDeletion !== null) {
				if (!$this->casoProcessosScheduledForDeletion->isEmpty()) {
					CasoProcessoQuery::create()
						->filterByPrimaryKeys($this->casoProcessosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->casoProcessosScheduledForDeletion = null;
				}
			}

			if ($this->collCasoProcessos !== null) {
				foreach ($this->collCasoProcessos as $referrerFK) {
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

		$this->modifiedColumns[] = CasoPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . CasoPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(CasoPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(CasoPeer::ADVOGADO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ADVOGADO_ID`';
		}
		if ($this->isColumnModified(CasoPeer::AREA_ADVOCACIA_ID)) {
			$modifiedColumns[':p' . $index++]  = '`AREA_ADVOCACIA_ID`';
		}
		if ($this->isColumnModified(CasoPeer::UF_ID)) {
			$modifiedColumns[':p' . $index++]  = '`UF_ID`';
		}
		if ($this->isColumnModified(CasoPeer::CONTRATO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`CONTRATO_ID`';
		}
		if ($this->isColumnModified(CasoPeer::CLIENTE_ID)) {
			$modifiedColumns[':p' . $index++]  = '`CLIENTE_ID`';
		}
		if ($this->isColumnModified(CasoPeer::SOLICITACAO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`SOLICITACAO_ID`';
		}
		if ($this->isColumnModified(CasoPeer::NOME_CASO)) {
			$modifiedColumns[':p' . $index++]  = '`NOME_CASO`';
		}
		if ($this->isColumnModified(CasoPeer::OBJETIVO_FINAL)) {
			$modifiedColumns[':p' . $index++]  = '`OBJETIVO_FINAL`';
		}
		if ($this->isColumnModified(CasoPeer::DESCRICAO)) {
			$modifiedColumns[':p' . $index++]  = '`DESCRICAO`';
		}
		if ($this->isColumnModified(CasoPeer::DATA_ABERTURA)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_ABERTURA`';
		}
		if ($this->isColumnModified(CasoPeer::DATA_FECHAMENTO)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_FECHAMENTO`';
		}
		if ($this->isColumnModified(CasoPeer::ATIVO)) {
			$modifiedColumns[':p' . $index++]  = '`ATIVO`';
		}
		if ($this->isColumnModified(CasoPeer::SITUACAO_CLIENTE)) {
			$modifiedColumns[':p' . $index++]  = '`SITUACAO_CLIENTE`';
		}
		if ($this->isColumnModified(CasoPeer::ANALISE_RISCO)) {
			$modifiedColumns[':p' . $index++]  = '`ANALISE_RISCO`';
		}

		$sql = sprintf(
			'INSERT INTO `caso` (%s) VALUES (%s)',
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
					case '`ADVOGADO_ID`':						
						$stmt->bindValue($identifier, $this->advogado_id, PDO::PARAM_INT);
						break;
					case '`AREA_ADVOCACIA_ID`':						
						$stmt->bindValue($identifier, $this->area_advocacia_id, PDO::PARAM_INT);
						break;
					case '`UF_ID`':						
						$stmt->bindValue($identifier, $this->uf_id, PDO::PARAM_INT);
						break;
					case '`CONTRATO_ID`':						
						$stmt->bindValue($identifier, $this->contrato_id, PDO::PARAM_INT);
						break;
					case '`CLIENTE_ID`':						
						$stmt->bindValue($identifier, $this->cliente_id, PDO::PARAM_INT);
						break;
					case '`SOLICITACAO_ID`':						
						$stmt->bindValue($identifier, $this->solicitacao_id, PDO::PARAM_INT);
						break;
					case '`NOME_CASO`':						
						$stmt->bindValue($identifier, $this->nome_caso, PDO::PARAM_STR);
						break;
					case '`OBJETIVO_FINAL`':						
						$stmt->bindValue($identifier, $this->objetivo_final, PDO::PARAM_STR);
						break;
					case '`DESCRICAO`':						
						$stmt->bindValue($identifier, $this->descricao, PDO::PARAM_STR);
						break;
					case '`DATA_ABERTURA`':						
						$stmt->bindValue($identifier, $this->data_abertura, PDO::PARAM_STR);
						break;
					case '`DATA_FECHAMENTO`':						
						$stmt->bindValue($identifier, $this->data_fechamento, PDO::PARAM_STR);
						break;
					case '`ATIVO`':
						$stmt->bindValue($identifier, (int) $this->ativo, PDO::PARAM_INT);
						break;
					case '`SITUACAO_CLIENTE`':						
						$stmt->bindValue($identifier, $this->situacao_cliente, PDO::PARAM_STR);
						break;
					case '`ANALISE_RISCO`':						
						$stmt->bindValue($identifier, $this->analise_risco, PDO::PARAM_STR);
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
		$pos = CasoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getAdvogadoId();
				break;
			case 2:
				return $this->getAreaAdvocaciaId();
				break;
			case 3:
				return $this->getUfId();
				break;
			case 4:
				return $this->getContratoId();
				break;
			case 5:
				return $this->getClienteId();
				break;
			case 6:
				return $this->getSolicitacaoId();
				break;
			case 7:
				return $this->getNomeCaso();
				break;
			case 8:
				return $this->getObjetivoFinal();
				break;
			case 9:
				return $this->getDescricao();
				break;
			case 10:
				return $this->getDataAbertura();
				break;
			case 11:
				return $this->getDataFechamento();
				break;
			case 12:
				return $this->getAtivo();
				break;
			case 13:
				return $this->getSituacaoCliente();
				break;
			case 14:
				return $this->getAnaliseRisco();
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
		if (isset($alreadyDumpedObjects['Caso'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Caso'][$this->getPrimaryKey()] = true;
		$keys = CasoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getAdvogadoId(),
			$keys[2] => $this->getAreaAdvocaciaId(),
			$keys[3] => $this->getUfId(),
			$keys[4] => $this->getContratoId(),
			$keys[5] => $this->getClienteId(),
			$keys[6] => $this->getSolicitacaoId(),
			$keys[7] => $this->getNomeCaso(),
			$keys[8] => $this->getObjetivoFinal(),
			$keys[9] => $this->getDescricao(),
			$keys[10] => $this->getDataAbertura(),
			$keys[11] => $this->getDataFechamento(),
			$keys[12] => $this->getAtivo(),
			$keys[13] => $this->getSituacaoCliente(),
			$keys[14] => $this->getAnaliseRisco(),
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
			if (null !== $this->aContrato) {
				$result['Contrato'] = $this->aContrato->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aSolicitacao) {
				$result['Solicitacao'] = $this->aSolicitacao->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collAnotacaoCasos) {
				$result['AnotacaoCasos'] = $this->collAnotacaoCasos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collCasoProcessos) {
				$result['CasoProcessos'] = $this->collCasoProcessos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = CasoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setAdvogadoId($value);
				break;
			case 2:
				$this->setAreaAdvocaciaId($value);
				break;
			case 3:
				$this->setUfId($value);
				break;
			case 4:
				$this->setContratoId($value);
				break;
			case 5:
				$this->setClienteId($value);
				break;
			case 6:
				$this->setSolicitacaoId($value);
				break;
			case 7:
				$this->setNomeCaso($value);
				break;
			case 8:
				$this->setObjetivoFinal($value);
				break;
			case 9:
				$this->setDescricao($value);
				break;
			case 10:
				$this->setDataAbertura($value);
				break;
			case 11:
				$this->setDataFechamento($value);
				break;
			case 12:
				$this->setAtivo($value);
				break;
			case 13:
				$this->setSituacaoCliente($value);
				break;
			case 14:
				$this->setAnaliseRisco($value);
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
		$keys = CasoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAdvogadoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAreaAdvocaciaId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUfId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setContratoId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setClienteId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSolicitacaoId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setNomeCaso($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setObjetivoFinal($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDescricao($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDataAbertura($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDataFechamento($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setAtivo($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setSituacaoCliente($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setAnaliseRisco($arr[$keys[14]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(CasoPeer::DATABASE_NAME);

		if ($this->isColumnModified(CasoPeer::ID)) $criteria->add(CasoPeer::ID, $this->id);
		if ($this->isColumnModified(CasoPeer::ADVOGADO_ID)) $criteria->add(CasoPeer::ADVOGADO_ID, $this->advogado_id);
		if ($this->isColumnModified(CasoPeer::AREA_ADVOCACIA_ID)) $criteria->add(CasoPeer::AREA_ADVOCACIA_ID, $this->area_advocacia_id);
		if ($this->isColumnModified(CasoPeer::UF_ID)) $criteria->add(CasoPeer::UF_ID, $this->uf_id);
		if ($this->isColumnModified(CasoPeer::CONTRATO_ID)) $criteria->add(CasoPeer::CONTRATO_ID, $this->contrato_id);
		if ($this->isColumnModified(CasoPeer::CLIENTE_ID)) $criteria->add(CasoPeer::CLIENTE_ID, $this->cliente_id);
		if ($this->isColumnModified(CasoPeer::SOLICITACAO_ID)) $criteria->add(CasoPeer::SOLICITACAO_ID, $this->solicitacao_id);
		if ($this->isColumnModified(CasoPeer::NOME_CASO)) $criteria->add(CasoPeer::NOME_CASO, $this->nome_caso);
		if ($this->isColumnModified(CasoPeer::OBJETIVO_FINAL)) $criteria->add(CasoPeer::OBJETIVO_FINAL, $this->objetivo_final);
		if ($this->isColumnModified(CasoPeer::DESCRICAO)) $criteria->add(CasoPeer::DESCRICAO, $this->descricao);
		if ($this->isColumnModified(CasoPeer::DATA_ABERTURA)) $criteria->add(CasoPeer::DATA_ABERTURA, $this->data_abertura);
		if ($this->isColumnModified(CasoPeer::DATA_FECHAMENTO)) $criteria->add(CasoPeer::DATA_FECHAMENTO, $this->data_fechamento);
		if ($this->isColumnModified(CasoPeer::ATIVO)) $criteria->add(CasoPeer::ATIVO, $this->ativo);
		if ($this->isColumnModified(CasoPeer::SITUACAO_CLIENTE)) $criteria->add(CasoPeer::SITUACAO_CLIENTE, $this->situacao_cliente);
		if ($this->isColumnModified(CasoPeer::ANALISE_RISCO)) $criteria->add(CasoPeer::ANALISE_RISCO, $this->analise_risco);

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
		$criteria = new Criteria(CasoPeer::DATABASE_NAME);
		$criteria->add(CasoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Caso (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setAdvogadoId($this->getAdvogadoId());
		$copyObj->setAreaAdvocaciaId($this->getAreaAdvocaciaId());
		$copyObj->setUfId($this->getUfId());
		$copyObj->setContratoId($this->getContratoId());
		$copyObj->setClienteId($this->getClienteId());
		$copyObj->setSolicitacaoId($this->getSolicitacaoId());
		$copyObj->setNomeCaso($this->getNomeCaso());
		$copyObj->setObjetivoFinal($this->getObjetivoFinal());
		$copyObj->setDescricao($this->getDescricao());
		$copyObj->setDataAbertura($this->getDataAbertura());
		$copyObj->setDataFechamento($this->getDataFechamento());
		$copyObj->setAtivo($this->getAtivo());
		$copyObj->setSituacaoCliente($this->getSituacaoCliente());
		$copyObj->setAnaliseRisco($this->getAnaliseRisco());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getAnotacaoCasos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAnotacaoCaso($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCasoProcessos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCasoProcesso($relObj->copy($deepCopy));
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
	 * @return     Caso Clone of current object.
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
	 * @return     CasoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CasoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Advogado object.
	 *
	 * @param      Advogado $v
	 * @return     Caso The current object (for fluent API support)
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
			$v->addCaso($this);
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
				$this->aAdvogado->addCasos($this);
			 */
		}
		return $this->aAdvogado;
	}

	/**
	 * Declares an association between this object and a AreaAdvocacia object.
	 *
	 * @param      AreaAdvocacia $v
	 * @return     Caso The current object (for fluent API support)
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
			$v->addCaso($this);
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
				$this->aAreaAdvocacia->addCasos($this);
			 */
		}
		return $this->aAreaAdvocacia;
	}

	/**
	 * Declares an association between this object and a Cliente object.
	 *
	 * @param      Cliente $v
	 * @return     Caso The current object (for fluent API support)
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
			$v->addCaso($this);
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
				$this->aCliente->addCasos($this);
			 */
		}
		return $this->aCliente;
	}

	/**
	 * Declares an association between this object and a Contrato object.
	 *
	 * @param      Contrato $v
	 * @return     Caso The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setContrato(Contrato $v = null)
	{
		if ($v === null) {
			$this->setContratoId(NULL);
		} else {
			$this->setContratoId($v->getId());
		}

		$this->aContrato = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Contrato object, it will not be re-added.
		if ($v !== null) {
			$v->addCaso($this);
		}

		return $this;
	}


	/**
	 * Get the associated Contrato object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Contrato The associated Contrato object.
	 * @throws     PropelException
	 */
	public function getContrato(PropelPDO $con = null)
	{
		if ($this->aContrato === null && ($this->contrato_id !== null)) {
			$this->aContrato = ContratoQuery::create()->findPk($this->contrato_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aContrato->addCasos($this);
			 */
		}
		return $this->aContrato;
	}

	/**
	 * Declares an association between this object and a Solicitacao object.
	 *
	 * @param      Solicitacao $v
	 * @return     Caso The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSolicitacao(Solicitacao $v = null)
	{
		if ($v === null) {
			$this->setSolicitacaoId(NULL);
		} else {
			$this->setSolicitacaoId($v->getId());
		}

		$this->aSolicitacao = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Solicitacao object, it will not be re-added.
		if ($v !== null) {
			$v->addCaso($this);
		}

		return $this;
	}


	/**
	 * Get the associated Solicitacao object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Solicitacao The associated Solicitacao object.
	 * @throws     PropelException
	 */
	public function getSolicitacao(PropelPDO $con = null)
	{
		if ($this->aSolicitacao === null && ($this->solicitacao_id !== null)) {
			$this->aSolicitacao = SolicitacaoQuery::create()->findPk($this->solicitacao_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aSolicitacao->addCasos($this);
			 */
		}
		return $this->aSolicitacao;
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
		if ('AnotacaoCaso' == $relationName) {
			return $this->initAnotacaoCasos();
		}
		if ('CasoProcesso' == $relationName) {
			return $this->initCasoProcessos();
		}
	}

	/**
	 * Clears out the collAnotacaoCasos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAnotacaoCasos()
	 */
	public function clearAnotacaoCasos()
	{
		$this->collAnotacaoCasos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAnotacaoCasos collection.
	 *
	 * By default this just sets the collAnotacaoCasos collection to an empty array (like clearcollAnotacaoCasos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initAnotacaoCasos($overrideExisting = true)
	{
		if (null !== $this->collAnotacaoCasos && !$overrideExisting) {
			return;
		}
		$this->collAnotacaoCasos = new PropelObjectCollection();
		$this->collAnotacaoCasos->setModel('AnotacaoCaso');
	}

	/**
	 * Gets an array of AnotacaoCaso objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Caso is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AnotacaoCaso[] List of AnotacaoCaso objects
	 * @throws     PropelException
	 */
	public function getAnotacaoCasos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAnotacaoCasos || null !== $criteria) {
			if ($this->isNew() && null === $this->collAnotacaoCasos) {
				// return empty collection
				$this->initAnotacaoCasos();
			} else {
				$collAnotacaoCasos = AnotacaoCasoQuery::create(null, $criteria)
					->filterByCaso($this)
					->find($con);
				if (null !== $criteria) {
					return $collAnotacaoCasos;
				}
				$this->collAnotacaoCasos = $collAnotacaoCasos;
			}
		}
		return $this->collAnotacaoCasos;
	}

	/**
	 * Sets a collection of AnotacaoCaso objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $anotacaoCasos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setAnotacaoCasos(PropelCollection $anotacaoCasos, PropelPDO $con = null)
	{
		$this->anotacaoCasosScheduledForDeletion = $this->getAnotacaoCasos(new Criteria(), $con)->diff($anotacaoCasos);

		foreach ($anotacaoCasos as $anotacaoCaso) {
			// Fix issue with collection modified by reference
			if ($anotacaoCaso->isNew()) {
				$anotacaoCaso->setCaso($this);
			}
			$this->addAnotacaoCaso($anotacaoCaso);
		}

		$this->collAnotacaoCasos = $anotacaoCasos;
	}

	/**
	 * Returns the number of related AnotacaoCaso objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AnotacaoCaso objects.
	 * @throws     PropelException
	 */
	public function countAnotacaoCasos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAnotacaoCasos || null !== $criteria) {
			if ($this->isNew() && null === $this->collAnotacaoCasos) {
				return 0;
			} else {
				$query = AnotacaoCasoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCaso($this)
					->count($con);
			}
		} else {
			return count($this->collAnotacaoCasos);
		}
	}

	/**
	 * Method called to associate a AnotacaoCaso object to this object
	 * through the AnotacaoCaso foreign key attribute.
	 *
	 * @param      AnotacaoCaso $l AnotacaoCaso
	 * @return     Caso The current object (for fluent API support)
	 */
	public function addAnotacaoCaso(AnotacaoCaso $l)
	{
		if ($this->collAnotacaoCasos === null) {
			$this->initAnotacaoCasos();
		}
		if (!$this->collAnotacaoCasos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddAnotacaoCaso($l);
		}

		return $this;
	}

	/**
	 * @param	AnotacaoCaso $anotacaoCaso The anotacaoCaso object to add.
	 */
	protected function doAddAnotacaoCaso($anotacaoCaso)
	{
		$this->collAnotacaoCasos[]= $anotacaoCaso;
		$anotacaoCaso->setCaso($this);
	}

	/**
	 * Clears out the collCasoProcessos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCasoProcessos()
	 */
	public function clearCasoProcessos()
	{
		$this->collCasoProcessos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCasoProcessos collection.
	 *
	 * By default this just sets the collCasoProcessos collection to an empty array (like clearcollCasoProcessos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initCasoProcessos($overrideExisting = true)
	{
		if (null !== $this->collCasoProcessos && !$overrideExisting) {
			return;
		}
		$this->collCasoProcessos = new PropelObjectCollection();
		$this->collCasoProcessos->setModel('CasoProcesso');
	}

	/**
	 * Gets an array of CasoProcesso objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Caso is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array CasoProcesso[] List of CasoProcesso objects
	 * @throws     PropelException
	 */
	public function getCasoProcessos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCasoProcessos || null !== $criteria) {
			if ($this->isNew() && null === $this->collCasoProcessos) {
				// return empty collection
				$this->initCasoProcessos();
			} else {
				$collCasoProcessos = CasoProcessoQuery::create(null, $criteria)
					->filterByCaso($this)
					->find($con);
				if (null !== $criteria) {
					return $collCasoProcessos;
				}
				$this->collCasoProcessos = $collCasoProcessos;
			}
		}
		return $this->collCasoProcessos;
	}

	/**
	 * Sets a collection of CasoProcesso objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $casoProcessos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setCasoProcessos(PropelCollection $casoProcessos, PropelPDO $con = null)
	{
		$this->casoProcessosScheduledForDeletion = $this->getCasoProcessos(new Criteria(), $con)->diff($casoProcessos);

		foreach ($casoProcessos as $casoProcesso) {
			// Fix issue with collection modified by reference
			if ($casoProcesso->isNew()) {
				$casoProcesso->setCaso($this);
			}
			$this->addCasoProcesso($casoProcesso);
		}

		$this->collCasoProcessos = $casoProcessos;
	}

	/**
	 * Returns the number of related CasoProcesso objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CasoProcesso objects.
	 * @throws     PropelException
	 */
	public function countCasoProcessos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCasoProcessos || null !== $criteria) {
			if ($this->isNew() && null === $this->collCasoProcessos) {
				return 0;
			} else {
				$query = CasoProcessoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCaso($this)
					->count($con);
			}
		} else {
			return count($this->collCasoProcessos);
		}
	}

	/**
	 * Method called to associate a CasoProcesso object to this object
	 * through the CasoProcesso foreign key attribute.
	 *
	 * @param      CasoProcesso $l CasoProcesso
	 * @return     Caso The current object (for fluent API support)
	 */
	public function addCasoProcesso(CasoProcesso $l)
	{
		if ($this->collCasoProcessos === null) {
			$this->initCasoProcessos();
		}
		if (!$this->collCasoProcessos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddCasoProcesso($l);
		}

		return $this;
	}

	/**
	 * @param	CasoProcesso $casoProcesso The casoProcesso object to add.
	 */
	protected function doAddCasoProcesso($casoProcesso)
	{
		$this->collCasoProcessos[]= $casoProcesso;
		$casoProcesso->setCaso($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Caso is new, it will return
	 * an empty collection; or if this Caso has previously
	 * been saved, it will retrieve related CasoProcessos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Caso.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array CasoProcesso[] List of CasoProcesso objects
	 */
	public function getCasoProcessosJoinProcesso($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CasoProcessoQuery::create(null, $criteria);
		$query->joinWith('Processo', $join_behavior);

		return $this->getCasoProcessos($query, $con);
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
	 * By default this just sets the collProcessos collection to an empty collection (like clearProcessos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initProcessos()
	{
		$this->collProcessos = new PropelObjectCollection();
		$this->collProcessos->setModel('Processo');
	}

	/**
	 * Gets a collection of Processo objects related by a many-to-many relationship
	 * to the current object by way of the caso_processo cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Caso is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Processo[] List of Processo objects
	 */
	public function getProcessos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collProcessos || null !== $criteria) {
			if ($this->isNew() && null === $this->collProcessos) {
				// return empty collection
				$this->initProcessos();
			} else {
				$collProcessos = ProcessoQuery::create(null, $criteria)
					->filterByCaso($this)
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
	 * Sets a collection of Processo objects related by a many-to-many relationship
	 * to the current object by way of the caso_processo cross-reference table.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $processos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setProcessos(PropelCollection $processos, PropelPDO $con = null)
	{
		$casoProcessos = CasoProcessoQuery::create()
			->filterByProcesso($processos)
			->filterByCaso($this)
			->find($con);

		$this->processosScheduledForDeletion = $this->getCasoProcessos()->diff($casoProcessos);
		$this->collCasoProcessos = $casoProcessos;

		foreach ($processos as $processo) {
			// Fix issue with collection modified by reference
			if ($processo->isNew()) {
				$this->doAddProcesso($processo);
			} else {
				$this->addProcesso($processo);
			}
		}

		$this->collProcessos = $processos;
	}

	/**
	 * Gets the number of Processo objects related by a many-to-many relationship
	 * to the current object by way of the caso_processo cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Processo objects
	 */
	public function countProcessos($criteria = null, $distinct = false, PropelPDO $con = null)
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
					->filterByCaso($this)
					->count($con);
			}
		} else {
			return count($this->collProcessos);
		}
	}

	/**
	 * Associate a Processo object to this object
	 * through the caso_processo cross reference table.
	 *
	 * @param      Processo $processo The CasoProcesso object to relate
	 * @return     void
	 */
	public function addProcesso(Processo $processo)
	{
		if ($this->collProcessos === null) {
			$this->initProcessos();
		}
		if (!$this->collProcessos->contains($processo)) { // only add it if the **same** object is not already associated
			$this->doAddProcesso($processo);

			$this->collProcessos[]= $processo;
		}
	}

	/**
	 * @param	Processo $processo The processo object to add.
	 */
	protected function doAddProcesso($processo)
	{
		$casoProcesso = new CasoProcesso();
		$casoProcesso->setProcesso($processo);
		$this->addCasoProcesso($casoProcesso);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->advogado_id = null;
		$this->area_advocacia_id = null;
		$this->uf_id = null;
		$this->contrato_id = null;
		$this->cliente_id = null;
		$this->solicitacao_id = null;
		$this->nome_caso = null;
		$this->objetivo_final = null;
		$this->descricao = null;
		$this->data_abertura = null;
		$this->data_fechamento = null;
		$this->ativo = null;
		$this->situacao_cliente = null;
		$this->analise_risco = null;
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
			if ($this->collAnotacaoCasos) {
				foreach ($this->collAnotacaoCasos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCasoProcessos) {
				foreach ($this->collCasoProcessos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collProcessos) {
				foreach ($this->collProcessos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collAnotacaoCasos instanceof PropelCollection) {
			$this->collAnotacaoCasos->clearIterator();
		}
		$this->collAnotacaoCasos = null;
		if ($this->collCasoProcessos instanceof PropelCollection) {
			$this->collCasoProcessos->clearIterator();
		}
		$this->collCasoProcessos = null;
		if ($this->collProcessos instanceof PropelCollection) {
			$this->collProcessos->clearIterator();
		}
		$this->collProcessos = null;
		$this->aAdvogado = null;
		$this->aAreaAdvocacia = null;
		$this->aCliente = null;
		$this->aContrato = null;
		$this->aSolicitacao = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(CasoPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseCaso
