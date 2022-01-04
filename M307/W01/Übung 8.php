<?php
$lotto = array();
for ($i = 1;$i <=6; $i++) {
    $n = rand(1,41);
    if (in_array($n,$lotto)) {
        $i--;
    }
    else {
        $lotto[$i] = $n;
    }
   }

for ($j = 1; $j <= count($lotto); $j++){
    echo $lotto[$j]," ";
}
?>