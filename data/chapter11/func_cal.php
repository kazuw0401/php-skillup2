<?php
function get_sum_and_diff($int1, $int2) {
    $sum = $int1 + $int2;
    $differnce = $int1 - $int2;
    return array($sum, $differnce);
}

$int1 = 8;
$int2 = 3;

list($sum, $differnce) = get_sum_and_diff($int1, $int2);
echo $sum.'<br>';
echo $differnce;