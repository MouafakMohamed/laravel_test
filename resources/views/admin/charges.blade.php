@extends('admin/layouts.app')
@section('css')
<link rel="stylesheet" href="{{ url('/') }}/css/jquery.dataTables.min.css">
@endsection
@section('js')
<script>
   $(document).ready(function(){
      $('#datatable').DataTable();
      $("#myInput").on("keyup", function() {
         var value = $(this).val().toLowerCase();
         $("#datatable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
         });
      });

      $('#datatable1').DataTable();
      $("#myInput").on("keyup", function() {
         var value = $(this).val().toLowerCase();
         $("#datatable1 tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
         });
      });
      
      $('#datatable2').DataTable();
      $("#myInput").on("keyup", function() {
         var value = $(this).val().toLowerCase();
         $("#datatable2 tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
         });
      });
   });
</script>
<script type="text/javascript">
      function changeName() {
         var  entreprise = "l'entreprise";
         var cat = $('#cat').val();
         if (cat == 'Logement') {
         var input = '<select name="name" id="" class="form-control" required><option value=""></option><option value="Loyer ou rembrousement">Loyer ou rembrousement</option><option value="Charges communes">Charges communes</option><option value="Assurance logement">Assurance logement</option><option value="Electricité">Electricité</option><option value="Gaz">Gaz</option><option value="Chauffage">Chauffage</option><option value="Eau">Eau</option><option value="Travaux, Entretien">Travaux, Entretien</option></select>';  
         }
         if (cat == 'Transport') {
         var input = '<select name="name" id="" class="form-control" required><option value=""></option><option value="Voiture, moto">Voiture, moto</option><option value="Assurance">Assurance</option><option value="Essence">Essence</option><option value="Péage, stationnement, contravertions">Péage, stationnement, contravertions</option><option value="Entretien, réparation, Contrôle technique">Entretien, réparation, Contrôle technique</option><option value="Transport commun">Transport commun</option></select>';  
         }
         if (cat == 'Alimentation') {
         var input = '<select name="name" id="" class="form-control" required><option value=""></option><option value="Alimentation">Alimentation</option><option value="Restaurant '+ entreprise +'">Restaurant '+ entreprise +'</option><option value="Hygiéne courante">Hygiéne courante</option><option value="Tabac, alcool">Tabac, alcool</option></select>';  
         }
         if (cat == 'Autre') {
         var input = ' <input type="text" class="form-control" name="name" id="field-2" placeholder="nom">';
         }
         $('#change').html(input)
      }
      function changeName1() {
         var  entreprise = "l'entreprise";
         var cat = $('#cat1').val();
         if (cat == 'Logement') {
         var input = '<select name="name" id="" class="form-control" required><option value=""></option><option value="Loyer ou rembrousement">Loyer ou rembrousement</option><option value="Charges communes">Charges communes</option><option value="Assurance logement">Assurance logement</option><option value="Electricité">Electricité</option><option value="Gaz">Gaz</option><option value="Chauffage">Chauffage</option><option value="Eau">Eau</option><option value="Travaux, Entretien">Travaux, Entretien</option></select>';  
         }
         if (cat == 'Transport') {
         var input = '<select name="name" id="" class="form-control" required><option value=""></option><option value="Voiture, moto">Voiture, moto</option><option value="Assurance">Assurance</option><option value="Essence">Essence</option><option value="Péage, stationnement, contravertions">Péage, stationnement, contravertions</option><option value="Entretien, réparation, Contrôle technique">Entretien, réparation, Contrôle technique</option><option value="Transport commun">Transport commun</option></select>';  
         }
         if (cat == 'Alimentation') {
         var input = '<select name="name" id="" class="form-control" required><option value=""></option><option value="Alimentation">Alimentation</option><option value="Restaurant '+ entreprise +'">Restaurant '+ entreprise +'</option><option value="Hygiéne courante">Hygiéne courante</option><option value="Tabac, alcool">Tabac, alcool</option></select>';  
         }
         if (cat == 'Autre') {
         var input = ' <input type="text" class="form-control" name="name" id="field-2" placeholder="nom">';
         }
         $('#change1').html(input)
      }
</script>
@endsection

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-lg-12">
         <div class="iq-card">
            <div class="iq-card-body p-0">
               <div class="iq-edit-list">
                  <ul class="iq-edit-profile d-flex nav nav-pills">
                     <li class="col-md-4 p-0">
                        <a class="nav-link active" data-toggle="pill" href="#personal-information">
                           charge annuelle
                        </a>
                     </li>
                     <li class="col-md-4 p-0">
                        <a class="nav-link" data-toggle="pill" href="#chang-list">
                           charge valider
                        </a>
                     </li>
                     <li class="col-md-4 p-0">
                        <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                           Autre charges
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div class="col-sm-12">
         <div class="iq-edit-list-data">
            <div class="tab-content">
               <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                  <div style="padding: 0px 0px 15px 15px; text-align: right"><button class="btn btn-primary"  data-toggle="modal" data-target="#modifier">Ajouter</button></div>
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                     <div class="iq-card-body">
                        <div class="table-responsive" id="table"  style="overflow-x: hidden;">
                           <table id="datatable1" style="width: 100%" class="table table-striped table-bordered"">
                              <thead>
                                 <tr>
                                    <th scope="col"> Nom </th>
                                    <th scope="col"> Prix </th>
                                    <th scope="col"> Validation </th>
                                    <th scope="col" style="text-align: center"> Action </th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach ($charges1 as $charge1)
                                    <tr>
                                       <td>{{$charge1->name}}</td>
                                       <td>{{$charge1->prix}} DH</td>
                                       <td><center style="font-size: 19px;"><i class="ri-check-fill" style="color: rgba(8, 157, 173, 1); padding-right: 10px" data-toggle="modal" data-target="#validate_charge{{$charge1->id}}" ></i></center></td>
                                       <td>
                                          <center style="font-size: 19px;">
                                             <i class="ri-pencil-line" style="color: rgba(8, 157, 173, 1); padding-right: 10px" data-toggle="modal" data-target="#modifiertest{{ $charge1->id }}" ></i>
                                             <i class="ri-delete-bin-2-fill" style="color: rgba(8, 157, 173, 1); padding-right: 10px" data-toggle="modal" data-target="#delete_charge_a{{$charge1->id}}" ></i>
                                          </center>
                                       </td>
                                    </tr>
                                 @endforeach
                              </tbody>
                           </table>
                           <div class="modal fade" id="modifier" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalCenterTitle">Nouveau </h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <form action="{{url('admin/charge_a/ajouter')}}" method="post" enctype="multipart/form-data">
                                       @csrf
                                       <div class="modal-body">
                                          <div class="row">
                                             <div class="form-group col-md-12">
                                                <div class="custom-file">
                                                   <label for="customFile">Nom</label>
                                                   <input type="text" name="name" class="form-control" id="customFile" >
                                                </div>
                                                @error('name')
                                                   <span  style="color: red" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                   </span>
                                                @enderror
                                             </div>
                                             <div class="form-group col-md-12">
                                                   <label for="prix">Prix : *</label>
                                                   <input type="text" name="prix" class="form-control" id="prix" >
                                                   @error('prix')
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
                        @foreach ($charges1 as $charge1)
                           <div class="modal fade" id="modifiertest{{ $charge1->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalCenterTitle">Modifier </h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <form action="{{url('admin/charge/modifier1')}}" method="post" enctype="multipart/form-data">
                                       @csrf
                                       <div class="modal-body">
                                          <div class="row">
                                             <div class="form-group col-md-12">
                                                <label for="name">Nom : *</label>
                                                <input type="text" name="name" value="{{$charge1->name}}" class="form-control" id="name" >
                                                @error('name')
                                                   <span  style="color: red" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                   </span>
                                                @enderror
                                             </div>
                                             <input type="hidden" name="id" value="{{$charge1->id}}">
                                             <div class="form-group col-md-12">
                                                <label for="prix">Prix : *</label>
                                                <input type="text" name="prix" value="{{$charge1->prix}}" class="form-control" id="prix" >
                                                @error('prix')
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
                           <div class="modal fade" id="validate_charge{{ $charge1->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalCenterTitle">{{$charge1->name}} </h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <form action="{{url('admin/charge/Ajoute1')}}" method="post" enctype="multipart/form-data">
                                       @csrf
                                       <div class="modal-body">
                                          <div class="row">
                                             <div class="form-group col-md-12">
                                                <label for="cat1">Date ( {{$year.' / '.$year1}}) : *</label>
                                                <table style="width: 100%">
                                                   <tr>
                                                      <td>
                                                         <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="{{$year}}-09-01" @if(date('m') == '09') checked @endif value="{{$year}}-09-01" name="date" class="custom-control-input">
                                                            <label class="custom-control-label" for="{{$year}}-09-01"> Septombre </label>
                                                         </div>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td>
                                                         <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="{{$year}}-10-01" @if(date('m') == '10') checked @endif value="{{$year}}-10-01" name="date" class="custom-control-input">
                                                            <label class="custom-control-label" for="{{$year}}-10-01"> Octobre </label>
                                                         </div>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td>
                                                         <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="{{$year}}-11-01" @if(date('m') == '11') checked @endif value="{{$year}}-11-01" name="date" class="custom-control-input">
                                                            <label class="custom-control-label" for="{{$year}}-11-01"> Novombre </label>
                                                         </div>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td>
                                                         <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="{{$year}}-12-01" @if(date('m') == '12') checked @endif value="{{$year}}-12-01" name="date" class="custom-control-input">
                                                            <label class="custom-control-label" for="{{$year}}-12-01"> Décombre </label>
                                                         </div>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td>
                                                         <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="{{$year}}-01-01" @if(date('m') == '01') checked @endif value="{{$year1}}-01-01" name="date" class="custom-control-input">
                                                            <label class="custom-control-label" for="{{$year}}-01-01"> Janvier </label>
                                                         </div>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td>
                                                         <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="{{$year}}-02-01" @if(date('m') == '02') checked @endif value="{{$year1}}-02-01" name="date" class="custom-control-input">
                                                            <label class="custom-control-label" for="{{$year}}-02-01"> Février </label>
                                                         </div>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td>
                                                         <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="{{$year}}-03-01" @if(date('m') == '03') checked @endif  value="{{$year1}}-03-01" name="date" class="custom-control-input">
                                                            <label class="custom-control-label" for="{{$year}}-03-01"> Mars </label>
                                                         </div>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td>
                                                         <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="{{$year}}-04-01" @if(date('m') == '04') checked @endif  value="{{$year1}}-04-01" name="date" class="custom-control-input">
                                                            <label class="custom-control-label" for="{{$year}}-04-01"> Avril </label>
                                                         </div>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td>
                                                         <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="{{$year}}-05-01" @if(date('m') == '05') checked @endif  value="{{$year1}}-05-01" name="date" class="custom-control-input">
                                                            <label class="custom-control-label" for="{{$year}}-05-01"> Mai </label>
                                                         </div>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td>
                                                         <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="{{$year}}-06-01" @if(date('m') == '06') checked @endif  value="{{$year1}}-06-01" name="date" class="custom-control-input">
                                                            <label class="custom-control-label" for="{{$year}}-06-01"> Juin </label>
                                                         </div>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td>
                                                         <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="{{$year}}-07-01"  @if(date('m') == '07') checked @endif value="{{$year1}}-07-01" name="date" class="custom-control-input">
                                                            <label class="custom-control-label" for="{{$year}}-07-01"> Juiellé </label>
                                                         </div>
                                                      </td>
                                                   </tr>
                                                   <tr>
                                                      <td>
                                                         <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" id="{{$year}}-08-01"  @if(date('m') == '08') checked @endif value="{{$year1}}-08-01" name="date" class="custom-control-input">
                                                            <label class="custom-control-label" for="{{$year}}-08-01"> Out </label>
                                                         </div>
                                                      </td>
                                                   </tr>
                                                </table>
                                                <input type="hidden" name="id" value="{{$charge1->id}}">
                                             </div>
                                             {{-- <div class="form-group col-md-12">
                                                <label for="cat1">Date ( {{$year.' / '.$year1}}) : *</label>
                                                <select id="cat1"  name="date" class="form-control" required>
                                                   <option value="{{$year1}}-01-01" @if(date('m') == '01') selected @endif>Janvier</option>
                                                   <option value="{{$year1}}-02-01" @if(date('m') == '02') selected @endif>Février</option>
                                                   <option value="{{$year1}}-03-01" @if(date('m') == '03') selected @endif>Mars</option>
                                                   <option value="{{$year1}}-04-01" @if(date('m') == '04') selected @endif>Avril</option>
                                                   <option value="{{$year1}}-05-01" @if(date('m') == '05') selected @endif>Mai</option>
                                                   <option value="{{$year1}}-06-01" @if(date('m') == '06') selected @endif>Juin</option>
                                                   <option value="{{$year1}}-07-01" @if(date('m') == '07') selected @endif>Juiellé</option>
                                                   <option value="{{$year1}}-08-01" @if(date('m') == '08') selected @endif>out</option>
                                                   <option value="{{$year}}-09-01" @if(date('m') == '09') selected @endif>Septombre</option>
                                                   <option value="{{$year}}-10-01" @if(date('m') == '10') selected @endif>Octobre</option>
                                                   <option value="{{$year}}-11-01" @if(date('m') == '11') selected @endif>Novombre</option>
                                                   <option value="{{$year}}-12-01" @if(date('m') == '12') selected @endif>Décombre</option>
                                                </select>
                                                <input type="hidden" name="id" value="{{$charge1->id}}">
                                             </div> --}}
                                             <div class="form-group col-md-12">
                                                <label for="customFile">image : *</label>
                                                <div class="custom-file">
                                                   <input type="file" name="image" class="custom-file-input" id="customFile">
                                                   <label class="custom-file-label" for="customFile">Choisir une image</label>
                                                </div>
                                                @error('image')
                                                   <span  style="color: red" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                   </span>
                                                @enderror
                                             </div>
                                          </div>
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                          <button type="submit" class="btn btn-primary">Valider</button>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                           <div class="modal fade" id="delete_charge_a{{$charge1->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                       <a onclick="supprime({{ $charge1->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                                       <form id="logout-form{{ $charge1->id }}" action="{{ url('admin/delete/charge1/'.$charge1->id)}}" method="POST" style="display: none;">
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
                  </div> 
               </div>
               <div class="tab-pane fade" id="chang-list" role="tabpanel">
                  <div style="padding: 0px 0px 15px 15px; text-align: right"><button class="btn btn-primary"  data-toggle="modal" data-target="#modifierm7">Ajouter</button></div>
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                     <div class="iq-card-body">
                        <div class="table-responsive" id="table"  style="overflow-x: hidden;">
                           <table id="datatable2" style="width: 100%" class="table table-striped table-bordered"">
                              <thead>
                                 <tr>
                                    <th scope="col"> Nom </th>
                                    <th scope="col"> Date </th>
                                    <th scope="col"> Prix </th>
                                    <th scope="col" >Fichier</th>
                                    <th scope="col" style="text-align: center">Supprimer</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach ($charges2 as $charge2)
                                    <tr>
                                       <td>{{$charge2->name}}</td>
                                       <td>{{$charge2->date}}</td>
                                       <td>{{$charge2->prix}} DH</td>
                                       <td contenteditable="false" >
                                       @if (!empty($charge2->image))
                                             <a href="{{url('/admin/download/charge/file/'.$charge2->id) }}"><button type="button" class="btn btn-link" style="font-size: 22px"><i class="ri-download-cloud-fill" style="color: rgba(8, 155, 171, 1)"></i></button></a>
                                             @endif
                                       </td>
                                       <td>
                                          <center style="font-size: 19px;">
                                             <i class="ri-delete-bin-2-fill" style="color: rgba(8, 157, 173, 1); padding-right: 10px" data-toggle="modal" data-target="#delete_charge{{$charge2->id}}" ></i>
                                          </center>
                                       </td>
                                    </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        @foreach ($charges2 as $charge2)
                           <div class="modal fade" id="delete_charge{{$charge2->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                       <a onclick="supprime({{ $charge2->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                                       <form id="logout-form{{ $charge2->id }}" action="{{ url('admin/delete/charge/'.$charge2->id)}}" method="POST" style="display: none;">
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
                  </div> 
               </div>
               <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                  <div style="padding: 0px 0px 15px 15px; text-align: right"><button class="btn btn-primary"  data-toggle="modal" data-target="#modifierm7">Ajouter</button></div>
                  <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                     <div class="iq-card-body">
                        <div class="table-responsive" id="table"  style="overflow-x: hidden;">
                           <table id="datatable" style="width: 100%" class="table table-striped table-bordered"">
                              <thead>
                                 <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col"> Date </th>
                                    <th scope="col"> Catégorie</th>
                                    <th scope="col"> Prix </th>
                                    <th scope="col" >Fichier</th>
                                    <th scope="col" style="text-align: center">Modifier / Supprimer</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach ($charges as $charge)
                                             <tr>
                                                <td>{{$charge->name}}</td>
                                                <td>{{$charge->date}}</td>
                                                <td>{{$charge->categorie}}</td>
                                                <td>{{$charge->prix}} DH</td>
                                                <td contenteditable="false" >
                                                @if (!empty($charge->image))
                                                      <a href="{{url('/admin/download/charge/file/'.$charge->id) }}"><button type="button" class="btn btn-link" style="font-size: 22px"><i class="ri-download-cloud-fill" style="color: rgba(8, 155, 171, 1)"></i></button></a>
                                                      @endif
                                                </td>
                                                <td>
                                                   <center style="font-size: 19px;">
                                                      <i class="ri-pencil-line" style="color: rgba(8, 157, 173, 1); padding-right: 10px" data-toggle="modal" data-target="#modifier1{{ $charge->id }}" ></i>
                                                      <i class="ri-delete-bin-2-fill" style="color: rgba(8, 157, 173, 1); padding-right: 10px" data-toggle="modal" data-target="#delete_class{{$charge->id}}" ></i>
                                                   </center>
                                                </td>
                                             </tr>
                                 @endforeach
                              </tbody>
                           </table>
                           <div class="modal fade" id="modifierm7" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                           <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Nouveau </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                 </div>
                                    <form action="{{url('admin/charge/ajouter')}}" method="post" enctype="multipart/form-data">
                                       @csrf
                                       <div class="modal-body">
                                          <div class="row">
                                             <div class="form-group col-md-12">
                                                <label for="cat">Catégorie : *</label>
                                                <select id="cat"  onchange="changeName()" name="cat" class="form-control" required>
                                                   <option value=""></option>
                                                   <option value="Logement">Logement</option>
                                                   <option value="Transport">Transport</option>
                                                   <option value="Alimentation">Alimentation</option>
                                                   <option value="Autre">Autre</option>
                                                </select>
                                             </div>
                                             <div class="form-group col-md-12">
                                                <label for="field-2" class="control-label">La charge</label>
                                                      <div id="change">
                                                            <select name="name" class="form-control">
                                                               <option value=""></option>
                                                            </select>
                                                      </div>
                                                @error('name')
                                                      <span  style="color: red" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                      </span>
                                                @enderror
                                             </div>
                                             <div class="form-group col-md-12">
                                                <label for="customFile">image : *</label>
                                                <div class="custom-file">
                                                   <input type="file" name="image" class="custom-file-input" id="customFile">
                                                   <label class="custom-file-label" for="customFile">Choisir une image</label>
                                                </div>
                                                @error('image')
                                                   <span  style="color: red" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                   </span>
                                                @enderror
                                             </div>
                                             <div class="form-group col-md-12">
                                                   <label for="prix">Prix : *</label>
                                                   <input type="text" name="prix" class="form-control" id="prix" >
                                                   @error('prix')
                                                            <span  style="color: red" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                            </span>
                                                   @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                   <label for="date">Date : *</label>
                                                   <input type="date" name="date" class="form-control" id="date" >
                                                   @error('date')
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
                        @foreach ($charges as $charge)
                           <div class="modal fade" id="modifier1{{ $charge->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalCenterTitle">Modifier </h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <form action="{{url('admin/charge/modifier')}}" method="post" enctype="multipart/form-data">
                                       @csrf
                                       <div class="modal-body">
                                          <div class="row">
                                             <div class="form-group col-md-12">
                                                <label for="cat1">Catégorie : *</label>
                                                <select id="cat1"  onchange="changeName1()" name="cat" class="form-control" required>
                                                   <option value=""></option>
                                                   <option value="Logement" {{ $charge->categorie == 'Logement' ? 'selected' : '' }}>Logement</option>
                                                   <option value="Transport" {{ $charge->categorie == 'Transport' ? 'selected' : '' }}>Transport</option>
                                                   <option value="Alimentation" {{ $charge->categorie == 'Alimentation' ? 'selected' : '' }}>Alimentation</option>
                                                   <option value="Autre" {{ $charge->categorie == 'Autre' ? 'selected' : '' }}>Autre</option>
                                                </select>
                                                <input type="hidden" name="id" value="{{$charge->id}}">
                                             </div>
                                             <div class="form-group col-md-12">
                                                <label for="field-2" class="control-label">La charge</label>
                                                   <div id="change1">
                                                         <select name="name" class="form-control">
                                                         <option value="{{$charge->name}}">{{$charge->name}}</option>
                                                         </select>
                                                   </div>
                                                   @error('name')
                                                         <span  style="color: red" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                         </span>
                                                   @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                   <label for="customFile">image : *</label>
                                                   <div class="custom-file">
                                                      <input type="file" name="image" class="custom-file-input" id="customFile">
                                                      <label class="custom-file-label" for="customFile">Choisir une image</label>
                                                   </div>
                                                   @error('image')
                                                      <span  style="color: red" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                      </span>
                                                   @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                   <label for="prix">Prix : *</label>
                                                   <input type="text" name="prix" value="{{$charge->prix}}" class="form-control" id="prix" >
                                                   @error('prix')
                                                            <span  style="color: red" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                            </span>
                                                   @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                   <label for="date">Date : *</label>
                                                   <input type="date" name="date" value="{{$charge->date}}" class="form-control" id="date" >
                                                   @error('date')
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
                           <div class="modal fade" id="delete_class{{$charge->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                       <a onclick="supprime({{ $charge->id }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                                       <form id="logout-form{{ $charge->id }}" action="{{ url('admin/delete/charge/'.$charge->id)}}" method="POST" style="display: none;">
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
                  </div> 
               </div>
            </div>
         </div>
      </div>     
   </div>
</div>
@endsection