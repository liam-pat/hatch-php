<?php
require_once '../vendor/autoload.php';

$var1 = 'Hello';
$var1 .= ' World';
$var2 = $var1;
debug_zval_dump($var1);
dump(get_debug_type($var1));
dump(get_defined_vars());
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
echo sprintf('var is empty : %s', empty($a) ? 'yes' : 'no'), PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

$handle = fopen("php://stdout", 'wb');
echo sprintf('resource type : %s , resource id : %s', get_resource_type($handle), get_resource_id($handle)), PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
$var = '23232';
echo sprintf('var is type : %s', gettype($var)), PHP_EOL;
echo sprintf('var is array : %s', is_array($var = []) ? 'yes' : 'no'), PHP_EOL;
echo sprintf('var is bool : %s', is_bool($var = (bool)$var) ? 'yes' : 'no'), PHP_EOL;
echo sprintf('var is float : %s', is_float($var = (float)$var) ? 'yes' : 'no'), PHP_EOL;
echo sprintf('var is int : %s', is_int($var = (int)$var) ? 'yes' : 'no'), PHP_EOL;
echo sprintf('var is iterable : %s', is_iterable($var = (array)$var) ? 'yes' : 'no'), PHP_EOL;
echo sprintf('var is null : %s', is_null($var = null) ? 'yes' : 'no'), PHP_EOL;
echo sprintf('var is number : %s', is_numeric($var = '121') ? 'yes' : 'no'), PHP_EOL;
echo sprintf('var is object : %s', is_object($var = new stdClass()) ? 'yes' : 'no'), PHP_EOL;
echo sprintf('var is resource : %s', is_resource($var = '') ? 'yes' : 'no'), PHP_EOL;
// scalar include   int、float、string , bool
echo sprintf('var is scalar : %s', is_scalar($var = 1) ? 'yes' : 'no'), PHP_EOL;
echo sprintf('var is string : %s', is_string($var = '') ? 'yes' : 'no'), PHP_EOL;
echo sprintf('var is set : %s', isset($var3) ? 'yes' : 'no'), PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
$functionVariable = function () {
};
dump(is_callable($functionVariable, false, $callableName));
echo $callableName, PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
echo sprintf('var can count : %s', is_countable([]) ? 'yes' : 'no'), PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
echo sprintf('arr serialize : %s', $serializeArr = serialize(['name' => 'lily', 'age' => 20])), PHP_EOL; // must to know , diff php version serialize are different
dump(unserialize($serializeArr));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
unset($var);
echo sprintf('var is set : %s', isset($var) ? 'yes' : 'no'), PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;