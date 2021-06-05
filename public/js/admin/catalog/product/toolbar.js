var divs = ["general", "data", "links", "options", "map", "image", "features"];

function divVisibility(divId) {
  visibleDivId = divId;

  /*
  if(visibleDivId === divId) {
    //visibleDivId = null;
    visibleDivId = divId;
  } 
  else {
    visibleDivId = divId;
  }
  */
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