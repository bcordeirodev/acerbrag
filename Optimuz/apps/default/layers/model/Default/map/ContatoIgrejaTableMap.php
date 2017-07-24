<?php



/**
 * This class defines the structure of the 'contato_igreja' table.
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
class ContatoIgrejaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.ContatoIgrejaTableMap';

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
		$this->setName('contato_igreja');
		$this->setPhpName('ContatoIgreja');
		$this->setClassname('ContatoIgreja');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('IGREJA_ID', 'IgrejaId', 'INTEGER', 'igreja', 'ID', true, 10, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', false, 255, null);
		$this->addColumn('VALOR', 'Valor', 'VARCHAR', true, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Igreja', 'Igreja', RelationMap::MANY_TO_ONE, array('igreja_id' => 'id', ), null, null);
	} // buildRelations()

} // ContatoIgrejaTableMap
