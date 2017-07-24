<?php
/**
 * This file sets a custom component using the Html.Component.HtmlComponent.
 * @version 0.3
 * @package Html
 * @subpackage Component
 */

/**
 * Exibe uma mensagem de erro.
 * @author Diego Andrade
 * @version 0.1
 */
class ErrorComponent extends MessageComponent
{
	/**
	 * Initializes the setting of the element.
	 */
	protected function initialize()
	{
		parent::initialize();
		$this->append(
			'<div class="alert alert-block alert-error fade in">
				<button type="button" class="close" data-dismiss="alert"></button>
				<h4 class="alert-heading"><i class="fa fa-warning"></i> Erro!</h4>
				<p></p>
			</div>'
		);
	}

	/**
	 * Define o título do erro.
	 * @param string $title Texto para o título (pode conter HTML).
	 */
	public function setTitle($title)
	{
		$this->find('h4')->append($title);
	}

	/**
	 * Define a mensagem do erro.
	 * @param mixed $message Pode ser uma string ou um HtmlElement.
	 */
	public function setMessage($message)
	{
		$message = !is_object($message) ? new HtmlText($message) : $message;
		$this->lastChild->appendChild($message);
	}
}
?>