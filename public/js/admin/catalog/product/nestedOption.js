var selectOptions = ["+", "-"];
var nestedDiv = 1;

function addOptionTypeTableHeading(table) {
	//heading
	var tableHeading = document.createElement('tr');

	//th
	var tableHeadingTh1 = document.createElement('th');
	tableHeadingTh1.innerHTML = "<font class = 'star'>*</font>"+"Option Group";
	var tableHeadingTh2 = document.createElement('th');
	tableHeadingTh2.innerHTML = "<font class = 'star'>*</font>"+"Input Type";
	var tableHeadingTh3 = document.createElement('th');
	tableHeadingTh3.innerText = "Required";
	var tableHeadingTh4 = document.createElement('th');
	tableHeadingTh4.innerText = "Sort Order";
	tableHeadingTh4.className = "sort-order-th";

	//adding ths into heading
	tableHeading.appendChild(tableHeadingTh1);
	tableHeading.appendChild(tableHeadingTh2);
	tableHeading.appendChild(tableHeadingTh3);
	tableHeading.appendChild(tableHeadingTh4);

	//adding heading into table
	table.appendChild(tableHeading);
}

function addOptionTypeTableRow(table) {
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

function addOptionTypeTable(optionDiv) {
	//table
	var table = document.createElement('table');
	table.className = "table table-borderless";

	//call 
	addOptionTypeTableHeading(table);
	addOptionTypeTableRow(table);
	
	//adding table into div
	optionDiv.appendChild(table);
}


function addOptionTableHeading(table) {
	var thead =  document.createElement('thead');
	var row =  document.createElement('tr');

	//th
	var table2HeadingTh0 = document.createElement('th');
	var table2HeadingTh1 = document.createElement('th');
	table2HeadingTh1.innerHTML = "Option";
	table2HeadingTh1.className = "option-name-th";
	var table2HeadingTh2 = document.createElement('th');
	table2HeadingTh2.innerHTML = "Image";
	var table2HeadingTh3 = document.createElement('th');
	table2HeadingTh3.className = "option-remove-th";

	//adding ths into heading row
	row.appendChild(table2HeadingTh0);
	row.appendChild(table2HeadingTh1);
	row.appendChild(table2HeadingTh2);

	//adding row into thead
	thead.appendChild(row);
	//adding thead into table
	table.appendChild(thead);
}

function removeSingleOptionRow(row) {
	var rowObj = document.getElementById(row.id);
	rowObj.remove();
}

var rowCount = 0;
function addSingleOptionRow(tbody, DivId) {
	jQuery.noConflict()(function ($) { 
		$(document).ready(function () {
			var row =  document.createElement('tr');
			row.id = "row"+rowCount+"div"+DivId;
			
			var cell0 = document.createElement('td');
			var cell1 = document.createElement('td');
			var cell2 = document.createElement('td');
			var cell3 = document.createElement('td');

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

			//Image
			var uploadBtnDiv = document.createElement("div");

			var uploadBtnLabel = document.createElement("label");
			uploadBtnLabel.for = "uploadFile";
			uploadBtnLabel.className = "btn btn-light btn-sm rounded-label";
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
				  			//fileinput.    label.    div.    cell.     tr.      id
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
			});

			sliderContainerDiv.appendChild(prevBtnDiv);		
			sliderContainerDiv.appendChild(nextBtnDiv);

			cell2.className = "option-image-td";
			cell2.appendChild(uploadBtnDiv);
			cell2.appendChild(sliderContainerDiv);
			
			///remove
			var removeBtn = document.createElement("button");
			removeBtn.className = "btn btn-danger";
			removeBtn.title = "Remove";

			var icon = document.createElement("i");
			icon.className = "fa fa-minus-circle";

			removeBtn.appendChild(icon);

			cell3.appendChild(removeBtn);
			removeBtn.addEventListener("click", function() {
		  		removeSingleOptionRow(row);
			});
			cell3.className = "option-remove-td";

			//adding cell into row
			row.appendChild(cell0);
			row.appendChild(cell1);
			row.appendChild(cell2);
			row.appendChild(cell3);
			//adding row into tbody
			tbody.appendChild(row);
			
			rowCount++;
		});
	});
}

function addOptionTableFoot(table){
	jQuery.noConflict()(function ($) { 
		$(document).ready(function () {
			var tfoot =  document.createElement('tfoot');
			var row =  document.createElement('tr');
			var cell =  document.createElement('td');

			//cell
			cell.className = "option-add-td";
			cell.colSpan = "4";
			cell.align = "right";
			//button
			var button =  document.createElement('button');
			button.className = "btn btn-primary";
			button.title = "Add Row";
			button.addEventListener("click", function() {
		  		addSingleOptionRow(table.tBodies[0],
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
		});
	});
}

function addOptionTable(optionDiv) {
	//table
	var table = document.createElement('table');
	table.className = "table singleOptionTable table-bordered table-striped table-sm";

	var tbody = document.createElement('tbody');
	tbody.className = "singleOptionTableTbody";

	//call 
	addOptionTableHeading(table);
	table.appendChild(tbody);
	addOptionTableFoot(table);
	
	//adding table into div
	optionDiv.appendChild(table);
}

function makeComboTable(list, DivId) {
	if (document.getElementById('combinationTableDiv'+DivId)) {
		var oldDiv = document.getElementById('combinationTableDiv'+DivId);
		removeOptionDiv(oldDiv);
	}
	var div = document.getElementById(DivId);
	var table = document.createElement('table');
	table.className = "table combinationTable table-bordered table-striped table-sm";

	var thead =  document.createElement('thead');
	var hrow =  document.createElement('tr');

	//th
	var table2HeadingTh1 = document.createElement('th');
	table2HeadingTh1.innerHTML = "Combination";
	var table2HeadingTh2 = document.createElement('th');
	table2HeadingTh2.innerHTML = "Stock Quantity";
	var table2HeadingTh3 = document.createElement('th');
	table2HeadingTh3.innerHTML = "Price";

	//adding ths into heading row
	hrow.appendChild(table2HeadingTh1);
	hrow.appendChild(table2HeadingTh2);
	hrow.appendChild(table2HeadingTh3);

	//adding row into thead
	thead.appendChild(hrow);

	var tbody = document.createElement('tbody');

	//console.log(list.length);
	for (var i = 0; i < list.length; i++) {
		var brow =  document.createElement('tr');
		var cell1 =  document.createElement('td');
		var hidden = document.createElement('input');
		hidden.setAttribute('type', 'hidden');
		var iLength = list[i].length;
		for (var j = 0; j < iLength; j++) {
			if (j < iLength-1) {
				cell1.innerText += list[i][j]+"-";
			}
			else {
				cell1.innerText += list[i][j];
			}
		}
		hidden.value = cell1.innerText;
		//console.log(hidden.value);
		cell1.appendChild(hidden);
		brow.appendChild(cell1);

		var cell2 =  document.createElement('td');
		var quantity = document.createElement('input');
		quantity.setAttribute('type', 'number');
		quantity.setAttribute("min", "0");
		quantity.setAttribute('placeholder', "Quantity");
		quantity.addEventListener('keydown',preventDot, false);
		quantity.addEventListener('paste', preventPaste, false);
		quantity.addEventListener('input', preventInput, false);
		cell2.appendChild(quantity);
		brow.appendChild(cell2);

		var cell3 =  document.createElement('td');
		var selectVar = document.createElement('select');
		selectVar.className = "colorPriceSelect";
		//Create and append the options
		for (var k = 0; k < selectOptions.length; k++) {
		    var selectOption = document.createElement("option");
		    selectOption.value = selectOptions[k];
		    selectOption.text = selectOptions[k];
		    selectVar.appendChild(selectOption);
		}

		var price = document.createElement('input');
		price.setAttribute('type', 'number');
		price.setAttribute("min", "0");
		price.setAttribute('placeholder', "Price");
		price.className = "colorPriceNumber";
		price.addEventListener('paste', preventStringPaste, false);
		cell3.appendChild(selectVar);
		cell3.appendChild(price);
		brow.appendChild(cell3);

		tbody.appendChild(brow);
	}

	//adding thead and tbody into table
	table.appendChild(thead);
	table.appendChild(tbody);

	var combinationTableDiv = document.createElement('div');
	combinationTableDiv.id = 'combinationTableDiv'+DivId;	
	combinationTableDiv.className = 'combination-table-div';
	combinationTableDiv.appendChild(table);

	div.appendChild(combinationTableDiv);
}

function combos(list, n = 0, result = [], current = []){
    if (n === list.length) result.push(current)
    else list[n].forEach(item => combos(list, n+1, result, [...current, item]))

	return result;
}


function makeList(DivId, event) {
	var div = document.getElementById(DivId);
	var allTbody = div.getElementsByClassName('singleOptionTableTbody');

	//console.log(allTbody[0].rows[0].cells[1].firstChild.value);
	//console.log(allTbody[0].rows.length);

	var list = new Array();
	for (var i = 0; i < allTbody.length; i++) {
		list[i] = new Array();
		for (var j = 0; j < allTbody[i].rows.length; j++) {
			list[i][j] = allTbody[i].rows[j].cells[1].firstChild.value;

			//if (list[i] == null)
	          //  list[i] = allTbody[i].rows[j].cells[1].firstChild.value;
	        //else
	          //  list[i].push(allTbody[i].rows[j].cells[1].firstChild.value);
		}
	}

	var list = combos(list);
	makeComboTable(list, DivId)
}

function changeButton(id) {
	var makeCombinationbutton = document.getElementById(id);
	var redo = document.createElement('i');
	redo.className = "fas fa-redo";
	makeCombinationbutton.title = "Redo Combination";
	makeCombinationbutton.innerText = "";
	makeCombinationbutton.appendChild(redo);
}

function addNestedOptionGroup() {
	jQuery.noConflict()(function ($) { 
		$(document).ready(function () {
			var optionGroupNumber = document.getElementById("nestedGroupCount");
			if (optionGroupNumber.value == "") {
				$('#selectOptionNumber').modal();
				return;
			}

			var nestedOption = document.createElement('div');
			nestedOption.id = 'nestedOption'+nestedDiv;
			nestedOption.className = 'nested-option';

			addRemoveDiv(nestedOption);

			//nestedoption div
			for (var i = 0; i < optionGroupNumber.value; i++) {
				var option = document.createElement('div');
				option.id = 'nestedOption'+nestedDiv+"option"+i;
				option.className = "single-option";
				addOptionTypeTable(option);
				addOptionTable(option);

				nestedOption.appendChild(option);
			}

			var makeCombinationbutton = document.createElement('button');
			makeCombinationbutton.id = "makeCombinationbutton"+nestedDiv;
			makeCombinationbutton.innerText = "Make Combination";
			makeCombinationbutton.className = "btn btn-success btn-sm make-combination";
			makeCombinationbutton.addEventListener("click", function() {
				makeList($(this).parent().attr('id'));
				  			//button.  div.      id
				changeButton($(this).attr('id'));
			});

			nestedOption.appendChild(makeCombinationbutton);

			//adding every nested option div into main option div
			var optionDiv = document.getElementById("option-div");
			optionDiv.appendChild(nestedOption);

			nestedDiv++;

			optionGroupNumber.selectedIndex = 0; 
		});
	});
}