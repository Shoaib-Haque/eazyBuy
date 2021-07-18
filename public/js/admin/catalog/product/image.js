"use strict";
var imageSlideDivCount = 0;

jQuery.noConflict()(function ($) { 
  $(document).ready(function () {
    document.getElementById("uploadFile").addEventListener("change", function(e) {
      multiFileUpload(e, $(this), $(this).parent().parent().attr('id'), $(this).attr('name'))
    });
  });
});

function multiFileUpload(e, obj, divid, name) {
  jQuery.noConflict()(function ($) { 
    $(document).ready(function () {
      if (obj.get(0).files.length == 0) {
        return;
      }
      else if($("#slider-container-div"+obj.parent().parent().parent().parent().attr('id')+" img").length + 
        obj.get(0).files.length > 10) {
        $('#sorryImageCount').modal();
        return;
      }
      else {
        upImage(e);
        $(obj).parent().hide();

        var uploadBtnLabel = document.createElement("label");
        uploadBtnLabel.for = "uploadFile";
        uploadBtnLabel.className = "btn btn-light btn-sm rounded-label";
        uploadBtnLabel.title = "Upload Image";

        var uploadIcon = document.createElement("i");
        uploadIcon.className = "fas fa-camera";

        var fileInput = document.createElement('input');
        fileInput.setAttribute('type', 'file');
        fileInput.setAttribute("multiple", "multiple");
        fileInput.setAttribute("name", name);
        fileInput.addEventListener("change", function(e) {
          multiFileUpload(e, $(this), $(this).parent().parent().attr('id'), $(this).attr('name'))
        });

        uploadBtnLabel.appendChild(uploadIcon);
        uploadBtnLabel.appendChild(fileInput);

        $("#"+divid).append(uploadBtnLabel);
      }
    });
  });
}

function showImgDivRemoveBtn(btnId) {
    document.getElementById(btnId).style.display = "inline";
}
function hideImgDivRemoveBtn(event, btnId) {
    var e = event.toElement || event.relatedTarget;

    if (e.parentNode == this || e.id == btnId) {
        return;
    }

    document.getElementById(btnId).style.display = "none";
}

function removeImageDiv(slideDivId) {
  jQuery.noConflict()(function ($) { 
    $(document).ready(function () {
      var k = parseInt($("#"+slideDivId+" input[type='hidden']").val());

      var fileStatus = document.createElement('input');
      fileStatus.setAttribute('type', 'hidden');
      fileStatus.setAttribute("name", "fileStatus"+k);
      fileStatus.value = "Deleted";
      $("#slider-container-div").append(fileStatus);

      var divObj = document.getElementById(slideDivId);
      divObj.remove();

      if($("#slider-container-div img").length <= 0) {
        var sliderContainerDiv =  document.getElementById("slider-container-div");
        sliderContainerDiv.style.display = "none";
      }
      /*
      if($("#slider-container-div img").length <= 5) {
          document.getElementById('control-prev-div').style.visibility = 'hidden';
          document.getElementById('control-next-div').style.visibility = 'hidden';
      }
      */
    });
  });
}


function upImage(event) {
  jQuery.noConflict()(function ($) { 
    $(document).ready(function () {
      var files = Array.prototype.slice.call(event.target.files);

      for (var f = 0; f < files.length; f++) {
        if($("#slider-container-div img").length >= 10) {
          $('#sorryImageCount').modal();
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
        slideDiv.id = "slideDiv"+imageSlideDivCount;
        slideDiv.addEventListener('mouseout', function(e) {
          hideImgDivRemoveBtn(e, $(this).children('BUTTON').attr('id'));
        });

        var slideImg = document.createElement("img");
        slideImg.setAttribute("src", file);
        slideImg.id = "slider-container-div"+"slideImg"+imageSlideDivCount;
        slideImg.name = "slider-container-div"+"slideImg"+imageSlideDivCount;
        
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

        slideImg.id = "img"+imageSlideDivCount;
        slideImg.addEventListener('mouseover', function(e) {
          showImgDivRemoveBtn($(this).siblings('BUTTON').attr('id'));
                            //img           removebutton    id
        });

        var removeImg = document.createElement("BUTTON");
        removeImg.setAttribute("type", "button");
        removeImg.className = "remove-image";
        removeImg.innerHTML = "&#215;";
        removeImg.title = "Remove This Image";
        removeImg.id = "removeImg"+imageSlideDivCount;
        removeImg.addEventListener('click', function(e) {
          removeImageDiv($(this).parent().attr('id'));
                    //button   div       id
        });

        var k = parseInt(document.getElementById("fileCount").value);

        var slideIndex = document.createElement('input');
        slideIndex.setAttribute('type', 'hidden');
        slideIndex.value = k;

        slideDiv.appendChild(removeImg);
        slideDiv.appendChild(slideImg);
        slideDiv.appendChild(slideIndex);

        document.getElementById("fileCount").value = k+1;
          
        var sliderContainerDiv = document.getElementById("slider-container-div");
        sliderContainerDiv.appendChild(slideDiv);
        imageSlideDivCount++;

        if($("#slider-container-div img").length >= 1) {
          sliderContainerDiv.style.display = "flex";
        }
        /*
        if($("#slider-container-div img").length >= 6) {
          document.getElementById('control-prev-div').style.visibility = 'visible';
          document.getElementById('control-next-div').style.visibility = 'visible';
        }
        */ 
      }
    });
  });
}

/*
function prevImage() {
    document.getElementById('slider-container-div').scrollLeft -= 270;
}

function nextImage() {
    document.getElementById('slider-container-div').scrollLeft += 270;
}
*/