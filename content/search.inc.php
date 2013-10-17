test
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
	if (isset($_REQUEST['char'])) {
		$sql_befehl = mysql_query("SELECT * FROM benutzerdaten WHERE (Status != 'admin') AND (Nickname like '".$_REQUEST['char']."%') ORDER BY Nickname");
	}else{
		$sql_befehl = mysql_query("SELECT * FROM benutzerdaten WHERE Status != 'admin' ORDER BY Nickname");
	}
//##################################################################################################################
	$kategorien = 
	//die('Kat:'.$kategorien);
	echo '<div id="search"><span id="alph"><a href="http://test.doppelgaenger.com/search.php">A-Z </a>';
	for ($i=65; $i<=90; $i++) {
		$get='?char='.chr($i).'?cat='.$kategorien;
		echo '<a href="http://test.doppelgaenger.com/search.php'.$get.'">| '.chr($i).' </a>';
	}
	echo '|</span><span id="cat">';
	echo '	<form name="suche" action="search.php" method="GET"><select name="kategorien" size="1">';
	echo '		<option>Musiker</option><option>Schauspieler</option><option>TV Entertainer</option><option>Politiker</option><option>Adel</option><option>Öffentliche Persönlichkeiten</option><option>sonstige Prominente</option>';
	echo '	</select></form>';
	echo '</span><span id="searchfield">Suche</span></div>';
//##################################################################################################################
	echo '<div id="list">';
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


		