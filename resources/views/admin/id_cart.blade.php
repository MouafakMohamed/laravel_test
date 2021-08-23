@extends('admin/layouts.app')
@section('css')
<link rel="stylesheet" href="{{ url('/') }}/css/jquery.dataTables.min.css">
<style>
    .hide{
        display: none;
    }
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
                            <h4 class="card-title">Smart Cart</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive" id="table"  style="overflow-x: hidden;">
                            <table id="datatable" style="width: 100%" class="table table-striped table-bordered"">
                                <thead>
                                    <tr>
                                        <th style="text-align: center" scope="col">Nom</th>
                                        <th style="text-align: center" scope="col"> Prénom </th>
                                        <th style="text-align: center" scope="col"> Massar </th>
                                        <th style="text-align: center" scope="col"> Catégorie</th>
                                        <th style="text-align: center" scope="col"> Class</th>
                                        <th style="text-align: center">Voir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td style="text-align: center">{{$student->nom}}</td>
                                            <td style="text-align: center">{{$student->pre}}</td>
                                            <td style="text-align: center">{{$student->id1}}</td>
                                            <td style="text-align: center">{{$student->categorie}}</td>
                                            <td style="text-align: center">{{$student->class}}</td>
                                            @if ($student->sex == 'Fille')
                                            <td style="text-align: center"><a href="{{url('admin/Etudiant/Id_card/'.$student->id)}}" style="color: rgba(240, 147, 224, 1); font-size: 23px"><i class="ri-eye-line pr-0"></i></a></td>
                                            @endif
                                            @if ($student->sex == 'Garçon')
                                            <td style="text-align: center"><a href="{{url('admin/Etudiant/Id_card/'.$student->id)}}" style="color: rgba(2, 209, 255, 1); font-size: 23px"><i class="ri-eye-line pr-0"></i></a></td>
                                            @endif
                                        </tr>
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