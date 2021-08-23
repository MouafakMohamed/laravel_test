@extends('admin/layouts.app')
@section('css')
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
<style>
    ul.filters > li{
        display: inline-block
    }

    ul.filters > li.active > a{
        color: aliceblue;
        background: #007bff;
    }
    form {
        display: inline-block;
    }
</style>
@endsection
@section('js')
<script src="{{url('/')}}/js/isotope/isotope.pkgd.min.js"></script>
<script>
   
    var $grid = $('.filter').isotope({
            itemSelector: '.grid-item',
            layoutMode: 'fitRows',
        });

        $('ul.filters > li').on('click', function(e){
        e.preventDefault();
        var filter = $(this).attr('data-filter');

        $('ul.filters > li').removeClass('active');
        $(this).addClass('active');
        $grid.isotope({filter: filter});
        
    });
</script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center">
                @foreach ($cycle1 as $cycle)
                        @if ($id == $cycle->id)
                            <form action="{{url('admin/cours')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$cycle->id}}" name="id">
                                <button type="submit" class="active btn btn-outline-success mb-3">{{ $cycle->name }}</button>
                            </form>
                        @else
                            <form action="{{url('admin/cours')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$cycle->id}}" name="id">
                                <button type="submit" class="btn btn-outline-success mb-3">{{ $cycle->name }}</button>
                            </form>
                        @endif
                @endforeach
                @foreach ($cycle2 as $cycle)
                    <form action="{{url('admin/cours')}}" method="post">
                        @csrf
                        <input type="hidden" value="{{$cycle->id}}" name="id">
                        <button type="submit" class="btn btn-outline-success mb-3">{{ $cycle->name }}</button>
                    </form>
                @endforeach
                @foreach ($cycle3 as $cycle)
                    <form action="{{url('admin/cours')}}" method="post">
                        @csrf
                        <input type="hidden" value="{{$cycle->id}}" name="id">
                        <button type="submit" class="btn btn-outline-success mb-3">{{ $cycle->name }}</button>
                    </form>
                @endforeach
            </div>
            <ul class="filters text-center">
                <li class="active" data-filter="*"><a class="btn btn-outline-primary" href="#">Tous</a></li>
                @foreach ($matieres as $matiere)
                    <li data-filter=".{{$matiere->id}}"><a class="btn btn-outline-primary" href="#">{{$matiere->name}}</a></li>
                @endforeach
            </ul>
            <div style="text-align: right; padding: 10">
                <button class="btn btn-primary" style="folat: right" data-toggle="modal" data-target="#exampleModalCenter"><b><i
                    class="ri-add-fill"><span class="pl-1">Ajouter un livre</span></b></i>
                </button>
            </div>
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"  aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ajouter un cour </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form  method="POST" action="{{url('admin/cours1')}}" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="cat">Catégorie : *</label>
                                    <select class="form-control" onchange="change1('{{url('admin/ajax_get_cycle_by_categorie')}}');change4('{{url('admin/ajax_get_matiere_by_categorie')}}') " name="categorie" id="cat">
                                        @empty(old('categorie'))
                                            <option selected="" disabled="">-- Catégorie -- </option>
                                        @endempty
                                        @foreach ($categories as $categorie)
                                            <option value="{{$categorie->id}}"{{ old('categorie') == $categorie->id ? 'selected' : '' }}>{{$categorie->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('categorie')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cycle">Cycles : *</label>
                                    <select class="form-control" onchange="change2('{{url('admin/ajax_get_class_by_cycle')}}')" name="cycle" id="cycle">
                                        <option value="">-- Choisir un cycle --</option>
                                    </select>
                                    @error('cycle')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="matiere">matiére : *</label>
                                    <select class="form-control" name="matiere" id="matiere">
                                        <option value="">-- Choisir une matiére --</option>
                                        @foreach ($matieres1 as $matiere)
                                            <option value="{{$matiere->id}}">{{$matiere->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('matiere')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="video">Video : *</label>
                                    <input type="text" name="video" id="video" class="form-control">
                                    @error('video')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="titre">Titre : *</label>
                                    <input type="text" name="titre" id="titre" class="form-control">
                                    @error('titre')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="s_titre">Sous-titre : *</label>
                                    <input type="text" name="s_titre" id="s_titre" class="form-control">
                                    @error('s_titre')
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
    <div class="row filter">
        @foreach ($cours as $cour)
            <div class="col-sm-3 grid-item {{$cour->matiere}}">
                <div class="card iq-mb-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$cour['video']}}" allowfullscreen ></iframe>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">{{$cour->titre}}</h4>
                        <p class="card-text">{{$cour->s_titre}} . </p>
                        <button type="button" class="btn btn-link" style="font-size: 20px; float: right">
                            <i class="ri-pencil-line pr-0" style="color: rgba(8, 157, 173, 1)" data-toggle="modal" data-target="#modifier{{$cour->id}}"></i>
                            <i class="ri-delete-bin-2-fill pr-0" style="color: rgba(8, 157, 173, 1)" data-toggle="modal" data-target="#exampleModal{{$cour->id}}"></i>
                        </button>
                    </div>
                </div>
                <div class="modal fade" id="modifier{{$cour['id']}}" tabindex="-1" role="dialog"  aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modifier un cour </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form  method="post" action="{{url('admin/cours/edit/'.$cour->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="cat1">Catégorie : *</label>
                                        <select class="form-control" onchange="change11('{{url('admin/ajax_get_cycle_by_categorie')}}');change44('{{url('admin/ajax_get_matiere_by_categorie')}}') " name="categorie1" id="cat1">
                                            @foreach ($categories as $categorie)
                                                @if ($categorie->id == $cour->categorie)
                                                    <option value="{{$categorie->id}}"{{ old('categorie') == $categorie->id ? 'selected' : '' }} checked>{{$categorie->name}}</option>
                                                @endif
                                            @endforeach
                                            @foreach ($categories as $categorie)
                                                <option value="{{$categorie->id}}"{{ old('categorie') == $categorie->id ? 'selected' : '' }}>{{$categorie->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('categorie1')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="cycle1">Cycles : *</label>
                                        <select class="form-control" onchange="change22('{{url('admin/ajax_get_class_by_cycle')}}')" name="cycle1" id="cycle1">
                                            @foreach ($cycles as $cycle)
                                                @if ($cycle->categorie == $cour->categorie)
                                                    <option value="{{$cycle['id']}}">{{$cycle->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('cycle1')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="matiere1">matiére : *</label>
                                        <select class="form-control" name="matiere1" id="matiere1">
                                            @foreach ($matieres1 as $matiere)
                                                @if ($matiere->id == $cour->matiere)
                                                    <option value="{{$cour->matiere}}">{{$matiere->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('matiere1')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="video1">Video : *</label>
                                        <input type="text" name="video1" value="{{$cour->video}}" id="video1" class="form-control">
                                        @error('video1')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="titre1">Titre : *</label>
                                        <input type="text" name="titre1" value="{{$cour->titre}}" id="titre1" class="form-control">
                                        @error('titre1')
                                            <span  style="color: red" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="s_titre1">Sous-titre : *</label>
                                        <input type="text" name="s_titre1" value="{{$cour->s_titre}}" id="s_titre1" class="form-control">
                                        @error('s_titre1')
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
                <div class="modal fade" id="exampleModal{{$cour['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                             <a onclick="supprime({{ $cour['id'] }});"><button type="button" class="btn btn-danger">Supprimer</button></a>
                             <form id="logout-form{{ $cour['id'] }}" action="{{ url('/admin/delete/cour/'.$cour['id'])}}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                          </div>
                       </div>
                    </div>
                 </div>
            </div>
        @endforeach
    </div>
 </div>
 @endsection