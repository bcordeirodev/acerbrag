<?php


/**
 * Base class that represents a query for the 'andamento_processo' table.
 *
 * 
 *
 * @method     AndamentoProcessoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AndamentoProcessoQuery orderByProcessoId($order = Criteria::ASC) Order by the processo_id column
 * @method     AndamentoProcessoQuery orderByNumero($order = Criteria::ASC) Order by the numero column
 * @method     AndamentoProcessoQuery orderByTitulo($order = Criteria::ASC) Order by the titulo column
 * @method     AndamentoProcessoQuery orderByComplemento($order = Criteria::ASC) Order by the complemento column
 * @method     AndamentoProcessoQuery orderByDataAndamento($order = Criteria::ASC) Order by the data_andamento column
 * @method     AndamentoProcessoQuery orderByDataPush($order = Criteria::ASC) Order by the data_push column
 *
 * @method     AndamentoProcessoQuery groupById() Group by the id column
 * @method     AndamentoProcessoQuery groupByProcessoId() Group by the processo_id column
 * @method     AndamentoProcessoQuery groupByNumero() Group by the numero column
 * @method     AndamentoProcessoQuery groupByTitulo() Group by the titulo column
 * @method     AndamentoProcessoQuery groupByComplemento() Group by the complemento column
 * @method     AndamentoProcessoQuery groupByDataAndamento() Group by the data_andamento column
 * @method     AndamentoProcessoQuery groupByDataPush() Group by the data_push column
 *
 * @method     AndamentoProcessoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AndamentoProcessoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AndamentoProcessoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AndamentoProcessoQuery leftJoinProcesso($relationAlias = null) Adds a LEFT JOIN clause to the query using the Processo relation
 * @method     AndamentoProcessoQuery rightJoinProcesso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Processo relation
 * @method     AndamentoProcessoQuery innerJoinProcesso($relationAlias = null) Adds a INNER JOIN clause to the query using the Processo relation
 *
 * @method     AndamentoProcesso findOne(PropelPDO $con = null) Return the first AndamentoProcesso matching the query
 * @method     AndamentoProcesso findOneOrCreate(PropelPDO $con = null) Return the first AndamentoProcesso matching the query, or a new AndamentoProcesso object populated from the query conditions when no match is found
 *
 * @method     AndamentoProcesso findOneById(int $id) Return the first AndamentoProcesso filtered by the id column
 * @method     AndamentoProcesso findOneByProcessoId(int $processo_id) Return the first AndamentoProcesso filtered by the processo_id column
 * @method     AndamentoProcesso findOneByNumero(string $numero) Return the first AndamentoProcesso filtered by the numero column
 * @method     AndamentoProcesso findOneByTitulo(string $titulo) Return the first AndamentoProcesso filtered by the titulo column
 * @method     AndamentoProcesso findOneByComplemento(string $complemento) Return the first AndamentoProcesso filtered by the complemento column
 * @method     AndamentoProcesso findOneByDataAndamento(string $data_andamento) Return the first AndamentoProcesso filtered by the data_andamento column
 * @method     AndamentoProcesso findOneByDataPush(string $data_push) Return the first AndamentoProcesso filtered by the data_push column
 *
 * @method     array findById(int $id) Return AndamentoProcesso objects filtered by the id column
 * @method     array findByProcessoId(int $processo_id) Return AndamentoProcesso objects filtered by the processo_id column
 * @method     array findByNumero(string $numero) Return AndamentoProcesso objects filtered by the numero column
 * @method     array findByTitulo(string $titulo) Return AndamentoProcesso objects filtered by the titulo column
 * @method     array findByComplemento(string $complemento) Return AndamentoProcesso objects filtered by the complemento column
 * @method     array findByDataAndamento(string $data_andamento) Return AndamentoProcesso objects filtered by the data_andamento column
 * @method     array findByDataPush(string $data_push) Return AndamentoProcesso objects filtered by the data_push column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseAndamentoProcessoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseAndamentoProcessoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'AndamentoProcesso', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AndamentoProcessoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AndamentoProcessoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AndamentoProcessoQuery) {
			return $criteria;
		}
		$query = new AndamentoProcessoQuery();
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
	 * @return    AndamentoProcesso|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = AndamentoProcessoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(AndamentoProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    AndamentoProcesso A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `PROCESSO_ID`, `NUMERO`, `TITULO`, `COMPLEMENTO`, `DATA_ANDAMENTO`, `DATA_PUSH` FROM `andamento_processo` WHERE `ID` = :p0';
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
			$obj = new AndamentoProcesso();
			$obj->hydrate($row);
			AndamentoProcessoPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    AndamentoProcesso|array|mixed the result, formatted by the current formatter
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
	 * @return    AndamentoProcessoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AndamentoProcessoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AndamentoProcessoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AndamentoProcessoPeer::ID, $keys, Criteria::IN);
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
	 * @return    AndamentoProcessoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AndamentoProcessoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the processo_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByProcessoId(1234); // WHERE processo_id = 1234
	 * $query->filterByProcessoId(array(12, 34)); // WHERE processo_id IN (12, 34)
	 * $query->filterByProcessoId(array('min' => 12)); // WHERE processo_id > 12
	 * </code>
	 *
	 * @see       filterByProcesso()
	 *
	 * @param     mixed $processoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AndamentoProcessoQuery The current query, for fluid interface
	 */
	public function filterByProcessoId($processoId = null, $comparison = null)
	{
		if (is_array($processoId)) {
			$useMinMax = false;
			if (isset($processoId['min'])) {
				$this->addUsingAlias(AndamentoProcessoPeer::PROCESSO_ID, $processoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($processoId['max'])) {
				$this->addUsingAlias(AndamentoProcessoPeer::PROCESSO_ID, $processoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AndamentoProcessoPeer::PROCESSO_ID, $processoId, $comparison);
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
	 * @return    AndamentoProcessoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AndamentoProcessoPeer::NUMERO, $numero, $comparison);
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
	 * @return    AndamentoProcessoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AndamentoProcessoPeer::TITULO, $titulo, $comparison);
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
	 * @return    AndamentoProcessoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AndamentoProcessoPeer::COMPLEMENTO, $complemento, $comparison);
	}

	/**
	 * Filter the query on the data_andamento column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataAndamento('2011-03-14'); // WHERE data_andamento = '2011-03-14'
	 * $query->filterByDataAndamento('now'); // WHERE data_andamento = '2011-03-14'
	 * $query->filterByDataAndamento(array('max' => 'yesterday')); // WHERE data_andamento > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataAndamento The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AndamentoProcessoQuery The current query, for fluid interface
	 */
	public function filterByDataAndamento($dataAndamento = null, $comparison = null)
	{
		if (is_array($dataAndamento)) {
			$useMinMax = false;
			if (isset($dataAndamento['min'])) {
				$this->addUsingAlias(AndamentoProcessoPeer::DATA_ANDAMENTO, $dataAndamento['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataAndamento['max'])) {
				$this->addUsingAlias(AndamentoProcessoPeer::DATA_ANDAMENTO, $dataAndamento['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AndamentoProcessoPeer::DATA_ANDAMENTO, $dataAndamento, $comparison);
	}

	/**
	 * Filter the query on the data_push column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataPush('2011-03-14'); // WHERE data_push = '2011-03-14'
	 * $query->filterByDataPush('now'); // WHERE data_push = '2011-03-14'
	 * $query->filterByDataPush(array('max' => 'yesterday')); // WHERE data_push > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataPush The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AndamentoProcessoQuery The current query, for fluid interface
	 */
	public function filterByDataPush($dataPush = null, $comparison = null)
	{
		if (is_array($dataPush)) {
			$useMinMax = false;
			if (isset($dataPush['min'])) {
				$this->addUsingAlias(AndamentoProcessoPeer::DATA_PUSH, $dataPush['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataPush['max'])) {
				$this->addUsingAlias(AndamentoProcessoPeer::DATA_PUSH, $dataPush['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AndamentoProcessoPeer::DATA_PUSH, $dataPush, $comparison);
	}

	/**
	 * Filter the query by a related Processo object
	 *
	 * @param     Processo|PropelCollection $processo The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AndamentoProcessoQuery The current query, for fluid interface
	 */
	public function filterByProcesso($processo, $comparison = null)
	{
		if ($processo instanceof Processo) {
			return $this
				->addUsingAlias(AndamentoProcessoPeer::PROCESSO_ID, $processo->getId(), $comparison);
		} elseif ($processo instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AndamentoProcessoPeer::PROCESSO_ID, $processo->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByProcesso() only accepts arguments of type Processo or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Processo relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AndamentoProcessoQuery The current query, for fluid interface
	 */
	public function joinProcesso($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Processo');

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
			$this->addJoinObject($join, 'Processo');
		}

		return $this;
	}

	/**
	 * Use the Processo relation Processo object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProcessoQuery A secondary query class using the current class as primary query
	 */
	public function useProcessoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinProcesso($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Processo', 'ProcessoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     AndamentoProcesso $andamentoProcesso Object to remove from the list of results
	 *
	 * @return    AndamentoProcessoQuery The current query, for fluid interface
	 */
	public function prune($andamentoProcesso = null)
	{
		if ($andamentoProcesso) {
			$this->addUsingAlias(AndamentoProcessoPeer::ID, $andamentoProcesso->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseAndamentoProcessoQuery