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
                   <h4 class="card-title"> Les visites </h4>
                </div>
             </div>
             <div class="iq-card-body">
                <div id="table" class="table-editable">
                   <span class="table-add float-right mb-3 mr-2">
                   <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl"><b><i
                      class="ri-add-fill"><span class="pl-1">Ajouter</span></i></b>
                   </button>
                   </span>
                    <table class="table table-bordered table-responsive-md table-striped text-center" id="myTable">
                        <thead>
                            <tr>
                                <th>date</th>
                                <th>Entrer</th>
                                <th>Sortir</th>
                                <th>Nom</th>
                                <th>Objectif</th>
                                <th>Cin</th>
                                <th>Téléphone</th>
                                <th>Document</th>
                                <th style="width: 5%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($visiters as $visiter)
                            <tr>
                                <td>{{$visiter->date}}</td>
                                <td>{{$visiter->time1}}</td>
                                <td>{{$visiter->time2}}</td>
                                <td>{{$visiter->nom}}</td>
                                <td>{{$visiter->objectif}}</td>
                                <td>{{$visiter->cin}}</td>
                                <td>{{$visiter->tele}}</td>
                                <td>
                                @if ($visiter->image != "")
                                <a href="{{url('admin/download/visiter/image/'.$visiter->id)}}"><b style="color:red">Document</b></a>
                                @endif    
                                </td>
                                <td>
                                    <button type="button" class="btn btn-link" style="font-size: 22px">
                                    <i class="ri-delete-bin-2-fill" style="color: rgb(240, 53, 47)" data-toggle="modal" data-target="#delete_class{{$visiter->id}}" ></i>
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
                                             <form id="logout-form{{ $visiter->id }}" action="{{ url('admin/delete/visite/'.$visiter->id)}}" method="POST" style="display: none;">
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
            <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"   aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> Ajouter </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  <form action="{{url('admin/visites')}}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="objectif" style="margin-bottom: .1rem;">Objectif : *</label>
                                <input type="text" name="objectif" value="{{ old('objectif') }}" class="form-control" id="objectif" placeholder="..."  required>
                                @error('objectif')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cin" style="margin-bottom: .1rem;">CIN : *</label>
                                <input type="text" name="cin" value="{{ old('cin') }}" class="form-control" id="cin" placeholder="..." required>
                                @error('cin')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nom" style="margin-bottom: .1rem;">Nom compléte : *</label>
                                <input type="text" name="nom" value="{{ old('nom') }}" class="form-control" id="nom" placeholder="..." required>
                                @error('nom')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                               <label for="tele" style="margin-bottom: .1rem;">Téléphone : *</label>
                               <input type="text" name="tele" value="{{ old('tele') }}" class="form-control" id="tele" placeholder="06..." required>
                               @error('tele')
                                    <span  style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                               <label for="date" style="margin-bottom: .1rem;">Date : *</label>
                               <input type="date" name="date" value="{{ date('Y-m-d') }}" disabled class="form-control" id="date" placeholder="..." required>
                               @error('date')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                              @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="time1" style="margin-bottom: .1rem;">Temps d'Entrer : *</label>
                                <input type="time" name="time1" value="{{ old('time1') }}" class="form-control" id="time1" required>
                                @error('time1')
                                          <span  style="color: red" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="time2" style="margin-bottom: .1rem;">Temps de Sortir : *</label>
                                <input type="time" name="time2" value="{{ old('time2') }}" class="form-control" id="time2" required>
                                @error('time2')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="image">Document : *</label>
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
                            <div class="form-group col-md-6">
                               <label for="note" style="margin-bottom: .1rem;">Note : *</label>
                               <textarea type="text" name="note" value="{{ old('note') }}" class="form-control" id="note" ></textarea>
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
          </div>
       </div>
    </div>
 </div>
@endsection