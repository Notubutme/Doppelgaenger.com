<!--#################################################################################################################### Login -->
	<div id="login" style="
		<?php 
			if ($_login=="true") {
				echo "visibility: hidden;";
			} else if ($_login=="false") {
				echo "visibility: visible;";
			}
		?>
	">
		<form action="login.php" method="post">
			<input type="text" name="mail" placeholder="E-Mail"/>						
			<input type="password" name="pass" placeholder="Passwort"/>
			<script type="text/javascript">
				if (window.innerWidth>=960) {
					var login = "img/Login_Button1.png";
				}else{
					var login = "img/Login_Button.png";
				}
				document.write('<input type="image" src="'+login+'" alt="Absenden" id="login_button"/>');
			</script>
			<!--<input type="image" src="" alt="Absenden" id="login_button"/>-->
			<!--<input type="submit" value="Login" src="img/Login_Button1.png"/>-->
			<a href="register.php"><img src="img/Register_Button1.png" alt="Register"></img></a>
		</form>
		
	</div>  <!-- login -->

<?php 
			if ($_REQUEST["error"]=="1"){  
				echo "<div id=\"fehler\">";
				echo 	"Die Zugangsdaten waren ungültig.";  
				echo "</div>";
			}else if ($_REQUEST["error"]=="2"){  
				echo "<div id=\"fehler\">";
				echo 	"Sie müssen sich zuerst einloggen!";  
				echo "</div>";
			}
?>
<!--#################################################################################################################### Login -->	