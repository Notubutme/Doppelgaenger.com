<?php	
$requestedId=$_REQUEST['id'];
include("includes/userRequest.inc.php");

if ($_REQUEST['id']==$_SESSION["user_id"]) {echo '<h1> Dein Profil </h1>';}else{echo '<h1> '.$req_nick."'s Profil </h1>";};

$mail_array = explode("@", $req_mail);
$mail_save = $mail_array[0]." (at) ".$mail_array[1];
echo '<div id="setcard">';
	echo "<table>";
		echo "<tr><td><b>Doppelg&auml;nger von:</b></td><td>".$req_nick."</td></tr>";  
		echo "<tr><td><b>Nachname:</b></td><td>".$req_last."</td></tr>";   
		echo "<tr><td><b>Vorname:</b></td><td>".$req_first."</td></tr>";  
		echo "<tr><td><b>E-Mail:</b></td><td><a href='mailto:".$req_mail."'>".$mail_save."</a></td></tr>"; 
		echo "<tr><td><b>zuletzt online:</b></td><td>".$req_login."</td></tr>";  
		echo "<tr><td><b>&Uuml;ber mich:</b></td></tr><tr><td colspan='2' >".$req_notes."</td></tr>";
	echo "</table>";
	echo '<div id="profilbild"><img src="../user_pics/'.$req_id.'/'.$req_pic.'" style=" max-height: 500px; max-width: 300px;"></div>';
echo '</div>';
	?>