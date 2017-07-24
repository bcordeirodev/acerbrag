<?php



/**
 * This class defines the structure of the 't_permissao' table.
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
class TPermissaoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.TPermissaoTableMap';

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
		$this->setName('t_permissao');
		$this->setPhpName('TPermissao');
		$this->setClassname('TPermissao');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', true, 60, null);
		$this->addColumn('SLUG', 'Slug', 'VARCHAR', true, 60, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', false, 200, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('AUsuarioPermissao', 'AUsuarioPermissao', RelationMap::ONE_TO_MANY, array('id' => 'permissao_id', ), null, null, 'AUsuarioPermissaos');
		$this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_MANY, array(), null, null, 'Usuarios');
	} // buildRelations()

} // TPermissaoTableMap
