<div class="page-title row">
	<div class="col-md-8 no-padding">
		<i class="mdi mdi-account"></i>
		<h3>Novo <span class="semi-bold">Usuário</span></h3>
	</div>
	<div class="col-md-4 text-right no-padding">
		<a href="~/usuario" class="m-l-10 btn btn-white" object-type="HtmlLink"><i class="mdi mdi-arrow-left"></i> Voltar</a>
	</div>
</div>
<form action="~/usuario/salvar" class="js-form" method="post" object-type="FormComponent">
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
							<i object-type="RequiredFieldIndicatorComponent"></i>
							<span class="help">ex. "000.000.000-00"</span>
							<div class="controls">
								<input type="text" name="cpf" id="cpf" class="form-control" maxlength="14" required>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label class="form-label" for="telefone">Telefone</label>
							<span class="help">ex. "00 0000-0000"</span>
							<div class="controls">
								<input type="tel" name="telefone" id="telefone" class="form-control" maxlength="13" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label class="form-label" for="email">E-mail</label>
							<i object-type="RequiredFieldIndicatorComponent"></i>
							<span class="help">ex. "email@exemplo.com.br"</span>
							<div class="controls">
								<input type="email" name="email" id="email" class="form-control" required>
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
					<p>
						Escolha abaixo como você deseja criar sua senha.
					</p>
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
								<label class="form-label" for="senha">Senha</label>
								<span class="help">Letras, números e símbolos</span>
								<div class="controls">
									<input type="password" name="senha" id="senha" class="form-control js-pwd" required autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label class="form-label" for="confirma-senha">Confirmar senha</label>
								<span class="help">Repita a senha</span>
								<div class="controls">
									<input type="password" name="confirma-senha" id="confirma-senha" class="form-control js-pwd" required autocomplete="off">
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
								Ao gerar sua senha automaticamente, os campos de
								senha já serão preenchidos. A única coisa
								que você deve fazer é copiar a senha exibida
								abaixo e guardá-la em um lugar seguro.
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
			<div class="pull-right">
				<a href="~/usuario" class="btn btn-white btn-cons-md m-r-10" object-type="HtmlLink">Cancelar</a>
				<button class="btn btn-success btn-cons-md js-submit" type="submit">Salvar</button>
			</div>
		</div>
	</div>
</form>