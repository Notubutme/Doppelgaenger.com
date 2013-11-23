<?php
	//############################################ Datenbank Connect
		$adress=$_SERVER["DOCUMENT_ROOT"];	// 
		include("includes/conn.inc.php");		// 
		echo $_SERVER["DOCUMENT_ROOT"];
	//############################################ Datenbank Connect
	
	$id = $_REQUEST["id"];
	
	$datenbank = mysql_connect($db_location, $db_user, $db_pw);
	$verbunden = mysql_select_db($db_name);
	$sql_befehl = mysql_query("DELETE FROM ".
	"benutzerdaten ".
	"WHERE ".
	"Id like '".$id."' ");
	//Verbindung beenden
	mysql_close($datenbank);
	header ("Location: admin.php");

?>