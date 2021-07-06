var additionalInformationRowCount = 0;

function removeAdditionalInformationRow(row) {
	var rowObj = document.getElementById(row.id);
	rowObj.remove();
}

function addAdditionalInformation() {
	jQuery.noConflict()(function ($) {
		$(document).ready(function () {
			var tbody = document.getElementById("additionalInformationBody");
			var row = document.createElement("tr");
			row.id = "row"+featureRowCount;

			var cell1 = document.createElement("td");
			var cell2 = document.createElement("td");
			var cell3 = document.createElement("td");

			var tag = document.createElement("input");
			tag.setAttribute("type", "text");
			tag.setAttribute('placeholder', "Tag");
			tag.id = "tag"+additionalInformationRowCount;
			tag.name = "tag"+additionalInformationRowCount;
			cell1.appendChild(tag);

			var information = document.createElement("input");
			information.setAttribute("type", "text");
			information.setAttribute('placeholder', "Information");
			information.id = "information"+additionalInformationRowCount;
			information.name = "information"+additionalInformationRowCount;
			cell2.appendChild(information);

			var button = document.createElement("button");
			button.className = "btn btn-danger";
			button.title = "Remove";

			var icon = document.createElement("i");
			icon.className = "fa fa-minus-circle";

			button.appendChild(icon);

			cell3.appendChild(button);
			button.addEventListener("click", function() {
		  		removeAdditionalInformationRow(row);
			});

			//adding cell into row
			row.appendChild(cell1);
			row.appendChild(cell2);
			row.appendChild(cell3);
			//adding row into tbody
			tbody.appendChild(row);
			
			additionalInformationRowCount++;
		});
	});
}