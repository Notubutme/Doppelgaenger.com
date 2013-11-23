<?php 

require_once 'includes/functions.php';
    // Session starten 
    session_start (); 
    $data = verifyLogin($_REQUEST["mail"], $_REQUEST["pass"]);
    print_r($_REQUEST);
    if($data['found'] == true){
        // Sessionvariablen erstellen und registrieren  
        $_SESSION["user_id"] = $data["Id"];  
        $_SESSION["user_nickname"] = $data["Nickname"];  
        $_SESSION["user_nachname"] = $data["Nachname"];  
        $_SESSION["user_vorname"] = $data["Vorname"];
        $_SESSION["user_status"] = $data["Status"];
        $_SESSION["user_last_login"] = $data["last_login"];
        $_SESSION["user_Profilbild"] = $data["Profilbild"];
        echo "a";
        userLog($data["Id"]);
        echo "b";
        header ("Location: ".$_REQUEST["currentURL"]);  
        echo "c";
    }  
    else {  
        header ("Location: ".$_REQUEST["currentURL"]."&error=1");  
    }  
?>
<!-- ############################################################################# Assimilierter Code -->