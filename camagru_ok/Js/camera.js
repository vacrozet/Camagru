function deleteElem() {
	var obj = document.getElementById("create");
	var old = document.getElementById("image");
	document.getElementById("create").setAttribute("style", "top: 0px; left: 0px");
	obj.removeChild(old);
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
	myElement.setAttribute("style", "top: 0px;left: 0px;");	
	myElement.setAttribute("onMouseDown", "Javascript:clicked(event)");
	myElement.setAttribute("onMouseDown", "Javascript:clicked(event)");
	myElement.setAttribute("onDrag", "Javascript:dragged(event)");
	myElement.setAttribute("onDblClick", "deleteElem()");
	document.getElementById('create').appendChild(myElement);
}

var video = document.getElementById('video');
console.log(video);
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
	navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
 		video.src = window.URL.createObjectURL(stream);
		video.play();
	});
}
 

document.getElementById("capture").addEventListener("click", function() {
	if (!document.getElementById('capt') && document.getElementById('image')) {
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
		png_pris.setAttribute("src", "./img/camera.png");
		png_pris.src = document.getElementById('image').src;
		png_pris.setAttribute("id", "png_pris");
		png_pris.setAttribute("style", "position: absolute");
		png_pris.style.top = document.getElementById("create").style.top;
		png_pris.style.left = document.getElementById("create").style.left;
		document.getElementById('contener').appendChild(png_pris);
	}
});































