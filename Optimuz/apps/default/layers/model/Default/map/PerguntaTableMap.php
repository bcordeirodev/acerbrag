<?php



/**
 * This class defines the structure of the 'pergunta' table.
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
class PerguntaTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'Default.map.PerguntaTableMap';

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
		$this->setName('pergunta');
		$this->setPhpName('Pergunta');
		$this->setClassname('Pergunta');
		$this->setPackage('Default');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 10, null);
		$this->addForeignKey('PESQUISA_ID', 'PesquisaId', 'INTEGER', 'pesquisa', 'ID', true, 10, null);
		$this->addForeignKey('CATEGORIA_ID', 'CategoriaId', 'INTEGER', 'categoria', 'ID', false, 10, null);
		$this->addColumn('TEXTO', 'Texto', 'VARCHAR', false, 500, null);
		$this->addColumn('TIPO_RESPOSTA', 'TipoResposta', 'INTEGER', false, null, null);
		$this->addColumn('POSICAO', 'Posicao', 'INTEGER', false, null, null);
		$this->addColumn('OBRIGATORIA', 'Obrigatoria', 'BOOLEAN', false, 1, true);
		$this->addColumn('EXCECAO', 'Excecao', 'INTEGER', false, 2, 0);
		$this->addColumn('GATILHO_EXCECAO', 'GatilhoExcecao', 'INTEGER', false, null, null);
		$this->addColumn('PERGUNTA_MAE_ID', 'PerguntaMaeId', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Pesquisa', 'Pesquisa', RelationMap::MANY_TO_ONE, array('pesquisa_id' => 'id', ), null, null);
		$this->addRelation('Categoria', 'Categoria', RelationMap::MANY_TO_ONE, array('categoria_id' => 'id', ), null, null);
		$this->addRelation('Alternativa', 'Alternativa', RelationMap::ONE_TO_MANY, array('id' => 'pergunta_id', ), null, null, 'Alternativas');
		$this->addRelation('Resposta', 'Resposta', RelationMap::ONE_TO_MANY, array('id' => 'pergunta_id', ), null, null, 'Respostas');
	} // buildRelations()

} // PerguntaTableMap
