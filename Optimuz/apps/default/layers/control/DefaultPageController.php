<?php
/**
 * This file contains only a controller.
 * @version 0.2
 * @package Controller
 */

/**
 * Default controller for all pages.
 * @author Diego Andrade
 * @package Controller
 * @version 0.2
 */
class DefaultPageController extends DefaultController
{
	/**
	 * Mensagem de erro padrão apresentada ao usuário.
	 */
	const DEFAULT_ERROR_MESSAGE = 'Que coisa! Ocorreu um erro. Tente fazer a operação novamente.';

	/**
	 * Mensagem de erro padrão apresentada ao usuário para erros de banco de
	 * dados.
	 */
	const DEFAULT_DATABASE_ERROR_MESSAGE = 'Ocorreu um erro com o banco de dados. Tente novamente.';

	/**
	 * Mensagem de erro padrão apresentada ao usuário para erros de permissão.
	 */
	const DEFAULT_PERMISSION_ERROR_MESSAGE = 'Você não tem permissão para executar esta ação.';

	/**
	 * Mensagem de erro padrão apresentada ao usuário que não está associado a nenhuma conta.
	 */
	const DEFAULT_ACCOUNT_ERROR_MESSAGE = 'Desculpe, mas você não pode gerenciar conteúdo sem estar associado a uma conta.';

	/**
	 * Markup used to write the template and view. It is defined it the
	 * global/local configuration under the section page.markup.
	 * @var string
	 */
	protected $markup				= null;

	/**
	 * ID do usuário atual.
	 * @var int
	 */
	protected $userId				= null;

	/**
	 * Initializes the default properties and loads resources files, like CSS
	 * and JS.
	 */
	public function __construct()
	{
		parent::__construct();

		$this->markup = LocalConfiguration::get('page.markup');
		$user = Usuario::atual();

		// view setting
		if(is_null($this->view))
			$this->setView('DefaultPage');

		$this->view->setTitle(LocalConfiguration::get('page.title'));

		// template setting
		$this->view->setTemplate($this->markup);

		// view data
		$this->view->addData('baseUrl', $this->application->getBaseUrl());

		// resources settings
		$this->view->addResource('~/plugins/pace/pace-theme-flash.css');
		$this->view->addResource('~/plugins/jquery-slider/css/jquery.sidr.light.css');
		$this->view->addResource('~/plugins/boostrapv3/css/bootstrap.min.css');
		$this->view->addResource('~/plugins/boostrapv3/css/bootstrap-theme.min.css');
		$this->view->addResource('~/plugins/font-awesome/css/font-awesome.min.css');
		$this->view->addResource('~/plugins/material-design-icons/css/materialdesignicons.min.css');
		$this->view->addResource('~/plugins/bootstrap-select2/select2.css');
		$this->view->addResource('~/css/animate.min.css');
		$this->view->addResource('~/css/style.css');
		$this->view->addResource('~/css/magic_space.css');
		$this->view->addResource('~/css/responsive.css');
		$this->view->addResource('~/css/custom-icon-set.css');
		$this->view->addResource('~/css/app.css');

		$this->view->addResource('~/plugins/jquery-1.8.3.min.js');
		$this->view->addResource('~/plugins/jquery.easing.1.3.js');
		$this->view->addResource('~/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js');
		$this->view->addResource('~/plugins/bootstrap/js/bootstrap.min.js');
		$this->view->addResource('~/plugins/breakpoints.js');
		$this->view->addResource('~/plugins/jquery-unveil/jquery.unveil.min.js');
		$this->view->addResource('~/plugins/jquery-block-ui/jqueryblockui.js');
		$this->view->addResource('~/plugins/jquery-slider/jquery.sidr.min.js');
		$this->view->addResource('~/plugins/jquery-slimscroll/jquery.slimscroll.min.js');
		$this->view->addResource('~/plugins/pace/pace.min.js');
		$this->view->addResource('~/plugins/jquery-lazyload/jquery.lazyload.min.js');
		$this->view->addResource('~/plugins/bootstrap-select2/select2.min.js');
		$this->view->addResource('~/plugins/bootstrap-select2/select2_locale_pt-BR.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/js/lib.js');
//		$this->view->addResource('~/js/core.js');
//		$this->view->addResource('~/js/notifications.js');
		$this->view->addResource('~/js/app.js');

//		$this->view->addData('updateNotifications', true);

		// recupera os dados da sessão
		if(SystemAccessLogin::hasSession())
		{
			$user = SystemAccessLogin::getCurrent();
			$this->userId = $user->getValue('userId');
//			$this->view->setTemplate("{$user->getRole()->getName()}");
		}

		try
		{
			$sessionController = "{$this->getControllerName()}SessionController";
			Load::controller("Session.{$sessionController}", false);
			$this->session = new $sessionController($this->getControllerName());
		}
		catch(Exception $error)
		{
			if($error->getCode() !== File::NOT_EXISTS)
			{
				Report::sendError($error);
				$this->error();
			}
			else
			{
				$this->session = new DefaultSessionController($this->getControllerName());
			}
		}
	}

	/**
	 * This is the default method. It acts exactly like an index file inside a
	 * web directory. If no method is specified, this one will be called.
	 *
	 * This method must be overloaded in the sub classes, and any parameters
	 * must be specified too.
	 *
	 * If this method is not overloaded an Error will be thrown.
	 * @uses Error
	 */
	public function index()
	{
		throw new Error(Language::getCurrent()->getSentence('error.methodNotImplemented'), DefaultController::METHOD_NOT_IMPLEMENTED);
	}

	/**
	 * This method is used to handle errors and to show an error page.
	 * @param Error $error (optimal) Error object.
	 * @param mixed $info (optimal) Aditional information that will be passed
	 * to the view.
	 */
	public function error(Error $error = null, $info = null)
	{
		if($this->request->isAjaxRequest())
		{
			$result = $this->createResult();
			$result->message = 'Viiish... Encontramos um erro. Mas não se preocupe, nossa equipe já foi avisada e está trabalhando para que você não veja esta página novamente.';
			$result->type = 'error';
			$this->sendAjaxResponse($result, 500);
		}
		else
		{
			$this->view->setTemplate('error');
			$this->view->setHtmlPage('Error.PageError');
			$this->response->setStatusCode(500);

			// error page variables
			if(is_null($error))
			{
				$error = Error::getLast();

				if(!is_object($error))
					$error = null;
			}

			$this->callErrorPage($error, $info);
		}
	}

	/**
	 * Displays a warning page, about an error not so important.
	 */
	public function warning()
	{
		if($this->request->isAjaxRequest())
		{
			$result = $this->createResult();
			$result->message = 'Ops! Algo inesperado aconteceu. Tente executar sua ação novamente.';
			$result->type = 'error';
			$this->sendAjaxResponse($result);
		}
		else
		{
			$this->view->setHtmlPage('Error.Warning');
			$this->view->setTemplate('error');
			$this->callErrorPage();
		}
	}

	/**
	 * This method is called to handle controllers not found.
	 * @param Error $error Error object.
	 * @param mixed $info Additional information that will be passed to the
	 * view.
	 */
	public function pageNotFound(Error $error = null, $info = null)
	{
		if($this->request->isAjaxRequest())
		{
			$result = $this->createResult();
			$result->message = 'A página que você procura não está aqui';
			$result->type = 'error';
			$this->sendAjaxResponse($result, 404);
		}
		else
		{
			$this->view->setHtmlPage('Error.PageNotFound');
			$this->view->setTemplate('error');
			$this->response->setStatusCode(404);
			$this->callErrorPage($error, $info);
		}
	}

	/**
	 * Redirects to the login page when there is no active login. Otherwise,
	 * display a 403 error page.
	 * @param Error $error Error object.
	 * @param mixed $info Additional information that will be passed to the
	 * view.
	 */
	public function accessDenied(Error $error = null, $info = null)
	{
		if(!SystemAccessLogin::hasSession())
		{
			$url = Enviroment::resolveUrl('~/login');

			if($this->restoreLogin())
			{
				$url = Session::get('goToUrl');
				Session::remove('goToUrl');
			}

			$this->response->redirect($url);
		}
		else
		{
			if($this->request->isAjaxRequest())
			{
				$result = $this->createResult();
				$result->message = 'Você não tem privilégios suficientes para acessar este recurso';
				$result->type = 'error';
				$this->sendAjaxResponse($result, 403);
			}
			else
			{
				$this->view->setHtmlPage('Error.Unauthorized');
				$this->view->setTemplate('error');
				$this->response->setStatusCode(403);
				$this->callErrorPage($error, $info);
			}
		}
	}

	/**
	 * This method is used to handle errors and to show an error page.
	 * @param Error $error (optimal) Error object.
	 * @param mixed $info (optimal) Aditional information that will be passed
	 * to the view.
	 */
	protected function callErrorPage(Error $error = null, $info = null)
	{
		$params = array();

		if(!is_null($error))
		{
			$errorDescription = Text::toHtml("{$error->getErrorType()} [{$error->getCode()}]: {$error->getMessage()}");
			$errorLine = Text::toHtml($error->getLine());
			$errorFile = $error->getFile();
			$errorTrace = $error->getHtmlStack();

			$params = array(
				'errorDescription' => $errorDescription,
				'errorLine' => $errorLine,
				'errorFile' => $errorFile,
				'errorTrace' => $errorTrace
			);
		}

		if(!is_null($info))
			$params['additionalInfo'] = $info;

		$this->view->addData('updateNotifications', false);
		$this->callView($params);
	}

	/**
	 * Attempts to restore a previous login based on persistence data.
	 * @return bool Returns true if the login is restored, false otherwise.
	 */
	protected function restoreLogin()
	{
		$success = false;

		if(SystemAccessPersistence::canRecover())
		{
			if(($persistence = SystemAccessPersistence::recover()))
			{
				$user = UsuarioQuery::create()->findPk($persistence->getData());

				if($user)
				{
					LoginController::_createSession($user, true);
					$success = true;
				}
			}
		}

		return $success;
	}

	/**
	 * Cria um objeto usado para devolver uma resposta no formato JSON. O objeto
	 * contém as seguintes propriedades: succes, message, type e result.
	 * @return object
	 */
	protected function createResult()
	{
		return (object)array(
			'success' => false,
			'message' => null,
			'type' => '',
			'result' => null
		);
	}

	/**
	 * Envia a resposta Ajax.
	 * @param object $data Objeto JSON que será devolvido para o cliente.
	 * @param int $statusCode Status da resposta. Se não for passado, será 200.
	 */
	protected function sendAjaxResponse($data, $statusCode = null)
	{
		if(!$data->success && !empty($data->result))
		{
			if(is_object($data->result) && ($data->result instanceof ValidationResult))
			{
				$errors = $data->result->getErrors();
				$data->result = array();

				foreach($errors as $error)
					$data->result[$error->getName()] = $error->getErrorMessage();
			}
			else
			{
				$errors = $data->result;
				$data->result = array();

				foreach($errors as $input => $error)
					$data->result[$input] = $error;
			}
		}

		$ajax = AjaxResponse::create(AjaxResponse::TYPE_JSON);
		$ajax->add($data);

		if(!is_null($statusCode))
			$ajax->setStatusCode($statusCode);

		$ajax->send();
	}

	/**
	 * Altera a senha do usuário no banco de dados e a envia por e-mail para o
	 * próprio usuário. O resultado da alteração é passado no objeto
	 * <code>$result</code>.
	 * @param Usuario $usuario Usuário que terá a senha alterada.
	 * @param stdClass $result Objeto que guardará o resultado da alteração.
	 */
	protected function alterarSenhaUsuario(Usuario $usuario, $result)
	{
		try
		{
			$link = $this->application->getBaseUrl();
			$newPassword = Serial::create(10, 1)->generate();
			$message = <<<MSG
<p>Sua senha foi alterada para um valor aleatório. Abaixo segue sua nova senha:</p>
<p>
Login: {$usuario->getEmail()}<br>
Senha: {$newPassword}
</p>
<p>Você pode acessar o sistema com sua nova senha <a href="{$link}">clicando aqui</a>.</p>
MSG;

			if(Utils::sendUserEmail($usuario, 'Nova senha gerada', $message))
			{
				$usuario->setSenha(Utils::encrypt($newPassword));
				$usuario->save();
				$result->success = true;
				$result->type = 'success';
				$result->message = 'Senha alterada com sucesso';

				Auditoria::adicionar('Uma nova senha foi gerada para o usuário', Auditoria::LEVEL_INFO, null, 'A senha foi gerada automaticamente e enviada por e-mail.', Auditoria::TIPO_USUARIO, $usuario->getId());
			}
			else
			{
				$result->message = 'Não foi possível gerar uma nova senha';
				$result->type = 'error';
			}
		}
		catch(PropelException $ex)
		{
			Propel::getConnection()->rollBack();
			Report::sendError(new Error($ex));
			$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
		}
		catch(Error $error)
		{
			Propel::getConnection()->rollBack();
			Report::sendError($error);
			$result->message = self::DEFAULT_ERROR_MESSAGE;
		}
	}

	/**
	 * Define o item do menu que deve aparecer como item ativo.
	 *
	 * O método DefaultView::initializePage() deve ser chamado antes deste
	 * método.
	 * @param string $title Título do item no menu (texto do link).
	 */
	protected function setActiveMenuItem($title)
	{
		if(!Session::get('menuColapsed'))
		{
			$item = HtmlDocument::getCommomDocument()->xpath(".//div[@id='main-menu']//li/a/span[text()='{$title}']");

			if(!$item->isEmpty())
			{
				$item->getFirst()->parentNode->parentNode->addCssClass('active');
				$next = $item->getFirst()->getNextSiblings()->getFirst();

				if($next)
					$next->addCssClass('open');
			}
		}
	}

	/**
	 * Gerencia os contatos de um determinado registro (filiado ou comissão).
	 * Contatos que já não estejam cadastrados serão inseridos, e os que
	 * estiverem mas não forem passados no array $newContacts serão removidos.
	 * @param mixed $record Qualquer objeto que tenha ligação com a tabela de
	 * contatos.
	 * @param PropelCollection $currentContacts Contatos atuais do registro. Se
	 * for passado null, os cantatos atuais serão ignorados.
	 * @param array $newContacts Novos contatos a serem adicionados ao registro.
	 * @param int $contactType Tipo do contato. Pode ser Contato::TELEFONE ou
	 * Contato::EMAIL.
	 * @param stdClass $result Objeto de resultado que guardará uma flag para
	 * indicar se houve algum erro. Erros de validação também serão adicionados
	 * a este objeto.
	 * @return stdClass O objeto $result é retornado.
	 */
	protected function manageContacts($record, $currentContacts, $newContacts, $contactType, $result)
	{
		if(!is_null($currentContacts) && !$currentContacts->isEmpty())
		{
			$i = -1;

			foreach($currentContacts as $currentContact)
			{
				$contact = $currentContact->getContato();

				if($contact->getTipoRegistroId() == $contactType)
				{
					$index = array_search($contact->getTelefoneFormatado(), $newContacts);

					if($index === false)
					{
						$currentContact->delete();
						$contact->delete();
					}
					else
					{
						unset($newContacts[$index]);
					}
				}
			}
		}

		if(is_array($newContacts) && count($newContacts) > 0)
		{
			foreach($newContacts as $i => $contact)
			{
				if($contactType == Contato::TELEFONE)
				{
					if($this->hasPhone($contact))
					{
						if(preg_match('/\d{2} \d{4,5}-\d{4}/', $contact))
						{
							$newContact = new Contato;
							$record->addContato($newContact);
							$newContact->setContato(Text::remove('/\D/', $contact));
							$newContact->setTipoRegistroId(Contato::TELEFONE);
						}
						else
						{
							$result->canSave = false;
							$result->result["telefone-{$i}"] = 'Telefone inválido';
						}
					}
				}
				else
				{
					if(!empty($contact))
					{
						if(filter_var($contact, FILTER_VALIDATE_EMAIL))
						{
							$newContact = new Contato;
							$record->addContato($newContact);
							$newContact->setContato($contact);
							$newContact->setTipoRegistroId(Contato::EMAIL);
						}
						else
						{
							$result->canSave = false;
							$result->result["email-{$i}"] = 'E-mail inválido';
						}
					}
				}
			}
		}

		return $result;
	}

	/**
	 * Verifica se a string não está vazia e se não corresponde a uma máscara de
	 * telefone.
	 * @param string $string
	 * @return boolean
	 */
	protected function hasPhone($string)
	{
		return !empty($string) && ($string != '__ ____-____');
	}

	/**
	 * Envia uma notificação usando a classe Mensagem. A notificação pode ser de
	 * um usuário para outro, ou do sistema para um usuário (quando o remetente
	 * é null).
	 * @param mixed $destinatario Objeto <code>Usuario</code> ou ID de um
	 * usuário do sistema.
	 * @param string $texto Texto da notificação.
	 * @param mixed $remetente (opcional) Objeto <code>Usuario</code> ou ID de
	 * um usuário do sistema. Se for null, a mensagem é considerada do sistema.
	 * O padrão é null.
	 * @param string $link (opcional) Link da notificação.
	 * @param string $titulo (opcional) Título da notificação.
	 * @param boolean $enviarEmail (opcional) Indica se a notificação também
	 * deve ser enviada por e-mail. O padrão é true.
	 * @throws Exception Lança exceções em caso de erros.
	 */
	protected static function enviarNotificacao($destinatario, $texto, $remetente = null, $link = null, $titulo = null, $enviarEmail = true)
	{
		$msg = new Mensagem;

		if(!is_null($remetente))
			$msg->setRemetenteId(is_object($remetente) ? $remetente->getId() : $remetente);

		$msg->setDestinatarioId(is_object($destinatario) ? $destinatario->getId() : $destinatario);
		$msg->setTexto($texto);
		$msg->setData(date('Y-m-d H:i:s'));
		$msg->setLink($link);
		$msg->setTitulo($titulo);
		$msg->save();

		if($enviarEmail)
		{
			if(!is_object($destinatario))
				$destinatario = UsuarioQuery::create()->findPk($destinatario);

			Utils::sendEmail($destinatario->getEmail(), $destinatario->getNome(), $titulo, $texto);
		}
	}

	/**
	 * Verifica se o usuário logado pode assumir a sessão de outro usuário.
	 * @return boolean
	 */
	protected function canChangeUser()
	{
		$currentUser = UsuarioQuery::create()->findPk(SystemAccessLogin::getCurrent()->getValue('previousUser') ? SystemAccessLogin::getCurrent()->getValue('previousUser') : $this->userId);
		return $currentUser->temPermissao('logar-como');
	}

	/**
	 * Retorna o caminho do diretório usado para guardar os arquivos temporários
	 * de relatórios exportados. O diretório será criado caso não exista.
	 * @return string
	 */
	protected function getReportsDir()
	{
		$path = $this->application->getPath('temp') . 'reports/';

		if(!Dir::exists($path))
			Dir::create($path);

		return $path;
	}

	/**
	 * Envia um arquivo para download. O navegador é forçado a baixar um arquivo
	 * ao invés de tentar abrí-lo.
	 *
	 * Se o arquivo não for encontrado ou se houver algum erro, uma página de
	 * erro será exibida.
	 * @param string $filePath Caminho absoluto para o arquivo.
	 */
	protected function downloadFile($filePath)
	{
		$basePath = $this->getReportsDir();

		if(File::exists($basePath . $filePath))
		{
			try
			{
				$tempFile = File::open($basePath . $filePath, true);
				$this->response->setFile($tempFile);
				$this->response->send();
				$tempFile->close();
				File::remove($basePath . $filePath);
				exit;
			}
			catch(Error $error)
			{
				Report::sendError($error);
				$this->error();
			}
		}
		else
		{
			$this->pageNotFound();
		}
	}

	/**
	 * Desativa os elementos de formulário para edição. Os elementos afetados
	 * são: input, select e textarea.
	 * @param string $additionalElements (opcional) Expressão de consulta CSS
	 * de outros elementos, além dos campos de formulário, que também devem ser
	 * desativados (links e botões personalizados por exemplo).
	 * @author Diego Andrade
	 */
	protected function setInputsReadOnly($additionalElements = null)
	{
		foreach(HtmlDocument::find('select') as $input)
			$input->setAttribute('disabled', 'disabled');

		foreach(HtmlDocument::find('input, textarea') as $input)
		{
			if($input->hasCssClass('js-select') || $input->getAttribute('type') == 'radio' || $input->getAttribute('type') == 'checked')
				$input->setAttribute('disabled', 'disabled');
			else
				$input->setAttribute('readonly', 'readonly');
		}

		if(!empty($additionalElements))
		{
			foreach(HtmlDocument::find($additionalElements) as $element)
				$element->setAttribute('disabled', 'disabled');
		}
	}

	/**
	 * Restaura os campos de filtro nas telas de listagem de registros onde o
	 * componente <code>FilterContainerComponent</code> for utilizado.
	 * @param array $fields Campos utilizados para filtro. Podem ser recuperados
	 * através do método
	 * <code>FilterContainerComponent::getAvailableFilters()</code>.
	 * @see FilterContainerComponent::getAvailableFilters()
	 */
	protected function restoreFilterFields(array $fields)
	{
		if(Session::exists("filter{$this->getControllerName()}"))
		{
			$filtersData = Session::get("filter{$this->getControllerName()}");
			HtmlDocument::find('.filter-export-container')->getFirst()->populate($fields, $filtersData);
		}
	}

	/**
	 * Remove os registros passados e retorna um objeto com o resultado.
	 * @param ArrayList $params Lista de IDs de registros que devem ser
	 * removiddos.
	 * @param string $baseUrl URL base de redirecionamento em caso de sucesso.
	 * @param ModelCriteria $query Objeto de consulta de onde os registros devem
	 * ser retornados.
	 * @param boolean $disable (opcional) Indica se os registros devem ser
	 * apenas desabilitados ao invés de removidos. O padrão é
	 * <code>false</code>, ou seja, os registros são fisicamente removidos.
	 * @param array $removeRelations (opcional) Coleção de relacionamentos que
	 * também devem ser removidos. Cada item do array deve ser o nome do
	 * relacionamento registrado no Propel com o método
	 * <code>TableMap::addRelation()</code>.
	 * @return stdClass
	 */
	protected function removeRecord(ArrayList $params, $baseUrl, ModelCriteria $query, $disable = false, $removeRelations = null)
	{
		$result = $this->createResult();

		if(ArrayList::isValid($params) && !$params->isEmpty())
		{
			$successes = array();
			$errors = array();
			$query->keepQuery();
			$relations = $query->getTableMap()->getRelations();

			foreach($params as $id)
			{
				$record = $query->findPk($id);

				if($record)
				{
					$name = Object::hasMethod($record, 'getTitulo') ? $record->getTitulo() : $record->getNome();

					try
					{
						if($disable)
						{
							$disableMethod = Object::hasMethod($record, 'setAtivo') ? 'setAtivo' : 'setAtiva';
							$record->$disableMethod(false);
							$record->save();
						}
						else
						{
							if(!empty($relations) && !empty($removeRelations))
							{
								foreach($relations as $relation)
								{
									if(in_array($relation->getName(), $removeRelations))
									{
										switch($relation->getType())
										{
											case RelationMap::ONE_TO_MANY:
												$relationName = $relation->getPluralName();
												break;
											case RelationMap::MANY_TO_ONE:
											case RelationMap::ONE_TO_ONE:
												$relationName = $relation->getName();
												break;
											case RelationMap::MANY_TO_MANY:
												$relationName = null;
												break;
										}

										if(!empty($relationName))
										{
											$getterMethod = 'get' . $relationName;
											$relatedRecord = $record->$getterMethod();

											if(is_object($relatedRecord))
												$relatedRecord->delete();
										}
									}
								}
							}

							$record->delete();
						}

						$successes[] = $id;
					}
					catch(PropelException $ex)
					{
						Propel::getConnection()->rollBack();
						Log::add($ex->getMessage(), Log::NORMAL, null, $this->application->getName());
						$msg = Text::find('Integrity constraint violation', $ex->getMessage()) ? 'o registro está em uso' : self::DEFAULT_DATABASE_ERROR_MESSAGE;
						$errors[] = "{$name}: {$msg}";
					}
					catch(Error $error)
					{
						Propel::getConnection()->rollBack();
						Report::sendError($error);
						$errors[] = "{$name}: " . self::DEFAULT_ERROR_MESSAGE;
					}
				}
				else
				{
					$errors[] = "O ID {$id} não foi localizado";
				}
			}

			if(empty($errors))
			{
				$result->message = 'Registro(s) removido(s)';
				$result->type = 'success';
				$result->url = Enviroment::resolveUrl($baseUrl);
				$result->success = true;
			}
			else
			{
				$errors = '<ul class="m-t-10 m-b-0"><li>' . implode('</li><li>', $errors) . '</li></ul>';

				if(!empty($successes))
				{
					$result->message = 'Alguns dos registros foram removidos, outros porém sofreram algum tipo de erro.' . $errors;
					$result->type = 'info';
					$result->url = Enviroment::resolveUrl($baseUrl);
					$result->success = true;
				}
				else
				{
					$result->message = 'Tivemos problemas ao tentar remover os registros selecionados.' . $errors;
					$result->type = 'error';
				}
			}
		}
		else
		{
			$result->message = 'Nenhum registro foi localizado';
			$result->type = 'error';
		}

		$result->successes = $successes;
		$result->errors = $errors;

		return $result;
	}

	/**
	 * Duplica os registros passados e retorna um objeto com o resultado.
	 * @param ArrayList $params Lista de IDs de registros que devem ser
	 * duplicados.
	 * @param ModelCriteria $query Objeto de consulta de onde os registros devem
	 * ser retornados.
	 * @param array $skipRelations (opcional) Coleção de relacionamentos que
	 * devem ser ignorados, ou seja, não devem ser copiados para os registros
	 * clonados. Cada item do array deve ser o nome do relacionamento registrado
	 * no Propel com o método <code>TableMap::addRelation()</code>.
	 * Relacionamentos <code>RelationMap::MANY_TO_MANY</code> são ignorados
	 * automaticamente.
	 * @param array $skipColumns (opcional) Coleção de colunas que devem ser
	 * ignoradas, ou seja, não devem ser copiadas para os registros clonados.
	 * Estas colunas terão seus valores definidos para null.
	 * @return stdClass
	 */
	protected function cloneRecord(ArrayList $params, ModelCriteria $query, $skipRelations = array(), $skipColumns = array())
	{
		$result = $this->createResult();

		if(ArrayList::isValid($params) && !$params->isEmpty())
		{
			$successes = array();
			$errors = array();
			$query->keepQuery();
			$relations = $query->getTableMap()->getRelations();

			foreach($params as $id)
			{
				$record = $query->findPk($id);

				if($record)
				{
					$clone = null;

					if(Object::hasMethod($record, 'setTitulo'))
					{
						$name = $record->getTitulo();
						$nameSetter = 'setTitulo';
					}
					else
					{
						$name = $record->getNome();
						$nameSetter = 'setNome';
					}

					$newName = "{$name} - dupliacdo em " . date('d-m-y H:i:s');

					try
					{
						$clone = $record->copy();
						$clone->$nameSetter($newName);

						if(!empty($skipColumns))
						{
							foreach($skipColumns as $column)
							{
								$columnSetter = 'set' . $column;
								$clone->$columnSetter(null);
							}
						}

						if(!empty($relations))
						{
							foreach($relations as $relation)
							{
								switch($relation->getType())
								{
									case RelationMap::ONE_TO_MANY:
										$relationName = $relation->getPluralName();
										$setterMethod = 'add' . $relation->getName();
										break;
									case RelationMap::MANY_TO_ONE:
									case RelationMap::ONE_TO_ONE:
										$relationName = $relation->getName();
										$setterMethod = 'set' . $relationName;
										break;
									case RelationMap::MANY_TO_MANY:
										$relationName = null;
										break;
								}

								if(!empty($relationName) && (!empty($skipRelations) ? !in_array($relation->getName(), $skipRelations) : true))
								{
									$getterMethod = 'get' . $relationName;
									$relatedRecord = $record->$getterMethod();

									if(is_object($relatedRecord))
									{
										if($relatedRecord instanceof PropelCollection)
										{
											foreach($relatedRecord as $rRecord)
											{
												$cloneRelation = $rRecord->copy();
												$clone->$setterMethod($cloneRelation);
											}
										}
										else
										{
											$clone->$setterMethod($relatedRecord);
										}
									}
								}
							}
						}

						$clone->save();

						if(Object::hasMethod($record, 'getDiretorio'))
						{
							if(Dir::exists($record->getDiretorio()))
								Dir::open($record->getDiretorio())->copyTo($clone->getDiretorio());
						}

						$successes[$id] = $clone->getId();
					}
					catch(PropelException $ex)
					{
						Propel::getConnection()->rollBack();
						Log::add($ex->getMessage(), Log::NORMAL, null, $this->application->getName());
						$msg = Text::find('Duplicate entry', $ex->getMessage()) ? "Já existe um registro chamado \"{$newName}\"" : self::DEFAULT_DATABASE_ERROR_MESSAGE;
						$errors[] = "{$name}: {$msg}";

						if($clone && !$clone->isNew())
							$clone->delete();
					}
					catch(Error $error)
					{
						Propel::getConnection()->rollBack();
						Report::sendError($error);
						$errors[] = "{$name}: " . self::DEFAULT_ERROR_MESSAGE;

						if($clone && !$clone->isNew())
							$clone->delete();
					}
				}
				else
				{
					$errors[] = "O ID {$id} não foi localizado";
				}
			}

			if(empty($errors))
			{
				$result->message = 'Registro(s) duplicado(s)';
				$result->type = 'success';
				$result->success = true;
			}
			else
			{
				$errors = '<ul class="m-t-10 m-b-0"><li>' . implode('</li><li>', $errors) . '</li></ul>';

				if(!empty($successes))
				{
					$result->message = 'Alguns dos registros foram duplicados, outros não...' . $errors;
					$result->type = 'info';
					$result->success = true;
				}
				else
				{
					$result->message = 'Os registros não puderam ser duplicados.' . $errors;
					$result->type = 'error';
				}
			}
		}
		else
		{
			$result->message = 'Nenhum registro foi localizado';
			$result->type = 'error';
		}

		$result->successes = $successes;
		$result->errors = $errors;

		return $result;
	}

	/**
	 * Configura automaticamente o atributo tabindex de todos os inputs da
	 * página na ordem em que aparecem.
	 * @param string $search (opcional) Filtro de pesquisa dos campos que devem
	 * ser indexados. Por padrão, todos os campos de formulário são indexados.
	 */
	protected function autoIndexInputs($search = 'input,select,textarea,button[type=submit]')
	{
		$inputs = HtmlDocument::find($search);

		foreach($inputs as $index => $input)
			$input->setAttribute('tabindex', $index + 1);
	}

//	/**
//	 * Retorna o caminho da pasta onde os arquivos do usuário serão salvos.
//	 *
//	 * O diretório é criado automaticamente caso ainda não exista.
//	 * @param Usuario $user Instância de um usuário.
//	 * @return string Caminho do diretório do usuário.
//	 */
//	protected function getUserDir(Usuario $user)
//	{
//		$userDir = $this->application->getPath('resources') . 'img/usuarios/' . $user->getId() . '/';
//
//		if(!Dir::exists($userDir))
//			Dir::create($userDir);
//
//		return $userDir;
//	}
}
?>