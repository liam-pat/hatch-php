<?php
require_once '../vendor/autoload.php';

$base = ['citrus' => ["orange"], 'berries' => ["blackberry", "raspberry"], 'ooh' => 'you', 'replace' => ['x' => ['xxx1' => 'xxx1']]];
$replacements = ['citrus' => ['pineapple_02'], 'berries' => ['blueberry02'], 'replace' => ['x' => ['xxx1' => 'xxx2']]];

dump(array_replace($base, $replacements));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
/**
 * output:
 * Array
 * (
 * [citrus] => Array
 * (
 * [0] => pineapple_02
 * )
 *
 * [berries] => Array
 * (
 * [0] => blueberry02
 * )
 *
 * [ooh] => you
 * [replace] => Array
 * (
 * [x] => Array
 * (
 * [xxx1] => xxx2
 * )
 * )
 * )
 * )
 */
dump(array_replace_recursive($base, $replacements));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
/**
 * output :
 * Array
 * (
 * [citrus] => Array
 * (
 * [0] => pineapple_02
 * )
 *
 * [berries] => Array
 * (
 * [0] => blueberry02
 * [1] => raspberry
 * )
 *
 * [ooh] => you
 * [replace] => Array
 * (
 * [x] => Array
 * (
 * [xxx1] => xxx2
 * )
 * )
 * )
 */