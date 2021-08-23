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
                   <h4 class="card-title"> Les Clubs </h4>
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
                                <th>Image</th>
                                <th>Nom</th>
                                <th>professeur</th>
                                <th>étudiants</th>
                                <th style="width: 15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clubs as $club)
                            <tr>
                                <td>
                                    <a href="{{url('admin/club_profil/'.$club->id)}}">
                                        <img class="img-fluid avatar-80" title="{{ $club->nom }}" src="{{url($club->image)}}" alt="">
                                    </a>
                                </td>
                                <td>{{$club->name}}</td>
                                <td>{{$club->prof}}</td>
                                <td>{{$club->students}}</td>
                                <td>
                                    <button type="button" class="btn btn-link" style="font-size: 22px">
                                        <i class="ri-pencil-line" style="color: rgba(8, 157, 173, 1); padding-right: 10px" data-toggle="modal" data-target="#exampleModalCenter{{$club->id}}" ></i>
                                        <i class="ri-delete-bin-2-fill" style="color: rgb(8, 157, 173)" data-toggle="modal" data-target="#delete_class{{$club->id}}" ></i>
                                    </button>
                                </td>
                                <div class="modal fade" id="delete_class{{$club->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                             <a onclick="supprime({{ $club->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                                             <form id="logout-form{{ $club->id }}" action="{{ url('admin/delete/club/'.$club->id)}}" method="POST" style="display: none;">
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
                      <form action="{{url('admin/club')}}" method="post" enctype="multipart/form-data">
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
                                    <label for="prof">Professeur : *</label>
                                    <select name="prof" class="form-control" id="prof">
                                            <option value=""> -- Professeur -- </option>
                                        @foreach ($profs as $prof)
                                            <option value="{{$prof->id}}">{{$prof->nom.' '.$prof->pre}}</option>
                                        @endforeach
                                    </select>
                                    @error('prof')
                                            <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="image">Image : *</label>
                                    <div class="form-group">
                                       <div class="custom-file">
                                          <input type="file" name="image" class="custom-file-input" id="customFile">
                                          <label class="custom-file-label" for="customFile">Choisis une image</label>
                                       </div>
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
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                         </div>
                      </form>
                   </div>
                </div>
             </div>
             @foreach ($clubs as $club)
                <div class="modal fade" id="exampleModalCenter{{$club->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter une salle</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <form action="{{url('admin/club/edit')}}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-body">
                                 <div class="row">
                                     <div class="form-group col-md-12">
                                         <label for="nom">Nom : *</label>
                                     <input type="text" name="nom" value="{{$club->name}}" class="form-control" id="nom" >
                                     <input type="hidden" name="id" value="{{$club->id}}" >
                                         @error('nom')
                                                 <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                                 </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-12">
                                         <label for="prof">Professeur : *</label>
                                         <select name="prof" class="form-control" id="prof">
                                            @foreach ($profs as $prof)
                                                @if ($prof->id == $club->prof)
                                                    <option value="{{$prof->id}}">{{$prof->nom.' '.$prof->pre}}</option>
                                                @endif
                                            @endforeach
                                            @foreach ($profs as $prof)
                                                @if ($prof->id != $club->prof)
                                                    <option value="{{$prof->id}}">{{$prof->nom.' '.$prof->pre}}</option>
                                                @endif
                                             @endforeach
                                         </select>
                                         @error('prof')
                                                 <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                                 </span>
                                         @enderror
                                     </div>
                                     <div class="col-md-12">
                                         <label for="image">Image : *</label>
                                         <div class="form-group">
                                            <div class="custom-file">
                                               <input type="file" name="image" class="custom-file-input" id="customFile">
                                               <label class="custom-file-label" for="customFile">Choisis une image</label>
                                            </div>
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
