<?php


/**
 * Base static class for performing query and update operations on the 'caso' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseCasoPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'Default';

	/** the table name for this class */
	const TABLE_NAME = 'caso';

	/** the related Propel class for this table */
	const OM_CLASS = 'Caso';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'Default.Caso';

	/** the related TableMap class for this table */
	const TM_CLASS = 'CasoTableMap';

	/** The total number of columns. */
	const NUM_COLUMNS = 15;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
	const NUM_HYDRATE_COLUMNS = 15;

	/** the column name for the ID field */
	const ID = 'caso.ID';

	/** the column name for the ADVOGADO_ID field */
	const ADVOGADO_ID = 'caso.ADVOGADO_ID';

	/** the column name for the AREA_ADVOCACIA_ID field */
	const AREA_ADVOCACIA_ID = 'caso.AREA_ADVOCACIA_ID';

	/** the column name for the UF_ID field */
	const UF_ID = 'caso.UF_ID';

	/** the column name for the CONTRATO_ID field */
	const CONTRATO_ID = 'caso.CONTRATO_ID';

	/** the column name for the CLIENTE_ID field */
	const CLIENTE_ID = 'caso.CLIENTE_ID';

	/** the column name for the SOLICITACAO_ID field */
	const SOLICITACAO_ID = 'caso.SOLICITACAO_ID';

	/** the column name for the NOME_CASO field */
	const NOME_CASO = 'caso.NOME_CASO';

	/** the column name for the OBJETIVO_FINAL field */
	const OBJETIVO_FINAL = 'caso.OBJETIVO_FINAL';

	/** the column name for the DESCRICAO field */
	const DESCRICAO = 'caso.DESCRICAO';

	/** the column name for the DATA_ABERTURA field */
	const DATA_ABERTURA = 'caso.DATA_ABERTURA';

	/** the column name for the DATA_FECHAMENTO field */
	const DATA_FECHAMENTO = 'caso.DATA_FECHAMENTO';

	/** the column name for the ATIVO field */
	const ATIVO = 'caso.ATIVO';

	/** the column name for the SITUACAO_CLIENTE field */
	const SITUACAO_CLIENTE = 'caso.SITUACAO_CLIENTE';

	/** the column name for the ANALISE_RISCO field */
	const ANALISE_RISCO = 'caso.ANALISE_RISCO';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * An identiy map to hold any loaded instances of Caso objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array Caso[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'AdvogadoId', 'AreaAdvocaciaId', 'UfId', 'ContratoId', 'ClienteId', 'SolicitacaoId', 'NomeCaso', 'ObjetivoFinal', 'Descricao', 'DataAbertura', 'DataFechamento', 'Ativo', 'SituacaoCliente', 'AnaliseRisco', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'advogadoId', 'areaAdvocaciaId', 'ufId', 'contratoId', 'clienteId', 'solicitacaoId', 'nomeCaso', 'objetivoFinal', 'descricao', 'dataAbertura', 'dataFechamento', 'ativo', 'situacaoCliente', 'analiseRisco', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::ADVOGADO_ID, self::AREA_ADVOCACIA_ID, self::UF_ID, self::CONTRATO_ID, self::CLIENTE_ID, self::SOLICITACAO_ID, self::NOME_CASO, self::OBJETIVO_FINAL, self::DESCRICAO, self::DATA_ABERTURA, self::DATA_FECHAMENTO, self::ATIVO, self::SITUACAO_CLIENTE, self::ANALISE_RISCO, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'ADVOGADO_ID', 'AREA_ADVOCACIA_ID', 'UF_ID', 'CONTRATO_ID', 'CLIENTE_ID', 'SOLICITACAO_ID', 'NOME_CASO', 'OBJETIVO_FINAL', 'DESCRICAO', 'DATA_ABERTURA', 'DATA_FECHAMENTO', 'ATIVO', 'SITUACAO_CLIENTE', 'ANALISE_RISCO', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'advogado_id', 'area_advocacia_id', 'uf_id', 'contrato_id', 'cliente_id', 'solicitacao_id', 'nome_caso', 'objetivo_final', 'descricao', 'data_abertura', 'data_fechamento', 'ativo', 'situacao_cliente', 'analise_risco', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'AdvogadoId' => 1, 'AreaAdvocaciaId' => 2, 'UfId' => 3, 'ContratoId' => 4, 'ClienteId' => 5, 'SolicitacaoId' => 6, 'NomeCaso' => 7, 'ObjetivoFinal' => 8, 'Descricao' => 9, 'DataAbertura' => 10, 'DataFechamento' => 11, 'Ativo' => 12, 'SituacaoCliente' => 13, 'AnaliseRisco' => 14, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'advogadoId' => 1, 'areaAdvocaciaId' => 2, 'ufId' => 3, 'contratoId' => 4, 'clienteId' => 5, 'solicitacaoId' => 6, 'nomeCaso' => 7, 'objetivoFinal' => 8, 'descricao' => 9, 'dataAbertura' => 10, 'dataFechamento' => 11, 'ativo' => 12, 'situacaoCliente' => 13, 'analiseRisco' => 14, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::ADVOGADO_ID => 1, self::AREA_ADVOCACIA_ID => 2, self::UF_ID => 3, self::CONTRATO_ID => 4, self::CLIENTE_ID => 5, self::SOLICITACAO_ID => 6, self::NOME_CASO => 7, self::OBJETIVO_FINAL => 8, self::DESCRICAO => 9, self::DATA_ABERTURA => 10, self::DATA_FECHAMENTO => 11, self::ATIVO => 12, self::SITUACAO_CLIENTE => 13, self::ANALISE_RISCO => 14, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'ADVOGADO_ID' => 1, 'AREA_ADVOCACIA_ID' => 2, 'UF_ID' => 3, 'CONTRATO_ID' => 4, 'CLIENTE_ID' => 5, 'SOLICITACAO_ID' => 6, 'NOME_CASO' => 7, 'OBJETIVO_FINAL' => 8, 'DESCRICAO' => 9, 'DATA_ABERTURA' => 10, 'DATA_FECHAMENTO' => 11, 'ATIVO' => 12, 'SITUACAO_CLIENTE' => 13, 'ANALISE_RISCO' => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'advogado_id' => 1, 'area_advocacia_id' => 2, 'uf_id' => 3, 'contrato_id' => 4, 'cliente_id' => 5, 'solicitacao_id' => 6, 'nome_caso' => 7, 'objetivo_final' => 8, 'descricao' => 9, 'data_abertura' => 10, 'data_fechamento' => 11, 'ativo' => 12, 'situacao_cliente' => 13, 'analise_risco' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
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
	 * @param      string $column The column name for current table. (i.e. CasoPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(CasoPeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(CasoPeer::ID);
			$criteria->addSelectColumn(CasoPeer::ADVOGADO_ID);
			$criteria->addSelectColumn(CasoPeer::AREA_ADVOCACIA_ID);
			$criteria->addSelectColumn(CasoPeer::UF_ID);
			$criteria->addSelectColumn(CasoPeer::CONTRATO_ID);
			$criteria->addSelectColumn(CasoPeer::CLIENTE_ID);
			$criteria->addSelectColumn(CasoPeer::SOLICITACAO_ID);
			$criteria->addSelectColumn(CasoPeer::NOME_CASO);
			$criteria->addSelectColumn(CasoPeer::OBJETIVO_FINAL);
			$criteria->addSelectColumn(CasoPeer::DESCRICAO);
			$criteria->addSelectColumn(CasoPeer::DATA_ABERTURA);
			$criteria->addSelectColumn(CasoPeer::DATA_FECHAMENTO);
			$criteria->addSelectColumn(CasoPeer::ATIVO);
			$criteria->addSelectColumn(CasoPeer::SITUACAO_CLIENTE);
			$criteria->addSelectColumn(CasoPeer::ANALISE_RISCO);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.ADVOGADO_ID');
			$criteria->addSelectColumn($alias . '.AREA_ADVOCACIA_ID');
			$criteria->addSelectColumn($alias . '.UF_ID');
			$criteria->addSelectColumn($alias . '.CONTRATO_ID');
			$criteria->addSelectColumn($alias . '.CLIENTE_ID');
			$criteria->addSelectColumn($alias . '.SOLICITACAO_ID');
			$criteria->addSelectColumn($alias . '.NOME_CASO');
			$criteria->addSelectColumn($alias . '.OBJETIVO_FINAL');
			$criteria->addSelectColumn($alias . '.DESCRICAO');
			$criteria->addSelectColumn($alias . '.DATA_ABERTURA');
			$criteria->addSelectColumn($alias . '.DATA_FECHAMENTO');
			$criteria->addSelectColumn($alias . '.ATIVO');
			$criteria->addSelectColumn($alias . '.SITUACAO_CLIENTE');
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
		$criteria->setPrimaryTableName(CasoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CasoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     Caso
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = CasoPeer::doSelect($critcopy, $con);
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
		return CasoPeer::populateObjects(CasoPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			CasoPeer::addSelectColumns($criteria);
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
	 * @param      Caso $value A Caso object.
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
	 * @param      mixed $value A Caso object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Caso) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Caso object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     Caso Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to caso
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
		$cls = CasoPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = CasoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = CasoPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				CasoPeer::addInstanceToPool($obj, $key);
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
	 * @return     array (Caso object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = CasoPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = CasoPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + CasoPeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = CasoPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			CasoPeer::addInstanceToPool($obj, $key);
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
		$criteria->setPrimaryTableName(CasoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CasoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CasoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(CasoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CasoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CasoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(CasoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CasoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CasoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(CasoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CasoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CasoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Solicitacao table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinSolicitacao(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CasoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CasoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CasoPeer::SOLICITACAO_ID, SolicitacaoPeer::ID, $join_behavior);

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
	 * Selects a collection of Caso objects pre-filled with their Advogado objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Caso objects.
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

		CasoPeer::addSelectColumns($criteria);
		$startcol = CasoPeer::NUM_HYDRATE_COLUMNS;
		AdvogadoPeer::addSelectColumns($criteria);

		$criteria->addJoin(CasoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CasoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CasoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = CasoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CasoPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Caso) to $obj2 (Advogado)
				$obj2->addCaso($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Caso objects pre-filled with their AreaAdvocacia objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Caso objects.
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

		CasoPeer::addSelectColumns($criteria);
		$startcol = CasoPeer::NUM_HYDRATE_COLUMNS;
		AreaAdvocaciaPeer::addSelectColumns($criteria);

		$criteria->addJoin(CasoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CasoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CasoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = CasoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CasoPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Caso) to $obj2 (AreaAdvocacia)
				$obj2->addCaso($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Caso objects pre-filled with their Cliente objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Caso objects.
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

		CasoPeer::addSelectColumns($criteria);
		$startcol = CasoPeer::NUM_HYDRATE_COLUMNS;
		ClientePeer::addSelectColumns($criteria);

		$criteria->addJoin(CasoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CasoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CasoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = CasoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CasoPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Caso) to $obj2 (Cliente)
				$obj2->addCaso($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Caso objects pre-filled with their Contrato objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Caso objects.
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

		CasoPeer::addSelectColumns($criteria);
		$startcol = CasoPeer::NUM_HYDRATE_COLUMNS;
		ContratoPeer::addSelectColumns($criteria);

		$criteria->addJoin(CasoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CasoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CasoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = CasoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CasoPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Caso) to $obj2 (Contrato)
				$obj2->addCaso($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Caso objects pre-filled with their Solicitacao objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Caso objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinSolicitacao(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		CasoPeer::addSelectColumns($criteria);
		$startcol = CasoPeer::NUM_HYDRATE_COLUMNS;
		SolicitacaoPeer::addSelectColumns($criteria);

		$criteria->addJoin(CasoPeer::SOLICITACAO_ID, SolicitacaoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CasoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CasoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = CasoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CasoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = SolicitacaoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = SolicitacaoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = SolicitacaoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					SolicitacaoPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Caso) to $obj2 (Solicitacao)
				$obj2->addCaso($obj1);

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
		$criteria->setPrimaryTableName(CasoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CasoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(CasoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::SOLICITACAO_ID, SolicitacaoPeer::ID, $join_behavior);

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
	 * Selects a collection of Caso objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Caso objects.
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

		CasoPeer::addSelectColumns($criteria);
		$startcol2 = CasoPeer::NUM_HYDRATE_COLUMNS;

		AdvogadoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + AdvogadoPeer::NUM_HYDRATE_COLUMNS;

		AreaAdvocaciaPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + AreaAdvocaciaPeer::NUM_HYDRATE_COLUMNS;

		ClientePeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + ClientePeer::NUM_HYDRATE_COLUMNS;

		ContratoPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + ContratoPeer::NUM_HYDRATE_COLUMNS;

		SolicitacaoPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + SolicitacaoPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(CasoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::SOLICITACAO_ID, SolicitacaoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CasoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CasoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CasoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CasoPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Caso) to the collection in $obj2 (Advogado)
				$obj2->addCaso($obj1);
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

				// Add the $obj1 (Caso) to the collection in $obj3 (AreaAdvocacia)
				$obj3->addCaso($obj1);
			} // if joined row not null

			// Add objects for joined Cliente rows

			$key4 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = ClientePeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = ClientePeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ClientePeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (Caso) to the collection in $obj4 (Cliente)
				$obj4->addCaso($obj1);
			} // if joined row not null

			// Add objects for joined Contrato rows

			$key5 = ContratoPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = ContratoPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$cls = ContratoPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					ContratoPeer::addInstanceToPool($obj5, $key5);
				} // if obj5 loaded

				// Add the $obj1 (Caso) to the collection in $obj5 (Contrato)
				$obj5->addCaso($obj1);
			} // if joined row not null

			// Add objects for joined Solicitacao rows

			$key6 = SolicitacaoPeer::getPrimaryKeyHashFromRow($row, $startcol6);
			if ($key6 !== null) {
				$obj6 = SolicitacaoPeer::getInstanceFromPool($key6);
				if (!$obj6) {

					$cls = SolicitacaoPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					SolicitacaoPeer::addInstanceToPool($obj6, $key6);
				} // if obj6 loaded

				// Add the $obj1 (Caso) to the collection in $obj6 (Solicitacao)
				$obj6->addCaso($obj1);
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
		$criteria->setPrimaryTableName(CasoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CasoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(CasoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::SOLICITACAO_ID, SolicitacaoPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(CasoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CasoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(CasoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::SOLICITACAO_ID, SolicitacaoPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(CasoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CasoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(CasoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::SOLICITACAO_ID, SolicitacaoPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(CasoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CasoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(CasoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::SOLICITACAO_ID, SolicitacaoPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Solicitacao table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptSolicitacao(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(CasoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			CasoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(CasoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

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
	 * Selects a collection of Caso objects pre-filled with all related objects except Advogado.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Caso objects.
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

		CasoPeer::addSelectColumns($criteria);
		$startcol2 = CasoPeer::NUM_HYDRATE_COLUMNS;

		AreaAdvocaciaPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + AreaAdvocaciaPeer::NUM_HYDRATE_COLUMNS;

		ClientePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + ClientePeer::NUM_HYDRATE_COLUMNS;

		ContratoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + ContratoPeer::NUM_HYDRATE_COLUMNS;

		SolicitacaoPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + SolicitacaoPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(CasoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::SOLICITACAO_ID, SolicitacaoPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CasoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CasoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CasoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CasoPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Caso) to the collection in $obj2 (AreaAdvocacia)
				$obj2->addCaso($obj1);

			} // if joined row is not null

				// Add objects for joined Cliente rows

				$key3 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ClientePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ClientePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ClientePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Caso) to the collection in $obj3 (Cliente)
				$obj3->addCaso($obj1);

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

				// Add the $obj1 (Caso) to the collection in $obj4 (Contrato)
				$obj4->addCaso($obj1);

			} // if joined row is not null

				// Add objects for joined Solicitacao rows

				$key5 = SolicitacaoPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = SolicitacaoPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = SolicitacaoPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					SolicitacaoPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Caso) to the collection in $obj5 (Solicitacao)
				$obj5->addCaso($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Caso objects pre-filled with all related objects except AreaAdvocacia.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Caso objects.
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

		CasoPeer::addSelectColumns($criteria);
		$startcol2 = CasoPeer::NUM_HYDRATE_COLUMNS;

		AdvogadoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + AdvogadoPeer::NUM_HYDRATE_COLUMNS;

		ClientePeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + ClientePeer::NUM_HYDRATE_COLUMNS;

		ContratoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + ContratoPeer::NUM_HYDRATE_COLUMNS;

		SolicitacaoPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + SolicitacaoPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(CasoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::SOLICITACAO_ID, SolicitacaoPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CasoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CasoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CasoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CasoPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Caso) to the collection in $obj2 (Advogado)
				$obj2->addCaso($obj1);

			} // if joined row is not null

				// Add objects for joined Cliente rows

				$key3 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ClientePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = ClientePeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ClientePeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Caso) to the collection in $obj3 (Cliente)
				$obj3->addCaso($obj1);

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

				// Add the $obj1 (Caso) to the collection in $obj4 (Contrato)
				$obj4->addCaso($obj1);

			} // if joined row is not null

				// Add objects for joined Solicitacao rows

				$key5 = SolicitacaoPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = SolicitacaoPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = SolicitacaoPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					SolicitacaoPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Caso) to the collection in $obj5 (Solicitacao)
				$obj5->addCaso($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Caso objects pre-filled with all related objects except Cliente.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Caso objects.
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

		CasoPeer::addSelectColumns($criteria);
		$startcol2 = CasoPeer::NUM_HYDRATE_COLUMNS;

		AdvogadoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + AdvogadoPeer::NUM_HYDRATE_COLUMNS;

		AreaAdvocaciaPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + AreaAdvocaciaPeer::NUM_HYDRATE_COLUMNS;

		ContratoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + ContratoPeer::NUM_HYDRATE_COLUMNS;

		SolicitacaoPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + SolicitacaoPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(CasoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::SOLICITACAO_ID, SolicitacaoPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CasoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CasoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CasoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CasoPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Caso) to the collection in $obj2 (Advogado)
				$obj2->addCaso($obj1);

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

				// Add the $obj1 (Caso) to the collection in $obj3 (AreaAdvocacia)
				$obj3->addCaso($obj1);

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

				// Add the $obj1 (Caso) to the collection in $obj4 (Contrato)
				$obj4->addCaso($obj1);

			} // if joined row is not null

				// Add objects for joined Solicitacao rows

				$key5 = SolicitacaoPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = SolicitacaoPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = SolicitacaoPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					SolicitacaoPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Caso) to the collection in $obj5 (Solicitacao)
				$obj5->addCaso($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Caso objects pre-filled with all related objects except Contrato.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Caso objects.
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

		CasoPeer::addSelectColumns($criteria);
		$startcol2 = CasoPeer::NUM_HYDRATE_COLUMNS;

		AdvogadoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + AdvogadoPeer::NUM_HYDRATE_COLUMNS;

		AreaAdvocaciaPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + AreaAdvocaciaPeer::NUM_HYDRATE_COLUMNS;

		ClientePeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + ClientePeer::NUM_HYDRATE_COLUMNS;

		SolicitacaoPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + SolicitacaoPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(CasoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::SOLICITACAO_ID, SolicitacaoPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CasoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CasoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CasoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CasoPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Caso) to the collection in $obj2 (Advogado)
				$obj2->addCaso($obj1);

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

				// Add the $obj1 (Caso) to the collection in $obj3 (AreaAdvocacia)
				$obj3->addCaso($obj1);

			} // if joined row is not null

				// Add objects for joined Cliente rows

				$key4 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ClientePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ClientePeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ClientePeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Caso) to the collection in $obj4 (Cliente)
				$obj4->addCaso($obj1);

			} // if joined row is not null

				// Add objects for joined Solicitacao rows

				$key5 = SolicitacaoPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = SolicitacaoPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = SolicitacaoPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					SolicitacaoPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Caso) to the collection in $obj5 (Solicitacao)
				$obj5->addCaso($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Caso objects pre-filled with all related objects except Solicitacao.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Caso objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptSolicitacao(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		CasoPeer::addSelectColumns($criteria);
		$startcol2 = CasoPeer::NUM_HYDRATE_COLUMNS;

		AdvogadoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + AdvogadoPeer::NUM_HYDRATE_COLUMNS;

		AreaAdvocaciaPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + AreaAdvocaciaPeer::NUM_HYDRATE_COLUMNS;

		ClientePeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + ClientePeer::NUM_HYDRATE_COLUMNS;

		ContratoPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + ContratoPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(CasoPeer::ADVOGADO_ID, AdvogadoPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::AREA_ADVOCACIA_ID, AreaAdvocaciaPeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::CLIENTE_ID, ClientePeer::ID, $join_behavior);

		$criteria->addJoin(CasoPeer::CONTRATO_ID, ContratoPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = CasoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = CasoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = CasoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				CasoPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Caso) to the collection in $obj2 (Advogado)
				$obj2->addCaso($obj1);

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

				// Add the $obj1 (Caso) to the collection in $obj3 (AreaAdvocacia)
				$obj3->addCaso($obj1);

			} // if joined row is not null

				// Add objects for joined Cliente rows

				$key4 = ClientePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = ClientePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = ClientePeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					ClientePeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Caso) to the collection in $obj4 (Cliente)
				$obj4->addCaso($obj1);

			} // if joined row is not null

				// Add objects for joined Contrato rows

				$key5 = ContratoPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = ContratoPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = ContratoPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					ContratoPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Caso) to the collection in $obj5 (Contrato)
				$obj5->addCaso($obj1);

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
	  $dbMap = Propel::getDatabaseMap(BaseCasoPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseCasoPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new CasoTableMap());
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
		return $withPrefix ? CasoPeer::CLASS_DEFAULT : CasoPeer::OM_CLASS;
	}

	/**
	 * Performs an INSERT on the database, given a Caso or Criteria object.
	 *
	 * @param      mixed $values Criteria or Caso object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Caso object
		}

		if ($criteria->containsKey(CasoPeer::ID) && $criteria->keyContainsValue(CasoPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.CasoPeer::ID.')');
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
	 * Performs an UPDATE on the database, given a Caso or Criteria object.
	 *
	 * @param      mixed $values Criteria or Caso object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(CasoPeer::ID);
			$value = $criteria->remove(CasoPeer::ID);
			if ($value) {
				$selectCriteria->add(CasoPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(CasoPeer::TABLE_NAME);
			}

		} else { // $values is Caso object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Deletes all rows from the caso table.
	 *
	 * @param      PropelPDO $con the connection to use
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(CasoPeer::TABLE_NAME, $con, CasoPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			CasoPeer::clearInstancePool();
			CasoPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs a DELETE on the database, given a Caso or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Caso object or primary key or array of primary keys
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
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			CasoPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof Caso) { // it's a model object
			// invalidate the cache for this single object
			CasoPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(CasoPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				CasoPeer::removeInstanceFromPool($singleval);
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
			CasoPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given Caso object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Caso $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(CasoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(CasoPeer::TABLE_NAME);

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

		return BasePeer::doValidate(CasoPeer::DATABASE_NAME, CasoPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     Caso
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = CasoPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(CasoPeer::DATABASE_NAME);
		$criteria->add(CasoPeer::ID, $pk);

		$v = CasoPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(CasoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(CasoPeer::DATABASE_NAME);
			$criteria->add(CasoPeer::ID, $pks, Criteria::IN);
			$objs = CasoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseCasoPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseCasoPeer::buildTableMap();

