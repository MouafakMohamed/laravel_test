@extends('prof/layouts.app')
{{-- @section('css')
<style>
        @media print { 
               .hide { 
                  display: none
               } 
            } 
</style>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.12.2/printThis.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.1/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.4/jspdf.plugin.autotable.min.js"></script>

<script>
    function createPDF() {
        var doc = new jsPDF('p', 'pt', 'a4');
        var table = document.getElementById('datatable');
        doc.autoTable({ html: table });
        doc.save('table.pdf');
        

    }
</script>
@endsection --}}
@section('content')
<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12">
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <center><h4 class="card-title">{{ $class->name }}</h4></center>
                </div>
             </div>
             <div class="iq-card-body">
                  {{-- <div class="d-block" style="float: right ;padding: 10px">
                     <div class="btn-group mt-3" role="group" aria-label="Basic example">
                        <button type="button" onclick="createPDF();" class="btn btn-primary">PDF</button>
                        <button type="button" onclick="exportF(this)" class="btn btn-warning">EXCEL</button>
                        <button type="button" class="btn btn-danger">CSV</button>
                     </div>
                  </div> --}}
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" >
                        <thead>
                            <tr>
                                <th class="hide" style="text-align: center">Image</th> 
                                <th style="text-align: center">Nom et prénom</th>
                                <th style="text-align: center">Massar</th>
                                <th style="text-align: center">Sexe</th>
                                <th style="text-align: center">Numéro</th>
                                {{-- <th class="hide" style="width: 8px; text-align: center">Modifier</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td style="text-align: center">
                                       <a href="{{url('prof/eleve/profil/'.$student->id)}}"><img class="img-fluid avatar-40 rounded-circle" title="{{ $student->nom.' '.$student->pre }}" src="{{url($student->image)}}" alt=""></a></td>
                                    <td style="text-align: center">{{ $student->nom.' '.$student->pre }}</td>
                                    <td style="text-align: center">{{ $student->id1 }}</td>
                                    <td style="text-align: center">{{ $student->sex }}</td>
                                    <td style="text-align: center">{{ $student->class_num }}</td>
                                    {{-- <td style="text-align: center">
                                        <button type="button" class="btn btn-link" style="font-size: 18px">
                                            <i class="ri-settings-4-fill pr-0" style="color: rgba(252, 158, 91, 1)" data-toggle="modal" data-target="#modifier{{ $student->id }}"></i>
                                         </button>
                                    </td> --}}
                                </tr>
                                <div class="modal fade" id="modifier{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <h5 class="modal-title" id="exampleModalCenterTitle">Modifier la salle</h5>
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                          </div>
                                          <form action="{{url('prof/Class/profil/edit')}}" method="post">
                                             @csrf
                                             <div class="modal-body">
                                                <div class="row">
                                                   <div class="form-group col-md-12">
                                                      <label for="lname5">Numéro : *</label>
                                                      <input type="number" min="1" name="class_num" value="{{ $student->class_num }}" class="form-control" id="lname5" >
                                                      <input type="hidden" name="id" value="{{ $student->id }}">
                                                      <input type="hidden" name="class" value="{{ $class->id }}">
                                                      @error('name')
                                                            <span  style="color: red" role="alert">
                                                               <strong>{{ $message }}</strong>
                                                            </span>
                                                      @enderror
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-primary">Modifier</button>
                                             </div>
                                          </form>
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