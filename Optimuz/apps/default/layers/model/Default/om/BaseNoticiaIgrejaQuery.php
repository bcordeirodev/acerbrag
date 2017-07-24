<?php


/**
 * Base class that represents a query for the 'noticia_igreja' table.
 *
 * 
 *
 * @method     NoticiaIgrejaQuery orderByNoticiaId($order = Criteria::ASC) Order by the noticia_id column
 * @method     NoticiaIgrejaQuery orderByIgrejaId($order = Criteria::ASC) Order by the igreja_id column
 *
 * @method     NoticiaIgrejaQuery groupByNoticiaId() Group by the noticia_id column
 * @method     NoticiaIgrejaQuery groupByIgrejaId() Group by the igreja_id column
 *
 * @method     NoticiaIgrejaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     NoticiaIgrejaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     NoticiaIgrejaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     NoticiaIgrejaQuery leftJoinIgreja($relationAlias = null) Adds a LEFT JOIN clause to the query using the Igreja relation
 * @method     NoticiaIgrejaQuery rightJoinIgreja($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Igreja relation
 * @method     NoticiaIgrejaQuery innerJoinIgreja($relationAlias = null) Adds a INNER JOIN clause to the query using the Igreja relation
 *
 * @method     NoticiaIgrejaQuery leftJoinNoticia($relationAlias = null) Adds a LEFT JOIN clause to the query using the Noticia relation
 * @method     NoticiaIgrejaQuery rightJoinNoticia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Noticia relation
 * @method     NoticiaIgrejaQuery innerJoinNoticia($relationAlias = null) Adds a INNER JOIN clause to the query using the Noticia relation
 *
 * @method     NoticiaIgreja findOne(PropelPDO $con = null) Return the first NoticiaIgreja matching the query
 * @method     NoticiaIgreja findOneOrCreate(PropelPDO $con = null) Return the first NoticiaIgreja matching the query, or a new NoticiaIgreja object populated from the query conditions when no match is found
 *
 * @method     NoticiaIgreja findOneByNoticiaId(int $noticia_id) Return the first NoticiaIgreja filtered by the noticia_id column
 * @method     NoticiaIgreja findOneByIgrejaId(int $igreja_id) Return the first NoticiaIgreja filtered by the igreja_id column
 *
 * @method     array findByNoticiaId(int $noticia_id) Return NoticiaIgreja objects filtered by the noticia_id column
 * @method     array findByIgrejaId(int $igreja_id) Return NoticiaIgreja objects filtered by the igreja_id column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseNoticiaIgrejaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseNoticiaIgrejaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'NoticiaIgreja', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new NoticiaIgrejaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    NoticiaIgrejaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof NoticiaIgrejaQuery) {
			return $criteria;
		}
		$query = new NoticiaIgrejaQuery();
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
	 * @param     array[$noticia_id, $igreja_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    NoticiaIgreja|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = NoticiaIgrejaPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(NoticiaIgrejaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    NoticiaIgreja A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `NOTICIA_ID`, `IGREJA_ID` FROM `noticia_igreja` WHERE `NOTICIA_ID` = :p0 AND `IGREJA_ID` = :p1';
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
			$obj = new NoticiaIgreja();
			$obj->hydrate($row);
			NoticiaIgrejaPeer::addInstanceToPool($obj, serialize(array((string) $row[0], (string) $row[1])));
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
	 * @return    NoticiaIgreja|array|mixed the result, formatted by the current formatter
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
	 * @return    NoticiaIgrejaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(NoticiaIgrejaPeer::NOTICIA_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(NoticiaIgrejaPeer::IGREJA_ID, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    NoticiaIgrejaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(NoticiaIgrejaPeer::NOTICIA_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(NoticiaIgrejaPeer::IGREJA_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
	}

	/**
	 * Filter the query on the noticia_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNoticiaId(1234); // WHERE noticia_id = 1234
	 * $query->filterByNoticiaId(array(12, 34)); // WHERE noticia_id IN (12, 34)
	 * $query->filterByNoticiaId(array('min' => 12)); // WHERE noticia_id > 12
	 * </code>
	 *
	 * @see       filterByNoticia()
	 *
	 * @param     mixed $noticiaId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NoticiaIgrejaQuery The current query, for fluid interface
	 */
	public function filterByNoticiaId($noticiaId = null, $comparison = null)
	{
		if (is_array($noticiaId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(NoticiaIgrejaPeer::NOTICIA_ID, $noticiaId, $comparison);
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
	 * @return    NoticiaIgrejaQuery The current query, for fluid interface
	 */
	public function filterByIgrejaId($igrejaId = null, $comparison = null)
	{
		if (is_array($igrejaId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(NoticiaIgrejaPeer::IGREJA_ID, $igrejaId, $comparison);
	}

	/**
	 * Filter the query by a related Igreja object
	 *
	 * @param     Igreja|PropelCollection $igreja The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NoticiaIgrejaQuery The current query, for fluid interface
	 */
	public function filterByIgreja($igreja, $comparison = null)
	{
		if ($igreja instanceof Igreja) {
			return $this
				->addUsingAlias(NoticiaIgrejaPeer::IGREJA_ID, $igreja->getId(), $comparison);
		} elseif ($igreja instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(NoticiaIgrejaPeer::IGREJA_ID, $igreja->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    NoticiaIgrejaQuery The current query, for fluid interface
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
	 * Filter the query by a related Noticia object
	 *
	 * @param     Noticia|PropelCollection $noticia The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NoticiaIgrejaQuery The current query, for fluid interface
	 */
	public function filterByNoticia($noticia, $comparison = null)
	{
		if ($noticia instanceof Noticia) {
			return $this
				->addUsingAlias(NoticiaIgrejaPeer::NOTICIA_ID, $noticia->getId(), $comparison);
		} elseif ($noticia instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(NoticiaIgrejaPeer::NOTICIA_ID, $noticia->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByNoticia() only accepts arguments of type Noticia or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Noticia relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NoticiaIgrejaQuery The current query, for fluid interface
	 */
	public function joinNoticia($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Noticia');

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
			$this->addJoinObject($join, 'Noticia');
		}

		return $this;
	}

	/**
	 * Use the Noticia relation Noticia object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NoticiaQuery A secondary query class using the current class as primary query
	 */
	public function useNoticiaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinNoticia($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Noticia', 'NoticiaQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     NoticiaIgreja $noticiaIgreja Object to remove from the list of results
	 *
	 * @return    NoticiaIgrejaQuery The current query, for fluid interface
	 */
	public function prune($noticiaIgreja = null)
	{
		if ($noticiaIgreja) {
			$this->addCond('pruneCond0', $this->getAliasedColName(NoticiaIgrejaPeer::NOTICIA_ID), $noticiaIgreja->getNoticiaId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(NoticiaIgrejaPeer::IGREJA_ID), $noticiaIgreja->getIgrejaId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BaseNoticiaIgrejaQuery