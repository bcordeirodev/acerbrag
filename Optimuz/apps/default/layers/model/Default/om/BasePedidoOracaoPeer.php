<?php


/**
 * Base static class for performing query and update operations on the 'pedido_oracao' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BasePedidoOracaoPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'Default';

	/** the table name for this class */
	const TABLE_NAME = 'pedido_oracao';

	/** the related Propel class for this table */
	const OM_CLASS = 'PedidoOracao';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'Default.PedidoOracao';

	/** the related TableMap class for this table */
	const TM_CLASS = 'PedidoOracaoTableMap';

	/** The total number of columns. */
	const NUM_COLUMNS = 9;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
	const NUM_HYDRATE_COLUMNS = 9;

	/** the column name for the ID field */
	const ID = 'pedido_oracao.ID';

	/** the column name for the SOLICITANTE_ID field */
	const SOLICITANTE_ID = 'pedido_oracao.SOLICITANTE_ID';

	/** the column name for the ATENDENTE_ID field */
	const ATENDENTE_ID = 'pedido_oracao.ATENDENTE_ID';

	/** the column name for the INSTITUICAO_ID field */
	const INSTITUICAO_ID = 'pedido_oracao.INSTITUICAO_ID';

	/** the column name for the DESCRICAO field */
	const DESCRICAO = 'pedido_oracao.DESCRICAO';

	/** the column name for the DATA_PEDIDO field */
	const DATA_PEDIDO = 'pedido_oracao.DATA_PEDIDO';

	/** the column name for the ATENDIDA field */
	const ATENDIDA = 'pedido_oracao.ATENDIDA';

	/** the column name for the DATA_ATENDIMENTO field */
	const DATA_ATENDIMENTO = 'pedido_oracao.DATA_ATENDIMENTO';

	/** the column name for the DESCRICAO_ATENDIMENTO field */
	const DESCRICAO_ATENDIMENTO = 'pedido_oracao.DESCRICAO_ATENDIMENTO';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * An identiy map to hold any loaded instances of PedidoOracao objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array PedidoOracao[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'SolicitanteId', 'AtendenteId', 'InstituicaoId', 'Descricao', 'DataPedido', 'Atendida', 'DataAtendimento', 'DescricaoAtendimento', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'solicitanteId', 'atendenteId', 'instituicaoId', 'descricao', 'dataPedido', 'atendida', 'dataAtendimento', 'descricaoAtendimento', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::SOLICITANTE_ID, self::ATENDENTE_ID, self::INSTITUICAO_ID, self::DESCRICAO, self::DATA_PEDIDO, self::ATENDIDA, self::DATA_ATENDIMENTO, self::DESCRICAO_ATENDIMENTO, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'SOLICITANTE_ID', 'ATENDENTE_ID', 'INSTITUICAO_ID', 'DESCRICAO', 'DATA_PEDIDO', 'ATENDIDA', 'DATA_ATENDIMENTO', 'DESCRICAO_ATENDIMENTO', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'solicitante_id', 'atendente_id', 'instituicao_id', 'descricao', 'data_pedido', 'atendida', 'data_atendimento', 'descricao_atendimento', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'SolicitanteId' => 1, 'AtendenteId' => 2, 'InstituicaoId' => 3, 'Descricao' => 4, 'DataPedido' => 5, 'Atendida' => 6, 'DataAtendimento' => 7, 'DescricaoAtendimento' => 8, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'solicitanteId' => 1, 'atendenteId' => 2, 'instituicaoId' => 3, 'descricao' => 4, 'dataPedido' => 5, 'atendida' => 6, 'dataAtendimento' => 7, 'descricaoAtendimento' => 8, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::SOLICITANTE_ID => 1, self::ATENDENTE_ID => 2, self::INSTITUICAO_ID => 3, self::DESCRICAO => 4, self::DATA_PEDIDO => 5, self::ATENDIDA => 6, self::DATA_ATENDIMENTO => 7, self::DESCRICAO_ATENDIMENTO => 8, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'SOLICITANTE_ID' => 1, 'ATENDENTE_ID' => 2, 'INSTITUICAO_ID' => 3, 'DESCRICAO' => 4, 'DATA_PEDIDO' => 5, 'ATENDIDA' => 6, 'DATA_ATENDIMENTO' => 7, 'DESCRICAO_ATENDIMENTO' => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'solicitante_id' => 1, 'atendente_id' => 2, 'instituicao_id' => 3, 'descricao' => 4, 'data_pedido' => 5, 'atendida' => 6, 'data_atendimento' => 7, 'descricao_atendimento' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
	 * @param      string $column The column name for current table. (i.e. PedidoOracaoPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(PedidoOracaoPeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(PedidoOracaoPeer::ID);
			$criteria->addSelectColumn(PedidoOracaoPeer::SOLICITANTE_ID);
			$criteria->addSelectColumn(PedidoOracaoPeer::ATENDENTE_ID);
			$criteria->addSelectColumn(PedidoOracaoPeer::INSTITUICAO_ID);
			$criteria->addSelectColumn(PedidoOracaoPeer::DESCRICAO);
			$criteria->addSelectColumn(PedidoOracaoPeer::DATA_PEDIDO);
			$criteria->addSelectColumn(PedidoOracaoPeer::ATENDIDA);
			$criteria->addSelectColumn(PedidoOracaoPeer::DATA_ATENDIMENTO);
			$criteria->addSelectColumn(PedidoOracaoPeer::DESCRICAO_ATENDIMENTO);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.SOLICITANTE_ID');
			$criteria->addSelectColumn($alias . '.ATENDENTE_ID');
			$criteria->addSelectColumn($alias . '.INSTITUICAO_ID');
			$criteria->addSelectColumn($alias . '.DESCRICAO');
			$criteria->addSelectColumn($alias . '.DATA_PEDIDO');
			$criteria->addSelectColumn($alias . '.ATENDIDA');
			$criteria->addSelectColumn($alias . '.DATA_ATENDIMENTO');
			$criteria->addSelectColumn($alias . '.DESCRICAO_ATENDIMENTO');
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
		$criteria->setPrimaryTableName(PedidoOracaoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			PedidoOracaoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(PedidoOracaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     PedidoOracao
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = PedidoOracaoPeer::doSelect($critcopy, $con);
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
		return PedidoOracaoPeer::populateObjects(PedidoOracaoPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(PedidoOracaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			PedidoOracaoPeer::addSelectColumns($criteria);
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
	 * @param      PedidoOracao $value A PedidoOracao object.
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
	 * @param      mixed $value A PedidoOracao object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof PedidoOracao) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or PedidoOracao object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     PedidoOracao Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to pedido_oracao
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
		$cls = PedidoOracaoPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = PedidoOracaoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = PedidoOracaoPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				PedidoOracaoPeer::addInstanceToPool($obj, $key);
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
	 * @return     array (PedidoOracao object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = PedidoOracaoPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = PedidoOracaoPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + PedidoOracaoPeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = PedidoOracaoPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			PedidoOracaoPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}


	/**
	 * Returns the number of rows matching criteria, joining the related UsuarioRelatedBySolicitanteId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinUsuarioRelatedBySolicitanteId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(PedidoOracaoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			PedidoOracaoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(PedidoOracaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(PedidoOracaoPeer::SOLICITANTE_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related UsuarioRelatedByAtendenteId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinUsuarioRelatedByAtendenteId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(PedidoOracaoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			PedidoOracaoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(PedidoOracaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(PedidoOracaoPeer::ATENDENTE_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Igreja table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinIgreja(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(PedidoOracaoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			PedidoOracaoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(PedidoOracaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(PedidoOracaoPeer::INSTITUICAO_ID, IgrejaPeer::ID, $join_behavior);

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
	 * Selects a collection of PedidoOracao objects pre-filled with their Usuario objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of PedidoOracao objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinUsuarioRelatedBySolicitanteId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		PedidoOracaoPeer::addSelectColumns($criteria);
		$startcol = PedidoOracaoPeer::NUM_HYDRATE_COLUMNS;
		UsuarioPeer::addSelectColumns($criteria);

		$criteria->addJoin(PedidoOracaoPeer::SOLICITANTE_ID, UsuarioPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = PedidoOracaoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = PedidoOracaoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = PedidoOracaoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				PedidoOracaoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = UsuarioPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = UsuarioPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					UsuarioPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (PedidoOracao) to $obj2 (Usuario)
				$obj2->addPedidoOracaoRelatedBySolicitanteId($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of PedidoOracao objects pre-filled with their Usuario objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of PedidoOracao objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinUsuarioRelatedByAtendenteId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		PedidoOracaoPeer::addSelectColumns($criteria);
		$startcol = PedidoOracaoPeer::NUM_HYDRATE_COLUMNS;
		UsuarioPeer::addSelectColumns($criteria);

		$criteria->addJoin(PedidoOracaoPeer::ATENDENTE_ID, UsuarioPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = PedidoOracaoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = PedidoOracaoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = PedidoOracaoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				PedidoOracaoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = UsuarioPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = UsuarioPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					UsuarioPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (PedidoOracao) to $obj2 (Usuario)
				$obj2->addPedidoOracaoRelatedByAtendenteId($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of PedidoOracao objects pre-filled with their Igreja objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of PedidoOracao objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinIgreja(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		PedidoOracaoPeer::addSelectColumns($criteria);
		$startcol = PedidoOracaoPeer::NUM_HYDRATE_COLUMNS;
		IgrejaPeer::addSelectColumns($criteria);

		$criteria->addJoin(PedidoOracaoPeer::INSTITUICAO_ID, IgrejaPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = PedidoOracaoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = PedidoOracaoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = PedidoOracaoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				PedidoOracaoPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = IgrejaPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = IgrejaPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = IgrejaPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					IgrejaPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (PedidoOracao) to $obj2 (Igreja)
				$obj2->addPedidoOracao($obj1);

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
		$criteria->setPrimaryTableName(PedidoOracaoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			PedidoOracaoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(PedidoOracaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(PedidoOracaoPeer::SOLICITANTE_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(PedidoOracaoPeer::ATENDENTE_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(PedidoOracaoPeer::INSTITUICAO_ID, IgrejaPeer::ID, $join_behavior);

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
	 * Selects a collection of PedidoOracao objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of PedidoOracao objects.
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

		PedidoOracaoPeer::addSelectColumns($criteria);
		$startcol2 = PedidoOracaoPeer::NUM_HYDRATE_COLUMNS;

		UsuarioPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + UsuarioPeer::NUM_HYDRATE_COLUMNS;

		UsuarioPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + UsuarioPeer::NUM_HYDRATE_COLUMNS;

		IgrejaPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + IgrejaPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(PedidoOracaoPeer::SOLICITANTE_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(PedidoOracaoPeer::ATENDENTE_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(PedidoOracaoPeer::INSTITUICAO_ID, IgrejaPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = PedidoOracaoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = PedidoOracaoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = PedidoOracaoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				PedidoOracaoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined Usuario rows

			$key2 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = UsuarioPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = UsuarioPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					UsuarioPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (PedidoOracao) to the collection in $obj2 (Usuario)
				$obj2->addPedidoOracaoRelatedBySolicitanteId($obj1);
			} // if joined row not null

			// Add objects for joined Usuario rows

			$key3 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = UsuarioPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = UsuarioPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					UsuarioPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (PedidoOracao) to the collection in $obj3 (Usuario)
				$obj3->addPedidoOracaoRelatedByAtendenteId($obj1);
			} // if joined row not null

			// Add objects for joined Igreja rows

			$key4 = IgrejaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = IgrejaPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = IgrejaPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					IgrejaPeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (PedidoOracao) to the collection in $obj4 (Igreja)
				$obj4->addPedidoOracao($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related UsuarioRelatedBySolicitanteId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptUsuarioRelatedBySolicitanteId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(PedidoOracaoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			PedidoOracaoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(PedidoOracaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(PedidoOracaoPeer::INSTITUICAO_ID, IgrejaPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related UsuarioRelatedByAtendenteId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptUsuarioRelatedByAtendenteId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(PedidoOracaoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			PedidoOracaoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(PedidoOracaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(PedidoOracaoPeer::INSTITUICAO_ID, IgrejaPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Igreja table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptIgreja(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(PedidoOracaoPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			PedidoOracaoPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(PedidoOracaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(PedidoOracaoPeer::SOLICITANTE_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(PedidoOracaoPeer::ATENDENTE_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Selects a collection of PedidoOracao objects pre-filled with all related objects except UsuarioRelatedBySolicitanteId.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of PedidoOracao objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptUsuarioRelatedBySolicitanteId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		PedidoOracaoPeer::addSelectColumns($criteria);
		$startcol2 = PedidoOracaoPeer::NUM_HYDRATE_COLUMNS;

		IgrejaPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + IgrejaPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(PedidoOracaoPeer::INSTITUICAO_ID, IgrejaPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = PedidoOracaoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = PedidoOracaoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = PedidoOracaoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				PedidoOracaoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Igreja rows

				$key2 = IgrejaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = IgrejaPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = IgrejaPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					IgrejaPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (PedidoOracao) to the collection in $obj2 (Igreja)
				$obj2->addPedidoOracao($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of PedidoOracao objects pre-filled with all related objects except UsuarioRelatedByAtendenteId.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of PedidoOracao objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptUsuarioRelatedByAtendenteId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		PedidoOracaoPeer::addSelectColumns($criteria);
		$startcol2 = PedidoOracaoPeer::NUM_HYDRATE_COLUMNS;

		IgrejaPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + IgrejaPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(PedidoOracaoPeer::INSTITUICAO_ID, IgrejaPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = PedidoOracaoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = PedidoOracaoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = PedidoOracaoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				PedidoOracaoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Igreja rows

				$key2 = IgrejaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = IgrejaPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = IgrejaPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					IgrejaPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (PedidoOracao) to the collection in $obj2 (Igreja)
				$obj2->addPedidoOracao($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of PedidoOracao objects pre-filled with all related objects except Igreja.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of PedidoOracao objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptIgreja(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		PedidoOracaoPeer::addSelectColumns($criteria);
		$startcol2 = PedidoOracaoPeer::NUM_HYDRATE_COLUMNS;

		UsuarioPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + UsuarioPeer::NUM_HYDRATE_COLUMNS;

		UsuarioPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + UsuarioPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(PedidoOracaoPeer::SOLICITANTE_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(PedidoOracaoPeer::ATENDENTE_ID, UsuarioPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = PedidoOracaoPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = PedidoOracaoPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = PedidoOracaoPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				PedidoOracaoPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Usuario rows

				$key2 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = UsuarioPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					UsuarioPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (PedidoOracao) to the collection in $obj2 (Usuario)
				$obj2->addPedidoOracaoRelatedBySolicitanteId($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key3 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = UsuarioPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					UsuarioPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (PedidoOracao) to the collection in $obj3 (Usuario)
				$obj3->addPedidoOracaoRelatedByAtendenteId($obj1);

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
	  $dbMap = Propel::getDatabaseMap(BasePedidoOracaoPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BasePedidoOracaoPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new PedidoOracaoTableMap());
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
		return $withPrefix ? PedidoOracaoPeer::CLASS_DEFAULT : PedidoOracaoPeer::OM_CLASS;
	}

	/**
	 * Performs an INSERT on the database, given a PedidoOracao or Criteria object.
	 *
	 * @param      mixed $values Criteria or PedidoOracao object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(PedidoOracaoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from PedidoOracao object
		}

		if ($criteria->containsKey(PedidoOracaoPeer::ID) && $criteria->keyContainsValue(PedidoOracaoPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.PedidoOracaoPeer::ID.')');
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
	 * Performs an UPDATE on the database, given a PedidoOracao or Criteria object.
	 *
	 * @param      mixed $values Criteria or PedidoOracao object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(PedidoOracaoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(PedidoOracaoPeer::ID);
			$value = $criteria->remove(PedidoOracaoPeer::ID);
			if ($value) {
				$selectCriteria->add(PedidoOracaoPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(PedidoOracaoPeer::TABLE_NAME);
			}

		} else { // $values is PedidoOracao object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Deletes all rows from the pedido_oracao table.
	 *
	 * @param      PropelPDO $con the connection to use
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(PedidoOracaoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(PedidoOracaoPeer::TABLE_NAME, $con, PedidoOracaoPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			PedidoOracaoPeer::clearInstancePool();
			PedidoOracaoPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs a DELETE on the database, given a PedidoOracao or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or PedidoOracao object or primary key or array of primary keys
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
			$con = Propel::getConnection(PedidoOracaoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			PedidoOracaoPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof PedidoOracao) { // it's a model object
			// invalidate the cache for this single object
			PedidoOracaoPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PedidoOracaoPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				PedidoOracaoPeer::removeInstanceFromPool($singleval);
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
			PedidoOracaoPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given PedidoOracao object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      PedidoOracao $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PedidoOracaoPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PedidoOracaoPeer::TABLE_NAME);

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

		return BasePeer::doValidate(PedidoOracaoPeer::DATABASE_NAME, PedidoOracaoPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     PedidoOracao
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = PedidoOracaoPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(PedidoOracaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(PedidoOracaoPeer::DATABASE_NAME);
		$criteria->add(PedidoOracaoPeer::ID, $pk);

		$v = PedidoOracaoPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(PedidoOracaoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(PedidoOracaoPeer::DATABASE_NAME);
			$criteria->add(PedidoOracaoPeer::ID, $pks, Criteria::IN);
			$objs = PedidoOracaoPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BasePedidoOracaoPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BasePedidoOracaoPeer::buildTableMap();
