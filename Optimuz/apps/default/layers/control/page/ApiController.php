<?php
/**
 * Este arquivo contem a classe Api que faz parte do sistema GPES.
 */
use \Defuse\Crypto\Crypto;
use \Defuse\Crypto\Exception;
use \PHPVideoToolkit\Media;
use \PHPVideoToolkit\Audio;
use \PHPVideoToolkit\AudioFormat_Mp3;
use \PHPVideoToolkit\AudioFormat_Wav;

/**
 * Controle responsável pela implementação da API de sincronização.
 * @package control
 * @subpackage page
 * @author Diego Andrade
 */
class ApiController extends DefaultPageController
{
	/**
	 * API de sincronização das informações do sistema.
	 *
	 * O aplicativo Android atua como cliente acessando este método e passando
	 * informações.
	 *
	 * Antes de executar a ação solicitada, o usuário é autenticado e o pedido
	 * validado. Qualquer erro de validação é reportado de volta ao cliente.
	 * Faixa de erro 1000 - 1999.
	 * @author Diego Andrade
	 */
	public function sincronizar()
	{
		$answer = (object)array('sucesso' => false, 'dados' => null, 'erro' => null);
		$responseStatus = 200;
		$data = null;
		$user = null;
		$encryptedAnswer = null;
		$syncSuccess = null;
		$syncAction = null;
		$syncError = (object)array('mensagem' => null, 'codigo' => null, 'detalhes' => null);
		$key = base64_decode(LocalConfiguration::get('api.privatekey'));
		$secret = LocalConfiguration::get('api.secretkey');

		if($this->request->hasPostParam('pedido'))
		{
			try
			{
				$ciphertext = base64_decode(filter_input(INPUT_POST, 'pedido'));
				$data = json_decode(Crypto::decrypt($ciphertext, $key));
				$syncAction = isset($data->acao) && !empty($data->acao) ? $data->acao : null;

				if(!empty($syncAction))
				{
					if(isset($data->segredo) && !empty($data->segredo) && $data->segredo === $secret)
					{
						$continue = false;

						if (in_array($syncAction, array('login', 'recuperar_senha', 'versao_apk')))
						{
							$continue = true;
						}
						else
						{
							if(!empty($data->token))
							{
								$user = UsuarioQuery::getAtivos()
									->findOneByToken($data->token);

								if ($user)
									$continue = true;
							}
							else
							{
								$syncError->mensagem = 'Token do usuário não foi encontrado';
								$syncError->codigo = -1000;
							}
						}

						if($continue)
						{
							try
							{
								switch($syncAction)
								{
									case 'login':
										$this->login($data->dados, $answer->dados, $syncError);
										break;
									case 'recuperar_senha':
										$this->recuperarSenha($data->dados, $answer->dados, $syncError);
										break;
									case 'listar_pesquisas':
										$this->listarPesquisas($data->token, $answer->dados, $syncError);
										break;
									case 'submeter':
										$this->submeter($data->dados, $data->token, $answer->dados, $syncError);
										break;
									case 'submeter_audio':
										$this->submeterAudio($data->dados, $data->token, $answer->dados, $syncError);
										break;
									case 'quantidade_pesquisas_usuario':
										$this->quantidadePesquisasUsuario($data->token, $answer->dados, $syncError);
										break;
									case 'versao_apk':
										$this->versaoApk($answer->dados, $syncError);
										break;
									default:
										$syncSuccess = false;
										$responseStatus = 404;
										$syncError->mensagem = 'A ação solicitada é inválida';
										$syncError->codigo = -1001;
										$syncError->detalhes = $syncError->mensagem;
										break;
								}

								$syncSuccess = is_null($syncError->mensagem) && is_null($syncError->codigo);
							}
							catch(Error $ex)
							{
								Report::sendError($ex);
								$syncError->mensagem = 'Ocorreu um erro inesperado durante a execução da ação solicitada';
								$syncError->codigo = $ex->getCode();
								$syncError->detalhes = $ex->getMessage();
								$responseStatus = 500;
							}
						}
						else
						{
							$syncError->mensagem = 'Erro inesperado na verificação do usuário';
							$syncError->codigo = -1002;
						}
					}
					else
					{
						$syncError->mensagem = 'Não foi possível localizar a identificação do pedido';
						$syncError->codigo = -1003;
					}
				}
				else
				{
					$syncError->mensagem = 'Nenhuma ação foi solicitada';
					$syncError->codigo = -1004;
				}
			}
			catch(Exception $ex)
			{
				Report::sendError($ex);
				$syncError->mensagem = 'Falha na requisição';
				$syncError->codigo = $ex->getCode();
				$syncError->detalhes = $ex->getMessage();
				$responseStatus = 500;
			}
		}
		else
		{
			$syncError->mensagem = 'O pedido é inválido';
			$syncError->codigo = -1005;
			$syncError->detalhes = $syncError->mensagem;
		}

		if($syncSuccess)
			$answer->sucesso = true;
		else
			$answer->erro = $syncError;

		try
		{
			$encryptedAnswer = Crypto::encrypt(json_encode($answer), $key);
			$encryptedAnswer = base64_encode($encryptedAnswer);
		}
		catch(Exception\CryptoTestFailedException $ex)
		{
			Report::sendError($ex);
			$encryptedAnswer = '';
			$responseStatus = 500;
		}
		catch(Exception\CannotPerformOperationException $ex)
		{
			Report::sendError($ex);
			$encryptedAnswer = '';
			$responseStatus = 500;
		}

		$this->response->setStatusCode($responseStatus);
		$this->response->setContentType('text/plain');
		$this->response->send($encryptedAnswer);
	}

	/**
	 * Função responsável pelo controle de login.
	 * Faixa de erro 2000 - 2999.
	 *
	 * @param stdClass $dados Dados do usuário.
	 * @param stdClass $sucesso Retorna objetos solicitados.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Hugo Minari
	 */
	protected function login($dados, &$sucesso, &$erro)
	{
		if(isset($dados->email) && isset($dados->senha))
		{
			$usuario = UsuarioQuery::getAtivos()
					->filterByAtivo(true)
					->findOneByEmail($dados->email);

			if($usuario)
			{
				if($usuario->getSenha() == Utils::encrypt($dados->senha))
				{
					if(!$usuario->getToken())
						$usuario->gerarToken();

					$sucesso = new stdClass;
					$sucesso->token = $usuario->getToken();
					$sucesso->avatar = $usuario->getImagem('perfil', true);
					$sucesso->nome = $usuario->getNome();

					Auditoria::adicionar('Usuário fez login no app', Auditoria::LEVEL_INFO, $usuario, $usuario->getNome(), Auditoria::TIPO_USUARIO);

				}
				else
				{
					$erro->mensagem = 'Usuário ou senha inválido';
					$erro->codigo = -2000;
				}
			}
			else
			{
				$erro->mensagem = 'Usuário ou senha inválido';
				$erro->codigo = -2001;
			}
		}
		else
		{
			$erro->mensagem = 'Usuário ou senha não foi informado';
			$erro->codigo = -2002;
		}
	}

	/**
	 * Função responsável por recuperar a senha do usuário.
	 * Faixa de erro 3000 - 3999.
	 *
	 * @param stdClass $dados Email do usuário.
	 * @param stdClass $sucesso Retorna objetos solicitados.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Hugo Minari
	 */
	protected function recuperarSenha($dados, &$sucesso, &$erro)
	{
		if(isset($dados->email))
		{
			$usuario = UsuarioQuery::getAtivos()
					->findOneByEmail($dados->email);

			if($usuario)
			{
				$usuario->gerarTokenSenha();

				$assunto = 'Recuperação de senha';
				$url = Enviroment::resolveUrl("~/usuario/recuperar-senha/{$usuario->getTokenSenha()}");
				$mensagem = "<p>Recebemos uma solicitação para recuperação de senha, se foi
					você, clique no link abaixo, caso contrário desconsidere este email.</p> <br/>
					<a href='{$url}' title='Recuperação de senha' target='_blank'>
						Link para recuperação de senha
					</a>";

				if(Utils::sendUserEmail($usuario, $assunto, $mensagem))
				{
					$sucesso = new stdClass();
					$sucesso->mensagem = 'Processo de recuperação de senha iniciado. Verifique seu email.';
					Auditoria::adicionar('Recuperação de senha app', Auditoria::LEVEL_INFO, $usuario, null, Auditoria::TIPO_USUARIO, $usuario->getId());

				}
				else
				{
					$erro->mensagem = 'Falha ao enviar email de recuperação. Por favor, tente novamente!';
					$erro->codigo = -3000;
				}
			}
			else
			{
				$erro->mensagem = 'Email informado não pertence a um usuário cadastrado';
				$erro->codigo = -3001;
			}
		}
		else
		{
			$erro->mensagem = 'Não foi informado um email válido';
			$erro->codigo = -3002;
		}
	}

	/**
	 * Função responsável por enviar a listagem de pesquisas para o
	 * cliente (App).
	 * Faixa de erro 4000 - 4999.
	 *
	 * @param stdClass $token Token do usuário.
	 * @param stdClass $sucesso Retorna objetos solicitados.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Hugo Minari
	 */
	protected function listarPesquisas($token, &$sucesso, &$erro)
	{
		if(!empty($token))
		{
			//Verifica se o usuario existe e está ativo
			$usuario = UsuarioQuery::create()
				->filterByAtivo(true)
				->findOneByToken($token);

			if($usuario)
			{
				//Resgata as pesquisas que o usuario tem atribuida a ele
				$pesquisas = PesquisaQuery::create('p')
					->filterByPublicada(true)
					->filterByDataFim(array('min' => date('Y-m-d')))
					->usePesquisaUsuarioQuery()
						->filterByUsuarioId($usuario->getId())
					->endUse()
					->find();

				if(!$pesquisas->isEmpty())
				{
					//Cria ou reseta o array de pesquisa
					$searchs = array();

					foreach($pesquisas as $index => $pesquisa)
					{
						//Verifica a quantidade de coletas que o usuário fez.
						$quantidadeColetasUsuario = ColetaPesquisaQuery::create()
							->filterByUsuarioId($usuario->getId())
							->filterByPesquisa($pesquisa)
							->find()
							->count();

						//Dados da pesquisa.
						$searchs[$index] = array(
							'id_pesquisa' => $pesquisa->getId(),
							'titulo' => $pesquisa->getTitulo(),
							'descricao' => $pesquisa->getDescricao(),
							'latitude' => $pesquisa->getLatitude(),
							'longitude' => $pesquisa->getLongitude(),
							'raio' => $pesquisa->getAreaLimite(),
							'publico_alvo' => array(),
							'quantidade_pesquisas_usuario' => $quantidadeColetasUsuario,
							'categorias' => array(),
						);

						//Popula o Publico alvo ou resgata o restante
						$pesquisasRestantes = $this->pesquisasRestantes($pesquisa->getId());

						if($pesquisasRestantes == null)
						{
							$publicoAlvo = PublicoAlvoQuery::create()
								->filterByPesquisaId($pesquisa->getId())
								->find();

							foreach($publicoAlvo as $publico)
							{
								$searchs[$index]['publico_alvo'][] = array(
									'masculino' => $publico->getQuantidadeMasculino(),
									'feminino' => $publico->getQuantidadeFeminino(),
									'idade_inicial' => $publico->getIdadeInicial(),
									'idade_final' => $publico->getIdadeFinal()
								);
							}
						}
						else
						{
							$searchs[$index]['publico_alvo'] = $pesquisasRestantes;
						}

						//Popula as Categorias
						$categorias = CategoriaQuery::create()
							->orderByPosicao(Criteria::ASC)
							->usePerguntaQuery()
								->filterByPesquisaId($pesquisa->getId())
								->groupByCategoriaId()
							->endUse()
							->find();

						foreach($categorias as $c => $categoria)
						{
							$searchs[$index]['categorias'][$c] = array(
								'id_categoria' => $categoria->getId(),
								'titulo_categoria' => $categoria->getNome(),
								'perguntas' => array()
							);

							//Popula as perguntas da categoria
							$perguntas = PerguntaQuery::create()
								->filterByPesquisaId($pesquisa->getId())
								->filterByCategoriaId($categoria->getId())
								->orderById()
								->filterByPerguntaMaeId(NULL)
								->find();

							foreach($perguntas as $p => $pergunta)
							{
								//Define as variaveis da pergunta.
								$tipoResposta = $pergunta->getTipoResposta();
								$obrigatoria = $pergunta->getObrigatoria();
								$required = ($obrigatoria == 1) ? true : false;

								//Popula o array da pesquisa com os dados da pergunta.
								$searchs[$index]['categorias'][$c]['perguntas'][] = array(
									'id_pesquisa' => $pesquisa->getId(),
									'id_pergunta' => $pergunta->getId(),
									'texto' => $pergunta->getTexto(),
									'tipoResposta' => $tipoResposta,
									'obrigatoria' => $required,
									'tipo_excecao' => $pergunta->getExcecao(),
									'gatilho_execao' => $pergunta->getGatilhoExcecao(),
									'alternativas' => null,
									'perguntas' => null
								);

								//Popula as alternativas da pergunta
								$alternativas = AlternativaQuery::create()
										->filterByPerguntaId($pergunta->getId())
										->orderByPosicao()
										->find();

								//Se a pergunta for do tipo multipla ou unica escolha
								if(in_array($tipoResposta, array(3, 4)))
								{
									//Cria o array de alternativas da pergunta
									$searchs[$index]['categorias'][$c]['perguntas'][$p]['alternativas'] = array();

									//Popula as alternativas
									foreach($alternativas as $a => $alternativa)
									{
										$searchs[$index]['categorias'][$c]['perguntas'][$p]['alternativas'][] = array(
											'id_alternativa' => $alternativa->getId(),
											'texto' => $alternativa->getTexto(),
										);
									}
								}
								elseif(in_array($tipoResposta, array(5, 6)))
								{
									//Cria o array de alternativas da pergunta
									$searchs[$index]['categorias'][$c]['perguntas'][$p]['alternativas'] = array();

									//Popula as alternativas com imagem
									foreach($alternativas as $alternativa)
									{
										$searchs[$index]['categorias'][$c]['perguntas'][$p]['alternativas'][] = array(
											'id_alternativa' => $alternativa->getId(),
											'texto' => $alternativa->getTexto(),
											'imagem' => Enviroment::resolveUrl('~/resource/default/img/alternativas/p-' . $pergunta->getId() . '/' . $alternativa->getId() . '-thumb.jpg')
										);
									}
								}
								else
								{
									//Popula as alternativas do tipo texto ou numero
									foreach($alternativas as $alternativa)
										$searchs[$index]['categorias'][$c]['perguntas'][$p]['alternativas'] = $alternativa->getTexto();
								}

								/*
								 * Parte de criação das subperguntas.
								 * O codigo esta criando apenas 1 nivel
								 * de subperguntas.
								 */
								if(in_array($tipoResposta, array(4,6)))
								{
									$subPerguntas = PerguntaQuery::create()
										->filterByPerguntaMaeId($pergunta->getId())
										->find();

									if(!$subPerguntas->isEmpty())
									{
										//Cria o array de subperguntas
										$searchs[$index]['categorias'][$c]['perguntas'][$p]['perguntas'] = array();

										//Popula as subperguntas
										foreach($subPerguntas as $s => $subPergunta)
										{
											$subTipoResposta = $subPergunta->getTipoResposta();

											$searchs[$index]['categorias'][$c]['perguntas'][$p]['perguntas'][] = array(
												'id_pesquisa' => $pesquisa->getId(),
												'id_pergunta' => $subPergunta->getId(),
												'texto' => $subPergunta->getTexto(),
												'tipoResposta' => $subPergunta->getTipoResposta(),
												'obrigatoria' => $subPergunta->getObrigatoria(),
												'tipo_excecao' => $subPergunta->getExcecao(),
												'gatilho_execao' => $subPergunta->getGatilhoExcecao(),
												'alternativas' => null
											);

											//Popula as alternativas das subperguntas
											$subAlternativas = AlternativaQuery::create()
												->filterByPerguntaId($subPergunta->getId())
												->orderByPosicao()
												->find();

											if(in_array($subTipoResposta, array(3, 4)))
											{
												$searchs[$index]['categorias'][$c]['perguntas'][$p]['perguntas'][$s]['alternativas'] = array();

												foreach($subAlternativas as $sa => $subAlternativa)
												{
													$searchs[$index]['categorias'][$c]['perguntas'][$p]['perguntas'][$s]['alternativas'][$sa] = array(
														'id_alternativa' => $subAlternativa->getId(),
														'texto' => $subAlternativa->getTexto(),
													);
												}
											}
											elseif(in_array($subTipoResposta, array(5, 6)))
											{
												$searchs[$index]['categorias'][$c]['perguntas'][$p]['perguntas'][$s]['alternativas'][] = array();

												foreach($subAlternativas as $sa => $subAlternativa)
												{
													$searchs[$index]['categorias'][$c]['perguntas'][$p]['perguntas'][$s]['alternativas'][$sa] = array(
														'id_alternativa' => $subAlternativa->getId(),
														'texto' => $subAlternativa->getTexto(),
														'imagem' => Enviroment::resolveUrl('~/resource/default/img/alternativas/p-' . $subPergunta->getId() . '/' . $subAlternativa->getId() . '-thumb.jpg')
													);
												}
											}
											else
											{
												foreach($subAlternativas as $sa => $subAlternativa)
												{
													$searchs[$index]['categorias'][$c]['perguntas'][$p]['perguntas'][$s]['alternativas'] = $subAlternativa->getTexto();
												}
											}
										}
									}
								}
								//Final das subperguntas
							}
						}
					}

					$sucesso = new stdClass();
					$sucesso->pesquisas = $searchs;
				}
				else
				{
					$erro->mensagem = 'Não encontramos nenhuma pesquisa disponível para você';
					$erro->codigo = -4000;
				}
			}
			else
			{
				$erro->mensagem = 'Este usuário não está mais ativo';
				$erro->codigo = -4001;
			}
		}
		else
		{
			$erro->mensagem = 'Token do usuário não foi encontrado';
			$erro->codigo = -4002;
		}
	}

	/**
	 * Função responsável por armazenar os dados da pesquisa que o entrevistador
	 * aplicou.
	 * Faixa de erro 5000 - 5499.
	 *
	 * @param stdClass $dados Todos os dados das pesquisas.
	 * @param stdClass $token Token do usuário.
	 * @param stdClass $sucesso Retorna objetos solicitados.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Hugo Minari
	 */
	protected function submeter($dados, $token, &$sucesso, &$erro)
	{
		//Verifica se veio os dados corretos
		if(!empty($dados) && !empty($token))
		{
			//Verifica se existe a pesquisa
			$pesquisas = PesquisaQuery::create('p')
				->filterByPublicada(true)
				->findPk($dados->pesquisaId);

			if(!empty($pesquisas))
			{
				//Verifica o usuario
				$usuario = UsuarioQuery::create('u')
					->filterByAtivo(true)
					->findOneByToken($token);

				if(!empty($usuario))
				{
					//ID da pergunta que contem a idade
					$pergunta = PerguntaQuery::create('pe')
						->filterByPesquisaId($pesquisas->getId())
						->where('pe.Texto = ?', 'Idade')
						->findOne();
					$idPerguntaIdade = $pergunta->getId();

					//ID da pergunta que contem ao sexo
					$perguntaSexo = PerguntaQuery::create('ps')
						->filterByPesquisaId($pesquisas->getId())
						->where('ps.Texto = ?', 'Sexo')
						->findOne();
					$idPerguntaSexo = $perguntaSexo->getId();

					//Verifica as respostas para achar a idade
					$idade = null;
					foreach($dados->respostas as $resposta)
					{
						if($resposta->perguntaId == $idPerguntaIdade)
						{
							$idade = $resposta->texto;
							break;
						}
					}

					//Verifica as respostas para achar o Sexo
					$sexo = null;
					foreach($dados->respostas as $respostaSexo)
					{
						if($respostaSexo->perguntaId == $idPerguntaSexo)
						{
							foreach($respostaSexo->alternativas as $sexoUser)
							{
								$sexo = $sexoUser->texto;
								break;
							}
						}
					}

					//Varre o publico alvo para verificar se a idade confere
					$publicoAlvo = PublicoAlvoQuery::create()
						->filterByPesquisaId($pesquisas->getId())
						->find();

					$save = false;

					foreach($publicoAlvo as $alvo)
					{
						$idadeMin = $alvo->getIdadeInicial();
						$idadeMax = $alvo->getIdadeFinal();

						if($idade >= $idadeMin && $idade <= $idadeMax)
						{
							//Pega a quantidade de homens e mulheres no MetaPublicoAlvo
							$metaPublico = MetaPublicoAlvoQuery::create()
								->filterByPublicoAlvoId($alvo->getId())
								->findOneOrCreate();

							if(!empty($metaPublico))
							{
								$mulheres	= $metaPublico->getMulheres();
								$homens		= $metaPublico->getHomens();

								if(in_array($sexo, array("Feminino", "Mulher")))
								{
									$metaPublico->setMulheres(($mulheres + 1));
								}
								elseif(in_array($sexo, array("Masculino", "Homem")))
								{
									$metaPublico->setHomens(($homens + 1));
								}

								$metaPublico->save();
							}
							else
							{
								if(in_array($sexo, array("Feminino", "Mulher")))
								{
									$metaPublico->setPublicoAlvoId($alvo->getId());
									$metaPublico->setMulheres(1);
								}
								elseif(in_array($sexo, array("Masculino", "Homem")))
								{
									$metaPublico->setPublicoAlvoId($alvo->getId());
									$metaPublico->setHomens(1);
								}

								$metaPublico->save();
							}

							$save = true;
							break;
						}
					}

					//Se o entrevistado se encaixa no publico alvo salva os dados
					if($save)
					{
						//verifica se a coleta já foi adicionada
						$duplicatedCollect = ColetaPesquisaQuery::create()
							->filterByPesquisaId($dados->pesquisaId)
							->_and()
							->filterByUsuarioId($usuario->getId())
							->_and()
							->filterByTempoInicio($dados->dataInicio)
							->findOne();

						//Define o numero da coleta.
						$numeroColeta = ColetaPesquisaQuery::create('nc')
							->filterByPesquisaId($dados->pesquisaId)
							->orderByNumeroColeta(Criteria::DESC)
							->select('nc.NumeroColeta')
							->find()
							->count();
						++$numeroColeta;

						//Salva a coleta ou seta como duplicada
						if(!empty($duplicatedCollect))
						{
							$qtd = $duplicatedCollect->getDuplicacao() + 1;
							$duplicatedCollect->setDuplicacao($qtd);
							$duplicatedCollect->save();

							$coleta = $duplicatedCollect;
						}
						else
						{
							$coleta = new ColetaPesquisa();
							$coleta->setUsuarioId($usuario->getId());
							$coleta->setPesquisaId($dados->pesquisaId);
							$coleta->setTempoInicio($dados->dataInicio);
							$coleta->setTempoFim($dados->dataFim);
							$coleta->setDataCriacao(date('Y-m-d'));
							$coleta->setLatitude($dados->latitude);
							$coleta->setLongitude($dados->longitude);
							$coleta->setTokenColeta($dados->token_coleta);
							$coleta->setNumeroColeta($numeroColeta);

							try
							{
								$coleta->save();
							}
							catch(PropelException $error)
							{
								$erro->mensagem = "Erro ao salvar os dados da pesquisa #{$dados->pesquisaId}";
								$erro->codigo = -5000;
								Report::sendError($error);
							}
							catch(Exception $ex)
							{
								$erro->mensagem = "Erro ao salvar os dados da pesquisa #{$dados->pesquisaId}";
								$erro->codigo = -5000;
								Report::sendError($ex);
							}
						}

						//Salva as respostas
						foreach($dados->respostas as $resposta)
						{
							//Verifica se a resposta e duplicada
							if($duplicatedCollect)
							{
								$duplicatedAnswer = RespostaQuery::create()
									->filterByColetaPesquisa($duplicatedCollect)
									->_and()
									->filterByPerguntaId($resposta->perguntaId)
									->findOne();
							}

							//Se houver alternativas
							if(isset($resposta->alternativas) && count($resposta->alternativas) > 0)
							{
								foreach($resposta->alternativas as $alternativa)
								{
									if(!empty($duplicatedAnswer))
									{
										$quantity = $duplicatedAnswer->getDuplicacao() + 1;
										$duplicatedAnswer->setDuplicacao($quantity);
										$duplicatedAnswer->save();
									}
									else
									{
										$respostas = new Resposta;
										$respostas->setColetaPesquisaId($coleta->getId());
										$respostas->setPerguntaId($resposta->perguntaId);
										$respostas->setAlternativaId($alternativa->alternativaId);
										$respostas->setTexto($alternativa->texto);

										try
										{
											$respostas->save();
										}
										catch(Exception $ex)
										{
											$erro->mensagem = "Erro ao salvar as respostas da pergunta #{$resposta->perguntaId}";
											$erro->codigo = -5002;
											Report::sendError($ex);
										}
									}
								}
							}
							else
							{
								if(!empty($duplicatedAnswer))
								{
									$quantity = $duplicatedAnswer->getDuplicacao() + 1;
									$duplicatedAnswer->setDuplicacao($quantity);
									$duplicatedAnswer->save();
								}
								else
								{
									$respostas = new Resposta;
									$respostas->setColetaPesquisaId($coleta->getId());
									$respostas->setPerguntaId($resposta->perguntaId);
									$respostas->setTexto($resposta->texto);

									try
									{
										$respostas->save();
									}
									catch(Exception $ex)
									{
										$erro->mensagem = "Erro ao salvar as respostas da pergunta #{$resposta->perguntaId}";
										$erro->codigo = -5002;
										Report::sendError($ex);
									}
								}
							}
						}

						//Popula o Publico alvo
						$pesquisasRestantes = $this->pesquisasRestantes($dados->pesquisaId);

						if($pesquisasRestantes == null)
						{
							$publicoAlvo = PublicoAlvoQuery::create()
								->filterByPesquisaId($dados->pesquisaId)
								->find();

							foreach($publicoAlvo as $p => $publico)
							{
								$searchs[$p]['publico_alvo'][] = array(
									'masculino' => $publico->getQuantidadeMasculino(),
									'feminino' => $publico->getQuantidadeFeminino(),
									'idade_inicial' => $publico->getIdadeInicial(),
									'idade_final' => $publico->getIdadeFinal()
								);
							}
						}
						else
						{
							$searchs = $pesquisasRestantes;
						}

						$quantidadeColetasUsuario = ColetaPesquisaQuery::create()
							->filterByUsuarioId($usuario->getId())
							->filterByPesquisa($pesquisas)
							->find()
							->count();

						$sucesso = new stdClass();
						$sucesso->falta = $searchs;
						$sucesso->quantidade = $quantidadeColetasUsuario;
						$sucesso->mensagem = "Os dados da pesquisa #{$dados->pesquisaId} foram armazenados.";

						$obs = "O usuário realizou uma coleta para a pesquisa #{$pesquisas->getId()}";
						Auditoria::adicionar('Realizou uma coleta', Auditoria::LEVEL_INFO, $usuario, $obs, Auditoria::TIPO_COLETA, $coleta->getId());
					}
					else
					{
						/*
						 * OBSERVAÇÃO!!!!
						 * Na verdade é um erro, porem para facilitar o tratamento
						 * no mobile, envia como sucesso.
						 */
						$sucesso = new stdClass();
						$sucesso->mensagem = "O entrevistado não se encaixa no público alvo definido para esta pesquisa.";
					}
				}
				else
				{
					$erro->mensagem = "Este usuário não existe ou não está ativo";
					$erro->codigo = -5004;
				}
			}
			else
			{
				$erro->mensagem = "A pesquisa #{$dados->pesquisaId} não foi encontrada";
				$erro->codigo = -5005;
			}
		}
		else
		{
			$erro->mensagem = 'Erro no recebimento dos dados da pesquisa.';
			$erro->codigo = -5006;
		}
	}

	/**
	 * Função responsável por armazenar os audios das coletas aplicadas.
	 * Faixa de erro 5500 - 5999.
	 *
	 * @param stdClass $dados Todos os dados das pesquisas.
	 * @param stdClass $token Token do usuário.
	 * @param stdClass $sucesso Retorna objetos solicitados.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Hugo Minari
	 */
	protected function submeterAudio($dados, $token, &$sucesso, &$erro)
	{
		//Verifica se veio os dados corretos
		if(!empty($dados) && !empty($token) && !empty($dados->token_coleta))
		{
			//Verifica se existe a coleta
			$coleta = ColetaPesquisaQuery::create('c')
				->findOneByTokenColeta($dados->token_coleta);

			if(!empty($coleta))
			{
				$usuario = UsuarioQuery::create()
					->filterByAtivo(true)
					->filterByToken($token)
					->findOne();

				if(!empty($usuario))
				{
					$pesquisa = $coleta->getPesquisa();
					$pesquisasRestantes = $this->pesquisasRestantes($pesquisa->getId());
					$quantidadeColetasUsuario = ColetaPesquisaQuery::create()
						->filterByUsuarioId($usuario->getId())
						->filterByPesquisa($pesquisa)
						->find()
						->count();

					if($pesquisasRestantes == null)
					{
						$publicoAlvo = PublicoAlvoQuery::create()
							->filterByPesquisaId($pesquisa->getId())
							->find();

						$searchs = array();

						foreach($publicoAlvo as $publico)
						{
							$searchs[] = array(
								'masculino' => $publico->getQuantidadeMasculino(),
								'feminino' => $publico->getQuantidadeFeminino(),
								'idade_inicial' => $publico->getIdadeInicial(),
								'idade_final' => $publico->getIdadeFinal()
							);
						}
					}
					else
					{
						$searchs = $pesquisasRestantes;
					}


					//Monta o path para salvar o audio
					$basePath = "{$this->application->getPath('resources')}gravacaoPesquisa/{$coleta->getPesquisaId()}";

					//Cria a pasta se ela não existir
					try
					{
						if(!Dir::exists($basePath))
							Dir::create($basePath);
					}
					catch(Exception $ex)
					{
						Log::add("A pasta não pôde ser criada. ({$basePath})");
					}

					//Salva o audio na pasta definida acima
					try
					{
						$audio = File::create("{$basePath}/{$coleta->getId()}.3gp", true);
						$audio->write(base64_decode($dados->audio));
						$audio->close();

						//Criar uma copia do audio em mp3
						Load::setAutoLoad(false);
						Load::script('PHPVideoToolkit/autoloader');

						$audioConvert = new Audio($audio->getPath());
						$audioConvert
									->save(
										"{$audio->getDirPath()}/{$audio->getPath()->getName(false)}.mp3",
										new AudioFormat_Mp3('output'),
										Media::OVERWRITE_EXISTING
									);

						$audioConvert2 = new Audio($audio->getPath());
						$audioConvert2
									->save(
										"{$audio->getDirPath()}/{$audio->getPath()->getName(false)}.wav",
										new AudioFormat_Wav('output'),
										Media::OVERWRITE_EXISTING
									);

						Load::setAutoLoad(true);
						File::remove($audio);

						$sucesso = new stdClass();
						$sucesso->mensagem = "O audio da coleta #{$coleta->getId()} foi armazenado.";
						$sucesso->falta = $searchs;
						$sucesso->quantidade = $quantidadeColetasUsuario;

						$obs = "O audio da coleta #{$coleta->getId()} que pertence a pesquisa {$coleta->getPesquisa()->getTitulo()} foi armazenado na pasta.";
						Auditoria::adicionar('Audio da coleta armazenado', Auditoria::LEVEL_INFO, $usuario, $obs, Auditoria::TIPO_COLETA, $coleta->getId());
					}
					catch(PHPVideoToolkit\Exception $ex)
					{
						Load::setAutoLoad(true);
						Report::sendError($ex);
					}
					catch(PropelException $error)
					{
						$erro->mensagem = "Erro ao salvar o audio da coleta #{$coleta->getId()}";
						$erro->codigo = -5500;
						Load::setAutoLoad(true);
						Report::sendError($error);
					}
					catch(Exception $ex)
					{
						$erro->mensagem = "Erro ao salvar o audio da coleta #{$coleta->getId()}";
						$erro->codigo = -5501;
						Load::setAutoLoad(true);
						Report::sendError($ex);
					}
				}
				else
				{
					$erro->mensagem = "O usuário não foi encontrado ou não está ativo.";
					$erro->codigo = -5502;
				}
			}
			else
			{
				$erro->mensagem = "A Coleta com token: {$dados->token_coleta} não foi encontrada";
				$erro->codigo = -5503;
			}
		}
		else
		{
			$erro->mensagem = 'Erro no recebimento do audio da coleta.';
			$erro->codigo = -5504;
		}
	}

	/**
	 * Função responsável por retornar a quantidade de pesquisas que o usuário
	 * tem atribuida a ele.
	 * Faixa de erro 6000 - 6999.
	 *
	 * @param stdClass $token Token do usuário.
	 * @param stdClass $sucesso Retorna objetos solicitados.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Hugo Minari
	 */
	protected function quantidadePesquisasUsuario($token, &$sucesso, &$erro)
	{
		if(!empty($token))
		{
			$usuario = UsuarioQuery::create()
				->filterByAtivo(true)
				->findOneByToken($token);

			$pesquisas = PesquisaQuery::create('p')
				->filterByPublicada(true)
				->filterByDataFim(array('min' => date('Y-m-d')))
				->usePesquisaUsuarioQuery()
					->filterByUsuarioId($usuario->getId())
				->endUse()
				->count();

			if($pesquisas > 0)
			{
				$sucesso = new stdClass();
				$sucesso->pesquisas = $pesquisas;
			}
			else
			{
				$erro->mensagem = 'Não encontramos nenhuma pesquisa disponível para você';
				$erro->codigo = -6000;
			}
		}
		else
		{
			$erro->mensagem = 'Token do usuário não foi encontrado';
			$erro->codigo = -6001;
		}
	}

	/**
	 * Função que verifica a versão do apk.
	 * Faixa de erro 7000 - 7999.
	 * @param stdClass $sucesso Retorna objetos solicitados.
	 * @author Hugo Minari.
	 */
	protected function versaoApk(&$sucesso, &$erro)
	{
		$versaoApp = LocalConfiguration::get('api.versaoapk');

		if($versaoApp)
		{
			$sucesso = new stdClass();
			$sucesso->versao = $versaoApp;
		}
		else
		{
			$erro->codigo = 7000;
			$erro->mensagem = 'Não foi possível verificar a versão do app.';
		}
	}

	/**
	 * Função responsável por retornar quantas aplicações faltam com base
	 * no publico alvo definido na pesquisa.
	 *
	 * A cada pesquisa que o metodo submeter recebe, esta função é chamada
	 * para retornar a quantidade atualizada.
	 *
	 * @param int $pesquisaId Recebe id da pesquisa que se deseja obter os
	 * dados.
	 * @return array Retorna um array com faixa etária, quantidade de homens
	 * e mulheres.
	 * @author Hugo Minari
	 */
	protected function pesquisasRestantes($pesquisaId)
	{
		$pesquisas = PesquisaQuery::create()
			->findPk($pesquisaId);

		//Verifica se a pesquisa existe
		if(!empty($pesquisas))
		{
			$temColetas = ColetaPesquisaQuery::create()
					->filterByPesquisaId($pesquisas->getId())
					->find();

			//Verifica se ja existe coletas
			if(!$temColetas->isEmpty())
			{
				//Pega o publico alvo da pesquisa para comparaçao
				$publicoAlvo = PublicoAlvoQuery::create()
					->filterByPesquisaId($pesquisas->getId())
					->find();

				$restante = array();

				foreach($publicoAlvo as $alvo)
				{
					$metaAlvo = MetaPublicoAlvoQuery::create()
						->filterByPublicoAlvoId($alvo->getId())
						->findOne();

					$quantidadeHomens = 0;
					$quantidadeMulheres = 0;

					if(!empty($metaAlvo))
					{
						$quantidadeHomens	= $metaAlvo->getHomens();
						$quantidadeMulheres =  $metaAlvo->getMulheres();
					}

					$restante[] = array(
						'masculino' => $alvo->getQuantidadeMasculino() - $quantidadeHomens,
						'feminino' => $alvo->getQuantidadeFeminino() - $quantidadeMulheres,
						'idade_inicial' => $alvo->getIdadeInicial(),
						'idade_final' => $alvo->getIdadeFinal()
					);
				}

				return $restante;
			}
			else
			{
				return null; //"Nenhuma coleta foi realizada até o momento.";
			}
		}
		else
		{
			return null; //'Esta pesquisa não pôde ser encontrada.';
		}
	}

	/**
	 * Função para visualizar o Json passado para o mobile.
	 * @param ArrayList $params (opcional) Recebe lista de parametros.
	 * Primeiro valor se refere ao token do usuario e o segundo recebe a ação.
	 * (Testa as ações listar_pesquisas, versaoapk)
	 */
	public function teste(ArrayList $params = null)
	{
		if(ArrayList::isValid($params))
		{
			try
			{
				$key = base64_decode(LocalConfiguration::get('api.privatekey'));
				$secret = LocalConfiguration::get('api.secretkey');
				$data = json_encode(array(
					'segredo' => $secret,
					'token' => 'ebd38504fb99ecb885150c0fc7b840abc53b78b4c5d0419dd256e36652bdcb9e',
					'acao' => 'submeter',
					'dados' => array()
				));

				$ciphertext = Crypto::encrypt($data, $key);
				$client = new HttpRequest($this->application->getBaseUrl() . 'api/sincronizar', HttpRequest::POST);
				$client->addParam('pedido', base64_encode($ciphertext));

				if($client->send())
				{
					$responseCiphertext = base64_decode($client->getResponse()->getContent());
					$json = Crypto::decrypt($responseCiphertext, $key);
					$responseData = json_decode($json);

					echo '<pre>' . print_r($responseData, true) . '</pre>';
				}
				else
				{
					echo "Falha na requisição (status {$client->getResponse()->getStatus()})<br>{$client->getResponse()->getContent()}";
				}
			}
			catch(Exception $ex)
			{
				echo "Erro: {$ex->getMessage()}";
			}
		}
	}
}