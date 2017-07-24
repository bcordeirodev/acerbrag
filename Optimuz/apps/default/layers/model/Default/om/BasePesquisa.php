<?php


/**
 * Base class that represents a row from the 'pesquisa' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BasePesquisa extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'PesquisaPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        PesquisaPeer
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
	 * The value for the data_criacao field.
	 * @var        string
	 */
	protected $data_criacao;

	/**
	 * The value for the data_inicio field.
	 * @var        string
	 */
	protected $data_inicio;

	/**
	 * The value for the data_fim field.
	 * @var        string
	 */
	protected $data_fim;

	/**
	 * The value for the ativo field.
	 * Note: this column has a database default value of: true
	 * @var        boolean
	 */
	protected $ativo;

	/**
	 * The value for the publicada field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $publicada;

	/**
	 * The value for the tipo_pesquisa field.
	 * @var        string
	 */
	protected $tipo_pesquisa;

	/**
	 * The value for the anonima field.
	 * @var        boolean
	 */
	protected $anonima;

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
	 * The value for the genero field.
	 * @var        string
	 */
	protected $genero;

	/**
	 * The value for the quantidade_pontos field.
	 * @var        int
	 */
	protected $quantidade_pontos;

	/**
	 * @var        Usuario
	 */
	protected $aUsuario;

	/**
	 * @var        array CargoPesquisa[] Collection to store aggregation of CargoPesquisa objects.
	 */
	protected $collCargoPesquisas;

	/**
	 * @var        array ColetaPesquisa[] Collection to store aggregation of ColetaPesquisa objects.
	 */
	protected $collColetaPesquisas;

	/**
	 * @var        array DepartamentoPesquisa[] Collection to store aggregation of DepartamentoPesquisa objects.
	 */
	protected $collDepartamentoPesquisas;

	/**
	 * @var        array Pergunta[] Collection to store aggregation of Pergunta objects.
	 */
	protected $collPerguntas;

	/**
	 * @var        array PesquisaHabilitada[] Collection to store aggregation of PesquisaHabilitada objects.
	 */
	protected $collPesquisaHabilitadas;

	/**
	 * @var        array Cargo[] Collection to store aggregation of Cargo objects.
	 */
	protected $collCargos;

	/**
	 * @var        array Departamento[] Collection to store aggregation of Departamento objects.
	 */
	protected $collDepartamentos;

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
	protected $cargosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $departamentosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $cargoPesquisasScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $coletaPesquisasScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $departamentoPesquisasScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $perguntasScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $pesquisaHabilitadasScheduledForDeletion = null;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->ativo = true;
		$this->publicada = false;
	}

	/**
	 * Initializes internal state of BasePesquisa object.
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
	 * Get the [optionally formatted] temporal [data_inicio] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataInicio($format = '%x')
	{
		if ($this->data_inicio === null) {
			return null;
		}


		if ($this->data_inicio === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_inicio);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_inicio, true), $x);
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
	 * Get the [optionally formatted] temporal [data_fim] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataFim($format = '%x')
	{
		if ($this->data_fim === null) {
			return null;
		}


		if ($this->data_fim === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_fim);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_fim, true), $x);
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
	 * Get the [publicada] column value.
	 * 
	 * @return     boolean
	 */
	public function getPublicada()
	{
		return $this->publicada;
	}

	/**
	 * Get the [tipo_pesquisa] column value.
	 * 
	 * @return     string
	 */
	public function getTipoPesquisa()
	{
		return $this->tipo_pesquisa;
	}

	/**
	 * Get the [anonima] column value.
	 * 
	 * @return     boolean
	 */
	public function getAnonima()
	{
		return $this->anonima;
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
	 * Get the [genero] column value.
	 * 
	 * @return     string
	 */
	public function getGenero()
	{
		return $this->genero;
	}

	/**
	 * Get the [quantidade_pontos] column value.
	 * 
	 * @return     int
	 */
	public function getQuantidadePontos()
	{
		return $this->quantidade_pontos;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Pesquisa The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PesquisaPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [criador_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Pesquisa The current object (for fluent API support)
	 */
	public function setCriadorId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->criador_id !== $v) {
			$this->criador_id = $v;
			$this->modifiedColumns[] = PesquisaPeer::CRIADOR_ID;
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
	 * @return     Pesquisa The current object (for fluent API support)
	 */
	public function setTitulo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->titulo !== $v) {
			$this->titulo = $v;
			$this->modifiedColumns[] = PesquisaPeer::TITULO;
		}

		return $this;
	} // setTitulo()

	/**
	 * Set the value of [descricao] column.
	 * 
	 * @param      string $v new value
	 * @return     Pesquisa The current object (for fluent API support)
	 */
	public function setDescricao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descricao !== $v) {
			$this->descricao = $v;
			$this->modifiedColumns[] = PesquisaPeer::DESCRICAO;
		}

		return $this;
	} // setDescricao()

	/**
	 * Sets the value of [data_criacao] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Pesquisa The current object (for fluent API support)
	 */
	public function setDataCriacao($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_criacao !== null || $dt !== null) {
			$currentDateAsString = ($this->data_criacao !== null && $tmpDt = new DateTime($this->data_criacao)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_criacao = $newDateAsString;
				$this->modifiedColumns[] = PesquisaPeer::DATA_CRIACAO;
			}
		} // if either are not null

		return $this;
	} // setDataCriacao()

	/**
	 * Sets the value of [data_inicio] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Pesquisa The current object (for fluent API support)
	 */
	public function setDataInicio($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_inicio !== null || $dt !== null) {
			$currentDateAsString = ($this->data_inicio !== null && $tmpDt = new DateTime($this->data_inicio)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_inicio = $newDateAsString;
				$this->modifiedColumns[] = PesquisaPeer::DATA_INICIO;
			}
		} // if either are not null

		return $this;
	} // setDataInicio()

	/**
	 * Sets the value of [data_fim] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Pesquisa The current object (for fluent API support)
	 */
	public function setDataFim($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_fim !== null || $dt !== null) {
			$currentDateAsString = ($this->data_fim !== null && $tmpDt = new DateTime($this->data_fim)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_fim = $newDateAsString;
				$this->modifiedColumns[] = PesquisaPeer::DATA_FIM;
			}
		} // if either are not null

		return $this;
	} // setDataFim()

	/**
	 * Sets the value of the [ativo] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Pesquisa The current object (for fluent API support)
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
			$this->modifiedColumns[] = PesquisaPeer::ATIVO;
		}

		return $this;
	} // setAtivo()

	/**
	 * Sets the value of the [publicada] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Pesquisa The current object (for fluent API support)
	 */
	public function setPublicada($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->publicada !== $v) {
			$this->publicada = $v;
			$this->modifiedColumns[] = PesquisaPeer::PUBLICADA;
		}

		return $this;
	} // setPublicada()

	/**
	 * Set the value of [tipo_pesquisa] column.
	 * 
	 * @param      string $v new value
	 * @return     Pesquisa The current object (for fluent API support)
	 */
	public function setTipoPesquisa($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->tipo_pesquisa !== $v) {
			$this->tipo_pesquisa = $v;
			$this->modifiedColumns[] = PesquisaPeer::TIPO_PESQUISA;
		}

		return $this;
	} // setTipoPesquisa()

	/**
	 * Sets the value of the [anonima] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Pesquisa The current object (for fluent API support)
	 */
	public function setAnonima($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->anonima !== $v) {
			$this->anonima = $v;
			$this->modifiedColumns[] = PesquisaPeer::ANONIMA;
		}

		return $this;
	} // setAnonima()

	/**
	 * Set the value of [idade_inicial] column.
	 * 
	 * @param      int $v new value
	 * @return     Pesquisa The current object (for fluent API support)
	 */
	public function setIdadeInicial($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->idade_inicial !== $v) {
			$this->idade_inicial = $v;
			$this->modifiedColumns[] = PesquisaPeer::IDADE_INICIAL;
		}

		return $this;
	} // setIdadeInicial()

	/**
	 * Set the value of [idade_final] column.
	 * 
	 * @param      int $v new value
	 * @return     Pesquisa The current object (for fluent API support)
	 */
	public function setIdadeFinal($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->idade_final !== $v) {
			$this->idade_final = $v;
			$this->modifiedColumns[] = PesquisaPeer::IDADE_FINAL;
		}

		return $this;
	} // setIdadeFinal()

	/**
	 * Set the value of [genero] column.
	 * 
	 * @param      string $v new value
	 * @return     Pesquisa The current object (for fluent API support)
	 */
	public function setGenero($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->genero !== $v) {
			$this->genero = $v;
			$this->modifiedColumns[] = PesquisaPeer::GENERO;
		}

		return $this;
	} // setGenero()

	/**
	 * Set the value of [quantidade_pontos] column.
	 * 
	 * @param      int $v new value
	 * @return     Pesquisa The current object (for fluent API support)
	 */
	public function setQuantidadePontos($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->quantidade_pontos !== $v) {
			$this->quantidade_pontos = $v;
			$this->modifiedColumns[] = PesquisaPeer::QUANTIDADE_PONTOS;
		}

		return $this;
	} // setQuantidadePontos()

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

			if ($this->publicada !== false) {
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
			$this->criador_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->titulo = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->descricao = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->data_criacao = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->data_inicio = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->data_fim = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->ativo = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
			$this->publicada = ($row[$startcol + 8] !== null) ? (boolean) $row[$startcol + 8] : null;
			$this->tipo_pesquisa = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->anonima = ($row[$startcol + 10] !== null) ? (boolean) $row[$startcol + 10] : null;
			$this->idade_inicial = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->idade_final = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->genero = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->quantidade_pontos = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 15; // 15 = PesquisaPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Pesquisa object", $e);
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
			$con = Propel::getConnection(PesquisaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = PesquisaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aUsuario = null;
			$this->collCargoPesquisas = null;

			$this->collColetaPesquisas = null;

			$this->collDepartamentoPesquisas = null;

			$this->collPerguntas = null;

			$this->collPesquisaHabilitadas = null;

			$this->collCargos = null;
			$this->collDepartamentos = null;
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
			$con = Propel::getConnection(PesquisaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = PesquisaQuery::create()
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
			$con = Propel::getConnection(PesquisaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				PesquisaPeer::addInstanceToPool($this);
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

			if ($this->cargosScheduledForDeletion !== null) {
				if (!$this->cargosScheduledForDeletion->isEmpty()) {
					CargoPesquisaQuery::create()
						->filterByPrimaryKeys($this->cargosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->cargosScheduledForDeletion = null;
				}

				foreach ($this->getCargos() as $cargo) {
					if ($cargo->isModified()) {
						$cargo->save($con);
					}
				}
			}

			if ($this->departamentosScheduledForDeletion !== null) {
				if (!$this->departamentosScheduledForDeletion->isEmpty()) {
					DepartamentoPesquisaQuery::create()
						->filterByPrimaryKeys($this->departamentosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->departamentosScheduledForDeletion = null;
				}

				foreach ($this->getDepartamentos() as $departamento) {
					if ($departamento->isModified()) {
						$departamento->save($con);
					}
				}
			}

			if ($this->cargoPesquisasScheduledForDeletion !== null) {
				if (!$this->cargoPesquisasScheduledForDeletion->isEmpty()) {
					CargoPesquisaQuery::create()
						->filterByPrimaryKeys($this->cargoPesquisasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->cargoPesquisasScheduledForDeletion = null;
				}
			}

			if ($this->collCargoPesquisas !== null) {
				foreach ($this->collCargoPesquisas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->coletaPesquisasScheduledForDeletion !== null) {
				if (!$this->coletaPesquisasScheduledForDeletion->isEmpty()) {
					ColetaPesquisaQuery::create()
						->filterByPrimaryKeys($this->coletaPesquisasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->coletaPesquisasScheduledForDeletion = null;
				}
			}

			if ($this->collColetaPesquisas !== null) {
				foreach ($this->collColetaPesquisas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->departamentoPesquisasScheduledForDeletion !== null) {
				if (!$this->departamentoPesquisasScheduledForDeletion->isEmpty()) {
					DepartamentoPesquisaQuery::create()
						->filterByPrimaryKeys($this->departamentoPesquisasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->departamentoPesquisasScheduledForDeletion = null;
				}
			}

			if ($this->collDepartamentoPesquisas !== null) {
				foreach ($this->collDepartamentoPesquisas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->perguntasScheduledForDeletion !== null) {
				if (!$this->perguntasScheduledForDeletion->isEmpty()) {
					PerguntaQuery::create()
						->filterByPrimaryKeys($this->perguntasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->perguntasScheduledForDeletion = null;
				}
			}

			if ($this->collPerguntas !== null) {
				foreach ($this->collPerguntas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->pesquisaHabilitadasScheduledForDeletion !== null) {
				if (!$this->pesquisaHabilitadasScheduledForDeletion->isEmpty()) {
					PesquisaHabilitadaQuery::create()
						->filterByPrimaryKeys($this->pesquisaHabilitadasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->pesquisaHabilitadasScheduledForDeletion = null;
				}
			}

			if ($this->collPesquisaHabilitadas !== null) {
				foreach ($this->collPesquisaHabilitadas as $referrerFK) {
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

		$this->modifiedColumns[] = PesquisaPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . PesquisaPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(PesquisaPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(PesquisaPeer::CRIADOR_ID)) {
			$modifiedColumns[':p' . $index++]  = '`CRIADOR_ID`';
		}
		if ($this->isColumnModified(PesquisaPeer::TITULO)) {
			$modifiedColumns[':p' . $index++]  = '`TITULO`';
		}
		if ($this->isColumnModified(PesquisaPeer::DESCRICAO)) {
			$modifiedColumns[':p' . $index++]  = '`DESCRICAO`';
		}
		if ($this->isColumnModified(PesquisaPeer::DATA_CRIACAO)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_CRIACAO`';
		}
		if ($this->isColumnModified(PesquisaPeer::DATA_INICIO)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_INICIO`';
		}
		if ($this->isColumnModified(PesquisaPeer::DATA_FIM)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_FIM`';
		}
		if ($this->isColumnModified(PesquisaPeer::ATIVO)) {
			$modifiedColumns[':p' . $index++]  = '`ATIVO`';
		}
		if ($this->isColumnModified(PesquisaPeer::PUBLICADA)) {
			$modifiedColumns[':p' . $index++]  = '`PUBLICADA`';
		}
		if ($this->isColumnModified(PesquisaPeer::TIPO_PESQUISA)) {
			$modifiedColumns[':p' . $index++]  = '`TIPO_PESQUISA`';
		}
		if ($this->isColumnModified(PesquisaPeer::ANONIMA)) {
			$modifiedColumns[':p' . $index++]  = '`ANONIMA`';
		}
		if ($this->isColumnModified(PesquisaPeer::IDADE_INICIAL)) {
			$modifiedColumns[':p' . $index++]  = '`IDADE_INICIAL`';
		}
		if ($this->isColumnModified(PesquisaPeer::IDADE_FINAL)) {
			$modifiedColumns[':p' . $index++]  = '`IDADE_FINAL`';
		}
		if ($this->isColumnModified(PesquisaPeer::GENERO)) {
			$modifiedColumns[':p' . $index++]  = '`GENERO`';
		}
		if ($this->isColumnModified(PesquisaPeer::QUANTIDADE_PONTOS)) {
			$modifiedColumns[':p' . $index++]  = '`QUANTIDADE_PONTOS`';
		}

		$sql = sprintf(
			'INSERT INTO `pesquisa` (%s) VALUES (%s)',
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
					case '`CRIADOR_ID`':						
						$stmt->bindValue($identifier, $this->criador_id, PDO::PARAM_INT);
						break;
					case '`TITULO`':						
						$stmt->bindValue($identifier, $this->titulo, PDO::PARAM_STR);
						break;
					case '`DESCRICAO`':						
						$stmt->bindValue($identifier, $this->descricao, PDO::PARAM_STR);
						break;
					case '`DATA_CRIACAO`':						
						$stmt->bindValue($identifier, $this->data_criacao, PDO::PARAM_STR);
						break;
					case '`DATA_INICIO`':						
						$stmt->bindValue($identifier, $this->data_inicio, PDO::PARAM_STR);
						break;
					case '`DATA_FIM`':						
						$stmt->bindValue($identifier, $this->data_fim, PDO::PARAM_STR);
						break;
					case '`ATIVO`':
						$stmt->bindValue($identifier, (int) $this->ativo, PDO::PARAM_INT);
						break;
					case '`PUBLICADA`':
						$stmt->bindValue($identifier, (int) $this->publicada, PDO::PARAM_INT);
						break;
					case '`TIPO_PESQUISA`':						
						$stmt->bindValue($identifier, $this->tipo_pesquisa, PDO::PARAM_STR);
						break;
					case '`ANONIMA`':
						$stmt->bindValue($identifier, (int) $this->anonima, PDO::PARAM_INT);
						break;
					case '`IDADE_INICIAL`':						
						$stmt->bindValue($identifier, $this->idade_inicial, PDO::PARAM_INT);
						break;
					case '`IDADE_FINAL`':						
						$stmt->bindValue($identifier, $this->idade_final, PDO::PARAM_INT);
						break;
					case '`GENERO`':						
						$stmt->bindValue($identifier, $this->genero, PDO::PARAM_STR);
						break;
					case '`QUANTIDADE_PONTOS`':						
						$stmt->bindValue($identifier, $this->quantidade_pontos, PDO::PARAM_INT);
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
		$pos = PesquisaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getCriadorId();
				break;
			case 2:
				return $this->getTitulo();
				break;
			case 3:
				return $this->getDescricao();
				break;
			case 4:
				return $this->getDataCriacao();
				break;
			case 5:
				return $this->getDataInicio();
				break;
			case 6:
				return $this->getDataFim();
				break;
			case 7:
				return $this->getAtivo();
				break;
			case 8:
				return $this->getPublicada();
				break;
			case 9:
				return $this->getTipoPesquisa();
				break;
			case 10:
				return $this->getAnonima();
				break;
			case 11:
				return $this->getIdadeInicial();
				break;
			case 12:
				return $this->getIdadeFinal();
				break;
			case 13:
				return $this->getGenero();
				break;
			case 14:
				return $this->getQuantidadePontos();
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
		if (isset($alreadyDumpedObjects['Pesquisa'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Pesquisa'][$this->getPrimaryKey()] = true;
		$keys = PesquisaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCriadorId(),
			$keys[2] => $this->getTitulo(),
			$keys[3] => $this->getDescricao(),
			$keys[4] => $this->getDataCriacao(),
			$keys[5] => $this->getDataInicio(),
			$keys[6] => $this->getDataFim(),
			$keys[7] => $this->getAtivo(),
			$keys[8] => $this->getPublicada(),
			$keys[9] => $this->getTipoPesquisa(),
			$keys[10] => $this->getAnonima(),
			$keys[11] => $this->getIdadeInicial(),
			$keys[12] => $this->getIdadeFinal(),
			$keys[13] => $this->getGenero(),
			$keys[14] => $this->getQuantidadePontos(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aUsuario) {
				$result['Usuario'] = $this->aUsuario->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collCargoPesquisas) {
				$result['CargoPesquisas'] = $this->collCargoPesquisas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collColetaPesquisas) {
				$result['ColetaPesquisas'] = $this->collColetaPesquisas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collDepartamentoPesquisas) {
				$result['DepartamentoPesquisas'] = $this->collDepartamentoPesquisas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collPerguntas) {
				$result['Perguntas'] = $this->collPerguntas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collPesquisaHabilitadas) {
				$result['PesquisaHabilitadas'] = $this->collPesquisaHabilitadas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = PesquisaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setCriadorId($value);
				break;
			case 2:
				$this->setTitulo($value);
				break;
			case 3:
				$this->setDescricao($value);
				break;
			case 4:
				$this->setDataCriacao($value);
				break;
			case 5:
				$this->setDataInicio($value);
				break;
			case 6:
				$this->setDataFim($value);
				break;
			case 7:
				$this->setAtivo($value);
				break;
			case 8:
				$this->setPublicada($value);
				break;
			case 9:
				$this->setTipoPesquisa($value);
				break;
			case 10:
				$this->setAnonima($value);
				break;
			case 11:
				$this->setIdadeInicial($value);
				break;
			case 12:
				$this->setIdadeFinal($value);
				break;
			case 13:
				$this->setGenero($value);
				break;
			case 14:
				$this->setQuantidadePontos($value);
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
		$keys = PesquisaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCriadorId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTitulo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDescricao($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDataCriacao($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDataInicio($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDataFim($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAtivo($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPublicada($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTipoPesquisa($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setAnonima($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setIdadeInicial($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setIdadeFinal($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setGenero($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setQuantidadePontos($arr[$keys[14]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(PesquisaPeer::DATABASE_NAME);

		if ($this->isColumnModified(PesquisaPeer::ID)) $criteria->add(PesquisaPeer::ID, $this->id);
		if ($this->isColumnModified(PesquisaPeer::CRIADOR_ID)) $criteria->add(PesquisaPeer::CRIADOR_ID, $this->criador_id);
		if ($this->isColumnModified(PesquisaPeer::TITULO)) $criteria->add(PesquisaPeer::TITULO, $this->titulo);
		if ($this->isColumnModified(PesquisaPeer::DESCRICAO)) $criteria->add(PesquisaPeer::DESCRICAO, $this->descricao);
		if ($this->isColumnModified(PesquisaPeer::DATA_CRIACAO)) $criteria->add(PesquisaPeer::DATA_CRIACAO, $this->data_criacao);
		if ($this->isColumnModified(PesquisaPeer::DATA_INICIO)) $criteria->add(PesquisaPeer::DATA_INICIO, $this->data_inicio);
		if ($this->isColumnModified(PesquisaPeer::DATA_FIM)) $criteria->add(PesquisaPeer::DATA_FIM, $this->data_fim);
		if ($this->isColumnModified(PesquisaPeer::ATIVO)) $criteria->add(PesquisaPeer::ATIVO, $this->ativo);
		if ($this->isColumnModified(PesquisaPeer::PUBLICADA)) $criteria->add(PesquisaPeer::PUBLICADA, $this->publicada);
		if ($this->isColumnModified(PesquisaPeer::TIPO_PESQUISA)) $criteria->add(PesquisaPeer::TIPO_PESQUISA, $this->tipo_pesquisa);
		if ($this->isColumnModified(PesquisaPeer::ANONIMA)) $criteria->add(PesquisaPeer::ANONIMA, $this->anonima);
		if ($this->isColumnModified(PesquisaPeer::IDADE_INICIAL)) $criteria->add(PesquisaPeer::IDADE_INICIAL, $this->idade_inicial);
		if ($this->isColumnModified(PesquisaPeer::IDADE_FINAL)) $criteria->add(PesquisaPeer::IDADE_FINAL, $this->idade_final);
		if ($this->isColumnModified(PesquisaPeer::GENERO)) $criteria->add(PesquisaPeer::GENERO, $this->genero);
		if ($this->isColumnModified(PesquisaPeer::QUANTIDADE_PONTOS)) $criteria->add(PesquisaPeer::QUANTIDADE_PONTOS, $this->quantidade_pontos);

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
		$criteria = new Criteria(PesquisaPeer::DATABASE_NAME);
		$criteria->add(PesquisaPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Pesquisa (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setCriadorId($this->getCriadorId());
		$copyObj->setTitulo($this->getTitulo());
		$copyObj->setDescricao($this->getDescricao());
		$copyObj->setDataCriacao($this->getDataCriacao());
		$copyObj->setDataInicio($this->getDataInicio());
		$copyObj->setDataFim($this->getDataFim());
		$copyObj->setAtivo($this->getAtivo());
		$copyObj->setPublicada($this->getPublicada());
		$copyObj->setTipoPesquisa($this->getTipoPesquisa());
		$copyObj->setAnonima($this->getAnonima());
		$copyObj->setIdadeInicial($this->getIdadeInicial());
		$copyObj->setIdadeFinal($this->getIdadeFinal());
		$copyObj->setGenero($this->getGenero());
		$copyObj->setQuantidadePontos($this->getQuantidadePontos());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getCargoPesquisas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCargoPesquisa($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getColetaPesquisas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addColetaPesquisa($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getDepartamentoPesquisas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addDepartamentoPesquisa($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getPerguntas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPergunta($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getPesquisaHabilitadas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPesquisaHabilitada($relObj->copy($deepCopy));
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
	 * @return     Pesquisa Clone of current object.
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
	 * @return     PesquisaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PesquisaPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     Pesquisa The current object (for fluent API support)
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
			$v->addPesquisa($this);
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
				$this->aUsuario->addPesquisas($this);
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
		if ('CargoPesquisa' == $relationName) {
			return $this->initCargoPesquisas();
		}
		if ('ColetaPesquisa' == $relationName) {
			return $this->initColetaPesquisas();
		}
		if ('DepartamentoPesquisa' == $relationName) {
			return $this->initDepartamentoPesquisas();
		}
		if ('Pergunta' == $relationName) {
			return $this->initPerguntas();
		}
		if ('PesquisaHabilitada' == $relationName) {
			return $this->initPesquisaHabilitadas();
		}
	}

	/**
	 * Clears out the collCargoPesquisas collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCargoPesquisas()
	 */
	public function clearCargoPesquisas()
	{
		$this->collCargoPesquisas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCargoPesquisas collection.
	 *
	 * By default this just sets the collCargoPesquisas collection to an empty array (like clearcollCargoPesquisas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initCargoPesquisas($overrideExisting = true)
	{
		if (null !== $this->collCargoPesquisas && !$overrideExisting) {
			return;
		}
		$this->collCargoPesquisas = new PropelObjectCollection();
		$this->collCargoPesquisas->setModel('CargoPesquisa');
	}

	/**
	 * Gets an array of CargoPesquisa objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Pesquisa is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array CargoPesquisa[] List of CargoPesquisa objects
	 * @throws     PropelException
	 */
	public function getCargoPesquisas($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCargoPesquisas || null !== $criteria) {
			if ($this->isNew() && null === $this->collCargoPesquisas) {
				// return empty collection
				$this->initCargoPesquisas();
			} else {
				$collCargoPesquisas = CargoPesquisaQuery::create(null, $criteria)
					->filterByPesquisa($this)
					->find($con);
				if (null !== $criteria) {
					return $collCargoPesquisas;
				}
				$this->collCargoPesquisas = $collCargoPesquisas;
			}
		}
		return $this->collCargoPesquisas;
	}

	/**
	 * Sets a collection of CargoPesquisa objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $cargoPesquisas A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setCargoPesquisas(PropelCollection $cargoPesquisas, PropelPDO $con = null)
	{
		$this->cargoPesquisasScheduledForDeletion = $this->getCargoPesquisas(new Criteria(), $con)->diff($cargoPesquisas);

		foreach ($cargoPesquisas as $cargoPesquisa) {
			// Fix issue with collection modified by reference
			if ($cargoPesquisa->isNew()) {
				$cargoPesquisa->setPesquisa($this);
			}
			$this->addCargoPesquisa($cargoPesquisa);
		}

		$this->collCargoPesquisas = $cargoPesquisas;
	}

	/**
	 * Returns the number of related CargoPesquisa objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CargoPesquisa objects.
	 * @throws     PropelException
	 */
	public function countCargoPesquisas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCargoPesquisas || null !== $criteria) {
			if ($this->isNew() && null === $this->collCargoPesquisas) {
				return 0;
			} else {
				$query = CargoPesquisaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPesquisa($this)
					->count($con);
			}
		} else {
			return count($this->collCargoPesquisas);
		}
	}

	/**
	 * Method called to associate a CargoPesquisa object to this object
	 * through the CargoPesquisa foreign key attribute.
	 *
	 * @param      CargoPesquisa $l CargoPesquisa
	 * @return     Pesquisa The current object (for fluent API support)
	 */
	public function addCargoPesquisa(CargoPesquisa $l)
	{
		if ($this->collCargoPesquisas === null) {
			$this->initCargoPesquisas();
		}
		if (!$this->collCargoPesquisas->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddCargoPesquisa($l);
		}

		return $this;
	}

	/**
	 * @param	CargoPesquisa $cargoPesquisa The cargoPesquisa object to add.
	 */
	protected function doAddCargoPesquisa($cargoPesquisa)
	{
		$this->collCargoPesquisas[]= $cargoPesquisa;
		$cargoPesquisa->setPesquisa($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pesquisa is new, it will return
	 * an empty collection; or if this Pesquisa has previously
	 * been saved, it will retrieve related CargoPesquisas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pesquisa.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array CargoPesquisa[] List of CargoPesquisa objects
	 */
	public function getCargoPesquisasJoinCargo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CargoPesquisaQuery::create(null, $criteria);
		$query->joinWith('Cargo', $join_behavior);

		return $this->getCargoPesquisas($query, $con);
	}

	/**
	 * Clears out the collColetaPesquisas collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addColetaPesquisas()
	 */
	public function clearColetaPesquisas()
	{
		$this->collColetaPesquisas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collColetaPesquisas collection.
	 *
	 * By default this just sets the collColetaPesquisas collection to an empty array (like clearcollColetaPesquisas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initColetaPesquisas($overrideExisting = true)
	{
		if (null !== $this->collColetaPesquisas && !$overrideExisting) {
			return;
		}
		$this->collColetaPesquisas = new PropelObjectCollection();
		$this->collColetaPesquisas->setModel('ColetaPesquisa');
	}

	/**
	 * Gets an array of ColetaPesquisa objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Pesquisa is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ColetaPesquisa[] List of ColetaPesquisa objects
	 * @throws     PropelException
	 */
	public function getColetaPesquisas($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collColetaPesquisas || null !== $criteria) {
			if ($this->isNew() && null === $this->collColetaPesquisas) {
				// return empty collection
				$this->initColetaPesquisas();
			} else {
				$collColetaPesquisas = ColetaPesquisaQuery::create(null, $criteria)
					->filterByPesquisa($this)
					->find($con);
				if (null !== $criteria) {
					return $collColetaPesquisas;
				}
				$this->collColetaPesquisas = $collColetaPesquisas;
			}
		}
		return $this->collColetaPesquisas;
	}

	/**
	 * Sets a collection of ColetaPesquisa objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $coletaPesquisas A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setColetaPesquisas(PropelCollection $coletaPesquisas, PropelPDO $con = null)
	{
		$this->coletaPesquisasScheduledForDeletion = $this->getColetaPesquisas(new Criteria(), $con)->diff($coletaPesquisas);

		foreach ($coletaPesquisas as $coletaPesquisa) {
			// Fix issue with collection modified by reference
			if ($coletaPesquisa->isNew()) {
				$coletaPesquisa->setPesquisa($this);
			}
			$this->addColetaPesquisa($coletaPesquisa);
		}

		$this->collColetaPesquisas = $coletaPesquisas;
	}

	/**
	 * Returns the number of related ColetaPesquisa objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ColetaPesquisa objects.
	 * @throws     PropelException
	 */
	public function countColetaPesquisas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collColetaPesquisas || null !== $criteria) {
			if ($this->isNew() && null === $this->collColetaPesquisas) {
				return 0;
			} else {
				$query = ColetaPesquisaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPesquisa($this)
					->count($con);
			}
		} else {
			return count($this->collColetaPesquisas);
		}
	}

	/**
	 * Method called to associate a ColetaPesquisa object to this object
	 * through the ColetaPesquisa foreign key attribute.
	 *
	 * @param      ColetaPesquisa $l ColetaPesquisa
	 * @return     Pesquisa The current object (for fluent API support)
	 */
	public function addColetaPesquisa(ColetaPesquisa $l)
	{
		if ($this->collColetaPesquisas === null) {
			$this->initColetaPesquisas();
		}
		if (!$this->collColetaPesquisas->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddColetaPesquisa($l);
		}

		return $this;
	}

	/**
	 * @param	ColetaPesquisa $coletaPesquisa The coletaPesquisa object to add.
	 */
	protected function doAddColetaPesquisa($coletaPesquisa)
	{
		$this->collColetaPesquisas[]= $coletaPesquisa;
		$coletaPesquisa->setPesquisa($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pesquisa is new, it will return
	 * an empty collection; or if this Pesquisa has previously
	 * been saved, it will retrieve related ColetaPesquisas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pesquisa.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ColetaPesquisa[] List of ColetaPesquisa objects
	 */
	public function getColetaPesquisasJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ColetaPesquisaQuery::create(null, $criteria);
		$query->joinWith('Usuario', $join_behavior);

		return $this->getColetaPesquisas($query, $con);
	}

	/**
	 * Clears out the collDepartamentoPesquisas collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addDepartamentoPesquisas()
	 */
	public function clearDepartamentoPesquisas()
	{
		$this->collDepartamentoPesquisas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collDepartamentoPesquisas collection.
	 *
	 * By default this just sets the collDepartamentoPesquisas collection to an empty array (like clearcollDepartamentoPesquisas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initDepartamentoPesquisas($overrideExisting = true)
	{
		if (null !== $this->collDepartamentoPesquisas && !$overrideExisting) {
			return;
		}
		$this->collDepartamentoPesquisas = new PropelObjectCollection();
		$this->collDepartamentoPesquisas->setModel('DepartamentoPesquisa');
	}

	/**
	 * Gets an array of DepartamentoPesquisa objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Pesquisa is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array DepartamentoPesquisa[] List of DepartamentoPesquisa objects
	 * @throws     PropelException
	 */
	public function getDepartamentoPesquisas($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collDepartamentoPesquisas || null !== $criteria) {
			if ($this->isNew() && null === $this->collDepartamentoPesquisas) {
				// return empty collection
				$this->initDepartamentoPesquisas();
			} else {
				$collDepartamentoPesquisas = DepartamentoPesquisaQuery::create(null, $criteria)
					->filterByPesquisa($this)
					->find($con);
				if (null !== $criteria) {
					return $collDepartamentoPesquisas;
				}
				$this->collDepartamentoPesquisas = $collDepartamentoPesquisas;
			}
		}
		return $this->collDepartamentoPesquisas;
	}

	/**
	 * Sets a collection of DepartamentoPesquisa objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $departamentoPesquisas A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setDepartamentoPesquisas(PropelCollection $departamentoPesquisas, PropelPDO $con = null)
	{
		$this->departamentoPesquisasScheduledForDeletion = $this->getDepartamentoPesquisas(new Criteria(), $con)->diff($departamentoPesquisas);

		foreach ($departamentoPesquisas as $departamentoPesquisa) {
			// Fix issue with collection modified by reference
			if ($departamentoPesquisa->isNew()) {
				$departamentoPesquisa->setPesquisa($this);
			}
			$this->addDepartamentoPesquisa($departamentoPesquisa);
		}

		$this->collDepartamentoPesquisas = $departamentoPesquisas;
	}

	/**
	 * Returns the number of related DepartamentoPesquisa objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related DepartamentoPesquisa objects.
	 * @throws     PropelException
	 */
	public function countDepartamentoPesquisas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collDepartamentoPesquisas || null !== $criteria) {
			if ($this->isNew() && null === $this->collDepartamentoPesquisas) {
				return 0;
			} else {
				$query = DepartamentoPesquisaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPesquisa($this)
					->count($con);
			}
		} else {
			return count($this->collDepartamentoPesquisas);
		}
	}

	/**
	 * Method called to associate a DepartamentoPesquisa object to this object
	 * through the DepartamentoPesquisa foreign key attribute.
	 *
	 * @param      DepartamentoPesquisa $l DepartamentoPesquisa
	 * @return     Pesquisa The current object (for fluent API support)
	 */
	public function addDepartamentoPesquisa(DepartamentoPesquisa $l)
	{
		if ($this->collDepartamentoPesquisas === null) {
			$this->initDepartamentoPesquisas();
		}
		if (!$this->collDepartamentoPesquisas->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddDepartamentoPesquisa($l);
		}

		return $this;
	}

	/**
	 * @param	DepartamentoPesquisa $departamentoPesquisa The departamentoPesquisa object to add.
	 */
	protected function doAddDepartamentoPesquisa($departamentoPesquisa)
	{
		$this->collDepartamentoPesquisas[]= $departamentoPesquisa;
		$departamentoPesquisa->setPesquisa($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pesquisa is new, it will return
	 * an empty collection; or if this Pesquisa has previously
	 * been saved, it will retrieve related DepartamentoPesquisas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pesquisa.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array DepartamentoPesquisa[] List of DepartamentoPesquisa objects
	 */
	public function getDepartamentoPesquisasJoinDepartamento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = DepartamentoPesquisaQuery::create(null, $criteria);
		$query->joinWith('Departamento', $join_behavior);

		return $this->getDepartamentoPesquisas($query, $con);
	}

	/**
	 * Clears out the collPerguntas collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPerguntas()
	 */
	public function clearPerguntas()
	{
		$this->collPerguntas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPerguntas collection.
	 *
	 * By default this just sets the collPerguntas collection to an empty array (like clearcollPerguntas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initPerguntas($overrideExisting = true)
	{
		if (null !== $this->collPerguntas && !$overrideExisting) {
			return;
		}
		$this->collPerguntas = new PropelObjectCollection();
		$this->collPerguntas->setModel('Pergunta');
	}

	/**
	 * Gets an array of Pergunta objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Pesquisa is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Pergunta[] List of Pergunta objects
	 * @throws     PropelException
	 */
	public function getPerguntas($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPerguntas || null !== $criteria) {
			if ($this->isNew() && null === $this->collPerguntas) {
				// return empty collection
				$this->initPerguntas();
			} else {
				$collPerguntas = PerguntaQuery::create(null, $criteria)
					->filterByPesquisa($this)
					->find($con);
				if (null !== $criteria) {
					return $collPerguntas;
				}
				$this->collPerguntas = $collPerguntas;
			}
		}
		return $this->collPerguntas;
	}

	/**
	 * Sets a collection of Pergunta objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $perguntas A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setPerguntas(PropelCollection $perguntas, PropelPDO $con = null)
	{
		$this->perguntasScheduledForDeletion = $this->getPerguntas(new Criteria(), $con)->diff($perguntas);

		foreach ($perguntas as $pergunta) {
			// Fix issue with collection modified by reference
			if ($pergunta->isNew()) {
				$pergunta->setPesquisa($this);
			}
			$this->addPergunta($pergunta);
		}

		$this->collPerguntas = $perguntas;
	}

	/**
	 * Returns the number of related Pergunta objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Pergunta objects.
	 * @throws     PropelException
	 */
	public function countPerguntas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPerguntas || null !== $criteria) {
			if ($this->isNew() && null === $this->collPerguntas) {
				return 0;
			} else {
				$query = PerguntaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPesquisa($this)
					->count($con);
			}
		} else {
			return count($this->collPerguntas);
		}
	}

	/**
	 * Method called to associate a Pergunta object to this object
	 * through the Pergunta foreign key attribute.
	 *
	 * @param      Pergunta $l Pergunta
	 * @return     Pesquisa The current object (for fluent API support)
	 */
	public function addPergunta(Pergunta $l)
	{
		if ($this->collPerguntas === null) {
			$this->initPerguntas();
		}
		if (!$this->collPerguntas->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddPergunta($l);
		}

		return $this;
	}

	/**
	 * @param	Pergunta $pergunta The pergunta object to add.
	 */
	protected function doAddPergunta($pergunta)
	{
		$this->collPerguntas[]= $pergunta;
		$pergunta->setPesquisa($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pesquisa is new, it will return
	 * an empty collection; or if this Pesquisa has previously
	 * been saved, it will retrieve related Perguntas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pesquisa.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Pergunta[] List of Pergunta objects
	 */
	public function getPerguntasJoinCategoria($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = PerguntaQuery::create(null, $criteria);
		$query->joinWith('Categoria', $join_behavior);

		return $this->getPerguntas($query, $con);
	}

	/**
	 * Clears out the collPesquisaHabilitadas collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPesquisaHabilitadas()
	 */
	public function clearPesquisaHabilitadas()
	{
		$this->collPesquisaHabilitadas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPesquisaHabilitadas collection.
	 *
	 * By default this just sets the collPesquisaHabilitadas collection to an empty array (like clearcollPesquisaHabilitadas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initPesquisaHabilitadas($overrideExisting = true)
	{
		if (null !== $this->collPesquisaHabilitadas && !$overrideExisting) {
			return;
		}
		$this->collPesquisaHabilitadas = new PropelObjectCollection();
		$this->collPesquisaHabilitadas->setModel('PesquisaHabilitada');
	}

	/**
	 * Gets an array of PesquisaHabilitada objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Pesquisa is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array PesquisaHabilitada[] List of PesquisaHabilitada objects
	 * @throws     PropelException
	 */
	public function getPesquisaHabilitadas($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPesquisaHabilitadas || null !== $criteria) {
			if ($this->isNew() && null === $this->collPesquisaHabilitadas) {
				// return empty collection
				$this->initPesquisaHabilitadas();
			} else {
				$collPesquisaHabilitadas = PesquisaHabilitadaQuery::create(null, $criteria)
					->filterByPesquisa($this)
					->find($con);
				if (null !== $criteria) {
					return $collPesquisaHabilitadas;
				}
				$this->collPesquisaHabilitadas = $collPesquisaHabilitadas;
			}
		}
		return $this->collPesquisaHabilitadas;
	}

	/**
	 * Sets a collection of PesquisaHabilitada objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $pesquisaHabilitadas A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setPesquisaHabilitadas(PropelCollection $pesquisaHabilitadas, PropelPDO $con = null)
	{
		$this->pesquisaHabilitadasScheduledForDeletion = $this->getPesquisaHabilitadas(new Criteria(), $con)->diff($pesquisaHabilitadas);

		foreach ($pesquisaHabilitadas as $pesquisaHabilitada) {
			// Fix issue with collection modified by reference
			if ($pesquisaHabilitada->isNew()) {
				$pesquisaHabilitada->setPesquisa($this);
			}
			$this->addPesquisaHabilitada($pesquisaHabilitada);
		}

		$this->collPesquisaHabilitadas = $pesquisaHabilitadas;
	}

	/**
	 * Returns the number of related PesquisaHabilitada objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related PesquisaHabilitada objects.
	 * @throws     PropelException
	 */
	public function countPesquisaHabilitadas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPesquisaHabilitadas || null !== $criteria) {
			if ($this->isNew() && null === $this->collPesquisaHabilitadas) {
				return 0;
			} else {
				$query = PesquisaHabilitadaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPesquisa($this)
					->count($con);
			}
		} else {
			return count($this->collPesquisaHabilitadas);
		}
	}

	/**
	 * Method called to associate a PesquisaHabilitada object to this object
	 * through the PesquisaHabilitada foreign key attribute.
	 *
	 * @param      PesquisaHabilitada $l PesquisaHabilitada
	 * @return     Pesquisa The current object (for fluent API support)
	 */
	public function addPesquisaHabilitada(PesquisaHabilitada $l)
	{
		if ($this->collPesquisaHabilitadas === null) {
			$this->initPesquisaHabilitadas();
		}
		if (!$this->collPesquisaHabilitadas->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddPesquisaHabilitada($l);
		}

		return $this;
	}

	/**
	 * @param	PesquisaHabilitada $pesquisaHabilitada The pesquisaHabilitada object to add.
	 */
	protected function doAddPesquisaHabilitada($pesquisaHabilitada)
	{
		$this->collPesquisaHabilitadas[]= $pesquisaHabilitada;
		$pesquisaHabilitada->setPesquisa($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pesquisa is new, it will return
	 * an empty collection; or if this Pesquisa has previously
	 * been saved, it will retrieve related PesquisaHabilitadas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pesquisa.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array PesquisaHabilitada[] List of PesquisaHabilitada objects
	 */
	public function getPesquisaHabilitadasJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = PesquisaHabilitadaQuery::create(null, $criteria);
		$query->joinWith('Usuario', $join_behavior);

		return $this->getPesquisaHabilitadas($query, $con);
	}

	/**
	 * Clears out the collCargos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCargos()
	 */
	public function clearCargos()
	{
		$this->collCargos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCargos collection.
	 *
	 * By default this just sets the collCargos collection to an empty collection (like clearCargos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCargos()
	{
		$this->collCargos = new PropelObjectCollection();
		$this->collCargos->setModel('Cargo');
	}

	/**
	 * Gets a collection of Cargo objects related by a many-to-many relationship
	 * to the current object by way of the cargo_pesquisa cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Pesquisa is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Cargo[] List of Cargo objects
	 */
	public function getCargos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCargos || null !== $criteria) {
			if ($this->isNew() && null === $this->collCargos) {
				// return empty collection
				$this->initCargos();
			} else {
				$collCargos = CargoQuery::create(null, $criteria)
					->filterByPesquisa($this)
					->find($con);
				if (null !== $criteria) {
					return $collCargos;
				}
				$this->collCargos = $collCargos;
			}
		}
		return $this->collCargos;
	}

	/**
	 * Sets a collection of Cargo objects related by a many-to-many relationship
	 * to the current object by way of the cargo_pesquisa cross-reference table.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $cargos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setCargos(PropelCollection $cargos, PropelPDO $con = null)
	{
		$cargoPesquisas = CargoPesquisaQuery::create()
			->filterByCargo($cargos)
			->filterByPesquisa($this)
			->find($con);

		$this->cargosScheduledForDeletion = $this->getCargoPesquisas()->diff($cargoPesquisas);
		$this->collCargoPesquisas = $cargoPesquisas;

		foreach ($cargos as $cargo) {
			// Fix issue with collection modified by reference
			if ($cargo->isNew()) {
				$this->doAddCargo($cargo);
			} else {
				$this->addCargo($cargo);
			}
		}

		$this->collCargos = $cargos;
	}

	/**
	 * Gets the number of Cargo objects related by a many-to-many relationship
	 * to the current object by way of the cargo_pesquisa cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Cargo objects
	 */
	public function countCargos($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCargos || null !== $criteria) {
			if ($this->isNew() && null === $this->collCargos) {
				return 0;
			} else {
				$query = CargoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPesquisa($this)
					->count($con);
			}
		} else {
			return count($this->collCargos);
		}
	}

	/**
	 * Associate a Cargo object to this object
	 * through the cargo_pesquisa cross reference table.
	 *
	 * @param      Cargo $cargo The CargoPesquisa object to relate
	 * @return     void
	 */
	public function addCargo(Cargo $cargo)
	{
		if ($this->collCargos === null) {
			$this->initCargos();
		}
		if (!$this->collCargos->contains($cargo)) { // only add it if the **same** object is not already associated
			$this->doAddCargo($cargo);

			$this->collCargos[]= $cargo;
		}
	}

	/**
	 * @param	Cargo $cargo The cargo object to add.
	 */
	protected function doAddCargo($cargo)
	{
		$cargoPesquisa = new CargoPesquisa();
		$cargoPesquisa->setCargo($cargo);
		$this->addCargoPesquisa($cargoPesquisa);
	}

	/**
	 * Clears out the collDepartamentos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addDepartamentos()
	 */
	public function clearDepartamentos()
	{
		$this->collDepartamentos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collDepartamentos collection.
	 *
	 * By default this just sets the collDepartamentos collection to an empty collection (like clearDepartamentos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initDepartamentos()
	{
		$this->collDepartamentos = new PropelObjectCollection();
		$this->collDepartamentos->setModel('Departamento');
	}

	/**
	 * Gets a collection of Departamento objects related by a many-to-many relationship
	 * to the current object by way of the departamento_pesquisa cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Pesquisa is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Departamento[] List of Departamento objects
	 */
	public function getDepartamentos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collDepartamentos || null !== $criteria) {
			if ($this->isNew() && null === $this->collDepartamentos) {
				// return empty collection
				$this->initDepartamentos();
			} else {
				$collDepartamentos = DepartamentoQuery::create(null, $criteria)
					->filterByPesquisa($this)
					->find($con);
				if (null !== $criteria) {
					return $collDepartamentos;
				}
				$this->collDepartamentos = $collDepartamentos;
			}
		}
		return $this->collDepartamentos;
	}

	/**
	 * Sets a collection of Departamento objects related by a many-to-many relationship
	 * to the current object by way of the departamento_pesquisa cross-reference table.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $departamentos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setDepartamentos(PropelCollection $departamentos, PropelPDO $con = null)
	{
		$departamentoPesquisas = DepartamentoPesquisaQuery::create()
			->filterByDepartamento($departamentos)
			->filterByPesquisa($this)
			->find($con);

		$this->departamentosScheduledForDeletion = $this->getDepartamentoPesquisas()->diff($departamentoPesquisas);
		$this->collDepartamentoPesquisas = $departamentoPesquisas;

		foreach ($departamentos as $departamento) {
			// Fix issue with collection modified by reference
			if ($departamento->isNew()) {
				$this->doAddDepartamento($departamento);
			} else {
				$this->addDepartamento($departamento);
			}
		}

		$this->collDepartamentos = $departamentos;
	}

	/**
	 * Gets the number of Departamento objects related by a many-to-many relationship
	 * to the current object by way of the departamento_pesquisa cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Departamento objects
	 */
	public function countDepartamentos($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collDepartamentos || null !== $criteria) {
			if ($this->isNew() && null === $this->collDepartamentos) {
				return 0;
			} else {
				$query = DepartamentoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPesquisa($this)
					->count($con);
			}
		} else {
			return count($this->collDepartamentos);
		}
	}

	/**
	 * Associate a Departamento object to this object
	 * through the departamento_pesquisa cross reference table.
	 *
	 * @param      Departamento $departamento The DepartamentoPesquisa object to relate
	 * @return     void
	 */
	public function addDepartamento(Departamento $departamento)
	{
		if ($this->collDepartamentos === null) {
			$this->initDepartamentos();
		}
		if (!$this->collDepartamentos->contains($departamento)) { // only add it if the **same** object is not already associated
			$this->doAddDepartamento($departamento);

			$this->collDepartamentos[]= $departamento;
		}
	}

	/**
	 * @param	Departamento $departamento The departamento object to add.
	 */
	protected function doAddDepartamento($departamento)
	{
		$departamentoPesquisa = new DepartamentoPesquisa();
		$departamentoPesquisa->setDepartamento($departamento);
		$this->addDepartamentoPesquisa($departamentoPesquisa);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->criador_id = null;
		$this->titulo = null;
		$this->descricao = null;
		$this->data_criacao = null;
		$this->data_inicio = null;
		$this->data_fim = null;
		$this->ativo = null;
		$this->publicada = null;
		$this->tipo_pesquisa = null;
		$this->anonima = null;
		$this->idade_inicial = null;
		$this->idade_final = null;
		$this->genero = null;
		$this->quantidade_pontos = null;
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
			if ($this->collCargoPesquisas) {
				foreach ($this->collCargoPesquisas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collColetaPesquisas) {
				foreach ($this->collColetaPesquisas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collDepartamentoPesquisas) {
				foreach ($this->collDepartamentoPesquisas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPerguntas) {
				foreach ($this->collPerguntas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPesquisaHabilitadas) {
				foreach ($this->collPesquisaHabilitadas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCargos) {
				foreach ($this->collCargos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collDepartamentos) {
				foreach ($this->collDepartamentos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collCargoPesquisas instanceof PropelCollection) {
			$this->collCargoPesquisas->clearIterator();
		}
		$this->collCargoPesquisas = null;
		if ($this->collColetaPesquisas instanceof PropelCollection) {
			$this->collColetaPesquisas->clearIterator();
		}
		$this->collColetaPesquisas = null;
		if ($this->collDepartamentoPesquisas instanceof PropelCollection) {
			$this->collDepartamentoPesquisas->clearIterator();
		}
		$this->collDepartamentoPesquisas = null;
		if ($this->collPerguntas instanceof PropelCollection) {
			$this->collPerguntas->clearIterator();
		}
		$this->collPerguntas = null;
		if ($this->collPesquisaHabilitadas instanceof PropelCollection) {
			$this->collPesquisaHabilitadas->clearIterator();
		}
		$this->collPesquisaHabilitadas = null;
		if ($this->collCargos instanceof PropelCollection) {
			$this->collCargos->clearIterator();
		}
		$this->collCargos = null;
		if ($this->collDepartamentos instanceof PropelCollection) {
			$this->collDepartamentos->clearIterator();
		}
		$this->collDepartamentos = null;
		$this->aUsuario = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(PesquisaPeer::DEFAULT_STRING_FORMAT);
	}

} // BasePesquisa
