<?php
require_once '../vendor/autoload.php';

$arrA = ['green', 'a' => 'red', 'orange', 5 => 'pink', 'yellow'];
$arrB = ['green', 3 => 'orange', 'pink', 5 => 'yellow'];

dump(array_intersect_assoc($arrA, $arrB));                                  // compare key and value
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
//////////////
/// [
//  0 => "green"
//  ]
dump(array_intersect($arrA, $arrB));                                        // compare value
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
////////////////
/// [
//  0 => "green"
//  1 => "orange"
//  5 => "pink"
//  6 => "yellow"
//]
dump(array_intersect_key($arrA, $arrB));                                    // compare key
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
//////////////
/// [
//  0 => "green"
//  5 => "pink"
//]

