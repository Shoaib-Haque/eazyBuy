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
	        	category_id.find('option').remove().end().append('<option value="">Select Department First</option>').val('');
	        }
	    });
	});
});

jQuery.noConflict()(function ($) {
	$(document).ready(function () {
		$( "#brandName" ).autocomplete({
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
				    	$('#brandName').val(ui.item.value);
				    	$('#brandId').val(ui.item.id);
				    }
		        });
		    }
		});
	});
});

jQuery.noConflict()(function ($) { // this was missing for me
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


function selectAllSizes(source) {
    var checkboxes = document.querySelectorAll('#sizes > input[type="checkbox"]');
    var selectAllLabel = document.getElementById("selectAllLabel");
    selectAllLabel.innerText == "Select All" ? selectAllLabel.innerText =  "Deselect All" : selectAllLabel.innerText = "Select All"; 
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}