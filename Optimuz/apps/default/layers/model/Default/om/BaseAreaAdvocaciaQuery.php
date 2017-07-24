<?php


/**
 * Base class that represents a query for the 'area_advocacia' table.
 *
 * 
 *
 * @method     AreaAdvocaciaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AreaAdvocaciaQuery orderByNome($order = Criteria::ASC) Order by the nome column
 *
 * @method     AreaAdvocaciaQuery groupById() Group by the id column
 * @method     AreaAdvocaciaQuery groupByNome() Group by the nome column
 *
 * @method     AreaAdvocaciaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AreaAdvocaciaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AreaAdvocaciaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AreaAdvocaciaQuery leftJoinAdvogadoAreaAdvocacia($relationAlias = null) Adds a LEFT JOIN clause to the query using the AdvogadoAreaAdvocacia relation
 * @method     AreaAdvocaciaQuery rightJoinAdvogadoAreaAdvocacia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AdvogadoAreaAdvocacia relation
 * @method     AreaAdvocaciaQuery innerJoinAdvogadoAreaAdvocacia($relationAlias = null) Adds a INNER JOIN clause to the query using the AdvogadoAreaAdvocacia relation
 *
 * @method     AreaAdvocaciaQuery leftJoinCaso($relationAlias = null) Adds a LEFT JOIN clause to the query using the Caso relation
 * @method     AreaAdvocaciaQuery rightJoinCaso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Caso relation
 * @method     AreaAdvocaciaQuery innerJoinCaso($relationAlias = null) Adds a INNER JOIN clause to the query using the Caso relation
 *
 * @method     AreaAdvocaciaQuery leftJoinContrato($relationAlias = null) Adds a LEFT JOIN clause to the query using the Contrato relation
 * @method     AreaAdvocaciaQuery rightJoinContrato($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Contrato relation
 * @method     AreaAdvocaciaQuery innerJoinContrato($relationAlias = null) Adds a INNER JOIN clause to the query using the Contrato relation
 *
 * @method     AreaAdvocaciaQuery leftJoinProcesso($relationAlias = null) Adds a LEFT JOIN clause to the query using the Processo relation
 * @method     AreaAdvocaciaQuery rightJoinProcesso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Processo relation
 * @method     AreaAdvocaciaQuery innerJoinProcesso($relationAlias = null) Adds a INNER JOIN clause to the query using the Processo relation
 *
 * @method     AreaAdvocaciaQuery leftJoinSolicitacao($relationAlias = null) Adds a LEFT JOIN clause to the query using the Solicitacao relation
 * @method     AreaAdvocaciaQuery rightJoinSolicitacao($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Solicitacao relation
 * @method     AreaAdvocaciaQuery innerJoinSolicitacao($relationAlias = null) Adds a INNER JOIN clause to the query using the Solicitacao relation
 *
 * @method     AreaAdvocaciaQuery leftJoinTagAreaAdvocacia($relationAlias = null) Adds a LEFT JOIN clause to the query using the TagAreaAdvocacia relation
 * @method     AreaAdvocaciaQuery rightJoinTagAreaAdvocacia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TagAreaAdvocacia relation
 * @method     AreaAdvocaciaQuery innerJoinTagAreaAdvocacia($relationAlias = null) Adds a INNER JOIN clause to the query using the TagAreaAdvocacia relation
 *
 * @method     AreaAdvocacia findOne(PropelPDO $con = null) Return the first AreaAdvocacia matching the query
 * @method     AreaAdvocacia findOneOrCreate(PropelPDO $con = null) Return the first AreaAdvocacia matching the query, or a new AreaAdvocacia object populated from the query conditions when no match is found
 *
 * @method     AreaAdvocacia findOneById(int $id) Return the first AreaAdvocacia filtered by the id column
 * @method     AreaAdvocacia findOneByNome(string $nome) Return the first AreaAdvocacia filtered by the nome column
 *
 * @method     array findById(int $id) Return AreaAdvocacia objects filtered by the id column
 * @method     array findByNome(string $nome) Return AreaAdvocacia objects filtered by the nome column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseAreaAdvocaciaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseAreaAdvocaciaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'AreaAdvocacia', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AreaAdvocaciaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AreaAdvocaciaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AreaAdvocaciaQuery) {
			return $criteria;
		}
		$query = new AreaAdvocaciaQuery();
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
	 * @return    AreaAdvocacia|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = AreaAdvocaciaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(AreaAdvocaciaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    AreaAdvocacia A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NOME` FROM `area_advocacia` WHERE `ID` = :p0';
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
			$obj = new AreaAdvocacia();
			$obj->hydrate($row);
			AreaAdvocaciaPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    AreaAdvocacia|array|mixed the result, formatted by the current formatter
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
	 * @return    AreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AreaAdvocaciaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AreaAdvocaciaPeer::ID, $keys, Criteria::IN);
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
	 * @return    AreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AreaAdvocaciaPeer::ID, $id, $comparison);
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
	 * @return    AreaAdvocaciaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AreaAdvocaciaPeer::NOME, $nome, $comparison);
	}

	/**
	 * Filter the query by a related AdvogadoAreaAdvocacia object
	 *
	 * @param     AdvogadoAreaAdvocacia $advogadoAreaAdvocacia  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function filterByAdvogadoAreaAdvocacia($advogadoAreaAdvocacia, $comparison = null)
	{
		if ($advogadoAreaAdvocacia instanceof AdvogadoAreaAdvocacia) {
			return $this
				->addUsingAlias(AreaAdvocaciaPeer::ID, $advogadoAreaAdvocacia->getAreaAdvocaciaId(), $comparison);
		} elseif ($advogadoAreaAdvocacia instanceof PropelCollection) {
			return $this
				->useAdvogadoAreaAdvocaciaQuery()
				->filterByPrimaryKeys($advogadoAreaAdvocacia->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAdvogadoAreaAdvocacia() only accepts arguments of type AdvogadoAreaAdvocacia or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AdvogadoAreaAdvocacia relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function joinAdvogadoAreaAdvocacia($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AdvogadoAreaAdvocacia');

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
			$this->addJoinObject($join, 'AdvogadoAreaAdvocacia');
		}

		return $this;
	}

	/**
	 * Use the AdvogadoAreaAdvocacia relation AdvogadoAreaAdvocacia object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdvogadoAreaAdvocaciaQuery A secondary query class using the current class as primary query
	 */
	public function useAdvogadoAreaAdvocaciaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAdvogadoAreaAdvocacia($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AdvogadoAreaAdvocacia', 'AdvogadoAreaAdvocaciaQuery');
	}

	/**
	 * Filter the query by a related Caso object
	 *
	 * @param     Caso $caso  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function filterByCaso($caso, $comparison = null)
	{
		if ($caso instanceof Caso) {
			return $this
				->addUsingAlias(AreaAdvocaciaPeer::ID, $caso->getAreaAdvocaciaId(), $comparison);
		} elseif ($caso instanceof PropelCollection) {
			return $this
				->useCasoQuery()
				->filterByPrimaryKeys($caso->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByCaso() only accepts arguments of type Caso or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Caso relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function joinCaso($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Caso');

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
			$this->addJoinObject($join, 'Caso');
		}

		return $this;
	}

	/**
	 * Use the Caso relation Caso object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CasoQuery A secondary query class using the current class as primary query
	 */
	public function useCasoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCaso($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Caso', 'CasoQuery');
	}

	/**
	 * Filter the query by a related Contrato object
	 *
	 * @param     Contrato $contrato  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function filterByContrato($contrato, $comparison = null)
	{
		if ($contrato instanceof Contrato) {
			return $this
				->addUsingAlias(AreaAdvocaciaPeer::ID, $contrato->getAreaAdvocaciaId(), $comparison);
		} elseif ($contrato instanceof PropelCollection) {
			return $this
				->useContratoQuery()
				->filterByPrimaryKeys($contrato->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByContrato() only accepts arguments of type Contrato or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Contrato relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function joinContrato($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Contrato');

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
			$this->addJoinObject($join, 'Contrato');
		}

		return $this;
	}

	/**
	 * Use the Contrato relation Contrato object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ContratoQuery A secondary query class using the current class as primary query
	 */
	public function useContratoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinContrato($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Contrato', 'ContratoQuery');
	}

	/**
	 * Filter the query by a related Processo object
	 *
	 * @param     Processo $processo  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function filterByProcesso($processo, $comparison = null)
	{
		if ($processo instanceof Processo) {
			return $this
				->addUsingAlias(AreaAdvocaciaPeer::ID, $processo->getAreaAdvocaciaId(), $comparison);
		} elseif ($processo instanceof PropelCollection) {
			return $this
				->useProcessoQuery()
				->filterByPrimaryKeys($processo->getPrimaryKeys())
				->endUse();
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
	 * @return    AreaAdvocaciaQuery The current query, for fluid interface
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
	 * Filter the query by a related Solicitacao object
	 *
	 * @param     Solicitacao $solicitacao  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function filterBySolicitacao($solicitacao, $comparison = null)
	{
		if ($solicitacao instanceof Solicitacao) {
			return $this
				->addUsingAlias(AreaAdvocaciaPeer::ID, $solicitacao->getAreaAdvocaciaId(), $comparison);
		} elseif ($solicitacao instanceof PropelCollection) {
			return $this
				->useSolicitacaoQuery()
				->filterByPrimaryKeys($solicitacao->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySolicitacao() only accepts arguments of type Solicitacao or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Solicitacao relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function joinSolicitacao($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Solicitacao');

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
			$this->addJoinObject($join, 'Solicitacao');
		}

		return $this;
	}

	/**
	 * Use the Solicitacao relation Solicitacao object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SolicitacaoQuery A secondary query class using the current class as primary query
	 */
	public function useSolicitacaoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSolicitacao($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Solicitacao', 'SolicitacaoQuery');
	}

	/**
	 * Filter the query by a related TagAreaAdvocacia object
	 *
	 * @param     TagAreaAdvocacia $tagAreaAdvocacia  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function filterByTagAreaAdvocacia($tagAreaAdvocacia, $comparison = null)
	{
		if ($tagAreaAdvocacia instanceof TagAreaAdvocacia) {
			return $this
				->addUsingAlias(AreaAdvocaciaPeer::ID, $tagAreaAdvocacia->getAreaAdvocaciaId(), $comparison);
		} elseif ($tagAreaAdvocacia instanceof PropelCollection) {
			return $this
				->useTagAreaAdvocaciaQuery()
				->filterByPrimaryKeys($tagAreaAdvocacia->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByTagAreaAdvocacia() only accepts arguments of type TagAreaAdvocacia or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the TagAreaAdvocacia relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function joinTagAreaAdvocacia($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('TagAreaAdvocacia');

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
			$this->addJoinObject($join, 'TagAreaAdvocacia');
		}

		return $this;
	}

	/**
	 * Use the TagAreaAdvocacia relation TagAreaAdvocacia object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TagAreaAdvocaciaQuery A secondary query class using the current class as primary query
	 */
	public function useTagAreaAdvocaciaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinTagAreaAdvocacia($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'TagAreaAdvocacia', 'TagAreaAdvocaciaQuery');
	}

	/**
	 * Filter the query by a related Advogado object
	 * using the advogado_area_advocacia table as cross reference
	 *
	 * @param     Advogado $advogado the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function filterByAdvogado($advogado, $comparison = Criteria::EQUAL)
	{
		return $this
			->useAdvogadoAreaAdvocaciaQuery()
			->filterByAdvogado($advogado, $comparison)
			->endUse();
	}

	/**
	 * Exclude object from result
	 *
	 * @param     AreaAdvocacia $areaAdvocacia Object to remove from the list of results
	 *
	 * @return    AreaAdvocaciaQuery The current query, for fluid interface
	 */
	public function prune($areaAdvocacia = null)
	{
		if ($areaAdvocacia) {
			$this->addUsingAlias(AreaAdvocaciaPeer::ID, $areaAdvocacia->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseAreaAdvocaciaQuery