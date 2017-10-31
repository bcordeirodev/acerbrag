<?php



/**
 * This class defines the structure of the 'usuario' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.Default.map
 */
class UsuarioTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.UsuarioTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
		// attributes
		$this->setName('usuario');
		$this->setPhpName('Usuario');
		$this->setClassname('Usuario');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('PERFIL_ID', 'PerfilId', 'INTEGER', 'perfil', 'ID', true, 10, null);
		$this->addForeignKey('ENDERECO_ID', 'EnderecoId', 'INTEGER', 'endereco', 'ID', false, 10, null);
		$this->addForeignKey('CARGO_ID', 'CargoId', 'INTEGER', 'cargo', 'ID', false, 10, null);
		$this->addForeignKey('DEPARTAMENTO_ID', 'DepartamentoId', 'INTEGER', 'departamento', 'ID', false, 10, null);
		$this->addColumn('MATRICULA', 'Matricula', 'VARCHAR', false, 55, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', true, 200, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 200, null);
		$this->addColumn('DNI', 'Dni', 'VARCHAR', false, 11, null);
		$this->addColumn('DATA_NASCIMENTO', 'DataNascimento', 'DATE', false, null, null);
		$this->addColumn('DATA_CONTRATACAO', 'DataContratacao', 'DATE', false, null, null);
		$this->addColumn('CELULAR', 'Celular', 'VARCHAR', false, 11, null);
		$this->addColumn('TELEFONE', 'Telefone', 'VARCHAR', false, 11, null);
		$this->addColumn('TOKEN', 'Token', 'CHAR', false, 64, null);
		$this->addColumn('NOME_USUARIO', 'NomeUsuario', 'VARCHAR', false, 255, null);
		$this->addColumn('SENHA', 'Senha', 'CHAR', false, 128, null);
		$this->addColumn('TOKEN_SENHA', 'TokenSenha', 'CHAR', false, 64, null);
		$this->addColumn('TOKEN_FIREBASE', 'TokenFirebase', 'VARCHAR', false, 255, null);
		$this->addColumn('DATA_RESCISAO', 'DataRescisao', 'DATE', false, null, null);
		$this->addColumn('ATIVO', 'Ativo', 'BOOLEAN', true, 1, true);
		$this->addColumn('TIPO_ACESSO', 'TipoAcesso', 'CHAR', false, null, 'M');
		$this->addColumn('ESTADO_CIVIL', 'EstadoCivil', 'CHAR', false, null, 'O');
		$this->addColumn('NIVEL_ACESSO', 'NivelAcesso', 'CHAR', false, null, '1');
		$this->addColumn('USUARIO_VALIDADO', 'UsuarioValidado', 'BOOLEAN', false, 1, false);
		$this->addColumn('SEXO', 'Sexo', 'CHAR', false, null, null);
		$this->addColumn('DATA_CADASTRO', 'DataCadastro', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Cargo', 'Cargo', RelationMap::MANY_TO_ONE, array('cargo_id' => 'id', ), null, null);
		$this->addRelation('Departamento', 'Departamento', RelationMap::MANY_TO_ONE, array('departamento_id' => 'id', ), null, null);
		$this->addRelation('Endereco', 'Endereco', RelationMap::MANY_TO_ONE, array('endereco_id' => 'id', ), null, null);
		$this->addRelation('Perfil', 'Perfil', RelationMap::MANY_TO_ONE, array('perfil_id' => 'id', ), null, null);
		$this->addRelation('Auditoria', 'Auditoria', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'Auditorias');
		$this->addRelation('AvaliacaoRespostaForum', 'AvaliacaoRespostaForum', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'AvaliacaoRespostaForums');
		$this->addRelation('ColetaPesquisa', 'ColetaPesquisa', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'ColetaPesquisas');
		$this->addRelation('ComentarioNoticia', 'ComentarioNoticia', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'ComentarioNoticias');
		$this->addRelation('CurtidaForum', 'CurtidaForum', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'CurtidaForums');
		$this->addRelation('Noticia', 'Noticia', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'Noticias');
		$this->addRelation('Pesquisa', 'Pesquisa', RelationMap::ONE_TO_MANY, array('id' => 'criador_id', ), null, null, 'Pesquisas');
		$this->addRelation('PesquisaHabilitada', 'PesquisaHabilitada', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'PesquisaHabilitadas');
		$this->addRelation('Premio', 'Premio', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'Premios');
		$this->addRelation('RespostaForum', 'RespostaForum', RelationMap::ONE_TO_MANY, array('id' => 'usuario_id', ), null, null, 'RespostaForums');
		$this->addRelation('SolicitacaoResgateRelatedByAprovadorId', 'SolicitacaoResgate', RelationMap::ONE_TO_MANY, array('id' => 'aprovador_id', ), null, null, 'SolicitacaoResgatesRelatedByAprovadorId');
		$this->addRelation('SolicitacaoResgateRelatedBySolicitanteId', 'SolicitacaoResgate', RelationMap::ONE_TO_MANY, array('id' => 'solicitante_id', ), null, null, 'SolicitacaoResgatesRelatedBySolicitanteId');
	} // buildRelations()

} // UsuarioTableMap
