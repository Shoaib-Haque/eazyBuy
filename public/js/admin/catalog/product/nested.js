var selectOptions = ["+", "-"];
var nestedDiv = 0;
var nestedRowCount = 0;

function addNestedOptionTableHeading(table) {
	var thead =  document.createElement('thead');
	thead.className = "thead-light";
	var row =  document.createElement('tr');

	//th
	var th0 = document.createElement('th');
	var th1 = document.createElement('th');
	th1.innerHTML = "Option";
	var th2 = document.createElement('th');
	th2.innerHTML = "Image";
	var th3 = document.createElement('th');

	//adding ths into heading row
	row.appendChild(th0);
	row.appendChild(th1);
	row.appendChild(th2);
	row.appendChild(th3);

	//adding row into thead
	thead.appendChild(row);
	//adding thead into table
	table.appendChild(thead);
}

function addSingleOptionRow(tbody, DivId) {
	jQuery.noConflict()(function ($) { 
		$(document).ready(function () {
			var row =  document.createElement('tr');
			row.id = "row"+nestedRowCount+"div"+DivId;
			
			var cell0 = document.createElement('td');
			var cell1 = document.createElement('td');
			var cell2 = document.createElement('td');
			var cell3 = document.createElement('td');

			var dfault = document.createElement('input');
			dfault.setAttribute("type", "radio");
			dfault.id = "dfault"+"div"+DivId;;
			dfault.name = "dfault"+"div"+DivId;
			dfault.title = "Make Default";
			cell0.align = "center";
			cell0.appendChild(dfault);

			var option = document.createElement('input');
			option.setAttribute('type', 'text');
			option.setAttribute('placeholder', "Option");
			option.id = "option"+nestedRowCount+"div"+DivId;;
			option.name = "option"+nestedRowCount+"div"+DivId;
			cell1.appendChild(option);

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

			/*
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
			*/

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
		  		removeOptionRow(row);
			});

			//adding cell into row
			row.appendChild(cell0);
			row.appendChild(cell1);
			row.appendChild(cell2);
			row.appendChild(cell3);
			//adding row into tbody
			tbody.appendChild(row);
			
			nestedRowCount++;
		});
	});
}

function addNestedOptionTableFoot(table){
	jQuery.noConflict()(function ($) { 
		$(document).ready(function () {
			var tfoot =  document.createElement('tfoot');
			var row =  document.createElement('tr');
			var cell =  document.createElement('td');

			//cell
			cell.className = "option-add-td";
			cell.colSpan = "4";
			cell.align = "left";
			//button
			var button =  document.createElement('button');
			button.className = "btn btn-primary";
			button.title = "Add Row";
			button.addEventListener("click", function() {
		  		addSingleOptionRow(table.tBodies[0],
		  			$(this).parent().parent().parent().parent().parent().attr('id'));
		  		    //$(this).parent().parent().parent().parent().parent().parent().attr('id'));
		  			//button. cell.     row.    tfoot.   table.    div.     div.      id
			});
			//icon
			var icon = document.createElement('i');
			icon.className = "fa fa-plus-circle";
			//addIcon.aria-hidden = "true";

			//adding icon into button
			button.appendChild(icon);
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

function addNestedOptionTable(optionDiv) {
	//table
	var table = document.createElement('table');
	table.className = "table nested-option-table table-bordered table-striped table-sm";

	var tbody = document.createElement('tbody');
	tbody.className = "singleOptionTableTbody";

	//call 
	addNestedOptionTableHeading(table);
	table.appendChild(tbody);
	addNestedOptionTableFoot(table);
	
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
	table.className = "table combination-table table-bordered table-striped table-sm";

	var thead =  document.createElement('thead');
	thead.className = "thead-light";
	var hrow =  document.createElement('tr');

	//th
	var th0 = document.createElement('th');
	th0.innerHTML = "Combination";
	var th1 = document.createElement('th');
	th1.innerHTML = "SKU";
	var th2 = document.createElement('th');
	th2.innerHTML = "Stock Qty";
	var th3 = document.createElement('th');
	th3.innerHTML = "Price";

	//adding ths into heading row
	hrow.appendChild(th0);
	hrow.appendChild(th1);
	hrow.appendChild(th2);
	hrow.appendChild(th3);

	//adding row into thead
	thead.appendChild(hrow);

	var tbody = document.createElement('tbody');

	//console.log(list.length);
	for (var i = 0; i < list.length; i++) {
		var brow =  document.createElement('tr');
		var cell0 =  document.createElement('td');
		var hidden = document.createElement('input');
		hidden.id = "hidden"+i+"div"+DivId;
		hidden.name = "hidden"+i+"div"+DivId;
		hidden.setAttribute('type', 'hidden');
		var iLength = list[i].length;
		for (var j = 0; j < iLength; j++) {
			if (j < iLength-1) {
				cell0.innerText += list[i][j]+"-";
			}
			else {
				cell0.innerText += list[i][j];
			}
		}
		hidden.value = cell0.innerText;
		//console.log(hidden.value);
		cell0.appendChild(hidden);
		brow.appendChild(cell0);

		var cell1 =  document.createElement('td');
		var sku = document.createElement('input');
		sku.setAttribute('type', 'text');
		sku.setAttribute('placeholder', "SKU");
		sku.id = "sku"+i+"div"+DivId;
		sku.name = "sku"+i+"div"+DivId;
		cell1.appendChild(sku);
		brow.appendChild(cell1);

		var cell2 =  document.createElement('td');
		var quantity = document.createElement('input');
		quantity.setAttribute('type', 'number');
		quantity.setAttribute("min", "0");
		quantity.setAttribute('placeholder', "St.Qty");
		quantity.id = "quantity"+i+"div"+DivId;
		quantity.name = "quantity"+i+"div"+DivId;
		quantity.addEventListener('keydown',preventDot, false);
		quantity.addEventListener('paste', preventPaste, false);
		quantity.addEventListener('input', preventInput, false);
		cell2.appendChild(quantity);
		brow.appendChild(cell2);

		var cell3 =  document.createElement('td');
		var selectVar = document.createElement('select');
		selectVar.id = "selectVar"+i+"div"+DivId;
		selectVar.name = "selectVar"+i+"div"+DivId;
		selectVar.className = "price-select";
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
		price.className = "price";
		price.id = "price"+i+"div"+DivId;
		price.name = "price"+i+"div"+DivId;
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
			var optionGroupNumber = document.getElementById("nested-group-count");
			if (optionGroupNumber.value == "") {
				$('#selectOptionNumber').modal();
				return;
			}

			var nestedOptionDiv = document.createElement('div');
			nestedOptionDiv.id = 'nestedOption'+nestedDiv;
			nestedOptionDiv.className = 'nested-option';

			addRemoveDiv(nestedOptionDiv);

			//nestedoption div
			for (var i = 0; i < optionGroupNumber.value; i++) {
				//option type table div
				var optionTypeDiv = document.createElement('div');
				optionTypeDiv.id = 'nestedOptionType'+nestedDiv+"option"+i;
				optionTypeDiv.className = "option-type-div";

				//option table div
				var optionTableDiv = document.createElement('div');
				optionTableDiv.id = 'nestedOptionTable'+nestedDiv+"option"+i;
				optionTableDiv.className = "option-table-div";

				var optionDiv = document.createElement('div');
				optionDiv.id = 'nestedOption'+nestedDiv+"option"+i;
				optionDiv.className = "single-option";
				
				//addOptionTypeTable(option);
				addTypeTable(optionTypeDiv);
				addNestedOptionTable(optionTableDiv);

				optionDiv.appendChild(optionTypeDiv);
				optionDiv.appendChild(optionTableDiv);

				nestedOptionDiv.appendChild(optionDiv);
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

			nestedOptionDiv.appendChild(makeCombinationbutton);

			//adding every nested option div into main option div
			var mainDiv = document.getElementById("main-div");
			mainDiv.appendChild(nestedOptionDiv);

			nestedDiv++;

			optionGroupNumber.selectedIndex = 0; 
		});
	});
}