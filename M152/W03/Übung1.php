<?php


function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct){
    // creating a cut resource
    $cut = imagecreatetruecolor($src_w, $src_h);

    // copying relevant section from background to the cut resource
    imagecopy($cut, $dst_im, 0, 0, $dst_x, $dst_y, $src_w, $src_h);

    // copying relevant section from watermark to the cut resource
    imagecopy($cut, $src_im, 0, 0, $src_x, $src_y, $src_w, $src_h);

    // insert cut resource to destination image
    imagecopymerge($dst_im, $cut, $dst_x, $dst_y, 0, 0, $src_w, $src_h, $pct);
}

// Melde alle PHP Fehler (siehe Changelog)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Ein bestehendes Bild nehmen

$im = imagecreatefromjpeg('img/2017_islande-1101.jpg');
$im2 = imagecreatefrompng('img/WG_LOGO_800.png');

// Hier wäre ein leeres Bild
//$im = imagecreatetruecolor(240, 80);
$text_color = imagecolorallocate($im, 233, 14, 91);
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 100, 100, 100);
$black = imagecolorallocate($im, 0, 0, 0);
$font = 'img\arial.ttf';
// Text in Bild einfügen



$sx2 = (imagesx($im2) / 2);
$sy2 = (imagesy($im2) / 2);

$sx = (imagesx($im) / 2) - $sx2;
$sy = (imagesy($im) / 2) ;

imagettftext($im, 100, 0, 2500, 1900, $white, $font, 'Aron Baur');
imagettftext($im, 100, 0, 2500, 1700, $white, $font, 'I2a');

imagecopymerge_alpha($im, $im2, $sx, $sy, 0, 0, imagesx($im2), imagesy($im2), 99);


// content type header in HTML5 angeben - in diesem Falle image/jpeg
header('Content-Type: image/jpeg');

// Bild ausgeben

imagejpeg($im);


// Speicher wieder freigeben
imagedestroy($im);
imagedestroy($im2);
?>

