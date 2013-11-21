
<div id="profilinfo" style="
	<?php 
		if ($_login=="true") {
			echo "visibility: visible;";
		} else if ($_login=="false") {
			echo "visibility: hidden;";
		}
	?>
">
	<?php	
		echo '<a href="../profil.php?id='.$_SESSION["user_id"].'" >'.$_SESSION["user_vorname"].' '.$_SESSION["user_nachname"].'</a></br>';
		echo '<a href="../profil.php?id='.$_SESSION["user_id"].'" ><img src="../user_pics/'.$_SESSION["user_id"].'/'.$_SESSION["user_Profilbild"].'" style=" height: 80px;" ></a></br>';
		echo '<a href="../register.php">Profil bearbeiten</a>';
	?>
</div>