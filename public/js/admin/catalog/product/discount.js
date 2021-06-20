var today = new Date().toISOString().split('T')[0];
var tableBody = document.getElementById("discountBody");

function addDiscount() {
	var rowId = tableBody.rows.length;
 	var row = document.createElement("tr");
 	row.id = "DiscountRow"+rowId;

	var cell1 = document.createElement("td");
	var cell2 = document.createElement("td");
	var cell3 = document.createElement("td");
	var cell4 = document.createElement("td");
	var cell5 = document.createElement("td");

	var minQuality = document.createElement("input");
	minQuality.setAttribute("type", "number");
	minQuality.setAttribute('placeholder', "Min Quality");
	cell1.appendChild(minQuality);

	var discount = document.createElement("input");
	discount.setAttribute("type", "number");
	discount.setAttribute('placeholder', "Discount");
	cell2.appendChild(discount);

	var startDate = document.createElement("input");
	startDate.setAttribute("type", "date");
	startDate.setAttribute("min", today);
	cell3.appendChild(startDate);
	cell3.setAttribute('style','text-align :center;');

	var endDate = document.createElement("input");
	endDate.setAttribute("type", "date");
	endDate.setAttribute("min", today);
	cell4.appendChild(endDate);
	cell4.setAttribute('style','text-align :center;');

	var removeBtn = document.createElement("button");
	removeBtn.className = "btn btn-danger";
	removeBtn.title = "Remove";

	var icon = document.createElement("i");
	icon.className = "fa fa-minus-circle";

	removeBtn.appendChild(icon);

	cell5.appendChild(removeBtn);
	removeBtn.addEventListener("click", function() {
		removeOptionRow(row);
	});

	row.appendChild(cell1);
	row.appendChild(cell2);
	row.appendChild(cell3);
	row.appendChild(cell4);
	row.appendChild(cell5);

	tableBody.appendChild(row);
}