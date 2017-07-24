<?php


/**
 * Base class that represents a query for the 'processo_caso' table.
 *
 * 
 *
 * @method     ProcessoCasoQuery orderByProcessoId($order = Criteria::ASC) Order by the processo_id column
 * @method     ProcessoCasoQuery orderByCasoId($order = Criteria::ASC) Order by the caso_id column
 *
 * @method     ProcessoCasoQuery groupByProcessoId() Group by the processo_id column
 * @method     ProcessoCasoQuery groupByCasoId() Group by the caso_id column
 *
 * @method     ProcessoCasoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ProcessoCasoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ProcessoCasoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ProcessoCasoQuery leftJoinCaso($relationAlias = null) Adds a LEFT JOIN clause to the query using the Caso relation
 * @method     ProcessoCasoQuery rightJoinCaso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Caso relation
 * @method     ProcessoCasoQuery innerJoinCaso($relationAlias = null) Adds a INNER JOIN clause to the query using the Caso relation
 *
 * @method     ProcessoCasoQuery leftJoinProcesso($relationAlias = null) Adds a LEFT JOIN clause to the query using the Processo relation
 * @method     ProcessoCasoQuery rightJoinProcesso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Processo relation
 * @method     ProcessoCasoQuery innerJoinProcesso($relationAlias = null) Adds a INNER JOIN clause to the query using the Processo relation
 *
 * @method     ProcessoCaso findOne(PropelPDO $con = null) Return the first ProcessoCaso matching the query
 * @method     ProcessoCaso findOneOrCreate(PropelPDO $con = null) Return the first ProcessoCaso matching the query, or a new ProcessoCaso object populated from the query conditions when no match is found
 *
 * @method     ProcessoCaso findOneByProcessoId(int $processo_id) Return the first ProcessoCaso filtered by the processo_id column
 * @method     ProcessoCaso findOneByCasoId(int $caso_id) Return the first ProcessoCaso filtered by the caso_id column
 *
 * @method     array findByProcessoId(int $processo_id) Return ProcessoCaso objects filtered by the processo_id column
 * @method     array findByCasoId(int $caso_id) Return ProcessoCaso objects filtered by the caso_id column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseProcessoCasoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseProcessoCasoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'ProcessoCaso', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ProcessoCasoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ProcessoCasoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ProcessoCasoQuery) {
			return $criteria;
		}
		$query = new ProcessoCasoQuery();
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
	 * @param     array[$processo_id, $caso_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    ProcessoCaso|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ProcessoCasoPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ProcessoCasoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    ProcessoCaso A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `PROCESSO_ID`, `CASO_ID` FROM `processo_caso` WHERE `PROCESSO_ID` = :p0 AND `CASO_ID` = :p1';
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
			$obj = new ProcessoCaso();
			$obj->hydrate($row);
			ProcessoCasoPeer::addInstanceToPool($obj, serialize(array((string) $row[0], (string) $row[1])));
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
	 * @return    ProcessoCaso|array|mixed the result, formatted by the current formatter
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
	 * @return    ProcessoCasoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(ProcessoCasoPeer::PROCESSO_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(ProcessoCasoPeer::CASO_ID, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ProcessoCasoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(ProcessoCasoPeer::PROCESSO_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(ProcessoCasoPeer::CASO_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
	}

	/**
	 * Filter the query on the processo_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByProcessoId(1234); // WHERE processo_id = 1234
	 * $query->filterByProcessoId(array(12, 34)); // WHERE processo_id IN (12, 34)
	 * $query->filterByProcessoId(array('min' => 12)); // WHERE processo_id > 12
	 * </code>
	 *
	 * @see       filterByProcesso()
	 *
	 * @param     mixed $processoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoCasoQuery The current query, for fluid interface
	 */
	public function filterByProcessoId($processoId = null, $comparison = null)
	{
		if (is_array($processoId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ProcessoCasoPeer::PROCESSO_ID, $processoId, $comparison);
	}

	/**
	 * Filter the query on the caso_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCasoId(1234); // WHERE caso_id = 1234
	 * $query->filterByCasoId(array(12, 34)); // WHERE caso_id IN (12, 34)
	 * $query->filterByCasoId(array('min' => 12)); // WHERE caso_id > 12
	 * </code>
	 *
	 * @see       filterByCaso()
	 *
	 * @param     mixed $casoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoCasoQuery The current query, for fluid interface
	 */
	public function filterByCasoId($casoId = null, $comparison = null)
	{
		if (is_array($casoId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ProcessoCasoPeer::CASO_ID, $casoId, $comparison);
	}

	/**
	 * Filter the query by a related Caso object
	 *
	 * @param     Caso|PropelCollection $caso The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoCasoQuery The current query, for fluid interface
	 */
	public function filterByCaso($caso, $comparison = null)
	{
		if ($caso instanceof Caso) {
			return $this
				->addUsingAlias(ProcessoCasoPeer::CASO_ID, $caso->getId(), $comparison);
		} elseif ($caso instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ProcessoCasoPeer::CASO_ID, $caso->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByCaso() only accepts arguments of type Caso or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Caso relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProcessoCasoQuery The current query, for fluid interface
	 */
	public function joinCaso($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Caso');

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
			$this->addJoinObject($join, 'Caso');
		}

		return $this;
	}

	/**
	 * Use the Caso relation Caso object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CasoQuery A secondary query class using the current class as primary query
	 */
	public function useCasoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCaso($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Caso', 'CasoQuery');
	}

	/**
	 * Filter the query by a related Processo object
	 *
	 * @param     Processo|PropelCollection $processo The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ProcessoCasoQuery The current query, for fluid interface
	 */
	public function filterByProcesso($processo, $comparison = null)
	{
		if ($processo instanceof Processo) {
			return $this
				->addUsingAlias(ProcessoCasoPeer::PROCESSO_ID, $processo->getId(), $comparison);
		} elseif ($processo instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ProcessoCasoPeer::PROCESSO_ID, $processo->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByProcesso() only accepts arguments of type Processo or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Processo relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProcessoCasoQuery The current query, for fluid interface
	 */
	public function joinProcesso($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Processo');

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
			$this->addJoinObject($join, 'Processo');
		}

		return $this;
	}

	/**
	 * Use the Processo relation Processo object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProcessoQuery A secondary query class using the current class as primary query
	 */
	public function useProcessoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinProcesso($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Processo', 'ProcessoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ProcessoCaso $processoCaso Object to remove from the list of results
	 *
	 * @return    ProcessoCasoQuery The current query, for fluid interface
	 */
	public function prune($processoCaso = null)
	{
		if ($processoCaso) {
			$this->addCond('pruneCond0', $this->getAliasedColName(ProcessoCasoPeer::PROCESSO_ID), $processoCaso->getProcessoId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(ProcessoCasoPeer::CASO_ID), $processoCaso->getCasoId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BaseProcessoCasoQuery