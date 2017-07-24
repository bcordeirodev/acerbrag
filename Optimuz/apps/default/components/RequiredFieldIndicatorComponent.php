<?php
/**
 * This file sets a custom component using the Html.Component.HtmlComponent.
 * @version 0.3
 * @package Html
 * @subpackage Component
 */

/**
 * Exibe um ícone informando que determinado campo de formulário é obrigatório.
 * @author Diego Andrade
 * @version 0.1
 */
class RequiredFieldIndicatorComponent extends HtmlComponent
{
	/**
	 * Inicializa uma nova instância do componente.
	 */
	public function __construct()
	{
		parent::__construct('i');
	}

	/**
	 * Inicializa o componente.
	 */
	public function initialize()
	{
		$this->addCssClass('mdi mdi-alert-circle tip m-r-5');
		$this->setAttribute('data-original-title', 'Campo obrigatório');
	}
}
?>