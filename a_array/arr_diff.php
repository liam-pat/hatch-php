<?php
require_once '../vendor/autoload.php';

$colors01 = ["a" => "green", "red", "blue", "red"];
$colors02 = ["b" => "green", "yellow", "red"];
dump(array_diff($colors01, $colors02));
echo str_repeat('---', 20) . PHP_EOL;
////////////
///  [
//  1 => "blue"
//]
dump(array_diff_key($colors01, $colors02));
echo str_repeat('---', 20) . PHP_EOL;
/////////////
/// [
//  "a" => "green"
//  2 => "red"
//]
dump(array_diff_assoc($colors01, $colors02));
echo str_repeat('---', 20) . PHP_EOL;
////////////
/// [
//  "a" => "green"
//  0 => "red"
//  1 => "blue"
//  2 => "red"
//]
dump(array_diff_uassoc($colors01, $colors02, static function ($key1, $key2) {
    if ($key1 === $key2) {
        return 0;
    }
    return ($key1 > $key2) ? 1 : -1;
}));
echo str_repeat('---', 20) . PHP_EOL;
/////////////////
/// [
//  "a" => "green"
//  0 => "red"
//  1 => "blue"
//  2 => "red"
//]
dump(array_diff_ukey($colors01, $colors02, static function ($key1, $key2) {
    if ($key1 === $key2) {
        return 0;
    }
    return $key1 > $key2 ? 1 : -1;
}));
echo str_repeat('---', 20) . PHP_EOL;
///////////////
/// [
//  "a" => "green"
//  2 => "red"
//]
$a1 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
$a2 = ['a' => 6, 'b' => 7, 'c' => 8, 'd' => 9, 'e' => 10];
array_udiff($a1, $a2, static function ($a, $b) {
    $area1 = $a * $a;
    $area2 = $b * $b;
    if ($area1 < $area2) {
        return -1;
    }
    if ($area1 > $area2) {
        return 1;
    }
    return 0;
});
echo str_repeat('---', 20) . PHP_EOL;