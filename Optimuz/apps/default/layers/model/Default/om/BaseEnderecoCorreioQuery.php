<?php


/**
 * Base class that represents a query for the 'endereco_correio' table.
 *
 * 
 *
 * @method     EnderecoCorreioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     EnderecoCorreioQuery orderByUfId($order = Criteria::ASC) Order by the uf_id column
 * @method     EnderecoCorreioQuery orderByLogradouro($order = Criteria::ASC) Order by the logradouro column
 * @method     EnderecoCorreioQuery orderByBairro($order = Criteria::ASC) Order by the bairro column
 * @method     EnderecoCorreioQuery orderByCidade($order = Criteria::ASC) Order by the cidade column
 * @method     EnderecoCorreioQuery orderByCep($order = Criteria::ASC) Order by the cep column
 *
 * @method     EnderecoCorreioQuery groupById() Group by the id column
 * @method     EnderecoCorreioQuery groupByUfId() Group by the uf_id column
 * @method     EnderecoCorreioQuery groupByLogradouro() Group by the logradouro column
 * @method     EnderecoCorreioQuery groupByBairro() Group by the bairro column
 * @method     EnderecoCorreioQuery groupByCidade() Group by the cidade column
 * @method     EnderecoCorreioQuery groupByCep() Group by the cep column
 *
 * @method     EnderecoCorreioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     EnderecoCorreioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     EnderecoCorreioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     EnderecoCorreioQuery leftJoinUf($relationAlias = null) Adds a LEFT JOIN clause to the query using the Uf relation
 * @method     EnderecoCorreioQuery rightJoinUf($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Uf relation
 * @method     EnderecoCorreioQuery innerJoinUf($relationAlias = null) Adds a INNER JOIN clause to the query using the Uf relation
 *
 * @method     EnderecoCorreio findOne(PropelPDO $con = null) Return the first EnderecoCorreio matching the query
 * @method     EnderecoCorreio findOneOrCreate(PropelPDO $con = null) Return the first EnderecoCorreio matching the query, or a new EnderecoCorreio object populated from the query conditions when no match is found
 *
 * @method     EnderecoCorreio findOneById(int $id) Return the first EnderecoCorreio filtered by the id column
 * @method     EnderecoCorreio findOneByUfId(int $uf_id) Return the first EnderecoCorreio filtered by the uf_id column
 * @method     EnderecoCorreio findOneByLogradouro(string $logradouro) Return the first EnderecoCorreio filtered by the logradouro column
 * @method     EnderecoCorreio findOneByBairro(string $bairro) Return the first EnderecoCorreio filtered by the bairro column
 * @method     EnderecoCorreio findOneByCidade(string $cidade) Return the first EnderecoCorreio filtered by the cidade column
 * @method     EnderecoCorreio findOneByCep(string $cep) Return the first EnderecoCorreio filtered by the cep column
 *
 * @method     array findById(int $id) Return EnderecoCorreio objects filtered by the id column
 * @method     array findByUfId(int $uf_id) Return EnderecoCorreio objects filtered by the uf_id column
 * @method     array findByLogradouro(string $logradouro) Return EnderecoCorreio objects filtered by the logradouro column
 * @method     array findByBairro(string $bairro) Return EnderecoCorreio objects filtered by the bairro column
 * @method     array findByCidade(string $cidade) Return EnderecoCorreio objects filtered by the cidade column
 * @method     array findByCep(string $cep) Return EnderecoCorreio objects filtered by the cep column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseEnderecoCorreioQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseEnderecoCorreioQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'EnderecoCorreio', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new EnderecoCorreioQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    EnderecoCorreioQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof EnderecoCorreioQuery) {
			return $criteria;
		}
		$query = new EnderecoCorreioQuery();
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
	 * @return    EnderecoCorreio|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = EnderecoCorreioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(EnderecoCorreioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    EnderecoCorreio A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `UF_ID`, `LOGRADOURO`, `BAIRRO`, `CIDADE`, `CEP` FROM `endereco_correio` WHERE `ID` = :p0';
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
			$obj = new EnderecoCorreio();
			$obj->hydrate($row);
			EnderecoCorreioPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    EnderecoCorreio|array|mixed the result, formatted by the current formatter
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
	 * @return    EnderecoCorreioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(EnderecoCorreioPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    EnderecoCorreioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(EnderecoCorreioPeer::ID, $keys, Criteria::IN);
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
	 * @return    EnderecoCorreioQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(EnderecoCorreioPeer::ID, $id, $comparison);
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
	 * @return    EnderecoCorreioQuery The current query, for fluid interface
	 */
	public function filterByUfId($ufId = null, $comparison = null)
	{
		if (is_array($ufId)) {
			$useMinMax = false;
			if (isset($ufId['min'])) {
				$this->addUsingAlias(EnderecoCorreioPeer::UF_ID, $ufId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($ufId['max'])) {
				$this->addUsingAlias(EnderecoCorreioPeer::UF_ID, $ufId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EnderecoCorreioPeer::UF_ID, $ufId, $comparison);
	}

	/**
	 * Filter the query on the logradouro column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLogradouro('fooValue');   // WHERE logradouro = 'fooValue'
	 * $query->filterByLogradouro('%fooValue%'); // WHERE logradouro LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $logradouro The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EnderecoCorreioQuery The current query, for fluid interface
	 */
	public function filterByLogradouro($logradouro = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($logradouro)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $logradouro)) {
				$logradouro = str_replace('*', '%', $logradouro);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EnderecoCorreioPeer::LOGRADOURO, $logradouro, $comparison);
	}

	/**
	 * Filter the query on the bairro column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByBairro('fooValue');   // WHERE bairro = 'fooValue'
	 * $query->filterByBairro('%fooValue%'); // WHERE bairro LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $bairro The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EnderecoCorreioQuery The current query, for fluid interface
	 */
	public function filterByBairro($bairro = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($bairro)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $bairro)) {
				$bairro = str_replace('*', '%', $bairro);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EnderecoCorreioPeer::BAIRRO, $bairro, $comparison);
	}

	/**
	 * Filter the query on the cidade column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCidade('fooValue');   // WHERE cidade = 'fooValue'
	 * $query->filterByCidade('%fooValue%'); // WHERE cidade LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $cidade The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EnderecoCorreioQuery The current query, for fluid interface
	 */
	public function filterByCidade($cidade = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($cidade)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $cidade)) {
				$cidade = str_replace('*', '%', $cidade);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EnderecoCorreioPeer::CIDADE, $cidade, $comparison);
	}

	/**
	 * Filter the query on the cep column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCep('fooValue');   // WHERE cep = 'fooValue'
	 * $query->filterByCep('%fooValue%'); // WHERE cep LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $cep The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EnderecoCorreioQuery The current query, for fluid interface
	 */
	public function filterByCep($cep = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($cep)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $cep)) {
				$cep = str_replace('*', '%', $cep);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EnderecoCorreioPeer::CEP, $cep, $comparison);
	}

	/**
	 * Filter the query by a related Uf object
	 *
	 * @param     Uf|PropelCollection $uf The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EnderecoCorreioQuery The current query, for fluid interface
	 */
	public function filterByUf($uf, $comparison = null)
	{
		if ($uf instanceof Uf) {
			return $this
				->addUsingAlias(EnderecoCorreioPeer::UF_ID, $uf->getId(), $comparison);
		} elseif ($uf instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(EnderecoCorreioPeer::UF_ID, $uf->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    EnderecoCorreioQuery The current query, for fluid interface
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
	 * @param     EnderecoCorreio $enderecoCorreio Object to remove from the list of results
	 *
	 * @return    EnderecoCorreioQuery The current query, for fluid interface
	 */
	public function prune($enderecoCorreio = null)
	{
		if ($enderecoCorreio) {
			$this->addUsingAlias(EnderecoCorreioPeer::ID, $enderecoCorreio->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseEnderecoCorreioQuery