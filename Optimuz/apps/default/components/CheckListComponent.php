<?php
/**
 * This file sets a custom component using the Html.Component.HtmlComponent.
 * @version 0.3
 * @package Html
 * @subpackage Component
 */

/**
 * Exibe uma caixa para seleção de vários itens do tipo checkbox.
 * @author Diego Andrade
 * @version 0.1
 */
class CheckListComponent extends HtmlComponent
{
	/**
	 * Define a fonte de onde os checkboxes serão criados, e o nome usado para
	 * indentificá-los no formulário.
	 * @param mixed $source Fonte dos dados do checkbox (array ou coleção com
	 * dados do banco de dados).
	 * @param string $name Nome dos checkboxes no formulário.
	 */
	public function setSource($source, $name)
	{
		$this->addCssClass('checklist');
		$id = Text::slug($name);
		$showSlugs = $this->getAttribute('data-show-slugs') == 'true';

		foreach($source as $item)
		{
			$slugInfo = $showSlugs ? " data-original-title='{$item->getSlug()}'" : '';
			$slugClass = '';

			if(Usuario::atual()->getAtivo())
			{
				$slugClass = 'm-b-0';
				$span = "<span class='small-text display-block p-l-20 m-l-5 m-b-10 text-muted'>Nível {$item->getNivel()}</span>";
			}
			else
			{
				$span = '';
			}

			$slugClass .= $showSlugs ? ' tip' : '';
			$this->append(
				"<div class='control-group col-md-6'>
					<div class='checkbox check-success'>
						<input type='checkbox' name='{$name}' id='{$id}-{$item->getId()}' value='{$item->getId()}'>
						<label for='{$id}-{$item->getId()}'{$slugInfo} class='{$slugClass}'>{$item->getNome()}</label>
						{$span}
					</div>
				</div>"
			);
		}
	}
}
?>