<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>RAZANA SCHOOL || votre partenaire pour la réussite scolaire de votre enfant</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicons -->
	<link rel="shortcut icon" href="{{ url('/') }}/assets_parent/images/favicon.ico">
	<link rel="apple-touch-icon" href="{{ url('/') }}/assets_parent/images/icon.png">
	<!-- Google font (font-family: 'Dosis', Roboto;) -->
	<link href="https://fonts.googleapis.com/css?family=Dosis:400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ url('/') }}/assets_parent/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ url('/') }}/assets_parent/css/plugins.css">
	<link rel="stylesheet" href="{{ url('/') }}/assets_parent/style.css">

	<!-- Cusom css -->
   <link rel="stylesheet" href="{{ url('/') }}/assets_parent/css/custom.css">

	<!-- Modernizer js -->
	<script src="{{ url('/') }}/assets_parent/js/vendor/modernizr-3.5.0.min.js"></script>
</head>
<body>
 
	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		
 
		<!-- Start Team Area -->
		<section class="dcare__team__area section-padding--lg bg--white">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-sm-12 col-md-12">
						<div class="section__title text-center">
                        <h2 class="title__line" style="font-size:100px"><a href="{{url('Student/Dashboard')}}" style="color:#fd7e14"><i class="fa fa-home"></i></a></h2>
							<h2 class="title__line"> Mes professeurs</h2>
						</div>
					</div>
				</div>
				<div class="row mt--40">
					<!-- Start Single Team -->
					@foreach ($profs as $prof)
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="team__style--3" style="height: 500px">
                                <div class="team__thumb">
                                    <img src="{{ url('/'.$prof->prof->image) }}" alt="">
                                </div>
                                <div class="team__hover__action">
                                    <center>
                                        <div class="team__details" >
                                            <div class="team__info">
                                                <h6><a href="#">{{$prof->prof->nom .' '.$prof->prof->pre}}</a></h6>
                                                <span>{{$prof->prof->nom1 .' '.$prof->prof->pre1}}</span>
                                            </div><br><br><br>
                                            <ul class="dacre__social__link--2 d-flex justify-content-center">
                                                <li class=""></li>
                                                <li class="facebook"><a href="{{$prof->prof->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                                <li class="twitter"><a href="{{$prof->prof->twitter}}"><i class="fa fa-twitter"></i></a></li>
                                                <li class="vimeo"><a href="{{$prof->prof->insta}}"><i class="fa fa-instagram"></i></a></li>
                                                <li class="pinterest"><a href="{{$prof->prof->youtube}}"><i class="fa fa-youtube"></i></a></li>
                                            </ul>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    @endforeach
					<!-- End Single Team -->
				</div>
			</div>
		</section>
	  
	  <footer id="footer" class="footer-area">
			<div class="footer__wrapper poss-relative ftr__btm__image section-padding--lg bg--white">
				 
			</div>
	 
			 
		</footer>
	</div><!-- //Main wrapper -->

	<!-- JS Files -->
	<script src="{{ url('/') }}/assets_parent/js/vendor/jquery-3.2.1.min.js"></script>
	<script src="{{ url('/') }}/assets_parent/js/popper.min.js"></script>
	<script src="{{ url('/') }}/assets_parent/js/bootstrap.min.js"></script>
	<script src="{{ url('/') }}/assets_parent/js/plugins.js"></script>
	<script src="{{ url('/') }}/assets_parent/js/active.js"></script>
</body>
</html>