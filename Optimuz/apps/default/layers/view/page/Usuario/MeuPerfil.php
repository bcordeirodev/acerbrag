<div class="page-title">
	<h3>Meu <span class="bold">Perfil</span></h3>
</div>
<form action="~/atualizar-meu-perfil" class="js-form" method="post" object-type="FormComponent">
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
							<span class="help">ex. "Fulano de Tal"</span>
							<div class="controls">
								<input type="text" name="nome" id="nome" class="form-control" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label class="form-label" for="telefone">Telefone</label>
							<div class="controls">
								<input type="tel" name="telefone" id="telefone" class="form-control" maxlength="13">
							</div>
						</div>
						<div class="form-group col-md-6">
							<label class="form-label" for="perfil-usuario">Perfil do usuario</label>
							<div class="controls">
								<select name="perfil-usuario" id="perfil-usuario" class="col-md-12 no-padding" data-search="true" object-type="HtmlSelect" object-source-member-value="id" object-source-member-text="nome" object-datasource="perfilUsuario" disabled></select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="form-label" for="email">E-mail</label>
						<span class="help">Não pode ser alterado</span>
						<div class="controls">
							<input type="email" name="email" id="email" class="form-control" readonly>
						</div>
					</div>
				</div>
			</div>
			<div class="grid simple">
				<div class="grid-title clickable no-border">
					<h4>Alteração de <span class="semi-bold">Senha</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<div class="form-group">
						<label class="form-label" for="senha">Senha atual</label>
						<span class="help">Informe sua senha atual</span>
						<div class="controls">
							<input type="password" name="senha" id="senha" class="form-control">
						</div>
					</div>
					<ul class="nav nav-pills m-t-20">
						<li class="active">
							<a href="#senha-manual">Informar senha manualmente</a>
						</li>
						<li>
							<a href="#gerador-senha">Gerar senha automaticamente</a>
						</li>
					</ul>
					<div class="tab-content">
						<div id="senha-manual" class="tab-pane active padding-5">
							<p class="text-muted">
								A senha deve ser forte, isto significa que ela
								deve incluir letras maiúsculas e minúsculas,
								números (não sequenciais como 123456) e
								símbolos.
							</p>
							<div class="form-group">
								<label class="form-label" for="nova-senha">Nova senha</label>
								<span class="help">Informe uma nova senha diferente da atual</span>
								<div class="controls">
									<input type="password" name="nova-senha" id="nova-senha" class="form-control js-pwd" autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label class="form-label" for="confirma-nova-senha">Confirme a nova senha</label>
								<span class="help">Informe sua nova senha mais uma vez</span>
								<div class="controls">
									<input type="password" name="confirma-nova-senha" id="confirma-nova-senha" class="form-control js-pwd" autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Força da senha</label>
								<span class="help">Este indicador demonstra se a senha é forte o suficiente</span>
								<div class="controls">
									<div class="progress progress-small no-radius">
										<div class="progress-bar progress-bar-danger animate-progress-bar" data-percentage="0%"></div>
									</div>
								</div>
							</div>
						</div>
						<div id="gerador-senha" class="tab-pane padding-5">
							<p class="text-muted">
								Ao gerar sua nova senha automaticamente, os campos de
								senha já serão preenchidos. A única coisa que você
								deve fazer é copiar a senha exibida abaixo e
								guardá-la em um lugar seguro.
							</p>
							<div class="form-group">
								<label class="form-label" for="js-pwd-size">Tamanho da senha</label>
								<div class="controls">
									<div class="row">
										<div class="col-md-3">
											<input type="number" id="js-pwd-size" value="8" min="8" class="form-control" autocomplete="off">
										</div>
										<div class="col-md-9">
											<a href="javascript:;" id="js-generate-pwd" class="btn btn-white"><i class="fa fa-refresh m-r-5"></i> Gerar senha</a>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label" for="js-random-pwd">Senha gerada</label>
								<span class="help">Copie a senha abaixo para um lugar seguro antes de salvar</span>
								<div class="controls">
									<input type="text" id="js-random-pwd" class="form-control text-center cursor-text js-pwd" readonly>
								</div>
							</div>
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
					<h4>Filiais <span class="semi-bold">Administradas</span></h4>
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
			<div class="pull-right">
				<a href="~/dashboard" class="btn btn-white btn-cons-md m-r-10" object-type="HtmlLink">Cancelar</a>
				<button class="btn btn-success btn-cons-md js-submit" type="submit">Salvar</button>
				<input type="hidden" id="id">
			</div>
		</div>
	</div>
</form>