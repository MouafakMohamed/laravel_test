@extends('prof/layouts.app')
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
                   <h4 class="card-title"> Les examens </h4>
                </div>
             </div>
             <div class="iq-card-body">
               <div class="row">
                  <div class="form-group col-md-3">
                        <label for="exam">Examen : *</label>
                        <select class="form-control"  onchange="change8('{{url('prof/ajax_get_class_by_exam')}}')" name="exam" id="exam">
                           <option value="">-- Choisir un examen --</option>
                           @foreach ($exams as $exam)
                           <option value="{{$exam->id}}">{{$exam->name}}</option>
                           @endforeach
                        </select>
                        @error('exam')
                           <span  style="color: red" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                  </div>
                  <div class="form-group col-md-3">
                     <label for="class">Classe : *</label>
                     <select class="form-control" onchange="change9('{{url('prof/ajax_get_student_by_exam')}}')" name="class" id="class">
                        
                     </select>
                  </div>
               </div>
                     {{-- <span class="table-add float-right mb-3 mr-2">
                     <button class="btn btn-primary " data-toggle="modal" data-target="#exampleModalCenter"><b><i
                        class="ri-add-fill"><span class="pl-1">Ajouter des devoires</span></b></i>
                     </button>
                     </span> --}}
                  <div class="table-responsive">
                     <table  class="table table-striped table-bordered" >
                        <thead>
                           <tr>
                              <th scope="col">#</th>
                              <th style="text-align: center">l'éléve</th>
                              <th style="width: 30%">La note</th>
                           </tr>
                        </thead>
                        <tbody id="tableBody">
                        </tbody>
                     </table>
                  </div>
               </div>
             </div>
             <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog">
                   <div class="modal-content">
                      <div class="modal-header">
                         <h5 class="modal-title">Informations Générales </h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                      </div>
                      <form  method="POST" action="{{url('prof/Examen/Note')}}" enctype="multipart/form-data">
                        @csrf
                      <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="class">Classe : *</label>
                            <select class="form-control" onchange="change5('{{url('prof/ajax_get_student_by_class')}}')" name="class" id="class">
                                    <option value="">-- Choisir un class --</option>
                                    @foreach ($classes as $class)
                                    <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                                    @endforeach
                                </select>
                                @error('class')
                                     <span  style="color: red" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="eleve">l'éléve : *</label>
                                <select class="form-control" name="eleve" id="eleve">
                                    <option value="">-- Choisir un éléve --</option>
                                </select>
                                @error('eleve')
                                     <span  style="color: red" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exam">Examen : *</label>
                                <select class="form-control" name="exam" id="exam">
                                    <option value="">-- Choisir un examen --</option>
                                    @foreach ($exams as $exam)
                                    <option value="{{$exam->id}}">{{$exam->name}}</option>
                                    @endforeach
                                </select>
                                @error('exam')
                                     <span  style="color: red" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="note">La note : *</label>
                                <input type="text"  name="note" class="form-control" id="note" >
                                @error('note')
                                     <span  style="color: red" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                            </div>
                         </div>
                      </div>
                      <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                         <button type="submit" class="btn btn-primary">Ajouter</button>
                      </div>
                      </form>
                   </div>
                </div>
            </div>
            @foreach ($notes as $note)
            <div class="modal fade" id="delete_class{{$note->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                         <a onclick="supprime({{ $note->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                         <form id="logout-form{{ $note->id }}" action="{{ url('prof/delete/note/'.$note->id)}}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                      </div>
                   </div>
                </div>
            </div>
            @endforeach
          </div>
       </div>
    </div>
 </div>
@endsection