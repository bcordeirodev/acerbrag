<?php
/**
 * This file contains only a controller.
 * @package control
 * @subpackage page
 */

/**
 * Controle responsável pela parte de coleta e apresentação das respostas da pesquisa
 * @author Bruno Cordeiro
 * @package control
 * @subpackage page
 */
class ColetaController extends DefaultPageController
{
	/**
	 * Lista de colunas usadas para filtro e exportação.
	 * @var array
	 */
	private $filterColumns = array(
		array(
			'label' => 'Id da coleta',
			'name' => 'c.Id',
			'show' => false,
		),
		array(
			'label' => 'Id da pesquisa',
			'name' => 'c.PesquisaId',
			'show' => true,
		),
		array(
			'label' => 'Nº da coleta',
			'name' => 'c.NumeroColeta',
			'show' => true,
		),
		array(
			'label' => 'Cpf do pesquisador',
			'name' => 'u.Cpf',
			'show' => true,
		),
		array(
			'label' => 'Email do pesquisador',
			'name' => 'u.Email',
			'show' => true,
		),
		array(
			'label' => 'Data da coleta',
			'name' => 'c.DataCriacao',
			'show' => true,
			'type' => 'date'
		),
		array(
			'label' => 'Status',
			'name' => 'c.Status',
			'show' => true
		),
	);

	/**
	 * Exibe a página inicial.
	 * @author Bruno Cordeiro.
	 */
	public function index()
	{
		$this->view->setHtmlPage('Coleta.Index');
		$this->view->addResource('~/plugins/jquery-datatable/css/jquery.dataTables.css');
		$this->view->addResource('~/plugins/datatables-responsive/css/datatables.responsive.css');
		$this->view->addResource('~/plugins/jquery-datatable/jquery.dataTables.min.js');
		$this->view->addResource('~/plugins/jquery-datatable/extra/js/TableTools.min.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/datatables.responsive.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/lodash.min.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/js/collect.js');
		$this->view->initializePage();
		$this->setActiveMenuItem('Coletas');

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
						case 6:
							$isSelect = true;
							$result->input['html'] .= '<option value="1">Marcada para auditoria</option>';
							$result->input['html'] .= '<option value="2">Auditoria realizada</option>';
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
	 * Lista todas as coletas das pesquisas feitas pelos pesquisadores.
	 * @author Bruno Cordeiro da Silva.
	 * @return List.
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
				FilterContainerComponent::saveState("filter{$this->getControllerName()}");

				$table = ColetaPesquisaQuery::create('c')
					->joinPesquisa('p')
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
								case 'c.DataCriacao':
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

				$records					= $table->paginate($page, $length);
				$result->recordsTotal		= $records->getNbResults();
				$result->success			= true;
				$result->data				= array();
				$result->recordsFiltered	= $records->count();
				$result->draw				= $draw;
				$baseUrl					= $this->application->getBaseUrl();

				if(!empty($records))
				{
					foreach($records as $collect)
					{
						$statusColeta	= $collect->getStatus();
						$deleteLink		= '<li><a href="javascript:;" data-coleta-id="' . $collect->getId() . '" class="excluir"><i class="fa fa-trash-o m-r-5"></i> Excluir</a></li>';
						$auditLink		= '<li><a href="javascript:;" data-coleta-id="' . $collect->getId() . '" class="auditar"><i class="fa fa-gavel m-r-5"></i> Auditar</a></li>';
						$auditedLink	= '<li><a href="javascript:;" data-coleta-id="' . $collect->getId() . '" data-status="close" class="auditar"><i class="fa fa-thumbs-o-up m-r-5"></i> Auditada</a></li>';
						$audited		= '<li><a href="javascript:;" class="text-muted" disabled><i class="fa fa-thumbs-o-up m-r-5"></i> Auditada</a></li>';

						switch($statusColeta)
						{
							case ColetaPesquisa::MARCADA_PARA_AUDITORIA:
								$audit = $auditedLink;
								$color = ' text-warning';
								$status= 'Aguardando auditoria';
								break;
							case ColetaPesquisa::AUDITORIA_REALIZADA:
								$audit = $audited;
								$color = ' text-success';
								$status= 'Auditoria finalizada';
								break;
							default :
								$audit = $auditLink;
								$color = ' text-default';
								$status= 'Coleta realizada';
								break;
						}

						$viewLink = '<a href="' . $baseUrl . 'coleta/ver/' . $collect->getId() . '" class="btn btn-small btn-white' . $color . '"><i class="fa fa-eye m-r-5"></i> Ver</a>';
						$actions = '<div class="btn-group" data-toggle="tooltip" data-placement="top" title="' . $status . '">
										' . $viewLink . '
										<button class="btn btn-small btn-white dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
										<ul class="dropdown-menu">
											' . $deleteLink . '
											' . $audit . '
										</ul>
									</div>';

						$checkbox = new CheckboxComponent;
						$checkbox->find('input', 'HtmlInput')->getFirst()->setValue($collect->getId());

						$result->data[] = array(
							$checkbox->getHtml(),
							$collect->getPesquisa()->getId(),
							$collect->getNumeroColeta(),
							$collect->getPesquisa()->getTitulo(),
							$collect->getUsuario()->getNome(),
							$collect->getDataCriacao('d/m/Y'),
							$actions
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
	 * Apresenta a tela com as informações da coleta e as respostas salvas
	 * pelo pesquisador.
	 * @param ArrayList @param O id da coleta é o primeiro valor do array.
	 */
	public function ver(ArrayList $param)
	{
		$this->view->setHtmlPage('Coleta.Ver');
		$this->view->addResource('~/plugins/jquery-datatable/css/jquery.dataTables.css');
		$this->view->addResource('~/plugins/datatables-responsive/css/datatables.responsive.css');
		$this->view->addResource('~/plugins/jquery-datatable/jquery.dataTables.min.js');
		$this->view->addResource('~/plugins/jquery-datatable/extra/js/TableTools.min.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/datatables.responsive.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/lodash.min.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/js/collect.js');
		$this->view->initializePage();
		$this->setActiveMenuItem('Coletas');

		HtmlDocument::getByTag('head')->getFirst()->append(
			  '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAW6FOfqaQUXlsYKmIqEIOlX4fiQONoLJk"></script>'
			. '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>'
			. '<script type="text/javascript" src="https://www.google.com/jsapi"></script>'
		);

		if(ArrayList::isValid($param) && count($param) > 0)
		{
			$collect = ColetaPesquisaQuery::create()->findPk($param[0]);

			if($collect)
			{
				$this->view->addData('collect', array(
					'nome' => $collect->getUsuario()->getNome(),
					'latitude' => $collect->getLatitude(),
					'longitude' => $collect->getLongitude()
				));

				$research = $collect->getPesquisa();
				$user = $collect->getUsuario();

				$doc = HtmlDocument::getCommomDocument();

				$doc->getById('research-title')->append($research->getTitulo());
				$doc->getById('js-research-link')->toType('HtmlLink')->setUrl('~/pesquisa/editar/' . $research->getId());
				$doc->getById('js-user-link')->toType('HtmlLink')->setUrl('~/usuario/editar/' . $user->getId());
				$doc->getById('user-name')->append($user->getNome());
				$doc->getById('time-start')->append($collect->getTempoInicio('H:i:s'));
				$doc->getById('time-final')->append($collect->getTempoFim('H:i:s'));
				$doc->getById('date-collect')->append($collect->getTempoInicio('d/m/Y H:i:s'));

				$categories = CategoriaQuery::create('c')
						->joinPergunta('p')
						->join('p.Pesquisa')
						->where('Pesquisa.Id = ?', $research->getId())
						->distinct()
						->find();

				$questionsAdded = HtmlDocument::getById('questions-added');
				$questionsAdded->createCategory($categories);
				$questionsAdded->addQuestions(PerguntaQuery::create()->filterByPesquisa($research)->find());
				$questionsAdded->addResponses(RespostaQuery::create()->filterByColetaPesquisa($collect)->find());

				$pathAudio = "{$this->application->getPath('resources')}gravacaoPesquisa/{$research->getId()}/{$collect->getId()}.mp3";

				if(File::exists($pathAudio))
				{
					$urlAudio = Enviroment::resolveUrl("~/resource/default/gravacaoPesquisa/{$research->getId()}/{$collect->getId()}.mp3");
					$doc->getByTag('audio')->getFirst()->firstChild->setAttribute('src', $urlAudio);
				}
				else
				{
					$doc->getById('box-gravacao')->remove();
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
				$this->pageNotFound();
			}
		}
		else
		{
			$this->pageNotFound();
		}
	}

	/**
	 * Remove uma ou mais coletas do banco de dados.
	 * @param ArrayList $params Array de parâmetros recebidos na requisição.
	 * Cada parâmetro indica o ID de um registro para ser removido.
	 *
	 * @author Hugo Minari
	 */
	public function excluirColeta(ArrayList $params = null)
	{
		if(ArrayList::isValid($params) && !$params->isEmpty())
		{
			$result = $this->createResult();

			foreach($params as $id)
			{
				$coleta = ColetaPesquisaQuery::create()->findPk($id);

				if($coleta)
				{
					try
					{
						//Resgata as respostas da coleta
						$respostas = RespostaQuery::create()
							->filterByColetaPesquisa($coleta)
							->find();

						//ID da pergunta que contem a idade
						$pergunta = PerguntaQuery::create('pe')
							->filterByPesquisaId($coleta->getPesquisaId())
							->where('pe.Texto = ?', 'Idade')
							->findOne();
						$idPerguntaIdade = $pergunta->getId();

						//ID da pergunta que contem ao sexo
						$perguntaSexo = PerguntaQuery::create('ps')
							->filterByPesquisaId($coleta->getPesquisaId())
							->where('ps.Texto = ?', 'Sexo')
							->findOne();
						$idPerguntaSexo = $perguntaSexo->getId();

						//Pega a idade e sexo da coleta.
						foreach($respostas as $resposta)
						{
							$idResposta = $resposta->getPerguntaId();

							if($idResposta == $idPerguntaIdade)
								$idade = $resposta->getTexto();

							if($idResposta == $idPerguntaSexo)
								$sexo = $resposta->getTexto();
						}

						//Pega o publico alvo para ajustar os numeros
						$publicoAlvo = PublicoAlvoQuery::create('pa')
							->filterByPesquisaId($coleta->getPesquisaId())
							->where('pa.IdadeInicial <= ?', $idade)
							->_and()
							->where('pa.IdadeFinal >= ?', $idade)
							->findOne();

						//Remove do MetaPublicoAlvo
						$metaPublico = MetaPublicoAlvoQuery::create()
							->filterByPublicoAlvo($publicoAlvo)
							->findOne();

						$newNumberWomans = $metaPublico->getMulheres() - 1;
						$newNumberMans = $metaPublico->getHomens() - 1;

						if($sexo == 'Mulher')
						{
							$metaPublico->setMulheres($newNumberWomans);
							$obs = "Foi removida uma coleta da pesquisa #{$coleta->getPesquisaId()}, onde o entrevistado era do sexo feminino e {$idade} anos.";
						}
						else
						{
							$metaPublico->setHomens($newNumberMans);
							$obs = "Foi removida uma coleta da pesquisa #{$coleta->getPesquisaId()}, onde o entrevistado era do sexo masculino e {$idade} anos.";
						}

						$metaPublico->save();

						//Deleta as respostas
						$respostas->delete();

						//Deleta a coleta
						$coleta->delete();

						Auditoria::adicionar("Coleta removida", Auditoria::LEVEL_INFO, null, $obs, Auditoria::TIPO_COLETA, $id);

						$result->message	= 'Coleta(s) removida(s) com sucesso!';
						$result->type		= 'success';
						$result->success	= true;
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
			}

			$this->sendAjaxResponse($result);
		}
	}

	/**
	 * Remove uma ou mais coletas do banco de dados.
	 * @param ArrayList $params Array de parâmetros recebidos na requisição.
	 * Cada parâmetro indica o ID de um registro para ser removido.
	 *
	 * @author Hugo Minari
	 */
	public function auditar(ArrayList $params = null)
	{
		$result = $this->createResult();

		if(ArrayList::isValid($params) && !$params->isEmpty())
		{
			$audited = false;

			foreach($params as $param)
			{
				if($param == 'auditada')
				{
					$audited = true;
					break;
				}
			}

			foreach($params as $id)
			{
				$coleta = ColetaPesquisaQuery::create()->findPk($id);
				$status = !$audited ? ColetaPesquisa::MARCADA_PARA_AUDITORIA : ColetaPesquisa::AUDITORIA_REALIZADA;
				$message = !$audited ? 'Coleta marcada para auditoria' : 'Coleta auditada';

				if(!empty($coleta))
				{
					try
					{
						$coleta->setStatus($status);
						$coleta->save();

						$result->success	= true;
						$result->type		= 'success';
						$result->message	= 'Coleta(s) marcada(s) com sucesso!';
						Auditoria::adicionar($message, Auditoria::LEVEL_INFO, null, null, Auditoria::TIPO_COLETA, $id);
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
			}
		}
		else
		{
			$result->message = 'Parâmetros inválido';
			$result->type = 'error';
		}

		$this->sendAjaxResponse($result);
	}

}
