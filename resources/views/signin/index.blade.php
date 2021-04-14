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
  	<link rel="stylesheet" type="text/css" href="{{asset('css/SigninStyle.css')}}" >
  	<style>
	</style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="panel panel-primary">
        <a href="/home"><img id="home-link-img" src="{{asset('images/logo/eazyBuyLogo.ico')}}"></a>
        <div class="panel-body">
          <form method="POST" action="#" role="form">
            <div class="form-group">
              <h2>Sign-In</h2>
            </div>
            <div class="form-group">
              <h6>Email or mobile phone number</h6>
              <input id="signinEmail" type="email" maxlength="50" class="form-control">
            </div>
            <div class="form-group">
              <strong>Password</strong>
              <span class="right"><a href="#">Forgot your password?</a></span>
              <input id="signinPassword" type="password" maxlength="25" class="form-control">
            </div>
            <div class="form-group">
              <button id="signinSubmit" type="submit" class="btn btn-success btn-block">Sign in</button>
            </div>
            <p class="form-group">By signing in you are agreeing to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.</p>
          </form>
        </div>
        <div class="form-group divider">
            <hr class="left"><small>New to eazyBuy?</small><hr class="right">
        </div>
        <p class="form-group"><a href="#" class="btn btn-light btn-block">Create your eazyBuy account</a></p>
      </div>
    </div>
  </div>
</body>