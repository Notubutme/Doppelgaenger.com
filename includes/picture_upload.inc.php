<?php
//####################	Bild Hochladefunktion	
    $profilbildtyp = GetImageSize($_FILES['profilbild']['tmp_name']);	
    if($profilbildtyp[2] != 0){
        if($_FILES['profilbild']['size'] <  10240000){
                //#######################################
            $connectionid = mysql_connect ($db_location, $db_user, $db_pw);  
            if (!mysql_select_db ($db_name, $connectionid)) {  
                die ("Keine Verbindung zur Datenbank");  
            }  
            $sql3 = "SELECT ".  
                    "Id  ".  
                    "FROM ".  
                    "benutzerdaten ".  
                    "WHERE ".  
                    "Mail like '".$mail."';";
            $result3 = mysql_query ($sql3); 
            if (mysql_num_rows ($result3) > 0) {  
                // Benutzerdaten in ein Array auslesen.  
                $data = mysql_fetch_array ($result3);  
                $requestedId = $data["Id"];  
            }  
            include("content/userRequest.inc.php");
            //#######################################
            if(!is_dir("user_pics/".$req_id."/")) {
                if (!mkdir("user_pics/".$req_id."/", 0777)){
                        die('Ordner Fehlgeschlagen'.$req_id);
                } 
            }
            if (!move_uploaded_file($_FILES['profilbild']['tmp_name'], "user_pics/".$req_id."/".$_FILES['profilbild']['name'])){
                die('Das Bild wurde nicht Erfolgreich hochgeladen'.$req_id);
            }
        }
        else{ 
            die('Das Bild darf nicht groesser als 10 mb sein ');
        }
    }
    else{
        die('Bitte nur Bilder im Gif bzw. jpg Format hochladen');
    }
//####################	Bild Hochladefunktion	
?>