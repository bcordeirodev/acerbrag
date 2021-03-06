<?php
/**
 * This file sets a custom component using the Html.Component.HtmlComponent.
 * @version 0.3
 * @package Html
 * @subpackage Component
 */

/**
 * Exibe um checkbox que pode ser usado para marcar/desmarcar todas as linhas de
 * uma tabela.
 * @author Diego Andrade
 * @version 0.1
 */
class CheckAllComponent extends HtmlComponent
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
		parent::__construct('span');
		
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
		$this->addCssClass('checkbox check-default');
		$this->append(
			'<input type="checkbox" id="js-check-all-' . $this->index . '" class="check-all">
			<label class="v-align-top" for="js-check-all-' . $this->index . '"></label>'
		);
	}
}