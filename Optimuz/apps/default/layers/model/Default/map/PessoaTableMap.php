<?php



/**
 * This class defines the structure of the 'pessoa' table.
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
class PessoaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.PessoaTableMap';

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
		$this->setName('pessoa');
		$this->setPhpName('Pessoa');
		$this->setClassname('Pessoa');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('ENDERECO_ID', 'EnderecoId', 'INTEGER', 'endereco', 'ID', true, 10, null);
		$this->addColumn('ATIVO', 'Ativo', 'BOOLEAN', true, 1, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', true, 175, null);
		$this->addColumn('CPF', 'Cpf', 'VARCHAR', true, 11, null);
		$this->addColumn('CELULAR', 'Celular', 'VARCHAR', false, 11, null);
		$this->addColumn('TELEFONE', 'Telefone', 'VARCHAR', false, 11, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 175, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Endereco', 'Endereco', RelationMap::MANY_TO_ONE, array('endereco_id' => 'id', ), null, null);
		$this->addRelation('ComunicadoRelatedBySeguradoId', 'Comunicado', RelationMap::ONE_TO_MANY, array('id' => 'segurado_id', ), null, null, 'ComunicadosRelatedBySeguradoId');
		$this->addRelation('ComunicadoRelatedByComunicanteId', 'Comunicado', RelationMap::ONE_TO_MANY, array('id' => 'comunicante_id', ), null, null, 'ComunicadosRelatedByComunicanteId');
	} // buildRelations()

} // PessoaTableMap
