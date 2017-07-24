<?php


/**
 * Base class that represents a query for the 'valor_ponto_avaliacao_forum' table.
 *
 * 
 *
 * @method     ValorPontoAvaliacaoForumQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ValorPontoAvaliacaoForumQuery orderByNota($order = Criteria::ASC) Order by the nota column
 * @method     ValorPontoAvaliacaoForumQuery orderByValor($order = Criteria::ASC) Order by the valor column
 *
 * @method     ValorPontoAvaliacaoForumQuery groupById() Group by the id column
 * @method     ValorPontoAvaliacaoForumQuery groupByNota() Group by the nota column
 * @method     ValorPontoAvaliacaoForumQuery groupByValor() Group by the valor column
 *
 * @method     ValorPontoAvaliacaoForumQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ValorPontoAvaliacaoForumQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ValorPontoAvaliacaoForumQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ValorPontoAvaliacaoForum findOne(PropelPDO $con = null) Return the first ValorPontoAvaliacaoForum matching the query
 * @method     ValorPontoAvaliacaoForum findOneOrCreate(PropelPDO $con = null) Return the first ValorPontoAvaliacaoForum matching the query, or a new ValorPontoAvaliacaoForum object populated from the query conditions when no match is found
 *
 * @method     ValorPontoAvaliacaoForum findOneById(int $id) Return the first ValorPontoAvaliacaoForum filtered by the id column
 * @method     ValorPontoAvaliacaoForum findOneByNota(string $nota) Return the first ValorPontoAvaliacaoForum filtered by the nota column
 * @method     ValorPontoAvaliacaoForum findOneByValor(string $valor) Return the first ValorPontoAvaliacaoForum filtered by the valor column
 *
 * @method     array findById(int $id) Return ValorPontoAvaliacaoForum objects filtered by the id column
 * @method     array findByNota(string $nota) Return ValorPontoAvaliacaoForum objects filtered by the nota column
 * @method     array findByValor(string $valor) Return ValorPontoAvaliacaoForum objects filtered by the valor column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseValorPontoAvaliacaoForumQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseValorPontoAvaliacaoForumQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'ValorPontoAvaliacaoForum', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ValorPontoAvaliacaoForumQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ValorPontoAvaliacaoForumQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ValorPontoAvaliacaoForumQuery) {
			return $criteria;
		}
		$query = new ValorPontoAvaliacaoForumQuery();
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
	 * @return    ValorPontoAvaliacaoForum|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ValorPontoAvaliacaoForumPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ValorPontoAvaliacaoForumPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    ValorPontoAvaliacaoForum A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NOTA`, `VALOR` FROM `valor_ponto_avaliacao_forum` WHERE `ID` = :p0';
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
			$obj = new ValorPontoAvaliacaoForum();
			$obj->hydrate($row);
			ValorPontoAvaliacaoForumPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    ValorPontoAvaliacaoForum|array|mixed the result, formatted by the current formatter
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
	 * @return    ValorPontoAvaliacaoForumQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ValorPontoAvaliacaoForumPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ValorPontoAvaliacaoForumQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ValorPontoAvaliacaoForumPeer::ID, $keys, Criteria::IN);
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
	 * @return    ValorPontoAvaliacaoForumQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ValorPontoAvaliacaoForumPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the nota column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNota('fooValue');   // WHERE nota = 'fooValue'
	 * $query->filterByNota('%fooValue%'); // WHERE nota LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nota The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ValorPontoAvaliacaoForumQuery The current query, for fluid interface
	 */
	public function filterByNota($nota = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nota)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nota)) {
				$nota = str_replace('*', '%', $nota);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ValorPontoAvaliacaoForumPeer::NOTA, $nota, $comparison);
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
	 * @return    ValorPontoAvaliacaoForumQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ValorPontoAvaliacaoForumPeer::VALOR, $valor, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ValorPontoAvaliacaoForum $valorPontoAvaliacaoForum Object to remove from the list of results
	 *
	 * @return    ValorPontoAvaliacaoForumQuery The current query, for fluid interface
	 */
	public function prune($valorPontoAvaliacaoForum = null)
	{
		if ($valorPontoAvaliacaoForum) {
			$this->addUsingAlias(ValorPontoAvaliacaoForumPeer::ID, $valorPontoAvaliacaoForum->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseValorPontoAvaliacaoForumQuery