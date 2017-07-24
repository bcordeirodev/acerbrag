<?php


/**
 * Base class that represents a query for the 't_permissao' table.
 *
 * 
 *
 * @method     TPermissaoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     TPermissaoQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     TPermissaoQuery orderBySlug($order = Criteria::ASC) Order by the slug column
 * @method     TPermissaoQuery orderByDescricao($order = Criteria::ASC) Order by the descricao column
 *
 * @method     TPermissaoQuery groupById() Group by the id column
 * @method     TPermissaoQuery groupByNome() Group by the nome column
 * @method     TPermissaoQuery groupBySlug() Group by the slug column
 * @method     TPermissaoQuery groupByDescricao() Group by the descricao column
 *
 * @method     TPermissaoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TPermissaoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TPermissaoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TPermissaoQuery leftJoinAUsuarioPermissao($relationAlias = null) Adds a LEFT JOIN clause to the query using the AUsuarioPermissao relation
 * @method     TPermissaoQuery rightJoinAUsuarioPermissao($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AUsuarioPermissao relation
 * @method     TPermissaoQuery innerJoinAUsuarioPermissao($relationAlias = null) Adds a INNER JOIN clause to the query using the AUsuarioPermissao relation
 *
 * @method     TPermissao findOne(PropelPDO $con = null) Return the first TPermissao matching the query
 * @method     TPermissao findOneOrCreate(PropelPDO $con = null) Return the first TPermissao matching the query, or a new TPermissao object populated from the query conditions when no match is found
 *
 * @method     TPermissao findOneById(int $id) Return the first TPermissao filtered by the id column
 * @method     TPermissao findOneByNome(string $nome) Return the first TPermissao filtered by the nome column
 * @method     TPermissao findOneBySlug(string $slug) Return the first TPermissao filtered by the slug column
 * @method     TPermissao findOneByDescricao(string $descricao) Return the first TPermissao filtered by the descricao column
 *
 * @method     array findById(int $id) Return TPermissao objects filtered by the id column
 * @method     array findByNome(string $nome) Return TPermissao objects filtered by the nome column
 * @method     array findBySlug(string $slug) Return TPermissao objects filtered by the slug column
 * @method     array findByDescricao(string $descricao) Return TPermissao objects filtered by the descricao column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseTPermissaoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseTPermissaoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'TPermissao', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TPermissaoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TPermissaoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TPermissaoQuery) {
			return $criteria;
		}
		$query = new TPermissaoQuery();
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
	 * @return    TPermissao|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = TPermissaoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(TPermissaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    TPermissao A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `NOME`, `SLUG`, `DESCRICAO` FROM `t_permissao` WHERE `ID` = :p0';
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
			$obj = new TPermissao();
			$obj->hydrate($row);
			TPermissaoPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    TPermissao|array|mixed the result, formatted by the current formatter
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
	 * @return    TPermissaoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TPermissaoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TPermissaoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TPermissaoPeer::ID, $keys, Criteria::IN);
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
	 * @return    TPermissaoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TPermissaoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the nome column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNome('fooValue');   // WHERE nome = 'fooValue'
	 * $query->filterByNome('%fooValue%'); // WHERE nome LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nome The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TPermissaoQuery The current query, for fluid interface
	 */
	public function filterByNome($nome = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nome)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nome)) {
				$nome = str_replace('*', '%', $nome);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TPermissaoPeer::NOME, $nome, $comparison);
	}

	/**
	 * Filter the query on the slug column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySlug('fooValue');   // WHERE slug = 'fooValue'
	 * $query->filterBySlug('%fooValue%'); // WHERE slug LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $slug The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TPermissaoQuery The current query, for fluid interface
	 */
	public function filterBySlug($slug = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($slug)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $slug)) {
				$slug = str_replace('*', '%', $slug);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TPermissaoPeer::SLUG, $slug, $comparison);
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
	 * @return    TPermissaoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(TPermissaoPeer::DESCRICAO, $descricao, $comparison);
	}

	/**
	 * Filter the query by a related AUsuarioPermissao object
	 *
	 * @param     AUsuarioPermissao $aUsuarioPermissao  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TPermissaoQuery The current query, for fluid interface
	 */
	public function filterByAUsuarioPermissao($aUsuarioPermissao, $comparison = null)
	{
		if ($aUsuarioPermissao instanceof AUsuarioPermissao) {
			return $this
				->addUsingAlias(TPermissaoPeer::ID, $aUsuarioPermissao->getPermissaoId(), $comparison);
		} elseif ($aUsuarioPermissao instanceof PropelCollection) {
			return $this
				->useAUsuarioPermissaoQuery()
				->filterByPrimaryKeys($aUsuarioPermissao->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAUsuarioPermissao() only accepts arguments of type AUsuarioPermissao or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AUsuarioPermissao relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TPermissaoQuery The current query, for fluid interface
	 */
	public function joinAUsuarioPermissao($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AUsuarioPermissao');

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
			$this->addJoinObject($join, 'AUsuarioPermissao');
		}

		return $this;
	}

	/**
	 * Use the AUsuarioPermissao relation AUsuarioPermissao object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AUsuarioPermissaoQuery A secondary query class using the current class as primary query
	 */
	public function useAUsuarioPermissaoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAUsuarioPermissao($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AUsuarioPermissao', 'AUsuarioPermissaoQuery');
	}

	/**
	 * Filter the query by a related Usuario object
	 * using the a_usuario_permissao table as cross reference
	 *
	 * @param     Usuario $usuario the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TPermissaoQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = Criteria::EQUAL)
	{
		return $this
			->useAUsuarioPermissaoQuery()
			->filterByUsuario($usuario, $comparison)
			->endUse();
	}

	/**
	 * Exclude object from result
	 *
	 * @param     TPermissao $tPermissao Object to remove from the list of results
	 *
	 * @return    TPermissaoQuery The current query, for fluid interface
	 */
	public function prune($tPermissao = null)
	{
		if ($tPermissao) {
			$this->addUsingAlias(TPermissaoPeer::ID, $tPermissao->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseTPermissaoQuery