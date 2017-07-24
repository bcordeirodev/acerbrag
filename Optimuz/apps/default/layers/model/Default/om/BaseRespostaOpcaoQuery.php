<?php


/**
 * Base class that represents a query for the 'resposta_opcao' table.
 *
 * 
 *
 * @method     RespostaOpcaoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     RespostaOpcaoQuery orderByPerguntaId($order = Criteria::ASC) Order by the pergunta_id column
 * @method     RespostaOpcaoQuery orderByTexto($order = Criteria::ASC) Order by the texto column
 *
 * @method     RespostaOpcaoQuery groupById() Group by the id column
 * @method     RespostaOpcaoQuery groupByPerguntaId() Group by the pergunta_id column
 * @method     RespostaOpcaoQuery groupByTexto() Group by the texto column
 *
 * @method     RespostaOpcaoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     RespostaOpcaoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     RespostaOpcaoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     RespostaOpcaoQuery leftJoinPergunta($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pergunta relation
 * @method     RespostaOpcaoQuery rightJoinPergunta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pergunta relation
 * @method     RespostaOpcaoQuery innerJoinPergunta($relationAlias = null) Adds a INNER JOIN clause to the query using the Pergunta relation
 *
 * @method     RespostaOpcaoQuery leftJoinResposta($relationAlias = null) Adds a LEFT JOIN clause to the query using the Resposta relation
 * @method     RespostaOpcaoQuery rightJoinResposta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Resposta relation
 * @method     RespostaOpcaoQuery innerJoinResposta($relationAlias = null) Adds a INNER JOIN clause to the query using the Resposta relation
 *
 * @method     RespostaOpcao findOne(PropelPDO $con = null) Return the first RespostaOpcao matching the query
 * @method     RespostaOpcao findOneOrCreate(PropelPDO $con = null) Return the first RespostaOpcao matching the query, or a new RespostaOpcao object populated from the query conditions when no match is found
 *
 * @method     RespostaOpcao findOneById(int $id) Return the first RespostaOpcao filtered by the id column
 * @method     RespostaOpcao findOneByPerguntaId(int $pergunta_id) Return the first RespostaOpcao filtered by the pergunta_id column
 * @method     RespostaOpcao findOneByTexto(string $texto) Return the first RespostaOpcao filtered by the texto column
 *
 * @method     array findById(int $id) Return RespostaOpcao objects filtered by the id column
 * @method     array findByPerguntaId(int $pergunta_id) Return RespostaOpcao objects filtered by the pergunta_id column
 * @method     array findByTexto(string $texto) Return RespostaOpcao objects filtered by the texto column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseRespostaOpcaoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseRespostaOpcaoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'RespostaOpcao', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new RespostaOpcaoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    RespostaOpcaoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof RespostaOpcaoQuery) {
			return $criteria;
		}
		$query = new RespostaOpcaoQuery();
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
	 * @return    RespostaOpcao|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = RespostaOpcaoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(RespostaOpcaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    RespostaOpcao A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `PERGUNTA_ID`, `TEXTO` FROM `resposta_opcao` WHERE `ID` = :p0';
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
			$obj = new RespostaOpcao();
			$obj->hydrate($row);
			RespostaOpcaoPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    RespostaOpcao|array|mixed the result, formatted by the current formatter
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
	 * @return    RespostaOpcaoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(RespostaOpcaoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    RespostaOpcaoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(RespostaOpcaoPeer::ID, $keys, Criteria::IN);
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
	 * @return    RespostaOpcaoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RespostaOpcaoPeer::ID, $id, $comparison);
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
	 * @return    RespostaOpcaoQuery The current query, for fluid interface
	 */
	public function filterByPerguntaId($perguntaId = null, $comparison = null)
	{
		if (is_array($perguntaId)) {
			$useMinMax = false;
			if (isset($perguntaId['min'])) {
				$this->addUsingAlias(RespostaOpcaoPeer::PERGUNTA_ID, $perguntaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($perguntaId['max'])) {
				$this->addUsingAlias(RespostaOpcaoPeer::PERGUNTA_ID, $perguntaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RespostaOpcaoPeer::PERGUNTA_ID, $perguntaId, $comparison);
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
	 * @return    RespostaOpcaoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(RespostaOpcaoPeer::TEXTO, $texto, $comparison);
	}

	/**
	 * Filter the query by a related Pergunta object
	 *
	 * @param     Pergunta|PropelCollection $pergunta The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespostaOpcaoQuery The current query, for fluid interface
	 */
	public function filterByPergunta($pergunta, $comparison = null)
	{
		if ($pergunta instanceof Pergunta) {
			return $this
				->addUsingAlias(RespostaOpcaoPeer::PERGUNTA_ID, $pergunta->getId(), $comparison);
		} elseif ($pergunta instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(RespostaOpcaoPeer::PERGUNTA_ID, $pergunta->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    RespostaOpcaoQuery The current query, for fluid interface
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
	 * Filter the query by a related Resposta object
	 *
	 * @param     Resposta $resposta  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespostaOpcaoQuery The current query, for fluid interface
	 */
	public function filterByResposta($resposta, $comparison = null)
	{
		if ($resposta instanceof Resposta) {
			return $this
				->addUsingAlias(RespostaOpcaoPeer::ID, $resposta->getRespostaOpcaoId(), $comparison);
		} elseif ($resposta instanceof PropelCollection) {
			return $this
				->useRespostaQuery()
				->filterByPrimaryKeys($resposta->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByResposta() only accepts arguments of type Resposta or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Resposta relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RespostaOpcaoQuery The current query, for fluid interface
	 */
	public function joinResposta($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Resposta');

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
			$this->addJoinObject($join, 'Resposta');
		}

		return $this;
	}

	/**
	 * Use the Resposta relation Resposta object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RespostaQuery A secondary query class using the current class as primary query
	 */
	public function useRespostaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinResposta($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Resposta', 'RespostaQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     RespostaOpcao $respostaOpcao Object to remove from the list of results
	 *
	 * @return    RespostaOpcaoQuery The current query, for fluid interface
	 */
	public function prune($respostaOpcao = null)
	{
		if ($respostaOpcao) {
			$this->addUsingAlias(RespostaOpcaoPeer::ID, $respostaOpcao->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseRespostaOpcaoQuery