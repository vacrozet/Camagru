<?php
session_start();
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
		<div class="titre"><a style="text-decoration: none;" href="./root.php?vue=wall"><p id="titre"><I>Camagru</I></p></a></div>
		<div style="margin-right: 10px;">
		<?php if ($_SESSION['user_name'] == "") { ?>
			<form method="post" action="./contrôleur/connexion.php">
				<input class="input_connect" type="Login" name="Login" placeholder="Login">
				<input class="input_connect" type="Password" name="Passwd" placeholder="Password">
				<button class="button" type="submit" name="Connexion" value="Sign On">Sign On</button>
			</form>
		</div>
		<?php } else 
		{ 
			if ($_SESSION['admin'] == "OUI")
			{
				echo "<a href=\"#\"><img title=\"admin\" class=\"img\" src=\"./img/server.png\"></a>";
			 } ?>
		<a href="./root.php?script=logout"><img title="logout" class="img" src="./img/logout.png"></a>
		<a href="./root.php?vue=post"><img title="posts" class="img" src="./img/instagram.png"></a>
		<a href="./root.php?vue=account"><img title="<?php echo $_SESSION['user_name']; ?>" src="./img/user-account-box.png" href=""></a>
		</div>
		<?php } ?>

	</header>