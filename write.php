<!DOCTYPE PHP>
	<?php $_active="14"; $_name="write";?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
<link href="index.css" rel="stylesheet" type="text/css" media="screen" />
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name"author" content="Jan Ryklikas"/>
		<title>Doppelg&auml;nger</title>
	</head>
	<body>
	<div id="wrapper">
		<?php echo include("head.inc.php"); ?>
	<div id="middle">	
		<div class="main" id="kachel">
		<?php include("formular.php"); ?>	
			<div class="content">
			
		<?php $id=$_REQUEST["id"];
		include("write.inc.php"); ?>	
			</div> <!-- content -->
		</div> <!-- main -->
		<?php include("foot.inc.php"); ?>		
	</div> <!-- wrapper -->
	</body>
</html>