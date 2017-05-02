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
			<div class="enfant">
					<a href="#">
					<img  style="max-height: 90px; max-width: 90px;" class="appareil" src="../img/insta.png">
				</a>
			</div>
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
				<div class="defile_photo" style="display: flex;">
					<div style="height: 240px; width: 320px; border: solid 1px red;">
						<canvas id="canvas" width="640" height="480"></canvas>
					</div>
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
				<div class="cadre" style="">
					<div class="enfant">
						<video id="video" width="640" height="480" autoplay></video>
						<button style="border-radius: 100px; text-align: center;" id="snap">Snap Photo</button>
						<script type="text/javascript">
							// Grab elements, create settings, etc.
							var video = document.getElementById('video');

							if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
							    // Not adding `{ audio: true }` since we only want video now
							    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
							        video.src = window.URL.createObjectURL(stream);
							        video.play();
							    });
							}

							var canvas = document.getElementById('canvas');
							var context = canvas.getContext('2d');
							var video = document.getElementById('video');

							// Trigger photo take
							document.getElementById("snap").addEventListener("click", function() {
								context.drawImage(video, 0, 0, 320, 240);
							});
						</script>
					</div>
				</div>
				<div class="enter ">
					<div class="enfant">
					</div>					
				</div>
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