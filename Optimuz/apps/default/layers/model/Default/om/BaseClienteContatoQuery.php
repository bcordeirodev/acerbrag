<?php


/**
 * Base class that represents a query for the 'cliente_contato' table.
 *
 * 
 *
 * @method     ClienteContatoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ClienteContatoQuery orderByIdCliente($order = Criteria::ASC) Order by the id_cliente column
 * @method     ClienteContatoQuery orderByIdContato($order = Criteria::ASC) Order by the id_contato column
 *
 * @method     ClienteContatoQuery groupById() Group by the id column
 * @method     ClienteContatoQuery groupByIdCliente() Group by the id_cliente column
 * @method     ClienteContatoQuery groupByIdContato() Group by the id_contato column
 *
 * @method     ClienteContatoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClienteContatoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClienteContatoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClienteContatoQuery leftJoinCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cliente relation
 * @method     ClienteContatoQuery rightJoinCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cliente relation
 * @method     ClienteContatoQuery innerJoinCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the Cliente relation
 *
 * @method     ClienteContatoQuery leftJoinContato($relationAlias = null) Adds a LEFT JOIN clause to the query using the Contato relation
 * @method     ClienteContatoQuery rightJoinContato($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Contato relation
 * @method     ClienteContatoQuery innerJoinContato($relationAlias = null) Adds a INNER JOIN clause to the query using the Contato relation
 *
 * @method     ClienteContato findOne(PropelPDO $con = null) Return the first ClienteContato matching the query
 * @method     ClienteContato findOneOrCreate(PropelPDO $con = null) Return the first ClienteContato matching the query, or a new ClienteContato object populated from the query conditions when no match is found
 *
 * @method     ClienteContato findOneById(int $id) Return the first ClienteContato filtered by the id column
 * @method     ClienteContato findOneByIdCliente(int $id_cliente) Return the first ClienteContato filtered by the id_cliente column
 * @method     ClienteContato findOneByIdContato(int $id_contato) Return the first ClienteContato filtered by the id_contato column
 *
 * @method     array findById(int $id) Return ClienteContato objects filtered by the id column
 * @method     array findByIdCliente(int $id_cliente) Return ClienteContato objects filtered by the id_cliente column
 * @method     array findByIdContato(int $id_contato) Return ClienteContato objects filtered by the id_contato column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseClienteContatoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseClienteContatoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'ClienteContato', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClienteContatoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClienteContatoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClienteContatoQuery) {
			return $criteria;
		}
		$query = new ClienteContatoQuery();
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
	 * @return    ClienteContato|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ClienteContatoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ClienteContatoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    ClienteContato A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ID_CLIENTE`, `ID_CONTATO` FROM `cliente_contato` WHERE `ID` = :p0';
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
			$obj = new ClienteContato();
			$obj->hydrate($row);
			ClienteContatoPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    ClienteContato|array|mixed the result, formatted by the current formatter
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
	 * @return    ClienteContatoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ClienteContatoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClienteContatoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ClienteContatoPeer::ID, $keys, Criteria::IN);
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
	 * @return    ClienteContatoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClienteContatoPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_cliente column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdCliente(1234); // WHERE id_cliente = 1234
	 * $query->filterByIdCliente(array(12, 34)); // WHERE id_cliente IN (12, 34)
	 * $query->filterByIdCliente(array('min' => 12)); // WHERE id_cliente > 12
	 * </code>
	 *
	 * @see       filterByCliente()
	 *
	 * @param     mixed $idCliente The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteContatoQuery The current query, for fluid interface
	 */
	public function filterByIdCliente($idCliente = null, $comparison = null)
	{
		if (is_array($idCliente)) {
			$useMinMax = false;
			if (isset($idCliente['min'])) {
				$this->addUsingAlias(ClienteContatoPeer::ID_CLIENTE, $idCliente['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idCliente['max'])) {
				$this->addUsingAlias(ClienteContatoPeer::ID_CLIENTE, $idCliente['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClienteContatoPeer::ID_CLIENTE, $idCliente, $comparison);
	}

	/**
	 * Filter the query on the id_contato column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdContato(1234); // WHERE id_contato = 1234
	 * $query->filterByIdContato(array(12, 34)); // WHERE id_contato IN (12, 34)
	 * $query->filterByIdContato(array('min' => 12)); // WHERE id_contato > 12
	 * </code>
	 *
	 * @see       filterByContato()
	 *
	 * @param     mixed $idContato The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteContatoQuery The current query, for fluid interface
	 */
	public function filterByIdContato($idContato = null, $comparison = null)
	{
		if (is_array($idContato)) {
			$useMinMax = false;
			if (isset($idContato['min'])) {
				$this->addUsingAlias(ClienteContatoPeer::ID_CONTATO, $idContato['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idContato['max'])) {
				$this->addUsingAlias(ClienteContatoPeer::ID_CONTATO, $idContato['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClienteContatoPeer::ID_CONTATO, $idContato, $comparison);
	}

	/**
	 * Filter the query by a related Cliente object
	 *
	 * @param     Cliente|PropelCollection $cliente The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteContatoQuery The current query, for fluid interface
	 */
	public function filterByCliente($cliente, $comparison = null)
	{
		if ($cliente instanceof Cliente) {
			return $this
				->addUsingAlias(ClienteContatoPeer::ID_CLIENTE, $cliente->getId(), $comparison);
		} elseif ($cliente instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ClienteContatoPeer::ID_CLIENTE, $cliente->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    ClienteContatoQuery The current query, for fluid interface
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
	 * Filter the query by a related Contato object
	 *
	 * @param     Contato|PropelCollection $contato The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteContatoQuery The current query, for fluid interface
	 */
	public function filterByContato($contato, $comparison = null)
	{
		if ($contato instanceof Contato) {
			return $this
				->addUsingAlias(ClienteContatoPeer::ID_CONTATO, $contato->getId(), $comparison);
		} elseif ($contato instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ClienteContatoPeer::ID_CONTATO, $contato->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    ClienteContatoQuery The current query, for fluid interface
	 */
	public function joinContato($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useContatoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinContato($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Contato', 'ContatoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     ClienteContato $clienteContato Object to remove from the list of results
	 *
	 * @return    ClienteContatoQuery The current query, for fluid interface
	 */
	public function prune($clienteContato = null)
	{
		if ($clienteContato) {
			$this->addUsingAlias(ClienteContatoPeer::ID, $clienteContato->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseClienteContatoQuery