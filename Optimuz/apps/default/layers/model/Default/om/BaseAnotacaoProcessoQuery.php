<?php


/**
 * Base class that represents a query for the 'anotacao_processo' table.
 *
 * 
 *
 * @method     AnotacaoProcessoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AnotacaoProcessoQuery orderByProcessoId($order = Criteria::ASC) Order by the processo_id column
 * @method     AnotacaoProcessoQuery orderByTitulo($order = Criteria::ASC) Order by the titulo column
 * @method     AnotacaoProcessoQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 * @method     AnotacaoProcessoQuery orderByDataCriacao($order = Criteria::ASC) Order by the data_criacao column
 *
 * @method     AnotacaoProcessoQuery groupById() Group by the id column
 * @method     AnotacaoProcessoQuery groupByProcessoId() Group by the processo_id column
 * @method     AnotacaoProcessoQuery groupByTitulo() Group by the titulo column
 * @method     AnotacaoProcessoQuery groupByDescricao() Group by the descricao column
 * @method     AnotacaoProcessoQuery groupByDataCriacao() Group by the data_criacao column
 *
 * @method     AnotacaoProcessoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AnotacaoProcessoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AnotacaoProcessoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AnotacaoProcessoQuery leftJoinProcesso($relationAlias = null) Adds a LEFT JOIN clause to the query using the Processo relation
 * @method     AnotacaoProcessoQuery rightJoinProcesso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Processo relation
 * @method     AnotacaoProcessoQuery innerJoinProcesso($relationAlias = null) Adds a INNER JOIN clause to the query using the Processo relation
 *
 * @method     AnotacaoProcesso findOne(PropelPDO $con = null) Return the first AnotacaoProcesso matching the query
 * @method     AnotacaoProcesso findOneOrCreate(PropelPDO $con = null) Return the first AnotacaoProcesso matching the query, or a new AnotacaoProcesso object populated from the query conditions when no match is found
 *
 * @method     AnotacaoProcesso findOneById(int $id) Return the first AnotacaoProcesso filtered by the id column
 * @method     AnotacaoProcesso findOneByProcessoId(int $processo_id) Return the first AnotacaoProcesso filtered by the processo_id column
 * @method     AnotacaoProcesso findOneByTitulo(string $titulo) Return the first AnotacaoProcesso filtered by the titulo column
 * @method     AnotacaoProcesso findOneByDescricao(string $descricao) Return the first AnotacaoProcesso filtered by the descricao column
 * @method     AnotacaoProcesso findOneByDataCriacao(string $data_criacao) Return the first AnotacaoProcesso filtered by the data_criacao column
 *
 * @method     array findById(int $id) Return AnotacaoProcesso objects filtered by the id column
 * @method     array findByProcessoId(int $processo_id) Return AnotacaoProcesso objects filtered by the processo_id column
 * @method     array findByTitulo(string $titulo) Return AnotacaoProcesso objects filtered by the titulo column
 * @method     array findByDescricao(string $descricao) Return AnotacaoProcesso objects filtered by the descricao column
 * @method     array findByDataCriacao(string $data_criacao) Return AnotacaoProcesso objects filtered by the data_criacao column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseAnotacaoProcessoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseAnotacaoProcessoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'AnotacaoProcesso', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AnotacaoProcessoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AnotacaoProcessoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AnotacaoProcessoQuery) {
			return $criteria;
		}
		$query = new AnotacaoProcessoQuery();
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
	 * @return    AnotacaoProcesso|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = AnotacaoProcessoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(AnotacaoProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    AnotacaoProcesso A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `PROCESSO_ID`, `TITULO`, `DESCRICAO`, `DATA_CRIACAO` FROM `anotacao_processo` WHERE `ID` = :p0';
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
			$obj = new AnotacaoProcesso();
			$obj->hydrate($row);
			AnotacaoProcessoPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    AnotacaoProcesso|array|mixed the result, formatted by the current formatter
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
	 * @return    AnotacaoProcessoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AnotacaoProcessoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AnotacaoProcessoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AnotacaoProcessoPeer::ID, $keys, Criteria::IN);
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
	 * @return    AnotacaoProcessoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AnotacaoProcessoPeer::ID, $id, $comparison);
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
	 * @return    AnotacaoProcessoQuery The current query, for fluid interface
	 */
	public function filterByProcessoId($processoId = null, $comparison = null)
	{
		if (is_array($processoId)) {
			$useMinMax = false;
			if (isset($processoId['min'])) {
				$this->addUsingAlias(AnotacaoProcessoPeer::PROCESSO_ID, $processoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($processoId['max'])) {
				$this->addUsingAlias(AnotacaoProcessoPeer::PROCESSO_ID, $processoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AnotacaoProcessoPeer::PROCESSO_ID, $processoId, $comparison);
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
	 * @return    AnotacaoProcessoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AnotacaoProcessoPeer::TITULO, $titulo, $comparison);
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
	 * @return    AnotacaoProcessoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AnotacaoProcessoPeer::DESCRICAO, $descricao, $comparison);
	}

	/**
	 * Filter the query on the data_criacao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataCriacao('2011-03-14'); // WHERE data_criacao = '2011-03-14'
	 * $query->filterByDataCriacao('now'); // WHERE data_criacao = '2011-03-14'
	 * $query->filterByDataCriacao(array('max' => 'yesterday')); // WHERE data_criacao > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataCriacao The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AnotacaoProcessoQuery The current query, for fluid interface
	 */
	public function filterByDataCriacao($dataCriacao = null, $comparison = null)
	{
		if (is_array($dataCriacao)) {
			$useMinMax = false;
			if (isset($dataCriacao['min'])) {
				$this->addUsingAlias(AnotacaoProcessoPeer::DATA_CRIACAO, $dataCriacao['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataCriacao['max'])) {
				$this->addUsingAlias(AnotacaoProcessoPeer::DATA_CRIACAO, $dataCriacao['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AnotacaoProcessoPeer::DATA_CRIACAO, $dataCriacao, $comparison);
	}

	/**
	 * Filter the query by a related Processo object
	 *
	 * @param     Processo|PropelCollection $processo The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AnotacaoProcessoQuery The current query, for fluid interface
	 */
	public function filterByProcesso($processo, $comparison = null)
	{
		if ($processo instanceof Processo) {
			return $this
				->addUsingAlias(AnotacaoProcessoPeer::PROCESSO_ID, $processo->getId(), $comparison);
		} elseif ($processo instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AnotacaoProcessoPeer::PROCESSO_ID, $processo->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    AnotacaoProcessoQuery The current query, for fluid interface
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
	 * @param     AnotacaoProcesso $anotacaoProcesso Object to remove from the list of results
	 *
	 * @return    AnotacaoProcessoQuery The current query, for fluid interface
	 */
	public function prune($anotacaoProcesso = null)
	{
		if ($anotacaoProcesso) {
			$this->addUsingAlias(AnotacaoProcessoPeer::ID, $anotacaoProcesso->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseAnotacaoProcessoQuery