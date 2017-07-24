<?php
/**
 * This file sets a custom component using the Html.Component.HtmlComponent.
 * @version 0.3
 * @package Html
 * @subpackage Component
 */

/**
 * Exibe um grupo de botões. Este componente é concebido para ser usado
 * primariamente em tabelas.
 * @author Diego Andrade
 * @version 0.1
 */
class ButtonGroupComponent extends HtmlComponent
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
		$this->addCssClass('btn-group');
		$links = array();
		
		foreach($this->childNodes as $child)
		{
			if($child->nodeType == 1)
				$links[] = $child->cloneNode(true);
		}
		
		$this->clear();
		$this->append(
			'<a href="javascript:;" class="btn dropdown-toggle btn-white btn-small disabled" data-toggle="dropdown"><i class="fa fa-bolt m-r-5"></i> Ações <span class="caret"></span></a>
			<ul class="dropdown-menu"></ul>'
		);
		
		if(!empty($links))
		{
			$list = $this->find('.dropdown-menu')->getFirst();
			
			foreach($links as $link)
			{
				$item = new HtmlElement('li');
				$item->append($link);
				$list->append($item);
			}
		}
	}
}
?>