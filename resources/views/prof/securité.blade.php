@extends('prof/layouts.app')
@section('css')
    <style>
        #display{
            display: none;
        }
        #display1{
            display: none;
        }
        #display2{
            display: none;
        }
    </style>
@endsection
@section('js')
    <script>
        function searsh() {
            var ok = $('#change').val();
                if (ok == 'CDD') {
                    document.getElementById("display").id = "salam";
                    document.getElementById("display1").id = "salam1";
                    document.getElementById("salam2").id = "display2";
                }else{
                    document.getElementById("salam").id = "display";
                    document.getElementById("salam1").id = "display1";
                    document.getElementById("display2").id = "salam2";
                }
                    
                    $('#data').html(data);

                }
    </script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                       <h4 class="card-title">Change Password</h4>
                    </div>
                 </div>
                  <div class="iq-card-body">
                    <form method="POST" action="{{url('prof/update_profil')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="cpass">Mot de passe actuelle: *</label>
                            <input type="Password" name="password" class="form-control" id="password" >
                                <input type="hidden" name="id" value="{{Auth::guard('prof')->user()->id}}">
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
    </div>
 </div>
@endsection