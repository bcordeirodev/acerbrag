<?php
/**
 * Este arquivo contem a classe Api que faz parte do projeto Moviefast.
 */
use \Defuse\Crypto\Crypto;
use \Defuse\Crypto\Exception as CryptException;

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
	 * Faixa de erro 100 - 199.
	 *
	 * O aplicativo Android atua como cliente acessando este método e passando
	 * informações.
	 *
	 * Antes de executar a ação solicitada, o usuário é autenticado e o pedido
	 * validado. Qualquer erro de validação é reportado de volta ao cliente.
	 * @author Diego Andrade
	 */
	public function sincronizar()
	{
		$answer = (object)array('sucesso' => false, 'dados' => null, 'erro' => null);
		$responseStatus = 200;
		$data = null;
		$user = null;
		$syncSuccess = null;
		$syncAction = null;
		$syncError = (object)array('mensagem' => null, 'codigo' => null, 'detalhes' => null);

		$app = Application::getCurrent();
		$app->removeAllListeners('crash');
		$app->addListener('crash', function(){

			$answer = (object)array(
				'sucesso' => false,
				'dados' => null,
				'erro' => array(
					'status' => 500,
					'mensagem' => 'Erro fatal'
				)
			);

			$this->resposta($answer);
		});

		if($this->request->hasPostParam('pedido'))
		{
			try
			{
				$key = base64_decode(LocalConfiguration::get('api.privatekey'));
				$secret = LocalConfiguration::get('api.secretkey');
				$ciphertext = base64_decode(filter_input(INPUT_POST, 'pedido'));
				$data = json_decode(Crypto::decrypt($ciphertext, $key));
				$syncAction = isset($data->acao) && !empty($data->acao) ? $data->acao : null;

				if(!empty($syncAction))
				{
					if(isset($data->segredo) && !empty($data->segredo) && $data->segredo === $secret)
					{
						$continue = false;

						$allowedActionsWithoutToken = array(
							'login',
							'recuperar_senha',
							'versao_apk',
							'cadastro'
						);

						if(in_array($syncAction, $allowedActionsWithoutToken))
						{
							$continue = true;
						}
						else
						{
							if(!empty($data->token))
							{
								$user = UsuarioQuery::getAtivos()->findOneByToken($data->token);

								if(!empty($user))
									$continue = true;
							}
							else
							{
								$syncError->mensagem = 'Token do usuário não foi encontrado';
								$syncError->codigo = -100;
							}
						}

						if($continue)
						{
							try
							{
								switch($syncAction)
								{
									case 'cadastro':
										$this->cadastro($data->dados, $answer->dados, $syncError);
										break;
									case 'login':
										$this->login($data->dados, $answer->dados, $syncError);
										break;
//									case 'sair':
//										$this->sair($data->dados, $answer->dados, $syncError);
//										break;
									case 'recuperar_senha':
										$this->recuperarSenha($data->dados, $answer->dados, $syncError);
										break;
									case 'mudar_senha':
										$this->mudarSenha($data->dados, $data->token, $answer->dados, $syncError);
										break;
									case 'listar_cidades':
										$this->listarCidades($data->dados, $answer->dados, $syncError);
										break;
									case 'atualizar_perfil':
										$this->atualizarPerfil($data->dados, $data->token, $answer->dados, $syncError);
										break;
									case 'atualizar_endereco':
										$this->atualizarEndereco($data->dados, $data->token, $answer->dados, $syncError);
										break;
									case 'atualizar_imagem':
										$this->atualizarImagem($data->dados, $data->token, $answer->dados, $syncError);
										break;
//									case 'enviar_notificacao_firebase':
//										$this->enviarNotificacaoFirebase($data->dados, $data->token, $answer->dados, $syncError);
//										break;
//									case 'enviar_mensagem_firebase':
//										$this->enviarMensagemFirebase($data->dados, $data->token, $answer->dados, $syncError);
//										break;
									case 'versao_apk':
										$this->versaoApk($answer->dados, $syncError);
										break;
									case 'listar_agendas':
										$this->listarAgendas($data->token, $answer->dados, $syncError);
										break;
									case 'listar_noticias':
										$this->listarNoticias($data->token, $answer->dados, $syncError);
										break;
									case 'listar_podcasts':
										$this->listarPodcasts($data->token, $answer->dados, $syncError);
										break;
									case 'listar_videos':
										$this->listarVideos($data->token, $answer->dados, $syncError);
										break;
									case 'listar_pgs':
										$this->listarPgs($data->token, $answer->dados, $syncError);
										break;
									case 'listar_ministerios':
										$this->listarMinisterios($data->token, $answer->dados, $syncError);
										break;
									case 'salvar_pedido_oracao':
										$this->salvarPedidoOracao($data->dados, $data->token, $answer->dados, $syncError);
										break;
									case 'minha_instituicao':
										$this->minhaInstituicao($data->token, $answer->dados, $syncError);
										break;
									case 'listar_istituicao_filiais':
										$this->listarInstituicaoFiliais($data->token, $answer->dados, $syncError);
										break;
									case 'cadastrar_membro':
										$this->cadastrarMembro($data->dados, $data->token, $answer->dados, $syncError);
										break;
									case 'atualizar_membro':
										$this->atualizarMembro($data->dados, $data->token, $answer->dados, $syncError);
										break;
									case 'recuperar_membro':
										$this->recuperarMembro($data->token, $answer->dados, $syncError);
										break;
									default:
										$syncSuccess = false;
										$responseStatus = 404;
										$syncError->mensagem = 'A ação solicitada é inválida';
										$syncError->codigo = -101;
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
							$syncError->mensagem = 'Token informado não encontrado.';
							$syncError->codigo = -102;
						}
					}
					else
					{
						$syncError->mensagem = 'Não foi possível localizar a identificação do pedido';
						$syncError->codigo = -103;
					}
				}
				else
				{
					$syncError->mensagem = 'Nenhuma ação foi solicitada';
					$syncError->codigo = -104;
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
			$syncError->codigo = -105;
			$syncError->detalhes = $syncError->mensagem;
		}

		if($syncSuccess)
			$answer->sucesso = true;
		else
			$answer->erro = $syncError;

		$this->resposta($answer);
	}

	/**
	 * Função responsável pelo controle de login.
	 * Faixa de erro 200 - 299.
	 *
	 * @param stdClass $dados Dados do usuário.
	 * @param stdClass $sucesso Retorna objetos solicitados.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Hugo Minari
	 */
	protected function login($dados, &$sucesso, &$erro)
	{
		//Parâmetros obrigatórios.
		$email			= $dados->email;
		$metodoLogin	= $dados->metodo_login;
		$tokenFirebase	= $dados->token_firebase;

		//Parâmetros opcionais.
		$senha		= $dados->senha;
		$facebookId = isset($dados->facebook_id) ? $dados->facebook_id : null;
		$googleId	= isset($dados->google_id) ? $dados->google_id : null;

		if(!empty($email) && !empty($metodoLogin) && !empty($tokenFirebase))
		{
			//Procura o usuário com o email recebido
			$usuario = UsuarioQuery::getAtivos()->findOneByEmail($email);
			$pass = false;

			//Se achar o usuário, começa a tratar o login.
			if(!empty($usuario))
			{
				//Login com FACEBOOK
				if($metodoLogin == 'facebook')
				{
					$userFacebook = UsuarioQuery::create()->findOneByFacebookId($facebookId);

					//Se achou o usuário pelo facebook_ID
					if(!empty($userFacebook))
					{
						$pass = true;
					}
					//Caso contrário adiciona o facebook_ID ao usuário.
					else
					{
						$usuario->setFacebookId($facebookId);

						try
						{
							$usuario->save();
							$pass = true;
						}
						catch(Exception $exc)
						{
							Report::sendError($exc);
							$erro->mensagem = 'Não foi possível integrar o login facebook ao seu cadastro';
							$erro->codigo = -200;
						}
					}
				}
				//Login com GOOGLE+
				elseif($metodoLogin == 'google')
				{
					$userGoogle = UsuarioQuery::create()->findOneByGoogleId($googleId);

					//Se achou o usuário pelo google_ID
					if(!empty($userGoogle))
					{
						$pass = true;
					}
					//Caso contrário adiciona o google_ID ao usuário.
					else
					{
						$usuario->setGoogleId($googleId);

						try
						{
							$usuario->save();
							$pass = true;
						}
						catch(Exception $exc)
						{
							Report::sendError($exc);
							$erro->mensagem = 'Não foi possível integrar o login google+ ao seu cadastro';
							$erro->codigo = -201;
						}
					}
				}
				//Login com SENHA
				else
				{
					if($usuario->getSenha() == Utils::encrypt($senha))
						$pass = true;
				}

				//Se o login foi corretamente informado
				if($pass)
				{
					$addressId = $usuario->getEnderecoId();
					$memberId = $usuario->getMembroId();

					//Verifica se o usuário já possui um token_sistema
					if(!$usuario->getToken())
						$usuario->gerarToken();

					//Atualiza o token_firebase do usuário
					$usuario->setTokenFirebase($tokenFirebase);
					$usuario->save();

					//Monta a resposta de sucesso
					$sucesso				= new stdClass;
					$sucesso->token			= $usuario->getToken();
					$sucesso->avatar		= $usuario->getImagem('perfil', true);
					$sucesso->name			= $usuario->getNome();
					$sucesso->email			= $usuario->getEmail();
					$sucesso->telefone		= $usuario->getTelefone();
					$sucesso->possuiMembro	= !empty($memberId);
					$sucesso->endereco		= null;

					if(!empty($addressId))
						$sucesso->endereco	= $usuario->getEnderecoFormatado();
				}
				else
				{
					//Monta erro caso o usuário não tenha sucesso no login
					$erro->mensagem = 'Usuário ou senha inválido';
					$erro->codigo	= -202;
				}
			}
			else
			{
				//Monta erro caso o email recebido não pertença a nenhum usuário
				$erro->mensagem = 'Não encontramos nenhum usuário com este email';
				$erro->codigo = -203;
			}
		}
		else
		{
			//Monta erro caso os parâmetros obrigatórios não tenha sido informado
			$erro->mensagem = 'Parâmetros obrigatório não informado';
			$erro->codigo = -204;
		}
	}

	/**
	 * Função responsável por recuperar a senha do usuário.
	 * Faixa de erro 300 - 350.
	 *
	 * @param stdClass $dados Email do usuário.
	 * @param stdClass $sucesso Retorna objetos solicitados.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Hugo Minari
	 */
	protected function recuperarSenha($dados, &$sucesso, &$erro)
	{
		//Parâmetros obrigatórios.
		$email = $dados->email;

		if(!empty($email))
		{
			if(filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				$usuario = UsuarioQuery::create()->findOneByEmail($email);

				if(!empty($usuario))
				{
					$usuario->gerarTokenSenha();

					$assunto = 'Recuperação de senha';
					$url = Enviroment::resolveUrl("~/usuario/recuperar-senha/{$usuario->getTokenSenha()}");
					$mensagem = "<p>Recebemos uma solicitação para recuperação de senha, se foi
						você, clique no link abaixo, caso contrário desconsidere este email.</p> <br/>
						<a href='{$url}' title='Recuperação de senha' target='_blank'>
							Link para recuperação de senha
						</a>";

					try
					{
						Utils::sendUserEmail($usuario, $assunto, $mensagem);
						$sucesso = new stdClass();
						$sucesso->mensagem = 'Processo de recuperação de senha iniciado. Verifique seu email.';
					}
					catch(Exception $ex)
					{
						Report::sendError($ex);
						$erro->mensagem = 'Falha ao enviar email de recuperação. Por favor, tente novamente!';
						$erro->codigo = -300;
					}

				}
				else
				{
					$erro->mensagem = 'Email informado não pertence a um usuário cadastrado';
					$erro->codigo = -301;
				}
			}
			else
			{
				$erro->mensagem = 'Email informado não pertence a um usuário cadastrado';
				$erro->codigo = -302;
			}
		}
		else
		{
			$erro->mensagem = 'Parâmetros obrigatório não informado';
			$erro->codigo = -303;
		}
	}

	/**
	 * Função para que o usuário altere sua senha dentro do sistema.
	 * Faixa de erro 351 - 399
	 *
	 * @param stdClass $dados Recebe a senha antiga e a nova.
	 * @param string $token Token do usuário logado.
	 * @param stdClass $sucesso Retorna mensagem de sucesso.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Hugo Minari
	 */
	protected function mudarSenha($dados, $token, &$sucesso, &$erro)
	{
		//Parâmetros obrigatórios.
		$senhaAtual = $dados->senha_atual;
		$novaSenha  = $dados->nova_senha;

		if(!empty($token) && !empty($senhaAtual) && !empty($novaSenha))
		{
			$usuario = UsuarioQuery::create()->findOneByToken($token);

			if($usuario)
			{
				$senhaUser  = $usuario->getSenha();
				$senhaAtual = Utils::encrypt($senhaAtual);

				if($senhaUser == $senhaAtual)
				{
					try
					{
						$usuario->setSenha(Utils::encrypt($novaSenha));
						$usuario->save();

						$sucesso = new stdClass();
						$sucesso->mensagem = "Sua senha foi alterada com sucesso";
					}
					catch(Exception $ex)
					{
						$erro->mensagem = 'Opss, ocorreu um erro na alteração de senha. Tente novamente!';
						$erro->codigo = -351;
						Log::add($ex);
					}
				}
				else
				{
					$erro->mensagem = 'Senha antiga não confere.';
					$erro->codigo = -352;
				}
			}
			else
			{
				$erro->mensagem = 'Token de usuário inválido.';
				$erro->codigo = -353;
			}
		}
		else
		{
			$erro->mensagem = 'Parâmentros obrigatório não infomado.';
			$erro->codigo = -354;
		}
	}

	/**
	 * Função para cadastrar um novo usuário no sistema.
	 * Faixa de erro 400 - 499.
	 *
	 * @param stdClass $dados Todos os dados do usuário.
	 * @param stdClass $sucesso Retorna objetos solicitados.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Hugo Minari
	 */
	protected function cadastro($dados, &$sucesso, &$erro)
	{
		/*
		 * Parâmetros obrigatórios
		 */
		$nome			= $dados->name;
		$instituicaoId  = $dados->instituicaoId;
		$email			= $dados->email;
		$senha			= Utils::encrypt($dados->senha);
		$emailValido	= filter_var($email, FILTER_VALIDATE_EMAIL);
		$tokenFirebase	= $dados->token_firebase;

		/*
		 * Parâmetros opcionais
		 */
		$avatar	= $dados->avatar;
		$facebookId = isset($dados->facebook_id) ? $dados->facebook_id : null;
		$googleId = isset($dados->google_id) ? $dados->google_id : null;

		/*
		 * Verifica se algum dados importante veio em branco
		 */
		if($emailValido && !empty($senha) && !empty($nome) && !empty($tokenFirebase))
		{
			$existEmail = UsuarioQuery::create()->findOneByEmail($email);

			/*
			 * Verifica se já existe o email cadastrado
			 */
			if(empty($existEmail))
			{
				$token = sha1($email . $senha . time());

				//Salva o usuário
				$usuario = new Usuario;
				$usuario->setPerfilId(Perfil::PERFIL_USUARIO_REGULAR);
				$usuario->setInstituicaoId($instituicaoId);
				$usuario->setNome($nome);
				$usuario->setEmail($email);
				$usuario->setToken($token);
				$usuario->setTokenFirebase($tokenFirebase);
				$usuario->setDataCadastro(time());
				$usuario->setSenha($senha);

				if(!empty($googleId))
					$usuario->setGoogleId($googleId);

				if(!empty($facebookId))
					$usuario->setFacebookId($facebookId);

				try
				{
					$usuario->save();
				}
				catch(Exception $ex)
				{
					$erro->mensagem = 'Não foi possível cadastrar o usuário';
					$erro->codigo = -401;
					Log::add($ex);
				}

				//Salva a imagem
				if(!empty($avatar))
				{
					$imageSaved = false;
					$basePath	= $usuario->getDir();

					try
					{
						if(!Dir::exists($basePath))
							Dir::create($basePath);
					}
					catch(Exception $ex)
					{
						Log::add("A pasta não pôde ser criada. ({$basePath})");
					}

					$image = File::create("{$basePath}/perfil.bmp", true);
					$image->write(base64_decode($avatar));
					$image->close();

					$fileExist = File::exists($image->getPath());
					$timeOut = 0;

					while($timeOut < 40)
					{
						if($fileExist)
							break;

						$timeOut += 5;
						Thread::sleep(.5);

						$fileExist = File::exists($image->getPath());
					}

					if($fileExist)
					{
						//Converte para JPG
						$jpeg	= new Image($image->getPath());
						$jpeg	= $jpeg->convert(Image::JPEG);

						//Cria a miniatura
						$thumb = new Thumb($jpeg->getPath());
						$thumb->setName('perfil-p');
						$thumb->resize(36, 36, true);

						//Remove a BMP
						File::remove($image->getPath());

						$imageSaved = true;
					}
				}

				//Envia email de boas vindas
				$assunto = 'Bem vindo(a) à MovieFast';
				$texto = "<p>
							Seu cadastro foi efetuado com sucesso e você já pode desfrutar de
							todos os benefícios de ser um membro MovieFast.
						 </p>";

				if(Utils::sendUserEmail($usuario, $assunto, $texto))
					Log::add('Uma mensagem de boas vinda foi enviada para o usuário', Log::SUCCESS);
				else
					Log::add('Erro ao enviar mensagem de boas vinda para o usuário', Log::ERROR);

				$complemento = null;

				if(!$imageSaved)
					$complemento = ', porém a imagem de perfil não pôde ser adicionada';

				//Retorna a mensagem
				$sucesso = new stdClass();
				$sucesso->mensagem = "Usuário cadastrado com sucesso{$complemento}";
				$sucesso->name = $usuario->getNome();
				$sucesso->email	= $usuario->getEmail();
				$sucesso->token	= $usuario->getToken();
				$sucesso->avatar = $usuario->getImagem('perfil', true);
			}
			else
			{
				$erro->mensagem = 'Já existe um usuário cadastrado com este email.';
				$erro->codigo = -402;
			}
		}
		else
		{
			$erro->mensagem = 'Parâmetros obrigatório não informado';
			$erro->codigo = -403;
		}
	}

	/**
	 * Função para listar as cidades de uma UF.
	 * Faixa de erro 500 - 599.
	 *
	 * @param stdClass $dados Uf para resgatar as cidades.
	 * @param stdClass $sucesso Retorna objetos solicitados.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Hugo Minari
	 */
	protected function listarCidades($dados, &$sucesso, &$erro)
	{
		$ufId = $dados->uf_id;

		if(!empty($ufId))
		{
			$cidades = CidadeQuery::create()->findByUfId($ufId);
			$cities  = array();

			if(!$cidades->isEmpty())
			{
				foreach($cidades as $cidade)
				{
					$cities[] = array(
						'cidade_id' => $cidade->getId(),
						'nome_cidade' => $cidade->getNome()
					);
				}

				$sucesso = new stdClass;
				$sucesso->cidades = $cities;
			}
			else
			{
				$erro->mensagem = 'Nenhum cidade cadastrada nesta UF';
				$erro->codigo = -500;
			}
		}
		else
		{
			$erro->mensagem = 'Parâmetros obrigatório não informado';
			$erro->codigo = -501;
		}
	}

	/**
	 * Função que dispara notificações via firebase.
	 * Faixa de erro 1300 - 1399
	 *
	 * @param stdClass $dados Dados obrigatório para envio de mensagem.
	 * @param stdClass $sucesso Retorna objetos solicitados.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Hugo Minari
	 */
	protected function _enviarNotificacaoFirebase($dados, &$sucesso, &$erro)
	{
		//Define as variáveis a serem utilizadas
		$urlNotifications = 'https://fcm.googleapis.com/fcm/send';
		$apiKey			  = 'AAAAgvaAFy0:APA91bFo8erjhFMvf2WNy7vGL47AIfqaNGDHT7IPX--m0BT_XW2FUduayKsm2actxfT0TRkH_2uPsYeIJdo0-Us70Ye284W0wgwuQIPBbyzV5Ap1KyzHhjSaaitl0Ox3zlgYQAoqXZGCHAfGkB4C8RaBHfTTcc85Jw';
		$projectId		  = 'moviefast-2071f';
		$senderId		  = '562481338157';
		$icon			  = Enviroment::resolveUrl("~/resource/default/img/icone-movie.png");
		$fields			  = array();
		$targetsObj		  = $dados->tokens;

		//Define quem vai receber a notificação
		$fields['registration_ids'] = $targetsObj;

		//Define o header
		$headers = array
		(
			"Authorization: key={$apiKey}",
			"Content-Type: application/json",
			"project_id: {$projectId}"
		);

		//Define as configurações da notificação
		$fields['priority'] = 'high';
		$fields['color'] = '#B00042';
		$fields['icon'] = $icon;
		$fields['notification']['click_action'] = 'HomeMovieActivity';
		$fields['notification']['sound'] = 'default';
		$fields['notification']['vibrate'] = true;

		//Define os dados da notificação
		$fields['data']['nome'] = $dados->nome;
		$fields['data']['sobrenome'] = $dados->sobrenome;
		$fields['notification']['title'] = $dados->titulo;
		$fields['notification']['body'] = $dados->mensagem;

		//Faz a conexão com o firebase para enviar
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, $urlNotifications);
		curl_setopt($ch,CURLOPT_POST, true );
		curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($fields));
		$errors	= curl_error($ch);
		$result = curl_exec($ch);
		curl_close($ch);

		//Trata a resposta
		if($result === FALSE)
		{
			$erro->mensagem = 'A mensagem não pôde ser entregue';
			$erro->codigo = -1300;
			Log::add("FCM Send Error: {$errors}", Log::ERROR);
		}
		else
		{
			$sucesso = new stdClass;
			$sucesso->mensagem = 'Mensagem enviada';
			$sucesso->resultado = $result;
			$sucesso->fields = $fields;
		}
	}

	/**
	 * Função que inicia um chat via firebase.
	 * Faixa de erro 1400 - 1499
	 *
	 * @param stdClass $dados Dados obrigatório para envio de mensagem.
	 * @param string $token Token do usuário que esta enviando a mensagem.
	 * @param stdClass $sucesso Retorna objetos solicitados.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Hugo Minari
	 */
	protected function _enviarMensagemFirebase($dados, $token, &$sucesso, &$erro)
	{
		//Define as variáveis a serem utilizadas
		$urlNotifications = 'https://fcm.googleapis.com/fcm/send';
		$apiKey			  = 'AAAAgvaAFy0:APA91bFo8erjhFMvf2WNy7vGL47AIfqaNGDHT7IPX--m0BT_XW2FUduayKsm2actxfT0TRkH_2uPsYeIJdo0-Us70Ye284W0wgwuQIPBbyzV5Ap1KyzHhjSaaitl0Ox3zlgYQAoqXZGCHAfGkB4C8RaBHfTTcc85Jw';
		$projectId		  = 'moviefast-2071f';
		$senderId		  = '562481338157';
		$icon			  = Enviroment::resolveUrl("~/resource/default/img/icone-movie.png");
		$fields			  = array();
		$targetsObj		  = $dados->tokens;

		//Define quem vai receber a notificação
		$fields['registration_ids'] = $targetsObj;

		//Define o header
		$headers = array
		(
			"Authorization: key={$apiKey}",
			"Content-Type: application/json",
			"project_id: {$projectId}"
		);

		//Define as configurações da notificação
		$fields['priority'] = 'high';
		$fields['color'] = '#B00042';
		$fields['icon'] = $icon;
		$fields['notification']['click_action'] = 'HomeMovieActivity';
		$fields['notification']['sound'] = 'default';
		$fields['notification']['vibrate'] = true;

		//Define os dados da notificação
		$fields['data']['nome'] = $dados->nome;
		$fields['data']['sobrenome'] = $dados->sobrenome;
		$fields['notification']['title'] = $dados->titulo;
		$fields['notification']['body'] = $dados->mensagem;

		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, $urlNotifications);
		curl_setopt($ch,CURLOPT_POST, true );
		curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($fields));
		$errors	= curl_error($ch);
		$result = curl_exec($ch);
		curl_close($ch);

		if($result === FALSE)
		{
			$erro->mensagem = 'A mensagem não pôde ser entregue';
			$erro->codigo = -1300;
			Log::add('FCM Send Error: ' . $errors);
		}
		else
		{
			$sucesso = new stdClass;
			$sucesso->mensagem = 'Mensagem enviada';
			$sucesso->resultado = $result;
			$sucesso->fields = $fields;
		}
	}

	/**
	 * Função que retorna todas as informações de perfil do usuário para tela
	 * de edição.
	 * Faixa de erro 1500 - 1599
	 *
	 * @param stdClass $dados Dados obrigatório para envio de mensagem.
	 * @param string $token Token do usuário que esta enviando a mensagem.
	 * @param stdClass $sucesso Retorna objetos solicitados.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Hugo Minari
	 */
	protected function _meuPerfil($dados, $token, &$sucesso, &$erro)
	{
		if(!empty($token))
		{
			$acao = $dados->acao_perfil;
			$user = UsuarioQuery::create()->findOneByToken($token);

			if(!empty($user))
			{
				$nome = $dados->nome;
				$email = $dados->email;
				$telefone = $dados->telefone;
				$dadosPerfil = array();

				if($acao == 'listar')
				{
					$dadosPerfil[] = array(
						'nome' => $user->getNome(),
						'email' => $user->getEmail(),
						'telefone' => $user->getTelefone(),
						'endereco' => $user->getEndereco()
					);

					$sucesso = new stdClass();
					$sucesso->dados_perfil = $dadosPerfil;

				}
				elseif($acao == 'salvar')
				{
					$user->setNome($nome);
					$user->setEmail($email);
					$user->setTelefone($telefone);

					try
					{
						$user->save();

						$sucesso = new stdClass();
						$sucesso->mensagem = 'Seu perfil foi atualizado com sucesso';

					}
					catch(Exception $ex)
					{
						$erro->mensagem = 'Não foi possível atualizar o perfil';
						$erro->codigo = -1500;
						Log::add($ex);
					}
				}
				else
				{
					$erro->mensagem = 'Ação de perfil inválida';
					$erro->codigo = -1501;
				}
			}
			else
			{
				$erro->mensagem = 'Token inválido';
				$erro->codigo = -1502;
			}
		}
		else
		{
			$erro->mensagem = 'Parâmetros obrigatório não informado';
			$erro->codigo = -1503;
		}
	}

	/**
	 * Função para atualizar o perfil do usuario.
	 * Faixa de erro 1600 - 1650
	 *
	 * @param stdClass $dados Todos os dados da solicitação.
	 * @param stdClass $token Token do usuário.
	 * @param stdClass $sucesso Retorna objetos solicitados.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Hugo Minari
	 */
	protected function atualizarPerfil($dados, $token, &$sucesso, &$erro)
	{
		if(!empty($dados) && !empty($token))
		{
			$user = UsuarioQuery::create()->findOneByToken($token);

			if(!empty($user))
			{
				//Variáveis recebida na requisição
				$email			= $dados->email;
				$nome			= $dados->name;
				$telefone		= preg_replace("/[^0-9]/", "", $dados->telefone);

				//Define os dados do usuario
				if(!empty($nome))
					$user->setNome($nome);

				if(!empty($email))
					$user->setEmail($email);

				if(!empty($telefone))
					$user->setTelefone($telefone);

				try
				{
					$user->save();

					$sucesso = new stdClass();
					$sucesso->mensagem = 'Seu perfil foi atualizado com sucesso';
					$sucesso->email = $user->getEmail();
					$sucesso->name = $user->getNome();
					$sucesso->telefone = $user->getTelefone();
				}
				catch(Exception $ex)
				{
					$erro->mensagem = 'Erro ao atualizar seu perfil';
					$erro->codigo = -1600;
					Log::add($ex, LOG_ERR);
				}
			}
			else
			{
				$erro->mensagem = 'Token inválido';
				$erro->codigo = -1601;
			}
		}
		else
		{
			$erro->mensagem = 'Parâmetros obrigatórios não definidos';
			$erro->codigo = -1602;
		}
	}

	/**
	 * Função para atualizar o endereço do usuario.
	 * Faixa de erro 1651 - 1699
	 *
	 * @param stdClass $dados Todos os dados da solicitação.
	 * @param stdClass $token Token do usuário.
	 * @param stdClass $sucesso Retorna objetos solicitados.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Hugo Minari
	 */
	protected function atualizarEndereco($dados, $token, &$sucesso, &$erro)
	{
		//Variáveis recebida na requisição
		$cep			= preg_replace("/[^0-9]/", "", $dados->cep);
		$ufSigla		= preg_replace('/\s+/', '', $dados->uf);
		$complemento	= $dados->complemento;
		$numero			= $dados->numero;
		$bairro			= $dados->bairro;
		$nomeCidade		= $dados->localidade;
		$logradouro		= $dados->logradouro;

		if(!empty($dados) && !empty($token) && !empty($ufSigla) && !empty($nomeCidade))
		{
			$user = UsuarioQuery::create()->findOneByToken($token);
			$isNew = false;

			if(!empty($user))
			{
				//Se existir a cidade seta o id se não, cria uma nova.
				$uf = UfQuery::create()->findOneBySigla($ufSigla);
				$cidade = CidadeQuery::create()
					->_if(!empty($uf))
						->filterByUf($uf)
					->_endif()
					->findOneBySlug(Text::slug($nomeCidade));

				//Se for uma cidade que não esteja na lista, adiciona no banco
				if(empty($cidade))
				{
					$cidade = new Cidade;
					$cidade->setUf($uf);
					$cidade->setNome($nomeCidade);
					$cidade->setSlug(Text::slug($nomeCidade));

					try
					{
						$cidade->save();
					}
					catch(Exception $ex)
					{
						$erro->mensagem = 'Erro ao localizar cidade informada.';
						$erro->codigo = -1651;
						Log::add($ex, LOG_ERR);
					}
				}

				//Se existir o endereço, atualiza, se não, cria.
				$endereco = $user->getEndereco();
				if(empty($endereco))
				{
					$endereco = new Endereco;
					$isNew = true;
				}

				//Define os valores aos campos do endereço.
				if(!empty($cep))
					$endereco->setCep($cep);

				if(!empty($logradouro))
					$endereco->setLogradouro($logradouro);

				if(!empty($complemento))
					$endereco->setComplemento($complemento);

				if(!empty($numero))
					$endereco->setNumero($numero);

				if(!empty($bairro))
					$endereco->setBairro($bairro);

				if(!empty($cidade))
					$endereco->setCidade($cidade);

				try
				{
					$endereco->save();

					if($isNew)
					{
						$user->setEndereco($endereco);
						$user->save();
					}

					$sucesso = new stdClass();
					$sucesso->mensagem = 'Seu endereço foi atualizado com sucesso';
					$sucesso->email = $user->getEmail();
					$sucesso->name = $user->getNome();
					$sucesso->telefone = $user->getTelefone();
					$sucesso->endereco = $user->getEnderecoFormatado();
				}
				catch(Exception $ex)
				{
					$erro->mensagem = 'Erro ao atualizar seu endereço';
					$erro->codigo = -1652;
					Log::add($ex, LOG_ERR);
				}
			}
			else
			{
				$erro->mensagem = 'Token inválido';
				$erro->codigo = -1653;
			}
		}
		else
		{
			$erro->mensagem = 'Parâmetros obrigatórios não definidos';
			$erro->codigo = -1654;
		}
	}

	/**
	 * Função que atualiza a imagem de perfil de um usuário.
	 * Faixa de erro 1700 - 1799.
	 *
	 * @param stdClass $dados Dados obrigatório para resgatar as avaliações.
	 * @param stdClass $sucesso Retorna objetos solicitados.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Hugo Minari
	 */
	protected function atualizarImagem($dados, $token, &$sucesso, &$erro)
	{
		if(!empty($token) && !empty($dados))
		{
			$user = UsuarioQuery::create()->findOneByToken($token);

			if(!empty($user))
			{
				//Remove todas as imagens
				$folder = $user->getDir();
				$fileImage = base64_decode($dados->avatar);

				if(Dir::exists($folder))
				{
					$files = Dir::open($folder)->getFiles();

					foreach($files as $file)
					{
						if(preg_match('/^(?:original|perfil)/', $file->getName()))
							File::remove($file);
					}
				}
				else
				{
					Dir::create($folder);
				}

				//Salva a nova imagem
				$image = File::create("{$folder}/perfil.png", true);
				$image->write($fileImage);
				$image->close();

				$fileExist = File::exists($image->getPath());
				$timeOut = 0;

				while($timeOut < 40)
				{
					if($fileExist)
						break;

					$timeOut += 5;
					Thread::sleep(.5);

					$fileExist = File::exists($image->getPath());
				}

				if($fileExist)
				{
					//Converte para JPG
					$jpeg	= new Image($image->getPath());
					$jpeg	= $jpeg->convert(Image::JPEG);

					//Cria a miniatura
					$thumb = new Thumb($jpeg->getPath());
					$thumb->setName('perfil-p');
					$thumb->resize(36, 36, true);

					//Remove a BMP
					File::remove($image->getPath());

					$sucesso = new stdClass();
					$sucesso->mensagem = 'Imagem atualizada com sucesso';
					$sucesso->avatar = $user->getImagem('perfil', true);
				}
				else
				{
					$erro->mensagem = 'A imagem não pôde ser criada';
					$erro->codigo = -1700;
				}
			}
			else
			{
				$erro->mensagem = 'Token de usuário inválido';
				$erro->codigo = -1701;
			}
		}
		else
		{
			$erro->mensagem = 'Parâmetros obrigatórios não definidos';
			$erro->codigo = -1702;
		}
	}

	/**
	 * Lista agendas cadastradas para o usuário informado.
	 * Faixa de erro 1800 - 1899.
	 *
	 * @param stdClass $token Token do usuário.
	 * @param stdClass $sucesso Retorna objeto com as informações solicitadas.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Bruno Cordeiro
	 */
	public function listarAgendas($token, &$sucesso, &$erro)
	{
		if(!empty($token))
		{
			$user = UsuarioQuery::create()->findOneByToken($token);

			if(!empty($user))
			{
				$churchId			= $user->getFilialId();
				$today				= Date::today('Y-m-d');
				$sucesso			= new stdClass();
				$sucesso->agendas	= array();

				if(empty($churchId))
					$churchId = $user->getInstituicaoId();

				$agendas = AgendaQuery::create('a')
					->filterByAtiva(true)
					->filterByData($today, Criteria::GREATER_EQUAL)
					->orderByData()
					->orderByHora()
					->joinAgendaIgreja('ai')
					->where('ai.IgrejaId = ?', $churchId)
					->select('a.Id')
					->find()
					->toArray();

				if(count($agendas) > 0)
				{
					foreach($agendas as $agendaId)
					{
						$agenda = AgendaQuery::create()->findPk($agendaId);
						$address = $agenda->getEndereco();

						$sucesso->agendas[] = array(
							'id' => $agenda->getId(),
							'titulo' => $agenda->getTitulo(),
							'descricao' => $agenda->getDescricao(),
							'data' => $agenda->getData('d/m/Y'),
							'hora' => $agenda->getHora(),
							'endereco' => array(
								'logradouro' => $address->getLogradouro(),
								'bairro' => $address->getBairro(),
								'cep' => $address->getCep(),
								'numero' => $address->getNumero(),
								'complemento' => $address->getComplemento()
							)
						);
					}
				}
				else
				{
					$erro->mensagem = 'Nenhuma agenda foi localizada';
					$erro->codigo = -1803;
				}
			}
			else
			{
				$erro->mensagem = 'Token de usuário inválido';
				$erro->codigo = -1801;
			}
		}
		else
		{
			$erro->mensagem = 'Parâmetros obrigatórios não definidos';
			$erro->codigo = -1802;
		}
	}

	/**
	 * Lista notícias cadastradas para o usuário informado.
	 * Faixa de erro 1900 - 1999.
	 *
	 * @param stdClass $token Token do usuário.
	 * @param stdClass $sucesso Retorna objeto com as informações solicitadas.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Bruno Cordeiro
	 */
	public function listarNoticias($token, &$sucesso, &$erro)
	{
		if(!empty($token))
		{
			$user = UsuarioQuery::create()->findOneByToken($token);

			if(!empty($user))
			{
				$churchId = $user->getFilialId();
				$sucesso = new stdClass();
				$sucesso->noticias = array();

				if(empty($churchId))
					$churchId = $user->getInstituicaoId();

				$notices = NoticiaQuery::create('n')
					->filterByAtiva(true)
					->orderByDataCadastro(Criteria::DESC)
					->joinNoticiaIgreja('ni')
					->where('ni.IgrejaId = ?', $churchId)
					->select('n.Id')
					->find();

				if(count($notices) > 0)
				{
					foreach($notices	 as $noticeId)
					{
						$notice = NoticiaQuery::create()->findPk($noticeId);

						$sucesso->noticias[] = array(
							'id' => $notice->getId(),
							'titulo' => $notice->getTitulo(),
							'subTitulo' => $notice->getSubTitulo(),
							'descricao' => $notice->getDescricao(),
							'data' => $notice->getDataCadastro('d/m/Y'),
							'nomePublicador' => $notice->getUsuario()->getNome(),
							'urlImagem' => $notice->getImagem()
						);
					}
				}
				else
				{
					$erro->mensagem = 'Nenhuma noticia foi localizada';
					$erro->codigo = -1903;
				}
			}
			else
			{
				$erro->mensagem = 'Token de usuário inválido';
				$erro->codigo = -1901;
			}
		}
		else
		{
			$erro->mensagem = 'Parâmetros obrigatórios não definidos';
			$erro->codigo = -1902;
		}
	}

	/**
	 * Lista os podcasts cadastrados para o usuário informado.
	 * Faixa de erro 2000 - 2099.
	 *
	 * @param stdClass $token Token do usuário.
	 * @param stdClass $sucesso Retorna objeto com as informações solicitadas.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Bruno Cordeiro
	 */
	public function listarPodcasts($token, &$sucesso, &$erro)
	{
		if(!empty($token))
		{
			$user = UsuarioQuery::create()->findOneByToken($token);

			if(!empty($user))
			{
				$churchId = $user->getFilialId();
				$sucesso = new stdClass();
				$sucesso->podcasts = array();

				if(empty($churchId))
					$churchId = $user->getInstituicaoId();

				$podscasts = PodcastQuery::create('p')
					->filterByAtivo(true)
					->orderByDataCadastro(Criteria::DESC)
					->joinPodcastIgreja('pi')
					->where('pi.IgrejaId = ?', $churchId)
					->select('p.Id')
					->find();

				if(count($podscasts) > 0)
				{
					foreach($podscasts as $podcastId)
					{
						$podcast = PodcastQuery::create()->findPk($podcastId);

						$sucesso->podcasts[] = array(
							'id' => $podcast->getId(),
							'titulo' => $podcast->getTitulo(),
							'descricao' => $podcast->getDescricao(),
							'data' => $podcast->getDataCadastro('d/m/Y'),
							'urlAudio' => $podcast->getAudio()
						);
					}

				}
				else
				{
					$erro->mensagem = 'Nenhum podcast foi localizado';
					$erro->codigo = -2003;
				}
			}
			else
			{
				$erro->mensagem = 'Token de usuário inválido';
				$erro->codigo = -2001;
			}
		}
		else
		{
			$erro->mensagem = 'Parâmetros obrigatórios não definidos';
			$erro->codigo = -2000;
		}
	}

	/**
	 * Lista os vídeos cadastrados para o usuário informado.
	 * Faixa de erro 2000 - 2099.
	 *
	 * @param stdClass $token Token do usuário.
	 * @param stdClass $sucesso Retorna objeto com as informações solicitadas.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Bruno Cordeiro
	 */
	public function listarVideos($token, &$sucesso, &$erro)
	{
		if(!empty($token))
		{
			$user = UsuarioQuery::create()->findOneByToken($token);

			if(!empty($user))
			{
				$churchId = $user->getFilialId();
				$sucesso = new stdClass();
				$sucesso->videos = array();

				if(empty($churchId))
					$churchId = $user->getInstituicaoId();

				$videos = VideoQuery::create('v')
					->filterByAtivo(true)
					->orderByDataCadastro(Criteria::DESC)
					->joinVideoIgreja('vi')
					->where('vi.IgrejaId = ?', $churchId)
					->select('v.Id')
					->find();

				if(count($videos) > 0)
				{
					foreach($videos as $videoId)
					{
						$video = VideoQuery::create()->findPk($videoId);

						$sucesso->videos[] = array(
							'id' => $video->getId(),
							'titulo' => $video->getTitulo(),
							'descricao' => $video->getDescricao(),
							'data' => $video->getDataCadastro('d/m/Y'),
							'poster' => $video->getPoster(),
							'urlVideo' => Text::split('/', $video->getUrl())->getLast()
						);
					}
				}
				else
				{
					$erro->mensagem = 'Nenhum vídeo foi localizado';
					$erro->codigo = -2003;
				}
			}
			else
			{
				$erro->mensagem = 'Token de usuário inválido';
				$erro->codigo = -2001;
			}
		}
		else
		{
			$erro->mensagem = 'Parâmetros obrigatórios não definidos';
			$erro->codigo = -2000;
		}
	}

	/**
	 * Lista as pgs para o usuário informado.
	 * Faixa de erro 2100 - 2199.
	 *
	 * @param stdClass $token Token do usuário.
	 * @param stdClass $sucesso Retorna objeto com as informações solicitadas.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Bruno Cordeiro
	 */
	public function listarPgs($token, &$sucesso, &$erro)
	{
		if(!empty($token))
		{
			$user = UsuarioQuery::create()->findOneByToken($token);

			if(!empty($user))
			{
				$churchId = $user->getFilialId();
				$sucesso = new stdClass();
				$sucesso->pgs = array();

				if(empty($churchId))
					$churchId = $user->getInstituicaoId();

				$pgs = PgQuery::create()
					->filterByIgrejaResponsavelId($churchId)
					->filterByAtiva(true)
					->find();

				if(!$pgs->isEmpty())
				{
					foreach($pgs as $pg)
					{
						$pg instanceof Pg;
						$address = $pg->getEndereco();
						$membros = $pg->getPgUsuarios();
						$membersObj = array();

						foreach($membros as $member)
						{
							$membersObj[] = array(
								'nome' => $member->getUsuario()->getNome(),
								'urlImagem' => $member->getUsuario()->getImagem('perfil', true),
								'cargo' => $member->getCargo()
							);
						}

						$sucesso->pgs[] = array(
							'id' => $pg->getId(),
							'titulo' => $pg->getTitulo(),
							'hora' => $pg->getHora('H:m'),
							'descricao' => $pg->getDescricao(),
							'data' => $pg->getDataCadastro('d/m/Y'),
							'membros' => $membersObj,
							'endereco' => array(
								'cidade' => $address->getCidade()->getNome(),
								'logradouro' => $address->getLogradouro(),
								'bairro' => $address->getBairro(),
								'cep' => $address->getCep(),
								'numero' => $address->getNumero(),
								'longitude' => $address->getLongitude(),
								'latitude' => $address->getLatitude()
							)
						);
					}
				}
				else
				{
					$erro->mensagem = 'Nenhuma pg foi encontrada';
					$erro->codigo = -2103;
				}
			}
			else
			{
				$erro->mensagem = 'Token de usuário inválido';
				$erro->codigo = -2101;
			}
		}
		else
		{
			$erro->mensagem = 'Parâmetros obrigatórios não definidos';
			$erro->codigo = -2100;
		}
	}

	/**
	 * Lista os ministérios para o usuário informado.
	 * Faixa de erro 2200 - 2299.
	 *
	 * @param stdClass $token Token do usuário.
	 * @param stdClass $sucesso Retorna objeto com as informações solicitadas.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Bruno Cordeiro
	 */
	public function listarMinisterios($token, &$sucesso, &$erro)
	{
		if(!empty($token))
		{
			$user = UsuarioQuery::create()->findOneByToken($token);

			if(!empty($user))
			{
				$churchId = $user->getFilialId();
				$sucesso = new stdClass();
				$sucesso->ministerios = array();

				if(empty($churchId))
					$churchId = $user->getInstituicaoId();

				$ministries = MinisterioQuery::create()
					->filterByAtivo(true)
					->filterByIgrejaPertencenteId($churchId)
					->find();

				if(!$ministries->isEmpty())
				{
					foreach($ministries as $ministry)
					{
						$lideres = $ministry->getLiderMinisterios();
						$liders = array();

						if(!$lideres->isEmpty())
						{
							foreach($lideres as $lider)
							{
								$liders[] = array(
									'nome' => $lider->getUsuario()->getNome(),
									'urlImagem' => $lider->getUsuario()->getImagem('perfil', true),
									'cargo' => $lider->getCargo()
								);
							}
						}

						$sucesso->ministerios[] = array(
							'id' => $ministry->getId(),
							'nome' => $ministry->getNome(),
							'descricao' => $ministry->getDescricao(),
							'dataCadastro' => $ministry->getDataCadastro('d/m/Y'),
							'urlImagem' => $ministry->getImagem(),
							'lideres' => $liders
						);
					}
				}
				else
				{
					$erro->mensagem = 'Nenhum ministério foi encontrado';
					$erro->codigo = -2203;
				}
			}
			else
			{
				$erro->mensagem = 'Token de usuário inválido';
				$erro->codigo = -2201;
			}
		}
		else
		{
			$erro->mensagem = 'Parâmetros obrigatórios não definidos';
			$erro->codigo = -2200;
		}
	}

	/**
	 * Lista os ministérios para o usuário informado.
	 * Faixa de erro 2300 - 2399.
	 *
	 * @param stdClass $dados Dados obrigatório para salvar um novo pedido de
	 * oração.
	 * @param stdClass $token Token do usuário.
	 * @param stdClass $sucesso Retorna objeto com as informações solicitadas.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Bruno Cordeiro
	 */
	public function salvarPedidoOracao($dados, $token, &$sucesso, &$erro)
	{
		if(!empty($token))
		{
			$user = UsuarioQuery::create()->findOneByToken($token);

			if(!empty($user))
			{
				$descricao		= $dados->descricao;
				$telefone		= $dados->telefone;
				$telefoneUser	= $user->getTelefone();

				/*
				 * Atualiza o telefone do usuário caso o mesmo não possua
				 * nenhum salvo em seu perfil.
				 */
				if(empty($telefoneUser))
				{
					$user->setTelefone($telefone);
					$user->save();
				}

				$prayerResquest = new PedidoOracao;
				$prayerResquest->setUsuarioRelatedBySolicitanteId($user);
				$prayerResquest->setDescricao($descricao);
				$prayerResquest->setDataPedido(time());
				$prayerResquest->setAtendida(false);
				$prayerResquest->setInstituicaoId($user->getInstituicaoId());
				$prayerResquest->save();

				$sucesso = new stdClass();
				$sucesso->sucesso = true;
			}
			else
			{
				$erro->mensagem = 'Token de usuário inválido';
				$erro->codigo = -2301;
			}
		}
		else
		{
			$erro->mensagem = 'Parâmetros obrigatórios não definidos';
			$erro->codigo = -2300;
		}
	}

	/**
	 * Apresenta as informações da instuição ou filial ao qual o usuário é
	 * cadastrado.
	 * Faixa de erro 2400 - 2499.
	 *
	 * @param stdClass $token Token do usuário.
	 * @param stdClass $sucesso Retorna objeto com as informações solicitadas.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Bruno Cordeiro
	 */
	public function minhaInstituicao($token, &$sucesso, &$erro)
	{
		if(!empty($token))
		{
			$user = UsuarioQuery::create()->findOneByToken($token);

			if(!empty($user))
			{
				$churchId = $user->getFilialId();

				if(empty($churchId))
					$churchId = $user->getInstituicaoId();

				if($churchId)
				{
					$church = IgrejaQuery::create()->findPk($churchId);

					$sucesso = new stdClass();

					/*
					 * Informações básicas
					 */
					$sucesso->nomeFantasia		= $church->getNomeFantasia();
					$sucesso->dataCadastrado	= $church->getDataCadastro('d/m/Y');
					$sucesso->razaoSocial		= $church->getRazaoSocial();
					$sucesso->email				= $church->getEmail();
					$sucesso->telefone			= $church->getTelefone();
					$sucesso->cnpj				= $church->getCnpj();
					$sucesso->site				= $church->getSite();
					$sucesso->urlImagem			= $church->getImagem();

					/*
					 * Sobre nós
					 */
					$sucesso->sobreNos	= $church->getSobreNos();
					$sucesso->missao	= $church->getMissao();
					$sucesso->visao		= $church->getVisao();
					$sucesso->valores	= $church->getValores();

					/*
					 * Endereço
					 */
					$sucesso->endereco = $church->getEnderecoFormatado();
				}
				else
				{
					$erro->mensagem = 'Nenhuma instituição localizada para o usuário';
					$erro->codigo = -2402;
				}
			}
			else
			{
				$erro->mensagem = 'Token de usuário inválido';
				$erro->codigo = -2401;
			}
		}
		else
		{
			$erro->mensagem = 'Parâmetros obrigatórios não definidos';
			$erro->codigo = -2400;
		}
	}

	/**
	 * Lista a instituição e todas as suas filiais.
	 * Faixa de erro 2500 - 2599.
	 *
	 * @param stdClass $token Token do usuário.
	 * @param stdClass $sucesso Retorna objeto com as informações solicitadas.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Bruno Cordeiro
	 */
	public function listarInstituicaoFiliais($token, &$sucesso, &$erro)
	{
		if(!empty($token))
		{
			$user = UsuarioQuery::create()->findOneByToken($token);

			if(!empty($user))
			{
				$allChurchs = IgrejaQuery::getAllByUserProfile($user)->find();

				if(!$allChurchs->isEmpty())
				{
					$sucesso = new stdClass();
					$sucesso->instituicaoFiliais = array();

					foreach($allChurchs as $church)
					{
						$sucesso->instituicaoFiliais[] = array(
							'id' => $church->getId(),
							'nome' => $church->getNomeFantasia(),
							'tipo' => $church->getTipo()
						);
					}
				}
				else
				{
					$erro->mensagem = 'Nenhuma instituição ou filial foi localizada para o usuário';
					$erro->codigo = -2502;
				}
			}
			else
			{
				$erro->mensagem = 'Token de usuário inválido';
				$erro->codigo = -2501;
			}
		}
		else
		{
			$erro->mensagem = 'Parâmetros obrigatórios não definidos';
			$erro->codigo = -2500;
		}
	}

	/**
	 * Cria o cadastro do membro.
	 * Faixa de erro 2600 - 2699.
	 *
	 * @param stdClass $dados Dados usados para atualziar o cadastro do membro.
	 * @param stdClass $token Token do usuário.
	 * @param stdClass $sucesso Retorna objeto com as informações solicitadas.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Bruno Cordeiro
	 */
	public function cadastrarMembro($dados, $token, &$sucesso, &$erro)
	{
		if(!empty($token))
		{
			$user = UsuarioQuery::create()->findOneByToken($token);

			if(!empty($user))
			{
				$notHasMember = $user->getMembroId();

				if(empty($notHasMember))
				{
					$member = new Membro;

					/*
					 * Informações básicas.
					 */
					$member->setNomeCompleto(isset($dados->nomeCompleto) ? $dados->nomeCompleto : null);
					$member->setRg(isset($dados->rg) ? $dados->rg : null);
					$member->setCpf(isset($dados->cpf) ? $dados->cpf : null);
					$member->setSexo(isset($dados->sexo) ? $dados->sexo : null);
					$member->setMembroUsuarioId($user->getId());
					$member->setEmail(isset($dados->email) ? $dados->email : null);
					$member->setTelefoneResidencial(isset($dados->telefoneResidencial) ? $dados->telefoneResidencial : null);
					$member->setTelefoneCelular(isset($dados->telefoneCelular) ? $dados->telefoneCelular : null);
					$member->setProfissao(isset($dados->profissao) ? $dados->profissao : null);

					/*
					 * Local nascimento.
					 */
					$member->setCidadeNaturalidadeId(isset($dados->cidadeNaturalidadeId) ? $dados->cidadeNaturalidadeId : null);
					$member->setDataNascimento(isset($dados->dataNascimento) ? Utils::formatDateDb($dados->dataNascimento) : null);

					/*
					 * Igreja
					 */
					$member->setBatizado(isset($dados->batizado) ? $dados->batizado : null);
					$member->setDataMembro(isset($dados->dataMembro) ? Utils::formatDateDb($dados->dataMembro) : null);
					$member->setFilialId(isset($dados->filialId) ? $dados->filialId : null);
					$member->setCristao(isset($dados->cristao) ? $dados->cristao : null);
					$member->setCargoIgreja(isset($dados->cargoIgreja) ? $dados->cargoIgreja : null);

					/*
					 * PG's.
					 */
					$member->setParticipaPg(isset($dados->participaPg) ? $dados->participaPg : null);
					$member->setNomePg(isset($dados->nomePg) ? $dados->nomePg : null);

					/*
					 * Igreja anterior
					 */
					$member->setIgrejaOrigem(isset($dados->nomeIgrejaOrigem) ? $dados->nomeIgrejaOrigem : null);
					$member->setTelefoneIgrejaOrigem(isset($dados->telefoneIgrejaOrigem) ? $dados->telefoneIgrejaOrigem : null);
					$member->setPastorIgrejaOrigem(isset($dados->pastorIgrejaOrigem) ? $dados->pastorIgrejaOrigem : null);
					$member->setNomeAntigoMinisterio(isset($dados->nomeAntigoMinisterio) ? $dados->nomeAntigoMinisterio : null);
					$member->setExperienciaOutrasIgrejas(isset($dados->experienciaOutrasIgrejas) ? $dados->experienciaOutrasIgrejas : null);

					/*
					 * Ministerios.
					 */
					$member->setPossuiMinisterio(isset($dados->possuiMinisterio) ? $dados->possuiMinisterio : null);
					$member->setInteresseMinisterios(isset($dados->interessesMinisterio) ? $dados->interessesMinisterio : null);

					/*
					 * Famíla
					 */
					$member->setEstadoCivil(isset($dados->estadoCivil) ? $dados->estadoCivil : null);
					$member->setNomeConjunge(isset($dados->nomeConjuge) ? $dados->nomeConjuge : null);
					$member->setNomePai(isset($dados->nomePai) ? $dados->nomePai : null);
					$member->setNomeMae(isset($dados->nomeMae) ? $dados->nomeMae : null);

					/*
					 * Endereço.
					 */
					$address = new Endereco;
					$address->setCep(isset($dados->cep) ? $dados->cep : null);
					$address->setNumero(isset($dados->numero) ? $dados->numero : null);
					$address->setComplemento(isset($dados->complemento) ? $dados->complemento : null);
					$address->setLogradouro(isset($dados->logradouro) ? $dados->logradouro : null);
					$address->setCidadeId(isset($dados->cidadeId) ? $dados->cidadeId : null);
					$address->setBairro(isset($dados->bairro) ? $dados->bairro : null);
					$member->setEndereco($address);

					/*
					 * Informações salvas automaticamente.
					 */
					$member->setInstituicaoId($user->getInstituicaoId());
					$member->setDataCadastro(Date::today('Y-m-d'));
					$member->setAtivo(true);
					$member->save();

					/*
					 * Filhos do membro.
					 */
					if(count($dados->filhos) > 0)
					{
						foreach($dados->filhos as $filho)
						{
							$childMember = new FilhoMembro;
							$childMember->setMembro($member);
							$childMember->setNome($filho->nomeFilho);
							$childMember->setDataNascimento(Utils::formatDateDb($filho->nascimentoFilho));
							$childMember->setCristao($filho->filhoCristao);
							$childMember->save();
						}
					}

					/*
					 * Relaciona o usuário do membro a filial cadastrada.
					 */
					$user->setMembroId($member->getId());

					if(isset($dados->filialId) && !empty($dados->filialId))
						$user->setFilialId($dados->filialId);

					$user->save();

					$sucesso = new stdClass();
					$sucesso->sucesso = true;
					$sucesso->mensagem = 'Membro cadastrado com sucesso';
				}
				else
				{
					$erro->mensagem = 'Já existe um membro cadastrado para o usuário informado';
					$erro->codigo = -2602;
				}
			}
			else
			{
				$erro->mensagem = 'Token de usuário inválido';
				$erro->codigo = -2601;
			}
		}
		else
		{
			$erro->mensagem = 'Parâmetros obrigatórios não definidos';
			$erro->codigo = -2600;
		}
	}

	/**
	 * Atualiza o cadastro do membro no banco de dados.
	 * Faixa de erro 2700 - 2799.
	 *
	 * @param stdClass $dados Dados usados para efetuar o cadastro do nono
	 * membro.
	 * @param stdClass $token Token do usuário.
	 * @param stdClass $sucesso Retorna objeto com as informações solicitadas.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Bruno Cordeiro
	 */
	public function atualizarMembro($dados, $token, &$sucesso, &$erro)
	{
		if(!empty($token))
		{
			$user = UsuarioQuery::create()->findOneByToken($token);

			if(!empty($user))
			{
				$notHasMember = $user->getMembroId();

				if(!empty($notHasMember))
				{
					$member = $user->getMembroRelatedByMembroId();

					/*
					 * Informações básicas.
					 */
					$member->setNomeCompleto(isset($dados->nomeCompleto) ? $dados->nomeCompleto : null);
					$member->setRg(isset($dados->rg) ? $dados->rg : null);
					$member->setCpf(isset($dados->cpf) ? $dados->cpf : null);
					$member->setSexo(isset($dados->sexo) ? $dados->sexo : null);
					$member->setMembroUsuarioId($user->getId());
					$member->setEmail(isset($dados->email) ? $dados->email : null);
					$member->setTelefoneResidencial(isset($dados->telefoneResidencial) ? $dados->telefoneResidencial : null);
					$member->setTelefoneCelular(isset($dados->telefoneCelular) ? $dados->telefoneCelular : null);
					$member->setProfissao(isset($dados->profissao) ? $dados->profissao : null);

					/*
					 * Local nascimento.
					 */
					$member->setCidadeNaturalidadeId(isset($dados->cidadeNaturalidadeId) ? $dados->cidadeNaturalidadeId : null);
					$member->setDataNascimento(isset($dados->dataNascimento) ? Utils::formatDateDb($dados->dataNascimento) : null);

					/*
					 * Igreja
					 */
					$member->setBatizado(isset($dados->batizado) ? $dados->batizado : null);
					$member->setDataMembro(isset($dados->dataMembro) ? Utils::formatDateDb($dados->dataMembro) : null);
					$member->setFilialId(isset($dados->filialId) ? $dados->filialId : null);
					$member->setCristao(isset($dados->cristao) ? $dados->cristao : null);
					$member->setCargoIgreja(isset($dados->cargoIgreja) ? $dados->cargoIgreja : null);

					/*
					 * PG's.
					 */
					$member->setParticipaPg(isset($dados->participaPg) ? $dados->participaPg : null);
					$member->setNomePg(isset($dados->nomePg) ? $dados->nomePg : null);

					/*
					 * Igreja anterior
					 */
					$member->setIgrejaOrigem(isset($dados->nomeIgrejaOrigem) ? $dados->nomeIgrejaOrigem : null);
					$member->setTelefoneIgrejaOrigem(isset($dados->telefoneIgrejaOrigem) ? $dados->telefoneIgrejaOrigem : null);
					$member->setPastorIgrejaOrigem(isset($dados->pastorIgrejaOrigem) ? $dados->pastorIgrejaOrigem : null);
					$member->setNomeAntigoMinisterio(isset($dados->nomeAntigoMinisterio) ? $dados->nomeAntigoMinisterio : null);
					$member->setExperienciaOutrasIgrejas(isset($dados->experienciaOutrasIgrejas) ? $dados->experienciaOutrasIgrejas : null);

					/*
					 * Ministerios.
					 */
					$member->setPossuiMinisterio(isset($dados->possuiMinisterio) ? $dados->possuiMinisterio : null);
					$member->setInteresseMinisterios(isset($dados->interessesMinisterio) ? $dados->interessesMinisterio : null);

					/*
					 * Famíla
					 */
					$member->setEstadoCivil(isset($dados->estadoCivil) ? $dados->estadoCivil : null);
					$member->setNomeConjunge(isset($dados->nomeConjuge) ? $dados->nomeConjuge : null);
					$member->setNomePai(isset($dados->nomePai) ? $dados->nomePai : null);
					$member->setNomeMae(isset($dados->nomeMae) ? $dados->nomeMae : null);

					/*
					 * Endereço.
					 */
					$address = new Endereco;
					$addressId = $member->getEnderecoId();

					if(!empty($addressId))
						$address = $member->getEndereco();

					$nomeCidade = $dados->localidade;

					/*
					 * Se existir a cidade seta o id se não, cria uma nova.
					 */
					$uf = UfQuery::create()->findOneBySigla(preg_replace('/\s+/', '', $dados->uf));

					$cidade = CidadeQuery::create()
						->_if(!empty($uf))
							->filterByUf($uf)
						->_endif()
						->findOneBySlug(Text::slug($nomeCidade));

					/*
					 * Se for uma cidade que não esteja na lista, adiciona no
					 * banco.
					 */
					if(empty($cidade))
					{
						$cidade = new Cidade;
						$cidade->setUf($uf);
						$cidade->setNome($nomeCidade);
						$cidade->setSlug(Text::slug($nomeCidade));
						$cidade->save();
					}

					$address->setCep(isset($dados->cep) ? preg_replace("/[^0-9]/", "", $dados->cep) : null);
					$address->setNumero(isset($dados->numero) ? $dados->numero : null);
					$address->setComplemento(isset($dados->complemento) ? $dados->complemento : null);
					$address->setLogradouro(isset($dados->logradouro) ? $dados->logradouro : null);
					$address->setCidadeId($cidade->getId());
					$address->setBairro(isset($dados->bairro) ? $dados->bairro : null);
					$member->setEndereco($address);

					$member->save();

					/*
					 * Filhos do membro.
					 */
					$nomesFilho = isset($dados->nomeFilho) ? $dados->nomeFilho : null;
					FilhoMembroQuery::create()->filterByMembro($member)->delete();

					if(count($nomesFilho) > 0)
					{
						$nascimentosFilho = isset($dados->nascimentoFilho) ? $dados->nascimentoFilho : null;
						$filhoCristao = isset($dados->filhoCristao) ? $dados->filhoCristao : null;

						foreach($nomesFilho as $i => $nomeFilho)
						{
							$childMember = new FilhoMembro;
							$childMember->setMembro($member);
							$childMember->setNome($nomeFilho);
							$childMember->setDataNascimento(Utils::formatDateDb($nascimentosFilho[$i]));
							$childMember->setCristao($filhoCristao[$i]);
							$childMember->save();
						}
					}

					if(isset($dados->filialId) && !empty($dados->filialId))
						$user->setFilialId($dados->filialId);

					$user->save();

					$sucesso = new stdClass();
					$sucesso->sucesso = true;
					$sucesso->mensagem = 'Membro atualizado com sucesso';
				}
				else
				{
					$erro->mensagem = 'Nenhum cadastro de membro encontrado para o usuário informado.';
					$erro->codigo = -2702;
				}
			}
			else
			{
				$erro->mensagem = 'Token de usuário inválido';
				$erro->codigo = -2701;
			}
		}
		else
		{
			$erro->mensagem = 'Parâmetros obrigatórios não definidos';
			$erro->codigo = -2700;
		}
	}

	/**
	 * Recupera o cadastro do membro no banco de dados.
	 * Faixa de erro 2700 - 2799.
	 *
	 * @param stdClass $sucesso Dados obrigatório para salvar um novo pedido de
	 * oração.
	 * @param stdClass $token Token do usuário.
	 * @param stdClass $sucesso Retorna objeto com as informações solicitadas.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Bruno Cordeiro
	 */
	public function recuperarMembro($token, &$sucesso, &$erro)
	{
		if(!empty($token))
		{
			$user = UsuarioQuery::create()->findOneByToken($token);

			if(!empty($user))
			{
				$notHasMember = $user->getMembroId();

				if(!empty($notHasMember))
				{
					$sucesso = new stdClass();
					$member = $user->getMembroRelatedByMembroId();

					/*
					 * Informações básicas.
					 */
					$sucesso->nomeCompleto			= $member->getNomeCompleto();
					$sucesso->rg					= $member->getRg();
					$sucesso->cpf					= $member->getCpf();
					$sucesso->sexo					= $member->getSexo();
					$sucesso->email					= $member->getEmail();
					$sucesso->telefoneResidencial	= $member->getTelefoneResidencial();
					$sucesso->telefoneCelular		= $member->getTelefoneCelular();
					$sucesso->profissao				= $member->getProfissao();
					$sucesso->estadoCivil			= $member->getEstadoCivil();

					/*
					 * Local nascimento.
					 */
					$sucesso->cidadeNaturalidadeId		= $member->getCidadeNaturalidadeId();
					$sucesso->ufNaturalidadeId			= $member->getCidade()->getUfId();
					$sucesso->dataNascimento			= $member->getDataNascimento('d/m/Y');

					/*
					 * Igreja
					 */
					$sucesso->batizado		= $member->getBatizado();
					$sucesso->dataMembro	= $member->getDataMembro();
					$sucesso->filialId		= $member->getFilialId();
					$sucesso->cristao		= $member->getCristao();
					$sucesso->cargoIgreja	= $member->getCargoIgreja();

					/*
					 * PG's.
					 */
					$sucesso->participaPg	= $member->getParticipaPg();
					$sucesso->nomePg		= $member->getNomePg();

					/*
					 * Igreja anterior
					 */
					$sucesso->nomeIgrejaOrigem			= $member->getIgrejaOrigem();
					$sucesso->telefoneIgrejaOrigem		= $member->getTelefoneIgrejaOrigem();
					$sucesso->pastorIgrejaOrigem		= $member->getPastorIgrejaOrigem();
					$sucesso->nomeAntigoMinisterio		= $member->getNomeAntigoMinisterio();
					$sucesso->experienciaOutrasIgrejas	= $member->getExperienciaOutrasIgrejas();

					/*
					 * Ministerios.
					 */
					$sucesso->possuiMinisterio		= $member->getPossuiMinisterio();
					$sucesso->interessesMinisterio	= $member->getInteresseMinisterios();

					/*
					 * Famíla
					 */
					$sucesso->interessesMinisterio		= $member->getEstadoCivil();
					$sucesso->nomeConjuge				= $member->getNomeConjunge();
					$sucesso->nomePai					= $member->getNomePai();
					$sucesso->nomeMae					= $member->getNomeMae();

					/*
					 * Endereço.
					 */
					$sucesso->endereco = $member->getEnderecoFormatado();

					/*
					 * Filhos do membro.
					 */
					$sucesso->filhos = array();
					$childs = $member->getFilhoMembros();

					if(!$childs->isEmpty())
					{
						foreach($childs as $child)
						{
							$sucesso->filhos[] = array(
								'nomeFilho' => $child->getNome(),
								'nascimentoFilho' => $child->getDataNascimento('d/m/Y'),
								'filhoCristao' => $child->getCristao()
							);
						}
					}
				}
				else
				{
					$erro->mensagem = 'Nenhum cadastro de membro encontrado para o usuário informado.';
					$erro->codigo = -2702;
				}
			}
			else
			{
				$erro->mensagem = 'Token de usuário inválido';
				$erro->codigo = -2701;
			}
		}
		else
		{
			$erro->mensagem = 'Parâmetros obrigatórios não definidos';
			$erro->codigo = -2700;
		}
	}

	/**
	 * Função que verifica a versão do apk.
	 *
	 * @param stdClass $sucesso Retorna objetos solicitados.
	 * @param stdClass $erro Retorna mensagens de erro.
	 * @author Hugo Minari.
	 */
	protected function versaoApk(&$sucesso, &$erro)
	{
		$versaoApp = LocalConfiguration::get('api.versaoapk');

		if(!empty($versaoApp))
		{
			$sucesso = new stdClass();
			$sucesso->versao = $versaoApp;
		}
		else
		{
			$erro->mensagem = 'Não foi possível verificar a versão';
			$erro->codigo = -0000;
		}
	}

	/**
	 * Função responsável por enviar a resposta para o cliente. Todo tratamento
	 * é feito no método sincronizar antes deste método ser chamado.
	 *
	 * @param mixed $answer Resposta a ser enviada para o cliente.
	 * @return bool Retorna se a resposta foi enviada ou não.
	 */
	protected function resposta($answer)
	{
		if(!empty($answer))
		{
			$encryptedAnswer = null;
			$responseStatus = 200;

			try
			{
				$key = base64_decode(LocalConfiguration::get('api.privatekey'));
				$encryptedAnswer = Crypto::encrypt(json_encode($answer), $key);
				$encryptedAnswer = base64_encode($encryptedAnswer);
			}
			catch(CryptException\CryptoTestFailedException $ex)
			{
				Report::sendError($ex);
				$encryptedAnswer = '';
				$responseStatus = 500;
			}
			catch(CryptException\CannotPerformOperationException $ex)
			{
				Report::sendError($ex);
				$encryptedAnswer = '';
				$responseStatus = 500;
			}

			$this->response->setStatusCode($responseStatus);
			$this->response->setContentType('text/plain');
			$this->response->send($encryptedAnswer);
			$respostaEnviada = true;
		}
		else
		{
			$respostaEnviada = false;
		}

		return $respostaEnviada;
	}

	/**
	 * Função que simula uma requisição para o metodo sincronizar.
	 */
	public function teste(ArrayList $params = null)
	{
		if($params[0] == 'mypass')
		{
			if(isset($params[1]) && $params[1] == 'decode')
			{
				$key = base64_decode(LocalConfiguration::get('api.privatekey'));
				$secret = LocalConfiguration::get('api.secretkey');
				$data = '';

				$responseCiphertext = base64_decode($data);
				$json = Crypto::decrypt($responseCiphertext, $key);
				$responseData = json_decode($json);

				echo '<pre>' . print_r($responseData, true) . '</pre>';
			}
			else
			{

				try
				{
					$acao = array(
						/* #0 */ 'login',
						/* #1 */ 'recuperar_senha',
						/* #2 */ 'cadastro',
						/* #3 */ 'listar_cidades',
						/* #4 */ 'listar_filmes',
						/* #5 */ 'listar_agendas',
						/* #6 */ 'listar_noticias',
						/* #7 */ 'listar_podcasts',
						/* #8 */ 'listar_videos',
						/* #9 */ 'listar_pgs',
						/* #10 */ 'listar_ministerios',
						/* #11 */ 'salvar_pedido_oracao',
						/* #12 */ 'cadastrar_membro',
						/* #13 */ 'atualizar_membro,',
						/* #14 */ 'recuperar_membro',
						/* #15 */ 'listar_istituicao_filiais',
						/* #16 */ 'minha_instituicao'
					);

					$key = base64_decode(LocalConfiguration::get('api.privatekey'));
					$secret = LocalConfiguration::get('api.secretkey');
					$data = json_encode(array(
							'segredo' => $secret,
							'token' => '5b517a14a684a824857116871fe7eae3c5f0024c9f87a89e943a3c2ff47786g8',
//							'token' => '5b517a14a684a824857116871fe7eae3c5f0024c9f87a89e943a3c2dd23786f2',
							'acao' => $acao[16],
							'dados' => array(
								'usuario_id' => '220',
								'cinema_id' => '25',
								'telefone' => '61986347089',
								'descricao' => 'Descrição. Loco Translate provides in-browser editing of WordPress translation files. It also provides localization tools for developers, such as extracting strings ...',
								'iuguId' => '184B2215B3E4499298793CCE4BDE00601',
								'data_sessao' => Date::today('d/m/Y'),
								'filme_id' => '153',
								'titulo' => 'IMPORTANTE',
								'mensagem' => 'Bye GPES.',
								'nome' => 'Hugo',
								'sobrenome' => 'Minari',
								'token_firebase' => 'ebYvgzB48JA:APA91bHwnhWZwR-aWclMz9qg6LL329NraiL0SApfxElxtKDpxv5jDyBj2el52RyXxJjn8NTn4WRZUGqa6TuObD7p7BjessTxqMsJaR4w0SIkVeYHQcmjMDkiiDJYnKk41KqEZP9dfKai',
								'email'		=> 'administrador@plugdigital.com.br',
								'senha'		=> '123$qweR',
								'uf_id'		=> '7',
								'uf'		=> 's7',
								'metodo_login' => 'normal',
								'cep'		=> '72210088',

								'numeroCartao' => '4111111111111111',
								'numeroVerificacao' => '321',
								'primeiroNome' => 'bruno',
								'ultimoNome' => 'cordeiro',
								'mes' => '12',
								'ano' => '19',

	//							'facebook_id' => '3455674556345',
	//							'google_id' => '867896896',
	//							'name'		=> 'Hugo Minari Diniz',
	//							'cidade'	=> '12',
	//							'telefone'	=> '(61) 3036-4124',
	//							'avatar'	=> 'http://eibneti.com.br/wp-content/uploads/2016/05/Linux-Terminal-Commands1.jpg',
	//							'cidade_id' => '1724',
	//							'cinema_id' => '21',
	//							'cidade'	=> 'brasilia',
	//							'logradouro'=> 'logradouro',
	//							'cep'		=> '72115-085',
	//							'numero'	=> '102',
	//							'bairro'	=> 'norte',
	//							'complemento' => 'complemento',
//								'latitude'	=> '-15.200',
//								'longitude'	=> '-45.300',
	//							'comentario'=> 'Isadaihiuah niua iusd aiushd iuahsd iuahsd ui',
	//							'mensagem'	=> 'Somente testando a api de envio.',
	//							'destinatario' => array(
	//								'EWsfoXLjXTMRU2acQNCwUshUA052',
	//								'XqlZhKxzOsQo2xpLL61Si4rORQE2'
	//							)
	//							'filme_id' => '136',
	//							'cinema_id' => '21',
	//							'data_sessao' => '15/07/2016',

								'nomeCompleto' => 'Bruno Cordeiro da Silva ATUALIZADO',
								'rg' => '2085548',
								'cpf' => '05224436191',
								'sexo' => 'm',
								'email' => 'bcordeiro.dvs@gmail.com',
								'telefoneResidencial' => '6133477782',
								'telefoneCelular' => '61986347089',
								'profissao' => 'Programador',

								'cidadeNaturalidadeId' => 2587,
								'dataNascimento' => '27/09/1995',

								'batizado' => true,
								'dataMembro' => '17/08/2014',
								'filialId' => 22,
								'cristao' => true,
								'cargoIgreja' => 'Coroinha',

								'participaPg' => true,
								'nomePg' => 'Teste Nova Pg',

								'nomeIgrejaOrigem' => 'Teste Nome Igreja Origem',
								'telefoneIgrejaOrigem' => '61986347089',
								'pastorIgrejaOrigem' => 'Nome Pastor Teste',
								'nomeAntigoMinisterio' => 'Nome Antigo Ministerio',
								'experienciaOutrasIgrejas' => 'ajadalksjlakd lkajldasjkl lkaksdakljsdjklad jkalkdljkasd',

								'possuiMinisterio' => true,
								'interessesMinisterio' => 'Interesse ministerio teste',
								'estadoCivil' => 'so',
								'nomeConjuge' => 'Marilene Teste Conjuge',
								'nomePai' => 'Francisco Pereira da Silva',
								'nomeMae' => 'Esmirene Araujo Cordeiro',

								'cep' => '72210088',
								'numero' => '28',
								'complemento' => 'Complemento endereço',
								'cidadeId' => 2248,
								'bairro' => 'Ceilandia Norte',
								'logradouro' => 'Logradouro Teste 25',

								'nomeFilho' => array('Bruno Cordeiro', 'Ryan Costa'),
								'nascimentoFilho' => array('27/09/1995', '29/06/2005'),
								'filhoCristao' => array(true, false)
							)
						)
					);

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
		else
		{
			$this->pageNotFound();
		}
	}

}