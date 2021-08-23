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
                                <i class="ri-pencil-line pr-0" style="color: rgb(237, 244, 245)" data-toggle="modal" data-target=".model4"></i>
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
                        <div class="col-6 p-2" style="color: rgba(8, 157, 173, 1)" >Fonction :</div>
                        <div class="col-6 p-2">{{$user->fonction}}</div>
                        <div class="col-6 p-2" style="color: rgba(8, 157, 173, 1)">Poste occupé :</div>
                        <div class="col-6 p-2">{{$user->post}}</div>
                        <div class="col-6 p-2" style="color: rgba(8, 157, 173, 1)">Type de contrat :</div>
                        <div class="col-6 p-2">{{$user->type}}</div>
                        @if ($user->type === 'CDD')
                            <div class="col-6 p-2" style="color: rgba(8, 157, 173, 1)">Date d'entrer :</div>
                            <div class="col-6 p-2">{{$user->date1}}</div>
                            <div class="col-6 p-2" style="color: rgba(8, 157, 173, 1)">Finit à :</div>
                            <div class="col-6 p-2">{{$user->date2}}</div>
                        @else
                            <div class="col-6 p-2" style="color: rgba(8, 157, 173, 1)">Date d'entrer :</div>
                            <div class="col-6 p-2">{{$user->date1}}</div>
                        @endif
                        
                        <div class="col-12 p-2" style="color: rgba(8, 157, 173, 1)">Compétences professionnelles:</div>
                        <div class="col-3"></div>
                        <div class="col-9 p-2" style="text-align: left">{{$user->compet}}</div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">Informations Générales</h4>
                    </div>
                    <button type="button" class="btn btn-link" style="font-size: 18px">
                        <i class="ri-pencil-line pr-0" style="color: rgba(8, 157, 173, 1)" data-toggle="modal" data-target=".model3"></i>
                    </button>
                </div>
                <div class="iq-card-body">
                    <div class="about-info m-0 p-0">
                        <div class="row">
                            <div class="col-4 p-2"  style="color: rgba(8, 157, 173, 1)">Salaire :</div>
                            <div class="col-8 p-2">{{$user->salaire}} DH</div>
                            <div class="col-4 p-2"  style="color: rgba(8, 157, 173, 1)">Banque :</div>
                            <div class="col-8 p-2">{{$user->banque}}</div>
                            <div class="col-4 p-2"  style="color: rgba(8, 157, 173, 1)">RIB :</div>
                            <div class="col-8 p-2">{{$user->rib}}</div>
                            <div class="col-6 p-2"  style="color: rgba(8, 157, 173, 1)">IMMATRICULATION :</div>
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
                            {{-- <button type="button" class="btn btn-primary mb-0" data-toggle="modal" data-target=".model2"><i class="ri-pencil-line pr-0"></i></button> --}}
                        </div>
                        <div class="iq-card-body">
                            <div class="about-info m-0 p-0">
                                <div class="row">
                                    <div class="col-6 p-2" style="color: rgba(8, 157, 173, 1)">CIN:</div>
                                    <div class="col-6 p-2">{{$user->cin}}</div>
                                    <div class="col-6 p-2" style="color: rgba(8, 157, 173, 1)">Tél:</div>
                                    <div class="col-6 p-2">{{$user->tele}}</div>
                                    <div class="col-6 p-2" style="color: rgba(8, 157, 173, 1)">Sexe:</div>
                                    <div class="col-6 p-2">{{$user->sex}}</div>
                                    <div class="col-6 p-2" style="color: rgba(8, 157, 173, 1)">E-mail:</div>
                                    <div class="col-6 p-2">{{$user->email}}</div>
                                    <div class="col-6 p-2" style="color: rgba(8, 157, 173, 1)">Situation familiale:</div>
                                    <div class="col-6 p-2">{{$user->status}}</div>
                                    <div class="col-6 p-2" style="color: rgba(8, 157, 173, 1)">Date de naissance:</div>
                                    <div class="col-6 p-2">{{$user->date}}</div>
                                    <div class="col-6 p-2" style="color: rgba(8, 157, 173, 1)">Adresse :</div>
                                    <div class="col-6 p-2">{{$user->adress}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Informations Générales</h4>
                            </div>
                            <button type="button" class="btn btn-primary mb-0" data-toggle="modal" data-target=".model3"><i class="ri-pencil-line pr-0"></i></button>
                        </div>
                        <div class="iq-card-body">
                            <div class="about-info m-0 p-0">
                                <div class="row">
                                    <div class="col-3 p-2"  style="color: rgba(8, 157, 173, 1)">Salaire :</div>
                                    <div class="col-3 p-2">{{$user->salaire}} DH</div>
                                    <div class="col-3 p-2"  style="color: rgba(8, 157, 173, 1)">Banque :</div>
                                    <div class="col-3 p-2">{{$user->banque}}</div>
                                    <div class="col-2 p-2"  style="color: rgba(8, 157, 173, 1)">RIB :</div>
                                    <div class="col-3 p-2">{{$user->rib}}</div>
                                    <div class="col-2 p-2"  style="color: rgba(8, 157, 173, 1)">CNSS :</div>
                                    <div class="col-4 p-2">12121212121212121212</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-6">
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
                                <th scope="col">Situation familiale</th>
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
                <div class="col-md-6">
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
                                        <td>
                                        <center><i class="ri-delete-bin-2-fill" style="color: rgba(8, 155, 171, 1); padding-right: 10px" data-toggle="modal" data-target="#exampleModal5{{$prof_class->id}}" ></i></center> 
                                        </td>
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
                </div>
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
                                @foreach ($files as $file)
                                    <tr>
                                        <td>{{$file->name}}</td>
                                        <td>{{$file->date}}</td>
                                        <td><a href="{{url('/admin/download/'.$file->id) }}"><button type="button" class="btn btn-link" style="font-size: 22px"><i class="ri-download-cloud-fill" style="color: rgba(8, 155, 171, 1)"></i></button></a></td>
                                        <td>
                                            <button type="button" class="btn btn-link" style="font-size: 18px" data-toggle="modal" data-target="#exampleModal{{$file->id}}">
                                                <i class="ri-delete-bin-2-fill" style="color: rgba(8, 155, 171, 1)" ></i>
                                            </button>
                                        </td>
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
                </div> --}}
                <div class="col-lg-12">
                    <div class="iq-accordion career-style faq-style  ">
                        <div class="iq-card iq-accordion-block accordion-active">
                            <div class="active-faq clearfix">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a style="padding-right: 20px"><span > <h4>Les classes <i class="ri-add-line" style="color: rgb(8, 157, 173); font-size:23px" data-toggle="modal" data-target="#ajouterClass"></i></h4> </span> </a>
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
                                                        <th scope="col"> Classe</th>
                                                        <th scope="col">Matiére</th>
                                                        <th scope="col"> Supprimer </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($prof_classes as $prof_class)
                                                        <tr>
                                                            <td>{{$prof_class->class}}</td>
                                                            <td>{{$prof_class->matiere}}</td>
                                                            <td>
                                                                <i class="ri-delete-bin-2-fill" style="color: rgba(8, 155, 171, 1); padding-right: 10px" data-toggle="modal" data-target="#exampleModal5{{$prof_class->id}}" ></i> 
                                                            </td>
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
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card iq-accordion-block">
                            <div class="active-faq clearfix">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12"><a  ><span> <h4>Salaires</h4> </span> </a></div>
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
                                            <a style="padding-right: 20px"><span > <h4>Documents <i class="ri-add-line" style="color: rgb(8, 157, 173); font-size:23px" data-toggle="modal" data-target="#exampleModalCenter"></i></h4> </span> </a>
                                            
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
                                                            <td><a href="{{url('/admin/download/'.$file->id) }}"><button type="button" class="btn btn-link" style="font-size: 22px"><i class="ri-download-cloud-fill" style="color: rgba(8, 155, 171, 1)"></i></button></a></td>
                                                            <td>
                                                                <button type="button" class="btn btn-link" style="font-size: 18px" data-toggle="modal" data-target="#exampleModal{{$file->id}}">
                                                                    <i class="ri-delete-bin-2-fill" style="color: rgba(8, 155, 171, 1)" ></i>
                                                                </button>
                                                            </td>
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
                        <div class="iq-card iq-accordion-block">
                            <div class="active-faq clearfix">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a style="padding-right: 20px"><span > <h4>Clubs</h4> </span> </a>
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
                                                <ul class="profile-img-gallary d-flex flex-wrap p-0 m-0">
                                                    @foreach ($Clubs as $club)
                                                        <li class="col-md-4 col-6 pb-3"><a href="{{url('admin/club_profil/'.$club->id)}}"><img src="{{url('/'.$club->image)}}" style="width: 100px; height; 100px" alt="gallary-image" class="img-fluid"></a></li>
                                                    @endforeach
                                                </ul>
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
                            <form method="POST" action="{{url('admin/add_document1')}}" enctype="multipart/form-data">
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
                                        <select name="name" class="form-control" onchange="chnage_document()" id="doc_name" required>
                                            <option>-- Choisir le nom --</option>
                                            <option value="CIN">CIN</option>
                                            <option value="CV Resume">CV Resume</option>
                                            <option value="Casier Judicaire">Casier Judicaire</option>
                                            <option value="Contrat de travail">Contrat de travail</option>
                                            <option value="Certificat médicale">Certificat médicale</option>
                                            <option value="autre">autre document</option>
                                        </select>
                                        <input type="hidden" value="{{$user->id}}" name="user_id">
                                        </div>
                                        <div class="form-group" id="name151" style="display: none">
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


                        <div class="modal fade" id="ajouterClass" tabindex="-1" role="dialog" aria-labelledby="ajouterClassTitle" aria-hidden="true">
                            <form method="POST" action="{{url('admin/add_prof_class')}}" enctype="multipart/form-data">
                                @csrf
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ajouterClassTitle">Ajouter un classe</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                        <div class="form-group">
                                            <label for="email">Catégorie :</label>
                                            <select name="name" id="cat" onchange="change4('{{url('admin/ajax_get_matiere_by_categorie')}}'), change7('{{url('admin/ajax_get_class_by_categorie')}}')" class="form-control" required>
                                                @if(empty(old('categorie')))
                                                <option  selected="" disabled=""> -- Choisir une classe -- </option>
                                            @endif
                                            @foreach ($categories as $categorie)
                                                <option value="{{$categorie->id}}"{{ old('categorie') == $categorie->id ? 'selected' : '' }}>{{$categorie->name}}</option>
                                            @endforeach
                                            </select>
                                        <input type="hidden" value="{{$user->id}}" name="prof">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Class :</label>
                                            <select name="class" id="class" class="form-control" required>
                                                <option>-- Choisir une class --</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputdate">Matiére :</label>
                                            <select name="matiere" id="matiere" class="form-control" required>
                                                <option value="">-- Choisir le matiére --</option>
                                                @foreach ($matieres as $matiere)
                                                    <option value="{{$matiere->id}}">{{$matiere->name}}</option>
                                                @endforeach
                                            </select>
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

                        @foreach ($prof_classes as $prof_class)
                        <div class="modal fade" id="exampleModal5{{$prof_class->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <a onclick="supprime2({{ $prof_class->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
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
                                <form  method="POST" action="{{url('admin/update_prof1')}}" enctype="multipart/form-data">
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
                                        <input type="text"  name="post" value="{{ $user->post }}" class="form-control" id="lname5" >
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        @error('post')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Type de contrat:</label>
                                            <select class="form-control" name="type" id="change" onchange="searsh()">
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
                                <form  method="POST" action="{{url('admin/update_prof2')}}" enctype="multipart/form-data">
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
                                            <label>Situation familiale :</label>
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
                                    <h5 class="modal-title">INFORMATION DE POSTE </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form  method="POST" action="{{url('admin/update_prof3')}}" enctype="multipart/form-data">
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
                                <form  method="POST" action="{{url('admin/update_prof')}}" enctype="multipart/form-data">
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