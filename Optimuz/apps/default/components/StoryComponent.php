<?php
/**
 * This file sets a custom component using the Html.Component.HtmlComponent.
 * @version 0.3
 * @package Html
 * @subpackage Component
 */

/**
 * Exibe uma história na página de histórico.
 * @author Diego Andrade
 * @version 0.1
 */
class StoryComponent extends HtmlComponent
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
		if(!is_null($index))
			$this->index = $index;

		parent::__construct('li');
	}

	/**
	 * Inicializa o componente.
	 */
	protected function initialize()
	{
		parent::initialize();

		if(is_null($this->index))
			$this->index = ++self::$count;

		$this->append(
			'<time class="cbp_tmtime" datetime=""></time>
			<div class="cbp_tmicon animated bounceIn"></div>
			<div class="cbp_tmlabel">
				<div class="p-t-15 p-l-30 p-r-20 p-b-20 xs-p-r-10 xs-p-l-10 xs-p-t-5">
					<h4 class="inline no-margin"><span class="text-warning semi-bold"></span></h4>
					<h5 class="inline muted semi-bold no-margin"></h5>
					<div class="muted m-t-5"></div>
					<div class="m-t-10 dark-text"></div>
				</div>
			</div>'
		);
	}

	/**
	 * Popula os campos do componente com base no objeto Pessoa.
	 * @param Auditoria $story Objeto que será usado para popular o componente.
	 */
	public function populateObject(Auditoria $story, $icon = null)
	{
		$this->populate($story->getMensagem(), $story->getObservacao(), $story->getData(), $story->getUsuario(), $icon);
	}

	/**
	 * Popula os campos do componente com base no objeto Pessoa.
	 * @param string $title Título da história.
	 * @param string $message Mensagem da história.
	 * @param mixed $date Data da história. Pode ser qualquer formato aceito por
	 * <code>Date::parse()</code>.
	 * @param Usuario $user (opcional) Usuário que gerou a história.
	 * @param string $icon (opcional) Ícone de apresentação da história. Se não
	 * for informado, será usada a imagem do usuário. Se o usuário não for
	 * informado, será usado o ícone padrão para indicar uma ação do sistema.
	 */
	public function populate($title, $message, $date, Usuario $user = null, $icon = null)
	{
		/*
		 * Data e hora
		 */
		$day = null;

		$oDate = Date::parse($date);
		$diff = Date::diff($oDate, Date::get());

		if($diff->getDays() < 1)
		{
			if($oDate->getDay() == date('d'))
				$day = 'Hoje';
			else
				$day = 'Ontem';
		}
		elseif($diff->getDays() < 2)
		{
			$day = 'Ontem';
		}
		else
		{
			$day = $oDate->getDate('d/m/Y');
		}

		$tmtime = $this->find('.cbp_tmtime')->getFirst();
		$tmtime->setAttribute('datetime', $oDate->getDate('Y/m/d H:i:s'));
		$tmtime->html(
			'<span class="date">' . $day . '</span>'
			. '<span class="time semi-bold">' . $oDate->getDate('H:i') . '</span>'
		);

		$timeLabel = $this->find('h5 + div')->getFirst();
		$timeLabel->html(Utils::getDateFormatted($oDate));
		$timeLabel->setAttribute('title', $oDate->getDate('H:i:s \d\e d/m/Y'));

		/*
		 * Ícone
		 */
		$tmicon = $this->find('.cbp_tmicon')->getFirst();

		if(empty($icon) && !empty($user))
			$icon = $user->getImagem('perfil-p', true);

		if(!empty($icon))
		{
			$tmicon->html('<div class="user-profile"><img src="' . $icon . '" data-src="' . $icon . '" data-src-retina="' . $icon . '" alt=""></div>');
		}
		else
		{
			$tmicon->addCssClass('info');
			$tmicon->html('<i class="fa fa-quote-left"></i>');
		}

		/*
		 * Título
		 */
		$this->find('h4 span')->getFirst()->html($title);

		if(!empty($user))
			$this->find('h5')->getFirst()->html("por <span class='tip cursor-help' title='{$user->getEmail()}'>{$user->getNome()}</span>");

		/*
		 * Texto
		 */
		$this->find('.dark-text')->getFirst()->html($message);
	}
}
?>