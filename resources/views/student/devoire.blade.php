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

<body style="background-color:#f6f6f6">



	<div class="wrapper" id="wrapper"><br>

		<!-- Header -->

		<div class="row">

			<div class="col-lg-12 col-sm-12 col-md-12">

				<div class="section__title text-center">

					<h2 class="title__line" style="font-size:100px"><a href="{{url('Student/Dashboard')}}" style="color:#89d700"><i class="fa fa-home"></i></a></h2>

					<h2 class="title__line"> Les Devoirs</h2>



				</div>

			</div>

		</div>

		<!-- Start Subscribe Area -->

		<section class="dcare__testimonial__area subscribe__style--5" style="margin-top:30px">

			<div class="container-fluid">

				<div class="row">

					<div class="col-lg-3 col-md-12 col-sm-12"></div>

					<div class="col-lg-6 col-md-12 col-sm-12">

                        @if (count($devoires) != 0)

							<div class="testimonial--4" style="background-color:#0095e8">

								<div class="testimonial__slide--4 owl-carousel">
                                    @foreach ($devoires as $key)
                                            
                                            <div class="testimonial__inner">

                                                <div class="clint__img">
                                                    <img src="{{ url('/'.$key->prof['image']) }}" style="height: 100px" alt="clint images">
                                                </div>

                                                <div class="clint__info">

                                                    <h6><?php echo $key->date1; ?> =========> <?php echo $key->date2; ?></h6>

                                                    <p><?php echo $key->desc; ?></p>

                                                    <?php if ($key->image != '') { ?>

                                                        <h2><span><a href="{{url('/admin/download/devoire/file/'.$key->id) }}" style="color:#fff">Télécharger le document</a></span></h2>

                                                    <?php } ?>
                                                </div>

                                            </div>

                                    @endforeach

								</div>

							</div>

                        @endif

					</div>

				</div>

			</div>

		</section>



		<!-- JS Files -->

		<script src="{{ url('/') }}/assets_parent/js/vendor/jquery-3.2.1.min.js"></script>

		<script src="{{ url('/') }}/assets_parent/js/popper.min.js"></script>

		<script src="{{ url('/') }}/assets_parent/js/bootstrap.min.js"></script>

		<script src="{{ url('/') }}/assets_parent/js/plugins.js"></script>

		<script src="{{ url('/') }}/assets_parent/js/active.js"></script>

		<script type="text/javascript">
			function salam() {

				alert('salam')

				/*var class1 = $('#liste').val();

                 $.ajax({

                              url:"ajax_get_student",

                              method:"POST",

                              data:{class1:class1},

                              success:function(data){

                             $('#row1').html(data);

                                                    }

                            })

            }

            function searsh2() {

                var data = $('#browsers').val();

                alert(data)

            }*/
		</script>

</body>

</html>