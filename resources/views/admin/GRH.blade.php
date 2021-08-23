@extends('admin/layouts.app')
@section('css')

@endsection
@section('js')
@endsection

@section('content')
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between" style="background: #089bab">
                  <div class="iq-header-title">
                        <h4 class="card-title" style="color: whitesmoke">Gestion Ressource Humain</h4>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-12">
            <div class="iq-accordion career-style faq-style  ">
               <div class="iq-card iq-accordion-block accordion-active">
                  <div class="iq-card-header d-flex justify-content-between" >
                     <div class="iq-header-title">
                           <h4 class="card-title">Administration</h4>
                     </div>
                  </div>
                  <div class="accordion-details">
                     <div class="container-fluid">
                        <div class="row">
                           @foreach ($staffs as $staff)
                              @if ($staff->fonction == 'Administration')
                                 <div class="col-md-3">
                                    <div class="iq-card">
                                       <div class="iq-card-body text-center">
                                          <div class="doc-profile">
                                                <img class="rounded-circle img-fluid avatar-80"
                                                   src="{{ url('/' . $staff->image) }}" alt="profile">
                                          </div>
                                          <div class="iq-doc-info mt-3">
                                                <h4> {{ $staff->nom . ' ' . $staff->pre }}</h4>
                                                <p class="mb-0">{{ $staff->fonction }}</p>
                                          </div>
                                          <div class="iq-doc-social-info mt-3 mb-3">
                                             <ul class="m-0 p-0 list-inline">
                                                <li>
                                                   <a href="{{ $staff->facebook }}">
                                                      <i class="ri-facebook-fill"></i>
                                                   </a>
                                                </li>
                                                <li>
                                                   <a href="{{ $staff->twitter }}">
                                                      <i class="ri-twitter-fill"></i>
                                                   </a> 
                                                </li>
                                                <li>
                                                   <a href="{{ $staff->insta }}">
                                                      <i class="ri-instagram-fill"></i>
                                                   </a>
                                                </li>
                                                <li>
                                                   <a href="{{ $staff->linked }}">
                                                      <i class="ri-linkedin-fill"></i>
                                                   </a>
                                                </li>
                                             </ul>
                                          </div>
                                          <a href="{{ url('admin/GRH/profil/' . $staff->id) }}"><i
                                                   class="ri-eye-line"
                                                   style="color: rgba(8, 155, 171, 1);  font-size: 23px; padding-right: 15px"></i></a>
                                          <a href="{{ url('admin/GRH/PRMS/' . $staff->id) }}"><i
                                                   class="ri-settings-4-fill"
                                                   style="color: rgba(8, 155, 171, 1);  font-size: 23px; padding-right: 15px"></i></a>
                                          <a href="#" data-toggle="modal"
                                                data-target="#exampleModal{{ $staff->id }}"> <i
                                                   style="color: rgb(8, 157, 173); font-size: 23px"
                                                   class="ri-delete-bin-2-fill"></i></a>
                                          <div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline"
                                                style="padding-left: 20px">
                                             <div class="custom-switch-inner">
                                                   <input type="checkbox" value="ok"
                                                   onclick="change_block('{{$staff->id}}', '{{url('admin/ajax_update_block_user')}}')"
                                                      class="custom-control-input bg-danger"
                                                      id="customSwitch-{{ $staff->id }}" @if ($staff->block == 'oui') checked="" @endif>
                                                <label class="custom-control-label" for="customSwitch-{{ $staff->id }}"
                                                   data-on-label="No" data-off-label="oui">
                                                </label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="modal fade" id="exampleModal{{ $staff->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <a onclick="supprime({{ $staff->id }});"><button type="button"
                                                         class="btn btn-danger">Supprimer</button></a>
                                                <form id="logout-form{{ $staff->id }}" action="{{ url('admin/delete/user/' . $staff->id) }}"
                                                      method="POST" style="display: none;">
                                                      @csrf
                                                      @method('DELETE')
                                                </form>
                                             </div>
                                          </div>
                                    </div>
                                 </div>
                              @endif
                           @endforeach
                        </div>
                     </div>
                  </div>
               </div>
               <div class="iq-card iq-accordion-block">
                  <div class="iq-card-header d-flex justify-content-between" >
                     <div class="iq-header-title">
                           <h4 class="card-title">Professeur</h4>
                     </div>
                  </div>
                  <div class="accordion-details">
                     <div class="container-fluid">
                        <div class="row">
                           @foreach ($profs as $prof)
                              @if ($prof->fonction == 'Professeur')
                                 <div class="col-md-3">
                                    <div class="iq-card">
                                       <div class="iq-card-body text-center">
                                          <div class="doc-profile">
                                             <img class="rounded-circle img-fluid avatar-80"
                                                src="{{ url('/' . $prof->image) }}" alt="profile">
                                          </div>
                                          <div class="iq-doc-info mt-3">
                                             <h4> {{ $prof->nom . ' ' . $prof->pre }}</h4>
                                             <p class="mb-0">{{ $prof->fonction }}</p>
                                          </div>
                                          <div class="iq-doc-social-info mt-3 mb-3">
                                             <ul class="m-0 p-0 list-inline">
                                                <li><a href="{{ $prof->facebook }}"><i class="ri-facebook-fill"></i></a>
                                                </li>
                                                <li><a href="{{ $prof->twitter }}"><i class="ri-twitter-fill"></i></a> </li>
                                                <li><a href="{{ $prof->insta }}"><i class="ri-instagram-fill"></i></a></li>
                                                <li><a href="{{ $prof->linked }}"><i class="ri-linkedin-fill"></i></a></li>
                                             </ul>
                                          </div>
                                          <a href="{{ url('admin/prof/profil/' . $prof->id) }}"><i class="ri-eye-line"
                                                style="color: rgba(8, 155, 171, 1);  font-size: 23px; padding-right: 15px"></i></a>
                                          <a href="#" data-toggle="modal" data-target="#exampleModal{{ $prof->id }}"> <i
                                                style="color: rgba(8, 155, 171, 1);  font-size: 23px;"
                                                class="ri-delete-bin-2-fill"></i></a>
                                          <div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline"
                                                style="padding-left: 20px">
                                             <div class="custom-switch-inner">
                                                   <input type="checkbox"
                                                      class="custom-control-input bg-danger" 
                                                      onclick="change_block('{{$prof->id}}', '{{url('admin/ajax_update_block_prof')}}')"
                                                      id="custom-{{ $prof->id }}" @if ($prof->block == 'oui') checked="" @endif>
                                                <label class="custom-control-label" for="custom-{{ $prof->id }}"
                                                   data-on-label="No" data-off-label="oui">
                                                </label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="modal fade" id="exampleModal{{ $prof->id }}" tabindex="-1" role="dialog"
                                       aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                             <a onclick="supprime({{ $prof->id }});"><button type="button"
                                                      class="btn btn-danger">Supprimer</button></a>
                                             <form id="logout-form{{ $prof->id }}" action="{{ url('admin/delete/prof/' . $prof->id) }}"
                                                   method="POST" style="display: none;">
                                                   @csrf
                                                   @method('DELETE')
                                             </form>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              @endif
                           @endforeach
                        </div>
                     </div>
                  </div>
               </div>
               <div class="iq-card iq-accordion-block">
                  <div class="iq-card-header d-flex justify-content-between" >
                     <div class="iq-header-title">
                           <h4 class="card-title">Agent de service</h4>
                     </div>
                  </div>
                  <div class="accordion-details">
                     <div class="container-fluid">
                        <div class="row">
                           @foreach ($staffs as $staff)
                              @if ($staff->fonction == 'Staff')
                                 <div class="col-md-3">
                                    <div class="iq-card">
                                       <div class="iq-card-body text-center">
                                          <div class="doc-profile">
                                             <img class="rounded-circle img-fluid avatar-80"
                                                   src="{{ url('/' . $staff->image) }}" alt="profile">
                                          </div>
                                          <div class="iq-doc-info mt-3">
                                             <h4> {{ $staff->nom . ' ' . $staff->pre }}</h4>
                                             <p class="mb-0">{{ $staff->fonction }}</p>
                                          </div>
                                          <div class="iq-doc-social-info mt-3 mb-3">
                                             <ul class="m-0 p-0 list-inline">
                                                <li><a href="{{ $staff->facebook }}"><i class="ri-facebook-fill"></i></a>
                                                </li>
                                                <li><a href="{{ $staff->twitter }}"><i class="ri-twitter-fill"></i></a>
                                                </li>
                                                <li><a href="{{ $staff->insta }}"><i class="ri-instagram-fill"></i></a></li>
                                                <li><a href="{{ $staff->linked }}"><i class="ri-linkedin-fill"></i></a></li>
                                             </ul>
                                          </div>
                                          <a href="{{ url('admin/GRH/profil/' . $staff->id) }}"><i class="ri-eye-line"
                                                   style="color: rgba(8, 155, 171, 1);  font-size: 23px; padding-right: 15px"></i></a>
                                          <a href="#" data-toggle="modal" data-target="#exampleModal{{ $staff->id }}"> <i
                                                   style="color: rgb(8, 157, 173); font-size: 23px"
                                                   class="ri-delete-bin-2-fill"></i></a>
                                          <div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline"
                                                style="padding-left: 20px">
                                             <div class="custom-switch-inner">
                                                <input type="checkbox"
                                                      onclick="change_block('{{$staff->id}}', '{{url('admin/ajax_update_block_user')}}')"
                                                      class="custom-control-input bg-danger"
                                                      id="customSwitch-{{ $staff->id }}" @if ($staff->block == 'oui') checked="" @endif>
                                                <label class="custom-control-label" for="customSwitch-{{ $staff->id }}"
                                                   data-on-label="No" data-off-label="oui">
                                                </label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="modal fade" id="exampleModal{{ $staff->id }}" tabindex="-1" role="dialog"
                                       aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                   <a onclick="supprime({{ $staff->id }});"><button type="button"
                                                         class="btn btn-danger">Supprimer</button></a>
                                                   <form id="logout-form{{ $staff->id }}" action="{{ url('admin/delete/user/' . $staff->id) }}"
                                                      method="POST" style="display: none;">
                                                      @csrf
                                                      @method('DELETE')
                                                   </form>
                                             </div>
                                          </div>
                                       </div>
                                 </div>
                              @endif
                           @endforeach
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
