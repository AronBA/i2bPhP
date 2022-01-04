<?php
echo "Gib zuerst dein Körpergewicht(kg) und das getrunkene Bier(l) an:";
$gewicht = readline("Körpergewicht");
$input = readline('Bier angabe in Liter: ');
$alk = $input*1000 * 0.05 * 0.8;
echo $input. " Liter Bier haben " .$alk." Gramm alkohol";
$promille = $alk / (0.65* $gewicht);
if ($promille < 0.3){
    $antwort = "Das geht ja noch";
}
else if ($promille < 0.5){
    $antwort = "Achtung!";
}
else if ($promille < 0.8){
    $antwort = "Das ist schon eine Menge!";
}
else if ($promille > 0.8){
    $antwort = "Kein Kommentar!";
}

echo "Du hast ".$promille." ".$antwort;