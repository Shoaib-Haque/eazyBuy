jQuery.noConflict()(function ($) { 
  $(document).ready(function () {
  // Dropdown menu
    $('.sidebar-dropdown > a').click(function () {
      $('.sidebar-submenu').slideUp(200);
      if ($(this).parent().hasClass('active')) {
        $('.sidebar-dropdown').removeClass('active');
        $(this).parent().removeClass('active');
      } 
      else {
        $('.sidebar-dropdown').removeClass('active');
        $(this).next('.sidebar-submenu').slideDown(200);
        $(this).parent().addClass('active');
      }
    });
  });
});


var path = window.location;
var segments = window.location.href.split("/");
//alert(segments[6]);
var segmentCount = path.toString().split("/").length ;
//- 1 - (path.toString().indexOf("http://")==-1?0:2)
//alert(segmentCount);
if (segmentCount >= 6) {
	url = segments[0]+"//"+segments[2]+"/"+segments[3]+"/"+segments[4]+"/"+segments[5];
}
else {
	url =  window.location;
}
//alert(url);

//var url = window.location;	
const allLinks = document.querySelectorAll('.sidebar-dropdown a');

const currentLink = [...allLinks].filter(e => {
    return e.href == url;
});

currentLink[0].classList.add("active")
currentLink[0].closest(".sidebar-dropdown").classList.add("active");
currentLink[0].closest("li").classList.add("liactive");  //.sidebar-submenu li
if (currentLink[0].closest(".sidebar-submenu") != null) {
	currentLink[0].closest(".sidebar-submenu").style.display="block";
}
//currentLink[0].closest(".sidebar-submenu").classList.add("active");

//responsive
function openNav() {
    document.getElementById("sidebar").style.width = "260px";
    document.getElementById("page-container").style.marginLeft = "260px";
    document.getElementById("sidenav-button").style.display = "none";
}
 
function closeNav() {
    document.getElementById("sidebar").style.width = "0";
    document.getElementById("page-container").style.marginLeft = "0";
    document.getElementById("sidenav-button").style.display = "block";
}