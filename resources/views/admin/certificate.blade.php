@extends('admin/layouts.app')
@section('css')
@endsection
@section('js')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-3"></div>
        <div class="col-sm-12 col-lg-6">
        <div class="iq-card">
            <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Select Size</h4>
                </div>
            </div>
            <div class="iq-card-body">
                <div class="form-group">
                    <label>Categorie :</label>
                    <select class="form-control" onchange="change1('{{url('admin/ajax_get_cycle_by_categorie')}}')" name="categorie" id="cat" required>
                        @empty(old('categorie'))
                            <option selected="" disabled="">-- Catégorie -- </option>
                        @endempty
                            <option value="préscolaire"{{ old('categorie') == 'préscolaire' ? 'selected' : '' }}>préscolaire</option>

                            <option value="primaire" {{ old('categorie') == 'primaire' ? 'selected' : '' }}>primaire</option>

                            <option value="E.collégial" {{ old('categorie') == 'E.collégial' ? 'selected' : '' }}>E.collégial</option>
                    </select>
                    @error('categorie')
                        <span  style="color: red" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Cycle :</label>
                    <select class="form-control" onchange="change2('{{url('admin/ajax_get_class_by_cycle')}}')" name="cycle" id="cycle" required>
                        @empty(old('cycle'))
                                <option selected="" disabled="">-- Cycle -- </option>
                        @endempty
                    </select>
                    @error('cycle')
                        <span  style="color: red" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Class:</label>
                    <select class="form-control" onchange="change51('{{url('admin/ajax_get_student_by_class1')}}')" name="class" id="class">
                        @empty(old('class'))
                            <option  selected="" disabled=""> -- Choisir une classe -- </option>
                        @endempty
                    </select>
                    @error('class')
                        <span  style="color: red" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            <form action="{{url('admin/certificate')}}" method="post">
                @csrf
                    <div class="form-group">
                        <label>L'éléve :</label>
                        <input type="text" class="form-control custom-select custom-select-sm" multiple="multiple" name="student" list="tags" autocomplete="off" />

                        <datalist id="tags">
                        </datalist>
                        @error('student')
                            <span  style="color: red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Genre de certificat:</label>
                        <select class="form-control" name="genre">
                                <option value="1">Certificat d'excellence</option>
                                <option value="2">Le petit créateur</option>
                        </select>
                        @error('class')
                            <span  style="color: red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <center><button type="submit" class="btn btn-success">Valider</button></center>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection