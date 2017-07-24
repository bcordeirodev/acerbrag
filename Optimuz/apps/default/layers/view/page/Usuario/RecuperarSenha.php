<div class="page-title row">
	<div class="col-md-6 col-md-offset-3 m-t-30">
		<i class="fa fa-user"></i>
		<h3>Recuperação de <span class="semi-bold">Senha</span></h3>
	</div>
</div>
<form action="~/usuario/finalizar-recuperar-senha" class="js-form" method="post" object-type="FormComponent">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="grid simple">

				<div class="grid-body no-border">
					<h4>
						Senha
						<i class="text-muted m-l-5" object-type="RequiredFieldIndicatorComponent"></i>
					</h4>
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
	</div>
	<div class="row m-b-30 hide-on-success">
		<div class="col-md-6 col-md-offset-3">
			<div class="text-center">
				<input type="hidden" name="token-senha" id="token-senha">
				<a href="~/usuario" class="btn btn-white btn-cons-md m-r-10" object-type="HtmlLink">Cancelar</a>
				<button class="btn btn-success btn-cons-md js-submit" type="submit">Salvar</button>
			</div>
		</div>
	</div>
</form>