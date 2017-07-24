<?php



/**
 * Skeleton subclass for representing a row from the 'usuario' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.4 on:
 *
 * Sat Sep  6 02:37:20 2014
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Communikame
 */
class Usuario extends BaseUsuario {

	/**
	 * Retorna o usuário atualmente logado no sistema.
	 * @return Usuario Usuário logado. Retorna null se não houver usuário
	 * logado.
	 * @static
	 */
	public static function atual()
	{
		static $user;

		if(empty($user))
			$user = self::logado() ? UsuarioQuery::create()->findPk(SystemAccessLogin::getCurrent()->getValue('userId')) : null;

		return $user;
	}

	/**
	 * Indica se existe um usuário logado na requisição atual.
	 * @return boolean Retorna true se houver um usuário logado, ou false caso
	 * contrário.
	 * logado.
	 * @static
	 */
	public static function logado()
	{
		return SystemAccessLogin::hasSession();
	}

	/**
	 * Verifica se a senha está correta.
	 * @param type $pass Senha em texto plano. A senha será criptografada no
	 * momento da validação.
	 * @return boolean Retorna true se a senha for válida ou false caso
	 * contrário.
	 */
	public function validaSenha($pass)
	{
		return $this->getSenha() == Utils::encrypt($pass);
	}

	/**
	 * Verifica se o usuário tem uma dada permissão.
	 * @param mixed $permissao A permissão pode ser o ID da mesma, o slug, um
	 * objeto Permissao ou um array com os nomes das permissões que se deseja
	 * verificar.
	 * @return bool Retorna true se o usuário tem a permissão, ou false caso
	 * contrário.
	 */
	public function temPermissao($permissao)
	{
		$permissionId = null;
		$bool = false;

		if(is_object($permissao))
		{
			$permissionId = $permissao->getId();
		}
		elseif(is_string($permissao) && !is_numeric($permissao))
		{
			$permission = PermissaoQuery::create()->findOneBySlug($permissao);

			if($permission)
				$permissionId = $permission->getId();
		}
		elseif(is_array($permissao))
		{
			foreach($permissao as $perm)
			{
				if(!($bool = $this->temPermissao($perm)))
					break;
			}
		}
		else
		{
			$permissionId = $permissao;
		}

		if(!is_null($permissionId))
		{
			$bool = UsuarioPermissaoQuery::create()
					->filterByUsuario($this)
					->filterByPermissaoId($permissionId)
					->count() > 0;
		}

		return $bool;
	}

	/**
	 * Remove o usuário e todos os dados relacionados, incluindo o diretório do
	 * usuário.
	 * @param PropelPDO $con (opcional) Conexão com o banco de dados.
	 */
	public function delete(PropelPDO $con = null)
	{
		/*
		 * Remove as permissões
		 */
		$timeline = $this->getUsuarioPermissaos();

		foreach($timeline as $permission)
			$permission->delete();

		/*
		 * Remove o diretório
		 */
		$dirPath = $this->getDir();

		if(Dir::exists($dirPath))
			Dir::open($dirPath)->remove();

		parent::delete($con);
	}

	/**
	 * Retorna o caminho completo da imagem de perfil do usuário.
	 * @param string $nome Nome da imagem (sem extensão) dentro do diretório do
	 * usuário.
	 * @param boolean $returnUrl (opcional) Se for true retorna a URL da imagem,
	 * caso contrário retorna o caminho físico da mesma.
	 * @return string Retorna o caminho da imagem ou null caso ela não exista.
	 */
	public function getImagem($nome, $returnUrl = false)
	{
		$img = null;
		$file = File::search($this->getDir() . "{$nome}.*");

		if(!$file->isEmpty())
		{
			if($returnUrl)
				$img = Enviroment::resolveUrl("~/resource/default/img/usuarios/{$this->id}/{$file->getFirst()->getName()}");
			else
				$img = $file->getFirst()->getPath();
		}
		else
		{
			$file = File::search(Application::getCurrent()->getPath('resources') . "img/usuarios/0/{$nome}.*");

			if($returnUrl)
				$img = Enviroment::resolveUrl("~/resource/default/img/usuarios/0/{$file->getFirst()->getName()}");
			else
				$img = $file->getFirst()->getPath();
		}

		return $img;
	}

	/**
	 * Retorna o caminho completo do diretório do usuário.
	 * @return string
	 */
	public function getDir()
	{
		return Application::getCurrent()->getPath('resources') . 'img/usuarios/' . $this->getId() . '/';
	}

	/*
	 * Retona a instituição relacionada ao perfil do usuário.
	 *
	 * @return Igreja Objeto da igreja do tipo instiuição relacionado ao perfíl
	 * do usuário.
	 * @author Bruno Cordeiro
	 */
	public function getInstituicao()
	{
		$instituition = null;

		if($this->getPerfilId() == Perfil::PERFIL_INSITUICAO || $this->getPerfilId() == Perfil::PERFIL_GERENCIADOR_CONTEUDO)
		{
			$church = $this->getIgrejaRelatedByInstituicaoId();

			if($church->getTipo() == Igreja::TIPO_FILIAL && $this->getPerfilId() == Perfil::PERFIL_GERENCIADOR_CONTEUDO)
				$instituition = $church->getIgrejaRelatedByIgrejaId();
			else
				$instituition = $church;
		}

		return $instituition;
	}

	/**
	 * Cria um novo usuário.
	 *
	 * Um e-mail é enviado contendo as informações de acesso para o novo
	 * usuário, e o log é gravado na tabela de auditoria.
	 * @param string $name Nome do usuário.
	 * @param string $email E-mail do usuário (utilizado para acessar o sistema).
	 * @param string $password Senha em texto plano.
	 * @param string $cpf Cpf do usuário.
	 * @param Date $profile Tipo de perfil do usuário.
	 * @param string $phone (opcional) Telefone do usuário.
	 * @param boolean $notify (opcional) Indica se o novo usuário deve receber
	 * um e-mail de notificação com os dados de acesso. O padrão é true.
	 * @return Usuario O registro é salvo no banco de dados e retornado como um
	 * objeto <code>Usuario</code>.
	 * @static
	 */
	public static function createNew($name, $email, $password, $cpf, $profile, $phone = null, $notify = true)
	{
		$user = new Usuario;
		$user->setNome($name);
		$user->setEmail($email);
		$user->setCpf($cpf);
		$user->setPerfilId($profile);
		$user->setTelefone(Text::remove('/\D/', $phone));
		$user->setSenha(Utils::encrypt($password));
		$user->setAtivo(true);
		$user->save();

		if($notify)
		{
			$loginLink = Enviroment::resolveUrl('~/login');
			$myAccountLink = Enviroment::resolveUrl('~/meu-perfil');
			$msg = <<<MSG
<p>Uma conta de usuário foi criada para você! Abaixo seguem os dados de acesso:</p>
<p>
Usuário: {$user->getEmail()}<br>
Senha: {$password}<br>
Login: <a href="{$loginLink}">{$loginLink}</a>
</p>
<p>Você pode alterar sua senha a qualquer momento acessando a página <a href="{$myAccountLink}">Meu perfil</a>.</p>
MSG;

			Utils::sendEmail($user->getEmail(), $user->getNome(), 'Sua conta foi criada', $msg);
		}

		Auditoria::adicionar('O usuário foi cadastrado', Auditoria::LEVEL_INFO, null, null, Auditoria::TIPO_USUARIO, $user->getId());

		return $user;
	}

	/**
	 * Função para gerar um token de acesso para o usuário.
	 * @author Hugo Minari
	 */
	public function gerarToken()
	{
		if(!$this->isNew() && empty($this->token))
		{
			$token = hash('sha256', $this->email . $this->id . time());
			$this->setToken($token);
			$this->save();
		}
	}

	/**
	 * Função para gerar um token para recuperação de senha.
	 * @author Hugo Minari
	 */
	public function gerarTokenSenha()
	{
		if(empty($this->token_senha))
		{
			$token = hash('sha256', $this->email . $this->id . time());
			$this->setTokenSenha($token);
			$this->save();
		}
	}

	/**
	 * Verifica se o usuário informado via paramêtro possui o perfil de
	 * instituto.
	 *
	 * @param Usuario $user Usuário que será verificado.
	 * @return bool
	 * @static
	 */
	public static function isInstitute(Usuario $user)
	{
		return  $user->getPerfilId() == Perfil::PERFIL_INSITUICAO;
	}

	/**
	 * Verifica se o usuário informado via paramêtro possui o perfil de
	 * gerenciar de conteudo.
	 *
	 * @param Usuario $user Usuário que será verificado.
	 * @return bool
	 * @static
	 */
	public static function isContentManager(Usuario $user)
	{
		return  $user->getPerfilId() == Perfil::PERFIL_GERENCIADOR_CONTEUDO;
	}

	/**
	 * Verifica se o usuário informado via paramêtro possui o perfil de
	 * administrador do sistema.
	 *
	 * @param Usuario $user Usuário que será verificado.
	 * @return bool
	 * @static
	 */
	public static function isAdmin(Usuario $user)
	{
		return  $user->getPerfilId() == Perfil::PERFIL_ADMINISTRADOR;
	}

	/**
	 * Função para resgatar os dados de endereço do usuário. Esta função é
	 * usada apenas para usuários regular.
	 * @return stdClass Array se encontrar endereço e null se não existir.
	 * @author Hugo Minari
	 */
	public function getEnderecoFormatado()
	{
		$address	= array();
		$endereco	= $this->getEndereco();

		if(!empty($endereco))
		{
			$cidade	 = $endereco->getCidade();
			$estado  = $cidade->getUf()->getSigla();

			$address[] = array(
				'cep' => $endereco->getCep(),
				'uf' => $estado,
				'localidade' => $cidade->getNome(),
				'bairro' => $endereco->getBairro(),
				'numero' => $endereco->getNumero(),
				'logradouro' => $endereco->getLogradouro(),
				'complemento' => $endereco->getComplemento()
			);
		}
		else
		{
			$address = null;
		}

		return $address;
	}

} // Usuario