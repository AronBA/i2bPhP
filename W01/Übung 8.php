<?php
$lotto = array();
for ($i = 1;$i <=6; $i++) {
    $n = rand(1,41);
    if (array_key_exists($n,$lotto)){
        $i--;
    }
    else {
        $lotto[$i] = $n;
    }
   }

for ($j = 0; $j <= count($lotto); $j++){
    echo $lotto[$j]," ";
}
?>