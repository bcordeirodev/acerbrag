<?php


/**
 * Base class that represents a row from the 'pergunta' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BasePergunta extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'PerguntaPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        PerguntaPeer
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
	 * The value for the pesquisa_id field.
	 * @var        int
	 */
	protected $pesquisa_id;

	/**
	 * The value for the categoria_id field.
	 * @var        int
	 */
	protected $categoria_id;

	/**
	 * The value for the texto field.
	 * @var        string
	 */
	protected $texto;

	/**
	 * The value for the tipo_resposta field.
	 * @var        int
	 */
	protected $tipo_resposta;

	/**
	 * The value for the posicao field.
	 * @var        int
	 */
	protected $posicao;

	/**
	 * The value for the obrigatoria field.
	 * Note: this column has a database default value of: true
	 * @var        boolean
	 */
	protected $obrigatoria;

	/**
	 * The value for the excecao field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $excecao;

	/**
	 * The value for the gatilho_excecao field.
	 * @var        int
	 */
	protected $gatilho_excecao;

	/**
	 * The value for the pergunta_mae_id field.
	 * @var        int
	 */
	protected $pergunta_mae_id;

	/**
	 * @var        Categoria
	 */
	protected $aCategoria;

	/**
	 * @var        Pesquisa
	 */
	protected $aPesquisa;

	/**
	 * @var        array Alternativa[] Collection to store aggregation of Alternativa objects.
	 */
	protected $collAlternativas;

	/**
	 * @var        array Resposta[] Collection to store aggregation of Resposta objects.
	 */
	protected $collRespostas;

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
	protected $alternativasScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $respostasScheduledForDeletion = null;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->obrigatoria = true;
		$this->excecao = 0;
	}

	/**
	 * Initializes internal state of BasePergunta object.
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
	 * Get the [pesquisa_id] column value.
	 * 
	 * @return     int
	 */
	public function getPesquisaId()
	{
		return $this->pesquisa_id;
	}

	/**
	 * Get the [categoria_id] column value.
	 * 
	 * @return     int
	 */
	public function getCategoriaId()
	{
		return $this->categoria_id;
	}

	/**
	 * Get the [texto] column value.
	 * 
	 * @return     string
	 */
	public function getTexto()
	{
		return $this->texto;
	}

	/**
	 * Get the [tipo_resposta] column value.
	 * 
	 * @return     int
	 */
	public function getTipoResposta()
	{
		return $this->tipo_resposta;
	}

	/**
	 * Get the [posicao] column value.
	 * 
	 * @return     int
	 */
	public function getPosicao()
	{
		return $this->posicao;
	}

	/**
	 * Get the [obrigatoria] column value.
	 * 
	 * @return     boolean
	 */
	public function getObrigatoria()
	{
		return $this->obrigatoria;
	}

	/**
	 * Get the [excecao] column value.
	 * 
	 * @return     int
	 */
	public function getExcecao()
	{
		return $this->excecao;
	}

	/**
	 * Get the [gatilho_excecao] column value.
	 * 
	 * @return     int
	 */
	public function getGatilhoExcecao()
	{
		return $this->gatilho_excecao;
	}

	/**
	 * Get the [pergunta_mae_id] column value.
	 * 
	 * @return     int
	 */
	public function getPerguntaMaeId()
	{
		return $this->pergunta_mae_id;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Pergunta The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PerguntaPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [pesquisa_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Pergunta The current object (for fluent API support)
	 */
	public function setPesquisaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->pesquisa_id !== $v) {
			$this->pesquisa_id = $v;
			$this->modifiedColumns[] = PerguntaPeer::PESQUISA_ID;
		}

		if ($this->aPesquisa !== null && $this->aPesquisa->getId() !== $v) {
			$this->aPesquisa = null;
		}

		return $this;
	} // setPesquisaId()

	/**
	 * Set the value of [categoria_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Pergunta The current object (for fluent API support)
	 */
	public function setCategoriaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->categoria_id !== $v) {
			$this->categoria_id = $v;
			$this->modifiedColumns[] = PerguntaPeer::CATEGORIA_ID;
		}

		if ($this->aCategoria !== null && $this->aCategoria->getId() !== $v) {
			$this->aCategoria = null;
		}

		return $this;
	} // setCategoriaId()

	/**
	 * Set the value of [texto] column.
	 * 
	 * @param      string $v new value
	 * @return     Pergunta The current object (for fluent API support)
	 */
	public function setTexto($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->texto !== $v) {
			$this->texto = $v;
			$this->modifiedColumns[] = PerguntaPeer::TEXTO;
		}

		return $this;
	} // setTexto()

	/**
	 * Set the value of [tipo_resposta] column.
	 * 
	 * @param      int $v new value
	 * @return     Pergunta The current object (for fluent API support)
	 */
	public function setTipoResposta($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->tipo_resposta !== $v) {
			$this->tipo_resposta = $v;
			$this->modifiedColumns[] = PerguntaPeer::TIPO_RESPOSTA;
		}

		return $this;
	} // setTipoResposta()

	/**
	 * Set the value of [posicao] column.
	 * 
	 * @param      int $v new value
	 * @return     Pergunta The current object (for fluent API support)
	 */
	public function setPosicao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->posicao !== $v) {
			$this->posicao = $v;
			$this->modifiedColumns[] = PerguntaPeer::POSICAO;
		}

		return $this;
	} // setPosicao()

	/**
	 * Sets the value of the [obrigatoria] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Pergunta The current object (for fluent API support)
	 */
	public function setObrigatoria($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->obrigatoria !== $v) {
			$this->obrigatoria = $v;
			$this->modifiedColumns[] = PerguntaPeer::OBRIGATORIA;
		}

		return $this;
	} // setObrigatoria()

	/**
	 * Set the value of [excecao] column.
	 * 
	 * @param      int $v new value
	 * @return     Pergunta The current object (for fluent API support)
	 */
	public function setExcecao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->excecao !== $v) {
			$this->excecao = $v;
			$this->modifiedColumns[] = PerguntaPeer::EXCECAO;
		}

		return $this;
	} // setExcecao()

	/**
	 * Set the value of [gatilho_excecao] column.
	 * 
	 * @param      int $v new value
	 * @return     Pergunta The current object (for fluent API support)
	 */
	public function setGatilhoExcecao($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->gatilho_excecao !== $v) {
			$this->gatilho_excecao = $v;
			$this->modifiedColumns[] = PerguntaPeer::GATILHO_EXCECAO;
		}

		return $this;
	} // setGatilhoExcecao()

	/**
	 * Set the value of [pergunta_mae_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Pergunta The current object (for fluent API support)
	 */
	public function setPerguntaMaeId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->pergunta_mae_id !== $v) {
			$this->pergunta_mae_id = $v;
			$this->modifiedColumns[] = PerguntaPeer::PERGUNTA_MAE_ID;
		}

		return $this;
	} // setPerguntaMaeId()

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
			if ($this->obrigatoria !== true) {
				return false;
			}

			if ($this->excecao !== 0) {
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
			$this->pesquisa_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->categoria_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->texto = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->tipo_resposta = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->posicao = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->obrigatoria = ($row[$startcol + 6] !== null) ? (boolean) $row[$startcol + 6] : null;
			$this->excecao = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->gatilho_excecao = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->pergunta_mae_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 10; // 10 = PerguntaPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Pergunta object", $e);
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

		if ($this->aPesquisa !== null && $this->pesquisa_id !== $this->aPesquisa->getId()) {
			$this->aPesquisa = null;
		}
		if ($this->aCategoria !== null && $this->categoria_id !== $this->aCategoria->getId()) {
			$this->aCategoria = null;
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
			$con = Propel::getConnection(PerguntaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = PerguntaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aCategoria = null;
			$this->aPesquisa = null;
			$this->collAlternativas = null;

			$this->collRespostas = null;

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
			$con = Propel::getConnection(PerguntaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = PerguntaQuery::create()
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
			$con = Propel::getConnection(PerguntaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				PerguntaPeer::addInstanceToPool($this);
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

			if ($this->aCategoria !== null) {
				if ($this->aCategoria->isModified() || $this->aCategoria->isNew()) {
					$affectedRows += $this->aCategoria->save($con);
				}
				$this->setCategoria($this->aCategoria);
			}

			if ($this->aPesquisa !== null) {
				if ($this->aPesquisa->isModified() || $this->aPesquisa->isNew()) {
					$affectedRows += $this->aPesquisa->save($con);
				}
				$this->setPesquisa($this->aPesquisa);
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

			if ($this->alternativasScheduledForDeletion !== null) {
				if (!$this->alternativasScheduledForDeletion->isEmpty()) {
					AlternativaQuery::create()
						->filterByPrimaryKeys($this->alternativasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->alternativasScheduledForDeletion = null;
				}
			}

			if ($this->collAlternativas !== null) {
				foreach ($this->collAlternativas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->respostasScheduledForDeletion !== null) {
				if (!$this->respostasScheduledForDeletion->isEmpty()) {
					RespostaQuery::create()
						->filterByPrimaryKeys($this->respostasScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->respostasScheduledForDeletion = null;
				}
			}

			if ($this->collRespostas !== null) {
				foreach ($this->collRespostas as $referrerFK) {
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

		$this->modifiedColumns[] = PerguntaPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . PerguntaPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(PerguntaPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(PerguntaPeer::PESQUISA_ID)) {
			$modifiedColumns[':p' . $index++]  = '`PESQUISA_ID`';
		}
		if ($this->isColumnModified(PerguntaPeer::CATEGORIA_ID)) {
			$modifiedColumns[':p' . $index++]  = '`CATEGORIA_ID`';
		}
		if ($this->isColumnModified(PerguntaPeer::TEXTO)) {
			$modifiedColumns[':p' . $index++]  = '`TEXTO`';
		}
		if ($this->isColumnModified(PerguntaPeer::TIPO_RESPOSTA)) {
			$modifiedColumns[':p' . $index++]  = '`TIPO_RESPOSTA`';
		}
		if ($this->isColumnModified(PerguntaPeer::POSICAO)) {
			$modifiedColumns[':p' . $index++]  = '`POSICAO`';
		}
		if ($this->isColumnModified(PerguntaPeer::OBRIGATORIA)) {
			$modifiedColumns[':p' . $index++]  = '`OBRIGATORIA`';
		}
		if ($this->isColumnModified(PerguntaPeer::EXCECAO)) {
			$modifiedColumns[':p' . $index++]  = '`EXCECAO`';
		}
		if ($this->isColumnModified(PerguntaPeer::GATILHO_EXCECAO)) {
			$modifiedColumns[':p' . $index++]  = '`GATILHO_EXCECAO`';
		}
		if ($this->isColumnModified(PerguntaPeer::PERGUNTA_MAE_ID)) {
			$modifiedColumns[':p' . $index++]  = '`PERGUNTA_MAE_ID`';
		}

		$sql = sprintf(
			'INSERT INTO `pergunta` (%s) VALUES (%s)',
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
					case '`PESQUISA_ID`':						
						$stmt->bindValue($identifier, $this->pesquisa_id, PDO::PARAM_INT);
						break;
					case '`CATEGORIA_ID`':						
						$stmt->bindValue($identifier, $this->categoria_id, PDO::PARAM_INT);
						break;
					case '`TEXTO`':						
						$stmt->bindValue($identifier, $this->texto, PDO::PARAM_STR);
						break;
					case '`TIPO_RESPOSTA`':						
						$stmt->bindValue($identifier, $this->tipo_resposta, PDO::PARAM_INT);
						break;
					case '`POSICAO`':						
						$stmt->bindValue($identifier, $this->posicao, PDO::PARAM_INT);
						break;
					case '`OBRIGATORIA`':
						$stmt->bindValue($identifier, (int) $this->obrigatoria, PDO::PARAM_INT);
						break;
					case '`EXCECAO`':						
						$stmt->bindValue($identifier, $this->excecao, PDO::PARAM_INT);
						break;
					case '`GATILHO_EXCECAO`':						
						$stmt->bindValue($identifier, $this->gatilho_excecao, PDO::PARAM_INT);
						break;
					case '`PERGUNTA_MAE_ID`':						
						$stmt->bindValue($identifier, $this->pergunta_mae_id, PDO::PARAM_INT);
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
		$pos = PerguntaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getPesquisaId();
				break;
			case 2:
				return $this->getCategoriaId();
				break;
			case 3:
				return $this->getTexto();
				break;
			case 4:
				return $this->getTipoResposta();
				break;
			case 5:
				return $this->getPosicao();
				break;
			case 6:
				return $this->getObrigatoria();
				break;
			case 7:
				return $this->getExcecao();
				break;
			case 8:
				return $this->getGatilhoExcecao();
				break;
			case 9:
				return $this->getPerguntaMaeId();
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
		if (isset($alreadyDumpedObjects['Pergunta'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Pergunta'][$this->getPrimaryKey()] = true;
		$keys = PerguntaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getPesquisaId(),
			$keys[2] => $this->getCategoriaId(),
			$keys[3] => $this->getTexto(),
			$keys[4] => $this->getTipoResposta(),
			$keys[5] => $this->getPosicao(),
			$keys[6] => $this->getObrigatoria(),
			$keys[7] => $this->getExcecao(),
			$keys[8] => $this->getGatilhoExcecao(),
			$keys[9] => $this->getPerguntaMaeId(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aCategoria) {
				$result['Categoria'] = $this->aCategoria->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aPesquisa) {
				$result['Pesquisa'] = $this->aPesquisa->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collAlternativas) {
				$result['Alternativas'] = $this->collAlternativas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collRespostas) {
				$result['Respostas'] = $this->collRespostas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = PerguntaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setPesquisaId($value);
				break;
			case 2:
				$this->setCategoriaId($value);
				break;
			case 3:
				$this->setTexto($value);
				break;
			case 4:
				$this->setTipoResposta($value);
				break;
			case 5:
				$this->setPosicao($value);
				break;
			case 6:
				$this->setObrigatoria($value);
				break;
			case 7:
				$this->setExcecao($value);
				break;
			case 8:
				$this->setGatilhoExcecao($value);
				break;
			case 9:
				$this->setPerguntaMaeId($value);
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
		$keys = PerguntaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPesquisaId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCategoriaId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTexto($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipoResposta($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPosicao($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setObrigatoria($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setExcecao($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setGatilhoExcecao($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPerguntaMaeId($arr[$keys[9]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(PerguntaPeer::DATABASE_NAME);

		if ($this->isColumnModified(PerguntaPeer::ID)) $criteria->add(PerguntaPeer::ID, $this->id);
		if ($this->isColumnModified(PerguntaPeer::PESQUISA_ID)) $criteria->add(PerguntaPeer::PESQUISA_ID, $this->pesquisa_id);
		if ($this->isColumnModified(PerguntaPeer::CATEGORIA_ID)) $criteria->add(PerguntaPeer::CATEGORIA_ID, $this->categoria_id);
		if ($this->isColumnModified(PerguntaPeer::TEXTO)) $criteria->add(PerguntaPeer::TEXTO, $this->texto);
		if ($this->isColumnModified(PerguntaPeer::TIPO_RESPOSTA)) $criteria->add(PerguntaPeer::TIPO_RESPOSTA, $this->tipo_resposta);
		if ($this->isColumnModified(PerguntaPeer::POSICAO)) $criteria->add(PerguntaPeer::POSICAO, $this->posicao);
		if ($this->isColumnModified(PerguntaPeer::OBRIGATORIA)) $criteria->add(PerguntaPeer::OBRIGATORIA, $this->obrigatoria);
		if ($this->isColumnModified(PerguntaPeer::EXCECAO)) $criteria->add(PerguntaPeer::EXCECAO, $this->excecao);
		if ($this->isColumnModified(PerguntaPeer::GATILHO_EXCECAO)) $criteria->add(PerguntaPeer::GATILHO_EXCECAO, $this->gatilho_excecao);
		if ($this->isColumnModified(PerguntaPeer::PERGUNTA_MAE_ID)) $criteria->add(PerguntaPeer::PERGUNTA_MAE_ID, $this->pergunta_mae_id);

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
		$criteria = new Criteria(PerguntaPeer::DATABASE_NAME);
		$criteria->add(PerguntaPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Pergunta (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setPesquisaId($this->getPesquisaId());
		$copyObj->setCategoriaId($this->getCategoriaId());
		$copyObj->setTexto($this->getTexto());
		$copyObj->setTipoResposta($this->getTipoResposta());
		$copyObj->setPosicao($this->getPosicao());
		$copyObj->setObrigatoria($this->getObrigatoria());
		$copyObj->setExcecao($this->getExcecao());
		$copyObj->setGatilhoExcecao($this->getGatilhoExcecao());
		$copyObj->setPerguntaMaeId($this->getPerguntaMaeId());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getAlternativas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAlternativa($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRespostas() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addResposta($relObj->copy($deepCopy));
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
	 * @return     Pergunta Clone of current object.
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
	 * @return     PerguntaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PerguntaPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Categoria object.
	 *
	 * @param      Categoria $v
	 * @return     Pergunta The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setCategoria(Categoria $v = null)
	{
		if ($v === null) {
			$this->setCategoriaId(NULL);
		} else {
			$this->setCategoriaId($v->getId());
		}

		$this->aCategoria = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Categoria object, it will not be re-added.
		if ($v !== null) {
			$v->addPergunta($this);
		}

		return $this;
	}


	/**
	 * Get the associated Categoria object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Categoria The associated Categoria object.
	 * @throws     PropelException
	 */
	public function getCategoria(PropelPDO $con = null)
	{
		if ($this->aCategoria === null && ($this->categoria_id !== null)) {
			$this->aCategoria = CategoriaQuery::create()->findPk($this->categoria_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aCategoria->addPerguntas($this);
			 */
		}
		return $this->aCategoria;
	}

	/**
	 * Declares an association between this object and a Pesquisa object.
	 *
	 * @param      Pesquisa $v
	 * @return     Pergunta The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setPesquisa(Pesquisa $v = null)
	{
		if ($v === null) {
			$this->setPesquisaId(NULL);
		} else {
			$this->setPesquisaId($v->getId());
		}

		$this->aPesquisa = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Pesquisa object, it will not be re-added.
		if ($v !== null) {
			$v->addPergunta($this);
		}

		return $this;
	}


	/**
	 * Get the associated Pesquisa object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Pesquisa The associated Pesquisa object.
	 * @throws     PropelException
	 */
	public function getPesquisa(PropelPDO $con = null)
	{
		if ($this->aPesquisa === null && ($this->pesquisa_id !== null)) {
			$this->aPesquisa = PesquisaQuery::create()->findPk($this->pesquisa_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aPesquisa->addPerguntas($this);
			 */
		}
		return $this->aPesquisa;
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
		if ('Alternativa' == $relationName) {
			return $this->initAlternativas();
		}
		if ('Resposta' == $relationName) {
			return $this->initRespostas();
		}
	}

	/**
	 * Clears out the collAlternativas collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAlternativas()
	 */
	public function clearAlternativas()
	{
		$this->collAlternativas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAlternativas collection.
	 *
	 * By default this just sets the collAlternativas collection to an empty array (like clearcollAlternativas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initAlternativas($overrideExisting = true)
	{
		if (null !== $this->collAlternativas && !$overrideExisting) {
			return;
		}
		$this->collAlternativas = new PropelObjectCollection();
		$this->collAlternativas->setModel('Alternativa');
	}

	/**
	 * Gets an array of Alternativa objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Pergunta is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Alternativa[] List of Alternativa objects
	 * @throws     PropelException
	 */
	public function getAlternativas($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAlternativas || null !== $criteria) {
			if ($this->isNew() && null === $this->collAlternativas) {
				// return empty collection
				$this->initAlternativas();
			} else {
				$collAlternativas = AlternativaQuery::create(null, $criteria)
					->filterByPergunta($this)
					->find($con);
				if (null !== $criteria) {
					return $collAlternativas;
				}
				$this->collAlternativas = $collAlternativas;
			}
		}
		return $this->collAlternativas;
	}

	/**
	 * Sets a collection of Alternativa objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $alternativas A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setAlternativas(PropelCollection $alternativas, PropelPDO $con = null)
	{
		$this->alternativasScheduledForDeletion = $this->getAlternativas(new Criteria(), $con)->diff($alternativas);

		foreach ($alternativas as $alternativa) {
			// Fix issue with collection modified by reference
			if ($alternativa->isNew()) {
				$alternativa->setPergunta($this);
			}
			$this->addAlternativa($alternativa);
		}

		$this->collAlternativas = $alternativas;
	}

	/**
	 * Returns the number of related Alternativa objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Alternativa objects.
	 * @throws     PropelException
	 */
	public function countAlternativas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAlternativas || null !== $criteria) {
			if ($this->isNew() && null === $this->collAlternativas) {
				return 0;
			} else {
				$query = AlternativaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPergunta($this)
					->count($con);
			}
		} else {
			return count($this->collAlternativas);
		}
	}

	/**
	 * Method called to associate a Alternativa object to this object
	 * through the Alternativa foreign key attribute.
	 *
	 * @param      Alternativa $l Alternativa
	 * @return     Pergunta The current object (for fluent API support)
	 */
	public function addAlternativa(Alternativa $l)
	{
		if ($this->collAlternativas === null) {
			$this->initAlternativas();
		}
		if (!$this->collAlternativas->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddAlternativa($l);
		}

		return $this;
	}

	/**
	 * @param	Alternativa $alternativa The alternativa object to add.
	 */
	protected function doAddAlternativa($alternativa)
	{
		$this->collAlternativas[]= $alternativa;
		$alternativa->setPergunta($this);
	}

	/**
	 * Clears out the collRespostas collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addRespostas()
	 */
	public function clearRespostas()
	{
		$this->collRespostas = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collRespostas collection.
	 *
	 * By default this just sets the collRespostas collection to an empty array (like clearcollRespostas());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initRespostas($overrideExisting = true)
	{
		if (null !== $this->collRespostas && !$overrideExisting) {
			return;
		}
		$this->collRespostas = new PropelObjectCollection();
		$this->collRespostas->setModel('Resposta');
	}

	/**
	 * Gets an array of Resposta objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Pergunta is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Resposta[] List of Resposta objects
	 * @throws     PropelException
	 */
	public function getRespostas($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collRespostas || null !== $criteria) {
			if ($this->isNew() && null === $this->collRespostas) {
				// return empty collection
				$this->initRespostas();
			} else {
				$collRespostas = RespostaQuery::create(null, $criteria)
					->filterByPergunta($this)
					->find($con);
				if (null !== $criteria) {
					return $collRespostas;
				}
				$this->collRespostas = $collRespostas;
			}
		}
		return $this->collRespostas;
	}

	/**
	 * Sets a collection of Resposta objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $respostas A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setRespostas(PropelCollection $respostas, PropelPDO $con = null)
	{
		$this->respostasScheduledForDeletion = $this->getRespostas(new Criteria(), $con)->diff($respostas);

		foreach ($respostas as $resposta) {
			// Fix issue with collection modified by reference
			if ($resposta->isNew()) {
				$resposta->setPergunta($this);
			}
			$this->addResposta($resposta);
		}

		$this->collRespostas = $respostas;
	}

	/**
	 * Returns the number of related Resposta objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Resposta objects.
	 * @throws     PropelException
	 */
	public function countRespostas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collRespostas || null !== $criteria) {
			if ($this->isNew() && null === $this->collRespostas) {
				return 0;
			} else {
				$query = RespostaQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByPergunta($this)
					->count($con);
			}
		} else {
			return count($this->collRespostas);
		}
	}

	/**
	 * Method called to associate a Resposta object to this object
	 * through the Resposta foreign key attribute.
	 *
	 * @param      Resposta $l Resposta
	 * @return     Pergunta The current object (for fluent API support)
	 */
	public function addResposta(Resposta $l)
	{
		if ($this->collRespostas === null) {
			$this->initRespostas();
		}
		if (!$this->collRespostas->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddResposta($l);
		}

		return $this;
	}

	/**
	 * @param	Resposta $resposta The resposta object to add.
	 */
	protected function doAddResposta($resposta)
	{
		$this->collRespostas[]= $resposta;
		$resposta->setPergunta($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pergunta is new, it will return
	 * an empty collection; or if this Pergunta has previously
	 * been saved, it will retrieve related Respostas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pergunta.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Resposta[] List of Resposta objects
	 */
	public function getRespostasJoinColetaPesquisa($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = RespostaQuery::create(null, $criteria);
		$query->joinWith('ColetaPesquisa', $join_behavior);

		return $this->getRespostas($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Pergunta is new, it will return
	 * an empty collection; or if this Pergunta has previously
	 * been saved, it will retrieve related Respostas from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Pergunta.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Resposta[] List of Resposta objects
	 */
	public function getRespostasJoinAlternativa($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = RespostaQuery::create(null, $criteria);
		$query->joinWith('Alternativa', $join_behavior);

		return $this->getRespostas($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->pesquisa_id = null;
		$this->categoria_id = null;
		$this->texto = null;
		$this->tipo_resposta = null;
		$this->posicao = null;
		$this->obrigatoria = null;
		$this->excecao = null;
		$this->gatilho_excecao = null;
		$this->pergunta_mae_id = null;
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
			if ($this->collAlternativas) {
				foreach ($this->collAlternativas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRespostas) {
				foreach ($this->collRespostas as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collAlternativas instanceof PropelCollection) {
			$this->collAlternativas->clearIterator();
		}
		$this->collAlternativas = null;
		if ($this->collRespostas instanceof PropelCollection) {
			$this->collRespostas->clearIterator();
		}
		$this->collRespostas = null;
		$this->aCategoria = null;
		$this->aPesquisa = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(PerguntaPeer::DEFAULT_STRING_FORMAT);
	}

} // BasePergunta
