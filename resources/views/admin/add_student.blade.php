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
     #post_display{
         display: none;
     }
     #garcon1, #garcon2, #garcon3, #garcon4, #garcon5 {
         background-color: rgba(2, 209, 255, 1);
     }
     #fille1, #fille2, #fille3, #fille4, #fille5 {
         background-color: rgb(240, 147, 224);
     }
     #white1, #white2, #white3, #white4, #white5 {
        color: aliceblue;
     }
     #btn3{
        background-color: rgb(240, 147, 224); 
        color: aliceblue;
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
                            
                            $('#data').html(data);
                        }
                function searsh1() {
                    var ok = document.getElementById('sex');
                    var val = document.getElementById('val');
                    alert(ok.value)
                    if (ok.value == 'Garçon') {
                            document.getElementById("btn1").style.display = "";
                            document.getElementById("btn2").style.display = "none";
                            document.getElementById("btn3").style.display = "none";
                        if(val.value == 'fille'){
                            document.getElementById("fille1").id = "garcon1";
                            document.getElementById("fille2").id = "garcon2";
                            document.getElementById("fille3").id = "garcon3";
                            document.getElementById("fille4").id = "garcon4";
                            document.getElementById("fille5").id = "garcon5";
                            document.getElementById("val").value = "garcon";
                        }else{
                            document.getElementById("color1").id = "garcon1";
                            document.getElementById("color2").id = "garcon2";
                            document.getElementById("color3").id = "garcon3";
                            document.getElementById("color4").id = "garcon4";
                            document.getElementById("color5").id = "garcon5";

                            document.getElementById("color11").id = "white1";
                            document.getElementById("color12").id = "white2";
                            document.getElementById("color13").id = "white3";
                            document.getElementById("color14").id = "white4";
                            document.getElementById("color15").id = "white5";

                            document.getElementById("val").value = "garcon";
                        }
                    }else{
                            document.getElementById("btn1").style.display = "none";
                            document.getElementById("btn2").style.display = "none";
                            document.getElementById("btn3").style.display = "";
                        if (val == 'color'){
    
                                document.getElementById("color1").id = "fille1";
                                document.getElementById("color2").id = "fille2";
                                document.getElementById("color3").id = "fille3";
                                document.getElementById("color4").id = "fille4";
                                document.getElementById("color5").id = "fille5";

                                document.getElementById("color11").id = "white1";
                                document.getElementById("color12").id = "white2";
                                document.getElementById("color13").id = "white3";
                                document.getElementById("color14").id = "white4";
                                document.getElementById("color15").id = "white5";


                                document.getElementById("val").value = "fille";
    
                        }else{
                            document.getElementById("garcon1").id = "fille1";
                            document.getElementById("garcon2").id = "fille2";
                            document.getElementById("garcon3").id = "fille3";
                            document.getElementById("garcon4").id = "fille4";
                            document.getElementById("garcon5").id = "fille5";
                            document.getElementById("val").value = "fille";
                        }
                    }

                }
                function searsh2(url){
                    var ok = document.getElementById('sex');
                    var image = document.getElementById('image');
                    if (ok.value == 'Garçon') {
                        if (image.src == url+'/students/fille.jpg') {
                            image.src = url+'/students/garcon.jpg';
                        }
                            document.getElementById("btn1").style.display = "";
                            document.getElementById("btn2").style.display = "none";
                            document.getElementById("btn3").style.display = "none";
                        
                            document.getElementById("color1").style.backgroundColor = 'rgba(2, 209, 255, 1)';
                            document.getElementById("color3").style.backgroundColor = 'rgba(2, 209, 255, 1)';
                            document.getElementById("color4").style.backgroundColor = 'rgba(2, 209, 255, 1)';
                            document.getElementById("color5").style.backgroundColor = 'rgba(2, 209, 255, 1)';

                            document.getElementById("color11").style.color = "aliceblue";
                            document.getElementById("color13").style.color = "aliceblue";
                            document.getElementById("color14").style.color = "aliceblue";
                            document.getElementById("color15").style.color = "aliceblue";
                    }else{
                        if (image.src == url+'/students/garcon.jpg') {
                            image.src = url+'/students/fille.jpg';
                        }
                            document.getElementById("btn1").style.display = "none";
                            document.getElementById("btn2").style.display = "none";
                            document.getElementById("btn3").style.display = "";
    
                            document.getElementById("color1").style.backgroundColor = "rgb(240, 147, 224)";
                            document.getElementById("color3").style.backgroundColor = "rgb(240, 147, 224)";
                            document.getElementById("color4").style.backgroundColor = "rgb(240, 147, 224)";
                            document.getElementById("color5").style.backgroundColor = "rgb(240, 147, 224)";

                            document.getElementById("color11").style.color = "aliceblue";
                            document.getElementById("color13").style.color = "aliceblue";
                            document.getElementById("color14").style.color = "aliceblue";
                            document.getElementById("color15").style.color = "aliceblue";
                    }
                }
                function fonction_data() {
                    var fonction = $('#fonction').val();
                    if (fonction != 'administration') {
                        document.getElementById("post").id = "post_display";
                    }else{
                        document.getElementById("post_display").id = "post";
                    }
                }
                
</script>
@endsection

@section('content')
<div class="container-fluid">
    <form id="form-wizard3" method="POST" action="{{url('admin/add_student')}}" enctype="multipart/form-data">
    {{-- <form id="form-wizard3" method="POST" action="{{url('admin/Etudiants')}}" enctype="multipart/form-data"> --}}
    @csrf
        <div class="row">
            <div class="col-lg-3">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between" id="color1" >
                        <div class="iq-header-title">
                            <h4 class="card-title" id="color11">Ajouter un élève</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        
                        <div class="form-group">
                            <div class="add-img-user profile-img-edit">
                                <img class="profile-pic img-fluid" id="image" src="{{ url('/images/')}}/students/fille.jpg" alt="profile-pic">
                                <input type="hidden" id="val" value="color">
                                <br>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="custom-file col-12">
                                <input type="file" onchange="show_image.call(this)" value="{{ old('image') }}" name="image" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Image(.jpg .png .jpeg)</label>
                                </div>
                            @error('image')
                                <span  style="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="f_name">Numéro d'inscription :</label>
                            <input type="text" name="incsription_num" class="form-control" value="{{ old('f_name') }}" id="f_name" placeholder="...">
                            @error('f_name')
                                    <span  style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between" id="color1" >
                        <div class="iq-header-title">
                            <h4 class="card-title" id="color11">Parents</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="form-group">
                            <label for="type"> Type :</label>
                            <select class="form-control" name="type" onchange="autre()" id="type" id="selectcountry">
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
                        <div class="form-group">
                            <label for="f_name">Le nom compléte :</label>
                            <input type="text" name="f_name" class="form-control" value="{{ old('f_name') }}" id="f_name" placeholder="...">
                            @error('f_name')
                                    <span  style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="f_cin">CIN :</label>
                            <input type="text" name="f_cin" class="form-control" value="{{ old('f_cin') }}" id="f_cin" placeholder="...">
                            @error('f_cin')
                                    <span  style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="f_tele">Téléphone</label>
                            <input type="number" name="f_tele" value="{{ old('f_tele') }}" class="form-control" id="f_tele" placeholder="(+212) 06....">
                            @error('f_tele')
                                <span  style="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between" id="color2" >
                    <div class="iq-header-title">
                        <h4 class="card-title"  id="color12">Parents</h4>
                    </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="form-group">
                            <label for="type"> Type :</label>
                            <select class="form-control" name="type" onchange="autre()" id="type" id="selectcountry">
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
                        <div class="form-group">
                            <label for="f_name">Le nom compléte :</label>
                            <input type="text" name="f_name" class="form-control" value="{{ old('f_name') }}" id="f_name" placeholder="...">
                            @error('f_name')
                                    <span  style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="f_cin">CIN :</label>
                            <input type="text" name="f_cin" class="form-control" value="{{ old('f_cin') }}" id="f_cin" placeholder="...">
                            @error('f_cin')
                                    <span  style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="f_tele">Téléphone</label>
                            <input type="number" name="f_tele" value="{{ old('f_tele') }}" class="form-control" id="f_tele" placeholder="(+212) 06....">
                            @error('f_tele')
                                <span  style="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between" id="color3">
                                <div class="iq-header-title">
                                    <h4 class="card-title" id="color13">Informations Générales</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="new-user-info">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="fname">prénom :</label>
                                                <input type="text" name="nom" value="{{ old('nom') }}" class="form-control" id="fname" required>
                                                @error('nom')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="pre1" style="float: right">: الاسم الشخصي</label>
                                                <input type="text" name="pre1" value="{{ old('pre1') }}" class="form-control" id="pre1">
                                                @error('pre1')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="pre"> Nom :</label>
                                                <input type="text" name="pre" value="{{ old('pre') }}" class="form-control" id="pre"  required>
                                                @error('pre')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="nom1" style="float: right">: الاسم العائلي </label>
                                                <input type="text" name="nom1" value="{{ old('nom1') }}" class="form-control" id="nom1">
                                                @error('nom1')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Sexe:</label>
                                                <select class="form-control" name="sex" onchange="searsh2('{{ url('/images/')}}')" id="sex" id="selectcountry" required>
                                                    @empty(old('sex'))
                                                            <option selected="" disabled="">-- SEXE -- </option>
                                                    @endempty
                                                            <option value="Garçon"  {{ old('sex') == 'Garçon' ? 'selected' : '' }}> Garçon</option>
                                                            <option value="Fille"  {{ old('sex') == 'Fille' ? 'selected' : '' }}> Fille</option>
                                                </select>
                                                @error('sex')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="date">Date de naissance</label>
                                                <input type="date" class="form-control" name="date" value="{{ old('date') }}" id="date" placeholder="2019-12-18">
                                                @error('date')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="date_d">Date de départ</label>
                                                <input type="date" class="form-control" name="date_d" value="{{ old('date_d') }}" id="date_d" placeholder="2019-12-18">
                                                @error('date_d')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="adress">adress:</label>
                                                <input type="text" name="adress" class="form-control" id="adress" value="{{ old('adress') }}">
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
                    </div>
                    <div class="col-lg-4">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between" id="color4">
                            <div class="iq-header-title">
                                <h4 class="card-title" id="color14">Informations Scolaires</h4>
                            </div>
                            </div>
                            <div class="iq-card-body">
                            <div class="new-user-info">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="id1">Massar :</label>
                                            <input type="text" class="form-control" name="id1" value="{{ old('id1') }}" id="id1" >
                                            @error('id1')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Categorie :</label>
                                            <select class="form-control" onchange="change1('{{url('admin/ajax_get_cycle_by_categorie')}}')" name="categorie" id="cat" required>
                                                @empty(old('categorie'))
                                                    <option selected="" disabled="">-- Catégorie -- </option>
                                                @endempty
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
                                        <div class="form-group col-sm-12">
                                            <label>Cycle :</label>
                                            <select class="form-control" onchange="change2('{{url('admin/ajax_get_class_by_cycle')}}')" name="cycle" id="cycle" required>
                                                @empty(old('cycle'))
                                                        <option selected="" disabled="">-- Cycle -- </option>
                                                @endempty
                                            </select>
                                            @error('cycle')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>Class:</label>
                                            <select class="form-control" name="class" id="class">
                                                @empty(old('class'))
                                                    <option  selected="" disabled=""> -- Choisir une classe -- </option>
                                                @endempty
                                            </select>
                                            @error('class')
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
                    <div class="col-lg-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between" id="color5">
                                <div class="iq-header-title">
                                    <h4 class="card-title" id="color15">Informations Générales</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="new-user-info">
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label>Transport :</label>
                                                <select class="form-control" onchange="change3('{{url('admin/ajax_get_trajet_by_transport')}}')" name="transport" id="transport">
                                                    @empty(old('sex'))
                                                        <option value="">-- Transport -- </option>
                                                    @endempty
                                                    @foreach ($transports as $transport)
                                                        <option value="{{$transport->id}}"{{ old('transport') == $transport->id ? 'selected' : '' }}>{{$transport->name}}</option>
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
                                                <select class="form-control" name="trajet" id="trajet">
                                                    @empty(old('trajet'))
                                                        <option selected="" disabled="">-- Trajet -- </option>
                                                    @endempty
                                                </select>
                                                @error('trajet')
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
                    <div class="col-lg-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between" id="color5">
                                <div class="iq-header-title">
                                    <h4 class="card-title" id="color15">Frais</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="frais_insc">Inscription et assurance :</label>
                                            <input type="text" class="form-control" value="{{old('frais_insc')}}" name="frais_insc" id="frais_insc" required >
                                            @error('frais_insc')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="Transport_frai">Transport :</label>
                                            <input type="text" class="form-control" value="{{old('Transport_frai') ? old('Transport_frai') : "0"}}" name="Transport_frai" id="Transport_frai" required >
                                            @error('Transport_frai')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="Cantine">Cantine :</label>
                                            <input type="text" class="form-control" value="{{ old('Cantine') ? old('Cantine') : "0" }}" name="Cantine" id="Cantine" >
                                            @error('Cantine')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="Guarde">Guarde midi :</label>
                                            <input type="text" class="form-control" value="{{ old('Guarde') ? old('Guarde') : "0"}}" name="Guarde" id="Guarde" >
                                            @error('Guarde')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    <div class="form-group col-md-12">
                                        <div class="custom-control-inline col-md-2">
                                            <label> Mensualité :  </label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline col-md-2">
                                            <input type="radio" id="customRadio6" onchange="payement_prix('rien')" value="rien" name="payement" class="custom-control-input" checked="">
                                            <label class="custom-control-label" for="customRadio6"> Pas maintenant </label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline  col-md-2">
                                            <input type="radio" id="customRadio7" onchange="payement_prix('mois')" value="mois" name="payement" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio7"> Par mois </label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline  col-md-2">
                                            <input type="radio" id="customRadio8" onchange="payement_prix('anné')" value="anné" name="payement" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio8"> Tout l'année</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline  col-md-2">
                                            <input type="radio" id="customRadio9" onchange="payement_prix('Autre')" value="Autre" name="payement" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio9"> Autre </label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-3" style="display: none" id="prix">
                                        <label for="prix"><b>Prix</b> :</label>
                                        <input type="text" name="prix" value="{{ old('prix') }}" class="form-control" id="prix" >
                                        
                                    </div>
                                    <div class="form-group col-md-3" style="display: none" id="mois">
                                        <label for="fname"><b>Nombre du mois</b> :</label>
                                        <input type="number" name="number" value="{{ old('number') }}" class="form-control" id="number" >
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @error('prix')
                <span  style="color: red" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            @error('number')
                <span  style="color: red" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            {{-- <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="iq-card">
                            <div class="iq-card-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="custom-control custom-radio custom-control-inline col-md-2">
                                            <input type="radio" id="customRadio6" onchange="payement_prix('rien')" value="rien" name="payement" class="custom-control-input" checked="">
                                            <label class="custom-control-label" for="customRadio6"> Pas maintenant </label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline  col-md-2">
                                            <input type="radio" id="customRadio7" onchange="payement_prix('mois')" value="mois" name="payement" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio7"> Par mois </label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline  col-md-2">
                                            <input type="radio" id="customRadio8" onchange="payement_prix('anné')" value="anné" name="payement" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio8"> Tout l'année</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline  col-md-2">
                                            <input type="radio" id="customRadio9" onchange="payement_prix('Autre')" value="Autre" name="payement" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio9"> Autre </label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-3" style="display: none" id="prix">
                                        <label for="prix"><b>Prix</b> :</label>
                                        <input type="text" name="prix" value="{{ old('prix') }}" class="form-control" id="prix" >
                                        
                                    </div>
                                    <div class="form-group col-md-3" style="display: none" id="mois">
                                        <label for="fname"><b>Nombre du mois</b> :</label>
                                        <input type="number" name="number" value="{{ old('number') }}" class="form-control" id="number" >
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-body" style="text-align: center" >
                        <button style="display: none" id="btn1" class="btn btn-info btn-lg"><i class="ri-check-fill"></i> Valider</button>
                        <button id="btn2" class="btn btn-primary btn-lg"><i class="ri-check-fill"></i> Valider</button>
                        <button style="display: none" id="btn3" class="btn btn-lg"><i class="ri-check-fill"></i> Valider</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
 </div>
@endsection