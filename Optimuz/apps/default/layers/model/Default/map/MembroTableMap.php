<?php



/**
 * This class defines the structure of the 'membro' table.
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
class MembroTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.MembroTableMap';

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
		$this->setName('membro');
		$this->setPhpName('Membro');
		$this->setClassname('Membro');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('INSTITUICAO_ID', 'InstituicaoId', 'INTEGER', 'igreja', 'ID', true, 10, null);
		$this->addForeignKey('FILIAL_ID', 'FilialId', 'INTEGER', 'igreja', 'ID', false, 10, null);
		$this->addForeignKey('CRIADOR_ID', 'CriadorId', 'INTEGER', 'usuario', 'ID', false, 10, null);
		$this->addForeignKey('MEMBRO_USUARIO_ID', 'MembroUsuarioId', 'INTEGER', 'usuario', 'ID', false, 10, null);
		$this->addForeignKey('USUARIO_APROVADOR_ID', 'UsuarioAprovadorId', 'INTEGER', 'usuario', 'ID', false, 10, null);
		$this->addForeignKey('ENDERECO_ID', 'EnderecoId', 'INTEGER', 'endereco', 'ID', false, 10, null);
		$this->addForeignKey('CIDADE_NATURALIDADE_ID', 'CidadeNaturalidadeId', 'INTEGER', 'cidade', 'ID', false, 10, null);
		$this->addColumn('NOME_COMPLETO', 'NomeCompleto', 'VARCHAR', false, 255, null);
		$this->addColumn('SEXO', 'Sexo', 'CHAR', false, null, null);
		$this->addColumn('RG', 'Rg', 'VARCHAR', false, 45, null);
		$this->addColumn('RG_EXPEDIDOR', 'RgExpedidor', 'VARCHAR', false, 45, null);
		$this->addColumn('CPF', 'Cpf', 'VARCHAR', false, 11, null);
		$this->addColumn('ESTADO_CIVIL', 'EstadoCivil', 'CHAR', false, null, null);
		$this->addColumn('NOME_CONJUNGE', 'NomeConjunge', 'VARCHAR', false, 255, null);
		$this->addColumn('CRISTAO', 'Cristao', 'BOOLEAN', false, 1, null);
		$this->addColumn('NOME_PAI', 'NomePai', 'VARCHAR', false, 255, null);
		$this->addColumn('NOME_MAE', 'NomeMae', 'VARCHAR', false, 255, null);
		$this->addColumn('TELEFONE_RESIDENCIAL', 'TelefoneResidencial', 'VARCHAR', false, 11, null);
		$this->addColumn('TELEFONE_CELULAR', 'TelefoneCelular', 'VARCHAR', false, 11, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 255, null);
		$this->addColumn('BATIZADO', 'Batizado', 'BOOLEAN', false, 1, false);
		$this->addColumn('DATA_MEMBRO', 'DataMembro', 'DATE', false, null, null);
		$this->addColumn('IGREJA_ORIGEM', 'IgrejaOrigem', 'VARCHAR', false, 255, null);
		$this->addColumn('PASTOR_IGREJA_ORIGEM', 'PastorIgrejaOrigem', 'VARCHAR', false, 255, null);
		$this->addColumn('TELEFONE_IGREJA_ORIGEM', 'TelefoneIgrejaOrigem', 'VARCHAR', false, 11, null);
		$this->addColumn('POSSUI_MINISTERIO', 'PossuiMinisterio', 'BOOLEAN', false, 1, false);
		$this->addColumn('NOME_ANTIGO_MINISTERIO', 'NomeAntigoMinisterio', 'VARCHAR', false, 255, null);
		$this->addColumn('PARTICIPA_PG', 'ParticipaPg', 'BOOLEAN', false, 1, false);
		$this->addColumn('NOME_PG', 'NomePg', 'VARCHAR', false, 255, null);
		$this->addColumn('CARGO_IGREJA', 'CargoIgreja', 'VARCHAR', false, 45, null);
		$this->addColumn('EXPERIENCIA_OUTRAS_IGREJAS', 'ExperienciaOutrasIgrejas', 'LONGVARCHAR', false, null, null);
		$this->addColumn('INTERESSE_MINISTERIOS', 'InteresseMinisterios', 'LONGVARCHAR', false, null, null);
		$this->addColumn('DATA_CADASTRO', 'DataCadastro', 'DATE', false, null, null);
		$this->addColumn('DATA_NASCIMENTO', 'DataNascimento', 'DATE', false, null, null);
		$this->addColumn('PROFISSAO', 'Profissao', 'VARCHAR', false, 255, null);
		$this->addColumn('ATIVO', 'Ativo', 'BOOLEAN', false, 1, true);
		$this->addColumn('CADASTRO_APROVADO', 'CadastroAprovado', 'BOOLEAN', false, 1, false);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Cidade', 'Cidade', RelationMap::MANY_TO_ONE, array('cidade_naturalidade_id' => 'id', ), null, null);
		$this->addRelation('Endereco', 'Endereco', RelationMap::MANY_TO_ONE, array('endereco_id' => 'id', ), null, null);
		$this->addRelation('IgrejaRelatedByFilialId', 'Igreja', RelationMap::MANY_TO_ONE, array('filial_id' => 'id', ), null, null);
		$this->addRelation('IgrejaRelatedByInstituicaoId', 'Igreja', RelationMap::MANY_TO_ONE, array('instituicao_id' => 'id', ), null, null);
		$this->addRelation('UsuarioRelatedByCriadorId', 'Usuario', RelationMap::MANY_TO_ONE, array('criador_id' => 'id', ), null, null);
		$this->addRelation('UsuarioRelatedByMembroUsuarioId', 'Usuario', RelationMap::MANY_TO_ONE, array('membro_usuario_id' => 'id', ), null, null);
		$this->addRelation('UsuarioRelatedByUsuarioAprovadorId', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_aprovador_id' => 'id', ), null, null);
		$this->addRelation('FilhoMembro', 'FilhoMembro', RelationMap::ONE_TO_MANY, array('id' => 'membro_id', ), null, null, 'FilhoMembros');
		$this->addRelation('UsuarioRelatedByMembroId', 'Usuario', RelationMap::ONE_TO_MANY, array('id' => 'membro_id', ), null, null, 'UsuariosRelatedByMembroId');
	} // buildRelations()

} // MembroTableMap
