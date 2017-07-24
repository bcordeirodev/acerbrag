<?php


/**
 * Base class that represents a query for the 'advogado_contato' table.
 *
 * 
 *
 * @method     AdvogadoContatoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AdvogadoContatoQuery orderByIdAdvogado($order = Criteria::ASC) Order by the id_advogado column
 * @method     AdvogadoContatoQuery orderByIdContato($order = Criteria::ASC) Order by the id_contato column
 *
 * @method     AdvogadoContatoQuery groupById() Group by the id column
 * @method     AdvogadoContatoQuery groupByIdAdvogado() Group by the id_advogado column
 * @method     AdvogadoContatoQuery groupByIdContato() Group by the id_contato column
 *
 * @method     AdvogadoContatoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AdvogadoContatoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AdvogadoContatoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AdvogadoContatoQuery leftJoinAdvogado($relationAlias = null) Adds a LEFT JOIN clause to the query using the Advogado relation
 * @method     AdvogadoContatoQuery rightJoinAdvogado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Advogado relation
 * @method     AdvogadoContatoQuery innerJoinAdvogado($relationAlias = null) Adds a INNER JOIN clause to the query using the Advogado relation
 *
 * @method     AdvogadoContatoQuery leftJoinContato($relationAlias = null) Adds a LEFT JOIN clause to the query using the Contato relation
 * @method     AdvogadoContatoQuery rightJoinContato($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Contato relation
 * @method     AdvogadoContatoQuery innerJoinContato($relationAlias = null) Adds a INNER JOIN clause to the query using the Contato relation
 *
 * @method     AdvogadoContato findOne(PropelPDO $con = null) Return the first AdvogadoContato matching the query
 * @method     AdvogadoContato findOneOrCreate(PropelPDO $con = null) Return the first AdvogadoContato matching the query, or a new AdvogadoContato object populated from the query conditions when no match is found
 *
 * @method     AdvogadoContato findOneById(int $id) Return the first AdvogadoContato filtered by the id column
 * @method     AdvogadoContato findOneByIdAdvogado(int $id_advogado) Return the first AdvogadoContato filtered by the id_advogado column
 * @method     AdvogadoContato findOneByIdContato(int $id_contato) Return the first AdvogadoContato filtered by the id_contato column
 *
 * @method     array findById(int $id) Return AdvogadoContato objects filtered by the id column
 * @method     array findByIdAdvogado(int $id_advogado) Return AdvogadoContato objects filtered by the id_advogado column
 * @method     array findByIdContato(int $id_contato) Return AdvogadoContato objects filtered by the id_contato column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseAdvogadoContatoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseAdvogadoContatoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'AdvogadoContato', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AdvogadoContatoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AdvogadoContatoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AdvogadoContatoQuery) {
			return $criteria;
		}
		$query = new AdvogadoContatoQuery();
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
	 * @return    AdvogadoContato|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = AdvogadoContatoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(AdvogadoContatoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    AdvogadoContato A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ID_ADVOGADO`, `ID_CONTATO` FROM `advogado_contato` WHERE `ID` = :p0';
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
			$obj = new AdvogadoContato();
			$obj->hydrate($row);
			AdvogadoContatoPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    AdvogadoContato|array|mixed the result, formatted by the current formatter
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
	 * @return    AdvogadoContatoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AdvogadoContatoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AdvogadoContatoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AdvogadoContatoPeer::ID, $keys, Criteria::IN);
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
	 * @return    AdvogadoContatoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AdvogadoContatoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_advogado column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdAdvogado(1234); // WHERE id_advogado = 1234
	 * $query->filterByIdAdvogado(array(12, 34)); // WHERE id_advogado IN (12, 34)
	 * $query->filterByIdAdvogado(array('min' => 12)); // WHERE id_advogado > 12
	 * </code>
	 *
	 * @see       filterByAdvogado()
	 *
	 * @param     mixed $idAdvogado The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoContatoQuery The current query, for fluid interface
	 */
	public function filterByIdAdvogado($idAdvogado = null, $comparison = null)
	{
		if (is_array($idAdvogado)) {
			$useMinMax = false;
			if (isset($idAdvogado['min'])) {
				$this->addUsingAlias(AdvogadoContatoPeer::ID_ADVOGADO, $idAdvogado['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idAdvogado['max'])) {
				$this->addUsingAlias(AdvogadoContatoPeer::ID_ADVOGADO, $idAdvogado['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdvogadoContatoPeer::ID_ADVOGADO, $idAdvogado, $comparison);
	}

	/**
	 * Filter the query on the id_contato column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdContato(1234); // WHERE id_contato = 1234
	 * $query->filterByIdContato(array(12, 34)); // WHERE id_contato IN (12, 34)
	 * $query->filterByIdContato(array('min' => 12)); // WHERE id_contato > 12
	 * </code>
	 *
	 * @see       filterByContato()
	 *
	 * @param     mixed $idContato The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoContatoQuery The current query, for fluid interface
	 */
	public function filterByIdContato($idContato = null, $comparison = null)
	{
		if (is_array($idContato)) {
			$useMinMax = false;
			if (isset($idContato['min'])) {
				$this->addUsingAlias(AdvogadoContatoPeer::ID_CONTATO, $idContato['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idContato['max'])) {
				$this->addUsingAlias(AdvogadoContatoPeer::ID_CONTATO, $idContato['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdvogadoContatoPeer::ID_CONTATO, $idContato, $comparison);
	}

	/**
	 * Filter the query by a related Advogado object
	 *
	 * @param     Advogado|PropelCollection $advogado The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoContatoQuery The current query, for fluid interface
	 */
	public function filterByAdvogado($advogado, $comparison = null)
	{
		if ($advogado instanceof Advogado) {
			return $this
				->addUsingAlias(AdvogadoContatoPeer::ID_ADVOGADO, $advogado->getId(), $comparison);
		} elseif ($advogado instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AdvogadoContatoPeer::ID_ADVOGADO, $advogado->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    AdvogadoContatoQuery The current query, for fluid interface
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
	 * Filter the query by a related Contato object
	 *
	 * @param     Contato|PropelCollection $contato The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoContatoQuery The current query, for fluid interface
	 */
	public function filterByContato($contato, $comparison = null)
	{
		if ($contato instanceof Contato) {
			return $this
				->addUsingAlias(AdvogadoContatoPeer::ID_CONTATO, $contato->getId(), $comparison);
		} elseif ($contato instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AdvogadoContatoPeer::ID_CONTATO, $contato->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByContato() only accepts arguments of type Contato or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Contato relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdvogadoContatoQuery The current query, for fluid interface
	 */
	public function joinContato($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Contato');

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
			$this->addJoinObject($join, 'Contato');
		}

		return $this;
	}

	/**
	 * Use the Contato relation Contato object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ContatoQuery A secondary query class using the current class as primary query
	 */
	public function useContatoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinContato($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Contato', 'ContatoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     AdvogadoContato $advogadoContato Object to remove from the list of results
	 *
	 * @return    AdvogadoContatoQuery The current query, for fluid interface
	 */
	public function prune($advogadoContato = null)
	{
		if ($advogadoContato) {
			$this->addUsingAlias(AdvogadoContatoPeer::ID, $advogadoContato->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseAdvogadoContatoQuery