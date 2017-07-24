<?php


/**
 * Base class that represents a query for the 'advogado_inscricao_oab' table.
 *
 * 
 *
 * @method     AdvogadoInscricaoOabQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AdvogadoInscricaoOabQuery orderByAdvogadoId($order = Criteria::ASC) Order by the advogado_id column
 * @method     AdvogadoInscricaoOabQuery orderByUfId($order = Criteria::ASC) Order by the uf_id column
 * @method     AdvogadoInscricaoOabQuery orderByNumeroInscricao($order = Criteria::ASC) Order by the numero_inscricao column
 *
 * @method     AdvogadoInscricaoOabQuery groupById() Group by the id column
 * @method     AdvogadoInscricaoOabQuery groupByAdvogadoId() Group by the advogado_id column
 * @method     AdvogadoInscricaoOabQuery groupByUfId() Group by the uf_id column
 * @method     AdvogadoInscricaoOabQuery groupByNumeroInscricao() Group by the numero_inscricao column
 *
 * @method     AdvogadoInscricaoOabQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AdvogadoInscricaoOabQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AdvogadoInscricaoOabQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AdvogadoInscricaoOabQuery leftJoinAdvogado($relationAlias = null) Adds a LEFT JOIN clause to the query using the Advogado relation
 * @method     AdvogadoInscricaoOabQuery rightJoinAdvogado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Advogado relation
 * @method     AdvogadoInscricaoOabQuery innerJoinAdvogado($relationAlias = null) Adds a INNER JOIN clause to the query using the Advogado relation
 *
 * @method     AdvogadoInscricaoOabQuery leftJoinUf($relationAlias = null) Adds a LEFT JOIN clause to the query using the Uf relation
 * @method     AdvogadoInscricaoOabQuery rightJoinUf($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Uf relation
 * @method     AdvogadoInscricaoOabQuery innerJoinUf($relationAlias = null) Adds a INNER JOIN clause to the query using the Uf relation
 *
 * @method     AdvogadoInscricaoOab findOne(PropelPDO $con = null) Return the first AdvogadoInscricaoOab matching the query
 * @method     AdvogadoInscricaoOab findOneOrCreate(PropelPDO $con = null) Return the first AdvogadoInscricaoOab matching the query, or a new AdvogadoInscricaoOab object populated from the query conditions when no match is found
 *
 * @method     AdvogadoInscricaoOab findOneById(int $id) Return the first AdvogadoInscricaoOab filtered by the id column
 * @method     AdvogadoInscricaoOab findOneByAdvogadoId(int $advogado_id) Return the first AdvogadoInscricaoOab filtered by the advogado_id column
 * @method     AdvogadoInscricaoOab findOneByUfId(int $uf_id) Return the first AdvogadoInscricaoOab filtered by the uf_id column
 * @method     AdvogadoInscricaoOab findOneByNumeroInscricao(string $numero_inscricao) Return the first AdvogadoInscricaoOab filtered by the numero_inscricao column
 *
 * @method     array findById(int $id) Return AdvogadoInscricaoOab objects filtered by the id column
 * @method     array findByAdvogadoId(int $advogado_id) Return AdvogadoInscricaoOab objects filtered by the advogado_id column
 * @method     array findByUfId(int $uf_id) Return AdvogadoInscricaoOab objects filtered by the uf_id column
 * @method     array findByNumeroInscricao(string $numero_inscricao) Return AdvogadoInscricaoOab objects filtered by the numero_inscricao column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseAdvogadoInscricaoOabQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseAdvogadoInscricaoOabQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'AdvogadoInscricaoOab', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AdvogadoInscricaoOabQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AdvogadoInscricaoOabQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AdvogadoInscricaoOabQuery) {
			return $criteria;
		}
		$query = new AdvogadoInscricaoOabQuery();
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
	 * @return    AdvogadoInscricaoOab|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = AdvogadoInscricaoOabPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(AdvogadoInscricaoOabPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    AdvogadoInscricaoOab A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ADVOGADO_ID`, `UF_ID`, `NUMERO_INSCRICAO` FROM `advogado_inscricao_oab` WHERE `ID` = :p0';
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
			$obj = new AdvogadoInscricaoOab();
			$obj->hydrate($row);
			AdvogadoInscricaoOabPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    AdvogadoInscricaoOab|array|mixed the result, formatted by the current formatter
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
	 * @return    AdvogadoInscricaoOabQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AdvogadoInscricaoOabPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AdvogadoInscricaoOabQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AdvogadoInscricaoOabPeer::ID, $keys, Criteria::IN);
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
	 * @return    AdvogadoInscricaoOabQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AdvogadoInscricaoOabPeer::ID, $id, $comparison);
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
	 * @return    AdvogadoInscricaoOabQuery The current query, for fluid interface
	 */
	public function filterByAdvogadoId($advogadoId = null, $comparison = null)
	{
		if (is_array($advogadoId)) {
			$useMinMax = false;
			if (isset($advogadoId['min'])) {
				$this->addUsingAlias(AdvogadoInscricaoOabPeer::ADVOGADO_ID, $advogadoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($advogadoId['max'])) {
				$this->addUsingAlias(AdvogadoInscricaoOabPeer::ADVOGADO_ID, $advogadoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdvogadoInscricaoOabPeer::ADVOGADO_ID, $advogadoId, $comparison);
	}

	/**
	 * Filter the query on the uf_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUfId(1234); // WHERE uf_id = 1234
	 * $query->filterByUfId(array(12, 34)); // WHERE uf_id IN (12, 34)
	 * $query->filterByUfId(array('min' => 12)); // WHERE uf_id > 12
	 * </code>
	 *
	 * @see       filterByUf()
	 *
	 * @param     mixed $ufId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoInscricaoOabQuery The current query, for fluid interface
	 */
	public function filterByUfId($ufId = null, $comparison = null)
	{
		if (is_array($ufId)) {
			$useMinMax = false;
			if (isset($ufId['min'])) {
				$this->addUsingAlias(AdvogadoInscricaoOabPeer::UF_ID, $ufId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($ufId['max'])) {
				$this->addUsingAlias(AdvogadoInscricaoOabPeer::UF_ID, $ufId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdvogadoInscricaoOabPeer::UF_ID, $ufId, $comparison);
	}

	/**
	 * Filter the query on the numero_inscricao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNumeroInscricao('fooValue');   // WHERE numero_inscricao = 'fooValue'
	 * $query->filterByNumeroInscricao('%fooValue%'); // WHERE numero_inscricao LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $numeroInscricao The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoInscricaoOabQuery The current query, for fluid interface
	 */
	public function filterByNumeroInscricao($numeroInscricao = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($numeroInscricao)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $numeroInscricao)) {
				$numeroInscricao = str_replace('*', '%', $numeroInscricao);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AdvogadoInscricaoOabPeer::NUMERO_INSCRICAO, $numeroInscricao, $comparison);
	}

	/**
	 * Filter the query by a related Advogado object
	 *
	 * @param     Advogado|PropelCollection $advogado The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoInscricaoOabQuery The current query, for fluid interface
	 */
	public function filterByAdvogado($advogado, $comparison = null)
	{
		if ($advogado instanceof Advogado) {
			return $this
				->addUsingAlias(AdvogadoInscricaoOabPeer::ADVOGADO_ID, $advogado->getId(), $comparison);
		} elseif ($advogado instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AdvogadoInscricaoOabPeer::ADVOGADO_ID, $advogado->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    AdvogadoInscricaoOabQuery The current query, for fluid interface
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
	 * Filter the query by a related Uf object
	 *
	 * @param     Uf|PropelCollection $uf The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoInscricaoOabQuery The current query, for fluid interface
	 */
	public function filterByUf($uf, $comparison = null)
	{
		if ($uf instanceof Uf) {
			return $this
				->addUsingAlias(AdvogadoInscricaoOabPeer::UF_ID, $uf->getId(), $comparison);
		} elseif ($uf instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AdvogadoInscricaoOabPeer::UF_ID, $uf->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUf() only accepts arguments of type Uf or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Uf relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdvogadoInscricaoOabQuery The current query, for fluid interface
	 */
	public function joinUf($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Uf');

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
			$this->addJoinObject($join, 'Uf');
		}

		return $this;
	}

	/**
	 * Use the Uf relation Uf object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UfQuery A secondary query class using the current class as primary query
	 */
	public function useUfQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUf($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Uf', 'UfQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     AdvogadoInscricaoOab $advogadoInscricaoOab Object to remove from the list of results
	 *
	 * @return    AdvogadoInscricaoOabQuery The current query, for fluid interface
	 */
	public function prune($advogadoInscricaoOab = null)
	{
		if ($advogadoInscricaoOab) {
			$this->addUsingAlias(AdvogadoInscricaoOabPeer::ID, $advogadoInscricaoOab->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseAdvogadoInscricaoOabQuery