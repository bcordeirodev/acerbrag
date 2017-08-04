<?php


/**
 * Base class that represents a query for the 'resposta_forum' table.
 *
 * 
 *
 * @method     RespostaForumQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     RespostaForumQuery orderByForumId($order = Criteria::ASC) Order by the forum_id column
 * @method     RespostaForumQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method     RespostaForumQuery orderByDataResposta($order = Criteria::ASC) Order by the data_resposta column
 * @method     RespostaForumQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 *
 * @method     RespostaForumQuery groupById() Group by the id column
 * @method     RespostaForumQuery groupByForumId() Group by the forum_id column
 * @method     RespostaForumQuery groupByUsuarioId() Group by the usuario_id column
 * @method     RespostaForumQuery groupByDataResposta() Group by the data_resposta column
 * @method     RespostaForumQuery groupByDescricao() Group by the descricao column
 *
 * @method     RespostaForumQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     RespostaForumQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     RespostaForumQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     RespostaForumQuery leftJoinForum($relationAlias = null) Adds a LEFT JOIN clause to the query using the Forum relation
 * @method     RespostaForumQuery rightJoinForum($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Forum relation
 * @method     RespostaForumQuery innerJoinForum($relationAlias = null) Adds a INNER JOIN clause to the query using the Forum relation
 *
 * @method     RespostaForumQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     RespostaForumQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     RespostaForumQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     RespostaForumQuery leftJoinAvaliacaoRespostaForum($relationAlias = null) Adds a LEFT JOIN clause to the query using the AvaliacaoRespostaForum relation
 * @method     RespostaForumQuery rightJoinAvaliacaoRespostaForum($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AvaliacaoRespostaForum relation
 * @method     RespostaForumQuery innerJoinAvaliacaoRespostaForum($relationAlias = null) Adds a INNER JOIN clause to the query using the AvaliacaoRespostaForum relation
 *
 * @method     RespostaForum findOne(PropelPDO $con = null) Return the first RespostaForum matching the query
 * @method     RespostaForum findOneOrCreate(PropelPDO $con = null) Return the first RespostaForum matching the query, or a new RespostaForum object populated from the query conditions when no match is found
 *
 * @method     RespostaForum findOneById(int $id) Return the first RespostaForum filtered by the id column
 * @method     RespostaForum findOneByForumId(int $forum_id) Return the first RespostaForum filtered by the forum_id column
 * @method     RespostaForum findOneByUsuarioId(int $usuario_id) Return the first RespostaForum filtered by the usuario_id column
 * @method     RespostaForum findOneByDataResposta(string $data_resposta) Return the first RespostaForum filtered by the data_resposta column
 * @method     RespostaForum findOneByDescricao(string $descricao) Return the first RespostaForum filtered by the descricao column
 *
 * @method     array findById(int $id) Return RespostaForum objects filtered by the id column
 * @method     array findByForumId(int $forum_id) Return RespostaForum objects filtered by the forum_id column
 * @method     array findByUsuarioId(int $usuario_id) Return RespostaForum objects filtered by the usuario_id column
 * @method     array findByDataResposta(string $data_resposta) Return RespostaForum objects filtered by the data_resposta column
 * @method     array findByDescricao(string $descricao) Return RespostaForum objects filtered by the descricao column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseRespostaForumQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseRespostaForumQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'RespostaForum', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new RespostaForumQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    RespostaForumQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof RespostaForumQuery) {
			return $criteria;
		}
		$query = new RespostaForumQuery();
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
	 * @return    RespostaForum|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = RespostaForumPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(RespostaForumPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    RespostaForum A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `FORUM_ID`, `USUARIO_ID`, `DATA_RESPOSTA`, `DESCRICAO` FROM `resposta_forum` WHERE `ID` = :p0';
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
			$obj = new RespostaForum();
			$obj->hydrate($row);
			RespostaForumPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    RespostaForum|array|mixed the result, formatted by the current formatter
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
	 * @return    RespostaForumQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(RespostaForumPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    RespostaForumQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(RespostaForumPeer::ID, $keys, Criteria::IN);
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
	 * @return    RespostaForumQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RespostaForumPeer::ID, $id, $comparison);
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
	 * @return    RespostaForumQuery The current query, for fluid interface
	 */
	public function filterByForumId($forumId = null, $comparison = null)
	{
		if (is_array($forumId)) {
			$useMinMax = false;
			if (isset($forumId['min'])) {
				$this->addUsingAlias(RespostaForumPeer::FORUM_ID, $forumId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($forumId['max'])) {
				$this->addUsingAlias(RespostaForumPeer::FORUM_ID, $forumId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RespostaForumPeer::FORUM_ID, $forumId, $comparison);
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
	 * @return    RespostaForumQuery The current query, for fluid interface
	 */
	public function filterByUsuarioId($usuarioId = null, $comparison = null)
	{
		if (is_array($usuarioId)) {
			$useMinMax = false;
			if (isset($usuarioId['min'])) {
				$this->addUsingAlias(RespostaForumPeer::USUARIO_ID, $usuarioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($usuarioId['max'])) {
				$this->addUsingAlias(RespostaForumPeer::USUARIO_ID, $usuarioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RespostaForumPeer::USUARIO_ID, $usuarioId, $comparison);
	}

	/**
	 * Filter the query on the data_resposta column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataResposta('2011-03-14'); // WHERE data_resposta = '2011-03-14'
	 * $query->filterByDataResposta('now'); // WHERE data_resposta = '2011-03-14'
	 * $query->filterByDataResposta(array('max' => 'yesterday')); // WHERE data_resposta > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataResposta The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespostaForumQuery The current query, for fluid interface
	 */
	public function filterByDataResposta($dataResposta = null, $comparison = null)
	{
		if (is_array($dataResposta)) {
			$useMinMax = false;
			if (isset($dataResposta['min'])) {
				$this->addUsingAlias(RespostaForumPeer::DATA_RESPOSTA, $dataResposta['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataResposta['max'])) {
				$this->addUsingAlias(RespostaForumPeer::DATA_RESPOSTA, $dataResposta['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RespostaForumPeer::DATA_RESPOSTA, $dataResposta, $comparison);
	}

	/**
	 * Filter the query on the descricao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDescricao('fooValue');   // WHERE descricao = 'fooValue'
	 * $query->filterByDescricao('%fooValue%'); // WHERE descricao LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $descricao The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespostaForumQuery The current query, for fluid interface
	 */
	public function filterByDescricao($descricao = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($descricao)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $descricao)) {
				$descricao = str_replace('*', '%', $descricao);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RespostaForumPeer::DESCRICAO, $descricao, $comparison);
	}

	/**
	 * Filter the query by a related Forum object
	 *
	 * @param     Forum|PropelCollection $forum The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespostaForumQuery The current query, for fluid interface
	 */
	public function filterByForum($forum, $comparison = null)
	{
		if ($forum instanceof Forum) {
			return $this
				->addUsingAlias(RespostaForumPeer::FORUM_ID, $forum->getId(), $comparison);
		} elseif ($forum instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(RespostaForumPeer::FORUM_ID, $forum->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    RespostaForumQuery The current query, for fluid interface
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
	 * @return    RespostaForumQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(RespostaForumPeer::USUARIO_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(RespostaForumPeer::USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    RespostaForumQuery The current query, for fluid interface
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
	 * Filter the query by a related AvaliacaoRespostaForum object
	 *
	 * @param     AvaliacaoRespostaForum $avaliacaoRespostaForum  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespostaForumQuery The current query, for fluid interface
	 */
	public function filterByAvaliacaoRespostaForum($avaliacaoRespostaForum, $comparison = null)
	{
		if ($avaliacaoRespostaForum instanceof AvaliacaoRespostaForum) {
			return $this
				->addUsingAlias(RespostaForumPeer::ID, $avaliacaoRespostaForum->getRespostaForumId(), $comparison);
		} elseif ($avaliacaoRespostaForum instanceof PropelCollection) {
			return $this
				->useAvaliacaoRespostaForumQuery()
				->filterByPrimaryKeys($avaliacaoRespostaForum->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAvaliacaoRespostaForum() only accepts arguments of type AvaliacaoRespostaForum or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AvaliacaoRespostaForum relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RespostaForumQuery The current query, for fluid interface
	 */
	public function joinAvaliacaoRespostaForum($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AvaliacaoRespostaForum');

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
			$this->addJoinObject($join, 'AvaliacaoRespostaForum');
		}

		return $this;
	}

	/**
	 * Use the AvaliacaoRespostaForum relation AvaliacaoRespostaForum object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AvaliacaoRespostaForumQuery A secondary query class using the current class as primary query
	 */
	public function useAvaliacaoRespostaForumQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAvaliacaoRespostaForum($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AvaliacaoRespostaForum', 'AvaliacaoRespostaForumQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     RespostaForum $respostaForum Object to remove from the list of results
	 *
	 * @return    RespostaForumQuery The current query, for fluid interface
	 */
	public function prune($respostaForum = null)
	{
		if ($respostaForum) {
			$this->addUsingAlias(RespostaForumPeer::ID, $respostaForum->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseRespostaForumQuery