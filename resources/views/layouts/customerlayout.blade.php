<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	  	<title></title>
	  	<link rel="shortcut icon" type="image/png" href="{{asset('images/logo/eazyBuyLogo.ico')}}">

	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
	  	<link rel="stylesheet" type="text/css" href="{{asset('css/customer/layoutFirstNav.css')}}">
	  	<link rel="stylesheet" type="text/css" href="{{asset('css/customer/layoutSecondNav.css')}}">
	  	<link rel="stylesheet" type="text/css" href="{{asset('css/customer/layoutFooter.css')}}">
	  	<link rel="stylesheet" type="text/css" href="{{asset('css/customer/layoutSideNav.css')}}" >

	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"          ></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" ></script>
	    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"    ></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"    ></script>
	</head>
	<body>
		@yield('sidebar')
		<!--sidenav-->
		<div id="sidebar" class="sidebar">
		  <div class="mySidebar-hello">
		  	Hello, {{session('customername')}}
		  	<a href="javascript:void(0)" class="closebtn" onclick="closeNav(document.getElementById('sidebar').id)">×</a>
		  </div>
		  <h5>Shop By Department</h5>
		  <button class="menu-btn" id="aboutBtn" onclick="openDepartment()">
		  	<a class="dropdown-item" href="javascript:void(0)">About<i class="fas fa-arrow-right fa-xs"></i></a>
		  </button>
		  <button class="menu-btn" id="aboutBtn" onclick="openContact()">
		  	<a class="dropdown-item" href="javascript:void(0)">Contact<i class="fas fa-arrow-right fa-xs"></i></a>
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

		<div id="department" class="sidebar">
		  <div class="mySidebar-hello">
		  	Hello, {{session('customername')}}
		  	<a href="javascript:void(0)" class="closebtn" onclick="closeNav(document.getElementById('department').id)">×</a>
		  </div>
		  <button class="main-menu-btn" onclick="openNav(document.getElementById('department').id)">
		    <a class="dropdown-item" href="javascript:void(0)"><i class="fas fa-arrow-left fa-xs"></i>Main Menu</a>
		  </button>
		  <a class="dropdown-item" href="/customerhome">Clients</a>
		  <a class="dropdown-item" href="#">Contact</a>
		  <a class="dropdown-item" href="#">About</a>
		  <a class="dropdown-item" href="#">Services</a>
		</div>

		<div id="contact" class="sidebar">
		  <div class="mySidebar-hello">
		  	Hello, {{session('customername')}}
		  	<a href="javascript:void(0)" class="closebtn" onclick="closeNav(document.getElementById('contact').id)">×</a>
		  </div>
		  <button class="main-menu-btn" onclick="openNav(document.getElementById('contact').id)">
		    <a class="dropdown-item" href="javascript:void(0)"><i class="fas fa-arrow-left fa-xs"></i>Main Menu</a>
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

				    <li class="hidden-xs deli ml-5 mr-5">
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

				    <div class="dropdown dropdown-hello ml-3">
					    <button class="dropbtn btn-dark dropdown-toggle">Hello, {{session('customername')}}</button>
					    <div class="dropdown-content">
					    	<h6>Your Account</h6>
					    	<a href="#" class="dropdown-link">Account</a><br>
						   	<a href="/logout" class="dropdown-link">Sign out</a>
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
				      <button class="openbtn" onclick="openNav()"><i class="fas fa-bars"></i> All</button> 
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
		      	<div class="bot container-fluid">
		        	<a href="#top">
		          		<h4 class="less white">Back to top</h4>
		        	</a>
		      	</div>
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

		<script type="text/javascript" src="{{ asset('js/customer/layout/sideNav.js') }}"></script>
	</body>
</html>