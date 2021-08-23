@extends('admin/layouts.app')
@section('css')
    <style>
        #display{
            display: none;
        }
        #display1{
            display: none;
        }
        #display2{
            display: none;
        }
        .btn-roze{
            background: rgba(8, 155, 171, 1);
            color: white;
        }
    </style>
@endsection
@section('js')
        <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
        <script src="jquery.flexdatalist.min.js"></script>
        <script>
        $('.flexdatalist-json').flexdatalist({
            searchContain: false,
            valueProperty: 'iso2',
            minLength: 1,
            focusFirstResult: true,
            selectionRequired: true,
        });
        </script>
    <script>

            
            function searsh() {
                var ok = $('#change').val();
                    if (ok == 'CDD') {
                        document.getElementById("display").id = "salam";
                        document.getElementById("display1").id = "salam1";
                        document.getElementById("salam2").id = "display2";
                    }else{
                        document.getElementById("salam").id = "display";
                        document.getElementById("salam1").id = "display1";
                        document.getElementById("display2").id = "salam2";
                    }
                        
                        // $('#data').html(data);

                    }
    </script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="iq-card">
                <div class="iq-card-body pl-0 pr-0 pt-0">
                    <div class="doctor-details-block">
                    <div class="doc-profile-bg" style="background: rgba(8, 155, 171, 1);height:150px;text-align : right ">
                        <button type="button" class="btn btn-link" style="font-size: 18px">
                            <i class="ri-pencil-line pr-0" style="color:rgb(244, 246, 247)" data-toggle="modal" data-target=".model4"></i>
                        </button>
                    </div>
                    <div class="doctor-profile text-center">
                    <img src="{{url('/'.$student->image)}}" alt="profile-img" class="avatar-130 img-fluid">
                    </div>
                    <div class="text-center mt-3 pl-3 pr-3">
                        <h4><b>{{$student->nom.' '.$student->pre}}</b></h4>
                        <h4><b>{{$student->nom1.' '.$student->pre1}}</b></h4>
                        <h4><b style="color:rgba(8, 155, 171, 1)">{{$student->id1}}</b></h4>
                        <div class="iq-doc-social-info-garcon mt-3 mb-3">
                            <ul class="m-0 p-0 list-inline">
                                <li><a href="{{$student->facebook}}"><i class="ri-facebook-fill"></i></a></li>
                                <li><a href="{{$student->twitter}}"><i class="ri-twitter-fill"></i></a> </li>
                                <li><a href="{{$student->insta}}"><i class="ri-instagram-fill"></i></a></li>
                                <li><a href="{{$student->youtube}}"><i class="ri-youtube-fill"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">LES PARENTS</h4>
                    </div>
                    <p style="text-align: right">
                        <button type="button" class="btn btn-link" style="font-size: 18px">
                            <i class="ri-pencil-line pr-0" style="color:rgba(8, 155, 171, 1)" data-toggle="modal" data-target=".model5"></i>
                        </button>
                        <button type="button" class="btn btn-link"  style="font-size: 22px">
                            <i class="ri-add-line pr-0" style="color:rgba(8, 155, 171, 1)" data-toggle="modal" data-target="#parentplus"></i>
                        </button>
                    </p>
                    <div class="modal fade" id="parentplus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <form method="POST" action="{{url('admin/add_student_parent')}}" enctype="multipart/form-data">
                            @csrf
                       <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                             <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                             </div>
                             <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">choisir :</label>

                                        <input type="text" multiple="multiple" name="parent" class="form-control" name="search" list="tags"/>
                                        <datalist id="tags">
                                            @foreach ($parents1 as $par)
                                            <option value="{{$par->pre.' '.$par->nom}}">
                                            @endforeach
                                        </datalist>

                                        {{-- <input type="text" placeholder="Choose a fruit"
                                                class="flexdatalist form-control"
                                                data-min-length="1"
                                                data-searchContain="true"
                                                multiple="multiple"

                                                list="fruit" name="my-fruit">
                                                <datalist id="fruit">
                                                    <option value="Apples">Apples</option>
                                                    <option value="Bananas">Bananas</option>
                                                    <option value="Cherries">Cherries</option>
                                                    <option value="Kiwi">Kiwi</option>
                                                    <option value="Pineapple">Pineapple</option>
                                                    <option value="Zucchini">Zucchini</option>
                                                </datalist> --}}
                                        <input type="hidden" value="{{$student->id}}" name="id">
                                    </div>
                             </div>
                             <div class="modal-footer">
                                 <a href="{{url('admin/Parent/'.$student->id)}}" class="btn btn-warning" > Nouveau </a><br><br>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                             </div>
                          </div>
                       </div>
                        </form>
                    </div>
                    <div class="modal fade model1" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title">Informations générales </h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <form  method="POST" action="{{url('admin/update_student')}}" enctype="multipart/form-data">
                                @csrf
                              <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                       <label for="massar">Code massar :</label>
                                       <input type="text"  name="massar" value="{{ $student->id1 }}" class="form-control" id="massar" >
                                       <input type="hidden" name="id" value="{{$student->id}}">
                                       <input type="hidden" name="hidden" value="massar">
                                        @error('massar')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Sexe :</label>
                                        <select class="form-control" name="sex" id="selectuserrole">
                                            <option value="Garçon"  {{ old('sex') == 'Garçon' || $student->sex == 'Garçon' ? 'selected' : '' }}> Garçon</option>
                                            <option value="Fille"  {{ old('sex') == 'Fille' || $student->sex == 'Fille' ? 'selected' : '' }}> Fille</option>
                                        </select>
                                        @error('sex')
                                               <span  style="color: red" role="alert">
                                                   <strong>{{ $message }}</strong>
                                               </span>
                                           @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="date">Date de naissance</label>
                                        <input type="date" class="form-control" name="date" value="{{ $student->date }}" id="date">
                                        @error('date')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-group col-md-6">
                                        <label for="tele">Téléphone</label>
                                        <input type="number" name="tele" value="{{ $student->tele }}" class="form-control" id="tele">
                                        @error('tele')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" name="mail" value="{{ $student->mail }}" id="email" placeholder="EX : example@example.com">
                                        @error('mail')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> --}}
                                    <div class="form-group col-md-6" >
                                        <label for="date_d">Date de départ  :</label>
                                        <input type="date" name="date_d" value="{{ $student->date_d }}" class="form-control" id="date_d" placeholder="2019-12-18">
                                        @error('date_d')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6" >
                                        <label for="incsription_num">Numéro d'inscription  :</label>
                                        <input type="text" name="incsription_num" value="{{ $student->incsription_num }}" class="form-control" id="incsription_num">
                                        @error('incsription_num')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="adress">Adress :</label>
                                       <textarea type="text" name="adress" class="form-control" id="adress">{{ $student->adress }}</textarea>
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
                                 <button type="submit" class="btn btn-roze">Modifier</button>
                              </div>
                              </form>
                           </div>
                        </div>
                    </div>
                    <div class="modal fade model2" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title"> Informations scolaires </h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <form  method="POST" action="{{url('admin/update_student')}}" enctype="multipart/form-data">
                                @csrf
                              <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="32154">Catégorie :</label>
                                        <select class="form-control" onchange="change1('{{url('admin/ajax_get_cycle_by_categorie')}}')" name="categorie" id="cat">
                                            @foreach ($categories as $categorie)
                                            @if ($categorie->name == $student->categorie)
                                            <option value="{{$categorie->id}}"{{ old('categorie') == $categorie->id ? 'selected' : '' }}>{{$categorie->name}}</option>
                                            @endif
                                            @endforeach
                                            @foreach ($categories as $categorie)
                                            @if ($categorie->name != $student->categorie)
                                            <option value="{{$categorie->id}}"{{ old('categorie') == $categorie->id ? 'selected' : '' }}>{{$categorie->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="id" value="{{$student->id}}">
                                        <input type="hidden" name="hidden" value="categorie">
                                        @error('categorie')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="32154">Cycle :</label>
                                        <select class="form-control" onchange="change2('{{url('admin/ajax_get_class_by_cycle')}}')" name="cycle" id="cycle">
                                            @foreach ($cycles as $cycle)
                                                @if ($cycle->id == $student->cycle)
                                                    <option value="{{ $cycle->id }}">{{$cycle->name}}</option>
                                                @endif
                                            @endforeach
                                            @foreach ($cycles as $cycle)
                                                @if ($cycle->id != $student->cycle && $cycle->categorie == $student->categorie)
                                                    <option value="{{ $cycle->id }}">{{$cycle->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('cycle')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="class">Class1 :</label>
                                        <select class="form-control" name="classe" id="class">
                                            @if(empty($student->class))
                                                <option  selected="" disabled=""> -- Choisir une classe -- </option>
                                            @endif
                                            @foreach ($classes as $classes1)
                                                <option value="{{ $classes1->id }}"{{ old('class') == $classes1->id || $student->class == $classes1->id ? 'selected' : '' }}>{{$classes1->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('classe')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-sm-6">
                                        <label>Transport :</label>
                                        <select class="form-control" name="transport" id="transport" onchange="change3('{{url('admin/ajax_get_trajet_by_transport')}}')" >
                                            @if ($student->transport == '')
                                                <option > -- Choisir une option -- </option>
                                            @endif
                                            @foreach ($transports as $trans)
                                                <option value="{{$trans->id}}"{{ old('transport') == $trans->id || $student->transport == $trans->id ? 'selected' : '' }}>{{$trans->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('transport')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>
                                     <div class="form-group col-sm-6">
                                        <label>Trajet :</label>
                                        <select class="form-control" name="trajet" id="trajet" >
                                            @if(empty($student->trajet))
                                                <option  selected="" disabled="">-- Trajet -- </option>
                                            @endif
                                            @foreach ($trajets as $trajets1)
                                                <option value="{{$trajets1->id}}"{{ old('trajet') == $trajets1->id || $student->trajet == $trajets1->id ? 'selected' : '' }}>{{$trajets1->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('trajet')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>
                                     
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                 <button type="submit" class="btn btn-roze">Modifier</button>
                              </div>
                              </form>
                           </div>
                        </div>
                    </div>
                    <div class="modal fade model3" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title">INFORMATION DE POSTE </h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <form  method="POST" action="{{url('admin/update_staff3')}}" enctype="multipart/form-data">
                                @csrf
                              <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="ok">Date de naissance :</label>
                                        <input type="date"  name="date" value="{{ $student->date }}" class="form-control" id="ok" >
                                    <input type="hidden" name="id" value="{{$student->id}}">
                                        @error('date')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="ok1">Adresse :</label>
                                        <input type="text"  name="adress" value="{{ $student->adress }}" class="form-control" id="ok1" >
                                        @error('adress')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="ok2">Salaire :</label>
                                        <input type="text"  name="salaire" value="{{ $student->salaire }}" class="form-control" id="ok2" >
                                        @error('salaire')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="ok3">Banque :</label>
                                        <input type="text"  name="banque" value="{{ $student->banque }}" class="form-control" id="ok3" >
                                        @error('banque')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="ok4">RIB :</label>
                                        <input type="text"  name="rib" value="{{ $student->rib }}" class="form-control" id="ok4" >
                                        @error('rib')
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
                    <div class="modal fade model4" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title">INFORMATION DE POSTE </h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <form  method="POST" action="{{url('test1')}}" enctype="multipart/form-data">
                              {{-- <form  method="POST" action="{{url('admin/update_student')}}" enctype="multipart/form-data"> --}}
                              @csrf
                              <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="customFile">Photo profil :</label>
                                            <div class="custom-file" >
                                               <input type="file" name="image" class="custom-file-input" id="customFile">
                                               <input type="hidden" name="id" value="{{$student->id}}">
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
                                        {{-- <label for="prix">Prix :</label>
                                        <input type="number" name="prix" value="{{ $student->prix }}" class="form-control" id="prix" >
                                        @error('prix')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror --}}
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="nom">Nom :</label>
                                        <input type="text"  name="nom" value="{{ $student->nom}}" class="form-control" id="nom" >
                                        @error('nom')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="pre">Prénom :</label>
                                        <input type="text"  name="pre" value="{{ $student->pre}}" class="form-control" id="pre" >
                                        @error('pre')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="nom1"> : الاسم الشخصي</label>
                                        <input type="text"  name="nom1" value="{{ $student->nom1}}" class="form-control" id="nom1" >
                                        @error('nom1')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="pre1">: الاسم العائلي</label>
                                        <input type="text"  name="pre1" value="{{ $student->pre1}}" class="form-control" id="pre1" >
                                        @error('pre1')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="facebook">Facebook :</label>
                                        <input type="text"  name="facebook" value="{{ $student->facebook }}" class="form-control" id="facebook" >
                                        @error('facebook')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="twitter">twitter :</label>
                                        <input type="text"  name="twitter" value="{{ $student->twitter }}" class="form-control" id="twitter" >
                                        @error('twitter')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="insta">Instagram :</label>
                                        <input type="text"  name="insta" value="{{ $student->insta }}" class="form-control" id="insta" >
                                        @error('insta')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="youtube">Youtube :</label>
                                        <input type="text"  name="youtube" value="{{ $student->youtube }}" class="form-control" id="youtube" >
                                        @error('youtube')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline" style="padding-left: 20px">
                                        <div class="custom-switch-inner">
                                           <p class="mb-0"> Passe ? </p>
                                           <input type="checkbox" name="passe" class="custom-control-input bg-success" id="customSwitch-22" {{ $student->passe == 'oui' ? 'checked' : '' }}>
                                           <label class="custom-control-label" for="customSwitch-22" data-on-label="oui" data-off-label="non">
                                           </label>
                                        </div>
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
                    <div class="modal fade model5" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Choisir le tuteur</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <form action="{{url('admin/update_tuteur')}}" method="post">
                                @csrf
                                    <div class="modal-body">
                                            @error('tuteur')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        @foreach ($parents as $parent)
                                            @if ($parent->tuteur == 'oui')
                                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline" style="padding-top: 10px" >
                                                    <input type="radio" id="customRadio-{{$parent->parent->id}}" value="{{$parent->parent->id}}" name="tuteur" checked class="custom-control-input bg-primary">
                                                    <label class="custom-control-label" for="customRadio-{{$parent->parent->id}}"> {{$parent->parent->nom.' '.$parent->parent->pre}}  ( {{$parent->relation}} ) </label>
                                                </div>
                                            @else
                                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline" style="padding-top: 10px" >
                                                    <input type="radio" id="customRadio-{{$parent->parent->id}}" value="{{$parent->parent->id}}" name="tuteur" class="custom-control-input bg-primary">
                                                    <label class="custom-control-label" for="customRadio-{{$parent->parent->id}}"> {{$parent->parent->nom.' '.$parent->parent->pre}}  ( {{$parent->relation}} )  </label>
                                                </div>
                                            @endif
                                        @endforeach
                                            <input type="hidden" name="student_id" value="{{$student->id}}" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-roze">Changer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iq-card-body">
                   <ul class="profile-img-gallary d-flex flex-wrap p-0 m-0">
                          <?php $n = 0 ?>
                          @foreach ($parents as $parent)
                                @if ($parent->tuteur == 'oui')
                                    <li class="col-md-4 col-6 pb-3"><center>( tuteur )</center><a href="javascript:void();"><img src="{{url($parent->parent->image)}}" style="width: 100px;height: 100px" alt="gallary-image" class="img-fluid"></a></li>
                                @else
                                    <li class="col-md-4 col-6 pb-3"><br><a href="javascript:void();"><img style="width: 100px;height: 100px" src="{{url($parent->parent->image)}}" alt="gallary-image" class="img-fluid"></a></li>
                                @endif
                          @endforeach
                   </ul>
                </div>
            </div>
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">LES FRÈRES</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                   <ul class="profile-img-gallary d-flex flex-wrap p-0 m-0">
                        @foreach ($freres as $frere)
                            @if ($frere->id != $student->id)
                                <li class="col-md-4 col-6 pb-3"><br><a title="{{$frere->nom.' '.$frere->pre}}"  href="{{url('admin/eleve/profil/'.$frere->id)}}"><img src="{{url($frere->image)}}" alt="gallary-image" class="img-fluid"></a></li> 
                            @endif
                        @endforeach
                   </ul>
                </div>
            </div>
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">FAMILLE & AMIS</h4>
                   </div>
                    <button type="button" class="btn btn-link" style="font-size: 22px">
                        <i class="ri-subtract-line" style="color: rgb(216, 86, 69)" data-toggle="modal" data-target=".model7" ></i>
                        <i class="ri-add-line" style="color: rgba(8, 155, 171, 1)" data-toggle="modal" data-target=".model6" ></i>
                    </button>
                    <div class="modal fade model6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <form method="POST" action="{{url('admin/add_friend')}}" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Ajouter un nouveau amie </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="cat">Catégorie :</label>
                                            <select class="form-control" onchange="change11('{{url('admin/ajax_get_cycle_by_categorie')}}')" name="categorie" id="cat1">
                                                @if(empty(old('categorie')))
                                                    <option  selected="" disabled=""> -- Choisir une classe -- </option>
                                                @endif
                                                @foreach ($categories as $categorie)
                                                    <option value="{{$categorie->id}}"{{ old('categorie') == $categorie->id ? 'selected' : '' }}>{{$categorie->name}}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="id" value="{{$student->id}}">
                                            <input type="hidden" name="hidden" value="categorie">
                                            @error('categorie')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="32154">Cycle :</label>
                                            <select class="form-control" onchange="change22('{{url('admin/ajax_get_class_by_cycle')}}')" name="cycle" id="cycle1">
                                                <option  selected="" disabled=""> -- Choisir un Cycle -- </option>
                                            </select>
                                            @error('cycle')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="class">Class :</label>
                                        <select class="form-control" name="classe" onchange="change6('{{url('admin/ajax_get_student_by_class_friend')}}','{{$student->id}}')" id="class1">
                                            <option  selected="" disabled=""> -- Choisir une classe -- </option>
                                            </select>
                                            @error('classe')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>éléves :</label>
                                            <select class="form-control" name="eleve" id="eleve" >
                                                <option selected disabled >-- Choisir un éléve --</option>
                                            </select>
                                            @error('transport')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-roze">Modifier</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="modal fade model7" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalScrollableTitle">Les amies</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                @foreach ($friends as $friend)
                                    <li><a href="{{url('admin/eleve/profil/'.$friend->id)}}"><img title="{{$friend->nom.' '.$friend->pre}}" src="{{url($friend->image)}}" style="width: 50px" alt="gallary-image" class="img-fluid"></a>
                                    {{$friend->nom.' '.$friend->pre}} <i class="ri-close-fill"   onclick="supprime1({{ $friend->id }});" style="color: rgb(104, 43, 94); float:right; font-size: 20px"></i></li>
                                    
                                    <form id="logout-form1{{ $friend->id }}" action="{{ url('admin/delete/friend/'.$friend->id.'/'.$student->id)}}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endforeach
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                              </div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="iq-card-body">
                    <ul class="profile-img-gallary d-flex flex-wrap p-0 m-0">
                        @foreach ($friends as $friend)
                            <li class="col-md-4 col-6 pb-3"><a href="{{url('admin/eleve/profil/'.$friend->id)}}"><img title="{{url($friend->nom.' '.$friend->pre)}}" src="{{url($friend->image)}}" alt="gallary-image" class="img-fluid"></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">LES IMAGES</h4>
                    </div>
                    <button type="button" class="btn btn-link" style="font-size: 22px">
                        <i class="ri-add-line" style="color: rgba(8, 155, 171, 1)" data-toggle="modal" data-target=".model8" ></i>
                    </button>
                    <div class="modal fade model8" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <form method="POST" action="{{url('admin/add_student_image')}}" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Ajouter une image </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="customFile">Image :</label>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="customFile">
                                        <input type="hidden" name="id" value="{{ $student->id }}">
                                            <label class="custom-file-label" for="customFile">Choisir fichier</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-roze">Ajouter</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="iq-card-body">
                   <ul class="profile-img-gallary d-flex flex-wrap p-0 m-0">
                        @foreach ($images as $image)
                            <li class="col-md-4 col-6 pb-3"><a href="javascript:void();"><img src="{{url($image->image)}}" alt="gallary-image" class="img-fluid"></a></li>
                        @endforeach
                      
                   </ul>
                </div>
            </div>
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Carastéristique</h4>
                    </div>
                    <button type="button" class="btn btn-link" style="font-size: 18px">
                        <i class="ri-pencil-line pr-0" style="color:rgba(8, 155, 171, 1)" data-toggle="modal" data-target=".salam1"></i>
                    </button>
                </div>
                <div class="iq-card-body">
                    <div class="about-info m-0 p-0">
                        <div class="row">
                            <div class="col-6 p-2">Groupe sanguin :</div>
                            <div class="col-6 p-2">{{$student->blood}}</div>
                            <div class="col-6 p-2">Taille :</div>
                            <div class="col-6 p-2">{{$student->height}} Cm</div>
                            <div class="col-6 p-2">Poids :</div>
                            <div class="col-6 p-2">{{$student->weight}} Kg</div>
                            <div class="col-6 p-2">Etat de santé :</div>
                            <div class="col-6 p-2">{{$student->fich}} </div>
                                
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade salam1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <form method="POST" action="{{url('admin/update_student')}}" enctype="multipart/form-data">
                    @csrf
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Carastéristique</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="blood">Groupe sanguin :</label>
                                <select name="blood" id="blood" class="form-control">
                                    @if (empty($student->blood))
                                        <option selected=""  disabled> -- Choisir un group -- </option>
                                    @endif
                                    <option value="O+" {{ old('blood') == 'O+' || $student->blood == 'O+' ? 'selected' : '' }}>O+</option>
                                    <option value="A+" {{ old('blood') == 'A+' || $student->blood == 'A+' ? 'selected' : '' }}>A+</option>
                                    <option value="B+" {{ old('blood') == 'B+' || $student->blood == 'B+' ? 'selected' : '' }}>B+</option>
                                    <option value="AB+" {{ old('blood') == 'AB+' || $student->blood == 'AB+' ? 'selected' : '' }}>AB+</option>
                                    <option value="O-" {{ old('blood') == 'O-' || $student->blood == 'O-' ? 'selected' : '' }}>O-</option>
                                    <option value="A-" {{ old('blood') == 'A-' || $student->blood == 'A-' ? 'selected' : '' }}>A-</option>
                                    <option value="B-" {{ old('blood') == 'B-' || $student->blood == 'B-' ? 'selected' : '' }}>B-</option>
                                    <option value="AB-" {{ old('blood') == 'AB-' || $student->blood == 'AB-' ? 'selected' : '' }}>AB-</option>
                                </select>
                                    @error('blood')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                <input type="hidden" value="{{$student->id}}" name="id">
                                <input type="hidden" value="blood" name="hidden">
                            </div>
                            <div class="form-group">
                                <label for="height">Taille (cm) :</label>
                                <input type="text" name="height" value="{{$student->height}}" id="height" class="form-control">
                                    @error('blood')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="weight">Poids (Kg) :</label>
                                <input type="text" name="weight" value="{{$student->weight}}" id="weight" class="form-control">
                                    @error('weight')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="fich">Etat de santé :</label>
                            <textarea name="fich" class="form-control" id="fich" > {{$student->fich}}</textarea>
                                    @error('fich')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-roze">Ajouter</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Loisires</h4>
                    </div>
                    {{-- <button type="button" class="btn btn-roze mb-0" data-toggle="modal" data-target=".salam2"><i class="ri-pencil-line pr-0"></i></button> --}}
                </div>
                <div class="iq-card-body">
                    <div class="about-info m-0 p-0">
                        <div class="row">
                                <div class="col-12 p-2">Theatre</div>
                                <div class="col-12 p-2">Cinema</div>
                                <div class="col-12 p-2">Music</div>
                                
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="modal fade salam2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <form method="POST" action="{{url('admin/update_student')}}" enctype="multipart/form-data">
                    @csrf
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Carastéristique</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" name="height" value="{{$student->height}}" id="height1" class="form-control">
                                    @error('blood')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="blood" value="{{$student->blood}}" id="blood1" class="form-control">
                                    @error('blood')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="weight" value="{{$student->weight}}" id="weight1" class="form-control">
                                    @error('weight')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-roze">Ajouter</button>
                        </div>
                    </div>
                </div>
                </form>
            </div> --}}
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">MÉDICINE TRAITANT</h4>
                    </div>
                    <button type="button" class="btn btn-link" style="font-size: 18px">
                        <i class="ri-pencil-line pr-0" style="color:rgba(8, 155, 171, 1)" data-toggle="modal" data-target=".salam3"></i>
                    </button>
                </div>
                <div class="iq-card-body">
                    <div class="about-info m-0 p-0">
                        <div class="row" style="float: center">
                                <div class="col-6 p-2">Nom et prénom :</div>
                                <div class="col-6 p-2">{{$student->med_nom}}</div>
                                <div class="col-6 p-2">Tel :</div>
                                <div class="col-6 p-2">{{$student->med_tel}} </div>
                                <div class="col-6 p-2">Adress :</div>
                                <div class="col-6 p-2">{{$student->med_adress}}</div>
                                
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade salam3 " tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <form method="POST" action="{{url('admin/update_student')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="med_nom">Nom et prénom :</label>
                                    <input type="text" name="med_nom" value="{{$student->med_nom}}" id="med_nom" class="form-control">
                                    @error('med_nom')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input type="hidden" value="{{$student->id}}" name="id">
                                    <input type="hidden" value="fich" name="hidden">
                                </div>
                                <div class="form-group">
                                    <label for="med_tel">Tel :</label>
                                    <input type="text" name="med_tel" value="{{$student->med_tel}}" id="med_tel" class="form-control">
                                    @error('med_tel')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="med_adress">Adress :</label>
                                    <input type="text" name="med_adress" value="{{$student->med_adress}}" id="med_adress" class="form-control">
                                    @error('med_adress')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-roze">Modifier</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-8">  
            <div class="row">
                <div class="col-md-6">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Informations scolaires</h4>
                            </div>
                            <button type="button" class="btn btn-link" style="font-size: 18px">
                                <i class="ri-pencil-line pr-0" style="color:rgba(8, 155, 171, 1)" data-toggle="modal" data-target=".model2"></i>
                            </button>
                        </div>
                        <div class="iq-card-body">
                            <div class="about-info m-0 p-0">
                                <div class="row">
                                        <div class="col-6 p-2">Cataégorie:</div>
                                        <div class="col-6 p-2">{{$student->categorie}}</div>
                                        <div class="col-6 p-2">Cycle :</div>
                                        <div class="col-6 p-2">{{$cycle->name}}</div>
                                        <div class="col-6 p-2">Class:</div>
                                        <div class="col-6 p-2">
                                            @if(!empty($class->name))
                                                {{ $class->name }}
                                            @elseif(empty($class->name))
                                                {{$student->class}}
                                            @endif</div>
                                        <div class="col-6 p-2">Numéro d'éléve:</div>
                                        <div class="col-6 p-2">{{$student->class_num}}</div>
                                        <div class="col-6 p-2">Transport:</div>
                                        <div class="col-6 p-2">@if(!empty($student->transport)){{$transport->name}}@endif</div>
                                        <div class="col-6 p-2">Trajet:</div>
                                        <div class="col-6 p-2">@if(!empty($student->trajet)){{$trajet->name}}@endif</div>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                            <h4 class="card-title">Informations générales</h4>
                            </div>
                            <button type="button" class="btn btn-link" style="font-size: 18px">
                                <i class="ri-pencil-line pr-0" style="color:rgba(8, 155, 171, 1)" data-toggle="modal" data-target=".model1"></i>
                            </button>
                        </div>
                        <div class="iq-card-body">
                            <div class="about-info m-0 p-0">
                                <div class="row">
                                    <div class="col-6 p-2">Code massar:</div>
                                    <div class="col-6 p-2">{{$student->id1}}</div><br><br>
                                    <div class="col-6 p-2">Sexe :</div>
                                    <div class="col-6 p-2">{{$student->sex}}</div><br><br>
                                    <div class="col-6 p-2">Date de naissance :</div>
                                    <div class="col-6 p-2">{{$student->date}}</div><br><br>
                                    <div class="col-6 p-2">Numéro d'inscription :</div>
                                    <div class="col-6 p-2">{{$student->incsription_num}}</div>
                                    {{-- <div class="col-6 p-2">Téléphone :</div>
                                    <div class="col-6 p-2">{{$student->tele}}</div>
                                    <div class="col-6 p-2">E-mail: :</div>
                                    <div class="col-6 p-2">{{$student->mail}}</div> --}}
                                    <div class="col-6 p-2">Adress :</div>
                                    <div class="col-6 p-2">{{$student->adress}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="iq-accordion career-style faq-style  ">
                        <div class="iq-card iq-accordion-block accordion-active">
                            <div class="active-faq clearfix">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12"><a ><span> <h4>Frais 
                                            @if ($student->payement == 'anné')
                                                (tout l'anné est payé)
                                            @endif  
                                            @if ($student->payement != 'anné')
                                                <button type="button" class="btn btn-link" style="font-size: 18px">
                                                    <i class="ri-pencil-line pr-0" style="color:rgba(8, 155, 171, 1)" data-toggle="modal" data-target="#modeltest"></i>
                                                </button>
                                            @endif
                                            @if ($show == 'oui')
                                                <i class="ri-add-line" id="shide" style="color:  rgba(8, 155, 171, 1); font-size:23px" data-toggle="modal" data-target="#modeltest1"></i>
                                            @endif   
                                            </h4> </span> </a>
                                            <div class="modal fade" id="modeltest" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <form method="POST" action="{{url('admin/add_student_frai_multiple')}}" enctype="multipart/form-data">
                                                    @csrf
                                               <div class="modal-dialog modal-dialog-centered" role="document">
                                                  <div class="modal-content">
                                                     <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter des frais</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                     </div>
                                                     <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="name">Prix :</label>
                                                                <input type="text" name="prix" class="form-control">
                                                                <input type="hidden" value="{{$student->id}}" name="id" id="student">
                                                                @error('prix')
                                                                    <span  style="color: red" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="name">Nombre du mois :</label>
                                                                <input type="number" name="nombre" class="form-control">
                                                                @error('nombre')
                                                                    <span  style="color: red" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                     </div>
                                                     <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                                     </div>
                                                  </div>
                                               </div>
                                                </form>
                                            </div>
                                            <div class="modal fade" id="modeltest1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <form method="POST" action="{{url('admin/add_student_prix')}}" enctype="multipart/form-data">
                                                    @csrf
                                               <div class="modal-dialog modal-dialog-centered" role="document">
                                                  <div class="modal-content">
                                                     <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un prix</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                     </div>
                                                     <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="name">Prix :</label>
                                                                <input type="number" name="prix" id="name" class="form-control">
                                                                <input type="hidden" value="{{$student->id}}" name="id" id="student">
                                                            </div>
                                                     </div>
                                                     <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                        <button type="submit" class="btn btn-primary">Ajouter</button>
                                                     </div>
                                                  </div>
                                               </div>
                                                </form>
                                            </div>
                                        </div>
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
                                                                <th scope="col">Montant (Dh)
                                                                <input type="hidden" id="url" value="{{url('admin/ajax_update_prix_student')}}">
                                                                </th>
                                                                <th scope="col">Statut</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $n = 0; 
                                                                  $t = 0; ?>
                                                            @foreach ($student->mois as $item => $value)
                                                            <tr>
                                                                <td>{{$value['ok']}}</td>
                                                                @if ($value['etat'] == 'oui')
                                                                <td>{{$value['prix']}} DH</td>
                                                                <td><span class="badge badge-success">Payé</span></td>
                                                                @endif
                                                                @if ($value['etat'] == 'non')
                                                                    @if ($t === 0)
                                                                        <input type="hidden" id="mois" value="{{$value['ok']}}">
                                                                        <td id="input{{$n}}" ondblclick="dbclick_prix('{{$value['ok']}}','{{$value['prix']}}', '{{$n}}', '{{count($student->mois)}}')">{{$value['prix']}} DH</td>
                                                                        <?php $t++; ?>
                                                                    @else
                                                                        <td id="input{{$n}}">{{$value['prix']}} DH</td>
                                                                        @endif
                                                                        <?php $n++; ?>
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
                        <div class="iq-card iq-accordion-block">
                            <div class="active-faq clearfix">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a  style="padding-right: 20px"><span><h4> Document <i class="ri-add-line" style="color:  rgba(8, 155, 171, 1); font-size:23px" data-toggle="modal" data-target="#Document"></i></h4> </span> </a>
                                        </div>
                                        
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
                                                        <th scope="col" style="text-align: center">Nom</th>
                                                        <th scope="col" style="text-align: center">Document</th>
                                                        <th scope="col" style="text-align: center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        @foreach ($files as $file)
                                                            <tr>
                                                                <td style="text-align: center">{{$file->name}}</td>
                                                                <td style="text-align: center"><a href="{{url('/admin/download/student_file/'.$file->id) }}"><button type="button" class="btn btn-link" style="font-size: 22px"><i class="ri-download-cloud-fill" style="color: rgba(8, 155, 171, 1)"></i></button></a></td>
                                                                <td  style="text-align: center">{{-- <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$file->id}}">Supprimer</button> --}}
                                                                    <button type="button" class="btn btn-link" style="font-size: 18px">
                                                                        <i class="ri-delete-bin-2-fill" style="color: rgba(8, 155, 171, 1)" data-toggle="modal" data-target="#Document{{$file->id}}" ></i>
                                                                    </button>
                                                                </td>
                                                                <form id="logout-form{{ $file->id }}" action="{{ url('admin/delete/student_file/'.$file->id)}}" method="POST" style="display: none;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </tr>  
                                                        @endforeach
                                                </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="Document" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <form method="POST" action="{{url('admin/add_student_file')}}" enctype="multipart/form-data">
                                                @csrf
                                           <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                                 <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un document</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                 </div>
                                                 <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="name">Nom :</label>
                                                            <input type="text" name="name" id="name1" class="form-control">
                                                            <input type="hidden" value="{{$student->id}}" name="id">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="customFile">Image :</label>
                                                            <div class="custom-file">
                                                               <input type="file" name="image" class="custom-file-input" id="customFile">
                                                               <label class="custom-file-label" for="customFile">Choisir fichier</label>
                                                            </div>
                                                        </div>
                                                 </div>
                                                 <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                                 </div>
                                              </div>
                                           </div>
                                            </form>
                                        </div>
                                        <!-- Modal -->
                                        @foreach ($files as $file)
                                        <div class="modal fade" id="Document{{$file->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <a onclick="supprime({{ $file->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
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
                        <div class="iq-card iq-accordion-block">
                            <div class="active-faq clearfix">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a  style="padding-right: 20px"><span > <h4>Timeline  <i class="ri-add-line" style="color:  rgba(8, 155, 171, 1); font-size:23px" data-toggle="modal" data-target="#timeline"></i></h4> </span> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-details">
                                <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                            <div class="iq-card-body">
                                            <ul class="iq-timeline">
                                                <?php $n = 0; ?>
                                                @foreach ($timeline as $timeline1)
                                                    <li>
                                                        <?php $n = $n+1; 
                                                            if ($n == 1) {
                                                                $number = 'border-success';
                                                            } 
                                                            if ($n == 2) {
                                                                $number = 'border-warning';
                                                            } 
                                                            if ($n == 3) {
                                                                $number = 'border-info';
                                                            } 
                                                            if ($n == 4) {
                                                                $number = 'border-dark';
                                                            } 
                                                        ?>
                                                        <div class="timeline-dots {{$number}}"></div>
                                                        <h6 class="float-left mb-1"><b>{{$timeline1->by}}</b> :</h6>
                                                        <small class="float-right mt-1">{{$timeline1->created_at}}</small>
                                                        <div class="d-inline-block w-100">
                                                            <p>{{ substr($timeline1->sujet, 0, 70)}} @if (strlen($timeline1->sujet) > 70) ... @endif</p>
                                                            @if (!empty($timeline1->image))
                                                                <a href="{{url('admin/download/timeline_file/'.$timeline1->id)}}"><b style="color:rgba(8, 155, 171, 1)">Télécharger le document</b></a>
                                                            @endif
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <button type="button" data-toggle="modal" data-target="#exampleModalScrollable" class="btn btn-link" style="font-size: 15px; float: right;">
                                                <i class="ri-eye-line" style="color: rgba(8, 155, 171, 1)"> afficher tout</i>
                                                </button>
                                            </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalScrollableTitle">TIMELINE</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul class="iq-timeline">
                                                                <?php $n = 0; ?>
                                                                @foreach ($timelines as $timelines1)
                                                                <li>
                                                                    <?php
                                                                    if ($n < 8) {
                                                                        $n = $n+1; 
                                                                    } else{
                                                                        $n = 1;
                                                                    }
                                                                        if ($n == 1) {
                                                                            $number = 'border-success';
                                                                        } 
                                                                        if ($n == 2) {
                                                                            $number = 'border-warning';
                                                                        } 
                                                                        if ($n == 3) {
                                                                            $number = 'border-info';
                                                                        } 
                                                                        if ($n == 4) {
                                                                            $number = 'border-dark';
                                                                        } 
                                                                        if ($n == 5) {
                                                                            $number = 'border-danger';
                                                                        } 
                                                                        if ($n == 6) {
                                                                            $number = 'border-primary';
                                                                        } 
                                                                        if ($n == 7) {
                                                                            $number = 'border-secondary';
                                                                        } 
                                                                    ?>
                                                                    <div class="timeline-dots {{$number}}"></div>
                                                                    <h6 class="float-left mb-1"><b>{{$timelines1->by}}</b> :</h6>
                                                                    <small class="float-right mt-1">{{$timeline1->created_at}}</small>
                                                                    <div class="d-inline-block w-100">
                                                                        <p>{{$timelines1->sujet}} </p><br>
                                                                        @if (!empty($timelines1->image))
                                                                            <a href="{{url('admin/download/timeline_file/'.$timelines1->id)}}"><b style="color:red">téléchergerle document</b></a>
                                                                        @endif
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-roze" data-dismiss="modal">Fermer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                        </div>
                                        <div class="modal fade" id="timeline" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <form method="POST" action="{{url('admin/add_timeline')}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un commentaire</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="name">Sujet :</label>
                                                                <textarea name="sujet" class="form-control" id="name3"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="customFile">Image :</label>
                                                                <div class="custom-file">
                                                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                                                    <input type="hidden" value="{{$student->id}}" name="id">
                                                                    <label class="custom-file-label" for="customFile">Choisir fichier</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                            <button type="submit" class="btn btn-roze">Ajouter</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- Modal -->
                                        @foreach ($files as $file)
                                        <div class="modal fade" id="exampleModal{{$file->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <a onclick="supprime({{ $file->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
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
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection