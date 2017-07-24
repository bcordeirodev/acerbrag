<?php



/**
 * This class defines the structure of the 'relato' table.
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
class RelatoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.RelatoTableMap';

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
		$this->setName('relato');
		$this->setPhpName('Relato');
		$this->setClassname('Relato');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'LONGVARCHAR', false, null, null);
		$this->addColumn('DATA_CRIACAO', 'DataCriacao', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('CasoRelato', 'CasoRelato', RelationMap::ONE_TO_MANY, array('id' => 'id_relato', ), null, null, 'CasoRelatos');
		$this->addRelation('ProcessoRelato', 'ProcessoRelato', RelationMap::ONE_TO_MANY, array('id' => 'relato_id', ), null, null, 'ProcessoRelatos');
	} // buildRelations()

} // RelatoTableMap
