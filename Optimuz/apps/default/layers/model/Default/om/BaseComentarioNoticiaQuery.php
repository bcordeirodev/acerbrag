<?php


/**
 * Base class that represents a query for the 'comentario_noticia' table.
 *
 * 
 *
 * @method     ComentarioNoticiaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ComentarioNoticiaQuery orderByNoticiaId($order = Criteria::ASC) Order by the noticia_id column
 * @method     ComentarioNoticiaQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method     ComentarioNoticiaQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 * @method     ComentarioNoticiaQuery orderByDataComentario($order = Criteria::ASC) Order by the data_comentario column
 *
 * @method     ComentarioNoticiaQuery groupById() Group by the id column
 * @method     ComentarioNoticiaQuery groupByNoticiaId() Group by the noticia_id column
 * @method     ComentarioNoticiaQuery groupByUsuarioId() Group by the usuario_id column
 * @method     ComentarioNoticiaQuery groupByDescricao() Group by the descricao column
 * @method     ComentarioNoticiaQuery groupByDataComentario() Group by the data_comentario column
 *
 * @method     ComentarioNoticiaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ComentarioNoticiaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ComentarioNoticiaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ComentarioNoticiaQuery leftJoinNoticia($relationAlias = null) Adds a LEFT JOIN clause to the query using the Noticia relation
 * @method     ComentarioNoticiaQuery rightJoinNoticia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Noticia relation
 * @method     ComentarioNoticiaQuery innerJoinNoticia($relationAlias = null) Adds a INNER JOIN clause to the query using the Noticia relation
 *
 * @method     ComentarioNoticiaQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     ComentarioNoticiaQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     ComentarioNoticiaQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     ComentarioNoticia findOne(PropelPDO $con = null) Return the first ComentarioNoticia matching the query
 * @method     ComentarioNoticia findOneOrCreate(PropelPDO $con = null) Return the first ComentarioNoticia matching the query, or a new ComentarioNoticia object populated from the query conditions when no match is found
 *
 * @method     ComentarioNoticia findOneById(int $id) Return the first ComentarioNoticia filtered by the id column
 * @method     ComentarioNoticia findOneByNoticiaId(int $noticia_id) Return the first ComentarioNoticia filtered by the noticia_id column
 * @method     ComentarioNoticia findOneByUsuarioId(int $usuario_id) Return the first ComentarioNoticia filtered by the usuario_id column
 * @method     ComentarioNoticia findOneByDescricao(string $descricao) Return the first ComentarioNoticia filtered by the descricao column
 * @method     ComentarioNoticia findOneByDataComentario(string $data_comentario) Return the first ComentarioNoticia filtered by the data_comentario column
 *
 * @method     array findById(int $id) Return ComentarioNoticia objects filtered by the id column
 * @method     array findByNoticiaId(int $noticia_id) Return ComentarioNoticia objects filtered by the noticia_id column
 * @method     array findByUsuarioId(int $usuario_id) Return ComentarioNoticia objects filtered by the usuario_id column
 * @method     array findByDescricao(string $descricao) Return ComentarioNoticia objects filtered by the descricao column
 * @method     array findByDataComentario(string $data_comentario) Return ComentarioNoticia objects filtered by the data_comentario column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseComentarioNoticiaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseComentarioNoticiaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'ComentarioNoticia', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ComentarioNoticiaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ComentarioNoticiaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ComentarioNoticiaQuery) {
			return $criteria;
		}
		$query = new ComentarioNoticiaQuery();
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
	 * @return    ComentarioNoticia|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ComentarioNoticiaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ComentarioNoticiaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    ComentarioNoticia A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NOTICIA_ID`, `USUARIO_ID`, `DESCRICAO`, `DATA_COMENTARIO` FROM `comentario_noticia` WHERE `ID` = :p0';
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
			$obj = new ComentarioNoticia();
			$obj->hydrate($row);
			ComentarioNoticiaPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    ComentarioNoticia|array|mixed the result, formatted by the current formatter
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
	 * @return    ComentarioNoticiaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ComentarioNoticiaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ComentarioNoticiaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ComentarioNoticiaPeer::ID, $keys, Criteria::IN);
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
	 * @return    ComentarioNoticiaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ComentarioNoticiaPeer::ID, $id, $comparison);
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
	 * @return    ComentarioNoticiaQuery The current query, for fluid interface
	 */
	public function filterByNoticiaId($noticiaId = null, $comparison = null)
	{
		if (is_array($noticiaId)) {
			$useMinMax = false;
			if (isset($noticiaId['min'])) {
				$this->addUsingAlias(ComentarioNoticiaPeer::NOTICIA_ID, $noticiaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($noticiaId['max'])) {
				$this->addUsingAlias(ComentarioNoticiaPeer::NOTICIA_ID, $noticiaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ComentarioNoticiaPeer::NOTICIA_ID, $noticiaId, $comparison);
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
	 * @return    ComentarioNoticiaQuery The current query, for fluid interface
	 */
	public function filterByUsuarioId($usuarioId = null, $comparison = null)
	{
		if (is_array($usuarioId)) {
			$useMinMax = false;
			if (isset($usuarioId['min'])) {
				$this->addUsingAlias(ComentarioNoticiaPeer::USUARIO_ID, $usuarioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($usuarioId['max'])) {
				$this->addUsingAlias(ComentarioNoticiaPeer::USUARIO_ID, $usuarioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ComentarioNoticiaPeer::USUARIO_ID, $usuarioId, $comparison);
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
	 * @return    ComentarioNoticiaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ComentarioNoticiaPeer::DESCRICAO, $descricao, $comparison);
	}

	/**
	 * Filter the query on the data_comentario column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataComentario('2011-03-14'); // WHERE data_comentario = '2011-03-14'
	 * $query->filterByDataComentario('now'); // WHERE data_comentario = '2011-03-14'
	 * $query->filterByDataComentario(array('max' => 'yesterday')); // WHERE data_comentario > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataComentario The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ComentarioNoticiaQuery The current query, for fluid interface
	 */
	public function filterByDataComentario($dataComentario = null, $comparison = null)
	{
		if (is_array($dataComentario)) {
			$useMinMax = false;
			if (isset($dataComentario['min'])) {
				$this->addUsingAlias(ComentarioNoticiaPeer::DATA_COMENTARIO, $dataComentario['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataComentario['max'])) {
				$this->addUsingAlias(ComentarioNoticiaPeer::DATA_COMENTARIO, $dataComentario['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ComentarioNoticiaPeer::DATA_COMENTARIO, $dataComentario, $comparison);
	}

	/**
	 * Filter the query by a related Noticia object
	 *
	 * @param     Noticia|PropelCollection $noticia The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ComentarioNoticiaQuery The current query, for fluid interface
	 */
	public function filterByNoticia($noticia, $comparison = null)
	{
		if ($noticia instanceof Noticia) {
			return $this
				->addUsingAlias(ComentarioNoticiaPeer::NOTICIA_ID, $noticia->getId(), $comparison);
		} elseif ($noticia instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ComentarioNoticiaPeer::NOTICIA_ID, $noticia->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    ComentarioNoticiaQuery The current query, for fluid interface
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
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ComentarioNoticiaQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(ComentarioNoticiaPeer::USUARIO_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ComentarioNoticiaPeer::USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    ComentarioNoticiaQuery The current query, for fluid interface
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
	 * @param     ComentarioNoticia $comentarioNoticia Object to remove from the list of results
	 *
	 * @return    ComentarioNoticiaQuery The current query, for fluid interface
	 */
	public function prune($comentarioNoticia = null)
	{
		if ($comentarioNoticia) {
			$this->addUsingAlias(ComentarioNoticiaPeer::ID, $comentarioNoticia->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseComentarioNoticiaQuery