<?php



/**
 * This class defines the structure of the 'resposta_forum' table.
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
class RespostaForumTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.RespostaForumTableMap';

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
		$this->setName('resposta_forum');
		$this->setPhpName('RespostaForum');
		$this->setClassname('RespostaForum');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('FORUM_ID', 'ForumId', 'INTEGER', 'forum', 'ID', true, 10, null);
		$this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', true, 10, null);
		$this->addColumn('DATA_RESPOSTA', 'DataResposta', 'TIMESTAMP', false, null, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', false, 355, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Forum', 'Forum', RelationMap::MANY_TO_ONE, array('forum_id' => 'id', ), null, null);
		$this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), null, null);
		$this->addRelation('AvaliacaoRespostaForum', 'AvaliacaoRespostaForum', RelationMap::ONE_TO_MANY, array('id' => 'resposta_forum_id', ), null, null, 'AvaliacaoRespostaForums');
	} // buildRelations()

} // RespostaForumTableMap
