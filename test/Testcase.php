<?php
/**
 * Created by PhpStorm.
 * Date: 2023/2/10 15:34
 */

namespace App\test;

class Testcase extends \PHPUnit\Framework\TestCase
{
    public function test_array_merge()
    {
        $arrA = ['a' => 1, 'b' => 2, 1 => 3];
        $arrB = ['b' => 1, 1 => 4, 5];
        var_export(array_merge($arrA, $arrB));
    }

    public function test_arr_add_arr()
    {
        $arrA = ['a' => 1, 'b' => 2, 1 => 3];
        $arrB = ['b' => 1, 1 => 4, 5];
        var_export($arrA + $arrB);
    }

}
