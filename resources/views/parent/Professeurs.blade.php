@extends('parent.app')
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
                        <h4 class="card-title" style="color: whitesmoke"> Mes professeurs </h4>
                    </div>
                    {{-- <div class="iq-header-title" style="float:right">
                        <a href="{{url('Student/Dashboard')}}"> 
                            <i style="color: whitesmoke; font-size: 30px" class="ri-home-smile-fill"></i>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="row">
                @foreach ($profs as $prof)
                    <div class="col-md-3">
                        <div class="iq-card">
                            <div class="iq-card-body text-center">
                                <div class="doc-profile">
                                    <img class="rounded-circle img-fluid avatar-80"
                                        src="{{ url('/'.$prof->prof->image) }}" alt="profile">
                                </div>
                                <div class="iq-doc-info mt-3">
                                    <h4> {{$prof->prof->pre .' '.$prof->prof->nom}}</h4>
                                    <p class="mb-0">{{ $prof->matiere }}</p>
                                </div>
                                <div class="iq-doc-social-info mt-3 mb-3">
                                    <ul class="m-0 p-0 list-inline">
                                        <li>
                                            <a href="{{ $prof->prof->facebook }}">
                                                <i class="ri-facebook-fill"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $prof->prof->twitter }}">
                                                <i class="ri-twitter-fill"></i>
                                            </a> 
                                        </li>
                                        <li>
                                            <a href="{{ $prof->prof->insta }}">
                                                <i class="ri-instagram-fill"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ $prof->prof->linked }}">
                                                <i class="ri-linkedin-fill"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection