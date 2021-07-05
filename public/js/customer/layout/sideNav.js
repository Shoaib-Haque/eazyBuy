function openNav(id) {
  jQuery.noConflict()(function ($) { 
    $(document).ready(function () {
      $(".disable").addClass("disabledbutton");
      document.getElementById("sidebar").style.display = "block";
      document.getElementById("sidebar").style.width = "330px";
      if (id) {
        document.getElementById(id).style.display = "none";
      }
    });
  });
}

function openDepartment() {
  document.getElementById("department").style.display = "block";
  document.getElementById("department").style.width = "330px";
  document.getElementById("sidebar").style.display = "none";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function openContact() {
  document.getElementById("contact").style.display = "block";
  document.getElementById("contact").style.width = "330px";
  document.getElementById("sidebar").style.display = "none";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav(id) {
  jQuery.noConflict()(function ($) { 
    $(document).ready(function () {
      $(".disable").removeClass("disabledbutton");
      document.body.style.backgroundColor = "white";
      if (id) {
        document.getElementById(id).style.display= "none";
      }
    });
  });
}