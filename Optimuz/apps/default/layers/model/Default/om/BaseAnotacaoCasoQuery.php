<?php


/**
 * Base class that represents a query for the 'anotacao_caso' table.
 *
 * 
 *
 * @method     AnotacaoCasoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AnotacaoCasoQuery orderByCasoId($order = Criteria::ASC) Order by the caso_id column
 * @method     AnotacaoCasoQuery orderByTitulo($order = Criteria::ASC) Order by the titulo column
 * @method     AnotacaoCasoQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 * @method     AnotacaoCasoQuery orderByDataCriacao($order = Criteria::ASC) Order by the data_criacao column
 *
 * @method     AnotacaoCasoQuery groupById() Group by the id column
 * @method     AnotacaoCasoQuery groupByCasoId() Group by the caso_id column
 * @method     AnotacaoCasoQuery groupByTitulo() Group by the titulo column
 * @method     AnotacaoCasoQuery groupByDescricao() Group by the descricao column
 * @method     AnotacaoCasoQuery groupByDataCriacao() Group by the data_criacao column
 *
 * @method     AnotacaoCasoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AnotacaoCasoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AnotacaoCasoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AnotacaoCasoQuery leftJoinCaso($relationAlias = null) Adds a LEFT JOIN clause to the query using the Caso relation
 * @method     AnotacaoCasoQuery rightJoinCaso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Caso relation
 * @method     AnotacaoCasoQuery innerJoinCaso($relationAlias = null) Adds a INNER JOIN clause to the query using the Caso relation
 *
 * @method     AnotacaoCaso findOne(PropelPDO $con = null) Return the first AnotacaoCaso matching the query
 * @method     AnotacaoCaso findOneOrCreate(PropelPDO $con = null) Return the first AnotacaoCaso matching the query, or a new AnotacaoCaso object populated from the query conditions when no match is found
 *
 * @method     AnotacaoCaso findOneById(int $id) Return the first AnotacaoCaso filtered by the id column
 * @method     AnotacaoCaso findOneByCasoId(int $caso_id) Return the first AnotacaoCaso filtered by the caso_id column
 * @method     AnotacaoCaso findOneByTitulo(string $titulo) Return the first AnotacaoCaso filtered by the titulo column
 * @method     AnotacaoCaso findOneByDescricao(string $descricao) Return the first AnotacaoCaso filtered by the descricao column
 * @method     AnotacaoCaso findOneByDataCriacao(string $data_criacao) Return the first AnotacaoCaso filtered by the data_criacao column
 *
 * @method     array findById(int $id) Return AnotacaoCaso objects filtered by the id column
 * @method     array findByCasoId(int $caso_id) Return AnotacaoCaso objects filtered by the caso_id column
 * @method     array findByTitulo(string $titulo) Return AnotacaoCaso objects filtered by the titulo column
 * @method     array findByDescricao(string $descricao) Return AnotacaoCaso objects filtered by the descricao column
 * @method     array findByDataCriacao(string $data_criacao) Return AnotacaoCaso objects filtered by the data_criacao column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseAnotacaoCasoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseAnotacaoCasoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'AnotacaoCaso', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AnotacaoCasoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AnotacaoCasoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AnotacaoCasoQuery) {
			return $criteria;
		}
		$query = new AnotacaoCasoQuery();
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
	 * @return    AnotacaoCaso|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = AnotacaoCasoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(AnotacaoCasoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    AnotacaoCaso A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `CASO_ID`, `TITULO`, `DESCRICAO`, `DATA_CRIACAO` FROM `anotacao_caso` WHERE `ID` = :p0';
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
			$obj = new AnotacaoCaso();
			$obj->hydrate($row);
			AnotacaoCasoPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    AnotacaoCaso|array|mixed the result, formatted by the current formatter
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
	 * @return    AnotacaoCasoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AnotacaoCasoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AnotacaoCasoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AnotacaoCasoPeer::ID, $keys, Criteria::IN);
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
	 * @return    AnotacaoCasoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AnotacaoCasoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the caso_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCasoId(1234); // WHERE caso_id = 1234
	 * $query->filterByCasoId(array(12, 34)); // WHERE caso_id IN (12, 34)
	 * $query->filterByCasoId(array('min' => 12)); // WHERE caso_id > 12
	 * </code>
	 *
	 * @see       filterByCaso()
	 *
	 * @param     mixed $casoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AnotacaoCasoQuery The current query, for fluid interface
	 */
	public function filterByCasoId($casoId = null, $comparison = null)
	{
		if (is_array($casoId)) {
			$useMinMax = false;
			if (isset($casoId['min'])) {
				$this->addUsingAlias(AnotacaoCasoPeer::CASO_ID, $casoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($casoId['max'])) {
				$this->addUsingAlias(AnotacaoCasoPeer::CASO_ID, $casoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AnotacaoCasoPeer::CASO_ID, $casoId, $comparison);
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
	 * @return    AnotacaoCasoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AnotacaoCasoPeer::TITULO, $titulo, $comparison);
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
	 * @return    AnotacaoCasoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AnotacaoCasoPeer::DESCRICAO, $descricao, $comparison);
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
	 * @return    AnotacaoCasoQuery The current query, for fluid interface
	 */
	public function filterByDataCriacao($dataCriacao = null, $comparison = null)
	{
		if (is_array($dataCriacao)) {
			$useMinMax = false;
			if (isset($dataCriacao['min'])) {
				$this->addUsingAlias(AnotacaoCasoPeer::DATA_CRIACAO, $dataCriacao['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataCriacao['max'])) {
				$this->addUsingAlias(AnotacaoCasoPeer::DATA_CRIACAO, $dataCriacao['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AnotacaoCasoPeer::DATA_CRIACAO, $dataCriacao, $comparison);
	}

	/**
	 * Filter the query by a related Caso object
	 *
	 * @param     Caso|PropelCollection $caso The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AnotacaoCasoQuery The current query, for fluid interface
	 */
	public function filterByCaso($caso, $comparison = null)
	{
		if ($caso instanceof Caso) {
			return $this
				->addUsingAlias(AnotacaoCasoPeer::CASO_ID, $caso->getId(), $comparison);
		} elseif ($caso instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AnotacaoCasoPeer::CASO_ID, $caso->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    AnotacaoCasoQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     AnotacaoCaso $anotacaoCaso Object to remove from the list of results
	 *
	 * @return    AnotacaoCasoQuery The current query, for fluid interface
	 */
	public function prune($anotacaoCaso = null)
	{
		if ($anotacaoCaso) {
			$this->addUsingAlias(AnotacaoCasoPeer::ID, $anotacaoCaso->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseAnotacaoCasoQuery