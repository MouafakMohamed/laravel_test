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
                      class="ri-add-fill"><span class="pl-1">Ajouter une salle</span></i>
                   </button>
                   </span>
                   <table class="table table-bordered table-responsive-md table-striped text-center">
                      <thead>
                         <tr>
                            <th style="width: 50%">Name</th>
                            <th>Modifier</th>
                            <th>Remove</th>
                         </tr>
                      </thead>
                      <tbody>
                          @foreach ($salles as $salle)
                            <tr style="background-color: white">
                            <td contenteditable="false">{{ $salle->name }}</td>
                                <td>
                                    <span class="table-remove"><button type="button" data-toggle="modal" data-target="#modifier{{ $salle->id }}"
                                        class="btn iq-bg-warning btn-rounded btn-sm my-0">Modifier</button></span>
                                </td>
                                <td>
                                    <span class="table-remove"><button type="button" data-toggle="modal" data-target="#exampleModal{{$salle->id}}"
                                        class="btn iq-bg-danger btn-rounded btn-sm my-0">Remove</button></span>
                                </td>
                            </tr>
                          @endforeach
                      </tbody>
                   </table>
                       {{ $salles->links() }}
                </div>
             </div>
             <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                   <div class="modal-content">
                      <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter une salle</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                      </div>
                      <form action="{{url('admin/Salles')}}" method="post">
                          @csrf
                          <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                   <label for="lname5">Nom du salle : *</label>
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
            @foreach ($salles as $salle)
            <div class="modal fade" id="modifier{{ $salle->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                   <div class="modal-content">
                      <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalCenterTitle">Modifier la salle</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                      </div>
                      <form action="{{url('admin/Salles/edit')}}" method="post">
                          @csrf
                          <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="lname5">Nom du salle : *</label>
                                    <input type="text"  name="name" value="{{ $salle->name }}" class="form-control" id="lname5" >
                                    <input type="hidden" name="id" value="{{ $salle->id }}">
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
            <div class="modal fade" id="exampleModal{{$salle->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                         <a onclick="supprime({{ $salle->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                         <form id="logout-form{{ $salle->id }}" action="{{ url('admin/delete/salle/'.$salle->id)}}" method="POST" style="display: none;">
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