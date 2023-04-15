<?php

$img1='images/ssame.jpg';
$img2='images/ss2.jpg';

$image1=md5(file_get_contents($img1));
$image2=md5(file_get_contents($img2));

if($image1==$image2)
{
	echo "Image Matched";
}
else
{
	echo "Opps Images are not Matching";
}
?>