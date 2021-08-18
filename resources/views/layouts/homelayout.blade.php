<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	  	<title></title>
	  	<link rel="shortcut icon" href="{{asset('images/logo/eazyBuyLogo.ico')}}" type="image/png">

	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
	  	<link rel="stylesheet" type="text/css" href="{{asset('css/home/firstNav.css')}}">
	  	<link rel="stylesheet" type="text/css" href="{{asset('css/home/secondNav.css')}}">
	  	<link rel="stylesheet" type="text/css" href="{{asset('css/home/footer.css')}}">
	  	<link rel="stylesheet" type="text/css" href="{{asset('css/home/sideNav.css')}}">

	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"          ></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" ></script>
	    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"    ></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"              ></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"    ></script>
	</head>

	<body>
		@yield('header')
		<div class="disable">
			<nav class="navbar-first">
			  	<ul>
				    <li>
				    	<div class="flex">
					    	<a href="/home"><img src="{{asset('images/logo/eazyBuyLogo.ico')}}" alt=""></a>
					  	</div>
					</li>

				    <li>
				    	<a href="#">
				    		<div class="flex">	
						        <div class="white">
						       		<i class="fa fa-map-marker" aria-hidden="true"></i>
						       	</div>
						       	<div>
						       		<span class="grey smaller">Deliver to</span>
						      		<span class="white"><b>Bangladesh</b></span>
						        </div>
					    	</div>
						</a>
				    </li>

				    <li>
				    	<div class="input-group flex">
						    <div class="input-group-prepend">
								<div class="dropdown">
									<button class="btn btn-outline-light dropdown-toggle shadow-none" type="button" id="dropdownDepartment"
								        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								    	All
								    	<span class="caret"></span>
								  	</button>
								  	<div class="dropdown-menu" name="selectDepartment" aria-labelledby="dropdownMenu">
									    <a id="Mens" onclick="selectDepartment(this);">Mens</a>
									    <a id="Women" onclick="selectDepartment(this);">Women</a>
									    <a id="Tools & Home Improvement" onclick="selectDepartment(this);">
									    	Tools & Home Improvement
										</a>
								  	</div>
								</div>
						    </div>
						    <input type="text" class="form-control">
							<div class="input-group-append">
				            	<button type="button" class="sub btn btn-default">
				             		<i class="fa fa-search"></i>
				           		</button>				   	
							</div>
					    </div>
				    </li>

				    <li>
				    	<div class="flex">
					    	<a href="/signin">
						    	<div class="dropdown">
									<button class="dropbtn">
									   	<div class="smaller">Hello, Sign in</div>
									   	<span><b>Accounts & Lists</b></span>
									</button>
									<div class="dropdown-content dropdown-menu-right">
										<a class="sign-in" href="/signin">Sign in</a>
										<div id="start-here-div">
									    	<span> New Customer?</span>
									    	<span><a href="/registration"> Start here.</a></span>
									   	</div>
									</div>
								</div>
							</a>
						</div>
				    </li>

				    <li>
				    	<div class="flex">
						    <div class="returns-orders">
						    	<a href="#">
								    <div class="white smaller">Returns</div>
								    <div class="white"><b>& Orders</b></div>	
								</a>
							</div>
						</div>
				    </li>

				    <li>
				    	<div class="flex">
							<a href="#"><img src="{{asset('images/logo/Cart.jpg')}}" alt=""></a>
						</div>
				    </li>
			  	</ul>
			</nav>

			<nav class="navbar-second">
			  	<ul>
			  		<li>
				    	<button class="openbtn" onclick="openNav()" data-bs-toggle="offcanvas">
				    		<i class="fas fa-bars"></i> All
				   		</button> 
				    </li>
				   	<li>
				   		<a class="" href="#">Today's Deals</a>
				    </li>
				    <li>
				        <a class="" href="#">Customer Service</a>
				    </li>
				    <li>
				        <a class="" href="#">Gift Card</a>
				    </li>
				</ul>
			</nav>
		</div>

		@yield('sidebar')
		<!--sidenav-->
		<div id="sidebar" class="sidebar">
		  <div class="mySidebar-hello">
		  	<a href="/signin" class="sidebar-signin">Hello, Sign in</a>
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav(document.getElementById('sidebar').id)">×</a>
		  </div>
		  <h5>Shop By Department</h5>
		  <button class="menu-btn" onclick="openDepartment()">
		  	<a class="dropdown-item" href="javascript:void(0)">About<i class="fas fa-arrow-right fa-xs"></i></a>
		  </button>
		  <button class="menu-btn" onclick="openContact()">
		  	<a class="dropdown-item" href="javascript:void(0)">Contact<i class="fas fa-arrow-right fa-xs"></i></a>
		  </button>
		  <a class="dropdown-item" href="#">Services</a>
		  <a class="dropdown-item" href="#">Clients</a>
		  <a class="dropdown-item" href="#">About</a>
		  <a class="dropdown-item" href="#">Services</a>
		  <a class="dropdown-item" href="#">Clients</a>
		  <a class="dropdown-item" href="#">Contact</a>
		  <hr>
		  <h5>Help & Settings</h5>
		  <a class="dropdown-item" href="#">About</a>
		  <a class="dropdown-item" href="#">Services</a>
		  <a class="dropdown-item" href="#">Clients</a>
		  <a class="dropdown-item" href="#">Contact</a>
		</div>

		<div id="department" class="sidebar">
		  <div class="mySidebar-hello">
		  	<a href="/signin" class="sidebar-signin">Hello, Sign in</a>
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
		  	<a href="/signin" class="sidebar-signin">Hello, Sign in</a>
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav(document.getElementById('contact').id)">×</a>
		  </div>
		  <button class="main-menu-btn" onclick="openNav(document.getElementById('contact').id)">
		    <a class="dropdown-item" href="javascript:void(0)"><i class="fas fa-arrow-left fa-xs"></i>Main Menu</a>
		  </button>
		  <a class="dropdown-item" href="/customerhome">Clients</a>
		  <a class="dropdown-item" href="#">Contact</a>
		  <a class="dropdown-item" href="#">About</a>
		</div> 

		<div class="disable">
	     
		@yield('index')

		<!--footer-->
		@yield('footer')

	    <footer>
	    	<a href="#top">
	      		<div class="bot">
	          		<h6 class="less white">Back to top</h6>
	      		</div>
	      	</a>
	      	
	      	<div class="container-fluid">
	        	<div class="container">
	          		<div class="row">
		            	<div class="col">
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
		            	
		            	<div class="col">
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
			            
			            <div class="col">
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

			            <div class="col">
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
	          	</div>
	        </div>
	        <hr/>
	        <div class="container-fluid">
	          	<div class="footer-license-div">
	          		<small>
		           		easyBuy © 2021-2021 All Rights Reserved. 
		        	</small>
		        </div>
		    </div>
	    </footer>
		</div>

		<script type="text/javascript" src="{{ asset('js/home/layout/sideNav.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/home/layout/search.js') }}"></script>
	</body>
</html>