<?php



/**
 * This class defines the structure of the 'endereco' table.
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
class EnderecoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.EnderecoTableMap';

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
		$this->setName('endereco');
		$this->setPhpName('Endereco');
		$this->setClassname('Endereco');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addColumn('CIDADE_ID', 'CidadeId', 'INTEGER', false, 10, null);
		$this->addColumn('LOGRADOURO', 'Logradouro', 'VARCHAR', false, 200, null);
		$this->addColumn('BAIRRO', 'Bairro', 'VARCHAR', false, 45, null);
		$this->addColumn('CEP', 'Cep', 'VARCHAR', false, 8, null);
		$this->addColumn('NUMERO', 'Numero', 'VARCHAR', false, 5, null);
		$this->addColumn('COMPLEMENTO', 'Complemento', 'VARCHAR', false, 175, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Usuario', 'Usuario', RelationMap::ONE_TO_MANY, array('id' => 'endereco_id', ), null, null, 'Usuarios');
	} // buildRelations()

} // EnderecoTableMap
