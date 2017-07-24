<?php


/**
 * Base class that represents a query for the 'contrato' table.
 *
 * 
 *
 * @method     ContratoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ContratoQuery orderByClienteId($order = Criteria::ASC) Order by the cliente_id column
 * @method     ContratoQuery orderByAdvogadoId($order = Criteria::ASC) Order by the advogado_id column
 * @method     ContratoQuery orderByAreaAdvocaciaId($order = Criteria::ASC) Order by the area_advocacia_id column
 * @method     ContratoQuery orderByTitulo($order = Criteria::ASC) Order by the titulo column
 * @method     ContratoQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 * @method     ContratoQuery orderByDataInicio($order = Criteria::ASC) Order by the data_inicio column
 * @method     ContratoQuery orderByDataFim($order = Criteria::ASC) Order by the data_fim column
 *
 * @method     ContratoQuery groupById() Group by the id column
 * @method     ContratoQuery groupByClienteId() Group by the cliente_id column
 * @method     ContratoQuery groupByAdvogadoId() Group by the advogado_id column
 * @method     ContratoQuery groupByAreaAdvocaciaId() Group by the area_advocacia_id column
 * @method     ContratoQuery groupByTitulo() Group by the titulo column
 * @method     ContratoQuery groupByDescricao() Group by the descricao column
 * @method     ContratoQuery groupByDataInicio() Group by the data_inicio column
 * @method     ContratoQuery groupByDataFim() Group by the data_fim column
 *
 * @method     ContratoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ContratoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ContratoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ContratoQuery leftJoinAdvogado($relationAlias = null) Adds a LEFT JOIN clause to the query using the Advogado relation
 * @method     ContratoQuery rightJoinAdvogado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Advogado relation
 * @method     ContratoQuery innerJoinAdvogado($relationAlias = null) Adds a INNER JOIN clause to the query using the Advogado relation
 *
 * @method     ContratoQuery leftJoinAreaAdvocacia($relationAlias = null) Adds a LEFT JOIN clause to the query using the AreaAdvocacia relation
 * @method     ContratoQuery rightJoinAreaAdvocacia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AreaAdvocacia relation
 * @method     ContratoQuery innerJoinAreaAdvocacia($relationAlias = null) Adds a INNER JOIN clause to the query using the AreaAdvocacia relation
 *
 * @method     ContratoQuery leftJoinCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cliente relation
 * @method     ContratoQuery rightJoinCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cliente relation
 * @method     ContratoQuery innerJoinCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the Cliente relation
 *
 * @method     ContratoQuery leftJoinCaso($relationAlias = null) Adds a LEFT JOIN clause to the query using the Caso relation
 * @method     ContratoQuery rightJoinCaso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Caso relation
 * @method     ContratoQuery innerJoinCaso($relationAlias = null) Adds a INNER JOIN clause to the query using the Caso relation
 *
 * @method     ContratoQuery leftJoinProcesso($relationAlias = null) Adds a LEFT JOIN clause to the query using the Processo relation
 * @method     ContratoQuery rightJoinProcesso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Processo relation
 * @method     ContratoQuery innerJoinProcesso($relationAlias = null) Adds a INNER JOIN clause to the query using the Processo relation
 *
 * @method     Contrato findOne(PropelPDO $con = null) Return the first Contrato matching the query
 * @method     Contrato findOneOrCreate(PropelPDO $con = null) Return the first Contrato matching the query, or a new Contrato object populated from the query conditions when no match is found
 *
 * @method     Contrato findOneById(int $id) Return the first Contrato filtered by the id column
 * @method     Contrato findOneByClienteId(int $cliente_id) Return the first Contrato filtered by the cliente_id column
 * @method     Contrato findOneByAdvogadoId(int $advogado_id) Return the first Contrato filtered by the advogado_id column
 * @method     Contrato findOneByAreaAdvocaciaId(int $area_advocacia_id) Return the first Contrato filtered by the area_advocacia_id column
 * @method     Contrato findOneByTitulo(string $titulo) Return the first Contrato filtered by the titulo column
 * @method     Contrato findOneByDescricao(string $descricao) Return the first Contrato filtered by the descricao column
 * @method     Contrato findOneByDataInicio(string $data_inicio) Return the first Contrato filtered by the data_inicio column
 * @method     Contrato findOneByDataFim(string $data_fim) Return the first Contrato filtered by the data_fim column
 *
 * @method     array findById(int $id) Return Contrato objects filtered by the id column
 * @method     array findByClienteId(int $cliente_id) Return Contrato objects filtered by the cliente_id column
 * @method     array findByAdvogadoId(int $advogado_id) Return Contrato objects filtered by the advogado_id column
 * @method     array findByAreaAdvocaciaId(int $area_advocacia_id) Return Contrato objects filtered by the area_advocacia_id column
 * @method     array findByTitulo(string $titulo) Return Contrato objects filtered by the titulo column
 * @method     array findByDescricao(string $descricao) Return Contrato objects filtered by the descricao column
 * @method     array findByDataInicio(string $data_inicio) Return Contrato objects filtered by the data_inicio column
 * @method     array findByDataFim(string $data_fim) Return Contrato objects filtered by the data_fim column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseContratoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseContratoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Contrato', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ContratoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ContratoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ContratoQuery) {
			return $criteria;
		}
		$query = new ContratoQuery();
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
	 * @return    Contrato|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ContratoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ContratoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Contrato A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `CLIENTE_ID`, `ADVOGADO_ID`, `AREA_ADVOCACIA_ID`, `TITULO`, `DESCRICAO`, `DATA_INICIO`, `DATA_FIM` FROM `contrato` WHERE `ID` = :p0';
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
			$obj = new Contrato();
			$obj->hydrate($row);
			ContratoPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Contrato|array|mixed the result, formatted by the current formatter
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
	 * @return    ContratoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ContratoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ContratoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ContratoPeer::ID, $keys, Criteria::IN);
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
	 * @return    ContratoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ContratoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the cliente_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByClienteId(1234); // WHERE cliente_id = 1234
	 * $query->filterByClienteId(array(12, 34)); // WHERE cliente_id IN (12, 34)
	 * $query->filterByClienteId(array('min' => 12)); // WHERE cliente_id > 12
	 * </code>
	 *
	 * @see       filterByCliente()
	 *
	 * @param     mixed $clienteId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ContratoQuery The current query, for fluid interface
	 */
	public function filterByClienteId($clienteId = null, $comparison = null)
	{
		if (is_array($clienteId)) {
			$useMinMax = false;
			if (isset($clienteId['min'])) {
				$this->addUsingAlias(ContratoPeer::CLIENTE_ID, $clienteId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($clienteId['max'])) {
				$this->addUsingAlias(ContratoPeer::CLIENTE_ID, $clienteId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ContratoPeer::CLIENTE_ID, $clienteId, $comparison);
	}

	/**
	 * Filter the query on the advogado_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAdvogadoId(1234); // WHERE advogado_id = 1234
	 * $query->filterByAdvogadoId(array(12, 34)); // WHERE advogado_id IN (12, 34)
	 * $query->filterByAdvogadoId(array('min' => 12)); // WHERE advogado_id > 12
	 * </code>
	 *
	 * @see       filterByAdvogado()
	 *
	 * @param     mixed $advogadoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ContratoQuery The current query, for fluid interface
	 */
	public function filterByAdvogadoId($advogadoId = null, $comparison = null)
	{
		if (is_array($advogadoId)) {
			$useMinMax = false;
			if (isset($advogadoId['min'])) {
				$this->addUsingAlias(ContratoPeer::ADVOGADO_ID, $advogadoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($advogadoId['max'])) {
				$this->addUsingAlias(ContratoPeer::ADVOGADO_ID, $advogadoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ContratoPeer::ADVOGADO_ID, $advogadoId, $comparison);
	}

	/**
	 * Filter the query on the area_advocacia_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAreaAdvocaciaId(1234); // WHERE area_advocacia_id = 1234
	 * $query->filterByAreaAdvocaciaId(array(12, 34)); // WHERE area_advocacia_id IN (12, 34)
	 * $query->filterByAreaAdvocaciaId(array('min' => 12)); // WHERE area_advocacia_id > 12
	 * </code>
	 *
	 * @see       filterByAreaAdvocacia()
	 *
	 * @param     mixed $areaAdvocaciaId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ContratoQuery The current query, for fluid interface
	 */
	public function filterByAreaAdvocaciaId($areaAdvocaciaId = null, $comparison = null)
	{
		if (is_array($areaAdvocaciaId)) {
			$useMinMax = false;
			if (isset($areaAdvocaciaId['min'])) {
				$this->addUsingAlias(ContratoPeer::AREA_ADVOCACIA_ID, $areaAdvocaciaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($areaAdvocaciaId['max'])) {
				$this->addUsingAlias(ContratoPeer::AREA_ADVOCACIA_ID, $areaAdvocaciaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ContratoPeer::AREA_ADVOCACIA_ID, $areaAdvocaciaId, $comparison);
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
	 * @return    ContratoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ContratoPeer::TITULO, $titulo, $comparison);
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
	 * @return    ContratoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ContratoPeer::DESCRICAO, $descricao, $comparison);
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
	 * @return    ContratoQuery The current query, for fluid interface
	 */
	public function filterByDataInicio($dataInicio = null, $comparison = null)
	{
		if (is_array($dataInicio)) {
			$useMinMax = false;
			if (isset($dataInicio['min'])) {
				$this->addUsingAlias(ContratoPeer::DATA_INICIO, $dataInicio['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataInicio['max'])) {
				$this->addUsingAlias(ContratoPeer::DATA_INICIO, $dataInicio['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ContratoPeer::DATA_INICIO, $dataInicio, $comparison);
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
	 * @return    ContratoQuery The current query, for fluid interface
	 */
	public function filterByDataFim($dataFim = null, $comparison = null)
	{
		if (is_array($dataFim)) {
			$useMinMax = false;
			if (isset($dataFim['min'])) {
				$this->addUsingAlias(ContratoPeer::DATA_FIM, $dataFim['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataFim['max'])) {
				$this->addUsingAlias(ContratoPeer::DATA_FIM, $dataFim['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ContratoPeer::DATA_FIM, $dataFim, $comparison);
	}

	/**
	 * Filter the query by a related Advogado object
	 *
	 * @param     Advogado|PropelCollection $advogado The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ContratoQuery The current query, for fluid interface
	 */
	public function filterByAdvogado($advogado, $comparison = null)
	{
		if ($advogado instanceof Advogado) {
			return $this
				->addUsingAlias(ContratoPeer::ADVOGADO_ID, $advogado->getId(), $comparison);
		} elseif ($advogado instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ContratoPeer::ADVOGADO_ID, $advogado->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByAdvogado() only accepts arguments of type Advogado or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Advogado relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ContratoQuery The current query, for fluid interface
	 */
	public function joinAdvogado($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Advogado');

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
			$this->addJoinObject($join, 'Advogado');
		}

		return $this;
	}

	/**
	 * Use the Advogado relation Advogado object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdvogadoQuery A secondary query class using the current class as primary query
	 */
	public function useAdvogadoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAdvogado($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Advogado', 'AdvogadoQuery');
	}

	/**
	 * Filter the query by a related AreaAdvocacia object
	 *
	 * @param     AreaAdvocacia|PropelCollection $areaAdvocacia The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ContratoQuery The current query, for fluid interface
	 */
	public function filterByAreaAdvocacia($areaAdvocacia, $comparison = null)
	{
		if ($areaAdvocacia instanceof AreaAdvocacia) {
			return $this
				->addUsingAlias(ContratoPeer::AREA_ADVOCACIA_ID, $areaAdvocacia->getId(), $comparison);
		} elseif ($areaAdvocacia instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ContratoPeer::AREA_ADVOCACIA_ID, $areaAdvocacia->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByAreaAdvocacia() only accepts arguments of type AreaAdvocacia or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AreaAdvocacia relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ContratoQuery The current query, for fluid interface
	 */
	public function joinAreaAdvocacia($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AreaAdvocacia');

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
			$this->addJoinObject($join, 'AreaAdvocacia');
		}

		return $this;
	}

	/**
	 * Use the AreaAdvocacia relation AreaAdvocacia object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AreaAdvocaciaQuery A secondary query class using the current class as primary query
	 */
	public function useAreaAdvocaciaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAreaAdvocacia($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AreaAdvocacia', 'AreaAdvocaciaQuery');
	}

	/**
	 * Filter the query by a related Cliente object
	 *
	 * @param     Cliente|PropelCollection $cliente The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ContratoQuery The current query, for fluid interface
	 */
	public function filterByCliente($cliente, $comparison = null)
	{
		if ($cliente instanceof Cliente) {
			return $this
				->addUsingAlias(ContratoPeer::CLIENTE_ID, $cliente->getId(), $comparison);
		} elseif ($cliente instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ContratoPeer::CLIENTE_ID, $cliente->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByCliente() only accepts arguments of type Cliente or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Cliente relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ContratoQuery The current query, for fluid interface
	 */
	public function joinCliente($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Cliente');

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
			$this->addJoinObject($join, 'Cliente');
		}

		return $this;
	}

	/**
	 * Use the Cliente relation Cliente object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClienteQuery A secondary query class using the current class as primary query
	 */
	public function useClienteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCliente($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Cliente', 'ClienteQuery');
	}

	/**
	 * Filter the query by a related Caso object
	 *
	 * @param     Caso $caso  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ContratoQuery The current query, for fluid interface
	 */
	public function filterByCaso($caso, $comparison = null)
	{
		if ($caso instanceof Caso) {
			return $this
				->addUsingAlias(ContratoPeer::ID, $caso->getContratoId(), $comparison);
		} elseif ($caso instanceof PropelCollection) {
			return $this
				->useCasoQuery()
				->filterByPrimaryKeys($caso->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByCaso() only accepts arguments of type Caso or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Caso relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ContratoQuery The current query, for fluid interface
	 */
	public function joinCaso($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Caso');

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
			$this->addJoinObject($join, 'Caso');
		}

		return $this;
	}

	/**
	 * Use the Caso relation Caso object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CasoQuery A secondary query class using the current class as primary query
	 */
	public function useCasoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCaso($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Caso', 'CasoQuery');
	}

	/**
	 * Filter the query by a related Processo object
	 *
	 * @param     Processo $processo  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ContratoQuery The current query, for fluid interface
	 */
	public function filterByProcesso($processo, $comparison = null)
	{
		if ($processo instanceof Processo) {
			return $this
				->addUsingAlias(ContratoPeer::ID, $processo->getContratoId(), $comparison);
		} elseif ($processo instanceof PropelCollection) {
			return $this
				->useProcessoQuery()
				->filterByPrimaryKeys($processo->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByProcesso() only accepts arguments of type Processo or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Processo relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ContratoQuery The current query, for fluid interface
	 */
	public function joinProcesso($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Processo');

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
			$this->addJoinObject($join, 'Processo');
		}

		return $this;
	}

	/**
	 * Use the Processo relation Processo object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ProcessoQuery A secondary query class using the current class as primary query
	 */
	public function useProcessoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinProcesso($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Processo', 'ProcessoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Contrato $contrato Object to remove from the list of results
	 *
	 * @return    ContratoQuery The current query, for fluid interface
	 */
	public function prune($contrato = null)
	{
		if ($contrato) {
			$this->addUsingAlias(ContratoPeer::ID, $contrato->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseContratoQuery