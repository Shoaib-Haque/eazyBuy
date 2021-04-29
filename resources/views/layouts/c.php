<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <style>
    
    /*side navbar*/
/*sidebar*/
.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: white;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 0px;
  padding-bottom: 60px;
}
.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 15px;
  color: black;
  display: block;
  transition: 0.3s;
}
.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
  color: white;
}

/*hello*/
.mySidebar-hello {
  background-color: #232F3E;
  color: white;
  height: 50px;
  padding: 10px;
  margin-bottom: 10px;
  margin-top: 0px;
  text-align: center;
}
.mySidebar-hello > a {
  text-decoration: none;
  color: white;
}
.sidebar-signin {
  text-align: left;
}

.menu-btn {
  border: none;
  background: none;
  width: 100%;
    text-align: left;
    padding:0px;
}

/*go back main menu*/
.main-menu-btn {
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  border-bottom: 1px solid black;
  padding:0px;
}

/*arrow*/
.fa-arrow-right {
  float: right;
}
.fa-arrow-left {
  margin-right: 5px;
}

h6 {
  margin-left: 10px;
}
h5 {
  margin-left: 10px;
  font-weight: bold;
}

.dropdown-item:focus{
  background-color: white;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 12px;}
}
/*second navbar*/
.navbar-second {
  height: 40px;
  padding-top: 2px;
  background-color: #232F3E;
  color: white;
}

.container-fluid {
  background-color: #1e2e3a;
}

.white {
  color: white;
}
.grey {
  color: #ccc;
}
.bold {
  font-weight: bold;
}

/*all button*/
.openbtn {
  font-size: 16px;
  cursor: pointer;
  background-color: #232F3E;;
  color: white;
  padding: 3px 15px;
  border: none;
  height: 30px;
  margin-top: 5px;
}
.openbtn:hover {
  outline: 1px solid white;
}

/*dropdown browsing history*/
.dropbtn-bh {
  color: white;
  background-color: #232F3E;
  font-size: 16px;
  width: 150px;
  height: 30px;
  border: none;
}
.dropdown-bh{
  background-color: #232F3E;
  height: 25px;
  width: 150px;
  margin-top: 5px;
}
.dropdown-bh:hover {
  background-color: #232F3E;
  outline: 1px solid white;
}
.dropdown-bh:hover > .dropbtn-bh{
  background-color: #232F3E;
}

/*buy again*/
.nav-buy-again {
  height: 30px;
  padding: 3px 5px;
  margin-top: 5px;
  text-align: center;
}
.nav-buy-again:hover {
  outline: 1px solid white;
}
.nav-buy-again > a{
  color: white;
  text-decoration: none;
}
    </style>
    
</head>
<body>


<div id="mySidebar" class="sidebar">
	  <div class="mySidebar-hello">
	  	<a href="/signin" class="sidebar-signin">Hello, Sign in</a>
	  	<a href="javascript:void(0)" id="Sidebar" class="closebtn" onclick="closeNav(this.id)">×</a>
	  </div>
	  <h5>Shop By Department</h5>
	  <button class="menu-btn" id="aboutBtn" onclick="openDepartment()">
	  <a class="dropdown-item" href="#">About<i class="fas fa-arrow-right fa-xs"></i></a>
	  </button>
	  <button class="menu-btn" id="aboutBtn" onclick="openContact()">
	  <a class="dropdown-item" href="#">Contact<i class="fas fa-arrow-right fa-xs"></i></a>
	  </button>
	  <a class="dropdown-item" href="/customerhome">Services</a>
	  <a class="dropdown-item" href="#">Clients</a>
	  <a class="dropdown-item" href="#">About</a>
	  <a class="dropdown-item" href="#">Services</a>
	  <a class="dropdown-item" href="#">Clients</a>
	  <a class="dropdown-item" href="#">Contact</a>
	  <hr>
	  <h5>Help & Settings</h5>
	  <a class="dropdown-item" href="/customerhome">About</a>
	  <a class="dropdown-item" href="#">Services</a>
	  <a class="dropdown-item" href="#">Clients</a>
	  <a class="dropdown-item" href="#">Contact</a>
	</div>

	<div id="myDepartment" class="sidebar">
	  <div class="mySidebar-hello">
	  	<a href="/signin" class="sidebar-signin">Hello, Sign in</a>
	  	<a href="javascript:void(0)" id="Department" class="closebtn" onclick="closeNav(this.id)">×</a>
	  </div>
	  <button class="main-menu-btn" id="Department" onclick="openNav(this.id)">
	    <a class="dropdown-item" href="#"><i class="fas fa-arrow-left fa-xs"></i>Main Menu</a>
	  </button>
	  <a class="dropdown-item" href="/customerhome">Clients</a>
	  <a class="dropdown-item" href="#">Contact</a>
	  <a class="dropdown-item" href="#">About</a>
	  <a class="dropdown-item" href="#">Services</a>
	</div>

	<div id="myContact" class="sidebar">
	  <div class="mySidebar-hello">
	  	<a href="/signin" class="sidebar-signin">Hello, Sign in</a>
	  	<a href="javascript:void(0)" id="Contact" class="closebtn" onclick="closeNav(this.id)">×</a>
	  </div>
	  <button class="main-menu-btn" id="Contact" onclick="openNav(this.id)">
	    <a class="dropdown-item" href="#"><i class="fas fa-arrow-left fa-xs"></i>Main Menu</a>
	  </button>
	  <a class="dropdown-item" href="/customerhome">Clients</a>
	  <a class="dropdown-item" href="#">Contact</a>
	  <a class="dropdown-item" href="#">About</a>
	</div> 
    
    
    <nav class="navbar navbar-expand-sm navbar-second" id="navid">
	  <!-- Links -->
	  	<ul class="navbar-nav">
		    <li class="nav-item">
		      <button class="openbtn" onclick="openNav()">☰ All</button> 
		    </li>

		    <div class="dropdown dropdown-bh ml-3">
			    <button class="dropbtn dropbtn-bh btn-dark dropdown-toggle">Browsing History</button>
			    <div class="dropdown-content">
			  	</div>
			</div>

		    <li class="nav-item nav-buy-again ml-3">
		      <a class="" href="#">Buy Again</a>
		    </li>
	  	</ul>
	</nav>
    <h1><a href="www.facebook.com">Hello ndsv.jdsvmcfmvfnjm</a><h1>

</body>
<script>
//var body = document.getElementsByTagName('body')[0];
var navTrigger = document.getElementsByClassName('openbtn')[0];
navTrigger.addEventListener('click', toggleNavigation);

function toggleNavigation(event) {
  event.preventDefault();
  document.body.style.backgroundColor = "rgba(0,0,0,0.6)";
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
  document.getElementById('my'+id).style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}


</script>
</html>
