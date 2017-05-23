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
					<div class="photo"><img onclick="addfiltreavion()" id="avion" class="img_photo" src="../img/avion.png"></div>
					<div class="photo"><img onclick="addfiltre(apple)" id="apple" class="img_photo" src="../img/apple.png"></div>
					<div class="photo"><img onclick="addfiltre(cadre)" id="cadre" class="img_photo" src="../img/tablette.png"></div>
					<div class="photo"><img onclick="addfiltre(firefox)" id="firefox" class="img_photo" src="../img/irefox.png"></div>
					<div class="photo"><img onclick="addfiltre(bassine)" id="bassine" class="img_photo" src="../img/bassine.png"></div>
					</div>
				</div>
				<div class="cadre" style="justify-content: center; display: flex;">
					<div style="width: 80%;">
						<video id="video" style="width: 100%; height: 100%;" autoplay></video>
						<img id="testimg" src="" style="top: 0px; position: absolute; width: 10vw; right: 100px;" />
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
	<?php  require_once("./footer.html"); ?>
	<script language="javascript" src="../js/camera.js"></script>
</body>
</html>