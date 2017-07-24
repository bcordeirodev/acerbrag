<?php



/**
 * This class defines the structure of the 'pedido_oracao' table.
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
class PedidoOracaoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.PedidoOracaoTableMap';

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
		$this->setName('pedido_oracao');
		$this->setPhpName('PedidoOracao');
		$this->setClassname('PedidoOracao');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('SOLICITANTE_ID', 'SolicitanteId', 'INTEGER', 'usuario', 'ID', true, 10, null);
		$this->addForeignKey('ATENDENTE_ID', 'AtendenteId', 'INTEGER', 'usuario', 'ID', false, 10, null);
		$this->addForeignKey('INSTITUICAO_ID', 'InstituicaoId', 'INTEGER', 'igreja', 'ID', true, 10, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'LONGVARCHAR', false, null, null);
		$this->addColumn('DATA_PEDIDO', 'DataPedido', 'DATE', false, null, null);
		$this->addColumn('ATENDIDA', 'Atendida', 'BOOLEAN', false, 1, null);
		$this->addColumn('DATA_ATENDIMENTO', 'DataAtendimento', 'DATE', false, null, null);
		$this->addColumn('DESCRICAO_ATENDIMENTO', 'DescricaoAtendimento', 'LONGVARCHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('UsuarioRelatedBySolicitanteId', 'Usuario', RelationMap::MANY_TO_ONE, array('solicitante_id' => 'id', ), null, null);
		$this->addRelation('UsuarioRelatedByAtendenteId', 'Usuario', RelationMap::MANY_TO_ONE, array('atendente_id' => 'id', ), null, null);
		$this->addRelation('Igreja', 'Igreja', RelationMap::MANY_TO_ONE, array('instituicao_id' => 'id', ), null, null);
	} // buildRelations()

} // PedidoOracaoTableMap
