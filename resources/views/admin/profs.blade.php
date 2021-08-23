@extends('admin/layouts.app')
@section('css')

@endsection
@section('js')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12">
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Les professeurs</h4>
                </div>
             </div>
          </div>
       </div>
       @foreach ($profs as $prof)
           <div class="col-sm-6 col-md-3">
                <div class="iq-card">
                    <div class="iq-card-body text-center">
                        <div class="doc-profile">
                        <img class="rounded-circle img-fluid avatar-80" src="{{url('/'.$prof->image)}}" alt="profile">
                        </div>
                        <div class="iq-doc-info mt-3">
                        <h4> {{$prof->nom.' '.$prof->pre}}</h4>
                        <p class="mb-0" >{{$prof->fonction}}</p>
                        </div>
                        <div class="iq-doc-social-info mt-3 mb-3">
                        <ul class="m-0 p-0 list-inline">
                            <li><a href="{{$prof->facebook}}"><i class="ri-facebook-fill"></i></a></li>
                            <li><a href="{{$prof->twitter}}"><i class="ri-twitter-fill"></i></a> </li>
                            <li><a href="{{$prof->insta}}"><i class="ri-instagram-fill"></i></a></li>
                            <li><a href="{{$prof->linked}}"><i class="ri-linkedin-fill"></i></a></li>
                        </ul>
                        </div>
                        <a href="{{url('admin/prof/profil/'.$prof->id)}}"><i class="ri-eye-line" style="color: rgba(8, 155, 171, 1);  font-size: 23px; padding-right: 15px"></i></a>
                        <a href="#"  data-toggle="modal" data-target="#exampleModal{{$prof->id}}"> <i style="color: rgba(8, 155, 171, 1);  font-size: 23px;" class="ri-delete-bin-2-fill"></i></a>
                     </div>
                  </div>
               </div>
               <div class="modal fade" id="exampleModal{{$prof->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                           <a onclick="supprime({{ $prof->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                           <form id="logout-form{{ $prof->id }}" action="{{ url('admin/delete/prof/'.$prof->id)}}" method="POST" style="display: none;">
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