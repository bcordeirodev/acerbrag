<?php


/**
 * Base class that represents a query for the 'pedido_oracao' table.
 *
 * 
 *
 * @method     PedidoOracaoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PedidoOracaoQuery orderBySolicitanteId($order = Criteria::ASC) Order by the solicitante_id column
 * @method     PedidoOracaoQuery orderByAtendenteId($order = Criteria::ASC) Order by the atendente_id column
 * @method     PedidoOracaoQuery orderByInstituicaoId($order = Criteria::ASC) Order by the instituicao_id column
 * @method     PedidoOracaoQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 * @method     PedidoOracaoQuery orderByDataPedido($order = Criteria::ASC) Order by the data_pedido column
 * @method     PedidoOracaoQuery orderByAtendida($order = Criteria::ASC) Order by the atendida column
 * @method     PedidoOracaoQuery orderByDataAtendimento($order = Criteria::ASC) Order by the data_atendimento column
 * @method     PedidoOracaoQuery orderByDescricaoAtendimento($order = Criteria::ASC) Order by the descricao_atendimento column
 *
 * @method     PedidoOracaoQuery groupById() Group by the id column
 * @method     PedidoOracaoQuery groupBySolicitanteId() Group by the solicitante_id column
 * @method     PedidoOracaoQuery groupByAtendenteId() Group by the atendente_id column
 * @method     PedidoOracaoQuery groupByInstituicaoId() Group by the instituicao_id column
 * @method     PedidoOracaoQuery groupByDescricao() Group by the descricao column
 * @method     PedidoOracaoQuery groupByDataPedido() Group by the data_pedido column
 * @method     PedidoOracaoQuery groupByAtendida() Group by the atendida column
 * @method     PedidoOracaoQuery groupByDataAtendimento() Group by the data_atendimento column
 * @method     PedidoOracaoQuery groupByDescricaoAtendimento() Group by the descricao_atendimento column
 *
 * @method     PedidoOracaoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PedidoOracaoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PedidoOracaoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PedidoOracaoQuery leftJoinUsuarioRelatedBySolicitanteId($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioRelatedBySolicitanteId relation
 * @method     PedidoOracaoQuery rightJoinUsuarioRelatedBySolicitanteId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioRelatedBySolicitanteId relation
 * @method     PedidoOracaoQuery innerJoinUsuarioRelatedBySolicitanteId($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioRelatedBySolicitanteId relation
 *
 * @method     PedidoOracaoQuery leftJoinUsuarioRelatedByAtendenteId($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioRelatedByAtendenteId relation
 * @method     PedidoOracaoQuery rightJoinUsuarioRelatedByAtendenteId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioRelatedByAtendenteId relation
 * @method     PedidoOracaoQuery innerJoinUsuarioRelatedByAtendenteId($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioRelatedByAtendenteId relation
 *
 * @method     PedidoOracaoQuery leftJoinIgreja($relationAlias = null) Adds a LEFT JOIN clause to the query using the Igreja relation
 * @method     PedidoOracaoQuery rightJoinIgreja($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Igreja relation
 * @method     PedidoOracaoQuery innerJoinIgreja($relationAlias = null) Adds a INNER JOIN clause to the query using the Igreja relation
 *
 * @method     PedidoOracao findOne(PropelPDO $con = null) Return the first PedidoOracao matching the query
 * @method     PedidoOracao findOneOrCreate(PropelPDO $con = null) Return the first PedidoOracao matching the query, or a new PedidoOracao object populated from the query conditions when no match is found
 *
 * @method     PedidoOracao findOneById(int $id) Return the first PedidoOracao filtered by the id column
 * @method     PedidoOracao findOneBySolicitanteId(int $solicitante_id) Return the first PedidoOracao filtered by the solicitante_id column
 * @method     PedidoOracao findOneByAtendenteId(int $atendente_id) Return the first PedidoOracao filtered by the atendente_id column
 * @method     PedidoOracao findOneByInstituicaoId(int $instituicao_id) Return the first PedidoOracao filtered by the instituicao_id column
 * @method     PedidoOracao findOneByDescricao(string $descricao) Return the first PedidoOracao filtered by the descricao column
 * @method     PedidoOracao findOneByDataPedido(string $data_pedido) Return the first PedidoOracao filtered by the data_pedido column
 * @method     PedidoOracao findOneByAtendida(boolean $atendida) Return the first PedidoOracao filtered by the atendida column
 * @method     PedidoOracao findOneByDataAtendimento(string $data_atendimento) Return the first PedidoOracao filtered by the data_atendimento column
 * @method     PedidoOracao findOneByDescricaoAtendimento(string $descricao_atendimento) Return the first PedidoOracao filtered by the descricao_atendimento column
 *
 * @method     array findById(int $id) Return PedidoOracao objects filtered by the id column
 * @method     array findBySolicitanteId(int $solicitante_id) Return PedidoOracao objects filtered by the solicitante_id column
 * @method     array findByAtendenteId(int $atendente_id) Return PedidoOracao objects filtered by the atendente_id column
 * @method     array findByInstituicaoId(int $instituicao_id) Return PedidoOracao objects filtered by the instituicao_id column
 * @method     array findByDescricao(string $descricao) Return PedidoOracao objects filtered by the descricao column
 * @method     array findByDataPedido(string $data_pedido) Return PedidoOracao objects filtered by the data_pedido column
 * @method     array findByAtendida(boolean $atendida) Return PedidoOracao objects filtered by the atendida column
 * @method     array findByDataAtendimento(string $data_atendimento) Return PedidoOracao objects filtered by the data_atendimento column
 * @method     array findByDescricaoAtendimento(string $descricao_atendimento) Return PedidoOracao objects filtered by the descricao_atendimento column
 *
 * @package    propel.generator.Default.om
 */
abstract class BasePedidoOracaoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BasePedidoOracaoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'PedidoOracao', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PedidoOracaoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PedidoOracaoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PedidoOracaoQuery) {
			return $criteria;
		}
		$query = new PedidoOracaoQuery();
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
	 * @return    PedidoOracao|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = PedidoOracaoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(PedidoOracaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    PedidoOracao A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `SOLICITANTE_ID`, `ATENDENTE_ID`, `INSTITUICAO_ID`, `DESCRICAO`, `DATA_PEDIDO`, `ATENDIDA`, `DATA_ATENDIMENTO`, `DESCRICAO_ATENDIMENTO` FROM `pedido_oracao` WHERE `ID` = :p0';
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
			$obj = new PedidoOracao();
			$obj->hydrate($row);
			PedidoOracaoPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    PedidoOracao|array|mixed the result, formatted by the current formatter
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
	 * @return    PedidoOracaoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PedidoOracaoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PedidoOracaoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PedidoOracaoPeer::ID, $keys, Criteria::IN);
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
	 * @return    PedidoOracaoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PedidoOracaoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the solicitante_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySolicitanteId(1234); // WHERE solicitante_id = 1234
	 * $query->filterBySolicitanteId(array(12, 34)); // WHERE solicitante_id IN (12, 34)
	 * $query->filterBySolicitanteId(array('min' => 12)); // WHERE solicitante_id > 12
	 * </code>
	 *
	 * @see       filterByUsuarioRelatedBySolicitanteId()
	 *
	 * @param     mixed $solicitanteId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PedidoOracaoQuery The current query, for fluid interface
	 */
	public function filterBySolicitanteId($solicitanteId = null, $comparison = null)
	{
		if (is_array($solicitanteId)) {
			$useMinMax = false;
			if (isset($solicitanteId['min'])) {
				$this->addUsingAlias(PedidoOracaoPeer::SOLICITANTE_ID, $solicitanteId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($solicitanteId['max'])) {
				$this->addUsingAlias(PedidoOracaoPeer::SOLICITANTE_ID, $solicitanteId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PedidoOracaoPeer::SOLICITANTE_ID, $solicitanteId, $comparison);
	}

	/**
	 * Filter the query on the atendente_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAtendenteId(1234); // WHERE atendente_id = 1234
	 * $query->filterByAtendenteId(array(12, 34)); // WHERE atendente_id IN (12, 34)
	 * $query->filterByAtendenteId(array('min' => 12)); // WHERE atendente_id > 12
	 * </code>
	 *
	 * @see       filterByUsuarioRelatedByAtendenteId()
	 *
	 * @param     mixed $atendenteId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PedidoOracaoQuery The current query, for fluid interface
	 */
	public function filterByAtendenteId($atendenteId = null, $comparison = null)
	{
		if (is_array($atendenteId)) {
			$useMinMax = false;
			if (isset($atendenteId['min'])) {
				$this->addUsingAlias(PedidoOracaoPeer::ATENDENTE_ID, $atendenteId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($atendenteId['max'])) {
				$this->addUsingAlias(PedidoOracaoPeer::ATENDENTE_ID, $atendenteId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PedidoOracaoPeer::ATENDENTE_ID, $atendenteId, $comparison);
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
	 * @see       filterByIgreja()
	 *
	 * @param     mixed $instituicaoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PedidoOracaoQuery The current query, for fluid interface
	 */
	public function filterByInstituicaoId($instituicaoId = null, $comparison = null)
	{
		if (is_array($instituicaoId)) {
			$useMinMax = false;
			if (isset($instituicaoId['min'])) {
				$this->addUsingAlias(PedidoOracaoPeer::INSTITUICAO_ID, $instituicaoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($instituicaoId['max'])) {
				$this->addUsingAlias(PedidoOracaoPeer::INSTITUICAO_ID, $instituicaoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PedidoOracaoPeer::INSTITUICAO_ID, $instituicaoId, $comparison);
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
	 * @return    PedidoOracaoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PedidoOracaoPeer::DESCRICAO, $descricao, $comparison);
	}

	/**
	 * Filter the query on the data_pedido column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataPedido('2011-03-14'); // WHERE data_pedido = '2011-03-14'
	 * $query->filterByDataPedido('now'); // WHERE data_pedido = '2011-03-14'
	 * $query->filterByDataPedido(array('max' => 'yesterday')); // WHERE data_pedido > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataPedido The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PedidoOracaoQuery The current query, for fluid interface
	 */
	public function filterByDataPedido($dataPedido = null, $comparison = null)
	{
		if (is_array($dataPedido)) {
			$useMinMax = false;
			if (isset($dataPedido['min'])) {
				$this->addUsingAlias(PedidoOracaoPeer::DATA_PEDIDO, $dataPedido['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataPedido['max'])) {
				$this->addUsingAlias(PedidoOracaoPeer::DATA_PEDIDO, $dataPedido['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PedidoOracaoPeer::DATA_PEDIDO, $dataPedido, $comparison);
	}

	/**
	 * Filter the query on the atendida column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAtendida(true); // WHERE atendida = true
	 * $query->filterByAtendida('yes'); // WHERE atendida = true
	 * </code>
	 *
	 * @param     boolean|string $atendida The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PedidoOracaoQuery The current query, for fluid interface
	 */
	public function filterByAtendida($atendida = null, $comparison = null)
	{
		if (is_string($atendida)) {
			$atendida = in_array(strtolower($atendida), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(PedidoOracaoPeer::ATENDIDA, $atendida, $comparison);
	}

	/**
	 * Filter the query on the data_atendimento column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataAtendimento('2011-03-14'); // WHERE data_atendimento = '2011-03-14'
	 * $query->filterByDataAtendimento('now'); // WHERE data_atendimento = '2011-03-14'
	 * $query->filterByDataAtendimento(array('max' => 'yesterday')); // WHERE data_atendimento > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataAtendimento The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PedidoOracaoQuery The current query, for fluid interface
	 */
	public function filterByDataAtendimento($dataAtendimento = null, $comparison = null)
	{
		if (is_array($dataAtendimento)) {
			$useMinMax = false;
			if (isset($dataAtendimento['min'])) {
				$this->addUsingAlias(PedidoOracaoPeer::DATA_ATENDIMENTO, $dataAtendimento['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataAtendimento['max'])) {
				$this->addUsingAlias(PedidoOracaoPeer::DATA_ATENDIMENTO, $dataAtendimento['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PedidoOracaoPeer::DATA_ATENDIMENTO, $dataAtendimento, $comparison);
	}

	/**
	 * Filter the query on the descricao_atendimento column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDescricaoAtendimento('fooValue');   // WHERE descricao_atendimento = 'fooValue'
	 * $query->filterByDescricaoAtendimento('%fooValue%'); // WHERE descricao_atendimento LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $descricaoAtendimento The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PedidoOracaoQuery The current query, for fluid interface
	 */
	public function filterByDescricaoAtendimento($descricaoAtendimento = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($descricaoAtendimento)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $descricaoAtendimento)) {
				$descricaoAtendimento = str_replace('*', '%', $descricaoAtendimento);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PedidoOracaoPeer::DESCRICAO_ATENDIMENTO, $descricaoAtendimento, $comparison);
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PedidoOracaoQuery The current query, for fluid interface
	 */
	public function filterByUsuarioRelatedBySolicitanteId($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(PedidoOracaoPeer::SOLICITANTE_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PedidoOracaoPeer::SOLICITANTE_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUsuarioRelatedBySolicitanteId() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UsuarioRelatedBySolicitanteId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PedidoOracaoQuery The current query, for fluid interface
	 */
	public function joinUsuarioRelatedBySolicitanteId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UsuarioRelatedBySolicitanteId');

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
			$this->addJoinObject($join, 'UsuarioRelatedBySolicitanteId');
		}

		return $this;
	}

	/**
	 * Use the UsuarioRelatedBySolicitanteId relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioRelatedBySolicitanteIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUsuarioRelatedBySolicitanteId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UsuarioRelatedBySolicitanteId', 'UsuarioQuery');
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PedidoOracaoQuery The current query, for fluid interface
	 */
	public function filterByUsuarioRelatedByAtendenteId($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(PedidoOracaoPeer::ATENDENTE_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PedidoOracaoPeer::ATENDENTE_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUsuarioRelatedByAtendenteId() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UsuarioRelatedByAtendenteId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PedidoOracaoQuery The current query, for fluid interface
	 */
	public function joinUsuarioRelatedByAtendenteId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UsuarioRelatedByAtendenteId');

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
			$this->addJoinObject($join, 'UsuarioRelatedByAtendenteId');
		}

		return $this;
	}

	/**
	 * Use the UsuarioRelatedByAtendenteId relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioRelatedByAtendenteIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUsuarioRelatedByAtendenteId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UsuarioRelatedByAtendenteId', 'UsuarioQuery');
	}

	/**
	 * Filter the query by a related Igreja object
	 *
	 * @param     Igreja|PropelCollection $igreja The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PedidoOracaoQuery The current query, for fluid interface
	 */
	public function filterByIgreja($igreja, $comparison = null)
	{
		if ($igreja instanceof Igreja) {
			return $this
				->addUsingAlias(PedidoOracaoPeer::INSTITUICAO_ID, $igreja->getId(), $comparison);
		} elseif ($igreja instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PedidoOracaoPeer::INSTITUICAO_ID, $igreja->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    PedidoOracaoQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     PedidoOracao $pedidoOracao Object to remove from the list of results
	 *
	 * @return    PedidoOracaoQuery The current query, for fluid interface
	 */
	public function prune($pedidoOracao = null)
	{
		if ($pedidoOracao) {
			$this->addUsingAlias(PedidoOracaoPeer::ID, $pedidoOracao->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BasePedidoOracaoQuery