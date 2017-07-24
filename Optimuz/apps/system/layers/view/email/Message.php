<!DOCTYPE html>
<html lang="<?php echo LocalConfiguration::get('page.language')?>">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=<?php echo LocalConfiguration::get('page.charset')?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title><?php echo LocalConfiguration::get('app.title')?></title>
		<style type="text/css">
			/*
			Elements --------------------------------------- */
			body{
				position:relative;
				padding:0;
				margin:0;
				font-family:Arial, Helvetica, sans-serif;
				font-size:12px;
				color:#444;
			}
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
			h1{
				color:red;
				font-weight:700;
				font-size:20px;
			}
			h1 img{
				vertical-align:bottom;
			}
			h2{
				margin:0;
				padding:0;
				font-size:14px;
			}
			h2 + p{
				margin-top:0;
				padding-top:0;
			}
			h3{
				font-size:12px;
				margin:10px;
				padding:0;
			}

			/*
			IDs --------------------------------------- */
			#page{
				position:relative;
				text-align:center;
			}
			#main{
				position:relative;
				text-align:left;
				margin:0 auto;
				padding:5px;
			}
			#content{
				margin-bottom:60px;
				word-wrap:break-word;
			}
			#message{
				border:2px solid red;
				background-color:#FFE1E1;
				padding:10px;
				color:#000;
			}
		</style>
	</head>
	<body>
		<div id="page">
			<div id="main">
				<div id="content">
					<h1 style="font-weight:700; font-size:20px; margin:0; padding:0 0 10px;">
						<?php echo $emailTitle;?>
					</h1>
					<?php echo $emailMessage;?>
				</div>
			</div>
		</div>
	</body>
</html>