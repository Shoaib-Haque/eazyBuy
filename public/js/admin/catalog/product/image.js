"use strict";
var slideDivCount = 0;
/* 
function showImgRemoveBtn(btnId) {
    document.getElementById(btnId).style.display = "inline";
}
function hideImgRemoveBtn(event, btnId) {
    var e = event.toElement || event.relatedTarget;

    if (e.parentNode == this || e.id == btnId) {
        return;
    }

    document.getElementById(btnId).style.display = "none";
}
*/
function removeImageDiv(slideDivId) {
  var divObj = document.getElementById(slideDivId);
  divObj.remove();

  if($("#slider-container-div img").length <= 5) {
      document.getElementById('control-prev-div').style.visibility = 'hidden';
      document.getElementById('control-next-div').style.visibility = 'hidden';
  }
}


function upImage(event) {
	if($("#slider-container-div img").length >= 10) {
      	$('#sorryImageCount').modal();
      	return;
    }
    var file = URL.createObjectURL(event.target.files[0]);
    var fileName = event.target.files[0].name;
    var _size = event.target.files[0].size;
    var fileType = event.target.files[0].type;

    //cheking format
    if (!event.target.files[0] || !fileType.includes('image')) {
      $('#sorryFileFormat').modal();
      return;
    } 

    //Checking Size
    var i=0;
    while(_size>900) {
      _size /= 1024;
      i++;
    }
    if (i < 2  || (Math.round(_size*100)/100) < 1) {
      $('#sorryImageSizeSmall').modal();
      return;
    }
    else if ((Math.round(_size*100)/100) > 10) {
      $('#sorryImageSizeLarge').modal();
      return;
    }

    var slideDiv = document.createElement('div');
    slideDiv.className = 'slide';
    slideDiv.id = "slideDiv"+slideDivCount;
    slideDiv.addEventListener('mouseout', function(e) {
      hideImgRemoveBtn(e, $(this).children('BUTTON').attr('id'));
    });

    var slideImg = document.createElement("img");
    slideImg.setAttribute("src", file);
    //cheking resolution
    slideImg.onload =  function () {
      if (this.naturalWidth < 500 || this.naturalHeight < 500) {
        this.remove();
        $('#sorryImageBadResolution').modal();
        return;
      }
      if (this.naturalWidth > 10000 || this.naturalHeight > 10000) {
        this.remove();
        $('#sorryImageBigResolution').modal();
        return;
      }
    };
    slideImg.id = "img"+slideDivCount;
    slideImg.addEventListener('mouseover', function(e) {
      showImgRemoveBtn($(this).siblings('BUTTON').attr('id'));
      				//img           removebutton    id
    });

    var removeImg = document.createElement("BUTTON");
    removeImg.className = "remove-image";
    removeImg.innerHTML = "&#215;";
    removeImg.title = "Remove This Image";
    removeImg.id = "removeImg"+slideDivCount;
    removeImg.addEventListener('click', function(e) {
      removeImageDiv($(this).parent().attr('id'));
      				//button   div       id
    });

    slideDiv.appendChild(removeImg);
    slideDiv.appendChild(slideImg);
    
    var sliderContainerDiv = document.getElementById("slider-container-div");
    sliderContainerDiv.appendChild(slideDiv);
    slideDivCount++;

    if($("#slider-container-div img").length >= 6) {
      document.getElementById('control-prev-div').style.visibility = 'visible';
      document.getElementById('control-next-div').style.visibility = 'visible';
    }
}

function prevImage() {
    document.getElementById('slider-container-div').scrollLeft -= 270;
}

function nextImage() {
    document.getElementById('slider-container-div').scrollLeft += 270;
}