@extends('admin/layouts.app')
@section('css')
<link rel="stylesheet" href="{{ url('/') }}/css/jquery.dataTables.min.css">
<style>
    .hide{
        display: none;
    }
</style>
@endsection
@section('js')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Table des frais</h4>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <input type="number" onkeyup="ajax_get_student_by_phone('{{url('admin/ajax_get_student_by_phone')}}')" id="phone" class="form-control" placeholder="téléphone">
                            </div>
                            <div class="col">
                                <input type="text" onkeyup="ajax_get_student_by_cin('{{url('admin/ajax_get_student_by_cin')}}')" id="cin" class="form-control" placeholder="CIN">
                            </div>
                            <div class="col">
                                <input type="text" onkeyup="ajax_get_student_by_massar('{{url('admin/ajax_get_student_by_massar')}}')" id="massar" class="form-control" placeholder="Code massar">
                            </div>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="table-responsive" id="table"  style="overflow-x: hidden;">
                            <table id="datatable" style="width: 100%" class="table table-striped table-bordered"">
                                <thead>
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col"> Prénom </th>
                                        <th scope="col"> Catégorie</th>
                                        <th scope="col"> Class</th>
                                        <th scope="col"> Prix </th>
                                        <th scope="col"> Mois</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($exams as $exam)
                                        <tr>
                                            <td>{{$exam->matiere}}</td>
                                            <td>{{$exam->pre}}</td>
                                            <td>{{$exam->categorie}}</td>
                                            <td>{{$exam->class}}</td>
                                            @if ($value['etat'] == 'oui')
                                                <td><span class="badge badge-success">Payé</span></td>
                                            @endif
                                            @if ($value['etat'] == 'non')
                                                <td><span class="badge badge-danger">Non payé</span></td>
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
@endsection