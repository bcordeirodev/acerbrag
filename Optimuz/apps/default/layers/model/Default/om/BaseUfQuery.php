<?php


/**
 * Base class that represents a query for the 'uf' table.
 *
 * 
 *
 * @method     UfQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     UfQuery orderBySigla($order = Criteria::ASC) Order by the sigla column
 * @method     UfQuery orderByNome($order = Criteria::ASC) Order by the nome column
 *
 * @method     UfQuery groupById() Group by the id column
 * @method     UfQuery groupBySigla() Group by the sigla column
 * @method     UfQuery groupByNome() Group by the nome column
 *
 * @method     UfQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UfQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UfQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     UfQuery leftJoinCidade($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cidade relation
 * @method     UfQuery rightJoinCidade($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cidade relation
 * @method     UfQuery innerJoinCidade($relationAlias = null) Adds a INNER JOIN clause to the query using the Cidade relation
 *
 * @method     UfQuery leftJoinEnderecoCorreio($relationAlias = null) Adds a LEFT JOIN clause to the query using the EnderecoCorreio relation
 * @method     UfQuery rightJoinEnderecoCorreio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the EnderecoCorreio relation
 * @method     UfQuery innerJoinEnderecoCorreio($relationAlias = null) Adds a INNER JOIN clause to the query using the EnderecoCorreio relation
 *
 * @method     Uf findOne(PropelPDO $con = null) Return the first Uf matching the query
 * @method     Uf findOneOrCreate(PropelPDO $con = null) Return the first Uf matching the query, or a new Uf object populated from the query conditions when no match is found
 *
 * @method     Uf findOneById(int $id) Return the first Uf filtered by the id column
 * @method     Uf findOneBySigla(string $sigla) Return the first Uf filtered by the sigla column
 * @method     Uf findOneByNome(string $nome) Return the first Uf filtered by the nome column
 *
 * @method     array findById(int $id) Return Uf objects filtered by the id column
 * @method     array findBySigla(string $sigla) Return Uf objects filtered by the sigla column
 * @method     array findByNome(string $nome) Return Uf objects filtered by the nome column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseUfQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseUfQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Uf', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new UfQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    UfQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof UfQuery) {
			return $criteria;
		}
		$query = new UfQuery();
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
	 * @return    Uf|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = UfPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(UfPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Uf A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `SIGLA`, `NOME` FROM `uf` WHERE `ID` = :p0';
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
			$obj = new Uf();
			$obj->hydrate($row);
			UfPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Uf|array|mixed the result, formatted by the current formatter
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
	 * @return    UfQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(UfPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UfQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(UfPeer::ID, $keys, Criteria::IN);
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
	 * @return    UfQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(UfPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the sigla column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySigla('fooValue');   // WHERE sigla = 'fooValue'
	 * $query->filterBySigla('%fooValue%'); // WHERE sigla LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $sigla The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UfQuery The current query, for fluid interface
	 */
	public function filterBySigla($sigla = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($sigla)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $sigla)) {
				$sigla = str_replace('*', '%', $sigla);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UfPeer::SIGLA, $sigla, $comparison);
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
	 * @return    UfQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UfPeer::NOME, $nome, $comparison);
	}

	/**
	 * Filter the query by a related Cidade object
	 *
	 * @param     Cidade $cidade  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UfQuery The current query, for fluid interface
	 */
	public function filterByCidade($cidade, $comparison = null)
	{
		if ($cidade instanceof Cidade) {
			return $this
				->addUsingAlias(UfPeer::ID, $cidade->getUfId(), $comparison);
		} elseif ($cidade instanceof PropelCollection) {
			return $this
				->useCidadeQuery()
				->filterByPrimaryKeys($cidade->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByCidade() only accepts arguments of type Cidade or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Cidade relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UfQuery The current query, for fluid interface
	 */
	public function joinCidade($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Cidade');

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
			$this->addJoinObject($join, 'Cidade');
		}

		return $this;
	}

	/**
	 * Use the Cidade relation Cidade object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CidadeQuery A secondary query class using the current class as primary query
	 */
	public function useCidadeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCidade($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Cidade', 'CidadeQuery');
	}

	/**
	 * Filter the query by a related EnderecoCorreio object
	 *
	 * @param     EnderecoCorreio $enderecoCorreio  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UfQuery The current query, for fluid interface
	 */
	public function filterByEnderecoCorreio($enderecoCorreio, $comparison = null)
	{
		if ($enderecoCorreio instanceof EnderecoCorreio) {
			return $this
				->addUsingAlias(UfPeer::ID, $enderecoCorreio->getUfId(), $comparison);
		} elseif ($enderecoCorreio instanceof PropelCollection) {
			return $this
				->useEnderecoCorreioQuery()
				->filterByPrimaryKeys($enderecoCorreio->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByEnderecoCorreio() only accepts arguments of type EnderecoCorreio or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the EnderecoCorreio relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UfQuery The current query, for fluid interface
	 */
	public function joinEnderecoCorreio($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('EnderecoCorreio');

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
			$this->addJoinObject($join, 'EnderecoCorreio');
		}

		return $this;
	}

	/**
	 * Use the EnderecoCorreio relation EnderecoCorreio object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EnderecoCorreioQuery A secondary query class using the current class as primary query
	 */
	public function useEnderecoCorreioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinEnderecoCorreio($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'EnderecoCorreio', 'EnderecoCorreioQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Uf $uf Object to remove from the list of results
	 *
	 * @return    UfQuery The current query, for fluid interface
	 */
	public function prune($uf = null)
	{
		if ($uf) {
			$this->addUsingAlias(UfPeer::ID, $uf->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseUfQuery