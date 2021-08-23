<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Colibri | System Management School</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ url('assets/') }}/title.png" />
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ url('assets/') }}/css/bootstrap.min.css">
        <!-- Typography CSS -->
        <link rel="stylesheet" href="{{ url('assets/') }}/css/typography.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ url('assets/') }}/css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{ url('assets/') }}/css/responsive.css">
    </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
        <!-- Wrapper Start -->
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-sm-12 text-center">
                        <div class="iq-error">
                          <h1 class="text-primary">404</h1>
                            <!-- <img src="images/error/01.png" class="img-fluid iq-error-img" alt=""> -->
                            <h2 class="mb-0">Oops! This Page is Not Found.</h2>
                            <p>The requested page dose not exist.</p>
                            {{-- <p>{{ $exception->getMessage() }}</p> --}}
                            {{-- <a class="btn btn-primary mt-3" href="index.html"><i class="ri-home-4-line"></i>Back to Home</a>                             --}}
                        </div>
                    </div>
                </div>
            </div>
        <!-- Wrapper END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="{{ url('assets/') }}/js/jquery.min.js"></script>
      <script src="{{ url('assets/') }}/js/popper.min.js"></script>
      <script src="{{ url('assets/') }}/js/bootstrap.min.js"></script>
      <!-- Appear JavaScript -->
      <script src="{{ url('assets/') }}/js/jquery.appear.js"></script>
      <!-- Countdown JavaScript -->
      <script src="{{ url('assets/') }}/js/countdown.min.js"></script>
      <!-- Counterup JavaScript -->
      <script src="{{ url('assets/') }}/js/waypoints.min.js"></script>
      <script src="{{ url('assets/') }}/js/jquery.counterup.min.js"></script>
      <!-- Wow JavaScript -->
      <script src="{{ url('assets/') }}/js/wow.min.js"></script>
      <!-- Apexcharts JavaScript -->
      <script src="{{ url('assets/') }}/js/apexcharts.js"></script>
      <!-- Slick JavaScript -->
      <script src="{{ url('assets/') }}/js/slick.min.js"></script>
      <!-- Select2 JavaScript -->
      <script src="{{ url('assets/') }}/js/select2.min.js"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="{{ url('assets/') }}/js/owl.carousel.min.js"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="{{ url('assets/') }}/js/jquery.magnific-popup.min.js"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="{{ url('assets/') }}/js/smooth-scrollbar.js"></script>
      <!-- lottie JavaScript -->
      <script src="{{ url('assets/') }}/js/lottie.js"></script>
      <!-- Chart Custom JavaScript -->
      <script src="{{ url('assets/') }}/js/chart-custom.js"></script>
      <!-- Custom JavaScript -->
      <script src="{{ url('assets/') }}/js/custom.js"></script>
   </body>
</html>