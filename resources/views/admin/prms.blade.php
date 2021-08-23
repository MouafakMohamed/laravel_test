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
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Pouvoirs</h4>
                </div>
             </div>
             <div class="iq-card-body">
                <table class="table table-bordered table-striped">
                    {{-- <thead>
                        <tr>
                            <th></th>
                            <th class="text-center">
                                Rien
                            </th>
                            <th class="text-center">
                                Voir
                            </th>
                            <th class="text-center">
                                Modifier
                            </th>
                        </tr>
                    </thead> --}}
                    <tbody>
                        <tr>
                            <th class="text-nowrap" scope="row">Les classes</th>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input type="radio" onclick="change_script('{{$user->id}}','class','rien', '{{url('admin/ajax_update_prms')}}')" id="customRadio-1" name="class" class="custom-control-input bg-danger" @if ($user->class == 'rien' or $user->class == '') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-1"> Rien </label>
                                </div>
                            </td>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input type="radio" onclick="change_script('{{$user->id}}','class','voir', '{{url('admin/ajax_update_prms')}}')" id="customRadio-11" name="class" class="custom-control-input bg-info" @if ($user->class == 'voir') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-11"> Voir </label>
                                </div>
                            </td>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input type="radio" onclick="change_script('{{$user->id}}','class','modifier', '{{url('admin/ajax_update_prms')}}')" id="customRadio-111" name="class" class="custom-control-input bg-success" @if ($user->class == 'modifier') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-111"> Modifier </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-nowrap" scope="row">Transport</th>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input type="radio" onclick="change_script('{{$user->id}}','transport','rien', '{{url('admin/ajax_update_prms')}}')" id="customRadio-2" name="transport" class="custom-control-input bg-danger" @if ($user->transport == 'rien' or $user->transport == '') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-2"> Rien </label>
                                </div>
                            </td>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input type="radio" onclick="change_script('{{$user->id}}','transport','voir', '{{url('admin/ajax_update_prms')}}')" id="customRadio-22" name="transport" class="custom-control-input bg-info" @if ($user->transport == 'voir') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-22"> Voir </label>
                                </div>
                            </td>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input type="radio" onclick="change_script('{{$user->id}}','transport','modifier', '{{url('admin/ajax_update_prms')}}')" id="customRadio-222" name="transport" class="custom-control-input bg-success" @if ($user->transport == 'modifier') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-222"> Modifier </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-nowrap" scope="row">Les emplois</th>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','emploi','rien', '{{url('admin/ajax_update_prms')}}')" type="radio" id="customRadio-3" name="emploi" class="custom-control-input bg-danger" @if ($user->emploi == 'rien' or $user->emploi == '') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-3"> Rien </label>
                                </div>
                            </td>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','emploi','voir', '{{url('admin/ajax_update_prms')}}')" type="radio" id="customRadio-33" name="emploi" class="custom-control-input bg-info" @if ($user->emploi == 'voir') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-33"> Voir </label>
                                </div>
                            </td>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','emploi','modifier', '{{url('admin/ajax_update_prms')}}')" type="radio" id="customRadio-333" name="emploi" class="custom-control-input bg-success" @if ($user->emploi == 'modifier') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-333"> Modifier </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-nowrap" scope="row">La base de donné</th>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','basedonne','rien', '{{url('admin/ajax_update_prms')}}')" type="radio" id="customRadio-4" name="basedonne" class="custom-control-input bg-danger" @if ($user->basedonne == 'rien' or $user->basedonne == '') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-4"> Rien </label>
                                </div>
                            </td>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','basedonne','voir', '{{url('admin/ajax_update_prms')}}')" type="radio" id="customRadio-44" name="basedonne" class="custom-control-input bg-info" @if ($user->basedonne == 'voir') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-44"> Voir </label>
                                </div>
                            </td>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','basedonne','modifier', '{{url('admin/ajax_update_prms')}}')" type="radio" id="customRadio-444" name="basedonne" class="custom-control-input bg-success" @if ($user->basedonne == 'modifier') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-444"> Modifier </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-nowrap" scope="row">GRH</th>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','GRH','rien', '{{url('admin/ajax_update_prms')}}')" type="radio" id="customRadio-5" name="GRH" class="custom-control-input bg-danger" @if ($user->GRH == 'rien' or $user->GRH == '') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-5"> Rien </label>
                                </div>
                            </td>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','GRH','voir', '{{url('admin/ajax_update_prms')}}')" type="radio" id="customRadio-55" name="GRH" class="custom-control-input bg-info" @if ($user->GRH == 'voir') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-55"> Voir </label>
                                </div>
                            </td>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','GRH','modifier', '{{url('admin/ajax_update_prms')}}')" type="radio" id="customRadio-555" name="GRH" class="custom-control-input bg-success" @if ($user->GRH == 'modifier') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-555"> Modifier </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-nowrap" scope="row">Bibliothéque</th>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','biblio','rien', '{{url('admin/ajax_update_prms')}}')" type="radio" id="customRadio-6" name="biblio" class="custom-control-input bg-danger" @if ($user->biblio == 'rien' or $user->biblio == '') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-6"> Rien </label>
                                </div>
                            </td>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','biblio','voir', '{{url('admin/ajax_update_prms')}}')" type="radio" id="customRadio-66" name="biblio" class="custom-control-input bg-info" @if ($user->biblio == 'voir') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-66"> Voir </label>
                                </div>
                            </td>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','biblio','modifier', '{{url('admin/ajax_update_prms')}}')" type="radio" id="customRadio-666" name="biblio" class="custom-control-input bg-success" @if ($user->biblio == 'modifier') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-666"> Modifier </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-nowrap" scope="row">Cours</th>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','cours','rien', '{{url('admin/ajax_update_prms')}}')" type="radio" id="customRadio-7" name="cours" class="custom-control-input bg-danger" @if ($user->cours == 'rien' or $user->cours == '') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-7"> Rien </label>
                                </div>
                            </td>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','cours','voir', '{{url('admin/ajax_update_prms')}}')" type="radio" id="customRadio-77" name="cours" class="custom-control-input bg-info" @if ($user->cours == 'voir') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-77"> Voir </label>
                                </div>
                            </td>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','cours','modifier', '{{url('admin/ajax_update_prms')}}')" type="radio" id="customRadio-777" name="cours" class="custom-control-input bg-success" @if ($user->cours == 'modifier') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-777"> Modifier </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-nowrap" scope="row">Livre des visites</th>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','livre','rien', '{{url('admin/ajax_update_prms')}}')" type="radio" id="customRadio-8" name="livre" class="custom-control-input bg-danger" @if ($user->livre == 'rien' or $user->livre == '') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-8"> Rien </label>
                                </div>
                            </td>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','livre','voir', '{{url('admin/ajax_update_prms')}}')" type="radio" id="customRadio-88" name="livre" class="custom-control-input bg-info" @if ($user->livre == 'voir') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-88"> Voir </label>
                                </div>
                            </td>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','livre','modifier', '{{url('admin/ajax_update_prms')}}')" type="radio" id="customRadio-888" name="livre" class="custom-control-input bg-success" @if ($user->livre == 'modifier') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-888"> Modifier </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-nowrap" scope="row">Contacts</th>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','contacts','rien', '{{url('admin/ajax_update_prms')}}')" type="radio" id="customRadio-9" name="contacts" class="custom-control-input bg-danger" @if ($user->contacts == 'rien' or $user->contacts == '') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-9"> Rien </label>
                                </div>
                            </td>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','contacts','voir', '{{url('admin/ajax_update_prms')}}')" type="radio" id="customRadio-99" name="contacts" class="custom-control-input bg-info" @if ($user->contacts == 'voir') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-99"> Voir </label>
                                </div>
                            </td>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','contacts','modifier', '{{url('admin/ajax_update_prms')}}')" type="radio" id="customRadio-999" name="contacts" class="custom-control-input bg-success" @if ($user->contacts == 'modifier') checked="" @endif>
                                    <label class="custom-control-label" for="customRadio-999"> Modifier </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-nowrap" scope="row">Clubs</th>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','clubs','rien', '{{url('admin/ajax_update_prms')}}')" type="radio" id="clubs-1" name="clubs" class="custom-control-input bg-danger" @if ($user->clubs == 'rien' or $user->clubs == '') checked="" @endif>
                                    <label class="custom-control-label" for="clubs-1"> Rien </label>
                                </div>
                            </td>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','clubs','voir', '{{url('admin/ajax_update_prms')}}')" type="radio" id="clubs-2" name="clubs" class="custom-control-input bg-info" @if ($user->clubs == 'voir') checked="" @endif>
                                    <label class="custom-control-label" for="clubs-2"> Voir </label>
                                </div>
                            </td>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','clubs','modifier', '{{url('admin/ajax_update_prms')}}')" type="radio" id="clubs-3" name="clubs" class="custom-control-input bg-success" @if ($user->clubs == 'modifier') checked="" @endif>
                                    <label class="custom-control-label" for="clubs-3"> Modifier </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-nowrap" scope="row">Stock</th>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','stock','rien', '{{url('admin/ajax_update_prms')}}')" type="radio" id="stock-1" name="stock" class="custom-control-input bg-danger" @if ($user->stock == 'rien' or $user->stock == '') checked="" @endif>
                                    <label class="custom-control-label" for="stock-1"> Rien </label>
                                </div>
                            </td>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','stock','voir', '{{url('admin/ajax_update_prms')}}')" type="radio" id="stock-2" name="stock" class="custom-control-input bg-info" @if ($user->stock == 'voir') checked="" @endif>
                                    <label class="custom-control-label" for="stock-2"> Voir </label>
                                </div>
                            </td>
                            <td  class="text-center">
                                <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                                    <input onclick="change_script('{{$user->id}}','stock','modifier', '{{url('admin/ajax_update_prms')}}')" type="radio" id="stock-3" name="stock" class="custom-control-input bg-success" @if ($user->stock == 'modifier') checked="" @endif>
                                    <label class="custom-control-label" for="stock-3"> Modifier </label>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection