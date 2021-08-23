
@extends('student/layouts.app')
@section('css')
@endsection
@section('js')
@endsection

@section('content')

<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between" style="background: #089bab">
                    <div class="iq-header-title">
                        <h4 class="card-title" style="color: whitesmoke"> des idées </h4>
                    </div>
                    <div class="iq-header-title" style="float:right">
                        <a href="{{url('Student/Dashboard')}}"> 
                            <i style="color: whitesmoke; font-size: 30px" class="ri-home-smile-fill"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        @if (session()->has('create'))
            <div class="col-12">
                <div class="alert text-white bg-success" role="alert">
                    <p class="mb-0">
                    <center> <b> {{ session()->get('create') }} </b> </center>
                    </p>
                </div>
            </div>
        @endif
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title"> Posté un commentaire </h4>
                   </div>
                </div>
                <div class="iq-card-body">
                    <p>Nous sommes heureux de recevoir vos suggestions et commentaires</p>
                    <form method="POST" action="{{url('Student/Idee')}}">
                        @csrf
                        <div class="col-md-8 mb-3">
                            <div class="form-group">
                                <label for="exampleInputText1"> Titre </label>
                                <input type="text" name="titre" class="form-control"  required id="exampleInputText1" >
                            </div>
                            @error('titre')
                                <span  style="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-8 mb-3">
                            <div class="form-group">
                                <label for="exampleInputText1"> Note </label>
                                <textarea name="note" class="form-control" required ></textarea>
                            </div>
                            @error('note')
                                <span  style="color: red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                                <button type="submit"  class="btn btn-primary my-1">Ajouter</button>
                   </form>
                </div>
             </div>
        </div>
    </div>
</div>

 @endsection