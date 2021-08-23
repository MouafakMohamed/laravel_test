@extends('admin/layouts.app')
@section('css')

@endsection
@section('js')
<script>
    
    
 </script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12">
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title"> Les devoires </h4>
                </div>
             </div>
             <div class="iq-card-body">
                <div id="table" class="table-editable">
                   <span class="table-add float-right mb-3 mr-2">
                     <button class="btn btn-primary " data-toggle="modal" data-target="#exampleModalCenter"><b><i
                        class="ri-add-fill"><span class="pl-1">Ajouter des devoires</span></b></i>
                     </button>
                   </span>
                   <table class="table table-bordered table-responsive-md table-striped text-center">
                      <thead>
                         <tr>
                            <th>Class</th>
                            <th>Matiére</th>
                            <th>Date</th>
                            <th>Date de remise</th>
                            <th>desc</th>
                            <th>Fichier</th>
                            <th style="width: 10%"> Action </th>
                         </tr>
                      </thead>
                      <tbody>
                          @foreach ($devoires as $devoire)
                            <tr style="background-color: white">
                            <td contenteditable="false">{{ $devoire->class->name }}</td>
                            <td contenteditable="false">{{ $devoire->matiere->name }}</td>
                            <td contenteditable="false" >{{$devoire->date1 }}</td>
                            <td contenteditable="false" >{{$devoire->date2 }}</td>
                            <td contenteditable="false" >{{$devoire->desc }}</td>
                            <td contenteditable="false" >
                                @if (!empty($devoire->image))
                                    <a href="{{url('/admin/download/devoire/file/'.$devoire->id) }}"><button type="button" class="btn btn-link" style="font-size: 22px"><i class="ri-download-cloud-fill" style="color: rgba(8, 155, 171, 1)"></i></button></a>
                                    @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-link" style="font-size: 18px">
                                    <i class="ri-pencil-line" style="color: rgba(8, 157, 173, 1)" data-toggle="modal" data-target="#modifier{{ $devoire->id }}" ></i>
                                    <i class="ri-delete-bin-2-fill" style="color: rgba(8, 157, 173, 1)" data-toggle="modal" data-target="#delete_class{{$devoire->id}}" ></i></button>
                            </td>
                            </tr>
                          @endforeach
                      </tbody>
                   </table>
                       {{ $devoires->links() }}
                </div>
             </div>
             <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog modal-lg">
                   <div class="modal-content">
                      <div class="modal-header">
                         <h5 class="modal-title">Ajouter des devoires </h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                      </div>
                      <form  method="POST" action="{{url('admin/Devoires')}}" enctype="multipart/form-data">
                        @csrf
                      <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="cat">Catégorie : *</label>
                                <select class="form-control" onchange="change1('{{url('admin/ajax_get_cycle_by_categorie')}}');change4('{{url('admin/ajax_get_matiere_by_categorie')}}') " name="categorie" id="cat">
                                    @empty(old('categorie'))
                                        <option selected="" disabled="">-- Catégorie -- </option>
                                    @endempty
                                    @foreach ($categories as $categorie)
                                        <option value="{{$categorie->id}}"{{ old('categorie') == $categorie->id ? 'selected' : '' }}>{{$categorie->name}}</option>
                                    @endforeach
                                </select>
                                @error('categorie')
                                     <span  style="color: red" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                             <div class="form-group col-md-6">
                                <label for="cycle">Cycles : *</label>
                                <select class="form-control" onchange="change2('{{url('admin/ajax_get_class_by_cycle')}}')" name="cycle" id="cycle">
                                    <option value="">-- Choisir un cycle --</option>
                                </select>
                                @error('cycle')
                                     <span  style="color: red" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                             <div class="form-group col-md-6">
                                <label for="class">Classe : *</label>
                                <select class="form-control" name="class" id="class">
                                    <option value="">-- Choisir un class --</option>
                                </select>
                                @error('class')
                                     <span  style="color: red" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                             <div class="form-group col-md-6">
                                <label for="matiere">matiere : *</label>
                                <select class="form-control" name="matiere" id="matiere">
                                    <option  selected="" disabled=""> -- Choisir une matiere -- </option>
                                    @foreach ($matieres as $matiere)
                                        <option value="{{$matiere->id}}" >{{$matiere->name}}</option>
                                    @endforeach
                                </select>
                                @error('matiere')
                                     <span  style="color: red" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                             <div class="form-group col-md-6">
                                <label for="date">date : *</label>
                                <input type="date"  name="date" class="form-control" id="date" >
                                @error('date')
                                     <span  style="color: red" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                             <div class="form-group col-md-6">
                                 <label for="customFile">image : *</label>
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
                            <div class="form-group col-md-12">
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
            @foreach ($devoires as $devoire)
            <div class="modal fade" id="modifier{{ $devoire->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                   <div class="modal-content">
                      <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalCenterTitle">Modifier le devoire</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                      </div>
                      <form action="{{url('admin/deviore/edit')}}" method="post"  enctype="multipart/form-data">
                          @csrf
                          <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="date1">Date : *</label>
                                    <input type="text"  name="date" value="{{ $devoire->date2 }}" class="form-control" id="date1" >
                                    <input type="hidden" name="id" value="{{ $devoire->id }}">
                                    @error('date')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="desc1">description : *</label>
                                <textarea name="desc" class="form-control" id="desc1">{{$devoire->desc}}</textarea>
                                    @error('desc')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="customFile1">image : *</label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="customFile1">
                                        <label class="custom-file-label" for="customFile1">Choisir une image</label>
                                       </div>
                                       @error('image')
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
            <div class="modal fade" id="delete_class{{$devoire->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                         <a onclick="supprime({{ $devoire->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                         <form id="logout-form{{ $devoire->id }}" action="{{ url('admin/delete/devoire/'.$devoire->id)}}" method="POST" style="display: none;">
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