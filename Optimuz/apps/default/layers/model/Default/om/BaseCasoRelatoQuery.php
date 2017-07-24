<?php


/**
 * Base class that represents a query for the 'caso_relato' table.
 *
 * 
 *
 * @method     CasoRelatoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CasoRelatoQuery orderByIdCaso($order = Criteria::ASC) Order by the id_caso column
 * @method     CasoRelatoQuery orderByIdRelato($order = Criteria::ASC) Order by the id_relato column
 *
 * @method     CasoRelatoQuery groupById() Group by the id column
 * @method     CasoRelatoQuery groupByIdCaso() Group by the id_caso column
 * @method     CasoRelatoQuery groupByIdRelato() Group by the id_relato column
 *
 * @method     CasoRelatoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CasoRelatoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CasoRelatoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CasoRelatoQuery leftJoinCaso($relationAlias = null) Adds a LEFT JOIN clause to the query using the Caso relation
 * @method     CasoRelatoQuery rightJoinCaso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Caso relation
 * @method     CasoRelatoQuery innerJoinCaso($relationAlias = null) Adds a INNER JOIN clause to the query using the Caso relation
 *
 * @method     CasoRelatoQuery leftJoinRelato($relationAlias = null) Adds a LEFT JOIN clause to the query using the Relato relation
 * @method     CasoRelatoQuery rightJoinRelato($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Relato relation
 * @method     CasoRelatoQuery innerJoinRelato($relationAlias = null) Adds a INNER JOIN clause to the query using the Relato relation
 *
 * @method     CasoRelato findOne(PropelPDO $con = null) Return the first CasoRelato matching the query
 * @method     CasoRelato findOneOrCreate(PropelPDO $con = null) Return the first CasoRelato matching the query, or a new CasoRelato object populated from the query conditions when no match is found
 *
 * @method     CasoRelato findOneById(int $id) Return the first CasoRelato filtered by the id column
 * @method     CasoRelato findOneByIdCaso(int $id_caso) Return the first CasoRelato filtered by the id_caso column
 * @method     CasoRelato findOneByIdRelato(int $id_relato) Return the first CasoRelato filtered by the id_relato column
 *
 * @method     array findById(int $id) Return CasoRelato objects filtered by the id column
 * @method     array findByIdCaso(int $id_caso) Return CasoRelato objects filtered by the id_caso column
 * @method     array findByIdRelato(int $id_relato) Return CasoRelato objects filtered by the id_relato column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseCasoRelatoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseCasoRelatoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'CasoRelato', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CasoRelatoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CasoRelatoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CasoRelatoQuery) {
			return $criteria;
		}
		$query = new CasoRelatoQuery();
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
	 * @return    CasoRelato|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = CasoRelatoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(CasoRelatoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    CasoRelato A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ID_CASO`, `ID_RELATO` FROM `caso_relato` WHERE `ID` = :p0';
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
			$obj = new CasoRelato();
			$obj->hydrate($row);
			CasoRelatoPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    CasoRelato|array|mixed the result, formatted by the current formatter
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
	 * @return    CasoRelatoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CasoRelatoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CasoRelatoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CasoRelatoPeer::ID, $keys, Criteria::IN);
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
	 * @return    CasoRelatoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CasoRelatoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_caso column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdCaso(1234); // WHERE id_caso = 1234
	 * $query->filterByIdCaso(array(12, 34)); // WHERE id_caso IN (12, 34)
	 * $query->filterByIdCaso(array('min' => 12)); // WHERE id_caso > 12
	 * </code>
	 *
	 * @see       filterByCaso()
	 *
	 * @param     mixed $idCaso The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CasoRelatoQuery The current query, for fluid interface
	 */
	public function filterByIdCaso($idCaso = null, $comparison = null)
	{
		if (is_array($idCaso)) {
			$useMinMax = false;
			if (isset($idCaso['min'])) {
				$this->addUsingAlias(CasoRelatoPeer::ID_CASO, $idCaso['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idCaso['max'])) {
				$this->addUsingAlias(CasoRelatoPeer::ID_CASO, $idCaso['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CasoRelatoPeer::ID_CASO, $idCaso, $comparison);
	}

	/**
	 * Filter the query on the id_relato column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdRelato(1234); // WHERE id_relato = 1234
	 * $query->filterByIdRelato(array(12, 34)); // WHERE id_relato IN (12, 34)
	 * $query->filterByIdRelato(array('min' => 12)); // WHERE id_relato > 12
	 * </code>
	 *
	 * @see       filterByRelato()
	 *
	 * @param     mixed $idRelato The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CasoRelatoQuery The current query, for fluid interface
	 */
	public function filterByIdRelato($idRelato = null, $comparison = null)
	{
		if (is_array($idRelato)) {
			$useMinMax = false;
			if (isset($idRelato['min'])) {
				$this->addUsingAlias(CasoRelatoPeer::ID_RELATO, $idRelato['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idRelato['max'])) {
				$this->addUsingAlias(CasoRelatoPeer::ID_RELATO, $idRelato['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CasoRelatoPeer::ID_RELATO, $idRelato, $comparison);
	}

	/**
	 * Filter the query by a related Caso object
	 *
	 * @param     Caso|PropelCollection $caso The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CasoRelatoQuery The current query, for fluid interface
	 */
	public function filterByCaso($caso, $comparison = null)
	{
		if ($caso instanceof Caso) {
			return $this
				->addUsingAlias(CasoRelatoPeer::ID_CASO, $caso->getId(), $comparison);
		} elseif ($caso instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CasoRelatoPeer::ID_CASO, $caso->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    CasoRelatoQuery The current query, for fluid interface
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
	 * Filter the query by a related Relato object
	 *
	 * @param     Relato|PropelCollection $relato The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CasoRelatoQuery The current query, for fluid interface
	 */
	public function filterByRelato($relato, $comparison = null)
	{
		if ($relato instanceof Relato) {
			return $this
				->addUsingAlias(CasoRelatoPeer::ID_RELATO, $relato->getId(), $comparison);
		} elseif ($relato instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CasoRelatoPeer::ID_RELATO, $relato->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByRelato() only accepts arguments of type Relato or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Relato relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CasoRelatoQuery The current query, for fluid interface
	 */
	public function joinRelato($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Relato');

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
			$this->addJoinObject($join, 'Relato');
		}

		return $this;
	}

	/**
	 * Use the Relato relation Relato object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RelatoQuery A secondary query class using the current class as primary query
	 */
	public function useRelatoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinRelato($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Relato', 'RelatoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     CasoRelato $casoRelato Object to remove from the list of results
	 *
	 * @return    CasoRelatoQuery The current query, for fluid interface
	 */
	public function prune($casoRelato = null)
	{
		if ($casoRelato) {
			$this->addUsingAlias(CasoRelatoPeer::ID, $casoRelato->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseCasoRelatoQuery