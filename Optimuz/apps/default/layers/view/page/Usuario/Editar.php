<div class="page-title row">
	<div class="col-md-8 no-padding">
		<i class="mdi mdi-account"></i>
		<h3 class="m-b-0 m-t-0"></h3>
		<p class="m-l-30 p-l-5"></p>
	</div>
	<div class="col-md-4 text-right no-padding">
		<a href="~/usuario" class="m-l-10 btn btn-white" object-type="HtmlLink"><i class="mdi mdi-keyboard-backspace"></i> Voltar</a>
		<a href="" id="js-history-link" class="m-l-10 btn btn-success" object-type="HtmlLink"><i class="mdi mdi-file text-white"></i> Histórico</a>
		<a href="~/usuario/novo" id="js-new-user" class="m-l-10 btn btn-success" object-type="HtmlLink"><i class="fa fa-plus fa-white"></i> Novo</a>
	</div>
</div>
<form action="~/usuario/atualizar" class="js-form" method="post" object-type="FormComponent">
	<div class="row">
		<div class="col-md-6">
			<div class="grid simple">
				<div class="grid-title clickable no-border">
					<h4>Informações <span class="semi-bold">Básicas</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<div class="row">
						<div class="form-group col-md-12">
							<label class="form-label" for="nome">Nome</label>
							<i object-type="RequiredFieldIndicatorComponent"></i>
							<span class="help">ex. "João da Silva"</span>
							<div class="controls">
								<input type="text" name="nome" id="nome" class="form-control" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label class="form-label" for="cpf">CPF</label>
							<div class="controls">
								<input type="text" name="cpf" id="cpf" class="form-control" maxlength="14" readonly>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label class="form-label" for="telefone">Telefone</label>
							<span class="help">ex. "00 0000-0000"</span>
							<div class="controls">
								<input type="tel" name="telefone" id="telefone" class="form-control" maxlength="13">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label class="form-label" for="email">E-mail</label>
							<i object-type="RequiredFieldIndicatorComponent"></i>
							<span class="help">ex. "email@exemplo.com.br"</span>
							<div class="controls">
								<input type="email" name="email" id="email" class="form-control" readonly>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="grid simple">
				<div class="grid-title clickable no-border">
					<h4>Informações de <span class="semi-bold">Login</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<div class="form-group">
						<label class="form-label">Alteração de senha</label>
						<p class="text-muted">
							Não é possível alterar manualmente a senha do
							usuário, no entanto, é possível criar e disparar
							uma nova senha automaticamente. Clicando no botão
							abaixo, a senha será gerada aleatoriamente e enviada
							para o e-mail do usuário.
						</p>
						<div class="controls">
							<a href="" id="js-change-password" class="btn btn-white btn-cons-md m-r-10" object-type="HtmlLink"><i class="fa fa-lock m-r-5"></i> Gerar nova senha</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="grid simple">
				<div class="grid-title clickable no-border">
					<h4>Imagem de <span class="semi-bold">Perfil</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<div class="dropzone no-margin" data-url="~/usuario/upload-imagem">
						<div class="dz-default dz-message">
							<span><i class="mdi mdi-upload"></i>Adicionar foto de perfil</span>
						</div>
						<div class="fallback">
							<input type="file" name="foto" id="foto">
						</div>
                    </div>
				</div>
			</div>
			<div class="grid simple" id="box-filial">
				<div class="grid-title clickable no-border">
					<h4>Administrar <span class="semi-bold">Filiais</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<div class="row"></div>
				</div>
			</div>
			<div class="grid simple">
				<div class="grid-title clickable no-border">
					<h4>Permissões <span class="semi-bold">Disponiveis</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<div class="form-group m-b-0">
						<div class="controls">
							<div name="permissoes" class="row" object-type="CheckListComponent" object-oncreate="view::onCreatePermissionsList" data-show-slugs="false"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row m-b-30">
		<div class="col-md-12">
			<div class="pull-left">
				<button id="js-disable-user" class="btn btn-danger btn-cons-md m-r-10 hide" type="button">Desativar Usuário</button>
				<button  id="js-enable-user" class="btn btn-success btn-cons-md m-r-10 hide" type="button">Ativar Usuário</button>
				<a href="" id="js-change-user" class="btn btn-white btn-cons-md" object-type="HtmlLink"><i class="fa fa-exchange m-r-5"></i> Usar este usuário</a>
			</div>
			<div class="pull-right">
				<a href="~/usuario" class="btn btn-white btn-cons-md m-r-10" object-type="HtmlLink">Voltar</a>
				<button class="btn btn-success btn-cons-md js-submit" type="submit">Salvar alterações</button>
				<input type="hidden" name="id" id="id">
			</div>
		</div>
	</div>
</form>