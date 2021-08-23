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
                <div id="table" class="table-editable">
                   <span class="table-add float-right mb-3 mr-2">
                     <button class="btn btn-primary " data-toggle="modal" data-target="#exampleModalCenter"><b><i
                        class="ri-add-fill"><span class="pl-1">Ajouter des devoires</span></b></i>
                     </button>
                   </span>
                    <table id="datatable" class="table table-bordered table-responsive-md table-striped text-center">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>Classes</th>
                                <th style="width: 25 %">desc</th>
                                <th>Fichier</th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exams as $exam)
                            <tr>
                                <td>{{$exam->name}}</td>
                                {{-- <td></td> --}}
                                <td>@foreach ($exam->classes as $class) <a href="#">{{$class->name}}</a> |@endforeach </td>
                                <td>{{$exam->desc}}</td>
                                <td>
                                    @if (!empty($exam->fichier))
                                        <a href="{{url('/prof/download/exam/file/'.$exam->id) }}"><button type="button" class="btn btn-link" style="font-size: 22px"><i class="ri-download-cloud-fill" style="color: rgba(252, 158, 91, 1)"></i></button></a>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-link" style="font-size: 18px">
                                        <i class="ri-settings-4-fill" style="color: rgba(252, 158, 91, 1)" data-toggle="modal" data-target="#modifier{{ $exam->id }}" ></i>
                                        <i class="ri-delete-bin-2-fill" style="color: rgba(216, 74, 69, 1)" data-toggle="modal" data-target="#delete_class{{$exam->id}}" ></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
             </div>
             <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog modal-lg">
                   <div class="modal-content">
                      <div class="modal-header">
                         <h5 class="modal-title">Informations Générales </h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                      </div>
                      <form  method="POST" action="{{url('prof/Examen')}}" enctype="multipart/form-data">
                        @csrf
                      <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Nom : *</label>
                                <input type="text"  name="name" class="form-control" id="name" >
                                @error('name')
                                     <span  style="color: red" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                            </div>
                            {{-- <div class="form-group col-md-6">
                                <label for="date">date : *</label>
                                <input type="date"  name="date" class="form-control" id="date" >
                                @error('date')
                                     <span  style="color: red" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                            </div> --}}
                            <div class="form-group col-md-6">
                                <label for="customFile">File  : (jpeg,png,jpg,gif,svg)*</label>
                                <div class="custom-file">
                                     <input type="file" name="image" class="custom-file-input" id="customFile">
                                     <label class="custom-file-label" for="customFile">Choisir une image</label>
                                </div>
                                @error('image')
                                <span  style="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="class">Classe : *</label><br>
                                @foreach ($classes as $class)
                                    <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
                                        <input type="checkbox" name="class[]" value="{{$class->class_id}}" class="custom-control-input bg-primary" id="customCheck-1{{$class->class_id}}">
                                        <label class="custom-control-label" for="customCheck-1{{$class->class_id}}"> {{$class->class_name}}</label>
                                    </div>
                                @endforeach
                                {{-- <select class="form-control" name="class" id="class">
                                    <option value="">-- Choisir un class --</option>
                                    @foreach ($classes as $class)
                                    <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                                    @endforeach
                                </select> --}}
                                @error('class')
                                    <span  style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                            <label for="desc">description : *</label>
                            <textarea name="desc" class="form-control" id="desc"></textarea>
                            @error('desc')
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
            @foreach ($exams as $exam)
            <div class="modal fade" id="modifier{{ $exam->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                       <div class="modal-header">
                          <h5 class="modal-title">Informations Générales </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                       </div>
                       <form  method="POST" action="{{url('prof/Examen/edit')}}" enctype="multipart/form-data">
                         @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                        <label for="name">Nom : *</label>
                                <input type="text"  name="name" value="{{$exam->name}}" class="form-control" id="name" >
                                        <input type="hidden"  name="id" value="{{$exam->id}}" >
                                        @error('name')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                {{-- <div class="form-group col-md-6">
                                    <label for="date">date : *</label>
                                    <input type="date"  name="date" value="{{$exam->date}}" class="form-control" id="date" >
                                    @error('date')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}
                                <div class="form-group col-md-6">
                                    <label for="customFile">File : *</label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choisir une image</label>
                                    </div>
                                    @error('image')
                                    <span  style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="class">Classe : *</label><br>
                                    @foreach ($classes as $class)
                                    <?php $h = 0; ?>
                                        @foreach ($exam->classes as $class1)
                                            @if ($class1->id == $class->class_id)
                                            <?php $h = 1; ?>
                                            @endif
                                        @endforeach
                                            <div class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
                                                <input type="checkbox" name="class[]" value="{{$class->class_id}}" class="custom-control-input bg-primary" id="customCheck-2{{$exam->id.$class->class_id}}" @if ($h > 0) checked="" @endif>
                                                <label class="custom-control-label" for="customCheck-2{{$exam->id.$class->class_id}}"> {{$class->class_name}}</label>
                                            </div>
                                        @endforeach
                                    @error('class')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="desc">description : *</label>
                                    <textarea name="desc" class="form-control" id="desc">{{$exam->desc}}</textarea>
                                    @error('desc')
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
            <div class="modal fade" id="delete_class{{$exam->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                         <a onclick="supprime({{ $exam->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                         <form id="logout-form{{ $exam->id }}" action="{{ url('prof/delete/exam/'.$exam->id)}}" method="POST" style="display: none;">
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