<?php
/**
 * Created by PhpStorm.
 * Date: 2023/2/16 16:49
 */

// method 1)
$records01 = array(
    ['id' => 3245, 'first_name' => 'Sally', 'last_name' => 'Smith'],
    ['id' => 2135, 'first_name' => 'John', 'last_name' => 'Doe'],
    ['id' => 5342, 'first_name' => 'Jane', 'last_name' => 'Jones'],
    ['id' => 5623, 'first_name' => 'Peter', 'last_name' => 'Doe']
);
$fillOutKey = array_column($records01, null, 'id');
krsort($fillOutKey);
print_r($fillOutKey);

// method 2)
$records02 = array(
    ['id' => 3245, 'first_name' => 'Sally', 'last_name' => 'Smith'],
    ['id' => 2135, 'first_name' => 'John', 'last_name' => 'Doe'],
    ['id' => 5342, 'first_name' => 'Jane', 'last_name' => 'Jones'],
    ['id' => 5623, 'first_name' => 'Peter', 'last_name' => 'Doe']
);
$idKeyArr = array_column($records02, 'id');
array_multisort($idKeyArr, SORT_DESC, $records02);

print_r($records02);