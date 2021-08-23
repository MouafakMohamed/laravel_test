@extends('admin/layouts.app')
@section('css')
<link rel="stylesheet" href="{{ url('/') }}/css/jquery.dataTables.min.css">
@endsection
@section('js')
<script>
   $(document).ready(function(){
      $('#datatable').DataTable();
      $("#myInput").on("keyup", function() {
         var value = $(this).val().toLowerCase();
         $("#datatable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
         });
      });
   });
</script>
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
               <div class="iq-header-title">
                  <h4 class="card-title">Les paiements</h4>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-6 col-lg-4">
         <div class="iq-card iq-card-block iq-card-stretch iq-card-height" >
            <div class="iq-card-body">
                  <div class="form-group">
                     <h4 class="mb-2 mt-2">Paiements</h4>
                     <select name="select" onchange="Paiements('{{url('admin/ajax_get_Paiements')}}')" class="form-control" id="mois">
                        @foreach ($mois as $moi)
                           <option value="{{$moi}}">{{$moi}}</option>
                        @endforeach
                     </select>
                  </div>
            </div>
         </div>
      </div>
      <div class="col-md-6 col-lg-4">
         <div class="iq-card iq-card-block iq-card-stretch iq-card-height" style="background-color: rgba(8, 155, 171, 1)">
            <div class="iq-card-body">
               <div class="d-flex align-items-center justify-content-between">
                  <div class="text-left">
                     <h4 class="mb-2 mt-2" style="color: aliceblue">Payé</h4>
                     <h3 class="mb-0 line-height"  style="color: aliceblue; text-align: right" id="payé">{{$payé}} DH</h3>
                  </div>
                  {{-- <div class="rounded-circle iq-card-icon bg-warning"><i class="ri-hospital-line"></i></div> --}}
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-6 col-lg-4">
         <div class="iq-card iq-card-block iq-card-stretch iq-card-height" style="background-color:rgba(216, 74, 69, 1)">
            <div class="iq-card-body">
               <div class="d-flex align-items-center justify-content-between">
                  <div class="text-left">
                     <h4 class="mb-2 mt-2 " style="color: aliceblue">Non payé</h4>
                     <h3 class="mb-0 line-height" style="color: aliceblue" id="total">{{$total-$payé}} DH</h3>
                  </div>
                  {{-- <div class="rounded-circle iq-card-icon bg-danger"><i class="ri-gradienter-line"></i></div> --}}
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-12">
         <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-body">
               <div class="table-responsive" id="table"  style="overflow-x: hidden;">
                  <table id="datatable" style="width: 100%" class="table table-striped table-bordered"">
                     <thead>
                        <tr>
                           <th scope="col">Nom</th>
                            <th scope="col"> Prénom </th>
                            <th scope="col"> Massar</th>
                            <th scope="col"> Class</th>
                            <th scope="col"> Prix </th>
                            <th scope="col"> Mois</th>
                            <td>Valider</td>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($students as $student)
                        <?php $n = 0; ?>
                           @foreach ($student->mois as $item => $value)
                              
                                 @if ($value['etat'] == 'non')
                                    <tr>
                                       <td >{{$student->nom}}</td>
                                       <td>{{$student->pre}}</td>
                                       <td>{{$student->id1}}</td>
                                       <td>{{$student->class}}</td>
                                       <td>{{$value['prix']}} DH</td>
                                       <td>{{$value['ok']}}</td>
                                       <td>
                                          @if ($value['prix'] > 0)
                                          <div class="custom-control custom-switch custom-switch-icon custom-control-inline">
                                                <div class="custom-switch-inner">
                                                <input type="checkbox" onchange="salaire1('{{$student->id}}','{{url('admin/ajax_add_salaire2')}}','{{$value['ok']}}', '{{url('admin/recu')}}', '{{$value['prix']}}','rien')" class="custom-control-input" id="customSwitch-{{$student->id.$n}}" >
                                                <label class="custom-control-label" for="customSwitch-{{$student->id.$n}}">
                                                <span class="switch-icon-left"><i class="fa fa-check"></i></span>
                                                <span class="switch-icon-right"><i class="fa fa-check"></i></span>
                                                </label>
                                                </div>
                                          </div>
                                           @endif
                                       </td>
                                    </tr>
                                 @endif
                             
                              <?php $n++; ?>
                           @endforeach
                        @endforeach
                     </tbody>
                  </table>
                  
               </div>
            </div>
         </div> 
      </div>     
   </div>
</div>
@endsection