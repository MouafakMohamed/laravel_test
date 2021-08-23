@extends('admin/layouts.app')
@section('css')
<link rel="stylesheet" href="{{ url('/') }}/css/jquery.dataTables.min.css">
@endsection
@section('js')
<script>
   $(document).ready(function(){
      $('#myTable').DataTable();
      $("#myInput").on("keyup", function() {
         var value = $(this).val().toLowerCase();
         $("#myTable tr").filter(function() {
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
                   <h4 class="card-title"> Contacts </h4>
                </div>
             </div>
             <div class="iq-card-body">
                <div id="table" class="table-editable">
                   <span class="table-add float-right mb-3 mr-2">
                   <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"><b><i
                      class="ri-add-fill"><span class="pl-1">Ajouter</span></i></b>
                   </button>
                   </span>
                    <table class="table table-bordered table-responsive-md table-striped text-center" id="myTable" >
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>E-mail</th>
                                <th>Téléphone</th>
                                <th>Adress</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($visiters as $visiter)
                            <tr>
                                <td>{{$visiter->nom}}</td>
                                <td>{{$visiter->mail}}</td>
                                <td>{{$visiter->tele}}</td>
                                <td>{{$visiter->adress}}</td>
                                <td>
                                    <button type="button" class="btn btn-link" style="font-size: 22px">
                                        <i class="ri-pencil-line" style="color: rgba(8, 157, 173, 1); padding-right: 10px" data-toggle="modal" data-target="#exampleModalCenter{{$visiter->id}}" ></i>
                                        <i class="ri-delete-bin-2-fill" style="color: rgb(8, 157, 173)" data-toggle="modal" data-target="#delete_class{{$visiter->id}}" ></i>
                                    </button>
                                </td>
                                <div class="modal fade" id="delete_class{{$visiter->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                             <a onclick="supprime({{ $visiter->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                                             <form id="logout-form{{ $visiter->id }}" action="{{ url('admin/delete/contact/'.$visiter->id)}}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                          </div>
                                       </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                       {{-- {{ $salles->links() }} --}}
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
                      <form action="{{url('admin/contact')}}" method="post">
                         @csrf
                         <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="nom">Nom : *</label>
                                    <input type="text"  name="nom" class="form-control" id="nom" >
                                    @error('nom')
                                            <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="mail">E-mail : *</label>
                                    <input type="text"  name="mail" class="form-control" id="mail" >
                                    @error('mail')
                                            <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="tele">Téléphone : *</label>
                                    <input type="text"  name="tele" class="form-control" id="tele" >
                                    @error('tele')
                                            <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="adress">Adress : *</label>
                                    <input type="text"  name="adress" class="form-control" id="adress" >
                                    @error('adress')
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
             @foreach ($visiters as $visiter)
             <div class="modal fade" id="exampleModalCenter{{$visiter->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                   <div class="modal-content">
                      <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter une salle</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                      </div>
                      <form action="{{url('admin/contact/edit')}}" method="post">
                         @csrf
                         <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="nom">Nom : *</label>
                                <input type="text" name="nom" value="{{$visiter->nom}}" class="form-control" id="nom" >
                                <input type="hidden" name="id" value="{{$visiter->id}}">
                                    @error('nom')
                                            <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="mail">E-mail : *</label>
                                    <input type="text"  name="mail" value="{{$visiter->mail}}" class="form-control" id="mail" >
                                    @error('mail')
                                            <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="tele">Téléphone : *</label>
                                    <input type="text"  name="tele" value="{{$visiter->tele}}" class="form-control" id="tele" >
                                    @error('tele')
                                            <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="adress">Adress : *</label>
                                    <input type="text"  name="adress" value="{{$visiter->adress}}" class="form-control" id="adress" >
                                    @error('adress')
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
            @endforeach



             {{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
            @endforeach --}}
          </div>
       </div>
    </div>
 </div>
@endsection