@extends('admin/layouts.app')
@section('css')
@endsection
@section('js')
@endsection

@section('content')
<div class="container-fluid relative">
   <div style="padding-bottom: 10px;text-align: right"><button class="btn btn-primary" onclick="update('{{url('admin/ajax_update')}}', '{{url('admin/tracabilite')}}')" >mise à jour du system </button></div>
   <div class="row">
      <div class="col-lg-3">
         <div class="iq-card">
            <div class="iq-card-body">
               <div class="">
                  <div class="iq-email-list">
                     <h6 class="mt-4 mb-3">Étiquettes</h6>
                     <ul class="iq-email-ui iq-email-label">
                        <li class="{{ 'admin/tracabilite/all'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/tracabilite/all')}}"><i class="ri-focus-fill text-light"></i>Tout</a></li>
                        <li class="{{ 'admin/tracabilite/ajouter'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/tracabilite/ajouter')}}"><i class="ri-focus-fill text-success"></i>Ajoutes</a></li>
                        <li class="{{ 'admin/tracabilite/modifier'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/tracabilite/modifier')}}"><i class="ri-focus-fill text-warning"></i>Modifications</a></li>
                        <li class="{{ 'admin/tracabilite/frai'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/tracabilite/frai')}}"><i class="ri-focus-fill text-info"></i>Frais</a></li>
                        <li class="{{ 'admin/tracabilite/salaire'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/tracabilite/salaire')}}"><i class="ri-focus-fill text-primary"></i>Salaires</a></li>
                        <li class="{{ 'admin/tracabilite/validation'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/tracabilite/validation')}}"><i class="ri-focus-fill text-dark"></i>Validations</a></li>
                        <li class="{{ 'admin/tracabilite/delete'== request()->path() ? 'active' : ''}}"><a href="{{url('admin/tracabilite/delete')}}"><i class="ri-focus-fill text-danger" ></i>Suppressions</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-9 mail-box-detail">
         <div class="iq-card">
            <div class="iq-card-body p-0">
               <div class="">
                  <div class="iq-email-listbox">
                     <div class="tab-content">
                        <div class="tab-pane fade show active" id="mail-inbox" role="tabpanel">
                           <ul class="iq-email-sender-list">
                              @foreach ($tracs as $trac)
                              @if ($trac->genre == 'ajouter')
                                 <li class="iq-unread ajouter">
                                    <div class="d-flex align-self-center">
                                       <div class="iq-email-sender-info">
                                          {{-- <div class="iq-checkbox-mail">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="mailk">
                                                <label class="custom-control-label" for="mailk"></label>
                                             </div>
                                          </div> --}}
                                          <span class="ri-star-line iq-star-toggle text-warning"></span>
                                          <a href="javascript: void(0);" class="iq-email-title">{{$trac->name}}</a>
                                       </div>
                                       <div class="iq-email-content">
                                          <a href="javascript: void(0);" class="iq-email-subject">{{$trac->text}}
                                          </a>
                                       <div class="iq-email-date">{{$trac->date}}</div>
                                       </div>
                                    </div>
                                 </li>
                              @endif
                              @if ($trac->genre == 'modifier')
                                 <li class="iq-unread1">
                                    <div class="d-flex align-self-center">
                                       <div class="iq-email-sender-info">
                                          {{-- <div class="iq-checkbox-mail">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="mailk">
                                                <label class="custom-control-label" for="mailk"></label>
                                             </div>
                                          </div> --}}
                                          <span class="ri-star-line iq-star-toggle text-warning"></span>
                                          <a href="javascript: void(0);" class="iq-email-title">{{$trac->name}}</a>
                                       </div>
                                       <div class="iq-email-content">
                                          <a href="javascript: void(0);" class="iq-email-subject">{{$trac->text}}
                                          </a>
                                       <div class="iq-email-date">{{$trac->date}}</div>
                                       </div>
                                    </div>
                                 </li>
                              @endif
                              @if ($trac->genre == 'delete')
                                 <li class="iq-unread2">
                                    <div class="d-flex align-self-center">
                                       <div class="iq-email-sender-info">
                                          {{-- <div class="iq-checkbox-mail">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="mailk">
                                                <label class="custom-control-label" for="mailk"></label>
                                             </div>
                                          </div> --}}
                                          <span class="ri-star-line iq-star-toggle text-warning"></span>
                                          <a href="javascript: void(0);" class="iq-email-title">{{$trac->name}}</a>
                                       </div>
                                       <div class="iq-email-content">
                                          <a href="javascript: void(0);" class="iq-email-subject">{{$trac->text}}
                                          </a>
                                       <div class="iq-email-date">{{$trac->date}}</div>
                                       </div>
                                    </div>
                                 </li>
                              @endif
                              @if ($trac->genre == 'salaire')
                                 <li class="iq-unread3">
                                    <div class="d-flex align-self-center">
                                       <div class="iq-email-sender-info">
                                          {{-- <div class="iq-checkbox-mail">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="mailk">
                                                <label class="custom-control-label" for="mailk"></label>
                                             </div>
                                          </div> --}}
                                          <span class="ri-star-line iq-star-toggle text-warning"></span>
                                          <a href="javascript: void(0);" class="iq-email-title">{{$trac->name}}</a>
                                       </div>
                                       <div class="iq-email-content">
                                          <a href="javascript: void(0);" class="iq-email-subject">{{$trac->text}}
                                          </a>
                                       <div class="iq-email-date">{{$trac->date}}</div>
                                       </div>
                                    </div>
                                 </li>
                              @endif

                              @if ($trac->genre == 'frai')
                                 <li class="iq-unread4">
                                    <div class="d-flex align-self-center">
                                       <div class="iq-email-sender-info">
                                          {{-- <div class="iq-checkbox-mail">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="mailk">
                                                <label class="custom-control-label" for="mailk"></label>
                                             </div>
                                          </div> --}}
                                          <span class="ri-star-line iq-star-toggle text-warning"></span>
                                          <a href="javascript: void(0);" class="iq-email-title">{{$trac->name}}</a>
                                       </div>
                                       <div class="iq-email-content">
                                          <a href="javascript: void(0);" class="iq-email-subject">{{$trac->text}}
                                          </a>
                                       <div class="iq-email-date">{{$trac->date}}</div>
                                       </div>
                                    </div>
                                 </li>
                              @endif

                              @if ($trac->genre == 'validation')
                                 <li class="iq-unread4">
                                    <div class="d-flex align-self-center">
                                       <div class="iq-email-sender-info">
                                          {{-- <div class="iq-checkbox-mail">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="mailk">
                                                <label class="custom-control-label" for="mailk"></label>
                                             </div>
                                          </div> --}}
                                          <span class="ri-star-line iq-star-toggle text-warning"></span>
                                          <a href="javascript: void(0);" class="iq-email-title">{{$trac->name}}</a>
                                       </div>
                                       <div class="iq-email-content">
                                          <a href="javascript: void(0);" class="iq-email-subject">{{$trac->text}}
                                          </a>
                                       <div class="iq-email-date">{{$trac->date}}</div>
                                       </div>
                                    </div>
                                 </li>
                              @endif

                              @endforeach
                              
                              
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         {{ $tracs->links() }}
      </div>
   </div>
 </div>
@endsection
