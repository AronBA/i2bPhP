<?php
/* Die folgende Zeilen entkommentieren und die Variablen benutzen, um die Funktionsfähigkeit des korrigierten Listings zu überprüfen.  */
$kapital = 10000;
$kreditsumme = 1300;

if ($kapital > 10000 AND $kreditsumme <= 2000)
{
    $message = "Sie haben " . $kapital . " CHF Kapital, wir gewähren Ihren Kredit.";
}
elseif ($kreditsumme >2000)
{
    $message = "Wir gewähren grundsätzlich keine Kredite über 2000 CHF. Deshalb können wir die       von Ihnen gewünschte Summe von ".  $kreditsumme . " CHF nicht akzeptieren.";
}
elseif ($kapital <= 10000)
{
    $message ="Sie haben zu wenig Kapital (Ihre Eingabe: $kapital), um bei uns einen Kredit zu erhalten.";
}

echo $message;