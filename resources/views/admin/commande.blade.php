@extends('admin/layouts.app')
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
                  <h4 class="card-title">Liste D'achat</h4>
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-12">
         <div class="iq-card">
            <form action="{{url('admin/stock_commande/ajouter')}}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="row" style="padding: 10px">
                  <div class="form-group col-md-3">
                     <label for="pro">Choisir Produit : *</label>
                        <input list="browsers" class="form-control" name="pro" id="pro">
                        <datalist id="browsers">
                           @foreach ($produits as $produit)
                              <option value="{{$produit->name}}"></option>
                           @endforeach
                        </datalist>
                      @error('pro')
                              <span  style="color: red" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                      @enderror
                  </div>
                  <div class="form-group col-md-3">
                     <label for="fonction">Fonction : *</label>
                     <select name="fonction" onchange="get_grh('{{url('admin/ajax_get_grh_by_fonction')}}')" class="form-control" id="fonction">
                        !@empty(old('fonction'))
                              <option value="">Choisir une fonction</option>
                        @endempty
                        <option value="administration" {{ old('fonction') == 'administration' ? 'selected' : '' }}> Administration </option>
                        <option value="Professeur" {{ old('fonction') == 'Professeur' ? 'selected' : '' }}> Professeur </option>
                        <option value="Staff" {{ old('fonction') == 'Staff' ? 'selected' : '' }}> Staff </option>
                     </select>
                     @error('fonction')
                              <span  style="color: red" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                     @enderror
                  </div>
                  <div class="form-group col-md-3">
                     <label for="staff">Choisir : *</label>
                     <select name="staff" class="form-control" id="staff">
                     </select>
                     @error('staff')
                              <span  style="color: red" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                     @enderror
                  </div>
                  <div class="form-group col-md-3">
                     <label for="quantité">Quantité : *</label>
                     <input type="number" name="quantité" class="form-control" id="quantité" >
                     @error('quantité')
                              <span  style="color: red" role="alert">
                              <strong>{{ $message }}</strong>
                              </span>
                     @enderror
                  </div>
                  <div class="form-group col-md-12">
                     <center><button class="btn btn-primary">Valider</button></center>
                  </div>
               </div>
            </form>
         </div>
      </div>
      {{-- <div style="padding: 0px 0px 15px 15px; text-align: right"><button class="btn btn-primary"  data-toggle="modal" data-target="#modifier">Ajouter</button></div> --}}
      <div class="col-sm-12">
         <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
            <div class="iq-card-body">
               <div class="table-responsive" id="table"  style="overflow-x: hidden;">
                  <table id="datatable" style="width: 100%" class="table table-striped table-bordered"">
                     <thead>
                        <tr>
                           <th scope="col">numéro d'opération</th>
                            <th scope="col"> Fonction </th>
                            <th scope="col"> Nom compléte </th>
                            <th scope="col"> Quantité </th>
                            <th scope="col"> Date</th> 
                            {{-- <th scope="col"> Supprimer</th> --}}
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($listes as $liste)
                        <tr>
                            <td ><b>{{$liste->id}}</b></td>
                            <td>{{$liste->fonction}}</td>
                            <td>{{$liste->staff}}</td>
                            <td>{{$liste->quantité}}</td>
                            <td>{{$liste->created_at}}</td>
                            {{-- <td>
                              <div class="iq-media-group">
                                 @foreach ($students as $student)
                                    @if ($student->parent == $parent->id)
                                       <a href="{{url('admin/eleve/profil/'.$student->id)}}" class="iq-media">
                                       <img class="img-fluid avatar-40 rounded-circle" title="{{ $student->nom.' '.$student->pre }}" src="{{url($student->image)}}" alt="">
                                       </a>
                                    @endif
                                 @endforeach
                              </div>
                            </td>
                            <td><span class="badge badge-success">Payé</span></td>
                            <td>
                              <button type="button" class="btn btn-link" style="font-size: 22px">
                                 <a href="{{url('admin/parent/profil/'.$parent->id)}}"><i class="ri-eye-line"></i></a>
                             </button>
                            </td> --}}
                            {{-- <td> <button type="button" class="btn btn-link" style="font-size: 22px"><i class="ri-delete-bin-2-fill" style="color: rgba(216, 74, 69, 1)"  data-toggle="modal" data-target="#exampleModal{{$liste->id}}" ></i></button></td> --}}
                        </tr>
                        {{-- <div class="modal fade" id="exampleModal{{$parent->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <a onclick="supprime({{ $parent->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                                    <form id="logout-form{{ $parent->id }}" action="{{ url('admin/delete/parent/'.$parent->id)}}" method="POST" style="display: none;">
                                       @csrf
                                       @method('DELETE')
                                   </form>
                                 </div>
                              </div>
                           </div>
                        </div> --}}
                        @endforeach
                     </tbody>
                  </table>
                  {{-- <div class="modal fade" id="modifier" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Nouveau produit</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{url('admin/stock_commande/ajouter')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="pro">Choisir Produit : *</label>
                                            <select name="pro" class="form-control" id="pro">
                                                <option value="">-- Choisir Produit --</option>
                                                @foreach ($produits as $produit)
                                                    <option value="{{$produit->id}}">{{$produit->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('pro')
                                                    <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                       <div class="form-group col-md-12">
                                          <label for="fonction">Fonction : *</label>
                                          <select name="fonction" onchange="get_grh('{{url('admin/ajax_get_grh_by_fonction')}}')" class="form-control" id="fonction">
                                             !@empty(old('fonction'))
                                                   <option value="">Choisir une fonction</option>
                                             @endempty
                                             <option value="administration" {{ old('fonction') == 'administration' ? 'selected' : '' }}> Administration</option>
                                             <option value="Professeur" {{ old('fonction') == 'Professeur' ? 'selected' : '' }}> Professeur</option>
                                             <option value="Accompagnement" {{ old('fonction') == 'Accompagnement' ? 'selected' : '' }}> Accompagnement</option>
                                             <option value="Chauffeur" {{ old('fonction') == 'Chauffeur' ? 'selected' : '' }}> Chauffeur</option>
                                             <option value="Menage" {{ old('fonction') == 'Menage' ? 'selected' : '' }}> Menage</option>
                                          </select>
                                          @error('fonction')
                                                   <span  style="color: red" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                   </span>
                                          @enderror
                                       </div>
                                       <div class="form-group col-md-12">
                                          <label for="staff">Choisir : *</label>
                                          <select name="staff" class="form-control" id="staff">
                                          </select>
                                          @error('staff')
                                                   <span  style="color: red" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                   </span>
                                          @enderror
                                       </div>
                                       <div class="form-group col-md-12">
                                          <label for="quantité">Quantité : *</label>
                                          <input type="number" name="quantité" class="form-control" id="quantité" >
                                          @error('quantité')
                                                   <span  style="color: red" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                   </span>
                                          @enderror
                                       </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Valider</button>
                                </div>
                            </form>
                        </div>
                    </div>
                 </div> --}}
               </div>
            </div>
         </div> 
      </div>     
   </div>
</div>
@endsection