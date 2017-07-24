<?php


/**
 * Base class that represents a query for the 'ministerio' table.
 *
 * 
 *
 * @method     MinisterioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MinisterioQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method     MinisterioQuery orderByInstituicaoId($order = Criteria::ASC) Order by the instituicao_id column
 * @method     MinisterioQuery orderByIgrejaPertencenteId($order = Criteria::ASC) Order by the igreja_pertencente_id column
 * @method     MinisterioQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     MinisterioQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 * @method     MinisterioQuery orderByDataCadastro($order = Criteria::ASC) Order by the data_cadastro column
 * @method     MinisterioQuery orderByAtivo($order = Criteria::ASC) Order by the ativo column
 *
 * @method     MinisterioQuery groupById() Group by the id column
 * @method     MinisterioQuery groupByUsuarioId() Group by the usuario_id column
 * @method     MinisterioQuery groupByInstituicaoId() Group by the instituicao_id column
 * @method     MinisterioQuery groupByIgrejaPertencenteId() Group by the igreja_pertencente_id column
 * @method     MinisterioQuery groupByNome() Group by the nome column
 * @method     MinisterioQuery groupByDescricao() Group by the descricao column
 * @method     MinisterioQuery groupByDataCadastro() Group by the data_cadastro column
 * @method     MinisterioQuery groupByAtivo() Group by the ativo column
 *
 * @method     MinisterioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MinisterioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MinisterioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MinisterioQuery leftJoinIgrejaRelatedByIgrejaPertencenteId($relationAlias = null) Adds a LEFT JOIN clause to the query using the IgrejaRelatedByIgrejaPertencenteId relation
 * @method     MinisterioQuery rightJoinIgrejaRelatedByIgrejaPertencenteId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the IgrejaRelatedByIgrejaPertencenteId relation
 * @method     MinisterioQuery innerJoinIgrejaRelatedByIgrejaPertencenteId($relationAlias = null) Adds a INNER JOIN clause to the query using the IgrejaRelatedByIgrejaPertencenteId relation
 *
 * @method     MinisterioQuery leftJoinIgrejaRelatedByInstituicaoId($relationAlias = null) Adds a LEFT JOIN clause to the query using the IgrejaRelatedByInstituicaoId relation
 * @method     MinisterioQuery rightJoinIgrejaRelatedByInstituicaoId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the IgrejaRelatedByInstituicaoId relation
 * @method     MinisterioQuery innerJoinIgrejaRelatedByInstituicaoId($relationAlias = null) Adds a INNER JOIN clause to the query using the IgrejaRelatedByInstituicaoId relation
 *
 * @method     MinisterioQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     MinisterioQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     MinisterioQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     MinisterioQuery leftJoinLiderMinisterio($relationAlias = null) Adds a LEFT JOIN clause to the query using the LiderMinisterio relation
 * @method     MinisterioQuery rightJoinLiderMinisterio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LiderMinisterio relation
 * @method     MinisterioQuery innerJoinLiderMinisterio($relationAlias = null) Adds a INNER JOIN clause to the query using the LiderMinisterio relation
 *
 * @method     Ministerio findOne(PropelPDO $con = null) Return the first Ministerio matching the query
 * @method     Ministerio findOneOrCreate(PropelPDO $con = null) Return the first Ministerio matching the query, or a new Ministerio object populated from the query conditions when no match is found
 *
 * @method     Ministerio findOneById(int $id) Return the first Ministerio filtered by the id column
 * @method     Ministerio findOneByUsuarioId(int $usuario_id) Return the first Ministerio filtered by the usuario_id column
 * @method     Ministerio findOneByInstituicaoId(int $instituicao_id) Return the first Ministerio filtered by the instituicao_id column
 * @method     Ministerio findOneByIgrejaPertencenteId(int $igreja_pertencente_id) Return the first Ministerio filtered by the igreja_pertencente_id column
 * @method     Ministerio findOneByNome(string $nome) Return the first Ministerio filtered by the nome column
 * @method     Ministerio findOneByDescricao(string $descricao) Return the first Ministerio filtered by the descricao column
 * @method     Ministerio findOneByDataCadastro(string $data_cadastro) Return the first Ministerio filtered by the data_cadastro column
 * @method     Ministerio findOneByAtivo(boolean $ativo) Return the first Ministerio filtered by the ativo column
 *
 * @method     array findById(int $id) Return Ministerio objects filtered by the id column
 * @method     array findByUsuarioId(int $usuario_id) Return Ministerio objects filtered by the usuario_id column
 * @method     array findByInstituicaoId(int $instituicao_id) Return Ministerio objects filtered by the instituicao_id column
 * @method     array findByIgrejaPertencenteId(int $igreja_pertencente_id) Return Ministerio objects filtered by the igreja_pertencente_id column
 * @method     array findByNome(string $nome) Return Ministerio objects filtered by the nome column
 * @method     array findByDescricao(string $descricao) Return Ministerio objects filtered by the descricao column
 * @method     array findByDataCadastro(string $data_cadastro) Return Ministerio objects filtered by the data_cadastro column
 * @method     array findByAtivo(boolean $ativo) Return Ministerio objects filtered by the ativo column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseMinisterioQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseMinisterioQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Ministerio', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MinisterioQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MinisterioQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MinisterioQuery) {
			return $criteria;
		}
		$query = new MinisterioQuery();
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
	 * @return    Ministerio|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = MinisterioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(MinisterioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Ministerio A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `USUARIO_ID`, `INSTITUICAO_ID`, `IGREJA_PERTENCENTE_ID`, `NOME`, `DESCRICAO`, `DATA_CADASTRO`, `ATIVO` FROM `ministerio` WHERE `ID` = :p0';
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
			$obj = new Ministerio();
			$obj->hydrate($row);
			MinisterioPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Ministerio|array|mixed the result, formatted by the current formatter
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
	 * @return    MinisterioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MinisterioPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MinisterioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MinisterioPeer::ID, $keys, Criteria::IN);
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
	 * @return    MinisterioQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MinisterioPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the usuario_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUsuarioId(1234); // WHERE usuario_id = 1234
	 * $query->filterByUsuarioId(array(12, 34)); // WHERE usuario_id IN (12, 34)
	 * $query->filterByUsuarioId(array('min' => 12)); // WHERE usuario_id > 12
	 * </code>
	 *
	 * @see       filterByUsuario()
	 *
	 * @param     mixed $usuarioId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MinisterioQuery The current query, for fluid interface
	 */
	public function filterByUsuarioId($usuarioId = null, $comparison = null)
	{
		if (is_array($usuarioId)) {
			$useMinMax = false;
			if (isset($usuarioId['min'])) {
				$this->addUsingAlias(MinisterioPeer::USUARIO_ID, $usuarioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($usuarioId['max'])) {
				$this->addUsingAlias(MinisterioPeer::USUARIO_ID, $usuarioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MinisterioPeer::USUARIO_ID, $usuarioId, $comparison);
	}

	/**
	 * Filter the query on the instituicao_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByInstituicaoId(1234); // WHERE instituicao_id = 1234
	 * $query->filterByInstituicaoId(array(12, 34)); // WHERE instituicao_id IN (12, 34)
	 * $query->filterByInstituicaoId(array('min' => 12)); // WHERE instituicao_id > 12
	 * </code>
	 *
	 * @see       filterByIgrejaRelatedByInstituicaoId()
	 *
	 * @param     mixed $instituicaoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MinisterioQuery The current query, for fluid interface
	 */
	public function filterByInstituicaoId($instituicaoId = null, $comparison = null)
	{
		if (is_array($instituicaoId)) {
			$useMinMax = false;
			if (isset($instituicaoId['min'])) {
				$this->addUsingAlias(MinisterioPeer::INSTITUICAO_ID, $instituicaoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($instituicaoId['max'])) {
				$this->addUsingAlias(MinisterioPeer::INSTITUICAO_ID, $instituicaoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MinisterioPeer::INSTITUICAO_ID, $instituicaoId, $comparison);
	}

	/**
	 * Filter the query on the igreja_pertencente_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIgrejaPertencenteId(1234); // WHERE igreja_pertencente_id = 1234
	 * $query->filterByIgrejaPertencenteId(array(12, 34)); // WHERE igreja_pertencente_id IN (12, 34)
	 * $query->filterByIgrejaPertencenteId(array('min' => 12)); // WHERE igreja_pertencente_id > 12
	 * </code>
	 *
	 * @see       filterByIgrejaRelatedByIgrejaPertencenteId()
	 *
	 * @param     mixed $igrejaPertencenteId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MinisterioQuery The current query, for fluid interface
	 */
	public function filterByIgrejaPertencenteId($igrejaPertencenteId = null, $comparison = null)
	{
		if (is_array($igrejaPertencenteId)) {
			$useMinMax = false;
			if (isset($igrejaPertencenteId['min'])) {
				$this->addUsingAlias(MinisterioPeer::IGREJA_PERTENCENTE_ID, $igrejaPertencenteId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($igrejaPertencenteId['max'])) {
				$this->addUsingAlias(MinisterioPeer::IGREJA_PERTENCENTE_ID, $igrejaPertencenteId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MinisterioPeer::IGREJA_PERTENCENTE_ID, $igrejaPertencenteId, $comparison);
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
	 * @return    MinisterioQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MinisterioPeer::NOME, $nome, $comparison);
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
	 * @return    MinisterioQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MinisterioPeer::DESCRICAO, $descricao, $comparison);
	}

	/**
	 * Filter the query on the data_cadastro column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataCadastro('2011-03-14'); // WHERE data_cadastro = '2011-03-14'
	 * $query->filterByDataCadastro('now'); // WHERE data_cadastro = '2011-03-14'
	 * $query->filterByDataCadastro(array('max' => 'yesterday')); // WHERE data_cadastro > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataCadastro The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MinisterioQuery The current query, for fluid interface
	 */
	public function filterByDataCadastro($dataCadastro = null, $comparison = null)
	{
		if (is_array($dataCadastro)) {
			$useMinMax = false;
			if (isset($dataCadastro['min'])) {
				$this->addUsingAlias(MinisterioPeer::DATA_CADASTRO, $dataCadastro['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataCadastro['max'])) {
				$this->addUsingAlias(MinisterioPeer::DATA_CADASTRO, $dataCadastro['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MinisterioPeer::DATA_CADASTRO, $dataCadastro, $comparison);
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
	 * @return    MinisterioQuery The current query, for fluid interface
	 */
	public function filterByAtivo($ativo = null, $comparison = null)
	{
		if (is_string($ativo)) {
			$ativo = in_array(strtolower($ativo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(MinisterioPeer::ATIVO, $ativo, $comparison);
	}

	/**
	 * Filter the query by a related Igreja object
	 *
	 * @param     Igreja|PropelCollection $igreja The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MinisterioQuery The current query, for fluid interface
	 */
	public function filterByIgrejaRelatedByIgrejaPertencenteId($igreja, $comparison = null)
	{
		if ($igreja instanceof Igreja) {
			return $this
				->addUsingAlias(MinisterioPeer::IGREJA_PERTENCENTE_ID, $igreja->getId(), $comparison);
		} elseif ($igreja instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(MinisterioPeer::IGREJA_PERTENCENTE_ID, $igreja->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByIgrejaRelatedByIgrejaPertencenteId() only accepts arguments of type Igreja or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the IgrejaRelatedByIgrejaPertencenteId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MinisterioQuery The current query, for fluid interface
	 */
	public function joinIgrejaRelatedByIgrejaPertencenteId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('IgrejaRelatedByIgrejaPertencenteId');

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
			$this->addJoinObject($join, 'IgrejaRelatedByIgrejaPertencenteId');
		}

		return $this;
	}

	/**
	 * Use the IgrejaRelatedByIgrejaPertencenteId relation Igreja object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery A secondary query class using the current class as primary query
	 */
	public function useIgrejaRelatedByIgrejaPertencenteIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinIgrejaRelatedByIgrejaPertencenteId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'IgrejaRelatedByIgrejaPertencenteId', 'IgrejaQuery');
	}

	/**
	 * Filter the query by a related Igreja object
	 *
	 * @param     Igreja|PropelCollection $igreja The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MinisterioQuery The current query, for fluid interface
	 */
	public function filterByIgrejaRelatedByInstituicaoId($igreja, $comparison = null)
	{
		if ($igreja instanceof Igreja) {
			return $this
				->addUsingAlias(MinisterioPeer::INSTITUICAO_ID, $igreja->getId(), $comparison);
		} elseif ($igreja instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(MinisterioPeer::INSTITUICAO_ID, $igreja->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByIgrejaRelatedByInstituicaoId() only accepts arguments of type Igreja or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the IgrejaRelatedByInstituicaoId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MinisterioQuery The current query, for fluid interface
	 */
	public function joinIgrejaRelatedByInstituicaoId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('IgrejaRelatedByInstituicaoId');

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
			$this->addJoinObject($join, 'IgrejaRelatedByInstituicaoId');
		}

		return $this;
	}

	/**
	 * Use the IgrejaRelatedByInstituicaoId relation Igreja object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery A secondary query class using the current class as primary query
	 */
	public function useIgrejaRelatedByInstituicaoIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinIgrejaRelatedByInstituicaoId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'IgrejaRelatedByInstituicaoId', 'IgrejaQuery');
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MinisterioQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(MinisterioPeer::USUARIO_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(MinisterioPeer::USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUsuario() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Usuario relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MinisterioQuery The current query, for fluid interface
	 */
	public function joinUsuario($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Usuario');

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
			$this->addJoinObject($join, 'Usuario');
		}

		return $this;
	}

	/**
	 * Use the Usuario relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUsuario($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Usuario', 'UsuarioQuery');
	}

	/**
	 * Filter the query by a related LiderMinisterio object
	 *
	 * @param     LiderMinisterio $liderMinisterio  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MinisterioQuery The current query, for fluid interface
	 */
	public function filterByLiderMinisterio($liderMinisterio, $comparison = null)
	{
		if ($liderMinisterio instanceof LiderMinisterio) {
			return $this
				->addUsingAlias(MinisterioPeer::ID, $liderMinisterio->getMinisterioId(), $comparison);
		} elseif ($liderMinisterio instanceof PropelCollection) {
			return $this
				->useLiderMinisterioQuery()
				->filterByPrimaryKeys($liderMinisterio->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByLiderMinisterio() only accepts arguments of type LiderMinisterio or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the LiderMinisterio relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MinisterioQuery The current query, for fluid interface
	 */
	public function joinLiderMinisterio($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('LiderMinisterio');

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
			$this->addJoinObject($join, 'LiderMinisterio');
		}

		return $this;
	}

	/**
	 * Use the LiderMinisterio relation LiderMinisterio object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LiderMinisterioQuery A secondary query class using the current class as primary query
	 */
	public function useLiderMinisterioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinLiderMinisterio($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'LiderMinisterio', 'LiderMinisterioQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Ministerio $ministerio Object to remove from the list of results
	 *
	 * @return    MinisterioQuery The current query, for fluid interface
	 */
	public function prune($ministerio = null)
	{
		if ($ministerio) {
			$this->addUsingAlias(MinisterioPeer::ID, $ministerio->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseMinisterioQuery