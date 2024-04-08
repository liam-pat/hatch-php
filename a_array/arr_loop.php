<?php
require_once '../vendor/autoload.php';

$array = ['fruit1' => 'apple', 'fruit2' => 'orange', 'fruit3' => 'grape', 'fruit4' => 'apple', 'fruit5' => 'apple'];
while ($fruitName = current($array)) {
    if ($fruitName === 'apple') {
        echo key($array), "\n";
    }
    next($array);
}
reset($array);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
