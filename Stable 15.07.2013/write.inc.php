<?php
//############################################ Datenbank Connect
	$adress=$_SERVER["DOCUMENT_ROOT"];	// 
	include("conn.inc.php");		// 
//############################################ Variablen Übergabe
	$id = $_POST["id"];
	$nickname = $_POST["nickname"];
	$kennwort = $_POST["kennwort"];
	$nachname = $_POST["nachname"];
	$vorname = $_POST["vorname"];
	$mail = $_POST["mail"];
	$notes = $_POST["notes"];
//############################################ Aufbau der Datenbankverbindung  
	$connectionid  = mysql_connect ($db_location, $db_user, $db_pw);
	if (!mysql_select_db ($db_name, $connectionid))  
	{  die ("Keine Verbindung zur Datenbank");  }  
//############################################ User auswerten
	if ($_SESSION["user_status"]=="admin"||$_SESSION["user_status"]=="user"){
		$requestedId = $id;
		include("content/userRequest.inc.php");
		if ($_FILES['profilbild']['size'] > 0){
			$bild=$_FILES['profilbild']['name'];
		}else{
			include("content/userRequest.inc.php");
			$bild = $req_pic;
		}
		if ($kennwort!=""){
			$passw=md5($kennwort);
		}else{
			$passw=$req_pass;
		}
		$sql = 'UPDATE benutzerdaten SET Nickname="'.$nickname.'" , Kennwort="'.$passw.'" , Nachname="'.$nachname.'" , Vorname="'.$vorname.'", Profilbild="'.$bild.'" , Mail="'.$mail.'" , Beschreibung="'.$notes.'" WHERE Id like '.$id.'';
		if ($_SESSION["user_status"]=="admin"){
			$header = "Location: admin.php";
		}else{
			$header = "Location: register.php";
		}
	}else{
			$sql = "INSERT INTO benutzerdaten (Nickname, Kennwort, Nachname, Vorname, Profilbild, Mail, Beschreibung) VALUES ('".$nickname."', '".md5 ($kennwort)."', '".$nachname."', '".$vorname."', '".$_FILES['profilbild']['name']."', '".$mail."', '".$notes."')";  
			$header = "Location: login.php?mail=".$mail."&pass=".$kennwort;
;	}
//################################## sql Befehl ausführen

//##################################
	mysql_query ($sql);  
	if (mysql_affected_rows ($connectionid) > 0){  
		if ($_FILES['profilbild']['size'] > 0){
			include('picture_upload.inc.php');
		}
		header ($header);  
	}else{  
		//die('Fehler beim ändern des Benutzers');
		header ($header); 
	}  
//############################################
?>