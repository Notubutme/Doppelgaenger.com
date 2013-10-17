
<?php
	if ($_SESSION["user_status"]=="admin"||$_SESSION["user_status"]=="user"){
		echo "<h1>Nutzerdaten &auml;nderung</h1>";
		if ($_SESSION["user_status"]=="admin"&&isset($_REQUEST["id"])==true){
			$requestedId = $_REQUEST["id"];
			include("content/userRequest.inc.php");
		}else{
			$requestedId = $_SESSION["user_id"];
			include("content/userRequest.inc.php");
		}
		echo '<form action="write.php" method="POST" enctype="multipart/form-data" id="regiser_form">';
		echo "<p>bitte geben sie die zu &auml;ndernden Daten ein:";
		$button="&auml;ndern";
	}else {
		echo "<h1>Registrieren</h1>";
		echo '<form action="write.php" method="POST" enctype="multipart/form-data" id="regiser_form">';
		echo	"<p>Bitte gib deine Daten für die Registrierung ein:<br> ";
		$button="Registrieren";
	}
?>
		<table >
			<tr  <?php if ($_SESSION["user_status"]!="admin") {echo 'style="display:none;"';} ?>>	
				<td>ID:</td><td><input type="text" name="id" <?php echo 'value="'.$req_id.'"'; if ($_SESSION["user_status"]=="admin") {echo '';}else{echo 'readonly';} ?>></td>
			</tr>
			<tr>	
				<td>Doppelg&auml;nger von:</td><td><input type="text" name="nickname" <?php echo 'value="'.$req_nick.'"'; ?>><input type="checkbox" class="checkbox" name="kategorie[]" value="Musiker">Musiker</td><td><input style="text-align: left;" type="checkbox" class="checkbox" name="kategorie[]" value="Öffentliche Persönlichkeiten">Öffentliche Persönlichkeiten<br></td>
			</tr>
			<tr>
				<td>Passwort:</td><td><input type="password" name="kennwort"><input type="checkbox" class="checkbox" name="kategorie[]" value="Schauspieler">Schauspieler</td><td><input type="checkbox" class="checkbox" name="kategorie[]" value="sonstige Prominente">sonstige Prominente<br></td>
			</tr>
			<tr>
				<td>Name:</td><td><input type="text" name="nachname" <?php echo 'value="'.$req_last.'"'; ?>><input type="checkbox" class="checkbox" name="kategorie[]" value="TV Entertainer">TV Entertainer<br></td>
			</tr>
			<tr>
				<td>Vorname:</td><td><input type="text" name="vorname" <?php echo 'value="'.$req_first.'"'; ?>><input type="checkbox" class="checkbox" name="kategorie[]" value="Politiker">Politiker<br></td>
			</tr>
			<tr>
				<td>E-Mail:</td><td><input type="text" name="mail" <?php echo 'value="'.$req_mail.'"'; ?>><input type="checkbox" class="checkbox" name="kategorie[]" value="Adel">Adel<br></td>
			</tr>
			<tr>
				<td style="vertical-align: top;">&Uuml;ber mich:</td><td colspan="2"><textarea cols="50" rows="9" name="notes"><?php echo $req_notes; ?></textarea></td>
			</tr>
			<tr>
				<td>Profilbild:</td><td><button id="button-file">Bild Upload</button><input type="file" id="input-file" name="profilbild"></td>
			</tr>
			<tr>
				<td></td><td><input type="submit" value="<?php echo $button; ?>"></td>
			</tr>
		</table>
		</p>
	</form>
	<script type="text/javascript">
		$('#button-file').click(function() { 
			$('#input-file').click();    
		});
	</script>