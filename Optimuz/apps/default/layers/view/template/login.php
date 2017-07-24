<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php echo $page->metaTags; ?>
		<title><?php echo $page->title; ?></title>
		<?php echo $page->stylesheets; ?>
		<link rel="icon" type="image/gif/png" href="~/resource/default/img/logo-header.png">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta content="<?php echo $pageDescription; ?>" name="description">
		<meta content="Plug Digital <http://www.plug3s.com>" name="Bruno Cordeiro">
	</head>
	<body class="no-top login-page" data-original="<?php echo $baseURL; ?>resource/default/img/login-bg.png" style="background-image: url('<?php echo $baseURL; ?>resource/default/img/login-bg.jpg')">
		<div class="container">
			<div class="row animated fadeInDownBig">
				<div class="col-md-6 col-md-offset-3">
					<div class="grid simple transparent">
						<div class="grid-body">
							<form id="login-form" class="js-form login-form" action="~/login/entrar" method="post" object-type="FormComponent" object-include-css="false">
								<div class="row">
									<div class="box-logo col-md-12">
										<img src="~/resource/default/img/logo.png" alt="Plug3s"/>
									</div>
								</div>
								<div class="js-login-container box-login">
									<div class="row">
										<div class="col-md-12">
											<div class="input-with-icon input-with-icon-large">
												<i class="mdi mdi-email"></i>
												<input name="usuario" id="usuario" type="email"  class="form-control input-lg" placeholder="Usuário" required>
											</div>
										</div>
									</div>
									<div class="row m-t-10">
										<div class="col-md-12">
											<div class="input-with-icon input-with-icon-large m-t-10">
												<i class="mdi mdi-lock"></i>
												<input name="senha" id="senha" type="password"  class="form-control input-lg" placeholder="Senha" required>
											</div>
										</div>
									</div>
									<div class="row m-t-40">
										<div class="col-md-12">
											<button type="submit" id="logar" class="btn btn-success btn-block btn-large no-margin js-submit">Entrar</button>
										</div>
									</div>
									<div class="row m-t-15">
										<div class="col-md-6">
											<div class="checkbox check-success">
												<input type="checkbox" name="persistente" id="persistente" value="1" checked>
												<label for="persistente" class="no-margin">Lembrar sessão</label>
											</div>
										</div>
										<div class="col-md-6 text-right">
											<a href="javascript:;" id="js-recover-pwd" class="display-inline-block" title="Recupe sua senha">Esqueci minha senha</a>
										</div>
									</div>
<!--									<div class="row m-t-20">
										<div class="col-md-12 text-center">
											<span class="all-caps text-white">ENTRAR COM</span>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 text-center text-white font-24">
											<a href="javascript:;" title="Logar com o facebook">
												<i class="mdi mdi-facebook ">
											</a>
											<a href="javascript:;" title="Logar com o facebook">
												<i class="mdi mdi-google-plus">
											</a>
										</div>
									</div>-->
								</div>
								<div class="js-login-container hide box-recover-psw">
									<div class="input-with-icon input-with-icon-large">
										<i class="mdi mdi-email"></i>
										<input type="text" name="email-recuperar-senha" id="email-recuperar-senha" class="form-control input-lg" placeholder="E-mail de cadastro">
									</div>
									<button id="js-recover-btn" class="btn btn-success btn-block btn-large m-t-30" type="button">Reiniciar senha</button>
									<a href="javascript:;" class="js-show-login m-t-30 js-btn-recover-psw display-inline-block" title="">Retornar ao login</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div id="messages-container" class="col-md-5 col-md-offset-3 message-login"></div>
		</div>
		<?php echo $page->scripts; ?>
	</body>
</html>