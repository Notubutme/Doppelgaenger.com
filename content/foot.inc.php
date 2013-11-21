<!--#################################################################################################################### Foot -->	
		<div id="foot">
			<a class="<?php if ($_active=="6") { echo "activefootlink"; } else { echo "footlink"; } ?>" href="../impressum.php">Impressum</a>
			<a class="<?php if ($_active=="7") { echo "activefootlink"; } else { echo "footlink"; } ?>" href="../AGB.php">AGB</a>
			<a class="<?php if ($_active=="8") { echo "activefootlink"; } else { echo "footlink"; } ?>" href="../FAQ.php">FAQ</a>
			<a class="logged_in"			
			style="
				<?php 
					if (!isset($_SESSION['user_id'])) 
					{ 
						echo "display:none;"; 
					}elseif(isset($_SESSION['user_id'])){
						echo "display:block;"; 
					}
				?>
			" 	 																						href="logout.php">logout</a>


			<a class="logged_in" 
			style="
				<?php 
					if ($_SESSION["user_status"]!="admin") 
					{ 
						echo "display:none;"; 
					} 
				?>
			" 																							href="admin.php">Admin</a>
		</div> <!-- foot -->
<!--#################################################################################################################### Foot -->	