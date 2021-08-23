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
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/style1.css">

</head>

<body>

    <div class="wrapper">

        <!-- cart-main-area start -->

        <section class="dcare__counterup__area section-padding--lg  ">

            <div class="container">

                <div class="row">

                    <div class="col-lg-12 col-sm-12 col-md-12">

                        <div class="section__title text-center">

                            <h2 class="title__line" style="font-size:100px"><a href="student_menu" style="color:#6f42c1"><i class="fa fa-home"></i></a></h2>

                            <h2 class="title__line">Emploi du temps</h2>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12 col-lg-12 col-sm-12">

                            <table style="width: 1150px;">
                                <tr style="height: 50px">
                                    <td>Heures \ Jours</td>
                                    <td>Lundi <?php echo 5%3; ?></td>
                                    <td>Mardi</td>
                                    <td>Mercredi</td>
                                    <td>Jeudi</td>
                                    <td>Vendredi</td>
                                    <td>Samedi</td>
                                    <td>Dimanche</td>
                                </tr>
                                <tbody>
                                    @for ($i = 0; $i < 10; $i++)
                                        <tr>
                                            <th>{{$times[$i].' - '.$times[$i+1]}}</th>
                                            @foreach ($days as $day)
                                                @if ($cours[$i][$day] == '')
                                                <td data-toggle="modal" data-target="#exampleModalCenter{{$i.$day}}"></td>
                                                @else
                                                <td data-toggle="modal" data-target="#exampleModal{{$cours_id[$i][$day]}}">{{ $cours[$i][$day]}}<br> ({{ $cours1[$i][$day]}})</td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endfor
                                </tbody>

                                {{-- <?php $times = array('8h30', '9h30', '10h30', '11h30', '12h30', '13h30', '14h30', '15h30', '16h30', '17h30', '18h30');
                                $days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
                                $data1 = array("post");
                                $p = 0;
                                for ($i = 0; $i < 10; $i++) { ?>

                                    <tr style="height: 60px">
                                        <td><?php echo $times[$i] . '-' . $times[$i + 1]; ?></td>
                                        <?php for ($i1 = 0; $i1 < 7; $i1++) { ?>
                                            <?php $sience1 = $this->Ecole->get_by3('emploi', 'class', $class, 'heur', $times[$i], 'jour', $days[$i1]);
                                            if (!empty($sience1)) {
                                                foreach ($sience1 as $sience) {
                                                    $salles = $this->Ecole->get_by('departement', 'id', $sience->salle);
                                                    $ok = array_search($sience->matiere,$data1);
                                                    foreach ($salles as $salle) { 
                                                         if (array_search($sience->matiere,$data1) == '') {
                                                           array_push($data1,$sience->matiere); 
                                                           $ok = array_search($sience->matiere,$data1);
                                                           $p = $p+1;
                                                         }
                                                          ?>
                                                        <td class="p<?php echo $ok; ?>" onclick="click2(<?php echo $sience->id; ?>)"><?php echo $sience->matiere . '<br>(' . $salle->name . ')'; ?></td>
                                                <?php }
                                                }
                                            } else { ?>
                                                <th onclick="click1('<?php echo $times[$i]; ?>','<?php echo $days[$i1]; ?>')"> </th>
                                        <?php  }
                                        } ?>

                                    <?php } ?> --}}

                            </table><br>
                        </div>

                    </div>

                </div>

        </section>







    </div>

    </div>

    </div>

    </div>

    <!-- cart-main-area end -->

    <!-- Start Subscribe Area -->



    </div><!-- //Main wrapper -->



    <!-- JS Files -->

    <script src="{{ url('/') }}/assets_parent/js/vendor/jquery-3.2.1.min.js"></script>

    <script src="{{ url('/') }}/assets_parent/js/popper.min.js"></script>

    <script src="{{ url('/') }}/assets_parent/js/bootstrap.min.js"></script>

    <script src="{{ url('/') }}/assets_parent/js/plugins.js"></script>

    <script src="{{ url('/') }}/assets_parent/js/active.js"></script>

</body>

</html>