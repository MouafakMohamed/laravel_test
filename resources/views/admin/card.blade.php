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
           <ul class="filters text-center">
               <li class="active" data-filter="*"><a class="btn btn-outline-primary" href="#">Tous</a></li>
               <li data-filter=".salam"><a class="btn btn-outline-primary" href="#">salam</a></li>
               <li data-filter=".salam1"><a class="btn btn-outline-primary" href="#">salam1</a></li>
               <li data-filter=".salam2"><a class="btn btn-outline-primary" href="#">salam2</a></li>
           </ul>
           <div style="text-align: right; padding: 10">
               <button class="btn btn-primary" style="folat: right" data-toggle="modal" data-target="#exampleModalCenter"><b><i
                class="ri-add-fill"><span class="pl-1">Ajouter un livre</span></b></i>
                </button>
            </div>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"  aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered"">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Informations Générales </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form  method="POST" action="{{url('admin/biblio')}}" enctype="multipart/form-data">
                                @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="livre">Nom de livre : *</label>
                                        <input type="text" class="form-control" name="name" id="livre">
                                            @error('name')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="matiere">Matiére : *</label>
                                        <input type="text" class="form-control" name="matiere" id="matiere">
                                            @error('matiere')
                                                <span  style="color: red" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="customFile">Livre (pdf) : *</label>
                                        <div class="custom-file">
                                            <input type="file" name="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choisir une pdf</label>
                                        </div>
                                        @error('file')
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
       <div class="col-sm-3 grid-item salam">
        <div class="card iq-mb-3">
        <img src="{{url('assets')}}/images/page-img/07.jpg" class="card-img-top" alt="#">
        <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">It is a long established fact that a reader . </p>
            <a href="#" class="btn btn-primary">Button</a>
        </div>
        </div>
    </div>
    </div>
 </div>
 @endsection