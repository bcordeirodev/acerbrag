<?php


/**
 * Base class that represents a query for the 'publico_alvo' table.
 *
 * 
 *
 * @method     PublicoAlvoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PublicoAlvoQuery orderByPesquisaId($order = Criteria::ASC) Order by the pesquisa_id column
 * @method     PublicoAlvoQuery orderByIdadeInicial($order = Criteria::ASC) Order by the idade_inicial column
 * @method     PublicoAlvoQuery orderByIdadeFinal($order = Criteria::ASC) Order by the idade_final column
 * @method     PublicoAlvoQuery orderByQuantidadeMasculino($order = Criteria::ASC) Order by the quantidade_masculino column
 * @method     PublicoAlvoQuery orderByQuantidadeFeminino($order = Criteria::ASC) Order by the quantidade_feminino column
 * @method     PublicoAlvoQuery orderByQuatidadeTotal($order = Criteria::ASC) Order by the quatidade_total column
 *
 * @method     PublicoAlvoQuery groupById() Group by the id column
 * @method     PublicoAlvoQuery groupByPesquisaId() Group by the pesquisa_id column
 * @method     PublicoAlvoQuery groupByIdadeInicial() Group by the idade_inicial column
 * @method     PublicoAlvoQuery groupByIdadeFinal() Group by the idade_final column
 * @method     PublicoAlvoQuery groupByQuantidadeMasculino() Group by the quantidade_masculino column
 * @method     PublicoAlvoQuery groupByQuantidadeFeminino() Group by the quantidade_feminino column
 * @method     PublicoAlvoQuery groupByQuatidadeTotal() Group by the quatidade_total column
 *
 * @method     PublicoAlvoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PublicoAlvoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PublicoAlvoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PublicoAlvoQuery leftJoinPesquisa($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pesquisa relation
 * @method     PublicoAlvoQuery rightJoinPesquisa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pesquisa relation
 * @method     PublicoAlvoQuery innerJoinPesquisa($relationAlias = null) Adds a INNER JOIN clause to the query using the Pesquisa relation
 *
 * @method     PublicoAlvoQuery leftJoinMetaPublicoAlvo($relationAlias = null) Adds a LEFT JOIN clause to the query using the MetaPublicoAlvo relation
 * @method     PublicoAlvoQuery rightJoinMetaPublicoAlvo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MetaPublicoAlvo relation
 * @method     PublicoAlvoQuery innerJoinMetaPublicoAlvo($relationAlias = null) Adds a INNER JOIN clause to the query using the MetaPublicoAlvo relation
 *
 * @method     PublicoAlvo findOne(PropelPDO $con = null) Return the first PublicoAlvo matching the query
 * @method     PublicoAlvo findOneOrCreate(PropelPDO $con = null) Return the first PublicoAlvo matching the query, or a new PublicoAlvo object populated from the query conditions when no match is found
 *
 * @method     PublicoAlvo findOneById(int $id) Return the first PublicoAlvo filtered by the id column
 * @method     PublicoAlvo findOneByPesquisaId(int $pesquisa_id) Return the first PublicoAlvo filtered by the pesquisa_id column
 * @method     PublicoAlvo findOneByIdadeInicial(int $idade_inicial) Return the first PublicoAlvo filtered by the idade_inicial column
 * @method     PublicoAlvo findOneByIdadeFinal(int $idade_final) Return the first PublicoAlvo filtered by the idade_final column
 * @method     PublicoAlvo findOneByQuantidadeMasculino(int $quantidade_masculino) Return the first PublicoAlvo filtered by the quantidade_masculino column
 * @method     PublicoAlvo findOneByQuantidadeFeminino(int $quantidade_feminino) Return the first PublicoAlvo filtered by the quantidade_feminino column
 * @method     PublicoAlvo findOneByQuatidadeTotal(int $quatidade_total) Return the first PublicoAlvo filtered by the quatidade_total column
 *
 * @method     array findById(int $id) Return PublicoAlvo objects filtered by the id column
 * @method     array findByPesquisaId(int $pesquisa_id) Return PublicoAlvo objects filtered by the pesquisa_id column
 * @method     array findByIdadeInicial(int $idade_inicial) Return PublicoAlvo objects filtered by the idade_inicial column
 * @method     array findByIdadeFinal(int $idade_final) Return PublicoAlvo objects filtered by the idade_final column
 * @method     array findByQuantidadeMasculino(int $quantidade_masculino) Return PublicoAlvo objects filtered by the quantidade_masculino column
 * @method     array findByQuantidadeFeminino(int $quantidade_feminino) Return PublicoAlvo objects filtered by the quantidade_feminino column
 * @method     array findByQuatidadeTotal(int $quatidade_total) Return PublicoAlvo objects filtered by the quatidade_total column
 *
 * @package    propel.generator.Default.om
 */
abstract class BasePublicoAlvoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BasePublicoAlvoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'PublicoAlvo', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PublicoAlvoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PublicoAlvoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PublicoAlvoQuery) {
			return $criteria;
		}
		$query = new PublicoAlvoQuery();
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
	 * @return    PublicoAlvo|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = PublicoAlvoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(PublicoAlvoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    PublicoAlvo A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `PESQUISA_ID`, `IDADE_INICIAL`, `IDADE_FINAL`, `QUANTIDADE_MASCULINO`, `QUANTIDADE_FEMININO`, `QUATIDADE_TOTAL` FROM `publico_alvo` WHERE `ID` = :p0';
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
			$obj = new PublicoAlvo();
			$obj->hydrate($row);
			PublicoAlvoPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    PublicoAlvo|array|mixed the result, formatted by the current formatter
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
	 * @return    PublicoAlvoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PublicoAlvoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PublicoAlvoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PublicoAlvoPeer::ID, $keys, Criteria::IN);
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
	 * @return    PublicoAlvoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PublicoAlvoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the pesquisa_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPesquisaId(1234); // WHERE pesquisa_id = 1234
	 * $query->filterByPesquisaId(array(12, 34)); // WHERE pesquisa_id IN (12, 34)
	 * $query->filterByPesquisaId(array('min' => 12)); // WHERE pesquisa_id > 12
	 * </code>
	 *
	 * @see       filterByPesquisa()
	 *
	 * @param     mixed $pesquisaId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PublicoAlvoQuery The current query, for fluid interface
	 */
	public function filterByPesquisaId($pesquisaId = null, $comparison = null)
	{
		if (is_array($pesquisaId)) {
			$useMinMax = false;
			if (isset($pesquisaId['min'])) {
				$this->addUsingAlias(PublicoAlvoPeer::PESQUISA_ID, $pesquisaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($pesquisaId['max'])) {
				$this->addUsingAlias(PublicoAlvoPeer::PESQUISA_ID, $pesquisaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PublicoAlvoPeer::PESQUISA_ID, $pesquisaId, $comparison);
	}

	/**
	 * Filter the query on the idade_inicial column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdadeInicial(1234); // WHERE idade_inicial = 1234
	 * $query->filterByIdadeInicial(array(12, 34)); // WHERE idade_inicial IN (12, 34)
	 * $query->filterByIdadeInicial(array('min' => 12)); // WHERE idade_inicial > 12
	 * </code>
	 *
	 * @param     mixed $idadeInicial The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PublicoAlvoQuery The current query, for fluid interface
	 */
	public function filterByIdadeInicial($idadeInicial = null, $comparison = null)
	{
		if (is_array($idadeInicial)) {
			$useMinMax = false;
			if (isset($idadeInicial['min'])) {
				$this->addUsingAlias(PublicoAlvoPeer::IDADE_INICIAL, $idadeInicial['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idadeInicial['max'])) {
				$this->addUsingAlias(PublicoAlvoPeer::IDADE_INICIAL, $idadeInicial['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PublicoAlvoPeer::IDADE_INICIAL, $idadeInicial, $comparison);
	}

	/**
	 * Filter the query on the idade_final column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdadeFinal(1234); // WHERE idade_final = 1234
	 * $query->filterByIdadeFinal(array(12, 34)); // WHERE idade_final IN (12, 34)
	 * $query->filterByIdadeFinal(array('min' => 12)); // WHERE idade_final > 12
	 * </code>
	 *
	 * @param     mixed $idadeFinal The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PublicoAlvoQuery The current query, for fluid interface
	 */
	public function filterByIdadeFinal($idadeFinal = null, $comparison = null)
	{
		if (is_array($idadeFinal)) {
			$useMinMax = false;
			if (isset($idadeFinal['min'])) {
				$this->addUsingAlias(PublicoAlvoPeer::IDADE_FINAL, $idadeFinal['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idadeFinal['max'])) {
				$this->addUsingAlias(PublicoAlvoPeer::IDADE_FINAL, $idadeFinal['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PublicoAlvoPeer::IDADE_FINAL, $idadeFinal, $comparison);
	}

	/**
	 * Filter the query on the quantidade_masculino column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByQuantidadeMasculino(1234); // WHERE quantidade_masculino = 1234
	 * $query->filterByQuantidadeMasculino(array(12, 34)); // WHERE quantidade_masculino IN (12, 34)
	 * $query->filterByQuantidadeMasculino(array('min' => 12)); // WHERE quantidade_masculino > 12
	 * </code>
	 *
	 * @param     mixed $quantidadeMasculino The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PublicoAlvoQuery The current query, for fluid interface
	 */
	public function filterByQuantidadeMasculino($quantidadeMasculino = null, $comparison = null)
	{
		if (is_array($quantidadeMasculino)) {
			$useMinMax = false;
			if (isset($quantidadeMasculino['min'])) {
				$this->addUsingAlias(PublicoAlvoPeer::QUANTIDADE_MASCULINO, $quantidadeMasculino['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($quantidadeMasculino['max'])) {
				$this->addUsingAlias(PublicoAlvoPeer::QUANTIDADE_MASCULINO, $quantidadeMasculino['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PublicoAlvoPeer::QUANTIDADE_MASCULINO, $quantidadeMasculino, $comparison);
	}

	/**
	 * Filter the query on the quantidade_feminino column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByQuantidadeFeminino(1234); // WHERE quantidade_feminino = 1234
	 * $query->filterByQuantidadeFeminino(array(12, 34)); // WHERE quantidade_feminino IN (12, 34)
	 * $query->filterByQuantidadeFeminino(array('min' => 12)); // WHERE quantidade_feminino > 12
	 * </code>
	 *
	 * @param     mixed $quantidadeFeminino The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PublicoAlvoQuery The current query, for fluid interface
	 */
	public function filterByQuantidadeFeminino($quantidadeFeminino = null, $comparison = null)
	{
		if (is_array($quantidadeFeminino)) {
			$useMinMax = false;
			if (isset($quantidadeFeminino['min'])) {
				$this->addUsingAlias(PublicoAlvoPeer::QUANTIDADE_FEMININO, $quantidadeFeminino['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($quantidadeFeminino['max'])) {
				$this->addUsingAlias(PublicoAlvoPeer::QUANTIDADE_FEMININO, $quantidadeFeminino['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PublicoAlvoPeer::QUANTIDADE_FEMININO, $quantidadeFeminino, $comparison);
	}

	/**
	 * Filter the query on the quatidade_total column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByQuatidadeTotal(1234); // WHERE quatidade_total = 1234
	 * $query->filterByQuatidadeTotal(array(12, 34)); // WHERE quatidade_total IN (12, 34)
	 * $query->filterByQuatidadeTotal(array('min' => 12)); // WHERE quatidade_total > 12
	 * </code>
	 *
	 * @param     mixed $quatidadeTotal The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PublicoAlvoQuery The current query, for fluid interface
	 */
	public function filterByQuatidadeTotal($quatidadeTotal = null, $comparison = null)
	{
		if (is_array($quatidadeTotal)) {
			$useMinMax = false;
			if (isset($quatidadeTotal['min'])) {
				$this->addUsingAlias(PublicoAlvoPeer::QUATIDADE_TOTAL, $quatidadeTotal['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($quatidadeTotal['max'])) {
				$this->addUsingAlias(PublicoAlvoPeer::QUATIDADE_TOTAL, $quatidadeTotal['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PublicoAlvoPeer::QUATIDADE_TOTAL, $quatidadeTotal, $comparison);
	}

	/**
	 * Filter the query by a related Pesquisa object
	 *
	 * @param     Pesquisa|PropelCollection $pesquisa The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PublicoAlvoQuery The current query, for fluid interface
	 */
	public function filterByPesquisa($pesquisa, $comparison = null)
	{
		if ($pesquisa instanceof Pesquisa) {
			return $this
				->addUsingAlias(PublicoAlvoPeer::PESQUISA_ID, $pesquisa->getId(), $comparison);
		} elseif ($pesquisa instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PublicoAlvoPeer::PESQUISA_ID, $pesquisa->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByPesquisa() only accepts arguments of type Pesquisa or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Pesquisa relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PublicoAlvoQuery The current query, for fluid interface
	 */
	public function joinPesquisa($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Pesquisa');

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
			$this->addJoinObject($join, 'Pesquisa');
		}

		return $this;
	}

	/**
	 * Use the Pesquisa relation Pesquisa object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PesquisaQuery A secondary query class using the current class as primary query
	 */
	public function usePesquisaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPesquisa($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Pesquisa', 'PesquisaQuery');
	}

	/**
	 * Filter the query by a related MetaPublicoAlvo object
	 *
	 * @param     MetaPublicoAlvo $metaPublicoAlvo  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PublicoAlvoQuery The current query, for fluid interface
	 */
	public function filterByMetaPublicoAlvo($metaPublicoAlvo, $comparison = null)
	{
		if ($metaPublicoAlvo instanceof MetaPublicoAlvo) {
			return $this
				->addUsingAlias(PublicoAlvoPeer::ID, $metaPublicoAlvo->getPublicoAlvoId(), $comparison);
		} elseif ($metaPublicoAlvo instanceof PropelCollection) {
			return $this
				->useMetaPublicoAlvoQuery()
				->filterByPrimaryKeys($metaPublicoAlvo->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByMetaPublicoAlvo() only accepts arguments of type MetaPublicoAlvo or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the MetaPublicoAlvo relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PublicoAlvoQuery The current query, for fluid interface
	 */
	public function joinMetaPublicoAlvo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('MetaPublicoAlvo');

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
			$this->addJoinObject($join, 'MetaPublicoAlvo');
		}

		return $this;
	}

	/**
	 * Use the MetaPublicoAlvo relation MetaPublicoAlvo object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MetaPublicoAlvoQuery A secondary query class using the current class as primary query
	 */
	public function useMetaPublicoAlvoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinMetaPublicoAlvo($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'MetaPublicoAlvo', 'MetaPublicoAlvoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     PublicoAlvo $publicoAlvo Object to remove from the list of results
	 *
	 * @return    PublicoAlvoQuery The current query, for fluid interface
	 */
	public function prune($publicoAlvo = null)
	{
		if ($publicoAlvo) {
			$this->addUsingAlias(PublicoAlvoPeer::ID, $publicoAlvo->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BasePublicoAlvoQuery