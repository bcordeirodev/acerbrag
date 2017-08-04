<?php



/**
 * This class defines the structure of the 'solicitacao_resgate' table.
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
class SolicitacaoResgateTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.SolicitacaoResgateTableMap';

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
		$this->setName('solicitacao_resgate');
		$this->setPhpName('SolicitacaoResgate');
		$this->setClassname('SolicitacaoResgate');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('SOLICITANTE_ID', 'SolicitanteId', 'INTEGER', 'usuario', 'ID', true, 10, null);
		$this->addForeignKey('APROVADOR_ID', 'AprovadorId', 'INTEGER', 'usuario', 'ID', false, 10, null);
		$this->addForeignKey('PREMIO_ID', 'PremioId', 'INTEGER', 'premio', 'ID', true, 10, null);
		$this->addColumn('DATA_SOLICITACAO', 'DataSolicitacao', 'VARCHAR', true, 45, null);
		$this->addColumn('APROVADA', 'Aprovada', 'BOOLEAN', true, 1, false);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('UsuarioRelatedByAprovadorId', 'Usuario', RelationMap::MANY_TO_ONE, array('aprovador_id' => 'id', ), null, null);
		$this->addRelation('Premio', 'Premio', RelationMap::MANY_TO_ONE, array('premio_id' => 'id', ), null, null);
		$this->addRelation('UsuarioRelatedBySolicitanteId', 'Usuario', RelationMap::MANY_TO_ONE, array('solicitante_id' => 'id', ), null, null);
	} // buildRelations()

} // SolicitacaoResgateTableMap
