<?php

$str =  md5(microtime()); //here we are using md5 it generates random combinations of strings and numbers and microtime() is used to generate new integers and letters changed every time
$str = substr($str,0,6); // in above function we get 32 bit we need to convert it into 6

// here we have a problem that is even though we press wrong captcha we are able to enter the page so we need to solve this by creating a session

session_start();
$_SESSION['cap_code'] = $str; // here we are storing the current string to compare this captcha and the users entry

$img = imagecreate(100,50);// this is the image size here image is nothing but the area where the captcha letters have been displayed.
imagecolorallocate($img,255,255,255);// the background color of the letters in captcha 
$txtcol =  imagecolorallocate($img,255, 0, 0);//the color of the letters in captcha in red
imagestring($img,50,5,5,$str,$txtcol); // here we are writing on the image with fontsize,xaxisand y axis distances, what we are writing and its color
header('content:image/jpeg');
imagejpeg($img); //here we are returning image
?>
