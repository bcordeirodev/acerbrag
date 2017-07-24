<?php


/**
 * Base class that represents a query for the 'perfil_permissao' table.
 *
 * 
 *
 * @method     PerfilPermissaoQuery orderByPerfilId($order = Criteria::ASC) Order by the perfil_id column
 * @method     PerfilPermissaoQuery orderByPermissaoId($order = Criteria::ASC) Order by the permissao_id column
 *
 * @method     PerfilPermissaoQuery groupByPerfilId() Group by the perfil_id column
 * @method     PerfilPermissaoQuery groupByPermissaoId() Group by the permissao_id column
 *
 * @method     PerfilPermissaoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PerfilPermissaoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PerfilPermissaoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PerfilPermissaoQuery leftJoinPerfil($relationAlias = null) Adds a LEFT JOIN clause to the query using the Perfil relation
 * @method     PerfilPermissaoQuery rightJoinPerfil($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Perfil relation
 * @method     PerfilPermissaoQuery innerJoinPerfil($relationAlias = null) Adds a INNER JOIN clause to the query using the Perfil relation
 *
 * @method     PerfilPermissaoQuery leftJoinPermissao($relationAlias = null) Adds a LEFT JOIN clause to the query using the Permissao relation
 * @method     PerfilPermissaoQuery rightJoinPermissao($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Permissao relation
 * @method     PerfilPermissaoQuery innerJoinPermissao($relationAlias = null) Adds a INNER JOIN clause to the query using the Permissao relation
 *
 * @method     PerfilPermissao findOne(PropelPDO $con = null) Return the first PerfilPermissao matching the query
 * @method     PerfilPermissao findOneOrCreate(PropelPDO $con = null) Return the first PerfilPermissao matching the query, or a new PerfilPermissao object populated from the query conditions when no match is found
 *
 * @method     PerfilPermissao findOneByPerfilId(int $perfil_id) Return the first PerfilPermissao filtered by the perfil_id column
 * @method     PerfilPermissao findOneByPermissaoId(int $permissao_id) Return the first PerfilPermissao filtered by the permissao_id column
 *
 * @method     array findByPerfilId(int $perfil_id) Return PerfilPermissao objects filtered by the perfil_id column
 * @method     array findByPermissaoId(int $permissao_id) Return PerfilPermissao objects filtered by the permissao_id column
 *
 * @package    propel.generator.Default.om
 */
abstract class BasePerfilPermissaoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BasePerfilPermissaoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'PerfilPermissao', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PerfilPermissaoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PerfilPermissaoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PerfilPermissaoQuery) {
			return $criteria;
		}
		$query = new PerfilPermissaoQuery();
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
	 * @param     array[$perfil_id, $permissao_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PerfilPermissao|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = PerfilPermissaoPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(PerfilPermissaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    PerfilPermissao A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `PERFIL_ID`, `PERMISSAO_ID` FROM `perfil_permissao` WHERE `PERFIL_ID` = :p0 AND `PERMISSAO_ID` = :p1';
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
			$obj = new PerfilPermissao();
			$obj->hydrate($row);
			PerfilPermissaoPeer::addInstanceToPool($obj, serialize(array((string) $row[0], (string) $row[1])));
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
	 * @return    PerfilPermissao|array|mixed the result, formatted by the current formatter
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
	 * @return    PerfilPermissaoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(PerfilPermissaoPeer::PERFIL_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(PerfilPermissaoPeer::PERMISSAO_ID, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PerfilPermissaoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(PerfilPermissaoPeer::PERFIL_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(PerfilPermissaoPeer::PERMISSAO_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
	}

	/**
	 * Filter the query on the perfil_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPerfilId(1234); // WHERE perfil_id = 1234
	 * $query->filterByPerfilId(array(12, 34)); // WHERE perfil_id IN (12, 34)
	 * $query->filterByPerfilId(array('min' => 12)); // WHERE perfil_id > 12
	 * </code>
	 *
	 * @see       filterByPerfil()
	 *
	 * @param     mixed $perfilId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PerfilPermissaoQuery The current query, for fluid interface
	 */
	public function filterByPerfilId($perfilId = null, $comparison = null)
	{
		if (is_array($perfilId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PerfilPermissaoPeer::PERFIL_ID, $perfilId, $comparison);
	}

	/**
	 * Filter the query on the permissao_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPermissaoId(1234); // WHERE permissao_id = 1234
	 * $query->filterByPermissaoId(array(12, 34)); // WHERE permissao_id IN (12, 34)
	 * $query->filterByPermissaoId(array('min' => 12)); // WHERE permissao_id > 12
	 * </code>
	 *
	 * @see       filterByPermissao()
	 *
	 * @param     mixed $permissaoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PerfilPermissaoQuery The current query, for fluid interface
	 */
	public function filterByPermissaoId($permissaoId = null, $comparison = null)
	{
		if (is_array($permissaoId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PerfilPermissaoPeer::PERMISSAO_ID, $permissaoId, $comparison);
	}

	/**
	 * Filter the query by a related Perfil object
	 *
	 * @param     Perfil|PropelCollection $perfil The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PerfilPermissaoQuery The current query, for fluid interface
	 */
	public function filterByPerfil($perfil, $comparison = null)
	{
		if ($perfil instanceof Perfil) {
			return $this
				->addUsingAlias(PerfilPermissaoPeer::PERFIL_ID, $perfil->getId(), $comparison);
		} elseif ($perfil instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PerfilPermissaoPeer::PERFIL_ID, $perfil->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByPerfil() only accepts arguments of type Perfil or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Perfil relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PerfilPermissaoQuery The current query, for fluid interface
	 */
	public function joinPerfil($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Perfil');

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
			$this->addJoinObject($join, 'Perfil');
		}

		return $this;
	}

	/**
	 * Use the Perfil relation Perfil object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PerfilQuery A secondary query class using the current class as primary query
	 */
	public function usePerfilQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPerfil($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Perfil', 'PerfilQuery');
	}

	/**
	 * Filter the query by a related Permissao object
	 *
	 * @param     Permissao|PropelCollection $permissao The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PerfilPermissaoQuery The current query, for fluid interface
	 */
	public function filterByPermissao($permissao, $comparison = null)
	{
		if ($permissao instanceof Permissao) {
			return $this
				->addUsingAlias(PerfilPermissaoPeer::PERMISSAO_ID, $permissao->getId(), $comparison);
		} elseif ($permissao instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PerfilPermissaoPeer::PERMISSAO_ID, $permissao->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByPermissao() only accepts arguments of type Permissao or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Permissao relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PerfilPermissaoQuery The current query, for fluid interface
	 */
	public function joinPermissao($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Permissao');

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
			$this->addJoinObject($join, 'Permissao');
		}

		return $this;
	}

	/**
	 * Use the Permissao relation Permissao object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PermissaoQuery A secondary query class using the current class as primary query
	 */
	public function usePermissaoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPermissao($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Permissao', 'PermissaoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     PerfilPermissao $perfilPermissao Object to remove from the list of results
	 *
	 * @return    PerfilPermissaoQuery The current query, for fluid interface
	 */
	public function prune($perfilPermissao = null)
	{
		if ($perfilPermissao) {
			$this->addCond('pruneCond0', $this->getAliasedColName(PerfilPermissaoPeer::PERFIL_ID), $perfilPermissao->getPerfilId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(PerfilPermissaoPeer::PERMISSAO_ID), $perfilPermissao->getPermissaoId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

} // BasePerfilPermissaoQuery