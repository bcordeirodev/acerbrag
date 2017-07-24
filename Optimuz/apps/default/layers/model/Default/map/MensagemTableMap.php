<?php



/**
 * This class defines the structure of the 'mensagem' table.
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
class MensagemTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.MensagemTableMap';

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
		$this->setName('mensagem');
		$this->setPhpName('Mensagem');
		$this->setClassname('Mensagem');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('REMETENTE_ID', 'RemetenteId', 'INTEGER', 'usuario', 'ID', false, 10, null);
		$this->addForeignKey('DESTINATARIO_ID', 'DestinatarioId', 'INTEGER', 'usuario', 'ID', true, 10, null);
		$this->addColumn('TITULO', 'Titulo', 'VARCHAR', false, 100, null);
		$this->addColumn('TEXTO', 'Texto', 'LONGVARCHAR', true, null, null);
		$this->addColumn('LINK', 'Link', 'VARCHAR', false, 500, null);
		$this->addColumn('DATA', 'Data', 'TIMESTAMP', true, null, null);
		$this->addColumn('LIDA', 'Lida', 'BOOLEAN', true, 1, false);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('UsuarioRelatedByDestinatarioId', 'Usuario', RelationMap::MANY_TO_ONE, array('destinatario_id' => 'id', ), null, null);
		$this->addRelation('UsuarioRelatedByRemetenteId', 'Usuario', RelationMap::MANY_TO_ONE, array('remetente_id' => 'id', ), null, null);
	} // buildRelations()

} // MensagemTableMap
