	<?php
	//############################################ Datenbank Connect
		$adress=$_SERVER["DOCUMENT_ROOT"];	// 
		include("includes/conn.inc.php");
	//############################################ Datenbank Connect
	?>
<!-- ############################################################################# Assimilierter Code -->		
<?php  
	
	//Verbindung herstellen
	$datenbank = mysql_connect($db_location, $db_user, $db_pw);
	$verbunden = mysql_select_db($db_name);
	$sql_befehl = mysql_query("SELECT * FROM benutzerdaten WHERE Status != 'admin'");
	echo '<div id="search">';
	while ($zeile = mysql_fetch_array( $sql_befehl, MYSQL_ASSOC))
	{
	  $id=$zeile['Id'];
	  echo '<div id="user">';
	  echo '	<table id="usertable">';
	  echo '		<tr><td>'. $zeile['Nickname']	.'</td></tr>';
	  echo '		<tr><td><a href="profil.php?id='.$zeile["Id"].'" ><img src="user_pics/'.$zeile["Id"].'/'. $zeile['Profilbild'] .'" style="max-height: 150px; oultine: 150px; max-width:150px;"></a></td></tr>';
	  echo '	</table>';
	  echo '</div>';
	}
	echo "</div>";
	//Verbindung beenden
	mysql_close($datenbank);
?>
<!-- ############################################################################# Assimilierter Code -->
		

		