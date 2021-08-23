@extends('admin/layouts.app')
@section('css')

<link rel="stylesheet" href="{{ url('assets/') }}/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ url('assets/') }}/css/buttons.bootstrap4.min.css">

<style>
    .btn-secondary{
	color: #fff;
	background-color: rgba(8, 155, 171, 1);
    border-color: rgba(8, 155, 171, 1);
    background: linear-gradient(to right, rgba(8, 155, 171, 1) 0%, rgba(13, 181, 200, 1) 100%);
}
</style>
@endsection
@section('js')

<script src="{{ url('assets/') }}/js/jquery.dataTables.min.js"></script>
<script src="{{ url('assets/') }}/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ url('assets/') }}/js/dataTables.buttons.min.js"></script>
<script src="{{ url('assets/') }}/js/buttons.bootstrap4.min.js"></script>
<script src="{{ url('assets/') }}/js/jszip.min.js"></script>
<script src="{{ url('assets/') }}/js/pdfmake.min.js"></script>
<script src="{{ url('assets/') }}/js/vfs_fonts.js"></script>
<script src="{{ url('assets/') }}/js/buttons.html5.min.js"></script>
<script src="{{ url('assets/') }}/js/buttons.print.min.js"></script>
<script src="{{ url('assets/') }}/js/buttons.colVis.min.js"></script>

<script>
    $(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf' ]//, 'colvis'
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );
</script>

@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
               <div class="iq-header-title">
                  <h4 class="card-title">Élèves</h4>
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-12">
         <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-body">
               <div class="table-responsive" id="table"  style="overflow-x: hidden;">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th style="text-align: center" >Nom</th>
                            <th style="text-align: center" >Prénom</th>
                            <th style="text-align: center" >CIN</th>
                            <th style="text-align: center" >Téléphone</th>
                            <th style="text-align: center" >Sex</th>
                            <th style="text-align: center" >E-mail</th>
                            <th style="text-align: center" >Fonction</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all as $staff)
                            <tr>
                                <td style="text-align: center">{{$staff->nom}}</td>
                                <td style="text-align: center">{{$staff->pre}}</td>
                                <td style="text-align: center">{{$staff->cin}}</td>
                                <td style="text-align: center">{{$staff->tele}}</td>
                                <td style="text-align: center">{{$staff->sex}}</td>
                                <td style="text-align: center">{{$staff->email}}</td>
                                <td style="text-align: center">{{$staff->fonction}}</td>
                            </tr>
                        @endforeach
                </table>
               </div>
            </div>
         </div> 
      </div>     
   </div>
</div>
@endsection