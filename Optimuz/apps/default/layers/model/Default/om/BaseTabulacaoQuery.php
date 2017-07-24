<?php


/**
 * Base class that represents a query for the 'tabulacao' table.
 *
 * 
 *
 * @method     TabulacaoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     TabulacaoQuery orderByTabulacaoId($order = Criteria::ASC) Order by the tabulacao_id column
 * @method     TabulacaoQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     TabulacaoQuery orderByAtivo($order = Criteria::ASC) Order by the ativo column
 *
 * @method     TabulacaoQuery groupById() Group by the id column
 * @method     TabulacaoQuery groupByTabulacaoId() Group by the tabulacao_id column
 * @method     TabulacaoQuery groupByNome() Group by the nome column
 * @method     TabulacaoQuery groupByAtivo() Group by the ativo column
 *
 * @method     TabulacaoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TabulacaoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TabulacaoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TabulacaoQuery leftJoinTabulacaoRelatedByTabulacaoId($relationAlias = null) Adds a LEFT JOIN clause to the query using the TabulacaoRelatedByTabulacaoId relation
 * @method     TabulacaoQuery rightJoinTabulacaoRelatedByTabulacaoId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TabulacaoRelatedByTabulacaoId relation
 * @method     TabulacaoQuery innerJoinTabulacaoRelatedByTabulacaoId($relationAlias = null) Adds a INNER JOIN clause to the query using the TabulacaoRelatedByTabulacaoId relation
 *
 * @method     TabulacaoQuery leftJoinContato($relationAlias = null) Adds a LEFT JOIN clause to the query using the Contato relation
 * @method     TabulacaoQuery rightJoinContato($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Contato relation
 * @method     TabulacaoQuery innerJoinContato($relationAlias = null) Adds a INNER JOIN clause to the query using the Contato relation
 *
 * @method     TabulacaoQuery leftJoinTabulacaoRelatedById($relationAlias = null) Adds a LEFT JOIN clause to the query using the TabulacaoRelatedById relation
 * @method     TabulacaoQuery rightJoinTabulacaoRelatedById($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TabulacaoRelatedById relation
 * @method     TabulacaoQuery innerJoinTabulacaoRelatedById($relationAlias = null) Adds a INNER JOIN clause to the query using the TabulacaoRelatedById relation
 *
 * @method     Tabulacao findOne(PropelPDO $con = null) Return the first Tabulacao matching the query
 * @method     Tabulacao findOneOrCreate(PropelPDO $con = null) Return the first Tabulacao matching the query, or a new Tabulacao object populated from the query conditions when no match is found
 *
 * @method     Tabulacao findOneById(int $id) Return the first Tabulacao filtered by the id column
 * @method     Tabulacao findOneByTabulacaoId(int $tabulacao_id) Return the first Tabulacao filtered by the tabulacao_id column
 * @method     Tabulacao findOneByNome(string $nome) Return the first Tabulacao filtered by the nome column
 * @method     Tabulacao findOneByAtivo(boolean $ativo) Return the first Tabulacao filtered by the ativo column
 *
 * @method     array findById(int $id) Return Tabulacao objects filtered by the id column
 * @method     array findByTabulacaoId(int $tabulacao_id) Return Tabulacao objects filtered by the tabulacao_id column
 * @method     array findByNome(string $nome) Return Tabulacao objects filtered by the nome column
 * @method     array findByAtivo(boolean $ativo) Return Tabulacao objects filtered by the ativo column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseTabulacaoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseTabulacaoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Tabulacao', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TabulacaoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TabulacaoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TabulacaoQuery) {
			return $criteria;
		}
		$query = new TabulacaoQuery();
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
	 * @return    Tabulacao|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = TabulacaoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(TabulacaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Tabulacao A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `TABULACAO_ID`, `NOME`, `ATIVO` FROM `tabulacao` WHERE `ID` = :p0';
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
			$obj = new Tabulacao();
			$obj->hydrate($row);
			TabulacaoPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Tabulacao|array|mixed the result, formatted by the current formatter
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
	 * @return    TabulacaoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TabulacaoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TabulacaoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TabulacaoPeer::ID, $keys, Criteria::IN);
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
	 * @return    TabulacaoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TabulacaoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the tabulacao_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTabulacaoId(1234); // WHERE tabulacao_id = 1234
	 * $query->filterByTabulacaoId(array(12, 34)); // WHERE tabulacao_id IN (12, 34)
	 * $query->filterByTabulacaoId(array('min' => 12)); // WHERE tabulacao_id > 12
	 * </code>
	 *
	 * @see       filterByTabulacaoRelatedByTabulacaoId()
	 *
	 * @param     mixed $tabulacaoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TabulacaoQuery The current query, for fluid interface
	 */
	public function filterByTabulacaoId($tabulacaoId = null, $comparison = null)
	{
		if (is_array($tabulacaoId)) {
			$useMinMax = false;
			if (isset($tabulacaoId['min'])) {
				$this->addUsingAlias(TabulacaoPeer::TABULACAO_ID, $tabulacaoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($tabulacaoId['max'])) {
				$this->addUsingAlias(TabulacaoPeer::TABULACAO_ID, $tabulacaoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(TabulacaoPeer::TABULACAO_ID, $tabulacaoId, $comparison);
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
	 * @return    TabulacaoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(TabulacaoPeer::NOME, $nome, $comparison);
	}

	/**
	 * Filter the query on the ativo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAtivo(true); // WHERE ativo = true
	 * $query->filterByAtivo('yes'); // WHERE ativo = true
	 * </code>
	 *
	 * @param     boolean|string $ativo The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TabulacaoQuery The current query, for fluid interface
	 */
	public function filterByAtivo($ativo = null, $comparison = null)
	{
		if (is_string($ativo)) {
			$ativo = in_array(strtolower($ativo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(TabulacaoPeer::ATIVO, $ativo, $comparison);
	}

	/**
	 * Filter the query by a related Tabulacao object
	 *
	 * @param     Tabulacao|PropelCollection $tabulacao The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TabulacaoQuery The current query, for fluid interface
	 */
	public function filterByTabulacaoRelatedByTabulacaoId($tabulacao, $comparison = null)
	{
		if ($tabulacao instanceof Tabulacao) {
			return $this
				->addUsingAlias(TabulacaoPeer::TABULACAO_ID, $tabulacao->getId(), $comparison);
		} elseif ($tabulacao instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(TabulacaoPeer::TABULACAO_ID, $tabulacao->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByTabulacaoRelatedByTabulacaoId() only accepts arguments of type Tabulacao or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the TabulacaoRelatedByTabulacaoId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TabulacaoQuery The current query, for fluid interface
	 */
	public function joinTabulacaoRelatedByTabulacaoId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('TabulacaoRelatedByTabulacaoId');

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
			$this->addJoinObject($join, 'TabulacaoRelatedByTabulacaoId');
		}

		return $this;
	}

	/**
	 * Use the TabulacaoRelatedByTabulacaoId relation Tabulacao object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TabulacaoQuery A secondary query class using the current class as primary query
	 */
	public function useTabulacaoRelatedByTabulacaoIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinTabulacaoRelatedByTabulacaoId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'TabulacaoRelatedByTabulacaoId', 'TabulacaoQuery');
	}

	/**
	 * Filter the query by a related Contato object
	 *
	 * @param     Contato $contato  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TabulacaoQuery The current query, for fluid interface
	 */
	public function filterByContato($contato, $comparison = null)
	{
		if ($contato instanceof Contato) {
			return $this
				->addUsingAlias(TabulacaoPeer::ID, $contato->getTabulacaoId(), $comparison);
		} elseif ($contato instanceof PropelCollection) {
			return $this
				->useContatoQuery()
				->filterByPrimaryKeys($contato->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByContato() only accepts arguments of type Contato or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Contato relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TabulacaoQuery The current query, for fluid interface
	 */
	public function joinContato($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Contato');

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
			$this->addJoinObject($join, 'Contato');
		}

		return $this;
	}

	/**
	 * Use the Contato relation Contato object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ContatoQuery A secondary query class using the current class as primary query
	 */
	public function useContatoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinContato($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Contato', 'ContatoQuery');
	}

	/**
	 * Filter the query by a related Tabulacao object
	 *
	 * @param     Tabulacao $tabulacao  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TabulacaoQuery The current query, for fluid interface
	 */
	public function filterByTabulacaoRelatedById($tabulacao, $comparison = null)
	{
		if ($tabulacao instanceof Tabulacao) {
			return $this
				->addUsingAlias(TabulacaoPeer::ID, $tabulacao->getTabulacaoId(), $comparison);
		} elseif ($tabulacao instanceof PropelCollection) {
			return $this
				->useTabulacaoRelatedByIdQuery()
				->filterByPrimaryKeys($tabulacao->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByTabulacaoRelatedById() only accepts arguments of type Tabulacao or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the TabulacaoRelatedById relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TabulacaoQuery The current query, for fluid interface
	 */
	public function joinTabulacaoRelatedById($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('TabulacaoRelatedById');

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
			$this->addJoinObject($join, 'TabulacaoRelatedById');
		}

		return $this;
	}

	/**
	 * Use the TabulacaoRelatedById relation Tabulacao object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TabulacaoQuery A secondary query class using the current class as primary query
	 */
	public function useTabulacaoRelatedByIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinTabulacaoRelatedById($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'TabulacaoRelatedById', 'TabulacaoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Tabulacao $tabulacao Object to remove from the list of results
	 *
	 * @return    TabulacaoQuery The current query, for fluid interface
	 */
	public function prune($tabulacao = null)
	{
		if ($tabulacao) {
			$this->addUsingAlias(TabulacaoPeer::ID, $tabulacao->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseTabulacaoQuery