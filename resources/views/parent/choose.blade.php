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
      <link rel="stylesheet" href="{{ url('assets/') }}/css/style1.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{ url('assets/') }}/css/responsive.css">

   </head>
    <body style="background-color: rgb(224, 233, 230)">
        <!-- loader Start -->
        <div id="loading">
            <div id="loading-center">
            </div>
        </div>
        <!-- loader END -->
        <!-- Wrapper Start -->
        <div class="container-fluid">
            <div class="col-sm-10 mx-auto ">
                <div class="row">
                    @foreach ($students as $student)
                        <div class="col-sm-3 mx-auto my-5" style="padding-top: 150px">
                            <div class="card iq-mb-3">
                                <img src="{{url('/'.$student->student->image)}}" style="height: 200px" class="card-img-top" alt="#">
                                    <div class="card-body mx-auto">
                                        <h2 class="card-title">{{$student->student->pre.' '.$student->student->nom}}</h2>
                                    </div>
                                <form class=" mx-auto my-2" action="{{url('Parent/Dashboard')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$student->student->id}}" name="id">
                                    <button class="btn btn-primary"> Choisir </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
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