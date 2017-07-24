<?php
/**
 * This file sets a custom component using the Html.Component.HtmlComponent.
 * @version 0.3
 * @package Html
 * @subpackage Component
 */

/**
 * Exibe um seletor de data.
 * @author Diego Andrade
 * @version 0.1
 */
class DateSelectComponent extends HtmlComponent
{
	/**
	 * Inicializa uma nova instância do componente.
	 */
	public function __construct()
	{
		parent::__construct('div');
	}
	
	/**
	 * Inicializa o componente.
	 */
	public function initialize()
	{
		static $addedResources = false;
		
		if(!$addedResources)
		{
			$addedResources = true;
			$view = CurrentHttpRequest::getController()->getView();
			$view->addResource('~/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');
			$view->addResource('~/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js');
			$view->addResource('~/plugins/bootstrap-datepicker/css/datepicker.css');
		}
		
		$this->addCssClass('input-group');
		
		$input = new HtmlInput('text');
		$input->addCssClass('form-control span12 js-date');
		$input->setAttribute('placeholder', 'dd/mm/aaaa');
		$input->setAttribute('name', $this->getAttribute('name'));
		$this->removeAttribute('name');
		$input->setAttribute('id', $this->getAttribute('id'));
		$this->removeAttribute('id');
		$this->append($input);
		
		$icon = new HtmlElement('span');
		$icon->addCssClass('input-group-addon success');
		$icon->append('<span class="arrow"></span><i class="fa fa-calendar"></i>');
		$this->append($icon);
	}
}
?>