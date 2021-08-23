@extends('admin/layouts.app')
@section('css')

@endsection
@section('js')
@endsection

@section('content')
<div class="container-fluid">
   <div style="padding-bottom: 10px; text-align: right"><button class="btn btn-primary"  data-toggle="modal" data-target="#modifier">Ajouter</button></div>
   <div class="row">
      @foreach ($pros as $pro)
         <div class="col-sm-3">
            <div class="card iq-mb-3">
               <img src="{{ url($pro->image) }}" height="200" class="card-img-top" alt="#">
               <div class="card-body" style="padding: 20px 0px 0px 0px">
                  <h4 class="card-title text-center" title="{{$pro->name}}" style="font-size: 1.1em">
                     {{substr($pro->name, 0, 18)}}
                     @if (substr($pro->name, 18) != '')
                         ...
                     @endif
                  </h4>
                  @if ($pro->quantité > $pro->min)
                     <p class="card-text text-center">{{$pro->quantité}} pcs </p>
                  @else
                     <p class="card-text text-center" ><b style="color: red">{{$pro->quantité}} pcs </b></p>
                  @endif
                  <p><center style="font-size: 19px;">
                     <a data-toggle="modal" data-target="#modifier{{$pro->id}}" href="#" ><span style="color:rgba(8, 155, 171, 1); padding-right: 10px"><i class="fa fa-plus"></i></span></a>
                     <i class="ri-pencil-line" style="color: rgba(8, 155, 171, 1); padding-right: 10px" data-toggle="modal" data-target="#modifier1{{ $pro->id }}" ></i>
                     <i class="ri-delete-bin-2-fill" style="color: rgba(8, 155, 171, 1); padding-right: 10px" data-toggle="modal" data-target="#delete_class{{$pro->id}}" ></i>
                  </center></p>
               </div>
            </div>
         </div>
      @endforeach
   </div>
   <center>{{ $pros->links() }}</center>
   <div class="modal fade" id="modifier" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalCenterTitle">Nouveau produit</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form action="{{url('admin/stock_produit/ajouter')}}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="modal-body">
                  <div class="row">
                     <div class="form-group col-md-12">
                        <label for="nom">Nom du produit : *</label>
                        <input type="text" name="name" class="form-control" id="nom" >
                        @error('name')
                              <span  style="color: red" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                        @enderror
                     </div>
                     <div class="form-group col-md-12">
                        <label for="ref">Référence : *</label>
                        <input type="text" name="ref" class="form-control" id="ref" >
                        @error('ref')
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
                     <div class="form-group col-md-12">
                        <label for="prix">Prix : *</label>
                        <input type="text" name="prix" class="form-control" id="prix" >
                        @error('prix')
                              <span  style="color: red" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                        @enderror
                     </div>
                     <div class="form-group col-md-12">
                        <label for="min">minimum de stock : *</label>
                        <input type="number" name="min" class="form-control" id="min" >
                        @error('min')
                              <span  style="color: red" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                        @enderror
                     </div>
                     <div class="form-group col-md-12">
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
   @foreach ($pros as $pro)
   <div class="modal fade" id="modifier{{$pro->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalCenterTitle">Nouveau produit</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form action="{{url('admin/stock_produit/ajoute_encien')}}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="modal-body">
                  <div class="row">
                     <div class="form-group col-md-12">
                        <label for="nom">Nom du produit : *</label>
                     <input type="text" name="name" value="{{$pro->name}}" disabled class="form-control" id="nom" >
                     <input type="hidden" value="{{$pro->id}}" name="id">
                        @error('name')
                              <span  style="color: red" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                        @enderror
                     </div>
                     <div class="form-group col-md-12">
                        <label for="ref">Référence : *</label>
                        <input type="text" name="ref" value="{{$pro->ref}}" disabled  class="form-control" id="ref" >
                        @error('ref')
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
                     <div class="form-group col-md-12">
                        <label for="prix">Prix : *</label>
                        <input type="text" name="prix" value="{{$pro->prix}}" class="form-control" id="prix" >
                        @error('prix')
                              <span  style="color: red" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                        @enderror
                     </div>
                     <div class="form-group col-md-12">
                        <label for="min">minimum de stock : *</label>
                        <input type="number" name="min" value="{{$pro->min}}" disabled class="form-control" id="min" >
                        @error('min')
                              <span  style="color: red" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                        @enderror
                     </div>
                     {{-- <div class="form-group col-md-12">
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
                     </div> --}}
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

   <div class="modal fade" id="modifier1{{$pro->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalCenterTitle">Nouveau produit</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form action="{{url('admin/stock_produit/update')}}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="modal-body">
                  <div class="row">
                     <div class="form-group col-md-12">
                        <label for="nom">Nom du produit : *</label>
                     <input type="text" name="name" value="{{$pro->name}}" class="form-control" id="nom" >
                     <input type="hidden" value="{{$pro->id}}" name="id">
                        @error('name')
                              <span  style="color: red" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                        @enderror
                     </div>
                     <div class="form-group col-md-12">
                        <label for="ref">Référence : *</label>
                        <input type="text" name="ref" value="{{$pro->ref}}" class="form-control" id="ref" >
                        @error('ref')
                              <span  style="color: red" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                        @enderror
                     </div>
                     <div class="form-group col-md-12">
                        <label for="quantité">Quantité : *</label>
                        <input type="number" name="quantité" value="{{$pro->quantité}}" disabled class="form-control" id="quantité" >
                        @error('quantité')
                              <span  style="color: red" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                        @enderror
                     </div>
                     <div class="form-group col-md-12">
                        <label for="prix">Prix : *</label>
                        <input type="text" name="prix" value="{{$pro->prix}}" disabled class="form-control" id="prix" >
                        @error('prix')
                              <span  style="color: red" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                        @enderror
                     </div>
                     <div class="form-group col-md-12">
                        <label for="min">minimum de stock : *</label>
                        <input type="number" name="min" value="{{$pro->min}}" class="form-control" id="min" >
                        @error('min')
                              <span  style="color: red" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                        @enderror
                     </div>
                     <div class="form-group col-md-12">
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

   <div class="modal fade" id="delete_class{{$pro->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
               <a onclick="supprime({{ $pro->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
               <form id="logout-form{{ $pro->id }}" action="{{ url('admin/delete/pro/'.$pro->id)}}" method="POST" style="display: none;">
                  @csrf
                  @method('DELETE')
              </form>
            </div>
         </div>
      </div>
  </div>
   @endforeach
</div>
@endsection