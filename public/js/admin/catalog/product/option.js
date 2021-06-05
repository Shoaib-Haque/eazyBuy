var div = 0;

function removeOptionDiv(option) {
	var divObj = document.getElementById(option.id);
	divObj.remove();
}

function addRemoveDiv(option) {
	//option remove div
		var removeDiv = document.createElement('div');
		removeDiv.className = 'remove-option';
		//remove btn div
		var removeBtnDiv = document.createElement('div');
		removeBtnDiv.className = "remove-btn";
		
		//span for remove btn
		var span = document.createElement('span');
		span.id = 'remove-option-group-id'+option.id;
		span.className = 'remove-option-group-class';
		span.title = "Remove Option Group";
		
		//icon
		var trashIcon = document.createElement('i');
		trashIcon.className = "far fa-trash-alt";
		//call remove div
		trashIcon.addEventListener("click", function() {
	  		removeOptionDiv(option);
		});

		//adding icon into span
		span.appendChild(trashIcon);
		//adding span into remove btn div
		removeBtnDiv.appendChild(span);
		//adding remove btn div into option  remove div
		removeDiv.appendChild(removeBtnDiv);
		//adding option remove div into option div
		option.appendChild(removeDiv);
}

function addTable1Heading(table) {
	//heading
	var table1Heading = document.createElement('tr');

	//th
	var table1HeadingTh1 = document.createElement('th');
	table1HeadingTh1.innerHTML = "<font class = 'star'>*</font>"+"Option Group";
	var table1HeadingTh2 = document.createElement('th');
	table1HeadingTh2.innerHTML = "<font class = 'star'>*</font>"+"Input Type";
	var table1HeadingTh3 = document.createElement('th');
	table1HeadingTh3.innerText = "Required";
	var table1HeadingTh4 = document.createElement('th');
	table1HeadingTh4.innerText = "Sort Order";
	table1HeadingTh4.className = "sort-order-th";

	//adding ths into heading
	table1Heading.appendChild(table1HeadingTh1);
	table1Heading.appendChild(table1HeadingTh2);
	table1Heading.appendChild(table1HeadingTh3);
	table1Heading.appendChild(table1HeadingTh4);

	//adding heading into table
	table.appendChild(table1Heading);
}

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

function addTable1Row(table) {
	//row
	var row = document.createElement('tr');

	//td
	//text box for group title
	var table1RowTd1 = document.createElement('td');
	var optionGroupText = document.createElement('input');
	optionGroupText.setAttribute('placeholder', "Option Group");
	optionGroupText.setAttribute("type", "text");
	table1RowTd1.appendChild(optionGroupText);

	//select option for input type
	var table1RowTd2 = document.createElement('td');
	var optionGroupSelect = document.createElement('select');

	//Create and append the options
	var typeOptions = ["Checkbox", "Select", "Radio Button"];
	for (var i = 0; i < typeOptions.length; i++) {
	    var typeOption = document.createElement("option");
	    typeOption.value = typeOptions[i];
	    typeOption.text = typeOptions[i];
	    optionGroupSelect.appendChild(typeOption);
	}

	table1RowTd2.appendChild(optionGroupSelect);

	//checkbox for required
	var table1RowTd3 = document.createElement('td');
	table1RowTd3.align = "center";
	var checkBoxRequired = document.createElement('input');
	checkBoxRequired.setAttribute("type", "checkbox");
	checkBoxRequired.value = "Required";
	table1RowTd3.appendChild(checkBoxRequired);

	//<td class="sort-order-td"><input type="number" name=""></td>
	var table1RowTd4 = document.createElement('td');
	table1RowTd4.className = "sort-order-td";
	var sortOrderNumber = document.createElement('input');
	sortOrderNumber.setAttribute("type", "number");
	sortOrderNumber.setAttribute("min", "0");
	sortOrderNumber.addEventListener('keydown', preventDot, false);
	sortOrderNumber.addEventListener('paste', preventPaste, false);
	sortOrderNumber.addEventListener('input', preventInput, false);
	table1RowTd4.appendChild(sortOrderNumber);

	//adding td to the row
	row.appendChild(table1RowTd1);
	row.appendChild(table1RowTd2);
	row.appendChild(table1RowTd3);
	row.appendChild(table1RowTd4);
	//adding row to the table
	table.appendChild(row);
}

function addTable1(optionTable) {
	//table
	var table1 = document.createElement('table');
	table1.className = "table table-borderless";

	//call 
	addTable1Heading(table1);
	addTable1Row(table1);
	
	//adding table into div
	optionTable.appendChild(table1);
}

function addTable2Heading(table) {
	var thead =  document.createElement('thead');
	var row =  document.createElement('tr');

	//th
	var table2HeadingTh0 = document.createElement('th');
	var table2HeadingTh1 = document.createElement('th');
	table2HeadingTh1.innerHTML = "Option";
	table2HeadingTh1.className = "option-name-th";
	var table2HeadingTh2 = document.createElement('th');
	table2HeadingTh2.innerHTML = "Quantity";
	table2HeadingTh2.className = "option-quantity-th";
	var table2HeadingTh3 = document.createElement('th');
	table2HeadingTh3.innerText = "Price";
	table2HeadingTh3.className = "option-price-th";
	var table2HeadingTh4 = document.createElement('th');
	table2HeadingTh4.innerText = "Image";
	table2HeadingTh4.className = "option-image-th";
	var table2HeadingTh5 = document.createElement('th');
	table2HeadingTh5.className = "option-remove-th";

	//adding ths into heading row
	row.appendChild(table2HeadingTh0);
	row.appendChild(table2HeadingTh1);
	row.appendChild(table2HeadingTh2);
	row.appendChild(table2HeadingTh3);
	row.appendChild(table2HeadingTh4);
	row.appendChild(table2HeadingTh5);
	//adding row into thead
	thead.appendChild(row);
	//adding thead into table
	table.appendChild(thead);
}

function removeOptionRow(row) {
	var rowObj = document.getElementById(row.id);
	rowObj.remove();
}

var rowCount = 0;
function addOptionRow(tbody, DivId) {
	var row =  document.createElement('tr');
	row.id = "row"+rowCount+"div"+DivId;
	
	var cell0 = document.createElement('td');
	var cell1 = document.createElement('td');
	var cell2 = document.createElement('td');
	var cell3 = document.createElement('td');
	var cell4 = document.createElement('td');
	var cell5 = document.createElement('td');

	var defaultOption = document.createElement('input');
	defaultOption.setAttribute("type", "radio");
	defaultOption.setAttribute("name", "defaultOption"+DivId);
	defaultOption.title = "Make Default";
	cell0.align = "center";
	cell0.appendChild(defaultOption);

	var optionText = document.createElement('input');
	optionText.setAttribute('type', 'text');
	optionText.setAttribute('placeholder', "Option");
	cell1.appendChild(optionText);
	cell1.className = "option-name-td";

	var quantityNumber = document.createElement('input');
	quantityNumber.setAttribute('type', 'number');
	quantityNumber.setAttribute("min", "0");
	quantityNumber.setAttribute('placeholder', "Quantity");
	quantityNumber.addEventListener('keydown',preventDot, false);
	quantityNumber.addEventListener('paste', preventPaste, false);
	quantityNumber.addEventListener('input', preventInput, false);
	cell2.appendChild(quantityNumber);
	cell2.className = "option-quantity-td";

	var selectVar = document.createElement('select');
	//Create and append the options
	var selectOptions = ["+", "-"];
	for (var i = 0; i < selectOptions.length; i++) {
	    var selectOption = document.createElement("option");
	    selectOption.value = selectOptions[i];
	    selectOption.text = selectOptions[i];
	    selectVar.appendChild(selectOption);
	}

	var priceNumber = document.createElement('input');
	priceNumber.setAttribute('type', 'number');
	priceNumber.setAttribute("min", "0");
	priceNumber.setAttribute('placeholder', "Price");
	priceNumber.addEventListener('paste', preventStringPaste, false);

	cell3.appendChild(selectVar);
	cell3.appendChild(priceNumber);
	cell3.className = "option-price-td";

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

	cell4.className = "option-image-td";
	cell4.appendChild(uploadBtnDiv);
	cell4.appendChild(sliderContainerDiv);
	
	///
	var removeBtn = document.createElement("button");
	removeBtn.className = "btn btn-danger";
	removeBtn.title = "Remove";

	var icon = document.createElement("i");
	icon.className = "fa fa-minus-circle";

	removeBtn.appendChild(icon);

	cell5.appendChild(removeBtn);
	removeBtn.addEventListener("click", function() {
  		removeOptionRow(row);
	});
	cell5.className = "option-remove-td";

	//adding cell into row
	row.appendChild(cell0);
	row.appendChild(cell1);
	row.appendChild(cell2);
	row.appendChild(cell3);
	row.appendChild(cell4);
	row.appendChild(cell5);
	//adding row into tbody
	tbody.appendChild(row);
	
	rowCount++;
}

function addTable2Foot(table) {
		var tfoot =  document.createElement('tfoot');
		var row =  document.createElement('tr');
		var cell =  document.createElement('td');

		//cell
		cell.className = "option-add-td";
		cell.colSpan = "6";
		cell.align = "right";
		//button
		var button =  document.createElement('button');
		button.className = "btn btn-primary";
		button.title = "Add Row";
		button.addEventListener("click", function() {
	  		addOptionRow(table.tBodies[0],
	  			$(this).parent().parent().parent().parent().parent().parent().attr('id'));
	  									  //button. cell.     row.    tfoot.   table.    div.     div.      id
		});
		//icon
		var addIcon = document.createElement('i');
		addIcon.className = "fa fa-plus-circle";
		//addIcon.aria-hidden = "true";

		//adding icon into button
		button.appendChild(addIcon);
		//adding button into cell
		cell.appendChild(button);
		//adding cell into row
		row.appendChild(cell);
		//adding row into foot
		tfoot.appendChild(row);
		//adding foot into table
		table.appendChild(tfoot);
}

function addTable2(optionTable) {
	//table
	var table2 = document.createElement('table');
	table2.className = "table fixed table-bordered table-striped";

	var tbody = document.createElement('tbody');

	//call 
	addTable2Heading(table2);
	table2.appendChild(tbody);
	addTable2Foot(table2);
	
	//adding table into div
	optionTable.appendChild(table2);
}

function addOptionGroup() {
	//option div
		var option = document.createElement('div');
		option.id = 'option'+div;
		option.className = 'option';

		//option table div
		var optionTable = document.createElement('div');
		optionTable.className = "option-table";

		addRemoveDiv(option);

		addTable1(optionTable);
		addTable2(optionTable);

		//adding optionTable div into option div
		option.appendChild(optionTable);

		//adding every option div into main option div
		var optionDiv = document.getElementById("option-div");
		optionDiv.appendChild(option);

		div++;
}