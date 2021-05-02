var divs = ["general", "data", "image"];
var visibleDivId = null;
function divVisibility(divId) {
  if(visibleDivId === divId) {
    visibleDivId = null;
    //visibleDivId = divId;
  } 
  else {
    visibleDivId = divId;
  }
  
  hideNonVisibleDivs();
}
    
function hideNonVisibleDivs() {
  var i, divId, div;
  for(i = 0; i < divs.length; i++) {
    divId = divs[i];
    div = document.getElementById(divId);
    if(visibleDivId === divId) {
      div.style.display = "block";
    } 
    else {
      div.style.display = "none";
    }
  }
}