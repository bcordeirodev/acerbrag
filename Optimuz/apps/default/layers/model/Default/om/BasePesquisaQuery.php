<?php


/**
 * Base class that represents a query for the 'pesquisa' table.
 *
 * 
 *
 * @method     PesquisaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PesquisaQuery orderByCriadorId($order = Criteria::ASC) Order by the criador_id column
 * @method     PesquisaQuery orderByTitulo($order = Criteria::ASC) Order by the titulo column
 * @method     PesquisaQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 * @method     PesquisaQuery orderByDataCriacao($order = Criteria::ASC) Order by the data_criacao column
 * @method     PesquisaQuery orderByDataInicio($order = Criteria::ASC) Order by the data_inicio column
 * @method     PesquisaQuery orderByDataFim($order = Criteria::ASC) Order by the data_fim column
 * @method     PesquisaQuery orderByAtivo($order = Criteria::ASC) Order by the ativo column
 * @method     PesquisaQuery orderByPublicada($order = Criteria::ASC) Order by the publicada column
 * @method     PesquisaQuery orderByTipoPesquisa($order = Criteria::ASC) Order by the tipo_pesquisa column
 * @method     PesquisaQuery orderByAnonima($order = Criteria::ASC) Order by the anonima column
 * @method     PesquisaQuery orderByIdadeInicial($order = Criteria::ASC) Order by the idade_inicial column
 * @method     PesquisaQuery orderByIdadeFinal($order = Criteria::ASC) Order by the idade_final column
 * @method     PesquisaQuery orderByGenero($order = Criteria::ASC) Order by the genero column
 * @method     PesquisaQuery orderByQuantidadePontos($order = Criteria::ASC) Order by the quantidade_pontos column
 *
 * @method     PesquisaQuery groupById() Group by the id column
 * @method     PesquisaQuery groupByCriadorId() Group by the criador_id column
 * @method     PesquisaQuery groupByTitulo() Group by the titulo column
 * @method     PesquisaQuery groupByDescricao() Group by the descricao column
 * @method     PesquisaQuery groupByDataCriacao() Group by the data_criacao column
 * @method     PesquisaQuery groupByDataInicio() Group by the data_inicio column
 * @method     PesquisaQuery groupByDataFim() Group by the data_fim column
 * @method     PesquisaQuery groupByAtivo() Group by the ativo column
 * @method     PesquisaQuery groupByPublicada() Group by the publicada column
 * @method     PesquisaQuery groupByTipoPesquisa() Group by the tipo_pesquisa column
 * @method     PesquisaQuery groupByAnonima() Group by the anonima column
 * @method     PesquisaQuery groupByIdadeInicial() Group by the idade_inicial column
 * @method     PesquisaQuery groupByIdadeFinal() Group by the idade_final column
 * @method     PesquisaQuery groupByGenero() Group by the genero column
 * @method     PesquisaQuery groupByQuantidadePontos() Group by the quantidade_pontos column
 *
 * @method     PesquisaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PesquisaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PesquisaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PesquisaQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     PesquisaQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     PesquisaQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     PesquisaQuery leftJoinCargoPesquisa($relationAlias = null) Adds a LEFT JOIN clause to the query using the CargoPesquisa relation
 * @method     PesquisaQuery rightJoinCargoPesquisa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CargoPesquisa relation
 * @method     PesquisaQuery innerJoinCargoPesquisa($relationAlias = null) Adds a INNER JOIN clause to the query using the CargoPesquisa relation
 *
 * @method     PesquisaQuery leftJoinColetaPesquisa($relationAlias = null) Adds a LEFT JOIN clause to the query using the ColetaPesquisa relation
 * @method     PesquisaQuery rightJoinColetaPesquisa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ColetaPesquisa relation
 * @method     PesquisaQuery innerJoinColetaPesquisa($relationAlias = null) Adds a INNER JOIN clause to the query using the ColetaPesquisa relation
 *
 * @method     PesquisaQuery leftJoinDepartamentoPesquisa($relationAlias = null) Adds a LEFT JOIN clause to the query using the DepartamentoPesquisa relation
 * @method     PesquisaQuery rightJoinDepartamentoPesquisa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DepartamentoPesquisa relation
 * @method     PesquisaQuery innerJoinDepartamentoPesquisa($relationAlias = null) Adds a INNER JOIN clause to the query using the DepartamentoPesquisa relation
 *
 * @method     PesquisaQuery leftJoinPergunta($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pergunta relation
 * @method     PesquisaQuery rightJoinPergunta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pergunta relation
 * @method     PesquisaQuery innerJoinPergunta($relationAlias = null) Adds a INNER JOIN clause to the query using the Pergunta relation
 *
 * @method     PesquisaQuery leftJoinPesquisaHabilitada($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesquisaHabilitada relation
 * @method     PesquisaQuery rightJoinPesquisaHabilitada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesquisaHabilitada relation
 * @method     PesquisaQuery innerJoinPesquisaHabilitada($relationAlias = null) Adds a INNER JOIN clause to the query using the PesquisaHabilitada relation
 *
 * @method     Pesquisa findOne(PropelPDO $con = null) Return the first Pesquisa matching the query
 * @method     Pesquisa findOneOrCreate(PropelPDO $con = null) Return the first Pesquisa matching the query, or a new Pesquisa object populated from the query conditions when no match is found
 *
 * @method     Pesquisa findOneById(int $id) Return the first Pesquisa filtered by the id column
 * @method     Pesquisa findOneByCriadorId(int $criador_id) Return the first Pesquisa filtered by the criador_id column
 * @method     Pesquisa findOneByTitulo(string $titulo) Return the first Pesquisa filtered by the titulo column
 * @method     Pesquisa findOneByDescricao(string $descricao) Return the first Pesquisa filtered by the descricao column
 * @method     Pesquisa findOneByDataCriacao(string $data_criacao) Return the first Pesquisa filtered by the data_criacao column
 * @method     Pesquisa findOneByDataInicio(string $data_inicio) Return the first Pesquisa filtered by the data_inicio column
 * @method     Pesquisa findOneByDataFim(string $data_fim) Return the first Pesquisa filtered by the data_fim column
 * @method     Pesquisa findOneByAtivo(boolean $ativo) Return the first Pesquisa filtered by the ativo column
 * @method     Pesquisa findOneByPublicada(boolean $publicada) Return the first Pesquisa filtered by the publicada column
 * @method     Pesquisa findOneByTipoPesquisa(string $tipo_pesquisa) Return the first Pesquisa filtered by the tipo_pesquisa column
 * @method     Pesquisa findOneByAnonima(boolean $anonima) Return the first Pesquisa filtered by the anonima column
 * @method     Pesquisa findOneByIdadeInicial(int $idade_inicial) Return the first Pesquisa filtered by the idade_inicial column
 * @method     Pesquisa findOneByIdadeFinal(int $idade_final) Return the first Pesquisa filtered by the idade_final column
 * @method     Pesquisa findOneByGenero(string $genero) Return the first Pesquisa filtered by the genero column
 * @method     Pesquisa findOneByQuantidadePontos(int $quantidade_pontos) Return the first Pesquisa filtered by the quantidade_pontos column
 *
 * @method     array findById(int $id) Return Pesquisa objects filtered by the id column
 * @method     array findByCriadorId(int $criador_id) Return Pesquisa objects filtered by the criador_id column
 * @method     array findByTitulo(string $titulo) Return Pesquisa objects filtered by the titulo column
 * @method     array findByDescricao(string $descricao) Return Pesquisa objects filtered by the descricao column
 * @method     array findByDataCriacao(string $data_criacao) Return Pesquisa objects filtered by the data_criacao column
 * @method     array findByDataInicio(string $data_inicio) Return Pesquisa objects filtered by the data_inicio column
 * @method     array findByDataFim(string $data_fim) Return Pesquisa objects filtered by the data_fim column
 * @method     array findByAtivo(boolean $ativo) Return Pesquisa objects filtered by the ativo column
 * @method     array findByPublicada(boolean $publicada) Return Pesquisa objects filtered by the publicada column
 * @method     array findByTipoPesquisa(string $tipo_pesquisa) Return Pesquisa objects filtered by the tipo_pesquisa column
 * @method     array findByAnonima(boolean $anonima) Return Pesquisa objects filtered by the anonima column
 * @method     array findByIdadeInicial(int $idade_inicial) Return Pesquisa objects filtered by the idade_inicial column
 * @method     array findByIdadeFinal(int $idade_final) Return Pesquisa objects filtered by the idade_final column
 * @method     array findByGenero(string $genero) Return Pesquisa objects filtered by the genero column
 * @method     array findByQuantidadePontos(int $quantidade_pontos) Return Pesquisa objects filtered by the quantidade_pontos column
 *
 * @package    propel.generator.Default.om
 */
abstract class BasePesquisaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BasePesquisaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Pesquisa', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PesquisaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PesquisaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PesquisaQuery) {
			return $criteria;
		}
		$query = new PesquisaQuery();
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
	 * @return    Pesquisa|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = PesquisaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(PesquisaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Pesquisa A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `CRIADOR_ID`, `TITULO`, `DESCRICAO`, `DATA_CRIACAO`, `DATA_INICIO`, `DATA_FIM`, `ATIVO`, `PUBLICADA`, `TIPO_PESQUISA`, `ANONIMA`, `IDADE_INICIAL`, `IDADE_FINAL`, `GENERO`, `QUANTIDADE_PONTOS` FROM `pesquisa` WHERE `ID` = :p0';
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
			$obj = new Pesquisa();
			$obj->hydrate($row);
			PesquisaPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Pesquisa|array|mixed the result, formatted by the current formatter
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
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PesquisaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PesquisaPeer::ID, $keys, Criteria::IN);
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
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PesquisaPeer::ID, $id, $comparison);
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
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterByCriadorId($criadorId = null, $comparison = null)
	{
		if (is_array($criadorId)) {
			$useMinMax = false;
			if (isset($criadorId['min'])) {
				$this->addUsingAlias(PesquisaPeer::CRIADOR_ID, $criadorId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($criadorId['max'])) {
				$this->addUsingAlias(PesquisaPeer::CRIADOR_ID, $criadorId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PesquisaPeer::CRIADOR_ID, $criadorId, $comparison);
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
	 * @return    PesquisaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PesquisaPeer::TITULO, $titulo, $comparison);
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
	 * @return    PesquisaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PesquisaPeer::DESCRICAO, $descricao, $comparison);
	}

	/**
	 * Filter the query on the data_criacao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataCriacao('2011-03-14'); // WHERE data_criacao = '2011-03-14'
	 * $query->filterByDataCriacao('now'); // WHERE data_criacao = '2011-03-14'
	 * $query->filterByDataCriacao(array('max' => 'yesterday')); // WHERE data_criacao > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataCriacao The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterByDataCriacao($dataCriacao = null, $comparison = null)
	{
		if (is_array($dataCriacao)) {
			$useMinMax = false;
			if (isset($dataCriacao['min'])) {
				$this->addUsingAlias(PesquisaPeer::DATA_CRIACAO, $dataCriacao['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataCriacao['max'])) {
				$this->addUsingAlias(PesquisaPeer::DATA_CRIACAO, $dataCriacao['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PesquisaPeer::DATA_CRIACAO, $dataCriacao, $comparison);
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
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterByDataInicio($dataInicio = null, $comparison = null)
	{
		if (is_array($dataInicio)) {
			$useMinMax = false;
			if (isset($dataInicio['min'])) {
				$this->addUsingAlias(PesquisaPeer::DATA_INICIO, $dataInicio['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataInicio['max'])) {
				$this->addUsingAlias(PesquisaPeer::DATA_INICIO, $dataInicio['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PesquisaPeer::DATA_INICIO, $dataInicio, $comparison);
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
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterByDataFim($dataFim = null, $comparison = null)
	{
		if (is_array($dataFim)) {
			$useMinMax = false;
			if (isset($dataFim['min'])) {
				$this->addUsingAlias(PesquisaPeer::DATA_FIM, $dataFim['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataFim['max'])) {
				$this->addUsingAlias(PesquisaPeer::DATA_FIM, $dataFim['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PesquisaPeer::DATA_FIM, $dataFim, $comparison);
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
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterByAtivo($ativo = null, $comparison = null)
	{
		if (is_string($ativo)) {
			$ativo = in_array(strtolower($ativo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(PesquisaPeer::ATIVO, $ativo, $comparison);
	}

	/**
	 * Filter the query on the publicada column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPublicada(true); // WHERE publicada = true
	 * $query->filterByPublicada('yes'); // WHERE publicada = true
	 * </code>
	 *
	 * @param     boolean|string $publicada The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterByPublicada($publicada = null, $comparison = null)
	{
		if (is_string($publicada)) {
			$publicada = in_array(strtolower($publicada), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(PesquisaPeer::PUBLICADA, $publicada, $comparison);
	}

	/**
	 * Filter the query on the tipo_pesquisa column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTipoPesquisa('fooValue');   // WHERE tipo_pesquisa = 'fooValue'
	 * $query->filterByTipoPesquisa('%fooValue%'); // WHERE tipo_pesquisa LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $tipoPesquisa The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterByTipoPesquisa($tipoPesquisa = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($tipoPesquisa)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $tipoPesquisa)) {
				$tipoPesquisa = str_replace('*', '%', $tipoPesquisa);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PesquisaPeer::TIPO_PESQUISA, $tipoPesquisa, $comparison);
	}

	/**
	 * Filter the query on the anonima column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAnonima(true); // WHERE anonima = true
	 * $query->filterByAnonima('yes'); // WHERE anonima = true
	 * </code>
	 *
	 * @param     boolean|string $anonima The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterByAnonima($anonima = null, $comparison = null)
	{
		if (is_string($anonima)) {
			$anonima = in_array(strtolower($anonima), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(PesquisaPeer::ANONIMA, $anonima, $comparison);
	}

	/**
	 * Filter the query on the idade_inicial column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdadeInicial(1234); // WHERE idade_inicial = 1234
	 * $query->filterByIdadeInicial(array(12, 34)); // WHERE idade_inicial IN (12, 34)
	 * $query->filterByIdadeInicial(array('min' => 12)); // WHERE idade_inicial > 12
	 * </code>
	 *
	 * @param     mixed $idadeInicial The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterByIdadeInicial($idadeInicial = null, $comparison = null)
	{
		if (is_array($idadeInicial)) {
			$useMinMax = false;
			if (isset($idadeInicial['min'])) {
				$this->addUsingAlias(PesquisaPeer::IDADE_INICIAL, $idadeInicial['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idadeInicial['max'])) {
				$this->addUsingAlias(PesquisaPeer::IDADE_INICIAL, $idadeInicial['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PesquisaPeer::IDADE_INICIAL, $idadeInicial, $comparison);
	}

	/**
	 * Filter the query on the idade_final column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdadeFinal(1234); // WHERE idade_final = 1234
	 * $query->filterByIdadeFinal(array(12, 34)); // WHERE idade_final IN (12, 34)
	 * $query->filterByIdadeFinal(array('min' => 12)); // WHERE idade_final > 12
	 * </code>
	 *
	 * @param     mixed $idadeFinal The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterByIdadeFinal($idadeFinal = null, $comparison = null)
	{
		if (is_array($idadeFinal)) {
			$useMinMax = false;
			if (isset($idadeFinal['min'])) {
				$this->addUsingAlias(PesquisaPeer::IDADE_FINAL, $idadeFinal['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idadeFinal['max'])) {
				$this->addUsingAlias(PesquisaPeer::IDADE_FINAL, $idadeFinal['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PesquisaPeer::IDADE_FINAL, $idadeFinal, $comparison);
	}

	/**
	 * Filter the query on the genero column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByGenero('fooValue');   // WHERE genero = 'fooValue'
	 * $query->filterByGenero('%fooValue%'); // WHERE genero LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $genero The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterByGenero($genero = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($genero)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $genero)) {
				$genero = str_replace('*', '%', $genero);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PesquisaPeer::GENERO, $genero, $comparison);
	}

	/**
	 * Filter the query on the quantidade_pontos column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByQuantidadePontos(1234); // WHERE quantidade_pontos = 1234
	 * $query->filterByQuantidadePontos(array(12, 34)); // WHERE quantidade_pontos IN (12, 34)
	 * $query->filterByQuantidadePontos(array('min' => 12)); // WHERE quantidade_pontos > 12
	 * </code>
	 *
	 * @param     mixed $quantidadePontos The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterByQuantidadePontos($quantidadePontos = null, $comparison = null)
	{
		if (is_array($quantidadePontos)) {
			$useMinMax = false;
			if (isset($quantidadePontos['min'])) {
				$this->addUsingAlias(PesquisaPeer::QUANTIDADE_PONTOS, $quantidadePontos['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($quantidadePontos['max'])) {
				$this->addUsingAlias(PesquisaPeer::QUANTIDADE_PONTOS, $quantidadePontos['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PesquisaPeer::QUANTIDADE_PONTOS, $quantidadePontos, $comparison);
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(PesquisaPeer::CRIADOR_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PesquisaPeer::CRIADOR_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    PesquisaQuery The current query, for fluid interface
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
	 * Filter the query by a related CargoPesquisa object
	 *
	 * @param     CargoPesquisa $cargoPesquisa  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterByCargoPesquisa($cargoPesquisa, $comparison = null)
	{
		if ($cargoPesquisa instanceof CargoPesquisa) {
			return $this
				->addUsingAlias(PesquisaPeer::ID, $cargoPesquisa->getPesquisaId(), $comparison);
		} elseif ($cargoPesquisa instanceof PropelCollection) {
			return $this
				->useCargoPesquisaQuery()
				->filterByPrimaryKeys($cargoPesquisa->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByCargoPesquisa() only accepts arguments of type CargoPesquisa or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the CargoPesquisa relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function joinCargoPesquisa($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('CargoPesquisa');

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
			$this->addJoinObject($join, 'CargoPesquisa');
		}

		return $this;
	}

	/**
	 * Use the CargoPesquisa relation CargoPesquisa object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CargoPesquisaQuery A secondary query class using the current class as primary query
	 */
	public function useCargoPesquisaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCargoPesquisa($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'CargoPesquisa', 'CargoPesquisaQuery');
	}

	/**
	 * Filter the query by a related ColetaPesquisa object
	 *
	 * @param     ColetaPesquisa $coletaPesquisa  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterByColetaPesquisa($coletaPesquisa, $comparison = null)
	{
		if ($coletaPesquisa instanceof ColetaPesquisa) {
			return $this
				->addUsingAlias(PesquisaPeer::ID, $coletaPesquisa->getPesquisaId(), $comparison);
		} elseif ($coletaPesquisa instanceof PropelCollection) {
			return $this
				->useColetaPesquisaQuery()
				->filterByPrimaryKeys($coletaPesquisa->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByColetaPesquisa() only accepts arguments of type ColetaPesquisa or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ColetaPesquisa relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function joinColetaPesquisa($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ColetaPesquisa');

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
			$this->addJoinObject($join, 'ColetaPesquisa');
		}

		return $this;
	}

	/**
	 * Use the ColetaPesquisa relation ColetaPesquisa object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ColetaPesquisaQuery A secondary query class using the current class as primary query
	 */
	public function useColetaPesquisaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinColetaPesquisa($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ColetaPesquisa', 'ColetaPesquisaQuery');
	}

	/**
	 * Filter the query by a related DepartamentoPesquisa object
	 *
	 * @param     DepartamentoPesquisa $departamentoPesquisa  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterByDepartamentoPesquisa($departamentoPesquisa, $comparison = null)
	{
		if ($departamentoPesquisa instanceof DepartamentoPesquisa) {
			return $this
				->addUsingAlias(PesquisaPeer::ID, $departamentoPesquisa->getPesquisaId(), $comparison);
		} elseif ($departamentoPesquisa instanceof PropelCollection) {
			return $this
				->useDepartamentoPesquisaQuery()
				->filterByPrimaryKeys($departamentoPesquisa->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByDepartamentoPesquisa() only accepts arguments of type DepartamentoPesquisa or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the DepartamentoPesquisa relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function joinDepartamentoPesquisa($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('DepartamentoPesquisa');

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
			$this->addJoinObject($join, 'DepartamentoPesquisa');
		}

		return $this;
	}

	/**
	 * Use the DepartamentoPesquisa relation DepartamentoPesquisa object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DepartamentoPesquisaQuery A secondary query class using the current class as primary query
	 */
	public function useDepartamentoPesquisaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinDepartamentoPesquisa($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'DepartamentoPesquisa', 'DepartamentoPesquisaQuery');
	}

	/**
	 * Filter the query by a related Pergunta object
	 *
	 * @param     Pergunta $pergunta  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterByPergunta($pergunta, $comparison = null)
	{
		if ($pergunta instanceof Pergunta) {
			return $this
				->addUsingAlias(PesquisaPeer::ID, $pergunta->getPesquisaId(), $comparison);
		} elseif ($pergunta instanceof PropelCollection) {
			return $this
				->usePerguntaQuery()
				->filterByPrimaryKeys($pergunta->getPrimaryKeys())
				->endUse();
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
	 * @return    PesquisaQuery The current query, for fluid interface
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
	 * Filter the query by a related PesquisaHabilitada object
	 *
	 * @param     PesquisaHabilitada $pesquisaHabilitada  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterByPesquisaHabilitada($pesquisaHabilitada, $comparison = null)
	{
		if ($pesquisaHabilitada instanceof PesquisaHabilitada) {
			return $this
				->addUsingAlias(PesquisaPeer::ID, $pesquisaHabilitada->getPesquisaId(), $comparison);
		} elseif ($pesquisaHabilitada instanceof PropelCollection) {
			return $this
				->usePesquisaHabilitadaQuery()
				->filterByPrimaryKeys($pesquisaHabilitada->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByPesquisaHabilitada() only accepts arguments of type PesquisaHabilitada or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the PesquisaHabilitada relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function joinPesquisaHabilitada($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PesquisaHabilitada');

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
			$this->addJoinObject($join, 'PesquisaHabilitada');
		}

		return $this;
	}

	/**
	 * Use the PesquisaHabilitada relation PesquisaHabilitada object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PesquisaHabilitadaQuery A secondary query class using the current class as primary query
	 */
	public function usePesquisaHabilitadaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPesquisaHabilitada($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PesquisaHabilitada', 'PesquisaHabilitadaQuery');
	}

	/**
	 * Filter the query by a related Cargo object
	 * using the cargo_pesquisa table as cross reference
	 *
	 * @param     Cargo $cargo the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterByCargo($cargo, $comparison = Criteria::EQUAL)
	{
		return $this
			->useCargoPesquisaQuery()
			->filterByCargo($cargo, $comparison)
			->endUse();
	}

	/**
	 * Filter the query by a related Departamento object
	 * using the departamento_pesquisa table as cross reference
	 *
	 * @param     Departamento $departamento the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function filterByDepartamento($departamento, $comparison = Criteria::EQUAL)
	{
		return $this
			->useDepartamentoPesquisaQuery()
			->filterByDepartamento($departamento, $comparison)
			->endUse();
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Pesquisa $pesquisa Object to remove from the list of results
	 *
	 * @return    PesquisaQuery The current query, for fluid interface
	 */
	public function prune($pesquisa = null)
	{
		if ($pesquisa) {
			$this->addUsingAlias(PesquisaPeer::ID, $pesquisa->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BasePesquisaQuery