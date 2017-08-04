<?php


/**
 * Base class that represents a query for the 'curtida_forum' table.
 *
 * 
 *
 * @method     CurtidaForumQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CurtidaForumQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method     CurtidaForumQuery orderByForumId($order = Criteria::ASC) Order by the forum_id column
 *
 * @method     CurtidaForumQuery groupById() Group by the id column
 * @method     CurtidaForumQuery groupByUsuarioId() Group by the usuario_id column
 * @method     CurtidaForumQuery groupByForumId() Group by the forum_id column
 *
 * @method     CurtidaForumQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CurtidaForumQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CurtidaForumQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CurtidaForumQuery leftJoinForum($relationAlias = null) Adds a LEFT JOIN clause to the query using the Forum relation
 * @method     CurtidaForumQuery rightJoinForum($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Forum relation
 * @method     CurtidaForumQuery innerJoinForum($relationAlias = null) Adds a INNER JOIN clause to the query using the Forum relation
 *
 * @method     CurtidaForumQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     CurtidaForumQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     CurtidaForumQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     CurtidaForum findOne(PropelPDO $con = null) Return the first CurtidaForum matching the query
 * @method     CurtidaForum findOneOrCreate(PropelPDO $con = null) Return the first CurtidaForum matching the query, or a new CurtidaForum object populated from the query conditions when no match is found
 *
 * @method     CurtidaForum findOneById(int $id) Return the first CurtidaForum filtered by the id column
 * @method     CurtidaForum findOneByUsuarioId(int $usuario_id) Return the first CurtidaForum filtered by the usuario_id column
 * @method     CurtidaForum findOneByForumId(int $forum_id) Return the first CurtidaForum filtered by the forum_id column
 *
 * @method     array findById(int $id) Return CurtidaForum objects filtered by the id column
 * @method     array findByUsuarioId(int $usuario_id) Return CurtidaForum objects filtered by the usuario_id column
 * @method     array findByForumId(int $forum_id) Return CurtidaForum objects filtered by the forum_id column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseCurtidaForumQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseCurtidaForumQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'CurtidaForum', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CurtidaForumQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CurtidaForumQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CurtidaForumQuery) {
			return $criteria;
		}
		$query = new CurtidaForumQuery();
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
	 * @return    CurtidaForum|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = CurtidaForumPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(CurtidaForumPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    CurtidaForum A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `USUARIO_ID`, `FORUM_ID` FROM `curtida_forum` WHERE `ID` = :p0';
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
			$obj = new CurtidaForum();
			$obj->hydrate($row);
			CurtidaForumPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    CurtidaForum|array|mixed the result, formatted by the current formatter
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
	 * @return    CurtidaForumQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CurtidaForumPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CurtidaForumQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CurtidaForumPeer::ID, $keys, Criteria::IN);
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
	 * @return    CurtidaForumQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CurtidaForumPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the usuario_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUsuarioId(1234); // WHERE usuario_id = 1234
	 * $query->filterByUsuarioId(array(12, 34)); // WHERE usuario_id IN (12, 34)
	 * $query->filterByUsuarioId(array('min' => 12)); // WHERE usuario_id > 12
	 * </code>
	 *
	 * @see       filterByUsuario()
	 *
	 * @param     mixed $usuarioId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CurtidaForumQuery The current query, for fluid interface
	 */
	public function filterByUsuarioId($usuarioId = null, $comparison = null)
	{
		if (is_array($usuarioId)) {
			$useMinMax = false;
			if (isset($usuarioId['min'])) {
				$this->addUsingAlias(CurtidaForumPeer::USUARIO_ID, $usuarioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($usuarioId['max'])) {
				$this->addUsingAlias(CurtidaForumPeer::USUARIO_ID, $usuarioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CurtidaForumPeer::USUARIO_ID, $usuarioId, $comparison);
	}

	/**
	 * Filter the query on the forum_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByForumId(1234); // WHERE forum_id = 1234
	 * $query->filterByForumId(array(12, 34)); // WHERE forum_id IN (12, 34)
	 * $query->filterByForumId(array('min' => 12)); // WHERE forum_id > 12
	 * </code>
	 *
	 * @see       filterByForum()
	 *
	 * @param     mixed $forumId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CurtidaForumQuery The current query, for fluid interface
	 */
	public function filterByForumId($forumId = null, $comparison = null)
	{
		if (is_array($forumId)) {
			$useMinMax = false;
			if (isset($forumId['min'])) {
				$this->addUsingAlias(CurtidaForumPeer::FORUM_ID, $forumId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($forumId['max'])) {
				$this->addUsingAlias(CurtidaForumPeer::FORUM_ID, $forumId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CurtidaForumPeer::FORUM_ID, $forumId, $comparison);
	}

	/**
	 * Filter the query by a related Forum object
	 *
	 * @param     Forum|PropelCollection $forum The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CurtidaForumQuery The current query, for fluid interface
	 */
	public function filterByForum($forum, $comparison = null)
	{
		if ($forum instanceof Forum) {
			return $this
				->addUsingAlias(CurtidaForumPeer::FORUM_ID, $forum->getId(), $comparison);
		} elseif ($forum instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CurtidaForumPeer::FORUM_ID, $forum->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByForum() only accepts arguments of type Forum or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Forum relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CurtidaForumQuery The current query, for fluid interface
	 */
	public function joinForum($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Forum');

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
			$this->addJoinObject($join, 'Forum');
		}

		return $this;
	}

	/**
	 * Use the Forum relation Forum object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ForumQuery A secondary query class using the current class as primary query
	 */
	public function useForumQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinForum($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Forum', 'ForumQuery');
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CurtidaForumQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(CurtidaForumPeer::USUARIO_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CurtidaForumPeer::USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUsuario() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Usuario relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CurtidaForumQuery The current query, for fluid interface
	 */
	public function joinUsuario($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Usuario');

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
			$this->addJoinObject($join, 'Usuario');
		}

		return $this;
	}

	/**
	 * Use the Usuario relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUsuario($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Usuario', 'UsuarioQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     CurtidaForum $curtidaForum Object to remove from the list of results
	 *
	 * @return    CurtidaForumQuery The current query, for fluid interface
	 */
	public function prune($curtidaForum = null)
	{
		if ($curtidaForum) {
			$this->addUsingAlias(CurtidaForumPeer::ID, $curtidaForum->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseCurtidaForumQuery