@extends('admin/layouts.app')
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
        #hide {
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
        function change_post(value) {
            var value = $('#'+value).val();
            if (value == 'Autre') {
                document.getElementById("hide").id = "show";
            }
            if (value != 'Autre') {
                document.getElementById("show").id = "hide";
            }
        }

        function chnage_document() {
            var value = $('#doc_name').val();
            if (value == 'autre') {
                var input = document.getElementById("name151");
                input.innerHTML='<label for="exampleI">Nom du document :</label><input type="text" name="name" class="form-control" id="exampleI">'
            } else {
                input.style.display = "none";
            }
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
                        <p style="text-align: right">
                            <button type="button" class="btn btn-link" style="font-size: 18px">
                                <i class="ri-pencil-line pr-0" style="color: rgb(241, 241, 241)" data-toggle="modal" data-target=".model4"></i>
                            </button>
                        </p>
                   </div>
                   <div class="doctor-profile text-center">
                   <img src="{{url('/'.$user->image)}}" alt="profile-img" class="avatar-130 img-fluid">
                   </div>
                   <div class="text-center mt-3 pl-3 pr-3">
                      <h4><b>{{$user->nom.' '.$user->pre}}</b></h4>
                      <p>{{$user->fonction}}</p>
                      <div class="iq-doc-social-info mt-3 mb-3">
                        <ul class="m-0 p-0 list-inline">
                              <li><a href="{{$user->facebook}}"><i class="ri-facebook-fill"></i></a></li>
                              <li><a href="{{$user->twitter}}"><i class="ri-twitter-fill"></i></a> </li>
                              <li><a href="{{$user->insta}}"><i class="ri-instagram-fill"></i></a></li>
                              <li><a href="{{$user->linked}}"><i class="ri-linkedin-fill"></i></a></li>
                        </ul>
                     </div>
                   </div>
                </div>
             </div>
          </div>      
          <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">INFORMATION DE POSTE</h4>
                </div>
                <button type="button" class="btn btn-link" style="font-size: 18px">
                    <i class="ri-pencil-line pr-0" style="color: rgba(8, 157, 173, 1)" data-toggle="modal" data-target=".model1"></i>
                </button>
             </div>
             <div class="iq-card-body">
                <div class="about-info m-0 p-0">
                   <div class="row">
                      <div class="col-6 p-2">Fonction :</div>
                      <div class="col-6 p-2">{{$user->fonction}}</div>
                      <div class="col-6 p-2">Poste occupé :</div>
                      @if ($user->post == 'Autre')
                      <div class="col-6 p-2">{{$user->post_name}}</div>
                      @else
                      <div class="col-6 p-2">{{$user->post}}</div>
                      @endif
                      <div class="col-6 p-2">Type de contrat :</div>
                      <div class="col-6 p-2">{{$user->type}}</div>
                      @if ($user->type === 'CDD')
                        <div class="col-6 p-2">Date d'entrer :</div>
                        <div class="col-6 p-2">{{$user->date1}}</div>
                        <div class="col-6 p-2">Finit à :</div>
                        <div class="col-6 p-2">{{$user->date2}}</div>
                      @else
                        <div class="col-6 p-2">Date d'entrer :</div>
                        <div class="col-6 p-2">{{$user->date1}}</div>
                      @endif
                      
                      <div class="col-12 p-2">Compétences professionnelles:</div>
                      <div class="col-3"></div>
                      <div class="col-9 p-2" style="text-align: left">{{$user->compet}}</div>
                   </div>
                </div>
             </div>
          </div>
          <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">INFORMATIONS DU SALAIRE</h4>
                </div>
                <button type="button" class="btn btn-link" style="font-size: 18px">
                    <i class="ri-pencil-line pr-0" style="color: rgba(8, 157, 173, 1)" data-toggle="modal" data-target=".model3"></i>
                </button>
            </div>
            <div class="iq-card-body">
                <div class="about-info m-0 p-0">
                    <div class="row">
                        <div class="col-5 p-2">Salaire :</div>
                        <div class="col-7 p-2">{{$user->salaire}} DH</div>
                        <div class="col-5 p-2">Banque :</div>
                        <div class="col-7 p-2">{{$user->banque}}</div>
                        <div class="col-5 p-2">RIB :</div>
                        <div class="col-7 p-2">{{$user->rib}}</div>
                        <div class="col-6 p-2">IMMATRICULATION :</div>
                        <div class="col-6 p-2">{{$user->cnss}}</div>
                    </div>
                </div>
            </div>
        </div>
       </div>
     <div class="col-lg-8">  
        <div class="row">
            <div class="col-md-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Informations Générales</h4>
                        </div>
                        <button type="button" class="btn btn-link" style="font-size: 18px">
                            <i class="ri-pencil-line pr-0" style="color: rgba(8, 157, 173, 1)" data-toggle="modal" data-target=".model2"></i>
                        </button>
                    </div>
                    <div class="iq-card-body">
                        <div class="about-info m-0 p-0">
                            <div class="row">
                                <div class="col-6 p-2">CIN:</div>
                                <div class="col-6 p-2">{{$user->cin}}</div>
                                <div class="col-6 p-2">Tél:</div>
                                <div class="col-6 p-2">{{$user->tele}}</div>
                                <div class="col-6 p-2">E-mail:</div>
                                <div class="col-6 p-2">{{$user->email}}</div>
                                <div class="col-6 p-2">Statut:</div>
                                <div class="col-6 p-2">{{$user->status}}</div>
                                <div class="col-6 p-2">Sexe:</div>
                                <div class="col-6 p-2">{{$user->sex}}</div>
                                <div class="col-6 p-2">Date de naissance :</div>
                                <div class="col-6 p-2">{{$user->date}}</div>
                                <div class="col-6 p-2">Adresse :</div>
                                <div class="col-6 p-2">{{$user->adress}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="iq-accordion career-style faq-style  ">
                    <div class="iq-card iq-accordion-block accordion-active">
                        <div class="active-faq clearfix">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12"><a><span> <h4>Salaires</h4> </span> </a></div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-details">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="iq-card">
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
                                                        @foreach ($user->mois as $mois)
                                                            <tr>
                                                                <td>{{$mois['ok']}}</td>
                                                                <td>{{$user->salaire}} DH</td>
                                                                @if ($mois['etat'] == 'oui')
                                                                    <td><span class="badge badge-success">payé</span></td>
                                                                @endif
                                                                @if ($mois['etat'] == 'non')
                                                                    <td><span class="badge badge-danger"> non payé</span></td>
                                                                @endif
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="iq-card iq-accordion-block">
                        <div class="active-faq clearfix">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a style="padding-right: 20px"><span > <h4>Documents <i class="ri-add-line" style="color: rgb(8, 157, 173); font-size:23px"  data-toggle="modal" data-target="#exampleModalCenter"></i></h4> </span> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-details">
                            <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="iq-card">
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
                                                @foreach ($files as $file)
                                                    <tr>
                                                        <td>{{$file->name}}</td>
                                                        <td>{{$file->date}}</td>
                                                        <td><a href="{{url('/admin/download/'.$file->id) }}"><button class="btn btn-link" style="font-size: 22px"><i class="ri-download-cloud-fill" style="color: rgba(8, 155, 171, 1)"></i></button></a></td>
                                                        <td><button class="btn btn-link" data-toggle="modal" data-target="#exampleModal{{$file->id}}"><i class="ri-delete-bin-2-fill" style="color: rgba(8, 155, 171, 1);font-size: 22px" ></i></button></td>
                                                        <form id="logout-form{{ $file->id }}" action="{{ url('admin/file/'.$file->id)}}" method="POST" style="display: none;">
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
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <form method="POST" action="{{url('admin/add_document')}}" enctype="multipart/form-data">
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
                                       <select name="name" class="form-control" id="doc_name" onchange="chnage_document()" required>
                                            <option>-- Choisir le nom --</option>
                                            <option value="CIN">CIN</option>
                                            <option value="CV Resume">CV Resume</option>
                                            <option value="Casier Judicaire">Casier Judicaire</option>
                                            <option value="Contrat de travail">Contrat de travail</option>
                                            <option value="Certificat médicale">Certificat médicale</option>
                                            <option value="autre">autre document</option>
                                        </select>
                                        <input type="hidden" value="{{$user->id}}" name="user_id">
                                        @error('name')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        @error('user_id')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group" id="name151"">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputdate">Date :</label>
                                        <input type="date" name="date" class="form-control" id="exampleInputdate">
                                        @error('date')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="customFile">Image :</label>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choisir fichier</label>
                                            @error('image')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
                    @foreach ($files as $file)
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
                              <form  method="POST" action="{{url('admin/update_staff1')}}" enctype="multipart/form-data">
                                @csrf
                              <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Fonction:</label>
                                        <select class="form-control" name="fonction" id="selectuserrole" disabled>
                                          <option value="{{ $user->fonction }}">{{ $user->fonction }}</option>
                                          <option value="Administration" {{ old('fonction') == 'Administration' || $user->fonction == 'Administration' ? 'selected' : '' }}> Administration</option>
                                          <option value="Staff" {{ old('fonction') == 'Staff' || $user->fonction == 'Staff' ? 'selected' : '' }}> Staff</option>
                                        </select>
                                        @error('fonction')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    @if ($user->fonction == 'Administration')
                                        <div class="form-group col-md-6">
                                            <label>Post:</label>
                                            <select class="form-control" name="post" onchange="change_post('post_name')" id="post_name">
                                            <option value="secritére" {{ old('post') == 'secrétaire' || $user->post == 'secritére' ? 'selected' : '' }}> secritére</option>
                                            <option value="Autre" {{ old('post') == 'Autre' || $user->post == 'Autre' ? 'selected' : '' }}>Autre</option>
                                            </select>
                                            @error('post')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @endif
                                    @if ($user->fonction == 'Staff')
                                        <div class="form-group col-md-6">
                                            <label>Post:</label>
                                            <select class="form-control" name="post" onchange="change_post('post_name1')" id="post_name1">
                                                <option value="Accompagnement" {{ old('post') == 'Accompagnement' || $user->post == 'Accompagnement' ? 'selected' : '' }}> Accompagnement</option>
                                                <option value="Chauffeur" {{ old('post') == 'Chauffeur' || $user->post == 'secritére' ? 'Chauffeur' : '' }}> Chauffeur </option>
                                            <option value="Menage" {{ old('post') == 'Menage' || $user->post == 'Menage' ? 'selected' : '' }}>Menage</option>
                                            <option value="Sécurité" {{ old('post') == 'Sécurité' || $user->post == 'Sécurité' ? 'selected' : '' }}>Sécurité</option>
                                            </select>
                                            @error('post')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @endif
                                    @if ($user->post == 'Autre')
                                        <div class="form-group col-md-6" id="show">
                                        <label for="lname5">Nom du post:</label>
                                        <input type="text"  name="post_name" value="{{ $user->post_name }}" class="form-control" id="lname5" >
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        @error('post')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @else
                                        <div class="form-group col-md-6" id="hide">
                                            <label for="lname5">Nom du post:</label>
                                            <input type="text"  name="post_name" value="{{ $user->post_name }}" class="form-control" id="lname5" >
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            @error('post')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    @endif
                                    <div class="form-group col-sm-6">
                                        <label>Type de contrat:</label>
                                        <select class="form-control" name="type" id="change" onchange="searsh()" >
                                            <option>{{ $user->type }}</option>
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
                                        <input type="date" name="date1" value="{{ $user->date1 }}" class="form-control" id="add25" placeholder="2019-12-18">
                                        @error('date1')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3" id="display1" >
                                        <label for="exampleInputphone187">Finit à :</label>
                                        <input type="date" name="date2"  value="{{ $user->date2 }}" class="form-control" id="exampleInputphone187" placeholder="2019-12-18">
                                        @error('date2')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6" id="salam2">
                                        <label for="add2154">Date d'adhésion :</label>
                                        <input type="date" name="date1" value="{{ $user->date1 }}" class="form-control" id="add2154" placeholder="2019-12-18">
                                        @error('date1')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                       <label for="add2321254587">Compétences professionnelles :</label>
                                       <textarea type="text" name="compet" class="form-control" id="add2321254587">{{ $user->compet }}</textarea>
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
                              <form  method="POST" action="{{url('admin/update_staff2')}}" enctype="multipart/form-data">
                                @csrf
                              <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="32154">CIN :</label>
                                        <input type="text"  name="cin" value="{{ $user->cin }}" class="form-control" id="32154" >
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        @error('cin')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="salam">Tél :</label>
                                        <input type="text"  name="tele" value="{{ $user->tele }}" class="form-control" id="salam" >
                                        @error('tele')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="code1">E-mail :</label>
                                        <input type="email"  name="email" value="{{ $user->email }}" class="form-control" id="code1" >
                                        @error('email')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-sm-6">
                                        <label>Statut :</label>
                                        <select class="form-control" name="status" id="change" >
                                            <option>{{$user->status}}</option>
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
                                            <option>{{$user->sex}} </option>
                                            @if ($user->sex == 'Femme')
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
                                     <div class="form-group col-md-6">
                                        <label for="ok">Date de naissance :</label>
                                        <input type="date"  name="date" value="{{ $user->date }}" class="form-control" id="ok" >
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        @error('date')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-12">
                                        <label for="ok1">Adresse :</label>
                                        <input type="text"  name="adress" value="{{ $user->adress }}" class="form-control" id="ok1" >
                                        @error('adress')
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
                                 <h5 class="modal-title">INFORMATIONS DU SALAIRE </h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <form  method="POST" action="{{url('admin/update_staff3')}}" enctype="multipart/form-data">
                                @csrf
                              <div class="modal-body">
                                <div class="row">
                                     <div class="form-group col-md-6">
                                        <label for="ok2">Salaire :</label>
                                        <input type="text"  name="salaire" value="{{ $user->salaire }}" class="form-control" id="ok2" >
                                        @error('salaire')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="ok3">Banque :</label>
                                        <input type="text"  name="banque" value="{{ $user->banque }}" class="form-control" id="ok3" >
                                        @error('banque')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="ok4">RIB :</label>
                                        <input type="text"  name="rib" value="{{ $user->rib }}" class="form-control" id="ok4" >
                                        @error('rib')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="cnss">IMMATRICULATION DE CNSS :</label>
                                        <input type="text"  name="cnss" value="{{ $user->cnss }}" class="form-control" id="cnss" >
                                        <input type="hidden"  name="id" value="{{ $user->id }}">
                                        @error('cnss')
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
                              <form  method="POST" action="{{url('admin/update_staff')}}" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                            <div class="custom-file">
                                               <input type="file" name="image" class="custom-file-input" id="customFile">
                                               <input type="hidden" name="id" value="{{$user->id}}">
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
                                        <input type="text"  name="nom" value="{{ $user->nom}}" class="form-control" id="lname5" >
                                        @error('post')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="lname5">Prénom :</label>
                                        <input type="text"  name="pre" value="{{ $user->pre}}" class="form-control" id="lname5" >
                                        @error('post')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="lname5">Facebook :</label>
                                        <input type="text"  name="facebook" value="{{ $user->facebook }}" class="form-control" id="lname5" >
                                        @error('post')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="lname5">twitter :</label>
                                        <input type="text"  name="twitter" value="{{ $user->twitter }}" class="form-control" id="lname5" >
                                        @error('post')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="lname5">Instagram :</label>
                                        <input type="text"  name="insta" value="{{ $user->insta }}" class="form-control" id="lname5" >
                                        @error('post')
                                             <span  style="color: red" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                     </div>
                                     <div class="form-group col-md-6">
                                        <label for="lname5">LinkedIn :</label>
                                        <input type="text"  name="linked" value="{{ $user->linked }}" class="form-control" id="lname5" >
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