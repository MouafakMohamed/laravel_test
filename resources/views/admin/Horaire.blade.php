@extends('admin/layouts.app')
@section('css')
@endsection
@section('js')
<script>
            
</script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
       <div class="col-sm-12 col-lg-12">
            <div class="iq-card">
                <div class="iq-card-body">
                    <form>
                        <div class="row">
                            {{-- <div class="col">
                                 <select class="form-control" onchange="change1('{{url('admin/ajax_get_cycle_by_categorie')}}')" id="cat">
                                    <option selected="" disabled=""> Choisir la categorie </option>
                                    <option value="préscolaire">préscolaire</option>
                                    <option value="primaire">primaire</option>
                                    <option value="E.collégial">E.collégial</option>
                                 </select>
                            </div>
                            <div class="col">
                                 <select class="form-control" onchange="change2('{{url('admin/ajax_get_class_by_cycle')}}')" id="cycle">
                                    <option selected="" disabled=""> Choisir le cycle </option>
                                 </select>
                            </div> --}}
                            <div class="col-sm-6 col-lg-4">
                                <div class="col">
                                    <select class="form-control" onchange="changet3('{{url('admin/Horaire')}}')"  id="class">
                                        <option selected="" disabled=""> Choisir la classe </option>
                                        @foreach ($classes as $class)
                                        <option value="{{$class->id}}">{{$class->name}} </option>
                                        @endforeach
                                        {{----}}
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
       </div>
    </div>
</div>
@endsection