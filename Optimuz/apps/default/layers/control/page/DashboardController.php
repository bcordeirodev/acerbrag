<?php
/**
 * This file contains only a controller.
 * @package control
 * @subpackage page
 */

/**
 * Default controller, called to display the application home page.
 * @author Diego Andrade
 * @package control
 * @subpackage page
 */
class DashboardController extends DefaultPageController
{
	/**
	 * Exibe a página inicial.
	 */
	public function index()
	{
		$this->view->setHtmlPage('Dashboard');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');
		$this->view->addResource('~/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js');
		$this->view->addResource('~/plugins/bootstrap-datepicker/css/datepicker.css');
		$this->view->addResource('~/plugins/jquery-sparkline/jquery-sparkline.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('https://www.gstatic.com/charts/loader.js');
		$this->view->addResource('~/js/dashboard.js');
		$this->view->initializePage();
		$this->setActiveMenuItem('Dashboard');

		try
		{
			$this->callView();
		}
		catch(Error $error)
		{
			Report::sendError($error);
			$this->error($error);
		}
	}

	/**
	 * Encerra a sessão do usuário atual e inicia uma sessão para o usuário
	 * passado. Este método serve apenas para fins administrativos e só pode ser
	 * acessado pelos usuáiros indicados.
	 * @param ArrayList $params Array de parâmetros recebidos na requisição. O
	 * ID do usuário é o primeiro item no array. O segundo parâmetro é usado
	 * para indicar se o ID do usuário atual deve ser preservado na sessão do
	 * próximo usuário. Isso serve para criar o botão usado para restaurar a
	 * sessão do usuário atual. Se o valor for 'f', o ID do usuário atual não
	 * será preservado e não será possível retornar a sua sessão sem sair e
	 * entrar novamente no sistema.
	 */
	public function trocarUsuario(ArrayList $params = null)
	{
		try
		{
			if($this->canChangeUser())
			{
				if(ArrayList::isValid($params) && !$params->isEmpty())
				{
					if(!SystemAccessLogin::getCurrent()->getValue('previousUser') || (SystemAccessLogin::getCurrent()->getValue('previousUser') == $params[0]))
					{
						$user = UsuarioQuery::create()->findPk($params[0]);

						if($user)
						{
							SystemAccessLogin::getCurrent()->close();
							$isComingBack = $params->offsetExists(1) && ($params[1] == 'f');
							$login = LoginController::_createSession($user, $isComingBack);

							if(!$isComingBack)
							{
								$login->setValue('previousUser', $this->userId);
								$login->save();
							}

							$this->response->redirect(Enviroment::resolveUrl('~/dashboard'));
						}
						else
						{
							throw new Error("Tentativa de troca de usuário: usuário {$params[0]} não localizado.");
						}
					}
					else
					{
						throw new Error('Tentativa de troca de usuário: já existe uma sessão trocada em andamento para o usuário ' . SystemAccessLogin::getCurrent()->getValue('previousUser'));
					}
				}
				else
				{
					$this->pageNotFound();
				}
			}
			else
			{
				throw new Error("Tentativa de troca de usuário: usuário {$this->userId} não tem permissão para troca.");
			}
		}
		catch(PropelException $error)
		{
			Report::sendError($error);
		}
		catch(Error $error)
		{
			Report::sendError($error);
		}

		$this->pageNotFound();
	}
}
?>
