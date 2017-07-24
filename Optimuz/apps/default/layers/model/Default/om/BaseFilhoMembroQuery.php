<?php


/**
 * Base class that represents a query for the 'filho_membro' table.
 *
 * 
 *
 * @method     FilhoMembroQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     FilhoMembroQuery orderByMembroId($order = Criteria::ASC) Order by the membro_id column
 * @method     FilhoMembroQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     FilhoMembroQuery orderByDataNascimento($order = Criteria::ASC) Order by the data_nascimento column
 * @method     FilhoMembroQuery orderByCristao($order = Criteria::ASC) Order by the cristao column
 *
 * @method     FilhoMembroQuery groupById() Group by the id column
 * @method     FilhoMembroQuery groupByMembroId() Group by the membro_id column
 * @method     FilhoMembroQuery groupByNome() Group by the nome column
 * @method     FilhoMembroQuery groupByDataNascimento() Group by the data_nascimento column
 * @method     FilhoMembroQuery groupByCristao() Group by the cristao column
 *
 * @method     FilhoMembroQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     FilhoMembroQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     FilhoMembroQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     FilhoMembroQuery leftJoinMembro($relationAlias = null) Adds a LEFT JOIN clause to the query using the Membro relation
 * @method     FilhoMembroQuery rightJoinMembro($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Membro relation
 * @method     FilhoMembroQuery innerJoinMembro($relationAlias = null) Adds a INNER JOIN clause to the query using the Membro relation
 *
 * @method     FilhoMembro findOne(PropelPDO $con = null) Return the first FilhoMembro matching the query
 * @method     FilhoMembro findOneOrCreate(PropelPDO $con = null) Return the first FilhoMembro matching the query, or a new FilhoMembro object populated from the query conditions when no match is found
 *
 * @method     FilhoMembro findOneById(int $id) Return the first FilhoMembro filtered by the id column
 * @method     FilhoMembro findOneByMembroId(int $membro_id) Return the first FilhoMembro filtered by the membro_id column
 * @method     FilhoMembro findOneByNome(string $nome) Return the first FilhoMembro filtered by the nome column
 * @method     FilhoMembro findOneByDataNascimento(string $data_nascimento) Return the first FilhoMembro filtered by the data_nascimento column
 * @method     FilhoMembro findOneByCristao(boolean $cristao) Return the first FilhoMembro filtered by the cristao column
 *
 * @method     array findById(int $id) Return FilhoMembro objects filtered by the id column
 * @method     array findByMembroId(int $membro_id) Return FilhoMembro objects filtered by the membro_id column
 * @method     array findByNome(string $nome) Return FilhoMembro objects filtered by the nome column
 * @method     array findByDataNascimento(string $data_nascimento) Return FilhoMembro objects filtered by the data_nascimento column
 * @method     array findByCristao(boolean $cristao) Return FilhoMembro objects filtered by the cristao column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseFilhoMembroQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseFilhoMembroQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'FilhoMembro', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new FilhoMembroQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    FilhoMembroQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof FilhoMembroQuery) {
			return $criteria;
		}
		$query = new FilhoMembroQuery();
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
	 * @return    FilhoMembro|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = FilhoMembroPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(FilhoMembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    FilhoMembro A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `MEMBRO_ID`, `NOME`, `DATA_NASCIMENTO`, `CRISTAO` FROM `filho_membro` WHERE `ID` = :p0';
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
			$obj = new FilhoMembro();
			$obj->hydrate($row);
			FilhoMembroPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    FilhoMembro|array|mixed the result, formatted by the current formatter
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
	 * @return    FilhoMembroQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(FilhoMembroPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    FilhoMembroQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(FilhoMembroPeer::ID, $keys, Criteria::IN);
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
	 * @return    FilhoMembroQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(FilhoMembroPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the membro_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMembroId(1234); // WHERE membro_id = 1234
	 * $query->filterByMembroId(array(12, 34)); // WHERE membro_id IN (12, 34)
	 * $query->filterByMembroId(array('min' => 12)); // WHERE membro_id > 12
	 * </code>
	 *
	 * @see       filterByMembro()
	 *
	 * @param     mixed $membroId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FilhoMembroQuery The current query, for fluid interface
	 */
	public function filterByMembroId($membroId = null, $comparison = null)
	{
		if (is_array($membroId)) {
			$useMinMax = false;
			if (isset($membroId['min'])) {
				$this->addUsingAlias(FilhoMembroPeer::MEMBRO_ID, $membroId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($membroId['max'])) {
				$this->addUsingAlias(FilhoMembroPeer::MEMBRO_ID, $membroId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(FilhoMembroPeer::MEMBRO_ID, $membroId, $comparison);
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
	 * @return    FilhoMembroQuery The current query, for fluid interface
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
		return $this->addUsingAlias(FilhoMembroPeer::NOME, $nome, $comparison);
	}

	/**
	 * Filter the query on the data_nascimento column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataNascimento('2011-03-14'); // WHERE data_nascimento = '2011-03-14'
	 * $query->filterByDataNascimento('now'); // WHERE data_nascimento = '2011-03-14'
	 * $query->filterByDataNascimento(array('max' => 'yesterday')); // WHERE data_nascimento > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataNascimento The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FilhoMembroQuery The current query, for fluid interface
	 */
	public function filterByDataNascimento($dataNascimento = null, $comparison = null)
	{
		if (is_array($dataNascimento)) {
			$useMinMax = false;
			if (isset($dataNascimento['min'])) {
				$this->addUsingAlias(FilhoMembroPeer::DATA_NASCIMENTO, $dataNascimento['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataNascimento['max'])) {
				$this->addUsingAlias(FilhoMembroPeer::DATA_NASCIMENTO, $dataNascimento['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(FilhoMembroPeer::DATA_NASCIMENTO, $dataNascimento, $comparison);
	}

	/**
	 * Filter the query on the cristao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCristao(true); // WHERE cristao = true
	 * $query->filterByCristao('yes'); // WHERE cristao = true
	 * </code>
	 *
	 * @param     boolean|string $cristao The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FilhoMembroQuery The current query, for fluid interface
	 */
	public function filterByCristao($cristao = null, $comparison = null)
	{
		if (is_string($cristao)) {
			$cristao = in_array(strtolower($cristao), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(FilhoMembroPeer::CRISTAO, $cristao, $comparison);
	}

	/**
	 * Filter the query by a related Membro object
	 *
	 * @param     Membro|PropelCollection $membro The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FilhoMembroQuery The current query, for fluid interface
	 */
	public function filterByMembro($membro, $comparison = null)
	{
		if ($membro instanceof Membro) {
			return $this
				->addUsingAlias(FilhoMembroPeer::MEMBRO_ID, $membro->getId(), $comparison);
		} elseif ($membro instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(FilhoMembroPeer::MEMBRO_ID, $membro->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    FilhoMembroQuery The current query, for fluid interface
	 */
	public function joinMembro($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useMembroQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinMembro($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Membro', 'MembroQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     FilhoMembro $filhoMembro Object to remove from the list of results
	 *
	 * @return    FilhoMembroQuery The current query, for fluid interface
	 */
	public function prune($filhoMembro = null)
	{
		if ($filhoMembro) {
			$this->addUsingAlias(FilhoMembroPeer::ID, $filhoMembro->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseFilhoMembroQuery