<?php


/**
 * Base class that represents a row from the 'cliente' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseCliente extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ClientePeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ClientePeer
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
	 * The value for the cpf field.
	 * @var        string
	 */
	protected $cpf;

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
	 * The value for the cadastro_valido field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $cadastro_valido;

	/**
	 * The value for the data_nascimento field.
	 * @var        string
	 */
	protected $data_nascimento;

	/**
	 * The value for the sexo field.
	 * @var        string
	 */
	protected $sexo;

	/**
	 * The value for the facebook field.
	 * @var        string
	 */
	protected $facebook;

	/**
	 * The value for the instagram field.
	 * @var        string
	 */
	protected $instagram;

	/**
	 * @var        Usuario
	 */
	protected $aUsuario;

	/**
	 * @var        array AdvogadoCliente[] Collection to store aggregation of AdvogadoCliente objects.
	 */
	protected $collAdvogadoClientes;

	/**
	 * @var        array Caso[] Collection to store aggregation of Caso objects.
	 */
	protected $collCasos;

	/**
	 * @var        array Contrato[] Collection to store aggregation of Contrato objects.
	 */
	protected $collContratos;

	/**
	 * @var        array Processo[] Collection to store aggregation of Processo objects.
	 */
	protected $collProcessos;

	/**
	 * @var        array Solicitacao[] Collection to store aggregation of Solicitacao objects.
	 */
	protected $collSolicitacaos;

	/**
	 * @var        array Advogado[] Collection to store aggregation of Advogado objects.
	 */
	protected $collAdvogados;

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
	protected $advogadosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $advogadoClientesScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $casosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $contratosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $processosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $solicitacaosScheduledForDeletion = null;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->cadastro_valido = false;
	}

	/**
	 * Initializes internal state of BaseCliente object.
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
	 * Get the [cpf] column value.
	 * 
	 * @return     string
	 */
	public function getCpf()
	{
		return $this->cpf;
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
	 * Get the [cadastro_valido] column value.
	 * 
	 * @return     boolean
	 */
	public function getCadastroValido()
	{
		return $this->cadastro_valido;
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
	 * Get the [sexo] column value.
	 * 
	 * @return     string
	 */
	public function getSexo()
	{
		return $this->sexo;
	}

	/**
	 * Get the [facebook] column value.
	 * 
	 * @return     string
	 */
	public function getFacebook()
	{
		return $this->facebook;
	}

	/**
	 * Get the [instagram] column value.
	 * 
	 * @return     string
	 */
	public function getInstagram()
	{
		return $this->instagram;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ClientePeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [usuario_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setUsuarioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->usuario_id !== $v) {
			$this->usuario_id = $v;
			$this->modifiedColumns[] = ClientePeer::USUARIO_ID;
		}

		if ($this->aUsuario !== null && $this->aUsuario->getId() !== $v) {
			$this->aUsuario = null;
		}

		return $this;
	} // setUsuarioId()

	/**
	 * Set the value of [nome] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setNome($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome !== $v) {
			$this->nome = $v;
			$this->modifiedColumns[] = ClientePeer::NOME;
		}

		return $this;
	} // setNome()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = ClientePeer::EMAIL;
		}

		return $this;
	} // setEmail()

	/**
	 * Set the value of [celular] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setCelular($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->celular !== $v) {
			$this->celular = $v;
			$this->modifiedColumns[] = ClientePeer::CELULAR;
		}

		return $this;
	} // setCelular()

	/**
	 * Set the value of [telefone] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setTelefone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->telefone !== $v) {
			$this->telefone = $v;
			$this->modifiedColumns[] = ClientePeer::TELEFONE;
		}

		return $this;
	} // setTelefone()

	/**
	 * Set the value of [cpf] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setCpf($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cpf !== $v) {
			$this->cpf = $v;
			$this->modifiedColumns[] = ClientePeer::CPF;
		}

		return $this;
	} // setCpf()

	/**
	 * Set the value of [rg] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setRg($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->rg !== $v) {
			$this->rg = $v;
			$this->modifiedColumns[] = ClientePeer::RG;
		}

		return $this;
	} // setRg()

	/**
	 * Set the value of [rg_expedidor] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setRgExpedidor($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->rg_expedidor !== $v) {
			$this->rg_expedidor = $v;
			$this->modifiedColumns[] = ClientePeer::RG_EXPEDIDOR;
		}

		return $this;
	} // setRgExpedidor()

	/**
	 * Sets the value of the [cadastro_valido] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setCadastroValido($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->cadastro_valido !== $v) {
			$this->cadastro_valido = $v;
			$this->modifiedColumns[] = ClientePeer::CADASTRO_VALIDO;
		}

		return $this;
	} // setCadastroValido()

	/**
	 * Sets the value of [data_nascimento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setDataNascimento($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_nascimento !== null || $dt !== null) {
			$currentDateAsString = ($this->data_nascimento !== null && $tmpDt = new DateTime($this->data_nascimento)) ? $tmpDt->format('Y-m-d') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_nascimento = $newDateAsString;
				$this->modifiedColumns[] = ClientePeer::DATA_NASCIMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataNascimento()

	/**
	 * Set the value of [sexo] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setSexo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->sexo !== $v) {
			$this->sexo = $v;
			$this->modifiedColumns[] = ClientePeer::SEXO;
		}

		return $this;
	} // setSexo()

	/**
	 * Set the value of [facebook] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setFacebook($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->facebook !== $v) {
			$this->facebook = $v;
			$this->modifiedColumns[] = ClientePeer::FACEBOOK;
		}

		return $this;
	} // setFacebook()

	/**
	 * Set the value of [instagram] column.
	 * 
	 * @param      string $v new value
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function setInstagram($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->instagram !== $v) {
			$this->instagram = $v;
			$this->modifiedColumns[] = ClientePeer::INSTAGRAM;
		}

		return $this;
	} // setInstagram()

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
			if ($this->cadastro_valido !== false) {
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
			$this->nome = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->email = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->celular = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->telefone = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->cpf = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->rg = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->rg_expedidor = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->cadastro_valido = ($row[$startcol + 9] !== null) ? (boolean) $row[$startcol + 9] : null;
			$this->data_nascimento = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->sexo = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->facebook = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->instagram = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 14; // 14 = ClientePeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Cliente object", $e);
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
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ClientePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aUsuario = null;
			$this->collAdvogadoClientes = null;

			$this->collCasos = null;

			$this->collContratos = null;

			$this->collProcessos = null;

			$this->collSolicitacaos = null;

			$this->collAdvogados = null;
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
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = ClienteQuery::create()
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
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ClientePeer::addInstanceToPool($this);
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

			if ($this->advogadosScheduledForDeletion !== null) {
				if (!$this->advogadosScheduledForDeletion->isEmpty()) {
					AdvogadoClienteQuery::create()
						->filterByPrimaryKeys($this->advogadosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->advogadosScheduledForDeletion = null;
				}

				foreach ($this->getAdvogados() as $advogado) {
					if ($advogado->isModified()) {
						$advogado->save($con);
					}
				}
			}

			if ($this->advogadoClientesScheduledForDeletion !== null) {
				if (!$this->advogadoClientesScheduledForDeletion->isEmpty()) {
					AdvogadoClienteQuery::create()
						->filterByPrimaryKeys($this->advogadoClientesScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->advogadoClientesScheduledForDeletion = null;
				}
			}

			if ($this->collAdvogadoClientes !== null) {
				foreach ($this->collAdvogadoClientes as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
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

			if ($this->contratosScheduledForDeletion !== null) {
				if (!$this->contratosScheduledForDeletion->isEmpty()) {
					ContratoQuery::create()
						->filterByPrimaryKeys($this->contratosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->contratosScheduledForDeletion = null;
				}
			}

			if ($this->collContratos !== null) {
				foreach ($this->collContratos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->processosScheduledForDeletion !== null) {
				if (!$this->processosScheduledForDeletion->isEmpty()) {
					ProcessoQuery::create()
						->filterByPrimaryKeys($this->processosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->processosScheduledForDeletion = null;
				}
			}

			if ($this->collProcessos !== null) {
				foreach ($this->collProcessos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->solicitacaosScheduledForDeletion !== null) {
				if (!$this->solicitacaosScheduledForDeletion->isEmpty()) {
					SolicitacaoQuery::create()
						->filterByPrimaryKeys($this->solicitacaosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->solicitacaosScheduledForDeletion = null;
				}
			}

			if ($this->collSolicitacaos !== null) {
				foreach ($this->collSolicitacaos as $referrerFK) {
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

		$this->modifiedColumns[] = ClientePeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . ClientePeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(ClientePeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(ClientePeer::USUARIO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`USUARIO_ID`';
		}
		if ($this->isColumnModified(ClientePeer::NOME)) {
			$modifiedColumns[':p' . $index++]  = '`NOME`';
		}
		if ($this->isColumnModified(ClientePeer::EMAIL)) {
			$modifiedColumns[':p' . $index++]  = '`EMAIL`';
		}
		if ($this->isColumnModified(ClientePeer::CELULAR)) {
			$modifiedColumns[':p' . $index++]  = '`CELULAR`';
		}
		if ($this->isColumnModified(ClientePeer::TELEFONE)) {
			$modifiedColumns[':p' . $index++]  = '`TELEFONE`';
		}
		if ($this->isColumnModified(ClientePeer::CPF)) {
			$modifiedColumns[':p' . $index++]  = '`CPF`';
		}
		if ($this->isColumnModified(ClientePeer::RG)) {
			$modifiedColumns[':p' . $index++]  = '`RG`';
		}
		if ($this->isColumnModified(ClientePeer::RG_EXPEDIDOR)) {
			$modifiedColumns[':p' . $index++]  = '`RG_EXPEDIDOR`';
		}
		if ($this->isColumnModified(ClientePeer::CADASTRO_VALIDO)) {
			$modifiedColumns[':p' . $index++]  = '`CADASTRO_VALIDO`';
		}
		if ($this->isColumnModified(ClientePeer::DATA_NASCIMENTO)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_NASCIMENTO`';
		}
		if ($this->isColumnModified(ClientePeer::SEXO)) {
			$modifiedColumns[':p' . $index++]  = '`SEXO`';
		}
		if ($this->isColumnModified(ClientePeer::FACEBOOK)) {
			$modifiedColumns[':p' . $index++]  = '`FACEBOOK`';
		}
		if ($this->isColumnModified(ClientePeer::INSTAGRAM)) {
			$modifiedColumns[':p' . $index++]  = '`INSTAGRAM`';
		}

		$sql = sprintf(
			'INSERT INTO `cliente` (%s) VALUES (%s)',
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
					case '`NOME`':						
						$stmt->bindValue($identifier, $this->nome, PDO::PARAM_STR);
						break;
					case '`EMAIL`':						
						$stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
						break;
					case '`CELULAR`':						
						$stmt->bindValue($identifier, $this->celular, PDO::PARAM_STR);
						break;
					case '`TELEFONE`':						
						$stmt->bindValue($identifier, $this->telefone, PDO::PARAM_STR);
						break;
					case '`CPF`':						
						$stmt->bindValue($identifier, $this->cpf, PDO::PARAM_STR);
						break;
					case '`RG`':						
						$stmt->bindValue($identifier, $this->rg, PDO::PARAM_STR);
						break;
					case '`RG_EXPEDIDOR`':						
						$stmt->bindValue($identifier, $this->rg_expedidor, PDO::PARAM_STR);
						break;
					case '`CADASTRO_VALIDO`':
						$stmt->bindValue($identifier, (int) $this->cadastro_valido, PDO::PARAM_INT);
						break;
					case '`DATA_NASCIMENTO`':						
						$stmt->bindValue($identifier, $this->data_nascimento, PDO::PARAM_STR);
						break;
					case '`SEXO`':						
						$stmt->bindValue($identifier, $this->sexo, PDO::PARAM_STR);
						break;
					case '`FACEBOOK`':						
						$stmt->bindValue($identifier, $this->facebook, PDO::PARAM_STR);
						break;
					case '`INSTAGRAM`':						
						$stmt->bindValue($identifier, $this->instagram, PDO::PARAM_STR);
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
		$pos = ClientePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getNome();
				break;
			case 3:
				return $this->getEmail();
				break;
			case 4:
				return $this->getCelular();
				break;
			case 5:
				return $this->getTelefone();
				break;
			case 6:
				return $this->getCpf();
				break;
			case 7:
				return $this->getRg();
				break;
			case 8:
				return $this->getRgExpedidor();
				break;
			case 9:
				return $this->getCadastroValido();
				break;
			case 10:
				return $this->getDataNascimento();
				break;
			case 11:
				return $this->getSexo();
				break;
			case 12:
				return $this->getFacebook();
				break;
			case 13:
				return $this->getInstagram();
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
		if (isset($alreadyDumpedObjects['Cliente'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Cliente'][$this->getPrimaryKey()] = true;
		$keys = ClientePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUsuarioId(),
			$keys[2] => $this->getNome(),
			$keys[3] => $this->getEmail(),
			$keys[4] => $this->getCelular(),
			$keys[5] => $this->getTelefone(),
			$keys[6] => $this->getCpf(),
			$keys[7] => $this->getRg(),
			$keys[8] => $this->getRgExpedidor(),
			$keys[9] => $this->getCadastroValido(),
			$keys[10] => $this->getDataNascimento(),
			$keys[11] => $this->getSexo(),
			$keys[12] => $this->getFacebook(),
			$keys[13] => $this->getInstagram(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aUsuario) {
				$result['Usuario'] = $this->aUsuario->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collAdvogadoClientes) {
				$result['AdvogadoClientes'] = $this->collAdvogadoClientes->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collCasos) {
				$result['Casos'] = $this->collCasos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collContratos) {
				$result['Contratos'] = $this->collContratos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collProcessos) {
				$result['Processos'] = $this->collProcessos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collSolicitacaos) {
				$result['Solicitacaos'] = $this->collSolicitacaos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = ClientePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setNome($value);
				break;
			case 3:
				$this->setEmail($value);
				break;
			case 4:
				$this->setCelular($value);
				break;
			case 5:
				$this->setTelefone($value);
				break;
			case 6:
				$this->setCpf($value);
				break;
			case 7:
				$this->setRg($value);
				break;
			case 8:
				$this->setRgExpedidor($value);
				break;
			case 9:
				$this->setCadastroValido($value);
				break;
			case 10:
				$this->setDataNascimento($value);
				break;
			case 11:
				$this->setSexo($value);
				break;
			case 12:
				$this->setFacebook($value);
				break;
			case 13:
				$this->setInstagram($value);
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
		$keys = ClientePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUsuarioId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNome($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setEmail($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCelular($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTelefone($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCpf($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setRg($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setRgExpedidor($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCadastroValido($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDataNascimento($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setSexo($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFacebook($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setInstagram($arr[$keys[13]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ClientePeer::DATABASE_NAME);

		if ($this->isColumnModified(ClientePeer::ID)) $criteria->add(ClientePeer::ID, $this->id);
		if ($this->isColumnModified(ClientePeer::USUARIO_ID)) $criteria->add(ClientePeer::USUARIO_ID, $this->usuario_id);
		if ($this->isColumnModified(ClientePeer::NOME)) $criteria->add(ClientePeer::NOME, $this->nome);
		if ($this->isColumnModified(ClientePeer::EMAIL)) $criteria->add(ClientePeer::EMAIL, $this->email);
		if ($this->isColumnModified(ClientePeer::CELULAR)) $criteria->add(ClientePeer::CELULAR, $this->celular);
		if ($this->isColumnModified(ClientePeer::TELEFONE)) $criteria->add(ClientePeer::TELEFONE, $this->telefone);
		if ($this->isColumnModified(ClientePeer::CPF)) $criteria->add(ClientePeer::CPF, $this->cpf);
		if ($this->isColumnModified(ClientePeer::RG)) $criteria->add(ClientePeer::RG, $this->rg);
		if ($this->isColumnModified(ClientePeer::RG_EXPEDIDOR)) $criteria->add(ClientePeer::RG_EXPEDIDOR, $this->rg_expedidor);
		if ($this->isColumnModified(ClientePeer::CADASTRO_VALIDO)) $criteria->add(ClientePeer::CADASTRO_VALIDO, $this->cadastro_valido);
		if ($this->isColumnModified(ClientePeer::DATA_NASCIMENTO)) $criteria->add(ClientePeer::DATA_NASCIMENTO, $this->data_nascimento);
		if ($this->isColumnModified(ClientePeer::SEXO)) $criteria->add(ClientePeer::SEXO, $this->sexo);
		if ($this->isColumnModified(ClientePeer::FACEBOOK)) $criteria->add(ClientePeer::FACEBOOK, $this->facebook);
		if ($this->isColumnModified(ClientePeer::INSTAGRAM)) $criteria->add(ClientePeer::INSTAGRAM, $this->instagram);

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
		$criteria = new Criteria(ClientePeer::DATABASE_NAME);
		$criteria->add(ClientePeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Cliente (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setUsuarioId($this->getUsuarioId());
		$copyObj->setNome($this->getNome());
		$copyObj->setEmail($this->getEmail());
		$copyObj->setCelular($this->getCelular());
		$copyObj->setTelefone($this->getTelefone());
		$copyObj->setCpf($this->getCpf());
		$copyObj->setRg($this->getRg());
		$copyObj->setRgExpedidor($this->getRgExpedidor());
		$copyObj->setCadastroValido($this->getCadastroValido());
		$copyObj->setDataNascimento($this->getDataNascimento());
		$copyObj->setSexo($this->getSexo());
		$copyObj->setFacebook($this->getFacebook());
		$copyObj->setInstagram($this->getInstagram());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getAdvogadoClientes() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAdvogadoCliente($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCasos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCaso($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getContratos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addContrato($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getProcessos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addProcesso($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getSolicitacaos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addSolicitacao($relObj->copy($deepCopy));
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
	 * @return     Cliente Clone of current object.
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
	 * @return     ClientePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ClientePeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     Cliente The current object (for fluent API support)
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
			$v->addCliente($this);
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
				$this->aUsuario->addClientes($this);
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
		if ('AdvogadoCliente' == $relationName) {
			return $this->initAdvogadoClientes();
		}
		if ('Caso' == $relationName) {
			return $this->initCasos();
		}
		if ('Contrato' == $relationName) {
			return $this->initContratos();
		}
		if ('Processo' == $relationName) {
			return $this->initProcessos();
		}
		if ('Solicitacao' == $relationName) {
			return $this->initSolicitacaos();
		}
	}

	/**
	 * Clears out the collAdvogadoClientes collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAdvogadoClientes()
	 */
	public function clearAdvogadoClientes()
	{
		$this->collAdvogadoClientes = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAdvogadoClientes collection.
	 *
	 * By default this just sets the collAdvogadoClientes collection to an empty array (like clearcollAdvogadoClientes());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initAdvogadoClientes($overrideExisting = true)
	{
		if (null !== $this->collAdvogadoClientes && !$overrideExisting) {
			return;
		}
		$this->collAdvogadoClientes = new PropelObjectCollection();
		$this->collAdvogadoClientes->setModel('AdvogadoCliente');
	}

	/**
	 * Gets an array of AdvogadoCliente objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Cliente is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AdvogadoCliente[] List of AdvogadoCliente objects
	 * @throws     PropelException
	 */
	public function getAdvogadoClientes($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAdvogadoClientes || null !== $criteria) {
			if ($this->isNew() && null === $this->collAdvogadoClientes) {
				// return empty collection
				$this->initAdvogadoClientes();
			} else {
				$collAdvogadoClientes = AdvogadoClienteQuery::create(null, $criteria)
					->filterByCliente($this)
					->find($con);
				if (null !== $criteria) {
					return $collAdvogadoClientes;
				}
				$this->collAdvogadoClientes = $collAdvogadoClientes;
			}
		}
		return $this->collAdvogadoClientes;
	}

	/**
	 * Sets a collection of AdvogadoCliente objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $advogadoClientes A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setAdvogadoClientes(PropelCollection $advogadoClientes, PropelPDO $con = null)
	{
		$this->advogadoClientesScheduledForDeletion = $this->getAdvogadoClientes(new Criteria(), $con)->diff($advogadoClientes);

		foreach ($advogadoClientes as $advogadoCliente) {
			// Fix issue with collection modified by reference
			if ($advogadoCliente->isNew()) {
				$advogadoCliente->setCliente($this);
			}
			$this->addAdvogadoCliente($advogadoCliente);
		}

		$this->collAdvogadoClientes = $advogadoClientes;
	}

	/**
	 * Returns the number of related AdvogadoCliente objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AdvogadoCliente objects.
	 * @throws     PropelException
	 */
	public function countAdvogadoClientes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAdvogadoClientes || null !== $criteria) {
			if ($this->isNew() && null === $this->collAdvogadoClientes) {
				return 0;
			} else {
				$query = AdvogadoClienteQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCliente($this)
					->count($con);
			}
		} else {
			return count($this->collAdvogadoClientes);
		}
	}

	/**
	 * Method called to associate a AdvogadoCliente object to this object
	 * through the AdvogadoCliente foreign key attribute.
	 *
	 * @param      AdvogadoCliente $l AdvogadoCliente
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function addAdvogadoCliente(AdvogadoCliente $l)
	{
		if ($this->collAdvogadoClientes === null) {
			$this->initAdvogadoClientes();
		}
		if (!$this->collAdvogadoClientes->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddAdvogadoCliente($l);
		}

		return $this;
	}

	/**
	 * @param	AdvogadoCliente $advogadoCliente The advogadoCliente object to add.
	 */
	protected function doAddAdvogadoCliente($advogadoCliente)
	{
		$this->collAdvogadoClientes[]= $advogadoCliente;
		$advogadoCliente->setCliente($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related AdvogadoClientes from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array AdvogadoCliente[] List of AdvogadoCliente objects
	 */
	public function getAdvogadoClientesJoinAdvogado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = AdvogadoClienteQuery::create(null, $criteria);
		$query->joinWith('Advogado', $join_behavior);

		return $this->getAdvogadoClientes($query, $con);
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
	 * If this Cliente is new, it will return
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
					->filterByCliente($this)
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
				$caso->setCliente($this);
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
					->filterByCliente($this)
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
	 * @return     Cliente The current object (for fluent API support)
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
		$caso->setCliente($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Casos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
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
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Casos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
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
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Casos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
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
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Casos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Caso[] List of Caso objects
	 */
	public function getCasosJoinSolicitacao($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CasoQuery::create(null, $criteria);
		$query->joinWith('Solicitacao', $join_behavior);

		return $this->getCasos($query, $con);
	}

	/**
	 * Clears out the collContratos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addContratos()
	 */
	public function clearContratos()
	{
		$this->collContratos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collContratos collection.
	 *
	 * By default this just sets the collContratos collection to an empty array (like clearcollContratos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initContratos($overrideExisting = true)
	{
		if (null !== $this->collContratos && !$overrideExisting) {
			return;
		}
		$this->collContratos = new PropelObjectCollection();
		$this->collContratos->setModel('Contrato');
	}

	/**
	 * Gets an array of Contrato objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Cliente is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Contrato[] List of Contrato objects
	 * @throws     PropelException
	 */
	public function getContratos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collContratos || null !== $criteria) {
			if ($this->isNew() && null === $this->collContratos) {
				// return empty collection
				$this->initContratos();
			} else {
				$collContratos = ContratoQuery::create(null, $criteria)
					->filterByCliente($this)
					->find($con);
				if (null !== $criteria) {
					return $collContratos;
				}
				$this->collContratos = $collContratos;
			}
		}
		return $this->collContratos;
	}

	/**
	 * Sets a collection of Contrato objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $contratos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setContratos(PropelCollection $contratos, PropelPDO $con = null)
	{
		$this->contratosScheduledForDeletion = $this->getContratos(new Criteria(), $con)->diff($contratos);

		foreach ($contratos as $contrato) {
			// Fix issue with collection modified by reference
			if ($contrato->isNew()) {
				$contrato->setCliente($this);
			}
			$this->addContrato($contrato);
		}

		$this->collContratos = $contratos;
	}

	/**
	 * Returns the number of related Contrato objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Contrato objects.
	 * @throws     PropelException
	 */
	public function countContratos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collContratos || null !== $criteria) {
			if ($this->isNew() && null === $this->collContratos) {
				return 0;
			} else {
				$query = ContratoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCliente($this)
					->count($con);
			}
		} else {
			return count($this->collContratos);
		}
	}

	/**
	 * Method called to associate a Contrato object to this object
	 * through the Contrato foreign key attribute.
	 *
	 * @param      Contrato $l Contrato
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function addContrato(Contrato $l)
	{
		if ($this->collContratos === null) {
			$this->initContratos();
		}
		if (!$this->collContratos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddContrato($l);
		}

		return $this;
	}

	/**
	 * @param	Contrato $contrato The contrato object to add.
	 */
	protected function doAddContrato($contrato)
	{
		$this->collContratos[]= $contrato;
		$contrato->setCliente($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Contratos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Contrato[] List of Contrato objects
	 */
	public function getContratosJoinAdvogado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ContratoQuery::create(null, $criteria);
		$query->joinWith('Advogado', $join_behavior);

		return $this->getContratos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Contratos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Contrato[] List of Contrato objects
	 */
	public function getContratosJoinAreaAdvocacia($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ContratoQuery::create(null, $criteria);
		$query->joinWith('AreaAdvocacia', $join_behavior);

		return $this->getContratos($query, $con);
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
	 * By default this just sets the collProcessos collection to an empty array (like clearcollProcessos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initProcessos($overrideExisting = true)
	{
		if (null !== $this->collProcessos && !$overrideExisting) {
			return;
		}
		$this->collProcessos = new PropelObjectCollection();
		$this->collProcessos->setModel('Processo');
	}

	/**
	 * Gets an array of Processo objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Cliente is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Processo[] List of Processo objects
	 * @throws     PropelException
	 */
	public function getProcessos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collProcessos || null !== $criteria) {
			if ($this->isNew() && null === $this->collProcessos) {
				// return empty collection
				$this->initProcessos();
			} else {
				$collProcessos = ProcessoQuery::create(null, $criteria)
					->filterByCliente($this)
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
	 * Sets a collection of Processo objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $processos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setProcessos(PropelCollection $processos, PropelPDO $con = null)
	{
		$this->processosScheduledForDeletion = $this->getProcessos(new Criteria(), $con)->diff($processos);

		foreach ($processos as $processo) {
			// Fix issue with collection modified by reference
			if ($processo->isNew()) {
				$processo->setCliente($this);
			}
			$this->addProcesso($processo);
		}

		$this->collProcessos = $processos;
	}

	/**
	 * Returns the number of related Processo objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Processo objects.
	 * @throws     PropelException
	 */
	public function countProcessos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
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
					->filterByCliente($this)
					->count($con);
			}
		} else {
			return count($this->collProcessos);
		}
	}

	/**
	 * Method called to associate a Processo object to this object
	 * through the Processo foreign key attribute.
	 *
	 * @param      Processo $l Processo
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function addProcesso(Processo $l)
	{
		if ($this->collProcessos === null) {
			$this->initProcessos();
		}
		if (!$this->collProcessos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddProcesso($l);
		}

		return $this;
	}

	/**
	 * @param	Processo $processo The processo object to add.
	 */
	protected function doAddProcesso($processo)
	{
		$this->collProcessos[]= $processo;
		$processo->setCliente($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Processos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Processo[] List of Processo objects
	 */
	public function getProcessosJoinAdvogado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ProcessoQuery::create(null, $criteria);
		$query->joinWith('Advogado', $join_behavior);

		return $this->getProcessos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Processos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Processo[] List of Processo objects
	 */
	public function getProcessosJoinAreaAdvocacia($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ProcessoQuery::create(null, $criteria);
		$query->joinWith('AreaAdvocacia', $join_behavior);

		return $this->getProcessos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Processos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Processo[] List of Processo objects
	 */
	public function getProcessosJoinContrato($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ProcessoQuery::create(null, $criteria);
		$query->joinWith('Contrato', $join_behavior);

		return $this->getProcessos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Processos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Processo[] List of Processo objects
	 */
	public function getProcessosJoinFaseProcesso($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ProcessoQuery::create(null, $criteria);
		$query->joinWith('FaseProcesso', $join_behavior);

		return $this->getProcessos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Processos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Processo[] List of Processo objects
	 */
	public function getProcessosJoinTribunal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ProcessoQuery::create(null, $criteria);
		$query->joinWith('Tribunal', $join_behavior);

		return $this->getProcessos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Processos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Processo[] List of Processo objects
	 */
	public function getProcessosJoinUf($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ProcessoQuery::create(null, $criteria);
		$query->joinWith('Uf', $join_behavior);

		return $this->getProcessos($query, $con);
	}

	/**
	 * Clears out the collSolicitacaos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addSolicitacaos()
	 */
	public function clearSolicitacaos()
	{
		$this->collSolicitacaos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collSolicitacaos collection.
	 *
	 * By default this just sets the collSolicitacaos collection to an empty array (like clearcollSolicitacaos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initSolicitacaos($overrideExisting = true)
	{
		if (null !== $this->collSolicitacaos && !$overrideExisting) {
			return;
		}
		$this->collSolicitacaos = new PropelObjectCollection();
		$this->collSolicitacaos->setModel('Solicitacao');
	}

	/**
	 * Gets an array of Solicitacao objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Cliente is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Solicitacao[] List of Solicitacao objects
	 * @throws     PropelException
	 */
	public function getSolicitacaos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collSolicitacaos || null !== $criteria) {
			if ($this->isNew() && null === $this->collSolicitacaos) {
				// return empty collection
				$this->initSolicitacaos();
			} else {
				$collSolicitacaos = SolicitacaoQuery::create(null, $criteria)
					->filterByCliente($this)
					->find($con);
				if (null !== $criteria) {
					return $collSolicitacaos;
				}
				$this->collSolicitacaos = $collSolicitacaos;
			}
		}
		return $this->collSolicitacaos;
	}

	/**
	 * Sets a collection of Solicitacao objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $solicitacaos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setSolicitacaos(PropelCollection $solicitacaos, PropelPDO $con = null)
	{
		$this->solicitacaosScheduledForDeletion = $this->getSolicitacaos(new Criteria(), $con)->diff($solicitacaos);

		foreach ($solicitacaos as $solicitacao) {
			// Fix issue with collection modified by reference
			if ($solicitacao->isNew()) {
				$solicitacao->setCliente($this);
			}
			$this->addSolicitacao($solicitacao);
		}

		$this->collSolicitacaos = $solicitacaos;
	}

	/**
	 * Returns the number of related Solicitacao objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Solicitacao objects.
	 * @throws     PropelException
	 */
	public function countSolicitacaos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collSolicitacaos || null !== $criteria) {
			if ($this->isNew() && null === $this->collSolicitacaos) {
				return 0;
			} else {
				$query = SolicitacaoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCliente($this)
					->count($con);
			}
		} else {
			return count($this->collSolicitacaos);
		}
	}

	/**
	 * Method called to associate a Solicitacao object to this object
	 * through the Solicitacao foreign key attribute.
	 *
	 * @param      Solicitacao $l Solicitacao
	 * @return     Cliente The current object (for fluent API support)
	 */
	public function addSolicitacao(Solicitacao $l)
	{
		if ($this->collSolicitacaos === null) {
			$this->initSolicitacaos();
		}
		if (!$this->collSolicitacaos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddSolicitacao($l);
		}

		return $this;
	}

	/**
	 * @param	Solicitacao $solicitacao The solicitacao object to add.
	 */
	protected function doAddSolicitacao($solicitacao)
	{
		$this->collSolicitacaos[]= $solicitacao;
		$solicitacao->setCliente($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Solicitacaos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Solicitacao[] List of Solicitacao objects
	 */
	public function getSolicitacaosJoinAdvogado($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SolicitacaoQuery::create(null, $criteria);
		$query->joinWith('Advogado', $join_behavior);

		return $this->getSolicitacaos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Cliente is new, it will return
	 * an empty collection; or if this Cliente has previously
	 * been saved, it will retrieve related Solicitacaos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Cliente.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Solicitacao[] List of Solicitacao objects
	 */
	public function getSolicitacaosJoinAreaAdvocacia($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = SolicitacaoQuery::create(null, $criteria);
		$query->joinWith('AreaAdvocacia', $join_behavior);

		return $this->getSolicitacaos($query, $con);
	}

	/**
	 * Clears out the collAdvogados collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAdvogados()
	 */
	public function clearAdvogados()
	{
		$this->collAdvogados = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAdvogados collection.
	 *
	 * By default this just sets the collAdvogados collection to an empty collection (like clearAdvogados());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initAdvogados()
	{
		$this->collAdvogados = new PropelObjectCollection();
		$this->collAdvogados->setModel('Advogado');
	}

	/**
	 * Gets a collection of Advogado objects related by a many-to-many relationship
	 * to the current object by way of the advogado_cliente cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Cliente is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Advogado[] List of Advogado objects
	 */
	public function getAdvogados($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAdvogados || null !== $criteria) {
			if ($this->isNew() && null === $this->collAdvogados) {
				// return empty collection
				$this->initAdvogados();
			} else {
				$collAdvogados = AdvogadoQuery::create(null, $criteria)
					->filterByCliente($this)
					->find($con);
				if (null !== $criteria) {
					return $collAdvogados;
				}
				$this->collAdvogados = $collAdvogados;
			}
		}
		return $this->collAdvogados;
	}

	/**
	 * Sets a collection of Advogado objects related by a many-to-many relationship
	 * to the current object by way of the advogado_cliente cross-reference table.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $advogados A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setAdvogados(PropelCollection $advogados, PropelPDO $con = null)
	{
		$advogadoClientes = AdvogadoClienteQuery::create()
			->filterByAdvogado($advogados)
			->filterByCliente($this)
			->find($con);

		$this->advogadosScheduledForDeletion = $this->getAdvogadoClientes()->diff($advogadoClientes);
		$this->collAdvogadoClientes = $advogadoClientes;

		foreach ($advogados as $advogado) {
			// Fix issue with collection modified by reference
			if ($advogado->isNew()) {
				$this->doAddAdvogado($advogado);
			} else {
				$this->addAdvogado($advogado);
			}
		}

		$this->collAdvogados = $advogados;
	}

	/**
	 * Gets the number of Advogado objects related by a many-to-many relationship
	 * to the current object by way of the advogado_cliente cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Advogado objects
	 */
	public function countAdvogados($criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAdvogados || null !== $criteria) {
			if ($this->isNew() && null === $this->collAdvogados) {
				return 0;
			} else {
				$query = AdvogadoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCliente($this)
					->count($con);
			}
		} else {
			return count($this->collAdvogados);
		}
	}

	/**
	 * Associate a Advogado object to this object
	 * through the advogado_cliente cross reference table.
	 *
	 * @param      Advogado $advogado The AdvogadoCliente object to relate
	 * @return     void
	 */
	public function addAdvogado(Advogado $advogado)
	{
		if ($this->collAdvogados === null) {
			$this->initAdvogados();
		}
		if (!$this->collAdvogados->contains($advogado)) { // only add it if the **same** object is not already associated
			$this->doAddAdvogado($advogado);

			$this->collAdvogados[]= $advogado;
		}
	}

	/**
	 * @param	Advogado $advogado The advogado object to add.
	 */
	protected function doAddAdvogado($advogado)
	{
		$advogadoCliente = new AdvogadoCliente();
		$advogadoCliente->setAdvogado($advogado);
		$this->addAdvogadoCliente($advogadoCliente);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->usuario_id = null;
		$this->nome = null;
		$this->email = null;
		$this->celular = null;
		$this->telefone = null;
		$this->cpf = null;
		$this->rg = null;
		$this->rg_expedidor = null;
		$this->cadastro_valido = null;
		$this->data_nascimento = null;
		$this->sexo = null;
		$this->facebook = null;
		$this->instagram = null;
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
			if ($this->collAdvogadoClientes) {
				foreach ($this->collAdvogadoClientes as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCasos) {
				foreach ($this->collCasos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collContratos) {
				foreach ($this->collContratos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collProcessos) {
				foreach ($this->collProcessos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collSolicitacaos) {
				foreach ($this->collSolicitacaos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAdvogados) {
				foreach ($this->collAdvogados as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collAdvogadoClientes instanceof PropelCollection) {
			$this->collAdvogadoClientes->clearIterator();
		}
		$this->collAdvogadoClientes = null;
		if ($this->collCasos instanceof PropelCollection) {
			$this->collCasos->clearIterator();
		}
		$this->collCasos = null;
		if ($this->collContratos instanceof PropelCollection) {
			$this->collContratos->clearIterator();
		}
		$this->collContratos = null;
		if ($this->collProcessos instanceof PropelCollection) {
			$this->collProcessos->clearIterator();
		}
		$this->collProcessos = null;
		if ($this->collSolicitacaos instanceof PropelCollection) {
			$this->collSolicitacaos->clearIterator();
		}
		$this->collSolicitacaos = null;
		if ($this->collAdvogados instanceof PropelCollection) {
			$this->collAdvogados->clearIterator();
		}
		$this->collAdvogados = null;
		$this->aUsuario = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(ClientePeer::DEFAULT_STRING_FORMAT);
	}

} // BaseCliente
