<?php
/**
 * This file contains only a controller.
 * @package control
 * @subpackage page
 */

/**
 * Controle responsável pelo login do sistema.
 * @author Diego Andrade
 * @package control
 * @subpackage page
 */
class LoginController extends DefaultPageController
{
	/**
	 * Exibe a tela de login.
	 */
	public function index()
	{
		if(SystemAccessLogin::hasSession())
			$this->response->redirect(Enviroment::resolveUrl('~/dashboard'));

		$this->view->setTemplate('login');
		$this->view->setHtmlPage('Login');
		$this->view->addResource('~/plugins/jquery-validation/js/jquery.validate.min.js');
		$this->view->addResource('~/plugins/jquery-validation/js/messages_pt-BR.js');
		$this->view->addResource('~/plugins/fullWidthTabs/css/demo.css');
		$this->view->addResource('~/plugins/fullWidthTabs/css/component.css');
		$this->view->addResource('~/plugins/fullWidthTabs/js/cbpFWTabs.js');
		$this->view->addResource('~/js/login.js');
		$this->view->initializePage();
		$this->view->addData('updateNotifications', false);

		try
		{
			$this->callView();
		}
		catch(Error $err)
		{
			Report::sendError($err);
			$this->error();
		}
	}

	/**
	 * Valida as informações de login do usuário. O login pode ser feito através
	 * de requisições CORS vindas do site do PROS.
	 */
	public function entrar()
	{
		if(SystemAccessLogin::hasSession())
			$this->response->redirect(Enviroment::resolveUrl('~/dashboard'));

		$url = Enviroment::resolveUrl('~/login');
		$validator = new Validator('Login');
		$validator->loadPolicy('Login');
		$result = $this->createResult();

		try
		{
			if($validator->validate())
			{
				$username = $validator->getInputValue('usuario');

				$user = UsuarioQuery::create()
					->filterByAtivo(true)
					->findOneByEmail($username);

				if($user)
				{
					if($user->validaSenha($validator->getInputValue('senha')))
					{
						self::_createSession($user, $validator->hasInputValue('persistente'));
						$result->url = Session::exists('goToUrl') ? Session::get('goToUrl') : Enviroment::resolveUrl('~/dashboard');
						Session::remove('goToUrl');

						$result->success = true;
						$result->callback = 'redirect';
					}
					else
					{
						$result->message = 'E-mail ou senha incorretos';
						$result->result = array(
							'usuario' => 'Verifique se o e-mail está correto',
							'senha' => 'Informe sua senha novamente',
						);
					}
				}
				else
				{
					$result->message = 'E-mail ou senha incorretos';
					$result->result = array(
						'usuario' => 'Verifique se o e-mail está correto',
						'senha' => 'Informe sua senha novamente',
					);
				}
			}
			else
			{
				$result->message = 'Corrija os campos e tente novamente';
				$result->result = $validator->getResult();
			}
		}
		catch(Exception $ex)
		{
			$result->message = self::DEFAULT_ERROR_MESSAGE;
			Report::sendError($ex);
		}

		if($this->request->isAjaxRequest())
			$this->sendAjaxResponse($result);
		else
			$this->response->redirect($url);
	}

	/**
	 * Cria a sessão do usuário.
	 * @param Usuario $user Instância do usuário.
	 * @param boolean $isPersistent Informa se a sessão deve ser persistente ou
	 * não.
	 * @return SystemAccessLogin Objeto de login do usuário.
	 * @static
	 */
	public static function _createSession(Usuario $user, $isPersistent)
	{
		$login = new SystemAccessLogin($user->getEmail());
		$login->setValue('userId', $user->getId());
		$login->setValue('userName', $user->getNome());
		$login->setRole($user->getPerfilId());
		$permisssions = $user->getPerfil()->getPermissaos();

		foreach($permisssions as $permission)
			$login->addPermission(new SystemAccessPermission($permission->getId(), $permission->getSlug()));

		if($isPersistent)
		{
			$persistence = new SystemAccessPersistence();
			$persistence->setData($user->getId());
			$due = Date::get();
			$due->addDay(30);
			$persistence->setTime($due);
			$login->setPersistence($persistence);
		}

		$login->save();

		Auditoria::adicionar('Usuário fez login', Auditoria::LEVEL_INFO, $user, $user->getNome(), Auditoria::TIPO_USUARIO);

		return $login;
	}

	/**
	 * Dispara um e-mail de recuperação de senha.
	 */
	public function recuperarSenha()
	{
		if(SystemAccessLogin::hasSession())
			$this->response->redirect(Enviroment::resolveUrl('~/dashboard'));

		$validator = new Validator();
		$validator->loadPolicy('RecuperarSenha');
		$result = $this->createResult();

		try{
			if($validator->validate())
			{
				$email = $validator->getInputValue('email');
				$user = UsuarioQuery::create('u')
					->filterByAtivo(true)
					->findOneByEmail($email);

				if($user)
					$this->alterarSenhaUsuario($user, $result);
				else
					Report::sendError(new Error("Tentativa de recuperação de senha mal sucedida (e-mail inválido): {$email}"));

				$result->success = true;
				$result->message = 'Pronto! Se houver um usuário cadastrado com este e-mail, você receberá uma nova senha. Confira sua caixa de entrada (ou spam).';
			}
			else
			{
				$result->message = 'Corrija os campos e tente novamente';
				$result->result = $validator->getResult();
			}
		}
		catch(Exception $ex)
		{
			$result->message = self::DEFAULT_ERROR_MESSAGE;
			Report::sendError($ex);
		}

		if($this->request->isAjaxRequest())
			$this->sendAjaxResponse($result);
		else
			$this->response->redirect('~/login');
	}

	/**
	 * Encerra a sessão do usuário.
	 */
	public function sair()
	{
		if(SystemAccessLogin::hasSession())
		{
			$user = Usuario::atual();
			SystemAccessLogin::getCurrent()->close();
			Session::clear();
			Auditoria::adicionar('Usuário fez logoff', Auditoria::LEVEL_INFO, $user, $user->getNome(), Auditoria::TIPO_USUARIO);
		}

		$this->response->redirect(Enviroment::resolveUrl('~/login'));
	}

	/**
	 * Cadastra um novo usário no sistema.
	 * @author Bruno Cordeiro
	 */
	public function cadastrarUsuario()
	{
		$result = $this->createResult();
		$validator = new Validator;
		$validator->loadPolicy('CadastrarUsuario');

		if($validator->validate())
		{
			$name			= $validator->getInputValue('nome-completo');
			$cpf			= Utils::getJustNumber($validator->getInputValue('cpf'));
			$rg				= Utils::getJustNumber($validator->getInputValue('rg'));
			$email			= $validator->getInputValue('email');
			$cellphone		= Utils::getJustNumber($validator->getInputValue('celular'));
			$password		= $validator->getInputValue('cadastro-senha');
			$typeClient		= $validator->getInputValue('tipo-cliente');

			try
			{
				$hasRegister = UsuarioQuery::create()
					->filterByEmail($email)
					->_or()
					->filterByCpf($cpf)
					->find()
					->count();

				if($hasRegister == 0)
				{
					$user = new Usuario;
					$user->setNome($name);
					$user->setEmail($email);
					$user->setSenha(Utils::encrypt($password));
					$user->setPerfilId($typeClient);
					$user->setDataCadastro(time());
					$user->save();

					/*
					 * Após o usuário ser salvo os tokens são gerados.
					 */
					$user->gerarToken();
					$user->gerarTokenSenha();

					if($typeClient == Perfil::PERFIL_ADVOGADO)
					{
						$advogado = new Advogado;
						$advogado->setUsuario($user);
						$advogado->setNome($name);
						$advogado->setCpf($cpf);
						$advogado->setRg($rg);
						$advogado->setEmail($email);
						$advogado->setCelular($cellphone);
						$advogado->save();
					}
					else
					{
						$cliente = new Cliente;
						$cliente->setNome($name);
						$cliente->setEmail($email);
						$cliente->setCelular($cellphone);
						$cliente->setCpf($cpf);
						$cliente->setRg($rg);
						$cliente->setCadastroValido(true);
						$cliente->setUsuarioId($user->getId());
						$cliente->save();
					}

					self::_createSession($user, true);

					$result->message = 'Cadastro efuado com sucesso!';
					$result->type = 'success';
					$result->success = true;
				}
				else
				{
					$result->message = 'O CPF ou o e-mail informado já está cadastrado em nosso sistema!';
					$result->type = 'info';
				}
			}
			catch(Exception $ex)
			{
				Report::sendError($ex);
				$result->message = self::DEFAULT_ERROR_MESSAGE;
				$result->type = 'error';
			}
			catch(PropelException $error)
			{
				Report::sendError($error);
				$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
				$result->type = 'error';
			}
		}
		else
		{
			$result->result = $validator->getResult();
		}

		$this->sendAjaxResponse($result);
	}
}
?>
