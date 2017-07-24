<?php


/**
 * Base class that represents a query for the 'contato_igreja' table.
 *
 * 
 *
 * @method     ContatoIgrejaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ContatoIgrejaQuery orderByIgrejaId($order = Criteria::ASC) Order by the igreja_id column
 * @method     ContatoIgrejaQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 * @method     ContatoIgrejaQuery orderByValor($order = Criteria::ASC) Order by the valor column
 *
 * @method     ContatoIgrejaQuery groupById() Group by the id column
 * @method     ContatoIgrejaQuery groupByIgrejaId() Group by the igreja_id column
 * @method     ContatoIgrejaQuery groupByDescricao() Group by the descricao column
 * @method     ContatoIgrejaQuery groupByValor() Group by the valor column
 *
 * @method     ContatoIgrejaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ContatoIgrejaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ContatoIgrejaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ContatoIgrejaQuery leftJoinIgreja($relationAlias = null) Adds a LEFT JOIN clause to the query using the Igreja relation
 * @method     ContatoIgrejaQuery rightJoinIgreja($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Igreja relation
 * @method     ContatoIgrejaQuery innerJoinIgreja($relationAlias = null) Adds a INNER JOIN clause to the query using the Igreja relation
 *
 * @method     ContatoIgreja findOne(PropelPDO $con = null) Return the first ContatoIgreja matching the query
 * @method     ContatoIgreja findOneOrCreate(PropelPDO $con = null) Return the first ContatoIgreja matching the query, or a new ContatoIgreja object populated from the query conditions when no match is found
 *
 * @method     ContatoIgreja findOneById(int $id) Return the first ContatoIgreja filtered by the id column
 * @method     ContatoIgreja findOneByIgrejaId(int $igreja_id) Return the first ContatoIgreja filtered by the igreja_id column
 * @method     ContatoIgreja findOneByDescricao(string $descricao) Return the first ContatoIgreja filtered by the descricao column
 * @method     ContatoIgreja findOneByValor(string $valor) Return the first ContatoIgreja filtered by the valor column
 *
 * @method     array findById(int $id) Return ContatoIgreja objects filtered by the id column
 * @method     array findByIgrejaId(int $igreja_id) Return ContatoIgreja objects filtered by the igreja_id column
 * @method     array findByDescricao(string $descricao) Return ContatoIgreja objects filtered by the descricao column
 * @method     array findByValor(string $valor) Return ContatoIgreja objects filtered by the valor column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseContatoIgrejaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseContatoIgrejaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'ContatoIgreja', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ContatoIgrejaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ContatoIgrejaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ContatoIgrejaQuery) {
			return $criteria;
		}
		$query = new ContatoIgrejaQuery();
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
	 * @return    ContatoIgreja|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ContatoIgrejaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ContatoIgrejaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    ContatoIgreja A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `IGREJA_ID`, `DESCRICAO`, `VALOR` FROM `contato_igreja` WHERE `ID` = :p0';
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
			$obj = new ContatoIgreja();
			$obj->hydrate($row);
			ContatoIgrejaPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    ContatoIgreja|array|mixed the result, formatted by the current formatter
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
	 * @return    ContatoIgrejaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ContatoIgrejaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ContatoIgrejaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ContatoIgrejaPeer::ID, $keys, Criteria::IN);
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
	 * @return    ContatoIgrejaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ContatoIgrejaPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the igreja_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIgrejaId(1234); // WHERE igreja_id = 1234
	 * $query->filterByIgrejaId(array(12, 34)); // WHERE igreja_id IN (12, 34)
	 * $query->filterByIgrejaId(array('min' => 12)); // WHERE igreja_id > 12
	 * </code>
	 *
	 * @see       filterByIgreja()
	 *
	 * @param     mixed $igrejaId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ContatoIgrejaQuery The current query, for fluid interface
	 */
	public function filterByIgrejaId($igrejaId = null, $comparison = null)
	{
		if (is_array($igrejaId)) {
			$useMinMax = false;
			if (isset($igrejaId['min'])) {
				$this->addUsingAlias(ContatoIgrejaPeer::IGREJA_ID, $igrejaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($igrejaId['max'])) {
				$this->addUsingAlias(ContatoIgrejaPeer::IGREJA_ID, $igrejaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ContatoIgrejaPeer::IGREJA_ID, $igrejaId, $comparison);
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
	 * @return    ContatoIgrejaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ContatoIgrejaPeer::DESCRICAO, $descricao, $comparison);
	}

	/**
	 * Filter the query on the valor column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByValor('fooValue');   // WHERE valor = 'fooValue'
	 * $query->filterByValor('%fooValue%'); // WHERE valor LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $valor The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ContatoIgrejaQuery The current query, for fluid interface
	 */
	public function filterByValor($valor = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($valor)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $valor)) {
				$valor = str_replace('*', '%', $valor);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ContatoIgrejaPeer::VALOR, $valor, $comparison);
	}

	/**
	 * Filter the query by a related Igreja object
	 *
	 * @param     Igreja|PropelCollection $igreja The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ContatoIgrejaQuery The current query, for fluid interface
	 */
	public function filterByIgreja($igreja, $comparison = null)
	{
		if ($igreja instanceof Igreja) {
			return $this
				->addUsingAlias(ContatoIgrejaPeer::IGREJA_ID, $igreja->getId(), $comparison);
		} elseif ($igreja instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ContatoIgrejaPeer::IGREJA_ID, $igreja->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByIgreja() only accepts arguments of type Igreja or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Igreja relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ContatoIgrejaQuery The current query, for fluid interface
	 */
	public function joinIgreja($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Igreja');

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
			$this->addJoinObject($join, 'Igreja');
		}

		return $this;
	}

	/**
	 * Use the Igreja relation Igreja object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery A secondary query class using the current class as primary query
	 */
	public function useIgrejaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinIgreja($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Igreja', 'IgrejaQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ContatoIgreja $contatoIgreja Object to remove from the list of results
	 *
	 * @return    ContatoIgrejaQuery The current query, for fluid interface
	 */
	public function prune($contatoIgreja = null)
	{
		if ($contatoIgreja) {
			$this->addUsingAlias(ContatoIgrejaPeer::ID, $contatoIgreja->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseContatoIgrejaQuery