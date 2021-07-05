function selectDepartment(val){
	jQuery.noConflict()(function ($) { 
		$(document).ready(function () {
			if(val.innerHTML!="") {
				$('#dropdownDepartment').val(val.innerHTML);
				$('#dropdownDepartment').html(val.innerHTML);
			}
			else {
				$('#dropdownDepartment').val('');
				$('#dropdownDepartment').html('Select Client');
			}
		});
	});
} 