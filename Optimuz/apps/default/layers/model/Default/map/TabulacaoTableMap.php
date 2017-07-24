<?php



/**
 * This class defines the structure of the 'tabulacao' table.
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
class TabulacaoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.TabulacaoTableMap';

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
		$this->setName('tabulacao');
		$this->setPhpName('Tabulacao');
		$this->setClassname('Tabulacao');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('TABULACAO_ID', 'TabulacaoId', 'INTEGER', 'tabulacao', 'ID', false, 10, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', true, 45, null);
		$this->addColumn('ATIVO', 'Ativo', 'BOOLEAN', true, 1, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('TabulacaoRelatedByTabulacaoId', 'Tabulacao', RelationMap::MANY_TO_ONE, array('tabulacao_id' => 'id', ), null, null);
		$this->addRelation('Contato', 'Contato', RelationMap::ONE_TO_MANY, array('id' => 'tabulacao_id', ), null, null, 'Contatos');
		$this->addRelation('TabulacaoRelatedById', 'Tabulacao', RelationMap::ONE_TO_MANY, array('id' => 'tabulacao_id', ), null, null, 'TabulacaosRelatedById');
	} // buildRelations()

} // TabulacaoTableMap
