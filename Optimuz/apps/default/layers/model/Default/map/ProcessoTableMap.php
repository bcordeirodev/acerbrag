<?php



/**
 * This class defines the structure of the 'processo' table.
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
class ProcessoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.ProcessoTableMap';

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
		$this->setName('processo');
		$this->setPhpName('Processo');
		$this->setClassname('Processo');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('ADVOGADO_ID', 'AdvogadoId', 'INTEGER', 'advogado', 'ID', true, 10, null);
		$this->addForeignKey('CLIENTE_ID', 'ClienteId', 'INTEGER', 'cliente', 'ID', false, 10, null);
		$this->addForeignKey('CONTRATO_ID', 'ContratoId', 'INTEGER', 'contrato', 'ID', false, 10, null);
		$this->addForeignKey('FASE_PROCESSO_ID', 'FaseProcessoId', 'INTEGER', 'fase_processo', 'ID', true, 10, null);
		$this->addForeignKey('AREA_ADVOCACIA_ID', 'AreaAdvocaciaId', 'INTEGER', 'area_advocacia', 'ID', true, 10, null);
		$this->addForeignKey('TRIBUNAL_ID', 'TribunalId', 'INTEGER', 'tribunal', 'ID', false, 10, null);
		$this->addForeignKey('UF_ID', 'UfId', 'INTEGER', 'uf', 'ID', false, 10, null);
		$this->addColumn('NOME_PROCESSO', 'NomeProcesso', 'VARCHAR', false, 175, null);
		$this->addColumn('NUMERO_CNJ', 'NumeroCnj', 'VARCHAR', false, 20, null);
		$this->addColumn('NUMERO_PROCESSO', 'NumeroProcesso', 'VARCHAR', false, 45, null);
		$this->addColumn('TIPO_PROCESSO', 'TipoProcesso', 'CHAR', false, null, null);
		$this->addColumn('SITUACAO_CLIENTE', 'SituacaoCliente', 'CHAR', false, null, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'LONGVARCHAR', false, null, null);
		$this->addColumn('OBJETIVO_FINAL', 'ObjetivoFinal', 'VARCHAR', false, 250, null);
		$this->addColumn('DATA_ABERTURA', 'DataAbertura', 'TIMESTAMP', false, null, null);
		$this->addColumn('DATA_FECHAMENTO', 'DataFechamento', 'TIMESTAMP', false, null, null);
		$this->addColumn('ATIVO', 'Ativo', 'BOOLEAN', false, 1, null);
		$this->addColumn('VALOR_CAUSA', 'ValorCausa', 'DECIMAL', false, 12, null);
		$this->addColumn('VALOR_PROCESSO', 'ValorProcesso', 'DECIMAL', false, 12, null);
		$this->addColumn('VALOR_CONTIGENCIA', 'ValorContigencia', 'DECIMAL', false, 12, null);
		$this->addColumn('VALOR_GARANTIA_JUIZO', 'ValorGarantiaJuizo', 'DECIMAL', false, 12, null);
		$this->addColumn('VALOR_DEPOSITO_RECURSAL', 'ValorDepositoRecursal', 'DECIMAL', false, 12, null);
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
		$this->addRelation('Contrato', 'Contrato', RelationMap::MANY_TO_ONE, array('contrato_id' => 'id', ), null, null);
		$this->addRelation('FaseProcesso', 'FaseProcesso', RelationMap::MANY_TO_ONE, array('fase_processo_id' => 'id', ), null, null);
		$this->addRelation('Tribunal', 'Tribunal', RelationMap::MANY_TO_ONE, array('tribunal_id' => 'id', ), null, null);
		$this->addRelation('Uf', 'Uf', RelationMap::MANY_TO_ONE, array('uf_id' => 'id', ), null, null);
		$this->addRelation('Cliente', 'Cliente', RelationMap::MANY_TO_ONE, array('cliente_id' => 'id', ), null, null);
		$this->addRelation('AndamentoProcesso', 'AndamentoProcesso', RelationMap::ONE_TO_MANY, array('id' => 'processo_id', ), null, null, 'AndamentoProcessos');
		$this->addRelation('AnotacaoProcesso', 'AnotacaoProcesso', RelationMap::ONE_TO_MANY, array('id' => 'processo_id', ), null, null, 'AnotacaoProcessos');
		$this->addRelation('CasoProcesso', 'CasoProcesso', RelationMap::ONE_TO_MANY, array('id' => 'processo_id', ), null, null, 'CasoProcessos');
		$this->addRelation('Caso', 'Caso', RelationMap::MANY_TO_MANY, array(), null, null, 'Casos');
	} // buildRelations()

} // ProcessoTableMap
