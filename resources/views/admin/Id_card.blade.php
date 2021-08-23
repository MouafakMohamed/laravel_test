{{-- @extends('admin/layouts.app')
@section('css')
<link rel='stylesheet' href="{{url('assets')}}/licence/css/style.css"/>
@endsection
@section('js')
@endsection

@section('content') 
<div class="container-fluid">
    <div class="row">--}}
        <!DOCTYPE html>
<html dir="rtl">
    <head>
        <title>Id card</title>
        <link rel='stylesheet' href="{{url('assets')}}/licence/css/style.css"/>
    </head>
    <body>
        
<div id="capture" class="{{$box}}">
    <img src="data:image/png;base64,{{ DNS2D::getBarcodePNG(url('admin/profil/'.$student->id1), 'QRCODE',3,3) }}" alt="barcode" class="qr"  />
    <img src="{{url($student->image)}}" style="width:230px;height:280px;" class="photo">
    <img src="{{url($student->image)}}" style="width:80px;height:110px;"  class="photo2">
    <p style="
    position: absolute;
    top: 210px;
    right: 387px;
    font-size: 32px;
">{{$student->nom1.' '.$student->pre1}}</p>
<p style="
    position: absolute;
    top: 310px;
    right: 389px;
    font-size: 33px;
">{{$admin->nom}}</p>
<p style="
    position: absolute;
    top: 411px;
    right: 389px;
    font-size: 30px;
">{{$class->name}}</p>
<h2 style="
    position: absolute;
    top: 459px;
    right: 372px;
    text-transform: uppercase;
    letter-spacing: 13px;
    font-size: 46.2px;
    color: #2d2d2d;
">{{$student->categorie}}</h2>
<div dir="ltr" 
>
<h1 style="
    font-size: 27px;
    position: absolute;
    top: 230px;
    padding-left: 10px;
	">{{$student->nom.' '.$student->pre}}</h1>
</div>

<h2 style="
    position: absolute;
    top: 330px;
    right: 880px;
    font-size: 28px;
    float: right
">{{$student->id1}}</h2>
{{-- <h2 style="
    position: absolute;
    top: 584px;
    right: 938px;
    font-size: 24px;
	color: #2d2d2d;
">01.01.2019</h2> --}}
</div> 
<br/><br/>
                <ul>
                   <li>
                       <a href="{{url('admin/eleve/profil/'.$student->id)}}"><button class="btn-warning"> Retour </button></a>
                    </li> 
                    @if ($student->sex == 'Garçon')
                    <li> <button class="btn-info" id="take-a-screenshot">Télécharger </button></li>
                    @elseif ($student->sex == 'Fille')
                       <li> <button class="btn-pink" id="take-a-screenshot">Télécharger </button></li>
                    @endif
                </ul>

        
        <div id="sam"></div>
        <script src='{{url('assets')}}/licence/js/html2canvas.min.js'></script>
        
        <script>
            /* 
                * This tells the webpage to 1. Use the html2canvas library; 
                * 2. Tell the library to get the contents of the source div. <div id="capture"></div>
                * 3. Then make an image and put it in the target div. <div id="sam"></div>
                */
            //Define the what to copy (source) and
            var source = document.querySelector("#capture");
            //where to store the image (target)                
            var target = document.querySelector("#sam");


            //Now let's click a button to execute html2canvas
            var button = document.querySelector("#take-a-screenshot");
            button.onclick = function(){
                //Execute html2canvas library
                html2canvas(source).then(canvas => {
                    //target.appendChild(canvas);
                    saveAs(canvas.toDataURL(), 'canvas.png');
                });

            };

            //Save as function
            function saveAs(uri, filename) {
                var link = document.createElement('a');
                if (typeof link.download === 'string') {
                link.href = uri;
                link.download = filename;

                //Firefox requires the link to be in the body
                document.body.appendChild(link);

                //simulate click
                link.click();

                //remove the link when done
                document.body.removeChild(link);
                } else {
                window.open(uri);
                }

            }
        </script>
    </body>
</html>
    {{-- </div>
</div>
@endsection --}}
