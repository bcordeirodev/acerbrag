<?php
/**
 * This file contains only a controller.
 * @package control
 * @subpackage page
 */

/**
 * Controle responsável por todas as ações relacionadas ao CRUD de pesquisas.
 * @author Bruno Cordeiro.
 * @package control
 * @subpackage page
 */
class PesquisaController extends DefaultPageController
{
	/**
	 * Lista de colunas usadas para filtro e exportação.
	 * @var array
	 */
	private $filterColumns = array(
		array(
			'label' => 'Id',
			'name' => 'p.Id',
			'show' => false,
		),
		array(
			'label' => 'Autor',
			'name' => 'u.Nome',
			'show' => true,
		),
		array(
			'label' => 'Abrangência',
			'name' => 'p.Abrangencia',
			'show' => true,
		),
		array(
			'label' => 'UF',
			'name' => 'p.UfId',
			'show' => false,
		),
		array(
			'label' => 'Cidade',
			'name' => 'p.CidadeId',
			'show' => false,
		),
		array(
			'label' => 'Título',
			'name' => 'p.Titulo',
			'show' => true,
		),
		array(
			'label' => 'Descrição',
			'name' => 'p.Descricao',
			'show' => true,
		),
		array(
			'label' => 'Data de Inicio',
			'name' => 'p.DataInicio',
			'type' => 'date',
			'show' => true,
		),
		array(
			'label' => 'Data Final',
			'name' => 'p.DataFim',
			'type' => 'date',
			'show' => true,
		),
		array(
			'label' => 'Situação',
			'name' => 'p.Ativo',
			'show' => true,
		)
	);

	/**
	 * Exibe a página inicial.
	 * @author Bruno Cordeiro.
	 */
	public function index()
	{
		$this->view->setHtmlPage('Pesquisa.Index');
		$this->view->addResource('~/plugins/jquery-datatable/css/jquery.dataTables.css');
		$this->view->addResource('~/plugins/datatables-responsive/css/datatables.responsive.css');
		$this->view->addResource('~/plugins/jquery-datatable/jquery.dataTables.min.js');
		$this->view->addResource('~/plugins/jquery-datatable/extra/js/TableTools.min.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/datatables.responsive.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/lodash.min.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/js/pesquisa.js');
		$this->view->initializePage();
		$this->setActiveMenuItem('Pesquisas');

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
	 * Lista todas as pesquisas salvas no banco de dados.
	 * via Ajax apenas, no formato JSON.
	 */
	public function listar()
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

				$currentUser = Usuario::atual();
				FilterContainerComponent::saveState("filter{$this->getControllerName()}");

				$table = PesquisaQuery::create('p')
					->joinUsuario('u')
					->orderById(Criteria::DESC);

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
								$fieldName = "c.{$fieldName}";

							switch($currentFilter['name'])
							{
								case 'p.DataInicio':
								case 'p.DataFim':
									$fieldValue = Text::replace('#(\d{2})\D(\d{2})\D(\d{4})#', '$3/$2/$1', $fieldValue);
									break;
							}

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
					$table->filterByTitulo("%{$searchValue}%");
				}

				$records = $table->paginate($page, $length);

				$result->recordsTotal = $records->getNbResults();
				$result->success = true;
				$result->data = array();
				$result->recordsFiltered = $records->count();
				$result->draw = $draw;
				$baseUrl = $this->application->getBaseUrl();

				if(!empty($records))
				{
					foreach($records as $research)
					{
						$published = ($research->getPublicada() == 0) ? false : true;
						$statusPublicada = ' text-success';
						$editLink = null;

						if(Usuario::atual()->temPermissao('editar-pesquisa'))
							$editLink = '<li><a href="' . $baseUrl . 'pesquisa/editar/' . $research->getId() . '"><i class="fa fa-edit m-r-5"></i> Editar</a></li>';

						$publishLink = '<li><a href="javascript:;" data-pesquisa="' . $research->getId() . '" class="publicar"><i class="fa fa-paper-plane-o m-r-5"></i> Publicar</a></li>';
						$duplicateLink = '<li><a href="javascript:;" data-pesquisa="' . $research->getTitulo() . '" data-pesquisa-id="' . $research->getId() . '" class="duplicar"><i class="fa fa-clone m-r-5"></i> Duplicar</a></li>';
						$deleteLink = '<li><a href="javascript:;" data-pesquisa="' . $research->getTitulo() . '" data-pesquisa-id="' . $research->getId() . '" class="excluir"><i class="fa fa-trash-o m-r-5"></i> Excluir</a></li>';

						if($published == 0)
							$statusPublicada = ' text-danger';

						$links = '<div class="btn-group">
									<a href="' . $baseUrl . 'pesquisa/ver/' . $research->getId() . '" class="btn btn-small btn-white"><i class="fa fa-eye m-r-5' . $statusPublicada . '"></i> Ver</a>
									<button class="btn btn-small btn-white dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
									<ul class="dropdown-menu">
										' . $publishLink . '
										' . $duplicateLink . '
										' . $editLink . '
										' . $deleteLink . '
									</ul>
								</div>';

						$result->data[] = array(
							$resÇearch->getTitulo(),
							$research->getDataInicio('d/m/Y'),
							$research->getDataFim('d/m/Y'),
							$research->getDescricao(),
							($research->getAtivo() ? "Ativa" : "Inativa"),
							$links
						);
					}
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
			$this->downloadFile((isset($params[2]) ? $params[2] : 'Lista_de_pesquisas') . "-{$params[0]}.{$params[1]}");
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

						case 2:
							$isSelect = true;

							$result->input['html'] .= "<option value='n'>Nacional</option>";
							$result->input['html'] .= "<option value='e'>Estadual</option>";
							$result->input['html'] .= "<option value='m'>Municipal</option>";
							break;
						case 9:
							$isSelect = true;

							$result->input['html'] .= "<option value='1'>Ativa</option>";
							$result->input['html'] .= "<option value='0'>Inativa</option>";
							break;
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

					if(!empty($search))
					{
						switch($params[0])
						{
							case 'cidades':
								$table = CidadeQuery::create();
								$table->filterByUfId($validator->getInputValue('second'));
								break;
							case 'profissoes':
								$table = ProfissaoQuery::create();
								break;
							case 'pesquisa':
								$table = PesquisaQuery::create()
									->filterByAtivo(true)
									->orderById(ModelCriteria::DESC);
								break;
//							case 'orgaos':
//								$table = OrgaoPublicoQuery::create();
//								break;
//							case 'cargos-publicos':
//								$table = CargoPublicoQuery::create();
//								break;
//							case 'cargos-eletivos':
//								$table = CargoEletivoQuery::create();
//								break;
							case 'pessoa':
								$table = PessoaQuery::create('p');
								$table
									->where('p.TituloCidadeId = ?', $validator->getInputValue('second'))
									->_or()
									->where('c.Id = ?', $validator->getInputValue('second'));
								break;
							default:
								$table = false;
								break;
						}

						if($table)
						{
							$table
								->setModelAlias('a')
								->where('a.Nome LIKE ?', "%{$search}%")
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
	 * Exibe a página de cadastro de uma nova pesquisa.
	 * @author Bruno Cordeiro.
	 * @return View.
	 */
	public function nova()
	{
		$this->view->setHtmlPage('Pesquisa.Nova');
		$this->view->addResource('~/plugins/jquery-validation/js/jquery.validate.min.js');
		$this->view->addResource('~/plugins/jquery-validation/js/messages_pt-BR.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/plugins/dropzone/dropzone.min.js');
		$this->view->addResource('~/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');
		$this->view->addResource('~/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js');
		$this->view->addResource('~/plugins/bootstrap-datepicker/css/datepicker.css');
		$this->view->addResource('~/js/pesquisa/NewResearch.js');
		$this->view->addResource('~/js/pesquisa.js');
		$this->view->addData('newResearch', true);
		$this->view->initializePage();
		$this->setActiveMenuItem('Pesquisas');

		$ages = null;
		$i = 1;

		while($i < 100)
		{
			$age = $i < 10 ? ('0'.$i) : $i;
			$ages .= "<option value='{$i}'>{$age}</option>";
			$i++;
		}

		HtmlDocument::getById('idade-minima-0')->append($ages);
		HtmlDocument::getById('idade-maxima-0')->append($ages);

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
	 * Função para edição de Pesquisas.
	 * @param ArrayList $param Id da pesquisa.
	 * @author Hugo Minari.
	 */
	public function editar(ArrayList $param)
	{
		$this->view->setHtmlPage('Pesquisa.Editar');
		$this->view->addResource('~/plugins/jquery-validation/js/jquery.validate.min.js');
		$this->view->addResource('~/plugins/jquery-validation/js/messages_pt-BR.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/plugins/dropzone/dropzone.min.js');
		$this->view->addResource('~/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');
		$this->view->addResource('~/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js');
		$this->view->addResource('~/plugins/bootstrap-datepicker/css/datepicker.css');
		$this->view->addResource('~/js/pesquisa/EditResearch.js');
		$this->view->addResource('~/js/pesquisa.js');
		$this->view->addData('editResearch', true);
		$this->view->initializePage();
		$this->setActiveMenuItem('Pesquisas');

		// Adiciona os scripts do google charts, dentro do head.
		HtmlDocument::getByTag('head')->getFirst()->append(
			  '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAW6FOfqaQUXlsYKmIqEIOlX4fiQONoLJk"></script>'
			. '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>'
		);

		try
		{
			if(ArrayList::isValid($param) && $param->count() > 0)
			{
				$research = PesquisaQuery::create()->findPk($param[0]);
				$doc = HtmlDocument::getCommomDocument();

				if($research)
				{
					//Modifica a url dos botões atribuir usuário e histórico.
					$doc->getById('js-assign-user')->toType('HtmlLink')->setUrl("~/pesquisa/atribuir-usuario/{$research->getId()}");
					$doc->getById('js-history-link')->toType('HtmlLink')->setUrl("~/pesquisa/historico/{$research->getId()}");

					//Manda as coordenadas para o javascript criar o mapa.
					$this->view->addData('loadMap', array(
						'limite' => $research->getAreaLimite(),
						'latitude' => $research->getLatitude(),
						'longitude' => $research->getLongitude()
					));

					//Escreve as informações da pesquisa nos inputs
					$doc->getById('pesquisa-id')->setAttribute('value',$research->getId());
					$doc->getById('titulo')->setAttribute('value',$research->getTitulo());
					$doc->getById('title-head')->append($research->getTitulo());
					$doc->getById('data-inicio')->setAttribute('value', $research->getDataInicio('d/m/Y'));
					$doc->getById('data-fim')->setAttribute('value', $research->getDataFim('d/m/Y'));
					$doc->getById('descricao')->append($research->getDescricao());
					$doc->getById('longitude')->setAttribute('value', $research->getLongitude());
					$doc->getById('latitude')->setAttribute('value', $research->getLatitude());
					$doc->getById('area-limite')->setAttribute('value', $research->getAreaLimite());
					$doc->getById('abrangencia')->toType('HtmlSelect')->setValue($research->getAbrangencia());

					//Define alguns atributos de acordo com a publicação da pesquisa
					if($research->getPublicada())
					{
						$aviso = 'Esta pesquisa já está publicada, você não pode fazer certas alterações.';
						$class = 'alert alert-warning row text-center';
						HtmlDocument::getById('disable-box-questions')->setAttribute('class', 'hide');
					}
					else
					{
						$aviso = 'Esta pesquisa ainda não foi publicada, você pode editá-la completamente.';
						$class = 'alert alert-success row text-center';
					}

					HtmlDocument::getById('aviso')->append($aviso);
					HtmlDocument::getById('aviso')->setAttribute('class', $class);

					//Remove alguns botões para as pesquisas inativas
					if(!$research->getAtivo())
					{
						$this->view->addData('researchDisabled', true);

						HtmlDocument::getById('status')->toType('HtmlSelect')->setValue($research->getAtivo());
						HtmlDocument::getById('js-assign-user')->remove();

						foreach(HtmlDocument::find('input, textarea') as $input)
							$input->setAttribute('readonly', true);

						foreach(HtmlDocument::getByTag('select') as $select)
						{
							if($select->getAttribute('name') != 'status')
								$select->setAttribute('disabled', true);
						}
					}

					//Esconde campos desnecessários dependendo da abrangência.
					if($research->getAbrangencia() == 'e')
						$doc->getById('box-uf')->removeCssClass('hide');
					elseif($research->getAbrangencia() == 'm')
					{
						$doc->getById('box-uf')->removeCssClass('hide');
						$doc->getById('box-cidade')->removeCssClass('hide');
						$doc->getById('uf')->setValue($research->getUfId());
						$doc->getById('cidade')->setAttribute('value', json_encode(array('id' => $research->getCidadeId(), 'text' => $research->getCidade()->getNome())));
					}

					//Popula a categoria com as que já existem
					$categorias = CategoriaQuery::create('c')
						->orderByPosicao(Criteria::ASC)
						->usePerguntaQuery()
							->filterByPesquisaId($research->getId())
							->groupByCategoriaId()
						->endUse()
						->filterBy('Id', 1, Criteria::NOT_EQUAL)
						->find();
					DataManager::set('categorias', $categorias);

					//Monta as categorias com as respectivas perguntas e alternativas.
					foreach($categorias as $categoria)
					{
						$categoryName = $categoria->getNome();
						$categoryId = $categoria->getId();

						//Resgata as perguntas da categoria.
						$perguntas = PerguntaQuery::create()
							->filterByPesquisaId($research->getId())
							->filterByCategoriaId($categoryId)
							->orderById()
							->find();

						foreach($perguntas as $pergunta)
						{
							$questionId = $pergunta->getId();
							$questionText = $pergunta->getTexto();
							$questionType = $pergunta->getTipoResposta();
							$questionRequired = $pergunta->getObrigatoria();
							$selectValue = 'tipo-resposta-id-' . $questionId;

							$required = ($questionRequired)
										?
											'<i class="fa fa-asterisk text-danger change-required" data-toggle="tooltip" data-required="' . $questionRequired . '" data-question="' . $questionId . '" data-placement="top" title="Clique para torna-la opcional" aria-hidden="true"></i>'
										:
											'<i class="fa fa-asterisk text-default change-required" data-toggle="tooltip" data-required="' . $questionRequired . '" data-question="' . $questionId . '" data-placement="top" title="Clique para torna-la obrigatoria" aria-hidden="true"></i>';

							if($research->getPublicada() == 0)
								$remove =
								 '<a title="Remover Pergunta" class="remove-this pull-right" data-type="pergunta" href="javascript:;" data-toggle="tooltip" data-placement="top" title="Remover pergunta"><i class="fa fa-times text-danger font-18 m-l-5"></i></a>';
							else
								$remove = '';

							if(in_array($questionType, array(3,4,5,6)))
							{
								$boxQuest = '
									<div class="js-perguntas p-t-20 m-t-40 box-perguntas">
										<div class="form-group col-md-12">
											<label for="id-pergunta-' .$questionId . '" class="js-question-number">
												<span class="badge font-14"></span>
												Pergunta
												' . $remove . '
												<span class="pull-right">' . $required . '</span>
											</label>
											<input type="hidden" name="id-perguntas[]" id="id-pergunta-' .$questionId . '" value="' . $questionId . '" />
											<input type="text" class="form-control" name="perguntas[]" id="pergunta-' .$questionId . '" value="' . $questionText . '" />
										</div>
										<div class="form-group col-md-12 m-b-0">
											<div class="row">
												<div class="form-group col-md-6">
													<label class="form-label" for="categoria">Categoria</label>
													<select name="categoria[]" class="col-md-12 no-padding" data-categoria="' . $categoryId . '" object-type="HtmlSelect"></select>
												</div>
												<div class="form-group col-md-6">
													<label class="form-label" for="tipo-resposta">Tipo de resposta</label>
													<select name="tipo-resposta[]" id="' . $selectValue . '" data-selected="' . $questionType . '" class="col-md-12 no-padding" object-type="HtmlSelect">
														<option value="1">Texto</option>
														<option value="2">Número</option>
														<option value="3">Múltipla Escolha</option>
														<option value="5">Múltipla Escolha c/ Imagem</option>
														<option value="4">Opção Única</option>
														<option value="6">Opção Única c/ Imagem</option>
													</select>
												</div>
											</div>
										</div>
										<div id="' . $questionId . '" class="col-md-12 with-remove" data-type="' . $questionType . '">
											<div class="row">
												<div class="col-md-10">
													<label class="pull-left"> Alternativas </label>
												</div>
												<div class="col-md-2 text-right">
													<a href="javascript:;" class="add-option text-default">
														<i class="fa fa-plus-square font-20" aria-hidden="true"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									';
							}
							else
							{
								$boxQuest = '
									<div class="js-perguntas p-t-20 m-t-40 box-perguntas">
										<div class="form-group col-md-12">
											<label for="id-pergunta-' .$questionId . '" class="js-question-number">
												<span class="badge font-14"></span>
												Pergunta
												' . $remove . '
												<span class="pull-right">' . $required . '</span>
											</label>
											<input type="hidden" name="id-perguntas[]" id="id-pergunta-' .$questionId . '" value="' . $questionId . '" />
											<input type="text" class="form-control" name="perguntas[]" id="pergunta-' .$questionId . '" value="' . $questionText . '" />
										</div>
										<div class="form-group col-md-12">
											<div class="row">
												<div class="form-group col-md-6">
													<label class="form-label" for="categoria">Categoria</label>
													<select name="categoria[]" class="col-md-12 no-padding" data-categoria="' . $categoryId . '" object-type="HtmlSelect"></select>
												</div>
												<div class="form-group col-md-6">
													<label class="form-label" for="tipo-resposta">Tipo de resposta</label>
													<select name="tipo-resposta[]" data-selected="' . $questionType . '" class="col-md-12 no-padding" object-type="HtmlSelect">
														<option value="1">Texto</option>
														<option value="2">Número</option>
														<option value="3">Múltipla Escolha</option>
														<option value="5">Múltipla Escolha c/ Imagem</option>
														<option value="4">Opção Única</option>
														<option value="6">Opção Única c/ Imagem</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									';
							}

							HtmlDocument::getById('listagem-pesquisa')->append($boxQuest);
							$categorySelect = HtmlDocument::find('.js-perguntas:last-child select', 'HtmlSelect')->getFirst();
							$categorySelect->setSource($categorias);
							$categorySelect->setSourceMemberValue('id');
							$categorySelect->setSourceMemberText('nome');
							$categorySelect->bindSource();

							//Resgata as alternativas da pergunta.
							$alternativas = AlternativaQuery::create()
								->filterByPerguntaId($pergunta->getId())
								->orderById()
								->find();

							$rows = 0;

							if($research->getPublicada() == 0)
								$remove =
								 '<a title="Remover Alternativa" class="remove-this" data-type="alternativa" href="javascript:;"><i class="fa fa-times text-danger"></i></a>';
							else
								$remove = '';

							foreach($alternativas as $alternativa)
							{
								$optionId	= $alternativa->getId();
								$optionText = $alternativa->getTexto();
								$idTemp		= round(microtime(true) * 1000);
								$pathLocal	= $this->application->getPath('resources') . "img/alternativas/p-{$questionId}/{$optionId}-thumb.jpg";

								if(in_array($questionType, array(3,4,5,6)))
								{
									if(in_array($questionType, array(5,6)) && File::exists($pathLocal))
									{
										$image = Enviroment::resolveUrl('~/resource/default/img/alternativas/p-' . $questionId . '/' . $optionId . '-thumb.jpg');

										$boxOpt =
											"<div class='col-md-12 alternativas m-b-5'>"
												. "<div class='row'>"
													. "<div class='col-md-1 p-l-0 text-left'>"
														. "<img src='{$image}' alt='img' width='36' height='36' />"
													. "</div>"
													. "<div class='col-md-11 p-r-0'>"
														. "<input type='hidden' name='id-alternativas[]' id='id-alternativa-{$optionId}' value='{$optionId}'/>"
														. "<input type='text' class='form-control' name='alternativas[]' id='alternativa-{$optionId}' value='{$optionText}' />"
														. $remove
														. "</div>"
												. "</div>"
											. "</div>";

										HtmlDocument::getById($questionId)->append($boxOpt);
									}
									else
									{
										if($rows == 0)
										{
											$idBox	= $idTemp;
											$box	= "<div id='" . $idBox . "' class='row m-b-5'> </div>";
											HtmlDocument::getById($questionId)->append($box);
										}

										$boxOpt =
											"<div class='alternativas col-md-6'>"
												. "<input type='hidden' name='id-alternativas[]' id='id-alternativa-{$optionId}' value='{$optionId}' />"
												. "<input type='text' class='form-control' name='alternativas[]' id='alternativa-{$optionId}' value='{$optionText}' />"
												. $remove
											. "</div>";

										++$rows;

										if($rows > 1)
											$rows = 0;

										HtmlDocument::getById($idBox)->append($boxOpt);
									}
								}
							}
						}
					}

					DataManager::set('ufs', UfQuery::create()->find());
 					$targetAudience = HtmlDocument::getById('target-audience');
					$targetAudience->populate($research->getPublicoAlvos());

					$this->callView();
				}
				else
					$this->pageNotFound();
			}
			else
				$this->pageNotFound();
		}
		catch(Error $error)
		{
			Report::sendError($error);
			$this->error($error);
		}
	}

	/**
	 * Recebe o id do registro e carrega os dados da pesquisa
	 * @param ArrayList $param Id da pesquisa.
	 * @author Bruno Cordeiro.
	 */
	public function ver(ArrayList $param)
	{
		$this->view->setHtmlPage('Pesquisa.Ver');
		$this->view->addResource('~/plugins/jquery-validation/js/jquery.validate.min.js');
		$this->view->addResource('~/plugins/jquery-validation/js/messages_pt-BR.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/plugins/dropzone/dropzone.min.js');
		$this->view->addResource('~/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');
		$this->view->addResource('~/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js');
		$this->view->addResource('~/plugins/bootstrap-datepicker/css/datepicker.css');
		$this->view->addResource('~/js/pesquisa.js');
		$this->view->initializePage();
		$this->setActiveMenuItem('Pesquisas');

		HtmlDocument::getByTag('head')->getFirst()->append(
			  '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAW6FOfqaQUXlsYKmIqEIOlX4fiQONoLJk"></script>'
			. '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>'
			. '<script type="text/javascript" src="https://www.google.com/jsapi"></script>'
		);

		try
		{
			DataManager::set('ufs', UfQuery::create()->find());

			if(ArrayList::isValid($param) && $param->count() > 0)
			{
				$research = PesquisaQuery::create()->findPk($param[0]);
				$doc = HtmlDocument::getCommomDocument();

				if($research)
				{
					$this->view->addData('loadMap', array(
						'limite' => $research->getAreaLimite(),
						'latitude' => $research->getLatitude(),
						'longitude' => $research->getLongitude()
					));

					$doc->getById('js-assign-user')->toType('HtmlLink')->setUrl("~/pesquisa/atribuir-usuario/{$research->getId()}");

					if(!Usuario::atual()->temPermissao('cadastrar-pesquisa'))
						$doc->getById('new-research')->remove();

					if(Usuario::atual()->temPermissao('editar-pesquisa'))
					{
						$doc->getById('js-edit-research')->removeCssClass('hide');
						$doc->getById('js-edit-research')->toType('HtmlLink')->setUrl(Enviroment::resolveUrl('~/pesquisa/editar/' . $research->getId()));
					}

					$doc->getById('js-history-link')->toType('HtmlLink')->setUrl("~/pesquisa/historico/{$research->getId()}");

					$doc->getById('titulo')->setAttribute('value',$research->getTitulo());
					$doc->getById('title-head')->append($research->getTitulo());
					$doc->getById('criador')->setAttribute('value', UsuarioQuery::create()->findPk($research->getAutorId())->getNome());
					$doc->getById('data-criacao')->setAttribute('value', $research->getDataCriacao('d/m/Y'));
					$doc->getById('data-inicio')->setAttribute('value', $research->getDataInicio('d/m/Y'));
					$doc->getById('data-fim')->setAttribute('value', $research->getDataFim('d/m/Y'));
					$doc->getById('descricao')->append($research->getDescricao());
					$doc->getById('pesquisa-id')->setAttribute('value',$research->getId());
					$doc->getById('longitude')->setAttribute('value', $research->getLongitude());
					$doc->getById('latitude')->setAttribute('value', $research->getLatitude());
					$doc->getById('area-limite')->setAttribute('value', $research->getAreaLimite());
					$doc->getById('abrangencia')->toType('HtmlSelect')->setValue($research->getAbrangencia());
					$doc->getById('status')->toType('HtmlSelect')->setValue($research->getAtivo());

					foreach(HtmlDocument::find('input, textarea') as $input)
						$input->setAttribute('readonly', true);

					foreach(HtmlDocument::getByTag('select') as $select)
						$select->setAttribute('disabled', true);

					if($research->getAbrangencia() == 'e')
					{
						$doc->getById('box-uf')->removeCssClass('hide');
					}
					elseif( $research->getAbrangencia() == 'm')
					{
						$doc->getById('box-uf')->removeCssClass('hide');
						$doc->getById('box-cidade')->removeCssClass('hide');

						$doc->getById('uf')->setValue($research->getUfId());
						$doc->getById('cidade')->setAttribute('value', json_encode(array('id' => $research->getCidadeId(), 'text' => $research->getCidade()->getNome())));
					}

 					$targetAudience = HtmlDocument::getById('target-audience');
					$targetAudience->populate($research->getPublicoAlvos());

					$categories = CategoriaQuery::create('c')
								->joinPergunta('p')
								->join('p.Pesquisa')
								->where('Pesquisa.Id = ?', $research->getId())
								->distinct()
								->find();

					$questionsAdded = HtmlDocument::getById('questions-added');
					$questionsAdded->createCategory($categories);
					$questionsAdded->addQuestions(PerguntaQuery::create()->filterByPesquisa($research)->find());

					$this->callView();
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
		catch(Error $error)
		{
			Report::sendError($error);
			$this->error($error);
		}
	}

	/**
	 * Recebe o id da pesquisa e carrega a view de atribuição.
	 * @param ArrayList $param Array com o id da pesquisa.
	 * @author Bruno Cordeiro.
	 * @return View.
	 */
	public function atribuirUsuario(ArrayList $param)
	{
		$this->view->setHtmlPage('Pesquisa.AtribuirUsuario');
		$this->view->addResource('~/plugins/jquery-datatable/css/jquery.dataTables.css');
		$this->view->addResource('~/plugins/datatables-responsive/css/datatables.responsive.css');
		$this->view->addResource('~/plugins/jquery-datatable/jquery.dataTables.min.js');
		$this->view->addResource('~/plugins/jquery-datatable/extra/js/TableTools.min.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/datatables.responsive.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/lodash.min.js');
		$this->view->addResource('~/plugins/jquery-validation/js/jquery.validate.min.js');
		$this->view->addResource('~/plugins/jquery-validation/js/messages_pt-BR.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/js/pesquisa.js');
		$this->view->initializePage();
		$this->setActiveMenuItem('Pesquisas');

		$this->view->addData('alterLabel', true);

		if(ArrayList::isValid($param) && !$param->isEmpty())
		{
			$research = PesquisaQuery::create()->findPk($param[0]);

			if(!empty($research))
			{
				try
				{
					$currentUser = Usuario::atual();
					$doc = HtmlDocument::getCommomDocument();

					if($currentUser->temPermissao('editar-pesquisa'))
						$doc->getById('js-edit-link')->toType('HtmlLink')->setUrl("~/pesquisa/editar/{$research->getId()}");
					else
						$doc->getById('js-edit-link')->remove();

					if(!$currentUser->temPermissao('cadastrar-pesquisa'))
						$doc->getById('js-new-research')->remove();

					$doc->getById('js-history-link')->toType('HtmlLink')->setUrl("~/pesquisa/historico/{$research->getId()}");

					// Informações da pesquisa.
					$doc->getById('pesquisa-id')->setAttribute('value', $param[0]);
					$doc->getById('pesquisa-title')->append($research->getTitulo());
					$doc->getById('start-date')->append($research->getDataInicio('d/m/Y'));
					$doc->getById('date-end')->append($research->getDataFim('d/m/Y'));
					$doc->getById('description')->append($research->getDescricao());

					// DataTable
					$doc->find('.js-dynamic-table')->getFirst()->setAttribute('data-source', "~/pesquisa/buscar-usuario?id={$research->getId()}");

					$table = $doc->getById('usuarios-adicionados');
					$usersAggins = PesquisaUsuarioQuery::create()
						->filterByPesquisaId($research->getId())
						->find();

					if(!$usersAggins->isEmpty())
					{
						$table->clear();

						foreach($usersAggins as $userAggin)
						{
							$user = UsuarioQuery::create()->findPk($userAggin->getUsuarioId());

							$table->append(
									'<tr role="row" class="even">'
										. '<td><img src="' . $user->getImagem('perfil-p', true) . '" alt="Imagem de perfil" lang="pt-BR" class="circle"></td>'
										. '<td>' . $user->getNome() . '</td>'
										. '<td>' . $user->getEmail() . '</td>'
										. '<td> <button data-user-id="' . $user->getId() . '" class="btn js-unbind-user btn-danger btn-small" type="button"><i class="fa fa-minus"></i></button></td>
									</tr>'
								);
						}
					}

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
	 * Exibe a página de histócio de um usuário.
	 * @param ArrayList $params Array de parâmetros recebidos na requisição. O
	 * ID da pesquisa é o primeiro item no array.
	 * @author Bruno Cordeiro.
	 */
	public function historico(ArrayList $params = null)
	{
		if(ArrayList::isValid($params) && !$params->isEmpty())
		{
			$research = PesquisaQuery::create()->findPk($params[0]);

			if($research)
			{
				$this->view->setHtmlPage('Pesquisa.Historico');
				$this->view->initializePage();
				$this->setActiveMenuItem('Pesquisas');

				/*
				 * Personalização do formulário
				 */
				HtmlDocument::find('.page-title h3')->getFirst()->html("Histórico de <span class='semi-bold'>{$research->getTitulo()}</span>");
				HtmlDocument::getById('js-edit-link')->toType('HtmlLink')->setUrl("~/pesquisa/editar/{$research->getId()}");

				$timeline = HtmlDocument::getById('timeline');

//				if(Usuario::atual()->temPermissao('somente-leitura'))
//					HtmlDocument::find('.page-title .btn-success')->getLast()->remove();

				$stories = AuditoriaQuery::getHistorico(Auditoria::TIPO_PESQUISA, $research->getId())->find();

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
				// ID da pesquisa inválido.
				$this->pageNotFound();
			}
		}
		else
		{
			// o ID da pesquisa não passado nos paramêtros.
			$this->pageNotFound();
		}
	}

	/**
	 * Salva os dados de uma nova pesquisa na base.
	 * @author Bruno Cordeiro.
	 */
	public function salvar()
	{
		$validator = new Validator;
		$validator->loadPolicy('Pesquisa/Nova');
		$result = $this->createResult();
		$allImagesToRemove = array();

		if($validator->validate())
		{
			try
			{
				$titulo			= $validator->getInputValue('titulo');
				$dataInicio		= $validator->getInputValue('data-inicio');
				$dataFim		= $validator->getInputValue('data-fim');
				$descricao		= $validator->getInputValue('descricao');

				$research = new Pesquisa;
				$research->setTitulo($titulo);
				$research->setDataCriacao(time());
				$research->setDataInicio(Utils::formatDateDb($dataInicio));
				$research->setDataFim(Utils::formatDateDb($dataFim));
				$research->setDescricao($descricao);
				$research->setCriadorId(Usuario::atual()->getId());
				$research->save();

				$research->setDefaultQuestions();

				$homens			= $validator->getInputValue('quantidade-homens-final');
				$mulheres		= $validator->getInputValue('quantidade-mulheres-final');
				$idadeMinima	= $validator->getInputValue('idade-minima-final');
				$idadeMaxima	= $validator->getInputValue('idade-maxima-final');

				/*
				 * @todo Cria if para pesquisar homens e mulheres na idade
				 * definidica e adicionar na tabela 'Pesquisa Habilitada'.
				 */

				$questions			= $validator->getInputValue('text-question');
				$typeResponse		= $validator->getInputValue('type-response');
				$category			= $validator->getInputValue('category');
				$options			= $validator->getInputValue('options');
				$required			= $validator->getInputValue('required');
				$exception			= $validator->getInputValue('exception');
				$trigger			= $validator->getInputValue('trigger');
				$subQuestion		= $validator->getInputValue('subquestion');
				$questionMotherId	= null;

				for($i = 0; $i < count($questions); $i++)
				{
					$obrigatoria = 0;

					if($required[$i] == 'true')
						$obrigatoria = 1;

					$question = new Pergunta;
					$question->setPesquisa($research);
					$question->setTexto($questions[$i]);
					$question->setTipoResposta($typeResponse[$i]);
					$question->setPosicao($i + 2);
					$question->setCategoriaId($category[$i]);
					$question->setObrigatoria($obrigatoria);
					$question->setExcecao($exception[$i]);
					$question->save();

					//Exceção exibir subperguntas, guarda id da pergunta mãe.
					if($exception[$i] == 2)
						$questionMotherId = $question->getId();

					if($subQuestion[$i] == 1)
					{
						$question->setPerguntaMaeId($questionMotherId);
						$question->save();
					}

					if(in_array($typeResponse[$i], array(3, 4)))
					{
						$alternatives = $options[$i];

						for($p = 0; $p < count($alternatives); $p++)
						{
							$option = new Alternativa;
							$option->setPergunta($question);
							$option->setTexto($alternatives[$p]);
							$option->setPosicao($p);
							$option->save();

							if(isset($trigger[$i]) && $trigger[$i] == $alternatives[$p])
							{
								$question->setGatilhoExcecao($option->getId());
								$question->save();
							}
						}
					}

					if(in_array($typeResponse[$i], array(5, 6)))
					{
						$alternatives = $options[$i];

						for($p = 0; $p < count($alternatives); $p++)
						{
							$option = new Alternativa;
							$option->setPergunta($question);
							$option->setTexto($alternatives[$p][1]);
							$option->setPosicao($p);
							$option->save();

							//Salva as imagens na pasta final.
							if(!empty($alternatives[$p][0]))
								$this->salvarImagem($question->getId(), $option->getId(), $alternatives[$p][0]);

							//Armazena as imagens para deletar ao finalizar o cadastro da pesquisa.
							$allImagesToRemove[] = $alternatives[$p][0];
						}
					}
				}

				//Deleta todas as imagens.
				$this->deletarImagem($allImagesToRemove);

				Auditoria::adicionar('Pesquisa cadastrada', Auditoria::LEVEL_INFO, null, null, Auditoria::TIPO_PESQUISA, $research->getId());

				$result->callback	= 'redirect';
				$result->url		= Enviroment::resolveUrl('~/pesquisa/atribuir-usuario/'. $research->getId());
				$result->time		= 2500;
				$result->success	= true;
				$result->type		= 'success';
				$result->message	= 'Pesquisa cadastrada com sucesso!';
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
			$result->result = $validator->getResult();
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Função que atualiza a pesquisa.
	 * @author Hugo Minari.
	 */
	public function atualizar()
	{
		$validator = new Validator;
		$validator->loadPolicy('Pesquisa/Atualizar');
		$result = $this->createResult();
		$allImagesToRemove = array();

		if($validator->validate())
		{
			try
			{
				/*
				 * ATUALIZAÇÃO
				 */
				//Dados da pesquisa.
				$id				= $validator->getInputValue('pesquisa-id');
				$titulo			= $validator->getInputValue('titulo');
				$dataInicio		= $validator->getInputValue('data-inicio');
				$dateEnd		= $validator->getInputValue('data-fim');
				$latitude		= $validator->getInputValue('latitude');
				$longitute		= $validator->getInputValue('longitude');
				$areaLimite		= $validator->getInputValue('area-limite');
				$descricao		= $validator->getInputValue('descricao');
				$status			= $validator->getInputValue('status');

				//Categorias, perguntas e alternativas.
				$categorias		= $validator->getInputValue('categorias');
				$idPerguntas	= $validator->getInputValue('id-perguntas');
				$perguntas		= $validator->getInputValue('perguntas');
				$tipoResposta	= $validator->getInputValue('tipo-resposta');
				$idAlternativas	= $validator->getInputValue('id-alternativas');
				$alternativas	= $validator->getInputValue('alternativas');

				//Trata os arrays
				$categorias		= $this->arraySingle($categorias);
				$idPerguntas	= $this->arraySingle($idPerguntas);
				$perguntas		= $this->arraySingle($perguntas);
				$idAlternativas = $this->arraySingle($idAlternativas);
				$alternativas	= $this->arraySingle($alternativas);

				/*
				 * CADASTRO
				 */
				//Perguntas
				$questions			= $validator->getInputValue('text-question');
				$typeResponse		= $validator->getInputValue('type-response');
				$category			= $validator->getInputValue('category');
				$options			= $validator->getInputValue('options');
				$required			= $validator->getInputValue('required');
				$exception			= $validator->getInputValue('exception');
				$trigger			= $validator->getInputValue('trigger');
				$subQuestion		= $validator->getInputValue('subquestion');
				$questionMother		= $validator->getInputValue('question-mother');
				$questionMotherId	= null;

				/*
				 * EXCLUSÃO
				 */
				//Perguntas e Alternativas removidas
				$removedsOptions	= $validator->getInputValue('options-removed');
				$removedsQuestions	= $validator->getInputValue('questions-removed');

				$research			= PesquisaQuery::create()->findPk($id);

				//Se existe a pesquisa com o id
				if($research)
				{
					//Verifica se ela está ativa.
					if($research->getAtivo())
					{
						/*
						* ATUALIZAÇÃO
						*/
						try
						{
							$clone = $research->toArray();
							$research->setTitulo($titulo);
							$research->setDataInicio(Utils::formatDateDb($dataInicio));
							$research->setDataFim(Utils::formatDateDb($dateEnd));
							$research->setLatitude($latitude);
							$research->setLongitude($longitute);
							$research->setAreaLimite($areaLimite);
							$research->setDescricao($descricao);
							$research->setAtivo($status);
						}
						catch(Error $error){}

						//Atualiza as perguntas
						foreach($idPerguntas as $idp => $idPergunta)
						{
							$queryPergunta = PerguntaQuery::create()->findPk($idPergunta);

							if(!empty($queryPergunta))
							{
								try
								{
									if(!empty($categorias[$idp]) && $queryPergunta->getCategoriaId() !== $categorias[$idp])
										$queryPergunta->setCategoriaId($categorias[$idp]);

									if(!empty($perguntas[$idp]) && $queryPergunta->getTexto() !== $perguntas[$idp])
										$queryPergunta->setTexto($perguntas[$idp]);

									$queryPergunta->save();
								}
								catch(Error $error){}
							}
						}

						//Atualiza as alternativas
						foreach($idAlternativas as $idA => $idAlternativa)
						{
							$queryAlternativas = AlternativaQuery::create()->findPk($idAlternativa);

							if(!empty($queryAlternativas) && $queryAlternativas->getTexto() !== $alternativas[$idA])
							{
								try
								{
									$queryAlternativas->setTexto($alternativas[$idA]);
									$queryAlternativas->save();
								}
								catch(Error $error){}
							}
						}

						/*
						 * EXCLUSÂO
						 */

						/*
						 * Somente Alternativas
						 */
						if(count($removedsOptions) > 0)
						{
							try
							{
								AlternativaQuery::create()
									->findPks($removedsOptions)
									->delete();
							}
							catch(Error $error){}
						}

						/*
						 * Perguntas e Alternativas
						 */
						if(count($removedsQuestions) > 0)
						{
							try
							{
								//Exclui as alternativas da pergunta
								AlternativaQuery::create()
									->findByPerguntaId($removedsQuestions)
									->delete();

								//Exclui a pergunta
								PerguntaQuery::create()
									->findPks($removedsQuestions)
									->delete();
							}
							catch(Error $error){}
						}

						/*
						 * CADASTRO
						 */

						/*
						 * Perguntas Completas
						 */
						for($i = 0; $i < count($questions); $i++)
						{
							$obrigatoria = 0;

							if($required[$i] == 'true')
								$obrigatoria = 1;

							try
							{
								$question = new Pergunta;
								$question->setPesquisa($research);
								$question->setTexto($questions[$i]);
								$question->setTipoResposta($typeResponse[$i]);
								$question->setPosicao($i + 2);
								$question->setCategoriaId($category[$i]);
								$question->setObrigatoria($obrigatoria);
								$question->setExcecao($exception[$i]);
								$question->save();
							}
							catch(Error $error){}

							//Exceção exibir subperguntas, guarda id da pergunta mãe.
							if($exception[$i] == 2)
								$questionMotherId = $question->getId();

							if($subQuestion[$i] == 1)
							{
								$question->setPerguntaMaeId($questionMotherId);
								$question->save();
							}

							if(in_array($typeResponse[$i], array(3, 4)))
							{
								$alternatives = $options[$i];

								for($p = 0; $p < count($alternatives); $p++)
								{
									try
									{
										$option = new Alternativa;
										$option->setPergunta($question);
										$option->setTexto($alternatives[$p]);
										$option->setPosicao($p);
										$option->save();
									}
									catch (Exception $ex) {}

									if(isset($trigger[$i]) && $trigger[$i] == $alternatives[$p])
									{
										$question->setGatilhoExcecao($option->getId());
										$question->save();
									}
								}
							}

							if(in_array($typeResponse[$i], array(5, 6)))
							{
								$alternatives = $options[$i];

								for($p = 0; $p < count($alternatives); $p++)
								{
									try
									{
										$imagemAlternativa = $alternatives[$p][0];
										$textoAlternativa = $alternatives[$p][1];

										$option = new Alternativa;
										$option->setPergunta($question);
										$option->setTexto($textoAlternativa);
										$option->setPosicao($p);
										$option->save();

										//Salva as imagens na pasta final.
										if(!empty($imagemAlternativa))
											$this->salvarImagem($question->getId(), $option->getId(), $imagemAlternativa);

										//Armazena as imagens para deletar ao finalizar o cadastro da pesquisa.
										$allImagesToRemove[] = $imagemAlternativa;

									}
									catch (Exception $ex) {}
								}
							}
						}

						/*
						 * Alternativas sem imagem
						 */
						$newAlternatives = $validator->getInputValue('novas-alternativas');

						if(count($newAlternatives) > 0)
						{
							$newArrayAlternatives = array_values(array_filter($newAlternatives));

							//Atualiza as novas alternativas
							foreach($newArrayAlternatives as $key => $newAlternative)
							{
								if(count($newAlternative[$key]) > 1)
								{
									foreach($newAlternative as $q => $alternative)
									{
										try
										{
											$newOption = new Alternativa;
											$newOption->setPerguntaId($alternative[0]);
											$newOption->setTexto($alternative[1]);
											$newOption->setPosicao(++$q + 2);
											$newOption->save();
										}
										catch (Exception $ex) {}
									}
								}
							}
						}

						/*
						 * Alternativas com imagem
						 */
						$newAlternativesImg = $validator->getInputValue('novas-alternativas-img');

						if(count($newAlternativesImg) > 0)
						{
							$newArrayAlternativesImg = array_values(array_filter($newAlternativesImg));

							//Atualiza as novas alternativas
							foreach($newArrayAlternativesImg as $key => $newAlternativeImg)
							{
								if(count($newAlternativeImg[$key]) > 1)
								{
									foreach($newAlternativeImg as $q => $alternativeImg)
									{
										$perguntaId			= $alternativeImg[0];
										$alternativaTexto	= $alternativeImg[1];
										$imagem				= $alternativeImg[2];

										try
										{
											$newOptionImg = new Alternativa;
											$newOptionImg->setPerguntaId($perguntaId);
											$newOptionImg->setTexto($alternativaTexto);
											$newOptionImg->setPosicao(++$q + 2);
											$newOptionImg->save();
										}
										catch (Exception $ex) {}

										//Salva as imagens na pasta final.
										if(!empty($imagem))
											$this->salvarImagem($perguntaId, $newOptionImg->getId(), $imagem);

										//Armazena as imagens para deletar ao finalizar o cadastro da pesquisa.
										$allImagesToRemove[] = $imagem;
									}
								}
							}
						}

						//Deleta todas as imagens da pasta temporária.
						$this->deletarImagem($allImagesToRemove);
					}
					else
					{
						if($status)
						{
							$research->setAtivo(true);
							$research->setDataFim(Utils::formatDateDb($dateEnd));

							$result->message = 'Pesquisa ativada com sucesso!';
							Auditoria::adicionar('Pesquisa ativada', Auditoria::LEVEL_INFO, null, null, Auditoria::TIPO_PESQUISA, $research->getId());
						}
					}

					$research->save();

					//Mensagem de acordo com o status da pesquisa.
					if($status)
					{
						$result->message = 'Pesquisa atualizada com sucesso!';
						$details =  Utils::getDifferenceDetais($research->toArray(), $clone, $research);
						Auditoria::adicionar('Pesquisa atualizada', Auditoria::LEVEL_INFO, null, $details, Auditoria::TIPO_PESQUISA, $research->getId());
					}
					else
					{
						$result->message = 'Pesquisa desativada com sucesso!';
						Auditoria::adicionar('Pesquisa desativada', Auditoria::LEVEL_INFO, null, null, Auditoria::TIPO_PESQUISA, $research->getId());
					}

					$result->callback	= 'redirect';
					$result->url		= Enviroment::resolveUrl('~/pesquisa/editar/'. $research->getId());
					$result->time		= 3000;
					$result->type		= 'success';
					$result->success	= true;
				}

			}
			catch(PropelException $ex)
			{
				Propel::getConnection()->rollBack();
				Report::sendError($ex);
				$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
				$result->type	= 'error';
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
			$result->result = $validator->getResult();

		$this->sendAjaxResponse($result);
	}

	/**
	 * Adicioana uma nova categoria de pesquisa a base, a reposta será devolvida
	 * via AJAX.
	 * @param ArrayList $param Array contendo o nome e a posição da categoria.
	 * @author Bruno Cordeiro.
	 */
	public function adicionarCategoria(ArrayList $param)
	{
		$result = $this->createResult();

		if(ArrayList::isValid($param))
		{
			try
			{
				$category = new Categoria;
				$category->setNome($param[0]);
				$category->setPosicao($param[1]+1);
				$category->save();

				$result->id = $category->getId();
				$result->name = $category->getNome();

				$result->success = true;
				$result->message = 'Categoria adicionada com sucesso!';
				$result->type = 'success';
			}
			catch(PropelException $ex)
			{
				Propel::getConnection()->rollBack();
				Report::sendError($ex);
				$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
			}
			catch(Error $error)
			{
				Propel::getConnection()->rollBack();
				Report::sendError($error);
				$result->message = self::DEFAULT_ERROR_MESSAGE;
			}
		}
		else
		{
			$result->message = 'A Categoria adicionar é inválida!';
			$result->type = 'error';
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Atribuí a pesquisa ao usuário.
	 * @param ArrayList $params O primeiro valor é o id da pesquisa e o segundo
	 * o id do usuário.
	 * @author Bruno Cordeiro.
	 */
	public function vincularUsuario(ArrayList $params)
	{
		$result = $this->createResult();

		if(ArrayList::isValid($params) && !empty($params))
		{
			$research = PesquisaQuery::create()->findPk($params[0]);
			$user = UsuarioQuery::create()->findPk($params[1]);

			try
			{
				if(!empty($research) && !empty($user))
				{
					$exists = PesquisaUsuarioQuery::create()
						->filterByPesquisaId($user->getId())
						->filterByPesquisaId($research->getId())
						->find();

					if($exists->isEmpty())
					{
						$researchUser = new PesquisaUsuario;
						$researchUser->setUsuario($user);
						$researchUser->setPesquisa($research);
						$research->save();

						$cpf = Utils::mask($user->getCpf(), '999.999.999-99');
						$obs = "<h5><b>Nome:</b> {$user->getNome()} <b><br>CPF:</b> {$cpf}</h5>";

						Auditoria::adicionar('Pesquisador vinculado', Auditoria::LEVEL_INFO, null, $obs, Auditoria::TIPO_PESQUISA, $research->getId()).

						$result->success = true;
						$result->message = 'Usuário vinculado a pesquisa com sucesso!';
						$result->type = 'success';
					}
					else
					{
						$result->message = 'Este usuário já está vinculado a esta pesquisa!';
						$result->type = 'error';
					}
				}
			}
			catch(Exception $error)
			{
				Propel::getConnection()->rollBack();
				Report::sendError($error);
				$result->message = self::DEFAULT_ERROR_MESSAGE;
			}
			catch(PropelException $ex)
			{
				Propel::getConnection()->rollBack();
				Report::sendError($ex);
				$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
			}
		}
		else
		{
			$result->message = 'O valores informados são inválidos!';
			$result->type = 'error';
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Desvincula o usuário da pesquisa.
	 * @param ArrayList $params O primeiro valor é o id da pesquisa e o segundo
	 * o id do usuário.
	 * @author Bruno Cordeiro.
	 */
	public function desvincularUsuario(ArrayList $params)
	{
		$result = $this->createResult();

		if(ArrayList::isValid($params) && !empty($params))
		{
			$user = UsuarioQuery::create()->findPk($params[1]);
			$research = PesquisaQuery::create()->findPk($params[0]);

			try
			{
				if(!empty($research) && !empty($user))
				{

					$researchUser = PesquisaUsuarioQuery::create()
						->filterByUsuarioId($user->getId())
						->filterByPesquisaId($research->getId())
						->find()
						->getLast();

					if(!empty($researchUser))
					{
						$researchUser->delete();

						$cpf = Utils::mask($user->getCpf(), '999.999.999-99');
						$obs = "<h5><b>Nome:</b> {$user->getNome()} <b><br>CPF:</b> {$cpf}</h5>";

						Auditoria::adicionar('Pesquisador desvinculado', Auditoria::LEVEL_INFO, null, $obs, Auditoria::TIPO_PESQUISA, $research->getId()).

						$result->success = true;
						$result->message = 'Usuário desvinculado da pesquisa com sucesso!';
						$result->type = 'success';
					}
				}
			}
			catch(Exception $error)
			{
				Propel::getConnection()->rollBack();
				Report::sendError($error);
				$result->message = self::DEFAULT_ERROR_MESSAGE;
			}
			catch(PropelException $ex)
			{
				Propel::getConnection()->rollBack();
				Report::sendError(new Error($ex));
				$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
			}
		}
		else
		{
			$result->message = 'O valores informados são inválidos!';
			$result->type = 'error';
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Exibe a página com a descrição da metodologia.
	 * @author Hugo Minari
	 */
	public function metodologia()
	{
		$this->view->setHtmlPage('Pesquisa.Metodologia');
		$this->view->addResource('~/plugins/video-js/video-js.min.css');
		$this->view->addResource('~/plugins/video-js/video.min.js');
		$this->view->initializePage();
		$this->setActiveMenuItem('Pesquisas');

		$video = HtmlDocument::getById('my-video');
		$baseUrl = Enviroment::resolveUrl('~/resource/default');
		$video->setAttribute('poster', "{$baseUrl}/video/Wildlife.jpg");

		$sources = $video->find('source');
		$sources->getFirst()->setAttribute('src', "{$baseUrl}/video/Wildlife.m4v");
		$sources->getLast()->setAttribute('src', "{$baseUrl}/video/Wildlife.webm");

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
	 * Lista os pesquisadores ativos no banco de dados. A resposta é devolvida
	 * via Ajax apenas, no formato JSON.
	 * @author Bruno Cordeiro.
	 */
	public function buscarUsuario()
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
				$researchId = $validator->getInputValue('id');

				$currentUser = Usuario::atual();
				FilterContainerComponent::saveState("filter{$this->getControllerName()}");

				$usersAdded = PesquisaUsuarioQuery::create('pu')
							->select(Array('pu.UsuarioId'))
							->filterByPesquisaId($researchId)
							->find();

				$table = UsuarioQuery::getAtivos('u', true)
					->filterById($usersAdded, Criteria::NOT_IN)
					->filterByPerfilId(array(Perfil::PERFIL_PESQUISADOR, Perfil::PERFIL_SUPERVISOR));

				if(isset($search['value']) && !empty($search['value']))
				{
					$searchValue = Text::plain($search['value']);
					$table
						->condition('c1', 'u.Nome LIKE ?', "%{$searchValue}%")
						->condition('c2', 'u.Email LIKE ?', "%{$searchValue}%")
						->combine(array('c1', 'c2'), Criteria::LOGICAL_OR);
				}

				$records = $table->orderById(Criteria::DESC)->paginate($page, $length);

				$result->recordsTotal = $records->getNbResults();
				$result->success = true;
				$result->data	= array();
				$result->recordsFiltered = $records->count();
				$result->draw	= $draw;
				$currentUser	= Usuario::atual();

				if(!empty($records))
				{
					foreach($records as $user)
					{
						$result->data[] = array(
							'<img src="' . $user->getImagem('perfil-p', true) . '" alt="Imagem de perfil" lang="pt-BR" class="circle">',
							Text::toHtml($user->getNome()),
							$user->getEmail(),
							'<button type="button" class="btn btn-success js-assign-user btn-small" data-user-id="' . $user->getId() . '"><i class="fa fa-plus"></i></button>'
						);
					}
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
	 * Adiciona uma nova pergunta a pesquisa.
	 * @author Bruno Cordeiro.
	 */
	public function adicionarPergunta()
	{
		$result = $this->createResult();
		$validator = new Validator;
		$validator->loadPolicy('Pesquisa/AdicionarPergunta');

		if($validator->validate())
		{
			$pesquisaId		= $validator->getInputValue('pesquisa-id')	;
			$textQuestion	= $validator->getInputValue('pergunta');
			$opcoes			= $validator->getInputValue('opcoes');
			$typeResponse	= $validator->getInputValue('tipo-resposta');
			$categoria		= $validator->getInputValue('categoria-id');
			$research		= PesquisaQuery::create()->findPk($pesquisaId);

			if($research)
			{
				try
				{
					$question = new Pergunta;
					$question->setTexto($textQuestion);
					$question->setPesquisa($research);
					$question->setCategoriaId($categoria);
					$question->setTipoResposta($typeResponse);
					$question->setPosicao(30); // -> Arrumar //
					$question->save();

					if(in_array($typeResponse, array(3, 4, 5, 6)))
					{
						foreach($opcoes as $i => $text)
						{
							$option = new Alternativa;
							$option->setPergunta($question);
							$option->setTexto($text);
							$option->setPosicao($i);
							$option->save();
						}
					}

					$result->id			= $question->getId();
					$result->success	= true;
					$result->message	= 'Pergunta adicionada com sucesso!';
					$result->type		= 'success';
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
			}
			else
			{
				$result->message = 'Pesquisa não encontrada!';
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
	 * Remove a pergunta da pesquisa.
	 * @param Int $param Id da pergunta que será removida.
	 * @author Bruno Cordeiro.
	 */
	public function removerPergunta(ArrayList $param)
	{
		$result = $this->createResult();

		if(ArrayList::isValid($param) && count($param) > 0)
		{
			$question = PerguntaQuery::create()->findPk($param[0]);

			if($question)
			{
				try
				{
					$typeReponse = $question->getTipoResposta();

					if(in_array($typeResponse, array(3, 4, 5, 6)))
					{
						AlternativaQuery::create()
							->filterByPergunta($question)
							->find()
							->delete();
					}

					$question->delete();

					$result->success = true;
					$result->message = 'Pegunta removida com sucesso!';
					$result->type = 'success';
				}
				catch(Error $error)
				{
					$result->message = self::DEFAULT_ERROR_MESSAGE;
					$result->type = 'error';
					Report::sendError($error);
				}
				catch(PropelException $ex)
				{
					$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
					$result->type = 'error';
					Report::sendError($ex);
				}
			}
			else
			{
				$result->message = 'Pergunta não encontrada!';
				$result->type = 'error';
			}
		}
		else
		{
			$result->message = 'Por favor escolha uma pergunta válida!';
			$result->type = 'error';
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Inicia o processo de definição da imagem da alternativa.
	 *
	 * Este método vai apenas receber a imagem enviada e guará-la no diretório
	 * temporário da aplicação.
	 * @author Hugo Minari.
	 */
	public function uploadImagem()
	{
		$validator = new Validator;
		$validator->loadPolicy('Pesquisa/UploadImagem');
		$result = $this->createResult();

		if($validator->validate())
		{
			$rules = $validator->getRules();
			$upload = new UploadManager;
			$upload->setAllowedExtensions($rules['file']->getTypes());
			$upload->setMaxFileSize($rules['file']->getSize());

			try
			{
				$fileExt	= Text::split('.', $upload->getFile('file')->name)->getLast();
				$fileName	= substr($upload->getFile('file')->name, 0 , (strrpos($upload->getFile('file')->name, ".")));
				$pathImage	= $this->application->getPath('resources') . 'img/alternativas/temp/';
				$image		= $fileName . '.' . $fileExt;
				$thumbnail	= $fileName . '-thumb.' . $fileExt;

				if(!Dir::exists($pathImage))
					Dir::create($pathImage);

				//Salva a imagem na pasta temp de alternativas
				$upload->setNewName($image);
				$upload->save($pathImage);

				//Cria uma thumbnail
				$thumb = new Thumb($pathImage . $image);
				$thumb->setName($fileName . '-thumb');
				$thumb->resize(64, 64, true);

				$result->pathImage = Enviroment::resolveUrl("~/resource/default/img/alternativas/temp/"). $thumbnail;
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
	 * Finaliza o processo de upload da imagem da alternativa.
	 *
	 * O que este método faz é apenas copiar a imagem enviada da pasta temp
	 * dentro de alternativas para a pasta final, identificada pelo id da
	 * pergunta. A imagem é renomeada para o id da alternativa e miniaturas
	 * são criadas.
	 *
	 * @param int $idPergunta Id da pergunta.
	 * @param int $idAlternativa Id da alternativa.
	 * @param int $image Nome da imagem original que foi salva no metodo upload.
	 * @author Hugo Minari.
	 */
	private function salvarImagem($idPergunta, $idAlternativa, $image)
	{
		//Caminho temporário da imagem.
		$pathOriginal	= $this->application->getPath('resources') . 'img/alternativas/temp/';
		$fullFilePath	= $pathOriginal . $image;
		$fileExt		= Text::split('.', $image)->getLast();

		//Copia a imagem temporária para a pasta final.
		$tmpFile = File::open($fullFilePath);
		$tmpFile->copyTo($this->getOptionsDir($idPergunta) . $idAlternativa . '.' . $fileExt);
		$tmpFile->close();

		//Pega o caminho da imagem final.
		$pathFinal = $this->application->getPath('resources') . 'img/alternativas/p-' . $idPergunta . '/' . $idAlternativa . '.' . $fileExt;

		//Se a imagem for diferente de JPG, converte e altera o path.
		$img  = new Image($pathFinal);
		$path = $img->getPath();

		//Se a imagem for diferente de JPG, converte e altera o path.
		if($img->getType() != Image::JPEG)
		{
			$jpeg = $img->convert(Image::JPEG);
			$path = $jpeg->getPath();
			File::remove($img->getPath());
		}

		//Cria as miniaturas na pasta final
		$thumb = new Thumb($path);
		$thumb->setName($idAlternativa . '-thumb');
		$thumb->resize(89, 89, true);
	}

	/**
	 * Função para deletar as imagens e as thumbnails da pasta temporária
	 * ao concluir o cadastro da pesquisa.
	 *
	 * @param array $listaImagens Array com nome das imagens para deletar.
	 * @author Hugo Minari
	 */
	private function deletarImagem($listaImagens = null)
	{
		$path = $this->application->getPath('resources') . 'img/alternativas/temp/';

		if(count($listaImagens) > 0)
		{
			for($i = 0; $i < count($listaImagens); ++$i)
			{
				$fileName	= substr($listaImagens[$i], 0 , (strrpos($listaImagens[$i], ".")));
				$fileExt	= Text::split('.', $listaImagens[$i])->getLast();
				$image		= $path . $listaImagens[$i];
				$thumb		= $path . $fileName . '-thumb.' . $fileExt;

				try
				{
					if(File::exists($image))
						File::remove($image);

					if(File::exists($thumb))
						File::remove($thumb);
				}
				catch (Exception $ex)
				{
					Report::sendError($ex);
				}

			}
		}
	}

	/**
	 * Retorna o caminho da pasta onde as imagens das alternativas foram salvas.
	 *
	 * O diretório é criado automaticamente caso ainda não exista.
	 * @param string $idPergunta Nome da pasta a ser criada.
	 * @return string Caminho do diretório da imagem.
	 * @author Hugo Minari.
	 */
	private function getOptionsDir($idPergunta)
	{
		$optionDir = $this->application->getPath('resources') . 'img/alternativas/p-' . $idPergunta . '/';

		if(!Dir::exists($optionDir))
			Dir::create($optionDir);

		return $optionDir;
	}

	/**
	 * Função que publica a pesquisa, após a publicação a pesquisa não pode
	 * ser editada e não tem como "despublicar".
	 * @param ArrayList $param Recebe o id da pesquisa a ser publicada.
	 * @author Hugo Minari
	 */
	public function publicarPesquisa(ArrayList $param)
	{
		$result = $this->createResult();
		$idPesquisa = $param[0];

		if(ArrayList::isValid($param))
		{
			$pesquisa = PesquisaQuery::create()->findPk($idPesquisa);

			if($pesquisa)
			{
				try
				{
					PesquisaQuery::create()
						->findPk($idPesquisa)
						->setPublicada(true)
						->save();
				}
				catch(Exception $error)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($error);
					$result->message = self::DEFAULT_ERROR_MESSAGE;
				}
				catch(PropelException $ex)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($ex);
					$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
				}

				$result->success = true;
				$result->message = "Pesquisa <b>{$pesquisa->getTitulo()}</b> publicada com sucesso!";
				$result->type = 'success';
			}
			else
			{
				$result->message = 'Esta pesquisa não foi encontrada!';
				$result->type = 'error';
			}
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Função que modifica a obrigatoriedade da pergunta.
	 * Primeiro parametro recebido é o id da pergunta e o segundo é a
	 * obrigatoriedade atual.
	 * @param ArrayList $param Recebe lista de parametros necessários.
	 * @author Hugo Minari.
	 */
	public function perguntaObrigatoria(ArrayList $param)
	{
		$result = $this->createResult();
		$idPergunta = $param[0];
		$obrigatoria = $param[1];

		if(ArrayList::isValid($param))
		{
			//Define as variaveis de retorno
			if($obrigatoria == 1)
			{
				$required = 0;
				$classRemove = 'text-danger';
				$classAdd = 'text-default';
				$title = 'Clique para torna-la obrigatória';
				$mensagem = 'Pergunta definida como opcional!';
			}
			else
			{
				$required = 1;
				$classRemove = 'text-default';
				$classAdd = 'text-danger';
				$title = 'Clique para torna-la opcional';
				$mensagem = 'Pergunta definida como obrigatória!';
			}

			//Verifica se a pergunta existe
			$pergunta = PerguntaQuery::create()->findPk($idPergunta);

			if($pergunta)
			{
				try
				{
					PerguntaQuery::create()
						->findPk($idPergunta)
						->setObrigatoria($required)
						->save();
				}
				catch(Exception $error)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($error);
					$result->message = self::DEFAULT_ERROR_MESSAGE;
				}
				catch(PropelException $ex)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($ex);
					$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
				}

				$result->success = true;
				$result->classRemove = $classRemove;
				$result->classAdd = $classAdd;
				$result->required = $required;
				$result->title = $title;
				$result->message = $mensagem;
				$result->type = 'success';
			}
			else
			{
				$result->message = 'Pergunta não foi encontrada!';
				$result->type = 'error';
			}
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Função que transforma array multidimensional em uniquedimensional.
	 * Também remove valores em branco e duplicados.
	 * @param Array $array Array multidimensional para ser transformado.
	 * @param Boolean $unique (opcional) Remover duplicados (default false).
	 * @return Array Array tratado ou Array vazio.
	 * @author Hugo Minari.
	 */
	public function arraySingle($array, $unique = false)
	{
		$temp = array();

		if(is_array($array))
		{
			foreach($array as $ar)
			{
				if(is_array($ar))
				{
					foreach($ar as $a)
						$temp[] = $a;
				}
				else
					$temp[] = $ar;
			}

			//Remove valores em branco
			$temp = array_filter($temp);

			//Remove duplicados
			if($unique)
				$temp = array_unique($temp);
		}

		return $temp;
	}

	/**
	 * Função para duplicar uma pesquisa. Não inclui atribuição de usuários ou
	 * coletas realizadas.
	 * @param ArrayList $params Recebe uma lista de parâmetros, onde se espera
	 * o id da pesquisa com primeiro valor.
	 * @author Hugo Minari
	 */
	public function duplicarPesquisa(ArrayList $params)
	{
		Enviroment::disableTimeout();
		Propel::disableInstancePooling();

		if(ArrayList::isValid($params) && !$params->isEmpty())
		{
			$result = $this->createResult();
			$pesquisaId = $params[0];
			$requestAjax = $this->request->isAjaxRequest();

			//Duplicar pesquisa
			$original = PesquisaQuery::create()->findPk($pesquisaId);

			if(!empty($original) && $requestAjax)
			{
				$quantidade = PesquisaQuery::create()->filterByTitulo($original->getTitulo(). '%')->find()->count();
				$novoNome = "{$original->getTitulo()}({$quantidade})";

				$pesquisaDuplicada = new Pesquisa;
				$pesquisaDuplicada->setTitulo($novoNome);
				$pesquisaDuplicada->setDataCriacao(time());
				$pesquisaDuplicada->setDataInicio(Utils::formatDateDb($original->getDataInicio()));
				$pesquisaDuplicada->setDataFim(Utils::formatDateDb($original->getDataFim()));
				$pesquisaDuplicada->setLatitude($original->getLatitude());
				$pesquisaDuplicada->setLongitude($original->getLongitude());
				$pesquisaDuplicada->setAreaLimite($original->getAreaLimite());
				$pesquisaDuplicada->setDescricao($original->getDescricao());
				$pesquisaDuplicada->setAbrangencia($original->getAbrangencia());
				$pesquisaDuplicada->setUfId($original->getUfId());
				$pesquisaDuplicada->setCidadeId($original->getCidadeId());
				$pesquisaDuplicada->setAutorId(Usuario::atual()->getId());

				try
				{
					$pesquisaDuplicada->save();
				}
				catch(Exception $error)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($error);
					$result->message = self::DEFAULT_ERROR_MESSAGE;
				}
				catch(PropelException $ex)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($ex);
					$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
				}

				//Duplicar publico alvo
				$alvoOriginal = PublicoAlvoQuery::create()->filterByPesquisa($original)->find();

				if(!$alvoOriginal->isEmpty())
				{
					foreach($alvoOriginal as $alvo)
					{
						$alvoDuplicado = new PublicoAlvo;
						$alvoDuplicado->setPesquisa($pesquisaDuplicada);
						$alvoDuplicado->setIdadeInicial($alvo->getIdadeInicial());
						$alvoDuplicado->setIdadeFinal($alvo->getIdadeFinal());
						$alvoDuplicado->setQuantidadeMasculino($alvo->getQuantidadeMasculino());
						$alvoDuplicado->setQuantidadeFeminino($alvo->getQuantidadeFeminino());
						$alvoDuplicado->setQuatidadeTotal($alvo->getQuatidadeTotal());

						try
						{
							$alvoDuplicado->save();
						}
						catch(Exception $error)
						{
							Propel::getConnection()->rollBack();
							Report::sendError($error);
							$result->message = self::DEFAULT_ERROR_MESSAGE;
						}
						catch(PropelException $ex)
						{
							Propel::getConnection()->rollBack();
							Report::sendError($ex);
							$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
						}
					}
				}

				//Duplicar categorias
				$categoriaOriginal = CategoriaQuery::create()
					->usePerguntaQuery()
						->filterByPesquisaId($original->getId())
						->groupByCategoriaId()
					->endUse()
					->find();

				if(!$categoriaOriginal->isEmpty())
				{
					foreach($categoriaOriginal as $categoria)
					{
						$categoriaDuplicada = new Categoria;
						$categoriaDuplicada->setNome($categoria->getNome());
						$categoriaDuplicada->setPosicao($categoria->getPosicao());

						try
						{
							$categoriaDuplicada->save();
						}
						catch(Exception $error)
						{
							Propel::getConnection()->rollBack();
							Report::sendError($error);
							$result->message = self::DEFAULT_ERROR_MESSAGE;
						}
						catch(PropelException $ex)
						{
							Propel::getConnection()->rollBack();
							Report::sendError($ex);
							$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
						}

						//Duplica as perguntas da categoria
						$perguntaOriginal = PerguntaQuery::create()
							->filterByPesquisa($original)
							->filterByCategoria($categoria)
							->find();

						if(!$perguntaOriginal->isEmpty())
						{
							foreach($perguntaOriginal as $pergunta)
							{
								$perguntaDuplicada = new Pergunta;
								$perguntaDuplicada->setPesquisa($pesquisaDuplicada);
								$perguntaDuplicada->setTexto($pergunta->getTexto());
								$perguntaDuplicada->setTipoResposta($pergunta->getTipoResposta());
								$perguntaDuplicada->setPosicao($pergunta->getPosicao());
								$perguntaDuplicada->setCategoriaId($pergunta->getCategoriaId());
								$perguntaDuplicada->setObrigatoria($pergunta->getObrigatoria());
								$perguntaDuplicada->setExcecao($pergunta->getExcecao());

								try
								{
									$perguntaDuplicada->save();
								}
								catch(Exception $error)
								{
									Propel::getConnection()->rollBack();
									Report::sendError($error);
									$result->message = self::DEFAULT_ERROR_MESSAGE;
								}
								catch(PropelException $ex)
								{
									Propel::getConnection()->rollBack();
									Report::sendError($ex);
									$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
								}

								$tiposResposta = array(
									Resposta::RESPOTA_TIPO_MULTIPLA_ESCOLHA,
									Resposta::RESPOTA_TIPO_MULTIPLA_ESCOLHA_IMAGEM,
									Resposta::RESPOTA_TIPO_OPCAO_UNICA,
									Resposta::RESPOTA_TIPO_OPCAO_UNICA_IMAGEM
								);

								//Se a pergunta duplicada tem alternativas
								if(in_array($pergunta->getTipoResposta(), $tiposResposta))
								{
									$alternativaOriginal = AlternativaQuery::create()
										->filterByPergunta($pergunta)
										->find();

									//Duplica as alternativas
									if(!$alternativaOriginal->isEmpty())
									{
										foreach($alternativaOriginal as $alternativa)
										{
											$alternativaDuplicada = new Alternativa;
											$alternativaDuplicada->setPergunta($perguntaDuplicada);
											$alternativaDuplicada->setTexto($alternativa->getTexto());
											$alternativaDuplicada->setPosicao($alternativa->getPosicao());

											try
											{
												$alternativaDuplicada->save();
											}
											catch(Exception $error)
											{
												Propel::getConnection()->rollBack();
												Report::sendError($error);
												$result->message = self::DEFAULT_ERROR_MESSAGE;
											}
											catch(PropelException $ex)
											{
												Propel::getConnection()->rollBack();
												Report::sendError($ex);
												$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
											}
										}
									}
								}
							}
						}
					}
				}

				$result->success	= true;
				$result->message	= 'Pesquisa duplicada com sucesso!';
				$result->type		= 'success';

				$obs = "Pesquisa Original: #{$original->getId()} / Duplicada: #{$pesquisaDuplicada->getId()}";
				Auditoria::adicionar('Usuário duplicou uma pesquisa', Auditoria::LEVEL_INFO, null, $obs, Auditoria::TIPO_PESQUISA, $pesquisaId);

			}
			else
			{
				$result->message = 'Requisição inválida!';
				$result->type = 'error';
			}
		}
		else
		{
			$result->message = 'Parâmetros incorretos!';
			$result->type = 'error';
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Função que remove todas as informações da pesquisa, incluindo coletas de
	 * respostas, perguntas, alternativas, publico alvo, categorias e etc.
	 * @param ArrayList $params Recebe uma lista de parâmetros, onde se espera
	 * o id da pesquisa com primeiro valor.
	 * @author Hugo Minari
	 */
	public function excluirPesquisa(ArrayList $params)
	{
		if(ArrayList::isValid($params) && !$params->isEmpty())
		{
			$result = $this->createResult();
			$requestAjax = $this->request->isAjaxRequest();
			$pesquisaId = $params[0];
			$pesquisa = PesquisaQuery::create()->findPk($pesquisaId);

			if($pesquisa && $requestAjax)
			{
				//Deleta Respostas
				try
				{
					RespostaQuery::create()
						->usePerguntaQuery()
							->filterByPesquisa($pesquisa)
						->endUse()
						->find()
						->delete();
				}
				catch(Exception $error)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($error);
					$result->message = self::DEFAULT_ERROR_MESSAGE;
				}
				catch(PropelException $ex)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($ex);
					$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
				}

				//Deleta Coletas
				try
				{
					ColetaPesquisaQuery::create()
						->filterByPesquisa($pesquisa)
						->find()
						->delete();
				}
				catch(Exception $error)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($error);
					$result->message = self::DEFAULT_ERROR_MESSAGE;
				}
				catch(PropelException $ex)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($ex);
					$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
				}

				//Deleta Pesquisadores
				try
				{
					PesquisaUsuarioQuery::create()
						->filterByPesquisa($pesquisa)
						->find()
						->delete();
				}
				catch(Exception $error)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($error);
					$result->message = self::DEFAULT_ERROR_MESSAGE;
				}
				catch(PropelException $ex)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($ex);
					$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
				}

				//Deleta MetaPublicoAlvo
				try
				{
					MetaPublicoAlvoQuery::create()
						->usePublicoAlvoQuery()
							->filterByPesquisa($pesquisa)
						->endUse()
						->find()
						->delete();
				}
				catch(Exception $error)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($error);
					$result->message = self::DEFAULT_ERROR_MESSAGE;
				}
				catch(PropelException $ex)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($ex);
					$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
				}

				//Deleta PublicoAlvo
				try
				{
					PublicoAlvoQuery::create()
						->filterByPesquisa($pesquisa)
						->find()
						->delete();
				}
				catch(Exception $error)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($error);
					$result->message = self::DEFAULT_ERROR_MESSAGE;
				}
				catch(PropelException $ex)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($ex);
					$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
				}

				//Deleta Alternativas
				try
				{
					AlternativaQuery::create()
						->usePerguntaQuery()
							->filterByPesquisa($pesquisa)
						->endUse()
						->find()
						->delete();
				}
				catch(Exception $error)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($error);
					$result->message = self::DEFAULT_ERROR_MESSAGE;
				}
				catch(PropelException $ex)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($ex);
					$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
				}

				//Deleta Perguntas
				try
				{
					PerguntaQuery::create()
						->filterByPesquisa($pesquisa)
						->find()
						->delete();
				}
				catch(Exception $error)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($error);
					$result->message = self::DEFAULT_ERROR_MESSAGE;
				}
				catch(PropelException $ex)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($ex);
					$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
				}

				//Deleta Categorias
				try
				{
					CategoriaQuery::create()
						->usePerguntaQuery()
							->filterByPesquisa($pesquisa)
							->groupByCategoriaId()
						->endUse()
						->find()
						->delete();
				}
				catch(Exception $error)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($error);
					$result->message = self::DEFAULT_ERROR_MESSAGE;
				}
				catch(PropelException $ex)
				{
					Propel::getConnection()->rollBack();
					Report::sendError($ex);
					$result->message = self::DEFAULT_DATABASE_ERROR_MESSAGE;
				}

				//Deleta a pesquisa
				$pesquisa->delete();

				$result->success	= true;
				$result->message	= 'Pesquisa excluída com sucesso!';
				$result->type		= 'success';

				Auditoria::adicionar('Usuário excluiu uma pesquisa', Auditoria::LEVEL_INFO, null, null, Auditoria::TIPO_PESQUISA, $pesquisaId);
			}
			else
			{
				$result->message = 'Requisição inválida!';
				$result->type = 'error';
			}
		}
		else
		{
			$result->message = 'Parâmetros incorretos!';
			$result->type = 'error';
		}

		$this->sendAjaxResponse($result);
	}
}
