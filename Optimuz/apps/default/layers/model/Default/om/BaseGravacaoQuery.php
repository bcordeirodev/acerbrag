<?php


/**
 * Base class that represents a query for the 'gravacao' table.
 *
 * 
 *
 * @method     GravacaoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     GravacaoQuery orderByColetaPesquisaId($order = Criteria::ASC) Order by the coleta_pesquisa_id column
 *
 * @method     GravacaoQuery groupById() Group by the id column
 * @method     GravacaoQuery groupByColetaPesquisaId() Group by the coleta_pesquisa_id column
 *
 * @method     GravacaoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     GravacaoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     GravacaoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     GravacaoQuery leftJoinColetaPesquisa($relationAlias = null) Adds a LEFT JOIN clause to the query using the ColetaPesquisa relation
 * @method     GravacaoQuery rightJoinColetaPesquisa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ColetaPesquisa relation
 * @method     GravacaoQuery innerJoinColetaPesquisa($relationAlias = null) Adds a INNER JOIN clause to the query using the ColetaPesquisa relation
 *
 * @method     Gravacao findOne(PropelPDO $con = null) Return the first Gravacao matching the query
 * @method     Gravacao findOneOrCreate(PropelPDO $con = null) Return the first Gravacao matching the query, or a new Gravacao object populated from the query conditions when no match is found
 *
 * @method     Gravacao findOneById(int $id) Return the first Gravacao filtered by the id column
 * @method     Gravacao findOneByColetaPesquisaId(int $coleta_pesquisa_id) Return the first Gravacao filtered by the coleta_pesquisa_id column
 *
 * @method     array findById(int $id) Return Gravacao objects filtered by the id column
 * @method     array findByColetaPesquisaId(int $coleta_pesquisa_id) Return Gravacao objects filtered by the coleta_pesquisa_id column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseGravacaoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseGravacaoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Gravacao', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new GravacaoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    GravacaoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof GravacaoQuery) {
			return $criteria;
		}
		$query = new GravacaoQuery();
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
	 * @return    Gravacao|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = GravacaoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(GravacaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Gravacao A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `COLETA_PESQUISA_ID` FROM `gravacao` WHERE `ID` = :p0';
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
			$obj = new Gravacao();
			$obj->hydrate($row);
			GravacaoPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Gravacao|array|mixed the result, formatted by the current formatter
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
	 * @return    GravacaoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(GravacaoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    GravacaoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(GravacaoPeer::ID, $keys, Criteria::IN);
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
	 * @return    GravacaoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(GravacaoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the coleta_pesquisa_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByColetaPesquisaId(1234); // WHERE coleta_pesquisa_id = 1234
	 * $query->filterByColetaPesquisaId(array(12, 34)); // WHERE coleta_pesquisa_id IN (12, 34)
	 * $query->filterByColetaPesquisaId(array('min' => 12)); // WHERE coleta_pesquisa_id > 12
	 * </code>
	 *
	 * @see       filterByColetaPesquisa()
	 *
	 * @param     mixed $coletaPesquisaId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GravacaoQuery The current query, for fluid interface
	 */
	public function filterByColetaPesquisaId($coletaPesquisaId = null, $comparison = null)
	{
		if (is_array($coletaPesquisaId)) {
			$useMinMax = false;
			if (isset($coletaPesquisaId['min'])) {
				$this->addUsingAlias(GravacaoPeer::COLETA_PESQUISA_ID, $coletaPesquisaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($coletaPesquisaId['max'])) {
				$this->addUsingAlias(GravacaoPeer::COLETA_PESQUISA_ID, $coletaPesquisaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GravacaoPeer::COLETA_PESQUISA_ID, $coletaPesquisaId, $comparison);
	}

	/**
	 * Filter the query by a related ColetaPesquisa object
	 *
	 * @param     ColetaPesquisa|PropelCollection $coletaPesquisa The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GravacaoQuery The current query, for fluid interface
	 */
	public function filterByColetaPesquisa($coletaPesquisa, $comparison = null)
	{
		if ($coletaPesquisa instanceof ColetaPesquisa) {
			return $this
				->addUsingAlias(GravacaoPeer::COLETA_PESQUISA_ID, $coletaPesquisa->getId(), $comparison);
		} elseif ($coletaPesquisa instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(GravacaoPeer::COLETA_PESQUISA_ID, $coletaPesquisa->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByColetaPesquisa() only accepts arguments of type ColetaPesquisa or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ColetaPesquisa relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GravacaoQuery The current query, for fluid interface
	 */
	public function joinColetaPesquisa($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ColetaPesquisa');

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
			$this->addJoinObject($join, 'ColetaPesquisa');
		}

		return $this;
	}

	/**
	 * Use the ColetaPesquisa relation ColetaPesquisa object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ColetaPesquisaQuery A secondary query class using the current class as primary query
	 */
	public function useColetaPesquisaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinColetaPesquisa($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ColetaPesquisa', 'ColetaPesquisaQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Gravacao $gravacao Object to remove from the list of results
	 *
	 * @return    GravacaoQuery The current query, for fluid interface
	 */
	public function prune($gravacao = null)
	{
		if ($gravacao) {
			$this->addUsingAlias(GravacaoPeer::ID, $gravacao->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseGravacaoQuery