<?php


/**
 * Base class that represents a query for the 'solicitacao_resgate' table.
 *
 * 
 *
 * @method     SolicitacaoResgateQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SolicitacaoResgateQuery orderBySolicitanteId($order = Criteria::ASC) Order by the solicitante_id column
 * @method     SolicitacaoResgateQuery orderByAprovadorId($order = Criteria::ASC) Order by the aprovador_id column
 * @method     SolicitacaoResgateQuery orderByPremioId($order = Criteria::ASC) Order by the premio_id column
 * @method     SolicitacaoResgateQuery orderByDataSolicitacao($order = Criteria::ASC) Order by the data_solicitacao column
 * @method     SolicitacaoResgateQuery orderByAprovada($order = Criteria::ASC) Order by the aprovada column
 *
 * @method     SolicitacaoResgateQuery groupById() Group by the id column
 * @method     SolicitacaoResgateQuery groupBySolicitanteId() Group by the solicitante_id column
 * @method     SolicitacaoResgateQuery groupByAprovadorId() Group by the aprovador_id column
 * @method     SolicitacaoResgateQuery groupByPremioId() Group by the premio_id column
 * @method     SolicitacaoResgateQuery groupByDataSolicitacao() Group by the data_solicitacao column
 * @method     SolicitacaoResgateQuery groupByAprovada() Group by the aprovada column
 *
 * @method     SolicitacaoResgateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SolicitacaoResgateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SolicitacaoResgateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SolicitacaoResgateQuery leftJoinUsuarioRelatedBySolicitanteId($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioRelatedBySolicitanteId relation
 * @method     SolicitacaoResgateQuery rightJoinUsuarioRelatedBySolicitanteId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioRelatedBySolicitanteId relation
 * @method     SolicitacaoResgateQuery innerJoinUsuarioRelatedBySolicitanteId($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioRelatedBySolicitanteId relation
 *
 * @method     SolicitacaoResgateQuery leftJoinPremio($relationAlias = null) Adds a LEFT JOIN clause to the query using the Premio relation
 * @method     SolicitacaoResgateQuery rightJoinPremio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Premio relation
 * @method     SolicitacaoResgateQuery innerJoinPremio($relationAlias = null) Adds a INNER JOIN clause to the query using the Premio relation
 *
 * @method     SolicitacaoResgateQuery leftJoinUsuarioRelatedByAprovadorId($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioRelatedByAprovadorId relation
 * @method     SolicitacaoResgateQuery rightJoinUsuarioRelatedByAprovadorId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioRelatedByAprovadorId relation
 * @method     SolicitacaoResgateQuery innerJoinUsuarioRelatedByAprovadorId($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioRelatedByAprovadorId relation
 *
 * @method     SolicitacaoResgate findOne(PropelPDO $con = null) Return the first SolicitacaoResgate matching the query
 * @method     SolicitacaoResgate findOneOrCreate(PropelPDO $con = null) Return the first SolicitacaoResgate matching the query, or a new SolicitacaoResgate object populated from the query conditions when no match is found
 *
 * @method     SolicitacaoResgate findOneById(int $id) Return the first SolicitacaoResgate filtered by the id column
 * @method     SolicitacaoResgate findOneBySolicitanteId(int $solicitante_id) Return the first SolicitacaoResgate filtered by the solicitante_id column
 * @method     SolicitacaoResgate findOneByAprovadorId(int $aprovador_id) Return the first SolicitacaoResgate filtered by the aprovador_id column
 * @method     SolicitacaoResgate findOneByPremioId(int $premio_id) Return the first SolicitacaoResgate filtered by the premio_id column
 * @method     SolicitacaoResgate findOneByDataSolicitacao(string $data_solicitacao) Return the first SolicitacaoResgate filtered by the data_solicitacao column
 * @method     SolicitacaoResgate findOneByAprovada(boolean $aprovada) Return the first SolicitacaoResgate filtered by the aprovada column
 *
 * @method     array findById(int $id) Return SolicitacaoResgate objects filtered by the id column
 * @method     array findBySolicitanteId(int $solicitante_id) Return SolicitacaoResgate objects filtered by the solicitante_id column
 * @method     array findByAprovadorId(int $aprovador_id) Return SolicitacaoResgate objects filtered by the aprovador_id column
 * @method     array findByPremioId(int $premio_id) Return SolicitacaoResgate objects filtered by the premio_id column
 * @method     array findByDataSolicitacao(string $data_solicitacao) Return SolicitacaoResgate objects filtered by the data_solicitacao column
 * @method     array findByAprovada(boolean $aprovada) Return SolicitacaoResgate objects filtered by the aprovada column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseSolicitacaoResgateQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseSolicitacaoResgateQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'SolicitacaoResgate', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SolicitacaoResgateQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SolicitacaoResgateQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SolicitacaoResgateQuery) {
			return $criteria;
		}
		$query = new SolicitacaoResgateQuery();
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
	 * @return    SolicitacaoResgate|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SolicitacaoResgatePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(SolicitacaoResgatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    SolicitacaoResgate A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `SOLICITANTE_ID`, `APROVADOR_ID`, `PREMIO_ID`, `DATA_SOLICITACAO`, `APROVADA` FROM `solicitacao_resgate` WHERE `ID` = :p0';
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
			$obj = new SolicitacaoResgate();
			$obj->hydrate($row);
			SolicitacaoResgatePeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    SolicitacaoResgate|array|mixed the result, formatted by the current formatter
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
	 * @return    SolicitacaoResgateQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SolicitacaoResgatePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SolicitacaoResgateQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SolicitacaoResgatePeer::ID, $keys, Criteria::IN);
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
	 * @return    SolicitacaoResgateQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SolicitacaoResgatePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the solicitante_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySolicitanteId(1234); // WHERE solicitante_id = 1234
	 * $query->filterBySolicitanteId(array(12, 34)); // WHERE solicitante_id IN (12, 34)
	 * $query->filterBySolicitanteId(array('min' => 12)); // WHERE solicitante_id > 12
	 * </code>
	 *
	 * @see       filterByUsuarioRelatedBySolicitanteId()
	 *
	 * @param     mixed $solicitanteId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitacaoResgateQuery The current query, for fluid interface
	 */
	public function filterBySolicitanteId($solicitanteId = null, $comparison = null)
	{
		if (is_array($solicitanteId)) {
			$useMinMax = false;
			if (isset($solicitanteId['min'])) {
				$this->addUsingAlias(SolicitacaoResgatePeer::SOLICITANTE_ID, $solicitanteId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($solicitanteId['max'])) {
				$this->addUsingAlias(SolicitacaoResgatePeer::SOLICITANTE_ID, $solicitanteId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SolicitacaoResgatePeer::SOLICITANTE_ID, $solicitanteId, $comparison);
	}

	/**
	 * Filter the query on the aprovador_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAprovadorId(1234); // WHERE aprovador_id = 1234
	 * $query->filterByAprovadorId(array(12, 34)); // WHERE aprovador_id IN (12, 34)
	 * $query->filterByAprovadorId(array('min' => 12)); // WHERE aprovador_id > 12
	 * </code>
	 *
	 * @see       filterByUsuarioRelatedByAprovadorId()
	 *
	 * @param     mixed $aprovadorId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitacaoResgateQuery The current query, for fluid interface
	 */
	public function filterByAprovadorId($aprovadorId = null, $comparison = null)
	{
		if (is_array($aprovadorId)) {
			$useMinMax = false;
			if (isset($aprovadorId['min'])) {
				$this->addUsingAlias(SolicitacaoResgatePeer::APROVADOR_ID, $aprovadorId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($aprovadorId['max'])) {
				$this->addUsingAlias(SolicitacaoResgatePeer::APROVADOR_ID, $aprovadorId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SolicitacaoResgatePeer::APROVADOR_ID, $aprovadorId, $comparison);
	}

	/**
	 * Filter the query on the premio_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPremioId(1234); // WHERE premio_id = 1234
	 * $query->filterByPremioId(array(12, 34)); // WHERE premio_id IN (12, 34)
	 * $query->filterByPremioId(array('min' => 12)); // WHERE premio_id > 12
	 * </code>
	 *
	 * @see       filterByPremio()
	 *
	 * @param     mixed $premioId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitacaoResgateQuery The current query, for fluid interface
	 */
	public function filterByPremioId($premioId = null, $comparison = null)
	{
		if (is_array($premioId)) {
			$useMinMax = false;
			if (isset($premioId['min'])) {
				$this->addUsingAlias(SolicitacaoResgatePeer::PREMIO_ID, $premioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($premioId['max'])) {
				$this->addUsingAlias(SolicitacaoResgatePeer::PREMIO_ID, $premioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SolicitacaoResgatePeer::PREMIO_ID, $premioId, $comparison);
	}

	/**
	 * Filter the query on the data_solicitacao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataSolicitacao('fooValue');   // WHERE data_solicitacao = 'fooValue'
	 * $query->filterByDataSolicitacao('%fooValue%'); // WHERE data_solicitacao LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $dataSolicitacao The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitacaoResgateQuery The current query, for fluid interface
	 */
	public function filterByDataSolicitacao($dataSolicitacao = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($dataSolicitacao)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $dataSolicitacao)) {
				$dataSolicitacao = str_replace('*', '%', $dataSolicitacao);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SolicitacaoResgatePeer::DATA_SOLICITACAO, $dataSolicitacao, $comparison);
	}

	/**
	 * Filter the query on the aprovada column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAprovada(true); // WHERE aprovada = true
	 * $query->filterByAprovada('yes'); // WHERE aprovada = true
	 * </code>
	 *
	 * @param     boolean|string $aprovada The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitacaoResgateQuery The current query, for fluid interface
	 */
	public function filterByAprovada($aprovada = null, $comparison = null)
	{
		if (is_string($aprovada)) {
			$aprovada = in_array(strtolower($aprovada), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(SolicitacaoResgatePeer::APROVADA, $aprovada, $comparison);
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitacaoResgateQuery The current query, for fluid interface
	 */
	public function filterByUsuarioRelatedBySolicitanteId($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(SolicitacaoResgatePeer::SOLICITANTE_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SolicitacaoResgatePeer::SOLICITANTE_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUsuarioRelatedBySolicitanteId() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UsuarioRelatedBySolicitanteId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SolicitacaoResgateQuery The current query, for fluid interface
	 */
	public function joinUsuarioRelatedBySolicitanteId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UsuarioRelatedBySolicitanteId');

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
			$this->addJoinObject($join, 'UsuarioRelatedBySolicitanteId');
		}

		return $this;
	}

	/**
	 * Use the UsuarioRelatedBySolicitanteId relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioRelatedBySolicitanteIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUsuarioRelatedBySolicitanteId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UsuarioRelatedBySolicitanteId', 'UsuarioQuery');
	}

	/**
	 * Filter the query by a related Premio object
	 *
	 * @param     Premio|PropelCollection $premio The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitacaoResgateQuery The current query, for fluid interface
	 */
	public function filterByPremio($premio, $comparison = null)
	{
		if ($premio instanceof Premio) {
			return $this
				->addUsingAlias(SolicitacaoResgatePeer::PREMIO_ID, $premio->getId(), $comparison);
		} elseif ($premio instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SolicitacaoResgatePeer::PREMIO_ID, $premio->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByPremio() only accepts arguments of type Premio or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Premio relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SolicitacaoResgateQuery The current query, for fluid interface
	 */
	public function joinPremio($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Premio');

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
			$this->addJoinObject($join, 'Premio');
		}

		return $this;
	}

	/**
	 * Use the Premio relation Premio object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PremioQuery A secondary query class using the current class as primary query
	 */
	public function usePremioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPremio($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Premio', 'PremioQuery');
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SolicitacaoResgateQuery The current query, for fluid interface
	 */
	public function filterByUsuarioRelatedByAprovadorId($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(SolicitacaoResgatePeer::APROVADOR_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SolicitacaoResgatePeer::APROVADOR_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUsuarioRelatedByAprovadorId() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UsuarioRelatedByAprovadorId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SolicitacaoResgateQuery The current query, for fluid interface
	 */
	public function joinUsuarioRelatedByAprovadorId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UsuarioRelatedByAprovadorId');

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
			$this->addJoinObject($join, 'UsuarioRelatedByAprovadorId');
		}

		return $this;
	}

	/**
	 * Use the UsuarioRelatedByAprovadorId relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioRelatedByAprovadorIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUsuarioRelatedByAprovadorId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UsuarioRelatedByAprovadorId', 'UsuarioQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SolicitacaoResgate $solicitacaoResgate Object to remove from the list of results
	 *
	 * @return    SolicitacaoResgateQuery The current query, for fluid interface
	 */
	public function prune($solicitacaoResgate = null)
	{
		if ($solicitacaoResgate) {
			$this->addUsingAlias(SolicitacaoResgatePeer::ID, $solicitacaoResgate->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseSolicitacaoResgateQuery