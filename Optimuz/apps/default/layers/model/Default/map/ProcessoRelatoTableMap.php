<?php



/**
 * This class defines the structure of the 'processo_relato' table.
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
class ProcessoRelatoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.ProcessoRelatoTableMap';

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
		$this->setName('processo_relato');
		$this->setPhpName('ProcessoRelato');
		$this->setClassname('ProcessoRelato');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('PROCESSO_ID', 'ProcessoId', 'INTEGER', 'processo', 'ID', true, 10, null);
		$this->addForeignKey('RELATO_ID', 'RelatoId', 'INTEGER', 'relato', 'ID', true, 10, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Processo', 'Processo', RelationMap::MANY_TO_ONE, array('processo_id' => 'id', ), null, null);
		$this->addRelation('Relato', 'Relato', RelationMap::MANY_TO_ONE, array('relato_id' => 'id', ), null, null);
	} // buildRelations()

} // ProcessoRelatoTableMap
