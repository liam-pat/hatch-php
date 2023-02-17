<?php
/**
 * Created by PhpStorm.
 * Date: 2023/2/16 16:49
 */

$records = array(
    ['id' => 3245, 'first_name' => 'Sally', 'last_name' => 'Smith'],
    ['id' => 2135, 'first_name' => 'John', 'last_name' => 'Doe'],
    ['id' => 5342, 'first_name' => 'Jane', 'last_name' => 'Jones'],
    ['id' => 5623, 'first_name' => 'Peter', 'last_name' => 'Doe']
);

$sortKeyArr1 = array_column($records, null, 'id');
krsort($sortKeyArr1);
print_r($sortKeyArr1);

$sortKeyArr2 = array_column($records, 'id');
array_multisort($sortKeyArr2, SORT_DESC, $records);

print_r($sortKeyArr2);
print_r($records);