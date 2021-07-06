var today = new Date().toISOString().split('T')[0];
var tableBody = document.getElementById("discountBody");

discountRow = 0;

function removeDiscountOptionRow(row) {
	var rowObj = document.getElementById(row.id);
	rowObj.remove();
}

function addDiscount() {
 	var row = document.createElement("tr");
 	row.id = "DiscountRow"+discountRow;

	var cell1 = document.createElement("td");
	var cell2 = document.createElement("td");
	var cell3 = document.createElement("td");
	var cell4 = document.createElement("td");
	var cell5 = document.createElement("td");

	var quantity = document.createElement("input");
	quantity.setAttribute("type", "number");
	quantity.setAttribute('placeholder', "Min Qty");
	quantity.id = "quantity"+discountRow;
	quantity.name = "quantity"+discountRow;
	cell1.appendChild(quantity);

	var discountParcentage = document.createElement("input");
	discountParcentage.setAttribute("type", "number");
	discountParcentage.setAttribute('placeholder', "Discount %");
	discountParcentage.id = "discount_parcentage"+discountRow;
	discountParcentage.name = "discount_parcentage"+discountRow;
	cell2.appendChild(discountParcentage);

	var startDate = document.createElement("input");
	startDate.setAttribute("type", "date");
	startDate.setAttribute("min", today);
	startDate.id = "startDate"+discountRow;
	startDate.name = "startDate"+discountRow;
	cell3.appendChild(startDate);
	cell3.setAttribute('style','text-align :center;');

	var endDate = document.createElement("input");
	endDate.setAttribute("type", "date");
	endDate.setAttribute("min", today);
	endDate.id = "endDate"+discountRow;
	endDate.name = "endDate"+discountRow;
	cell4.appendChild(endDate);
	cell4.setAttribute('style','text-align :center;');

	var button = document.createElement("button");
	button.className = "btn btn-danger";
	button.title = "Remove";

	var icon = document.createElement("i");
	icon.className = "fa fa-minus-circle";

	button.appendChild(icon);

	cell5.appendChild(button);
	button.addEventListener("click", function() {
		removeDiscountOptionRow(row);
	});

	row.appendChild(cell1);
	row.appendChild(cell2);
	row.appendChild(cell3);
	row.appendChild(cell4);
	row.appendChild(cell5);

	tableBody.appendChild(row);

	discountRow++;
}