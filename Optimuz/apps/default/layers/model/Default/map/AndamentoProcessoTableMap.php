<?php



/**
 * This class defines the structure of the 'andamento_processo' table.
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
class AndamentoProcessoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.AndamentoProcessoTableMap';

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
		$this->setName('andamento_processo');
		$this->setPhpName('AndamentoProcesso');
		$this->setClassname('AndamentoProcesso');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('PROCESSO_ID', 'ProcessoId', 'INTEGER', 'processo', 'ID', true, 10, null);
		$this->addColumn('NUMERO', 'Numero', 'VARCHAR', false, 5, null);
		$this->addColumn('TITULO', 'Titulo', 'VARCHAR', false, 250, null);
		$this->addColumn('COMPLEMENTO', 'Complemento', 'LONGVARCHAR', false, null, null);
		$this->addColumn('DATA_ANDAMENTO', 'DataAndamento', 'TIMESTAMP', false, null, null);
		$this->addColumn('DATA_PUSH', 'DataPush', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Processo', 'Processo', RelationMap::MANY_TO_ONE, array('processo_id' => 'id', ), null, null);
	} // buildRelations()

} // AndamentoProcessoTableMap
