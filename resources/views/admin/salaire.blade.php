@extends('admin/layouts.app')
@section('css')
<link rel="stylesheet" href="{{ url('/') }}/css/jquery.dataTables.min.css">
<style>
   /* #hide{
      display: none;
   } */
</style>
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
                  <h4 class="card-title">Les salaires</h4>
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
                            <th scope="col"> Fonction</th>
                            <th scope="col"> Heures</th>
                            <th scope="col"> Salaire </th>
                            <th scope="col"> Rib</th>
                            <th scope="col"> Mois</th>
                            <td>Valider</td>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($staffs as $staff)
                        <?php $n = 0; ?>
                           @foreach ($staff->mois as $item)
                              @if ($staff->salaire != '0')
                                 @if ($item != 'rien')
                                    <tr>
                                          <td >{{$staff->nom}}</td>
                                          <td>{{$staff->pre}}</td>
                                          <td>{{$staff->fonction}}</td>
                                          <td style="text-align: center">---</td>
                                          <td>{{$staff->salaire}} DH</td>
                                          <td>{{$staff->rib}}</td>
                                          <td>{{$item}}</td>
                                          <td>
                                             <div class="custom-control custom-switch custom-switch-icon custom-control-inline">
                                                <div class="custom-switch-inner">
                                                <input type="checkbox" onchange="salaire1('{{$staff->id}}','{{url('admin/ajax_add_salaire1')}}','{{$item}}','staff', '{{url('admin/salaire')}}', '{{$staff->salaire}}','rien')" class="custom-control-input" id="customSwitch-{{$staff->id.$n}}" >
                                                <label class="custom-control-label" for="customSwitch-{{$staff->id.$n}}">
                                                <span class="switch-icon-left"><i class="fa fa-check"></i></span>
                                                <span class="switch-icon-right"><i class="fa fa-check"></i></span>
                                                </label>
                                                </div>
                                             </div>
                                          </td>
                                    </tr>
                                 @endif
                              @endif
                              <?php $n++; ?>
                           @endforeach
                        @endforeach
                        @foreach ($profs as $prof)
                        <?php $n = 0;
                        $t = 1; ?>
                           @foreach ($prof->mois as $item)
                              @if ($prof->salaire != '0')
                                 @if ($item != 'rien')
                                    @if ($prof->type1 == 'heur')
                                       <tr>
                                          <td >{{$prof->nom}}</td>
                                          <td>{{$prof->pre}}</td>
                                          <td>{{$prof->fonction}}</td>
                                          <td style="text-align: center"><input type="number" id="test{{$t}}" onkeyup="prof_salaire('{{$t}}', '{{$prof->salaire}}')" value="0" class="form-control"></td>
                                          <td id="ok{{$t}}"> 0 DH</td>
                                          <td>{{$prof->rib}}</td>
                                          <td>{{$item}}</td>
                                          <td>
                                             <div id="hide{{$t}}" style="display: none;" class="custom-control custom-switch custom-switch-icon custom-control-inline">
                                                   <div class="custom-switch-inner">
                                                   <input type="checkbox" onchange="salaire1('{{$prof->id}}','{{url('admin/ajax_add_salaire1')}}','{{$item}}', 'prof', '{{url('admin/salaire')}}', '{{$prof->salaire}}','{{$t}}')" class="custom-control-input" id="customSwitch-1{{$prof->id.$n}}" >
                                                   <label class="custom-control-label" for="customSwitch-1{{$prof->id.$n}}">
                                                   <span class="switch-icon-left"><i class="fa fa-check"></i></span>
                                                   <span class="switch-icon-right"><i class="fa fa-check"></i></span>
                                                   </label>
                                                   </div>
                                             </div>
                                          </td>
                                       </tr>
                                    @else
                                       <tr>
                                          <td >{{$prof->nom}}</td>
                                          <td>{{$prof->pre}}</td>
                                          <td>{{$prof->fonction}}</td>
                                          <td style="text-align: center">---</td>
                                          <td> {{$prof->salaire}} DH</td>
                                          <td>{{$prof->rib}}</td>
                                          <td>{{$item}}</td>
                                          <td>
                                             <div id="hide{{$t}}" class="custom-control custom-switch custom-switch-icon custom-control-inline">
                                                   <div class="custom-switch-inner">
                                                   <input type="checkbox" onchange="salaire1('{{$prof->id}}','{{url('admin/ajax_add_salaire1')}}','{{$item}}', 'prof', '{{url('admin/salaire')}}', '{{$prof->salaire}}','{{$t}}')" class="custom-control-input" id="customSwitch-1{{$prof->id.$n}}" >
                                                   <label class="custom-control-label" for="customSwitch-1{{$prof->id.$n}}">
                                                   <span class="switch-icon-left"><i class="fa fa-check"></i></span>
                                                   <span class="switch-icon-right"><i class="fa fa-check"></i></span>
                                                   </label>
                                                   </div>
                                             </div>
                                          </td>
                                       </tr>
                                    @endif
                                 @endif
                              @endif
                              <?php $n++;
                              $t++; ?>
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