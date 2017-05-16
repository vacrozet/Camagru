<?php  
session_start();
$_SESSION['changement'] = 0;
// require_once dirname(__DIR__)."/camagru/config/setup.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Camagru</title>
	<link rel="stylesheet" type="text/css" href="./page/index.css">
	<link rel="shortcut icon" href="./img/instagram-draw-logo.png">
</head>
<body>
	<header class="header">
		<div class="inheaderborder">
		<?php  
			if ($_SESSION['user_name'] == "")
			{
		?>
			<div class="sizeborderleft">
				<div class="enfant direction">
					<div style="margin-left: 10px;">
						<form method="post" action="./script/connexion.php">
							<input type="Login" name="Login" placeholder="Login"><br />
							<input type="Password" name="Passwd" placeholder="Password"><br />
							<input type="submit" name="Connexion" value="Connexion">
						</form>
						<a class="colorlink" href="./page/recup_passwd.php">Mot de passe oublié</a>
					</div>
					<div style="margin-left: 10px;">
						<a href="./page/inscription.php"><img src="./img/user.png"></a>
					</div>
				</div>
			</div>				
			<?php  
			}
			else
			{
			?>
 			<div class="enfant sizeborderleft" style="align-items: center;">
 				<div style="height: 100%; margin-left: 10px;">
	 				<a style="height: 100%;" href="./script/mon_compte.php"><img style="" src="./img/compte.png" title="<?php echo $_SESSION['user_name'];?>"></a>
	 			</div>
	 			<div style="height: 100%;">
	 				<a style="margin-left: 10px;" href="./script/logout.php"><img src="./img/logout.png"></a>
		 		</div>
	 			<?php
	 			if ($_SESSION['admin'] == "OUI")
	 			{
	 			?>
	 				<div style="height: 100%;">
		 				<a style="margin-left: 10px;" href="./page/admin.php"><img src="./img/database.png"></a>
			 		</div>
	 			<?php	
	 			}
	 			?>
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
			<div class="enfant" style="">
				<a href="./page/take_picture.php">
					<img  style="max-height: 78px; max-width: 78px;" class="appareil" src="./img/insta.png">
				</a>
			</div>
			<?php 
				}
				else
				{
			?>
			<div class="enfant">
				<a href="#">
					<img  style="max-height: 78px; max-width: 78px;" class="appareil" src="./img/insta.png">
				</a>
			</div>
			<?php 
			}
			?>


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