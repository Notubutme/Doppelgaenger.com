<?php
//################################################################################## userRequest.inc.php(
//############################################ Datenbank Connect
	$adress=$_SERVER["DOCUMENT_ROOT"];	// 
	include("conn.inc.php");		// 
//############################################ 
	$connectionid = mysql_connect ($db_location, $db_user, $db_pw);  
	if (!mysql_select_db ($db_name, $connectionid)) {  
 		 die ("Keine Verbindung zur Datenbank");  
	}  
	$sql2 = "SELECT DISTINCT ".  
		"Id, Nickname, Kennwort, Nachname, Vorname, Status, Kategorien, last_login, Profilbild, Mail, Beschreibung ".  
		"FROM ".  
	    "benutzerdaten ".  
		"WHERE ".  
		"(Id like '".$requestedId."') OR (Nickname Like '".$requestedNick."');";
	$result2 = mysql_query ($sql2); 
	if (mysql_num_rows ($result2) > 0) {  
		// Benutzerdaten in ein Array auslesen.  
		$data = mysql_fetch_array ($result2);
		
		$req_id=$data["Id"];
		$req_nick=$data["Nickname"];
		$req_last=$data["Nachname"];
		$req_first=$data["Vorname"];
		$req_stat=$data["Status"];
		$req_cat=$data["Kategorien"];
		$req_login=$data["last_login"];
		$req_pic=$data["Profilbild"];
		$req_pass=$data["Kennwort"];
		$req_mail=$data["Mail"];
		$req_notes=$data["Beschreibung"];
	
		
		$found=true;
	}
	else{
		$found=false;
	}
	return $found;
//##################################################################################
?>