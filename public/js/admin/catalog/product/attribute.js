var rowCount = 0;
function addAttribute() {
	jQuery.noConflict()(function ($) {
		$(document).ready(function () {
			var tbody = document.getElementById("attributeBody");
			var row = document.createElement("tr");
			row.id = "row"+rowCount;

			var cell1 = document.createElement("td");
			var cell2 = document.createElement("td");
			var cell3 = document.createElement("td");

			var attributeInput = document.createElement("input");
			attributeInput.setAttribute("type", "text");
			attributeInput.setAttribute('placeholder', "Attribute");
			cell1.appendChild(attributeInput);
			cell1.className = "attribute-td";

			var textInput = document.createElement("input");
			textInput.setAttribute("type", "text");
			textInput.setAttribute('placeholder', "Text");
			cell2.appendChild(textInput);
			cell2.className = "text-td";

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
			cell3.className = "option-remove-td";

			//adding cell into row
			row.appendChild(cell1);
			row.appendChild(cell2);
			row.appendChild(cell3);
			//adding row into tbody
			tbody.appendChild(row);
			
			rowCount++;
		});
	});
}