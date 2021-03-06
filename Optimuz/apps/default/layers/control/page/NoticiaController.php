<?php
/**
 * This file contains only a controller.
 * @package control
 * @subpackage page
 */

/**
 * Controler responsável pelo gerenciamento das noticias cadastradas no sistema.
 *
 * @author Bruno Cordeiro
 * @package control
 * @subpackage page
 */
class NoticiaController extends DefaultPageController
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
	 * Exibe a lista de usuários cadastrados.
	 */
	public function index()
	{
		$this->view->setHtmlPage('Noticia.Index');
		$this->view->addResource('~/plugins/jquery-datatable/css/jquery.dataTables.css');
		$this->view->addResource('~/plugins/datatables-responsive/css/datatables.responsive.css');
		$this->view->addResource('~/plugins/jquery-datatable/jquery.dataTables.min.js');
		$this->view->addResource('~/plugins/jquery-datatable/extra/js/TableTools.min.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/datatables.responsive.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/lodash.min.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/js/notice.js');
		$this->view->initializePage();
		$this->setActiveMenuItem('Notícias');

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
		$this->view->setHtmlPage('Noticia.Ativos');
		$this->view->addResource('~/plugins/jquery-datatable/css/jquery.dataTables.css');
		$this->view->addResource('~/plugins/datatables-responsive/css/datatables.responsive.css');
		$this->view->addResource('~/plugins/jquery-datatable/jquery.dataTables.min.js');
		$this->view->addResource('~/plugins/jquery-datatable/extra/js/TableTools.min.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/datatables.responsive.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/lodash.min.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/js/notice.js');
		$this->view->initializePage();
		$this->setActiveMenuItem('Notícias');

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
		$this->view->setHtmlPage('Noticia.Inativos');
		$this->view->addResource('~/plugins/jquery-datatable/css/jquery.dataTables.css');
		$this->view->addResource('~/plugins/datatables-responsive/css/datatables.responsive.css');
		$this->view->addResource('~/plugins/jquery-datatable/jquery.dataTables.min.js');
		$this->view->addResource('~/plugins/jquery-datatable/extra/js/TableTools.min.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/datatables.responsive.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/lodash.min.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/js/notice.js');
		$this->view->initializePage();
		$this->setActiveMenuItem('Notícias');

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
	public function listarAtivas()
	{
		$this->doList(NoticiaQuery::create('n')->filterByAtiva(true));
	}

	/**
	 * Lista os notícias inativas do sistema baseado no perfil do usuário .
	 */
	public function listarInativas()
	{
		$this->doList(NoticiaQuery::create('n')->filterByAtiva(true));
	}

	/**
	 * Lista todas as agendas cadastradas no sistema.
	 */
	public function listarTodas()
	{
		$this->doList(NoticiaQuery::create('n'));
	}

	/**
	 * Lista as noticias salvas no banco de dados de acordo com o perfil do
	 * usuário. A resposta é devolvida via Ajax apenas, no formato JSON.
	 *
	 * @param IgrejaQuery $table Consulta na tabela igreja com paramêtros
	 * fornecidos previsamente.
	 */
	public function doList(NoticiaQuery $table)
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
						->condition('c1', 'n.Titulo LIKE ?', "%{$searchValue}%")
						->condition('c2', 'n.SubTitulo LIKE ?', "%{$searchValue}%")
						->condition('c3', 'n.Descricao LIKE ?', "%{$searchValue}%")
						->combine(array('c1', 'c2', 'c3'), Criteria::LOGICAL_OR);
				}

				if(!$export)
				{
					$records = $table->orderById(Criteria::DESC)->paginate($page, $length);

					$result->recordsTotal = $records->getNbResults();
					$result->success = true;
					$result->data	= array();
					$result->recordsFiltered = $records->count();
					$result->draw	= $draw;
					$baseUrl		= $this->application->getBaseUrl();

					if(!empty($records))
					{
						foreach($records as $notice)
						{
							$notice instanceof Noticia;

							$links = '<div class="btn-group pull-right">
										<a href="' . $baseUrl . 'noticia/ver/' . $notice->getId() . '" class="btn btn-small btn-white"><i class="mdi mdi-eye m-r-5"></i> Ver</a>
										<button class="btn btn-small btn-white dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
										<ul class="dropdown-menu">
											<li><a href="' . $baseUrl . 'noticia/editar/' . $notice->getId() . '">Editar</a></li>
											<li><a href="' . $baseUrl . 'noticia/historico/' . $notice->getId() . '">Histórico</a></li>
										</ul>
									</div>';

							$result->data[] = array(
								$notice->getTitulo(),
								$notice->getSubTitulo(),
								$notice->getDataCadastro('d/m/Y'),
								$notice->getUsuario()->getNome(),
								($notice->getAtiva() == true ? 'Ativa' : 'Inativa'),
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
	 * Exibe a página de cadastro de uma nova noticia.
	 */
	public function nova()
	{
		$this->view->setHtmlPage('Noticia.Nova');
		$this->view->addResource('~/plugins/jquery-validation/js/jquery.validate.min.js');
		$this->view->addResource('~/plugins/jquery-validation/js/messages_pt-BR.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/plugins/dropzone/dropzone.min.js');
		$this->view->addResource('~/plugins/dropzone/css/dropzone.css');
		$this->view->addResource('~/plugins/jquery-sparkline/jquery-sparkline.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');
		$this->view->addResource('~/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js');
		$this->view->addResource('~/plugins/bootstrap-datepicker/css/datepicker.css');
		$this->view->addResource('~/js/notice.js');
		$this->view->initializePage();
		$this->setActiveMenuItem('Notícias');

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
	 * Inicia o processo de upload de arquivos da notícia.
	 *
	 * Este método vai apenas receber a imagem enviada e guará-la no diretório
	 * temporário da aplicação.
	 * @author Bruno Cordeiro
	 */
	public function uploadFile()
	{
		$validator = new Validator;
		$validator->loadPolicy("Noticia/UploadFile");
		$result = $this->createResult();

		if($validator->validate())
		{
			$rules = $validator->getRules();
			$upload = new UploadManager;
			$upload->setAllowedExtensions($rules['file']->getTypes());
			$upload->setMaxFileSize($rules['file']->getSize());

			try
			{
				$fileExt = Text::split('.', $upload->getFile('file')->name)->getLast();

				$originalName = $upload->getFile('file')->name;
				$currentName = Serial::create()->generate() . "." . $fileExt;

				$upload->setNewName($currentName);
				$upload->save($this->application->getPath('temp'));

				$result->success		= true;
				$result->path			= $this->application->getPath('temp');
				$result->originalName	= $originalName;
				$result->currentName	= $currentName;
				$result->type			= 'success';
			}
			catch(UploadError $error)
			{
				Report::sendError($error);
				$result->message = '<i class="fa fa-warning"></i> <span><strong>Ocorreu um erro inesperado</strong><span>Tente enviar o arquivo novamente</span></span>';
			}
		}
		else
		{
			$result->message = $validator->getResult()->getErrors()->getFirst()->getErrorMessage();
			$result->type = 'error';
		}


		$this->sendAjaxResponse($result, $result->success ? 200 : 500);
	}

	/**
	 * Salva os arquivos adicionados ao cadastro da notícia
	 * na sua respectiva pasta. O método pressupõe que os arquivos
	 * iniciais foram salvos na pasta temporária.
	 *
	 * @param Noticia $notice Id da igreja salva.
	 * @param int $fileName Nome do arquivo salvo na pasta temporária.
	 * @param String $originalName Nome verdadeiro do arquivo enviado pelo
	 * usuário.
	 * @author Bruno Cordeiro
	 */
	private function salvarArquivo(Noticia $notice, $fileName, $originalName)
	{
		$tempFilePath	= $this->application->getPath('temp') . $fileName;
		$finalFilePath	= $notice->getDiretorio() . $originalName;

		if(File::exists($tempFilePath))
		{
			/*
			 * Copia o arquivo temporário para a pasta final.
			 */
			$tmpFile = File::open($tempFilePath);
			$tmpFile->copyTo($finalFilePath);
			$tmpFile->close();

			File::remove($tempFilePath);
		}
	}

	/**
	 * Salva uma nova agenda no sistema.
	 */
	public function atualizar()
	{
		$validator = new Validator;
		$validator->loadPolicy('Noticia/Atualizar');
		$result = $this->createResult();

		try
		{
			if($validator->validate())
			{
				$currentUser = Usuario::atual();
				$notice = NoticiaQuery::create()->findPk($validator->getInputValue('id'));

				if(!empty($notice))
				{
					$clone = $notice->toArray();

					$title			= $validator->getInputValue('titulo');
					$subTitle		= $validator->getInputValue('sub-titulo');
					$desctiption	= $validator->getInputValue('descricao');
					$status			= $validator->getInputValue('status');

					$notice->setTitulo($title);
					$notice->setAtiva($status);
					$notice->setSubTitulo($subTitle);
					$notice->setDescricao($desctiption);
					$notice->save();

					/*
					 * Atualização da imagem.
					 */
					if($validator->hasInputValue('arquivo'))
					{
						$currentImage = $notice->getImagem(false);

						if(!empty($currentImage))
							File::remove($currentImage);

						$this->salvarArquivo($notice, $validator->getInputValue('arquivo'), $validator->getInputValue('nome-arquivo'));
					}

					$obs = Utils::getDifferenceDetais($notice->toArray(), $clone, $notice);
					Auditoria::adicionar('A noticia foi atualizada', Auditoria::LEVEL_INFO, $currentUser, $obs, Auditoria::TIPO_NOTICIA, $notice->getId());

					$result->success	= true;
					$result->message	= 'Noticia atualizada com successo';
					$result->type		= 'success';
					$result->callback	= 'redirect';
					$result->time		= 2500;
					$result->url		= Enviroment::resolveUrl("~/noticia/editar/{$notice->getId()}");
				}
				else
				{
					$result->message = empty($notice) ? 'A notícia informada não foi encontada' : 'Você não pode alterar as informações desta notícia';
					$result->type = 'error';
				}


			}
			else
			{
				$result->message = 'Existem erros no formulário. Corrija-os antes de submeter o formulário novamente.';
				$result->type = 'error';
				$result->result = $validator->getResult();
			}
		}
		catch(Error $ex)
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

		$this->sendAjaxResponse($result);
	}

	/**
	 * Salva uma nova noticia no sistema.
	 */
	public function salvar()
	{
		$validator = new Validator;
		$validator->loadPolicy('Noticia/Salvar');
		$result = $this->createResult();

		try
		{
			if($validator->validate())
			{
				if($validator->hasInputValue('arquivo'))
				{
					$currentUser = Usuario::atual();

					$title			= $validator->getInputValue('titulo');
					$subTitle		= $validator->getInputValue('sub-titulo');
					$desctiption	= $validator->getInputValue('descricao');

					$notice = new Noticia;
					$notice->setUsuario($currentUser);
					$notice->setTitulo($title);
					$notice->setSubTitulo($subTitle);
					$notice->setDescricao($desctiption);
					$notice->setDataCadastro(time());
					$notice->setDescricao($desctiption);
					$notice->save();

					$this->salvarArquivo($notice, $validator->getInputValue('arquivo'), $validator->getInputValue('nome-arquivo'));
					Auditoria::adicionar('Notícia cadastrada', Auditoria::LEVEL_INFO, $currentUser, "{$currentUser->getNome()} ({$currentUser->getEmail()})", Auditoria::TIPO_NOTICIA, $notice->getId());

					$result->success	= true;
					$result->message	= 'Notícia cadastrada com successo';
					$result->type		= 'success';
					$result->callback	= 'redirect';
					$result->time		= 2500;
					$result->url		= Enviroment::resolveUrl("~/noticia/editar/{$notice->getId()}");
				}
				else
				{
					$result->message = 'É necessário inserir uma imagem para cadastrar uma notícia';
					$result->type = 'error';
				}
			}
			else
			{
				$result->message = 'Existem erros no formulário. Corrija-os antes de submeter o formulário novamente.';
				$result->type = 'error';
				$result->result = $validator->getResult();
			}
		}
		catch(Error $ex)
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

		$this->sendAjaxResponse($result);
	}

	/**
	 * Exibe a página com as informações da agenda para visualização.
	 *
	 * @param ArrayList $params Array de parâmetros recebidos na requisição. O
	 * ID da noticia é o primeiro item no array.
	 */
	public function ver(ArrayList $params = null)
	{
		if(ArrayList::isValid($params) && !$params->isEmpty())
		{
			$notice = NoticiaQuery::create()->findPk($params[0]);

			if(!empty($notice))
			{
				$this->view->setHtmlPage('Noticia.Ver');
				$this->view->addResource('~/plugins/jquery-validation/js/jquery.validate.min.js');
				$this->view->addResource('~/plugins/jquery-validation/js/messages_pt-BR.js');
				$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
				$this->view->addResource('~/plugins/dropzone/dropzone.min.js');
				$this->view->addResource('~/js/notice.js');
				$this->view->initializePage();
				$this->setActiveMenuItem('Notícias');

				$doc = HtmlDocument::getCommomDocument();

				$name = Text::split(' ', $notice->getTitulo(), 2);
				HtmlDocument::find('.page-title h3')->getFirst()->html("{$name[0]} <span class='semi-bold'>" . (isset($name[1]) ? $name[1] : '') . "</span>");
				$doc->getById('js-edit-link')->toType('HtmlLink')->setUrl(Enviroment::resolveUrl('~/noticia/editar/' . $notice->getId()));
				$doc->getById('js-history-link')->toType('HtmlLink')->setUrl(Enviroment::resolveUrl('~/noticia/historico/' . $notice->getId()));

				/*
				 * Informações básicas.
				 */
				$doc->getById('titulo')->setAttribute('value', $notice->getTitulo());
				$doc->getById('sub-titulo')->append($notice->getSubTitulo());
				$doc->getById('descricao')->append($notice->getDescricao());
				$doc->getById('cadastrado-por')->setAttribute('value', $notice->getUsuario()->getNome());
				$doc->getById('data-cadastro')->setAttribute('value', $notice->getDataCadastro('d/m/Y'));
				$doc->getById($notice->getAtiva() ? 'ativo' : 'inativo')->setAttribute('checked', 'checked');
				$doc->getById('imagem')->setAttribute('src', $notice->getImagem());

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
				empty($notice) ? $this->pageNotFound() : $this->accessDenied();
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
	 * Exibe a página com as informações da notícia para edição.
	 *
	 * @param ArrayList $params Array de parâmetros recebidos na requisição. O
	 * ID da agenda é o primeiro item no array.
	 */
	public function editar(ArrayList $params = null)
	{
		if(ArrayList::isValid($params) && !$params->isEmpty())
		{
			$notice = NoticiaQuery::create()->findPk($params[0]);

			if(!empty($notice))
			{
				$this->view->setHtmlPage('Noticia.Editar');
				$this->view->addResource('~/plugins/jquery-validation/js/jquery.validate.min.js');
				$this->view->addResource('~/plugins/jquery-validation/js/messages_pt-BR.js');
				$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
				$this->view->addResource('~/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');
				$this->view->addResource('~/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js');
				$this->view->addResource('~/plugins/bootstrap-datepicker/css/datepicker.css');
				$this->view->addResource('~/plugins/dropzone/dropzone.min.js');
				$this->view->addResource('~/js/notice.js');
				$this->view->initializePage();
				$this->setActiveMenuItem('Notícias');

				$doc = HtmlDocument::getCommomDocument();

				$name = Text::split(' ', $notice->getTitulo(), 2);
				HtmlDocument::find('.page-title h3')->getFirst()->html("{$name[0]} <span class='semi-bold'>" . (isset($name[1]) ? $name[1] : '') . "</span>");
				$doc->getById('js-history-link')->toType('HtmlLink')->setUrl(Enviroment::resolveUrl('~/noticia/historico/' . $notice->getId()));

				/*
				 * Informações básicas.
				 */
				$doc->getById('id')->setAttribute('value', $notice->getId());
				$doc->getById('titulo')->setAttribute('value', $notice->getTitulo());
				$doc->getById('sub-titulo')->append($notice->getSubTitulo());
				$doc->getById('descricao')->append($notice->getDescricao());
				$doc->getById('cadastrado-por')->setAttribute('value', $notice->getUsuario()->getNome());
				$doc->getById('data-cadastro')->setAttribute('value', $notice->getDataCadastro('d/m/Y'));
				$doc->getById($notice->getAtiva() ? 'ativo' : 'inativo')->setAttribute('checked', 'checked');
				$doc->getById('imagem')->setAttribute('src', $notice->getImagem());

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
				empty($notice) ? $this->pageNotFound() : $this->accessDenied();
			}
		}
		else
		{
			// o ID da noticia não foi passado, então nós mostramos um erro
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
			$notice = NoticiaQuery::create()->findPk($params[0]);

			if($notice)
			{
				$this->view->setHtmlPage('Noticia.Historico');
				$this->view->initializePage();
				$this->setActiveMenuItem('Notícias');
				HtmlDocument::getById('js-edit-link')->toType('HtmlLink')->setUrl(Enviroment::resolveUrl('~/noticia/editar/'. $notice->getId()));
				HtmlDocument::getById('js-view-link')->toType('HtmlLink')->setUrl(Enviroment::resolveUrl('~/noticia/ver/' . $notice->getId()));

				/*
				 * Personalização do formulário
				 */
				HtmlDocument::find('.page-title h3')->getFirst()->html("Histórico de <span class='semi-bold'>{$notice->getTitulo()}</span>");
				$timeline = HtmlDocument::getById('timeline');

				if(Usuario::atual()->temPermissao('somente-leitura'))
					HtmlDocument::find('.page-title .btn-success')->getLast()->remove();

				$stories = AuditoriaQuery::getHistorico(Auditoria::TIPO_NOTICIA, $notice->getId())->find();

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
     * Realiza busca de endereço por CEP, retorna objeto em formato JSON
     * @param ArrayList $params Parametro recebido, espera-se o CEP
     * @author Bruno Cordeiro.
     */
    public function buscarCep(ArrayList $params = null)
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
}
?>