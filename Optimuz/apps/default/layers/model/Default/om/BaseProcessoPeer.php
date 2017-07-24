<?php


/**
 * Base static class for performing query and update operations on the 'processo' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseProcessoPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'Default';

	/** the table name for this class */
	const TABLE_NAME = 'processo';

	/** the related Propel class for this table */
	const OM_CLASS = 'Processo';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'Default.Processo';

	/** the related TableMap class for this table */
	const TM_CLASS = 'ProcessoTableMap';

	/** The total number of columns. */
	const NUM_COLUMNS = 24;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
	const NUM_HYDRATE_COLUMNS = 24;

	/** the column name for the ID field */
	const ID = 'processo.ID';

	/** the column name for the ADVOGADO_ID field */
	const ADVOGADO_ID = 'processo.ADVOGADO_ID';

	/** the column name for the CLIENTE_ID field */
	const CLIENTE_ID = 'processo.CLIENTE_ID';

	/** the column name for the CONTRATO_ID field */
	const CONTRATO_ID = 'processo.CONTRATO_ID';

	/** the column name for the FASE_PROCESSO_ID field */
	const FASE_PROCESSO_ID = 'processo.FASE_PROCESSO_ID';

	/** the column name for the AREA_ADVOCACIA_ID field */
	const AREA_ADVOCACIA_ID = 'processo.AREA_ADVOCACIA_ID';

	/** the column name for the TRIBUNAL_ID field */
	const TRIBUNAL_ID = 'processo.TRIBUNAL_ID';

	/** the column name for the UF_ID field */
	const UF_ID = 'processo.UF_ID';

	/** the column name for the NOME_PROCESSO field */
	const NOME_PROCESSO = 'processo.NOME_PROCESSO';

	/** the column name for the NUMERO_CNJ field */
	const NUMERO_CNJ = 'processo.NUMERO_CNJ';

	/** the column name for the NUMERO_PROCESSO field */
	const NUMERO_PROCESSO = 'processo.NUMERO_PROCESSO';

	/** the column name for the TIPO_PROCESSO field */
	const TIPO_PROCESSO = 'processo.TIPO_PROCESSO';

	/** the column name for the SITUACAO_CLIENTE field */
	const SITUACAO_CLIENTE = 'processo.SITUACAO_CLIENTE';

	/** the column name for the DESCRICAO field */
	const DESCRICAO = 'processo.DESCRICAO';

	/** the column name for the OBJETIVO_FINAL field */
	const OBJETIVO_FINAL = 'processo.OBJETIVO_FINAL';

	/** the column name for the DATA_ABERTURA field */
	const DATA_ABERTURA = 'processo.DATA_ABERTURA';

	/** the column name for the DATA_FECHAMENTO field */
	const DATA_FECHAMENTO = 'processo.DATA_FECHAMENTO';

	/** the column name for the ATIVO field */
	const ATIVO = 'processo.ATIVO';

	/** the column name for the VALOR_CAUSA field */
	const VALOR_CAUSA = 'processo.VALOR_CAUSA';

	/** the column name for the VALOR_PROCESSO field */
	const VALOR_PROCESSO = 'processo.VALOR_PROCESSO';

	/** the column name for the VALOR_CONTIGENCIA field */
	const VALOR_CONTIGENCIA = 'processo.VALOR_CONTIGENCIA';

	/** the column name for the VALOR_GARANTIA_JUIZO field */
	const VALOR_GARANTIA_JUIZO = 'processo.VALOR_GARANTIA_JUIZO';

	/** the column name for the VALOR_DEPOSITO_RECURSAL field */
	const VALOR_DEPOSITO_RECURSAL = 'processo.VALOR_DEPOSITO_RECURSAL';

	/** the column name for the ANALISE_RISCO field */
	const ANALISE_RISCO = 'processo.ANALISE_RISCO';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * An identiy map to hold any loaded instances of Processo objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array Processo[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'AdvogadoId', 'ClienteId', 'ContratoId', 'FaseProcessoId', 'AreaAdvocaciaId', 'TribunalId', 'UfId', 'NomeProcesso', 'NumeroCnj', 'NumeroProcesso', 'TipoProcesso', 'SituacaoCliente', 'Descricao', 'ObjetivoFinal', 'DataAbertura', 'DataFechamento', 'Ativo', 'ValorCausa', 'ValorProcesso', 'ValorContigencia', 'ValorGarantiaJuizo', 'ValorDepositoRecursal', 'AnaliseRisco', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'advogadoId', 'clienteId', 'contratoId', 'faseProcessoId', 'areaAdvocaciaId', 'tribunalId', 'ufId', 'nomeProcesso', 'numeroCnj', 'numeroProcesso', 'tipoProcesso', 'situacaoCliente', 'descricao', 'objetivoFinal', 'dataAbertura', 'dataFechamento', 'ativo', 'valorCausa', 'valorProcesso', 'valorContigencia', 'valorGarantiaJuizo', 'valorDepositoRecursal', 'analiseRisco', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::ADVOGADO_ID, self::CLIENTE_ID, self::CONTRATO_ID, self::FASE_PROCESSO_ID, self::AREA_ADVOCACIA_ID, self::TRIBUNAL_ID, self::UF_ID, self::NOME_PROCESSO, self::NUMERO_CNJ, self::NUMERO_PROCESSO, self::TIPO_PROCESSO, self::SITUACAO_CLIENTE, self::DESCRICAO, self::OBJETIVO_FINAL, self::DATA_ABERTURA, self::DATA_FECHAMENTO, self::ATIVO, self::VALOR_CAUSA, self::VALOR_PROCESSO, self::VALOR_CONTIGENCIA, self::VALOR_GARANTIA_JUIZO, self::VALOR_DEPOSITO_RECURSAL, self::ANALISE_RISCO, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'ADVOGADO_ID', 'CLIENTE_ID', 'CONTRATO_ID', 'FASE_PROCESSO_ID', 'AREA_ADVOCACIA_ID', 'TRIBUNAL_ID', 'UF_ID', 'NOME_PROCESSO', 'NUMERO_CNJ', 'NUMERO_PROCESSO', 'TIPO_PROCESSO', 'SITUACAO_CLIENTE', 'DESCRICAO', 'OBJETIVO_FINAL', 'DATA_ABERTURA', 'DATA_FECHAMENTO', 'ATIVO', 'VALOR_CAUSA', 'VALOR_PROCESSO', 'VALOR_CONTIGENCIA', 'VALOR_GARANTIA_JUIZO', 'VALOR_DEPOSITO_RECURSAL', 'ANALISE_RISCO', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'advogado_id', 'cliente_id', 'contrato_id', 'fase_processo_id', 'area_advocacia_id', 'tribunal_id', 'uf_id', 'nome_processo', 'numero_cnj', 'numero_processo', 'tipo_processo', 'situacao_cliente', 'descricao', 'objetivo_final', 'data_abertura', 'data_fechamento', 'ativo', 'valor_causa', 'valor_processo', 'valor_contigencia', 'valor_garantia_juizo', 'valor_deposito_recursal', 'analise_risco', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'AdvogadoId' => 1, 'ClienteId' => 2, 'ContratoId' => 3, 'FaseProcessoId' => 4, 'AreaAdvocaciaId' => 5, 'TribunalId' => 6, 'UfId' => 7, 'NomeProcesso' => 8, 'NumeroCnj' => 9, 'NumeroProcesso' => 10, 'TipoProcesso' => 11, 'SituacaoCliente' => 12, 'Descricao' => 13, 'ObjetivoFinal' => 14, 'DataAbertura' => 15, 'DataFechamento' => 16, 'Ativo' => 17, 'ValorCausa' => 18, 'ValorProcesso' => 19, 'ValorContigencia' => 20, 'ValorGarantiaJuizo' => 21, 'ValorDepositoRecursal' => 22, 'AnaliseRisco' => 23, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'advogadoId' => 1, 'clienteId' => 2, 'contratoId' => 3, 'faseProcessoId' => 4, 'areaAdvocaciaId' => 5, 'tribunalId' => 6, 'ufId' => 7, 'nomeProcesso' => 8, 'numeroCnj' => 9, 'numeroProcesso' => 10, 'tipoProcesso' => 11, 'situacaoCliente' => 12, 'descricao' => 13, 'objetivoFinal' => 14, 'dataAbertura' => 15, 'dataFechamento' => 16, 'ativo' => 17, 'valorCausa' => 18, 'valorProcesso' => 19, 'valorContigencia' => 20, 'valorGarantiaJuizo' => 21, 'valorDepositoRecursal' => 22, 'analiseRisco' => 23, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::ADVOGADO_ID => 1, self::CLIENTE_ID => 2, self::CONTRATO_ID => 3, self::FASE_PROCESSO_ID => 4, self::AREA_ADVOCACIA_ID => 5, self::TRIBUNAL_ID => 6, self::UF_ID => 7, self::NOME_PROCESSO => 8, self::NUMERO_CNJ => 9, self::NUMERO_PROCESSO => 10, self::TIPO_PROCESSO => 11, self::SITUACAO_CLIENTE => 12, self::DESCRICAO => 13, self::OBJETIVO_FINAL => 14, self::DATA_ABERTURA => 15, self::DATA_FECHAMENTO => 16, self::ATIVO => 17, self::VALOR_CAUSA => 18, self::VALOR_PROCESSO => 19, self::VALOR_CONTIGENCIA => 20, self::VALOR_GARANTIA_JUIZO => 21, self::VALOR_DEPOSITO_RECURSAL => 22, self::ANALISE_RISCO => 23, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'ADVOGADO_ID' => 1, 'CLIENTE_ID' => 2, 'CONTRATO_ID' => 3, 'FASE_PROCESSO_ID' => 4, 'AREA_ADVOCACIA_ID' => 5, 'TRIBUNAL_ID' => 6, 'UF_ID' => 7, 'NOME_PROCESSO' => 8, 'NUMERO_CNJ' => 9, 'NUMERO_PROCESSO' => 10, 'TIPO_PROCESSO' => 11, 'SITUACAO_CLIENTE' => 12, 'DESCRICAO' => 13, 'OBJETIVO_FINAL' => 14, 'DATA_ABERTURA' => 15, 'DATA_FECHAMENTO' => 16, 'ATIVO' => 17, 'VALOR_CAUSA' => 18, 'VALOR_PROCESSO' => 19, 'VALOR_CONTIGENCIA' => 20, 'VALOR_GARANTIA_JUIZO' => 21, 'VALOR_DEPOSITO_RECURSAL' => 22, 'ANALISE_RISCO' => 23, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'advogado_id' => 1, 'cliente_id' => 2, 'contrato_id' => 3, 'fase_processo_id' => 4, 'area_advocacia_id' => 5, 'tribunal_id' => 6, 'uf_id' => 7, 'nome_processo' => 8, 'numero_cnj' => 9, 'numero_processo' => 10, 'tipo_processo' => 11, 'situacao_cliente' => 12, 'descricao' => 13, 'objetivo_final' => 14, 'data_abertura' => 15, 'data_fechamento' => 16, 'ativo' => 17, 'valor_causa' => 18, 'valor_processo' => 19, 'valor_contigencia' => 20, 'valor_garantia_juizo' => 21, 'valor_deposito_recursal' => 22, 'analise_risco' => 23, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, )
	);

	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. ProcessoPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(ProcessoPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      Criteria $criteria object containing the columns to add.
	 * @param      string   $alias    optional table alias
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $alias = null)
	{
		if (null === $alias) {
			$criteria->addSelectColumn(ProcessoPeer::ID);
			$criteria->addSelectColumn(ProcessoPeer::ADVOGADO_ID);
			$criteria->addSelectColumn(ProcessoPeer::CLIENTE_ID);
			$criteria->addSelectColumn(ProcessoPeer::CONTRATO_ID);
			$criteria->addSelectColumn(ProcessoPeer::FASE_PROCESSO_ID);
			$criteria->addSelectColumn(ProcessoPeer::AREA_ADVOCACIA_ID);
			$criteria->addSelectColumn(ProcessoPeer::TRIBUNAL_ID);
			$criteria->addSelectColumn(ProcessoPeer::UF_ID);
			$criteria->addSelectColumn(ProcessoPeer::NOME_PROCESSO);
			$criteria->addSelectColumn(ProcessoPeer::NUMERO_CNJ);
			$criteria->addSelectColumn(ProcessoPeer::NUMERO_PROCESSO);
			$criteria->addSelectColumn(ProcessoPeer::TIPO_PROCESSO);
			$criteria->addSelectColumn(ProcessoPeer::SITUACAO_CLIENTE);
			$criteria->addSelectColumn(ProcessoPeer::DESCRICAO);
			$criteria->addSelectColumn(ProcessoPeer::OBJETIVO_FINAL);
			$criteria->addSelectColumn(ProcessoPeer::DATA_ABERTURA);
			$criteria->addSelectColumn(ProcessoPeer::DATA_FECHAMENTO);
			$criteria->addSelectColumn(ProcessoPeer::ATIVO);
			$criteria->addSelectColumn(ProcessoPeer::VALOR_CAUSA);
			$criteria->addSelectColumn(ProcessoPeer::VALOR_PROCESSO);
			$criteria->addSelectColumn(ProcessoPeer::VALOR_CONTIGENCIA);
			$criteria->addSelectColumn(ProcessoPeer::VALOR_GARANTIA_JUIZO);
			$criteria->addSelectColumn(ProcessoPeer::VALOR_DEPOSITO_RECURSAL);
			$criteria->addSelectColumn(ProcessoPeer::ANALISE_RISCO);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.ADVOGADO_ID');
			$criteria->addSelectColumn($alias . '.CLIENTE_ID');
			$criteria->addSelectColumn($alias . '.CONTRATO_ID');
			$criteria->addSelectColumn($alias . '.FASE_PROCESSO_ID');
			$criteria->addSelectColumn($alias . '.AREA_ADVOCACIA_ID');
			$criteria->addSelectColumn($alias . '.TRIBUNAL_ID');
			$criteria->addSelectColumn($alias . '.UF_ID');
			$criteria->addSelectColumn($alias . '.NOME_PROCESSO');
			$criteria->addSelectColumn($alias . '.NUMERO_CNJ');
			$criteria->addSelectColumn($alias . '.NUMERO_PROCESSO');
			$criteria->addSelectColumn($alias . '.TIPO_PROCESSO');
			$criteria->addSelectColumn($alias . '.SITUACAO_CLIENTE');
			$criteria->addSelectColumn($alias . '.DESCRICAO');
			$criteria->addSelectColumn($alias . '.OBJETIVO_FINAL');
			$criteria->addSelectColumn($alias . '.DATA_ABERTURA');
			$criteria->addSelectColumn($alias . '.DATA_FECHAMENTO');
			$criteria->addSelectColumn($alias . '.ATIVO');
			$criteria->addSelectColumn($alias . '.VALOR_CAUSA');
			$criteria->addSelectColumn($alias . '.VALOR_PROCESSO');
			$criteria->addSelectColumn($alias . '.VALOR_CONTIGENCIA');
			$criteria->addSelectColumn($alias . '.VALOR_GARANTIA_JUIZO');
			$criteria->addSelectColumn($alias . '.VALOR_DEPOSITO_RECURSAL');
			$criteria->addSelectColumn($alias . '.ANALISE_RISCO');
		}
	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProcessoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProcessoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}
	/**
	 * Selects one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     Processo
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ProcessoPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Selects several row from the DB.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return ProcessoPeer::populateObjects(ProcessoPeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			ProcessoPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		// BasePeer returns a PDOStatement
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param      Processo $value A Processo object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool($obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} // if key === null
			self::$instances[$key] = $obj;
		}
	}

	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param      mixed $value A Processo object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Processo) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Processo object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     Processo Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Method to invalidate the instance pool of all tables related to processo
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
		if ($row[$startcol] === null) {
			return null;
		}
		return (string) $row[$startcol];
	}

	/**
	 * Retrieves the primary key from the DB resultset row
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, an array of the primary key columns will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     mixed The primary key of the row
	 */
	public static function getPrimaryKeyFromRow($row, $startcol = 0)
	{
		return (int) $row[$startcol];
	}
	
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = ProcessoPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = ProcessoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = ProcessoPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				ProcessoPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}
	/**
	 * Populates an object of the default type or an object that inherit from the default.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     array (Processo object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = ProcessoPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = ProcessoPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + ProcessoPeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = ProcessoPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			ProcessoPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Advogado table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAdvogado(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProcessoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProcessoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ProcessoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related AreaAdvocacia table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAreaAdvocacia(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProcessoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProcessoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ProcessoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Contrato table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinContrato(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProcessoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProcessoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ProcessoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related FaseProcesso table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinFaseProcesso(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProcessoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProcessoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ProcessoPeer::FASE_PROCESSO_ID, FaseProcessoPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Tribunal table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinTribunal(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProcessoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProcessoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ProcessoPeer::TRIBUNAL_ID, TribunalPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Uf table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinUf(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProcessoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProcessoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ProcessoPeer::UF_ID, UfPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Cliente table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinCliente(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProcessoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProcessoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ProcessoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Selects a collection of Processo objects pre-filled with their Advogado objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Processo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAdvogado(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProcessoPeer::addSelectColumns($criteria);
		$startcol = ProcessoPeer::NUM_HYDRATE_COLUMNS;
		AdvogadoPeer::addSelectColumns($criteria);

		$criteria->addJoin(ProcessoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProcessoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProcessoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ProcessoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProcessoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = AdvogadoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = AdvogadoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = AdvogadoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					AdvogadoPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Processo) to $obj2 (Advogado)
				$obj2->addProcesso($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Processo objects pre-filled with their AreaAdvocacia objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Processo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAreaAdvocacia(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProcessoPeer::addSelectColumns($criteria);
		$startcol = ProcessoPeer::NUM_HYDRATE_COLUMNS;
		AreaAdvocaciaPeer::addSelectColumns($criteria);

		$criteria->addJoin(ProcessoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProcessoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProcessoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ProcessoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProcessoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = AreaAdvocaciaPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = AreaAdvocaciaPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = AreaAdvocaciaPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					AreaAdvocaciaPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Processo) to $obj2 (AreaAdvocacia)
				$obj2->addProcesso($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Processo objects pre-filled with their Contrato objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Processo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinContrato(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProcessoPeer::addSelectColumns($criteria);
		$startcol = ProcessoPeer::NUM_HYDRATE_COLUMNS;
		ContratoPeer::addSelectColumns($criteria);

		$criteria->addJoin(ProcessoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProcessoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProcessoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ProcessoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProcessoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = ContratoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ContratoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ContratoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ContratoPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Processo) to $obj2 (Contrato)
				$obj2->addProcesso($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Processo objects pre-filled with their FaseProcesso objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Processo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinFaseProcesso(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProcessoPeer::addSelectColumns($criteria);
		$startcol = ProcessoPeer::NUM_HYDRATE_COLUMNS;
		FaseProcessoPeer::addSelectColumns($criteria);

		$criteria->addJoin(ProcessoPeer::FASE_PROCESSO_ID, FaseProcessoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProcessoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProcessoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ProcessoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProcessoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = FaseProcessoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = FaseProcessoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = FaseProcessoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					FaseProcessoPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Processo) to $obj2 (FaseProcesso)
				$obj2->addProcesso($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Processo objects pre-filled with their Tribunal objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Processo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinTribunal(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProcessoPeer::addSelectColumns($criteria);
		$startcol = ProcessoPeer::NUM_HYDRATE_COLUMNS;
		TribunalPeer::addSelectColumns($criteria);

		$criteria->addJoin(ProcessoPeer::TRIBUNAL_ID, TribunalPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProcessoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProcessoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ProcessoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProcessoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = TribunalPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = TribunalPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = TribunalPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					TribunalPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Processo) to $obj2 (Tribunal)
				$obj2->addProcesso($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Processo objects pre-filled with their Uf objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Processo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinUf(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProcessoPeer::addSelectColumns($criteria);
		$startcol = ProcessoPeer::NUM_HYDRATE_COLUMNS;
		UfPeer::addSelectColumns($criteria);

		$criteria->addJoin(ProcessoPeer::UF_ID, UfPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProcessoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProcessoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ProcessoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProcessoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = UfPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = UfPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = UfPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					UfPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Processo) to $obj2 (Uf)
				$obj2->addProcesso($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Processo objects pre-filled with their Cliente objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Processo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinCliente(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProcessoPeer::addSelectColumns($criteria);
		$startcol = ProcessoPeer::NUM_HYDRATE_COLUMNS;
		ClientePeer::addSelectColumns($criteria);

		$criteria->addJoin(ProcessoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProcessoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProcessoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = ProcessoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProcessoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ClientePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = ClientePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ClientePeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Processo) to $obj2 (Cliente)
				$obj2->addProcesso($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining all related tables
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProcessoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProcessoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(ProcessoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::FASE_PROCESSO_ID, FaseProcessoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::TRIBUNAL_ID, TribunalPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::UF_ID, UfPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}

	/**
	 * Selects a collection of Processo objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Processo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProcessoPeer::addSelectColumns($criteria);
		$startcol2 = ProcessoPeer::NUM_HYDRATE_COLUMNS;

		AdvogadoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + AdvogadoPeer::NUM_HYDRATE_COLUMNS;

		AreaAdvocaciaPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + AreaAdvocaciaPeer::NUM_HYDRATE_COLUMNS;

		ContratoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + ContratoPeer::NUM_HYDRATE_COLUMNS;

		FaseProcessoPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + FaseProcessoPeer::NUM_HYDRATE_COLUMNS;

		TribunalPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + TribunalPeer::NUM_HYDRATE_COLUMNS;

		UfPeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + UfPeer::NUM_HYDRATE_COLUMNS;

		ClientePeer::addSelectColumns($criteria);
		$startcol9 = $startcol8 + ClientePeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(ProcessoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::FASE_PROCESSO_ID, FaseProcessoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::TRIBUNAL_ID, TribunalPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::UF_ID, UfPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProcessoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProcessoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ProcessoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProcessoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined Advogado rows

			$key2 = AdvogadoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = AdvogadoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = AdvogadoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					AdvogadoPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (Processo) to the collection in $obj2 (Advogado)
				$obj2->addProcesso($obj1);
			} // if joined row not null

			// Add objects for joined AreaAdvocacia rows

			$key3 = AreaAdvocaciaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = AreaAdvocaciaPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = AreaAdvocaciaPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					AreaAdvocaciaPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (Processo) to the collection in $obj3 (AreaAdvocacia)
				$obj3->addProcesso($obj1);
			} // if joined row not null

			// Add objects for joined Contrato rows

			$key4 = ContratoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = ContratoPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = ContratoPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ContratoPeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (Processo) to the collection in $obj4 (Contrato)
				$obj4->addProcesso($obj1);
			} // if joined row not null

			// Add objects for joined FaseProcesso rows

			$key5 = FaseProcessoPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = FaseProcessoPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$cls = FaseProcessoPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					FaseProcessoPeer::addInstanceToPool($obj5, $key5);
				} // if obj5 loaded

				// Add the $obj1 (Processo) to the collection in $obj5 (FaseProcesso)
				$obj5->addProcesso($obj1);
			} // if joined row not null

			// Add objects for joined Tribunal rows

			$key6 = TribunalPeer::getPrimaryKeyHashFromRow($row, $startcol6);
			if ($key6 !== null) {
				$obj6 = TribunalPeer::getInstanceFromPool($key6);
				if (!$obj6) {

					$cls = TribunalPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					TribunalPeer::addInstanceToPool($obj6, $key6);
				} // if obj6 loaded

				// Add the $obj1 (Processo) to the collection in $obj6 (Tribunal)
				$obj6->addProcesso($obj1);
			} // if joined row not null

			// Add objects for joined Uf rows

			$key7 = UfPeer::getPrimaryKeyHashFromRow($row, $startcol7);
			if ($key7 !== null) {
				$obj7 = UfPeer::getInstanceFromPool($key7);
				if (!$obj7) {

					$cls = UfPeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					UfPeer::addInstanceToPool($obj7, $key7);
				} // if obj7 loaded

				// Add the $obj1 (Processo) to the collection in $obj7 (Uf)
				$obj7->addProcesso($obj1);
			} // if joined row not null

			// Add objects for joined Cliente rows

			$key8 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol8);
			if ($key8 !== null) {
				$obj8 = ClientePeer::getInstanceFromPool($key8);
				if (!$obj8) {

					$cls = ClientePeer::getOMClass(false);

					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					ClientePeer::addInstanceToPool($obj8, $key8);
				} // if obj8 loaded

				// Add the $obj1 (Processo) to the collection in $obj8 (Cliente)
				$obj8->addProcesso($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Advogado table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptAdvogado(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProcessoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProcessoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ProcessoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::FASE_PROCESSO_ID, FaseProcessoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::TRIBUNAL_ID, TribunalPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::UF_ID, UfPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related AreaAdvocacia table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptAreaAdvocacia(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProcessoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProcessoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ProcessoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::FASE_PROCESSO_ID, FaseProcessoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::TRIBUNAL_ID, TribunalPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::UF_ID, UfPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Contrato table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptContrato(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProcessoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProcessoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ProcessoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::FASE_PROCESSO_ID, FaseProcessoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::TRIBUNAL_ID, TribunalPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::UF_ID, UfPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related FaseProcesso table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptFaseProcesso(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProcessoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProcessoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ProcessoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::TRIBUNAL_ID, TribunalPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::UF_ID, UfPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Tribunal table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptTribunal(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProcessoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProcessoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ProcessoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::FASE_PROCESSO_ID, FaseProcessoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::UF_ID, UfPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Uf table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptUf(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProcessoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProcessoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ProcessoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::FASE_PROCESSO_ID, FaseProcessoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::TRIBUNAL_ID, TribunalPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Cliente table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptCliente(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(ProcessoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ProcessoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(ProcessoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::FASE_PROCESSO_ID, FaseProcessoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::TRIBUNAL_ID, TribunalPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::UF_ID, UfPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Selects a collection of Processo objects pre-filled with all related objects except Advogado.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Processo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptAdvogado(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProcessoPeer::addSelectColumns($criteria);
		$startcol2 = ProcessoPeer::NUM_HYDRATE_COLUMNS;

		AreaAdvocaciaPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + AreaAdvocaciaPeer::NUM_HYDRATE_COLUMNS;

		ContratoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + ContratoPeer::NUM_HYDRATE_COLUMNS;

		FaseProcessoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + FaseProcessoPeer::NUM_HYDRATE_COLUMNS;

		TribunalPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + TribunalPeer::NUM_HYDRATE_COLUMNS;

		UfPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + UfPeer::NUM_HYDRATE_COLUMNS;

		ClientePeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + ClientePeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(ProcessoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::FASE_PROCESSO_ID, FaseProcessoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::TRIBUNAL_ID, TribunalPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::UF_ID, UfPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProcessoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProcessoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ProcessoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProcessoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined AreaAdvocacia rows

				$key2 = AreaAdvocaciaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = AreaAdvocaciaPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = AreaAdvocaciaPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					AreaAdvocaciaPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Processo) to the collection in $obj2 (AreaAdvocacia)
				$obj2->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Contrato rows

				$key3 = ContratoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ContratoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ContratoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ContratoPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Processo) to the collection in $obj3 (Contrato)
				$obj3->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined FaseProcesso rows

				$key4 = FaseProcessoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = FaseProcessoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = FaseProcessoPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					FaseProcessoPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Processo) to the collection in $obj4 (FaseProcesso)
				$obj4->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Tribunal rows

				$key5 = TribunalPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = TribunalPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = TribunalPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					TribunalPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Processo) to the collection in $obj5 (Tribunal)
				$obj5->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Uf rows

				$key6 = UfPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = UfPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = UfPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					UfPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (Processo) to the collection in $obj6 (Uf)
				$obj6->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Cliente rows

				$key7 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = ClientePeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$cls = ClientePeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					ClientePeer::addInstanceToPool($obj7, $key7);
				} // if $obj7 already loaded

				// Add the $obj1 (Processo) to the collection in $obj7 (Cliente)
				$obj7->addProcesso($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Processo objects pre-filled with all related objects except AreaAdvocacia.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Processo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptAreaAdvocacia(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProcessoPeer::addSelectColumns($criteria);
		$startcol2 = ProcessoPeer::NUM_HYDRATE_COLUMNS;

		AdvogadoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + AdvogadoPeer::NUM_HYDRATE_COLUMNS;

		ContratoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + ContratoPeer::NUM_HYDRATE_COLUMNS;

		FaseProcessoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + FaseProcessoPeer::NUM_HYDRATE_COLUMNS;

		TribunalPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + TribunalPeer::NUM_HYDRATE_COLUMNS;

		UfPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + UfPeer::NUM_HYDRATE_COLUMNS;

		ClientePeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + ClientePeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(ProcessoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::FASE_PROCESSO_ID, FaseProcessoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::TRIBUNAL_ID, TribunalPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::UF_ID, UfPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProcessoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProcessoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ProcessoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProcessoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Advogado rows

				$key2 = AdvogadoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = AdvogadoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = AdvogadoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					AdvogadoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Processo) to the collection in $obj2 (Advogado)
				$obj2->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Contrato rows

				$key3 = ContratoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ContratoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ContratoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ContratoPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Processo) to the collection in $obj3 (Contrato)
				$obj3->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined FaseProcesso rows

				$key4 = FaseProcessoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = FaseProcessoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = FaseProcessoPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					FaseProcessoPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Processo) to the collection in $obj4 (FaseProcesso)
				$obj4->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Tribunal rows

				$key5 = TribunalPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = TribunalPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = TribunalPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					TribunalPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Processo) to the collection in $obj5 (Tribunal)
				$obj5->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Uf rows

				$key6 = UfPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = UfPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = UfPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					UfPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (Processo) to the collection in $obj6 (Uf)
				$obj6->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Cliente rows

				$key7 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = ClientePeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$cls = ClientePeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					ClientePeer::addInstanceToPool($obj7, $key7);
				} // if $obj7 already loaded

				// Add the $obj1 (Processo) to the collection in $obj7 (Cliente)
				$obj7->addProcesso($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Processo objects pre-filled with all related objects except Contrato.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Processo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptContrato(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProcessoPeer::addSelectColumns($criteria);
		$startcol2 = ProcessoPeer::NUM_HYDRATE_COLUMNS;

		AdvogadoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + AdvogadoPeer::NUM_HYDRATE_COLUMNS;

		AreaAdvocaciaPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + AreaAdvocaciaPeer::NUM_HYDRATE_COLUMNS;

		FaseProcessoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + FaseProcessoPeer::NUM_HYDRATE_COLUMNS;

		TribunalPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + TribunalPeer::NUM_HYDRATE_COLUMNS;

		UfPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + UfPeer::NUM_HYDRATE_COLUMNS;

		ClientePeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + ClientePeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(ProcessoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::FASE_PROCESSO_ID, FaseProcessoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::TRIBUNAL_ID, TribunalPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::UF_ID, UfPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProcessoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProcessoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ProcessoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProcessoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Advogado rows

				$key2 = AdvogadoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = AdvogadoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = AdvogadoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					AdvogadoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Processo) to the collection in $obj2 (Advogado)
				$obj2->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined AreaAdvocacia rows

				$key3 = AreaAdvocaciaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = AreaAdvocaciaPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = AreaAdvocaciaPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					AreaAdvocaciaPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Processo) to the collection in $obj3 (AreaAdvocacia)
				$obj3->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined FaseProcesso rows

				$key4 = FaseProcessoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = FaseProcessoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = FaseProcessoPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					FaseProcessoPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Processo) to the collection in $obj4 (FaseProcesso)
				$obj4->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Tribunal rows

				$key5 = TribunalPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = TribunalPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = TribunalPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					TribunalPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Processo) to the collection in $obj5 (Tribunal)
				$obj5->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Uf rows

				$key6 = UfPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = UfPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = UfPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					UfPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (Processo) to the collection in $obj6 (Uf)
				$obj6->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Cliente rows

				$key7 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = ClientePeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$cls = ClientePeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					ClientePeer::addInstanceToPool($obj7, $key7);
				} // if $obj7 already loaded

				// Add the $obj1 (Processo) to the collection in $obj7 (Cliente)
				$obj7->addProcesso($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Processo objects pre-filled with all related objects except FaseProcesso.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Processo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptFaseProcesso(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProcessoPeer::addSelectColumns($criteria);
		$startcol2 = ProcessoPeer::NUM_HYDRATE_COLUMNS;

		AdvogadoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + AdvogadoPeer::NUM_HYDRATE_COLUMNS;

		AreaAdvocaciaPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + AreaAdvocaciaPeer::NUM_HYDRATE_COLUMNS;

		ContratoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + ContratoPeer::NUM_HYDRATE_COLUMNS;

		TribunalPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + TribunalPeer::NUM_HYDRATE_COLUMNS;

		UfPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + UfPeer::NUM_HYDRATE_COLUMNS;

		ClientePeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + ClientePeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(ProcessoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::TRIBUNAL_ID, TribunalPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::UF_ID, UfPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProcessoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProcessoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ProcessoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProcessoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Advogado rows

				$key2 = AdvogadoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = AdvogadoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = AdvogadoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					AdvogadoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Processo) to the collection in $obj2 (Advogado)
				$obj2->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined AreaAdvocacia rows

				$key3 = AreaAdvocaciaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = AreaAdvocaciaPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = AreaAdvocaciaPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					AreaAdvocaciaPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Processo) to the collection in $obj3 (AreaAdvocacia)
				$obj3->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Contrato rows

				$key4 = ContratoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ContratoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ContratoPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ContratoPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Processo) to the collection in $obj4 (Contrato)
				$obj4->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Tribunal rows

				$key5 = TribunalPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = TribunalPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = TribunalPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					TribunalPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Processo) to the collection in $obj5 (Tribunal)
				$obj5->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Uf rows

				$key6 = UfPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = UfPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = UfPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					UfPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (Processo) to the collection in $obj6 (Uf)
				$obj6->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Cliente rows

				$key7 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = ClientePeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$cls = ClientePeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					ClientePeer::addInstanceToPool($obj7, $key7);
				} // if $obj7 already loaded

				// Add the $obj1 (Processo) to the collection in $obj7 (Cliente)
				$obj7->addProcesso($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Processo objects pre-filled with all related objects except Tribunal.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Processo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptTribunal(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProcessoPeer::addSelectColumns($criteria);
		$startcol2 = ProcessoPeer::NUM_HYDRATE_COLUMNS;

		AdvogadoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + AdvogadoPeer::NUM_HYDRATE_COLUMNS;

		AreaAdvocaciaPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + AreaAdvocaciaPeer::NUM_HYDRATE_COLUMNS;

		ContratoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + ContratoPeer::NUM_HYDRATE_COLUMNS;

		FaseProcessoPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + FaseProcessoPeer::NUM_HYDRATE_COLUMNS;

		UfPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + UfPeer::NUM_HYDRATE_COLUMNS;

		ClientePeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + ClientePeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(ProcessoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::FASE_PROCESSO_ID, FaseProcessoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::UF_ID, UfPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProcessoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProcessoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ProcessoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProcessoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Advogado rows

				$key2 = AdvogadoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = AdvogadoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = AdvogadoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					AdvogadoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Processo) to the collection in $obj2 (Advogado)
				$obj2->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined AreaAdvocacia rows

				$key3 = AreaAdvocaciaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = AreaAdvocaciaPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = AreaAdvocaciaPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					AreaAdvocaciaPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Processo) to the collection in $obj3 (AreaAdvocacia)
				$obj3->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Contrato rows

				$key4 = ContratoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ContratoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ContratoPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ContratoPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Processo) to the collection in $obj4 (Contrato)
				$obj4->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined FaseProcesso rows

				$key5 = FaseProcessoPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = FaseProcessoPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = FaseProcessoPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					FaseProcessoPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Processo) to the collection in $obj5 (FaseProcesso)
				$obj5->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Uf rows

				$key6 = UfPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = UfPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = UfPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					UfPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (Processo) to the collection in $obj6 (Uf)
				$obj6->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Cliente rows

				$key7 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = ClientePeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$cls = ClientePeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					ClientePeer::addInstanceToPool($obj7, $key7);
				} // if $obj7 already loaded

				// Add the $obj1 (Processo) to the collection in $obj7 (Cliente)
				$obj7->addProcesso($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Processo objects pre-filled with all related objects except Uf.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Processo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptUf(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProcessoPeer::addSelectColumns($criteria);
		$startcol2 = ProcessoPeer::NUM_HYDRATE_COLUMNS;

		AdvogadoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + AdvogadoPeer::NUM_HYDRATE_COLUMNS;

		AreaAdvocaciaPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + AreaAdvocaciaPeer::NUM_HYDRATE_COLUMNS;

		ContratoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + ContratoPeer::NUM_HYDRATE_COLUMNS;

		FaseProcessoPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + FaseProcessoPeer::NUM_HYDRATE_COLUMNS;

		TribunalPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + TribunalPeer::NUM_HYDRATE_COLUMNS;

		ClientePeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + ClientePeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(ProcessoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::FASE_PROCESSO_ID, FaseProcessoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::TRIBUNAL_ID, TribunalPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProcessoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProcessoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ProcessoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProcessoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Advogado rows

				$key2 = AdvogadoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = AdvogadoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = AdvogadoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					AdvogadoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Processo) to the collection in $obj2 (Advogado)
				$obj2->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined AreaAdvocacia rows

				$key3 = AreaAdvocaciaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = AreaAdvocaciaPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = AreaAdvocaciaPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					AreaAdvocaciaPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Processo) to the collection in $obj3 (AreaAdvocacia)
				$obj3->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Contrato rows

				$key4 = ContratoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ContratoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ContratoPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ContratoPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Processo) to the collection in $obj4 (Contrato)
				$obj4->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined FaseProcesso rows

				$key5 = FaseProcessoPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = FaseProcessoPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = FaseProcessoPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					FaseProcessoPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Processo) to the collection in $obj5 (FaseProcesso)
				$obj5->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Tribunal rows

				$key6 = TribunalPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = TribunalPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = TribunalPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					TribunalPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (Processo) to the collection in $obj6 (Tribunal)
				$obj6->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Cliente rows

				$key7 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = ClientePeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$cls = ClientePeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					ClientePeer::addInstanceToPool($obj7, $key7);
				} // if $obj7 already loaded

				// Add the $obj1 (Processo) to the collection in $obj7 (Cliente)
				$obj7->addProcesso($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Processo objects pre-filled with all related objects except Cliente.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Processo objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptCliente(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		ProcessoPeer::addSelectColumns($criteria);
		$startcol2 = ProcessoPeer::NUM_HYDRATE_COLUMNS;

		AdvogadoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + AdvogadoPeer::NUM_HYDRATE_COLUMNS;

		AreaAdvocaciaPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + AreaAdvocaciaPeer::NUM_HYDRATE_COLUMNS;

		ContratoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + ContratoPeer::NUM_HYDRATE_COLUMNS;

		FaseProcessoPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + FaseProcessoPeer::NUM_HYDRATE_COLUMNS;

		TribunalPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + TribunalPeer::NUM_HYDRATE_COLUMNS;

		UfPeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + UfPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(ProcessoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::FASE_PROCESSO_ID, FaseProcessoPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::TRIBUNAL_ID, TribunalPeer::ID, $join_behavior);

		$criteria->addJoin(ProcessoPeer::UF_ID, UfPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ProcessoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ProcessoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = ProcessoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				ProcessoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Advogado rows

				$key2 = AdvogadoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = AdvogadoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = AdvogadoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					AdvogadoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Processo) to the collection in $obj2 (Advogado)
				$obj2->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined AreaAdvocacia rows

				$key3 = AreaAdvocaciaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = AreaAdvocaciaPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = AreaAdvocaciaPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					AreaAdvocaciaPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Processo) to the collection in $obj3 (AreaAdvocacia)
				$obj3->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Contrato rows

				$key4 = ContratoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ContratoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ContratoPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ContratoPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Processo) to the collection in $obj4 (Contrato)
				$obj4->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined FaseProcesso rows

				$key5 = FaseProcessoPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = FaseProcessoPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = FaseProcessoPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					FaseProcessoPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Processo) to the collection in $obj5 (FaseProcesso)
				$obj5->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Tribunal rows

				$key6 = TribunalPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = TribunalPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = TribunalPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					TribunalPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (Processo) to the collection in $obj6 (Tribunal)
				$obj6->addProcesso($obj1);

			} // if joined row is not null

				// Add objects for joined Uf rows

				$key7 = UfPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = UfPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$cls = UfPeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					UfPeer::addInstanceToPool($obj7, $key7);
				} // if $obj7 already loaded

				// Add the $obj1 (Processo) to the collection in $obj7 (Uf)
				$obj7->addProcesso($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}

	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap()
	{
	  $dbMap = Propel::getDatabaseMap(BaseProcessoPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseProcessoPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new ProcessoTableMap());
	  }
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param      boolean $withPrefix Whether or not to return the path with the class name
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass($withPrefix = true)
	{
		return $withPrefix ? ProcessoPeer::CLASS_DEFAULT : ProcessoPeer::OM_CLASS;
	}

	/**
	 * Performs an INSERT on the database, given a Processo or Criteria object.
	 *
	 * @param      mixed $values Criteria or Processo object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Processo object
		}

		if ($criteria->containsKey(ProcessoPeer::ID) && $criteria->keyContainsValue(ProcessoPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProcessoPeer::ID.')');
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	/**
	 * Performs an UPDATE on the database, given a Processo or Criteria object.
	 *
	 * @param      mixed $values Criteria or Processo object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(ProcessoPeer::ID);
			$value = $criteria->remove(ProcessoPeer::ID);
			if ($value) {
				$selectCriteria->add(ProcessoPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(ProcessoPeer::TABLE_NAME);
			}

		} else { // $values is Processo object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Deletes all rows from the processo table.
	 *
	 * @param      PropelPDO $con the connection to use
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(ProcessoPeer::TABLE_NAME, $con, ProcessoPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			ProcessoPeer::clearInstancePool();
			ProcessoPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs a DELETE on the database, given a Processo or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Processo object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			ProcessoPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof Processo) { // it's a model object
			// invalidate the cache for this single object
			ProcessoPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ProcessoPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				ProcessoPeer::removeInstanceFromPool($singleval);
			}
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			ProcessoPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given Processo object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Processo $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ProcessoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ProcessoPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(ProcessoPeer::DATABASE_NAME, ProcessoPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     Processo
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = ProcessoPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(ProcessoPeer::DATABASE_NAME);
		$criteria->add(ProcessoPeer::ID, $pk);

		$v = ProcessoPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      PropelPDO $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ProcessoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(ProcessoPeer::DATABASE_NAME);
			$criteria->add(ProcessoPeer::ID, $pks, Criteria::IN);
			$objs = ProcessoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseProcessoPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseProcessoPeer::buildTableMap();

