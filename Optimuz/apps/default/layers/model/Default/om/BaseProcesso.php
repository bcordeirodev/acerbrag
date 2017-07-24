<?php


/**
 * Base class that represents a row from the 'processo' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseProcesso extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'ProcessoPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        ProcessoPeer
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
	 * The value for the cliente_id field.
	 * @var        int
	 */
	protected $cliente_id;

	/**
	 * The value for the contrato_id field.
	 * @var        int
	 */
	protected $contrato_id;

	/**
	 * The value for the fase_processo_id field.
	 * @var        int
	 */
	protected $fase_processo_id;

	/**
	 * The value for the area_advocacia_id field.
	 * @var        int
	 */
	protected $area_advocacia_id;

	/**
	 * The value for the tribunal_id field.
	 * @var        int
	 */
	protected $tribunal_id;

	/**
	 * The value for the uf_id field.
	 * @var        int
	 */
	protected $uf_id;

	/**
	 * The value for the nome_processo field.
	 * @var        string
	 */
	protected $nome_processo;

	/**
	 * The value for the numero_cnj field.
	 * @var        string
	 */
	protected $numero_cnj;

	/**
	 * The value for the numero_processo field.
	 * @var        string
	 */
	protected $numero_processo;

	/**
	 * The value for the tipo_processo field.
	 * @var        string
	 */
	protected $tipo_processo;

	/**
	 * The value for the situacao_cliente field.
	 * @var        string
	 */
	protected $situacao_cliente;

	/**
	 * The value for the descricao field.
	 * @var        string
	 */
	protected $descricao;

	/**
	 * The value for the objetivo_final field.
	 * @var        string
	 */
	protected $objetivo_final;

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
	 * @var        boolean
	 */
	protected $ativo;

	/**
	 * The value for the valor_causa field.
	 * @var        string
	 */
	protected $valor_causa;

	/**
	 * The value for the valor_processo field.
	 * @var        string
	 */
	protected $valor_processo;

	/**
	 * The value for the valor_contigencia field.
	 * @var        string
	 */
	protected $valor_contigencia;

	/**
	 * The value for the valor_garantia_juizo field.
	 * @var        string
	 */
	protected $valor_garantia_juizo;

	/**
	 * The value for the valor_deposito_recursal field.
	 * @var        string
	 */
	protected $valor_deposito_recursal;

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
	 * @var        Contrato
	 */
	protected $aContrato;

	/**
	 * @var        FaseProcesso
	 */
	protected $aFaseProcesso;

	/**
	 * @var        Tribunal
	 */
	protected $aTribunal;

	/**
	 * @var        Uf
	 */
	protected $aUf;

	/**
	 * @var        Cliente
	 */
	protected $aCliente;

	/**
	 * @var        array AndamentoProcesso[] Collection to store aggregation of AndamentoProcesso objects.
	 */
	protected $collAndamentoProcessos;

	/**
	 * @var        array AnotacaoProcesso[] Collection to store aggregation of AnotacaoProcesso objects.
	 */
	protected $collAnotacaoProcessos;

	/**
	 * @var        array CasoProcesso[] Collection to store aggregation of CasoProcesso objects.
	 */
	protected $collCasoProcessos;

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
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $andamentoProcessosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $anotacaoProcessosScheduledForDeletion = null;

	/**
	 * An array of objects scheduled for deletion.
	 * @var		array
	 */
	protected $casoProcessosScheduledForDeletion = null;

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
	 * Get the [cliente_id] column value.
	 * 
	 * @return     int
	 */
	public function getClienteId()
	{
		return $this->cliente_id;
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
	 * Get the [fase_processo_id] column value.
	 * 
	 * @return     int
	 */
	public function getFaseProcessoId()
	{
		return $this->fase_processo_id;
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
	 * Get the [tribunal_id] column value.
	 * 
	 * @return     int
	 */
	public function getTribunalId()
	{
		return $this->tribunal_id;
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
	 * Get the [nome_processo] column value.
	 * 
	 * @return     string
	 */
	public function getNomeProcesso()
	{
		return $this->nome_processo;
	}

	/**
	 * Get the [numero_cnj] column value.
	 * 
	 * @return     string
	 */
	public function getNumeroCnj()
	{
		return $this->numero_cnj;
	}

	/**
	 * Get the [numero_processo] column value.
	 * 
	 * @return     string
	 */
	public function getNumeroProcesso()
	{
		return $this->numero_processo;
	}

	/**
	 * Get the [tipo_processo] column value.
	 * 
	 * @return     string
	 */
	public function getTipoProcesso()
	{
		return $this->tipo_processo;
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
	 * Get the [descricao] column value.
	 * 
	 * @return     string
	 */
	public function getDescricao()
	{
		return $this->descricao;
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
	 * Get the [valor_causa] column value.
	 * 
	 * @return     string
	 */
	public function getValorCausa()
	{
		return $this->valor_causa;
	}

	/**
	 * Get the [valor_processo] column value.
	 * 
	 * @return     string
	 */
	public function getValorProcesso()
	{
		return $this->valor_processo;
	}

	/**
	 * Get the [valor_contigencia] column value.
	 * 
	 * @return     string
	 */
	public function getValorContigencia()
	{
		return $this->valor_contigencia;
	}

	/**
	 * Get the [valor_garantia_juizo] column value.
	 * 
	 * @return     string
	 */
	public function getValorGarantiaJuizo()
	{
		return $this->valor_garantia_juizo;
	}

	/**
	 * Get the [valor_deposito_recursal] column value.
	 * 
	 * @return     string
	 */
	public function getValorDepositoRecursal()
	{
		return $this->valor_deposito_recursal;
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
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ProcessoPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [advogado_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setAdvogadoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->advogado_id !== $v) {
			$this->advogado_id = $v;
			$this->modifiedColumns[] = ProcessoPeer::ADVOGADO_ID;
		}

		if ($this->aAdvogado !== null && $this->aAdvogado->getId() !== $v) {
			$this->aAdvogado = null;
		}

		return $this;
	} // setAdvogadoId()

	/**
	 * Set the value of [cliente_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setClienteId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cliente_id !== $v) {
			$this->cliente_id = $v;
			$this->modifiedColumns[] = ProcessoPeer::CLIENTE_ID;
		}

		if ($this->aCliente !== null && $this->aCliente->getId() !== $v) {
			$this->aCliente = null;
		}

		return $this;
	} // setClienteId()

	/**
	 * Set the value of [contrato_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setContratoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->contrato_id !== $v) {
			$this->contrato_id = $v;
			$this->modifiedColumns[] = ProcessoPeer::CONTRATO_ID;
		}

		if ($this->aContrato !== null && $this->aContrato->getId() !== $v) {
			$this->aContrato = null;
		}

		return $this;
	} // setContratoId()

	/**
	 * Set the value of [fase_processo_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setFaseProcessoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fase_processo_id !== $v) {
			$this->fase_processo_id = $v;
			$this->modifiedColumns[] = ProcessoPeer::FASE_PROCESSO_ID;
		}

		if ($this->aFaseProcesso !== null && $this->aFaseProcesso->getId() !== $v) {
			$this->aFaseProcesso = null;
		}

		return $this;
	} // setFaseProcessoId()

	/**
	 * Set the value of [area_advocacia_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setAreaAdvocaciaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->area_advocacia_id !== $v) {
			$this->area_advocacia_id = $v;
			$this->modifiedColumns[] = ProcessoPeer::AREA_ADVOCACIA_ID;
		}

		if ($this->aAreaAdvocacia !== null && $this->aAreaAdvocacia->getId() !== $v) {
			$this->aAreaAdvocacia = null;
		}

		return $this;
	} // setAreaAdvocaciaId()

	/**
	 * Set the value of [tribunal_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setTribunalId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->tribunal_id !== $v) {
			$this->tribunal_id = $v;
			$this->modifiedColumns[] = ProcessoPeer::TRIBUNAL_ID;
		}

		if ($this->aTribunal !== null && $this->aTribunal->getId() !== $v) {
			$this->aTribunal = null;
		}

		return $this;
	} // setTribunalId()

	/**
	 * Set the value of [uf_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setUfId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->uf_id !== $v) {
			$this->uf_id = $v;
			$this->modifiedColumns[] = ProcessoPeer::UF_ID;
		}

		if ($this->aUf !== null && $this->aUf->getId() !== $v) {
			$this->aUf = null;
		}

		return $this;
	} // setUfId()

	/**
	 * Set the value of [nome_processo] column.
	 * 
	 * @param      string $v new value
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setNomeProcesso($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nome_processo !== $v) {
			$this->nome_processo = $v;
			$this->modifiedColumns[] = ProcessoPeer::NOME_PROCESSO;
		}

		return $this;
	} // setNomeProcesso()

	/**
	 * Set the value of [numero_cnj] column.
	 * 
	 * @param      string $v new value
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setNumeroCnj($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->numero_cnj !== $v) {
			$this->numero_cnj = $v;
			$this->modifiedColumns[] = ProcessoPeer::NUMERO_CNJ;
		}

		return $this;
	} // setNumeroCnj()

	/**
	 * Set the value of [numero_processo] column.
	 * 
	 * @param      string $v new value
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setNumeroProcesso($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->numero_processo !== $v) {
			$this->numero_processo = $v;
			$this->modifiedColumns[] = ProcessoPeer::NUMERO_PROCESSO;
		}

		return $this;
	} // setNumeroProcesso()

	/**
	 * Set the value of [tipo_processo] column.
	 * 
	 * @param      string $v new value
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setTipoProcesso($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->tipo_processo !== $v) {
			$this->tipo_processo = $v;
			$this->modifiedColumns[] = ProcessoPeer::TIPO_PROCESSO;
		}

		return $this;
	} // setTipoProcesso()

	/**
	 * Set the value of [situacao_cliente] column.
	 * 
	 * @param      string $v new value
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setSituacaoCliente($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->situacao_cliente !== $v) {
			$this->situacao_cliente = $v;
			$this->modifiedColumns[] = ProcessoPeer::SITUACAO_CLIENTE;
		}

		return $this;
	} // setSituacaoCliente()

	/**
	 * Set the value of [descricao] column.
	 * 
	 * @param      string $v new value
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setDescricao($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descricao !== $v) {
			$this->descricao = $v;
			$this->modifiedColumns[] = ProcessoPeer::DESCRICAO;
		}

		return $this;
	} // setDescricao()

	/**
	 * Set the value of [objetivo_final] column.
	 * 
	 * @param      string $v new value
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setObjetivoFinal($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->objetivo_final !== $v) {
			$this->objetivo_final = $v;
			$this->modifiedColumns[] = ProcessoPeer::OBJETIVO_FINAL;
		}

		return $this;
	} // setObjetivoFinal()

	/**
	 * Sets the value of [data_abertura] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setDataAbertura($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_abertura !== null || $dt !== null) {
			$currentDateAsString = ($this->data_abertura !== null && $tmpDt = new DateTime($this->data_abertura)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_abertura = $newDateAsString;
				$this->modifiedColumns[] = ProcessoPeer::DATA_ABERTURA;
			}
		} // if either are not null

		return $this;
	} // setDataAbertura()

	/**
	 * Sets the value of [data_fechamento] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setDataFechamento($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->data_fechamento !== null || $dt !== null) {
			$currentDateAsString = ($this->data_fechamento !== null && $tmpDt = new DateTime($this->data_fechamento)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->data_fechamento = $newDateAsString;
				$this->modifiedColumns[] = ProcessoPeer::DATA_FECHAMENTO;
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
	 * @return     Processo The current object (for fluent API support)
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
			$this->modifiedColumns[] = ProcessoPeer::ATIVO;
		}

		return $this;
	} // setAtivo()

	/**
	 * Set the value of [valor_causa] column.
	 * 
	 * @param      string $v new value
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setValorCausa($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->valor_causa !== $v) {
			$this->valor_causa = $v;
			$this->modifiedColumns[] = ProcessoPeer::VALOR_CAUSA;
		}

		return $this;
	} // setValorCausa()

	/**
	 * Set the value of [valor_processo] column.
	 * 
	 * @param      string $v new value
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setValorProcesso($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->valor_processo !== $v) {
			$this->valor_processo = $v;
			$this->modifiedColumns[] = ProcessoPeer::VALOR_PROCESSO;
		}

		return $this;
	} // setValorProcesso()

	/**
	 * Set the value of [valor_contigencia] column.
	 * 
	 * @param      string $v new value
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setValorContigencia($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->valor_contigencia !== $v) {
			$this->valor_contigencia = $v;
			$this->modifiedColumns[] = ProcessoPeer::VALOR_CONTIGENCIA;
		}

		return $this;
	} // setValorContigencia()

	/**
	 * Set the value of [valor_garantia_juizo] column.
	 * 
	 * @param      string $v new value
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setValorGarantiaJuizo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->valor_garantia_juizo !== $v) {
			$this->valor_garantia_juizo = $v;
			$this->modifiedColumns[] = ProcessoPeer::VALOR_GARANTIA_JUIZO;
		}

		return $this;
	} // setValorGarantiaJuizo()

	/**
	 * Set the value of [valor_deposito_recursal] column.
	 * 
	 * @param      string $v new value
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setValorDepositoRecursal($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->valor_deposito_recursal !== $v) {
			$this->valor_deposito_recursal = $v;
			$this->modifiedColumns[] = ProcessoPeer::VALOR_DEPOSITO_RECURSAL;
		}

		return $this;
	} // setValorDepositoRecursal()

	/**
	 * Set the value of [analise_risco] column.
	 * 
	 * @param      string $v new value
	 * @return     Processo The current object (for fluent API support)
	 */
	public function setAnaliseRisco($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->analise_risco !== $v) {
			$this->analise_risco = $v;
			$this->modifiedColumns[] = ProcessoPeer::ANALISE_RISCO;
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
			$this->cliente_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->contrato_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->fase_processo_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->area_advocacia_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->tribunal_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->uf_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->nome_processo = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->numero_cnj = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->numero_processo = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->tipo_processo = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->situacao_cliente = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
			$this->descricao = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->objetivo_final = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->data_abertura = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->data_fechamento = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
			$this->ativo = ($row[$startcol + 17] !== null) ? (boolean) $row[$startcol + 17] : null;
			$this->valor_causa = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
			$this->valor_processo = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
			$this->valor_contigencia = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
			$this->valor_garantia_juizo = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
			$this->valor_deposito_recursal = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
			$this->analise_risco = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 24; // 24 = ProcessoPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Processo object", $e);
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
		if ($this->aCliente !== null && $this->cliente_id !== $this->aCliente->getId()) {
			$this->aCliente = null;
		}
		if ($this->aContrato !== null && $this->contrato_id !== $this->aContrato->getId()) {
			$this->aContrato = null;
		}
		if ($this->aFaseProcesso !== null && $this->fase_processo_id !== $this->aFaseProcesso->getId()) {
			$this->aFaseProcesso = null;
		}
		if ($this->aAreaAdvocacia !== null && $this->area_advocacia_id !== $this->aAreaAdvocacia->getId()) {
			$this->aAreaAdvocacia = null;
		}
		if ($this->aTribunal !== null && $this->tribunal_id !== $this->aTribunal->getId()) {
			$this->aTribunal = null;
		}
		if ($this->aUf !== null && $this->uf_id !== $this->aUf->getId()) {
			$this->aUf = null;
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
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = ProcessoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aAdvogado = null;
			$this->aAreaAdvocacia = null;
			$this->aContrato = null;
			$this->aFaseProcesso = null;
			$this->aTribunal = null;
			$this->aUf = null;
			$this->aCliente = null;
			$this->collAndamentoProcessos = null;

			$this->collAnotacaoProcessos = null;

			$this->collCasoProcessos = null;

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
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = ProcessoQuery::create()
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
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				ProcessoPeer::addInstanceToPool($this);
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

			if ($this->aContrato !== null) {
				if ($this->aContrato->isModified() || $this->aContrato->isNew()) {
					$affectedRows += $this->aContrato->save($con);
				}
				$this->setContrato($this->aContrato);
			}

			if ($this->aFaseProcesso !== null) {
				if ($this->aFaseProcesso->isModified() || $this->aFaseProcesso->isNew()) {
					$affectedRows += $this->aFaseProcesso->save($con);
				}
				$this->setFaseProcesso($this->aFaseProcesso);
			}

			if ($this->aTribunal !== null) {
				if ($this->aTribunal->isModified() || $this->aTribunal->isNew()) {
					$affectedRows += $this->aTribunal->save($con);
				}
				$this->setTribunal($this->aTribunal);
			}

			if ($this->aUf !== null) {
				if ($this->aUf->isModified() || $this->aUf->isNew()) {
					$affectedRows += $this->aUf->save($con);
				}
				$this->setUf($this->aUf);
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
					CasoProcessoQuery::create()
						->filterByPrimaryKeys($this->casosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->casosScheduledForDeletion = null;
				}

				foreach ($this->getCasos() as $caso) {
					if ($caso->isModified()) {
						$caso->save($con);
					}
				}
			}

			if ($this->andamentoProcessosScheduledForDeletion !== null) {
				if (!$this->andamentoProcessosScheduledForDeletion->isEmpty()) {
					AndamentoProcessoQuery::create()
						->filterByPrimaryKeys($this->andamentoProcessosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->andamentoProcessosScheduledForDeletion = null;
				}
			}

			if ($this->collAndamentoProcessos !== null) {
				foreach ($this->collAndamentoProcessos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->anotacaoProcessosScheduledForDeletion !== null) {
				if (!$this->anotacaoProcessosScheduledForDeletion->isEmpty()) {
					AnotacaoProcessoQuery::create()
						->filterByPrimaryKeys($this->anotacaoProcessosScheduledForDeletion->getPrimaryKeys(false))
						->delete($con);
					$this->anotacaoProcessosScheduledForDeletion = null;
				}
			}

			if ($this->collAnotacaoProcessos !== null) {
				foreach ($this->collAnotacaoProcessos as $referrerFK) {
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

		$this->modifiedColumns[] = ProcessoPeer::ID;
		if (null !== $this->id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProcessoPeer::ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(ProcessoPeer::ID)) {
			$modifiedColumns[':p' . $index++]  = '`ID`';
		}
		if ($this->isColumnModified(ProcessoPeer::ADVOGADO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`ADVOGADO_ID`';
		}
		if ($this->isColumnModified(ProcessoPeer::CLIENTE_ID)) {
			$modifiedColumns[':p' . $index++]  = '`CLIENTE_ID`';
		}
		if ($this->isColumnModified(ProcessoPeer::CONTRATO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`CONTRATO_ID`';
		}
		if ($this->isColumnModified(ProcessoPeer::FASE_PROCESSO_ID)) {
			$modifiedColumns[':p' . $index++]  = '`FASE_PROCESSO_ID`';
		}
		if ($this->isColumnModified(ProcessoPeer::AREA_ADVOCACIA_ID)) {
			$modifiedColumns[':p' . $index++]  = '`AREA_ADVOCACIA_ID`';
		}
		if ($this->isColumnModified(ProcessoPeer::TRIBUNAL_ID)) {
			$modifiedColumns[':p' . $index++]  = '`TRIBUNAL_ID`';
		}
		if ($this->isColumnModified(ProcessoPeer::UF_ID)) {
			$modifiedColumns[':p' . $index++]  = '`UF_ID`';
		}
		if ($this->isColumnModified(ProcessoPeer::NOME_PROCESSO)) {
			$modifiedColumns[':p' . $index++]  = '`NOME_PROCESSO`';
		}
		if ($this->isColumnModified(ProcessoPeer::NUMERO_CNJ)) {
			$modifiedColumns[':p' . $index++]  = '`NUMERO_CNJ`';
		}
		if ($this->isColumnModified(ProcessoPeer::NUMERO_PROCESSO)) {
			$modifiedColumns[':p' . $index++]  = '`NUMERO_PROCESSO`';
		}
		if ($this->isColumnModified(ProcessoPeer::TIPO_PROCESSO)) {
			$modifiedColumns[':p' . $index++]  = '`TIPO_PROCESSO`';
		}
		if ($this->isColumnModified(ProcessoPeer::SITUACAO_CLIENTE)) {
			$modifiedColumns[':p' . $index++]  = '`SITUACAO_CLIENTE`';
		}
		if ($this->isColumnModified(ProcessoPeer::DESCRICAO)) {
			$modifiedColumns[':p' . $index++]  = '`DESCRICAO`';
		}
		if ($this->isColumnModified(ProcessoPeer::OBJETIVO_FINAL)) {
			$modifiedColumns[':p' . $index++]  = '`OBJETIVO_FINAL`';
		}
		if ($this->isColumnModified(ProcessoPeer::DATA_ABERTURA)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_ABERTURA`';
		}
		if ($this->isColumnModified(ProcessoPeer::DATA_FECHAMENTO)) {
			$modifiedColumns[':p' . $index++]  = '`DATA_FECHAMENTO`';
		}
		if ($this->isColumnModified(ProcessoPeer::ATIVO)) {
			$modifiedColumns[':p' . $index++]  = '`ATIVO`';
		}
		if ($this->isColumnModified(ProcessoPeer::VALOR_CAUSA)) {
			$modifiedColumns[':p' . $index++]  = '`VALOR_CAUSA`';
		}
		if ($this->isColumnModified(ProcessoPeer::VALOR_PROCESSO)) {
			$modifiedColumns[':p' . $index++]  = '`VALOR_PROCESSO`';
		}
		if ($this->isColumnModified(ProcessoPeer::VALOR_CONTIGENCIA)) {
			$modifiedColumns[':p' . $index++]  = '`VALOR_CONTIGENCIA`';
		}
		if ($this->isColumnModified(ProcessoPeer::VALOR_GARANTIA_JUIZO)) {
			$modifiedColumns[':p' . $index++]  = '`VALOR_GARANTIA_JUIZO`';
		}
		if ($this->isColumnModified(ProcessoPeer::VALOR_DEPOSITO_RECURSAL)) {
			$modifiedColumns[':p' . $index++]  = '`VALOR_DEPOSITO_RECURSAL`';
		}
		if ($this->isColumnModified(ProcessoPeer::ANALISE_RISCO)) {
			$modifiedColumns[':p' . $index++]  = '`ANALISE_RISCO`';
		}

		$sql = sprintf(
			'INSERT INTO `processo` (%s) VALUES (%s)',
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
					case '`CLIENTE_ID`':						
						$stmt->bindValue($identifier, $this->cliente_id, PDO::PARAM_INT);
						break;
					case '`CONTRATO_ID`':						
						$stmt->bindValue($identifier, $this->contrato_id, PDO::PARAM_INT);
						break;
					case '`FASE_PROCESSO_ID`':						
						$stmt->bindValue($identifier, $this->fase_processo_id, PDO::PARAM_INT);
						break;
					case '`AREA_ADVOCACIA_ID`':						
						$stmt->bindValue($identifier, $this->area_advocacia_id, PDO::PARAM_INT);
						break;
					case '`TRIBUNAL_ID`':						
						$stmt->bindValue($identifier, $this->tribunal_id, PDO::PARAM_INT);
						break;
					case '`UF_ID`':						
						$stmt->bindValue($identifier, $this->uf_id, PDO::PARAM_INT);
						break;
					case '`NOME_PROCESSO`':						
						$stmt->bindValue($identifier, $this->nome_processo, PDO::PARAM_STR);
						break;
					case '`NUMERO_CNJ`':						
						$stmt->bindValue($identifier, $this->numero_cnj, PDO::PARAM_STR);
						break;
					case '`NUMERO_PROCESSO`':						
						$stmt->bindValue($identifier, $this->numero_processo, PDO::PARAM_STR);
						break;
					case '`TIPO_PROCESSO`':						
						$stmt->bindValue($identifier, $this->tipo_processo, PDO::PARAM_STR);
						break;
					case '`SITUACAO_CLIENTE`':						
						$stmt->bindValue($identifier, $this->situacao_cliente, PDO::PARAM_STR);
						break;
					case '`DESCRICAO`':						
						$stmt->bindValue($identifier, $this->descricao, PDO::PARAM_STR);
						break;
					case '`OBJETIVO_FINAL`':						
						$stmt->bindValue($identifier, $this->objetivo_final, PDO::PARAM_STR);
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
					case '`VALOR_CAUSA`':						
						$stmt->bindValue($identifier, $this->valor_causa, PDO::PARAM_STR);
						break;
					case '`VALOR_PROCESSO`':						
						$stmt->bindValue($identifier, $this->valor_processo, PDO::PARAM_STR);
						break;
					case '`VALOR_CONTIGENCIA`':						
						$stmt->bindValue($identifier, $this->valor_contigencia, PDO::PARAM_STR);
						break;
					case '`VALOR_GARANTIA_JUIZO`':						
						$stmt->bindValue($identifier, $this->valor_garantia_juizo, PDO::PARAM_STR);
						break;
					case '`VALOR_DEPOSITO_RECURSAL`':						
						$stmt->bindValue($identifier, $this->valor_deposito_recursal, PDO::PARAM_STR);
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
		$pos = ProcessoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getClienteId();
				break;
			case 3:
				return $this->getContratoId();
				break;
			case 4:
				return $this->getFaseProcessoId();
				break;
			case 5:
				return $this->getAreaAdvocaciaId();
				break;
			case 6:
				return $this->getTribunalId();
				break;
			case 7:
				return $this->getUfId();
				break;
			case 8:
				return $this->getNomeProcesso();
				break;
			case 9:
				return $this->getNumeroCnj();
				break;
			case 10:
				return $this->getNumeroProcesso();
				break;
			case 11:
				return $this->getTipoProcesso();
				break;
			case 12:
				return $this->getSituacaoCliente();
				break;
			case 13:
				return $this->getDescricao();
				break;
			case 14:
				return $this->getObjetivoFinal();
				break;
			case 15:
				return $this->getDataAbertura();
				break;
			case 16:
				return $this->getDataFechamento();
				break;
			case 17:
				return $this->getAtivo();
				break;
			case 18:
				return $this->getValorCausa();
				break;
			case 19:
				return $this->getValorProcesso();
				break;
			case 20:
				return $this->getValorContigencia();
				break;
			case 21:
				return $this->getValorGarantiaJuizo();
				break;
			case 22:
				return $this->getValorDepositoRecursal();
				break;
			case 23:
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
		if (isset($alreadyDumpedObjects['Processo'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Processo'][$this->getPrimaryKey()] = true;
		$keys = ProcessoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getAdvogadoId(),
			$keys[2] => $this->getClienteId(),
			$keys[3] => $this->getContratoId(),
			$keys[4] => $this->getFaseProcessoId(),
			$keys[5] => $this->getAreaAdvocaciaId(),
			$keys[6] => $this->getTribunalId(),
			$keys[7] => $this->getUfId(),
			$keys[8] => $this->getNomeProcesso(),
			$keys[9] => $this->getNumeroCnj(),
			$keys[10] => $this->getNumeroProcesso(),
			$keys[11] => $this->getTipoProcesso(),
			$keys[12] => $this->getSituacaoCliente(),
			$keys[13] => $this->getDescricao(),
			$keys[14] => $this->getObjetivoFinal(),
			$keys[15] => $this->getDataAbertura(),
			$keys[16] => $this->getDataFechamento(),
			$keys[17] => $this->getAtivo(),
			$keys[18] => $this->getValorCausa(),
			$keys[19] => $this->getValorProcesso(),
			$keys[20] => $this->getValorContigencia(),
			$keys[21] => $this->getValorGarantiaJuizo(),
			$keys[22] => $this->getValorDepositoRecursal(),
			$keys[23] => $this->getAnaliseRisco(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aAdvogado) {
				$result['Advogado'] = $this->aAdvogado->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aAreaAdvocacia) {
				$result['AreaAdvocacia'] = $this->aAreaAdvocacia->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aContrato) {
				$result['Contrato'] = $this->aContrato->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aFaseProcesso) {
				$result['FaseProcesso'] = $this->aFaseProcesso->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aTribunal) {
				$result['Tribunal'] = $this->aTribunal->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aUf) {
				$result['Uf'] = $this->aUf->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aCliente) {
				$result['Cliente'] = $this->aCliente->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collAndamentoProcessos) {
				$result['AndamentoProcessos'] = $this->collAndamentoProcessos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
			if (null !== $this->collAnotacaoProcessos) {
				$result['AnotacaoProcessos'] = $this->collAnotacaoProcessos->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
		$pos = ProcessoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setClienteId($value);
				break;
			case 3:
				$this->setContratoId($value);
				break;
			case 4:
				$this->setFaseProcessoId($value);
				break;
			case 5:
				$this->setAreaAdvocaciaId($value);
				break;
			case 6:
				$this->setTribunalId($value);
				break;
			case 7:
				$this->setUfId($value);
				break;
			case 8:
				$this->setNomeProcesso($value);
				break;
			case 9:
				$this->setNumeroCnj($value);
				break;
			case 10:
				$this->setNumeroProcesso($value);
				break;
			case 11:
				$this->setTipoProcesso($value);
				break;
			case 12:
				$this->setSituacaoCliente($value);
				break;
			case 13:
				$this->setDescricao($value);
				break;
			case 14:
				$this->setObjetivoFinal($value);
				break;
			case 15:
				$this->setDataAbertura($value);
				break;
			case 16:
				$this->setDataFechamento($value);
				break;
			case 17:
				$this->setAtivo($value);
				break;
			case 18:
				$this->setValorCausa($value);
				break;
			case 19:
				$this->setValorProcesso($value);
				break;
			case 20:
				$this->setValorContigencia($value);
				break;
			case 21:
				$this->setValorGarantiaJuizo($value);
				break;
			case 22:
				$this->setValorDepositoRecursal($value);
				break;
			case 23:
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
		$keys = ProcessoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setAdvogadoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setClienteId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setContratoId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFaseProcessoId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setAreaAdvocaciaId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTribunalId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUfId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setNomeProcesso($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setNumeroCnj($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setNumeroProcesso($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTipoProcesso($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setSituacaoCliente($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setDescricao($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setObjetivoFinal($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setDataAbertura($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setDataFechamento($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setAtivo($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setValorCausa($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setValorProcesso($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setValorContigencia($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setValorGarantiaJuizo($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setValorDepositoRecursal($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setAnaliseRisco($arr[$keys[23]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(ProcessoPeer::DATABASE_NAME);

		if ($this->isColumnModified(ProcessoPeer::ID)) $criteria->add(ProcessoPeer::ID, $this->id);
		if ($this->isColumnModified(ProcessoPeer::ADVOGADO_ID)) $criteria->add(ProcessoPeer::ADVOGADO_ID, $this->advogado_id);
		if ($this->isColumnModified(ProcessoPeer::CLIENTE_ID)) $criteria->add(ProcessoPeer::CLIENTE_ID, $this->cliente_id);
		if ($this->isColumnModified(ProcessoPeer::CONTRATO_ID)) $criteria->add(ProcessoPeer::CONTRATO_ID, $this->contrato_id);
		if ($this->isColumnModified(ProcessoPeer::FASE_PROCESSO_ID)) $criteria->add(ProcessoPeer::FASE_PROCESSO_ID, $this->fase_processo_id);
		if ($this->isColumnModified(ProcessoPeer::AREA_ADVOCACIA_ID)) $criteria->add(ProcessoPeer::AREA_ADVOCACIA_ID, $this->area_advocacia_id);
		if ($this->isColumnModified(ProcessoPeer::TRIBUNAL_ID)) $criteria->add(ProcessoPeer::TRIBUNAL_ID, $this->tribunal_id);
		if ($this->isColumnModified(ProcessoPeer::UF_ID)) $criteria->add(ProcessoPeer::UF_ID, $this->uf_id);
		if ($this->isColumnModified(ProcessoPeer::NOME_PROCESSO)) $criteria->add(ProcessoPeer::NOME_PROCESSO, $this->nome_processo);
		if ($this->isColumnModified(ProcessoPeer::NUMERO_CNJ)) $criteria->add(ProcessoPeer::NUMERO_CNJ, $this->numero_cnj);
		if ($this->isColumnModified(ProcessoPeer::NUMERO_PROCESSO)) $criteria->add(ProcessoPeer::NUMERO_PROCESSO, $this->numero_processo);
		if ($this->isColumnModified(ProcessoPeer::TIPO_PROCESSO)) $criteria->add(ProcessoPeer::TIPO_PROCESSO, $this->tipo_processo);
		if ($this->isColumnModified(ProcessoPeer::SITUACAO_CLIENTE)) $criteria->add(ProcessoPeer::SITUACAO_CLIENTE, $this->situacao_cliente);
		if ($this->isColumnModified(ProcessoPeer::DESCRICAO)) $criteria->add(ProcessoPeer::DESCRICAO, $this->descricao);
		if ($this->isColumnModified(ProcessoPeer::OBJETIVO_FINAL)) $criteria->add(ProcessoPeer::OBJETIVO_FINAL, $this->objetivo_final);
		if ($this->isColumnModified(ProcessoPeer::DATA_ABERTURA)) $criteria->add(ProcessoPeer::DATA_ABERTURA, $this->data_abertura);
		if ($this->isColumnModified(ProcessoPeer::DATA_FECHAMENTO)) $criteria->add(ProcessoPeer::DATA_FECHAMENTO, $this->data_fechamento);
		if ($this->isColumnModified(ProcessoPeer::ATIVO)) $criteria->add(ProcessoPeer::ATIVO, $this->ativo);
		if ($this->isColumnModified(ProcessoPeer::VALOR_CAUSA)) $criteria->add(ProcessoPeer::VALOR_CAUSA, $this->valor_causa);
		if ($this->isColumnModified(ProcessoPeer::VALOR_PROCESSO)) $criteria->add(ProcessoPeer::VALOR_PROCESSO, $this->valor_processo);
		if ($this->isColumnModified(ProcessoPeer::VALOR_CONTIGENCIA)) $criteria->add(ProcessoPeer::VALOR_CONTIGENCIA, $this->valor_contigencia);
		if ($this->isColumnModified(ProcessoPeer::VALOR_GARANTIA_JUIZO)) $criteria->add(ProcessoPeer::VALOR_GARANTIA_JUIZO, $this->valor_garantia_juizo);
		if ($this->isColumnModified(ProcessoPeer::VALOR_DEPOSITO_RECURSAL)) $criteria->add(ProcessoPeer::VALOR_DEPOSITO_RECURSAL, $this->valor_deposito_recursal);
		if ($this->isColumnModified(ProcessoPeer::ANALISE_RISCO)) $criteria->add(ProcessoPeer::ANALISE_RISCO, $this->analise_risco);

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
		$criteria = new Criteria(ProcessoPeer::DATABASE_NAME);
		$criteria->add(ProcessoPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Processo (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setAdvogadoId($this->getAdvogadoId());
		$copyObj->setClienteId($this->getClienteId());
		$copyObj->setContratoId($this->getContratoId());
		$copyObj->setFaseProcessoId($this->getFaseProcessoId());
		$copyObj->setAreaAdvocaciaId($this->getAreaAdvocaciaId());
		$copyObj->setTribunalId($this->getTribunalId());
		$copyObj->setUfId($this->getUfId());
		$copyObj->setNomeProcesso($this->getNomeProcesso());
		$copyObj->setNumeroCnj($this->getNumeroCnj());
		$copyObj->setNumeroProcesso($this->getNumeroProcesso());
		$copyObj->setTipoProcesso($this->getTipoProcesso());
		$copyObj->setSituacaoCliente($this->getSituacaoCliente());
		$copyObj->setDescricao($this->getDescricao());
		$copyObj->setObjetivoFinal($this->getObjetivoFinal());
		$copyObj->setDataAbertura($this->getDataAbertura());
		$copyObj->setDataFechamento($this->getDataFechamento());
		$copyObj->setAtivo($this->getAtivo());
		$copyObj->setValorCausa($this->getValorCausa());
		$copyObj->setValorProcesso($this->getValorProcesso());
		$copyObj->setValorContigencia($this->getValorContigencia());
		$copyObj->setValorGarantiaJuizo($this->getValorGarantiaJuizo());
		$copyObj->setValorDepositoRecursal($this->getValorDepositoRecursal());
		$copyObj->setAnaliseRisco($this->getAnaliseRisco());

		if ($deepCopy && !$this->startCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);
			// store object hash to prevent cycle
			$this->startCopy = true;

			foreach ($this->getAndamentoProcessos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAndamentoProcesso($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAnotacaoProcessos() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addAnotacaoProcesso($relObj->copy($deepCopy));
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
	 * @return     Processo Clone of current object.
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
	 * @return     ProcessoPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new ProcessoPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Advogado object.
	 *
	 * @param      Advogado $v
	 * @return     Processo The current object (for fluent API support)
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
			$v->addProcesso($this);
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
				$this->aAdvogado->addProcessos($this);
			 */
		}
		return $this->aAdvogado;
	}

	/**
	 * Declares an association between this object and a AreaAdvocacia object.
	 *
	 * @param      AreaAdvocacia $v
	 * @return     Processo The current object (for fluent API support)
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
			$v->addProcesso($this);
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
				$this->aAreaAdvocacia->addProcessos($this);
			 */
		}
		return $this->aAreaAdvocacia;
	}

	/**
	 * Declares an association between this object and a Contrato object.
	 *
	 * @param      Contrato $v
	 * @return     Processo The current object (for fluent API support)
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
			$v->addProcesso($this);
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
				$this->aContrato->addProcessos($this);
			 */
		}
		return $this->aContrato;
	}

	/**
	 * Declares an association between this object and a FaseProcesso object.
	 *
	 * @param      FaseProcesso $v
	 * @return     Processo The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setFaseProcesso(FaseProcesso $v = null)
	{
		if ($v === null) {
			$this->setFaseProcessoId(NULL);
		} else {
			$this->setFaseProcessoId($v->getId());
		}

		$this->aFaseProcesso = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the FaseProcesso object, it will not be re-added.
		if ($v !== null) {
			$v->addProcesso($this);
		}

		return $this;
	}


	/**
	 * Get the associated FaseProcesso object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     FaseProcesso The associated FaseProcesso object.
	 * @throws     PropelException
	 */
	public function getFaseProcesso(PropelPDO $con = null)
	{
		if ($this->aFaseProcesso === null && ($this->fase_processo_id !== null)) {
			$this->aFaseProcesso = FaseProcessoQuery::create()->findPk($this->fase_processo_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aFaseProcesso->addProcessos($this);
			 */
		}
		return $this->aFaseProcesso;
	}

	/**
	 * Declares an association between this object and a Tribunal object.
	 *
	 * @param      Tribunal $v
	 * @return     Processo The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setTribunal(Tribunal $v = null)
	{
		if ($v === null) {
			$this->setTribunalId(NULL);
		} else {
			$this->setTribunalId($v->getId());
		}

		$this->aTribunal = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Tribunal object, it will not be re-added.
		if ($v !== null) {
			$v->addProcesso($this);
		}

		return $this;
	}


	/**
	 * Get the associated Tribunal object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Tribunal The associated Tribunal object.
	 * @throws     PropelException
	 */
	public function getTribunal(PropelPDO $con = null)
	{
		if ($this->aTribunal === null && ($this->tribunal_id !== null)) {
			$this->aTribunal = TribunalQuery::create()->findPk($this->tribunal_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aTribunal->addProcessos($this);
			 */
		}
		return $this->aTribunal;
	}

	/**
	 * Declares an association between this object and a Uf object.
	 *
	 * @param      Uf $v
	 * @return     Processo The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUf(Uf $v = null)
	{
		if ($v === null) {
			$this->setUfId(NULL);
		} else {
			$this->setUfId($v->getId());
		}

		$this->aUf = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Uf object, it will not be re-added.
		if ($v !== null) {
			$v->addProcesso($this);
		}

		return $this;
	}


	/**
	 * Get the associated Uf object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Uf The associated Uf object.
	 * @throws     PropelException
	 */
	public function getUf(PropelPDO $con = null)
	{
		if ($this->aUf === null && ($this->uf_id !== null)) {
			$this->aUf = UfQuery::create()->findPk($this->uf_id, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aUf->addProcessos($this);
			 */
		}
		return $this->aUf;
	}

	/**
	 * Declares an association between this object and a Cliente object.
	 *
	 * @param      Cliente $v
	 * @return     Processo The current object (for fluent API support)
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
			$v->addProcesso($this);
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
				$this->aCliente->addProcessos($this);
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
		if ('AndamentoProcesso' == $relationName) {
			return $this->initAndamentoProcessos();
		}
		if ('AnotacaoProcesso' == $relationName) {
			return $this->initAnotacaoProcessos();
		}
		if ('CasoProcesso' == $relationName) {
			return $this->initCasoProcessos();
		}
	}

	/**
	 * Clears out the collAndamentoProcessos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAndamentoProcessos()
	 */
	public function clearAndamentoProcessos()
	{
		$this->collAndamentoProcessos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAndamentoProcessos collection.
	 *
	 * By default this just sets the collAndamentoProcessos collection to an empty array (like clearcollAndamentoProcessos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initAndamentoProcessos($overrideExisting = true)
	{
		if (null !== $this->collAndamentoProcessos && !$overrideExisting) {
			return;
		}
		$this->collAndamentoProcessos = new PropelObjectCollection();
		$this->collAndamentoProcessos->setModel('AndamentoProcesso');
	}

	/**
	 * Gets an array of AndamentoProcesso objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Processo is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AndamentoProcesso[] List of AndamentoProcesso objects
	 * @throws     PropelException
	 */
	public function getAndamentoProcessos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAndamentoProcessos || null !== $criteria) {
			if ($this->isNew() && null === $this->collAndamentoProcessos) {
				// return empty collection
				$this->initAndamentoProcessos();
			} else {
				$collAndamentoProcessos = AndamentoProcessoQuery::create(null, $criteria)
					->filterByProcesso($this)
					->find($con);
				if (null !== $criteria) {
					return $collAndamentoProcessos;
				}
				$this->collAndamentoProcessos = $collAndamentoProcessos;
			}
		}
		return $this->collAndamentoProcessos;
	}

	/**
	 * Sets a collection of AndamentoProcesso objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $andamentoProcessos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setAndamentoProcessos(PropelCollection $andamentoProcessos, PropelPDO $con = null)
	{
		$this->andamentoProcessosScheduledForDeletion = $this->getAndamentoProcessos(new Criteria(), $con)->diff($andamentoProcessos);

		foreach ($andamentoProcessos as $andamentoProcesso) {
			// Fix issue with collection modified by reference
			if ($andamentoProcesso->isNew()) {
				$andamentoProcesso->setProcesso($this);
			}
			$this->addAndamentoProcesso($andamentoProcesso);
		}

		$this->collAndamentoProcessos = $andamentoProcessos;
	}

	/**
	 * Returns the number of related AndamentoProcesso objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AndamentoProcesso objects.
	 * @throws     PropelException
	 */
	public function countAndamentoProcessos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAndamentoProcessos || null !== $criteria) {
			if ($this->isNew() && null === $this->collAndamentoProcessos) {
				return 0;
			} else {
				$query = AndamentoProcessoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByProcesso($this)
					->count($con);
			}
		} else {
			return count($this->collAndamentoProcessos);
		}
	}

	/**
	 * Method called to associate a AndamentoProcesso object to this object
	 * through the AndamentoProcesso foreign key attribute.
	 *
	 * @param      AndamentoProcesso $l AndamentoProcesso
	 * @return     Processo The current object (for fluent API support)
	 */
	public function addAndamentoProcesso(AndamentoProcesso $l)
	{
		if ($this->collAndamentoProcessos === null) {
			$this->initAndamentoProcessos();
		}
		if (!$this->collAndamentoProcessos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddAndamentoProcesso($l);
		}

		return $this;
	}

	/**
	 * @param	AndamentoProcesso $andamentoProcesso The andamentoProcesso object to add.
	 */
	protected function doAddAndamentoProcesso($andamentoProcesso)
	{
		$this->collAndamentoProcessos[]= $andamentoProcesso;
		$andamentoProcesso->setProcesso($this);
	}

	/**
	 * Clears out the collAnotacaoProcessos collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addAnotacaoProcessos()
	 */
	public function clearAnotacaoProcessos()
	{
		$this->collAnotacaoProcessos = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collAnotacaoProcessos collection.
	 *
	 * By default this just sets the collAnotacaoProcessos collection to an empty array (like clearcollAnotacaoProcessos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initAnotacaoProcessos($overrideExisting = true)
	{
		if (null !== $this->collAnotacaoProcessos && !$overrideExisting) {
			return;
		}
		$this->collAnotacaoProcessos = new PropelObjectCollection();
		$this->collAnotacaoProcessos->setModel('AnotacaoProcesso');
	}

	/**
	 * Gets an array of AnotacaoProcesso objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Processo is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array AnotacaoProcesso[] List of AnotacaoProcesso objects
	 * @throws     PropelException
	 */
	public function getAnotacaoProcessos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collAnotacaoProcessos || null !== $criteria) {
			if ($this->isNew() && null === $this->collAnotacaoProcessos) {
				// return empty collection
				$this->initAnotacaoProcessos();
			} else {
				$collAnotacaoProcessos = AnotacaoProcessoQuery::create(null, $criteria)
					->filterByProcesso($this)
					->find($con);
				if (null !== $criteria) {
					return $collAnotacaoProcessos;
				}
				$this->collAnotacaoProcessos = $collAnotacaoProcessos;
			}
		}
		return $this->collAnotacaoProcessos;
	}

	/**
	 * Sets a collection of AnotacaoProcesso objects related by a one-to-many relationship
	 * to the current object.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $anotacaoProcessos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setAnotacaoProcessos(PropelCollection $anotacaoProcessos, PropelPDO $con = null)
	{
		$this->anotacaoProcessosScheduledForDeletion = $this->getAnotacaoProcessos(new Criteria(), $con)->diff($anotacaoProcessos);

		foreach ($anotacaoProcessos as $anotacaoProcesso) {
			// Fix issue with collection modified by reference
			if ($anotacaoProcesso->isNew()) {
				$anotacaoProcesso->setProcesso($this);
			}
			$this->addAnotacaoProcesso($anotacaoProcesso);
		}

		$this->collAnotacaoProcessos = $anotacaoProcessos;
	}

	/**
	 * Returns the number of related AnotacaoProcesso objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related AnotacaoProcesso objects.
	 * @throws     PropelException
	 */
	public function countAnotacaoProcessos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collAnotacaoProcessos || null !== $criteria) {
			if ($this->isNew() && null === $this->collAnotacaoProcessos) {
				return 0;
			} else {
				$query = AnotacaoProcessoQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByProcesso($this)
					->count($con);
			}
		} else {
			return count($this->collAnotacaoProcessos);
		}
	}

	/**
	 * Method called to associate a AnotacaoProcesso object to this object
	 * through the AnotacaoProcesso foreign key attribute.
	 *
	 * @param      AnotacaoProcesso $l AnotacaoProcesso
	 * @return     Processo The current object (for fluent API support)
	 */
	public function addAnotacaoProcesso(AnotacaoProcesso $l)
	{
		if ($this->collAnotacaoProcessos === null) {
			$this->initAnotacaoProcessos();
		}
		if (!$this->collAnotacaoProcessos->contains($l)) { // only add it if the **same** object is not already associated
			$this->doAddAnotacaoProcesso($l);
		}

		return $this;
	}

	/**
	 * @param	AnotacaoProcesso $anotacaoProcesso The anotacaoProcesso object to add.
	 */
	protected function doAddAnotacaoProcesso($anotacaoProcesso)
	{
		$this->collAnotacaoProcessos[]= $anotacaoProcesso;
		$anotacaoProcesso->setProcesso($this);
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
	 * If this Processo is new, it will return
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
					->filterByProcesso($this)
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
				$casoProcesso->setProcesso($this);
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
					->filterByProcesso($this)
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
	 * @return     Processo The current object (for fluent API support)
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
		$casoProcesso->setProcesso($this);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Processo is new, it will return
	 * an empty collection; or if this Processo has previously
	 * been saved, it will retrieve related CasoProcessos from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Processo.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array CasoProcesso[] List of CasoProcesso objects
	 */
	public function getCasoProcessosJoinCaso($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CasoProcessoQuery::create(null, $criteria);
		$query->joinWith('Caso', $join_behavior);

		return $this->getCasoProcessos($query, $con);
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
	 * By default this just sets the collCasos collection to an empty collection (like clearCasos());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCasos()
	{
		$this->collCasos = new PropelObjectCollection();
		$this->collCasos->setModel('Caso');
	}

	/**
	 * Gets a collection of Caso objects related by a many-to-many relationship
	 * to the current object by way of the caso_processo cross-reference table.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Processo is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     PropelCollection|array Caso[] List of Caso objects
	 */
	public function getCasos($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCasos || null !== $criteria) {
			if ($this->isNew() && null === $this->collCasos) {
				// return empty collection
				$this->initCasos();
			} else {
				$collCasos = CasoQuery::create(null, $criteria)
					->filterByProcesso($this)
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
	 * Sets a collection of Caso objects related by a many-to-many relationship
	 * to the current object by way of the caso_processo cross-reference table.
	 * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
	 * and new objects from the given Propel collection.
	 *
	 * @param      PropelCollection $casos A Propel collection.
	 * @param      PropelPDO $con Optional connection object
	 */
	public function setCasos(PropelCollection $casos, PropelPDO $con = null)
	{
		$casoProcessos = CasoProcessoQuery::create()
			->filterByCaso($casos)
			->filterByProcesso($this)
			->find($con);

		$this->casosScheduledForDeletion = $this->getCasoProcessos()->diff($casoProcessos);
		$this->collCasoProcessos = $casoProcessos;

		foreach ($casos as $caso) {
			// Fix issue with collection modified by reference
			if ($caso->isNew()) {
				$this->doAddCaso($caso);
			} else {
				$this->addCaso($caso);
			}
		}

		$this->collCasos = $casos;
	}

	/**
	 * Gets the number of Caso objects related by a many-to-many relationship
	 * to the current object by way of the caso_processo cross-reference table.
	 *
	 * @param      Criteria $criteria Optional query object to filter the query
	 * @param      boolean $distinct Set to true to force count distinct
	 * @param      PropelPDO $con Optional connection object
	 *
	 * @return     int the number of related Caso objects
	 */
	public function countCasos($criteria = null, $distinct = false, PropelPDO $con = null)
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
					->filterByProcesso($this)
					->count($con);
			}
		} else {
			return count($this->collCasos);
		}
	}

	/**
	 * Associate a Caso object to this object
	 * through the caso_processo cross reference table.
	 *
	 * @param      Caso $caso The CasoProcesso object to relate
	 * @return     void
	 */
	public function addCaso(Caso $caso)
	{
		if ($this->collCasos === null) {
			$this->initCasos();
		}
		if (!$this->collCasos->contains($caso)) { // only add it if the **same** object is not already associated
			$this->doAddCaso($caso);

			$this->collCasos[]= $caso;
		}
	}

	/**
	 * @param	Caso $caso The caso object to add.
	 */
	protected function doAddCaso($caso)
	{
		$casoProcesso = new CasoProcesso();
		$casoProcesso->setCaso($caso);
		$this->addCasoProcesso($casoProcesso);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->advogado_id = null;
		$this->cliente_id = null;
		$this->contrato_id = null;
		$this->fase_processo_id = null;
		$this->area_advocacia_id = null;
		$this->tribunal_id = null;
		$this->uf_id = null;
		$this->nome_processo = null;
		$this->numero_cnj = null;
		$this->numero_processo = null;
		$this->tipo_processo = null;
		$this->situacao_cliente = null;
		$this->descricao = null;
		$this->objetivo_final = null;
		$this->data_abertura = null;
		$this->data_fechamento = null;
		$this->ativo = null;
		$this->valor_causa = null;
		$this->valor_processo = null;
		$this->valor_contigencia = null;
		$this->valor_garantia_juizo = null;
		$this->valor_deposito_recursal = null;
		$this->analise_risco = null;
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
			if ($this->collAndamentoProcessos) {
				foreach ($this->collAndamentoProcessos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAnotacaoProcessos) {
				foreach ($this->collAnotacaoProcessos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCasoProcessos) {
				foreach ($this->collCasoProcessos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCasos) {
				foreach ($this->collCasos as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collAndamentoProcessos instanceof PropelCollection) {
			$this->collAndamentoProcessos->clearIterator();
		}
		$this->collAndamentoProcessos = null;
		if ($this->collAnotacaoProcessos instanceof PropelCollection) {
			$this->collAnotacaoProcessos->clearIterator();
		}
		$this->collAnotacaoProcessos = null;
		if ($this->collCasoProcessos instanceof PropelCollection) {
			$this->collCasoProcessos->clearIterator();
		}
		$this->collCasoProcessos = null;
		if ($this->collCasos instanceof PropelCollection) {
			$this->collCasos->clearIterator();
		}
		$this->collCasos = null;
		$this->aAdvogado = null;
		$this->aAreaAdvocacia = null;
		$this->aContrato = null;
		$this->aFaseProcesso = null;
		$this->aTribunal = null;
		$this->aUf = null;
		$this->aCliente = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(ProcessoPeer::DEFAULT_STRING_FORMAT);
	}

} // BaseProcesso
