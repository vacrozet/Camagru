<?php  
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Camagru</title>
	<link rel="stylesheet" type="text/css" href="./index.css">
</head>
<body>
	<header class="header">
		<div class="inheaderborder">
		<?php  
			if ($_SESSION['user_name'] == "")
			{
		?>
			<div class="enfant sizeborderleft">
				<form method="post" action="./connexion.php">
					<input type="Login" name="Login" placeholder="Login"><br /><br />
					<input type="Password" name="Passwd" placeholder="Password"><br /><br />
					<input type="submit" name="Connexion" value="Connexion">
				</form><br />
				<a class="colorlink" href="./inscription.html">Creation de compte</a></div>
			<?php  
			}
			else
			{
			?>
 			<div class="enfant sizeborderleft">
	 			<p class="colorlink" style="font-size: 20px;">Login:<?php echo $_SESSION['user_name'];?></p>
	 			<a class="colorlink" href="./mon_compte.html">ACCEDER A MON COMPTE</a><br /><br />
	 			<a class="colorlink" href="./logout.php">DECONNEXION</a>
 			</div>
 			<?php
 			}
 			?>
 		</div>
		<div class="inheadercenter">
			<div class="enfant"><U><I><h1>Camagru</h1></I></U></div>
		</div>
		<div class="inheaderborder">
			<div class="enfant">
				<a href="./take_picture.html">
					<img class="appareil" src="./img/instagram.png">
				</a>
			</div>
		</div>		
	</header>
	<div class="divcenter">
		
	</div>
	<footer class="bdfooter">
		<div class="auteur">
		<div class="enfant">@vacrozet 2017 | Camagru</div>
		</div>
	</footer>
</body>
</html>