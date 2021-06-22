var selectOptions = ["+", "-"];
var colorRowCount = 0;

//Get sizes by size type
jQuery.noConflict()(function ($) { 
	$(document).ready(function () {
		var size_type_id = $("#size_type_id");
	    $("#size_type_id").change(function () {
	    	$("#color_div").children("table").children("tbody").empty();
	        var size_type_id = $(this).val();
	        var sizes_div = $("#sizes_div");

	        if (size_type_id != "") {
	        	$.ajax({
					type:"get",
					url: '/sizetype/size',
					data:{
						size_type_id:size_type_id,
						_token:$("#token").data('token'),
						},
					datatype:'html',
					success:function(response){
						//category_tbody.style.display = "table-row-group";
						console.log(response);
						sizes_div.html(response);
						document.getElementById("color_div").style.display = "block";
					}
				});
	        } 
	        else {
	        	$("#sizes_div").empty();
	        	$("#color_div").children("table").children("tbody").empty();
	        	document.getElementById("color_div").style.display = "none";
	        }
	    });
	});
});

//select/unselect all sizes checkbox
function selectAllSizes(source) {
	jQuery.noConflict()(function ($) { 
		$(document).ready(function () {
		    var checkboxes = document.querySelectorAll('#sizes > input[type="checkbox"]');
		    var selectAllLabel = document.getElementById("selectAllLabel");
		    for (var i = 0; i < checkboxes.length; i++) {
		        if (checkboxes[i] != source)
		            checkboxes[i].checked = source.checked;
		    }

		    if (selectAllLabel.innerText == "Deselect All") {
		    	jQuery('#color_div table tbody tr').find('td:lt(4):gt(0)').empty();
		    }
		    else {
		    	if ($('#color_div table tbody tr').length >= 1) {
		    		//var tbody = jQuery('#color_div table tbody');
		    		var checkedSizes = document.querySelectorAll('input[name=size]:checked');

		    		$('#color_div > table > tbody  > tr').each(function(index, tr) { 
		   				cell2 = tr.cells[1];
		    			cell3 = tr.cells[2];
		    			cell4 = tr.cells[3];
		    			
		    			var allTextBox = $(cell2).find(':input[type=text],select').clone();

		    			outer_loop: 
		    			for (var i = 0; i < checkedSizes.length; i++) {
							var checkBoxId = checkedSizes[i].id;
							var labelText = $("#"+checkBoxId).next("label").html();
		    				for (var t = 0; t < allTextBox.length; t++) {
		    					if (allTextBox[t].value == labelText) {
		    						continue outer_loop;
		    					}
		    				}
							var sizeText = document.createElement('input');
							sizeText.setAttribute('type', 'text');
							sizeText.setAttribute('disabled', 'disabled');
							sizeText.setAttribute('value', labelText);
							sizeText.className = "disabled-text";
							cell2.appendChild(sizeText);

							var quantity = document.createElement('input');
							quantity.setAttribute('type', 'number');
							quantity.setAttribute("min", "0");
							quantity.setAttribute('placeholder', "Quantity");
							quantity.addEventListener('keydown',preventDot, false);
							quantity.addEventListener('paste', preventPaste, false);
							quantity.addEventListener('input', preventInput, false);
							cell3.appendChild(quantity);

							var selectVar = document.createElement('select');
							selectVar.className = "price-select";
							//Create and append the options
							
							for (var j = 0; j < selectOptions.length; j++) {
							    var selectOption = document.createElement("option");
							    selectOption.value = selectOptions[j];
							    selectOption.text = selectOptions[j];
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
						}
					});	
		    	}   
		    }

		    selectAllLabel.innerText == "Select All" ? 
		    selectAllLabel.innerText = "Deselect All" : selectAllLabel.innerText = "Select All"; 
    	});
	});
}

//Select or unselect any size checkbox
jQuery.noConflict()(function ($) { 
	$(document).ready(function () {
		// $(<parent>).on('<event>', '<child>', callback);
		$(document).on('change', 'input[name=size]', function() {
			var totalSizes = document.querySelectorAll('#sizes > input[type="checkbox"]');
    		var selectAllLabel = document.getElementById("selectAllLabel");
    		var selectAllSizesId = document.getElementById("selectAllSizesId");
		    if(this.checked) {
    			var checkedSizes = document.querySelectorAll('input[name=size]:checked');

		    	if (totalSizes.length == checkedSizes.length) {
		    		selectAllSizesId.checked = true;
		    		selectAllLabel.innerText = "Deselect All";
		    	}

		    	var checkBoxId = this.id;
				var labelText = $("#"+checkBoxId).next("label").html();
		      	if ($('#color_div table tbody tr').length >= 1) {
		    		$('#color_div > table > tbody  > tr').each(function(index, tr) { 
		   				cell2 = tr.cells[1];
		    			cell3 = tr.cells[2];
		    			cell4 = tr.cells[3];
							
						var size = document.createElement('input');
						size.setAttribute('type', 'text');
						size.setAttribute('disabled', 'disabled');
						size.setAttribute('value', labelText);
						size.className = "disabled-text";
						cell2.appendChild(size);

						var quantity = document.createElement('input');
						quantity.setAttribute('type', 'number');
						quantity.setAttribute("min", "0");
						quantity.setAttribute('placeholder', "Quantity");
						quantity.addEventListener('keydown',preventDot, false);
						quantity.addEventListener('paste', preventPaste, false);
						quantity.addEventListener('input', preventInput, false);
						cell3.appendChild(quantity);

						var selectVar = document.createElement('select');
						selectVar.className = "price-select";
						//Create and append the options
						for (var j = 0; j < selectOptions.length; j++) {
							var selectOption = document.createElement("option");
						    selectOption.value = selectOptions[j];
						    selectOption.text = selectOptions[j];
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
					});	
		    	}   
		    }
		    else {
		    	var uncheckedSizes = document.querySelectorAll('#sizes > input[type="checkbox"]:not(:checked)');
    			
		    	if (totalSizes.length == uncheckedSizes.length) {
		    		selectAllSizesId.checked = false;
		    		selectAllLabel.innerText = "Select All";
		    	}

		    	var checkBoxId = this.id;
				var labelText = $("#"+checkBoxId).next("label").html();

		      	if ($('#color_div table tbody tr').length >= 1) {
		    		$('#color_div > table > tbody  > tr').each(function(index, tr) { 
		    			cell2 = tr.cells[1];
		    			cell3 = tr.cells[2];
		    			cell4 = tr.cells[3];

		    			var allTextBox = $(cell2).find(':input[type=text],select').clone();
		    			var count = 0;

		    			for (var t = 0; t < allTextBox.length; t++) {
		    				if (allTextBox[t].value == labelText) {
		    					break;
		    				}
		    				count++;
		  				}

		  				var textChild = $(cell2).find(':input[type=text]').eq(count);
		  				var quantityChild = $(cell3).find(':input[type=number]').eq(count);
		  				var selectChild = $(cell4).find('select').eq(count);
		  				var priceChild = $(cell4).find(':input[type=number]').eq(count);
		  				//var selectChild = $(cell4).children().eq(count*2);
		  				//var priceChild = $(cell4).children().eq((count*2)+1);

		  				textChild.remove();
		  				quantityChild.remove();
		  				selectChild.remove();
		  				priceChild.remove();
		    		});	
		    	}
		    }
		});
	});
});


///add color row
function addColorOption() {
	jQuery.noConflict()(function ($) {
		$(document).ready(function () {
			var tbody = document.getElementById('color-tbody');
			var row =  document.createElement('tr');
			row.id = "row"+colorRowCount;
			
			var cell1 = document.createElement('td');
			var cell2 = document.createElement('td');
			var cell3 = document.createElement('td');
			var cell4 = document.createElement('td');
			var cell5 = document.createElement('td');
			var cell6 = document.createElement('td');

			var colorText = document.createElement('input');
			colorText.setAttribute('type', 'text');
			colorText.setAttribute('placeholder', "Color");
			cell1.appendChild(colorText);

			var checkedSizes = document.querySelectorAll('input[name=size]:checked');

			for (var i = 0; i < checkedSizes.length; i++) {
				var checkBoxId = checkedSizes[i].id;
				var labelText = $("#"+checkBoxId).next("label").html();
				var size = document.createElement('input');
				size.setAttribute('type', 'text');
				size.setAttribute('disabled', 'disabled');
				size.setAttribute('value', labelText);
				size.className = "disabled-text";
				cell2.appendChild(size);

				//cell2.innerHTML += $("#"+checkBoxId).next("label").html()+"<hr>";

				var quantity = document.createElement('input');
				quantity.setAttribute('type', 'number');
				quantity.setAttribute("min", "0");
				quantity.setAttribute('placeholder', "Quantity");
				quantity.addEventListener('keydown',preventDot, false);
				quantity.addEventListener('paste', preventPaste, false);
				quantity.addEventListener('input', preventInput, false);
				cell3.appendChild(quantity);

				var selectVar = document.createElement('select');
				selectVar.className = "price-select";
				//Create and append the options
				
				for (var j = 0; j < selectOptions.length; j++) {
				    var selectOption = document.createElement("option");
				    selectOption.value = selectOptions[j];
				    selectOption.text = selectOptions[j];
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
			}

			//Image
			var uploadBtnDiv = document.createElement("div");

			var uploadBtnLabel = document.createElement("label");
			uploadBtnLabel.for = "uploadFile";
			uploadBtnLabel.className = "btn btn-light btn-sm";
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
		  				    //fileinput. label.    div.    cell.     tr.      id
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
			var button = document.createElement("button");
			button.className = "btn btn-danger";
			button.title = "Remove";

			var icon = document.createElement("i");
			icon.className = "fa fa-minus-circle";

			button.appendChild(icon);

			cell6.appendChild(button);
			button.addEventListener("click", function() {
		  		removeOptionRow(row);
			});

			//adding cell into row
			row.appendChild(cell1);
			row.appendChild(cell2);
			row.appendChild(cell3);
			row.appendChild(cell4);
			row.appendChild(cell5);
			row.appendChild(cell6);
			//adding row into tbody
			tbody.appendChild(row);
			
			colorRowCount++;
		});
	});
}