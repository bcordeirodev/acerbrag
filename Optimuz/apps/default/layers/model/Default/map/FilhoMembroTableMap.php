<?php



/**
 * This class defines the structure of the 'filho_membro' table.
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
class FilhoMembroTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.FilhoMembroTableMap';

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
		$this->setName('filho_membro');
		$this->setPhpName('FilhoMembro');
		$this->setClassname('FilhoMembro');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('MEMBRO_ID', 'MembroId', 'INTEGER', 'membro', 'ID', true, 10, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', false, 255, null);
		$this->addColumn('DATA_NASCIMENTO', 'DataNascimento', 'DATE', false, null, null);
		$this->addColumn('CRISTAO', 'Cristao', 'BOOLEAN', false, 1, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Membro', 'Membro', RelationMap::MANY_TO_ONE, array('membro_id' => 'id', ), null, null);
	} // buildRelations()

} // FilhoMembroTableMap
