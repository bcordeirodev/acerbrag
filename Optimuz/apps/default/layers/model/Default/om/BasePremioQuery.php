<?php


/**
 * Base class that represents a query for the 'premio' table.
 *
 * 
 *
 * @method     PremioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PremioQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method     PremioQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     PremioQuery orderByValor($order = Criteria::ASC) Order by the valor column
 * @method     PremioQuery orderByQuantidade($order = Criteria::ASC) Order by the quantidade column
 * @method     PremioQuery orderByDataCadastro($order = Criteria::ASC) Order by the data_cadastro column
 * @method     PremioQuery orderByAtivo($order = Criteria::ASC) Order by the ativo column
 * @method     PremioQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 *
 * @method     PremioQuery groupById() Group by the id column
 * @method     PremioQuery groupByUsuarioId() Group by the usuario_id column
 * @method     PremioQuery groupByNome() Group by the nome column
 * @method     PremioQuery groupByValor() Group by the valor column
 * @method     PremioQuery groupByQuantidade() Group by the quantidade column
 * @method     PremioQuery groupByDataCadastro() Group by the data_cadastro column
 * @method     PremioQuery groupByAtivo() Group by the ativo column
 * @method     PremioQuery groupByDescricao() Group by the descricao column
 *
 * @method     PremioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PremioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PremioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PremioQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     PremioQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     PremioQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     PremioQuery leftJoinSolicitacaoResgate($relationAlias = null) Adds a LEFT JOIN clause to the query using the SolicitacaoResgate relation
 * @method     PremioQuery rightJoinSolicitacaoResgate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SolicitacaoResgate relation
 * @method     PremioQuery innerJoinSolicitacaoResgate($relationAlias = null) Adds a INNER JOIN clause to the query using the SolicitacaoResgate relation
 *
 * @method     Premio findOne(PropelPDO $con = null) Return the first Premio matching the query
 * @method     Premio findOneOrCreate(PropelPDO $con = null) Return the first Premio matching the query, or a new Premio object populated from the query conditions when no match is found
 *
 * @method     Premio findOneById(int $id) Return the first Premio filtered by the id column
 * @method     Premio findOneByUsuarioId(int $usuario_id) Return the first Premio filtered by the usuario_id column
 * @method     Premio findOneByNome(string $nome) Return the first Premio filtered by the nome column
 * @method     Premio findOneByValor(int $valor) Return the first Premio filtered by the valor column
 * @method     Premio findOneByQuantidade(int $quantidade) Return the first Premio filtered by the quantidade column
 * @method     Premio findOneByDataCadastro(string $data_cadastro) Return the first Premio filtered by the data_cadastro column
 * @method     Premio findOneByAtivo(boolean $ativo) Return the first Premio filtered by the ativo column
 * @method     Premio findOneByDescricao(string $descricao) Return the first Premio filtered by the descricao column
 *
 * @method     array findById(int $id) Return Premio objects filtered by the id column
 * @method     array findByUsuarioId(int $usuario_id) Return Premio objects filtered by the usuario_id column
 * @method     array findByNome(string $nome) Return Premio objects filtered by the nome column
 * @method     array findByValor(int $valor) Return Premio objects filtered by the valor column
 * @method     array findByQuantidade(int $quantidade) Return Premio objects filtered by the quantidade column
 * @method     array findByDataCadastro(string $data_cadastro) Return Premio objects filtered by the data_cadastro column
 * @method     array findByAtivo(boolean $ativo) Return Premio objects filtered by the ativo column
 * @method     array findByDescricao(string $descricao) Return Premio objects filtered by the descricao column
 *
 * @package    propel.generator.Default.om
 */
abstract class BasePremioQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BasePremioQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Premio', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PremioQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PremioQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PremioQuery) {
			return $criteria;
		}
		$query = new PremioQuery();
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
	 * @return    Premio|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = PremioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(PremioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Premio A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `USUARIO_ID`, `NOME`, `VALOR`, `QUANTIDADE`, `DATA_CADASTRO`, `ATIVO`, `DESCRICAO` FROM `premio` WHERE `ID` = :p0';
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
			$obj = new Premio();
			$obj->hydrate($row);
			PremioPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Premio|array|mixed the result, formatted by the current formatter
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
	 * @return    PremioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PremioPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PremioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PremioPeer::ID, $keys, Criteria::IN);
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
	 * @return    PremioQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PremioPeer::ID, $id, $comparison);
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
	 * @return    PremioQuery The current query, for fluid interface
	 */
	public function filterByUsuarioId($usuarioId = null, $comparison = null)
	{
		if (is_array($usuarioId)) {
			$useMinMax = false;
			if (isset($usuarioId['min'])) {
				$this->addUsingAlias(PremioPeer::USUARIO_ID, $usuarioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($usuarioId['max'])) {
				$this->addUsingAlias(PremioPeer::USUARIO_ID, $usuarioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PremioPeer::USUARIO_ID, $usuarioId, $comparison);
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
	 * @return    PremioQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PremioPeer::NOME, $nome, $comparison);
	}

	/**
	 * Filter the query on the valor column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByValor(1234); // WHERE valor = 1234
	 * $query->filterByValor(array(12, 34)); // WHERE valor IN (12, 34)
	 * $query->filterByValor(array('min' => 12)); // WHERE valor > 12
	 * </code>
	 *
	 * @param     mixed $valor The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PremioQuery The current query, for fluid interface
	 */
	public function filterByValor($valor = null, $comparison = null)
	{
		if (is_array($valor)) {
			$useMinMax = false;
			if (isset($valor['min'])) {
				$this->addUsingAlias(PremioPeer::VALOR, $valor['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($valor['max'])) {
				$this->addUsingAlias(PremioPeer::VALOR, $valor['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PremioPeer::VALOR, $valor, $comparison);
	}

	/**
	 * Filter the query on the quantidade column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByQuantidade(1234); // WHERE quantidade = 1234
	 * $query->filterByQuantidade(array(12, 34)); // WHERE quantidade IN (12, 34)
	 * $query->filterByQuantidade(array('min' => 12)); // WHERE quantidade > 12
	 * </code>
	 *
	 * @param     mixed $quantidade The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PremioQuery The current query, for fluid interface
	 */
	public function filterByQuantidade($quantidade = null, $comparison = null)
	{
		if (is_array($quantidade)) {
			$useMinMax = false;
			if (isset($quantidade['min'])) {
				$this->addUsingAlias(PremioPeer::QUANTIDADE, $quantidade['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($quantidade['max'])) {
				$this->addUsingAlias(PremioPeer::QUANTIDADE, $quantidade['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PremioPeer::QUANTIDADE, $quantidade, $comparison);
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
	 * @return    PremioQuery The current query, for fluid interface
	 */
	public function filterByDataCadastro($dataCadastro = null, $comparison = null)
	{
		if (is_array($dataCadastro)) {
			$useMinMax = false;
			if (isset($dataCadastro['min'])) {
				$this->addUsingAlias(PremioPeer::DATA_CADASTRO, $dataCadastro['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataCadastro['max'])) {
				$this->addUsingAlias(PremioPeer::DATA_CADASTRO, $dataCadastro['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PremioPeer::DATA_CADASTRO, $dataCadastro, $comparison);
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
	 * @return    PremioQuery The current query, for fluid interface
	 */
	public function filterByAtivo($ativo = null, $comparison = null)
	{
		if (is_string($ativo)) {
			$ativo = in_array(strtolower($ativo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(PremioPeer::ATIVO, $ativo, $comparison);
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
	 * @return    PremioQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PremioPeer::DESCRICAO, $descricao, $comparison);
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PremioQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(PremioPeer::USUARIO_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PremioPeer::USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    PremioQuery The current query, for fluid interface
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
	 * Filter the query by a related SolicitacaoResgate object
	 *
	 * @param     SolicitacaoResgate $solicitacaoResgate  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PremioQuery The current query, for fluid interface
	 */
	public function filterBySolicitacaoResgate($solicitacaoResgate, $comparison = null)
	{
		if ($solicitacaoResgate instanceof SolicitacaoResgate) {
			return $this
				->addUsingAlias(PremioPeer::ID, $solicitacaoResgate->getPremioId(), $comparison);
		} elseif ($solicitacaoResgate instanceof PropelCollection) {
			return $this
				->useSolicitacaoResgateQuery()
				->filterByPrimaryKeys($solicitacaoResgate->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySolicitacaoResgate() only accepts arguments of type SolicitacaoResgate or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SolicitacaoResgate relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PremioQuery The current query, for fluid interface
	 */
	public function joinSolicitacaoResgate($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SolicitacaoResgate');

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
			$this->addJoinObject($join, 'SolicitacaoResgate');
		}

		return $this;
	}

	/**
	 * Use the SolicitacaoResgate relation SolicitacaoResgate object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SolicitacaoResgateQuery A secondary query class using the current class as primary query
	 */
	public function useSolicitacaoResgateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSolicitacaoResgate($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SolicitacaoResgate', 'SolicitacaoResgateQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Premio $premio Object to remove from the list of results
	 *
	 * @return    PremioQuery The current query, for fluid interface
	 */
	public function prune($premio = null)
	{
		if ($premio) {
			$this->addUsingAlias(PremioPeer::ID, $premio->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BasePremioQuery