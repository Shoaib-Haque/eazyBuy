var selectOptions = ["+", "-"];
var typeOptions = ["Checkbox", "Select", "Radio Button"];
var singleDiv = 0;
var singleRowCount = 0;

function addTable2Heading(table) {
	var thead =  document.createElement('thead');
	thead.className = "thead-light";
	var row =  document.createElement('tr');

	//th
	var th0 = document.createElement('th');
	var th1 = document.createElement('th');
	th1.innerHTML = "Option";
	var th2 = document.createElement('th');
	th2.innerHTML = "SKU";
	var th3 = document.createElement('th');
	th3.innerHTML = "St.Qty.";
	var th4 = document.createElement('th');
	th4.innerText = "Price";
	var th5 = document.createElement('th');
	th5.innerText = "Image";
	var th6 = document.createElement('th');

	//adding ths into heading row
	row.appendChild(th0);
	row.appendChild(th1);
	row.appendChild(th2);
	row.appendChild(th3);
	row.appendChild(th4);
	row.appendChild(th5);
	row.appendChild(th6);
	//adding row into thead
	thead.appendChild(row);
	//adding thead into table
	table.appendChild(thead);
}

function addOptionRow(tbody, DivId) {
	jQuery.noConflict()(function ($) { 
		$(document).ready(function () {
			var row =  document.createElement('tr');
			row.id = "row"+singleRowCount+"div"+DivId;
			
			var cell0 = document.createElement('td');
			var cell1 = document.createElement('td');
			var cell2 = document.createElement('td');
			var cell3 = document.createElement('td');
			var cell4 = document.createElement('td');
			var cell5 = document.createElement('td');
			var cell6 = document.createElement('td');

			var dfault = document.createElement('input');
			dfault.setAttribute("type", "radio");
			dfault.setAttribute("name", "default"+DivId);
			dfault.title = "Make Default";
			cell0.align = "center";
			cell0.appendChild(dfault);

			var option = document.createElement('input');
			option.setAttribute('type', 'text');
			option.setAttribute('placeholder', "Option");
			cell1.appendChild(option);

			var sku = document.createElement('input');
			sku.setAttribute('type', 'text');
			sku.setAttribute('placeholder', "SKU");
			cell2.appendChild(sku);

			var quantity = document.createElement('input');
			quantity.setAttribute('type', 'number');
			quantity.setAttribute("min", "0");
			quantity.setAttribute('placeholder', "St.Qty.");
			quantity.addEventListener('keydown',preventDot, false);
			quantity.addEventListener('paste', preventPaste, false);
			quantity.addEventListener('input', preventInput, false);
			cell3.appendChild(quantity);

			var selectVar = document.createElement('select');
			selectVar.className = "price-select";
			//Create and append the options
			
			for (var i = 0; i < selectOptions.length; i++) {
			    var selectOption = document.createElement("option");
			    selectOption.value = selectOptions[i];
			    selectOption.text = selectOptions[i];
			    selectVar.appendChild(selectOption);
			}

			var price = document.createElement('input');
			price.setAttribute('type', 'number');
			price.setAttribute("min", "0");
			price.setAttribute('placeholder', "Price");
			price.className = "price";
			price.addEventListener('paste', preventStringPaste, false);

			cell4.appendChild(selectVar);
			cell4.appendChild(price);

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
		  		//alert($(this).parent().attr('id'));
			});

			sliderContainerDiv.appendChild(prevBtnDiv);
			sliderContainerDiv.appendChild(nextBtnDiv);

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

			//adding cell into row
			row.appendChild(cell0);
			row.appendChild(cell1);
			row.appendChild(cell2);
			row.appendChild(cell3);
			row.appendChild(cell4);
			row.appendChild(cell5);
			row.appendChild(cell6);
			//adding row into tbody
			tbody.appendChild(row);
			
			singleRowCount++;
		});
	});
}

function addTable2Foot(table) {
	jQuery.noConflict()(function ($) { 
		$(document).ready(function () {
			var tfoot =  document.createElement('tfoot');
			var row =  document.createElement('tr');
			var cell =  document.createElement('td');

			//cell
			cell.colSpan = "7";
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

function addTable2(optionTable) {
	//table
	var table2 = document.createElement('table');
	table2.className = "table single-option-table table-bordered table-striped table-sm";

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
	option.id = 'option'+singleDiv;
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

	singleDiv++;
}