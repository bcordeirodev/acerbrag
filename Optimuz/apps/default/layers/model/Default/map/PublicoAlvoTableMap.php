<?php



/**
 * This class defines the structure of the 'publico_alvo' table.
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
class PublicoAlvoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.PublicoAlvoTableMap';

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
		$this->setName('publico_alvo');
		$this->setPhpName('PublicoAlvo');
		$this->setClassname('PublicoAlvo');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('PESQUISA_ID', 'PesquisaId', 'INTEGER', 'pesquisa', 'ID', true, 10, null);
		$this->addColumn('IDADE_INICIAL', 'IdadeInicial', 'INTEGER', false, null, null);
		$this->addColumn('IDADE_FINAL', 'IdadeFinal', 'INTEGER', false, null, null);
		$this->addColumn('QUANTIDADE_MASCULINO', 'QuantidadeMasculino', 'INTEGER', false, null, null);
		$this->addColumn('QUANTIDADE_FEMININO', 'QuantidadeFeminino', 'INTEGER', false, null, null);
		$this->addColumn('QUATIDADE_TOTAL', 'QuatidadeTotal', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Pesquisa', 'Pesquisa', RelationMap::MANY_TO_ONE, array('pesquisa_id' => 'id', ), null, null);
		$this->addRelation('MetaPublicoAlvo', 'MetaPublicoAlvo', RelationMap::ONE_TO_MANY, array('id' => 'publico_alvo_id', ), null, null, 'MetaPublicoAlvos');
	} // buildRelations()

} // PublicoAlvoTableMap
