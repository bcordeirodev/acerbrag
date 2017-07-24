<?php


/**
 * Base class that represents a query for the 'agenda_igreja' table.
 *
 * 
 *
 * @method     AgendaIgrejaQuery orderByAgendaId($order = Criteria::ASC) Order by the agenda_id column
 * @method     AgendaIgrejaQuery orderByIgrejaId($order = Criteria::ASC) Order by the igreja_id column
 *
 * @method     AgendaIgrejaQuery groupByAgendaId() Group by the agenda_id column
 * @method     AgendaIgrejaQuery groupByIgrejaId() Group by the igreja_id column
 *
 * @method     AgendaIgrejaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AgendaIgrejaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AgendaIgrejaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AgendaIgrejaQuery leftJoinAgenda($relationAlias = null) Adds a LEFT JOIN clause to the query using the Agenda relation
 * @method     AgendaIgrejaQuery rightJoinAgenda($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Agenda relation
 * @method     AgendaIgrejaQuery innerJoinAgenda($relationAlias = null) Adds a INNER JOIN clause to the query using the Agenda relation
 *
 * @method     AgendaIgrejaQuery leftJoinIgreja($relationAlias = null) Adds a LEFT JOIN clause to the query using the Igreja relation
 * @method     AgendaIgrejaQuery rightJoinIgreja($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Igreja relation
 * @method     AgendaIgrejaQuery innerJoinIgreja($relationAlias = null) Adds a INNER JOIN clause to the query using the Igreja relation
 *
 * @method     AgendaIgreja findOne(PropelPDO $con = null) Return the first AgendaIgreja matching the query
 * @method     AgendaIgreja findOneOrCreate(PropelPDO $con = null) Return the first AgendaIgreja matching the query, or a new AgendaIgreja object populated from the query conditions when no match is found
 *
 * @method     AgendaIgreja findOneByAgendaId(int $agenda_id) Return the first AgendaIgreja filtered by the agenda_id column
 * @method     AgendaIgreja findOneByIgrejaId(int $igreja_id) Return the first AgendaIgreja filtered by the igreja_id column
 *
 * @method     array findByAgendaId(int $agenda_id) Return AgendaIgreja objects filtered by the agenda_id column
 * @method     array findByIgrejaId(int $igreja_id) Return AgendaIgreja objects filtered by the igreja_id column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseAgendaIgrejaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseAgendaIgrejaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'AgendaIgreja', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AgendaIgrejaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AgendaIgrejaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AgendaIgrejaQuery) {
			return $criteria;
		}
		$query = new AgendaIgrejaQuery();
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
	 * @param     array[$agenda_id, $igreja_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    AgendaIgreja|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = AgendaIgrejaPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(AgendaIgrejaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    AgendaIgreja A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `AGENDA_ID`, `IGREJA_ID` FROM `agenda_igreja` WHERE `AGENDA_ID` = :p0 AND `IGREJA_ID` = :p1';
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
			$obj = new AgendaIgreja();
			$obj->hydrate($row);
			AgendaIgrejaPeer::addInstanceToPool($obj, serialize(array((string) $row[0], (string) $row[1])));
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
	 * @return    AgendaIgreja|array|mixed the result, formatted by the current formatter
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
	 * @return    AgendaIgrejaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(AgendaIgrejaPeer::AGENDA_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(AgendaIgrejaPeer::IGREJA_ID, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AgendaIgrejaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(AgendaIgrejaPeer::AGENDA_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(AgendaIgrejaPeer::IGREJA_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
	}

	/**
	 * Filter the query on the agenda_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAgendaId(1234); // WHERE agenda_id = 1234
	 * $query->filterByAgendaId(array(12, 34)); // WHERE agenda_id IN (12, 34)
	 * $query->filterByAgendaId(array('min' => 12)); // WHERE agenda_id > 12
	 * </code>
	 *
	 * @see       filterByAgenda()
	 *
	 * @param     mixed $agendaId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AgendaIgrejaQuery The current query, for fluid interface
	 */
	public function filterByAgendaId($agendaId = null, $comparison = null)
	{
		if (is_array($agendaId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AgendaIgrejaPeer::AGENDA_ID, $agendaId, $comparison);
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
	 * @return    AgendaIgrejaQuery The current query, for fluid interface
	 */
	public function filterByIgrejaId($igrejaId = null, $comparison = null)
	{
		if (is_array($igrejaId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AgendaIgrejaPeer::IGREJA_ID, $igrejaId, $comparison);
	}

	/**
	 * Filter the query by a related Agenda object
	 *
	 * @param     Agenda|PropelCollection $agenda The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AgendaIgrejaQuery The current query, for fluid interface
	 */
	public function filterByAgenda($agenda, $comparison = null)
	{
		if ($agenda instanceof Agenda) {
			return $this
				->addUsingAlias(AgendaIgrejaPeer::AGENDA_ID, $agenda->getId(), $comparison);
		} elseif ($agenda instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AgendaIgrejaPeer::AGENDA_ID, $agenda->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByAgenda() only accepts arguments of type Agenda or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Agenda relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AgendaIgrejaQuery The current query, for fluid interface
	 */
	public function joinAgenda($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Agenda');

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
			$this->addJoinObject($join, 'Agenda');
		}

		return $this;
	}

	/**
	 * Use the Agenda relation Agenda object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AgendaQuery A secondary query class using the current class as primary query
	 */
	public function useAgendaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAgenda($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Agenda', 'AgendaQuery');
	}

	/**
	 * Filter the query by a related Igreja object
	 *
	 * @param     Igreja|PropelCollection $igreja The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AgendaIgrejaQuery The current query, for fluid interface
	 */
	public function filterByIgreja($igreja, $comparison = null)
	{
		if ($igreja instanceof Igreja) {
			return $this
				->addUsingAlias(AgendaIgrejaPeer::IGREJA_ID, $igreja->getId(), $comparison);
		} elseif ($igreja instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AgendaIgrejaPeer::IGREJA_ID, $igreja->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    AgendaIgrejaQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     AgendaIgreja $agendaIgreja Object to remove from the list of results
	 *
	 * @return    AgendaIgrejaQuery The current query, for fluid interface
	 */
	public function prune($agendaIgreja = null)
	{
		if ($agendaIgreja) {
			$this->addCond('pruneCond0', $this->getAliasedColName(AgendaIgrejaPeer::AGENDA_ID), $agendaIgreja->getAgendaId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(AgendaIgrejaPeer::IGREJA_ID), $agendaIgreja->getIgrejaId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BaseAgendaIgrejaQuery