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
                                <th scope="col"> Image </th>
                                <th scope="col"> Prénom </th>
                                <th scope="col"> Nom </th>
                                <th scope="col"> Massar </th>
                                <th scope="col"> Cycle </th>
                                <th scope="col"> Réinscription </th>
                                <th scope="col"> Supprimer </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                <td class="text-center"><img class="rounded-circle img-fluid avatar-40" src="{{url($student->image)}}" alt="profile"></td>
                                <td>{{$student->pre}}</td>
                                <td>{{$student->nom}}</td>
                                <td>{{$student->id1}}</td>
                                <td>{{$student->cycle}}</td>
                                <td>
                                    <button type="button" class="btn btn-link" style="font-size: 22px">
                                        <a href="{{url('admin/reinscription/'.$student->id)}}"><i class="ri-restart-line"></i></a>
                                    </button>
                                </td>
                                <td> <button type="button" class="btn btn-link" style="font-size: 22px"><i class="ri-delete-bin-2-fill" style="color: rgba(8, 155, 171, 1)"  data-toggle="modal" data-target="#exampleModal{{$student->id}}" ></i></button></td>
                                </tr>
                                <div class="modal fade" id="exampleModal{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <a onclick="supprime({{ $student->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                                            <form id="logout-form{{ $student->id }}" action="{{ url('admin/delete/parent/'.$student->id)}}" method="POST" style="display: none;">
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