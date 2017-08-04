<?php


/**
 * Base class that represents a query for the 'usuario' table.
 *
 * 
 *
 * @method     UsuarioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     UsuarioQuery orderByPerfilId($order = Criteria::ASC) Order by the perfil_id column
 * @method     UsuarioQuery orderByEnderecoId($order = Criteria::ASC) Order by the endereco_id column
 * @method     UsuarioQuery orderByCargoId($order = Criteria::ASC) Order by the cargo_id column
 * @method     UsuarioQuery orderByDepartamentoId($order = Criteria::ASC) Order by the departamento_id column
 * @method     UsuarioQuery orderByMatricula($order = Criteria::ASC) Order by the matricula column
 * @method     UsuarioQuery orderByNome($order = Criteria::ASC) Order by the nome column
 * @method     UsuarioQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     UsuarioQuery orderByDni($order = Criteria::ASC) Order by the dni column
 * @method     UsuarioQuery orderByDataNascimento($order = Criteria::ASC) Order by the data_nascimento column
 * @method     UsuarioQuery orderByDataContratacao($order = Criteria::ASC) Order by the data_contratacao column
 * @method     UsuarioQuery orderByCelular($order = Criteria::ASC) Order by the celular column
 * @method     UsuarioQuery orderByTelefone($order = Criteria::ASC) Order by the telefone column
 * @method     UsuarioQuery orderByToken($order = Criteria::ASC) Order by the token column
 * @method     UsuarioQuery orderByUsuario($order = Criteria::ASC) Order by the usuario column
 * @method     UsuarioQuery orderBySenha($order = Criteria::ASC) Order by the senha column
 * @method     UsuarioQuery orderByTokenSenha($order = Criteria::ASC) Order by the token_senha column
 * @method     UsuarioQuery orderByTokenFirebase($order = Criteria::ASC) Order by the token_firebase column
 * @method     UsuarioQuery orderByDataRescisao($order = Criteria::ASC) Order by the data_rescisao column
 * @method     UsuarioQuery orderByAtivo($order = Criteria::ASC) Order by the ativo column
 * @method     UsuarioQuery orderByTipoAcesso($order = Criteria::ASC) Order by the tipo_acesso column
 * @method     UsuarioQuery orderByEstadoCivil($order = Criteria::ASC) Order by the estado_civil column
 * @method     UsuarioQuery orderByNivelAcesso($order = Criteria::ASC) Order by the nivel_acesso column
 * @method     UsuarioQuery orderByUsuarioValidado($order = Criteria::ASC) Order by the usuario_validado column
 *
 * @method     UsuarioQuery groupById() Group by the id column
 * @method     UsuarioQuery groupByPerfilId() Group by the perfil_id column
 * @method     UsuarioQuery groupByEnderecoId() Group by the endereco_id column
 * @method     UsuarioQuery groupByCargoId() Group by the cargo_id column
 * @method     UsuarioQuery groupByDepartamentoId() Group by the departamento_id column
 * @method     UsuarioQuery groupByMatricula() Group by the matricula column
 * @method     UsuarioQuery groupByNome() Group by the nome column
 * @method     UsuarioQuery groupByEmail() Group by the email column
 * @method     UsuarioQuery groupByDni() Group by the dni column
 * @method     UsuarioQuery groupByDataNascimento() Group by the data_nascimento column
 * @method     UsuarioQuery groupByDataContratacao() Group by the data_contratacao column
 * @method     UsuarioQuery groupByCelular() Group by the celular column
 * @method     UsuarioQuery groupByTelefone() Group by the telefone column
 * @method     UsuarioQuery groupByToken() Group by the token column
 * @method     UsuarioQuery groupByUsuario() Group by the usuario column
 * @method     UsuarioQuery groupBySenha() Group by the senha column
 * @method     UsuarioQuery groupByTokenSenha() Group by the token_senha column
 * @method     UsuarioQuery groupByTokenFirebase() Group by the token_firebase column
 * @method     UsuarioQuery groupByDataRescisao() Group by the data_rescisao column
 * @method     UsuarioQuery groupByAtivo() Group by the ativo column
 * @method     UsuarioQuery groupByTipoAcesso() Group by the tipo_acesso column
 * @method     UsuarioQuery groupByEstadoCivil() Group by the estado_civil column
 * @method     UsuarioQuery groupByNivelAcesso() Group by the nivel_acesso column
 * @method     UsuarioQuery groupByUsuarioValidado() Group by the usuario_validado column
 *
 * @method     UsuarioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     UsuarioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     UsuarioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     UsuarioQuery leftJoinCargo($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cargo relation
 * @method     UsuarioQuery rightJoinCargo($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cargo relation
 * @method     UsuarioQuery innerJoinCargo($relationAlias = null) Adds a INNER JOIN clause to the query using the Cargo relation
 *
 * @method     UsuarioQuery leftJoinDepartamento($relationAlias = null) Adds a LEFT JOIN clause to the query using the Departamento relation
 * @method     UsuarioQuery rightJoinDepartamento($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Departamento relation
 * @method     UsuarioQuery innerJoinDepartamento($relationAlias = null) Adds a INNER JOIN clause to the query using the Departamento relation
 *
 * @method     UsuarioQuery leftJoinEndereco($relationAlias = null) Adds a LEFT JOIN clause to the query using the Endereco relation
 * @method     UsuarioQuery rightJoinEndereco($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Endereco relation
 * @method     UsuarioQuery innerJoinEndereco($relationAlias = null) Adds a INNER JOIN clause to the query using the Endereco relation
 *
 * @method     UsuarioQuery leftJoinPerfil($relationAlias = null) Adds a LEFT JOIN clause to the query using the Perfil relation
 * @method     UsuarioQuery rightJoinPerfil($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Perfil relation
 * @method     UsuarioQuery innerJoinPerfil($relationAlias = null) Adds a INNER JOIN clause to the query using the Perfil relation
 *
 * @method     UsuarioQuery leftJoinAuditoria($relationAlias = null) Adds a LEFT JOIN clause to the query using the Auditoria relation
 * @method     UsuarioQuery rightJoinAuditoria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Auditoria relation
 * @method     UsuarioQuery innerJoinAuditoria($relationAlias = null) Adds a INNER JOIN clause to the query using the Auditoria relation
 *
 * @method     UsuarioQuery leftJoinAvaliacaoRespostaForum($relationAlias = null) Adds a LEFT JOIN clause to the query using the AvaliacaoRespostaForum relation
 * @method     UsuarioQuery rightJoinAvaliacaoRespostaForum($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AvaliacaoRespostaForum relation
 * @method     UsuarioQuery innerJoinAvaliacaoRespostaForum($relationAlias = null) Adds a INNER JOIN clause to the query using the AvaliacaoRespostaForum relation
 *
 * @method     UsuarioQuery leftJoinColetaPesquisa($relationAlias = null) Adds a LEFT JOIN clause to the query using the ColetaPesquisa relation
 * @method     UsuarioQuery rightJoinColetaPesquisa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ColetaPesquisa relation
 * @method     UsuarioQuery innerJoinColetaPesquisa($relationAlias = null) Adds a INNER JOIN clause to the query using the ColetaPesquisa relation
 *
 * @method     UsuarioQuery leftJoinComentarioNoticia($relationAlias = null) Adds a LEFT JOIN clause to the query using the ComentarioNoticia relation
 * @method     UsuarioQuery rightJoinComentarioNoticia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ComentarioNoticia relation
 * @method     UsuarioQuery innerJoinComentarioNoticia($relationAlias = null) Adds a INNER JOIN clause to the query using the ComentarioNoticia relation
 *
 * @method     UsuarioQuery leftJoinCurtidaForum($relationAlias = null) Adds a LEFT JOIN clause to the query using the CurtidaForum relation
 * @method     UsuarioQuery rightJoinCurtidaForum($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CurtidaForum relation
 * @method     UsuarioQuery innerJoinCurtidaForum($relationAlias = null) Adds a INNER JOIN clause to the query using the CurtidaForum relation
 *
 * @method     UsuarioQuery leftJoinNoticia($relationAlias = null) Adds a LEFT JOIN clause to the query using the Noticia relation
 * @method     UsuarioQuery rightJoinNoticia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Noticia relation
 * @method     UsuarioQuery innerJoinNoticia($relationAlias = null) Adds a INNER JOIN clause to the query using the Noticia relation
 *
 * @method     UsuarioQuery leftJoinPesquisa($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pesquisa relation
 * @method     UsuarioQuery rightJoinPesquisa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pesquisa relation
 * @method     UsuarioQuery innerJoinPesquisa($relationAlias = null) Adds a INNER JOIN clause to the query using the Pesquisa relation
 *
 * @method     UsuarioQuery leftJoinPesquisaHabilitada($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesquisaHabilitada relation
 * @method     UsuarioQuery rightJoinPesquisaHabilitada($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesquisaHabilitada relation
 * @method     UsuarioQuery innerJoinPesquisaHabilitada($relationAlias = null) Adds a INNER JOIN clause to the query using the PesquisaHabilitada relation
 *
 * @method     UsuarioQuery leftJoinPremio($relationAlias = null) Adds a LEFT JOIN clause to the query using the Premio relation
 * @method     UsuarioQuery rightJoinPremio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Premio relation
 * @method     UsuarioQuery innerJoinPremio($relationAlias = null) Adds a INNER JOIN clause to the query using the Premio relation
 *
 * @method     UsuarioQuery leftJoinRespostaForum($relationAlias = null) Adds a LEFT JOIN clause to the query using the RespostaForum relation
 * @method     UsuarioQuery rightJoinRespostaForum($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RespostaForum relation
 * @method     UsuarioQuery innerJoinRespostaForum($relationAlias = null) Adds a INNER JOIN clause to the query using the RespostaForum relation
 *
 * @method     UsuarioQuery leftJoinSolicitacaoResgateRelatedByAprovadorId($relationAlias = null) Adds a LEFT JOIN clause to the query using the SolicitacaoResgateRelatedByAprovadorId relation
 * @method     UsuarioQuery rightJoinSolicitacaoResgateRelatedByAprovadorId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SolicitacaoResgateRelatedByAprovadorId relation
 * @method     UsuarioQuery innerJoinSolicitacaoResgateRelatedByAprovadorId($relationAlias = null) Adds a INNER JOIN clause to the query using the SolicitacaoResgateRelatedByAprovadorId relation
 *
 * @method     UsuarioQuery leftJoinSolicitacaoResgateRelatedBySolicitanteId($relationAlias = null) Adds a LEFT JOIN clause to the query using the SolicitacaoResgateRelatedBySolicitanteId relation
 * @method     UsuarioQuery rightJoinSolicitacaoResgateRelatedBySolicitanteId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SolicitacaoResgateRelatedBySolicitanteId relation
 * @method     UsuarioQuery innerJoinSolicitacaoResgateRelatedBySolicitanteId($relationAlias = null) Adds a INNER JOIN clause to the query using the SolicitacaoResgateRelatedBySolicitanteId relation
 *
 * @method     Usuario findOne(PropelPDO $con = null) Return the first Usuario matching the query
 * @method     Usuario findOneOrCreate(PropelPDO $con = null) Return the first Usuario matching the query, or a new Usuario object populated from the query conditions when no match is found
 *
 * @method     Usuario findOneById(int $id) Return the first Usuario filtered by the id column
 * @method     Usuario findOneByPerfilId(int $perfil_id) Return the first Usuario filtered by the perfil_id column
 * @method     Usuario findOneByEnderecoId(int $endereco_id) Return the first Usuario filtered by the endereco_id column
 * @method     Usuario findOneByCargoId(int $cargo_id) Return the first Usuario filtered by the cargo_id column
 * @method     Usuario findOneByDepartamentoId(int $departamento_id) Return the first Usuario filtered by the departamento_id column
 * @method     Usuario findOneByMatricula(string $matricula) Return the first Usuario filtered by the matricula column
 * @method     Usuario findOneByNome(string $nome) Return the first Usuario filtered by the nome column
 * @method     Usuario findOneByEmail(string $email) Return the first Usuario filtered by the email column
 * @method     Usuario findOneByDni(string $dni) Return the first Usuario filtered by the dni column
 * @method     Usuario findOneByDataNascimento(string $data_nascimento) Return the first Usuario filtered by the data_nascimento column
 * @method     Usuario findOneByDataContratacao(string $data_contratacao) Return the first Usuario filtered by the data_contratacao column
 * @method     Usuario findOneByCelular(string $celular) Return the first Usuario filtered by the celular column
 * @method     Usuario findOneByTelefone(string $telefone) Return the first Usuario filtered by the telefone column
 * @method     Usuario findOneByToken(string $token) Return the first Usuario filtered by the token column
 * @method     Usuario findOneByUsuario(string $usuario) Return the first Usuario filtered by the usuario column
 * @method     Usuario findOneBySenha(string $senha) Return the first Usuario filtered by the senha column
 * @method     Usuario findOneByTokenSenha(string $token_senha) Return the first Usuario filtered by the token_senha column
 * @method     Usuario findOneByTokenFirebase(string $token_firebase) Return the first Usuario filtered by the token_firebase column
 * @method     Usuario findOneByDataRescisao(string $data_rescisao) Return the first Usuario filtered by the data_rescisao column
 * @method     Usuario findOneByAtivo(boolean $ativo) Return the first Usuario filtered by the ativo column
 * @method     Usuario findOneByTipoAcesso(string $tipo_acesso) Return the first Usuario filtered by the tipo_acesso column
 * @method     Usuario findOneByEstadoCivil(string $estado_civil) Return the first Usuario filtered by the estado_civil column
 * @method     Usuario findOneByNivelAcesso(string $nivel_acesso) Return the first Usuario filtered by the nivel_acesso column
 * @method     Usuario findOneByUsuarioValidado(boolean $usuario_validado) Return the first Usuario filtered by the usuario_validado column
 *
 * @method     array findById(int $id) Return Usuario objects filtered by the id column
 * @method     array findByPerfilId(int $perfil_id) Return Usuario objects filtered by the perfil_id column
 * @method     array findByEnderecoId(int $endereco_id) Return Usuario objects filtered by the endereco_id column
 * @method     array findByCargoId(int $cargo_id) Return Usuario objects filtered by the cargo_id column
 * @method     array findByDepartamentoId(int $departamento_id) Return Usuario objects filtered by the departamento_id column
 * @method     array findByMatricula(string $matricula) Return Usuario objects filtered by the matricula column
 * @method     array findByNome(string $nome) Return Usuario objects filtered by the nome column
 * @method     array findByEmail(string $email) Return Usuario objects filtered by the email column
 * @method     array findByDni(string $dni) Return Usuario objects filtered by the dni column
 * @method     array findByDataNascimento(string $data_nascimento) Return Usuario objects filtered by the data_nascimento column
 * @method     array findByDataContratacao(string $data_contratacao) Return Usuario objects filtered by the data_contratacao column
 * @method     array findByCelular(string $celular) Return Usuario objects filtered by the celular column
 * @method     array findByTelefone(string $telefone) Return Usuario objects filtered by the telefone column
 * @method     array findByToken(string $token) Return Usuario objects filtered by the token column
 * @method     array findByUsuario(string $usuario) Return Usuario objects filtered by the usuario column
 * @method     array findBySenha(string $senha) Return Usuario objects filtered by the senha column
 * @method     array findByTokenSenha(string $token_senha) Return Usuario objects filtered by the token_senha column
 * @method     array findByTokenFirebase(string $token_firebase) Return Usuario objects filtered by the token_firebase column
 * @method     array findByDataRescisao(string $data_rescisao) Return Usuario objects filtered by the data_rescisao column
 * @method     array findByAtivo(boolean $ativo) Return Usuario objects filtered by the ativo column
 * @method     array findByTipoAcesso(string $tipo_acesso) Return Usuario objects filtered by the tipo_acesso column
 * @method     array findByEstadoCivil(string $estado_civil) Return Usuario objects filtered by the estado_civil column
 * @method     array findByNivelAcesso(string $nivel_acesso) Return Usuario objects filtered by the nivel_acesso column
 * @method     array findByUsuarioValidado(boolean $usuario_validado) Return Usuario objects filtered by the usuario_validado column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseUsuarioQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseUsuarioQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Usuario', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new UsuarioQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    UsuarioQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof UsuarioQuery) {
			return $criteria;
		}
		$query = new UsuarioQuery();
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
	 * @return    Usuario|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = UsuarioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Usuario A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `PERFIL_ID`, `ENDERECO_ID`, `CARGO_ID`, `DEPARTAMENTO_ID`, `MATRICULA`, `NOME`, `EMAIL`, `DNI`, `DATA_NASCIMENTO`, `DATA_CONTRATACAO`, `CELULAR`, `TELEFONE`, `TOKEN`, `USUARIO`, `SENHA`, `TOKEN_SENHA`, `TOKEN_FIREBASE`, `DATA_RESCISAO`, `ATIVO`, `TIPO_ACESSO`, `ESTADO_CIVIL`, `NIVEL_ACESSO`, `USUARIO_VALIDADO` FROM `usuario` WHERE `ID` = :p0';
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
			$obj = new Usuario();
			$obj->hydrate($row);
			UsuarioPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Usuario|array|mixed the result, formatted by the current formatter
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
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(UsuarioPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(UsuarioPeer::ID, $keys, Criteria::IN);
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
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(UsuarioPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the perfil_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPerfilId(1234); // WHERE perfil_id = 1234
	 * $query->filterByPerfilId(array(12, 34)); // WHERE perfil_id IN (12, 34)
	 * $query->filterByPerfilId(array('min' => 12)); // WHERE perfil_id > 12
	 * </code>
	 *
	 * @see       filterByPerfil()
	 *
	 * @param     mixed $perfilId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByPerfilId($perfilId = null, $comparison = null)
	{
		if (is_array($perfilId)) {
			$useMinMax = false;
			if (isset($perfilId['min'])) {
				$this->addUsingAlias(UsuarioPeer::PERFIL_ID, $perfilId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($perfilId['max'])) {
				$this->addUsingAlias(UsuarioPeer::PERFIL_ID, $perfilId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::PERFIL_ID, $perfilId, $comparison);
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
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByEnderecoId($enderecoId = null, $comparison = null)
	{
		if (is_array($enderecoId)) {
			$useMinMax = false;
			if (isset($enderecoId['min'])) {
				$this->addUsingAlias(UsuarioPeer::ENDERECO_ID, $enderecoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($enderecoId['max'])) {
				$this->addUsingAlias(UsuarioPeer::ENDERECO_ID, $enderecoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::ENDERECO_ID, $enderecoId, $comparison);
	}

	/**
	 * Filter the query on the cargo_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCargoId(1234); // WHERE cargo_id = 1234
	 * $query->filterByCargoId(array(12, 34)); // WHERE cargo_id IN (12, 34)
	 * $query->filterByCargoId(array('min' => 12)); // WHERE cargo_id > 12
	 * </code>
	 *
	 * @see       filterByCargo()
	 *
	 * @param     mixed $cargoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByCargoId($cargoId = null, $comparison = null)
	{
		if (is_array($cargoId)) {
			$useMinMax = false;
			if (isset($cargoId['min'])) {
				$this->addUsingAlias(UsuarioPeer::CARGO_ID, $cargoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cargoId['max'])) {
				$this->addUsingAlias(UsuarioPeer::CARGO_ID, $cargoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::CARGO_ID, $cargoId, $comparison);
	}

	/**
	 * Filter the query on the departamento_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDepartamentoId(1234); // WHERE departamento_id = 1234
	 * $query->filterByDepartamentoId(array(12, 34)); // WHERE departamento_id IN (12, 34)
	 * $query->filterByDepartamentoId(array('min' => 12)); // WHERE departamento_id > 12
	 * </code>
	 *
	 * @see       filterByDepartamento()
	 *
	 * @param     mixed $departamentoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByDepartamentoId($departamentoId = null, $comparison = null)
	{
		if (is_array($departamentoId)) {
			$useMinMax = false;
			if (isset($departamentoId['min'])) {
				$this->addUsingAlias(UsuarioPeer::DEPARTAMENTO_ID, $departamentoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($departamentoId['max'])) {
				$this->addUsingAlias(UsuarioPeer::DEPARTAMENTO_ID, $departamentoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::DEPARTAMENTO_ID, $departamentoId, $comparison);
	}

	/**
	 * Filter the query on the matricula column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMatricula('fooValue');   // WHERE matricula = 'fooValue'
	 * $query->filterByMatricula('%fooValue%'); // WHERE matricula LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $matricula The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByMatricula($matricula = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($matricula)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $matricula)) {
				$matricula = str_replace('*', '%', $matricula);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::MATRICULA, $matricula, $comparison);
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
	 * @return    UsuarioQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UsuarioPeer::NOME, $nome, $comparison);
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
	 * @return    UsuarioQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UsuarioPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the dni column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDni('fooValue');   // WHERE dni = 'fooValue'
	 * $query->filterByDni('%fooValue%'); // WHERE dni LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $dni The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByDni($dni = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($dni)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $dni)) {
				$dni = str_replace('*', '%', $dni);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::DNI, $dni, $comparison);
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
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByDataNascimento($dataNascimento = null, $comparison = null)
	{
		if (is_array($dataNascimento)) {
			$useMinMax = false;
			if (isset($dataNascimento['min'])) {
				$this->addUsingAlias(UsuarioPeer::DATA_NASCIMENTO, $dataNascimento['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataNascimento['max'])) {
				$this->addUsingAlias(UsuarioPeer::DATA_NASCIMENTO, $dataNascimento['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::DATA_NASCIMENTO, $dataNascimento, $comparison);
	}

	/**
	 * Filter the query on the data_contratacao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataContratacao('2011-03-14'); // WHERE data_contratacao = '2011-03-14'
	 * $query->filterByDataContratacao('now'); // WHERE data_contratacao = '2011-03-14'
	 * $query->filterByDataContratacao(array('max' => 'yesterday')); // WHERE data_contratacao > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataContratacao The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByDataContratacao($dataContratacao = null, $comparison = null)
	{
		if (is_array($dataContratacao)) {
			$useMinMax = false;
			if (isset($dataContratacao['min'])) {
				$this->addUsingAlias(UsuarioPeer::DATA_CONTRATACAO, $dataContratacao['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataContratacao['max'])) {
				$this->addUsingAlias(UsuarioPeer::DATA_CONTRATACAO, $dataContratacao['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::DATA_CONTRATACAO, $dataContratacao, $comparison);
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
	 * @return    UsuarioQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UsuarioPeer::CELULAR, $celular, $comparison);
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
	 * @return    UsuarioQuery The current query, for fluid interface
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
		return $this->addUsingAlias(UsuarioPeer::TELEFONE, $telefone, $comparison);
	}

	/**
	 * Filter the query on the token column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByToken('fooValue');   // WHERE token = 'fooValue'
	 * $query->filterByToken('%fooValue%'); // WHERE token LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $token The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByToken($token = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($token)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $token)) {
				$token = str_replace('*', '%', $token);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::TOKEN, $token, $comparison);
	}

	/**
	 * Filter the query on the usuario column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUsuario('fooValue');   // WHERE usuario = 'fooValue'
	 * $query->filterByUsuario('%fooValue%'); // WHERE usuario LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $usuario The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($usuario)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $usuario)) {
				$usuario = str_replace('*', '%', $usuario);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::USUARIO, $usuario, $comparison);
	}

	/**
	 * Filter the query on the senha column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySenha('fooValue');   // WHERE senha = 'fooValue'
	 * $query->filterBySenha('%fooValue%'); // WHERE senha LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $senha The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterBySenha($senha = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($senha)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $senha)) {
				$senha = str_replace('*', '%', $senha);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::SENHA, $senha, $comparison);
	}

	/**
	 * Filter the query on the token_senha column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTokenSenha('fooValue');   // WHERE token_senha = 'fooValue'
	 * $query->filterByTokenSenha('%fooValue%'); // WHERE token_senha LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $tokenSenha The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByTokenSenha($tokenSenha = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($tokenSenha)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $tokenSenha)) {
				$tokenSenha = str_replace('*', '%', $tokenSenha);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::TOKEN_SENHA, $tokenSenha, $comparison);
	}

	/**
	 * Filter the query on the token_firebase column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTokenFirebase('fooValue');   // WHERE token_firebase = 'fooValue'
	 * $query->filterByTokenFirebase('%fooValue%'); // WHERE token_firebase LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $tokenFirebase The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByTokenFirebase($tokenFirebase = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($tokenFirebase)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $tokenFirebase)) {
				$tokenFirebase = str_replace('*', '%', $tokenFirebase);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::TOKEN_FIREBASE, $tokenFirebase, $comparison);
	}

	/**
	 * Filter the query on the data_rescisao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataRescisao('2011-03-14'); // WHERE data_rescisao = '2011-03-14'
	 * $query->filterByDataRescisao('now'); // WHERE data_rescisao = '2011-03-14'
	 * $query->filterByDataRescisao(array('max' => 'yesterday')); // WHERE data_rescisao > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataRescisao The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByDataRescisao($dataRescisao = null, $comparison = null)
	{
		if (is_array($dataRescisao)) {
			$useMinMax = false;
			if (isset($dataRescisao['min'])) {
				$this->addUsingAlias(UsuarioPeer::DATA_RESCISAO, $dataRescisao['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataRescisao['max'])) {
				$this->addUsingAlias(UsuarioPeer::DATA_RESCISAO, $dataRescisao['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::DATA_RESCISAO, $dataRescisao, $comparison);
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
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByAtivo($ativo = null, $comparison = null)
	{
		if (is_string($ativo)) {
			$ativo = in_array(strtolower($ativo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(UsuarioPeer::ATIVO, $ativo, $comparison);
	}

	/**
	 * Filter the query on the tipo_acesso column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTipoAcesso('fooValue');   // WHERE tipo_acesso = 'fooValue'
	 * $query->filterByTipoAcesso('%fooValue%'); // WHERE tipo_acesso LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $tipoAcesso The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByTipoAcesso($tipoAcesso = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($tipoAcesso)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $tipoAcesso)) {
				$tipoAcesso = str_replace('*', '%', $tipoAcesso);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::TIPO_ACESSO, $tipoAcesso, $comparison);
	}

	/**
	 * Filter the query on the estado_civil column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEstadoCivil('fooValue');   // WHERE estado_civil = 'fooValue'
	 * $query->filterByEstadoCivil('%fooValue%'); // WHERE estado_civil LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $estadoCivil The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByEstadoCivil($estadoCivil = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($estadoCivil)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $estadoCivil)) {
				$estadoCivil = str_replace('*', '%', $estadoCivil);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::ESTADO_CIVIL, $estadoCivil, $comparison);
	}

	/**
	 * Filter the query on the nivel_acesso column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNivelAcesso('fooValue');   // WHERE nivel_acesso = 'fooValue'
	 * $query->filterByNivelAcesso('%fooValue%'); // WHERE nivel_acesso LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nivelAcesso The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByNivelAcesso($nivelAcesso = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nivelAcesso)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nivelAcesso)) {
				$nivelAcesso = str_replace('*', '%', $nivelAcesso);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(UsuarioPeer::NIVEL_ACESSO, $nivelAcesso, $comparison);
	}

	/**
	 * Filter the query on the usuario_validado column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUsuarioValidado(true); // WHERE usuario_validado = true
	 * $query->filterByUsuarioValidado('yes'); // WHERE usuario_validado = true
	 * </code>
	 *
	 * @param     boolean|string $usuarioValidado The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByUsuarioValidado($usuarioValidado = null, $comparison = null)
	{
		if (is_string($usuarioValidado)) {
			$usuario_validado = in_array(strtolower($usuarioValidado), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(UsuarioPeer::USUARIO_VALIDADO, $usuarioValidado, $comparison);
	}

	/**
	 * Filter the query by a related Cargo object
	 *
	 * @param     Cargo|PropelCollection $cargo The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByCargo($cargo, $comparison = null)
	{
		if ($cargo instanceof Cargo) {
			return $this
				->addUsingAlias(UsuarioPeer::CARGO_ID, $cargo->getId(), $comparison);
		} elseif ($cargo instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(UsuarioPeer::CARGO_ID, $cargo->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByCargo() only accepts arguments of type Cargo or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Cargo relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function joinCargo($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Cargo');

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
			$this->addJoinObject($join, 'Cargo');
		}

		return $this;
	}

	/**
	 * Use the Cargo relation Cargo object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CargoQuery A secondary query class using the current class as primary query
	 */
	public function useCargoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCargo($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Cargo', 'CargoQuery');
	}

	/**
	 * Filter the query by a related Departamento object
	 *
	 * @param     Departamento|PropelCollection $departamento The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByDepartamento($departamento, $comparison = null)
	{
		if ($departamento instanceof Departamento) {
			return $this
				->addUsingAlias(UsuarioPeer::DEPARTAMENTO_ID, $departamento->getId(), $comparison);
		} elseif ($departamento instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(UsuarioPeer::DEPARTAMENTO_ID, $departamento->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByDepartamento() only accepts arguments of type Departamento or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Departamento relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function joinDepartamento($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Departamento');

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
			$this->addJoinObject($join, 'Departamento');
		}

		return $this;
	}

	/**
	 * Use the Departamento relation Departamento object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    DepartamentoQuery A secondary query class using the current class as primary query
	 */
	public function useDepartamentoQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinDepartamento($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Departamento', 'DepartamentoQuery');
	}

	/**
	 * Filter the query by a related Endereco object
	 *
	 * @param     Endereco|PropelCollection $endereco The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByEndereco($endereco, $comparison = null)
	{
		if ($endereco instanceof Endereco) {
			return $this
				->addUsingAlias(UsuarioPeer::ENDERECO_ID, $endereco->getId(), $comparison);
		} elseif ($endereco instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(UsuarioPeer::ENDERECO_ID, $endereco->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    UsuarioQuery The current query, for fluid interface
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
	 * Filter the query by a related Perfil object
	 *
	 * @param     Perfil|PropelCollection $perfil The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByPerfil($perfil, $comparison = null)
	{
		if ($perfil instanceof Perfil) {
			return $this
				->addUsingAlias(UsuarioPeer::PERFIL_ID, $perfil->getId(), $comparison);
		} elseif ($perfil instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(UsuarioPeer::PERFIL_ID, $perfil->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByPerfil() only accepts arguments of type Perfil or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Perfil relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function joinPerfil($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Perfil');

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
			$this->addJoinObject($join, 'Perfil');
		}

		return $this;
	}

	/**
	 * Use the Perfil relation Perfil object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PerfilQuery A secondary query class using the current class as primary query
	 */
	public function usePerfilQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPerfil($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Perfil', 'PerfilQuery');
	}

	/**
	 * Filter the query by a related Auditoria object
	 *
	 * @param     Auditoria $auditoria  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByAuditoria($auditoria, $comparison = null)
	{
		if ($auditoria instanceof Auditoria) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $auditoria->getUsuarioId(), $comparison);
		} elseif ($auditoria instanceof PropelCollection) {
			return $this
				->useAuditoriaQuery()
				->filterByPrimaryKeys($auditoria->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAuditoria() only accepts arguments of type Auditoria or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Auditoria relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function joinAuditoria($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Auditoria');

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
			$this->addJoinObject($join, 'Auditoria');
		}

		return $this;
	}

	/**
	 * Use the Auditoria relation Auditoria object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AuditoriaQuery A secondary query class using the current class as primary query
	 */
	public function useAuditoriaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAuditoria($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Auditoria', 'AuditoriaQuery');
	}

	/**
	 * Filter the query by a related AvaliacaoRespostaForum object
	 *
	 * @param     AvaliacaoRespostaForum $avaliacaoRespostaForum  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByAvaliacaoRespostaForum($avaliacaoRespostaForum, $comparison = null)
	{
		if ($avaliacaoRespostaForum instanceof AvaliacaoRespostaForum) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $avaliacaoRespostaForum->getUsuarioId(), $comparison);
		} elseif ($avaliacaoRespostaForum instanceof PropelCollection) {
			return $this
				->useAvaliacaoRespostaForumQuery()
				->filterByPrimaryKeys($avaliacaoRespostaForum->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAvaliacaoRespostaForum() only accepts arguments of type AvaliacaoRespostaForum or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AvaliacaoRespostaForum relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function joinAvaliacaoRespostaForum($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AvaliacaoRespostaForum');

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
			$this->addJoinObject($join, 'AvaliacaoRespostaForum');
		}

		return $this;
	}

	/**
	 * Use the AvaliacaoRespostaForum relation AvaliacaoRespostaForum object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AvaliacaoRespostaForumQuery A secondary query class using the current class as primary query
	 */
	public function useAvaliacaoRespostaForumQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAvaliacaoRespostaForum($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AvaliacaoRespostaForum', 'AvaliacaoRespostaForumQuery');
	}

	/**
	 * Filter the query by a related ColetaPesquisa object
	 *
	 * @param     ColetaPesquisa $coletaPesquisa  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByColetaPesquisa($coletaPesquisa, $comparison = null)
	{
		if ($coletaPesquisa instanceof ColetaPesquisa) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $coletaPesquisa->getUsuarioId(), $comparison);
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
	 * @return    UsuarioQuery The current query, for fluid interface
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
	 * Filter the query by a related ComentarioNoticia object
	 *
	 * @param     ComentarioNoticia $comentarioNoticia  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByComentarioNoticia($comentarioNoticia, $comparison = null)
	{
		if ($comentarioNoticia instanceof ComentarioNoticia) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $comentarioNoticia->getUsuarioId(), $comparison);
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
	 * @return    UsuarioQuery The current query, for fluid interface
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
	 * Filter the query by a related CurtidaForum object
	 *
	 * @param     CurtidaForum $curtidaForum  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByCurtidaForum($curtidaForum, $comparison = null)
	{
		if ($curtidaForum instanceof CurtidaForum) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $curtidaForum->getUsuarioId(), $comparison);
		} elseif ($curtidaForum instanceof PropelCollection) {
			return $this
				->useCurtidaForumQuery()
				->filterByPrimaryKeys($curtidaForum->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByCurtidaForum() only accepts arguments of type CurtidaForum or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the CurtidaForum relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function joinCurtidaForum($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('CurtidaForum');

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
			$this->addJoinObject($join, 'CurtidaForum');
		}

		return $this;
	}

	/**
	 * Use the CurtidaForum relation CurtidaForum object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CurtidaForumQuery A secondary query class using the current class as primary query
	 */
	public function useCurtidaForumQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinCurtidaForum($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'CurtidaForum', 'CurtidaForumQuery');
	}

	/**
	 * Filter the query by a related Noticia object
	 *
	 * @param     Noticia $noticia  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByNoticia($noticia, $comparison = null)
	{
		if ($noticia instanceof Noticia) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $noticia->getUsuarioId(), $comparison);
		} elseif ($noticia instanceof PropelCollection) {
			return $this
				->useNoticiaQuery()
				->filterByPrimaryKeys($noticia->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByNoticia() only accepts arguments of type Noticia or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Noticia relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function joinNoticia($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Noticia');

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
			$this->addJoinObject($join, 'Noticia');
		}

		return $this;
	}

	/**
	 * Use the Noticia relation Noticia object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NoticiaQuery A secondary query class using the current class as primary query
	 */
	public function useNoticiaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinNoticia($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Noticia', 'NoticiaQuery');
	}

	/**
	 * Filter the query by a related Pesquisa object
	 *
	 * @param     Pesquisa $pesquisa  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByPesquisa($pesquisa, $comparison = null)
	{
		if ($pesquisa instanceof Pesquisa) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $pesquisa->getCriadorId(), $comparison);
		} elseif ($pesquisa instanceof PropelCollection) {
			return $this
				->usePesquisaQuery()
				->filterByPrimaryKeys($pesquisa->getPrimaryKeys())
				->endUse();
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
	 * @return    UsuarioQuery The current query, for fluid interface
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
	 * Filter the query by a related PesquisaHabilitada object
	 *
	 * @param     PesquisaHabilitada $pesquisaHabilitada  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByPesquisaHabilitada($pesquisaHabilitada, $comparison = null)
	{
		if ($pesquisaHabilitada instanceof PesquisaHabilitada) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $pesquisaHabilitada->getUsuarioId(), $comparison);
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
	 * @return    UsuarioQuery The current query, for fluid interface
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
	 * Filter the query by a related Premio object
	 *
	 * @param     Premio $premio  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByPremio($premio, $comparison = null)
	{
		if ($premio instanceof Premio) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $premio->getUsuarioId(), $comparison);
		} elseif ($premio instanceof PropelCollection) {
			return $this
				->usePremioQuery()
				->filterByPrimaryKeys($premio->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByPremio() only accepts arguments of type Premio or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Premio relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function joinPremio($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Premio');

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
			$this->addJoinObject($join, 'Premio');
		}

		return $this;
	}

	/**
	 * Use the Premio relation Premio object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PremioQuery A secondary query class using the current class as primary query
	 */
	public function usePremioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPremio($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Premio', 'PremioQuery');
	}

	/**
	 * Filter the query by a related RespostaForum object
	 *
	 * @param     RespostaForum $respostaForum  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterByRespostaForum($respostaForum, $comparison = null)
	{
		if ($respostaForum instanceof RespostaForum) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $respostaForum->getUsuarioId(), $comparison);
		} elseif ($respostaForum instanceof PropelCollection) {
			return $this
				->useRespostaForumQuery()
				->filterByPrimaryKeys($respostaForum->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByRespostaForum() only accepts arguments of type RespostaForum or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the RespostaForum relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function joinRespostaForum($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('RespostaForum');

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
			$this->addJoinObject($join, 'RespostaForum');
		}

		return $this;
	}

	/**
	 * Use the RespostaForum relation RespostaForum object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RespostaForumQuery A secondary query class using the current class as primary query
	 */
	public function useRespostaForumQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinRespostaForum($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'RespostaForum', 'RespostaForumQuery');
	}

	/**
	 * Filter the query by a related SolicitacaoResgate object
	 *
	 * @param     SolicitacaoResgate $solicitacaoResgate  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterBySolicitacaoResgateRelatedByAprovadorId($solicitacaoResgate, $comparison = null)
	{
		if ($solicitacaoResgate instanceof SolicitacaoResgate) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $solicitacaoResgate->getAprovadorId(), $comparison);
		} elseif ($solicitacaoResgate instanceof PropelCollection) {
			return $this
				->useSolicitacaoResgateRelatedByAprovadorIdQuery()
				->filterByPrimaryKeys($solicitacaoResgate->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySolicitacaoResgateRelatedByAprovadorId() only accepts arguments of type SolicitacaoResgate or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SolicitacaoResgateRelatedByAprovadorId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function joinSolicitacaoResgateRelatedByAprovadorId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SolicitacaoResgateRelatedByAprovadorId');

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
			$this->addJoinObject($join, 'SolicitacaoResgateRelatedByAprovadorId');
		}

		return $this;
	}

	/**
	 * Use the SolicitacaoResgateRelatedByAprovadorId relation SolicitacaoResgate object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SolicitacaoResgateQuery A secondary query class using the current class as primary query
	 */
	public function useSolicitacaoResgateRelatedByAprovadorIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSolicitacaoResgateRelatedByAprovadorId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SolicitacaoResgateRelatedByAprovadorId', 'SolicitacaoResgateQuery');
	}

	/**
	 * Filter the query by a related SolicitacaoResgate object
	 *
	 * @param     SolicitacaoResgate $solicitacaoResgate  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function filterBySolicitacaoResgateRelatedBySolicitanteId($solicitacaoResgate, $comparison = null)
	{
		if ($solicitacaoResgate instanceof SolicitacaoResgate) {
			return $this
				->addUsingAlias(UsuarioPeer::ID, $solicitacaoResgate->getSolicitanteId(), $comparison);
		} elseif ($solicitacaoResgate instanceof PropelCollection) {
			return $this
				->useSolicitacaoResgateRelatedBySolicitanteIdQuery()
				->filterByPrimaryKeys($solicitacaoResgate->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterBySolicitacaoResgateRelatedBySolicitanteId() only accepts arguments of type SolicitacaoResgate or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the SolicitacaoResgateRelatedBySolicitanteId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function joinSolicitacaoResgateRelatedBySolicitanteId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SolicitacaoResgateRelatedBySolicitanteId');

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
			$this->addJoinObject($join, 'SolicitacaoResgateRelatedBySolicitanteId');
		}

		return $this;
	}

	/**
	 * Use the SolicitacaoResgateRelatedBySolicitanteId relation SolicitacaoResgate object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SolicitacaoResgateQuery A secondary query class using the current class as primary query
	 */
	public function useSolicitacaoResgateRelatedBySolicitanteIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSolicitacaoResgateRelatedBySolicitanteId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SolicitacaoResgateRelatedBySolicitanteId', 'SolicitacaoResgateQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Usuario $usuario Object to remove from the list of results
	 *
	 * @return    UsuarioQuery The current query, for fluid interface
	 */
	public function prune($usuario = null)
	{
		if ($usuario) {
			$this->addUsingAlias(UsuarioPeer::ID, $usuario->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseUsuarioQuery