<?php
session_start();
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
 
function gerachar($length=6)
{
$_rand_src = array(
array(48,57) //números
, array(97,122) //letras maiúsculas
, array(65,90) //letras minúsculas
);
srand();
$random_string = "";
for($i=0;$i<$length;$i++){
$i1=rand(0,sizeof($_rand_src)-1);
$random_string .= chr(rand($_rand_src[$i1][0],$_rand_src[$i1][1]));
}
return $random_string;
}
  
$img = @imagecreatefromjpeg("images/fundo.jpg");
$weightHeight = getimagesize("images/fundo.jpg");
$img_w = $weightHeight[0];
$img_h = $weightHeight[1];


$rand = gerachar(4);
$_SESSION['captcha'] = $rand;
ImageString($img, 5, 50, 20, $rand[0]." ".$rand[1]." ".$rand[2]." ".$rand[3], ImageColorAllocate ($img, rand(0,255), rand(0,255), rand(0,255)));
Header ('Content-type: image/jpeg');
imagejpeg($img,NULL,100);
ImageDestroy($img);
?>