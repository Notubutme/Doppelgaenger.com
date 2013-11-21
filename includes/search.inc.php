<?php
//############################################ Datenbank Connect
    $adress=$_SERVER["DOCUMENT_ROOT"];	// 
    include("includes/conn.inc.php");
//############################################ Datenbank Connect
//Verbindung herstellen
$datenbank = mysql_connect($db_location, $db_user, $db_pw);
$verbunden = mysql_select_db($db_name);
if (isset($_REQUEST['char'])) {
        $query = "SELECT * FROM benutzerdaten WHERE (Status != 'admin') AND (Nickname like '".$_REQUEST['char']."%') ORDER BY Nickname";
}elseif (isset($_REQUEST['nickname'])) {
        $query = "SELECT * FROM benutzerdaten WHERE (Status != 'admin') AND (Nickname like '%".$_REQUEST['nickname']."%') ";
        if (isset($_REQUEST['kategorie'])&&$_REQUEST['kategorie']!="Alle"){$query .= "AND Kategorien like '%".$_REQUEST['kategorie']."%' ";}
        $query .= " ORDER BY Nickname ";
}else { $query = "SELECT * FROM benutzerdaten WHERE Status != 'admin' ORDER BY Nickname";}
$result = mysql_query($query);
?>
<div id="search"><span id="alph"><a href="../search.php">A-Z </a><?php
    for ($i=65; $i<=90; $i++) {
        $get='?char='.chr($i).'?cat='.$kategorien;
        echo '<a href="../search.php'.$get.'">| '.chr($i).' </a>';
    }
    ?>
    </span>
    <form name="suche" action="#" method="GET">
        <label for="nickname">Ich suche einen Doppelgänger von:</label>
        <input name="nickname" type="text" value="<?php echo $_REQUEST['nickname'] != "" ? $_REQUEST['nickname'] : ''; ?>">
        <label for="kategorie" style="margin-left:50px;">in der Kategorie:</label>
        <select name="kategorie" size="1">
            <option>Alle</option>
            <option <?php echo $_REQUEST['kategorie'] == "Musiker"                          ? 'selected="selected"' : ''; ?>>Musiker</option>
            <option <?php echo $_REQUEST['kategorie'] == "Schauspieler"                     ? 'selected="selected"' : ''; ?>>Schauspieler</option>
            <option <?php echo $_REQUEST['kategorie'] == "TV Entertainer"                   ? 'selected="selected"' : ''; ?>>TV Entertainer</option>
            <option <?php echo $_REQUEST['kategorie'] == "Politiker"                        ? 'selected="selected"' : ''; ?>>Politiker</option>
            <option <?php echo $_REQUEST['kategorie'] == "Adel"                             ? 'selected="selected"' : ''; ?>>Adel</option>
            <option <?php echo $_REQUEST['kategorie'] == "Öffentliche Persönlichkeiten"     ? 'selected="selected"' : ''; ?>>Öffentliche Persönlichkeiten</option>
            <option <?php echo $_REQUEST['kategorie'] == "sonstige Prominente"              ? 'selected="selected"' : ''; ?>>sonstige Prominente</option>
        </select>

        <a href="#" onclick="document.suche.submit();" style="margin-left:50px;">Suchen</a>
    </form>
</div>
<div id="list">
<?php
while ($zeile = mysql_fetch_array( $result, MYSQL_ASSOC))
{ $id=$zeile['Id']; ?>
  <div id="user">
        <table id="usertable">
                <tr>
                    <td><?php echo $zeile['Nickname'] ?></td>
                </tr>
                <tr>
                    <td>
                        <a href="profil.php?id=<?php echo $zeile["Id"];?>" >
                           <img src="user_pics/<?php echo $zeile["Id"].'/'.$zeile['Profilbild']; ?>" style="max-height:150px;oultine:150px;max-width:150px;" />
                        </a>
                    </td>
                </tr>
        </table>
  </div>
<?php }
echo "</div>";
//Verbindung beenden
mysql_close($datenbank);
?>


		