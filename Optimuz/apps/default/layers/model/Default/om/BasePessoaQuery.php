<?php


/**
 * Base class that represents a query for the 'pessoa' table.
 *
 * 
 *
 * @method     PessoaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PessoaQuery orderByEnderecoId($order = Criteria::ASC) Order by the endereco_id column
 * @method     PessoaQuery orderByAtivo($order = Criteria::ASC) Order by the ativo column
 * @method     PessoaQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     PessoaQuery orderByCpf($order = Criteria::ASC) Order by the cpf column
 * @method     PessoaQuery orderByCelular($order = Criteria::ASC) Order by the celular column
 * @method     PessoaQuery orderByTelefone($order = Criteria::ASC) Order by the telefone column
 * @method     PessoaQuery orderByEmail($order = Criteria::ASC) Order by the email column
 *
 * @method     PessoaQuery groupById() Group by the id column
 * @method     PessoaQuery groupByEnderecoId() Group by the endereco_id column
 * @method     PessoaQuery groupByAtivo() Group by the ativo column
 * @method     PessoaQuery groupByNome() Group by the nome column
 * @method     PessoaQuery groupByCpf() Group by the cpf column
 * @method     PessoaQuery groupByCelular() Group by the celular column
 * @method     PessoaQuery groupByTelefone() Group by the telefone column
 * @method     PessoaQuery groupByEmail() Group by the email column
 *
 * @method     PessoaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PessoaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PessoaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PessoaQuery leftJoinEndereco($relationAlias = null) Adds a LEFT JOIN clause to the query using the Endereco relation
 * @method     PessoaQuery rightJoinEndereco($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Endereco relation
 * @method     PessoaQuery innerJoinEndereco($relationAlias = null) Adds a INNER JOIN clause to the query using the Endereco relation
 *
 * @method     PessoaQuery leftJoinComunicadoRelatedBySeguradoId($relationAlias = null) Adds a LEFT JOIN clause to the query using the ComunicadoRelatedBySeguradoId relation
 * @method     PessoaQuery rightJoinComunicadoRelatedBySeguradoId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ComunicadoRelatedBySeguradoId relation
 * @method     PessoaQuery innerJoinComunicadoRelatedBySeguradoId($relationAlias = null) Adds a INNER JOIN clause to the query using the ComunicadoRelatedBySeguradoId relation
 *
 * @method     PessoaQuery leftJoinComunicadoRelatedByComunicanteId($relationAlias = null) Adds a LEFT JOIN clause to the query using the ComunicadoRelatedByComunicanteId relation
 * @method     PessoaQuery rightJoinComunicadoRelatedByComunicanteId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ComunicadoRelatedByComunicanteId relation
 * @method     PessoaQuery innerJoinComunicadoRelatedByComunicanteId($relationAlias = null) Adds a INNER JOIN clause to the query using the ComunicadoRelatedByComunicanteId relation
 *
 * @method     Pessoa findOne(PropelPDO $con = null) Return the first Pessoa matching the query
 * @method     Pessoa findOneOrCreate(PropelPDO $con = null) Return the first Pessoa matching the query, or a new Pessoa object populated from the query conditions when no match is found
 *
 * @method     Pessoa findOneById(int $id) Return the first Pessoa filtered by the id column
 * @method     Pessoa findOneByEnderecoId(int $endereco_id) Return the first Pessoa filtered by the endereco_id column
 * @method     Pessoa findOneByAtivo(boolean $ativo) Return the first Pessoa filtered by the ativo column
 * @method     Pessoa findOneByNome(string $nome) Return the first Pessoa filtered by the nome column
 * @method     Pessoa findOneByCpf(string $cpf) Return the first Pessoa filtered by the cpf column
 * @method     Pessoa findOneByCelular(string $celular) Return the first Pessoa filtered by the celular column
 * @method     Pessoa findOneByTelefone(string $telefone) Return the first Pessoa filtered by the telefone column
 * @method     Pessoa findOneByEmail(string $email) Return the first Pessoa filtered by the email column
 *
 * @method     array findById(int $id) Return Pessoa objects filtered by the id column
 * @method     array findByEnderecoId(int $endereco_id) Return Pessoa objects filtered by the endereco_id column
 * @method     array findByAtivo(boolean $ativo) Return Pessoa objects filtered by the ativo column
 * @method     array findByNome(string $nome) Return Pessoa objects filtered by the nome column
 * @method     array findByCpf(string $cpf) Return Pessoa objects filtered by the cpf column
 * @method     array findByCelular(string $celular) Return Pessoa objects filtered by the celular column
 * @method     array findByTelefone(string $telefone) Return Pessoa objects filtered by the telefone column
 * @method     array findByEmail(string $email) Return Pessoa objects filtered by the email column
 *
 * @package    propel.generator.Default.om
 */
abstract class BasePessoaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BasePessoaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Pessoa', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PessoaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PessoaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PessoaQuery) {
			return $criteria;
		}
		$query = new PessoaQuery();
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
	 * @return    Pessoa|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = PessoaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(PessoaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Pessoa A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `ENDERECO_ID`, `ATIVO`, `NOME`, `CPF`, `CELULAR`, `TELEFONE`, `EMAIL` FROM `pessoa` WHERE `ID` = :p0';
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
			$obj = new Pessoa();
			$obj->hydrate($row);
			PessoaPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Pessoa|array|mixed the result, formatted by the current formatter
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
	 * @return    PessoaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PessoaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PessoaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PessoaPeer::ID, $keys, Criteria::IN);
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
	 * @return    PessoaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PessoaPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the endereco_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEnderecoId(1234); // WHERE endereco_id = 1234
	 * $query->filterByEnderecoId(array(12, 34)); // WHERE endereco_id IN (12, 34)
	 * $query->filterByEnderecoId(array('min' => 12)); // WHERE endereco_id > 12
	 * </code>
	 *
	 * @see       filterByEndereco()
	 *
	 * @param     mixed $enderecoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PessoaQuery The current query, for fluid interface
	 */
	public function filterByEnderecoId($enderecoId = null, $comparison = null)
	{
		if (is_array($enderecoId)) {
			$useMinMax = false;
			if (isset($enderecoId['min'])) {
				$this->addUsingAlias(PessoaPeer::ENDERECO_ID, $enderecoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($enderecoId['max'])) {
				$this->addUsingAlias(PessoaPeer::ENDERECO_ID, $enderecoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PessoaPeer::ENDERECO_ID, $enderecoId, $comparison);
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
	 * @return    PessoaQuery The current query, for fluid interface
	 */
	public function filterByAtivo($ativo = null, $comparison = null)
	{
		if (is_string($ativo)) {
			$ativo = in_array(strtolower($ativo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(PessoaPeer::ATIVO, $ativo, $comparison);
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
	 * @return    PessoaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PessoaPeer::NOME, $nome, $comparison);
	}

	/**
	 * Filter the query on the cpf column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCpf('fooValue');   // WHERE cpf = 'fooValue'
	 * $query->filterByCpf('%fooValue%'); // WHERE cpf LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $cpf The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PessoaQuery The current query, for fluid interface
	 */
	public function filterByCpf($cpf = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($cpf)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $cpf)) {
				$cpf = str_replace('*', '%', $cpf);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PessoaPeer::CPF, $cpf, $comparison);
	}

	/**
	 * Filter the query on the celular column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCelular('fooValue');   // WHERE celular = 'fooValue'
	 * $query->filterByCelular('%fooValue%'); // WHERE celular LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $celular The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PessoaQuery The current query, for fluid interface
	 */
	public function filterByCelular($celular = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($celular)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $celular)) {
				$celular = str_replace('*', '%', $celular);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PessoaPeer::CELULAR, $celular, $comparison);
	}

	/**
	 * Filter the query on the telefone column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTelefone('fooValue');   // WHERE telefone = 'fooValue'
	 * $query->filterByTelefone('%fooValue%'); // WHERE telefone LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $telefone The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PessoaQuery The current query, for fluid interface
	 */
	public function filterByTelefone($telefone = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($telefone)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $telefone)) {
				$telefone = str_replace('*', '%', $telefone);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PessoaPeer::TELEFONE, $telefone, $comparison);
	}

	/**
	 * Filter the query on the email column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
	 * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $email The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PessoaQuery The current query, for fluid interface
	 */
	public function filterByEmail($email = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($email)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $email)) {
				$email = str_replace('*', '%', $email);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PessoaPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query by a related Endereco object
	 *
	 * @param     Endereco|PropelCollection $endereco The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PessoaQuery The current query, for fluid interface
	 */
	public function filterByEndereco($endereco, $comparison = null)
	{
		if ($endereco instanceof Endereco) {
			return $this
				->addUsingAlias(PessoaPeer::ENDERECO_ID, $endereco->getId(), $comparison);
		} elseif ($endereco instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(PessoaPeer::ENDERECO_ID, $endereco->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByEndereco() only accepts arguments of type Endereco or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Endereco relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PessoaQuery The current query, for fluid interface
	 */
	public function joinEndereco($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Endereco');

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
			$this->addJoinObject($join, 'Endereco');
		}

		return $this;
	}

	/**
	 * Use the Endereco relation Endereco object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EnderecoQuery A secondary query class using the current class as primary query
	 */
	public function useEnderecoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinEndereco($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Endereco', 'EnderecoQuery');
	}

	/**
	 * Filter the query by a related Comunicado object
	 *
	 * @param     Comunicado $comunicado  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PessoaQuery The current query, for fluid interface
	 */
	public function filterByComunicadoRelatedBySeguradoId($comunicado, $comparison = null)
	{
		if ($comunicado instanceof Comunicado) {
			return $this
				->addUsingAlias(PessoaPeer::ID, $comunicado->getSeguradoId(), $comparison);
		} elseif ($comunicado instanceof PropelCollection) {
			return $this
				->useComunicadoRelatedBySeguradoIdQuery()
				->filterByPrimaryKeys($comunicado->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByComunicadoRelatedBySeguradoId() only accepts arguments of type Comunicado or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ComunicadoRelatedBySeguradoId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PessoaQuery The current query, for fluid interface
	 */
	public function joinComunicadoRelatedBySeguradoId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ComunicadoRelatedBySeguradoId');

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
			$this->addJoinObject($join, 'ComunicadoRelatedBySeguradoId');
		}

		return $this;
	}

	/**
	 * Use the ComunicadoRelatedBySeguradoId relation Comunicado object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ComunicadoQuery A secondary query class using the current class as primary query
	 */
	public function useComunicadoRelatedBySeguradoIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinComunicadoRelatedBySeguradoId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ComunicadoRelatedBySeguradoId', 'ComunicadoQuery');
	}

	/**
	 * Filter the query by a related Comunicado object
	 *
	 * @param     Comunicado $comunicado  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PessoaQuery The current query, for fluid interface
	 */
	public function filterByComunicadoRelatedByComunicanteId($comunicado, $comparison = null)
	{
		if ($comunicado instanceof Comunicado) {
			return $this
				->addUsingAlias(PessoaPeer::ID, $comunicado->getComunicanteId(), $comparison);
		} elseif ($comunicado instanceof PropelCollection) {
			return $this
				->useComunicadoRelatedByComunicanteIdQuery()
				->filterByPrimaryKeys($comunicado->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByComunicadoRelatedByComunicanteId() only accepts arguments of type Comunicado or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the ComunicadoRelatedByComunicanteId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PessoaQuery The current query, for fluid interface
	 */
	public function joinComunicadoRelatedByComunicanteId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('ComunicadoRelatedByComunicanteId');

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
			$this->addJoinObject($join, 'ComunicadoRelatedByComunicanteId');
		}

		return $this;
	}

	/**
	 * Use the ComunicadoRelatedByComunicanteId relation Comunicado object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ComunicadoQuery A secondary query class using the current class as primary query
	 */
	public function useComunicadoRelatedByComunicanteIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinComunicadoRelatedByComunicanteId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'ComunicadoRelatedByComunicanteId', 'ComunicadoQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Pessoa $pessoa Object to remove from the list of results
	 *
	 * @return    PessoaQuery The current query, for fluid interface
	 */
	public function prune($pessoa = null)
	{
		if ($pessoa) {
			$this->addUsingAlias(PessoaPeer::ID, $pessoa->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BasePessoaQuery