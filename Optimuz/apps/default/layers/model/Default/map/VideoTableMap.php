<?php



/**
 * This class defines the structure of the 'video' table.
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
class VideoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.VideoTableMap';

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
		$this->setName('video');
		$this->setPhpName('Video');
		$this->setClassname('Video');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addColumn('INSTITUICAO_ID', 'InstituicaoId', 'INTEGER', true, 10, null);
		$this->addColumn('TITULO', 'Titulo', 'VARCHAR', false, 255, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'LONGVARCHAR', false, null, null);
		$this->addColumn('URL', 'Url', 'VARCHAR', false, 500, null);
		$this->addColumn('DATA_CADASTRO', 'DataCadastro', 'DATE', false, null, null);
		$this->addColumn('ATIVO', 'Ativo', 'BOOLEAN', false, 1, true);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('VideoIgreja', 'VideoIgreja', RelationMap::ONE_TO_MANY, array('id' => 'video_id', ), null, null, 'VideoIgrejas');
		$this->addRelation('Igreja', 'Igreja', RelationMap::MANY_TO_MANY, array(), null, null, 'Igrejas');
	} // buildRelations()

} // VideoTableMap
