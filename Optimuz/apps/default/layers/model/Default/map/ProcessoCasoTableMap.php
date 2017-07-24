<?php



/**
 * This class defines the structure of the 'processo_caso' table.
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
class ProcessoCasoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.ProcessoCasoTableMap';

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
		$this->setName('processo_caso');
		$this->setPhpName('ProcessoCaso');
		$this->setClassname('ProcessoCaso');
		$this->setPackage('Default');
		$this->setUseIdGenerator(false);
		$this->setIsCrossRef(true);
		// columns
		$this->addForeignPrimaryKey('PROCESSO_ID', 'ProcessoId', 'INTEGER' , 'processo', 'ID', true, 10, null);
		$this->addForeignPrimaryKey('CASO_ID', 'CasoId', 'INTEGER' , 'caso', 'ID', true, 10, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Caso', 'Caso', RelationMap::MANY_TO_ONE, array('caso_id' => 'id', ), null, null);
		$this->addRelation('Processo', 'Processo', RelationMap::MANY_TO_ONE, array('processo_id' => 'id', ), null, null);
	} // buildRelations()

} // ProcessoCasoTableMap
