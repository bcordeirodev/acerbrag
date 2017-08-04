<div class="page-title row">
	<div class="col-md-8 no-padding">
		<i class="mdi mdi-account"></i>
		<h3>Nuevo <span class="semi-bold">Usuario</span></h3>
	</div>
	<div class="col-md-4 text-right no-padding">
		<a href="~/usuario" class="m-l-10 btn btn-white" object-type="HtmlLink"><i class="mdi mdi-arrow-left"></i> Atrás</a>
	</div>
</div>
<form action="~/usuario/salvar" class="js-form" method="post" object-type="FormComponent">
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
								<input type="text" name="dni" id="dni" class="form-control" maxlength="14" required>
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
								<input type="email" name="email" id="email" class="form-control" required>
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
			<div class="grid simple" id="box-login">
				<div class="grid-title clickable no-border">
					<h4>Información de <span class="semi-bold">Sesión</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<div class="row">
						<div class="form-group col-md-6">
							<label class="form-label" for="nome-usuario">Nombre de usuario</label>
							<i object-type="RequiredFieldIndicatorComponent"></i>
							<div class="controls">
								<input type="text" name="nome-usuario" id="nome-usuario" class="form-control" required>
							</div>
						</div>
					</div>
					<p>
						Elija cómo desea crear su contraseña.
					</p>
					<ul class="nav nav-pills m-t-20">
						<li class="active">
							<a href="#senha-manual">Informe contraseña manualmente</a>
						</li>
						<li>
							<a href="#gerador-senha">Generar contraseña automáticamente</a>
						</li>
					</ul>
					<div class="tab-content">
						<div id="senha-manual" class="tab-pane active padding-5">
							<p class="text-muted">
								La contraseña debe ser fuerte, esto significa
								que debe incluir símbolos, números
								(no secuenciales como 123456) y letras
								mayúsculas y minúsculas.
							</p>
							<div class="form-group">
								<label class="form-label" for="senha">Contraseña</label>
								<span class="help">Letras, números y símbolos</span>
								<div class="controls">
									<input type="password" name="senha" id="senha" class="form-control js-pwd" required autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label class="form-label" for="confirma-senha">Confirmar contraseña</label>
								<span class="help">Repetir la contraseña</span>
								<div class="controls">
									<input type="password" name="confirma-senha" id="confirma-senha" class="form-control js-pwd" required autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label class="form-label">Fuerza de la contraseña</label>
								<span class="help">Este indicador muestra si la contraseña es lo suficientemente fuerte</span>
								<div class="controls">
									<div class="progress progress-small no-radius">
										<div class="progress-bar progress-bar-danger animate-progress-bar" data-percentage="0%"></div>
									</div>
								</div>
							</div>
						</div>
						<div id="gerador-senha" class="tab-pane padding-5">
							<p class="text-muted">
								Al generar su contraseña automáticamente, los
								campos de contraseña ya se llenan. Lo único que
								debes hacer es copiar la contraseña que aparece
								a continuación y guárdelo en un lugar seguro.
							</p>
							<div class="form-group">
								<label class="form-label" for="js-pwd-size">Tamaño de la contraseña</label>
								<div class="controls">
									<div class="row">
										<div class="col-md-3">
											<input type="number" id="js-pwd-size" value="8" min="8" class="form-control" autocomplete="off">
										</div>
										<div class="col-md-9">
											<a href="javascript:;" id="js-generate-pwd" class="btn btn-white"><i class="fa fa-refresh m-r-5"></i>Generar contraseña</a>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="form-label" for="js-random-pwd">La contraseña generada</label>
								<span class="help">Copie la contraseña abajo en algún lugar seguro antes de guardar</span>
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
					<h4>Imagen de <span class="semi-bold">Perfil</span></h4>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="grid-body no-border">
					<div class="dropzone no-margin" data-url="~/usuario/upload-imagem">
						<div class="dz-default dz-message">
							<span><i class="mdi mdi-upload"></i>Añadir foto de perfil</span>
						</div>
						<div class="fallback">
							<input type="file" name="foto" id="foto">
						</div>
                    </div>
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
								<input type="text" name="matricula" id="matricula" class="form-control" required>
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
		</div>
	</div>
	<div class="row m-b-30">
		<div class="col-md-12">
			<div class="pull-right">
				<a href="~/usuario" class="btn btn-white btn-cons-md m-r-10" object-type="HtmlLink">Cancelar</a>
				<button class="btn btn-success btn-cons-md js-submit" type="submit">Guardar</button>
			</div>
		</div>
	</div>
</form>