<?php


/**
 * Base class that represents a row from the 'usuario' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseUsuario extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'UsuarioPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        UsuarioPeer
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
	 * The value for the perfil_id field.
	 * @var        int
	 */
	protected $perfil_id;

	/**
	 * The value for the endereco_id field.
	 * @var        int
	 */
	protected $endereco_id;

	/**
	 * The value for the cargo_id field.
	 * @var        int
	 */
	protected $cargo_id;

	/**
	 * The value for the departamento_id field.
	 * @var        int
	 */
	protected $departamento_id;

	/**
	 * The value for the matricula field.
	 * @var        string
	 */
	protected $matricula;

	/**
	 * The value for the nome field.
	 * @var        string
	 */
	protected $nome;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the dni field.
	 * @var        string
	 */
	protected $dni;

	/**
	 * The value for the data_nascimento field.
	 * @var        string
	 */
	protected $data_nascimento;

	/**
	 * The value for the data_contratacao field.
	 * @var        string
	 */
	protected $data_contratacao;

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
	 * The value for the token field.
	 * @var        string
	 */
	protected $token;

	/**
	 * The value for the nome_usuario field.
	 * @var        string
	 */
	protected $nome_usuario;

	/**
	 * The value for the senha field.
	 * @var        string
	 */
	protected $senha;

	/**
	 * The value for the token_senha field.
	 * @var        string
	 */
	protected $token_senha;

	/**
	 * The value for the token_firebase field.
	 * @var        string
	 */
	protected $token_firebase;

	/**
	 * The value for the data_rescisao field.
	 * @var        string
	 */
	protected $data_rescisao;

	/**
	 * The value for the ativo field.
	 * Note: this column has a database default value of: true
	 * @var        boolean
	 */
	protected $ativo;

	/**
	 * The value for the tipo_acesso field.
	 * Note: this column has a database default value of: 'M'
	 * @var        string
	 */
	protected $tipo_acesso;

	/**
	 * The value for the estado_civil field.
	 * Note: this column has a database default value of: 'O'
	 * @var        string
	 */
	protected $estado_civil;

	/**
	 * The value for the nivel_acesso field.
	 * Note: this column has a database default value of: '1'
	 * @var        string
	 */
	protected $nivel_acesso;

	/**
	 * The value for the usuario_validado field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $usuario_validado;

	/**
	 * The value for the sexo field.
	 * @var        string
	 */
	protected $sexo;

	/**
	 * The value for the data_cadastro field.
	 * @var        string
	 */
	protected $data_cadastro;

	/**
	 * @var        Perfil
	 */
	protected $aPerfil;

	/**
	 * @var        Cargo
	 */
	protected $aCargo;

	/**
	 * @var        Departamento
	 */
	protected $aDepartamento;

	/**
	 * @var        Endereco
	 */
	protected $aEndereco;

	/**
	 * @var        array Auditoria[] Collection to store aggregation of Auditoria objects.
	 */
	protected $collAuditorias;

	/**
	 * @var        array AvaliacaoRespostaForum[] Collection to store aggregation of AvaliacaoRespostaForum objects.
	 */
	protected $collAvaliacaoRespostaForums;

	/**
	 * @var        array ColetaPesquisa[] Collection to store aggregation of ColetaPesquisa objects.
	 */
	protected $collColetaPesquisas;

	/**
	 * @var        array ComentarioNoticia[] Collection to store aggregation of ComentarioNoticia objects.
	 */
	protected $collComentarioNoticias;

	/**
	 * @var        array CurtidaForum[] Collection to store aggregation of CurtidaForum objects.
	 */
	protected $collCurtidaForums;

	/**
	 * @var        array Noticia[] Collection to store aggregation of Noticia objects.
	 */
	protected $collNoticias;

	/**
	 * @var        array Pesquisa[] Collection to store aggregation of Pesquisa objects.
	 */
	protected $collPesquisas;

	/**
	 * @var        array PesquisaHabilitada[] Collection to store aggregation of PesquisaHabilitada objects.
	 */
	protected $collPesquisaHabilitadas;

	/**
	 * @var        array Premio[] Collection to store aggregation of Premio objects.
	 */
	protected $collPremios;

	/**
	 * @var        array RespostaForum[] Collection to store aggregation of RespostaForum objects.
	 */
	protected $collRespostaForums;

	/**
	 * @var        array SolicitacaoResgate[] Collection to store aggregation of SolicitacaoResgate objects.
	 */
	protected $collSolicitacaoResgatesRelatedByAprovadorId;

	/**
	 * @var        array SolicitacaoResgate[] Collection to store aggregation of SolicitacaoResgate objects.
	 */
	protected $collSolicitacaoResgatesRelatedBySolicitanteId;

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
	protected $auditoriasScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $avaliacaoRespostaForumsScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $coletaPesquisasScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $comentarioNoticiasScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $curtidaForumsScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $noticiasScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $pesquisasScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $pesquisaHabilitadasScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $premiosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $respostaForumsScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $solicitacaoResgatesRelatedByAprovadorIdScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $solicitacaoResgatesRelatedBySolicitanteIdScheduledForDeletion = null;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->ativo = true;
		$this->tipo_acesso = 'M';
		$this->estado_civil = 'O';
		$this->nivel_acesso = '1';
		$this->usuario_validado = false;
	}

	/**
	 * Initializes internal state of BaseUsuario object.
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
	 * Get the [perfil_id] column value.
	 * 
	 * @return     int
	 */
	public function getPerfilId()
	{
		return $this->perfil_id;
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
	 * Get the [cargo_id] column value.
	 * 
	 * @return     int
	 */
	public function getCargoId()
	{
		return $this->cargo_id;
	}

	/**
	 * Get the [departamento_id] column value.
	 * 
	 * @return     int
	 */
	public function getDepartamentoId()
	{
		return $this->departamento_id;
	}

	/**
	 * Get the [matricula] column value.
	 * 
	 * @return     string
	 */
	public function getMatricula()
	{
		return $this->matricula;
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
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Get the [dni] column value.
	 * 
	 * @return     string
	 */
	public function getDni()
	{
		return $this->dni;
	}

	/**
	 * Get the [optionally formatted] temporal [data_nascimento] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataNascimento($format = '%x')
	{
		if ($this->data_nascimento === null) {
			return null;
		}


		if ($this->data_nascimento === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_nascimento);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_nascimento, true), $x);
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
	 * Get the [optionally formatted] temporal [data_contratacao] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataContratacao($format = '%x')
	{
		if ($this->data_contratacao === null) {
			return null;
		}


		if ($this->data_contratacao === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_contratacao);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_contratacao, true), $x);
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
	 * Get the [token] column value.
	 * 
	 * @return     string
	 */
	public function getToken()
	{
		return $this->token;
	}

	/**
	 * Get the [nome_usuario] column value.
	 * 
	 * @return     string
	 */
	public function getNomeUsuario()
	{
		return $this->nome_usuario;
	}

	/**
	 * Get the [senha] column value.
	 * 
	 * @return     string
	 */
	public function getSenha()
	{
		return $this->senha;
	}

	/**
	 * Get the [token_senha] column value.
	 * 
	 * @return     string
	 */
	public function getTokenSenha()
	{
		return $this->token_senha;
	}

	/**
	 * Get the [token_firebase] column value.
	 * 
	 * @return     string
	 */
	public function getTokenFirebase()
	{
		return $this->token_firebase;
	}

	/**
	 * Get the [optionally formatted] temporal [data_rescisao] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataRescisao($format = '%x')
	{
		if ($this->data_rescisao === null) {
			return null;
		}


		if ($this->data_rescisao === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_rescisao);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_rescisao, true), $x);
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
	 * Get the [tipo_acesso] column value.
	 * 
	 * @return     string
	 */
	public function getTipoAcesso()
	{
		return $this->tipo_acesso;
	}

	/**
	 * Get the [estado_civil] column value.
	 * 
	 * @return     string
	 */
	public function getEstadoCivil()
	{
		return $this->estado_civil;
	}

	/**
	 * Get the [nivel_acesso] column value.
	 * 
	 * @return     string
	 */
	public function getNivelAcesso()
	{
		return $this->nivel_acesso;
	}

	/**
	 * Get the [usuario_validado] column value.
	 * 
	 * @return     boolean
	 */
	public function getUsuarioValidado()
	{
		return $this->usuario_validado;
	}

	/**
	 * Get the [sexo] column value.
	 * 
	 * @return     string
	 */
	public function getSexo()
	{
		return $this->sexo;
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
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = UsuarioPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [perfil_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setPerfilId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->perfil_id !== $v) {
			$this->perfil_id = $v;
			$this->modifiedColumns[] = UsuarioPeer::PERFIL_ID;
		}

		if ($this->aPerfil !== null && $this->aPerfil->getId() !== $v) {
			$this->aPerfil = null;
		}

		return $this;
	} // setPerfilId()

	/**
	 * Set the value of [endereco_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setEnderecoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->endereco_id !== $v) {
			$this->endereco_id = $v;
			$this->modifiedColumns[] = UsuarioPeer::ENDERECO_ID;
		}

		if ($this->aEndereco !== null && $this->aEndereco->getId() !== $v) {
			$this->aEndereco = null;
		}

		return $this;
	} // setEnderecoId()

	/**
	 * Set the value of [cargo_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setCargoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cargo_id !== $v) {
			$this->cargo_id = $v;
			$this->modifiedColumns[] = UsuarioPeer::CARGO_ID;
		}

		if ($this->aCargo !== null && $this->aCargo->getId() !== $v) {
			$this->aCargo = null;
		}

		return $this;
	} // setCargoId()

	/**
	 * Set the value of [departamento_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setDepartamentoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->departamento_id !== $v) {
			$this->departamento_id = $v;
			$this->modifiedColumns[] = UsuarioPeer::DEPARTAMENTO_ID;
		}

		if ($this->aDepartamento !== null && $this->aDepartamento->getId() !== $v) {
			$this->aDepartamento = null;
		}

		return $this;
	} // setDepartamentoId()

	/**
	 * Set the value of [matricula] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setMatricula($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->matricula !== $v) {
			$this->matricula = $v;
			$this->modifiedColumns[] = UsuarioPeer::MATRICULA;
		}

		return $this;
	} // setMatricula()

	/**
	 * Set the value of [nome] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setNome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome !== $v) {
			$this->nome = $v;
			$this->modifiedColumns[] = UsuarioPeer::NOME;
		}

		return $this;
	} // setNome()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = UsuarioPeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [dni] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setDni($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->dni !== $v) {
			$this->dni = $v;
			$this->modifiedColumns[] = UsuarioPeer::DNI;
		}

		return $this;
	} // setDni()

	/**
	 * Sets the value of [data_nascimento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setDataNascimento($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_nascimento !== null || $dt !== null) {
			$currentDateAsString = ($this->data_nascimento !== null && $tmpDt = new DateTime($this->data_nascimento)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_nascimento = $newDateAsString;
				$this->modifiedColumns[] = UsuarioPeer::DATA_NASCIMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataNascimento()

	/**
	 * Sets the value of [data_contratacao] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setDataContratacao($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_contratacao !== null || $dt !== null) {
			$currentDateAsString = ($this->data_contratacao !== null && $tmpDt = new DateTime($this->data_contratacao)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_contratacao = $newDateAsString;
				$this->modifiedColumns[] = UsuarioPeer::DATA_CONTRATACAO;
			}
		} // if either are not null

		return $this;
	} // setDataContratacao()

	/**
	 * Set the value of [celular] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setCelular($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->celular !== $v) {
			$this->celular = $v;
			$this->modifiedColumns[] = UsuarioPeer::CELULAR;
		}

		return $this;
	} // setCelular()

	/**
	 * Set the value of [telefone] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setTelefone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->telefone !== $v) {
			$this->telefone = $v;
			$this->modifiedColumns[] = UsuarioPeer::TELEFONE;
		}

		return $this;
	} // setTelefone()

	/**
	 * Set the value of [token] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setToken($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->token !== $v) {
			$this->token = $v;
			$this->modifiedColumns[] = UsuarioPeer::TOKEN;
		}

		return $this;
	} // setToken()

	/**
	 * Set the value of [nome_usuario] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setNomeUsuario($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome_usuario !== $v) {
			$this->nome_usuario = $v;
			$this->modifiedColumns[] = UsuarioPeer::NOME_USUARIO;
		}

		return $this;
	} // setNomeUsuario()

	/**
	 * Set the value of [senha] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setSenha($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->senha !== $v) {
			$this->senha = $v;
			$this->modifiedColumns[] = UsuarioPeer::SENHA;
		}

		return $this;
	} // setSenha()

	/**
	 * Set the value of [token_senha] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setTokenSenha($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->token_senha !== $v) {
			$this->token_senha = $v;
			$this->modifiedColumns[] = UsuarioPeer::TOKEN_SENHA;
		}

		return $this;
	} // setTokenSenha()

	/**
	 * Set the value of [token_firebase] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setTokenFirebase($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->token_firebase !== $v) {
			$this->token_firebase = $v;
			$this->modifiedColumns[] = UsuarioPeer::TOKEN_FIREBASE;
		}

		return $this;
	} // setTokenFirebase()

	/**
	 * Sets the value of [data_rescisao] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setDataRescisao($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_rescisao !== null || $dt !== null) {
			$currentDateAsString = ($this->data_rescisao !== null && $tmpDt = new DateTime($this->data_rescisao)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_rescisao = $newDateAsString;
				$this->modifiedColumns[] = UsuarioPeer::DATA_RESCISAO;
			}
		} // if either are not null

		return $this;
	} // setDataRescisao()

	/**
	 * Sets the value of the [ativo] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Usuario The current object (for fluent API support)
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
			$this->modifiedColumns[] = UsuarioPeer::ATIVO;
		}

		return $this;
	} // setAtivo()

	/**
	 * Set the value of [tipo_acesso] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setTipoAcesso($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->tipo_acesso !== $v) {
			$this->tipo_acesso = $v;
			$this->modifiedColumns[] = UsuarioPeer::TIPO_ACESSO;
		}

		return $this;
	} // setTipoAcesso()

	/**
	 * Set the value of [estado_civil] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setEstadoCivil($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->estado_civil !== $v) {
			$this->estado_civil = $v;
			$this->modifiedColumns[] = UsuarioPeer::ESTADO_CIVIL;
		}

		return $this;
	} // setEstadoCivil()

	/**
	 * Set the value of [nivel_acesso] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setNivelAcesso($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nivel_acesso !== $v) {
			$this->nivel_acesso = $v;
			$this->modifiedColumns[] = UsuarioPeer::NIVEL_ACESSO;
		}

		return $this;
	} // setNivelAcesso()

	/**
	 * Sets the value of the [usuario_validado] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setUsuarioValidado($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->usuario_validado !== $v) {
			$this->usuario_validado = $v;
			$this->modifiedColumns[] = UsuarioPeer::USUARIO_VALIDADO;
		}

		return $this;
	} // setUsuarioValidado()

	/**
	 * Set the value of [sexo] column.
	 * 
	 * @param      string $v new value
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setSexo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->sexo !== $v) {
			$this->sexo = $v;
			$this->modifiedColumns[] = UsuarioPeer::SEXO;
		}

		return $this;
	} // setSexo()

	/**
	 * Sets the value of [data_cadastro] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function setDataCadastro($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_cadastro !== null || $dt !== null) {
			$currentDateAsString = ($this->data_cadastro !== null && $tmpDt = new DateTime($this->data_cadastro)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_cadastro = $newDateAsString;
				$this->modifiedColumns[] = UsuarioPeer::DATA_CADASTRO;
			}
		} // if either are not null

		return $this;
	} // setDataCadastro()

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

			if ($this->tipo_acesso !== 'M') {
				return false;
			}

			if ($this->estado_civil !== 'O') {
				return false;
			}

			if ($this->nivel_acesso !== '1') {
				return false;
			}

			if ($this->usuario_validado !== false) {
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
			$this->perfil_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->endereco_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->cargo_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->departamento_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->matricula = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->nome = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->email = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->dni = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->data_nascimento = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->data_contratacao = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->celular = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->telefone = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->token = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->nome_usuario = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->senha = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->token_senha = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->token_firebase = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->data_rescisao = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
			$this->ativo = ($row[$startcol + 19] !== null) ? (boolean) $row[$startcol + 19] : null;
			$this->tipo_acesso = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
			$this->estado_civil = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
			$this->nivel_acesso = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
			$this->usuario_validado = ($row[$startcol + 23] !== null) ? (boolean) $row[$startcol + 23] : null;
			$this->sexo = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
			$this->data_cadastro = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 26; // 26 = UsuarioPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Usuario object", $e);
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

		if ($this->aPerfil !== null && $this->perfil_id !== $this->aPerfil->getId()) {
			$this->aPerfil = null;
		}
		if ($this->aEndereco !== null && $this->endereco_id !== $this->aEndereco->getId()) {
			$this->aEndereco = null;
		}
		if ($this->aCargo !== null && $this->cargo_id !== $this->aCargo->getId()) {
			$this->aCargo = null;
		}
		if ($this->aDepartamento !== null && $this->departamento_id !== $this->aDepartamento->getId()) {
			$this->aDepartamento = null;
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
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = UsuarioPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aPerfil = null;
			$this->aCargo = null;
			$this->aDepartamento = null;
			$this->aEndereco = null;
			$this->collAuditorias = null;

			$this->collAvaliacaoRespostaForums = null;

			$this->collColetaPesquisas = null;

			$this->collComentarioNoticias = null;

			$this->collCurtidaForums = null;

			$this->collNoticias = null;

			$this->collPesquisas = null;

			$this->collPesquisaHabilitadas = null;

			$this->collPremios = null;

			$this->collRespostaForums = null;

			$this->collSolicitacaoResgatesRelatedByAprovadorId = null;

			$this->collSolicitacaoResgatesRelatedBySolicitanteId = null;

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
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = UsuarioQuery::create()
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
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				UsuarioPeer::addInstanceToPool($this);
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

			if ($this->aPerfil !== null) {
				if ($this->aPerfil->isModified() || $this->aPerfil->isNew()) {
					$affectedRows += $this->aPerfil->save($con);
				}
				$this->setPerfil($this->aPerfil);
			}

			if ($this->aCargo !== null) {
				if ($this->aCargo->isModified() || $this->aCargo->isNew()) {
					$affectedRows += $this->aCargo->save($con);
				}
				$this->setCargo($this->aCargo);
			}

			if ($this->aDepartamento !== null) {
				if ($this->aDepartamento->isModified() || $this->aDepartamento->isNew()) {
					$affectedRows += $this->aDepartamento->save($con);
				}
				$this->setDepartamento($this->aDepartamento);
			}

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

			if ($this->auditoriasScheduledForDeletion !== null) {
				if (!$this->auditoriasScheduledForDeletion->isEmpty()) {
					AuditoriaQuery::create()
						->filterByPrimaryKeys($this->auditoriasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->auditoriasScheduledForDeletion = null;
				}
			}

			if ($this->collAuditorias !== null) {
				foreach ($this->collAuditorias as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->avaliacaoRespostaForumsScheduledForDeletion !== null) {
				if (!$this->avaliacaoRespostaForumsScheduledForDeletion->isEmpty()) {
					AvaliacaoRespostaForumQuery::create()
						->filterByPrimaryKeys($this->avaliacaoRespostaForumsScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->avaliacaoRespostaForumsScheduledForDeletion = null;
				}
			}

			if ($this->collAvaliacaoRespostaForums !== null) {
				foreach ($this->collAvaliacaoRespostaForums as $referrerFK) {
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

			if ($this->comentarioNoticiasScheduledForDeletion !== null) {
				if (!$this->comentarioNoticiasScheduledForDeletion->isEmpty()) {
					ComentarioNoticiaQuery::create()
						->filterByPrimaryKeys($this->comentarioNoticiasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->comentarioNoticiasScheduledForDeletion = null;
				}
			}

			if ($this->collComentarioNoticias !== null) {
				foreach ($this->collComentarioNoticias as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->curtidaForumsScheduledForDeletion !== null) {
				if (!$this->curtidaForumsScheduledForDeletion->isEmpty()) {
					CurtidaForumQuery::create()
						->filterByPrimaryKeys($this->curtidaForumsScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->curtidaForumsScheduledForDeletion = null;
				}
			}

			if ($this->collCurtidaForums !== null) {
				foreach ($this->collCurtidaForums as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->noticiasScheduledForDeletion !== null) {
				if (!$this->noticiasScheduledForDeletion->isEmpty()) {
					NoticiaQuery::create()
						->filterByPrimaryKeys($this->noticiasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->noticiasScheduledForDeletion = null;
				}
			}

			if ($this->collNoticias !== null) {
				foreach ($this->collNoticias as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->pesquisasScheduledForDeletion !== null) {
				if (!$this->pesquisasScheduledForDeletion->isEmpty()) {
					PesquisaQuery::create()
						->filterByPrimaryKeys($this->pesquisasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->pesquisasScheduledForDeletion = null;
				}
			}

			if ($this->collPesquisas !== null) {
				foreach ($this->collPesquisas as $referrerFK) {
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

			if ($this->premiosScheduledForDeletion !== null) {
				if (!$this->premiosScheduledForDeletion->isEmpty()) {
					PremioQuery::create()
						->filterByPrimaryKeys($this->premiosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->premiosScheduledForDeletion = null;
				}
			}

			if ($this->collPremios !== null) {
				foreach ($this->collPremios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->respostaForumsScheduledForDeletion !== null) {
				if (!$this->respostaForumsScheduledForDeletion->isEmpty()) {
					RespostaForumQuery::create()
						->filterByPrimaryKeys($this->respostaForumsScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->respostaForumsScheduledForDeletion = null;
				}
			}

			if ($this->collRespostaForums !== null) {
				foreach ($this->collRespostaForums as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->solicitacaoResgatesRelatedByAprovadorIdScheduledForDeletion !== null) {
				if (!$this->solicitacaoResgatesRelatedByAprovadorIdScheduledForDeletion->isEmpty()) {
					SolicitacaoResgateQuery::create()
						->filterByPrimaryKeys($this->solicitacaoResgatesRelatedByAprovadorIdScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->solicitacaoResgatesRelatedByAprovadorIdScheduledForDeletion = null;
				}
			}

			if ($this->collSolicitacaoResgatesRelatedByAprovadorId !== null) {
				foreach ($this->collSolicitacaoResgatesRelatedByAprovadorId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->solicitacaoResgatesRelatedBySolicitanteIdScheduledForDeletion !== null) {
				if (!$this->solicitacaoResgatesRelatedBySolicitanteIdScheduledForDeletion->isEmpty()) {
					SolicitacaoResgateQuery::create()
						->filterByPrimaryKeys($this->solicitacaoResgatesRelatedBySolicitanteIdScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->solicitacaoResgatesRelatedBySolicitanteIdScheduledForDeletion = null;
				}
			}

			if ($this->collSolicitacaoResgatesRelatedBySolicitanteId !== null) {
				foreach ($this->collSolicitacaoResgatesRelatedBySolicitanteId as $referrerFK) {
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

		$this->modifiedColumns[] = UsuarioPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . UsuarioPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(UsuarioPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(UsuarioPeer::PERFIL_ID)) {
			$modifiedColumns[':p' . $index++]  = '`PERFIL_ID`';
		}
		if ($this->isColumnModified(UsuarioPeer::ENDERECO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ENDERECO_ID`';
		}
		if ($this->isColumnModified(UsuarioPeer::CARGO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`CARGO_ID`';
		}
		if ($this->isColumnModified(UsuarioPeer::DEPARTAMENTO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`DEPARTAMENTO_ID`';
		}
		if ($this->isColumnModified(UsuarioPeer::MATRICULA)) {
			$modifiedColumns[':p' . $index++]  = '`MATRICULA`';
		}
		if ($this->isColumnModified(UsuarioPeer::NOME)) {
			$modifiedColumns[':p' . $index++]  = '`NOME`';
		}
		if ($this->isColumnModified(UsuarioPeer::EMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`EMAIL`';
		}
		if ($this->isColumnModified(UsuarioPeer::DNI)) {
			$modifiedColumns[':p' . $index++]  = '`DNI`';
		}
		if ($this->isColumnModified(UsuarioPeer::DATA_NASCIMENTO)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_NASCIMENTO`';
		}
		if ($this->isColumnModified(UsuarioPeer::DATA_CONTRATACAO)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_CONTRATACAO`';
		}
		if ($this->isColumnModified(UsuarioPeer::CELULAR)) {
			$modifiedColumns[':p' . $index++]  = '`CELULAR`';
		}
		if ($this->isColumnModified(UsuarioPeer::TELEFONE)) {
			$modifiedColumns[':p' . $index++]  = '`TELEFONE`';
		}
		if ($this->isColumnModified(UsuarioPeer::TOKEN)) {
			$modifiedColumns[':p' . $index++]  = '`TOKEN`';
		}
		if ($this->isColumnModified(UsuarioPeer::NOME_USUARIO)) {
			$modifiedColumns[':p' . $index++]  = '`NOME_USUARIO`';
		}
		if ($this->isColumnModified(UsuarioPeer::SENHA)) {
			$modifiedColumns[':p' . $index++]  = '`SENHA`';
		}
		if ($this->isColumnModified(UsuarioPeer::TOKEN_SENHA)) {
			$modifiedColumns[':p' . $index++]  = '`TOKEN_SENHA`';
		}
		if ($this->isColumnModified(UsuarioPeer::TOKEN_FIREBASE)) {
			$modifiedColumns[':p' . $index++]  = '`TOKEN_FIREBASE`';
		}
		if ($this->isColumnModified(UsuarioPeer::DATA_RESCISAO)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_RESCISAO`';
		}
		if ($this->isColumnModified(UsuarioPeer::ATIVO)) {
			$modifiedColumns[':p' . $index++]  = '`ATIVO`';
		}
		if ($this->isColumnModified(UsuarioPeer::TIPO_ACESSO)) {
			$modifiedColumns[':p' . $index++]  = '`TIPO_ACESSO`';
		}
		if ($this->isColumnModified(UsuarioPeer::ESTADO_CIVIL)) {
			$modifiedColumns[':p' . $index++]  = '`ESTADO_CIVIL`';
		}
		if ($this->isColumnModified(UsuarioPeer::NIVEL_ACESSO)) {
			$modifiedColumns[':p' . $index++]  = '`NIVEL_ACESSO`';
		}
		if ($this->isColumnModified(UsuarioPeer::USUARIO_VALIDADO)) {
			$modifiedColumns[':p' . $index++]  = '`USUARIO_VALIDADO`';
		}
		if ($this->isColumnModified(UsuarioPeer::SEXO)) {
			$modifiedColumns[':p' . $index++]  = '`SEXO`';
		}
		if ($this->isColumnModified(UsuarioPeer::DATA_CADASTRO)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_CADASTRO`';
		}

		$sql = sprintf(
			'INSERT INTO `usuario` (%s) VALUES (%s)',
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
					case '`PERFIL_ID`':						
						$stmt->bindValue($identifier, $this->perfil_id, PDO::PARAM_INT);
						break;
					case '`ENDERECO_ID`':						
						$stmt->bindValue($identifier, $this->endereco_id, PDO::PARAM_INT);
						break;
					case '`CARGO_ID`':						
						$stmt->bindValue($identifier, $this->cargo_id, PDO::PARAM_INT);
						break;
					case '`DEPARTAMENTO_ID`':						
						$stmt->bindValue($identifier, $this->departamento_id, PDO::PARAM_INT);
						break;
					case '`MATRICULA`':						
						$stmt->bindValue($identifier, $this->matricula, PDO::PARAM_STR);
						break;
					case '`NOME`':						
						$stmt->bindValue($identifier, $this->nome, PDO::PARAM_STR);
						break;
					case '`EMAIL`':						
						$stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
						break;
					case '`DNI`':						
						$stmt->bindValue($identifier, $this->dni, PDO::PARAM_STR);
						break;
					case '`DATA_NASCIMENTO`':						
						$stmt->bindValue($identifier, $this->data_nascimento, PDO::PARAM_STR);
						break;
					case '`DATA_CONTRATACAO`':						
						$stmt->bindValue($identifier, $this->data_contratacao, PDO::PARAM_STR);
						break;
					case '`CELULAR`':						
						$stmt->bindValue($identifier, $this->celular, PDO::PARAM_STR);
						break;
					case '`TELEFONE`':						
						$stmt->bindValue($identifier, $this->telefone, PDO::PARAM_STR);
						break;
					case '`TOKEN`':						
						$stmt->bindValue($identifier, $this->token, PDO::PARAM_STR);
						break;
					case '`NOME_USUARIO`':						
						$stmt->bindValue($identifier, $this->nome_usuario, PDO::PARAM_STR);
						break;
					case '`SENHA`':						
						$stmt->bindValue($identifier, $this->senha, PDO::PARAM_STR);
						break;
					case '`TOKEN_SENHA`':						
						$stmt->bindValue($identifier, $this->token_senha, PDO::PARAM_STR);
						break;
					case '`TOKEN_FIREBASE`':						
						$stmt->bindValue($identifier, $this->token_firebase, PDO::PARAM_STR);
						break;
					case '`DATA_RESCISAO`':						
						$stmt->bindValue($identifier, $this->data_rescisao, PDO::PARAM_STR);
						break;
					case '`ATIVO`':
						$stmt->bindValue($identifier, (int) $this->ativo, PDO::PARAM_INT);
						break;
					case '`TIPO_ACESSO`':						
						$stmt->bindValue($identifier, $this->tipo_acesso, PDO::PARAM_STR);
						break;
					case '`ESTADO_CIVIL`':						
						$stmt->bindValue($identifier, $this->estado_civil, PDO::PARAM_STR);
						break;
					case '`NIVEL_ACESSO`':						
						$stmt->bindValue($identifier, $this->nivel_acesso, PDO::PARAM_STR);
						break;
					case '`USUARIO_VALIDADO`':
						$stmt->bindValue($identifier, (int) $this->usuario_validado, PDO::PARAM_INT);
						break;
					case '`SEXO`':						
						$stmt->bindValue($identifier, $this->sexo, PDO::PARAM_STR);
						break;
					case '`DATA_CADASTRO`':						
						$stmt->bindValue($identifier, $this->data_cadastro, PDO::PARAM_STR);
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
		$pos = UsuarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getPerfilId();
				break;
			case 2:
				return $this->getEnderecoId();
				break;
			case 3:
				return $this->getCargoId();
				break;
			case 4:
				return $this->getDepartamentoId();
				break;
			case 5:
				return $this->getMatricula();
				break;
			case 6:
				return $this->getNome();
				break;
			case 7:
				return $this->getEmail();
				break;
			case 8:
				return $this->getDni();
				break;
			case 9:
				return $this->getDataNascimento();
				break;
			case 10:
				return $this->getDataContratacao();
				break;
			case 11:
				return $this->getCelular();
				break;
			case 12:
				return $this->getTelefone();
				break;
			case 13:
				return $this->getToken();
				break;
			case 14:
				return $this->getNomeUsuario();
				break;
			case 15:
				return $this->getSenha();
				break;
			case 16:
				return $this->getTokenSenha();
				break;
			case 17:
				return $this->getTokenFirebase();
				break;
			case 18:
				return $this->getDataRescisao();
				break;
			case 19:
				return $this->getAtivo();
				break;
			case 20:
				return $this->getTipoAcesso();
				break;
			case 21:
				return $this->getEstadoCivil();
				break;
			case 22:
				return $this->getNivelAcesso();
				break;
			case 23:
				return $this->getUsuarioValidado();
				break;
			case 24:
				return $this->getSexo();
				break;
			case 25:
				return $this->getDataCadastro();
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
		if (isset($alreadyDumpedObjects['Usuario'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Usuario'][$this->getPrimaryKey()] = true;
		$keys = UsuarioPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPerfilId(),
			$keys[2] => $this->getEnderecoId(),
			$keys[3] => $this->getCargoId(),
			$keys[4] => $this->getDepartamentoId(),
			$keys[5] => $this->getMatricula(),
			$keys[6] => $this->getNome(),
			$keys[7] => $this->getEmail(),
			$keys[8] => $this->getDni(),
			$keys[9] => $this->getDataNascimento(),
			$keys[10] => $this->getDataContratacao(),
			$keys[11] => $this->getCelular(),
			$keys[12] => $this->getTelefone(),
			$keys[13] => $this->getToken(),
			$keys[14] => $this->getNomeUsuario(),
			$keys[15] => $this->getSenha(),
			$keys[16] => $this->getTokenSenha(),
			$keys[17] => $this->getTokenFirebase(),
			$keys[18] => $this->getDataRescisao(),
			$keys[19] => $this->getAtivo(),
			$keys[20] => $this->getTipoAcesso(),
			$keys[21] => $this->getEstadoCivil(),
			$keys[22] => $this->getNivelAcesso(),
			$keys[23] => $this->getUsuarioValidado(),
			$keys[24] => $this->getSexo(),
			$keys[25] => $this->getDataCadastro(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aPerfil) {
				$result['Perfil'] = $this->aPerfil->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aCargo) {
				$result['Cargo'] = $this->aCargo->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aDepartamento) {
				$result['Departamento'] = $this->aDepartamento->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aEndereco) {
				$result['Endereco'] = $this->aEndereco->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collAuditorias) {
				$result['Auditorias'] = $this->collAuditorias->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collAvaliacaoRespostaForums) {
				$result['AvaliacaoRespostaForums'] = $this->collAvaliacaoRespostaForums->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collColetaPesquisas) {
				$result['ColetaPesquisas'] = $this->collColetaPesquisas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collComentarioNoticias) {
				$result['ComentarioNoticias'] = $this->collComentarioNoticias->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collCurtidaForums) {
				$result['CurtidaForums'] = $this->collCurtidaForums->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collNoticias) {
				$result['Noticias'] = $this->collNoticias->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collPesquisas) {
				$result['Pesquisas'] = $this->collPesquisas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collPesquisaHabilitadas) {
				$result['PesquisaHabilitadas'] = $this->collPesquisaHabilitadas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collPremios) {
				$result['Premios'] = $this->collPremios->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collRespostaForums) {
				$result['RespostaForums'] = $this->collRespostaForums->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collSolicitacaoResgatesRelatedByAprovadorId) {
				$result['SolicitacaoResgatesRelatedByAprovadorId'] = $this->collSolicitacaoResgatesRelatedByAprovadorId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collSolicitacaoResgatesRelatedBySolicitanteId) {
				$result['SolicitacaoResgatesRelatedBySolicitanteId'] = $this->collSolicitacaoResgatesRelatedBySolicitanteId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = UsuarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setPerfilId($value);
				break;
			case 2:
				$this->setEnderecoId($value);
				break;
			case 3:
				$this->setCargoId($value);
				break;
			case 4:
				$this->setDepartamentoId($value);
				break;
			case 5:
				$this->setMatricula($value);
				break;
			case 6:
				$this->setNome($value);
				break;
			case 7:
				$this->setEmail($value);
				break;
			case 8:
				$this->setDni($value);
				break;
			case 9:
				$this->setDataNascimento($value);
				break;
			case 10:
				$this->setDataContratacao($value);
				break;
			case 11:
				$this->setCelular($value);
				break;
			case 12:
				$this->setTelefone($value);
				break;
			case 13:
				$this->setToken($value);
				break;
			case 14:
				$this->setNomeUsuario($value);
				break;
			case 15:
				$this->setSenha($value);
				break;
			case 16:
				$this->setTokenSenha($value);
				break;
			case 17:
				$this->setTokenFirebase($value);
				break;
			case 18:
				$this->setDataRescisao($value);
				break;
			case 19:
				$this->setAtivo($value);
				break;
			case 20:
				$this->setTipoAcesso($value);
				break;
			case 21:
				$this->setEstadoCivil($value);
				break;
			case 22:
				$this->setNivelAcesso($value);
				break;
			case 23:
				$this->setUsuarioValidado($value);
				break;
			case 24:
				$this->setSexo($value);
				break;
			case 25:
				$this->setDataCadastro($value);
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
		$keys = UsuarioPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPerfilId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEnderecoId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCargoId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDepartamentoId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setMatricula($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setNome($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEmail($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDni($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDataNascimento($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDataContratacao($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCelular($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setTelefone($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setToken($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setNomeUsuario($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setSenha($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setTokenSenha($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setTokenFirebase($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setDataRescisao($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setAtivo($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setTipoAcesso($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setEstadoCivil($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setNivelAcesso($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setUsuarioValidado($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setSexo($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setDataCadastro($arr[$keys[25]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);

		if ($this->isColumnModified(UsuarioPeer::ID)) $criteria->add(UsuarioPeer::ID, $this->id);
		if ($this->isColumnModified(UsuarioPeer::PERFIL_ID)) $criteria->add(UsuarioPeer::PERFIL_ID, $this->perfil_id);
		if ($this->isColumnModified(UsuarioPeer::ENDERECO_ID)) $criteria->add(UsuarioPeer::ENDERECO_ID, $this->endereco_id);
		if ($this->isColumnModified(UsuarioPeer::CARGO_ID)) $criteria->add(UsuarioPeer::CARGO_ID, $this->cargo_id);
		if ($this->isColumnModified(UsuarioPeer::DEPARTAMENTO_ID)) $criteria->add(UsuarioPeer::DEPARTAMENTO_ID, $this->departamento_id);
		if ($this->isColumnModified(UsuarioPeer::MATRICULA)) $criteria->add(UsuarioPeer::MATRICULA, $this->matricula);
		if ($this->isColumnModified(UsuarioPeer::NOME)) $criteria->add(UsuarioPeer::NOME, $this->nome);
		if ($this->isColumnModified(UsuarioPeer::EMAIL)) $criteria->add(UsuarioPeer::EMAIL, $this->email);
		if ($this->isColumnModified(UsuarioPeer::DNI)) $criteria->add(UsuarioPeer::DNI, $this->dni);
		if ($this->isColumnModified(UsuarioPeer::DATA_NASCIMENTO)) $criteria->add(UsuarioPeer::DATA_NASCIMENTO, $this->data_nascimento);
		if ($this->isColumnModified(UsuarioPeer::DATA_CONTRATACAO)) $criteria->add(UsuarioPeer::DATA_CONTRATACAO, $this->data_contratacao);
		if ($this->isColumnModified(UsuarioPeer::CELULAR)) $criteria->add(UsuarioPeer::CELULAR, $this->celular);
		if ($this->isColumnModified(UsuarioPeer::TELEFONE)) $criteria->add(UsuarioPeer::TELEFONE, $this->telefone);
		if ($this->isColumnModified(UsuarioPeer::TOKEN)) $criteria->add(UsuarioPeer::TOKEN, $this->token);
		if ($this->isColumnModified(UsuarioPeer::NOME_USUARIO)) $criteria->add(UsuarioPeer::NOME_USUARIO, $this->nome_usuario);
		if ($this->isColumnModified(UsuarioPeer::SENHA)) $criteria->add(UsuarioPeer::SENHA, $this->senha);
		if ($this->isColumnModified(UsuarioPeer::TOKEN_SENHA)) $criteria->add(UsuarioPeer::TOKEN_SENHA, $this->token_senha);
		if ($this->isColumnModified(UsuarioPeer::TOKEN_FIREBASE)) $criteria->add(UsuarioPeer::TOKEN_FIREBASE, $this->token_firebase);
		if ($this->isColumnModified(UsuarioPeer::DATA_RESCISAO)) $criteria->add(UsuarioPeer::DATA_RESCISAO, $this->data_rescisao);
		if ($this->isColumnModified(UsuarioPeer::ATIVO)) $criteria->add(UsuarioPeer::ATIVO, $this->ativo);
		if ($this->isColumnModified(UsuarioPeer::TIPO_ACESSO)) $criteria->add(UsuarioPeer::TIPO_ACESSO, $this->tipo_acesso);
		if ($this->isColumnModified(UsuarioPeer::ESTADO_CIVIL)) $criteria->add(UsuarioPeer::ESTADO_CIVIL, $this->estado_civil);
		if ($this->isColumnModified(UsuarioPeer::NIVEL_ACESSO)) $criteria->add(UsuarioPeer::NIVEL_ACESSO, $this->nivel_acesso);
		if ($this->isColumnModified(UsuarioPeer::USUARIO_VALIDADO)) $criteria->add(UsuarioPeer::USUARIO_VALIDADO, $this->usuario_validado);
		if ($this->isColumnModified(UsuarioPeer::SEXO)) $criteria->add(UsuarioPeer::SEXO, $this->sexo);
		if ($this->isColumnModified(UsuarioPeer::DATA_CADASTRO)) $criteria->add(UsuarioPeer::DATA_CADASTRO, $this->data_cadastro);

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
		$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		$criteria->add(UsuarioPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Usuario (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setPerfilId($this->getPerfilId());
		$copyObj->setEnderecoId($this->getEnderecoId());
		$copyObj->setCargoId($this->getCargoId());
		$copyObj->setDepartamentoId($this->getDepartamentoId());
		$copyObj->setMatricula($this->getMatricula());
		$copyObj->setNome($this->getNome());
		$copyObj->setEmail($this->getEmail());
		$copyObj->setDni($this->getDni());
		$copyObj->setDataNascimento($this->getDataNascimento());
		$copyObj->setDataContratacao($this->getDataContratacao());
		$copyObj->setCelular($this->getCelular());
		$copyObj->setTelefone($this->getTelefone());
		$copyObj->setToken($this->getToken());
		$copyObj->setNomeUsuario($this->getNomeUsuario());
		$copyObj->setSenha($this->getSenha());
		$copyObj->setTokenSenha($this->getTokenSenha());
		$copyObj->setTokenFirebase($this->getTokenFirebase());
		$copyObj->setDataRescisao($this->getDataRescisao());
		$copyObj->setAtivo($this->getAtivo());
		$copyObj->setTipoAcesso($this->getTipoAcesso());
		$copyObj->setEstadoCivil($this->getEstadoCivil());
		$copyObj->setNivelAcesso($this->getNivelAcesso());
		$copyObj->setUsuarioValidado($this->getUsuarioValidado());
		$copyObj->setSexo($this->getSexo());
		$copyObj->setDataCadastro($this->getDataCadastro());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getAuditorias() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAuditoria($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAvaliacaoRespostaForums() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAvaliacaoRespostaForum($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getColetaPesquisas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addColetaPesquisa($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getComentarioNoticias() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addComentarioNoticia($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCurtidaForums() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCurtidaForum($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getNoticias() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addNoticia($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getPesquisas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPesquisa($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getPesquisaHabilitadas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPesquisaHabilitada($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getPremios() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPremio($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRespostaForums() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addRespostaForum($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSolicitacaoResgatesRelatedByAprovadorId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSolicitacaoResgateRelatedByAprovadorId($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSolicitacaoResgatesRelatedBySolicitanteId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSolicitacaoResgateRelatedBySolicitanteId($relObj->copy($deepCopy));
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
	 * @return     Usuario Clone of current object.
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
	 * @return     UsuarioPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new UsuarioPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Perfil object.
	 *
	 * @param      Perfil $v
	 * @return     Usuario The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPerfil(Perfil $v = null)
	{
		if ($v === null) {
			$this->setPerfilId(NULL);
		} else {
			$this->setPerfilId($v->getId());
		}

		$this->aPerfil = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Perfil object, it will not be re-added.
		if ($v !== null) {
			$v->addUsuario($this);
		}

		return $this;
	}


	/**
	 * Get the associated Perfil object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Perfil The associated Perfil object.
	 * @throws     PropelException
	 */
	public function getPerfil(PropelPDO $con = null)
	{
		if ($this->aPerfil === null && ($this->perfil_id !== null)) {
			$this->aPerfil = PerfilQuery::create()->findPk($this->perfil_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aPerfil->addUsuarios($this);
			 */
		}
		return $this->aPerfil;
	}

	/**
	 * Declares an association between this object and a Cargo object.
	 *
	 * @param      Cargo $v
	 * @return     Usuario The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCargo(Cargo $v = null)
	{
		if ($v === null) {
			$this->setCargoId(NULL);
		} else {
			$this->setCargoId($v->getId());
		}

		$this->aCargo = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Cargo object, it will not be re-added.
		if ($v !== null) {
			$v->addUsuario($this);
		}

		return $this;
	}


	/**
	 * Get the associated Cargo object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Cargo The associated Cargo object.
	 * @throws     PropelException
	 */
	public function getCargo(PropelPDO $con = null)
	{
		if ($this->aCargo === null && ($this->cargo_id !== null)) {
			$this->aCargo = CargoQuery::create()->findPk($this->cargo_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aCargo->addUsuarios($this);
			 */
		}
		return $this->aCargo;
	}

	/**
	 * Declares an association between this object and a Departamento object.
	 *
	 * @param      Departamento $v
	 * @return     Usuario The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setDepartamento(Departamento $v = null)
	{
		if ($v === null) {
			$this->setDepartamentoId(NULL);
		} else {
			$this->setDepartamentoId($v->getId());
		}

		$this->aDepartamento = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Departamento object, it will not be re-added.
		if ($v !== null) {
			$v->addUsuario($this);
		}

		return $this;
	}


	/**
	 * Get the associated Departamento object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Departamento The associated Departamento object.
	 * @throws     PropelException
	 */
	public function getDepartamento(PropelPDO $con = null)
	{
		if ($this->aDepartamento === null && ($this->departamento_id !== null)) {
			$this->aDepartamento = DepartamentoQuery::create()->findPk($this->departamento_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aDepartamento->addUsuarios($this);
			 */
		}
		return $this->aDepartamento;
	}

	/**
	 * Declares an association between this object and a Endereco object.
	 *
	 * @param      Endereco $v
	 * @return     Usuario The current object (for fluent API support)
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
			$v->addUsuario($this);
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
				$this->aEndereco->addUsuarios($this);
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
		if ('Auditoria' == $relationName) {
			return $this->initAuditorias();
		}
		if ('AvaliacaoRespostaForum' == $relationName) {
			return $this->initAvaliacaoRespostaForums();
		}
		if ('ColetaPesquisa' == $relationName) {
			return $this->initColetaPesquisas();
		}
		if ('ComentarioNoticia' == $relationName) {
			return $this->initComentarioNoticias();
		}
		if ('CurtidaForum' == $relationName) {
			return $this->initCurtidaForums();
		}
		if ('Noticia' == $relationName) {
			return $this->initNoticias();
		}
		if ('Pesquisa' == $relationName) {
			return $this->initPesquisas();
		}
		if ('PesquisaHabilitada' == $relationName) {
			return $this->initPesquisaHabilitadas();
		}
		if ('Premio' == $relationName) {
			return $this->initPremios();
		}
		if ('RespostaForum' == $relationName) {
			return $this->initRespostaForums();
		}
		if ('SolicitacaoResgateRelatedByAprovadorId' == $relationName) {
			return $this->initSolicitacaoResgatesRelatedByAprovadorId();
		}
		if ('SolicitacaoResgateRelatedBySolicitanteId' == $relationName) {
			return $this->initSolicitacaoResgatesRelatedBySolicitanteId();
		}
	}

	/**
	 * Clears out the collAuditorias collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAuditorias()
	 */
	public function clearAuditorias()
	{
		$this->collAuditorias = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAuditorias collection.
	 *
	 * By default this just sets the collAuditorias collection to an empty array (like clearcollAuditorias());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initAuditorias($overrideExisting = true)
	{
		if (null !== $this->collAuditorias && !$overrideExisting) {
			return;
		}
		$this->collAuditorias = new PropelObjectCollection();
		$this->collAuditorias->setModel('Auditoria');
	}

	/**
	 * Gets an array of Auditoria objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Usuario is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Auditoria[] List of Auditoria objects
	 * @throws     PropelException
	 */
	public function getAuditorias($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAuditorias || null !== $criteria) {
			if ($this->isNew() && null === $this->collAuditorias) {
				// return empty collection
				$this->initAuditorias();
			} else {
				$collAuditorias = AuditoriaQuery::create(null, $criteria)
					->filterByUsuario($this)
					->find($con);
				if (null !== $criteria) {
					return $collAuditorias;
				}
				$this->collAuditorias = $collAuditorias;
			}
		}
		return $this->collAuditorias;
	}

	/**
	 * Sets a collection of Auditoria objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $auditorias A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setAuditorias(PropelCollection $auditorias, PropelPDO $con = null)
	{
		$this->auditoriasScheduledForDeletion = $this->getAuditorias(new Criteria(), $con)->diff($auditorias);

		foreach ($auditorias as $auditoria) {
			// Fix issue with collection modified by reference
			if ($auditoria->isNew()) {
				$auditoria->setUsuario($this);
			}
			$this->addAuditoria($auditoria);
		}

		$this->collAuditorias = $auditorias;
	}

	/**
	 * Returns the number of related Auditoria objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Auditoria objects.
	 * @throws     PropelException
	 */
	public function countAuditorias(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAuditorias || null !== $criteria) {
			if ($this->isNew() && null === $this->collAuditorias) {
				return 0;
			} else {
				$query = AuditoriaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUsuario($this)
					->count($con);
			}
		} else {
			return count($this->collAuditorias);
		}
	}

	/**
	 * Method called to associate a Auditoria object to this object
	 * through the Auditoria foreign key attribute.
	 *
	 * @param      Auditoria $l Auditoria
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function addAuditoria(Auditoria $l)
	{
		if ($this->collAuditorias === null) {
			$this->initAuditorias();
		}
		if (!$this->collAuditorias->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddAuditoria($l);
		}

		return $this;
	}

	/**
	 * @param	Auditoria $auditoria The auditoria object to add.
	 */
	protected function doAddAuditoria($auditoria)
	{
		$this->collAuditorias[]= $auditoria;
		$auditoria->setUsuario($this);
	}

	/**
	 * Clears out the collAvaliacaoRespostaForums collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAvaliacaoRespostaForums()
	 */
	public function clearAvaliacaoRespostaForums()
	{
		$this->collAvaliacaoRespostaForums = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAvaliacaoRespostaForums collection.
	 *
	 * By default this just sets the collAvaliacaoRespostaForums collection to an empty array (like clearcollAvaliacaoRespostaForums());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initAvaliacaoRespostaForums($overrideExisting = true)
	{
		if (null !== $this->collAvaliacaoRespostaForums && !$overrideExisting) {
			return;
		}
		$this->collAvaliacaoRespostaForums = new PropelObjectCollection();
		$this->collAvaliacaoRespostaForums->setModel('AvaliacaoRespostaForum');
	}

	/**
	 * Gets an array of AvaliacaoRespostaForum objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Usuario is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AvaliacaoRespostaForum[] List of AvaliacaoRespostaForum objects
	 * @throws     PropelException
	 */
	public function getAvaliacaoRespostaForums($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAvaliacaoRespostaForums || null !== $criteria) {
			if ($this->isNew() && null === $this->collAvaliacaoRespostaForums) {
				// return empty collection
				$this->initAvaliacaoRespostaForums();
			} else {
				$collAvaliacaoRespostaForums = AvaliacaoRespostaForumQuery::create(null, $criteria)
					->filterByUsuario($this)
					->find($con);
				if (null !== $criteria) {
					return $collAvaliacaoRespostaForums;
				}
				$this->collAvaliacaoRespostaForums = $collAvaliacaoRespostaForums;
			}
		}
		return $this->collAvaliacaoRespostaForums;
	}

	/**
	 * Sets a collection of AvaliacaoRespostaForum objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $avaliacaoRespostaForums A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setAvaliacaoRespostaForums(PropelCollection $avaliacaoRespostaForums, PropelPDO $con = null)
	{
		$this->avaliacaoRespostaForumsScheduledForDeletion = $this->getAvaliacaoRespostaForums(new Criteria(), $con)->diff($avaliacaoRespostaForums);

		foreach ($avaliacaoRespostaForums as $avaliacaoRespostaForum) {
			// Fix issue with collection modified by reference
			if ($avaliacaoRespostaForum->isNew()) {
				$avaliacaoRespostaForum->setUsuario($this);
			}
			$this->addAvaliacaoRespostaForum($avaliacaoRespostaForum);
		}

		$this->collAvaliacaoRespostaForums = $avaliacaoRespostaForums;
	}

	/**
	 * Returns the number of related AvaliacaoRespostaForum objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AvaliacaoRespostaForum objects.
	 * @throws     PropelException
	 */
	public function countAvaliacaoRespostaForums(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAvaliacaoRespostaForums || null !== $criteria) {
			if ($this->isNew() && null === $this->collAvaliacaoRespostaForums) {
				return 0;
			} else {
				$query = AvaliacaoRespostaForumQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUsuario($this)
					->count($con);
			}
		} else {
			return count($this->collAvaliacaoRespostaForums);
		}
	}

	/**
	 * Method called to associate a AvaliacaoRespostaForum object to this object
	 * through the AvaliacaoRespostaForum foreign key attribute.
	 *
	 * @param      AvaliacaoRespostaForum $l AvaliacaoRespostaForum
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function addAvaliacaoRespostaForum(AvaliacaoRespostaForum $l)
	{
		if ($this->collAvaliacaoRespostaForums === null) {
			$this->initAvaliacaoRespostaForums();
		}
		if (!$this->collAvaliacaoRespostaForums->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddAvaliacaoRespostaForum($l);
		}

		return $this;
	}

	/**
	 * @param	AvaliacaoRespostaForum $avaliacaoRespostaForum The avaliacaoRespostaForum object to add.
	 */
	protected function doAddAvaliacaoRespostaForum($avaliacaoRespostaForum)
	{
		$this->collAvaliacaoRespostaForums[]= $avaliacaoRespostaForum;
		$avaliacaoRespostaForum->setUsuario($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related AvaliacaoRespostaForums from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array AvaliacaoRespostaForum[] List of AvaliacaoRespostaForum objects
	 */
	public function getAvaliacaoRespostaForumsJoinRespostaForum($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AvaliacaoRespostaForumQuery::create(null, $criteria);
		$query->joinWith('RespostaForum', $join_behavior);

		return $this->getAvaliacaoRespostaForums($query, $con);
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
	 * If this Usuario is new, it will return
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
					->filterByUsuario($this)
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
				$coletaPesquisa->setUsuario($this);
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
					->filterByUsuario($this)
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
	 * @return     Usuario The current object (for fluent API support)
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
		$coletaPesquisa->setUsuario($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related ColetaPesquisas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ColetaPesquisa[] List of ColetaPesquisa objects
	 */
	public function getColetaPesquisasJoinPesquisa($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ColetaPesquisaQuery::create(null, $criteria);
		$query->joinWith('Pesquisa', $join_behavior);

		return $this->getColetaPesquisas($query, $con);
	}

	/**
	 * Clears out the collComentarioNoticias collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addComentarioNoticias()
	 */
	public function clearComentarioNoticias()
	{
		$this->collComentarioNoticias = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collComentarioNoticias collection.
	 *
	 * By default this just sets the collComentarioNoticias collection to an empty array (like clearcollComentarioNoticias());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initComentarioNoticias($overrideExisting = true)
	{
		if (null !== $this->collComentarioNoticias && !$overrideExisting) {
			return;
		}
		$this->collComentarioNoticias = new PropelObjectCollection();
		$this->collComentarioNoticias->setModel('ComentarioNoticia');
	}

	/**
	 * Gets an array of ComentarioNoticia objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Usuario is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array ComentarioNoticia[] List of ComentarioNoticia objects
	 * @throws     PropelException
	 */
	public function getComentarioNoticias($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collComentarioNoticias || null !== $criteria) {
			if ($this->isNew() && null === $this->collComentarioNoticias) {
				// return empty collection
				$this->initComentarioNoticias();
			} else {
				$collComentarioNoticias = ComentarioNoticiaQuery::create(null, $criteria)
					->filterByUsuario($this)
					->find($con);
				if (null !== $criteria) {
					return $collComentarioNoticias;
				}
				$this->collComentarioNoticias = $collComentarioNoticias;
			}
		}
		return $this->collComentarioNoticias;
	}

	/**
	 * Sets a collection of ComentarioNoticia objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $comentarioNoticias A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setComentarioNoticias(PropelCollection $comentarioNoticias, PropelPDO $con = null)
	{
		$this->comentarioNoticiasScheduledForDeletion = $this->getComentarioNoticias(new Criteria(), $con)->diff($comentarioNoticias);

		foreach ($comentarioNoticias as $comentarioNoticia) {
			// Fix issue with collection modified by reference
			if ($comentarioNoticia->isNew()) {
				$comentarioNoticia->setUsuario($this);
			}
			$this->addComentarioNoticia($comentarioNoticia);
		}

		$this->collComentarioNoticias = $comentarioNoticias;
	}

	/**
	 * Returns the number of related ComentarioNoticia objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related ComentarioNoticia objects.
	 * @throws     PropelException
	 */
	public function countComentarioNoticias(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collComentarioNoticias || null !== $criteria) {
			if ($this->isNew() && null === $this->collComentarioNoticias) {
				return 0;
			} else {
				$query = ComentarioNoticiaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUsuario($this)
					->count($con);
			}
		} else {
			return count($this->collComentarioNoticias);
		}
	}

	/**
	 * Method called to associate a ComentarioNoticia object to this object
	 * through the ComentarioNoticia foreign key attribute.
	 *
	 * @param      ComentarioNoticia $l ComentarioNoticia
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function addComentarioNoticia(ComentarioNoticia $l)
	{
		if ($this->collComentarioNoticias === null) {
			$this->initComentarioNoticias();
		}
		if (!$this->collComentarioNoticias->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddComentarioNoticia($l);
		}

		return $this;
	}

	/**
	 * @param	ComentarioNoticia $comentarioNoticia The comentarioNoticia object to add.
	 */
	protected function doAddComentarioNoticia($comentarioNoticia)
	{
		$this->collComentarioNoticias[]= $comentarioNoticia;
		$comentarioNoticia->setUsuario($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related ComentarioNoticias from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array ComentarioNoticia[] List of ComentarioNoticia objects
	 */
	public function getComentarioNoticiasJoinNoticia($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ComentarioNoticiaQuery::create(null, $criteria);
		$query->joinWith('Noticia', $join_behavior);

		return $this->getComentarioNoticias($query, $con);
	}

	/**
	 * Clears out the collCurtidaForums collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCurtidaForums()
	 */
	public function clearCurtidaForums()
	{
		$this->collCurtidaForums = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCurtidaForums collection.
	 *
	 * By default this just sets the collCurtidaForums collection to an empty array (like clearcollCurtidaForums());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initCurtidaForums($overrideExisting = true)
	{
		if (null !== $this->collCurtidaForums && !$overrideExisting) {
			return;
		}
		$this->collCurtidaForums = new PropelObjectCollection();
		$this->collCurtidaForums->setModel('CurtidaForum');
	}

	/**
	 * Gets an array of CurtidaForum objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Usuario is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array CurtidaForum[] List of CurtidaForum objects
	 * @throws     PropelException
	 */
	public function getCurtidaForums($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCurtidaForums || null !== $criteria) {
			if ($this->isNew() && null === $this->collCurtidaForums) {
				// return empty collection
				$this->initCurtidaForums();
			} else {
				$collCurtidaForums = CurtidaForumQuery::create(null, $criteria)
					->filterByUsuario($this)
					->find($con);
				if (null !== $criteria) {
					return $collCurtidaForums;
				}
				$this->collCurtidaForums = $collCurtidaForums;
			}
		}
		return $this->collCurtidaForums;
	}

	/**
	 * Sets a collection of CurtidaForum objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $curtidaForums A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setCurtidaForums(PropelCollection $curtidaForums, PropelPDO $con = null)
	{
		$this->curtidaForumsScheduledForDeletion = $this->getCurtidaForums(new Criteria(), $con)->diff($curtidaForums);

		foreach ($curtidaForums as $curtidaForum) {
			// Fix issue with collection modified by reference
			if ($curtidaForum->isNew()) {
				$curtidaForum->setUsuario($this);
			}
			$this->addCurtidaForum($curtidaForum);
		}

		$this->collCurtidaForums = $curtidaForums;
	}

	/**
	 * Returns the number of related CurtidaForum objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CurtidaForum objects.
	 * @throws     PropelException
	 */
	public function countCurtidaForums(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCurtidaForums || null !== $criteria) {
			if ($this->isNew() && null === $this->collCurtidaForums) {
				return 0;
			} else {
				$query = CurtidaForumQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUsuario($this)
					->count($con);
			}
		} else {
			return count($this->collCurtidaForums);
		}
	}

	/**
	 * Method called to associate a CurtidaForum object to this object
	 * through the CurtidaForum foreign key attribute.
	 *
	 * @param      CurtidaForum $l CurtidaForum
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function addCurtidaForum(CurtidaForum $l)
	{
		if ($this->collCurtidaForums === null) {
			$this->initCurtidaForums();
		}
		if (!$this->collCurtidaForums->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddCurtidaForum($l);
		}

		return $this;
	}

	/**
	 * @param	CurtidaForum $curtidaForum The curtidaForum object to add.
	 */
	protected function doAddCurtidaForum($curtidaForum)
	{
		$this->collCurtidaForums[]= $curtidaForum;
		$curtidaForum->setUsuario($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related CurtidaForums from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array CurtidaForum[] List of CurtidaForum objects
	 */
	public function getCurtidaForumsJoinForum($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CurtidaForumQuery::create(null, $criteria);
		$query->joinWith('Forum', $join_behavior);

		return $this->getCurtidaForums($query, $con);
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
	 * By default this just sets the collNoticias collection to an empty array (like clearcollNoticias());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initNoticias($overrideExisting = true)
	{
		if (null !== $this->collNoticias && !$overrideExisting) {
			return;
		}
		$this->collNoticias = new PropelObjectCollection();
		$this->collNoticias->setModel('Noticia');
	}

	/**
	 * Gets an array of Noticia objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Usuario is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Noticia[] List of Noticia objects
	 * @throws     PropelException
	 */
	public function getNoticias($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNoticias || null !== $criteria) {
			if ($this->isNew() && null === $this->collNoticias) {
				// return empty collection
				$this->initNoticias();
			} else {
				$collNoticias = NoticiaQuery::create(null, $criteria)
					->filterByUsuario($this)
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
	 * Sets a collection of Noticia objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $noticias A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setNoticias(PropelCollection $noticias, PropelPDO $con = null)
	{
		$this->noticiasScheduledForDeletion = $this->getNoticias(new Criteria(), $con)->diff($noticias);

		foreach ($noticias as $noticia) {
			// Fix issue with collection modified by reference
			if ($noticia->isNew()) {
				$noticia->setUsuario($this);
			}
			$this->addNoticia($noticia);
		}

		$this->collNoticias = $noticias;
	}

	/**
	 * Returns the number of related Noticia objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Noticia objects.
	 * @throws     PropelException
	 */
	public function countNoticias(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
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
					->filterByUsuario($this)
					->count($con);
			}
		} else {
			return count($this->collNoticias);
		}
	}

	/**
	 * Method called to associate a Noticia object to this object
	 * through the Noticia foreign key attribute.
	 *
	 * @param      Noticia $l Noticia
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function addNoticia(Noticia $l)
	{
		if ($this->collNoticias === null) {
			$this->initNoticias();
		}
		if (!$this->collNoticias->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddNoticia($l);
		}

		return $this;
	}

	/**
	 * @param	Noticia $noticia The noticia object to add.
	 */
	protected function doAddNoticia($noticia)
	{
		$this->collNoticias[]= $noticia;
		$noticia->setUsuario($this);
	}

	/**
	 * Clears out the collPesquisas collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPesquisas()
	 */
	public function clearPesquisas()
	{
		$this->collPesquisas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPesquisas collection.
	 *
	 * By default this just sets the collPesquisas collection to an empty array (like clearcollPesquisas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initPesquisas($overrideExisting = true)
	{
		if (null !== $this->collPesquisas && !$overrideExisting) {
			return;
		}
		$this->collPesquisas = new PropelObjectCollection();
		$this->collPesquisas->setModel('Pesquisa');
	}

	/**
	 * Gets an array of Pesquisa objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Usuario is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Pesquisa[] List of Pesquisa objects
	 * @throws     PropelException
	 */
	public function getPesquisas($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPesquisas || null !== $criteria) {
			if ($this->isNew() && null === $this->collPesquisas) {
				// return empty collection
				$this->initPesquisas();
			} else {
				$collPesquisas = PesquisaQuery::create(null, $criteria)
					->filterByUsuario($this)
					->find($con);
				if (null !== $criteria) {
					return $collPesquisas;
				}
				$this->collPesquisas = $collPesquisas;
			}
		}
		return $this->collPesquisas;
	}

	/**
	 * Sets a collection of Pesquisa objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $pesquisas A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setPesquisas(PropelCollection $pesquisas, PropelPDO $con = null)
	{
		$this->pesquisasScheduledForDeletion = $this->getPesquisas(new Criteria(), $con)->diff($pesquisas);

		foreach ($pesquisas as $pesquisa) {
			// Fix issue with collection modified by reference
			if ($pesquisa->isNew()) {
				$pesquisa->setUsuario($this);
			}
			$this->addPesquisa($pesquisa);
		}

		$this->collPesquisas = $pesquisas;
	}

	/**
	 * Returns the number of related Pesquisa objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Pesquisa objects.
	 * @throws     PropelException
	 */
	public function countPesquisas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPesquisas || null !== $criteria) {
			if ($this->isNew() && null === $this->collPesquisas) {
				return 0;
			} else {
				$query = PesquisaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUsuario($this)
					->count($con);
			}
		} else {
			return count($this->collPesquisas);
		}
	}

	/**
	 * Method called to associate a Pesquisa object to this object
	 * through the Pesquisa foreign key attribute.
	 *
	 * @param      Pesquisa $l Pesquisa
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function addPesquisa(Pesquisa $l)
	{
		if ($this->collPesquisas === null) {
			$this->initPesquisas();
		}
		if (!$this->collPesquisas->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddPesquisa($l);
		}

		return $this;
	}

	/**
	 * @param	Pesquisa $pesquisa The pesquisa object to add.
	 */
	protected function doAddPesquisa($pesquisa)
	{
		$this->collPesquisas[]= $pesquisa;
		$pesquisa->setUsuario($this);
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
	 * If this Usuario is new, it will return
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
					->filterByUsuario($this)
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
				$pesquisaHabilitada->setUsuario($this);
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
					->filterByUsuario($this)
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
	 * @return     Usuario The current object (for fluent API support)
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
		$pesquisaHabilitada->setUsuario($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related PesquisaHabilitadas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array PesquisaHabilitada[] List of PesquisaHabilitada objects
	 */
	public function getPesquisaHabilitadasJoinPesquisa($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = PesquisaHabilitadaQuery::create(null, $criteria);
		$query->joinWith('Pesquisa', $join_behavior);

		return $this->getPesquisaHabilitadas($query, $con);
	}

	/**
	 * Clears out the collPremios collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPremios()
	 */
	public function clearPremios()
	{
		$this->collPremios = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPremios collection.
	 *
	 * By default this just sets the collPremios collection to an empty array (like clearcollPremios());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initPremios($overrideExisting = true)
	{
		if (null !== $this->collPremios && !$overrideExisting) {
			return;
		}
		$this->collPremios = new PropelObjectCollection();
		$this->collPremios->setModel('Premio');
	}

	/**
	 * Gets an array of Premio objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Usuario is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Premio[] List of Premio objects
	 * @throws     PropelException
	 */
	public function getPremios($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPremios || null !== $criteria) {
			if ($this->isNew() && null === $this->collPremios) {
				// return empty collection
				$this->initPremios();
			} else {
				$collPremios = PremioQuery::create(null, $criteria)
					->filterByUsuario($this)
					->find($con);
				if (null !== $criteria) {
					return $collPremios;
				}
				$this->collPremios = $collPremios;
			}
		}
		return $this->collPremios;
	}

	/**
	 * Sets a collection of Premio objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $premios A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setPremios(PropelCollection $premios, PropelPDO $con = null)
	{
		$this->premiosScheduledForDeletion = $this->getPremios(new Criteria(), $con)->diff($premios);

		foreach ($premios as $premio) {
			// Fix issue with collection modified by reference
			if ($premio->isNew()) {
				$premio->setUsuario($this);
			}
			$this->addPremio($premio);
		}

		$this->collPremios = $premios;
	}

	/**
	 * Returns the number of related Premio objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Premio objects.
	 * @throws     PropelException
	 */
	public function countPremios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPremios || null !== $criteria) {
			if ($this->isNew() && null === $this->collPremios) {
				return 0;
			} else {
				$query = PremioQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUsuario($this)
					->count($con);
			}
		} else {
			return count($this->collPremios);
		}
	}

	/**
	 * Method called to associate a Premio object to this object
	 * through the Premio foreign key attribute.
	 *
	 * @param      Premio $l Premio
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function addPremio(Premio $l)
	{
		if ($this->collPremios === null) {
			$this->initPremios();
		}
		if (!$this->collPremios->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddPremio($l);
		}

		return $this;
	}

	/**
	 * @param	Premio $premio The premio object to add.
	 */
	protected function doAddPremio($premio)
	{
		$this->collPremios[]= $premio;
		$premio->setUsuario($this);
	}

	/**
	 * Clears out the collRespostaForums collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addRespostaForums()
	 */
	public function clearRespostaForums()
	{
		$this->collRespostaForums = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collRespostaForums collection.
	 *
	 * By default this just sets the collRespostaForums collection to an empty array (like clearcollRespostaForums());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initRespostaForums($overrideExisting = true)
	{
		if (null !== $this->collRespostaForums && !$overrideExisting) {
			return;
		}
		$this->collRespostaForums = new PropelObjectCollection();
		$this->collRespostaForums->setModel('RespostaForum');
	}

	/**
	 * Gets an array of RespostaForum objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Usuario is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array RespostaForum[] List of RespostaForum objects
	 * @throws     PropelException
	 */
	public function getRespostaForums($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collRespostaForums || null !== $criteria) {
			if ($this->isNew() && null === $this->collRespostaForums) {
				// return empty collection
				$this->initRespostaForums();
			} else {
				$collRespostaForums = RespostaForumQuery::create(null, $criteria)
					->filterByUsuario($this)
					->find($con);
				if (null !== $criteria) {
					return $collRespostaForums;
				}
				$this->collRespostaForums = $collRespostaForums;
			}
		}
		return $this->collRespostaForums;
	}

	/**
	 * Sets a collection of RespostaForum objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $respostaForums A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setRespostaForums(PropelCollection $respostaForums, PropelPDO $con = null)
	{
		$this->respostaForumsScheduledForDeletion = $this->getRespostaForums(new Criteria(), $con)->diff($respostaForums);

		foreach ($respostaForums as $respostaForum) {
			// Fix issue with collection modified by reference
			if ($respostaForum->isNew()) {
				$respostaForum->setUsuario($this);
			}
			$this->addRespostaForum($respostaForum);
		}

		$this->collRespostaForums = $respostaForums;
	}

	/**
	 * Returns the number of related RespostaForum objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related RespostaForum objects.
	 * @throws     PropelException
	 */
	public function countRespostaForums(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collRespostaForums || null !== $criteria) {
			if ($this->isNew() && null === $this->collRespostaForums) {
				return 0;
			} else {
				$query = RespostaForumQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUsuario($this)
					->count($con);
			}
		} else {
			return count($this->collRespostaForums);
		}
	}

	/**
	 * Method called to associate a RespostaForum object to this object
	 * through the RespostaForum foreign key attribute.
	 *
	 * @param      RespostaForum $l RespostaForum
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function addRespostaForum(RespostaForum $l)
	{
		if ($this->collRespostaForums === null) {
			$this->initRespostaForums();
		}
		if (!$this->collRespostaForums->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddRespostaForum($l);
		}

		return $this;
	}

	/**
	 * @param	RespostaForum $respostaForum The respostaForum object to add.
	 */
	protected function doAddRespostaForum($respostaForum)
	{
		$this->collRespostaForums[]= $respostaForum;
		$respostaForum->setUsuario($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related RespostaForums from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array RespostaForum[] List of RespostaForum objects
	 */
	public function getRespostaForumsJoinForum($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = RespostaForumQuery::create(null, $criteria);
		$query->joinWith('Forum', $join_behavior);

		return $this->getRespostaForums($query, $con);
	}

	/**
	 * Clears out the collSolicitacaoResgatesRelatedByAprovadorId collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSolicitacaoResgatesRelatedByAprovadorId()
	 */
	public function clearSolicitacaoResgatesRelatedByAprovadorId()
	{
		$this->collSolicitacaoResgatesRelatedByAprovadorId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSolicitacaoResgatesRelatedByAprovadorId collection.
	 *
	 * By default this just sets the collSolicitacaoResgatesRelatedByAprovadorId collection to an empty array (like clearcollSolicitacaoResgatesRelatedByAprovadorId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initSolicitacaoResgatesRelatedByAprovadorId($overrideExisting = true)
	{
		if (null !== $this->collSolicitacaoResgatesRelatedByAprovadorId && !$overrideExisting) {
			return;
		}
		$this->collSolicitacaoResgatesRelatedByAprovadorId = new PropelObjectCollection();
		$this->collSolicitacaoResgatesRelatedByAprovadorId->setModel('SolicitacaoResgate');
	}

	/**
	 * Gets an array of SolicitacaoResgate objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Usuario is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array SolicitacaoResgate[] List of SolicitacaoResgate objects
	 * @throws     PropelException
	 */
	public function getSolicitacaoResgatesRelatedByAprovadorId($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSolicitacaoResgatesRelatedByAprovadorId || null !== $criteria) {
			if ($this->isNew() && null === $this->collSolicitacaoResgatesRelatedByAprovadorId) {
				// return empty collection
				$this->initSolicitacaoResgatesRelatedByAprovadorId();
			} else {
				$collSolicitacaoResgatesRelatedByAprovadorId = SolicitacaoResgateQuery::create(null, $criteria)
					->filterByUsuarioRelatedByAprovadorId($this)
					->find($con);
				if (null !== $criteria) {
					return $collSolicitacaoResgatesRelatedByAprovadorId;
				}
				$this->collSolicitacaoResgatesRelatedByAprovadorId = $collSolicitacaoResgatesRelatedByAprovadorId;
			}
		}
		return $this->collSolicitacaoResgatesRelatedByAprovadorId;
	}

	/**
	 * Sets a collection of SolicitacaoResgateRelatedByAprovadorId objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $solicitacaoResgatesRelatedByAprovadorId A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setSolicitacaoResgatesRelatedByAprovadorId(PropelCollection $solicitacaoResgatesRelatedByAprovadorId, PropelPDO $con = null)
	{
		$this->solicitacaoResgatesRelatedByAprovadorIdScheduledForDeletion = $this->getSolicitacaoResgatesRelatedByAprovadorId(new Criteria(), $con)->diff($solicitacaoResgatesRelatedByAprovadorId);

		foreach ($solicitacaoResgatesRelatedByAprovadorId as $solicitacaoResgateRelatedByAprovadorId) {
			// Fix issue with collection modified by reference
			if ($solicitacaoResgateRelatedByAprovadorId->isNew()) {
				$solicitacaoResgateRelatedByAprovadorId->setUsuarioRelatedByAprovadorId($this);
			}
			$this->addSolicitacaoResgateRelatedByAprovadorId($solicitacaoResgateRelatedByAprovadorId);
		}

		$this->collSolicitacaoResgatesRelatedByAprovadorId = $solicitacaoResgatesRelatedByAprovadorId;
	}

	/**
	 * Returns the number of related SolicitacaoResgate objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SolicitacaoResgate objects.
	 * @throws     PropelException
	 */
	public function countSolicitacaoResgatesRelatedByAprovadorId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSolicitacaoResgatesRelatedByAprovadorId || null !== $criteria) {
			if ($this->isNew() && null === $this->collSolicitacaoResgatesRelatedByAprovadorId) {
				return 0;
			} else {
				$query = SolicitacaoResgateQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUsuarioRelatedByAprovadorId($this)
					->count($con);
			}
		} else {
			return count($this->collSolicitacaoResgatesRelatedByAprovadorId);
		}
	}

	/**
	 * Method called to associate a SolicitacaoResgate object to this object
	 * through the SolicitacaoResgate foreign key attribute.
	 *
	 * @param      SolicitacaoResgate $l SolicitacaoResgate
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function addSolicitacaoResgateRelatedByAprovadorId(SolicitacaoResgate $l)
	{
		if ($this->collSolicitacaoResgatesRelatedByAprovadorId === null) {
			$this->initSolicitacaoResgatesRelatedByAprovadorId();
		}
		if (!$this->collSolicitacaoResgatesRelatedByAprovadorId->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddSolicitacaoResgateRelatedByAprovadorId($l);
		}

		return $this;
	}

	/**
	 * @param	SolicitacaoResgateRelatedByAprovadorId $solicitacaoResgateRelatedByAprovadorId The solicitacaoResgateRelatedByAprovadorId object to add.
	 */
	protected function doAddSolicitacaoResgateRelatedByAprovadorId($solicitacaoResgateRelatedByAprovadorId)
	{
		$this->collSolicitacaoResgatesRelatedByAprovadorId[]= $solicitacaoResgateRelatedByAprovadorId;
		$solicitacaoResgateRelatedByAprovadorId->setUsuarioRelatedByAprovadorId($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related SolicitacaoResgatesRelatedByAprovadorId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SolicitacaoResgate[] List of SolicitacaoResgate objects
	 */
	public function getSolicitacaoResgatesRelatedByAprovadorIdJoinPremio($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SolicitacaoResgateQuery::create(null, $criteria);
		$query->joinWith('Premio', $join_behavior);

		return $this->getSolicitacaoResgatesRelatedByAprovadorId($query, $con);
	}

	/**
	 * Clears out the collSolicitacaoResgatesRelatedBySolicitanteId collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSolicitacaoResgatesRelatedBySolicitanteId()
	 */
	public function clearSolicitacaoResgatesRelatedBySolicitanteId()
	{
		$this->collSolicitacaoResgatesRelatedBySolicitanteId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSolicitacaoResgatesRelatedBySolicitanteId collection.
	 *
	 * By default this just sets the collSolicitacaoResgatesRelatedBySolicitanteId collection to an empty array (like clearcollSolicitacaoResgatesRelatedBySolicitanteId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initSolicitacaoResgatesRelatedBySolicitanteId($overrideExisting = true)
	{
		if (null !== $this->collSolicitacaoResgatesRelatedBySolicitanteId && !$overrideExisting) {
			return;
		}
		$this->collSolicitacaoResgatesRelatedBySolicitanteId = new PropelObjectCollection();
		$this->collSolicitacaoResgatesRelatedBySolicitanteId->setModel('SolicitacaoResgate');
	}

	/**
	 * Gets an array of SolicitacaoResgate objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Usuario is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array SolicitacaoResgate[] List of SolicitacaoResgate objects
	 * @throws     PropelException
	 */
	public function getSolicitacaoResgatesRelatedBySolicitanteId($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSolicitacaoResgatesRelatedBySolicitanteId || null !== $criteria) {
			if ($this->isNew() && null === $this->collSolicitacaoResgatesRelatedBySolicitanteId) {
				// return empty collection
				$this->initSolicitacaoResgatesRelatedBySolicitanteId();
			} else {
				$collSolicitacaoResgatesRelatedBySolicitanteId = SolicitacaoResgateQuery::create(null, $criteria)
					->filterByUsuarioRelatedBySolicitanteId($this)
					->find($con);
				if (null !== $criteria) {
					return $collSolicitacaoResgatesRelatedBySolicitanteId;
				}
				$this->collSolicitacaoResgatesRelatedBySolicitanteId = $collSolicitacaoResgatesRelatedBySolicitanteId;
			}
		}
		return $this->collSolicitacaoResgatesRelatedBySolicitanteId;
	}

	/**
	 * Sets a collection of SolicitacaoResgateRelatedBySolicitanteId objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $solicitacaoResgatesRelatedBySolicitanteId A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setSolicitacaoResgatesRelatedBySolicitanteId(PropelCollection $solicitacaoResgatesRelatedBySolicitanteId, PropelPDO $con = null)
	{
		$this->solicitacaoResgatesRelatedBySolicitanteIdScheduledForDeletion = $this->getSolicitacaoResgatesRelatedBySolicitanteId(new Criteria(), $con)->diff($solicitacaoResgatesRelatedBySolicitanteId);

		foreach ($solicitacaoResgatesRelatedBySolicitanteId as $solicitacaoResgateRelatedBySolicitanteId) {
			// Fix issue with collection modified by reference
			if ($solicitacaoResgateRelatedBySolicitanteId->isNew()) {
				$solicitacaoResgateRelatedBySolicitanteId->setUsuarioRelatedBySolicitanteId($this);
			}
			$this->addSolicitacaoResgateRelatedBySolicitanteId($solicitacaoResgateRelatedBySolicitanteId);
		}

		$this->collSolicitacaoResgatesRelatedBySolicitanteId = $solicitacaoResgatesRelatedBySolicitanteId;
	}

	/**
	 * Returns the number of related SolicitacaoResgate objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related SolicitacaoResgate objects.
	 * @throws     PropelException
	 */
	public function countSolicitacaoResgatesRelatedBySolicitanteId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSolicitacaoResgatesRelatedBySolicitanteId || null !== $criteria) {
			if ($this->isNew() && null === $this->collSolicitacaoResgatesRelatedBySolicitanteId) {
				return 0;
			} else {
				$query = SolicitacaoResgateQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByUsuarioRelatedBySolicitanteId($this)
					->count($con);
			}
		} else {
			return count($this->collSolicitacaoResgatesRelatedBySolicitanteId);
		}
	}

	/**
	 * Method called to associate a SolicitacaoResgate object to this object
	 * through the SolicitacaoResgate foreign key attribute.
	 *
	 * @param      SolicitacaoResgate $l SolicitacaoResgate
	 * @return     Usuario The current object (for fluent API support)
	 */
	public function addSolicitacaoResgateRelatedBySolicitanteId(SolicitacaoResgate $l)
	{
		if ($this->collSolicitacaoResgatesRelatedBySolicitanteId === null) {
			$this->initSolicitacaoResgatesRelatedBySolicitanteId();
		}
		if (!$this->collSolicitacaoResgatesRelatedBySolicitanteId->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddSolicitacaoResgateRelatedBySolicitanteId($l);
		}

		return $this;
	}

	/**
	 * @param	SolicitacaoResgateRelatedBySolicitanteId $solicitacaoResgateRelatedBySolicitanteId The solicitacaoResgateRelatedBySolicitanteId object to add.
	 */
	protected function doAddSolicitacaoResgateRelatedBySolicitanteId($solicitacaoResgateRelatedBySolicitanteId)
	{
		$this->collSolicitacaoResgatesRelatedBySolicitanteId[]= $solicitacaoResgateRelatedBySolicitanteId;
		$solicitacaoResgateRelatedBySolicitanteId->setUsuarioRelatedBySolicitanteId($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Usuario is new, it will return
	 * an empty collection; or if this Usuario has previously
	 * been saved, it will retrieve related SolicitacaoResgatesRelatedBySolicitanteId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Usuario.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array SolicitacaoResgate[] List of SolicitacaoResgate objects
	 */
	public function getSolicitacaoResgatesRelatedBySolicitanteIdJoinPremio($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SolicitacaoResgateQuery::create(null, $criteria);
		$query->joinWith('Premio', $join_behavior);

		return $this->getSolicitacaoResgatesRelatedBySolicitanteId($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->perfil_id = null;
		$this->endereco_id = null;
		$this->cargo_id = null;
		$this->departamento_id = null;
		$this->matricula = null;
		$this->nome = null;
		$this->email = null;
		$this->dni = null;
		$this->data_nascimento = null;
		$this->data_contratacao = null;
		$this->celular = null;
		$this->telefone = null;
		$this->token = null;
		$this->nome_usuario = null;
		$this->senha = null;
		$this->token_senha = null;
		$this->token_firebase = null;
		$this->data_rescisao = null;
		$this->ativo = null;
		$this->tipo_acesso = null;
		$this->estado_civil = null;
		$this->nivel_acesso = null;
		$this->usuario_validado = null;
		$this->sexo = null;
		$this->data_cadastro = null;
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
			if ($this->collAuditorias) {
				foreach ($this->collAuditorias as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAvaliacaoRespostaForums) {
				foreach ($this->collAvaliacaoRespostaForums as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collColetaPesquisas) {
				foreach ($this->collColetaPesquisas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collComentarioNoticias) {
				foreach ($this->collComentarioNoticias as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCurtidaForums) {
				foreach ($this->collCurtidaForums as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collNoticias) {
				foreach ($this->collNoticias as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPesquisas) {
				foreach ($this->collPesquisas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPesquisaHabilitadas) {
				foreach ($this->collPesquisaHabilitadas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collPremios) {
				foreach ($this->collPremios as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRespostaForums) {
				foreach ($this->collRespostaForums as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSolicitacaoResgatesRelatedByAprovadorId) {
				foreach ($this->collSolicitacaoResgatesRelatedByAprovadorId as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSolicitacaoResgatesRelatedBySolicitanteId) {
				foreach ($this->collSolicitacaoResgatesRelatedBySolicitanteId as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collAuditorias instanceof PropelCollection) {
			$this->collAuditorias->clearIterator();
		}
		$this->collAuditorias = null;
		if ($this->collAvaliacaoRespostaForums instanceof PropelCollection) {
			$this->collAvaliacaoRespostaForums->clearIterator();
		}
		$this->collAvaliacaoRespostaForums = null;
		if ($this->collColetaPesquisas instanceof PropelCollection) {
			$this->collColetaPesquisas->clearIterator();
		}
		$this->collColetaPesquisas = null;
		if ($this->collComentarioNoticias instanceof PropelCollection) {
			$this->collComentarioNoticias->clearIterator();
		}
		$this->collComentarioNoticias = null;
		if ($this->collCurtidaForums instanceof PropelCollection) {
			$this->collCurtidaForums->clearIterator();
		}
		$this->collCurtidaForums = null;
		if ($this->collNoticias instanceof PropelCollection) {
			$this->collNoticias->clearIterator();
		}
		$this->collNoticias = null;
		if ($this->collPesquisas instanceof PropelCollection) {
			$this->collPesquisas->clearIterator();
		}
		$this->collPesquisas = null;
		if ($this->collPesquisaHabilitadas instanceof PropelCollection) {
			$this->collPesquisaHabilitadas->clearIterator();
		}
		$this->collPesquisaHabilitadas = null;
		if ($this->collPremios instanceof PropelCollection) {
			$this->collPremios->clearIterator();
		}
		$this->collPremios = null;
		if ($this->collRespostaForums instanceof PropelCollection) {
			$this->collRespostaForums->clearIterator();
		}
		$this->collRespostaForums = null;
		if ($this->collSolicitacaoResgatesRelatedByAprovadorId instanceof PropelCollection) {
			$this->collSolicitacaoResgatesRelatedByAprovadorId->clearIterator();
		}
		$this->collSolicitacaoResgatesRelatedByAprovadorId = null;
		if ($this->collSolicitacaoResgatesRelatedBySolicitanteId instanceof PropelCollection) {
			$this->collSolicitacaoResgatesRelatedBySolicitanteId->clearIterator();
		}
		$this->collSolicitacaoResgatesRelatedBySolicitanteId = null;
		$this->aPerfil = null;
		$this->aCargo = null;
		$this->aDepartamento = null;
		$this->aEndereco = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(UsuarioPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseUsuario
