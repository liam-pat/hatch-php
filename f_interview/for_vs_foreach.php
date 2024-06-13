<?php

$testArr = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

$a1 = array_sum(explode(' ', microtime()));
for ($i = 0; $i < count($testArr); $i++) {
    $b = array_sum(explode(' ', microtime()));
}

$a2 = array_sum(explode(' ', microtime()));
foreach ($testArr as $key => $value) {
    $c = array_sum(explode(' ', microtime()));
}

echo sprintf("for spent time : %f \n", $b ?? 0 - $a1);
echo sprintf("foreach spent time : %f \n", $c ?? 0 - $a2);
