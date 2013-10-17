
	<?php
	//############################################ Datenbank Connect
		$adress=$_SERVER["DOCUMENT_ROOT"];	// 
		include("conn.inc.php");		// 
		echo $_SERVER["DOCUMENT_ROOT"];
	//############################################ Datenbank Connect
	?>
<!-- ############################################################################# Assimilierter Code -->		
<?php  
			echo "<br>sql start<br><br>";
				//Verbindung herstellen
				$datenbank = mysql_connect($db_location, $db_user, $db_pw);
				$verbunden = mysql_select_db($db_name);
				//Daten in DB speichern
				$ip = date("d.m.Y")."-".date("H:i:s");
				$id = $_REQUEST["user_id"];
				$sql_befehl = mysql_query("UPDATE ".
				"benutzerdaten ".
				"SET ".
				"last_login = '".$ip."' ".
				"WHERE ".
				"Id like '".$id."' ");
				//Verbindung beenden
				mysql_close($datenbank);
				echo "Nick: ".$nick;
				echo "<br>ip: ".$ip;
				echo "<br>sql start<br><br>";
?>
<!-- ############################################################################# Assimilierter Code -->
		

		