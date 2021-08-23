<!DOCTYPE html>
<html dir="rtl">
    <head>
        <title>New Card</title>
    </head>
    <style>
body {
	text-align: center; 
} 
@font-face {
    font-family: GE_SS_Two_Medium;
    src: url("{{url('GE_SS_Two_Medium.otf')}}");
}
* {
    font-family: GE_SS_Two_Medium;
} 
.centered {
	position: absolute;    
	top: 54.5%;
	left: 44%;
	font-size: 4.6vw;
    color: #eb028b;
	transform: translate(-50%, -50%);
}
div#capture{
    position: relative;
    text-align: center;
}
.myButton {
    background: linear-gradient(to bottom, #232323 5%, #000000 100%);
    border-radius: 6px;
    display: inline-block;
    cursor: pointer;
    color: #fbff00;
    font-size: 15px;
    padding: 6px 24px;
}

    </style>
<body>
    <div id="capture" class="box">
        <img src="{{url('images/Pic2.png')}}" alt="Snow" style="width:100%;">
        <div class="centered"> {{ $student }}  &nbsp;</div>   
    </div>
    <br>
		<a id="take-a-screenshot" class="myButton">Download</a>
        <div id="sam"></div>
        <script src='{{url('js/html2canvas.min.js')}}'></script>
        <script>
            var source = document.querySelector("#capture");      
            var target = document.querySelector("#sam");
            var button = document.querySelector("#take-a-screenshot");
            button.onclick = function(){
                html2canvas(source).then(canvas => {
                    saveAs(canvas.toDataURL(), 'card.png');
                });

            };
            function saveAs(uri, filename) {
                var link = document.createElement('a');
                if (typeof link.download === 'string') {
                link.href = uri;
                link.download = filename;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                } else {
                window.open(uri);
                }
            }
        </script>
    </body>
</html>