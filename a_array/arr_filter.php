<?php
require_once '../vendor/autoload.php';

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$array01 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => null, 'g' => '', 'h' => [], 'i' => 'null', 'j' => false, 'k' => 'false'];
$array02 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
dump(array_filter($array01));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
/////////////
/// [
//  "a" => 1
//  "b" => 2
//  "c" => 3
//  "d" => 4
//  "e" => 5
//  "i" => "null"
//  "k" => "false"
//]
$useKeyAndValueArr = array_filter($array02, static function ($value, $key) {
    return $value <= 8;
}, ARRAY_FILTER_USE_BOTH);
dump($useKeyAndValueArr);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
//////////////
///[
//  0 => 1
//  1 => 2
//  2 => 3
//  3 => 4
//  4 => 5
//  5 => 6
//  6 => 7
//  7 => 8
//]
$useKeyArr = array_filter($array02, static function ($key) {
    return $key <= 3;
}, ARRAY_FILTER_USE_KEY);
dump($useKeyArr);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
//////////////
///[
//  0 => 1
//  1 => 2
//  2 => 3
//  3 => 4
//]
