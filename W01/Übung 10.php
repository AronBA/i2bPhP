<?php
//Billige Version
$code = array("Montag"=>"Baumhaus","Dienstag"=>"Ventilator","Mittwoch"=>"Unterricht","Donnerstag"=>"Behördenwegweiser","Freitag"=>"Fahrradschloss","Samstag"=>"Kettenschaltung","Sonntag"=>"Montag","Wirtschaftinformatik"=>"Freude","Deutsch"=>"Brezeln","Mathematik"=>"Kaugummi");
$decode = array("Baumhaus"=>"Montag","Ventilator"=>"Dienstag","Unterricht"=>"Mittwoch","Behördenwegweiser"=>"Donnerstag","Fahrradschloss"=>"Freitag","Kettenschaltung"=>"Samstag","Montag"=>"Sonntag","Freude"=>"Wirtschaftinformatik","Brezeln"=>"Deutsch","Kaugummi"=>"Mathematik");

echo "Letzten ", $decode["Behördenwegweiser"]," hatten wir ", $decode["Kaugummi"], " das war anstrengend. Zum Glück blieb dann nur noch der ", $decode["Fahrradschloss"], ". ", $decode["Kettenschaltung"], " und ", $decode["Montag"], " konnte ich mich nicht richtig entspannen, denn ", $decode["Baumhaus"], " erwartet uns schon wieder ",$decode["Freude"],". Naja ... besser als ", $decode["Brezeln"];
echo "<br>","</br>";
echo "am ",$code["Freitag"], " haben wir ",$code["Mathematik"]," am ",$code["Dienstag"]," ebenfalls. Mein Lieblingsfach ist ", $code["Deutsch"], ", das wir leider nur am", $code["Mittwoch"],"haben. Am meisten freue ich mich immer darauf, wenn ich am", $code["Sonntag"],$code["Wirtschaftinformatik"], "lernen darf.";
echo "<br>","</br>";

//Profi Version
$geheimsprache = $code;
$nachricht = array();







