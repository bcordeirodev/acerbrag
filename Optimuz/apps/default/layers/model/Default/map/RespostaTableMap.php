<?php



/**
 * This class defines the structure of the 'resposta' table.
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
class RespostaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.RespostaTableMap';

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
		$this->setName('resposta');
		$this->setPhpName('Resposta');
		$this->setClassname('Resposta');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('COLETA_PESQUISA_ID', 'ColetaPesquisaId', 'INTEGER', 'coleta_pesquisa', 'ID', true, 10, null);
		$this->addForeignKey('PERGUNTA_ID', 'PerguntaId', 'INTEGER', 'pergunta', 'ID', true, 10, null);
		$this->addForeignKey('ALTERNATIVA_ID', 'AlternativaId', 'INTEGER', 'alternativa', 'ID', false, 10, null);
		$this->addColumn('TEXTO', 'Texto', 'VARCHAR', false, 500, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Alternativa', 'Alternativa', RelationMap::MANY_TO_ONE, array('alternativa_id' => 'id', ), null, null);
		$this->addRelation('ColetaPesquisa', 'ColetaPesquisa', RelationMap::MANY_TO_ONE, array('coleta_pesquisa_id' => 'id', ), null, null);
		$this->addRelation('Pergunta', 'Pergunta', RelationMap::MANY_TO_ONE, array('pergunta_id' => 'id', ), null, null);
	} // buildRelations()

} // RespostaTableMap
