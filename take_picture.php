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
	 			<p class="colorlink" style="font-size: 20px;">Login: <?php echo $_SESSION['user_name'];?></p>
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
			<?php 
				if ($_SESSION['user_name'] != "")
				{
			?>
			<div class="enfant">
				<a href="./take_picture.php">
					<img class="appareil" src="./img/instagram.png">
				</a>
			</div>
			<?php 
				}
				else
				{
			?>
			<div class="enfant">
				<a href="#">
					<img class="appareil" src="./img/instagram.png">
				</a>
			</div>
			<?php 
			}
			?>


		</div>		
	</header>
	<div class="divcenter direction">
		<div class="visu">
			<div class="enfant test">
				<div class="choose_filtre">
					<div class="ecart">
						<div class="enfant">
							<p style="font-size: 16px; "><u><B><I>visulisation des anciennes photo</I></B></u></p>
						</div>
					</div>
					<div class="ecart" style="border: solid 1px red;">
							<div class="dropdown" style="border: solid 1px red;">
								<button class="bouton" class="dropbtn">------>filtre<------</button>
								<?php include "./menu.php"; ?>
							</div>
					</div>
				</div>
				<div class="defile_photo">
					
				</div>
			</div>
		</div>
		<div class="take parents">
			<div class="take_picture">
				<div class="choose">
					<div style="height: 50%; text-align: center; display: flex;">
						<p class="enfant" style="font-size: 20px;"><u><I><B>CHOISI TON FILTRE:</B></I></u></p>
					</div>
					<div style="height: 50%; display: flex; flex-direction: row; justify-content: space-between;">
						<div style="width: 15%; margin: auto; text-align: center;">Exemple1.png<input type="checkbox" name="Exemple1 text-align: center;"> </div>
						<div style="width: 15%; margin: auto; text-align: center;">Exemple2.png<input type="checkbox" name="Exemple1 text-align: center;"> </div>
						<div style="width: 15%; margin: auto; text-align: center;">Exemple3.png<input type="checkbox" name="Exemple1 text-align: center;"> </div>
						<div style="width: 15%; margin: auto; text-align: center;">Exemple4.png<input type="checkbox" name="Exemple1 text-align: center;"> </div>
						<div style="width: 15%; margin: auto; text-align: center;">Exemple5.png<input type="checkbox" name="Exemple1 text-align: center;"> </div>
					</div>
				</div>
				<div class="cadre"></div>
				<div class="enter"></div>
			</div>
		</div>
	</div>
	<footer class="bdfooter">
		<div class="auteur">
		<div class="enfant">@vacrozet 2017 | Camagru</div>
		</div>
	</footer>
</body>
</html>