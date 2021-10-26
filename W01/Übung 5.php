<?php
$n1 = 5;
$n2 = 181;
$multiplikation = $n1 * $n2;
$division = $n1 / $n2;
$subktration = $n1 - $n2;
$addition = $n1 + $n2;
$wurzel1 = sqrt($n1);
$wurzel2 = sqrt($n2);
$n1hoch3 = pow($n1,3);
$n2hoch2 = pow($n2,2);
$total = $multiplikation + $division + $subktration + $addition + $wurzel2 + $wurzel1 + $n1hoch3 + $n2hoch2;
echo "<br>",$n1,"</br>";
echo "<br>",$n2,"</br>";
echo "<br> Muliplaikation: ",$multiplikation,"</br>";
echo "<br> Division: ",$division,"</br>";
echo "<br> Subtraktion: ",$subktration,"</br>";
echo "<br> Addition: ",$addition,"</br>";
echo "<br> Wurzel aus Zahl 1: ",$wurzel1,"</br>";
echo "<br> Wurzel aus Zahl 2: ",$wurzel2,"</br>";
echo "<br> Erste Zahl hoch 3: ", $n1hoch3,"</br>";
echo "<br> Zweite Zahl hoch 2: ",$n2hoch2,"</br>";
echo "<br><strong> Alle Werte zusammen: ",$total,"</strong></br>";
?>

