<!--#################################################################################################################### Head -->	
<?php session_start (); if (!isset ($_SESSION["user_id"])) { $_login="false"; } else { $_login="true"; } ?>	

	<div id="head">
		<div id="logo">
			<a href="../index.php"><img src="../img/logo01.jpg" alt="Logo"></a>
		</div> <!-- logo -->
		<?php include("formular.php"); ?>	
	</div> <!-- head -->
<!--#################################################################################################################### Head -->