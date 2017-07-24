<?php



/**
 * This class defines the structure of the 'comunicado' table.
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
class ComunicadoTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.ComunicadoTableMap';

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
		$this->setName('comunicado');
		$this->setPhpName('Comunicado');
		$this->setClassname('Comunicado');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', true, 10, null);
		$this->addForeignKey('SEGURADO_ID', 'SeguradoId', 'INTEGER', 'pessoa', 'ID', true, 10, null);
		$this->addForeignKey('COMUNICANTE_ID', 'ComunicanteId', 'INTEGER', 'pessoa', 'ID', false, 10, null);
		$this->addForeignKey('PARENTESCO_ID', 'ParentescoId', 'INTEGER', 'parentesco', 'ID', false, 10, null);
		$this->addColumn('DATA_ABERTURA', 'DataAbertura', 'TIMESTAMP', false, null, null);
		$this->addColumn('DATA_FECHAMENTO', 'DataFechamento', 'TIMESTAMP', false, null, null);
		$this->addColumn('E_SEGURADO', 'ESegurado', 'BOOLEAN', false, 1, null);
		$this->addColumn('SINISTRO', 'Sinistro', 'VARCHAR', false, 45, null);
		$this->addColumn('CONTRATO', 'Contrato', 'VARCHAR', false, 45, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', false, 175, null);
		$this->addColumn('ABERTO', 'Aberto', 'BOOLEAN', false, 1, null);
		$this->addColumn('PROTOCOLO_ASE', 'ProtocoloAse', 'VARCHAR', false, 12, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Parentesco', 'Parentesco', RelationMap::MANY_TO_ONE, array('parentesco_id' => 'id', ), null, null);
		$this->addRelation('PessoaRelatedBySeguradoId', 'Pessoa', RelationMap::MANY_TO_ONE, array('segurado_id' => 'id', ), null, null);
		$this->addRelation('PessoaRelatedByComunicanteId', 'Pessoa', RelationMap::MANY_TO_ONE, array('comunicante_id' => 'id', ), null, null);
		$this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), null, null);
		$this->addRelation('Contato', 'Contato', RelationMap::ONE_TO_MANY, array('id' => 'comunicado_id', ), null, null, 'Contatos');
	} // buildRelations()

} // ComunicadoTableMap
