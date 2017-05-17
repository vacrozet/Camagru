<?php  
session_start();
// require_once dirname(__DIR__)."/models/user.class.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Camagru</title>
	<link rel="stylesheet" type="text/css" href="./index.css">
	<link rel="shortcut icon" href="../img/instagram-draw-logo.png">

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
			<div class="enfant">
					<a href="#">
					<img  style="max-height: 90px; max-width: 90px;" class="appareil" src="../img/insta.png">
				</a>
			</div>
		</div>		
	</header>
	<div class="divcenter direction">
		<div class="take parents">
			<div class="take_picture">
				<div class="choose">
					<div style="height: 30%; text-align: center; display: flex;">
						<p class="enfant" style="font-size: 20px;"><u><I><B>CHOISI TON FILTRE:</B></I></u></p>
					</div>
					<div style="height: 70%; display: flex; flex-direction: row; justify-content: center;">
					<div style="width: 20%; height: 100%;"><img style="max-width: 100%; max-height: 100%;" src="../img/avion.png"></div>
					<div style="width: 20%; height: 100%;"><img style="max-width: 100%; max-height: 100%;" src="../img/apple.png"></div>
					<div style="width: 20%; height: 100%;"><img style="max-width: 100%; max-height: 100%;" src="../img/tablette.png"></div>
					<div style="width: 20%; height: 100%;"><img style="max-width: 100%; max-height: 100%;" src="../img/irefox.png"></div>
					<div style="width: 20%; height: 100%;"><img style="max-width: 100%; max-height: 100%;" src="../img/bassine.png"></div>
					</div>
				</div>
				<div class="cadre" style="justify-content: center; display: flex;">
					<div style="width: 80%;">
						<video id="video" style="width: 100%; height: 100%;" autoplay></video>
					</div>
					<div style="margin: auto;">
						<button style="border-radius: 100px; text-align: center; height : 6vw; width: 6vw;" id="snap">Snap</button>
					</div>				
				</div>
			</div>
		</div>
		<div class="visu">
			<div class="enfant test">
				<div class="choose_filtre">
						<div class="enfant">
							<p style="font-size: 16px; "><u><B><I>visulisation des anciennes photo</I></B></u></p>
						</div>
				</div>
				<div id="defile_photo" class="defile_photo" style="display: flex; overflow: auto; flex-direction: column;">
						<!-- <canvas id="canvas" style="width: 100%; height: 20%;"></canvas> -->
				</div>
			</div>
		</div>
	</div>
	<footer class="bdfooter">
		<div class="auteur">
		<div class="enfant">@vacrozet 2017 | Camagru</div>
		</div>
	</footer>
	<script language="javascript" src="../js/camera.js"></script>
</body>
</html>