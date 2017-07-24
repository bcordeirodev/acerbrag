<?php



/**
 * This class defines the structure of the 'area_advocacia' table.
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
class AreaAdvocaciaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.AreaAdvocaciaTableMap';

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
		$this->setName('area_advocacia');
		$this->setPhpName('AreaAdvocacia');
		$this->setClassname('AreaAdvocacia');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', true, 175, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('AdvogadoAreaAdvocacia', 'AdvogadoAreaAdvocacia', RelationMap::ONE_TO_MANY, array('id' => 'area_advocacia_id', ), null, null, 'AdvogadoAreaAdvocacias');
		$this->addRelation('Caso', 'Caso', RelationMap::ONE_TO_MANY, array('id' => 'area_advocacia_id', ), null, null, 'Casos');
		$this->addRelation('Contrato', 'Contrato', RelationMap::ONE_TO_MANY, array('id' => 'area_advocacia_id', ), null, null, 'Contratos');
		$this->addRelation('Processo', 'Processo', RelationMap::ONE_TO_MANY, array('id' => 'area_advocacia_id', ), null, null, 'Processos');
		$this->addRelation('Solicitacao', 'Solicitacao', RelationMap::ONE_TO_MANY, array('id' => 'area_advocacia_id', ), null, null, 'Solicitacaos');
		$this->addRelation('TagAreaAdvocacia', 'TagAreaAdvocacia', RelationMap::ONE_TO_MANY, array('id' => 'area_advocacia_id', ), null, null, 'TagAreaAdvocacias');
		$this->addRelation('Advogado', 'Advogado', RelationMap::MANY_TO_MANY, array(), null, null, 'Advogados');
	} // buildRelations()

} // AreaAdvocaciaTableMap
