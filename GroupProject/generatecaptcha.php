<?php
session_start();
header('Content-type: image/jpeg');

$text=$_SESSION['secure'];
$font_size=30;

$image_width=200;
$image_height=60;

$image=imagecreate($image_width,$image_height);
imagecolorallocate($image,255,255,255);

$text_color=imagecolorallocate($image,0,0,0);

for($x=1;$x<=200;$x++)
{
	$x1=rand(1,200);
	$x2=rand(1,200);
	$y1=rand(1,200);
	$y2=rand(1,200);
	
	imageline($image,$x1,$y1,$x2,$y2,$text_color);
}

imagettftext($image,$font_size,0,20,42,$text_color,"D:\xampp\htdocs\GroupProject\font.ttf",$text);
imagejpeg($image);
?>