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
    <script src="{{ asset('js/registrationValidation.js') }}"></script>
  	<link rel="shortcut icon" href="{{asset('images/logo/eazyBuyLogo.ico')}}" type="image/png">
  	<link rel="stylesheet" type="text/css" href="{{asset('css/RegistrationStyle.css')}}" >
  	<style>
	</style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="panel panel-primary">
        <div class="panel-body">
          <form method="POST" role="form">
            {{ csrf_field() }}
            <div class="form-group">
              <h2>Create account</h2>
            </div>
            <div class="form-group">
              <label class="control-label" for="name">Your name</label>
              <input id="name" type="text" name="name" maxlength="100" class="form-control" value="{{ old('name') }}">
              <font color="red">
                <span id="nameLabel"></span>
                @if ($errors->has('name'))
                  {{ $errors->first('name') }}
                @endif
              </font>
            </div>
            <div class="form-group">
              <label class="control-label" for="email">Email</label>
              <input id="email" type="email" name="email" maxlength="50" class="form-control" value="{{ old('email') }}">
              <font color="red">
                <span id="emailLabel"></span>
                @if ($errors->has('email'))
                  {{ $errors->first('email') }}
                @endif
              </font>
            </div>
            <div class="form-group">
              <label class="control-label" for="password">Password</label>
              <input id="password" type="password" name="password" maxlength="20" value="{{ old('password') }}" 
              class="form-control" placeholder="at least 6 characters">
              <font color="red">
                <span id="passwordLabel"></span>
                @if ($errors->has('password'))
                  {{ $errors->first('password') }}
                @endif
              </font>
            </div>
            <div class="form-group">
              <label class="control-label" for="repassword">Re-enter password</label>
              <input id="repassword" type="password" name="password_confirmation" maxlength="20" class="form-control" 
              value="{{ old('password_confirmation') }}">
              <font color="red">
                <span id="repasswordLabel"></span>
                @if ($errors->has('password_confirmation'))
                  {{ $errors->first('password_confirmation') }}
                @endif
              </font>
            </div>
            <div class="form-group">
              <button id="signupSubmit" type="submit"  class="btn btn-info btn-block">Create your account</button>
            </div>
            <p class="form-group">By creating an account, you agree to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.</p>
            <hr>
            <p></p>Already have an account? <a href="#">Sign-in</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>