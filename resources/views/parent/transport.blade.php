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
                        <h4 class="card-title" style="color: whitesmoke"> Transport </h4>
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
        <div class="col-md-12">
            <div class="row">
                {{-- <div class="col-sm-12"><center><h3 class="my-3">{{$transport->name}} @if ($transport->trajet != '') ({{$transport->trajet}}) @endif</h3></center></div> --}}
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <div class="iq-card">
                        <div class="iq-card-body text-center">
                            <div class="doc-profile">
                                <img class="rounded-circle img-fluid avatar-80"
                                    src="{{ url('/'.$transport->accom->image) }}" alt="profile">
                            </div>
                            <div class="iq-doc-info mt-3">
                                <h4> {{$transport->accom->pre .' '.$transport->accom->nom}}</h4>
                                <p class="mb-0">Accompagnement</p>
                            </div>
                            <div class="iq-doc-social-info mt-3 mb-3">
                                <ul class="m-0 p-0 list-inline">
                                    <li>
                                        <a href="{{ $transport->accom->facebook }}">
                                            <i class="ri-facebook-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $transport->accom->twitter }}">
                                            <i class="ri-twitter-fill"></i>
                                        </a> 
                                    </li>
                                    <li>
                                        <a href="{{ $transport->accom->insta }}">
                                            <i class="ri-instagram-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $transport->accom->linked }}">
                                            <i class="ri-linkedin-fill"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="iq-card">
                        <div class="iq-card-body text-center">
                            <div class="doc-profile">
                                <img class="rounded-circle img-fluid avatar-80"
                                    src="{{ url('/'.$transport->choffeur->image) }}" alt="profile">
                            </div>
                            <div class="iq-doc-info mt-3">
                                <h4> {{$transport->choffeur->pre .' '.$transport->choffeur->nom}}</h4>
                                <p class="mb-0">Accompagnement</p>
                            </div>
                            <div class="iq-doc-social-info mt-3 mb-3">
                                <ul class="m-0 p-0 list-inline">
                                    <li>
                                        <a href="{{ $transport->choffeur->facebook }}">
                                            <i class="ri-facebook-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $transport->choffeur->twitter }}">
                                            <i class="ri-twitter-fill"></i>
                                        </a> 
                                    </li>
                                    <li>
                                        <a href="{{ $transport->choffeur->insta }}">
                                            <i class="ri-instagram-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ $transport->choffeur->linked }}">
                                            <i class="ri-linkedin-fill"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection