@extends('admin/layouts.app')
@section('css')

@endsection
@section('js')
   
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="iq-card">
                <div class="iq-card-body pl-0 pr-0 pt-0">
                    <div class="doctor-details-block">
                        <div class="doc-profile-bg bg-primary" style="height:150px;text-align : right ">
                        </div>
                        <div class="doctor-profile text-center">
                            <img src="{{url($parent->image)}}" alt="profile-img" class="avatar-130 img-fluid">
                        </div>
                        <div class="text-center mt-3 pl-3 pr-3">
                            <h4><b>{{$parent->nom.' '.$parent->pre}}</b></h4>
                            <div class="iq-doc-social-info-garcon mt-3 mb-3">
                                <ul class="m-0 p-0 list-inline">
                                    <li><a href="{{$parent->facebook}}"><i class="ri-facebook-fill"></i></a></li>
                                    <li><a href="{{$parent->twitter}}"><i class="ri-twitter-fill"></i></a> </li>
                                    <li><a href="{{$parent->insta}}"><i class="ri-instagram-fill"></i></a></li>
                                    <li><a href="{{$parent->youtube}}"><i class="ri-youtube-fill"></i></a></li>
                                </ul>
                            </div>
                            <p style="text-align: right">
                                <button type="button" class="btn btn-primary mb-0" data-toggle="modal" data-target=".model4"><i class="ri-pencil-line pr-0"></i></button>
                            </p>
                        </div>
                        <div class="modal fade model4" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">INFORMATION DE POSTE </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form  method="POST" action="{{url('admin/parent/profil/edit/'.$parent->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="customFile">Photo profil :</label>
                                                <div class="custom-file" >
                                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                                    <input type="hidden" name="id" value="{{$parent->id}}">
                                                    <input type="hidden" name="hidden" value="image">
                                                    <label class="custom-file-label" for="customFile">Choisi une image</label>
                                                </div>
                                                @error('image')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="nom">Nom :</label>
                                            <input type="text"  name="nom" value="{{ $parent->nom}}" class="form-control" id="nom" >
                                            @error('nom')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="pre">Prénom :</label>
                                            <input type="text"  name="pre" value="{{ $parent->pre}}" class="form-control" id="pre" >
                                            @error('pre')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="facebook">Facebook :</label>
                                            <input type="text"  name="facebook" value="{{ $parent->facebook }}" class="form-control" id="facebook" >
                                            @error('facebook')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="twitter">twitter :</label>
                                            <input type="text"  name="twitter" value="{{ $parent->twitter }}" class="form-control" id="twitter" >
                                            @error('twitter')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="insta">Instagram :</label>
                                            <input type="text"  name="insta" value="{{ $parent->insta }}" class="form-control" id="insta" >
                                            @error('insta')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="youtube">Youtube :</label>
                                            <input type="text"  name="youtube" value="{{ $parent->youtube }}" class="form-control" id="youtube" >
                                            @error('youtube')
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
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">  
            <div class="row">
                <div class="col-md-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Informations scolaires</h4>
                            </div>
                            <button type="button" class="btn btn-primary mb-0" data-toggle="modal" data-target=".model2"><i class="ri-pencil-line pr-0"></i></button>
                            <div class="modal fade model2" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                   <div class="modal-content">
                                      <div class="modal-header">
                                         <h5 class="modal-title">Informations Générales </h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                         </button>
                                      </div>
                                      <form  method="POST" action="{{url('admin/parent/profil/edit/'.$parent->id)}}" enctype="multipart/form-data">
                                        @csrf
                                      <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="32154">CIN :</label>
                                                <input type="text" class="form-control" value="{{$parent->cin}}" name="cin" id="32154">
                                                <input type="hidden" name="hidden" value="cin">
                                                @error('cin')
                                                     <span  style="color: red" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                     </span>
                                                 @enderror
                                             </div>
                                             <div class="form-group col-md-6">
                                                <label for="sex">Sexe :</label>
                                                <select class="form-control" name="sex" id="sex" >
                                                    <option value="Homme" {{ old('sex') == 'Homme' || $parent['sex'] == 'Homme' ? 'selected' : '' }}> Homme </option>
                                                    <option value="Femme" {{ old('sex') == 'Femme' || $parent['sex'] == 'Femme' ? 'selected' : '' }}> Femme </option>
                                                </select>
                                                @error('sex')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                             </div>
                                             <div class="form-group col-md-6">
                                                <label for="32154">E-mail :</label>
                                                <input type="text" class="form-control" value="{{$parent->mail}}" name="mail" id="32154">
                                                @error('mail')
                                                     <span  style="color: red" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                     </span>
                                                 @enderror
                                             </div>
                                             <div class="form-group col-md-6">
                                                <label for="tele">Téléphone :</label>
                                                <input type="number" class="form-control" value="{{$parent->tele}}" name="tele" id="tele">
                                                @error('tele')
                                                     <span  style="color: red" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                     </span>
                                                 @enderror
                                             </div>
                                             <div class="form-group col-md-12">
                                                <label for="adress">Adress :</label>
                                                <textarea name="adress" id="adress" class="form-control">{{$parent->adress}}</textarea>
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
                                         <button type="submit" class="btn btn-primary">Modifier</button>
                                      </div>
                                      </form>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="about-info m-0 p-0">
                                <div class="row">
                                    <div class="col-6 p-2">CIN :</div>
                                    <div class="col-6 p-2">{{$parent->cin}}</div>
                                    <div class="col-6 p-2">Sexs :</div>
                                    <div class="col-6 p-2">{{$parent->sex}}</div>
                                    <div class="col-6 p-2">E-mail :</div>
                                    <div class="col-6 p-2">{{$parent->mail}}</div>
                                    <div class="col-6 p-2">Numéro du téléphone:</div>
                                    <div class="col-6 p-2">{{$parent->tele}}</div>
                                    <div class="col-6 p-2">Adress:</div>
                                    <div class="col-6 p-2">{{$parent->adress}}</div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-primary"  data-toggle="modal" data-target=".salamat">Ajouter</button><br><br>
                    <div class="modal fade salamat" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title">Ajouter un éléve </h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <form  method="POST" action="{{url('admin/parent/student/edit/'.$parent->id)}}" enctype="multipart/form-data">
                                @csrf
                              <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="32154">Categorie :</label>
                                        <select class="form-control" onchange="change1('{{url('admin/ajax_get_cycle_by_categorie')}}')" name="categorie" id="cat">
                                            @if(empty(old('categorie')))
                                                <option  selected="" disabled=""> -- Choisir une categorie -- </option>
                                            @endif
                                            @foreach ($categories as $categorie)
                                                <option value="{{$categorie->id}}"{{ old('categorie') == $categorie->id ? 'selected' : '' }}>{{$categorie->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('categorie')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="32154">Cycle</label> :</label>
                                        <select class="form-control" onchange="change2('{{url('admin/ajax_get_class_by_cycle')}}')" name="cycle" id="cycle">
                                            <option  selected="" disabled=""> -- Choisir un Cycle -- </option>
                                        </select>
                                        @error('cycle')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="tele">Classe :</label>
                                        <select class="form-control" name="classe" onchange="change5('{{url('admin/ajax_get_student_by_class')}}')" id="class">
                                            <option  selected="" disabled=""> -- Choisir une classe -- </option>
                                    </select>
                                    @error('classe')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label>éléves :</label>
                                        <select class="form-control" name="eleve" id="eleve" >
                                            <option selected disabled >-- Choisir un éléve --</option>
                                        </select>
                                        @error('eleve')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="type"> Type :</label>
                                        <select class="form-control" name="type" onchange="autre1()" id="type" id="selectcountry" required>
                                            @empty(old('type'))
                                                    <option value="" selected="" disabled="">-- Type -- </option>
                                            @endempty
                                                    <option value="Pére"  {{ old('type') == 'Pére' ? 'selected' : '' }}> Pére</option>
                                                    <option value="Mére"  {{ old('type') == 'Mére' ? 'selected' : '' }}> Mére</option>
                                                    <option value="Autre"  {{ old('type') == 'Autre' ? 'selected' : '' }}> Autre</option>
                                        </select>
                                        @error('type')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>
                                     <div class="form-group col-md-6" id="test1" style="display: none">
                                        <label for="type"> type :</label>
                                        <input type="text" name="type" id="test" class="form-control">
                                        @error('type')
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
                </div>
                <div class="col-lg-12">
                    @foreach ($students as $student)
                        <div class="iq-accordion career-style faq-style  ">
                            <div class="iq-card iq-accordion-block">
                                <div class="active-faq clearfix">
                                    <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12"><a><span> <h4>Frais <a href="{{url('admin/eleve/profil/'.$student->id)}}">( {{$student->nom.' '.$student->pre}} )</a></h4> </span> </a></div>
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-details">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="iq-card">
                                                    <div class="iq-card-body">
                                                        <table class="table mb-0 table-borderless">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col"> Date d'échéance</th>
                                                                <th scope="col">Montant (Dh)</th>
                                                                <th scope="col">Statut</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {{-- @foreach ($frais as $frai)
                                                            <tr>
                                                                <td>{{$frai->date}}</td>
                                                                <td>{{$frai->prix}} DH</td>
                                                                <td><span class="badge badge-success">Payé</span></td>
                                                            </tr>
                                                            @endforeach --}}
                                                            @foreach ($student->mois as $item => $value)
                                                                    <tr>
                                                                        <td>{{$value['ok']}}</td>
                                                                        <td>{{$value['prix']}} DH</td>
                                                                        @if ($value['etat'] == 'oui')
                                                                            <td><span class="badge badge-success">Payé</span></td>
                                                                        @endif
                                                                        @if ($value['etat'] == 'non')
                                                                            <td><span class="badge badge-danger">Non payé</span></td>
                                                                        @endif
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection