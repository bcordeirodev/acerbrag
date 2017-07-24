<?php
echo '<?xml version="1.0" encoding="' . LocalConfiguration::get('page.charset') . '"' . "?>\n";
$lang = Language::getInstance('Error');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=<?php echo LocalConfiguration::get('page.charset')?>" />
		<title><?php echo LocalConfiguration::get('app.title')?></title>
		<link href="<?php echo Enviroment::getPath('baseUrl')?>resource/system/css/reset.css" type="text/css" rel="Stylesheet" media="all" />
		<link href="<?php echo Enviroment::getPath('baseUrl')?>resource/system/css/default.css" type="text/css" rel="Stylesheet" media="all" />
	</head>
	<body>
		<div id="page">
			<div id="header">
				<img src="<?php echo Enviroment::getPath('baseUrl')?>resource/system/imgs/optimuz.jpg" alt="Optimuz Framework" xml:lang="en" lang="en" />
			</div>
			<img src="<?php echo Enviroment::getPath('baseUrl')?>resource/system/imgs/top.jpg" alt="" xml:lang="en" lang="en" />
			<div id="content">
				<h1><?php echo $lang->getSentence('page.title')?></h1>
				<p>
					<?php echo $lang->getSentence('page.message')?>
				</p>
				<p>
					<?php
					$lastError = Error::getLast();
					
					if(!!$lastError)
						echo $lang->getSentence('page.errorUid', $lastError->getUid());
					?>
				</p>
				<?php
				if(isset($errorMsg))
					echo "<pre id='error-details'>{$errorMsg}</pre>";
				?>
			</div>
		</div>
		<div id="footer">
			<div>
				<div></div>
				<form action="" method="get">
					<p>
						Optimuz Framework &copy; 2011
					</p>
				</form>
				<div></div>
				<br />
			</div>
		</div>
	</body>
</html>
