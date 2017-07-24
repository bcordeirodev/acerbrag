<?php


/**
 * Base class that represents a query for the 'cidade' table.
 *
 * 
 *
 * @method     CidadeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CidadeQuery orderByUfId($order = Criteria::ASC) Order by the uf_id column
 * @method     CidadeQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     CidadeQuery orderBySlug($order = Criteria::ASC) Order by the slug column
 * @method     CidadeQuery orderByLongitude($order = Criteria::ASC) Order by the longitude column
 * @method     CidadeQuery orderByLatitude($order = Criteria::ASC) Order by the latitude column
 *
 * @method     CidadeQuery groupById() Group by the id column
 * @method     CidadeQuery groupByUfId() Group by the uf_id column
 * @method     CidadeQuery groupByNome() Group by the nome column
 * @method     CidadeQuery groupBySlug() Group by the slug column
 * @method     CidadeQuery groupByLongitude() Group by the longitude column
 * @method     CidadeQuery groupByLatitude() Group by the latitude column
 *
 * @method     CidadeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CidadeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CidadeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CidadeQuery leftJoinUf($relationAlias = null) Adds a LEFT JOIN clause to the query using the Uf relation
 * @method     CidadeQuery rightJoinUf($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Uf relation
 * @method     CidadeQuery innerJoinUf($relationAlias = null) Adds a INNER JOIN clause to the query using the Uf relation
 *
 * @method     CidadeQuery leftJoinEndereco($relationAlias = null) Adds a LEFT JOIN clause to the query using the Endereco relation
 * @method     CidadeQuery rightJoinEndereco($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Endereco relation
 * @method     CidadeQuery innerJoinEndereco($relationAlias = null) Adds a INNER JOIN clause to the query using the Endereco relation
 *
 * @method     CidadeQuery leftJoinMembro($relationAlias = null) Adds a LEFT JOIN clause to the query using the Membro relation
 * @method     CidadeQuery rightJoinMembro($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Membro relation
 * @method     CidadeQuery innerJoinMembro($relationAlias = null) Adds a INNER JOIN clause to the query using the Membro relation
 *
 * @method     Cidade findOne(PropelPDO $con = null) Return the first Cidade matching the query
 * @method     Cidade findOneOrCreate(PropelPDO $con = null) Return the first Cidade matching the query, or a new Cidade object populated from the query conditions when no match is found
 *
 * @method     Cidade findOneById(int $id) Return the first Cidade filtered by the id column
 * @method     Cidade findOneByUfId(int $uf_id) Return the first Cidade filtered by the uf_id column
 * @method     Cidade findOneByNome(string $nome) Return the first Cidade filtered by the nome column
 * @method     Cidade findOneBySlug(string $slug) Return the first Cidade filtered by the slug column
 * @method     Cidade findOneByLongitude(string $longitude) Return the first Cidade filtered by the longitude column
 * @method     Cidade findOneByLatitude(string $latitude) Return the first Cidade filtered by the latitude column
 *
 * @method     array findById(int $id) Return Cidade objects filtered by the id column
 * @method     array findByUfId(int $uf_id) Return Cidade objects filtered by the uf_id column
 * @method     array findByNome(string $nome) Return Cidade objects filtered by the nome column
 * @method     array findBySlug(string $slug) Return Cidade objects filtered by the slug column
 * @method     array findByLongitude(string $longitude) Return Cidade objects filtered by the longitude column
 * @method     array findByLatitude(string $latitude) Return Cidade objects filtered by the latitude column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseCidadeQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseCidadeQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Cidade', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CidadeQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CidadeQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CidadeQuery) {
			return $criteria;
		}
		$query = new CidadeQuery();
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
	 * @return    Cidade|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = CidadePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(CidadePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Cidade A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `UF_ID`, `NOME`, `SLUG`, `LONGITUDE`, `LATITUDE` FROM `cidade` WHERE `ID` = :p0';
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
			$obj = new Cidade();
			$obj->hydrate($row);
			CidadePeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Cidade|array|mixed the result, formatted by the current formatter
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
	 * @return    CidadeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CidadePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CidadeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CidadePeer::ID, $keys, Criteria::IN);
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
	 * @return    CidadeQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CidadePeer::ID, $id, $comparison);
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
	 * @return    CidadeQuery The current query, for fluid interface
	 */
	public function filterByUfId($ufId = null, $comparison = null)
	{
		if (is_array($ufId)) {
			$useMinMax = false;
			if (isset($ufId['min'])) {
				$this->addUsingAlias(CidadePeer::UF_ID, $ufId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($ufId['max'])) {
				$this->addUsingAlias(CidadePeer::UF_ID, $ufId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CidadePeer::UF_ID, $ufId, $comparison);
	}

	/**
	 * Filter the query on the nome column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNome('fooValue');   // WHERE nome = 'fooValue'
	 * $query->filterByNome('%fooValue%'); // WHERE nome LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nome The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CidadeQuery The current query, for fluid interface
	 */
	public function filterByNome($nome = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nome)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nome)) {
				$nome = str_replace('*', '%', $nome);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CidadePeer::NOME, $nome, $comparison);
	}

	/**
	 * Filter the query on the slug column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySlug('fooValue');   // WHERE slug = 'fooValue'
	 * $query->filterBySlug('%fooValue%'); // WHERE slug LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $slug The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CidadeQuery The current query, for fluid interface
	 */
	public function filterBySlug($slug = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($slug)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $slug)) {
				$slug = str_replace('*', '%', $slug);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CidadePeer::SLUG, $slug, $comparison);
	}

	/**
	 * Filter the query on the longitude column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLongitude('fooValue');   // WHERE longitude = 'fooValue'
	 * $query->filterByLongitude('%fooValue%'); // WHERE longitude LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $longitude The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CidadeQuery The current query, for fluid interface
	 */
	public function filterByLongitude($longitude = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($longitude)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $longitude)) {
				$longitude = str_replace('*', '%', $longitude);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CidadePeer::LONGITUDE, $longitude, $comparison);
	}

	/**
	 * Filter the query on the latitude column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLatitude('fooValue');   // WHERE latitude = 'fooValue'
	 * $query->filterByLatitude('%fooValue%'); // WHERE latitude LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $latitude The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CidadeQuery The current query, for fluid interface
	 */
	public function filterByLatitude($latitude = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($latitude)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $latitude)) {
				$latitude = str_replace('*', '%', $latitude);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(CidadePeer::LATITUDE, $latitude, $comparison);
	}

	/**
	 * Filter the query by a related Uf object
	 *
	 * @param     Uf|PropelCollection $uf The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CidadeQuery The current query, for fluid interface
	 */
	public function filterByUf($uf, $comparison = null)
	{
		if ($uf instanceof Uf) {
			return $this
				->addUsingAlias(CidadePeer::UF_ID, $uf->getId(), $comparison);
		} elseif ($uf instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(CidadePeer::UF_ID, $uf->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    CidadeQuery The current query, for fluid interface
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
	 * Filter the query by a related Endereco object
	 *
	 * @param     Endereco $endereco  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CidadeQuery The current query, for fluid interface
	 */
	public function filterByEndereco($endereco, $comparison = null)
	{
		if ($endereco instanceof Endereco) {
			return $this
				->addUsingAlias(CidadePeer::ID, $endereco->getCidadeId(), $comparison);
		} elseif ($endereco instanceof PropelCollection) {
			return $this
				->useEnderecoQuery()
				->filterByPrimaryKeys($endereco->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByEndereco() only accepts arguments of type Endereco or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Endereco relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CidadeQuery The current query, for fluid interface
	 */
	public function joinEndereco($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Endereco');

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
			$this->addJoinObject($join, 'Endereco');
		}

		return $this;
	}

	/**
	 * Use the Endereco relation Endereco object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EnderecoQuery A secondary query class using the current class as primary query
	 */
	public function useEnderecoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinEndereco($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Endereco', 'EnderecoQuery');
	}

	/**
	 * Filter the query by a related Membro object
	 *
	 * @param     Membro $membro  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CidadeQuery The current query, for fluid interface
	 */
	public function filterByMembro($membro, $comparison = null)
	{
		if ($membro instanceof Membro) {
			return $this
				->addUsingAlias(CidadePeer::ID, $membro->getCidadeNaturalidadeId(), $comparison);
		} elseif ($membro instanceof PropelCollection) {
			return $this
				->useMembroQuery()
				->filterByPrimaryKeys($membro->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByMembro() only accepts arguments of type Membro or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Membro relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CidadeQuery The current query, for fluid interface
	 */
	public function joinMembro($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Membro');

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
			$this->addJoinObject($join, 'Membro');
		}

		return $this;
	}

	/**
	 * Use the Membro relation Membro object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MembroQuery A secondary query class using the current class as primary query
	 */
	public function useMembroQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinMembro($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Membro', 'MembroQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Cidade $cidade Object to remove from the list of results
	 *
	 * @return    CidadeQuery The current query, for fluid interface
	 */
	public function prune($cidade = null)
	{
		if ($cidade) {
			$this->addUsingAlias(CidadePeer::ID, $cidade->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseCidadeQuery