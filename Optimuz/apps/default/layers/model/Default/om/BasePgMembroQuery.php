<?php


/**
 * Base class that represents a query for the 'pg_membro' table.
 *
 * 
 *
 * @method     PgMembroQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PgMembroQuery orderByPgId($order = Criteria::ASC) Order by the pg_id column
 * @method     PgMembroQuery orderByMembroId($order = Criteria::ASC) Order by the membro_id column
 * @method     PgMembroQuery orderByCargo($order = Criteria::ASC) Order by the cargo column
 *
 * @method     PgMembroQuery groupById() Group by the id column
 * @method     PgMembroQuery groupByPgId() Group by the pg_id column
 * @method     PgMembroQuery groupByMembroId() Group by the membro_id column
 * @method     PgMembroQuery groupByCargo() Group by the cargo column
 *
 * @method     PgMembroQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PgMembroQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PgMembroQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PgMembroQuery leftJoinMembro($relationAlias = null) Adds a LEFT JOIN clause to the query using the Membro relation
 * @method     PgMembroQuery rightJoinMembro($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Membro relation
 * @method     PgMembroQuery innerJoinMembro($relationAlias = null) Adds a INNER JOIN clause to the query using the Membro relation
 *
 * @method     PgMembroQuery leftJoinPg($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pg relation
 * @method     PgMembroQuery rightJoinPg($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pg relation
 * @method     PgMembroQuery innerJoinPg($relationAlias = null) Adds a INNER JOIN clause to the query using the Pg relation
 *
 * @method     PgMembro findOne(PropelPDO $con = null) Return the first PgMembro matching the query
 * @method     PgMembro findOneOrCreate(PropelPDO $con = null) Return the first PgMembro matching the query, or a new PgMembro object populated from the query conditions when no match is found
 *
 * @method     PgMembro findOneById(int $id) Return the first PgMembro filtered by the id column
 * @method     PgMembro findOneByPgId(int $pg_id) Return the first PgMembro filtered by the pg_id column
 * @method     PgMembro findOneByMembroId(int $membro_id) Return the first PgMembro filtered by the membro_id column
 * @method     PgMembro findOneByCargo(string $cargo) Return the first PgMembro filtered by the cargo column
 *
 * @method     array findById(int $id) Return PgMembro objects filtered by the id column
 * @method     array findByPgId(int $pg_id) Return PgMembro objects filtered by the pg_id column
 * @method     array findByMembroId(int $membro_id) Return PgMembro objects filtered by the membro_id column
 * @method     array findByCargo(string $cargo) Return PgMembro objects filtered by the cargo column
 *
 * @package    propel.generator.Default.om
 */
abstract class BasePgMembroQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BasePgMembroQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'PgMembro', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PgMembroQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PgMembroQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PgMembroQuery) {
			return $criteria;
		}
		$query = new PgMembroQuery();
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
	 * @return    PgMembro|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = PgMembroPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(PgMembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    PgMembro A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `PG_ID`, `MEMBRO_ID`, `CARGO` FROM `pg_membro` WHERE `ID` = :p0';
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
			$obj = new PgMembro();
			$obj->hydrate($row);
			PgMembroPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    PgMembro|array|mixed the result, formatted by the current formatter
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
	 * @return    PgMembroQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PgMembroPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PgMembroQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PgMembroPeer::ID, $keys, Criteria::IN);
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
	 * @return    PgMembroQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PgMembroPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the pg_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPgId(1234); // WHERE pg_id = 1234
	 * $query->filterByPgId(array(12, 34)); // WHERE pg_id IN (12, 34)
	 * $query->filterByPgId(array('min' => 12)); // WHERE pg_id > 12
	 * </code>
	 *
	 * @see       filterByPg()
	 *
	 * @param     mixed $pgId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PgMembroQuery The current query, for fluid interface
	 */
	public function filterByPgId($pgId = null, $comparison = null)
	{
		if (is_array($pgId)) {
			$useMinMax = false;
			if (isset($pgId['min'])) {
				$this->addUsingAlias(PgMembroPeer::PG_ID, $pgId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($pgId['max'])) {
				$this->addUsingAlias(PgMembroPeer::PG_ID, $pgId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PgMembroPeer::PG_ID, $pgId, $comparison);
	}

	/**
	 * Filter the query on the membro_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMembroId(1234); // WHERE membro_id = 1234
	 * $query->filterByMembroId(array(12, 34)); // WHERE membro_id IN (12, 34)
	 * $query->filterByMembroId(array('min' => 12)); // WHERE membro_id > 12
	 * </code>
	 *
	 * @see       filterByMembro()
	 *
	 * @param     mixed $membroId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PgMembroQuery The current query, for fluid interface
	 */
	public function filterByMembroId($membroId = null, $comparison = null)
	{
		if (is_array($membroId)) {
			$useMinMax = false;
			if (isset($membroId['min'])) {
				$this->addUsingAlias(PgMembroPeer::MEMBRO_ID, $membroId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($membroId['max'])) {
				$this->addUsingAlias(PgMembroPeer::MEMBRO_ID, $membroId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PgMembroPeer::MEMBRO_ID, $membroId, $comparison);
	}

	/**
	 * Filter the query on the cargo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCargo('fooValue');   // WHERE cargo = 'fooValue'
	 * $query->filterByCargo('%fooValue%'); // WHERE cargo LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $cargo The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PgMembroQuery The current query, for fluid interface
	 */
	public function filterByCargo($cargo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($cargo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $cargo)) {
				$cargo = str_replace('*', '%', $cargo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PgMembroPeer::CARGO, $cargo, $comparison);
	}

	/**
	 * Filter the query by a related Membro object
	 *
	 * @param     Membro|PropelCollection $membro The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PgMembroQuery The current query, for fluid interface
	 */
	public function filterByMembro($membro, $comparison = null)
	{
		if ($membro instanceof Membro) {
			return $this
				->addUsingAlias(PgMembroPeer::MEMBRO_ID, $membro->getId(), $comparison);
		} elseif ($membro instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PgMembroPeer::MEMBRO_ID, $membro->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByMembro() only accepts arguments of type Membro or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Membro relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PgMembroQuery The current query, for fluid interface
	 */
	public function joinMembro($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Membro');

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
			$this->addJoinObject($join, 'Membro');
		}

		return $this;
	}

	/**
	 * Use the Membro relation Membro object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MembroQuery A secondary query class using the current class as primary query
	 */
	public function useMembroQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinMembro($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Membro', 'MembroQuery');
	}

	/**
	 * Filter the query by a related Pg object
	 *
	 * @param     Pg|PropelCollection $pg The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PgMembroQuery The current query, for fluid interface
	 */
	public function filterByPg($pg, $comparison = null)
	{
		if ($pg instanceof Pg) {
			return $this
				->addUsingAlias(PgMembroPeer::PG_ID, $pg->getId(), $comparison);
		} elseif ($pg instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PgMembroPeer::PG_ID, $pg->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByPg() only accepts arguments of type Pg or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Pg relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PgMembroQuery The current query, for fluid interface
	 */
	public function joinPg($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Pg');

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
			$this->addJoinObject($join, 'Pg');
		}

		return $this;
	}

	/**
	 * Use the Pg relation Pg object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PgQuery A secondary query class using the current class as primary query
	 */
	public function usePgQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPg($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Pg', 'PgQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     PgMembro $pgMembro Object to remove from the list of results
	 *
	 * @return    PgMembroQuery The current query, for fluid interface
	 */
	public function prune($pgMembro = null)
	{
		if ($pgMembro) {
			$this->addUsingAlias(PgMembroPeer::ID, $pgMembro->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BasePgMembroQuery