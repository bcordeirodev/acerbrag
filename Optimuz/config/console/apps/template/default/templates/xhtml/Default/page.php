<?php echo '<?xml version="1.0" encoding="' . $charset . '"' . "?>\n";?>
<?php if(isset($doctype) && ($doctype == 'transitional')):?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php else:?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php endif;?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
	<head>
		<?php echo $metaTags;?>
		<title><?php echo $title;?></title>
		${page_stylesheets}
	</head>
	<body>
		${page_content}
		${page_scripts}
	</body>
</html>