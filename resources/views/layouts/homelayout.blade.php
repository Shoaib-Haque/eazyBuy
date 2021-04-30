<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
  	<link rel="stylesheet" type="text/css" href="{{asset('css/home/layoutFirstNav.css')}}">
  	<link rel="stylesheet" type="text/css" href="{{asset('css/home/layoutSecondNav.css')}}">
  	<link rel="stylesheet" type="text/css" href="{{asset('css/home/layoutFooter.css')}}">
  	<link rel="stylesheet" type="text/css" href="{{asset('css/home/layoutSideNav.css')}}">
  	<link rel="shortcut icon" href="{{asset('images/logo/eazyBuyLogo.ico')}}" type="image/png">

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  	<script src="{{ asset('js/customer/layoutSideNav.js') }}"></script>
  	<style>
	</style>
</head>
<body>
	@yield('sidebar')
	<!--sidenav-->
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

	@yield('header')
	<div class="disable">
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark" id="upnav">
		<ul class="navbar-nav">
		    <li class="nav-item active">
		        <a href="/home"><img id="home-link-img" src="{{asset('images/logo/eazyBuyLogo.ico')}}"></a>
		    </li>

		    <li class="hidden-xs deli ml-3">
            	<a>
            		<span class="grey">Deliver to</span>
            		<div class="white bold"><i class="fas fa-map-marker-alt"></i>Bangladesh</div>
            	</a>
            </li>

		    <div class="input-group ml-3">
		    	<div class="input-group-prepend">
		    		<button type="button" class="btn btn-outline-light dropdown-toggle" data-toggle="dropdown">
		      			All
		    		</button>
					<div class="dropdown-menu">
				        <a class="dropdown-item" href="#">Link 1</a>
				    </div>
		    	</div>

		    	<input type="text" class="form-control" id="search-box">
				<div class="input-group-append">
             		<button type="button" class="sub btn btn-default">
             			<i class="fa fa-search"></i>
            		</button>				   	
				</div>
		    </div>

		    <div class="dropdown ml-3">
			    <a href="/signin">
			    	<button class="dropbtn btn-dark dropdown-toggle">Hello, Sign in</button>
			    </a>
			    <div class="dropdown-content">
				   	<a class="sign-in" href="/signin">Sign in</a>
				    <div id="start-here-div">
			    		New Customer?<a id="start-here-link" href="/registration"> Start here.</a>
			    	</div>
			  	</div>
			</div>
		    
		    <li class="nav-item ml-3">
		    	<div class="cart-container" id="cart-link">
					<a href="/home"><img src="{{asset('images/logo/Cart.jpg')}}" id="cart-link-img"></a>
				  	<div class="centered">0</div>
				</div>
		    </li>
		</ul>
	</nav>

	<!--second navbar-->
	<nav class="navbar navbar-expand-sm navbar-second">
	  <!-- Links -->
	  	<ul class="navbar-nav">
		    <li class="nav-item">
		      <button class="openbtn" onclick="openNav()" data-bs-toggle="offcanvas">☰ All</button> 
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
     
	@yield('index')

	<!--footer-->
	@yield('footer')
    <footer>
    	<a class="ba" href="#top">
       		<div class="bot container-fluid">
         		<h4 class="less white">Back to top</h4>
          	</div>
       	</a>
    	
      	<div class="container-fluid">
        	<div class="container">
          		<div class="row">
	            	<div class="col-sm-3">
	              		<h4 class="white">Get to Know Us</h4>
		             	<div class="gap">
		               		<a class="grey foot" href="#">About Us</a>
		            	</div>
		              	<div class="gap">
		               		<a class="grey foot" href="#">Careers</a>
		            	</div>
		              	<div class="gap">
		                	<a class="grey foot" href="#">Press Release</a>
		              	</div>
		            	<div class="gap">
		               		<a class="grey foot" href="#">XYZ cares</a>
		              	</div>
		              	<div class="gap">
		               		<a class="grey foot" href="#">Gift a Smile</a>
		              	</div>
	            	</div>
	            	
	            	<div class="col-sm-3">
	              		<h4 class="white">Connect with Us</h4>
	              		<div class="gap">
		                	<a class="grey foot" href="#">Facebook</a>
		              	</div>
		              	<div class="gap">
		                	<a class="grey foot" href="#">Twitter</a>
		              	</div>
		              	<div class="gap">
		                	<a class="grey foot" href="#">Instagram</a>
		              	</div>
		            	</div>
		            
		            <div class="col-sm-3">
		              	<h4 class="white">Make Money with Us</h4>
		              	<div class="gap">
		                	<a class="grey foot" href="#">Sell on XYZ</a>
		              	</div>
		              	<div class="gap">
		                	<a class="grey foot" href="#">Become an Affiliate</a>
		              	</div>
		              	<div class="gap">
		                	<a class="grey foot" href="#">Fulfilment by XYZ</a>
		              	</div>
	              		<div class="gap">
	                		<a class="grey foot" href="#">Advertise Your Products</a>
	              		</div>
	              		<div class="gap">
	                	<a class="grey foot" href="#">XYZ Pay on Merchants</a>
	              		</div>
	            	</div>

		            <div class="col-sm-3">
		              	<h4 class="white">Let Us Help You</h4>
		              	<div class="gap">
		                	<a class="grey foot" href="#">Your Account</a>
		              	</div>
			            <div class="gap">
			                <a class="grey foot" href="#">Returns Centre</a>
			            </div>
			            <div class="gap">
			                <a class="grey foot" href="#">100% Purchase Protection</a>
			            </div>
			            <div class="gap">
			                <a class="grey foot" href="#">XYZ Assisstant</a>
			            </div>
			            <div class="gap">
			                <a class="grey foot" href="#">Help</a>
			            </div>
		            </div>
          		</div>
          		
          		<div class="footer-license-div">
          			<small>
	            		easyBuy © 2021-2021 All Rights Reserved. 
	          		</small>
	        	</div>
	        </div>
        </div>
    </footer>
	</div>
</body>
</html>