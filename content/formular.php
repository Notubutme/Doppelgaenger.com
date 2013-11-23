<!--#################################################################################################################### Login -->
        <?php $_REQUEST['currentURL'] = $_SERVER['PHP_SELF'] .'?'. $_SERVER['QUERY_STRING']; ?>
	<div id="login" style="
		<?php 
			if ($_login=="true") {
				echo "visibility: hidden;";
			} else if ($_login=="false") {
				echo "visibility: visible;";
			}
		?>
	">
		<form action="../login.php" method="post">
                        <input type="hidden" name='currentURL' value='<?=$_REQUEST['currentURL']; ?>'/>
			<input type="text" name="mail" placeholder="E-Mail"/>						
			<input type="password" name="pass" placeholder="Passwort"/>
			<input type="submit" value="Login" class="login_button"/>
			<div class="register"><a href="../register.php" class="register_button">Registrieren</a></div>
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