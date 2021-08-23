@extends('admin/layouts.app1')
@section('css')
@endsection
@section('js')
@endsection

@section('content')
   <div class="container-fluid">
      @error('name')
         <span  style="color: red" role="alert">
            <strong>{{ $message }}</strong>
         </span><br>
      @enderror
      @error('categorie')
         <span  style="color: red" role="alert">
            <strong>{{ $message }}</strong>
         </span>
      @enderror
      <div class="row">
         <span class="table-add float-right mb-3 mr-2">
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleCycle"><b><i
               class="ri-add-fill"><span class="pl-1">Ajouter un cycle </span></i></b>
            </button>
         </span>
         <span class="table-add float-right mb-3 mr-2">
            <button class="btn btn-success" data-toggle="modal" data-target="#exampleCategorie"><b><i
               class="ri-add-fill"><span class="pl-1">Ajouter une catégorie</span></i></b>
            </button>
         </span>
         @foreach ($categories as $categorie)
            <div class="col-sm-12">
               <div class="iq-card">
                  <div class="iq-card-header d-flex justify-content-between">
                     <div class="iq-header-title">
                        <h4 class="card-title"> {{$categorie->name}} 
                           <i class="ri-pencil-line pr-0" style="color: rgba(8, 157, 173, 1); padding-left: 20px" data-toggle="modal" data-target="#modifiercategorie{{ $categorie->id }}"></i>
                           @if ($categorie->count == 0)
                           <i class="ri-delete-bin-2-fill pr-0" style="color: rgba(8, 157, 173, 1)" data-toggle="modal" data-target="#deletecategorie{{$categorie->id}}"></i></h4>
                           @endif
                     </div>
                  </div>
                  <div class="iq-card-body">
                     <div id="table" class="table-editable">
                        <table class="table table-bordered table-responsive-md table-striped text-center">
                           <thead>
                              <tr>
                                 <th style="width: 35%">Catégorie</th>
                                 <th style="width: 35%">Name</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($cycles as $cycle)
                              @if ($cycle->categorie == $categorie->name)
                              <tr style="background-color: white">
                                 <td contenteditable="false">{{ $cycle->categorie }}</td>
                                 <td contenteditable="false">{{ $cycle->name }}</td>
                                 <td>
                                    <button type="button" class="btn btn-link" style="font-size: 18px">
                                       <i class="ri-pencil-line pr-0" style="color: rgba(8, 157, 173, 1)" data-toggle="modal" data-target="#modifiercycle{{ $cycle->id }}"></i>
                                       @if ($cycle->count == 0)
                                          <i class="ri-delete-bin-2-fill pr-0" style="color: rgba(8, 157, 173, 1)" data-toggle="modal" data-target="#deletecycle{{$cycle->id}}"></i>
                                       @endif
                                    </button>
                                 </td>
                              </tr>
                              @endif
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="modal fade" id="modifiercategorie{{ $categorie->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Modifier le nom du catégorie</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <form action="{{url('admin/Categorie/edit')}}" method="post">
                              @csrf
                              <div class="modal-body">
                                 <div class="row">
                                    <div class="form-group col-md-12">
                                       <label for="lname5">Nom du catégorie : *</label>
                                       <input type="text"  name="name" value="{{ $categorie->name }}" class="form-control" id="lname5" >
                                       <input type="hidden" name="id" value="{{ $categorie->id }}">
                                       
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
               <div class="modal fade" id="deletecategorie{{$categorie->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Supprimer le cycle !</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <h4> Êtes-vous sûr ?</h4>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
                              <a onclick="supprime({{ $categorie->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                              <form id="logout-form{{ $categorie->id }}" action="{{ url('admin/delete/categorie/'.$categorie->id)}}" method="POST" style="display: none;">
                                 @csrf
                                 @method('DELETE')
                              </form>
                           </div>
                        </div>
                     </div>
               </div>
            </div>
            @endforeach
            <div class="modal fade" id="exampleCycle" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un cycle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <form action="{{url('admin/Cycles')}}" method="post">
                        @csrf
                        <div class="modal-body">
                           <div class="row">
                              <div class="form-group col-md-12">
                                 <label for="lname5">Catégorie : *</label>
                                 <select class="form-control" name="categorie" id="lname5">
                                       <option value="">-- choisir le catégorie --</option>
                                       @foreach ($categories as $categorie)
                                          <option value="{{$categorie->id}}"{{ old('categorie') == $categorie->name ? 'selected' : '' }}>{{$categorie->name}}</option>
                                       @endforeach
                                 </select>
                                 
                              </div>
                              <div class="form-group col-md-12">
                                 <label for="lname5">Nom du cycle : *</label>
                                 <input type="text"  name="name" class="form-control" id="lname5" >
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
            <div class="modal fade" id="exampleCategorie" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter une catégorie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <form action="{{url('admin/Categorie')}}" method="post">
                        @csrf
                        <div class="modal-body">
                           <div class="row">
                              <div class="form-group col-md-12">
                                 <label for="lname5">Nom du catégorie : *</label>
                                 <input type="text"  name="name" class="form-control" id="lname5" >
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
            @foreach ($cycles as $cycle)
            <div class="modal fade" id="modifiercycle{{ $cycle->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalCenterTitle">Modifier le cycle</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <form action="{{url('admin/Cycles/edit')}}" method="post">
                           @csrf
                           <div class="modal-body">
                              <div class="row">
                                 <div class="form-group col-md-12">
                                    <label for="lname5">Catégorie : *</label>
                                    <select class="form-control" name="categorie" id="lname5">
                                             @foreach ($categories as $categorie)
                                                <option value="{{$categorie->id}}"{{ old('categorie') == $categorie->name || $cycle->categorie == $categorie->id ? 'selected' : '' }}>{{$categorie->name}}</option>
                                             @endforeach
                                    </select>
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label for="lname5">Nom du cycle : *</label>
                                    <input type="text"  name="name" value="{{ $cycle->name }}" class="form-control" id="lname5" >
                                    <input type="hidden" name="id" value="{{ $cycle->id }}">
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
            <div class="modal fade" id="deletecycle{{$cycle->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Supprimer le cycle !</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <h4> Êtes-vous sûr ?</h4>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
                           <a onclick="supprime({{ $cycle->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                           <form id="logout-form{{ $cycle->id }}" action="{{ url('admin/delete/cycle/'.$cycle->id)}}" method="POST" style="display: none;">
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
@endsection