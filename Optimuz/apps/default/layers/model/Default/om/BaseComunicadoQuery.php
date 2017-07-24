<?php


/**
 * Base class that represents a query for the 'comunicado' table.
 *
 * 
 *
 * @method     ComunicadoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ComunicadoQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method     ComunicadoQuery orderBySeguradoId($order = Criteria::ASC) Order by the segurado_id column
 * @method     ComunicadoQuery orderByComunicanteId($order = Criteria::ASC) Order by the comunicante_id column
 * @method     ComunicadoQuery orderByParentescoId($order = Criteria::ASC) Order by the parentesco_id column
 * @method     ComunicadoQuery orderByDataAbertura($order = Criteria::ASC) Order by the data_abertura column
 * @method     ComunicadoQuery orderByDataFechamento($order = Criteria::ASC) Order by the data_fechamento column
 * @method     ComunicadoQuery orderByESegurado($order = Criteria::ASC) Order by the e_segurado column
 * @method     ComunicadoQuery orderBySinistro($order = Criteria::ASC) Order by the sinistro column
 * @method     ComunicadoQuery orderByContrato($order = Criteria::ASC) Order by the contrato column
 * @method     ComunicadoQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 * @method     ComunicadoQuery orderByAberto($order = Criteria::ASC) Order by the aberto column
 * @method     ComunicadoQuery orderByProtocoloAse($order = Criteria::ASC) Order by the protocolo_ase column
 *
 * @method     ComunicadoQuery groupById() Group by the id column
 * @method     ComunicadoQuery groupByUsuarioId() Group by the usuario_id column
 * @method     ComunicadoQuery groupBySeguradoId() Group by the segurado_id column
 * @method     ComunicadoQuery groupByComunicanteId() Group by the comunicante_id column
 * @method     ComunicadoQuery groupByParentescoId() Group by the parentesco_id column
 * @method     ComunicadoQuery groupByDataAbertura() Group by the data_abertura column
 * @method     ComunicadoQuery groupByDataFechamento() Group by the data_fechamento column
 * @method     ComunicadoQuery groupByESegurado() Group by the e_segurado column
 * @method     ComunicadoQuery groupBySinistro() Group by the sinistro column
 * @method     ComunicadoQuery groupByContrato() Group by the contrato column
 * @method     ComunicadoQuery groupByDescricao() Group by the descricao column
 * @method     ComunicadoQuery groupByAberto() Group by the aberto column
 * @method     ComunicadoQuery groupByProtocoloAse() Group by the protocolo_ase column
 *
 * @method     ComunicadoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ComunicadoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ComunicadoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ComunicadoQuery leftJoinParentesco($relationAlias = null) Adds a LEFT JOIN clause to the query using the Parentesco relation
 * @method     ComunicadoQuery rightJoinParentesco($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Parentesco relation
 * @method     ComunicadoQuery innerJoinParentesco($relationAlias = null) Adds a INNER JOIN clause to the query using the Parentesco relation
 *
 * @method     ComunicadoQuery leftJoinPessoaRelatedBySeguradoId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PessoaRelatedBySeguradoId relation
 * @method     ComunicadoQuery rightJoinPessoaRelatedBySeguradoId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PessoaRelatedBySeguradoId relation
 * @method     ComunicadoQuery innerJoinPessoaRelatedBySeguradoId($relationAlias = null) Adds a INNER JOIN clause to the query using the PessoaRelatedBySeguradoId relation
 *
 * @method     ComunicadoQuery leftJoinPessoaRelatedByComunicanteId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PessoaRelatedByComunicanteId relation
 * @method     ComunicadoQuery rightJoinPessoaRelatedByComunicanteId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PessoaRelatedByComunicanteId relation
 * @method     ComunicadoQuery innerJoinPessoaRelatedByComunicanteId($relationAlias = null) Adds a INNER JOIN clause to the query using the PessoaRelatedByComunicanteId relation
 *
 * @method     ComunicadoQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     ComunicadoQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     ComunicadoQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     ComunicadoQuery leftJoinContato($relationAlias = null) Adds a LEFT JOIN clause to the query using the Contato relation
 * @method     ComunicadoQuery rightJoinContato($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Contato relation
 * @method     ComunicadoQuery innerJoinContato($relationAlias = null) Adds a INNER JOIN clause to the query using the Contato relation
 *
 * @method     Comunicado findOne(PropelPDO $con = null) Return the first Comunicado matching the query
 * @method     Comunicado findOneOrCreate(PropelPDO $con = null) Return the first Comunicado matching the query, or a new Comunicado object populated from the query conditions when no match is found
 *
 * @method     Comunicado findOneById(int $id) Return the first Comunicado filtered by the id column
 * @method     Comunicado findOneByUsuarioId(int $usuario_id) Return the first Comunicado filtered by the usuario_id column
 * @method     Comunicado findOneBySeguradoId(int $segurado_id) Return the first Comunicado filtered by the segurado_id column
 * @method     Comunicado findOneByComunicanteId(int $comunicante_id) Return the first Comunicado filtered by the comunicante_id column
 * @method     Comunicado findOneByParentescoId(int $parentesco_id) Return the first Comunicado filtered by the parentesco_id column
 * @method     Comunicado findOneByDataAbertura(string $data_abertura) Return the first Comunicado filtered by the data_abertura column
 * @method     Comunicado findOneByDataFechamento(string $data_fechamento) Return the first Comunicado filtered by the data_fechamento column
 * @method     Comunicado findOneByESegurado(boolean $e_segurado) Return the first Comunicado filtered by the e_segurado column
 * @method     Comunicado findOneBySinistro(string $sinistro) Return the first Comunicado filtered by the sinistro column
 * @method     Comunicado findOneByContrato(string $contrato) Return the first Comunicado filtered by the contrato column
 * @method     Comunicado findOneByDescricao(string $descricao) Return the first Comunicado filtered by the descricao column
 * @method     Comunicado findOneByAberto(boolean $aberto) Return the first Comunicado filtered by the aberto column
 * @method     Comunicado findOneByProtocoloAse(string $protocolo_ase) Return the first Comunicado filtered by the protocolo_ase column
 *
 * @method     array findById(int $id) Return Comunicado objects filtered by the id column
 * @method     array findByUsuarioId(int $usuario_id) Return Comunicado objects filtered by the usuario_id column
 * @method     array findBySeguradoId(int $segurado_id) Return Comunicado objects filtered by the segurado_id column
 * @method     array findByComunicanteId(int $comunicante_id) Return Comunicado objects filtered by the comunicante_id column
 * @method     array findByParentescoId(int $parentesco_id) Return Comunicado objects filtered by the parentesco_id column
 * @method     array findByDataAbertura(string $data_abertura) Return Comunicado objects filtered by the data_abertura column
 * @method     array findByDataFechamento(string $data_fechamento) Return Comunicado objects filtered by the data_fechamento column
 * @method     array findByESegurado(boolean $e_segurado) Return Comunicado objects filtered by the e_segurado column
 * @method     array findBySinistro(string $sinistro) Return Comunicado objects filtered by the sinistro column
 * @method     array findByContrato(string $contrato) Return Comunicado objects filtered by the contrato column
 * @method     array findByDescricao(string $descricao) Return Comunicado objects filtered by the descricao column
 * @method     array findByAberto(boolean $aberto) Return Comunicado objects filtered by the aberto column
 * @method     array findByProtocoloAse(string $protocolo_ase) Return Comunicado objects filtered by the protocolo_ase column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseComunicadoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseComunicadoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Comunicado', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ComunicadoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ComunicadoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ComunicadoQuery) {
			return $criteria;
		}
		$query = new ComunicadoQuery();
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
	 * @return    Comunicado|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ComunicadoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ComunicadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Comunicado A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `USUARIO_ID`, `SEGURADO_ID`, `COMUNICANTE_ID`, `PARENTESCO_ID`, `DATA_ABERTURA`, `DATA_FECHAMENTO`, `E_SEGURADO`, `SINISTRO`, `CONTRATO`, `DESCRICAO`, `ABERTO`, `PROTOCOLO_ASE` FROM `comunicado` WHERE `ID` = :p0';
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
			$obj = new Comunicado();
			$obj->hydrate($row);
			ComunicadoPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Comunicado|array|mixed the result, formatted by the current formatter
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
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ComunicadoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ComunicadoPeer::ID, $keys, Criteria::IN);
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
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ComunicadoPeer::ID, $id, $comparison);
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
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function filterByUsuarioId($usuarioId = null, $comparison = null)
	{
		if (is_array($usuarioId)) {
			$useMinMax = false;
			if (isset($usuarioId['min'])) {
				$this->addUsingAlias(ComunicadoPeer::USUARIO_ID, $usuarioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($usuarioId['max'])) {
				$this->addUsingAlias(ComunicadoPeer::USUARIO_ID, $usuarioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ComunicadoPeer::USUARIO_ID, $usuarioId, $comparison);
	}

	/**
	 * Filter the query on the segurado_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySeguradoId(1234); // WHERE segurado_id = 1234
	 * $query->filterBySeguradoId(array(12, 34)); // WHERE segurado_id IN (12, 34)
	 * $query->filterBySeguradoId(array('min' => 12)); // WHERE segurado_id > 12
	 * </code>
	 *
	 * @see       filterByPessoaRelatedBySeguradoId()
	 *
	 * @param     mixed $seguradoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function filterBySeguradoId($seguradoId = null, $comparison = null)
	{
		if (is_array($seguradoId)) {
			$useMinMax = false;
			if (isset($seguradoId['min'])) {
				$this->addUsingAlias(ComunicadoPeer::SEGURADO_ID, $seguradoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($seguradoId['max'])) {
				$this->addUsingAlias(ComunicadoPeer::SEGURADO_ID, $seguradoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ComunicadoPeer::SEGURADO_ID, $seguradoId, $comparison);
	}

	/**
	 * Filter the query on the comunicante_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByComunicanteId(1234); // WHERE comunicante_id = 1234
	 * $query->filterByComunicanteId(array(12, 34)); // WHERE comunicante_id IN (12, 34)
	 * $query->filterByComunicanteId(array('min' => 12)); // WHERE comunicante_id > 12
	 * </code>
	 *
	 * @see       filterByPessoaRelatedByComunicanteId()
	 *
	 * @param     mixed $comunicanteId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function filterByComunicanteId($comunicanteId = null, $comparison = null)
	{
		if (is_array($comunicanteId)) {
			$useMinMax = false;
			if (isset($comunicanteId['min'])) {
				$this->addUsingAlias(ComunicadoPeer::COMUNICANTE_ID, $comunicanteId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($comunicanteId['max'])) {
				$this->addUsingAlias(ComunicadoPeer::COMUNICANTE_ID, $comunicanteId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ComunicadoPeer::COMUNICANTE_ID, $comunicanteId, $comparison);
	}

	/**
	 * Filter the query on the parentesco_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByParentescoId(1234); // WHERE parentesco_id = 1234
	 * $query->filterByParentescoId(array(12, 34)); // WHERE parentesco_id IN (12, 34)
	 * $query->filterByParentescoId(array('min' => 12)); // WHERE parentesco_id > 12
	 * </code>
	 *
	 * @see       filterByParentesco()
	 *
	 * @param     mixed $parentescoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function filterByParentescoId($parentescoId = null, $comparison = null)
	{
		if (is_array($parentescoId)) {
			$useMinMax = false;
			if (isset($parentescoId['min'])) {
				$this->addUsingAlias(ComunicadoPeer::PARENTESCO_ID, $parentescoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($parentescoId['max'])) {
				$this->addUsingAlias(ComunicadoPeer::PARENTESCO_ID, $parentescoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ComunicadoPeer::PARENTESCO_ID, $parentescoId, $comparison);
	}

	/**
	 * Filter the query on the data_abertura column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataAbertura('2011-03-14'); // WHERE data_abertura = '2011-03-14'
	 * $query->filterByDataAbertura('now'); // WHERE data_abertura = '2011-03-14'
	 * $query->filterByDataAbertura(array('max' => 'yesterday')); // WHERE data_abertura > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataAbertura The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function filterByDataAbertura($dataAbertura = null, $comparison = null)
	{
		if (is_array($dataAbertura)) {
			$useMinMax = false;
			if (isset($dataAbertura['min'])) {
				$this->addUsingAlias(ComunicadoPeer::DATA_ABERTURA, $dataAbertura['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataAbertura['max'])) {
				$this->addUsingAlias(ComunicadoPeer::DATA_ABERTURA, $dataAbertura['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ComunicadoPeer::DATA_ABERTURA, $dataAbertura, $comparison);
	}

	/**
	 * Filter the query on the data_fechamento column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataFechamento('2011-03-14'); // WHERE data_fechamento = '2011-03-14'
	 * $query->filterByDataFechamento('now'); // WHERE data_fechamento = '2011-03-14'
	 * $query->filterByDataFechamento(array('max' => 'yesterday')); // WHERE data_fechamento > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataFechamento The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function filterByDataFechamento($dataFechamento = null, $comparison = null)
	{
		if (is_array($dataFechamento)) {
			$useMinMax = false;
			if (isset($dataFechamento['min'])) {
				$this->addUsingAlias(ComunicadoPeer::DATA_FECHAMENTO, $dataFechamento['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataFechamento['max'])) {
				$this->addUsingAlias(ComunicadoPeer::DATA_FECHAMENTO, $dataFechamento['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ComunicadoPeer::DATA_FECHAMENTO, $dataFechamento, $comparison);
	}

	/**
	 * Filter the query on the e_segurado column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByESegurado(true); // WHERE e_segurado = true
	 * $query->filterByESegurado('yes'); // WHERE e_segurado = true
	 * </code>
	 *
	 * @param     boolean|string $eSegurado The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function filterByESegurado($eSegurado = null, $comparison = null)
	{
		if (is_string($eSegurado)) {
			$e_segurado = in_array(strtolower($eSegurado), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ComunicadoPeer::E_SEGURADO, $eSegurado, $comparison);
	}

	/**
	 * Filter the query on the sinistro column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySinistro('fooValue');   // WHERE sinistro = 'fooValue'
	 * $query->filterBySinistro('%fooValue%'); // WHERE sinistro LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $sinistro The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function filterBySinistro($sinistro = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($sinistro)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $sinistro)) {
				$sinistro = str_replace('*', '%', $sinistro);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ComunicadoPeer::SINISTRO, $sinistro, $comparison);
	}

	/**
	 * Filter the query on the contrato column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByContrato('fooValue');   // WHERE contrato = 'fooValue'
	 * $query->filterByContrato('%fooValue%'); // WHERE contrato LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $contrato The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function filterByContrato($contrato = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($contrato)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $contrato)) {
				$contrato = str_replace('*', '%', $contrato);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ComunicadoPeer::CONTRATO, $contrato, $comparison);
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
	 * @return    ComunicadoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ComunicadoPeer::DESCRICAO, $descricao, $comparison);
	}

	/**
	 * Filter the query on the aberto column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAberto(true); // WHERE aberto = true
	 * $query->filterByAberto('yes'); // WHERE aberto = true
	 * </code>
	 *
	 * @param     boolean|string $aberto The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function filterByAberto($aberto = null, $comparison = null)
	{
		if (is_string($aberto)) {
			$aberto = in_array(strtolower($aberto), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ComunicadoPeer::ABERTO, $aberto, $comparison);
	}

	/**
	 * Filter the query on the protocolo_ase column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByProtocoloAse('fooValue');   // WHERE protocolo_ase = 'fooValue'
	 * $query->filterByProtocoloAse('%fooValue%'); // WHERE protocolo_ase LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $protocoloAse The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function filterByProtocoloAse($protocoloAse = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($protocoloAse)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $protocoloAse)) {
				$protocoloAse = str_replace('*', '%', $protocoloAse);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ComunicadoPeer::PROTOCOLO_ASE, $protocoloAse, $comparison);
	}

	/**
	 * Filter the query by a related Parentesco object
	 *
	 * @param     Parentesco|PropelCollection $parentesco The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function filterByParentesco($parentesco, $comparison = null)
	{
		if ($parentesco instanceof Parentesco) {
			return $this
				->addUsingAlias(ComunicadoPeer::PARENTESCO_ID, $parentesco->getId(), $comparison);
		} elseif ($parentesco instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ComunicadoPeer::PARENTESCO_ID, $parentesco->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByParentesco() only accepts arguments of type Parentesco or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Parentesco relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function joinParentesco($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Parentesco');

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
			$this->addJoinObject($join, 'Parentesco');
		}

		return $this;
	}

	/**
	 * Use the Parentesco relation Parentesco object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ParentescoQuery A secondary query class using the current class as primary query
	 */
	public function useParentescoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinParentesco($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Parentesco', 'ParentescoQuery');
	}

	/**
	 * Filter the query by a related Pessoa object
	 *
	 * @param     Pessoa|PropelCollection $pessoa The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function filterByPessoaRelatedBySeguradoId($pessoa, $comparison = null)
	{
		if ($pessoa instanceof Pessoa) {
			return $this
				->addUsingAlias(ComunicadoPeer::SEGURADO_ID, $pessoa->getId(), $comparison);
		} elseif ($pessoa instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ComunicadoPeer::SEGURADO_ID, $pessoa->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByPessoaRelatedBySeguradoId() only accepts arguments of type Pessoa or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the PessoaRelatedBySeguradoId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function joinPessoaRelatedBySeguradoId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PessoaRelatedBySeguradoId');

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
			$this->addJoinObject($join, 'PessoaRelatedBySeguradoId');
		}

		return $this;
	}

	/**
	 * Use the PessoaRelatedBySeguradoId relation Pessoa object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PessoaQuery A secondary query class using the current class as primary query
	 */
	public function usePessoaRelatedBySeguradoIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPessoaRelatedBySeguradoId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PessoaRelatedBySeguradoId', 'PessoaQuery');
	}

	/**
	 * Filter the query by a related Pessoa object
	 *
	 * @param     Pessoa|PropelCollection $pessoa The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function filterByPessoaRelatedByComunicanteId($pessoa, $comparison = null)
	{
		if ($pessoa instanceof Pessoa) {
			return $this
				->addUsingAlias(ComunicadoPeer::COMUNICANTE_ID, $pessoa->getId(), $comparison);
		} elseif ($pessoa instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ComunicadoPeer::COMUNICANTE_ID, $pessoa->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByPessoaRelatedByComunicanteId() only accepts arguments of type Pessoa or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the PessoaRelatedByComunicanteId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function joinPessoaRelatedByComunicanteId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PessoaRelatedByComunicanteId');

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
			$this->addJoinObject($join, 'PessoaRelatedByComunicanteId');
		}

		return $this;
	}

	/**
	 * Use the PessoaRelatedByComunicanteId relation Pessoa object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PessoaQuery A secondary query class using the current class as primary query
	 */
	public function usePessoaRelatedByComunicanteIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPessoaRelatedByComunicanteId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PessoaRelatedByComunicanteId', 'PessoaQuery');
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(ComunicadoPeer::USUARIO_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ComunicadoPeer::USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    ComunicadoQuery The current query, for fluid interface
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
	 * Filter the query by a related Contato object
	 *
	 * @param     Contato $contato  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function filterByContato($contato, $comparison = null)
	{
		if ($contato instanceof Contato) {
			return $this
				->addUsingAlias(ComunicadoPeer::ID, $contato->getComunicadoId(), $comparison);
		} elseif ($contato instanceof PropelCollection) {
			return $this
				->useContatoQuery()
				->filterByPrimaryKeys($contato->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByContato() only accepts arguments of type Contato or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Contato relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function joinContato($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Contato');

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
			$this->addJoinObject($join, 'Contato');
		}

		return $this;
	}

	/**
	 * Use the Contato relation Contato object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ContatoQuery A secondary query class using the current class as primary query
	 */
	public function useContatoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinContato($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Contato', 'ContatoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Comunicado $comunicado Object to remove from the list of results
	 *
	 * @return    ComunicadoQuery The current query, for fluid interface
	 */
	public function prune($comunicado = null)
	{
		if ($comunicado) {
			$this->addUsingAlias(ComunicadoPeer::ID, $comunicado->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseComunicadoQuery