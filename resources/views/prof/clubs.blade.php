@extends('prof/layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            @foreach ($clubs as $club)
                <div class="col-sm-4">
                    <a href="{{url('prof/club/profil/'.$club->id)}}">
                        <div class="card iq-mb-4">
                            <img src="{{url('/'.$club->image)}}" class="card-img-top" height="359" alt="#">
                            <div class="card-body">
                                <h4 class="card-title"> <center> {{$club->name}} </center></h4>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div><br><br><br>
    </div>
@endsection