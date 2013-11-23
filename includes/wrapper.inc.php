	<head>
		<link href="includes/index.css" rel="stylesheet" type="text/css" media="screen"/>
		<meta name="author" content="Jan Ryklikas"/>
		<meta name="keywords" lang="de" content="Doppelgaenger"/>
		<meta name="description" content=
			"Sie suchen ein Double eines Politikers, eines Schauspielers, oder gar eine komplett kopierte Rockband?
			In unserer Kartei finden sie professionelle Doubles aus Politik, Wirtschaft, Showbiz, Film &amp; Fernsehen, sowie natu�rlich Doppelga�nger mit entsprechend ku�nstlerischem Talent von diversen Musikern und Entertainern.
			Fu�r professionelle Doubles bieten wir die Mo�glichkeit sich in unsere Kartei einzutragen um so von Interessenten wie Agenturen, TV Produktionsfirmen oder Veranstaltern gefunden zu werden."
		/>
		<meta http-equiv="language" content="de"/>
		<meta http-equiv="imagetoolbar" content="no"/>
		<meta name="robots" content="index,follow"/>
		<link rel="shortcut icon" href="img/favico.ico" type="image/x-icon"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=1024" />
		<!--<meta name="viewport" content="width=device-width; initial-scale=1.0">-->
		<title>Doppelg&auml;nger</title>
	</head>
	<body>
	<?php session_start (); if (!isset ($_SESSION["user_id"])) { $_login="false"; } else { $_login="true"; } ?>
        <?php require_once 'includes/functions.php'; ?>
	<div id="head-wrapper">
		<div id="header">
			<div id="logo">
				<a href="index.php"></a>
			</div> <!-- logo -->
			<?php include("content/formular.php"); ?>	
			<?php include("content/profilinfo.inc.php"); ?>
		</div> <!-- head -->
	</div> <!-- Head-Wrapper -->
	<div id="content-wrapper">
		<div id="content">
			<?php include("content/".$_name.".inc.php"); ?>	
		</div> <!-- content -->
	</div> <!-- Content-Wrapper -->
	<div id="foot-wrapper">
		<div id="valid">
			<a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
		</div> <!--  valid -->
		<?php include("content/foot.inc.php"); ?>	
	</div> <!-- Foot-Wrapper -->
	</body>
</html>