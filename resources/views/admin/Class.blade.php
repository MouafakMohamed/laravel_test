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
                   <h4 class="card-title"> Les classes </h4>
                </div>
             </div>
             <div class="iq-card-body">
                <div id="table" class="table-editable">
                    @error('categorie')
                        <span  style="color: red" role="alert">
                            <strong>{{ $message }}</strong>
                        </span><br>
                    @enderror
                    @error('cycle')
                        <span  style="color: red" role="alert">
                            <strong>{{ $message }}</strong>
                        </span><br>
                    @enderror
                    @error('name')
                        <span  style="color: red" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                   <span class="table-add float-right mb-3 mr-2">
                     <button class="btn btn-primary " data-toggle="modal" data-target="#exampleModalCenter"><b><i
                        class="ri-add-fill"><span class="pl-1">Ajouter un classe</span></b></i>
                     </button>
                   </span>
                   <table class="table table-bordered table-responsive-md table-striped text-center">
                      <thead>
                         <tr>
                            <th>Nom</th>
                            <th>Catégorie</th>
                            <th>Cycle</th>
                            <th>Examens</th>
                            <th>Absences</th>
                            <th style="width: 15%"> Action </th>
                         </tr>
                      </thead>
                      <tbody>
                          @foreach ($classes as $class)
                            <tr style="background-color: white">
                            <td contenteditable="false">{{ $class->name }}</td>
                            <td contenteditable="false">{{ $class->categorie }}</td>
                            <td contenteditable="false" >{{$class->cycle->name }}</td>
                            <td contenteditable="false" >
                                <a href="#" onclick="supprime('{{$class->id}}')" style="font-size: 18px">
                                    <i class="ri-table-line" style="color: rgba(8, 155, 171, 1)"></i>
                                </a>
                                <form action="{{url('admin/exams')}}" method="post" id="logout-form{{$class->id}}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$class->id}}">
                                </form>
                            </td>
                            <td contenteditable="false" >
                                <a href="#" onclick="supprime('{{$class->id}}')" style="font-size: 18px">
                                    <i class="ri-table-line" style="color: rgba(8, 155, 171, 1)"></i>
                                </a>
                                <form action="{{url('admin/Absence')}}" method="post" id="logout-form{{$class->id}}">
                                    @csrf
                                    <input type="hidden" name="date" value="{{date('d-m-Y')}}">
                                    <input type="hidden" name="id" value="{{$class->id}}">
                                </form>
                            </td>
                            <td>
                                <button type="button" class="btn btn-link" style="font-size: 18px">
                                    <a href="{{url('admin/class_profil/'.$class->id)}}"><i class="ri-eye-line" style="color: rgba(8, 155, 171, 1)"></i></a>
                                    <i class="ri-pencil-line" style="color: rgba(8, 157, 173, 1)" data-toggle="modal" data-target="#modifier{{ $class->id }}" ></i>
                                    @if ($class->count == 0)
                                        <i class="ri-delete-bin-2-fill" style="color: rgba(8, 157, 173, 1)" data-toggle="modal" data-target="#delete_class{{$class->id}}" ></i>
                                    @endif
                                </button>
                            </td>
                            </tr>
                          @endforeach
                      </tbody>
                   </table>
                       {{ $classes->links() }}
                </div>
             </div>
             <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                   <div class="modal-content">
                      <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un classe</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                      </div>
                      <form action="{{url('admin/Class')}}" method="post">
                          @csrf
                          <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="cat">Catégorie : *</label>
                                    <select class="form-control" onchange="change1('{{url('admin/ajax_get_cycle_by_categorie')}}')" name="categorie" id="cat">
                                        <option value="">-- choisir la catégorie --</option>
                                        @foreach ($categories as $categorie)
                                            <option value="{{$categorie->id}}"{{ old('categorie') == $categorie->id ? 'selected' : '' }}>{{$categorie->name}}</option>
                                        @endforeach
                                    </select>
                                    
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label for="cycle">Cycles : *</label>
                                    <select class="form-control" name="cycle" id="cycle">
                                        <option value="">-- Choisir un cycle --</option>
                                    </select>
                                    
                                 </div>
                                 <div class="form-group col-md-12">
                                    <label for="lname5">Nom du classe : *</label>
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
            @foreach ($classes as $class)
            <div class="modal fade" id="modifier{{ $class->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                   <div class="modal-content">
                      <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalCenterTitle">Modifier le class</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                      </div>
                      <form action="{{url('admin/Class/edit')}}" method="post">
                          @csrf
                          <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="cat1">Catégorie : *</label>
                                    <select class="form-control" name="categorie" onchange="change111('{{url('admin/ajax_get_cycle_by_categorie')}}', '{{$class->id}}')" id="cat1{{$class->id}}">
                                        @foreach ($categories as $categorie)
                                        @if ($categorie->name == $class->categorie)
                                        <option value="{{$categorie->id}}"{{ old('categorie') == $categorie->id ? 'selected' : '' }}>{{$categorie->name}}</option>
                                        @endif
                                        @endforeach
                                        @foreach ($categories as $categorie)
                                        @if ($categorie->name != $class->categorie)
                                        <option value="{{$categorie->id}}"{{ old('categorie') == $categorie->id ? 'selected' : '' }}>{{$categorie->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    
                                </div>
                                <div class="form-group col-md-12">
                                <label for="cycle1{{$class->id}}">Cycle : *</label>
                                    <select class="form-control" name="cycle" id="cycle1{{$class->id}}">
                                    <option value="{{ $class->cycle->id }}">{{$class->cycle->name}}</option>
                                        @foreach ($cycles as $cycle)
                                            @if ($cycle->id != $class->cycle->id && $cycle->categorie == $class->categorie)
                                                <option value="{{ $cycle->id }}"{{ old('cycle') == $cycle->id ? 'selected' : '' }}>{{$cycle->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="lname5">Nom du classe : *</label>
                                    <input type="text"  name="name" value="{{ $class->name }}" class="form-control">
                                    <input type="hidden" name="id" value="{{ $class->id }}">
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
            <div class="modal fade" id="delete_class{{$class->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                         <a onclick="supprime({{ $class->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                         <form id="logout-form{{ $class->id }}" action="{{ url('admin/delete/Class/'.$class->id)}}" method="POST" style="display: none;">
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