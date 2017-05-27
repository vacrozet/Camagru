<div class="post">
	<div class="centerpost" id=centerpost>
		<div id=contener>
		

		<video id="video" style="min-width: 320px; width: 100%; height: auto;" autoplay></video>
<!--  		<video id="video"></video>
 -->

			<div id=create class="parent" style="top:0px; left:0px;" onMouseDown="beginDrag(this, event)">
			</div>

		</div>
		<div id=command>
			<button style="background-color: transparent; border: none;"><img id=capture src="./img/capture.png"></button>
			<form method="POST" action="./contrôleur/img_merge.php">
				<input type="hidden" id="inputimg_pris" name="img_pris">
				<input type="hidden" id="inputpng_pris" name="png_pris">
				<input type="hidden" id="inputtop_pris" name="top_pris">
				<input type="hidden" id="inputleft_pris" name="left_pris">
				<button style="background-color: transparent; border: none;"><img src="./img/checked.png"></button>
			</form>
			<form method="POST" action="img_merge_2.php">
				<input type="hidden" id="inputimg_prec" name="img_prec">
				<input type="hidden" id="inputpng_prec" name="png_prec">
				<input type="hidden" id="inputtop_prec" name="png_prec">
				<input type="hidden" id="inputleft_prec" name="png_prec">
				<button style="background-color: transparent; border: none;"><img src="./img/completed.png"></button>
			</form>
			<button style="background-color: transparent; border: none;"><img style="cursor: pointer;`" onclick="deleteElemCapt()" src="./img/recycle.png"></button>
			<button style="background-color: transparent; border: none;"><img src="./img/upload.png"></button>
		</div>
		<div class="png">
			<img onclick="addfiltrephoto('camera')" src="./img/camera.png">
			<img onclick="addfiltrephoto('credit')" src="./img/credit-card.png">
			<img onclick="addfiltrephoto('medal')" src="./img/medal.png">
			<img onclick="addfiltrephoto('target')" src="./img/target.png">
			<img onclick="addfiltrephoto('note')" src="./img/note.png">
			<img onclick="addfiltrephoto('valentines')" src="./img/valentines.png">
<!--  JEN SUIS AU IMAGE JS...
 -->	</div>
 		<div id=photo_prec>
 		</div>
	</div>
	<script type="text/javascript" language="JavaScript" src="./Js/drag.js" ></script>
	<script language="javascript" src="./Js/camera.js"></script>
</div>