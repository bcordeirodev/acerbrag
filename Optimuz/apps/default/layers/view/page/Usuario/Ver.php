<div class="page-title row">
	<div class="col-md-7 no-padding">
		<i class="mdi mdi-account"></i>
		<h3 class="m-b-0 m-t-0"></h3>
		<p class="m-l-30 p-l-5"></p>
	</div>
	<div class="col-md-5 text-right no-padding">
		<a href="~/usuario" class="m-l-10 btn btn-white" object-type="HtmlLink"><i class="mdi mdi-keyboard-backspace"></i> Voltar</a>
		<a href="" id="js-history-link" class="m-l-10 btn btn-success" object-type="HtmlLink"><i class="mdi mdi-file text-white"></i> Histórico</a>
		<a href="~/usuario/novo" id="js-new-user" class="m-l-10 btn btn-success" object-type="HtmlLink"><i class="mdi mdi-plus text-white"></i> Nuevo</a>
		<a href="" id="js-edit-user" class="m-l-10 btn btn-success" object-type="HtmlLink"><i class="mdi mdi-file-multiple text-white"></i> Editar</a>
	</div>
</div>
<form action="javascript:;" class="js-form" method="post" object-type="FormComponent">
	<div class="row">
		<div class="col-md-6">
			<div class="grid simple">
				<div class="grid-title clickable no-border">
					<h4>Informaciónes <span class="semi-bold">Básicas</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<div class="row">
						<div class="form-group col-md-7">
							<label class="form-label" for="nome">Nombre</label>
							<i object-type="RequiredFieldIndicatorComponent"></i>
							<div class="controls">
								<input type="text" name="nome" id="nome" class="form-control" required>
							</div>
						</div>
						<div class="form-group col-md-5">
							<label class="form-label" for="perfil">Perfil</label>
							<i object-type="RequiredFieldIndicatorComponent"></i>
							<div class="controls">
								<select name="perfil" id="perfil" class="col-md-12 no-padding" data-search="true" object-type="HtmlSelect" object-source-member-value="id" object-source-member-text="nome" object-datasource="perfis"></select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-7">
							<label class="form-label" for="dni">DNI</label>
							<i object-type="RequiredFieldIndicatorComponent"></i>
							<div class="controls">
								<input type="text" name="dni" id="dni" class="form-control" maxlength="9" required>
							</div>
						</div>
						<div class="form-group col-md-5">
							<label class="form-label" for="data-nascimento">Fecha de Nacimiento</label>
							<i object-type="RequiredFieldIndicatorComponent"></i>
							<div class="controls">
								<input type="text" name="data-nascimento" id="data-nascimento" class="form-control js-date" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12">
							<label class="form-label" for="email">E-mail</label>
							<i object-type="RequiredFieldIndicatorComponent"></i>
							<div class="controls">
								<input type="email" name="email" id="email" class="form-control" readonly>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label class="form-label" for="telefone">Teléfono</label>
							<div class="controls">
								<input type="tel" name="telefone" id="telefone" class="form-control" maxlength="13" required>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label class="form-label" for="celular">Móviles</label>
							<div class="controls">
								<input type="tel" name="celular" id="celular" class="form-control" maxlength="13" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label class="form-label" for="estado-civil">Estado civil</label>
							<i object-type="RequiredFieldIndicatorComponent"></i>
							<div class="controls">
								<select name="estado-civil" id="estado-civil" class="col-md-12 no-padding" data-search="true" object-type="HtmlSelect" object-datasource="estadoCivil"></select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">Sexo</label>
								<i object-type="RequiredFieldIndicatorComponent"></i>
								<div class="form-group">
									<div class="controls radio radio-success">
										<input id="masculino" name="sexo" type="radio" value="M" checked>
										<label class="form-label" for="masculino">Masculino</label>
										<input id="femenino" name="sexo" type="radio" value="F">
										<label class="form-label" for="femenino">Femenino</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="form-label">Tipo de acceso</label>
								<i object-type="RequiredFieldIndicatorComponent"></i>
								<div class="help">
									Sólo el usuario móvil puede validar su
									información de inicio de sesión.
								</div>
								<div class="form-group">
									<div class="controls radio radio-success">
										<input id="back-end" name="tipo-acesso" type="radio" value="B" checked>
										<label class="form-label" for="back-end">Back-end</label>
										<input id="mobile" name="tipo-acesso" type="radio" value="M">
										<label class="form-label" for="mobile">Mobile</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="grid simple">
				<div class="grid-title no-border">
					<h4> <span class="semi-bold">Dirección</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border" id="endereco-box">
					<div class="row">
						<div class="form-group col-md-5">
							<label class="form-label" for="cep">CEP</label>
							<i object-type="RequiredFieldIndicatorComponent"></i>
							<div class="controls">
								<input type="text" name="cep" id="cep" class="form-control" maxlength="9" required>
							</div>
						</div>
						<div class="form-group col-md-7">
							<label class="form-label" for="logradouro">Logradouro</label>
							<i object-type="RequiredFieldIndicatorComponent"></i>
							<div class="controls">
								<input type="text" name="logradouro" id="logradouro" class="form-control" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-7">
							<label class="form-label" for="cidade">Cuidad</label>
							<i object-type="RequiredFieldIndicatorComponent"></i>
							<div class="controls">
								<input type="text" name="cidade" id="cidade" class="form-control">
							</div>
						</div>
						<div class="form-group col-md-5">
							<label class="form-label" for="bairro">Bairro</label>
							<div class="controls">
								<input type="text" name="bairro" id="bairro" class="form-control">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-3">
							<label class="form-label" for="numero">Número</label>
							<i object-type="RequiredFieldIndicatorComponent"></i>
							<div class="controls">
								<input type="number" name="numero" id="numero" class="form-control">
							</div>
						</div>
						<div class="form-group col-md-9">
							<label class="form-label" for="complemento">Complemento</label>
							<div class="controls">
								<input type="text" name="complemento" id="complemento" class="form-control">
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
						<label class="form-label">Cambio de contraseña</label>
						<p class="text-muted">
							No se puede cambiar manualmente la contraseña del
							usuario, sin embargo, puede crear y levantar una
							nueva contraseña automáticamente. Haciendo clic en
							el botón de abajo, tu contraseña se genera
							aleatoriamente y enviado al correo electrónico del
							usuario.
						</p>
						<div class="controls">
							<a href="" id="js-change-password" class="btn btn-white btn-cons-md m-r-10" object-type="HtmlLink"><i class="fa fa-lock m-r-5"></i> Generar nueva contraseña</a>
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
					<img id="user-profile" style="max-width: 100%">
				</div>
			</div>
			<div class="grid simple">
				<div class="grid-title clickable no-border">
					<h4>Información de <span class="semi-bold">Trabajo</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<div class="row">
						<div class="form-group col-md-6">
							<label class="form-label" for="matricula">Matriculación</label>
							<i object-type="RequiredFieldIndicatorComponent"></i>
							<div class="controls">
								<input type="text" name="matricula" id="matricula" class="form-control" readonly>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label class="form-label" for="cargo">Cargo</label>
							<i object-type="RequiredFieldIndicatorComponent"></i>
							<div class="controls">
								<select name="cargo" id="cargo" class="col-md-12 no-padding" data-search="true" object-type="HtmlSelect" object-source-member-value="id" object-source-member-text="nome" object-datasource="cargos"></select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label class="form-label" for="departamento">Departamento</label>
							<i object-type="RequiredFieldIndicatorComponent"></i>
							<div class="controls">
								<select name="departamento" id="departamento" class="col-md-12 no-padding" data-search="true" object-type="HtmlSelect" object-source-member-value="id" object-source-member-text="nome" object-datasource="departamentos"></select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label class="form-label" for="data-contratacao">Fecha de contratación</label>
							<i object-type="RequiredFieldIndicatorComponent"></i>
							<div class="controls">
								<input type="text" name="data-contratacao" id="data-contratacao" class="form-control js-date" required>
							</div>
						</div>
						<div class="form-group col-md-6">
							<label class="form-label" for="data-rescisao">Fecha de rescisión</label>
							<div class="controls">
								<input type="text" name="data-rescisao" id="data-rescisao" class="form-control js-date" required>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="grid simple">
				<div class="grid-title clickable no-border">
					<h4>Permisos de <span class="semi-bold">Perfil</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<div class="form-group m-b-0">
						<div class="controls row js-box-permissions" name="permissoes"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row m-b-30">
		<div class="col-md-12">
			<div class="pull-left">
				<a href="" id="js-change-user" class="btn btn-white btn-cons-md" object-type="HtmlLink"><i class="fa fa-exchange m-r-5"></i> Usar este usuário</a>
			</div>
			<div class="pull-right">
				<input type="hidden" name="id" id="id">
			</div>
		</div>
	</div>
</form>