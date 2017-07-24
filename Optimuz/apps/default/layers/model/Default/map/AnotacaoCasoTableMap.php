<?php



/**
 * This class defines the structure of the 'anotacao_caso' table.
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
class AnotacaoCasoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.AnotacaoCasoTableMap';

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
		$this->setName('anotacao_caso');
		$this->setPhpName('AnotacaoCaso');
		$this->setClassname('AnotacaoCaso');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('CASO_ID', 'CasoId', 'INTEGER', 'caso', 'ID', true, 10, null);
		$this->addColumn('TITULO', 'Titulo', 'VARCHAR', true, 250, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'LONGVARCHAR', true, null, null);
		$this->addColumn('DATA_CRIACAO', 'DataCriacao', 'TIMESTAMP', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Caso', 'Caso', RelationMap::MANY_TO_ONE, array('caso_id' => 'id', ), null, null);
	} // buildRelations()

} // AnotacaoCasoTableMap
