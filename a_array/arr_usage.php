<?php
require_once '../vendor/autoload.php';

dump(array_map(static fn($value): int => $value * 2, range(1, 5)));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
///////////////////////
/// [
//  0 => 2
//  1 => 4
//  2 => 6
//  3 => 8
//  4 => 10
//]
dump(array_reduce([1 => 1, 2 => 2, 3 => 3, 4 => 4], static fn($carry, $item): string => $carry . '-' . $item));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
/**
 * carry :  previous iteration . item : value of element
 * output : -1-2-3-4
 */
$fruits = ["d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple"];
array_walk($fruits, static function ($value, $key, $prefix) {
    echo sprintf('value = %s , key = %s , prefix = %s', $value, $key, $prefix), PHP_EOL;
}, 'fruit');
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
$fruits = ['sweet' => ['a' => 'apple', 'b' => 'banana'], 'sour' => 'lemon'];
array_walk_recursive($fruits, static function ($item, $key) {
    echo "$key holds $item\n";
});
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
dump(compact('fruits'));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
$info = ['coffee', 'brown', 'caffeine'];
[$drink, $color, $power] = $info;
dump($info);
dump($drink, $color, $power);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
