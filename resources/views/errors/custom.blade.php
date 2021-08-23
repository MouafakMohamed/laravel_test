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
        <div class="mt-5 iq-maintenance">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-sm-12 text-center">
                        <div class="iq-maintenance">
                            <img src="{{ url('assets/') }}/images/error/02.png" class="img-fluid" alt="">
                            <h3 class="mt-4 mb-1">vous n'êtes pas autorisé à accéder directement à cette page</h3>
                            <p>Please check back in sometime.</p>
                            <a href="{{url('user/Dashboard')}}" class="btn btn-primary">back</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="container mt-3">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="iq-card text-center mb-0">
                            <div class="iq-card-body">
                                <i class="ri-window-line ri-4x line-height text-primary"></i>
                                <h5 class="card-title mt-1">Why is the Site Down?</h5>
                                <p class="mb-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="iq-card text-center mb-0">
                            <div class="iq-card-body">
                                <i class="ri-time-line ri-4x line-height text-primary"></i>
                                <h5 class="card-title mt-1">What is the Downtime?</h5>
                                <p class="mb-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="iq-card text-center mb-0">
                            <div class="iq-card-body">
                                <i class="ri-information-line ri-4x line-height text-primary"></i>
                                <h5 class="card-title mt-1">Do you need Support?</h5>
                                <p class="mb-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

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