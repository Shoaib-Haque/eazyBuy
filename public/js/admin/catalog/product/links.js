var flag = true;

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
function removeList(liId) {
	jQuery.noConflict()(function ($) {
		$(document).ready(function () {
			var obj = document.getElementById(liId);
			obj.remove();
			var totalList = $("#related_product_list ul li");
			if (totalList.length <= 0) {
				document.getElementById('related_product_list').style.display = "none";
			}
		});
	});
}
//Related Product
jQuery.noConflict()(function ($) {
	$(document).ready(function () {
		$( "#related_product_search" ).autocomplete({
			appendTo: "#related_product_container",
			minLength: 0,
		    source: function( request, response ) {
		        $.ajax({
		        	url: "/relatedproduct/search",
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
		    	var selectedProduct = $("#related_product_list ul input");
		    	if (selectedProduct.length >= 10) {
		    		return false;
		    	}
		    	for (var i = 0; i < selectedProduct.length; i++) {
		    		if (selectedProduct[i].value == ui.item.id) {
		    			flag = false;
		    			break;
		    		}
		    	}
		    	if (flag) {
		    		//console.log(ui.item.id);
		    		var li = document.createElement("li");
		    		li.id = "list"+ui.item.id;

		    		var icon = document.createElement('i');
					icon.className = "fa fa-minus-circle";
		    		icon.style.cursor = "pointer";
		    		icon.addEventListener("click", function() {
				  		removeList($(this).parent().attr('id'));
					});

			        var hidden = document.createElement("input");
			        hidden.type = "hidden";
			        hidden.name = "relatedproduct[]"
			        hidden.value = ui.item.id;

			        var span = document.createElement('span');
			        span.innerText = " "+ui.item.value;

			        li.appendChild(icon);
			        li.appendChild(hidden);
			        li.appendChild(span);
		    		$("#related_product_list").children().append(li);

		    		var totalList = $("#related_product_list ul li");
		    		if (totalList.length > 0) {
		    			document.getElementById('related_product_list').style.display = "block";
		    		}
		    	}
		    	
		    	flag = true;
				return false;    	
			}
		}).focus(function() {  //when focus, means there is no input.
		    if ($(this).val().length == 0) {
		        $(this).autocomplete("search", "");
		    }
		});
	});
});