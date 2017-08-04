<?php


/**
 * Base class that represents a query for the 'cargo_pesquisa' table.
 *
 * 
 *
 * @method     CargoPesquisaQuery orderByCargoId($order = Criteria::ASC) Order by the cargo_id column
 * @method     CargoPesquisaQuery orderByPesquisaId($order = Criteria::ASC) Order by the pesquisa_id column
 *
 * @method     CargoPesquisaQuery groupByCargoId() Group by the cargo_id column
 * @method     CargoPesquisaQuery groupByPesquisaId() Group by the pesquisa_id column
 *
 * @method     CargoPesquisaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CargoPesquisaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CargoPesquisaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CargoPesquisaQuery leftJoinCargo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cargo relation
 * @method     CargoPesquisaQuery rightJoinCargo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cargo relation
 * @method     CargoPesquisaQuery innerJoinCargo($relationAlias = null) Adds a INNER JOIN clause to the query using the Cargo relation
 *
 * @method     CargoPesquisaQuery leftJoinPesquisa($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pesquisa relation
 * @method     CargoPesquisaQuery rightJoinPesquisa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pesquisa relation
 * @method     CargoPesquisaQuery innerJoinPesquisa($relationAlias = null) Adds a INNER JOIN clause to the query using the Pesquisa relation
 *
 * @method     CargoPesquisa findOne(PropelPDO $con = null) Return the first CargoPesquisa matching the query
 * @method     CargoPesquisa findOneOrCreate(PropelPDO $con = null) Return the first CargoPesquisa matching the query, or a new CargoPesquisa object populated from the query conditions when no match is found
 *
 * @method     CargoPesquisa findOneByCargoId(int $cargo_id) Return the first CargoPesquisa filtered by the cargo_id column
 * @method     CargoPesquisa findOneByPesquisaId(int $pesquisa_id) Return the first CargoPesquisa filtered by the pesquisa_id column
 *
 * @method     array findByCargoId(int $cargo_id) Return CargoPesquisa objects filtered by the cargo_id column
 * @method     array findByPesquisaId(int $pesquisa_id) Return CargoPesquisa objects filtered by the pesquisa_id column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseCargoPesquisaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseCargoPesquisaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'CargoPesquisa', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CargoPesquisaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CargoPesquisaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CargoPesquisaQuery) {
			return $criteria;
		}
		$query = new CargoPesquisaQuery();
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
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 *
	 * @param     array[$cargo_id, $pesquisa_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    CargoPesquisa|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = CargoPesquisaPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(CargoPesquisaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    CargoPesquisa A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `CARGO_ID`, `PESQUISA_ID` FROM `cargo_pesquisa` WHERE `CARGO_ID` = :p0 AND `PESQUISA_ID` = :p1';
		try {
			$stmt = $con->prepare($sql);			
			$stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);			
			$stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new CargoPesquisa();
			$obj->hydrate($row);
			CargoPesquisaPeer::addInstanceToPool($obj, serialize(array((string) $row[0], (string) $row[1])));
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
	 * @return    CargoPesquisa|array|mixed the result, formatted by the current formatter
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
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
	 * @return    CargoPesquisaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(CargoPesquisaPeer::CARGO_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(CargoPesquisaPeer::PESQUISA_ID, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CargoPesquisaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(CargoPesquisaPeer::CARGO_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(CargoPesquisaPeer::PESQUISA_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
	}

	/**
	 * Filter the query on the cargo_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCargoId(1234); // WHERE cargo_id = 1234
	 * $query->filterByCargoId(array(12, 34)); // WHERE cargo_id IN (12, 34)
	 * $query->filterByCargoId(array('min' => 12)); // WHERE cargo_id > 12
	 * </code>
	 *
	 * @see       filterByCargo()
	 *
	 * @param     mixed $cargoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CargoPesquisaQuery The current query, for fluid interface
	 */
	public function filterByCargoId($cargoId = null, $comparison = null)
	{
		if (is_array($cargoId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CargoPesquisaPeer::CARGO_ID, $cargoId, $comparison);
	}

	/**
	 * Filter the query on the pesquisa_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPesquisaId(1234); // WHERE pesquisa_id = 1234
	 * $query->filterByPesquisaId(array(12, 34)); // WHERE pesquisa_id IN (12, 34)
	 * $query->filterByPesquisaId(array('min' => 12)); // WHERE pesquisa_id > 12
	 * </code>
	 *
	 * @see       filterByPesquisa()
	 *
	 * @param     mixed $pesquisaId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CargoPesquisaQuery The current query, for fluid interface
	 */
	public function filterByPesquisaId($pesquisaId = null, $comparison = null)
	{
		if (is_array($pesquisaId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CargoPesquisaPeer::PESQUISA_ID, $pesquisaId, $comparison);
	}

	/**
	 * Filter the query by a related Cargo object
	 *
	 * @param     Cargo|PropelCollection $cargo The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CargoPesquisaQuery The current query, for fluid interface
	 */
	public function filterByCargo($cargo, $comparison = null)
	{
		if ($cargo instanceof Cargo) {
			return $this
				->addUsingAlias(CargoPesquisaPeer::CARGO_ID, $cargo->getId(), $comparison);
		} elseif ($cargo instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CargoPesquisaPeer::CARGO_ID, $cargo->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByCargo() only accepts arguments of type Cargo or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Cargo relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CargoPesquisaQuery The current query, for fluid interface
	 */
	public function joinCargo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Cargo');

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
			$this->addJoinObject($join, 'Cargo');
		}

		return $this;
	}

	/**
	 * Use the Cargo relation Cargo object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CargoQuery A secondary query class using the current class as primary query
	 */
	public function useCargoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCargo($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Cargo', 'CargoQuery');
	}

	/**
	 * Filter the query by a related Pesquisa object
	 *
	 * @param     Pesquisa|PropelCollection $pesquisa The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CargoPesquisaQuery The current query, for fluid interface
	 */
	public function filterByPesquisa($pesquisa, $comparison = null)
	{
		if ($pesquisa instanceof Pesquisa) {
			return $this
				->addUsingAlias(CargoPesquisaPeer::PESQUISA_ID, $pesquisa->getId(), $comparison);
		} elseif ($pesquisa instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CargoPesquisaPeer::PESQUISA_ID, $pesquisa->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByPesquisa() only accepts arguments of type Pesquisa or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Pesquisa relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CargoPesquisaQuery The current query, for fluid interface
	 */
	public function joinPesquisa($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Pesquisa');

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
			$this->addJoinObject($join, 'Pesquisa');
		}

		return $this;
	}

	/**
	 * Use the Pesquisa relation Pesquisa object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PesquisaQuery A secondary query class using the current class as primary query
	 */
	public function usePesquisaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPesquisa($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Pesquisa', 'PesquisaQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     CargoPesquisa $cargoPesquisa Object to remove from the list of results
	 *
	 * @return    CargoPesquisaQuery The current query, for fluid interface
	 */
	public function prune($cargoPesquisa = null)
	{
		if ($cargoPesquisa) {
			$this->addCond('pruneCond0', $this->getAliasedColName(CargoPesquisaPeer::CARGO_ID), $cargoPesquisa->getCargoId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(CargoPesquisaPeer::PESQUISA_ID), $cargoPesquisa->getPesquisaId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BaseCargoPesquisaQuery