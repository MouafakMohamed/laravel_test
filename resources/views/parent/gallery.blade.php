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
                        <h4 class="card-title" style="color: whitesmoke"> Le gallery </h4>
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
    <div class="row text-center text-lg-left">
        @foreach ($images as $image)
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="{{ url('/'.$image->image) }}" style="width: 400px; height: 300px" alt="photo">
                </a>
            </div>
        @endforeach
    </div>
</div>

@endsection