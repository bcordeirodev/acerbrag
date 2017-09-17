<?php



/**
 * This class defines the structure of the 'noticia' table.
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
class NoticiaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.NoticiaTableMap';

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
		$this->setName('noticia');
		$this->setPhpName('Noticia');
		$this->setClassname('Noticia');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', false, 10, null);
		$this->addColumn('TEMA', 'Tema', 'VARCHAR', false, 100, null);
		$this->addColumn('TITULO', 'Titulo', 'VARCHAR', false, 255, null);
		$this->addColumn('SUB_TITULO', 'SubTitulo', 'LONGVARCHAR', false, null, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'LONGVARCHAR', false, null, null);
		$this->addColumn('DATA_CADASTRO', 'DataCadastro', 'TIMESTAMP', false, null, null);
		$this->addColumn('VISUALIZACAO', 'Visualizacao', 'INTEGER', false, null, 0);
		$this->addColumn('ATIVA', 'Ativa', 'BOOLEAN', false, 1, true);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), null, null);
		$this->addRelation('ComentarioNoticia', 'ComentarioNoticia', RelationMap::ONE_TO_MANY, array('id' => 'noticia_id', ), null, null, 'ComentarioNoticias');
	} // buildRelations()

} // NoticiaTableMap
