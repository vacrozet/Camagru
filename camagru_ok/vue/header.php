<?php
session_start();
$_SESSION['user_name'] = "vacrozet";
$_SESSION['admin'] = "OUI";
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
		<div style="margin-right: 10px;">
		<?php if ($_SESSION['user_name'] == "") { ?>
			<form method="post" action="./script/connexion.php">
				<input class="input_connect" type="Login" name="Login" placeholder="Login">
				<input class="input_connect" type="Password" name="Passwd" placeholder="Password">
				<button type="submit" name="Connexion" value="Sign On">Sign On</button>
			</form>
		</div>
		<?php } else 
		{ 
			if ($_SESSION['admin'] == "OUI")
			{
				echo "<img class=\"img\" src=\"./img/server.png\">";
			 } ?>
		<a href=""><img class="img" src="./img/logout.png"></a>
		<a href=""><img class="img" src="./img/instagram.png"></a>
		<a href=""><img src="./img/user-account-box.png" href=""></a>
		</div>
		<?php } ?>

	</header>