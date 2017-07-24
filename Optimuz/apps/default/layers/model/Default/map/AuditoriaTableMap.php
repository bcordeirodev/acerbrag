<?php



/**
 * This class defines the structure of the 'auditoria' table.
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
class AuditoriaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.AuditoriaTableMap';

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
		$this->setName('auditoria');
		$this->setPhpName('Auditoria');
		$this->setClassname('Auditoria');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', false, 10, null);
		$this->addColumn('MENSAGEM', 'Mensagem', 'VARCHAR', true, 175, null);
		$this->addColumn('OBSERVACAO', 'Observacao', 'LONGVARCHAR', false, null, null);
		$this->addColumn('DATA', 'Data', 'TIMESTAMP', true, null, null);
		$this->addColumn('NIVEL', 'Nivel', 'INTEGER', true, 1, null);
		$this->addColumn('IP', 'Ip', 'VARCHAR', false, 15, null);
		$this->addColumn('TIPO', 'Tipo', 'INTEGER', false, 1, null);
		$this->addColumn('REGISTRO_ID', 'RegistroId', 'INTEGER', false, 10, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), null, null);
	} // buildRelations()

} // AuditoriaTableMap
