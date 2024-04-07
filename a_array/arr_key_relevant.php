<?php
require_once '../vendor/autoload.php';

$jerryInfo = ['name' => 'jerry', 'age' => 1, 'date' => '20221019'];
dump(array_change_key_case($jerryInfo, CASE_UPPER));
echo '</br>', str_repeat('---', 20) . '</br>', PHP_EOL;
//////////////////////
/// output
/// [
//  "NAME" => "jerry"
//  "AGE" => 1
//  "DATE" => "20221019"
// ]
dump(array_combine(['name', 'age'], ['Loci', 25]));
echo '</br>', str_repeat('---', 20) . '</br>', PHP_EOL;
//////////////////////
/// [
//  "name" => "Loci"
//  "age" => 25
//]
dump(array_fill_keys(['lion', 'lily'], 'name'));
echo '</br>', str_repeat('---', 20) . '</br>', PHP_EOL;
////////////////
/// [
//  "lion" => "name"
//  "lily" => "name"
//]
