"use strict";
var slideDivCount = 0;

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

function singleRemoveImage(slideDivId, rowid, iIndex, jIndex) {
  jQuery.noConflict()(function ($) { 
    $(document).ready(function () {
      var k = parseInt($("#"+slideDivId+" input[type='hidden']").val());

      var fileStatus = document.createElement('input');
      fileStatus.setAttribute('type', 'hidden');
      fileStatus.setAttribute("name", "singleFileStatus"+iIndex+jIndex+k);
      fileStatus.value = "Deleted";
      $("#slider-container"+rowid).append(fileStatus);

      var divObj = document.getElementById(slideDivId);
      divObj.remove();

      /*
      if($("#slider-container"+rowid+" img").length <= 2) {
        document.getElementById('control-prev-btn'+rowid).style.display = 'none';
        document.getElementById('control-next-btn'+rowid).style.display = 'none';
      }
      */

      if($("#slider-container"+rowid+" img").length <= 0) {
        var sliderContainerDiv = document.getElementById("slider-container"+rowid);
        sliderContainerDiv.style.display = "none";
      }
    });
  });
}

function singleUploadImage(event, rowid, iIndex, jIndex) {
  jQuery.noConflict()(function ($) { 
    $(document).ready(function () {
      var files = Array.prototype.slice.call(event.target.files);

      for (var f = 0; f < files.length; f++) { 
        if($("#slider-container"+rowid+" img").length >= 10) {
          return;
        }     
        var file = URL.createObjectURL(event.target.files[f]);
        var fileName = event.target.files[f].name;
        var _size = event.target.files[f].size;
        var fileType = event.target.files[f].type;

        //cheking format
        if (!event.target.files[f] || !fileType.includes('image')) {
          $('#sorryFileFormat').modal();
          return;
        } 

        //Checking Size
        /*
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
        */

        var slideDiv = document.createElement('div');
        slideDiv.className = 'slide';
        slideDiv.id = "slideDiv"+slideDivCount+rowid;
        slideDiv.addEventListener('mouseout', function(e) {
          hideImgRemoveBtn(e, $(this).children('BUTTON').attr('id'));
        });

        var slideImg = document.createElement("img");
        slideImg.setAttribute("src", file);
        slideImg.id = "slideimg"+slideDivCount+rowid;
        slideImg.name = "slideimg"+slideDivCount+rowid;

        //cheking resolution
        /*
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
        */
        
        slideImg.id = "img"+slideDivCount+rowid;
        slideImg.addEventListener('mouseover', function(e) {
          showImgRemoveBtn($(this).siblings('BUTTON').attr('id'));
        });

        var removeImg = document.createElement("BUTTON");
        removeImg.setAttribute('type', 'button');
        removeImg.className = "remove-image";
        removeImg.innerHTML = "&#215;";
        removeImg.title = "Remove This Image";
        removeImg.id = "removeImg"+slideDivCount+rowid;
        removeImg.addEventListener('click', function(e) {
          singleRemoveImage($(this).parent().attr('id'), rowid, iIndex, jIndex);
        });

        var k = parseInt(document.getElementById("slideCount"+rowid).value);

        var slideIndex = document.createElement('input');
        slideIndex.setAttribute('type', 'hidden');
        slideIndex.value = k;

        slideDiv.appendChild(removeImg);
        slideDiv.appendChild(slideImg);
        slideDiv.appendChild(slideIndex);

        document.getElementById("slideCount"+rowid).value = k+1;
        
        var sliderContainerDiv = document.getElementById("slider-container"+rowid);
        sliderContainerDiv.appendChild(slideDiv);
        slideDivCount++;

        if($("#slider-container"+rowid+" img").length >= 1) {
          sliderContainerDiv.style.display = "flex";
        }

        /*
        if($("#slider-container"+rowid+" img").length >= 3) {
          document.getElementById('control-prev-btn'+rowid).style.display = 'inline-block';
          document.getElementById('control-next-btn'+rowid).style.display = 'inline-block';
        }
        */
      }
    });
  });
}

/*
function prev(rowid) {
    document.getElementById('slider-container'+rowid).scrollLeft -= 270;
}

function next(rowid) {
    document.getElementById('slider-container'+rowid).scrollLeft += 270;
}
*/

///common for image.js
jQuery.noConflict()(function ($) {
  $(document).ready(function () {
    $(".slide img").on("click" , function(){
      $(this).toggleClass('zoomed');
      $(".overlay").toggleClass('active');
    });
  });
});