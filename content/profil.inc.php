<?php	
$requestedId=$_SESSION["user_id"];
$res = include("includes/userRequest.inc.php");

$requestedId=$_REQUEST['id'];
include("includes/userRequest.inc.php");

if ($_REQUEST['id']==$_SESSION["user_id"]) {echo '<h1> Dein Profil </h1>';}else{echo '<h1> '.$req_nick."'s Profil </h1>";};

$mail_array = explode("@", $req_mail);
$mail_save = $mail_array[0]." (at) ".$mail_array[1];



?>
<div id="setcard">
    <table>
        <tr><td><b>Doppelg&auml;nger von:</b></td><td><?=$req_nick?></td></tr>
        <tr><td><b>Nachname:</b></td><td><?=$req_last?></td></tr>
        <tr><td><b>Vorname:</b></td><td><?=$req_first?></td></tr>
        <tr><td><b>E-Mail:</b></td><td><?php echo $res==true ? "<a href='mailto:".$req_mail."'>".$mail_save."</a>" : 'Bitte loggen sie sich ein um mit diesem Mitglied kontakt aufzunehmen.' ;?></td></tr>
        <tr><td><b>zuletzt online:</b></td><td><?=$req_login?></td></tr>
        <tr><td><b>&Uuml;ber mich:</b></td></tr><tr><td colspan='2' ><?=$req_notes?></td></tr>
    </table>
    <div id="profilbild"><img src="../user_pics/<?=$req_id?>/<?=$req_pic?>" style=" max-height: 500px; max-width: 300px;"></div>
</div>