<?php 
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




imagettftext($im, 150, 0, 2500, 1900, $white, $font, 'Aron Baur');
imagettftext($im, 150, 0, 2500, 1700, $white, $font, 'I2a');


// content type header in HTML5 angeben - in diesem Falle image/jpeg
header('Content-Type: image/jpeg');

// Bild ausgeben
imagejpeg($im,"test4.jpg",90);

// Speicher wieder freigeben
imagedestroy($im);
imagedestroy($im2);
?>

