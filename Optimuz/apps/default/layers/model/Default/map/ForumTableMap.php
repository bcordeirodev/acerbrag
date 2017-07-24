<?php



/**
 * This class defines the structure of the 'forum' table.
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
class ForumTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.ForumTableMap';

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
		$this->setName('forum');
		$this->setPhpName('Forum');
		$this->setClassname('Forum');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addColumn('USUARIO_ID', 'UsuarioId', 'INTEGER', false, null, null);
		$this->addColumn('TITULO', 'Titulo', 'VARCHAR', false, 255, null);
		$this->addColumn('TOPICO', 'Topico', 'LONGVARCHAR', false, null, null);
		$this->addColumn('DATA_CRICACAO', 'DataCricacao', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('CurtidaForum', 'CurtidaForum', RelationMap::ONE_TO_MANY, array('id' => 'forum_id', ), null, null, 'CurtidaForums');
		$this->addRelation('RespostaForum', 'RespostaForum', RelationMap::ONE_TO_MANY, array('id' => 'forum_id', ), null, null, 'RespostaForums');
	} // buildRelations()

} // ForumTableMap
