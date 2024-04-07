<?php
require_once "../vendor/autoload.php";

$people = [
    ['id' => 2135, 'first_name' => 'John', 'last_name' => 'Doe'],
    ['id' => 3245, 'first_name' => 'Sally', 'last_name' => 'Smith'],
    // will be separated 2 array
    ['id' => 5342, 'first_name' => 'Jane', 'last_name' => 'Jones'],
    ['id' => 5623, 'first_name' => 'Peter', 'last_name' => 'Doe',],
];
dump(array_chunk($people, 2, true));
echo '</br>', str_repeat('---', 20) . '</br>', PHP_EOL;
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
echo '</br>', str_repeat('---', 20) . '</br>', PHP_EOL;
//////////////
/// [
//  2135 => "John"
//  3245 => "Sally"
//  5342 => "Jane"
//  5623 => "Peter"
//]
dump(array_count_values(['test01', 'test02', 'test03', 'test01']));
echo '</br>', str_repeat('---', 20) . '</br>', PHP_EOL;
////////////////
///  [
//  "test01" => 2
//  "test02" => 1
//  "test03" => 1
//]
dump(array_fill(5, 10, 'test'));
echo '</br>', str_repeat('---', 20) . '</br>', PHP_EOL;
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
echo '</br>', str_repeat('---', 20) . '</br>', PHP_EOL;
////////////////
/// [
//  1 => "a"
//  2 => "b"
//  3 => "c"
//]
