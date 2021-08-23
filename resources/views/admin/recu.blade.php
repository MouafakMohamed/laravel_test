<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Colibri | System Management School</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('assets/') }}/title.png" />
    <style>
        /* button print style */
        button.print-button {
        width: 100px;
        height: 100px;
        }
        span.print-icon, span.print-icon::before, span.print-icon::after, button.print-button:hover .print-icon::after {
        border: solid 4px #333;
        }
        span.print-icon::after {
        border-width: 2px;
        }

        button.print-button {
        position: relative;
        padding: 0;
        border: 0;
        
        border: none;
        background: transparent;
        }

        span.print-icon, span.print-icon::before, span.print-icon::after, button.print-button:hover .print-icon::after {
        box-sizing: border-box;
        background-color: #fff;
        }

        span.print-icon {
        position: relative;
        display: inline-block;  
        padding: 0;
        margin-top: 20%;

        width: 60%;
        height: 35%;
        background: #fff;
        border-radius: 20% 20% 0 0;
        }

        span.print-icon::before {
        content: " ";
        position: absolute;
        bottom: 100%;
        left: 12%;
        right: 12%;
        height: 110%;

        transition: height .2s .15s;
        }

        span.print-icon::after {
        content: " ";
        position: absolute;
        top: 55%;
        left: 12%;
        right: 12%;
        height: 0%;
        background: #fff;
        background-repeat: no-repeat;
        background-size: 70% 90%;
        background-position: center;
        background-image: linear-gradient(
            to top,
            #fff 0, #fff 14%,
            #333 14%, #333 28%,
            #fff 28%, #fff 42%,
            #333 42%, #333 56%,
            #fff 56%, #fff 70%,
            #333 70%, #333 84%,
            #fff 84%, #fff 100%
        );

        transition: height .2s, border-width 0s .2s, width 0s .2s;
        }

        button.print-button:hover {
        cursor: pointer;
        }

        button.print-button:hover .print-icon::before {
        height:0px;
        transition: height .2s;
        }
        button.print-button:hover .print-icon::after {
        height:120%;
        transition: height .2s .15s, border-width 0s .16s;
        }

    </style>
<style>
    @media print {
        #print-button {
            display: none;
        }
    }
table {
   border:2px solid #000000;
   border-collapse:collapse;
   width: 95%
}

td{
   padding: 5px 10px;
}
.bold {
    font-size: 22px;
    margin: 2px;
}
body {
  margin: 20px;
}

.wrapper {
  display: grid;
  grid-template-columns: 70% 30%;
  grid-gap: 10px;
  background-color: #fff;
  color: #444;
}
.wrapper1 {
  display: grid;
  grid-template-columns: 30% 30% 30% ;
  grid-gap: 10px;
  background-color: #fff;
  color: #444;
}
.box {
  border-radius: 5px;
  padding: 50px 0px 0px 0px;
  font-size: 150%;
}
.box1 {
  border-radius: 5px;
  padding: 0px 10px 10px 0px;
  font-size: 100%;
}
.box2 {
  border-radius: 5px;
  padding: 2px;
  text-align: center
}
.box3 {
  border-radius: 5px;
  padding: 2px;
  text-align: right
}
.image {
    float: right;
    margin: 0 10% 0 0;
    padding-top: 30px;
    padding-right: 30px;
    height: 130px;
}
.p1 {
    margin: 0;
    width: 95%;
    font-size: 12px;
    text-align: center
}
</style>
</head>

<body>
    <div class="wrapper">
        <div class="box a">
            <p class="bold"><b> توصيل الدفع النقدي </b><br><b> Recu de versement espéce </b></p><br>
            <b style="font-size:18px">le {{date('d/m/Y')}} </b> <span style="padding-left: 250px">Anné scolaire : {{$year}}/{{$year1}}</span>
            <div style="font-size:20px"> </div>

        </div>
        <div class="box1">
            <img class="image" src="{{url('assets/logo.png')}}" alt="iok">
        </div>
    </div>
    <table>
        <tbody>
            <tr>
                <td style="width: 40%"><b>Code de facture :</b></td>
                <td><b>{{$frai->massar}}</b></td>
                <td style="float: right"><b>رمز الفاتورة</b></td>
            </tr>
            <tr>
                <td style="width: 40%"><b>Le nom compléte</b></td>
                <td>{{$student->pre.' '.$student->nom}}</td>
                <td style="float: right"><b>الاسم الكامل</b></td>
            </tr>
            <tr>
                <td style="width: 40%"><b>Niveau scolaire</b></td>
                <td> {{$cycle->name}}</td>
                <td style="float: right"><b>المستوى الدراسي </b></td>
            </tr>
            <tr>
                <td style="width: 40%"><b>MASSAR</b></td>
                <td>{{$student->id1}} </td>
                <td style="float: right"><b> رقم مسار </b></td>
            </tr>
            <tr>
                <td style="width: 40%"><b>Mois payé</b></td>
                <td>{{$frai->date}} </td>
                <td style="float: right"><b> الشهر المؤدى عنه  </b></td>
            </tr>
            <tr>
                <td style="width: 40%"><b>Montant de l'opération : </b></td>
                <td>{{$frai->prix}} dh</td>
                <td style="float: right"><b>مبلغ العملية</b></td>
            </tr>
        </tbody>
    </table>
    <p  class="p1">cv ???? hadi mdrasa zwina bzzzf w dryfa rire hya fiha les profs m3w9in w kikhwro fnifhom bzzzzzzzzzzzzzzzf mais aslan wladkom kayaklo lkhnouna ma3endkom mnach tkhafo wladkom raykherjo stola bi2idni lah rire matkhal3ouch</p>
    <div class="wrapper1">
        <div class="box2">
            <div><b style="font-size: 12px" class="bold">امضاء القائم بالاستقبال </b><br><b style="font-size: 12px" class="bold">Signature de chargé d'accueil</b></div>
        </div>
        <div class="box2">
            <div><b style="font-size: 10px" class="bold"> امضاء الزبون</b><br><b style="font-size: 10px" class="bold">Signature du titeur:</b> </div>
        </div>
        <div class="box3"><br>
            <div><img src="data:image/png;base64,{{ DNS2D::getBarcodePNG($url, 'QRCODE',4,4) }}" alt="barcode" class="qr"  /></div>
        </div>
    </div>

<center><button class="print-button" id="print-button" onclick="window.print()"><span class="print-icon"></span></button></center> 
</body>
</html>

{{-- @extends('admin/layouts.app')
@section('css')
<link rel="stylesheet" href="{{ url('/') }}/css/jquery.dataTables.min.css">
<style>
   /* #hide{
      display: none;
   } */
</style>
@endsection
@section('js')
<script>
   $(document).ready(function(){
      $('#datatable').DataTable();
      $("#myInput").on("keyup", function() {
         var value = $(this).val().toLowerCase();
         $("#datatable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
         });
      });
   });
</script>

@endsection

@section('content')
<div class="wrapper">
    <div class="box a">
        <p class="bold"><b> توصيل الدفع النقدي </b><br><b> Recu de versement espéce </b></p><br>
        <b style="font-size:18px">le {{date('d/m/Y')}} </b> <span style="padding-left: 250px">Anné scolaire : {{$year}}/{{$year1}}</span>
        <div style="font-size:20px"> </div>

    </div>
    <div class="box1">
        <img class="image" src="{{url('assets/logo.png')}}" alt="iok">
    </div>
</div>
<table>
    <tbody>
        <tr>
            <td style="width: 40%"><b>Code de facture :</b></td>
            <td><b>{{$frai->massar}}</b></td>
            <td style="float: right"><b>رمز الفاتورة</b></td>
        </tr>
        <tr>
            <td style="width: 40%"><b>Le nom compléte</b></td>
            <td>{{$student->pre.' '.$student->nom}}</td>
            <td style="float: right"><b>الاسم الكامل</b></td>
        </tr>
        <tr>
            <td style="width: 40%"><b>Niveau scolaire</b></td>
            <td> {{$cycle->name}}</td>
            <td style="float: right"><b>المستوى الدراسي </b></td>
        </tr>
        <tr>
            <td style="width: 40%"><b>MASSAR</b></td>
            <td>{{$student->id1}} </td>
            <td style="float: right"><b> رقم مسار </b></td>
        </tr>
        <tr>
            <td style="width: 40%"><b>Mois payé</b></td>
            <td>{{$frai->mois}} </td>
            <td style="float: right"><b> الشهر المؤدى عنه  </b></td>
        </tr>
        <tr>
            <td style="width: 40%"><b>Montant de l'opération : </b></td>
            <td>{{$frai->prix}} dh</td>
            <td style="float: right"><b>مبلغ العملية</b></td>
        </tr>
    </tbody>
</table>
<p  class="p1">cv ???? hadi mdrasa zwina bzzzf w dryfa rire hya fiha les profs m3w9in w kikhwro fnifhom bzzzzzzzzzzzzzzzf mais aslan wladkom kayaklo lkhnouna ma3endkom mnach tkhafo wladkom raykherjo stola bi2idni lah rire matkhal3ouch</p>
<div class="wrapper1">
    <div class="box2">
        <div><b style="font-size: 12px" class="bold">امضاء القائم بالاستقبال </b><br><b style="font-size: 12px" class="bold">Signature de chargé d'accueil</b></div>
    </div>
    <div class="box2">
        <div><b style="font-size: 10px" class="bold"> امضاء الزبون</b><br><b style="font-size: 10px" class="bold">Signature du titeur:</b> </div>
    </div>
    <div class="box3"><br>
        <div><img src="data:image/png;base64,{{ DNS2D::getBarcodePNG($url, 'QRCODE',4,4) }}" alt="barcode" class="qr"  /></div>
    </div>
</div>

<button class="clicked">Imprimer</button>
@endsection --}}