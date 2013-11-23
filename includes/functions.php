<?php
    function db_query($query){
        include("conn.inc.php");
        $connectionid = mysql_connect ($db_location, $db_user, $db_pw);  
        if (!mysql_select_db ($db_name, $connectionid)) {  
            die ("Keine Verbindung zur Datenbank");  
        }
        //$query = mysql_real_escape_string($query);
        if (mysql_affected_rows ($connectionid) > 0){
            $result = true;
        }else{
            $result = mysql_query($query);
            if (mysql_num_rows ($result) <= 0) {
                $result = false;
            }
        }
        return $result;
    }
    function db_assoc($query){
        include("conn.inc.php");
        $connectionid = mysql_connect ($db_location, $db_user, $db_pw);  
        if (!mysql_select_db ($db_name, $connectionid)) {  
            die ("Keine Verbindung zur Datenbank");  
        }
        //$query = mysql_real_escape_string($query);
        $result = mysql_query($query); 
        if (mysql_num_rows ($result) > 0) { 
            $data = mysql_fetch_assoc($result);
            $data['found']=true;
        }else{$data = false;}
        return $data;
    }
    function getUserData($keyword, $field){
        if($field == "nick"){$requestedNick = $keyword;$requestedId = "";}elseif($field == "id"){$requestedNick = "";$requestedId = $keyword;}
        
        $query = "SELECT DISTINCT ".  
                "Id, Nickname, Kennwort, Nachname, Vorname, Status, Kategorien, last_login, Profilbild, Mail, Beschreibung ".  
                "FROM ".  
            "benutzerdaten ".  
                "WHERE ".  
                "(Id like '".$requestedId."') OR (Nickname Like '".$requestedNick."');";
        $data = db_assoc($query);
        return $data;
    }
    function verifyLogin($mail, $pass){
        $query = "SELECT Id, Nickname, Nachname, Vorname, Status, last_login, Profilbild FROM benutzerdaten WHERE (Mail like '".$mail."') AND (Kennwort = '".md5 ($pass)."');";
        $data = db_assoc($query);
        return $data;
    }
    function userLog($id){
        $ip = date("d.m.Y")."-".date("H:i:s");
        db_query("UPDATE benutzerdaten SET last_login = '".$ip."' WHERE Id like '".$id."' ");
    }
?>