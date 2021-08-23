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
                   <h4 class="card-title"> Les salles </h4>
                </div>
             </div>
             <div class="iq-card-body">
                <div id="table" class="table-editable">
                   <span class="table-add float-right mb-3 mr-2">
                   <button class="btn btn-sm iq-bg-success" data-toggle="modal" data-target="#exampleModalCenter"><i
                      class="ri-add-fill"><span class="pl-1">Ajouter un matiere</span></i>
                   </button>
                   </span>
                   <table class="table table-bordered table-responsive-md table-striped text-center">
                      <thead>
                         <tr>
                            <th style="width: 35%">Name</th>
                            <th style="width: 35%">Catégorie</th>
                            <th>Modifier</th>
                            <th>Remove</th>
                         </tr>
                      </thead>
                      <tbody>
                          @foreach ($matieres as $matiere)
                            <tr style="background-color: white">
                            <td contenteditable="false">{{ $matiere->name }}</td>
                            <td contenteditable="false">{{ $matiere->categorie }}</td>
                                <td>
                                    <span class="table-remove"><button type="button" data-toggle="modal" data-target="#modifier{{ $matiere->id }}"
                                        class="btn iq-bg-warning btn-rounded btn-sm my-0">Modifier</button></span>
                                </td>
                                <td>
                                    <span class="table-remove"><button type="button" data-toggle="modal" data-target="#exampleModal{{$matiere->id}}"
                                        class="btn iq-bg-danger btn-rounded btn-sm my-0">Remove</button></span>
                                </td>
                            </tr>
                          @endforeach
                      </tbody>
                   </table>
                       {{ $matieres->links() }}
                </div>
             </div>
             <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                   <div class="modal-content">
                      <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un matiere</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                      </div>
                      <form action="{{url('admin/Matieres')}}" method="post">
                          @csrf
                          <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="lname5">Catégorie : *</label>
                                    <select class="form-control" name="categorie" id="lname5">
                                        <option value="">-- choisir le catégorie --</option>

                                        <option value="préscolaire"{{ old('categorie') == 'préscolaire' ? 'selected' : '' }}>préscolaire</option>

                                        <option value="primaire" {{ old('categorie') == 'primaire' ? 'selected' : '' }}>primaire</option>

                                        <option value="E.collégial" {{ old('categorie') == 'E.collégial' ? 'selected' : '' }}>E.collégial</option>
                                    </select>
                                    @error('categorie')
                                         <span  style="color: red" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label for="lname5">Nom du matiere : *</label>
                                    <input type="text"  name="name" class="form-control" id="lname5" >
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
                             <button type="submit" class="btn btn-primary">Ajouter</button>
                          </div>
                      </form>
                   </div>
                </div>
             </div>
            @foreach ($matieres as $matiere)
            <div class="modal fade" id="modifier{{ $matiere->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                   <div class="modal-content">
                      <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalCenterTitle">Modifier le matiere</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                      </div>
                      <form action="{{url('admin/Matieres/edit')}}" method="post">
                          @csrf
                          <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="lname5">Catégorie : *</label>
                                    <select class="form-control" name="categorie" id="lname5">

                                            <option value="préscolaire"{{ old('categorie') == 'préscolaire' || $matiere->categorie == 'préscolaire' ? 'selected' : '' }}>préscolaire</option>

                                            <option value="primaire" {{ old('categorie') == 'primaire' || $matiere->categorie == 'primaire' ? 'selected' : '' }}>primaire</option>

                                            <option value="E.collégial" {{ old('categorie') == 'E.collégial' || $matiere->categorie == 'E.collégial' ? 'selected' : '' }}>E.collégial</option>
                                    </select>
                                    @error('categorie')
                                         <span  style="color: red" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                </div>
                                 <div class="form-group col-md-12">
                                    <label for="lname5">Nom du matiere : *</label>
                                    <input type="text"  name="name" value="{{ $matiere->name }}" class="form-control" id="lname5" >
                                    <input type="hidden" name="id" value="{{ $matiere->id }}">
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
            <div class="modal fade" id="exampleModal{{$matiere->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                         <a onclick="supprime({{ $matiere->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                         <form id="logout-form{{ $matiere->id }}" action="{{ url('admin/delete/matiere/'.$matiere->id)}}" method="POST" style="display: none;">
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