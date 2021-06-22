function preventDot(event) {
	if(event.key === '.'){
		event.preventDefault();
	}
}
function preventPaste(event) {
	let pasteData = event.clipboardData.getData('text'); 
	if(pasteData) {
		pasteData.replace(/[^0-9]*/g,'');
	}
}
function preventInput(event) {
	event.target.value = event.target.value.replace(/[^0-9]*/g,'');
}
function preventStringPaste(event) {
	if (event.originalEvent.clipboardData.getData('Text').match(/[^\d]/)) {
    	event.preventDefault();
  	}	
}