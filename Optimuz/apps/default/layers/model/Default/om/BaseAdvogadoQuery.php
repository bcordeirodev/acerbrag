<?php


/**
 * Base class that represents a query for the 'advogado' table.
 *
 * 
 *
 * @method     AdvogadoQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AdvogadoQuery orderByUsuarioId($order = Criteria::ASC) Order by the usuario_id column
 * @method     AdvogadoQuery orderByEnderecoId($order = Criteria::ASC) Order by the endereco_id column
 * @method     AdvogadoQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     AdvogadoQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     AdvogadoQuery orderByTelefone($order = Criteria::ASC) Order by the telefone column
 * @method     AdvogadoQuery orderByCelular($order = Criteria::ASC) Order by the celular column
 * @method     AdvogadoQuery orderByCpf($order = Criteria::ASC) Order by the cpf column
 * @method     AdvogadoQuery orderByRg($order = Criteria::ASC) Order by the rg column
 * @method     AdvogadoQuery orderByRgExpedidor($order = Criteria::ASC) Order by the rg_expedidor column
 * @method     AdvogadoQuery orderByCadastroValido($order = Criteria::ASC) Order by the cadastro_valido column
 * @method     AdvogadoQuery orderByDataNascimento($order = Criteria::ASC) Order by the data_nascimento column
 * @method     AdvogadoQuery orderBySexo($order = Criteria::ASC) Order by the sexo column
 * @method     AdvogadoQuery orderByFacebook($order = Criteria::ASC) Order by the facebook column
 * @method     AdvogadoQuery orderByInstagram($order = Criteria::ASC) Order by the instagram column
 *
 * @method     AdvogadoQuery groupById() Group by the id column
 * @method     AdvogadoQuery groupByUsuarioId() Group by the usuario_id column
 * @method     AdvogadoQuery groupByEnderecoId() Group by the endereco_id column
 * @method     AdvogadoQuery groupByNome() Group by the nome column
 * @method     AdvogadoQuery groupByEmail() Group by the email column
 * @method     AdvogadoQuery groupByTelefone() Group by the telefone column
 * @method     AdvogadoQuery groupByCelular() Group by the celular column
 * @method     AdvogadoQuery groupByCpf() Group by the cpf column
 * @method     AdvogadoQuery groupByRg() Group by the rg column
 * @method     AdvogadoQuery groupByRgExpedidor() Group by the rg_expedidor column
 * @method     AdvogadoQuery groupByCadastroValido() Group by the cadastro_valido column
 * @method     AdvogadoQuery groupByDataNascimento() Group by the data_nascimento column
 * @method     AdvogadoQuery groupBySexo() Group by the sexo column
 * @method     AdvogadoQuery groupByFacebook() Group by the facebook column
 * @method     AdvogadoQuery groupByInstagram() Group by the instagram column
 *
 * @method     AdvogadoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AdvogadoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AdvogadoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AdvogadoQuery leftJoinEndereco($relationAlias = null) Adds a LEFT JOIN clause to the query using the Endereco relation
 * @method     AdvogadoQuery rightJoinEndereco($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Endereco relation
 * @method     AdvogadoQuery innerJoinEndereco($relationAlias = null) Adds a INNER JOIN clause to the query using the Endereco relation
 *
 * @method     AdvogadoQuery leftJoinUsuario($relationAlias = null) Adds a LEFT JOIN clause to the query using the Usuario relation
 * @method     AdvogadoQuery rightJoinUsuario($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Usuario relation
 * @method     AdvogadoQuery innerJoinUsuario($relationAlias = null) Adds a INNER JOIN clause to the query using the Usuario relation
 *
 * @method     AdvogadoQuery leftJoinAdvogadoAreaAdvocacia($relationAlias = null) Adds a LEFT JOIN clause to the query using the AdvogadoAreaAdvocacia relation
 * @method     AdvogadoQuery rightJoinAdvogadoAreaAdvocacia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AdvogadoAreaAdvocacia relation
 * @method     AdvogadoQuery innerJoinAdvogadoAreaAdvocacia($relationAlias = null) Adds a INNER JOIN clause to the query using the AdvogadoAreaAdvocacia relation
 *
 * @method     AdvogadoQuery leftJoinAdvogadoCliente($relationAlias = null) Adds a LEFT JOIN clause to the query using the AdvogadoCliente relation
 * @method     AdvogadoQuery rightJoinAdvogadoCliente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AdvogadoCliente relation
 * @method     AdvogadoQuery innerJoinAdvogadoCliente($relationAlias = null) Adds a INNER JOIN clause to the query using the AdvogadoCliente relation
 *
 * @method     AdvogadoQuery leftJoinAdvogadoInscricaoOab($relationAlias = null) Adds a LEFT JOIN clause to the query using the AdvogadoInscricaoOab relation
 * @method     AdvogadoQuery rightJoinAdvogadoInscricaoOab($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AdvogadoInscricaoOab relation
 * @method     AdvogadoQuery innerJoinAdvogadoInscricaoOab($relationAlias = null) Adds a INNER JOIN clause to the query using the AdvogadoInscricaoOab relation
 *
 * @method     AdvogadoQuery leftJoinAvaliacaoAdvogado($relationAlias = null) Adds a LEFT JOIN clause to the query using the AvaliacaoAdvogado relation
 * @method     AdvogadoQuery rightJoinAvaliacaoAdvogado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AvaliacaoAdvogado relation
 * @method     AdvogadoQuery innerJoinAvaliacaoAdvogado($relationAlias = null) Adds a INNER JOIN clause to the query using the AvaliacaoAdvogado relation
 *
 * @method     AdvogadoQuery leftJoinCaso($relationAlias = null) Adds a LEFT JOIN clause to the query using the Caso relation
 * @method     AdvogadoQuery rightJoinCaso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Caso relation
 * @method     AdvogadoQuery innerJoinCaso($relationAlias = null) Adds a INNER JOIN clause to the query using the Caso relation
 *
 * @method     AdvogadoQuery leftJoinContrato($relationAlias = null) Adds a LEFT JOIN clause to the query using the Contrato relation
 * @method     AdvogadoQuery rightJoinContrato($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Contrato relation
 * @method     AdvogadoQuery innerJoinContrato($relationAlias = null) Adds a INNER JOIN clause to the query using the Contrato relation
 *
 * @method     AdvogadoQuery leftJoinLocalizacaoAdvogado($relationAlias = null) Adds a LEFT JOIN clause to the query using the LocalizacaoAdvogado relation
 * @method     AdvogadoQuery rightJoinLocalizacaoAdvogado($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LocalizacaoAdvogado relation
 * @method     AdvogadoQuery innerJoinLocalizacaoAdvogado($relationAlias = null) Adds a INNER JOIN clause to the query using the LocalizacaoAdvogado relation
 *
 * @method     AdvogadoQuery leftJoinProcesso($relationAlias = null) Adds a LEFT JOIN clause to the query using the Processo relation
 * @method     AdvogadoQuery rightJoinProcesso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Processo relation
 * @method     AdvogadoQuery innerJoinProcesso($relationAlias = null) Adds a INNER JOIN clause to the query using the Processo relation
 *
 * @method     AdvogadoQuery leftJoinSolicitacao($relationAlias = null) Adds a LEFT JOIN clause to the query using the Solicitacao relation
 * @method     AdvogadoQuery rightJoinSolicitacao($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Solicitacao relation
 * @method     AdvogadoQuery innerJoinSolicitacao($relationAlias = null) Adds a INNER JOIN clause to the query using the Solicitacao relation
 *
 * @method     AdvogadoQuery leftJoinTitulo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Titulo relation
 * @method     AdvogadoQuery rightJoinTitulo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Titulo relation
 * @method     AdvogadoQuery innerJoinTitulo($relationAlias = null) Adds a INNER JOIN clause to the query using the Titulo relation
 *
 * @method     Advogado findOne(PropelPDO $con = null) Return the first Advogado matching the query
 * @method     Advogado findOneOrCreate(PropelPDO $con = null) Return the first Advogado matching the query, or a new Advogado object populated from the query conditions when no match is found
 *
 * @method     Advogado findOneById(int $id) Return the first Advogado filtered by the id column
 * @method     Advogado findOneByUsuarioId(int $usuario_id) Return the first Advogado filtered by the usuario_id column
 * @method     Advogado findOneByEnderecoId(int $endereco_id) Return the first Advogado filtered by the endereco_id column
 * @method     Advogado findOneByNome(string $nome) Return the first Advogado filtered by the nome column
 * @method     Advogado findOneByEmail(string $email) Return the first Advogado filtered by the email column
 * @method     Advogado findOneByTelefone(string $telefone) Return the first Advogado filtered by the telefone column
 * @method     Advogado findOneByCelular(string $celular) Return the first Advogado filtered by the celular column
 * @method     Advogado findOneByCpf(string $cpf) Return the first Advogado filtered by the cpf column
 * @method     Advogado findOneByRg(string $rg) Return the first Advogado filtered by the rg column
 * @method     Advogado findOneByRgExpedidor(string $rg_expedidor) Return the first Advogado filtered by the rg_expedidor column
 * @method     Advogado findOneByCadastroValido(boolean $cadastro_valido) Return the first Advogado filtered by the cadastro_valido column
 * @method     Advogado findOneByDataNascimento(string $data_nascimento) Return the first Advogado filtered by the data_nascimento column
 * @method     Advogado findOneBySexo(string $sexo) Return the first Advogado filtered by the sexo column
 * @method     Advogado findOneByFacebook(string $facebook) Return the first Advogado filtered by the facebook column
 * @method     Advogado findOneByInstagram(string $instagram) Return the first Advogado filtered by the instagram column
 *
 * @method     array findById(int $id) Return Advogado objects filtered by the id column
 * @method     array findByUsuarioId(int $usuario_id) Return Advogado objects filtered by the usuario_id column
 * @method     array findByEnderecoId(int $endereco_id) Return Advogado objects filtered by the endereco_id column
 * @method     array findByNome(string $nome) Return Advogado objects filtered by the nome column
 * @method     array findByEmail(string $email) Return Advogado objects filtered by the email column
 * @method     array findByTelefone(string $telefone) Return Advogado objects filtered by the telefone column
 * @method     array findByCelular(string $celular) Return Advogado objects filtered by the celular column
 * @method     array findByCpf(string $cpf) Return Advogado objects filtered by the cpf column
 * @method     array findByRg(string $rg) Return Advogado objects filtered by the rg column
 * @method     array findByRgExpedidor(string $rg_expedidor) Return Advogado objects filtered by the rg_expedidor column
 * @method     array findByCadastroValido(boolean $cadastro_valido) Return Advogado objects filtered by the cadastro_valido column
 * @method     array findByDataNascimento(string $data_nascimento) Return Advogado objects filtered by the data_nascimento column
 * @method     array findBySexo(string $sexo) Return Advogado objects filtered by the sexo column
 * @method     array findByFacebook(string $facebook) Return Advogado objects filtered by the facebook column
 * @method     array findByInstagram(string $instagram) Return Advogado objects filtered by the instagram column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseAdvogadoQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseAdvogadoQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Advogado', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AdvogadoQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AdvogadoQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AdvogadoQuery) {
			return $criteria;
		}
		$query = new AdvogadoQuery();
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
	 * @return    Advogado|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = AdvogadoPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(AdvogadoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Advogado A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `USUARIO_ID`, `ENDERECO_ID`, `NOME`, `EMAIL`, `TELEFONE`, `CELULAR`, `CPF`, `RG`, `RG_EXPEDIDOR`, `CADASTRO_VALIDO`, `DATA_NASCIMENTO`, `SEXO`, `FACEBOOK`, `INSTAGRAM` FROM `advogado` WHERE `ID` = :p0';
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
			$obj = new Advogado();
			$obj->hydrate($row);
			AdvogadoPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Advogado|array|mixed the result, formatted by the current formatter
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
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AdvogadoPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AdvogadoPeer::ID, $keys, Criteria::IN);
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
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AdvogadoPeer::ID, $id, $comparison);
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
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function filterByUsuarioId($usuarioId = null, $comparison = null)
	{
		if (is_array($usuarioId)) {
			$useMinMax = false;
			if (isset($usuarioId['min'])) {
				$this->addUsingAlias(AdvogadoPeer::USUARIO_ID, $usuarioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($usuarioId['max'])) {
				$this->addUsingAlias(AdvogadoPeer::USUARIO_ID, $usuarioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdvogadoPeer::USUARIO_ID, $usuarioId, $comparison);
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
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function filterByEnderecoId($enderecoId = null, $comparison = null)
	{
		if (is_array($enderecoId)) {
			$useMinMax = false;
			if (isset($enderecoId['min'])) {
				$this->addUsingAlias(AdvogadoPeer::ENDERECO_ID, $enderecoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($enderecoId['max'])) {
				$this->addUsingAlias(AdvogadoPeer::ENDERECO_ID, $enderecoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdvogadoPeer::ENDERECO_ID, $enderecoId, $comparison);
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
	 * @return    AdvogadoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AdvogadoPeer::NOME, $nome, $comparison);
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
	 * @return    AdvogadoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AdvogadoPeer::EMAIL, $email, $comparison);
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
	 * @return    AdvogadoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AdvogadoPeer::TELEFONE, $telefone, $comparison);
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
	 * @return    AdvogadoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AdvogadoPeer::CELULAR, $celular, $comparison);
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
	 * @return    AdvogadoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AdvogadoPeer::CPF, $cpf, $comparison);
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
	 * @return    AdvogadoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AdvogadoPeer::RG, $rg, $comparison);
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
	 * @return    AdvogadoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AdvogadoPeer::RG_EXPEDIDOR, $rgExpedidor, $comparison);
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
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function filterByCadastroValido($cadastroValido = null, $comparison = null)
	{
		if (is_string($cadastroValido)) {
			$cadastro_valido = in_array(strtolower($cadastroValido), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(AdvogadoPeer::CADASTRO_VALIDO, $cadastroValido, $comparison);
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
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function filterByDataNascimento($dataNascimento = null, $comparison = null)
	{
		if (is_array($dataNascimento)) {
			$useMinMax = false;
			if (isset($dataNascimento['min'])) {
				$this->addUsingAlias(AdvogadoPeer::DATA_NASCIMENTO, $dataNascimento['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataNascimento['max'])) {
				$this->addUsingAlias(AdvogadoPeer::DATA_NASCIMENTO, $dataNascimento['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdvogadoPeer::DATA_NASCIMENTO, $dataNascimento, $comparison);
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
	 * @return    AdvogadoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AdvogadoPeer::SEXO, $sexo, $comparison);
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
	 * @return    AdvogadoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AdvogadoPeer::FACEBOOK, $facebook, $comparison);
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
	 * @return    AdvogadoQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AdvogadoPeer::INSTAGRAM, $instagram, $comparison);
	}

	/**
	 * Filter the query by a related Endereco object
	 *
	 * @param     Endereco|PropelCollection $endereco The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function filterByEndereco($endereco, $comparison = null)
	{
		if ($endereco instanceof Endereco) {
			return $this
				->addUsingAlias(AdvogadoPeer::ENDERECO_ID, $endereco->getId(), $comparison);
		} elseif ($endereco instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AdvogadoPeer::ENDERECO_ID, $endereco->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function joinEndereco($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useEnderecoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinEndereco($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Endereco', 'EnderecoQuery');
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(AdvogadoPeer::USUARIO_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(AdvogadoPeer::USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    AdvogadoQuery The current query, for fluid interface
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
	 * Filter the query by a related AdvogadoAreaAdvocacia object
	 *
	 * @param     AdvogadoAreaAdvocacia $advogadoAreaAdvocacia  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function filterByAdvogadoAreaAdvocacia($advogadoAreaAdvocacia, $comparison = null)
	{
		if ($advogadoAreaAdvocacia instanceof AdvogadoAreaAdvocacia) {
			return $this
				->addUsingAlias(AdvogadoPeer::ID, $advogadoAreaAdvocacia->getAdvogadoId(), $comparison);
		} elseif ($advogadoAreaAdvocacia instanceof PropelCollection) {
			return $this
				->useAdvogadoAreaAdvocaciaQuery()
				->filterByPrimaryKeys($advogadoAreaAdvocacia->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAdvogadoAreaAdvocacia() only accepts arguments of type AdvogadoAreaAdvocacia or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AdvogadoAreaAdvocacia relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function joinAdvogadoAreaAdvocacia($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AdvogadoAreaAdvocacia');

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
			$this->addJoinObject($join, 'AdvogadoAreaAdvocacia');
		}

		return $this;
	}

	/**
	 * Use the AdvogadoAreaAdvocacia relation AdvogadoAreaAdvocacia object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdvogadoAreaAdvocaciaQuery A secondary query class using the current class as primary query
	 */
	public function useAdvogadoAreaAdvocaciaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAdvogadoAreaAdvocacia($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AdvogadoAreaAdvocacia', 'AdvogadoAreaAdvocaciaQuery');
	}

	/**
	 * Filter the query by a related AdvogadoCliente object
	 *
	 * @param     AdvogadoCliente $advogadoCliente  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function filterByAdvogadoCliente($advogadoCliente, $comparison = null)
	{
		if ($advogadoCliente instanceof AdvogadoCliente) {
			return $this
				->addUsingAlias(AdvogadoPeer::ID, $advogadoCliente->getAdvogadoId(), $comparison);
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
	 * @return    AdvogadoQuery The current query, for fluid interface
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
	 * Filter the query by a related AdvogadoInscricaoOab object
	 *
	 * @param     AdvogadoInscricaoOab $advogadoInscricaoOab  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function filterByAdvogadoInscricaoOab($advogadoInscricaoOab, $comparison = null)
	{
		if ($advogadoInscricaoOab instanceof AdvogadoInscricaoOab) {
			return $this
				->addUsingAlias(AdvogadoPeer::ID, $advogadoInscricaoOab->getAdvogadoId(), $comparison);
		} elseif ($advogadoInscricaoOab instanceof PropelCollection) {
			return $this
				->useAdvogadoInscricaoOabQuery()
				->filterByPrimaryKeys($advogadoInscricaoOab->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAdvogadoInscricaoOab() only accepts arguments of type AdvogadoInscricaoOab or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AdvogadoInscricaoOab relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function joinAdvogadoInscricaoOab($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AdvogadoInscricaoOab');

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
			$this->addJoinObject($join, 'AdvogadoInscricaoOab');
		}

		return $this;
	}

	/**
	 * Use the AdvogadoInscricaoOab relation AdvogadoInscricaoOab object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdvogadoInscricaoOabQuery A secondary query class using the current class as primary query
	 */
	public function useAdvogadoInscricaoOabQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAdvogadoInscricaoOab($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AdvogadoInscricaoOab', 'AdvogadoInscricaoOabQuery');
	}

	/**
	 * Filter the query by a related AvaliacaoAdvogado object
	 *
	 * @param     AvaliacaoAdvogado $avaliacaoAdvogado  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function filterByAvaliacaoAdvogado($avaliacaoAdvogado, $comparison = null)
	{
		if ($avaliacaoAdvogado instanceof AvaliacaoAdvogado) {
			return $this
				->addUsingAlias(AdvogadoPeer::ID, $avaliacaoAdvogado->getAdvogadoId(), $comparison);
		} elseif ($avaliacaoAdvogado instanceof PropelCollection) {
			return $this
				->useAvaliacaoAdvogadoQuery()
				->filterByPrimaryKeys($avaliacaoAdvogado->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAvaliacaoAdvogado() only accepts arguments of type AvaliacaoAdvogado or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AvaliacaoAdvogado relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function joinAvaliacaoAdvogado($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AvaliacaoAdvogado');

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
			$this->addJoinObject($join, 'AvaliacaoAdvogado');
		}

		return $this;
	}

	/**
	 * Use the AvaliacaoAdvogado relation AvaliacaoAdvogado object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AvaliacaoAdvogadoQuery A secondary query class using the current class as primary query
	 */
	public function useAvaliacaoAdvogadoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAvaliacaoAdvogado($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AvaliacaoAdvogado', 'AvaliacaoAdvogadoQuery');
	}

	/**
	 * Filter the query by a related Caso object
	 *
	 * @param     Caso $caso  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function filterByCaso($caso, $comparison = null)
	{
		if ($caso instanceof Caso) {
			return $this
				->addUsingAlias(AdvogadoPeer::ID, $caso->getAdvogadoId(), $comparison);
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
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function joinCaso($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useCasoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function filterByContrato($contrato, $comparison = null)
	{
		if ($contrato instanceof Contrato) {
			return $this
				->addUsingAlias(AdvogadoPeer::ID, $contrato->getAdvogadoId(), $comparison);
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
	 * @return    AdvogadoQuery The current query, for fluid interface
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
	 * Filter the query by a related LocalizacaoAdvogado object
	 *
	 * @param     LocalizacaoAdvogado $localizacaoAdvogado  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function filterByLocalizacaoAdvogado($localizacaoAdvogado, $comparison = null)
	{
		if ($localizacaoAdvogado instanceof LocalizacaoAdvogado) {
			return $this
				->addUsingAlias(AdvogadoPeer::ID, $localizacaoAdvogado->getAdvogadoId(), $comparison);
		} elseif ($localizacaoAdvogado instanceof PropelCollection) {
			return $this
				->useLocalizacaoAdvogadoQuery()
				->filterByPrimaryKeys($localizacaoAdvogado->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByLocalizacaoAdvogado() only accepts arguments of type LocalizacaoAdvogado or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the LocalizacaoAdvogado relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function joinLocalizacaoAdvogado($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('LocalizacaoAdvogado');

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
			$this->addJoinObject($join, 'LocalizacaoAdvogado');
		}

		return $this;
	}

	/**
	 * Use the LocalizacaoAdvogado relation LocalizacaoAdvogado object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    LocalizacaoAdvogadoQuery A secondary query class using the current class as primary query
	 */
	public function useLocalizacaoAdvogadoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinLocalizacaoAdvogado($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'LocalizacaoAdvogado', 'LocalizacaoAdvogadoQuery');
	}

	/**
	 * Filter the query by a related Processo object
	 *
	 * @param     Processo $processo  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function filterByProcesso($processo, $comparison = null)
	{
		if ($processo instanceof Processo) {
			return $this
				->addUsingAlias(AdvogadoPeer::ID, $processo->getAdvogadoId(), $comparison);
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
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function joinProcesso($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useProcessoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function filterBySolicitacao($solicitacao, $comparison = null)
	{
		if ($solicitacao instanceof Solicitacao) {
			return $this
				->addUsingAlias(AdvogadoPeer::ID, $solicitacao->getAdvogadoId(), $comparison);
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
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function joinSolicitacao($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
	public function useSolicitacaoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSolicitacao($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Solicitacao', 'SolicitacaoQuery');
	}

	/**
	 * Filter the query by a related Titulo object
	 *
	 * @param     Titulo $titulo  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function filterByTitulo($titulo, $comparison = null)
	{
		if ($titulo instanceof Titulo) {
			return $this
				->addUsingAlias(AdvogadoPeer::ID, $titulo->getAdvogadoId(), $comparison);
		} elseif ($titulo instanceof PropelCollection) {
			return $this
				->useTituloQuery()
				->filterByPrimaryKeys($titulo->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByTitulo() only accepts arguments of type Titulo or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Titulo relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function joinTitulo($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Titulo');

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
			$this->addJoinObject($join, 'Titulo');
		}

		return $this;
	}

	/**
	 * Use the Titulo relation Titulo object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TituloQuery A secondary query class using the current class as primary query
	 */
	public function useTituloQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinTitulo($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Titulo', 'TituloQuery');
	}

	/**
	 * Filter the query by a related AreaAdvocacia object
	 * using the advogado_area_advocacia table as cross reference
	 *
	 * @param     AreaAdvocacia $areaAdvocacia the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function filterByAreaAdvocacia($areaAdvocacia, $comparison = Criteria::EQUAL)
	{
		return $this
			->useAdvogadoAreaAdvocaciaQuery()
			->filterByAreaAdvocacia($areaAdvocacia, $comparison)
			->endUse();
	}

	/**
	 * Filter the query by a related Cliente object
	 * using the advogado_cliente table as cross reference
	 *
	 * @param     Cliente $cliente the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function filterByCliente($cliente, $comparison = Criteria::EQUAL)
	{
		return $this
			->useAdvogadoClienteQuery()
			->filterByCliente($cliente, $comparison)
			->endUse();
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Advogado $advogado Object to remove from the list of results
	 *
	 * @return    AdvogadoQuery The current query, for fluid interface
	 */
	public function prune($advogado = null)
	{
		if ($advogado) {
			$this->addUsingAlias(AdvogadoPeer::ID, $advogado->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseAdvogadoQuery