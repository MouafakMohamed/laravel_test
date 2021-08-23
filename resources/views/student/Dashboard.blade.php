<!doctype html>

<html>

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

	<link type="text/css" rel="stylesheet" href="{{ url('/') }}/assets_parent/css/style.css"/>

<link type="text/css" rel="stylesheet" href="{{ url('/') }}/assets_parent/colors/metro/metro.css"/>

<link type="text/css" rel="stylesheet" href="{{ url('/') }}/assets_parent/css/swipebox.css"/>

	<!-- Stylesheets -->

	<link rel="stylesheet" href="{{ url('/') }}/assets_parent/css/bootstrap.min.css">

	<link rel="stylesheet" href="{{ url('/') }}/assets_parent/css/plugins.css">

	<link rel="stylesheet" href="{{ url('/') }}/assets_parent/style.css">

	<link href="{{ url('/') }}/assets_parent/css/responsive.css" rel="stylesheet" type="text/css" />



	<!-- Cusom css -->

   <link rel="stylesheet" href="{{ url('/') }}/assets_parent/css/custom.css">



	<!-- Modernizer js -->

	<script src="{{ url('/') }}/assets_parent/js/vendor/modernizr-3.5.0.min.js"></script>

</head>

<body style="background-image: url('images/bg/19.jpg');margin-top:10px ;" > 

	  	 <div id="wrapper">

		 	

		<!-- Start Choose Us Area -->

  <div id="content">

      <div class="sliderbg_menu">

  <div class="section__title">

					<h2 class="title__line" style="text-align:center;font-size:30px;margin-bottom:-0px;margin-top:-10px;color: red"> salam

							<h2 class="title__line" style="text-align:center;font-size:30px;color:#99da25; ">{{ Auth::guard('student')->user()->nom}} {{ Auth::guard('student')->user()->pre}}</h2>

						</div> 
        

        <nav id="menu">
			<center>

        <ul>

		    <li class="blue" style="height: 11em; width : 20em" ><a href="{{url('Student/Profs')}}" class="insidelink"><img src="{{ url('/') }}/assets_parent/images/icons/pencil.png" alt="" title="" /><span> Mes professeurs</span></a></li>

            <li class="pink"  style="height: 11em; width : 20em"><a href="{{url('Student/devoires')}}" class="insidelink"><img src="{{ url('/') }}/assets_parent/images/icons/docs.png" alt="" title="" /><span>Les Devoirs</span></a></li>

            <li class="red"  style="height: 11em; width : 20em"><a href="activites_class" class="insidelink"><img src="{{ url('/') }}/assets_parent/images/icons/tools.png" alt="" title="" /><span>Les activités</span></a></li>

            <li class="orange"  style="height: 11em; width : 20em"><a href="{{url('Student/photos')}}" class="insidelink"><img src="{{ url('/') }}/assets_parent/images/icons/photos.png" alt="" title="" /><span>Mes photos</span></a></li>

            <li class="purple"  style="height: 11em; width : 20em"><a href="{{url('Student/Horaire')}}" class="insidelink"><img src="{{ url('/') }}/assets_parent/images/icons/calendar.png" alt="" title="" /><span>Emploi du temps</span></a></li>

            <li class="yellow"  style="height: 11em; width : 20em"><a href="cours" class="insidelink"><img src="{{ url('/') }}/assets_parent/images/icons/light.png" alt="" title="" /><span>Les cours</span></a></li>

            <li class="blueg"  style="height: 11em; width : 20em"><a href="repas" class="insidelink"><img src="{{ url('/') }}/assets_parent/images/icons/top.png" alt="" title="" /><span>Le repas du jour</span></a></li>

			<li class="red1"  style="height: 11em; width : 20em; background-color: red"><a href="student_club" class="insidelink"><img src="{{ url('/') }}/assets_parent/images/icons/blog.png" alt="" title="" /><span>Club</span></a></li>

			<li class="bluegreen"  style="height: 11em; width : 20em"><a href="Idee" class="insidelink"><img src="{{ url('/') }}/assets_parent/images/icons/layout.png" alt="" title="" /><span>La boîte à idées</span></a></li>

        </ul> 
			</center>
        </nav> 
     </div>
     
    </div>

    </div>

	 

 



	 <!-- //Main wrapper -->

	<!-- JS Files -->

	<script src="{{ url('/') }}/assets_parent/js/vendor/jquery-3.2.1.min.js"></script>

	<script src="{{ url('/') }}/assets_parent/js/popper.min.js"></script>

	<script src="{{ url('/') }}/assets_parent/js/bootstrap.min.js"></script>

	<script src="{{ url('/') }}/assets_parent/js/plugins.js"></script>

	<script src="{{ url('/') }}/assets_parent/js/active.js"></script>

</body>



</html>