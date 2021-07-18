var result = false;
//First Letter Checking.....
function first_letter_check(name){
		if(name.charCodeAt(0) == 32){
			return true;
		}
}

//SPECIAL cheracter check
function special_character_check(name){
	for(var i=0;i<name.length;i++){
		if((name.charCodeAt(i)>=0 && name.charCodeAt(i)<=31) || (name.charCodeAt(i)>=33 && name.charCodeAt(i)<=45)
			|| (name.charCodeAt(i)==47) || (name.charCodeAt(i)>=58 && name.charCodeAt(i)<=64) 
			|| (name.charCodeAt(i)>=91 && name.charCodeAt(i)<=96) || (name.charCodeAt(i)>=123)){
			return true;;
		}
	}
}

function checkDuplicate(name, did, callback) {
	jQuery.noConflict()(function ($) { 
		$(document).ready(function () {
			$.ajax({
				type:"get",
				url: '/category/checkduplicate',
				data:{
					name:name,
					did:did,
				},
				datatype:'text',
				success:function(data){
					if (data == "Has Duplicate") {
						result = true;
					}
					callback();
				},
			});
		});
	});
}

function validation(){
	var name = document.getElementById("name");
	var oldname = document.getElementById("oldname");
	var did = document.getElementById("did");
	var olddid = document.getElementById("olddid");
	if (name.value == oldname.value && did.value == olddid.value) {
		jQuery.noConflict()(function ($) { 
			$(document).ready(function () {
				$('#form').submit();
			});
		});
	}
	else {
		checkDuplicate(name.value, did.value, function () { 
			finalValidation(); 
		});
	}
}

function finalValidation(){
	var name = document.getElementById("name");
	var did = document.getElementById("did");
	var flagname = false;
	var flagdid = false;

	jQuery.noConflict()(function ($) { 
		$(document).ready(function () {
			//Name 
			if(name.value == ""){
				document.getElementById("nameLabel").innerHTML = "Category Name must be between 1 and 100 characters!";
			}
			else if(first_letter_check(name.value)){
				document.getElementById("nameLabel").innerHTML = "Category Name Cannot start with space!";
			}
			else if(special_character_check(name.value)){
				document.getElementById("nameLabel").innerHTML = "Category Name cannot contain special character!";
			}
			else if(result == true) {
				document.getElementById("nameLabel").innerHTML = "Category name already in use in same department!";
				result = false;
			}
			else{
				document.getElementById("nameLabel").innerHTML = "";
				document.getElementById("name").innerHTML = name.value;
				flagname = true;
			}

			//did
			if (did.value == "") {
				document.getElementById("departmentLabel").innerHTML = "Please select a department!";
			}
			else {
				document.getElementById("departmentLabel").innerHTML = "";
				flagdid = true;
			}
			
			
			if (flagname == false || flagdid == false) {
				return false;
			}
			else {
				$('#confirmBox').modal();
			}
		});
	});
}