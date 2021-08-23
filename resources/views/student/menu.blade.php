@extends('student/layouts.app')
@section('css')
<style>
    .iq-bg-test1 { background: #fcecec !important; color: rgb(196, 193, 32) !important; }
    .bg-test1 { color: #ffffff; background: rgb(196, 193, 32); background: -moz-linear-gradient(left, rgb(196, 193, 32) 0%, rgb(201, 171, 37) 100%); background: -webkit-gradient(left top, right top, color-stop(0%, rgb(196, 193, 32)), color-stop(100%, rgb(201, 171, 37))); background: -webkit-linear-gradient(left, rgb(196, 193, 32) 0%, rgb(201, 171, 37) 100%); background: -o-linear-gradient(left, rgb(196, 193, 32) 0%, rgb(201, 171, 37) 100%); background: -ms-linear-gradient(left, rgb(196, 193, 32) 0%, rgb(201, 171, 37) 100%); background: linear-gradient(to right, rgb(196, 193, 32) 0%, rgb(201, 171, 37) 100%); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#d84a45', endColorstr='#f26361', GradientType=1); }
    .iq-bg-test2 { background: #fcecec !important; color:rgb(216, 69, 209) !important; }
    .bg-test2 { color: #ffffff; background: rgb(216, 69, 209); background: -moz-linear-gradient(left, rgb(216, 69, 209) 0%, rgb(242, 97, 170) 100%); background: -webkit-gradient(left top, right top, color-stop(0%, rgb(216, 69, 209)), color-stop(100%, rgb(242, 97, 170))); background: -webkit-linear-gradient(left, rgb(216, 69, 209) 0%, rgb(242, 97, 170) 100%); background: -o-linear-gradient(left, rgb(216, 69, 209) 0%, rgb(242, 97, 170) 100%); background: -ms-linear-gradient(left, rgb(216, 69, 209) 0%, rgb(242, 97, 170) 100%); background: linear-gradient(to right, rgb(216, 69, 209) 0%, rgb(242, 97, 170) 100%); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#d84a45', endColorstr='#f26361', GradientType=1); }

</style>
@endsection
@section('js')
@endsection

@section('content')
<div class="container-fluid">
    <div class="col-sm-9 mx-auto">
        <div class="row">
            <div class="col-lg-10">
                         <div class="user-profile text-center mt-2">
                             <img src="{{ url('/'.$student->image) }}" alt="profile-img" class="avatar-130 img-fluid">
                        </div>
                        <div class="text-center mt-3">
                            <h4><b>{{$student->pre.' '.$student->nom}}</b></h4>
                            <p>{{$student->class}}</p>
                         </div>
            </div>
            <div class="col-lg-2 my-5">
                <a href="{{url('Student/logout')}}">
                    <i style="color: rgb(13, 65, 236); font-size: 50px" class="ri-logout-box-line"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <a href="{{url('Student/Profs')}}">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body bg-primary rounded">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="rounded-circle iq-card-icon iq-bg-primary"><i class="ri-group-fill"></i></div>
                                <div class="text-right my-3" style="color: aliceblue">                                 
                                    <h4 class="my-auto"><span style="color: aliceblue"> Mes professeurs </span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="{{url('Student/devoires')}}">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-body bg-warning rounded">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="rounded-circle iq-card-icon iq-bg-warning"><i class="ri-book-mark-line"></i></div>
                        <div class="text-right my-3" style="color: aliceblue">                                 
                            <h4 class="my-auto"><span style="color: aliceblue"> Les Devoirs </span></h4>
                        </div>
                    </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="{{url('Student/photos')}}">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body bg-danger rounded">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="rounded-circle iq-card-icon iq-bg-danger"><i class="ri-star-fill"></i></div>
                            <div class="text-right my-3" style="color: aliceblue">                                 
                                <h4 class="my-auto"><span style="color: aliceblue"> Les activités </span></h4>
                            </div>
                        </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="{{url('Student/photos')}}">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body bg-test2 rounded">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="rounded-circle iq-card-icon iq-bg-test2"><i class="ri-gallery-fill"></i></div>
                                <div class="text-right my-3" style="color: aliceblue">                                 
                                    <h4 class="my-auto"><span style="color: aliceblue"> Mes photos </span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="{{url('Student/Horaire')}}">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body bg-success rounded">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="rounded-circle iq-card-icon iq-bg-success"><i class="ri-calendar-2-fill"></i></div>
                                <div class="text-right my-3" style="color: aliceblue">                                 
                                    <h4 class="my-auto"><span style="color: aliceblue"> Emploi du temps </span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="{{url('Student/Cours')}}">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body bg-secondary rounded">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="rounded-circle iq-card-icon iq-bg-secondary"><i class="ri-book-read-fill"></i></div>
                            <div class="text-right my-3" style="color: aliceblue">                                 
                                <h4 class="my-auto"><span style="color: aliceblue"> Les cours </span></h4>
                            </div>
                        </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-body bg-dark rounded">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="rounded-circle iq-card-icon iq-bg-dark"><i class="ri-store-2-fill"></i></div>
                            <div class="text-right my-3" style="color: aliceblue">                                 
                                <h4 class="my-auto"><span style="color: aliceblue"> Le repas du jour </span></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-body bg-test1 rounded">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="rounded-circle iq-card-icon iq-bg-test1"><i class="ri-home-2-fill"></i></div>
                        <div class="text-right my-3"  style="color: aliceblue">                                 
                            <h4 class="my-auto"><span  style="color: aliceblue"> Club </span></h4>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="{{url('Student/Idee')}}">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body bg-info rounded">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="rounded-circle iq-card-icon iq-bg-info"><i class="ri-chat-1-fill"></i></div>
                            <div class="text-right my-3" style="color: aliceblue">                                 
                                <h4 class="my-auto"><span style="color: aliceblue"> La boîte à idées </span></h4>
                            </div>
                        </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection