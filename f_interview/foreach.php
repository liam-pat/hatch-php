<?php

$arr = [1, 2, 3];

foreach ($arr as &$item) {
}
var_dump($arr);

foreach ($arr as $item) {
}
var_dump($arr);

// output [1,2,2]