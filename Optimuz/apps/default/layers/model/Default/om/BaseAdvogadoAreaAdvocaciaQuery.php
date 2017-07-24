<?php


/**
 * Base class that represents a query for the 'advogado_area_advocacia' table.
 *
 * 
 *
 * @method     AdvogadoAreaAdvocaciaQuery orderByAdvogadoId($order = Criteria::ASC) Order by the advogado_id column
 * @method     AdvogadoAreaAdvocaciaQuery orderByAreaAdvocaciaId($order = Criteria::ASC) Order by the area_advocacia_id column
 *
 * @method     AdvogadoAreaAdvocaciaQuery groupByAdvogadoId() Group by the advogado_id column
 * @method     AdvogadoAreaAdvocaciaQuery groupByAreaAdvocaciaId() Group by the area_advocacia_id column
 *
 * @method     AdvogadoAreaAdvocaciaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AdvogadoAreaAdvocaciaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AdvogadoAreaAdvocaciaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AdvogadoAreaAdvocaciaQuery leftJoinAdvogado($relationAlias = null) Adds a LEFT JOIN clause to the query using the Advogado relation
 * @method     AdvogadoAreaAdvocaciaQuery rightJoinAdvogado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Advogado relation
 * @method     AdvogadoAreaAdvocaciaQuery innerJoinAdvogado($relationAlias = null) Adds a INNER JOIN clause to the query using the Advogado relation
 *
 * @method     AdvogadoAreaAdvocaciaQuery leftJoinAreaAdvocacia($relationAlias = null) Adds a LEFT JOIN clause to the query using the AreaAdvocacia relation
 * @method     AdvogadoAreaAdvocaciaQuery rightJoinAreaAdvocacia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AreaAdvocacia relation
 * @method     AdvogadoAreaAdvocaciaQuery innerJoinAreaAdvocacia($relationAlias = null) Adds a INNER JOIN clause to the query using the AreaAdvocacia relation
 *
 * @method     AdvogadoAreaAdvocacia findOne(PropelPDO $con = null) Return the first AdvogadoAreaAdvocacia matching the query
 * @method     AdvogadoAreaAdvocacia findOneOrCreate(PropelPDO $con = null) Return the first AdvogadoAreaAdvocacia matching the query, or a new AdvogadoAreaAdvocacia object populated from the query conditions when no match is found
 *
 * @method     AdvogadoAreaAdvocacia findOneByAdvogadoId(int $advogado_id) Return the first AdvogadoAreaAdvocacia filtered by the advogado_id column
 * @method     AdvogadoAreaAdvocacia findOneByAreaAdvocaciaId(int $area_advocacia_id) Return the first AdvogadoAreaAdvocacia filtered by the area_advocacia_id column
 *
 * @method     array findByAdvogadoId(int $advogado_id) Return AdvogadoAreaAdvocacia objects filtered by the advogado_id column
 * @method     array findByAreaAdvocaciaId(int $area_advocacia_id) Return AdvogadoAreaAdvocacia objects filtered by the area_advocacia_id column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseAdvogadoAreaAdvocaciaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseAdvogadoAreaAdvocaciaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'AdvogadoAreaAdvocacia', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AdvogadoAreaAdvocaciaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AdvogadoAreaAdvocaciaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AdvogadoAreaAdvocaciaQuery) {
			return $criteria;
		}
		$query = new AdvogadoAreaAdvocaciaQuery();
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
	 * @param     array[$advogado_id, $area_advocacia_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    AdvogadoAreaAdvocacia|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = AdvogadoAreaAdvocaciaPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(AdvogadoAreaAdvocaciaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    AdvogadoAreaAdvocacia A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ADVOGADO_ID`, `AREA_ADVOCACIA_ID` FROM `advogado_area_advocacia` WHERE `ADVOGADO_ID` = :p0 AND `AREA_ADVOCACIA_ID` = :p1';
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
			$obj = new AdvogadoAreaAdvocacia();
			$obj->hydrate($row);
			AdvogadoAreaAdvocaciaPeer::addInstanceToPool($obj, serialize(array((string) $row[0], (string) $row[1])));
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
	 * @return    AdvogadoAreaAdvocacia|array|mixed the result, formatted by the current formatter
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
	 * @return    AdvogadoAreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(AdvogadoAreaAdvocaciaPeer::ADVOGADO_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(AdvogadoAreaAdvocaciaPeer::AREA_ADVOCACIA_ID, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AdvogadoAreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(AdvogadoAreaAdvocaciaPeer::ADVOGADO_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(AdvogadoAreaAdvocaciaPeer::AREA_ADVOCACIA_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
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
	 * @return    AdvogadoAreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function filterByAdvogadoId($advogadoId = null, $comparison = null)
	{
		if (is_array($advogadoId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AdvogadoAreaAdvocaciaPeer::ADVOGADO_ID, $advogadoId, $comparison);
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
	 * @return    AdvogadoAreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function filterByAreaAdvocaciaId($areaAdvocaciaId = null, $comparison = null)
	{
		if (is_array($areaAdvocaciaId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AdvogadoAreaAdvocaciaPeer::AREA_ADVOCACIA_ID, $areaAdvocaciaId, $comparison);
	}

	/**
	 * Filter the query by a related Advogado object
	 *
	 * @param     Advogado|PropelCollection $advogado The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoAreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function filterByAdvogado($advogado, $comparison = null)
	{
		if ($advogado instanceof Advogado) {
			return $this
				->addUsingAlias(AdvogadoAreaAdvocaciaPeer::ADVOGADO_ID, $advogado->getId(), $comparison);
		} elseif ($advogado instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AdvogadoAreaAdvocaciaPeer::ADVOGADO_ID, $advogado->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    AdvogadoAreaAdvocaciaQuery The current query, for fluid interface
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
	 * @return    AdvogadoAreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function filterByAreaAdvocacia($areaAdvocacia, $comparison = null)
	{
		if ($areaAdvocacia instanceof AreaAdvocacia) {
			return $this
				->addUsingAlias(AdvogadoAreaAdvocaciaPeer::AREA_ADVOCACIA_ID, $areaAdvocacia->getId(), $comparison);
		} elseif ($areaAdvocacia instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AdvogadoAreaAdvocaciaPeer::AREA_ADVOCACIA_ID, $areaAdvocacia->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    AdvogadoAreaAdvocaciaQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     AdvogadoAreaAdvocacia $advogadoAreaAdvocacia Object to remove from the list of results
	 *
	 * @return    AdvogadoAreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function prune($advogadoAreaAdvocacia = null)
	{
		if ($advogadoAreaAdvocacia) {
			$this->addCond('pruneCond0', $this->getAliasedColName(AdvogadoAreaAdvocaciaPeer::ADVOGADO_ID), $advogadoAreaAdvocacia->getAdvogadoId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(AdvogadoAreaAdvocaciaPeer::AREA_ADVOCACIA_ID), $advogadoAreaAdvocacia->getAreaAdvocaciaId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BaseAdvogadoAreaAdvocaciaQuery