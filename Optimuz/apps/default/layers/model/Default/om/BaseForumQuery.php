<?php


/**
 * Base class that represents a query for the 'forum' table.
 *
 * 
 *
 * @method     ForumQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ForumQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method     ForumQuery orderByTitulo($order = Criteria::ASC) Order by the titulo column
 * @method     ForumQuery orderByTopico($order = Criteria::ASC) Order by the topico column
 * @method     ForumQuery orderByDataCricacao($order = Criteria::ASC) Order by the data_cricacao column
 *
 * @method     ForumQuery groupById() Group by the id column
 * @method     ForumQuery groupByUsuarioId() Group by the usuario_id column
 * @method     ForumQuery groupByTitulo() Group by the titulo column
 * @method     ForumQuery groupByTopico() Group by the topico column
 * @method     ForumQuery groupByDataCricacao() Group by the data_cricacao column
 *
 * @method     ForumQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ForumQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ForumQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ForumQuery leftJoinCurtidaForum($relationAlias = null) Adds a LEFT JOIN clause to the query using the CurtidaForum relation
 * @method     ForumQuery rightJoinCurtidaForum($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CurtidaForum relation
 * @method     ForumQuery innerJoinCurtidaForum($relationAlias = null) Adds a INNER JOIN clause to the query using the CurtidaForum relation
 *
 * @method     ForumQuery leftJoinRespostaForum($relationAlias = null) Adds a LEFT JOIN clause to the query using the RespostaForum relation
 * @method     ForumQuery rightJoinRespostaForum($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RespostaForum relation
 * @method     ForumQuery innerJoinRespostaForum($relationAlias = null) Adds a INNER JOIN clause to the query using the RespostaForum relation
 *
 * @method     Forum findOne(PropelPDO $con = null) Return the first Forum matching the query
 * @method     Forum findOneOrCreate(PropelPDO $con = null) Return the first Forum matching the query, or a new Forum object populated from the query conditions when no match is found
 *
 * @method     Forum findOneById(int $id) Return the first Forum filtered by the id column
 * @method     Forum findOneByUsuarioId(int $usuario_id) Return the first Forum filtered by the usuario_id column
 * @method     Forum findOneByTitulo(string $titulo) Return the first Forum filtered by the titulo column
 * @method     Forum findOneByTopico(string $topico) Return the first Forum filtered by the topico column
 * @method     Forum findOneByDataCricacao(string $data_cricacao) Return the first Forum filtered by the data_cricacao column
 *
 * @method     array findById(int $id) Return Forum objects filtered by the id column
 * @method     array findByUsuarioId(int $usuario_id) Return Forum objects filtered by the usuario_id column
 * @method     array findByTitulo(string $titulo) Return Forum objects filtered by the titulo column
 * @method     array findByTopico(string $topico) Return Forum objects filtered by the topico column
 * @method     array findByDataCricacao(string $data_cricacao) Return Forum objects filtered by the data_cricacao column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseForumQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseForumQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Forum', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ForumQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ForumQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ForumQuery) {
			return $criteria;
		}
		$query = new ForumQuery();
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
	 * @return    Forum|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ForumPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ForumPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Forum A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `USUARIO_ID`, `TITULO`, `TOPICO`, `DATA_CRICACAO` FROM `forum` WHERE `ID` = :p0';
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
			$obj = new Forum();
			$obj->hydrate($row);
			ForumPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Forum|array|mixed the result, formatted by the current formatter
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
	 * @return    ForumQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ForumPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ForumQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ForumPeer::ID, $keys, Criteria::IN);
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
	 * @return    ForumQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ForumPeer::ID, $id, $comparison);
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
	 * @param     mixed $usuarioId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ForumQuery The current query, for fluid interface
	 */
	public function filterByUsuarioId($usuarioId = null, $comparison = null)
	{
		if (is_array($usuarioId)) {
			$useMinMax = false;
			if (isset($usuarioId['min'])) {
				$this->addUsingAlias(ForumPeer::USUARIO_ID, $usuarioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($usuarioId['max'])) {
				$this->addUsingAlias(ForumPeer::USUARIO_ID, $usuarioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ForumPeer::USUARIO_ID, $usuarioId, $comparison);
	}

	/**
	 * Filter the query on the titulo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTitulo('fooValue');   // WHERE titulo = 'fooValue'
	 * $query->filterByTitulo('%fooValue%'); // WHERE titulo LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $titulo The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ForumQuery The current query, for fluid interface
	 */
	public function filterByTitulo($titulo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($titulo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $titulo)) {
				$titulo = str_replace('*', '%', $titulo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ForumPeer::TITULO, $titulo, $comparison);
	}

	/**
	 * Filter the query on the topico column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTopico('fooValue');   // WHERE topico = 'fooValue'
	 * $query->filterByTopico('%fooValue%'); // WHERE topico LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $topico The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ForumQuery The current query, for fluid interface
	 */
	public function filterByTopico($topico = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($topico)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $topico)) {
				$topico = str_replace('*', '%', $topico);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ForumPeer::TOPICO, $topico, $comparison);
	}

	/**
	 * Filter the query on the data_cricacao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataCricacao('2011-03-14'); // WHERE data_cricacao = '2011-03-14'
	 * $query->filterByDataCricacao('now'); // WHERE data_cricacao = '2011-03-14'
	 * $query->filterByDataCricacao(array('max' => 'yesterday')); // WHERE data_cricacao > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataCricacao The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ForumQuery The current query, for fluid interface
	 */
	public function filterByDataCricacao($dataCricacao = null, $comparison = null)
	{
		if (is_array($dataCricacao)) {
			$useMinMax = false;
			if (isset($dataCricacao['min'])) {
				$this->addUsingAlias(ForumPeer::DATA_CRICACAO, $dataCricacao['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataCricacao['max'])) {
				$this->addUsingAlias(ForumPeer::DATA_CRICACAO, $dataCricacao['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ForumPeer::DATA_CRICACAO, $dataCricacao, $comparison);
	}

	/**
	 * Filter the query by a related CurtidaForum object
	 *
	 * @param     CurtidaForum $curtidaForum  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ForumQuery The current query, for fluid interface
	 */
	public function filterByCurtidaForum($curtidaForum, $comparison = null)
	{
		if ($curtidaForum instanceof CurtidaForum) {
			return $this
				->addUsingAlias(ForumPeer::ID, $curtidaForum->getForumId(), $comparison);
		} elseif ($curtidaForum instanceof PropelCollection) {
			return $this
				->useCurtidaForumQuery()
				->filterByPrimaryKeys($curtidaForum->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByCurtidaForum() only accepts arguments of type CurtidaForum or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the CurtidaForum relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ForumQuery The current query, for fluid interface
	 */
	public function joinCurtidaForum($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('CurtidaForum');

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
			$this->addJoinObject($join, 'CurtidaForum');
		}

		return $this;
	}

	/**
	 * Use the CurtidaForum relation CurtidaForum object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CurtidaForumQuery A secondary query class using the current class as primary query
	 */
	public function useCurtidaForumQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCurtidaForum($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'CurtidaForum', 'CurtidaForumQuery');
	}

	/**
	 * Filter the query by a related RespostaForum object
	 *
	 * @param     RespostaForum $respostaForum  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ForumQuery The current query, for fluid interface
	 */
	public function filterByRespostaForum($respostaForum, $comparison = null)
	{
		if ($respostaForum instanceof RespostaForum) {
			return $this
				->addUsingAlias(ForumPeer::ID, $respostaForum->getForumId(), $comparison);
		} elseif ($respostaForum instanceof PropelCollection) {
			return $this
				->useRespostaForumQuery()
				->filterByPrimaryKeys($respostaForum->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByRespostaForum() only accepts arguments of type RespostaForum or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the RespostaForum relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ForumQuery The current query, for fluid interface
	 */
	public function joinRespostaForum($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('RespostaForum');

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
			$this->addJoinObject($join, 'RespostaForum');
		}

		return $this;
	}

	/**
	 * Use the RespostaForum relation RespostaForum object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RespostaForumQuery A secondary query class using the current class as primary query
	 */
	public function useRespostaForumQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinRespostaForum($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'RespostaForum', 'RespostaForumQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Forum $forum Object to remove from the list of results
	 *
	 * @return    ForumQuery The current query, for fluid interface
	 */
	public function prune($forum = null)
	{
		if ($forum) {
			$this->addUsingAlias(ForumPeer::ID, $forum->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseForumQuery