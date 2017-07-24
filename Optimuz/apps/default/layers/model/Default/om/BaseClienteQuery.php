<?php


/**
 * Base class that represents a query for the 'cliente' table.
 *
 * 
 *
 * @method     ClienteQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ClienteQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method     ClienteQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     ClienteQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     ClienteQuery orderByCelular($order = Criteria::ASC) Order by the celular column
 * @method     ClienteQuery orderByTelefone($order = Criteria::ASC) Order by the telefone column
 * @method     ClienteQuery orderByCpf($order = Criteria::ASC) Order by the cpf column
 * @method     ClienteQuery orderByRg($order = Criteria::ASC) Order by the rg column
 * @method     ClienteQuery orderByRgExpedidor($order = Criteria::ASC) Order by the rg_expedidor column
 * @method     ClienteQuery orderByCadastroValido($order = Criteria::ASC) Order by the cadastro_valido column
 * @method     ClienteQuery orderByDataNascimento($order = Criteria::ASC) Order by the data_nascimento column
 * @method     ClienteQuery orderBySexo($order = Criteria::ASC) Order by the sexo column
 * @method     ClienteQuery orderByFacebook($order = Criteria::ASC) Order by the facebook column
 * @method     ClienteQuery orderByInstagram($order = Criteria::ASC) Order by the instagram column
 *
 * @method     ClienteQuery groupById() Group by the id column
 * @method     ClienteQuery groupByUsuarioId() Group by the usuario_id column
 * @method     ClienteQuery groupByNome() Group by the nome column
 * @method     ClienteQuery groupByEmail() Group by the email column
 * @method     ClienteQuery groupByCelular() Group by the celular column
 * @method     ClienteQuery groupByTelefone() Group by the telefone column
 * @method     ClienteQuery groupByCpf() Group by the cpf column
 * @method     ClienteQuery groupByRg() Group by the rg column
 * @method     ClienteQuery groupByRgExpedidor() Group by the rg_expedidor column
 * @method     ClienteQuery groupByCadastroValido() Group by the cadastro_valido column
 * @method     ClienteQuery groupByDataNascimento() Group by the data_nascimento column
 * @method     ClienteQuery groupBySexo() Group by the sexo column
 * @method     ClienteQuery groupByFacebook() Group by the facebook column
 * @method     ClienteQuery groupByInstagram() Group by the instagram column
 *
 * @method     ClienteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ClienteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ClienteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ClienteQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     ClienteQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     ClienteQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     ClienteQuery leftJoinAdvogadoCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the AdvogadoCliente relation
 * @method     ClienteQuery rightJoinAdvogadoCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AdvogadoCliente relation
 * @method     ClienteQuery innerJoinAdvogadoCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the AdvogadoCliente relation
 *
 * @method     ClienteQuery leftJoinCaso($relationAlias = null) Adds a LEFT JOIN clause to the query using the Caso relation
 * @method     ClienteQuery rightJoinCaso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Caso relation
 * @method     ClienteQuery innerJoinCaso($relationAlias = null) Adds a INNER JOIN clause to the query using the Caso relation
 *
 * @method     ClienteQuery leftJoinContrato($relationAlias = null) Adds a LEFT JOIN clause to the query using the Contrato relation
 * @method     ClienteQuery rightJoinContrato($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Contrato relation
 * @method     ClienteQuery innerJoinContrato($relationAlias = null) Adds a INNER JOIN clause to the query using the Contrato relation
 *
 * @method     ClienteQuery leftJoinProcesso($relationAlias = null) Adds a LEFT JOIN clause to the query using the Processo relation
 * @method     ClienteQuery rightJoinProcesso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Processo relation
 * @method     ClienteQuery innerJoinProcesso($relationAlias = null) Adds a INNER JOIN clause to the query using the Processo relation
 *
 * @method     ClienteQuery leftJoinSolicitacao($relationAlias = null) Adds a LEFT JOIN clause to the query using the Solicitacao relation
 * @method     ClienteQuery rightJoinSolicitacao($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Solicitacao relation
 * @method     ClienteQuery innerJoinSolicitacao($relationAlias = null) Adds a INNER JOIN clause to the query using the Solicitacao relation
 *
 * @method     Cliente findOne(PropelPDO $con = null) Return the first Cliente matching the query
 * @method     Cliente findOneOrCreate(PropelPDO $con = null) Return the first Cliente matching the query, or a new Cliente object populated from the query conditions when no match is found
 *
 * @method     Cliente findOneById(int $id) Return the first Cliente filtered by the id column
 * @method     Cliente findOneByUsuarioId(int $usuario_id) Return the first Cliente filtered by the usuario_id column
 * @method     Cliente findOneByNome(string $nome) Return the first Cliente filtered by the nome column
 * @method     Cliente findOneByEmail(string $email) Return the first Cliente filtered by the email column
 * @method     Cliente findOneByCelular(string $celular) Return the first Cliente filtered by the celular column
 * @method     Cliente findOneByTelefone(string $telefone) Return the first Cliente filtered by the telefone column
 * @method     Cliente findOneByCpf(string $cpf) Return the first Cliente filtered by the cpf column
 * @method     Cliente findOneByRg(string $rg) Return the first Cliente filtered by the rg column
 * @method     Cliente findOneByRgExpedidor(string $rg_expedidor) Return the first Cliente filtered by the rg_expedidor column
 * @method     Cliente findOneByCadastroValido(boolean $cadastro_valido) Return the first Cliente filtered by the cadastro_valido column
 * @method     Cliente findOneByDataNascimento(string $data_nascimento) Return the first Cliente filtered by the data_nascimento column
 * @method     Cliente findOneBySexo(string $sexo) Return the first Cliente filtered by the sexo column
 * @method     Cliente findOneByFacebook(string $facebook) Return the first Cliente filtered by the facebook column
 * @method     Cliente findOneByInstagram(string $instagram) Return the first Cliente filtered by the instagram column
 *
 * @method     array findById(int $id) Return Cliente objects filtered by the id column
 * @method     array findByUsuarioId(int $usuario_id) Return Cliente objects filtered by the usuario_id column
 * @method     array findByNome(string $nome) Return Cliente objects filtered by the nome column
 * @method     array findByEmail(string $email) Return Cliente objects filtered by the email column
 * @method     array findByCelular(string $celular) Return Cliente objects filtered by the celular column
 * @method     array findByTelefone(string $telefone) Return Cliente objects filtered by the telefone column
 * @method     array findByCpf(string $cpf) Return Cliente objects filtered by the cpf column
 * @method     array findByRg(string $rg) Return Cliente objects filtered by the rg column
 * @method     array findByRgExpedidor(string $rg_expedidor) Return Cliente objects filtered by the rg_expedidor column
 * @method     array findByCadastroValido(boolean $cadastro_valido) Return Cliente objects filtered by the cadastro_valido column
 * @method     array findByDataNascimento(string $data_nascimento) Return Cliente objects filtered by the data_nascimento column
 * @method     array findBySexo(string $sexo) Return Cliente objects filtered by the sexo column
 * @method     array findByFacebook(string $facebook) Return Cliente objects filtered by the facebook column
 * @method     array findByInstagram(string $instagram) Return Cliente objects filtered by the instagram column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseClienteQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseClienteQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Cliente', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ClienteQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ClienteQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ClienteQuery) {
			return $criteria;
		}
		$query = new ClienteQuery();
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
	 * @return    Cliente|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = ClientePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(ClientePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Cliente A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `USUARIO_ID`, `NOME`, `EMAIL`, `CELULAR`, `TELEFONE`, `CPF`, `RG`, `RG_EXPEDIDOR`, `CADASTRO_VALIDO`, `DATA_NASCIMENTO`, `SEXO`, `FACEBOOK`, `INSTAGRAM` FROM `cliente` WHERE `ID` = :p0';
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
			$obj = new Cliente();
			$obj->hydrate($row);
			ClientePeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Cliente|array|mixed the result, formatted by the current formatter
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
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ClientePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ClientePeer::ID, $keys, Criteria::IN);
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
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ClientePeer::ID, $id, $comparison);
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
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByUsuarioId($usuarioId = null, $comparison = null)
	{
		if (is_array($usuarioId)) {
			$useMinMax = false;
			if (isset($usuarioId['min'])) {
				$this->addUsingAlias(ClientePeer::USUARIO_ID, $usuarioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($usuarioId['max'])) {
				$this->addUsingAlias(ClientePeer::USUARIO_ID, $usuarioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientePeer::USUARIO_ID, $usuarioId, $comparison);
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
	 * @return    ClienteQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClientePeer::NOME, $nome, $comparison);
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
	 * @return    ClienteQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClientePeer::EMAIL, $email, $comparison);
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
	 * @return    ClienteQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClientePeer::CELULAR, $celular, $comparison);
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
	 * @return    ClienteQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClientePeer::TELEFONE, $telefone, $comparison);
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
	 * @return    ClienteQuery The current query, for fluid interface
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
		return $this->addUsingAlias(ClientePeer::CPF, $cpf, $comparison);
	}

	/**
	 * Filter the query on the rg column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRg('fooValue');   // WHERE rg = 'fooValue'
	 * $query->filterByRg('%fooValue%'); // WHERE rg LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $rg The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByRg($rg = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($rg)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $rg)) {
				$rg = str_replace('*', '%', $rg);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClientePeer::RG, $rg, $comparison);
	}

	/**
	 * Filter the query on the rg_expedidor column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRgExpedidor('fooValue');   // WHERE rg_expedidor = 'fooValue'
	 * $query->filterByRgExpedidor('%fooValue%'); // WHERE rg_expedidor LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $rgExpedidor The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByRgExpedidor($rgExpedidor = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($rgExpedidor)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $rgExpedidor)) {
				$rgExpedidor = str_replace('*', '%', $rgExpedidor);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClientePeer::RG_EXPEDIDOR, $rgExpedidor, $comparison);
	}

	/**
	 * Filter the query on the cadastro_valido column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCadastroValido(true); // WHERE cadastro_valido = true
	 * $query->filterByCadastroValido('yes'); // WHERE cadastro_valido = true
	 * </code>
	 *
	 * @param     boolean|string $cadastroValido The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByCadastroValido($cadastroValido = null, $comparison = null)
	{
		if (is_string($cadastroValido)) {
			$cadastro_valido = in_array(strtolower($cadastroValido), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(ClientePeer::CADASTRO_VALIDO, $cadastroValido, $comparison);
	}

	/**
	 * Filter the query on the data_nascimento column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataNascimento('2011-03-14'); // WHERE data_nascimento = '2011-03-14'
	 * $query->filterByDataNascimento('now'); // WHERE data_nascimento = '2011-03-14'
	 * $query->filterByDataNascimento(array('max' => 'yesterday')); // WHERE data_nascimento > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataNascimento The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByDataNascimento($dataNascimento = null, $comparison = null)
	{
		if (is_array($dataNascimento)) {
			$useMinMax = false;
			if (isset($dataNascimento['min'])) {
				$this->addUsingAlias(ClientePeer::DATA_NASCIMENTO, $dataNascimento['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataNascimento['max'])) {
				$this->addUsingAlias(ClientePeer::DATA_NASCIMENTO, $dataNascimento['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ClientePeer::DATA_NASCIMENTO, $dataNascimento, $comparison);
	}

	/**
	 * Filter the query on the sexo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySexo('fooValue');   // WHERE sexo = 'fooValue'
	 * $query->filterBySexo('%fooValue%'); // WHERE sexo LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $sexo The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterBySexo($sexo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($sexo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $sexo)) {
				$sexo = str_replace('*', '%', $sexo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClientePeer::SEXO, $sexo, $comparison);
	}

	/**
	 * Filter the query on the facebook column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFacebook('fooValue');   // WHERE facebook = 'fooValue'
	 * $query->filterByFacebook('%fooValue%'); // WHERE facebook LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $facebook The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByFacebook($facebook = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($facebook)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $facebook)) {
				$facebook = str_replace('*', '%', $facebook);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClientePeer::FACEBOOK, $facebook, $comparison);
	}

	/**
	 * Filter the query on the instagram column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByInstagram('fooValue');   // WHERE instagram = 'fooValue'
	 * $query->filterByInstagram('%fooValue%'); // WHERE instagram LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $instagram The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByInstagram($instagram = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($instagram)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $instagram)) {
				$instagram = str_replace('*', '%', $instagram);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ClientePeer::INSTAGRAM, $instagram, $comparison);
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(ClientePeer::USUARIO_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(ClientePeer::USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    ClienteQuery The current query, for fluid interface
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
	 * Filter the query by a related AdvogadoCliente object
	 *
	 * @param     AdvogadoCliente $advogadoCliente  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByAdvogadoCliente($advogadoCliente, $comparison = null)
	{
		if ($advogadoCliente instanceof AdvogadoCliente) {
			return $this
				->addUsingAlias(ClientePeer::ID, $advogadoCliente->getClienteId(), $comparison);
		} elseif ($advogadoCliente instanceof PropelCollection) {
			return $this
				->useAdvogadoClienteQuery()
				->filterByPrimaryKeys($advogadoCliente->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAdvogadoCliente() only accepts arguments of type AdvogadoCliente or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AdvogadoCliente relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function joinAdvogadoCliente($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AdvogadoCliente');

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
			$this->addJoinObject($join, 'AdvogadoCliente');
		}

		return $this;
	}

	/**
	 * Use the AdvogadoCliente relation AdvogadoCliente object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdvogadoClienteQuery A secondary query class using the current class as primary query
	 */
	public function useAdvogadoClienteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAdvogadoCliente($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AdvogadoCliente', 'AdvogadoClienteQuery');
	}

	/**
	 * Filter the query by a related Caso object
	 *
	 * @param     Caso $caso  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByCaso($caso, $comparison = null)
	{
		if ($caso instanceof Caso) {
			return $this
				->addUsingAlias(ClientePeer::ID, $caso->getClienteId(), $comparison);
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
	 * @return    ClienteQuery The current query, for fluid interface
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
	 * Filter the query by a related Contrato object
	 *
	 * @param     Contrato $contrato  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByContrato($contrato, $comparison = null)
	{
		if ($contrato instanceof Contrato) {
			return $this
				->addUsingAlias(ClientePeer::ID, $contrato->getClienteId(), $comparison);
		} elseif ($contrato instanceof PropelCollection) {
			return $this
				->useContratoQuery()
				->filterByPrimaryKeys($contrato->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByContrato() only accepts arguments of type Contrato or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Contrato relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function joinContrato($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Contrato');

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
			$this->addJoinObject($join, 'Contrato');
		}

		return $this;
	}

	/**
	 * Use the Contrato relation Contrato object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ContratoQuery A secondary query class using the current class as primary query
	 */
	public function useContratoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinContrato($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Contrato', 'ContratoQuery');
	}

	/**
	 * Filter the query by a related Processo object
	 *
	 * @param     Processo $processo  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByProcesso($processo, $comparison = null)
	{
		if ($processo instanceof Processo) {
			return $this
				->addUsingAlias(ClientePeer::ID, $processo->getClienteId(), $comparison);
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
	 * @return    ClienteQuery The current query, for fluid interface
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
	 * Filter the query by a related Solicitacao object
	 *
	 * @param     Solicitacao $solicitacao  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterBySolicitacao($solicitacao, $comparison = null)
	{
		if ($solicitacao instanceof Solicitacao) {
			return $this
				->addUsingAlias(ClientePeer::ID, $solicitacao->getClienteId(), $comparison);
		} elseif ($solicitacao instanceof PropelCollection) {
			return $this
				->useSolicitacaoQuery()
				->filterByPrimaryKeys($solicitacao->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySolicitacao() only accepts arguments of type Solicitacao or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Solicitacao relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function joinSolicitacao($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Solicitacao');

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
			$this->addJoinObject($join, 'Solicitacao');
		}

		return $this;
	}

	/**
	 * Use the Solicitacao relation Solicitacao object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SolicitacaoQuery A secondary query class using the current class as primary query
	 */
	public function useSolicitacaoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSolicitacao($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Solicitacao', 'SolicitacaoQuery');
	}

	/**
	 * Filter the query by a related Advogado object
	 * using the advogado_cliente table as cross reference
	 *
	 * @param     Advogado $advogado the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function filterByAdvogado($advogado, $comparison = Criteria::EQUAL)
	{
		return $this
			->useAdvogadoClienteQuery()
			->filterByAdvogado($advogado, $comparison)
			->endUse();
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Cliente $cliente Object to remove from the list of results
	 *
	 * @return    ClienteQuery The current query, for fluid interface
	 */
	public function prune($cliente = null)
	{
		if ($cliente) {
			$this->addUsingAlias(ClientePeer::ID, $cliente->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseClienteQuery