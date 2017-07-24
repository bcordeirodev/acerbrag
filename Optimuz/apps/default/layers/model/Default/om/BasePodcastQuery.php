<?php


/**
 * Base class that represents a query for the 'podcast' table.
 *
 * 
 *
 * @method     PodcastQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PodcastQuery orderByInstituicaoId($order = Criteria::ASC) Order by the instituicao_id column
 * @method     PodcastQuery orderByCriadorId($order = Criteria::ASC) Order by the criador_id column
 * @method     PodcastQuery orderByTitulo($order = Criteria::ASC) Order by the titulo column
 * @method     PodcastQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 * @method     PodcastQuery orderByDataCadastro($order = Criteria::ASC) Order by the data_cadastro column
 * @method     PodcastQuery orderByAtivo($order = Criteria::ASC) Order by the ativo column
 *
 * @method     PodcastQuery groupById() Group by the id column
 * @method     PodcastQuery groupByInstituicaoId() Group by the instituicao_id column
 * @method     PodcastQuery groupByCriadorId() Group by the criador_id column
 * @method     PodcastQuery groupByTitulo() Group by the titulo column
 * @method     PodcastQuery groupByDescricao() Group by the descricao column
 * @method     PodcastQuery groupByDataCadastro() Group by the data_cadastro column
 * @method     PodcastQuery groupByAtivo() Group by the ativo column
 *
 * @method     PodcastQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PodcastQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PodcastQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PodcastQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     PodcastQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     PodcastQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     PodcastQuery leftJoinPodcastIgreja($relationAlias = null) Adds a LEFT JOIN clause to the query using the PodcastIgreja relation
 * @method     PodcastQuery rightJoinPodcastIgreja($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PodcastIgreja relation
 * @method     PodcastQuery innerJoinPodcastIgreja($relationAlias = null) Adds a INNER JOIN clause to the query using the PodcastIgreja relation
 *
 * @method     Podcast findOne(PropelPDO $con = null) Return the first Podcast matching the query
 * @method     Podcast findOneOrCreate(PropelPDO $con = null) Return the first Podcast matching the query, or a new Podcast object populated from the query conditions when no match is found
 *
 * @method     Podcast findOneById(int $id) Return the first Podcast filtered by the id column
 * @method     Podcast findOneByInstituicaoId(int $instituicao_id) Return the first Podcast filtered by the instituicao_id column
 * @method     Podcast findOneByCriadorId(int $criador_id) Return the first Podcast filtered by the criador_id column
 * @method     Podcast findOneByTitulo(string $titulo) Return the first Podcast filtered by the titulo column
 * @method     Podcast findOneByDescricao(string $descricao) Return the first Podcast filtered by the descricao column
 * @method     Podcast findOneByDataCadastro(string $data_cadastro) Return the first Podcast filtered by the data_cadastro column
 * @method     Podcast findOneByAtivo(boolean $ativo) Return the first Podcast filtered by the ativo column
 *
 * @method     array findById(int $id) Return Podcast objects filtered by the id column
 * @method     array findByInstituicaoId(int $instituicao_id) Return Podcast objects filtered by the instituicao_id column
 * @method     array findByCriadorId(int $criador_id) Return Podcast objects filtered by the criador_id column
 * @method     array findByTitulo(string $titulo) Return Podcast objects filtered by the titulo column
 * @method     array findByDescricao(string $descricao) Return Podcast objects filtered by the descricao column
 * @method     array findByDataCadastro(string $data_cadastro) Return Podcast objects filtered by the data_cadastro column
 * @method     array findByAtivo(boolean $ativo) Return Podcast objects filtered by the ativo column
 *
 * @package    propel.generator.Default.om
 */
abstract class BasePodcastQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BasePodcastQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Podcast', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PodcastQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PodcastQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PodcastQuery) {
			return $criteria;
		}
		$query = new PodcastQuery();
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
	 * @return    Podcast|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = PodcastPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(PodcastPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Podcast A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `INSTITUICAO_ID`, `CRIADOR_ID`, `TITULO`, `DESCRICAO`, `DATA_CADASTRO`, `ATIVO` FROM `podcast` WHERE `ID` = :p0';
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
			$obj = new Podcast();
			$obj->hydrate($row);
			PodcastPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Podcast|array|mixed the result, formatted by the current formatter
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
	 * @return    PodcastQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PodcastPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PodcastQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PodcastPeer::ID, $keys, Criteria::IN);
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
	 * @return    PodcastQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PodcastPeer::ID, $id, $comparison);
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
	 * @return    PodcastQuery The current query, for fluid interface
	 */
	public function filterByInstituicaoId($instituicaoId = null, $comparison = null)
	{
		if (is_array($instituicaoId)) {
			$useMinMax = false;
			if (isset($instituicaoId['min'])) {
				$this->addUsingAlias(PodcastPeer::INSTITUICAO_ID, $instituicaoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($instituicaoId['max'])) {
				$this->addUsingAlias(PodcastPeer::INSTITUICAO_ID, $instituicaoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PodcastPeer::INSTITUICAO_ID, $instituicaoId, $comparison);
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
	 * @return    PodcastQuery The current query, for fluid interface
	 */
	public function filterByCriadorId($criadorId = null, $comparison = null)
	{
		if (is_array($criadorId)) {
			$useMinMax = false;
			if (isset($criadorId['min'])) {
				$this->addUsingAlias(PodcastPeer::CRIADOR_ID, $criadorId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($criadorId['max'])) {
				$this->addUsingAlias(PodcastPeer::CRIADOR_ID, $criadorId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PodcastPeer::CRIADOR_ID, $criadorId, $comparison);
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
	 * @return    PodcastQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PodcastPeer::TITULO, $titulo, $comparison);
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
	 * @return    PodcastQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PodcastPeer::DESCRICAO, $descricao, $comparison);
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
	 * @return    PodcastQuery The current query, for fluid interface
	 */
	public function filterByDataCadastro($dataCadastro = null, $comparison = null)
	{
		if (is_array($dataCadastro)) {
			$useMinMax = false;
			if (isset($dataCadastro['min'])) {
				$this->addUsingAlias(PodcastPeer::DATA_CADASTRO, $dataCadastro['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataCadastro['max'])) {
				$this->addUsingAlias(PodcastPeer::DATA_CADASTRO, $dataCadastro['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PodcastPeer::DATA_CADASTRO, $dataCadastro, $comparison);
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
	 * @return    PodcastQuery The current query, for fluid interface
	 */
	public function filterByAtivo($ativo = null, $comparison = null)
	{
		if (is_string($ativo)) {
			$ativo = in_array(strtolower($ativo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(PodcastPeer::ATIVO, $ativo, $comparison);
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PodcastQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(PodcastPeer::CRIADOR_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PodcastPeer::CRIADOR_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    PodcastQuery The current query, for fluid interface
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
	 * Filter the query by a related PodcastIgreja object
	 *
	 * @param     PodcastIgreja $podcastIgreja  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PodcastQuery The current query, for fluid interface
	 */
	public function filterByPodcastIgreja($podcastIgreja, $comparison = null)
	{
		if ($podcastIgreja instanceof PodcastIgreja) {
			return $this
				->addUsingAlias(PodcastPeer::ID, $podcastIgreja->getPodcastId(), $comparison);
		} elseif ($podcastIgreja instanceof PropelCollection) {
			return $this
				->usePodcastIgrejaQuery()
				->filterByPrimaryKeys($podcastIgreja->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByPodcastIgreja() only accepts arguments of type PodcastIgreja or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the PodcastIgreja relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PodcastQuery The current query, for fluid interface
	 */
	public function joinPodcastIgreja($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PodcastIgreja');

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
			$this->addJoinObject($join, 'PodcastIgreja');
		}

		return $this;
	}

	/**
	 * Use the PodcastIgreja relation PodcastIgreja object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PodcastIgrejaQuery A secondary query class using the current class as primary query
	 */
	public function usePodcastIgrejaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPodcastIgreja($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PodcastIgreja', 'PodcastIgrejaQuery');
	}

	/**
	 * Filter the query by a related Igreja object
	 * using the podcast_igreja table as cross reference
	 *
	 * @param     Igreja $igreja the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PodcastQuery The current query, for fluid interface
	 */
	public function filterByIgreja($igreja, $comparison = Criteria::EQUAL)
	{
		return $this
			->usePodcastIgrejaQuery()
			->filterByIgreja($igreja, $comparison)
			->endUse();
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Podcast $podcast Object to remove from the list of results
	 *
	 * @return    PodcastQuery The current query, for fluid interface
	 */
	public function prune($podcast = null)
	{
		if ($podcast) {
			$this->addUsingAlias(PodcastPeer::ID, $podcast->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BasePodcastQuery