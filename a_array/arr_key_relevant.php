<?php
require_once '../vendor/autoload.php';

$jerryInfo = ['name' => 'jerry', 'age' => 1, 'date' => '20221019'];
dump(array_change_key_case($jerryInfo, CASE_UPPER));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
//////////////////////
/// output
/// [
//  "NAME" => "jerry"
//  "AGE" => 1
//  "DATE" => "20221019"
// ]
dump(array_combine(['name', 'age'], ['Loci', 25]));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
//////////////////////
/// [
//  "name" => "Loci"
//  "age" => 25
//]
dump(array_fill_keys(['lion', 'lily'], 'name'));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
////////////////
/// [
//  "lion" => "name"
//  "lily" => "name"
//]
$list01 = [1, 5, 22, 45];
$notList02 = ['test' => 1, 1, 5, 22, 45];
dump(sprintf('Is list %s', array_is_list($list01) ? 'true' : 'false'), PHP_EOL); // key is number , array is list
dump(sprintf('Is list %s', array_is_list($notList02) ? 'true' : 'false'), PHP_EOL); // key contains string , array is not list
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
dump(sprintf('Has key name exist :  %s', array_key_exists('name1', ['name' => 'Lily']) ? 'true' : 'false'), PHP_EOL);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
$demo1 = ['first' => 'name1', 'last' => 'name2'];
dump(sprintf('First key_name = %s', array_key_first($demo1)), PHP_EOL); //output : first
dump(sprintf('Last key_name = %s', array_key_last($demo1)), PHP_EOL);  //output : last
dump(array_keys($demo1));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
