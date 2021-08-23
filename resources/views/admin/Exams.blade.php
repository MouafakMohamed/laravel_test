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
 
    table.buttons().container().appendTo( '#example_wrapper .col-md-6:eq(0)' );
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
                  <h4 class="card-title">{{$class->name}}</h4>
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-12">
         <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-body">
                <div class="col-md-3" style="padding: 5px">
                    <form action="{{url('admin/exams')}}" method="post" id="logout-form1">
                        @csrf
                        <select name="exam" id="" onchange="supprime('1')" class="form-control">
                            <option value="" >Choisir un éxamen</option>
                            @foreach ($exams as $exam)
                                <option value="{{$exam->exam->id}}">{{$exam->exam->name}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="id" value="{{$class->id}}">
                    </form>
                </div><br>
               <div class="table-responsive" id="table"  style="overflow-x: hidden;">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th style="text-align: center" >#</th>
                            <th style="text-align: center" >Prénom</th>
                            <th style="text-align: center" >Nom</th>
                            <th style="text-align: center" >note</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td style="text-align: center">{{$student->class_num}}</td>
                                <td style="text-align: center">{{$student->pre}}</td>
                                <td style="text-align: center">{{$student->nom}}</td>
                                <td style="text-align: center">{{$student->note}}</td>
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