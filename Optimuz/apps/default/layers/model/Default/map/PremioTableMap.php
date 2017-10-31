<?php



/**
 * This class defines the structure of the 'premio' table.
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
class PremioTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.PremioTableMap';

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
		$this->setName('premio');
		$this->setPhpName('Premio');
		$this->setClassname('Premio');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', true, 10, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', true, 255, null);
		$this->addColumn('VALOR', 'Valor', 'INTEGER', true, null, 0);
		$this->addColumn('QUANTIDADE', 'Quantidade', 'INTEGER', true, null, null);
		$this->addColumn('DATA_CADASTRO', 'DataCadastro', 'TIMESTAMP', true, null, null);
		$this->addColumn('ATIVO', 'Ativo', 'BOOLEAN', true, 1, true);
		$this->addColumn('DESCRICAO', 'Descricao', 'LONGVARCHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), null, null);
		$this->addRelation('SolicitacaoResgate', 'SolicitacaoResgate', RelationMap::ONE_TO_MANY, array('id' => 'premio_id', ), null, null, 'SolicitacaoResgates');
	} // buildRelations()

} // PremioTableMap
