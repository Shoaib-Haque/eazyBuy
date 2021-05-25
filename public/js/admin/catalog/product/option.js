var div = 0;

function addRemoveDiv(option) {
	//option remove div
	var removeOption = document.createElement('div');
	removeOption.className = 'remove-option';
	//remove btn div
	var removeBtn = document.createElement('div');
	removeBtn.className = "remove-btn";
	
	//span for remove btn
	var span = document.createElement('span');
	span.id = 'remove-option-group-id'+div;
	span.className = 'remove-option-group-class'
	$("#remove-option-group-id"+div).attr("data-toggle", "tooltip");
	$("#remove-option-group-id"+div).attr("data-placement", "bottom");
	$("#remove-option-group-id"+div).attr("title", "Remove Option Group");
	//$("#remove-option-group-id"+div).tooltip("show");
	$("#remove-option-group-id"+div).tooltip();
	//icon
	var trashIcon = document.createElement('i');
	trashIcon.className = "far fa-trash-alt";

	//adding icon into span
	span.appendChild(trashIcon);
	//adding span into remove btn div
	removeBtn.appendChild(span);
	//adding remove btn div into option  remove div
	removeOption.appendChild(removeBtn);
	//adding option remove div into option div
	option.appendChild(removeOption);
}

function addTable1(option) {
	//option table div
	var optionTable = document.createElement('div');
	optionTable.className = "option-table";

	//table
	var table1 = document.createElement('table');
	table1.className = "table table-borderless";
	//row1
	var table1Row1 = document.createElement('tr');

	//heading
	var table1Row1th1 = document.createElement('th');
	table1Row1th1.innerHTML = "<font class = 'star'>*</font>"+"Option Group";
	var table1Row1th2 = document.createElement('th');
	table1Row1th2.innerHTML = "<font class = 'star'>*</font>"+"Input Type";
	var table1Row1th3 = document.createElement('th');
	table1Row1th3.innerText = "Required";
	var table1Row1th4 = document.createElement('th');
	table1Row1th4.innerText = "Sort Order";
	table1Row1th4.className = "sort-order-th";

	//adding headings into row
	table1Row1.appendChild(table1Row1th1);
	table1Row1.appendChild(table1Row1th2);
	table1Row1.appendChild(table1Row1th3);
	table1Row1.appendChild(table1Row1th4);

	//row2


	//adding heading row into table
	table1.appendChild(table1Row1);
	//adding table into div
	optionTable.appendChild(table1);
	//adding optiontable div into option div
	option.appendChild(optionTable);
}

function addOptionGroup() {
	//option div
	var option = document.createElement('div');
	option.id = 'option'+div;
	option.className = 'option';

	addRemoveDiv(option);
	addTable1(option);

	//adding every option div into main option div
	var optionDiv = document.getElementById("option-div");
	optionDiv.appendChild(option);

	div++;
}