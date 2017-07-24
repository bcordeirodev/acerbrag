<?php



/**
 * This class defines the structure of the 'endereco_correio' table.
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
class EnderecoCorreioTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.EnderecoCorreioTableMap';

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
		$this->setName('endereco_correio');
		$this->setPhpName('EnderecoCorreio');
		$this->setClassname('EnderecoCorreio');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('UF_ID', 'UfId', 'INTEGER', 'uf', 'ID', true, 10, null);
		$this->addColumn('LOGRADOURO', 'Logradouro', 'VARCHAR', false, 200, null);
		$this->addColumn('BAIRRO', 'Bairro', 'VARCHAR', false, 100, null);
		$this->addColumn('CIDADE', 'Cidade', 'VARCHAR', false, 100, null);
		$this->addColumn('CEP', 'Cep', 'VARCHAR', false, 8, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Uf', 'Uf', RelationMap::MANY_TO_ONE, array('uf_id' => 'id', ), null, null);
	} // buildRelations()

} // EnderecoCorreioTableMap
