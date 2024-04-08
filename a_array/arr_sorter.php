<?php
require_once "../vendor/autoload.php";

$list = [22, 45, 1, 5, 277, 2];
shuffle($list); // distort
array_multisort($list, SORT_ASC, SORT_NATURAL);               // it can pass multiple array to sort
dump($list);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
asort($list, SORT_NUMERIC);                                     // asc sort and keep the key constant
dump($list);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
arsort($list, SORT_NUMERIC);                                    // desc sort and keep the key constant
dump($list);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
sort($list);                                                          // asc sort
dump($list);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
rsort($list);                                                         // desc sort
dump($list);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
dump(array_reverse(["php", 4.0, ["green", "red"], 'nginx' => '52']));         // reverse
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
$array = [5 => 1, 2 => 4, 3 => 5];
dump(krsort($array, SORT_STRING), ksort($array, SORT_STRING));     // sort by key
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
$a2 = [3, 2, 5, 6, 1];
usort($a2, static function ($a, $b) {
    if ($a === $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
});
dump($a2);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
$tmp = ['a' => 4, 'b' => 8, 'c' => -1, 'd' => -9, 'e' => 2, 'f' => 5, 'g' => 3, 'h' => -4];
uasort($tmp, static function ($a, $b) {
    if ($a === $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
});
dump($tmp);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
$a = ["John" => 1, "the Earth" => 2, "an apple" => 3, "a banana" => 4];
uksort($a, static function ($a, $b) {
    $a = preg_replace('@^(a|an|the) @', '', $a);
    $b = preg_replace('@^(a|an|the) @', '', $b);

    return strcasecmp($a, $b);
});
dump($a);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
$array1 = $array2 = $array3 = ["img12.png", "img10.png", "img2.png", "img1.Png"];
asort($array1);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
natsort($array2);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
natcasesort($array3);
dump($array1, $array2, $array3);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
/*********
 * 1^ array:4 [
 * 3 => "img1.Png"
 * 1 => "img10.png"
 * 0 => "img12.png"
 * 2 => "img2.png"
 * ]
 * 2^ array:4 [
 * 3 => "img1.Png"
 * 2 => "img2.png"
 * 1 => "img10.png"
 * 0 => "img12.png"
 * ]
 * 3^ array:4 [
 * 3 => "img1.Png"
 * 2 => "img2.png"
 * 1 => "img10.png"
 * 0 => "img12.png"
 * ]
 */

