<?php


/**
 * Base class that represents a row from the 'igreja' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseIgreja extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'IgrejaPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        IgrejaPeer
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
	 * The value for the responsavel_id field.
	 * @var        int
	 */
	protected $responsavel_id;

	/**
	 * The value for the endereco_id field.
	 * @var        int
	 */
	protected $endereco_id;

	/**
	 * The value for the igreja_id field.
	 * @var        int
	 */
	protected $igreja_id;

	/**
	 * The value for the tipo field.
	 * @var        string
	 */
	protected $tipo;

	/**
	 * The value for the nome_fantasia field.
	 * @var        string
	 */
	protected $nome_fantasia;

	/**
	 * The value for the razao_social field.
	 * @var        string
	 */
	protected $razao_social;

	/**
	 * The value for the cnpj field.
	 * @var        string
	 */
	protected $cnpj;

	/**
	 * The value for the ativa field.
	 * Note: this column has a database default value of: true
	 * @var        boolean
	 */
	protected $ativa;

	/**
	 * The value for the site field.
	 * @var        string
	 */
	protected $site;

	/**
	 * The value for the sobre_nos field.
	 * @var        string
	 */
	protected $sobre_nos;

	/**
	 * The value for the visao field.
	 * @var        string
	 */
	protected $visao;

	/**
	 * The value for the missao field.
	 * @var        string
	 */
	protected $missao;

	/**
	 * The value for the valores field.
	 * @var        string
	 */
	protected $valores;

	/**
	 * The value for the data_cadastro field.
	 * @var        string
	 */
	protected $data_cadastro;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the telefone field.
	 * @var        string
	 */
	protected $telefone;

	/**
	 * @var        Endereco
	 */
	protected $aEndereco;

	/**
	 * @var        Igreja
	 */
	protected $aIgrejaRelatedByIgrejaId;

	/**
	 * @var        Usuario
	 */
	protected $aUsuarioRelatedByResponsavelId;

	/**
	 * @var        Usuario
	 */
	protected $aUsuarioRelatedByCriadorId;

	/**
	 * @var        array AgendaIgreja[] Collection to store aggregation of AgendaIgreja objects.
	 */
	protected $collAgendaIgrejas;

	/**
	 * @var        array Igreja[] Collection to store aggregation of Igreja objects.
	 */
	protected $collIgrejasRelatedById;

	/**
	 * @var        array Membro[] Collection to store aggregation of Membro objects.
	 */
	protected $collMembrosRelatedByFilialId;

	/**
	 * @var        array Membro[] Collection to store aggregation of Membro objects.
	 */
	protected $collMembrosRelatedByInstituicaoId;

	/**
	 * @var        array Ministerio[] Collection to store aggregation of Ministerio objects.
	 */
	protected $collMinisteriosRelatedByIgrejaPertencenteId;

	/**
	 * @var        array Ministerio[] Collection to store aggregation of Ministerio objects.
	 */
	protected $collMinisteriosRelatedByInstituicaoId;

	/**
	 * @var        array NoticiaIgreja[] Collection to store aggregation of NoticiaIgreja objects.
	 */
	protected $collNoticiaIgrejas;

	/**
	 * @var        array PedidoOracao[] Collection to store aggregation of PedidoOracao objects.
	 */
	protected $collPedidoOracaos;

	/**
	 * @var        array Pg[] Collection to store aggregation of Pg objects.
	 */
	protected $collPgs;

	/**
	 * @var        array PodcastIgreja[] Collection to store aggregation of PodcastIgreja objects.
	 */
	protected $collPodcastIgrejas;

	/**
	 * @var        array Usuario[] Collection to store aggregation of Usuario objects.
	 */
	protected $collUsuariosRelatedByFilialId;

	/**
	 * @var        array Usuario[] Collection to store aggregation of Usuario objects.
	 */
	protected $collUsuariosRelatedByInstituicaoId;

	/**
	 * @var        array UsuarioFilial[] Collection to store aggregation of UsuarioFilial objects.
	 */
	protected $collUsuarioFilials;

	/**
	 * @var        array VideoIgreja[] Collection to store aggregation of VideoIgreja objects.
	 */
	protected $collVideoIgrejas;

	/**
	 * @var        array Agenda[] Collection to store aggregation of Agenda objects.
	 */
	protected $collAgendas;

	/**
	 * @var        array Noticia[] Collection to store aggregation of Noticia objects.
	 */
	protected $collNoticias;

	/**
	 * @var        array Podcast[] Collection to store aggregation of Podcast objects.
	 */
	protected $collPodcasts;

	/**
	 * @var        array Usuario[] Collection to store aggregation of Usuario objects.
	 */
	protected $collUsuarios;

	/**
	 * @var        array Video[] Collection to store aggregation of Video objects.
	 */
	protected $collVideos;

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
	protected $agendasScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $noticiasScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $podcastsScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $usuariosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $videosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $agendaIgrejasScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $igrejasRelatedByIdScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $membrosRelatedByFilialIdScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $membrosRelatedByInstituicaoIdScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $ministeriosRelatedByIgrejaPertencenteIdScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $ministeriosRelatedByInstituicaoIdScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $noticiaIgrejasScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $pedidoOracaosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $pgsScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $podcastIgrejasScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $usuariosRelatedByFilialIdScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $usuariosRelatedByInstituicaoIdScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $usuarioFilialsScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $videoIgrejasScheduledForDeletion = null;

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
	 * Initializes internal state of BaseIgreja object.
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
	 * Get the [responsavel_id] column value.
	 * 
	 * @return     int
	 */
	public function getResponsavelId()
	{
		return $this->responsavel_id;
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
	 * Get the [igreja_id] column value.
	 * 
	 * @return     int
	 */
	public function getIgrejaId()
	{
		return $this->igreja_id;
	}

	/**
	 * Get the [tipo] column value.
	 * 
	 * @return     string
	 */
	public function getTipo()
	{
		return $this->tipo;
	}

	/**
	 * Get the [nome_fantasia] column value.
	 * 
	 * @return     string
	 */
	public function getNomeFantasia()
	{
		return $this->nome_fantasia;
	}

	/**
	 * Get the [razao_social] column value.
	 * 
	 * @return     string
	 */
	public function getRazaoSocial()
	{
		return $this->razao_social;
	}

	/**
	 * Get the [cnpj] column value.
	 * 
	 * @return     string
	 */
	public function getCnpj()
	{
		return $this->cnpj;
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
	 * Get the [site] column value.
	 * 
	 * @return     string
	 */
	public function getSite()
	{
		return $this->site;
	}

	/**
	 * Get the [sobre_nos] column value.
	 * 
	 * @return     string
	 */
	public function getSobreNos()
	{
		return $this->sobre_nos;
	}

	/**
	 * Get the [visao] column value.
	 * 
	 * @return     string
	 */
	public function getVisao()
	{
		return $this->visao;
	}

	/**
	 * Get the [missao] column value.
	 * 
	 * @return     string
	 */
	public function getMissao()
	{
		return $this->missao;
	}

	/**
	 * Get the [valores] column value.
	 * 
	 * @return     string
	 */
	public function getValores()
	{
		return $this->valores;
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
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
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
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = IgrejaPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [criador_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function setCriadorId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->criador_id !== $v) {
			$this->criador_id = $v;
			$this->modifiedColumns[] = IgrejaPeer::CRIADOR_ID;
		}

		if ($this->aUsuarioRelatedByCriadorId !== null && $this->aUsuarioRelatedByCriadorId->getId() !== $v) {
			$this->aUsuarioRelatedByCriadorId = null;
		}

		return $this;
	} // setCriadorId()

	/**
	 * Set the value of [responsavel_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function setResponsavelId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->responsavel_id !== $v) {
			$this->responsavel_id = $v;
			$this->modifiedColumns[] = IgrejaPeer::RESPONSAVEL_ID;
		}

		if ($this->aUsuarioRelatedByResponsavelId !== null && $this->aUsuarioRelatedByResponsavelId->getId() !== $v) {
			$this->aUsuarioRelatedByResponsavelId = null;
		}

		return $this;
	} // setResponsavelId()

	/**
	 * Set the value of [endereco_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function setEnderecoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->endereco_id !== $v) {
			$this->endereco_id = $v;
			$this->modifiedColumns[] = IgrejaPeer::ENDERECO_ID;
		}

		if ($this->aEndereco !== null && $this->aEndereco->getId() !== $v) {
			$this->aEndereco = null;
		}

		return $this;
	} // setEnderecoId()

	/**
	 * Set the value of [igreja_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function setIgrejaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->igreja_id !== $v) {
			$this->igreja_id = $v;
			$this->modifiedColumns[] = IgrejaPeer::IGREJA_ID;
		}

		if ($this->aIgrejaRelatedByIgrejaId !== null && $this->aIgrejaRelatedByIgrejaId->getId() !== $v) {
			$this->aIgrejaRelatedByIgrejaId = null;
		}

		return $this;
	} // setIgrejaId()

	/**
	 * Set the value of [tipo] column.
	 * 
	 * @param      string $v new value
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function setTipo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->tipo !== $v) {
			$this->tipo = $v;
			$this->modifiedColumns[] = IgrejaPeer::TIPO;
		}

		return $this;
	} // setTipo()

	/**
	 * Set the value of [nome_fantasia] column.
	 * 
	 * @param      string $v new value
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function setNomeFantasia($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome_fantasia !== $v) {
			$this->nome_fantasia = $v;
			$this->modifiedColumns[] = IgrejaPeer::NOME_FANTASIA;
		}

		return $this;
	} // setNomeFantasia()

	/**
	 * Set the value of [razao_social] column.
	 * 
	 * @param      string $v new value
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function setRazaoSocial($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->razao_social !== $v) {
			$this->razao_social = $v;
			$this->modifiedColumns[] = IgrejaPeer::RAZAO_SOCIAL;
		}

		return $this;
	} // setRazaoSocial()

	/**
	 * Set the value of [cnpj] column.
	 * 
	 * @param      string $v new value
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function setCnpj($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cnpj !== $v) {
			$this->cnpj = $v;
			$this->modifiedColumns[] = IgrejaPeer::CNPJ;
		}

		return $this;
	} // setCnpj()

	/**
	 * Sets the value of the [ativa] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Igreja The current object (for fluent API support)
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
			$this->modifiedColumns[] = IgrejaPeer::ATIVA;
		}

		return $this;
	} // setAtiva()

	/**
	 * Set the value of [site] column.
	 * 
	 * @param      string $v new value
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function setSite($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->site !== $v) {
			$this->site = $v;
			$this->modifiedColumns[] = IgrejaPeer::SITE;
		}

		return $this;
	} // setSite()

	/**
	 * Set the value of [sobre_nos] column.
	 * 
	 * @param      string $v new value
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function setSobreNos($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->sobre_nos !== $v) {
			$this->sobre_nos = $v;
			$this->modifiedColumns[] = IgrejaPeer::SOBRE_NOS;
		}

		return $this;
	} // setSobreNos()

	/**
	 * Set the value of [visao] column.
	 * 
	 * @param      string $v new value
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function setVisao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->visao !== $v) {
			$this->visao = $v;
			$this->modifiedColumns[] = IgrejaPeer::VISAO;
		}

		return $this;
	} // setVisao()

	/**
	 * Set the value of [missao] column.
	 * 
	 * @param      string $v new value
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function setMissao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->missao !== $v) {
			$this->missao = $v;
			$this->modifiedColumns[] = IgrejaPeer::MISSAO;
		}

		return $this;
	} // setMissao()

	/**
	 * Set the value of [valores] column.
	 * 
	 * @param      string $v new value
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function setValores($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->valores !== $v) {
			$this->valores = $v;
			$this->modifiedColumns[] = IgrejaPeer::VALORES;
		}

		return $this;
	} // setValores()

	/**
	 * Sets the value of [data_cadastro] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function setDataCadastro($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_cadastro !== null || $dt !== null) {
			$currentDateAsString = ($this->data_cadastro !== null && $tmpDt = new DateTime($this->data_cadastro)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_cadastro = $newDateAsString;
				$this->modifiedColumns[] = IgrejaPeer::DATA_CADASTRO;
			}
		} // if either are not null

		return $this;
	} // setDataCadastro()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = IgrejaPeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [telefone] column.
	 * 
	 * @param      string $v new value
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function setTelefone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->telefone !== $v) {
			$this->telefone = $v;
			$this->modifiedColumns[] = IgrejaPeer::TELEFONE;
		}

		return $this;
	} // setTelefone()

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
			$this->criador_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->responsavel_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->endereco_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->igreja_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->tipo = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->nome_fantasia = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->razao_social = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->cnpj = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->ativa = ($row[$startcol + 9] !== null) ? (boolean) $row[$startcol + 9] : null;
			$this->site = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->sobre_nos = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->visao = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->missao = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->valores = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->data_cadastro = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->email = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->telefone = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 18; // 18 = IgrejaPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Igreja object", $e);
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

		if ($this->aUsuarioRelatedByCriadorId !== null && $this->criador_id !== $this->aUsuarioRelatedByCriadorId->getId()) {
			$this->aUsuarioRelatedByCriadorId = null;
		}
		if ($this->aUsuarioRelatedByResponsavelId !== null && $this->responsavel_id !== $this->aUsuarioRelatedByResponsavelId->getId()) {
			$this->aUsuarioRelatedByResponsavelId = null;
		}
		if ($this->aEndereco !== null && $this->endereco_id !== $this->aEndereco->getId()) {
			$this->aEndereco = null;
		}
		if ($this->aIgrejaRelatedByIgrejaId !== null && $this->igreja_id !== $this->aIgrejaRelatedByIgrejaId->getId()) {
			$this->aIgrejaRelatedByIgrejaId = null;
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
			$con = Propel::getConnection(IgrejaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = IgrejaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aEndereco = null;
			$this->aIgrejaRelatedByIgrejaId = null;
			$this->aUsuarioRelatedByResponsavelId = null;
			$this->aUsuarioRelatedByCriadorId = null;
			$this->collAgendaIgrejas = null;

			$this->collIgrejasRelatedById = null;

			$this->collMembrosRelatedByFilialId = null;

			$this->collMembrosRelatedByInstituicaoId = null;

			$this->collMinisteriosRelatedByIgrejaPertencenteId = null;

			$this->collMinisteriosRelatedByInstituicaoId = null;

			$this->collNoticiaIgrejas = null;

			$this->collPedidoOracaos = null;

			$this->collPgs = null;

			$this->collPodcastIgrejas = null;

			$this->collUsuariosRelatedByFilialId = null;

			$this->collUsuariosRelatedByInstituicaoId = null;

			$this->collUsuarioFilials = null;

			$this->collVideoIgrejas = null;

			$this->collAgendas = null;
			$this->collNoticias = null;
			$this->collPodcasts = null;
			$this->collUsuarios = null;
			$this->collVideos = null;
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
			$con = Propel::getConnection(IgrejaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = IgrejaQuery::create()
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
			$con = Propel::getConnection(IgrejaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				IgrejaPeer::addInstanceToPool($this);
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

			if ($this->aIgrejaRelatedByIgrejaId !== null) {
				if ($this->aIgrejaRelatedByIgrejaId->isModified() || $this->aIgrejaRelatedByIgrejaId->isNew()) {
					$affectedRows += $this->aIgrejaRelatedByIgrejaId->save($con);
				}
				$this->setIgrejaRelatedByIgrejaId($this->aIgrejaRelatedByIgrejaId);
			}

			if ($this->aUsuarioRelatedByResponsavelId !== null) {
				if ($this->aUsuarioRelatedByResponsavelId->isModified() || $this->aUsuarioRelatedByResponsavelId->isNew()) {
					$affectedRows += $this->aUsuarioRelatedByResponsavelId->save($con);
				}
				$this->setUsuarioRelatedByResponsavelId($this->aUsuarioRelatedByResponsavelId);
			}

			if ($this->aUsuarioRelatedByCriadorId !== null) {
				if ($this->aUsuarioRelatedByCriadorId->isModified() || $this->aUsuarioRelatedByCriadorId->isNew()) {
					$affectedRows += $this->aUsuarioRelatedByCriadorId->save($con);
				}
				$this->setUsuarioRelatedByCriadorId($this->aUsuarioRelatedByCriadorId);
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

			if ($this->agendasScheduledForDeletion !== null) {
				if (!$this->agendasScheduledForDeletion->isEmpty()) {
					AgendaIgrejaQuery::create()
						->filterByPrimaryKeys($this->agendasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->agendasScheduledForDeletion = null;
				}

				foreach ($this->getAgendas() as $agenda) {
					if ($agenda->isModified()) {
						$agenda->save($con);
					}
				}
			}

			if ($this->noticiasScheduledForDeletion !== null) {
				if (!$this->noticiasScheduledForDeletion->isEmpty()) {
					NoticiaIgrejaQuery::create()
						->filterByPrimaryKeys($this->noticiasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->noticiasScheduledForDeletion = null;
				}

				foreach ($this->getNoticias() as $noticia) {
					if ($noticia->isModified()) {
						$noticia->save($con);
					}
				}
			}

			if ($this->podcastsScheduledForDeletion !== null) {
				if (!$this->podcastsScheduledForDeletion->isEmpty()) {
					PodcastIgrejaQuery::create()
						->filterByPrimaryKeys($this->podcastsScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->podcastsScheduledForDeletion = null;
				}

				foreach ($this->getPodcasts() as $podcast) {
					if ($podcast->isModified()) {
						$podcast->save($con);
					}
				}
			}

			if ($this->usuariosScheduledForDeletion !== null) {
				if (!$this->usuariosScheduledForDeletion->isEmpty()) {
					UsuarioFilialQuery::create()
						->filterByPrimaryKeys($this->usuariosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->usuariosScheduledForDeletion = null;
				}

				foreach ($this->getUsuarios() as $usuario) {
					if ($usuario->isModified()) {
						$usuario->save($con);
					}
				}
			}

			if ($this->videosScheduledForDeletion !== null) {
				if (!$this->videosScheduledForDeletion->isEmpty()) {
					VideoIgrejaQuery::create()
						->filterByPrimaryKeys($this->videosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->videosScheduledForDeletion = null;
				}

				foreach ($this->getVideos() as $video) {
					if ($video->isModified()) {
						$video->save($con);
					}
				}
			}

			if ($this->agendaIgrejasScheduledForDeletion !== null) {
				if (!$this->agendaIgrejasScheduledForDeletion->isEmpty()) {
					AgendaIgrejaQuery::create()
						->filterByPrimaryKeys($this->agendaIgrejasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->agendaIgrejasScheduledForDeletion = null;
				}
			}

			if ($this->collAgendaIgrejas !== null) {
				foreach ($this->collAgendaIgrejas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->igrejasRelatedByIdScheduledForDeletion !== null) {
				if (!$this->igrejasRelatedByIdScheduledForDeletion->isEmpty()) {
					IgrejaQuery::create()
						->filterByPrimaryKeys($this->igrejasRelatedByIdScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->igrejasRelatedByIdScheduledForDeletion = null;
				}
			}

			if ($this->collIgrejasRelatedById !== null) {
				foreach ($this->collIgrejasRelatedById as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->membrosRelatedByFilialIdScheduledForDeletion !== null) {
				if (!$this->membrosRelatedByFilialIdScheduledForDeletion->isEmpty()) {
					MembroQuery::create()
						->filterByPrimaryKeys($this->membrosRelatedByFilialIdScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->membrosRelatedByFilialIdScheduledForDeletion = null;
				}
			}

			if ($this->collMembrosRelatedByFilialId !== null) {
				foreach ($this->collMembrosRelatedByFilialId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->membrosRelatedByInstituicaoIdScheduledForDeletion !== null) {
				if (!$this->membrosRelatedByInstituicaoIdScheduledForDeletion->isEmpty()) {
					MembroQuery::create()
						->filterByPrimaryKeys($this->membrosRelatedByInstituicaoIdScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->membrosRelatedByInstituicaoIdScheduledForDeletion = null;
				}
			}

			if ($this->collMembrosRelatedByInstituicaoId !== null) {
				foreach ($this->collMembrosRelatedByInstituicaoId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->ministeriosRelatedByIgrejaPertencenteIdScheduledForDeletion !== null) {
				if (!$this->ministeriosRelatedByIgrejaPertencenteIdScheduledForDeletion->isEmpty()) {
					MinisterioQuery::create()
						->filterByPrimaryKeys($this->ministeriosRelatedByIgrejaPertencenteIdScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->ministeriosRelatedByIgrejaPertencenteIdScheduledForDeletion = null;
				}
			}

			if ($this->collMinisteriosRelatedByIgrejaPertencenteId !== null) {
				foreach ($this->collMinisteriosRelatedByIgrejaPertencenteId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->ministeriosRelatedByInstituicaoIdScheduledForDeletion !== null) {
				if (!$this->ministeriosRelatedByInstituicaoIdScheduledForDeletion->isEmpty()) {
					MinisterioQuery::create()
						->filterByPrimaryKeys($this->ministeriosRelatedByInstituicaoIdScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->ministeriosRelatedByInstituicaoIdScheduledForDeletion = null;
				}
			}

			if ($this->collMinisteriosRelatedByInstituicaoId !== null) {
				foreach ($this->collMinisteriosRelatedByInstituicaoId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->noticiaIgrejasScheduledForDeletion !== null) {
				if (!$this->noticiaIgrejasScheduledForDeletion->isEmpty()) {
					NoticiaIgrejaQuery::create()
						->filterByPrimaryKeys($this->noticiaIgrejasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->noticiaIgrejasScheduledForDeletion = null;
				}
			}

			if ($this->collNoticiaIgrejas !== null) {
				foreach ($this->collNoticiaIgrejas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->pedidoOracaosScheduledForDeletion !== null) {
				if (!$this->pedidoOracaosScheduledForDeletion->isEmpty()) {
					PedidoOracaoQuery::create()
						->filterByPrimaryKeys($this->pedidoOracaosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->pedidoOracaosScheduledForDeletion = null;
				}
			}

			if ($this->collPedidoOracaos !== null) {
				foreach ($this->collPedidoOracaos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->pgsScheduledForDeletion !== null) {
				if (!$this->pgsScheduledForDeletion->isEmpty()) {
					PgQuery::create()
						->filterByPrimaryKeys($this->pgsScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->pgsScheduledForDeletion = null;
				}
			}

			if ($this->collPgs !== null) {
				foreach ($this->collPgs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
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

			if ($this->usuariosRelatedByFilialIdScheduledForDeletion !== null) {
				if (!$this->usuariosRelatedByFilialIdScheduledForDeletion->isEmpty()) {
					UsuarioQuery::create()
						->filterByPrimaryKeys($this->usuariosRelatedByFilialIdScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->usuariosRelatedByFilialIdScheduledForDeletion = null;
				}
			}

			if ($this->collUsuariosRelatedByFilialId !== null) {
				foreach ($this->collUsuariosRelatedByFilialId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->usuariosRelatedByInstituicaoIdScheduledForDeletion !== null) {
				if (!$this->usuariosRelatedByInstituicaoIdScheduledForDeletion->isEmpty()) {
					UsuarioQuery::create()
						->filterByPrimaryKeys($this->usuariosRelatedByInstituicaoIdScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->usuariosRelatedByInstituicaoIdScheduledForDeletion = null;
				}
			}

			if ($this->collUsuariosRelatedByInstituicaoId !== null) {
				foreach ($this->collUsuariosRelatedByInstituicaoId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->usuarioFilialsScheduledForDeletion !== null) {
				if (!$this->usuarioFilialsScheduledForDeletion->isEmpty()) {
					UsuarioFilialQuery::create()
						->filterByPrimaryKeys($this->usuarioFilialsScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->usuarioFilialsScheduledForDeletion = null;
				}
			}

			if ($this->collUsuarioFilials !== null) {
				foreach ($this->collUsuarioFilials as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->videoIgrejasScheduledForDeletion !== null) {
				if (!$this->videoIgrejasScheduledForDeletion->isEmpty()) {
					VideoIgrejaQuery::create()
						->filterByPrimaryKeys($this->videoIgrejasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->videoIgrejasScheduledForDeletion = null;
				}
			}

			if ($this->collVideoIgrejas !== null) {
				foreach ($this->collVideoIgrejas as $referrerFK) {
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

		$this->modifiedColumns[] = IgrejaPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . IgrejaPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(IgrejaPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(IgrejaPeer::CRIADOR_ID)) {
			$modifiedColumns[':p' . $index++]  = '`CRIADOR_ID`';
		}
		if ($this->isColumnModified(IgrejaPeer::RESPONSAVEL_ID)) {
			$modifiedColumns[':p' . $index++]  = '`RESPONSAVEL_ID`';
		}
		if ($this->isColumnModified(IgrejaPeer::ENDERECO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ENDERECO_ID`';
		}
		if ($this->isColumnModified(IgrejaPeer::IGREJA_ID)) {
			$modifiedColumns[':p' . $index++]  = '`IGREJA_ID`';
		}
		if ($this->isColumnModified(IgrejaPeer::TIPO)) {
			$modifiedColumns[':p' . $index++]  = '`TIPO`';
		}
		if ($this->isColumnModified(IgrejaPeer::NOME_FANTASIA)) {
			$modifiedColumns[':p' . $index++]  = '`NOME_FANTASIA`';
		}
		if ($this->isColumnModified(IgrejaPeer::RAZAO_SOCIAL)) {
			$modifiedColumns[':p' . $index++]  = '`RAZAO_SOCIAL`';
		}
		if ($this->isColumnModified(IgrejaPeer::CNPJ)) {
			$modifiedColumns[':p' . $index++]  = '`CNPJ`';
		}
		if ($this->isColumnModified(IgrejaPeer::ATIVA)) {
			$modifiedColumns[':p' . $index++]  = '`ATIVA`';
		}
		if ($this->isColumnModified(IgrejaPeer::SITE)) {
			$modifiedColumns[':p' . $index++]  = '`SITE`';
		}
		if ($this->isColumnModified(IgrejaPeer::SOBRE_NOS)) {
			$modifiedColumns[':p' . $index++]  = '`SOBRE_NOS`';
		}
		if ($this->isColumnModified(IgrejaPeer::VISAO)) {
			$modifiedColumns[':p' . $index++]  = '`VISAO`';
		}
		if ($this->isColumnModified(IgrejaPeer::MISSAO)) {
			$modifiedColumns[':p' . $index++]  = '`MISSAO`';
		}
		if ($this->isColumnModified(IgrejaPeer::VALORES)) {
			$modifiedColumns[':p' . $index++]  = '`VALORES`';
		}
		if ($this->isColumnModified(IgrejaPeer::DATA_CADASTRO)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_CADASTRO`';
		}
		if ($this->isColumnModified(IgrejaPeer::EMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`EMAIL`';
		}
		if ($this->isColumnModified(IgrejaPeer::TELEFONE)) {
			$modifiedColumns[':p' . $index++]  = '`TELEFONE`';
		}

		$sql = sprintf(
			'INSERT INTO `igreja` (%s) VALUES (%s)',
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
					case '`RESPONSAVEL_ID`':						
						$stmt->bindValue($identifier, $this->responsavel_id, PDO::PARAM_INT);
						break;
					case '`ENDERECO_ID`':						
						$stmt->bindValue($identifier, $this->endereco_id, PDO::PARAM_INT);
						break;
					case '`IGREJA_ID`':						
						$stmt->bindValue($identifier, $this->igreja_id, PDO::PARAM_INT);
						break;
					case '`TIPO`':						
						$stmt->bindValue($identifier, $this->tipo, PDO::PARAM_STR);
						break;
					case '`NOME_FANTASIA`':						
						$stmt->bindValue($identifier, $this->nome_fantasia, PDO::PARAM_STR);
						break;
					case '`RAZAO_SOCIAL`':						
						$stmt->bindValue($identifier, $this->razao_social, PDO::PARAM_STR);
						break;
					case '`CNPJ`':						
						$stmt->bindValue($identifier, $this->cnpj, PDO::PARAM_STR);
						break;
					case '`ATIVA`':
						$stmt->bindValue($identifier, (int) $this->ativa, PDO::PARAM_INT);
						break;
					case '`SITE`':						
						$stmt->bindValue($identifier, $this->site, PDO::PARAM_STR);
						break;
					case '`SOBRE_NOS`':						
						$stmt->bindValue($identifier, $this->sobre_nos, PDO::PARAM_STR);
						break;
					case '`VISAO`':						
						$stmt->bindValue($identifier, $this->visao, PDO::PARAM_STR);
						break;
					case '`MISSAO`':						
						$stmt->bindValue($identifier, $this->missao, PDO::PARAM_STR);
						break;
					case '`VALORES`':						
						$stmt->bindValue($identifier, $this->valores, PDO::PARAM_STR);
						break;
					case '`DATA_CADASTRO`':						
						$stmt->bindValue($identifier, $this->data_cadastro, PDO::PARAM_STR);
						break;
					case '`EMAIL`':						
						$stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
						break;
					case '`TELEFONE`':						
						$stmt->bindValue($identifier, $this->telefone, PDO::PARAM_STR);
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
		$pos = IgrejaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getResponsavelId();
				break;
			case 3:
				return $this->getEnderecoId();
				break;
			case 4:
				return $this->getIgrejaId();
				break;
			case 5:
				return $this->getTipo();
				break;
			case 6:
				return $this->getNomeFantasia();
				break;
			case 7:
				return $this->getRazaoSocial();
				break;
			case 8:
				return $this->getCnpj();
				break;
			case 9:
				return $this->getAtiva();
				break;
			case 10:
				return $this->getSite();
				break;
			case 11:
				return $this->getSobreNos();
				break;
			case 12:
				return $this->getVisao();
				break;
			case 13:
				return $this->getMissao();
				break;
			case 14:
				return $this->getValores();
				break;
			case 15:
				return $this->getDataCadastro();
				break;
			case 16:
				return $this->getEmail();
				break;
			case 17:
				return $this->getTelefone();
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
		if (isset($alreadyDumpedObjects['Igreja'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Igreja'][$this->getPrimaryKey()] = true;
		$keys = IgrejaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getCriadorId(),
			$keys[2] => $this->getResponsavelId(),
			$keys[3] => $this->getEnderecoId(),
			$keys[4] => $this->getIgrejaId(),
			$keys[5] => $this->getTipo(),
			$keys[6] => $this->getNomeFantasia(),
			$keys[7] => $this->getRazaoSocial(),
			$keys[8] => $this->getCnpj(),
			$keys[9] => $this->getAtiva(),
			$keys[10] => $this->getSite(),
			$keys[11] => $this->getSobreNos(),
			$keys[12] => $this->getVisao(),
			$keys[13] => $this->getMissao(),
			$keys[14] => $this->getValores(),
			$keys[15] => $this->getDataCadastro(),
			$keys[16] => $this->getEmail(),
			$keys[17] => $this->getTelefone(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aEndereco) {
				$result['Endereco'] = $this->aEndereco->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aIgrejaRelatedByIgrejaId) {
				$result['IgrejaRelatedByIgrejaId'] = $this->aIgrejaRelatedByIgrejaId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aUsuarioRelatedByResponsavelId) {
				$result['UsuarioRelatedByResponsavelId'] = $this->aUsuarioRelatedByResponsavelId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aUsuarioRelatedByCriadorId) {
				$result['UsuarioRelatedByCriadorId'] = $this->aUsuarioRelatedByCriadorId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collAgendaIgrejas) {
				$result['AgendaIgrejas'] = $this->collAgendaIgrejas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collIgrejasRelatedById) {
				$result['IgrejasRelatedById'] = $this->collIgrejasRelatedById->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collMembrosRelatedByFilialId) {
				$result['MembrosRelatedByFilialId'] = $this->collMembrosRelatedByFilialId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collMembrosRelatedByInstituicaoId) {
				$result['MembrosRelatedByInstituicaoId'] = $this->collMembrosRelatedByInstituicaoId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collMinisteriosRelatedByIgrejaPertencenteId) {
				$result['MinisteriosRelatedByIgrejaPertencenteId'] = $this->collMinisteriosRelatedByIgrejaPertencenteId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collMinisteriosRelatedByInstituicaoId) {
				$result['MinisteriosRelatedByInstituicaoId'] = $this->collMinisteriosRelatedByInstituicaoId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collNoticiaIgrejas) {
				$result['NoticiaIgrejas'] = $this->collNoticiaIgrejas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collPedidoOracaos) {
				$result['PedidoOracaos'] = $this->collPedidoOracaos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collPgs) {
				$result['Pgs'] = $this->collPgs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collPodcastIgrejas) {
				$result['PodcastIgrejas'] = $this->collPodcastIgrejas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collUsuariosRelatedByFilialId) {
				$result['UsuariosRelatedByFilialId'] = $this->collUsuariosRelatedByFilialId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collUsuariosRelatedByInstituicaoId) {
				$result['UsuariosRelatedByInstituicaoId'] = $this->collUsuariosRelatedByInstituicaoId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collUsuarioFilials) {
				$result['UsuarioFilials'] = $this->collUsuarioFilials->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collVideoIgrejas) {
				$result['VideoIgrejas'] = $this->collVideoIgrejas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = IgrejaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setResponsavelId($value);
				break;
			case 3:
				$this->setEnderecoId($value);
				break;
			case 4:
				$this->setIgrejaId($value);
				break;
			case 5:
				$this->setTipo($value);
				break;
			case 6:
				$this->setNomeFantasia($value);
				break;
			case 7:
				$this->setRazaoSocial($value);
				break;
			case 8:
				$this->setCnpj($value);
				break;
			case 9:
				$this->setAtiva($value);
				break;
			case 10:
				$this->setSite($value);
				break;
			case 11:
				$this->setSobreNos($value);
				break;
			case 12:
				$this->setVisao($value);
				break;
			case 13:
				$this->setMissao($value);
				break;
			case 14:
				$this->setValores($value);
				break;
			case 15:
				$this->setDataCadastro($value);
				break;
			case 16:
				$this->setEmail($value);
				break;
			case 17:
				$this->setTelefone($value);
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
		$keys = IgrejaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setCriadorId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setResponsavelId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEnderecoId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIgrejaId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTipo($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNomeFantasia($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRazaoSocial($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCnpj($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAtiva($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setSite($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSobreNos($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setVisao($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setMissao($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setValores($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDataCadastro($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setEmail($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setTelefone($arr[$keys[17]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(IgrejaPeer::DATABASE_NAME);

		if ($this->isColumnModified(IgrejaPeer::ID)) $criteria->add(IgrejaPeer::ID, $this->id);
		if ($this->isColumnModified(IgrejaPeer::CRIADOR_ID)) $criteria->add(IgrejaPeer::CRIADOR_ID, $this->criador_id);
		if ($this->isColumnModified(IgrejaPeer::RESPONSAVEL_ID)) $criteria->add(IgrejaPeer::RESPONSAVEL_ID, $this->responsavel_id);
		if ($this->isColumnModified(IgrejaPeer::ENDERECO_ID)) $criteria->add(IgrejaPeer::ENDERECO_ID, $this->endereco_id);
		if ($this->isColumnModified(IgrejaPeer::IGREJA_ID)) $criteria->add(IgrejaPeer::IGREJA_ID, $this->igreja_id);
		if ($this->isColumnModified(IgrejaPeer::TIPO)) $criteria->add(IgrejaPeer::TIPO, $this->tipo);
		if ($this->isColumnModified(IgrejaPeer::NOME_FANTASIA)) $criteria->add(IgrejaPeer::NOME_FANTASIA, $this->nome_fantasia);
		if ($this->isColumnModified(IgrejaPeer::RAZAO_SOCIAL)) $criteria->add(IgrejaPeer::RAZAO_SOCIAL, $this->razao_social);
		if ($this->isColumnModified(IgrejaPeer::CNPJ)) $criteria->add(IgrejaPeer::CNPJ, $this->cnpj);
		if ($this->isColumnModified(IgrejaPeer::ATIVA)) $criteria->add(IgrejaPeer::ATIVA, $this->ativa);
		if ($this->isColumnModified(IgrejaPeer::SITE)) $criteria->add(IgrejaPeer::SITE, $this->site);
		if ($this->isColumnModified(IgrejaPeer::SOBRE_NOS)) $criteria->add(IgrejaPeer::SOBRE_NOS, $this->sobre_nos);
		if ($this->isColumnModified(IgrejaPeer::VISAO)) $criteria->add(IgrejaPeer::VISAO, $this->visao);
		if ($this->isColumnModified(IgrejaPeer::MISSAO)) $criteria->add(IgrejaPeer::MISSAO, $this->missao);
		if ($this->isColumnModified(IgrejaPeer::VALORES)) $criteria->add(IgrejaPeer::VALORES, $this->valores);
		if ($this->isColumnModified(IgrejaPeer::DATA_CADASTRO)) $criteria->add(IgrejaPeer::DATA_CADASTRO, $this->data_cadastro);
		if ($this->isColumnModified(IgrejaPeer::EMAIL)) $criteria->add(IgrejaPeer::EMAIL, $this->email);
		if ($this->isColumnModified(IgrejaPeer::TELEFONE)) $criteria->add(IgrejaPeer::TELEFONE, $this->telefone);

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
		$criteria = new Criteria(IgrejaPeer::DATABASE_NAME);
		$criteria->add(IgrejaPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Igreja (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setCriadorId($this->getCriadorId());
		$copyObj->setResponsavelId($this->getResponsavelId());
		$copyObj->setEnderecoId($this->getEnderecoId());
		$copyObj->setIgrejaId($this->getIgrejaId());
		$copyObj->setTipo($this->getTipo());
		$copyObj->setNomeFantasia($this->getNomeFantasia());
		$copyObj->setRazaoSocial($this->getRazaoSocial());
		$copyObj->setCnpj($this->getCnpj());
		$copyObj->setAtiva($this->getAtiva());
		$copyObj->setSite($this->getSite());
		$copyObj->setSobreNos($this->getSobreNos());
		$copyObj->setVisao($this->getVisao());
		$copyObj->setMissao($this->getMissao());
		$copyObj->setValores($this->getValores());
		$copyObj->setDataCadastro($this->getDataCadastro());
		$copyObj->setEmail($this->getEmail());
		$copyObj->setTelefone($this->getTelefone());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getAgendaIgrejas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAgendaIgreja($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getIgrejasRelatedById() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addIgrejaRelatedById($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getMembrosRelatedByFilialId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addMembroRelatedByFilialId($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getMembrosRelatedByInstituicaoId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addMembroRelatedByInstituicaoId($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getMinisteriosRelatedByIgrejaPertencenteId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addMinisterioRelatedByIgrejaPertencenteId($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getMinisteriosRelatedByInstituicaoId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addMinisterioRelatedByInstituicaoId($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getNoticiaIgrejas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addNoticiaIgreja($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getPedidoOracaos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPedidoOracao($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getPgs() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPg($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getPodcastIgrejas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPodcastIgreja($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getUsuariosRelatedByFilialId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUsuarioRelatedByFilialId($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getUsuariosRelatedByInstituicaoId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUsuarioRelatedByInstituicaoId($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getUsuarioFilials() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUsuarioFilial($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getVideoIgrejas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addVideoIgreja($relObj->copy($deepCopy));
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
	 * @return     Igreja Clone of current object.
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
	 * @return     IgrejaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new IgrejaPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Endereco object.
	 *
	 * @param      Endereco $v
	 * @return     Igreja The current object (for fluent API support)
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
			$v->addIgreja($this);
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
				$this->aEndereco->addIgrejas($this);
			 */
		}
		return $this->aEndereco;
	}

	/**
	 * Declares an association between this object and a Igreja object.
	 *
	 * @param      Igreja $v
	 * @return     Igreja The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setIgrejaRelatedByIgrejaId(Igreja $v = null)
	{
		if ($v === null) {
			$this->setIgrejaId(NULL);
		} else {
			$this->setIgrejaId($v->getId());
		}

		$this->aIgrejaRelatedByIgrejaId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Igreja object, it will not be re-added.
		if ($v !== null) {
			$v->addIgrejaRelatedById($this);
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
	public function getIgrejaRelatedByIgrejaId(PropelPDO $con = null)
	{
		if ($this->aIgrejaRelatedByIgrejaId === null && ($this->igreja_id !== null)) {
			$this->aIgrejaRelatedByIgrejaId = IgrejaQuery::create()->findPk($this->igreja_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aIgrejaRelatedByIgrejaId->addIgrejasRelatedById($this);
			 */
		}
		return $this->aIgrejaRelatedByIgrejaId;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     Igreja The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUsuarioRelatedByResponsavelId(Usuario $v = null)
	{
		if ($v === null) {
			$this->setResponsavelId(NULL);
		} else {
			$this->setResponsavelId($v->getId());
		}

		$this->aUsuarioRelatedByResponsavelId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Usuario object, it will not be re-added.
		if ($v !== null) {
			$v->addIgrejaRelatedByResponsavelId($this);
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
	public function getUsuarioRelatedByResponsavelId(PropelPDO $con = null)
	{
		if ($this->aUsuarioRelatedByResponsavelId === null && ($this->responsavel_id !== null)) {
			$this->aUsuarioRelatedByResponsavelId = UsuarioQuery::create()->findPk($this->responsavel_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aUsuarioRelatedByResponsavelId->addIgrejasRelatedByResponsavelId($this);
			 */
		}
		return $this->aUsuarioRelatedByResponsavelId;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     Igreja The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUsuarioRelatedByCriadorId(Usuario $v = null)
	{
		if ($v === null) {
			$this->setCriadorId(NULL);
		} else {
			$this->setCriadorId($v->getId());
		}

		$this->aUsuarioRelatedByCriadorId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Usuario object, it will not be re-added.
		if ($v !== null) {
			$v->addIgrejaRelatedByCriadorId($this);
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
	public function getUsuarioRelatedByCriadorId(PropelPDO $con = null)
	{
		if ($this->aUsuarioRelatedByCriadorId === null && ($this->criador_id !== null)) {
			$this->aUsuarioRelatedByCriadorId = UsuarioQuery::create()->findPk($this->criador_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aUsuarioRelatedByCriadorId->addIgrejasRelatedByCriadorId($this);
			 */
		}
		return $this->aUsuarioRelatedByCriadorId;
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
		if ('AgendaIgreja' == $relationName) {
			return $this->initAgendaIgrejas();
		}
		if ('IgrejaRelatedById' == $relationName) {
			return $this->initIgrejasRelatedById();
		}
		if ('MembroRelatedByFilialId' == $relationName) {
			return $this->initMembrosRelatedByFilialId();
		}
		if ('MembroRelatedByInstituicaoId' == $relationName) {
			return $this->initMembrosRelatedByInstituicaoId();
		}
		if ('MinisterioRelatedByIgrejaPertencenteId' == $relationName) {
			return $this->initMinisteriosRelatedByIgrejaPertencenteId();
		}
		if ('MinisterioRelatedByInstituicaoId' == $relationName) {
			return $this->initMinisteriosRelatedByInstituicaoId();
		}
		if ('NoticiaIgreja' == $relationName) {
			return $this->initNoticiaIgrejas();
		}
		if ('PedidoOracao' == $relationName) {
			return $this->initPedidoOracaos();
		}
		if ('Pg' == $relationName) {
			return $this->initPgs();
		}
		if ('PodcastIgreja' == $relationName) {
			return $this->initPodcastIgrejas();
		}
		if ('UsuarioRelatedByFilialId' == $relationName) {
			return $this->initUsuariosRelatedByFilialId();
		}
		if ('UsuarioRelatedByInstituicaoId' == $relationName) {
			return $this->initUsuariosRelatedByInstituicaoId();
		}
		if ('UsuarioFilial' == $relationName) {
			return $this->initUsuarioFilials();
		}
		if ('VideoIgreja' == $relationName) {
			return $this->initVideoIgrejas();
		}
	}

	/**
	 * Clears out the collAgendaIgrejas collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAgendaIgrejas()
	 */
	public function clearAgendaIgrejas()
	{
		$this->collAgendaIgrejas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAgendaIgrejas collection.
	 *
	 * By default this just sets the collAgendaIgrejas collection to an empty array (like clearcollAgendaIgrejas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initAgendaIgrejas($overrideExisting = true)
	{
		if (null !== $this->collAgendaIgrejas && !$overrideExisting) {
			return;
		}
		$this->collAgendaIgrejas = new PropelObjectCollection();
		$this->collAgendaIgrejas->setModel('AgendaIgreja');
	}

	/**
	 * Gets an array of AgendaIgreja objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Igreja is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AgendaIgreja[] List of AgendaIgreja objects
	 * @throws     PropelException
	 */
	public function getAgendaIgrejas($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAgendaIgrejas || null !== $criteria) {
			if ($this->isNew() && null === $this->collAgendaIgrejas) {
				// return empty collection
				$this->initAgendaIgrejas();
			} else {
				$collAgendaIgrejas = AgendaIgrejaQuery::create(null, $criteria)
					->filterByIgreja($this)
					->find($con);
				if (null !== $criteria) {
					return $collAgendaIgrejas;
				}
				$this->collAgendaIgrejas = $collAgendaIgrejas;
			}
		}
		return $this->collAgendaIgrejas;
	}

	/**
	 * Sets a collection of AgendaIgreja objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $agendaIgrejas A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setAgendaIgrejas(PropelCollection $agendaIgrejas, PropelPDO $con = null)
	{
		$this->agendaIgrejasScheduledForDeletion = $this->getAgendaIgrejas(new Criteria(), $con)->diff($agendaIgrejas);

		foreach ($agendaIgrejas as $agendaIgreja) {
			// Fix issue with collection modified by reference
			if ($agendaIgreja->isNew()) {
				$agendaIgreja->setIgreja($this);
			}
			$this->addAgendaIgreja($agendaIgreja);
		}

		$this->collAgendaIgrejas = $agendaIgrejas;
	}

	/**
	 * Returns the number of related AgendaIgreja objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AgendaIgreja objects.
	 * @throws     PropelException
	 */
	public function countAgendaIgrejas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAgendaIgrejas || null !== $criteria) {
			if ($this->isNew() && null === $this->collAgendaIgrejas) {
				return 0;
			} else {
				$query = AgendaIgrejaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByIgreja($this)
					->count($con);
			}
		} else {
			return count($this->collAgendaIgrejas);
		}
	}

	/**
	 * Method called to associate a AgendaIgreja object to this object
	 * through the AgendaIgreja foreign key attribute.
	 *
	 * @param      AgendaIgreja $l AgendaIgreja
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function addAgendaIgreja(AgendaIgreja $l)
	{
		if ($this->collAgendaIgrejas === null) {
			$this->initAgendaIgrejas();
		}
		if (!$this->collAgendaIgrejas->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddAgendaIgreja($l);
		}

		return $this;
	}

	/**
	 * @param	AgendaIgreja $agendaIgreja The agendaIgreja object to add.
	 */
	protected function doAddAgendaIgreja($agendaIgreja)
	{
		$this->collAgendaIgrejas[]= $agendaIgreja;
		$agendaIgreja->setIgreja($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related AgendaIgrejas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array AgendaIgreja[] List of AgendaIgreja objects
	 */
	public function getAgendaIgrejasJoinAgenda($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AgendaIgrejaQuery::create(null, $criteria);
		$query->joinWith('Agenda', $join_behavior);

		return $this->getAgendaIgrejas($query, $con);
	}

	/**
	 * Clears out the collIgrejasRelatedById collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addIgrejasRelatedById()
	 */
	public function clearIgrejasRelatedById()
	{
		$this->collIgrejasRelatedById = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collIgrejasRelatedById collection.
	 *
	 * By default this just sets the collIgrejasRelatedById collection to an empty array (like clearcollIgrejasRelatedById());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initIgrejasRelatedById($overrideExisting = true)
	{
		if (null !== $this->collIgrejasRelatedById && !$overrideExisting) {
			return;
		}
		$this->collIgrejasRelatedById = new PropelObjectCollection();
		$this->collIgrejasRelatedById->setModel('Igreja');
	}

	/**
	 * Gets an array of Igreja objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Igreja is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Igreja[] List of Igreja objects
	 * @throws     PropelException
	 */
	public function getIgrejasRelatedById($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collIgrejasRelatedById || null !== $criteria) {
			if ($this->isNew() && null === $this->collIgrejasRelatedById) {
				// return empty collection
				$this->initIgrejasRelatedById();
			} else {
				$collIgrejasRelatedById = IgrejaQuery::create(null, $criteria)
					->filterByIgrejaRelatedByIgrejaId($this)
					->find($con);
				if (null !== $criteria) {
					return $collIgrejasRelatedById;
				}
				$this->collIgrejasRelatedById = $collIgrejasRelatedById;
			}
		}
		return $this->collIgrejasRelatedById;
	}

	/**
	 * Sets a collection of IgrejaRelatedById objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $igrejasRelatedById A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setIgrejasRelatedById(PropelCollection $igrejasRelatedById, PropelPDO $con = null)
	{
		$this->igrejasRelatedByIdScheduledForDeletion = $this->getIgrejasRelatedById(new Criteria(), $con)->diff($igrejasRelatedById);

		foreach ($igrejasRelatedById as $igrejaRelatedById) {
			// Fix issue with collection modified by reference
			if ($igrejaRelatedById->isNew()) {
				$igrejaRelatedById->setIgrejaRelatedByIgrejaId($this);
			}
			$this->addIgrejaRelatedById($igrejaRelatedById);
		}

		$this->collIgrejasRelatedById = $igrejasRelatedById;
	}

	/**
	 * Returns the number of related Igreja objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Igreja objects.
	 * @throws     PropelException
	 */
	public function countIgrejasRelatedById(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collIgrejasRelatedById || null !== $criteria) {
			if ($this->isNew() && null === $this->collIgrejasRelatedById) {
				return 0;
			} else {
				$query = IgrejaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByIgrejaRelatedByIgrejaId($this)
					->count($con);
			}
		} else {
			return count($this->collIgrejasRelatedById);
		}
	}

	/**
	 * Method called to associate a Igreja object to this object
	 * through the Igreja foreign key attribute.
	 *
	 * @param      Igreja $l Igreja
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function addIgrejaRelatedById(Igreja $l)
	{
		if ($this->collIgrejasRelatedById === null) {
			$this->initIgrejasRelatedById();
		}
		if (!$this->collIgrejasRelatedById->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddIgrejaRelatedById($l);
		}

		return $this;
	}

	/**
	 * @param	IgrejaRelatedById $igrejaRelatedById The igrejaRelatedById object to add.
	 */
	protected function doAddIgrejaRelatedById($igrejaRelatedById)
	{
		$this->collIgrejasRelatedById[]= $igrejaRelatedById;
		$igrejaRelatedById->setIgrejaRelatedByIgrejaId($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related IgrejasRelatedById from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Igreja[] List of Igreja objects
	 */
	public function getIgrejasRelatedByIdJoinEndereco($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = IgrejaQuery::create(null, $criteria);
		$query->joinWith('Endereco', $join_behavior);

		return $this->getIgrejasRelatedById($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related IgrejasRelatedById from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Igreja[] List of Igreja objects
	 */
	public function getIgrejasRelatedByIdJoinUsuarioRelatedByResponsavelId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = IgrejaQuery::create(null, $criteria);
		$query->joinWith('UsuarioRelatedByResponsavelId', $join_behavior);

		return $this->getIgrejasRelatedById($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related IgrejasRelatedById from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Igreja[] List of Igreja objects
	 */
	public function getIgrejasRelatedByIdJoinUsuarioRelatedByCriadorId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = IgrejaQuery::create(null, $criteria);
		$query->joinWith('UsuarioRelatedByCriadorId', $join_behavior);

		return $this->getIgrejasRelatedById($query, $con);
	}

	/**
	 * Clears out the collMembrosRelatedByFilialId collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addMembrosRelatedByFilialId()
	 */
	public function clearMembrosRelatedByFilialId()
	{
		$this->collMembrosRelatedByFilialId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collMembrosRelatedByFilialId collection.
	 *
	 * By default this just sets the collMembrosRelatedByFilialId collection to an empty array (like clearcollMembrosRelatedByFilialId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initMembrosRelatedByFilialId($overrideExisting = true)
	{
		if (null !== $this->collMembrosRelatedByFilialId && !$overrideExisting) {
			return;
		}
		$this->collMembrosRelatedByFilialId = new PropelObjectCollection();
		$this->collMembrosRelatedByFilialId->setModel('Membro');
	}

	/**
	 * Gets an array of Membro objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Igreja is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Membro[] List of Membro objects
	 * @throws     PropelException
	 */
	public function getMembrosRelatedByFilialId($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collMembrosRelatedByFilialId || null !== $criteria) {
			if ($this->isNew() && null === $this->collMembrosRelatedByFilialId) {
				// return empty collection
				$this->initMembrosRelatedByFilialId();
			} else {
				$collMembrosRelatedByFilialId = MembroQuery::create(null, $criteria)
					->filterByIgrejaRelatedByFilialId($this)
					->find($con);
				if (null !== $criteria) {
					return $collMembrosRelatedByFilialId;
				}
				$this->collMembrosRelatedByFilialId = $collMembrosRelatedByFilialId;
			}
		}
		return $this->collMembrosRelatedByFilialId;
	}

	/**
	 * Sets a collection of MembroRelatedByFilialId objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $membrosRelatedByFilialId A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setMembrosRelatedByFilialId(PropelCollection $membrosRelatedByFilialId, PropelPDO $con = null)
	{
		$this->membrosRelatedByFilialIdScheduledForDeletion = $this->getMembrosRelatedByFilialId(new Criteria(), $con)->diff($membrosRelatedByFilialId);

		foreach ($membrosRelatedByFilialId as $membroRelatedByFilialId) {
			// Fix issue with collection modified by reference
			if ($membroRelatedByFilialId->isNew()) {
				$membroRelatedByFilialId->setIgrejaRelatedByFilialId($this);
			}
			$this->addMembroRelatedByFilialId($membroRelatedByFilialId);
		}

		$this->collMembrosRelatedByFilialId = $membrosRelatedByFilialId;
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
	public function countMembrosRelatedByFilialId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collMembrosRelatedByFilialId || null !== $criteria) {
			if ($this->isNew() && null === $this->collMembrosRelatedByFilialId) {
				return 0;
			} else {
				$query = MembroQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByIgrejaRelatedByFilialId($this)
					->count($con);
			}
		} else {
			return count($this->collMembrosRelatedByFilialId);
		}
	}

	/**
	 * Method called to associate a Membro object to this object
	 * through the Membro foreign key attribute.
	 *
	 * @param      Membro $l Membro
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function addMembroRelatedByFilialId(Membro $l)
	{
		if ($this->collMembrosRelatedByFilialId === null) {
			$this->initMembrosRelatedByFilialId();
		}
		if (!$this->collMembrosRelatedByFilialId->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddMembroRelatedByFilialId($l);
		}

		return $this;
	}

	/**
	 * @param	MembroRelatedByFilialId $membroRelatedByFilialId The membroRelatedByFilialId object to add.
	 */
	protected function doAddMembroRelatedByFilialId($membroRelatedByFilialId)
	{
		$this->collMembrosRelatedByFilialId[]= $membroRelatedByFilialId;
		$membroRelatedByFilialId->setIgrejaRelatedByFilialId($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related MembrosRelatedByFilialId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Membro[] List of Membro objects
	 */
	public function getMembrosRelatedByFilialIdJoinCidade($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = MembroQuery::create(null, $criteria);
		$query->joinWith('Cidade', $join_behavior);

		return $this->getMembrosRelatedByFilialId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related MembrosRelatedByFilialId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Membro[] List of Membro objects
	 */
	public function getMembrosRelatedByFilialIdJoinEndereco($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = MembroQuery::create(null, $criteria);
		$query->joinWith('Endereco', $join_behavior);

		return $this->getMembrosRelatedByFilialId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related MembrosRelatedByFilialId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Membro[] List of Membro objects
	 */
	public function getMembrosRelatedByFilialIdJoinUsuarioRelatedByCriadorId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = MembroQuery::create(null, $criteria);
		$query->joinWith('UsuarioRelatedByCriadorId', $join_behavior);

		return $this->getMembrosRelatedByFilialId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related MembrosRelatedByFilialId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Membro[] List of Membro objects
	 */
	public function getMembrosRelatedByFilialIdJoinUsuarioRelatedByMembroUsuarioId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = MembroQuery::create(null, $criteria);
		$query->joinWith('UsuarioRelatedByMembroUsuarioId', $join_behavior);

		return $this->getMembrosRelatedByFilialId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related MembrosRelatedByFilialId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Membro[] List of Membro objects
	 */
	public function getMembrosRelatedByFilialIdJoinUsuarioRelatedByUsuarioAprovadorId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = MembroQuery::create(null, $criteria);
		$query->joinWith('UsuarioRelatedByUsuarioAprovadorId', $join_behavior);

		return $this->getMembrosRelatedByFilialId($query, $con);
	}

	/**
	 * Clears out the collMembrosRelatedByInstituicaoId collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addMembrosRelatedByInstituicaoId()
	 */
	public function clearMembrosRelatedByInstituicaoId()
	{
		$this->collMembrosRelatedByInstituicaoId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collMembrosRelatedByInstituicaoId collection.
	 *
	 * By default this just sets the collMembrosRelatedByInstituicaoId collection to an empty array (like clearcollMembrosRelatedByInstituicaoId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initMembrosRelatedByInstituicaoId($overrideExisting = true)
	{
		if (null !== $this->collMembrosRelatedByInstituicaoId && !$overrideExisting) {
			return;
		}
		$this->collMembrosRelatedByInstituicaoId = new PropelObjectCollection();
		$this->collMembrosRelatedByInstituicaoId->setModel('Membro');
	}

	/**
	 * Gets an array of Membro objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Igreja is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Membro[] List of Membro objects
	 * @throws     PropelException
	 */
	public function getMembrosRelatedByInstituicaoId($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collMembrosRelatedByInstituicaoId || null !== $criteria) {
			if ($this->isNew() && null === $this->collMembrosRelatedByInstituicaoId) {
				// return empty collection
				$this->initMembrosRelatedByInstituicaoId();
			} else {
				$collMembrosRelatedByInstituicaoId = MembroQuery::create(null, $criteria)
					->filterByIgrejaRelatedByInstituicaoId($this)
					->find($con);
				if (null !== $criteria) {
					return $collMembrosRelatedByInstituicaoId;
				}
				$this->collMembrosRelatedByInstituicaoId = $collMembrosRelatedByInstituicaoId;
			}
		}
		return $this->collMembrosRelatedByInstituicaoId;
	}

	/**
	 * Sets a collection of MembroRelatedByInstituicaoId objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $membrosRelatedByInstituicaoId A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setMembrosRelatedByInstituicaoId(PropelCollection $membrosRelatedByInstituicaoId, PropelPDO $con = null)
	{
		$this->membrosRelatedByInstituicaoIdScheduledForDeletion = $this->getMembrosRelatedByInstituicaoId(new Criteria(), $con)->diff($membrosRelatedByInstituicaoId);

		foreach ($membrosRelatedByInstituicaoId as $membroRelatedByInstituicaoId) {
			// Fix issue with collection modified by reference
			if ($membroRelatedByInstituicaoId->isNew()) {
				$membroRelatedByInstituicaoId->setIgrejaRelatedByInstituicaoId($this);
			}
			$this->addMembroRelatedByInstituicaoId($membroRelatedByInstituicaoId);
		}

		$this->collMembrosRelatedByInstituicaoId = $membrosRelatedByInstituicaoId;
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
	public function countMembrosRelatedByInstituicaoId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collMembrosRelatedByInstituicaoId || null !== $criteria) {
			if ($this->isNew() && null === $this->collMembrosRelatedByInstituicaoId) {
				return 0;
			} else {
				$query = MembroQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByIgrejaRelatedByInstituicaoId($this)
					->count($con);
			}
		} else {
			return count($this->collMembrosRelatedByInstituicaoId);
		}
	}

	/**
	 * Method called to associate a Membro object to this object
	 * through the Membro foreign key attribute.
	 *
	 * @param      Membro $l Membro
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function addMembroRelatedByInstituicaoId(Membro $l)
	{
		if ($this->collMembrosRelatedByInstituicaoId === null) {
			$this->initMembrosRelatedByInstituicaoId();
		}
		if (!$this->collMembrosRelatedByInstituicaoId->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddMembroRelatedByInstituicaoId($l);
		}

		return $this;
	}

	/**
	 * @param	MembroRelatedByInstituicaoId $membroRelatedByInstituicaoId The membroRelatedByInstituicaoId object to add.
	 */
	protected function doAddMembroRelatedByInstituicaoId($membroRelatedByInstituicaoId)
	{
		$this->collMembrosRelatedByInstituicaoId[]= $membroRelatedByInstituicaoId;
		$membroRelatedByInstituicaoId->setIgrejaRelatedByInstituicaoId($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related MembrosRelatedByInstituicaoId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Membro[] List of Membro objects
	 */
	public function getMembrosRelatedByInstituicaoIdJoinCidade($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = MembroQuery::create(null, $criteria);
		$query->joinWith('Cidade', $join_behavior);

		return $this->getMembrosRelatedByInstituicaoId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related MembrosRelatedByInstituicaoId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Membro[] List of Membro objects
	 */
	public function getMembrosRelatedByInstituicaoIdJoinEndereco($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = MembroQuery::create(null, $criteria);
		$query->joinWith('Endereco', $join_behavior);

		return $this->getMembrosRelatedByInstituicaoId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related MembrosRelatedByInstituicaoId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Membro[] List of Membro objects
	 */
	public function getMembrosRelatedByInstituicaoIdJoinUsuarioRelatedByCriadorId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = MembroQuery::create(null, $criteria);
		$query->joinWith('UsuarioRelatedByCriadorId', $join_behavior);

		return $this->getMembrosRelatedByInstituicaoId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related MembrosRelatedByInstituicaoId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Membro[] List of Membro objects
	 */
	public function getMembrosRelatedByInstituicaoIdJoinUsuarioRelatedByMembroUsuarioId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = MembroQuery::create(null, $criteria);
		$query->joinWith('UsuarioRelatedByMembroUsuarioId', $join_behavior);

		return $this->getMembrosRelatedByInstituicaoId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related MembrosRelatedByInstituicaoId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Membro[] List of Membro objects
	 */
	public function getMembrosRelatedByInstituicaoIdJoinUsuarioRelatedByUsuarioAprovadorId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = MembroQuery::create(null, $criteria);
		$query->joinWith('UsuarioRelatedByUsuarioAprovadorId', $join_behavior);

		return $this->getMembrosRelatedByInstituicaoId($query, $con);
	}

	/**
	 * Clears out the collMinisteriosRelatedByIgrejaPertencenteId collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addMinisteriosRelatedByIgrejaPertencenteId()
	 */
	public function clearMinisteriosRelatedByIgrejaPertencenteId()
	{
		$this->collMinisteriosRelatedByIgrejaPertencenteId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collMinisteriosRelatedByIgrejaPertencenteId collection.
	 *
	 * By default this just sets the collMinisteriosRelatedByIgrejaPertencenteId collection to an empty array (like clearcollMinisteriosRelatedByIgrejaPertencenteId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initMinisteriosRelatedByIgrejaPertencenteId($overrideExisting = true)
	{
		if (null !== $this->collMinisteriosRelatedByIgrejaPertencenteId && !$overrideExisting) {
			return;
		}
		$this->collMinisteriosRelatedByIgrejaPertencenteId = new PropelObjectCollection();
		$this->collMinisteriosRelatedByIgrejaPertencenteId->setModel('Ministerio');
	}

	/**
	 * Gets an array of Ministerio objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Igreja is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Ministerio[] List of Ministerio objects
	 * @throws     PropelException
	 */
	public function getMinisteriosRelatedByIgrejaPertencenteId($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collMinisteriosRelatedByIgrejaPertencenteId || null !== $criteria) {
			if ($this->isNew() && null === $this->collMinisteriosRelatedByIgrejaPertencenteId) {
				// return empty collection
				$this->initMinisteriosRelatedByIgrejaPertencenteId();
			} else {
				$collMinisteriosRelatedByIgrejaPertencenteId = MinisterioQuery::create(null, $criteria)
					->filterByIgrejaRelatedByIgrejaPertencenteId($this)
					->find($con);
				if (null !== $criteria) {
					return $collMinisteriosRelatedByIgrejaPertencenteId;
				}
				$this->collMinisteriosRelatedByIgrejaPertencenteId = $collMinisteriosRelatedByIgrejaPertencenteId;
			}
		}
		return $this->collMinisteriosRelatedByIgrejaPertencenteId;
	}

	/**
	 * Sets a collection of MinisterioRelatedByIgrejaPertencenteId objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $ministeriosRelatedByIgrejaPertencenteId A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setMinisteriosRelatedByIgrejaPertencenteId(PropelCollection $ministeriosRelatedByIgrejaPertencenteId, PropelPDO $con = null)
	{
		$this->ministeriosRelatedByIgrejaPertencenteIdScheduledForDeletion = $this->getMinisteriosRelatedByIgrejaPertencenteId(new Criteria(), $con)->diff($ministeriosRelatedByIgrejaPertencenteId);

		foreach ($ministeriosRelatedByIgrejaPertencenteId as $ministerioRelatedByIgrejaPertencenteId) {
			// Fix issue with collection modified by reference
			if ($ministerioRelatedByIgrejaPertencenteId->isNew()) {
				$ministerioRelatedByIgrejaPertencenteId->setIgrejaRelatedByIgrejaPertencenteId($this);
			}
			$this->addMinisterioRelatedByIgrejaPertencenteId($ministerioRelatedByIgrejaPertencenteId);
		}

		$this->collMinisteriosRelatedByIgrejaPertencenteId = $ministeriosRelatedByIgrejaPertencenteId;
	}

	/**
	 * Returns the number of related Ministerio objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Ministerio objects.
	 * @throws     PropelException
	 */
	public function countMinisteriosRelatedByIgrejaPertencenteId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collMinisteriosRelatedByIgrejaPertencenteId || null !== $criteria) {
			if ($this->isNew() && null === $this->collMinisteriosRelatedByIgrejaPertencenteId) {
				return 0;
			} else {
				$query = MinisterioQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByIgrejaRelatedByIgrejaPertencenteId($this)
					->count($con);
			}
		} else {
			return count($this->collMinisteriosRelatedByIgrejaPertencenteId);
		}
	}

	/**
	 * Method called to associate a Ministerio object to this object
	 * through the Ministerio foreign key attribute.
	 *
	 * @param      Ministerio $l Ministerio
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function addMinisterioRelatedByIgrejaPertencenteId(Ministerio $l)
	{
		if ($this->collMinisteriosRelatedByIgrejaPertencenteId === null) {
			$this->initMinisteriosRelatedByIgrejaPertencenteId();
		}
		if (!$this->collMinisteriosRelatedByIgrejaPertencenteId->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddMinisterioRelatedByIgrejaPertencenteId($l);
		}

		return $this;
	}

	/**
	 * @param	MinisterioRelatedByIgrejaPertencenteId $ministerioRelatedByIgrejaPertencenteId The ministerioRelatedByIgrejaPertencenteId object to add.
	 */
	protected function doAddMinisterioRelatedByIgrejaPertencenteId($ministerioRelatedByIgrejaPertencenteId)
	{
		$this->collMinisteriosRelatedByIgrejaPertencenteId[]= $ministerioRelatedByIgrejaPertencenteId;
		$ministerioRelatedByIgrejaPertencenteId->setIgrejaRelatedByIgrejaPertencenteId($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related MinisteriosRelatedByIgrejaPertencenteId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Ministerio[] List of Ministerio objects
	 */
	public function getMinisteriosRelatedByIgrejaPertencenteIdJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = MinisterioQuery::create(null, $criteria);
		$query->joinWith('Usuario', $join_behavior);

		return $this->getMinisteriosRelatedByIgrejaPertencenteId($query, $con);
	}

	/**
	 * Clears out the collMinisteriosRelatedByInstituicaoId collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addMinisteriosRelatedByInstituicaoId()
	 */
	public function clearMinisteriosRelatedByInstituicaoId()
	{
		$this->collMinisteriosRelatedByInstituicaoId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collMinisteriosRelatedByInstituicaoId collection.
	 *
	 * By default this just sets the collMinisteriosRelatedByInstituicaoId collection to an empty array (like clearcollMinisteriosRelatedByInstituicaoId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initMinisteriosRelatedByInstituicaoId($overrideExisting = true)
	{
		if (null !== $this->collMinisteriosRelatedByInstituicaoId && !$overrideExisting) {
			return;
		}
		$this->collMinisteriosRelatedByInstituicaoId = new PropelObjectCollection();
		$this->collMinisteriosRelatedByInstituicaoId->setModel('Ministerio');
	}

	/**
	 * Gets an array of Ministerio objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Igreja is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Ministerio[] List of Ministerio objects
	 * @throws     PropelException
	 */
	public function getMinisteriosRelatedByInstituicaoId($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collMinisteriosRelatedByInstituicaoId || null !== $criteria) {
			if ($this->isNew() && null === $this->collMinisteriosRelatedByInstituicaoId) {
				// return empty collection
				$this->initMinisteriosRelatedByInstituicaoId();
			} else {
				$collMinisteriosRelatedByInstituicaoId = MinisterioQuery::create(null, $criteria)
					->filterByIgrejaRelatedByInstituicaoId($this)
					->find($con);
				if (null !== $criteria) {
					return $collMinisteriosRelatedByInstituicaoId;
				}
				$this->collMinisteriosRelatedByInstituicaoId = $collMinisteriosRelatedByInstituicaoId;
			}
		}
		return $this->collMinisteriosRelatedByInstituicaoId;
	}

	/**
	 * Sets a collection of MinisterioRelatedByInstituicaoId objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $ministeriosRelatedByInstituicaoId A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setMinisteriosRelatedByInstituicaoId(PropelCollection $ministeriosRelatedByInstituicaoId, PropelPDO $con = null)
	{
		$this->ministeriosRelatedByInstituicaoIdScheduledForDeletion = $this->getMinisteriosRelatedByInstituicaoId(new Criteria(), $con)->diff($ministeriosRelatedByInstituicaoId);

		foreach ($ministeriosRelatedByInstituicaoId as $ministerioRelatedByInstituicaoId) {
			// Fix issue with collection modified by reference
			if ($ministerioRelatedByInstituicaoId->isNew()) {
				$ministerioRelatedByInstituicaoId->setIgrejaRelatedByInstituicaoId($this);
			}
			$this->addMinisterioRelatedByInstituicaoId($ministerioRelatedByInstituicaoId);
		}

		$this->collMinisteriosRelatedByInstituicaoId = $ministeriosRelatedByInstituicaoId;
	}

	/**
	 * Returns the number of related Ministerio objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Ministerio objects.
	 * @throws     PropelException
	 */
	public function countMinisteriosRelatedByInstituicaoId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collMinisteriosRelatedByInstituicaoId || null !== $criteria) {
			if ($this->isNew() && null === $this->collMinisteriosRelatedByInstituicaoId) {
				return 0;
			} else {
				$query = MinisterioQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByIgrejaRelatedByInstituicaoId($this)
					->count($con);
			}
		} else {
			return count($this->collMinisteriosRelatedByInstituicaoId);
		}
	}

	/**
	 * Method called to associate a Ministerio object to this object
	 * through the Ministerio foreign key attribute.
	 *
	 * @param      Ministerio $l Ministerio
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function addMinisterioRelatedByInstituicaoId(Ministerio $l)
	{
		if ($this->collMinisteriosRelatedByInstituicaoId === null) {
			$this->initMinisteriosRelatedByInstituicaoId();
		}
		if (!$this->collMinisteriosRelatedByInstituicaoId->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddMinisterioRelatedByInstituicaoId($l);
		}

		return $this;
	}

	/**
	 * @param	MinisterioRelatedByInstituicaoId $ministerioRelatedByInstituicaoId The ministerioRelatedByInstituicaoId object to add.
	 */
	protected function doAddMinisterioRelatedByInstituicaoId($ministerioRelatedByInstituicaoId)
	{
		$this->collMinisteriosRelatedByInstituicaoId[]= $ministerioRelatedByInstituicaoId;
		$ministerioRelatedByInstituicaoId->setIgrejaRelatedByInstituicaoId($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related MinisteriosRelatedByInstituicaoId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Ministerio[] List of Ministerio objects
	 */
	public function getMinisteriosRelatedByInstituicaoIdJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = MinisterioQuery::create(null, $criteria);
		$query->joinWith('Usuario', $join_behavior);

		return $this->getMinisteriosRelatedByInstituicaoId($query, $con);
	}

	/**
	 * Clears out the collNoticiaIgrejas collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addNoticiaIgrejas()
	 */
	public function clearNoticiaIgrejas()
	{
		$this->collNoticiaIgrejas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collNoticiaIgrejas collection.
	 *
	 * By default this just sets the collNoticiaIgrejas collection to an empty array (like clearcollNoticiaIgrejas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initNoticiaIgrejas($overrideExisting = true)
	{
		if (null !== $this->collNoticiaIgrejas && !$overrideExisting) {
			return;
		}
		$this->collNoticiaIgrejas = new PropelObjectCollection();
		$this->collNoticiaIgrejas->setModel('NoticiaIgreja');
	}

	/**
	 * Gets an array of NoticiaIgreja objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Igreja is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array NoticiaIgreja[] List of NoticiaIgreja objects
	 * @throws     PropelException
	 */
	public function getNoticiaIgrejas($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNoticiaIgrejas || null !== $criteria) {
			if ($this->isNew() && null === $this->collNoticiaIgrejas) {
				// return empty collection
				$this->initNoticiaIgrejas();
			} else {
				$collNoticiaIgrejas = NoticiaIgrejaQuery::create(null, $criteria)
					->filterByIgreja($this)
					->find($con);
				if (null !== $criteria) {
					return $collNoticiaIgrejas;
				}
				$this->collNoticiaIgrejas = $collNoticiaIgrejas;
			}
		}
		return $this->collNoticiaIgrejas;
	}

	/**
	 * Sets a collection of NoticiaIgreja objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $noticiaIgrejas A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setNoticiaIgrejas(PropelCollection $noticiaIgrejas, PropelPDO $con = null)
	{
		$this->noticiaIgrejasScheduledForDeletion = $this->getNoticiaIgrejas(new Criteria(), $con)->diff($noticiaIgrejas);

		foreach ($noticiaIgrejas as $noticiaIgreja) {
			// Fix issue with collection modified by reference
			if ($noticiaIgreja->isNew()) {
				$noticiaIgreja->setIgreja($this);
			}
			$this->addNoticiaIgreja($noticiaIgreja);
		}

		$this->collNoticiaIgrejas = $noticiaIgrejas;
	}

	/**
	 * Returns the number of related NoticiaIgreja objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related NoticiaIgreja objects.
	 * @throws     PropelException
	 */
	public function countNoticiaIgrejas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collNoticiaIgrejas || null !== $criteria) {
			if ($this->isNew() && null === $this->collNoticiaIgrejas) {
				return 0;
			} else {
				$query = NoticiaIgrejaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByIgreja($this)
					->count($con);
			}
		} else {
			return count($this->collNoticiaIgrejas);
		}
	}

	/**
	 * Method called to associate a NoticiaIgreja object to this object
	 * through the NoticiaIgreja foreign key attribute.
	 *
	 * @param      NoticiaIgreja $l NoticiaIgreja
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function addNoticiaIgreja(NoticiaIgreja $l)
	{
		if ($this->collNoticiaIgrejas === null) {
			$this->initNoticiaIgrejas();
		}
		if (!$this->collNoticiaIgrejas->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddNoticiaIgreja($l);
		}

		return $this;
	}

	/**
	 * @param	NoticiaIgreja $noticiaIgreja The noticiaIgreja object to add.
	 */
	protected function doAddNoticiaIgreja($noticiaIgreja)
	{
		$this->collNoticiaIgrejas[]= $noticiaIgreja;
		$noticiaIgreja->setIgreja($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related NoticiaIgrejas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NoticiaIgreja[] List of NoticiaIgreja objects
	 */
	public function getNoticiaIgrejasJoinNoticia($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NoticiaIgrejaQuery::create(null, $criteria);
		$query->joinWith('Noticia', $join_behavior);

		return $this->getNoticiaIgrejas($query, $con);
	}

	/**
	 * Clears out the collPedidoOracaos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPedidoOracaos()
	 */
	public function clearPedidoOracaos()
	{
		$this->collPedidoOracaos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPedidoOracaos collection.
	 *
	 * By default this just sets the collPedidoOracaos collection to an empty array (like clearcollPedidoOracaos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initPedidoOracaos($overrideExisting = true)
	{
		if (null !== $this->collPedidoOracaos && !$overrideExisting) {
			return;
		}
		$this->collPedidoOracaos = new PropelObjectCollection();
		$this->collPedidoOracaos->setModel('PedidoOracao');
	}

	/**
	 * Gets an array of PedidoOracao objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Igreja is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array PedidoOracao[] List of PedidoOracao objects
	 * @throws     PropelException
	 */
	public function getPedidoOracaos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPedidoOracaos || null !== $criteria) {
			if ($this->isNew() && null === $this->collPedidoOracaos) {
				// return empty collection
				$this->initPedidoOracaos();
			} else {
				$collPedidoOracaos = PedidoOracaoQuery::create(null, $criteria)
					->filterByIgreja($this)
					->find($con);
				if (null !== $criteria) {
					return $collPedidoOracaos;
				}
				$this->collPedidoOracaos = $collPedidoOracaos;
			}
		}
		return $this->collPedidoOracaos;
	}

	/**
	 * Sets a collection of PedidoOracao objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $pedidoOracaos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setPedidoOracaos(PropelCollection $pedidoOracaos, PropelPDO $con = null)
	{
		$this->pedidoOracaosScheduledForDeletion = $this->getPedidoOracaos(new Criteria(), $con)->diff($pedidoOracaos);

		foreach ($pedidoOracaos as $pedidoOracao) {
			// Fix issue with collection modified by reference
			if ($pedidoOracao->isNew()) {
				$pedidoOracao->setIgreja($this);
			}
			$this->addPedidoOracao($pedidoOracao);
		}

		$this->collPedidoOracaos = $pedidoOracaos;
	}

	/**
	 * Returns the number of related PedidoOracao objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related PedidoOracao objects.
	 * @throws     PropelException
	 */
	public function countPedidoOracaos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPedidoOracaos || null !== $criteria) {
			if ($this->isNew() && null === $this->collPedidoOracaos) {
				return 0;
			} else {
				$query = PedidoOracaoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByIgreja($this)
					->count($con);
			}
		} else {
			return count($this->collPedidoOracaos);
		}
	}

	/**
	 * Method called to associate a PedidoOracao object to this object
	 * through the PedidoOracao foreign key attribute.
	 *
	 * @param      PedidoOracao $l PedidoOracao
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function addPedidoOracao(PedidoOracao $l)
	{
		if ($this->collPedidoOracaos === null) {
			$this->initPedidoOracaos();
		}
		if (!$this->collPedidoOracaos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddPedidoOracao($l);
		}

		return $this;
	}

	/**
	 * @param	PedidoOracao $pedidoOracao The pedidoOracao object to add.
	 */
	protected function doAddPedidoOracao($pedidoOracao)
	{
		$this->collPedidoOracaos[]= $pedidoOracao;
		$pedidoOracao->setIgreja($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related PedidoOracaos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array PedidoOracao[] List of PedidoOracao objects
	 */
	public function getPedidoOracaosJoinUsuarioRelatedBySolicitanteId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = PedidoOracaoQuery::create(null, $criteria);
		$query->joinWith('UsuarioRelatedBySolicitanteId', $join_behavior);

		return $this->getPedidoOracaos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related PedidoOracaos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array PedidoOracao[] List of PedidoOracao objects
	 */
	public function getPedidoOracaosJoinUsuarioRelatedByAtendenteId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = PedidoOracaoQuery::create(null, $criteria);
		$query->joinWith('UsuarioRelatedByAtendenteId', $join_behavior);

		return $this->getPedidoOracaos($query, $con);
	}

	/**
	 * Clears out the collPgs collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPgs()
	 */
	public function clearPgs()
	{
		$this->collPgs = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPgs collection.
	 *
	 * By default this just sets the collPgs collection to an empty array (like clearcollPgs());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initPgs($overrideExisting = true)
	{
		if (null !== $this->collPgs && !$overrideExisting) {
			return;
		}
		$this->collPgs = new PropelObjectCollection();
		$this->collPgs->setModel('Pg');
	}

	/**
	 * Gets an array of Pg objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Igreja is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Pg[] List of Pg objects
	 * @throws     PropelException
	 */
	public function getPgs($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPgs || null !== $criteria) {
			if ($this->isNew() && null === $this->collPgs) {
				// return empty collection
				$this->initPgs();
			} else {
				$collPgs = PgQuery::create(null, $criteria)
					->filterByIgreja($this)
					->find($con);
				if (null !== $criteria) {
					return $collPgs;
				}
				$this->collPgs = $collPgs;
			}
		}
		return $this->collPgs;
	}

	/**
	 * Sets a collection of Pg objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $pgs A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setPgs(PropelCollection $pgs, PropelPDO $con = null)
	{
		$this->pgsScheduledForDeletion = $this->getPgs(new Criteria(), $con)->diff($pgs);

		foreach ($pgs as $pg) {
			// Fix issue with collection modified by reference
			if ($pg->isNew()) {
				$pg->setIgreja($this);
			}
			$this->addPg($pg);
		}

		$this->collPgs = $pgs;
	}

	/**
	 * Returns the number of related Pg objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Pg objects.
	 * @throws     PropelException
	 */
	public function countPgs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPgs || null !== $criteria) {
			if ($this->isNew() && null === $this->collPgs) {
				return 0;
			} else {
				$query = PgQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByIgreja($this)
					->count($con);
			}
		} else {
			return count($this->collPgs);
		}
	}

	/**
	 * Method called to associate a Pg object to this object
	 * through the Pg foreign key attribute.
	 *
	 * @param      Pg $l Pg
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function addPg(Pg $l)
	{
		if ($this->collPgs === null) {
			$this->initPgs();
		}
		if (!$this->collPgs->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddPg($l);
		}

		return $this;
	}

	/**
	 * @param	Pg $pg The pg object to add.
	 */
	protected function doAddPg($pg)
	{
		$this->collPgs[]= $pg;
		$pg->setIgreja($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related Pgs from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Pg[] List of Pg objects
	 */
	public function getPgsJoinEndereco($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = PgQuery::create(null, $criteria);
		$query->joinWith('Endereco', $join_behavior);

		return $this->getPgs($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related Pgs from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Pg[] List of Pg objects
	 */
	public function getPgsJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = PgQuery::create(null, $criteria);
		$query->joinWith('Usuario', $join_behavior);

		return $this->getPgs($query, $con);
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
	 * If this Igreja is new, it will return
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
					->filterByIgreja($this)
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
				$podcastIgreja->setIgreja($this);
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
					->filterByIgreja($this)
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
	 * @return     Igreja The current object (for fluent API support)
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
		$podcastIgreja->setIgreja($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related PodcastIgrejas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array PodcastIgreja[] List of PodcastIgreja objects
	 */
	public function getPodcastIgrejasJoinPodcast($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = PodcastIgrejaQuery::create(null, $criteria);
		$query->joinWith('Podcast', $join_behavior);

		return $this->getPodcastIgrejas($query, $con);
	}

	/**
	 * Clears out the collUsuariosRelatedByFilialId collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUsuariosRelatedByFilialId()
	 */
	public function clearUsuariosRelatedByFilialId()
	{
		$this->collUsuariosRelatedByFilialId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUsuariosRelatedByFilialId collection.
	 *
	 * By default this just sets the collUsuariosRelatedByFilialId collection to an empty array (like clearcollUsuariosRelatedByFilialId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initUsuariosRelatedByFilialId($overrideExisting = true)
	{
		if (null !== $this->collUsuariosRelatedByFilialId && !$overrideExisting) {
			return;
		}
		$this->collUsuariosRelatedByFilialId = new PropelObjectCollection();
		$this->collUsuariosRelatedByFilialId->setModel('Usuario');
	}

	/**
	 * Gets an array of Usuario objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Igreja is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Usuario[] List of Usuario objects
	 * @throws     PropelException
	 */
	public function getUsuariosRelatedByFilialId($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collUsuariosRelatedByFilialId || null !== $criteria) {
			if ($this->isNew() && null === $this->collUsuariosRelatedByFilialId) {
				// return empty collection
				$this->initUsuariosRelatedByFilialId();
			} else {
				$collUsuariosRelatedByFilialId = UsuarioQuery::create(null, $criteria)
					->filterByIgrejaRelatedByFilialId($this)
					->find($con);
				if (null !== $criteria) {
					return $collUsuariosRelatedByFilialId;
				}
				$this->collUsuariosRelatedByFilialId = $collUsuariosRelatedByFilialId;
			}
		}
		return $this->collUsuariosRelatedByFilialId;
	}

	/**
	 * Sets a collection of UsuarioRelatedByFilialId objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $usuariosRelatedByFilialId A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setUsuariosRelatedByFilialId(PropelCollection $usuariosRelatedByFilialId, PropelPDO $con = null)
	{
		$this->usuariosRelatedByFilialIdScheduledForDeletion = $this->getUsuariosRelatedByFilialId(new Criteria(), $con)->diff($usuariosRelatedByFilialId);

		foreach ($usuariosRelatedByFilialId as $usuarioRelatedByFilialId) {
			// Fix issue with collection modified by reference
			if ($usuarioRelatedByFilialId->isNew()) {
				$usuarioRelatedByFilialId->setIgrejaRelatedByFilialId($this);
			}
			$this->addUsuarioRelatedByFilialId($usuarioRelatedByFilialId);
		}

		$this->collUsuariosRelatedByFilialId = $usuariosRelatedByFilialId;
	}

	/**
	 * Returns the number of related Usuario objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Usuario objects.
	 * @throws     PropelException
	 */
	public function countUsuariosRelatedByFilialId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collUsuariosRelatedByFilialId || null !== $criteria) {
			if ($this->isNew() && null === $this->collUsuariosRelatedByFilialId) {
				return 0;
			} else {
				$query = UsuarioQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByIgrejaRelatedByFilialId($this)
					->count($con);
			}
		} else {
			return count($this->collUsuariosRelatedByFilialId);
		}
	}

	/**
	 * Method called to associate a Usuario object to this object
	 * through the Usuario foreign key attribute.
	 *
	 * @param      Usuario $l Usuario
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function addUsuarioRelatedByFilialId(Usuario $l)
	{
		if ($this->collUsuariosRelatedByFilialId === null) {
			$this->initUsuariosRelatedByFilialId();
		}
		if (!$this->collUsuariosRelatedByFilialId->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddUsuarioRelatedByFilialId($l);
		}

		return $this;
	}

	/**
	 * @param	UsuarioRelatedByFilialId $usuarioRelatedByFilialId The usuarioRelatedByFilialId object to add.
	 */
	protected function doAddUsuarioRelatedByFilialId($usuarioRelatedByFilialId)
	{
		$this->collUsuariosRelatedByFilialId[]= $usuarioRelatedByFilialId;
		$usuarioRelatedByFilialId->setIgrejaRelatedByFilialId($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related UsuariosRelatedByFilialId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Usuario[] List of Usuario objects
	 */
	public function getUsuariosRelatedByFilialIdJoinEndereco($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UsuarioQuery::create(null, $criteria);
		$query->joinWith('Endereco', $join_behavior);

		return $this->getUsuariosRelatedByFilialId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related UsuariosRelatedByFilialId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Usuario[] List of Usuario objects
	 */
	public function getUsuariosRelatedByFilialIdJoinMembroRelatedByMembroId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UsuarioQuery::create(null, $criteria);
		$query->joinWith('MembroRelatedByMembroId', $join_behavior);

		return $this->getUsuariosRelatedByFilialId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related UsuariosRelatedByFilialId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Usuario[] List of Usuario objects
	 */
	public function getUsuariosRelatedByFilialIdJoinPerfil($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UsuarioQuery::create(null, $criteria);
		$query->joinWith('Perfil', $join_behavior);

		return $this->getUsuariosRelatedByFilialId($query, $con);
	}

	/**
	 * Clears out the collUsuariosRelatedByInstituicaoId collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUsuariosRelatedByInstituicaoId()
	 */
	public function clearUsuariosRelatedByInstituicaoId()
	{
		$this->collUsuariosRelatedByInstituicaoId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUsuariosRelatedByInstituicaoId collection.
	 *
	 * By default this just sets the collUsuariosRelatedByInstituicaoId collection to an empty array (like clearcollUsuariosRelatedByInstituicaoId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initUsuariosRelatedByInstituicaoId($overrideExisting = true)
	{
		if (null !== $this->collUsuariosRelatedByInstituicaoId && !$overrideExisting) {
			return;
		}
		$this->collUsuariosRelatedByInstituicaoId = new PropelObjectCollection();
		$this->collUsuariosRelatedByInstituicaoId->setModel('Usuario');
	}

	/**
	 * Gets an array of Usuario objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Igreja is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Usuario[] List of Usuario objects
	 * @throws     PropelException
	 */
	public function getUsuariosRelatedByInstituicaoId($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collUsuariosRelatedByInstituicaoId || null !== $criteria) {
			if ($this->isNew() && null === $this->collUsuariosRelatedByInstituicaoId) {
				// return empty collection
				$this->initUsuariosRelatedByInstituicaoId();
			} else {
				$collUsuariosRelatedByInstituicaoId = UsuarioQuery::create(null, $criteria)
					->filterByIgrejaRelatedByInstituicaoId($this)
					->find($con);
				if (null !== $criteria) {
					return $collUsuariosRelatedByInstituicaoId;
				}
				$this->collUsuariosRelatedByInstituicaoId = $collUsuariosRelatedByInstituicaoId;
			}
		}
		return $this->collUsuariosRelatedByInstituicaoId;
	}

	/**
	 * Sets a collection of UsuarioRelatedByInstituicaoId objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $usuariosRelatedByInstituicaoId A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setUsuariosRelatedByInstituicaoId(PropelCollection $usuariosRelatedByInstituicaoId, PropelPDO $con = null)
	{
		$this->usuariosRelatedByInstituicaoIdScheduledForDeletion = $this->getUsuariosRelatedByInstituicaoId(new Criteria(), $con)->diff($usuariosRelatedByInstituicaoId);

		foreach ($usuariosRelatedByInstituicaoId as $usuarioRelatedByInstituicaoId) {
			// Fix issue with collection modified by reference
			if ($usuarioRelatedByInstituicaoId->isNew()) {
				$usuarioRelatedByInstituicaoId->setIgrejaRelatedByInstituicaoId($this);
			}
			$this->addUsuarioRelatedByInstituicaoId($usuarioRelatedByInstituicaoId);
		}

		$this->collUsuariosRelatedByInstituicaoId = $usuariosRelatedByInstituicaoId;
	}

	/**
	 * Returns the number of related Usuario objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Usuario objects.
	 * @throws     PropelException
	 */
	public function countUsuariosRelatedByInstituicaoId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collUsuariosRelatedByInstituicaoId || null !== $criteria) {
			if ($this->isNew() && null === $this->collUsuariosRelatedByInstituicaoId) {
				return 0;
			} else {
				$query = UsuarioQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByIgrejaRelatedByInstituicaoId($this)
					->count($con);
			}
		} else {
			return count($this->collUsuariosRelatedByInstituicaoId);
		}
	}

	/**
	 * Method called to associate a Usuario object to this object
	 * through the Usuario foreign key attribute.
	 *
	 * @param      Usuario $l Usuario
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function addUsuarioRelatedByInstituicaoId(Usuario $l)
	{
		if ($this->collUsuariosRelatedByInstituicaoId === null) {
			$this->initUsuariosRelatedByInstituicaoId();
		}
		if (!$this->collUsuariosRelatedByInstituicaoId->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddUsuarioRelatedByInstituicaoId($l);
		}

		return $this;
	}

	/**
	 * @param	UsuarioRelatedByInstituicaoId $usuarioRelatedByInstituicaoId The usuarioRelatedByInstituicaoId object to add.
	 */
	protected function doAddUsuarioRelatedByInstituicaoId($usuarioRelatedByInstituicaoId)
	{
		$this->collUsuariosRelatedByInstituicaoId[]= $usuarioRelatedByInstituicaoId;
		$usuarioRelatedByInstituicaoId->setIgrejaRelatedByInstituicaoId($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related UsuariosRelatedByInstituicaoId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Usuario[] List of Usuario objects
	 */
	public function getUsuariosRelatedByInstituicaoIdJoinEndereco($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UsuarioQuery::create(null, $criteria);
		$query->joinWith('Endereco', $join_behavior);

		return $this->getUsuariosRelatedByInstituicaoId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related UsuariosRelatedByInstituicaoId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Usuario[] List of Usuario objects
	 */
	public function getUsuariosRelatedByInstituicaoIdJoinMembroRelatedByMembroId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UsuarioQuery::create(null, $criteria);
		$query->joinWith('MembroRelatedByMembroId', $join_behavior);

		return $this->getUsuariosRelatedByInstituicaoId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related UsuariosRelatedByInstituicaoId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Usuario[] List of Usuario objects
	 */
	public function getUsuariosRelatedByInstituicaoIdJoinPerfil($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UsuarioQuery::create(null, $criteria);
		$query->joinWith('Perfil', $join_behavior);

		return $this->getUsuariosRelatedByInstituicaoId($query, $con);
	}

	/**
	 * Clears out the collUsuarioFilials collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUsuarioFilials()
	 */
	public function clearUsuarioFilials()
	{
		$this->collUsuarioFilials = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUsuarioFilials collection.
	 *
	 * By default this just sets the collUsuarioFilials collection to an empty array (like clearcollUsuarioFilials());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initUsuarioFilials($overrideExisting = true)
	{
		if (null !== $this->collUsuarioFilials && !$overrideExisting) {
			return;
		}
		$this->collUsuarioFilials = new PropelObjectCollection();
		$this->collUsuarioFilials->setModel('UsuarioFilial');
	}

	/**
	 * Gets an array of UsuarioFilial objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Igreja is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array UsuarioFilial[] List of UsuarioFilial objects
	 * @throws     PropelException
	 */
	public function getUsuarioFilials($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collUsuarioFilials || null !== $criteria) {
			if ($this->isNew() && null === $this->collUsuarioFilials) {
				// return empty collection
				$this->initUsuarioFilials();
			} else {
				$collUsuarioFilials = UsuarioFilialQuery::create(null, $criteria)
					->filterByIgreja($this)
					->find($con);
				if (null !== $criteria) {
					return $collUsuarioFilials;
				}
				$this->collUsuarioFilials = $collUsuarioFilials;
			}
		}
		return $this->collUsuarioFilials;
	}

	/**
	 * Sets a collection of UsuarioFilial objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $usuarioFilials A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setUsuarioFilials(PropelCollection $usuarioFilials, PropelPDO $con = null)
	{
		$this->usuarioFilialsScheduledForDeletion = $this->getUsuarioFilials(new Criteria(), $con)->diff($usuarioFilials);

		foreach ($usuarioFilials as $usuarioFilial) {
			// Fix issue with collection modified by reference
			if ($usuarioFilial->isNew()) {
				$usuarioFilial->setIgreja($this);
			}
			$this->addUsuarioFilial($usuarioFilial);
		}

		$this->collUsuarioFilials = $usuarioFilials;
	}

	/**
	 * Returns the number of related UsuarioFilial objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related UsuarioFilial objects.
	 * @throws     PropelException
	 */
	public function countUsuarioFilials(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collUsuarioFilials || null !== $criteria) {
			if ($this->isNew() && null === $this->collUsuarioFilials) {
				return 0;
			} else {
				$query = UsuarioFilialQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByIgreja($this)
					->count($con);
			}
		} else {
			return count($this->collUsuarioFilials);
		}
	}

	/**
	 * Method called to associate a UsuarioFilial object to this object
	 * through the UsuarioFilial foreign key attribute.
	 *
	 * @param      UsuarioFilial $l UsuarioFilial
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function addUsuarioFilial(UsuarioFilial $l)
	{
		if ($this->collUsuarioFilials === null) {
			$this->initUsuarioFilials();
		}
		if (!$this->collUsuarioFilials->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddUsuarioFilial($l);
		}

		return $this;
	}

	/**
	 * @param	UsuarioFilial $usuarioFilial The usuarioFilial object to add.
	 */
	protected function doAddUsuarioFilial($usuarioFilial)
	{
		$this->collUsuarioFilials[]= $usuarioFilial;
		$usuarioFilial->setIgreja($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related UsuarioFilials from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array UsuarioFilial[] List of UsuarioFilial objects
	 */
	public function getUsuarioFilialsJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UsuarioFilialQuery::create(null, $criteria);
		$query->joinWith('Usuario', $join_behavior);

		return $this->getUsuarioFilials($query, $con);
	}

	/**
	 * Clears out the collVideoIgrejas collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addVideoIgrejas()
	 */
	public function clearVideoIgrejas()
	{
		$this->collVideoIgrejas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collVideoIgrejas collection.
	 *
	 * By default this just sets the collVideoIgrejas collection to an empty array (like clearcollVideoIgrejas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initVideoIgrejas($overrideExisting = true)
	{
		if (null !== $this->collVideoIgrejas && !$overrideExisting) {
			return;
		}
		$this->collVideoIgrejas = new PropelObjectCollection();
		$this->collVideoIgrejas->setModel('VideoIgreja');
	}

	/**
	 * Gets an array of VideoIgreja objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Igreja is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array VideoIgreja[] List of VideoIgreja objects
	 * @throws     PropelException
	 */
	public function getVideoIgrejas($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collVideoIgrejas || null !== $criteria) {
			if ($this->isNew() && null === $this->collVideoIgrejas) {
				// return empty collection
				$this->initVideoIgrejas();
			} else {
				$collVideoIgrejas = VideoIgrejaQuery::create(null, $criteria)
					->filterByIgreja($this)
					->find($con);
				if (null !== $criteria) {
					return $collVideoIgrejas;
				}
				$this->collVideoIgrejas = $collVideoIgrejas;
			}
		}
		return $this->collVideoIgrejas;
	}

	/**
	 * Sets a collection of VideoIgreja objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $videoIgrejas A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setVideoIgrejas(PropelCollection $videoIgrejas, PropelPDO $con = null)
	{
		$this->videoIgrejasScheduledForDeletion = $this->getVideoIgrejas(new Criteria(), $con)->diff($videoIgrejas);

		foreach ($videoIgrejas as $videoIgreja) {
			// Fix issue with collection modified by reference
			if ($videoIgreja->isNew()) {
				$videoIgreja->setIgreja($this);
			}
			$this->addVideoIgreja($videoIgreja);
		}

		$this->collVideoIgrejas = $videoIgrejas;
	}

	/**
	 * Returns the number of related VideoIgreja objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related VideoIgreja objects.
	 * @throws     PropelException
	 */
	public function countVideoIgrejas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collVideoIgrejas || null !== $criteria) {
			if ($this->isNew() && null === $this->collVideoIgrejas) {
				return 0;
			} else {
				$query = VideoIgrejaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByIgreja($this)
					->count($con);
			}
		} else {
			return count($this->collVideoIgrejas);
		}
	}

	/**
	 * Method called to associate a VideoIgreja object to this object
	 * through the VideoIgreja foreign key attribute.
	 *
	 * @param      VideoIgreja $l VideoIgreja
	 * @return     Igreja The current object (for fluent API support)
	 */
	public function addVideoIgreja(VideoIgreja $l)
	{
		if ($this->collVideoIgrejas === null) {
			$this->initVideoIgrejas();
		}
		if (!$this->collVideoIgrejas->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddVideoIgreja($l);
		}

		return $this;
	}

	/**
	 * @param	VideoIgreja $videoIgreja The videoIgreja object to add.
	 */
	protected function doAddVideoIgreja($videoIgreja)
	{
		$this->collVideoIgrejas[]= $videoIgreja;
		$videoIgreja->setIgreja($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Igreja is new, it will return
	 * an empty collection; or if this Igreja has previously
	 * been saved, it will retrieve related VideoIgrejas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Igreja.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array VideoIgreja[] List of VideoIgreja objects
	 */
	public function getVideoIgrejasJoinVideo($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = VideoIgrejaQuery::create(null, $criteria);
		$query->joinWith('Video', $join_behavior);

		return $this->getVideoIgrejas($query, $con);
	}

	/**
	 * Clears out the collAgendas collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAgendas()
	 */
	public function clearAgendas()
	{
		$this->collAgendas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAgendas collection.
	 *
	 * By default this just sets the collAgendas collection to an empty collection (like clearAgendas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAgendas()
	{
		$this->collAgendas = new PropelObjectCollection();
		$this->collAgendas->setModel('Agenda');
	}

	/**
	 * Gets a collection of Agenda objects related by a many-to-many relationship
	 * to the current object by way of the agenda_igreja cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Igreja is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Agenda[] List of Agenda objects
	 */
	public function getAgendas($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAgendas || null !== $criteria) {
			if ($this->isNew() && null === $this->collAgendas) {
				// return empty collection
				$this->initAgendas();
			} else {
				$collAgendas = AgendaQuery::create(null, $criteria)
					->filterByIgreja($this)
					->find($con);
				if (null !== $criteria) {
					return $collAgendas;
				}
				$this->collAgendas = $collAgendas;
			}
		}
		return $this->collAgendas;
	}

	/**
	 * Sets a collection of Agenda objects related by a many-to-many relationship
	 * to the current object by way of the agenda_igreja cross-reference table.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $agendas A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setAgendas(PropelCollection $agendas, PropelPDO $con = null)
	{
		$agendaIgrejas = AgendaIgrejaQuery::create()
			->filterByAgenda($agendas)
			->filterByIgreja($this)
			->find($con);

		$this->agendasScheduledForDeletion = $this->getAgendaIgrejas()->diff($agendaIgrejas);
		$this->collAgendaIgrejas = $agendaIgrejas;

		foreach ($agendas as $agenda) {
			// Fix issue with collection modified by reference
			if ($agenda->isNew()) {
				$this->doAddAgenda($agenda);
			} else {
				$this->addAgenda($agenda);
			}
		}

		$this->collAgendas = $agendas;
	}

	/**
	 * Gets the number of Agenda objects related by a many-to-many relationship
	 * to the current object by way of the agenda_igreja cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Agenda objects
	 */
	public function countAgendas($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAgendas || null !== $criteria) {
			if ($this->isNew() && null === $this->collAgendas) {
				return 0;
			} else {
				$query = AgendaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByIgreja($this)
					->count($con);
			}
		} else {
			return count($this->collAgendas);
		}
	}

	/**
	 * Associate a Agenda object to this object
	 * through the agenda_igreja cross reference table.
	 *
	 * @param      Agenda $agenda The AgendaIgreja object to relate
	 * @return     void
	 */
	public function addAgenda(Agenda $agenda)
	{
		if ($this->collAgendas === null) {
			$this->initAgendas();
		}
		if (!$this->collAgendas->contains($agenda)) { // only add it if the **same** object is not already associated
			$this->doAddAgenda($agenda);

			$this->collAgendas[]= $agenda;
		}
	}

	/**
	 * @param	Agenda $agenda The agenda object to add.
	 */
	protected function doAddAgenda($agenda)
	{
		$agendaIgreja = new AgendaIgreja();
		$agendaIgreja->setAgenda($agenda);
		$this->addAgendaIgreja($agendaIgreja);
	}

	/**
	 * Clears out the collNoticias collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addNoticias()
	 */
	public function clearNoticias()
	{
		$this->collNoticias = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collNoticias collection.
	 *
	 * By default this just sets the collNoticias collection to an empty collection (like clearNoticias());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initNoticias()
	{
		$this->collNoticias = new PropelObjectCollection();
		$this->collNoticias->setModel('Noticia');
	}

	/**
	 * Gets a collection of Noticia objects related by a many-to-many relationship
	 * to the current object by way of the noticia_igreja cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Igreja is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Noticia[] List of Noticia objects
	 */
	public function getNoticias($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNoticias || null !== $criteria) {
			if ($this->isNew() && null === $this->collNoticias) {
				// return empty collection
				$this->initNoticias();
			} else {
				$collNoticias = NoticiaQuery::create(null, $criteria)
					->filterByIgreja($this)
					->find($con);
				if (null !== $criteria) {
					return $collNoticias;
				}
				$this->collNoticias = $collNoticias;
			}
		}
		return $this->collNoticias;
	}

	/**
	 * Sets a collection of Noticia objects related by a many-to-many relationship
	 * to the current object by way of the noticia_igreja cross-reference table.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $noticias A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setNoticias(PropelCollection $noticias, PropelPDO $con = null)
	{
		$noticiaIgrejas = NoticiaIgrejaQuery::create()
			->filterByNoticia($noticias)
			->filterByIgreja($this)
			->find($con);

		$this->noticiasScheduledForDeletion = $this->getNoticiaIgrejas()->diff($noticiaIgrejas);
		$this->collNoticiaIgrejas = $noticiaIgrejas;

		foreach ($noticias as $noticia) {
			// Fix issue with collection modified by reference
			if ($noticia->isNew()) {
				$this->doAddNoticia($noticia);
			} else {
				$this->addNoticia($noticia);
			}
		}

		$this->collNoticias = $noticias;
	}

	/**
	 * Gets the number of Noticia objects related by a many-to-many relationship
	 * to the current object by way of the noticia_igreja cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Noticia objects
	 */
	public function countNoticias($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collNoticias || null !== $criteria) {
			if ($this->isNew() && null === $this->collNoticias) {
				return 0;
			} else {
				$query = NoticiaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByIgreja($this)
					->count($con);
			}
		} else {
			return count($this->collNoticias);
		}
	}

	/**
	 * Associate a Noticia object to this object
	 * through the noticia_igreja cross reference table.
	 *
	 * @param      Noticia $noticia The NoticiaIgreja object to relate
	 * @return     void
	 */
	public function addNoticia(Noticia $noticia)
	{
		if ($this->collNoticias === null) {
			$this->initNoticias();
		}
		if (!$this->collNoticias->contains($noticia)) { // only add it if the **same** object is not already associated
			$this->doAddNoticia($noticia);

			$this->collNoticias[]= $noticia;
		}
	}

	/**
	 * @param	Noticia $noticia The noticia object to add.
	 */
	protected function doAddNoticia($noticia)
	{
		$noticiaIgreja = new NoticiaIgreja();
		$noticiaIgreja->setNoticia($noticia);
		$this->addNoticiaIgreja($noticiaIgreja);
	}

	/**
	 * Clears out the collPodcasts collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPodcasts()
	 */
	public function clearPodcasts()
	{
		$this->collPodcasts = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPodcasts collection.
	 *
	 * By default this just sets the collPodcasts collection to an empty collection (like clearPodcasts());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initPodcasts()
	{
		$this->collPodcasts = new PropelObjectCollection();
		$this->collPodcasts->setModel('Podcast');
	}

	/**
	 * Gets a collection of Podcast objects related by a many-to-many relationship
	 * to the current object by way of the podcast_igreja cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Igreja is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Podcast[] List of Podcast objects
	 */
	public function getPodcasts($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPodcasts || null !== $criteria) {
			if ($this->isNew() && null === $this->collPodcasts) {
				// return empty collection
				$this->initPodcasts();
			} else {
				$collPodcasts = PodcastQuery::create(null, $criteria)
					->filterByIgreja($this)
					->find($con);
				if (null !== $criteria) {
					return $collPodcasts;
				}
				$this->collPodcasts = $collPodcasts;
			}
		}
		return $this->collPodcasts;
	}

	/**
	 * Sets a collection of Podcast objects related by a many-to-many relationship
	 * to the current object by way of the podcast_igreja cross-reference table.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $podcasts A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setPodcasts(PropelCollection $podcasts, PropelPDO $con = null)
	{
		$podcastIgrejas = PodcastIgrejaQuery::create()
			->filterByPodcast($podcasts)
			->filterByIgreja($this)
			->find($con);

		$this->podcastsScheduledForDeletion = $this->getPodcastIgrejas()->diff($podcastIgrejas);
		$this->collPodcastIgrejas = $podcastIgrejas;

		foreach ($podcasts as $podcast) {
			// Fix issue with collection modified by reference
			if ($podcast->isNew()) {
				$this->doAddPodcast($podcast);
			} else {
				$this->addPodcast($podcast);
			}
		}

		$this->collPodcasts = $podcasts;
	}

	/**
	 * Gets the number of Podcast objects related by a many-to-many relationship
	 * to the current object by way of the podcast_igreja cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Podcast objects
	 */
	public function countPodcasts($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPodcasts || null !== $criteria) {
			if ($this->isNew() && null === $this->collPodcasts) {
				return 0;
			} else {
				$query = PodcastQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByIgreja($this)
					->count($con);
			}
		} else {
			return count($this->collPodcasts);
		}
	}

	/**
	 * Associate a Podcast object to this object
	 * through the podcast_igreja cross reference table.
	 *
	 * @param      Podcast $podcast The PodcastIgreja object to relate
	 * @return     void
	 */
	public function addPodcast(Podcast $podcast)
	{
		if ($this->collPodcasts === null) {
			$this->initPodcasts();
		}
		if (!$this->collPodcasts->contains($podcast)) { // only add it if the **same** object is not already associated
			$this->doAddPodcast($podcast);

			$this->collPodcasts[]= $podcast;
		}
	}

	/**
	 * @param	Podcast $podcast The podcast object to add.
	 */
	protected function doAddPodcast($podcast)
	{
		$podcastIgreja = new PodcastIgreja();
		$podcastIgreja->setPodcast($podcast);
		$this->addPodcastIgreja($podcastIgreja);
	}

	/**
	 * Clears out the collUsuarios collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUsuarios()
	 */
	public function clearUsuarios()
	{
		$this->collUsuarios = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUsuarios collection.
	 *
	 * By default this just sets the collUsuarios collection to an empty collection (like clearUsuarios());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initUsuarios()
	{
		$this->collUsuarios = new PropelObjectCollection();
		$this->collUsuarios->setModel('Usuario');
	}

	/**
	 * Gets a collection of Usuario objects related by a many-to-many relationship
	 * to the current object by way of the usuario_filial cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Igreja is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Usuario[] List of Usuario objects
	 */
	public function getUsuarios($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collUsuarios || null !== $criteria) {
			if ($this->isNew() && null === $this->collUsuarios) {
				// return empty collection
				$this->initUsuarios();
			} else {
				$collUsuarios = UsuarioQuery::create(null, $criteria)
					->filterByIgreja($this)
					->find($con);
				if (null !== $criteria) {
					return $collUsuarios;
				}
				$this->collUsuarios = $collUsuarios;
			}
		}
		return $this->collUsuarios;
	}

	/**
	 * Sets a collection of Usuario objects related by a many-to-many relationship
	 * to the current object by way of the usuario_filial cross-reference table.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $usuarios A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setUsuarios(PropelCollection $usuarios, PropelPDO $con = null)
	{
		$usuarioFilials = UsuarioFilialQuery::create()
			->filterByUsuario($usuarios)
			->filterByIgreja($this)
			->find($con);

		$this->usuariosScheduledForDeletion = $this->getUsuarioFilials()->diff($usuarioFilials);
		$this->collUsuarioFilials = $usuarioFilials;

		foreach ($usuarios as $usuario) {
			// Fix issue with collection modified by reference
			if ($usuario->isNew()) {
				$this->doAddUsuario($usuario);
			} else {
				$this->addUsuario($usuario);
			}
		}

		$this->collUsuarios = $usuarios;
	}

	/**
	 * Gets the number of Usuario objects related by a many-to-many relationship
	 * to the current object by way of the usuario_filial cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Usuario objects
	 */
	public function countUsuarios($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collUsuarios || null !== $criteria) {
			if ($this->isNew() && null === $this->collUsuarios) {
				return 0;
			} else {
				$query = UsuarioQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByIgreja($this)
					->count($con);
			}
		} else {
			return count($this->collUsuarios);
		}
	}

	/**
	 * Associate a Usuario object to this object
	 * through the usuario_filial cross reference table.
	 *
	 * @param      Usuario $usuario The UsuarioFilial object to relate
	 * @return     void
	 */
	public function addUsuario(Usuario $usuario)
	{
		if ($this->collUsuarios === null) {
			$this->initUsuarios();
		}
		if (!$this->collUsuarios->contains($usuario)) { // only add it if the **same** object is not already associated
			$this->doAddUsuario($usuario);

			$this->collUsuarios[]= $usuario;
		}
	}

	/**
	 * @param	Usuario $usuario The usuario object to add.
	 */
	protected function doAddUsuario($usuario)
	{
		$usuarioFilial = new UsuarioFilial();
		$usuarioFilial->setUsuario($usuario);
		$this->addUsuarioFilial($usuarioFilial);
	}

	/**
	 * Clears out the collVideos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addVideos()
	 */
	public function clearVideos()
	{
		$this->collVideos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collVideos collection.
	 *
	 * By default this just sets the collVideos collection to an empty collection (like clearVideos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initVideos()
	{
		$this->collVideos = new PropelObjectCollection();
		$this->collVideos->setModel('Video');
	}

	/**
	 * Gets a collection of Video objects related by a many-to-many relationship
	 * to the current object by way of the video_igreja cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Igreja is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Video[] List of Video objects
	 */
	public function getVideos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collVideos || null !== $criteria) {
			if ($this->isNew() && null === $this->collVideos) {
				// return empty collection
				$this->initVideos();
			} else {
				$collVideos = VideoQuery::create(null, $criteria)
					->filterByIgreja($this)
					->find($con);
				if (null !== $criteria) {
					return $collVideos;
				}
				$this->collVideos = $collVideos;
			}
		}
		return $this->collVideos;
	}

	/**
	 * Sets a collection of Video objects related by a many-to-many relationship
	 * to the current object by way of the video_igreja cross-reference table.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $videos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setVideos(PropelCollection $videos, PropelPDO $con = null)
	{
		$videoIgrejas = VideoIgrejaQuery::create()
			->filterByVideo($videos)
			->filterByIgreja($this)
			->find($con);

		$this->videosScheduledForDeletion = $this->getVideoIgrejas()->diff($videoIgrejas);
		$this->collVideoIgrejas = $videoIgrejas;

		foreach ($videos as $video) {
			// Fix issue with collection modified by reference
			if ($video->isNew()) {
				$this->doAddVideo($video);
			} else {
				$this->addVideo($video);
			}
		}

		$this->collVideos = $videos;
	}

	/**
	 * Gets the number of Video objects related by a many-to-many relationship
	 * to the current object by way of the video_igreja cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Video objects
	 */
	public function countVideos($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collVideos || null !== $criteria) {
			if ($this->isNew() && null === $this->collVideos) {
				return 0;
			} else {
				$query = VideoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByIgreja($this)
					->count($con);
			}
		} else {
			return count($this->collVideos);
		}
	}

	/**
	 * Associate a Video object to this object
	 * through the video_igreja cross reference table.
	 *
	 * @param      Video $video The VideoIgreja object to relate
	 * @return     void
	 */
	public function addVideo(Video $video)
	{
		if ($this->collVideos === null) {
			$this->initVideos();
		}
		if (!$this->collVideos->contains($video)) { // only add it if the **same** object is not already associated
			$this->doAddVideo($video);

			$this->collVideos[]= $video;
		}
	}

	/**
	 * @param	Video $video The video object to add.
	 */
	protected function doAddVideo($video)
	{
		$videoIgreja = new VideoIgreja();
		$videoIgreja->setVideo($video);
		$this->addVideoIgreja($videoIgreja);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->criador_id = null;
		$this->responsavel_id = null;
		$this->endereco_id = null;
		$this->igreja_id = null;
		$this->tipo = null;
		$this->nome_fantasia = null;
		$this->razao_social = null;
		$this->cnpj = null;
		$this->ativa = null;
		$this->site = null;
		$this->sobre_nos = null;
		$this->visao = null;
		$this->missao = null;
		$this->valores = null;
		$this->data_cadastro = null;
		$this->email = null;
		$this->telefone = null;
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
			if ($this->collAgendaIgrejas) {
				foreach ($this->collAgendaIgrejas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collIgrejasRelatedById) {
				foreach ($this->collIgrejasRelatedById as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collMembrosRelatedByFilialId) {
				foreach ($this->collMembrosRelatedByFilialId as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collMembrosRelatedByInstituicaoId) {
				foreach ($this->collMembrosRelatedByInstituicaoId as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collMinisteriosRelatedByIgrejaPertencenteId) {
				foreach ($this->collMinisteriosRelatedByIgrejaPertencenteId as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collMinisteriosRelatedByInstituicaoId) {
				foreach ($this->collMinisteriosRelatedByInstituicaoId as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collNoticiaIgrejas) {
				foreach ($this->collNoticiaIgrejas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPedidoOracaos) {
				foreach ($this->collPedidoOracaos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPgs) {
				foreach ($this->collPgs as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPodcastIgrejas) {
				foreach ($this->collPodcastIgrejas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collUsuariosRelatedByFilialId) {
				foreach ($this->collUsuariosRelatedByFilialId as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collUsuariosRelatedByInstituicaoId) {
				foreach ($this->collUsuariosRelatedByInstituicaoId as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collUsuarioFilials) {
				foreach ($this->collUsuarioFilials as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collVideoIgrejas) {
				foreach ($this->collVideoIgrejas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAgendas) {
				foreach ($this->collAgendas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collNoticias) {
				foreach ($this->collNoticias as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPodcasts) {
				foreach ($this->collPodcasts as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collUsuarios) {
				foreach ($this->collUsuarios as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collVideos) {
				foreach ($this->collVideos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collAgendaIgrejas instanceof PropelCollection) {
			$this->collAgendaIgrejas->clearIterator();
		}
		$this->collAgendaIgrejas = null;
		if ($this->collIgrejasRelatedById instanceof PropelCollection) {
			$this->collIgrejasRelatedById->clearIterator();
		}
		$this->collIgrejasRelatedById = null;
		if ($this->collMembrosRelatedByFilialId instanceof PropelCollection) {
			$this->collMembrosRelatedByFilialId->clearIterator();
		}
		$this->collMembrosRelatedByFilialId = null;
		if ($this->collMembrosRelatedByInstituicaoId instanceof PropelCollection) {
			$this->collMembrosRelatedByInstituicaoId->clearIterator();
		}
		$this->collMembrosRelatedByInstituicaoId = null;
		if ($this->collMinisteriosRelatedByIgrejaPertencenteId instanceof PropelCollection) {
			$this->collMinisteriosRelatedByIgrejaPertencenteId->clearIterator();
		}
		$this->collMinisteriosRelatedByIgrejaPertencenteId = null;
		if ($this->collMinisteriosRelatedByInstituicaoId instanceof PropelCollection) {
			$this->collMinisteriosRelatedByInstituicaoId->clearIterator();
		}
		$this->collMinisteriosRelatedByInstituicaoId = null;
		if ($this->collNoticiaIgrejas instanceof PropelCollection) {
			$this->collNoticiaIgrejas->clearIterator();
		}
		$this->collNoticiaIgrejas = null;
		if ($this->collPedidoOracaos instanceof PropelCollection) {
			$this->collPedidoOracaos->clearIterator();
		}
		$this->collPedidoOracaos = null;
		if ($this->collPgs instanceof PropelCollection) {
			$this->collPgs->clearIterator();
		}
		$this->collPgs = null;
		if ($this->collPodcastIgrejas instanceof PropelCollection) {
			$this->collPodcastIgrejas->clearIterator();
		}
		$this->collPodcastIgrejas = null;
		if ($this->collUsuariosRelatedByFilialId instanceof PropelCollection) {
			$this->collUsuariosRelatedByFilialId->clearIterator();
		}
		$this->collUsuariosRelatedByFilialId = null;
		if ($this->collUsuariosRelatedByInstituicaoId instanceof PropelCollection) {
			$this->collUsuariosRelatedByInstituicaoId->clearIterator();
		}
		$this->collUsuariosRelatedByInstituicaoId = null;
		if ($this->collUsuarioFilials instanceof PropelCollection) {
			$this->collUsuarioFilials->clearIterator();
		}
		$this->collUsuarioFilials = null;
		if ($this->collVideoIgrejas instanceof PropelCollection) {
			$this->collVideoIgrejas->clearIterator();
		}
		$this->collVideoIgrejas = null;
		if ($this->collAgendas instanceof PropelCollection) {
			$this->collAgendas->clearIterator();
		}
		$this->collAgendas = null;
		if ($this->collNoticias instanceof PropelCollection) {
			$this->collNoticias->clearIterator();
		}
		$this->collNoticias = null;
		if ($this->collPodcasts instanceof PropelCollection) {
			$this->collPodcasts->clearIterator();
		}
		$this->collPodcasts = null;
		if ($this->collUsuarios instanceof PropelCollection) {
			$this->collUsuarios->clearIterator();
		}
		$this->collUsuarios = null;
		if ($this->collVideos instanceof PropelCollection) {
			$this->collVideos->clearIterator();
		}
		$this->collVideos = null;
		$this->aEndereco = null;
		$this->aIgrejaRelatedByIgrejaId = null;
		$this->aUsuarioRelatedByResponsavelId = null;
		$this->aUsuarioRelatedByCriadorId = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(IgrejaPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseIgreja
