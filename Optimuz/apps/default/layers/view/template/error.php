<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php echo $page->metaTags; ?>
		<title><?php echo $page->title; ?></title>
		<?php echo $page->stylesheets; ?>
		<link rel="icon" type="image/gif/png" href="~/resource/default/img/header.png">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta content="<?php echo $pageDescription; ?>" name="description">
		<meta content="Interativa Tecnologia <http://www.interativatecnologia.com.br>" name="author">
	</head>

	<body class="error-body no-top">
		<div class="error-wrapper container">
			<div class="row animated flipInY">
				<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-offset-1 col-xs-10">
					<div class="error-container" >
						<div class="error-main">
							<?php echo $page->view; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="footer">
			<div class="error-container">
<!--				<ul class="footer-links">
					<li><a href="#"></a></li>
				</ul>
				<br>
				<ul class="footer-links small-links">
					<li><a href="#"></a></li>
				</ul>
				<br>-->
				<div class="copyright">Plug3s &copy; 2017 Todos os direitos reservados</div>
			</div>
		</div>
	</body>
</html>