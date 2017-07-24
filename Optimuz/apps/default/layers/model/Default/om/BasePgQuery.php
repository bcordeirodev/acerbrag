<?php


/**
 * Base class that represents a query for the 'pg' table.
 *
 * 
 *
 * @method     PgQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PgQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method     PgQuery orderByIgrejaResponsavelId($order = Criteria::ASC) Order by the igreja_responsavel_id column
 * @method     PgQuery orderByEnderecoId($order = Criteria::ASC) Order by the endereco_id column
 * @method     PgQuery orderByInstituicaoId($order = Criteria::ASC) Order by the instituicao_id column
 * @method     PgQuery orderByTitulo($order = Criteria::ASC) Order by the titulo column
 * @method     PgQuery orderByHora($order = Criteria::ASC) Order by the hora column
 * @method     PgQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 * @method     PgQuery orderByDataCadastro($order = Criteria::ASC) Order by the data_cadastro column
 * @method     PgQuery orderByAtiva($order = Criteria::ASC) Order by the ativa column
 *
 * @method     PgQuery groupById() Group by the id column
 * @method     PgQuery groupByUsuarioId() Group by the usuario_id column
 * @method     PgQuery groupByIgrejaResponsavelId() Group by the igreja_responsavel_id column
 * @method     PgQuery groupByEnderecoId() Group by the endereco_id column
 * @method     PgQuery groupByInstituicaoId() Group by the instituicao_id column
 * @method     PgQuery groupByTitulo() Group by the titulo column
 * @method     PgQuery groupByHora() Group by the hora column
 * @method     PgQuery groupByDescricao() Group by the descricao column
 * @method     PgQuery groupByDataCadastro() Group by the data_cadastro column
 * @method     PgQuery groupByAtiva() Group by the ativa column
 *
 * @method     PgQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PgQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PgQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PgQuery leftJoinEndereco($relationAlias = null) Adds a LEFT JOIN clause to the query using the Endereco relation
 * @method     PgQuery rightJoinEndereco($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Endereco relation
 * @method     PgQuery innerJoinEndereco($relationAlias = null) Adds a INNER JOIN clause to the query using the Endereco relation
 *
 * @method     PgQuery leftJoinIgreja($relationAlias = null) Adds a LEFT JOIN clause to the query using the Igreja relation
 * @method     PgQuery rightJoinIgreja($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Igreja relation
 * @method     PgQuery innerJoinIgreja($relationAlias = null) Adds a INNER JOIN clause to the query using the Igreja relation
 *
 * @method     PgQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     PgQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     PgQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     PgQuery leftJoinPgUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the PgUsuario relation
 * @method     PgQuery rightJoinPgUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PgUsuario relation
 * @method     PgQuery innerJoinPgUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the PgUsuario relation
 *
 * @method     Pg findOne(PropelPDO $con = null) Return the first Pg matching the query
 * @method     Pg findOneOrCreate(PropelPDO $con = null) Return the first Pg matching the query, or a new Pg object populated from the query conditions when no match is found
 *
 * @method     Pg findOneById(int $id) Return the first Pg filtered by the id column
 * @method     Pg findOneByUsuarioId(int $usuario_id) Return the first Pg filtered by the usuario_id column
 * @method     Pg findOneByIgrejaResponsavelId(int $igreja_responsavel_id) Return the first Pg filtered by the igreja_responsavel_id column
 * @method     Pg findOneByEnderecoId(int $endereco_id) Return the first Pg filtered by the endereco_id column
 * @method     Pg findOneByInstituicaoId(int $instituicao_id) Return the first Pg filtered by the instituicao_id column
 * @method     Pg findOneByTitulo(string $titulo) Return the first Pg filtered by the titulo column
 * @method     Pg findOneByHora(string $hora) Return the first Pg filtered by the hora column
 * @method     Pg findOneByDescricao(string $descricao) Return the first Pg filtered by the descricao column
 * @method     Pg findOneByDataCadastro(string $data_cadastro) Return the first Pg filtered by the data_cadastro column
 * @method     Pg findOneByAtiva(boolean $ativa) Return the first Pg filtered by the ativa column
 *
 * @method     array findById(int $id) Return Pg objects filtered by the id column
 * @method     array findByUsuarioId(int $usuario_id) Return Pg objects filtered by the usuario_id column
 * @method     array findByIgrejaResponsavelId(int $igreja_responsavel_id) Return Pg objects filtered by the igreja_responsavel_id column
 * @method     array findByEnderecoId(int $endereco_id) Return Pg objects filtered by the endereco_id column
 * @method     array findByInstituicaoId(int $instituicao_id) Return Pg objects filtered by the instituicao_id column
 * @method     array findByTitulo(string $titulo) Return Pg objects filtered by the titulo column
 * @method     array findByHora(string $hora) Return Pg objects filtered by the hora column
 * @method     array findByDescricao(string $descricao) Return Pg objects filtered by the descricao column
 * @method     array findByDataCadastro(string $data_cadastro) Return Pg objects filtered by the data_cadastro column
 * @method     array findByAtiva(boolean $ativa) Return Pg objects filtered by the ativa column
 *
 * @package    propel.generator.Default.om
 */
abstract class BasePgQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BasePgQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Pg', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PgQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PgQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PgQuery) {
			return $criteria;
		}
		$query = new PgQuery();
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
	 * @return    Pg|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = PgPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(PgPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Pg A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `USUARIO_ID`, `IGREJA_RESPONSAVEL_ID`, `ENDERECO_ID`, `INSTITUICAO_ID`, `TITULO`, `HORA`, `DESCRICAO`, `DATA_CADASTRO`, `ATIVA` FROM `pg` WHERE `ID` = :p0';
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
			$obj = new Pg();
			$obj->hydrate($row);
			PgPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Pg|array|mixed the result, formatted by the current formatter
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
	 * @return    PgQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PgPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PgQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PgPeer::ID, $keys, Criteria::IN);
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
	 * @return    PgQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PgPeer::ID, $id, $comparison);
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
	 * @return    PgQuery The current query, for fluid interface
	 */
	public function filterByUsuarioId($usuarioId = null, $comparison = null)
	{
		if (is_array($usuarioId)) {
			$useMinMax = false;
			if (isset($usuarioId['min'])) {
				$this->addUsingAlias(PgPeer::USUARIO_ID, $usuarioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($usuarioId['max'])) {
				$this->addUsingAlias(PgPeer::USUARIO_ID, $usuarioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PgPeer::USUARIO_ID, $usuarioId, $comparison);
	}

	/**
	 * Filter the query on the igreja_responsavel_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIgrejaResponsavelId(1234); // WHERE igreja_responsavel_id = 1234
	 * $query->filterByIgrejaResponsavelId(array(12, 34)); // WHERE igreja_responsavel_id IN (12, 34)
	 * $query->filterByIgrejaResponsavelId(array('min' => 12)); // WHERE igreja_responsavel_id > 12
	 * </code>
	 *
	 * @see       filterByIgreja()
	 *
	 * @param     mixed $igrejaResponsavelId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PgQuery The current query, for fluid interface
	 */
	public function filterByIgrejaResponsavelId($igrejaResponsavelId = null, $comparison = null)
	{
		if (is_array($igrejaResponsavelId)) {
			$useMinMax = false;
			if (isset($igrejaResponsavelId['min'])) {
				$this->addUsingAlias(PgPeer::IGREJA_RESPONSAVEL_ID, $igrejaResponsavelId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($igrejaResponsavelId['max'])) {
				$this->addUsingAlias(PgPeer::IGREJA_RESPONSAVEL_ID, $igrejaResponsavelId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PgPeer::IGREJA_RESPONSAVEL_ID, $igrejaResponsavelId, $comparison);
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
	 * @return    PgQuery The current query, for fluid interface
	 */
	public function filterByEnderecoId($enderecoId = null, $comparison = null)
	{
		if (is_array($enderecoId)) {
			$useMinMax = false;
			if (isset($enderecoId['min'])) {
				$this->addUsingAlias(PgPeer::ENDERECO_ID, $enderecoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($enderecoId['max'])) {
				$this->addUsingAlias(PgPeer::ENDERECO_ID, $enderecoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PgPeer::ENDERECO_ID, $enderecoId, $comparison);
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
	 * @return    PgQuery The current query, for fluid interface
	 */
	public function filterByInstituicaoId($instituicaoId = null, $comparison = null)
	{
		if (is_array($instituicaoId)) {
			$useMinMax = false;
			if (isset($instituicaoId['min'])) {
				$this->addUsingAlias(PgPeer::INSTITUICAO_ID, $instituicaoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($instituicaoId['max'])) {
				$this->addUsingAlias(PgPeer::INSTITUICAO_ID, $instituicaoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PgPeer::INSTITUICAO_ID, $instituicaoId, $comparison);
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
	 * @return    PgQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PgPeer::TITULO, $titulo, $comparison);
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
	 * @return    PgQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PgPeer::HORA, $hora, $comparison);
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
	 * @return    PgQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PgPeer::DESCRICAO, $descricao, $comparison);
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
	 * @return    PgQuery The current query, for fluid interface
	 */
	public function filterByDataCadastro($dataCadastro = null, $comparison = null)
	{
		if (is_array($dataCadastro)) {
			$useMinMax = false;
			if (isset($dataCadastro['min'])) {
				$this->addUsingAlias(PgPeer::DATA_CADASTRO, $dataCadastro['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataCadastro['max'])) {
				$this->addUsingAlias(PgPeer::DATA_CADASTRO, $dataCadastro['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PgPeer::DATA_CADASTRO, $dataCadastro, $comparison);
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
	 * @return    PgQuery The current query, for fluid interface
	 */
	public function filterByAtiva($ativa = null, $comparison = null)
	{
		if (is_string($ativa)) {
			$ativa = in_array(strtolower($ativa), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(PgPeer::ATIVA, $ativa, $comparison);
	}

	/**
	 * Filter the query by a related Endereco object
	 *
	 * @param     Endereco|PropelCollection $endereco The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PgQuery The current query, for fluid interface
	 */
	public function filterByEndereco($endereco, $comparison = null)
	{
		if ($endereco instanceof Endereco) {
			return $this
				->addUsingAlias(PgPeer::ENDERECO_ID, $endereco->getId(), $comparison);
		} elseif ($endereco instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PgPeer::ENDERECO_ID, $endereco->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    PgQuery The current query, for fluid interface
	 */
	public function joinEndereco($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useEnderecoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinEndereco($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Endereco', 'EnderecoQuery');
	}

	/**
	 * Filter the query by a related Igreja object
	 *
	 * @param     Igreja|PropelCollection $igreja The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PgQuery The current query, for fluid interface
	 */
	public function filterByIgreja($igreja, $comparison = null)
	{
		if ($igreja instanceof Igreja) {
			return $this
				->addUsingAlias(PgPeer::IGREJA_RESPONSAVEL_ID, $igreja->getId(), $comparison);
		} elseif ($igreja instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PgPeer::IGREJA_RESPONSAVEL_ID, $igreja->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByIgreja() only accepts arguments of type Igreja or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Igreja relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PgQuery The current query, for fluid interface
	 */
	public function joinIgreja($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Igreja');

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
			$this->addJoinObject($join, 'Igreja');
		}

		return $this;
	}

	/**
	 * Use the Igreja relation Igreja object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery A secondary query class using the current class as primary query
	 */
	public function useIgrejaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinIgreja($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Igreja', 'IgrejaQuery');
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PgQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(PgPeer::USUARIO_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PgPeer::USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    PgQuery The current query, for fluid interface
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
	 * Filter the query by a related PgUsuario object
	 *
	 * @param     PgUsuario $pgUsuario  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PgQuery The current query, for fluid interface
	 */
	public function filterByPgUsuario($pgUsuario, $comparison = null)
	{
		if ($pgUsuario instanceof PgUsuario) {
			return $this
				->addUsingAlias(PgPeer::ID, $pgUsuario->getPgId(), $comparison);
		} elseif ($pgUsuario instanceof PropelCollection) {
			return $this
				->usePgUsuarioQuery()
				->filterByPrimaryKeys($pgUsuario->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByPgUsuario() only accepts arguments of type PgUsuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the PgUsuario relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PgQuery The current query, for fluid interface
	 */
	public function joinPgUsuario($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PgUsuario');

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
			$this->addJoinObject($join, 'PgUsuario');
		}

		return $this;
	}

	/**
	 * Use the PgUsuario relation PgUsuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PgUsuarioQuery A secondary query class using the current class as primary query
	 */
	public function usePgUsuarioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPgUsuario($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PgUsuario', 'PgUsuarioQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Pg $pg Object to remove from the list of results
	 *
	 * @return    PgQuery The current query, for fluid interface
	 */
	public function prune($pg = null)
	{
		if ($pg) {
			$this->addUsingAlias(PgPeer::ID, $pg->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BasePgQuery