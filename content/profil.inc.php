<?php	
    $loggedIn = getUserData($_SESSION["user_id"], "id");
    $loggedIn = $loggedIn['found'];
    $req = getUserData($_REQUEST['id'], "id");
    
    if ($_REQUEST['id']==$_SESSION["user_id"]) {echo '<h2> Dein Profil </h2>';}else{echo '<h2> '.$req['Nickname']."'s Profil </h2>";};
?>
<div id="setcard">
    <table>
        <tr><td><b>Doppelg&auml;nger von:</b></td><td><?=$req['Nickname'];?></td></tr>
        <tr><td><b>Nachname:</b></td><td><?=$req['Nachname'];?></td></tr>
        <tr><td><b>Vorname:</b></td><td><?=$req['Vorname'];?></td></tr>
        <tr><td><b>E-Mail:</b></td><td><?php echo $loggedIn==true ? "<a href='mailto:".$req['Mail']."'>".$req['Mail']."</a>" : 'Bitte loggen sie sich ein um mit diesem Mitglied kontakt aufzunehmen.' ;?></td></tr>
        <tr><td><b>zuletzt online:</b></td><td><?=$req['last_login'];?></td></tr>
        <tr><td><b>&Uuml;ber mich:</b></td></tr><tr><td colspan='2' ><?=$req['Beschreibung'];?></td></tr>
    </table>
    <div id="profilbild"><img src="../user_pics/<?=$req['Id'];?>/<?=$req['Profilbild'];?>" style=" max-height: 500px; max-width: 300px;"></div>
</div>
