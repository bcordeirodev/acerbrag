<?php


/**
 * Base class that represents a query for the 'auditoria' table.
 *
 * 
 *
 * @method     AuditoriaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AuditoriaQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method     AuditoriaQuery orderByMensagem($order = Criteria::ASC) Order by the mensagem column
 * @method     AuditoriaQuery orderByObservacao($order = Criteria::ASC) Order by the observacao column
 * @method     AuditoriaQuery orderByData($order = Criteria::ASC) Order by the data column
 * @method     AuditoriaQuery orderByNivel($order = Criteria::ASC) Order by the nivel column
 * @method     AuditoriaQuery orderByIp($order = Criteria::ASC) Order by the ip column
 * @method     AuditoriaQuery orderByTipo($order = Criteria::ASC) Order by the tipo column
 * @method     AuditoriaQuery orderByRegistroId($order = Criteria::ASC) Order by the registro_id column
 *
 * @method     AuditoriaQuery groupById() Group by the id column
 * @method     AuditoriaQuery groupByUsuarioId() Group by the usuario_id column
 * @method     AuditoriaQuery groupByMensagem() Group by the mensagem column
 * @method     AuditoriaQuery groupByObservacao() Group by the observacao column
 * @method     AuditoriaQuery groupByData() Group by the data column
 * @method     AuditoriaQuery groupByNivel() Group by the nivel column
 * @method     AuditoriaQuery groupByIp() Group by the ip column
 * @method     AuditoriaQuery groupByTipo() Group by the tipo column
 * @method     AuditoriaQuery groupByRegistroId() Group by the registro_id column
 *
 * @method     AuditoriaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AuditoriaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AuditoriaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AuditoriaQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     AuditoriaQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     AuditoriaQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     Auditoria findOne(PropelPDO $con = null) Return the first Auditoria matching the query
 * @method     Auditoria findOneOrCreate(PropelPDO $con = null) Return the first Auditoria matching the query, or a new Auditoria object populated from the query conditions when no match is found
 *
 * @method     Auditoria findOneById(int $id) Return the first Auditoria filtered by the id column
 * @method     Auditoria findOneByUsuarioId(int $usuario_id) Return the first Auditoria filtered by the usuario_id column
 * @method     Auditoria findOneByMensagem(string $mensagem) Return the first Auditoria filtered by the mensagem column
 * @method     Auditoria findOneByObservacao(string $observacao) Return the first Auditoria filtered by the observacao column
 * @method     Auditoria findOneByData(string $data) Return the first Auditoria filtered by the data column
 * @method     Auditoria findOneByNivel(int $nivel) Return the first Auditoria filtered by the nivel column
 * @method     Auditoria findOneByIp(string $ip) Return the first Auditoria filtered by the ip column
 * @method     Auditoria findOneByTipo(int $tipo) Return the first Auditoria filtered by the tipo column
 * @method     Auditoria findOneByRegistroId(int $registro_id) Return the first Auditoria filtered by the registro_id column
 *
 * @method     array findById(int $id) Return Auditoria objects filtered by the id column
 * @method     array findByUsuarioId(int $usuario_id) Return Auditoria objects filtered by the usuario_id column
 * @method     array findByMensagem(string $mensagem) Return Auditoria objects filtered by the mensagem column
 * @method     array findByObservacao(string $observacao) Return Auditoria objects filtered by the observacao column
 * @method     array findByData(string $data) Return Auditoria objects filtered by the data column
 * @method     array findByNivel(int $nivel) Return Auditoria objects filtered by the nivel column
 * @method     array findByIp(string $ip) Return Auditoria objects filtered by the ip column
 * @method     array findByTipo(int $tipo) Return Auditoria objects filtered by the tipo column
 * @method     array findByRegistroId(int $registro_id) Return Auditoria objects filtered by the registro_id column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseAuditoriaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseAuditoriaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Auditoria', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AuditoriaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AuditoriaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AuditoriaQuery) {
			return $criteria;
		}
		$query = new AuditoriaQuery();
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
	 * @return    Auditoria|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = AuditoriaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(AuditoriaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Auditoria A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `USUARIO_ID`, `MENSAGEM`, `OBSERVACAO`, `DATA`, `NIVEL`, `IP`, `TIPO`, `REGISTRO_ID` FROM `auditoria` WHERE `ID` = :p0';
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
			$obj = new Auditoria();
			$obj->hydrate($row);
			AuditoriaPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Auditoria|array|mixed the result, formatted by the current formatter
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
	 * @return    AuditoriaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AuditoriaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AuditoriaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AuditoriaPeer::ID, $keys, Criteria::IN);
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
	 * @return    AuditoriaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AuditoriaPeer::ID, $id, $comparison);
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
	 * @return    AuditoriaQuery The current query, for fluid interface
	 */
	public function filterByUsuarioId($usuarioId = null, $comparison = null)
	{
		if (is_array($usuarioId)) {
			$useMinMax = false;
			if (isset($usuarioId['min'])) {
				$this->addUsingAlias(AuditoriaPeer::USUARIO_ID, $usuarioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($usuarioId['max'])) {
				$this->addUsingAlias(AuditoriaPeer::USUARIO_ID, $usuarioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AuditoriaPeer::USUARIO_ID, $usuarioId, $comparison);
	}

	/**
	 * Filter the query on the mensagem column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMensagem('fooValue');   // WHERE mensagem = 'fooValue'
	 * $query->filterByMensagem('%fooValue%'); // WHERE mensagem LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $mensagem The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AuditoriaQuery The current query, for fluid interface
	 */
	public function filterByMensagem($mensagem = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($mensagem)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $mensagem)) {
				$mensagem = str_replace('*', '%', $mensagem);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AuditoriaPeer::MENSAGEM, $mensagem, $comparison);
	}

	/**
	 * Filter the query on the observacao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByObservacao('fooValue');   // WHERE observacao = 'fooValue'
	 * $query->filterByObservacao('%fooValue%'); // WHERE observacao LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $observacao The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AuditoriaQuery The current query, for fluid interface
	 */
	public function filterByObservacao($observacao = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($observacao)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $observacao)) {
				$observacao = str_replace('*', '%', $observacao);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AuditoriaPeer::OBSERVACAO, $observacao, $comparison);
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
	 * @return    AuditoriaQuery The current query, for fluid interface
	 */
	public function filterByData($data = null, $comparison = null)
	{
		if (is_array($data)) {
			$useMinMax = false;
			if (isset($data['min'])) {
				$this->addUsingAlias(AuditoriaPeer::DATA, $data['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($data['max'])) {
				$this->addUsingAlias(AuditoriaPeer::DATA, $data['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AuditoriaPeer::DATA, $data, $comparison);
	}

	/**
	 * Filter the query on the nivel column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNivel(1234); // WHERE nivel = 1234
	 * $query->filterByNivel(array(12, 34)); // WHERE nivel IN (12, 34)
	 * $query->filterByNivel(array('min' => 12)); // WHERE nivel > 12
	 * </code>
	 *
	 * @param     mixed $nivel The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AuditoriaQuery The current query, for fluid interface
	 */
	public function filterByNivel($nivel = null, $comparison = null)
	{
		if (is_array($nivel)) {
			$useMinMax = false;
			if (isset($nivel['min'])) {
				$this->addUsingAlias(AuditoriaPeer::NIVEL, $nivel['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($nivel['max'])) {
				$this->addUsingAlias(AuditoriaPeer::NIVEL, $nivel['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AuditoriaPeer::NIVEL, $nivel, $comparison);
	}

	/**
	 * Filter the query on the ip column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIp('fooValue');   // WHERE ip = 'fooValue'
	 * $query->filterByIp('%fooValue%'); // WHERE ip LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $ip The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AuditoriaQuery The current query, for fluid interface
	 */
	public function filterByIp($ip = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($ip)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $ip)) {
				$ip = str_replace('*', '%', $ip);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AuditoriaPeer::IP, $ip, $comparison);
	}

	/**
	 * Filter the query on the tipo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTipo(1234); // WHERE tipo = 1234
	 * $query->filterByTipo(array(12, 34)); // WHERE tipo IN (12, 34)
	 * $query->filterByTipo(array('min' => 12)); // WHERE tipo > 12
	 * </code>
	 *
	 * @param     mixed $tipo The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AuditoriaQuery The current query, for fluid interface
	 */
	public function filterByTipo($tipo = null, $comparison = null)
	{
		if (is_array($tipo)) {
			$useMinMax = false;
			if (isset($tipo['min'])) {
				$this->addUsingAlias(AuditoriaPeer::TIPO, $tipo['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($tipo['max'])) {
				$this->addUsingAlias(AuditoriaPeer::TIPO, $tipo['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AuditoriaPeer::TIPO, $tipo, $comparison);
	}

	/**
	 * Filter the query on the registro_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRegistroId(1234); // WHERE registro_id = 1234
	 * $query->filterByRegistroId(array(12, 34)); // WHERE registro_id IN (12, 34)
	 * $query->filterByRegistroId(array('min' => 12)); // WHERE registro_id > 12
	 * </code>
	 *
	 * @param     mixed $registroId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AuditoriaQuery The current query, for fluid interface
	 */
	public function filterByRegistroId($registroId = null, $comparison = null)
	{
		if (is_array($registroId)) {
			$useMinMax = false;
			if (isset($registroId['min'])) {
				$this->addUsingAlias(AuditoriaPeer::REGISTRO_ID, $registroId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($registroId['max'])) {
				$this->addUsingAlias(AuditoriaPeer::REGISTRO_ID, $registroId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AuditoriaPeer::REGISTRO_ID, $registroId, $comparison);
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AuditoriaQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(AuditoriaPeer::USUARIO_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AuditoriaPeer::USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    AuditoriaQuery The current query, for fluid interface
	 */
	public function joinUsuario($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useUsuarioQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUsuario($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Usuario', 'UsuarioQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Auditoria $auditoria Object to remove from the list of results
	 *
	 * @return    AuditoriaQuery The current query, for fluid interface
	 */
	public function prune($auditoria = null)
	{
		if ($auditoria) {
			$this->addUsingAlias(AuditoriaPeer::ID, $auditoria->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseAuditoriaQuery