<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
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
       <style>
          #loades{
             display: none;
          }
        .content-page {
            margin-left: 0px;
            padding: 60px 15px 0;
            border-radius: 0 0 0 0;
        }

       </style>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         <!-- Page Content  -->
         <div id="content-page" class="content-page" style="background-color : #17a2b8" >
            
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12 col-lg-2"></div>
                    <div class="col-sm-8 col-lg-8">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title" style="text-align: center">obtenez votre premier utilisateur administrateur</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="row">
                              <div class="col-md-3">
                                 <ul id="top-tabbar-vertical" class="p-0">
                                    <li class="active" id="personal">
                                       <a href="javascript:void();">
                                       <i class="ri-lock-unlock-line text-primary"></i><span>Général</span>
                                       </a>
                                    </li>
                                    <li id="contact">
                                       <a href="javascript:void();">
                                       <i class="ri-user-fill text-danger"></i><span>Contact</span>
                                       </a>
                                    </li>
                                    <li id="official">
                                       <a href="javascript:void();">
                                       <i class="ri-camera-fill text-success"></i><span>Conexion</span>
                                       </a>
                                    </li>
                                    <li id="payment">
                                       <a href="javascript:void();">
                                       <i class="ri-check-fill text-warning"></i><span>Licence</span>
                                       </a>
                                    </li>
                                 </ul>
                              </div>
                              <div class="col-md-9">
                                <form id="form-wizard3" class="text-center" method="POST" action="{{url('register')}}" enctype="multipart/form-data">
                                    @csrf
                                    <!-- fieldsets -->
                                    <fieldset>
                                       <div class="form-card text-left">
                                          <div class="row">
                                             <div class="col-12">
                                                <h3 class="mb-4">Les informations générales:</h3>
                                             </div>
                                          </div>
                                          <center><img class=" img-fluid" id="logo" src="{{ url('/assets/')}}/logo.png" style="width: 150px;display: none" alt="profile-pic"></center>
                                          <div class="row">
                                             <label style="padding-left: 12px">LOGO : *</label>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                       <div class="custom-file">
                                                            <input type="file" onchange="show_image.call(this)" name="logo" class="custom-file-input" id="validatedCustomFile" >
                                                            <label class="custom-file-label" for="validatedCustomFile1">Choisissez le logo: *</label>
                                                            @error('logo')
                                                               <span  style="color: red" role="alert">
                                                                  <strong>{{ $message }}</strong>
                                                               </span><br>
                                                            @enderror
                                                         </div>
                                                      </div>
                                                </div>
                                                <div class="col-md-12">
                                                   <div class="form-group">
                                                      <label for="nom">École: *</label>
                                                      <input type="text" value="{{old('nom')}}" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom"/>     
                                                      @error('nom')
                                                         <span  style="color: red" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                         </span><br>
                                                      @enderror   
                                                   </div>
                                                </div>
                                                <div class="col-md-12">
                                                   <div class="form-group">
                                                      <label for="city">Ville: *</label>
                                                      <input type="text"  value="{{old('ville')}}" class="form-control @error('ville') is-invalid @enderror" id="city" name="ville" placeholder="Example : fes." />
                                                      @error('ville')
                                                         <span  style="color: red" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                         </span><br>
                                                      @enderror
                                                   </div>
                                                </div>
                                                <div class="col-md-12">
                                                   <div class="form-group">
                                                   <label> Les niveaux: *</label>
                                                      <div class="form-check">
                                                         <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="checkbox" id="Préscolaire" @if (old('Préscolaire')) checked="" @endif name="Préscolaire" class="custom-control-input">
                                                            <label class="custom-control-label"  for="Préscolaire"> Préscolaire</label>
                                                         </div>
                                                         <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="checkbox" id="Primaire" @if (old('Primaire')) checked="" @endif name="Primaire" class="custom-control-input">
                                                            <label class="custom-control-label" for="Primaire"> Primaire</label>
                                                         </div>
                                                         <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="checkbox" id="Collège" @if (old('Collège')) checked="" @endif name="Collège" class="custom-control-input">
                                                            <label class="custom-control-label" for="Collège"> Collège</label>
                                                         </div>
                                                         <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="checkbox" id="Lycée" @if (old('Lycée')) checked="" @endif name="Lycée" class="custom-control-input">
                                                            <label class="custom-control-label" for="Lycée"> Lycée </label>
                                                         </div>
                                                      </div>
                                                      @error('adress')
                                                         <span  style="color: red" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                         </span><br>
                                                      @enderror
                                                      @error('fix')
                                                          <span  style="color: red" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                         </span><br>
                                                      @enderror
                                                      @error('tele')
                                                         <span  style="color: red" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                         </span><br>
                                                      @enderror
                                                      @error('email')
                                                         <span  style="color: red" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                         </span><br>
                                                      @enderror
                                                      @error('password')
                                                         <span  style="color: red" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                         </span><br>
                                                      @enderror
                                                      @error('password_confirmation')
                                                         <span  style="color: red" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                         </span><br>
                                                      @enderror
                                                      @error('id_name')
                                                         <span  style="color: red" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                         </span><br>
                                                      @enderror
                                                      @error('licence')
                                                         <span  style="color: red" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                         </span><br>
                                                      @enderror
                                                      @if (session()->has('delete'))
                                                         <span  style="color: red" role="alert">
                                                            <strong>{{ session()->get('delete') }}</strong>
                                                         </span><br>
                                                      @endif
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       <button id="submit" type="button" name="next" class="btn btn-primary next action-button float-right" value="suivant" >suivant</button>
                                    </fieldset>
                                    <fieldset>
                                       <div class="form-card text-left">
                                          <div class="row">
                                             <div class="col-12">
                                                <h3 class="mb-4">Les informations de contact:</h3>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                   <label for="state">Adresse: *</label>
                                                   <input type="text"  value="{{old('adress')}}" class="form-control @error('adress') is-invalid @enderror" id="state" name="adress" placeholder="....." />
                                                </div>
                                             </div>
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                   <label for="ccno">Tel Professionel : *</label>
                                                   <input type="number"  value="{{old('Tel')}}" class="form-control @error('Tel') is-invalid @enderror" id="ccno" name="Tel" placeholder="...." />
                                                </div>
                                             </div>
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                   <label for="tele">Mobile : *</label>
                                                   <input type="number"  value="{{old('Mobile')}}" class="form-control @error('Mobile') is-invalid @enderror" id="tele" name="Mobile" placeholder="...." />
                                                </div>
                                             </div>
                                             
                                          </div>
                                       </div>
                                       <button type="button" name="next" class="btn btn-primary next action-button float-right" value="suivant" >suivant</button>
                                       <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Retour" >Retour</button>
                                    </fieldset>
                                    <fieldset>
                                       <div class="form-card text-left">
                                          <div class="row">
                                             <div class="col-12">
                                                <h3 class="mb-4 text-left">Conexion:</h3>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                   <label for="panno">Email: *</label>
                                                   <input type="email" class="form-control @error('email') is-invalid @enderror" id="panno" name="email" placeholder="example@mail.com" />
                                                </div>
                                             </div>
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                   <label for="accno">Mot de passe: *</label>
                                                   <input type="password" class="form-control @error('password') is-invalid @enderror" id="accno" name="password" placeholder="********" />
                                                   
                                                </div>
                                             </div>
                                             <div class="col-md-12">
                                                <div class="form-group">
                                                   <label for="holname">Confirmez le Mot de passe: *</label>
                                                   <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="holname" name="password_confirmation" placeholder="********" />
                                                   
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Submit" >suivant</button>
                                       <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Retour" >Retour</button>
                                    </fieldset>
                                    <fieldset>
                                       <div class="form-card text-left">
                                          <div class="row">
                                             <div class="col-12">
                                                <h3 class="mb-4">Licence </h3>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-md-12 p-6">
                                                <div class="form-group">
                                                   <label for="id_name">ID : *</label>
                                                   <input type="text" class="form-control @error('id_name') is-invalid @enderror" id="id_name"  name="id_name" />
                                                   
                                                </div>
                                             </div>
                                             <div class="col-md-12 p-6">
                                                <div class="form-group">
                                                   <label for="licence">clé de licence : *</label>
                                                   <input type="text" class="form-control @error('licence') is-invalid @enderror" id="licence" placeholder="XXXXXX-XXXXXX-XXXXXX-XXXXXX" name="licence" />
                                                   
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       {{-- <button class="btn btn-primary" type="button" disabled>
                                          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                          <span class="sr-only">Loading...</span>
                                        </button> --}}
                                        <button type="submit" onclick="display()" id="none" class="btn btn-primary action-button float-right">Valider  </button>
                                          <button class="btn btn-primary float-right" id="loades" type="button" disabled>
                                             <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                             Loading...
                                          </button>
                                       <button type="button"  id="none1" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Retour</button>
                                    </fieldset>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
      <!-- Footer END -->
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
      <script>
         function display() {
            document.getElementById("loades").style.display = "block";
            document.getElementById("none").style.display = "none";
            document.getElementById("none1").style.display = "none";
         }
         function show_image() {
            if (this.files && this.files[0]) {
                     var obj = new FileReader();
                     obj.onload = function (data) {
                        var image = document.getElementById('logo');
                        image.src = data.target.result;
                        image.style.display = "block";
                     }
                     obj.readAsDataURL(this.files[0]);
               }

            }
      </script>
   </body>
</html>