
@extends('student/layouts.app')
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
                        <h4 class="card-title" style="color: whitesmoke"> Les Devoirs </h4>
                    </div>
                    <div class="iq-header-title" style="float:right">
                        <a href="{{url('Student/Dashboard')}}"> 
                            <i style="color: whitesmoke; font-size: 30px" class="ri-home-smile-fill"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 mx-auto">
            {{-- <div class="iq-card">
                <div class="iq-card-body">
                    <ul class="nav nav-tabs justify-content-center" id="myTab-2" role="tablist">
                        <?php $n = 0; ?>
                        @foreach ($devoires as $key)
                            <li class="nav-item">
                                <a class="nav-link @if($n == 0)active @endif" id="home-tab-justify" data-toggle="tab" href="#home-justify" role="tab" aria-controls="home" aria-selected="true">{{$key->matiere}}</a>
                            </li>
                            <?php $n++ ?>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="myTabContent-3">
                        <div class="tab-pane fade show active" id="home-justify" role="tabpanel" aria-labelledby="home-tab-justify">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                        <div class="tab-pane fade" id="profile-justify" role="tabpanel" aria-labelledby="profile-tab-justify">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                        <div class="tab-pane fade" id="contact-justify" role="tabpanel" aria-labelledby="contact-tab-justify">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="iq-card">
                <div class="iq-card-body">
                   <ul class="iq-timeline">
                       <?php $disc =['','border-success','border-danger','border-warning','border-info','border-dark','border-secondary'];
                       $n = 0; ?>
                    @foreach ($devoires as $key)
                      <li>
                      <div class="timeline-dots {{$disc[$n]}}"></div>
                         <h6 class="float-left mb-3">{{$key->matiere}}</h6>
                         <small class="float-right mt-3"><?php echo $key->date1; ?> =========> <?php echo $key->date2; ?></small>
                         <div class="d-inline-block w-100">
                            <p><?php echo $key->desc; ?></p>

                            <?php if ($key->image != '') { ?>

                            <span><a href="{{url('/Student/download/devoire/file/'.$key->id) }}" style="color:#fff"><b style="color:red">Télécharger le document</b></a></span>

                            <?php } ?>
                            <p></p>
                         </div>
                      </li>
                      <?php $n++; ?>
                      @if ($n == 7)
                          <?php $n = 0; ?>
                      @endif
                      @endforeach
                   </ul>
                </div>
            </div>
        </div>
    </div>
</div>

 @endsection