<?php


/**
 * Base class that represents a query for the 'resposta' table.
 *
 * 
 *
 * @method     RespostaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     RespostaQuery orderByColetaPesquisaId($order = Criteria::ASC) Order by the coleta_pesquisa_id column
 * @method     RespostaQuery orderByPerguntaId($order = Criteria::ASC) Order by the pergunta_id column
 * @method     RespostaQuery orderByAlternativaId($order = Criteria::ASC) Order by the alternativa_id column
 * @method     RespostaQuery orderByTexto($order = Criteria::ASC) Order by the texto column
 *
 * @method     RespostaQuery groupById() Group by the id column
 * @method     RespostaQuery groupByColetaPesquisaId() Group by the coleta_pesquisa_id column
 * @method     RespostaQuery groupByPerguntaId() Group by the pergunta_id column
 * @method     RespostaQuery groupByAlternativaId() Group by the alternativa_id column
 * @method     RespostaQuery groupByTexto() Group by the texto column
 *
 * @method     RespostaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     RespostaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     RespostaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     RespostaQuery leftJoinColetaPesquisa($relationAlias = null) Adds a LEFT JOIN clause to the query using the ColetaPesquisa relation
 * @method     RespostaQuery rightJoinColetaPesquisa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ColetaPesquisa relation
 * @method     RespostaQuery innerJoinColetaPesquisa($relationAlias = null) Adds a INNER JOIN clause to the query using the ColetaPesquisa relation
 *
 * @method     RespostaQuery leftJoinAlternativa($relationAlias = null) Adds a LEFT JOIN clause to the query using the Alternativa relation
 * @method     RespostaQuery rightJoinAlternativa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Alternativa relation
 * @method     RespostaQuery innerJoinAlternativa($relationAlias = null) Adds a INNER JOIN clause to the query using the Alternativa relation
 *
 * @method     RespostaQuery leftJoinPergunta($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pergunta relation
 * @method     RespostaQuery rightJoinPergunta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pergunta relation
 * @method     RespostaQuery innerJoinPergunta($relationAlias = null) Adds a INNER JOIN clause to the query using the Pergunta relation
 *
 * @method     Resposta findOne(PropelPDO $con = null) Return the first Resposta matching the query
 * @method     Resposta findOneOrCreate(PropelPDO $con = null) Return the first Resposta matching the query, or a new Resposta object populated from the query conditions when no match is found
 *
 * @method     Resposta findOneById(int $id) Return the first Resposta filtered by the id column
 * @method     Resposta findOneByColetaPesquisaId(int $coleta_pesquisa_id) Return the first Resposta filtered by the coleta_pesquisa_id column
 * @method     Resposta findOneByPerguntaId(int $pergunta_id) Return the first Resposta filtered by the pergunta_id column
 * @method     Resposta findOneByAlternativaId(int $alternativa_id) Return the first Resposta filtered by the alternativa_id column
 * @method     Resposta findOneByTexto(string $texto) Return the first Resposta filtered by the texto column
 *
 * @method     array findById(int $id) Return Resposta objects filtered by the id column
 * @method     array findByColetaPesquisaId(int $coleta_pesquisa_id) Return Resposta objects filtered by the coleta_pesquisa_id column
 * @method     array findByPerguntaId(int $pergunta_id) Return Resposta objects filtered by the pergunta_id column
 * @method     array findByAlternativaId(int $alternativa_id) Return Resposta objects filtered by the alternativa_id column
 * @method     array findByTexto(string $texto) Return Resposta objects filtered by the texto column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseRespostaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseRespostaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Resposta', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new RespostaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    RespostaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof RespostaQuery) {
			return $criteria;
		}
		$query = new RespostaQuery();
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
	 * @return    Resposta|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = RespostaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(RespostaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Resposta A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `COLETA_PESQUISA_ID`, `PERGUNTA_ID`, `ALTERNATIVA_ID`, `TEXTO` FROM `resposta` WHERE `ID` = :p0';
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
			$obj = new Resposta();
			$obj->hydrate($row);
			RespostaPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Resposta|array|mixed the result, formatted by the current formatter
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
	 * @return    RespostaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(RespostaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    RespostaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(RespostaPeer::ID, $keys, Criteria::IN);
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
	 * @return    RespostaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RespostaPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the coleta_pesquisa_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByColetaPesquisaId(1234); // WHERE coleta_pesquisa_id = 1234
	 * $query->filterByColetaPesquisaId(array(12, 34)); // WHERE coleta_pesquisa_id IN (12, 34)
	 * $query->filterByColetaPesquisaId(array('min' => 12)); // WHERE coleta_pesquisa_id > 12
	 * </code>
	 *
	 * @see       filterByColetaPesquisa()
	 *
	 * @param     mixed $coletaPesquisaId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespostaQuery The current query, for fluid interface
	 */
	public function filterByColetaPesquisaId($coletaPesquisaId = null, $comparison = null)
	{
		if (is_array($coletaPesquisaId)) {
			$useMinMax = false;
			if (isset($coletaPesquisaId['min'])) {
				$this->addUsingAlias(RespostaPeer::COLETA_PESQUISA_ID, $coletaPesquisaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($coletaPesquisaId['max'])) {
				$this->addUsingAlias(RespostaPeer::COLETA_PESQUISA_ID, $coletaPesquisaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RespostaPeer::COLETA_PESQUISA_ID, $coletaPesquisaId, $comparison);
	}

	/**
	 * Filter the query on the pergunta_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPerguntaId(1234); // WHERE pergunta_id = 1234
	 * $query->filterByPerguntaId(array(12, 34)); // WHERE pergunta_id IN (12, 34)
	 * $query->filterByPerguntaId(array('min' => 12)); // WHERE pergunta_id > 12
	 * </code>
	 *
	 * @see       filterByPergunta()
	 *
	 * @param     mixed $perguntaId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespostaQuery The current query, for fluid interface
	 */
	public function filterByPerguntaId($perguntaId = null, $comparison = null)
	{
		if (is_array($perguntaId)) {
			$useMinMax = false;
			if (isset($perguntaId['min'])) {
				$this->addUsingAlias(RespostaPeer::PERGUNTA_ID, $perguntaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($perguntaId['max'])) {
				$this->addUsingAlias(RespostaPeer::PERGUNTA_ID, $perguntaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RespostaPeer::PERGUNTA_ID, $perguntaId, $comparison);
	}

	/**
	 * Filter the query on the alternativa_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAlternativaId(1234); // WHERE alternativa_id = 1234
	 * $query->filterByAlternativaId(array(12, 34)); // WHERE alternativa_id IN (12, 34)
	 * $query->filterByAlternativaId(array('min' => 12)); // WHERE alternativa_id > 12
	 * </code>
	 *
	 * @see       filterByAlternativa()
	 *
	 * @param     mixed $alternativaId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespostaQuery The current query, for fluid interface
	 */
	public function filterByAlternativaId($alternativaId = null, $comparison = null)
	{
		if (is_array($alternativaId)) {
			$useMinMax = false;
			if (isset($alternativaId['min'])) {
				$this->addUsingAlias(RespostaPeer::ALTERNATIVA_ID, $alternativaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($alternativaId['max'])) {
				$this->addUsingAlias(RespostaPeer::ALTERNATIVA_ID, $alternativaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RespostaPeer::ALTERNATIVA_ID, $alternativaId, $comparison);
	}

	/**
	 * Filter the query on the texto column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTexto('fooValue');   // WHERE texto = 'fooValue'
	 * $query->filterByTexto('%fooValue%'); // WHERE texto LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $texto The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespostaQuery The current query, for fluid interface
	 */
	public function filterByTexto($texto = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($texto)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $texto)) {
				$texto = str_replace('*', '%', $texto);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RespostaPeer::TEXTO, $texto, $comparison);
	}

	/**
	 * Filter the query by a related ColetaPesquisa object
	 *
	 * @param     ColetaPesquisa|PropelCollection $coletaPesquisa The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespostaQuery The current query, for fluid interface
	 */
	public function filterByColetaPesquisa($coletaPesquisa, $comparison = null)
	{
		if ($coletaPesquisa instanceof ColetaPesquisa) {
			return $this
				->addUsingAlias(RespostaPeer::COLETA_PESQUISA_ID, $coletaPesquisa->getId(), $comparison);
		} elseif ($coletaPesquisa instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(RespostaPeer::COLETA_PESQUISA_ID, $coletaPesquisa->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByColetaPesquisa() only accepts arguments of type ColetaPesquisa or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ColetaPesquisa relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RespostaQuery The current query, for fluid interface
	 */
	public function joinColetaPesquisa($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ColetaPesquisa');

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
			$this->addJoinObject($join, 'ColetaPesquisa');
		}

		return $this;
	}

	/**
	 * Use the ColetaPesquisa relation ColetaPesquisa object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ColetaPesquisaQuery A secondary query class using the current class as primary query
	 */
	public function useColetaPesquisaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinColetaPesquisa($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ColetaPesquisa', 'ColetaPesquisaQuery');
	}

	/**
	 * Filter the query by a related Alternativa object
	 *
	 * @param     Alternativa|PropelCollection $alternativa The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespostaQuery The current query, for fluid interface
	 */
	public function filterByAlternativa($alternativa, $comparison = null)
	{
		if ($alternativa instanceof Alternativa) {
			return $this
				->addUsingAlias(RespostaPeer::ALTERNATIVA_ID, $alternativa->getId(), $comparison);
		} elseif ($alternativa instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(RespostaPeer::ALTERNATIVA_ID, $alternativa->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByAlternativa() only accepts arguments of type Alternativa or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Alternativa relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RespostaQuery The current query, for fluid interface
	 */
	public function joinAlternativa($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Alternativa');

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
			$this->addJoinObject($join, 'Alternativa');
		}

		return $this;
	}

	/**
	 * Use the Alternativa relation Alternativa object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlternativaQuery A secondary query class using the current class as primary query
	 */
	public function useAlternativaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAlternativa($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Alternativa', 'AlternativaQuery');
	}

	/**
	 * Filter the query by a related Pergunta object
	 *
	 * @param     Pergunta|PropelCollection $pergunta The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespostaQuery The current query, for fluid interface
	 */
	public function filterByPergunta($pergunta, $comparison = null)
	{
		if ($pergunta instanceof Pergunta) {
			return $this
				->addUsingAlias(RespostaPeer::PERGUNTA_ID, $pergunta->getId(), $comparison);
		} elseif ($pergunta instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(RespostaPeer::PERGUNTA_ID, $pergunta->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    RespostaQuery The current query, for fluid interface
	 */
	public function joinPergunta($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function usePerguntaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPergunta($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Pergunta', 'PerguntaQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Resposta $resposta Object to remove from the list of results
	 *
	 * @return    RespostaQuery The current query, for fluid interface
	 */
	public function prune($resposta = null)
	{
		if ($resposta) {
			$this->addUsingAlias(RespostaPeer::ID, $resposta->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseRespostaQuery