<?php


/**
 * Base class that represents a query for the 'igreja' table.
 *
 * 
 *
 * @method     IgrejaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     IgrejaQuery orderByCriadorId($order = Criteria::ASC) Order by the criador_id column
 * @method     IgrejaQuery orderByResponsavelId($order = Criteria::ASC) Order by the responsavel_id column
 * @method     IgrejaQuery orderByEnderecoId($order = Criteria::ASC) Order by the endereco_id column
 * @method     IgrejaQuery orderByIgrejaId($order = Criteria::ASC) Order by the igreja_id column
 * @method     IgrejaQuery orderByTipo($order = Criteria::ASC) Order by the tipo column
 * @method     IgrejaQuery orderByNomeFantasia($order = Criteria::ASC) Order by the nome_fantasia column
 * @method     IgrejaQuery orderByRazaoSocial($order = Criteria::ASC) Order by the razao_social column
 * @method     IgrejaQuery orderByCnpj($order = Criteria::ASC) Order by the cnpj column
 * @method     IgrejaQuery orderByAtiva($order = Criteria::ASC) Order by the ativa column
 * @method     IgrejaQuery orderBySite($order = Criteria::ASC) Order by the site column
 * @method     IgrejaQuery orderBySobreNos($order = Criteria::ASC) Order by the sobre_nos column
 * @method     IgrejaQuery orderByVisao($order = Criteria::ASC) Order by the visao column
 * @method     IgrejaQuery orderByMissao($order = Criteria::ASC) Order by the missao column
 * @method     IgrejaQuery orderByValores($order = Criteria::ASC) Order by the valores column
 * @method     IgrejaQuery orderByDataCadastro($order = Criteria::ASC) Order by the data_cadastro column
 * @method     IgrejaQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     IgrejaQuery orderByTelefone($order = Criteria::ASC) Order by the telefone column
 *
 * @method     IgrejaQuery groupById() Group by the id column
 * @method     IgrejaQuery groupByCriadorId() Group by the criador_id column
 * @method     IgrejaQuery groupByResponsavelId() Group by the responsavel_id column
 * @method     IgrejaQuery groupByEnderecoId() Group by the endereco_id column
 * @method     IgrejaQuery groupByIgrejaId() Group by the igreja_id column
 * @method     IgrejaQuery groupByTipo() Group by the tipo column
 * @method     IgrejaQuery groupByNomeFantasia() Group by the nome_fantasia column
 * @method     IgrejaQuery groupByRazaoSocial() Group by the razao_social column
 * @method     IgrejaQuery groupByCnpj() Group by the cnpj column
 * @method     IgrejaQuery groupByAtiva() Group by the ativa column
 * @method     IgrejaQuery groupBySite() Group by the site column
 * @method     IgrejaQuery groupBySobreNos() Group by the sobre_nos column
 * @method     IgrejaQuery groupByVisao() Group by the visao column
 * @method     IgrejaQuery groupByMissao() Group by the missao column
 * @method     IgrejaQuery groupByValores() Group by the valores column
 * @method     IgrejaQuery groupByDataCadastro() Group by the data_cadastro column
 * @method     IgrejaQuery groupByEmail() Group by the email column
 * @method     IgrejaQuery groupByTelefone() Group by the telefone column
 *
 * @method     IgrejaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     IgrejaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     IgrejaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     IgrejaQuery leftJoinEndereco($relationAlias = null) Adds a LEFT JOIN clause to the query using the Endereco relation
 * @method     IgrejaQuery rightJoinEndereco($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Endereco relation
 * @method     IgrejaQuery innerJoinEndereco($relationAlias = null) Adds a INNER JOIN clause to the query using the Endereco relation
 *
 * @method     IgrejaQuery leftJoinIgrejaRelatedByIgrejaId($relationAlias = null) Adds a LEFT JOIN clause to the query using the IgrejaRelatedByIgrejaId relation
 * @method     IgrejaQuery rightJoinIgrejaRelatedByIgrejaId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the IgrejaRelatedByIgrejaId relation
 * @method     IgrejaQuery innerJoinIgrejaRelatedByIgrejaId($relationAlias = null) Adds a INNER JOIN clause to the query using the IgrejaRelatedByIgrejaId relation
 *
 * @method     IgrejaQuery leftJoinUsuarioRelatedByResponsavelId($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioRelatedByResponsavelId relation
 * @method     IgrejaQuery rightJoinUsuarioRelatedByResponsavelId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioRelatedByResponsavelId relation
 * @method     IgrejaQuery innerJoinUsuarioRelatedByResponsavelId($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioRelatedByResponsavelId relation
 *
 * @method     IgrejaQuery leftJoinUsuarioRelatedByCriadorId($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioRelatedByCriadorId relation
 * @method     IgrejaQuery rightJoinUsuarioRelatedByCriadorId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioRelatedByCriadorId relation
 * @method     IgrejaQuery innerJoinUsuarioRelatedByCriadorId($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioRelatedByCriadorId relation
 *
 * @method     IgrejaQuery leftJoinAgendaIgreja($relationAlias = null) Adds a LEFT JOIN clause to the query using the AgendaIgreja relation
 * @method     IgrejaQuery rightJoinAgendaIgreja($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AgendaIgreja relation
 * @method     IgrejaQuery innerJoinAgendaIgreja($relationAlias = null) Adds a INNER JOIN clause to the query using the AgendaIgreja relation
 *
 * @method     IgrejaQuery leftJoinIgrejaRelatedById($relationAlias = null) Adds a LEFT JOIN clause to the query using the IgrejaRelatedById relation
 * @method     IgrejaQuery rightJoinIgrejaRelatedById($relationAlias = null) Adds a RIGHT JOIN clause to the query using the IgrejaRelatedById relation
 * @method     IgrejaQuery innerJoinIgrejaRelatedById($relationAlias = null) Adds a INNER JOIN clause to the query using the IgrejaRelatedById relation
 *
 * @method     IgrejaQuery leftJoinMembroRelatedByFilialId($relationAlias = null) Adds a LEFT JOIN clause to the query using the MembroRelatedByFilialId relation
 * @method     IgrejaQuery rightJoinMembroRelatedByFilialId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MembroRelatedByFilialId relation
 * @method     IgrejaQuery innerJoinMembroRelatedByFilialId($relationAlias = null) Adds a INNER JOIN clause to the query using the MembroRelatedByFilialId relation
 *
 * @method     IgrejaQuery leftJoinMembroRelatedByInstituicaoId($relationAlias = null) Adds a LEFT JOIN clause to the query using the MembroRelatedByInstituicaoId relation
 * @method     IgrejaQuery rightJoinMembroRelatedByInstituicaoId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MembroRelatedByInstituicaoId relation
 * @method     IgrejaQuery innerJoinMembroRelatedByInstituicaoId($relationAlias = null) Adds a INNER JOIN clause to the query using the MembroRelatedByInstituicaoId relation
 *
 * @method     IgrejaQuery leftJoinMinisterioRelatedByIgrejaPertencenteId($relationAlias = null) Adds a LEFT JOIN clause to the query using the MinisterioRelatedByIgrejaPertencenteId relation
 * @method     IgrejaQuery rightJoinMinisterioRelatedByIgrejaPertencenteId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MinisterioRelatedByIgrejaPertencenteId relation
 * @method     IgrejaQuery innerJoinMinisterioRelatedByIgrejaPertencenteId($relationAlias = null) Adds a INNER JOIN clause to the query using the MinisterioRelatedByIgrejaPertencenteId relation
 *
 * @method     IgrejaQuery leftJoinMinisterioRelatedByInstituicaoId($relationAlias = null) Adds a LEFT JOIN clause to the query using the MinisterioRelatedByInstituicaoId relation
 * @method     IgrejaQuery rightJoinMinisterioRelatedByInstituicaoId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MinisterioRelatedByInstituicaoId relation
 * @method     IgrejaQuery innerJoinMinisterioRelatedByInstituicaoId($relationAlias = null) Adds a INNER JOIN clause to the query using the MinisterioRelatedByInstituicaoId relation
 *
 * @method     IgrejaQuery leftJoinNoticiaIgreja($relationAlias = null) Adds a LEFT JOIN clause to the query using the NoticiaIgreja relation
 * @method     IgrejaQuery rightJoinNoticiaIgreja($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NoticiaIgreja relation
 * @method     IgrejaQuery innerJoinNoticiaIgreja($relationAlias = null) Adds a INNER JOIN clause to the query using the NoticiaIgreja relation
 *
 * @method     IgrejaQuery leftJoinPedidoOracao($relationAlias = null) Adds a LEFT JOIN clause to the query using the PedidoOracao relation
 * @method     IgrejaQuery rightJoinPedidoOracao($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PedidoOracao relation
 * @method     IgrejaQuery innerJoinPedidoOracao($relationAlias = null) Adds a INNER JOIN clause to the query using the PedidoOracao relation
 *
 * @method     IgrejaQuery leftJoinPg($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pg relation
 * @method     IgrejaQuery rightJoinPg($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pg relation
 * @method     IgrejaQuery innerJoinPg($relationAlias = null) Adds a INNER JOIN clause to the query using the Pg relation
 *
 * @method     IgrejaQuery leftJoinPodcastIgreja($relationAlias = null) Adds a LEFT JOIN clause to the query using the PodcastIgreja relation
 * @method     IgrejaQuery rightJoinPodcastIgreja($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PodcastIgreja relation
 * @method     IgrejaQuery innerJoinPodcastIgreja($relationAlias = null) Adds a INNER JOIN clause to the query using the PodcastIgreja relation
 *
 * @method     IgrejaQuery leftJoinUsuarioRelatedByFilialId($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioRelatedByFilialId relation
 * @method     IgrejaQuery rightJoinUsuarioRelatedByFilialId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioRelatedByFilialId relation
 * @method     IgrejaQuery innerJoinUsuarioRelatedByFilialId($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioRelatedByFilialId relation
 *
 * @method     IgrejaQuery leftJoinUsuarioRelatedByInstituicaoId($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioRelatedByInstituicaoId relation
 * @method     IgrejaQuery rightJoinUsuarioRelatedByInstituicaoId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioRelatedByInstituicaoId relation
 * @method     IgrejaQuery innerJoinUsuarioRelatedByInstituicaoId($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioRelatedByInstituicaoId relation
 *
 * @method     IgrejaQuery leftJoinUsuarioFilial($relationAlias = null) Adds a LEFT JOIN clause to the query using the UsuarioFilial relation
 * @method     IgrejaQuery rightJoinUsuarioFilial($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UsuarioFilial relation
 * @method     IgrejaQuery innerJoinUsuarioFilial($relationAlias = null) Adds a INNER JOIN clause to the query using the UsuarioFilial relation
 *
 * @method     IgrejaQuery leftJoinVideoIgreja($relationAlias = null) Adds a LEFT JOIN clause to the query using the VideoIgreja relation
 * @method     IgrejaQuery rightJoinVideoIgreja($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VideoIgreja relation
 * @method     IgrejaQuery innerJoinVideoIgreja($relationAlias = null) Adds a INNER JOIN clause to the query using the VideoIgreja relation
 *
 * @method     Igreja findOne(PropelPDO $con = null) Return the first Igreja matching the query
 * @method     Igreja findOneOrCreate(PropelPDO $con = null) Return the first Igreja matching the query, or a new Igreja object populated from the query conditions when no match is found
 *
 * @method     Igreja findOneById(int $id) Return the first Igreja filtered by the id column
 * @method     Igreja findOneByCriadorId(int $criador_id) Return the first Igreja filtered by the criador_id column
 * @method     Igreja findOneByResponsavelId(int $responsavel_id) Return the first Igreja filtered by the responsavel_id column
 * @method     Igreja findOneByEnderecoId(int $endereco_id) Return the first Igreja filtered by the endereco_id column
 * @method     Igreja findOneByIgrejaId(int $igreja_id) Return the first Igreja filtered by the igreja_id column
 * @method     Igreja findOneByTipo(string $tipo) Return the first Igreja filtered by the tipo column
 * @method     Igreja findOneByNomeFantasia(string $nome_fantasia) Return the first Igreja filtered by the nome_fantasia column
 * @method     Igreja findOneByRazaoSocial(string $razao_social) Return the first Igreja filtered by the razao_social column
 * @method     Igreja findOneByCnpj(string $cnpj) Return the first Igreja filtered by the cnpj column
 * @method     Igreja findOneByAtiva(boolean $ativa) Return the first Igreja filtered by the ativa column
 * @method     Igreja findOneBySite(string $site) Return the first Igreja filtered by the site column
 * @method     Igreja findOneBySobreNos(string $sobre_nos) Return the first Igreja filtered by the sobre_nos column
 * @method     Igreja findOneByVisao(string $visao) Return the first Igreja filtered by the visao column
 * @method     Igreja findOneByMissao(string $missao) Return the first Igreja filtered by the missao column
 * @method     Igreja findOneByValores(string $valores) Return the first Igreja filtered by the valores column
 * @method     Igreja findOneByDataCadastro(string $data_cadastro) Return the first Igreja filtered by the data_cadastro column
 * @method     Igreja findOneByEmail(string $email) Return the first Igreja filtered by the email column
 * @method     Igreja findOneByTelefone(string $telefone) Return the first Igreja filtered by the telefone column
 *
 * @method     array findById(int $id) Return Igreja objects filtered by the id column
 * @method     array findByCriadorId(int $criador_id) Return Igreja objects filtered by the criador_id column
 * @method     array findByResponsavelId(int $responsavel_id) Return Igreja objects filtered by the responsavel_id column
 * @method     array findByEnderecoId(int $endereco_id) Return Igreja objects filtered by the endereco_id column
 * @method     array findByIgrejaId(int $igreja_id) Return Igreja objects filtered by the igreja_id column
 * @method     array findByTipo(string $tipo) Return Igreja objects filtered by the tipo column
 * @method     array findByNomeFantasia(string $nome_fantasia) Return Igreja objects filtered by the nome_fantasia column
 * @method     array findByRazaoSocial(string $razao_social) Return Igreja objects filtered by the razao_social column
 * @method     array findByCnpj(string $cnpj) Return Igreja objects filtered by the cnpj column
 * @method     array findByAtiva(boolean $ativa) Return Igreja objects filtered by the ativa column
 * @method     array findBySite(string $site) Return Igreja objects filtered by the site column
 * @method     array findBySobreNos(string $sobre_nos) Return Igreja objects filtered by the sobre_nos column
 * @method     array findByVisao(string $visao) Return Igreja objects filtered by the visao column
 * @method     array findByMissao(string $missao) Return Igreja objects filtered by the missao column
 * @method     array findByValores(string $valores) Return Igreja objects filtered by the valores column
 * @method     array findByDataCadastro(string $data_cadastro) Return Igreja objects filtered by the data_cadastro column
 * @method     array findByEmail(string $email) Return Igreja objects filtered by the email column
 * @method     array findByTelefone(string $telefone) Return Igreja objects filtered by the telefone column
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseIgrejaQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of BaseIgrejaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'Default', $modelName = 'Igreja', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new IgrejaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    IgrejaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof IgrejaQuery) {
			return $criteria;
		}
		$query = new IgrejaQuery();
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
	 * @return    Igreja|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = IgrejaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(IgrejaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Igreja A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID`, `CRIADOR_ID`, `RESPONSAVEL_ID`, `ENDERECO_ID`, `IGREJA_ID`, `TIPO`, `NOME_FANTASIA`, `RAZAO_SOCIAL`, `CNPJ`, `ATIVA`, `SITE`, `SOBRE_NOS`, `VISAO`, `MISSAO`, `VALORES`, `DATA_CADASTRO`, `EMAIL`, `TELEFONE` FROM `igreja` WHERE `ID` = :p0';
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
			$obj = new Igreja();
			$obj->hydrate($row);
			IgrejaPeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Igreja|array|mixed the result, formatted by the current formatter
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
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(IgrejaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(IgrejaPeer::ID, $keys, Criteria::IN);
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
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(IgrejaPeer::ID, $id, $comparison);
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
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByCriadorId($criadorId = null, $comparison = null)
	{
		if (is_array($criadorId)) {
			$useMinMax = false;
			if (isset($criadorId['min'])) {
				$this->addUsingAlias(IgrejaPeer::CRIADOR_ID, $criadorId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($criadorId['max'])) {
				$this->addUsingAlias(IgrejaPeer::CRIADOR_ID, $criadorId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(IgrejaPeer::CRIADOR_ID, $criadorId, $comparison);
	}

	/**
	 * Filter the query on the responsavel_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByResponsavelId(1234); // WHERE responsavel_id = 1234
	 * $query->filterByResponsavelId(array(12, 34)); // WHERE responsavel_id IN (12, 34)
	 * $query->filterByResponsavelId(array('min' => 12)); // WHERE responsavel_id > 12
	 * </code>
	 *
	 * @see       filterByUsuarioRelatedByResponsavelId()
	 *
	 * @param     mixed $responsavelId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByResponsavelId($responsavelId = null, $comparison = null)
	{
		if (is_array($responsavelId)) {
			$useMinMax = false;
			if (isset($responsavelId['min'])) {
				$this->addUsingAlias(IgrejaPeer::RESPONSAVEL_ID, $responsavelId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($responsavelId['max'])) {
				$this->addUsingAlias(IgrejaPeer::RESPONSAVEL_ID, $responsavelId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(IgrejaPeer::RESPONSAVEL_ID, $responsavelId, $comparison);
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
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByEnderecoId($enderecoId = null, $comparison = null)
	{
		if (is_array($enderecoId)) {
			$useMinMax = false;
			if (isset($enderecoId['min'])) {
				$this->addUsingAlias(IgrejaPeer::ENDERECO_ID, $enderecoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($enderecoId['max'])) {
				$this->addUsingAlias(IgrejaPeer::ENDERECO_ID, $enderecoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(IgrejaPeer::ENDERECO_ID, $enderecoId, $comparison);
	}

	/**
	 * Filter the query on the igreja_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIgrejaId(1234); // WHERE igreja_id = 1234
	 * $query->filterByIgrejaId(array(12, 34)); // WHERE igreja_id IN (12, 34)
	 * $query->filterByIgrejaId(array('min' => 12)); // WHERE igreja_id > 12
	 * </code>
	 *
	 * @see       filterByIgrejaRelatedByIgrejaId()
	 *
	 * @param     mixed $igrejaId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByIgrejaId($igrejaId = null, $comparison = null)
	{
		if (is_array($igrejaId)) {
			$useMinMax = false;
			if (isset($igrejaId['min'])) {
				$this->addUsingAlias(IgrejaPeer::IGREJA_ID, $igrejaId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($igrejaId['max'])) {
				$this->addUsingAlias(IgrejaPeer::IGREJA_ID, $igrejaId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(IgrejaPeer::IGREJA_ID, $igrejaId, $comparison);
	}

	/**
	 * Filter the query on the tipo column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTipo('fooValue');   // WHERE tipo = 'fooValue'
	 * $query->filterByTipo('%fooValue%'); // WHERE tipo LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $tipo The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByTipo($tipo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($tipo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $tipo)) {
				$tipo = str_replace('*', '%', $tipo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(IgrejaPeer::TIPO, $tipo, $comparison);
	}

	/**
	 * Filter the query on the nome_fantasia column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNomeFantasia('fooValue');   // WHERE nome_fantasia = 'fooValue'
	 * $query->filterByNomeFantasia('%fooValue%'); // WHERE nome_fantasia LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $nomeFantasia The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByNomeFantasia($nomeFantasia = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nomeFantasia)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nomeFantasia)) {
				$nomeFantasia = str_replace('*', '%', $nomeFantasia);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(IgrejaPeer::NOME_FANTASIA, $nomeFantasia, $comparison);
	}

	/**
	 * Filter the query on the razao_social column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRazaoSocial('fooValue');   // WHERE razao_social = 'fooValue'
	 * $query->filterByRazaoSocial('%fooValue%'); // WHERE razao_social LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $razaoSocial The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByRazaoSocial($razaoSocial = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($razaoSocial)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $razaoSocial)) {
				$razaoSocial = str_replace('*', '%', $razaoSocial);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(IgrejaPeer::RAZAO_SOCIAL, $razaoSocial, $comparison);
	}

	/**
	 * Filter the query on the cnpj column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCnpj('fooValue');   // WHERE cnpj = 'fooValue'
	 * $query->filterByCnpj('%fooValue%'); // WHERE cnpj LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $cnpj The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByCnpj($cnpj = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($cnpj)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $cnpj)) {
				$cnpj = str_replace('*', '%', $cnpj);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(IgrejaPeer::CNPJ, $cnpj, $comparison);
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
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByAtiva($ativa = null, $comparison = null)
	{
		if (is_string($ativa)) {
			$ativa = in_array(strtolower($ativa), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(IgrejaPeer::ATIVA, $ativa, $comparison);
	}

	/**
	 * Filter the query on the site column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySite('fooValue');   // WHERE site = 'fooValue'
	 * $query->filterBySite('%fooValue%'); // WHERE site LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $site The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterBySite($site = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($site)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $site)) {
				$site = str_replace('*', '%', $site);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(IgrejaPeer::SITE, $site, $comparison);
	}

	/**
	 * Filter the query on the sobre_nos column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySobreNos('fooValue');   // WHERE sobre_nos = 'fooValue'
	 * $query->filterBySobreNos('%fooValue%'); // WHERE sobre_nos LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $sobreNos The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterBySobreNos($sobreNos = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($sobreNos)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $sobreNos)) {
				$sobreNos = str_replace('*', '%', $sobreNos);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(IgrejaPeer::SOBRE_NOS, $sobreNos, $comparison);
	}

	/**
	 * Filter the query on the visao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByVisao('fooValue');   // WHERE visao = 'fooValue'
	 * $query->filterByVisao('%fooValue%'); // WHERE visao LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $visao The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByVisao($visao = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($visao)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $visao)) {
				$visao = str_replace('*', '%', $visao);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(IgrejaPeer::VISAO, $visao, $comparison);
	}

	/**
	 * Filter the query on the missao column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMissao('fooValue');   // WHERE missao = 'fooValue'
	 * $query->filterByMissao('%fooValue%'); // WHERE missao LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $missao The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByMissao($missao = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($missao)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $missao)) {
				$missao = str_replace('*', '%', $missao);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(IgrejaPeer::MISSAO, $missao, $comparison);
	}

	/**
	 * Filter the query on the valores column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByValores('fooValue');   // WHERE valores = 'fooValue'
	 * $query->filterByValores('%fooValue%'); // WHERE valores LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $valores The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByValores($valores = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($valores)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $valores)) {
				$valores = str_replace('*', '%', $valores);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(IgrejaPeer::VALORES, $valores, $comparison);
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
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByDataCadastro($dataCadastro = null, $comparison = null)
	{
		if (is_array($dataCadastro)) {
			$useMinMax = false;
			if (isset($dataCadastro['min'])) {
				$this->addUsingAlias(IgrejaPeer::DATA_CADASTRO, $dataCadastro['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dataCadastro['max'])) {
				$this->addUsingAlias(IgrejaPeer::DATA_CADASTRO, $dataCadastro['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(IgrejaPeer::DATA_CADASTRO, $dataCadastro, $comparison);
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
	 * @return    IgrejaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(IgrejaPeer::EMAIL, $email, $comparison);
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
	 * @return    IgrejaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(IgrejaPeer::TELEFONE, $telefone, $comparison);
	}

	/**
	 * Filter the query by a related Endereco object
	 *
	 * @param     Endereco|PropelCollection $endereco The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByEndereco($endereco, $comparison = null)
	{
		if ($endereco instanceof Endereco) {
			return $this
				->addUsingAlias(IgrejaPeer::ENDERECO_ID, $endereco->getId(), $comparison);
		} elseif ($endereco instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(IgrejaPeer::ENDERECO_ID, $endereco->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    IgrejaQuery The current query, for fluid interface
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
	 * Filter the query by a related Igreja object
	 *
	 * @param     Igreja|PropelCollection $igreja The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByIgrejaRelatedByIgrejaId($igreja, $comparison = null)
	{
		if ($igreja instanceof Igreja) {
			return $this
				->addUsingAlias(IgrejaPeer::IGREJA_ID, $igreja->getId(), $comparison);
		} elseif ($igreja instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(IgrejaPeer::IGREJA_ID, $igreja->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByIgrejaRelatedByIgrejaId() only accepts arguments of type Igreja or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the IgrejaRelatedByIgrejaId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function joinIgrejaRelatedByIgrejaId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('IgrejaRelatedByIgrejaId');

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
			$this->addJoinObject($join, 'IgrejaRelatedByIgrejaId');
		}

		return $this;
	}

	/**
	 * Use the IgrejaRelatedByIgrejaId relation Igreja object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery A secondary query class using the current class as primary query
	 */
	public function useIgrejaRelatedByIgrejaIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinIgrejaRelatedByIgrejaId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'IgrejaRelatedByIgrejaId', 'IgrejaQuery');
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByUsuarioRelatedByResponsavelId($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(IgrejaPeer::RESPONSAVEL_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(IgrejaPeer::RESPONSAVEL_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUsuarioRelatedByResponsavelId() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UsuarioRelatedByResponsavelId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function joinUsuarioRelatedByResponsavelId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UsuarioRelatedByResponsavelId');

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
			$this->addJoinObject($join, 'UsuarioRelatedByResponsavelId');
		}

		return $this;
	}

	/**
	 * Use the UsuarioRelatedByResponsavelId relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioRelatedByResponsavelIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUsuarioRelatedByResponsavelId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UsuarioRelatedByResponsavelId', 'UsuarioQuery');
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario|PropelCollection $usuario The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByUsuarioRelatedByCriadorId($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(IgrejaPeer::CRIADOR_ID, $usuario->getId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(IgrejaPeer::CRIADOR_ID, $usuario->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function joinUsuarioRelatedByCriadorId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useUsuarioRelatedByCriadorIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUsuarioRelatedByCriadorId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UsuarioRelatedByCriadorId', 'UsuarioQuery');
	}

	/**
	 * Filter the query by a related AgendaIgreja object
	 *
	 * @param     AgendaIgreja $agendaIgreja  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByAgendaIgreja($agendaIgreja, $comparison = null)
	{
		if ($agendaIgreja instanceof AgendaIgreja) {
			return $this
				->addUsingAlias(IgrejaPeer::ID, $agendaIgreja->getIgrejaId(), $comparison);
		} elseif ($agendaIgreja instanceof PropelCollection) {
			return $this
				->useAgendaIgrejaQuery()
				->filterByPrimaryKeys($agendaIgreja->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByAgendaIgreja() only accepts arguments of type AgendaIgreja or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the AgendaIgreja relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function joinAgendaIgreja($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AgendaIgreja');

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
			$this->addJoinObject($join, 'AgendaIgreja');
		}

		return $this;
	}

	/**
	 * Use the AgendaIgreja relation AgendaIgreja object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AgendaIgrejaQuery A secondary query class using the current class as primary query
	 */
	public function useAgendaIgrejaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAgendaIgreja($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AgendaIgreja', 'AgendaIgrejaQuery');
	}

	/**
	 * Filter the query by a related Igreja object
	 *
	 * @param     Igreja $igreja  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByIgrejaRelatedById($igreja, $comparison = null)
	{
		if ($igreja instanceof Igreja) {
			return $this
				->addUsingAlias(IgrejaPeer::ID, $igreja->getIgrejaId(), $comparison);
		} elseif ($igreja instanceof PropelCollection) {
			return $this
				->useIgrejaRelatedByIdQuery()
				->filterByPrimaryKeys($igreja->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByIgrejaRelatedById() only accepts arguments of type Igreja or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the IgrejaRelatedById relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function joinIgrejaRelatedById($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('IgrejaRelatedById');

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
			$this->addJoinObject($join, 'IgrejaRelatedById');
		}

		return $this;
	}

	/**
	 * Use the IgrejaRelatedById relation Igreja object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery A secondary query class using the current class as primary query
	 */
	public function useIgrejaRelatedByIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinIgrejaRelatedById($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'IgrejaRelatedById', 'IgrejaQuery');
	}

	/**
	 * Filter the query by a related Membro object
	 *
	 * @param     Membro $membro  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByMembroRelatedByFilialId($membro, $comparison = null)
	{
		if ($membro instanceof Membro) {
			return $this
				->addUsingAlias(IgrejaPeer::ID, $membro->getFilialId(), $comparison);
		} elseif ($membro instanceof PropelCollection) {
			return $this
				->useMembroRelatedByFilialIdQuery()
				->filterByPrimaryKeys($membro->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByMembroRelatedByFilialId() only accepts arguments of type Membro or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the MembroRelatedByFilialId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function joinMembroRelatedByFilialId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('MembroRelatedByFilialId');

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
			$this->addJoinObject($join, 'MembroRelatedByFilialId');
		}

		return $this;
	}

	/**
	 * Use the MembroRelatedByFilialId relation Membro object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MembroQuery A secondary query class using the current class as primary query
	 */
	public function useMembroRelatedByFilialIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinMembroRelatedByFilialId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'MembroRelatedByFilialId', 'MembroQuery');
	}

	/**
	 * Filter the query by a related Membro object
	 *
	 * @param     Membro $membro  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByMembroRelatedByInstituicaoId($membro, $comparison = null)
	{
		if ($membro instanceof Membro) {
			return $this
				->addUsingAlias(IgrejaPeer::ID, $membro->getInstituicaoId(), $comparison);
		} elseif ($membro instanceof PropelCollection) {
			return $this
				->useMembroRelatedByInstituicaoIdQuery()
				->filterByPrimaryKeys($membro->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByMembroRelatedByInstituicaoId() only accepts arguments of type Membro or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the MembroRelatedByInstituicaoId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function joinMembroRelatedByInstituicaoId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('MembroRelatedByInstituicaoId');

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
			$this->addJoinObject($join, 'MembroRelatedByInstituicaoId');
		}

		return $this;
	}

	/**
	 * Use the MembroRelatedByInstituicaoId relation Membro object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MembroQuery A secondary query class using the current class as primary query
	 */
	public function useMembroRelatedByInstituicaoIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinMembroRelatedByInstituicaoId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'MembroRelatedByInstituicaoId', 'MembroQuery');
	}

	/**
	 * Filter the query by a related Ministerio object
	 *
	 * @param     Ministerio $ministerio  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByMinisterioRelatedByIgrejaPertencenteId($ministerio, $comparison = null)
	{
		if ($ministerio instanceof Ministerio) {
			return $this
				->addUsingAlias(IgrejaPeer::ID, $ministerio->getIgrejaPertencenteId(), $comparison);
		} elseif ($ministerio instanceof PropelCollection) {
			return $this
				->useMinisterioRelatedByIgrejaPertencenteIdQuery()
				->filterByPrimaryKeys($ministerio->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByMinisterioRelatedByIgrejaPertencenteId() only accepts arguments of type Ministerio or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the MinisterioRelatedByIgrejaPertencenteId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function joinMinisterioRelatedByIgrejaPertencenteId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('MinisterioRelatedByIgrejaPertencenteId');

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
			$this->addJoinObject($join, 'MinisterioRelatedByIgrejaPertencenteId');
		}

		return $this;
	}

	/**
	 * Use the MinisterioRelatedByIgrejaPertencenteId relation Ministerio object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MinisterioQuery A secondary query class using the current class as primary query
	 */
	public function useMinisterioRelatedByIgrejaPertencenteIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinMinisterioRelatedByIgrejaPertencenteId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'MinisterioRelatedByIgrejaPertencenteId', 'MinisterioQuery');
	}

	/**
	 * Filter the query by a related Ministerio object
	 *
	 * @param     Ministerio $ministerio  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByMinisterioRelatedByInstituicaoId($ministerio, $comparison = null)
	{
		if ($ministerio instanceof Ministerio) {
			return $this
				->addUsingAlias(IgrejaPeer::ID, $ministerio->getInstituicaoId(), $comparison);
		} elseif ($ministerio instanceof PropelCollection) {
			return $this
				->useMinisterioRelatedByInstituicaoIdQuery()
				->filterByPrimaryKeys($ministerio->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByMinisterioRelatedByInstituicaoId() only accepts arguments of type Ministerio or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the MinisterioRelatedByInstituicaoId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function joinMinisterioRelatedByInstituicaoId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('MinisterioRelatedByInstituicaoId');

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
			$this->addJoinObject($join, 'MinisterioRelatedByInstituicaoId');
		}

		return $this;
	}

	/**
	 * Use the MinisterioRelatedByInstituicaoId relation Ministerio object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    MinisterioQuery A secondary query class using the current class as primary query
	 */
	public function useMinisterioRelatedByInstituicaoIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinMinisterioRelatedByInstituicaoId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'MinisterioRelatedByInstituicaoId', 'MinisterioQuery');
	}

	/**
	 * Filter the query by a related NoticiaIgreja object
	 *
	 * @param     NoticiaIgreja $noticiaIgreja  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByNoticiaIgreja($noticiaIgreja, $comparison = null)
	{
		if ($noticiaIgreja instanceof NoticiaIgreja) {
			return $this
				->addUsingAlias(IgrejaPeer::ID, $noticiaIgreja->getIgrejaId(), $comparison);
		} elseif ($noticiaIgreja instanceof PropelCollection) {
			return $this
				->useNoticiaIgrejaQuery()
				->filterByPrimaryKeys($noticiaIgreja->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByNoticiaIgreja() only accepts arguments of type NoticiaIgreja or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the NoticiaIgreja relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function joinNoticiaIgreja($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('NoticiaIgreja');

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
			$this->addJoinObject($join, 'NoticiaIgreja');
		}

		return $this;
	}

	/**
	 * Use the NoticiaIgreja relation NoticiaIgreja object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NoticiaIgrejaQuery A secondary query class using the current class as primary query
	 */
	public function useNoticiaIgrejaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinNoticiaIgreja($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'NoticiaIgreja', 'NoticiaIgrejaQuery');
	}

	/**
	 * Filter the query by a related PedidoOracao object
	 *
	 * @param     PedidoOracao $pedidoOracao  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByPedidoOracao($pedidoOracao, $comparison = null)
	{
		if ($pedidoOracao instanceof PedidoOracao) {
			return $this
				->addUsingAlias(IgrejaPeer::ID, $pedidoOracao->getInstituicaoId(), $comparison);
		} elseif ($pedidoOracao instanceof PropelCollection) {
			return $this
				->usePedidoOracaoQuery()
				->filterByPrimaryKeys($pedidoOracao->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByPedidoOracao() only accepts arguments of type PedidoOracao or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the PedidoOracao relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function joinPedidoOracao($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PedidoOracao');

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
			$this->addJoinObject($join, 'PedidoOracao');
		}

		return $this;
	}

	/**
	 * Use the PedidoOracao relation PedidoOracao object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PedidoOracaoQuery A secondary query class using the current class as primary query
	 */
	public function usePedidoOracaoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPedidoOracao($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PedidoOracao', 'PedidoOracaoQuery');
	}

	/**
	 * Filter the query by a related Pg object
	 *
	 * @param     Pg $pg  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByPg($pg, $comparison = null)
	{
		if ($pg instanceof Pg) {
			return $this
				->addUsingAlias(IgrejaPeer::ID, $pg->getIgrejaResponsavelId(), $comparison);
		} elseif ($pg instanceof PropelCollection) {
			return $this
				->usePgQuery()
				->filterByPrimaryKeys($pg->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByPg() only accepts arguments of type Pg or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the Pg relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function joinPg($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Pg');

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
			$this->addJoinObject($join, 'Pg');
		}

		return $this;
	}

	/**
	 * Use the Pg relation Pg object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PgQuery A secondary query class using the current class as primary query
	 */
	public function usePgQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPg($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Pg', 'PgQuery');
	}

	/**
	 * Filter the query by a related PodcastIgreja object
	 *
	 * @param     PodcastIgreja $podcastIgreja  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByPodcastIgreja($podcastIgreja, $comparison = null)
	{
		if ($podcastIgreja instanceof PodcastIgreja) {
			return $this
				->addUsingAlias(IgrejaPeer::ID, $podcastIgreja->getIgrejaId(), $comparison);
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
	 * @return    IgrejaQuery The current query, for fluid interface
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
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario $usuario  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByUsuarioRelatedByFilialId($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(IgrejaPeer::ID, $usuario->getFilialId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			return $this
				->useUsuarioRelatedByFilialIdQuery()
				->filterByPrimaryKeys($usuario->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByUsuarioRelatedByFilialId() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UsuarioRelatedByFilialId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function joinUsuarioRelatedByFilialId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UsuarioRelatedByFilialId');

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
			$this->addJoinObject($join, 'UsuarioRelatedByFilialId');
		}

		return $this;
	}

	/**
	 * Use the UsuarioRelatedByFilialId relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioRelatedByFilialIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUsuarioRelatedByFilialId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UsuarioRelatedByFilialId', 'UsuarioQuery');
	}

	/**
	 * Filter the query by a related Usuario object
	 *
	 * @param     Usuario $usuario  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByUsuarioRelatedByInstituicaoId($usuario, $comparison = null)
	{
		if ($usuario instanceof Usuario) {
			return $this
				->addUsingAlias(IgrejaPeer::ID, $usuario->getInstituicaoId(), $comparison);
		} elseif ($usuario instanceof PropelCollection) {
			return $this
				->useUsuarioRelatedByInstituicaoIdQuery()
				->filterByPrimaryKeys($usuario->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByUsuarioRelatedByInstituicaoId() only accepts arguments of type Usuario or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UsuarioRelatedByInstituicaoId relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function joinUsuarioRelatedByInstituicaoId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UsuarioRelatedByInstituicaoId');

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
			$this->addJoinObject($join, 'UsuarioRelatedByInstituicaoId');
		}

		return $this;
	}

	/**
	 * Use the UsuarioRelatedByInstituicaoId relation Usuario object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioRelatedByInstituicaoIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUsuarioRelatedByInstituicaoId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UsuarioRelatedByInstituicaoId', 'UsuarioQuery');
	}

	/**
	 * Filter the query by a related UsuarioFilial object
	 *
	 * @param     UsuarioFilial $usuarioFilial  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByUsuarioFilial($usuarioFilial, $comparison = null)
	{
		if ($usuarioFilial instanceof UsuarioFilial) {
			return $this
				->addUsingAlias(IgrejaPeer::ID, $usuarioFilial->getFilialId(), $comparison);
		} elseif ($usuarioFilial instanceof PropelCollection) {
			return $this
				->useUsuarioFilialQuery()
				->filterByPrimaryKeys($usuarioFilial->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByUsuarioFilial() only accepts arguments of type UsuarioFilial or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the UsuarioFilial relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function joinUsuarioFilial($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UsuarioFilial');

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
			$this->addJoinObject($join, 'UsuarioFilial');
		}

		return $this;
	}

	/**
	 * Use the UsuarioFilial relation UsuarioFilial object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UsuarioFilialQuery A secondary query class using the current class as primary query
	 */
	public function useUsuarioFilialQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinUsuarioFilial($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UsuarioFilial', 'UsuarioFilialQuery');
	}

	/**
	 * Filter the query by a related VideoIgreja object
	 *
	 * @param     VideoIgreja $videoIgreja  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByVideoIgreja($videoIgreja, $comparison = null)
	{
		if ($videoIgreja instanceof VideoIgreja) {
			return $this
				->addUsingAlias(IgrejaPeer::ID, $videoIgreja->getIgrejaId(), $comparison);
		} elseif ($videoIgreja instanceof PropelCollection) {
			return $this
				->useVideoIgrejaQuery()
				->filterByPrimaryKeys($videoIgreja->getPrimaryKeys())
				->endUse();
		} else {
			throw new PropelException('filterByVideoIgreja() only accepts arguments of type VideoIgreja or PropelCollection');
		}
	}

	/**
	 * Adds a JOIN clause to the query using the VideoIgreja relation
	 *
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function joinVideoIgreja($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('VideoIgreja');

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
			$this->addJoinObject($join, 'VideoIgreja');
		}

		return $this;
	}

	/**
	 * Use the VideoIgreja relation VideoIgreja object
	 *
	 * @see       useQuery()
	 *
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    VideoIgrejaQuery A secondary query class using the current class as primary query
	 */
	public function useVideoIgrejaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinVideoIgreja($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'VideoIgreja', 'VideoIgrejaQuery');
	}

	/**
	 * Filter the query by a related Agenda object
	 * using the agenda_igreja table as cross reference
	 *
	 * @param     Agenda $agenda the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByAgenda($agenda, $comparison = Criteria::EQUAL)
	{
		return $this
			->useAgendaIgrejaQuery()
			->filterByAgenda($agenda, $comparison)
			->endUse();
	}

	/**
	 * Filter the query by a related Noticia object
	 * using the noticia_igreja table as cross reference
	 *
	 * @param     Noticia $noticia the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByNoticia($noticia, $comparison = Criteria::EQUAL)
	{
		return $this
			->useNoticiaIgrejaQuery()
			->filterByNoticia($noticia, $comparison)
			->endUse();
	}

	/**
	 * Filter the query by a related Podcast object
	 * using the podcast_igreja table as cross reference
	 *
	 * @param     Podcast $podcast the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByPodcast($podcast, $comparison = Criteria::EQUAL)
	{
		return $this
			->usePodcastIgrejaQuery()
			->filterByPodcast($podcast, $comparison)
			->endUse();
	}

	/**
	 * Filter the query by a related Usuario object
	 * using the usuario_filial table as cross reference
	 *
	 * @param     Usuario $usuario the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByUsuario($usuario, $comparison = Criteria::EQUAL)
	{
		return $this
			->useUsuarioFilialQuery()
			->filterByUsuario($usuario, $comparison)
			->endUse();
	}

	/**
	 * Filter the query by a related Video object
	 * using the video_igreja table as cross reference
	 *
	 * @param     Video $video the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function filterByVideo($video, $comparison = Criteria::EQUAL)
	{
		return $this
			->useVideoIgrejaQuery()
			->filterByVideo($video, $comparison)
			->endUse();
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Igreja $igreja Object to remove from the list of results
	 *
	 * @return    IgrejaQuery The current query, for fluid interface
	 */
	public function prune($igreja = null)
	{
		if ($igreja) {
			$this->addUsingAlias(IgrejaPeer::ID, $igreja->getId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // BaseIgrejaQuery