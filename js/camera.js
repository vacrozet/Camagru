function deleteElem() {
	var obj = document.getElementById("create");
	var old = document.getElementById("image");
	document.getElementById("create").setAttribute("style", "top: 0px; left: 0px");
	obj.removeChild(old);
	if (document.getElementById('img_up')) {
		var old = document.getElementById('img_up');
		var obj = document.getElementById('lock');
		obj.removeChild(old);
		document.getElementById('video').removeAttribute("style");
	}
} 


function deleteElemCapt() {
		if (document.getElementById('img_pris')) {
			if (document.getElementById('img_prec')) {
			var obj = document.getElementById('photo_prec');
			var old = document.getElementById('img_prec');
			var old2 =document.getElementById('png_prec');
			obj.removeChild(old);
			obj.removeChild(old2);
			}
			var myElement = document.createElement('canvas');
			myElement.width = 640;
			myElement.height = 480;
			myElement.getContext('2d');

			var img_prec = document.createElement('img');
			img_prec.src = document.getElementById('img_pris').src;
			img_prec.setAttribute("id", "img_prec");
			img_prec.setAttribute("style", "position: absolute");
			document.getElementById('photo_prec').appendChild(img_prec);
			
			var png_prec = document.createElement('img');
			png_prec.setAttribute("id", "png_prec");
			png_prec.src = document.getElementById('png_pris').src; 
			png_prec.style.top = document.getElementById("png_pris").style.top;
			png_prec.style.left = document.getElementById("png_pris").style.left;
			document.getElementById('photo_prec').appendChild(png_prec);
			document.getElementById('photo_prec').setAttribute('title', 'Publier');
			document.getElementById('photo_prec').setAttribute('onclick', 'publiPrec()');

			document.getElementById('inputimg_prec').value = document.getElementById('inputimg_pris').value;
			document.getElementById('inputpng_prec').value = document.getElementById('inputpng_pris').value;

			document.getElementById('inputtop_prec').value = document.getElementById('inputtop_pris').value;
			document.getElementById('inputleft_prec').value = document.getElementById('inputleft_pris').value;
			document.getElementById('inputimg_pris').removeAttribute("value");
			document.getElementById('inputpng_pris').removeAttribute("value");
			document.getElementById('inputtop_pris').removeAttribute("value");
			document.getElementById('inputleft_pris').removeAttribute("value");
			deleteElem();
			var obj = document.getElementById('contener');
			var old = document.getElementById('img_pris');
			var old2 =document.getElementById('png_pris');
			obj.removeChild(old);
			obj.removeChild(old2);
		}
}

function addfiltrephoto(png){
	if (document.getElementById('image')) {
		deleteElem();
	}
	var myElement = document.createElement("img");
	myElement.setAttribute("id", "image");
	if (png == "camera")
		myElement.setAttribute("src", "./img/camera.png");
	if (png == "medal")
		myElement.setAttribute("src", "./img/medal.png");
	if (png == "valentines")
		myElement.setAttribute("src", "./img/valentines.png");
	if (png == "target")
		myElement.setAttribute("src", "./img/target.png");
	if (png == "note")
		myElement.setAttribute("src", "./img/note.png");
	if (png == "credit")
		myElement.setAttribute("src", "./img/credit-card.png");
	if (png == "statistic")
		myElement.setAttribute("src", "./img/statistic.png");
	if (png == "flag")
		myElement.setAttribute("src", "./img/flag.png");
	if (png == "alarm")
		myElement.setAttribute("src", "./img/alarm.png");
	if (png == "bank")
		myElement.setAttribute("src", "./img/bank.png");
	if (png == "bulb")
		myElement.setAttribute("src", "./img/bulb.png");
	if (png == "launch")
		myElement.setAttribute("src", "./img/launch.png");
	if (png == "date")
		myElement.setAttribute("src", "./img/date.png");
	myElement.setAttribute("style", "top: 0px;left: 0px;");	
	myElement.setAttribute("onMouseDown", "Javascript:clicked(event)");
	myElement.setAttribute("onMouseDown", "Javascript:clicked(event)");
	myElement.setAttribute("onDrag", "Javascript:dragged(event)");
	myElement.setAttribute("onDblClick", "deleteElem()");
	document.getElementById('create').appendChild(myElement);
}

var video = document.getElementById('video');
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
	navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
 		video.src = window.URL.createObjectURL(stream);
		video.play();
	});
}
 

document.getElementById("capture").addEventListener("click", function() {
	if (!document.getElementById('capt') && document.getElementById('image')) {
		if (!document.getElementById('img_up'))
		{
			var myElement = document.createElement('canvas');
			myElement.width = 640;
			myElement.height = 480;


			var img_pris = document.createElement('img');
			img_pris.setAttribute("id", "img_pris");
			var ctx = myElement.getContext('2d');
			ctx.drawImage(video, 0, 0, 640, 480);
			img_pris.src = myElement.toDataURL();

			document.getElementById('contener').appendChild(img_pris);
			var png_pris = document.createElement('img');
			png_pris.src = document.getElementById('image').src;
			png_pris.setAttribute("id", "png_pris");
			png_pris.setAttribute("style", "position: absolute");
			png_pris.style.top = document.getElementById("create").style.top;
			png_pris.style.left = document.getElementById("create").style.left;
			document.getElementById('contener').appendChild(png_pris);

			document.getElementById('inputimg_pris').value = img_pris.getAttribute("src");
			document.getElementById('inputpng_pris').value = document.getElementById('image').getAttribute("src");
			document.getElementById('inputtop_pris').value = document.getElementById("create").style.top;
			document.getElementById('inputleft_pris').value = document.getElementById("create").style.left;
		}
		else
		{
			if (document.getElementById('img_prec')) {
				var obj = document.getElementById('photo_prec');
				var old = document.getElementById('img_prec');
				var old2 =document.getElementById('png_prec');
				obj.removeChild(old);
				obj.removeChild(old2);
				}

			var img_prec = document.createElement('img');
			img_prec.src = document.getElementById('img_up').src;
			img_prec.setAttribute("id", "img_prec");
			img_prec.setAttribute("style", "position: absolute");
			document.getElementById('photo_prec').appendChild(img_prec);
			
			var png_prec = document.createElement('img');
			png_prec.setAttribute("id", "png_prec");
			png_prec.src = document.getElementById('image').src; 
			png_prec.style.top = document.getElementById("create").style.top;
			png_prec.style.left = document.getElementById("create").style.left;
			document.getElementById('photo_prec').appendChild(png_prec);
			document.getElementById('img_prec').setAttribute("style", "height: 480px; width: 640px;")
			document.getElementById('photo_prec').setAttribute('title', 'Publier');
			document.getElementById('photo_prec').setAttribute('onclick', 'publiPrec()');

			document.getElementById('inputimg_prec').value = document.getElementById('img_up').src;
			document.getElementById('inputpng_prec').value = document.getElementById('image').getAttribute("src");
			document.getElementById('inputtop_prec').value = document.getElementById('create').style.top;
			document.getElementById('inputleft_prec').value = document.getElementById('create').style.left;

			deleteElem();
				
	}
}
});

function previewFile() {
	var preview = document.createElement('img');
	var file = document.querySelector('input[type=file]').files[0];
	var reader = new FileReader();
	reader.addEventListener("load", function () {
			preview.src = reader.result;
			}, false);
	reader.readAsDataURL(file);
	preview.setAttribute("id", "img_up");
	document.getElementById('lock').appendChild(preview);
	document.getElementById('video').setAttribute("style", "display:none");

}