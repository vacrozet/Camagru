// var avion = getElementById('avion');
// var apple = getElementById('apple');
// var	cadre = getElementById('cadre');
// var firefox = getElementById('firefox');
// var bassine = getElementById('bassine');


function deleteElem()
{
	var obj = document.getElementById('create');
	var old = document.getElementById('image');
	document.getElementById('create').setAttribute("style", "top: 0px; left: 0px");
	obj.removeChild(old);
} 




function addfiltrephoto(png){
	if (!document.getElementById('image'))
	{
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
// var canvas = document.getElementById('canvas');
// var context = canvas.getContext('2d');
// var video = document.getElementById('video');
// var i = 0;
// // Trigger photo take
// document.getElementById("snap").addEventListener("click", function() {
// 	var myElement = document.createElement('canvas');
// 	// var png = getElementById('avion');
// 	document.getElementById('defile_photo').appendChild(myElement);
// 	myElement.getContext('2d').drawImage(video, 0, 0, 440, 240);
// 	//context.drawImage(video, 0, 0, 440, 240);

// });