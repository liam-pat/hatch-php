<?php
require_once '../vendor/autoload.php';

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$arrA = ['green', 'a' => 'red', 'orange', 5 => 'pink', 'yellow'];
$arrB = ['green', 3 => 'orange', 'pink', 5 => 'yellow'];
print_r(array_intersect_assoc($arrA, $arrB)); // compare key and value
/**
 * output :
 * Array
 * (
 * [0] => green
 * )
 */
print_r(array_intersect($arrA, $arrB)); // compare value
/**
 * output :
 * Array
 * (
 * [0] => green
 * [1] => orange
 * [5] => pink
 * [6] => yellow
 * )
 */
print_r(array_intersect_key($arrA, $arrB)); // compare key
/**
 * output:
 * Array
 * (
 * [0] => green
 * [5] => pink
 * )
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$list = [1, 5, 22, 45];
echo sprintf('Is list %s', array_is_list($list) ? 'true' : 'false'), PHP_EOL; // key is number , array is list
$list['test'] = 101;
echo sprintf('Is list %s', array_is_list($list) ? 'true' : 'false'), PHP_EOL; // key contains string , array is not list
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('Has key name exist :  %s', array_key_exists('name1', ['name' => 'packie']) ? 'true' : 'false'), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$demo1 = ['first' => 'name1', 'last' => 'name2'];
echo sprintf('First key_name = %s', array_key_first($demo1)), PHP_EOL; //output : first
echo sprintf('Last key_name = %s', array_key_last($demo1)), PHP_EOL;  //output : last
print_r(array_keys($demo1));
/**
 * output:
 * Array
 * (
 *   [0] => first
 *   [1] => last
 * )
 */
print_r(array_map(static fn($value): int => $value * 2, range(1, 5)));
/**
 * output:
 * Array
 * (
 * [0] => 2
 * [1] => 4
 * [2] => 6
 * [3] => 8
 * [4] => 10
 * )
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$ar1 = ['color' => ['favorite' => 'red'], 5];
$ar2 = [10, 'color' => ["favorite" => 'green', 'blue']];
print_r(array_merge_recursive($ar1, $ar2));
/**
 * output:
 * Array
 * (
 * [color] => Array
 * (
 * [favorite] => Array
 * (
 * [0] => red
 * [1] => green
 * )
 *
 * [0] => blue
 * )
 *
 * [0] => 5
 * [1] => 10
 * )
 */
$ar1 = ['test01', 'test02', 'test03', 'test04', 'test' => 'test05'];
$ar2 = ['test05', 'test06', 'test07', 'test08', 'test' => 'test10'];
// array merge :
// when key is number, do not replace any element
// when key is string, rear array element key is eq to array element key , rear array ele will replace the front array ele
print_r(array_merge($ar1, $ar2));
/**
 * output:
 * array(
 * [0] => test01
 * [1] => test02
 * [2] => test03
 * [3] => test04
 * [test] => test10
 * [4] => test05
 * [5] => test06
 * [6] => test07
 * [7] => test08
 * )
 * </
 */
/**
 * array + array
 * rear array ele key is equal to front array ele key,front array ele replace the rear array ele
 */
print_r($ar1 + $ar2);
/**
 * output:
 * Array
 * (
 * [0] => test01
 * [1] => test02
 * [2] => test03
 * [3] => test04
 * [test] => test05
 * )
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$list = [22, 45, 1, 5, 277, 2];
array_multisort($list, SORT_ASC, SORT_NATURAL); // it can pass multiple array to sort
print_r($list);
/**
 * output :
 * Array
 * (
 * [0] => 1
 * [1] => 2
 * [2] => 5
 * [3] => 22
 * [4] => 45
 * [5] => 277
 * )
 */
arsort($list, SORT_NUMERIC); // desc sort and keep the key constant
print_r($list);
/**
 * output:
 * Array
 * (
 * [5] => 277
 * [4] => 45
 * [3] => 22
 * [2] => 5
 * [1] => 2
 * [0] => 1
 * )
 */
rsort($list); // desc sort
print_r($list);
/**
 * output :
 * Array
 * (
 * [0] => 277
 * [1] => 45
 * [2] => 22
 * [3] => 5
 * [4] => 2
 * [5] => 1
 * )
 */
sort($list); // asc sort
print_r($list);
/**
 * output :
 * Array
 * (
 * [0] => 1
 * [1] => 2
 * [2] => 5
 * [3] => 22
 * [4] => 45
 * [5] => 277
 * )
 */
asort($list, SORT_NUMERIC);// asc sort and keep the key constant
print_r($list);
/**
 * output:
 * Array
 * (
 * [0] => 1
 * [1] => 2
 * [2] => 5
 * [3] => 22
 * [4] => 45
 * [5] => 277
 * )
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
print_r(array_pad([22, 45, 1], 5, 6666));
/**
 * output:
 * Array
 * (
 * [0] => 22
 * [1] => 45
 * [2] => 1
 * [3] => 6666
 * [4] => 6666
 * )
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$stack = ["orange", "banana", "apple", "raspberry"];
array_push($stack, 'test');
$fruit = array_pop($stack);
print_r($stack);
/**
 * output:
 * Array
 * (
 * [0] => orange
 * [1] => banana
 * [2] => apple
 * [3] => raspberry
 * )
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('x result : %d', array_product([2, 4, 6, 8])), PHP_EOL;
/**
 * output: x result : 384
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('x result : %d', array_sum([2, 4, 6, 8])), PHP_EOL;
/**
 * output: x result : 20
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
print_r(array_rand(['key1' => "Neo", 'key2' => "Morpheus", 'key3' => "Trinity", 'key4' => "Cypher", 'key5' => "Tank"], 2));
/**
 * return rand array key
 * output :
 * Array
 * (
 * [0] => key1
 * [1] => key3
 * )
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo array_reduce([1 => 1, 2 => 2, 3 => 3, 4 => 4], static fn($carry, $item): string => $carry . '-' . $item) . PHP_EOL;
/**
 * carry :  previous iteration . item : value of element
 * output : -1-2-3-4
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$base = ['citrus' => ["orange"], 'berries' => ["blackberry", "raspberry"], 'ooh' => 'you', 'replace' => ['x' => ['xxx1' => 'xxx1']]];
$replacements = ['citrus' => ['pineapple_02'], 'berries' => ['blueberry02'], 'replace' => ['x' => ['xxx1' => 'xxx2']]];
print_r(array_replace($base, $replacements));
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
print_r(array_replace_recursive($base, $replacements));
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
 *
 * )
 *
 * )
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
print_r(array_reverse(["php", 4.0, ["green", "red"], 'nginx' => '52']));
/**
 * output:
 * Array
 * (
 * [nginx] => 52
 * [0] => Array
 * (
 * [0] => green
 * [1] => red
 * )
 *
 * [1] => 4
 * [2] => php
 * )
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('php version searched , key : %s', array_search('52', ["php", 4.0, ["green", "red"], 'nginx' => '52'], true)), PHP_EOL;
// output : php version searched , key : nginx
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$stack = ["orange", "banana", "apple", "raspberry"];
array_unshift($stack, 'pear');
$fruit = array_shift($stack);
print_r($stack);
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
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
print_r(array_slice($stack, 1, 2, true));
/**
 * output :
 * Array
 * (
 * [1] => banana
 * [2] => apple
 * )
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$arrA = ['a', 'b', 'c', 'd', 'e', 'f'];
$arrB = ['a2', 'b2', 'c3', 'd4', 'e5', 'f6'];
print_r(array_splice($arrA, 0, 3, $arrB));
/**
 * output:
 * Array
 * (
 * [0] => a
 * [1] => b
 * [2] => c
 * )
 */
print_r($arrA);
/**
 * output:
 * Array
 * (
 * [0] => a2
 * [1] => b2
 * [2] => c3
 * [3] => d4
 * [4] => e5
 * [5] => f6
 * [6] => d
 * [7] => e
 * [8] => f
 * )
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$input = ["a" => "green", "red", "b" => "green", "blue", "red"];
print_r(array_unique($input));
/**
 * output
 * Array
 * (
 * [a] => green
 * [0] => red
 * [1] => blue
 * )
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$array = ["size" => "XL", "color" => "gold"];
print_r(array_values($array));
/**
 * output
 * Array
 * (
 * [0] => XL
 * [1] => gold
 * )
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$fruits = ["d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple"];
array_walk($fruits, static function ($value, $key, $prefix) {
    echo sprintf('value = %s , key = %s , prefix = %s', $value, $key, $prefix), PHP_EOL;
}, 'fruit');
/**
 * output
 * value = lemon , key = d , prefix = fruit
 * value = orange , key = a , prefix = fruit
 * value = banana , key = b , prefix = fruit
 * value = apple , key = c , prefix = fruit
 */
$fruits = ['sweet' => ['a' => 'apple', 'b' => 'banana'], 'sour' => 'lemon'];
array_walk_recursive($fruits, static function ($item, $key) {
    echo "$key holds $item\n";
});
/**
 * output:
 * a holds apple
 * b holds banana
 * sour holds lemon
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
print_r(compact('fruits'));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$size = "large";
$varArray = ["color" => "blue", "size" => "medium", "shape" => "sphere"];
extract($varArray, EXTR_PREFIX_SAME, "clone");
echo sprintf('color : %s,size : %s,shape : %s,clone : %s', $color ?? '', $size ?? '', $shape ?? '', $clone_size ?? ''), PHP_EOL;
/**
 * output:
 * color : blue,size : large,shape : sphere
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('is in array : %s', in_array('test', ['test01', 'test'], true) ? 'true' : 'false'), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$array = ['fruit1' => 'apple', 'fruit2' => 'orange', 'fruit3' => 'grape', 'fruit4' => 'apple', 'fruit5' => 'apple'];
while ($fruitName = current($array)) {
    if ($fruitName === 'apple') {
        echo key($array), "\n";
    }
    next($array);
}
reset($array);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;


echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
krsort($array, SORT_STRING); // desc sort by key
print_r($array);
ksort($array, SORT_STRING); // asc sort by key
print_r($array);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$info = ['coffee', 'brown', 'caffeine'];
[$drink, $color, $power] = $info;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$array1 = $array2 = $array3 = ["img12.png", "img10.png", "img2.png", "img1.Png"];
asort($array1);
natsort($array2);
natcasesort($array3);
print_r($array1);
print_r($array2);
print_r($array3);
/**
 * output
 * Array
 * (
 * [3] => img1.Png
 * [1] => img10.png
 * [0] => img12.png
 * [2] => img2.png
 * )
 * Array
 * (
 * [3] => img1.Png
 * [2] => img2.png
 * [1] => img10.png
 * [0] => img12.png
 * )
 * Array
 * (
 * [3] => img1.Png
 * [2] => img2.png
 * [1] => img10.png
 * [0] => img12.png
 * )
 */
shuffle($array01);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$array = ['a' => 4, 'b' => 8, 'c' => -1, 'd' => -9, 'e' => 2, 'f' => 5, 'g' => 3, 'h' => -4];
uasort($array, static function ($a, $b) {
    if ($a === $b) {
        return 0;
    }

    return ($a < $b) ? -1 : 1;
});
print_r($array);
/**
 * output
 * Array
 * (
 * [d] => -9
 * [h] => -4
 * [c] => -1
 * [e] => 2
 * [g] => 3
 * [a] => 4
 * [f] => 5
 * [b] => 8
 * )
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

$a = ["John" => 1, "the Earth" => 2, "an apple" => 3, "a banana" => 4];
uksort($a, static function ($a, $b) {
    $a = preg_replace('@^(a|an|the) @', '', $a);
    $b = preg_replace('@^(a|an|the) @', '', $b);

    return strcasecmp($a, $b);
});
print_r($a);
/**
 * output:
 * Array
 * (
 * [an apple] => 3
 * [a banana] => 4
 * [the Earth] => 2
 * [John] => 1
 * )
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$a2 = [3, 2, 5, 6, 1];
usort($a2, static function ($a, $b) {
    if ($a === $b) {
        return 0;
    }

    return ($a < $b) ? -1 : 1;
});
print_r($a2);
/**
 * output
 * Array
 * (
 * [0] => 1
 * [1] => 2
 * [2] => 3
 * [3] => 5
 * [4] => 6
 * )
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;






























