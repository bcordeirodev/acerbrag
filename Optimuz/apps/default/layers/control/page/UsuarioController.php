<?php
/**
 * This file contains only a controller.
 * @package control
 * @subpackage page
 */

/**
 * Controle responsável por todas as operações relacionadas ao gerenciamento de
 * usuários, perfis e permissões.
 *
 * @author Bruno Cordeiro
 * @package control
 * @subpackage page
 */
class UsuarioController extends DefaultPageController
{
	/**
	 * Lista de colunas usadas para filtro e exportação.
	 * @var array
	 */
	private $filterColumns = array(
		array(
			'label' => 'Id',
			'name' => 'Id',
			'show' => false,
		),
		array(
			'label' => 'Nome',
			'name' => 'Nome',
			'show' => true,
		),
		array(
			'label' => 'E-mail',
			'name' => 'Email',
			'show' => true,
		),
		array(
			'label' => 'Telefone',
			'name' => 'Telefone',
			'show' => true,
		),
	);

	/**
	 * Exibe a lista de usuários cadastrados.
	 */
	public function index()
	{
		$this->view->setHtmlPage('Usuario.Index');
		$this->view->addResource('~/plugins/jquery-datatable/css/jquery.dataTables.css');
		$this->view->addResource('~/plugins/datatables-responsive/css/datatables.responsive.css');
		$this->view->addResource('~/plugins/jquery-datatable/jquery.dataTables.min.js');
		$this->view->addResource('~/plugins/jquery-datatable/extra/js/TableTools.min.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/datatables.responsive.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/lodash.min.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/js/user.js');
		$this->view->initializePage();
		$this->setActiveMenuItem('Usuarios');

		$fields = FilterContainerComponent::getAvailableFilters($this->filterColumns, 'label');
		HtmlDocument::find('.js-filter', 'FilterComponent')->getFirst()->populate($fields);
		$this->restoreFilterFields($fields);

		if(!Usuario::atual()->temPermissao('cadastrar-usuario'))
			HtmlDocument::getById('js-new-user')->remove();

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
	 * Exibe a lista de usuários ativos cadastrados.
	 */
	public function ativos()
	{
		$this->view->setHtmlPage('Usuario.Ativos');
		$this->view->addResource('~/plugins/jquery-datatable/css/jquery.dataTables.css');
		$this->view->addResource('~/plugins/datatables-responsive/css/datatables.responsive.css');
		$this->view->addResource('~/plugins/jquery-datatable/jquery.dataTables.min.js');
		$this->view->addResource('~/plugins/jquery-datatable/extra/js/TableTools.min.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/datatables.responsive.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/lodash.min.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/js/user.js');
		$this->view->initializePage();
		$this->setActiveMenuItem('Usuarios');

		$fields = FilterContainerComponent::getAvailableFilters($this->filterColumns, 'label');
		HtmlDocument::find('.js-filter', 'FilterComponent')->getFirst()->populate($fields);
		$this->restoreFilterFields($fields);

		if(!Usuario::atual()->temPermissao('cadastrar-usuario'))
			HtmlDocument::getById('js-new-user')->remove();

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
	 * Exibe a lista de usuários cadastrados.
	 */
	public function inativos()
	{
		$this->view->setHtmlPage('Usuario.Inativos');
		$this->view->addResource('~/plugins/jquery-datatable/css/jquery.dataTables.css');
		$this->view->addResource('~/plugins/datatables-responsive/css/datatables.responsive.css');
		$this->view->addResource('~/plugins/jquery-datatable/jquery.dataTables.min.js');
		$this->view->addResource('~/plugins/jquery-datatable/extra/js/TableTools.min.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/datatables.responsive.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/lodash.min.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/js/user.js');
		$this->view->initializePage();
		$this->setActiveMenuItem('Usuarios');

		$fields = FilterContainerComponent::getAvailableFilters($this->filterColumns, 'label');
		HtmlDocument::find('.js-filter', 'FilterComponent')->getFirst()->populate($fields);
		$this->restoreFilterFields($fields);

		if(!Usuario::atual()->temPermissao('cadastrar-usuario'))
			HtmlDocument::getById('js-new-user')->remove();

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
	 * Lista todos os usuários cadastrados no banco de dados.
	 */
	public function listar()
	{
		$this->doList(UsuarioQuery::getByUserProfile());
	}

	/**
	 * Lista todos os usuários ativos do sistema.
	 */
	public function listarAtivos()
	{
		$users = UsuarioQuery::getByUserProfile()->filterByAtivo(true);
		$this->doList($users);
	}

	/**
	 * Lista todos os usuários inativos do sistema.
	 */
	public function listarInativos()
	{
		$users = UsuarioQuery::getByUserProfile()->filterByAtivo(false);
		$this->doList($users);
	}

	/**
	 * Lista os usuários já salvos no banco de dados. A resposta é devolvida
	 * via Ajax apenas, no formato JSON.
	 *
	 * @param
	 */
	public function doList(UsuarioQuery $table)
	{
		$validator = new Validator;
		$validator->loadPolicy('Listar');
		$result = $this->createResult();

		try
		{
			if($validator->validate())
			{
				$start	= $validator->hasInputValue('start') ? (int)$validator->getInputValue('start') : 0;
				$length = $validator->hasInputValue('length') ? (int)$validator->getInputValue('length') : 10;
				$draw = $validator->hasInputValue('draw') ? (int)$validator->getInputValue('draw') : 1;
				$page = $start > 0 ? intval($start / $length) + 1 : 1;
				$search = $validator->hasInputValue('search') ? $validator->getInputValue('search') : null;
				$filterField = $validator->hasInputValue('campo') ? $validator->getInputValue('campo') : null;
				$filterCondition = $validator->hasInputValue('condicao') ? $validator->getInputValue('condicao') : null;
				$filterValue = $validator->hasInputValue('valor') ? $validator->getInputValue('valor') : null;
				$filterOperator = $validator->hasInputValue('operador') ? $validator->getInputValue('operador') : null;
				$export = $validator->hasInputValue('exportar') ? $validator->getInputValue('exportar') == 1 : false;
				$exportFileType = $validator->hasInputValue('tipo') ? $validator->getInputValue('tipo') : null;
				$isRemoved = $validator->hasInputValue('removidos');

				FilterContainerComponent::saveState("filter{$this->getControllerName()}");

				$table->_if($export)
						->select(FilterContainerComponent::getFiltersPropery($this->filterColumns, 'name'))
					->_endif();

				if(!empty($filterField))
				{
					$fields = FilterContainerComponent::getAvailableFilters($this->filterColumns, 'name');

					foreach($filterField as $i => $fieldIndex)
					{
						if(isset($fields[$fieldIndex]))
						{
							$currentFilter = $this->filterColumns[$fieldIndex];
							$fieldName = $currentFilter['name'];
							$condition = FilterComponent::getCondition($filterCondition[$i]);
							$fieldValue = FilterComponent::getValueForCondition($i, $filterCondition, $filterValue);
							$valuePlaceholder = '?';

							if(!preg_match('#^\w+\.#', $fieldName))
								$fieldName = "u.{$fieldName}";

							if($fieldName)
							{
								$table
									->_if(($i > 0) && ($filterOperator[$i - 1] == 2))
										->_or()
									->_endif()
									->_if(!empty($valuePlaceholder))
										->where("{$fieldName} {$condition} {$valuePlaceholder}", $fieldValue)
									->_else()
										->where("{$fieldName} {$condition}")
									->_endif();
							}
						}
					}
				}

				if(isset($search['value']) && !empty($search['value']))
				{
					$searchValue = Text::plain($search['value']);
					$table
						->condition('c1', 'u.Nome LIKE ?', "%{$searchValue}%")
						->condition('c2', 'u.Email LIKE ?', "%{$searchValue}%")
						->combine(array('c1', 'c2'), Criteria::LOGICAL_OR);
				}

				if(!$export)
				{
					$records = $table->orderById(Criteria::DESC)->paginate($page, $length);

					$result->recordsTotal		= $records->getNbResults();
					$result->success			= true;
					$result->data				= array();
					$result->recordsFiltered	= $records->count();
					$result->draw				= $draw;
					$baseUrl					= $this->application->getBaseUrl();

					if(!empty($records))
					{
						foreach($records as $user)
						{
							$changeUser = null;

							$linkEdit = '<li><a href="' . $baseUrl . 'usuario/editar/' . $user->getId() . '">Editar</a></li>';
							$historyUser = '<li><a href="' . $baseUrl . 'usuario/historico/' . $user->getId() . '" title="">Histórico</a></li>';

							if(Usuario::atual()->temPermissao('logar-como'))
								$changeUser = '<li><a href="' . $baseUrl . 'dashboard/trocar-usuario/' . $user->getId() . '" title="">Usar usuário</a></li>';

							$links = '<div class="btn-group pull-right">
									<a href="' . $baseUrl . 'usuario/ver/' . $user->getId() . '" class="btn btn-small btn-white"><i class="fa fa-eye m-r-5"></i> Ver</a>
									<button class="btn btn-small btn-white dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
									<ul class="dropdown-menu">
										' . $linkEdit . '
										' . $historyUser . '
										' . $changeUser . '
									</ul>
								</div>';

							$result->data[] = array(
								'<img src="' . $user->getImagem('perfil-p', true) . '" alt="Imagem de perfil" lang="pt-BR" class="circle">',
								Text::toHtml($user->getNome()),
								$user->getEmail(),
								$user->getPerfil()->getNome(),
								($user->getAtivo() == true ? 'Ativo' : 'Inativo'),
								$links
							);
						}
					}
				}
				else
				{
					FilterContainerComponent::exportReport('Lista_de_usuarios', $this->getReportsDir(), 'usuario', $this->filterColumns, $table, $result, $exportFileType);
				}
			}
			else
			{
				$result->message = 'O número da página é inválido';
			}
		}
		catch(PropelException $ex)
		{
			$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
			$result->type = 'error';
			Report::sendError(new Error($ex));
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
	 * Lista os registros salvos no banco de dados. A tabela é indicada pelo
	 * primeiro índice do ArrayList $params. A resposta é devolvida
	 * via Ajax apenas, no formato JSON.
	 * @param ArrayList $params Lista de parâmetros recebidos. O primeiro indica
	 * o nome da tabela de onde os registros serão retornados.
	 */
	public function filtrar(ArrayList $params = null)
	{
		$validator = new Validator;
		$validator->loadPolicy('Filtrar');
		$result = $this->createResult();
		$result->items = array();

		if(ArrayList::isValid($params) && !$params->isEmpty())
		{
			try
			{
				if($validator->validate())
				{
					$search = $validator->getInputValue('q');

					switch($params[0])
					{
						case 'cidades':
							$table = CidadeQuery::create();
							$table->filterByUfId($validator->getInputValue('second'));
						break;
						default:
							$table = false;
						break;
					}

					if($table)
					{
						$table
							->setModelAlias('a')
							->_if(!empty($search))
								->where('a.Nome LIKE ?', "%{$search}%")
							->_endif()
							->orderById(Criteria::DESC);

						$records = $table->find();

						if(!empty($records))
						{
							foreach($records as $record)
							{
								$result->items[] = array(
									'id' => $record->getId(),
									'text' => $record->getNome(),
								);
							}
						}
					}
				}
			}
			catch(PropelException $ex)
			{
				Report::sendError(new Error($ex));
				$result->success = false;
				$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
				$result->type = 'error';
				$result->data = array();
				$result->recordsFiltered = 0;
			}
			catch(Error $error)
			{
				Report::sendError($error);
				$result->success = false;
				$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
				$result->type = 'error';
				$result->data = array();
				$result->recordsFiltered = 0;
			}
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Envia o arquivo de exportação para o browser do usuário.
	 *
	 * Após o arquivo ter sido enviado, ele é removido da pasta temporária.
	 *
	 * Se nenhum arquivo for localizado para envio, a página de erro 404 será
	 * exibida para o usuário.
	 * @param ArrayList $params Array de parâmetros recebidos na requisição. O
	 * ID do arquivo é o primeiro item no array.
	 */
	public function exportar(ArrayList $params = null)
	{
		if(ArrayList::isValid($params) && !$params->isEmpty())
			$this->downloadFile("{$params[2]}-{$params[0]}.{$params[1]}");
		else
			$this->pageNotFound();
	}

	/**
	 * Retorna o HTML de um campo de filtro. O campo é indicado pelo
	 * primeiro índice do ArrayList $params. A resposta é devolvida
	 * via Ajax apenas, no formato JSON.
	 * @param ArrayList $params Lista de parâmetros recebidos. O primeiro indica
	 * o campo que sera retornado.
	 */
	public function carregarFiltro(ArrayList $params = null)
	{
		$result = $this->createResult();
		$result->input = array(
			'html' => '',
			'mask' => ''
		);

		if(ArrayList::isValid($params) && !$params->isEmpty())
		{
			try
			{
				$index = $params[0];

				if(($index >= 0) && ($index < count($this->filterColumns)) && isset($this->filterColumns[$index]))
				{
					$isSelect = false;

					switch($params[0])
					{
						/*case 4:
							$isSelect = true;
							$result->input['html'] .= "<option value='0'>Nenhuma</option>";

							foreach(ContaQuery::create()->orderByNome()->find() as $record)
								$result->input['html'] .= "<option value='{$record->getId()}'>{$record->getNome()}</option>";
							break;*/
						default:
							break;
					}

					if($isSelect)
						$result->input['html'] = '<select name="valor[]" class="col-md-12 no-padding" data-search="true" required>' . $result->input['html'] . '</select>';
					elseif(isset($this->filterColumns[$index]['type']) && ($this->filterColumns[$index]['type'] == 'date'))
						$result->input['mask'] = '99/99/9999';

					$result->success = true;
				}
				else
				{
					$result->message = 'Filtro inválido';
					$result->type = 'error';
				}
			}
			catch(PropelException $ex)
			{
				Report::sendError(new Error($ex));
			}
			catch(Error $error)
			{
				Report::sendError($error);
			}
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Exibe a página de cadastro de um novo usuário.
	 */
	public function nuevo()
	{
		$this->view->setHtmlPage('Usuario.Novo');
		$this->view->addResource('~/plugins/jquery-validation/js/jquery.validate.min.js');
		$this->view->addResource('~/plugins/jquery-validation/js/messages_pt-BR.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/plugins/dropzone/dropzone.min.js');
		$this->view->addResource('~/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');
		$this->view->addResource('~/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js');
		$this->view->addResource('~/plugins/bootstrap-datepicker/css/datepicker.css');
		$this->view->addResource('~/js/user.js');
		$this->view->initializePage();
		$this->setActiveMenuItem('Usuarios');

		$document = HtmlDocument::getCommomDocument();
		$currentUser = Usuario::atual();

		DataManager::set('perfis', PerfilQuery::create()->filterByNivel($currentUser->getNivelAcesso(), Criteria::LESS_EQUAL)->find());
		DataManager::set('cargos', CargoQuery::create()->find());
		DataManager::set('departamentos', DepartamentoQuery::create()->find());
		DataManager::set('estadoCivil', Usuario::$maritalStatus);

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
	 * Salva os dados de um novo usuário no banco de dados.
	 */
	public function salvar()
	{
		$validator = new Validator;
		$validator->loadPolicy('Usuario/Novo');
		$result = $this->createResult();

		if($validator->validate())
		{
			$email = $validator->getInputValue('email');

			if(UsuarioQuery::getAtivos()->filterByEmail($email)->count() == 0)
			{
				$currentUser = Usuario::atual();
				$user = null;

				try
				{
					/*
					 * Informações básicas
					 */
					$nome			= $validator->getInputValue('nome');
					$profileId		= $validator->getInputValue('perfil');
					$phone			= Text::remove('/\D/', $validator->getInputValue('telefone'));
					$dni			= Text::remove('/\D/',$validator->getInputValue('dni'));
					$cellPhone		= Text::remove('/\D/', $validator->getInputValue('celular'));
					$birthDate		= Utils::formatDateDb($validator->getInputValue('data-nascimento'));
					$maritalStatus	= $validator->getInputValue('estado-civil');
					$gender			= $validator->getInputValue('sexo');

					/*
					 * Informações do trabalho.
					 */
					$registration		= $validator->getInputValue('matricula');
					$office				= $validator->getInputValue('cargo');
					$departament		= $validator->getInputValue('departamento');
					$hiringDate			= Utils::formatDateDb($validator->getInputValue('data-contratacao'));
					$terminationDate	= Utils::formatDateDb($validator->getInputValue('data-rescisao'));

					/*
					 * Endereço
					 */
					$cep			= Utils::getJustNumber($validator->getInputValue('cep'));
					$logradouro		= $validator->getInputValue('logradouro');
					$numero			= $validator->getInputValue('numero');
					$complemento	= $validator->getInputValue('complemento');
					$cidade			= $validator->getInputValue('cidade');
					$bairro			= $validator->getInputValue('bairro');

					$user = new Usuario;

					/*
					 * Informações básicas.
					 */
					$user->setNome($nome);
					$user->setEmail($email);
					$user->setPerfilId($profileId);
					$user->setDni($dni);
					$user->setTelefone($phone);
					$user->setCelular($cellPhone);
					$user->setDataNascimento($birthDate);
					$user->setEstadoCivil($maritalStatus);
					$user->setSexo($gender);

					/*
					 * Informações do trabalho.
					 */
					$user->setMatricula($registration);
					$user->setCargoId($office);
					$user->setDepartamentoId($departament);
					$user->setDataContratacao($hiringDate);
					$user->setDataRescisao($terminationDate);

					/*
					 * Informações padrão.
					 */
					$user->setDataCadastro(time());
					$user->setAtivo(true);
					$user->setNivelAcesso(2);

					/*
					 * Endereço.
					 */
					$address = new Endereco;
					$address->setCep($cep);
					$address->setNumero($numero);
					$address->setComplemento($complemento);
					$address->setLogradouro($logradouro);
					$address->setCidade($cidade);
					$address->setBairro($bairro);
					$user->setEndereco($address);

					$user->save();
					$this->salvarImagem($user);

					$result->message	= 'Usuario registrado exitosamente';
					$result->type		= 'success';
					$result->time		= 2500;
					$result->url		= Enviroment::resolveUrl('~/usuario/editar/' . $user->getId());
					$result->callback	= 'redirect';
					$result->success	= true;

					Auditoria::adicionar('El usuario se ha registrado', Auditoria::LEVEL_INFO, $currentUser, "{$user->getNome()} ({$user->getEmail()})", Auditoria::TIPO_USUARIO, $user->getId());
				}
				catch(PropelException $ex)
				{
					Report::sendError(new Error($ex->getMessage(), $ex->getCode()));
					$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
					$result->type = 'error';

					if($user && !$user->isNew())
						$user->delete();
				}
				catch(Error $error)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($error);
					$result->message = self::DEFAULT_ERROR_MESSAGE;
					$result->type = 'error';

					if($user && !$user->isNew())
						$user->delete();
				}
			}
			else
			{
				$result->result = array(
					'email' => 'Este e-mail já está em uso. Selecione outro.'
				);
			}
		}
		else
		{
			$result->message = 'Existem erros no formulário. Corrija-os antes de submeter o formulário novamente.';
			$result->type = 'error';
			$result->result = $validator->getResult();
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Exibe a página de edição de um usuário.
	 * @param ArrayList $params Array de parâmetros recebidos na requisição. O
	 * ID do usuário é o primeiro item no array.
	 */
	public function editar(ArrayList $params = null)
	{
		if(ArrayList::isValid($params) && !$params->isEmpty())
		{
			$user = UsuarioQuery::create()->findPk($params[0]);

			if($user)
			{
				$this->view->setHtmlPage('Usuario.Editar');
				$this->view->addResource('~/plugins/jquery-validation/js/jquery.validate.min.js');
				$this->view->addResource('~/plugins/jquery-validation/js/messages_pt-BR.js');
				$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
				$this->view->addResource('~/plugins/dropzone/dropzone.min.js');
				$this->view->addResource('~/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');
				$this->view->addResource('~/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js');
				$this->view->addResource('~/plugins/bootstrap-datepicker/css/datepicker.css');
				$this->view->addResource('~/js/user.js');
				$this->view->initializePage();
				$this->setActiveMenuItem('Usuarios');

				$currentUser = Usuario::atual();
				$doc = HtmlDocument::getCommomDocument();

				DataManager::set('perfis', PerfilQuery::create()->filterByNivel($currentUser->getNivelAcesso(), Criteria::LESS_EQUAL)->find());
				DataManager::set('cargos', CargoQuery::create()->find());
				DataManager::set('departamentos', DepartamentoQuery::create()->find());
				DataManager::set('estadoCivil', Usuario::$maritalStatus);

				/*
				 * Personalização do formulário
				 */
				$name = Text::split(' ', $user->getNome(), 2);
				HtmlDocument::find('.page-title h3')->getFirst()->html("{$name[0]} <span class='semi-bold'>" . (isset($name[1]) ? $name[1] : '') . "</span>");
				$audit = AuditoriaQuery::getMensagens(Auditoria::TIPO_USUARIO, $user->getId(), 'O usuário foi cadastrado')->findOne();
				HtmlDocument::find('.page-title h3 + p')->getFirst()->html($audit ? 'Usuário desde ' . $audit->getData('d/m/Y') : 'Usuário ansião');
				HtmlDocument::getById('js-disable-user')->toType('HtmlLink')->setUrl("~/usuario/remover/{$user->getId()}");
				HtmlDocument::getById('js-change-password')->toType('HtmlLink')->setUrl("~/usuario/alterar-senha/{$user->getId()}");
				HtmlDocument::getById('js-history-link')->toType('HtmlLink')->setUrl(Enviroment::resolveUrl("~/usuario/historico/{$user->getId()}"));

				/*
				 * Informações básicas
				 */
				$doc->getById('id')->setAttribute('value', $user->getId());
				$doc->getById('nome')->setAttribute('value', $user->getNome());
				$doc->getById('perfil')->setValue($user->getPerfilId());
				$doc->getById('email')->setAttribute('value', $user->getEmail());
				$doc->getById('telefone')->setAttribute('value', $user->getTelefone());
				$doc->getById('dni')->setAttribute('value', $user->getDni());
				$doc->getById('data-nascimento')->setAttribute('value', $user->getDataNascimento('d/m/Y'));
				$doc->getById('celular')->setAttribute('value', $user->getCelular());
				$doc->getById($user->getSexo() == 'M' ? 'masculino' : 'femenino')->setAttribute('checked', 'checked');
				$doc->getById($user->getTipoAcesso() == Usuario::TIPO_ACESSO_MOBILE ? 'mobile' : 'back-end')->setAttribute('checked', 'checked');

				/*
				 * Endereço
				 */
				$address = $user->getEndereco();
				$doc->getById('cep')->setAttribute('value', $address->getCep());
				$doc->getById('logradouro')->setAttribute('value', $address->getLogradouro());
				$doc->getById('cidade')->setAttribute('value', $address->getCidade());
				$doc->getById('bairro')->setAttribute('value', $address->getBairro());
				$doc->getById('numero')->setAttribute('value', $address->getNumero());
				$doc->getById('complemento')->setAttribute('value', $address->getComplemento());

				/*
				 * Informações de trabalho
				 */
				$doc->getById('matricula')->setAttribute('value', $user->getMatricula());
				$doc->getById('data-rescisao')->setAttribute('value', $user->getDataRescisao('d/m/Y'));
				$doc->getById('data-contratacao')->setAttribute('value', $user->getDataContratacao('d/m/Y'));
				$doc->getById('cargo')->setValue($user->getCargoId());
				$doc->getById('departamento')->setValue($user->getDepartamentoId());

				/*
				 * Permissões.
				 */
				$component = new CheckListComponent();
				$component->setSource($user->getPerfil()->getPermissaos(), 'permissaos[]', true);
				$doc->find('.js-box-permissions')->getFirst()->append($component);

				/*
				 * Botão de ativar e desativar.
				 */
				if(!$user->getAtivo())
				{
					HtmlDocument::getById('js-disable-user')->removeCssClass('hide');
					HtmlDocument::getById('js-new-user')->remove();
				}
				else
				{
					HtmlDocument::getById('js-disable-user')->removeCssClass('hide');
					HtmlDocument::getById('js-new-user')->remove();
				}

				/*
				 * Logar como.
				 */
				if($currentUser->temPermissao('logar-como'))
					HtmlDocument::getById('js-change-user')->toType('HtmlLink')->setUrl("~/dashboard/trocar-usuario/{$user->getId()}");
				else
					HtmlDocument::getById('js-change-user')->remove();

				/*
				 * Imagem de perfil
				 */
				$userImage = File::search("{$this->getUserDir($user)}original*");

				if(!$userImage->isEmpty())
				{
					$img = new HtmlImage("~/resource/default/img/usuarios/{$user->getId()}/{$userImage->getFirst()->getName()}?" . time());
					$span = new HtmlElement('span');
					$link = new HtmlLink('javascript:;');
					$wrapper = new HtmlElement('div');

					$wrapper->addCssClass('wrapper-current-img');
					$link->addCssClass('btn btn-white m-l-20');
					$link->append('<i class="fa fa-refresh"></i> Cambiar imagen');

					$span->append($img);
					$wrapper->append($span);
					$wrapper->append($link);
					HtmlDocument::find('.dropzone')->getFirst()->after($wrapper);
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
			else
			{
				// o ID do usuário é inválido, então nós também mostramos um
				// erro para o usuário
				$this->pageNotFound();
			}
		}
		else
		{
			// o ID do usuário não foi passado, então nós mostramos um erro
			// para o usuário
			$this->pageNotFound();
		}
	}

	/**
	 * Exibe a página com as informações do usuário.
	 * @param ArrayList $params Array de parâmetros recebidos na requisição. O
	 * ID do usuário é o primeiro item no array.
	 */
	public function ver(ArrayList $params = null)
	{
		if(ArrayList::isValid($params) && !$params->isEmpty())
		{
			$user = UsuarioQuery::create()->findPk($params[0]);

			if($user)
			{
				$this->view->setHtmlPage('Usuario.Ver');
				$this->view->addResource('~/plugins/jquery-validation/js/jquery.validate.min.js');
				$this->view->addResource('~/plugins/jquery-validation/js/messages_pt-BR.js');
				$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
				$this->view->addResource('~/plugins/dropzone/dropzone.min.js');
				$this->view->addResource('~/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');
				$this->view->addResource('~/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js');
				$this->view->addResource('~/plugins/bootstrap-datepicker/css/datepicker.css');
				$this->view->addResource('~/js/user.js');
				$this->view->initializePage();
				$this->setActiveMenuItem('Usuarios');

				$currentUser = Usuario::atual();
				$doc = HtmlDocument::getCommomDocument();

				DataManager::set('perfis', PerfilQuery::create()->filterByNivel($currentUser->getNivelAcesso(), Criteria::LESS_EQUAL)->find());
				DataManager::set('cargos', CargoQuery::create()->find());
				DataManager::set('departamentos', DepartamentoQuery::create()->find());
				DataManager::set('estadoCivil', Usuario::$maritalStatus);

				/*
				 * Personalização do formulário
				 */
				$name = Text::split(' ', $user->getNome(), 2);
				HtmlDocument::find('.page-title h3')->getFirst()->html("{$name[0]} <span class='semi-bold'>" . (isset($name[1]) ? $name[1] : '') . "</span>");
				$audit = AuditoriaQuery::getMensagens(Auditoria::TIPO_USUARIO, $user->getId(), 'O usuário foi cadastrado')->findOne();
				HtmlDocument::find('.page-title h3 + p')->getFirst()->html($audit ? 'Usuário desde ' . $audit->getData('d/m/Y') : 'Usuário ansião');
				HtmlDocument::getById('js-change-password')->toType('HtmlLink')->setUrl("~/usuario/alterar-senha/{$user->getId()}");
				HtmlDocument::getById('js-history-link')->toType('HtmlLink')->setUrl(Enviroment::resolveUrl("~/usuario/historico/{$user->getId()}"));
				HtmlDocument::getById('js-edit-user')->toType('HtmlLink')->setUrl(Enviroment::resolveUrl("~/usuario/editar/{$user->getId()}"));

				/*
				 * Informações básicas
				 */
				$doc->getById('id')->setAttribute('value', $user->getId());
				$doc->getById('nome')->setAttribute('value', $user->getNome());
				$doc->getById('perfil')->setValue($user->getPerfilId());
				$doc->getById('email')->setAttribute('value', $user->getEmail());
				$doc->getById('telefone')->setAttribute('value', $user->getTelefone());
				$doc->getById('dni')->setAttribute('value', $user->getDni());
				$doc->getById('data-nascimento')->setAttribute('value', $user->getDataNascimento('d/m/Y'));
				$doc->getById('celular')->setAttribute('value', $user->getCelular());
				$doc->getById($user->getSexo() == 'M' ? 'masculino' : 'femenino')->setAttribute('checked', 'checked');
				$doc->getById($user->getTipoAcesso() == Usuario::TIPO_ACESSO_MOBILE ? 'mobile' : 'back-end')->setAttribute('checked', 'checked');

				/*
				 * Endereço
				 */
				$address = $user->getEndereco();
				$doc->getById('cep')->setAttribute('value', $address->getCep());
				$doc->getById('logradouro')->setAttribute('value', $address->getLogradouro());
				$doc->getById('cidade')->setAttribute('value', $address->getCidade());
				$doc->getById('bairro')->setAttribute('value', $address->getBairro());
				$doc->getById('numero')->setAttribute('value', $address->getNumero());
				$doc->getById('complemento')->setAttribute('value', $address->getComplemento());

				/*
				 * Informações de trabalho
				 */
				$doc->getById('matricula')->setAttribute('value', $user->getMatricula());
				$doc->getById('data-rescisao')->setAttribute('value', $user->getDataRescisao('d/m/Y'));
				$doc->getById('data-contratacao')->setAttribute('value', $user->getDataContratacao('d/m/Y'));
				$doc->getById('cargo')->setValue($user->getCargoId());
				$doc->getById('departamento')->setValue($user->getDepartamentoId());

				/*
				 * Permissões.
				 */
				$component = new CheckListComponent();
				$component->setSource($user->getPerfil()->getPermissaos(), 'permissaos[]', true);
				$doc->find('.js-box-permissions')->getFirst()->append($component);

				/**
				 * @todo adicionar checked em todos os inputs.
				 */
				foreach($doc->find('input[type="checkbox"') as $input)
				{
					$input->setChecked(true);
					$input->setAttribute('disabled', true);
					$input->setAttribute('checked', true);
				}

				/*
				 * Logar como.
				 */
				if($currentUser->temPermissao('logar-como'))
					HtmlDocument::getById('js-change-user')->toType('HtmlLink')->setUrl("~/dashboard/trocar-usuario/{$user->getId()}");
				else
					HtmlDocument::getById('js-change-user')->remove();

				/*
				 * Imagem de perfil
				 */
				HtmlDocument::getById('user-profile')->setAttribute('src', $user->getImagem('original', true));

				/*
				 * Desabilita todos os campos.
				 */
				$this->setInputsReadOnly();

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
			else
			{
				// o ID do usuário é inválido, então nós também mostramos um
				// erro para o usuário
				$this->pageNotFound();
			}
		}
		else
		{
			// o ID do usuário não foi passado, então nós mostramos um erro
			// para o usuário
			$this->pageNotFound();
		}
	}

	/**
	 * Atualiza os dados de um usuário no banco de dados.
	 */
	public function atualizar()
	{
		$validator = new Validator;
		$validator->loadPolicy('Usuario/Editar');
		$result = $this->createResult();

		if($validator->validate())
		{
			$user = UsuarioQuery::getAtivos()->findPk($validator->getInputValue('id'));
			$currentUser = Usuario::atual();

			if($user)
			{
				$clone = $user->toArray();

//				$user->setNome($validator->getInputValue('nome'));
//				$user->setTelefone(Text::remove('/\D/', $validator->getInputValue('telefone')));

				/*
				 * Informações básicas
				 */
				$nome			= $validator->getInputValue('nome');
				$profileId		= $validator->getInputValue('perfil');
				$phone			= Text::remove('/\D/', $validator->getInputValue('telefone'));
				$dni			= Text::remove('/\D/',$validator->getInputValue('dni'));
				$email			= $validator->getInputValue('email');
				$cellPhone		= Text::remove('/\D/', $validator->getInputValue('celular'));
				$birthDate		= Utils::formatDateDb($validator->getInputValue('data-nascimento'));
				$maritalStatus	= $validator->getInputValue('estado-civil');
				$gender			= $validator->getInputValue('sexo');
				$typeAccess		= $validator->getInputValue('tipo-acesso');

				/*
				 * Informações do trabalho.
				 */
//				$registration		= $validator->getInputValue('matricula');
				$office				= $validator->getInputValue('cargo');
				$departament		= $validator->getInputValue('departamento');
				$hiringDate			= Utils::formatDateDb($validator->getInputValue('data-contratacao'));
				$terminationDate	= Utils::formatDateDb($validator->getInputValue('data-rescisao'));

				/*
				 * Endereço
				 */
				$cep			= Utils::getJustNumber($validator->getInputValue('cep'));
				$logradouro		= $validator->getInputValue('logradouro');
				$numero			= $validator->getInputValue('numero');
				$complemento	= $validator->getInputValue('complemento');
				$cidade			= $validator->getInputValue('cidade');
				$bairro			= $validator->getInputValue('bairro');

				/*
				 * Informações básicas.
				 */
				$user->setNome($nome);
				$user->setEmail($email);
				$user->setPerfilId($profileId);
				$user->setDni($dni);
				$user->setTelefone($phone);
				$user->setCelular($cellPhone);
				$user->setDataNascimento($birthDate);
				$user->setEstadoCivil($maritalStatus);
				$user->setTipoAcesso($typeAccess);
				$user->setSexo($gender);

				/*
				 * Informações do trabalho.
				 */
//				$user->setMatricula($registration);
				$user->setCargoId($office);
				$user->setDepartamentoId($departament);
				$user->setDataContratacao($hiringDate);
				$user->setDataRescisao($terminationDate);

				/*
				 * Endereço.
				 */
				$address = $user->getEndereco();
				$address->setCep($cep);
				$address->setNumero($numero);
				$address->setComplemento($complemento);
				$address->setLogradouro($logradouro);
				$address->setCidade($cidade);
				$address->setBairro($bairro);
				$user->setEndereco($address);


				try
				{
					$user->save();
					$this->salvarImagem($user);

					$result->message = 'Usuário atualizado com sucesso';
					$result->type = 'success';
					$result->success = true;

					$obs = Utils::getDifferenceDetais($user->toArray(), $clone, $user);
					Auditoria::adicionar('O usuário foi atualizado', Auditoria::LEVEL_INFO, $currentUser, $obs, Auditoria::TIPO_USUARIO, $user->getId());
				}
				catch(PropelException $ex)
				{
					Propel::getConnection()->rollBack();
					Report::sendError(new Error($ex));
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
				$result->message = 'Nenhum usuário foi localizado';
			}
		}
		else
		{
			$result->message = 'Existem erros no formulário. Corrija-os antes de submeter o formulário novamente.';
			$result->type = 'error';
			$result->result = $validator->getResult();
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Gera uma nova senha aleatória e envia para o email do usuário.
	 * @param ArrayList $params Array de parâmetros recebidos na requisição. O
	 * ID do usuário é o primeiro item no array.
	 */
	public function alterarSenha(ArrayList $params = null)
	{
		$result = $this->createResult();

		if(ArrayList::isValid($params) && !$params->isEmpty())
		{
			$user = UsuarioQuery::getAtivos()->findPk($params[0]);

			if($user)
			{
				$this->alterarSenhaUsuario($user, $result);
			}
			else
			{
				$result->message = 'Nenhum usuário foi localizado';
				$result->type = 'error';
			}
		}
		else
		{
			$result->message = 'Nenhum usuário foi localizado';
			$result->type = 'error';
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Exibe a página de log de acesso dos usuários.
	 */
	public function log()
	{
		$this->view->setHtmlPage('Usuario.Log');
		$this->view->addResource('~/plugins/jquery-datatable/css/jquery.dataTables.css');
		$this->view->addResource('~/plugins/datatables-responsive/css/datatables.responsive.css');
		$this->view->addResource('~/plugins/jquery-datatable/jquery.dataTables.min.js');
		$this->view->addResource('~/plugins/jquery-datatable/extra/js/TableTools.min.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/datatables.responsive.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/lodash.min.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/js/user.js');
		$this->view->initializePage();
		$this->setActiveMenuItem('Usuarios');

		if(Usuario::atual()->temPermissao('filtrar-resultados'))
		{
			$fields = FilterContainerComponent::getAvailableFilters($this->filterColumns, 'label');

			if(Usuario::atual()->getNivelAcesso() == Usuario::NIVEL_ACESSO_MUNICIPAL)
				unset($fields[7], $fields[8]);
			elseif(Usuario::atual()->getNivelAcesso() == Usuario::NIVEL_ACESSO_ESTADUAL)
				unset($fields[8]);

			if(!Usuario::atual()->temPermissao('gerenciar-niveis-acesso'))
				unset($fields[5], $fields[6]);

			HtmlDocument::find('.js-filter', 'FilterComponent')->getFirst()->populate($fields);
		}
		else
		{
			HtmlDocument::find('.filter-export-container')->getFirst()->remove();
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
	 * Lista os acessos dos usuários. A resposta é devolvida via Ajax apenas, no
	 * formato JSON.
	 */
	public function carregarLog()
	{
		$validator = new Validator;
		$validator->loadPolicy('Listar');
		$result = $this->createResult();

		try
		{
			if($validator->validate())
			{
				$start = $validator->hasInputValue('start') ? (int)$validator->getInputValue('start') : 0;
				$length = $validator->hasInputValue('length') ? (int)$validator->getInputValue('length') : 10;
				$draw = $validator->hasInputValue('draw') ? (int)$validator->getInputValue('draw') : 1;
				$page = $start > 0 ? intval($start / $length) + 1 : 1;
				$search = $validator->hasInputValue('search') ? $validator->getInputValue('search') : null;
				$filterField = $validator->hasInputValue('campo') ? $validator->getInputValue('campo') : null;
				$filterCondition = $validator->hasInputValue('condicao') ? $validator->getInputValue('condicao') : null;
				$filterValue = $validator->hasInputValue('valor') ? $validator->getInputValue('valor') : null;
				$filterOperator = $validator->hasInputValue('operador') ? $validator->getInputValue('operador') : null;
				$export = $validator->hasInputValue('exportar') ? $validator->getInputValue('exportar') == 1 : false;
				$exportFileType = $validator->hasInputValue('tipo') ? $validator->getInputValue('tipo') : null;

				$exportFields = array(
					array(
						'label' => 'Data',
						'name' => 'Data',
						'type' => 'date',
					),
					array(
						'label' => 'IP',
						'name' => 'Ip',
					),
					array(
						'label' => 'Evento',
						'name' => 'Mensagem',
					),
				);

				$table = AuditoriaQuery::create('a')
					->filterByTipo(Auditoria::TIPO_USUARIO)
					->filterByNivel(Auditoria::LEVEL_INFO)
					->orderByData(Criteria::DESC)
					->joinUsuario('u')
					->_if($export)
						->select(FilterContainerComponent::getFiltersPropery($exportFields, 'name'))
					->_else()
						->select(array('u.Nome', 'u.Email', 'Data', 'Ip', 'Mensagem', 'Observacao'))
					->_endif();

				if(!empty($filterField))
				{
					$fields = FilterContainerComponent::getAvailableFilters($this->filterColumns, 'name');

					foreach($filterField as $i => $fieldIndex)
					{
						if(isset($fields[$fieldIndex]))
						{
							$currentFilter = $this->filterColumns[$fieldIndex];
							$fieldName = $currentFilter['name'];
							$condition = FilterComponent::getCondition($filterCondition[$i]);
							$fieldValue = FilterComponent::getValueForCondition($i, $filterCondition, $filterValue);

							if(!preg_match('#^\w+\.#', $fieldName))
								$fieldName = "u.{$fieldName}";

							if($fieldName)
							{
								$table
									->_if(($i > 0) && ($filterOperator[$i - 1] == 2))
										->_or()
									->_endif()
									->where("{$fieldName} {$condition} ?", $fieldValue);
							}
						}
					}
				}

				if(isset($search['value']) && !empty($search['value']))
				{
					$searchValue = Text::plain($search['value']);
					$table
						->condition('c1', 'a.Mensagem LIKE ?', "%{$searchValue}%")
						->condition('c2', 'u.Email LIKE ?', "%{$searchValue}%")
						->combine(array('c1', 'c2'), Criteria::LOGICAL_OR);
				}

				if(!$export)
				{
					$records = $table->paginate($page, $length);

					$result->recordsTotal = $records->getNbResults();
					$result->success = true;
					$result->data = array();
					$result->recordsFiltered = $records->count();
					$result->draw = $draw;

					if(!empty($records))
					{
						foreach($records as $record)
						{
							$result->data[] = array(
								Utils::formatDate($record['Data']),
								$record['u.Nome'],
								$record['u.Email'],
								$record['Ip'],
								!empty($record['Observacao']) ? "<span data-original-title='Detalhes' data-content='{$record['Observacao']}' data-toggle='popover'>{$record['Mensagem']}</span>" : $record['Mensagem'],
							);
						}
					}
				}
				else
				{
					FilterContainerComponent::exportReport('Log_de_acesso', $this->getReportsDir(), 'usuario', $exportFields, $table, $result, $exportFileType);
				}
			}
			else
			{
				$result->message = 'O número da página é inválido';
			}
		}
		catch(PropelException $ex)
		{
			$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
			$result->type = 'error';
			Report::sendError(new Error($ex));
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
	 * Exibe a página da conta do usuário logado.
	 */
	public function meuPerfil()
	{
		$user = Usuario::atual();

		if($user)
		{
			$this->view->setHtmlPage('Usuario.MeuPerfil');
			$this->view->addResource('~/plugins/jquery-validation/js/jquery.validate.min.js');
			$this->view->addResource('~/plugins/jquery-validation/js/messages_pt-BR.js');
			$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
			$this->view->addResource('~/plugins/dropzone/dropzone.min.js');
			$this->view->addResource('~/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');
			$this->view->addResource('~/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js');
			$this->view->addResource('~/plugins/bootstrap-datepicker/css/datepicker.css');
			$this->view->addResource('~/js/user.js');
			$this->view->initializePage();

			$doc = HtmlDocument::getCommomDocument();

			DataManager::set('perfis', PerfilQuery::create()->filterByNivel($user->getNivelAcesso(), Criteria::LESS_EQUAL)->find());
			DataManager::set('cargos', CargoQuery::create()->find());
			DataManager::set('departamentos', DepartamentoQuery::create()->find());
			DataManager::set('estadoCivil', Usuario::$maritalStatus);

			/*
			 * Personalização do formulário
			 */
			$name = Text::split(' ', $user->getNome(), 2);
			HtmlDocument::find('.page-title h3')->getFirst()->html("{$name[0]} <span class='semi-bold'>" . (isset($name[1]) ? $name[1] : '') . "</span>");


			/*
			 * Informações básicas
			 */
			$doc->getById('id')->setAttribute('value', $user->getId());
			$doc->getById('nome')->setAttribute('value', $user->getNome());
			$doc->getById('perfil')->setValue($user->getPerfilId());
			$doc->getById('email')->setAttribute('value', $user->getEmail());
			$doc->getById('telefone')->setAttribute('value', $user->getTelefone());
			$doc->getById('dni')->setAttribute('value', $user->getDni());
			$doc->getById('data-nascimento')->setAttribute('value', $user->getDataNascimento('d/m/Y'));
			$doc->getById('celular')->setAttribute('value', $user->getCelular());
			$doc->getById($user->getSexo() == 'M' ? 'masculino' : 'femenino')->setAttribute('checked', 'checked');
			$doc->getById($user->getTipoAcesso() == Usuario::TIPO_ACESSO_MOBILE ? 'mobile' : 'back-end')->setAttribute('checked', 'checked');

			/*
			 * Endereço
			 */
			$address = $user->getEndereco();
			$doc->getById('cep')->setAttribute('value', $address->getCep());
			$doc->getById('logradouro')->setAttribute('value', $address->getLogradouro());
			$doc->getById('cidade')->setAttribute('value', $address->getCidade());
			$doc->getById('bairro')->setAttribute('value', $address->getBairro());
			$doc->getById('numero')->setAttribute('value', $address->getNumero());
			$doc->getById('complemento')->setAttribute('value', $address->getComplemento());

			/*
			 * Informações de trabalho
			 */
			$doc->getById('matricula')->setAttribute('value', $user->getMatricula());
			$doc->getById('data-rescisao')->setAttribute('value', $user->getDataRescisao('d/m/Y'));
			$doc->getById('data-contratacao')->setAttribute('value', $user->getDataContratacao('d/m/Y'));
			$doc->getById('cargo')->setValue($user->getCargoId());
			$doc->getById('departamento')->setValue($user->getDepartamentoId());

			/*
			 * Permissões.
			 */
			$component = new CheckListComponent();
			$component->setSource($user->getPerfil()->getPermissaos(), 'permissaos[]', true);
			$doc->find('.js-box-permissions')->getFirst()->append($component);

			/*
			 * Imagem de perfil
			 */
			$userImage = File::search("{$this->getUserDir($user)}original*");

			if(!$userImage->isEmpty())
			{
				$img = new HtmlImage("~/resource/default/img/usuarios/{$user->getId()}/{$userImage->getFirst()->getName()}?" . time());
				$span = new HtmlElement('span');
				$link = new HtmlLink('javascript:;');
				$wrapper = new HtmlElement('div');

				$wrapper->addCssClass('wrapper-current-img');
				$link->addCssClass('btn btn-white m-l-20');
				$link->append('<i class="fa fa-refresh"></i> Cambiar imagen');

				$span->append($img);
				$wrapper->append($span);
				$wrapper->append($link);
				HtmlDocument::find('.dropzone')->getFirst()->after($wrapper);
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
		else
		{
			$this->response->redirect('~/dashboard');
		}
	}

	/**
	 * Atualiza os dados do usuário logado.
	 */
	public function atualizarMeuPerfil()
	{
		$validator = new Validator;
		$validator->loadPolicy('Usuario/AtualizarMeuPerfil');
		$result = $this->createResult();

		if($validator->validate())
		{
			$user = Usuario::atual();

			if($user)
			{
				$canSave = true;
				$clone = $user->toArray();

				$nome			= $validator->getInputValue('nome');
				$profileId		= $validator->getInputValue('perfil');
				$phone			= Text::remove('/\D/', $validator->getInputValue('telefone'));
				$dni			= Text::remove('/\D/',$validator->getInputValue('dni'));
				$email			= $validator->getInputValue('email');
				$cellPhone		= Text::remove('/\D/', $validator->getInputValue('celular'));
				$birthDate		= Utils::formatDateDb($validator->getInputValue('data-nascimento'));
				$maritalStatus	= $validator->getInputValue('estado-civil');
				$gender			= $validator->getInputValue('sexo');
				$typeAccess		= $validator->getInputValue('tipo-acesso');

				/*
				 * Informações do trabalho.
				 */
//				$registration		= $validator->getInputValue('matricula');
				$office				= $validator->getInputValue('cargo');
				$departament		= $validator->getInputValue('departamento');
				$hiringDate			= Utils::formatDateDb($validator->getInputValue('data-contratacao'));
				$terminationDate	= Utils::formatDateDb($validator->getInputValue('data-rescisao'));

				/*
				 * Endereço
				 */
				$cep			= Utils::getJustNumber($validator->getInputValue('cep'));
				$logradouro		= $validator->getInputValue('logradouro');
				$numero			= $validator->getInputValue('numero');
				$complemento	= $validator->getInputValue('complemento');
				$cidade			= $validator->getInputValue('cidade');
				$bairro			= $validator->getInputValue('bairro');

				/*
				 * Informações básicas.
				 */
				$user->setNome($nome);
				$user->setEmail($email);
				$user->setPerfilId($profileId);
				$user->setDni($dni);
				$user->setTelefone($phone);
				$user->setCelular($cellPhone);
				$user->setDataNascimento($birthDate);
				$user->setEstadoCivil($maritalStatus);
				$user->setTipoAcesso($typeAccess);
				$user->setSexo($gender);

				/*
				 * Informações do trabalho.
				 */
//				$user->setMatricula($registration);
				$user->setCargoId($office);
				$user->setDepartamentoId($departament);
				$user->setDataContratacao($hiringDate);
				$user->setDataRescisao($terminationDate);

				/*
				 * Endereço.
				 */
				$address = $user->getEndereco();
				$address->setCep($cep);
				$address->setNumero($numero);
				$address->setComplemento($complemento);
				$address->setLogradouro($logradouro);
				$address->setCidade($cidade);
				$address->setBairro($bairro);
				$user->setEndereco($address);

				if($validator->hasInputValue('nova-senha'))
				{
					if($user->validaSenha($validator->getInputValue('senha')))
					{
						if(Utils::encrypt($validator->getInputValue('nova-senha')) != $user->getSenha())
						{
							$user->setSenha(Utils::encrypt($validator->getInputValue('nova-senha')));
						}
						else
						{
							$result->message = 'Não foi possível salvar';
							$result->type = 'error';
							$result->result = array(
								'nova-senha' => 'A nova senha é idêntica à senha atual. Informe uma senha diferente.'
							);

							$canSave = false;
						}
					}
					else
					{
						$result->message = 'Não foi possível salvar';
						$result->type = 'error';
						$result->result = array(
							'senha' => 'A senha atual está incorreta! Tente novamente.'
						);

						$canSave = false;
					}
				}
				elseif($validator->hasInputValue('senha'))
				{
					$result->message = 'Não foi possível salvar';
					$result->type = 'error';
					$result->result = array(
						'nova-senha' => 'A senha atual foi informada mas você não informou a nova senha'
					);

					$canSave = false;
				}

				if($canSave)
				{
					try
					{
						$user->save();
						$this->salvarImagem($user);

						/*
						 * Reloga o usuário para carregar as permissões.
						 */
						SystemAccessLogin::getCurrent()->close();
						$login = new SystemAccessLogin($user->getEmail());
						$login->setValue('userId', $user->getId());
						$login->setValue('userName', $user->getNome());
						$login->setRole($user->getPerfilId());

						foreach($user->getPerfil()->getPermissaos() as $permission)
							$login->addPermission(new SystemAccessPermission($permission->getId(), $permission->getSlug()));

						$login->save();

						$obs = Utils::getDifferenceDetais($user->toArray(), $clone, $user);
						Auditoria::adicionar('O usuário atualizou seus próprios dados', Auditoria::LEVEL_INFO, null, $obs, Auditoria::TIPO_USUARIO, $user->getId());

						$result->success = true;
						$result->message = 'Cadastro atualizado com sucesso';
						$result->type = 'success';
						$result->callback = 'redirect';
						$result->url = Enviroment::resolveUrl('~/usuario/meu-perfil');
						$result->time = 2000;
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
			}
			else
			{
				$result->message = 'Nenhum usuário foi localizado';
			}
		}
		else
		{
			$result->message = 'Existem erros no formulário. Corrija-os antes de submeter o formulário novamente.';
			$result->type = 'error';
			$result->result = $validator->getResult();
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Exibe a página de histócio de um usuário.
	 * @param ArrayList $params Array de parâmetros recebidos na requisição. O
	 * ID do usuário é o primeiro item no array.
	 */
	public function historico(ArrayList $params = null)
	{
		if(ArrayList::isValid($params) && !$params->isEmpty())
		{
			$user = UsuarioQuery::create()->findPk($params[0]);
			$currentUser = Usuario::atual();

			if($user)
			{
				$this->view->setHtmlPage('Usuario.Historico');
				$this->view->initializePage();
				$this->setActiveMenuItem('Usuarios');
				HtmlDocument::getById('js-edit-user')->toType('HtmlLink')->setUrl(Enviroment::resolveUrl('~/usuario/editar/'. $user->getId()));

				if(!$currentUser->temPermissao('cadastrar-usuario'))
					HtmlDocument::getById('new-user')->remove();

				HtmlDocument::getById('js-view-user')->toType('HtmlLink')->setUrl(Enviroment::resolveUrl('~/usuario/ver/' . $user->getId()));

				/*
				 * Personalização do formulário
				 */
				HtmlDocument::find('.page-title h3')->getFirst()->html("Histórico de <span class='semi-bold'>{$user->getNome()}</span>");
				$timeline = HtmlDocument::getById('timeline');

				if(Usuario::atual()->temPermissao('somente-leitura'))
					HtmlDocument::find('.page-title .btn-success')->getLast()->remove();

				$stories = AuditoriaQuery::getHistorico(Auditoria::TIPO_USUARIO, $user->getId())->find();

				if(!$stories->isEmpty())
				{
					foreach($stories as $story)
					{
						$component = new StoryComponent;
						$component->populateObject($story);
						$timeline->append($component);
					}
				}
				else
				{
					$notification = new HtmlElement('div');
					$notification->addCssClass('no-stories m-t-40');
					$notification->html('<i class="fa fa-file-o"></i><br>O histórico está vazio');

					$timeline->parentNode->removeCssClass('col-md-10');
					$timeline->parentNode->addCssClass('col-md-12');
					$timeline->replaceBy($notification);
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
			else
			{
				// o ID do filiado é inválido, então nós também mostramos um
				// erro para o filiado
				$this->pageNotFound();
			}
		}
		else
		{
			// o ID do filiado não foi passado, então nós mostramos um erro
			// para o filiado
			$this->pageNotFound();
		}
	}

	/**
	 * Inicia o processo de definição da imagem do usuário.
	 *
	 * Este método vai apenas receber a imagem enviada e guará-la no diretório
	 * temporário da aplicação. Quando o formulário do usuário for submetido,
	 * a imagem será então movida para a pasta do usuário.
	 */
	public function uploadImagem()
	{
		$validator = new Validator;
		$validator->loadPolicy('UploadImagem');
		$result = $this->createResult();

		if($validator->validate())
		{
			if(Session::exists('userProfileImage'))
			{
				File::remove($this->application->getPath('temp') . Session::get('userProfileImage'));
				Session::remove('userProfileImage');
			}

			$rules = $validator->getRules();
			$upload = new UploadManager;
			$upload->setAllowedExtensions($rules['file']->getTypes());
			$upload->setMaxFileSize($rules['file']->getSize());

			try
			{
				$fileExt = Text::split('.', $upload->getFile('file')->name)->getLast();
				$upload->setNewName(Serial::create()->generate() . ".$fileExt");
				$upload->save($this->application->getPath('temp'));
				Session::set('userProfileImage', $upload->getNewName());

				if($validator->hasInputValue('usuario'))
				{
					if(($user = UsuarioQuery::getAtivos()->findPk($validator->getInputValue('usuario'))))
					{
						$this->salvarImagem($user);
					}
				}

				$result->callback = 'userUploadSuccess';
				$result->success = true;
			}
			catch(UploadError $error)
			{
				Report::sendError($error);
				$result->message = '<i class="fa fa-warning"></i> <span><strong>Ocorreu um erro inesperado</strong><span>Tente enviar a imagem novamente</span></span>';
			}
		}
		else
		{
			$result->result = $validator->getResult();
			$result->message = '<i class="fa fa-warning"></i> <span><strong>A imagem enviada é inválida</strong><span>Selecione outra imagem</span></span>';
		}

		$this->sendAjaxResponse($result, $result->success ? 200 : 500);
	}

	/**
	 * Finaliza o processo de upload da imagem do usuário.
	 *
	 * O que este método faz é apenas copiar a imagem enviada da pasta
	 * temporária da aplicação para a pasta do usuário, identificada pelo
	 * próprio ID do usuário. A imagem é renomeada e miniaturas são criadas.
	 *
	 * Se o usuário já tiver uma imagem e a estiver substituindo por outra, a
	 * imagem antiga será perdida.
	 * @param Usuario $user Objeto do usuário que está tendo sua imagem
	 * atualizada.
	 */
	private function salvarImagem(Usuario $user)
	{
		if(Session::exists('userProfileImage'))
		{
			$baseDir = $this->getUserDir($user);

			// remove o diretório atual do usuário
			if(Dir::exists($baseDir))
			{
				$files = Dir::open($baseDir)->getFiles();

				foreach($files as $file)
				{
					if(preg_match('/^(?:original|perfil)/', $file->getName()))
						File::remove($file);
				}
			}

			$fullFilePath = $this->application->getPath('temp') . Session::get('userProfileImage');
			Session::remove('userProfileImage');

			$file = File::open($fullFilePath);
			$file->copyTo($this->getUserDir($user) . 'original.' . $file->getExtension());
			$file->moveTo($this->getUserDir($user) . 'perfil.' . $file->getExtension());

			$img = new Thumb($file->getPath());
			$img->resize(125, 125, true);

			$img->setName('perfil-p');
			$img->resize(40, 40, true);

			Auditoria::adicionar('La imagen del usuario ha cambiado', Auditoria::LEVEL_INFO, null, null, Auditoria::TIPO_USUARIO, $user->getId());
		}
	}

	/**
	 * Retorna o caminho da pasta onde os arquivos do usuário serão salvos.
	 *
	 * O diretório é criado automaticamente caso ainda não exista.
	 * @param Usuario $user Instância de um usuário.
	 * @return string Caminho do diretório do usuário.
	 */
	private function getUserDir(Usuario $user)
	{
		$userDir = $this->application->getPath('resources') . 'img/usuarios/' . $user->getId() . '/';

		if(!Dir::exists($userDir))
			Dir::create($userDir);

		return $userDir;
	}

    /**
     * Realiza busca de endereço por CEP, retorna objeto em formato JSON
     * @param ArrayList $params Parametro recebido, espera-se o CEP
     * @author Fernando Messas.
     */
    public function buscaCep(ArrayList $params = null)
    {
        $result = $this->createResult();

        if(ArrayList::isValid($params) && !$params->isEmpty())
        {
            try
            {
                $cep = $params[0];
                $endereco = EnderecoCorreioQuery::create()->findOneByCep($cep);
                $city = null;

                if($endereco)
                {
					$citySearch = CidadeQuery::create()
						->filterByUfId($endereco->getUfId())
						->filterByNome($endereco->getCidade())
						->findOne();

					if(!empty($citySearch))
						$city = array('id' => $citySearch->getId(), 'text' => $citySearch->getNome());

                    $result->endereco = array(
                        'logradouro' => $endereco->getLogradouro(),
                        'bairro' => $endereco->getBairro(),
                        'uf' => $endereco->getUfId(),
                        'cidade' => $city
                    );

                    $result->success = true;
                }
                else
                {
                    $result->success = false;
                    $result->message = 'Nenhum endereço localizado para este cep!';
                }
            }
            catch(PropelException $ex)
            {
                $result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
                $result->type = 'error';
                Report::sendError(new Error($ex));
            }
            catch(Error $error)
            {
                $result->message = self::DEFAULT_ERROR_MESSAGE;
                $result->type = 'error';
                Report::sendError($error);
            }
        }
        else
        {
            $result->message='CEP inválido';
        }

        $this->sendAjaxResponse($result);
    }

	/**
	 * Função que inicia a recuperação da senha do usuario (App)
	 * @param ArrayList $params Token do usuário
	 * @author Hugo Minari
	 */
	public function recuperarSenha(ArrayList $params = null)
	{
		if(ArrayList::isValid($params))
		{
			$tokenSenha = $params->getFirst();
			$usuario = UsuarioQuery::getAtivos()
				->findOneByTokenSenha($tokenSenha);

			if($usuario)
			{
				$this->view->setTemplate('blank');
				$this->view->setHtmlPage('Usuario.RecuperarSenha');
				$this->view->addResource('~/plugins/jquery-validation/js/jquery.validate.min.js');
				$this->view->addResource('~/plugins/jquery-validation/js/messages_pt-BR.js');
				$this->view->addResource('~/css/animate.min.css');
				$this->view->addResource('~/js/user.js');
				$this->view->initializePage();
				HtmlDocument::getById('token-senha')->setAttribute('value', $tokenSenha);

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
			else
			{
				$this->pageNotFound();
			}
		}
		else
		{
			$this->pageNotFound();
		}
	}

	/**
	 * Função para finalizar a recuperação de senha do usuario (App)
	 * @author Hugo Minari
	 */
	public function finalizarRecuperarSenha()
	{
		$validator = new Validator;
		$validator->loadPolicy('Usuario/RecuperarSenha');
		$result = $this->createResult();

		if($validator->validate())
		{
			try
			{
				$token_senha = $validator->getInputValue('token-senha');

				$usuario = UsuarioQuery::getAtivos()
					->findOneByTokenSenha($token_senha);

				if($usuario)
				{
					$usuario->setSenha(Utils::encrypt($validator->getInputValue('senha')));
					$usuario->setTokenSenha(null);
					$usuario->save();

					$assunto = 'Sua senha foi alterada';
					$mensagem = 'Sua senha foi alterada com sucesso no banco de dados, você já pode voltar a usar o sistema.';

					if(Utils::sendUserEmail($usuario, $assunto, $mensagem))
					{
						$sucesso = new stdClass();
						$sucesso->mensagem = 'Processo de recuperação de senha finalizado.';
					}
					else
					{
						$erro->mensagem = 'Email não foi enviado, por favor, tente novamente';
						$erro->codigo = -9;
					}

					$result->callback = 'finalizarSenha';
					$result->success = true;
					Auditoria::adicionar('Senha recuperada', Auditoria::LEVEL_INFO, $usuario, null, Auditoria::TIPO_USUARIO, $usuario->getId());
				}
				else
				{
					$result->message = 'Nenhum usuário encontrado';
					$result->type = 'error';
				}
			}

			catch(PropelException $ex)
			{
				Propel::getConnection()->rollBack();
				Report::sendError(new Error($ex->getMessage(), $ex->getCode()));
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
			$result->result = $validator->getResult();
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Ativa o cadastro do usuário no banco de dados.
	 * @param ArrayList $param Id do usuário que será ativado.
	 * @author Bruno Cordeiro.
	 */
	public function ativar(ArrayList $param)
	{
		$result = $this->createResult();

		if(ArrayList::isValid($param) && count($param) > 0)
		{
			try
			{
				$user = UsuarioQuery::create()->findPk($param[0]);

				if($user)
				{
					$user->setAtivo(true);
					$user->save();

					Auditoria::adicionar('O usuário foi ativado', Auditoria::LEVEL_INFO, null, null, Auditoria::TIPO_USUARIO, $user->getId());

					$result->message	= 'Usuário ativado com sucesso!';
					$result->type		= 'success';
					$result->id			= $user->getId();
					$result->success	= true;
				}
				else
				{
					$result->message = 'Usuário não encontrado!';
					$result->type = 'error';
				}
			}
			catch(PropelException $ex)
			{
				Propel::getConnection()->rollBack();
				Report::sendError(new Error($ex->getMessage(), $ex->getCode()));
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
			$result->message = 'O usuário é inválido';
			$result->type = 'error';
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Desativa o cadastro do usuário.
	 * @param ArrayList $param Id do usuário que será ativado.
	 * @author Bruno Cordeiro.
	 */
	public function desativar(ArrayList $param)
	{
		$result = $this->createResult();

		if(ArrayList::isValid($param) && count($param) > 0)
		{
			try
			{
				$user = UsuarioQuery::create()->findPk($param[0]);

				if($user)
				{

					$assigns = PesquisaUsuarioQuery::create()->filterByUsuario($user)->find();

					if($assigns)
					{
						foreach($assigns as $assgn)
						{
							$research = $assgn->getPesquisa();
							$assgn->delete();
							$cpf = Utils::mask($user->getCpf(), '999.999.999-99');
							$obs = "<h5><b>Nome:</b> {$user->getNome()} <b><br>CPF:</b> {$cpf}</h5>";

							Auditoria::adicionar('Pesquisador desvinculado', Auditoria::LEVEL_INFO, null, $obs, Auditoria::TIPO_PESQUISA, $research->getId());
						}
					}

					$user->setAtivo(false);
					$user->save();

					Auditoria::adicionar('O usuário foi desativado', Auditoria::LEVEL_INFO, null, null, Auditoria::TIPO_USUARIO, $user->getId());

					$result->message	= 'Usuário desativado com sucesso!';
					$result->type		= 'success';
					$result->id			= $user->getId();
					$result->success	= true;
				}
				else
				{
					$result->message = 'Usuário não encontrado!';
					$result->type = 'error';
				}
			}
			catch(PropelException $ex)
			{
				Propel::getConnection()->rollBack();
				Report::sendError(new Error($ex->getMessage(), $ex->getCode()));
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
			$result->message = 'O usuário é inválido';
			$result->type = 'error';
		}

		$this->sendAjaxResponse($result);
	}
}
?>