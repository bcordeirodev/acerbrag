<?php


/**
 * Base class that represents a row from the 'comunicado' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseComunicado extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ComunicadoPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ComunicadoPeer
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
	 * The value for the segurado_id field.
	 * @var        int
	 */
	protected $segurado_id;

	/**
	 * The value for the comunicante_id field.
	 * @var        int
	 */
	protected $comunicante_id;

	/**
	 * The value for the parentesco_id field.
	 * @var        int
	 */
	protected $parentesco_id;

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
	 * The value for the e_segurado field.
	 * @var        boolean
	 */
	protected $e_segurado;

	/**
	 * The value for the sinistro field.
	 * @var        string
	 */
	protected $sinistro;

	/**
	 * The value for the contrato field.
	 * @var        string
	 */
	protected $contrato;

	/**
	 * The value for the descricao field.
	 * @var        string
	 */
	protected $descricao;

	/**
	 * The value for the aberto field.
	 * @var        boolean
	 */
	protected $aberto;

	/**
	 * The value for the protocolo_ase field.
	 * @var        string
	 */
	protected $protocolo_ase;

	/**
	 * @var        Parentesco
	 */
	protected $aParentesco;

	/**
	 * @var        Pessoa
	 */
	protected $aPessoaRelatedBySeguradoId;

	/**
	 * @var        Pessoa
	 */
	protected $aPessoaRelatedByComunicanteId;

	/**
	 * @var        Usuario
	 */
	protected $aUsuario;

	/**
	 * @var        array Contato[] Collection to store aggregation of Contato objects.
	 */
	protected $collContatos;

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
	protected $contatosScheduledForDeletion = null;

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
	 * Get the [segurado_id] column value.
	 * 
	 * @return     int
	 */
	public function getSeguradoId()
	{
		return $this->segurado_id;
	}

	/**
	 * Get the [comunicante_id] column value.
	 * 
	 * @return     int
	 */
	public function getComunicanteId()
	{
		return $this->comunicante_id;
	}

	/**
	 * Get the [parentesco_id] column value.
	 * 
	 * @return     int
	 */
	public function getParentescoId()
	{
		return $this->parentesco_id;
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
	 * Get the [e_segurado] column value.
	 * 
	 * @return     boolean
	 */
	public function getESegurado()
	{
		return $this->e_segurado;
	}

	/**
	 * Get the [sinistro] column value.
	 * 
	 * @return     string
	 */
	public function getSinistro()
	{
		return $this->sinistro;
	}

	/**
	 * Get the [contrato] column value.
	 * 
	 * @return     string
	 */
	public function getContrato()
	{
		return $this->contrato;
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
	 * Get the [aberto] column value.
	 * 
	 * @return     boolean
	 */
	public function getAberto()
	{
		return $this->aberto;
	}

	/**
	 * Get the [protocolo_ase] column value.
	 * 
	 * @return     string
	 */
	public function getProtocoloAse()
	{
		return $this->protocolo_ase;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Comunicado The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ComunicadoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [usuario_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Comunicado The current object (for fluent API support)
	 */
	public function setUsuarioId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->usuario_id !== $v) {
			$this->usuario_id = $v;
			$this->modifiedColumns[] = ComunicadoPeer::USUARIO_ID;
		}

		if ($this->aUsuario !== null && $this->aUsuario->getId() !== $v) {
			$this->aUsuario = null;
		}

		return $this;
	} // setUsuarioId()

	/**
	 * Set the value of [segurado_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Comunicado The current object (for fluent API support)
	 */
	public function setSeguradoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->segurado_id !== $v) {
			$this->segurado_id = $v;
			$this->modifiedColumns[] = ComunicadoPeer::SEGURADO_ID;
		}

		if ($this->aPessoaRelatedBySeguradoId !== null && $this->aPessoaRelatedBySeguradoId->getId() !== $v) {
			$this->aPessoaRelatedBySeguradoId = null;
		}

		return $this;
	} // setSeguradoId()

	/**
	 * Set the value of [comunicante_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Comunicado The current object (for fluent API support)
	 */
	public function setComunicanteId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->comunicante_id !== $v) {
			$this->comunicante_id = $v;
			$this->modifiedColumns[] = ComunicadoPeer::COMUNICANTE_ID;
		}

		if ($this->aPessoaRelatedByComunicanteId !== null && $this->aPessoaRelatedByComunicanteId->getId() !== $v) {
			$this->aPessoaRelatedByComunicanteId = null;
		}

		return $this;
	} // setComunicanteId()

	/**
	 * Set the value of [parentesco_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Comunicado The current object (for fluent API support)
	 */
	public function setParentescoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->parentesco_id !== $v) {
			$this->parentesco_id = $v;
			$this->modifiedColumns[] = ComunicadoPeer::PARENTESCO_ID;
		}

		if ($this->aParentesco !== null && $this->aParentesco->getId() !== $v) {
			$this->aParentesco = null;
		}

		return $this;
	} // setParentescoId()

	/**
	 * Sets the value of [data_abertura] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Comunicado The current object (for fluent API support)
	 */
	public function setDataAbertura($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_abertura !== null || $dt !== null) {
			$currentDateAsString = ($this->data_abertura !== null && $tmpDt = new DateTime($this->data_abertura)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_abertura = $newDateAsString;
				$this->modifiedColumns[] = ComunicadoPeer::DATA_ABERTURA;
			}
		} // if either are not null

		return $this;
	} // setDataAbertura()

	/**
	 * Sets the value of [data_fechamento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Comunicado The current object (for fluent API support)
	 */
	public function setDataFechamento($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_fechamento !== null || $dt !== null) {
			$currentDateAsString = ($this->data_fechamento !== null && $tmpDt = new DateTime($this->data_fechamento)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_fechamento = $newDateAsString;
				$this->modifiedColumns[] = ComunicadoPeer::DATA_FECHAMENTO;
			}
		} // if either are not null

		return $this;
	} // setDataFechamento()

	/**
	 * Sets the value of the [e_segurado] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Comunicado The current object (for fluent API support)
	 */
	public function setESegurado($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->e_segurado !== $v) {
			$this->e_segurado = $v;
			$this->modifiedColumns[] = ComunicadoPeer::E_SEGURADO;
		}

		return $this;
	} // setESegurado()

	/**
	 * Set the value of [sinistro] column.
	 * 
	 * @param      string $v new value
	 * @return     Comunicado The current object (for fluent API support)
	 */
	public function setSinistro($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->sinistro !== $v) {
			$this->sinistro = $v;
			$this->modifiedColumns[] = ComunicadoPeer::SINISTRO;
		}

		return $this;
	} // setSinistro()

	/**
	 * Set the value of [contrato] column.
	 * 
	 * @param      string $v new value
	 * @return     Comunicado The current object (for fluent API support)
	 */
	public function setContrato($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->contrato !== $v) {
			$this->contrato = $v;
			$this->modifiedColumns[] = ComunicadoPeer::CONTRATO;
		}

		return $this;
	} // setContrato()

	/**
	 * Set the value of [descricao] column.
	 * 
	 * @param      string $v new value
	 * @return     Comunicado The current object (for fluent API support)
	 */
	public function setDescricao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descricao !== $v) {
			$this->descricao = $v;
			$this->modifiedColumns[] = ComunicadoPeer::DESCRICAO;
		}

		return $this;
	} // setDescricao()

	/**
	 * Sets the value of the [aberto] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Comunicado The current object (for fluent API support)
	 */
	public function setAberto($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->aberto !== $v) {
			$this->aberto = $v;
			$this->modifiedColumns[] = ComunicadoPeer::ABERTO;
		}

		return $this;
	} // setAberto()

	/**
	 * Set the value of [protocolo_ase] column.
	 * 
	 * @param      string $v new value
	 * @return     Comunicado The current object (for fluent API support)
	 */
	public function setProtocoloAse($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->protocolo_ase !== $v) {
			$this->protocolo_ase = $v;
			$this->modifiedColumns[] = ComunicadoPeer::PROTOCOLO_ASE;
		}

		return $this;
	} // setProtocoloAse()

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
			$this->usuario_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->segurado_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->comunicante_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->parentesco_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->data_abertura = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->data_fechamento = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->e_segurado = ($row[$startcol + 7] !== null) ? (boolean) $row[$startcol + 7] : null;
			$this->sinistro = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->contrato = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->descricao = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->aberto = ($row[$startcol + 11] !== null) ? (boolean) $row[$startcol + 11] : null;
			$this->protocolo_ase = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 13; // 13 = ComunicadoPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Comunicado object", $e);
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
		if ($this->aPessoaRelatedBySeguradoId !== null && $this->segurado_id !== $this->aPessoaRelatedBySeguradoId->getId()) {
			$this->aPessoaRelatedBySeguradoId = null;
		}
		if ($this->aPessoaRelatedByComunicanteId !== null && $this->comunicante_id !== $this->aPessoaRelatedByComunicanteId->getId()) {
			$this->aPessoaRelatedByComunicanteId = null;
		}
		if ($this->aParentesco !== null && $this->parentesco_id !== $this->aParentesco->getId()) {
			$this->aParentesco = null;
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
			$con = Propel::getConnection(ComunicadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ComunicadoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aParentesco = null;
			$this->aPessoaRelatedBySeguradoId = null;
			$this->aPessoaRelatedByComunicanteId = null;
			$this->aUsuario = null;
			$this->collContatos = null;

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
			$con = Propel::getConnection(ComunicadoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = ComunicadoQuery::create()
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
			$con = Propel::getConnection(ComunicadoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ComunicadoPeer::addInstanceToPool($this);
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

			if ($this->aParentesco !== null) {
				if ($this->aParentesco->isModified() || $this->aParentesco->isNew()) {
					$affectedRows += $this->aParentesco->save($con);
				}
				$this->setParentesco($this->aParentesco);
			}

			if ($this->aPessoaRelatedBySeguradoId !== null) {
				if ($this->aPessoaRelatedBySeguradoId->isModified() || $this->aPessoaRelatedBySeguradoId->isNew()) {
					$affectedRows += $this->aPessoaRelatedBySeguradoId->save($con);
				}
				$this->setPessoaRelatedBySeguradoId($this->aPessoaRelatedBySeguradoId);
			}

			if ($this->aPessoaRelatedByComunicanteId !== null) {
				if ($this->aPessoaRelatedByComunicanteId->isModified() || $this->aPessoaRelatedByComunicanteId->isNew()) {
					$affectedRows += $this->aPessoaRelatedByComunicanteId->save($con);
				}
				$this->setPessoaRelatedByComunicanteId($this->aPessoaRelatedByComunicanteId);
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

			if ($this->contatosScheduledForDeletion !== null) {
				if (!$this->contatosScheduledForDeletion->isEmpty()) {
					ContatoQuery::create()
						->filterByPrimaryKeys($this->contatosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->contatosScheduledForDeletion = null;
				}
			}

			if ($this->collContatos !== null) {
				foreach ($this->collContatos as $referrerFK) {
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

		$this->modifiedColumns[] = ComunicadoPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . ComunicadoPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(ComunicadoPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(ComunicadoPeer::USUARIO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`USUARIO_ID`';
		}
		if ($this->isColumnModified(ComunicadoPeer::SEGURADO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`SEGURADO_ID`';
		}
		if ($this->isColumnModified(ComunicadoPeer::COMUNICANTE_ID)) {
			$modifiedColumns[':p' . $index++]  = '`COMUNICANTE_ID`';
		}
		if ($this->isColumnModified(ComunicadoPeer::PARENTESCO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`PARENTESCO_ID`';
		}
		if ($this->isColumnModified(ComunicadoPeer::DATA_ABERTURA)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_ABERTURA`';
		}
		if ($this->isColumnModified(ComunicadoPeer::DATA_FECHAMENTO)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_FECHAMENTO`';
		}
		if ($this->isColumnModified(ComunicadoPeer::E_SEGURADO)) {
			$modifiedColumns[':p' . $index++]  = '`E_SEGURADO`';
		}
		if ($this->isColumnModified(ComunicadoPeer::SINISTRO)) {
			$modifiedColumns[':p' . $index++]  = '`SINISTRO`';
		}
		if ($this->isColumnModified(ComunicadoPeer::CONTRATO)) {
			$modifiedColumns[':p' . $index++]  = '`CONTRATO`';
		}
		if ($this->isColumnModified(ComunicadoPeer::DESCRICAO)) {
			$modifiedColumns[':p' . $index++]  = '`DESCRICAO`';
		}
		if ($this->isColumnModified(ComunicadoPeer::ABERTO)) {
			$modifiedColumns[':p' . $index++]  = '`ABERTO`';
		}
		if ($this->isColumnModified(ComunicadoPeer::PROTOCOLO_ASE)) {
			$modifiedColumns[':p' . $index++]  = '`PROTOCOLO_ASE`';
		}

		$sql = sprintf(
			'INSERT INTO `comunicado` (%s) VALUES (%s)',
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
					case '`SEGURADO_ID`':
						$stmt->bindValue($identifier, $this->segurado_id, PDO::PARAM_INT);
						break;
					case '`COMUNICANTE_ID`':
						$stmt->bindValue($identifier, $this->comunicante_id, PDO::PARAM_INT);
						break;
					case '`PARENTESCO_ID`':
						$stmt->bindValue($identifier, $this->parentesco_id, PDO::PARAM_INT);
						break;
					case '`DATA_ABERTURA`':
						$stmt->bindValue($identifier, $this->data_abertura, PDO::PARAM_STR);
						break;
					case '`DATA_FECHAMENTO`':
						$stmt->bindValue($identifier, $this->data_fechamento, PDO::PARAM_STR);
						break;
					case '`E_SEGURADO`':
						$stmt->bindValue($identifier, (int) $this->e_segurado, PDO::PARAM_INT);
						break;
					case '`SINISTRO`':
						$stmt->bindValue($identifier, $this->sinistro, PDO::PARAM_STR);
						break;
					case '`CONTRATO`':
						$stmt->bindValue($identifier, $this->contrato, PDO::PARAM_STR);
						break;
					case '`DESCRICAO`':
						$stmt->bindValue($identifier, $this->descricao, PDO::PARAM_STR);
						break;
					case '`ABERTO`':
						$stmt->bindValue($identifier, (int) $this->aberto, PDO::PARAM_INT);
						break;
					case '`PROTOCOLO_ASE`':
						$stmt->bindValue($identifier, $this->protocolo_ase, PDO::PARAM_STR);
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
		$pos = ComunicadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getSeguradoId();
				break;
			case 3:
				return $this->getComunicanteId();
				break;
			case 4:
				return $this->getParentescoId();
				break;
			case 5:
				return $this->getDataAbertura();
				break;
			case 6:
				return $this->getDataFechamento();
				break;
			case 7:
				return $this->getESegurado();
				break;
			case 8:
				return $this->getSinistro();
				break;
			case 9:
				return $this->getContrato();
				break;
			case 10:
				return $this->getDescricao();
				break;
			case 11:
				return $this->getAberto();
				break;
			case 12:
				return $this->getProtocoloAse();
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
		if (isset($alreadyDumpedObjects['Comunicado'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Comunicado'][$this->getPrimaryKey()] = true;
		$keys = ComunicadoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUsuarioId(),
			$keys[2] => $this->getSeguradoId(),
			$keys[3] => $this->getComunicanteId(),
			$keys[4] => $this->getParentescoId(),
			$keys[5] => $this->getDataAbertura(),
			$keys[6] => $this->getDataFechamento(),
			$keys[7] => $this->getESegurado(),
			$keys[8] => $this->getSinistro(),
			$keys[9] => $this->getContrato(),
			$keys[10] => $this->getDescricao(),
			$keys[11] => $this->getAberto(),
			$keys[12] => $this->getProtocoloAse(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aParentesco) {
				$result['Parentesco'] = $this->aParentesco->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aPessoaRelatedBySeguradoId) {
				$result['PessoaRelatedBySeguradoId'] = $this->aPessoaRelatedBySeguradoId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aPessoaRelatedByComunicanteId) {
				$result['PessoaRelatedByComunicanteId'] = $this->aPessoaRelatedByComunicanteId->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aUsuario) {
				$result['Usuario'] = $this->aUsuario->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collContatos) {
				$result['Contatos'] = $this->collContatos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = ComunicadoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setSeguradoId($value);
				break;
			case 3:
				$this->setComunicanteId($value);
				break;
			case 4:
				$this->setParentescoId($value);
				break;
			case 5:
				$this->setDataAbertura($value);
				break;
			case 6:
				$this->setDataFechamento($value);
				break;
			case 7:
				$this->setESegurado($value);
				break;
			case 8:
				$this->setSinistro($value);
				break;
			case 9:
				$this->setContrato($value);
				break;
			case 10:
				$this->setDescricao($value);
				break;
			case 11:
				$this->setAberto($value);
				break;
			case 12:
				$this->setProtocoloAse($value);
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
		$keys = ComunicadoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUsuarioId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSeguradoId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setComunicanteId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setParentescoId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDataAbertura($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDataFechamento($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setESegurado($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSinistro($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setContrato($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDescricao($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setAberto($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setProtocoloAse($arr[$keys[12]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ComunicadoPeer::DATABASE_NAME);

		if ($this->isColumnModified(ComunicadoPeer::ID)) $criteria->add(ComunicadoPeer::ID, $this->id);
		if ($this->isColumnModified(ComunicadoPeer::USUARIO_ID)) $criteria->add(ComunicadoPeer::USUARIO_ID, $this->usuario_id);
		if ($this->isColumnModified(ComunicadoPeer::SEGURADO_ID)) $criteria->add(ComunicadoPeer::SEGURADO_ID, $this->segurado_id);
		if ($this->isColumnModified(ComunicadoPeer::COMUNICANTE_ID)) $criteria->add(ComunicadoPeer::COMUNICANTE_ID, $this->comunicante_id);
		if ($this->isColumnModified(ComunicadoPeer::PARENTESCO_ID)) $criteria->add(ComunicadoPeer::PARENTESCO_ID, $this->parentesco_id);
		if ($this->isColumnModified(ComunicadoPeer::DATA_ABERTURA)) $criteria->add(ComunicadoPeer::DATA_ABERTURA, $this->data_abertura);
		if ($this->isColumnModified(ComunicadoPeer::DATA_FECHAMENTO)) $criteria->add(ComunicadoPeer::DATA_FECHAMENTO, $this->data_fechamento);
		if ($this->isColumnModified(ComunicadoPeer::E_SEGURADO)) $criteria->add(ComunicadoPeer::E_SEGURADO, $this->e_segurado);
		if ($this->isColumnModified(ComunicadoPeer::SINISTRO)) $criteria->add(ComunicadoPeer::SINISTRO, $this->sinistro);
		if ($this->isColumnModified(ComunicadoPeer::CONTRATO)) $criteria->add(ComunicadoPeer::CONTRATO, $this->contrato);
		if ($this->isColumnModified(ComunicadoPeer::DESCRICAO)) $criteria->add(ComunicadoPeer::DESCRICAO, $this->descricao);
		if ($this->isColumnModified(ComunicadoPeer::ABERTO)) $criteria->add(ComunicadoPeer::ABERTO, $this->aberto);
		if ($this->isColumnModified(ComunicadoPeer::PROTOCOLO_ASE)) $criteria->add(ComunicadoPeer::PROTOCOLO_ASE, $this->protocolo_ase);

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
		$criteria = new Criteria(ComunicadoPeer::DATABASE_NAME);
		$criteria->add(ComunicadoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Comunicado (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setUsuarioId($this->getUsuarioId());
		$copyObj->setSeguradoId($this->getSeguradoId());
		$copyObj->setComunicanteId($this->getComunicanteId());
		$copyObj->setParentescoId($this->getParentescoId());
		$copyObj->setDataAbertura($this->getDataAbertura());
		$copyObj->setDataFechamento($this->getDataFechamento());
		$copyObj->setESegurado($this->getESegurado());
		$copyObj->setSinistro($this->getSinistro());
		$copyObj->setContrato($this->getContrato());
		$copyObj->setDescricao($this->getDescricao());
		$copyObj->setAberto($this->getAberto());
		$copyObj->setProtocoloAse($this->getProtocoloAse());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getContatos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addContato($relObj->copy($deepCopy));
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
	 * @return     Comunicado Clone of current object.
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
	 * @return     ComunicadoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ComunicadoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Parentesco object.
	 *
	 * @param      Parentesco $v
	 * @return     Comunicado The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setParentesco(Parentesco $v = null)
	{
		if ($v === null) {
			$this->setParentescoId(NULL);
		} else {
			$this->setParentescoId($v->getId());
		}

		$this->aParentesco = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Parentesco object, it will not be re-added.
		if ($v !== null) {
			$v->addComunicado($this);
		}

		return $this;
	}


	/**
	 * Get the associated Parentesco object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Parentesco The associated Parentesco object.
	 * @throws     PropelException
	 */
	public function getParentesco(PropelPDO $con = null)
	{
		if ($this->aParentesco === null && ($this->parentesco_id !== null)) {
			$this->aParentesco = ParentescoQuery::create()->findPk($this->parentesco_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aParentesco->addComunicados($this);
			 */
		}
		return $this->aParentesco;
	}

	/**
	 * Declares an association between this object and a Pessoa object.
	 *
	 * @param      Pessoa $v
	 * @return     Comunicado The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPessoaRelatedBySeguradoId(Pessoa $v = null)
	{
		if ($v === null) {
			$this->setSeguradoId(NULL);
		} else {
			$this->setSeguradoId($v->getId());
		}

		$this->aPessoaRelatedBySeguradoId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Pessoa object, it will not be re-added.
		if ($v !== null) {
			$v->addComunicadoRelatedBySeguradoId($this);
		}

		return $this;
	}


	/**
	 * Get the associated Pessoa object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Pessoa The associated Pessoa object.
	 * @throws     PropelException
	 */
	public function getPessoaRelatedBySeguradoId(PropelPDO $con = null)
	{
		if ($this->aPessoaRelatedBySeguradoId === null && ($this->segurado_id !== null)) {
			$this->aPessoaRelatedBySeguradoId = PessoaQuery::create()->findPk($this->segurado_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aPessoaRelatedBySeguradoId->addComunicadosRelatedBySeguradoId($this);
			 */
		}
		return $this->aPessoaRelatedBySeguradoId;
	}

	/**
	 * Declares an association between this object and a Pessoa object.
	 *
	 * @param      Pessoa $v
	 * @return     Comunicado The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPessoaRelatedByComunicanteId(Pessoa $v = null)
	{
		if ($v === null) {
			$this->setComunicanteId(NULL);
		} else {
			$this->setComunicanteId($v->getId());
		}

		$this->aPessoaRelatedByComunicanteId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Pessoa object, it will not be re-added.
		if ($v !== null) {
			$v->addComunicadoRelatedByComunicanteId($this);
		}

		return $this;
	}


	/**
	 * Get the associated Pessoa object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Pessoa The associated Pessoa object.
	 * @throws     PropelException
	 */
	public function getPessoaRelatedByComunicanteId(PropelPDO $con = null)
	{
		if ($this->aPessoaRelatedByComunicanteId === null && ($this->comunicante_id !== null)) {
			$this->aPessoaRelatedByComunicanteId = PessoaQuery::create()->findPk($this->comunicante_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aPessoaRelatedByComunicanteId->addComunicadosRelatedByComunicanteId($this);
			 */
		}
		return $this->aPessoaRelatedByComunicanteId;
	}

	/**
	 * Declares an association between this object and a Usuario object.
	 *
	 * @param      Usuario $v
	 * @return     Comunicado The current object (for fluent API support)
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
			$v->addComunicado($this);
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
				$this->aUsuario->addComunicados($this);
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
		if ('Contato' == $relationName) {
			return $this->initContatos();
		}
	}

	/**
	 * Clears out the collContatos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addContatos()
	 */
	public function clearContatos()
	{
		$this->collContatos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collContatos collection.
	 *
	 * By default this just sets the collContatos collection to an empty array (like clearcollContatos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initContatos($overrideExisting = true)
	{
		if (null !== $this->collContatos && !$overrideExisting) {
			return;
		}
		$this->collContatos = new PropelObjectCollection();
		$this->collContatos->setModel('Contato');
	}

	/**
	 * Gets an array of Contato objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Comunicado is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Contato[] List of Contato objects
	 * @throws     PropelException
	 */
	public function getContatos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collContatos || null !== $criteria) {
			if ($this->isNew() && null === $this->collContatos) {
				// return empty collection
				$this->initContatos();
			} else {
				$collContatos = ContatoQuery::create(null, $criteria)
					->filterByComunicado($this)
					->find($con);
				if (null !== $criteria) {
					return $collContatos;
				}
				$this->collContatos = $collContatos;
			}
		}
		return $this->collContatos;
	}

	/**
	 * Sets a collection of Contato objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $contatos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setContatos(PropelCollection $contatos, PropelPDO $con = null)
	{
		$this->contatosScheduledForDeletion = $this->getContatos(new Criteria(), $con)->diff($contatos);

		foreach ($contatos as $contato) {
			// Fix issue with collection modified by reference
			if ($contato->isNew()) {
				$contato->setComunicado($this);
			}
			$this->addContato($contato);
		}

		$this->collContatos = $contatos;
	}

	/**
	 * Returns the number of related Contato objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Contato objects.
	 * @throws     PropelException
	 */
	public function countContatos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collContatos || null !== $criteria) {
			if ($this->isNew() && null === $this->collContatos) {
				return 0;
			} else {
				$query = ContatoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByComunicado($this)
					->count($con);
			}
		} else {
			return count($this->collContatos);
		}
	}

	/**
	 * Method called to associate a Contato object to this object
	 * through the Contato foreign key attribute.
	 *
	 * @param      Contato $l Contato
	 * @return     Comunicado The current object (for fluent API support)
	 */
	public function addContato(Contato $l)
	{
		if ($this->collContatos === null) {
			$this->initContatos();
		}
		if (!$this->collContatos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddContato($l);
		}

		return $this;
	}

	/**
	 * @param	Contato $contato The contato object to add.
	 */
	protected function doAddContato($contato)
	{
		$this->collContatos[]= $contato;
		$contato->setComunicado($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Comunicado is new, it will return
	 * an empty collection; or if this Comunicado has previously
	 * been saved, it will retrieve related Contatos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Comunicado.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Contato[] List of Contato objects
	 */
	public function getContatosJoinTabulacao($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ContatoQuery::create(null, $criteria);
		$query->joinWith('Tabulacao', $join_behavior);

		return $this->getContatos($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Comunicado is new, it will return
	 * an empty collection; or if this Comunicado has previously
	 * been saved, it will retrieve related Contatos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Comunicado.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Contato[] List of Contato objects
	 */
	public function getContatosJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = ContatoQuery::create(null, $criteria);
		$query->joinWith('Usuario', $join_behavior);

		return $this->getContatos($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->usuario_id = null;
		$this->segurado_id = null;
		$this->comunicante_id = null;
		$this->parentesco_id = null;
		$this->data_abertura = null;
		$this->data_fechamento = null;
		$this->e_segurado = null;
		$this->sinistro = null;
		$this->contrato = null;
		$this->descricao = null;
		$this->aberto = null;
		$this->protocolo_ase = null;
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
			if ($this->collContatos) {
				foreach ($this->collContatos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collContatos instanceof PropelCollection) {
			$this->collContatos->clearIterator();
		}
		$this->collContatos = null;
		$this->aParentesco = null;
		$this->aPessoaRelatedBySeguradoId = null;
		$this->aPessoaRelatedByComunicanteId = null;
		$this->aUsuario = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(ComunicadoPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseComunicado
