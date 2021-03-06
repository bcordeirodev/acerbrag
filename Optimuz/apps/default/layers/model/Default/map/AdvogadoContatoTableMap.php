<?php



/**
 * This class defines the structure of the 'advogado_contato' table.
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
class AdvogadoContatoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.AdvogadoContatoTableMap';

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
		$this->setName('advogado_contato');
		$this->setPhpName('AdvogadoContato');
		$this->setClassname('AdvogadoContato');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('ID_ADVOGADO', 'IdAdvogado', 'INTEGER', 'advogado', 'ID', true, 10, null);
		$this->addForeignKey('ID_CONTATO', 'IdContato', 'INTEGER', 'contato', 'ID', true, 10, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Advogado', 'Advogado', RelationMap::MANY_TO_ONE, array('id_advogado' => 'id', ), null, null);
		$this->addRelation('Contato', 'Contato', RelationMap::MANY_TO_ONE, array('id_contato' => 'id', ), null, null);
	} // buildRelations()

} // AdvogadoContatoTableMap
