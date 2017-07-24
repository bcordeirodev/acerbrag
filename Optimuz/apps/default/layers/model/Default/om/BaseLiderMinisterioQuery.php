<?php


/**
 * Base class that represents a query for the 'lider_ministerio' table.
 *
 * 
 *
 * @method     LiderMinisterioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     LiderMinisterioQuery orderByMinisterioId($order = Criteria::ASC) Order by the ministerio_id column
 * @method     LiderMinisterioQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method     LiderMinisterioQuery orderByCargo($order = Criteria::ASC) Order by the cargo column
 *
 * @method     LiderMinisterioQuery groupById() Group by the id column
 * @method     LiderMinisterioQuery groupByMinisterioId() Group by the ministerio_id column
 * @method     LiderMinisterioQuery groupByUsuarioId() Group by the usuario_id column
 * @method     LiderMinisterioQuery groupByCargo() Group by the cargo column
 *
 * @method     LiderMinisterioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     LiderMinisterioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     LiderMinisterioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     LiderMinisterioQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     LiderMinisterioQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     LiderMinisterioQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     LiderMinisterioQuery leftJoinMinisterio($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ministerio relation
 * @method     LiderMinisterioQuery rightJoinMinisterio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ministerio relation
 * @method     LiderMinisterioQuery innerJoinMinisterio($relationAlias = null) Adds a INNER JOIN clause to the query using the Ministerio relation
 *
 * @method     LiderMinisterio findOne(PropelPDO $con = null) Return the first LiderMinisterio matching the query
 * @method     LiderMinisterio findOneOrCreate(PropelPDO $con = null) Return the first LiderMinisterio matching the query, or a new LiderMinisterio object populated from the query conditions when no match is found
 *
 * @method     LiderMinisterio findOneById(int $id) Return the first LiderMinisterio filtered by the id column
 * @method     LiderMinisterio findOneByMinisterioId(int $ministerio_id) Return the first LiderMinisterio filtered by the ministerio_id column
 * @method     LiderMinisterio findOneByUsuarioId(int $usuario_id) Return the first LiderMinisterio filtered by the usuario_id column
 * @method     LiderMinisterio findOneByCargo(string $cargo) Return the first LiderMinisterio filtered by the cargo column
 *
 * @method     array findById(int $id) Return LiderMinisterio objects filtered by the id column
 * @method     array findByMinisterioId(int $ministerio_id) Return LiderMinisterio objects filtered by the ministerio_id column
 * @method     array findByUsuarioId(int $usuario_id) Return LiderMinisterio objects filtered by the usuario_id column
 * @method     array findByCargo(string $cargo) Return LiderMinisterio objects filtered by the cargo column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseLiderMinisterioQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseLiderMinisterioQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'LiderMinisterio', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new LiderMinisterioQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    LiderMinisterioQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof LiderMinisterioQuery) {
			return $criteria;
		}
		$query = new LiderMinisterioQuery();
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
	 * @return    LiderMinisterio|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = LiderMinisterioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(LiderMinisterioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    LiderMinisterio A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `MINISTERIO_ID`, `USUARIO_ID`, `CARGO` FROM `lider_ministerio` WHERE `ID` = :p0';
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
			$obj = new LiderMinisterio();
			$obj->hydrate($row);
			LiderMinisterioPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    LiderMinisterio|array|mixed the result, formatted by the current formatter
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
	 * @return    LiderMinisterioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(LiderMinisterioPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    LiderMinisterioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(LiderMinisterioPeer::ID, $keys, Criteria::IN);
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
	 * @return    LiderMinisterioQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(LiderMinisterioPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the ministerio_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMinisterioId(1234); // WHERE ministerio_id = 1234
	 * $query->filterByMinisterioId(array(12, 34)); // WHERE ministerio_id IN (12, 34)
	 * $query->filterByMinisterioId(array('min' => 12)); // WHERE ministerio_id > 12
	 * </code>
	 *
	 * @see       filterByMinisterio()
	 *
	 * @param     mixed $ministerioId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LiderMinisterioQuery The current query, for fluid interface
	 */
	public function filterByMinisterioId($ministerioId = null, $comparison = null)
	{
		if (is_array($ministerioId)) {
			$useMinMax = false;
			if (isset($ministerioId['min'])) {
				$this->addUsingAlias(LiderMinisterioPeer::MINISTERIO_ID, $ministerioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($ministerioId['max'])) {
				$this->addUsingAlias(LiderMinisterioPeer::MINISTERIO_ID, $ministerioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LiderMinisterioPeer::MINISTERIO_ID, $ministerioId, $comparison);
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
	 * @return    LiderMinisterioQuery The current query, for fluid interface
	 */
	public function filterByUsuarioId($usuarioId = null, $comparison = null)
	{
		if (is_array($usuarioId)) {
			$useMinMax = false;
			if (isset($usuarioId['min'])) {
				$this->addUsingAlias(LiderMinisterioPeer::USUARIO_ID, $usuarioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($usuarioId['max'])) {
				$this->addUsingAlias(LiderMinisterioPeer::USUARIO_ID, $usuarioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LiderMinisterioPeer::USUARIO_ID, $usuarioId, $comparison);
	}

	/**
	 * Filter the query on the cargo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCargo('fooValue');   // WHERE cargo = 'fooValue'
	 * $query->filterByCargo('%fooValue%'); // WHERE cargo LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $cargo The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LiderMinisterioQuery The current query, for fluid interface
	 */
	public function filterByCargo($cargo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($cargo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $cargo)) {
				$cargo = str_replace('*', '%', $cargo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(LiderMinisterioPeer::CARGO, $cargo, $comparison);
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LiderMinisterioQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(LiderMinisterioPeer::USUARIO_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(LiderMinisterioPeer::USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    LiderMinisterioQuery The current query, for fluid interface
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
	 * Filter the query by a related Ministerio object
	 *
	 * @param     Ministerio|PropelCollection $ministerio The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LiderMinisterioQuery The current query, for fluid interface
	 */
	public function filterByMinisterio($ministerio, $comparison = null)
	{
		if ($ministerio instanceof Ministerio) {
			return $this
				->addUsingAlias(LiderMinisterioPeer::MINISTERIO_ID, $ministerio->getId(), $comparison);
		} elseif ($ministerio instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(LiderMinisterioPeer::MINISTERIO_ID, $ministerio->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByMinisterio() only accepts arguments of type Ministerio or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Ministerio relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LiderMinisterioQuery The current query, for fluid interface
	 */
	public function joinMinisterio($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Ministerio');

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
			$this->addJoinObject($join, 'Ministerio');
		}

		return $this;
	}

	/**
	 * Use the Ministerio relation Ministerio object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MinisterioQuery A secondary query class using the current class as primary query
	 */
	public function useMinisterioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinMinisterio($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Ministerio', 'MinisterioQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     LiderMinisterio $liderMinisterio Object to remove from the list of results
	 *
	 * @return    LiderMinisterioQuery The current query, for fluid interface
	 */
	public function prune($liderMinisterio = null)
	{
		if ($liderMinisterio) {
			$this->addUsingAlias(LiderMinisterioPeer::ID, $liderMinisterio->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseLiderMinisterioQuery