<?php



/**
 * This class defines the structure of the 'contrato' table.
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
class ContratoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.ContratoTableMap';

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
		$this->setName('contrato');
		$this->setPhpName('Contrato');
		$this->setClassname('Contrato');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('CLIENTE_ID', 'ClienteId', 'INTEGER', 'cliente', 'ID', true, 10, null);
		$this->addForeignKey('ADVOGADO_ID', 'AdvogadoId', 'INTEGER', 'advogado', 'ID', true, 10, null);
		$this->addForeignKey('AREA_ADVOCACIA_ID', 'AreaAdvocaciaId', 'INTEGER', 'area_advocacia', 'ID', true, 10, null);
		$this->addColumn('TITULO', 'Titulo', 'VARCHAR', false, 250, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'LONGVARCHAR', false, null, null);
		$this->addColumn('DATA_INICIO', 'DataInicio', 'TIMESTAMP', false, null, null);
		$this->addColumn('DATA_FIM', 'DataFim', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Advogado', 'Advogado', RelationMap::MANY_TO_ONE, array('advogado_id' => 'id', ), null, null);
		$this->addRelation('AreaAdvocacia', 'AreaAdvocacia', RelationMap::MANY_TO_ONE, array('area_advocacia_id' => 'id', ), null, null);
		$this->addRelation('Cliente', 'Cliente', RelationMap::MANY_TO_ONE, array('cliente_id' => 'id', ), null, null);
		$this->addRelation('Caso', 'Caso', RelationMap::ONE_TO_MANY, array('id' => 'contrato_id', ), null, null, 'Casos');
		$this->addRelation('Processo', 'Processo', RelationMap::ONE_TO_MANY, array('id' => 'contrato_id', ), null, null, 'Processos');
	} // buildRelations()

} // ContratoTableMap
