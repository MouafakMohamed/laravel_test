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
    <form id="form-wizard3" method="POST" action="{{url('admin/reinscription')}}" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between" id="color3">
                                <div class="iq-header-title">
                                    <h4 class="card-title" id="color13">Frais d'inscription</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="new-user-info">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="frais_insc">Frais d'inscription et assurance :</label>
                                                <input type="number" name="frais_insc" value="{{ old('frais_insc') }}" class="form-control" id="frais_insc" required>
                                                <input type="hidden" name="id" value="{{$student->id}}">
                                                @error('frais_insc')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="Mensualite">Mensualité :</label>
                                                <input type="number" name="Mensualite" value="{{ old('Mensualite') }}" class="form-control" id="Mensualite"  required>
                                                @error('Mensualite')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="Transport">Transport</label>
                                                <input type="number" class="form-control" name="Transport" value="{{ old('Transport') }}" id="Transport" required>
                                                @error('Transport')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="Cantine">Cantine:</label>
                                                <input type="number" class="form-control" name="Cantine" value="{{ old('Cantine') }}" id="Cantine" required>
                                                @error('Cantine')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="Guarde">Guarde midi</label>
                                                <input type="number" name="Guarde" value="{{ old('Guarde') }}" class="form-control" id="Guarde" required>
                                                @error('Guarde')
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
                                    <label for="32154">Catégorie :</label>
                                    <select class="form-control" onchange="change1('{{url('admin/ajax_get_cycle_by_categorie')}}')" name="categorie" id="cat">
                                        <option  selected="" disabled=""> -- Choisir une categorie -- </option>
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
                                <div class="form-group">
                                    <label for="32154">Cycle :</label>
                                    <select class="form-control" onchange="change2('{{url('admin/ajax_get_class_by_cycle')}}')" name="cycle" id="cycle">
                                        <option  selected="" disabled=""> -- Choisir une cycle -- </option>
                                    </select>
                                    @error('cycle')
                                         <span  style="color: red" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                </div>
                                <div class="form-group">
                                    <label for="class">Class1 :</label>
                                    <select class="form-control" name="classe" id="class">
                                        <option  selected="" disabled=""> -- Choisir une classe -- </option>
                                    </select>
                                    @error('classe')
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