	<?php
	//############################################ Datenbank Connect
		$adress=$_SERVER["DOCUMENT_ROOT"];	// 
		include("includes/conn.inc.php");		// 
		echo $_SERVER["DOCUMENT_ROOT"];
	//############################################ Datenbank Connect
	?>
<!-- ############################################################################# Assimilierter Code -->		
<?php  
	// Session starten 
	session_start (); 
	include("log.inc.php");
	// Datenbankverbindung aufbauen  
	$connectionid = mysql_connect ($db_location, $db_user, $db_pw);  
	if (!mysql_select_db ($db_name, $connectionid)) {  
 		 die ("Keine Verbindung zur Datenbank");  
	}  

	$sql = "SELECT ".  
		"Id, Nickname, Nachname, Vorname, Status, last_login, Profilbild ".  
		"FROM ".  
	    "benutzerdaten ".  
		"WHERE ".  
		"(Mail like '".$_REQUEST["mail"]."') AND ".  
		"(Kennwort = '".md5 ($_REQUEST["pass"])."');";
	$result = mysql_query ($sql); 
	if (mysql_num_rows ($result) > 0) {  
		// Benutzerdaten in ein Array auslesen.  
		$data = mysql_fetch_array ($result);  

		// Sessionvariablen erstellen und registrieren  
		$_SESSION["user_id"] = $data["Id"];  
		$_SESSION["user_nickname"] = $data["Nickname"];  
		$_SESSION["user_nachname"] = $data["Nachname"];  
		$_SESSION["user_vorname"] = $data["Vorname"];
		$_SESSION["user_status"] = $data["Status"];
		$_SESSION["user_last_login"] = $data["last_login"];
		$_SESSION["user_Profilbild"] = $data["Profilbild"];
		

		header ("Location: index.php");  
		
	}  
	else {  
		header ("Location: index.php?error=1");  
	}  
?>
<!-- ############################################################################# Assimilierter Code -->