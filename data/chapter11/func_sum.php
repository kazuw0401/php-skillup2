<?php

function get_sum($int1, $int2){
    $sum = $int1 + $int2;
    return $sum;
}

$int1 = 8;
$int2 = 3;

$reusult = get_sum($int1, $int2);
echo $reusult;