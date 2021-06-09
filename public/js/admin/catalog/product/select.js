// shipping_required
function maximumDay() {
	// Get the checkbox
	var shipping_required = document.getElementById("shipping_required");
  	// Get the td
	var maximum_day_needs_to_arrive_td = document.getElementById("maximum_day_needs_to_arrive_td");
	// Get the number input
	var maximum_day_needs_to_arrive = document.getElementById("maximum_day_needs_to_arrive");

  	// If the checkbox is checked, display the td
  	if (shipping_required.checked == true){
    	maximum_day_needs_to_arrive_td.style.display = "table-cell";
  	} else {
  		maximum_day_needs_to_arrive.value = "";
    	maximum_day_needs_to_arrive_td.style.display = "none";
  	}
}


//Select Category after Selecting Department
jQuery.noConflict()(function ($) { // this was missing for me
	$(document).ready(function () {
		var category_tbody = $("#category_tbody")[0];
	    $("#department_id").change(function () {
	        var department_id = $(this).val();
	        var category_id = $("#category_id");

	        if (department_id != "") {
	        	$.ajax({
					type:"get",
					url: '/department/category',
					data:{
						department_id:department_id,
						_token:$("#token").data('token'),
						},
					datatype:'html',
					success:function(response){
						category_tbody.style.display = "table-row-group";
						console.log(response);
						category_id.html(response);
					}
				});
	        } 
	        else {
	        	category_tbody.style.display = "none";
	        	//category_id.remove();
	        	category_id.find('option').remove().end().append('<option value="">Select Department First</option>').val('');
	        }
	    });
	});
});

//Brand Search
jQuery.noConflict()(function ($) {
	$(document).ready(function () {
		$( "#brand" ).autocomplete({
		    source: function( request, response ) {
		        $.ajax({
		        	url: "/brand/search",
		        	dataType: "json",
		        	data: {
		        		term : request.term,
		        		_token:$("#token").data('token'),
		          	},
		        	success: function(data) {
		                response(data);
		                //console.log(data);
		            },
		        	minLength: 1,
		        	autoFocus: true,
				    select: function( event, ui ) {
				    	$('#brand').val(ui.item.value);
				    	$('#brand_id').val(ui.item.id);
				    }
		        });
		    }
		});
	});
});

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

var selectOptions = ["+", "-"];
//select all sizes checkbox
function selectAllSizes(source) {
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
					sizeText.className = "disabledText";
					cell2.appendChild(sizeText);

					var quantityNumber = document.createElement('input');
					quantityNumber.setAttribute('type', 'number');
					quantityNumber.setAttribute("min", "0");
					quantityNumber.setAttribute('placeholder', "Quantity");
					quantityNumber.addEventListener('keydown',preventDot, false);
					quantityNumber.addEventListener('paste', preventPaste, false);
					quantityNumber.addEventListener('input', preventInput, false);
					cell3.appendChild(quantityNumber);

					var selectVar = document.createElement('select');
					selectVar.className = "colorPriceSelect";
					//Create and append the options
					
					for (var j = 0; j < selectOptions.length; j++) {
					    var selectOption = document.createElement("option");
					    selectOption.value = selectOptions[j];
					    selectOption.text = selectOptions[j];
					    selectVar.appendChild(selectOption);
					}

					var priceNumber = document.createElement('input');
					priceNumber.setAttribute('type', 'number');
					priceNumber.setAttribute("min", "0");
					priceNumber.setAttribute('placeholder', "Price");
					priceNumber.className = "colorPriceNumber";
					priceNumber.addEventListener('paste', preventStringPaste, false);

					cell4.appendChild(selectVar);
					cell4.appendChild(priceNumber);
				}
			});	
    	}   
    }

    selectAllLabel.innerText == "Select All" ? 
    selectAllLabel.innerText = "Deselect All" : selectAllLabel.innerText = "Select All"; 
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
							
						var sizeText = document.createElement('input');
						sizeText.setAttribute('type', 'text');
						sizeText.setAttribute('disabled', 'disabled');
						sizeText.setAttribute('value', labelText);
						sizeText.className = "disabledText";
						cell2.appendChild(sizeText);

						var quantityNumber = document.createElement('input');
						quantityNumber.setAttribute('type', 'number');
						quantityNumber.setAttribute("min", "0");
						quantityNumber.setAttribute('placeholder', "Quantity");
						quantityNumber.addEventListener('keydown',preventDot, false);
						quantityNumber.addEventListener('paste', preventPaste, false);
						quantityNumber.addEventListener('input', preventInput, false);
						cell3.appendChild(quantityNumber);

						var selectVar = document.createElement('select');
						selectVar.className = "colorPriceSelect";
						//Create and append the options
						for (var j = 0; j < selectOptions.length; j++) {
							var selectOption = document.createElement("option");
						    selectOption.value = selectOptions[j];
						    selectOption.text = selectOptions[j];
						    selectVar.appendChild(selectOption);
						}

						var priceNumber = document.createElement('input');
						priceNumber.setAttribute('type', 'number');
						priceNumber.setAttribute("min", "0");
						priceNumber.setAttribute('placeholder', "Price");
						priceNumber.className = "colorPriceNumber";
						priceNumber.addEventListener('paste', preventStringPaste, false);

						cell4.appendChild(selectVar);
						cell4.appendChild(priceNumber);
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