<?php


/**
 * Base class that represents a query for the 'solicitacao' table.
 *
 * 
 *
 * @method     SolicitacaoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SolicitacaoQuery orderByClienteId($order = Criteria::ASC) Order by the cliente_id column
 * @method     SolicitacaoQuery orderByAreaAdvocaciaId($order = Criteria::ASC) Order by the area_advocacia_id column
 * @method     SolicitacaoQuery orderByAdvogadoId($order = Criteria::ASC) Order by the advogado_id column
 * @method     SolicitacaoQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 * @method     SolicitacaoQuery orderByDataCriacao($order = Criteria::ASC) Order by the data_criacao column
 * @method     SolicitacaoQuery orderByDataAtendimento($order = Criteria::ASC) Order by the data_atendimento column
 * @method     SolicitacaoQuery orderByLongitude($order = Criteria::ASC) Order by the longitude column
 * @method     SolicitacaoQuery orderByLatitude($order = Criteria::ASC) Order by the latitude column
 * @method     SolicitacaoQuery orderByRaio($order = Criteria::ASC) Order by the raio column
 * @method     SolicitacaoQuery orderByAtendida($order = Criteria::ASC) Order by the atendida column
 * @method     SolicitacaoQuery orderByAtiva($order = Criteria::ASC) Order by the ativa column
 *
 * @method     SolicitacaoQuery groupById() Group by the id column
 * @method     SolicitacaoQuery groupByClienteId() Group by the cliente_id column
 * @method     SolicitacaoQuery groupByAreaAdvocaciaId() Group by the area_advocacia_id column
 * @method     SolicitacaoQuery groupByAdvogadoId() Group by the advogado_id column
 * @method     SolicitacaoQuery groupByDescricao() Group by the descricao column
 * @method     SolicitacaoQuery groupByDataCriacao() Group by the data_criacao column
 * @method     SolicitacaoQuery groupByDataAtendimento() Group by the data_atendimento column
 * @method     SolicitacaoQuery groupByLongitude() Group by the longitude column
 * @method     SolicitacaoQuery groupByLatitude() Group by the latitude column
 * @method     SolicitacaoQuery groupByRaio() Group by the raio column
 * @method     SolicitacaoQuery groupByAtendida() Group by the atendida column
 * @method     SolicitacaoQuery groupByAtiva() Group by the ativa column
 *
 * @method     SolicitacaoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SolicitacaoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SolicitacaoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SolicitacaoQuery leftJoinAdvogado($relationAlias = null) Adds a LEFT JOIN clause to the query using the Advogado relation
 * @method     SolicitacaoQuery rightJoinAdvogado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Advogado relation
 * @method     SolicitacaoQuery innerJoinAdvogado($relationAlias = null) Adds a INNER JOIN clause to the query using the Advogado relation
 *
 * @method     SolicitacaoQuery leftJoinAreaAdvocacia($relationAlias = null) Adds a LEFT JOIN clause to the query using the AreaAdvocacia relation
 * @method     SolicitacaoQuery rightJoinAreaAdvocacia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AreaAdvocacia relation
 * @method     SolicitacaoQuery innerJoinAreaAdvocacia($relationAlias = null) Adds a INNER JOIN clause to the query using the AreaAdvocacia relation
 *
 * @method     SolicitacaoQuery leftJoinCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cliente relation
 * @method     SolicitacaoQuery rightJoinCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cliente relation
 * @method     SolicitacaoQuery innerJoinCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the Cliente relation
 *
 * @method     SolicitacaoQuery leftJoinCaso($relationAlias = null) Adds a LEFT JOIN clause to the query using the Caso relation
 * @method     SolicitacaoQuery rightJoinCaso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Caso relation
 * @method     SolicitacaoQuery innerJoinCaso($relationAlias = null) Adds a INNER JOIN clause to the query using the Caso relation
 *
 * @method     Solicitacao findOne(PropelPDO $con = null) Return the first Solicitacao matching the query
 * @method     Solicitacao findOneOrCreate(PropelPDO $con = null) Return the first Solicitacao matching the query, or a new Solicitacao object populated from the query conditions when no match is found
 *
 * @method     Solicitacao findOneById(int $id) Return the first Solicitacao filtered by the id column
 * @method     Solicitacao findOneByClienteId(int $cliente_id) Return the first Solicitacao filtered by the cliente_id column
 * @method     Solicitacao findOneByAreaAdvocaciaId(int $area_advocacia_id) Return the first Solicitacao filtered by the area_advocacia_id column
 * @method     Solicitacao findOneByAdvogadoId(int $advogado_id) Return the first Solicitacao filtered by the advogado_id column
 * @method     Solicitacao findOneByDescricao(string $descricao) Return the first Solicitacao filtered by the descricao column
 * @method     Solicitacao findOneByDataCriacao(string $data_criacao) Return the first Solicitacao filtered by the data_criacao column
 * @method     Solicitacao findOneByDataAtendimento(string $data_atendimento) Return the first Solicitacao filtered by the data_atendimento column
 * @method     Solicitacao findOneByLongitude(double $longitude) Return the first Solicitacao filtered by the longitude column
 * @method     Solicitacao findOneByLatitude(double $latitude) Return the first Solicitacao filtered by the latitude column
 * @method     Solicitacao findOneByRaio(int $raio) Return the first Solicitacao filtered by the raio column
 * @method     Solicitacao findOneByAtendida(boolean $atendida) Return the first Solicitacao filtered by the atendida column
 * @method     Solicitacao findOneByAtiva(boolean $ativa) Return the first Solicitacao filtered by the ativa column
 *
 * @method     array findById(int $id) Return Solicitacao objects filtered by the id column
 * @method     array findByClienteId(int $cliente_id) Return Solicitacao objects filtered by the cliente_id column
 * @method     array findByAreaAdvocaciaId(int $area_advocacia_id) Return Solicitacao objects filtered by the area_advocacia_id column
 * @method     array findByAdvogadoId(int $advogado_id) Return Solicitacao objects filtered by the advogado_id column
 * @method     array findByDescricao(string $descricao) Return Solicitacao objects filtered by the descricao column
 * @method     array findByDataCriacao(string $data_criacao) Return Solicitacao objects filtered by the data_criacao column
 * @method     array findByDataAtendimento(string $data_atendimento) Return Solicitacao objects filtered by the data_atendimento column
 * @method     array findByLongitude(double $longitude) Return Solicitacao objects filtered by the longitude column
 * @method     array findByLatitude(double $latitude) Return Solicitacao objects filtered by the latitude column
 * @method     array findByRaio(int $raio) Return Solicitacao objects filtered by the raio column
 * @method     array findByAtendida(boolean $atendida) Return Solicitacao objects filtered by the atendida column
 * @method     array findByAtiva(boolean $ativa) Return Solicitacao objects filtered by the ativa column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseSolicitacaoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseSolicitacaoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Solicitacao', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SolicitacaoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SolicitacaoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SolicitacaoQuery) {
			return $criteria;
		}
		$query = new SolicitacaoQuery();
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
	 * @return    Solicitacao|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SolicitacaoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(SolicitacaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Solicitacao A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `CLIENTE_ID`, `AREA_ADVOCACIA_ID`, `ADVOGADO_ID`, `DESCRICAO`, `DATA_CRIACAO`, `DATA_ATENDIMENTO`, `LONGITUDE`, `LATITUDE`, `RAIO`, `ATENDIDA`, `ATIVA` FROM `solicitacao` WHERE `ID` = :p0';
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
			$obj = new Solicitacao();
			$obj->hydrate($row);
			SolicitacaoPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Solicitacao|array|mixed the result, formatted by the current formatter
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
	 * @return    SolicitacaoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SolicitacaoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SolicitacaoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SolicitacaoPeer::ID, $keys, Criteria::IN);
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
	 * @return    SolicitacaoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SolicitacaoPeer::ID, $id, $comparison);
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
	 * @return    SolicitacaoQuery The current query, for fluid interface
	 */
	public function filterByClienteId($clienteId = null, $comparison = null)
	{
		if (is_array($clienteId)) {
			$useMinMax = false;
			if (isset($clienteId['min'])) {
				$this->addUsingAlias(SolicitacaoPeer::CLIENTE_ID, $clienteId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clienteId['max'])) {
				$this->addUsingAlias(SolicitacaoPeer::CLIENTE_ID, $clienteId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SolicitacaoPeer::CLIENTE_ID, $clienteId, $comparison);
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
	 * @return    SolicitacaoQuery The current query, for fluid interface
	 */
	public function filterByAreaAdvocaciaId($areaAdvocaciaId = null, $comparison = null)
	{
		if (is_array($areaAdvocaciaId)) {
			$useMinMax = false;
			if (isset($areaAdvocaciaId['min'])) {
				$this->addUsingAlias(SolicitacaoPeer::AREA_ADVOCACIA_ID, $areaAdvocaciaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($areaAdvocaciaId['max'])) {
				$this->addUsingAlias(SolicitacaoPeer::AREA_ADVOCACIA_ID, $areaAdvocaciaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SolicitacaoPeer::AREA_ADVOCACIA_ID, $areaAdvocaciaId, $comparison);
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
	 * @return    SolicitacaoQuery The current query, for fluid interface
	 */
	public function filterByAdvogadoId($advogadoId = null, $comparison = null)
	{
		if (is_array($advogadoId)) {
			$useMinMax = false;
			if (isset($advogadoId['min'])) {
				$this->addUsingAlias(SolicitacaoPeer::ADVOGADO_ID, $advogadoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($advogadoId['max'])) {
				$this->addUsingAlias(SolicitacaoPeer::ADVOGADO_ID, $advogadoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SolicitacaoPeer::ADVOGADO_ID, $advogadoId, $comparison);
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
	 * @return    SolicitacaoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(SolicitacaoPeer::DESCRICAO, $descricao, $comparison);
	}

	/**
	 * Filter the query on the data_criacao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataCriacao('2011-03-14'); // WHERE data_criacao = '2011-03-14'
	 * $query->filterByDataCriacao('now'); // WHERE data_criacao = '2011-03-14'
	 * $query->filterByDataCriacao(array('max' => 'yesterday')); // WHERE data_criacao > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataCriacao The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitacaoQuery The current query, for fluid interface
	 */
	public function filterByDataCriacao($dataCriacao = null, $comparison = null)
	{
		if (is_array($dataCriacao)) {
			$useMinMax = false;
			if (isset($dataCriacao['min'])) {
				$this->addUsingAlias(SolicitacaoPeer::DATA_CRIACAO, $dataCriacao['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataCriacao['max'])) {
				$this->addUsingAlias(SolicitacaoPeer::DATA_CRIACAO, $dataCriacao['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SolicitacaoPeer::DATA_CRIACAO, $dataCriacao, $comparison);
	}

	/**
	 * Filter the query on the data_atendimento column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataAtendimento('2011-03-14'); // WHERE data_atendimento = '2011-03-14'
	 * $query->filterByDataAtendimento('now'); // WHERE data_atendimento = '2011-03-14'
	 * $query->filterByDataAtendimento(array('max' => 'yesterday')); // WHERE data_atendimento > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataAtendimento The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitacaoQuery The current query, for fluid interface
	 */
	public function filterByDataAtendimento($dataAtendimento = null, $comparison = null)
	{
		if (is_array($dataAtendimento)) {
			$useMinMax = false;
			if (isset($dataAtendimento['min'])) {
				$this->addUsingAlias(SolicitacaoPeer::DATA_ATENDIMENTO, $dataAtendimento['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataAtendimento['max'])) {
				$this->addUsingAlias(SolicitacaoPeer::DATA_ATENDIMENTO, $dataAtendimento['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SolicitacaoPeer::DATA_ATENDIMENTO, $dataAtendimento, $comparison);
	}

	/**
	 * Filter the query on the longitude column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLongitude(1234); // WHERE longitude = 1234
	 * $query->filterByLongitude(array(12, 34)); // WHERE longitude IN (12, 34)
	 * $query->filterByLongitude(array('min' => 12)); // WHERE longitude > 12
	 * </code>
	 *
	 * @param     mixed $longitude The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitacaoQuery The current query, for fluid interface
	 */
	public function filterByLongitude($longitude = null, $comparison = null)
	{
		if (is_array($longitude)) {
			$useMinMax = false;
			if (isset($longitude['min'])) {
				$this->addUsingAlias(SolicitacaoPeer::LONGITUDE, $longitude['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($longitude['max'])) {
				$this->addUsingAlias(SolicitacaoPeer::LONGITUDE, $longitude['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SolicitacaoPeer::LONGITUDE, $longitude, $comparison);
	}

	/**
	 * Filter the query on the latitude column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLatitude(1234); // WHERE latitude = 1234
	 * $query->filterByLatitude(array(12, 34)); // WHERE latitude IN (12, 34)
	 * $query->filterByLatitude(array('min' => 12)); // WHERE latitude > 12
	 * </code>
	 *
	 * @param     mixed $latitude The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitacaoQuery The current query, for fluid interface
	 */
	public function filterByLatitude($latitude = null, $comparison = null)
	{
		if (is_array($latitude)) {
			$useMinMax = false;
			if (isset($latitude['min'])) {
				$this->addUsingAlias(SolicitacaoPeer::LATITUDE, $latitude['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($latitude['max'])) {
				$this->addUsingAlias(SolicitacaoPeer::LATITUDE, $latitude['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SolicitacaoPeer::LATITUDE, $latitude, $comparison);
	}

	/**
	 * Filter the query on the raio column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRaio(1234); // WHERE raio = 1234
	 * $query->filterByRaio(array(12, 34)); // WHERE raio IN (12, 34)
	 * $query->filterByRaio(array('min' => 12)); // WHERE raio > 12
	 * </code>
	 *
	 * @param     mixed $raio The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitacaoQuery The current query, for fluid interface
	 */
	public function filterByRaio($raio = null, $comparison = null)
	{
		if (is_array($raio)) {
			$useMinMax = false;
			if (isset($raio['min'])) {
				$this->addUsingAlias(SolicitacaoPeer::RAIO, $raio['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($raio['max'])) {
				$this->addUsingAlias(SolicitacaoPeer::RAIO, $raio['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SolicitacaoPeer::RAIO, $raio, $comparison);
	}

	/**
	 * Filter the query on the atendida column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAtendida(true); // WHERE atendida = true
	 * $query->filterByAtendida('yes'); // WHERE atendida = true
	 * </code>
	 *
	 * @param     boolean|string $atendida The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitacaoQuery The current query, for fluid interface
	 */
	public function filterByAtendida($atendida = null, $comparison = null)
	{
		if (is_string($atendida)) {
			$atendida = in_array(strtolower($atendida), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(SolicitacaoPeer::ATENDIDA, $atendida, $comparison);
	}

	/**
	 * Filter the query on the ativa column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAtiva(true); // WHERE ativa = true
	 * $query->filterByAtiva('yes'); // WHERE ativa = true
	 * </code>
	 *
	 * @param     boolean|string $ativa The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitacaoQuery The current query, for fluid interface
	 */
	public function filterByAtiva($ativa = null, $comparison = null)
	{
		if (is_string($ativa)) {
			$ativa = in_array(strtolower($ativa), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(SolicitacaoPeer::ATIVA, $ativa, $comparison);
	}

	/**
	 * Filter the query by a related Advogado object
	 *
	 * @param     Advogado|PropelCollection $advogado The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitacaoQuery The current query, for fluid interface
	 */
	public function filterByAdvogado($advogado, $comparison = null)
	{
		if ($advogado instanceof Advogado) {
			return $this
				->addUsingAlias(SolicitacaoPeer::ADVOGADO_ID, $advogado->getId(), $comparison);
		} elseif ($advogado instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SolicitacaoPeer::ADVOGADO_ID, $advogado->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    SolicitacaoQuery The current query, for fluid interface
	 */
	public function joinAdvogado($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useAdvogadoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	 * @return    SolicitacaoQuery The current query, for fluid interface
	 */
	public function filterByAreaAdvocacia($areaAdvocacia, $comparison = null)
	{
		if ($areaAdvocacia instanceof AreaAdvocacia) {
			return $this
				->addUsingAlias(SolicitacaoPeer::AREA_ADVOCACIA_ID, $areaAdvocacia->getId(), $comparison);
		} elseif ($areaAdvocacia instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SolicitacaoPeer::AREA_ADVOCACIA_ID, $areaAdvocacia->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    SolicitacaoQuery The current query, for fluid interface
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
	 * Filter the query by a related Cliente object
	 *
	 * @param     Cliente|PropelCollection $cliente The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitacaoQuery The current query, for fluid interface
	 */
	public function filterByCliente($cliente, $comparison = null)
	{
		if ($cliente instanceof Cliente) {
			return $this
				->addUsingAlias(SolicitacaoPeer::CLIENTE_ID, $cliente->getId(), $comparison);
		} elseif ($cliente instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SolicitacaoPeer::CLIENTE_ID, $cliente->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    SolicitacaoQuery The current query, for fluid interface
	 */
	public function joinCliente($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useClienteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCliente($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Cliente', 'ClienteQuery');
	}

	/**
	 * Filter the query by a related Caso object
	 *
	 * @param     Caso $caso  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitacaoQuery The current query, for fluid interface
	 */
	public function filterByCaso($caso, $comparison = null)
	{
		if ($caso instanceof Caso) {
			return $this
				->addUsingAlias(SolicitacaoPeer::ID, $caso->getSolicitacaoId(), $comparison);
		} elseif ($caso instanceof PropelCollection) {
			return $this
				->useCasoQuery()
				->filterByPrimaryKeys($caso->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByCaso() only accepts arguments of type Caso or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Caso relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SolicitacaoQuery The current query, for fluid interface
	 */
	public function joinCaso($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Caso');

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
			$this->addJoinObject($join, 'Caso');
		}

		return $this;
	}

	/**
	 * Use the Caso relation Caso object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CasoQuery A secondary query class using the current class as primary query
	 */
	public function useCasoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCaso($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Caso', 'CasoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Solicitacao $solicitacao Object to remove from the list of results
	 *
	 * @return    SolicitacaoQuery The current query, for fluid interface
	 */
	public function prune($solicitacao = null)
	{
		if ($solicitacao) {
			$this->addUsingAlias(SolicitacaoPeer::ID, $solicitacao->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseSolicitacaoQuery