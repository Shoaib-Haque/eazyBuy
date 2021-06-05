var rowCount = 0;
var selectOptions = ["+", "-"];
function addColorOption() {
	var tbody = document.getElementById('colorOptionTableTbody');
	var row =  document.createElement('tr');
	row.id = "row"+rowCount;
	
	var cell1 = document.createElement('td');
	var cell2 = document.createElement('td');
	var cell3 = document.createElement('td');
	var cell4 = document.createElement('td');
	var cell5 = document.createElement('td');
	var cell6 = document.createElement('td');

	var colorText = document.createElement('input');
	colorText.setAttribute('type', 'text');
	colorText.setAttribute('placeholder', "Color");
	cell1.appendChild(colorText);
	cell1.className = "option-name-td";

	var checkedSizes = document.querySelectorAll('input[name=size]:checked');

	for (var i = 0; i < checkedSizes.length; i++) {
		var checkBoxId = checkedSizes[i].id;
		var labelText = $("#"+checkBoxId).next("label").html();
		var sizeText = document.createElement('input');
		sizeText.setAttribute('type', 'text');
		sizeText.setAttribute('disabled', 'disabled');
		sizeText.setAttribute('value', labelText);
		sizeText.className = "disabledText";
		cell2.appendChild(sizeText);

		//cell2.innerHTML += $("#"+checkBoxId).next("label").html()+"<hr>";

		var quantityNumber = document.createElement('input');
		quantityNumber.setAttribute('type', 'number');
		quantityNumber.setAttribute("min", "0");
		quantityNumber.setAttribute('placeholder', "Quantity");
		quantityNumber.addEventListener('keydown',preventDot, false);
		quantityNumber.addEventListener('paste', preventPaste, false);
		quantityNumber.addEventListener('input', preventInput, false);
		cell3.appendChild(quantityNumber);

		var selectVar = document.createElement('select');
		selectVar.className = "colorPriceSelect";
		//Create and append the options
		
		for (var j = 0; j < selectOptions.length; j++) {
		    var selectOption = document.createElement("option");
		    selectOption.value = selectOptions[j];
		    selectOption.text = selectOptions[j];
		    selectVar.appendChild(selectOption);
		}

		var priceNumber = document.createElement('input');
		priceNumber.setAttribute('type', 'number');
		priceNumber.setAttribute("min", "0");
		priceNumber.setAttribute('placeholder', "Price");
		priceNumber.className = "colorPriceNumber";
		priceNumber.addEventListener('paste', preventStringPaste, false);

		cell4.appendChild(selectVar);
		cell4.appendChild(priceNumber);
	}

	cell2.className = ""
	cell3.className = "option-quantity-td";
	cell4.className = "option-price-td";

	//Image
	var uploadBtnDiv = document.createElement("div");

	var uploadBtnLabel = document.createElement("label");
	uploadBtnLabel.for = "uploadFile";
	uploadBtnLabel.className = "btn btn-light btn-sm";
	uploadBtnLabel.title = "Upload Image";

	var uploadIcon = document.createElement("i");
	uploadIcon.className = "fas fa-camera";

	var fileInput = document.createElement('input');
	fileInput.setAttribute('type', 'file');
	fileInput.addEventListener("change", function(e) {
		if($("#slider-container"+$(this).parent().parent().parent().parent().attr('id')+" img").length >= 10) {
      		$('#sorryImageCount').modal();
      		return;
    	}
    	else {
  			uploadImage(e, $(this).parent().parent().parent().parent().attr('id'));
  				    //fileinput. label.    div.    cell.     tr.      id
    	}
	});

	uploadBtnLabel.appendChild(uploadIcon);
	uploadBtnLabel.appendChild(fileInput);
	uploadBtnDiv.appendChild(uploadBtnLabel);

	var sliderContainerDiv = document.createElement("div");
	sliderContainerDiv.className = "slider";
	sliderContainerDiv.id = "slider-container"+row.id;

	var prevBtnDiv = document.createElement("div");
	prevBtnDiv.className = "control-prev-btn";
	prevBtnDiv.id = "control-prev-btn"+row.id;
	prevBtnDiv.innerText = "<";
	prevBtnDiv.addEventListener('click', function() {
  		prev($(this).parent().parent().parent().attr('id'));
  		//prevbtndiv. div.      cell.     row.      id
	});

	var nextBtnDiv = document.createElement("div");
	nextBtnDiv.className = "control-next-btn";
	nextBtnDiv.id = "control-next-btn"+row.id;
	nextBtnDiv.innerText = ">";
	nextBtnDiv.addEventListener('click', function() {
  		next($(this).parent().parent().parent().attr('id'));
  		//prevbtndiv. div.      cell.     row.      id
  		//alert($(this).parent().attr('id'));
	});

	sliderContainerDiv.appendChild(prevBtnDiv);
	sliderContainerDiv.appendChild(nextBtnDiv);

	cell5.className = "option-image-td";
	cell5.appendChild(uploadBtnDiv);
	cell5.appendChild(sliderContainerDiv);
	
	///
	var removeBtn = document.createElement("button");
	removeBtn.className = "btn btn-danger";
	removeBtn.title = "Remove";

	var icon = document.createElement("i");
	icon.className = "fa fa-minus-circle";

	removeBtn.appendChild(icon);

	cell6.appendChild(removeBtn);
	removeBtn.addEventListener("click", function() {
  		removeOptionRow(row);
	});
	cell6.className = "option-remove-td";

	//adding cell into row
	row.appendChild(cell1);
	row.appendChild(cell2);
	row.appendChild(cell3);
	row.appendChild(cell4);
	row.appendChild(cell5);
	row.appendChild(cell6);
	//adding row into tbody
	tbody.appendChild(row);
	
	rowCount++;
}