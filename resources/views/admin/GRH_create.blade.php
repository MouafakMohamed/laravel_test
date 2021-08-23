@extends('admin/layouts.app')
@section('css')
 <style>
     .hide {
         display: none;
     }
     #display{
         display: none;
     }
     #display1{
         display: none;
     }
     #display2{
         display: none;
     }
     #post_display{
         display: none;
     
     }#post_display1{
         display: none;
     }
     #salaire_heure{
         display: none;
     }
     #poste1 {
         display: none;
     }
 </style>
@endsection
@section('js')
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
                        }
                function fonction_data(type) {
                            var elements = document.getElementsByClassName('hide');
                                for(var i = 0, length = elements.length; i < length; i++) {
                                    elements[i].style.display = 'block';
                                }
                        document.getElementById("post_display").style.display = "block";
                        document.getElementById("post_display1").style.display = "none";
                        document.getElementById("salaire_heure").style.display = "none";
                }
                function fonction_data1(type) {
                            var elements = document.getElementsByClassName('hide');
                                for(var i = 0, length = elements.length; i < length; i++) {
                                    elements[i].style.display = 'block';
                                }
                        document.getElementById("post_display").style.display = "none";
                        document.getElementById("post_display1").style.display = "block";
                        document.getElementById("salaire_heure").style.display = "none";
                }
                function fonction_data2(type) {
                            var elements = document.getElementsByClassName('hide');
                                for(var i = 0, length = elements.length; i < length; i++) {
                                    elements[i].style.display = 'block';
                                }
                        document.getElementById("post_display").style.display = "none";
                        document.getElementById("post_display1").style.display = "none";
                        document.getElementById("salaire_heure").style.display = "block";
                        document.getElementById("poste1").style.display = "none";
                }
                function change_post(type) {
                            
                    var action = $('#'+type).val();
                    if (action == 'Autre') {
                        document.getElementById("poste1").style.display = "block";
                    }else{
                        document.getElementById("poste1").style.display = "none";
                    }
                }
                    

                    
                
</script>
@endsection

@section('content')
<div class="container-fluid">
    <form id="form-wizard3" method="POST" action="{{url('admin/add_user')}}" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-body" style="text-align: center" >
                        <center>
                            <div class="col-md-6">
                                {{-- <div class="form-group">
                                    <label>Fonction:</label>
                                    <select class="form-control" onchange="fonction_data()" name="fonction" id="fonction">
                                        !@empty(old('fonction'))
                                            <option value="">Choisir une fonction</option>
                                        @endempty
                                            <option value="administration"  {{ old('fonction') == 'administration' ? 'selected' : '' }}> Administration</option>
                                            <option value="Professeur"  {{ old('fonction') == 'Professeur' ? 'selected' : '' }}> Professeur</option>
                                            <option value="Accompagnement"  {{ old('fonction') == 'Accompagnement' ? 'selected' : '' }}> Accompagnement</option>
                                            <option value="Chauffeur"  {{ old('fonction') == 'Chauffeur' ? 'selected' : '' }}> Chauffeur</option>
                                            <option value="Menage"  {{ old('fonction') == 'Menage' ? 'selected' : '' }}> Menage</option>
                                    </select>
                                    @error('fonction')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div> --}}
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input type="radio" id="customRadio-1"  onchange="fonction_data('Administration')" value="Administration" name="fonction" class="custom-control-input bg-primary">
                                    <label class="custom-control-label" for="customRadio-1"> Administration </label>
                                </div>
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input type="radio" id="customRadio-2"  onchange="fonction_data2('Professeur')" value="Professeur" name="fonction" class="custom-control-input bg-primary">
                                    <label class="custom-control-label" for="customRadio-2"> Professeur </label>
                                </div>
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input type="radio" id="customRadio-3"  onchange="fonction_data1('Staff')" value="Staff" name="fonction" class="custom-control-input bg-primary">
                                    <label class="custom-control-label" for="customRadio-3"> Staff </label>
                                </div>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 hide">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Ajouter un Employés</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="form-group">
                            <div class="add-img-user profile-img-edit">
                            <img class="profile-pic img-fluid" id="image" src="{{ url('/assets/')}}/images/user/11.png" alt="profile-pic">
                                {{-- <div class="p-image">
                                
                                <input  class="file-upload" type="file">
                            </div> --}}
                            <br>
                            <input type="file" style="width: 220px" onchange="show_image.call(this)" value="{{ old('image') }}" name="image">
                                @error('image')
                                    <span  style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                            <div class="img-extension mt-3">
                                <div class="d-inline-block align-items-center">
                                <span>seulement</span>
                                <a href="javascript:void();">.jpg</a>
                                <a href="javascript:void();">.png</a>
                                <a href="javascript:void();">.jpeg</a>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label>Fonction:</label>
                            <select class="form-control" onchange="fonction_data()" name="fonction" id="fonction">
                                !@empty(old('fonction'))
                                    <option value="">Choisir une fonction</option>
                                @endempty
                                    <option value="administration"  {{ old('fonction') == 'administration' ? 'selected' : '' }}> Administration</option>
                                    <option value="Professeur"  {{ old('fonction') == 'Professeur' ? 'selected' : '' }}> Professeur</option>
                                    <option value="Accompagnement"  {{ old('fonction') == 'Accompagnement' ? 'selected' : '' }}> Accompagnement</option>
                                    <option value="Chauffeur"  {{ old('fonction') == 'Chauffeur' ? 'selected' : '' }}> Chauffeur</option>
                                    <option value="Menage"  {{ old('fonction') == 'Menage' ? 'selected' : '' }}> Menage</option>
                            </select>
                            @error('fonction')
                                    <span  style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div> --}}
                        <div class="form-group">
                            <label for="furl">RIB :</label>
                            <input type="text" name="rib" class="form-control" value="{{ old('rib') }}" id="furl" placeholder="...">
                            @error('rib')
                                <span  style="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="turl">Banque :</label>
                            <input type="text" name="banque" class="form-control" value="{{ old('banque') }}" id="turl" placeholder="...">
                            @error('banque')
                                    <span  style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="cnss">IMMATRICULATION DE CNSS :</label>
                            <input type="text" name="cnss" class="form-control" value="{{ old('cnss') }}" id="cnss" placeholder="...">
                            @error('cnss')
                                <span  style="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Réseaux sociaux</h4>
                    </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="form-group">
                            <label for="furl">Facebook :</label>
                            <input type="text" name="facebook" class="form-control" value="{{ old('facebook') }}" id="furl" placeholder="L'adresse URL de Facebook">
                            @error('image')
                                    <span  style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="turl">Twitter :</label>
                            <input type="text" name="twitter" class="form-control" value="{{ old('twitter') }}" id="turl" placeholder="L'adresse URL de Twitter">
                            @error('image')
                                    <span  style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="instaurl">Instagram :</label>
                            <input type="text" name="insta" class="form-control" value="{{ old('insta') }}" id="instaurl" placeholder="L'adresse URL de Instagram">
                            @error('image')
                                    <span  style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="lurl">Linkedin :</label>
                            <input type="text" name="linked" class="form-control" value="{{ old('linked') }}" id="lurl" placeholder="L'adresse URL de Linkedin">
                            @error('image')
                                    <span  style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 hide">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Informations Générales</h4>
                    </div>
                    </div>
                    <div class="iq-card-body">
                    <div class="new-user-info">
                            <div class="row">
                            <div class="form-group col-md-6">
                                <label for="fname">Nom:</label>
                                <input type="text" name="nom" value="{{ old('nom') }}" class="form-control" id="fname" placeholder="Votre nom" required>
                                @error('nom')
                                    <span  style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group col-md-6">
                                <label for="lname">prénom:</label>
                                <input type="text" name="pre" value="{{ old('pre') }}" class="form-control" id="lname" placeholder="Votre prenom" required>
                                @error('pre')
                                    <span  style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group col-md-6">
                                <label for="exampleInputphone">Téléphone</label>
                                <input type="number" name="tele" value="{{ old('tele') }}" class="form-control" id="exampleInputphone" placeholder="(+212) 06...." required>
                                @error('tele')
                                    <span  style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                <label>Sexe:</label>
                                <select class="form-control" name="sex" id="selectcountry" required>
                                    @empty(old('sex'))
                                            <option value="">-- SEXE -- </option>
                                    @endempty
                                            <option value="Homme"  {{ old('sex') == 'Homme' ? 'selected' : '' }}> Homme</option>
                                            <option value="Femme"  {{ old('sex') == 'Femme' ? 'selected' : '' }}> Femme</option>
                                </select>
                                @error('sex')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                <label for="exampleInputdate">Date de naissance</label>
                                <input type="date" class="form-control" name="date" value="{{ old('date') }}" id="exampleInputdate" placeholder="2019-12-18" required>
                                @error('date')
                                    <span  style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group col-md-6">
                                <label for="add2">CIN :</label>
                                <input type="text" class="form-control" name="cin" value="{{ old('cin') }}" id="add2" placeholder="ex : C....." required>
                                @error('cin')
                                    <span  style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group col-md-6">
                                <label for="cname">Email:</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="cname" placeholder="EX : example@example.com" required>
                                @error('email')
                                    <span  style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                <label>Situation familiale :</label>
                                <select class="form-control" name="status" id="selectcountry">
                                    @empty(old('status'))
                                            <option value="">-- Situation --</option>
                                    @endempty
                                            <option value="Célibataire"  {{ old('status') == 'Célibataire' ? 'selected' : '' }}> Célibataire</option>
                                            <option value="Fiancé(e)"  {{ old('status') == 'Fiancé(e)' ? 'selected' : '' }}> Fiancé(e)</option>
                                            <option value="Marié(e)"  {{ old('status') == 'Marié(e)' ? 'selected' : '' }}> Marié(e)</option>
                                            <option value="Divorcé(e)"  {{ old('status') == 'Divorcé(e)' ? 'selected' : '' }}> Divorcé(e)</option>
                                            <option value="Veuf/veuve"  {{ old('status') == 'Veuf/veuve' ? 'selected' : '' }}> Veuf/veuve</option>
                                </select>
                                @error('status')
                                    <span  style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group col-md-12">
                                <label for="cname6541">adress:</label>
                                <textarea type="text" name="adress" class="form-control" id="cname6541">{{ old('adress') }}</textarea>
                                @error('adress')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                    </div>
                    </div>
                </div>
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Profil de Poste</h4>
                    </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="new-user-info">
                                <div class="row">
                                    <div class="form-group col-md-6" id="post_display">
                                        <label for="action1">Poste occupé:</label>
                                        <select class="form-control" name="post" id="action1" onchange="change_post('action1')" >
                                            @empty(old('post'))
                                                <option value="">-- CHOISIR TYPE --</option>
                                            @endempty
                                            <option value="secrétaire"  {{ old('post') == 'secrétaire' ? 'selected' : '' }}> secrétaire </option>
                                            <option value="Autre"  {{ old('post') == 'Autre' ? 'selected' : '' }}> Autre</option>
                                        </select>
                                        @if (session()->has('post'))
                                            <span  style="color: red" role="alert">
                                                <strong>{{ session()->get('post') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6" id="post_display1">
                                        <label for="action">Poste occupé:</label>
                                        <select class="form-control" name="post1" id="action" onchange="change_post('action')" >
                                            @empty(old('post'))
                                                <option value="">-- CHOISIR POST --</option>
                                            @endempty
                                            <option value="Accompagnement"  {{ old('post') == 'Accompagnement' ? 'selected' : '' }}> Accompagnement</option>
                                            <option value="Chauffeur"  {{ old('post') == 'Chauffeur' ? 'selected' : '' }}> Chauffeur</option>
                                            <option value="Menage"  {{ old('post') == 'Menage' ? 'selected' : '' }}> Menage</option>
                                            <option value="Sécurité"  {{ old('post') == 'Sécurité' ? 'selected' : '' }}> Sécurité</option>
                                            <option value="Autre"  {{ old('post') == 'Autre' ? 'selected' : '' }}> Autre</option>
                                        </select>
                                        @if (session()->has('post'))
                                            <span  style="color: red" role="alert">
                                                <strong>{{ session()->get('post') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6" id="poste1">
                                        <label for="post_name">nom du post </label>
                                        <input type="text" class="form-control" name="post_name"  value="{{ old('post_name') }}" id="post_name" value="2019-12-18">
                                        @error('post_name')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Type de contrat:</label>
                                        <select class="form-control" name="type" onchange="searsh()" id="change" required>
                                            @empty(old('type'))
                                                <option value="">-- CHOISIR TYPE --</option>
                                            @endempty
                                            <option value="CDI"  {{ old('type') == 'CDI' ? 'selected' : '' }}> CDI</option>
                                            <option value="CDD"  {{ old('type') == 'CDD' ? 'selected' : '' }}> CDD</option>
                                            <option value="Intérim"  {{ old('type') == 'CélibataiIntérimrIntérime' ? 'selected' : '' }}> Intérim</option>
                                            <option value="stagiaire"  {{ old('type') == 'stagiaire' ? 'selected' : '' }}> stagiaire</option>
                                        </select>
                                        @error('type')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6" id="salam2">
                                        <label for="add2154">Date d'adhésion :</label>
                                        <input type="date" name="date1" value="{{ old('date1') }}" class="form-control" id="add2154" placeholder="2019-12-18" >
                                        @error('date1')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3" id="display" >
                                        <label for="add25">Date d'adhésion :</label>
                                        <input type="date" name="date3" value="{{ old('date3') }}" class="form-control" id="add25" placeholder="2019-12-18" >
                                        @error('date3')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3" id="display1" >
                                        <label for="exampleInputphone187">Finit à :</label>
                                        <input type="date" name="date2" value="{{ old('date2') }}" class="form-control" id="exampleInputphone187" placeholder="2019-12-18">
                                        @error('date2')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-6" id="salaire_heure">
                                        <label>Type de salaire:</label>
                                        <select class="form-control" name="type1" >
                                            @empty(old('type1'))
                                                <option value="">-- CHOISIR --</option>
                                            @endempty
                                            <option value="mois"  {{ old('type1') == 'mois' ? 'selected' : '' }}>par mois</option>
                                            <option value="heur"  {{ old('type1') == 'heur' ? 'selected' : '' }}>par heur</option>
                                        </select>
                                        @error('type')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputdate654">Salaire </label>
                                        <input type="number" class="form-control" name="salaire"  value="{{ old('salaire') }}" id="exampleInputdate654" required>
                                        @error('salaire')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                    <label for="add2321254587">Compétences professionnelles :</label>
                                    <textarea type="text" name="compet" class="form-control" id="add2321254587">{{ old('compet') }}</textarea>
                                    @error('compet')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 hide">
                <div class="iq-card">
                    <div class="iq-card-body" style="text-align: center" >
                        <center>
                            <div class="form-group col-md-12" style="text-align: center">
                                <button  type="submit" class="btn btn-primary btn-lg"><i class="ri-check-fill"></i> Ajouter</button>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </form>
 </div>
@endsection