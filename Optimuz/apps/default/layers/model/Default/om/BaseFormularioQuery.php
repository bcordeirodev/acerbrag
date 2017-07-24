<?php


/**
 * Base class that represents a query for the 'formulario' table.
 *
 * 
 *
 * @method     FormularioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     FormularioQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method     FormularioQuery orderByPesquisaId($order = Criteria::ASC) Order by the pesquisa_id column
 * @method     FormularioQuery orderByDataInicio($order = Criteria::ASC) Order by the data_inicio column
 * @method     FormularioQuery orderByDataFim($order = Criteria::ASC) Order by the data_fim column
 * @method     FormularioQuery orderByCoordernada($order = Criteria::ASC) Order by the coordernada column
 *
 * @method     FormularioQuery groupById() Group by the id column
 * @method     FormularioQuery groupByUsuarioId() Group by the usuario_id column
 * @method     FormularioQuery groupByPesquisaId() Group by the pesquisa_id column
 * @method     FormularioQuery groupByDataInicio() Group by the data_inicio column
 * @method     FormularioQuery groupByDataFim() Group by the data_fim column
 * @method     FormularioQuery groupByCoordernada() Group by the coordernada column
 *
 * @method     FormularioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     FormularioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     FormularioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     FormularioQuery leftJoinPesquisa($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pesquisa relation
 * @method     FormularioQuery rightJoinPesquisa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pesquisa relation
 * @method     FormularioQuery innerJoinPesquisa($relationAlias = null) Adds a INNER JOIN clause to the query using the Pesquisa relation
 *
 * @method     FormularioQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     FormularioQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     FormularioQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     FormularioQuery leftJoinGravacao($relationAlias = null) Adds a LEFT JOIN clause to the query using the Gravacao relation
 * @method     FormularioQuery rightJoinGravacao($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Gravacao relation
 * @method     FormularioQuery innerJoinGravacao($relationAlias = null) Adds a INNER JOIN clause to the query using the Gravacao relation
 *
 * @method     FormularioQuery leftJoinResposta($relationAlias = null) Adds a LEFT JOIN clause to the query using the Resposta relation
 * @method     FormularioQuery rightJoinResposta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Resposta relation
 * @method     FormularioQuery innerJoinResposta($relationAlias = null) Adds a INNER JOIN clause to the query using the Resposta relation
 *
 * @method     Formulario findOne(PropelPDO $con = null) Return the first Formulario matching the query
 * @method     Formulario findOneOrCreate(PropelPDO $con = null) Return the first Formulario matching the query, or a new Formulario object populated from the query conditions when no match is found
 *
 * @method     Formulario findOneById(int $id) Return the first Formulario filtered by the id column
 * @method     Formulario findOneByUsuarioId(int $usuario_id) Return the first Formulario filtered by the usuario_id column
 * @method     Formulario findOneByPesquisaId(int $pesquisa_id) Return the first Formulario filtered by the pesquisa_id column
 * @method     Formulario findOneByDataInicio(string $data_inicio) Return the first Formulario filtered by the data_inicio column
 * @method     Formulario findOneByDataFim(string $data_fim) Return the first Formulario filtered by the data_fim column
 * @method     Formulario findOneByCoordernada(string $coordernada) Return the first Formulario filtered by the coordernada column
 *
 * @method     array findById(int $id) Return Formulario objects filtered by the id column
 * @method     array findByUsuarioId(int $usuario_id) Return Formulario objects filtered by the usuario_id column
 * @method     array findByPesquisaId(int $pesquisa_id) Return Formulario objects filtered by the pesquisa_id column
 * @method     array findByDataInicio(string $data_inicio) Return Formulario objects filtered by the data_inicio column
 * @method     array findByDataFim(string $data_fim) Return Formulario objects filtered by the data_fim column
 * @method     array findByCoordernada(string $coordernada) Return Formulario objects filtered by the coordernada column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseFormularioQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseFormularioQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Formulario', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new FormularioQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    FormularioQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof FormularioQuery) {
			return $criteria;
		}
		$query = new FormularioQuery();
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
	 * @return    Formulario|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = FormularioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(FormularioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Formulario A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `USUARIO_ID`, `PESQUISA_ID`, `DATA_INICIO`, `DATA_FIM`, `COORDERNADA` FROM `formulario` WHERE `ID` = :p0';
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
			$obj = new Formulario();
			$obj->hydrate($row);
			FormularioPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Formulario|array|mixed the result, formatted by the current formatter
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
	 * @return    FormularioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(FormularioPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    FormularioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(FormularioPeer::ID, $keys, Criteria::IN);
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
	 * @return    FormularioQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(FormularioPeer::ID, $id, $comparison);
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
	 * @return    FormularioQuery The current query, for fluid interface
	 */
	public function filterByUsuarioId($usuarioId = null, $comparison = null)
	{
		if (is_array($usuarioId)) {
			$useMinMax = false;
			if (isset($usuarioId['min'])) {
				$this->addUsingAlias(FormularioPeer::USUARIO_ID, $usuarioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($usuarioId['max'])) {
				$this->addUsingAlias(FormularioPeer::USUARIO_ID, $usuarioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(FormularioPeer::USUARIO_ID, $usuarioId, $comparison);
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
	 * @return    FormularioQuery The current query, for fluid interface
	 */
	public function filterByPesquisaId($pesquisaId = null, $comparison = null)
	{
		if (is_array($pesquisaId)) {
			$useMinMax = false;
			if (isset($pesquisaId['min'])) {
				$this->addUsingAlias(FormularioPeer::PESQUISA_ID, $pesquisaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($pesquisaId['max'])) {
				$this->addUsingAlias(FormularioPeer::PESQUISA_ID, $pesquisaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(FormularioPeer::PESQUISA_ID, $pesquisaId, $comparison);
	}

	/**
	 * Filter the query on the data_inicio column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataInicio('2011-03-14'); // WHERE data_inicio = '2011-03-14'
	 * $query->filterByDataInicio('now'); // WHERE data_inicio = '2011-03-14'
	 * $query->filterByDataInicio(array('max' => 'yesterday')); // WHERE data_inicio > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataInicio The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FormularioQuery The current query, for fluid interface
	 */
	public function filterByDataInicio($dataInicio = null, $comparison = null)
	{
		if (is_array($dataInicio)) {
			$useMinMax = false;
			if (isset($dataInicio['min'])) {
				$this->addUsingAlias(FormularioPeer::DATA_INICIO, $dataInicio['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataInicio['max'])) {
				$this->addUsingAlias(FormularioPeer::DATA_INICIO, $dataInicio['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(FormularioPeer::DATA_INICIO, $dataInicio, $comparison);
	}

	/**
	 * Filter the query on the data_fim column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataFim('2011-03-14'); // WHERE data_fim = '2011-03-14'
	 * $query->filterByDataFim('now'); // WHERE data_fim = '2011-03-14'
	 * $query->filterByDataFim(array('max' => 'yesterday')); // WHERE data_fim > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataFim The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FormularioQuery The current query, for fluid interface
	 */
	public function filterByDataFim($dataFim = null, $comparison = null)
	{
		if (is_array($dataFim)) {
			$useMinMax = false;
			if (isset($dataFim['min'])) {
				$this->addUsingAlias(FormularioPeer::DATA_FIM, $dataFim['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataFim['max'])) {
				$this->addUsingAlias(FormularioPeer::DATA_FIM, $dataFim['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(FormularioPeer::DATA_FIM, $dataFim, $comparison);
	}

	/**
	 * Filter the query on the coordernada column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCoordernada('fooValue');   // WHERE coordernada = 'fooValue'
	 * $query->filterByCoordernada('%fooValue%'); // WHERE coordernada LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $coordernada The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FormularioQuery The current query, for fluid interface
	 */
	public function filterByCoordernada($coordernada = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($coordernada)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $coordernada)) {
				$coordernada = str_replace('*', '%', $coordernada);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FormularioPeer::COORDERNADA, $coordernada, $comparison);
	}

	/**
	 * Filter the query by a related Pesquisa object
	 *
	 * @param     Pesquisa|PropelCollection $pesquisa The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FormularioQuery The current query, for fluid interface
	 */
	public function filterByPesquisa($pesquisa, $comparison = null)
	{
		if ($pesquisa instanceof Pesquisa) {
			return $this
				->addUsingAlias(FormularioPeer::PESQUISA_ID, $pesquisa->getId(), $comparison);
		} elseif ($pesquisa instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(FormularioPeer::PESQUISA_ID, $pesquisa->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    FormularioQuery The current query, for fluid interface
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
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FormularioQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(FormularioPeer::USUARIO_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(FormularioPeer::USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    FormularioQuery The current query, for fluid interface
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
	 * Filter the query by a related Gravacao object
	 *
	 * @param     Gravacao $gravacao  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FormularioQuery The current query, for fluid interface
	 */
	public function filterByGravacao($gravacao, $comparison = null)
	{
		if ($gravacao instanceof Gravacao) {
			return $this
				->addUsingAlias(FormularioPeer::ID, $gravacao->getFormularioId(), $comparison);
		} elseif ($gravacao instanceof PropelCollection) {
			return $this
				->useGravacaoQuery()
				->filterByPrimaryKeys($gravacao->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByGravacao() only accepts arguments of type Gravacao or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Gravacao relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    FormularioQuery The current query, for fluid interface
	 */
	public function joinGravacao($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Gravacao');

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
			$this->addJoinObject($join, 'Gravacao');
		}

		return $this;
	}

	/**
	 * Use the Gravacao relation Gravacao object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GravacaoQuery A secondary query class using the current class as primary query
	 */
	public function useGravacaoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinGravacao($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Gravacao', 'GravacaoQuery');
	}

	/**
	 * Filter the query by a related Resposta object
	 *
	 * @param     Resposta $resposta  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FormularioQuery The current query, for fluid interface
	 */
	public function filterByResposta($resposta, $comparison = null)
	{
		if ($resposta instanceof Resposta) {
			return $this
				->addUsingAlias(FormularioPeer::ID, $resposta->getFormularioId(), $comparison);
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
	 * @return    FormularioQuery The current query, for fluid interface
	 */
	public function joinResposta($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useRespostaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinResposta($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Resposta', 'RespostaQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Formulario $formulario Object to remove from the list of results
	 *
	 * @return    FormularioQuery The current query, for fluid interface
	 */
	public function prune($formulario = null)
	{
		if ($formulario) {
			$this->addUsingAlias(FormularioPeer::ID, $formulario->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseFormularioQuery