function getPosition(element)
{
	var left = 0;
	var top = 0;
	var e = document.getElementById(element);
	while (e.offsetParent != undefined && e.offsetParent != null)
	{
		left += e.offsetLeft + (e.clientLeft != null ? e.clientLeft : 0);
		top += e.offsetTop + (e.clientTop != null ? e.clientTop : 0);
		e = e.offsetParent;
	}
	return new Array(left,top);
}

function beginDrag(elementToDrag, event) {
	try {
		var x = parseInt(elementToDrag.style.left);
		var y = parseInt(elementToDrag.style.top);
		var deltaX = event.clientX - x;
		var deltaY = event.clientY - y;		

		document.addEventListener("mousemove", moveHandler, true);
		document.addEventListener("mouseup", upHandler, true);
		document.addEventListener("mouseout", upHandler, true);
		event.stopPropagation( );
		event.preventDefault( );
	} catch(e) {

}
    function moveHandler(event) {
		var tab = getPosition('lock');
		var hauteur = document.getElementById('lock').clientHeight;
		var largeur = document.getElementById('lock').clientWidth;

		// console.log(largeur)
		// console.log(tab[0])
		// console.log((event.clientX - deltaX))
		if (largeur - 128 >= (event.clientX - deltaX) && 0 <= (event.clientX - deltaX))
			elementToDrag.style.left = (event.clientX - deltaX) + "px";
		if (hauteur - 128 >= (event.clientY - deltaY) && 0 <= (event.clientY - deltaY))
			elementToDrag.style.top = (event.clientY - deltaY) + "px";
		event.stopPropagation();
	}
	function upHandler(event) {
		document.removeEventListener("mouseup", upHandler, true);
		document.removeEventListener("mousemove", moveHandler, true);
		event.stopPropagation( );
	}
}