@extends('admin/layouts.app')
@section('css')
@endsection
@section('js')
      <!-- highcharts JavaScript -->
      <script src="{{ url('assets/') }}/js/highcharts.js"></script>
      <!-- Custom JavaScript -->
      {{-- <script src="{{ url('assets/') }}/js/custom.js"></script> --}}
@endsection

@section('content')
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12 col-lg-12">
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Statiqtiques</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <div class="col-sm-12">
                     <div class="row">
                        <div class="col-sm-3">
                           <div class="form-group">
                              <label>de </label>
                              <input type="date" onchange="statistique('{{url('admin/ajax_get_statistiques')}}')" class="form-control" name="date1" id="date1">
                           </div>
                        </div>
                        <div class="col-sm-3">
                           <div class="form-group">
                              <label>à</label>
                              <input type="date" onchange="statistique('{{url('admin/ajax_get_statistiques')}}')" class="form-control" name="date2" id="date2">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6 col-lg-4">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height" >
                     <div class="iq-card-body">
                        <div class="d-flex align-items-center justify-content-between">
                           <div class="text-left">
                              <h4 class="mb-2 mt-2">Paiements</h4>
                              <h3 class="mb-0 line-height" id="pay">0 DH</h3>
                           </div>
                           <div class="rounded-circle iq-card-icon bg-primary"><i class="ri-task-line"></i></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-4">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                     <div class="iq-card-body">
                        <div class="d-flex align-items-center justify-content-between">
                           <div class="text-left">
                              <h4 class="mb-2 mt-2">Les salaires</h4>
                              <h3 class="mb-0 line-height" id="salaire">0 DH</h3>
                           </div>
                           <div class="rounded-circle iq-card-icon bg-warning"><i class="ri-hospital-line"></i></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-lg-4">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                     <div class="iq-card-body">
                        <div class="d-flex align-items-center justify-content-between">
                           <div class="text-left">
                              <h4 class="mb-2 mt-2">Les charges</h4>
                              <h3 class="mb-0 line-height" id="charge">0 DH</h3>
                           </div>
                           <div class="rounded-circle iq-card-icon bg-danger"><i class="ri-gradienter-line"></i></div>
                        </div>
                     </div>
                  </div>
               </div>
               {{-- <div class="col-md-6 col-lg-4">
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                     <div class="iq-card-body P-0 rounded" style="background: url(images/page-img/44.jpg) no-repeat scroll center center; background-size: contain; min-height: 127px;">
                     </div>
                  </div>
               </div> --}}
            </div>
         </div>
         <div class="col-sm-12 col-lg-12">
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Graphique 1</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <div id="high-basicline-chart"></div>
               </div>
            </div>
         </div>
         @foreach ($charges as $charge => $key)
               <input type="hidden" id="charge{{$charge}}" value="{{$key}}">
         @endforeach

         @foreach ($salaires as $salaire => $key)
               <input type="hidden" id="salaire{{$salaire}}" value="{{$key}}">
         @endforeach

         @foreach ($frais as $frai => $key)
               <input type="hidden" id="frai{{$frai}}" value="{{$key}}">
         @endforeach
      </div>
   </div>
@endsection