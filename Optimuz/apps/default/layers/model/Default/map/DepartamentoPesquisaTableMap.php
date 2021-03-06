<?php



/**
 * This class defines the structure of the 'departamento_pesquisa' table.
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
class DepartamentoPesquisaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.DepartamentoPesquisaTableMap';

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
		$this->setName('departamento_pesquisa');
		$this->setPhpName('DepartamentoPesquisa');
		$this->setClassname('DepartamentoPesquisa');
		$this->setPackage('Default');
		$this->setUseIdGenerator(false);
		$this->setIsCrossRef(true);
		// columns
		$this->addForeignPrimaryKey('DEPARTAMENTO_ID', 'DepartamentoId', 'INTEGER' , 'departamento', 'ID', true, 10, null);
		$this->addForeignPrimaryKey('PESQUISA_ID', 'PesquisaId', 'INTEGER' , 'pesquisa', 'ID', true, 10, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Departamento', 'Departamento', RelationMap::MANY_TO_ONE, array('departamento_id' => 'id', ), null, null);
		$this->addRelation('Pesquisa', 'Pesquisa', RelationMap::MANY_TO_ONE, array('pesquisa_id' => 'id', ), null, null);
	} // buildRelations()

} // DepartamentoPesquisaTableMap
