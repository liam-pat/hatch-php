<?php
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$var1 = 'Hello';
$var1 .= ' World';
$var2 = $var1;
debug_zval_dump($var1);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('var is empty : %s', empty($a) ? 'yes' : 'no'), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo get_debug_type($var1), PHP_EOL;
print_r(get_defined_vars());
$handle = fopen("php://stdout", 'wb');
echo sprintf('resource type : %s , resource id : %s', get_resource_type($handle), get_resource_id($handle)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
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
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
function myFunction()
{
}

$functionVariable = 'myFunction';
var_dump(is_callable($functionVariable, false, $callableName));
echo $callableName, PHP_EOL;  // someFunction
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('var can count : %s', is_countable([]) ? 'yes' : 'no'), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$arr = ['name' => 'packie', 'age' => 20];
echo sprintf('arr serialize : %s', $serializeArr = serialize($arr)), PHP_EOL;
var_export(unserialize($serializeArr));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
unset($var);
echo sprintf('var is set : %s', isset($var) ? 'yes' : 'no'), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;


