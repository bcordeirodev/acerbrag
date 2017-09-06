<?php
/**
 * This file contains only a view.
 * @version 0.1
 * @package View
 */

/**
 * Default view for all pages.
 * @author Diego Andrade
 * @package View
 * @since Optimuz 0.3
 * @version 0.1
 */
class DefaultPageView extends DefaultView
{
	/**
	 * Creates a new view instance.
	 * @param DefaultController $controller (optimal) Controller related to this
	 * view.
	 */
	public function __construct(DefaultController $controller = null)
	{
		/** super class initialization */
		parent::__construct($controller);

		$this->setMetaTag('robots', 'follow');
		$this->setMetaTag('rating', 'general');
		$this->setMetaTag('imagetoolbar', 'no', true);
	}

	/**
	 * Analisa o conteúdo da view carregando-o no objeto global de HtmlDocument.
	 * @param array $params (opcional) Parâmetros enviados para a view.
	 * @return bool
	 * @throw ViewError
	 */
	public function initializePage(array $params = null)
	{
		if(is_null($params))
			$params = array();

		$params['pageDescription'] = $this->description;
		$params['baseURL'] = $this->controller->getApplication()->getBaseUrl();
		$params['lang'] = $this->controller->getLang();

		return parent::initializePage($params);
	}

	/**
	 * Exibe o nome do usuário logado na view.
	 * @param HtmlElement $element Elemento onde o nome será exibido.
	 */
	public function setNomeUsuario(HtmlElement $element)
	{
		if(SystemAccessLogin::hasSession())
		{
			if(($user = Usuario::atual()))
			{
				$name = Text::split(' ', Text::toLower($user->getNome()));
				$saida = '';

				foreach($name as $nome) {

					if ($nome == "de" || $nome == "da" || $nome == "e" || $nome == "dos" || $nome == "do")
						$saida .= $nome.' ';
					else
						$saida .= ucfirst($nome).' ';
				}

				$element->html($saida);
			}
		}
	}

	/**
	 * Exibe a imagem do usuário logado na view.
	 * @param HtmlImage $element Imagem que será atualizada para exibir a imagem
	 * de perfil do usuário.
	 */
	public function setImagemUsuario(HtmlImage $element)
	{
		if(SystemAccessLogin::hasSession())
		{
			if(($user = Usuario::atual()))
			{
//				$img = ($element->parentNode->parentNode->getAttribute('class') == 'profile-wrapper') || ($element->parentNode->getAttribute('class') == 'profile-wrapper') ? 'perfil' : 'perfil-p';
				$img = 'perfil';
				$src = $user->getImagem($img, true);
				$src2x = $src;
				//$src2x = Enviroment::resolveUrl("~/resource/default/img/usuarios/{$user->getId()}/{$img}2x.jpg");
				$element->setSrc($src);
				$element->setAttribute('data-src', $src);
				$element->setAttribute('data-src-retina', $src2x);
			}
		}
	}

	/**
	 * Configura a view assim que o elemento body estiver disponível.
	 * @param HtmlElement $body Body da página.
	 */
	public function onCreateBody(HtmlElement $body)
	{
		if(Session::get('menuColapsed'))
		{
			$body->find('#main-menu')->getFirst()->addCssClass('mini');
			$body->find('.page-content')->getFirst()->addCssClass('condensed');
			$body->find('.scrollup')->getFirst()->addCssClass('to-edge');
			$body->find('.header-seperation')->getFirst()->setAttribute('style', 'display: none');
		}

			$removePrevLoginLink = true;

		if(SystemAccessLogin::hasSession())
		{
			if(($previousUser = SystemAccessLogin::getCurrent()->getValue('previousUser')))
			{
				$removePrevLoginLink = false;
				HtmlDocument::getById('prev-login-link')->toType('HtmlLink')->setUrl("~/dashboard/trocar-usuario/{$previousUser}/f");
			}

			HtmlDocument::getById('rule-profile')->append(Usuario::atual()->getPerfil()->getNome());
		}

		if($removePrevLoginLink)
			HtmlDocument::getById('prev-login-link')->remove();
	}

	/**
	 * Cria o menu principal. O menu será carregado de acordo com o nível de
	 * acesso do usuário logado.
	 * @param MenuComponent $menu O componente HTML do menu.
	 */
	public function onMenuCreate(AppMenuComponent $menu)
	{
		$menu->load('default.xml');
	}

	/**
	 * Cria uma lista de permissões.
	 * @param CheckListComponent $chekList Componente HTML que renderizará a
	 * lista.
	 */
	public function onCreatePermissionsList(CheckListComponent $chekList)
	{
		$chekList->setSource(PermissaoQuery::getDisponiveis()->orderByNivel()->orderByNome()->find(), 'permissoes[]');
	}

	/**
	 * Cria uma lista de permissões do perfil.
	 * @param CheckListComponent $chekList Componente HTML que renderizará a
	 * lista.
	 */
	public function onCreatePermissionsListProfile(CheckListComponent $chekList)
	{
		$currentUser = Usuario::atual();
		$chekList->setSource($currentUser->getPerfil()->getPermissaos(), 'permissoes[]');
	}
}
?>