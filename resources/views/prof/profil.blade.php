@extends('prof/layouts.app')
@section('css')
    <style>
        #display{
            display: none;
        }
        #display1{
            display: none;
        }
        #display2{
            display: none;
        }
    </style>
@endsection
@section('js')
    <script>
        function searsh() {
            var ok = $('#change').val();
                if (ok == 'CDD') {
                    document.getElementById("display").id = "salam";
                    document.getElementById("display1").id = "salam1";
                    document.getElementById("salam2").id = "display2";
                }else{
                    document.getElementById("salam").id = "display";
                    document.getElementById("salam1").id = "display1";
                    document.getElementById("display2").id = "salam2";
                }
                    
                    $('#data').html(data);

                }
    </script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
       <div class="col-lg-4">
          <div class="iq-card">
             <div class="iq-card-body pl-0 pr-0 pt-0">
                <div class="doctor-details-block">
                   <div class="doc-profile-bg bg-primary" style="height:150px;text-align : right ">
                   </div>
                   <div class="doctor-profile text-center">
                   <img src="{{url('/'.Auth::guard('prof')->user()->image)}}" alt="profile-img" class="avatar-130 img-fluid">
                   </div>
                   <div class="text-center mt-3 pl-3 pr-3">
                      <h4><b>{{Auth::guard('prof')->user()->nom.' '.Auth::guard('prof')->user()->pre}}</b></h4>
                      <p>{{Auth::guard('prof')->user()->fonction}}</p>
                      <div class="iq-doc-social-info mt-3 mb-3">
                        <ul class="m-0 p-0 list-inline">
                              <li><a href="{{Auth::guard('prof')->user()->facebook}}"><i class="ri-facebook-fill"></i></a></li>
                              <li><a href="{{Auth::guard('prof')->user()->twitter}}"><i class="ri-twitter-fill"></i></a> </li>
                              <li><a href="{{Auth::guard('prof')->user()->insta}}"><i class="ri-instagram-fill"></i></a></li>
                              <li><a href="{{Auth::guard('prof')->user()->linked}}"><i class="ri-linkedin-fill"></i></a></li>
                        </ul>
                     </div>
                     <p style="text-align: right">
                         <button type="button" class="btn btn-primary mb-0" data-toggle="modal" data-target=".model4"><i class="ri-settings-4-fill pr-0"></i></button>
                     </p>
                   </div>
                </div>
             </div>
          </div>      
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">INFORMATION DE POSTE</h4>
                </div>
                <button type="button" class="btn btn-primary mb-0" data-toggle="modal" data-target=".model1"><i class="ri-settings-4-fill pr-0"></i></button>
             </div>
             <div class="iq-card-body">
                <div class="about-info m-0 p-0">
                   <div class="row">
                      <div class="col-6 p-2">Fonction :</div>
                      <div class="col-6 p-2">{{Auth::guard('prof')->user()->fonction}}</div>
                      <div class="col-6 p-2">Poste occupé :</div>
                      <div class="col-6 p-2">{{Auth::guard('prof')->user()->post}}</div>
                      <div class="col-6 p-2">Type de contrat :</div>
                      <div class="col-6 p-2">{{Auth::guard('prof')->user()->type}}</div>
                      @if (Auth::guard('prof')->user()->type === 'CDD')
                        <div class="col-6 p-2">Date d'entrer :</div>
                        <div class="col-6 p-2">{{Auth::guard('prof')->user()->date1}}</div>
                        <div class="col-6 p-2">Finit à :</div>
                        <div class="col-6 p-2">{{Auth::guard('prof')->user()->date2}}</div>
                      @else
                        <div class="col-6 p-2">Date d'entrer :</div>
                        <div class="col-6 p-2">{{Auth::guard('prof')->user()->date1}}</div>
                      @endif
                      
                      <div class="col-12 p-2">Compétences professionnelles:</div>
                      <div class="col-3"></div>
                      <div class="col-9 p-2" style="text-align: right">{{Auth::guard('prof')->user()->compet}}</div>
                   </div>
                </div>
             </div>
          </div>
       </div>
     <div class="col-lg-8">  
        <div class="row">
            <div class="col-md-6">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Informations Générales</h4>
                        </div>
                        <button type="button" class="btn btn-primary mb-0" data-toggle="modal" data-target=".model2"><i class="ri-settings-4-fill pr-0"></i></button>
                    </div>
                    <div class="iq-card-body">
                        <div class="about-info m-0 p-0">
                            <div class="row">
                                    <div class="col-4 p-2">CIN:</div>
                                    <div class="col-8 p-2">{{Auth::guard('prof')->user()->cin}}</div>
                                    <div class="col-4 p-2">Tél:</div>
                                    <div class="col-8 p-2">{{Auth::guard('prof')->user()->tele}}</div>
                                    <div class="col-4 p-2">E-mail:</div>
                                    <div class="col-8 p-2">{{Auth::guard('prof')->user()->email}}</div>
                                    <div class="col-4 p-2">Statut:</div>
                                    <div class="col-8 p-2">{{Auth::guard('prof')->user()->status}}</div>
                                    <div class="col-4 p-2">Sexe:</div>
                                    <div class="col-8 p-2">{{Auth::guard('prof')->user()->sex}}</div>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Informations Générales</h4>
                        </div>
                        <button type="button" class="btn btn-primary mb-0" data-toggle="modal" data-target=".model3"><i class="ri-settings-4-fill pr-0"></i></button>
                    </div>
                    <div class="iq-card-body">
                        <div class="about-info m-0 p-0">
                            <div class="row">
                                <div class="col-5 p-2">Date de naissance:</div>
                                <div class="col-7 p-2">{{Auth::guard('prof')->user()->date}}</div>
                                <div class="col-5 p-2">Adresse :</div>
                                <div class="col-7 p-2">{{Auth::guard('prof')->user()->adress}}</div>
                                <div class="col-5 p-2">Salaire :</div>
                                <div class="col-7 p-2">{{Auth::guard('prof')->user()->salaire}} DH</div>
                                <div class="col-5 p-2">Banque :</div>
                                <div class="col-7 p-2">{{Auth::guard('prof')->user()->banque}}</div>
                                <div class="col-5 p-2">RIB :</div>
                                <div class="col-7 p-2">{{Auth::guard('prof')->user()->rib}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Salaires</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                      <table class="table mb-0 table-borderless">
                       <thead>
                           <tr>
                               <th scope="col"> Date d'échéance</th>
                               <th scope="col">Montant (Dh)</th>
                               <th scope="col">Statut</th>
                           </tr>
                       </thead>
                       <tbody>
                            @foreach ($salaires as $salaire)
                                <tr>
                                    <td>{{$salaire->date}}</td>
                                    <td>{{$salaire->salaire}} DH</td>
                                    <td><span class="badge badge-success">payé</span></td>
                                </tr>
                            @endforeach
                       </tbody>
                   </table>
                   </div>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Les classes</h4>
                      </div>
                      <button type="button" class="btn btn-primary mb-6" data-toggle="modal" data-target="#ajouterClass">Ajouter</button>
                   </div>
                   <div class="iq-card-body">
                      <table class="table mb-0 table-borderless">
                       <thead>
                           <tr>
                               <th scope="col"> Classe</th>
                               <th scope="col">Matiére</th>
                               <th scope="col">Salle</th>
                               <th> Supprimer </th>
                           </tr>
                       </thead>
                       <tbody>
                            @foreach ($prof_classes as $prof_class)
                                <tr>
                                    <td>{{$prof_class->class}}</td>
                                    <td>{{$prof_class->matiere}}</td>
                                    <td>{{$prof_class->salle}}</td>
                                    <td><button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal5{{$prof_class->id}}">Supprimer</button></td>
                                        <form id="logout-form2{{ $prof_class->id }}" action="{{ url('admin/delete/prof_class/'.$prof_class->id)}}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                </tr>
                            @endforeach
                       </tbody>
                   </table>
                   </div>
                </div>
            </div> --}}
                <div class="col-md-12">
                    <div class="iq-card">
                       <div class="iq-card-header d-flex justify-content-between">
                          <div class="iq-header-title">
                             <h4 class="card-title">Documents</h4>
                            </div>
                            <button type="button" class="btn btn-primary mb-6" data-toggle="modal" data-target="#exampleModalCenter">Ajouter</button>
                        </div>
                       <div class="iq-card-body">
                          <table class="table mb-0 table-borderless">
                           <thead>
                               <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">document</th>
                                    <th scope="col">Supprimer</th>
                               </tr>
                           </thead>
                           <tbody>
                                @foreach (Auth::guard('prof')->user()->Files as $file)
                                    <tr>
                                        <td>{{$file->name}}</td>
                                        <td>{{$file->date}}</td>
                                        <td><a href="{{url('/prof/download/'.$file->id) }}"><button class="btn btn-warning">telecharger</button></a></td>
                                        <td><button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$file->id}}">Supprimer</button></td>
                                        <form id="logout-form{{ $file->id }}" action="{{ url('prof/file/'.$file->id)}}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </tr>  
                                @endforeach
                           </tbody>
                       </table>
                       </div>
                    </div>
                </div>
                
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <form method="POST" action="{{url('prof/add_document1')}}" enctype="multipart/form-data">
                            @csrf
                       <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                             <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un document</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                             </div>
                             <div class="modal-body">
                                    <div class="form-group">
                                       <label for="email">Nom :</label>
                                       <select name="name" class="form-control" required>
                                            <option>-- Choisir le nom --</option>
                                            <option value="CIN">CIN</option>
                                            <option value="CV Resume">CV Resume</option>
                                            <option value="Casier Judicaire">Casier Judicaire</option>
                                            <option value="Contrat de travail">Contrat de travail</option>
                                            <option value="Certificat médicale">Certificat médicale</option>
                                            <option value="autre document">autre document</option>
                                        </select>
                                    <input type="hidden" value="{{Auth::guard('prof')->user()->id}}" name="user_id">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputdate">Date :</label>
                                        <input type="date" name="date" class="form-control" id="exampleInputdate">
                                     </div>
                                     <div class="form-group">
                                        <label for="customFile">Image :</label>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choisir fichier</label>
                                         </div>
                                     </div>
                             </div>
                             <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                             </div>
                          </div>
                       </div>
                        </form>
                    </div>
                    <!-- Modal -->
                    @foreach (Auth::guard('prof')->user()->Files as $file)
                    <div class="modal fade" id="exampleModal{{$file->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <a onclick="supprime({{ $file->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                             </div>
                          </div>
                       </div>
                    </div>
                    @endforeach
                    <div class="modal fade model1" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title">INFORMATION DE POSTE </h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <form  method="POST" action="{{url('prof/update_prof1')}}" enctype="multipart/form-data">
                                @csrf
                              <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Fonction:</label>
                                        <select class="form-control" name="fonction" id="selectuserrole">
                                          <option value="Professeur"> Professeur</option>
                                        </select>
                                        @error('fonction')
                                               <span  style="color: red" role="alert">
                                                   <strong>{{ $message }}</strong>
                                               </span>
                                           @enderror
                                     </div>
                                    <div class="form-group col-md-6">
                                       <label for="lname5">Poste occupé:</label>
                                       <input type="text"  name="post" value="{{ Auth::guard('prof')->user()->post }}" class="form-control" id="lname5" >
                                       <input type="hidden" name="id" value="{{Auth::guard('prof')->user()->id}}">
                                       @error('post')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Type de contrat:</label>
                                        <select class="form-control" name="type" id="change" onchange="searsh()">
                                            <option>{{ Auth::guard('prof')->user()->post }}</option>
                                            <option> CDI </option>
                                            <option> CDD </option>
                                            <option> Intérim </option>
                                            <option> stagiaire </option>
                                        </select>
                                        @error('type')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>
                                    <div class="form-group col-md-3" id="display" >
                                        <label for="add25">Date d'adhésion :</label>
                                        <input type="date" name="date1" value="{{ Auth::guard('prof')->user()->date1 }}" class="form-control" id="add25" placeholder="2019-12-18">
                                        @error('date1')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3" id="display1" >
                                        <label for="exampleInputphone187">Finit à :</label>
                                        <input type="date" name="date2"  value="{{ Auth::guard('prof')->user()->date2 }}" class="form-control" id="exampleInputphone187" placeholder="2019-12-18">
                                        @error('date2')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6" id="salam2">
                                        <label for="add2154">Date d'adhésion :</label>
                                        <input type="date" name="date1" value="{{ Auth::guard('prof')->user()->date1 }}" class="form-control" id="add2154" placeholder="2019-12-18">
                                        @error('date1')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                       <label for="add2321254587">Compétences professionnelles :</label>
                                       <textarea type="text" name="compet" class="form-control" id="add2321254587">{{ Auth::guard('prof')->user()->compet }}</textarea>
                                       @error('compet')
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
                    <div class="modal fade model2" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title">Informations Générales </h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <form  method="POST" action="{{url('prof/update_prof2')}}" enctype="multipart/form-data">
                                @csrf
                              <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="32154">CIN :</label>
                                        <input type="text"  name="cin" value="{{ Auth::guard('prof')->user()->cin }}" class="form-control" id="32154" >
                                        <input type="hidden" name="id" value="{{Auth::guard('prof')->user()->id}}">
                                        @error('cin')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="salam">Tél :</label>
                                        <input type="text"  name="tele" value="{{ Auth::guard('prof')->user()->tele }}" class="form-control" id="salam" >
                                        @error('tele')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="code1">E-mail :</label>
                                        <input type="email"  name="email" value="{{ Auth::guard('prof')->user()->email }}" class="form-control" id="code1" >
                                        @error('email')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-sm-6">
                                        <label>Statut :</label>
                                        <select class="form-control" name="status" id="change" >
                                            <option>{{Auth::guard('prof')->user()->status}}</option>
                                            <option value="Célibataire"> Célibataire </option>
                                            <option value="Fiancé(e)"> Fiancé(e) </option>
                                            <option value="Marié(e)"> Marié(e) </option>
                                            <option value="Divorcé(e)"> Divorcé(e) </option>
                                            <option value="Veuf/veuve"> Veuf/veuve </option>
                                        </select>
                                        @error('status')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>
                                     <div class="form-group col-sm-6">
                                        <label>Sexe :</label>
                                        <select class="form-control" name="sex"  >
                                            <option>{{Auth::guard('prof')->user()->sex}} </option>
                                            @if (Auth::guard('prof')->user()->sex == 'Femme')
                                            <option value="Homme">Homme</option>
                                            @else
                                            <option value="Femme">Femme</option>
                                            @endif
                                        </select>
                                        @error('sex')
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
                    <div class="modal fade model3" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title">INFORMATION DE POSTE </h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <form  method="POST" action="{{url('prof/update_prof3')}}" enctype="multipart/form-data">
                                @csrf
                              <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="ok">Date de naissance :</label>
                                        <input type="date"  name="date" value="{{ Auth::guard('prof')->user()->date }}" class="form-control" id="ok" >
                                    <input type="hidden" name="id" value="{{Auth::guard('prof')->user()->id}}">
                                        @error('date')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="ok1">Adresse :</label>
                                        <input type="text"  name="adress" value="{{ Auth::guard('prof')->user()->adress }}" class="form-control" id="ok1" >
                                        <input type="hidden"  name="salaire" value="{{ Auth::guard('prof')->user()->salaire }}">
                                        @error('adress')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="ok3">Banque :</label>
                                        <input type="text"  name="banque" value="{{ Auth::guard('prof')->user()->banque }}" class="form-control" id="ok3" >
                                        @error('banque')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="ok4">RIB :</label>
                                        <input type="text"  name="rib" value="{{ Auth::guard('prof')->user()->rib }}" class="form-control" id="ok4" >
                                        @error('rib')
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
                    <div class="modal fade model4" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title">INFORMATION DE POSTE </h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <form  method="POST" action="{{url('prof/update_prof')}}" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                            <div class="custom-file">
                                               <input type="file" name="image" class="custom-file-input" id="customFile">
                                               <input type="hidden" name="id" value="{{Auth::guard('prof')->user()->id}}">
                                               <label class="custom-file-label" for="customFile">Choisi une image</label>
                                            </div>
                                            @error('post')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="lname5">Nom :</label>
                                        <input type="text"  name="nom" value="{{ Auth::guard('prof')->user()->nom}}" class="form-control" id="lname5" >
                                        @error('post')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="lname5">Prénom :</label>
                                        <input type="text"  name="pre" value="{{ Auth::guard('prof')->user()->pre}}" class="form-control" id="lname5" >
                                        @error('post')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="lname5">Facebook :</label>
                                        <input type="text"  name="facebook" value="{{ Auth::guard('prof')->user()->facebook }}" class="form-control" id="lname5" >
                                        @error('post')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="lname5">twitter :</label>
                                        <input type="text"  name="twitter" value="{{ Auth::guard('prof')->user()->twitter }}" class="form-control" id="lname5" >
                                        @error('post')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="lname5">Instagram :</label>
                                        <input type="text"  name="insta" value="{{ Auth::guard('prof')->user()->insta }}" class="form-control" id="lname5" >
                                        @error('post')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="lname5">LinkedIn :</label>
                                        <input type="text"  name="linked" value="{{ Auth::guard('prof')->user()->linked }}" class="form-control" id="lname5" >
                                        @error('post')
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
            </div>
        </div>
    </div>
 </div>
@endsection