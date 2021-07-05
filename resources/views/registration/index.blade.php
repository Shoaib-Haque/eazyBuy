<!DOCTYPE html>
<html>
  <head>
	  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="shortcut icon" href="{{asset('images/logo/eazyBuyLogo.ico')}}" type="image/png">

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/registration/style.css')}}" >

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"          ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"    ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"    ></script>
  </head>
<body>
  <div class="container">
    <div class="row">
      <div class="panel panel-primary">
        <a href="/home"><img id="home-link-img" src="{{asset('images/logo/eazyBuyLogo.ico')}}"></a>

        <div class="panel-body">
          <form method="POST" role="form" id="form">
            {{ csrf_field() }}
            <div class="form-group">
              <h4>Create account</h4>
            </div>
            <div class="form-group">
              <label class="control-label" for="name"><strong>Your name</strong></label>
              <input id="name" type="text" name="name" maxlength="100" class="form-control" value="{{ old('name') }}">
              <font color="red">
                <span id="nameLabel">
                  @if ($errors->has('name'))
                    {{ $errors->first('name') }}
                  @endif
                </span>
              </font>
            </div>
            <div class="form-group">
              <label class="control-label" for="email"><strong>Email</strong></label>
              <input id="email" type="email" name="email" maxlength="50" class="form-control" value="{{ old('email') }}">
              <font color="red">
                <span id="emailLabel">
                  @if ($errors->has('email'))
                    {{ $errors->first('email') }}
                  @endif
                </span>
              </font>
            </div>
            <div class="form-group">
              <label class="control-label" for="password"><strong>Password</strong></label>
              <input id="password" type="password" name="password" maxlength="20" value="{{ old('password') }}" 
              class="form-control" placeholder="at least 6 characters">
              <font color="red">
                <span id="passwordLabel">
                  @if ($errors->has('password'))
                    {{ $errors->first('password') }}
                  @endif
                </span>
              </font>
            </div>
            <div class="form-group">
              <label class="control-label" for="repassword"><strong>Re-enter password</strong></label>
              <input id="repassword" type="password" name="password_confirmation" maxlength="20" class="form-control" 
              value="{{ old('password_confirmation') }}">
              <font color="red">
                <span id="repasswordLabel">
                  @if ($errors->has('password_confirmation'))
                    {{ $errors->first('password_confirmation') }}
                  @endif
                </span>
              </font>
            </div>
            <div class="form-group">
              <button id="signupSubmit" type="button" class="sub btn btn-default" onclick="return validation();">
                Create your easyBuy account
              </button>
            </div>
            <p class="form-group">By creating an account, you agree to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.</p>
            <hr>
            <p></p>Already have an account? <a href="/signin">Sign-in</a></p>
          </form>
        </div>
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

  <script type="text/javascript" src="{{ asset('js/registration/validation.js') }}"></script>
</body>
</html>