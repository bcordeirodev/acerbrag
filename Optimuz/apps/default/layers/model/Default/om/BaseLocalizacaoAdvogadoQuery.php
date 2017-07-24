<?php


/**
 * Base class that represents a query for the 'localizacao_advogado' table.
 *
 * 
 *
 * @method     LocalizacaoAdvogadoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     LocalizacaoAdvogadoQuery orderByAdvogadoId($order = Criteria::ASC) Order by the advogado_id column
 * @method     LocalizacaoAdvogadoQuery orderByCidadeId($order = Criteria::ASC) Order by the cidade_id column
 * @method     LocalizacaoAdvogadoQuery orderByLongitude($order = Criteria::ASC) Order by the longitude column
 * @method     LocalizacaoAdvogadoQuery orderByLatitude($order = Criteria::ASC) Order by the latitude column
 * @method     LocalizacaoAdvogadoQuery orderByDataLocalizacao($order = Criteria::ASC) Order by the data_localizacao column
 *
 * @method     LocalizacaoAdvogadoQuery groupById() Group by the id column
 * @method     LocalizacaoAdvogadoQuery groupByAdvogadoId() Group by the advogado_id column
 * @method     LocalizacaoAdvogadoQuery groupByCidadeId() Group by the cidade_id column
 * @method     LocalizacaoAdvogadoQuery groupByLongitude() Group by the longitude column
 * @method     LocalizacaoAdvogadoQuery groupByLatitude() Group by the latitude column
 * @method     LocalizacaoAdvogadoQuery groupByDataLocalizacao() Group by the data_localizacao column
 *
 * @method     LocalizacaoAdvogadoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     LocalizacaoAdvogadoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     LocalizacaoAdvogadoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     LocalizacaoAdvogadoQuery leftJoinAdvogado($relationAlias = null) Adds a LEFT JOIN clause to the query using the Advogado relation
 * @method     LocalizacaoAdvogadoQuery rightJoinAdvogado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Advogado relation
 * @method     LocalizacaoAdvogadoQuery innerJoinAdvogado($relationAlias = null) Adds a INNER JOIN clause to the query using the Advogado relation
 *
 * @method     LocalizacaoAdvogado findOne(PropelPDO $con = null) Return the first LocalizacaoAdvogado matching the query
 * @method     LocalizacaoAdvogado findOneOrCreate(PropelPDO $con = null) Return the first LocalizacaoAdvogado matching the query, or a new LocalizacaoAdvogado object populated from the query conditions when no match is found
 *
 * @method     LocalizacaoAdvogado findOneById(int $id) Return the first LocalizacaoAdvogado filtered by the id column
 * @method     LocalizacaoAdvogado findOneByAdvogadoId(int $advogado_id) Return the first LocalizacaoAdvogado filtered by the advogado_id column
 * @method     LocalizacaoAdvogado findOneByCidadeId(int $cidade_id) Return the first LocalizacaoAdvogado filtered by the cidade_id column
 * @method     LocalizacaoAdvogado findOneByLongitude(double $longitude) Return the first LocalizacaoAdvogado filtered by the longitude column
 * @method     LocalizacaoAdvogado findOneByLatitude(double $latitude) Return the first LocalizacaoAdvogado filtered by the latitude column
 * @method     LocalizacaoAdvogado findOneByDataLocalizacao(string $data_localizacao) Return the first LocalizacaoAdvogado filtered by the data_localizacao column
 *
 * @method     array findById(int $id) Return LocalizacaoAdvogado objects filtered by the id column
 * @method     array findByAdvogadoId(int $advogado_id) Return LocalizacaoAdvogado objects filtered by the advogado_id column
 * @method     array findByCidadeId(int $cidade_id) Return LocalizacaoAdvogado objects filtered by the cidade_id column
 * @method     array findByLongitude(double $longitude) Return LocalizacaoAdvogado objects filtered by the longitude column
 * @method     array findByLatitude(double $latitude) Return LocalizacaoAdvogado objects filtered by the latitude column
 * @method     array findByDataLocalizacao(string $data_localizacao) Return LocalizacaoAdvogado objects filtered by the data_localizacao column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseLocalizacaoAdvogadoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseLocalizacaoAdvogadoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'LocalizacaoAdvogado', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new LocalizacaoAdvogadoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    LocalizacaoAdvogadoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof LocalizacaoAdvogadoQuery) {
			return $criteria;
		}
		$query = new LocalizacaoAdvogadoQuery();
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
	 * @return    LocalizacaoAdvogado|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = LocalizacaoAdvogadoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(LocalizacaoAdvogadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    LocalizacaoAdvogado A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ADVOGADO_ID`, `CIDADE_ID`, `LONGITUDE`, `LATITUDE`, `DATA_LOCALIZACAO` FROM `localizacao_advogado` WHERE `ID` = :p0';
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
			$obj = new LocalizacaoAdvogado();
			$obj->hydrate($row);
			LocalizacaoAdvogadoPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    LocalizacaoAdvogado|array|mixed the result, formatted by the current formatter
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
	 * @return    LocalizacaoAdvogadoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(LocalizacaoAdvogadoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    LocalizacaoAdvogadoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(LocalizacaoAdvogadoPeer::ID, $keys, Criteria::IN);
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
	 * @return    LocalizacaoAdvogadoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(LocalizacaoAdvogadoPeer::ID, $id, $comparison);
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
	 * @return    LocalizacaoAdvogadoQuery The current query, for fluid interface
	 */
	public function filterByAdvogadoId($advogadoId = null, $comparison = null)
	{
		if (is_array($advogadoId)) {
			$useMinMax = false;
			if (isset($advogadoId['min'])) {
				$this->addUsingAlias(LocalizacaoAdvogadoPeer::ADVOGADO_ID, $advogadoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($advogadoId['max'])) {
				$this->addUsingAlias(LocalizacaoAdvogadoPeer::ADVOGADO_ID, $advogadoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LocalizacaoAdvogadoPeer::ADVOGADO_ID, $advogadoId, $comparison);
	}

	/**
	 * Filter the query on the cidade_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCidadeId(1234); // WHERE cidade_id = 1234
	 * $query->filterByCidadeId(array(12, 34)); // WHERE cidade_id IN (12, 34)
	 * $query->filterByCidadeId(array('min' => 12)); // WHERE cidade_id > 12
	 * </code>
	 *
	 * @param     mixed $cidadeId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LocalizacaoAdvogadoQuery The current query, for fluid interface
	 */
	public function filterByCidadeId($cidadeId = null, $comparison = null)
	{
		if (is_array($cidadeId)) {
			$useMinMax = false;
			if (isset($cidadeId['min'])) {
				$this->addUsingAlias(LocalizacaoAdvogadoPeer::CIDADE_ID, $cidadeId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cidadeId['max'])) {
				$this->addUsingAlias(LocalizacaoAdvogadoPeer::CIDADE_ID, $cidadeId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LocalizacaoAdvogadoPeer::CIDADE_ID, $cidadeId, $comparison);
	}

	/**
	 * Filter the query on the longitude column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLongitude(1234); // WHERE longitude = 1234
	 * $query->filterByLongitude(array(12, 34)); // WHERE longitude IN (12, 34)
	 * $query->filterByLongitude(array('min' => 12)); // WHERE longitude > 12
	 * </code>
	 *
	 * @param     mixed $longitude The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LocalizacaoAdvogadoQuery The current query, for fluid interface
	 */
	public function filterByLongitude($longitude = null, $comparison = null)
	{
		if (is_array($longitude)) {
			$useMinMax = false;
			if (isset($longitude['min'])) {
				$this->addUsingAlias(LocalizacaoAdvogadoPeer::LONGITUDE, $longitude['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($longitude['max'])) {
				$this->addUsingAlias(LocalizacaoAdvogadoPeer::LONGITUDE, $longitude['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LocalizacaoAdvogadoPeer::LONGITUDE, $longitude, $comparison);
	}

	/**
	 * Filter the query on the latitude column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLatitude(1234); // WHERE latitude = 1234
	 * $query->filterByLatitude(array(12, 34)); // WHERE latitude IN (12, 34)
	 * $query->filterByLatitude(array('min' => 12)); // WHERE latitude > 12
	 * </code>
	 *
	 * @param     mixed $latitude The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LocalizacaoAdvogadoQuery The current query, for fluid interface
	 */
	public function filterByLatitude($latitude = null, $comparison = null)
	{
		if (is_array($latitude)) {
			$useMinMax = false;
			if (isset($latitude['min'])) {
				$this->addUsingAlias(LocalizacaoAdvogadoPeer::LATITUDE, $latitude['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($latitude['max'])) {
				$this->addUsingAlias(LocalizacaoAdvogadoPeer::LATITUDE, $latitude['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LocalizacaoAdvogadoPeer::LATITUDE, $latitude, $comparison);
	}

	/**
	 * Filter the query on the data_localizacao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataLocalizacao('2011-03-14'); // WHERE data_localizacao = '2011-03-14'
	 * $query->filterByDataLocalizacao('now'); // WHERE data_localizacao = '2011-03-14'
	 * $query->filterByDataLocalizacao(array('max' => 'yesterday')); // WHERE data_localizacao > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataLocalizacao The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LocalizacaoAdvogadoQuery The current query, for fluid interface
	 */
	public function filterByDataLocalizacao($dataLocalizacao = null, $comparison = null)
	{
		if (is_array($dataLocalizacao)) {
			$useMinMax = false;
			if (isset($dataLocalizacao['min'])) {
				$this->addUsingAlias(LocalizacaoAdvogadoPeer::DATA_LOCALIZACAO, $dataLocalizacao['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataLocalizacao['max'])) {
				$this->addUsingAlias(LocalizacaoAdvogadoPeer::DATA_LOCALIZACAO, $dataLocalizacao['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(LocalizacaoAdvogadoPeer::DATA_LOCALIZACAO, $dataLocalizacao, $comparison);
	}

	/**
	 * Filter the query by a related Advogado object
	 *
	 * @param     Advogado|PropelCollection $advogado The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    LocalizacaoAdvogadoQuery The current query, for fluid interface
	 */
	public function filterByAdvogado($advogado, $comparison = null)
	{
		if ($advogado instanceof Advogado) {
			return $this
				->addUsingAlias(LocalizacaoAdvogadoPeer::ADVOGADO_ID, $advogado->getId(), $comparison);
		} elseif ($advogado instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(LocalizacaoAdvogadoPeer::ADVOGADO_ID, $advogado->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    LocalizacaoAdvogadoQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     LocalizacaoAdvogado $localizacaoAdvogado Object to remove from the list of results
	 *
	 * @return    LocalizacaoAdvogadoQuery The current query, for fluid interface
	 */
	public function prune($localizacaoAdvogado = null)
	{
		if ($localizacaoAdvogado) {
			$this->addUsingAlias(LocalizacaoAdvogadoPeer::ID, $localizacaoAdvogado->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseLocalizacaoAdvogadoQuery