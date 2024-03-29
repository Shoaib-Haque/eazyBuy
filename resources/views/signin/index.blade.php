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
    <link rel="stylesheet" type="text/css" href="{{asset('css/signin/style.css')}}" >

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"          ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"    ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"    ></script>
  </head>

<body>
  <div class="container">
    <div class="row">
      <div class="panel panel-primary">
        <a href="/home">
          <img id="home-link-img" src="{{asset('images/logo/eazyBuyLogo.ico')}}">
        </a>

        <div class="panel-body">
          <form method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <h4>Sign-In</h4>
            </div>
            <div class="form-group">
              <font color="red"><strong><span>{{session('msg')}}</span></strong></font>
            </div>
            <div class="form-group">
              <strong>Email or mobile phone number</strong>
              <input id="signinEmail" name="email" type="email" maxlength="50" class="form-control">
            </div>
            <div class="form-group">
              <strong>Password</strong>
              <span class="right"><a href="#">Forgot your password?</a></span>
              <input id="signinPassword" name="password" type="password" maxlength="25" class="form-control">
            </div>
            <div class="form-group">
              <button id="" type="submit" class="sub btn btn-default">Sign in</button>
            </div>
            <p class="form-group">By signing in you are agreeing to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.</p>
          </form>
        </div>
        
        <div class="form-group divider">
            <hr class="left"><small>New to eazyBuy?</small><hr class="right">
        </div>
        <p class="form-group">
          <button class="registration-button">
            <a href="/registration">Create your eazyBuy account</a>
          </button>
        </p>

      </div>
    </div>
  </div>

  <footer class="mt-5">
    <hr>
    <div class="footer-div mb-2">
      <small>
        <a>easyBuy</a> © 2021-2021 All Rights Reserved. 
      </small>
    </div>
  </footer>
</body>