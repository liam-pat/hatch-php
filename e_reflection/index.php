<?php
/**
 * Created by PhpStorm.
 * Date: 2023/12/20 17:31
 */
include './Student.php';

$class = new ReflectionClass(\App\reflection\Student::class);

$className = $class->getName();
echo sprintf('class name: %s', $className) . PHP_EOL;
if ($class->isUserDefined()) {
    echo sprintf('%s is user defined', $className) . PHP_EOL;
}
if ($class->isInternal()) {
    echo sprintf('%s is built-in', $className) . PHP_EOL;
}
if ($class->isInterface()) {
    echo sprintf('%s is interface', $className) . PHP_EOL;
}
if ($class->isAbstract()) {
    echo sprintf('%s is an abstract class', $className) . PHP_EOL;
}
if ($class->isFinal()) {
    echo sprintf('%s is a final class', $className) . PHP_EOL;
}
if ($class->isInstantiable()) {
    echo sprintf('%s can be instantiated', $className) . PHP_EOL;

} else {
    echo sprintf('%s can not be instantiated', $className) . PHP_EOL;
}

echo str_repeat("##", 30) . PHP_EOL;

/**
 * get class source code
 */
$path = $class->getFileName();   // full file path
$lineData = @file($path);          // every line data save to arr
$from = $class->getStartLine();
$to = $class->getEndLine();
$len = $to - $from + 1;
echo implode(array_slice($lineData, $from - 1, $len)) . PHP_EOL;

echo str_repeat("##", 30) . PHP_EOL;


/**
 * get class info . Notice : no need know the function name
 */
$methods = $class->getMethods();
foreach ($methods as $method) {
    echo sprintf('class : %s has function -> %s', $method->class, $method->getName()) . PHP_EOL;
}
echo str_repeat("##", 30) . PHP_EOL;
/**
 * need to know the function name
 */
$method = new ReflectionMethod(\App\reflection\Student::class, 'setName');
echo sprintf('class : %s has function -> %s', $method->class, $method->getName()) . PHP_EOL;
$params = $method->getParameters();

echo str_repeat("##", 30) . PHP_EOL;
/**
 * get params by function
 */
array_walk($params, static function ($value, $key) {
    /**@var ReflectionParameter $value */
    echo sprintf('no. = %s , param = %s', $key, $value->getName()), PHP_EOL;
});

echo str_repeat("##", 30) . PHP_EOL;
/**
 * get params by know function
 */
$param= new ReflectionParameter([\App\reflection\Student::class, 'setName'], 0);
echo sprintf('no. = %s , param = %s', 0, $param->getName()), PHP_EOL;