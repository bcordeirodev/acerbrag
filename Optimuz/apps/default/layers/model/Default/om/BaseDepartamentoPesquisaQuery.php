<?php


/**
 * Base class that represents a query for the 'departamento_pesquisa' table.
 *
 * 
 *
 * @method     DepartamentoPesquisaQuery orderByDepartamentoId($order = Criteria::ASC) Order by the departamento_id column
 * @method     DepartamentoPesquisaQuery orderByPesquisaId($order = Criteria::ASC) Order by the pesquisa_id column
 *
 * @method     DepartamentoPesquisaQuery groupByDepartamentoId() Group by the departamento_id column
 * @method     DepartamentoPesquisaQuery groupByPesquisaId() Group by the pesquisa_id column
 *
 * @method     DepartamentoPesquisaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     DepartamentoPesquisaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     DepartamentoPesquisaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     DepartamentoPesquisaQuery leftJoinDepartamento($relationAlias = null) Adds a LEFT JOIN clause to the query using the Departamento relation
 * @method     DepartamentoPesquisaQuery rightJoinDepartamento($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Departamento relation
 * @method     DepartamentoPesquisaQuery innerJoinDepartamento($relationAlias = null) Adds a INNER JOIN clause to the query using the Departamento relation
 *
 * @method     DepartamentoPesquisaQuery leftJoinPesquisa($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pesquisa relation
 * @method     DepartamentoPesquisaQuery rightJoinPesquisa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pesquisa relation
 * @method     DepartamentoPesquisaQuery innerJoinPesquisa($relationAlias = null) Adds a INNER JOIN clause to the query using the Pesquisa relation
 *
 * @method     DepartamentoPesquisa findOne(PropelPDO $con = null) Return the first DepartamentoPesquisa matching the query
 * @method     DepartamentoPesquisa findOneOrCreate(PropelPDO $con = null) Return the first DepartamentoPesquisa matching the query, or a new DepartamentoPesquisa object populated from the query conditions when no match is found
 *
 * @method     DepartamentoPesquisa findOneByDepartamentoId(int $departamento_id) Return the first DepartamentoPesquisa filtered by the departamento_id column
 * @method     DepartamentoPesquisa findOneByPesquisaId(int $pesquisa_id) Return the first DepartamentoPesquisa filtered by the pesquisa_id column
 *
 * @method     array findByDepartamentoId(int $departamento_id) Return DepartamentoPesquisa objects filtered by the departamento_id column
 * @method     array findByPesquisaId(int $pesquisa_id) Return DepartamentoPesquisa objects filtered by the pesquisa_id column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseDepartamentoPesquisaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseDepartamentoPesquisaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'DepartamentoPesquisa', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new DepartamentoPesquisaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    DepartamentoPesquisaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof DepartamentoPesquisaQuery) {
			return $criteria;
		}
		$query = new DepartamentoPesquisaQuery();
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
	 * @param     array[$departamento_id, $pesquisa_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    DepartamentoPesquisa|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = DepartamentoPesquisaPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(DepartamentoPesquisaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    DepartamentoPesquisa A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `DEPARTAMENTO_ID`, `PESQUISA_ID` FROM `departamento_pesquisa` WHERE `DEPARTAMENTO_ID` = :p0 AND `PESQUISA_ID` = :p1';
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
			$obj = new DepartamentoPesquisa();
			$obj->hydrate($row);
			DepartamentoPesquisaPeer::addInstanceToPool($obj, serialize(array((string) $row[0], (string) $row[1])));
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
	 * @return    DepartamentoPesquisa|array|mixed the result, formatted by the current formatter
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
	 * @return    DepartamentoPesquisaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(DepartamentoPesquisaPeer::DEPARTAMENTO_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(DepartamentoPesquisaPeer::PESQUISA_ID, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    DepartamentoPesquisaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(DepartamentoPesquisaPeer::DEPARTAMENTO_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(DepartamentoPesquisaPeer::PESQUISA_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
	}

	/**
	 * Filter the query on the departamento_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDepartamentoId(1234); // WHERE departamento_id = 1234
	 * $query->filterByDepartamentoId(array(12, 34)); // WHERE departamento_id IN (12, 34)
	 * $query->filterByDepartamentoId(array('min' => 12)); // WHERE departamento_id > 12
	 * </code>
	 *
	 * @see       filterByDepartamento()
	 *
	 * @param     mixed $departamentoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DepartamentoPesquisaQuery The current query, for fluid interface
	 */
	public function filterByDepartamentoId($departamentoId = null, $comparison = null)
	{
		if (is_array($departamentoId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(DepartamentoPesquisaPeer::DEPARTAMENTO_ID, $departamentoId, $comparison);
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
	 * @return    DepartamentoPesquisaQuery The current query, for fluid interface
	 */
	public function filterByPesquisaId($pesquisaId = null, $comparison = null)
	{
		if (is_array($pesquisaId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(DepartamentoPesquisaPeer::PESQUISA_ID, $pesquisaId, $comparison);
	}

	/**
	 * Filter the query by a related Departamento object
	 *
	 * @param     Departamento|PropelCollection $departamento The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DepartamentoPesquisaQuery The current query, for fluid interface
	 */
	public function filterByDepartamento($departamento, $comparison = null)
	{
		if ($departamento instanceof Departamento) {
			return $this
				->addUsingAlias(DepartamentoPesquisaPeer::DEPARTAMENTO_ID, $departamento->getId(), $comparison);
		} elseif ($departamento instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(DepartamentoPesquisaPeer::DEPARTAMENTO_ID, $departamento->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByDepartamento() only accepts arguments of type Departamento or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Departamento relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DepartamentoPesquisaQuery The current query, for fluid interface
	 */
	public function joinDepartamento($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Departamento');

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
			$this->addJoinObject($join, 'Departamento');
		}

		return $this;
	}

	/**
	 * Use the Departamento relation Departamento object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DepartamentoQuery A secondary query class using the current class as primary query
	 */
	public function useDepartamentoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinDepartamento($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Departamento', 'DepartamentoQuery');
	}

	/**
	 * Filter the query by a related Pesquisa object
	 *
	 * @param     Pesquisa|PropelCollection $pesquisa The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    DepartamentoPesquisaQuery The current query, for fluid interface
	 */
	public function filterByPesquisa($pesquisa, $comparison = null)
	{
		if ($pesquisa instanceof Pesquisa) {
			return $this
				->addUsingAlias(DepartamentoPesquisaPeer::PESQUISA_ID, $pesquisa->getId(), $comparison);
		} elseif ($pesquisa instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(DepartamentoPesquisaPeer::PESQUISA_ID, $pesquisa->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    DepartamentoPesquisaQuery The current query, for fluid interface
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
	 * @param     DepartamentoPesquisa $departamentoPesquisa Object to remove from the list of results
	 *
	 * @return    DepartamentoPesquisaQuery The current query, for fluid interface
	 */
	public function prune($departamentoPesquisa = null)
	{
		if ($departamentoPesquisa) {
			$this->addCond('pruneCond0', $this->getAliasedColName(DepartamentoPesquisaPeer::DEPARTAMENTO_ID), $departamentoPesquisa->getDepartamentoId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(DepartamentoPesquisaPeer::PESQUISA_ID), $departamentoPesquisa->getPesquisaId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BaseDepartamentoPesquisaQuery