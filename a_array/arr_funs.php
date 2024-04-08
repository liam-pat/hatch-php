<?php
require_once "../vendor/autoload.php";

dump(array_unique(["a" => "green", "red", "b" => "green", "blue", "red"]));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
dump(array_values(["size" => "XL", "color" => "gold"]));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
dump(array_pad([22, 45, 1], 5, 6666));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
//////////////
///  [
//  0 => 22
//  1 => 45
//  2 => 1
//  3 => 6666
//  4 => 6666
//]
$stack = ["orange", "banana", "apple", "raspberry"];
array_push($stack, 'test');
$fruit = array_pop($stack);
dump($stack);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
//////////////////
/// [
//  0 => "orange"
//  1 => "banana"
//  2 => "apple"
//  3 => "raspberry"
//]

dump(sprintf('x result : %d', array_product([2, 4, 6, 8])));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
/// x result : 384
dump(sprintf('x result : %d', array_sum([2, 4, 6, 8])));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
/// x result : 20
dump(array_rand(['key1' => "Neo", 'key2' => "Morpheus", 'key3' => "Trinity", 'key4' => "Cypher", 'key5' => "Tank"], 2));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
////////
///[
//  0 => "key2"
//  1 => "key4"
//]
$stack = ["orange", "banana", "apple", "raspberry"];
array_unshift($stack, 'pear');
$fruit = array_shift($stack);
dump($stack);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
/**
 * output :
 * Array
 * (
 * [0] => orange
 * [1] => banana
 * [2] => apple
 * [3] => raspberry
 * )
 */
$size = "large";
$varArray = ["color" => "blue", "size" => "medium", "shape" => "sphere"];
extract($varArray, EXTR_PREFIX_SAME, "clone");
echo sprintf('color : %s,size : %s,shape : %s,clone : %s', $color ?? '', $size ?? '', $shape ?? '', $clone_size ?? ''), PHP_EOL;
$people = [
    ['id' => 2135, 'first_name' => 'John', 'last_name' => 'Doe'],
    ['id' => 3245, 'first_name' => 'Sally', 'last_name' => 'Smith'],
    // will be separated 2 array
    ['id' => 5342, 'first_name' => 'Jane', 'last_name' => 'Jones'],
    ['id' => 5623, 'first_name' => 'Peter', 'last_name' => 'Doe',],
];
dump(array_chunk($people, 2, true));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
//////////////
/// [
//  0 => array:2 [
//    0 => array:3 [ "id" => 2135 "first_name" => "John" "last_name" => "Doe"]
//    1 => array:3 [ "id" => 3245 "first_name" => "Sally" "last_name" => "Smith"]
//  ]
//  1 => array:2 [
//    2 => array:3 [ "id" => 5342 "first_name" => "Jane" "last_name" => "Jones"]
//    3 => array:3 [ "id" => 5623 "first_name" => "Peter" "last_name" => "Doe"]
//  ]
//]
// get the first_name , unique by id (to array key)
dump(array_column($people, 'first_name', 'id'));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
//////////////
/// [
//  2135 => "John"
//  3245 => "Sally"
//  5342 => "Jane"
//  5623 => "Peter"
//]
dump(array_count_values(['test01', 'test02', 'test03', 'test01']));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
////////////////
///  [
//  "test01" => 2
//  "test02" => 1
//  "test03" => 1
//]
dump(array_fill(5, 10, 'test'));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
////////////////
/// [
//  5 => "test"
//  6 => "test"
//  7 => "test"
//  8 => "test"
//  9 => "test"
//  10 => "test"
//  11 => "test"
//  12 => "test"
//  13 => "test"
//  14 => "test"
//]
dump(array_flip(['a' => 1, 'b' => 2, 'c' => 3]));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
////////////////
/// [
//  1 => "a"
//  2 => "b"
//  3 => "c"
//]
$arrA = ['a', 'b', 'c', 'd', 'e', 'f'];
$arrB = ['a2', 'b2', 'c3', 'd4', 'e5', 'f6'];
dump(array_splice($arrA, 0, 3, $arrB));
dump($arrA);
dump($arrB);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
///////////////
/// ^ array:3 [
//  0 => "a"
//  1 => "b"
//  2 => "c"
//]
//^ array:9 [
//  0 => "a2"
//  1 => "b2"
//  2 => "c3"
//  3 => "d4"
//  4 => "e5"
//  5 => "f6"
//  6 => "d"
//  7 => "e"
//  8 => "f"
//]
//^ array:6 [
//  0 => "a2"
//  1 => "b2"
//  2 => "c3"
//  3 => "d4"
//  4 => "e5"
//  5 => "f6"
//]
