@extends('admin/layouts.app')
@section('css')
<link href="{{ url('assets/') }}/fullcalendar/core/main.css" rel='stylesheet' />
<link href="{{ url('assets/') }}/fullcalendar/daygrid/main.css" rel='stylesheet' />
<link href="{{ url('assets/') }}/fullcalendar/timegrid/main.css" rel='stylesheet' />
<link href="{{ url('assets/') }}/fullcalendar/list/main.css" rel='stylesheet' />

<link rel="stylesheet" href="{{ url('assets/') }}/css/flatpickr1.min.css">
@endsection
@section('js')
<script src="{{ url('assets/') }}/js/core.js"></script>
<!-- am charts JavaScript -->
<script src="{{ url('assets/') }}/js/charts.js"></script>
<!-- am animated JavaScript -->
<script src="{{ url('assets/') }}/js/animated.js"></script>
<!-- am kelly JavaScript -->
<script src="{{ url('assets/') }}/js/kelly.js"></script>
<!-- Flatpicker Js -->
<script src="{{ url('assets/') }}/js/flatpickr.js"></script>
<!-- Chart Custom JavaScript -->
{{-- <script src="{{ url('assets/') }}/js/chart-custom.js"></script>
<!-- Custom JavaScript -->
<script src="{{ url('assets/') }}/js/custom.js"></script> --}}
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-lg-12">
         <div class="row">
            <div class="col-md-6 col-lg-3">
               <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                  <div class="iq-card-body iq-bg-primary rounded">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="rounded-circle iq-card-icon bg-primary"><i class="ri-user-fill"></i></div>
                        <div class="text-right">
                           <h2 class="mb-0"><span class="counter">{{$staff}}</span></h2>
                           <h5 class="">GRH</h5>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-lg-3">
               <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                  <div class="iq-card-body iq-bg-warning rounded">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="rounded-circle iq-card-icon bg-warning"><i class="ri-women-fill"></i></div>
                        <div class="text-right">
                           <h2 class="mb-0"><span class="counter">{{$prof}}</span></h2>
                           <h5 class="">Proffesseurs</h5>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-lg-3">
               <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                  <div class="iq-card-body iq-bg-danger rounded">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="rounded-circle iq-card-icon bg-danger"><i class="ri-group-fill"></i></div>
                        <div class="text-right">
                           <h2 class="mb-0"><span class="counter">{{$student}}</span></h2>
                           <h5 class="">Les étudiants
                           </h5>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6 col-lg-3">
               <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                  <div class="iq-card-body iq-bg-info rounded">
                     <div class="d-flex align-items-center justify-content-between">
                        <div class="rounded-circle iq-card-icon bg-info"><i class="ri-hospital-line"></i></div>
                        <div class="text-right">
                           <h2 class="mb-0"><span class="counter">{{$class}}</span></h2>
                           <h5 class="">Class</h5>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
   </div>
   <div class="row">
      <div class="col-lg-4">
         <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-header d-flex justify-content-between">
               <div class="iq-header-title">
                  <h4 class="card-title">Nearest Treatment</h4>
               </div>
            </div>
            <div class="iq-card-body smaill-calender-home">
               <br>
               <input type="text" class="flatpicker d-none">
            </div>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="iq-card iq-card-block iq-card-stretch iq-card-height-half">
            <div class="iq-card-body">
               <h6>APPOINTMENTS</h6>
               <h3><b>5075</b></h3>
            </div>
            <div id="wave-chart-7"></div>
         </div>
         <div class="iq-card iq-card-block iq-card-stretch iq-card-height-half">
            <div class="iq-card-body">
               <h6>NEW PATIENTS</h6>
               <h3><b>1200</b></h3>
            </div>
            <div id="wave-chart-8"></div>
         </div>
      </div>
      <div class="col-lg-4">
         <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-header d-flex justify-content-between">
               <div class="iq-header-title">
                  <h4 class="card-title">Liste des employées</h4>
               </div>
            </div>
            <div class="iq-card-body">
               <ul class="doctors-lists m-0 p-0">
                  @foreach ($staffs as $staff)
                     <li class="d-flex mb-4 align-items-center">
                        <div class="user-img img-fluid"><img src="{{url('/'.$staff->image)}}" alt="story-img" class="rounded-circle avatar-40"></div>
                        <div class="media-support-info ml-3">
                           <h6>Mr. {{$staff->nom.' '.$staff->pre}} </h6>
                           <p class="mb-0 font-size-12">{{$staff->fonction}}, {{$staff->post}}</p>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                           <div class="dropdown show">
                              <span class="dropdown-toggle text-primary" id="dropdownMenuButton41" data-toggle="dropdown" aria-expanded="true" role="button">
                                 <i class="ri-more-2-line"></i>
                              </span>
                              <div class="dropdown-menu dropdown-menu-right">
                                 <a class="dropdown-item" href="{{url('admin/GRH/profil/'.$staff->id)}}"><i class="ri-eye-line mr-2"></i>Profil</a>
                                 {{-- <a class="dropdown-item" href="#"><i class="ri-bookmark-line mr-2"></i>Appointment</a> --}}
                              </div>
                           </div>
                        </div>
                     </li>  
                  @endforeach
               </ul>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-sm-12">
         <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-header d-flex justify-content-between">
               <div class="iq-header-title">
                  <h4 class="card-title">Proffesseurs</h4>
               </div>
            </div>
            <div class="iq-card-body">
               <ul id="doster-list-slide" class="flex-wrap align-items-center p-0">
                  @foreach ($profs as $prof)
                     <li class="doctor-list-item col-md-12 text-center p-2">
                        <div class="doctor-list-item-inner rounded">
                           <div class="donter-profile">
                              <img src="{{ url('/'.$prof->image) }}" style="width: 128px" class="img-fluid rounded-circle"
                                 alt="user-img">
                           </div>
                           <div class="doctor-detail mt-3">
                              <h5>{{$prof->nom.' '.$prof->pre}}</h5>
                              {{-- <h6>Doctor</h6> --}}
                           </div>
                           {{-- <hr>
                           <div class="doctor-description">
                              <p class="mb-0 text-center pl-2 pr-2">California Hospital Medical Center</p>
                           </div> --}}
                        </div>
                     </li>
                  @endforeach
               </ul>
            </div>
         </div>
      </div>
   </div>
   
</div>

@endsection