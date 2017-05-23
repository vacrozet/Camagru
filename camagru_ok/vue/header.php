<?php
session_start();
$_SESSION['user_name'] = "vacrozet";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Camagru</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./vue/index.css">
	<link rel="shortcut icon" href="../img/instagram-draw-logo.png">
</head>
<body>
	<header class="header">
		<div class="titre"><p id="titre"><I>Camagru</I></p></div>
		<?php if ($_SESSION['user_name'] != "") { ?>
		<div style="margin-right: 10px;">
			<form method="post" action="./script/connexion.php">
				<input type="Login" name="Login" placeholder="Login">
				<input type="Password" name="Passwd" placeholder="Password">
				<button type="submit" name="Connexion" value="Sign On">Sign On</button>
			</form>
		</div>
		<?php } else { ?>

		<?php } ?>

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