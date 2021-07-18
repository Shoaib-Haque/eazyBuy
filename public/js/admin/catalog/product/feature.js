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

			var tag = document.createElement("input");
			tag.setAttribute("type", "text");
			tag.setAttribute('placeholder', "Tag");
			tag.id = "tag"+featureRowCount;
			tag.name = "featureTag[]";
			cell1.appendChild(tag);

			var feature = document.createElement("input");
			feature.setAttribute("type", "text");
			feature.setAttribute('placeholder', "Feature");
			feature.id = "feature"+featureRowCount;
			feature.name = "feature[]";
			cell2.appendChild(feature);

			var button = document.createElement("button");
			button.setAttribute("type", "button");
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