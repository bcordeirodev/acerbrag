<?php
/**
 * This file contains only a controller.
 * @package control
 * @subpackage page
 */

/**
 * Controler responsável pelo gerenciamento de todas as solicitações de regaste
 * de prêmios feitas pelos usuários.
 *
 * @author Bruno Cordeiro
 * @package control
 * @subpackage page
 */
class SolicitacaoResgateController extends DefaultPageController
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
			'label' => 'Título',
			'name' => 'Titulo',
			'show' => true,
		),
		array(
			'label' => 'SubTítulo',
			'name' => 'SubTitulo',
			'show' => true,
		),
		array(
			'label' => 'Descrição',
			'name' => 'Descricao',
			'show' => true,
		),
		array(
			'label' => 'Data de cadastro',
			'name' => 'DataCadastro',
			'show' => true,
			'type' => 'date',
		),
	);

	/**
	 * Exibe a lista de solicitações de resgate dos usuários cadastrados.
	 */
	public function index()
	{
		$this->view->setHtmlPage('SolicitacaoResgate.Index');
		$this->view->addResource('~/plugins/jquery-datatable/css/jquery.dataTables.css');
		$this->view->addResource('~/plugins/datatables-responsive/css/datatables.responsive.css');
		$this->view->addResource('~/plugins/jquery-datatable/jquery.dataTables.min.js');
		$this->view->addResource('~/plugins/jquery-datatable/extra/js/TableTools.min.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/datatables.responsive.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/lodash.min.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/js/prize.js');
		$this->view->initializePage();
		$this->setActiveMenuItem('Solicitações');

		$fields = FilterContainerComponent::getAvailableFilters($this->filterColumns, 'label');
		HtmlDocument::find('.js-filter', 'FilterComponent')->getFirst()->populate($fields);
		$this->restoreFilterFields($fields);

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
	public function ativas()
	{
		$this->view->setHtmlPage('Premio.Ativos');
		$this->view->addResource('~/plugins/jquery-datatable/css/jquery.dataTables.css');
		$this->view->addResource('~/plugins/datatables-responsive/css/datatables.responsive.css');
		$this->view->addResource('~/plugins/jquery-datatable/jquery.dataTables.min.js');
		$this->view->addResource('~/plugins/jquery-datatable/extra/js/TableTools.min.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/datatables.responsive.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/lodash.min.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/js/prize.js');
		$this->view->initializePage();
		$this->setActiveMenuItem('Prêmios');

		$fields = FilterContainerComponent::getAvailableFilters($this->filterColumns, 'label');
		HtmlDocument::find('.js-filter', 'FilterComponent')->getFirst()->populate($fields);
		$this->restoreFilterFields($fields);

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
	public function inativas()
	{
		$this->view->setHtmlPage('Premio.Inativos');
		$this->view->addResource('~/plugins/jquery-datatable/css/jquery.dataTables.css');
		$this->view->addResource('~/plugins/datatables-responsive/css/datatables.responsive.css');
		$this->view->addResource('~/plugins/jquery-datatable/jquery.dataTables.min.js');
		$this->view->addResource('~/plugins/jquery-datatable/extra/js/TableTools.min.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/datatables.responsive.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/lodash.min.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/js/prize.js');
		$this->view->initializePage();
		$this->setActiveMenuItem('Prêmios');

		$fields = FilterContainerComponent::getAvailableFilters($this->filterColumns, 'label');
		HtmlDocument::find('.js-filter', 'FilterComponent')->getFirst()->populate($fields);
		$this->restoreFilterFields($fields);

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
	 * Lista as notícias ativas do sistema baseado no perfil do usuário .
	 */
	public function listarPendentes()
	{
		$this->doList(SolicitacaoResgateQuery::create('p')->filterByAtivo(true));
	}

	/**
	 * Lista os notícias inativas do sistema baseado no perfil do usuário .
	 */
	public function listarRecusados()
	{
		$this->doList(SolicitacaoResgateQuery::create('sc')->filterByAtivo(false));
	}

	/**
	 * Lista todas as agendas cadastradas no sistema.
	 */
	public function listarTodos()
	{
		$this->doList(SolicitacaoResgateQuery::create('sc'));
	}

	/**
	 * Lista todas as agendas cadastradas no sistema.
	 */
	public function listarAprovados()
	{
		$this->doList(SolicitacaoResgateQuery::create('sc'));
	}

	/**
	 * Lista as noticias salvas no banco de dados de acordo com o perfil do
	 * usuário. A resposta é devolvida via Ajax apenas, no formato JSON.
	 *
	 * @param IgrejaQuery $table Consulta na tabela igreja com paramêtros
	 * fornecidos previsamente.
	 */
	public function doList(SolicitacaoResgateQuery $table)
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

				FilterContainerComponent::saveState("filter{$this->getControllerName()}");

				$table ->_if($export)
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
								$fieldName = "n.{$fieldName}";

							if(isset($currentFilter['type']) && $currentFilter['type'] == 'date')
								$fieldValue = Utils::formatDateDb($fieldValue);

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
						->condition('c1', 'p.Nome LIKE ?', "%{$searchValue}%")
						->condition('c2', 'p.Descricao LIKE ?', "%{$searchValue}%")
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
						foreach($records as $prize)
						{
							$prize instanceof SolicitacaoResgate;
							$requester	= $prize->getUsuarioRelatedBySolicitanteId();

							$links = '<div class="btn-group pull-right">
										<a href="' . $baseUrl . 'premio/ver/' . $prize->getId() . '" class="btn btn-small btn-white"><i class="mdi mdi-eye m-r-5"></i> Ver</a>
										<button class="btn btn-small btn-white dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a href="' . $baseUrl . 'premio/editar/' . $prize->getId() . '">Editar</a></li>
											<li><a href="' . $baseUrl . 'premio/historico/' . $prize->getId() . '">Histórico</a></li>
										</ul>
									</div>';

							$result->data[] = array(
								$requester->getNome(),
								$requester->getDepartamento()->getNome(),
								$prize->getDataSolicitacao('d/m/Y H:i:s'),
								($prize->getAprovada() == true ? 'Aprovada' : 'Pendente'),
								$prize->getPremio()->getNome(),
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
	 * @param ArrayList $params (opcional) Lista de parâmetros recebidos. O
	 * primeiro indica o nome da tabela de onde os registros serão retornados.
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

					if($table && ($search != ""))
					{
						$table
							->setModelAlias('a')
							->_if(!empty($search))
								->where('a.Nome LIKE ?', "%{$search}%")
							->_endif();
					}

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

//	/**
//	 * Envia o arquivo de exportação para o browser da filial.
//	 *
//	 * Após o arquivo ter sido enviado, ele é removido da pasta temporária.
//	 *
//	 * Se nenhum arquivo for localizado para envio, a página de erro 404 será
//	 * exibida para o usuário.
//	 * @param ArrayList $params Array de parâmetros recebidos na requisição. O
//	 * ID do arquivo é o primeiro item no array.
//	 */
//	public function exportar(ArrayList $params = null)
//	{
//		if(ArrayList::isValid($params) && !$params->isEmpty())
//			$this->downloadFile("{$params[2]}-{$params[0]}.{$params[1]}");
//		else
//			$this->pageNotFound();
//	}

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
	 * Exibe a página com as informações do premio para visualização.
	 *
	 * @param ArrayList $params Array de parâmetros recebidos na requisição. O
	 * ID da noticia é o primeiro item no array.
	 */
	public function ver(ArrayList $params = null)
	{
		if(ArrayList::isValid($params) && !$params->isEmpty())
		{
			$prize = PremioQuery::create()->findPk($params[0]);

			if(!empty($prize))
			{
				$this->view->setHtmlPage('Premio.Ver');
				$this->view->addResource('~/plugins/jquery-validation/js/jquery.validate.min.js');
				$this->view->addResource('~/plugins/jquery-validation/js/messages_pt-BR.js');
				$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
				$this->view->addResource('~/plugins/dropzone/dropzone.min.js');
				$this->view->addResource('~/js/prize.js');
				$this->view->initializePage();
				$this->setActiveMenuItem('Prêmios');

				$doc = HtmlDocument::getCommomDocument();

				$name = Text::split(' ', $prize->getNome(), 2);
				HtmlDocument::find('.page-title h3')->getFirst()->html("{$name[0]} <span class='semi-bold'>" . (isset($name[1]) ? $name[1] : '') . "</span>");
				$doc->getById('js-edit-link')->toType('HtmlLink')->setUrl(Enviroment::resolveUrl('~/premio/editar/' . $prize->getId()));
				$doc->getById('js-history-link')->toType('HtmlLink')->setUrl(Enviroment::resolveUrl('~/premio/historico/' . $prize->getId()));

				/*
				 * Informações básicas.
				 */
				$doc->getById('titulo')->setAttribute('value', $prize->getNome());
				$doc->getById('descricao')->append($prize->getDescricao());
				$doc->getById('quantidade')->setAttribute('value', $prize->getQuantidade());
				$doc->getById('valor')->setAttribute('value', $prize->getValor());
				$doc->getById('cadastrado-por')->setAttribute('value', $prize->getUsuario()->getNome());
				$doc->getById('data-cadastro')->setAttribute('value', $prize->getDataCadastro('d/m/Y'));
				$doc->getById($prize->getAtivo() ? 'ativo' : 'inativo')->setAttribute('checked', 'checked');
				$doc->getById('imagem')->setAttribute('src', $prize->getImagem());

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
				empty($prize) ? $this->pageNotFound() : $this->accessDenied();
			}
		}
		else
		{
			// o ID da agenda não foi passado, então nós mostramos um erro
			// para o usuário
			$this->pageNotFound();
		}
	}

	/**
	 * Exibe a página de histórico da notícia.
	 *
	 * @param ArrayList $params Array de parâmetros recebidos na requisição. O
	 * ID do usuário é o primeiro item no array.
	 */
	public function historico(ArrayList $params = null)
	{
		if(ArrayList::isValid($params) && !$params->isEmpty())
		{
			$prize = PremioQuery::create()->findPk($params[0]);

			if($prize)
			{
				$this->view->setHtmlPage('Premio.Historico');
				$this->view->initializePage();
				$this->setActiveMenuItem('Prêmios');
				HtmlDocument::getById('js-edit-link')->toType('HtmlLink')->setUrl(Enviroment::resolveUrl('~/premio/editar/'. $prize->getId()));
				HtmlDocument::getById('js-view-link')->toType('HtmlLink')->setUrl(Enviroment::resolveUrl('~/premio/ver/' . $prize->getId()));

				/*
				 * Personalização do formulário
				 */
				HtmlDocument::find('.page-title h3')->getFirst()->html("Histórico de <span class='semi-bold'>{$prize->getNome()}</span>");
				$timeline = HtmlDocument::getById('timeline');

				if(Usuario::atual()->temPermissao('somente-leitura'))
					HtmlDocument::find('.page-title .btn-success')->getLast()->remove();

				$stories = AuditoriaQuery::getHistorico(Auditoria::TIPO_PREMIO, $prize->getId())->find();

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
}
?>