<?php



/**
 * This class defines the structure of the 'localizacao_advogado' table.
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
class LocalizacaoAdvogadoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.LocalizacaoAdvogadoTableMap';

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
		$this->setName('localizacao_advogado');
		$this->setPhpName('LocalizacaoAdvogado');
		$this->setClassname('LocalizacaoAdvogado');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('ADVOGADO_ID', 'AdvogadoId', 'INTEGER', 'advogado', 'ID', true, 10, null);
		$this->addColumn('CIDADE_ID', 'CidadeId', 'INTEGER', false, 10, null);
		$this->addColumn('LONGITUDE', 'Longitude', 'FLOAT', true, 10, null);
		$this->addColumn('LATITUDE', 'Latitude', 'FLOAT', true, 10, null);
		$this->addColumn('DATA_LOCALIZACAO', 'DataLocalizacao', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Advogado', 'Advogado', RelationMap::MANY_TO_ONE, array('advogado_id' => 'id', ), null, null);
	} // buildRelations()

} // LocalizacaoAdvogadoTableMap
