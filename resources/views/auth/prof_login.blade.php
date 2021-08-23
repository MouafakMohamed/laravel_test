{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Colibri | System Management School</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ url('assets/') }}/title.png" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{ url('/assets/') }}/css/bootstrap.min.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{ url('/assets/') }}/css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{ url('/assets/') }}/css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{ url('/assets/') }}/css/responsive.css">
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
        <!-- Sign in Start -->
        <section class="sign-in-page">
            <div class="container sign-in-page-bg mt-5 p-0">
                <div class="row no-gutters">
                    <div class="col-md-6 text-center">
                        <div class="sign-in-detail text-white">
                            <a class="sign-in-logo mb-5" href="#"><img src="images/logo-white.png" class="img-fluid" alt="logo"></a>
                            <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                                <div class="item">
                                    <img src="{{ url('/assets/') }}/images/login/1.png" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Manage your orders</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                                <div class="item">
                                    <img src="{{ url('/assets/') }}/images/login/2.png" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Manage your orders</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                                <div class="item">
                                    <img src="{{ url('/assets/') }}/images/login/3.png" class="img-fluid mb-4" alt="logo">
                                    <h4 class="mb-1 text-white">Manage your orders</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 position-relative">
                        <div class="sign-in-from">
                            <h1 class="mb-0">Prof</h1>
                                <span class="dark-color d-inline-block line-height-2"><a href="{{ url('login')}}" style="font-size: 20px;padding-right: 20px">Admin</a></span>
                                <span class="dark-color d-inline-block line-height-2"><a href="{{ url('user/login')}}" style="font-size: 20px;">Emplayé</a></span>
                            <p>Enter your email address and password to access admin panel.</p>
                            <form method="POST" action="{{ url('prof/login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Adresse électronique</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror mb-0" id="exampleInputEmail1">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mot de passe</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror mb-0" id="exampleInputPassword1">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword15">Langue</label>
                                   <select name="langue" class="form-control" id="exampleInputPassword15" >
                                       <option value="francais">français</option>
                                       <option value="arabic">العربية</option>
                                   </select>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="d-inline-block w-100">
                                    <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary float-right">Sign in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Sign in END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="{{ url('/assets/') }}/js/jquery.min.js"></script>
      <script src="{{ url('/assets/') }}/js/popper.min.js"></script>
      <script src="{{ url('/assets/') }}/js/bootstrap.min.js"></script>
      <!-- Appear JavaScript -->
      <script src="{{ url('/assets/') }}/js/jquery.appear.js"></script>
      <!-- Countdown JavaScript -->
      <script src="{{ url('/assets/') }}/js/countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <script src="{{ url('/assets/') }}/js/waypoints.min.js"></script>
      <script src="{{ url('/assets/') }}/js/jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="{{ url('/assets/') }}/js/wow.min.js"></script>
      <!-- Apexcharts JavaScript -->
      <script src="{{ url('/assets/') }}/js/apexcharts.js"></script>
      <!-- Slick JavaScript -->
      <script src="{{ url('/assets/') }}/js/slick.min.js"></script>
      <!-- Select2 JavaScript -->
      <script src="{{ url('/assets/') }}/js/select2.min.js"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="{{ url('/assets/') }}/js/owl.carousel.min.js"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="{{ url('/assets/') }}/js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="{{ url('/assets/') }}/js/smooth-scrollbar.js"></script>
      <!-- Chart Custom JavaScript -->
      <script src="{{ url('/assets/') }}/js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
      <script src="{{ url('/assets/') }}/js/custom.js"></script>
   </body>
</html>
