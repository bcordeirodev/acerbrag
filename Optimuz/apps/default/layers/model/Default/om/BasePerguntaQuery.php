<?php


/**
 * Base class that represents a query for the 'pergunta' table.
 *
 * 
 *
 * @method     PerguntaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PerguntaQuery orderByPesquisaId($order = Criteria::ASC) Order by the pesquisa_id column
 * @method     PerguntaQuery orderByCategoriaId($order = Criteria::ASC) Order by the categoria_id column
 * @method     PerguntaQuery orderByTexto($order = Criteria::ASC) Order by the texto column
 * @method     PerguntaQuery orderByTipoResposta($order = Criteria::ASC) Order by the tipo_resposta column
 * @method     PerguntaQuery orderByPosicao($order = Criteria::ASC) Order by the posicao column
 * @method     PerguntaQuery orderByObrigatoria($order = Criteria::ASC) Order by the obrigatoria column
 * @method     PerguntaQuery orderByExcecao($order = Criteria::ASC) Order by the excecao column
 * @method     PerguntaQuery orderByGatilhoExcecao($order = Criteria::ASC) Order by the gatilho_excecao column
 * @method     PerguntaQuery orderByPerguntaMaeId($order = Criteria::ASC) Order by the pergunta_mae_id column
 *
 * @method     PerguntaQuery groupById() Group by the id column
 * @method     PerguntaQuery groupByPesquisaId() Group by the pesquisa_id column
 * @method     PerguntaQuery groupByCategoriaId() Group by the categoria_id column
 * @method     PerguntaQuery groupByTexto() Group by the texto column
 * @method     PerguntaQuery groupByTipoResposta() Group by the tipo_resposta column
 * @method     PerguntaQuery groupByPosicao() Group by the posicao column
 * @method     PerguntaQuery groupByObrigatoria() Group by the obrigatoria column
 * @method     PerguntaQuery groupByExcecao() Group by the excecao column
 * @method     PerguntaQuery groupByGatilhoExcecao() Group by the gatilho_excecao column
 * @method     PerguntaQuery groupByPerguntaMaeId() Group by the pergunta_mae_id column
 *
 * @method     PerguntaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PerguntaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PerguntaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PerguntaQuery leftJoinCategoria($relationAlias = null) Adds a LEFT JOIN clause to the query using the Categoria relation
 * @method     PerguntaQuery rightJoinCategoria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Categoria relation
 * @method     PerguntaQuery innerJoinCategoria($relationAlias = null) Adds a INNER JOIN clause to the query using the Categoria relation
 *
 * @method     PerguntaQuery leftJoinPesquisa($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pesquisa relation
 * @method     PerguntaQuery rightJoinPesquisa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pesquisa relation
 * @method     PerguntaQuery innerJoinPesquisa($relationAlias = null) Adds a INNER JOIN clause to the query using the Pesquisa relation
 *
 * @method     PerguntaQuery leftJoinAlternativa($relationAlias = null) Adds a LEFT JOIN clause to the query using the Alternativa relation
 * @method     PerguntaQuery rightJoinAlternativa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Alternativa relation
 * @method     PerguntaQuery innerJoinAlternativa($relationAlias = null) Adds a INNER JOIN clause to the query using the Alternativa relation
 *
 * @method     PerguntaQuery leftJoinResposta($relationAlias = null) Adds a LEFT JOIN clause to the query using the Resposta relation
 * @method     PerguntaQuery rightJoinResposta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Resposta relation
 * @method     PerguntaQuery innerJoinResposta($relationAlias = null) Adds a INNER JOIN clause to the query using the Resposta relation
 *
 * @method     Pergunta findOne(PropelPDO $con = null) Return the first Pergunta matching the query
 * @method     Pergunta findOneOrCreate(PropelPDO $con = null) Return the first Pergunta matching the query, or a new Pergunta object populated from the query conditions when no match is found
 *
 * @method     Pergunta findOneById(int $id) Return the first Pergunta filtered by the id column
 * @method     Pergunta findOneByPesquisaId(int $pesquisa_id) Return the first Pergunta filtered by the pesquisa_id column
 * @method     Pergunta findOneByCategoriaId(int $categoria_id) Return the first Pergunta filtered by the categoria_id column
 * @method     Pergunta findOneByTexto(string $texto) Return the first Pergunta filtered by the texto column
 * @method     Pergunta findOneByTipoResposta(int $tipo_resposta) Return the first Pergunta filtered by the tipo_resposta column
 * @method     Pergunta findOneByPosicao(int $posicao) Return the first Pergunta filtered by the posicao column
 * @method     Pergunta findOneByObrigatoria(boolean $obrigatoria) Return the first Pergunta filtered by the obrigatoria column
 * @method     Pergunta findOneByExcecao(int $excecao) Return the first Pergunta filtered by the excecao column
 * @method     Pergunta findOneByGatilhoExcecao(int $gatilho_excecao) Return the first Pergunta filtered by the gatilho_excecao column
 * @method     Pergunta findOneByPerguntaMaeId(int $pergunta_mae_id) Return the first Pergunta filtered by the pergunta_mae_id column
 *
 * @method     array findById(int $id) Return Pergunta objects filtered by the id column
 * @method     array findByPesquisaId(int $pesquisa_id) Return Pergunta objects filtered by the pesquisa_id column
 * @method     array findByCategoriaId(int $categoria_id) Return Pergunta objects filtered by the categoria_id column
 * @method     array findByTexto(string $texto) Return Pergunta objects filtered by the texto column
 * @method     array findByTipoResposta(int $tipo_resposta) Return Pergunta objects filtered by the tipo_resposta column
 * @method     array findByPosicao(int $posicao) Return Pergunta objects filtered by the posicao column
 * @method     array findByObrigatoria(boolean $obrigatoria) Return Pergunta objects filtered by the obrigatoria column
 * @method     array findByExcecao(int $excecao) Return Pergunta objects filtered by the excecao column
 * @method     array findByGatilhoExcecao(int $gatilho_excecao) Return Pergunta objects filtered by the gatilho_excecao column
 * @method     array findByPerguntaMaeId(int $pergunta_mae_id) Return Pergunta objects filtered by the pergunta_mae_id column
 *
 * @package    propel.generator.Default.om
 */
abstract class BasePerguntaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BasePerguntaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Pergunta', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PerguntaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PerguntaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PerguntaQuery) {
			return $criteria;
		}
		$query = new PerguntaQuery();
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
	 * @return    Pergunta|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = PerguntaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(PerguntaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Pergunta A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `PESQUISA_ID`, `CATEGORIA_ID`, `TEXTO`, `TIPO_RESPOSTA`, `POSICAO`, `OBRIGATORIA`, `EXCECAO`, `GATILHO_EXCECAO`, `PERGUNTA_MAE_ID` FROM `pergunta` WHERE `ID` = :p0';
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
			$obj = new Pergunta();
			$obj->hydrate($row);
			PerguntaPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Pergunta|array|mixed the result, formatted by the current formatter
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
	 * @return    PerguntaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PerguntaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PerguntaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PerguntaPeer::ID, $keys, Criteria::IN);
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
	 * @return    PerguntaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PerguntaPeer::ID, $id, $comparison);
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
	 * @return    PerguntaQuery The current query, for fluid interface
	 */
	public function filterByPesquisaId($pesquisaId = null, $comparison = null)
	{
		if (is_array($pesquisaId)) {
			$useMinMax = false;
			if (isset($pesquisaId['min'])) {
				$this->addUsingAlias(PerguntaPeer::PESQUISA_ID, $pesquisaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($pesquisaId['max'])) {
				$this->addUsingAlias(PerguntaPeer::PESQUISA_ID, $pesquisaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PerguntaPeer::PESQUISA_ID, $pesquisaId, $comparison);
	}

	/**
	 * Filter the query on the categoria_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCategoriaId(1234); // WHERE categoria_id = 1234
	 * $query->filterByCategoriaId(array(12, 34)); // WHERE categoria_id IN (12, 34)
	 * $query->filterByCategoriaId(array('min' => 12)); // WHERE categoria_id > 12
	 * </code>
	 *
	 * @see       filterByCategoria()
	 *
	 * @param     mixed $categoriaId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PerguntaQuery The current query, for fluid interface
	 */
	public function filterByCategoriaId($categoriaId = null, $comparison = null)
	{
		if (is_array($categoriaId)) {
			$useMinMax = false;
			if (isset($categoriaId['min'])) {
				$this->addUsingAlias(PerguntaPeer::CATEGORIA_ID, $categoriaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($categoriaId['max'])) {
				$this->addUsingAlias(PerguntaPeer::CATEGORIA_ID, $categoriaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PerguntaPeer::CATEGORIA_ID, $categoriaId, $comparison);
	}

	/**
	 * Filter the query on the texto column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTexto('fooValue');   // WHERE texto = 'fooValue'
	 * $query->filterByTexto('%fooValue%'); // WHERE texto LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $texto The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PerguntaQuery The current query, for fluid interface
	 */
	public function filterByTexto($texto = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($texto)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $texto)) {
				$texto = str_replace('*', '%', $texto);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PerguntaPeer::TEXTO, $texto, $comparison);
	}

	/**
	 * Filter the query on the tipo_resposta column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTipoResposta(1234); // WHERE tipo_resposta = 1234
	 * $query->filterByTipoResposta(array(12, 34)); // WHERE tipo_resposta IN (12, 34)
	 * $query->filterByTipoResposta(array('min' => 12)); // WHERE tipo_resposta > 12
	 * </code>
	 *
	 * @param     mixed $tipoResposta The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PerguntaQuery The current query, for fluid interface
	 */
	public function filterByTipoResposta($tipoResposta = null, $comparison = null)
	{
		if (is_array($tipoResposta)) {
			$useMinMax = false;
			if (isset($tipoResposta['min'])) {
				$this->addUsingAlias(PerguntaPeer::TIPO_RESPOSTA, $tipoResposta['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($tipoResposta['max'])) {
				$this->addUsingAlias(PerguntaPeer::TIPO_RESPOSTA, $tipoResposta['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PerguntaPeer::TIPO_RESPOSTA, $tipoResposta, $comparison);
	}

	/**
	 * Filter the query on the posicao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPosicao(1234); // WHERE posicao = 1234
	 * $query->filterByPosicao(array(12, 34)); // WHERE posicao IN (12, 34)
	 * $query->filterByPosicao(array('min' => 12)); // WHERE posicao > 12
	 * </code>
	 *
	 * @param     mixed $posicao The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PerguntaQuery The current query, for fluid interface
	 */
	public function filterByPosicao($posicao = null, $comparison = null)
	{
		if (is_array($posicao)) {
			$useMinMax = false;
			if (isset($posicao['min'])) {
				$this->addUsingAlias(PerguntaPeer::POSICAO, $posicao['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($posicao['max'])) {
				$this->addUsingAlias(PerguntaPeer::POSICAO, $posicao['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PerguntaPeer::POSICAO, $posicao, $comparison);
	}

	/**
	 * Filter the query on the obrigatoria column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByObrigatoria(true); // WHERE obrigatoria = true
	 * $query->filterByObrigatoria('yes'); // WHERE obrigatoria = true
	 * </code>
	 *
	 * @param     boolean|string $obrigatoria The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PerguntaQuery The current query, for fluid interface
	 */
	public function filterByObrigatoria($obrigatoria = null, $comparison = null)
	{
		if (is_string($obrigatoria)) {
			$obrigatoria = in_array(strtolower($obrigatoria), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(PerguntaPeer::OBRIGATORIA, $obrigatoria, $comparison);
	}

	/**
	 * Filter the query on the excecao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByExcecao(1234); // WHERE excecao = 1234
	 * $query->filterByExcecao(array(12, 34)); // WHERE excecao IN (12, 34)
	 * $query->filterByExcecao(array('min' => 12)); // WHERE excecao > 12
	 * </code>
	 *
	 * @param     mixed $excecao The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PerguntaQuery The current query, for fluid interface
	 */
	public function filterByExcecao($excecao = null, $comparison = null)
	{
		if (is_array($excecao)) {
			$useMinMax = false;
			if (isset($excecao['min'])) {
				$this->addUsingAlias(PerguntaPeer::EXCECAO, $excecao['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($excecao['max'])) {
				$this->addUsingAlias(PerguntaPeer::EXCECAO, $excecao['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PerguntaPeer::EXCECAO, $excecao, $comparison);
	}

	/**
	 * Filter the query on the gatilho_excecao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByGatilhoExcecao(1234); // WHERE gatilho_excecao = 1234
	 * $query->filterByGatilhoExcecao(array(12, 34)); // WHERE gatilho_excecao IN (12, 34)
	 * $query->filterByGatilhoExcecao(array('min' => 12)); // WHERE gatilho_excecao > 12
	 * </code>
	 *
	 * @param     mixed $gatilhoExcecao The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PerguntaQuery The current query, for fluid interface
	 */
	public function filterByGatilhoExcecao($gatilhoExcecao = null, $comparison = null)
	{
		if (is_array($gatilhoExcecao)) {
			$useMinMax = false;
			if (isset($gatilhoExcecao['min'])) {
				$this->addUsingAlias(PerguntaPeer::GATILHO_EXCECAO, $gatilhoExcecao['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($gatilhoExcecao['max'])) {
				$this->addUsingAlias(PerguntaPeer::GATILHO_EXCECAO, $gatilhoExcecao['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PerguntaPeer::GATILHO_EXCECAO, $gatilhoExcecao, $comparison);
	}

	/**
	 * Filter the query on the pergunta_mae_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPerguntaMaeId(1234); // WHERE pergunta_mae_id = 1234
	 * $query->filterByPerguntaMaeId(array(12, 34)); // WHERE pergunta_mae_id IN (12, 34)
	 * $query->filterByPerguntaMaeId(array('min' => 12)); // WHERE pergunta_mae_id > 12
	 * </code>
	 *
	 * @param     mixed $perguntaMaeId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PerguntaQuery The current query, for fluid interface
	 */
	public function filterByPerguntaMaeId($perguntaMaeId = null, $comparison = null)
	{
		if (is_array($perguntaMaeId)) {
			$useMinMax = false;
			if (isset($perguntaMaeId['min'])) {
				$this->addUsingAlias(PerguntaPeer::PERGUNTA_MAE_ID, $perguntaMaeId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($perguntaMaeId['max'])) {
				$this->addUsingAlias(PerguntaPeer::PERGUNTA_MAE_ID, $perguntaMaeId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PerguntaPeer::PERGUNTA_MAE_ID, $perguntaMaeId, $comparison);
	}

	/**
	 * Filter the query by a related Categoria object
	 *
	 * @param     Categoria|PropelCollection $categoria The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PerguntaQuery The current query, for fluid interface
	 */
	public function filterByCategoria($categoria, $comparison = null)
	{
		if ($categoria instanceof Categoria) {
			return $this
				->addUsingAlias(PerguntaPeer::CATEGORIA_ID, $categoria->getId(), $comparison);
		} elseif ($categoria instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PerguntaPeer::CATEGORIA_ID, $categoria->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByCategoria() only accepts arguments of type Categoria or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Categoria relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PerguntaQuery The current query, for fluid interface
	 */
	public function joinCategoria($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Categoria');

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
			$this->addJoinObject($join, 'Categoria');
		}

		return $this;
	}

	/**
	 * Use the Categoria relation Categoria object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CategoriaQuery A secondary query class using the current class as primary query
	 */
	public function useCategoriaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCategoria($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Categoria', 'CategoriaQuery');
	}

	/**
	 * Filter the query by a related Pesquisa object
	 *
	 * @param     Pesquisa|PropelCollection $pesquisa The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PerguntaQuery The current query, for fluid interface
	 */
	public function filterByPesquisa($pesquisa, $comparison = null)
	{
		if ($pesquisa instanceof Pesquisa) {
			return $this
				->addUsingAlias(PerguntaPeer::PESQUISA_ID, $pesquisa->getId(), $comparison);
		} elseif ($pesquisa instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PerguntaPeer::PESQUISA_ID, $pesquisa->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    PerguntaQuery The current query, for fluid interface
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
	 * Filter the query by a related Alternativa object
	 *
	 * @param     Alternativa $alternativa  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PerguntaQuery The current query, for fluid interface
	 */
	public function filterByAlternativa($alternativa, $comparison = null)
	{
		if ($alternativa instanceof Alternativa) {
			return $this
				->addUsingAlias(PerguntaPeer::ID, $alternativa->getPerguntaId(), $comparison);
		} elseif ($alternativa instanceof PropelCollection) {
			return $this
				->useAlternativaQuery()
				->filterByPrimaryKeys($alternativa->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAlternativa() only accepts arguments of type Alternativa or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Alternativa relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PerguntaQuery The current query, for fluid interface
	 */
	public function joinAlternativa($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Alternativa');

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
			$this->addJoinObject($join, 'Alternativa');
		}

		return $this;
	}

	/**
	 * Use the Alternativa relation Alternativa object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlternativaQuery A secondary query class using the current class as primary query
	 */
	public function useAlternativaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAlternativa($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Alternativa', 'AlternativaQuery');
	}

	/**
	 * Filter the query by a related Resposta object
	 *
	 * @param     Resposta $resposta  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PerguntaQuery The current query, for fluid interface
	 */
	public function filterByResposta($resposta, $comparison = null)
	{
		if ($resposta instanceof Resposta) {
			return $this
				->addUsingAlias(PerguntaPeer::ID, $resposta->getPerguntaId(), $comparison);
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
	 * @return    PerguntaQuery The current query, for fluid interface
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
	 * @param     Pergunta $pergunta Object to remove from the list of results
	 *
	 * @return    PerguntaQuery The current query, for fluid interface
	 */
	public function prune($pergunta = null)
	{
		if ($pergunta) {
			$this->addUsingAlias(PerguntaPeer::ID, $pergunta->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BasePerguntaQuery