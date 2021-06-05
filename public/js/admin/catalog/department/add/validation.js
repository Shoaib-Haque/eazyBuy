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

function checkDuplicate(name) {
	var result;
	$.ajax({
		type:"get",
		url: '/department/checkduplicate',
		async: false, 
		data:{
			name:name,
		},
		datatype:'text',
		success:function(data){
			console.log(data);
			if (data == "Has Duplicate") {
				result = true;
			}
			else {
				result = false;
			}
		},
	});
	return result;
}

function validation(){
	var name = document.getElementById("name");
	var flagname = false;

	//Name 
	if(name.value == ""){
		document.getElementById("nameLabel").innerHTML = "Department Name must be between 1 and 100 characters!";
	}
	else if(first_letter_check(name.value)){
		document.getElementById("nameLabel").innerHTML = "Department Name Cannot start with space!";
	}
	else if(special_character_check(name.value)){
		document.getElementById("nameLabel").innerHTML = "Department Name cannot contain special character!";
	}
	else if(checkDuplicate(name.value)) {
		document.getElementById("nameLabel").innerHTML = "Department name already in use!!";
	}
	else{
		document.getElementById("nameLabel").innerHTML = "";
		document.getElementById("name").innerHTML = name;
		flagname = true;
	}
	
	if (flagname == false) {
		return false;
	}
	else {
		return true;
	}
}