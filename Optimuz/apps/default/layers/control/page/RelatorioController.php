<?php
/**
 * Este arquivo contém a classe Relatório que faz parte do sistema GPES.
 */
use OneSheet\Writer;

/**
 * Classe responsável por gerar os tipos de relatório das pesquisas
 * selecionadas.
 * @author Hugo Minari
 */
class RelatorioController extends DefaultPageController
{
	/**
	 * Função para exibir os tipos de relatório disponíveis.
	 *
	 * @author Hugo Minari
	 */
	public function index()
	{
		$this->view->setHtmlPage('Relatorio.Index');
		$this->view->initializePage();
		$this->setActiveMenuItem('Relatórios');

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
	 * Função apenas exibe a view para que o usuario escolha um range de datas
	 * para escolher a pesquisa que deseja ver os gráficos.
	 *
	 * @author Hugo Minari
	 */
	public function analitico()
	{
		$this->setup('Relatórios', 'Analitico');

		try
		{
			HtmlDocument::getById('data-inicio')->setAttribute('value', date('d/m/Y'));
			HtmlDocument::getById('data-fim')->setAttribute('value', date('d/m/Y', strtotime("+30 days")));
			$this->callView();
		}
		catch(Error $error)
		{
			Report::sendError($error);
			$this->error($error);
		}
	}

	/**
	 * Função apenas exibe a view para que o usuario escolha um range de datas
	 * para escolher a pesquisa que deseja ver os gráficos.
	 *
	 * @author Hugo Minari
	 */
	public function usuario()
	{
		$this->setup('Relatórios', 'Usuario');

		try
		{
			HtmlDocument::getById('data-inicio')->setAttribute('value', date('d/m/Y'));
			HtmlDocument::getById('data-fim')->setAttribute('value', date('d/m/Y', strtotime("+30 days")));
			$this->callView();
		}
		catch(Error $error)
		{
			Report::sendError($error);
			$this->error($error);
		}
	}

	/**
	 * Função apenas exibe a view para que o usuario escolha um range de datas
	 * e exibe as pesquisa que conferem com os filtros aplicados.
	 *
	 * @author Hugo Minari
	 */
	public function aplicacao()
	{
		$this->setup('Relatórios', 'Aplicacao');

		try
		{
			HtmlDocument::getById('data-inicio')->setAttribute('value', date('d/m/Y'));
			HtmlDocument::getById('data-fim')->setAttribute('value', date('d/m/Y', strtotime("+30 days")));
			$this->callView();
		}
		catch(Error $error)
		{
			Report::sendError($error);
			$this->error($error);
		}
	}

	/**
	 * Função apenas exibe a view para que o usuario escolha um range de datas
	 * e exibe as pesquisa que conferem com os filtros aplicados.
	 *
	 * @author Hugo Minari
	 */
	public function descritivo()
	{
		$this->setup('Relatórios', 'Descritivo');

		try
		{
			HtmlDocument::getById('data-inicio')->setAttribute('value', date('d/m/Y'));
			HtmlDocument::getById('data-fim')->setAttribute('value', date('d/m/Y', strtotime("+30 days")));
			$this->callView();
		}
		catch(Error $error)
		{
			Report::sendError($error);
			$this->error($error);
		}
	}

	/**
	 * Função apenas exibe a view para que o usuario escolha um range de datas
	 * e exibe as pesquisa que conferem com os filtros aplicados.
	 *
	 * @author Hugo Minari
	 */
	public function perfilAmostral()
	{
		$this->setup('Relatórios', 'PerfilAmostral');

		try
		{
			HtmlDocument::getById('data-inicio')->setAttribute('value', date('d/m/Y'));
			HtmlDocument::getById('data-fim')->setAttribute('value', date('d/m/Y', strtotime("+30 days")));
			$this->callView();
		}
		catch(Error $error)
		{
			Report::sendError($error);
			$this->error($error);
		}
	}

	/**
	 * Função apenas exibe a view para que o usuario escolha um range de datas
	 * e exibe as pesquisa que conferem com os filtros aplicados.
	 *
	 * @author Hugo Minari
	 */
	public function geral()
	{
		$this->setup('Relatórios', 'Geral');

		try
		{
			HtmlDocument::getById('data-inicio')->setAttribute('value', date('d/m/Y'));
			HtmlDocument::getById('data-fim')->setAttribute('value', date('d/m/Y', strtotime("+30 days")));
			$this->callView();
		}
		catch(Error $error)
		{
			Report::sendError($error);
			$this->error($error);
		}
	}

	/**
	 * Filtra as pesquisas de acordo com o range de datas selecionadas.
	 * Esta função é utilizada para todas as view de relatório.
	 *
	 * @author Hugo Minari
	 */
	public function filtraPesquisasData()
	{
		$validator = new Validator;
		$validator->loadPolicy('Relatorio/Filtrar');
		$result = $this->createResult();

		if($validator->validate())
		{
			try
			{
				$dataInicio	= Utils::formatDateDb($validator->getInputValue('data-inicio'));
				$dataFim	= Utils::formatDateDb($validator->getInputValue('data-fim'));
				$view		= $validator->getInputValue('view');

				$pesquisasRespondidas = $this->filtraPesquisasRespondidas();

				$pesquisasFinais = array();

				foreach($pesquisasRespondidas as $id)
				{
					$pesquisas = PesquisaQuery::create()
						->filterByDataInicio(array("min" => $dataInicio, "max" => $dataFim))
						->filterById($id)
						->findOne();

					if(!empty($pesquisas))
					{
						$pesquisasFinais[] = array(
							'id' => $pesquisas->getId(),
							'titulo' => $pesquisas->getTitulo()
						);
					}
				}

				switch($view)
				{
					case 'analitico':
						$result->url = Enviroment::resolveUrl("~/relatorio/grafico-analitico/pesquisa:");
						$result->callback = 'listarPesquisa';
						break;

					case 'usuario':
						$result->callback = 'listarPesquisaUsuario';
						break;

					case 'aplicacao':
						$result->url = Enviroment::resolveUrl("~/relatorio/grafico-aplicacao/pesquisa:");
						$result->callback = 'listarPesquisa';
						break;

					case 'descritivo':
						$result->url = Enviroment::resolveUrl("~/relatorio/grafico-descritivo/pesquisa:");
						$result->callback = 'listarPesquisa';
						break;

					case 'perfil-amostral':
						$result->url = Enviroment::resolveUrl("~/relatorio/grafico-perfil-amostral/pesquisa:");
						$result->callback = 'listarPesquisa';
						break;
				}

				$result->success = true;
				$result->type = 'success';
				$result->dados = $pesquisasFinais;

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
			$result->message = 'Existem erros no formulário';
			$result->type = 'error';
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Função que apresenta uma view para selecionar os usuários que o cliente
	 * deseja ver as pesquisas aplicadas por eles em modo grafico e descritivo.
	 * Também é responsável por popular o select com os nomes dos pesquisadores.
	 *
	 * @param ArrayList $params (opcional) Recebe o id da pesquisa escolhida.
	 * @author Hugo Minari
	 */
	public function filtraUsuarios(ArrayList $params = null)
	{
		if(ArrayList::isValid($params))
		{
			$idPesquisa		= $params['pesquisa'];
			$result			= $this->createResult();

			try
			{
				$pesquisa = PesquisaQuery::create()->findPk($idPesquisa);

				$usuariosPesquisa = $pesquisa->getPesquisaUsuarios();
				$listaUsuarios = array();

				foreach($usuariosPesquisa as $usuarios)
				{
					$users = UsuarioQuery::create()
						->findPk($usuarios->getUsuarioId());

					$dados = array(
						'id' => $users->getId(),
						'nome' => $users->getNome()
					);

					$listaUsuarios[] = $dados;
				}

				$result->success = true;
				$result->type = 'success';
				$result->dados = $listaUsuarios;
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

		$this->sendAjaxResponse($result);

	}

	/**
	 * Função responsável por resgatar os usuário selecionados para
	 * gerar o gráfico, e envia para o método graficoUsuarios para ser exibido
	 * para o usuário.
	 *
	 * @author Hugo Minari
	 */
	public function prepararGraficosUsuarios()
	{
		$validator = new Validator;
		$validator->loadPolicy('Relatorio/FiltrarPesquisaUsuarios');
		$result = $this->createResult();

		if($validator->validate())
		{
			$usuarios	= json_encode($validator->getInputValue('usuarios'));
			$idPesquisa	= $validator->getInputValue('pesquisa');
			$view		= $validator->getInputValue('view');

			$result->success = true;
			$result->type = 'success';
			$result->pesquisa = $idPesquisa;

			switch($view)
			{
				case 'usuario':
					$result->url = Enviroment::resolveUrl("~/relatorio/grafico-usuarios/pesquisa:{$idPesquisa}/usuarios:{$usuarios}");
					break;
				case 'descritivo':
					$result->url = Enviroment::resolveUrl("~/relatorio/grafico-descritivo");
					break;
			}

			$result->callback = 'redirect';
		}
		else
		{
			$result->result = $validator->getResult();
			$result->message = 'Existem erros no formulário';
			$result->type = 'error';
		}

		$this->sendAjaxResponse($result);
	}

	/**
	 * Função para apresentar os gráficos analíticos da pesquisa selecionada
	 *
	 * @param ArrayList $params (opcional) lista de parametros recebidas.
	 * Recebe id da pesquisa.
	 * @author Hugo Minari
	 */
	public function graficoAnalitico(ArrayList $params = null)
	{
		$this->setup('Relatórios', 'GraficoAnalitico');
		$this->view->addResource('https://www.gstatic.com/charts/loader.js');
		$this->view->addResource('~/plugins/jquery-datatable/css/jquery.dataTables.css');
		$this->view->addResource('~/plugins/datatables-responsive/css/datatables.responsive.css');
		$this->view->addResource('~/plugins/jquery-datatable/jquery.dataTables.min.js');
		$this->view->addResource('~/plugins/jquery-datatable/extra/js/TableTools.min.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/datatables.responsive.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/lodash.min.js');

		$this->view->addData('desenharGraficos', true);
		$this->view->addData('grafico', 'analitico');

		try
		{
			if(ArrayList::isValid($params))
			{
				//Id da pesquisa recebido no parametro.
				$pesquisaId		= $params['pesquisa'];

				//Resgata o objeto da pesquisa.
				$dados			= $this->informacoesPesquisa($pesquisaId);
				$pesquisa		= $dados['pesquisa'];

				//Pega as perguntas da pesquisa.
				$perguntas = PerguntaQuery::create()
					->filterByPesquisa($pesquisa)
					->find();

				foreach($perguntas as $num => $pergunta)
				{
					//Define algumas variaveis da pergunta.
					$tipoResposta		= $pergunta->getTipoResposta();
					$idPergunta			= $pergunta->getId();
					$tituloPergunta		= $num+1 . ' - ' . $pergunta->getTexto();
					$totalRespostas		= 0;

					//Pega as respostas
					$respostas = RespostaQuery::create()
						->filterByPerguntaId($idPergunta)
						->find();

					//Monta a lista de respostas
					$listaRespostas = array();
					foreach($respostas as $resposta)
						$listaRespostas[] = $resposta->getTexto();

					//Se o tipo de resposta for unica ou multipla escolha.
					if(in_array($tipoResposta, array(3,4,5,6)))
					{
						//Pega as alternativas da pergunta.
						$alternativas = AlternativaQuery::create()
							->filterByPerguntaId($idPergunta)
							->find();

						//Cria o header do gráfico.
						$chartData = array(
							array('Respostas', 'Total')
						);

						foreach($alternativas as $alternativa)
						{
							//Define as variaveis da alternativa.
							$texto = $alternativa->getTexto();
							$repeats = RespostaQuery::create()
								->filterByPerguntaId($idPergunta)
								->filterByAlternativa($alternativa)
								->find()
								->count();

							//Adiciona no corpo do gráfico.
							$chartData[] = [
								$texto,
								$repeats,
							];

							//Pega a quantidade de respostas da pergunta.
							$totalRespostas += $repeats;
						}

						//Adiciona os dados Json para gerar o gráfico na div.
						HtmlDocument::getById('graphics-content')
						->append(
							'<div class="grid simple">'
								. '<div class="grid-title no-border">'
									. "<h4> {$tituloPergunta} </h4>"
									. "<hr/>"
									. "<p class='text-muted'> Resultado baseado em {$totalRespostas} respostas a esta questão. </p>"
								. "</div>"
								. '<div class="grid-body no-border">'
									. "<div class='text-left' data-chart='" . json_encode($chartData) . "'></div>"
								. '</div>'
							. '</div>'
						);
					}
					//Se o tipo de resposta for número.
					elseif($tipoResposta == 2)
					{
						//Cria o header do gráfico.
						$chartData = array(
							array('Respostas', 'Total')
						);

						$totalRespostas = count($listaRespostas);
						$repeats = array_count_values($listaRespostas);
						ksort($repeats);

						//Monta o corpo do gráfico.
						foreach($repeats as $value => $repeats)
						{
							$chartData[] = array(
								(string)$value,
								$repeats
							);
						}

						//Adiciona os dados Json para gerar o gráfico na div.
						HtmlDocument::getById('graphics-content')
						->append(
							'<div class="grid simple">'
								. '<div class="grid-title no-border">'
									. "<h4> {$tituloPergunta} </h4>"
									. "<hr/>"
									. "<p class='text-muted'> Resultado baseado em {$totalRespostas} respostas a esta questão. </p>"
								. "</div>"
								. '<div class="grid-body no-border">'
									. "<div class='text-left' data-chart='" . json_encode($chartData) . "'></div>"
								. '</div>'
							. '</div>'
						);
					}
					else
					{
						HtmlDocument::getById('graphics-content')
						->append(
							'<div class="grid simple">'
								. '<div class="grid-title no-border">'
									. "<h4> {$tituloPergunta} </h4><hr/>"
								. "</div>"
								. '<div class="grid-body no-border">'
									. "<table class='table table-hover js-table'> "
										.'<thead>'
											. "<tr>"
												. "<th> Respostas </th>"
											. "</tr>"
										.'</thead>'
										."<tbody id='pergunta-{$idPergunta}'>"
										.'</tbody>'
									. "</table>"
								. '</div>'
							. '</div>'
						);

						foreach($listaRespostas as $resposta)
						{
							$resposta = Text::captalize($resposta);
							if(!in_array($resposta, array('.', '..', '...', '', ' ', ',', ',,')) && !empty($resposta))
							{
								HtmlDocument::getById("pergunta-{$idPergunta}")
								->append(
									  "<tr>"
										. "<td> {$resposta} </td>"
									. "</tr>"
								);
							}
						}
					}
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

	/**
	 * Função para apresentar os gráficos por usuarios selecionados
	 *
	 * @param ArrayList $params (opcional) Recebe lista de parametros.
	 * Id da pesquisa e lista de usuarios selecionados.
	 * @author Hugo Minari
	 */
	public function graficoUsuarios(ArrayList $params = null)
	{
		$this->setup('Relatórios', 'GraficoUsuarios');
		$this->view->addResource('~/plugins/jquery-datatable/css/jquery.dataTables.css');
		$this->view->addResource('~/plugins/datatables-responsive/css/datatables.responsive.css');
		$this->view->addResource('~/plugins/jquery-datatable/jquery.dataTables.min.js');
		$this->view->addResource('~/plugins/jquery-datatable/extra/js/TableTools.min.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/datatables.responsive.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/lodash.min.js');
		$this->view->addResource('https://www.gstatic.com/charts/loader.js');

		$this->view->addData('desenharGraficos', true);
		$this->view->addData('grafico', 'usuario');

		if(ArrayList::isValid($params))
		{
			try
			{
				$pesquisaId		= $params['pesquisa'];
				$usuarios		= json_decode($params['usuarios']);
				$dados			= $this->informacoesPesquisa($pesquisaId);

				//Monta o JSON para criar o gráfico
				$chartData = array(
					array('Usuarios', 'Aplicações', array('role' => 'style') )
				);

				foreach($usuarios as $user)
				{
					//Resgata a quantidade de pesquisas que o usuario aplicou
					$aplicacoes = ColetaPesquisaQuery::create()
						->filterByUsuarioId($user)
						->filterByPesquisaId($pesquisaId)
						->count();

					$nome = UsuarioQuery::create()->findPk($user);

					$cor = $this->randomColor();

					//Monta o JSON
					$chartData[] = array(
						$nome->getNome(),
						$aplicacoes,
						$cor
					);

					HtmlDocument::getById('descritiva-usuarios')
					->append(
						"<tr>"
						. "<td> <b class='font-30' style='color:{$cor}'> &#9679; </b> </td>"
						. "<td>" . $nome->getNome() . "</td>"
						. "<td>" . $aplicacoes . "</td>"
						."</tr>"
					);

				}

				//Cria a div que recebe os dados e apresenta o gráfico
				HtmlDocument::getById('graphics-content')
				->append("<div data-chart='" . json_encode($chartData) ."'> </div>");

				$this->callView();
			}
			catch(Error $error)
			{
				Report::sendError($error);
				$this->error($error);
			}
		}

	}

	/**
	 * Função para apresentar os gráficos por aplicação da pesquisa selecionada
	 *
	 * @param ArrayList $params (opcional) Recebe lista de parametros com id da
	 * pesquisa
	 * @author Hugo Minari
	 */
	public function graficoAplicacao(ArrayList $params = null)
	{
		$this->setup('Relatórios', 'GraficoAplicacao');

		$head = HtmlDocument::getByTag('head')->getFirst();
		$head->append('<script src="https://www.gstatic.com/charts/loader.js"></script>');
		$head->append('<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMU1G4ySJeIPwpl_OsWRA_JlRenti9qZE"></script>');

		$this->view->addData('desenharGraficos', true);
		$this->view->addData('grafico', 'aplicacao');

		if(ArrayList::isValid($params))
		{
			try
			{
				$pesquisaId	= $params['pesquisa'];
				$dados = $this->informacoesPesquisa($pesquisaId);
				$centerLat = $dados['latitude'];
				$centerLng = $dados['longitude'];

				//Monta o JSON para criar o gráfico
				$chartData = array(
					array('Lat', 'Long', 'Idade', 'Marcador')
				);

				//Pega as coletas para desenhar o grafico
				$coletaObj = ColetaPesquisaQuery::create()
					->filterByPesquisaId($pesquisaId)
					->find();

				//ID da pergunta que contem a idade do entrevistado
				$perguntaIdade = PerguntaQuery::create('pi')
					->filterByPesquisaId($pesquisaId)
					->where('pi.Texto = ?', 'Idade')
					->findOne();

				//ID da pergunta que contem o sexo do entrevistado
				$perguntaSexo = PerguntaQuery::create('ps')
					->filterByPesquisaId($pesquisaId)
					->where('ps.Texto = ?', 'Sexo')
					->findOne();

				foreach($coletaObj as $coleta)
				{
					$informacoesEntrevistado = RespostaQuery::create()
						->filterByColetaPesquisaId($coleta->getId())
						->findOne();

					$idadeEntrevistado = 'Idade: N/I';
					$sexoEntrevistado = 'Sexo: N/I';

					if(!empty($perguntaIdade))
					{
						$idadeColeta = RespostaQuery::create()
							->filterByColetaPesquisaId($coleta->getId())
							->filterByPerguntaId($perguntaIdade->getId())
							->findOne();

						if(!empty($idadeColeta))
							$idadeEntrevistado = $idadeColeta->getTexto() . ' Anos';
					}

					if(!empty($perguntaSexo))
					{
						$sexoColeta = RespostaQuery::create()
							->filterByColetaPesquisaId($coleta->getId())
							->filterByPerguntaId($perguntaSexo->getId())
							->findOne();

						if(!empty($sexoColeta))
							$sexoEntrevistado = $sexoColeta->getTexto();
					}

					if($coleta->getLatitude() !== null)
					{
						$chartData[] = array(
							(float)$coleta->getLatitude(),
							(float)$coleta->getLongitude(),
							$sexoEntrevistado . '<br/>' . $idadeEntrevistado,
							$sexoEntrevistado
						);
					}
				}

				if(empty($informacoesEntrevistado))
				{
					//Cria a div que recebe os dados e apresenta o gráfico
					HtmlDocument::getById('graphics-content')
					->append("<h1> Nenhuma coleta foi realizada para gerar o gráfico. </h1>");
				}
				else
				{
					//Cria a div que recebe os dados e apresenta o gráfico
					HtmlDocument::getById('graphics-content')
					->append("<div id='js-maps' data-chart='" . json_encode($chartData) ."' data-lat='{$centerLat}' data-lng='{$centerLng}'> </div>");
				}

				$this->callView();

			}
			catch(Exception $error)
			{
				Report::sendError($error);
				$this->error($error);
			}
		}
		else
		{
			$this->error('Parâmetro inválido');
		}
	}

	/**
	 * Função que prepara uma planilha com os resultados da pesquisa e todas
	 * as aplicações realizadas.
	 *
	 * @param ArrayList $params (opcional) Recebe lista de parametro com o id
	 * da pesquisa.
	 * @author Hugo Minari
	 */
	public function graficoDescritivo(ArrayList $params = null)
	{
		$this->setup('Relatórios', 'GraficoDescritivo');

		if(ArrayList::isValid($params))
		{
			$pesquisaId	= $params['pesquisa'];
			$this->informacoesPesquisa($pesquisaId);

			//Define algumas configurações do arquivo a ser gerado
			$pathDir	= $this->getReportsDir();
			$fileName	= "Relatorio-Pesquisa-{$pesquisaId}.xlsx";
			$onesheet	= new Writer();
			$onesheet->enableCellAutosizing();
			$onesheet->setFreezePaneCellId('A2');

			//Cria os estilos
			$headerStyle = new \OneSheet\Style\Style();
			$headerStyle
				->setFontName('Segoe UI')
				->setFontSize(13)
				->setFontBold()
				->setFontColor('F79236')
				->setFillColor('1976D2')
				->setBorderBottom(OneSheet\Style\BorderStyle::DOUBLE, '000000')
			;

			$dataStyle2 = new \OneSheet\Style\Style();
			$dataStyle2
				->setFontName('Arial')
				->setFillColor('F7F7F7')
			;

			$columns = PerguntaQuery::create()
				->filterByPesquisaId($pesquisaId)
				->orderById()
				->find();

			//Popula o header
			foreach($columns as $column)
				$coluna[] = $column->getTexto();

			//Adiciona as colunas de data, hora-inicio, hora-fim, duração no header
			array_push($coluna, "Nº Coleta", "Data", "Hora Inicio", "Hora Fim", "Duração");

			//Escreve o header na planilha
			$onesheet->addRow($coluna, $headerStyle);

			//Popula as linhas
			$linhas = ColetaPesquisaQuery::create()
				->filterByPesquisaId($pesquisaId)
				->find();

			foreach($linhas as $linha)
			{
				$respostas = RespostaQuery::create()
					->filterByColetaPesquisaId($linha->getId())
					->orderByPerguntaId()
					->find();

				//Pega a diferença em segundos entre o inicio e fim.
				$coleta		= $linha->getNumeroColeta();
				$date		= $linha->getTempoInicio('d/m/Y');
				$timeStart	= $linha->getTempoInicio('H:i:s');
				$timeEnd	= $linha->getTempoFim('H:i:s');
				$time		= Date::diff($timeStart, $timeEnd);
				$seconds	= $time->getSeconds();

				//Define hora, minuto e segundo de acordo com os segundos.
				$getHours = floor($seconds / 3600);
				$getMins = floor(($seconds - ($getHours*3600)) / 60);
				$getSecs = floor($seconds % 60);

				//Trata os valores para o formato brasileiro de horas.
				$getHours = ($getHours < 10) ? '0'. $getHours : $getHours;
				$getMins = ($getMins < 10) ? '0'. $getMins : $getMins;
				$getSecs = ($getSecs < 10) ? '0'. $getSecs : $getSecs;
				$duration = $getHours.':'.$getMins.':'.$getSecs;

				//Cria a linha
				$rows = array();

				//Popula a linha com as respostas
				foreach($respostas as $resposta)
					$rows[] = $resposta->getTexto();

				//Acidiona os campos de data, hora-inicio, hora-fim, duração
				array_push($rows, $coleta, $date, $timeStart, $timeEnd, $duration);

				//Escreve na planilha
				$onesheet->addRow($rows);
			}

			//Salva o arquivo
			$onesheet->writeToFile($pathDir . $fileName);

			if(File::exists($pathDir . $fileName))
			{
				//Pega algumas informações do arquivo
				$file			= File::open($pathDir . $fileName);
				$urlDownload	= Enviroment::resolveUrl("~/relatorio/exportar/xlsx/{$file->getPath()->getName(false)}");
				$fileSize		= $file->getSize();
				$file->close();

				//Define o botao de download
				$download	= "<a href='{$urlDownload}' class='btn btn-success btn-cons-md pull-right'>"
								. "<i class='fa fa-download m-r-5'></i> Baixar"
							. "</a>"
							. "<span class='pull-left m-l-10 pull-left text-info'>"
								. "Tamanho do arquivo: {$fileSize} <br />"
								. "Formato do arquivo: Excel (xlsx)"
							. "</span>"
							;

				HtmlDocument::getById('graphics-content')->html($download);
			}

			$this->callView();
		}
	}

	/**
	 * Função para apresentar os gráficos por perfil amostral, Para cada resposta
	 * de multipla ou unica escolha é gerado um gráfico distinto para homens
	 * e mulheres de acordo com o público alvo.
	 *
	 * @param ArrayList $params (opcional) Recebe lista de parametro com o id
	 * da pesquisa.
	 * @author Hugo Minari
	 */
	public function graficoPerfilAmostral(ArrayList $params = null)
	{
		$this->setup('Relatórios', 'GraficoPerfilAmostral');
		$this->view->addResource('https://www.gstatic.com/charts/loader.js');
		$this->view->addResource('~/plugins/jquery-datatable/css/jquery.dataTables.css');
		$this->view->addResource('~/plugins/datatables-responsive/css/datatables.responsive.css');
		$this->view->addResource('~/plugins/jquery-datatable/jquery.dataTables.min.js');
		$this->view->addResource('~/plugins/jquery-datatable/extra/js/TableTools.min.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/datatables.responsive.js');
		$this->view->addResource('~/plugins/datatables-responsive/js/lodash.min.js');
		$this->view->addData('desenharGraficos', true);
		$this->view->addData('grafico', 'perfil-amostral');

		Enviroment::disableTimeout();

		try
		{
			if(ArrayList::isValid($params))
			{
				//Define as variaveis com os dados da pesquisa
				$pesquisaId					= $params['pesquisa'];
				$dados						= $this->informacoesPesquisa($pesquisaId);
				$pesquisa					= $dados['pesquisa'];
				$perguntas					= $pesquisa->getPerguntas();

				//ID da pergunta que contem a idade do entrevistado
				$perguntaIdade = PerguntaQuery::create('pi')
					->filterByPesquisaId($pesquisaId)
					->where('pi.Texto = ?', 'Idade')
					->findOne();
				$idPerguntaIdade = $perguntaIdade->getId();

				//Pega os ids das coletas respondidas por mulheres
				$idsColetaMulheres = RespostaQuery::create('rm')
					->where('rm.Texto IN ?', array("Mulher", "Feminino"))
					->groupBy('ColetaPesquisaId')
					->select('ColetaPesquisaId')
					->find()
					->toArray();

				//Pega os ids das coletas respondidas por homens
				$idsColetaHomens = RespostaQuery::create('rh')
					->where('rh.Texto IN ?', array("Homem", "Masculino"))
					->groupBy('ColetaPesquisaId')
					->select('ColetaPesquisaId')
					->find()
					->toArray();

				//Percorrer as perguntas para gerar as divs
				foreach($perguntas as $p => $pergunta)
				{
					//Define as variáveis com os dados da pergunta
					$perguntaId					= $pergunta->getId();
					$tipoResposta				= $pergunta->getTipoResposta();
					$tituloPergunta				= $p+1 . ' - ' . $pergunta->getTexto();
					$respostas					= $pergunta->getRespostas();
					$alternativas				= $pergunta->getAlternativas(Criteria::DESC);
					$respostasListaMulheres		= array();
					$respostasListaHomens		= array();

					//Pega as respostas dos sexos para apresentar no dataTables.
					foreach($respostas as $resposta)
					{
						$coletaId = $resposta->getColetaPesquisaId();

						if(in_array($coletaId, $idsColetaMulheres))
							$respostasListaMulheres[] = $resposta->getTexto();

						elseif(in_array($coletaId, $idsColetaHomens))
							$respostasListaHomens[] = $resposta->getTexto();
					}

					//Se o tipo de resposta for única ou múltipla escolha, monta o chart.
					if(in_array($tipoResposta, array(3, 4, 5, 6)))
					{
						//Define alguns arrays.
						$chartDataMulheres		= array();
						$chartDataHomens		= array();
						$idsAlternativas		= array();

						$quantidadeRespostasMulheres	= count($respostasListaMulheres);
						$quantidadeRespostasHomens		= count($respostasListaHomens);

						//Define o header do gráfico
						$chartDataHeader = array(
							'Público Alvo'
						);

						foreach($alternativas as $alternativa)
						{
							$chartDataHeader[] = $alternativa->getTexto();
							$idsAlternativas[] = $alternativa->getId();
						}

						//Seta o header nos charts.
						$chartDataMulheres[]	= $chartDataHeader;
						$chartDataHomens[]		= $chartDataHeader;

						$publicoAlvo = PublicoAlvoQuery::create()
							->filterByPesquisaId($pesquisaId)
							->find();

						foreach($publicoAlvo as $pa => $alvo)
						{
							$idadeMin = $alvo->getIdadeInicial();
							$idadeMax = $alvo->getIdadeFinal();

							//Resgata todos os ids de coleta que mulheres resposderam.
							$compativelMulheres = RespostaQuery::create('rh')
								->filterByColetaPesquisaId($idsColetaMulheres)
								->where('rh.PerguntaId = ?', $idPerguntaIdade)
								->where('rh.Texto >= ?', $idadeMin)
								->where('rh.Texto <= ?', $idadeMax)
								->select('ColetaPesquisaId')
								->find()
								->toArray();

							//Resgata todos as as respostas das mulheres.
							$respostasAlvoMulheres = RespostaQuery::create()
								->filterByColetaPesquisaId($compativelMulheres)
								->filterByPerguntaId($perguntaId)
								->filterByAlternativaId($idsAlternativas)
								->orderByTexto(Criteria::DESC)
								->find();

							//Resgata todos os ids de coleta que homens resposderam.
							$compativelHomens = RespostaQuery::create('rh')
								->filterByColetaPesquisaId($idsColetaHomens)
								->where('rh.PerguntaId = ?', $idPerguntaIdade)
								->where('rh.Texto >= ?', $idadeMin)
								->where('rh.Texto <= ?', $idadeMax)
								->select('ColetaPesquisaId')
								->find()
								->toArray();

							//Resgata todos as as respostas dos homens.
							$respostasAlvoHomens = RespostaQuery::create()
								->filterByColetaPesquisaId($compativelHomens)
								->filterByPerguntaId($perguntaId)
								->filterByAlternativaId($idsAlternativas)
								->orderByTexto(Criteria::DESC)
								->find();

							//Define alguns arrays.
							$charRespostaHomens = array();
							$counterHomens		= array();
							$charRespostaMulher = array();
							$counterMulheres	= array();
							$heightBar			= 0;

							unset($chartDataHeader[0]);

							//Monta o array de respostas do sexo masculino.
							foreach($respostasAlvoHomens as $respostaHomem)
								$charRespostaHomens[] = $respostaHomem->getAlternativaId();

							//Monta o array de respostas do sexo feminino.
							foreach($respostasAlvoMulheres as $respostaMulher)
								$charRespostaMulher[] = $respostaMulher->getAlternativaId();

							foreach($idsAlternativas as $header)
							{
								$counterHomens[$pa][] = $this->arrayCount($charRespostaHomens, $header);
								$counterMulheres[$pa][] = $this->arrayCount($charRespostaMulher, $header);
								++$heightBar;
							}

							$heightBar	= $heightBar * $publicoAlvo->count() * 22;
							$idadeAlvos	= $idadeMin . "-" . $idadeMax . "\nAnos";

							array_unshift($counterHomens[$pa], $idadeAlvos);
							array_unshift($counterMulheres[$pa], $idadeAlvos);

							$chartDataHomens[]				= $counterHomens[$pa];
							$chartDataMulheres[]			= $counterMulheres[$pa];
						}


						//Popula as grids com os dados para exibir o grafico
						HtmlDocument::getById('graphics-content-mulheres')
						->append(
							'<div class="grid simple">'
								. '<div class="grid-title no-border">'
									. "<h4> {$tituloPergunta} </h4>"
									. "<hr/>"
									. "<p class='text-muted'> Resultado baseado em {$quantidadeRespostasMulheres} respostas a esta questão. </p>"
								. "</div>"
								. '<div class="grid-body no-border">'
									. "<div class='text-left' data-chart='" . json_encode($chartDataMulheres) . "' data-height='" . $heightBar . "'></div>"
								. '</div>'
							. '</div>'
						);

						//Popula as grids com os dados para exibir o gráfico
						HtmlDocument::getById('graphics-content-homens')
						->append(
							'<div class="grid simple">'
								. '<div class="grid-title no-border">'
									. "<h4> {$tituloPergunta} </h4>"
									. "<hr/>"
									. "<p class='text-muted'> Resultado baseado em {$quantidadeRespostasHomens} respostas a esta questão. </p>"
								. "</div>"
								. '<div class="grid-body no-border">'
									. "<div class='text-left' data-chart='" . json_encode($chartDataHomens) . "' data-height='" . $heightBar . "'></div>"
								. '</div>'
							. '</div>'
						);
					}
					//Se o tipo de resposta for numero
					elseif($tipoResposta == 2)
					{
						$compativelMulheres = RespostaQuery::create('rh')
							->filterByColetaPesquisaId($idsColetaMulheres)
							->where('rh.PerguntaId = ?', $idPerguntaIdade)
							->select('ColetaPesquisaId')
							->find()
							->toArray();

						$respostasAlvoMulheres = RespostaQuery::create()
							->filterByColetaPesquisaId($compativelMulheres)
							->filterByPerguntaId($perguntaId)
							->orderByTexto(Criteria::DESC)
							->find();

						$compativelHomens = RespostaQuery::create('rh')
							->filterByColetaPesquisaId($idsColetaHomens)
							->where('rh.PerguntaId = ?', $idPerguntaIdade)
							->select('ColetaPesquisaId')
							->find()
							->toArray();

						$respostasAlvoHomens = RespostaQuery::create()
							->filterByColetaPesquisaId($compativelHomens)
							->filterByPerguntaId($perguntaId)
							->orderByTexto(Criteria::DESC)
							->find();

						//Cria o header do gráfico.
						$chartHeader = array(
							'Respostas', 'Total'
						);

						//Monta a lista de respostas
						$listaRespostasHomens	= array();
						$listaRespostasMulheres = array();
						$chartDataHomem			= array();
						$chartDataMulher		= array();

						//Variavel que guardará height dos gráficos.
						$heightBarMulher = 0;
						$heightBarHomem	= 0;

						foreach($respostasAlvoHomens as $respostaHomem)
							$listaRespostasHomens[] = $respostaHomem->getTexto();

						foreach($respostasAlvoMulheres as $respostaMulher)
							$listaRespostasMulheres[] = $respostaMulher->getTexto();

						$totalRespostasMulher	= count($listaRespostasMulheres);
						$totalRespostasHomem	= count($listaRespostasHomens);
						$repeatsHomens			= array_count_values($listaRespostasHomens);
						$repeatsMulheres		= array_count_values($listaRespostasMulheres);

						ksort($repeatsHomens);
						ksort($repeatsMulheres);

						//Monta o corpo do gráfico de homens.
						foreach($repeatsHomens as $hm => $repeatHomem)
						{
							$chartDataHomem[] = array(
								(string)$hm,
								$repeatHomem
							);
							++$heightBarHomem;
						}

						//Monta o corpo do gráfico de mulheres.
						foreach($repeatsMulheres as $ml => $repeatMulher)
						{
							$chartDataMulher[] = array(
								(string)$ml,
								$repeatMulher
							);
							++$heightBarMulher;
						}

						if($heightBarMulher > $heightBarHomem)
							$heightBar * 22 + 42;
						elseif($heightBarMulher < $heightBarHomem)
							$heightBar = $heightBarHomem * 22 + 42;
						else
							$heightBar = $heightBarMulher * 22 + 42;

						//Adiciona o header no Json
						array_unshift($chartDataHomem, $chartHeader);
						array_unshift($chartDataMulher, $chartHeader);

						//Popula as grids com os dados para exibir o grafico
						HtmlDocument::getById('graphics-content-mulheres')
						->append(
							'<div class="grid simple">'
								. '<div class="grid-title no-border">'
									. "<h4> {$tituloPergunta} </h4>"
									. "<hr/>"
									. "<p class='text-muted'> Resultado baseado em {$totalRespostasMulher} respostas a esta questão. </p>"
								. "</div>"
								. '<div class="grid-body no-border">'
									. "<div class='text-left' data-chart='" . json_encode($chartDataMulher) . "' data-height='" . $heightBar . "'></div>"
								. '</div>'
							. '</div>'
						);

						//Popula as grids com os dados para exibir o gráfico
						HtmlDocument::getById('graphics-content-homens')
						->append(
							'<div class="grid simple">'
								. '<div class="grid-title no-border">'
									. "<h4> {$tituloPergunta} </h4>"
									. "<hr/>"
									. "<p class='text-muted'> Resultado baseado em {$totalRespostasHomem} respostas a esta questão. </p>"
								. "</div>"
								. '<div class="grid-body no-border">'
									. "<div class='text-left' data-chart='" . json_encode($chartDataHomem) . "' data-height='" . $heightBar . "'></div>"
								. '</div>'
							. '</div>'
						);
					}
					else
					{
						$removes = array('.', '..', '...', '', ' ', ',', ',,', '..,');

						//Se tipo de resposta for texto ou numeros monta o datatables
						HtmlDocument::getById('graphics-content-mulheres')
						->append(
							'<div class="grid simple">'
								. '<div class="grid-title no-border">'
									. "<h4> {$tituloPergunta} </h4><hr/>"
								. "</div>"
								. '<div class="grid-body no-border">'
									. "<table class='table table-hover js-table'> "
										.'<thead>'
											. "<tr>"
												. "<th> Respostas </th>"
											. "</tr>"
										.'</thead>'
										."<tbody id='pergunta-m-{$perguntaId}'>"
										.'</tbody>'
									. "</table>"
								. '</div>'
							. '</div>'
						);

						//Se tipo de resposta for texto ou numeros monta o datatables
						HtmlDocument::getById('graphics-content-homens')
						->append(
							'<div class="grid simple">'
								. '<div class="grid-title no-border">'
									. "<h4> {$tituloPergunta} </h4><hr/>"
								. "</div>"
								. '<div class="grid-body no-border">'
									. "<table class='table table-hover js-table'> "
										.'<thead>'
											. "<tr>"
												. "<th> Respostas </th>"
											. "</tr>"
										.'</thead>'
										."<tbody id='pergunta-h-{$perguntaId}'>"
										.'</tbody>'
									. "</table>"
								. '</div>'
							. '</div>'
						);

						//Popula o dataTables com as respostas
						foreach($respostasListaMulheres as $respostaMulher)
						{
							$respostaMulher = Text::captalize($respostaMulher);
							if(!in_array($respostaMulher, $removes) && !empty($respostaMulher))
							{
								HtmlDocument::getById("pergunta-m-{$perguntaId}")
									->append(
										  "<tr>"
											. "<td> {$respostaMulher} </td>"
										. "</tr>"
									);
							}
						}

						//Popula o dataTables com as respostas
						foreach($respostasListaHomens as $respostaHomem)
						{
							if(!in_array($respostaHomem, $removes) && !empty($respostaHomem))
							{
								$respostaHomem = Text::captalize($respostaHomem);
								HtmlDocument::getById("pergunta-h-{$perguntaId}")
									->append(
										  "<tr>"
											. "<td> {$respostaHomem} </td>"
										. "</tr>"
									);
							}
						}
					}
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
			$this->downloadFile("{$params[1]}.{$params[0]}");
		else
			$this->pageNotFound();
	}

	/**
	 * Função responsável pelas configurações das views.
	 *
	 * @param string $page Página que será setada como Ativa.
	 * @param string $view View que será chamada.
	 * @author Hugo Minari
	 */
	private function setup($page, $view)
	{
		$this->view->setHtmlPage("Relatorio.{$view}");
		$this->view->addResource('~/plugins/jquery-validation/js/jquery.validate.min.js');
		$this->view->addResource('~/plugins/jquery-validation/js/messages_pt-BR.js');
		$this->view->addResource('~/plugins/jquery-inputmask/jquery.inputmask.min.js');
		$this->view->addResource('~/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js');
		$this->view->addResource('~/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.pt-BR.js');
		$this->view->addResource('~/plugins/bootstrap-datepicker/css/datepicker.css');
		$this->view->addResource('~/js/relatorio.js');
		$this->view->initializePage();
		$this->setActiveMenuItem($page);
	}

	/**
	 * Função que gera toda informação da pesquisa para apresentar nas views
	 * de gráfico.
	 *
	 * @param int $pesquisaId Recebe o id da pesquisa.
	 * @return array Retorna um array com latitude e longitude e o objeto
	 * da pesquisa.
	 */
	private function informacoesPesquisa($pesquisaId = null)
	{
		$pesquisa		= PesquisaQuery::create()->findPk($pesquisaId);
		$titulo			= $pesquisa->getTitulo();

		//Quantidade de perguntas
		$quantidadePerguntas = $pesquisa->getPerguntas()->count();

		//Quantidade de pesquisadores
		$pesquisadores = PesquisaUsuarioQuery::create()
			->filterByPesquisaId($pesquisaId)
			->count();
		$pesquisadoresFrase = ($pesquisadores > 1) ? ' Pesquisadores.' : ' Pesquisador.';
		$frasePesquisadores = $pesquisadores . $pesquisadoresFrase;

		//Coordenadas da pesquisa
		$coordenadas = 'Latitude: ' . $pesquisa->getLatitude() . ' / Longitude: ' . $pesquisa->getLongitude();
		$centerLat	 = (float)$pesquisa->getLatitude();
		$centerLng	 = (float)$pesquisa->getLongitude();

		//Local da pesquisa
		switch($pesquisa->getAbrangencia())
		{
			case 'e':
				$uf = UfQuery::create()->findPk($pesquisa->getUfId());
				$localPesquisa = $uf->getNome() . ' - ' . $uf->getSigla();
				break;
			case 'm':
				$cidade = CidadeQuery::create()->findPk($pesquisa->getCidadeId());
				$uf = UfQuery::create()->findPk($pesquisa->getUfId());
				$localPesquisa = $cidade->getNome() . ' - ' . $uf->getSigla();
				break;
			case 'n':
				$localPesquisa = 'Nacional';
				break;
		}

		//Quantidade de pesquisas aplicadas
		$totalHomens	= 0;
		$totalMulheres	= 0;
		$totalColetas	= 0;

		$publicosAlvo = PublicoAlvoQuery::create('pa')
			->filterByPesquisa($pesquisa)
			->select('Id')
			->find()
			->toArray();

		$coletas = MetaPublicoAlvoQuery::create()
			->filterByPublicoAlvoId($publicosAlvo, Criteria::IN)
			->withColumn('sum(homens)', 'totalHomens')
			->withColumn('sum(mulheres)', 'totalMulheres')
			->find();

		if(!$coletas->isEmpty())
		{
			foreach($coletas as $coleta)
			{
				$totalHomens = $coleta->getTotalHomens();
				$totalMulheres = $coleta->getTotalMulheres();
				$totalColetas = $totalHomens + $totalMulheres;
			}
		}

		$complementoColetas = ($totalColetas > 1) ? ' Pessoas entrevistadas.' : ' Pessoa entrevistada.';
		$fraseColetas = $totalColetas . $complementoColetas;

		//Escreve na view as informações
		HtmlDocument::getById('titulo-pesquisa')->append($titulo);
		HtmlDocument::getById('local-pesquisa')->append($localPesquisa);
		HtmlDocument::getById('coordenadas-pesquisa')->append($coordenadas);
		HtmlDocument::getById('inicio-pesquisa')->append('De ' . $pesquisa->getDataInicio('d/m/Y') . ' à ' . $pesquisa->getDataFim('d/m/Y'));
		HtmlDocument::getById('quantidade-pesquisa')->append($fraseColetas);
		HtmlDocument::getById('sexo-masculino')->append($totalHomens);
		HtmlDocument::getById('sexo-feminino')->append($totalMulheres);
		HtmlDocument::getById('quantidade-pesquisadores')->append($frasePesquisadores);
		HtmlDocument::getById('quantidade-perguntas')->append($quantidadePerguntas . ' perguntas cadastradas.');

		return array(
			'latitude' => $centerLat,
			'longitude' => $centerLng,
			'pesquisa' => $pesquisa
		);
	}

	/**
	 * Função que faz a filtragem das pesquisas que já possuam respostas.
	 *
	 * @return array com as pesquisas.
	 * @author Hugo Minari
	 */
	private function filtraPesquisasRespondidas()
	{
		$pesquisas = PesquisaQuery::create('p')->find();
		$pesquisasComResultado = array();

		foreach($pesquisas as $pesquisa)
		{
			$coletas = ColetaPesquisaQuery::create()
				->filterByPesquisaId($pesquisa->getId())
				->find();

			if($coletas)
			{
				foreach($coletas as $coleta)
					$pesquisasComResultado[] = $coleta->getPesquisaId();
			}
		}

		$pesquisasRetorna = array_unique($pesquisasComResultado);
		return ($pesquisasRetorna);
	}

	/**
	 * Função que gera uma cor aleatória para utilizar nos gráficos.
	 *
	 * @return string Com a cor gerada.
	 * @author Hugo Minari
	 */
	private function randomColor()
	{
		$chars		 = 'ABCDEF0123456789';
		$characters	 = str_shuffle($chars);
		$hexadecimal = '#';

		for ($i = 1; $i <= 6; $i++)
		{
		   $position     = rand(0, strlen($characters) - 1);
		   $hexadecimal .= $characters[$position];
		}

		return $hexadecimal;
	}

	/**
	 * Função que retorna quantas vezes uma variavel está presente dentro de um
	 * array.
	 * @param array $array Array a ser pesquisado.
	 * @param string $value Valor a ser pesquisado.
	 * @return int Número de vezes que a variavel se repete no array.
	 */
	private function arrayCount($array, $value)
	{
		$counter = 0;

		foreach($array as $thisvalue)
		{
			if($thisvalue === $value)
				++$counter;
		}

		return $counter;
    }
}