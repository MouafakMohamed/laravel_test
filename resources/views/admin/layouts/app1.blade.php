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
      <link rel="stylesheet" href="{{ url('assets/') }}/css/style.css">
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
               <a href="index.html">
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
                     <li class="{{'admin/Backend/Cycle'== request()->path() ? 'active' : ''}}" >
                        <a href="{{url('admin/Backend/Cycle')}}" class="iq-waves-effect"><i class="ri-hospital-fill"></i><span>Cycles</span></a>
                     </li> 
                     <li class="{{'admin/Backend/Salle'== request()->path() ? 'active' : ''}}" >
                        <a href="{{url('admin/Backend/Salle')}}" class="iq-waves-effect"><i class="ri-hospital-fill"></i><span>Salles</span></a>
                     </li> 
                     <li class="{{'admin/Backend/Matiere'== request()->path() ? 'active' : ''}}">
                        <a href="{{url('admin/Backend/Matiere')}}"><i class="ri-book-open-line"></i> Matiéres </a>
                     </li>
                  </ul>
               </nav>
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
                                    <a href="{{url('admin/Dashboard')}}" class="iq-sub-card iq-bg-primary-hover">
                                       <div class="media align-items-center">
                                          <div class="rounded iq-card-icon iq-bg-primary">
                                             <i class="ri-profile-line"></i>
                                          </div>
                                          <div class="media-body ml-3">
                                             <h6 class="mb-0 ">Frontend </h6>
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
                                             <i class="ri-lock-line"></i>
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

