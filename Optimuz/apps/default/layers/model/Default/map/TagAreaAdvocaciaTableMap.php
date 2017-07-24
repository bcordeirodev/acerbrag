<?php



/**
 * This class defines the structure of the 'tag_area_advocacia' table.
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
class TagAreaAdvocaciaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.TagAreaAdvocaciaTableMap';

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
		$this->setName('tag_area_advocacia');
		$this->setPhpName('TagAreaAdvocacia');
		$this->setClassname('TagAreaAdvocacia');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('AREA_ADVOCACIA_ID', 'AreaAdvocaciaId', 'INTEGER', 'area_advocacia', 'ID', true, 10, null);
		$this->addColumn('TAG', 'Tag', 'VARCHAR', true, 45, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('AreaAdvocacia', 'AreaAdvocacia', RelationMap::MANY_TO_ONE, array('area_advocacia_id' => 'id', ), null, null);
	} // buildRelations()

} // TagAreaAdvocaciaTableMap
