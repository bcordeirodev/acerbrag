<?php


/**
 * Base class that represents a query for the 'categoria' table.
 *
 * 
 *
 * @method     CategoriaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     CategoriaQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     CategoriaQuery orderByPosicao($order = Criteria::ASC) Order by the posicao column
 *
 * @method     CategoriaQuery groupById() Group by the id column
 * @method     CategoriaQuery groupByNome() Group by the nome column
 * @method     CategoriaQuery groupByPosicao() Group by the posicao column
 *
 * @method     CategoriaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     CategoriaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     CategoriaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     CategoriaQuery leftJoinPergunta($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pergunta relation
 * @method     CategoriaQuery rightJoinPergunta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pergunta relation
 * @method     CategoriaQuery innerJoinPergunta($relationAlias = null) Adds a INNER JOIN clause to the query using the Pergunta relation
 *
 * @method     Categoria findOne(PropelPDO $con = null) Return the first Categoria matching the query
 * @method     Categoria findOneOrCreate(PropelPDO $con = null) Return the first Categoria matching the query, or a new Categoria object populated from the query conditions when no match is found
 *
 * @method     Categoria findOneById(int $id) Return the first Categoria filtered by the id column
 * @method     Categoria findOneByNome(string $nome) Return the first Categoria filtered by the nome column
 * @method     Categoria findOneByPosicao(int $posicao) Return the first Categoria filtered by the posicao column
 *
 * @method     array findById(int $id) Return Categoria objects filtered by the id column
 * @method     array findByNome(string $nome) Return Categoria objects filtered by the nome column
 * @method     array findByPosicao(int $posicao) Return Categoria objects filtered by the posicao column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseCategoriaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseCategoriaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Categoria', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new CategoriaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    CategoriaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof CategoriaQuery) {
			return $criteria;
		}
		$query = new CategoriaQuery();
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
	 * @return    Categoria|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = CategoriaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(CategoriaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Categoria A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NOME`, `POSICAO` FROM `categoria` WHERE `ID` = :p0';
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
			$obj = new Categoria();
			$obj->hydrate($row);
			CategoriaPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Categoria|array|mixed the result, formatted by the current formatter
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
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(CategoriaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(CategoriaPeer::ID, $keys, Criteria::IN);
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
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(CategoriaPeer::ID, $id, $comparison);
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
	 * @return    CategoriaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(CategoriaPeer::NOME, $nome, $comparison);
	}

	/**
	 * Filter the query on the posicao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPosicao(1234); // WHERE posicao = 1234
	 * $query->filterByPosicao(array(12, 34)); // WHERE posicao IN (12, 34)
	 * $query->filterByPosicao(array('min' => 12)); // WHERE posicao > 12
	 * </code>
	 *
	 * @param     mixed $posicao The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterByPosicao($posicao = null, $comparison = null)
	{
		if (is_array($posicao)) {
			$useMinMax = false;
			if (isset($posicao['min'])) {
				$this->addUsingAlias(CategoriaPeer::POSICAO, $posicao['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($posicao['max'])) {
				$this->addUsingAlias(CategoriaPeer::POSICAO, $posicao['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(CategoriaPeer::POSICAO, $posicao, $comparison);
	}

	/**
	 * Filter the query by a related Pergunta object
	 *
	 * @param     Pergunta $pergunta  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function filterByPergunta($pergunta, $comparison = null)
	{
		if ($pergunta instanceof Pergunta) {
			return $this
				->addUsingAlias(CategoriaPeer::ID, $pergunta->getCategoriaId(), $comparison);
		} elseif ($pergunta instanceof PropelCollection) {
			return $this
				->usePerguntaQuery()
				->filterByPrimaryKeys($pergunta->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByPergunta() only accepts arguments of type Pergunta or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Pergunta relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function joinPergunta($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Pergunta');

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
			$this->addJoinObject($join, 'Pergunta');
		}

		return $this;
	}

	/**
	 * Use the Pergunta relation Pergunta object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PerguntaQuery A secondary query class using the current class as primary query
	 */
	public function usePerguntaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPergunta($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Pergunta', 'PerguntaQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Categoria $categoria Object to remove from the list of results
	 *
	 * @return    CategoriaQuery The current query, for fluid interface
	 */
	public function prune($categoria = null)
	{
		if ($categoria) {
			$this->addUsingAlias(CategoriaPeer::ID, $categoria->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseCategoriaQuery