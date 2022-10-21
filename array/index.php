<?php
$strKeyArr = ['name' => 'jerry', 'age' => 1, 'date' => '20221019'];
$person = [
    ['id' => 2135, 'first_name' => 'John', 'last_name' => 'Doe'],
    ['id' => 3245, 'first_name' => 'Sally', 'last_name' => 'Smith'],
    ['id' => 5342, 'first_name' => 'Jane', 'last_name' => 'Jones'],
    ['id' => 5623, 'first_name' => 'Peter', 'last_name' => 'Doe',],
];
$caseUpperKeyArr = array_change_key_case($strKeyArr, CASE_UPPER);
print_r($caseUpperKeyArr);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

$chuckArr = array_chunk($strKeyArr, 1, true);
print_r($chuckArr);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

$pickNameArr = array_column($person, 'first_name', 'id');
print_r($pickNameArr);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

print_r(array_combine(['name', 'age'], ['Locy', 25]));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

$data = ['test01', 'test02', 'test03', 'test01'];
print_r(array_count_values($data));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * $colors01 exists but $colors02 do not exist
 */
$colors01 = ["a" => "green", "red", "blue", "red"];
$colors02 = ["b" => "green", "yellow", "red"];
// only compare value
print_r(array_diff($colors01, $colors02));
// only compare key
print_r(array_diff_key($colors01, $colors02));
// compare key and value
print_r(array_diff_assoc($colors01, $colors02));
$uAssocData = array_diff_uassoc($colors01, $colors02, static function ($key1, $key2) {
    if ($key1 === $key2) {
        return 0;
    }

    return ($key1 > $key2) ? 1 : -1;
});
print_r($uAssocData);
$uKeyData = array_diff_ukey($colors01, $colors02, static function ($key1, $key2) {
    if ($key1 === $key2) {
        return 0;
    }

    return $key1 > $key2 ? 1 : -1;
});
print_r($uKeyData);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * fill out key to array
 */
$key = ['name', 'nickname'];
print_r(array_fill_keys($key, 'test'));
/**
 * fill out array
 */
print_r(array_fill(5, 10, 'test'));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array filter
 */
$array01 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => null, 'g' => '', 'h' => [], 'i' => 'null', 'j' => false, 'k' => 'false'];
$array02 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15];
print_r(array_filter($array01));
$useKeyAndValueArr = array_filter($array02, static function ($value, $key) {
    return $value <= 8;
}, ARRAY_FILTER_USE_BOTH);
print_r($useKeyAndValueArr);
$useKeyArr = array_filter($array02, static function ($key) {
    return $key <= 3;
}, ARRAY_FILTER_USE_KEY);
print_r($useKeyArr);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * reverse the array
 */
print_r(array_flip($strKeyArr));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * intersect array
 * &
 */
$arrA = ['green', 'a' => 'red', 'orange', 5 => 'pink', 'yellow'];
$arrB = ['green', 3 => 'orange', 'pink', 5 => 'yellow'];
print_r(array_intersect_assoc($arrA, $arrB));
print_r(array_intersect($arrA, $arrB));
print_r(array_intersect_key($arrA, $arrB));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array is list
 */
$list = [1, 5, 22, 45];
echo sprintf('Is list %s', array_is_list($list) ? 'true' : 'false'), PHP_EOL;
$list['test'] = 101;
echo sprintf('Is list %s', array_is_list($list) ? 'true' : 'false'), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array key exist
 */
echo sprintf('Has key name exist :  %s', array_key_exists('name1', $strKeyArr) ? 'true' : 'false'), PHP_EOL;
/**
 * get array key
 */
echo sprintf('First key_name = %s', array_key_first($strKeyArr)), PHP_EOL;
echo sprintf('Last key_name = %s', array_key_last($strKeyArr)), PHP_EOL;
print_r(array_keys($strKeyArr));
print_r(array_map(static fn($value): int => $value * 2, range(1, 5)));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array merge
 */
$ar1 = ['color' => ['favorite' => 'red'], 5];
$ar2 = [10, 'color' => ["favorite" => 'green', 'blue']];
print_r(array_merge_recursive($ar1, $ar2));
$ar1 = ['test01', 'test02', 'test03', 'test04'];
$ar2 = ['test05', 'test06', 'test07', 'test08'];
print_r(array_merge($ar1, $ar2));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array sort
 */
$list = [22, 45, 1, 5, 277, 2];
array_multisort($list, SORT_ASC, SORT_NATURAL);
print_r($list);
arsort($list, SORT_NUMERIC);
print_r($list);
rsort($list);
print_r($list);
sort($list);
print_r($list);
asort($list, SORT_NUMERIC);
print_r($list);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array pad
 */
$list1 = [22, 45, 1];
print_r(array_pad($list1, 5, 6666));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array pop
 */
$stack = ["orange", "banana", "apple", "raspberry"];
array_push($stack, 'test');
$fruit = array_pop($stack);
print_r($stack);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array product
 */
$a = [2, 4, 6, 8];
echo sprintf('x result : %d', array_product($a)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array sum
 */
$a = [2, 4, 6, 8];
echo sprintf('x result : %d', array_sum($a)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array random
 * return the array key only
 */
$input = ["Neo", "Morpheus", "Trinity", "Cypher", "Tank"];
print_r(array_rand($input, 2));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array reduce
 */
echo array_reduce($a, static fn($carry, $item): int => $carry + $item), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array replace recursive
 */
$base = ['citrus' => ["orange"], 'berries' => ["blackberry", "raspberry"], 'ooh' => 'you', 'replace' => ['x' => ['xxx1' => 'xxx1']]];
$replacements = ['citrus' => ['pineapple_02'], 'berries' => ['blueberry02'], 'replace' => ['x' => ['xxx1' => 'xxx2']]];
print_r(array_replace($base, $replacements));
print_r(array_replace_recursive($base, $replacements));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array reverse
 */
$input = ["php", 4.0, ["green", "red"], 'nginx' => '52'];
print_r(array_reverse($input));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array search
 */
echo sprintf('php version searched , key : %s', array_search('52', $input, true)), PHP_EOL;
print_r(array_reverse($input));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array shift
 */
$stack = ["orange", "banana", "apple", "raspberry"];
array_unshift($stack, 'pear');
$fruit = array_shift($stack);
print_r($stack);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array slice
 */
print_r(array_slice($stack, 1, 2, true));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array splice
 */
$arrA = ['a', 'b', 'c', 'd', 'e', 'f'];
$arrB = ['a2', 'b2', 'c3', 'd4', 'e5', 'f6'];
// return the remove element
print_r(array_splice($arrA, 0, 3, $arrB));
print_r($arrA);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array u diff
 */
$a1 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
$a2 = ['a' => 6, 'b' => 7, 'c' => 8, 'd' => 9, 'e' => 10];
array_udiff($a1, $a2, static function ($a, $b) {
    $area1 = $a * $a;
    $area2 = $b * $b;
    if ($area1 < $area2) {
        return -1;
    }

    if ($area1 > $area2) {
        return 1;
    }

    return 0;
});
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array unique
 */
$input = ["a" => "green", "red", "b" => "green", "blue", "red"];
print_r(array_unique($input));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array value
 */
$array = ["size" => "XL", "color" => "gold"];
print_r(array_values($array));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array walk
 */
$fruits = ["d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple"];
array_walk($fruits, static function ($value, $key, $prefix) {
    echo sprintf('value = %s , key = %s , prefix = %s', $value, $key, $prefix), PHP_EOL;
}, 'fruit');

$sweet = ['a' => 'apple', 'b' => 'banana'];
$fruits = ['sweet' => $sweet, 'sour' => 'lemon'];
array_walk_recursive($fruits, static function ($item, $key) {
    echo "$key holds $item\n";
});
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array compact
 */
print_r(compact('sweet', 'fruits'));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array extract
 */
$size = "large";
$varArray = ["color" => "blue", "size" => "medium", "shape" => "sphere"];
extract($varArray, EXTR_PREFIX_SAME, "wddx");
echo sprintf('color : %s,size : %s,shape : %s', $color ?? '', $size ?? '', $shape ?? ''), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * in array
 */
echo sprintf('is in array : %s', in_array('test', ['test01', 'test'], true) ? 'true' : 'false'), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * array pointer action
 */
$array = ['fruit1' => 'apple', 'fruit2' => 'orange', 'fruit3' => 'grape', 'fruit4' => 'apple', 'fruit5' => 'apple'];
while ($fruitName = current($array)) {
    if ($fruitName === 'apple') {
        echo key($array), "\n";
    }
    next($array);
}
reset($array);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * kSort
 */
krsort($array, SORT_STRING);
print_r($array);
ksort($array, SORT_STRING);
print_r($array);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * list
 */
$info = ['coffee', 'brown', 'caffeine'];
[$drink, $color, $power] = $info;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * sort array
 */
$array1 = $array2 = $array3 = ["img12.png", "img10.png", "img2.png", "img1.Png"];
asort($array1);
natsort($array2);
natcasesort($array3);
print_r($array1);
print_r($array2);
print_r($array3);
shuffle($array01);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * user function sort
 */
$array = ['a' => 4, 'b' => 8, 'c' => -1, 'd' => -9, 'e' => 2, 'f' => 5, 'g' => 3, 'h' => -4];
uasort($array, static function ($a, $b) {
    if ($a === $b) {
        return 0;
    }

    return ($a < $b) ? -1 : 1;
});
$a = ["John" => 1, "the Earth" => 2, "an apple" => 3, "a banana" => 4];
uksort($a, static function ($a, $b) {
    $a = preg_replace('@^(a|an|the) @', '', $a);
    $b = preg_replace('@^(a|an|the) @', '', $b);

    return strcasecmp($a, $b);
});
$a = [3, 2, 5, 6, 1];
usort($a, static function ($a, $b) {
    if ($a === $b) {
        return 0;
    }

    return ($a < $b) ? -1 : 1;
});




























