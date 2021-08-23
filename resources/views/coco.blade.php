<!DOCTYPE html>
<html>
<head>
    <title>How to Generate QR Code in Laravel 6? - ItSolutionStuff.com</title>
</head>
<body>
    
<div class="visible-print text-center">
    <h1>Laravel 6 - QR Code Generator Example</h1>
     
   <?php
   echo DNS2D::getBarcodeHTML('mouafak salam', 'QRCODE').'<br>';
   echo DNS2D::getBarcodePNGPath('4445645656', 'PDF417').'<br>';
   echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG('mouafak salam', 'QRCODE',3,3) . '" alt="barcode"   />'.'<br>';
   echo DNS2D::getBarcodeSVG('4445645656', 'DATAMATRIX').'<br>';
   echo '<img src="data:image/png;base64,' . DNS2D::getBarcodePNG('mouafak002', 'PDF417') . '" alt="barcode"   />'.'<br>';
   echo DNS1D::getBarcodeSVG('4445645656', 'PHARMA2T',3,33).'<br>';
echo DNS1D::getBarcodeHTML('4445645656', 'PHARMA2T',3,33).'<br>';
echo '<img src="' . DNS1D::getBarcodePNG('4', 'C39+',3,33) . '" alt="barcode"   />'.'<br>';
echo DNS1D::getBarcodePNGPath('4445645656', 'PHARMA2T',3,33).'<br>';
echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG('4', 'C39+',3,33) . '" alt="barcode"   />'.'<br>';
echo '<img src="' . DNS1D::getBarcodePNG('4', 'C39+',3,33,array(1,1,1), true) . '" alt="barcode"   />';
echo DNS1D::getBarcodePNGPath('4445645656', 'PHARMA2T',3,33,array(255,255,0), true);
echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG('4', 'C39+',3,33,array(1,1,1), true) . '" alt="barcode"   />';
 ?>
     
    <p>example by ItSolutionStuf.com.</p>
</div>
    
</body>
</html>