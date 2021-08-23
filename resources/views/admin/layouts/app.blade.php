<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
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

      {{-- <link rel="stylesheet" href="{{ url('/') }}/css/jquery.dataTables.min.css"> --}}

      @yield('css')
      {{-- <script src = "{{ url('assets/') }}/css/jquery.min1.js"></script> --}}
   </head>
   <body class="sidebar-main">
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
               <a href="{{url('admin/Dashboard')}}">
               <img src="{{ url('assets/') }}/title.png" class="img-fluid" alt="">
               <span>Colibri</span>
               </a>
               <div class="iq-menu-bt-sidebar">
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="ri-more-fill"></i></div>
                           <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
                     </div>
                  </div>
               </div>
            </div>
            <div id="sidebar-scrollbar">
               <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                     <li class="{{'admin/Dashboard'== request()->path() || 'admin'== request()->path() ? 'active' : ''}}" >
                        <a href="{{url('/admin/Dashboard')}}" class="iq-waves-effect"><i class="ri-hospital-fill"></i><span>Dashboard</span></a>
                     </li> 
                     <li class="{{ 'admin/GRH'== request()->path() || 'admin/GRH/ajoute'== request()->path() ? 'active' : '' }}">
                        <a href="#doctor-info" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-user-3-fill"></i><span>GRH</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="doctor-info" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li class="{{ 'admin/GRH/ajoute'== request()->path() ? 'active' : ''}}"><a href="{{url('/admin/GRH/ajoute')}}"><i class="ri-user-add-fill"></i> Ajouter des Employés </a></li>
                           <li class="{{ 'admin/GRH'== request()->path() ? 'active' : ''}}"><a href="{{url('/admin/GRH')}}"><i class="ri-file-list-fill"></i>Les fonctionnaires</a></li>
                           {{-- <li class="{{ 'admin/profs'== request()->path() ? 'active' : ''}}"><a href="{{url('/admin/profs')}}"><i class="ri-profile-fill"></i>Les professeurs</a></li> --}}
                        </ul>
                     </li>
                     
                     <li class="{{ 'admin/Departement'== request()->path() || 'admin/Equipements'== request()->path() || 'admin/Transport'== request()->path() || 'admin/Horaire'== request()->path() || 'admin/Class'== request()->path() ? 'active' : ''}}">
                        <a href="#menu-level-6" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-global-fill"></i><span>G-Etablissement</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="menu-level-6" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li class="{{ 'admin/Equipements'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/Equipements')}}"><i class="ri-building-4-line"></i> Equipements </a></li>
                           <li class="{{ 'admin/Class'== request()->path() ? 'active' : ''}}"><a href="{{url('/admin/Class')}}"><i class="ri-clipboard-fill"></i>Classes</a></li>
                          <li class="{{ 'admin/Transport'== request()->path() ? 'active' : ''}}"><a href="{{url('/admin/Transport')}}"><i class="ri-bus-fill"></i>Transport</a></li>
                          <li class="{{ 'admin/Horaire'== request()->path() ? 'active' : ''}}"><a href="{{url('/admin/Horaire')}}"><i class="ri-time-line"></i>Lemploi du temps</a></li>
                        </ul>
                     </li>
                     {{-- <li class="menu-level">
                        <a href="#menu-level1" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-record-circle-line"></i><span>Menu Level</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="menu-level1" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="{{url('/admin/Dashboard')}}"><i class="ri-record-circle-line"></i>Menu 1</a></li>
                           <li><a href="#"><i class="ri-record-circle-line"></i>Menu 2</a>
                              <ul>
                                 <li>
                                    <a href="#sub-menu-1" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-play-circle-line"></i><span>Sub-menu</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                    <ul id="sub-menu-1" class="iq-submenu iq-submenu-data collapse">
                                       <li><a href="#"><i class="ri-record-circle-line"></i>Sub-menu 1</a></li>
                                       <li><a href="{{url('/admin/Dashboard')}}"><i class="ri-record-circle-line"></i>Sub-menu 2</a></li>
                                       <li><a href="#"><i class="ri-record-circle-line"></i>Sub-menu 3</a></li>
                                    </ul>
                                 </li>
                              </ul>
                           </li>
                           <li><a href="#"><i class="ri-record-circle-line"></i>Menu 3</a></li>
                           <li><a href="#"><i class="ri-record-circle-line"></i>Menu 4</a></li>
                        </ul>
                     </li> --}}
                     <li class="{{ 'admin/Absence'== request()->path() || 'admin/id_cart'== request()->path() || 'admin/Etudiant'== request()->path() || 'admin/Etudiants'== request()->path() || 'admin/Ancien_eleve'== request()->path() || 'admin/Parent'== request()->path() || 'admin/Parents'== request()->path() || 'admin/Devoires'== request()->path() || 'admin/Frais'== request()->path() || 'admin/certificate'== request()->path() ? 'active' : ''}} menu-level">
                        <a href="#doctor-info15" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-group-fill"></i><span>Espace Etudiants</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="doctor-info15" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li class="{{ 'admin/Etudiant'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/Etudiant')}}"><i class="ri-user-add-fill"></i> Ajouter un élève </a></li>
                           <li class="{{ 'admin/Etudiants'== request()->path() ? 'active' : ''}}"><a href="{{url('/admin/Etudiants')}}"><i class="ri-group-fill"></i>Élèves</a></li>
                           <li class="{{ 'admin/Ancien_eleve'== request()->path() ? 'active' : ''}}"><a href="{{url('/admin/Ancien_eleve')}}"><i class="ri-group-fill"></i>Les anciens élèves</a></li>
                           <li class="{{ 'admin/id_cart'== request()->path() ? 'active' : ''}}"><a href="{{url('/admin/id_cart')}}"><i class="ri-group-fill"></i>Id cart</a></li>
                           <li class="{{ 'admin/Parents'== request()->path() ? 'active' : ''}}"><a href="{{url('/admin/Parents')}}"><i class="ri-group-fill"></i>Parents</a></li>
                           <li class="{{ 'admin/Frais'== request()->path() ? 'active' : ''}}"><a href="{{url('/admin/Frais')}}"><i class="ri-group-fill"></i>Frais</a></li>
                           <li class="{{ 'admin/Devoires'== request()->path() ? 'active' : ''}}"><a href="{{url('/admin/Devoires')}}"><i class="ri-clipboard-fill"></i>Devoires</a></li> 
                           <li class="{{ 'admin/Absence'== request()->path() ? 'active' : ''}}"><a href="{{url('/admin/Absence')}}"><i class="ri-clipboard-fill"></i>Absence</a></li>  
                           <li class="{{'admin/Exam/prochaine'== request()->path()  || 'admin/Exam/corriger'== request()->path() ? 'active' : ''}}">
                              <ul>
                                 <li>
                                    <a href="#sub-menu-3" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-play-circle-line"></i><span>Exam</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                                    <ul id="sub-menu-3" class="iq-submenu iq-submenu-data collapse">
                                       <li  class="{{ 'admin/Exam/prochaine'== request()->path() ? 'active' : ''}}"><a href="{{url('/admin/Exam/prochaine')}}"><i class="ri-record-circle-line"></i>Exam suivant</a></li>
                                       <li  class="{{ 'admin/Exam/corriger'== request()->path() ? 'active' : ''}}"><a href="{{url('/admin/Exam/corriger')}}"><i class="ri-record-circle-line"></i>Exam corriger</a></li>
                                    </ul>
                                 </li>
                              </ul>
                           </li>
                           {{-- <li class="{{ 'admin/certificate'== request()->path() ? 'active' : ''}}"><a href="{{url('/admin/certificate')}}"><i class="ri-clipboard-fill"></i>les certificates</a></li>  --}}
                        </ul>
                     </li>
                     <li class="{{'admin/biblio'== request()->path() || 'admin/cours'== request()->path() ? 'active' : ''}}">
                        <a href="#doctor-infocours" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-user-3-fill"></i><span>E-Learning</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="doctor-infocours" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li class="{{ 'admin/biblio'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/biblio')}}"><i class="ri-book-3-line"></i>Bibliothéque </a></li>
                           <li class="{{ 'admin/cours'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/cours')}}"><i class="ri-book-open-line"></i>Cours </a></li>
                        </ul>
                     </li>
                     <li class="{{'admin/visites'== request()->path() || 'admin/contact'== request()->path() || 'admin/club'== request()->path() ? 'active' : ''}}">
                        <a href="#App" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-briefcase-4-line"></i><span>Apps</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="App" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li class="{{ 'admin/visites'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/visites')}}"><i class="ri-book-open-line"></i>Livre des visites </a></li>
                           <li class="{{ 'admin/contact'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/contact')}}"><i class="ri-book-open-line"></i>Les contacts </a></li>
                           <li class="{{ 'admin/club'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/club')}}"><i class="ri-book-open-line"></i>Club éducatif </a></li>
                        </ul>
                     </li>
                     <li class="{{'admin/stock_commande'== request()->path() || 'admin/stock_produit'== request()->path() || 'admin/liste'== request()->path() ? 'active' : ''}}">
                        <a href="#menu-level1" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-product-hunt-fill"></i><span>Gestion de stock</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="menu-level1" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li class="{{'admin/stock_produit'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/stock_produit')}}"><i class="ri-record-circle-line"></i>Les produits</a></li>
                           <li class="{{'admin/stock_commande'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/stock_commande')}}"><i class="ri-record-circle-line"></i>Distribution</a></li>
                           <li class="{{'admin/liste'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/liste')}}"><i class="ri-record-circle-line"></i>Liste d'achat</a></li>
                        </ul>
                     </li>
                     <li class="{{'admin/salaire'== request()->path() || 'admin/paiement'== request()->path() || 'admin/charges'== request()->path() || 'admin/statistique'== request()->path() ? 'active' : ''}}">
                        <a href="#statistique" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-briefcase-4-line"></i><span>Comptabilité</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="statistique" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li class="{{ 'admin/salaire'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/salaire')}}"><i class="ri-book-3-line"></i>Les salaires </a></li>
                           <li class="{{ 'admin/paiement'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/paiement')}}"><i class="ri-book-open-line"></i>Les paiements </a></li>
                           <li class="{{ 'admin/charges'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/charges')}}"><i class="ri-book-open-line"></i>Les charges </a></li>
                           <li class="{{ 'admin/statistique'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/statistique')}}"><i class="ri-book-open-line"></i>Les statistiques </a></li>
                        </ul>
                     </li>
                     <li class="{{'admin/tracabilite'== request()->path() ? 'active' : ''}}" >
                        <a href="{{url('admin/tracabilite/all')}}" class="iq-waves-effect"><i class="ri-hospital-fill"></i><span>Tracabilite</span></a>
                     </li>
                     <li  class="{{'admin/base_donne_eleve'== request()->path()  || 'admin/base_donne_grh'== request()->path() ? 'active' : ''}}" >
                        <a href="#doctor-info1" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-user-3-fill"></i><span>Base de donné</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="doctor-info1" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li  class="{{ 'admin/base_donne_eleve'== request()->path() ? 'active' : ''}}"><a href="{{url('/admin/base_donne_eleve')}}"><i class="ri-record-circle-line"></i>Élèves</a></li>
                              <li  class="{{ 'admin/base_donne_grh'== request()->path() ? 'active' : ''}}"><a href="{{url('/admin/base_donne_grh')}}"><i class="ri-record-circle-line"></i>Les fonctionnaires</a></li>
                        </ul>
                     </li>
                      {{-- <li class="{{'admin/update'== request()->path() ? 'active' : ''}}">
                        <a href="{{url('admin/update')}}"><i class="ri-book-open-line"></i> mise à jour </a>
                     </li> --}}
                  </ul>
               </nav>
               <div class="p-3"></div>
            </div>
         </div>
         <!-- Responsive Breadcrumb End-->
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <!-- TOP Nav Bar -->
            <div class="iq-top-navbar">
               <div class="iq-navbar-custom">
                  <div class="iq-sidebar-logo">
                     <div class="top-logo">
                        <a href="index.html" class="logo">
                           <img src="{{url('/assets')}}/logo.png" class="img-fluid" alt="">
                           <span>Colibri</span>
                        </a>
                     </div>
                  </div>
                  <nav class="navbar navbar-expand-lg navbar-light p-0">
                     <div class="iq-search-bar">
                        <form action="#" class="searchbox">
                           <input type="text" class="text search-input" placeholder="Type here to search...">
                           <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                        </form>
                     </div>
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ri-menu-3-line"></i>
                     </button>
                     <div class="iq-menu-bt align-self-center">
                        <div class="wrapper-menu">
                           <div class="main-circle"><i class="ri-more-fill"></i></div>
                           <div class="hover-circle"><i class="ri-more-2-fill"></i></div>
                        </div>
                     </div>
                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto navbar-list">
                           <li class="nav-item iq-full-screen">
                              <a href="#" class="iq-waves-effect" id="btnFullscreen"><i class="ri-fullscreen-line"></i></a>
                           </li>
                        </ul>
                     </div>
                     <ul class="navbar-list">
                        <li>
                           <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                              <img src="{{url('/').'/'.Auth::user()->logo}}" class="img-fluid rounded mr-3" alt="user">
                              <div class="caption">
                                 <h6 class="mb-0 line-height">{{ Auth::user()->nom}}</h6>
                                 <span class="font-size-12">président directeur général</span>
                              </div>
                           </a>
                           <div class="iq-sub-dropdown iq-user-dropdown">
                              <div class="iq-card shadow-none m-0">
                                 <div class="iq-card-body p-0 ">
                                    <div class="bg-primary p-3">
                                       <h5 class="mb-0 text-white line-height">Mr
                                          {{ Auth::user()->nom }}</h5>
                                       <span class="text-white font-size-12">Président directeur général</span>
                                    </div>
                                    {{-- <a href="profile.html" class="iq-sub-card iq-bg-primary-hover">
                                       <div class="media align-items-center">
                                          <div class="rounded iq-card-icon iq-bg-primary">
                                             <i class="ri-file-user-line"></i>
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">My Profile</h6>
                                             <p class="mb-0 font-size-12">View personal profile details.</p>
                                          </div>
                                       </div>
                                    </a> --}}
                                    <a href="{{url('admin/profil/'.Auth::user()->id)}}" class="iq-sub-card iq-bg-primary-hover">
                                       <div class="media align-items-center">
                                          <div class="rounded iq-card-icon iq-bg-primary">
                                             <i class="ri-profile-line"></i>
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Edit Profile</h6>
                                          </div>
                                       </div>
                                    </a>
                                    <a href="{{url('admin/Backend/Cycle')}}" class="iq-sub-card iq-bg-primary-hover">
                                       <div class="media align-items-center">
                                          <div class="rounded iq-card-icon iq-bg-primary">
                                             <i class="ri-profile-line"></i>
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Backend</h6>
                                          </div>
                                       </div>
                                    </a>
                                    {{-- <div class="d-inline-block w-100 text-center p-3">
                                       <a class="bg-primary iq-sign-btn" href="{{ url('admin/logout') }}" role="button">
                                          <i class="ri-login-box-line ml-2"></i>
                                       </a>
                                    </div> --}}
                                    <a href="{{ url('admin/logout') }}" class="iq-sub-card iq-bg-primary-hover">
                                       <div class="media align-items-center">
                                          <div class="rounded iq-card-icon iq-bg-primary">
                                             <i class="ri-logout-line"></i>
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">{{ __('Logout') }}</h6>
                                          </div>
                                       </div>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </nav>
               </div>
            </div>
            <!-- TOP Nav Bar END -->
            {{-- <div class="alert text-white bg-danger" role="alert">
               <div class="iq-alert-text">A simple <b>secondary</b> alert—check it out!</div>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <i class="ri-close-line"></i>
               </button>
            </div> --}}
                        @if (session()->has('create'))
                           <div class="col-12">
                              <div class="alert text-white bg-success" role="alert">
                                 <p class="mb-0">
                                    <center> <b> {{ session()->get('create') }} </b> </center>
                                 </p>
                              </div>
                           </div>
                        @endif
                        @if (session()->has('update'))
                           <div class="col-12">
                              <div class="alert text-white bg-success" role="alert">
                                 <p class="mb-0">
                                   <center><b>{{ session()->get('update') }}</b>   </center> 
                                 </p>
                              </div>
                           </div>
                        @endif
                        @if (session()->has('delete'))
                           <div class="col-12">
                              <div class="alert text-white bg-danger" role="alert">
                                 <p class="mb-0">
                                     <b>{{ session()->get('delete') }}</b>  
                                 </p>
                              </div>
                           </div>
                        @endif

                  @yield('content')
                     
            <!-- Footer -->
            {{-- <footer class="bg-white iq-footer">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-lg-3">
                        {{-- <ul class="list-inline mb-0">
                           <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                           <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
                        </ul> 
                     </div> 
                     <div class="col-lg-6 text-center">
                        © smart services team.
                     </div>
                  </div>
               </div>
            </footer> --}}

            <!-- Footer END -->
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
      <!-- Custom JavaScript -->
      <script src="{{ url('assets/') }}/js/custom.js"></script>
      <!-- Datatable script -->
      <script src="{{ url('/') }}/js/jquery.dataTables.min.js"></script>
      <!-- Sweet alert JavaScript -->
      <script src="{{ url('assets/') }}/js/chart-custom.js"></script>

      <script src="{{ url('assets/') }}/js/sweetalert.min.js"></script>

      @yield('js')

      <script src="{{ url('assets/') }}/js/main.js"></script>
   </body>
</html>

