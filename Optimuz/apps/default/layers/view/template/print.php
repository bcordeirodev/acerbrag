<!DOCTYPE html>
<html lang="pt-br" moznomarginboxes mozdisallowselectionprint>
	<head>
		<?php echo $page->metaTags; ?>
		<title><?php echo $page->title; ?></title>
		<?php echo $page->stylesheets; ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta content="<?php echo $pageDescription; ?>" name="description">
		<meta content="Interativa Tecnologia <http://www.interativatecnologia.com.br>" name="author">
	</head>
	
	<body class="error-body no-top">
		<div class="container">
			<?php echo $page->view; ?>
			<div id="messages-container" class="col-md-6 col-md-offset-3 m-t-20"></div>
		</div>
		<?php echo $page->scripts; ?>
	</body>
</html>