<?php
/**
 * Created by PhpStorm.
 * Date: 2023/2/22 18:34
 */
function test_array_merge()
{
    $arrA = ['a' => 1, 'b' => 2, 1 => 3];
    $arrB = ['b' => 1, 1 => 4, 5];
    var_export(array_merge($arrA, $arrB));
}

function test_arr_add_arr()
{
    $arrA = ['a' => 1, 'b' => 2, 1 => 3];
    $arrB = ['b' => 1, 1 => 4, 5];
    var_export($arrA + $arrB);
}

test_array_merge();
test_arr_add_arr();