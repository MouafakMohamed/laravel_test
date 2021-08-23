@extends('prof/layouts.app')
@section('css')
@endsection
@section('js')
@endsection
@section('content')
    <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12 col-lg-12">
                @if ($k != 0)
                    @if (date('m') >= 9 or date('m') <= 6)
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                <h4 class="card-title">{{$classe->name}} ({{$heure.' => '.$heure1}})</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div id="table" class="table-editable">
                                    <table id="datatable" class="table table-bordered table-responsive-md table-striped text-center">
                                        <thead>
                                            <tr>
                                                <th>Numéro</th>
                                                <th>Nom compléte</th>
                                                <th>status</th>
                                                <th>description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($students as $student)
                                            <tr style="background-color: white">
                                                <td contenteditable="false" >{{$student->class_num}}</td>
                                                <td contenteditable="false" >{{$student->nom.' '.$student->pre}}</td>
                                                <td contenteditable="false">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" onclick="absence('{{$student->id}}', 'A','{{$heure}}','{{$heure1}}', '{{url('prof/ajax_add_absence')}}', '{{$jour}}','{{$classe->id}}')" value="present" id="A{{$student->id}}" name="hi{{$student->id}}" class="custom-control-input" @if ($student->etat == 'present') checked @endif>
                                                        <label class="custom-control-label" for="A{{$student->id}}"> Présent</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" onclick="absence('{{$student->id}}', 'B','{{$heure}}','{{$heure1}}', '{{url('prof/ajax_add_absence')}}', '{{$jour}}','{{$classe->id}}')" value="absence" id="B{{$student->id}}" name="hi{{$student->id}}" class="custom-control-input" @if ($student->etat == 'absence') checked @endif>
                                                        <label class="custom-control-label" for="B{{$student->id}}"> Absent</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" onclick="absence('{{$student->id}}', 'C','{{$heure}}','{{$heure1}}', '{{url('prof/ajax_add_absence')}}', '{{$jour}}','{{$classe->id}}')" value="retard" id="C{{$student->id}}" name="hi{{$student->id}}" class="custom-control-input" @if ($student->etat == 'retard') checked @endif>
                                                        <label class="custom-control-label" for="C{{$student->id}}">En retard</label>
                                                        </div>
                                                    </div>
                                                </td>
                                            <td contenteditable="false">
                                                <input class="form-control" name="desc" id="desc{{$student->id}}" value="{{$student->desc}}" onchange="absence('{{$student->id}}', 'D','{{$heure}}','{{$heure1}}', '{{url('prof/ajax_add_absence')}}', '{{$jour}}','{{$classe->id}}')" /></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                        {{-- {{ $devoires->links() }} --}}
                                </div>
                            </div>
                        </div>
                    @else
                        <center><h1>Les vacances d'été ^_^</h1></center>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection