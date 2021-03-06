<?php



/**
 * This class defines the structure of the 'uf' table.
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
class UfTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.UfTableMap';

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
		$this->setName('uf');
		$this->setPhpName('Uf');
		$this->setClassname('Uf');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addColumn('SIGLA', 'Sigla', 'CHAR', true, 2, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', true, 25, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Cidade', 'Cidade', RelationMap::ONE_TO_MANY, array('id' => 'uf_id', ), null, null, 'Cidades');
		$this->addRelation('EnderecoCorreio', 'EnderecoCorreio', RelationMap::ONE_TO_MANY, array('id' => 'uf_id', ), null, null, 'EnderecoCorreios');
	} // buildRelations()

} // UfTableMap
