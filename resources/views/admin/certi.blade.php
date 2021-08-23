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
	position: fixed;  
    width: 200px ; 
	top: 54.5%;
	left: 44%;
	font-size: 4.6vw;
	color: #00899d;
	transform: translate(-50%, -50%);
}
div#capture{
	display:block;
    margin: 0px;
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
        <img src="{{url('images/Pic1.png')}}" alt="Snow" style="width:100%;">
        <div class="centered"> {{ $student }}  &nbsp;</div>   
    </div>
    <br>
		<a id="take-a-screenshot" class="myButton">Download</a>
        <div id="sam"></div>
        <script src='{{url('js/html2canvas.min.js')}}'></script>
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
                    saveAs(canvas.toDataURL(), 'card.png');
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