<?php



/**
 * This class defines the structure of the 'caso' table.
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
class CasoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.CasoTableMap';

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
		$this->setName('caso');
		$this->setPhpName('Caso');
		$this->setClassname('Caso');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('ADVOGADO_ID', 'AdvogadoId', 'INTEGER', 'advogado', 'ID', true, 10, null);
		$this->addForeignKey('AREA_ADVOCACIA_ID', 'AreaAdvocaciaId', 'INTEGER', 'area_advocacia', 'ID', false, 10, null);
		$this->addColumn('UF_ID', 'UfId', 'INTEGER', true, 10, null);
		$this->addForeignKey('CONTRATO_ID', 'ContratoId', 'INTEGER', 'contrato', 'ID', false, 10, null);
		$this->addForeignKey('CLIENTE_ID', 'ClienteId', 'INTEGER', 'cliente', 'ID', false, 10, null);
		$this->addForeignKey('SOLICITACAO_ID', 'SolicitacaoId', 'INTEGER', 'solicitacao', 'ID', false, 10, null);
		$this->addColumn('NOME_CASO', 'NomeCaso', 'VARCHAR', false, 175, null);
		$this->addColumn('OBJETIVO_FINAL', 'ObjetivoFinal', 'VARCHAR', false, 350, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'LONGVARCHAR', false, null, null);
		$this->addColumn('DATA_ABERTURA', 'DataAbertura', 'TIMESTAMP', false, null, null);
		$this->addColumn('DATA_FECHAMENTO', 'DataFechamento', 'TIMESTAMP', false, null, null);
		$this->addColumn('ATIVO', 'Ativo', 'BOOLEAN', false, 1, true);
		$this->addColumn('SITUACAO_CLIENTE', 'SituacaoCliente', 'CHAR', false, null, null);
		$this->addColumn('ANALISE_RISCO', 'AnaliseRisco', 'CHAR', false, null, null);
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
		$this->addRelation('Contrato', 'Contrato', RelationMap::MANY_TO_ONE, array('contrato_id' => 'id', ), null, null);
		$this->addRelation('Solicitacao', 'Solicitacao', RelationMap::MANY_TO_ONE, array('solicitacao_id' => 'id', ), null, null);
		$this->addRelation('AnotacaoCaso', 'AnotacaoCaso', RelationMap::ONE_TO_MANY, array('id' => 'caso_id', ), null, null, 'AnotacaoCasos');
		$this->addRelation('CasoProcesso', 'CasoProcesso', RelationMap::ONE_TO_MANY, array('id' => 'caso_id', ), null, null, 'CasoProcessos');
		$this->addRelation('Processo', 'Processo', RelationMap::MANY_TO_MANY, array(), null, null, 'Processos');
	} // buildRelations()

} // CasoTableMap
