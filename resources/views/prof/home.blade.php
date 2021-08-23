 @extends('prof.layouts.app')
{{-- @section('css')
    <link href="{{ url('assets/') }}/fullcalendar/core/main.css" rel='stylesheet' />
      <link href="{{ url('assets/') }}/fullcalendar/daygrid/main.css" rel='stylesheet' />
      <link href="{{ url('assets/') }}/fullcalendar/timegrid/main.css" rel='stylesheet' />
      <link href="{{ url('assets/') }}/fullcalendar/list/main.css" rel='stylesheet' />

      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
@section('js')
    <script src="{{ url('assets/') }}/js/core.js"></script>
    <!-- am charts JavaScript -->
    <script src="{{ url('assets/') }}/js/charts.js"></script>
    <!-- am animated JavaScript -->
    <script src="{{ url('assets/') }}/js/animated.js"></script>
    <!-- am kelly JavaScript -->
    <script src="{{ url('assets/') }}/js/kelly.js"></script>
    <!-- Flatpicker Js -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endsection --}}

@section('css')
<link rel="stylesheet" href="{{ url('assets/') }}/style2.css">
@endsection
@section('js')
<script>
    function change3('{{url('ajax_get_trajet_by_transport')}}') {
        var classe = $('#class').val();
        window.location.href = "{{url('admin/Horaire')}}"+ '/' + classe;
    }
</script>
@endsection

@section('content')
   <div class="container-fluid">
      <div class="row">
         <?php $n = 1; ?>
         @foreach ($classes as $class)
            @if ($n > 7)
            <?php $n = 1; ?>
            @endif
               <div class="col-lg-3">
                  <a href="{{url('prof/class_profil/'.$class->class_id)}}">
                     <div class="card {{$colors[$n]}} text-white text-center iq-mb-3">
                        <blockquote class="blockquote mb-0 card-body">
                           <p class="font-size-18">Class : {{$class->class}}</p>
                           {{-- <p class="font-size-18">Salle : {{$class->salle}}</p> --}}
                           <p class="font-size-18">Matiére : {{$class->matiere}}</p>
                           {{-- <footer class="blockquote-footer">
                              <small class="text-white">
                              Someone famous in <cite title="Source Title">Source Title</cite>
                              </small>
                           </footer> --}}
                        </blockquote>
                     </div>
                  </a>
               </div>
            <?php $n++; ?>
         @endforeach
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="iq-card">
               <div class="iq-card-body">
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
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection 

