<?php



/**
 * This class defines the structure of the 'noticia_igreja' table.
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
class NoticiaIgrejaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.NoticiaIgrejaTableMap';

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
		$this->setName('noticia_igreja');
		$this->setPhpName('NoticiaIgreja');
		$this->setClassname('NoticiaIgreja');
		$this->setPackage('Default');
		$this->setUseIdGenerator(false);
		$this->setIsCrossRef(true);
		// columns
		$this->addForeignPrimaryKey('NOTICIA_ID', 'NoticiaId', 'INTEGER' , 'noticia', 'ID', true, 10, null);
		$this->addForeignPrimaryKey('IGREJA_ID', 'IgrejaId', 'INTEGER' , 'igreja', 'ID', true, 10, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Igreja', 'Igreja', RelationMap::MANY_TO_ONE, array('igreja_id' => 'id', ), null, null);
		$this->addRelation('Noticia', 'Noticia', RelationMap::MANY_TO_ONE, array('noticia_id' => 'id', ), null, null);
	} // buildRelations()

} // NoticiaIgrejaTableMap
