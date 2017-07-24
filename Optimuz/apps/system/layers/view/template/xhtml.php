<?php echo '<?xml version="1.0" encoding="' . $page->charset . '"' . "?>\n";?>
<?php if(isset($page->doctype) && ($page->doctype == 'transitional')):?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php else:?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php endif;?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
	<head>
		<?php echo $page->metaTags;?>
		<title><?php echo $page->title;?></title>
		<?php echo $page->stylesheets;?>
	</head>
	<body>
		<div id="page">
			<div id="header">
				<img src="/resource/webConsole/imgs/optimuz.jpg" alt="Optimuz Framework" xml:lang="en" lang="en" />
			</div>
			<img src="/resource/webConsole/imgs/top.jpg" alt="" xml:lang="en" lang="en" />
			<div id="menu" object-id="menu" object-type="MenuComponent" object-onCreate="view::onCreateMenu"></div>
			<div id="content">
				<?php echo $page->view;?>
			</div>
		</div>
		<div id="footer">
			<div>
				<div></div>
				<form action="" method="get">
					<p>
						<select id="selectLanguage" object-id="selectLanguage" object-type="HtmlSelect" object-onCreate="view::onCreateLangSelect"></select>
						Optimuz Framework &copy; 2011<br />
						<?php echo $this->getController()->getLang()->getSentence('template.footer.version');?> 0.4b
					</p>
				</form>
				<div></div>
				<br />
			</div>
		</div>
		<?php echo $page->scripts;?>
	</body>
</html>