<?php
use Box\Spout\Common\Type;
use Box\Spout\Writer\WriterFactory;

/**
 * This file sets a custom component using the Html.Component.HtmlComponent.
 * @version 0.3
 * @package Html
 * @subpackage Component
 */

/**
 * Exibe o formulário de filtro e exportação para uma tabela dinâmica.
 * @author Diego Andrade
 * @version 0.1
 */
class FilterContainerComponent extends HtmlComponent
{
	/**
	 * Contagem do número de componentes na página.
	 * @var int
	 */
	private static $count		= -1;

	/**
	 * Índice do componente.
	 * @var int
	 */
	private $index				= null;

	/**
	 * Inicializa uma nova instância do componente.
	 * @param int $index (opcional) Índice do componente.
	 */
	public function __construct($index = null)
	{
		parent::__construct('div');

		if(!is_null($index))
			$this->index = $index;
	}

	/**
	 * Inicializa o componente.
	 */
	protected function initialize()
	{
		parent::initialize();
		$this->index = ++self::$count;
		$this->addCssClass('grid simple filter-export-container');
		$this->append(
			'<div class="grid-title no-border clickable">
				<h4><span class="semi-bold">Filtrar</span> Resultados</h4>
				<div class="tools">
					<a href="javascript:;" class="expand"></a>
				</div>
			</div>
			<div class="grid-body no-border" style="display: none;">
				<div id="js-filters">
					<div class="row">
						<div class="col-md-12"></div>
					</div>
				</div>
				<div class="form-actions">
					<!--<div class="pull-left">
						<div class="btn-group">
							<a href="javascript:;" class="btn dropdown-toggle btn-white" data-toggle="dropdown" title=""><i class="fa fa-download m-r-5"></i> Exportar resultados <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li>
									<a href="javascript:;" class="js-export-table" data-type="excel">Excel</a>
									<a href="javascript:;" class="js-export-table" data-type="csv">CSV</a>
								</li>
							</ul>
						</div>
					</div>-->
					<div class="pull-right">
						<a href="javascript:;" class="btn btn-cons btn-white js-reset-filters" title="">Limpar</a>
						<a href="javascript:;" class="btn btn-cons btn-success js-filter-table" title="">Filtrar</a>
					</div>
				</div>
			</div>'
		);

		$this->addFilter();
	}

	/**
	 * Este método carrega os filtros no componente, tornando possível persistir
	 * o estado do compoente entre requisições.
	 * @param array $fields Lista de filtros disponíveis.
	 * @param array $data Definições de filtros para popular o componente.
	 * @author Diego Andrade
	 */
	public function populate(array $fields, array $data)
	{
		foreach($data['fields'] as $i => $field)
		{
			if($i > 0)
			{
				$filter = $this->addFilter();
				$filter->populate($fields);

				$link = new HtmlLink('javascript:;');
				$link->addCssClass('input-group-addon tip js-remove-filter');
				$link->setAttribute('data-original-title', 'Remover este filtro');
				$link->append('<i class="fa fa-minus"></i>');
				$filter->find('.input-group-addon')->getFirst()->before($link);
			}
			else
			{
				$filter = $this->find('.js-filter')->getFirst();
			}

			$selects = $filter->find('select', 'HtmlSelect');
			$selects->item(0)->setValue($field);
			$selects->item(1)->setValue($data['conditions'][$i]);
			$selects->item(2)->setValue($data['operators'][$i]);
			$filter->find('input')->getFirst()->setAttribute('data-value', $data['values'][$i]);
		}

		$this->setAttribute('data-state-saved', true);
	}

	/**
	 * Salva as definições dos filtros na sessão para posterior recuperação. Os
	 * filtros são automaticamente recuperados da requisição HTTP atual.
	 *
	 * Se o usuário não tiver permissão para usar os filtros ou nenhum filtro
	 * estiver presente na requisição atual, o filtro será removido da sessão.
	 * @param string $name Nome que será usado para recuperar os filtros salvos.
	 * @static
	 * @author Diego Andrade
	 */
	public static function saveState($name)
	{
		$request = CurrentHttpRequest::getInstance();
		$filterField = $request->hasGetParam('campo') ? $request->getGetParam('campo') : null;
		$filterCondition = $request->hasGetParam('condicao') ? $request->getGetParam('condicao') : null;
		$filterValue = $request->hasGetParam('valor') ? $request->getGetParam('valor') : null;
		$filterOperator = $request->hasGetParam('operador') ? $request->getGetParam('operador') : null;

		if(!empty($filterField))
		{
			Session::set($name, array(
				'fields' => $filterField,
				'conditions' => $filterCondition,
				'values' => $filterValue,
				'operators' => $filterOperator
			));
		}
		else
		{
			Session::remove($name);
		}
	}

	/**
	 * Adiciona um novo componente de filtro.
	 * @return FilterComponent Retorna o componente adicionado.
	 * @author Diego Andrade
	 */
	protected function addFilter()
	{
		$filter = new FilterComponent;
		$this->find('#js-filters > div > div')->getFirst()->append($filter);
		return $filter;
	}

	/**
	 * Gera um arquivo para exportação contendo os dados da tabela
	 * <code>$table</code>.
	 *
	 * O arquivo é gerado de acordo com o parâmetro
	 * <code>$exportFileType</code>, podendo ser um CSV ou Excel (xlsx). O
	 * arquivo será salvo na pasta indicada em <code>$dirPath</code> e o
	 * resultado do processamento será guardado no objeto <code>$result</code>
	 * para ser usado na resposta Ajax.
	 * @param string $baseFileName Nome base do arquivo que será gerado.
	 * @param string $dirPath Caminho do diretório temporário onde o arquivo
	 * será salvo.
	 * @param string $baseUrl Caminho base (nome do controller) para montar a
	 * URL de onde o arquivo poderá ser acessado e baixado.
	 * @param array $columns Configuração dos campos do relatório. Cada campo é
	 * representado por um array contendo obrigatoriamente os itens
	 * <code>label</code> e <code>name</code>. Também é possível usar outros
	 * campos adicionais como: <code>type</code> - especifica o tipo do campo
	 * para uma formatação adicional; <code>values</code> - array contendo os
	 * possíveis valores para o campo (como no caso do campo Sexo).
	 * @param ModelCriteria $table Objeto responsável pela consulta no banco de
	 * dados.
	 * @param stdClass $result Objeto usado para devolver a resposta ao usuário.
	 * @param string $exportFileType Tipo do arquivo que será gerado:
	 * <code>Type::CSV</code> ou <code>Type::XLSX</code>.
	 * @static
	 */
	public static function exportReport($baseFileName, $dirPath, $baseUrl, array $columns, ModelCriteria $table, stdClass $result, $exportFileType)
	{
		set_time_limit(0);
		$key = Serial::create()->generate();
		$isExcel = $exportFileType == 'excel';
		$length = 1000;
		$total = $table->count();
		$pages = ceil($total / $length);
		$i = 0;
		$table->keepQuery(false);
		$table->setFormatter(ModelCriteria::FORMAT_ON_DEMAND);
		Propel::disableInstancePooling();

		if($isExcel)
		{
			$type = Type::XLSX;
			$ext = 'xlsx';
		}
		else
		{
			$type = Type::CSV;
			$ext = 'csv';
		}

		$tempFileName = "{$baseFileName}-{$key}.{$ext}";
		$writer = WriterFactory::create($type);
		$writer->openToFile($dirPath . $tempFileName);
		$headers = array();

		foreach($columns as $column)
			$headers[] = $column['label'];

		$writer->addRow($headers);

		while(++$i <= $pages)
		{
//			Log::add("Memória usada: ($i/$pages) " . Enviroment::getUsedMemory(), Log::INFO, null, 'default');
			$records = $table->paginate($i, $length);

			if(!$records->isEmpty())
			{
				foreach($records as $record)
				{
					$fileds = array();

					foreach($columns as $column)
					{
						$field = $record[$column['name']];

						if(isset($column['values']) && !empty($field))
						{
							$field = $column['values'][$field];
						}
						elseif(isset($column['type']))
						{
							switch($column['type'])
							{
								case 'date':
									$field = Utils::formatDate($field);
									break;
								default:
									break;
							}
						}

						$fileds[] = Text::toUpper($field);
					}

					$writer->addRow($fileds);
				}
			}

			$records->getResults()->clear();
			$records->getResults()->clearIterator();
			unset($records, $record, $fileds, $field);
		}

		$writer->close();
		unset($writer);

//		Log::add('Exportação finalizada!', Log::INFO, null, 'default');
		$result->url = Enviroment::resolveUrl("~/{$baseUrl}/exportar/{$key}/" . ($isExcel ? 'xlsx' : 'csv')) . "/{$baseFileName}";
		$result->success = true;
	}

	/**
	 * Retorna um array com os filtros que estão disponíveis para exibição.
	 * Estes filtros serão exibidos no componente para o usuário selecionar.
	 * @param array $filtersList Lista contendo todos os filtros, visíveis ou
	 * não.
	 * @param string $fieldName Nome da propriedade do filtro que se deseja
	 * retornar.
	 * @return array Lista de filtros disponíveis para seleção do usuário.
	 * @static
	 */
	public static function getAvailableFilters(array $filtersList, $fieldName)
	{
		$availableFilters = array();

		foreach($filtersList as $i => $filter)
		{
			if($filter['show'])
				$availableFilters[$i] = $filter[$fieldName];
		}

		return $availableFilters;
	}

	/**
	 * Filtra a lista de filtros para retornar um novo array contendo apenas a
	 * propriedade <code>$property</code>, ou seja, reduz o array
	 * multidimensional para um simples array numérico.
	 * @param array $filtersList Lista original dos filtros.
	 * @param string $property Nome da propriedade que será mantida.
	 * @return array Lista final de filtros.
	 * @static
	 */
	public static function getFiltersPropery(array $filtersList, $property)
	{
		$filters = array();

		foreach($filtersList as $i => $filter)
			$filters[$i] = $filter[$property];

		return $filters;
	}
}
?>