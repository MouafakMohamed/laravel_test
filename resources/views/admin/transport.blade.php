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
                   <h4 class="card-title"> Transport </h4>
                </div>
             </div>
             <div class="iq-card-body">
                <div id="table" class="table-editable">
                  @error('name')
                     <span  style="color: red" role="alert">
                        <strong>{{ $message }}</strong>
                     </span><br>
                  @enderror
                  @error('A')
                     <span  style="color: red" role="alert">
                        <strong>{{ $message }}</strong>
                     </span><br>
                  @enderror
                  @error('B')
                     <span  style="color: red" role="alert">
                        <strong>{{ $message }}</strong>
                     </span><br>
                  @enderror
                  @error('C')
                     <span  style="color: red" role="alert">
                        <strong>{{ $message }}</strong>
                     </span><br>
                  @enderror
                  @error('marque')
                     <span  style="color: red" role="alert">
                        <strong>{{ $message }}</strong>
                     </span><br>
                  @enderror
                  @error('model')
                     <span  style="color: red" role="alert">
                        <strong>{{ $message }}</strong>
                     </span><br>
                  @enderror
                  @error('accom')
                     <span  style="color: red" role="alert">
                        <strong>{{ $message }}</strong>
                     </span><br>
                  @enderror
                  @error('choffeur')
                     <span  style="color: red" role="alert">
                        <strong>{{ $message }}</strong>
                     </span><br>
                  @enderror
                  @error('note')
                     <span  style="color: red" role="alert">
                        <strong>{{ $message }}</strong>
                     </span><br>
                  @enderror
                   <span class="table-add float-right mb-3 mr-2">
                   <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl"><b><i
                      class="ri-add-fill"><span class="pl-1">Ajouter un transport</span></i></b>
                   </button>
                   </span>
                   <table class="table table-bordered table-responsive-md table-striped text-center">
                      <thead>
                         <tr>
                            <th>Name</th>
                            <th>№ d'immatriculation</th>
                            <th>Accompagnement</th>
                            <th>Chauffeur</th>
                            <th style="width: 15%">Action</th>
                         </tr>
                      </thead>
                      <tbody>
                         @foreach ($transports as $transport)
                           <tr style="background-color: white">
                              <td contenteditable="false">{{$transport->name}}</td>
                              <td contenteditable="false">{{$transport->id1}}</td>
                              <td contenteditable="false">
                              @foreach ($accomps as $accomp)
                                 @if ($accomp->id == $transport->accom)
                                    {{$accomp->nom.' '.$accomp->pre}}
                                 @endif
                              @endforeach   
                              </td>
                              <td contenteditable="false">
                                 @foreach ($choffeurs as $choffeur)
                                    @if ($choffeur->id == $transport->choffeur)
                                       {{$choffeur->nom.' '.$choffeur->pre}}
                                    @endif
                                 @endforeach  
                              </td>
                              <td>
                                 <button type="button" class="btn btn-link" style="font-size: 18px">
                                    <a href="{{url('admin/Transport/profil/'.$transport->id)}}"><i class="ri-eye-line pr-0"></i></a> 
                                    <i class="ri-pencil-line pr-0" style="color: rgba(8, 155, 171, 1)" data-toggle="modal" data-target=".Model{{$transport->id }}"></i>
                                    @if ($transport->tajet == 'non')
                                       <i class="ri-delete-bin-2-fill pr-0"  style="color: rgba(8, 155, 171, 1)" data-toggle="modal" data-target="#exampleModal{{$transport->id}}"></i>
                                    @endif
                                 </button>
                              </td>
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
                        <h5 class="modal-title">Transport</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  <form action="{{url('admin/Transport')}}" method="post">
                  @csrf
                    <div class="modal-body">
                        <div class="form-row">
                           <div class="col-md-6">
                              <label for="Nom" style="margin-bottom: .1rem;">Nom : *</label>
                              <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="Nom" placeholder="...">
                              
                           </div>
                           <div class="col-md-3">
                              <label for="immatriculation" style="margin-bottom: .1rem;">№ d'immatriculation : *</label>
                              <input type="text" name="A" value="{{ old('A') }}" class="form-control" id="immatriculation" placeholder="EX : 32157" required>
                              
                           </div>
                           <div class="col-md-1" style="padding-top: 26px">
                              <select name="B" class="form-control">
                                 @empty(old('B'))
                                        <option></option>
                                @endempty
                                 <option value="أ" {{ old('B') == 'أ' ? 'selected' : '' }} > أ </option>
                                 <option value="ب" {{ old('B') == 'ب' ? 'selected' : '' }} >ب</option>
                                 <option value="ت" {{ old('B') == 'ت' ? 'selected' : '' }} >ت</option>
                                 <option value="ث" {{ old('B') == 'ث' ? 'selected' : '' }} >ث</option>
                                 <option value="ج" {{ old('B') == 'ج' ? 'selected' : '' }} >ج</option>
                                 <option value="ح" {{ old('B') == 'ح' ? 'selected' : '' }} >ح</option>
                                 <option value="خ" {{ old('B') == 'خ' ? 'selected' : '' }} >خ</option>
                                 <option value="د" {{ old('B') == 'د' ? 'selected' : '' }} >د</option>
                                 <option value="ذ" {{ old('B') == 'ذ' ? 'selected' : '' }} >ذ</option>
                                 <option value="ر" {{ old('B') == 'ر' ? 'selected' : '' }} >ر</option>
                                 <option value="ز" {{ old('B') == 'ز' ? 'selected' : '' }} >ز</option>
                                 <option value="س" {{ old('B') == 'س' ? 'selected' : '' }} >س</option>
                                 <option value="ش" {{ old('B') == 'ش' ? 'selected' : '' }} >ش</option>
                                 <option value="ص" {{ old('B') == 'ص' ? 'selected' : '' }} >ص</option>
                                 <option value="ض" {{ old('B') == 'ض' ? 'selected' : '' }} >ض</option>
                                 <option value="ط" {{ old('B') == 'ط' ? 'selected' : '' }} >ط</option>
                                 <option value="ظ" {{ old('B') == 'ظ' ? 'selected' : '' }} >ظ</option>
                                 <option value="ع" {{ old('B') == 'ع' ? 'selected' : '' }} >ع</option>
                                 <option value="غ" {{ old('B') == 'غ' ? 'selected' : '' }} >غ</option>
                                 <option value="ف" {{ old('B') == 'ف' ? 'selected' : '' }} >ف</option>
                                 <option value="ق" {{ old('B') == 'ق' ? 'selected' : '' }} >ق</option>
                                 <option value="ك" {{ old('B') == 'ك' ? 'selected' : '' }} >ك</option>
                                 <option value="ل" {{ old('B') == 'ل' ? 'selected' : '' }} >ل</option>
                                 <option value="م" {{ old('B') == 'م' ? 'selected' : '' }} >م</option>
                                 <option value="ن" {{ old('B') == 'ن' ? 'selected' : '' }} >ن</option>
                                 <option value="هـ"{{ old('B') == 'هـ' ? 'selected' : '' }}> هـ</option>
                                 <option value="و" {{ old('B') == 'و' ? 'selected' : '' }} >و</option>
                                 <option value="ي" {{ old('B') == 'ي' ? 'selected' : '' }} >ي</option>
                               </select>
                                 
                           </div>
                           <div class="col-md-2" style="padding-top: 26px">
                              <input type="text" name="C" value="{{ old('C') }}" class="form-control" id="salamat" placeholder="EX : 17" required>
                              
                           </div>
                            <div class="col-md-6">
                               <label for="Marque" style="margin-bottom: .1rem;">Marque : *</label>
                               <input type="text" name="marque" value="{{ old('marque') }}" class="form-control" id="Marque" placeholder="EX : Fiat" required>
                               
                            </div>
                            <div class="col-md-6">
                              <label for="Marque" style="margin-bottom: .1rem;">Modèle : *</label>
                              <input type="text" name="model" value="{{ old('model') }}" class="form-control" id="Marque" placeholder="EX : Ducato" required>
                              
                           </div>
                            {{-- <div class="col-md-6">
                               <label for="validationDefault03" style="margin-bottom: .1rem;">Année de mise en circulation : *</label>
                               <input type="number" name="anne" value="{{ old('anne') }}" class="form-control" id="validationDefault03" placeholder="EX : 2020" required>
                               @error('anne')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                              @enderror
                            </div>
                           <div class="col-md-6">
                              <label for="Marque" style="margin-bottom: .1rem;">Assurance : *</label>
                              <input type="date" name="date1" value="{{ old('date1') }}" class="form-control" id="Marque" required>
                              @error('date1')
                                       <span  style="color: red" role="alert">
                                          <strong>{{ $message }}</strong>
                                       </span>
                              @enderror
                           </div> --}}
                           <div class="col-md-6">
                              <label for="validationDefault04" style="margin-bottom: .1rem;">Accompagnement : *</label>
                              <select class="form-control" name="accom" id="validationDefault04" required>
                                 @empty(old('accom'))
                                    <option value=""> -- Accompagnement --</option>
                                 @endempty
                                 @foreach ($accomps as $accomp)
                                       <option value="{{$accomp->id}}" {{ old('status') == $accomp->id ? 'selected' : '' }}>{{$accomp->nom.' '.$accomp->pre}}</option>
                                 @endforeach
                              </select>
                              
                           </div>
                           <div class="col-md-6">
                              <label for="validationDefault04" style="margin-bottom: .1rem;">Chauffeur : *</label>
                              <select class="form-control" name="choffeur" id="validationDefault04" required>
                                 @empty(old('choffeur'))
                                    <option value=""> -- Chauffeurs -- </option>
                                 @endempty
                                 @foreach ($choffeurs as $choffeur)
                                       <option value="{{$choffeur->id}}" {{ old('status') == $choffeur->id ? 'selected' : '' }}>{{$choffeur->nom.' '.$choffeur->pre}}</option>
                                 @endforeach
                              </select>
                              
                           </div>
                            <div class="col-md-12">
                               <label for="textarea" style="margin-bottom: .1rem;">Note : *</label>
                               <textarea type="text" name="note" value="{{ old('note') }}" class="form-control" id="textarea" required></textarea>
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
            @foreach ($transports as $transport)
               <div class="modal fade Model{{ $transport->id }}" tabindex="-1" role="dialog"   aria-hidden="true">
                  <div class="modal-dialog modal-xl">
                     <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title">Transport</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                  <form action="{{url('admin/Transport/edit')}}" method="post">
                  @csrf
                     <div class="modal-body">
                        <div class="form-row">
                           <div class="col-md-6">
                              <label for="Nom" style="margin-bottom: .1rem;">Nom : *</label>
                              <input type="text" name="name" value="@if(!empty(old('name'))){{old('name')}}@else{{$transport->name}}@endif" class="form-control" id="Nom" placeholder="...">
                              <input type="hidden" value="{{ $transport->id}}" name="id" >
                              
                           </div>
                           {{-- <div class="col-md-6">
                              <label for="Trajectoire" style="margin-bottom: .1rem;">Zone : *</label>
                              <input type="text" name="trajet" value="@if(!empty(old('trajet'))){{old('trajet')}}@else{{$transport->trajet}}@endif" class="form-control" id="Trajectoire" placeholder="..." required>
                              @error('trajet')
                                          <span  style="color: red" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                              @enderror
                           </div> --}}
                           <div class="col-md-3">
                              <label for="immatriculation" style="margin-bottom: .1rem;">№ d'immatriculation : *</label>
                              <input type="text" name="A" value="@if(!empty(old('A'))){{old('A')}}@else{{$transport->A}}@endif" class="form-control" id="immatriculation" placeholder="EX : 32157" required>
                              
                           </div>
                           <div class="col-md-1" style="padding-top: 26px">
                              <select name="B" class="form-control">
                                 @empty(old('B'))
                                          <option></option>
                                 @endempty
                                 <option value="أ"    {{ old('B') == 'أ' || $transport->B == 'أ' ? 'selected' : '' }} > أ </option>
                                 <option value="ب"    {{ old('B') == 'ب' || $transport->B == 'ب' ? 'selected' : '' }} >ب</option>
                                 <option value="ت"    {{ old('B') == 'ت' || $transport->B == 'ت' ? 'selected' : '' }} >ت</option>
                                 <option value="ث"    {{ old('B') == 'ث' || $transport->B == 'ث' ? 'selected' : '' }} >ث</option>
                                 <option value="ج"    {{ old('B') == 'ج' || $transport->B == 'ج' ? 'selected' : '' }} >ج</option>
                                 <option value="ح"    {{ old('B') == 'ح' || $transport->B == 'ح' ? 'selected' : '' }} >ح</option>
                                 <option value="خ"    {{ old('B') == 'خ' || $transport->B == 'خ' ? 'selected' : '' }} >خ</option>
                                 <option value="د"    {{ old('B') == 'د' || $transport->B == 'د' ? 'selected' : '' }} >د</option>
                                 <option value="ذ"    {{ old('B') == 'ذ' || $transport->B == 'ذ' ? 'selected' : '' }} >ذ</option>
                                 <option value="ر"    {{ old('B') == 'ر' || $transport->B == 'ر' ? 'selected' : '' }} >ر</option>
                                 <option value="ز"    {{ old('B') == 'ر' || $transport->B == 'ر' ? 'selected' : '' }} >ز</option>
                                 <option value="س"    {{ old('B') == 'س' || $transport->B == 'س' ? 'selected' : '' }} >س</option>
                                 <option value="ش"    {{ old('B') == 'ش' || $transport->B == 'ش' ? 'selected' : '' }} >ش</option>
                                 <option value="ص"    {{ old('B') == 'ص' || $transport->B == 'ص' ? 'selected' : '' }} >ص</option>
                                 <option value="ض"    {{ old('B') == 'ض' || $transport->B == 'ض' ? 'selected' : '' }} >ض</option>
                                 <option value="ط"    {{ old('B') == 'ط' || $transport->B == 'ط' ? 'selected' : '' }} >ط</option>
                                 <option value="ظ"    {{ old('B') == 'ظ' || $transport->B == 'ظ' ? 'selected' : '' }} >ظ</option>
                                 <option value="ع"    {{ old('B') == 'ع' || $transport->B == 'ع' ? 'selected' : '' }} >ع</option>
                                 <option value="غ"    {{ old('B') == 'غ' || $transport->B == 'غ' ? 'selected' : '' }} >غ</option>
                                 <option value="ف"    {{ old('B') == 'ف' || $transport->B == 'ف' ? 'selected' : '' }} >ف</option>
                                 <option value="ق"    {{ old('B') == 'ق' || $transport->B == 'ق' ? 'selected' : '' }} >ق</option>
                                 <option value="ك"    {{ old('B') == 'ك' || $transport->B == 'ك' ? 'selected' : '' }} >ك</option>
                                 <option value="ل"    {{ old('B') == 'ل' || $transport->B == 'ل' ? 'selected' : '' }} >ل</option>
                                 <option value="م"    {{ old('B') == 'م' || $transport->B == 'م' ? 'selected' : '' }} >م</option>
                                 <option value="ن"    {{ old('B') == 'ن' || $transport->B == 'ن' ? 'selected' : '' }} >ن</option>
                                 <option value="هـ"   {{ old('B') == 'هـ' || $transport->B == 'هـ' ? 'selected' : '' }}> هـ</option>
                                 <option value="و"    {{ old('B') == 'و' || $transport->B == 'و' ? 'selected' : '' }} >و</option>
                                 <option value="ي"    {{ old('B') == 'ي' || $transport->B == 'ي' ? 'selected' : '' }} >ي</option>
                                 </select>
                                 
                           </div>
                           <div class="col-md-2" style="padding-top: 26px">
                              <input type="text" name="C" value="@if(!empty(old('C'))){{old('C')}}@else{{$transport->C}}@endif" class="form-control" id="salamat" placeholder="EX : 17" required>
                              
                           </div>
                              <div class="col-md-6">
                                 <label for="Marque" style="margin-bottom: .1rem;">Marque : *</label>
                                 <input type="text" name="marque" value="@if(!empty(old('marque'))){{old('marque')}}@else{{$transport->marque}}@endif" class="form-control" id="Marque" placeholder="EX : Fiat" required>
                                 
                              </div>
                              <div class="col-md-6">
                              <label for="Marque" style="margin-bottom: .1rem;">Modèle : *</label>
                              <input type="text" name="model" value="@if (!empty(old('model'))){{old('model')}} @else{{$transport->model}}@endif" class="form-control" id="Marque" placeholder="EX : Ducato" required>
                              
                           </div>
                              <div class="col-md-6">
                                 <label for="validationDefault03" style="margin-bottom: .1rem;">Année de mise en circulation : *</label>
                                 <input type="number" name="anne" value="@if (!empty(old('anne'))){{old('anne')}}@else{{$transport->anne}}@endif" class="form-control" id="validationDefault03" placeholder="EX : 2020" required>
                                 @error('anne')
                                          <span  style="color: red" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                              @enderror
                           </div>
                           <div class="col-md-6">
                              <label for="validationDefault04" style="margin-bottom: .1rem;">Accompagnement : *</label>
                              <select class="form-control" name="accom" id="validationDefault04" required>
                                 @foreach ($accomps as $accomp)
                                    @if ($accomp->id == $transport->accom)
                                       <option value="{{$accomp->id}}" {{ old('accom') == $accomp->id ? 'selected' : '' }}>{{$accomp->nom.' '.$accomp->pre}}</option>
                                    @endif
                                 @endforeach
                                 @foreach ($accomps as $accomp)
                                    @if ($accomp->id != $transport->accom)
                                       <option value="{{$accomp->id}}" {{ old('accom') == $accomp->id ? 'selected' : '' }}>{{$accomp->nom.' '.$accomp->pre}}</option>
                                    @endif
                                 @endforeach
                              </select>
                              @error('accom')
                                 <span  style="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                              @enderror
                           </div>
                           <div class="col-md-6">
                              <label for="validationDefault04" style="margin-bottom: .1rem;">Chauffeur : *</label>
                              <select class="form-control" name="choffeur" id="validationDefault04" required>
                                 @foreach ($choffeurs as $choffeur)
                                    @if ($choffeur->id == $transport->choffeur)
                                       <option value="{{$choffeur->id}}" {{ old('choffeur') == $choffeur->id || $transport->choffeur == $choffeur->id ? 'selected' : '' }}>{{$choffeur->nom.' '.$choffeur->pre}}</option>
                                    @endif
                                 @endforeach
                                 @foreach ($choffeurs as $choffeur)
                                    @if ($choffeur->id != $transport->choffeur)
                                       <option value="{{$choffeur->id}}" {{ old('choffeur') == $choffeur->id || $transport->choffeur == $choffeur->id ? 'selected' : '' }}>{{$choffeur->nom.' '.$choffeur->pre}}</option>
                                    @endif
                                 @endforeach
                              </select>
                              @error('choffeur')
                                          <span  style="color: red" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                              @enderror
                           </div>
                              <div class="col-md-12">
                                 <label for="textarea" style="margin-bottom: .1rem;">Note : *</label>
                                 <textarea type="text" name="note"  class="form-control" id="textarea" required>@if(!empty(old('note'))){{old('note')}}@else{{$transport->note}}@endif</textarea>
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
                        <button type="submit" class="btn btn-primary">Modifier</button>
                     </div>
                  </form>
                     </div>
                  </div>
               </div>
               <div class="modal fade" id="exampleModal{{$transport->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                           <a onclick="supprime({{ $transport->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                           <form id="logout-form{{ $transport->id }}" action="{{ url('admin/delete/transport/'.$transport->id)}}" method="POST" style="display: none;">
                              @csrf
                              @method('DELETE')
                        </form>
                        </div>
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