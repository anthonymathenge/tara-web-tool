<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Include Bootstrap CSS from CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <!-- Include your custom styles.css file -->
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">

  <!-- Include Unicons CSS from CDN -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
</head>
<body>
<div id="stars"></div>
<div id="stars2"></div>
<div id="stars3"></div>
<div class="section">
  <div class="container">
    <div class="row full-height justify-content-center">
      <div class="col-12 text-center align-self-center py-5">
        <div class="section pb-5 pt-5 pt-sm-2 text-center">
          <h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
          <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
          <label for="reg-log"></label>
          <div class="card-3d-wrap mx-auto">
            <div class="card-3d-wrapper">
              <div class="card-front">
                <div class="center-wrap">
                  <div class="section text-center">
                    <h4 class="mb-4 pb-3">Log In</h4>
                    <form method="POST" action="{{ route('login') }}">
                      @csrf
                      <div class="form-group">
                        <input type="email" class="form-style" placeholder="Email" name="email" required>
                        <i class="input-icon uil uil-at"></i>
                      </div>	
                      <div class="form-group mt-2">
                        <input type="password" class="form-style" placeholder="Password" name="password" required>
                        <i class="input-icon uil uil-lock-alt"></i>
                      </div>
                      <button type="submit" class="btn mt-4">Login</button>
                    </form>
                    <p class="mb-0 mt-4 text-center"><a href="{{ route('password.request') }}" class="link">Forgot your password?</a></p>
                  </div>
                </div>
              </div>
              <div class="card-back">
                <div class="center-wrap">
                  <div class="section text-center">
                    <h4 class="mb-3 pb-3">Sign Up</h4>
                    <!-- Your registration form can be added here -->
                    <!-- Your registration form can be added here -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <input type="text" class="form-style" placeholder="Name" name="name" value="{{ old('name') }}" required>
                            <i class="input-icon uil uil-user"></i>
                        </div>

                        <div class="form-group mt-2">
                            <input type="email" class="form-style" placeholder="Email" name="email" value="{{ old('email') }}" required>
                            <i class="input-icon uil uil-at"></i>
                        </div>

                        <div class="form-group mt-2">
                            <input type="password" class="form-style" placeholder="Password" name="password" required>
                            <i class="input-icon uil uil-lock-alt"></i>
                        </div>

                        <div class="form-group mt-2">
                            <input type="password" class="form-style" placeholder="Confirm Password" name="password_confirmation" required>
                            <i class="input-icon uil uil-lock-alt"></i>
                        </div>

                        <button type="submit" class="btn mt-4">Sign Up</button>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Include Bootstrap JS from CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>

