<?php


/**
 * Base class that represents a query for the 'meta_publico_alvo' table.
 *
 * 
 *
 * @method     MetaPublicoAlvoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MetaPublicoAlvoQuery orderByPublicoAlvoId($order = Criteria::ASC) Order by the publico_alvo_id column
 * @method     MetaPublicoAlvoQuery orderByHomens($order = Criteria::ASC) Order by the homens column
 * @method     MetaPublicoAlvoQuery orderByMulheres($order = Criteria::ASC) Order by the mulheres column
 *
 * @method     MetaPublicoAlvoQuery groupById() Group by the id column
 * @method     MetaPublicoAlvoQuery groupByPublicoAlvoId() Group by the publico_alvo_id column
 * @method     MetaPublicoAlvoQuery groupByHomens() Group by the homens column
 * @method     MetaPublicoAlvoQuery groupByMulheres() Group by the mulheres column
 *
 * @method     MetaPublicoAlvoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MetaPublicoAlvoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MetaPublicoAlvoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MetaPublicoAlvoQuery leftJoinPublicoAlvo($relationAlias = null) Adds a LEFT JOIN clause to the query using the PublicoAlvo relation
 * @method     MetaPublicoAlvoQuery rightJoinPublicoAlvo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PublicoAlvo relation
 * @method     MetaPublicoAlvoQuery innerJoinPublicoAlvo($relationAlias = null) Adds a INNER JOIN clause to the query using the PublicoAlvo relation
 *
 * @method     MetaPublicoAlvo findOne(PropelPDO $con = null) Return the first MetaPublicoAlvo matching the query
 * @method     MetaPublicoAlvo findOneOrCreate(PropelPDO $con = null) Return the first MetaPublicoAlvo matching the query, or a new MetaPublicoAlvo object populated from the query conditions when no match is found
 *
 * @method     MetaPublicoAlvo findOneById(int $id) Return the first MetaPublicoAlvo filtered by the id column
 * @method     MetaPublicoAlvo findOneByPublicoAlvoId(int $publico_alvo_id) Return the first MetaPublicoAlvo filtered by the publico_alvo_id column
 * @method     MetaPublicoAlvo findOneByHomens(int $homens) Return the first MetaPublicoAlvo filtered by the homens column
 * @method     MetaPublicoAlvo findOneByMulheres(int $mulheres) Return the first MetaPublicoAlvo filtered by the mulheres column
 *
 * @method     array findById(int $id) Return MetaPublicoAlvo objects filtered by the id column
 * @method     array findByPublicoAlvoId(int $publico_alvo_id) Return MetaPublicoAlvo objects filtered by the publico_alvo_id column
 * @method     array findByHomens(int $homens) Return MetaPublicoAlvo objects filtered by the homens column
 * @method     array findByMulheres(int $mulheres) Return MetaPublicoAlvo objects filtered by the mulheres column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseMetaPublicoAlvoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseMetaPublicoAlvoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'MetaPublicoAlvo', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MetaPublicoAlvoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MetaPublicoAlvoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MetaPublicoAlvoQuery) {
			return $criteria;
		}
		$query = new MetaPublicoAlvoQuery();
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
	 * @return    MetaPublicoAlvo|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = MetaPublicoAlvoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(MetaPublicoAlvoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    MetaPublicoAlvo A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `PUBLICO_ALVO_ID`, `HOMENS`, `MULHERES` FROM `meta_publico_alvo` WHERE `ID` = :p0';
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
			$obj = new MetaPublicoAlvo();
			$obj->hydrate($row);
			MetaPublicoAlvoPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    MetaPublicoAlvo|array|mixed the result, formatted by the current formatter
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
	 * @return    MetaPublicoAlvoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MetaPublicoAlvoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MetaPublicoAlvoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MetaPublicoAlvoPeer::ID, $keys, Criteria::IN);
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
	 * @return    MetaPublicoAlvoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MetaPublicoAlvoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the publico_alvo_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPublicoAlvoId(1234); // WHERE publico_alvo_id = 1234
	 * $query->filterByPublicoAlvoId(array(12, 34)); // WHERE publico_alvo_id IN (12, 34)
	 * $query->filterByPublicoAlvoId(array('min' => 12)); // WHERE publico_alvo_id > 12
	 * </code>
	 *
	 * @see       filterByPublicoAlvo()
	 *
	 * @param     mixed $publicoAlvoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MetaPublicoAlvoQuery The current query, for fluid interface
	 */
	public function filterByPublicoAlvoId($publicoAlvoId = null, $comparison = null)
	{
		if (is_array($publicoAlvoId)) {
			$useMinMax = false;
			if (isset($publicoAlvoId['min'])) {
				$this->addUsingAlias(MetaPublicoAlvoPeer::PUBLICO_ALVO_ID, $publicoAlvoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($publicoAlvoId['max'])) {
				$this->addUsingAlias(MetaPublicoAlvoPeer::PUBLICO_ALVO_ID, $publicoAlvoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MetaPublicoAlvoPeer::PUBLICO_ALVO_ID, $publicoAlvoId, $comparison);
	}

	/**
	 * Filter the query on the homens column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByHomens(1234); // WHERE homens = 1234
	 * $query->filterByHomens(array(12, 34)); // WHERE homens IN (12, 34)
	 * $query->filterByHomens(array('min' => 12)); // WHERE homens > 12
	 * </code>
	 *
	 * @param     mixed $homens The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MetaPublicoAlvoQuery The current query, for fluid interface
	 */
	public function filterByHomens($homens = null, $comparison = null)
	{
		if (is_array($homens)) {
			$useMinMax = false;
			if (isset($homens['min'])) {
				$this->addUsingAlias(MetaPublicoAlvoPeer::HOMENS, $homens['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($homens['max'])) {
				$this->addUsingAlias(MetaPublicoAlvoPeer::HOMENS, $homens['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MetaPublicoAlvoPeer::HOMENS, $homens, $comparison);
	}

	/**
	 * Filter the query on the mulheres column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMulheres(1234); // WHERE mulheres = 1234
	 * $query->filterByMulheres(array(12, 34)); // WHERE mulheres IN (12, 34)
	 * $query->filterByMulheres(array('min' => 12)); // WHERE mulheres > 12
	 * </code>
	 *
	 * @param     mixed $mulheres The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MetaPublicoAlvoQuery The current query, for fluid interface
	 */
	public function filterByMulheres($mulheres = null, $comparison = null)
	{
		if (is_array($mulheres)) {
			$useMinMax = false;
			if (isset($mulheres['min'])) {
				$this->addUsingAlias(MetaPublicoAlvoPeer::MULHERES, $mulheres['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($mulheres['max'])) {
				$this->addUsingAlias(MetaPublicoAlvoPeer::MULHERES, $mulheres['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MetaPublicoAlvoPeer::MULHERES, $mulheres, $comparison);
	}

	/**
	 * Filter the query by a related PublicoAlvo object
	 *
	 * @param     PublicoAlvo|PropelCollection $publicoAlvo The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MetaPublicoAlvoQuery The current query, for fluid interface
	 */
	public function filterByPublicoAlvo($publicoAlvo, $comparison = null)
	{
		if ($publicoAlvo instanceof PublicoAlvo) {
			return $this
				->addUsingAlias(MetaPublicoAlvoPeer::PUBLICO_ALVO_ID, $publicoAlvo->getId(), $comparison);
		} elseif ($publicoAlvo instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(MetaPublicoAlvoPeer::PUBLICO_ALVO_ID, $publicoAlvo->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByPublicoAlvo() only accepts arguments of type PublicoAlvo or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the PublicoAlvo relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MetaPublicoAlvoQuery The current query, for fluid interface
	 */
	public function joinPublicoAlvo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PublicoAlvo');

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
			$this->addJoinObject($join, 'PublicoAlvo');
		}

		return $this;
	}

	/**
	 * Use the PublicoAlvo relation PublicoAlvo object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PublicoAlvoQuery A secondary query class using the current class as primary query
	 */
	public function usePublicoAlvoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPublicoAlvo($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PublicoAlvo', 'PublicoAlvoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     MetaPublicoAlvo $metaPublicoAlvo Object to remove from the list of results
	 *
	 * @return    MetaPublicoAlvoQuery The current query, for fluid interface
	 */
	public function prune($metaPublicoAlvo = null)
	{
		if ($metaPublicoAlvo) {
			$this->addUsingAlias(MetaPublicoAlvoPeer::ID, $metaPublicoAlvo->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseMetaPublicoAlvoQuery