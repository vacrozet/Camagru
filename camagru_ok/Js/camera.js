// var avion = getElementById('avion');
// var apple = getElementById('apple');
// var	cadre = getElementById('cadre');
// var firefox = getElementById('firefox');
// var bassine = getElementById('bassine');



function addfiltreavion(){
	document.getElementById('testimg').src = "../img/avion.png";
}


var video = document.getElementById('video');
// Get access to the camera!
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
	// Not adding `{ audio: true }` since we only want video now
	navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
		video.src = window.URL.createObjectURL(stream);
		video.play();

	});
}
//var canvas = document.getElementById('canvas');
//var context = canvas.getContext('2d');
var video = document.getElementById('video');
var i = 0;
// Trigger photo take
document.getElementById("snap").addEventListener("click", function() {
	var myElement = document.createElement('canvas');
	// var png = getElementById('avion');
	document.getElementById('defile_photo').appendChild(myElement);
	myElement.getContext('2d').drawImage(video, 0, 0, 440, 240);
	//context.drawImage(video, 0, 0, 440, 240);

});