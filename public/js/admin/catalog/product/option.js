function addTypeTable(optionTypeDiv) {
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
	group.setAttribute("type", "text");
	group.setAttribute('placeholder', "Option Group");
	group.id = "optionGroup"+optionTypeDiv.id;
	group.name = "optionGroup"+optionTypeDiv.id;
	r1td2.appendChild(group);

	row1.appendChild(r1td1);
	row1.appendChild(r1td2);

	//row2
	var r2td1 = document.createElement('td');
	r2td1.innerHTML = "<strong><font class = 'star'>*</font>"+"Input Type</strong>";

	var r2td2 = document.createElement('td');
	var select = document.createElement('select');
	select.id = "selectType"+optionTypeDiv.id;
	select.name = "selectType"+optionTypeDiv.id;

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

function removeOptionDiv(option) {
	var divObj = document.getElementById(option.id);
	divObj.remove();
}

function addRemoveDiv(optionDiv) {
	//option remove div
	var div = document.createElement('div');
	div.className = 'remove-option';
		
	//span for remove btn
	var span = document.createElement('span');
	span.id = 'remove-option-group-id'+optionDiv.id;
	span.className = 'remove-option-group-span';
	span.title = "Remove Option Group";
		
	//icon
	var icon = document.createElement('i');
	icon.className = "far fa-trash-alt";
	//call remove div
	icon.addEventListener("click", function() {
	  	removeOptionDiv(optionDiv);
	});

	//adding icon into span
	span.appendChild(icon);
	//adding span into remove btn div
	div.appendChild(span);
	//adding option remove div into option div
	optionDiv.appendChild(div);
}

function removeOptionRow(row) {
	var rowObj = document.getElementById(row.id);
	rowObj.remove();
}