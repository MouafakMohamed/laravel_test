@extends('parent.app')
@section('css')
<link rel="stylesheet" href="{{ url('assets/') }}/style2.css">
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
                        <h4 class="card-title" style="color: whitesmoke"> Horaires des cours </h4>
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
        <div class="col-sm-12 col-lg-12">
            <div class="iq-card" id="capture">
                <div class="iq-card-body">
                    <div class="row">
                        <div class="col">
                            <table  class="table">
                                <thead>
                                    <tr style="height: 50px">
                                        <th></th>
                                        <th class="repos">Lundi</th>
                                        <th class="repos">Mardi</th>
                                        <th class="repos">Mercredi</th>
                                        <th class="repos">Jeudi</th>
                                        <th class="repos">Vendredi</th>
                                        <th class="repos">Samedi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < 10; $i++)
                                        <tr>
                                            <th>{{$times[$i].' - '.$times[$i+1]}}</th>
                                            @foreach ($days as $day)
                                                @if ($cours[$i][$day] == '')
                                                <td data-toggle="modal" data-target="#exampleModalCenter{{$i.$day}}"></td>
                                                @else
                                                <td data-toggle="modal" data-target="#exampleModal{{$cours_id[$i][$day]}}">{{ $cours[$i][$day]}}<br> ({{ $cours1[$i][$day]}})</td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection