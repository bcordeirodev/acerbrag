<?php



/**
 * This class defines the structure of the 'cliente' table.
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
class ClienteTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.ClienteTableMap';

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
		$this->setName('cliente');
		$this->setPhpName('Cliente');
		$this->setClassname('Cliente');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('USUARIO_ID', 'UsuarioId', 'INTEGER', 'usuario', 'ID', true, 10, null);
		$this->addColumn('NOME', 'Nome', 'VARCHAR', false, 200, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 200, null);
		$this->addColumn('CELULAR', 'Celular', 'VARCHAR', false, 11, null);
		$this->addColumn('TELEFONE', 'Telefone', 'VARCHAR', false, 11, null);
		$this->addColumn('CPF', 'Cpf', 'VARCHAR', false, 11, null);
		$this->addColumn('RG', 'Rg', 'VARCHAR', false, 11, null);
		$this->addColumn('RG_EXPEDIDOR', 'RgExpedidor', 'VARCHAR', false, 7, null);
		$this->addColumn('CADASTRO_VALIDO', 'CadastroValido', 'BOOLEAN', false, 1, false);
		$this->addColumn('DATA_NASCIMENTO', 'DataNascimento', 'DATE', false, null, null);
		$this->addColumn('SEXO', 'Sexo', 'CHAR', false, null, null);
		$this->addColumn('FACEBOOK', 'Facebook', 'VARCHAR', false, 150, null);
		$this->addColumn('INSTAGRAM', 'Instagram', 'VARCHAR', false, 150, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('usuario_id' => 'id', ), null, null);
		$this->addRelation('AdvogadoCliente', 'AdvogadoCliente', RelationMap::ONE_TO_MANY, array('id' => 'cliente_id', ), null, null, 'AdvogadoClientes');
		$this->addRelation('Caso', 'Caso', RelationMap::ONE_TO_MANY, array('id' => 'cliente_id', ), null, null, 'Casos');
		$this->addRelation('Contrato', 'Contrato', RelationMap::ONE_TO_MANY, array('id' => 'cliente_id', ), null, null, 'Contratos');
		$this->addRelation('Processo', 'Processo', RelationMap::ONE_TO_MANY, array('id' => 'cliente_id', ), null, null, 'Processos');
		$this->addRelation('Solicitacao', 'Solicitacao', RelationMap::ONE_TO_MANY, array('id' => 'cliente_id', ), null, null, 'Solicitacaos');
		$this->addRelation('Advogado', 'Advogado', RelationMap::MANY_TO_MANY, array(), null, null, 'Advogados');
	} // buildRelations()

} // ClienteTableMap
