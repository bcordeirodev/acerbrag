<?php


/**
 * Base class that represents a query for the 'relato' table.
 *
 * 
 *
 * @method     RelatoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     RelatoQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 * @method     RelatoQuery orderByDataCriacao($order = Criteria::ASC) Order by the data_criacao column
 *
 * @method     RelatoQuery groupById() Group by the id column
 * @method     RelatoQuery groupByDescricao() Group by the descricao column
 * @method     RelatoQuery groupByDataCriacao() Group by the data_criacao column
 *
 * @method     RelatoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     RelatoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     RelatoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     RelatoQuery leftJoinCasoRelato($relationAlias = null) Adds a LEFT JOIN clause to the query using the CasoRelato relation
 * @method     RelatoQuery rightJoinCasoRelato($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CasoRelato relation
 * @method     RelatoQuery innerJoinCasoRelato($relationAlias = null) Adds a INNER JOIN clause to the query using the CasoRelato relation
 *
 * @method     RelatoQuery leftJoinProcessoRelato($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProcessoRelato relation
 * @method     RelatoQuery rightJoinProcessoRelato($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProcessoRelato relation
 * @method     RelatoQuery innerJoinProcessoRelato($relationAlias = null) Adds a INNER JOIN clause to the query using the ProcessoRelato relation
 *
 * @method     Relato findOne(PropelPDO $con = null) Return the first Relato matching the query
 * @method     Relato findOneOrCreate(PropelPDO $con = null) Return the first Relato matching the query, or a new Relato object populated from the query conditions when no match is found
 *
 * @method     Relato findOneById(int $id) Return the first Relato filtered by the id column
 * @method     Relato findOneByDescricao(string $descricao) Return the first Relato filtered by the descricao column
 * @method     Relato findOneByDataCriacao(string $data_criacao) Return the first Relato filtered by the data_criacao column
 *
 * @method     array findById(int $id) Return Relato objects filtered by the id column
 * @method     array findByDescricao(string $descricao) Return Relato objects filtered by the descricao column
 * @method     array findByDataCriacao(string $data_criacao) Return Relato objects filtered by the data_criacao column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseRelatoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseRelatoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Relato', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new RelatoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    RelatoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof RelatoQuery) {
			return $criteria;
		}
		$query = new RelatoQuery();
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
	 * @return    Relato|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = RelatoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(RelatoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Relato A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `DESCRICAO`, `DATA_CRIACAO` FROM `relato` WHERE `ID` = :p0';
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
			$obj = new Relato();
			$obj->hydrate($row);
			RelatoPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Relato|array|mixed the result, formatted by the current formatter
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
	 * @return    RelatoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(RelatoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    RelatoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(RelatoPeer::ID, $keys, Criteria::IN);
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
	 * @return    RelatoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RelatoPeer::ID, $id, $comparison);
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
	 * @return    RelatoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RelatoPeer::DESCRICAO, $descricao, $comparison);
	}

	/**
	 * Filter the query on the data_criacao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataCriacao('2011-03-14'); // WHERE data_criacao = '2011-03-14'
	 * $query->filterByDataCriacao('now'); // WHERE data_criacao = '2011-03-14'
	 * $query->filterByDataCriacao(array('max' => 'yesterday')); // WHERE data_criacao > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataCriacao The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RelatoQuery The current query, for fluid interface
	 */
	public function filterByDataCriacao($dataCriacao = null, $comparison = null)
	{
		if (is_array($dataCriacao)) {
			$useMinMax = false;
			if (isset($dataCriacao['min'])) {
				$this->addUsingAlias(RelatoPeer::DATA_CRIACAO, $dataCriacao['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataCriacao['max'])) {
				$this->addUsingAlias(RelatoPeer::DATA_CRIACAO, $dataCriacao['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RelatoPeer::DATA_CRIACAO, $dataCriacao, $comparison);
	}

	/**
	 * Filter the query by a related CasoRelato object
	 *
	 * @param     CasoRelato $casoRelato  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RelatoQuery The current query, for fluid interface
	 */
	public function filterByCasoRelato($casoRelato, $comparison = null)
	{
		if ($casoRelato instanceof CasoRelato) {
			return $this
				->addUsingAlias(RelatoPeer::ID, $casoRelato->getIdRelato(), $comparison);
		} elseif ($casoRelato instanceof PropelCollection) {
			return $this
				->useCasoRelatoQuery()
				->filterByPrimaryKeys($casoRelato->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByCasoRelato() only accepts arguments of type CasoRelato or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the CasoRelato relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RelatoQuery The current query, for fluid interface
	 */
	public function joinCasoRelato($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('CasoRelato');

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
			$this->addJoinObject($join, 'CasoRelato');
		}

		return $this;
	}

	/**
	 * Use the CasoRelato relation CasoRelato object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CasoRelatoQuery A secondary query class using the current class as primary query
	 */
	public function useCasoRelatoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCasoRelato($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'CasoRelato', 'CasoRelatoQuery');
	}

	/**
	 * Filter the query by a related ProcessoRelato object
	 *
	 * @param     ProcessoRelato $processoRelato  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RelatoQuery The current query, for fluid interface
	 */
	public function filterByProcessoRelato($processoRelato, $comparison = null)
	{
		if ($processoRelato instanceof ProcessoRelato) {
			return $this
				->addUsingAlias(RelatoPeer::ID, $processoRelato->getRelatoId(), $comparison);
		} elseif ($processoRelato instanceof PropelCollection) {
			return $this
				->useProcessoRelatoQuery()
				->filterByPrimaryKeys($processoRelato->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByProcessoRelato() only accepts arguments of type ProcessoRelato or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ProcessoRelato relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RelatoQuery The current query, for fluid interface
	 */
	public function joinProcessoRelato($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ProcessoRelato');

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
			$this->addJoinObject($join, 'ProcessoRelato');
		}

		return $this;
	}

	/**
	 * Use the ProcessoRelato relation ProcessoRelato object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProcessoRelatoQuery A secondary query class using the current class as primary query
	 */
	public function useProcessoRelatoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinProcessoRelato($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ProcessoRelato', 'ProcessoRelatoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Relato $relato Object to remove from the list of results
	 *
	 * @return    RelatoQuery The current query, for fluid interface
	 */
	public function prune($relato = null)
	{
		if ($relato) {
			$this->addUsingAlias(RelatoPeer::ID, $relato->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseRelatoQuery