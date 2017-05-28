<div class="post">
	<div class="centerpost" id=centerpost>
		<div id=contener>
		
		<video id="video" style=" width: 640px; height: 480px;" autoplay></video>

			<div id=create class="parent" style="top:0px; left:0px;" onMouseDown="beginDrag(this, event)">
			</div>

		</div>
		<div id=command>
				<button style="background-color: transparent; border: none;"><img id=capture src="./img/capture.png"></button>
				<input type="hidden" id="inputimg_pris" name="img_pris">
				<input type="hidden" id="inputpng_pris" name="png_pris">
				<input type="hidden" id="inputtop_pris" name="top_pris">
				<input type="hidden" id="inputleft_pris" name="left_pris">
			<form method="POST" action="img_merge.php">
				<input type="hidden" id="inputimg_prec" name="img_prec">
				<input type="hidden" id="inputpng_prec" name="png_prec">
				<input type="hidden" id="inputtop_prec" name="png_prec">
				<input type="hidden" id="inputleft_prec" name="png_prec">
				<button style="background-color: transparent; border: none;"><img src="./img/checked.png"></button>
			</form>
			<button style="background-color: transparent; border: none;"><img style="cursor: pointer;`" onclick="deleteElemCapt()" src="./img/recycle.png"></button>
			<button style="background-color: transparent; border: none;"><img src="./img/upload.png"></button>
		</div>
		<div id=upload>
	<form method="POST" action="upload.php" enctype="multipart/form-data">
		<!-- On limite le fichier à 100Ko -->
		<input type="hidden" name="MAX_FILE_SIZE" value="100000">
		Fichier : <input type="file" name="avatar">
		<input type="submit" name="envoyer" value="Envoyer le fichier">
	</form>
		</div>
 		<div id=photo_prec>
 		</div>
	</div>
	<div id=defile_png>
		<img onclick="addfiltrephoto('camera')" src="./img/camera.png">
		<img onclick="addfiltrephoto('credit')" src="./img/credit-card.png">
		<img onclick="addfiltrephoto('medal')" src="./img/medal.png">
		<img onclick="addfiltrephoto('target')" src="./img/target.png">
		<img onclick="addfiltrephoto('date')" src="./img/date.png">
		<img onclick="addfiltrephoto('note')" src="./img/note.png">
		<img onclick="addfiltrephoto('valentines')" src="./img/valentines.png">
		<img onclick="addfiltrephoto('statistic')" src="./img/statistic.png">
		<img onclick="addfiltrephoto('flag')" src="./img/flag.png">
		<img onclick="addfiltrephoto('alarm')" src="./img/alarm.png">
		<img onclick="addfiltrephoto('bank')" src="./img/bank.png">
		<img onclick="addfiltrephoto('bulb')" src="./img/bulb.png">
		<img onclick="addfiltrephoto('launch')" src="./img/launch.png">
	</div>
	<script type="text/javascript" language="JavaScript" src="./Js/drag.js" ></script>
	<script language="javascript" src="./Js/camera.js"></script>
</div>