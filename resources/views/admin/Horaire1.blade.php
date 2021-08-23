@extends('admin/layouts.app')
@section('css')
<style>
    
</style>
<link rel="stylesheet" href="{{ url('assets/') }}/style2.css">
@endsection
@section('js')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script>
    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $('#cmd').click(function () {
        doc.fromHTML($('#content').html(), 15, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
        // window.print("#content");
    });
</script> --}}

<script src='{{url('assets')}}/licence/js/html2canvas.min.js'></script>
        
<script>
    /* 
        * This tells the webpage to 1. Use the html2canvas library; 
        * 2. Tell the library to get the contents of the source div. <div id="capture"></div>
        * 3. Then make an image and put it in the target div. <div id="sam"></div>
        */
    //Define the what to copy (source) and
    var source = document.querySelector("#capture");
    //where to store the image (target)                
    var target = document.querySelector("#sam");


    //Now let's click a button to execute html2canvas
    var button = document.querySelector("#take-a-screenshot");
    button.onclick = function(){
        //Execute html2canvas library
        html2canvas(source).then(canvas => {
            //target.appendChild(canvas);
            saveAs(canvas.toDataURL(), 'Emploi_du_temps.png');
        });

    };

    //Save as function
    function saveAs(uri, filename) {
        var link = document.createElement('a');
        if (typeof link.download === 'string') {
        link.href = uri;
        link.download = filename;

        //Firefox requires the link to be in the body
        document.body.appendChild(link);

        //simulate click
        link.click();

        //remove the link when done
        document.body.removeChild(link);
        } else {
        window.open(uri);
        }

    }
</script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    <form action="{{url('admin/Horaire')}}" method="post">
                        @csrf
                        <div class="row">
                            {{-- <div class="col">
                                <select class="form-control" onchange="change1('{{url('admin/ajax_get_cycle_by_categorie')}}')" id="cat">
                                    <option selected="" disabled=""> Choisir la categorie </option>
                                    <option value="préscolaire">préscolaire</option>
                                    <option value="primaire">primaire</option>
                                    <option value="E.collégial">E.collégial</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-control" onchange="change2('{{url('admin/ajax_get_class_by_cycle')}}')" id="cycle">
                                    <option selected="" disabled=""> Choisir le cycle </option>
                                </select>
                            </div> --}}
                            <div class="col-sm-6 col-lg-4">
                                <div class="col">
                                    <select class="form-control" onchange="changet3('{{url('admin/Horaire')}}')"  id="class">
                                        <option selected="" disabled=""> Choisir la classe </option>
                                        @foreach ($classes as $class)
                                        <option value="{{$class->id}}">{{$class->name}} </option>
                                        @endforeach
                                        {{----}}
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="iq-card" id="capture">
                <div class="iq-card-body"><br><br>
                    <form>
                        <div class="row">
                            <div class="col-lg-6">
                               <center><h4><span style="width: 50%">{{Auth::user()->nom}}</span></h4></center>
                            </div>
                            <div class="col-lg-6">
                               <center><h4><span style="width: 50%">Classe : {{$classtable->name}} ({{$categorie->name}})</span></h4></center>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table  class="table">
                                    <thead>
                                        <tr style="height: 50px">
                                            <th></th>
                                            <th class="repos">8h30</th>
                                            <th class="repos">9h30</th>
                                            <th class="repos">10h30</th>
                                            <th class="repos">11h30</th>
                                            <th class="repos">12h30</th>
                                            <th class="repos">13h30</th>
                                            <th class="repos">14h30</th>
                                            <th class="repos">15h30</th>
                                            <th class="repos">16h30</th>
                                            <th class="repos">17h30</th>
                                            <th class="repos">18h30</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < 6; $i++)
                                            <tr>
                                                <th>{{$days[$i]}}</th>
                                                @foreach ($times as $time)
                                                    @if ($cours[$i][$time] == '')
                                                    <td data-toggle="modal" data-target="#exampleModalCenter{{$i.$time}}"></td>
                                                    @else
                                                    <td data-toggle="modal" data-target="#exampleModal{{$cours_id[$i][$time]}}">{{ $cours[$i][$time]}}<br> ({{ $cours1[$i][$time]}})</td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                                <center>Colibri system</center>
                            </div>
                        </div>
                    </form>
                    @for ($i = 0; $i < 6; $i++)
                        @foreach ($times as $time)
                            <div class="modal fade" id="exampleModalCenter{{$i.$time}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un classe</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{url('admin/Horaire')}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="cat">Matiére : *</label>
                                                    <select class="form-control" name="matiere">
                                                        <option value="">-- choisir la matiére --</option>
                                                        @foreach ($matieres as $matiere)
                                                            <option value="{{$matiere->id}}">{{$matiere->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('categorie')
                                                        <span  style="color: red" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="lname5">Salles : *</label>
                                                    <select class="form-control" name="salle" id="lname5">
                                                        <option value="">-- Choisir une salle --</option>
                                                        @foreach ($salles as $salle)
                                                        <option value="{{$salle->id}}">{{$salle->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" name="class" value="{{$classtable->id}}">
                                                    <input type="hidden" name="heur" value="{{$time}}">
                                                    <input type="hidden" name="jour" value="{{$days[$i]}}">
                                                    @error('cycle')
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
                        @endforeach
                    @endfor
                    @for ($i = 0; $i < 6; $i++)
                    @foreach ($times as $time)
                        <div class="modal fade" id="exampleModal{{$i.$time}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Ajouter un classe</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{url('admin/Horaire/edit')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="cat">Matiére salam: *</label>
                                                <select class="form-control" name="matiere" id="cat">
                                                    <option value="">-- choisir la matiére --</option>
                                                    @foreach ($matieres as $matiere)
                                                        <option value="{{$matiere->id}}" >{{$matiere->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('matiere')
                                                    <span style="color: red" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="lname5">Salles : *</label>
                                                <select class="form-control" name="salle" id="lname5">
                                                    <option value="">-- Choisir une salle --</option>
                                                    @foreach ($salles as $salle)
                                                        <option value="{{$salle->id}}">{{$salle->name}}</option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" name="class" value="{{$classtable->id}}">
                                                <input type="hidden" name="heur" value="{{$time}}">
                                                <input type="hidden" name="jour" value="{{$days[$i]}}">
                                                @error('salle')
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
                    @endforeach
                @endfor
                        @foreach ($emploi1 as $emploi)
                            <div class="modal fade" id="exampleModal{{$emploi->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Modifier </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{url('admin/Horaire/edit')}}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label for="cat">Matiére : *</label>
                                                    <select class="form-control" name="matiere" >
                                                        <option value="">-- choisir la matiére --</option>
                                                        @foreach ($matieres as $matiere)
                                                            <option value="{{$matiere->id}}" {{ $emploi->matiere == $matiere->id ? 'selected' : '' }}>{{$matiere->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('matiere')
                                                        <span style="color: red" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="lname5">Salles : *</label>
                                                    <select class="form-control" name="salle" id="lname5">
                                                        <option value="">-- Choisir une salle --</option>
                                                        @foreach ($salles as $salle)
                                                            <option value="{{$salle->id}}" {{ $emploi->salle == $salle->id ? 'selected' : '' }}>{{$salle->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" name="class" value="{{$emploi->class}}">
                                                    <input type="hidden" name="heur" value="{{$emploi->heur}}">
                                                    <input type="hidden" name="jour" value="{{$emploi->jour}}">
                                                    <input type="hidden" name="id" value="{{$emploi->id}}">
                                                    @error('salle')
                                                        <span  style="color: red" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"  data-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-primary">Modifier</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"  data-toggle="modal" data-target="#delete_class{{$emploi->id}}" >Supprimer</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                            <div class="modal fade" id="delete_class{{$emploi->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                         <a onclick="supprime({{$emploi->id}});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                                         <form id="logout-form{{$emploi->id}}" action="{{ url('admin/delete/Horaire/'.$emploi->id)}}" method="POST" style="display: none;">
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
        <div id="sam"></div>
        <div class="col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body" style="text-align: center" >
                    <button  class="btn btn-primary btn-lg hide" id="take-a-screenshot"><i class="ri-download-cloud-fill"></i> Imprimer </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection