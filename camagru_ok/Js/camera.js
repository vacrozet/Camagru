// (function() {

// var streaming	 = false;
// var video        = document.getElementById('video');
// var cover        = document.getElementById('cover');
// var canvas       = document.getElementById('canvas');
// var photo        = document.getElementById('photo');
// var startbutton  = document.getElementById('startbutton');
// var width 		 = 555;
// var height 		 = 415;

// navigator.getMedia = (navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia);

//   navigator.getMedia(
//     {
//       video: true,
//       audio: false
//     },
//     function(stream) {
//       if (navigator.mozGetUserMedia) {
//         video.mozSrcObject = stream;
//       } else {
//         var vendorURL = window.URL || window.webkitURL;
//         video.src = vendorURL.createObjectURL(stream);
//       }
//       video.play();
//     },
//     function(err) {
//       console.log("An error occured! " + err);
//     }
//   );

//   video.addEventListener('canplay', function(ev){
//     if (!streaming) {
//       height = video.videoHeight / (video.videoWidth/width);
//       video.setAttribute('width', width);
//       video.setAttribute('height', height);
//       canvas.setAttribute('width', width);
//       canvas.setAttribute('height', height);
//       streaming = true;
//     }
//   }, false);

//   function takepicture() {
//     canvas.width = width;
//     canvas.height = height;
//     canvas.getContext('2d').drawImage(video, 0, 0, width, height);
//     var data = canvas.toDataURL('image/png');
//     photo.setAttribute('src', data);
//   }

//   startbutton.addEventListener('click', function(ev){
//       takepicture();
//     ev.preventDefault();
//   }, false);

// })();

function deleteElem()
{
	var obj = document.getElementById('create');
	var old = document.getElementById('image');
	document.getElementById('create').setAttribute("style", "top: 0px; left: 0px");
	obj.removeChild(old);
} 

function deleteElemCapt()
{
	if (document.getElementById('capt'))
	{
		var obj = document.getElementById('contener');
		var old = document.getElementById('capt');
		obj.removeChild(old);
	}
}

function addfiltrephoto(png){
	if (document.getElementById('image'))
	{
		deleteElem();
	}
		// document.getElementById('testimg').src = "./img/camera.png";
		// var photo = document.createElement('create');
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
	if (document.getElementById('image')) {
		var myElement = document.createElement('canvas');
		var img = document.createElement('img');
		img.setAttribute("id", "capt");



		myElement.width = 640;
		myElement.height = 480;
		var ctx = myElement.getContext('2d');
		ctx.drawImage(video, 0, 0, 640, 480);
		img.src = myElement.toDataURL();
		document.getElementById('contener').appendChild(img);
		
		/*Trouverl'emplacement de l'img png */

		// var y = document.getElementById("create").style.top;
		// var x = document.getElementById("create").style.top;
		// var myPng = document.createElement('png');
		// myPng.setAttribute("style", "position: absolute");
		// myPng.width = 128;
		// myPng.height = 128;
		// var ctx = myElement.getContext('2d');
		// ctx.drawImage(video, x, y, 128, 128);
		// myPng.src = "./img/camera.png";
		// document.getElementById('contener').appendChild(png);
		//context.drawImage(video, 0, 0, 440, 240);
	}
});



// var canvas = document.getElementById('canvas');
// var context = canvas.getContext('2d');
// var video = document.getElementById('video');
// var i = 0;
// // Trigger photo take

// });
































