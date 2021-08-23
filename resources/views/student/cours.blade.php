
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
                        <h4 class="card-title" style="color: whitesmoke"> Les cours </h4>
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
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="iq-card">
                <div class="row">
                    @foreach ($cours as $cour)
                        <div class="col-md-6">
                            <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">{{$cour->titre}}</h4>
                                <p>{{$cour->s_titre}}</p>
                            </div>
                            </div>
                            <div class="iq-card-body">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$cour->video}}?rel=0" allowfullscreen></iframe>
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