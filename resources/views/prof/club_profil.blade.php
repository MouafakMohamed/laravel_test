@extends('prof/layouts.app')
@section('css')
@endsection
@section('js')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-12">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Les étudiants</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Nom compléte </th>
                                    <th scope="col">Class </th>
                                    <th scope="col">Date d'entrer</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    @if ($student->validate != 'oui')
                                        <tr>
                                            <td class="text-center"><img class="rounded-circle img-fluid avatar-40" src="{{url($student->image)}}" alt="profile"></td>
                                            <td>{{$student->nom}}</td>
                                            <td>{{$student->class}}</td>
                                            <td>{{$student->validate}}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#Valide{{$student->id}}"><b><i class="ri-check-line" style="color: rgb(55, 235, 49); padding-right: 10px; font-size: 22px"></i></b></a>
                                                <a href="#" data-toggle="modal" data-target="#delete{{$student->id}}"> <i style="padding-left: 10px;color: red; font-size: 20px" class="fa fa-close"></i></a> 
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="delete{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                     <a onclick="supprime({{$student->id}});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                                                     <form id="logout-form{{$student->id}}" action="{{ url('admin/delete/club_student/'.$student->id)}}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                  </div>
                                               </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="Valide{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                               <div class="modal-content">
                                                  <div class="modal-header">
                                                     <h5 class="modal-title" id="exampleModalLabel">Valider !</h5>
                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                     </button>
                                                  </div>
                                                  <div class="modal-body">
                                                     <h4> Êtes-vous sûr ?</h4>
                                                  </div>
                                                  <div class="modal-footer">
                                                     <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
                                                     <a href="{{url('prof/club/update/'.$student->id)}}"><button type="button" class="btn btn-success">Valider</button></a>
                                                  </div>
                                               </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($student->validate == 'oui')
                                        <tr>
                                            <td class="text-center"><img class="rounded-circle img-fluid avatar-40" src="{{url($student->image)}}" alt="profile"></td>
                                            <td>{{$student->nom}}</td>
                                            <td>{{$student->class}}</td>
                                            <td>{{$student->date}}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#delete{{$student->id}}"> <i style="padding-left: 10px;color: red; font-size: 20px" class="fa fa-close"></i></a> 
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="delete{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                     <a onclick="supprime({{$student->id}});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                                                     <form id="logout-form{{$student->id}}" action="{{ url('prof/delete/club_student/'.$student->id)}}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                  </div>
                                               </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                    </div> 
                </div>
            </div> 
        </div>
        <div class="col-sm-4">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                   <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                      <div class="iq-card-header d-flex justify-content-between">
                         <div class="iq-header-title">
                            <h4 class="card-title">Professeur </h4>
                         </div>
                      </div>
                      <div class="iq-card-body">
                          <center>
                              <div class="doctor-list-item-inner rounded">
                                  <div class="donter-profile">
                                  <img src="{{url('/'. Auth::guard('prof')->user()->image)}}" style="width: 150px" class="img-fluid rounded-circle" alt="user-img">
                                  </div>
                                  <div class="doctor-detail mt-3">
                                     <h5>{{Auth::guard('prof')->user()->nom.' '.Auth::guard('prof')->user()->pre}}</h5>
                                     <h6>Professeur</h6>
                                  </div>
                                  <hr>
                                  <button class="btn btn-primary" style="float: right"  data-toggle="modal" data-target=".model3">Ajouter</button>
                               </div>
                          </center>
                         <ul class="iq-timeline">
                            @foreach ($annonces as $annonce)
                                <li>
                                    <div class="timeline-dots-fill"></div>
                                    <h6 class="float-left mb-2 text-dark"> {{$annonce->title}}</h6>
                                    <small class="float-right mt-1"><i data-toggle="modal" data-target="#delete1{{$annonce->id}}" style="color: red; font-size: 20px" class="fa fa-close"></i></small><br>
                                    <div class="d-inline-block ">
                                    <p style="padding-left: 0px">{{$annonce->text}}</p>
                                    <h6 style="padding-right: 1px">{{$annonce->time}}</h6>
                                    </div>  
                                </li>
                                <div class="modal fade" id="delete1{{$annonce->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                             <a onclick="supprime3({{$annonce->id}});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                                             <form id="logout-form3{{$annonce->id}}" action="{{ url('prof/delete/annonce/'.$annonce->id)}}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                          </div>
                                       </div>
                                    </div>
                                </div>
                            @endforeach
                         </ul>
                        </div>
                        <div class="modal fade model3" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Ajouter une annonce </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form  method="POST" action="{{url('prof/annonce')}}" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="title">Titre :</label>
                                            <input type="text"  name="title" class="form-control" id="title" >
                                            <input type="hidden"  name="club" value="{{$club->id}}">
                                            @error('title')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="text">Description :</label>
                                            <textarea name="text" id="text" class="form-control"></textarea>
                                            @error('text')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-info">Ajouter</button>
                                </div>
                                </form>
                            </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
 </div>
@endsection
