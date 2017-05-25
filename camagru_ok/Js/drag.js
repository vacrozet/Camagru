function getPosition(element)
{
	var left = 0;
	var top = 0;
	/*On récupère l'élément*/
	var e = document.getElementById(element);
	/*Tant que l'on a un élément parent*/
	while (e.offsetParent != undefined && e.offsetParent != null)
	{
		/*On ajoute la position de l'élément parent*/
		left += e.offsetLeft + (e.clientLeft != null ? e.clientLeft : 0);
		top += e.offsetTop + (e.clientTop != null ? e.clientTop : 0);
		e = e.offsetParent;
	}
	return new Array(left,top);
}

function beginDrag(elementToDrag, event) {
	try {
		// Figure out where the element currently is
		// The element must have left and top CSS properties in a style attribute
		// Also, we assume they are set using pixel units
		var x = parseInt(elementToDrag.style.left);
		var y = parseInt(elementToDrag.style.top);
		// Compute the distance between that point and the mouse-click
		// The nested moveHandler function below needs these values
		var deltaX = event.clientX - x;
		var deltaY = event.clientY - y;
		
	
		document.addEventListener("mousemove", moveHandler, true);
		document.addEventListener("mouseup", upHandler, true);
		document.addEventListener("mouseout", upHandler, true);
	
		// We've handled this event. Don't let anybody else see it.
		event.stopPropagation( );
		event.preventDefault( );
	} catch(e) {
		
	}

    /**
     * This is the handler that captures mousemove events when an element
     * is being dragged. It is responsible for moving the element.
     **/
    function moveHandler(event) {
        // Move the element to the current mouse position, adjusted as
        // necessary by the offset of the initial mouse-click

        var tab = getPosition('video');
        var hauteur = document.getElementById('video').clientHeight;
        var largeur = document.getElementById('video').clientWidth;

        console.log(largeur)
        console.log(tab[0])
        console.log((event.clientX - deltaX))


        if (largeur - 128 >= (event.clientX - deltaX) && 0 <= (event.clientX - deltaX))
			elementToDrag.style.left = (event.clientX - deltaX) + "px";
        if (hauteur - 128 >= (event.clientY - deltaY) && 0 <= (event.clientY - deltaY))
		elementToDrag.style.top = (event.clientY - deltaY) + "px";

        // And don't let anyone else see this event
        event.stopPropagation( );
    }

    /**
     * This is the handler that captures the final mouseup event that
     * occurs at the end of a drag
     **/
    function upHandler(event) {
        // Unregister the capturing event handlers
        document.removeEventListener("mouseup", upHandler, true);
        document.removeEventListener("mousemove", moveHandler, true);
        // And don't let the event propagate any further
        event.stopPropagation( );
    }
}