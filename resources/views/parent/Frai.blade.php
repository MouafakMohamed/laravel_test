@extends('parent.app')
@section('css')

@endsection
@section('js')
@endsection

@section('content')
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-sm-12">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between" style="background: #089bab">
                    <div class="iq-header-title">
                        <h4 class="card-title" style="color: whitesmoke"> Frais </h4>
                    </div>
                    {{-- <div class="iq-header-title" style="float:right">
                        <a href="{{url('Student/Dashboard')}}"> 
                            <i style="color: whitesmoke; font-size: 30px" class="ri-home-smile-fill"></i>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    <table class="table mb-0 table-borderless">
                        <thead>
                            <tr>
                                <th scope="col"> Date d'échéance</th>
                                <th scope="col">Montant (Dh) </th>
                                <th scope="col">Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $n = 0; $t = 0; ?>
                            @foreach ($student->mois as $item => $value)
                                <tr>
                                    <td>{{$value['ok']}}</td>
                                    @if ($value['etat'] == 'oui')
                                    <td>{{$value['prix']}} DH</td>
                                    <td><span class="badge badge-success">Payé</span></td>
                                    @endif
                                    @if ($value['etat'] == 'non')
                                        @if ($t === 0)
                                            <input type="hidden" id="mois" value="{{$value['ok']}}">
                                            <td>{{$value['prix']}} DH</td>
                                            <?php $t++; ?>
                                        @else
                                            <td>{{$value['prix']}} DH</td>
                                            @endif
                                            <?php $n++; ?>
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

@endsection