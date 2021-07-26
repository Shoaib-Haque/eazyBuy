//Select Category after Selecting Department
jQuery.noConflict()(function ($) {
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
						//console.log(response);
						category_id.html(response);
					}
				});
	        } 
	        else {
	        	category_tbody.style.display = "none";
	        	category_id.find('option').remove().end().append('<option value="">Select Department First</option>').val('');
	        	//category_id.remove();
	        	subcategory_tbody.style.display = "none";
	        	subcategory_id.find('option').remove().end().append('<option value="">Select Category First</option>').val('');
	        }
	    });
	});
});

//Select Subcategory after Selecting Category
jQuery.noConflict()(function ($) {
	$(document).ready(function () {
		var subcategory_tbody = $("#subcategory_tbody")[0];
	    $("#category_id").change(function () {
	        var category_id = $(this).val();
	        var subcategory_id = $("#subcategory_id");

	        if (category_id != "") {
	        	$.ajax({
					type:"get",
					url: '/category/subcategory',
					data:{
						category_id:category_id,
						_token:$("#token").data('token'),
						},
					datatype:'html',
					success:function(response){
						subcategory_tbody.style.display = "table-row-group";
						//console.log(response);
						subcategory_id.html(response);
					}
				});
	        } 
	        else {
	        	subcategory_tbody.style.display = "none";
	        	subcategory_id.find('option').remove().end().append('<option value="">Select Category First</option>').val('');
	        }
	    });
	});
});

//Brand Search
jQuery.noConflict()(function ($) {
	$(document).ready(function () {
		$( "#brand" ).autocomplete({
			appendTo: "#brand_container",
			minLength: 0,
		    source: function( request, response ) {
		        $.ajax({
		        	url: "/brand/search",
		        	dataType: "json",
		        	data: {
		        		term : request.term,
		        		_token:$("#token").data('token'),
		          	},
		          	autoFocus: true,
		        	success: function(data) {
		                response(data);
		                //console.log(data);
		            },    
		        });
		    },
		    select: function( event, ui ) {
				$("#brand").val(ui.item.value);
				$("#brand_id").val(ui.item.id);
				return false;
			}
		}).focus(function() {  //when focus, means there is no input.
		    if ($(this).val().length == 0) {
		        $(this).autocomplete("search", "");
		    }
		});
	});
});

//when focus, means there is no input char. 
//These creates problem with extra unwanted scrollbar! so better use upper solution.
/*  
jQuery.noConflict()(function ($) {
	$(document).ready(function () {
		$("#brand").focus(function() {
		    if ($(this).val().length == 0) {
		        $(this).autocomplete("search", "");
		    }
		});
	});
});
*/ 