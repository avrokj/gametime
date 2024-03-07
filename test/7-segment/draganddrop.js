function allowDrop(event) {
    event.preventDefault();
}

function drag(event) {
    event.dataTransfer.setData("text", event.target.id);
}

function drop(event) {
    event.preventDefault();
    var data = event.dataTransfer.getData("text");
    var draggableElement = document.getElementById(data);
    var dropzone = event.target.closest(".dropzone");
    if (dropzone && dropzone.childElementCount < 5) {
        var clone = draggableElement.cloneNode(true);
        clone.removeAttribute("draggable");
        clone.classList.add("dropped-item");
        var span = document.createElement("span");
        span.innerText = draggableElement.innerText;
        clone.appendChild(span);
        dropzone.appendChild(clone);
        draggableElement.style.backgroundColor = "green"; // Change background color of the dragged item
    }
}
