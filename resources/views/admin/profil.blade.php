@extends('admin/layouts.app')
@section('css')
@endsection
@section('js')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
       <div class="col-lg-12">
          <div class="iq-card">
             <div class="iq-card-body p-0">
                <div class="iq-edit-list">
                   <ul class="iq-edit-profile d-flex nav nav-pills">
                      <li class="col-md-6 p-0">
                         <a class="nav-link active" data-toggle="pill" href="#personal-information">
                            Les informations générales:
                         </a>
                      </li>
                      <li class="col-md-6 p-0">
                         <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                            Sécurité:
                         </a>
                      </li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
       <div class="col-lg-12">
          <div class="iq-edit-list-data">
             <div class="tab-content">
                <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                   <div class="iq-card">
                      <div class="iq-card-header d-flex justify-content-between">
                         <div class="iq-header-title">
                            <h4 class="card-title">Personal Information</h4>
                         </div>
                      </div>
                      <div class="iq-card-body">
                         <form method="POST" action="{{url('admin/update_profil')}}" enctype="multipart/form-data">
                            @csrf
                           <div class="form-group row align-items-right">
                              <div class="col-md-12">
                                 {{-- <div class="profile-img-edit">
                                    <img class="profile-pic" id="image1" style="width: 150px" src="{{url($admin->image)}}" alt="profile-pic">
                                    <div class="p-image">
                                       <i class="ri-pencil-line upload-button" onclick="document.getElementById('image654').click()"></i>
                                       <input class="file-upload" type="file" name="image" onchange="show_image.call(this)" id="image654" accept="image/*"/>
                                    </div>
                                       @error('password')
                                          <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                                       @enderror
                                 </div> --}}
                                 <div class="profile-img-edit">
                                 <img src="{{url($admin->logo)}}" style="width: 150px; height: 150px" class="img-thumbnail" alt="user">
                                    {{-- <img class="img-fluid rounded" src="{{url($admin->logo)}}" alt="profile-pic"> --}}
                                    {{-- <img class="profile-pic" id="image" src="{{url($admin->logo)}}" alt="profile-pic"> --}}
                                    <div class="p-image">
                                       <i class="ri-pencil-line upload-button" onclick="document.getElementById('image1').click()"></i>
                                       <input class="file-upload" name="logo" type="file" onchange="show_image.call(this)" id="image1" accept="image/*"/>
                                       @error('logo')
                                          <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                          </span>
                                       @enderror
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class=" row align-items-center">
                              <div class="form-group col-sm-6">
                                 <label for="fname">École: *</label>
                                 <input type="text" name="nom" class="form-control" id="fname" value="{{$admin->nom}}">
                                 <input type="hidden" name="id" value="{{$admin->id}}">
                                 <input type="hidden" name="id1" value="111">
                                 @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                              <div class="form-group col-sm-6">
                                 <label for="cname">Tel Professionel : *</label>
                                 <input type="number" name="fix" class="form-control" id="cname" value="{{$admin->fix}}">
                                 @error('fix')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                              <div class="form-group col-sm-6">
                                 <label for="uname">Mobile : *</label>
                                 <input type="number" name="tele" class="form-control" id="uname" value="{{$admin->tele}}">
                                 
                                 @error('tele')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                              <div class="form-group col-sm-6">
                                 <label for="dob">Ville: *</label>
                                 <input type="text" class="form-control" name="ville" id="dob" value="{{$admin->ville}}">
                                 
                                 @error('ville')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                              <div class="form-group col-sm-6">
                                 <label for="dob">Adresse: *</label>
                                 <input type="text" class="form-control" name="adress" id="dob" value="{{$admin->adress}}">
                                 
                                 @error('adress')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                              <div class="form-group col-sm-6">
                                 <label for="cpass">Email: *</label>
                                 <input type="email" name="email" class="form-control" id="cpass" value="{{$admin->email}}">
                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                              </div>
                           </div>
                           <button type="submit" class="btn btn-primary mr-2">Changer</button>
                           <button type="reset" class="btn iq-bg-danger">Annuler</button>
                         </form>
                      </div>
                   </div>
                </div>
                <div class="tab-pane fade" id="emailandsms" role="tabpanel">
                    <div class="iq-card">
                       <div class="iq-card-header d-flex justify-content-between">
                          <div class="iq-header-title">
                             <h4 class="card-title">Email and SMS</h4>
                          </div>
                       </div>
                       <div class="iq-card-body">
                          <form>
                             <div class="form-group row align-items-center">
                                <label class="col-md-3" for="emailnotification">Email Notification:</label>
                                <div class="col-md-9 custom-control custom-switch">
                                   <input type="checkbox" class="custom-control-input" id="emailnotification" checked="">
                                   <label class="custom-control-label" for="emailnotification"></label>
                                </div>
                             </div>
                             <div class="form-group row align-items-center">
                                <label class="col-md-3" for="smsnotification">SMS Notification:</label>
                                <div class="col-md-9 custom-control custom-switch">
                                   <input type="checkbox" class="custom-control-input" id="smsnotification" checked="">
                                   <label class="custom-control-label" for="smsnotification"></label>
                                </div>
                             </div>
                             <div class="form-group row align-items-center">
                                <label class="col-md-3" for="npass">When To Email</label>
                                <div class="col-md-9">
                                   <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="email01">
                                      <label class="custom-control-label" for="email01">You have new notifications.</label>
                                   </div>
                                   <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="email02">
                                      <label class="custom-control-label" for="email02">You're sent a direct message</label>
                                   </div>
                                   <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="email03" checked="">
                                      <label class="custom-control-label" for="email03">Someone adds you as a connection</label>
                                   </div>
                                </div>
                             </div>
                             <div class="form-group row align-items-center">
                                <label class="col-md-3" for="npass">When To Escalate Emails</label>
                                <div class="col-md-9">
                                   <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="email04">
                                      <label class="custom-control-label" for="email04"> Upon new order.</label>
                                   </div>
                                   <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="email05">
                                      <label class="custom-control-label" for="email05"> New membership approval</label>
                                   </div>
                                   <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" id="email06" checked="">
                                      <label class="custom-control-label" for="email06"> Member registration</label>
                                   </div>
                                </div>
                             </div>
                             <button type="submit" class="btn btn-primary mr-2">Submit</button>
                             <button type="reset" class="btn iq-bg-danger">cancel</button>
                          </form>
                       </div>
                    </div>
                 </div>
                <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                   <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Change Password</h4>
                        </div>
                     </div>
                      <div class="iq-card-body">
                        <form method="POST" action="{{url('admin/update_profil')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="cpass">Mot de passe: *</label>
                                <input type="Password" name="password" class="form-control" id="password" >
                                    <input type="hidden" name="id" value="{{$admin->id}}">
                                    <input type="hidden" name="id1" value="222">
                                    @error('password')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                             </div>
                            <div class="form-group">
                               <label for="npass">Nouveau mot de passe: *</label>
                               <input type="Password" name="npassword" class="form-control" id="pass" >
                               @error('npassword')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                               <label for="vpass">Confirmez le nouveau Mot de passe: *</label>
                               <input type="Password" name="npassword_confirmation" class="form-control" id="pass-confirm">
                               @error('npassword_confirmation')
                                        <span  style="color: red" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" class="btn iq-bg-danger">cancel</button>
                         </form>
                      </div>
                   </div>
                </div>
                
                {{-- <div class="tab-pane fade" id="manage-contact" role="tabpanel">
                   <div class="iq-card">
                      <div class="iq-card-header d-flex justify-content-between">
                         <div class="iq-header-title">
                            <h4 class="card-title">Manage Contact</h4>
                         </div>
                      </div>
                      <div class="iq-card-body">
                         <form>
                            <div class="form-group">
                               <label for="cno">Contact Number:</label>
                               <input type="text" class="form-control" id="cno" value="001 2536 123 458">
                            </div>
                            <div class="form-group">
                               <label for="email">Email:</label>
                               <input type="text" class="form-control" id="email" value="Binijone@demo.com">
                            </div>
                            <div class="form-group">
                               <label for="url">Url:</label>
                               <input type="text" class="form-control" id="url" value="https://getbootstrap.com">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" class="btn iq-bg-danger">cancel</button>
                         </form>
                      </div>
                   </div>
                </div> --}}
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection