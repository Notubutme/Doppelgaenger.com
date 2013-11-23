<?php
    $action = $_POST["action"];
    if($action == "change"||$action == "register"){
        $id = $_POST["id"];
        $nickname = $_POST["nickname"];
        $kennwort = $_POST["kennwort"];
        $nachname = $_POST["nachname"];
        $vorname = $_POST["vorname"];
        $kategorie = $_POST["kategorie"];
        $mail = $_POST["mail"];
        $notes = $_POST["notes"];

        $kategorien = implode(", ", $kategorie);

        if ($action == "change"){
            $req = getUserData($id, "id");
            print_r($req);
            if ($_FILES['profilbild']['size'] > 0){
                $bild=$_FILES['profilbild']['name'];
            }else{
                include("content/userRequest.inc.php");
                $bild = $req['Profilbild'];
            }
            if ($kennwort!=""){
                $passw=md5($kennwort);
            }else{
                $passw=$req['Kennwort'];
            }
            $sql = 'UPDATE benutzerdaten SET Nickname="'.$nickname.'" , Kennwort="'.$passw.'" , Nachname="'.$nachname.'" , Vorname="'.$vorname.'", Kategorien="'.$kategorien.'", Profilbild="'.$bild.'" , Mail="'.$mail.'" , Beschreibung="'.$notes.'" WHERE Id like '.$id.'';
            if ($_SESSION["user_status"]=="admin"){
                $header = "Location: ../admin.php";
            }else{
                $header = "Location: ../register.php";
            }
        }else{
            $sql = "INSERT INTO benutzerdaten (Nickname, Kennwort, Nachname, Vorname, Kategorien, Profilbild, Mail, Beschreibung) VALUES ('".$nickname."', '".md5 ($kennwort)."', '".$nachname."', '".$vorname."', '".$kategorien."', '".$_FILES['profilbild']['name']."', '".$mail."', '".$notes."')";  
            $header = "Location: ../login.php?mail=".$mail."&pass=".$kennwort."&currentURL=/index.php";
        }
        if (db_query($sql)){  
            if ($_FILES['profilbild']['size'] > 0){
                include('picture_upload.inc.php');
            }
            header ($header);  
        }else{  
            header ($header); 
        }
    }
//############################################
    if ($_SESSION["user_status"]=="admin"||$_SESSION["user_status"]=="user"){
        echo "<h1>Nutzerdaten &auml;nderung</h1>";
        if ($_SESSION["user_status"]=="admin"&&isset($_REQUEST["id"])==true){
            $req = getUserData($_REQUEST["id"], "id");
        }else{
            $req = getUserData($_SESSION["user_id"], "id");
        }
        echo '<form action="register.php" method="POST" enctype="multipart/form-data" id="regiser_form">';
        echo '<p>bitte geben sie die zu &auml;ndernden Daten ein:';
        echo '<input type="hidden" name="action" value="change">';
        $button="&auml;ndern";
    }else {
        echo '<h1>Registrieren</h1>';
        echo '<form action="register.php" method="POST" enctype="multipart/form-data" id="regiser_form">';
        echo	'<p>Bitte gib deine Daten für die Registrierung ein:<br /> ';
        echo    '<input type="hidden" name="action" value="register">';
        $button="Registrieren";
}
//####################################################################################################################### Formular
?>
        <table >
            <tr  <?php if ($_SESSION["user_status"]!="admin") {echo 'style="display:none;"';} ?>>	
                <td>ID:</td><td><input type="text" name="id" <?php echo 'value="'.$req['Id'].'"'; if ($_SESSION["user_status"]=="admin") {echo '';}else{echo 'readonly';} ?>></td>
            </tr>
            <tr><td>Doppelg&auml;nger von:</td><td><input type="text" name="nickname" <?='value="'.$req['Nickname'].'"';?>><input type="checkbox" class="checkbox" name="kategorie[]" value="Musiker">Musiker</td><td><input style="text-align: left;" type="checkbox" class="checkbox" name="kategorie[]" value="Öffentliche Persönlichkeiten">Öffentliche Persönlichkeiten<br /></td></tr>
            <tr><td>Passwort:</td><td><input type="password" name="kennwort"><input type="checkbox" class="checkbox" name="kategorie[]" value="Schauspieler">Schauspieler</td><td><input type="checkbox" class="checkbox" name="kategorie[]" value="sonstige Prominente">sonstige Prominente<br /></td></tr>
            <tr><td>Name:</td><td><input type="text" name="nachname" <?='value="'.$req['Nachname'].'"';?>><input type="checkbox" class="checkbox" name="kategorie[]" value="TV Entertainer">TV Entertainer<br /></td></tr>
            <tr><td>Vorname:</td><td><input type="text" name="vorname" <?='value="'.$req['Vorname'].'"';?>><input type="checkbox" class="checkbox" name="kategorie[]" value="Politiker">Politiker<br /></td></tr>
            <tr><td>E-Mail:</td><td><input type="text" name="mail" <?='value="'.$req['Mail'].'"';?>><input type="checkbox" class="checkbox" name="kategorie[]" value="Adel">Adel<br /></td></tr>
            <tr><td style="vertical-align: top;">&Uuml;ber mich:</td><td colspan="2"><textarea cols="50" rows="9" name="notes"><?=$req['Beschreibung'];?></textarea></td></tr>
            <tr><td>Profilbild:</td><td><input type="file" id="input-file" name="profilbild"></td></tr>
            <tr><td></td><td><input type="submit" value="<?=$button;?>"></td></tr>
        </table>
        </p>
    </form>
    
