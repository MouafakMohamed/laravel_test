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
	<link href="{{ url('/') }}/assets_parent/https://fonts.googleapis.com/css?family=Dosis:400,500,600,700" rel="stylesheet">
	<link href="{{ url('/') }}/assets_parent/https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
	
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
	<div class="wrapper" id="wrapper">
 
	 
		 
		<!-- Start Our Gallery Area -->
		<section class="junior__gallery__area gallery__masonry__activation gallery--3 bg--white section-padding--md">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-sm-12 col-md-12">
						<div class="section__title text-center">
						<h2 class="title__line" style="font-size:100px"><a href="{{url('Student/Dashboard')}}" style="color:#d62083"><i class="fa fa-home"></i></a></h2>
							<h2 class="title__line">Mes photos</</h2>
							 
						</div>
					</div>
				</div>
				<div class="row galler__wrap masonry__wrap mt--40">
                    <!-- Start Single Gallery -->
                    @foreach ($images as $image)
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 gallery__item wow fadeInUp" data-wow-delay="0.3s">
                            <div class="gallery">
                                <div class="gallery__thumb">
                                        <img src="{{ url('/'.$image->image) }}" alt="COLIBRI">
                                </div>
                                <div class="gallery__hover__inner">
                                    <div class="gallery__hover__action">
                                        <ul class="gallery__zoom">
                                            <li><a href="{{ url('/'.$image->image) }}" data-lightbox="grportimg" data-title="COLIBRI"><i class="fa fa-search"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>	
                        </div>	
                    @endforeach
				</div>
					
			</div>
		</section><br><br>
		<!-- End Our Gallery Area -->
					 <footer id="footer" class="footer-area">
			<div class="footer__wrapper poss-relative ftr__btm__image section-padding--lg bg--white">
				 
			</div>
	 
			 
		</footer>
	<!-- JS Files -->
	<script src="{{ url('/') }}/assets_parent/js/vendor/jquery-3.2.1.min.js"></script>
	<script src="{{ url('/') }}/assets_parent/js/popper.min.js"></script>
	<script src="{{ url('/') }}/assets_parent/js/bootstrap.min.js"></script>
	<script src="{{ url('/') }}/assets_parent/js/plugins.js"></script>
	<script src="{{ url('/') }}/assets_parent/js/active.js"></script>
</body>
</html>