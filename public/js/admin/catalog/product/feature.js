var featureRowCount = 0;

function removeFeatureOptionRow(row) {
	var rowObj = document.getElementById(row.id);
	rowObj.remove();
}

function addFeature() {
	jQuery.noConflict()(function ($) {
		$(document).ready(function () {
			var tbody = document.getElementById("featureBody");
			var row = document.createElement("tr");
			row.id = "row"+featureRowCount;

			var cell1 = document.createElement("td");
			var cell2 = document.createElement("td");
			var cell3 = document.createElement("td");

			var name = document.createElement("input");
			name.setAttribute("type", "text");
			name.setAttribute('placeholder', "Future Name");
			name.id = "name"+featureRowCount;
			name.name = "name"+featureRowCount;
			cell1.appendChild(name);

			var value = document.createElement("input");
			value.setAttribute("type", "text");
			value.setAttribute('placeholder', "Future Value");
			value.id = "value"+featureRowCount;
			value.name = "value"+featureRowCount;
			cell2.appendChild(value);

			var button = document.createElement("button");
			button.className = "btn btn-danger";
			button.title = "Remove";

			var icon = document.createElement("i");
			icon.className = "fa fa-minus-circle";

			button.appendChild(icon);

			cell3.appendChild(button);
			button.addEventListener("click", function() {
		  		removeFeatureOptionRow(row);
			});

			//adding cell into row
			row.appendChild(cell1);
			row.appendChild(cell2);
			row.appendChild(cell3);
			//adding row into tbody
			tbody.appendChild(row);
			
			featureRowCount++;
		});
	});
}