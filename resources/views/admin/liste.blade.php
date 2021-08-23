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
                  <h4 class="card-title">Liste D'achat</h4>
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
                           <th scope="col">numéro d'opération</th>
                            <th scope="col"> Date </th>
                            <th scope="col"> Produit </th>
                            <th scope="col"> Quantité </th>
                            <th scope="col"> Prix</th>
                            <th scope="col"> Utilisateur</th>
                            {{-- <th scope="col"> Supprimer</th> --}}
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($listes as $liste)
                        <tr>
                            <td style="text-align: center">{{$liste->id}}</td>
                            <td>{{$liste->created_at}}</td>
                            <td>{{$liste->name}}</td>
                            <td>{{$liste->quantité}}</td>
                            <td>{{$liste->prix}} DH</td>
                            <td>{{$liste->user}} </td>
                           {{-- <td>
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
                           <td><span class="badge badge-success">Payé</span></td>
                            <td>
                              <button type="button" class="btn btn-link" style="font-size: 22px">
                                 <a href="{{url('admin/parent/profil/'.$parent->id)}}"><i class="ri-eye-line"></i></a>
                             </button>
                           </td> --}}
                           {{-- <td> <button type="button" class="btn btn-link" style="font-size: 22px"><i class="ri-delete-bin-2-fill" style="color: rgba(216, 74, 69, 1)"  data-toggle="modal" data-target="#exampleModal{{$liste->id}}" ></i></button></td> --}}
                        </tr>
                        {{-- <div class="modal fade" id="exampleModal{{$parent->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        </div> --}}
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