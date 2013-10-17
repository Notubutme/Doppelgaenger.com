	<?php
	//############################################ Datenbank Connect
		$adress=$_SERVER["DOCUMENT_ROOT"];	// 
		include("conn.inc.php");
	//############################################ Datenbank Connect
	?>
<!-- ############################################################################# Assimilierter Code -->		
<?php  
	//Verbindung herstellen
	$datenbank = mysql_connect($db_location, $db_user, $db_pw);
	$verbunden = mysql_select_db($db_name);
	$sql_befehl = mysql_query("SELECT * FROM benutzerdaten ");
	echo '<table rules="all" id="admin" >';
	echo '<tr>';
	echo '<th>ID</th><th>Nachname</th><th>Vorname</th><th>Nickname</th><th>Status</th><th>E-Mail Adresse</th><th>Letzter Login</th><th>Bearbeiten</th><th>L&ouml;schen</th>';
	echo '</tr>';
	while ($zeile = mysql_fetch_array( $sql_befehl, MYSQL_ASSOC))
	{
	  $id=$zeile['Id'];
	  echo "<tr>";
	  echo "<td>". $zeile['Id'] . "</td>";
	  echo "<td>". $zeile['Nachname'] . "</td>";
	  echo "<td>". $zeile['Vorname'] . "</td>";
	  echo "<td>". $zeile['Nickname'] . "</td>";
	  echo "<td>". $zeile['Status'] . "</td>";
	  echo "<td>". $zeile['Mail'] . "</td>";
	  echo "<td>". $zeile['last_login'] . "</td>";

	  echo '<td style="text-align:center;">';
	  if ($zeile['Status'] == "admin") {
	  	echo ' ';
	  } else {
	  	echo '<a href="register.php?id='.$id.'">edit</a>';
	  }
	  echo '</td>';
	  echo '<td style="text-align:center;">';
	  if ($zeile['Status'] == "admin") {
	  	echo ' ';
	  } else {
	  	echo '<a href="deleteuser.php?id='.$id.'">X</a>';
	  }
	  echo '</td>';
	  echo "</tr>";
	}
	echo "</table>";
	//Verbindung beenden
	mysql_close($datenbank);
?>
<!-- ############################################################################# Assimilierter Code -->
		

		