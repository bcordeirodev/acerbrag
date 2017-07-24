<?php


/**
 * Base class that represents a query for the 'caso' table.
 *
 * 
 *
 * @method     CasoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CasoQuery orderByAdvogadoId($order = Criteria::ASC) Order by the advogado_id column
 * @method     CasoQuery orderByAreaAdvocaciaId($order = Criteria::ASC) Order by the area_advocacia_id column
 * @method     CasoQuery orderByUfId($order = Criteria::ASC) Order by the uf_id column
 * @method     CasoQuery orderByContratoId($order = Criteria::ASC) Order by the contrato_id column
 * @method     CasoQuery orderByClienteId($order = Criteria::ASC) Order by the cliente_id column
 * @method     CasoQuery orderBySolicitacaoId($order = Criteria::ASC) Order by the solicitacao_id column
 * @method     CasoQuery orderByNomeCaso($order = Criteria::ASC) Order by the nome_caso column
 * @method     CasoQuery orderByObjetivoFinal($order = Criteria::ASC) Order by the objetivo_final column
 * @method     CasoQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 * @method     CasoQuery orderByDataAbertura($order = Criteria::ASC) Order by the data_abertura column
 * @method     CasoQuery orderByDataFechamento($order = Criteria::ASC) Order by the data_fechamento column
 * @method     CasoQuery orderByAtivo($order = Criteria::ASC) Order by the ativo column
 * @method     CasoQuery orderBySituacaoCliente($order = Criteria::ASC) Order by the situacao_cliente column
 * @method     CasoQuery orderByAnaliseRisco($order = Criteria::ASC) Order by the analise_risco column
 *
 * @method     CasoQuery groupById() Group by the id column
 * @method     CasoQuery groupByAdvogadoId() Group by the advogado_id column
 * @method     CasoQuery groupByAreaAdvocaciaId() Group by the area_advocacia_id column
 * @method     CasoQuery groupByUfId() Group by the uf_id column
 * @method     CasoQuery groupByContratoId() Group by the contrato_id column
 * @method     CasoQuery groupByClienteId() Group by the cliente_id column
 * @method     CasoQuery groupBySolicitacaoId() Group by the solicitacao_id column
 * @method     CasoQuery groupByNomeCaso() Group by the nome_caso column
 * @method     CasoQuery groupByObjetivoFinal() Group by the objetivo_final column
 * @method     CasoQuery groupByDescricao() Group by the descricao column
 * @method     CasoQuery groupByDataAbertura() Group by the data_abertura column
 * @method     CasoQuery groupByDataFechamento() Group by the data_fechamento column
 * @method     CasoQuery groupByAtivo() Group by the ativo column
 * @method     CasoQuery groupBySituacaoCliente() Group by the situacao_cliente column
 * @method     CasoQuery groupByAnaliseRisco() Group by the analise_risco column
 *
 * @method     CasoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CasoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CasoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CasoQuery leftJoinAdvogado($relationAlias = null) Adds a LEFT JOIN clause to the query using the Advogado relation
 * @method     CasoQuery rightJoinAdvogado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Advogado relation
 * @method     CasoQuery innerJoinAdvogado($relationAlias = null) Adds a INNER JOIN clause to the query using the Advogado relation
 *
 * @method     CasoQuery leftJoinAreaAdvocacia($relationAlias = null) Adds a LEFT JOIN clause to the query using the AreaAdvocacia relation
 * @method     CasoQuery rightJoinAreaAdvocacia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AreaAdvocacia relation
 * @method     CasoQuery innerJoinAreaAdvocacia($relationAlias = null) Adds a INNER JOIN clause to the query using the AreaAdvocacia relation
 *
 * @method     CasoQuery leftJoinCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cliente relation
 * @method     CasoQuery rightJoinCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cliente relation
 * @method     CasoQuery innerJoinCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the Cliente relation
 *
 * @method     CasoQuery leftJoinContrato($relationAlias = null) Adds a LEFT JOIN clause to the query using the Contrato relation
 * @method     CasoQuery rightJoinContrato($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Contrato relation
 * @method     CasoQuery innerJoinContrato($relationAlias = null) Adds a INNER JOIN clause to the query using the Contrato relation
 *
 * @method     CasoQuery leftJoinSolicitacao($relationAlias = null) Adds a LEFT JOIN clause to the query using the Solicitacao relation
 * @method     CasoQuery rightJoinSolicitacao($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Solicitacao relation
 * @method     CasoQuery innerJoinSolicitacao($relationAlias = null) Adds a INNER JOIN clause to the query using the Solicitacao relation
 *
 * @method     CasoQuery leftJoinAnotacaoCaso($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnotacaoCaso relation
 * @method     CasoQuery rightJoinAnotacaoCaso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnotacaoCaso relation
 * @method     CasoQuery innerJoinAnotacaoCaso($relationAlias = null) Adds a INNER JOIN clause to the query using the AnotacaoCaso relation
 *
 * @method     CasoQuery leftJoinCasoProcesso($relationAlias = null) Adds a LEFT JOIN clause to the query using the CasoProcesso relation
 * @method     CasoQuery rightJoinCasoProcesso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CasoProcesso relation
 * @method     CasoQuery innerJoinCasoProcesso($relationAlias = null) Adds a INNER JOIN clause to the query using the CasoProcesso relation
 *
 * @method     Caso findOne(PropelPDO $con = null) Return the first Caso matching the query
 * @method     Caso findOneOrCreate(PropelPDO $con = null) Return the first Caso matching the query, or a new Caso object populated from the query conditions when no match is found
 *
 * @method     Caso findOneById(int $id) Return the first Caso filtered by the id column
 * @method     Caso findOneByAdvogadoId(int $advogado_id) Return the first Caso filtered by the advogado_id column
 * @method     Caso findOneByAreaAdvocaciaId(int $area_advocacia_id) Return the first Caso filtered by the area_advocacia_id column
 * @method     Caso findOneByUfId(int $uf_id) Return the first Caso filtered by the uf_id column
 * @method     Caso findOneByContratoId(int $contrato_id) Return the first Caso filtered by the contrato_id column
 * @method     Caso findOneByClienteId(int $cliente_id) Return the first Caso filtered by the cliente_id column
 * @method     Caso findOneBySolicitacaoId(int $solicitacao_id) Return the first Caso filtered by the solicitacao_id column
 * @method     Caso findOneByNomeCaso(string $nome_caso) Return the first Caso filtered by the nome_caso column
 * @method     Caso findOneByObjetivoFinal(string $objetivo_final) Return the first Caso filtered by the objetivo_final column
 * @method     Caso findOneByDescricao(string $descricao) Return the first Caso filtered by the descricao column
 * @method     Caso findOneByDataAbertura(string $data_abertura) Return the first Caso filtered by the data_abertura column
 * @method     Caso findOneByDataFechamento(string $data_fechamento) Return the first Caso filtered by the data_fechamento column
 * @method     Caso findOneByAtivo(boolean $ativo) Return the first Caso filtered by the ativo column
 * @method     Caso findOneBySituacaoCliente(string $situacao_cliente) Return the first Caso filtered by the situacao_cliente column
 * @method     Caso findOneByAnaliseRisco(string $analise_risco) Return the first Caso filtered by the analise_risco column
 *
 * @method     array findById(int $id) Return Caso objects filtered by the id column
 * @method     array findByAdvogadoId(int $advogado_id) Return Caso objects filtered by the advogado_id column
 * @method     array findByAreaAdvocaciaId(int $area_advocacia_id) Return Caso objects filtered by the area_advocacia_id column
 * @method     array findByUfId(int $uf_id) Return Caso objects filtered by the uf_id column
 * @method     array findByContratoId(int $contrato_id) Return Caso objects filtered by the contrato_id column
 * @method     array findByClienteId(int $cliente_id) Return Caso objects filtered by the cliente_id column
 * @method     array findBySolicitacaoId(int $solicitacao_id) Return Caso objects filtered by the solicitacao_id column
 * @method     array findByNomeCaso(string $nome_caso) Return Caso objects filtered by the nome_caso column
 * @method     array findByObjetivoFinal(string $objetivo_final) Return Caso objects filtered by the objetivo_final column
 * @method     array findByDescricao(string $descricao) Return Caso objects filtered by the descricao column
 * @method     array findByDataAbertura(string $data_abertura) Return Caso objects filtered by the data_abertura column
 * @method     array findByDataFechamento(string $data_fechamento) Return Caso objects filtered by the data_fechamento column
 * @method     array findByAtivo(boolean $ativo) Return Caso objects filtered by the ativo column
 * @method     array findBySituacaoCliente(string $situacao_cliente) Return Caso objects filtered by the situacao_cliente column
 * @method     array findByAnaliseRisco(string $analise_risco) Return Caso objects filtered by the analise_risco column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseCasoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseCasoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Caso', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CasoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CasoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CasoQuery) {
			return $criteria;
		}
		$query = new CasoQuery();
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
	 * @return    Caso|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = CasoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Caso A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ADVOGADO_ID`, `AREA_ADVOCACIA_ID`, `UF_ID`, `CONTRATO_ID`, `CLIENTE_ID`, `SOLICITACAO_ID`, `NOME_CASO`, `OBJETIVO_FINAL`, `DESCRICAO`, `DATA_ABERTURA`, `DATA_FECHAMENTO`, `ATIVO`, `SITUACAO_CLIENTE`, `ANALISE_RISCO` FROM `caso` WHERE `ID` = :p0';
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
			$obj = new Caso();
			$obj->hydrate($row);
			CasoPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Caso|array|mixed the result, formatted by the current formatter
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
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CasoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CasoPeer::ID, $keys, Criteria::IN);
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
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CasoPeer::ID, $id, $comparison);
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
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function filterByAdvogadoId($advogadoId = null, $comparison = null)
	{
		if (is_array($advogadoId)) {
			$useMinMax = false;
			if (isset($advogadoId['min'])) {
				$this->addUsingAlias(CasoPeer::ADVOGADO_ID, $advogadoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($advogadoId['max'])) {
				$this->addUsingAlias(CasoPeer::ADVOGADO_ID, $advogadoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CasoPeer::ADVOGADO_ID, $advogadoId, $comparison);
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
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function filterByAreaAdvocaciaId($areaAdvocaciaId = null, $comparison = null)
	{
		if (is_array($areaAdvocaciaId)) {
			$useMinMax = false;
			if (isset($areaAdvocaciaId['min'])) {
				$this->addUsingAlias(CasoPeer::AREA_ADVOCACIA_ID, $areaAdvocaciaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($areaAdvocaciaId['max'])) {
				$this->addUsingAlias(CasoPeer::AREA_ADVOCACIA_ID, $areaAdvocaciaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CasoPeer::AREA_ADVOCACIA_ID, $areaAdvocaciaId, $comparison);
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
	 * @param     mixed $ufId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function filterByUfId($ufId = null, $comparison = null)
	{
		if (is_array($ufId)) {
			$useMinMax = false;
			if (isset($ufId['min'])) {
				$this->addUsingAlias(CasoPeer::UF_ID, $ufId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($ufId['max'])) {
				$this->addUsingAlias(CasoPeer::UF_ID, $ufId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CasoPeer::UF_ID, $ufId, $comparison);
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
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function filterByContratoId($contratoId = null, $comparison = null)
	{
		if (is_array($contratoId)) {
			$useMinMax = false;
			if (isset($contratoId['min'])) {
				$this->addUsingAlias(CasoPeer::CONTRATO_ID, $contratoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($contratoId['max'])) {
				$this->addUsingAlias(CasoPeer::CONTRATO_ID, $contratoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CasoPeer::CONTRATO_ID, $contratoId, $comparison);
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
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function filterByClienteId($clienteId = null, $comparison = null)
	{
		if (is_array($clienteId)) {
			$useMinMax = false;
			if (isset($clienteId['min'])) {
				$this->addUsingAlias(CasoPeer::CLIENTE_ID, $clienteId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clienteId['max'])) {
				$this->addUsingAlias(CasoPeer::CLIENTE_ID, $clienteId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CasoPeer::CLIENTE_ID, $clienteId, $comparison);
	}

	/**
	 * Filter the query on the solicitacao_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySolicitacaoId(1234); // WHERE solicitacao_id = 1234
	 * $query->filterBySolicitacaoId(array(12, 34)); // WHERE solicitacao_id IN (12, 34)
	 * $query->filterBySolicitacaoId(array('min' => 12)); // WHERE solicitacao_id > 12
	 * </code>
	 *
	 * @see       filterBySolicitacao()
	 *
	 * @param     mixed $solicitacaoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function filterBySolicitacaoId($solicitacaoId = null, $comparison = null)
	{
		if (is_array($solicitacaoId)) {
			$useMinMax = false;
			if (isset($solicitacaoId['min'])) {
				$this->addUsingAlias(CasoPeer::SOLICITACAO_ID, $solicitacaoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($solicitacaoId['max'])) {
				$this->addUsingAlias(CasoPeer::SOLICITACAO_ID, $solicitacaoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CasoPeer::SOLICITACAO_ID, $solicitacaoId, $comparison);
	}

	/**
	 * Filter the query on the nome_caso column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNomeCaso('fooValue');   // WHERE nome_caso = 'fooValue'
	 * $query->filterByNomeCaso('%fooValue%'); // WHERE nome_caso LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nomeCaso The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function filterByNomeCaso($nomeCaso = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nomeCaso)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nomeCaso)) {
				$nomeCaso = str_replace('*', '%', $nomeCaso);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CasoPeer::NOME_CASO, $nomeCaso, $comparison);
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
	 * @return    CasoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(CasoPeer::OBJETIVO_FINAL, $objetivoFinal, $comparison);
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
	 * @return    CasoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(CasoPeer::DESCRICAO, $descricao, $comparison);
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
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function filterByDataAbertura($dataAbertura = null, $comparison = null)
	{
		if (is_array($dataAbertura)) {
			$useMinMax = false;
			if (isset($dataAbertura['min'])) {
				$this->addUsingAlias(CasoPeer::DATA_ABERTURA, $dataAbertura['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataAbertura['max'])) {
				$this->addUsingAlias(CasoPeer::DATA_ABERTURA, $dataAbertura['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CasoPeer::DATA_ABERTURA, $dataAbertura, $comparison);
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
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function filterByDataFechamento($dataFechamento = null, $comparison = null)
	{
		if (is_array($dataFechamento)) {
			$useMinMax = false;
			if (isset($dataFechamento['min'])) {
				$this->addUsingAlias(CasoPeer::DATA_FECHAMENTO, $dataFechamento['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataFechamento['max'])) {
				$this->addUsingAlias(CasoPeer::DATA_FECHAMENTO, $dataFechamento['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CasoPeer::DATA_FECHAMENTO, $dataFechamento, $comparison);
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
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function filterByAtivo($ativo = null, $comparison = null)
	{
		if (is_string($ativo)) {
			$ativo = in_array(strtolower($ativo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(CasoPeer::ATIVO, $ativo, $comparison);
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
	 * @return    CasoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(CasoPeer::SITUACAO_CLIENTE, $situacaoCliente, $comparison);
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
	 * @return    CasoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(CasoPeer::ANALISE_RISCO, $analiseRisco, $comparison);
	}

	/**
	 * Filter the query by a related Advogado object
	 *
	 * @param     Advogado|PropelCollection $advogado The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function filterByAdvogado($advogado, $comparison = null)
	{
		if ($advogado instanceof Advogado) {
			return $this
				->addUsingAlias(CasoPeer::ADVOGADO_ID, $advogado->getId(), $comparison);
		} elseif ($advogado instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CasoPeer::ADVOGADO_ID, $advogado->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    CasoQuery The current query, for fluid interface
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
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function filterByAreaAdvocacia($areaAdvocacia, $comparison = null)
	{
		if ($areaAdvocacia instanceof AreaAdvocacia) {
			return $this
				->addUsingAlias(CasoPeer::AREA_ADVOCACIA_ID, $areaAdvocacia->getId(), $comparison);
		} elseif ($areaAdvocacia instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CasoPeer::AREA_ADVOCACIA_ID, $areaAdvocacia->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function joinAreaAdvocacia($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useAreaAdvocaciaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAreaAdvocacia($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AreaAdvocacia', 'AreaAdvocaciaQuery');
	}

	/**
	 * Filter the query by a related Cliente object
	 *
	 * @param     Cliente|PropelCollection $cliente The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function filterByCliente($cliente, $comparison = null)
	{
		if ($cliente instanceof Cliente) {
			return $this
				->addUsingAlias(CasoPeer::CLIENTE_ID, $cliente->getId(), $comparison);
		} elseif ($cliente instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CasoPeer::CLIENTE_ID, $cliente->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    CasoQuery The current query, for fluid interface
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
	 * Filter the query by a related Contrato object
	 *
	 * @param     Contrato|PropelCollection $contrato The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function filterByContrato($contrato, $comparison = null)
	{
		if ($contrato instanceof Contrato) {
			return $this
				->addUsingAlias(CasoPeer::CONTRATO_ID, $contrato->getId(), $comparison);
		} elseif ($contrato instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CasoPeer::CONTRATO_ID, $contrato->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    CasoQuery The current query, for fluid interface
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
	 * Filter the query by a related Solicitacao object
	 *
	 * @param     Solicitacao|PropelCollection $solicitacao The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function filterBySolicitacao($solicitacao, $comparison = null)
	{
		if ($solicitacao instanceof Solicitacao) {
			return $this
				->addUsingAlias(CasoPeer::SOLICITACAO_ID, $solicitacao->getId(), $comparison);
		} elseif ($solicitacao instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CasoPeer::SOLICITACAO_ID, $solicitacao->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterBySolicitacao() only accepts arguments of type Solicitacao or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Solicitacao relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function joinSolicitacao($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Solicitacao');

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
			$this->addJoinObject($join, 'Solicitacao');
		}

		return $this;
	}

	/**
	 * Use the Solicitacao relation Solicitacao object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SolicitacaoQuery A secondary query class using the current class as primary query
	 */
	public function useSolicitacaoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSolicitacao($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Solicitacao', 'SolicitacaoQuery');
	}

	/**
	 * Filter the query by a related AnotacaoCaso object
	 *
	 * @param     AnotacaoCaso $anotacaoCaso  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function filterByAnotacaoCaso($anotacaoCaso, $comparison = null)
	{
		if ($anotacaoCaso instanceof AnotacaoCaso) {
			return $this
				->addUsingAlias(CasoPeer::ID, $anotacaoCaso->getCasoId(), $comparison);
		} elseif ($anotacaoCaso instanceof PropelCollection) {
			return $this
				->useAnotacaoCasoQuery()
				->filterByPrimaryKeys($anotacaoCaso->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAnotacaoCaso() only accepts arguments of type AnotacaoCaso or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AnotacaoCaso relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function joinAnotacaoCaso($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AnotacaoCaso');

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
			$this->addJoinObject($join, 'AnotacaoCaso');
		}

		return $this;
	}

	/**
	 * Use the AnotacaoCaso relation AnotacaoCaso object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AnotacaoCasoQuery A secondary query class using the current class as primary query
	 */
	public function useAnotacaoCasoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAnotacaoCaso($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AnotacaoCaso', 'AnotacaoCasoQuery');
	}

	/**
	 * Filter the query by a related CasoProcesso object
	 *
	 * @param     CasoProcesso $casoProcesso  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function filterByCasoProcesso($casoProcesso, $comparison = null)
	{
		if ($casoProcesso instanceof CasoProcesso) {
			return $this
				->addUsingAlias(CasoPeer::ID, $casoProcesso->getCasoId(), $comparison);
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
	 * @return    CasoQuery The current query, for fluid interface
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
	 * Filter the query by a related Processo object
	 * using the caso_processo table as cross reference
	 *
	 * @param     Processo $processo the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function filterByProcesso($processo, $comparison = Criteria::EQUAL)
	{
		return $this
			->useCasoProcessoQuery()
			->filterByProcesso($processo, $comparison)
			->endUse();
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Caso $caso Object to remove from the list of results
	 *
	 * @return    CasoQuery The current query, for fluid interface
	 */
	public function prune($caso = null)
	{
		if ($caso) {
			$this->addUsingAlias(CasoPeer::ID, $caso->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseCasoQuery