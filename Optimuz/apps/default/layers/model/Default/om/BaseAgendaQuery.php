<?php


/**
 * Base class that represents a query for the 'agenda' table.
 *
 * 
 *
 * @method     AgendaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AgendaQuery orderByInstituicaoId($order = Criteria::ASC) Order by the instituicao_id column
 * @method     AgendaQuery orderByEnderecoId($order = Criteria::ASC) Order by the endereco_id column
 * @method     AgendaQuery orderByCriadorId($order = Criteria::ASC) Order by the criador_id column
 * @method     AgendaQuery orderByTitulo($order = Criteria::ASC) Order by the titulo column
 * @method     AgendaQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 * @method     AgendaQuery orderByData($order = Criteria::ASC) Order by the data column
 * @method     AgendaQuery orderByHora($order = Criteria::ASC) Order by the hora column
 * @method     AgendaQuery orderByAtiva($order = Criteria::ASC) Order by the ativa column
 *
 * @method     AgendaQuery groupById() Group by the id column
 * @method     AgendaQuery groupByInstituicaoId() Group by the instituicao_id column
 * @method     AgendaQuery groupByEnderecoId() Group by the endereco_id column
 * @method     AgendaQuery groupByCriadorId() Group by the criador_id column
 * @method     AgendaQuery groupByTitulo() Group by the titulo column
 * @method     AgendaQuery groupByDescricao() Group by the descricao column
 * @method     AgendaQuery groupByData() Group by the data column
 * @method     AgendaQuery groupByHora() Group by the hora column
 * @method     AgendaQuery groupByAtiva() Group by the ativa column
 *
 * @method     AgendaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AgendaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AgendaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AgendaQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     AgendaQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     AgendaQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     AgendaQuery leftJoinEndereco($relationAlias = null) Adds a LEFT JOIN clause to the query using the Endereco relation
 * @method     AgendaQuery rightJoinEndereco($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Endereco relation
 * @method     AgendaQuery innerJoinEndereco($relationAlias = null) Adds a INNER JOIN clause to the query using the Endereco relation
 *
 * @method     AgendaQuery leftJoinAgendaIgreja($relationAlias = null) Adds a LEFT JOIN clause to the query using the AgendaIgreja relation
 * @method     AgendaQuery rightJoinAgendaIgreja($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AgendaIgreja relation
 * @method     AgendaQuery innerJoinAgendaIgreja($relationAlias = null) Adds a INNER JOIN clause to the query using the AgendaIgreja relation
 *
 * @method     Agenda findOne(PropelPDO $con = null) Return the first Agenda matching the query
 * @method     Agenda findOneOrCreate(PropelPDO $con = null) Return the first Agenda matching the query, or a new Agenda object populated from the query conditions when no match is found
 *
 * @method     Agenda findOneById(int $id) Return the first Agenda filtered by the id column
 * @method     Agenda findOneByInstituicaoId(int $instituicao_id) Return the first Agenda filtered by the instituicao_id column
 * @method     Agenda findOneByEnderecoId(int $endereco_id) Return the first Agenda filtered by the endereco_id column
 * @method     Agenda findOneByCriadorId(int $criador_id) Return the first Agenda filtered by the criador_id column
 * @method     Agenda findOneByTitulo(string $titulo) Return the first Agenda filtered by the titulo column
 * @method     Agenda findOneByDescricao(string $descricao) Return the first Agenda filtered by the descricao column
 * @method     Agenda findOneByData(string $data) Return the first Agenda filtered by the data column
 * @method     Agenda findOneByHora(string $hora) Return the first Agenda filtered by the hora column
 * @method     Agenda findOneByAtiva(boolean $ativa) Return the first Agenda filtered by the ativa column
 *
 * @method     array findById(int $id) Return Agenda objects filtered by the id column
 * @method     array findByInstituicaoId(int $instituicao_id) Return Agenda objects filtered by the instituicao_id column
 * @method     array findByEnderecoId(int $endereco_id) Return Agenda objects filtered by the endereco_id column
 * @method     array findByCriadorId(int $criador_id) Return Agenda objects filtered by the criador_id column
 * @method     array findByTitulo(string $titulo) Return Agenda objects filtered by the titulo column
 * @method     array findByDescricao(string $descricao) Return Agenda objects filtered by the descricao column
 * @method     array findByData(string $data) Return Agenda objects filtered by the data column
 * @method     array findByHora(string $hora) Return Agenda objects filtered by the hora column
 * @method     array findByAtiva(boolean $ativa) Return Agenda objects filtered by the ativa column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseAgendaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseAgendaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Agenda', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AgendaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AgendaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AgendaQuery) {
			return $criteria;
		}
		$query = new AgendaQuery();
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
	 * @return    Agenda|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = AgendaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(AgendaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Agenda A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `INSTITUICAO_ID`, `ENDERECO_ID`, `CRIADOR_ID`, `TITULO`, `DESCRICAO`, `DATA`, `HORA`, `ATIVA` FROM `agenda` WHERE `ID` = :p0';
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
			$obj = new Agenda();
			$obj->hydrate($row);
			AgendaPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Agenda|array|mixed the result, formatted by the current formatter
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
	 * @return    AgendaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AgendaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AgendaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AgendaPeer::ID, $keys, Criteria::IN);
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
	 * @return    AgendaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AgendaPeer::ID, $id, $comparison);
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
	 * @param     mixed $instituicaoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AgendaQuery The current query, for fluid interface
	 */
	public function filterByInstituicaoId($instituicaoId = null, $comparison = null)
	{
		if (is_array($instituicaoId)) {
			$useMinMax = false;
			if (isset($instituicaoId['min'])) {
				$this->addUsingAlias(AgendaPeer::INSTITUICAO_ID, $instituicaoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($instituicaoId['max'])) {
				$this->addUsingAlias(AgendaPeer::INSTITUICAO_ID, $instituicaoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AgendaPeer::INSTITUICAO_ID, $instituicaoId, $comparison);
	}

	/**
	 * Filter the query on the endereco_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEnderecoId(1234); // WHERE endereco_id = 1234
	 * $query->filterByEnderecoId(array(12, 34)); // WHERE endereco_id IN (12, 34)
	 * $query->filterByEnderecoId(array('min' => 12)); // WHERE endereco_id > 12
	 * </code>
	 *
	 * @see       filterByEndereco()
	 *
	 * @param     mixed $enderecoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AgendaQuery The current query, for fluid interface
	 */
	public function filterByEnderecoId($enderecoId = null, $comparison = null)
	{
		if (is_array($enderecoId)) {
			$useMinMax = false;
			if (isset($enderecoId['min'])) {
				$this->addUsingAlias(AgendaPeer::ENDERECO_ID, $enderecoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($enderecoId['max'])) {
				$this->addUsingAlias(AgendaPeer::ENDERECO_ID, $enderecoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AgendaPeer::ENDERECO_ID, $enderecoId, $comparison);
	}

	/**
	 * Filter the query on the criador_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCriadorId(1234); // WHERE criador_id = 1234
	 * $query->filterByCriadorId(array(12, 34)); // WHERE criador_id IN (12, 34)
	 * $query->filterByCriadorId(array('min' => 12)); // WHERE criador_id > 12
	 * </code>
	 *
	 * @see       filterByUsuario()
	 *
	 * @param     mixed $criadorId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AgendaQuery The current query, for fluid interface
	 */
	public function filterByCriadorId($criadorId = null, $comparison = null)
	{
		if (is_array($criadorId)) {
			$useMinMax = false;
			if (isset($criadorId['min'])) {
				$this->addUsingAlias(AgendaPeer::CRIADOR_ID, $criadorId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($criadorId['max'])) {
				$this->addUsingAlias(AgendaPeer::CRIADOR_ID, $criadorId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AgendaPeer::CRIADOR_ID, $criadorId, $comparison);
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
	 * @return    AgendaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AgendaPeer::TITULO, $titulo, $comparison);
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
	 * @return    AgendaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AgendaPeer::DESCRICAO, $descricao, $comparison);
	}

	/**
	 * Filter the query on the data column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByData('2011-03-14'); // WHERE data = '2011-03-14'
	 * $query->filterByData('now'); // WHERE data = '2011-03-14'
	 * $query->filterByData(array('max' => 'yesterday')); // WHERE data > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $data The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AgendaQuery The current query, for fluid interface
	 */
	public function filterByData($data = null, $comparison = null)
	{
		if (is_array($data)) {
			$useMinMax = false;
			if (isset($data['min'])) {
				$this->addUsingAlias(AgendaPeer::DATA, $data['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($data['max'])) {
				$this->addUsingAlias(AgendaPeer::DATA, $data['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AgendaPeer::DATA, $data, $comparison);
	}

	/**
	 * Filter the query on the hora column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByHora('fooValue');   // WHERE hora = 'fooValue'
	 * $query->filterByHora('%fooValue%'); // WHERE hora LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $hora The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AgendaQuery The current query, for fluid interface
	 */
	public function filterByHora($hora = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($hora)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $hora)) {
				$hora = str_replace('*', '%', $hora);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AgendaPeer::HORA, $hora, $comparison);
	}

	/**
	 * Filter the query on the ativa column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAtiva(true); // WHERE ativa = true
	 * $query->filterByAtiva('yes'); // WHERE ativa = true
	 * </code>
	 *
	 * @param     boolean|string $ativa The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AgendaQuery The current query, for fluid interface
	 */
	public function filterByAtiva($ativa = null, $comparison = null)
	{
		if (is_string($ativa)) {
			$ativa = in_array(strtolower($ativa), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(AgendaPeer::ATIVA, $ativa, $comparison);
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AgendaQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(AgendaPeer::CRIADOR_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AgendaPeer::CRIADOR_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    AgendaQuery The current query, for fluid interface
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
	 * Filter the query by a related Endereco object
	 *
	 * @param     Endereco|PropelCollection $endereco The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AgendaQuery The current query, for fluid interface
	 */
	public function filterByEndereco($endereco, $comparison = null)
	{
		if ($endereco instanceof Endereco) {
			return $this
				->addUsingAlias(AgendaPeer::ENDERECO_ID, $endereco->getId(), $comparison);
		} elseif ($endereco instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AgendaPeer::ENDERECO_ID, $endereco->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByEndereco() only accepts arguments of type Endereco or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Endereco relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AgendaQuery The current query, for fluid interface
	 */
	public function joinEndereco($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Endereco');

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
			$this->addJoinObject($join, 'Endereco');
		}

		return $this;
	}

	/**
	 * Use the Endereco relation Endereco object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EnderecoQuery A secondary query class using the current class as primary query
	 */
	public function useEnderecoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinEndereco($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Endereco', 'EnderecoQuery');
	}

	/**
	 * Filter the query by a related AgendaIgreja object
	 *
	 * @param     AgendaIgreja $agendaIgreja  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AgendaQuery The current query, for fluid interface
	 */
	public function filterByAgendaIgreja($agendaIgreja, $comparison = null)
	{
		if ($agendaIgreja instanceof AgendaIgreja) {
			return $this
				->addUsingAlias(AgendaPeer::ID, $agendaIgreja->getAgendaId(), $comparison);
		} elseif ($agendaIgreja instanceof PropelCollection) {
			return $this
				->useAgendaIgrejaQuery()
				->filterByPrimaryKeys($agendaIgreja->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAgendaIgreja() only accepts arguments of type AgendaIgreja or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AgendaIgreja relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AgendaQuery The current query, for fluid interface
	 */
	public function joinAgendaIgreja($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AgendaIgreja');

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
			$this->addJoinObject($join, 'AgendaIgreja');
		}

		return $this;
	}

	/**
	 * Use the AgendaIgreja relation AgendaIgreja object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AgendaIgrejaQuery A secondary query class using the current class as primary query
	 */
	public function useAgendaIgrejaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAgendaIgreja($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AgendaIgreja', 'AgendaIgrejaQuery');
	}

	/**
	 * Filter the query by a related Igreja object
	 * using the agenda_igreja table as cross reference
	 *
	 * @param     Igreja $igreja the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AgendaQuery The current query, for fluid interface
	 */
	public function filterByIgreja($igreja, $comparison = Criteria::EQUAL)
	{
		return $this
			->useAgendaIgrejaQuery()
			->filterByIgreja($igreja, $comparison)
			->endUse();
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Agenda $agenda Object to remove from the list of results
	 *
	 * @return    AgendaQuery The current query, for fluid interface
	 */
	public function prune($agenda = null)
	{
		if ($agenda) {
			$this->addUsingAlias(AgendaPeer::ID, $agenda->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseAgendaQuery