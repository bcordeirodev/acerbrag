<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php echo $page->metaTags; ?>
		<title><?php echo $page->title; ?></title>
		<?php echo $page->stylesheets; ?>
		<link rel="icon" type="image/gif/png" href="~/resource/default/img/logo-header.png">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta content="<?php echo $pageDescription; ?>" name="description">
		<meta content="Plug3s <http://www.plug3s.com.br>" name="Bruno Cordeiro">
	</head>

	<body object-oncreate="view::onCreateBody">
		<!-- BEGIN HEADER -->
		<div class="header navbar navbar-inverse">
			<!-- BEGIN TOP NAVIGATION BAR -->
			<div class="navbar-inner">
				<div class="header-seperation">
					<ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">
						<li class="dropdown">
							<a id="main-menu-toggle" href="#main-menu"><span class="iconset top-menu-toggle-white text-white"></span></a>
						</li>
					</ul>
					<!-- BEGIN LOGO -->
					</h1>
					<div class="text-center m-t-10">
						<img class="logo" src="~/resource/default/img/logo.png" alt="">
					</div>
					 <!--END LOGO-->
				</div>
				<!-- END RESPONSIVE MENU TOGGLER -->
				<div class="header-quick-nav">
<!--					<div class="pull-right">
						<div class="chat-toggler text-black">
							<a href="" id="prev-login-link" class="m-r-15 m-t-5 text-black">
								<i class="fa fa-times-circle text-black"></i>
								Voltar ao meu usuário
							</a>
						</div>
						<a href="~/sair" class="btn btn-white btn-small btn-out" object-type="HtmlLink">
							<i class="mdi mdi-power m-r-5"></i>Sair
						</a>
					</div>-->
					<div class="pull-right p-r-20">
						<div class="pull-right">
							<a href="~/login/sair" class="btn btn-white btn-small btn-out" object-type="HtmlLink"><i class="mdi mdi-power m-r-5"></i>Sair</a>
						</div>
						<div class="chat-toggler pull-right">
							<a href="" id="prev-login-link" class="m-r-15 m-t-5 text-black">
								<i class="mdi mdi-close-octagon mdi-16"></i>
								Voltar ao meu usuário
							</a>
						</div>
					</div>
				</div>
				<!-- END TOP NAVIGATION MENU -->
			</div>
			<!-- END TOP NAVIGATION BAR -->
		</div>
		<!-- END HEADER -->
		<!-- BEGIN CONTAINER -->
		<div class="page-container clearfix">
			<!-- BEGIN SIDEBAR -->
			<div class="page-sidebar" id="main-menu">
				<div class="user-info-wrapper text-center">
					<div class="profile-wrapper center-block">
						<a href="~/meu-perfil" data-placement="right" object-type="HtmlLink">
							<img object-type="HtmlImage" object-oncreate="view::setImagemUsuario" height="110" width="110"/>
						</a>
					</div>
					<div class="user-info display-block center-block">
						<div class="username">
							<a href="~/meu-perfil" object-type="HtmlLink" object-oncreate="view::setNomeUsuario"></a>
						</div>
						<div class="greeting" id="rule-profile"></div>
					</div>
				</div>
				<!-- BEGIN SIDEBAR MENU -->
				<ul object-type="AppMenuComponent" object-oncreate="view::onMenuCreate"></ul>
				<div class="clearfix"></div>
				<!-- END SIDEBAR MENU -->
			</div>
			<!-- END SIDEBAR -->
			<!-- BEGIN PAGE CONTAINER-->
			<div class="page-content">
				<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
				<div class="content">
					<?php echo $page->view; ?>
				</div>
				<div id="messages-container" class="message-default"></div>
			</div>
		</div>
		<?php echo $page->scripts; ?>
	</body>
</html>