@extends('admin/layouts.app')
@section('css')

@endsection
@section('js')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12">
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Bibliothèque</h4>
                </div>
             </div>
          </div>
       </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
           <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">table des livres</h4>
                    </div>
                    <span class="table-add float-right pt-3 mb-3 mr-2">
                    <button class="btn btn-primary " data-toggle="modal" data-target="#exampleModalCenter"><b><i
                       class="ri-add-fill"><span class="pl-1">Ajouter un livre</span></b></i>
                    </button>
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered"">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Informations Générales </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form  method="POST" action="{{url('admin/biblio')}}" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="livre">Nom de livre : *</label>
                                            <input type="text" class="form-control" name="name" id="livre">
                                                @error('name')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="matiere">Matiére : *</label>
                                            <input type="text" class="form-control" name="matiere" id="matiere">
                                                @error('matiere')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="customFile">Livre (pdf) : *</label>
                                            <div class="custom-file">
                                                <input type="file" name="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choisir une pdf</label>
                                            </div>
                                            @error('file')
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
                    </span>
                </div>
                <div class="iq-card-body">
                    <div class="table-responsive">
                        <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Matiére</th>
                                {{-- <th scope="col">Ajouter par</th> --}}
                                <th scope="col">Date d'ajoute</th>
                                <th scope="col" style="width: 15%">Télécharger</th>
                                <th scope="col" style="width: 15%">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($biblios as $biblio)
                                <tr>
                                    <td>{{$biblio->name}}</td>
                                    <td>{{$biblio->matiere}}</td>
                                    <td>{{$biblio->date}}</td>
                                    <td>
                                        <a href="{{url('/admin/download/book/'.$biblio->id) }}">
                                            <button type="button" class="btn btn-link" style="font-size: 22px">
                                                <i class="ri-download-cloud-fill" style="color: rgba(8, 157, 173, 1)"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-link" style="font-size: 22px">
                                            <i class="ri-delete-bin-2-fill" style="color: rgb(8, 157, 173)" data-toggle="modal" data-target="#delete_class{{$biblio->id}}" ></i>
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="delete_class{{$biblio->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                             <a onclick="supprime({{ $biblio->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                                             <form id="logout-form{{ $biblio->id }}" action="{{ url('admin/delete/biblio/'.$biblio->id)}}" method="POST" style="display: none;">
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