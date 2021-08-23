@extends('admin/layouts.app')
@section('css')
@endsection
@section('js')
@endsection

@section('content')
<button class="btn btn-success p-6" style="float: right"  data-toggle="modal" data-target="#exampleModalCenter">Ajouter une trajet</button><br><br>
<div class="container-fluid">
        <div class="row">
            @foreach ($trajets as $trajet)
                <div class="col-lg-4">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">{{$trajet->name}}
                            </h4>
                        </div>
                        <div class="iq-header-title">
                            <i class="ri-pencil-line" style="color: rgba(8, 155, 171, 1); font-size:21px;padding-right: 10px" data-toggle="modal" data-target="#exampleModalCenter{{$trajet->id}}"></i>
                            <?php $n = 0; ?>
                            @foreach ($students as $student)
                                @if ($student->transport == $id and $student->trajet == $trajet->id)
                                    <?php $n++; ?>
                                @endif 
                            @endforeach
                            @if ($n == 0)
                                <i class="ri-delete-bin-2-fill" style="color: rgba(8, 155, 171, 1); font-size:21px" data-toggle="modal" data-target="#exampleModal{{$trajet->id}}"></i>
                            @endif 
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <ul class="doctors-lists m-0 p-0">
                            @foreach ($students as $student)
                                @if ($student->transport == $id and $student->trajet == $trajet->id)
                                    <a href="{{url('admin/eleve/profil/'.$student->id)}}">
                                        <li class="d-flex mb-4 align-items-center">
                                            <div class="user-img img-fluid"><img src="{{url($student->image)}}" alt="story-img" class="rounded-circle avatar-40"></div>
                                            <div class="media-support-info ml-3">
                                                <h6>{{$student->nom.' '.$student->pre}}</h6>
                                                @foreach ($class as $classe)
                                                    @if ($classe->id == $student->class)
                                                        <p class="mb-0 font-size-12">{{$classe->name}}</p>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </li>  
                                    </a>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModalCenter{{$trajet->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                       <div class="modal-content">
                          <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalCenterTitle">Modifier</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                             </button>
                          </div>
                          <form action="{{url('admin/Transport/profil/edit/'.$trajet->id)}}" method="post">
                              @csrf
                              <div class="modal-body">
                                <div class="row">
                                     <div class="form-group col-md-12">
                                        <label for="lname5">Nom du trajet : *</label>
                                        <input type="text" value="{{$trajet->name}}" name="name" class="form-control" id="lname5" >
                                     <input type="hidden" name="id" value="{{$id}}">
                                        @error('name')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                 <button type="submit" class="btn btn-primary">Modifier</button>
                              </div>
                          </form>
                       </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal{{$trajet->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                             <a onclick="supprime({{ $trajet->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                             <form id="logout-form{{ $trajet->id }}" action="{{ url('admin/Transport/profil/delete/'.$trajet->id)}}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                          </form>
                          </div>
                       </div>
                    </div>
                 </div>
            @endforeach
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                   <div class="modal-content">
                      <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un trajet</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                         </button>
                      </div>
                      <form action="{{url('admin/Transport/profil')}}" method="post">
                          @csrf
                          <div class="modal-body">
                            <div class="row">
                                 <div class="form-group col-md-12">
                                    <label for="lname5">Nom du trajet : *</label>
                                    <input type="text"  name="name" class="form-control" id="lname5" >
                                 <input type="hidden" name="id" value="{{$id}}">
                                    @error('name')
                                         <span  style="color: red" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                             <button type="submit" class="btn btn-primary">Ajouter</button>
                          </div>
                      </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection