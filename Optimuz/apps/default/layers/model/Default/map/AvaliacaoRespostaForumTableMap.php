<?php



/**
 * This class defines the structure of the 'avaliacao_resposta_forum' table.
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
class AvaliacaoRespostaForumTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.AvaliacaoRespostaForumTableMap';

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
		$this->setName('avaliacao_resposta_forum');
		$this->setPhpName('AvaliacaoRespostaForum');
		$this->setClassname('AvaliacaoRespostaForum');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', true, 10, null);
		$this->addForeignKey('RESPOSTA_FORUM_ID', 'RespostaForumId', 'INTEGER', 'resposta_forum', 'ID', true, 10, null);
		$this->addColumn('DATA_AVALIACAO', 'DataAvaliacao', 'DATE', false, null, null);
		$this->addColumn('NOTA', 'Nota', 'CHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), null, null);
		$this->addRelation('RespostaForum', 'RespostaForum', RelationMap::MANY_TO_ONE, array('resposta_forum_id' => 'id', ), null, null);
	} // buildRelations()

} // AvaliacaoRespostaForumTableMap
