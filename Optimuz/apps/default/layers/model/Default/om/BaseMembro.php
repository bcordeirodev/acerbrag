<?php


/**
 * Base class that represents a row from the 'membro' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseMembro extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'MembroPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        MembroPeer
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
	 * The value for the filial_id field.
	 * @var        int
	 */
	protected $filial_id;

	/**
	 * The value for the criador_id field.
	 * @var        int
	 */
	protected $criador_id;

	/**
	 * The value for the membro_usuario_id field.
	 * @var        int
	 */
	protected $membro_usuario_id;

	/**
	 * The value for the usuario_aprovador_id field.
	 * @var        int
	 */
	protected $usuario_aprovador_id;

	/**
	 * The value for the endereco_id field.
	 * @var        int
	 */
	protected $endereco_id;

	/**
	 * The value for the cidade_naturalidade_id field.
	 * @var        int
	 */
	protected $cidade_naturalidade_id;

	/**
	 * The value for the nome_completo field.
	 * @var        string
	 */
	protected $nome_completo;

	/**
	 * The value for the sexo field.
	 * @var        string
	 */
	protected $sexo;

	/**
	 * The value for the rg field.
	 * @var        string
	 */
	protected $rg;

	/**
	 * The value for the rg_expedidor field.
	 * @var        string
	 */
	protected $rg_expedidor;

	/**
	 * The value for the cpf field.
	 * @var        string
	 */
	protected $cpf;

	/**
	 * The value for the estado_civil field.
	 * @var        string
	 */
	protected $estado_civil;

	/**
	 * The value for the nome_conjunge field.
	 * @var        string
	 */
	protected $nome_conjunge;

	/**
	 * The value for the cristao field.
	 * @var        boolean
	 */
	protected $cristao;

	/**
	 * The value for the nome_pai field.
	 * @var        string
	 */
	protected $nome_pai;

	/**
	 * The value for the nome_mae field.
	 * @var        string
	 */
	protected $nome_mae;

	/**
	 * The value for the telefone_residencial field.
	 * @var        string
	 */
	protected $telefone_residencial;

	/**
	 * The value for the telefone_celular field.
	 * @var        string
	 */
	protected $telefone_celular;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the batizado field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $batizado;

	/**
	 * The value for the data_membro field.
	 * @var        string
	 */
	protected $data_membro;

	/**
	 * The value for the igreja_origem field.
	 * @var        string
	 */
	protected $igreja_origem;

	/**
	 * The value for the pastor_igreja_origem field.
	 * @var        string
	 */
	protected $pastor_igreja_origem;

	/**
	 * The value for the telefone_igreja_origem field.
	 * @var        string
	 */
	protected $telefone_igreja_origem;

	/**
	 * The value for the possui_ministerio field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $possui_ministerio;

	/**
	 * The value for the nome_antigo_ministerio field.
	 * @var        string
	 */
	protected $nome_antigo_ministerio;

	/**
	 * The value for the participa_pg field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $participa_pg;

	/**
	 * The value for the nome_pg field.
	 * @var        string
	 */
	protected $nome_pg;

	/**
	 * The value for the cargo_igreja field.
	 * @var        string
	 */
	protected $cargo_igreja;

	/**
	 * The value for the experiencia_outras_igrejas field.
	 * @var        string
	 */
	protected $experiencia_outras_igrejas;

	/**
	 * The value for the interesse_ministerios field.
	 * @var        string
	 */
	protected $interesse_ministerios;

	/**
	 * The value for the data_cadastro field.
	 * @var        string
	 */
	protected $data_cadastro;

	/**
	 * The value for the data_nascimento field.
	 * @var        string
	 */
	protected $data_nascimento;

	/**
	 * The value for the profissao field.
	 * @var        string
	 */
	protected $profissao;

	/**
	 * The value for the ativo field.
	 * Note: this column has a database default value of: true
	 * @var        boolean
	 */
	protected $ativo;

	/**
	 * The value for the cadastro_aprovado field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $cadastro_aprovado;

	/**
	 * @var        Cidade
	 */
	protected $aCidade;

	/**
	 * @var        Endereco
	 */
	protected $aEndereco;

	/**
	 * @var        Igreja
	 */
	protected $aIgrejaRelatedByFilialId;

	/**
	 * @var        Igreja
	 */
	protected $aIgrejaRelatedByInstituicaoId;

	/**
	 * @var        Usuario
	 */
	protected $aUsuarioRelatedByCriadorId;

	/**
	 * @var        Usuario
	 */
	protected $aUsuarioRelatedByMembroUsuarioId;

	/**
	 * @var        Usuario
	 */
	protected $aUsuarioRelatedByUsuarioAprovadorId;

	/**
	 * @var        array FilhoMembro[] Collection to store aggregation of FilhoMembro objects.
	 */
	protected $collFilhoMembros;

	/**
	 * @var        array Usuario[] Collection to store aggregation of Usuario objects.
	 */
	protected $collUsuariosRelatedByMembroId;

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
	protected $filhoMembrosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $usuariosRelatedByMembroIdScheduledForDeletion = null;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->batizado = false;
		$this->possui_ministerio = false;
		$this->participa_pg = false;
		$this->ativo = true;
		$this->cadastro_aprovado = false;
	}

	/**
	 * Initializes internal state of BaseMembro object.
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
	 * Get the [filial_id] column value.
	 * 
	 * @return     int
	 */
	public function getFilialId()
	{
		return $this->filial_id;
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
	 * Get the [membro_usuario_id] column value.
	 * 
	 * @return     int
	 */
	public function getMembroUsuarioId()
	{
		return $this->membro_usuario_id;
	}

	/**
	 * Get the [usuario_aprovador_id] column value.
	 * 
	 * @return     int
	 */
	public function getUsuarioAprovadorId()
	{
		return $this->usuario_aprovador_id;
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
	 * Get the [cidade_naturalidade_id] column value.
	 * 
	 * @return     int
	 */
	public function getCidadeNaturalidadeId()
	{
		return $this->cidade_naturalidade_id;
	}

	/**
	 * Get the [nome_completo] column value.
	 * 
	 * @return     string
	 */
	public function getNomeCompleto()
	{
		return $this->nome_completo;
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
	 * Get the [rg] column value.
	 * 
	 * @return     string
	 */
	public function getRg()
	{
		return $this->rg;
	}

	/**
	 * Get the [rg_expedidor] column value.
	 * 
	 * @return     string
	 */
	public function getRgExpedidor()
	{
		return $this->rg_expedidor;
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
	 * Get the [estado_civil] column value.
	 * 
	 * @return     string
	 */
	public function getEstadoCivil()
	{
		return $this->estado_civil;
	}

	/**
	 * Get the [nome_conjunge] column value.
	 * 
	 * @return     string
	 */
	public function getNomeConjunge()
	{
		return $this->nome_conjunge;
	}

	/**
	 * Get the [cristao] column value.
	 * 
	 * @return     boolean
	 */
	public function getCristao()
	{
		return $this->cristao;
	}

	/**
	 * Get the [nome_pai] column value.
	 * 
	 * @return     string
	 */
	public function getNomePai()
	{
		return $this->nome_pai;
	}

	/**
	 * Get the [nome_mae] column value.
	 * 
	 * @return     string
	 */
	public function getNomeMae()
	{
		return $this->nome_mae;
	}

	/**
	 * Get the [telefone_residencial] column value.
	 * 
	 * @return     string
	 */
	public function getTelefoneResidencial()
	{
		return $this->telefone_residencial;
	}

	/**
	 * Get the [telefone_celular] column value.
	 * 
	 * @return     string
	 */
	public function getTelefoneCelular()
	{
		return $this->telefone_celular;
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
	 * Get the [batizado] column value.
	 * 
	 * @return     boolean
	 */
	public function getBatizado()
	{
		return $this->batizado;
	}

	/**
	 * Get the [optionally formatted] temporal [data_membro] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDataMembro($format = '%x')
	{
		if ($this->data_membro === null) {
			return null;
		}


		if ($this->data_membro === '0000-00-00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->data_membro);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->data_membro, true), $x);
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
	 * Get the [igreja_origem] column value.
	 * 
	 * @return     string
	 */
	public function getIgrejaOrigem()
	{
		return $this->igreja_origem;
	}

	/**
	 * Get the [pastor_igreja_origem] column value.
	 * 
	 * @return     string
	 */
	public function getPastorIgrejaOrigem()
	{
		return $this->pastor_igreja_origem;
	}

	/**
	 * Get the [telefone_igreja_origem] column value.
	 * 
	 * @return     string
	 */
	public function getTelefoneIgrejaOrigem()
	{
		return $this->telefone_igreja_origem;
	}

	/**
	 * Get the [possui_ministerio] column value.
	 * 
	 * @return     boolean
	 */
	public function getPossuiMinisterio()
	{
		return $this->possui_ministerio;
	}

	/**
	 * Get the [nome_antigo_ministerio] column value.
	 * 
	 * @return     string
	 */
	public function getNomeAntigoMinisterio()
	{
		return $this->nome_antigo_ministerio;
	}

	/**
	 * Get the [participa_pg] column value.
	 * 
	 * @return     boolean
	 */
	public function getParticipaPg()
	{
		return $this->participa_pg;
	}

	/**
	 * Get the [nome_pg] column value.
	 * 
	 * @return     string
	 */
	public function getNomePg()
	{
		return $this->nome_pg;
	}

	/**
	 * Get the [cargo_igreja] column value.
	 * 
	 * @return     string
	 */
	public function getCargoIgreja()
	{
		return $this->cargo_igreja;
	}

	/**
	 * Get the [experiencia_outras_igrejas] column value.
	 * 
	 * @return     string
	 */
	public function getExperienciaOutrasIgrejas()
	{
		return $this->experiencia_outras_igrejas;
	}

	/**
	 * Get the [interesse_ministerios] column value.
	 * 
	 * @return     string
	 */
	public function getInteresseMinisterios()
	{
		return $this->interesse_ministerios;
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
	 * Get the [profissao] column value.
	 * 
	 * @return     string
	 */
	public function getProfissao()
	{
		return $this->profissao;
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
	 * Get the [cadastro_aprovado] column value.
	 * 
	 * @return     boolean
	 */
	public function getCadastroAprovado()
	{
		return $this->cadastro_aprovado;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = MembroPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [instituicao_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setInstituicaoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->instituicao_id !== $v) {
			$this->instituicao_id = $v;
			$this->modifiedColumns[] = MembroPeer::INSTITUICAO_ID;
		}

		if ($this->aIgrejaRelatedByInstituicaoId !== null && $this->aIgrejaRelatedByInstituicaoId->getId() !== $v) {
			$this->aIgrejaRelatedByInstituicaoId = null;
		}

		return $this;
	} // setInstituicaoId()

	/**
	 * Set the value of [filial_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setFilialId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->filial_id !== $v) {
			$this->filial_id = $v;
			$this->modifiedColumns[] = MembroPeer::FILIAL_ID;
		}

		if ($this->aIgrejaRelatedByFilialId !== null && $this->aIgrejaRelatedByFilialId->getId() !== $v) {
			$this->aIgrejaRelatedByFilialId = null;
		}

		return $this;
	} // setFilialId()

	/**
	 * Set the value of [criador_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setCriadorId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->criador_id !== $v) {
			$this->criador_id = $v;
			$this->modifiedColumns[] = MembroPeer::CRIADOR_ID;
		}

		if ($this->aUsuarioRelatedByCriadorId !== null && $this->aUsuarioRelatedByCriadorId->getId() !== $v) {
			$this->aUsuarioRelatedByCriadorId = null;
		}

		return $this;
	} // setCriadorId()

	/**
	 * Set the value of [membro_usuario_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setMembroUsuarioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->membro_usuario_id !== $v) {
			$this->membro_usuario_id = $v;
			$this->modifiedColumns[] = MembroPeer::MEMBRO_USUARIO_ID;
		}

		if ($this->aUsuarioRelatedByMembroUsuarioId !== null && $this->aUsuarioRelatedByMembroUsuarioId->getId() !== $v) {
			$this->aUsuarioRelatedByMembroUsuarioId = null;
		}

		return $this;
	} // setMembroUsuarioId()

	/**
	 * Set the value of [usuario_aprovador_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setUsuarioAprovadorId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->usuario_aprovador_id !== $v) {
			$this->usuario_aprovador_id = $v;
			$this->modifiedColumns[] = MembroPeer::USUARIO_APROVADOR_ID;
		}

		if ($this->aUsuarioRelatedByUsuarioAprovadorId !== null && $this->aUsuarioRelatedByUsuarioAprovadorId->getId() !== $v) {
			$this->aUsuarioRelatedByUsuarioAprovadorId = null;
		}

		return $this;
	} // setUsuarioAprovadorId()

	/**
	 * Set the value of [endereco_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setEnderecoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->endereco_id !== $v) {
			$this->endereco_id = $v;
			$this->modifiedColumns[] = MembroPeer::ENDERECO_ID;
		}

		if ($this->aEndereco !== null && $this->aEndereco->getId() !== $v) {
			$this->aEndereco = null;
		}

		return $this;
	} // setEnderecoId()

	/**
	 * Set the value of [cidade_naturalidade_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setCidadeNaturalidadeId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cidade_naturalidade_id !== $v) {
			$this->cidade_naturalidade_id = $v;
			$this->modifiedColumns[] = MembroPeer::CIDADE_NATURALIDADE_ID;
		}

		if ($this->aCidade !== null && $this->aCidade->getId() !== $v) {
			$this->aCidade = null;
		}

		return $this;
	} // setCidadeNaturalidadeId()

	/**
	 * Set the value of [nome_completo] column.
	 * 
	 * @param      string $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setNomeCompleto($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome_completo !== $v) {
			$this->nome_completo = $v;
			$this->modifiedColumns[] = MembroPeer::NOME_COMPLETO;
		}

		return $this;
	} // setNomeCompleto()

	/**
	 * Set the value of [sexo] column.
	 * 
	 * @param      string $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setSexo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->sexo !== $v) {
			$this->sexo = $v;
			$this->modifiedColumns[] = MembroPeer::SEXO;
		}

		return $this;
	} // setSexo()

	/**
	 * Set the value of [rg] column.
	 * 
	 * @param      string $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setRg($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->rg !== $v) {
			$this->rg = $v;
			$this->modifiedColumns[] = MembroPeer::RG;
		}

		return $this;
	} // setRg()

	/**
	 * Set the value of [rg_expedidor] column.
	 * 
	 * @param      string $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setRgExpedidor($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->rg_expedidor !== $v) {
			$this->rg_expedidor = $v;
			$this->modifiedColumns[] = MembroPeer::RG_EXPEDIDOR;
		}

		return $this;
	} // setRgExpedidor()

	/**
	 * Set the value of [cpf] column.
	 * 
	 * @param      string $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setCpf($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cpf !== $v) {
			$this->cpf = $v;
			$this->modifiedColumns[] = MembroPeer::CPF;
		}

		return $this;
	} // setCpf()

	/**
	 * Set the value of [estado_civil] column.
	 * 
	 * @param      string $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setEstadoCivil($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->estado_civil !== $v) {
			$this->estado_civil = $v;
			$this->modifiedColumns[] = MembroPeer::ESTADO_CIVIL;
		}

		return $this;
	} // setEstadoCivil()

	/**
	 * Set the value of [nome_conjunge] column.
	 * 
	 * @param      string $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setNomeConjunge($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome_conjunge !== $v) {
			$this->nome_conjunge = $v;
			$this->modifiedColumns[] = MembroPeer::NOME_CONJUNGE;
		}

		return $this;
	} // setNomeConjunge()

	/**
	 * Sets the value of the [cristao] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setCristao($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->cristao !== $v) {
			$this->cristao = $v;
			$this->modifiedColumns[] = MembroPeer::CRISTAO;
		}

		return $this;
	} // setCristao()

	/**
	 * Set the value of [nome_pai] column.
	 * 
	 * @param      string $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setNomePai($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome_pai !== $v) {
			$this->nome_pai = $v;
			$this->modifiedColumns[] = MembroPeer::NOME_PAI;
		}

		return $this;
	} // setNomePai()

	/**
	 * Set the value of [nome_mae] column.
	 * 
	 * @param      string $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setNomeMae($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome_mae !== $v) {
			$this->nome_mae = $v;
			$this->modifiedColumns[] = MembroPeer::NOME_MAE;
		}

		return $this;
	} // setNomeMae()

	/**
	 * Set the value of [telefone_residencial] column.
	 * 
	 * @param      string $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setTelefoneResidencial($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->telefone_residencial !== $v) {
			$this->telefone_residencial = $v;
			$this->modifiedColumns[] = MembroPeer::TELEFONE_RESIDENCIAL;
		}

		return $this;
	} // setTelefoneResidencial()

	/**
	 * Set the value of [telefone_celular] column.
	 * 
	 * @param      string $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setTelefoneCelular($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->telefone_celular !== $v) {
			$this->telefone_celular = $v;
			$this->modifiedColumns[] = MembroPeer::TELEFONE_CELULAR;
		}

		return $this;
	} // setTelefoneCelular()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = MembroPeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Sets the value of the [batizado] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setBatizado($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->batizado !== $v) {
			$this->batizado = $v;
			$this->modifiedColumns[] = MembroPeer::BATIZADO;
		}

		return $this;
	} // setBatizado()

	/**
	 * Sets the value of [data_membro] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setDataMembro($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_membro !== null || $dt !== null) {
			$currentDateAsString = ($this->data_membro !== null && $tmpDt = new DateTime($this->data_membro)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_membro = $newDateAsString;
				$this->modifiedColumns[] = MembroPeer::DATA_MEMBRO;
			}
		} // if either are not null

		return $this;
	} // setDataMembro()

	/**
	 * Set the value of [igreja_origem] column.
	 * 
	 * @param      string $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setIgrejaOrigem($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->igreja_origem !== $v) {
			$this->igreja_origem = $v;
			$this->modifiedColumns[] = MembroPeer::IGREJA_ORIGEM;
		}

		return $this;
	} // setIgrejaOrigem()

	/**
	 * Set the value of [pastor_igreja_origem] column.
	 * 
	 * @param      string $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setPastorIgrejaOrigem($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->pastor_igreja_origem !== $v) {
			$this->pastor_igreja_origem = $v;
			$this->modifiedColumns[] = MembroPeer::PASTOR_IGREJA_ORIGEM;
		}

		return $this;
	} // setPastorIgrejaOrigem()

	/**
	 * Set the value of [telefone_igreja_origem] column.
	 * 
	 * @param      string $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setTelefoneIgrejaOrigem($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->telefone_igreja_origem !== $v) {
			$this->telefone_igreja_origem = $v;
			$this->modifiedColumns[] = MembroPeer::TELEFONE_IGREJA_ORIGEM;
		}

		return $this;
	} // setTelefoneIgrejaOrigem()

	/**
	 * Sets the value of the [possui_ministerio] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setPossuiMinisterio($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->possui_ministerio !== $v) {
			$this->possui_ministerio = $v;
			$this->modifiedColumns[] = MembroPeer::POSSUI_MINISTERIO;
		}

		return $this;
	} // setPossuiMinisterio()

	/**
	 * Set the value of [nome_antigo_ministerio] column.
	 * 
	 * @param      string $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setNomeAntigoMinisterio($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome_antigo_ministerio !== $v) {
			$this->nome_antigo_ministerio = $v;
			$this->modifiedColumns[] = MembroPeer::NOME_ANTIGO_MINISTERIO;
		}

		return $this;
	} // setNomeAntigoMinisterio()

	/**
	 * Sets the value of the [participa_pg] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setParticipaPg($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->participa_pg !== $v) {
			$this->participa_pg = $v;
			$this->modifiedColumns[] = MembroPeer::PARTICIPA_PG;
		}

		return $this;
	} // setParticipaPg()

	/**
	 * Set the value of [nome_pg] column.
	 * 
	 * @param      string $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setNomePg($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome_pg !== $v) {
			$this->nome_pg = $v;
			$this->modifiedColumns[] = MembroPeer::NOME_PG;
		}

		return $this;
	} // setNomePg()

	/**
	 * Set the value of [cargo_igreja] column.
	 * 
	 * @param      string $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setCargoIgreja($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cargo_igreja !== $v) {
			$this->cargo_igreja = $v;
			$this->modifiedColumns[] = MembroPeer::CARGO_IGREJA;
		}

		return $this;
	} // setCargoIgreja()

	/**
	 * Set the value of [experiencia_outras_igrejas] column.
	 * 
	 * @param      string $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setExperienciaOutrasIgrejas($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->experiencia_outras_igrejas !== $v) {
			$this->experiencia_outras_igrejas = $v;
			$this->modifiedColumns[] = MembroPeer::EXPERIENCIA_OUTRAS_IGREJAS;
		}

		return $this;
	} // setExperienciaOutrasIgrejas()

	/**
	 * Set the value of [interesse_ministerios] column.
	 * 
	 * @param      string $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setInteresseMinisterios($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->interesse_ministerios !== $v) {
			$this->interesse_ministerios = $v;
			$this->modifiedColumns[] = MembroPeer::INTERESSE_MINISTERIOS;
		}

		return $this;
	} // setInteresseMinisterios()

	/**
	 * Sets the value of [data_cadastro] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setDataCadastro($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_cadastro !== null || $dt !== null) {
			$currentDateAsString = ($this->data_cadastro !== null && $tmpDt = new DateTime($this->data_cadastro)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_cadastro = $newDateAsString;
				$this->modifiedColumns[] = MembroPeer::DATA_CADASTRO;
			}
		} // if either are not null

		return $this;
	} // setDataCadastro()

	/**
	 * Sets the value of [data_nascimento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setDataNascimento($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_nascimento !== null || $dt !== null) {
			$currentDateAsString = ($this->data_nascimento !== null && $tmpDt = new DateTime($this->data_nascimento)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_nascimento = $newDateAsString;
				$this->modifiedColumns[] = MembroPeer::DATA_NASCIMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataNascimento()

	/**
	 * Set the value of [profissao] column.
	 * 
	 * @param      string $v new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setProfissao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->profissao !== $v) {
			$this->profissao = $v;
			$this->modifiedColumns[] = MembroPeer::PROFISSAO;
		}

		return $this;
	} // setProfissao()

	/**
	 * Sets the value of the [ativo] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Membro The current object (for fluent API support)
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
			$this->modifiedColumns[] = MembroPeer::ATIVO;
		}

		return $this;
	} // setAtivo()

	/**
	 * Sets the value of the [cadastro_aprovado] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Membro The current object (for fluent API support)
	 */
	public function setCadastroAprovado($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->cadastro_aprovado !== $v) {
			$this->cadastro_aprovado = $v;
			$this->modifiedColumns[] = MembroPeer::CADASTRO_APROVADO;
		}

		return $this;
	} // setCadastroAprovado()

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
			if ($this->batizado !== false) {
				return false;
			}

			if ($this->possui_ministerio !== false) {
				return false;
			}

			if ($this->participa_pg !== false) {
				return false;
			}

			if ($this->ativo !== true) {
				return false;
			}

			if ($this->cadastro_aprovado !== false) {
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
			$this->filial_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->criador_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->membro_usuario_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->usuario_aprovador_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->endereco_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->cidade_naturalidade_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->nome_completo = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->sexo = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->rg = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->rg_expedidor = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->cpf = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->estado_civil = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->nome_conjunge = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->cristao = ($row[$startcol + 15] !== null) ? (boolean) $row[$startcol + 15] : null;
			$this->nome_pai = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->nome_mae = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
			$this->telefone_residencial = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
			$this->telefone_celular = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
			$this->email = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
			$this->batizado = ($row[$startcol + 21] !== null) ? (boolean) $row[$startcol + 21] : null;
			$this->data_membro = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
			$this->igreja_origem = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
			$this->pastor_igreja_origem = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
			$this->telefone_igreja_origem = ($row[$startcol + 25] !== null) ? (string) $row[$startcol + 25] : null;
			$this->possui_ministerio = ($row[$startcol + 26] !== null) ? (boolean) $row[$startcol + 26] : null;
			$this->nome_antigo_ministerio = ($row[$startcol + 27] !== null) ? (string) $row[$startcol + 27] : null;
			$this->participa_pg = ($row[$startcol + 28] !== null) ? (boolean) $row[$startcol + 28] : null;
			$this->nome_pg = ($row[$startcol + 29] !== null) ? (string) $row[$startcol + 29] : null;
			$this->cargo_igreja = ($row[$startcol + 30] !== null) ? (string) $row[$startcol + 30] : null;
			$this->experiencia_outras_igrejas = ($row[$startcol + 31] !== null) ? (string) $row[$startcol + 31] : null;
			$this->interesse_ministerios = ($row[$startcol + 32] !== null) ? (string) $row[$startcol + 32] : null;
			$this->data_cadastro = ($row[$startcol + 33] !== null) ? (string) $row[$startcol + 33] : null;
			$this->data_nascimento = ($row[$startcol + 34] !== null) ? (string) $row[$startcol + 34] : null;
			$this->profissao = ($row[$startcol + 35] !== null) ? (string) $row[$startcol + 35] : null;
			$this->ativo = ($row[$startcol + 36] !== null) ? (boolean) $row[$startcol + 36] : null;
			$this->cadastro_aprovado = ($row[$startcol + 37] !== null) ? (boolean) $row[$startcol + 37] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 38; // 38 = MembroPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Membro object", $e);
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

		if ($this->aIgrejaRelatedByInstituicaoId !== null && $this->instituicao_id !== $this->aIgrejaRelatedByInstituicaoId->getId()) {
			$this->aIgrejaRelatedByInstituicaoId = null;
		}
		if ($this->aIgrejaRelatedByFilialId !== null && $this->filial_id !== $this->aIgrejaRelatedByFilialId->getId()) {
			$this->aIgrejaRelatedByFilialId = null;
		}
		if ($this->aUsuarioRelatedByCriadorId !== null && $this->criador_id !== $this->aUsuarioRelatedByCriadorId->getId()) {
			$this->aUsuarioRelatedByCriadorId = null;
		}
		if ($this->aUsuarioRelatedByMembroUsuarioId !== null && $this->membro_usuario_id !== $this->aUsuarioRelatedByMembroUsuarioId->getId()) {
			$this->aUsuarioRelatedByMembroUsuarioId = null;
		}
		if ($this->aUsuarioRelatedByUsuarioAprovadorId !== null && $this->usuario_aprovador_id !== $this->aUsuarioRelatedByUsuarioAprovadorId->getId()) {
			$this->aUsuarioRelatedByUsuarioAprovadorId = null;
		}
		if ($this->aEndereco !== null && $this->endereco_id !== $this->aEndereco->getId()) {
			$this->aEndereco = null;
		}
		if ($this->aCidade !== null && $this->cidade_naturalidade_id !== $this->aCidade->getId()) {
			$this->aCidade = null;
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
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = MembroPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aCidade = null;
			$this->aEndereco = null;
			$this->aIgrejaRelatedByFilialId = null;
			$this->aIgrejaRelatedByInstituicaoId = null;
			$this->aUsuarioRelatedByCriadorId = null;
			$this->aUsuarioRelatedByMembroUsuarioId = null;
			$this->aUsuarioRelatedByUsuarioAprovadorId = null;
			$this->collFilhoMembros = null;

			$this->collUsuariosRelatedByMembroId = null;

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
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = MembroQuery::create()
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
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				MembroPeer::addInstanceToPool($this);
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

			if ($this->aCidade !== null) {
				if ($this->aCidade->isModified() || $this->aCidade->isNew()) {
					$affectedRows += $this->aCidade->save($con);
				}
				$this->setCidade($this->aCidade);
			}

			if ($this->aEndereco !== null) {
				if ($this->aEndereco->isModified() || $this->aEndereco->isNew()) {
					$affectedRows += $this->aEndereco->save($con);
				}
				$this->setEndereco($this->aEndereco);
			}

			if ($this->aIgrejaRelatedByFilialId !== null) {
				if ($this->aIgrejaRelatedByFilialId->isModified() || $this->aIgrejaRelatedByFilialId->isNew()) {
					$affectedRows += $this->aIgrejaRelatedByFilialId->save($con);
				}
				$this->setIgrejaRelatedByFilialId($this->aIgrejaRelatedByFilialId);
			}

			if ($this->aIgrejaRelatedByInstituicaoId !== null) {
				if ($this->aIgrejaRelatedByInstituicaoId->isModified() || $this->aIgrejaRelatedByInstituicaoId->isNew()) {
					$affectedRows += $this->aIgrejaRelatedByInstituicaoId->save($con);
				}
				$this->setIgrejaRelatedByInstituicaoId($this->aIgrejaRelatedByInstituicaoId);
			}

			if ($this->aUsuarioRelatedByCriadorId !== null) {
				if ($this->aUsuarioRelatedByCriadorId->isModified() || $this->aUsuarioRelatedByCriadorId->isNew()) {
					$affectedRows += $this->aUsuarioRelatedByCriadorId->save($con);
				}
				$this->setUsuarioRelatedByCriadorId($this->aUsuarioRelatedByCriadorId);
			}

			if ($this->aUsuarioRelatedByMembroUsuarioId !== null) {
				if ($this->aUsuarioRelatedByMembroUsuarioId->isModified() || $this->aUsuarioRelatedByMembroUsuarioId->isNew()) {
					$affectedRows += $this->aUsuarioRelatedByMembroUsuarioId->save($con);
				}
				$this->setUsuarioRelatedByMembroUsuarioId($this->aUsuarioRelatedByMembroUsuarioId);
			}

			if ($this->aUsuarioRelatedByUsuarioAprovadorId !== null) {
				if ($this->aUsuarioRelatedByUsuarioAprovadorId->isModified() || $this->aUsuarioRelatedByUsuarioAprovadorId->isNew()) {
					$affectedRows += $this->aUsuarioRelatedByUsuarioAprovadorId->save($con);
				}
				$this->setUsuarioRelatedByUsuarioAprovadorId($this->aUsuarioRelatedByUsuarioAprovadorId);
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

			if ($this->filhoMembrosScheduledForDeletion !== null) {
				if (!$this->filhoMembrosScheduledForDeletion->isEmpty()) {
					FilhoMembroQuery::create()
						->filterByPrimaryKeys($this->filhoMembrosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->filhoMembrosScheduledForDeletion = null;
				}
			}

			if ($this->collFilhoMembros !== null) {
				foreach ($this->collFilhoMembros as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->usuariosRelatedByMembroIdScheduledForDeletion !== null) {
				if (!$this->usuariosRelatedByMembroIdScheduledForDeletion->isEmpty()) {
					UsuarioQuery::create()
						->filterByPrimaryKeys($this->usuariosRelatedByMembroIdScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->usuariosRelatedByMembroIdScheduledForDeletion = null;
				}
			}

			if ($this->collUsuariosRelatedByMembroId !== null) {
				foreach ($this->collUsuariosRelatedByMembroId as $referrerFK) {
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

		$this->modifiedColumns[] = MembroPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . MembroPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(MembroPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(MembroPeer::INSTITUICAO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`INSTITUICAO_ID`';
		}
		if ($this->isColumnModified(MembroPeer::FILIAL_ID)) {
			$modifiedColumns[':p' . $index++]  = '`FILIAL_ID`';
		}
		if ($this->isColumnModified(MembroPeer::CRIADOR_ID)) {
			$modifiedColumns[':p' . $index++]  = '`CRIADOR_ID`';
		}
		if ($this->isColumnModified(MembroPeer::MEMBRO_USUARIO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`MEMBRO_USUARIO_ID`';
		}
		if ($this->isColumnModified(MembroPeer::USUARIO_APROVADOR_ID)) {
			$modifiedColumns[':p' . $index++]  = '`USUARIO_APROVADOR_ID`';
		}
		if ($this->isColumnModified(MembroPeer::ENDERECO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ENDERECO_ID`';
		}
		if ($this->isColumnModified(MembroPeer::CIDADE_NATURALIDADE_ID)) {
			$modifiedColumns[':p' . $index++]  = '`CIDADE_NATURALIDADE_ID`';
		}
		if ($this->isColumnModified(MembroPeer::NOME_COMPLETO)) {
			$modifiedColumns[':p' . $index++]  = '`NOME_COMPLETO`';
		}
		if ($this->isColumnModified(MembroPeer::SEXO)) {
			$modifiedColumns[':p' . $index++]  = '`SEXO`';
		}
		if ($this->isColumnModified(MembroPeer::RG)) {
			$modifiedColumns[':p' . $index++]  = '`RG`';
		}
		if ($this->isColumnModified(MembroPeer::RG_EXPEDIDOR)) {
			$modifiedColumns[':p' . $index++]  = '`RG_EXPEDIDOR`';
		}
		if ($this->isColumnModified(MembroPeer::CPF)) {
			$modifiedColumns[':p' . $index++]  = '`CPF`';
		}
		if ($this->isColumnModified(MembroPeer::ESTADO_CIVIL)) {
			$modifiedColumns[':p' . $index++]  = '`ESTADO_CIVIL`';
		}
		if ($this->isColumnModified(MembroPeer::NOME_CONJUNGE)) {
			$modifiedColumns[':p' . $index++]  = '`NOME_CONJUNGE`';
		}
		if ($this->isColumnModified(MembroPeer::CRISTAO)) {
			$modifiedColumns[':p' . $index++]  = '`CRISTAO`';
		}
		if ($this->isColumnModified(MembroPeer::NOME_PAI)) {
			$modifiedColumns[':p' . $index++]  = '`NOME_PAI`';
		}
		if ($this->isColumnModified(MembroPeer::NOME_MAE)) {
			$modifiedColumns[':p' . $index++]  = '`NOME_MAE`';
		}
		if ($this->isColumnModified(MembroPeer::TELEFONE_RESIDENCIAL)) {
			$modifiedColumns[':p' . $index++]  = '`TELEFONE_RESIDENCIAL`';
		}
		if ($this->isColumnModified(MembroPeer::TELEFONE_CELULAR)) {
			$modifiedColumns[':p' . $index++]  = '`TELEFONE_CELULAR`';
		}
		if ($this->isColumnModified(MembroPeer::EMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`EMAIL`';
		}
		if ($this->isColumnModified(MembroPeer::BATIZADO)) {
			$modifiedColumns[':p' . $index++]  = '`BATIZADO`';
		}
		if ($this->isColumnModified(MembroPeer::DATA_MEMBRO)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_MEMBRO`';
		}
		if ($this->isColumnModified(MembroPeer::IGREJA_ORIGEM)) {
			$modifiedColumns[':p' . $index++]  = '`IGREJA_ORIGEM`';
		}
		if ($this->isColumnModified(MembroPeer::PASTOR_IGREJA_ORIGEM)) {
			$modifiedColumns[':p' . $index++]  = '`PASTOR_IGREJA_ORIGEM`';
		}
		if ($this->isColumnModified(MembroPeer::TELEFONE_IGREJA_ORIGEM)) {
			$modifiedColumns[':p' . $index++]  = '`TELEFONE_IGREJA_ORIGEM`';
		}
		if ($this->isColumnModified(MembroPeer::POSSUI_MINISTERIO)) {
			$modifiedColumns[':p' . $index++]  = '`POSSUI_MINISTERIO`';
		}
		if ($this->isColumnModified(MembroPeer::NOME_ANTIGO_MINISTERIO)) {
			$modifiedColumns[':p' . $index++]  = '`NOME_ANTIGO_MINISTERIO`';
		}
		if ($this->isColumnModified(MembroPeer::PARTICIPA_PG)) {
			$modifiedColumns[':p' . $index++]  = '`PARTICIPA_PG`';
		}
		if ($this->isColumnModified(MembroPeer::NOME_PG)) {
			$modifiedColumns[':p' . $index++]  = '`NOME_PG`';
		}
		if ($this->isColumnModified(MembroPeer::CARGO_IGREJA)) {
			$modifiedColumns[':p' . $index++]  = '`CARGO_IGREJA`';
		}
		if ($this->isColumnModified(MembroPeer::EXPERIENCIA_OUTRAS_IGREJAS)) {
			$modifiedColumns[':p' . $index++]  = '`EXPERIENCIA_OUTRAS_IGREJAS`';
		}
		if ($this->isColumnModified(MembroPeer::INTERESSE_MINISTERIOS)) {
			$modifiedColumns[':p' . $index++]  = '`INTERESSE_MINISTERIOS`';
		}
		if ($this->isColumnModified(MembroPeer::DATA_CADASTRO)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_CADASTRO`';
		}
		if ($this->isColumnModified(MembroPeer::DATA_NASCIMENTO)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_NASCIMENTO`';
		}
		if ($this->isColumnModified(MembroPeer::PROFISSAO)) {
			$modifiedColumns[':p' . $index++]  = '`PROFISSAO`';
		}
		if ($this->isColumnModified(MembroPeer::ATIVO)) {
			$modifiedColumns[':p' . $index++]  = '`ATIVO`';
		}
		if ($this->isColumnModified(MembroPeer::CADASTRO_APROVADO)) {
			$modifiedColumns[':p' . $index++]  = '`CADASTRO_APROVADO`';
		}

		$sql = sprintf(
			'INSERT INTO `membro` (%s) VALUES (%s)',
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
					case '`FILIAL_ID`':						
						$stmt->bindValue($identifier, $this->filial_id, PDO::PARAM_INT);
						break;
					case '`CRIADOR_ID`':						
						$stmt->bindValue($identifier, $this->criador_id, PDO::PARAM_INT);
						break;
					case '`MEMBRO_USUARIO_ID`':						
						$stmt->bindValue($identifier, $this->membro_usuario_id, PDO::PARAM_INT);
						break;
					case '`USUARIO_APROVADOR_ID`':						
						$stmt->bindValue($identifier, $this->usuario_aprovador_id, PDO::PARAM_INT);
						break;
					case '`ENDERECO_ID`':						
						$stmt->bindValue($identifier, $this->endereco_id, PDO::PARAM_INT);
						break;
					case '`CIDADE_NATURALIDADE_ID`':						
						$stmt->bindValue($identifier, $this->cidade_naturalidade_id, PDO::PARAM_INT);
						break;
					case '`NOME_COMPLETO`':						
						$stmt->bindValue($identifier, $this->nome_completo, PDO::PARAM_STR);
						break;
					case '`SEXO`':						
						$stmt->bindValue($identifier, $this->sexo, PDO::PARAM_STR);
						break;
					case '`RG`':						
						$stmt->bindValue($identifier, $this->rg, PDO::PARAM_STR);
						break;
					case '`RG_EXPEDIDOR`':						
						$stmt->bindValue($identifier, $this->rg_expedidor, PDO::PARAM_STR);
						break;
					case '`CPF`':						
						$stmt->bindValue($identifier, $this->cpf, PDO::PARAM_STR);
						break;
					case '`ESTADO_CIVIL`':						
						$stmt->bindValue($identifier, $this->estado_civil, PDO::PARAM_STR);
						break;
					case '`NOME_CONJUNGE`':						
						$stmt->bindValue($identifier, $this->nome_conjunge, PDO::PARAM_STR);
						break;
					case '`CRISTAO`':
						$stmt->bindValue($identifier, (int) $this->cristao, PDO::PARAM_INT);
						break;
					case '`NOME_PAI`':						
						$stmt->bindValue($identifier, $this->nome_pai, PDO::PARAM_STR);
						break;
					case '`NOME_MAE`':						
						$stmt->bindValue($identifier, $this->nome_mae, PDO::PARAM_STR);
						break;
					case '`TELEFONE_RESIDENCIAL`':						
						$stmt->bindValue($identifier, $this->telefone_residencial, PDO::PARAM_STR);
						break;
					case '`TELEFONE_CELULAR`':						
						$stmt->bindValue($identifier, $this->telefone_celular, PDO::PARAM_STR);
						break;
					case '`EMAIL`':						
						$stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
						break;
					case '`BATIZADO`':
						$stmt->bindValue($identifier, (int) $this->batizado, PDO::PARAM_INT);
						break;
					case '`DATA_MEMBRO`':						
						$stmt->bindValue($identifier, $this->data_membro, PDO::PARAM_STR);
						break;
					case '`IGREJA_ORIGEM`':						
						$stmt->bindValue($identifier, $this->igreja_origem, PDO::PARAM_STR);
						break;
					case '`PASTOR_IGREJA_ORIGEM`':						
						$stmt->bindValue($identifier, $this->pastor_igreja_origem, PDO::PARAM_STR);
						break;
					case '`TELEFONE_IGREJA_ORIGEM`':						
						$stmt->bindValue($identifier, $this->telefone_igreja_origem, PDO::PARAM_STR);
						break;
					case '`POSSUI_MINISTERIO`':
						$stmt->bindValue($identifier, (int) $this->possui_ministerio, PDO::PARAM_INT);
						break;
					case '`NOME_ANTIGO_MINISTERIO`':						
						$stmt->bindValue($identifier, $this->nome_antigo_ministerio, PDO::PARAM_STR);
						break;
					case '`PARTICIPA_PG`':
						$stmt->bindValue($identifier, (int) $this->participa_pg, PDO::PARAM_INT);
						break;
					case '`NOME_PG`':						
						$stmt->bindValue($identifier, $this->nome_pg, PDO::PARAM_STR);
						break;
					case '`CARGO_IGREJA`':						
						$stmt->bindValue($identifier, $this->cargo_igreja, PDO::PARAM_STR);
						break;
					case '`EXPERIENCIA_OUTRAS_IGREJAS`':						
						$stmt->bindValue($identifier, $this->experiencia_outras_igrejas, PDO::PARAM_STR);
						break;
					case '`INTERESSE_MINISTERIOS`':						
						$stmt->bindValue($identifier, $this->interesse_ministerios, PDO::PARAM_STR);
						break;
					case '`DATA_CADASTRO`':						
						$stmt->bindValue($identifier, $this->data_cadastro, PDO::PARAM_STR);
						break;
					case '`DATA_NASCIMENTO`':						
						$stmt->bindValue($identifier, $this->data_nascimento, PDO::PARAM_STR);
						break;
					case '`PROFISSAO`':						
						$stmt->bindValue($identifier, $this->profissao, PDO::PARAM_STR);
						break;
					case '`ATIVO`':
						$stmt->bindValue($identifier, (int) $this->ativo, PDO::PARAM_INT);
						break;
					case '`CADASTRO_APROVADO`':
						$stmt->bindValue($identifier, (int) $this->cadastro_aprovado, PDO::PARAM_INT);
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
		$pos = MembroPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFilialId();
				break;
			case 3:
				return $this->getCriadorId();
				break;
			case 4:
				return $this->getMembroUsuarioId();
				break;
			case 5:
				return $this->getUsuarioAprovadorId();
				break;
			case 6:
				return $this->getEnderecoId();
				break;
			case 7:
				return $this->getCidadeNaturalidadeId();
				break;
			case 8:
				return $this->getNomeCompleto();
				break;
			case 9:
				return $this->getSexo();
				break;
			case 10:
				return $this->getRg();
				break;
			case 11:
				return $this->getRgExpedidor();
				break;
			case 12:
				return $this->getCpf();
				break;
			case 13:
				return $this->getEstadoCivil();
				break;
			case 14:
				return $this->getNomeConjunge();
				break;
			case 15:
				return $this->getCristao();
				break;
			case 16:
				return $this->getNomePai();
				break;
			case 17:
				return $this->getNomeMae();
				break;
			case 18:
				return $this->getTelefoneResidencial();
				break;
			case 19:
				return $this->getTelefoneCelular();
				break;
			case 20:
				return $this->getEmail();
				break;
			case 21:
				return $this->getBatizado();
				break;
			case 22:
				return $this->getDataMembro();
				break;
			case 23:
				return $this->getIgrejaOrigem();
				break;
			case 24:
				return $this->getPastorIgrejaOrigem();
				break;
			case 25:
				return $this->getTelefoneIgrejaOrigem();
				break;
			case 26:
				return $this->getPossuiMinisterio();
				break;
			case 27:
				return $this->getNomeAntigoMinisterio();
				break;
			case 28:
				return $this->getParticipaPg();
				break;
			case 29:
				return $this->getNomePg();
				break;
			case 30:
				return $this->getCargoIgreja();
				break;
			case 31:
				return $this->getExperienciaOutrasIgrejas();
				break;
			case 32:
				return $this->getInteresseMinisterios();
				break;
			case 33:
				return $this->getDataCadastro();
				break;
			case 34:
				return $this->getDataNascimento();
				break;
			case 35:
				return $this->getProfissao();
				break;
			case 36:
				return $this->getAtivo();
				break;
			case 37:
				return $this->getCadastroAprovado();
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
		if (isset($alreadyDumpedObjects['Membro'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Membro'][$this->getPrimaryKey()] = true;
		$keys = MembroPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getInstituicaoId(),
			$keys[2] => $this->getFilialId(),
			$keys[3] => $this->getCriadorId(),
			$keys[4] => $this->getMembroUsuarioId(),
			$keys[5] => $this->getUsuarioAprovadorId(),
			$keys[6] => $this->getEnderecoId(),
			$keys[7] => $this->getCidadeNaturalidadeId(),
			$keys[8] => $this->getNomeCompleto(),
			$keys[9] => $this->getSexo(),
			$keys[10] => $this->getRg(),
			$keys[11] => $this->getRgExpedidor(),
			$keys[12] => $this->getCpf(),
			$keys[13] => $this->getEstadoCivil(),
			$keys[14] => $this->getNomeConjunge(),
			$keys[15] => $this->getCristao(),
			$keys[16] => $this->getNomePai(),
			$keys[17] => $this->getNomeMae(),
			$keys[18] => $this->getTelefoneResidencial(),
			$keys[19] => $this->getTelefoneCelular(),
			$keys[20] => $this->getEmail(),
			$keys[21] => $this->getBatizado(),
			$keys[22] => $this->getDataMembro(),
			$keys[23] => $this->getIgrejaOrigem(),
			$keys[24] => $this->getPastorIgrejaOrigem(),
			$keys[25] => $this->getTelefoneIgrejaOrigem(),
			$keys[26] => $this->getPossuiMinisterio(),
			$keys[27] => $this->getNomeAntigoMinisterio(),
			$keys[28] => $this->getParticipaPg(),
			$keys[29] => $this->getNomePg(),
			$keys[30] => $this->getCargoIgreja(),
			$keys[31] => $this->getExperienciaOutrasIgrejas(),
			$keys[32] => $this->getInteresseMinisterios(),
			$keys[33] => $this->getDataCadastro(),
			$keys[34] => $this->getDataNascimento(),
			$keys[35] => $this->getProfissao(),
			$keys[36] => $this->getAtivo(),
			$keys[37] => $this->getCadastroAprovado(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aCidade) {
				$result['Cidade'] = $this->aCidade->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aEndereco) {
				$result['Endereco'] = $this->aEndereco->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aIgrejaRelatedByFilialId) {
				$result['IgrejaRelatedByFilialId'] = $this->aIgrejaRelatedByFilialId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aIgrejaRelatedByInstituicaoId) {
				$result['IgrejaRelatedByInstituicaoId'] = $this->aIgrejaRelatedByInstituicaoId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aUsuarioRelatedByCriadorId) {
				$result['UsuarioRelatedByCriadorId'] = $this->aUsuarioRelatedByCriadorId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aUsuarioRelatedByMembroUsuarioId) {
				$result['UsuarioRelatedByMembroUsuarioId'] = $this->aUsuarioRelatedByMembroUsuarioId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aUsuarioRelatedByUsuarioAprovadorId) {
				$result['UsuarioRelatedByUsuarioAprovadorId'] = $this->aUsuarioRelatedByUsuarioAprovadorId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collFilhoMembros) {
				$result['FilhoMembros'] = $this->collFilhoMembros->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collUsuariosRelatedByMembroId) {
				$result['UsuariosRelatedByMembroId'] = $this->collUsuariosRelatedByMembroId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = MembroPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFilialId($value);
				break;
			case 3:
				$this->setCriadorId($value);
				break;
			case 4:
				$this->setMembroUsuarioId($value);
				break;
			case 5:
				$this->setUsuarioAprovadorId($value);
				break;
			case 6:
				$this->setEnderecoId($value);
				break;
			case 7:
				$this->setCidadeNaturalidadeId($value);
				break;
			case 8:
				$this->setNomeCompleto($value);
				break;
			case 9:
				$this->setSexo($value);
				break;
			case 10:
				$this->setRg($value);
				break;
			case 11:
				$this->setRgExpedidor($value);
				break;
			case 12:
				$this->setCpf($value);
				break;
			case 13:
				$this->setEstadoCivil($value);
				break;
			case 14:
				$this->setNomeConjunge($value);
				break;
			case 15:
				$this->setCristao($value);
				break;
			case 16:
				$this->setNomePai($value);
				break;
			case 17:
				$this->setNomeMae($value);
				break;
			case 18:
				$this->setTelefoneResidencial($value);
				break;
			case 19:
				$this->setTelefoneCelular($value);
				break;
			case 20:
				$this->setEmail($value);
				break;
			case 21:
				$this->setBatizado($value);
				break;
			case 22:
				$this->setDataMembro($value);
				break;
			case 23:
				$this->setIgrejaOrigem($value);
				break;
			case 24:
				$this->setPastorIgrejaOrigem($value);
				break;
			case 25:
				$this->setTelefoneIgrejaOrigem($value);
				break;
			case 26:
				$this->setPossuiMinisterio($value);
				break;
			case 27:
				$this->setNomeAntigoMinisterio($value);
				break;
			case 28:
				$this->setParticipaPg($value);
				break;
			case 29:
				$this->setNomePg($value);
				break;
			case 30:
				$this->setCargoIgreja($value);
				break;
			case 31:
				$this->setExperienciaOutrasIgrejas($value);
				break;
			case 32:
				$this->setInteresseMinisterios($value);
				break;
			case 33:
				$this->setDataCadastro($value);
				break;
			case 34:
				$this->setDataNascimento($value);
				break;
			case 35:
				$this->setProfissao($value);
				break;
			case 36:
				$this->setAtivo($value);
				break;
			case 37:
				$this->setCadastroAprovado($value);
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
		$keys = MembroPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setInstituicaoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFilialId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCriadorId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setMembroUsuarioId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUsuarioAprovadorId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEnderecoId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCidadeNaturalidadeId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNomeCompleto($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setSexo($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setRg($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setRgExpedidor($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCpf($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setEstadoCivil($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setNomeConjunge($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setCristao($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setNomePai($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setNomeMae($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setTelefoneResidencial($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setTelefoneCelular($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setEmail($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setBatizado($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setDataMembro($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setIgrejaOrigem($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setPastorIgrejaOrigem($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setTelefoneIgrejaOrigem($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setPossuiMinisterio($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setNomeAntigoMinisterio($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setParticipaPg($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setNomePg($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setCargoIgreja($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setExperienciaOutrasIgrejas($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setInteresseMinisterios($arr[$keys[32]]);
		if (array_key_exists($keys[33], $arr)) $this->setDataCadastro($arr[$keys[33]]);
		if (array_key_exists($keys[34], $arr)) $this->setDataNascimento($arr[$keys[34]]);
		if (array_key_exists($keys[35], $arr)) $this->setProfissao($arr[$keys[35]]);
		if (array_key_exists($keys[36], $arr)) $this->setAtivo($arr[$keys[36]]);
		if (array_key_exists($keys[37], $arr)) $this->setCadastroAprovado($arr[$keys[37]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(MembroPeer::DATABASE_NAME);

		if ($this->isColumnModified(MembroPeer::ID)) $criteria->add(MembroPeer::ID, $this->id);
		if ($this->isColumnModified(MembroPeer::INSTITUICAO_ID)) $criteria->add(MembroPeer::INSTITUICAO_ID, $this->instituicao_id);
		if ($this->isColumnModified(MembroPeer::FILIAL_ID)) $criteria->add(MembroPeer::FILIAL_ID, $this->filial_id);
		if ($this->isColumnModified(MembroPeer::CRIADOR_ID)) $criteria->add(MembroPeer::CRIADOR_ID, $this->criador_id);
		if ($this->isColumnModified(MembroPeer::MEMBRO_USUARIO_ID)) $criteria->add(MembroPeer::MEMBRO_USUARIO_ID, $this->membro_usuario_id);
		if ($this->isColumnModified(MembroPeer::USUARIO_APROVADOR_ID)) $criteria->add(MembroPeer::USUARIO_APROVADOR_ID, $this->usuario_aprovador_id);
		if ($this->isColumnModified(MembroPeer::ENDERECO_ID)) $criteria->add(MembroPeer::ENDERECO_ID, $this->endereco_id);
		if ($this->isColumnModified(MembroPeer::CIDADE_NATURALIDADE_ID)) $criteria->add(MembroPeer::CIDADE_NATURALIDADE_ID, $this->cidade_naturalidade_id);
		if ($this->isColumnModified(MembroPeer::NOME_COMPLETO)) $criteria->add(MembroPeer::NOME_COMPLETO, $this->nome_completo);
		if ($this->isColumnModified(MembroPeer::SEXO)) $criteria->add(MembroPeer::SEXO, $this->sexo);
		if ($this->isColumnModified(MembroPeer::RG)) $criteria->add(MembroPeer::RG, $this->rg);
		if ($this->isColumnModified(MembroPeer::RG_EXPEDIDOR)) $criteria->add(MembroPeer::RG_EXPEDIDOR, $this->rg_expedidor);
		if ($this->isColumnModified(MembroPeer::CPF)) $criteria->add(MembroPeer::CPF, $this->cpf);
		if ($this->isColumnModified(MembroPeer::ESTADO_CIVIL)) $criteria->add(MembroPeer::ESTADO_CIVIL, $this->estado_civil);
		if ($this->isColumnModified(MembroPeer::NOME_CONJUNGE)) $criteria->add(MembroPeer::NOME_CONJUNGE, $this->nome_conjunge);
		if ($this->isColumnModified(MembroPeer::CRISTAO)) $criteria->add(MembroPeer::CRISTAO, $this->cristao);
		if ($this->isColumnModified(MembroPeer::NOME_PAI)) $criteria->add(MembroPeer::NOME_PAI, $this->nome_pai);
		if ($this->isColumnModified(MembroPeer::NOME_MAE)) $criteria->add(MembroPeer::NOME_MAE, $this->nome_mae);
		if ($this->isColumnModified(MembroPeer::TELEFONE_RESIDENCIAL)) $criteria->add(MembroPeer::TELEFONE_RESIDENCIAL, $this->telefone_residencial);
		if ($this->isColumnModified(MembroPeer::TELEFONE_CELULAR)) $criteria->add(MembroPeer::TELEFONE_CELULAR, $this->telefone_celular);
		if ($this->isColumnModified(MembroPeer::EMAIL)) $criteria->add(MembroPeer::EMAIL, $this->email);
		if ($this->isColumnModified(MembroPeer::BATIZADO)) $criteria->add(MembroPeer::BATIZADO, $this->batizado);
		if ($this->isColumnModified(MembroPeer::DATA_MEMBRO)) $criteria->add(MembroPeer::DATA_MEMBRO, $this->data_membro);
		if ($this->isColumnModified(MembroPeer::IGREJA_ORIGEM)) $criteria->add(MembroPeer::IGREJA_ORIGEM, $this->igreja_origem);
		if ($this->isColumnModified(MembroPeer::PASTOR_IGREJA_ORIGEM)) $criteria->add(MembroPeer::PASTOR_IGREJA_ORIGEM, $this->pastor_igreja_origem);
		if ($this->isColumnModified(MembroPeer::TELEFONE_IGREJA_ORIGEM)) $criteria->add(MembroPeer::TELEFONE_IGREJA_ORIGEM, $this->telefone_igreja_origem);
		if ($this->isColumnModified(MembroPeer::POSSUI_MINISTERIO)) $criteria->add(MembroPeer::POSSUI_MINISTERIO, $this->possui_ministerio);
		if ($this->isColumnModified(MembroPeer::NOME_ANTIGO_MINISTERIO)) $criteria->add(MembroPeer::NOME_ANTIGO_MINISTERIO, $this->nome_antigo_ministerio);
		if ($this->isColumnModified(MembroPeer::PARTICIPA_PG)) $criteria->add(MembroPeer::PARTICIPA_PG, $this->participa_pg);
		if ($this->isColumnModified(MembroPeer::NOME_PG)) $criteria->add(MembroPeer::NOME_PG, $this->nome_pg);
		if ($this->isColumnModified(MembroPeer::CARGO_IGREJA)) $criteria->add(MembroPeer::CARGO_IGREJA, $this->cargo_igreja);
		if ($this->isColumnModified(MembroPeer::EXPERIENCIA_OUTRAS_IGREJAS)) $criteria->add(MembroPeer::EXPERIENCIA_OUTRAS_IGREJAS, $this->experiencia_outras_igrejas);
		if ($this->isColumnModified(MembroPeer::INTERESSE_MINISTERIOS)) $criteria->add(MembroPeer::INTERESSE_MINISTERIOS, $this->interesse_ministerios);
		if ($this->isColumnModified(MembroPeer::DATA_CADASTRO)) $criteria->add(MembroPeer::DATA_CADASTRO, $this->data_cadastro);
		if ($this->isColumnModified(MembroPeer::DATA_NASCIMENTO)) $criteria->add(MembroPeer::DATA_NASCIMENTO, $this->data_nascimento);
		if ($this->isColumnModified(MembroPeer::PROFISSAO)) $criteria->add(MembroPeer::PROFISSAO, $this->profissao);
		if ($this->isColumnModified(MembroPeer::ATIVO)) $criteria->add(MembroPeer::ATIVO, $this->ativo);
		if ($this->isColumnModified(MembroPeer::CADASTRO_APROVADO)) $criteria->add(MembroPeer::CADASTRO_APROVADO, $this->cadastro_aprovado);

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
		$criteria = new Criteria(MembroPeer::DATABASE_NAME);
		$criteria->add(MembroPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Membro (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setInstituicaoId($this->getInstituicaoId());
		$copyObj->setFilialId($this->getFilialId());
		$copyObj->setCriadorId($this->getCriadorId());
		$copyObj->setMembroUsuarioId($this->getMembroUsuarioId());
		$copyObj->setUsuarioAprovadorId($this->getUsuarioAprovadorId());
		$copyObj->setEnderecoId($this->getEnderecoId());
		$copyObj->setCidadeNaturalidadeId($this->getCidadeNaturalidadeId());
		$copyObj->setNomeCompleto($this->getNomeCompleto());
		$copyObj->setSexo($this->getSexo());
		$copyObj->setRg($this->getRg());
		$copyObj->setRgExpedidor($this->getRgExpedidor());
		$copyObj->setCpf($this->getCpf());
		$copyObj->setEstadoCivil($this->getEstadoCivil());
		$copyObj->setNomeConjunge($this->getNomeConjunge());
		$copyObj->setCristao($this->getCristao());
		$copyObj->setNomePai($this->getNomePai());
		$copyObj->setNomeMae($this->getNomeMae());
		$copyObj->setTelefoneResidencial($this->getTelefoneResidencial());
		$copyObj->setTelefoneCelular($this->getTelefoneCelular());
		$copyObj->setEmail($this->getEmail());
		$copyObj->setBatizado($this->getBatizado());
		$copyObj->setDataMembro($this->getDataMembro());
		$copyObj->setIgrejaOrigem($this->getIgrejaOrigem());
		$copyObj->setPastorIgrejaOrigem($this->getPastorIgrejaOrigem());
		$copyObj->setTelefoneIgrejaOrigem($this->getTelefoneIgrejaOrigem());
		$copyObj->setPossuiMinisterio($this->getPossuiMinisterio());
		$copyObj->setNomeAntigoMinisterio($this->getNomeAntigoMinisterio());
		$copyObj->setParticipaPg($this->getParticipaPg());
		$copyObj->setNomePg($this->getNomePg());
		$copyObj->setCargoIgreja($this->getCargoIgreja());
		$copyObj->setExperienciaOutrasIgrejas($this->getExperienciaOutrasIgrejas());
		$copyObj->setInteresseMinisterios($this->getInteresseMinisterios());
		$copyObj->setDataCadastro($this->getDataCadastro());
		$copyObj->setDataNascimento($this->getDataNascimento());
		$copyObj->setProfissao($this->getProfissao());
		$copyObj->setAtivo($this->getAtivo());
		$copyObj->setCadastroAprovado($this->getCadastroAprovado());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getFilhoMembros() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addFilhoMembro($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getUsuariosRelatedByMembroId() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addUsuarioRelatedByMembroId($relObj->copy($deepCopy));
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
	 * @return     Membro Clone of current object.
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
	 * @return     MembroPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new MembroPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Cidade object.
	 *
	 * @param      Cidade $v
	 * @return     Membro The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCidade(Cidade $v = null)
	{
		if ($v === null) {
			$this->setCidadeNaturalidadeId(NULL);
		} else {
			$this->setCidadeNaturalidadeId($v->getId());
		}

		$this->aCidade = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Cidade object, it will not be re-added.
		if ($v !== null) {
			$v->addMembro($this);
		}

		return $this;
	}


	/**
	 * Get the associated Cidade object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Cidade The associated Cidade object.
	 * @throws     PropelException
	 */
	public function getCidade(PropelPDO $con = null)
	{
		if ($this->aCidade === null && ($this->cidade_naturalidade_id !== null)) {
			$this->aCidade = CidadeQuery::create()->findPk($this->cidade_naturalidade_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aCidade->addMembros($this);
			 */
		}
		return $this->aCidade;
	}

	/**
	 * Declares an association between this object and a Endereco object.
	 *
	 * @param      Endereco $v
	 * @return     Membro The current object (for fluent API support)
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
			$v->addMembro($this);
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
				$this->aEndereco->addMembros($this);
			 */
		}
		return $this->aEndereco;
	}

	/**
	 * Declares an association between this object and a Igreja object.
	 *
	 * @param      Igreja $v
	 * @return     Membro The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setIgrejaRelatedByFilialId(Igreja $v = null)
	{
		if ($v === null) {
			$this->setFilialId(NULL);
		} else {
			$this->setFilialId($v->getId());
		}

		$this->aIgrejaRelatedByFilialId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Igreja object, it will not be re-added.
		if ($v !== null) {
			$v->addMembroRelatedByFilialId($this);
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
	public function getIgrejaRelatedByFilialId(PropelPDO $con = null)
	{
		if ($this->aIgrejaRelatedByFilialId === null && ($this->filial_id !== null)) {
			$this->aIgrejaRelatedByFilialId = IgrejaQuery::create()->findPk($this->filial_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aIgrejaRelatedByFilialId->addMembrosRelatedByFilialId($this);
			 */
		}
		return $this->aIgrejaRelatedByFilialId;
	}

	/**
	 * Declares an association between this object and a Igreja object.
	 *
	 * @param      Igreja $v
	 * @return     Membro The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setIgrejaRelatedByInstituicaoId(Igreja $v = null)
	{
		if ($v === null) {
			$this->setInstituicaoId(NULL);
		} else {
			$this->setInstituicaoId($v->getId());
		}

		$this->aIgrejaRelatedByInstituicaoId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Igreja object, it will not be re-added.
		if ($v !== null) {
			$v->addMembroRelatedByInstituicaoId($this);
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
	public function getIgrejaRelatedByInstituicaoId(PropelPDO $con = null)
	{
		if ($this->aIgrejaRelatedByInstituicaoId === null && ($this->instituicao_id !== null)) {
			$this->aIgrejaRelatedByInstituicaoId = IgrejaQuery::create()->findPk($this->instituicao_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aIgrejaRelatedByInstituicaoId->addMembrosRelatedByInstituicaoId($this);
			 */
		}
		return $this->aIgrejaRelatedByInstituicaoId;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     Membro The current object (for fluent API support)
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
			$v->addMembroRelatedByCriadorId($this);
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
				$this->aUsuarioRelatedByCriadorId->addMembrosRelatedByCriadorId($this);
			 */
		}
		return $this->aUsuarioRelatedByCriadorId;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     Membro The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUsuarioRelatedByMembroUsuarioId(Usuario $v = null)
	{
		if ($v === null) {
			$this->setMembroUsuarioId(NULL);
		} else {
			$this->setMembroUsuarioId($v->getId());
		}

		$this->aUsuarioRelatedByMembroUsuarioId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Usuario object, it will not be re-added.
		if ($v !== null) {
			$v->addMembroRelatedByMembroUsuarioId($this);
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
	public function getUsuarioRelatedByMembroUsuarioId(PropelPDO $con = null)
	{
		if ($this->aUsuarioRelatedByMembroUsuarioId === null && ($this->membro_usuario_id !== null)) {
			$this->aUsuarioRelatedByMembroUsuarioId = UsuarioQuery::create()->findPk($this->membro_usuario_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aUsuarioRelatedByMembroUsuarioId->addMembrosRelatedByMembroUsuarioId($this);
			 */
		}
		return $this->aUsuarioRelatedByMembroUsuarioId;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     Membro The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUsuarioRelatedByUsuarioAprovadorId(Usuario $v = null)
	{
		if ($v === null) {
			$this->setUsuarioAprovadorId(NULL);
		} else {
			$this->setUsuarioAprovadorId($v->getId());
		}

		$this->aUsuarioRelatedByUsuarioAprovadorId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Usuario object, it will not be re-added.
		if ($v !== null) {
			$v->addMembroRelatedByUsuarioAprovadorId($this);
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
	public function getUsuarioRelatedByUsuarioAprovadorId(PropelPDO $con = null)
	{
		if ($this->aUsuarioRelatedByUsuarioAprovadorId === null && ($this->usuario_aprovador_id !== null)) {
			$this->aUsuarioRelatedByUsuarioAprovadorId = UsuarioQuery::create()->findPk($this->usuario_aprovador_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aUsuarioRelatedByUsuarioAprovadorId->addMembrosRelatedByUsuarioAprovadorId($this);
			 */
		}
		return $this->aUsuarioRelatedByUsuarioAprovadorId;
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
		if ('FilhoMembro' == $relationName) {
			return $this->initFilhoMembros();
		}
		if ('UsuarioRelatedByMembroId' == $relationName) {
			return $this->initUsuariosRelatedByMembroId();
		}
	}

	/**
	 * Clears out the collFilhoMembros collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addFilhoMembros()
	 */
	public function clearFilhoMembros()
	{
		$this->collFilhoMembros = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collFilhoMembros collection.
	 *
	 * By default this just sets the collFilhoMembros collection to an empty array (like clearcollFilhoMembros());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initFilhoMembros($overrideExisting = true)
	{
		if (null !== $this->collFilhoMembros && !$overrideExisting) {
			return;
		}
		$this->collFilhoMembros = new PropelObjectCollection();
		$this->collFilhoMembros->setModel('FilhoMembro');
	}

	/**
	 * Gets an array of FilhoMembro objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Membro is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array FilhoMembro[] List of FilhoMembro objects
	 * @throws     PropelException
	 */
	public function getFilhoMembros($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collFilhoMembros || null !== $criteria) {
			if ($this->isNew() && null === $this->collFilhoMembros) {
				// return empty collection
				$this->initFilhoMembros();
			} else {
				$collFilhoMembros = FilhoMembroQuery::create(null, $criteria)
					->filterByMembro($this)
					->find($con);
				if (null !== $criteria) {
					return $collFilhoMembros;
				}
				$this->collFilhoMembros = $collFilhoMembros;
			}
		}
		return $this->collFilhoMembros;
	}

	/**
	 * Sets a collection of FilhoMembro objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $filhoMembros A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setFilhoMembros(PropelCollection $filhoMembros, PropelPDO $con = null)
	{
		$this->filhoMembrosScheduledForDeletion = $this->getFilhoMembros(new Criteria(), $con)->diff($filhoMembros);

		foreach ($filhoMembros as $filhoMembro) {
			// Fix issue with collection modified by reference
			if ($filhoMembro->isNew()) {
				$filhoMembro->setMembro($this);
			}
			$this->addFilhoMembro($filhoMembro);
		}

		$this->collFilhoMembros = $filhoMembros;
	}

	/**
	 * Returns the number of related FilhoMembro objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related FilhoMembro objects.
	 * @throws     PropelException
	 */
	public function countFilhoMembros(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collFilhoMembros || null !== $criteria) {
			if ($this->isNew() && null === $this->collFilhoMembros) {
				return 0;
			} else {
				$query = FilhoMembroQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByMembro($this)
					->count($con);
			}
		} else {
			return count($this->collFilhoMembros);
		}
	}

	/**
	 * Method called to associate a FilhoMembro object to this object
	 * through the FilhoMembro foreign key attribute.
	 *
	 * @param      FilhoMembro $l FilhoMembro
	 * @return     Membro The current object (for fluent API support)
	 */
	public function addFilhoMembro(FilhoMembro $l)
	{
		if ($this->collFilhoMembros === null) {
			$this->initFilhoMembros();
		}
		if (!$this->collFilhoMembros->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddFilhoMembro($l);
		}

		return $this;
	}

	/**
	 * @param	FilhoMembro $filhoMembro The filhoMembro object to add.
	 */
	protected function doAddFilhoMembro($filhoMembro)
	{
		$this->collFilhoMembros[]= $filhoMembro;
		$filhoMembro->setMembro($this);
	}

	/**
	 * Clears out the collUsuariosRelatedByMembroId collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addUsuariosRelatedByMembroId()
	 */
	public function clearUsuariosRelatedByMembroId()
	{
		$this->collUsuariosRelatedByMembroId = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collUsuariosRelatedByMembroId collection.
	 *
	 * By default this just sets the collUsuariosRelatedByMembroId collection to an empty array (like clearcollUsuariosRelatedByMembroId());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initUsuariosRelatedByMembroId($overrideExisting = true)
	{
		if (null !== $this->collUsuariosRelatedByMembroId && !$overrideExisting) {
			return;
		}
		$this->collUsuariosRelatedByMembroId = new PropelObjectCollection();
		$this->collUsuariosRelatedByMembroId->setModel('Usuario');
	}

	/**
	 * Gets an array of Usuario objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Membro is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Usuario[] List of Usuario objects
	 * @throws     PropelException
	 */
	public function getUsuariosRelatedByMembroId($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collUsuariosRelatedByMembroId || null !== $criteria) {
			if ($this->isNew() && null === $this->collUsuariosRelatedByMembroId) {
				// return empty collection
				$this->initUsuariosRelatedByMembroId();
			} else {
				$collUsuariosRelatedByMembroId = UsuarioQuery::create(null, $criteria)
					->filterByMembroRelatedByMembroId($this)
					->find($con);
				if (null !== $criteria) {
					return $collUsuariosRelatedByMembroId;
				}
				$this->collUsuariosRelatedByMembroId = $collUsuariosRelatedByMembroId;
			}
		}
		return $this->collUsuariosRelatedByMembroId;
	}

	/**
	 * Sets a collection of UsuarioRelatedByMembroId objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $usuariosRelatedByMembroId A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setUsuariosRelatedByMembroId(PropelCollection $usuariosRelatedByMembroId, PropelPDO $con = null)
	{
		$this->usuariosRelatedByMembroIdScheduledForDeletion = $this->getUsuariosRelatedByMembroId(new Criteria(), $con)->diff($usuariosRelatedByMembroId);

		foreach ($usuariosRelatedByMembroId as $usuarioRelatedByMembroId) {
			// Fix issue with collection modified by reference
			if ($usuarioRelatedByMembroId->isNew()) {
				$usuarioRelatedByMembroId->setMembroRelatedByMembroId($this);
			}
			$this->addUsuarioRelatedByMembroId($usuarioRelatedByMembroId);
		}

		$this->collUsuariosRelatedByMembroId = $usuariosRelatedByMembroId;
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
	public function countUsuariosRelatedByMembroId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collUsuariosRelatedByMembroId || null !== $criteria) {
			if ($this->isNew() && null === $this->collUsuariosRelatedByMembroId) {
				return 0;
			} else {
				$query = UsuarioQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByMembroRelatedByMembroId($this)
					->count($con);
			}
		} else {
			return count($this->collUsuariosRelatedByMembroId);
		}
	}

	/**
	 * Method called to associate a Usuario object to this object
	 * through the Usuario foreign key attribute.
	 *
	 * @param      Usuario $l Usuario
	 * @return     Membro The current object (for fluent API support)
	 */
	public function addUsuarioRelatedByMembroId(Usuario $l)
	{
		if ($this->collUsuariosRelatedByMembroId === null) {
			$this->initUsuariosRelatedByMembroId();
		}
		if (!$this->collUsuariosRelatedByMembroId->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddUsuarioRelatedByMembroId($l);
		}

		return $this;
	}

	/**
	 * @param	UsuarioRelatedByMembroId $usuarioRelatedByMembroId The usuarioRelatedByMembroId object to add.
	 */
	protected function doAddUsuarioRelatedByMembroId($usuarioRelatedByMembroId)
	{
		$this->collUsuariosRelatedByMembroId[]= $usuarioRelatedByMembroId;
		$usuarioRelatedByMembroId->setMembroRelatedByMembroId($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Membro is new, it will return
	 * an empty collection; or if this Membro has previously
	 * been saved, it will retrieve related UsuariosRelatedByMembroId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Membro.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Usuario[] List of Usuario objects
	 */
	public function getUsuariosRelatedByMembroIdJoinEndereco($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UsuarioQuery::create(null, $criteria);
		$query->joinWith('Endereco', $join_behavior);

		return $this->getUsuariosRelatedByMembroId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Membro is new, it will return
	 * an empty collection; or if this Membro has previously
	 * been saved, it will retrieve related UsuariosRelatedByMembroId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Membro.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Usuario[] List of Usuario objects
	 */
	public function getUsuariosRelatedByMembroIdJoinIgrejaRelatedByFilialId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UsuarioQuery::create(null, $criteria);
		$query->joinWith('IgrejaRelatedByFilialId', $join_behavior);

		return $this->getUsuariosRelatedByMembroId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Membro is new, it will return
	 * an empty collection; or if this Membro has previously
	 * been saved, it will retrieve related UsuariosRelatedByMembroId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Membro.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Usuario[] List of Usuario objects
	 */
	public function getUsuariosRelatedByMembroIdJoinIgrejaRelatedByInstituicaoId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UsuarioQuery::create(null, $criteria);
		$query->joinWith('IgrejaRelatedByInstituicaoId', $join_behavior);

		return $this->getUsuariosRelatedByMembroId($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Membro is new, it will return
	 * an empty collection; or if this Membro has previously
	 * been saved, it will retrieve related UsuariosRelatedByMembroId from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Membro.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Usuario[] List of Usuario objects
	 */
	public function getUsuariosRelatedByMembroIdJoinPerfil($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = UsuarioQuery::create(null, $criteria);
		$query->joinWith('Perfil', $join_behavior);

		return $this->getUsuariosRelatedByMembroId($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->instituicao_id = null;
		$this->filial_id = null;
		$this->criador_id = null;
		$this->membro_usuario_id = null;
		$this->usuario_aprovador_id = null;
		$this->endereco_id = null;
		$this->cidade_naturalidade_id = null;
		$this->nome_completo = null;
		$this->sexo = null;
		$this->rg = null;
		$this->rg_expedidor = null;
		$this->cpf = null;
		$this->estado_civil = null;
		$this->nome_conjunge = null;
		$this->cristao = null;
		$this->nome_pai = null;
		$this->nome_mae = null;
		$this->telefone_residencial = null;
		$this->telefone_celular = null;
		$this->email = null;
		$this->batizado = null;
		$this->data_membro = null;
		$this->igreja_origem = null;
		$this->pastor_igreja_origem = null;
		$this->telefone_igreja_origem = null;
		$this->possui_ministerio = null;
		$this->nome_antigo_ministerio = null;
		$this->participa_pg = null;
		$this->nome_pg = null;
		$this->cargo_igreja = null;
		$this->experiencia_outras_igrejas = null;
		$this->interesse_ministerios = null;
		$this->data_cadastro = null;
		$this->data_nascimento = null;
		$this->profissao = null;
		$this->ativo = null;
		$this->cadastro_aprovado = null;
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
			if ($this->collFilhoMembros) {
				foreach ($this->collFilhoMembros as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collUsuariosRelatedByMembroId) {
				foreach ($this->collUsuariosRelatedByMembroId as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collFilhoMembros instanceof PropelCollection) {
			$this->collFilhoMembros->clearIterator();
		}
		$this->collFilhoMembros = null;
		if ($this->collUsuariosRelatedByMembroId instanceof PropelCollection) {
			$this->collUsuariosRelatedByMembroId->clearIterator();
		}
		$this->collUsuariosRelatedByMembroId = null;
		$this->aCidade = null;
		$this->aEndereco = null;
		$this->aIgrejaRelatedByFilialId = null;
		$this->aIgrejaRelatedByInstituicaoId = null;
		$this->aUsuarioRelatedByCriadorId = null;
		$this->aUsuarioRelatedByMembroUsuarioId = null;
		$this->aUsuarioRelatedByUsuarioAprovadorId = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(MembroPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseMembro
