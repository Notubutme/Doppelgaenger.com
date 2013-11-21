<!DOCTYPE PHP>
	<?php $_active="14"; $_name="write";?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
<link href="index.css" rel="stylesheet" type="text/css" media="screen" />
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Jan Ryklikas"/>
		<title>Doppelg&auml;nger</title>
	</head>
	<body>
	<div id="wrapper">
		<?php echo include("includes/head.inc.php"); ?>
	<div id="middle">	
		<div class="main" id="kachel">
		<?php include("includes/formular.php"); ?>	
			<div class="content">
			
		<?php $id=$_REQUEST["id"];
		include("includes/write.inc.php"); ?>	
			</div> <!-- content -->
		</div> <!-- main -->
		<?php include("includes/foot.inc.php"); ?>		
	</div> <!-- wrapper -->
	</body>
</html>