<?php


/**
 * Base class that represents a query for the 'mensagem' table.
 *
 * 
 *
 * @method     MensagemQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MensagemQuery orderByRemetenteId($order = Criteria::ASC) Order by the remetente_id column
 * @method     MensagemQuery orderByDestinatarioId($order = Criteria::ASC) Order by the destinatario_id column
 * @method     MensagemQuery orderByTitulo($order = Criteria::ASC) Order by the titulo column
 * @method     MensagemQuery orderByTexto($order = Criteria::ASC) Order by the texto column
 * @method     MensagemQuery orderByLink($order = Criteria::ASC) Order by the link column
 * @method     MensagemQuery orderByData($order = Criteria::ASC) Order by the data column
 * @method     MensagemQuery orderByLida($order = Criteria::ASC) Order by the lida column
 *
 * @method     MensagemQuery groupById() Group by the id column
 * @method     MensagemQuery groupByRemetenteId() Group by the remetente_id column
 * @method     MensagemQuery groupByDestinatarioId() Group by the destinatario_id column
 * @method     MensagemQuery groupByTitulo() Group by the titulo column
 * @method     MensagemQuery groupByTexto() Group by the texto column
 * @method     MensagemQuery groupByLink() Group by the link column
 * @method     MensagemQuery groupByData() Group by the data column
 * @method     MensagemQuery groupByLida() Group by the lida column
 *
 * @method     MensagemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MensagemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MensagemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MensagemQuery leftJoinUsuarioRelatedByDestinatarioId($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioRelatedByDestinatarioId relation
 * @method     MensagemQuery rightJoinUsuarioRelatedByDestinatarioId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioRelatedByDestinatarioId relation
 * @method     MensagemQuery innerJoinUsuarioRelatedByDestinatarioId($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioRelatedByDestinatarioId relation
 *
 * @method     MensagemQuery leftJoinUsuarioRelatedByRemetenteId($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioRelatedByRemetenteId relation
 * @method     MensagemQuery rightJoinUsuarioRelatedByRemetenteId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioRelatedByRemetenteId relation
 * @method     MensagemQuery innerJoinUsuarioRelatedByRemetenteId($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioRelatedByRemetenteId relation
 *
 * @method     Mensagem findOne(PropelPDO $con = null) Return the first Mensagem matching the query
 * @method     Mensagem findOneOrCreate(PropelPDO $con = null) Return the first Mensagem matching the query, or a new Mensagem object populated from the query conditions when no match is found
 *
 * @method     Mensagem findOneById(int $id) Return the first Mensagem filtered by the id column
 * @method     Mensagem findOneByRemetenteId(int $remetente_id) Return the first Mensagem filtered by the remetente_id column
 * @method     Mensagem findOneByDestinatarioId(int $destinatario_id) Return the first Mensagem filtered by the destinatario_id column
 * @method     Mensagem findOneByTitulo(string $titulo) Return the first Mensagem filtered by the titulo column
 * @method     Mensagem findOneByTexto(string $texto) Return the first Mensagem filtered by the texto column
 * @method     Mensagem findOneByLink(string $link) Return the first Mensagem filtered by the link column
 * @method     Mensagem findOneByData(string $data) Return the first Mensagem filtered by the data column
 * @method     Mensagem findOneByLida(boolean $lida) Return the first Mensagem filtered by the lida column
 *
 * @method     array findById(int $id) Return Mensagem objects filtered by the id column
 * @method     array findByRemetenteId(int $remetente_id) Return Mensagem objects filtered by the remetente_id column
 * @method     array findByDestinatarioId(int $destinatario_id) Return Mensagem objects filtered by the destinatario_id column
 * @method     array findByTitulo(string $titulo) Return Mensagem objects filtered by the titulo column
 * @method     array findByTexto(string $texto) Return Mensagem objects filtered by the texto column
 * @method     array findByLink(string $link) Return Mensagem objects filtered by the link column
 * @method     array findByData(string $data) Return Mensagem objects filtered by the data column
 * @method     array findByLida(boolean $lida) Return Mensagem objects filtered by the lida column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseMensagemQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseMensagemQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Mensagem', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MensagemQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MensagemQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MensagemQuery) {
			return $criteria;
		}
		$query = new MensagemQuery();
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
	 * @return    Mensagem|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = MensagemPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(MensagemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Mensagem A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `REMETENTE_ID`, `DESTINATARIO_ID`, `TITULO`, `TEXTO`, `LINK`, `DATA`, `LIDA` FROM `mensagem` WHERE `ID` = :p0';
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
			$obj = new Mensagem();
			$obj->hydrate($row);
			MensagemPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Mensagem|array|mixed the result, formatted by the current formatter
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
	 * @return    MensagemQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MensagemPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MensagemQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MensagemPeer::ID, $keys, Criteria::IN);
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
	 * @return    MensagemQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MensagemPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the remetente_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRemetenteId(1234); // WHERE remetente_id = 1234
	 * $query->filterByRemetenteId(array(12, 34)); // WHERE remetente_id IN (12, 34)
	 * $query->filterByRemetenteId(array('min' => 12)); // WHERE remetente_id > 12
	 * </code>
	 *
	 * @see       filterByUsuarioRelatedByRemetenteId()
	 *
	 * @param     mixed $remetenteId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MensagemQuery The current query, for fluid interface
	 */
	public function filterByRemetenteId($remetenteId = null, $comparison = null)
	{
		if (is_array($remetenteId)) {
			$useMinMax = false;
			if (isset($remetenteId['min'])) {
				$this->addUsingAlias(MensagemPeer::REMETENTE_ID, $remetenteId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($remetenteId['max'])) {
				$this->addUsingAlias(MensagemPeer::REMETENTE_ID, $remetenteId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MensagemPeer::REMETENTE_ID, $remetenteId, $comparison);
	}

	/**
	 * Filter the query on the destinatario_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDestinatarioId(1234); // WHERE destinatario_id = 1234
	 * $query->filterByDestinatarioId(array(12, 34)); // WHERE destinatario_id IN (12, 34)
	 * $query->filterByDestinatarioId(array('min' => 12)); // WHERE destinatario_id > 12
	 * </code>
	 *
	 * @see       filterByUsuarioRelatedByDestinatarioId()
	 *
	 * @param     mixed $destinatarioId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MensagemQuery The current query, for fluid interface
	 */
	public function filterByDestinatarioId($destinatarioId = null, $comparison = null)
	{
		if (is_array($destinatarioId)) {
			$useMinMax = false;
			if (isset($destinatarioId['min'])) {
				$this->addUsingAlias(MensagemPeer::DESTINATARIO_ID, $destinatarioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($destinatarioId['max'])) {
				$this->addUsingAlias(MensagemPeer::DESTINATARIO_ID, $destinatarioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MensagemPeer::DESTINATARIO_ID, $destinatarioId, $comparison);
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
	 * @return    MensagemQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MensagemPeer::TITULO, $titulo, $comparison);
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
	 * @return    MensagemQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MensagemPeer::TEXTO, $texto, $comparison);
	}

	/**
	 * Filter the query on the link column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLink('fooValue');   // WHERE link = 'fooValue'
	 * $query->filterByLink('%fooValue%'); // WHERE link LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $link The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MensagemQuery The current query, for fluid interface
	 */
	public function filterByLink($link = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($link)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $link)) {
				$link = str_replace('*', '%', $link);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MensagemPeer::LINK, $link, $comparison);
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
	 * @return    MensagemQuery The current query, for fluid interface
	 */
	public function filterByData($data = null, $comparison = null)
	{
		if (is_array($data)) {
			$useMinMax = false;
			if (isset($data['min'])) {
				$this->addUsingAlias(MensagemPeer::DATA, $data['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($data['max'])) {
				$this->addUsingAlias(MensagemPeer::DATA, $data['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MensagemPeer::DATA, $data, $comparison);
	}

	/**
	 * Filter the query on the lida column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLida(true); // WHERE lida = true
	 * $query->filterByLida('yes'); // WHERE lida = true
	 * </code>
	 *
	 * @param     boolean|string $lida The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MensagemQuery The current query, for fluid interface
	 */
	public function filterByLida($lida = null, $comparison = null)
	{
		if (is_string($lida)) {
			$lida = in_array(strtolower($lida), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(MensagemPeer::LIDA, $lida, $comparison);
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MensagemQuery The current query, for fluid interface
	 */
	public function filterByUsuarioRelatedByDestinatarioId($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(MensagemPeer::DESTINATARIO_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(MensagemPeer::DESTINATARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUsuarioRelatedByDestinatarioId() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UsuarioRelatedByDestinatarioId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MensagemQuery The current query, for fluid interface
	 */
	public function joinUsuarioRelatedByDestinatarioId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UsuarioRelatedByDestinatarioId');

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
			$this->addJoinObject($join, 'UsuarioRelatedByDestinatarioId');
		}

		return $this;
	}

	/**
	 * Use the UsuarioRelatedByDestinatarioId relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioRelatedByDestinatarioIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUsuarioRelatedByDestinatarioId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UsuarioRelatedByDestinatarioId', 'UsuarioQuery');
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MensagemQuery The current query, for fluid interface
	 */
	public function filterByUsuarioRelatedByRemetenteId($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(MensagemPeer::REMETENTE_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(MensagemPeer::REMETENTE_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUsuarioRelatedByRemetenteId() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UsuarioRelatedByRemetenteId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MensagemQuery The current query, for fluid interface
	 */
	public function joinUsuarioRelatedByRemetenteId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UsuarioRelatedByRemetenteId');

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
			$this->addJoinObject($join, 'UsuarioRelatedByRemetenteId');
		}

		return $this;
	}

	/**
	 * Use the UsuarioRelatedByRemetenteId relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioRelatedByRemetenteIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUsuarioRelatedByRemetenteId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UsuarioRelatedByRemetenteId', 'UsuarioQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Mensagem $mensagem Object to remove from the list of results
	 *
	 * @return    MensagemQuery The current query, for fluid interface
	 */
	public function prune($mensagem = null)
	{
		if ($mensagem) {
			$this->addUsingAlias(MensagemPeer::ID, $mensagem->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseMensagemQuery