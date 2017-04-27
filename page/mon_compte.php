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
 			<div class="enfant sizeborderleft" style="align-items: center;">
  				<div style="height: 100%; margin-left: 10px;">
	 				<a style="height: 100%;" href="../index.php"><img style="" src="../img/web-page-home.png" title=""></a>
	 			</div>
	 			<div style="height: 100%;">
	 				<a style="margin-left: 10px;" href="../script/logout.php"><img src="../img/logout.png"></a>
		 		</div>
	 			<?php
	 			if ($_SESSION['admin'] == "OUI")
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
			<div class="enfant" style="">
				<a href="./page/take_picture.php">
					<img  style="max-height: 78px; max-width: 78px;" class="appareil" src="../img/insta.png">
				</a>
			</div>
		</div>		
	</header>
	<div class="divcenter">
		<div class="enfant divcentermoncompte">
			<div style="height: 15%; width: 90%; border: solid 1px red; margin: auto; min-height: 50px; max-height: 80px; text-align: center; display: flex">
				<div class="enfant" style="font-size: 30px; color: white;">
					<I><B><U>Mon Compte</U></B></I>
				</div>
			</div>
			<div style="height: 90%; width: 60%; border: solid 1px red; margin: auto;">
				<p><?php  echo $_SESSION['login'];
	    		 			echo $_SESSION['nom'];
	    		 			echo $_SESSION['prenom'];
	    		 			echo $_SESSION['adresse'];
	    		 			echo $_SESSION['CP'];
	    		 			echo $_SESSION['Ville'];
	    		 			echo $_SESSION['numero'];
	    		 			echo $_SESSION['mail'];       ?>                 </p>
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