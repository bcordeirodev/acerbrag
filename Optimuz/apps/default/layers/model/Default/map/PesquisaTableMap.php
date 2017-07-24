<?php



/**
 * This class defines the structure of the 'pesquisa' table.
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
class PesquisaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.PesquisaTableMap';

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
		$this->setName('pesquisa');
		$this->setPhpName('Pesquisa');
		$this->setClassname('Pesquisa');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('CRIADOR_ID', 'CriadorId', 'INTEGER', 'usuario', 'ID', true, 10, null);
		$this->addColumn('TITULO', 'Titulo', 'VARCHAR', false, 200, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'LONGVARCHAR', false, null, null);
		$this->addColumn('DATA_CRIACAO', 'DataCriacao', 'TIMESTAMP', false, null, null);
		$this->addColumn('DATA_INICIO', 'DataInicio', 'DATE', false, null, null);
		$this->addColumn('DATA_FIM', 'DataFim', 'DATE', false, null, null);
		$this->addColumn('ATIVO', 'Ativo', 'BOOLEAN', false, 1, true);
		$this->addColumn('PUBLICADA', 'Publicada', 'BOOLEAN', false, 1, false);
		$this->addColumn('TIPO_PESQUISA', 'TipoPesquisa', 'CHAR', false, null, null);
		$this->addColumn('ANONIMA', 'Anonima', 'BOOLEAN', false, 1, null);
		$this->addColumn('IDADE_INICIAL', 'IdadeInicial', 'INTEGER', false, null, null);
		$this->addColumn('IDADE_FINAL', 'IdadeFinal', 'INTEGER', false, null, null);
		$this->addColumn('GENERO', 'Genero', 'CHAR', false, null, null);
		$this->addColumn('QUANTIDADE_PONTOS', 'QuantidadePontos', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Usuario', 'Usuario', RelationMap::MANY_TO_ONE, array('criador_id' => 'id', ), null, null);
		$this->addRelation('CargoPesquisa', 'CargoPesquisa', RelationMap::ONE_TO_MANY, array('id' => 'pesquisa_id', ), null, null, 'CargoPesquisas');
		$this->addRelation('ColetaPesquisa', 'ColetaPesquisa', RelationMap::ONE_TO_MANY, array('id' => 'pesquisa_id', ), null, null, 'ColetaPesquisas');
		$this->addRelation('DepartamentoPesquisa', 'DepartamentoPesquisa', RelationMap::ONE_TO_MANY, array('id' => 'pesquisa_id', ), null, null, 'DepartamentoPesquisas');
		$this->addRelation('Pergunta', 'Pergunta', RelationMap::ONE_TO_MANY, array('id' => 'pesquisa_id', ), null, null, 'Perguntas');
		$this->addRelation('PesquisaHabilitada', 'PesquisaHabilitada', RelationMap::ONE_TO_MANY, array('id' => 'pesquisa_id', ), null, null, 'PesquisaHabilitadas');
		$this->addRelation('Cargo', 'Cargo', RelationMap::MANY_TO_MANY, array(), null, null, 'Cargos');
		$this->addRelation('Departamento', 'Departamento', RelationMap::MANY_TO_MANY, array(), null, null, 'Departamentos');
	} // buildRelations()

} // PesquisaTableMap
