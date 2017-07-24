<?php


/**
 * Base class that represents a query for the 'endereco1' table.
 *
 * 
 *
 * @method     Endereco1Query orderById($order = Criteria::ASC) Order by the id column
 * @method     Endereco1Query orderByCidadeId($order = Criteria::ASC) Order by the cidade_id column
 * @method     Endereco1Query orderByLogradouro($order = Criteria::ASC) Order by the logradouro column
 * @method     Endereco1Query orderByBairro($order = Criteria::ASC) Order by the bairro column
 * @method     Endereco1Query orderByCep($order = Criteria::ASC) Order by the cep column
 * @method     Endereco1Query orderByNumero($order = Criteria::ASC) Order by the numero column
 * @method     Endereco1Query orderByComplemento($order = Criteria::ASC) Order by the complemento column
 *
 * @method     Endereco1Query groupById() Group by the id column
 * @method     Endereco1Query groupByCidadeId() Group by the cidade_id column
 * @method     Endereco1Query groupByLogradouro() Group by the logradouro column
 * @method     Endereco1Query groupByBairro() Group by the bairro column
 * @method     Endereco1Query groupByCep() Group by the cep column
 * @method     Endereco1Query groupByNumero() Group by the numero column
 * @method     Endereco1Query groupByComplemento() Group by the complemento column
 *
 * @method     Endereco1Query leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     Endereco1Query rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     Endereco1Query innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Endereco1Query leftJoinCidade($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cidade relation
 * @method     Endereco1Query rightJoinCidade($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cidade relation
 * @method     Endereco1Query innerJoinCidade($relationAlias = null) Adds a INNER JOIN clause to the query using the Cidade relation
 *
 * @method     Endereco1Query leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     Endereco1Query rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     Endereco1Query innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     Endereco1 findOne(PropelPDO $con = null) Return the first Endereco1 matching the query
 * @method     Endereco1 findOneOrCreate(PropelPDO $con = null) Return the first Endereco1 matching the query, or a new Endereco1 object populated from the query conditions when no match is found
 *
 * @method     Endereco1 findOneById(int $id) Return the first Endereco1 filtered by the id column
 * @method     Endereco1 findOneByCidadeId(int $cidade_id) Return the first Endereco1 filtered by the cidade_id column
 * @method     Endereco1 findOneByLogradouro(string $logradouro) Return the first Endereco1 filtered by the logradouro column
 * @method     Endereco1 findOneByBairro(string $bairro) Return the first Endereco1 filtered by the bairro column
 * @method     Endereco1 findOneByCep(string $cep) Return the first Endereco1 filtered by the cep column
 * @method     Endereco1 findOneByNumero(string $numero) Return the first Endereco1 filtered by the numero column
 * @method     Endereco1 findOneByComplemento(string $complemento) Return the first Endereco1 filtered by the complemento column
 *
 * @method     array findById(int $id) Return Endereco1 objects filtered by the id column
 * @method     array findByCidadeId(int $cidade_id) Return Endereco1 objects filtered by the cidade_id column
 * @method     array findByLogradouro(string $logradouro) Return Endereco1 objects filtered by the logradouro column
 * @method     array findByBairro(string $bairro) Return Endereco1 objects filtered by the bairro column
 * @method     array findByCep(string $cep) Return Endereco1 objects filtered by the cep column
 * @method     array findByNumero(string $numero) Return Endereco1 objects filtered by the numero column
 * @method     array findByComplemento(string $complemento) Return Endereco1 objects filtered by the complemento column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseEndereco1Query extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseEndereco1Query object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Endereco1', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new Endereco1Query object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    Endereco1Query
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof Endereco1Query) {
			return $criteria;
		}
		$query = new Endereco1Query();
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
	 * @return    Endereco1|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = Endereco1Peer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(Endereco1Peer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Endereco1 A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `CIDADE_ID`, `LOGRADOURO`, `BAIRRO`, `CEP`, `NUMERO`, `COMPLEMENTO` FROM `endereco1` WHERE `ID` = :p0';
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
			$obj = new Endereco1();
			$obj->hydrate($row);
			Endereco1Peer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Endereco1|array|mixed the result, formatted by the current formatter
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
	 * @return    Endereco1Query The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(Endereco1Peer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    Endereco1Query The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(Endereco1Peer::ID, $keys, Criteria::IN);
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
	 * @return    Endereco1Query The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(Endereco1Peer::ID, $id, $comparison);
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
	 * @see       filterByCidade()
	 *
	 * @param     mixed $cidadeId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Endereco1Query The current query, for fluid interface
	 */
	public function filterByCidadeId($cidadeId = null, $comparison = null)
	{
		if (is_array($cidadeId)) {
			$useMinMax = false;
			if (isset($cidadeId['min'])) {
				$this->addUsingAlias(Endereco1Peer::CIDADE_ID, $cidadeId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cidadeId['max'])) {
				$this->addUsingAlias(Endereco1Peer::CIDADE_ID, $cidadeId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(Endereco1Peer::CIDADE_ID, $cidadeId, $comparison);
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
	 * @return    Endereco1Query The current query, for fluid interface
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
		return $this->addUsingAlias(Endereco1Peer::LOGRADOURO, $logradouro, $comparison);
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
	 * @return    Endereco1Query The current query, for fluid interface
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
		return $this->addUsingAlias(Endereco1Peer::BAIRRO, $bairro, $comparison);
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
	 * @return    Endereco1Query The current query, for fluid interface
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
		return $this->addUsingAlias(Endereco1Peer::CEP, $cep, $comparison);
	}

	/**
	 * Filter the query on the numero column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNumero('fooValue');   // WHERE numero = 'fooValue'
	 * $query->filterByNumero('%fooValue%'); // WHERE numero LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $numero The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Endereco1Query The current query, for fluid interface
	 */
	public function filterByNumero($numero = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($numero)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $numero)) {
				$numero = str_replace('*', '%', $numero);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(Endereco1Peer::NUMERO, $numero, $comparison);
	}

	/**
	 * Filter the query on the complemento column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByComplemento('fooValue');   // WHERE complemento = 'fooValue'
	 * $query->filterByComplemento('%fooValue%'); // WHERE complemento LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $complemento The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Endereco1Query The current query, for fluid interface
	 */
	public function filterByComplemento($complemento = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($complemento)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $complemento)) {
				$complemento = str_replace('*', '%', $complemento);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(Endereco1Peer::COMPLEMENTO, $complemento, $comparison);
	}

	/**
	 * Filter the query by a related Cidade object
	 *
	 * @param     Cidade|PropelCollection $cidade The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Endereco1Query The current query, for fluid interface
	 */
	public function filterByCidade($cidade, $comparison = null)
	{
		if ($cidade instanceof Cidade) {
			return $this
				->addUsingAlias(Endereco1Peer::CIDADE_ID, $cidade->getId(), $comparison);
		} elseif ($cidade instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(Endereco1Peer::CIDADE_ID, $cidade->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    Endereco1Query The current query, for fluid interface
	 */
	public function joinCidade($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useCidadeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCidade($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Cidade', 'CidadeQuery');
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario $usuario  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Endereco1Query The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(Endereco1Peer::ID, $usuario->getEnderecoId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			return $this
				->useUsuarioQuery()
				->filterByPrimaryKeys($usuario->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByUsuario() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Usuario relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    Endereco1Query The current query, for fluid interface
	 */
	public function joinUsuario($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Usuario');

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
			$this->addJoinObject($join, 'Usuario');
		}

		return $this;
	}

	/**
	 * Use the Usuario relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUsuario($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Usuario', 'UsuarioQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Endereco1 $endereco1 Object to remove from the list of results
	 *
	 * @return    Endereco1Query The current query, for fluid interface
	 */
	public function prune($endereco1 = null)
	{
		if ($endereco1) {
			$this->addUsingAlias(Endereco1Peer::ID, $endereco1->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseEndereco1Query