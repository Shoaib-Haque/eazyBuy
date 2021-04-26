<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  	<link rel="shortcut icon" href="{{asset('images/logo/eazyBuyLogo.ico')}}" type="image/png">
  	<link rel="stylesheet" type="text/css" href="{{asset('css/HomeStyle.css')}}" >
  	<style>
	</style>
</head>
<body>
	@yield('header')
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<ul class="navbar-nav">
		    <li class="nav-item active">
		        <a href="/home"><img id="home-link-img" src="{{asset('images/logo/eazyBuyLogo.ico')}}"></a>
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
				    	<button type="submit" id="search-btn">
				    		<img id="search-icon" src="{{asset('images/logo/search-icon.png')}}">
				    	</button>
				  	</div>
				</div>
		    </div>

		    <div class="dropdown ml-3">
			    <button class="dropbtn btn-dark">Hello, Sign in</button>
			    <div class="dropdown-content">
				   	<a class="sign-in" href="/signin" style="color: black">Log in</a>
				    <div id="start-here-div">
			    		New Customer?<a id="start-here-link" href="#">Start here.</a>
			    	</div>
			  	</div>
			</div>
		    

		    <li class="nav-item ml-3">
		    	<div class="container" id="cart-link">
					<a href="/home"><img src="{{asset('images/logo/Cart.jpg')}}" id="cart-link-img"></a>
				  	<div class="centered">0</div>
				</div>
		    </li>
		</ul>
	</nav>
     
	@yield('index')
</body>
</html>