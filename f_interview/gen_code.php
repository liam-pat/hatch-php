<?php

function drawVerificationCode()
{
    $image = imagecreatetruecolor(80, 60);
    $backColor = imagecolorallocate($image, 0, 0, 0);
    $gColor = imagecolorallocate($image, 255, 255, 255);

    $i = 1;
    $str = '';

    while ($i <= 4) {
        $str .= rand(0, 9);
        $i++;
    }

    imagestring($image, 7, 20, 8, $str, $gColor);
    imagejpeg($image, "../cache/res.jpeg");

    return $str;
}


$image = imagecreatetruecolor(80, 60);
$backColor = imagecolorallocate($image, 0, 0, 0);
$gColor = imagecolorallocate($image, 255, 255, 255);

$i = 1;
$str = '';
while ($i <= 4) {
    $str .= rand(0, 9);
    $i++;
}
imagestring($image, 7, 20, 8, $str, $gColor);
imagejpeg($image, "res.jpeg");