<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Camagru</title>
	<link rel="stylesheet" type="text/css" href="./vue/index.css">
	<link rel="shortcut icon" href="../img/instagram-draw-logo.png">
</head>
<body>
	<header class="header">
		<div class="titre"><p id="titre"><u><I>Camagru</I></u></p></div>
		<div style="border: solid 1px red; width: 50px;"></div>
		<div style="border: solid 1px red; width: 50px;"></div>
		<div style="border: solid 1px red; width: 50px;"></div>
		<div>
			<form method="post" action="./script/connexion.php">
				<input type="Login" name="Login" placeholder="Login"><br />
				<input type="Password" name="Passwd" placeholder="Password"><br />
				<input type="submit" name="Connexion" value="Sign On">
			</form>
		</div>
	</header>
<!-- 	<header class="header">
		<div class="inheaderborder">
		<div class="enfant sizeborderleft" style="align-items: center;">
  				<div style="height: 100%; margin-left: 10px;">
	 				<a style="height: 100%;" href="../index.php"><img style="" src="../img/web-page-home.png" title=""></a>
	 			</div>
	 			<div style="height: 100%;">
	 				<a style="margin-left: 10px;" href="../script/logout.php"><img src="../img/logout.png"></a>
		 		</div>
	 			<?php
	 			// if ($_SESSION['admin'] == "OUI")
	 			{
	 			?>
	 				<div style="height: 100%;">
		 				<a style="margin-left: 10px;" href="./script/admin.php"><img src="../img/database.png"></a>
			 		</div>
	 			<?php	
	 			}
	 			?>
	 		</div>
 		</div>
		<div class="inheadercenter">
			<div class="enfant"><U><I><h1>Camagru</h1></I></U></div>
		</div>
		<div class="inheaderborder">
			<div class="enfant">
					<a href="#">
					<img  style="max-height: 90px; max-width: 90px;" class="appareil" src="../img/insta.png">
				</a>
			</div>
		</div>		
	</header> -->