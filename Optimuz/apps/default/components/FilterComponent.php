<?php
/**
 * This file sets a custom component using the Html.Component.HtmlComponent.
 * @version 0.3
 * @package Html
 * @subpackage Component
 */

/**
 * Exibe os campos de filtro para uma tabela dinâmica.
 * @author Diego Andrade
 * @version 0.1
 */
class FilterComponent extends HtmlComponent
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
		$this->addCssClass('row js-filter');
		$this->append(
			'<div class="form-group col-md-3">
				<div class="controls">
					<select name="campo[]" class="no-padding col-md-12 js-select-filter" data-controller="' . CamelCase::toDashes(CurrentHttpRequest::getController()->getControllerName()) . '"></select>
				</div>
			</div>
			<div class="form-group col-md-2">
				<div class="controls">
					<select name="condicao[]" class="no-padding col-md-12">
						<option value="3">Contém</option>
						<option value="4">Não contém</option>
						<option value="1">Igual a</option>
						<option value="2">Diferente de</option>
						<option value="5">Começa com</option>
						<option value="6">Termina com</option>
						<option value="7">Maior que</option>
						<option value="8">Maior ou igual que</option>
						<option value="9">Menor que</option>
						<option value="10">Menor ou igual que</option>
					</select>
				</div>
			</div>
			<div class="form-group col-md-5">
				<div class="controls">
					<input type="text" name="valor[]" class="form-control" placeholder="Insira um valor">
				</div>
			</div>
			<div class="form-group col-md-2">
				<div class="controls input-group">
					<select name="operador[]" class="no-padding col-md-12">
						<option value="1">E</option>
						<option value="2">Ou</option>
					</select>
					<a href="javascript:;" class="input-group-addon tip js-add-filter" data-original-title="Adicionar um novo filtro"><i class="fa fa-plus"></i></a>
				</div>
			</div>'
		);
	}
	
	/**
	 * Popula o campo de seleção de campos com base no array passado.
	 * @param array $fields Lista dos campos que poderão ser usados para filtrar
	 * a tabela.
	 */
	public function populate(array $fields)
	{
		if(!empty($fields))
		{
			$select = $this->getElementsByTagName('select')->item(0)->toType('HtmlSelect');
			
			foreach($fields as $i => $name)
				$select->addOption($i, $name);
		}
	}
	
	/**
	 * Retorna o operador correto para a condição passada.
	 * @param int $index Índice da condição. Os valores válidos são:
	 * <ul>
	 * <li>1 - Igual</li>
	 * <li>2 - Diferente</li>
	 * <li>3 - Contém</li>
	 * <li>4 - Não contém</li>
	 * <li>5 - Começa com</li>
	 * <li>6 - Termina com</li>
	 * <li>7 - Maior que</li>
	 * <li>8 - Maior ou igual que</li>
	 * <li>9 - Menor que</li>
	 * <li>10 - Menor ou igual que</li>
	 * </ul>
	 * @return string Operador SQL.
	 * @static
	 */
	public static function getCondition($index)
	{
		switch($index)
		{
			case 1:
				$condition = Criteria::EQUAL;
				break;
			case 2:
				$condition = Criteria::NOT_EQUAL;
				break;
			case 3:
			case 5:
			case 6:
				$condition = Criteria::LIKE;
				break;
			case 4:
				$condition = Criteria::NOT_LIKE;
				break;
			case 7:
				$condition = Criteria::GREATER_THAN;
				break;
			case 8:
				$condition = Criteria::GREATER_EQUAL;
				break;
			case 9:
				$condition = Criteria::LESS_THAN;
				break;
			case 10:
				$condition = Criteria::LESS_EQUAL;
				break;
		}
		
		return $condition;
	}
	
	/**
	 * Retorna o operador correto para a condição passada.
	 * @param int $index Índice da condição. Os valores válidos são:
	 * <ul>
	 * <li>1 - Igual</li>
	 * <li>2 - Diferente</li>
	 * <li>3 - Contém</li>
	 * <li>4 - Não contém</li>
	 * <li>5 - Começa com</li>
	 * <li>6 - Termina com</li>
	 * <li>7 - Maior que</li>
	 * <li>8 - Maior ou igual que</li>
	 * <li>9 - Menor que</li>
	 * <li>10 - Menor ou igual que</li>
	 * </ul>
	 * @param array $conditions Lista das condições possíveis.
	 * @param array $values Lista dos valores passados para o filtro.
	 * @return string Valor preparado para a consulta SQL.
	 * @static
	 */
	public static function getValueForCondition($index, array $conditions, array $values)
	{
		$value = '';
		
		switch($conditions[$index])
		{
			case 3:
			case 4:
				$value = "%{$values[$index]}%";
				break;
			case 5:
				$value = "{$values[$index]}%";
				break;
			case 6:
				$value = "%{$values[$index]}";
				break;
			default:
				$value = $values[$index];
				break;
		}
		
		return $value;
	}
}
?>