<?php



/**
 * This class defines the structure of the 'igreja' table.
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
class IgrejaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.IgrejaTableMap';

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
		$this->setName('igreja');
		$this->setPhpName('Igreja');
		$this->setClassname('Igreja');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('CRIADOR_ID', 'CriadorId', 'INTEGER', 'usuario', 'ID', true, 10, null);
		$this->addForeignKey('RESPONSAVEL_ID', 'ResponsavelId', 'INTEGER', 'usuario', 'ID', false, 10, null);
		$this->addForeignKey('ENDERECO_ID', 'EnderecoId', 'INTEGER', 'endereco', 'ID', true, 10, null);
		$this->addForeignKey('IGREJA_ID', 'IgrejaId', 'INTEGER', 'igreja', 'ID', false, 10, null);
		$this->addColumn('TIPO', 'Tipo', 'CHAR', false, null, null);
		$this->addColumn('NOME_FANTASIA', 'NomeFantasia', 'VARCHAR', false, 255, null);
		$this->addColumn('RAZAO_SOCIAL', 'RazaoSocial', 'VARCHAR', false, 255, null);
		$this->addColumn('CNPJ', 'Cnpj', 'VARCHAR', false, 14, null);
		$this->addColumn('ATIVA', 'Ativa', 'BOOLEAN', false, 1, true);
		$this->addColumn('SITE', 'Site', 'VARCHAR', false, 255, null);
		$this->addColumn('SOBRE_NOS', 'SobreNos', 'LONGVARCHAR', false, null, null);
		$this->addColumn('VISAO', 'Visao', 'LONGVARCHAR', false, null, null);
		$this->addColumn('MISSAO', 'Missao', 'LONGVARCHAR', false, null, null);
		$this->addColumn('VALORES', 'Valores', 'LONGVARCHAR', false, null, null);
		$this->addColumn('DATA_CADASTRO', 'DataCadastro', 'DATE', false, null, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 255, null);
		$this->addColumn('TELEFONE', 'Telefone', 'VARCHAR', false, 11, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Endereco', 'Endereco', RelationMap::MANY_TO_ONE, array('endereco_id' => 'id', ), null, null);
		$this->addRelation('IgrejaRelatedByIgrejaId', 'Igreja', RelationMap::MANY_TO_ONE, array('igreja_id' => 'id', ), null, null);
		$this->addRelation('UsuarioRelatedByResponsavelId', 'Usuario', RelationMap::MANY_TO_ONE, array('responsavel_id' => 'id', ), null, null);
		$this->addRelation('UsuarioRelatedByCriadorId', 'Usuario', RelationMap::MANY_TO_ONE, array('criador_id' => 'id', ), null, null);
		$this->addRelation('AgendaIgreja', 'AgendaIgreja', RelationMap::ONE_TO_MANY, array('id' => 'igreja_id', ), null, null, 'AgendaIgrejas');
		$this->addRelation('IgrejaRelatedById', 'Igreja', RelationMap::ONE_TO_MANY, array('id' => 'igreja_id', ), null, null, 'IgrejasRelatedById');
		$this->addRelation('MembroRelatedByFilialId', 'Membro', RelationMap::ONE_TO_MANY, array('id' => 'filial_id', ), null, null, 'MembrosRelatedByFilialId');
		$this->addRelation('MembroRelatedByInstituicaoId', 'Membro', RelationMap::ONE_TO_MANY, array('id' => 'instituicao_id', ), null, null, 'MembrosRelatedByInstituicaoId');
		$this->addRelation('MinisterioRelatedByIgrejaPertencenteId', 'Ministerio', RelationMap::ONE_TO_MANY, array('id' => 'igreja_pertencente_id', ), null, null, 'MinisteriosRelatedByIgrejaPertencenteId');
		$this->addRelation('MinisterioRelatedByInstituicaoId', 'Ministerio', RelationMap::ONE_TO_MANY, array('id' => 'instituicao_id', ), null, null, 'MinisteriosRelatedByInstituicaoId');
		$this->addRelation('NoticiaIgreja', 'NoticiaIgreja', RelationMap::ONE_TO_MANY, array('id' => 'igreja_id', ), null, null, 'NoticiaIgrejas');
		$this->addRelation('PedidoOracao', 'PedidoOracao', RelationMap::ONE_TO_MANY, array('id' => 'instituicao_id', ), null, null, 'PedidoOracaos');
		$this->addRelation('Pg', 'Pg', RelationMap::ONE_TO_MANY, array('id' => 'igreja_responsavel_id', ), null, null, 'Pgs');
		$this->addRelation('PodcastIgreja', 'PodcastIgreja', RelationMap::ONE_TO_MANY, array('id' => 'igreja_id', ), null, null, 'PodcastIgrejas');
		$this->addRelation('UsuarioRelatedByFilialId', 'Usuario', RelationMap::ONE_TO_MANY, array('id' => 'filial_id', ), null, null, 'UsuariosRelatedByFilialId');
		$this->addRelation('UsuarioRelatedByInstituicaoId', 'Usuario', RelationMap::ONE_TO_MANY, array('id' => 'instituicao_id', ), null, null, 'UsuariosRelatedByInstituicaoId');
		$this->addRelation('UsuarioFilial', 'UsuarioFilial', RelationMap::ONE_TO_MANY, array('id' => 'filial_id', ), null, null, 'UsuarioFilials');
		$this->addRelation('VideoIgreja', 'VideoIgreja', RelationMap::ONE_TO_MANY, array('id' => 'igreja_id', ), null, null, 'VideoIgrejas');
		$this->addRelation('Agenda', 'Agenda', RelationMap::MANY_TO_MANY, array(), null, null, 'Agendas');
		$this->addRelation('Noticia', 'Noticia', RelationMap::MANY_TO_MANY, array(), null, null, 'Noticias');
		$this->addRelation('Podcast', 'Podcast', RelationMap::MANY_TO_MANY, array(), null, null, 'Podcasts');
		$this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_MANY, array(), null, null, 'Usuarios');
		$this->addRelation('Video', 'Video', RelationMap::MANY_TO_MANY, array(), null, null, 'Videos');
	} // buildRelations()

} // IgrejaTableMap
