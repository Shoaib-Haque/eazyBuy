function openNav(id) {
  $(".disable").addClass("disabledbutton");
  //document.body.style.backgroundColor = "rgba(0,0,0,0.6)";
  document.getElementById("mySidebar").style.visibility = "visible";
  document.getElementById("mySidebar").style.width = "330px";
  document.getElementById('my'+id).style.width = "0";
}

function openDepartment() {
  document.getElementById("myDepartment").style.visibility = "visible";
  document.getElementById("myDepartment").style.width = "330px";
  document.getElementById("mySidebar").style.width = "0";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function openContact() {
  document.getElementById("myContact").style.visibility = "visible";
  document.getElementById("myContact").style.width = "330px";
  document.getElementById("mySidebar").style.width = "0";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav(id) {
  document.body.style.backgroundColor = "white";
  $(".disable").removeClass("disabledbutton");
  document.getElementById('my'+id).style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}