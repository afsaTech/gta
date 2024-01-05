<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="../assets/images/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('gta/vendors/bootstrap/css/bootstrap.min.css')}}" media="all">
    <!-- Fonts Awesome CSS -->
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('gta/css/all.css')}}"> --}}
    <!-- google fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&amp;family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&amp;display=swap"
        rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('gta/css/admin-style.css')}}">
    <!-- Font awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css">
    <title>{{str_replace("_"," ",config('app.name', 'Go Tanzania Adventure'))}}</title>
</head>
<body>
<div class="login-page" style="background-image: url(assets/images/bg.jpg);">
  <div class="login-from-wrap">
      <form class="login-from" method="POST" action="{{route('authenticate')}}">
        @csrf
          <h1 class="site-title">
              <a href="#">
                  <img src="assets/images/logo.png" alt="">
              </a>
          </h1>
          <div class="form-group">
              <label for="email">User Name</label>
              <input name="email" class="form-control @error('email') is-invalid @enderror" type="text" class="validate" {{old('email')}}>
          </div>
          <div class="form-group">
              <label for="password">Password</label>
              <input name="password" class="form-control @error('password') is-invalid @enderror" type="password" class="validate">
          </div>
          <div class="form-group">
              <button type="submit" class="btb button-primary">Login</a>
          </div>
          <a href="forgot.html" class="for-pass">Forgot Password?</a>
      </form>
  </div>
</div>
</body>
</html>
