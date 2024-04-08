<?php
require_once '../vendor/autoload.php';

function array_merge_fun(): array
{
    $arrA = ['a' => 1, 'b' => 2, 1 => 3];
    $arrB = ['b' => 1, 1 => 4, 5];

    return array_merge($arrA, $arrB);
}

function plus_merge_fun(): array
{
    $arrA = ['a' => 1, 'b' => 2, 1 => 3];
    $arrB = ['b' => 1, 1 => 4, 5];
    return $arrA + $arrB;
}

dump(array_merge_fun());  // output: ["a" => 1, "b" => 1, 0 => 3, 1 => 4, 2 => 5]
dump(plus_merge_fun());   // output: ["a" => 1, "b" => 2, 1 => 3, 2 => 5]
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

$ar1 = ['color' => ['favorite' => 'red'], 5];
$ar2 = [10, 'color' => ["favorite" => 'green', 'blue']];
dump(array_merge_recursive($ar1, $ar2));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
////////////////////////////
/// [
//  "color" => array:2 [
//    "favorite" => array:2 [
//      0 => "red"
//      1 => "green"
//    ]
//    0 => "blue"
//  ]
//  0 => 5
//  1 => 10
//]