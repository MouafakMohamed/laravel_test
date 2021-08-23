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
@endsection

@section('content')
<div class="container-fluid">
    <form id="form-wizard3" method="POST" action="{{url('admin/Parent')}}" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-lg-3">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between" id="color1" >
                        <div class="iq-header-title">
                            <h4 class="card-title" id="color11">Ajouter un Parent</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="form-group">
                            <div class="add-img-user profile-img-edit">
                                <img class="profile-pic img-fluid" id="image" src="{{ url('/assets/')}}/images/user/11.png" alt="profile-pic">
                                <input type="hidden" name="student" value="{{$student}}">
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
                        <div class="form-group">
                            <label for="type"> Type :</label>
                            <select class="form-control" name="type" onchange="autre()" id="type" id="selectcountry" required>
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
                        <div class="form-group" id="type1" style="display: none">
                            <label for="relation"> Type de relation :</label>
                            <input type="text" name="relation" id="relation" class="form-control">
                            @error('relation')
                                <span  style="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                
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
                                                <label for="fname">Nom :</label>
                                                <input type="text" name="nom" value="{{ old('nom') }}" class="form-control" id="fname" required>
                                                @error('nom')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="pre">prénom :</label>
                                                <input type="text" name="pre" value="{{ old('pre') }}" class="form-control" id="pre"  required>
                                                @error('pre')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="cin">CIN</label>
                                                <input type="text" class="form-control" name="cin" value="{{ old('cin') }}" id="cin" required>
                                                @error('cin')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label>Sexe:</label>
                                                <select class="form-control" name="sex" onchange="searsh1()" id="sex" id="selectcountry" required>
                                                    @empty(old('sex'))
                                                            <option selected="" disabled="">-- SEXE -- </option>
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
                                                <label for="tele">Téléphone</label>
                                                <input type="number" name="tele" value="{{ old('tele') }}" class="form-control" id="tele" placeholder="(+212) 06....">
                                                @error('tele')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email">Email:</label>
                                                <input type="email" class="form-control" name="mail" value="{{ old('mail') }}" id="email" placeholder="EX : example@example.com">
                                                @error('mail')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="adress">adress:</label>
                                                <textarea type="text" name="adress" class="form-control" rows="1" id="adress">{{ old('adress') }}</textarea>
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
                            <div class="iq-card-header d-flex justify-content-between" id="color2" >
                            <div class="iq-header-title">
                                <h4 class="card-title"  id="color12">Réseaux sociaux</h4>
                            </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="form-group">
                                    <label for="furl">Facebook :</label>
                                    <input type="text" name="facebook" class="form-control" value="{{ old('facebook') }}" id="furl" placeholder="L'adresse URL de Facebook">
                                    @error('facebook')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="turl">Twitter :</label>
                                    <input type="text" name="twitter" class="form-control" value="{{ old('twitter') }}" id="turl" placeholder="L'adresse URL de Twitter">
                                    @error('twitter')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="instaurl">Instagram :</label>
                                    <input type="text" name="insta" class="form-control" value="{{ old('insta') }}" id="instaurl" placeholder="L'adresse URL de Instagram">
                                    @error('insta')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="youtube">Youtube :</label>
                                    <input type="text" name="youtube" class="form-control" value="{{ old('youtube') }}" id="youtube" placeholder="L'adresse URL de youtube">
                                    @error('youtube')
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