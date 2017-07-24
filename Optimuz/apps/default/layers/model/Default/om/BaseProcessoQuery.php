<?php


/**
 * Base class that represents a query for the 'processo' table.
 *
 * 
 *
 * @method     ProcessoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ProcessoQuery orderByAdvogadoId($order = Criteria::ASC) Order by the advogado_id column
 * @method     ProcessoQuery orderByClienteId($order = Criteria::ASC) Order by the cliente_id column
 * @method     ProcessoQuery orderByContratoId($order = Criteria::ASC) Order by the contrato_id column
 * @method     ProcessoQuery orderByFaseProcessoId($order = Criteria::ASC) Order by the fase_processo_id column
 * @method     ProcessoQuery orderByAreaAdvocaciaId($order = Criteria::ASC) Order by the area_advocacia_id column
 * @method     ProcessoQuery orderByTribunalId($order = Criteria::ASC) Order by the tribunal_id column
 * @method     ProcessoQuery orderByUfId($order = Criteria::ASC) Order by the uf_id column
 * @method     ProcessoQuery orderByNomeProcesso($order = Criteria::ASC) Order by the nome_processo column
 * @method     ProcessoQuery orderByNumeroCnj($order = Criteria::ASC) Order by the numero_cnj column
 * @method     ProcessoQuery orderByNumeroProcesso($order = Criteria::ASC) Order by the numero_processo column
 * @method     ProcessoQuery orderByTipoProcesso($order = Criteria::ASC) Order by the tipo_processo column
 * @method     ProcessoQuery orderBySituacaoCliente($order = Criteria::ASC) Order by the situacao_cliente column
 * @method     ProcessoQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 * @method     ProcessoQuery orderByObjetivoFinal($order = Criteria::ASC) Order by the objetivo_final column
 * @method     ProcessoQuery orderByDataAbertura($order = Criteria::ASC) Order by the data_abertura column
 * @method     ProcessoQuery orderByDataFechamento($order = Criteria::ASC) Order by the data_fechamento column
 * @method     ProcessoQuery orderByAtivo($order = Criteria::ASC) Order by the ativo column
 * @method     ProcessoQuery orderByValorCausa($order = Criteria::ASC) Order by the valor_causa column
 * @method     ProcessoQuery orderByValorProcesso($order = Criteria::ASC) Order by the valor_processo column
 * @method     ProcessoQuery orderByValorContigencia($order = Criteria::ASC) Order by the valor_contigencia column
 * @method     ProcessoQuery orderByValorGarantiaJuizo($order = Criteria::ASC) Order by the valor_garantia_juizo column
 * @method     ProcessoQuery orderByValorDepositoRecursal($order = Criteria::ASC) Order by the valor_deposito_recursal column
 * @method     ProcessoQuery orderByAnaliseRisco($order = Criteria::ASC) Order by the analise_risco column
 *
 * @method     ProcessoQuery groupById() Group by the id column
 * @method     ProcessoQuery groupByAdvogadoId() Group by the advogado_id column
 * @method     ProcessoQuery groupByClienteId() Group by the cliente_id column
 * @method     ProcessoQuery groupByContratoId() Group by the contrato_id column
 * @method     ProcessoQuery groupByFaseProcessoId() Group by the fase_processo_id column
 * @method     ProcessoQuery groupByAreaAdvocaciaId() Group by the area_advocacia_id column
 * @method     ProcessoQuery groupByTribunalId() Group by the tribunal_id column
 * @method     ProcessoQuery groupByUfId() Group by the uf_id column
 * @method     ProcessoQuery groupByNomeProcesso() Group by the nome_processo column
 * @method     ProcessoQuery groupByNumeroCnj() Group by the numero_cnj column
 * @method     ProcessoQuery groupByNumeroProcesso() Group by the numero_processo column
 * @method     ProcessoQuery groupByTipoProcesso() Group by the tipo_processo column
 * @method     ProcessoQuery groupBySituacaoCliente() Group by the situacao_cliente column
 * @method     ProcessoQuery groupByDescricao() Group by the descricao column
 * @method     ProcessoQuery groupByObjetivoFinal() Group by the objetivo_final column
 * @method     ProcessoQuery groupByDataAbertura() Group by the data_abertura column
 * @method     ProcessoQuery groupByDataFechamento() Group by the data_fechamento column
 * @method     ProcessoQuery groupByAtivo() Group by the ativo column
 * @method     ProcessoQuery groupByValorCausa() Group by the valor_causa column
 * @method     ProcessoQuery groupByValorProcesso() Group by the valor_processo column
 * @method     ProcessoQuery groupByValorContigencia() Group by the valor_contigencia column
 * @method     ProcessoQuery groupByValorGarantiaJuizo() Group by the valor_garantia_juizo column
 * @method     ProcessoQuery groupByValorDepositoRecursal() Group by the valor_deposito_recursal column
 * @method     ProcessoQuery groupByAnaliseRisco() Group by the analise_risco column
 *
 * @method     ProcessoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ProcessoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ProcessoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ProcessoQuery leftJoinAdvogado($relationAlias = null) Adds a LEFT JOIN clause to the query using the Advogado relation
 * @method     ProcessoQuery rightJoinAdvogado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Advogado relation
 * @method     ProcessoQuery innerJoinAdvogado($relationAlias = null) Adds a INNER JOIN clause to the query using the Advogado relation
 *
 * @method     ProcessoQuery leftJoinAreaAdvocacia($relationAlias = null) Adds a LEFT JOIN clause to the query using the AreaAdvocacia relation
 * @method     ProcessoQuery rightJoinAreaAdvocacia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AreaAdvocacia relation
 * @method     ProcessoQuery innerJoinAreaAdvocacia($relationAlias = null) Adds a INNER JOIN clause to the query using the AreaAdvocacia relation
 *
 * @method     ProcessoQuery leftJoinContrato($relationAlias = null) Adds a LEFT JOIN clause to the query using the Contrato relation
 * @method     ProcessoQuery rightJoinContrato($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Contrato relation
 * @method     ProcessoQuery innerJoinContrato($relationAlias = null) Adds a INNER JOIN clause to the query using the Contrato relation
 *
 * @method     ProcessoQuery leftJoinFaseProcesso($relationAlias = null) Adds a LEFT JOIN clause to the query using the FaseProcesso relation
 * @method     ProcessoQuery rightJoinFaseProcesso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FaseProcesso relation
 * @method     ProcessoQuery innerJoinFaseProcesso($relationAlias = null) Adds a INNER JOIN clause to the query using the FaseProcesso relation
 *
 * @method     ProcessoQuery leftJoinTribunal($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tribunal relation
 * @method     ProcessoQuery rightJoinTribunal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tribunal relation
 * @method     ProcessoQuery innerJoinTribunal($relationAlias = null) Adds a INNER JOIN clause to the query using the Tribunal relation
 *
 * @method     ProcessoQuery leftJoinUf($relationAlias = null) Adds a LEFT JOIN clause to the query using the Uf relation
 * @method     ProcessoQuery rightJoinUf($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Uf relation
 * @method     ProcessoQuery innerJoinUf($relationAlias = null) Adds a INNER JOIN clause to the query using the Uf relation
 *
 * @method     ProcessoQuery leftJoinCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cliente relation
 * @method     ProcessoQuery rightJoinCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cliente relation
 * @method     ProcessoQuery innerJoinCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the Cliente relation
 *
 * @method     ProcessoQuery leftJoinAndamentoProcesso($relationAlias = null) Adds a LEFT JOIN clause to the query using the AndamentoProcesso relation
 * @method     ProcessoQuery rightJoinAndamentoProcesso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AndamentoProcesso relation
 * @method     ProcessoQuery innerJoinAndamentoProcesso($relationAlias = null) Adds a INNER JOIN clause to the query using the AndamentoProcesso relation
 *
 * @method     ProcessoQuery leftJoinAnotacaoProcesso($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnotacaoProcesso relation
 * @method     ProcessoQuery rightJoinAnotacaoProcesso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnotacaoProcesso relation
 * @method     ProcessoQuery innerJoinAnotacaoProcesso($relationAlias = null) Adds a INNER JOIN clause to the query using the AnotacaoProcesso relation
 *
 * @method     ProcessoQuery leftJoinCasoProcesso($relationAlias = null) Adds a LEFT JOIN clause to the query using the CasoProcesso relation
 * @method     ProcessoQuery rightJoinCasoProcesso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CasoProcesso relation
 * @method     ProcessoQuery innerJoinCasoProcesso($relationAlias = null) Adds a INNER JOIN clause to the query using the CasoProcesso relation
 *
 * @method     Processo findOne(PropelPDO $con = null) Return the first Processo matching the query
 * @method     Processo findOneOrCreate(PropelPDO $con = null) Return the first Processo matching the query, or a new Processo object populated from the query conditions when no match is found
 *
 * @method     Processo findOneById(int $id) Return the first Processo filtered by the id column
 * @method     Processo findOneByAdvogadoId(int $advogado_id) Return the first Processo filtered by the advogado_id column
 * @method     Processo findOneByClienteId(int $cliente_id) Return the first Processo filtered by the cliente_id column
 * @method     Processo findOneByContratoId(int $contrato_id) Return the first Processo filtered by the contrato_id column
 * @method     Processo findOneByFaseProcessoId(int $fase_processo_id) Return the first Processo filtered by the fase_processo_id column
 * @method     Processo findOneByAreaAdvocaciaId(int $area_advocacia_id) Return the first Processo filtered by the area_advocacia_id column
 * @method     Processo findOneByTribunalId(int $tribunal_id) Return the first Processo filtered by the tribunal_id column
 * @method     Processo findOneByUfId(int $uf_id) Return the first Processo filtered by the uf_id column
 * @method     Processo findOneByNomeProcesso(string $nome_processo) Return the first Processo filtered by the nome_processo column
 * @method     Processo findOneByNumeroCnj(string $numero_cnj) Return the first Processo filtered by the numero_cnj column
 * @method     Processo findOneByNumeroProcesso(string $numero_processo) Return the first Processo filtered by the numero_processo column
 * @method     Processo findOneByTipoProcesso(string $tipo_processo) Return the first Processo filtered by the tipo_processo column
 * @method     Processo findOneBySituacaoCliente(string $situacao_cliente) Return the first Processo filtered by the situacao_cliente column
 * @method     Processo findOneByDescricao(string $descricao) Return the first Processo filtered by the descricao column
 * @method     Processo findOneByObjetivoFinal(string $objetivo_final) Return the first Processo filtered by the objetivo_final column
 * @method     Processo findOneByDataAbertura(string $data_abertura) Return the first Processo filtered by the data_abertura column
 * @method     Processo findOneByDataFechamento(string $data_fechamento) Return the first Processo filtered by the data_fechamento column
 * @method     Processo findOneByAtivo(boolean $ativo) Return the first Processo filtered by the ativo column
 * @method     Processo findOneByValorCausa(string $valor_causa) Return the first Processo filtered by the valor_causa column
 * @method     Processo findOneByValorProcesso(string $valor_processo) Return the first Processo filtered by the valor_processo column
 * @method     Processo findOneByValorContigencia(string $valor_contigencia) Return the first Processo filtered by the valor_contigencia column
 * @method     Processo findOneByValorGarantiaJuizo(string $valor_garantia_juizo) Return the first Processo filtered by the valor_garantia_juizo column
 * @method     Processo findOneByValorDepositoRecursal(string $valor_deposito_recursal) Return the first Processo filtered by the valor_deposito_recursal column
 * @method     Processo findOneByAnaliseRisco(string $analise_risco) Return the first Processo filtered by the analise_risco column
 *
 * @method     array findById(int $id) Return Processo objects filtered by the id column
 * @method     array findByAdvogadoId(int $advogado_id) Return Processo objects filtered by the advogado_id column
 * @method     array findByClienteId(int $cliente_id) Return Processo objects filtered by the cliente_id column
 * @method     array findByContratoId(int $contrato_id) Return Processo objects filtered by the contrato_id column
 * @method     array findByFaseProcessoId(int $fase_processo_id) Return Processo objects filtered by the fase_processo_id column
 * @method     array findByAreaAdvocaciaId(int $area_advocacia_id) Return Processo objects filtered by the area_advocacia_id column
 * @method     array findByTribunalId(int $tribunal_id) Return Processo objects filtered by the tribunal_id column
 * @method     array findByUfId(int $uf_id) Return Processo objects filtered by the uf_id column
 * @method     array findByNomeProcesso(string $nome_processo) Return Processo objects filtered by the nome_processo column
 * @method     array findByNumeroCnj(string $numero_cnj) Return Processo objects filtered by the numero_cnj column
 * @method     array findByNumeroProcesso(string $numero_processo) Return Processo objects filtered by the numero_processo column
 * @method     array findByTipoProcesso(string $tipo_processo) Return Processo objects filtered by the tipo_processo column
 * @method     array findBySituacaoCliente(string $situacao_cliente) Return Processo objects filtered by the situacao_cliente column
 * @method     array findByDescricao(string $descricao) Return Processo objects filtered by the descricao column
 * @method     array findByObjetivoFinal(string $objetivo_final) Return Processo objects filtered by the objetivo_final column
 * @method     array findByDataAbertura(string $data_abertura) Return Processo objects filtered by the data_abertura column
 * @method     array findByDataFechamento(string $data_fechamento) Return Processo objects filtered by the data_fechamento column
 * @method     array findByAtivo(boolean $ativo) Return Processo objects filtered by the ativo column
 * @method     array findByValorCausa(string $valor_causa) Return Processo objects filtered by the valor_causa column
 * @method     array findByValorProcesso(string $valor_processo) Return Processo objects filtered by the valor_processo column
 * @method     array findByValorContigencia(string $valor_contigencia) Return Processo objects filtered by the valor_contigencia column
 * @method     array findByValorGarantiaJuizo(string $valor_garantia_juizo) Return Processo objects filtered by the valor_garantia_juizo column
 * @method     array findByValorDepositoRecursal(string $valor_deposito_recursal) Return Processo objects filtered by the valor_deposito_recursal column
 * @method     array findByAnaliseRisco(string $analise_risco) Return Processo objects filtered by the analise_risco column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseProcessoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseProcessoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Processo', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ProcessoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ProcessoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ProcessoQuery) {
			return $criteria;
		}
		$query = new ProcessoQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key.
	 * Propel uses the instance pool to skip the database if the object exists.
	 * Go fast if the query is untouched.
	 *
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Processo|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ProcessoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		if ($this->formatter || $this->modelAlias || $this->with || $this->select
		 || $this->selectColumns || $this->asColumns || $this->selectModifiers
		 || $this->map || $this->having || $this->joins) {
			return $this->findPkComplex($key, $con);
		} else {
			return $this->findPkSimple($key, $con);
		}
	}

	/**
	 * Find object by primary key using raw SQL to go fast.
	 * Bypass doSelect() and the object formatter by using generated code.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    Processo A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ADVOGADO_ID`, `CLIENTE_ID`, `CONTRATO_ID`, `FASE_PROCESSO_ID`, `AREA_ADVOCACIA_ID`, `TRIBUNAL_ID`, `UF_ID`, `NOME_PROCESSO`, `NUMERO_CNJ`, `NUMERO_PROCESSO`, `TIPO_PROCESSO`, `SITUACAO_CLIENTE`, `DESCRICAO`, `OBJETIVO_FINAL`, `DATA_ABERTURA`, `DATA_FECHAMENTO`, `ATIVO`, `VALOR_CAUSA`, `VALOR_PROCESSO`, `VALOR_CONTIGENCIA`, `VALOR_GARANTIA_JUIZO`, `VALOR_DEPOSITO_RECURSAL`, `ANALISE_RISCO` FROM `processo` WHERE `ID` = :p0';
		try {
			$stmt = $con->prepare($sql);			
			$stmt->bindValue(':p0', $key, PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new Processo();
			$obj->hydrate($row);
			ProcessoPeer::addInstanceToPool($obj, (string) $row[0]);
		}
		$stmt->closeCursor();

		return $obj;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    Processo|array|mixed the result, formatted by the current formatter
	 */
	protected function findPkComplex($key, $con)
	{
		// As the query uses a PK condition, no limit(1) is necessary.
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKey($key)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKeys($keys)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->format($stmt);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ProcessoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ProcessoPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterById(1234); // WHERE id = 1234
	 * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
	 * $query->filterById(array('min' => 12)); // WHERE id > 12
	 * </code>
	 *
	 * @param     mixed $id The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ProcessoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the advogado_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAdvogadoId(1234); // WHERE advogado_id = 1234
	 * $query->filterByAdvogadoId(array(12, 34)); // WHERE advogado_id IN (12, 34)
	 * $query->filterByAdvogadoId(array('min' => 12)); // WHERE advogado_id > 12
	 * </code>
	 *
	 * @see       filterByAdvogado()
	 *
	 * @param     mixed $advogadoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByAdvogadoId($advogadoId = null, $comparison = null)
	{
		if (is_array($advogadoId)) {
			$useMinMax = false;
			if (isset($advogadoId['min'])) {
				$this->addUsingAlias(ProcessoPeer::ADVOGADO_ID, $advogadoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($advogadoId['max'])) {
				$this->addUsingAlias(ProcessoPeer::ADVOGADO_ID, $advogadoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProcessoPeer::ADVOGADO_ID, $advogadoId, $comparison);
	}

	/**
	 * Filter the query on the cliente_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByClienteId(1234); // WHERE cliente_id = 1234
	 * $query->filterByClienteId(array(12, 34)); // WHERE cliente_id IN (12, 34)
	 * $query->filterByClienteId(array('min' => 12)); // WHERE cliente_id > 12
	 * </code>
	 *
	 * @see       filterByCliente()
	 *
	 * @param     mixed $clienteId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByClienteId($clienteId = null, $comparison = null)
	{
		if (is_array($clienteId)) {
			$useMinMax = false;
			if (isset($clienteId['min'])) {
				$this->addUsingAlias(ProcessoPeer::CLIENTE_ID, $clienteId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clienteId['max'])) {
				$this->addUsingAlias(ProcessoPeer::CLIENTE_ID, $clienteId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProcessoPeer::CLIENTE_ID, $clienteId, $comparison);
	}

	/**
	 * Filter the query on the contrato_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByContratoId(1234); // WHERE contrato_id = 1234
	 * $query->filterByContratoId(array(12, 34)); // WHERE contrato_id IN (12, 34)
	 * $query->filterByContratoId(array('min' => 12)); // WHERE contrato_id > 12
	 * </code>
	 *
	 * @see       filterByContrato()
	 *
	 * @param     mixed $contratoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByContratoId($contratoId = null, $comparison = null)
	{
		if (is_array($contratoId)) {
			$useMinMax = false;
			if (isset($contratoId['min'])) {
				$this->addUsingAlias(ProcessoPeer::CONTRATO_ID, $contratoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($contratoId['max'])) {
				$this->addUsingAlias(ProcessoPeer::CONTRATO_ID, $contratoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProcessoPeer::CONTRATO_ID, $contratoId, $comparison);
	}

	/**
	 * Filter the query on the fase_processo_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFaseProcessoId(1234); // WHERE fase_processo_id = 1234
	 * $query->filterByFaseProcessoId(array(12, 34)); // WHERE fase_processo_id IN (12, 34)
	 * $query->filterByFaseProcessoId(array('min' => 12)); // WHERE fase_processo_id > 12
	 * </code>
	 *
	 * @see       filterByFaseProcesso()
	 *
	 * @param     mixed $faseProcessoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByFaseProcessoId($faseProcessoId = null, $comparison = null)
	{
		if (is_array($faseProcessoId)) {
			$useMinMax = false;
			if (isset($faseProcessoId['min'])) {
				$this->addUsingAlias(ProcessoPeer::FASE_PROCESSO_ID, $faseProcessoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($faseProcessoId['max'])) {
				$this->addUsingAlias(ProcessoPeer::FASE_PROCESSO_ID, $faseProcessoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProcessoPeer::FASE_PROCESSO_ID, $faseProcessoId, $comparison);
	}

	/**
	 * Filter the query on the area_advocacia_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAreaAdvocaciaId(1234); // WHERE area_advocacia_id = 1234
	 * $query->filterByAreaAdvocaciaId(array(12, 34)); // WHERE area_advocacia_id IN (12, 34)
	 * $query->filterByAreaAdvocaciaId(array('min' => 12)); // WHERE area_advocacia_id > 12
	 * </code>
	 *
	 * @see       filterByAreaAdvocacia()
	 *
	 * @param     mixed $areaAdvocaciaId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByAreaAdvocaciaId($areaAdvocaciaId = null, $comparison = null)
	{
		if (is_array($areaAdvocaciaId)) {
			$useMinMax = false;
			if (isset($areaAdvocaciaId['min'])) {
				$this->addUsingAlias(ProcessoPeer::AREA_ADVOCACIA_ID, $areaAdvocaciaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($areaAdvocaciaId['max'])) {
				$this->addUsingAlias(ProcessoPeer::AREA_ADVOCACIA_ID, $areaAdvocaciaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProcessoPeer::AREA_ADVOCACIA_ID, $areaAdvocaciaId, $comparison);
	}

	/**
	 * Filter the query on the tribunal_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTribunalId(1234); // WHERE tribunal_id = 1234
	 * $query->filterByTribunalId(array(12, 34)); // WHERE tribunal_id IN (12, 34)
	 * $query->filterByTribunalId(array('min' => 12)); // WHERE tribunal_id > 12
	 * </code>
	 *
	 * @see       filterByTribunal()
	 *
	 * @param     mixed $tribunalId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByTribunalId($tribunalId = null, $comparison = null)
	{
		if (is_array($tribunalId)) {
			$useMinMax = false;
			if (isset($tribunalId['min'])) {
				$this->addUsingAlias(ProcessoPeer::TRIBUNAL_ID, $tribunalId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($tribunalId['max'])) {
				$this->addUsingAlias(ProcessoPeer::TRIBUNAL_ID, $tribunalId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProcessoPeer::TRIBUNAL_ID, $tribunalId, $comparison);
	}

	/**
	 * Filter the query on the uf_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUfId(1234); // WHERE uf_id = 1234
	 * $query->filterByUfId(array(12, 34)); // WHERE uf_id IN (12, 34)
	 * $query->filterByUfId(array('min' => 12)); // WHERE uf_id > 12
	 * </code>
	 *
	 * @see       filterByUf()
	 *
	 * @param     mixed $ufId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByUfId($ufId = null, $comparison = null)
	{
		if (is_array($ufId)) {
			$useMinMax = false;
			if (isset($ufId['min'])) {
				$this->addUsingAlias(ProcessoPeer::UF_ID, $ufId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($ufId['max'])) {
				$this->addUsingAlias(ProcessoPeer::UF_ID, $ufId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProcessoPeer::UF_ID, $ufId, $comparison);
	}

	/**
	 * Filter the query on the nome_processo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNomeProcesso('fooValue');   // WHERE nome_processo = 'fooValue'
	 * $query->filterByNomeProcesso('%fooValue%'); // WHERE nome_processo LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nomeProcesso The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByNomeProcesso($nomeProcesso = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nomeProcesso)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nomeProcesso)) {
				$nomeProcesso = str_replace('*', '%', $nomeProcesso);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProcessoPeer::NOME_PROCESSO, $nomeProcesso, $comparison);
	}

	/**
	 * Filter the query on the numero_cnj column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNumeroCnj('fooValue');   // WHERE numero_cnj = 'fooValue'
	 * $query->filterByNumeroCnj('%fooValue%'); // WHERE numero_cnj LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $numeroCnj The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByNumeroCnj($numeroCnj = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($numeroCnj)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $numeroCnj)) {
				$numeroCnj = str_replace('*', '%', $numeroCnj);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProcessoPeer::NUMERO_CNJ, $numeroCnj, $comparison);
	}

	/**
	 * Filter the query on the numero_processo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNumeroProcesso('fooValue');   // WHERE numero_processo = 'fooValue'
	 * $query->filterByNumeroProcesso('%fooValue%'); // WHERE numero_processo LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $numeroProcesso The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByNumeroProcesso($numeroProcesso = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($numeroProcesso)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $numeroProcesso)) {
				$numeroProcesso = str_replace('*', '%', $numeroProcesso);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProcessoPeer::NUMERO_PROCESSO, $numeroProcesso, $comparison);
	}

	/**
	 * Filter the query on the tipo_processo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTipoProcesso('fooValue');   // WHERE tipo_processo = 'fooValue'
	 * $query->filterByTipoProcesso('%fooValue%'); // WHERE tipo_processo LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $tipoProcesso The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByTipoProcesso($tipoProcesso = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($tipoProcesso)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $tipoProcesso)) {
				$tipoProcesso = str_replace('*', '%', $tipoProcesso);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProcessoPeer::TIPO_PROCESSO, $tipoProcesso, $comparison);
	}

	/**
	 * Filter the query on the situacao_cliente column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySituacaoCliente('fooValue');   // WHERE situacao_cliente = 'fooValue'
	 * $query->filterBySituacaoCliente('%fooValue%'); // WHERE situacao_cliente LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $situacaoCliente The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterBySituacaoCliente($situacaoCliente = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($situacaoCliente)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $situacaoCliente)) {
				$situacaoCliente = str_replace('*', '%', $situacaoCliente);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProcessoPeer::SITUACAO_CLIENTE, $situacaoCliente, $comparison);
	}

	/**
	 * Filter the query on the descricao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDescricao('fooValue');   // WHERE descricao = 'fooValue'
	 * $query->filterByDescricao('%fooValue%'); // WHERE descricao LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $descricao The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByDescricao($descricao = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($descricao)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $descricao)) {
				$descricao = str_replace('*', '%', $descricao);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProcessoPeer::DESCRICAO, $descricao, $comparison);
	}

	/**
	 * Filter the query on the objetivo_final column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByObjetivoFinal('fooValue');   // WHERE objetivo_final = 'fooValue'
	 * $query->filterByObjetivoFinal('%fooValue%'); // WHERE objetivo_final LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $objetivoFinal The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByObjetivoFinal($objetivoFinal = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($objetivoFinal)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $objetivoFinal)) {
				$objetivoFinal = str_replace('*', '%', $objetivoFinal);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProcessoPeer::OBJETIVO_FINAL, $objetivoFinal, $comparison);
	}

	/**
	 * Filter the query on the data_abertura column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataAbertura('2011-03-14'); // WHERE data_abertura = '2011-03-14'
	 * $query->filterByDataAbertura('now'); // WHERE data_abertura = '2011-03-14'
	 * $query->filterByDataAbertura(array('max' => 'yesterday')); // WHERE data_abertura > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataAbertura The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByDataAbertura($dataAbertura = null, $comparison = null)
	{
		if (is_array($dataAbertura)) {
			$useMinMax = false;
			if (isset($dataAbertura['min'])) {
				$this->addUsingAlias(ProcessoPeer::DATA_ABERTURA, $dataAbertura['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataAbertura['max'])) {
				$this->addUsingAlias(ProcessoPeer::DATA_ABERTURA, $dataAbertura['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProcessoPeer::DATA_ABERTURA, $dataAbertura, $comparison);
	}

	/**
	 * Filter the query on the data_fechamento column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataFechamento('2011-03-14'); // WHERE data_fechamento = '2011-03-14'
	 * $query->filterByDataFechamento('now'); // WHERE data_fechamento = '2011-03-14'
	 * $query->filterByDataFechamento(array('max' => 'yesterday')); // WHERE data_fechamento > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataFechamento The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByDataFechamento($dataFechamento = null, $comparison = null)
	{
		if (is_array($dataFechamento)) {
			$useMinMax = false;
			if (isset($dataFechamento['min'])) {
				$this->addUsingAlias(ProcessoPeer::DATA_FECHAMENTO, $dataFechamento['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataFechamento['max'])) {
				$this->addUsingAlias(ProcessoPeer::DATA_FECHAMENTO, $dataFechamento['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProcessoPeer::DATA_FECHAMENTO, $dataFechamento, $comparison);
	}

	/**
	 * Filter the query on the ativo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAtivo(true); // WHERE ativo = true
	 * $query->filterByAtivo('yes'); // WHERE ativo = true
	 * </code>
	 *
	 * @param     boolean|string $ativo The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByAtivo($ativo = null, $comparison = null)
	{
		if (is_string($ativo)) {
			$ativo = in_array(strtolower($ativo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ProcessoPeer::ATIVO, $ativo, $comparison);
	}

	/**
	 * Filter the query on the valor_causa column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByValorCausa(1234); // WHERE valor_causa = 1234
	 * $query->filterByValorCausa(array(12, 34)); // WHERE valor_causa IN (12, 34)
	 * $query->filterByValorCausa(array('min' => 12)); // WHERE valor_causa > 12
	 * </code>
	 *
	 * @param     mixed $valorCausa The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByValorCausa($valorCausa = null, $comparison = null)
	{
		if (is_array($valorCausa)) {
			$useMinMax = false;
			if (isset($valorCausa['min'])) {
				$this->addUsingAlias(ProcessoPeer::VALOR_CAUSA, $valorCausa['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($valorCausa['max'])) {
				$this->addUsingAlias(ProcessoPeer::VALOR_CAUSA, $valorCausa['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProcessoPeer::VALOR_CAUSA, $valorCausa, $comparison);
	}

	/**
	 * Filter the query on the valor_processo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByValorProcesso(1234); // WHERE valor_processo = 1234
	 * $query->filterByValorProcesso(array(12, 34)); // WHERE valor_processo IN (12, 34)
	 * $query->filterByValorProcesso(array('min' => 12)); // WHERE valor_processo > 12
	 * </code>
	 *
	 * @param     mixed $valorProcesso The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByValorProcesso($valorProcesso = null, $comparison = null)
	{
		if (is_array($valorProcesso)) {
			$useMinMax = false;
			if (isset($valorProcesso['min'])) {
				$this->addUsingAlias(ProcessoPeer::VALOR_PROCESSO, $valorProcesso['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($valorProcesso['max'])) {
				$this->addUsingAlias(ProcessoPeer::VALOR_PROCESSO, $valorProcesso['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProcessoPeer::VALOR_PROCESSO, $valorProcesso, $comparison);
	}

	/**
	 * Filter the query on the valor_contigencia column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByValorContigencia(1234); // WHERE valor_contigencia = 1234
	 * $query->filterByValorContigencia(array(12, 34)); // WHERE valor_contigencia IN (12, 34)
	 * $query->filterByValorContigencia(array('min' => 12)); // WHERE valor_contigencia > 12
	 * </code>
	 *
	 * @param     mixed $valorContigencia The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByValorContigencia($valorContigencia = null, $comparison = null)
	{
		if (is_array($valorContigencia)) {
			$useMinMax = false;
			if (isset($valorContigencia['min'])) {
				$this->addUsingAlias(ProcessoPeer::VALOR_CONTIGENCIA, $valorContigencia['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($valorContigencia['max'])) {
				$this->addUsingAlias(ProcessoPeer::VALOR_CONTIGENCIA, $valorContigencia['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProcessoPeer::VALOR_CONTIGENCIA, $valorContigencia, $comparison);
	}

	/**
	 * Filter the query on the valor_garantia_juizo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByValorGarantiaJuizo(1234); // WHERE valor_garantia_juizo = 1234
	 * $query->filterByValorGarantiaJuizo(array(12, 34)); // WHERE valor_garantia_juizo IN (12, 34)
	 * $query->filterByValorGarantiaJuizo(array('min' => 12)); // WHERE valor_garantia_juizo > 12
	 * </code>
	 *
	 * @param     mixed $valorGarantiaJuizo The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByValorGarantiaJuizo($valorGarantiaJuizo = null, $comparison = null)
	{
		if (is_array($valorGarantiaJuizo)) {
			$useMinMax = false;
			if (isset($valorGarantiaJuizo['min'])) {
				$this->addUsingAlias(ProcessoPeer::VALOR_GARANTIA_JUIZO, $valorGarantiaJuizo['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($valorGarantiaJuizo['max'])) {
				$this->addUsingAlias(ProcessoPeer::VALOR_GARANTIA_JUIZO, $valorGarantiaJuizo['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProcessoPeer::VALOR_GARANTIA_JUIZO, $valorGarantiaJuizo, $comparison);
	}

	/**
	 * Filter the query on the valor_deposito_recursal column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByValorDepositoRecursal(1234); // WHERE valor_deposito_recursal = 1234
	 * $query->filterByValorDepositoRecursal(array(12, 34)); // WHERE valor_deposito_recursal IN (12, 34)
	 * $query->filterByValorDepositoRecursal(array('min' => 12)); // WHERE valor_deposito_recursal > 12
	 * </code>
	 *
	 * @param     mixed $valorDepositoRecursal The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByValorDepositoRecursal($valorDepositoRecursal = null, $comparison = null)
	{
		if (is_array($valorDepositoRecursal)) {
			$useMinMax = false;
			if (isset($valorDepositoRecursal['min'])) {
				$this->addUsingAlias(ProcessoPeer::VALOR_DEPOSITO_RECURSAL, $valorDepositoRecursal['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($valorDepositoRecursal['max'])) {
				$this->addUsingAlias(ProcessoPeer::VALOR_DEPOSITO_RECURSAL, $valorDepositoRecursal['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ProcessoPeer::VALOR_DEPOSITO_RECURSAL, $valorDepositoRecursal, $comparison);
	}

	/**
	 * Filter the query on the analise_risco column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAnaliseRisco('fooValue');   // WHERE analise_risco = 'fooValue'
	 * $query->filterByAnaliseRisco('%fooValue%'); // WHERE analise_risco LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $analiseRisco The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByAnaliseRisco($analiseRisco = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($analiseRisco)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $analiseRisco)) {
				$analiseRisco = str_replace('*', '%', $analiseRisco);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ProcessoPeer::ANALISE_RISCO, $analiseRisco, $comparison);
	}

	/**
	 * Filter the query by a related Advogado object
	 *
	 * @param     Advogado|PropelCollection $advogado The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByAdvogado($advogado, $comparison = null)
	{
		if ($advogado instanceof Advogado) {
			return $this
				->addUsingAlias(ProcessoPeer::ADVOGADO_ID, $advogado->getId(), $comparison);
		} elseif ($advogado instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ProcessoPeer::ADVOGADO_ID, $advogado->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByAdvogado() only accepts arguments of type Advogado or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Advogado relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function joinAdvogado($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Advogado');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Advogado');
		}

		return $this;
	}

	/**
	 * Use the Advogado relation Advogado object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdvogadoQuery A secondary query class using the current class as primary query
	 */
	public function useAdvogadoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAdvogado($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Advogado', 'AdvogadoQuery');
	}

	/**
	 * Filter the query by a related AreaAdvocacia object
	 *
	 * @param     AreaAdvocacia|PropelCollection $areaAdvocacia The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByAreaAdvocacia($areaAdvocacia, $comparison = null)
	{
		if ($areaAdvocacia instanceof AreaAdvocacia) {
			return $this
				->addUsingAlias(ProcessoPeer::AREA_ADVOCACIA_ID, $areaAdvocacia->getId(), $comparison);
		} elseif ($areaAdvocacia instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ProcessoPeer::AREA_ADVOCACIA_ID, $areaAdvocacia->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByAreaAdvocacia() only accepts arguments of type AreaAdvocacia or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AreaAdvocacia relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function joinAreaAdvocacia($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AreaAdvocacia');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'AreaAdvocacia');
		}

		return $this;
	}

	/**
	 * Use the AreaAdvocacia relation AreaAdvocacia object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AreaAdvocaciaQuery A secondary query class using the current class as primary query
	 */
	public function useAreaAdvocaciaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAreaAdvocacia($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AreaAdvocacia', 'AreaAdvocaciaQuery');
	}

	/**
	 * Filter the query by a related Contrato object
	 *
	 * @param     Contrato|PropelCollection $contrato The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByContrato($contrato, $comparison = null)
	{
		if ($contrato instanceof Contrato) {
			return $this
				->addUsingAlias(ProcessoPeer::CONTRATO_ID, $contrato->getId(), $comparison);
		} elseif ($contrato instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ProcessoPeer::CONTRATO_ID, $contrato->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByContrato() only accepts arguments of type Contrato or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Contrato relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function joinContrato($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Contrato');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Contrato');
		}

		return $this;
	}

	/**
	 * Use the Contrato relation Contrato object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ContratoQuery A secondary query class using the current class as primary query
	 */
	public function useContratoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinContrato($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Contrato', 'ContratoQuery');
	}

	/**
	 * Filter the query by a related FaseProcesso object
	 *
	 * @param     FaseProcesso|PropelCollection $faseProcesso The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByFaseProcesso($faseProcesso, $comparison = null)
	{
		if ($faseProcesso instanceof FaseProcesso) {
			return $this
				->addUsingAlias(ProcessoPeer::FASE_PROCESSO_ID, $faseProcesso->getId(), $comparison);
		} elseif ($faseProcesso instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ProcessoPeer::FASE_PROCESSO_ID, $faseProcesso->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByFaseProcesso() only accepts arguments of type FaseProcesso or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the FaseProcesso relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function joinFaseProcesso($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('FaseProcesso');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'FaseProcesso');
		}

		return $this;
	}

	/**
	 * Use the FaseProcesso relation FaseProcesso object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    FaseProcessoQuery A secondary query class using the current class as primary query
	 */
	public function useFaseProcessoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinFaseProcesso($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'FaseProcesso', 'FaseProcessoQuery');
	}

	/**
	 * Filter the query by a related Tribunal object
	 *
	 * @param     Tribunal|PropelCollection $tribunal The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByTribunal($tribunal, $comparison = null)
	{
		if ($tribunal instanceof Tribunal) {
			return $this
				->addUsingAlias(ProcessoPeer::TRIBUNAL_ID, $tribunal->getId(), $comparison);
		} elseif ($tribunal instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ProcessoPeer::TRIBUNAL_ID, $tribunal->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByTribunal() only accepts arguments of type Tribunal or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Tribunal relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function joinTribunal($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Tribunal');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Tribunal');
		}

		return $this;
	}

	/**
	 * Use the Tribunal relation Tribunal object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TribunalQuery A secondary query class using the current class as primary query
	 */
	public function useTribunalQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinTribunal($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Tribunal', 'TribunalQuery');
	}

	/**
	 * Filter the query by a related Uf object
	 *
	 * @param     Uf|PropelCollection $uf The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByUf($uf, $comparison = null)
	{
		if ($uf instanceof Uf) {
			return $this
				->addUsingAlias(ProcessoPeer::UF_ID, $uf->getId(), $comparison);
		} elseif ($uf instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ProcessoPeer::UF_ID, $uf->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUf() only accepts arguments of type Uf or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Uf relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function joinUf($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Uf');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Uf');
		}

		return $this;
	}

	/**
	 * Use the Uf relation Uf object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UfQuery A secondary query class using the current class as primary query
	 */
	public function useUfQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUf($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Uf', 'UfQuery');
	}

	/**
	 * Filter the query by a related Cliente object
	 *
	 * @param     Cliente|PropelCollection $cliente The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByCliente($cliente, $comparison = null)
	{
		if ($cliente instanceof Cliente) {
			return $this
				->addUsingAlias(ProcessoPeer::CLIENTE_ID, $cliente->getId(), $comparison);
		} elseif ($cliente instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ProcessoPeer::CLIENTE_ID, $cliente->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByCliente() only accepts arguments of type Cliente or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Cliente relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function joinCliente($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Cliente');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Cliente');
		}

		return $this;
	}

	/**
	 * Use the Cliente relation Cliente object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClienteQuery A secondary query class using the current class as primary query
	 */
	public function useClienteQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCliente($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Cliente', 'ClienteQuery');
	}

	/**
	 * Filter the query by a related AndamentoProcesso object
	 *
	 * @param     AndamentoProcesso $andamentoProcesso  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByAndamentoProcesso($andamentoProcesso, $comparison = null)
	{
		if ($andamentoProcesso instanceof AndamentoProcesso) {
			return $this
				->addUsingAlias(ProcessoPeer::ID, $andamentoProcesso->getProcessoId(), $comparison);
		} elseif ($andamentoProcesso instanceof PropelCollection) {
			return $this
				->useAndamentoProcessoQuery()
				->filterByPrimaryKeys($andamentoProcesso->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAndamentoProcesso() only accepts arguments of type AndamentoProcesso or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AndamentoProcesso relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function joinAndamentoProcesso($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AndamentoProcesso');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'AndamentoProcesso');
		}

		return $this;
	}

	/**
	 * Use the AndamentoProcesso relation AndamentoProcesso object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AndamentoProcessoQuery A secondary query class using the current class as primary query
	 */
	public function useAndamentoProcessoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAndamentoProcesso($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AndamentoProcesso', 'AndamentoProcessoQuery');
	}

	/**
	 * Filter the query by a related AnotacaoProcesso object
	 *
	 * @param     AnotacaoProcesso $anotacaoProcesso  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByAnotacaoProcesso($anotacaoProcesso, $comparison = null)
	{
		if ($anotacaoProcesso instanceof AnotacaoProcesso) {
			return $this
				->addUsingAlias(ProcessoPeer::ID, $anotacaoProcesso->getProcessoId(), $comparison);
		} elseif ($anotacaoProcesso instanceof PropelCollection) {
			return $this
				->useAnotacaoProcessoQuery()
				->filterByPrimaryKeys($anotacaoProcesso->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAnotacaoProcesso() only accepts arguments of type AnotacaoProcesso or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AnotacaoProcesso relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function joinAnotacaoProcesso($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AnotacaoProcesso');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'AnotacaoProcesso');
		}

		return $this;
	}

	/**
	 * Use the AnotacaoProcesso relation AnotacaoProcesso object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AnotacaoProcessoQuery A secondary query class using the current class as primary query
	 */
	public function useAnotacaoProcessoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAnotacaoProcesso($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AnotacaoProcesso', 'AnotacaoProcessoQuery');
	}

	/**
	 * Filter the query by a related CasoProcesso object
	 *
	 * @param     CasoProcesso $casoProcesso  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByCasoProcesso($casoProcesso, $comparison = null)
	{
		if ($casoProcesso instanceof CasoProcesso) {
			return $this
				->addUsingAlias(ProcessoPeer::ID, $casoProcesso->getProcessoId(), $comparison);
		} elseif ($casoProcesso instanceof PropelCollection) {
			return $this
				->useCasoProcessoQuery()
				->filterByPrimaryKeys($casoProcesso->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByCasoProcesso() only accepts arguments of type CasoProcesso or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the CasoProcesso relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function joinCasoProcesso($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('CasoProcesso');

		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}

		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'CasoProcesso');
		}

		return $this;
	}

	/**
	 * Use the CasoProcesso relation CasoProcesso object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CasoProcessoQuery A secondary query class using the current class as primary query
	 */
	public function useCasoProcessoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCasoProcesso($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'CasoProcesso', 'CasoProcessoQuery');
	}

	/**
	 * Filter the query by a related Caso object
	 * using the caso_processo table as cross reference
	 *
	 * @param     Caso $caso the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function filterByCaso($caso, $comparison = Criteria::EQUAL)
	{
		return $this
			->useCasoProcessoQuery()
			->filterByCaso($caso, $comparison)
			->endUse();
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Processo $processo Object to remove from the list of results
	 *
	 * @return    ProcessoQuery The current query, for fluid interface
	 */
	public function prune($processo = null)
	{
		if ($processo) {
			$this->addUsingAlias(ProcessoPeer::ID, $processo->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseProcessoQuery