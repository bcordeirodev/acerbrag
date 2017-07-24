<?php


/**
 * Base class that represents a query for the 'membro' table.
 *
 * 
 *
 * @method     MembroQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MembroQuery orderByInstituicaoId($order = Criteria::ASC) Order by the instituicao_id column
 * @method     MembroQuery orderByFilialId($order = Criteria::ASC) Order by the filial_id column
 * @method     MembroQuery orderByCriadorId($order = Criteria::ASC) Order by the criador_id column
 * @method     MembroQuery orderByMembroUsuarioId($order = Criteria::ASC) Order by the membro_usuario_id column
 * @method     MembroQuery orderByUsuarioAprovadorId($order = Criteria::ASC) Order by the usuario_aprovador_id column
 * @method     MembroQuery orderByEnderecoId($order = Criteria::ASC) Order by the endereco_id column
 * @method     MembroQuery orderByCidadeNaturalidadeId($order = Criteria::ASC) Order by the cidade_naturalidade_id column
 * @method     MembroQuery orderByNomeCompleto($order = Criteria::ASC) Order by the nome_completo column
 * @method     MembroQuery orderBySexo($order = Criteria::ASC) Order by the sexo column
 * @method     MembroQuery orderByRg($order = Criteria::ASC) Order by the rg column
 * @method     MembroQuery orderByRgExpedidor($order = Criteria::ASC) Order by the rg_expedidor column
 * @method     MembroQuery orderByCpf($order = Criteria::ASC) Order by the cpf column
 * @method     MembroQuery orderByEstadoCivil($order = Criteria::ASC) Order by the estado_civil column
 * @method     MembroQuery orderByNomeConjunge($order = Criteria::ASC) Order by the nome_conjunge column
 * @method     MembroQuery orderByCristao($order = Criteria::ASC) Order by the cristao column
 * @method     MembroQuery orderByNomePai($order = Criteria::ASC) Order by the nome_pai column
 * @method     MembroQuery orderByNomeMae($order = Criteria::ASC) Order by the nome_mae column
 * @method     MembroQuery orderByTelefoneResidencial($order = Criteria::ASC) Order by the telefone_residencial column
 * @method     MembroQuery orderByTelefoneCelular($order = Criteria::ASC) Order by the telefone_celular column
 * @method     MembroQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     MembroQuery orderByBatizado($order = Criteria::ASC) Order by the batizado column
 * @method     MembroQuery orderByDataMembro($order = Criteria::ASC) Order by the data_membro column
 * @method     MembroQuery orderByIgrejaOrigem($order = Criteria::ASC) Order by the igreja_origem column
 * @method     MembroQuery orderByPastorIgrejaOrigem($order = Criteria::ASC) Order by the pastor_igreja_origem column
 * @method     MembroQuery orderByTelefoneIgrejaOrigem($order = Criteria::ASC) Order by the telefone_igreja_origem column
 * @method     MembroQuery orderByPossuiMinisterio($order = Criteria::ASC) Order by the possui_ministerio column
 * @method     MembroQuery orderByNomeAntigoMinisterio($order = Criteria::ASC) Order by the nome_antigo_ministerio column
 * @method     MembroQuery orderByParticipaPg($order = Criteria::ASC) Order by the participa_pg column
 * @method     MembroQuery orderByNomePg($order = Criteria::ASC) Order by the nome_pg column
 * @method     MembroQuery orderByCargoIgreja($order = Criteria::ASC) Order by the cargo_igreja column
 * @method     MembroQuery orderByExperienciaOutrasIgrejas($order = Criteria::ASC) Order by the experiencia_outras_igrejas column
 * @method     MembroQuery orderByInteresseMinisterios($order = Criteria::ASC) Order by the interesse_ministerios column
 * @method     MembroQuery orderByDataCadastro($order = Criteria::ASC) Order by the data_cadastro column
 * @method     MembroQuery orderByDataNascimento($order = Criteria::ASC) Order by the data_nascimento column
 * @method     MembroQuery orderByProfissao($order = Criteria::ASC) Order by the profissao column
 * @method     MembroQuery orderByAtivo($order = Criteria::ASC) Order by the ativo column
 * @method     MembroQuery orderByCadastroAprovado($order = Criteria::ASC) Order by the cadastro_aprovado column
 *
 * @method     MembroQuery groupById() Group by the id column
 * @method     MembroQuery groupByInstituicaoId() Group by the instituicao_id column
 * @method     MembroQuery groupByFilialId() Group by the filial_id column
 * @method     MembroQuery groupByCriadorId() Group by the criador_id column
 * @method     MembroQuery groupByMembroUsuarioId() Group by the membro_usuario_id column
 * @method     MembroQuery groupByUsuarioAprovadorId() Group by the usuario_aprovador_id column
 * @method     MembroQuery groupByEnderecoId() Group by the endereco_id column
 * @method     MembroQuery groupByCidadeNaturalidadeId() Group by the cidade_naturalidade_id column
 * @method     MembroQuery groupByNomeCompleto() Group by the nome_completo column
 * @method     MembroQuery groupBySexo() Group by the sexo column
 * @method     MembroQuery groupByRg() Group by the rg column
 * @method     MembroQuery groupByRgExpedidor() Group by the rg_expedidor column
 * @method     MembroQuery groupByCpf() Group by the cpf column
 * @method     MembroQuery groupByEstadoCivil() Group by the estado_civil column
 * @method     MembroQuery groupByNomeConjunge() Group by the nome_conjunge column
 * @method     MembroQuery groupByCristao() Group by the cristao column
 * @method     MembroQuery groupByNomePai() Group by the nome_pai column
 * @method     MembroQuery groupByNomeMae() Group by the nome_mae column
 * @method     MembroQuery groupByTelefoneResidencial() Group by the telefone_residencial column
 * @method     MembroQuery groupByTelefoneCelular() Group by the telefone_celular column
 * @method     MembroQuery groupByEmail() Group by the email column
 * @method     MembroQuery groupByBatizado() Group by the batizado column
 * @method     MembroQuery groupByDataMembro() Group by the data_membro column
 * @method     MembroQuery groupByIgrejaOrigem() Group by the igreja_origem column
 * @method     MembroQuery groupByPastorIgrejaOrigem() Group by the pastor_igreja_origem column
 * @method     MembroQuery groupByTelefoneIgrejaOrigem() Group by the telefone_igreja_origem column
 * @method     MembroQuery groupByPossuiMinisterio() Group by the possui_ministerio column
 * @method     MembroQuery groupByNomeAntigoMinisterio() Group by the nome_antigo_ministerio column
 * @method     MembroQuery groupByParticipaPg() Group by the participa_pg column
 * @method     MembroQuery groupByNomePg() Group by the nome_pg column
 * @method     MembroQuery groupByCargoIgreja() Group by the cargo_igreja column
 * @method     MembroQuery groupByExperienciaOutrasIgrejas() Group by the experiencia_outras_igrejas column
 * @method     MembroQuery groupByInteresseMinisterios() Group by the interesse_ministerios column
 * @method     MembroQuery groupByDataCadastro() Group by the data_cadastro column
 * @method     MembroQuery groupByDataNascimento() Group by the data_nascimento column
 * @method     MembroQuery groupByProfissao() Group by the profissao column
 * @method     MembroQuery groupByAtivo() Group by the ativo column
 * @method     MembroQuery groupByCadastroAprovado() Group by the cadastro_aprovado column
 *
 * @method     MembroQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MembroQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MembroQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MembroQuery leftJoinCidade($relationAlias = null) Adds a LEFT JOIN clause to the query using the Cidade relation
 * @method     MembroQuery rightJoinCidade($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Cidade relation
 * @method     MembroQuery innerJoinCidade($relationAlias = null) Adds a INNER JOIN clause to the query using the Cidade relation
 *
 * @method     MembroQuery leftJoinEndereco($relationAlias = null) Adds a LEFT JOIN clause to the query using the Endereco relation
 * @method     MembroQuery rightJoinEndereco($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Endereco relation
 * @method     MembroQuery innerJoinEndereco($relationAlias = null) Adds a INNER JOIN clause to the query using the Endereco relation
 *
 * @method     MembroQuery leftJoinIgrejaRelatedByFilialId($relationAlias = null) Adds a LEFT JOIN clause to the query using the IgrejaRelatedByFilialId relation
 * @method     MembroQuery rightJoinIgrejaRelatedByFilialId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the IgrejaRelatedByFilialId relation
 * @method     MembroQuery innerJoinIgrejaRelatedByFilialId($relationAlias = null) Adds a INNER JOIN clause to the query using the IgrejaRelatedByFilialId relation
 *
 * @method     MembroQuery leftJoinIgrejaRelatedByInstituicaoId($relationAlias = null) Adds a LEFT JOIN clause to the query using the IgrejaRelatedByInstituicaoId relation
 * @method     MembroQuery rightJoinIgrejaRelatedByInstituicaoId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the IgrejaRelatedByInstituicaoId relation
 * @method     MembroQuery innerJoinIgrejaRelatedByInstituicaoId($relationAlias = null) Adds a INNER JOIN clause to the query using the IgrejaRelatedByInstituicaoId relation
 *
 * @method     MembroQuery leftJoinUsuarioRelatedByCriadorId($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioRelatedByCriadorId relation
 * @method     MembroQuery rightJoinUsuarioRelatedByCriadorId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioRelatedByCriadorId relation
 * @method     MembroQuery innerJoinUsuarioRelatedByCriadorId($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioRelatedByCriadorId relation
 *
 * @method     MembroQuery leftJoinUsuarioRelatedByMembroUsuarioId($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioRelatedByMembroUsuarioId relation
 * @method     MembroQuery rightJoinUsuarioRelatedByMembroUsuarioId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioRelatedByMembroUsuarioId relation
 * @method     MembroQuery innerJoinUsuarioRelatedByMembroUsuarioId($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioRelatedByMembroUsuarioId relation
 *
 * @method     MembroQuery leftJoinUsuarioRelatedByUsuarioAprovadorId($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioRelatedByUsuarioAprovadorId relation
 * @method     MembroQuery rightJoinUsuarioRelatedByUsuarioAprovadorId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioRelatedByUsuarioAprovadorId relation
 * @method     MembroQuery innerJoinUsuarioRelatedByUsuarioAprovadorId($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioRelatedByUsuarioAprovadorId relation
 *
 * @method     MembroQuery leftJoinFilhoMembro($relationAlias = null) Adds a LEFT JOIN clause to the query using the FilhoMembro relation
 * @method     MembroQuery rightJoinFilhoMembro($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FilhoMembro relation
 * @method     MembroQuery innerJoinFilhoMembro($relationAlias = null) Adds a INNER JOIN clause to the query using the FilhoMembro relation
 *
 * @method     MembroQuery leftJoinUsuarioRelatedByMembroId($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioRelatedByMembroId relation
 * @method     MembroQuery rightJoinUsuarioRelatedByMembroId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioRelatedByMembroId relation
 * @method     MembroQuery innerJoinUsuarioRelatedByMembroId($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioRelatedByMembroId relation
 *
 * @method     Membro findOne(PropelPDO $con = null) Return the first Membro matching the query
 * @method     Membro findOneOrCreate(PropelPDO $con = null) Return the first Membro matching the query, or a new Membro object populated from the query conditions when no match is found
 *
 * @method     Membro findOneById(int $id) Return the first Membro filtered by the id column
 * @method     Membro findOneByInstituicaoId(int $instituicao_id) Return the first Membro filtered by the instituicao_id column
 * @method     Membro findOneByFilialId(int $filial_id) Return the first Membro filtered by the filial_id column
 * @method     Membro findOneByCriadorId(int $criador_id) Return the first Membro filtered by the criador_id column
 * @method     Membro findOneByMembroUsuarioId(int $membro_usuario_id) Return the first Membro filtered by the membro_usuario_id column
 * @method     Membro findOneByUsuarioAprovadorId(int $usuario_aprovador_id) Return the first Membro filtered by the usuario_aprovador_id column
 * @method     Membro findOneByEnderecoId(int $endereco_id) Return the first Membro filtered by the endereco_id column
 * @method     Membro findOneByCidadeNaturalidadeId(int $cidade_naturalidade_id) Return the first Membro filtered by the cidade_naturalidade_id column
 * @method     Membro findOneByNomeCompleto(string $nome_completo) Return the first Membro filtered by the nome_completo column
 * @method     Membro findOneBySexo(string $sexo) Return the first Membro filtered by the sexo column
 * @method     Membro findOneByRg(string $rg) Return the first Membro filtered by the rg column
 * @method     Membro findOneByRgExpedidor(string $rg_expedidor) Return the first Membro filtered by the rg_expedidor column
 * @method     Membro findOneByCpf(string $cpf) Return the first Membro filtered by the cpf column
 * @method     Membro findOneByEstadoCivil(string $estado_civil) Return the first Membro filtered by the estado_civil column
 * @method     Membro findOneByNomeConjunge(string $nome_conjunge) Return the first Membro filtered by the nome_conjunge column
 * @method     Membro findOneByCristao(boolean $cristao) Return the first Membro filtered by the cristao column
 * @method     Membro findOneByNomePai(string $nome_pai) Return the first Membro filtered by the nome_pai column
 * @method     Membro findOneByNomeMae(string $nome_mae) Return the first Membro filtered by the nome_mae column
 * @method     Membro findOneByTelefoneResidencial(string $telefone_residencial) Return the first Membro filtered by the telefone_residencial column
 * @method     Membro findOneByTelefoneCelular(string $telefone_celular) Return the first Membro filtered by the telefone_celular column
 * @method     Membro findOneByEmail(string $email) Return the first Membro filtered by the email column
 * @method     Membro findOneByBatizado(boolean $batizado) Return the first Membro filtered by the batizado column
 * @method     Membro findOneByDataMembro(string $data_membro) Return the first Membro filtered by the data_membro column
 * @method     Membro findOneByIgrejaOrigem(string $igreja_origem) Return the first Membro filtered by the igreja_origem column
 * @method     Membro findOneByPastorIgrejaOrigem(string $pastor_igreja_origem) Return the first Membro filtered by the pastor_igreja_origem column
 * @method     Membro findOneByTelefoneIgrejaOrigem(string $telefone_igreja_origem) Return the first Membro filtered by the telefone_igreja_origem column
 * @method     Membro findOneByPossuiMinisterio(boolean $possui_ministerio) Return the first Membro filtered by the possui_ministerio column
 * @method     Membro findOneByNomeAntigoMinisterio(string $nome_antigo_ministerio) Return the first Membro filtered by the nome_antigo_ministerio column
 * @method     Membro findOneByParticipaPg(boolean $participa_pg) Return the first Membro filtered by the participa_pg column
 * @method     Membro findOneByNomePg(string $nome_pg) Return the first Membro filtered by the nome_pg column
 * @method     Membro findOneByCargoIgreja(string $cargo_igreja) Return the first Membro filtered by the cargo_igreja column
 * @method     Membro findOneByExperienciaOutrasIgrejas(string $experiencia_outras_igrejas) Return the first Membro filtered by the experiencia_outras_igrejas column
 * @method     Membro findOneByInteresseMinisterios(string $interesse_ministerios) Return the first Membro filtered by the interesse_ministerios column
 * @method     Membro findOneByDataCadastro(string $data_cadastro) Return the first Membro filtered by the data_cadastro column
 * @method     Membro findOneByDataNascimento(string $data_nascimento) Return the first Membro filtered by the data_nascimento column
 * @method     Membro findOneByProfissao(string $profissao) Return the first Membro filtered by the profissao column
 * @method     Membro findOneByAtivo(boolean $ativo) Return the first Membro filtered by the ativo column
 * @method     Membro findOneByCadastroAprovado(boolean $cadastro_aprovado) Return the first Membro filtered by the cadastro_aprovado column
 *
 * @method     array findById(int $id) Return Membro objects filtered by the id column
 * @method     array findByInstituicaoId(int $instituicao_id) Return Membro objects filtered by the instituicao_id column
 * @method     array findByFilialId(int $filial_id) Return Membro objects filtered by the filial_id column
 * @method     array findByCriadorId(int $criador_id) Return Membro objects filtered by the criador_id column
 * @method     array findByMembroUsuarioId(int $membro_usuario_id) Return Membro objects filtered by the membro_usuario_id column
 * @method     array findByUsuarioAprovadorId(int $usuario_aprovador_id) Return Membro objects filtered by the usuario_aprovador_id column
 * @method     array findByEnderecoId(int $endereco_id) Return Membro objects filtered by the endereco_id column
 * @method     array findByCidadeNaturalidadeId(int $cidade_naturalidade_id) Return Membro objects filtered by the cidade_naturalidade_id column
 * @method     array findByNomeCompleto(string $nome_completo) Return Membro objects filtered by the nome_completo column
 * @method     array findBySexo(string $sexo) Return Membro objects filtered by the sexo column
 * @method     array findByRg(string $rg) Return Membro objects filtered by the rg column
 * @method     array findByRgExpedidor(string $rg_expedidor) Return Membro objects filtered by the rg_expedidor column
 * @method     array findByCpf(string $cpf) Return Membro objects filtered by the cpf column
 * @method     array findByEstadoCivil(string $estado_civil) Return Membro objects filtered by the estado_civil column
 * @method     array findByNomeConjunge(string $nome_conjunge) Return Membro objects filtered by the nome_conjunge column
 * @method     array findByCristao(boolean $cristao) Return Membro objects filtered by the cristao column
 * @method     array findByNomePai(string $nome_pai) Return Membro objects filtered by the nome_pai column
 * @method     array findByNomeMae(string $nome_mae) Return Membro objects filtered by the nome_mae column
 * @method     array findByTelefoneResidencial(string $telefone_residencial) Return Membro objects filtered by the telefone_residencial column
 * @method     array findByTelefoneCelular(string $telefone_celular) Return Membro objects filtered by the telefone_celular column
 * @method     array findByEmail(string $email) Return Membro objects filtered by the email column
 * @method     array findByBatizado(boolean $batizado) Return Membro objects filtered by the batizado column
 * @method     array findByDataMembro(string $data_membro) Return Membro objects filtered by the data_membro column
 * @method     array findByIgrejaOrigem(string $igreja_origem) Return Membro objects filtered by the igreja_origem column
 * @method     array findByPastorIgrejaOrigem(string $pastor_igreja_origem) Return Membro objects filtered by the pastor_igreja_origem column
 * @method     array findByTelefoneIgrejaOrigem(string $telefone_igreja_origem) Return Membro objects filtered by the telefone_igreja_origem column
 * @method     array findByPossuiMinisterio(boolean $possui_ministerio) Return Membro objects filtered by the possui_ministerio column
 * @method     array findByNomeAntigoMinisterio(string $nome_antigo_ministerio) Return Membro objects filtered by the nome_antigo_ministerio column
 * @method     array findByParticipaPg(boolean $participa_pg) Return Membro objects filtered by the participa_pg column
 * @method     array findByNomePg(string $nome_pg) Return Membro objects filtered by the nome_pg column
 * @method     array findByCargoIgreja(string $cargo_igreja) Return Membro objects filtered by the cargo_igreja column
 * @method     array findByExperienciaOutrasIgrejas(string $experiencia_outras_igrejas) Return Membro objects filtered by the experiencia_outras_igrejas column
 * @method     array findByInteresseMinisterios(string $interesse_ministerios) Return Membro objects filtered by the interesse_ministerios column
 * @method     array findByDataCadastro(string $data_cadastro) Return Membro objects filtered by the data_cadastro column
 * @method     array findByDataNascimento(string $data_nascimento) Return Membro objects filtered by the data_nascimento column
 * @method     array findByProfissao(string $profissao) Return Membro objects filtered by the profissao column
 * @method     array findByAtivo(boolean $ativo) Return Membro objects filtered by the ativo column
 * @method     array findByCadastroAprovado(boolean $cadastro_aprovado) Return Membro objects filtered by the cadastro_aprovado column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseMembroQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseMembroQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Membro', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MembroQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MembroQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MembroQuery) {
			return $criteria;
		}
		$query = new MembroQuery();
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
	 * @return    Membro|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = MembroPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Membro A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `INSTITUICAO_ID`, `FILIAL_ID`, `CRIADOR_ID`, `MEMBRO_USUARIO_ID`, `USUARIO_APROVADOR_ID`, `ENDERECO_ID`, `CIDADE_NATURALIDADE_ID`, `NOME_COMPLETO`, `SEXO`, `RG`, `RG_EXPEDIDOR`, `CPF`, `ESTADO_CIVIL`, `NOME_CONJUNGE`, `CRISTAO`, `NOME_PAI`, `NOME_MAE`, `TELEFONE_RESIDENCIAL`, `TELEFONE_CELULAR`, `EMAIL`, `BATIZADO`, `DATA_MEMBRO`, `IGREJA_ORIGEM`, `PASTOR_IGREJA_ORIGEM`, `TELEFONE_IGREJA_ORIGEM`, `POSSUI_MINISTERIO`, `NOME_ANTIGO_MINISTERIO`, `PARTICIPA_PG`, `NOME_PG`, `CARGO_IGREJA`, `EXPERIENCIA_OUTRAS_IGREJAS`, `INTERESSE_MINISTERIOS`, `DATA_CADASTRO`, `DATA_NASCIMENTO`, `PROFISSAO`, `ATIVO`, `CADASTRO_APROVADO` FROM `membro` WHERE `ID` = :p0';
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
			$obj = new Membro();
			$obj->hydrate($row);
			MembroPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Membro|array|mixed the result, formatted by the current formatter
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
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MembroPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MembroPeer::ID, $keys, Criteria::IN);
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
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MembroPeer::ID, $id, $comparison);
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
	 * @see       filterByIgrejaRelatedByInstituicaoId()
	 *
	 * @param     mixed $instituicaoId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByInstituicaoId($instituicaoId = null, $comparison = null)
	{
		if (is_array($instituicaoId)) {
			$useMinMax = false;
			if (isset($instituicaoId['min'])) {
				$this->addUsingAlias(MembroPeer::INSTITUICAO_ID, $instituicaoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($instituicaoId['max'])) {
				$this->addUsingAlias(MembroPeer::INSTITUICAO_ID, $instituicaoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MembroPeer::INSTITUICAO_ID, $instituicaoId, $comparison);
	}

	/**
	 * Filter the query on the filial_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFilialId(1234); // WHERE filial_id = 1234
	 * $query->filterByFilialId(array(12, 34)); // WHERE filial_id IN (12, 34)
	 * $query->filterByFilialId(array('min' => 12)); // WHERE filial_id > 12
	 * </code>
	 *
	 * @see       filterByIgrejaRelatedByFilialId()
	 *
	 * @param     mixed $filialId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByFilialId($filialId = null, $comparison = null)
	{
		if (is_array($filialId)) {
			$useMinMax = false;
			if (isset($filialId['min'])) {
				$this->addUsingAlias(MembroPeer::FILIAL_ID, $filialId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($filialId['max'])) {
				$this->addUsingAlias(MembroPeer::FILIAL_ID, $filialId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MembroPeer::FILIAL_ID, $filialId, $comparison);
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
	 * @see       filterByUsuarioRelatedByCriadorId()
	 *
	 * @param     mixed $criadorId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByCriadorId($criadorId = null, $comparison = null)
	{
		if (is_array($criadorId)) {
			$useMinMax = false;
			if (isset($criadorId['min'])) {
				$this->addUsingAlias(MembroPeer::CRIADOR_ID, $criadorId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($criadorId['max'])) {
				$this->addUsingAlias(MembroPeer::CRIADOR_ID, $criadorId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MembroPeer::CRIADOR_ID, $criadorId, $comparison);
	}

	/**
	 * Filter the query on the membro_usuario_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMembroUsuarioId(1234); // WHERE membro_usuario_id = 1234
	 * $query->filterByMembroUsuarioId(array(12, 34)); // WHERE membro_usuario_id IN (12, 34)
	 * $query->filterByMembroUsuarioId(array('min' => 12)); // WHERE membro_usuario_id > 12
	 * </code>
	 *
	 * @see       filterByUsuarioRelatedByMembroUsuarioId()
	 *
	 * @param     mixed $membroUsuarioId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByMembroUsuarioId($membroUsuarioId = null, $comparison = null)
	{
		if (is_array($membroUsuarioId)) {
			$useMinMax = false;
			if (isset($membroUsuarioId['min'])) {
				$this->addUsingAlias(MembroPeer::MEMBRO_USUARIO_ID, $membroUsuarioId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($membroUsuarioId['max'])) {
				$this->addUsingAlias(MembroPeer::MEMBRO_USUARIO_ID, $membroUsuarioId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MembroPeer::MEMBRO_USUARIO_ID, $membroUsuarioId, $comparison);
	}

	/**
	 * Filter the query on the usuario_aprovador_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUsuarioAprovadorId(1234); // WHERE usuario_aprovador_id = 1234
	 * $query->filterByUsuarioAprovadorId(array(12, 34)); // WHERE usuario_aprovador_id IN (12, 34)
	 * $query->filterByUsuarioAprovadorId(array('min' => 12)); // WHERE usuario_aprovador_id > 12
	 * </code>
	 *
	 * @see       filterByUsuarioRelatedByUsuarioAprovadorId()
	 *
	 * @param     mixed $usuarioAprovadorId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByUsuarioAprovadorId($usuarioAprovadorId = null, $comparison = null)
	{
		if (is_array($usuarioAprovadorId)) {
			$useMinMax = false;
			if (isset($usuarioAprovadorId['min'])) {
				$this->addUsingAlias(MembroPeer::USUARIO_APROVADOR_ID, $usuarioAprovadorId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($usuarioAprovadorId['max'])) {
				$this->addUsingAlias(MembroPeer::USUARIO_APROVADOR_ID, $usuarioAprovadorId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MembroPeer::USUARIO_APROVADOR_ID, $usuarioAprovadorId, $comparison);
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
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByEnderecoId($enderecoId = null, $comparison = null)
	{
		if (is_array($enderecoId)) {
			$useMinMax = false;
			if (isset($enderecoId['min'])) {
				$this->addUsingAlias(MembroPeer::ENDERECO_ID, $enderecoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($enderecoId['max'])) {
				$this->addUsingAlias(MembroPeer::ENDERECO_ID, $enderecoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MembroPeer::ENDERECO_ID, $enderecoId, $comparison);
	}

	/**
	 * Filter the query on the cidade_naturalidade_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCidadeNaturalidadeId(1234); // WHERE cidade_naturalidade_id = 1234
	 * $query->filterByCidadeNaturalidadeId(array(12, 34)); // WHERE cidade_naturalidade_id IN (12, 34)
	 * $query->filterByCidadeNaturalidadeId(array('min' => 12)); // WHERE cidade_naturalidade_id > 12
	 * </code>
	 *
	 * @see       filterByCidade()
	 *
	 * @param     mixed $cidadeNaturalidadeId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByCidadeNaturalidadeId($cidadeNaturalidadeId = null, $comparison = null)
	{
		if (is_array($cidadeNaturalidadeId)) {
			$useMinMax = false;
			if (isset($cidadeNaturalidadeId['min'])) {
				$this->addUsingAlias(MembroPeer::CIDADE_NATURALIDADE_ID, $cidadeNaturalidadeId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cidadeNaturalidadeId['max'])) {
				$this->addUsingAlias(MembroPeer::CIDADE_NATURALIDADE_ID, $cidadeNaturalidadeId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MembroPeer::CIDADE_NATURALIDADE_ID, $cidadeNaturalidadeId, $comparison);
	}

	/**
	 * Filter the query on the nome_completo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNomeCompleto('fooValue');   // WHERE nome_completo = 'fooValue'
	 * $query->filterByNomeCompleto('%fooValue%'); // WHERE nome_completo LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nomeCompleto The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByNomeCompleto($nomeCompleto = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nomeCompleto)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nomeCompleto)) {
				$nomeCompleto = str_replace('*', '%', $nomeCompleto);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MembroPeer::NOME_COMPLETO, $nomeCompleto, $comparison);
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
	 * @return    MembroQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MembroPeer::SEXO, $sexo, $comparison);
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
	 * @return    MembroQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MembroPeer::RG, $rg, $comparison);
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
	 * @return    MembroQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MembroPeer::RG_EXPEDIDOR, $rgExpedidor, $comparison);
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
	 * @return    MembroQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MembroPeer::CPF, $cpf, $comparison);
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
	 * @return    MembroQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MembroPeer::ESTADO_CIVIL, $estadoCivil, $comparison);
	}

	/**
	 * Filter the query on the nome_conjunge column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNomeConjunge('fooValue');   // WHERE nome_conjunge = 'fooValue'
	 * $query->filterByNomeConjunge('%fooValue%'); // WHERE nome_conjunge LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nomeConjunge The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByNomeConjunge($nomeConjunge = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nomeConjunge)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nomeConjunge)) {
				$nomeConjunge = str_replace('*', '%', $nomeConjunge);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MembroPeer::NOME_CONJUNGE, $nomeConjunge, $comparison);
	}

	/**
	 * Filter the query on the cristao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCristao(true); // WHERE cristao = true
	 * $query->filterByCristao('yes'); // WHERE cristao = true
	 * </code>
	 *
	 * @param     boolean|string $cristao The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByCristao($cristao = null, $comparison = null)
	{
		if (is_string($cristao)) {
			$cristao = in_array(strtolower($cristao), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(MembroPeer::CRISTAO, $cristao, $comparison);
	}

	/**
	 * Filter the query on the nome_pai column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNomePai('fooValue');   // WHERE nome_pai = 'fooValue'
	 * $query->filterByNomePai('%fooValue%'); // WHERE nome_pai LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nomePai The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByNomePai($nomePai = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nomePai)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nomePai)) {
				$nomePai = str_replace('*', '%', $nomePai);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MembroPeer::NOME_PAI, $nomePai, $comparison);
	}

	/**
	 * Filter the query on the nome_mae column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNomeMae('fooValue');   // WHERE nome_mae = 'fooValue'
	 * $query->filterByNomeMae('%fooValue%'); // WHERE nome_mae LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nomeMae The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByNomeMae($nomeMae = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nomeMae)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nomeMae)) {
				$nomeMae = str_replace('*', '%', $nomeMae);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MembroPeer::NOME_MAE, $nomeMae, $comparison);
	}

	/**
	 * Filter the query on the telefone_residencial column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTelefoneResidencial('fooValue');   // WHERE telefone_residencial = 'fooValue'
	 * $query->filterByTelefoneResidencial('%fooValue%'); // WHERE telefone_residencial LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $telefoneResidencial The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByTelefoneResidencial($telefoneResidencial = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($telefoneResidencial)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $telefoneResidencial)) {
				$telefoneResidencial = str_replace('*', '%', $telefoneResidencial);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MembroPeer::TELEFONE_RESIDENCIAL, $telefoneResidencial, $comparison);
	}

	/**
	 * Filter the query on the telefone_celular column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTelefoneCelular('fooValue');   // WHERE telefone_celular = 'fooValue'
	 * $query->filterByTelefoneCelular('%fooValue%'); // WHERE telefone_celular LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $telefoneCelular The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByTelefoneCelular($telefoneCelular = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($telefoneCelular)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $telefoneCelular)) {
				$telefoneCelular = str_replace('*', '%', $telefoneCelular);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MembroPeer::TELEFONE_CELULAR, $telefoneCelular, $comparison);
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
	 * @return    MembroQuery The current query, for fluid interface
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
		return $this->addUsingAlias(MembroPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the batizado column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByBatizado(true); // WHERE batizado = true
	 * $query->filterByBatizado('yes'); // WHERE batizado = true
	 * </code>
	 *
	 * @param     boolean|string $batizado The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByBatizado($batizado = null, $comparison = null)
	{
		if (is_string($batizado)) {
			$batizado = in_array(strtolower($batizado), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(MembroPeer::BATIZADO, $batizado, $comparison);
	}

	/**
	 * Filter the query on the data_membro column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDataMembro('2011-03-14'); // WHERE data_membro = '2011-03-14'
	 * $query->filterByDataMembro('now'); // WHERE data_membro = '2011-03-14'
	 * $query->filterByDataMembro(array('max' => 'yesterday')); // WHERE data_membro > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $dataMembro The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByDataMembro($dataMembro = null, $comparison = null)
	{
		if (is_array($dataMembro)) {
			$useMinMax = false;
			if (isset($dataMembro['min'])) {
				$this->addUsingAlias(MembroPeer::DATA_MEMBRO, $dataMembro['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataMembro['max'])) {
				$this->addUsingAlias(MembroPeer::DATA_MEMBRO, $dataMembro['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MembroPeer::DATA_MEMBRO, $dataMembro, $comparison);
	}

	/**
	 * Filter the query on the igreja_origem column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIgrejaOrigem('fooValue');   // WHERE igreja_origem = 'fooValue'
	 * $query->filterByIgrejaOrigem('%fooValue%'); // WHERE igreja_origem LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $igrejaOrigem The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByIgrejaOrigem($igrejaOrigem = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($igrejaOrigem)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $igrejaOrigem)) {
				$igrejaOrigem = str_replace('*', '%', $igrejaOrigem);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MembroPeer::IGREJA_ORIGEM, $igrejaOrigem, $comparison);
	}

	/**
	 * Filter the query on the pastor_igreja_origem column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPastorIgrejaOrigem('fooValue');   // WHERE pastor_igreja_origem = 'fooValue'
	 * $query->filterByPastorIgrejaOrigem('%fooValue%'); // WHERE pastor_igreja_origem LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $pastorIgrejaOrigem The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByPastorIgrejaOrigem($pastorIgrejaOrigem = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($pastorIgrejaOrigem)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $pastorIgrejaOrigem)) {
				$pastorIgrejaOrigem = str_replace('*', '%', $pastorIgrejaOrigem);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MembroPeer::PASTOR_IGREJA_ORIGEM, $pastorIgrejaOrigem, $comparison);
	}

	/**
	 * Filter the query on the telefone_igreja_origem column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTelefoneIgrejaOrigem('fooValue');   // WHERE telefone_igreja_origem = 'fooValue'
	 * $query->filterByTelefoneIgrejaOrigem('%fooValue%'); // WHERE telefone_igreja_origem LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $telefoneIgrejaOrigem The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByTelefoneIgrejaOrigem($telefoneIgrejaOrigem = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($telefoneIgrejaOrigem)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $telefoneIgrejaOrigem)) {
				$telefoneIgrejaOrigem = str_replace('*', '%', $telefoneIgrejaOrigem);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MembroPeer::TELEFONE_IGREJA_ORIGEM, $telefoneIgrejaOrigem, $comparison);
	}

	/**
	 * Filter the query on the possui_ministerio column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPossuiMinisterio(true); // WHERE possui_ministerio = true
	 * $query->filterByPossuiMinisterio('yes'); // WHERE possui_ministerio = true
	 * </code>
	 *
	 * @param     boolean|string $possuiMinisterio The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByPossuiMinisterio($possuiMinisterio = null, $comparison = null)
	{
		if (is_string($possuiMinisterio)) {
			$possui_ministerio = in_array(strtolower($possuiMinisterio), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(MembroPeer::POSSUI_MINISTERIO, $possuiMinisterio, $comparison);
	}

	/**
	 * Filter the query on the nome_antigo_ministerio column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNomeAntigoMinisterio('fooValue');   // WHERE nome_antigo_ministerio = 'fooValue'
	 * $query->filterByNomeAntigoMinisterio('%fooValue%'); // WHERE nome_antigo_ministerio LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nomeAntigoMinisterio The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByNomeAntigoMinisterio($nomeAntigoMinisterio = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nomeAntigoMinisterio)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nomeAntigoMinisterio)) {
				$nomeAntigoMinisterio = str_replace('*', '%', $nomeAntigoMinisterio);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MembroPeer::NOME_ANTIGO_MINISTERIO, $nomeAntigoMinisterio, $comparison);
	}

	/**
	 * Filter the query on the participa_pg column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByParticipaPg(true); // WHERE participa_pg = true
	 * $query->filterByParticipaPg('yes'); // WHERE participa_pg = true
	 * </code>
	 *
	 * @param     boolean|string $participaPg The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByParticipaPg($participaPg = null, $comparison = null)
	{
		if (is_string($participaPg)) {
			$participa_pg = in_array(strtolower($participaPg), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(MembroPeer::PARTICIPA_PG, $participaPg, $comparison);
	}

	/**
	 * Filter the query on the nome_pg column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNomePg('fooValue');   // WHERE nome_pg = 'fooValue'
	 * $query->filterByNomePg('%fooValue%'); // WHERE nome_pg LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nomePg The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByNomePg($nomePg = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nomePg)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nomePg)) {
				$nomePg = str_replace('*', '%', $nomePg);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MembroPeer::NOME_PG, $nomePg, $comparison);
	}

	/**
	 * Filter the query on the cargo_igreja column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCargoIgreja('fooValue');   // WHERE cargo_igreja = 'fooValue'
	 * $query->filterByCargoIgreja('%fooValue%'); // WHERE cargo_igreja LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $cargoIgreja The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByCargoIgreja($cargoIgreja = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($cargoIgreja)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $cargoIgreja)) {
				$cargoIgreja = str_replace('*', '%', $cargoIgreja);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MembroPeer::CARGO_IGREJA, $cargoIgreja, $comparison);
	}

	/**
	 * Filter the query on the experiencia_outras_igrejas column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByExperienciaOutrasIgrejas('fooValue');   // WHERE experiencia_outras_igrejas = 'fooValue'
	 * $query->filterByExperienciaOutrasIgrejas('%fooValue%'); // WHERE experiencia_outras_igrejas LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $experienciaOutrasIgrejas The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByExperienciaOutrasIgrejas($experienciaOutrasIgrejas = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($experienciaOutrasIgrejas)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $experienciaOutrasIgrejas)) {
				$experienciaOutrasIgrejas = str_replace('*', '%', $experienciaOutrasIgrejas);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MembroPeer::EXPERIENCIA_OUTRAS_IGREJAS, $experienciaOutrasIgrejas, $comparison);
	}

	/**
	 * Filter the query on the interesse_ministerios column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByInteresseMinisterios('fooValue');   // WHERE interesse_ministerios = 'fooValue'
	 * $query->filterByInteresseMinisterios('%fooValue%'); // WHERE interesse_ministerios LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $interesseMinisterios The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByInteresseMinisterios($interesseMinisterios = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($interesseMinisterios)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $interesseMinisterios)) {
				$interesseMinisterios = str_replace('*', '%', $interesseMinisterios);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MembroPeer::INTERESSE_MINISTERIOS, $interesseMinisterios, $comparison);
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
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByDataCadastro($dataCadastro = null, $comparison = null)
	{
		if (is_array($dataCadastro)) {
			$useMinMax = false;
			if (isset($dataCadastro['min'])) {
				$this->addUsingAlias(MembroPeer::DATA_CADASTRO, $dataCadastro['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataCadastro['max'])) {
				$this->addUsingAlias(MembroPeer::DATA_CADASTRO, $dataCadastro['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MembroPeer::DATA_CADASTRO, $dataCadastro, $comparison);
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
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByDataNascimento($dataNascimento = null, $comparison = null)
	{
		if (is_array($dataNascimento)) {
			$useMinMax = false;
			if (isset($dataNascimento['min'])) {
				$this->addUsingAlias(MembroPeer::DATA_NASCIMENTO, $dataNascimento['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataNascimento['max'])) {
				$this->addUsingAlias(MembroPeer::DATA_NASCIMENTO, $dataNascimento['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(MembroPeer::DATA_NASCIMENTO, $dataNascimento, $comparison);
	}

	/**
	 * Filter the query on the profissao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByProfissao('fooValue');   // WHERE profissao = 'fooValue'
	 * $query->filterByProfissao('%fooValue%'); // WHERE profissao LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $profissao The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByProfissao($profissao = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($profissao)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $profissao)) {
				$profissao = str_replace('*', '%', $profissao);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MembroPeer::PROFISSAO, $profissao, $comparison);
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
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByAtivo($ativo = null, $comparison = null)
	{
		if (is_string($ativo)) {
			$ativo = in_array(strtolower($ativo), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(MembroPeer::ATIVO, $ativo, $comparison);
	}

	/**
	 * Filter the query on the cadastro_aprovado column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCadastroAprovado(true); // WHERE cadastro_aprovado = true
	 * $query->filterByCadastroAprovado('yes'); // WHERE cadastro_aprovado = true
	 * </code>
	 *
	 * @param     boolean|string $cadastroAprovado The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByCadastroAprovado($cadastroAprovado = null, $comparison = null)
	{
		if (is_string($cadastroAprovado)) {
			$cadastro_aprovado = in_array(strtolower($cadastroAprovado), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(MembroPeer::CADASTRO_APROVADO, $cadastroAprovado, $comparison);
	}

	/**
	 * Filter the query by a related Cidade object
	 *
	 * @param     Cidade|PropelCollection $cidade The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByCidade($cidade, $comparison = null)
	{
		if ($cidade instanceof Cidade) {
			return $this
				->addUsingAlias(MembroPeer::CIDADE_NATURALIDADE_ID, $cidade->getId(), $comparison);
		} elseif ($cidade instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(MembroPeer::CIDADE_NATURALIDADE_ID, $cidade->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByCidade() only accepts arguments of type Cidade or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Cidade relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function joinCidade($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Cidade');

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
			$this->addJoinObject($join, 'Cidade');
		}

		return $this;
	}

	/**
	 * Use the Cidade relation Cidade object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    CidadeQuery A secondary query class using the current class as primary query
	 */
	public function useCidadeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinCidade($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Cidade', 'CidadeQuery');
	}

	/**
	 * Filter the query by a related Endereco object
	 *
	 * @param     Endereco|PropelCollection $endereco The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByEndereco($endereco, $comparison = null)
	{
		if ($endereco instanceof Endereco) {
			return $this
				->addUsingAlias(MembroPeer::ENDERECO_ID, $endereco->getId(), $comparison);
		} elseif ($endereco instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(MembroPeer::ENDERECO_ID, $endereco->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    MembroQuery The current query, for fluid interface
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
	 * Filter the query by a related Igreja object
	 *
	 * @param     Igreja|PropelCollection $igreja The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByIgrejaRelatedByFilialId($igreja, $comparison = null)
	{
		if ($igreja instanceof Igreja) {
			return $this
				->addUsingAlias(MembroPeer::FILIAL_ID, $igreja->getId(), $comparison);
		} elseif ($igreja instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(MembroPeer::FILIAL_ID, $igreja->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByIgrejaRelatedByFilialId() only accepts arguments of type Igreja or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the IgrejaRelatedByFilialId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function joinIgrejaRelatedByFilialId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('IgrejaRelatedByFilialId');

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
			$this->addJoinObject($join, 'IgrejaRelatedByFilialId');
		}

		return $this;
	}

	/**
	 * Use the IgrejaRelatedByFilialId relation Igreja object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery A secondary query class using the current class as primary query
	 */
	public function useIgrejaRelatedByFilialIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinIgrejaRelatedByFilialId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'IgrejaRelatedByFilialId', 'IgrejaQuery');
	}

	/**
	 * Filter the query by a related Igreja object
	 *
	 * @param     Igreja|PropelCollection $igreja The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByIgrejaRelatedByInstituicaoId($igreja, $comparison = null)
	{
		if ($igreja instanceof Igreja) {
			return $this
				->addUsingAlias(MembroPeer::INSTITUICAO_ID, $igreja->getId(), $comparison);
		} elseif ($igreja instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(MembroPeer::INSTITUICAO_ID, $igreja->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByIgrejaRelatedByInstituicaoId() only accepts arguments of type Igreja or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the IgrejaRelatedByInstituicaoId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function joinIgrejaRelatedByInstituicaoId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('IgrejaRelatedByInstituicaoId');

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
			$this->addJoinObject($join, 'IgrejaRelatedByInstituicaoId');
		}

		return $this;
	}

	/**
	 * Use the IgrejaRelatedByInstituicaoId relation Igreja object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery A secondary query class using the current class as primary query
	 */
	public function useIgrejaRelatedByInstituicaoIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinIgrejaRelatedByInstituicaoId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'IgrejaRelatedByInstituicaoId', 'IgrejaQuery');
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByUsuarioRelatedByCriadorId($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(MembroPeer::CRIADOR_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(MembroPeer::CRIADOR_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUsuarioRelatedByCriadorId() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UsuarioRelatedByCriadorId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function joinUsuarioRelatedByCriadorId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UsuarioRelatedByCriadorId');

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
			$this->addJoinObject($join, 'UsuarioRelatedByCriadorId');
		}

		return $this;
	}

	/**
	 * Use the UsuarioRelatedByCriadorId relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioRelatedByCriadorIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUsuarioRelatedByCriadorId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UsuarioRelatedByCriadorId', 'UsuarioQuery');
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByUsuarioRelatedByMembroUsuarioId($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(MembroPeer::MEMBRO_USUARIO_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(MembroPeer::MEMBRO_USUARIO_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUsuarioRelatedByMembroUsuarioId() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UsuarioRelatedByMembroUsuarioId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function joinUsuarioRelatedByMembroUsuarioId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UsuarioRelatedByMembroUsuarioId');

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
			$this->addJoinObject($join, 'UsuarioRelatedByMembroUsuarioId');
		}

		return $this;
	}

	/**
	 * Use the UsuarioRelatedByMembroUsuarioId relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioRelatedByMembroUsuarioIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUsuarioRelatedByMembroUsuarioId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UsuarioRelatedByMembroUsuarioId', 'UsuarioQuery');
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByUsuarioRelatedByUsuarioAprovadorId($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(MembroPeer::USUARIO_APROVADOR_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(MembroPeer::USUARIO_APROVADOR_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUsuarioRelatedByUsuarioAprovadorId() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UsuarioRelatedByUsuarioAprovadorId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function joinUsuarioRelatedByUsuarioAprovadorId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UsuarioRelatedByUsuarioAprovadorId');

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
			$this->addJoinObject($join, 'UsuarioRelatedByUsuarioAprovadorId');
		}

		return $this;
	}

	/**
	 * Use the UsuarioRelatedByUsuarioAprovadorId relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioRelatedByUsuarioAprovadorIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUsuarioRelatedByUsuarioAprovadorId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UsuarioRelatedByUsuarioAprovadorId', 'UsuarioQuery');
	}

	/**
	 * Filter the query by a related FilhoMembro object
	 *
	 * @param     FilhoMembro $filhoMembro  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByFilhoMembro($filhoMembro, $comparison = null)
	{
		if ($filhoMembro instanceof FilhoMembro) {
			return $this
				->addUsingAlias(MembroPeer::ID, $filhoMembro->getMembroId(), $comparison);
		} elseif ($filhoMembro instanceof PropelCollection) {
			return $this
				->useFilhoMembroQuery()
				->filterByPrimaryKeys($filhoMembro->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByFilhoMembro() only accepts arguments of type FilhoMembro or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the FilhoMembro relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function joinFilhoMembro($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('FilhoMembro');

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
			$this->addJoinObject($join, 'FilhoMembro');
		}

		return $this;
	}

	/**
	 * Use the FilhoMembro relation FilhoMembro object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    FilhoMembroQuery A secondary query class using the current class as primary query
	 */
	public function useFilhoMembroQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinFilhoMembro($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'FilhoMembro', 'FilhoMembroQuery');
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario $usuario  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function filterByUsuarioRelatedByMembroId($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(MembroPeer::ID, $usuario->getMembroId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			return $this
				->useUsuarioRelatedByMembroIdQuery()
				->filterByPrimaryKeys($usuario->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByUsuarioRelatedByMembroId() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UsuarioRelatedByMembroId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function joinUsuarioRelatedByMembroId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UsuarioRelatedByMembroId');

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
			$this->addJoinObject($join, 'UsuarioRelatedByMembroId');
		}

		return $this;
	}

	/**
	 * Use the UsuarioRelatedByMembroId relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioRelatedByMembroIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUsuarioRelatedByMembroId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UsuarioRelatedByMembroId', 'UsuarioQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Membro $membro Object to remove from the list of results
	 *
	 * @return    MembroQuery The current query, for fluid interface
	 */
	public function prune($membro = null)
	{
		if ($membro) {
			$this->addUsingAlias(MembroPeer::ID, $membro->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseMembroQuery