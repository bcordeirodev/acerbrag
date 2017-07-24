<?php



/**
 * This class defines the structure of the 'caso_relato' table.
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
class CasoRelatoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.CasoRelatoTableMap';

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
		$this->setName('caso_relato');
		$this->setPhpName('CasoRelato');
		$this->setClassname('CasoRelato');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('ID_CASO', 'IdCaso', 'INTEGER', 'caso', 'ID', true, 10, null);
		$this->addForeignKey('ID_RELATO', 'IdRelato', 'INTEGER', 'relato', 'ID', true, 10, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Caso', 'Caso', RelationMap::MANY_TO_ONE, array('id_caso' => 'id', ), null, null);
		$this->addRelation('Relato', 'Relato', RelationMap::MANY_TO_ONE, array('id_relato' => 'id', ), null, null);
	} // buildRelations()

} // CasoRelatoTableMap
