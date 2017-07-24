<?php


/**
 * Base class that represents a query for the 'tag_area_advocacia' table.
 *
 * 
 *
 * @method     TagAreaAdvocaciaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     TagAreaAdvocaciaQuery orderByAreaAdvocaciaId($order = Criteria::ASC) Order by the area_advocacia_id column
 * @method     TagAreaAdvocaciaQuery orderByTag($order = Criteria::ASC) Order by the tag column
 *
 * @method     TagAreaAdvocaciaQuery groupById() Group by the id column
 * @method     TagAreaAdvocaciaQuery groupByAreaAdvocaciaId() Group by the area_advocacia_id column
 * @method     TagAreaAdvocaciaQuery groupByTag() Group by the tag column
 *
 * @method     TagAreaAdvocaciaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TagAreaAdvocaciaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TagAreaAdvocaciaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TagAreaAdvocaciaQuery leftJoinAreaAdvocacia($relationAlias = null) Adds a LEFT JOIN clause to the query using the AreaAdvocacia relation
 * @method     TagAreaAdvocaciaQuery rightJoinAreaAdvocacia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AreaAdvocacia relation
 * @method     TagAreaAdvocaciaQuery innerJoinAreaAdvocacia($relationAlias = null) Adds a INNER JOIN clause to the query using the AreaAdvocacia relation
 *
 * @method     TagAreaAdvocacia findOne(PropelPDO $con = null) Return the first TagAreaAdvocacia matching the query
 * @method     TagAreaAdvocacia findOneOrCreate(PropelPDO $con = null) Return the first TagAreaAdvocacia matching the query, or a new TagAreaAdvocacia object populated from the query conditions when no match is found
 *
 * @method     TagAreaAdvocacia findOneById(int $id) Return the first TagAreaAdvocacia filtered by the id column
 * @method     TagAreaAdvocacia findOneByAreaAdvocaciaId(int $area_advocacia_id) Return the first TagAreaAdvocacia filtered by the area_advocacia_id column
 * @method     TagAreaAdvocacia findOneByTag(string $tag) Return the first TagAreaAdvocacia filtered by the tag column
 *
 * @method     array findById(int $id) Return TagAreaAdvocacia objects filtered by the id column
 * @method     array findByAreaAdvocaciaId(int $area_advocacia_id) Return TagAreaAdvocacia objects filtered by the area_advocacia_id column
 * @method     array findByTag(string $tag) Return TagAreaAdvocacia objects filtered by the tag column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseTagAreaAdvocaciaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseTagAreaAdvocaciaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'TagAreaAdvocacia', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TagAreaAdvocaciaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TagAreaAdvocaciaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TagAreaAdvocaciaQuery) {
			return $criteria;
		}
		$query = new TagAreaAdvocaciaQuery();
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
	 * @return    TagAreaAdvocacia|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = TagAreaAdvocaciaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(TagAreaAdvocaciaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    TagAreaAdvocacia A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `AREA_ADVOCACIA_ID`, `TAG` FROM `tag_area_advocacia` WHERE `ID` = :p0';
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
			$obj = new TagAreaAdvocacia();
			$obj->hydrate($row);
			TagAreaAdvocaciaPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    TagAreaAdvocacia|array|mixed the result, formatted by the current formatter
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
	 * @return    TagAreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TagAreaAdvocaciaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TagAreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TagAreaAdvocaciaPeer::ID, $keys, Criteria::IN);
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
	 * @return    TagAreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TagAreaAdvocaciaPeer::ID, $id, $comparison);
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
	 * @return    TagAreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function filterByAreaAdvocaciaId($areaAdvocaciaId = null, $comparison = null)
	{
		if (is_array($areaAdvocaciaId)) {
			$useMinMax = false;
			if (isset($areaAdvocaciaId['min'])) {
				$this->addUsingAlias(TagAreaAdvocaciaPeer::AREA_ADVOCACIA_ID, $areaAdvocaciaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($areaAdvocaciaId['max'])) {
				$this->addUsingAlias(TagAreaAdvocaciaPeer::AREA_ADVOCACIA_ID, $areaAdvocaciaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TagAreaAdvocaciaPeer::AREA_ADVOCACIA_ID, $areaAdvocaciaId, $comparison);
	}

	/**
	 * Filter the query on the tag column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTag('fooValue');   // WHERE tag = 'fooValue'
	 * $query->filterByTag('%fooValue%'); // WHERE tag LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $tag The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TagAreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function filterByTag($tag = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($tag)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $tag)) {
				$tag = str_replace('*', '%', $tag);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TagAreaAdvocaciaPeer::TAG, $tag, $comparison);
	}

	/**
	 * Filter the query by a related AreaAdvocacia object
	 *
	 * @param     AreaAdvocacia|PropelCollection $areaAdvocacia The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TagAreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function filterByAreaAdvocacia($areaAdvocacia, $comparison = null)
	{
		if ($areaAdvocacia instanceof AreaAdvocacia) {
			return $this
				->addUsingAlias(TagAreaAdvocaciaPeer::AREA_ADVOCACIA_ID, $areaAdvocacia->getId(), $comparison);
		} elseif ($areaAdvocacia instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(TagAreaAdvocaciaPeer::AREA_ADVOCACIA_ID, $areaAdvocacia->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    TagAreaAdvocaciaQuery The current query, for fluid interface
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
	 * @param     TagAreaAdvocacia $tagAreaAdvocacia Object to remove from the list of results
	 *
	 * @return    TagAreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function prune($tagAreaAdvocacia = null)
	{
		if ($tagAreaAdvocacia) {
			$this->addUsingAlias(TagAreaAdvocaciaPeer::ID, $tagAreaAdvocacia->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseTagAreaAdvocaciaQuery