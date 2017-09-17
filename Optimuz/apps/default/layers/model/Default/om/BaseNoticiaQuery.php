<?php


/**
 * Base class that represents a query for the 'noticia' table.
 *
 * 
 *
 * @method     NoticiaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     NoticiaQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method     NoticiaQuery orderByTema($order = Criteria::ASC) Order by the tema column
 * @method     NoticiaQuery orderByTitulo($order = Criteria::ASC) Order by the titulo column
 * @method     NoticiaQuery orderBySubTitulo($order = Criteria::ASC) Order by the sub_titulo column
 * @method     NoticiaQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 * @method     NoticiaQuery orderByDataCadastro($order = Criteria::ASC) Order by the data_cadastro column
 * @method     NoticiaQuery orderByVisualizacao($order = Criteria::ASC) Order by the visualizacao column
 * @method     NoticiaQuery orderByAtiva($order = Criteria::ASC) Order by the ativa column
 *
 * @method     NoticiaQuery groupById() Group by the id column
 * @method     NoticiaQuery groupByUsuarioId() Group by the usuario_id column
 * @method     NoticiaQuery groupByTema() Group by the tema column
 * @method     NoticiaQuery groupByTitulo() Group by the titulo column
 * @method     NoticiaQuery groupBySubTitulo() Group by the sub_titulo column
 * @method     NoticiaQuery groupByDescricao() Group by the descricao column
 * @method     NoticiaQuery groupByDataCadastro() Group by the data_cadastro column
 * @method     NoticiaQuery groupByVisualizacao() Group by the visualizacao column
 * @method     NoticiaQuery groupByAtiva() Group by the ativa column
 *
 * @method     NoticiaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     NoticiaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     NoticiaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     NoticiaQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     NoticiaQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     NoticiaQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     NoticiaQuery leftJoinComentarioNoticia($relationAlias = null) Adds a LEFT JOIN clause to the query using the ComentarioNoticia relation
 * @method     NoticiaQuery rightJoinComentarioNoticia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ComentarioNoticia relation
 * @method     NoticiaQuery innerJoinComentarioNoticia($relationAlias = null) Adds a INNER JOIN clause to the query using the ComentarioNoticia relation
 *
 * @method     Noticia findOne(PropelPDO $con = null) Return the first Noticia matching the query
 * @method     Noticia findOneOrCreate(PropelPDO $con = null) Return the first Noticia matching the query, or a new Noticia object populated from the query conditions when no match is found
 *
 * @method     Noticia findOneById(int $id) Return the first Noticia filtered by the id column
 * @method     Noticia findOneByUsuarioId(int $usuario_id) Return the first Noticia filtered by the usuario_id column
 * @method     Noticia findOneByTema(string $tema) Return the first Noticia filtered by the tema column
 * @method     Noticia findOneByTitulo(string $titulo) Return the first Noticia filtered by the titulo column
 * @method     Noticia findOneBySubTitulo(string $sub_titulo) Return the first Noticia filtered by the sub_titulo column
 * @method     Noticia findOneByDescricao(string $descricao) Return the first Noticia filtered by the descricao column
 * @method     Noticia findOneByDataCadastro(string $data_cadastro) Return the first Noticia filtered by the data_cadastro column
 * @method     Noticia findOneByVisualizacao(int $visualizacao) Return the first Noticia filtered by the visualizacao column
 * @method     Noticia findOneByAtiva(boolean $ativa) Return the first Noticia filtered by the ativa column
 *
 * @method     array findById(int $id) Return Noticia objects filtered by the id column
 * @method     array findByUsuarioId(int $usuario_id) Return Noticia objects filtered by the usuario_id column
 * @method     array findByTema(string $tema) Return Noticia objects filtered by the tema column
 * @method     array findByTitulo(string $titulo) Return Noticia objects filtered by the titulo column
 * @method     array findBySubTitulo(string $sub_titulo) Return Noticia objects filtered by the sub_titulo column
 * @method     array findByDescricao(string $descricao) Return Noticia objects filtered by the descricao column
 * @method     array findByDataCadastro(string $data_cadastro) Return Noticia objects filtered by the data_cadastro column
 * @method     array findByVisualizacao(int $visualizacao) Return Noticia objects filtered by the visualizacao column
 * @method     array findByAtiva(boolean $ativa) Return Noticia objects filtered by the ativa column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseNoticiaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseNoticiaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Noticia', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new NoticiaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    NoticiaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof NoticiaQuery) {
			return $criteria;
		}
		$query = new NoticiaQuery();
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
	 * @return    Noticia|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = NoticiaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(NoticiaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Noticia A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `USUARIO_ID`, `TEMA`, `TITULO`, `SUB_TITULO`, `DESCRICAO`, `DATA_CADASTRO`, `VISUALIZACAO`, `ATIVA` FROM `noticia` WHERE `ID` = :p0';
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
			$obj = new Noticia();
			$obj->hydrate($row);
			NoticiaPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Noticia|array|mixed the result, formatted by the current formatter
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
	 * @return    NoticiaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(NoticiaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    NoticiaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(NoticiaPeer::ID, $keys, Criteria::IN);
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
	 * @return    NoticiaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(NoticiaPeer::ID, $id, $comparison);
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
	 * @return    NoticiaQuery The current query, for fluid interface
	 */
	public function filterByUsuarioId($usuarioId = null, $comparison = null)
	{
		if (is_array($usuarioId)) {
			$useMinMax = false;
			if (isset($usuarioId['min'])) {
				$this->addUsingAlias(NoticiaPeer::USUARIO_ID, $usuarioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($usuarioId['max'])) {
				$this->addUsingAlias(NoticiaPeer::USUARIO_ID, $usuarioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NoticiaPeer::USUARIO_ID, $usuarioId, $comparison);
	}

	/**
	 * Filter the query on the tema column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTema('fooValue');   // WHERE tema = 'fooValue'
	 * $query->filterByTema('%fooValue%'); // WHERE tema LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $tema The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NoticiaQuery The current query, for fluid interface
	 */
	public function filterByTema($tema = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($tema)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $tema)) {
				$tema = str_replace('*', '%', $tema);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(NoticiaPeer::TEMA, $tema, $comparison);
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
	 * @return    NoticiaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(NoticiaPeer::TITULO, $titulo, $comparison);
	}

	/**
	 * Filter the query on the sub_titulo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySubTitulo('fooValue');   // WHERE sub_titulo = 'fooValue'
	 * $query->filterBySubTitulo('%fooValue%'); // WHERE sub_titulo LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $subTitulo The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NoticiaQuery The current query, for fluid interface
	 */
	public function filterBySubTitulo($subTitulo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($subTitulo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $subTitulo)) {
				$subTitulo = str_replace('*', '%', $subTitulo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(NoticiaPeer::SUB_TITULO, $subTitulo, $comparison);
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
	 * @return    NoticiaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(NoticiaPeer::DESCRICAO, $descricao, $comparison);
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
	 * @return    NoticiaQuery The current query, for fluid interface
	 */
	public function filterByDataCadastro($dataCadastro = null, $comparison = null)
	{
		if (is_array($dataCadastro)) {
			$useMinMax = false;
			if (isset($dataCadastro['min'])) {
				$this->addUsingAlias(NoticiaPeer::DATA_CADASTRO, $dataCadastro['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataCadastro['max'])) {
				$this->addUsingAlias(NoticiaPeer::DATA_CADASTRO, $dataCadastro['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NoticiaPeer::DATA_CADASTRO, $dataCadastro, $comparison);
	}

	/**
	 * Filter the query on the visualizacao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByVisualizacao(1234); // WHERE visualizacao = 1234
	 * $query->filterByVisualizacao(array(12, 34)); // WHERE visualizacao IN (12, 34)
	 * $query->filterByVisualizacao(array('min' => 12)); // WHERE visualizacao > 12
	 * </code>
	 *
	 * @param     mixed $visualizacao The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NoticiaQuery The current query, for fluid interface
	 */
	public function filterByVisualizacao($visualizacao = null, $comparison = null)
	{
		if (is_array($visualizacao)) {
			$useMinMax = false;
			if (isset($visualizacao['min'])) {
				$this->addUsingAlias(NoticiaPeer::VISUALIZACAO, $visualizacao['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($visualizacao['max'])) {
				$this->addUsingAlias(NoticiaPeer::VISUALIZACAO, $visualizacao['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NoticiaPeer::VISUALIZACAO, $visualizacao, $comparison);
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
	 * @return    NoticiaQuery The current query, for fluid interface
	 */
	public function filterByAtiva($ativa = null, $comparison = null)
	{
		if (is_string($ativa)) {
			$ativa = in_array(strtolower($ativa), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(NoticiaPeer::ATIVA, $ativa, $comparison);
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NoticiaQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(NoticiaPeer::USUARIO_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(NoticiaPeer::USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    NoticiaQuery The current query, for fluid interface
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
	 * Filter the query by a related ComentarioNoticia object
	 *
	 * @param     ComentarioNoticia $comentarioNoticia  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NoticiaQuery The current query, for fluid interface
	 */
	public function filterByComentarioNoticia($comentarioNoticia, $comparison = null)
	{
		if ($comentarioNoticia instanceof ComentarioNoticia) {
			return $this
				->addUsingAlias(NoticiaPeer::ID, $comentarioNoticia->getNoticiaId(), $comparison);
		} elseif ($comentarioNoticia instanceof PropelCollection) {
			return $this
				->useComentarioNoticiaQuery()
				->filterByPrimaryKeys($comentarioNoticia->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByComentarioNoticia() only accepts arguments of type ComentarioNoticia or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ComentarioNoticia relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NoticiaQuery The current query, for fluid interface
	 */
	public function joinComentarioNoticia($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ComentarioNoticia');

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
			$this->addJoinObject($join, 'ComentarioNoticia');
		}

		return $this;
	}

	/**
	 * Use the ComentarioNoticia relation ComentarioNoticia object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ComentarioNoticiaQuery A secondary query class using the current class as primary query
	 */
	public function useComentarioNoticiaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinComentarioNoticia($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ComentarioNoticia', 'ComentarioNoticiaQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Noticia $noticia Object to remove from the list of results
	 *
	 * @return    NoticiaQuery The current query, for fluid interface
	 */
	public function prune($noticia = null)
	{
		if ($noticia) {
			$this->addUsingAlias(NoticiaPeer::ID, $noticia->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseNoticiaQuery