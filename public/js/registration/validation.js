//First Letter Checking.....
function first_letter_check(name){
		if(name.charCodeAt(0) == 32){
			return true;
		}
}

//Digit Checking
function digit_check(num){
	for(var i=0;i<num.length;i++){
		if(num.charCodeAt(i)<48)
		{
			return true;
		}
		else if(num.charCodeAt(i)>57)
		{
			return true;
		}
	}
}

//Letter Checking
function letter_check(name){
	for(var i=0;i<name.length;i++){
		if(name.charCodeAt(i)>=48 && name.charCodeAt(i)<=57){
			return true;
	   }
   }
}

//SPECIAL cheracter check...........
function special_character_check(name){
	for(var i=0;i<name.length;i++){
		if((name.charCodeAt(i)>=0 && name.charCodeAt(i)<=31) || (name.charCodeAt(i)>=33 && name.charCodeAt(i)<=45)
			|| (name.charCodeAt(i)==47) || (name.charCodeAt(i)>=58 && name.charCodeAt(i)<=64) 
			|| (name.charCodeAt(i)>=91 && name.charCodeAt(i)<=96) || (name.charCodeAt(i)>=123)){
			return true;;
		}
	}
}

//Email validation
function email_check(email){
	var count=0;
	var countLetter=0;
	var countLetter2=0;
	var valid=1;
	var countDot=0;
	for (var i=0; i < email.length ; i++) { 
		if(email.charCodeAt(i)==64){
			if(i<1){
				valid=0;
				break;
		    }
			else{
				for (var j=i; j<email.length ; j++) {
					if(email.charCodeAt(j)==46){
						countDot++;
						for (var k=j-1; k>i ; k--) {
							countLetter++;
						}
						for (var k=j+1; k<email.length ; k++) {
							countLetter2++;
						}
					}
				}   
				if(countLetter<1 || countDot>1 || countLetter2<1){
					valid=0;
				}
			}
		}
		if(email.charCodeAt(i)==46){
			for (var j=0; j < email.length ; j++) { 
				if(email.charCodeAt(j)==64){
					count=1;  
				}
			}
			if(count!=1){
				count=0;
				valid=0;
			}
		}  
	}
				
	for (var i=0; i <email.length ; i++) { 
		if(email.charCodeAt(i)==64 || email.charCodeAt(i)==46){
			count++;
		}
	}
	if(count==0 && valid==1){
		valid=0;
	}
	if (valid==1 && count>1 && countDot==1) {
		return false;
	}
	else{			
		return true;	
	}
}


function validation(){
	var name = document.getElementById("name");
	var email = document.getElementById("email");
	var pass = document.getElementById("password");
	var repassword = document.getElementById("repassword");
	var flagname = false;
	var flagemail = false;
	var flagpassword = false;
	var flagrepassword = false;

	//Name 
	if(name.value == ""){
		document.getElementById("nameLabel").innerHTML = "! Enter your name.";
	}
	else if(first_letter_check(name.value)){
		document.getElementById("nameLabel").innerHTML = "! Name Cannot start with space.";
	}
	else if(special_character_check(name.value)){
		document.getElementById("nameLabel").innerHTML = "! Name cannot contain special character.";
	}
	else if(letter_check(name.value)){
		document.getElementById("nameLabel").innerHTML = "! Name cannot contain number.";
	}
	else{
		document.getElementById("nameLabel").innerHTML = "";
		document.getElementById("name").innerHTML = name;
		flagname = true;
	}
	
	//Email
	if(email.value == ""){
		document.getElementById("emailLabel").innerHTML = "! Enter your email.";
	}
	else if(email_check(email.value)){
		document.getElementById("emailLabel").innerHTML = "! Invalid email address.";
	}
	else{
		document.getElementById("emailLabel").innerHTML = "";
		document.getElementById("email").innerHTML = email;
		flagemail = true;
	}
	
	//Password validation
	if(pass.value == "")
	{
		document.getElementById("passwordLabel").innerHTML = "! Enter your password.";
	}
	else if(pass.value.length<6)
	{
		document.getElementById("passwordLabel").innerHTML = "! Password must be at least 6 characters.";
	}
	else if(pass.value.length>20)
	{
		document.getElementById("passwordLabel").innerHTML = "! Password must be at most 20 characters.";
	}
	else{
		document.getElementById("passwordLabel").innerHTML = "";
		document.getElementById("password").innerHTML = pass;
		flagpassword = true;
	}

	//Confirm Password Validation
	if(repassword.value == "")
	{
		document.getElementById("repasswordLabel").innerHTML = "! Type your password again.";
	}
	else if(pass.value != repassword.value)
	{
		document.getElementById("repasswordLabel").innerHTML = "! Passwords must match.";
	}
	else{
		document.getElementById("repasswordLabel").innerHTML = "";
		document.getElementById("repassword").innerHTML = repassword;
		flagrepassword = true;
	}

	if (flagname == false || flagemail == false || flagpassword == false || flagrepassword == false) {
		return false;
	}
	else {
		return true;
	}
}