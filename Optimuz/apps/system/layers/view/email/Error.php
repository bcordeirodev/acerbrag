<!DOCTYPE html>
<html lang="<?php echo LocalConfiguration::get('page.language')?>">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=<?php echo LocalConfiguration::get('page.charset')?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title><?php echo LocalConfiguration::get('app.title')?></title>
		<style type="text/css">
			a,
			a:link,
			a:hover,
			a:active,
			a:visited{
				color:#1C6DA5;
				text-decoration:none;
			}
			a:hover,
			a:active{
				text-decoration:underline;
				color:#7EB0D6;
			}
			p{
				margin:5px 0;
				padding:0;
			}
			h2{
				font-size:14px;
			}
		</style>
	</head>
	<body style="position:relative; padding:0; margin:0; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#000;">
		<div style="position:relative; text-align:center;">
			<div style="position:relative; text-align:left; margin:0 auto; padding:5px;">
				<div style="margin-bottom:10px; word-wrap:break-word;">
					<div style="padding:10px; background-color:#7EB0D6">
						<div style="padding:5px; background-color:#fff">
							<div>
								<h1>
									<?php echo $errorLang->getSentence('email.title')?>
								</h1>
								<div id="message">
									<h2><?php echo $errorLang->getSentence('email.subject')?></h2>
									<p><?php echo Text::toHtml(Text::escape($errorDescription));?></p>
									
									<?php if(Enviroment::isWebEnviroment()): ?>
									<h2><?php echo $errorLang->getSentence('email.uri')?></h2>
									<p>
										URI: <?php echo $_SERVER['REQUEST_URI'];?><br>
										Host: <?php echo $_SERVER['HTTP_HOST'];?>
									</p>
									<h2><?php echo $errorLang->getSentence('email.additionalInfo')?></h2>
									<p>
										<?php echo $errorLang->getSentence('email.date')?>: <?php echo Date::now();?><br>
										<?php echo $errorLang->getSentence('email.requestAddress')?> <?php echo $_SERVER['REMOTE_ADDR'];?><br>
										Browser: <?php echo Browser::detect()->getUAString();?>
									</p>
									<?php endif; ?>
									
									<h2><?php echo $errorLang->getSentence('email.variables')?></h2>
									<h3>POST</h3>
									<p><?php var_dump($_POST);?></p>
									<h3>GET</h3>
									<p><?php var_dump($_GET);?></p>
									<h3>SESSION</h3>
									<p><?php var_dump(isset($_SESSION) ? $_SESSION : array());?></p>
									<h2>Trace</h2>
									<p><?php echo Text::escape($errorTrace);?></p>
								</div>
							</div>
						</div>
						<p style="text-align:center; background-color:#d3e0eb; padding:5px; margin:0; color:#444;">
							<?php echo $errorLang->getSentence('email.footer')?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>