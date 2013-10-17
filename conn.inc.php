		<?php 
		switch ($adress) 
		{
		case "/home/www/web11/html/sub_test":
		{
		$db_name="usr_web11_1";
		$db_location = "localhost";
		$db_user = "web11";
		$db_pw = "HAWMS1";
		break;
		}
		case "/home/www/web11/html":
		{
		$db_name="usr_web11_1";
		$db_location = "localhost";
		$db_user = "web11";
		$db_pw = "HAWMS1";
		break;
		}
		case "/var/www":
		{
		$db_name="usr_web747_3";
		$db_location = "localhost";
		$db_user = "root";
		$db_pw = "";
		break;
		}
		}
		return $db_name;
		return $db_location;
		return $db_user;
		return $db_pw;
		?>