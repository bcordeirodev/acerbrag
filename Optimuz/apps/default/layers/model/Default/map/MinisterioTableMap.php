<?php



/**
 * This class defines the structure of the 'ministerio' table.
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
class MinisterioTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.MinisterioTableMap';

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
		$this->setName('ministerio');
		$this->setPhpName('Ministerio');
		$this->setClassname('Ministerio');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', true, 10, null);
		$this->addForeignKey('INSTITUICAO_ID', 'InstituicaoId', 'INTEGER', 'igreja', 'ID', true, 10, null);
		$this->addForeignKey('IGREJA_PERTENCENTE_ID', 'IgrejaPertencenteId', 'INTEGER', 'igreja', 'ID', true, 10, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', false, 255, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'LONGVARCHAR', false, null, null);
		$this->addColumn('DATA_CADASTRO', 'DataCadastro', 'DATE', false, null, null);
		$this->addColumn('ATIVO', 'Ativo', 'BOOLEAN', false, 1, true);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('IgrejaRelatedByIgrejaPertencenteId', 'Igreja', RelationMap::MANY_TO_ONE, array('igreja_pertencente_id' => 'id', ), null, null);
		$this->addRelation('IgrejaRelatedByInstituicaoId', 'Igreja', RelationMap::MANY_TO_ONE, array('instituicao_id' => 'id', ), null, null);
		$this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), null, null);
		$this->addRelation('LiderMinisterio', 'LiderMinisterio', RelationMap::ONE_TO_MANY, array('id' => 'ministerio_id', ), null, null, 'LiderMinisterios');
	} // buildRelations()

} // MinisterioTableMap
