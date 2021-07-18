var selectOptions = ["+", "-"];
var typeOptions = ["Checkbox", "Select", "Radio Button"];
var singleDiv = 1;
var singleRowCount = 0;

function addSingleOptionTypeTable(optionTypeDiv) {
	var iIndex = parseInt(optionTypeDiv.id.match(/\d/g).join(""));
	//table
	var table = document.createElement('table');
	table.className = "table option-group table-borderless table-sm";

	var row1 = document.createElement('tr');
	var row2 = document.createElement('tr');

	//row1
	var r1td1 = document.createElement('td');
	r1td1.innerHTML = "<strong><font class = 'star'>*</font>"+"Option Group/Type</strong>";
	
	var r1td2 = document.createElement('td');
	var group = document.createElement('input');
	group.setAttribute("name", "singleOptionGroup["+iIndex+"]");
	//console.log(group.name);
	group.setAttribute("type", "text");
	group.setAttribute('placeholder', "Option Group");
	group.id = "optionGroup"+optionTypeDiv.id;
	r1td2.appendChild(group);

	row1.appendChild(r1td1);
	row1.appendChild(r1td2);

	//row2
	var r2td1 = document.createElement('td');
	r2td1.innerHTML = "<strong><font class = 'star'>*</font>"+"Input Type</strong>";

	var r2td2 = document.createElement('td');
	var select = document.createElement('select');
	select.id = "selectType"+optionTypeDiv.id;
	select.setAttribute("name", "singleSelectType["+iIndex+"]");

	//Create and append the options
	for (var i = 0; i < typeOptions.length; i++) {
	    var typeOption = document.createElement("option");
	    typeOption.value = typeOptions[i];
	    typeOption.text = typeOptions[i];
	    select.appendChild(typeOption);
	}
	r2td2.appendChild(select);

	row2.appendChild(r2td1);
	row2.appendChild(r2td2);

	table.appendChild(row1);
	table.appendChild(row2);
	
	//adding table into div
	optionTypeDiv.appendChild(table);
}

function addSingleOptionTableHeading(table) {
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

function singleMultiFileUpload(e, obj, divid, name, iIndex, jIndex) {
	jQuery.noConflict()(function ($) { 
		$(document).ready(function () {
			if (obj.get(0).files.length == 0) {
		        return;
		    }
			else if($("#slider-container"+obj.parent().parent().parent().parent().attr('id')+" img").length + 
				obj.get(0).files.length > 10) {
				$('#sorryImageCount').modal();
				return;
			}
			else {
				singleUploadImage(e, obj.parent().parent().parent().parent().attr('id'), iIndex, jIndex);
				  	//fileinput.    label.    div.    cell.     tr.      id
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
	        		singleMultiFileUpload(e, $(this), $(this).parent().parent().attr('id'), $(this).attr('name'), iIndex, jIndex)
				});

				uploadBtnLabel.appendChild(uploadIcon);
				uploadBtnLabel.appendChild(fileInput);

				$("#"+divid).append(uploadBtnLabel);
			}
	  	});
	});
}

function addOptionRow(tbody, DivId) {
	jQuery.noConflict()(function ($) { 
		$(document).ready(function () {
			var row =  document.createElement('tr');
			row.id = "row"+singleRowCount+"div"+DivId;

			var iIndex = parseInt(DivId.match(/\d/g).join(""));
			var jIndex = parseInt(document.getElementById("hiddenSingleRowCount"+DivId).value);
			
			var cell0 = document.createElement('td');
			var cell1 = document.createElement('td');
			var cell2 = document.createElement('td');
			var cell3 = document.createElement('td');
			var cell4 = document.createElement('td');
			var cell5 = document.createElement('td');
			var cell6 = document.createElement('td');

			var dfault = document.createElement('input');
			dfault.setAttribute("type", "checkbox");
			dfault.setAttribute("name", "singleDefault["+iIndex+"]["+jIndex+"]");
			dfault.title = "Make Default";
			dfault.addEventListener("click", function(e) {
        		checkboxClick($(this));
			});
			cell0.align = "center";
			cell0.appendChild(dfault);

			var option = document.createElement('input');
			option.setAttribute('type', 'text');
			option.setAttribute('placeholder', "Option");
			option.setAttribute("name", "singleOption["+iIndex+"]["+jIndex+"]");
			option.id = "option"+singleRowCount+"div"+DivId;;
			cell1.appendChild(option);

			var sku = document.createElement('input');
			sku.setAttribute('type', 'text');
			sku.setAttribute('placeholder', "SKU");
			sku.setAttribute("name", "singleSKU["+iIndex+"]["+jIndex+"]");
			sku.id = "sku"+singleRowCount+"div"+DivId;;
			cell2.appendChild(sku);

			var quantity = document.createElement('input');
			quantity.setAttribute('type', 'number');
			quantity.setAttribute("min", "0");
			quantity.setAttribute('placeholder', "St.Qty.");
			quantity.setAttribute("name", "singleQuantity["+iIndex+"]["+jIndex+"]");
			quantity.id = "quantity"+singleRowCount+"div"+DivId;;
			quantity.addEventListener('keydown',preventDot, false);
			quantity.addEventListener('paste', preventPaste, false);
			quantity.addEventListener('input', preventInput, false);
			cell3.appendChild(quantity);

			var selectVar = document.createElement('select');
			selectVar.className = "price-select";
			selectVar.id = "selectVar"+singleRowCount+"div"+DivId;;
			selectVar.setAttribute("name", "singleSelectVar["+iIndex+"]["+jIndex+"]");
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
			price.setAttribute("name", "singlePrice["+iIndex+"]["+jIndex+"]");
			price.className = "price";
			price.id = "price"+singleRowCount+"div"+DivId;;
			price.addEventListener('paste', preventStringPaste, false);

			cell4.appendChild(selectVar);
			cell4.appendChild(price);

			//Image
			var uploadBtnDiv = document.createElement("div");
			uploadBtnDiv.id = "uploadBtnDiv"+row.id;

			var uploadBtnLabel = document.createElement("label");
			uploadBtnLabel.for = "uploadFile";
			uploadBtnLabel.className = "btn btn-light btn-sm rounded-label";
			uploadBtnLabel.title = "Upload Image";

			var uploadIcon = document.createElement("i");
			uploadIcon.className = "fas fa-camera";

			var fileInput = document.createElement('input');
			fileInput.setAttribute('type', 'file');
			fileInput.setAttribute("multiple", "multiple");
			fileInput.setAttribute("name", "singleFile["+iIndex+"]["+jIndex+"][]");
			
        	fileInput.addEventListener("change", function(e) {
        		singleMultiFileUpload(e, $(this), $(this).parent().parent().attr('id'), $(this).attr('name'), 
        			iIndex, jIndex)
			});

			uploadBtnLabel.appendChild(uploadIcon);
			uploadBtnLabel.appendChild(fileInput);
			uploadBtnDiv.appendChild(uploadBtnLabel);

			var slideCount = document.createElement('input');
			slideCount.setAttribute('type', 'hidden');
			slideCount.id = "slideCount"+row.id;
          	slideCount.value = 0;

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
		  		//alert($(this).parent().attr('id'));
			});

			sliderContainerDiv.appendChild(prevBtnDiv);
			sliderContainerDiv.appendChild(nextBtnDiv);
			*/

			cell5.appendChild(uploadBtnDiv);
			cell5.appendChild(sliderContainerDiv);
			cell5.appendChild(slideCount);
			
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

			document.getElementById("hiddenSingleRowCount"+DivId).value = jIndex+1;
			
			singleRowCount++;
		});
	});
}

function addSingleOptionTableFoot(table) {
	jQuery.noConflict()(function ($) { 
		$(document).ready(function () {
			var tfoot =  document.createElement('tfoot');
			var row =  document.createElement('tr');
			var cell =  document.createElement('td');

			//cell
			cell.colSpan = "7";
			cell.align = "left";
			//button
			var button =  document.createElement('button');
			button.setAttribute('type',"button");
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

function addSingleOptionTable(optionTableDiv) {
	//table
	var table = document.createElement('table');
	table.className = "table single-option-table table-bordered table-striped table-sm";

	var tbody = document.createElement('tbody');

	//call 
	addSingleOptionTableHeading(table);
	table.appendChild(tbody);
	addSingleOptionTableFoot(table);
	
	//adding table into div
	optionTableDiv.appendChild(table);
}

function addSingleOptionGroup() {
	//option div
	var optionDiv = document.createElement('div');
	optionDiv.id = 'option'+singleDiv;
	optionDiv.className = 'optionDiv';

	//option type table div
	var optionTypeDiv = document.createElement('div');
	optionTypeDiv.id = "optionTypeDiv"+singleDiv;
	optionTypeDiv.className = "option-type-div";

	//option table div
	var optionTableDiv = document.createElement('div');
	optionTableDiv.className = "option-table-div";

	addRemoveDiv(optionDiv);

	addSingleOptionTypeTable(optionTypeDiv);
	addSingleOptionTable(optionTableDiv);

	//adding optionTable div into option div
	var hiddenRowCount = document.createElement('input');
	hiddenRowCount.setAttribute('type', 'hidden');
	hiddenRowCount.setAttribute("value", "0");
	hiddenRowCount.setAttribute("name", "hiddenSingleRowCount["+singleDiv+"]");
	hiddenRowCount.id = "hiddenSingleRowCount"+optionDiv.id;

	optionDiv.appendChild(optionTypeDiv);
	optionDiv.appendChild(optionTableDiv);
	optionDiv.appendChild(hiddenRowCount);

	//adding every option div into main option div
	var mainDiv = document.getElementById("main-div");
	mainDiv.appendChild(optionDiv);

	var hiddenSingleGroupCount = document.getElementById("hiddenSingleGroupCount");
	hiddenSingleGroupCount.value = singleDiv;
	//console.log(hiddenSingleGroupCount.value);

	singleDiv++;
}