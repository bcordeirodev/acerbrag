<?php
/**
 * This file contains only a controller.
 * @package control
 * @subpackage page
 */

/**
 * Controle responsável pelo gerenciamento de todos os dados adicionais, que
 * estão representados nas tabelas auxiliares do banco de dados.
 * @author Bruno Cordeiro
 * @package control
 * @subpackage page
 */
class CadastroBasicoController extends DefaultPageController
{
	/**
	 * Exibe a página inicial.
	 * @author Diego Andrade
	 */
	public function index()
	{
		$this->response->redirect('~');
	}

	/**
	 * Retorna um objeto de busca no bando de dados (Query).
	 * @param string $name Nome do tipo de dado que desejamos recuperar.
	 * @param boolean $isQuery (opcional) Se for true o objeto retornado é de
	 * busca (Query). Se for false é um modelo (um novo registro para ser
	 * inserido no banco de dados). O padrão é true.
	 * @return mixed Retorna um objeto Query ou null caso o nome seja inválido.
	 * @author Diego Andrade
	 */
	protected function getQueryObject($name, $isQuery = true)
	{
		switch($name)
		{
			case 'cargos':
				$obj = $isQuery ? CargoQuery::create() : new Cargo;
				break;
			case 'departamentos':
				$obj = $isQuery ? DepartamentoQuery::create() : new Departamento;
				break;
			default:
				$obj = null;
				break;
		}

		return $obj;
	}

	/**
	 * Lista os dados de uma tabela indicada na requisição HTTP. A resposta é
	 * devolvida via Ajax apenas, no formato JSON.
	 * @param ArrayList $params Parâmetros recebidos na requisição. O primeiro
	 * deles indica o nome da tabela de onde os registros serão retirados.
	 * @author Diego Andrade
	 */
	public function listar(ArrayList $params = null)
	{
		$validator = new Validator;
		$validator->loadPolicy('Listar');
		$result = $this->createResult();

		try
		{
			if(ArrayList::isValid($params) && $params->offsetExists(0))
			{
				$table = $this->getQueryObject($params[0])->setModelAlias('a');

				if($table)
				{
					if($validator->validate())
					{
						$start = $validator->hasInputValue('start') ? (int)$validator->getInputValue('start') : 0;
						$length = $validator->hasInputValue('length') ? (int)$validator->getInputValue('length') : 10;
						$draw = $validator->hasInputValue('draw') ? (int)$validator->getInputValue('draw') : 1;
						$page = $start > 0 ? intval($start / $length) + 1 : 1;
						$search = $validator->hasInputValue('search') ? $validator->getInputValue('search') : null;

						if(isset($search['value']) && !empty($search['value']))
						{
							$searchValue = Text::plain($search['value']);
							$table->where('a.Nome LIKE ?', "%{$searchValue}%");
						}

						$records = $table
							->orderById(Criteria::DESC)
							->paginate($page, $length);

						$result->recordsTotal = $records->getNbResults();
						$result->success = true;
						$result->data = array();
						$result->recordsFiltered = $records->count();
						$result->draw = $draw;
						$baseUrl = $this->application->getBaseUrl();

						if(!empty($records))
						{
							foreach($records as $record)
							{
								/*
								 * Switch adicionado para consulta com retornos
								 * personalizados. Caso a tabela retorne
								 * mais de duas colunas.
								 */
								switch($params[0])
								{
									default :
										$result->data[] = array(
											'<span class="js-span tip" data-original-title="Clique duas vezes para editar">' . $record->getNome() . '</span><input type="text" value="' . $record->getNome() . '" data-id="' . $record->getId() . '" class="form-control js-input hide">',
											'<a href="' . $baseUrl . 'cadastro-basico/remover/' . $record->getId() . '/' . $params[0] . '" data-id="' . $record->getId() . '" data-nome="' . $record->getNome() . '" class="btn btn-small btn-danger js-remove"><i class="fa fa-trash-o"></i></a>'
										);
										break;
								}
							}
						}
					}
					else
					{
						$result->message = 'Os dados enviados são inválidos';
					}
				}
				else
				{
					$result->message = 'Não foi possível definir a fonte dos dados';
				}
			}
			else
			{
				$result->message = 'Requisição inválida';
			}
		}
		catch(PropelException $ex)
		{
			$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
			$result->type = 'error';
			Report::sendError($ex);
		}
		catch(Error $error)
		{
			$result->message = self::DEFAULT_ERROR_MESSAGE;
			$result->type = 'error';
			Report::sendError($error);
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Salva os dados de um novo cadastro no banco de dados.
	 * @author Diego Andrade
	 */
	public function salvar()
	{
		$validator = new Validator;
		$validator->loadPolicy('CadastroBasico/Novo');
		$result = $this->createResult();

		if($validator->validate())
		{
			$table = $this->getQueryObject($validator->getInputValue('cadastro'));

			if($table)
			{
				if($table->filterByNome($validator->getInputValue('nome'))->count() == 0)
				{
					$model = $this->getQueryObject($validator->getInputValue('cadastro'), false);
					$model->setNome($validator->getInputValue('nome'));
					$type = $validator->getInputValue('cadastro');

					/*
					 * Swith usado no cadastro de valores adicionais.
					 */
					switch($type)
					{
						case 'produtoras':
							$model->setRazaoSocial($validator->getInputValue('razao-social'));
							$model->setCnpj(Text::remove('/\D/', $validator->getInputValue('cnpj')));
							break;
						case 'caracteristica-poltrona':
						case 'caracteristica-sala':
						case 'caracteristica-produto':
							$model->setCinemaId($validator->getInputValue('cinema'));
							break;
						default:
							break;
					}

					try
					{
						$model->save();
						$result->callback = 'basicDataAdded';
						$result->success = true;
						Auditoria::adicionar('Cadastrado básico adicionado', Auditoria::LEVEL_INFO, null, "{$model->getNome()} ({$model->getId()})", Auditoria::TIPO_SISTEMA);
					}
					catch(PropelException $ex)
					{
						Propel::getConnection()->rollBack();
						Report::sendError($ex);
						$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
						$result->type = 'error';
					}
					catch(Error $error)
					{
						Propel::getConnection()->rollBack();
						Report::sendError($error);
						$result->message = self::DEFAULT_ERROR_MESSAGE;
						$result->type = 'error';
					}
				}
				else
				{
					$result->result = array(
						'nome' => 'Já existe um registro com o nome informado. Selecione outro nome.'
					);
				}
			}
			else
			{
				$result->message = 'O cadastro é inválido';
				$result->type = 'error';
			}
		}
		else
		{
			$result->result = $validator->getResult();
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Atualiza os dados de um cadastro existente no banco de dados.
	 * @author Diego Andrade
	 */
	public function atualizar()
	{
		$validator = new Validator;
		$validator->loadPolicy('CadastroBasico/Atualizar');
		$result = $this->createResult();

		if($validator->validate())
		{
			$table = $this->getQueryObject($validator->getInputValue('cadastro'));

			if($table)
			{
				$record = $table->findPk($validator->getInputValue('id'));

				if($record)
				{
					try
					{
						$record->setNome($validator->getInputValue('nome'));
						$record->save();

						$result->success = true;
						Auditoria::adicionar('Cadastrado básico atualizado', Auditoria::LEVEL_INFO, null, "{$record->getNome()} ({$record->getId()})", Auditoria::TIPO_SISTEMA);
					}
					catch(PropelException $ex)
					{
						Propel::getConnection()->rollBack();
						Report::sendError($ex);
						$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
						$result->type = 'error';
					}
					catch(Error $error)
					{
						Propel::getConnection()->rollBack();
						Report::sendError($error);
						$result->message = self::DEFAULT_ERROR_MESSAGE;
						$result->type = 'error';
					}
				}
				else
				{
					$result->message = 'O registro não foi localizado';
					$result->type = 'error';
				}
			}
			else
			{
				$result->message = 'O cadastro é inválido';
				$result->type = 'error';
			}
		}
		else
		{
			$result->result = $validator->getResult();
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Remove um cadastro existente no banco de dados.
	 * @param ArrayList $params Parâmetros recebidos na requisição. O primeiro
	 * deles indica o nome da tabela de onde o registro será removido.
	 * @author Diego Andrade
	 */
	public function remover(ArrayList $params = null)
	{
		$result = $this->createResult();

		if(ArrayList::isValid($params) && !$params->isEmpty())
		{
			$table = $this->getQueryObject($params[1]);

			if($table)
			{
				$record = $table->findPk($params[0]);

				if($record)
				{
					try
					{
						/*
						 * Switch adicioando para removers registros de outras
						 * tabelas em casos específicos.
						 */
						switch($params[1])
						{
							case 'desconto':
								$record->getDescontoCinemas()->delete();
								break;
							default:
								break;
						}

						$record->delete();

						$result->success = true;
						$result->message = 'Removido com sucesso';
						$result->type = 'success';

						Auditoria::adicionar('Cadastrado básico removido', Auditoria::LEVEL_INFO, null, "{$record->getNome()} ({$record->getId()})", Auditoria::TIPO_SISTEMA);
					}
					catch(PropelException $ex)
					{
						Propel::getConnection()->rollBack();
						Report::sendError($ex);
						$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
						$result->type = 'error';
					}
					catch(Error $error)
					{
						Propel::getConnection()->rollBack();
						Report::sendError($error);
						$result->message = self::DEFAULT_ERROR_MESSAGE;
						$result->type = 'error';
					}
				}
				else
				{
					$result->message = 'O registro não foi localizado';
					$result->type = 'error';
				}
			}
			else
			{
				$result->message = 'O cadastro é inválido';
				$result->type = 'error';
			}
		}
		else
		{
			$result->message = 'Nenhum registro foi localizado';
			$result->type = 'error';
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Inclui os arquivos de recursos, inicializa a página e atualiza o item
	 * atual do menu.
	 */
	protected function initializePage()
	{
		$this->view->addResource('~/plugins/jquery-validation/js/jquery.validate.min.js');
		$this->view->addResource('~/plugins/jquery-validation/js/messages_pt-BR.js');
		$this->view->addResource('~/plugins/jquery-datatable/css/jquery.dataTables.css');
		$this->view->addResource('~/plugins/datatables-responsive/css/datatables.responsive.css');
		$this->view->addResource('~/plugins/jquery-datatable/jquery.dataTables.min.js');
		$this->view->addResource('~/plugins/jquery-datatable/extra/js/TableTools.min.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/datatables.responsive.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/lodash.min.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/js/basic-data.js');
		$this->view->initializePage();
		$this->setActiveMenuItem('Registro de base');
	}

	/**
	 * Exibe a página de cadastro de cargos.
	 *
	 * @author Bruno Cordeiro
	 */
	public function cargos()
	{
		$this->view->setHtmlPage('CadastroBasico.Cargos');
		$this->initializePage();

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
	 * Exibe a página de cadastro de departamentos.
	 *
	 * @author Bruno Cordeiro
	 */
	public function departamentos()
	{
		$this->view->setHtmlPage('CadastroBasico.Departamentos');
		$this->initializePage();

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
	 * Exibe a página de cadastro de perfils.
	 *
	 * @author Bruno Cordeiro
	 */
	public function perfiles()
	{
		$this->view->setHtmlPage('CadastroBasico.Perfis');
		$this->initializePage();

		$currentUser = Usuario::atual();
		$doc = HtmlDocument::getCommomDocument();

		/*
		 * Perfis disponíveis para o usuário.
		 */
		$profiles = PerfilQuery::create()
			->filterByNivel($currentUser->getNivelAcesso(), Criteria::LESS_EQUAL)
			->find();

		if(!$profiles->isEmpty())
		{
			foreach($profiles as $profile)
				$doc->getById('box-profiles')->append("<li class='list-group-item js-profile' data-id='{$profile->getId()}'>{$profile->getNome()}</li>");
		}

		/*
		 * Permissoes diponiveis para o usuário.
		 */
		$permissions = PermissaoQuery::create()
			->filterByNivel($currentUser->getNivelAcesso(), Criteria::LESS_EQUAL)
			->find();

		if(!$permissions->isEmpty())
		{
			foreach($permissions as $permission)
			{
				/*
				 * Usada na recuperação das permissões de um perfil específico.
				 */
				$doc->getById('box-permissions')->append(
					"<div class='col-md-6 m-b-15'>
						<div class='checkbox check-success'>
							<input name='permissoes[]' class='js-permission' id='permissoes-{$permission->getId()}' value='{$permission->getId()}' type='checkbox'>
							<label for='permissoes-{$permission->getId()}' class='m-b-0'>{$permission->getNome()}</label>
						</div>
					</div>"
				);

				/*
				 * Usado para cadastrar um novo perfil.
				 */
				$doc->getById('box-new-permissions')->append(
					"<div class='col-md-6 m-b-15'>
						<div class='checkbox check-success'>
							<input name='novas-permissoes[]' class='js-new-permission' id='novas-permissoes-{$permission->getId()}' value='{$permission->getId()}' type='checkbox'>
							<label for='novas-permissoes-{$permission->getId()}' class='m-b-0'>{$permission->getNome()}</label>
						</div>
					</div>"
				);
			}
		}

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
	 * Lista as permissões disponíveis para o perfil informado.
	 *
	 * @param ArrayList $param Array contendo o id do perfil que terá as
	 * permissões verificada.
	 * @author Bruno Cordeiro
	 */
	public function listarPermissoes(ArrayList $param)
	{
		$result = $this->createResult();

		if(ArrayList::isValid($param) && $param->count())
		{
			try
			{
				$profile = PerfilQuery::create()->findPk($param[0]);

				if(!empty($profile))
				{
					$permissions = $profile->getPermissaos();

					if(!$permissions->isEmpty())
					{
						$result->permissionsId = array();

						foreach($permissions as $permission)
							$result->permissionsId[] = $permission->getId();

						$result->success = true;
					}
					else
					{
						$result->message = 'Nenhuma permissão cadastrada para o perfil informado';
						$result->type = 'error';
					}
				}
				else
				{
					$result->message = 'O perfíl informado não foi encontrado';
					$result->type = 'error';
				}
			}
			catch(PropelException $ex)
			{
				Report::sendError($ex);
				$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
				$result->type = 'error';
			}
			catch(Error $error)
			{
				Report::sendError($error);
				$result->message = self::DEFAULT_ERROR_MESSAGE;
				$result->type = 'error';
			}
		}
		else
		{
			$result->message = 'O parâmetro está incorreto';
			$result->type = 'error';
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Salva o perfil e as permissões atribuidas ao mesmo.
	 *
	 * @author Bruno Cordeiro
	 */
	public function salvarPerfil()
	{
		$result = $this->createResult();
		$validaton = new Validator;
		$validaton->loadPolicy('CadastroBasico/SalvarPerfil');

		try
		{
			if($validaton->validate())
			{
				$currentUser = Usuario::atual();
				$profileName = $validaton->getInputValue('nome-perfil');
				$permissions = $validaton->getInputValue('novas-permissoes');

				$profile = new Perfil;
				$profile->setNivel($currentUser->getNivelAcesso());
				$profile->setNome($profileName);
				$profile->save();

				if(count($permissions) > 0)
				{
					foreach($permissions as $permissionId)
					{
						$profilePermission = new PerfilPermissao;
						$profilePermission->setPerfil($profile);
						$profilePermission->setPermissaoId($permissionId);
						$profilePermission->save();
					}
				}

				$result->id			= $profile->getId();
				$result->nome		= $profile->getNome();

				$result->success	= true;
				$result->message	= 'Perfil cadastrado com sucesso';
				$result->type		= 'success';
			}
			else
			{
				$result->result = $validaton->getResult();
			}
		}
		catch(PropelException $ex)
		{
			Report::sendError($ex);
			$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
			$result->type = 'error';
		}
		catch(Error $error)
		{
			Report::sendError($error);
			$result->message = self::DEFAULT_ERROR_MESSAGE;
			$result->type = 'error';
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Atualiza as permissões que o perfil terá acesso.
	 *
	 * @author Bruno Cordeiro
	 */
	public function atualizarPerfil()
	{
		$result = $this->createResult();
		$validaton = new Validator;
		$validaton->loadPolicy('CadastroBasico/AtualizarPerfil');

		try
		{
			if($validaton->validate())
			{
				$currentUser = Usuario::atual();
				$profileId = $validaton->getInputValue('perfil-id');
				$permissions = $validaton->getInputValue('permissoes');

				$profile = PerfilQuery::create()
						->filterByNivel($currentUser->getNivelAcesso(), Criteria::LESS_EQUAL)
						->filterById($profileId)->findOne();

				if($profile)
				{
					$profile->getPerfilPermissaos()->delete();

					if(count($permissions) > 0)
					{
						foreach($permissions as $permissionId)
						{
							$profilePermission = new PerfilPermissao;
							$profilePermission->setPerfil($profile);
							$profilePermission->setPermissaoId($permissionId);
							$profilePermission->save();
						}
					}

					$result->success = true;
					$result->message = 'Perfil atualizado com sucesso.';
					$result->type = 'success';
				}
				else
				{
					$result->message = 'Você não pode alterar as permissões do perfil informado';
					$result->type = 'error';
				}
			}
			else
			{
				$result->result = $validaton->getResult();
			}
		}
		catch(PropelException $ex)
		{
			Report::sendError($ex);
			$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
			$result->type = 'error';
		}
		catch(Error $error)
		{
			Report::sendError($error);
			$result->message = self::DEFAULT_ERROR_MESSAGE;
			$result->type = 'error';
		}

		$this->sendAjaxResponse($result);
	}
}
?>
