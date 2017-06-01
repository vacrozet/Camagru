<div class="post">
	<div class="centerpost" id=centerpost>
		<div id=contener>
			<div id=lock style="height: 100%; width: 100%;">
				<video id="video" style=" width: 640px; height: 480px;" autoplay></video>
			</div>
 			<div id=create class="parent" style="top:0px; left:0px;" onMouseDown="beginDrag(this, event)"></div>

		</div>
		<div id=command>
				<button id="capture" style="background-color: transparent; border: none;"><img style="pointer-events: none;" src="./img/capture.png"></button>
				<input type="hidden" id="inputimg_pris" name="img_pris">
				<input type="hidden" id="inputpng_pris" name="png_pris">
				<input type="hidden" id="inputtop_pris" name="top_pris">
				<input type="hidden" id="inputleft_pris" name="left_pris">
			<form method="POST" action="./controleur/img_merge.php">
				<input type="hidden" id="inputimg_prec" name="img_prec">
				<input type="hidden" id="inputpng_prec" name="png_prec">
				<input type="hidden" id="inputtop_prec" name="top_prec">
				<input type="hidden" id="inputleft_prec" name="left_prec">
				<button style="background-color: transparent; border: none;"><img src="./img/checked.png"></button>
			</form>
			<button onclick="deleteElemCapt()" style="background-color: transparent; border: none; cursor: pointer;"><img style="pointer-events: none;"  src="./img/recycle.png"></button>
			<button style="background-color: transparent; border: none;"><img src="./img/upload.png"></button>
		</div>
		<div id=upload>
			<input id="file" type="file" onchange="previewFile()">
			<br>
			<form id="zdp" method="post" enctype="multipart/form-data" action="#" class="upload-form">
				<br>
				<input id="test" type="hidden" name="test" value=>
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
	<script type="text/javascript" language="javascript" src="./Js/camera.js"></script>
</div>