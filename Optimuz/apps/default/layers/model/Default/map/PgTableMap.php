<?php



/**
 * This class defines the structure of the 'pg' table.
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
class PgTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.PgTableMap';

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
		$this->setName('pg');
		$this->setPhpName('Pg');
		$this->setClassname('Pg');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', true, 10, null);
		$this->addForeignKey('IGREJA_RESPONSAVEL_ID', 'IgrejaResponsavelId', 'INTEGER', 'igreja', 'ID', true, 10, null);
		$this->addForeignKey('ENDERECO_ID', 'EnderecoId', 'INTEGER', 'endereco', 'ID', true, 10, null);
		$this->addColumn('INSTITUICAO_ID', 'InstituicaoId', 'INTEGER', true, 10, null);
		$this->addColumn('TITULO', 'Titulo', 'VARCHAR', false, 255, null);
		$this->addColumn('HORA', 'Hora', 'VARCHAR', false, 5, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'LONGVARCHAR', false, null, null);
		$this->addColumn('DATA_CADASTRO', 'DataCadastro', 'TIMESTAMP', false, null, null);
		$this->addColumn('ATIVA', 'Ativa', 'BOOLEAN', true, 1, true);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Endereco', 'Endereco', RelationMap::MANY_TO_ONE, array('endereco_id' => 'id', ), null, null);
		$this->addRelation('Igreja', 'Igreja', RelationMap::MANY_TO_ONE, array('igreja_responsavel_id' => 'id', ), null, null);
		$this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), null, null);
		$this->addRelation('PgUsuario', 'PgUsuario', RelationMap::ONE_TO_MANY, array('id' => 'pg_id', ), null, null, 'PgUsuarios');
	} // buildRelations()

} // PgTableMap
