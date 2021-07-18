function addOptionGroup() {
	var optionGroup = document.getElementById("group-count");
	var optionGroupNumber = optionGroup.value;

	if (optionGroupNumber == 1) {
		addSingleOptionGroup();
	}
	else {
		addNestedOptionGroup(optionGroupNumber);
	}

	optionGroup.selectedIndex = 0; 
}

function removeConfirm(optionId) {
	var divObj = document.getElementById(optionId);
	divObj.remove();
}

function removeOptionDiv(option) {
	jQuery.noConflict()(function ($) { 
		$(document).ready(function () {
			$('#confirmRemoveOption #confirmBtn').unbind('click');
			$('#confirmRemoveOption #confirmBtn').click(function(){
			    removeConfirm(option.id);
			});
			$('#confirmRemoveOption').modal();
		});
	});
}

function addRemoveDiv(optionDiv) {
	//option remove div
	var div = document.createElement('div');
	div.className = 'remove-option';
		
	//span for remove btn
	var span = document.createElement('span');
	span.id = 'remove-option-group-id'+optionDiv.id;
	span.className = 'remove-option-group-span';
	span.title = "Remove Option Group";
		
	//icon
	var icon = document.createElement('i');
	icon.className = "far fa-trash-alt";
	//call remove div
	icon.addEventListener("click", function() {
	  	removeOptionDiv(optionDiv);
	});

	//adding icon into span
	span.appendChild(icon);
	//adding span into remove btn div
	div.appendChild(span);
	//adding option remove div into option div
	optionDiv.appendChild(div);
}

function removeOptionRow(row) {
	var rowObj = document.getElementById(row.id);
	rowObj.remove();
}

// the selector will match all input controls of type :checkbox
// and attach a click event handler 
function checkboxClick(obj) {
	jQuery.noConflict()(function ($) { 
		$(document).ready(function () {
		  	// in the handler, 'this' refers to the box clicked on
			var $box = obj;
		  	if ($box.is(":checked")) {
		    	// the name of the box is retrieved using the .attr() method
		    	// as it is assumed and expected to be immutable
			    var group = obj.closest('tbody').find('input:checkbox') ;
		    	// the checked state of the group/box on the other hand will change
		    	// and the current value is retrieved using .prop() method
		    	$(group).prop("checked", false);
		    	$box.prop("checked", true);
		  	} 
		  	else {
		    	$box.prop("checked", false);
		  	}
		});
	});
}