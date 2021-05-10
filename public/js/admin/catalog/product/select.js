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
    	maximum_day_needs_to_arrive_td.style.display = "block";
  	} else {
  		maximum_day_needs_to_arrive.value = "";
    	maximum_day_needs_to_arrive_td.style.display = "none";
  	}
}


//Select Category after Selecting Department
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
					//category_tbody.style.display = "category_tbody";
					console.log(response);
					category_id.html(response);
				}
			});
        } 
        else {
        	//category_tbody.style.display = "none";
        	category_id.find('option').remove().end().append('<option value="">Select Department First</option>').val('');
        }
    });
});