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
        .btn-roze{
            background: rgb(240, 147, 224);
            color: white;
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
                    <div class="doc-profile-bg" style="background: rgb(240, 147, 224);height:150px;text-align : right ">
                    </div>
                    <div class="doctor-profile text-center">
                    <img src="{{url('/'.$student->image)}}" alt="profile-img" class="avatar-130 img-fluid">
                    </div>
                    <div class="text-center mt-3 pl-3 pr-3">
                        <h4><b>{{$student->nom.' '.$student->pre}}</b></h4></h4>
                        <h4><b>{{$student->nom1.' '.$student->pre1}}</b></h4>
                        <h4><b style="color:rgb(240, 147, 224)">{{$student->id1}}</b></h4>
                        <div class="iq-doc-social-info-fille mt-3 mb-3">
                            <ul class="m-0 p-0 list-inline">
                                <li><a href="{{$student->facebook}}"><i class="ri-facebook-fill"></i></a></li>
                                <li><a href="{{$student->twitter}}"><i class="ri-twitter-fill"></i></a> </li>
                                <li><a href="{{$student->insta}}"><i class="ri-instagram-fill"></i></a></li>
                                <li><a href="{{$student->youtube}}"><i class="ri-youtube-fill"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
            </div> 
            {{-- <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">LES PARENTS</h4>
                    </div>
                    <div class="modal fade model5" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Choisir le tuteur</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <form action="{{url('admin/update_tuteur')}}" method="post">
                                @csrf
                                    <div class="modal-body">
                                            @error('tuteur')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        @foreach ($parents as $parent)
                                            @if ($parent->tuteur == 'oui')
                                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline" style="padding-top: 10px" >
                                                    <input type="radio" id="customRadio-{{$parent->parent->id}}" value="{{$parent->parent->id}}" name="tuteur" checked class="custom-control-input bg-primary">
                                                    <label class="custom-control-label" for="customRadio-{{$parent->parent->id}}"> {{$parent->parent->nom.' '.$parent->parent->pre}}  ( {{$parent->relation}} ) </label>
                                                </div>
                                            @else
                                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline" style="padding-top: 10px" >
                                                    <input type="radio" id="customRadio-{{$parent->parent->id}}" value="{{$parent->parent->id}}" name="tuteur" class="custom-control-input bg-primary">
                                                    <label class="custom-control-label" for="customRadio-{{$parent->parent->id}}"> {{$parent->parent->nom.' '.$parent->parent->pre}}  ( {{$parent->relation}} )  </label>
                                                </div>
                                            @endif
                                        @endforeach
                                            <input type="hidden" name="student_id" value="{{$student->id}}" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-roze">Changer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iq-card-body">
                   <ul class="profile-img-gallary d-flex flex-wrap p-0 m-0">
                          <?php $n = 0 ?>
                          @foreach ($parents as $parent)
                                @if ($parent->tuteur == 'oui')
                                    <li class="col-md-4 col-6 pb-3"><center>( tuteur )</center><a href="javascript:void();"><img src="{{url($parent->parent->image)}}" style="width: 100px;height: 100px" alt="gallary-image" class="img-fluid"></a></li>
                                @else
                                    <li class="col-md-4 col-6 pb-3"><br><a href="javascript:void();"><img style="width: 100px;height: 100px" src="{{url($parent->parent->image)}}" alt="gallary-image" class="img-fluid"></a></li>
                                @endif
                          @endforeach
                   </ul>
                </div>
            </div> --}}
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">LES FRÈRES</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                   <ul class="profile-img-gallary d-flex flex-wrap p-0 m-0">
                        @foreach ($freres as $frere)
                            @if ($frere->id != $student->id)
                                <li class="col-md-4 col-6 pb-3"><br><a title="{{$frere->nom.' '.$frere->pre}}"  href="{{url('admin/eleve/profil/'.$frere->id)}}"><img src="{{url($frere->image)}}" alt="gallary-image" class="img-fluid"></a></li> 
                            @endif
                        @endforeach
                   </ul>
                </div>
            </div>
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">FAMILLE & AMIS</h4>
                   </div>
                    {{-- <button type="button" class="btn btn-link" style="font-size: 22px">
                        <i class="ri-subtract-line" style="color: rgb(216, 86, 69)" data-toggle="modal" data-target=".model7" ></i>
                        <i class="ri-add-line" style="color: rgb(240, 147, 224)" data-toggle="modal" data-target=".model6" ></i>
                    </button> --}}
                    <div class="modal fade model6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <form method="POST" action="{{url('admin/add_friend')}}" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Informations Générales </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="cat">Catégorie :</label>
                                            <select class="form-control" onchange="change1('{{url('admin/ajax_get_cycle_by_categorie')}}')" name="categorie" id="cat">
                                                @if(empty(old('categorie')))
                                                    <option  selected="" disabled=""> -- Choisir une classe -- </option>
                                                @endif
                                                <option value="préscolaire"{{ old('categorie') == 'préscolaire' ? 'selected' : '' }}>préscolaire</option>
                                                
                                                <option value="primaire" {{ old('categorie') == 'primaire' ? 'selected' : '' }}>primaire</option>
                                                
                                                <option value="E.collégial" {{ old('categorie') == 'E.collégial' ? 'selected' : '' }}>E.collégial</option>
                                            </select>
                                            <input type="hidden" name="id" value="{{$student->id}}">
                                            <input type="hidden" name="hidden" value="categorie">
                                            @error('categorie')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="32154">Cycle :</label>
                                            <select class="form-control" onchange="change2('{{url('admin/ajax_get_class_by_cycle')}}')" name="cycle" id="cycle">
                                                <option  selected="" disabled=""> -- Choisir un Cycle -- </option>
                                            </select>
                                            @error('cycle')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="class">Class :</label>
                                        <select class="form-control" name="classe" onchange="change6('{{url('admin/ajax_get_student_by_class_friend')}}','{{$student->id}}')" id="class">
                                                    <option  selected="" disabled=""> -- Choisir une classe -- </option>
                                            </select>
                                            @error('classe')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label>éléves :</label>
                                            <select class="form-control" name="eleve" id="eleve" >
                                                <option selected disabled >-- Choisir un éléve --</option>
                                            </select>
                                            @error('transport')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-roze">Modifier</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="modal fade model7" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                @foreach ($friends as $friend)
                                    <li><a href="{{url('admin/eleve/profil/'.$friend->id)}}"><img title="{{$friend->nom.' '.$friend->pre}}" src="{{url($friend->image)}}" style="width: 50px" alt="gallary-image" class="img-fluid"></a>
                                    {{$friend->nom.' '.$friend->pre}} <i class="ri-close-fill"   onclick="supprime1({{ $friend->id }});" style="color: rgb(104, 43, 94); float:right; font-size: 20px"></i></li>
                                    
                                    <form id="logout-form1{{ $friend->id }}" action="{{ url('admin/delete/friend/'.$friend->id.'/'.$student->id)}}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endforeach
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                              </div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="iq-card-body">
                    <ul class="profile-img-gallary d-flex flex-wrap p-0 m-0">
                        @foreach ($friends as $friend)
                            <li class="col-md-4 col-6 pb-3"><a href="{{url('admin/eleve/profil/'.$friend->id)}}"><img title="{{url($friend->nom.' '.$friend->pre)}}" src="{{url($friend->image)}}" alt="gallary-image" class="img-fluid"></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">LES IMAGES</h4>
                    </div>
                    {{-- <button type="button" class="btn btn-link" style="font-size: 22px">
                        <i class="ri-add-line" style="color: rgb(240, 147, 224)" data-toggle="modal" data-target=".model8" ></i>
                    </button> --}}
                    <div class="modal fade model8" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <form method="POST" action="{{url('admin/add_student_image')}}" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Informations Générales </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="customFile">Image :</label>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="customFile">
                                        <input type="hidden" name="id" value="{{ $student->id }}">
                                            <label class="custom-file-label" for="customFile">Choisir fichier</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-roze">Ajouter</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="iq-card-body">
                   <ul class="profile-img-gallary d-flex flex-wrap p-0 m-0">
                        @foreach ($images as $image)
                            <li class="col-md-4 col-6 pb-3"><a href="javascript:void();"><img src="{{url($image->image)}}" alt="gallary-image" class="img-fluid"></a></li>
                        @endforeach
                      
                   </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-8">  
            <div class="row">
                {{-- <div class="col-md-6">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Informations scolaires</h4>
                            </div>
                            <button type="button" class="btn btn-roze mb-0" data-toggle="modal" data-target=".model2"><i class="ri-settings-4-fill pr-0"></i></button>
                        </div>
                        <div class="iq-card-body">
                            <div class="about-info m-0 p-0">
                                <div class="row">
                                        <div class="col-6 p-2">Cataégorie:</div>
                                        <div class="col-6 p-2">{{$student->categorie}}</div>
                                        <div class="col-6 p-2">Cycle :</div>
                                        <div class="col-6 p-2">{{$cycle->name}}</div>
                                        <div class="col-6 p-2">Class:</div>
                                        <div class="col-6 p-2">
                                            @if(!empty($class->name))
                                                {{ $class->name }}
                                            @elseif(empty($class->name))
                                                {{$student->class}}
                                            @endif</div>
                                        <div class="col-6 p-2">Numéro d'éléve:</div>
                                        <div class="col-6 p-2">{{$student->class_num}}</div>
                                        <div class="col-6 p-2">Transport:</div>
                                        <div class="col-6 p-2">@if(!empty($student->transport)){{$transport->name}}@endif</div>
                                        <div class="col-6 p-2">Trajet:</div>
                                        <div class="col-6 p-2">@if(!empty($student->trajet)){{$trajet->name}}@endif</div>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                            <h4 class="card-title">Informations générales</h4>
                            </div>
                            <button type="button" class="btn btn-roze mb-0" data-toggle="modal" data-target=".model1"><i class="ri-settings-4-fill pr-0"></i></button>
                        </div>
                        <div class="iq-card-body">
                            <div class="about-info m-0 p-0">
                                <div class="row">
                                    <div class="col-6 p-2">Code massar:</div>
                                    <div class="col-6 p-2">{{$student->id1}}</div>
                                    <div class="col-6 p-2">Sexe :</div>
                                    <div class="col-6 p-2">{{$student->sex}}</div>
                                    <div class="col-6 p-2">Date de naissance :</div>
                                    <div class="col-6 p-2">{{$student->date}}</div>
                                    <div class="col-6 p-2">Téléphone :</div>
                                    <div class="col-6 p-2">{{$student->tele}}</div>
                                    <div class="col-6 p-2">E-mail: :</div>
                                    <div class="col-6 p-2">{{$student->mail}}</div>
                                    <div class="col-6 p-2">Adress :</div>
                                    <div class="col-6 p-2">{{$student->adress}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-12">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Timeline</h4>
                            </div>
                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-roze mb-6" data-toggle="modal" data-target="#timeline">Ajouter</button>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card-body">
                        <ul class="iq-timeline">
                            <?php $n = 0; ?>
                            @foreach ($timeline as $timeline1)
                                <li>
                                    <?php $n = $n+1; 
                                        if ($n == 1) {
                                            $number = 'border-success';
                                        } 
                                        if ($n == 2) {
                                            $number = 'border-warning';
                                        } 
                                        if ($n == 3) {
                                            $number = 'border-info';
                                        } 
                                        if ($n == 4) {
                                            $number = 'border-dark';
                                        } 
                                    ?>
                                    <div class="timeline-dots {{$number}}"></div>
                                    <h6 class="float-left mb-1"><b>{{$timeline1->by}}</b>  ({{$timeline1->name}}) : </h6>
                                    <small class="float-right mt-1">{{$timeline1->date}}</small>
                                    <div class="d-inline-block w-100">
                                        <p>{{ substr($timeline1->sujet, 0, 70)}} @if (strlen($timeline1->sujet) > 70) ... @endif</p>
                                        @if (!empty($timeline1->image))
                                            <a href="{{url('prof/download/timeline_file/'.$timeline1->id)}}"><b style="color:red">Télécharger le document</b></a>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <button type="button" data-toggle="modal" data-target="#exampleModalScrollable" class="btn btn-link" style="font-size: 15px; float: right;">
                            <i class="ri-eye-line" style="color: rgb(240, 147, 224)"> afficher tout</i>
                            </button>
                        </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalScrollableTitle">TIMELINE</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="iq-timeline">
                                            <?php $n = 0; ?>
                                            @foreach ($timelines as $timelines1)
                                            <li>
                                                <?php
                                                if ($n < 8) {
                                                    $n = $n+1; 
                                                } else{
                                                    $n = 1;
                                                }
                                                    if ($n == 1) {
                                                        $number = 'border-success';
                                                    } 
                                                    if ($n == 2) {
                                                        $number = 'border-warning';
                                                    } 
                                                    if ($n == 3) {
                                                        $number = 'border-info';
                                                    } 
                                                    if ($n == 4) {
                                                        $number = 'border-dark';
                                                    } 
                                                    if ($n == 5) {
                                                        $number = 'border-danger';
                                                    } 
                                                    if ($n == 6) {
                                                        $number = 'border-primary';
                                                    } 
                                                    if ($n == 7) {
                                                        $number = 'border-secondary';
                                                    } 
                                                ?>
                                                <div class="timeline-dots {{$number}}"></div>
                                                <h6 class="float-left mb-1"><b>{{$timelines1->by}}</b> ({{$timelines1->name}}) :</h6>
                                                <small class="float-right mt-1">{{$timelines1->date}}</small>
                                                <div class="d-inline-block w-100">
                                                    <p>{{$timelines1->sujet}} </p><br>
                                                    @if (!empty($timelines1->image))
                                                        <a href="{{url('admin/download/timeline_file/'.$timelines1->id)}}"><b style="color:red">téléchergerle document</b></a>
                                                    @endif
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-roze" data-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                    </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <form method="POST" action="{{url('admin/add_student_file')}}" enctype="multipart/form-data">
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
                                            <label for="name">Nom :</label>
                                            <input type="text" name="name" id="name" class="form-control">
                                            <input type="hidden" value="{{$student->id}}" name="id">
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="exampleInputdate">Date :</label>
                                            <input type="date" name="date" class="form-control" id="exampleInputdate">
                                        </div> --}}
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
                                    <button type="submit" class="btn btn-roze">Ajouter</button>
                                </div>
                            </div>
                        </div>
                            </form>
                        </div>
                        <div class="modal fade" id="timeline" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <form method="POST" action="{{url('prof/add_timeline')}}" enctype="multipart/form-data">
                                @csrf
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un commentaire</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Sujet :</label>
                                        <textarea name="sujet" class="form-control" id="name"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="customFile">Image :</label>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="customFile">
                                            <input type="hidden" name="id" value="{{$student->id}}">
                                            <label class="custom-file-label" for="customFile">Choisir fichier</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-roze">Ajouter</button>
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
                                    <h5 class="modal-title">Informations générales </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form  method="POST" action="{{url('admin/update_student')}}" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                        <label for="massar">Code massar :</label>
                                        <input type="text"  name="massar" value="{{ $student->id1 }}" class="form-control" id="massar" >
                                        <input type="hidden" name="id" value="{{$student->id}}">
                                        <input type="hidden" name="hidden" value="massar">
                                        @error('massar')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Sexe :</label>
                                            <select class="form-control" name="sex" id="selectuserrole">
                                                <option value="Garçon"  {{ old('sex') == 'Garçon' || $student->sex == 'Garçon' ? 'selected' : '' }}> Garçon</option>
                                                <option value="Fille"  {{ old('sex') == 'Fille' || $student->sex == 'Fille' ? 'selected' : '' }}> Fille</option>
                                            </select>
                                            @error('sex')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="date">Date de naissance</label>
                                            <input type="date" class="form-control" name="date" value="{{ $student->date }}" id="date">
                                            @error('date')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tele">Téléphone</label>
                                            <input type="number" name="tele" value="{{ $student->tele }}" class="form-control" id="tele">
                                            @error('tele')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Email:</label>
                                            <input type="email" class="form-control" name="mail" value="{{ $student->email }}" id="email" placeholder="EX : example@example.com">
                                            @error('email')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6" >
                                            <label for="date_d">Date de départ  :</label>
                                            <input type="date" name="date_d" value="{{ $student->date_d }}" class="form-control" id="date_d" placeholder="2019-12-18">
                                            @error('date_d')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-12">
                                        <label for="adress">Adress :</label>
                                        <textarea type="text" name="adress" class="form-control" id="adress">{{ $student->adress }}</textarea>
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
                                    <button type="submit" class="btn btn-roze">Modifier</button>
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
                                <form  method="POST" action="{{url('admin/update_student')}}" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="32154">Catégorie :</label>
                                            <select class="form-control" onchange="change1('{{url('admin/ajax_get_cycle_by_categorie')}}')" name="categorie" id="cat">
                                                
                                                <option value="préscolaire"{{ old('categorie') == 'préscolaire' || $student->categorie == 'préscolaire' ? 'selected' : '' }}>préscolaire</option>
                                                
                                                <option value="primaire" {{ old('categorie') == 'primaire' || $student->categorie == 'primaire' ? 'selected' : '' }}>primaire</option>
                                                
                                                <option value="E.collégial" {{ old('categorie') == 'E.collégial' || $student->categorie == 'E.collégial' ? 'selected' : '' }}>E.collégial</option>
                                            </select>
                                            <input type="hidden" name="id" value="{{$student->id}}">
                                            <input type="hidden" name="hidden" value="categorie">
                                            @error('categorie')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="32154">Cycle :</label>
                                            <select class="form-control" onchange="change2('{{url('admin/ajax_get_class_by_cycle')}}')" name="cycle" id="cycle">
                                                @foreach ($cycles as $cycles1)
                                                    <option value="{{ $cycles1->id}}"{{ old('cycle') == $cycles1->id || $student->cycle == $cycles1->id ? 'selected' : '' }}>{{$cycles1->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('cycle')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="class">Class1 :</label>
                                            <select class="form-control" name="classe" id="class">
                                                @if(empty($student->class))
                                                    <option  selected="" disabled=""> -- Choisir une classe -- </option>
                                                @endif
                                                @foreach ($classes as $classes1)
                                                    <option value="{{ $classes1->id }}"{{ old('class') == $classes1->id || $student->class == $classes1->id ? 'selected' : '' }}>{{$classes1->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('classe')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Transport :</label>
                                            <select class="form-control" name="transport" id="transport" onchange="change3('{{url('ajax_get_trajet_by_transport')}}')" >
                                                @foreach ($transports as $trans)
                                                    <option value="{{$trans->id}}"{{ old('transport') == $trans->id || $student->transport == $trans->id ? 'selected' : '' }}>{{$trans->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('transport')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Trajet :</label>
                                            <select class="form-control" name="trajet" id="trajet" >
                                                @if(empty($student->trajet))
                                                    <option  selected="" disabled="">-- Trajet -- </option>
                                                @endif
                                                @foreach ($trajets as $trajets1)
                                                    <option value="{{$trajets1->id}}"{{ old('trajet') == $trajets1->id || $student->trajet == $trajets1->id ? 'selected' : '' }}>{{$trajets1->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('trajet')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-roze">Modifier</button>
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
                                <form  method="POST" action="{{url('admin/update_staff3')}}" enctype="multipart/form-data">
                                    @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="ok">Date de naissance :</label>
                                            <input type="date"  name="date" value="{{ $student->date }}" class="form-control" id="ok" >
                                        <input type="hidden" name="id" value="{{$student->id}}">
                                            @error('date')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="ok1">Adresse :</label>
                                            <input type="text"  name="adress" value="{{ $student->adress }}" class="form-control" id="ok1" >
                                            @error('adress')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="ok2">Salaire :</label>
                                            <input type="text"  name="salaire" value="{{ $student->salaire }}" class="form-control" id="ok2" >
                                            @error('salaire')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="ok3">Banque :</label>
                                            <input type="text"  name="banque" value="{{ $student->banque }}" class="form-control" id="ok3" >
                                            @error('banque')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="ok4">RIB :</label>
                                            <input type="text"  name="rib" value="{{ $student->rib }}" class="form-control" id="ok4" >
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
                                    <button type="submit" class="btn btn-roze">Modifier</button>
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
                                <form  method="POST" action="{{url('admin/update_student')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="customFile">Photo profil :</label>
                                                <div class="custom-file" >
                                                <input type="file" name="image" class="custom-file-input" id="customFile">
                                                <input type="hidden" name="id" value="{{$student->id}}">
                                                <input type="hidden" name="hidden" value="image">
                                                <label class="custom-file-label" for="customFile">Choisi une image</label>
                                                </div>
                                                @error('image')
                                                    <span  style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="prix">Prix :</label>
                                            <input type="number" name="prix" value="{{ $student->prix }}" class="form-control" id="prix" >
                                            @error('prix')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nom">Nom :</label>
                                            <input type="text"  name="nom" value="{{ $student->nom}}" class="form-control" id="nom" >
                                            @error('nom')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="pre">Prénom :</label>
                                            <input type="text"  name="pre" value="{{ $student->pre}}" class="form-control" id="pre" >
                                            @error('pre')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nom1"> : الاسم الشخصي</label>
                                            <input type="text"  name="nom1" value="{{ $student->nom1}}" class="form-control" id="nom1" >
                                            @error('nom1')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="pre1">: الاسم العائلي</label>
                                            <input type="text"  name="pre1" value="{{ $student->pre1}}" class="form-control" id="pre1" >
                                            @error('pre1')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="facebook">Facebook :</label>
                                            <input type="text"  name="facebook" value="{{ $student->facebook }}" class="form-control" id="facebook" >
                                            @error('facebook')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="twitter">twitter :</label>
                                            <input type="text"  name="twitter" value="{{ $student->twitter }}" class="form-control" id="twitter" >
                                            @error('twitter')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="insta">Instagram :</label>
                                            <input type="text"  name="insta" value="{{ $student->insta }}" class="form-control" id="insta" >
                                            @error('insta')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="youtube">Youtube :</label>
                                            <input type="text"  name="youtube" value="{{ $student->youtube }}" class="form-control" id="youtube" >
                                            @error('youtube')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline" style="padding-left: 20px">
                                            <div class="custom-switch-inner">
                                            <p class="mb-0"> Passe ? </p>
                                            <input type="checkbox" name="passe" class="custom-control-input bg-success" id="customSwitch-22" {{ $student->passe == 'oui' ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="customSwitch-22" data-on-label="oui" data-off-label="non">
                                            </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-roze">Modifier</button>
                                </div>
                                </form>
                            </div>
                            </div>
                        </div>
                </div>
                <div class="col-md-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">LES IMAGES</h4>
                                </div>
                                {{-- <button type="button" class="btn btn-link" style="font-size: 22px">
                                    <i class="ri-add-line" style="color: rgb(240, 147, 224)" data-toggle="modal" data-target=".model8" ></i>
                                </button> --}}
                                <div class="modal fade model8" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <form method="POST" action="{{url('admin/add_student_image')}}" enctype="multipart/form-data">
                                        @csrf
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Informations Générales </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="customFile">Image :</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="image" class="custom-file-input" id="customFile">
                                                    <input type="hidden" name="id" value="{{ $student->id }}">
                                                        <label class="custom-file-label" for="customFile">Choisir fichier</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-roze">Ajouter</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <div class="iq-card-body">
                               <ul class="profile-img-gallary d-flex flex-wrap p-0 m-0">
                                    @foreach ($images as $image)
                                        <li class="col-md-4 col-6 pb-3"><a href="javascript:void();"><img src="{{url($image->image)}}" alt="gallary-image" class="img-fluid"></a></li>
                                    @endforeach
                                  
                               </ul>
                            </div>
                        </div>
                </div>
                {{-- <div class="col-md-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Frais</h4>
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
                                @foreach ($frais as $frai)
                                <tr>
                                    <td>{{$frai->date}}</td>
                                    <td>{{$frai->prix}}</td>
                                    <td><span class="badge badge-success">Payé</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-4">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Carastéristique</h4>
                            </div>
                            <button type="button" class="btn btn-roze mb-0" data-toggle="modal" data-target=".salam1"><i class="ri-settings-4-fill pr-0"></i></button>
                        </div>
                        <div class="iq-card-body">
                            <div class="about-info m-0 p-0">
                                <div class="row">
                                        <div class="col-8 p-2">Groupe sanguin :</div>
                                        <div class="col-4 p-2">{{$student->blood}}</div>
                                        <div class="col-8 p-2">Taille :</div>
                                        <div class="col-4 p-2">{{$student->height}} Cm</div>
                                        <div class="col-8 p-2">Poids :</div>
                                        <div class="col-4 p-2">{{$student->weight}} Kg</div>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade salam1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <form method="POST" action="{{url('admin/update_student')}}" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Carastéristique</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="blood">Groupe sanguin :</label>
                                        <select name="blood" id="blood" class="form-control">
                                            @if (empty($student->blood))
                                                <option selected=""  disabled> -- Choisir un group -- </option>
                                            @endif
                                            <option value="O+" {{ old('blood') == 'O+' || $student->blood == 'O+' ? 'selected' : '' }}>O+</option>
                                            <option value="A+" {{ old('blood') == 'A+' || $student->blood == 'A+' ? 'selected' : '' }}>A+</option>
                                            <option value="B+" {{ old('blood') == 'B+' || $student->blood == 'B+' ? 'selected' : '' }}>B+</option>
                                            <option value="AB+" {{ old('blood') == 'AB+' || $student->blood == 'AB+' ? 'selected' : '' }}>AB+</option>
                                            <option value="O-" {{ old('blood') == 'O-' || $student->blood == 'O-' ? 'selected' : '' }}>O-</option>
                                            <option value="A-" {{ old('blood') == 'A-' || $student->blood == 'A-' ? 'selected' : '' }}>A-</option>
                                            <option value="B-" {{ old('blood') == 'B-' || $student->blood == 'B-' ? 'selected' : '' }}>B-</option>
                                            <option value="AB-" {{ old('blood') == 'AB-' || $student->blood == 'AB-' ? 'selected' : '' }}>AB-</option>
                                        </select>
                                            @error('blood')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        <input type="hidden" value="{{$student->id}}" name="id">
                                        <input type="hidden" value="blood" name="hidden">
                                    </div>
                                    <div class="form-group">
                                        <label for="height">Taille (cm) :</label>
                                        <input type="text" name="height" value="{{$student->height}}" id="height" class="form-control">
                                            @error('blood')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="weight">Poids (Kg) :</label>
                                        <input type="text" name="weight" value="{{$student->weight}}" id="weight" class="form-control">
                                            @error('weight')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-roze">Ajouter</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Loisires</h4>
                            </div>
                            <button type="button" class="btn btn-roze mb-0" data-toggle="modal" data-target=".salam2"><i class="ri-settings-4-fill pr-0"></i></button>
                        </div>
                        <div class="iq-card-body">
                            <div class="about-info m-0 p-0">
                                <div class="row">
                                        <div class="col-12 p-2">Theatre</div>
                                        <div class="col-12 p-2">Cinema</div>
                                        <div class="col-12 p-2">Music</div>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade salam2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <form method="POST" action="{{url('admin/update_student')}}" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Carastéristique</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" name="height" value="{{$student->height}}" id="height" class="form-control">
                                            @error('blood')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="height" value="{{$student->height}}" id="height" class="form-control">
                                            @error('blood')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="weight" value="{{$student->weight}}" id="weight" class="form-control">
                                            @error('weight')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <button type="submit" class="btn btn-roze">Ajouter</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">FICHE MÉDICALE</h4>
                            </div>
                            <button type="button" class="btn btn-roze mb-0" data-toggle="modal" data-target=".salam3"><i class="ri-settings-4-fill pr-0"></i></button>
                        </div>
                        <div class="iq-card-body">
                            <div class="about-info m-0 p-0">
                                <div class="row" style="float: center">
                                    <div class="col-12 p-2">{{$student->fich}}</div>
                                    <div class="col-12 p-2">{{$student->fich1}}</div>
                                    <div class="col-12 p-2">{{$student->fich2}}</div>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade salam3 " tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <form method="POST" action="{{url('admin/update_student')}}" enctype="multipart/form-data">
                            @csrf
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="form-group">
                                <input type="text" name="fich" value="{{$student->fich}}" id="fich" class="form-control">
                                    @error('fich')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input type="hidden" value="{{$student->id}}" name="id">
                                    <input type="hidden" value="fich" name="hidden">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="fich1" value="{{$student->fich1}}" id="fich1" class="form-control">
                                    @error('fich1')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="fich2" value="{{$student->fich2}}" id="fich2" class="form-control">
                                    @error('fich2')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-roze">Modifier</button>
                            </div>
                        </div>
                    </div>
                        </form>
                    </div>
                </div> --}}
                
                
            </div>
        </div>
 </div>
@endsection