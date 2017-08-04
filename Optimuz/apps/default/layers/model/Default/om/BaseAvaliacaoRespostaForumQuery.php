<?php


/**
 * Base class that represents a query for the 'avaliacao_resposta_forum' table.
 *
 * 
 *
 * @method     AvaliacaoRespostaForumQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AvaliacaoRespostaForumQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method     AvaliacaoRespostaForumQuery orderByRespostaForumId($order = Criteria::ASC) Order by the resposta_forum_id column
 * @method     AvaliacaoRespostaForumQuery orderByDataAvaliacao($order = Criteria::ASC) Order by the data_avaliacao column
 * @method     AvaliacaoRespostaForumQuery orderByNota($order = Criteria::ASC) Order by the nota column
 *
 * @method     AvaliacaoRespostaForumQuery groupById() Group by the id column
 * @method     AvaliacaoRespostaForumQuery groupByUsuarioId() Group by the usuario_id column
 * @method     AvaliacaoRespostaForumQuery groupByRespostaForumId() Group by the resposta_forum_id column
 * @method     AvaliacaoRespostaForumQuery groupByDataAvaliacao() Group by the data_avaliacao column
 * @method     AvaliacaoRespostaForumQuery groupByNota() Group by the nota column
 *
 * @method     AvaliacaoRespostaForumQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AvaliacaoRespostaForumQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AvaliacaoRespostaForumQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AvaliacaoRespostaForumQuery leftJoinRespostaForum($relationAlias = null) Adds a LEFT JOIN clause to the query using the RespostaForum relation
 * @method     AvaliacaoRespostaForumQuery rightJoinRespostaForum($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RespostaForum relation
 * @method     AvaliacaoRespostaForumQuery innerJoinRespostaForum($relationAlias = null) Adds a INNER JOIN clause to the query using the RespostaForum relation
 *
 * @method     AvaliacaoRespostaForumQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     AvaliacaoRespostaForumQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     AvaliacaoRespostaForumQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     AvaliacaoRespostaForum findOne(PropelPDO $con = null) Return the first AvaliacaoRespostaForum matching the query
 * @method     AvaliacaoRespostaForum findOneOrCreate(PropelPDO $con = null) Return the first AvaliacaoRespostaForum matching the query, or a new AvaliacaoRespostaForum object populated from the query conditions when no match is found
 *
 * @method     AvaliacaoRespostaForum findOneById(int $id) Return the first AvaliacaoRespostaForum filtered by the id column
 * @method     AvaliacaoRespostaForum findOneByUsuarioId(int $usuario_id) Return the first AvaliacaoRespostaForum filtered by the usuario_id column
 * @method     AvaliacaoRespostaForum findOneByRespostaForumId(int $resposta_forum_id) Return the first AvaliacaoRespostaForum filtered by the resposta_forum_id column
 * @method     AvaliacaoRespostaForum findOneByDataAvaliacao(string $data_avaliacao) Return the first AvaliacaoRespostaForum filtered by the data_avaliacao column
 * @method     AvaliacaoRespostaForum findOneByNota(string $nota) Return the first AvaliacaoRespostaForum filtered by the nota column
 *
 * @method     array findById(int $id) Return AvaliacaoRespostaForum objects filtered by the id column
 * @method     array findByUsuarioId(int $usuario_id) Return AvaliacaoRespostaForum objects filtered by the usuario_id column
 * @method     array findByRespostaForumId(int $resposta_forum_id) Return AvaliacaoRespostaForum objects filtered by the resposta_forum_id column
 * @method     array findByDataAvaliacao(string $data_avaliacao) Return AvaliacaoRespostaForum objects filtered by the data_avaliacao column
 * @method     array findByNota(string $nota) Return AvaliacaoRespostaForum objects filtered by the nota column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseAvaliacaoRespostaForumQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseAvaliacaoRespostaForumQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'AvaliacaoRespostaForum', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AvaliacaoRespostaForumQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AvaliacaoRespostaForumQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AvaliacaoRespostaForumQuery) {
			return $criteria;
		}
		$query = new AvaliacaoRespostaForumQuery();
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
	 * @return    AvaliacaoRespostaForum|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = AvaliacaoRespostaForumPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(AvaliacaoRespostaForumPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    AvaliacaoRespostaForum A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `USUARIO_ID`, `RESPOSTA_FORUM_ID`, `DATA_AVALIACAO`, `NOTA` FROM `avaliacao_resposta_forum` WHERE `ID` = :p0';
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
			$obj = new AvaliacaoRespostaForum();
			$obj->hydrate($row);
			AvaliacaoRespostaForumPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    AvaliacaoRespostaForum|array|mixed the result, formatted by the current formatter
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
	 * @return    AvaliacaoRespostaForumQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AvaliacaoRespostaForumPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AvaliacaoRespostaForumQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AvaliacaoRespostaForumPeer::ID, $keys, Criteria::IN);
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
	 * @return    AvaliacaoRespostaForumQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AvaliacaoRespostaForumPeer::ID, $id, $comparison);
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
	 * @return    AvaliacaoRespostaForumQuery The current query, for fluid interface
	 */
	public function filterByUsuarioId($usuarioId = null, $comparison = null)
	{
		if (is_array($usuarioId)) {
			$useMinMax = false;
			if (isset($usuarioId['min'])) {
				$this->addUsingAlias(AvaliacaoRespostaForumPeer::USUARIO_ID, $usuarioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($usuarioId['max'])) {
				$this->addUsingAlias(AvaliacaoRespostaForumPeer::USUARIO_ID, $usuarioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AvaliacaoRespostaForumPeer::USUARIO_ID, $usuarioId, $comparison);
	}

	/**
	 * Filter the query on the resposta_forum_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRespostaForumId(1234); // WHERE resposta_forum_id = 1234
	 * $query->filterByRespostaForumId(array(12, 34)); // WHERE resposta_forum_id IN (12, 34)
	 * $query->filterByRespostaForumId(array('min' => 12)); // WHERE resposta_forum_id > 12
	 * </code>
	 *
	 * @see       filterByRespostaForum()
	 *
	 * @param     mixed $respostaForumId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AvaliacaoRespostaForumQuery The current query, for fluid interface
	 */
	public function filterByRespostaForumId($respostaForumId = null, $comparison = null)
	{
		if (is_array($respostaForumId)) {
			$useMinMax = false;
			if (isset($respostaForumId['min'])) {
				$this->addUsingAlias(AvaliacaoRespostaForumPeer::RESPOSTA_FORUM_ID, $respostaForumId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($respostaForumId['max'])) {
				$this->addUsingAlias(AvaliacaoRespostaForumPeer::RESPOSTA_FORUM_ID, $respostaForumId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AvaliacaoRespostaForumPeer::RESPOSTA_FORUM_ID, $respostaForumId, $comparison);
	}

	/**
	 * Filter the query on the data_avaliacao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataAvaliacao('2011-03-14'); // WHERE data_avaliacao = '2011-03-14'
	 * $query->filterByDataAvaliacao('now'); // WHERE data_avaliacao = '2011-03-14'
	 * $query->filterByDataAvaliacao(array('max' => 'yesterday')); // WHERE data_avaliacao > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataAvaliacao The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AvaliacaoRespostaForumQuery The current query, for fluid interface
	 */
	public function filterByDataAvaliacao($dataAvaliacao = null, $comparison = null)
	{
		if (is_array($dataAvaliacao)) {
			$useMinMax = false;
			if (isset($dataAvaliacao['min'])) {
				$this->addUsingAlias(AvaliacaoRespostaForumPeer::DATA_AVALIACAO, $dataAvaliacao['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataAvaliacao['max'])) {
				$this->addUsingAlias(AvaliacaoRespostaForumPeer::DATA_AVALIACAO, $dataAvaliacao['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AvaliacaoRespostaForumPeer::DATA_AVALIACAO, $dataAvaliacao, $comparison);
	}

	/**
	 * Filter the query on the nota column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNota('fooValue');   // WHERE nota = 'fooValue'
	 * $query->filterByNota('%fooValue%'); // WHERE nota LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nota The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AvaliacaoRespostaForumQuery The current query, for fluid interface
	 */
	public function filterByNota($nota = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nota)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nota)) {
				$nota = str_replace('*', '%', $nota);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AvaliacaoRespostaForumPeer::NOTA, $nota, $comparison);
	}

	/**
	 * Filter the query by a related RespostaForum object
	 *
	 * @param     RespostaForum|PropelCollection $respostaForum The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AvaliacaoRespostaForumQuery The current query, for fluid interface
	 */
	public function filterByRespostaForum($respostaForum, $comparison = null)
	{
		if ($respostaForum instanceof RespostaForum) {
			return $this
				->addUsingAlias(AvaliacaoRespostaForumPeer::RESPOSTA_FORUM_ID, $respostaForum->getId(), $comparison);
		} elseif ($respostaForum instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AvaliacaoRespostaForumPeer::RESPOSTA_FORUM_ID, $respostaForum->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    AvaliacaoRespostaForumQuery The current query, for fluid interface
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
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AvaliacaoRespostaForumQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(AvaliacaoRespostaForumPeer::USUARIO_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AvaliacaoRespostaForumPeer::USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    AvaliacaoRespostaForumQuery The current query, for fluid interface
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
	 * @param     AvaliacaoRespostaForum $avaliacaoRespostaForum Object to remove from the list of results
	 *
	 * @return    AvaliacaoRespostaForumQuery The current query, for fluid interface
	 */
	public function prune($avaliacaoRespostaForum = null)
	{
		if ($avaliacaoRespostaForum) {
			$this->addUsingAlias(AvaliacaoRespostaForumPeer::ID, $avaliacaoRespostaForum->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseAvaliacaoRespostaForumQuery