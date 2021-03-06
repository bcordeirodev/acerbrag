<?php


/**
 * Base class that represents a query for the 'advogado_cliente' table.
 *
 * 
 *
 * @method     AdvogadoClienteQuery orderByClienteId($order = Criteria::ASC) Order by the cliente_id column
 * @method     AdvogadoClienteQuery orderByAdvogadoId($order = Criteria::ASC) Order by the advogado_id column
 *
 * @method     AdvogadoClienteQuery groupByClienteId() Group by the cliente_id column
 * @method     AdvogadoClienteQuery groupByAdvogadoId() Group by the advogado_id column
 *
 * @method     AdvogadoClienteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AdvogadoClienteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AdvogadoClienteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AdvogadoClienteQuery leftJoinAdvogado($relationAlias = null) Adds a LEFT JOIN clause to the query using the Advogado relation
 * @method     AdvogadoClienteQuery rightJoinAdvogado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Advogado relation
 * @method     AdvogadoClienteQuery innerJoinAdvogado($relationAlias = null) Adds a INNER JOIN clause to the query using the Advogado relation
 *
 * @method     AdvogadoClienteQuery leftJoinCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cliente relation
 * @method     AdvogadoClienteQuery rightJoinCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cliente relation
 * @method     AdvogadoClienteQuery innerJoinCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the Cliente relation
 *
 * @method     AdvogadoCliente findOne(PropelPDO $con = null) Return the first AdvogadoCliente matching the query
 * @method     AdvogadoCliente findOneOrCreate(PropelPDO $con = null) Return the first AdvogadoCliente matching the query, or a new AdvogadoCliente object populated from the query conditions when no match is found
 *
 * @method     AdvogadoCliente findOneByClienteId(int $cliente_id) Return the first AdvogadoCliente filtered by the cliente_id column
 * @method     AdvogadoCliente findOneByAdvogadoId(int $advogado_id) Return the first AdvogadoCliente filtered by the advogado_id column
 *
 * @method     array findByClienteId(int $cliente_id) Return AdvogadoCliente objects filtered by the cliente_id column
 * @method     array findByAdvogadoId(int $advogado_id) Return AdvogadoCliente objects filtered by the advogado_id column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseAdvogadoClienteQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseAdvogadoClienteQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'AdvogadoCliente', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AdvogadoClienteQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AdvogadoClienteQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AdvogadoClienteQuery) {
			return $criteria;
		}
		$query = new AdvogadoClienteQuery();
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
	 * @param     array[$cliente_id, $advogado_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    AdvogadoCliente|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = AdvogadoClientePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(AdvogadoClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    AdvogadoCliente A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `CLIENTE_ID`, `ADVOGADO_ID` FROM `advogado_cliente` WHERE `CLIENTE_ID` = :p0 AND `ADVOGADO_ID` = :p1';
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
			$obj = new AdvogadoCliente();
			$obj->hydrate($row);
			AdvogadoClientePeer::addInstanceToPool($obj, serialize(array((string) $row[0], (string) $row[1])));
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
	 * @return    AdvogadoCliente|array|mixed the result, formatted by the current formatter
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
	 * @return    AdvogadoClienteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(AdvogadoClientePeer::CLIENTE_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(AdvogadoClientePeer::ADVOGADO_ID, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AdvogadoClienteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(AdvogadoClientePeer::CLIENTE_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(AdvogadoClientePeer::ADVOGADO_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
	}

	/**
	 * Filter the query on the cliente_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByClienteId(1234); // WHERE cliente_id = 1234
	 * $query->filterByClienteId(array(12, 34)); // WHERE cliente_id IN (12, 34)
	 * $query->filterByClienteId(array('min' => 12)); // WHERE cliente_id > 12
	 * </code>
	 *
	 * @see       filterByCliente()
	 *
	 * @param     mixed $clienteId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoClienteQuery The current query, for fluid interface
	 */
	public function filterByClienteId($clienteId = null, $comparison = null)
	{
		if (is_array($clienteId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AdvogadoClientePeer::CLIENTE_ID, $clienteId, $comparison);
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
	 * @return    AdvogadoClienteQuery The current query, for fluid interface
	 */
	public function filterByAdvogadoId($advogadoId = null, $comparison = null)
	{
		if (is_array($advogadoId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AdvogadoClientePeer::ADVOGADO_ID, $advogadoId, $comparison);
	}

	/**
	 * Filter the query by a related Advogado object
	 *
	 * @param     Advogado|PropelCollection $advogado The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoClienteQuery The current query, for fluid interface
	 */
	public function filterByAdvogado($advogado, $comparison = null)
	{
		if ($advogado instanceof Advogado) {
			return $this
				->addUsingAlias(AdvogadoClientePeer::ADVOGADO_ID, $advogado->getId(), $comparison);
		} elseif ($advogado instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AdvogadoClientePeer::ADVOGADO_ID, $advogado->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    AdvogadoClienteQuery The current query, for fluid interface
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
	 * Filter the query by a related Cliente object
	 *
	 * @param     Cliente|PropelCollection $cliente The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoClienteQuery The current query, for fluid interface
	 */
	public function filterByCliente($cliente, $comparison = null)
	{
		if ($cliente instanceof Cliente) {
			return $this
				->addUsingAlias(AdvogadoClientePeer::CLIENTE_ID, $cliente->getId(), $comparison);
		} elseif ($cliente instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AdvogadoClientePeer::CLIENTE_ID, $cliente->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByCliente() only accepts arguments of type Cliente or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Cliente relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdvogadoClienteQuery The current query, for fluid interface
	 */
	public function joinCliente($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Cliente');

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
			$this->addJoinObject($join, 'Cliente');
		}

		return $this;
	}

	/**
	 * Use the Cliente relation Cliente object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClienteQuery A secondary query class using the current class as primary query
	 */
	public function useClienteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCliente($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Cliente', 'ClienteQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     AdvogadoCliente $advogadoCliente Object to remove from the list of results
	 *
	 * @return    AdvogadoClienteQuery The current query, for fluid interface
	 */
	public function prune($advogadoCliente = null)
	{
		if ($advogadoCliente) {
			$this->addCond('pruneCond0', $this->getAliasedColName(AdvogadoClientePeer::CLIENTE_ID), $advogadoCliente->getClienteId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(AdvogadoClientePeer::ADVOGADO_ID), $advogadoCliente->getAdvogadoId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BaseAdvogadoClienteQuery