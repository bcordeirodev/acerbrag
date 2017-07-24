<?php


/**
 * Base static class for performing query and update operations on the 'membro' table.
 *
 * 
 *
 * @package    propel.generator.Default.om
 */
abstract class BaseMembroPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'Default';

	/** the table name for this class */
	const TABLE_NAME = 'membro';

	/** the related Propel class for this table */
	const OM_CLASS = 'Membro';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'Default.Membro';

	/** the related TableMap class for this table */
	const TM_CLASS = 'MembroTableMap';

	/** The total number of columns. */
	const NUM_COLUMNS = 38;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
	const NUM_HYDRATE_COLUMNS = 38;

	/** the column name for the ID field */
	const ID = 'membro.ID';

	/** the column name for the INSTITUICAO_ID field */
	const INSTITUICAO_ID = 'membro.INSTITUICAO_ID';

	/** the column name for the FILIAL_ID field */
	const FILIAL_ID = 'membro.FILIAL_ID';

	/** the column name for the CRIADOR_ID field */
	const CRIADOR_ID = 'membro.CRIADOR_ID';

	/** the column name for the MEMBRO_USUARIO_ID field */
	const MEMBRO_USUARIO_ID = 'membro.MEMBRO_USUARIO_ID';

	/** the column name for the USUARIO_APROVADOR_ID field */
	const USUARIO_APROVADOR_ID = 'membro.USUARIO_APROVADOR_ID';

	/** the column name for the ENDERECO_ID field */
	const ENDERECO_ID = 'membro.ENDERECO_ID';

	/** the column name for the CIDADE_NATURALIDADE_ID field */
	const CIDADE_NATURALIDADE_ID = 'membro.CIDADE_NATURALIDADE_ID';

	/** the column name for the NOME_COMPLETO field */
	const NOME_COMPLETO = 'membro.NOME_COMPLETO';

	/** the column name for the SEXO field */
	const SEXO = 'membro.SEXO';

	/** the column name for the RG field */
	const RG = 'membro.RG';

	/** the column name for the RG_EXPEDIDOR field */
	const RG_EXPEDIDOR = 'membro.RG_EXPEDIDOR';

	/** the column name for the CPF field */
	const CPF = 'membro.CPF';

	/** the column name for the ESTADO_CIVIL field */
	const ESTADO_CIVIL = 'membro.ESTADO_CIVIL';

	/** the column name for the NOME_CONJUNGE field */
	const NOME_CONJUNGE = 'membro.NOME_CONJUNGE';

	/** the column name for the CRISTAO field */
	const CRISTAO = 'membro.CRISTAO';

	/** the column name for the NOME_PAI field */
	const NOME_PAI = 'membro.NOME_PAI';

	/** the column name for the NOME_MAE field */
	const NOME_MAE = 'membro.NOME_MAE';

	/** the column name for the TELEFONE_RESIDENCIAL field */
	const TELEFONE_RESIDENCIAL = 'membro.TELEFONE_RESIDENCIAL';

	/** the column name for the TELEFONE_CELULAR field */
	const TELEFONE_CELULAR = 'membro.TELEFONE_CELULAR';

	/** the column name for the EMAIL field */
	const EMAIL = 'membro.EMAIL';

	/** the column name for the BATIZADO field */
	const BATIZADO = 'membro.BATIZADO';

	/** the column name for the DATA_MEMBRO field */
	const DATA_MEMBRO = 'membro.DATA_MEMBRO';

	/** the column name for the IGREJA_ORIGEM field */
	const IGREJA_ORIGEM = 'membro.IGREJA_ORIGEM';

	/** the column name for the PASTOR_IGREJA_ORIGEM field */
	const PASTOR_IGREJA_ORIGEM = 'membro.PASTOR_IGREJA_ORIGEM';

	/** the column name for the TELEFONE_IGREJA_ORIGEM field */
	const TELEFONE_IGREJA_ORIGEM = 'membro.TELEFONE_IGREJA_ORIGEM';

	/** the column name for the POSSUI_MINISTERIO field */
	const POSSUI_MINISTERIO = 'membro.POSSUI_MINISTERIO';

	/** the column name for the NOME_ANTIGO_MINISTERIO field */
	const NOME_ANTIGO_MINISTERIO = 'membro.NOME_ANTIGO_MINISTERIO';

	/** the column name for the PARTICIPA_PG field */
	const PARTICIPA_PG = 'membro.PARTICIPA_PG';

	/** the column name for the NOME_PG field */
	const NOME_PG = 'membro.NOME_PG';

	/** the column name for the CARGO_IGREJA field */
	const CARGO_IGREJA = 'membro.CARGO_IGREJA';

	/** the column name for the EXPERIENCIA_OUTRAS_IGREJAS field */
	const EXPERIENCIA_OUTRAS_IGREJAS = 'membro.EXPERIENCIA_OUTRAS_IGREJAS';

	/** the column name for the INTERESSE_MINISTERIOS field */
	const INTERESSE_MINISTERIOS = 'membro.INTERESSE_MINISTERIOS';

	/** the column name for the DATA_CADASTRO field */
	const DATA_CADASTRO = 'membro.DATA_CADASTRO';

	/** the column name for the DATA_NASCIMENTO field */
	const DATA_NASCIMENTO = 'membro.DATA_NASCIMENTO';

	/** the column name for the PROFISSAO field */
	const PROFISSAO = 'membro.PROFISSAO';

	/** the column name for the ATIVO field */
	const ATIVO = 'membro.ATIVO';

	/** the column name for the CADASTRO_APROVADO field */
	const CADASTRO_APROVADO = 'membro.CADASTRO_APROVADO';

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * An identiy map to hold any loaded instances of Membro objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array Membro[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'InstituicaoId', 'FilialId', 'CriadorId', 'MembroUsuarioId', 'UsuarioAprovadorId', 'EnderecoId', 'CidadeNaturalidadeId', 'NomeCompleto', 'Sexo', 'Rg', 'RgExpedidor', 'Cpf', 'EstadoCivil', 'NomeConjunge', 'Cristao', 'NomePai', 'NomeMae', 'TelefoneResidencial', 'TelefoneCelular', 'Email', 'Batizado', 'DataMembro', 'IgrejaOrigem', 'PastorIgrejaOrigem', 'TelefoneIgrejaOrigem', 'PossuiMinisterio', 'NomeAntigoMinisterio', 'ParticipaPg', 'NomePg', 'CargoIgreja', 'ExperienciaOutrasIgrejas', 'InteresseMinisterios', 'DataCadastro', 'DataNascimento', 'Profissao', 'Ativo', 'CadastroAprovado', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'instituicaoId', 'filialId', 'criadorId', 'membroUsuarioId', 'usuarioAprovadorId', 'enderecoId', 'cidadeNaturalidadeId', 'nomeCompleto', 'sexo', 'rg', 'rgExpedidor', 'cpf', 'estadoCivil', 'nomeConjunge', 'cristao', 'nomePai', 'nomeMae', 'telefoneResidencial', 'telefoneCelular', 'email', 'batizado', 'dataMembro', 'igrejaOrigem', 'pastorIgrejaOrigem', 'telefoneIgrejaOrigem', 'possuiMinisterio', 'nomeAntigoMinisterio', 'participaPg', 'nomePg', 'cargoIgreja', 'experienciaOutrasIgrejas', 'interesseMinisterios', 'dataCadastro', 'dataNascimento', 'profissao', 'ativo', 'cadastroAprovado', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::INSTITUICAO_ID, self::FILIAL_ID, self::CRIADOR_ID, self::MEMBRO_USUARIO_ID, self::USUARIO_APROVADOR_ID, self::ENDERECO_ID, self::CIDADE_NATURALIDADE_ID, self::NOME_COMPLETO, self::SEXO, self::RG, self::RG_EXPEDIDOR, self::CPF, self::ESTADO_CIVIL, self::NOME_CONJUNGE, self::CRISTAO, self::NOME_PAI, self::NOME_MAE, self::TELEFONE_RESIDENCIAL, self::TELEFONE_CELULAR, self::EMAIL, self::BATIZADO, self::DATA_MEMBRO, self::IGREJA_ORIGEM, self::PASTOR_IGREJA_ORIGEM, self::TELEFONE_IGREJA_ORIGEM, self::POSSUI_MINISTERIO, self::NOME_ANTIGO_MINISTERIO, self::PARTICIPA_PG, self::NOME_PG, self::CARGO_IGREJA, self::EXPERIENCIA_OUTRAS_IGREJAS, self::INTERESSE_MINISTERIOS, self::DATA_CADASTRO, self::DATA_NASCIMENTO, self::PROFISSAO, self::ATIVO, self::CADASTRO_APROVADO, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'INSTITUICAO_ID', 'FILIAL_ID', 'CRIADOR_ID', 'MEMBRO_USUARIO_ID', 'USUARIO_APROVADOR_ID', 'ENDERECO_ID', 'CIDADE_NATURALIDADE_ID', 'NOME_COMPLETO', 'SEXO', 'RG', 'RG_EXPEDIDOR', 'CPF', 'ESTADO_CIVIL', 'NOME_CONJUNGE', 'CRISTAO', 'NOME_PAI', 'NOME_MAE', 'TELEFONE_RESIDENCIAL', 'TELEFONE_CELULAR', 'EMAIL', 'BATIZADO', 'DATA_MEMBRO', 'IGREJA_ORIGEM', 'PASTOR_IGREJA_ORIGEM', 'TELEFONE_IGREJA_ORIGEM', 'POSSUI_MINISTERIO', 'NOME_ANTIGO_MINISTERIO', 'PARTICIPA_PG', 'NOME_PG', 'CARGO_IGREJA', 'EXPERIENCIA_OUTRAS_IGREJAS', 'INTERESSE_MINISTERIOS', 'DATA_CADASTRO', 'DATA_NASCIMENTO', 'PROFISSAO', 'ATIVO', 'CADASTRO_APROVADO', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'instituicao_id', 'filial_id', 'criador_id', 'membro_usuario_id', 'usuario_aprovador_id', 'endereco_id', 'cidade_naturalidade_id', 'nome_completo', 'sexo', 'rg', 'rg_expedidor', 'cpf', 'estado_civil', 'nome_conjunge', 'cristao', 'nome_pai', 'nome_mae', 'telefone_residencial', 'telefone_celular', 'email', 'batizado', 'data_membro', 'igreja_origem', 'pastor_igreja_origem', 'telefone_igreja_origem', 'possui_ministerio', 'nome_antigo_ministerio', 'participa_pg', 'nome_pg', 'cargo_igreja', 'experiencia_outras_igrejas', 'interesse_ministerios', 'data_cadastro', 'data_nascimento', 'profissao', 'ativo', 'cadastro_aprovado', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'InstituicaoId' => 1, 'FilialId' => 2, 'CriadorId' => 3, 'MembroUsuarioId' => 4, 'UsuarioAprovadorId' => 5, 'EnderecoId' => 6, 'CidadeNaturalidadeId' => 7, 'NomeCompleto' => 8, 'Sexo' => 9, 'Rg' => 10, 'RgExpedidor' => 11, 'Cpf' => 12, 'EstadoCivil' => 13, 'NomeConjunge' => 14, 'Cristao' => 15, 'NomePai' => 16, 'NomeMae' => 17, 'TelefoneResidencial' => 18, 'TelefoneCelular' => 19, 'Email' => 20, 'Batizado' => 21, 'DataMembro' => 22, 'IgrejaOrigem' => 23, 'PastorIgrejaOrigem' => 24, 'TelefoneIgrejaOrigem' => 25, 'PossuiMinisterio' => 26, 'NomeAntigoMinisterio' => 27, 'ParticipaPg' => 28, 'NomePg' => 29, 'CargoIgreja' => 30, 'ExperienciaOutrasIgrejas' => 31, 'InteresseMinisterios' => 32, 'DataCadastro' => 33, 'DataNascimento' => 34, 'Profissao' => 35, 'Ativo' => 36, 'CadastroAprovado' => 37, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'instituicaoId' => 1, 'filialId' => 2, 'criadorId' => 3, 'membroUsuarioId' => 4, 'usuarioAprovadorId' => 5, 'enderecoId' => 6, 'cidadeNaturalidadeId' => 7, 'nomeCompleto' => 8, 'sexo' => 9, 'rg' => 10, 'rgExpedidor' => 11, 'cpf' => 12, 'estadoCivil' => 13, 'nomeConjunge' => 14, 'cristao' => 15, 'nomePai' => 16, 'nomeMae' => 17, 'telefoneResidencial' => 18, 'telefoneCelular' => 19, 'email' => 20, 'batizado' => 21, 'dataMembro' => 22, 'igrejaOrigem' => 23, 'pastorIgrejaOrigem' => 24, 'telefoneIgrejaOrigem' => 25, 'possuiMinisterio' => 26, 'nomeAntigoMinisterio' => 27, 'participaPg' => 28, 'nomePg' => 29, 'cargoIgreja' => 30, 'experienciaOutrasIgrejas' => 31, 'interesseMinisterios' => 32, 'dataCadastro' => 33, 'dataNascimento' => 34, 'profissao' => 35, 'ativo' => 36, 'cadastroAprovado' => 37, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::INSTITUICAO_ID => 1, self::FILIAL_ID => 2, self::CRIADOR_ID => 3, self::MEMBRO_USUARIO_ID => 4, self::USUARIO_APROVADOR_ID => 5, self::ENDERECO_ID => 6, self::CIDADE_NATURALIDADE_ID => 7, self::NOME_COMPLETO => 8, self::SEXO => 9, self::RG => 10, self::RG_EXPEDIDOR => 11, self::CPF => 12, self::ESTADO_CIVIL => 13, self::NOME_CONJUNGE => 14, self::CRISTAO => 15, self::NOME_PAI => 16, self::NOME_MAE => 17, self::TELEFONE_RESIDENCIAL => 18, self::TELEFONE_CELULAR => 19, self::EMAIL => 20, self::BATIZADO => 21, self::DATA_MEMBRO => 22, self::IGREJA_ORIGEM => 23, self::PASTOR_IGREJA_ORIGEM => 24, self::TELEFONE_IGREJA_ORIGEM => 25, self::POSSUI_MINISTERIO => 26, self::NOME_ANTIGO_MINISTERIO => 27, self::PARTICIPA_PG => 28, self::NOME_PG => 29, self::CARGO_IGREJA => 30, self::EXPERIENCIA_OUTRAS_IGREJAS => 31, self::INTERESSE_MINISTERIOS => 32, self::DATA_CADASTRO => 33, self::DATA_NASCIMENTO => 34, self::PROFISSAO => 35, self::ATIVO => 36, self::CADASTRO_APROVADO => 37, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'INSTITUICAO_ID' => 1, 'FILIAL_ID' => 2, 'CRIADOR_ID' => 3, 'MEMBRO_USUARIO_ID' => 4, 'USUARIO_APROVADOR_ID' => 5, 'ENDERECO_ID' => 6, 'CIDADE_NATURALIDADE_ID' => 7, 'NOME_COMPLETO' => 8, 'SEXO' => 9, 'RG' => 10, 'RG_EXPEDIDOR' => 11, 'CPF' => 12, 'ESTADO_CIVIL' => 13, 'NOME_CONJUNGE' => 14, 'CRISTAO' => 15, 'NOME_PAI' => 16, 'NOME_MAE' => 17, 'TELEFONE_RESIDENCIAL' => 18, 'TELEFONE_CELULAR' => 19, 'EMAIL' => 20, 'BATIZADO' => 21, 'DATA_MEMBRO' => 22, 'IGREJA_ORIGEM' => 23, 'PASTOR_IGREJA_ORIGEM' => 24, 'TELEFONE_IGREJA_ORIGEM' => 25, 'POSSUI_MINISTERIO' => 26, 'NOME_ANTIGO_MINISTERIO' => 27, 'PARTICIPA_PG' => 28, 'NOME_PG' => 29, 'CARGO_IGREJA' => 30, 'EXPERIENCIA_OUTRAS_IGREJAS' => 31, 'INTERESSE_MINISTERIOS' => 32, 'DATA_CADASTRO' => 33, 'DATA_NASCIMENTO' => 34, 'PROFISSAO' => 35, 'ATIVO' => 36, 'CADASTRO_APROVADO' => 37, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'instituicao_id' => 1, 'filial_id' => 2, 'criador_id' => 3, 'membro_usuario_id' => 4, 'usuario_aprovador_id' => 5, 'endereco_id' => 6, 'cidade_naturalidade_id' => 7, 'nome_completo' => 8, 'sexo' => 9, 'rg' => 10, 'rg_expedidor' => 11, 'cpf' => 12, 'estado_civil' => 13, 'nome_conjunge' => 14, 'cristao' => 15, 'nome_pai' => 16, 'nome_mae' => 17, 'telefone_residencial' => 18, 'telefone_celular' => 19, 'email' => 20, 'batizado' => 21, 'data_membro' => 22, 'igreja_origem' => 23, 'pastor_igreja_origem' => 24, 'telefone_igreja_origem' => 25, 'possui_ministerio' => 26, 'nome_antigo_ministerio' => 27, 'participa_pg' => 28, 'nome_pg' => 29, 'cargo_igreja' => 30, 'experiencia_outras_igrejas' => 31, 'interesse_ministerios' => 32, 'data_cadastro' => 33, 'data_nascimento' => 34, 'profissao' => 35, 'ativo' => 36, 'cadastro_aprovado' => 37, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, )
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
	 * @param      string $column The column name for current table. (i.e. MembroPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(MembroPeer::TABLE_NAME.'.', $alias.'.', $column);
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
			$criteria->addSelectColumn(MembroPeer::ID);
			$criteria->addSelectColumn(MembroPeer::INSTITUICAO_ID);
			$criteria->addSelectColumn(MembroPeer::FILIAL_ID);
			$criteria->addSelectColumn(MembroPeer::CRIADOR_ID);
			$criteria->addSelectColumn(MembroPeer::MEMBRO_USUARIO_ID);
			$criteria->addSelectColumn(MembroPeer::USUARIO_APROVADOR_ID);
			$criteria->addSelectColumn(MembroPeer::ENDERECO_ID);
			$criteria->addSelectColumn(MembroPeer::CIDADE_NATURALIDADE_ID);
			$criteria->addSelectColumn(MembroPeer::NOME_COMPLETO);
			$criteria->addSelectColumn(MembroPeer::SEXO);
			$criteria->addSelectColumn(MembroPeer::RG);
			$criteria->addSelectColumn(MembroPeer::RG_EXPEDIDOR);
			$criteria->addSelectColumn(MembroPeer::CPF);
			$criteria->addSelectColumn(MembroPeer::ESTADO_CIVIL);
			$criteria->addSelectColumn(MembroPeer::NOME_CONJUNGE);
			$criteria->addSelectColumn(MembroPeer::CRISTAO);
			$criteria->addSelectColumn(MembroPeer::NOME_PAI);
			$criteria->addSelectColumn(MembroPeer::NOME_MAE);
			$criteria->addSelectColumn(MembroPeer::TELEFONE_RESIDENCIAL);
			$criteria->addSelectColumn(MembroPeer::TELEFONE_CELULAR);
			$criteria->addSelectColumn(MembroPeer::EMAIL);
			$criteria->addSelectColumn(MembroPeer::BATIZADO);
			$criteria->addSelectColumn(MembroPeer::DATA_MEMBRO);
			$criteria->addSelectColumn(MembroPeer::IGREJA_ORIGEM);
			$criteria->addSelectColumn(MembroPeer::PASTOR_IGREJA_ORIGEM);
			$criteria->addSelectColumn(MembroPeer::TELEFONE_IGREJA_ORIGEM);
			$criteria->addSelectColumn(MembroPeer::POSSUI_MINISTERIO);
			$criteria->addSelectColumn(MembroPeer::NOME_ANTIGO_MINISTERIO);
			$criteria->addSelectColumn(MembroPeer::PARTICIPA_PG);
			$criteria->addSelectColumn(MembroPeer::NOME_PG);
			$criteria->addSelectColumn(MembroPeer::CARGO_IGREJA);
			$criteria->addSelectColumn(MembroPeer::EXPERIENCIA_OUTRAS_IGREJAS);
			$criteria->addSelectColumn(MembroPeer::INTERESSE_MINISTERIOS);
			$criteria->addSelectColumn(MembroPeer::DATA_CADASTRO);
			$criteria->addSelectColumn(MembroPeer::DATA_NASCIMENTO);
			$criteria->addSelectColumn(MembroPeer::PROFISSAO);
			$criteria->addSelectColumn(MembroPeer::ATIVO);
			$criteria->addSelectColumn(MembroPeer::CADASTRO_APROVADO);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.INSTITUICAO_ID');
			$criteria->addSelectColumn($alias . '.FILIAL_ID');
			$criteria->addSelectColumn($alias . '.CRIADOR_ID');
			$criteria->addSelectColumn($alias . '.MEMBRO_USUARIO_ID');
			$criteria->addSelectColumn($alias . '.USUARIO_APROVADOR_ID');
			$criteria->addSelectColumn($alias . '.ENDERECO_ID');
			$criteria->addSelectColumn($alias . '.CIDADE_NATURALIDADE_ID');
			$criteria->addSelectColumn($alias . '.NOME_COMPLETO');
			$criteria->addSelectColumn($alias . '.SEXO');
			$criteria->addSelectColumn($alias . '.RG');
			$criteria->addSelectColumn($alias . '.RG_EXPEDIDOR');
			$criteria->addSelectColumn($alias . '.CPF');
			$criteria->addSelectColumn($alias . '.ESTADO_CIVIL');
			$criteria->addSelectColumn($alias . '.NOME_CONJUNGE');
			$criteria->addSelectColumn($alias . '.CRISTAO');
			$criteria->addSelectColumn($alias . '.NOME_PAI');
			$criteria->addSelectColumn($alias . '.NOME_MAE');
			$criteria->addSelectColumn($alias . '.TELEFONE_RESIDENCIAL');
			$criteria->addSelectColumn($alias . '.TELEFONE_CELULAR');
			$criteria->addSelectColumn($alias . '.EMAIL');
			$criteria->addSelectColumn($alias . '.BATIZADO');
			$criteria->addSelectColumn($alias . '.DATA_MEMBRO');
			$criteria->addSelectColumn($alias . '.IGREJA_ORIGEM');
			$criteria->addSelectColumn($alias . '.PASTOR_IGREJA_ORIGEM');
			$criteria->addSelectColumn($alias . '.TELEFONE_IGREJA_ORIGEM');
			$criteria->addSelectColumn($alias . '.POSSUI_MINISTERIO');
			$criteria->addSelectColumn($alias . '.NOME_ANTIGO_MINISTERIO');
			$criteria->addSelectColumn($alias . '.PARTICIPA_PG');
			$criteria->addSelectColumn($alias . '.NOME_PG');
			$criteria->addSelectColumn($alias . '.CARGO_IGREJA');
			$criteria->addSelectColumn($alias . '.EXPERIENCIA_OUTRAS_IGREJAS');
			$criteria->addSelectColumn($alias . '.INTERESSE_MINISTERIOS');
			$criteria->addSelectColumn($alias . '.DATA_CADASTRO');
			$criteria->addSelectColumn($alias . '.DATA_NASCIMENTO');
			$criteria->addSelectColumn($alias . '.PROFISSAO');
			$criteria->addSelectColumn($alias . '.ATIVO');
			$criteria->addSelectColumn($alias . '.CADASTRO_APROVADO');
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
		$criteria->setPrimaryTableName(MembroPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			MembroPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return     Membro
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = MembroPeer::doSelect($critcopy, $con);
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
		return MembroPeer::populateObjects(MembroPeer::doSelectStmt($criteria, $con));
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
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			MembroPeer::addSelectColumns($criteria);
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
	 * @param      Membro $value A Membro object.
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
	 * @param      mixed $value A Membro object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Membro) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Membro object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     Membro Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
	 * Method to invalidate the instance pool of all tables related to membro
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
		$cls = MembroPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = MembroPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = MembroPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				MembroPeer::addInstanceToPool($obj, $key);
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
	 * @return     array (Membro object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = MembroPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = MembroPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + MembroPeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = MembroPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			MembroPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Cidade table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinCidade(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(MembroPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			MembroPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(MembroPeer::CIDADE_NATURALIDADE_ID, CidadePeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(MembroPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			MembroPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(MembroPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related IgrejaRelatedByFilialId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinIgrejaRelatedByFilialId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(MembroPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			MembroPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(MembroPeer::FILIAL_ID, IgrejaPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related IgrejaRelatedByInstituicaoId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinIgrejaRelatedByInstituicaoId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(MembroPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			MembroPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(MembroPeer::INSTITUICAO_ID, IgrejaPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related UsuarioRelatedByCriadorId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinUsuarioRelatedByCriadorId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(MembroPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			MembroPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(MembroPeer::CRIADOR_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related UsuarioRelatedByMembroUsuarioId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinUsuarioRelatedByMembroUsuarioId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(MembroPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			MembroPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(MembroPeer::MEMBRO_USUARIO_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related UsuarioRelatedByUsuarioAprovadorId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinUsuarioRelatedByUsuarioAprovadorId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(MembroPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			MembroPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(MembroPeer::USUARIO_APROVADOR_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Selects a collection of Membro objects pre-filled with their Cidade objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Membro objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinCidade(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		MembroPeer::addSelectColumns($criteria);
		$startcol = MembroPeer::NUM_HYDRATE_COLUMNS;
		CidadePeer::addSelectColumns($criteria);

		$criteria->addJoin(MembroPeer::CIDADE_NATURALIDADE_ID, CidadePeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = MembroPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = MembroPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = MembroPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				MembroPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = CidadePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = CidadePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = CidadePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					CidadePeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (Membro) to $obj2 (Cidade)
				$obj2->addMembro($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Membro objects pre-filled with their Endereco objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Membro objects.
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

		MembroPeer::addSelectColumns($criteria);
		$startcol = MembroPeer::NUM_HYDRATE_COLUMNS;
		EnderecoPeer::addSelectColumns($criteria);

		$criteria->addJoin(MembroPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = MembroPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = MembroPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = MembroPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				MembroPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Membro) to $obj2 (Endereco)
				$obj2->addMembro($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Membro objects pre-filled with their Igreja objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Membro objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinIgrejaRelatedByFilialId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		MembroPeer::addSelectColumns($criteria);
		$startcol = MembroPeer::NUM_HYDRATE_COLUMNS;
		IgrejaPeer::addSelectColumns($criteria);

		$criteria->addJoin(MembroPeer::FILIAL_ID, IgrejaPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = MembroPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = MembroPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = MembroPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				MembroPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Membro) to $obj2 (Igreja)
				$obj2->addMembroRelatedByFilialId($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Membro objects pre-filled with their Igreja objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Membro objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinIgrejaRelatedByInstituicaoId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		MembroPeer::addSelectColumns($criteria);
		$startcol = MembroPeer::NUM_HYDRATE_COLUMNS;
		IgrejaPeer::addSelectColumns($criteria);

		$criteria->addJoin(MembroPeer::INSTITUICAO_ID, IgrejaPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = MembroPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = MembroPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = MembroPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				MembroPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Membro) to $obj2 (Igreja)
				$obj2->addMembroRelatedByInstituicaoId($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Membro objects pre-filled with their Usuario objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Membro objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinUsuarioRelatedByCriadorId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		MembroPeer::addSelectColumns($criteria);
		$startcol = MembroPeer::NUM_HYDRATE_COLUMNS;
		UsuarioPeer::addSelectColumns($criteria);

		$criteria->addJoin(MembroPeer::CRIADOR_ID, UsuarioPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = MembroPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = MembroPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = MembroPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				MembroPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Membro) to $obj2 (Usuario)
				$obj2->addMembroRelatedByCriadorId($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Membro objects pre-filled with their Usuario objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Membro objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinUsuarioRelatedByMembroUsuarioId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		MembroPeer::addSelectColumns($criteria);
		$startcol = MembroPeer::NUM_HYDRATE_COLUMNS;
		UsuarioPeer::addSelectColumns($criteria);

		$criteria->addJoin(MembroPeer::MEMBRO_USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = MembroPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = MembroPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = MembroPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				MembroPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Membro) to $obj2 (Usuario)
				$obj2->addMembroRelatedByMembroUsuarioId($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Membro objects pre-filled with their Usuario objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Membro objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinUsuarioRelatedByUsuarioAprovadorId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		MembroPeer::addSelectColumns($criteria);
		$startcol = MembroPeer::NUM_HYDRATE_COLUMNS;
		UsuarioPeer::addSelectColumns($criteria);

		$criteria->addJoin(MembroPeer::USUARIO_APROVADOR_ID, UsuarioPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = MembroPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = MembroPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = MembroPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				MembroPeer::addInstanceToPool($obj1, $key1);
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

				// Add the $obj1 (Membro) to $obj2 (Usuario)
				$obj2->addMembroRelatedByUsuarioAprovadorId($obj1);

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
		$criteria->setPrimaryTableName(MembroPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			MembroPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(MembroPeer::CIDADE_NATURALIDADE_ID, CidadePeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::FILIAL_ID, IgrejaPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::INSTITUICAO_ID, IgrejaPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::CRIADOR_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::MEMBRO_USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::USUARIO_APROVADOR_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Selects a collection of Membro objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Membro objects.
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

		MembroPeer::addSelectColumns($criteria);
		$startcol2 = MembroPeer::NUM_HYDRATE_COLUMNS;

		CidadePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + CidadePeer::NUM_HYDRATE_COLUMNS;

		EnderecoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + EnderecoPeer::NUM_HYDRATE_COLUMNS;

		IgrejaPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + IgrejaPeer::NUM_HYDRATE_COLUMNS;

		IgrejaPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + IgrejaPeer::NUM_HYDRATE_COLUMNS;

		UsuarioPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + UsuarioPeer::NUM_HYDRATE_COLUMNS;

		UsuarioPeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + UsuarioPeer::NUM_HYDRATE_COLUMNS;

		UsuarioPeer::addSelectColumns($criteria);
		$startcol9 = $startcol8 + UsuarioPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(MembroPeer::CIDADE_NATURALIDADE_ID, CidadePeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::FILIAL_ID, IgrejaPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::INSTITUICAO_ID, IgrejaPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::CRIADOR_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::MEMBRO_USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::USUARIO_APROVADOR_ID, UsuarioPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = MembroPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = MembroPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = MembroPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				MembroPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined Cidade rows

			$key2 = CidadePeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = CidadePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = CidadePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CidadePeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (Membro) to the collection in $obj2 (Cidade)
				$obj2->addMembro($obj1);
			} // if joined row not null

			// Add objects for joined Endereco rows

			$key3 = EnderecoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = EnderecoPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = EnderecoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					EnderecoPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (Membro) to the collection in $obj3 (Endereco)
				$obj3->addMembro($obj1);
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

				// Add the $obj1 (Membro) to the collection in $obj4 (Igreja)
				$obj4->addMembroRelatedByFilialId($obj1);
			} // if joined row not null

			// Add objects for joined Igreja rows

			$key5 = IgrejaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = IgrejaPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$cls = IgrejaPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					IgrejaPeer::addInstanceToPool($obj5, $key5);
				} // if obj5 loaded

				// Add the $obj1 (Membro) to the collection in $obj5 (Igreja)
				$obj5->addMembroRelatedByInstituicaoId($obj1);
			} // if joined row not null

			// Add objects for joined Usuario rows

			$key6 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol6);
			if ($key6 !== null) {
				$obj6 = UsuarioPeer::getInstanceFromPool($key6);
				if (!$obj6) {

					$cls = UsuarioPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					UsuarioPeer::addInstanceToPool($obj6, $key6);
				} // if obj6 loaded

				// Add the $obj1 (Membro) to the collection in $obj6 (Usuario)
				$obj6->addMembroRelatedByCriadorId($obj1);
			} // if joined row not null

			// Add objects for joined Usuario rows

			$key7 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol7);
			if ($key7 !== null) {
				$obj7 = UsuarioPeer::getInstanceFromPool($key7);
				if (!$obj7) {

					$cls = UsuarioPeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					UsuarioPeer::addInstanceToPool($obj7, $key7);
				} // if obj7 loaded

				// Add the $obj1 (Membro) to the collection in $obj7 (Usuario)
				$obj7->addMembroRelatedByMembroUsuarioId($obj1);
			} // if joined row not null

			// Add objects for joined Usuario rows

			$key8 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol8);
			if ($key8 !== null) {
				$obj8 = UsuarioPeer::getInstanceFromPool($key8);
				if (!$obj8) {

					$cls = UsuarioPeer::getOMClass(false);

					$obj8 = new $cls();
					$obj8->hydrate($row, $startcol8);
					UsuarioPeer::addInstanceToPool($obj8, $key8);
				} // if obj8 loaded

				// Add the $obj1 (Membro) to the collection in $obj8 (Usuario)
				$obj8->addMembroRelatedByUsuarioAprovadorId($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Cidade table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptCidade(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(MembroPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			MembroPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(MembroPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::FILIAL_ID, IgrejaPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::INSTITUICAO_ID, IgrejaPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::CRIADOR_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::MEMBRO_USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::USUARIO_APROVADOR_ID, UsuarioPeer::ID, $join_behavior);

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
		$criteria->setPrimaryTableName(MembroPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			MembroPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(MembroPeer::CIDADE_NATURALIDADE_ID, CidadePeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::FILIAL_ID, IgrejaPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::INSTITUICAO_ID, IgrejaPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::CRIADOR_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::MEMBRO_USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::USUARIO_APROVADOR_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related IgrejaRelatedByFilialId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptIgrejaRelatedByFilialId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(MembroPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			MembroPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(MembroPeer::CIDADE_NATURALIDADE_ID, CidadePeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::CRIADOR_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::MEMBRO_USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::USUARIO_APROVADOR_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related IgrejaRelatedByInstituicaoId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptIgrejaRelatedByInstituicaoId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(MembroPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			MembroPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(MembroPeer::CIDADE_NATURALIDADE_ID, CidadePeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::CRIADOR_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::MEMBRO_USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::USUARIO_APROVADOR_ID, UsuarioPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related UsuarioRelatedByCriadorId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptUsuarioRelatedByCriadorId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(MembroPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			MembroPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(MembroPeer::CIDADE_NATURALIDADE_ID, CidadePeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::FILIAL_ID, IgrejaPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::INSTITUICAO_ID, IgrejaPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related UsuarioRelatedByMembroUsuarioId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptUsuarioRelatedByMembroUsuarioId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(MembroPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			MembroPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(MembroPeer::CIDADE_NATURALIDADE_ID, CidadePeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::FILIAL_ID, IgrejaPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::INSTITUICAO_ID, IgrejaPeer::ID, $join_behavior);

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
	 * Returns the number of rows matching criteria, joining the related UsuarioRelatedByUsuarioAprovadorId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptUsuarioRelatedByUsuarioAprovadorId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(MembroPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			MembroPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY should not affect count

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(MembroPeer::CIDADE_NATURALIDADE_ID, CidadePeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::FILIAL_ID, IgrejaPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::INSTITUICAO_ID, IgrejaPeer::ID, $join_behavior);

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
	 * Selects a collection of Membro objects pre-filled with all related objects except Cidade.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Membro objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptCidade(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		MembroPeer::addSelectColumns($criteria);
		$startcol2 = MembroPeer::NUM_HYDRATE_COLUMNS;

		EnderecoPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + EnderecoPeer::NUM_HYDRATE_COLUMNS;

		IgrejaPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + IgrejaPeer::NUM_HYDRATE_COLUMNS;

		IgrejaPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + IgrejaPeer::NUM_HYDRATE_COLUMNS;

		UsuarioPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + UsuarioPeer::NUM_HYDRATE_COLUMNS;

		UsuarioPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + UsuarioPeer::NUM_HYDRATE_COLUMNS;

		UsuarioPeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + UsuarioPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(MembroPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::FILIAL_ID, IgrejaPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::INSTITUICAO_ID, IgrejaPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::CRIADOR_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::MEMBRO_USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::USUARIO_APROVADOR_ID, UsuarioPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = MembroPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = MembroPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = MembroPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				MembroPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Endereco rows

				$key2 = EnderecoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = EnderecoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = EnderecoPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EnderecoPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Membro) to the collection in $obj2 (Endereco)
				$obj2->addMembro($obj1);

			} // if joined row is not null

				// Add objects for joined Igreja rows

				$key3 = IgrejaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = IgrejaPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = IgrejaPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					IgrejaPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Membro) to the collection in $obj3 (Igreja)
				$obj3->addMembroRelatedByFilialId($obj1);

			} // if joined row is not null

				// Add objects for joined Igreja rows

				$key4 = IgrejaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = IgrejaPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = IgrejaPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					IgrejaPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Membro) to the collection in $obj4 (Igreja)
				$obj4->addMembroRelatedByInstituicaoId($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key5 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = UsuarioPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					UsuarioPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Membro) to the collection in $obj5 (Usuario)
				$obj5->addMembroRelatedByCriadorId($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key6 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = UsuarioPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					UsuarioPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (Membro) to the collection in $obj6 (Usuario)
				$obj6->addMembroRelatedByMembroUsuarioId($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key7 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = UsuarioPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					UsuarioPeer::addInstanceToPool($obj7, $key7);
				} // if $obj7 already loaded

				// Add the $obj1 (Membro) to the collection in $obj7 (Usuario)
				$obj7->addMembroRelatedByUsuarioAprovadorId($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Membro objects pre-filled with all related objects except Endereco.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Membro objects.
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

		MembroPeer::addSelectColumns($criteria);
		$startcol2 = MembroPeer::NUM_HYDRATE_COLUMNS;

		CidadePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + CidadePeer::NUM_HYDRATE_COLUMNS;

		IgrejaPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + IgrejaPeer::NUM_HYDRATE_COLUMNS;

		IgrejaPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + IgrejaPeer::NUM_HYDRATE_COLUMNS;

		UsuarioPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + UsuarioPeer::NUM_HYDRATE_COLUMNS;

		UsuarioPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + UsuarioPeer::NUM_HYDRATE_COLUMNS;

		UsuarioPeer::addSelectColumns($criteria);
		$startcol8 = $startcol7 + UsuarioPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(MembroPeer::CIDADE_NATURALIDADE_ID, CidadePeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::FILIAL_ID, IgrejaPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::INSTITUICAO_ID, IgrejaPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::CRIADOR_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::MEMBRO_USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::USUARIO_APROVADOR_ID, UsuarioPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = MembroPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = MembroPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = MembroPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				MembroPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Cidade rows

				$key2 = CidadePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = CidadePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = CidadePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CidadePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Membro) to the collection in $obj2 (Cidade)
				$obj2->addMembro($obj1);

			} // if joined row is not null

				// Add objects for joined Igreja rows

				$key3 = IgrejaPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = IgrejaPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = IgrejaPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					IgrejaPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Membro) to the collection in $obj3 (Igreja)
				$obj3->addMembroRelatedByFilialId($obj1);

			} // if joined row is not null

				// Add objects for joined Igreja rows

				$key4 = IgrejaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = IgrejaPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = IgrejaPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					IgrejaPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Membro) to the collection in $obj4 (Igreja)
				$obj4->addMembroRelatedByInstituicaoId($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key5 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = UsuarioPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					UsuarioPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Membro) to the collection in $obj5 (Usuario)
				$obj5->addMembroRelatedByCriadorId($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key6 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = UsuarioPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					UsuarioPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (Membro) to the collection in $obj6 (Usuario)
				$obj6->addMembroRelatedByMembroUsuarioId($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key7 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol7);
				if ($key7 !== null) {
					$obj7 = UsuarioPeer::getInstanceFromPool($key7);
					if (!$obj7) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					UsuarioPeer::addInstanceToPool($obj7, $key7);
				} // if $obj7 already loaded

				// Add the $obj1 (Membro) to the collection in $obj7 (Usuario)
				$obj7->addMembroRelatedByUsuarioAprovadorId($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Membro objects pre-filled with all related objects except IgrejaRelatedByFilialId.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Membro objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptIgrejaRelatedByFilialId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		MembroPeer::addSelectColumns($criteria);
		$startcol2 = MembroPeer::NUM_HYDRATE_COLUMNS;

		CidadePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + CidadePeer::NUM_HYDRATE_COLUMNS;

		EnderecoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + EnderecoPeer::NUM_HYDRATE_COLUMNS;

		UsuarioPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + UsuarioPeer::NUM_HYDRATE_COLUMNS;

		UsuarioPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + UsuarioPeer::NUM_HYDRATE_COLUMNS;

		UsuarioPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + UsuarioPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(MembroPeer::CIDADE_NATURALIDADE_ID, CidadePeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::CRIADOR_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::MEMBRO_USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::USUARIO_APROVADOR_ID, UsuarioPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = MembroPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = MembroPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = MembroPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				MembroPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Cidade rows

				$key2 = CidadePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = CidadePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = CidadePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CidadePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Membro) to the collection in $obj2 (Cidade)
				$obj2->addMembro($obj1);

			} // if joined row is not null

				// Add objects for joined Endereco rows

				$key3 = EnderecoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = EnderecoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = EnderecoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					EnderecoPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Membro) to the collection in $obj3 (Endereco)
				$obj3->addMembro($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key4 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = UsuarioPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					UsuarioPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Membro) to the collection in $obj4 (Usuario)
				$obj4->addMembroRelatedByCriadorId($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key5 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = UsuarioPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					UsuarioPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Membro) to the collection in $obj5 (Usuario)
				$obj5->addMembroRelatedByMembroUsuarioId($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key6 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = UsuarioPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					UsuarioPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (Membro) to the collection in $obj6 (Usuario)
				$obj6->addMembroRelatedByUsuarioAprovadorId($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Membro objects pre-filled with all related objects except IgrejaRelatedByInstituicaoId.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Membro objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptIgrejaRelatedByInstituicaoId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		MembroPeer::addSelectColumns($criteria);
		$startcol2 = MembroPeer::NUM_HYDRATE_COLUMNS;

		CidadePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + CidadePeer::NUM_HYDRATE_COLUMNS;

		EnderecoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + EnderecoPeer::NUM_HYDRATE_COLUMNS;

		UsuarioPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + UsuarioPeer::NUM_HYDRATE_COLUMNS;

		UsuarioPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + UsuarioPeer::NUM_HYDRATE_COLUMNS;

		UsuarioPeer::addSelectColumns($criteria);
		$startcol7 = $startcol6 + UsuarioPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(MembroPeer::CIDADE_NATURALIDADE_ID, CidadePeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::CRIADOR_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::MEMBRO_USUARIO_ID, UsuarioPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::USUARIO_APROVADOR_ID, UsuarioPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = MembroPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = MembroPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = MembroPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				MembroPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Cidade rows

				$key2 = CidadePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = CidadePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = CidadePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CidadePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Membro) to the collection in $obj2 (Cidade)
				$obj2->addMembro($obj1);

			} // if joined row is not null

				// Add objects for joined Endereco rows

				$key3 = EnderecoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = EnderecoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = EnderecoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					EnderecoPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Membro) to the collection in $obj3 (Endereco)
				$obj3->addMembro($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key4 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = UsuarioPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					UsuarioPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Membro) to the collection in $obj4 (Usuario)
				$obj4->addMembroRelatedByCriadorId($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key5 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = UsuarioPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					UsuarioPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Membro) to the collection in $obj5 (Usuario)
				$obj5->addMembroRelatedByMembroUsuarioId($obj1);

			} // if joined row is not null

				// Add objects for joined Usuario rows

				$key6 = UsuarioPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = UsuarioPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$cls = UsuarioPeer::getOMClass(false);

					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					UsuarioPeer::addInstanceToPool($obj6, $key6);
				} // if $obj6 already loaded

				// Add the $obj1 (Membro) to the collection in $obj6 (Usuario)
				$obj6->addMembroRelatedByUsuarioAprovadorId($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Membro objects pre-filled with all related objects except UsuarioRelatedByCriadorId.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Membro objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptUsuarioRelatedByCriadorId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		MembroPeer::addSelectColumns($criteria);
		$startcol2 = MembroPeer::NUM_HYDRATE_COLUMNS;

		CidadePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + CidadePeer::NUM_HYDRATE_COLUMNS;

		EnderecoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + EnderecoPeer::NUM_HYDRATE_COLUMNS;

		IgrejaPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + IgrejaPeer::NUM_HYDRATE_COLUMNS;

		IgrejaPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + IgrejaPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(MembroPeer::CIDADE_NATURALIDADE_ID, CidadePeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::FILIAL_ID, IgrejaPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::INSTITUICAO_ID, IgrejaPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = MembroPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = MembroPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = MembroPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				MembroPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Cidade rows

				$key2 = CidadePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = CidadePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = CidadePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CidadePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Membro) to the collection in $obj2 (Cidade)
				$obj2->addMembro($obj1);

			} // if joined row is not null

				// Add objects for joined Endereco rows

				$key3 = EnderecoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = EnderecoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = EnderecoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					EnderecoPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Membro) to the collection in $obj3 (Endereco)
				$obj3->addMembro($obj1);

			} // if joined row is not null

				// Add objects for joined Igreja rows

				$key4 = IgrejaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = IgrejaPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = IgrejaPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					IgrejaPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Membro) to the collection in $obj4 (Igreja)
				$obj4->addMembroRelatedByFilialId($obj1);

			} // if joined row is not null

				// Add objects for joined Igreja rows

				$key5 = IgrejaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = IgrejaPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = IgrejaPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					IgrejaPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Membro) to the collection in $obj5 (Igreja)
				$obj5->addMembroRelatedByInstituicaoId($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Membro objects pre-filled with all related objects except UsuarioRelatedByMembroUsuarioId.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Membro objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptUsuarioRelatedByMembroUsuarioId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		MembroPeer::addSelectColumns($criteria);
		$startcol2 = MembroPeer::NUM_HYDRATE_COLUMNS;

		CidadePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + CidadePeer::NUM_HYDRATE_COLUMNS;

		EnderecoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + EnderecoPeer::NUM_HYDRATE_COLUMNS;

		IgrejaPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + IgrejaPeer::NUM_HYDRATE_COLUMNS;

		IgrejaPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + IgrejaPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(MembroPeer::CIDADE_NATURALIDADE_ID, CidadePeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::FILIAL_ID, IgrejaPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::INSTITUICAO_ID, IgrejaPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = MembroPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = MembroPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = MembroPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				MembroPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Cidade rows

				$key2 = CidadePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = CidadePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = CidadePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CidadePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Membro) to the collection in $obj2 (Cidade)
				$obj2->addMembro($obj1);

			} // if joined row is not null

				// Add objects for joined Endereco rows

				$key3 = EnderecoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = EnderecoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = EnderecoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					EnderecoPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Membro) to the collection in $obj3 (Endereco)
				$obj3->addMembro($obj1);

			} // if joined row is not null

				// Add objects for joined Igreja rows

				$key4 = IgrejaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = IgrejaPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = IgrejaPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					IgrejaPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Membro) to the collection in $obj4 (Igreja)
				$obj4->addMembroRelatedByFilialId($obj1);

			} // if joined row is not null

				// Add objects for joined Igreja rows

				$key5 = IgrejaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = IgrejaPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = IgrejaPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					IgrejaPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Membro) to the collection in $obj5 (Igreja)
				$obj5->addMembroRelatedByInstituicaoId($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of Membro objects pre-filled with all related objects except UsuarioRelatedByUsuarioAprovadorId.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of Membro objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptUsuarioRelatedByUsuarioAprovadorId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		MembroPeer::addSelectColumns($criteria);
		$startcol2 = MembroPeer::NUM_HYDRATE_COLUMNS;

		CidadePeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + CidadePeer::NUM_HYDRATE_COLUMNS;

		EnderecoPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + EnderecoPeer::NUM_HYDRATE_COLUMNS;

		IgrejaPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + IgrejaPeer::NUM_HYDRATE_COLUMNS;

		IgrejaPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + IgrejaPeer::NUM_HYDRATE_COLUMNS;

		$criteria->addJoin(MembroPeer::CIDADE_NATURALIDADE_ID, CidadePeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::ENDERECO_ID, EnderecoPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::FILIAL_ID, IgrejaPeer::ID, $join_behavior);

		$criteria->addJoin(MembroPeer::INSTITUICAO_ID, IgrejaPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = MembroPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = MembroPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = MembroPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				MembroPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Cidade rows

				$key2 = CidadePeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = CidadePeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = CidadePeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CidadePeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (Membro) to the collection in $obj2 (Cidade)
				$obj2->addMembro($obj1);

			} // if joined row is not null

				// Add objects for joined Endereco rows

				$key3 = EnderecoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = EnderecoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = EnderecoPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					EnderecoPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (Membro) to the collection in $obj3 (Endereco)
				$obj3->addMembro($obj1);

			} // if joined row is not null

				// Add objects for joined Igreja rows

				$key4 = IgrejaPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = IgrejaPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = IgrejaPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					IgrejaPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (Membro) to the collection in $obj4 (Igreja)
				$obj4->addMembroRelatedByFilialId($obj1);

			} // if joined row is not null

				// Add objects for joined Igreja rows

				$key5 = IgrejaPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = IgrejaPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$cls = IgrejaPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					IgrejaPeer::addInstanceToPool($obj5, $key5);
				} // if $obj5 already loaded

				// Add the $obj1 (Membro) to the collection in $obj5 (Igreja)
				$obj5->addMembroRelatedByInstituicaoId($obj1);

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
	  $dbMap = Propel::getDatabaseMap(BaseMembroPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseMembroPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new MembroTableMap());
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
		return $withPrefix ? MembroPeer::CLASS_DEFAULT : MembroPeer::OM_CLASS;
	}

	/**
	 * Performs an INSERT on the database, given a Membro or Criteria object.
	 *
	 * @param      mixed $values Criteria or Membro object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Membro object
		}

		if ($criteria->containsKey(MembroPeer::ID) && $criteria->keyContainsValue(MembroPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.MembroPeer::ID.')');
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
	 * Performs an UPDATE on the database, given a Membro or Criteria object.
	 *
	 * @param      mixed $values Criteria or Membro object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(MembroPeer::ID);
			$value = $criteria->remove(MembroPeer::ID);
			if ($value) {
				$selectCriteria->add(MembroPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(MembroPeer::TABLE_NAME);
			}

		} else { // $values is Membro object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Deletes all rows from the membro table.
	 *
	 * @param      PropelPDO $con the connection to use
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(MembroPeer::TABLE_NAME, $con, MembroPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			MembroPeer::clearInstancePool();
			MembroPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs a DELETE on the database, given a Membro or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Membro object or primary key or array of primary keys
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
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			MembroPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof Membro) { // it's a model object
			// invalidate the cache for this single object
			MembroPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MembroPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				MembroPeer::removeInstanceFromPool($singleval);
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
			MembroPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given Membro object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Membro $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MembroPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MembroPeer::TABLE_NAME);

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

		return BasePeer::doValidate(MembroPeer::DATABASE_NAME, MembroPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     Membro
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = MembroPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(MembroPeer::DATABASE_NAME);
		$criteria->add(MembroPeer::ID, $pk);

		$v = MembroPeer::doSelect($criteria, $con);

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
			$con = Propel::getConnection(MembroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(MembroPeer::DATABASE_NAME);
			$criteria->add(MembroPeer::ID, $pks, Criteria::IN);
			$objs = MembroPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseMembroPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseMembroPeer::buildTableMap();

