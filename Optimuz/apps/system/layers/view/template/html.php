<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<?php echo $page->metaTags;?>
		<title><?php echo $page->title;?></title>
		<?php echo $page->stylesheets;?>
	</head>
	<body>
		<div id="page">
			<div id="header">
				<img src="/resource/system/imgs/optimuz.jpg" alt="Optimuz Framework" lang="en">
			</div>
			<img src="/resource/system/imgs/top.jpg" alt="" lang="en">
			<div id="menu" object-id="menu" object-type="MenuComponent" object-onCreate="view::onCreateMenu"></div>
			<div id="content">
				<?php echo $page->view;?>
			</div>
		</div>
		<div id="footer">
			<div>
				<div></div>
				<form action="/webConsole/home/changeLanguage" method="get">
					<p>
						<select name="selectLanguage" id="selectLanguage" onchange="this.form.submit()" object-id="selectLanguage" object-type="HtmlSelect" object-onCreate="view::onCreateLangSelect"></select>
						Optimuz Framework &copy; 2011<br />
						<?php echo $this->getController()->getLang()->getSentence('template.footer.version');?> 0.4b
					</p>
				</form>
				<div></div>
				<br>
			</div>
		</div>
		<?php echo $page->scripts;?>
	</body>
</html>