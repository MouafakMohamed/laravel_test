@extends('admin/layouts.app')
@section('css')

@endsection
@section('js')
<script>
    // $(document).ready(function(){
    //     $.ajaxSetup({
    //         headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    //     })
    //    $("#myInput").on("keyup", function() {
    //       var value = $(this).val().toLowerCase();
    //       var url = "{{url('admin/ajax_get_student')}}";
    //     $.ajax({
    //         url: url,
    //         type:"POST",
    //         data:{cycle:cycle},
    //         success:function(data){
    //             $('#class1').html(data.success);
    //                             }
    //     })
    //    });
    // });
 </script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                    <h4 class="card-title">Étudiant</h4>
                    </div>
                    <div class="iq-card-header-toolbar d-flex align-items-center">
                        <input type="text" onkeyup="ajax_get_student_by_massar1('{{url('admin/ajax_get_student_by_massar1')}}')" id="massar" placeholder="Id massar" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="row" id="hide">
                @foreach ($students as $student)
                @if ($student->sex == 'Garçon')
                    <div class="col-sm-6 col-md-3">
                        <div class="iq-card">
                            <div class="iq-card-body text-center">
                                <div class="doc-profile">
                                    <img class="rounded-circle img-fluid avatar-80" src="{{url('/'.$student->image)}}" alt="profile">
                                </div>
                                <div class="iq-doc-info mt-3">
                                <h4> {{$student->nom.' '.$student->pre}}</h4>
                                <p class="mb-0" >{{$student->id1}}</p>
                                </div>
                                <div class="iq-doc-social-info-garcon mt-3 mb-3">
                                    <ul class="m-0 p-0 list-inline">
                                            <li><a href="{{$student->facebook}}"><i class="ri-facebook-fill"></i></a></li>
                                            <li><a href="{{$student->twitter}}"><i class="ri-twitter-fill"></i></a> </li>
                                            <li><a href="{{$student->insta}}"><i class="ri-instagram-fill"></i></a></li>
                                            <li><a href="{{$student->youtube}}"><i class="ri-youtube-fill"></i></a></li>
                                    </ul>
                                </div>
                                <button type="button" class="btn btn-link" style="font-size: 22px">
                                    <a href="{{url('admin/eleve/profil/'.$student->id)}}"><i class="ri-eye-line" style="color: rgba(8, 155, 171, 1)"></i></a>
                                    <i class="ri-delete-bin-2-fill" style="color: rgba(8, 155, 171, 1)"  data-toggle="modal" data-target="#exampleModal{{$student->id}}" ></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-sm-6 col-md-3">
                        <div class="iq-card">
                            <div class="iq-card-body text-center">
                                <div class="doc-profile">
                                    <img class="rounded-circle img-fluid avatar-80" src="{{url('/'.$student->image)}}" alt="profile">
                                </div>
                                <div class="iq-doc-info mt-3">
                                <h4> {{$student->nom.' '.$student->pre}}</h4>
                                <p class="mb-0" >{{$student->id1}}</p>
                                </div>
                                <div class="iq-doc-social-info-fille mt-3 mb-3">
                                    <ul class="m-0 p-0 list-inline">
                                            <li><a href="{{$student->facebook}}"><i class="ri-facebook-fill"></i></a></li>
                                            <li><a href="{{$student->twitter}}"><i class="ri-twitter-fill"></i></a> </li>
                                            <li><a href="{{$student->insta}}"><i class="ri-instagram-fill"></i></a></li>
                                            <li><a href="{{$student->youtube}}"><i class="ri-youtube-fill"></i></a></li>
                                    </ul>
                                </div>
                                <button type="button" class="btn btn-link" style="font-size: 22px">
                                    <a href="{{url('admin/eleve/profil/'.$student->id)}}"><i class="ri-eye-line" style="color: rgb(240, 147, 224)"></i></a>
                                    <i class="ri-delete-bin-2-fill" style="color: rgba(240, 147, 224, 1)"  data-toggle="modal" data-target="#exampleModal{{$student->id}}" ></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif
                @endforeach
            </div>
            <div class="row" id="card">
            </div>
        </div>
        <div class="col-sm-7">
            <div style="float:center">
                {{ $students->links() }}
            </div>
        </div>
            @foreach ($students as $student)
                    <div class="modal fade" id="exampleModal{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Supprimer !</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <h4> Êtes-vous sûr ?</h4>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
                                <a onclick="supprime({{ $student->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                                <form id="logout-form{{ $student->id }}" action="{{ url('admin/delete/Etudiant/'.$student->id)}}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
@endsection