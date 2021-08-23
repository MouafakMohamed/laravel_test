@extends('admin/layouts.app')
@section('css')
<link rel="stylesheet" href="{{ url('/') }}/css/jquery.dataTables.min.css">
@endsection
@section('js')
<script>
   $(document).ready(function(){
      $('#myTable').DataTable();
      $("#myInput").on("keyup", function() {
         var value = $(this).val().toLowerCase();
         $("#myTable tr").filter(function() {
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
                  <h4 class="card-title">Parents</h4>
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-12">
         <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-body">
               <div class="table-responsive" id="table"  style="overflow-x: hidden;">
                  <table id="myTable" style="width: 100%" class="table mb-0 table-borderless">
                     <thead>
                        <tr>
                           <th scope="col"> Image</th>
                           <th scope="col"> Nom et prénom </th>
                           <th scope="col"> les éléves</th>
                           <th scope="col"> Frais</th>
                           <th scope="col"> Profil</th>
                           <th scope="col"> Supprimer</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($parents as $parent)
                        <tr>
                           <td class="text-center"><img class="rounded-circle img-fluid avatar-40" src="{{url($parent->image)}}" alt="profile"></td>
                           <td>{{$parent->nom.' '.$parent->pre}}</td>
                           <td>
                              <div class="iq-media-group">
                                 @foreach ($students as $student)
                                    @if ($student->parent == $parent->id)
                                       <a href="{{url('admin/eleve/profil/'.$student->id)}}" class="iq-media">
                                       <img class="img-fluid avatar-40 rounded-circle" title="{{ $student->nom.' '.$student->pre }}" src="{{url($student->image)}}" alt="">
                                       </a>
                                    @endif
                                 @endforeach
                              </div>
                           </td>
                           <td>
                              @foreach ($students as $student)
                                    @if ($student->parent == $parent->id)
                                       <?php $ok = 'ok'; ?>
                                       @if ($student->mois != 'rien') <?php $ok = 'non' ?> @endif
                                    @endif
                                 @endforeach
                              @if ($ok == 'ok')
                                 <span class="badge badge-success">Payé</span>
                              @else
                                 <span class="badge badge-danger">non payé</span>
                              @endif
                           </td>
                           <td>
                              <button type="button" class="btn btn-link" style="font-size: 22px">
                                 <a href="{{url('admin/parent/profil/'.$parent->id)}}"><i class="ri-eye-line"></i></a>
                             </button>
                           </td>
                           <td> <button type="button" class="btn btn-link" style="font-size: 22px"><i class="ri-delete-bin-2-fill" style="color: rgba(8, 155, 171, 1)"  data-toggle="modal" data-target="#exampleModal{{$parent->id}}" ></i></button></td>
                        </tr>
                        <div class="modal fade" id="exampleModal{{$parent->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Supprimer !</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                 <div class="modal-body">
                                    <h4> Êtes-vous sûr ?</h4>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
                                    <a onclick="supprime({{ $parent->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                                    <form id="logout-form{{ $parent->id }}" action="{{ url('admin/delete/parent/'.$parent->id)}}" method="POST" style="display: none;">
                                       @csrf
                                       @method('DELETE')
                                   </form>
                                 </div>
                              </div>
                           </div>
                        </div>
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