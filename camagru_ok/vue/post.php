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
			<img id=capture src="./img/capture.png">
			<img src="./img/checked.png">
			<img style="cursor: pointer;`" onclick="deleteElemCapt()" src="./img/recycle.png">
			<img src="./img/upload.png">
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