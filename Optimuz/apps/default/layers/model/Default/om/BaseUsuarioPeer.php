<?php


/**
 * Base static class for performing query and update operations on the 'usuario' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseUsuarioPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'Default';

	/** the table name for this class */
	const TABLE_NAME = 'usuario';

	/** the related Propel class for this table */
	const OM_CLASS = 'Usuario';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'Default.Usuario';

	/** the related TableMap class for this table */
	const TM_CLASS = 'UsuarioTableMap';

	/** The total number of columns. */
	const NUM_COLUMNS = 26;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
	const NUM_HYDRATE_COLUMNS = 26;

	/** the column name for the ID field */
	const ID = 'usuario.ID';

	/** the column name for the PERFIL_ID field */
	const PERFIL_ID = 'usuario.PERFIL_ID';

	/** the column name for the ENDERECO_ID field */
	const ENDERECO_ID = 'usuario.ENDERECO_ID';

	/** the column name for the CARGO_ID field */
	const CARGO_ID = 'usuario.CARGO_ID';

	/** the column name for the DEPARTAMENTO_ID field */
	const DEPARTAMENTO_ID = 'usuario.DEPARTAMENTO_ID';

	/** the column name for the MATRICULA field */
	const MATRICULA = 'usuario.MATRICULA';

	/** the column name for the NOME field */
	const NOME = 'usuario.NOME';

	/** the column name for the EMAIL field */
	const EMAIL = 'usuario.EMAIL';

	/** the column name for the DNI field */
	const DNI = 'usuario.DNI';

	/** the column name for the DATA_NASCIMENTO field */
	const DATA_NASCIMENTO = 'usuario.DATA_NASCIMENTO';

	/** the column name for the DATA_CONTRATACAO field */
	const DATA_CONTRATACAO = 'usuario.DATA_CONTRATACAO';

	/** the column name for the CELULAR field */
	const CELULAR = 'usuario.CELULAR';

	/** the column name for the TELEFONE field */
	const TELEFONE = 'usuario.TELEFONE';

	/** the column name for the TOKEN field */
	const TOKEN = 'usuario.TOKEN';

	/** the column name for the NOME_USUARIO field */
	const NOME_USUARIO = 'usuario.NOME_USUARIO';

	/** the column name for the SENHA field */
	const SENHA = 'usuario.SENHA';

	/** the column name for the TOKEN_SENHA field */
	const TOKEN_SENHA = 'usuario.TOKEN_SENHA';

	/** the column name for the TOKEN_FIREBASE field */
	const TOKEN_FIREBASE = 'usuario.TOKEN_FIREBASE';

	/** the column name for the DATA_RESCISAO field */
	const DATA_RESCISAO = 'usuario.DATA_RESCISAO';

	/** the column name for the ATIVO field */
	const ATIVO = 'usuario.ATIVO';

	/** the column name for the TIPO_ACESSO field */
	const TIPO_ACESSO = 'usuario.TIPO_ACESSO';

	/** the column name for the ESTADO_CIVIL field */
	const ESTADO_CIVIL = 'usuario.ESTADO_CIVIL';

	/** the column name for the NIVEL_ACESSO field */
	const NIVEL_ACESSO = 'usuario.NIVEL_ACESSO';

	/** the column name for the USUARIO_VALIDADO field */
	const USUARIO_VALIDADO = 'usuario.USUARIO_VALIDADO';

	/** the column name for the SEXO field */
	const SEXO = 'usuario.SEXO';

	/** the column name for the DATA_CADASTRO field */
	const DATA_CADASTRO = 'usuario.DATA_CADASTRO';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * An identiy map to hold any loaded instances of Usuario objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array Usuario[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'PerfilId', 'EnderecoId', 'CargoId', 'DepartamentoId', 'Matricula', 'Nome', 'Email', 'Dni', 'DataNascimento', 'DataContratacao', 'Celular', 'Telefone', 'Token', 'NomeUsuario', 'Senha', 'TokenSenha', 'TokenFirebase', 'DataRescisao', 'Ativo', 'TipoAcesso', 'EstadoCivil', 'NivelAcesso', 'UsuarioValidado', 'Sexo', 'DataCadastro', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'perfilId', 'enderecoId', 'cargoId', 'departamentoId', 'matricula', 'nome', 'email', 'dni', 'dataNascimento', 'dataContratacao', 'celular', 'telefone', 'token', 'nomeUsuario', 'senha', 'tokenSenha', 'tokenFirebase', 'dataRescisao', 'ativo', 'tipoAcesso', 'estadoCivil', 'nivelAcesso', 'usuarioValidado', 'sexo', 'dataCadastro', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::PERFIL_ID, self::ENDERECO_ID, self::CARGO_ID, self::DEPARTAMENTO_ID, self::MATRICULA, self::NOME, self::EMAIL, self::DNI, self::DATA_NASCIMENTO, self::DATA_CONTRATACAO, self::CELULAR, self::TELEFONE, self::TOKEN, self::NOME_USUARIO, self::SENHA, self::TOKEN_SENHA, self::TOKEN_FIREBASE, self::DATA_RESCISAO, self::ATIVO, self::TIPO_ACESSO, self::ESTADO_CIVIL, self::NIVEL_ACESSO, self::USUARIO_VALIDADO, self::SEXO, self::DATA_CADASTRO, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'PERFIL_ID', 'ENDERECO_ID', 'CARGO_ID', 'DEPARTAMENTO_ID', 'MATRICULA', 'NOME', 'EMAIL', 'DNI', 'DATA_NASCIMENTO', 'DATA_CONTRATACAO', 'CELULAR', 'TELEFONE', 'TOKEN', 'NOME_USUARIO', 'SENHA', 'TOKEN_SENHA', 'TOKEN_FIREBASE', 'DATA_RESCISAO', 'ATIVO', 'TIPO_ACESSO', 'ESTADO_CIVIL', 'NIVEL_ACESSO', 'USUARIO_VALIDADO', 'SEXO', 'DATA_CADASTRO', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'perfil_id', 'endereco_id', 'cargo_id', 'departamento_id', 'matricula', 'nome', 'email', 'dni', 'data_nascimento', 'data_contratacao', 'celular', 'telefone', 'token', 'nome_usuario', 'senha', 'token_senha', 'token_firebase', 'data_rescisao', 'ativo', 'tipo_acesso', 'estado_civil', 'nivel_acesso', 'usuario_validado', 'sexo', 'data_cadastro', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'PerfilId' => 1, 'EnderecoId' => 2, 'CargoId' => 3, 'DepartamentoId' => 4, 'Matricula' => 5, 'Nome' => 6, 'Email' => 7, 'Dni' => 8, 'DataNascimento' => 9, 'DataContratacao' => 10, 'Celular' => 11, 'Telefone' => 12, 'Token' => 13, 'NomeUsuario' => 14, 'Senha' => 15, 'TokenSenha' => 16, 'TokenFirebase' => 17, 'DataRescisao' => 18, 'Ativo' => 19, 'TipoAcesso' => 20, 'EstadoCivil' => 21, 'NivelAcesso' => 22, 'UsuarioValidado' => 23, 'Sexo' => 24, 'DataCadastro' => 25, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'perfilId' => 1, 'enderecoId' => 2, 'cargoId' => 3, 'departamentoId' => 4, 'matricula' => 5, 'nome' => 6, 'email' => 7, 'dni' => 8, 'dataNascimento' => 9, 'dataContratacao' => 10, 'celular' => 11, 'telefone' => 12, 'token' => 13, 'nomeUsuario' => 14, 'senha' => 15, 'tokenSenha' => 16, 'tokenFirebase' => 17, 'dataRescisao' => 18, 'ativo' => 19, 'tipoAcesso' => 20, 'estadoCivil' => 21, 'nivelAcesso' => 22, 'usuarioValidado' => 23, 'sexo' => 24, 'dataCadastro' => 25, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::PERFIL_ID => 1, self::ENDERECO_ID => 2, self::CARGO_ID => 3, self::DEPARTAMENTO_ID => 4, self::MATRICULA => 5, self::NOME => 6, self::EMAIL => 7, self::DNI => 8, self::DATA_NASCIMENTO => 9, self::DATA_CONTRATACAO => 10, self::CELULAR => 11, self::TELEFONE => 12, self::TOKEN => 13, self::NOME_USUARIO => 14, self::SENHA => 15, self::TOKEN_SENHA => 16, self::TOKEN_FIREBASE => 17, self::DATA_RESCISAO => 18, self::ATIVO => 19, self::TIPO_ACESSO => 20, self::ESTADO_CIVIL => 21, self::NIVEL_ACESSO => 22, self::USUARIO_VALIDADO => 23, self::SEXO => 24, self::DATA_CADASTRO => 25, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'PERFIL_ID' => 1, 'ENDERECO_ID' => 2, 'CARGO_ID' => 3, 'DEPARTAMENTO_ID' => 4, 'MATRICULA' => 5, 'NOME' => 6, 'EMAIL' => 7, 'DNI' => 8, 'DATA_NASCIMENTO' => 9, 'DATA_CONTRATACAO' => 10, 'CELULAR' => 11, 'TELEFONE' => 12, 'TOKEN' => 13, 'NOME_USUARIO' => 14, 'SENHA' => 15, 'TOKEN_SENHA' => 16, 'TOKEN_FIREBASE' => 17, 'DATA_RESCISAO' => 18, 'ATIVO' => 19, 'TIPO_ACESSO' => 20, 'ESTADO_CIVIL' => 21, 'NIVEL_ACESSO' => 22, 'USUARIO_VALIDADO' => 23, 'SEXO' => 24, 'DATA_CADASTRO' => 25, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'perfil_id' => 1, 'endereco_id' => 2, 'cargo_id' => 3, 'departamento_id' => 4, 'matricula' => 5, 'nome' => 6, 'email' => 7, 'dni' => 8, 'data_nascimento' => 9, 'data_contratacao' => 10, 'celular' => 11, 'telefone' => 12, 'token' => 13, 'nome_usuario' => 14, 'senha' => 15, 'token_senha' => 16, 'token_firebase' => 17, 'data_rescisao' => 18, 'ativo' => 19, 'tipo_acesso' => 20, 'estado_civil' => 21, 'nivel_acesso' => 22, 'usuario_validado' => 23, 'sexo' => 24, 'data_cadastro' => 25, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, )
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
	 * @param      string $column The column name for current table. (i.e. UsuarioPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(UsuarioPeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(UsuarioPeer::ID);
			$criteria->addSelectColumn(UsuarioPeer::PERFIL_ID);
			$criteria->addSelectColumn(UsuarioPeer::ENDERECO_ID);
			$criteria->addSelectColumn(UsuarioPeer::CARGO_ID);
			$criteria->addSelectColumn(UsuarioPeer::DEPARTAMENTO_ID);
			$criteria->addSelectColumn(UsuarioPeer::MATRICULA);
			$criteria->addSelectColumn(UsuarioPeer::NOME);
			$criteria->addSelectColumn(UsuarioPeer::EMAIL);
			$criteria->addSelectColumn(UsuarioPeer::DNI);
			$criteria->addSelectColumn(UsuarioPeer::DATA_NASCIMENTO);
			$criteria->addSelectColumn(UsuarioPeer::DATA_CONTRATACAO);
			$criteria->addSelectColumn(UsuarioPeer::CELULAR);
			$criteria->addSelectColumn(UsuarioPeer::TELEFONE);
			$criteria->addSelectColumn(UsuarioPeer::TOKEN);
			$criteria->addSelectColumn(UsuarioPeer::NOME_USUARIO);
			$criteria->addSelectColumn(UsuarioPeer::SENHA);
			$criteria->addSelectColumn(UsuarioPeer::TOKEN_SENHA);
			$criteria->addSelectColumn(UsuarioPeer::TOKEN_FIREBASE);
			$criteria->addSelectColumn(UsuarioPeer::DATA_RESCISAO);
			$criteria->addSelectColumn(UsuarioPeer::ATIVO);
			$criteria->addSelectColumn(UsuarioPeer::TIPO_ACESSO);
			$criteria->addSelectColumn(UsuarioPeer::ESTADO_CIVIL);
			$criteria->addSelectColumn(UsuarioPeer::NIVEL_ACESSO);
			$criteria->addSelectColumn(UsuarioPeer::USUARIO_VALIDADO);
			$criteria->addSelectColumn(UsuarioPeer::SEXO);
			$criteria->addSelectColumn(UsuarioPeer::DATA_CADASTRO);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.PERFIL_ID');
			$criteria->addSelectColumn($alias . '.ENDERECO_ID');
			$criteria->addSelectColumn($alias . '.CARGO_ID');
			$criteria->addSelectColumn($alias . '.DEPARTAMENTO_ID');
			$criteria->addSelectColumn($alias . '.MATRICULA');
			$criteria->addSelectColumn($alias . '.NOME');
			$criteria->addSelectColumn($alias . '.EMAIL');
			$criteria->addSelectColumn($alias . '.DNI');
			$criteria->addSelectColumn($alias . '.DATA_NASCIMENTO');
			$criteria->addSelectColumn($alias . '.DATA_CONTRATACAO');
			$criteria->addSelectColumn($alias . '.CELULAR');
			$criteria->addSelectColumn($alias . '.TELEFONE');
			$criteria->addSelectColumn($alias . '.TOKEN');
			$criteria->addSelectColumn($alias . '.NOME_USUARIO');
			$criteria->addSelectColumn($alias . '.SENHA');
			$criteria->addSelectColumn($alias . '.TOKEN_SENHA');
			$criteria->addSelectColumn($alias . '.TOKEN_FIREBASE');
			$criteria->addSelectColumn($alias . '.DATA_RESCISAO');
			$criteria->addSelectColumn($alias . '.ATIVO');
			$criteria->addSelectColumn($alias . '.TIPO_ACESSO');
			$criteria->addSelectColumn($alias . '.ESTADO_CIVIL');
			$criteria->addSelectColumn($alias . '.NIVEL_ACESSO');
			$criteria->addSelectColumn($alias . '.USUARIO_VALIDADO');
			$criteria->addSelectColumn($alias . '.SEXO');
			$criteria->addSelectColumn($alias . '.DATA_CADASTRO');
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
		$criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     Usuario
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = UsuarioPeer::doSelect($critcopy, $con);
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
		return UsuarioPeer::populateObjects(UsuarioPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			UsuarioPeer::addSelectColumns($criteria);
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
	 * @param      Usuario $value A Usuario object.
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
	 * @param      mixed $value A Usuario object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Usuario) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Usuario object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     Usuario Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to usuario
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
		$cls = UsuarioPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = UsuarioPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				UsuarioPeer::addInstanceToPool($obj, $key);
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
	 * @return     array (Usuario object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = UsuarioPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + UsuarioPeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = UsuarioPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			UsuarioPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Perfil table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinPerfil(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(UsuarioPeer::PERFIL_ID, PerfilPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Cargo table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinCargo(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(UsuarioPeer::CARGO_ID, CargoPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Departamento table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinDepartamento(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(UsuarioPeer::DEPARTAMENTO_ID, DepartamentoPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Endereco table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinEndereco(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(UsuarioPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

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
	 * Selects a collection of Usuario objects pre-filled with their Perfil objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Usuario objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinPerfil(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		UsuarioPeer::addSelectColumns($criteria);
		$startcol = UsuarioPeer::NUM_HYDRATE_COLUMNS;
		PerfilPeer::addSelectColumns($criteria);

		$criteria->addJoin(UsuarioPeer::PERFIL_ID, PerfilPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = UsuarioPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = PerfilPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = PerfilPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = PerfilPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					PerfilPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Usuario) to $obj2 (Perfil)
				$obj2->addUsuario($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Usuario objects pre-filled with their Cargo objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Usuario objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinCargo(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		UsuarioPeer::addSelectColumns($criteria);
		$startcol = UsuarioPeer::NUM_HYDRATE_COLUMNS;
		CargoPeer::addSelectColumns($criteria);

		$criteria->addJoin(UsuarioPeer::CARGO_ID, CargoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = UsuarioPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = CargoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = CargoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = CargoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					CargoPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Usuario) to $obj2 (Cargo)
				$obj2->addUsuario($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Usuario objects pre-filled with their Departamento objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Usuario objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinDepartamento(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		UsuarioPeer::addSelectColumns($criteria);
		$startcol = UsuarioPeer::NUM_HYDRATE_COLUMNS;
		DepartamentoPeer::addSelectColumns($criteria);

		$criteria->addJoin(UsuarioPeer::DEPARTAMENTO_ID, DepartamentoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = UsuarioPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = DepartamentoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DepartamentoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = DepartamentoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DepartamentoPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Usuario) to $obj2 (Departamento)
				$obj2->addUsuario($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Usuario objects pre-filled with their Endereco objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Usuario objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinEndereco(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		UsuarioPeer::addSelectColumns($criteria);
		$startcol = UsuarioPeer::NUM_HYDRATE_COLUMNS;
		EnderecoPeer::addSelectColumns($criteria);

		$criteria->addJoin(UsuarioPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = UsuarioPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = EnderecoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = EnderecoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = EnderecoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					EnderecoPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Usuario) to $obj2 (Endereco)
				$obj2->addUsuario($obj1);

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
		$criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(UsuarioPeer::PERFIL_ID, PerfilPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::CARGO_ID, CargoPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::DEPARTAMENTO_ID, DepartamentoPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

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
	 * Selects a collection of Usuario objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Usuario objects.
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

		UsuarioPeer::addSelectColumns($criteria);
		$startcol2 = UsuarioPeer::NUM_HYDRATE_COLUMNS;

		PerfilPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + PerfilPeer::NUM_HYDRATE_COLUMNS;

		CargoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + CargoPeer::NUM_HYDRATE_COLUMNS;

		DepartamentoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + DepartamentoPeer::NUM_HYDRATE_COLUMNS;

		EnderecoPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + EnderecoPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(UsuarioPeer::PERFIL_ID, PerfilPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::CARGO_ID, CargoPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::DEPARTAMENTO_ID, DepartamentoPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = UsuarioPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined Perfil rows

			$key2 = PerfilPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = PerfilPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = PerfilPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					PerfilPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (Usuario) to the collection in $obj2 (Perfil)
				$obj2->addUsuario($obj1);
			} // if joined row not null

			// Add objects for joined Cargo rows

			$key3 = CargoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = CargoPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = CargoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					CargoPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (Usuario) to the collection in $obj3 (Cargo)
				$obj3->addUsuario($obj1);
			} // if joined row not null

			// Add objects for joined Departamento rows

			$key4 = DepartamentoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = DepartamentoPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = DepartamentoPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					DepartamentoPeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (Usuario) to the collection in $obj4 (Departamento)
				$obj4->addUsuario($obj1);
			} // if joined row not null

			// Add objects for joined Endereco rows

			$key5 = EnderecoPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = EnderecoPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$cls = EnderecoPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					EnderecoPeer::addInstanceToPool($obj5, $key5);
				} // if obj5 loaded

				// Add the $obj1 (Usuario) to the collection in $obj5 (Endereco)
				$obj5->addUsuario($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Perfil table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptPerfil(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(UsuarioPeer::CARGO_ID, CargoPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::DEPARTAMENTO_ID, DepartamentoPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Cargo table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptCargo(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(UsuarioPeer::PERFIL_ID, PerfilPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::DEPARTAMENTO_ID, DepartamentoPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Departamento table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptDepartamento(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(UsuarioPeer::PERFIL_ID, PerfilPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::CARGO_ID, CargoPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related Endereco table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptEndereco(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			UsuarioPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(UsuarioPeer::PERFIL_ID, PerfilPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::CARGO_ID, CargoPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::DEPARTAMENTO_ID, DepartamentoPeer::ID, $join_behavior);

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
	 * Selects a collection of Usuario objects pre-filled with all related objects except Perfil.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Usuario objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptPerfil(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		UsuarioPeer::addSelectColumns($criteria);
		$startcol2 = UsuarioPeer::NUM_HYDRATE_COLUMNS;

		CargoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + CargoPeer::NUM_HYDRATE_COLUMNS;

		DepartamentoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + DepartamentoPeer::NUM_HYDRATE_COLUMNS;

		EnderecoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + EnderecoPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(UsuarioPeer::CARGO_ID, CargoPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::DEPARTAMENTO_ID, DepartamentoPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = UsuarioPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Cargo rows

				$key2 = CargoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = CargoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = CargoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CargoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj2 (Cargo)
				$obj2->addUsuario($obj1);

			} // if joined row is not null

				// Add objects for joined Departamento rows

				$key3 = DepartamentoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = DepartamentoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = DepartamentoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					DepartamentoPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj3 (Departamento)
				$obj3->addUsuario($obj1);

			} // if joined row is not null

				// Add objects for joined Endereco rows

				$key4 = EnderecoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = EnderecoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = EnderecoPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					EnderecoPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj4 (Endereco)
				$obj4->addUsuario($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Usuario objects pre-filled with all related objects except Cargo.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Usuario objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptCargo(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		UsuarioPeer::addSelectColumns($criteria);
		$startcol2 = UsuarioPeer::NUM_HYDRATE_COLUMNS;

		PerfilPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + PerfilPeer::NUM_HYDRATE_COLUMNS;

		DepartamentoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + DepartamentoPeer::NUM_HYDRATE_COLUMNS;

		EnderecoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + EnderecoPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(UsuarioPeer::PERFIL_ID, PerfilPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::DEPARTAMENTO_ID, DepartamentoPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = UsuarioPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Perfil rows

				$key2 = PerfilPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = PerfilPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = PerfilPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					PerfilPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj2 (Perfil)
				$obj2->addUsuario($obj1);

			} // if joined row is not null

				// Add objects for joined Departamento rows

				$key3 = DepartamentoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = DepartamentoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = DepartamentoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					DepartamentoPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj3 (Departamento)
				$obj3->addUsuario($obj1);

			} // if joined row is not null

				// Add objects for joined Endereco rows

				$key4 = EnderecoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = EnderecoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = EnderecoPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					EnderecoPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj4 (Endereco)
				$obj4->addUsuario($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Usuario objects pre-filled with all related objects except Departamento.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Usuario objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptDepartamento(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		UsuarioPeer::addSelectColumns($criteria);
		$startcol2 = UsuarioPeer::NUM_HYDRATE_COLUMNS;

		PerfilPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + PerfilPeer::NUM_HYDRATE_COLUMNS;

		CargoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + CargoPeer::NUM_HYDRATE_COLUMNS;

		EnderecoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + EnderecoPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(UsuarioPeer::PERFIL_ID, PerfilPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::CARGO_ID, CargoPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = UsuarioPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Perfil rows

				$key2 = PerfilPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = PerfilPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = PerfilPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					PerfilPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj2 (Perfil)
				$obj2->addUsuario($obj1);

			} // if joined row is not null

				// Add objects for joined Cargo rows

				$key3 = CargoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = CargoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = CargoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					CargoPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj3 (Cargo)
				$obj3->addUsuario($obj1);

			} // if joined row is not null

				// Add objects for joined Endereco rows

				$key4 = EnderecoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = EnderecoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = EnderecoPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					EnderecoPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj4 (Endereco)
				$obj4->addUsuario($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Usuario objects pre-filled with all related objects except Endereco.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Usuario objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptEndereco(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		UsuarioPeer::addSelectColumns($criteria);
		$startcol2 = UsuarioPeer::NUM_HYDRATE_COLUMNS;

		PerfilPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + PerfilPeer::NUM_HYDRATE_COLUMNS;

		CargoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + CargoPeer::NUM_HYDRATE_COLUMNS;

		DepartamentoPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + DepartamentoPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(UsuarioPeer::PERFIL_ID, PerfilPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::CARGO_ID, CargoPeer::ID, $join_behavior);

		$criteria->addJoin(UsuarioPeer::DEPARTAMENTO_ID, DepartamentoPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = UsuarioPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = UsuarioPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = UsuarioPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				UsuarioPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Perfil rows

				$key2 = PerfilPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = PerfilPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = PerfilPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					PerfilPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj2 (Perfil)
				$obj2->addUsuario($obj1);

			} // if joined row is not null

				// Add objects for joined Cargo rows

				$key3 = CargoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = CargoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = CargoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					CargoPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj3 (Cargo)
				$obj3->addUsuario($obj1);

			} // if joined row is not null

				// Add objects for joined Departamento rows

				$key4 = DepartamentoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = DepartamentoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = DepartamentoPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					DepartamentoPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Usuario) to the collection in $obj4 (Departamento)
				$obj4->addUsuario($obj1);

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
	  $dbMap = Propel::getDatabaseMap(BaseUsuarioPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseUsuarioPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new UsuarioTableMap());
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
		return $withPrefix ? UsuarioPeer::CLASS_DEFAULT : UsuarioPeer::OM_CLASS;
	}

	/**
	 * Performs an INSERT on the database, given a Usuario or Criteria object.
	 *
	 * @param      mixed $values Criteria or Usuario object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Usuario object
		}

		if ($criteria->containsKey(UsuarioPeer::ID) && $criteria->keyContainsValue(UsuarioPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.UsuarioPeer::ID.')');
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
	 * Performs an UPDATE on the database, given a Usuario or Criteria object.
	 *
	 * @param      mixed $values Criteria or Usuario object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(UsuarioPeer::ID);
			$value = $criteria->remove(UsuarioPeer::ID);
			if ($value) {
				$selectCriteria->add(UsuarioPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(UsuarioPeer::TABLE_NAME);
			}

		} else { // $values is Usuario object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Deletes all rows from the usuario table.
	 *
	 * @param      PropelPDO $con the connection to use
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(UsuarioPeer::TABLE_NAME, $con, UsuarioPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			UsuarioPeer::clearInstancePool();
			UsuarioPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs a DELETE on the database, given a Usuario or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Usuario object or primary key or array of primary keys
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
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			UsuarioPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof Usuario) { // it's a model object
			// invalidate the cache for this single object
			UsuarioPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(UsuarioPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				UsuarioPeer::removeInstanceFromPool($singleval);
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
			UsuarioPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given Usuario object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Usuario $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(UsuarioPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(UsuarioPeer::TABLE_NAME);

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

		return BasePeer::doValidate(UsuarioPeer::DATABASE_NAME, UsuarioPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     Usuario
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = UsuarioPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
		$criteria->add(UsuarioPeer::ID, $pk);

		$v = UsuarioPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(UsuarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(UsuarioPeer::DATABASE_NAME);
			$criteria->add(UsuarioPeer::ID, $pks, Criteria::IN);
			$objs = UsuarioPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseUsuarioPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseUsuarioPeer::buildTableMap();

