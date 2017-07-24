<?php


/**
 * Base class that represents a query for the 'podcast_igreja' table.
 *
 * 
 *
 * @method     PodcastIgrejaQuery orderByIgrejaId($order = Criteria::ASC) Order by the igreja_id column
 * @method     PodcastIgrejaQuery orderByPodcastId($order = Criteria::ASC) Order by the podcast_id column
 *
 * @method     PodcastIgrejaQuery groupByIgrejaId() Group by the igreja_id column
 * @method     PodcastIgrejaQuery groupByPodcastId() Group by the podcast_id column
 *
 * @method     PodcastIgrejaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PodcastIgrejaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PodcastIgrejaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PodcastIgrejaQuery leftJoinIgreja($relationAlias = null) Adds a LEFT JOIN clause to the query using the Igreja relation
 * @method     PodcastIgrejaQuery rightJoinIgreja($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Igreja relation
 * @method     PodcastIgrejaQuery innerJoinIgreja($relationAlias = null) Adds a INNER JOIN clause to the query using the Igreja relation
 *
 * @method     PodcastIgrejaQuery leftJoinPodcast($relationAlias = null) Adds a LEFT JOIN clause to the query using the Podcast relation
 * @method     PodcastIgrejaQuery rightJoinPodcast($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Podcast relation
 * @method     PodcastIgrejaQuery innerJoinPodcast($relationAlias = null) Adds a INNER JOIN clause to the query using the Podcast relation
 *
 * @method     PodcastIgreja findOne(PropelPDO $con = null) Return the first PodcastIgreja matching the query
 * @method     PodcastIgreja findOneOrCreate(PropelPDO $con = null) Return the first PodcastIgreja matching the query, or a new PodcastIgreja object populated from the query conditions when no match is found
 *
 * @method     PodcastIgreja findOneByIgrejaId(int $igreja_id) Return the first PodcastIgreja filtered by the igreja_id column
 * @method     PodcastIgreja findOneByPodcastId(int $podcast_id) Return the first PodcastIgreja filtered by the podcast_id column
 *
 * @method     array findByIgrejaId(int $igreja_id) Return PodcastIgreja objects filtered by the igreja_id column
 * @method     array findByPodcastId(int $podcast_id) Return PodcastIgreja objects filtered by the podcast_id column
 *
 * @package    propel.generator.Default.om
 */
abstract class BasePodcastIgrejaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BasePodcastIgrejaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'PodcastIgreja', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PodcastIgrejaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PodcastIgrejaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PodcastIgrejaQuery) {
			return $criteria;
		}
		$query = new PodcastIgrejaQuery();
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
	 * @param     array[$igreja_id, $podcast_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PodcastIgreja|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = PodcastIgrejaPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(PodcastIgrejaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    PodcastIgreja A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `IGREJA_ID`, `PODCAST_ID` FROM `podcast_igreja` WHERE `IGREJA_ID` = :p0 AND `PODCAST_ID` = :p1';
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
			$obj = new PodcastIgreja();
			$obj->hydrate($row);
			PodcastIgrejaPeer::addInstanceToPool($obj, serialize(array((string) $row[0], (string) $row[1])));
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
	 * @return    PodcastIgreja|array|mixed the result, formatted by the current formatter
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
	 * @return    PodcastIgrejaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(PodcastIgrejaPeer::IGREJA_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(PodcastIgrejaPeer::PODCAST_ID, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PodcastIgrejaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(PodcastIgrejaPeer::IGREJA_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(PodcastIgrejaPeer::PODCAST_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
	}

	/**
	 * Filter the query on the igreja_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIgrejaId(1234); // WHERE igreja_id = 1234
	 * $query->filterByIgrejaId(array(12, 34)); // WHERE igreja_id IN (12, 34)
	 * $query->filterByIgrejaId(array('min' => 12)); // WHERE igreja_id > 12
	 * </code>
	 *
	 * @see       filterByIgreja()
	 *
	 * @param     mixed $igrejaId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PodcastIgrejaQuery The current query, for fluid interface
	 */
	public function filterByIgrejaId($igrejaId = null, $comparison = null)
	{
		if (is_array($igrejaId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PodcastIgrejaPeer::IGREJA_ID, $igrejaId, $comparison);
	}

	/**
	 * Filter the query on the podcast_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPodcastId(1234); // WHERE podcast_id = 1234
	 * $query->filterByPodcastId(array(12, 34)); // WHERE podcast_id IN (12, 34)
	 * $query->filterByPodcastId(array('min' => 12)); // WHERE podcast_id > 12
	 * </code>
	 *
	 * @see       filterByPodcast()
	 *
	 * @param     mixed $podcastId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PodcastIgrejaQuery The current query, for fluid interface
	 */
	public function filterByPodcastId($podcastId = null, $comparison = null)
	{
		if (is_array($podcastId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PodcastIgrejaPeer::PODCAST_ID, $podcastId, $comparison);
	}

	/**
	 * Filter the query by a related Igreja object
	 *
	 * @param     Igreja|PropelCollection $igreja The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PodcastIgrejaQuery The current query, for fluid interface
	 */
	public function filterByIgreja($igreja, $comparison = null)
	{
		if ($igreja instanceof Igreja) {
			return $this
				->addUsingAlias(PodcastIgrejaPeer::IGREJA_ID, $igreja->getId(), $comparison);
		} elseif ($igreja instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PodcastIgrejaPeer::IGREJA_ID, $igreja->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByIgreja() only accepts arguments of type Igreja or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Igreja relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PodcastIgrejaQuery The current query, for fluid interface
	 */
	public function joinIgreja($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Igreja');

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
			$this->addJoinObject($join, 'Igreja');
		}

		return $this;
	}

	/**
	 * Use the Igreja relation Igreja object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery A secondary query class using the current class as primary query
	 */
	public function useIgrejaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinIgreja($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Igreja', 'IgrejaQuery');
	}

	/**
	 * Filter the query by a related Podcast object
	 *
	 * @param     Podcast|PropelCollection $podcast The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PodcastIgrejaQuery The current query, for fluid interface
	 */
	public function filterByPodcast($podcast, $comparison = null)
	{
		if ($podcast instanceof Podcast) {
			return $this
				->addUsingAlias(PodcastIgrejaPeer::PODCAST_ID, $podcast->getId(), $comparison);
		} elseif ($podcast instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PodcastIgrejaPeer::PODCAST_ID, $podcast->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByPodcast() only accepts arguments of type Podcast or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Podcast relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PodcastIgrejaQuery The current query, for fluid interface
	 */
	public function joinPodcast($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Podcast');

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
			$this->addJoinObject($join, 'Podcast');
		}

		return $this;
	}

	/**
	 * Use the Podcast relation Podcast object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PodcastQuery A secondary query class using the current class as primary query
	 */
	public function usePodcastQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPodcast($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Podcast', 'PodcastQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     PodcastIgreja $podcastIgreja Object to remove from the list of results
	 *
	 * @return    PodcastIgrejaQuery The current query, for fluid interface
	 */
	public function prune($podcastIgreja = null)
	{
		if ($podcastIgreja) {
			$this->addCond('pruneCond0', $this->getAliasedColName(PodcastIgrejaPeer::IGREJA_ID), $podcastIgreja->getIgrejaId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(PodcastIgrejaPeer::PODCAST_ID), $podcastIgreja->getPodcastId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BasePodcastIgrejaQuery